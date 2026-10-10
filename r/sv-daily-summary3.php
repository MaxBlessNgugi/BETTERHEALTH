<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('sv-daily-summary3', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
$pgheadtitle=$_GET['pg'];
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

	        // <td  style="width:10%;">PREV QTY</td>  
	        // <td  style="width:10%;">QTY ADDED</td>  	
	        // <td  style="width:10%;">Qty REMOVED</td> 
	        // <td  style="width:10%;">QTY Bal</td>
?>
	    	<td  style="width:3%;">#</td>
	    	<td  style="width:10%;">stdate</td>
	        <td  style="width:10%;">Item Name</td>
	        <td  style="width:10%;">PREV QTY</td>  
	        <td  style="width:10%;">QTY ADDED</td>  
	     <!--    <td  style="width:10%;">Category</td> 
	        <td  style="width:10%;">stcode</td>
	        <td  style="width:10%;">stdept</td>
	        <td  style="width:10%;">stitemcode</td> -->
	        <td  style="width:10%;">QTY REMOVED</td>
	        <td  style="width:10%;">QTY BAL</td>
	        <td  style="width:10%;">DESCRIPTION</td>
	        <td  style="width:10%;">USER</td>

<?php 
      echo '</tr>';

    	$dis='PURCHASES';
	if($d1==0){
	#$result =mysqli_query($db, "select * from stocktrack ");
	#$result =mysqli_query($db, "select * from stocktrack  where Dept='".$name."' ");
	$result =mysqli_query($db, "select * from stock_daily_summary where stdept='".$name."' AND stdetails LIKE '%".$dis."%'");
	}
	else{
	#$result =mysqli_query($db, "select * from stocktrack  where Stamp>='".$d1."' and Stamp<='".$d2."' ");
	#$result =mysqli_query($db, "select * from stocktrack  where Stamp>='".$d1."' and Stamp<='".$d2."'  and Dept='".$name."' ");
	$result =mysqli_query($db, "select * from stock_daily_summary where stdept='".$name."' AND stdetails LIKE '%".$dis."%'");
	}
	
	$xx=1;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$desc=stripslashes($row['stdetails']);
	// $itcode=stripslashes($row['ItemCode']);
	// $bal_aft_disp=stripslashes($row['Bal']);
	// $qtydispensed=stripslashes($row['Qty']);
	// $bal_b4_disp=$bal_aft_disp+$qtydispensed;


	/*join purchases, items and issuetable or stocktrack*/
	/*stop assuming that its qtypurchased, its not qty purchased, its the previous balance b4 a transaction (any transaction b it paying for sales, stock transfer, 
	stock issue, stock added in goods received inward, stock returned in goods returned outwards, stock usages etc)*/

	/*NOTE*/
	/*
	->paying for sales - deducts from the item category eg invoicing drugs whose category in pharmacy it will deduct from pharmacy
	->stock transfer   - after request is approved it deducts from administration and adds to the requesting department eg pharmacy requests from administration
				 - it will deduct from admin dept and add it to pharmacy.
				 - so the report to show admin bal before deduction (prev qty) and admin bal after deduction (qty bal) in one row
				 - and on a separate report to show another row where the stock from admin was added to, 
				 - a row of pharmacy bal before adding (prev qty) and pharmacy bal after adding (qty bal)
				 - yaani pharmacy bal before request approval (prev qty) and pharmacy bal after request approval (qty bal)

				 NB: THE TWO REPORTS SHUD BE SEPARATE: ADMINISTRATION AND PHARMACY SEPARATELY
				  -: AND OTHER DEPARTMENTS IF NEED BE

				 - GRIN        - ADDS STCK IN ADMINISTRATION
				 - STOCK ISSUE - DEDUCTS FROM ADMINISTARTION
				 - GROU        - DEDUCTS FROM ADMINISTARTION
				
				- if Qty=Bal in stock track then the prevbal=0 meaning nothing was added
	*/

						 // $resultz =mysql_query("select * from  items where ItemCode='".$itcode."' ");
						 // $num_resultzs = mysql_num_rows($resultz);
							// for ($i=0; $i <$num_resultzs; $i++) {
							// 	$rowz=mysql_fetch_array($resultz);
							// 	#$adminbal=stripslashes($rowz['ADMINISTRATION']);
							// 	$disp_current_bal=stripslashes($rowz['PHARMACY']);
							// }


    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

			    		echo '<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"> '.$xx.'</td>
					    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.dateprint(stripslashes($row['stdate'])).'</td>
					    <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['itname']).'</td>';
				            echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['adminmainbal']).'</td>';
				            //echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['pharmacymainbal']).'</td>';
					    // echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Category']).'</td>
					    // <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stcode']).'</td>';
					    // echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stdept']).'</td>';
					    // echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stitemcode']).'</td>';
				            echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stqty']).'</td>';
				            echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> 0</td>';			         
					    //echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stqty']).'</td>';
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stbal']).'</td>';
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['stdetails']).'</td>';
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['username']).'</td>';
				echo'</tr>';
				$xx++;
    } 


echo'
<tr style="width:100%; height:20px;color:#fff; background:#fff; padding:0">
        <td  style="width:3%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>';
        echo'<td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
    </tr>

</tbody>
</table>'; 
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
