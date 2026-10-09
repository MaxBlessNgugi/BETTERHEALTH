<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('in-custom-bydept2', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../css/tokens.css" />
<title>Better Health Custom Departmental Patients Report</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>


<style>
@font-face { font-family: Merchant; src: url('../fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:12px; font-weight:bold; text-transform:uppercase;line-height: 1.0;letter-spacing: 1px;
}
</style>

</head>

<body>

<?php 

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=htmlsan($_GET['code']);
$code2=htmlsan($_GET['code2']);
$pgheadtitle="CUSTOM DEPARTMENTAL PATIENTS REPORT";
$catname=htmlsan($_GET['code']);
if(isset($_GET['d1'])){
	$d1=htmlsan($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=htmlsan($_GET['d2']);
}else $d2=0;

$fname=strtolower($date).'_by_department_custom_patients_report';

#$rcptno = $_GET['rcptno'];Category:'.$catname.'

pharmacy_dispenses_patient_reports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$code2,$pgheadtitle,$catname);

 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
    //     echo $d1;
 		// echo $d2;
?>
<?php
#echo "<div style='clear:both; margin-bottom:10px'></div>";
echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img src='../images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
#echo "<div style='clear:both; margin-bottom:10px' ></div>";

?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; padding:0; " >
<?php 
// echo "<table id='datatable' style='width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;' >";
// echo "<tbody>";
// echo '<table id="datatable" style="width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding:0;" >';
echo '<tbody>';
echo '<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
    			<td  style="width:10%;">Date</td>
    			<td  style="width:16%;">Patient Name</td>
    			<td  style="width:24%;">Description</td>
          <td  style="width:10%;">Request Time</td>
    			<td  style="width:10%;">Serve Time</td>
    			<td  style="width:10%;">Request By</td>
    			<td  style="width:10%;">Served By</td>
      </tr>';

?>
<?php
#sp_GetCustomDepartmentalList

  // if($d1==0){
  //   $result =mysqli_query($db, "select * from getcustom_departmental_list where category='".$code."'");
  // }else{
  //   $result =mysqli_query($db, "select * from getcustom_departmental_list where category='".$code."' and SStamp>='".$d1."' and SStamp<='".$d2."' "); 
  // }

if($code=='DISPENSING'){
  if($d1==0){ #getcustom_dispensing_list
    $result =mysqli_query($db, "select * from getcustom_dispensing_list");
  }else{
    $result =mysqli_query($db, "select * from getcustom_dispensing_list where transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}

if($code=='LABORATORY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_laboratory_list");
  }else{
    $result =mysqli_query($db, "select * from getcustom_laboratory_list where transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}

if($code=='RADIOLOGY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_ultrasound_list");
  }else{
    $result =mysqli_query($db, "select * from getcustom_ultrasound_list where transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}

if($code=='MCH'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}
if($code=='PHYSIOTHERAPY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}
if($code=='EMERGENCIES'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}
if($code=='PAEDIATRICS'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}
if($code=='DENTAL CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}

if($code=='DRESSING'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}

if($code=='GYNECOLOGY'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}

if($code=='EYE CLINIC'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}

if($code=='DIALYSIS'){
  if($d1==0){
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' ");
  }else{
    $result =mysqli_query($db, "select * from getcustom_examination_list where in_cust_dept='".$code."' and transtamp>='".$d1."' and transtamp<='".$d2."'");
  }
}


  $a=1;
	$zx=0;
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);

    if($i%2==0){
        echo'<tr style="width:100%;height:20px;padding:0;font-weight:normal">';
        }else{ echo'<tr style="width:100%;height:20px;padding:0;background:#f0f0f0;font-weight:normal">';}

                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['transdate'])."</td>";
                 echo "<td style='width:16%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['in_pat_name'])."</td>";
                 echo "<td style='width:24%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['in_request_name'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['in_request_time'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['in_served_time'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['in_requested_by'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['in_served_by'])."</td>";
        
  echo "</tr>";
}
?>
<?php
echo'
</tbody>
</table>'; 

echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
