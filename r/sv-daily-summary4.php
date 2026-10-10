<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('sv-daily-summary4', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<html xmlns="http://www.w3.org/1999/xhtml">
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
echo '<table id="datatable"  style="width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;"  tabindex="-1">';
echo '<tbody>';
echo ' <tr style="width:100%; height:20px;color:#fff; background:#2c3e50; padding:0;text-transform:;">';

?>
	    	<td  style="width:3%;">#</td>
	    	<td  style="width:10%;">stdate</td>
	        <td  style="width:20%;">Item Name</td>
	        <td  style="width:10%;">PREV QTY</td>  
	        <td  style="width:10%;">QTY ADDED</td>  
	        <td  style="width:10%;">QTY REMOVED</td>
	        <td  style="width:10%;">QTY BAL</td>
	        <td  style="width:20%;">DESCRIPTION</td> 
	        <td  style="width:10%;">USER</td>

<?php 
      echo '</tr>';

    #$dis='PURCHASES';
	if($d1==0){
	$result =mysqli_query($db, "select * from stock_daily_summary where stdept='".$name."' AND Category='PHARMACEUTICALS' ORDER BY itname ASC");
	}
	else{
	$result =mysqli_query($db, "select * from stock_daily_summary where Stamp>='".$d1."' and Stamp<='".$d2."' AND stdept='".$name."' AND Category='PHARMACEUTICALS' ORDER BY itname ASC ");
	}
	
	$xx=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$desc=stripslashes($row['stdetails']);
	$itcode=stripslashes($row['itcode']);
	$category=stripslashes($row['Category']);
	$dept=stripslashes($row['stdept']);
	$desc=stripslashes($row['stdetails']);
	$bal_aft_purchase=stripslashes($row['stbal']);
	#$qtyadded is same as qty_purchased meaning its qty purchased and added to the admin
	$qty_purchased=stripslashes($row['stqty']);
	$prev_bal_b4_purchase=$bal_aft_purchase-$qty_purchased;


	$bal_aft_disp=stripslashes($row['stbal']);
	$qtydispensed=stripslashes($row['stqty']);
	$bal_b4_disp=$bal_aft_disp+$qtydispensed;

    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

			    		echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"> '.$xx.'</td>
					    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.dateprint(stripslashes($row['stdate'])).'</td>
					    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['itname']).'</td>';

				         if ($bal_aft_purchase != $qty_purchased&&$desc!='STOCK TRANSFER TO PHARMACY') { 
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$prev_bal_b4_purchase.'</td>';        #PREVQTY
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';					    		#QTYADDED
					       echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stqty']).'</td>';   #QTYREMOVED
				         } else if ($desc=='STOCK TRANSFER TO PHARMACY') {
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_disp.'</td>';                 #PREVQTY
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 					    		#QTYADDED
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['stqty']).'</td>';  #QTYREMOVED
				         } 
				         else {
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$prev_bal_b4_purchase.'</td>';       #PREVQTY
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['stqty']).'</td>'; #QTYADDED
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';    				    		#QTYREMOVED
					    }
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stbal']).'</td>';
					    echo'<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stdetails']).'</td>';
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['username']).'</td>';
				echo'</tr>';
				$xx++;
    } 


echo'
<tr style="width:100%; height:20px;color:#fff; background:#ccc; padding:0">
        <td  style="width:5%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:20%;"></td>';
  echo '<td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:20%;"></td>
        <td  style="width:10%;"></td>
    </tr>';

	$result =mysqli_query($db, "select * from stock_items_summary where Category='PHARMACEUTICALS' ORDER BY stdate DESC ");
	#$result =mysqli_query($db, "select * from items where Category='PHARMACEUTICALS' ORDER BY ItemName ASC ");
	$xxybc=1;
	$num_xxybc  = mysqli_num_rows($result);
	for ($i=0; $i <$num_xxybc; $i++) {
	$row=mysqli_fetch_array($result);
	$desc=stripslashes($row['stdetails']);
	$itcode=stripslashes($row['itcode']);
	$category=stripslashes($row['Category']);
	$dept=stripslashes($row['stdept']);
	$desc=stripslashes($row['stdetails']);
	$bal_aft_purchase=stripslashes($row['stbal']);
	#$qtyadded is same as qty_purchased meaning its qty purchased and added to the admin
	$qty_purchased=stripslashes($row['stqty']);
	$prev_bal_b4_purchase=$bal_aft_purchase-$qty_purchased;


	$bal_aft_disp=stripslashes($row['stbal']);
	$qtydispensed=stripslashes($row['stqty']);
	$bal_b4_disp=$bal_aft_disp+$qtydispensed;
	
    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

				echo '<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"> '.$xxybc.'</td>';
				echo '<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stamptodate($d2).'</td>';
				echo '<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['itname']).'</td>'; #
				#echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['stbal']).'</td>';        #PREVQTY

				         if ($bal_aft_purchase != $qty_purchased&&$desc!='STOCK TRANSFER TO PHARMACY') { 
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$prev_bal_b4_purchase.'</td>';        #PREVQTY
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';					    		#QTYADDED
					       echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stqty']).'</td>';   #QTYREMOVED
				         } else if ($desc=='STOCK TRANSFER TO PHARMACY') {
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_disp.'</td>';                 #PREVQTY
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 					    		#QTYADDED
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['stqty']).'</td>';  #QTYREMOVED
				         } 
				         else {
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$prev_bal_b4_purchase.'</td>';       #PREVQTY
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['stqty']).'</td>'; #QTYADDED
				           echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';    				    		#QTYREMOVED
					    }
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stbal']).'</td>';
					    echo'<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> </td>';
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['username']).'</td>';
			echo'</tr>';
				$xxybc++;
}


echo'</tbody>';
echo'</table>'; 
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
