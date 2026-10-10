<?php
/**
 * BETTER-HEALTH HMIS - presentation layer (R-12)
 *
 * Convention enforced by this file:
 *   PHP supplies data  -> variables handed to a partial
 *   Templates render   -> includes/partials/*.php output markup only
 *   CSS / JS own look  -> css/tokens.css + css/components.css + js/*.js
 *
 * Nothing here talks to the database or to $_GET/$_POST; callers pass values in.
 */
if (defined('BH_RENDER_LOADED')) {
    return;
}
define('BH_RENDER_LOADED', true);

/**
 * Render a partial from includes/partials/<name>.php.
 *
 * @param string $name partial file name without extension
 * @param array  $vars variables exposed to the template
 * @return string captured markup
 */
function bh_partial($name, array $vars = array())
{
    $file = dirname(__FILE__) . '/partials/' . $name . '.php';
    if (!preg_match('/^[a-z0-9_\\-]+$/i', $name) || !is_file($file)) {
        return '';
    }
    extract($vars, EXTR_SKIP);
    ob_start();
    include $file;
    return (string) ob_get_clean();
}

/**
 * Document chrome: doctype, head, canonical asset bundle.
 * This is the "chrome defined once" entry point for R-12.
 *
 * Supported keys: title, base, charset, contentType, viewport, tokens,
 * components, favicon, extra (array of raw head lines).
 *
 * @return string
 */
function bh_head(array $opts = array())
{
    return bh_partial('head', $opts);
}

/**
 * Skip link - the identical fragment repeated in 31 documents.
 *
 * @param string $href target fragment identifier
 * @return string
 */
function bh_skip_link($href = '#bh-main')
{
    return bh_partial('skip-link', array('href' => $href));
}
