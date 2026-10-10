<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('sv-drug-log2', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<title>Better Health Stock Daily Summary Reports</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>


<style>
@font-face { font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;} 
body,p{
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
</style>

<script type="text/javascript" src="../js/bh-grid.js"></script>
</head>

<body>
	<a class="bh-skip" href="#datatable">Skip to main content</a>

<?php 

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$pgheadtitle=$_GET['name'];
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

#$fname='stock_daily_summary_reports';

#$rcptno = $_GET['rcptno'];

unregistered_patients_eports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$pgheadtitle);
$result = mysqli_query($db, "insert into log values('0','".$username." generates stock daily summary report','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo $d1=preg_replace('~/~', '', $d1); 
echo $d2=preg_replace('~/~', '', $d2);


?>
<?php 
echo '<table id="datatable" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:12px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;"  tabindex="-1"><caption>Better Health Stock Daily Summary Reports</caption>';
echo '<thead>';
echo ' <tr style="width:100%; height:20px;color:#fff; background:#2c3e50; padding:0;text-transform:;">';
?>
	    <!-- 	<th scope="col"  style="width:3%;">#</th> -->
	    	<th scope="col"  style="width:10%;">DATE</th>
	        <th scope="col"  style="width:20%;">ITEM NAME</th>
	        <th scope="col"  style="width:10%;">PREV QTY</th>  
	        <th scope="col"  style="width:10%;">QTY ADDED</th>  
	        <th scope="col"  style="width:10%;">QTY REMOVED</th> 
	        <th scope="col"  style="width:10%;">QTY BAL</th>
	        <th scope="col"  style="width:20%;">PARTICULARS</th>
	        <th scope="col"  style="width:10%;">USERNAME</th>

<?php 
      echo '</tr></thead><tbody>';

	$purch_desc='PURCHASES';
	$transfer_to='STOCK TRANSFER TO';
	if($d1==0){
	$result =mysqli_query($db, "select * from stocktrack  where Dept='ADMINISTRATION' AND ItemCode='".$name."'  ORDER BY Date ");
	}
	else{
	$result =mysqli_query($db, "select * from stocktrack  where Stamp>='".$d1."' and Stamp<='".$d2."'  and Dept='".$name."' ");
	}


	$xx=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$itcode=stripslashes($row['ItemCode']);
	$desc=stripslashes($row['Description']);
	$bal_aft_disp=stripslashes($row['Bal']);
	$qtydispensed=stripslashes($row['Qty']);
	$bal_b4_disp=$bal_aft_disp+$qtydispensed;
	$prev_bal_after_purchase= stripslashes($row['Bal'])-stripslashes($row['Qty']);


	$bal_aft_transfer=stripslashes($row['Bal']);
	$qty_transfered=stripslashes($row['Qty']);
	$bal_b4_transfer=$bal_aft_transfer+$qty_transfered;
#if ($something is like %$somethingother%)
	#$somethingother='PURCHASES';

    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

			    		 #echo '<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"> '.$xxrwz.'</td>';
					   echo '<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.dateprint(stripslashes($row['Date'])).'</td>
					    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['ItemName']).'</td>';
				         
				         if ($bal_aft_transfer == $qty_transfered) { 
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 					    
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Qty']).'</td>';   
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 		           	          
				         } 
				          else if (like($desc, 'purchases')) {
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$prev_bal_after_purchase.'</td>';             			    
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';    
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';    				    
				         } 
				         else if ($bal_aft_transfer == $qty_transfered&&$desc == 'STOCK TRANSFER FROM ADMINISTRATION') {
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';             			    
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';    
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';    				    
				         } 
				         else if ($desc=='STOCK TRANSFER TO PHARMACY'||$desc=='STOCK TRANSFER TO NURSING') {
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_transfer.'</td>';                 
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 					    	
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';  
				         } 
				         else if ($desc == 'STOCK ADJUSTMENT') {
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';                
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';   
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';    				    
				         } 
				         else {
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_disp.'</td>';                
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';   
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';    				    
					    }
				          
				          
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Bal']).'</td>';
					    echo'<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Description']).'</td>';
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['UserName']).'</td>';
				echo'</tr>';
				$xx++;
    } 
// echo'
// <tr style="width:100%; height:20px;color:#fff; background:#ccc; padding:0">';
//   echo '<td  style="width:3%;"></td>';
//   echo '<td  style="width:10%;"></td>
//         <td  style="width:20%;"></td>
//         <td  style="width:10%;"></td>
//         <td  style="width:10%;"></td>
//         <td  style="width:10%;"></td>
//         <td  style="width:10%;"></td>
//         <td  style="width:20%;"></td>
//         <td  style="width:10%;"></td>
//     </tr>';



echo'
<tr style="width:100%; height:20px;color:#fff; background:#fff; padding:0">';
  #echo '<td  style="width:3%;"></td>';
  echo '<td  style="width:10%;"></td>
        <td  style="width:20%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:20%;"></td>
        <td  style="width:10%;"></td>
    </tr>';


echo'</tbody>';
echo'</table>'; 
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
