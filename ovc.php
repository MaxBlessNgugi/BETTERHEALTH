<?php 
#include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('ovc', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
#include(__DIR__ . '/includes/functions.php');
#include __DIR__ . '/includes/func.php';
#include(__DIR__ . '/includes/compile.php');
require_once(__DIR__ . '/includes/db_fns.php');
require_once(__DIR__ . '/includes/functions.php');
#require(__DIR__ . '/includes/func.php');
#require(__DIR__ . '/includes/compile.php');
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


if(!check_required_files()){ require_once('r/init.php'); }

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
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<title>Better Health OPD Visits Comparision Report</title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script src="js/functions.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<script src="js/excellentexport.js"></script>

</head>
<body>
	<?php require_once __DIR__ . '/includes/render.php'; echo bh_skip_link('#bh-main'); ?>
<?php

// case 27:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
#$name=$_GET['name'];
$name='OPD Visits';
?>

<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">

<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:50%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr>
        <thscope="row"></th>
        <th scope="row" colspan="6">NEWVISIT</th>
</tr>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td style="width:15%;">MONTH</td>
        <td colspan="2"><5</td>
        <td colspan="2">>5</td>
        <td colspan="2">TOTALS</td>
</tr>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">MONTH</td>
        <td  style="width:10%;">2022</td>
        <td  style="width:10%;">2023</td>
        <td  style="width:10%;">2022</td>
        <td  style="width:10%;">2023</td>
        <td  style="width:10%;">2022</td>
        <td  style="width:10%;">2023</td>
    </tr>
    

<?php #sp_opdClientsVisitComparision(); #sp_opdPatientsVisitComparision(); #sp_opdPatientsVisitComparision2(); 

    $sqlQry = "CALL sp_underfive_yr_ovc('NewPatient','2023','2024');";
    $result = mysqli_query($dbconnect,$sqlQry);
    if (!$result){
        echo'<div class="alert alert-danger" role="alert" >Transaction Failed.</div>';
        die();
    }
   if(mysqli_num_rows($result) != 0){
    #$row=mysqli_fetch_array($result);    
    #echo print_r($row);
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row254=mysqli_fetch_array($result);

        // $sql1="CALL spyearone('NewPatient','2024',@S)";
        // #$sql1="SELECT @S;";
        // $qry1=mysqli_query($dbconnect,$sql1);
        // $num_ptyt = mysqli_num_rows($qry1);
        // for ($i=0; $i <$num_ptyt; $i++) {
        // $row2=mysqli_fetch_array($qry1); 
        // }


    if($i%2==0){
        echo'
        <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
        }else{
            echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}

                 echo "<td style='width:5%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['MonthName'])."</td>";
                 #echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['YearOne'])."</td>";
                 #echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['YearTwo'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['PatientType'])."</td>";#YearOne#YearTwo
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row2['YearTwo'])."</td>";
                 #echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row2['PatientTypeYearTwo'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['ClientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['ClientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['PatientNo'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['MedicalId'])."</td>";
        
      echo "</tr>";
       //$m++;
    }

   }
mysqli_close($db);
#mysqli_close($dbconnect);
echo'</tbody>';
echo'</table>'; 

   //  $query_ptnt_type_one = "call sp_opd_patients_type_comparision();";
   //  $resquery = mysqli_query($dbconnect,$query_ptnt_type_one);
   //  if (!$resquery){
   //      echo'<div class="alert alert-danger" role="alert" >PatientsVisitComparision Transaction Failed.</div>';
   //      die();
   //  }
   // if(mysqli_num_rows($resquery) != 0){
   //  $response=mysqli_fetch_array($resquery);    
   //  echo print_r($response);
   // }


// $query_vchs_two = mysqli_query($dbconnect, "CALL sp_opdPatientsVisitComparision();");     
// if (mysql_num_rows($query_vchs_two)>0) {
//     $output = '';
//     $output.='<table class="table table-stripped table-condensed" id="invs_to_apply">
//                 <thead>
//                     <tr><th scope="col" colspan="8" style="color:#c0392b;padding-bottom:10px;">TOTAL OVEPAYMENT: '.number_format($new_diff,2).' </th></tr>                  
//                     <tr><th scope="col" colspan="8" style="color:blue;padding-bottom:10px;"><small><span style="color:#000;">OTHER OUTSTANDING INVOICES FOR </span> '.$stdname.'</small>  </th></tr>                           
//                     <tr class="fs-s fw-thin">
//                         <thscope="col">REG.No</th>
//                         <thscope="col">STUDENT</th>            
//                         <thscope="col">FEE_TYPE</th>
//                         <thscope="col">INVOICE_DATE</th>
//                         <thscope="col">AMOUNT</th>
//                         <thscope="col">DESCRIPTION</th>
//                         <thscope="col">STREAM</th>
//                         <thscope="col">OPTION</th>
//                       </tr>                     
//                 </thead>                        
//             <tbody>';
//     while ($row = mysql_fetch_array($query_vchs_two)) {
//         $serial = trim($row['serial']);
//         $PayType = trim($row['PayType']);
//         $FeeType = trim($row['FeeType']);
//         $inv_no = trim($row['InvNo']);
//         $new_invdate = trim($row['InvDate']);
//             if (trim($row['Status'])==3) {$vchNo = generateUpdatedVchNo(trim($row['VouchNo']),$inv_no); $inv_bal = trim(stripslashes($row['InvBal']));  }else {$vchNo = generateSerialVchNo($prefix,$inv_no);$inv_bal = trim(stripslashes($row['InvBal'])); }
//     $output.='<tr><td>'.$row['Regn'].'</td>
//                 <td>'.ucwords(strtolower($row['StudName'])).'</td>                  
//                 <td>'.ucwords(strtolower($row['FeeType'])).'</td>
//                 <td>'.substr($row['InvDate'], 0,10).'</td>
//                 <td>'.number_format($inv_bal,2).'</td>
//                 <td>'.ucwords(strtolower($row['PayType'])).'</td>
//                 <td>'.$row['Stream'].'</td>';
//     $output.="<td><button type=\"button\" class=\"btn btn-info \" onclick=\"applyAmount('".$new_invdate ."','".$serial ."','".$inv_bal."','".$FeeType ."','".$pmode."','".$vchNo."','".$nw_stdbal."','".$inv_no."','".$new_diff."')\">Apply overpay</button></td></tr>";
        
//     }  
//     $output.='</tbody></table>';
//     echo $output;

// }else {

// }
?>
 <?php
$mysqli = new mysqli($servername, $appco_user, $appco_pass, $dbname);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "CALL sp_opd_patients_type_comparision();";

if ($result = $mysqli -> query($sql)) {

  // Get field information for all fields
  $fieldinfo = $result -> fetch_fields();

  foreach ($fieldinfo as $val) {
     echo '<pre>';
    printf("Name: %s\n", $val -> name);
    printf("Table: %s\n", $val -> table);
    printf("Max. Len: %d\n", $val -> max_length);
    echo '</pre>';
  }
  $result -> free_result();
}

$mysqli -> close();

?> 




<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 


?>          

</body>
</html>
