<?php include(__DIR__ . '/includes/db_fns.php');

bh_require_auth();

$uploaddir = 'C:\xampp\htdocs\Better-Health\upload/';

if (!is_dir($uploaddir)) {
    @mkdir($uploaddir, 0775, true);
}

$file  = isset($_POST['value']) ? $_POST['value'] : '';
$name  = isset($_POST['name']) ? $_POST['name'] : '';
$stamp = isset($_POST['stamp']) ? $_POST['stamp'] : '';

$fail = 'Something went wrong. Check that the file isn\'t corrupted';

$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt');

$base = basename(str_replace('\\', '/', $name));
$ext  = strtolower(pathinfo($base, PATHINFO_EXTENSION));

if ($base === '' || $base === '.' || $base === '..' || strpos($base, '.') === 0) {
    echo $fail;
    exit;
}

if (!in_array($ext, $allowed_ext, true)) {
    echo $fail;
    exit;
}

$parts = explode(',', $file);
if (!isset($parts[1])) {
    echo $fail;
    exit;
}

$encodedData = str_replace(' ', '+', $parts[1]);
$decodedData = base64_decode($encodedData, true);

if ($decodedData === false) {
    echo $fail;
    exit;
}

if (file_put_contents($uploaddir . $base, $decodedData, LOCK_EX)) {
    echo $base . ":uploaded successfully";

    $stmt = mysqli_prepare($db, "INSERT INTO empdocs VALUES('0',?,'','',?,?,?,'1')");
    if ($stmt) {
        $d1 = date('d/m/Y');
        $d2 = date('Ymd');
        mysqli_stmt_bind_param($stmt, 'ssss', $stamp, $base, $d1, $d2);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
} else {
    echo $fail;
}