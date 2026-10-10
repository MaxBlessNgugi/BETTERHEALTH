<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('random-stock-take', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/../includes/functions.php');
include __DIR__ . '/../includes/func.php';
//$ser=$_GET['ser'];
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}
//echo $username;
$result4 =mysqli_query($db, "select * from users where name='".$username."'");
$row4=mysqli_fetch_array($result4);
$fullname=stripslashes($row4['fullname']);

// $id=$_GET['id'];
// if(isset($_GET['rcptno'])){
// $rcptno=$_GET['rcptno']; //$pid=$_GET['pid']; 
// }

$result =mysqli_query($db, "select * from company");
$row=mysqli_fetch_array($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$tel=stripslashes($row['Tel']);
$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../css/tokens.css" />
<link rel="stylesheet" href="../css/components.css" />
<title>Better Health Random Stock Take Report</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>


<style>
/*@font-face { font-family: Merchant; src: url('../fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}*/
</style>

</head>

<body>
	<?php require_once __DIR__ . '/../includes/render.php'; echo bh_skip_link('#bh-main'); ?>

<?php 

$name=$_GET['name'];
if($userdep=='PROCUREMENT'){$x='Bal';}else{$x=$userdep;}
?>

<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="../<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL RANDOM STOCK TAKE SHEET<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>Section:<?php  echo $name ?><br/>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:220px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Category</p>
</div>
<div style="width:450px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:220px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Pack Size</p>
</div>
<div style="width:220px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Unit</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Part</p>
</div>
</div>
<?php
if($name=='All'){
	$result =mysqli_query($db, "select * from items where Type='GOOD' and  ".$x.">0 order by RAND(),ItemName asc limit 0,35");
	#$result =mysqli_query($db, "select * from items where Type='GOOD' and  ".$x.">0 order by ItemName asc limit 0,35");
}else{
$result =mysqli_query($db, "select * from items where Type='GOOD' and Category='".$name."' and ".$x.">0 order by RAND(),ItemName asc limit 0,35");
#$result =mysqli_query($db, "select * from items where Type='GOOD' and Category='".$name."' and ".$x.">0 order by ItemName asc limit 0,35");
}
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$pack=stripslashes($row['Pack']) ;
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:220px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['SubCategory']) ?></p>
</div>
<div style="width:450px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:220px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Pack']) ?></p>
</div>
<div style="width:220px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>
</div>
<?php } ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">COUNTED BY:..................................... SIGN:......................</br/></br/>
VERIFIED BY:..................................... SIGN:...................... 
</p><div style="clear:both; margin-bottom:20px"></div>
</div>








<?php



?>          

</body>
</html>
