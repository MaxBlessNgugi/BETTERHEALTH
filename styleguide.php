<?php
/* ===========================================================================
   BETTER-HEALTH HMIS — Living Style Guide (Roadmap R-09)

   Convention demonstrated here (R-12): PHP supplies data, the template renders
   HTML, CSS/JS handle appearance and behaviour.  Colour swatches and the WCAG
   contrast figures below are read straight out of css/tokens.css at request
   time, so the guide can never drift away from the design system.

   Verified by: msplate/verify_r09.cjs   Contrast engine: msplate/contrast.cjs
   =========================================================================== */
$tokensPath = __DIR__ . '/css/tokens.css';
$css = is_readable($tokensPath) ? file_get_contents($tokensPath) : '';

/* ---- 1. palette ---------------------------------------------------------- */
preg_match_all('/(--(?:primary|secondary|neutral|success|warning|error)-\d{2,3})\s*:\s*(#[0-9A-Fa-f]{3,8})\b/', $css, $m, PREG_SET_ORDER);
$palette = [];
foreach ($m as $row) {
    $palette[$row[1]] = strtoupper($row[2]);
}

/* ---- 2. semantic aliases (resolve var() chains so we can show the hex) --- */
preg_match_all('/(--color-[a-z-]+)\s*:\s*var\((--[a-z0-9-]+)\)/', $css, $a, PREG_SET_ORDER);
$aliases = [];
foreach ($a as $row) {
    $aliases[$row[1]] = isset($palette[$row[2]]) ? $palette[$row[2]] : $row[2];
}

/* ---- 3. WCAG 2.2 relative luminance + contrast ratio -------------------- */
function bh_hex_to_rgb($hex)
{
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    if (strlen($hex) !== 6) {
        return array(0, 0, 0);
    }
    return array(
        hexdec(substr($hex, 0, 2)),
        hexdec(substr($hex, 2, 2)),
        hexdec(substr($hex, 4, 2)),
    );
}
function bh_channel($c)
{
    $c = $c / 255;
    return ($c <= 0.03928) ? ($c / 12.92) : pow(($c + 0.055) / 1.055, 2.4);
}
function bh_luminance($hex)
{
    $rgb = bh_hex_to_rgb($hex);
    return 0.2126 * bh_channel($rgb[0]) + 0.7152 * bh_channel($rgb[1]) + 0.0722 * bh_channel($rgb[2]);
}
function bh_contrast($a, $b)
{
    $l1 = bh_luminance($a);
    $l2 = bh_luminance($b);
    if ($l1 < $l2) {
        $t = $l1;
        $l1 = $l2;
        $l2 = $t;
    }
    return ($l1 + 0.05) / ($l2 + 0.05);
}
function bh_pass($ratio, $large)
{
    return $ratio >= ($large ? 3.0 : 4.5);
}

/* ---- 4. contrast pairs shown in the guide ------------------------------- */
$white = '#FFFFFF';
$pairs = array(
    array('Body text on surface',   isset($aliases['--color-text']) ? $aliases['--color-text'] : '#1E293B', $white, 4.5),
    array('Heading on surface',     isset($aliases['--color-heading']) ? $aliases['--color-heading'] : '#0F172A', $white, 4.5),
    array('Muted text on surface',  isset($aliases['--color-text-muted']) ? $aliases['--color-text-muted'] : '#64748B', $white, 4.5),
    array('Link on surface',        isset($aliases['--color-link']) ? $aliases['--color-link'] : '#0F766E', $white, 4.5),
    array('White on primary action', $white, isset($aliases['--color-action']) ? $aliases['--color-action'] : '#0F766E', 4.5),
    array('White on danger',        $white, isset($aliases['--color-danger']) ? $aliases['--color-danger'] : '#DC2626', 4.5),
    array('Focus ring on surface',  isset($aliases['--color-action']) ? $aliases['--color-action'] : '#0F766E', $white, 3.0),
);
$contrastRows = array();
foreach ($pairs as $p) {
    $r = bh_contrast($p[1], $p[2]);
    $contrastRows[] = array('label' => $p[0], 'fg' => $p[1], 'bg' => $p[2],
        'ratio' => round($r, 2), 'need' => $p[3], 'pass' => bh_pass($r, $p[3] === 3.0));
}

$guideTitle = 'Design System — Living Style Guide';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlspecialchars($guideTitle, ENT_QUOTES, 'UTF-8'); ?></title>
<link rel="stylesheet" href="css/tokens.css">
<link rel="stylesheet" href="css/components.css">
<link rel="stylesheet" href="css/feedback.css">
<style>
  /* Guide chrome only — never loaded by application screens. */
  body.bh-guide { margin: 0; background: var(--color-bg, #F8FAFC); color: var(--color-text, #1E293B);
                  font-family: var(--font-sans, inherit); font-size: var(--text-base, 15px); line-height: var(--leading-body, 1.5); }
  .bh-guide-wrap { max-width: 1100px; width: 100%; margin: 0 auto; padding: var(--space-6, 24px); }
  .bh-guide header.bh-guide-top { padding: var(--space-6, 24px) 0 var(--space-4, 16px); }
  .bh-guide h1 { margin: 0 0 var(--space-2, 8px); font-size: var(--text-2xl, 24px); font-weight: var(--weight-semibold, 600); color: var(--color-heading, #0F172A); }
  .bh-guide h2 { margin: var(--space-8, 32px) 0 var(--space-4, 16px); font-size: var(--text-xl, 20px); font-weight: var(--weight-semibold, 600); color: var(--color-heading, #0F172A); }
  .bh-guide h3 { margin: var(--space-6, 24px) 0 var(--space-3, 12px); font-size: var(--text-lg, 18px); font-weight: var(--weight-semibold, 600); color: var(--color-heading, #0F172A); }
  .bh-guide .lede { margin: 0; color: var(--color-text-muted, #64748B); max-width: 68ch; }
  .bh-guide nav.bh-guide-nav ul { display: flex; flex-wrap: wrap; gap: var(--space-2, 8px); list-style: none; margin: var(--space-4, 16px) 0 0; padding: 0; }
  .bh-guide nav.bh-guide-nav a { display: inline-block; padding: 8px 14px; border: 1px solid var(--color-border, #E2E8F0);
    border-radius: 999px; background: var(--color-surface, #fff); color: var(--color-link, #0F766E);
    text-decoration: none; font-size: var(--text-sm, 13px); font-weight: var(--weight-medium, 500); }
  .bh-guide nav.bh-guide-nav a:hover { background: var(--primary-50, #F0FDFA); }
  .bh-guide section { scroll-margin-top: var(--space-4, 16px); }
  .bh-guide .spec { display: block; margin-top: var(--space-2, 8px); font-size: var(--text-sm, 13px); color: var(--color-text-muted, #64748B); }
  .bh-guide pre { margin: var(--space-3, 12px) 0 0; padding: var(--space-3, 12px); background: #0F172A; color: #E2E8F0;
    border-radius: var(--radius-md, 8px); overflow-x: auto; font-size: 13px; line-height: 1.6; }
  .bh-guide code { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }
  .bh-guide dl.a11y { margin: var(--space-3, 12px) 0 0; padding: var(--space-3, 12px) var(--space-4, 16px);
    background: var(--primary-50, #F0FDFA); border-left: 4px solid var(--color-action, #0F766E); border-radius: var(--radius-md, 8px); }
  .bh-guide dl.a11y dt { font-weight: var(--weight-semibold, 600); font-size: var(--text-sm, 13px); color: var(--color-heading, #0F172A); }
  .bh-guide dl.a11y dd { margin: var(--space-1, 4px) 0 0; font-size: var(--text-sm, 13px); color: var(--color-text, #1E293B); }
  .bh-guide dl.a11y dd + dt { margin-top: var(--space-2, 8px); }
  .bh-swatch-grid { display: grid; gap: var(--space-4, 16px); grid-template-columns: repeat(auto-fill, minmax(168px, 1fr)); margin-top: var(--space-4, 16px); }
  .bh-swatch { border: 1px solid var(--color-border, #E2E8F0); border-radius: var(--radius-md, 8px); overflow: hidden; background: var(--color-surface, #fff); }
  .bh-swatch .chip { height: 64px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; }
  .bh-swatch .meta { padding: var(--space-2, 8px) var(--space-3, 12px); font-size: 12px; }
  .bh-swatch .meta b { display: block; font-size: 13px; color: var(--color-heading, #0F172A); }
  .bh-swatch .meta span { color: var(--color-text-muted, #64748B); }
  .bh-guide table.ratios { width: 100%; border-collapse: collapse; margin-top: var(--space-4, 16px); font-size: 14px; }
  .bh-guide table.ratios th, .bh-guide table.ratios td { padding: 10px 12px; text-align: left; border-bottom: 1px solid var(--color-border, #E2E8F0); }
  .bh-guide table.ratios th { background: var(--color-bg, #F8FAFC); font-size: 13px; }
  .bh-guide .type-row { display: flex; align-items: baseline; gap: var(--space-4, 16px); padding: var(--space-3, 12px) 0; border-bottom: 1px solid var(--color-border, #E2E8F0); }
  .bh-guide .type-row .name { flex: 0 0 190px; font-size: 13px; color: var(--color-text-muted, #64748B); }
  .bh-guide .space-row { display: flex; align-items: center; gap: var(--space-4, 16px); padding: 6px 0; font-size: 13px; }
  .bh-guide .space-row i { display: block; height: 16px; background: var(--color-action, #0F766E); border-radius: 3px; }
  .bh-guide .elev { display: grid; gap: var(--space-4, 16px); grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); margin-top: var(--space-4, 16px); }
  .bh-guide .elev div { background: var(--color-surface, #fff); border-radius: var(--radius-lg, 12px); padding: var(--space-5, 20px); font-size: 13px; color: var(--color-text-muted, #64748B); }
  .bh-guide .demo-pane { padding: var(--space-5, 20px); background: var(--color-surface, #fff); border: 1px dashed var(--color-border, #E2E8F0); border-radius: var(--radius-md, 8px); }
  .bh-guide footer.bh-guide-foot { margin-top: var(--space-8, 32px); padding: var(--space-5, 20px) 0; border-top: 1px solid var(--color-border, #E2E8F0); font-size: 13px; color: var(--color-text-muted, #64748B); }
  @media (max-width: 640px) { .bh-guide .type-row { display: block; } .bh-guide .type-row .name { flex: none; } }
</style>
</head>
<body class="bh-guide">
<?php require_once __DIR__ . '/includes/render.php'; echo bh_skip_link('#bh-main'); ?>

<div class="bh-guide-wrap">
  <header class="bh-guide-top">
    <h1><?php echo htmlspecialchars($guideTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
    <p class="lede">Reference implementation of Roadmap R-09. Every token, component and note below is the
      contract application screens should follow. Colour values and contrast ratios are read live from
      <code>css/tokens.css</code>.</p>
    <nav class="bh-guide-nav" aria-label="Style guide sections">
      <ul>
        <li><a href="#foundations">Foundations</a></li>
        <li><a href="#contrast">Contrast</a></li>
        <li><a href="#buttons">Buttons</a></li>
        <li><a href="#forms">Forms</a></li>
        <li><a href="#cards">Cards</a></li>
        <li><a href="#modals">Modal</a></li>
        <li><a href="#badges">Badges</a></li>
        <li><a href="#tables">Table</a></li>
        <li><a href="#alerts">Alerts</a></li>
        <li><a href="#feedback">Live feedback</a></li>
        <li><a href="#checklist">Checklist</a></li>
      </ul>
    </nav>
  </header>

  <main id="bh-main" tabindex="-1">

    <section id="foundations" aria-labelledby="h-foundations">
      <h2 id="h-foundations">Foundations</h2>

      <h3>Colour</h3>
      <p class="lede">Primary is Medical Teal <code>#0D9488</code>. Never use pure black for text; never rely on
        colour alone to carry meaning.</p>
      <div class="bh-swatch-grid">
        <?php foreach ($palette as $name => $hex):
            $onLight = bh_contrast($hex, $white);
            $labelColour = ($onLight >= 4.5) ? $hex : '#0F172A';
        ?>
        <div class="bh-swatch">
          <div class="chip" style="background:<?php echo $hex; ?>;color:<?php echo $labelColour; ?>">Aa</div>
          <div class="meta">
            <b><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></b>
            <span><?php echo $hex; ?> &middot; <?php echo round($onLight, 2); ?>:1 on white</span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <h3>Typography</h3>
      <div class="type-row"><span class="name">Page / modal title — 24 px / 600</span>
        <span style="font-size:24px;font-weight:600;color:var(--color-heading)">Patient admission</span></div>
      <div class="type-row"><span class="name">Section header — 18 px / 600</span>
        <span style="font-size:18px;font-weight:600;color:var(--color-heading)">Vitals</span></div>
      <div class="type-row"><span class="name">Body — 15 px / 400</span>
        <span style="font-size:15px">The patient was admitted with a history of hypertension.</span></div>
      <div class="type-row"><span class="name">Label / caption — 13 px / 500</span>
        <span style="font-size:13px;font-weight:500;color:var(--color-text-muted)">Date of birth</span></div>

      <h3>Spacing (8-point grid)</h3>
      <?php foreach (array('1' => 4, '2' => 8, '3' => 12, '4' => 16, '5' => 20, '6' => 24, '8' => 32, '10' => 40, '12' => 48) as $k => $px): ?>
      <div class="space-row"><span style="width:90px">--space-<?php echo $k; ?></span>
        <i style="width:<?php echo $px * 2; ?>px"></i><span><?php echo $px; ?> px</span></div>
      <?php endforeach; ?>

      <h3>Elevation</h3>
      <div class="elev">
        <div style="box-shadow:var(--shadow-1)">shadow-1 — resting card</div>
        <div style="box-shadow:var(--shadow-2)">shadow-2 — raised card</div>
        <div style="box-shadow:var(--shadow-3)">shadow-3 — dropdown</div>
        <div style="box-shadow:var(--shadow-4)">shadow-4 — modal</div>
      </div>
    </section>

    <section id="contrast" aria-labelledby="h-contrast">
      <h2 id="h-contrast">Contrast (WCAG 2.2 AA)</h2>
      <p class="lede">Computed at page load from the same hex values the application uses. Text needs 4.5:1;
        UI components and focus indicators need 3:1.</p>
      <table class="ratios">
        <caption class="bh-visually-hidden">Measured contrast ratios and pass or fail verdicts</caption>
        <thead><tr><th scope="col">Pair</th><th scope="col">Foreground</th><th scope="col">Background</th>
          <th scope="col">Ratio</th><th scope="col">Needed</th><th scope="col">Result</th></tr></thead>
        <tbody>
        <?php foreach ($contrastRows as $r): ?>
          <tr>
            <td><?php echo htmlspecialchars($r['label'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><code><?php echo $r['fg']; ?></code></td>
            <td><code><?php echo $r['bg']; ?></code></td>
            <td><?php echo $r['ratio']; ?>:1</td>
            <td><?php echo $r['need']; ?>:1</td>
            <td>
              <span class="bh-badge <?php echo $r['pass'] ? 'bh-badge--success' : 'bh-badge--danger'; ?>">
                <?php echo $r['pass'] ? 'Pass' : 'Fail'; ?>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <section id="buttons" aria-labelledby="h-buttons">
      <h2 id="h-buttons">Buttons</h2>
      <div class="bh-card">
        <div class="bh-card__header"><h3 class="bh-card__title">Variants &amp; sizes</h3></div>
        <div class="bh-card__body">
          <div class="bh-cluster">
            <button type="button" class="bh-btn bh-btn--primary">Save</button>
            <button type="button" class="bh-btn bh-btn--secondary">Cancel</button>
            <button type="button" class="bh-btn bh-btn--ghost">View details</button>
            <button type="button" class="bh-btn bh-btn--danger">Delete</button>
            <button type="button" class="bh-btn bh-btn--primary" disabled>Disabled</button>
          </div>
          <div class="bh-cluster" style="margin-top:16px">
            <button type="button" class="bh-btn bh-btn--primary bh-btn--sm">Small</button>
            <button type="button" class="bh-btn bh-btn--primary">Default 44 px</button>
            <button type="button" class="bh-btn bh-btn--primary bh-btn--lg">Large</button>
          </div>
<pre><code>&lt;button type="button" class="bh-btn bh-btn--primary"&gt;Save&lt;/button&gt;
&lt;button type="button" class="bh-btn bh-btn--danger"&gt;Delete&lt;/button&gt;</code></pre>
          <dl class="a11y">
            <dt>Accessibility</dt>
            <dd>44 px minimum height meets WCAG 2.5.5 (AAA tap target) and 2.5.8 (AA, 24 px).</dd>
            <dd>Focus ring comes from the global <code>:focus-visible</code> rule — never remove it.</dd>
            <dd>Destructive actions must be paired with a <code>confirm()</code> step (R-08).</dd>
            <dd>Use <code>disabled</code> (or <code>bhBusy(el, true)</code>) while a request is in flight; the
              button becomes <code>aria-busy="true"</code> and stops accepting pointer events.</dd>
          </dl>
        </div>
      </div>
    </section>

    <section id="forms" aria-labelledby="h-forms">
      <h2 id="h-forms">Forms</h2>
      <div class="bh-card">
        <div class="bh-card__header"><h3 class="bh-card__title">Field, select, textarea, choices</h3></div>
        <div class="bh-card__body">
          <div class="demo-pane">
            <div class="bh-field">
              <label class="bh-label" for="sg-name">Patient name <span class="bh-required" aria-hidden="true">*</span></label>
              <input class="bh-input" id="sg-name" name="sg-name" type="text" required aria-describedby="sg-name-help">
              <span class="bh-help" id="sg-name-help">As recorded on the national ID.</span>
            </div>
            <div class="bh-field">
              <label class="bh-label" for="sg-dept">Department</label>
              <select class="bh-select" id="sg-dept" name="sg-dept">
                <option>Outpatient</option>
                <option>Inpatient</option>
                <option>Pharmacy</option>
              </select>
            </div>
            <div class="bh-field">
              <label class="bh-label" for="sg-notes">Clinical notes</label>
              <textarea class="bh-textarea" id="sg-notes" name="sg-notes" rows="3"></textarea>
            </div>
            <label class="bh-choice"><input type="checkbox" name="sg-chk"> Billable encounter</label>
            <label class="bh-choice"><input type="radio" name="sg-rad" checked> Departmental head</label>
            <label class="bh-choice"><input type="radio" name="sg-rad"> Responsible officer</label>
          </div>
<pre><code>&lt;div class="bh-field"&gt;
  &lt;label class="bh-label" for="name"&gt;Patient name&lt;/label&gt;
  &lt;input class="bh-input" id="name" name="name" type="text" required&gt;
  &lt;span class="bh-help"&gt;As recorded on the national ID.&lt;/span&gt;
&lt;/div&gt;</code></pre>
          <dl class="a11y">
            <dt>Accessibility</dt>
            <dd>Every control needs a programmatic name: a real <code>&lt;label for&gt;</code> (preferred),
              <code>aria-label</code>, or a placeholder as last resort. R-05 verified 3,712 / 3,712 controls named.</dd>
            <dd>Keep HTML5 <code>required</code>, <code>type</code>, <code>pattern</code>, <code>min</code>/<code>max</code>;
              the browser draws the invalid state through <code>:user-invalid</code> so untouched fields stay neutral.</dd>
            <dd>Inline validation messages are rendered by <code>bhFieldError()</code> with
              <code>role="alert"</code>, <code>aria-invalid</code> and <code>aria-describedby</code>.</dd>
          </dl>
        </div>
      </div>
    </section>

    <section id="cards" aria-labelledby="h-cards">
      <h2 id="h-cards">Cards</h2>
      <div class="bh-grid">
        <div class="bh-card">
          <div class="bh-card__header"><h3 class="bh-card__title">Admissions</h3></div>
          <div class="bh-card__body">White surface, 12 px radius, soft shadow, 20&ndash;24 px padding.</div>
          <div class="bh-card__footer"><div class="bh-cluster">
            <button type="button" class="bh-btn bh-btn--primary bh-btn--sm">Open</button>
            <button type="button" class="bh-btn bh-btn--ghost bh-btn--sm">Dismiss</button>
          </div></div>
        </div>
        <div class="bh-card">
          <div class="bh-card__header"><h3 class="bh-card__title">Stock levels</h3></div>
          <div class="bh-card__body">Header, body and footer are optional slots — only render what you need.</div>
        </div>
      </div>
<pre><code>&lt;div class="bh-card"&gt;
  &lt;div class="bh-card__header"&gt;&lt;h3 class="bh-card__title"&gt;Title&lt;/h3&gt;&lt;/div&gt;
  &lt;div class="bh-card__body"&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
      <dl class="a11y"><dt>Accessibility</dt>
        <dd>Use a real heading level inside <code>bh-card__title</code> so the page outline stays logical.</dd>
        <dd>Cards are presentational — never make a card itself focusable unless it is an interactive target.</dd>
      </dl>
    </section>

    <section id="modals" aria-labelledby="h-modals">
      <h2 id="h-modals">Modal</h2>
      <div class="bh-card">
        <div class="bh-card__header"><h3 class="bh-card__title">Structure</h3></div>
        <div class="bh-card__body">
          <div class="bh-modal" style="position:static;background:rgba(15,23,42,.35);padding:0;border-radius:12px">
            <div class="bh-modal__panel" style="box-shadow:none">
              <div class="bh-modal__header">
                <h4 class="bh-modal__title">Add new patient</h4>
                <button type="button" class="bh-btn bh-btn--ghost bh-btn--sm" aria-label="Close dialog">Close</button>
              </div>
              <div class="bh-modal__body">Stacked action cards replace bullet lists and alerts.</div>
              <div class="bh-modal__footer">
                <button type="button" class="bh-btn bh-btn--secondary">Cancel</button>
                <button type="button" class="bh-btn bh-btn--primary">Save patient</button>
              </div>
            </div>
          </div>
<pre><code>&lt;div class="bh-modal"&gt;
  &lt;div class="bh-modal__panel" role="dialog" aria-modal="true" aria-labelledby="t"&gt;
    &lt;div class="bh-modal__header"&gt;
      &lt;h4 class="bh-modal__title" id="t"&gt;Add new patient&lt;/h4&gt;
    &lt;/div&gt;
    ...
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
          <dl class="a11y"><dt>Accessibility</dt>
            <dd>Requires <code>role="dialog"</code>, <code>aria-modal="true"</code> and
              <code>aria-labelledby</code> pointing at the visible title.</dd>
            <dd>Move focus into the dialog on open, trap Tab inside it, restore focus on close, and close on Escape.</dd>
            <dd>The backdrop must not be clickable where the dialog requires a decision (R-08 confirmations).</dd>
          </dl>
        </div>
      </div>
    </section>

    <section id="badges" aria-labelledby="h-badges">
      <h2 id="h-badges">Badges</h2>
      <div class="bh-cluster">
        <span class="bh-badge bh-badge--neutral">Draft</span>
        <span class="bh-badge bh-badge--info">Pending review</span>
        <span class="bh-badge bh-badge--success">Posted</span>
        <span class="bh-badge bh-badge--warning">Unposted</span>
        <span class="bh-badge bh-badge--danger">Voided</span>
      </div>
<pre><code>&lt;span class="bh-badge bh-badge--success"&gt;Posted&lt;/span&gt;</code></pre>
      <dl class="a11y"><dt>Accessibility</dt>
        <dd>The badge text itself is the accessible name — colour is only reinforcement (WCAG 1.4.1).</dd>
        <dd>Each variant keeps at least 4.5:1 against its own tinted background.</dd>
      </dl>
    </section>

    <section id="tables" aria-labelledby="h-tables">
      <h2 id="h-tables">Table / data grid</h2>
      <div class="bh-table-wrap">
        <table class="bh-table">
          <caption>Daily summary &mdash; example data grid</caption>
          <thead>
            <tr>
              <th scope="col" aria-sort="ascending">Date</th>
              <th scope="col">Department</th>
              <th scope="col" aria-sort="none">Visits</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr><th scope="row">2026-10-09</th><td>Outpatient</td><td>184</td>
                <td><span class="bh-badge bh-badge--success">Posted</span></td></tr>
            <tr><th scope="row">2026-10-08</th><td>Inpatient</td><td>96</td>
                <td><span class="bh-badge bh-badge--warning">Unposted</span></td></tr>
            <tr><th scope="row">2026-10-07</th><td>Pharmacy</td><td>312</td>
                <td><span class="bh-badge bh-badge--success">Posted</span></td></tr>
          </tbody>
        </table>
      </div>
<pre><code>&lt;div class="bh-table-wrap"&gt;
  &lt;table class="bh-table"&gt;
    &lt;caption&gt;Daily summary&lt;/caption&gt;
    &lt;thead&gt;&lt;tr&gt;&lt;th scope="col" aria-sort="ascending"&gt;Date&lt;/th&gt;...&lt;/tr&gt;&lt;/thead&gt;
    &lt;tbody&gt;&lt;tr&gt;&lt;th scope="row"&gt;2026-10-09&lt;/th&gt;...&lt;/tr&gt;&lt;/tbody&gt;
  &lt;/table&gt;
&lt;/div&gt;</code></pre>
      <dl class="a11y"><dt>Accessibility</dt>
        <dd><code>&lt;caption&gt;</code> names the table; <code>scope="col"</code> / <code>scope="row"</code>
          tie cells to their headers so screen readers can announce context per cell.</dd>
        <dd>Sticky header stays reachable: rows are 50 px, hover uses <code>--primary-50</code>.</dd>
        <dd>Sorting state is exposed with <code>aria-sort</code> and announced to assistive technology.</dd>
        <dd>Do not lay tables out with <code>&lt;br&gt;</code> or <code>&amp;nbsp;</code> (R-11).</dd>
      </dl>

      <h3>Live data grid <span class="bh-badge">R-11</span></h3>
      <p>Adding <code>class="bh-grid"</code> to a report table progressively enhances it with a
        filter, rows-per-page control, pagination, sortable headers, CSV/print export and
        screen-reader announcements &mdash; no build step and no framework.</p>
      <table class="bh-grid">
        <caption>Unposted entries &mdash; data grid demo</caption>
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Account</th>
            <th scope="col">Amount</th>
            <th scope="col">Posted</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>2026-10-09</td><td>Outpatient cash</td><td>1,240.00</td><td>No</td></tr>
          <tr><td>2026-10-09</td><td>Pharmacy sales</td><td>3,918.50</td><td>No</td></tr>
          <tr><td>2026-10-08</td><td>Outpatient cash</td><td>980.00</td><td>No</td></tr>
          <tr><td>2026-10-08</td><td>Laboratory</td><td>4,120.00</td><td>No</td></tr>
          <tr><td>2026-10-08</td><td>Pharmacy sales</td><td>2,775.25</td><td>No</td></tr>
          <tr><td>2026-10-07</td><td>Inpatient billing</td><td>12,600.00</td><td>No</td></tr>
          <tr><td>2026-10-07</td><td>Outpatient cash</td><td>1,050.75</td><td>No</td></tr>
          <tr><td>2026-10-07</td><td>Laboratory</td><td>640.00</td><td>No</td></tr>
          <tr><td>2026-10-06</td><td>Pharmacy sales</td><td>3,004.10</td><td>No</td></tr>
          <tr><td>2026-10-06</td><td>Inpatient billing</td><td>9,875.00</td><td>No</td></tr>
          <tr><td>2026-10-05</td><td>Outpatient cash</td><td>1,315.00</td><td>No</td></tr>
          <tr><td>2026-10-05</td><td>Laboratory</td><td>515.50</td><td>No</td></tr>
        </tbody>
      </table>
<pre><code>&lt;table class="bh-grid"&gt;
  &lt;caption&gt;Unposted entries&lt;/caption&gt;
  &lt;thead&gt;&lt;tr&gt;&lt;th scope="col"&gt;Date&lt;/th&gt;...&lt;/tr&gt;&lt;/thead&gt;
  &lt;tbody&gt;&lt;tr&gt;&lt;td&gt;...&lt;/td&gt;&lt;/tr&gt;...&lt;/tbody&gt;
&lt;/table&gt;
&lt;script src="js/bh-grid.js"&gt;&lt;/script&gt;</code></pre>
      <dl class="a11y"><dt>Data grid accessibility</dt>
        <dd>Headers are promoted to <code>&lt;thead&gt;</code> and carry <code>scope="col"</code>;
          sorting toggles <code>aria-sort</code> and is announced through a shared
          <code>role="status"</code> live region.</dd>
        <dd>Left / Right / Home / End move between headers; the filter is a real
          <code>&lt;input type="search"&gt;</code> bound with <code>aria-controls</code>.</dd>
        <dd>Export and print are ordinary buttons, so they are keyboard reachable and announced.</dd>
        <dd>Nothing is hidden by default: rows-per-page starts at <em>All</em>.</dd>
      </dl>
    </section>

    <section id="alerts" aria-labelledby="h-alerts">
      <h2 id="h-alerts">Alerts</h2>
      <div class="bh-stack">
        <div class="bh-alert bh-alert--info" role="status"><span class="bh-alert__icon" aria-hidden="true">i</span>
          <span>Two encounters are waiting to be posted.</span></div>
        <div class="bh-alert bh-alert--success" role="status"><span class="bh-alert__icon" aria-hidden="true">&#10003;</span>
          <span>Ledger entries posted successfully.</span></div>
        <div class="bh-alert bh-alert--warning" role="alert"><span class="bh-alert__icon" aria-hidden="true">!</span>
          <span>Credit balance exceeds the approved limit.</span></div>
        <div class="bh-alert bh-alert--danger" role="alert"><span class="bh-alert__icon" aria-hidden="true">&#10007;</span>
          <span>Could not save: the patient number already exists.</span></div>
      </div>
      <dl class="a11y"><dt>Accessibility</dt>
        <dd>Errors and warnings use <code>role="alert"</code> + <code>aria-live="assertive"</code>;
          informational messages use <code>role="status"</code> + polite live regions.</dd>
        <dd>Never signal state with colour alone — keep the icon and the sentence.</dd>
      </dl>
    </section>

    <section id="feedback" aria-labelledby="h-feedback">
      <h2 id="h-feedback">Live feedback</h2>
      <p class="lede">These call the real <code>js/bh-feedback.js</code> API that replaced the blocking
        <code>alert()</code> in R-04.</p>
      <div class="bh-cluster">
        <button type="button" class="bh-btn bh-btn--primary" onclick="bhNotify('success','Saved','Ledger entry posted.');">Toast &mdash; success</button>
        <button type="button" class="bh-btn bh-btn--secondary" onclick="bhNotify('error','Cannot save','Enter your Username!');">Toast &mdash; error</button>
        <button type="button" class="bh-btn bh-btn--secondary" onclick="bhBanner('warning','Session expires in 60 seconds.');">Banner</button>
        <button type="button" class="bh-btn bh-btn--ghost" onclick="bhDismissAll();">Dismiss all</button>
        <button type="button" class="bh-btn bh-btn--danger" onclick="if(confirm('Delete this record? This action cannot be undone.')){bhNotify('info','Deleted','Record removed.');}">confirm() gate</button>
        <button type="button" class="bh-btn bh-btn--ghost" onclick="var b=this;bhBusy(b,true);setTimeout(function(){bhBusy(b,false);},1600);">bhBusy loading state</button>
      </div>
      <dl class="a11y"><dt>Accessibility</dt>
        <dd>Toasts carry <code>role="status"</code>/<code>role="alert"</code> and never steal focus; Escape closes the newest one.</dd>
        <dd><code>bhBusy()</code> sets <code>aria-busy="true"</code>, shows a spinner and blocks pointer events until
          <code>ajaxComplete</code> releases it.</dd>
        <dd>Destructive actions are wrapped in a synchronous <code>confirm()</code> gate (R-08).</dd>
      </dl>
    </section>

    <section id="checklist" aria-labelledby="h-checklist">
      <h2 id="h-checklist">Adoption checklist</h2>
      <div class="bh-card">
        <div class="bh-card__body">
          <ul style="margin:0;padding-left:20px;line-height:2">
            <li>Load <code>css/tokens.css</code>, <code>css/components.css</code>, <code>css/feedback.css</code> in that order.</li>
            <li>Load <code>js/bh-feedback.js</code> after jQuery so the loading-state wiring can attach.</li>
            <li>Never write raw hex — use <code>var(--token)</code>.</li>
            <li>Never write an inline <code>style="…"</code> for anything a component class already covers.</li>
            <li>Every control: a real <code>&lt;label for&gt;</code>, a visible focus ring, 44 px target.</li>
            <li>Every table: <code>&lt;caption&gt;</code>, <code>scope</code> on header cells.</li>
            <li>Every destructive action: a <code>confirm()</code> gate.</li>
            <li>Every async action: <code>bhBusy()</code> or a <code>.bh-spinner</code> indicator.</li>
            <li>Never paste document chrome &mdash; call <code>echo bh_head(array(...))</code> from
              <code>includes/render.php</code> (R-12: PHP supplies data, the partial renders markup).</li>
            <li>Repeated fragments come from <code>includes/partials/</code>
              (<code>bh_skip_link()</code>, <code>bh_head()</code>) &mdash; not from copy-paste.</li>
            <li>New report tables opt in with <code>class="bh-grid"</code> and load
              <code>js/bh-grid.js</code> (R-11).</li>
          </ul>
        </div>
      </div>
    </section>

  </main>

  <footer class="bh-guide-foot">
    BETTER-HEALTH HMIS design system &middot; R-09 living style guide &middot;
    tokens read from <code>css/tokens.css</code> &middot; contrast verified by <code>contrast.cjs</code>
  </footer>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/bh-feedback.js"></script>
<script src="js/bh-grid.js"></script>
</body>
</html>
