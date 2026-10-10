/* ==========================================================================
   BETTER-HEALTH HMIS — Inline Feedback Component  (Roadmap R-04)
   Non-blocking replacement for the blocking alert() used across the app.
   Styles: css/feedback.css   Tokens: css/tokens.css

   Public API (all safe to call from anywhere, they self-initialise):
     bhNotify(type, title, msg)      toast, auto-dismiss + close button
                                      type: success | error | warning | info
                                      2-arg form: bhNotify(type, msg)
     bhFieldError(target, msg, opt)  inline message under a field, sets
                                      aria-invalid / aria-describedby, focuses
                                      target: selector string, Element, jQuery
     bhClearField(target)            remove that message
     bhBanner(type, msg, host)       persistent bar at the top of a panel
     bhDismissAll()                  close every toast
     bhBusy(button, on)              loading state for a submit button
     bhTarget(jq)                    remember the field the next alert belongs to
   ========================================================================== */
(function (global) {
  "use strict";

  var TTL = { success: 6000, info: 6000, warning: 8000, error: 9000 };
  var MAX_TOASTS = 4;
  var uid = 0;
  var pendingTarget = null;
  var timers = [];

  var ICON = { success: "\u2713", error: "\u2715", warning: "\u26A0", info: "\u2139" };
  var TYPES = { success: 1, error: 1, warning: 1, info: 1 };

  /* ---------------------------------------------------------------- utils */

  function node(tag, cls, html) {
    var n = document.createElement(tag);
    if (cls) n.className = cls;
    if (html != null) n.innerHTML = html;
    return n;
  }

  function normType(t) {
    t = String(t || "").toLowerCase();
    return TYPES[t] ? t : "info";
  }

  /* Messages in this codebase are authored HTML (<p>, <br/>, <b>). Keep the
     markup, drop anything that can execute. */
  function safeHtml(html) {
    return String(html == null ? "" : html)
      .replace(/<\s*\/?\s*(script|iframe|object|embed|style|link|meta)\b[^>]*>/gi, "")
      .replace(/\son[a-z]+\s*=\s*("[^"]*"|'[^']*'|[^\s>]+)/gi, "")
      .replace(/javascript\s*:/gi, "");
  }

  /* A field-level message renders inside a <span>, so block markup has to go. */
  function plain(html) {
    return safeHtml(html)
      .replace(/<\s*\/?\s*p\b[^>]*>/gi, " ")
      .replace(/<\s*br\s*\/?\s*>/gi, " ")
      .replace(/<[^>]+>/g, "")
      .replace(/\s+/g, " ")
      .replace(/^\s+|\s+$/g, "");
  }

  function resolve(target) {
    if (!target) return null;
    if (typeof target === "string") {
      try { return document.querySelector(target); } catch (e) { return null; }
    }
    if (target.nodeType === 1) return target;
    if (target[0] && target[0].nodeType === 1) return target[0];
    if (typeof target.get === "function") {
      var g = target.get(0);
      if (g && g.nodeType === 1) return g;
    }
    return null;
  }

  /* Decide the toast kind from the existing call-site vocabulary. */
  function classify(title, msg) {
    var t = String(title || ""), m = String(msg || "");
    var s = (t + " " + m).toLowerCase();
    if (/\b(success|succe\w*|saved|posted|updated|deleted|inserted|added|completed|complete|approved|paid|done|ok|created|transferred|dispensed|receipted)\b/.test(s)) return "success";
    if (/\b(warning|caution|credit balance|overdue|pending|exceed|cannot|not allowed)\b/.test(s)) return "warning";
    if (/\b(error|errors|sorry|failed|fail|invalid|incorrect|wrong|denied|required|missing|unable|cannot|no entries|no patient|no item|no user|does not exist|not found|not registered|already|exceeds?)\b/.test(s)) return "error";
    if (!t || /^(error|sorry|warning|notice|info|alert|item details|credit balance)$/i.test(t.trim())) {
      if (t && /^(error|sorry|warning)$/i.test(t.trim())) return "error";
      return "info";
    }
    return "info";
  }

  /* ------------------------------------------------------------- toast API */

  function container() {
    var c = document.getElementById("bhToasts");
    if (!c) {
      c = node("div", "bh-toasts");
      c.id = "bhToasts";
      document.body.appendChild(c);
    }
    return c;
  }

  function dismiss(toast) {
    if (!toast || toast.getAttribute("data-closed")) return;
    toast.setAttribute("data-closed", "1");
    toast.className += " is-leaving";
    var idx = timers.map(function (t) { return t.el; }).indexOf(toast);
    if (idx >= 0) { clearTimeout(timers[idx].id); timers.splice(idx, 1); }
    setTimeout(function () { if (toast.parentNode) toast.parentNode.removeChild(toast); }, 200);
  }

  function bhNotify(type, title, msg) {
    var t = normType(type);
    if (arguments.length === 2) { msg = title; title = ""; }
    if (msg == null || msg === "") msg = title;

    var c;
    try { c = container(); } catch (e) { return; }   /* no body yet */

    var toast = node("div", "bh-toast bh-toast--" + t);
    toast.setAttribute("role", t === "error" || t === "warning" ? "alert" : "status");
    toast.setAttribute("aria-live", t === "error" || t === "warning" ? "assertive" : "polite");
    toast.setAttribute("aria-atomic", "true");
    toast.setAttribute("tabindex", "-1");

    var icon = node("span", "bh-toast__icon", ICON[t] || ICON.info);
    icon.setAttribute("aria-hidden", "true");

    var body = node("div", "bh-toast__body");
    if (title && String(title).replace(/\s/g, "")) {
      body.appendChild(node("strong", "bh-toast__title", safeHtml(title)));
    }
    body.appendChild(node("div", "bh-toast__msg", safeHtml(msg)));

    var close = node("button", "bh-toast__close", "\u2715");
    close.type = "button";
    close.setAttribute("aria-label", "Dismiss notification");
    close.addEventListener("click", function () { dismiss(toast); });

    toast.appendChild(icon);
    toast.appendChild(body);
    toast.appendChild(close);
    c.appendChild(toast);

    /* keep the stack bounded */
    while (c.children.length > MAX_TOASTS) dismiss(c.children[0]);

    /* auto-dismiss, paused while the user is reading it */
    var ttl = TTL[t] || 6000, remaining = ttl, started = 0, timer;
    function arm(ms) {
      started = Date.now();
      timer = setTimeout(function () { dismiss(toast); }, ms);
      timers.push({ el: toast, id: timer });
    }
    arm(remaining);
    function pause() {
      clearTimeout(timer);
      remaining -= (Date.now() - started);
      if (remaining < 1500) remaining = 1500;
    }
    function resume() { clearTimeout(timer); started = Date.now(); timer = setTimeout(function () { dismiss(toast); }, remaining); }
    toast.addEventListener("mouseenter", pause);
    toast.addEventListener("mouseleave", resume);
    toast.addEventListener("focusin", pause);
    toast.addEventListener("focusout", resume);
    toast.addEventListener("keydown", function (e) {
      if (e.key === "Escape" || e.keyCode === 27) { e.stopPropagation(); dismiss(toast); }
    });

    return toast;
  }

  /* ------------------------------------------------------ field-level API */

  function bhTarget(jq) { pendingTarget = jq; return jq; }
  function takePending() { var t = pendingTarget; pendingTarget = null; return t; }

  function bhFieldError(target, msg, opts) {
    var field = resolve(target);
    if (!field) {
      /* No identifiable input: fall back to a non-blocking toast. */
      return bhNotify("error", "", msg);
    }
    opts = opts || {};
    bhClearField(field);

    var id = field.id;
    if (!id) { uid += 1; id = "bh-f-" + uid; field.id = id; }
    var errId = id + "-bh-error";

    var span = node("span", "bh-field-error");
    span.id = errId;
    span.setAttribute("role", "alert");
    span.innerHTML = '<span class="bh-field-error__icon" aria-hidden="true">!</span>' +
      '<span class="bh-field-error__text">' + plain(msg) + "</span>";

    /* put it after the control (or after the cell/wrapper it lives in) */
    var host = field.parentNode, anchor = field;
    if (host && /^(TD|SPAN|LI|LABEL)$/.test(host.tagName || "") ||
        (host && host.className && /input_field|form-row|field|col-/.test(host.className))) {
      anchor = host;
    }
    if (anchor.parentNode) anchor.parentNode.insertBefore(span, anchor.nextSibling);
    else if (host) host.appendChild(span);

    field.setAttribute("aria-invalid", "true");
    var prev = field.getAttribute("aria-describedby");
    field.setAttribute("aria-describedby", prev ? prev + " " + errId : errId);
    if (field.classList) field.classList.add("bh-field--invalid");
    if (opts.focus !== false) { try { field.focus(); } catch (e) {} }

    return span;
  }

  function bhClearField(target) {
    var field = resolve(target);
    if (!field) return;
    var id = field.id;
    var err = id ? document.getElementById(id + "-bh-error") : null;
    if (err && err.parentNode) err.parentNode.removeChild(err);
    field.removeAttribute("aria-invalid");
    if (field.classList) field.classList.remove("bh-field--invalid");
    var d = field.getAttribute("aria-describedby");
    if (d) {
      var kept = d.split(/\s+/).filter(function (x) { return x && x !== id + "-bh-error"; });
      if (kept.length) field.setAttribute("aria-describedby", kept.join(" "));
      else field.removeAttribute("aria-describedby");
    }
  }

  /* ------------------------------------------------------------- banner API */

  function bhBanner(type, msg, host) {
    var t = normType(type);
    host = resolve(host) || document.getElementById("mainp") || document.body;
    var old = host.querySelector ? host.querySelector(":scope > .bh-banner") : null;
    if (old && old.parentNode) old.parentNode.removeChild(old);

    var b = node("div", "bh-banner bh-banner--" + t);
    b.setAttribute("role", t === "error" || t === "warning" ? "alert" : "status");
    b.setAttribute("aria-live", t === "error" || t === "warning" ? "assertive" : "polite");

    var body = node("div", "bh-banner__msg", safeHtml(msg));
    var close = node("button", "bh-banner__close", "\u2715");
    close.type = "button";
    close.setAttribute("aria-label", "Dismiss message");
    close.addEventListener("click", function () { if (b.parentNode) b.parentNode.removeChild(b); });

    b.appendChild(body);
    b.appendChild(close);
    host.insertBefore(b, host.firstChild);
    return b;
  }

  /* --------------------------------------------------------- misc helpers */

  function bhDismissAll() {
    var c = document.getElementById("bhToasts");
    if (c) while (c.firstChild) dismiss(c.firstChild);
    var banners = document.querySelectorAll(".bh-banner");
    for (var i = 0; i < banners.length; i++) banners[i].parentNode.removeChild(banners[i]);
  }

  function bhBusy(btn, on) {
    btn = resolve(btn);
    if (!btn) return;
    var isInput = btn.tagName === "INPUT";
    if (on === false) {
      btn.classList.remove("bh-busy");
      btn.removeAttribute("aria-busy");
      btn.removeAttribute("aria-disabled");
      if (btn.dataset && btn.dataset.bhWasDisabled === "1") { try { btn.disabled = true; } catch (e) {} }
      else if (btn.disabled) { try { btn.disabled = false; } catch (e) {} }
      if (btn.dataset && btn.dataset.bhLabel != null) {
        if (isInput) btn.value = btn.dataset.bhLabel; else btn.textContent = btn.dataset.bhLabel;
        delete btn.dataset.bhLabel;
      }
      if (btn.dataset) delete btn.dataset.bhWasDisabled;
    } else if (!btn.classList.contains("bh-busy")) {
      if (btn.dataset) {
        btn.dataset.bhLabel = isInput ? btn.value : btn.textContent;
        btn.dataset.bhWasDisabled = btn.disabled ? "1" : "0";
      }
      btn.classList.add("bh-busy");
      btn.setAttribute("aria-busy", "true");
      /* <input> cannot render ::after, so it gets the "Saving..." text state. */
      if (isInput) { btn.value = "Saving\u2026"; try { btn.disabled = true; } catch (e) {} }
    }
  }

  /* ------------------------------------------------- R-08 loading wiring */
  /* The control that fired the request is remembered in the capture phase, so
     every primary action gains a disabled/loading state while its own request
     is in flight (feedback.css: .bh-busy { pointer-events:none } + spinner). */
  var bhTrigger = null;
  var bhTriggerTimer = null;

  function isActionControl(el) {
    if (!el || el.nodeType !== 1) return false;
    var tag = el.tagName;
    if (tag === "BUTTON") return true;
    if (tag === "INPUT") return /^(submit|button|image)$/i.test(el.type || "");
    if (tag === "A") return el.hasAttribute("onclick") || el.hasAttribute("data-bh-busy");
    return false;
  }

  function captureTrigger(e) {
    var t = e.target;
    while (t && t.nodeType === 1) {
      if (isActionControl(t)) {
        bhTrigger = t;
        clearTimeout(bhTriggerTimer);
        bhTriggerTimer = setTimeout(function () { bhTrigger = null; }, 2000);
        return;
      }
      t = t.parentNode || t.parentElement;
    }
  }

  function wireAjaxBusy() {
    var jq = global.jQuery;
    if (!jq || jq.bhBusyWired) return;
    jq.bhBusyWired = true;
    document.addEventListener("click", captureTrigger, true);
    jq(document).on("ajaxSend.bh", function (e, xhr) {
      var el = bhTrigger;
      bhTrigger = null;
      clearTimeout(bhTriggerTimer);
      if (!el || !isActionControl(el)) return;
      try { xhr.bhBusyEl = el; } catch (err) { return; }
      bhBusy(el, true);
    });
    jq(document).on("ajaxComplete.bh ajaxError.bh", function (e, xhr) {
      var el = xhr && xhr.bhBusyEl;
      if (!el) return;
      xhr.bhBusyEl = null;
      bhBusy(el, false);
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", wireAjaxBusy);
  } else {
    wireAjaxBusy();
  }
  /* jQuery may be parsed after this file; try once more when the window loads. */
  global.addEventListener("load", wireAjaxBusy);

  /* Escape closes the most recent toast without stealing page-level handling. */
  document.addEventListener("keydown", function (e) {
    if (e.key !== "Escape" && e.keyCode !== 27) return;
    var c = document.getElementById("bhToasts");
    if (c && c.lastElementChild) dismiss(c.lastElementChild);
  }, true);

  /* --------------------------------------------------------------- exports */

  global.bhNotify = bhNotify;
  global.bhFieldError = bhFieldError;
  global.bhClearField = bhClearField;
  global.bhBanner = bhBanner;
  global.bhDismissAll = bhDismissAll;
  global.bhBusy = bhBusy;
  global.bhTarget = bhTarget;
  global.bhTakePending = takePending;
  global.bhClassify = classify;
  global.bhVersion = "1.0.0";

})(window);
