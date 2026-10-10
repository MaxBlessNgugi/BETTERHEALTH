<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('patreport', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/includes/functions.php');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
}else{echo"<script>window.location.href = \"index.php\";</script>";exit;}
$reg=$_GET['reg']; 
$id=$_GET['id'];?>
<script src="js/functions.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<title>Better Health Patient Chart</title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css"/>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/blue.css" />
<link type="text/css" rel="stylesheet" href="css/blue.css" media="print" />

<script src="assets/vendor/ui/jquery.ui.position.js"></script>
<script type="text/javascript">
		Cufon.replace('h1,h2');
</script>
<script>
function doPrint(delay){
	alert('');
 delay = delay || 5; //default to 5 seconds
 $('link[media*="print"]').attr("href",url+"css/print.css");
 setTimeout(function(){window.print();},delay*1000);
}
</script>
</head>
<body>
	<a class="bh-skip" href="#bh-main">Skip to main content</a>
	<div id="bh-main" tabindex="-1"></div>

<?php

switch($id){
case 1:
$result =mysqli_query($db, "select * from patients where pntno='".$reg."'");
$num_results = mysqli_num_rows($result);
if($num_results>=1){
$result2 =mysqli_query($db, "select * from documents where Pntno='".$reg."'");
studreport($result,$result2,$server,$usertype);
}else{echo'<script>notregistered();</script>';} 
break;


break;
}

?>
<!-- End Wrapper -->
</body>
</html>
