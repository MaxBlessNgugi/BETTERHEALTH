<?php
/**
 * Canonical document chrome (R-12). Supplied by bh_head() in ../render.php.
 * Only markup lives here - no queries, no business rules.
 * Asset order matches the documents this replaced so load order is unchanged.
 */
$base        = isset($base) ? $base : '';
$title       = isset($title) ? $title : 'Better Health HMIS';
$charset     = isset($charset) ? $charset : 'utf-8';
$contentType = isset($contentType) ? $contentType : 'text/html; charset=' . $charset;
$viewport    = !isset($viewport) || $viewport;
$tokens      = !isset($tokens) || $tokens;
$components  = !isset($components) || $components;
$favicon     = !isset($favicon) || $favicon;
$xmlns       = !isset($xmlns) || $xmlns;
$extra       = isset($extra) && is_array($extra) ? $extra : array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html<?php if ($xmlns) { echo ' xmlns="http://www.w3.org/1999/xhtml"'; } ?>>
<head>
<meta http-equiv="Content-Type" content="<?php echo htmlspecialchars($contentType, ENT_QUOTES); ?>" />
<?php if ($viewport) { ?><meta name="viewport" content="width=device-width, initial-scale=1" />
<?php } ?><?php if ($tokens) { ?><link rel="stylesheet" href="<?php echo $base; ?>css/tokens.css" />
<?php } ?><?php if ($components) { ?><link rel="stylesheet" href="<?php echo $base; ?>css/components.css" />
<?php } ?><title><?php echo htmlspecialchars($title, ENT_QUOTES); ?></title>
<?php if ($favicon) { ?><link id="favicon" href="<?php echo $base; ?>images/fav.png" rel="icon" type="image/png"/>
<?php } ?><script type="text/javascript" src="<?php echo $base; ?>js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $base; ?>css/feedback.css">
<script type="text/javascript" src="<?php echo $base; ?>js/bh-feedback.js"></script>
<script src="<?php echo $base; ?>js/functions.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>js/connectcode-javascript-code39.js"></script>
<script src="<?php echo $base; ?>js/excellentexport.js"></script>
<?php foreach ($extra as $line) { echo $line, "\n"; } ?>
</head>
