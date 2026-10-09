<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('in-custom-dispensin2', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<title>Better Health Custom Departmental Reports</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>


<style>
@font-face { font-family: Merchant; src: url('../fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>

</head>

<body>

<?php 

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$code2=$_GET['code2'];
#$pgheadtitle="PHARMACY DISPENSES REPORT";
$pgheadtitle=$_GET['code'];
$catname=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;

$fname=strtolower($date).'_pharmacy_dispenses';

#$rcptno = $_GET['rcptno'];Category:'.$catname.'

pharmacy_dispenses_patient_reports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$code2,$pgheadtitle,$catname);

 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
        #echo $d1;
    #echo $d2;
?>
<?php
#echo "<div style='clear:both; margin-bottom:10px'></div>";
echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img src='../images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
#echo "<div style='clear:both; margin-bottom:10px' ></div>";

?>
<?php 
echo "<table id='datatable'  style='width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;' >";
echo "<tbody>";
echo '<table id="datatable"  style="width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;" >';
echo '<tbody>';
echo ' <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;">Date</td>
      <td  style="width:25%;">Patient Name</td>';
   //    echo'<td  style="width:35%;">Item</td>';
      // echo'<td  style="width:10%;">Qty</td>';
      // echo'<td  style="width:10%;">Total</td>';
      echo'<td  style="width:10%;">Posted BY</td>';
       echo' </tr>';

?>
<?php

if($code=='DISPENSING'){
  if($d1==0){
    $result =mysqli_query($db, "select * from pharmrequests where category IN ('DISPENSING') ");
  }else{
    $result =mysqli_query($db, "select * from pharmrequests where stamp>='".$d1."' and stamp<='".$d2."' and category IN ('DISPENSING') ");
  }
}

if($code=='DRESSING'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('DRESSING') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('DRESSING') ");
  }
}

if($code=='LABORATORY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from labrequests where request IN ('CUSTOM LAB TESTS') ");
  }else{
    $result =mysqli_query($db, "select * from labrequests where stamp>='".$d1."' and stamp<='".$d2."' and request IN ('CUSTOM LAB TESTS') ");
  }
}

if($code=='ENT CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('ENT CLINIC') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('ENT CLINIC') ");
  }
}

if($code=='MOBILECLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('MOBILECLINIC') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('MOBILECLINIC') ");
  }
}

if($code=='MEDICAL CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('MEDICAL CLINIC') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('MEDICAL CLINIC') ");
  }
}

if($code=='GENERAL CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('GENERAL CLINIC') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('GENERAL CLINIC') ");
  }
}

if($code=='MENTAL CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('MENTAL CLINIC') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('MENTAL CLINIC') ");
  }
}

if($code=='SURGICAL CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('SURGICAL CLINIC') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('SURGICAL CLINIC') ");
  }
}

if($code=='GYNECOLOGY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('GYNECOLOGY') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('GYNECOLOGY') ");
  }
}

if($code=='PHYSIOTHERAPY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('PHYSIOTHERAPY') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('PHYSIOTHERAPY') ");
  }
}

if($code=='THEATRE'){
  if($d1==0){
    $result =mysqli_query($db, "select * from theatrequests where procedures IN ('CUSTOM THEATRE TESTS') ");
  }else{
    $result =mysqli_query($db, "select * from theatrequests where stamp>='".$d1."' and stamp<='".$d2."' and procedures IN ('CUSTOM THEATRE TESTS') ");
  }
}

if($code=='RADIOLOGY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from radrequests where request IN ('CUSTOM ULTRASOUND TESTS') ");
  }else{
    $result =mysqli_query($db, "select * from radrequests where stamp>='".$d1."' and stamp<='".$d2."' and request IN ('CUSTOM ULTRASOUND TESTS') ");
  }
}


if($code=='ANC/MCH CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from newprescription where Dept IN ('ANC/MCH CLINIC') ");
  }else{
    $result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and Stamp<='".$d2."' and Dept IN ('ANC/MCH CLINIC') ");
  }
}






    $a=1;
  $zx=0;
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
  $zx+=preg_replace('~,~', '', stripslashes($row['subnet']));

    if($i%2==0){
        echo'<tr style="width:100%;height:20px;padding:0;font-weight:normal">';
        }else{ echo'<tr style="width:100%;height:20px;padding:0;background:#f0f0f0;font-weight:normal">';}

                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['date'])."</td>";
                 echo "<td style='width:25%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['patname'])."</td>";
                 //echo "<td style='width:35%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['itname'])."</td>";
                 //echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['quat'])."</td>";
                 //echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['subnet'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['requested'])."</td>";
        
  echo "</tr>";
}
?>
<?php
echo'
</tbody>
</table>'; 
echo '<p style="text-align:center;font-size:12px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Total Dispensed:'.$zx.'</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
