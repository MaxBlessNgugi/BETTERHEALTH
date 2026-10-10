/* ==========================================================================
   BETTER-HEALTH HMIS — Accessible Data Grid (Roadmap R-11)

   Progressive enhancement for report tables. Opt in with class="bh-grid";
   every other table in the application is left untouched.

   What it adds, all keyboard operable and announced politely:
     - <caption> promotion and header semantics (th + scope) if missing
     - sorting        : click / Enter / Space on a header, aria-sort kept in sync
     - filtering      : labelled search field, row count announced
     - pagination     : page size + prev/next, position announced
     - keyboard       : Left/Right across headers, Home/End to the ends
     - export         : CSV of the visible rows
     - print          : window.print() for the browser / PDF path

   ES5 only, no jQuery dependency.
   ========================================================================== */
(function () {
  "use strict";

  var PAGE_SIZES = [25, 50, 100, 0]; /* 0 = all rows */

  function each(list, fn) {
    for (var i = 0; i < list.length; i++) fn(list[i], i);
  }
  function el(tag, attrs, text) {
    var node = document.createElement(tag);
    if (attrs) {
      for (var k in attrs) {
        if (Object.prototype.hasOwnProperty.call(attrs, k)) node.setAttribute(k, attrs[k]);
      }
    }
    if (text !== undefined && text !== null) node.appendChild(document.createTextNode(text));
    return node;
  }
  function trim(s) { return (s || "").replace(/^\s+|\s+$/g, ""); }
  function isNum(s) {
    s = trim(s).replace(/,/g, "");
    if (!s) return false;
    if (!/^-?\(?\$?\d+(\.\d+)?\)?%?$/.test(s)) return false;
    var n = parseFloat(s.replace(/[()$%]/g, ""));
    return !isNaN(n);
  }
  function num(s) {
    return parseFloat(trim(s).replace(/[()$%,]/g, "").replace(/^\((.*)\)$/, "-$1")) || 0;
  }
  function cellText(td) {
    return trim(td.textContent || td.innerText || "");
  }

  /* ---- announce politely ---------------------------------------------- */
  function announcer() {
    var live = document.getElementById("bh-grid-live");
    if (!live) {
      live = el("div", { id: "bh-grid-live", "class": "bh-visually-hidden", role: "status", "aria-live": "polite" });
      document.body.appendChild(live);
    }
    return live;
  }
  function say(msg) { announcer().textContent = msg; }

  /* ---- build one grid -------------------------------------------------- */
  function build(table) {
    if (table.getAttribute("data-bh-grid-ready")) return;
    table.setAttribute("data-bh-grid-ready", "true");

    var body = table.tBodies[0];
    if (!body) { body = document.createElement("tbody"); table.appendChild(body); }

    /* 1. caption ------------------------------------------------------- */
    var caption = table.querySelector("caption");
    if (!caption) {
      var label = table.getAttribute("aria-label") ||
        trim((document.querySelector("h1") || {}).textContent) ||
        trim(document.title) || "Data table";
      caption = el("caption", null, label);
      table.insertBefore(caption, table.firstChild);
    }

    /* 2. header row: promote the first row of the body if it carries th's
          or is explicitly marked; otherwise assume the first row is data --- */
    var head = table.tHead;
    if (!head) {
      var first = body.rows[0];
      var marked = table.getAttribute("data-bh-thead");
      if (first && (marked === "first" || first.querySelector("th"))) {
        head = document.createElement("thead");
        head.appendChild(first);
        table.insertBefore(head, body);
      }
    }
    var headers = [];
    if (head && head.rows.length) {
      each(head.rows[0].cells, function (cell) {
        if (cell.tagName !== "TH") {
          var th = document.createElement("th");
          th.innerHTML = cell.innerHTML;
          each(cell.attributes, function (a) { th.setAttribute(a.name, a.value); });
          cell.parentNode.replaceChild(th, cell);
          cell = th;
        }
        if (!cell.getAttribute("scope")) cell.setAttribute("scope", "col");
        headers.push(cell);
      });
    }
    if (!headers.length) return;

    /* 3. toolbar (inserted as a sibling — never wrap the table, legacy
          print/dossier layouts float and position the table itself) ------ */
    var toolbar = el("div", { "class": "bh-grid-toolbar" });

    var filterId = "bh-grid-filter-" + Math.floor(Math.random() * 100000);
    var filterLabel = el("label", { "class": "bh-label", "for": filterId }, "Filter rows");
    var filter = el("input", {
      "class": "bh-input", type: "search", id: filterId, autocomplete: "off",
      placeholder: "Type to filter"
    });
    if (!table.id) table.id = "bh-grid-" + Math.floor(Math.random() * 100000);
    filter.setAttribute("aria-controls", table.id);
    var fgroup = el("div", { "class": "bh-field bh-grid-filter" });
    fgroup.appendChild(filterLabel);
    fgroup.appendChild(filter);
    toolbar.appendChild(fgroup);

    var sizeId = filterId + "-size";
    var sizeLabel = el("label", { "class": "bh-label", "for": sizeId }, "Rows per page");
    var size = el("select", { "class": "bh-select", id: sizeId });
    size.appendChild(el("option", { value: "0" }, "All"));
    each(PAGE_SIZES, function (n) {
      if (n) size.appendChild(el("option", { value: String(n) }, String(n)));
    });
    var sgroup = el("div", { "class": "bh-field bh-grid-size" });
    sgroup.appendChild(sizeLabel);
    sgroup.appendChild(size);
    toolbar.appendChild(sgroup);

    var prev = el("button", { type: "button", "class": "bh-btn bh-btn--secondary bh-btn--sm" }, "Previous");
    var next = el("button", { type: "button", "class": "bh-btn bh-btn--secondary bh-btn--sm" }, "Next");
    var status = el("span", { "class": "bh-grid-status" });
    var csv = el("button", { type: "button", "class": "bh-btn bh-btn--ghost bh-btn--sm" }, "Export CSV");
    var print = el("button", { type: "button", "class": "bh-btn bh-btn--ghost bh-btn--sm" }, "Print");
    var nav = el("div", { "class": "bh-grid-nav" });
    nav.appendChild(prev);
    nav.appendChild(status);
    nav.appendChild(next);
    toolbar.appendChild(nav);
    toolbar.appendChild(csv);
    toolbar.appendChild(print);
    table.parentNode.insertBefore(toolbar, table);

    /* 4. state ---------------------------------------------------------- */
    var state = { page: 0, size: 0, dir: "none", col: -1, query: "" };
    var allRows = [];
    each(body.rows, function (r) { allRows.push(r); });

    function matches(row) {
      if (!state.query) return true;
      return (row.textContent || "").toLowerCase().indexOf(state.query) !== -1;
    }
    function visibleRows() {
      var out = [];
      for (var i = 0; i < allRows.length; i++) if (matches(allRows[i])) out.push(allRows[i]);
      return out;
    }
    function pageCount(total) {
      if (!state.size) return 1;
      return Math.max(1, Math.ceil(total / state.size));
    }
    function render(announce) {
      var vis = visibleRows();
      var pages = pageCount(vis.length);
      if (state.page > pages - 1) state.page = pages - 1;
      if (state.page < 0) state.page = 0;
      var start = state.size ? state.page * state.size : 0;
      var end = state.size ? start + state.size : vis.length;

      each(allRows, function (r) { r.style.display = "none"; r.setAttribute("aria-hidden", "true"); });
      for (var i = start; i < end && i < vis.length; i++) {
        vis[i].style.display = "";
        vis[i].removeAttribute("aria-hidden");
      }

      status.textContent = vis.length
        ? "Rows " + (start + 1) + "\u2013" + Math.min(end, vis.length) + " of " + vis.length +
          (vis.length !== allRows.length ? " (filtered from " + allRows.length + ")" : "")
        : "No matching rows";
      prev.disabled = state.page <= 0;
      next.disabled = state.page >= pages - 1;

      if (announce) say(status.textContent);
      return { vis: vis, start: start, end: end };
    }

    /* 5. sorting -------------------------------------------------------- */
    function sort(colIndex, toggle) {
      var th = headers[colIndex];
      var dir = "ascending";
      if (toggle && state.col === colIndex) dir = state.dir === "ascending" ? "descending" : "ascending";
      state.col = colIndex;
      state.dir = dir;

      each(headers, function (h, i) {
        h.setAttribute("aria-sort", i === colIndex ? (dir === "ascending" ? "ascending" : "descending") : "none");
        h.removeAttribute("data-sorted");
        if (i === colIndex) h.setAttribute("data-sorted", dir);
      });

      var factor = dir === "ascending" ? 1 : -1;
      var numeric = allRows.every(function (r) {
        return isNum(cellText(r.cells[colIndex] || { textContent: "" }));
      });
      allRows.sort(function (a, b) {
        var ca = cellText(a.cells[colIndex] || { textContent: "" });
        var cb = cellText(b.cells[colIndex] || { textContent: "" });
        if (numeric) return (num(ca) - num(cb)) * factor;
        return ca.toLowerCase().localeCompare(cb.toLowerCase()) * factor;
      });
      for (var i = 0; i < allRows.length; i++) body.appendChild(allRows[i]);
      state.page = 0;
      var r = render(true);
      say("Sorted by " + trim(th.textContent) + ", " + dir + ". " + status.textContent);
      return r;
    }

    each(headers, function (th, i) {
      th.setAttribute("tabindex", "0");
      th.setAttribute("role", "columnheader");
      th.setAttribute("aria-sort", "none");
      th.style.cursor = "pointer";
      th.addEventListener("click", function () { sort(i, true); });
      th.addEventListener("keydown", function (e) {
        var k = e.key;
        if (k === "Enter" || k === " " || k === "Spacebar") { e.preventDefault(); sort(i, true); }
        else if (k === "ArrowRight") { e.preventDefault(); headers[Math.min(headers.length - 1, i + 1)].focus(); }
        else if (k === "ArrowLeft") { e.preventDefault(); headers[Math.max(0, i - 1)].focus(); }
        else if (k === "Home") { e.preventDefault(); headers[0].focus(); }
        else if (k === "End") { e.preventDefault(); headers[headers.length - 1].focus(); }
      });
    });

    /* 6. controls ------------------------------------------------------- */
    filter.addEventListener("input", function () {
      state.query = filter.value.toLowerCase().replace(/^\s+|\s+$/g, "");
      state.page = 0;
      render(true);
    });
    size.addEventListener("change", function () {
      state.size = parseInt(size.value, 10) || 0;
      state.page = 0;
      render(true);
    });
    prev.addEventListener("click", function () { state.page--; render(true); prev.focus(); });
    next.addEventListener("click", function () { state.page++; render(true); next.focus(); });
    print.addEventListener("click", function () { window.print(); });
    csv.addEventListener("click", function () {
      var cols = [];
      each(headers, function (h) {
        cols.push('"' + trim(h.textContent).replace(/"/g, '""') + '"');
      });
      var vis = visibleRows(); /* every filtered row, not just the current page */
      var lines = [];
      for (var i = 0; i < vis.length; i++) {
        var cells = [];
        each(vis[i].cells, function (c) {
          cells.push('"' + cellText(c).replace(/"/g, '""') + '"');
        });
        lines.push(cells.join(","));
      }
      var csvText = cols.join(",") + "\r\n" + lines.join("\r\n");
      var blob = new Blob(["\ufeff" + csvText], { type: "text/csv;charset=utf-8;" });
      var url = URL.createObjectURL(blob);
      var a = document.createElement("a");
      a.href = url;
      a.download = (trim(table.caption ? table.caption.textContent : "") || "export")
        .replace(/[^\w\- ]+/g, "").replace(/\s+/g, "-").slice(0, 60) + ".csv";
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
      say("Exported " + lines.length + " rows to CSV.");
    });

    render(false);
    say("Table ready. " + status.textContent);
  }

  function init() {
    var tables = document.querySelectorAll("table.bh-grid");
    each(tables, function (t) {
      try { build(t); } catch (e) { /* never break the page over a grid */ }
    });
  }

  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", init);
  else init();
})();
