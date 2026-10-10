<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('in-ovc', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=htmlsan($_GET['code']);
#$code2=htmlsan($_GET['code2']);
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
echo '
<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Logo" src="../'.$logo.'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:14px;; text-transform:uppercase; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">'.$comname.'<br/>P.O Box '.$Add.'<br/>Tel: '.$tel.'<br/>Website: '.$web.'<br/>Email: '.htmlspecialchars($email).'<br/>'.$pgheadtitle.'<br/>';
echo ' <strong style="font-size:14px">Date:'.date('d/m/Y').'</strong><br/><strong style="font-size:14px">Category:'.htmlspecialchars($catname).'</strong></p>';

 if($d1!=0){
  echo '<p style="text-align:center;font-size:14px;; text-transform:uppercase; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;'.dateprint($d1).'&nbsp;&nbsp;To:&nbsp;'.dateprint($d2).'</p>';
 } else {
  echo '<p style="text-align:center;font-size:14px;; text-transform:uppercase; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Full Report</p>';
 }

 //$d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
?>

<?php 
//opdpatientsnewvisit_comparision_patient_reports($db,$d1,$d2);
//opdrevisit_comparision_patient_reports($db,$d1,$d2);


// echo '<table style="float: right;">';
// echo '<tr>
//         <thscope="col"></th>
//         <th scope="col" colspan="5">NEWVISIT</th>
//       </tr>';
// echo'<tr>
//       <td>-</td>
//       <td colspan="2"><5</td>
//       <td colspan="2">>5</td>
//       <td colspan="2">TOTALS</td>
//     </tr>
//     <tr>
//       <td>2022</td>
//       <td>2023</td>
//       <td>2022</td>
//       <td>2023</td>
//       <td>2022</td>
//       <td>2023</td>
//     </tr>';

//     #$sql = "SELECT * FROM `tblinvoices` WHERE `serial` = '".$serial."' ";
//     $sql = "CALL sp_opdClientsVisitComparision";
//     $res = mysqli_query($db, $sql);
//     $res_num = mysqli_num_rows($res);

//     #$res254 =mysqli_query($db, "select * from sp_opdClientsVisitComparision");
//     #$res254 =mysqli_query($db, "CALL sp_opdClientsVisitComparision"); 
//     $res_num = mysqli_num_rows($res);
//     for ($i=0; $i <$res_num; $i++) {
//     $rw254=mysqli_fetch_array($res);
//     echo print_r($row254);

//     if($i%2==0){
//         echo'<tr>';
//         }else{ echo'<tr>';}

//                  #echo "<td style='width:5%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['MonthNamee'])."</td>";
//                  echo '<td>'.$rw254['ClientType'].'</td>';
//                  echo '<td>'.$rw254['ClientType'].'</td>';
//                  echo '<td>'.$rw254['ClientType'].'</td>';
//                  echo '<td>'.$rw254['ClientType'].'</td>';
//                  echo '<td>'.$rw254['ClientType'].'</td>';
//                  echo '<td>'.$rw254['MiakaAge'].'</td>';
//                  echo '<td>'.$rw254['Id'].'</td>';
        
//       echo "</tr>";
//     }

// echo'</table>';

?>


<?php

echo '<div style="clear:both; margin-bottom:20px"></div>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';







			
			echo '<div id="personal">';
				  echo '<h5>Next Of Kin</h5>';
				  echo '<div class="cleaner"></div>
						<a class="labels">Names:</a>';


			 echo '</div>';
			echo '<div id="personal">';
				  echo '<h5>Next Of Kin</h5>';
				  echo '<div class="cleaner"></div>
						<a class="labels">Names:</a>';


			 echo '</div>';





?>          

</body>
</html>
