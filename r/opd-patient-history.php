<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('opd-patient-history', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/../includes/functions.php');
include __DIR__ . '/../includes/func.php';
//$ser=$_GET['ser'];
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}
//echo $username;
$result4 =mysqli_query($db, "select * from users where name='".$username."'");
$row4=mysqli_fetch_array($result4);
$fullname=stripslashes($row4['fullname']);
$sign_image=stripslashes($row4['sign_image']);

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../css/tokens.css" />
<link rel="stylesheet" href="../css/components.css" />
<title>Better Health Patients History Reports</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>
<style>
@charset "utf-8";
@font-face {font-family: Verdana, Geneva, sans-serif;} 
body{
font-family: Verdana, Geneva, sans-serif;
}
</style>

</head>

<body>
	<a class="bh-skip" href="#bh-main">Skip to main content</a>

<?php 

$date=date('Y/m/d');
#$date=date('d/m/Y');
$stamp=date('Ymd');
$code=$_GET['code'];
$pgheadtitle=$_GET['pg']; //OFFICIAL OUT PATIENT RECORD
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$fname='patient_visit_reports';

$rcptno = $_GET['rcptno'];

$result =mysqli_query($db, "SELECT * FROM newprescription WHERE PrescId='".$rcptno."'");
$row=mysqli_fetch_array($result);
$old_presc_id=stripslashes($row['Id']);
$old_patient_id=stripslashes($row['old_patient_id']);
$transdate=stripslashes($row['TransDate']);
$prescid=stripslashes($row['PrescId']);
$patid=stripslashes($row['PatId']);


$resultx =mysqli_query($db, "SELECT * FROM patients WHERE auto='".$old_patient_id."' AND pntno='".$patid."'");
$rowx=mysqli_fetch_array($resultx);

#unregistered_patients_eports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$pgheadtitle);

?>
<?php
echo'<div style="width:740px;min-height:260px; border:2px solid #333; overflow:auto;font-size:11px;padding:5px" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Logo" src="../'.$logo.'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:14px; font-weight:bold;margin:0 0 0 0px">
'.$comname.'<br/>P.O BOX '.$Add.'<br/> TEL: '.$tel.'<br/> OFFICIAL OUT PATIENT RECORD<br/><strong style="font-size:14px">Date:'.$date.'<br/>Record No: '.$rcptno.'</strong></p>
<div style="clear:both"></div>
<div style="clear:both; margin-bottom:40px"></div>
<p style="color:#000;font-size:12px; text-transform:uppercase; background:#fff; text-align:center; font-weight:bold;margin:0 0 0 0px">
<strong>Patient ID:</strong>&nbsp;'.stripslashes($row['PatId']).' &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
<strong>Patient Name: </strong>'.stripslashes($row['PatName']).'&nbsp; &nbsp;&nbsp;&nbsp;
Age:'.stripslashes($rowx['age']).'&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
<strong>Record ID: </strong>'.$rcptno.'</p><div style="clear:both; margin-bottom:2px"></div>
<img alt="Convert to Pdf" src="../images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-53px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>

<p  style="text-align:center;font-size:12px; text-transform:uppercase; color:#000; background:#fff; margin-top:0px; padding-top:0">
<strong>Insurance:</strong>'.stripslashes($rowx['insurer']).'&nbsp; &nbsp;&nbsp;&nbsp;<strong>Card No:</strong>'.stripslashes($rowx['cardno']).' &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<strong>ID No:</strong>'.stripslashes($rowx['idno']).'&nbsp; &nbsp;&nbsp;&nbsp;<strong>Date: </strong>'.stripslashes($row['TransDate']).'</p>';

echo'<div style="clear:both; margin-bottom:0px; border-bottom:2px solid #333"></div>';
?>

<?php 

#echo '<div style="padding:5px 0">';

echo '<p style="font-size:14px;margin:0 20px 0 20px"><strong>Triage Analysis:</strong><br/></p>
<div style="clear:both; margin-bottom:0px; border-bottom:2px solid #fff"></div>
<div class="col-lg-6" style="background:#ccc">
    <div class="col-md-6" style="background:#fff;width:400px;float:right">
 
<p style="font-size:11px;margin:0 0 0 20px"><strong>Pulse Rate:</strong>&nbsp;'.stripslashes($row['PulseRate']).' Beats/Min<br/><strong>Random Blood Sugar:</strong>&nbsp;'.stripslashes($row['Rbs']).' mMoles/Ltr<br/><strong>Health Problems/Allergies: </strong>'.stripslashes($row['Allergies']).'<br/><strong>Other Details: </strong>'.strip_tags(stripslashes($row['OtherDetails']), '<br/>').'</p>
    </div>      
</div>';

#echo '</div>';
$brk='<br/>';
echo '
<p style="font-size:11px;margin:0 0 0 20px"><strong>Temparature:</strong>&nbsp;'.stripslashes($row['Temp']).'</strong> Celsius<br/><strong>Blood Pressure:</strong>&nbsp;'.stripslashes($row['Bp1']).'/'.stripslashes($row['Bp2']).'mmHg<br/><strong>Weight:</strong>&nbsp;'.stripslashes($row['Weight']).' Kgs<br/>
<strong>Resp. Rate:</strong>&nbsp;'.stripslashes($row['RespRate']).' Breaths/Min</p>
<div style="clear:both; margin:0px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;margin:-10px 20px 0 20px"><strong>History:</strong>'.$brk.' '.stripslashes($row['History']).'</p>
<div style="clear:both; margin:0px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>
<p style="font-size:11px;margin:-10px 20px 0 20px"><strong>Physical Examination:</strong>'.$brk.' '.stripslashes($row['PhyExam']).'</p>
<div style="clear:both; margin:0px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;margin:-10px 20px 0 20px"><strong>Lab Investigations:</strong>';


$resultb =mysqli_query($db, "SELECT * FROM labrequests WHERE prescid='".$prescid."' order by id");
$num_resultsb = mysqli_num_rows($resultb);	
for ($i=0; $i <$num_resultsb; $i++) {
	$rowb=mysqli_fetch_array($resultb);
	if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
	else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-</br>DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
	echo'
	<p style="margin-left:20px">
	Date: <b>'.stripslashes($rowb['date']).'</b>
	<br/>
	<b>Lab Request</b>'.$x.'<br/>
	'.strip_tags(stripslashes($rowb['request']), '<br/>').'
	<br/>
	<b>Lab Results</b>
	<br/>
	'.stripslashes($rowb['results']).'

	</p><div style="clear:both; margin:10px 0; border-top:1px dashed #333"></div>
	';
}




echo '
 <div style="clear:both; margin:0 0 10px 0; border-top:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;margin:10px 20px 0 20px;"><strong>PHC Diagnosis:</strong></p>
<div style="margin-left:20px;">';
$phcSqlQry =mysqli_query($db, "SELECT * FROM tblprescphcdiagnosis WHERE PatientNo='".$patid."' AND PatientId='".$old_patient_id."'  AND PrescId='".$old_presc_id."'  AND PrescNo='".$prescid."' ");
$phc_num_row = mysqli_num_rows($phcSqlQry);$xa=1;	
for ($i=0; $i <$phc_num_row; $i++) {
	$phcrw=mysqli_fetch_array($phcSqlQry);
	echo'<p style="font-size:11px;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:-20px 0 0 0">'.stripslashes($phcrw['DiagnosisParentNameParentCode']).' : '.stripslashes($phcrw['DiagnosisChildName']).'</p>';
	$xa++;
}
echo'<div style="clear:both; margin:0px 0; border-bottom:1px dashed #333"></div>';
#echo'<p style="font-size:11px;margin:-10px 20px 0 20px">'.stripslashes($row['Diagnosis']).' '.stripslashes($row['DiagName']).'</p>';
echo'<p style="font-size:11px;margin:-10px 20px 0 20px">'.stripslashes($row['Diagnosis']).'</p>';
#echo'<div style="clear:both; margin:0px 0; border-bottom:1px dashed #333"></div>';
echo'</div>';
echo'<p style="font-size:11px;margin:10px 20px 0 20px;"><strong>Disease:</strong></p>';
echo'<p style="font-size:11px;margin:10px 20px 0 20px">'.stripslashes($row['DiagName']).'</p>';
echo'<div style="clear:both; margin:10px 0 10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>';



echo '<p style="font-size:11px;margin:-10px 20px 0 20px"><strong>Prescription:</strong>';
echo '<div style="clear:both; margin-bottom:5px"></div>';
	$resultb =mysqli_query($db, "SELECT * FROM pharmrequests WHERE prescid='".$prescid."' ORDER by id");
	$num_resultsb = mysqli_num_rows($resultb);	
	for ($i=0; $i <$num_resultsb; $i++) {
		$rowb=mysqli_fetch_array($resultb);									
	$notes = strip_tags($rowb['prescription'], '</br>');									
	echo'<p style="font-size:11px;margin-left:20px;margin-top:0px;width:200px;height:8px;">'.htmlspecialchars($notes).'</p><div style="clear:both; margin:0px 0; border-bottom:1px dashed #333"></div>';
	}
echo'</p>';
echo'<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>';
echo'<div style="float:right; margin:0 5px 0 0px;"><img alt="IMG 20240206 WA0003" src="../images/IMG-20240206-WA0003.png" style="width:300px; height:60px; margin-right:100px;" /></div>';
//echo'<div style="clear:both; margin-bottom:60px"></div>';

//echo '<div style="clear:both; margin-bottom:40px"></div>';<p style="font-size:11px;margin:-10px 20px 0 20px"><strong>History:</strong>'.$brk.' '.strip_tags(stripslashes($rowb['prescription']), '<br/>').'</p>


echo '<div style="clear:both; margin-bottom:20px"></div>';
echo '<p style="text-align:center;font-size:12px; font-weight:bold;margin:0 0 0 0px">We wish you quick recovery.<br/>Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
