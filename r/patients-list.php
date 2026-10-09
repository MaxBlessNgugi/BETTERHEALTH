<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('patients-list', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/../includes/functions.php');
include __DIR__ . '/../includes/func.php';
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
<title>Better Health OPD Patients List Reports</title>
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
$code=htmlspecialchars($_GET['code']);
$pgheadtitle=htmlspecialchars($_GET['name']);
if(isset($_GET['d1'])){
   $d1=htmlspecialchars($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
   $d2=htmlspecialchars($_GET['d2']);
}else $d2=0;

$fname='patient_list_reports';

general_opd_clinic_patients_reports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$pgheadtitle);

?>
<?php
#echo "<div style='clear:both; margin-bottom:10px'></div>";
echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img src='../images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
#echo "<div style='clear:both; margin-bottom:10px' ></div>";

?>
<?php 
echo '<table id="datatable"  style="width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;" >';
echo '<tbody>';
echo '<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">';
	echo '<td  style="width:3%;">#</td>';
	echo '<td  style="width:5%;">Last Date Seen</td>';
	echo '<td  style="width:7%;">Re-Attend</td>';
	echo '<td  style="width:5%;">Patient No</td>';
	echo '<td  style="width:15%;">Patient Name</td>';
	echo '<td  style="width:5%;">Temperature</td>';
	echo '<td  style="width:5%;">BP</td>';
	echo '<td  style="width:5%;">Weight</td>';
	echo '<td  style="width:5%;">Resp Rate</td>';
	echo '<td  style="width:5%;">Pulse Rate</td>';
	echo '<td  style="width:18%;">Diagnosis Details</td>';
	echo '<td  style="width:13%;">Department</td>';
echo '</tr>';

	if($d1==0){
	$result =mysqli_query($db, "select * from newprescription where Dept='".$pgheadtitle."'");
	}else{
	$result =mysqli_query($db, "select * from newprescription where Dept='".$pgheadtitle."' and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	}

	$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
	
    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.$i.'</td>';
			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.htmlspecialchars($row['TransDate']).'</td>';
			echo '<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Type']).'</td>';
			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['PatId']).'</td>';
			echo '<td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['PatName']).'</td>';
			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.htmlspecialchars($row['Temp']).'</td>';
			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.htmlspecialchars($row['Bp1']).'/'.htmlspecialchars($row['Bp2']).'</td>';
			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Weight']).'</td>';
			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['RespRate']).'</td>';
			echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['PulseRate']).'</td>';
			echo '<td style="width:18%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['DiagName']).'</td>';
			echo '<td style="width:13%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Dept']).'</td>';

		echo'</tr>';
		$xx++;
    } 
echo'
<tr style="width:100%; height:20px;color:#fff; background:#ccc; padding:0">
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:7%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:15%;"></td>
        <td  style="width:6%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:18%;"></td>
        <td  style="width:13%;"></td>
    </tr>

</tbody>
</table>'; 
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
