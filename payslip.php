<?php include(__DIR__ . '/includes/db_fns.php');

bh_require_auth();
include(__DIR__ . '/includes/functions.php');
$id=$_GET['id'];
$mon=$_GET['mon'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
<title>B-HEALTH  PaySlips</title>
<script src="js/functions.js"></script>
</head>
<body>
<?php

switch($id){
case 1:
$emp=$_GET['emp'];
$result =mysqli_query($db, "select * from payroll where month='".$mon."' and emp='".$emp."'");
payslp($result);
break;

case 2:
$query =mysqli_query($db, "select * from  payroll where month='".$mon."'");
$count = mysqli_num_rows($query);
for ($i=0; $i <$count; $i++) {
$row=mysqli_fetch_array($query);
$emp=stripslashes($row['emp']);
$result =mysqli_query($db, "select * from  payroll where month='".$mon."' and emp='".$emp."'");
payslp($result);
}

break;
}
?>


</body>
</html>