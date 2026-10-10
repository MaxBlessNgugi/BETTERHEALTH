<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('in-ovc2', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/../includes/functions.php');
include __DIR__ . '/../includes/func.php';
include(__DIR__ . '/../includes/compile.php');
//$ser=$_GET['ser'];
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
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
<title>Better Health OPD Visits Comparision Report</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>

</head>
<body>
	<?php require_once __DIR__ . '/../includes/render.php'; echo bh_skip_link('#bh-main'); ?>
<?php

// case 27:

if(isset($_GET['d1'])){
    $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
    $d2=$_GET['d2'];
}else $d2=0;
?>
<div style="width:740px;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL BALANCE SHEET</p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong style="font-size:11px">As at: <?php  echo dateprint($d2) ?></strong></p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px" ></div>



<div style="width:auto; height:20px; border-bottom:1px solid #fff;  border-top:1.5px solid #333; background:#333">
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Assets</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Liabilities & Equity</p>
</div>
</div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item</p>
</div>
<div style="width:113px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">KShs.</p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item.</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">KShs.</p>
</div>
</div>
<?php ini_set('display_errors', 0);  date_default_timezone_set('Africa/Nairobi'); error_reporting(0); session_start(); $db ='';
    $server='192.168.8.196';
    $servername = "localhost";
    $appco_user = getenv('APPCOSYS_USERNAME'); 
    $appco_pass = getenv('APPCOSYS_PASSWORD');
    #$dbname = 'bh_lcmh_210124_1800';
    $dbname = 'bh_lcmh_db';
    $dbconnect = mysqli_connect($servername, $appco_user, $appco_pass, $dbname) or die("Could not open connection to serve, if the problem persists email: support@BetterHealth.Co.Ke");


    
?>

<div style="width:370px;float:left;">
<?php
$a=0;$u=0;

$result = mysqli_query($dbconnect, "CALL sp_opdPatientsVisitComparision()"); 
$num_results = mysqli_num_rows($result);
for ($u=0; $u <$num_results; $u++) {
$row=mysqli_fetch_array($result);

$a+=$bal;
if($u%2==0){
    echo'<div style="width:366px; height:20px; border-bottom:1.5px solid #333;"  id="normal'.$i.'">';
    }else{
        echo'<div style="width:366px; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
    }
?>

<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php echo stripslashes($row['MonthName']); ?>
</p>
</div>

<div style="width:113px; height:20px;border-right:2.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script>
</p>
</div>
</div>  
<?php
}


?>
</div>
<div style="width:370px;float:left; border-bottom:1.5px solid #333">
<?php
$b=0;$v=0;

$res254 = "call sp_opdClientsVisitComparision2();";
$result = mysqli_query($dbconnect,$res254);
#$result = mysqli_query($db, "CALL sp_opdPatientsVisitComparision2"); 
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);

#if($type=='Liability'){
$b+=$bal;
if($i%2==0){
    echo'<div style="width:366px; height:20px; border-bottom:1.5px solid #333;"  id="normal'.$i.'">';
    }else{
        echo'<div style="width:366px; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
    }
?>

<div style="width:250px; height:20px;border-right:1.5px solid #333;border-left:2.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">111111<?php echo stripslashes($row['PatientType']); ?>
</p>
</div>

<div style="width:113px; height:20px;border-right:0px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo $bal ?>).formatMoney(2, '.', ','));</script>
</p>
</div>

</div>  
<?php
$v++;
#} 
}
?>
</div>



<div style="clear:both; margin-bottom:10px" ></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Total Assets</p>
</div>
<div style="width:113px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo  $a-$h ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Total Liabilities & Equity</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo  $b+$c-$d+$g ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
// break;

?>          

</body>
</html>
