/* ==========================================================================
   BETTER-HEALTH HMIS — Application Shell behaviour (Roadmap R-10)

   Vanilla JS with no jQuery dependency, so it can be loaded on any document.
   Everything is feature-detected: pages without a module menu, global search
   or quick-access sidebar simply get nothing.

   1. Module menu  - click/Enter/Space on a top-level module toggles its
                     submenu (ddsmoothmenu itself only opens on hover) and
                     keeps aria-expanded in sync.
   2. Sub-menu links - the application renders <a onclick="..."> without an
                     href, which browsers do not put in the tab order and do
                     not activate with Enter. They are promoted to buttons
                     (tabindex + role + Enter/Space).
   3. Escape       - closes the open submenu and returns focus to its module.
   4. Global search- filters module and quick-access entries, announcing the
                     number of matches politely.
   5. Sidebar      - collapses the quick-access panel between 280 px and a
                     72 px rail, with aria-expanded and session persistence.
   ========================================================================== */
(function () {
  "use strict";

  /* ---------- helpers --------------------------------------------------- */
  function each(list, fn) {
    for (var i = 0; i < list.length; i++) fn(list[i], i);
  }
  function closest(el, sel) {
    while (el && el.nodeType === 1) {
      if (el.matches ? el.matches(sel) : el.msMatchesSelector(sel)) return el;
      el = el.parentNode;
    }
    return null;
  }
  function child(parent, sel) {
    for (var i = 0; i < parent.children.length; i++) {
      var c = parent.children[i];
      if (c.matches ? c.matches(sel) : c.msMatchesSelector(sel)) return c;
    }
    return null;
  }
  function makeFocusable(el) {
    if (!el.hasAttribute("tabindex")) el.setAttribute("tabindex", "0");
    if (!el.hasAttribute("role")) el.setAttribute("role", "button");
  }
  function closeAllMenus(except) {
    var open = document.querySelectorAll("#templatemo_menu li.is-open");
    each(open, function (li) {
      if (li === except) return;
      li.classList.remove("is-open");
      var a = child(li, "a");
      if (a) a.setAttribute("aria-expanded", "false");
    });
  }

  /* ---------- 1 + 2. module menu and sub-menu links --------------------- */
  function wireModuleMenu() {
    var menu = document.getElementById("templatemo_menu");
    if (!menu) return;

    var items = menu.querySelectorAll("ul > li > a.bh-nav-item");
    each(items, function (a) {
      makeFocusable(a);
      a.setAttribute("aria-expanded", "false");
      var label = child(a, ".bh-nav-text");
      if (label) a.setAttribute("aria-label", label.textContent.replace(/^\s+|\s+$/g, "") + " module");
    });

    menu.addEventListener("click", function (e) {
      var a = closest(e.target, "a.bh-nav-item");
      if (!a) return;
      e.preventDefault();
      var li = a.parentNode;
      var willOpen = !li.classList.contains("is-open");
      closeAllMenus(willOpen ? li : null);
      if (willOpen) {
        li.classList.add("is-open");
        var first = child(li, "ul");
        if (first) {
          var link = first.querySelector("a");
          if (link) link.focus();
        }
      } else {
        li.classList.remove("is-open");
      }
      a.setAttribute("aria-expanded", willOpen ? "true" : "false");
    });

    menu.addEventListener("keydown", function (e) {
      var a = closest(e.target, "a.bh-nav-item");
      if (a && (e.key === " " || e.key === "Spacebar")) {
        e.preventDefault();
        a.click();
      }
    });

    /* sub-menu links rendered as <a onclick="..."> with no href */
    each(menu.querySelectorAll("ul ul a[onclick]:not([href])"), function (a) {
      makeFocusable(a);
      a.addEventListener("keydown", function (ev) {
        if (ev.key === "Enter" || ev.key === " " || ev.key === "Spacebar") {
          ev.preventDefault();
          a.click();
        }
      });
    });

    document.addEventListener("keydown", function (e) {
      if (e.key !== "Escape" && e.key !== "Esc") return;
      var open = menu.querySelector("li.is-open > a.bh-nav-item");
      if (!open) return;
      closeAllMenus(null);
      open.setAttribute("aria-expanded", "false");
      open.focus();
    });

    document.addEventListener("mouseover", function (e) {
      if (closest(e.target, "#templatemo_menu")) return;
      closeAllMenus(null);
    });
  }

  /* ---------- 4. global search ------------------------------------------ */
  function wireSearch() {
    var input = document.getElementById("bh-globalsearch");
    if (!input) return;
    var status = document.getElementById("bh-search-status");
    var scope = document.querySelectorAll(
      "#templatemo_menu a, #sidep a, #sidep button, #bottomp a"
    );
    var cache = [];
    each(scope, function (el) {
      var text = (el.textContent || "").replace(/^\s+|\s+$/g, "");
      var alt = el.getAttribute("aria-label") || "";
      cache.push({
        el: el,
        text: (text + " " + alt).toLowerCase().replace(/\s+/g, " "),
        restore: el.style.display
      });
    });

    function run() {
      var raw = input.value.replace(/^\s+|\s+$/g, "");
      var q = raw.toLowerCase();
      var hits = 0;
      for (var i = 0; i < cache.length; i++) {
        var it = cache[i];
        if (!q) {
          if (it.el.style.display !== it.restore) it.el.style.display = it.restore;
          continue;
        }
        if (it.text.indexOf(q) !== -1) {
          if (it.el.style.display === "none") it.el.style.display = it.restore;
          hits++;
        } else if (it.el.style.display !== "none") {
          it.el.style.display = "none";
        }
      }
      if (!status) return;
      if (!q) {
        status.textContent = "";
        status.removeAttribute("data-state");
      } else if (hits === 0) {
        status.textContent = "No screens match \u201C" + raw + "\u201D";
        status.setAttribute("data-state", "empty");
      } else {
        status.textContent = hits + (hits === 1 ? " screen matches" : " screens match");
        status.removeAttribute("data-state");
      }
    }
    input.addEventListener("input", run);
    input.addEventListener("search", run);
  }

  /* ---------- 5. collapsible quick-access sidebar ----------------------- */
  function wireSidebar() {
    var side = document.getElementById("sidep");
    if (!side) return;

    var btn = document.createElement("button");
    btn.type = "button";
    btn.className = "bh-rail-toggle";
    btn.setAttribute("aria-controls", "sidep");
    btn.innerHTML =
      '<span class="bh-nav-icon" aria-hidden="true">' +
      '<svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" ' +
      'stroke-linecap="round"><path d="M3 5h14M3 10h14M3 15h14"/></svg></span>' +
      '<span class="bh-rail-label">Collapse panel</span>';
    side.insertBefore(btn, side.firstChild);

    function setCollapsed(state, save) {
      if (state) side.classList.add("is-collapsed");
      else side.classList.remove("is-collapsed");
      btn.setAttribute("aria-expanded", state ? "false" : "true");
      var label = btn.querySelector(".bh-rail-label");
      if (label) label.textContent = state ? "Expand" : "Collapse panel";
      btn.setAttribute(
        "aria-label",
        state ? "Expand quick access panel" : "Collapse quick access panel"
      );
      if (save) {
        try { sessionStorage.setItem("bh-sidep", state ? "collapsed" : "open"); } catch (err) {}
      }
    }

    var stored = null;
    try { stored = sessionStorage.getItem("bh-sidep"); } catch (err) { stored = null; }
    setCollapsed(stored === "collapsed", false);

    btn.addEventListener("click", function () {
      setCollapsed(!side.classList.contains("is-collapsed"), true);
    });
  }

  function init() {
    wireModuleMenu();
    wireSearch();
    wireSidebar();
  }

  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", init);
  else init();
})();
