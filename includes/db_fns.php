<?php
ini_set('display_errors', 0);
date_default_timezone_set('Africa/Nairobi');
error_reporting(~1);

function bh_request_is_https()
{
    if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') return true;
    if (isset($_SERVER['SERVER_PORT']) && (int)$_SERVER['SERVER_PORT'] === 443) return true;
    return false;
}

ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Lax');
// Only flag the cookie Secure when the request actually arrived over TLS.
// Forcing this on over plain HTTP stops the browser sending the cookie back,
// which silently breaks every login.
ini_set('session.cookie_secure', bh_request_is_https() ? '1' : '0');

session_start();

/**
 * Database settings are resolved from, in order of precedence:
 *   1. BH_DB_HOST / BH_DB_USER / BH_DB_PASS / BH_DB_NAME environment variables
 *   2. a PHP file outside the document root named by BH_DB_CONFIG
 *   3. the built-in defaults below
 * That lets a deployment keep its real credentials out of the web root without
 * editing any file that ships with the app.
 */
function bh_db_config()
{
    static $cfg = null;
    if ($cfg !== null) return $cfg;

    $cfg = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'name' => 'laisamis',
    );

    $configFile = getenv('BH_DB_CONFIG');
    if ($configFile !== false && $configFile !== '' && is_file($configFile)) {
        $loaded = include $configFile;
        if (is_array($loaded)) {
            foreach ($loaded as $key => $value) {
                if (isset($cfg[$key]) && is_scalar($value)) $cfg[$key] = (string)$value;
            }
        }
    }

    $envMap = array(
        'BH_DB_HOST' => 'host',
        'BH_DB_USER' => 'user',
        'BH_DB_PASS' => 'pass',
        'BH_DB_NAME' => 'name',
    );
    foreach ($envMap as $env => $key) {
        $value = getenv($env);
        if ($value !== false && $value !== '') $cfg[$key] = $value;
    }

    return $cfg;
}

$bh_db = bh_db_config();

// Legacy names are kept because many pages include this file and then read them.
$servername = $bh_db['host'];
$appco_user = $bh_db['user'];
$password = $bh_db['pass'];
$dbname = $bh_db['name'];

// Used by pages that build absolute URLs such as http://$server/...,
// so it is left at its historical value rather than following the DB host.
$server = getenv('BH_APP_SERVER');
if ($server === false || $server === '') $server = '192.168.0.22';

$db = mysqli_connect($servername, $appco_user, $password, $dbname) or die("Could not open connection to serve, if the problem persists email: support@BetterHealth.Co.Ke");

function bh_require_auth()
{
    if (isset($_SESSION['valid_user']) && $_SESSION['valid_user'] !== '') return;
    if (!headers_sent()) {
        header('Content-Type: text/plain charset=utf-8');
        header('HTTP/1.1 403 Forbidden');
    }
    echo 'Authentication required.';
    exit;
}

function bh_current_user()
{
    return isset($_SESSION['valid_user']) ? $_SESSION['valid_user'] : null;
}

function bh_authz_mode()
{
    // 'enforce' is the default and applies the business matrix in accesstbl to
    // the panels declared in access_map.php. BH_AUTHZ_MODE=log is the emergency
    // rollback: attempts are still recorded but nobody is blocked.
    $mode = getenv('BH_AUTHZ_MODE');
    return ($mode === 'log') ? 'log' : 'enforce';
}

function bh_panel_codes($endpoint, $panel)
{
    static $map = null;
    if ($map === null) {
        $file = __DIR__ . '/access_map.php';
        $map = is_readable($file) ? include $file : array();
        if (!is_array($map)) $map = array();
    }

    if (!isset($map[$endpoint])) return null;
    $panels = $map[$endpoint];
    $panel = (string)$panel;

    if (isset($panels[$panel])) return $panels[$panel];

    // The app compares panel ids loosely, so 22, '22' and '22.0' are the same
    // panel. Fall back to a numeric comparison before calling it unknown.
    if (is_numeric($panel)) {
        $want = (float)$panel;
        foreach ($panels as $k => $codes) {
            if (is_numeric($k) && (float)$k === $want) return $codes;
        }
    }
    return null;
}

function bh_accesstbl_granted()
{
    global $db;
    static $cache = null;
    if ($cache !== null) return $cache;

    $user = bh_current_user();
    if ($user === null) return null;

    $pos = isset($GLOBALS['usertype']) ? trim((string)$GLOBALS['usertype']) : '';
    if ($pos === '') {
        $q = mysqli_prepare($db, "SELECT position FROM users WHERE name = ? LIMIT 1");
        if ($q) {
            mysqli_stmt_bind_param($q, 's', $user);
            mysqli_stmt_execute($q);
            $p = null;
            mysqli_stmt_bind_result($q, $p);
            $rc = mysqli_stmt_fetch($q);
            if ($rc === true || $rc === 0) $pos = trim((string)$p);
            mysqli_stmt_close($q);
        }
    }
    if ($pos === '' || !preg_match('/^[A-Za-z0-9_]+$/', $pos)) return null;

    $col = '`' . $pos . '`';
    $res = @mysqli_query($db, "SELECT AccessCode FROM accesstbl WHERE $col = 'YES'");
    if ($res === false) return null;

    $granted = array();
    while ($r = mysqli_fetch_assoc($res)) $granted[(int)$r['AccessCode']] = true;
    mysqli_free_result($res);

    // A role with no grants at all is a configuration problem, not a decision.
    if (!$granted) return null;

    $cache = $granted;
    return $cache;
}

function bh_enforce_panel($endpoint, $panel)
{
    if (bh_current_user() === null) return;

    $codes = bh_panel_codes($endpoint, $panel);
    if ($codes === null) {
        // Not a screen the business menu declares: recorded for review only.
        bh_authz_note($endpoint, $panel, 1, 'unmapped');
        return;
    }

    $granted = bh_accesstbl_granted();
    if ($granted === null) {
        bh_authz_note($endpoint, $panel, 1, 'no-matrix');
        return;
    }

    $ok = false;
    foreach ($codes as $c) {
        if (isset($granted[(int)$c])) { $ok = true; break; }
    }

    bh_authz_note($endpoint, $panel, $ok ? 1 : 0, $ok ? 'granted' : 'denied');
}


function bh_wildcard_match($pattern, $value)
{
    if ($pattern === '*' || $pattern === '') return true;
    $re = '/^' . str_replace('\*', '.*', preg_quote($pattern, '/')) . '$/i';
    return (bool)preg_match($re, (string)$value);
}

function bh_authz_permitted($position, $scope, $panel)
{
    global $db;

    static $rules = null;
    if ($rules === null) {
        $rules = array();
        $res = mysqli_query($db, "SELECT position, scope, panel_pattern FROM role_permissions");
        if ($res) {
            while ($r = mysqli_fetch_assoc($res)) {
                $rules[] = $r;
            }
            mysqli_free_result($res);
        }
    }

    // An empty rule table means nothing has been configured yet, so access is
    // allowed and merely logged.
    if (!$rules) return true;

    foreach ($rules as $r) {
        if ($r['position'] !== '' && $r['position'] !== '*'
            && strcasecmp((string)$r['position'], (string)$position) !== 0) continue;
        if (!bh_wildcard_match($r['scope'], $scope)) continue;
        if (!bh_wildcard_match($r['panel_pattern'], $panel)) continue;
        return true;
    }
    return false;
}

function bh_authz_note($scope, $panel, $verdict = null, $reason = '')
{
    $user = bh_current_user();
    if ($user === null) return;

    global $db;
    static $seen = array();

    $panel = (string)$panel;
    $key = $scope . '|' . $panel;
    if (isset($seen[$key])) return;
    $seen[$key] = true;

    $position = isset($GLOBALS['usertype']) ? (string)$GLOBALS['usertype'] : '';
    $dept = isset($GLOBALS['userdep']) ? (string)$GLOBALS['userdep'] : '';

    if ($position === '') {
        $q = mysqli_prepare($db, "SELECT position, dept FROM users WHERE name = ? LIMIT 1");
        if ($q) {
            mysqli_stmt_bind_param($q, 's', $user);
            mysqli_stmt_execute($q);
            $p = null;
            $d = null;
            mysqli_stmt_bind_result($q, $p, $d);
            $rc = mysqli_stmt_fetch($q);
            if ($rc === true || $rc === 0) {
                $position = (string)$p;
                $dept = (string)$d;
            }
            mysqli_stmt_close($q);
        }
    }

    // An explicit verdict from bh_enforce_panel wins; otherwise fall back to
    // the optional role_permissions override table (empty => allow).
    if ($verdict === null) {
        $allowed = bh_authz_permitted($position, $scope, $panel) ? 1 : 0;
        if ($reason === '') $reason = 'override';
    } else {
        $allowed = $verdict ? 1 : 0;
    }
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

    $stmt = mysqli_prepare(
        $db,
        "INSERT INTO access_log (username, position, dept, scope, panel, ip, allowed, reason, created_at) VALUES (?,?,?,?,?,?,?,?,NOW())"
    );
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssssss', $user, $position, $dept, $scope, $panel, $ip, $allowed, $reason);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if (mt_rand(1, 200) === 1) {
            mysqli_query($db, "DELETE FROM access_log WHERE created_at < DATE_SUB(NOW(), INTERVAL 30 DAY)");
        }
    }

    if (!$allowed && bh_authz_mode() === 'enforce') {
        if (!headers_sent()) {
            header('Content-Type: text/plain charset=utf-8');
            header('HTTP/1.1 403 Forbidden');
        }
        echo 'You are not permitted to open this screen.';
        exit;
    }
}

?>