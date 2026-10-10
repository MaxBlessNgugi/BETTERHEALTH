<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('over-18-patients-list', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<link rel="stylesheet" href="../css/components.css" />
<title>Better Health OPD Patients List Reports</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>
<style>
/*#title{position:relative; float:left;width:auto; background:#333; border:0px solid #ccc;font-size:10px}
#figure1{position:relative; float:left;width:141.0px; margin-right:2px; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:13px; color:#fff;  background:#333; text-align:center}
.figure2x,#figure2x,.figure2x,#figure2{position:relative; float:left;width:141.7px; border-right:1px solid #333; border-bottom:1px solid #333; margin:0; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:11px; color:#333;  background:none; text-align:center;min-height:16px}
.cleaner { clear: both; width: 100%; height: 0px; font-size: 0px;  }
.cleaner_h5 { clear: both; width:100%; height: 5px; }
.cleaner_h10 { clear: both; width:100%; height: 10px; }
.normal,#normal{position:relative; float:left;width:auto; background:#f0f0f0; border-left:1px solid #333; cursor:pointer}
.normal:hover,#normal:hover{background:#C0E4E7}
.put_field{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:11px; text-align:center}*/
</style>


<style>
@font-face { font-family: Merchant; src: url('../fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>

</head>

<body>
	<a class="bh-skip" href="#datatable">Skip to main content</a>

<?php 
$date=date('Y/m/d');
$stamp=date('Ymd');
$eightteen=" & OVER ";
$code=htmlspecialchars($_GET['code']);
$pgheadtitle=htmlspecialchars($_GET['name']).''.$eightteen;
if(isset($_GET['d1'])){
   $d1=htmlspecialchars($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
   $d2=htmlspecialchars($_GET['d2']);
}else $d2=0;

$fname='over18_patient_list_reports';

general_opd_clinic_patients_reports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$pgheadtitle);

?>
<?php
#echo "<div style='clear:both; margin-bottom:10px'></div>";
echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img alt=\"Convert to Excel\" src='../images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
#echo "<div style='clear:both; margin-bottom:10px' ></div>";

?>
<?php 
echo '<table id="datatable"  style="width:100%;text-align:center;font-size:14px; font-weight:normal;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;"  tabindex="-1">';
echo '<tbody>';
echo '<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">';
	echo '<td  style="width:3%;">#</td>';
			echo '<td  style="width:5%;">Last Date Seen</td>';
			echo '<td  style="width:5%;">Re-Attend</td>';
			echo '<td  style="width:5%;">Patient No</td>';
			echo '<td  style="width:15%;">Patient Name</td>';
			echo '<td  style="width:3%;">Age</td>';
			echo '<td  style="width:5%;">Temperature</td>';
			echo '<td  style="width:5%;">BP</td>';
			echo '<td  style="width:5%;">Weight</td>';
			echo '<td  style="width:5%;">Resp Rate</td>';
			echo '<td  style="width:5%;">Gender</td>';
			echo '<td  style="width:5%;">Clinic</td>';
			echo '<td  style="width:10%;">Diagnosis Details</td>';
			echo '<td  style="width:23%;">Treatment</td>';
	echo '</tr>';

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
	$result =mysqli_query($db, "select * from tbltypes order by id");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$dept1[$i]=array(0,0,0,0); 
	}



	$result =mysqli_query($db, "select * from tbltypes order by id");
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
	$result =mysqli_query($db, "select * from clinics order by id");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$dept2[$i]=array(0,0,0,0); 
	}

	$result =mysqli_query($db, "select * from clinics order by id");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$dept2[$i][1]=stripslashes($row['Abbr']);
	$dept2[$i][0]=stripslashes($row['id']);
	$dept2[$i][2]=stripslashes($row['Abbrv']);
	}
	$max2=count($dept2);
	for ($x= 0; $x < $max2; $x++){
	  $dept2[$x][2]==0;
	  }
	//$arr1=array();$arr2=array();$arr3=array();


   if($d1==0){
   	$result =mysqli_query($db, "SELECT * FROM betterhealth.geteighteen_and_over WHERE age>=18 ORDER BY Id"); // where age>=18 
   }else{
   	$result =mysqli_query($db, "SELECT * FROM betterhealth.geteighteen_and_over WHERE age>=18 AND TransDate>='".$d1."' AND TransDate<='".$d2."' ORDER BY Id");
   }

	$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results +1; $i++) { $xx++;
	$row=mysqli_fetch_array($result);
	$notes = strip_tags($row['Prescription'], '</br>');
	$patage = date('Y')-substr(stripslashes($row['dob']),-4,4);


  $resultx =mysqli_query($db, "SELECT * FROM betterhealth.newprescription WHERE PatId='".stripslashes($row['PatId'])."' LIMIT 0,1");
  $rowx=mysqli_fetch_array($resultx);

  //count diseases
  $max1=count($dept1);
  for ($x= 0; $x < $max1; $x++){
    $var1=$dept1[$x][1];
    $var2=stripslashes($row['Type']);
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
    $var2=stripslashes($row['OtherDetails']);
    if(like_match('%'.$var1.'%',$var2)){
      $dept2[$x][2]+=1;  
      $dept2[$x][3]=$dept2[$x][2];
    }
  }
   


 if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

						echo '<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;">'.$xx.'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.htmlspecialchars($row['TransDate']).'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Type']).'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['PatId']).'</td>
								<td style="width:15%;border-width:0.5px; border-color:#666;border-style:solid;">'.stripslashes($row['PatName']).'</td>
								<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;">'.$patage.'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.htmlspecialchars($row['Temp']).'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.htmlspecialchars($row['Bp1']).'/'.htmlspecialchars($row['Bp2']).'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Weight']).'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['RespRate']).'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['gender']).'</td>
								<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['OtherDetails']).'</td>';
			
					       if(stripslashes($row['OtherDetails'])!="NONE"&&stripslashes($row['OtherDetails'])!=''){
									echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['DiagName']).'</td>';
									echo'<td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;">'.$notes.'</td>';
								}else{
									echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
									echo'<td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
								}
     
				echo'</tr>';
		
    } 
echo'
<tr style="width:100%; height:20px;color:#fff; background:#ccc; padding:0">
        <td  style="width:3%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:15%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:23%;"></td>
    </tr>

</tbody>
</table>'; 

?>
<?php
echo '<div style="clear:both; margin-bottom:10px"></div>';echo '
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 10px 0 10px">Clinic Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>';

$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
    if($dept2[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept2[$x][1].": ".$dept2[$x][3]."</p>";
    }
  }
 
echo '</div>';

echo '<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 10px 0 10px">New / Re-Attendance</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>';

$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
    if($dept1[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept1[$x][1].": ".$dept1[$x][3]."</p>";
    }
  }
    
echo '</div>';


echo '<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 10px 0 10px">Gender Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>';

$max1=count($dept3);
for ($x= 0; $x < $max1; $x++){
    if($dept3[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept3[$x][1].": ".$dept3[$x][3]."</p>";
    }
  }
    
echo '</div>';

echo '<div style="clear:both; margin-bottom:20px"></div>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.<br/>Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
