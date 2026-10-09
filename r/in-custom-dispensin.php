<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('in-custom-dispensin', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/../includes/functions.php');
include __DIR__ . '/../includes/func.php';
#include(__DIR__ . '/../includes/compile.php');
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
<title>Better Health OPD Custom Departmental Reports</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/chart.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>


<style>
@font-face { font-family: Merchant; src: url('../fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:14px; font-weight:bold; text-transform:uppercase;line-height: 1.0;letter-spacing: 1px;
}
</style>

</head>

<body>

<?php 

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=htmlsan(safe_decode($_GET['code']));
$code2=0;
$pgheadtitle="CUSTOM PATIENTS REPORT";
$catname=htmlsan(safe_decode($_GET['code']));
if(isset($_GET['d1'])){
  $d1=htmlsan($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=htmlsan($_GET['d2']);
}else $d2=0;

#$fname=strtolower($date).'_all_custom_patients_report';
$custom_patients_list=$d1.'-'.$d2.'-'.$date.'_all_custom_patients_report';

#$rcptno = $_GET['rcptno'];Category:'.$catname.'

pharmacy_dispenses_patient_reports2($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$code2,$pgheadtitle,$catname);
$result = mysqli_query($db, "CALL GetUserLogs('".$username." generates custom departmental report-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");

 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
        #echo $d1;
    #echo $d2;
?>
<p><a download="<?php  echo $custom_patients_list; ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'custom_patients_datatable', 'Sheet Name Here');"><img src="../images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="custom_patients_datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<?php 
echo ' <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
            <td  style="width:10%;">Date</td>
            <td  style="width:20%;">Patient Name</td>
            <td  style="width:20%;">Description</td>
            <td  style="width:10%;">Department</td>
            <td  style="width:10%;">Qty</td>
            <td  style="width:10%;">Price</td>
            <td  style="width:10%;">Total</td>
            <td  style="width:10%;">User</td>
        </tr>';

?>
<?php

  if($code=='All'){    
    $result =mysqli_query($db, "select * from getcustom_patient_list");
  }
  else {
      if($d1==0){
        $result =mysqli_query($db, "select * from getcustom_patient_list WHERE category='".$code."' ");
      }else {
        $result =mysqli_query($db, "select * from getcustom_patient_list where SStamp>='".$d1."' and SStamp<='".$d2."' AND category='".$code."' ");
      }
  }

    $a=1;
  $a=0;$b=0;
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
  $a+=preg_replace('~,~', '', stripslashes($row['price']));
  $b+=preg_replace('~,~', '', stripslashes($row['totprice']));
  $c+=preg_replace('~,~', '', stripslashes($row['quantity']));

    if($i%2==0){
        echo'<tr style="width:100%;height:20px;padding:0;font-weight:normal">';
        }else{ echo'<tr style="width:100%;height:20px;padding:0;background:#f0f0f0;font-weight:normal">';}

                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['Date'])."</td>";
                 echo "<td style='width:20%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['pntname'])."</td>";
                 echo "<td style='width:20%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['itname'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['category'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['quantity'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['price'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['totprice'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;' title='PostedBy: ".stripslashes($row['PostBy'])." - Cashier: ".stripslashes($row['CashierBy'])."'>".stripslashes($row['CashierBy'])."</td>";
        
  #echo "</tr>";
}
echo'
</tr>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">Totals</td>
        <td  style="width:20%;"></td>
        <td  style="width:20%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;">';?><script>document.writeln(( <?php echo $c ?>).formatMoney(2, '.', ','));</script><?php echo'</td>
        <td  style="width:10%;">';?><script>document.writeln(( <?php echo $a ?>).formatMoney(2, '.', ','));</script><?php echo'</td>
        <td  style="width:10%;">';?><script>document.writeln(( <?php echo $b ?>).formatMoney(2, '.', ','));</script><?php echo'</td>
    </tr>';

?>
<?php
echo'
</tbody>
</table>'; 
echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Total:'.$b.'.00/=</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
