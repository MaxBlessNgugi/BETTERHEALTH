<?php

require_once(__DIR__ . '/includes/db_fns.php');

if (!defined('BH_LOGIN_MAX_USER_FAILS')) {
    define('BH_LOGIN_MAX_USER_FAILS', 8);
    define('BH_LOGIN_MAX_IP_FAILS', 20);
    define('BH_LOGIN_WINDOW_MINUTES', 15);
    define('BH_LOGIN_LOCKOUT_MINUTES', 10);
}

function bh_stmt_fetch_row($stmt)
{
    // mysqli_stmt_fetch() returns bool TRUE for a fetched row on PHP 7 and int 0
    // on PHP 8, and NULL when there is no row to fetch. mysqli_stmt_num_rows()
    // reports 0 here even when a row exists, so the fetch return value is the
    // only dependable signal.
    $rc = mysqli_stmt_fetch($stmt);
    return ($rc === true || $rc === 0);
}

function bh_client_ip()
{
    // X-Forwarded-For is deliberately ignored: there is no trusted proxy in
    // front of this app, so a client could otherwise spoof it to dodge limits.
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
}

function bh_count_recent_failures($column, $value)
{
    global $db;
    if (!in_array($column, array('username', 'ip'), true)) return 0;

    $since = date('Y-m-d H:i:s', time() - (BH_LOGIN_WINDOW_MINUTES * 60));
    $count = 0;

    $stmt = mysqli_prepare(
        $db,
        "SELECT COUNT(*) FROM login_attempts WHERE success = 0 AND attempted_at > ? AND $column = ?"
    );
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ss', $since, $value);
        mysqli_stmt_execute($stmt);
        $cnt = null;
        mysqli_stmt_bind_result($stmt, $cnt);
        if (bh_stmt_fetch_row($stmt)) {
            $count = (int)$cnt;
        }
        mysqli_stmt_close($stmt);
    }
    return $count;
}

function bh_login_is_locked($username)
{
    // Both counters are keyed only on values the client supplied, so an unknown
    // username accumulates failures exactly like a real one and the reply stays
    // identical either way.
    if (bh_count_recent_failures('username', $username) >= BH_LOGIN_MAX_USER_FAILS) return true;
    if (bh_count_recent_failures('ip', bh_client_ip()) >= BH_LOGIN_MAX_IP_FAILS) return true;
    return false;
}

function bh_record_attempt($username, $success)
{
    global $db;
    $ip = bh_client_ip();
    $flag = $success ? 1 : 0;

    $stmt = mysqli_prepare($db, "INSERT INTO login_attempts (username, ip, success, attempted_at) VALUES (?,?,?,NOW())");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $username, $ip, $flag);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    if ($success) {
        // A legitimate sign-in clears the account's earlier failures so someone
        // who fumbled the keyboard is not left sitting on the threshold.
        $clear = mysqli_prepare($db, "DELETE FROM login_attempts WHERE username = ? AND success = 0");
        if ($clear) {
            mysqli_stmt_bind_param($clear, 's', $username);
            mysqli_stmt_execute($clear);
            mysqli_stmt_close($clear);
        }
    } elseif (mt_rand(1, 50) === 1) {
        mysqli_query($db, "DELETE FROM login_attempts WHERE attempted_at < DATE_SUB(NOW(), INTERVAL 1 DAY)");
    }
}

function bh_login_failed($username = '')
{
    if ($username !== '') {
        bh_record_attempt($username, false);
        // Randomised stall so a scripted run cannot measure how fast guesses fail.
        usleep(300000 + mt_rand(0, 400000));
    }
    echo "<img src=\"images/delete.png\" style=\"margin-top:10px\"  width=\"30\" height=\"30\"/>";
    exit;
}

function bh_login_locked($username = '')
{
    bh_record_attempt($username, false);
    echo "<img src=\"images/delete.png\" style=\"margin-top:10px\"  width=\"30\" height=\"30\"/>";
    echo "<p>Too many failed sign-in attempts. Please wait "
        . BH_LOGIN_LOCKOUT_MINUTES . " minutes and try again.</p>";
    exit;
}

if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    if (!headers_sent()) {
        header('Content-Type: text/plain charset=utf-8');
        header('HTTP/1.1 405 Method Not Allowed');
    }
    echo 'Method not allowed.';
    exit;
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['passwd']) ? $_POST['passwd'] : '';

if ($username === '' || $password === '') {
    bh_login_failed();
}

if (bh_login_is_locked($username)) {
    bh_login_locked($username);
}

$stmt = mysqli_prepare($db, "SELECT name, password, dept FROM users WHERE name = ? AND status = 1 LIMIT 1");
if (!$stmt) {
    bh_login_failed();
}

mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);

$db_name = null;
$db_pass = null;
$db_dept = null;
mysqli_stmt_bind_result($stmt, $db_name, $db_pass, $db_dept);

$found = bh_stmt_fetch_row($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);

if (!$found) {
    bh_login_failed($username);
}

$stored = $db_pass === null ? '' : (string)$db_pass;
$login_ok = false;
$needs_upgrade = false;

if (preg_match('/^[0-9a-f]{40}$/i', $stored)) {
    if (hash_equals(strtolower($stored), sha1($password))) {
        $login_ok = true;
        $needs_upgrade = true;
    }
} elseif ($stored !== '' && password_verify($password, $stored)) {
    $login_ok = true;
    if (password_needs_rehash($stored, PASSWORD_DEFAULT)) {
        $needs_upgrade = true;
    }
}

if (!$login_ok) {
    bh_login_failed($username);
}

if ($needs_upgrade) {
    $rehash = password_hash($password, PASSWORD_DEFAULT);
    $up = mysqli_prepare($db, "UPDATE users SET password = ? WHERE name = ?");
    if ($up) {
        mysqli_stmt_bind_param($up, 'ss', $rehash, $db_name);
        mysqli_stmt_execute($up);
        mysqli_stmt_close($up);
    }
}

$canonical_user = $db_name;
$userdep = $db_dept === null ? '' : stripslashes($db_dept);

session_regenerate_id(true);
$_SESSION['valid_user'] = $canonical_user;

bh_record_attempt($canonical_user, true);

$remote = bh_client_ip();
$d1 = date('YmdHi');
$d2 = date('H:i');
$d3 = date('d/m/Y');

$a = mysqli_prepare($db, "INSERT INTO logintable VALUES('',?,?)");
if ($a) {
    mysqli_stmt_bind_param($a, 'ss', $canonical_user, $remote);
    mysqli_stmt_execute($a);
    mysqli_stmt_close($a);
}

$logmsg = $canonical_user . ' logs into system-COMPUTER IP ADDRESS:' . $remote;
$b = mysqli_prepare($db, "INSERT INTO log VALUES('',?,?,?,?,?,'1')");
if ($b) {
    mysqli_stmt_bind_param($b, 'sssss', $logmsg, $canonical_user, $d1, $d2, $d3);
    mysqli_stmt_execute($b);
    mysqli_stmt_close($b);
}

$section_categories = array(
    'lab'            => 'LABORATORY',
    'pharmaceutical' => 'PHARMACEUTICALS',
    'dda'            => 'DDA',
    'housekeeping'   => 'HOUSEKEEPING',
    'stationery'     => 'STATIONERY',
    'general'        => 'GENERAL',
    'kitchen'        => 'KITCHEN',
    'rad'            => 'RADIOLOGY',
    'amb'            => 'AMBULANCE',
    'dental'         => 'DENTAL',
    'eye'            => 'EYECLINIC',
    'phy'            => 'PHYSIOTHERAPY',
    'theatre'        => 'THEATRE',
    'opd'            => 'OPD SERVICES',
    'cus'            => 'CUSTOMERCARE',
    'mobile'         => 'MOBILECLINIC',
    'mch'            => 'MCH',
    'inpatient'      => 'NURSING',
    'counselling'    => 'COUNSELLING',
    'dialysis'       => 'DIALYSIS',
    'nutrition'      => 'NUTRITION',
    'vct'            => 'VCT',
    'mortuary'       => 'MORTUARY',
    'ward'           => 'WARD',
);

$sec_cols = array_keys($section_categories);
$categories = array();

$sec = mysqli_prepare($db, "SELECT " . implode(',', $sec_cols) . " FROM sections WHERE branch = ? LIMIT 1");
if ($sec) {
    mysqli_stmt_bind_param($sec, 's', $userdep);
    if (mysqli_stmt_execute($sec)) {
        $vals = array_fill(0, count($sec_cols), null);
        mysqli_stmt_bind_result($sec, ...$vals);
        if (bh_stmt_fetch_row($sec)) {
            foreach ($sec_cols as $i => $col) {
                if ((string)$vals[$i] === '1') {
                    $categories[] = $section_categories[$col];
                }
            }
            if ((string)$vals[array_search('pharmaceutical', $sec_cols, true)] === '1') {
                $categories[] = 'NONPHARMACEUTICALS';
            }
        }
        mysqli_stmt_free_result($sec);
    }
    mysqli_stmt_close($sec);
}

if (!$categories) {
    $categories[] = '__NO_SECTION_ENABLED__';
}

$clauses = array();
foreach ($categories as $label) {
    $clauses[] = "Category='" . mysqli_real_escape_string($db, $label) . "'";
}
$_SESSION['rights'] = '(' . implode(' or ', $clauses) . ')';

echo 0;