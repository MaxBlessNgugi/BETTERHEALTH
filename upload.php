<?php
include(__DIR__ . '/includes/db_fns.php');

bh_require_auth();

function bh_safe_stamp($raw)
{
    $s = preg_replace('/[^A-Za-z0-9._-]/', '', (string)$raw);
    if ($s === '' || $s === '.' || $s === '..') return null;
    if (strpos($s, '..') !== false) return null;
    return $s;
}

function bh_images_dir($sub)
{
    $base = realpath(__DIR__);
    if ($base === false) return null;

    $dir = $base . DIRECTORY_SEPARATOR . 'images';
    if ($sub !== '') {
        $dir .= DIRECTORY_SEPARATOR . $sub;
    }

    if (!is_dir($dir)) {
        @mkdir($dir, 0775, true);
    }

    $real = realpath($dir);
    if ($real === false) return null;
    if (strpos($real, $base . DIRECTORY_SEPARATOR) !== 0) return null;

    return $real;
}

function bh_store_upload($sub, $filename, $kind)
{
    if (!isset($_FILES['image']) || !is_array($_FILES['image'])) return null;

    $file = $_FILES['image'];
    if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) return null;
    if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) return null;

    $dir = bh_images_dir($sub);
    if ($dir === null) return null;

    // The stored name is always generated from a vetted stamp and a fixed
    // extension, so whatever the client called the file can never influence the
    // path or the extension on disk.
    $ext = ($kind === 'pdf') ? 'pdf' : 'jpg';
    $target = $dir . DIRECTORY_SEPARATOR . $filename . '.' . $ext;

    if ($kind === 'pdf') {
        $fh = @fopen($file['tmp_name'], 'rb');
        if (!$fh) return null;
        $magic = fread($fh, 5);
        fclose($fh);
        if ($magic !== '%PDF-') return null;
    } else {
        if (@getimagesize($file['tmp_name']) === false) return null;
    }

    if (!@move_uploaded_file($file['tmp_name'], $target)) return null;
    @chmod($target, 0644);

    $rel = 'images/' . ($sub !== '' ? $sub . '/' : '') . $filename . '.' . $ext;
    return $rel;
}

function bh_upload_reply($rel, $stamp)
{
    if ($rel === null) {
        echo '<p>Upload failed.</p>';
        return;
    }

    if (substr($rel, -4) === '.pdf') {
        echo '<img alt="Adobe" style="width:100%; height:100%;" src="images/adobe.png"/>';
    } else {
        echo '<img alt="Htmlspecialchars Rel ENT QUOTES V Mt Rand 0 1000" style="width:100%; height:100%;" src="'
            . htmlspecialchars($rel, ENT_QUOTES) . '?v=' . mt_rand(0, 1000) . '"/>';
    }

    echo '<p style="display:none" id="stamp">' . htmlspecialchars($stamp, ENT_QUOTES) . '</p>';
}

$stamp = isset($_POST['stamp']) ? $_POST['stamp'] : null;
$regno = isset($_POST['regno']) ? $_POST['regno'] : null;
$id    = isset($_POST['id']) ? (int)$_POST['id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />	<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />  <title>Upload - BETTER-HEALTH HMIS</title>
  </head>
  <body>
	<?php require_once __DIR__ . '/includes/render.php'; echo bh_skip_link('#bh-main'); ?>
	<div id="bh-main" tabindex="-1"></div>
	<script>
$('#lei2').html('<iframe name="leiframe2" id="leiframe" class="leiframe" src="" style="margin-right:40px"></iframe>');
	</script>

  <?php
  switch ($id) {
    case 1:
    case 2:
        $safe = bh_safe_stamp($stamp);
        if ($safe === null) { bh_upload_reply(null, ''); break; }
        bh_upload_reply(bh_store_upload('patients', $safe, 'image'), $safe);
        break;

    case 3:
    case 4:
        $safe = bh_safe_stamp($stamp);
        if ($safe === null) { bh_upload_reply(null, ''); break; }
        bh_upload_reply(bh_store_upload('users', $safe, 'image'), $safe);
        break;

    case 5:
    case 6:
        $safe = bh_safe_stamp($stamp);
        if ($safe === null) { bh_upload_reply(null, ''); break; }
        $rel = bh_store_upload('employees', $safe, 'image');
        if ($id === 6 && $rel !== null && $regno !== null && $regno !== '') {
            // Note: the employee table has no image column, so this update has
            // never taken effect. Kept prepared so it works if that is added.
            $up = mysqli_prepare($db, "UPDATE employee SET image = ? WHERE emp = ?");
            if ($up) {
                mysqli_stmt_bind_param($up, 'ss', $rel, $regno);
                mysqli_stmt_execute($up);
                mysqli_stmt_close($up);
            }
        }
        bh_upload_reply($rel, $safe);
        break;

    case 7:
    case 9:
        $type   = isset($_POST['type']) ? $_POST['type'] : '';
        $pntno  = isset($_POST['pntno']) ? $_POST['pntno'] : '';
        $fname  = isset($_POST['fname']) ? $_POST['fname'] : '';
        $presc  = isset($_POST['presc']) ? $_POST['presc'] : '';

        if ($id === 9) {
            $details = isset($_POST['details'])
                ? $_POST['details']
                : 'Radiology Image scan-Patient no:' . $pntno . '-Date:' . date('d/m/Y');
            $safe = bh_safe_stamp(date('dHis') . mt_rand(1, 100));
        } else {
            $details = isset($_POST['details']) ? $_POST['details'] : '';
            $safe = bh_safe_stamp($stamp);
        }

        if ($safe === null || ($type !== 'Image' && $type !== 'Document')) {
            bh_upload_reply(null, '');
            break;
        }

        $kind = ($type === 'Document') ? 'pdf' : 'image';
        $rel = bh_store_upload('Documents', $safe, $kind);
        if ($rel === null) { bh_upload_reply(null, ''); break; }
        bh_upload_reply($rel, $safe);

        $d1 = date('d/m/Y');
        $d2 = date('Ymd');

        if ($id === 7) {
            $ins = mysqli_prepare(
                $db,
                "INSERT INTO documents (Type, Pntno, Name, Link, Details, Date, Stamp, Status) VALUES (?,?,?,?,?,?,?,'1')"
            );
            if ($ins) {
                mysqli_stmt_bind_param($ins, 'sssssss', $type, $pntno, $fname, $rel, $details, $d1, $d2);
                mysqli_stmt_execute($ins);
                mysqli_stmt_close($ins);
            }
        } else {
            $ins = mysqli_prepare(
                $db,
                "INSERT INTO raddocuments (Type, PrescId, Pntno, Name, Link, Details, Date, Stamp, Status) VALUES (?,?,?,?,?,?,?,?,'1')"
            );
            if ($ins) {
                mysqli_stmt_bind_param($ins, 'ssssssss', $type, $presc, $pntno, $fname, $rel, $details, $d1, $d2);
                mysqli_stmt_execute($ins);
                mysqli_stmt_close($ins);
            }
        }
        break;

    case 8:
        $rel = bh_store_upload('', 'clogo', 'image');
        bh_upload_reply($rel, 'clogo');
        break;
  }
  ?>
  </body>
</html>