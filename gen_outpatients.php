<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('gen_outpatients', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
date_default_timezone_set('Africa/Nairobi'); 
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fulname=stripslashes($row['fullname']);
include(__DIR__ . '/includes/functions.php'); 
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}


if(isset($_GET['id'])){
$id=$_GET['id'];
}
else{
$id=$_POST['id'];
}

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
  $title='General Outpatients (FILTER CLINICS)';
  break;
  case 2:
  $title='General Outpatients Under 5 (FILTER CLINICS)';
  break;
  case 3:
  $title='General Admissions (FILTER CLINICS)';
  break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
<title><?php echo $title ?></title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chart.js"></script>
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script src="js/functions.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<script src="js/excellentexport.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.txt"></script>
<link rel="stylesheet" href="assets/vendor/ui/jquery.ui.all.css">
<script src="js/jquery-1.8.2.js"></script>
<script src="assets/vendor/ui/jquery.ui.core.js"></script>
<script src="assets/vendor/ui/jquery.ui.widget.js"></script>
<script src="assets/vendor/ui/jquery.ui.datepicker.js"></script>

</head>

<body style="background:">
	<a class="bh-skip" href="#bh-main">Skip to main content</a> 

<?PHP
switch($id){

  
  
case 1:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=htmlspecialchars($_GET['code']);
$name=htmlspecialchars($_GET['name']);
$dis=htmlspecialchars($_GET['dis']);
if(isset($_GET['d1'])){
  $d1=htmlspecialchars($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=htmlspecialchars($_GET['d2']);
}else $d2=0;
?>

<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GENERAL OUTPATIENTS REPORTS (FILTER CLINICS) <br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CATEGORY:<strong style="font-size:12px"><?php  echo $name ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1; ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2; ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>


<a download="diagnosisreport.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:3%;"></td>
      <td  style="width:7%;">Date</td>
        <td  style="width:6%;">Patient Id</td>
        <td  style="width:16%;">Patient Name</td>
        <td  style="width:15%;">Age</td>
        <td  style="width:7%;">Gender</td>
        <!-- <td  style="width:11%;">Diagnosis Category</td> -->
        <td  style="width:20%;">Diagnosis Details</td>
        <td  style="width:10%;">Guardian Contact</td>
        <td  style="width:8%;">Type</td>
    </tr>
    

<?php

$dept3=array(array());
$resultv =mysqli_query($db, "select * from filterclinics order by id");
$num_resultvs = mysqli_num_rows($resultv);
for ($i=0; $i <$num_resultvs; $i++) {
$dept3[$i]=array(0,0,0,0); 
}

$resultv =mysqli_query($db, "select * from filterclinics order by id");
$num_resultvs = mysqli_num_rows($resultv);
for ($i=0; $i <$num_resultvs; $i++) {
  $rowv=mysqli_fetch_array($resultv);
  $dept3[$i][1]=stripslashes($rowv['name']);
  $dept3[$i][0]=stripslashes($rowv['id']);
  $dept3[$i][2]=stripslashes($rowv['abbr']);
}
$max1=count($dept3);
for ($x= 0; $x < $max1; $x++){
  $dept3[$x][2]==0;
}
//$arr1=array();$arr2=array();$arr3=array();

$dept1=array(array());
$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept1[$i]=array(0,0,0,0); 
}



$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept1[$i][1]=stripslashes($row['name']);
$dept1[$i][0]=stripslashes($row['id']);
$dept1[$i][2]=stripslashes($row['abbr']);
}
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
  $dept1[$x][2]==0;
  }
//$arr1=array();$arr2=array();$arr3=array();

$dept2=array(array());
$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept2[$i]=array(0,0,0,0); 
}



$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept2[$i][1]=stripslashes($row['name']);
$dept2[$i][0]=stripslashes($row['id']);
$dept2[$i][2]=stripslashes($row['abbr']);
}
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
  $dept2[$x][2]==0;
  }
//$arr1=array();$arr2=array();$arr3=array();


if($name=='Over60'&&$dis=='male'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>59 AND gender='".$dis."'");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>59  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}else if($name=='Over60'&&$dis=='female'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>59 AND gender='".$dis."'");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>59  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}else if($name=='Over60'&&$dis=='both'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE gender IN('male','female') AND age>59");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>59 AND gender IN('male','female') AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}

if($name=='UnderFive'&&$dis=='male'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age<5 AND gender='".$dis."'");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age<5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}else if($name=='UnderFive'&&$dis=='female'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age<5 AND gender='".$dis."'");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age<5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}else if($name=='UnderFive'&&$dis=='both'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE gender IN('male','female') AND age<5");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age<5 AND gender IN('male','female') AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}

if($name=='OverFive'&&$dis=='male'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>=5 AND gender='".$dis."'");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>=5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}else if($name=='OverFive'&&$dis=='female'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>=5 AND gender='".$dis."'");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>=5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}else if($name=='OverFive'&&$dis=='both'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE gender IN('male','female') AND age>=5");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>=5 AND gender IN('male','female') AND  stamp>='".$d1."' AND stamp<='".$d2."'");
  }
}

$num_results = mysqli_num_rows($result);
  for ($i=1; $i <$num_results+1; $i++) {
  $row=mysqli_fetch_array($result);
  
  $resultx =mysqli_query($db, "select * from  newprescription where PatId='".stripslashes($row['pntno'])."' limit 0,1");
  $rowx=mysqli_fetch_array($resultx);

  //count diseases
  $max1=count($dept1);
  for ($x= 0; $x < $max1; $x++){
    $var1=$dept1[$x][1];
    $var2=stripslashes($rowx['DiagName']);
    if(like_match('%'.$var1.'%',$var2)){
      $dept1[$x][2]+=1;  
      $dept1[$x][3]=$dept1[$x][2];
    }
  }
  

  //count diseases
  $max1=count($dept3);
  for ($x= 0; $x < $max1; $x++){
    $var1=strtolower($dept3[$x][1]);
    $var2=strtolower(stripslashes($row['gender']));
    if($var1==$var2){
      $dept3[$x][2]+=1;  
      $dept3[$x][3]=$dept3[$x][2];
    }
  }

  //count attendance
  $max2=count($dept2);
  for ($x= 0; $x < $max2; $x++){
    $var1=$dept2[$x][1];
    $var2=stripslashes($row['type']);
    if(like_match('%'.$var1.'%',$var2)){
      $dept2[$x][2]+=1;  
      $dept2[$x][3]=$dept2[$x][2];
    }
  }
  
  
if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';} else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

       <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i;?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stamptodate(stripslashes($row['stamp']) )?></td>
      <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['pntno']) ?></td>
      <td style="width:16%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['fullnames']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['age'])?></td><!-- date('Y')-substr(stripslashes($row['dob']),-4,4) -->
      <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gender']) ?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['DiagName']).' '.stripslashes($rowx['Diagnosis']).' '.stripslashes($rowx['DiagCat']); ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gcont']) ?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['type']) ?></td>


    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:10px"></div>
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Diseases Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
    if($dept1[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept1[$x][1].": ".$dept1[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">New / Re-Attendance</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
    if($dept2[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept2[$x][1].": ".$dept2[$x][3]."</p>";
    }
  }
    
?>
</div>


<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Gender Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept3);
for ($x= 0; $x < $max1; $x++){
    if($dept3[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept3[$x][1].": ".$dept3[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 11111111111111:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
$dis=$_GET['dis'];
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
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GENERAL OUTPATIENTS REPORTS (FILTER CLINICS) <br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CATEGORY:<strong style="font-size:12px"><?php  echo $name ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>


<a download="diagnosisreport.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">Date of Creation</td>
        <td  style="width:7%;">Patient Id</td>
        <td  style="width:18%;">Patient Name</td>
        <td  style="width:7%;">Age</td>
        <td  style="width:7%;">Gender</td>
        <td  style="width:10%;">Contact Number</td>
        <td  style="width:15%;">Guardian</td>
        <td  style="width:8%;">Relationship</td>
        <td  style="width:8%;">Guardian Contact</td>
        <td  style="width:8%;">Type</td>
    </tr>
    

<?php

$dept=array(array());
$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0); 
}



$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept[$i][1]=stripslashes($row['name']);
$dept[$i][0]=stripslashes($row['id']);
$dept[$i][2]=stripslashes($row['abbr']);
}
$max=count($dept);
for ($x= 0; $x < $max; $x++){
  $dept[$x][2]==0;
  }
$arr1=array();$arr2=array();$arr3=array();


if($name=='OverFive'){
  if($code==1){
  $result =mysqli_query($db, "select * from  patients where age>=5 and gender='".$dis."'");
  }
  else{
  $result =mysqli_query($db, "select * from  patients where age>=5 ");
  }
}
else if($name='UnderFive'){
  //$overfive
  
  if($code==1){
  $result =mysqli_query($db, "select * from patients where age<5 and gender='".$dis."'");
  }
  else{
  $result =mysqli_query($db, "select * from  patients where  age<5 ");
  }
}
/*else if($name=='All'&&$dis!='All'){
  
  if($code==1){
  $result =mysqli_query($db, "select * from patients where gender LIKE '%".$dis."%' ");
  }
  else{
  $result =mysqli_query($db, "select * from  patients where  gender LIKE '%".$dis."%'");
  }
}
else if($name!='All'&&$dis!='All'){
  
  if($code==1){
  $result =mysqli_query($db, "select * from patients where gender LIKE '%".$dis."%'  and age='".$name."'");
  }
  else{
  $result =mysqli_query($db, "select * from  patients where  gender LIKE '%".$dis."%' and age='".$name."'");
  }
}*/
$num_results = mysqli_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysqli_fetch_array($result);
  
  
  //$resultx =mysqli_query($db, "select * from  patients where pntno='".stripslashes($row['pntno'])."' limit 0,1");
  //$rowx=mysqli_fetch_array($resultx);

  //count diseases

  $max=count($dept);
  for ($x= 0; $x < $max; $x++){


    $var1=$dept[$x][1];
    $var2=stripslashes($row['type']);
    if(like_match('%'.$var1.'%',$var2)){

      $dept[$x][2]+=1;  
      $dept[$x][3]=$dept[$x][2];
    }
  }
  
  
if($i%2==0){
      echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stamptodate(stripslashes($row['stamp']) )?></td>
       <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['pntno']) ?></td>
      <td style="width:18%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['fullnames']) ?></td>
       <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo date('Y')-substr(stripslashes($row['dob']),-4,4)?></td>
          <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gender']) ?></td>
           <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['contact']) ?></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;text-transform:uppercase;"><?php  echo stripslashes($row['gname']) ?></td>
        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['grship']) ?></td>
          <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gcont']) ?></td>
          <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['type']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:10px"></div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Diseases Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
    if($dept[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept[$x][1].": ".$dept[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 2:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
$dis=$_GET['dis'];
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
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DIAGNOSIS REPORTS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DEPARTMENT:<strong style="font-size:12px"><?php  echo $name ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>


<a download="diagnosisreport.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="width:30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:8%;">Date</td>
        <td  style="width:7%;">Patient Id</td>
        <td  style="width:10%;">Patient Name</td>
         <td  style="width:7%;">Age</td>
       <td  style="width:15%;">History</td>
        <td  style="width:10%;">Diagnosis Category</td>
        <td  style="width:15%;">Diagnosis Details</td>
        <td  style="width:8%;">Department</td>
        <td  style="width:11%;">Type</td>
    </tr>
    

<?php

$dept=array(array());
$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0); 
}



$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept[$i][1]=stripslashes($row['name']);
$dept[$i][0]=stripslashes($row['id']);
$dept[$i][2]=stripslashes($row['abbr']);
}
$max=count($dept);
for ($x= 0; $x < $max; $x++){
  $dept[$x][2]==0;
  }
$arr1=array();$arr2=array();$arr3=array();


if($name=='All'&&$dis=='All'){
  if($code==1){
  $result =mysqli_query($db, "select * from newprescription");
  }
  else{
  $result =mysqli_query($db, "select * from  newprescription where Stamp>='".$d1."' and Stamp<='".$d2."'");
  }
}
else if($name!='All'&&$dis=='All'){
  
  if($code==1){
  $result =mysqli_query($db, "select * from newprescription where Dept='".$name."'");
  }
  else{
  $result =mysqli_query($db, "select * from  newprescription where  Dept='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
  }
}
else if($name=='All'&&$dis!='All'){
  
  if($code==1){
  $result =mysqli_query($db, "select * from newprescription where DiagName LIKE '%".$dis."%' ");
  }
  else{
  $result =mysqli_query($db, "select * from  newprescription where  DiagName LIKE '%".$dis."%'  and Stamp>='".$d1."' and Stamp<='".$d2."'");
  }
}
else if($name!='All'&&$dis!='All'){
  
  if($code==1){
  $result =mysqli_query($db, "select * from newprescription where DiagName LIKE '%".$dis."%'  and Dept='".$name."'");
  }
  else{
  $result =mysqli_query($db, "select * from  newprescription where  DiagName LIKE '%".$dis."%' and Stamp>='".$d1."' and Stamp<='".$d2."' and Dept='".$name."'");
  }
}
$num_results = mysqli_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysqli_fetch_array($result);
  
  
  $resultx =mysqli_query($db, "select * from  patients where pntno='".stripslashes($row['PatId'])."'  AND age<5 limit 0,1");
  $rowx=mysqli_fetch_array($resultx);
  //count diseases

  $max=count($dept);
  for ($x= 0; $x < $max; $x++){


    $var1=$dept[$x][1];
    $var2=stripslashes($row['DiagName']);
    if(like_match('%'.$var1.'%',$var2)){

      $dept[$x][2]+=1;  
      $dept[$x][3]=$dept[$x][2];
    }
  }
  
  
    if($i%2==0){echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}?>

<td style="width:8%;border-width:0.5px;border-color:#666;border-style:solid;"><?php echo dateprint(stripslashes($row['TransDate']))?></td>
  <td style="width:7%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($row['PatId']) ?></td>
  <td style="width:10%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($row['PatName']) ?></td>
  <td style="width:7%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($rowx['age']) ?></td>
  <td style="width:15%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($row['History']) ?></td>
  <td style="width:10%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($row['DiagName']) ?></td>
  <td style="width:15%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($row['Diagnosis']) ?></td>
  <td style="width:8%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($row['Dept']) ?></td>
  <td style="width:11%;border-width:0.5px; border-color:#666;border-style:solid;"><?php echo stripslashes($row['Type']) ?></td>
</tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:10px"></div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Diseases Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
    if($dept[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept[$x][1].": ".$dept[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;
case 3:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=htmlspecialchars($_GET['code']);
$name=htmlspecialchars($_GET['name']);
$dis=htmlspecialchars($_GET['dis']);
if(isset($_GET['d1'])){
  $d1=htmlspecialchars($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=htmlspecialchars($_GET['d2']);
}else $d2=0;
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GENERAL ADMISSIONS REPORTS (FILTER CLINICS) <br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CATEGORY:<strong style="font-size:12px"><?php  echo $name ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1; ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2; ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>


<a download="diagnosisreport.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:3%;"></td>
      <td  style="width:7%;">Date</td>
        <td  style="width:5%;">Patient Id</td>
        <td  style="width:14%;">Patient Name</td>
        <td  style="width:5%;">Age</td>
        <td  style="width:7%;">Gender</td>
        <td  style="width:10%;">Ward</td>
        <td  style="width:11%;">Diagnosis Category</td>
        <td  style="width:7%;">AdmitDate</td>
        <td  style="width:7%;">Discharge</td>
        <td  style="width:7%;">Guardian Contact</td>
        <td  style="width:7%;">Type</td>
    </tr>
    

<?php

$dept3=array(array());
$resultv =mysqli_query($db, "select * from filterclinics order by id");
$num_resultvs = mysqli_num_rows($resultv);
for ($i=0; $i <$num_resultvs; $i++) {
$dept3[$i]=array(0,0,0,0); 
}

$resultv =mysqli_query($db, "select * from filterclinics order by id");
$num_resultvs = mysqli_num_rows($resultv);
for ($i=0; $i <$num_resultvs; $i++) {
  $rowv=mysqli_fetch_array($resultv);
  $dept3[$i][1]=stripslashes($rowv['name']);
  $dept3[$i][0]=stripslashes($rowv['id']);
  $dept3[$i][2]=stripslashes($rowv['abbr']);
}
$max1=count($dept3);
for ($x= 0; $x < $max1; $x++){
  $dept3[$x][2]==0;
}
//$arr1=array();$arr2=array();$arr3=array();

$dept1=array(array());
$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept1[$i]=array(0,0,0,0); 
}



$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept1[$i][1]=stripslashes($row['name']);
$dept1[$i][0]=stripslashes($row['id']);
$dept1[$i][2]=stripslashes($row['abbr']);
}
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
  $dept1[$x][2]==0;
  }
//$arr1=array();$arr2=array();$arr3=array();

$dept2=array(array());
$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept2[$i]=array(0,0,0,0); 
}



$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept2[$i][1]=stripslashes($row['name']);
$dept2[$i][0]=stripslashes($row['id']);
$dept2[$i][2]=stripslashes($row['abbr']);
}
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
  $dept2[$x][2]==0;
  }
//$arr1=array();$arr2=array();$arr3=array();


if($name=='Over60'&&$dis=='male'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>59 AND gender='".$dis."' AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>59  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}else if($name=='Over60'&&$dis=='female'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>59 AND gender='".$dis."' AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>59  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}else if($name=='Over60'&&$dis=='both'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE gender IN('male','female') AND age>59");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>59 AND gender IN('male','female') AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}

if($name=='UnderFive'&&$dis=='male'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age<5 AND gender='".$dis."' AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age<5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}else if($name=='UnderFive'&&$dis=='female'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age<5 AND gender='".$dis."' AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age<5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}else if($name=='UnderFive'&&$dis=='both'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE gender IN('male','female') AND age<5 AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age<5 AND gender IN('male','female') AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}

if($name=='OverFive'&&$dis=='male'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>=5 AND gender='".$dis."' AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>=5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}else if($name=='OverFive'&&$dis=='female'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM patients WHERE age>=5 AND gender='".$dis."' AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>=5  AND gender='".$dis."' AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}else if($name=='OverFive'&&$dis=='both'){
  if($code==1){
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE gender IN('male','female') AND age>=5 AND ipno!='' ");
  }else{
  $result =mysqli_query($db, "SELECT * FROM  patients WHERE age>=5 AND gender IN('male','female') AND  stamp>='".$d1."' AND stamp<='".$d2."' AND ipno!='' ");
  }
}

$num_results = mysqli_num_rows($result);
  for ($i=1; $i <$num_results+1; $i++) {
  $row=mysqli_fetch_array($result);
  
  $resultx =mysqli_query($db, "select * from inpatients where PatId='".stripslashes($row['pntno'])."' limit 0,1");
  $rowx=mysqli_fetch_array($resultx);

  $resultzx =mysqli_query($db, "select * from discharge where patid='".stripslashes($row['pntno'])."' limit 0,1");
  $rowzx=mysqli_fetch_array($resultzx);

  //count diseases
  $max1=count($dept1);
  for ($x= 0; $x < $max1; $x++){
    $var1=$dept1[$x][1];
    $var2=stripslashes($rowx['DiagName']);
    if(like_match('%'.$var1.'%',$var2)){
      $dept1[$x][2]+=1;  
      $dept1[$x][3]=$dept1[$x][2];
    }
  }
  

  //count diseases
  $max1=count($dept3);
  for ($x= 0; $x < $max1; $x++){
    $var1=strtolower($dept3[$x][1]);
    $var2=strtolower(stripslashes($row['gender']));
    if($var1==$var2){
      $dept3[$x][2]+=1;  
      $dept3[$x][3]=$dept3[$x][2];
    }
  }

  //count attendance
  $max2=count($dept2);
  for ($x= 0; $x < $max2; $x++){
    $var1=$dept2[$x][1];
    $var2=stripslashes($row['type']);
    if(like_match('%'.$var1.'%',$var2)){
      $dept2[$x][2]+=1;  
      $dept2[$x][3]=$dept2[$x][2];
    }
  }
  
  
if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';} else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i;?></td>
      <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stamptodate(stripslashes($row['stamp']) )?></td>
      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['pntno']) ?></td>
      <td style="width:14%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['fullnames']) ?></td>
      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['age'])?></td><!-- date('Y')-substr(stripslashes($row['dob']),-4,4) -->
      <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gender']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['MainWard']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;text-transform:uppercase;"><?php  echo stripslashes($rowx['DiagName']) ?></td>
      <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowzx['admdate']) ?></td>
      <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowzx['dischargedate']) ?></td>
      <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gcont']) ?></td>
      <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['type']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:10px"></div>
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Diseases Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
    if($dept1[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept1[$x][1].": ".$dept1[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">New / Re-Attendance</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
    if($dept2[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept2[$x][1].": ".$dept2[$x][3]."</p>";
    }
  }
    
?>
</div>


<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Gender Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept3);
for ($x= 0; $x < $max1; $x++){
    if($dept3[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept3[$x][1].": ".$dept3[$x][3]."</p>";
    }
  }
    
?>
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
</HTML>