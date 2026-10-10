/*
 * BETTER-HEALTH HMIS — alert() bridge  (Roadmap R-04)
 * --------------------------------------------------------------------------
 * Supersedes Arron Bailiss' jquery.custom.alerts (2011), which replaced
 * window.alert with a MODAL that greyed out the whole document and silently
 * discarded any call that did not pass two arguments.
 *
 * The public surface is deliberately unchanged so that the ~1,550 existing
 * call sites keep working without edits:
 *
 *     alert('Error!', '<p>Enter the quantity!</p>');   // 2-arg (the convention)
 *     alert('some message');                           // 1-arg (used to vanish)
 *     $().customAlert();                               // now a no-op
 *
 * Behaviour now:
 *     - a non-blocking toast (css/feedback.css) instead of a modal overlay
 *     - announced to assistive tech via role="alert" / role="status"
 *     - auto-dismisses, and can be closed or dismissed with Escape
 *     - single-argument calls are shown instead of being dropped
 *     - when the call site registered a field with bhTarget(), the message is
 *       rendered inline next to that input instead of as a toast
 *
 * The component itself lives in js/bh-feedback.js, which must be loaded first.
 */
(function ($) {
	"use strict";

	var fallback = null;   // the browser's native alert, captured once

	/* ---- $().customAlert() : kept so existing call sites keep working ---- */
	$.fn.customAlert = function () { return this; };

	/* ---- decide where a message should go -------------------------------- */
	function route(title, msg, oneArg) {
		if (typeof window.bhNotify !== "function") {
			/* component not on this page — never lose the message */
			if (fallback) { fallback(oneArg ? title : (title + "\n\n" + msg)); }
			return;
		}

		/* a field target registered by bhTarget($('#x')) -> inline message */
		var target = (typeof window.bhTakePending === "function") ? window.bhTakePending() : null;
		if (target && !oneArg && msg != null && msg !== "") {
			if (typeof window.bhFieldError === "function") { window.bhFieldError(target, msg); return; }
		}

		var type = (typeof window.bhClassify === "function")
			? window.bhClassify(title, msg)
			: "info";

		if (oneArg) { window.bhNotify(type, "", title); }
		else { window.bhNotify(type, title, msg); }
	}

	/* ---- install the override -------------------------------------------- */
	function install() {
		if (!document.getElementById) return;
		try { fallback = window.alert; } catch (e) { return; }
		if (fallback && fallback.bh) return;          /* already installed */

		window.alert = function (title, msg) {
			if (title === undefined && msg === undefined) return;   /* alert() */
			if (msg === undefined || msg === null) { route(title, "", true); return; }
			if (title === undefined || title === null) { route(msg, "", true); return; }
			route(title, msg, false);
		};
		window.alert.bh = true;
		window.defaultAlert = fallback;
	}

	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", install);
	} else {
		install();
	}
	/* jQuery may still be parsing when this runs */
	$(install);

})(jQuery);
