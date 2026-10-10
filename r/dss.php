<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('dss', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<title>Blood Transfussion Chart</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="../css/roboto-varela.css"/>
<link rel="stylesheet" type="text/css" href="../css/material-icons.css"/> -->
<!-- <link rel="stylesheet" type="text/css" href="../../assets/includes/jquery.confirm.css" />
<link rel="stylesheet" type="text/css" href="../../assets/includes/jquery.custom.alerts.css"> -->

<style>
/*@font-face { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;} */
body,p{
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
/* font: 100.01% "Trebuchet MS", Trebuchet, Tahoma, Verdana, Arial, sans-serif;*/
}
</style>

</head>

<body>
	<?php require_once __DIR__ . '/../includes/render.php'; echo bh_skip_link('#bh-main'); ?>

<?php 

$date=date('Y/m/d');
$old_in_presc_id=safe_decode($_GET['pid']);
$old_in_presc_no=safe_decode($_GET['pno']);
$old_in_patient_id=safe_decode($_GET['cid']);
$old_in_patient_no=safe_decode($_GET['cno']);


$btQry =mysqli_query($db, "SELECT * FROM `tblbtransfussion` WHERE `PrescId`='".$old_in_presc_id."' AND `PrescNo`='".$old_in_presc_no."' AND `ClientId`='".$old_in_patient_id."' AND `ClientNo`='".$old_in_patient_no."' AND Status=1 ORDER BY Id DESC LIMIT 1");
$btRow=mysqli_fetch_array($btQry);
$num_bt_row = mysqli_num_rows($btQry);
$name=stripslashes($btRow['ClientName']);
$batchno=stripslashes($btRow['BatchNo']);
$age=stripslashes($btRow['ClientAge']);
$temp=stripslashes($btRow['Temp']);
$bp1=stripslashes($btRow['Bp1']);
$bp2=stripslashes($btRow['Bp2']);
$pr=stripslashes($btRow['Pr']);
$diagnosis=stripslashes($btRow['Diagnosis']);
$reason=stripslashes($btRow['ReasonForTransfussion']);
$bgrp=stripslashes($btRow['BloodGrp']);
$typebgrp=stripslashes($btRow['TypeOfBloodGrp']);
$startime=stripslashes($btRow['TimeStarted']);
$checkedby=stripslashes($btRow['CounterCheckedBy']);
$volume=stripslashes($btRow['Volume']);
$completedat=stripslashes($btRow['CompletedAt']);
$remarks_after=stripslashes($btRow['RemarksAfterTransfussion']);

$fname=strtolower($name).'_invoices_report';
?>
<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="../<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:14px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">CATHOLIC DIOCESE OF MARSABIT</p>
<p style="text-align:center;font-size:14px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:14px; font-weight:bold;text-transform: uppercase;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:14px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"> BLOOD TRANSFUSSION CHART<br/><strong style="font-size:14px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($name){ echo "<p style='text-align:center;font-size:14px; font-weight:normal;text-transform: uppercase;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px'><strong>NAME:</strong>".$name." &nbsp;&nbsp;<strong>BATCH NO:</strong>&nbsp;".$batchno." &nbsp;&nbsp;<strong>AGE:</strong>&nbsp;".$age."</br><strong>VITALS BEFORE TRANSFUSSION</strong></br><strong>TEMP:</strong>&nbsp;".$temp."&nbsp;<strong>&nbsp;BP:</strong>&nbsp;".$bp1." / ".$bp2."&nbsp;&nbsp;<strong>PR:</strong>&nbsp;".$pr."</br><strong>DIAGNOSIS:</strong>&nbsp;".$diagnosis."&nbsp;</br><strong>BLOOD GROUP:</strong>&nbsp;".$bgrp."&nbsp;<strong>TYPE OF BLOOD GROUP:</strong>&nbsp;".$typebgrp."&nbsp;</br><strong>REASON FOR TRANSFUSSION:</strong>&nbsp;".$reason."&nbsp;</br><strong>TIME STARTED:</strong>&nbsp;".$startime."&nbsp;<strong>COUNTER CHECKED BY:</strong>&nbsp;".$checkedby."&nbsp;<strong>VOLUME:</strong>&nbsp;".$volume."&nbsp;</p>"; } 
echo'<img alt="Convert to Pdf" src="../images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-53px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>';

?>

<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:12px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">DATE</td>
        <td  style="width:10%;">TIME</td>
        <td  style="width:10%;">BP</td>
        <td  style="width:10%;">PR</td>
        <td  style="width:10%;">TEMP</td>
        <td  style="width:10%;">SPO2</td>
        <td  style="width:10%;">REMARKS</td>
        <td  style="width:10%;">SIGN</td>
    </tr>

<?php

$btQry =mysqli_query($db, "SELECT * FROM `tblbtransfussion` WHERE `PrescId`='".$old_in_presc_id."' AND `PrescNo`='".$old_in_presc_no."' AND `ClientId`='".$old_in_patient_id."' AND `ClientNo`='".$old_in_patient_no."' AND Status=1");
#$qry_dss =mysqli_query($db,"select * from orders where Stamp>='".$d1."' and Stamp<='".$d1."' and Status=2");
$a=0;$b=0;$c=0;$d=0;
$num_results = mysqli_num_rows($btQry);
    for ($i=0; $i <$num_results; $i++) {
    $btRow=mysqli_fetch_array($btQry);

    if($i%2==0){
        echo'
        <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
        }else{
            echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}

                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($btRow['TransDate']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($btRow['TimeStarted']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($btRow['Bp1']).' / '.stripslashes($btRow['Bp2']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($btRow['Pr']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($btRow['Temp']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($btRow['Remarks']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
            echo'</tr>';   
            
    }
?>


</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
 <div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #fff"></div>
<?php echo "<p style='text-align:left;font-size:14px; font-weight:normal;text-transform: uppercase;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px'>
<strong style='margin-left:10px'>PATIENTS SIGN:</strong>&nbsp;&nbsp;......................................&nbsp;&nbsp;</p>"; 
Echo "<p style='text-align:left;font-size:14px; font-weight:normal;text-transform: uppercase;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px'>
<strong style='margin-left:10px'>TRANSFUSSION COMPLETED AT:</strong>&nbsp;&nbsp; ".$completedat."&nbsp;&nbsp;</p>"; 
echo "<p style='text-align:left;font-size:14px; font-weight:normal;text-transform: uppercase;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;'>
<strong style='margin-left:10px'>REMARKS ON PATIENTS CONDITION AFTER TRANSFUSSION:</strong>&nbsp;&nbsp; ".$remarks_after."&nbsp;&nbsp;</p>"; 


?>
<!-- <div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div> -->

</div>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 



?>          

</body>
</html>
