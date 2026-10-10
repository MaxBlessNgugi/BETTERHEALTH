<?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('output', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
#include(__DIR__ . '/includes/functions.php'); 
#include(__DIR__ . '/includes/func.php');
include __DIR__ . '/includes/func.php';
#require_once __DIR__ . '/includes/func.php';
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}

							
function dateprint($date){
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}


?>
<?php
$id=$_GET['id'];
if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno'];}
$result =mysqli_query($db, "select * from company");
$row=mysqli_fetch_array($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$tel=stripslashes($row['Tel']);
$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);
switch($id){
	case 1:
	$title='Better Health Payroll Bank Summary';
	break;
	case 2:
	$title='Better Health Individual Payroll Bank Summary';
	break;
	case 3:
	$title='Better Health Messages Reports';
	break;
	case 4:
	$title='Better Health Queue Management Reports ';
	break;
	case 5:
	$title='Better Health Interim OutPatient Invoices';
	break;
	case 726:
	$title='Better Health Interim OutPatient Invoices';
	break;
	case 6:
	$title='Better Health Consolidated Outpatient Invoice ';
	break;
	
	case 7:
	$title='Better Health Stock Valuation Report ';
	break;
	
	case 8:
	$title='Better Health Goods Price List';
	break;
	case 9:
	$title='Better Health Goods Returned Report';
	break;
	
	case 10:
	$title='Better Health Goods Returned Invoice Listing Report ';
	break;
	
	case 11:
	$title='Better Health Random Stock Take ';
	break;
	
	case 12:
	$title='Better Health Stock Valuation Report ';
	break;
	
	case 13:
	$title='Better Health Out Patients Reports ';
	break;

	case 13.3:
	$title='Better Health Unregistered Patients Reports ';
	break;
		
	case 14:
	$title='Better Health Open Invoices Reports ';
	break;
	
	case 15:
	$title='Better Health Summary Report ';
	break;
	
	case 16:
	$title='Better Health Patients Review Reports ';
	break;
	
	case 17:
	$title='Better Health Pharmacy Dispenses Reports ';
	break;
	case 18:
	$title='Better Health Debtors Receipts ';
	break;
	
	case 19:
	$title='Better Health LPO Summary ';
	break;
	
	case 20:
	$title='Better Health Stock Transfer Summary ';
	break;

	case 21:
	$title='Better Health Waiver Reports ';
	break;
	
	case 22:
	$title='Better Health Counselling Reports ';
	break;

	case 23:
	$title='Better Health Lab Reports ';
	break;


	case 24:
	$title='Better Health Radiology Reports ';
	break;

	case 25:
	$title='Better Health Pharmacy Reports ';
	break;

	case 26:
	$title='Better Health Theatre Reports ';
	break;

	case 27:
	$title='Better Health Assets List';
	break;
	
	case 28:
	$title='Better Health Asset Tracking Report';
	break;

	case 29:
	$title='Better Health Daily Summary Report';
	break;

	case 30:
	$title='Better Health In Patients Reports ';
	break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<title><?php echo $title ?></title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>

<script src="js/functions.js"></script>
<!-- <link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script> -->
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<link type="text/css" rel="stylesheet" href="css/tokens.css">
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script src="js/excellentexport.js"></script>
<style>
p{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:12px; }
#title{position:relative; float:left;width:auto; background:#333; border:0px solid #ccc;font-size:10px}
#figure1{position:relative; float:left;width:141.0px; margin-right:2px; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:13px; color:#fff;  background:#333; text-align:center}
.figure2x,#figure2x,.figure2x,#figure2{position:relative; float:left;width:141.7px; border-right:1px solid #333; border-bottom:1px solid #333; margin:0; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:13px; color:#333;  background:none; text-align:center;min-height:16px}
.cleaner { clear: both; width: 100%; height: 0px; font-size: 0px;  }
.cleaner_h5 { clear: both; width:100%; height: 5px; }
.cleaner_h10 { clear: both; width:100%; height: 10px; }
.normal,#normal{position:relative; float:left;width:auto; background:#f0f0f0; border-left:1px solid #333; cursor:pointer}
.normal:hover,#normal:hover{background:#C0E4E7}
.put_field{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:12px; text-align:center}
</style>
<script type="text/javascript" src="js/bh-grid.js"></script>
</head>

<body style="background:" id="body">
	<?php require_once __DIR__ . '/includes/render.php'; echo bh_skip_link('#bh-main'); ?> 

<?php 
switch($id){
case 1:
$reg=$_GET['reg'];

?>
<div style="width:740px;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL PAYROLL BANK SUMMARY<br/><strong style="font-size:11px">Month:<?php  echo $reg ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Bank</p>
</div>
<div style="width:50px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Emp.ID</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Employee Name</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Department</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Amount</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from payroll where month='".$reg."' order by bname");
						$totalnet=0;$totaltax=0;
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
								$totalnet+=stripslashes($row['net']);
								
							
							if(stripslashes($row['status'])==0){
							echo"<script>
							$('#body').hide();
										$().customAlert();
									alert('Error!', '<p>Cannot Preview Payroll.Details of ".stripslashes($row['name'])." have not been saved yet!</p>');
									e.preventDefault();
									</script>";	
								exit;	
							}
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['bname']) ?></p>
</div>
<div style="width:50px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['emp']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['name']) ?></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['dept']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>
<?php
$arr=array();
$result =mysqli_query($db, "select * from payroll where month='".$reg."'");
$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['bid'])]=stripslashes($row['bname']);
							}
$pro=array();							
foreach ($arr as $key => $val) {
	$tot=0;
	$result =mysqli_query($db, "select * from payroll where month='".$reg."' and bid='".$key."'");
	$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$tot+=stripslashes($row['net']);
							}
		$pro[$val]=stripslashes($tot);			
}

?>
<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
foreach ($pro as $key => $val) {
echo"<p style=\"text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px\">".$key.": <script>document.writeln((".$val.").formatMoney(2, '.', ','));</script></p>";	
}
?>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total: <script>document.writeln(( <?php  echo $totalnet ?>).formatMoney(2, '.', ','));</script></p>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 2:
$mon=$_GET['mon'];
$bank=$_GET['bank'];
$result =mysqli_query($db, "select * from banktbl where id='".$bank."'");
$row=mysqli_fetch_array($result);
$bname=stripslashes($row['bank']);
?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INDIVIDUAL PAYROLL BANK SUMMARY<br/><strong style="font-size:11px">Month:<?php  echo $mon ?></strong><br/><strong style="font-size:11px">Bank:<?php  echo $bname ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Emp.ID</p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Employee Name</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Department</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Amount</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from payroll where month='".$mon."' and bid='".$bank."' order by name");
						$totalnet=0;$totaltax=0;
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
								$totalnet+=stripslashes($row['net']);
								
							
							if(stripslashes($row['status'])==0){
							echo"<script>
							$('#body').hide();
										$().customAlert();
									alert('Error!', '<p>Cannot Preview Payroll.Details of ".stripslashes($row['name'])." have not been saved yet!</p>');
									e.preventDefault();
									</script>";	
								exit;	
							}
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>


<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['emp']) ?></p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['name']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['dept']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total: <script>document.writeln(( <?php  echo $totalnet ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 3:
$reg=$username;
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['code'])){
	$code=$_GET['code'];
}else $code=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL MESSAGES REPORT<br/><strong style="font-size:11px">User:<?php  echo $reg ?></strong><br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo  dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Summary  Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Date</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">From</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">To</p>
</div>
<div style="width:700px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Message</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Status</p>
</div>
</div>
<?php
if($code==1){
$result =mysqli_query($db, "select * from messages where name='".$reg."' or sender='".$reg."' limit 0,100");
}
else if($code==2){
$result =mysqli_query($db, "select * from messages where (name='".$reg."' or sender='".$reg."') and stamp>='".$d1."' and stamp<='".$d2."'");
}
else{
$result =mysqli_query($db, "select * from messages where name='".$reg."' or sender='".$reg."'");	
}
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['date']) ?></p>
</div>
<?php if(stripslashes($row['sender'])==$reg){
echo"<div style=\"width:100px; height:20px;border-right:1.5px solid #333; float:left;\">
<p style=\"text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px\">Me</p>
</div>
<div style=\"width:100px; height:20px;border-right:1.5px solid #333; float:left;\">
<p style=\"text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px\">".stripslashes($row['name'])."</p>
</div>	";
}else{
echo"<div style=\"width:100px; height:20px;border-right:1.5px solid #333; float:left;\">
<p style=\"text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px\">".stripslashes($row['sender'])."</p>
</div>
<div style=\"width:100px; height:20px;border-right:1.5px solid #333; float:left;\">
<p style=\"text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px\">Me</p>
</div>	";	
	
}
?>

<div style="width:700px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['message']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php if(stripslashes($row['status'])==1){echo 'Read'; } else {echo 'Not Read';}?></p>
</div>
</div>
<?php } ?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 4:
$reg=$_GET['reg'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL QUEUE REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo  dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Today's  Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Date</p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Patient</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Start</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Triage</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Consultation</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Laboratory</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Radiology</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pharmacy</p>
</div>
</div>
<?php
$resultb =mysqli_query($db, "select * from queue where id=1");
$rowb=mysqli_fetch_array($resultb);


if($reg==1){
$result =mysqli_query($db, "select * from newprescription where Stamp='".date('Ymd')."' order by PrescId desc");
}
else if($reg==3){
	$result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' order by PrescId desc");
}
else{
	$result =mysqli_query($db, "select * from newprescription  order by PrescId desc");
}
	
	
	
	$num_results = mysqli_num_rows($result);	$a=$b=$c=$d=$e='-';$v=$w=$x=$y=$z=0;$k=$l=$m=$n=$o=0;
	for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		$pid=stripslashes($row['PrescId']);
if(stripslashes($row['TriageTime'])!=''){
$a=timeconvert(stripslashes($row['TriageTime']),stripslashes($row['StartTime']));
$v+=$a;$k++;
}
if(stripslashes($row['ConsTime'])!=''&&stripslashes($row['TriageTime'])!=''){
$b=timeconvert(stripslashes($row['ConsTime']),stripslashes($row['TriageTime']));
$w+=$b;$l++;
}
if(stripslashes($row['LabTime'])!=''&&stripslashes($row['ConsTime'])!=''){
$c=timeconvert(stripslashes($row['LabTime']),stripslashes($row['ConsTime']));
$x+=$c;$m++;
}
if(stripslashes($row['RadTime'])!=''&&stripslashes($row['ConsTime'])!=''){
$d=timeconvert(stripslashes($row['RadTime']),stripslashes($row['ConsTime']));
$y+=$d;$n++;
}
if(stripslashes($row['PharmTime'])!=''&&stripslashes($row['ConsTime'])!=''){
$e=timeconvert(stripslashes($row['PharmTime']),stripslashes($row['ConsTime']));
$z+=$e;$o++;
}
	
							
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden; ">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo dateprint(stripslashes($row['TransDate'])) ?></p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['PatName']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['StartTime']) ?></p>
</div>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php if($a=='-'){echo"";}else if(stripslashes($rowb['triage'])<$a){echo"".stripslashes($row['TriageTime'])."[<b>".$a."</b>]";}
	else {echo"".stripslashes($row['TriageTime'])."[<b>".$a."</b>]";} ?></p></div>
    
 <div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php if($b=='-'){echo"";}else if(stripslashes($rowb['cons'])<$b){echo"".stripslashes($row['ConsTime'])."[<b>".$b."</b>]";}
	else {echo"".stripslashes($row['ConsTime'])."[<b>".$b."</b>]";} ?></p></div>
    
   <div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php if($c=='-'){echo"";}else if(stripslashes($rowb['lab'])<$c){echo"".stripslashes($row['LabTime'])."[<b>".$c."</b>]";}
	else {echo"".stripslashes($row['LabTime'])."[<b>".$c."</b>]";} ?></p></div>
    
    <div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php if($d=='-'){echo"";}else if(stripslashes($rowb['rad'])<$d){echo"".stripslashes($row['RadTime'])."[<b>".$d."</b>]";}
	else {echo"".stripslashes($row['RadTime'])."[<b>".$d."</b>]";} ?></p></div>
    
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php if($e=='-'){echo"";}else if(stripslashes($rowb['pharm'])<$e){echo"".stripslashes($row['PharmTime'])."[<b>".$e."</b>]";}
	else {echo"".stripslashes($row['PharmTime'])."[<b>".$e."</b>]";} ?></p>
</div>
</div>
<?php } 
echo'<div style="clear:both; margin-bottom:30px"></div>';
$arr1=$arr2=$arr3=$arr4=array();
if($k==0){$k=1;}if($l==0){$l=1;}if($m==0){$m=1;}if($n==0){$n=1;}if($o==0){$o=1;}
$a=$v/$k;
$b=$w/$l;
$c=$x/$m;
$d=$y/$n;
$e=$z/$o;



					$arr1[]="'Triage'";$arr1[]="'Consultation'";$arr1[]="'Laboratory'";$arr1[]="'Radiology'";$arr1[]="'Pharmacy'";
					$arr2[]=$a;$arr2[]=$b;$arr2[]=$c;$arr2[]=$d;$arr2[]=$e;
					$xx=implode($arr1,",");$yy=implode($arr2,",");
	
	echo"<div style=\"float:left\"><p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Average Time Curve</p>";
	echo'<canvas id="line1" height="200" width="400"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$xx.'],
			datasets : [
				{
					fillColor : "#0369A1",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$yy.']
				}
			]
			
		}

	new Chart(document.getElementById("line1").getContext("2d")).Line(lineChartData);
	</script>
	</div>';
	
	$k=((stripslashes($rowb['triage'])-$a)*100)/stripslashes($rowb['triage']);
	$l=((stripslashes($rowb['cons'])-$b)*100)/stripslashes($rowb['cons']);
	$m=((stripslashes($rowb['lab'])-$c)*100)/stripslashes($rowb['lab']);
	$n=((stripslashes($rowb['rad'])-$d)*100)/stripslashes($rowb['rad']);
	$o=((stripslashes($rowb['pharm'])-$e)*100)/stripslashes($rowb['pharm']);
	$arr3[]=$k;$arr3[]=$l;$arr3[]=$m;$arr3[]=$n;$arr3[]=$o;
	$zz=implode($arr3,",");
	
	
	
	
	echo"<div style=\"float:left\"><p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Efficieny Bar Chart</p>";
	echo'<canvas id="bar" height="200" width="500"></canvas>
	
<script>

		var barChartData = {
			labels : ['.$xx.'],
			datasets : [
				
				
				{
					fillColor : "#DC2626",
					strokeColor : "#ccc",
					data : ['.$zz.']
				}
			]
			
		}

	new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
	
	</script></div>';
	
	$g=((stripslashes($rowb['triage'])-$a)*100);if($g<0){$g=0;}
	$h=((stripslashes($rowb['cons'])-$b)*100);if($h<0){$h=0;}
	$i=((stripslashes($rowb['lab'])-$c)*100);if($i<0){$i=0;}
	$j=((stripslashes($rowb['rad'])-$d)*100);if($j<0){$j=0;}
	$k=((stripslashes($rowb['pharm'])-$e)*100);if($k<0){$k=0;}
	
	echo"<div style=\"float:left\"><p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Efficieny Pie Chart</p>";
	echo'<canvas id="canvas" height="300" width="300"></canvas>


	<script>

		var pieData = [
				{
					value: '.$g.',
					color:"#F7464A"
				},
				{
					value: '.$h.',
					color : "#46BFBD"
				},
				{
					value: '.$i.',
					color : "#FDB45C"
				},
				{
					value: '.$j.',
					color : "#949FB1"
				},
				{
					value: '.$k.',
					color : "#4D5360"
				}
			
			
			];

	var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
	
	</script>
	<p style="margin-top:0px"><input type="button" style="background:#F7464A; height:10px; width:10px;"/><small style="margin-top:-15px">Triage</small>	
		<input type="button" style="background:#46BFBD; height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">Consultation</small>	
		<input type="button" style="background:#FDB45C; height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">Laboratory</small>	
			<input type="button" style="background:#949FB1; height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">Radiology</small>	<input type="button" style="background:#4D5360; height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">Pharmacy</small>
		</p>
			
	</div>';
?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 5:
$pagesize=15;
$result =mysqli_query($db, "select * from receipts where rcptno='".$rcptno."' and paymode='Companies'");
$num_results = mysqli_num_rows($result);
		if($num_results<1){
			exit;
		}
$row=mysqli_fetch_array($result);
$patname=stripslashes($row['patname']);
$comam=stripslashes($row['amount']);
$patid=stripslashes($row['patid']);
$time=stripslashes($row['time']);
$date=dateprint(stripslashes($row['date']));


function heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time){
	
?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>
<div style="width:816px;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333">

<div style="width:60.0%; border-right:1px DASHED #333; float:left">

<img alt="Logorep" src="images/logorep.jpg" style="float:left;max-height:105px; width:90px; margin:0px 10px 0 10px; "/>
<p style="text-align:left; font-weight:bold;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo $comname ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?><br/>W: <?php  echo $web ?><br/>E: <?php  echo $email ?></p>
</div>

<div style="width:20.0%; border-right:1px DASHED #333; float:left">

</div>

<div style="width:39.0%; float:left">
<p style="text-align:left;font-size:10px; margin-right:50px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patient: <?php  echo $patname ?></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Invoice No: <?php  echo $rcptno ?></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Date:<?php  echo date('d/m/Y') ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo convtime($time) ?></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patient No: <?php  echo $patid ?></p>

<div style="clear:both; margin-bottom:10px" ></div>
</div>

<div style="clear:both; margin-bottom:0px; border-bottom:2px solid #333"></div>

 <div style="width:16.0%; border-right:1px solid #333; float:left">
    <p style="text-align:left; font-weight:bold;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10 10 20 10px;">INVOIVE TO :</p>
    <div style="clear:both; margin-bottom:47px;"></div>

    </div>

    <div style="width:40.0%; border-right:2px solid #333; float:left">
    <p style="text-align:left;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;<?php  echo $patname?></p>
    <div style="clear:both; margin-bottom:5px; border-bottom:2px solid #333"></div>
    <p style="text-align:left;font-size:11px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;OUT-PATIENT</p>
  
    </div>

    <div style="width:39.0%; border-right:2px solid #ff;float:left">
    <p style="text-align:center;font-size:14px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">OFFICIAL INTERIM INVOICE</p>
    <div id="barcode" style="font-family: Merchant; font-size:14px; font-weight:normal;"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>

    </div>

    <div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>


<div style="width:816px;   height:25px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Item name</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Qty.</p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Price.</p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Total.</p>
</div>
</div>
<?php

}

function loop112($row,$itot){
?>
<div style="width:816px;   height:25px; border-bottom:1.5px solid #333">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;font-weight:normal;   margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px"><script>document.writeln(( <?php  echo $itot ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php	
	
}

function footing($qty,$b,$d){
?>

<div style="width:816px;   height:25px; border-bottom:2px solid #333;  border-top:1px solid #333">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Total</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></a>
</div>
</div>
</div>
<?php 


}


function finalhead($tam,$cashier,$comam,$posted){
?>	
<div>
<div style="clear:both; margin-bottom:20px"></div>
<div style="width:816px;   height:25px; border:2px solid #333;">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Total Amount Billed</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?
if($tam!=$comam){
?>
<div style="width:816px;   height:25px; border:2px solid #333; border-top:0;">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Amount Paid:</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam-$comam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?	
}
?>

<div style="width:816px;   height:25px; border:2px solid #333; border-top:0;">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Claim Amount:</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $comam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="width:816px;min-height:30px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center; width:816px;  margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center; width:816px;  margin:0 0 0 0px">Prepared By <?php  echo $cashier ?>.</p>
</div>

</div>
<?php
}
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);
$dept=stripslashes($row['Category']);
$part=explode('.',($num_results/$pagesize));
$part=$part[0];
$part+=1;
$dd=0;
$tam=0;
for ($kk=0; $kk <$part; $kk++) {
		
		$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."'  limit ".$dd.",".$pagesize."");
		$qty=0;$itot=0;$b=0;$c=0;$d=0;
		$num_results = mysqli_num_rows($result);
		if($num_results>0){
		heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time);
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		
		$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
		$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
		$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
		$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
		$b+=$itot;
		
		loop112($row,$itot);
		
		}
		$tam+=$b;
		 footing($qty,$b,$d);
		}
		
		$dd+=$pagesize;
		
}

$result =mysqli_query($db, "select * from users where name='".$cashier."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$cashier=stripslashes($row['fullname']);

$result =mysqli_query($db, "select * from users where name='".$posted."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$posted=stripslashes($row['fullname']);

finalhead($tam,$cashier,$comam,$posted);

break;

case 726:
$rcptno=$_GET['rcptno'];
$pid=$_GET['pid'];

$pagesize=15;
//$result =mysqli_query($db, "select * from receipts where rcptno='".$rcptno."' and patid='".$pid."' and paymode='Companies' and date='".date('Y/m/d')."' ");//20211109
$result =mysqli_query($db, "select * from receipts where patid='".$pid."' and stamp='".date('Ymd')."' and rcptno='".$rcptno."' and paymode='Companies'");
//echo date('Ymd'); //exit;
$num_results = mysqli_num_rows($result);
		if($num_results<1){
			exit;
		}
$row=mysqli_fetch_array($result);
$patname=stripslashes($row['patname']);
$comam=stripslashes($row['amount']);
$patid=stripslashes($row['patid']);
$time=stripslashes($row['time']);
$date=dateprint(stripslashes($row['date']));


function heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time){
	
?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>
<div style="width:816px;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333">

<div style="width:60.0%; border-right:1px DASHED #333; float:left">

<img alt="Logorep" src="images/logorep.jpg" style="float:left;max-height:105px; width:90px; margin:0px 10px 0 10px; "/>
<p style="text-align:left; font-weight:bold;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo $comname ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?><br/>W: <?php  echo $web ?><br/>E: <?php  echo $email ?></p>
</div>

<div style="width:20.0%; border-right:1px DASHED #333; float:left">

</div>

<div style="width:39.0%; float:left">
<p style="text-align:left;font-size:10px; margin-right:50px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patient: <?php  echo $patname ?></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Invoice No: <?php  echo $rcptno ?></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Date:<?php  echo date('d/m/Y') ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo convtime($time) ?></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patient No: <?php  echo $patid ?></p>

<div style="clear:both; margin-bottom:10px" ></div>
</div>

<div style="clear:both; margin-bottom:0px; border-bottom:2px solid #333"></div>

 <div style="width:16.0%; border-right:1px solid #333; float:left">
    <p style="text-align:left; font-weight:bold;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10 10 20 10px;">INVOIVE TO :</p>
    <div style="clear:both; margin-bottom:47px;"></div>

    </div>

    <div style="width:40.0%; border-right:2px solid #333; float:left">
    <p style="text-align:left;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;<?php  echo $patname?></p>
    <div style="clear:both; margin-bottom:5px; border-bottom:2px solid #333"></div>
    <p style="text-align:left;font-size:11px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;OUT-PATIENT</p>
  
    </div>

    <div style="width:39.0%; border-right:2px solid #ff;float:left">
    <p style="text-align:center;font-size:14px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">OFFICIAL INTERIM INVOICE</p>
    <div id="barcode" style="font-family: Merchant; font-size:14px; font-weight:normal;"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>

    </div>

    <div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>


<div style="width:816px;   height:25px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Item name</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Qty.</p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Price.</p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">Total.</p>
</div>
</div>
<?php

}

function loop112($row,$itot){
?>
<div style="width:816px;   height:25px; border-bottom:1.5px solid #333">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;font-weight:normal;   margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px"><script>document.writeln(( <?php  echo $itot ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php	
	
}

function footing($qty,$b,$d){
?>

<div style="width:816px;   height:25px; border-bottom:2px solid #333;  border-top:1px solid #333">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Total</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></a>
</div>
</div>
</div>
<?php 


}


function finalhead($tam,$cashier,$comam,$posted){
?>	
<div>
<div style="clear:both; margin-bottom:20px"></div>
<div style="width:816px;   height:25px; border:2px solid #333;">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Total Amount Billed</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?
if($tam!=$comam){
?>
<div style="width:816px;   height:25px; border:2px solid #333; border-top:0;">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Amount Paid:</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam-$comam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?	
}
?>

<div style="width:816px;   height:25px; border:2px solid #333; border-top:0;">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Claim Amount:</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $comam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="width:816px;min-height:30px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center; width:816px;  margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center; width:816px;  margin:0 0 0 0px">Prepared By <?php  echo $cashier ?>.</p>
</div>

</div>
<?php
}
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ClientId='".$pid."' and Cashier !='' and Stamp='".date('Ymd')."' ");
//$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);
$dept=stripslashes($row['Category']);
$part=explode('.',($num_results/$pagesize));
$part=$part[0];
$part+=1;
$dd=0;
$tam=0;
for ($kk=0; $kk <$part; $kk++) {
		
		$result =mysqli_query($db, "select * from sales where ClientId='".$pid."' and Cashier !='' and RcptNo='".$rcptno."'  limit ".$dd.",".$pagesize."");
		$qty=0;$itot=0;$b=0;$c=0;$d=0;
		$num_results = mysqli_num_rows($result);
		if($num_results>0){
		heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time);
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		
		$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
		$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
		$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
		$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
		$b+=$itot;
		
		loop112($row,$itot);
		
		}
		$tam+=$b;
		 footing($qty,$b,$d);
		}
		
		$dd+=$pagesize;
		
}

$result =mysqli_query($db, "select * from users where name='".$cashier."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$cashier=stripslashes($row['fullname']);

$result =mysqli_query($db, "select * from users where name='".$posted."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$posted=stripslashes($row['fullname']);

finalhead($tam,$cashier,$comam,$posted);

break;

case 6:
$rcptno=$_GET['rcptno'];
$pid=$_GET['pid'];

$pagesize=10;
if($rcptno==''){exit;}
//$result =mysqli_query($db, "select * from receipts where invno='".$rcptno."' and patid='".$pid."' and paymode='Companies' and stamp='".date('Ymd')."' ");
$result =mysqli_query($db, "select * from receipts where patid='".$pid."' and  invno='".$rcptno."' and paymode='Companies'");
$num_results = mysqli_num_rows($result);
//$patid=stripslashes($row['patid']);

// if($num_results<1){
// 	echo"<script>window.location.href = \"report.php?id=67&rcptno=".$rcptno."&pid=".$patid."\";</script>";
// 	}
$comam=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$comam+=preg_replace('~,~', '', stripslashes($row['amount']));	
}
		
$patname=stripslashes($row['patname']);
$patid=stripslashes($row['patid']);
$cname=stripslashes($row['cname']);
$cardno=stripslashes($row['cardno']);
$time=stripslashes($row['time']);
$date=dateprint(stripslashes($row['date']));


function heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$cname,$cardno,$time){
?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>
<div style="width:100%;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:25px;   margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;    margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;    margin:0 0 0 0px; ">OFFICIAL INVOICE</p>
<div id="barcode" style="font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>
<p style="text-align:center;    margin:0px 0 0 0px;border-bottom:1px dashed #333;border-top:1px dashed #333; padding:5px 0">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo convtime($time) ?>&nbsp; &nbsp;&nbsp;&nbsp;Invoice No: <?php  echo $rcptno ?>&nbsp; &nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp; Patient Name: <?php  echo $patname ?>
&nbsp; &nbsp;&nbsp;&nbsp;Patient No: <?php  echo $patid ?></p>
<?php
$resultx =mysqli_query($db, "select * from patients where pntno='".$patid."'");
$rowx=mysqli_fetch_array($resultx);
?>
<p style="text-align:center;    margin:0px 0 0 0px;border-bottom:1px dashed #333; padding:5px 0">Insurance:<?php  echo $cname ?>&nbsp; &nbsp;&nbsp;&nbsp;Company:<?php  echo stripslashes($rowx['company']) ?>&nbsp; &nbsp;&nbsp;&nbsp;Card No: <?php  echo $cardno ?></p>
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Convert to Pdf" src="images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-43px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>

<div style="width:auto;  height:25px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:300px;  height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Item name</p>
</div>
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Qty.</p>
</div>
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Price.</p>
</div>
<div>
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Total.</p>
</div>
</div>
<?php

}

function loop112($row,$itot){
?>
<div style="width:auto;  height:25px; border-bottom:1px solid #333">
<div style="width:300px;  height:25px;border-right:1px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;font-weight:normal;  margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px"><script>document.writeln(( <?php  echo $itot ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php	
	
}


function footing($qty,$b,$d){
?>

<div style="width:auto;  height:25px; border-bottom:2px solid #333;  border-top:1px solid #333">
<div style="width:300px;  height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">Total</p>
</div>
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></a>
</div>
</div>
<?php 


}

function dephead($dep){
?>
<div style="width:auto;  height:25px; border-bottom:2px solid #333;  border-top:0px solid #333; margin-top:20px">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px"><?php  echo $dep ?></p>

</div>
<?php
}
function finalhead($tam,$fullname,$comam){
?>	
<div>
<div style="clear:both; margin:20px 0"></div>
<div style="width:auto; height:25px; border-top:2px solid #333;border-bottom:2px solid #333;">
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">TOTAL AMOUNT BILLED</p>
</div>
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>
</div>
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?
if($tam!=$comam){
?>
<div style="width:auto; height:25px; border-top:2px solid #333;border-bottom:2px solid #333; border-top:0;">
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">AMOUNT PAID:</p>
</div>
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>
</div>
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam-$comam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?	
}
?>

<div style="width:auto; height:25px;  border-top:2px solid #333;border-bottom:2px solid #333;border-top:0;">
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">CLAIM AMOUNT:</p>
</div>
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>
</div>
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"><script>document.writeln(( <?php  echo $comam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both; margin-bottom:40px"></div>
<p style="float:right;    margin:0 5px 0 0px">Signature........................</p>
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;    margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;    margin:0 0 0 0px">You were Served By <?php  echo $fullname ?>.</p>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">System Developers: APPCO SYSTEMS (www.betterhealth.co.ke)</p>
</div>
</div>
<?php
}
heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$cname,$cardno,$time);
$arr=array();
$result =mysqli_query($db, "select * from sales where ClientId='".$patid."' and InvNo='".$rcptno."' and Cashier !='' ");
//$result =mysqli_query($db, "select * from sales where InvNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {

$row=mysqli_fetch_array($result);
$arr[stripslashes($row['Category'])]=stripslashes($row['Category']);
}

		$tam=0;
		foreach ($arr as $key => $val) {
		dephead($val);
		$result =mysqli_query($db, "select * from sales where ClientId='".$patid."' and InvNo='".$rcptno."'  and Category='".$val."'");
		$qty=0;$itot=0;$b=0;$c=0;$d=0;
		$num_results = mysqli_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					
					$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
					$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
					$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
					$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
					$b+=$itot;
					
					loop112($row,$itot);
					
					}
		$tam+=$b;
		 footing($qty,$b,$d);
		}
		
	


finalhead($tam,$fullname,$comam);

break;
case '6.1':
break;
case 7:
$dept=$_GET['dept'];
$section=$_GET['section'];
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VALUATION REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>Dept:  <?php  echo $dept ?><br/>Section:  <?php  echo $section ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:450px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden" id="example">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item Name</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Pack Size</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Unit</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Part</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
if($section=='All'&&$dept=='PROCUREMENT'){
		$result =mysqli_query($db, "select * from items where Type='GOOD' and Bal>0 order by ItemName asc,Category asc");
		$x='Bal';
	}
	
else if($section=='All'&&$dept!='PROCUREMENT'){
		$x=$dept;
		$result =mysqli_query($db, "select * from items where Type='GOOD' and ".$x.">0 order by ItemName asc,Category asc");
	
	}

else if($section!='All'&&$dept=='PROCUREMENT'){
	
	$result =mysqli_query($db, "select * from items where Type='GOOD' and Bal>0 and Category='".$section."' order by ItemName asc,Category asc");
		$x='Bal';
	}
else if($section!='All'&&$dept!='PROCUREMENT'){
		$x=$dept;
		$result =mysqli_query($db, "select * from items where Type='GOOD' AND  ".$x.">0 and Category='".$section."' order by ItemName asc,Category asc");
	
	}
	

$j=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$pack=stripslashes($row['Pack']) ;
$qty=stripslashes($row[$x]);
$part=$qty%$pack;
$unit=explode('.',($qty/$pack));
$unit=$unit[0];
$total=$qty*stripslashes($row['PurchPrice']);
$j+=$total;


if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:450px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Pack']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $unit ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $part ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Valuation: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 8:
function loop5($row,$i){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
	}
?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['ItemCode']) ?></p>
</div>
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Pack']) ?></p>
</div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['SalePrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php
}
$date=date('d/m/Y');
$code=$_GET['code'];
?>
<div style="width:940px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK PRICE LIST REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?php if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Category:&nbsp;&nbsp;<?php  echo $_GET['name'] ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Price List Report</p>
<?php } ?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Code</p>
</div>

<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pack Size</p>
</div>

<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Retail Price (Part)</p>
</div>
</div>
<?php
switch($code){
	case 1:
	$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	loop5($row,$i);
	}
	break;
	
	case 2:
	$name=$_GET['name'];
	$result =mysqli_query($db, "select * from items where Category='".$name."' and  Type='GOOD' order by ItemName");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	loop5($row,$i);
	}
	break;
	
}

	

	

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 9:

$date=date('Y/m/d');
$code=$_GET['code'];

if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

function loop6($row,$i){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'" title="Reason:'.stripslashes($row['reason']).'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#D1D1D1 "  id="normal'.$i.'" title="Reason:'.stripslashes($row['reason']).'">';
	}
?>

<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo dateprint(stripslashes($row['date'])) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['gnrno']) ?></p>
</div>

<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['sname']) ?></p></div>

<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['itemname']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['batch']) ?></p></div>

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['unit']) ?></p></div>

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['part']) ?></p></div>

<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['pprice']) ?>).formatMoney(2, '.', ','));</script></p></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['total']) ?></p>
</div>
</div>
<?php }
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL GOODS RETURNED REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?php if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item ID:&nbsp;<?php  echo $_GET['name'];?></p>
<?php } 
 if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full  Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GRN No</p>
</div>
<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Supplier</p>
</div>
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Batch</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Part</p>
</div>
<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Price</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
switch($code){
case 1:
	if($d1==0){
	$result =mysqli_query($db, "select * from goodsreturned");
	}
	else{
	$result =mysqli_query($db, "select * from goodsreturned  where stamp>='".$d1."' and stamp<='".$d2."'");
	}
$a=0;$b=0;$c=0;$d=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['total']));
	loop6($row,$i);
	}
break;
case 2:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from goodsreturned where code='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from goodsreturned  where code='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
	}
$a=0;$b=0;$c=0;$d=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['total']));
	loop6($row,$i);
	}
break;
case 3:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from goodsreturned where sname='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from goodsreturned  where sname='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
	}
$a=0;$b=0;$c=0;$d=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['total']));
	loop6($row,$i);
	}

break;

}
?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Cost: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 10:


$date=date('d/m/Y');
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

function loop13($i,$a,$b,$c,$d,$e){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#D1D1D1 "  id="normal'.$i.'">';
	}
?>

<div style="width:205px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo dateprint($a)?></p>
</div>

<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $b ?></p></div>

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $c?></p>
</div>

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></p></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $e?></p>
</div>
</div>
<?php }
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL GOODS RETURNED INVOICE LISTING REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?PHP
 if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full  Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:205px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Supplier</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GRN No.</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">UserName</p>
</div>
</div>
<?php




$pos=array(array());
if($d1==0){
	$total=0;
			$result =mysqli_query($db, "select * from goodsreturned");
			$arr=array();
			$num_results = mysqli_num_rows($result);
			for ($i=0; $i <$num_results; $i++) {
				$row=mysqli_fetch_array($result);
			$arr[stripslashes($row['gnrno'])]= stripslashes($row['id']);
			}
			
			$i=0;
			foreach ($arr as $key => $val) {
			$resulta =mysqli_query($db, "select * from goodsreturned where id='".$val."'");
			$row=mysqli_fetch_array($resulta);
			loop13($i,stripslashes($row['date']),stripslashes($row['sname']),stripslashes($row['gnrno']),stripslashes($row['totalamount']),stripslashes($row['username']));
			$i++;
			$total+=stripslashes($row['totalamount']);
			}
	}
	else{
		
			$total=0;
			
			$result =mysqli_query($db, "select * from goodsreturned where stamp>='".$d1."' and stamp<='".$d2."'");
			$arr=array();
			$num_results = mysqli_num_rows($result);
			for ($i=0; $i <$num_results; $i++) {
				$row=mysqli_fetch_array($result);
			$arr[stripslashes($row['gnrno'])]= stripslashes($row['id']);
			}
			
			$i=0;
			foreach ($arr as $key => $val) {
			$resulta =mysqli_query($db, "select * from goodsreturned where id='".$val."'");
			$row=mysqli_fetch_array($resulta);
			loop13($i,stripslashes($row['date']),stripslashes($row['sname']),stripslashes($row['gnrno']),stripslashes($row['totalamount']),stripslashes($row['username']));
			$i++;
			$total+=stripslashes($row['totalamount']);
			}
	}
	

?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Amount: <script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 11:
$name=$_GET['name'];
if($userdep=='PROCUREMENT'){$x='Bal';}else{$x=$userdep;}
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
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
}else{
$result =mysqli_query($db, "select * from items where Type='GOOD' and Category='".$name."' and ".$x.">0 order by RAND(),ItemName asc limit 0,35");
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
break;
case 12:
$fname=strtolower($rcptno).'_stock_valuation';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VALUATION REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>Branch:  <?php  echo $rcptno ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<table id="datatable" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<th scope="col"  style="width:40%;">Item Name</th>
        <th scope="col"  style="width:12%;">Pack Size</th>
        <th scope="col"  style="width:12%;">Unit</th>
       <th scope="col"  style="width:12%;">Part</th>
        <th scope="col"  style="width:23%;">Total</th>
    </tr></thead><tbody>
<?php
if($rcptno=='PROCUREMENT'){
	$result =mysqli_query($db, "select * from items where Type='GOOD' and Bal>0 order by ItemName asc,Category asc");
	$x='Bal';
}
else{
	$x=$rcptno;
	$result =mysqli_query($db, "select * from items where Type='GOOD' AND  ".$_SESSION['rights']." and ".$x.">0 order by ItemName asc,Category asc");

}
$j=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$pack=stripslashes($row['Pack']) ;
$qty=stripslashes($row[$x]);
$part=$qty%$pack;
$unit=explode('.',($qty/$pack));
$unit=$unit[0];
$total=$qty*stripslashes($row['PurchPrice']);
$j+=$total;


if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ItemName']) ?></td>
       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Pack']) ?></td>
      <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $unit ?></td>
          <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $part ?></td>
        <td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Valuation: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 13:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$fname='patient_visit_reports';

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php
if($code==1){
	$x='Outpatient Reports';
}
else if($code==2){
	$x='Inpatient Reports';
}
else{
	$x='All patient Reports';
}
echo $x;
?>
<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<table id="datatable-2" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<th scope="col"  style="width:12%;">No.</th>
        <th scope="col"  style="width:12%;">Date</th>
        <th scope="col"  style="width:12%;">Patient Id</th>
       <th scope="col"  style="width:40%;">Patient Name</th>
        <th scope="col"  style="width:23%;">Dept</th>
    </tr></thead><tbody>


<?php
	if($code==1&&$d1==0){
	$result =mysqli_query($db, "select * from newprescription");
	$y='Dept';
	}
	else if($code==1&&$d1!=0){
	$result =mysqli_query($db, "select * from  newprescription where Stamp>='".$d1."' and Stamp<='".$d2."'");
	$y='Dept';
	}
	else if($code==2&&$d1==0){
	$result =mysqli_query($db, "select * from inpatients");
	$y='MainWard';
	}
	else if($code==2&&$d1!=0){
	$result =mysqli_query($db, "select * from  inpatients where Stamp>='".$d1."' and Stamp<='".$d2."'");
	$y='MainWard';
	}
	
	$xx=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);



		if($i%2==0){
				echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
				}else{
					echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
		?>
				<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo  $xx ?></td>
		   		<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo dateprint(stripslashes($row['TransDate'])) ?></td>
		       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
		      	<td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatName']) ?></td>
		       <td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row[$y]) ?></td>
		    </tr>



<?php

$xx++;
 } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 13.3:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$fname='patient_visit_reports';

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php
$x='Unregistered Patients Reports';
echo $x;
?>
<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<table id="datatable-3" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<th scope="col"  style="width:12%;">No.</th>
        <th scope="col"  style="width:12%;">Date</th>
       <th scope="col"  style="width:40%;">Patient Name</th>
       <th scope="col"  style="width:12%;">Department</th>
       <th scope="col"  style="width:12%;">Amount</th>
       <th scope="col"  style="width:12%;">Rcpt No.</th>
    </tr></thead><tbody>


<?php
	if($d1==0){
	$result =mysqli_query($db, "select * from receipts where (patid = '0' or patid = '' or isnull(patid) or patid = '000')");
	$y='Dept';
	}else if($d1!=0){
	$result =mysqli_query($db, "select * from receipts where (patid = '0' or patid = '' or isnull(patid) or patid = '000') and Stamp>='".$d1."' and Stamp<='".$d2."'");
	$y='Dept';
	}
	$xx=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);



		if($i%2==0){
				echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
				}else{
					echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
		?>
				<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo  $xx ?></td>
		   		<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo dateprint(stripslashes($row['date'])) ?></td>
		      	<td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patname']) ?></td>
		       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['category']) ?></td>
		       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['amount']) ?></td>
		       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
		    </tr>



<?php

$xx++;
 } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 14:
#moved 2 report3 case 2 | open-invoice-summary
$rcptno=$_GET['rcptno'];
$title='Better Health Open Invoices Reports ';
echo $rcptno;
echo $title;
?>

<?php
break;

case 101:
$date=date('Y/m/d');
$code=$_GET['code'];
$result =mysqli_query($db, "select * from creditcustomers where CustomerId='".$code."'");
$row=mysqli_fetch_array($result);
$cname=stripslashes($row['CustomerName']);
$fname=clean(strtolower($cname)).'_statement';
$pagesize=16;


if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
	
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>


<div style="width:100%;min-height:790px; border:2px solid #333; margin-bottom:10px">
<div style="clear:both; margin-bottom:10px"></div>
<div style="float:left">
<p style="text-align:left;font-size:25px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo strtoupper($comname) ?></p>
<div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:30px 0 0 10px">TO:<br/><strong style="font-size:15px"><?php  echo $cname ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Full Statement Report</p>
<?php } ?>

</div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin-left:30%; position:relative;top:30px"/>
<p style="text-align:right;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-80px 10px 0 10px">OFFICIAL  STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img alt="Convert to Pdf" src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>

<div style="clear:both; margin-bottom:10px"></div>


<table id="datatable-4" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<th scope="col"  style="width:11%;">Date</th>
        <th scope="col"  style="width:15%;">Invoice No.</th>
        <th scope="col"  style="width:40%;">Details</th>
        <th scope="col"  style="width:10%;">Dr</th>
        <th scope="col"  style="width:10%;">Cr</th>
        <th scope="col"  style="width:14%;">Balance</th>
    </tr></thead><tbody>


<?php
$d11=preg_replace('~/~', '', $d1); $d22=preg_replace('~/~', '', $d2);
if($d11==0){
$result =mysqli_query($db, "select * from customerdebts where CustomerId='".$code."'");
}
else{
$result =mysqli_query($db, "select * from customerdebts  where CustomerId='".$code."' and Stamp>='".$d11."' and Stamp<='".$d22."'");
}
$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$j=0;$q=0;$k=0;$l=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
		if(stripslashes($row['DrCr'])=='dr'){
		$a+=preg_replace('~,~', '', stripslashes($row['Amount']));
		
		$stamp=stripslashes($row['Stamp']);
		$x=substr(stripslashes($row['Stamp']),0,4);
		$y=substr(stripslashes($row['Stamp']),4,2);
		$z=substr(stripslashes($row['Stamp']),6,2);
		$datex=date('Y');$datey=date('m');$datez=date('d');
		$diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
		$tdiff=($diffx*365)+($diffy*30)+($diffz*1);
		
		if($tdiff<=30){
			$c+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>30&&$tdiff<=60){
			$d+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>60&&$tdiff<=90){
			$e+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>90&&$tdiff<=120){
			$f+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>=120){
			$g+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		}
		if(stripslashes($row['DrCr'])=='cr'){
		$b+=preg_replace('~,~', '', stripslashes($row['Amount']));
		
		$stamp=stripslashes($row['Stamp']);
		$x=substr(stripslashes($row['Stamp']),0,2);
		$y=substr(stripslashes($row['Stamp']),4,2);
		$z=substr(stripslashes($row['Stamp']),6,2);
		$datex=date('Y');$datey=date('m');$datez=date('d');
		$diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
		$tdiff=($diffx*365)+($diffy*30)+($diffz*1);
		
			if($tdiff<=30){
				$h+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>30&&$tdiff<=60){
				$q+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>60&&$tdiff<=90){
				$j+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>90&&$tdiff<=120){
				$k+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>=120){
				$l+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
		}


if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo dateprint(stripslashes($row['Date'])) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['InvoiceNo']) ?></td>
<td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['Description']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">
<?php if(stripslashes($row['DrCr'])=='dr'){?>
<script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script><?php }?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">
<?php if(stripslashes($row['DrCr'])=='cr'){?>
<script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script><?php }?></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['Bal']) ?>).formatMoney(2, '.', ','));</script></td>
<?php } ?>
</tr>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:11%;">CURRENT</td>
        <td  style="width:15%;">1-30 DAYS PAST DUE</td>
        <td  style="width:40%;">31-60 DAYS PAST DUE</td>
        <td  style="width:10%;">61-90 DAYS PAST DUE</td>
        <td  style="width:10%;">OVER 90 DAYS PAST DUE</td>
        <td  style="width:14%;">AMOUNT DUE</td>
    </tr>
<tr style="width:100%; height:20px; padding:0">
   		<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $c-$h ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $d-$q ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $e-$j ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $f-$k ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $g-$l ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $a-$b ?>).formatMoney(2, '.', ','));</script></td>
    </tr>
</tbody>
</table>


<?php
break;

case 15:
?>
<div style="width:100%; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Better Health SUMMARY REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="width:100%;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Better Health INCOME REPORT SUMMARY</p>
<?php


$dept=array(array());
$result =mysqli_query($db, "select * from maindepts order by Branchname");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0);	
}

$result =mysqli_query($db, "select * from maindepts order by BranchId");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept[$i][1]=stripslashes($row['Branchname']);
$dept[$i][0]=stripslashes($row['BranchId']);
$dept[$i][2]=stripslashes($row['Abbr']);
}
$max=count($dept);
for ($x= 0; $x < $max; $x++){
	$dept[$x][2]==0;
}

$months=array();
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
	
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$yy=substr($d1,0,4);
$mm=substr($d1,4,2);

$months[]=$d1;
for($i=0;$i<4;$i++){
	$mm=$mm+1;
	$mm=sprintf("%02d",$mm);
	if($mm>12){$yy=$yy+1;$mm='01';}
	$dd=$yy.$mm;
	if($dd<$d2){
		$months[]=$dd;
	}
}

$months[]=$d2;

function getmonth($month){
	$yy=substr($month,0,4);
	$mm=substr($month,4,2);
	$gg=$yy.'-'.$mm;
	return $gg;
}
$max=count($dept);

			foreach ($months as $key => $val) {
				$result =mysqli_query($db, "select * from sales where Stamp>='".$val."01' and Stamp<='".$val."31' and Status!=0  and ItemCode!=599 and ItemCode!=84");
				$num_results = mysqli_num_rows($result);
				$tot=0;$toc=0;
					for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$tot+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
								for ($x= 0; $x < $max; $x++){
									if($dept[$x][1]==stripslashes($row['Category'])){
										$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
										$dept[$x][3]=$dept[$x][2];
									}
								}
	
						}
						
						$max=count($dept);
	echo'<div style="width:16.0%; border-right:2px solid #333; float:left">
	
	<div style="width:100%; height:20px;background:#333; float:left; overflow:hidden">';
	echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;color:#fff;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".getmonth($val)."</p>";
echo'</div>';						
for ($x= 0; $x < $max; $x++){
	if($dept[$x][3]>0){
		echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept[$x][1].": <script>document.writeln((".$dept[$x][3].").formatMoney(2, '.', ','));</script></p>
		";
	}
		$dept[$x][2]=0;$dept[$x][3]=0;
	}
	echo"<div style=\"clear:both;width:100%; margin-top:5px; border-top:2px dashed #333; float:right\"></div>
	<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">TOTAL:<script>document.writeln((".$tot.").formatMoney(2, '.', ','));</script></p></div>";
	
	}
	
	

	

?><div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Better Health PATIENT VISITS REPORT SUMMARY</p>
</div>

<?PHP
foreach ($months as $key => $val) {
				$result =mysqli_query($db, "select * from encounters where Month='".getmonth($val)."'");
				$row=mysqli_fetch_array($result);
				
	echo'<div style="width:16.0%; height:70px; border-right:2px solid #333; float:left">
	
	<div style="width:100%; height:20px;background:#333; float:left; overflow:hidden">';
	echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;color:#fff;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".getmonth($val)."</p>";
echo'</div>';						
echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">New Patients:".stripslashes($row['NewPatient'])."</p>";
echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">Revisits:".stripslashes($row['Revisit'])."</p>";
echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">Reviews:".stripslashes($row['Review'])."</p>";
echo"</div>";
	
	}


?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Better Health LEDGER VARIANCE REPORTS SUMMARY</p>

<?PHP
$arr=array(array());
$result =mysqli_query($db, "select * from ledgers where ledgerid!=601 order by name");
$num_results = mysqli_num_rows($result); 
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$arr[]=array(stripslashes($row['ledgerid']),stripslashes($row['type']),stripslashes($row['bal']),stripslashes($row['name']));	stripslashes($row['type']);
}

foreach ($months as $key => $val) {
	
$pos=array(array());
$max=count($arr);
for ($i = 1; $i < $max; $i++){
	$a=0;$b=0;$c=0;$d=0;
	$resulta =mysqli_query($db, "select * from generalledger where lid='".$arr[$i][0]."' and stamp<='".$val."31' order by transid desc limit 0,1");
	$num_resultsa = mysqli_num_rows($resulta); 
	$rowa=mysqli_fetch_array($resulta);
	$a=stripslashes($rowa['balance']);
	
	$resultb =mysqli_query($db, "select * from generalledger where lid='".$arr[$i][0]."' and stamp<'".$val."01' order by transid desc limit 0,1");
	$num_resultsb = mysqli_num_rows($resultb); 
	$rowb=mysqli_fetch_array($resultb);
	$b=stripslashes($rowb['balance']);
	
	
	$c=$a-$b;
	$pos[]=array($arr[$i][0],$arr[$i][1],$c,$arr[$i][3]);	
	
	
}

$max=count($pos);
$a=0;$b=0;

echo'<div style="width:16%; border-right:2px solid #333; float:left">
<div style="width:100%; height:20px;background:#333; float:left; overflow:hidden">';
	echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;color:#fff;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".getmonth($val)."</p>";
echo'</div>';	
for ($i = 1; $i < $max; $i++){
$lid=$pos[$i][0];
$type=$pos[$i][1];
$bal=$pos[$i][2];
$name=$pos[$i][3];		
if($bal!=0){			
echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$name.":<script>document.writeln((".$bal.").formatMoney(2, '.', ','));</script></p>";
}
}
echo"</div>";
	

	
}


?>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 16:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
Patients Review Report
<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">No.</p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date</p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Last Date Seen</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Patient Id</p>
</div>

<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Patient Name</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Dept</p>
</div>
</div>
<?php
	
	if($d1==0){
	$result =mysqli_query($db, "select * from  newprescription where Type='Review'");
	}else{
	$result =mysqli_query($db, "select * from  newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Type='Review'");
	}
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	$resultz =mysqli_query($db, "select * from newprescription where PatId='".stripslashes($row['PatId'])."' and Stamp<'".stripslashes($row['Stamp'])."' order by PrescId desc limit 0,1");
	$rowz=mysqli_fetch_array($resultz);
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
	$xx=$i+1;
	?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $xx ?></p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['TransDate'])) ?></p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($rowz['TransDate'])) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PatId'])?></p>
</div>

<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden" title="<?php  echo stripslashes($row['History']) ?>">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PatName']) ?></p>
</div>
<div>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Dept']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;
case 17:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname=strtolower($date).'_pharmacy_dispenses';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">PHARMACY DISPENSES REPORT<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong><br/><strong style="font-size:12px">Category:<?php  echo $name ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-5" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<th scope="col"  style="width:10%;">Date</th>
        <th scope="col"  style="width:19%;">Patient Name</th>
        <th scope="col"  style="width:25%;">Item Name</th>
         <th scope="col"  style="width:15%;">Qty</th>
       <th scope="col"  style="width:19%;">Total</th>
        <th scope="col"  style="width:10%;">User Id</th>
    </tr></thead><tbody>
    

<?php
	if($d1==0){
		if($name=='All'){
			$result =mysqli_query($db, "select * from  sales where Category='PHARMACY' AND Status!=0");
		}
		else if($name=='Unregistered'){
			$result =mysqli_query($db, "select * from  sales  where Category='PHARMACY' AND Status!=0 and ClientId=''");
		}
		else if($name=='Registered'){
			$result =mysqli_query($db, "select * from  sales where  Category='PHARMACY' AND Status!=0 and ClientId!=''");
		}
		else{
		$result =mysqli_query($db, "select * from  sales where  Category='PHARMACY' AND Status!=0");	
		}
	}
	else{
		if($name=='All'){
			$result =mysqli_query($db, "select * from  sales where Category='PHARMACY' AND Status!=0 AND Stamp>='".$d1."' and Stamp<='".$d2."'");
		}
		else if($name=='Unregistered'){
			$result =mysqli_query($db, "select * from  sales  where Category='PHARMACY' AND Status!=0 and ClientId='' AND Stamp>='".$d1."' and Stamp<='".$d2."'");
		}
		else if($name=='Registered'){
			$result =mysqli_query($db, "select * from  sales where  Category='PHARMACY' AND Status!=0 and ClientId!='' AND Stamp>='".$d1."' and Stamp<='".$d2."'");
		}
		else{
		$result =mysqli_query($db, "select * from  sales where  Category='PHARMACY' AND Status!=0 AND Stamp>='".$d1."' and Stamp<='".$d2."'");	
		}
		
	}

	$j=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$j+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	
	
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['Date'])) ?></td>
       <td style="width:19%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ClientName']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ItemName']) ?></td>
       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Qty']) ?></td>
          <td style="width:19%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['TotalPrice']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Posted']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>

	

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Dispensed:<script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 18:
$result =mysqli_query($db, "select * from debtreceipts where id='".$rcptno."'");
$num_results = mysqli_num_rows($result);
if($num_results<1){
			exit;
		}
$row=mysqli_fetch_array($result);
$cname=stripslashes($row['cname']);
$cid=stripslashes($row['cid']);
$amount=stripslashes($row['amount']);
$desc=stripslashes($row['description']);
$bal=stripslashes($row['bal']);
$stamp=stripslashes($row['stamp']);
$user=stripslashes($row['username']);
$date=dateprint(stripslashes($row['date']));
?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>
<div style="width:100%;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:26px; font-weight:normal; margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">OFFICIAL DEBTORS RECEIPT</p>
<div id="barcode" style="font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>

<p style="text-align:center;   font-weight:normal; margin:0px 0 0 0px">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo date('H:i A') ?>&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: <?php  echo $rcptno ?>&nbsp; &nbsp;&nbsp;&nbsp; NAME: 
<label for="debtname" class="bh-visually-hidden">Date:</label><input type="text" id="debtname" value="<?php  echo $cname; ?>" style="border-style: none;width:200px;"/>
&nbsp; &nbsp;&nbsp;&nbsp;DEBTOR No: <?php  echo $cid ?></p>
<div style="clear:both; margin-bottom:10px; border-bottom:1px dashed #333"></div>



<p style="text-align:left; margin-left:10px;  font-weight:normal;">AMOUNT PAID: <script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left; margin-left:10px;  font-weight:normal;">AMOUNT IN WORDS: <script>document.writeln(toWords(<?php echo $amount?>));</script> Kenya shillings only.</p>
<p style="text-align:left; margin-left:10px;  font-weight:normal;">BEING PAYMENT FOR INVOICE NO: <?php  echo $desc ?></p>
<p style="text-align:left; margin-left:10px;  font-weight:normal;">REMAINING Balance: 
<label for="debtbalance" class="bh-visually-hidden">BEING PAYMENT FOR INVOICE NO:</label><input type="text" id="debtbalance" value="<?php  echo $bal; ?>" style="border-style: none;width:100px;"/></p>


<div style="clear:both; margin-bottom:30px"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">THANKYOU FOR YOUR PARTNERSHIP</p>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">Received By
<?php  echo $user ?>.</p>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">System Developers: APPCO SYSTEMS (www.betterhealth.co.ke)</p>
</div>
<?php

break;
case 19:
$date=date('Y/m/d');
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname=strtolower($name).'_lpo_summary';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL LPO SUMMARY<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Supplier:<?php  echo $name ?><br/></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-6" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<th scope="col"  style="width:19%;">Date</th>
   		<th scope="col"  style="width:30%;">Supplier</th>
        <th scope="col"  style="width:30%;">LPO No</th>
        <th scope="col"  style="width:20%;">Amount</th>
    </tr></thead><tbody>

<?php


	if($d1==0&&$name=='All'){
	$result =mysqli_query($db, "select * from lpo");
	}
	else if($d1==0&&$name!='All'){
	$result =mysqli_query($db, "select * from lpo where supplier='".$name."'");
	}
	else if($d1!=0&&$name=='All'){
	$result =mysqli_query($db, "select * from lpo  where stamp>='".$d1."' and stamp<='".$d2."'");
	}
	else{
	$result =mysqli_query($db, "select * from lpo  where supplier='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
	}

$j=0;$arr=array();
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$vno=stripslashes($row['lpono']) ;
$total=stripslashes($row['total']) ;
if(isset($arr[$vno])){
$x=$arr[$vno] + $total;
$arr[$vno]=$x;
}else{
$arr[$vno]=$total;
}
$j+=$total;
}

$i=0;
foreach ($arr as $key => $val) {
	
	$result =mysqli_query($db, "select * from lpo where lpono='".$key."'");
	$row=mysqli_fetch_array($result);
if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:19%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo dateprint(stripslashes($row['date']))?></td>
   		<td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo stripslashes($row['supplier']) ?></td>
       <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo $key  ?></td>
        <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $val ?>).formatMoney(2, '.', ','));</script></td>
    </tr>


<?php 
$i++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Amount: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 20:
$date=date('Y/m/d');
if(isset($_GET['name'])){
	$name=$_GET['name'];
}else $name='All';
if(isset($_GET['name2'])){
	$name2=$_GET['name2'];
}else $name2='All';
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname=strtolower($name).'_stock_transfer_summary';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK TRANSFER SUMMARY<br/>
<strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">From:<?php  echo $name ?><br/><strong style="font-size:11px">To:<?php  echo $name2 ?><br/></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-7" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<th scope="col"  style="width:15%;">Date</th>
   		<th scope="col"  style="width:30%;">From~To</th>
        <th scope="col"  style="width:10%;">Transfer No</th>
        <th scope="col"  style="width:20%;">Amount</th>
        <th scope="col"  style="width:12%;">Requested</th>
         <th scope="col"  style="width:12%;">Issued</th>
    </tr></thead><tbody>

<?php


	if($d1==0){
		if($name=='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Status=2");
		}
		else if($name=='All'&&$name2!='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep1='".$name2."' and Status=2");			
		}
		else if($name!='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Status=2");			
		}
		else{
		$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Dep1='".$name2."' and Status=2");		
		}
	
	}
	else{
		
		if($name=='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");				
		}
		else if($name=='All'&&$name2!='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep1='".$name2."' and Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");				
		}
		else if($name!='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");				
		}
		else{
		$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Dep1='".$name2."' and Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");		
		}
	}

$j=0;$arr=array();
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$vno=stripslashes($row['IssueNo']) ;
$total=stripslashes($row['Total']) ;
if(isset($arr[$vno])){
$x=$arr[$vno] + $total;
$arr[$vno]=$x;
}else{
$arr[$vno]=$total;
}
$j+=$total;
}

$i=0;
foreach ($arr as $key => $val) {
	
	$result =mysqli_query($db, "select * from issuetable where IssueNo='".$key."' and Status=2");
	$row=mysqli_fetch_array($result);
if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['TransDate'])?></td>
   		<td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">From <?php   echo stripslashes($row['Dep2']) ?> To <?php   echo stripslashes($row['Dep1']) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo stripslashes($row['IssueNo']) ?></td>
        <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $val ?>).formatMoney(2, '.', ','));</script></td>
       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo stripslashes($row['Requested'])  ?></td>
        <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo stripslashes($row['Issued'])  ?></td>
    </tr>


<?php 
$i++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Amount: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 21:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$fname='waiver_reports';

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
WAIVER REPORTS
<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<table id="datatable-8" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<th scope="col"  style="width:8%;">Date</th>
        <th scope="col"  style="width:8%;">Waiver No</th>
        <th scope="col"  style="width:15%;">Patient Name</th>
       	<th scope="col"  style="width:10%;">Amount Charged</th>
      	<th scope="col"  style="width:10%;">Amount Paid</th>
       	<th scope="col"  style="width:10%;">Amount Waived</th>
        <th scope="col"  style="width:15%;">Diagnosis</th>
        <th scope="col"  style="width:23%;">Notes</th>
    </tr></thead><tbody>


<?php
	if($d1==0){
	$result =mysqli_query($db, "select * from  waivers");
	}else{
	$result =mysqli_query($db, "select * from  waivers where stamp>='".$d1."' and stamp<='".$d2."'");
	}
	$num_results = mysqli_num_rows($result);
	$a=$b=$c=0;
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=stripslashes($row['amount_charged']) ;
	$b+=stripslashes($row['amount_paid']) ;
	$c+=stripslashes($row['amount_waived']) ;


		if($i%2==0){
				echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
				}else{
					echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
		?>
				<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['date']) ?></td>
				<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['waiverno']) ?></td>
				
		     	 <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patname']) ?></td>
		     	 <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount_charged']) ?>).formatMoney(2, '.', ','));</script></td>
		        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount_paid']) ?>).formatMoney(2, '.', ','));</script></td>
		      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount_waived']) ?>).formatMoney(2, '.', ','));</script></td>
		      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['diagnosis']) ?></td>
		       <td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['notes']) ?></td>
		    </tr>



<?php

 } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Charged:<script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Paid:<script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Waived:<script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;


case 22:
$date=date('Y/m/d');
$name=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname=strtolower($name).'_counselling_reports';

if($name!='All'){
$resulta =mysqli_query($db, "select * from counscats where id='".$name."'");
$rowa=mysqli_fetch_array($resulta);
$catname=stripslashes($rowa['name']);
}else $catname=$name;
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">COUNSELLING REPORTS<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Category:<?php  echo $catname ?><br/></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-9" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<th scope="col"  style="width:9%;">Date</th>
   		<th scope="col"  style="width:20%;">Patient Name</th>
        <th scope="col"  style="width:20%;">Category</th>
        <th scope="col"  style="width:50%;">Notes</th>
    </tr></thead><tbody>

<?php


	if($d1==0&&$name=='All'){
	$result =mysqli_query($db, "select * from counselling");
	}
	else if($d1==0&&$name!='All'){
	$result =mysqli_query($db, "select * from counselling where SubCatId='".$name."'");
	}
	else if($d1!=0&&$name=='All'){
	$result =mysqli_query($db, "select * from counselling  where stamp>='".$d1."' and stamp<='".$d2."'");
	}
	else{
	$result =mysqli_query($db, "select * from counselling  where SubCatId='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
	}


	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:9%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['TransDate'])?></td>
   		<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo stripslashes($row['PatName']) ?></td>
       <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo stripslashes($row['SubCategory']) ?></td>
       <td style="width:50%;border-width:0.5px; border-color:#666; border-style:solid;"><?php   echo stripslashes($row['Notes']) ?></td>
    </tr>


<?php 
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Amount: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 23:
$date=date('Y/m/d');
$code=$_GET['code'];
$a=$_GET['a'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);

	switch($a){

		case 1:
		$fname='all_lab_tests_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		//$code=$_GET['code'];

		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."'");
		}

		break;

		case 2:
		$fname='by_source_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where source='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  source='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  source='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  source='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  source='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  source='".$code2."'");
		}

		break;

		case 3:
		$fname='by_test_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where request='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  request='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  request='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}

		break;

		case 4:
		$fname='by_sample_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where sample='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  sample='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  sample='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  sample='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  sample='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  sample='".$code2."'");
		}

		break;


		case 5:
		$fname='by_patient_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where patid='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		break;


		case 6:
		$fname='by_section_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where section='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  section='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  section='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  section='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  section='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  section='".$code2."'");
		}

		break;




	}



?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">LAB REPORTS<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Category:<?php  echo $catname ?><br/></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<div style="clear:both; margin-bottom:10px" ></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-10" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<th scope="col"  style="width:3%;">No.</th>
		<th scope="col"  style="width:7%;">Date</th>
		<th scope="col"  style="width:3%;">Lab No</th>
   		<th scope="col"  style="width:10%;">Patient Name</th>
   		<th scope="col"  style="width:5%;">Age</th>
   		<th scope="col"  style="width:7%;">Source</th>
   		<th scope="col"  style="width:7%;">Lab Section</th>
   		<th scope="col"  style="width:10%;">Lab Test</th>
		<th scope="col"  style="width:6%;">Sample</th>
   		<th scope="col"  style="width:5%;">Start Time</th>
         <th scope="col"  style="width:5%;">Finish Time</th>
         <th scope="col"  style="width:5%;">Result Type</th>
        <th scope="col"  style="width:8%;">Done By</th>
    </tr></thead><tbody>

<?php
	$a=1;$aa=$bb=0;

	$resultage =mysqli_query($db, "select * from patients where pntno='".$code."'");
		$rowage=mysqli_fetch_array($resultage);
		$pntno=stripslashes($rowage['pntno']);

	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if(stripslashes($row['restype'])=='POSITIVE'){
		$aa+=1;
	}
	if(stripslashes($row['restype'])=='NEGATIVE'){
		$bb+=1;
	}

		/*$resultage =mysqli_query($db, "select * from patients where pntno='".$code."'");
		$rowage=mysqli_fetch_array($resultage);
		$pntno=stripslashes($rowage['pntno']);*/
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo $a ?></td>
    <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['date'])?></td>
     <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['unique_no'])?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['patname'])?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($rowage['pntno'])?></td>
         <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['source'])?></td>
          <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['section'])?></td>
           <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['request'])?></td>
             <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['sample'])?></td>
              <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['rectime'])?></td>
                <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['servtime'])?></td>
                 <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['restype'])?></td>
                <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['doneby'])?></td>
   		
    </tr>


<?php 
$a++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Tests: <?php  echo $a-1 ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Positive Tests: <?php  echo $aa ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Negative Tests: <?php  echo $bb ?></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;




case 24:
$date=date('Y/m/d');
$code=$_GET['code'];
$a=$_GET['a'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);

	switch($a){

		case 1:
		$fname='all_radiology_tests_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from radrequests");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from radrequests  where stamp>='".$d1."' and stamp<='".$d2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from radrequests where status=2");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from radrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from radrequests where status=1");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from radrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."'");
		}

		break;

		case 2:
		$fname='by_test_radiology_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from radrequests where request='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from radrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from radrequests where status=2 and  request='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from radrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from radrequests where status=1 and  request='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from radrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}

		break;

		case 3:
		$fname='by_patient_radiology_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from radrequests where patid='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from radrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from radrequests where status=2 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from radrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from radrequests where status=1 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from radrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		break;


		
	
	}



?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">RADIOLOGY REPORTS<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Category:<?php  echo $catname ?><br/></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<div style="clear:both; margin-bottom:10px" ></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-11" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<th scope="col"  style="width:5%;">No.</th>
		<th scope="col"  style="width:7%;">Date</th>
		<th scope="col"  style="width:8%;">Radiology No</th>
   		<th scope="col"  style="width:12%;">Patient Name</th>
   		<th scope="col"  style="width:15%;">Radiology Scan</th>
		<th scope="col"  style="width:28%;">Results</th>
   		<th scope="col"  style="width:7%;">Start Time</th>
         <th scope="col"  style="width:7%;">Finish Time</th>
        <th scope="col"  style="width:10%;">Done By</th>
    </tr></thead><tbody>

<?php
	$a=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo $a ?></td>
    <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['date'])?></td>
     <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['radno'])?></td>
      <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['patname'])?></td>
           <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['request'])?></td>
          <td style="width:28%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['results'])?></td>
           
               
                <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['reqtime'])?></td>
                <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['servtime'])?></td>
                <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['doneby'])?></td>
   		
    </tr>


<?php 
$a++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Tests: <?php  echo $a-1 ?></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 25:
$date=date('Y/m/d');
$code=$_GET['code'];
$a=$_GET['a'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);

	switch($a){

		case 1:
		$fname='all_pharmacy_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from pharmrequests");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from pharmrequests  where stamp>='".$d1."' and stamp<='".$d2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from pharmrequests where status=2");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from pharmrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from pharmrequests where status=1");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from pharmrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."'");
		}

		break;

		case 2:
		
		$fname='by_patient_pharmacy_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from pharmrequests where patid='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from pharmrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from pharmrequests where status=2 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from pharmrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from pharmrequests where status=1 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from pharmrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		break;


		
	
	}



?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">PHARMACY REPORTS<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Category:<?php  echo $catname ?><br/></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<div style="clear:both; margin-bottom:10px" ></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-12" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<th scope="col"  style="width:5%;">No.</th>
		<th scope="col"  style="width:10%;">Date</th>
		<th scope="col"  style="width:20%;">Patient Name</th>
   		<th scope="col"  style="width:40%;">Prescription</th>
   		<th scope="col"  style="width:7%;">Start Time</th>
         <th scope="col"  style="width:7%;">Finish Time</th>
        <th scope="col"  style="width:10%;">Done By</th>
    </tr></thead><tbody>

<?php
	$a=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo $a ?></td>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['date'])?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['patname'])?></td>
           <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['prescription'])?></td>
         <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['reqtime'])?></td>
                <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['servtime'])?></td>
                <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['doneby'])?></td>
   		
    </tr>


<?php 
$a++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Tests: <?php  echo $a-1 ?></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;



case 26:
$date=date('Y/m/d');
$code=$_GET['code'];
$a=$_GET['a'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);

	switch($a){

		case 1:
		$fname='all_theatre_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from theatrequests");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from theatrequests  where stamp>='".$d1."' and stamp<='".$d2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from theatrequests where status=2");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from theatrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from theatrequests where status=1");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from theatrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."'");
		}

		break;

		case 2:
		
		$fname='by_patient_theatre_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from theatrequests where patid='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from theatrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from theatrequests where status=2 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from theatrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from theatrequests where status=1 and  patid='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from theatrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
		}

		break;


		
	
	}



?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">THEATRE REPORTS<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Category:<?php  echo $catname ?><br/></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<div style="clear:both; margin-bottom:10px" ></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable-13" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<th scope="col"  style="width:5%;">No.</th>
		<th scope="col"  style="width:10%;">Date</th>
		<th scope="col"  style="width:15%;">Patient Name</th>
		<th scope="col"  style="width:15%;">Procedure</th>
   		<th scope="col"  style="width:20%;">Notes</th>
   		<th scope="col"  style="width:7%;">Start Time</th>
         <th scope="col"  style="width:7%;">Finish Time</th>
        <th scope="col"  style="width:10%;">Done By</th>
    </tr></thead><tbody>

<?php
	$a=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo $a ?></td>
    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['date'])?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['patname'])?></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['procedures'])?></td>
           <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['notes'])?></td>
         <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['reqtime'])?></td>
                <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['servtime'])?></td>
                <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['doneby'])?></td>
   		
    </tr>


<?php 
$a++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Tests: <?php  echo $a-1 ?></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 27:
$reg=$_GET['reg'];
$date=date('Y/m/d');
$stamp=date('Ymd');
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ASSETS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:17%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Category</p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Asset ID</p>
</div>
<div style="width:27%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Asset Name</p>
</div>

<div style="width:14%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Location</p>
</div>
<div style="width:11%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Price</p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date of Purchase</p>
</div>
<div style="float:left; width:10%">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date of Disposal</p>
</div>
</div>
<?php
	if($reg==2){
		$result =mysqli_query($db, "select * from assets order by category asc,name asc");
	}else{
	$result =mysqli_query($db, "select * from assets where  status='".$reg."' order by category asc,name asc");
	}
	
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'">';
	}
	
	?>
<div style="width:17%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['category']) ?></p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['assetid']) ?></p>
</div>
<div style="width:27%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['name']) ?></p>
</div>
<div style="width:14%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['location']) ?></p>
</div>
<div style="width:11%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['price']) ?></p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['dateofpurchase']) ?></p>
</div>
<div style="float:left; width:10%">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['disposaldate']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 
break;

case 28:
$reg=$_GET['reg'];
$date=date('Y/m/d');
$stamp=date('Ymd');
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$result =mysqli_query($db, "select * from assets where id='".$reg."'");
$row=mysqli_fetch_array($result);
$assid=stripslashes($row['assetid']);
$assname=stripslashes($row['name']);
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ASSET TRACKING REPORT<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong><br/><strong style="font-size:12px"><?php  echo $assname.'-'.$assid ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:12%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date</p>
</div>
<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Action</p>
</div>
<div style="width:41%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Details</p>
</div>

<div style="width:14%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Amount</p>
</div>
<div style="float:left; width:12%">
<p style="color:#FFFFFF;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Username</p>
</div>
</div>
<?php
	if($d1==0){
	$result =mysqli_query($db, "select * from assettrack  where assetid='".$assid."'");
	}
	else{
	$result =mysqli_query($db, "select * from assettrack  where stamp>='".$d1."' and stamp<='".$d2."' and assetid='".$assid."'");
	}	
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'">';
	}
	
	?>
<div style="width:12%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['date'])) ?></p>
</div>
<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['action']) ?></p>
</div>
<div style="width:41%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['details']) ?></p>
</div>
<div style="width:14%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['amount']) ?></p>
</div>

<div style="float:left; width:12%">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['username']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 
break;



case 29:
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;


$days=array();
$d1=preg_replace('~/~', '', $d1);
$d2=preg_replace('~/~', '', $d2);
$days[]=stamptostamp($d1);
$dd=$d1;

while($dd < $d2) {

    $dd=strtotime($dd);
	$dd=date('Ymd', strtotime('+1 day', $dd));
	$days[]=stamptostamp($dd);
	
  } 






?>
<div style="width:100%; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Better Health MANAGERIAL DAILY SUMMARY REPORT<br/>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="width:100%;">
<?php
$pro=array(array()); $arr1=array();$arr2=array();$arr3=array();$arr4=array();$arr5=array();$arr6=array();
foreach ($days as $key => $date) {

	$xx=0;$yy=0;$cdate=$date;
	$tom=strtotime($date);
	$tom=date('Ymd', strtotime('+1 day', $tom));

	$stamper=$date=preg_replace('~/~', '', $date);
	$d1=$date.'0800';$d2=$date.'1900';
	$result =mysqli_query($db, "select * from receipts  where timestamp>='".$d1."' and timestamp<'".$d2."'  and status!=0");
	$resultmm =mysqli_query($db, "select * from receipts  where timestamp>='".$d1."' and timestamp<'".$d2."'  and status!=0 group by patid");
	$dpats = mysqli_num_rows($resultmm);
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$y=0;$x=array();$shift1=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$shift1=$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
		if (isset($x[$row['cname']])) {
			$x[$row['cname']] += preg_replace('~,~', '', stripslashes($row['amount']));
		}else{
			$x[$row['cname']] = preg_replace('~,~', '', stripslashes($row['amount']));
		}
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	
	}
	$xx+=$a;$yy+=$v;
	
	

	$dep=0;
	$result =mysqli_query($db, "select * from bankdeposits where stamp=".$stamper."");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$dep+=preg_replace('~,~', '', stripslashes($row['amount']));

	}
	?>

<p style="text-align:center;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date:<?php  echo dateprint($cdate) ?></p>
<div style="width:33.0%; border-right:1px DASHED #333; float:left">
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">SHIFT 1</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patients Seen In Shift: <?php  echo $dpats ?></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<?php foreach ($x as $key => $bank) {?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo $key ?>: <script>document.writeln((<?php  echo $bank ?>).formatMoney(2, '.', ','));</script></p>
<?php } ?>

<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Totals: <script>document.writeln(( <?php  echo $a?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
</div>


<?php

	$stamper=$date=preg_replace('~/~', '', $date);
	$d1=$date.'1900';$d2=$tom.'0800';
	$result =mysqli_query($db, "select * from receipts  where timestamp>='".$d1."' and timestamp<'".$d2."'  and status!=0");
	$resultmm =mysqli_query($db, "select * from receipts  where timestamp>='".$d1."' and timestamp<'".$d2."'  and status!=0 group by patid");
	$npats = mysqli_num_rows($resultmm);
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$y=0;$x=array();$shift2=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$shift2=$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
		if (isset($x[$row['cname']])) {
			$x[$row['cname']] += preg_replace('~,~', '', stripslashes($row['amount']));
		}else{
			$x[$row['cname']] = preg_replace('~,~', '', stripslashes($row['amount']));
		}
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	
	}

	$xx+=$a;$yy+=$v;

	$pats=0;
	$d1=$date.'0800';
	$result =mysqli_query($db, "select * from receipts where timestamp>='".$d1."' and timestamp<'".$d2."' and status !=0 group by patid");
	$num_results = mysqli_num_rows($result);
	$pats=$num_results;
	?>


<div style="width:33.0%; border-right:1px DASHED #333; float:left">
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">SHIFT 2</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patients Seen In Shift: <?php  echo $npats ?></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<?php foreach ($x as $key => $bank) {?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo $key ?>: <script>document.writeln((<?php  echo $bank ?>).formatMoney(2, '.', ','));</script></p>
<?php } ?>

<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Totals: <script>document.writeln(( <?php  echo $a?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
</div>


<div style="width:33.0%; border-right:1px DASHED #333;float:left">
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">TOTALS</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Income: <script>document.writeln(( <?php  echo $xx?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Cash: <script>document.writeln(( <?php  echo $yy?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Amount Banked:<script>document.writeln(( <?php  echo $dep ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patients Seen:<?php  echo $pats ?></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
</div>



	
<div style="clear:both; margin-bottom:20px"></div>

<?php 

$arr1[]='"'.stamptodate($date).'"';	$arr2[]=$shift1;	$arr3[]=$shift2;	
$arr4[]='"'.stamptodate($date).'"';	$arr5[]=$dpats;	$arr6[]=$npats;	
} ?>
</div>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GRAPHICAL REPRESENTATION: INCOME</p>

<?php


//$arr1=array_slice($arr1,0,7);$arr2=array_slice($arr2,0,7);$arr3=array_slice($arr3,0,7);
//$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);
$pa=implode($arr1,",");$xy=implode($arr2,",");$ab=implode($arr3,",");

echo'<canvas id="line" height="400" width="1200"></canvas>
<script>

		var lineChartData = {
			labels : ['.$pa.'],
			datasets : [
				{
					fillColor : "#0369A1",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$xy.']
				},
				{
					fillColor : "#DC2626",
					strokeColor : "#0FFFFFF",
					pointColor : "#000",
					pointStrokeColor : "#fff",
					data : ['.$ab.']
				}
			]
			
		}

	new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
	
	</script>
<p style="margin-top:0px"><input type="button" style="background:var(--color-info, #0369A1); height:10px; width:10px;"/><small style="margin-top:-15px">Day Shift</small>
<input type="button" style="background:var(--color-danger, #DC2626); height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">>Night Shift</small></p>	';	
		
?>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GRAPHICAL REPRESENTATION: PATIENTS SEEN</p>
<div style="clear:both; margin-bottom:20px"></div>
<?php


//$arr1=array_slice($arr1,0,7);$arr2=array_slice($arr2,0,7);$arr3=array_slice($arr3,0,7);
//$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);
$pa=implode($arr4,",");$xy=implode($arr5,",");$ab=implode($arr6,",");

echo'<canvas id="line2" height="400" width="1200"></canvas>
<script>

		var lineChartData = {
			labels : ['.$pa.'],
			datasets : [
				{
					fillColor : "#ff3",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$xy.']
				},
				{
					fillColor : "#0f6",
					strokeColor : "#0FFFFFF",
					pointColor : "#000",
					pointStrokeColor : "#fff",
					data : ['.$ab.']
				}
			]
			
		}

	new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData);
	
	</script>
<p style="margin-top:0px"><input type="button" style="background:#ff3; height:10px; width:10px;"/><small style="margin-top:-15px">Day Shift</small>
<input type="button" style="background:#0f6; height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">Night Shift</small></p>	';	
		
?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 30:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$fname='inpatient_reports';

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php

	$x='Inpatient Reports';

echo $x;
?>
<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<table id="datatable-14" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " ><caption><?php echo isset($title) ? htmlspecialchars($title) : 'Report' ?></caption>
<thead>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<th scope="col"  style="width:7%;">No.</th>
        <th scope="col"  style="width:12%;">Adm Date</th>
        <th scope="col"  style="width:10%;">Patient Id</th>
        <th scope="col"  style="width:20%;">Patient Name</th>
        <th scope="col"  style="width:10%;">Days Stayed</th>
        <th scope="col"  style="width:10%;">Amount Charged</th>
        <th scope="col"  style="width:15%;">Ward</th>
        <th scope="col"  style="width:15%;">Date Discharged</th>
    </tr></thead><tbody>


<?php
	if($d1==0){
	$result =mysqli_query($db, "select * from inpatients group by PatId");
	$y='MainWard';
	}
	else{
	$result =mysqli_query($db, "select * from inpatients where (Stamp>=".intval($d1)." and Stamp<=".intval($d2).") or Admitted!=0 group by PatId");
	$y='MainWard';
	}
	
	$xx=1;
	$aa=0;$v=0;$w=0;$y=0;$x=array();
	$tdate=date('Y/m/d');
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);

		$resulta =mysqli_query($db, "select * from tempbill where patid='".stripslashes($row['PatId'])."' and status=1");
		$num_resultsa = mysqli_num_rows($resulta);
		$e=0;	
		for ($a=0; $a <$num_resultsa; $a++) {
			$rowa=mysqli_fetch_array($resulta);
			$aa+=preg_replace('~,~', '', stripslashes($rowa['subnet']));
			$e+=preg_replace('~,~', '', stripslashes($rowa['subnet']));

		}
		//echo 'fff - '.$num_resultsa;

		if ($num_resultsa < 1) {
			$resulta =mysqli_query($db, "select * from receipts where patid='".stripslashes($row['PatId'])."' and stamp>='".preg_replace('~/~', '', stripslashes($row['TransDate']))."' and stamp<='".preg_replace('~/~', '', stripslashes($row['Discharge']))."'");
			$num_resultsa = mysqli_num_rows($resulta);
			$e=0;
			
			for ($a=0; $a <$num_resultsa; $a++) {
				$rowa=mysqli_fetch_array($resulta);
				$aa+=preg_replace('~,~', '', stripslashes($rowa['amount']));
				if(stripslashes($rowa['paymode'])=='Cash'){
				$v+=preg_replace('~,~', '', stripslashes($rowa['amount']));	
				}
				if(stripslashes($rowa['paymode'])=='Credit'){
				$w+=preg_replace('~,~', '', stripslashes($rowa['amount']));	
				}
				if(stripslashes($rowa['paymode'])=='Bank'){
					if (isset($x[$rowa['cname']])) {
						$x[$rowa['cname']] += preg_replace('~,~', '', stripslashes($rowa['amount']));
					}else{
						$x[$rowa['cname']] = preg_replace('~,~', '', stripslashes($rowa['amount']));
					}
				}
				if(stripslashes($rowa['paymode'])=='Companies'){
				$y+=preg_replace('~,~', '', stripslashes($rowa['amount']));	
				}
				$e+=preg_replace('~,~', '', stripslashes($rowa['amount']));

			}
		}



		if($i%2==0){
				echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
				}else{
					echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
		?>
				<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo  $xx ?></td>
		   		<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo dateprint(stripslashes($row['TransDate'])) ?></td>
		        <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
		      	<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatName']) ?></td>
		       	<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo diffdays(stripslashes($row['TransDate']),stripslashes($row['Discharge'])) ?></td>
		      	<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $e?>).formatMoney(2, '.', ','));</script></td>
		       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['MainWard']) ?></td>
		   		<td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Discharge']) ?></td>
		   
		    </tr>



<?php

$xx++;
 } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $aa ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Income Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<?php foreach ($x as $key => $bank) {?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo $key ?>: <script>document.writeln((<?php  echo $bank ?>).formatMoney(2, '.', ','));</script></p>
<?php } ?>

<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

}



?>									
</body>
</html>