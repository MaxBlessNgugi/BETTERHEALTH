/* ==========================================================================
   BETTER-HEALTH HMIS — Application Shell behaviour (Master Brief §3)

   Vanilla JS, no jQuery. Feature-detected: pages without a module menu,
   global search or sub-nav simply get nothing.

   1. Module rail   - click/Enter/Space activates a module; its permission-
                      filtered submenu (already in the DOM) is cloned into
                      #bh-subnav as a task-grouped vertical list with
                      type-to-filter and aria-current on the active screen.
   2. Rail collapse - 240px <-> 68px, persisted in localStorage (the ONLY
                      persistence allowed by the brief).
   3. Sub-menu links- <a onclick="..."> with no href are promoted to
                      focusable buttons (tabindex + role + Enter/Space).
   4. Escape        - closes the sub-nav and returns focus to the module.
   5. Global search - filters rail + sub-nav entries, polite live region.
   ========================================================================== */
(function () {
  "use strict";

  var LS_RAIL = "bh-rail-collapsed";
  var LS_MODULE = "bh-active-module";

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
  function slug(s) {
    return (s || "").toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "");
  }
  function lsGet(k) {
    try { return localStorage.getItem(k); } catch (e) { return null; }
  }
  function lsSet(k, v) {
    try { localStorage.setItem(k, v); } catch (e) {}
  }
  function lsDel(k) {
    try { localStorage.removeItem(k); } catch (e) {}
  }

  /* ---------- container / rail collapse --------------------------------- */
  function wireRailToggle() {
    var shell = document.getElementById("templatemo_container");
    var menu = document.getElementById("templatemo_menu");
    if (!shell || !menu) return;

    var header = document.getElementById("header");
    if (!header) return;

    var btn = document.createElement("button");
    btn.type = "button";
    btn.className = "bh-rail-toggle";
    btn.id = "bh-rail-toggle";
    btn.setAttribute("aria-controls", "templatemo_menu");
    btn.innerHTML =
      '<span class="bh-nav-icon" aria-hidden="true">' +
      '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" ' +
      'stroke-linecap="round" stroke-linejoin="round">' +
      '<rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 3v18"/></svg></span>' +
      '<span class="bh-rail-label">Modules</span>';
    header.insertBefore(btn, header.firstChild);

    function apply(collapsed, save) {
      if (collapsed) shell.classList.add("is-rail-collapsed");
      else shell.classList.remove("is-rail-collapsed");
      btn.setAttribute("aria-expanded", collapsed ? "false" : "true");
      btn.setAttribute("aria-label", collapsed ? "Expand module rail" : "Collapse module rail");
      if (save) lsSet(LS_RAIL, collapsed ? "1" : "0");
    }

    var stored = lsGet(LS_RAIL);
    /* Auto-collapse below 1024px (brief §3) unless user expanded on this device */
    var narrow = window.matchMedia && window.matchMedia("(max-width: 1023px)").matches;
    apply(stored === "1" || (stored === null && narrow), false);

    btn.addEventListener("click", function () {
      apply(!shell.classList.contains("is-rail-collapsed"), true);
    });
  }

  /* ---------- sub-nav --------------------------------------------------- */
  var subnavEl = null;
  var filterInput = null;
  var statusEl = null;
  var activeModuleKey = null;

  function ensureSubnav() {
    if (subnavEl && document.body.contains(subnavEl)) return subnavEl;
    var shell = document.getElementById("templatemo_container");
    if (!shell) return null;
    subnavEl = document.createElement("aside");
    subnavEl.id = "bh-subnav";
    subnavEl.setAttribute("aria-label", "Module screens");
    shell.appendChild(subnavEl);
    return subnavEl;
  }

  function clearSubnav() {
    if (!subnavEl) return;
    subnavEl.innerHTML = "";
    filterInput = null;
    statusEl = null;
  }

  function promoteLinks(root) {
    each(root.querySelectorAll("a[onclick]:not([href])"), function (a) {
      makeFocusable(a);
      a.addEventListener("keydown", function (ev) {
        if (ev.key === "Enter" || ev.key === " " || ev.key === "Spacebar") {
          ev.preventDefault();
          a.click();
        }
      });
    });
  }

  /* Group submenu <li> children into task groups.
     Some modules use multi-column <li style="width:164px"> hacks; we flatten
     to a single ordered list of links, grouping by any intermediate headers. */
  function buildGroups(subUls) {
    var groups = [{ title: "Screens", links: [] }];
    each(subUls, function (ul) {
      each(ul.children, function (li) {
        if (li.tagName !== "LI") return;
        var nested = li.querySelector("ul");
        var directLinks = [];
        var anchors = li.querySelectorAll("a");
        /* Prefer direct anchor children; fall back to all anchors when the
           legacy layout nests them under decorative wrappers. */
        each(li.children, function (c) {
          if (c.tagName === "A") directLinks.push(c);
        });
        if (!directLinks.length) {
          each(anchors, function (a) {
            if (a.closest("ul") === ul || a.closest("li") === li) directLinks.push(a);
          });
        }
        /* Section header: an li whose only meaningful text is a label with no action */
        var text = (li.textContent || "").replace(/\s+/g, " ").trim();
        var hasAction = directLinks.length > 0 || (nested && nested.querySelector("a"));
        if (!hasAction && text) {
          groups.push({ title: text, links: [] });
          return;
        }
        var g = groups[groups.length - 1];
        each(directLinks, function (a) {
          /* Skip pure sprite/module leftovers */
          if (a.classList.contains("bh-nav-item")) return;
          g.links.push(a);
        });
        if (nested) {
          each(nested.querySelectorAll("a"), function (a) {
            if (a.classList.contains("bh-nav-item")) return;
            g.links.push(a);
          });
        }
      });
    });
    /* Drop empty leading group if anything else exists */
    if (groups.length > 1 && groups[0].links.length === 0) groups.shift();
    return groups.filter(function (g) { return g.links.length > 0 || groups.length === 1; });
  }

  function renderSubnav(moduleKey, moduleLabel, groups) {
    ensureSubnav();
    if (!subnavEl) return;
    clearSubnav();
    subnavEl.removeAttribute("hidden");
    var shell = document.getElementById("templatemo_container");
    if (shell) shell.classList.remove("is-subnav-hidden");

    var head = document.createElement("div");
    head.className = "bh-subnav__head";

    var closeBtn = document.createElement("button");
    closeBtn.type = "button";
    closeBtn.className = "bh-subnav__close";
    closeBtn.setAttribute("aria-label", "Close module screens");
    closeBtn.innerHTML = "&times;";
    closeBtn.addEventListener("click", function () {
      var open = document.querySelector("#templatemo_menu a.bh-nav-item.is-active");
      each(document.querySelectorAll("#templatemo_menu a.bh-nav-item"), function (x) {
        x.setAttribute("aria-expanded", "false");
        x.classList.remove("is-active");
      });
      hideSubnav();
      if (open) open.focus();
    });
    head.appendChild(closeBtn);

    var title = document.createElement("h2");
    title.className = "bh-subnav__title";
    title.id = "bh-subnav-title";
    title.textContent = moduleLabel;
    head.appendChild(title);

    filterInput = document.createElement("input");
    filterInput.type = "search";
    filterInput.className = "bh-subnav__filter";
    filterInput.id = "bh-subnav-filter";
    filterInput.placeholder = "Filter screens\u2026";
    filterInput.setAttribute("aria-controls", "bh-subnav-list");
    filterInput.setAttribute("aria-label", "Filter " + moduleLabel + " screens");
    head.appendChild(filterInput);

    statusEl = document.createElement("p");
    statusEl.className = "bh-subnav__status";
    statusEl.id = "bh-subnav-status";
    statusEl.setAttribute("role", "status");
    statusEl.setAttribute("aria-live", "polite");
    head.appendChild(statusEl);

    subnavEl.appendChild(head);

    var body = document.createElement("div");
    body.className = "bh-subnav__body";
    var list = document.createElement("ul");
    list.className = "bh-subnav__list";
    list.id = "bh-subnav-list";

    var count = 0;
    each(groups, function (g) {
      var sec = document.createElement("section");
      sec.className = "bh-subnav__group";
      var h3 = document.createElement("h3");
      h3.className = "bh-subnav__group-title";
      h3.textContent = g.title;
      sec.appendChild(h3);
      var ul = document.createElement("ul");
      ul.className = "bh-subnav__list";
      each(g.links, function (src) {
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.href = src.getAttribute("href") || "#";
        var onclick = src.getAttribute("onclick");
        if (onclick) a.setAttribute("onclick", onclick);
        a.textContent = (src.textContent || "").replace(/\s+/g, " ").trim();
        if (!a.textContent) return;
        a.setAttribute("data-slug", slug(a.textContent));
        a.addEventListener("click", function () {
          each(list.parentNode ? list.parentNode.querySelectorAll("a[aria-current]") : subnavEl.querySelectorAll("a[aria-current]"), function (x) {
            x.removeAttribute("aria-current");
          });
          a.setAttribute("aria-current", "page");
          lsSet(LS_MODULE, moduleKey + ":" + a.getAttribute("data-slug"));
        });
        li.appendChild(a);
        ul.appendChild(li);
        count++;
      });
      if (ul.children.length) {
        sec.appendChild(ul);
        body.appendChild(sec);
      }
    });

    if (!count) {
      var empty = document.createElement("p");
      empty.className = "bh-subnav__empty";
      empty.textContent = "No screens are available for your role in this module.";
      body.appendChild(empty);
    }

    subnavEl.appendChild(body);
    promoteLinks(subnavEl);

    /* Restore aria-current for the last-used screen in this module */
    var saved = lsGet(LS_MODULE);
    if (saved && saved.indexOf(moduleKey + ":") === 0) {
      var slugPart = saved.slice(moduleKey.length + 1);
      var hit = subnavEl.querySelector('a[data-slug="' + slugPart + '"]');
      if (hit) hit.setAttribute("aria-current", "page");
    }

    /* Type-to-filter */
    function runFilter() {
      if (!filterInput || !statusEl) return;
      var raw = filterInput.value.replace(/^\s+|\s+$/g, "");
      var q = raw.toLowerCase();
      var hits = 0;
      each(subnavEl.querySelectorAll(".bh-subnav__list a"), function (a) {
        var text = (a.textContent || "").toLowerCase();
        var show = !q || text.indexOf(q) !== -1;
        var li = a.parentNode;
        if (li) li.style.display = show ? "" : "none";
        if (show) hits++;
      });
      /* Hide group sections with no visible links */
      each(subnavEl.querySelectorAll(".bh-subnav__group"), function (sec) {
        var visible = sec.querySelectorAll("li:not([style*='none'])").length;
        sec.style.display = visible ? "" : "none";
      });
      if (!q) statusEl.textContent = "";
      else if (hits === 0) statusEl.textContent = "No screens match \u201C" + raw + "\u201D";
      else statusEl.textContent = hits + (hits === 1 ? " screen" : " screens");
    }
    filterInput.addEventListener("input", runFilter);
    filterInput.addEventListener("search", runFilter);
    filterInput.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        filterInput.value = "";
        runFilter();
      }
    });

    if (filterInput) filterInput.focus();
  }

  function hideSubnav() {
    var shell = document.getElementById("templatemo_container");
    if (shell) shell.classList.add("is-subnav-hidden");
    clearSubnav();
    activeModuleKey = null;
  }

  /* ---------- module rail wiring ---------------------------------------- */
  function wireModuleMenu() {
    var menu = document.getElementById("templatemo_menu");
    if (!menu) return;
    ensureSubnav();

    var items = menu.querySelectorAll("ul > li > a.bh-nav-item");
    each(items, function (a) {
      makeFocusable(a);
      a.setAttribute("aria-expanded", "false");
      var label = child(a, ".bh-nav-text");
      var name = label ? label.textContent.replace(/^\s+|\s+$/g, "") : "Module";
      a.setAttribute("aria-label", name + " module");
      a.setAttribute("data-module", slug(name));
      a.setAttribute("title", name);
    });

    menu.addEventListener("click", function (e) {
      var a = closest(e.target, "a.bh-nav-item");
      if (!a) return;
      e.preventDefault();
      var li = a.parentNode;
      var key = a.getAttribute("data-module") || slug(a.textContent);
      var labelEl = child(a, ".bh-nav-text");
      var label = labelEl ? labelEl.textContent.replace(/^\s+|\s+$/g, "") : key;
      var subUl = child(li, "ul");

      /* Toggle off if already active */
      if (activeModuleKey === key) {
        each(items, function (x) {
          x.setAttribute("aria-expanded", "false");
          x.classList.remove("is-active");
        });
        hideSubnav();
        return;
      }

      each(items, function (x) {
        x.setAttribute("aria-expanded", "false");
        x.classList.remove("is-active");
      });
      a.setAttribute("aria-expanded", "true");
      a.classList.add("is-active");
      activeModuleKey = key;

      var groups = subUl ? buildGroups([subUl]) : [];
      renderSubnav(key, label, groups);
    });

    menu.addEventListener("keydown", function (e) {
      var a = closest(e.target, "a.bh-nav-item");
      if (a && (e.key === " " || e.key === "Spacebar")) {
        e.preventDefault();
        a.click();
      }
      /* Arrow navigation between modules */
      if (a && (e.key === "ArrowDown" || e.key === "ArrowUp")) {
        e.preventDefault();
        var list = Array.prototype.slice.call(items);
        var i = list.indexOf(a);
        var next = e.key === "ArrowDown" ? list[i + 1] : list[i - 1];
        if (next) next.focus();
      }
    });

    document.addEventListener("keydown", function (e) {
      if (e.key !== "Escape" && e.key !== "Esc") return;
      if (filterInput && document.activeElement === filterInput) return;
      if (!activeModuleKey) return;
      var open = menu.querySelector("a.bh-nav-item.is-active");
      each(items, function (x) {
        x.setAttribute("aria-expanded", "false");
        x.classList.remove("is-active");
      });
      hideSubnav();
      if (open) open.focus();
    });
  }

  /* ---------- global search --------------------------------------------- */
  function wireSearch() {
    var input = document.getElementById("bh-globalsearch");
    if (!input) return;
    var status = document.getElementById("bh-search-status");

    function collect() {
      var scope = document.querySelectorAll(
        "#templatemo_menu a.bh-nav-item, #bh-subnav a, #sidep a, #sidep button, #bottomp a"
      );
      var cache = [];
      each(scope, function (el) {
        var text = (el.textContent || "").replace(/^\s+|\s+$/g, "");
        var alt = el.getAttribute("aria-label") || "";
        cache.push({
          el: el,
          text: (text + " " + alt).toLowerCase().replace(/\s+/g, " ")
        });
      });
      return cache;
    }
    var cache = collect();

    function run() {
      var raw = input.value.replace(/^\s+|\s+$/g, "");
      var q = raw.toLowerCase();
      var hits = 0;
      for (var i = 0; i < cache.length; i++) {
        var it = cache[i];
        var show = !q || it.text.indexOf(q) !== -1;
        var li = it.el.closest ? it.el.closest("li") : null;
        var target = li || it.el;
        if (show) {
          target.style.display = "";
          if (q) hits++;
        } else {
          target.style.display = "none";
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
        status.textContent = hits + (hits === 1 ? " match" : " matches");
        status.removeAttribute("data-state");
      }
    }
    input.addEventListener("input", run);
    input.addEventListener("search", run);
    /* Re-scan after subnav renders */
    var mo = window.MutationObserver
      ? new MutationObserver(function () { cache = collect(); if (input.value) run(); })
      : null;
    if (mo && subnavEl) {
      mo.observe(document.getElementById("templatemo_container"), { childList: true, subtree: true });
    }
  }

  /* ---------- parked quick-access toggle -------------------------------- */
  function wireSidebar() {
    var side = document.getElementById("sidep");
    if (!side) return;
    /* Off by default in the three-column shell; header button reveals it. */
    var header = document.getElementById("header");
    if (!header) return;
    var btn = document.createElement("button");
    btn.type = "button";
    btn.className = "bh-rail-toggle";
    btn.id = "bh-sidep-toggle";
    btn.setAttribute("aria-controls", "sidep");
    btn.setAttribute("aria-expanded", "false");
    btn.setAttribute("aria-label", "Open quick access panel");
    btn.innerHTML =
      '<span class="bh-nav-icon" aria-hidden="true">' +
      '<svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" ' +
      'stroke-linecap="round" stroke-linejoin="round"><path d="M10 3v14M3 10h14"/></svg></span>' +
      '<span class="bh-rail-label">Quick</span>';
    header.appendChild(btn);
    btn.addEventListener("click", function () {
      var open = side.classList.toggle("is-visible");
      btn.setAttribute("aria-expanded", open ? "true" : "false");
      btn.setAttribute("aria-label", open ? "Close quick access panel" : "Open quick access panel");
    });
  }

  /* ---------- parked session controls ----------------------------------- */
  /* Logout moves to the bottom of the left module rail; the calendar input
     moves into the header beside the Quick button. Same DOM nodes, so the
     onclick=logout() handler and the jQuery UI datepicker stay attached. */
  function placeSessionControls() {
    var logout = document.querySelector("#footer_menul a.logout, #bottomp a.logout");
    var menu = document.getElementById("templatemo_menu");
    if (logout && menu && !menu.querySelector(".bh-rail-foot")) {
      var foot = document.createElement("div");
      foot.className = "bh-rail-foot";
      foot.appendChild(logout);
      menu.appendChild(foot);
    }
    var dp = document.getElementById("datepickermain");
    var header = document.getElementById("header");
    if (dp && header && dp.parentNode !== header) {
      header.appendChild(dp);
    }
  }

  /* ---------- footer calendar label ------------------------------------- */
  /* #datepickermain is an <input type="button">; pseudo-elements do not
     render on inputs, so set .value instead. */
  function wireCalendarLabel() {
    var dp = document.getElementById("datepickermain");
    if (dp && !dp.value) {
      dp.value = "Calendar";
      dp.setAttribute("aria-label", "Open calendar");
    }
  }

  function init() {
    placeSessionControls();
    wireRailToggle();
    wireModuleMenu();
    wireSearch();
    wireSidebar();
    wireCalendarLabel();
  }

  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", init);
  else init();
})();
