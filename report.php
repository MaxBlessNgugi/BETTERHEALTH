<?php include(__DIR__ . '/includes/db_fns.php'); date_default_timezone_set('Africa/Nairobi');
bh_authz_note('report', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
include(__DIR__ . '/includes/functions.php'); 
include(__DIR__ . '/includes/compile.php');
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}

?>
<?php
$id=$_GET['id'];
if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno'];}
$result =mysqli_query($db, "select * from company");
$row=mysqli_fetch_array($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$comname2=strtoupper(stripslashes($row['CompanyName2']));
$tel=stripslashes($row['Tel']);
$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);
$Motto=stripslashes($row['Motto']);
$pagesize=16;
switch($id){
	case 726:
	$title='Better Health Receipts';
	break;
	case 606:
	$title='Better Health Receipts';
	break;
	case 1:
	$title='Better Health Receipts';
	break;
	case 2:
	$title='Better Health Quotations';
	break;
	case 3:
	$title='Better Health Credit Notes ';
	break;
	case 3.1:
	$title='Better Health Credit Notes | Return To Stock';
	break;
	case 4:
	$title='Better Health Out Patient Records ';
	break;
	case 4.1:
	$title='Better Health In Patient Records ';
	break;
	case 4.2:
	$title='Better Health | In Patient Medical Report Summary';
	break;
	case 5:
	$title='Better Health Patient Records ';
	break;
	case 6:
	$title='Better Health Goods Received Note ';
	break;
	
	case 7:
	$title='Better Health Stock Valuation Report ';
	break;
	
	case 8:
	$title='Better Health Stock Request Note';
	break;
	case 9:
	$title='Better Health Stock Transfer Report';
	break;
	
	case 10:
	$title='Better Health Debtors Statement ';
	break;
	
	case 11:
	$title='Better Health Creditors Statement ';
	break;
	
	case 12:
	$title='Better Health Profit and Loss Report ';
	break;
	
	case 13:
	$title='Better Health Income Report ';
	break;
	
	case 14:
	$title='Better Health Expenses Report ';
	break;
	
	case 15:
	$title='Better Health Bank Statement Report ';
	break;
	
	case 16:
	$title='Better Health Price List Report ';
	break;
	
	case 17:
	$title='Better Health Goods Received Report ';
	break;
	
	case 18:
	$title='Better Health Stock Expiry Report ';
	break;
	
	case 19:
	$title='Better Health Stock Transfer Report ';
	break;
	
	case 20:
	$title='Better Health Variance Report ';
	break;
	
	case 21:
	$title='Better Health Variance Summary Report ';
	break;
	case 22:
	$title='Better Health Receipts';
	break;
	case 23:
	$title='Better Health Receipts';
	break;
	case 24:
	$title='Better Health Receipts';
	break;
	
	case 25:
	$title='Better Health Trial Balance Report';
	break;
	
	case 26:
	$title='Better Health Income Statement';
	break;
	
	case 27:
	$title='Better Health Balance Sheet';
	break;
	
	case 28:
	$title='Better Health In-Patients List';
	break;
	
	case 29:
	$title='Better Health Employees List Report';
	break;
	
	
	case 30:
	$title='Better Health System Activity Log Report';
	break;
	
	case 31:
	$title='Better Health Patients List';
	break;
	case 31.1:
	$title='Better Health CCC Patients List';
	break;
	case 31.2:
	$title='Better Health CCC Medical Records';
	break;
	case 32:
	$title='Better Health Debtors List';
	break;
	
	case 33:
	$title='Better Health Creditors List';
	break;
	
	case 34:
	$title='Better Health Insurance Reports';
	break;
	
	case 35:
	$title='Better Health Deaths Reports';
	break;
	case 36:
	$title='Better Health Prescriptions';
	break;
	case 37:
	$title='Better Health Births Reports';
	break;
	case 38:
	$title='Better Health Lab Analysis Reports';
	break;
	case 39:
	$title='Better Health Radiology Analysis Reports';
	break;	
	case 39.1:
	$title='Better Health Theatre Analysis Reports';
	break;
	case 40:
	$title='Better Health Patient Bill';
	break;
	case 41:
	$title='Better Health Stock Balance Report';
	break;
	case 42:
	$title='Better Health Patient Bill';
	break;
	case 43:
	$title='Better Health Deposits Reports';
	break;
	case 44:
	$title='Better Health Deposit Receipts';
	break;
	case 45:
	$title='Better Health Prescription Labels';
	break;
	
	case 46:
	$title='Better Health Stock Usage Report';
	break;
	
	case 47:
	$title='Better Health Stock Balance Report';
	break;
	
	case 48:
	$title='Better Health Stock Valuation Report';
	break;
	case 49:
	$title='Better Health Stock Sheet Report';
	break;
	
	case 50:
	$title='Better Health Stock Variance Report';
	break;
	
	case 51:
	$title='Better Health Goods Returned Outward Note';
	break;
	
	case 52:
	$title='Better Health Local Purchase Order Note';
	break;
	
	case 53:
	$title='Better Health Goods Received Invoice Listing Report';
	break;
	
	case 54:
	$title='Better Health Re-Order Level Report';
	break;
	
	case 55:
	$title='Better Health Inventory Report';
	break;
	
	case 56:
	$title='Better Health Cashier Daily Summary Report';
	break;
	
	case 57:
	$title='Better Health System Users Report';
	break;
	
	case 58:
	$title='Better Health Discharge Summary';
	break;
	
	case 59:
	$title='Better Health Discharge Report';
	break;
	
	case 60:
	$title='Better Health Diagnosis Reports (OUTPATIENT)';
	break;

	case 60.1:
	$title='Better Health Diagnosis Reports (INPATIENT)';
	break;
	
	case 61:
	$title='Better Health Inventory Movement Report';
	break;
	
	case 62:
	$title='Better Health Receipts/Invoices';
	break;
	
	case 63:
	$title='Better Health Invoices Reports';
	break;
	
	case 64:
	$title='Better Health Procurement Bin Card';
	break;
	
	case 65:
	$title='Better Health Departmental Bin Card';
	break;
	case 66:
	$title='Better Health Admissions Form ';
	break;
	
	case 67:
	$title='Better Health Inpatient Final Bill';
	break;
	
	case 68:
	$title='Better Health Inpatient Final Bill';
	break;

	case 69:
	$title='Better Health Waiver Note';
	break;

	case 70:
	$title='Better Health Lab Requests ';
	break;
	case 71:
	$title='Better Health Patients List';
	break;
	case 72:
	$title='Cashier Daily SHIF Report';
	break;
	case 73:
	$title='Cashier Daily CASH Report';
	break;
	case 74:
	$title='Laboratory Income Summary Report';
	break;
	case 75:
	$title='Better Health General Out Patients Clinics (OPD) Summary Report';
	break;
	case 76:
	$title='Better Health Eighteen & Over (OPD) Summary Report';
	break;	
	case 77:
	$title='Better Health Eighteen & Over (OPD) Summary Report';
	break;
	
	case 78:
	$title='Better Health Out Patient Records ';
	break;
	case 79:
	$title='Better Health Stock Valuation Report';
	break;
	case 80:
	$title='Better Health Asset Count Sheet ';
	break;
	case 81:
	$title='Better Health Patients Receipts/Invoices';
	break;
	case 82:
	$title='Better Health Cashier Credit Sales Income';
	break;
	case 83:
	$title='Cashier Daily Summary Report';
	break;
	case 84:
	$title = 'Trial Balance /Balance b/fwd Report';
	break;
}

function loop111($row,$i,$kk){
	
		if($i==0&&$kk==0){
			?>
			<div style="width:auto; height:20px; border-bottom:1.5px solid #333; background:#d1d1d1 " >
		<div style="width:934px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Balance Brought Forward
</p>
</div>
<?php
 if(stripslashes($row['DrCr'])=='cr'){
	$x= stripslashes($row['Bal'])+stripslashes($row['Amount']);
 }else{
	 $x= stripslashes($row['Bal'])-stripslashes($row['Amount']);
 }
?>

	<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo $x ?>).formatMoney(2, '.', ','));</script></p>
</div></div>		
		<?php
        }
	
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['Date'])) ?>
</p>
</div>


<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo  stripslashes($row['InvoiceNo']) ?></div>
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo  stripslashes($row['Description']) ?></div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<?php if(stripslashes($row['DrCr'])=='dr'){?>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script>
</p>
<?php }

?>
</div>

<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<?php if(stripslashes($row['DrCr'])=='cr'){?>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script>
</p><?php }?>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo stripslashes($row['Bal']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>	
<?php
}
function loop1($row,$i){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Date']) ?>
</p>
</div>


<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo  stripslashes($row['InvoiceNo']) ?></div>
<div style="width:800px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo  stripslashes($row['Description']) ?></div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<?php if(stripslashes($row['DrCr'])=='dr'){?>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script>
</p>
<?php }

?>
</div>

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<?php if(stripslashes($row['DrCr'])=='cr'){?>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script>
</p><?php }?>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo stripslashes($row['Bal']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>	
<?php
}
function loop2($row){
	?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333">
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['TransDate']) ?>
</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['TransNo']) ?>
</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['TotalPrice']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo  stripslashes($row['AmountPaid']) ?>).formatMoney(2, '.', ','));</script>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo  stripslashes($row['Bal']) ?></p>
</div>
</div>	
<?php
}
function loop3($row,$i){
	
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:120px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['Date'])) ?></td>
       <td style="width:130px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['RcptNo']) ?></td>
      <td style="width:400px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ItemName']) ?> [<?php  echo stripslashes($row['ClientName']) ?> ]</td>
       <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></td>
               <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Qty']) ?></td>
        <td style="width:85px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Vat']) ?></td>
         <td style="width:95px;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['Discount']) ?>).formatMoney(2, '.', ','));</script></td>
         <td style="width:135px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['TotalPrice']) ?></td>
          <td style="width:90px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Posted']) ?></td>
           <td style="width:90px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Cashier']) ?></td>
    </tr>

<?php } 
function loop56($row,$i){
	
		
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['date'])) ?></td>
       <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patid']) ?></td>
      <td style="width:17%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patname']) ?></td>
       <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['paymode']) ?></td>
         <td style="width:14%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['cname']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
          <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo convtime(stripslashes($row['time'])) ?></td>
         <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['category']) ?></td>
           <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['username']) ?></td>
    </tr>

	
	
<?php } 
function loop606($row,$i){
	
		
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['date'])) ?></td>
       <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patid']) ?></td>
      <td style="width:17%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patname']) ?></td>
       <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['paymode']) ?></td>
         <td style="width:14%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['cname']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
          <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo convtime(stripslashes($row['time'])) ?></td>
         <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['category']) ?></td>
           <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['username']) ?></td>
    </tr>

	
	
<?php } 
function combinedloop606($row,$i){
	
		
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['date'])) ?></td>
      <td style="width:17%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patname']) ?></td>
   
<?php 
	if(stripslashes($row['paymode'])=='DMRP'){
	    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">Companies/Cash</td>';
	} 
	else if (stripslashes($row['paymode'])=='Companies'){
	    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['paymode']).'</td>';
	}
	else {
	     echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['paymode']).'</td>';
	}


?>		
         <td style="width:14%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['cname']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
          <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
           <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['username']) ?></td>
    </tr>

	
	
<?php } 
function looppaymode56($row,$i){
	
		
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['date'])) ?></td>
       <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patid']) ?></td>
      <td style="width:17%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['patname']) ?></td>
       <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['paymode']) ?></td>
         <td style="width:14%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['cname']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['rcptno']) ?></td>
          <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo convtime(stripslashes($row['time'])) ?></td>
         <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['category']) ?></td>
           <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['username']) ?></td>
    </tr>

	
	
<?php } 
function loop4($row){
?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333">
<div style="width:185px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['TransDate']) ?></p>
</div>
<div style="width:330px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ExpenseName']) ?></p>
</div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } 
function loop6($row,$i){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#D1D1D1 "  id="normal'.$i.'">';
	}
?>

<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['PurchDate']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PurchNo']) ?></p>
</div>

<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Supplier']) ?></p></div>

<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['UnitBox']) ?></p></div>

<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PartBox']) ?></p></div>

<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['PurchPrice']) ?>).formatMoney(2, '.', ','));</script></p></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['TotalPrice']) ?></p>
</div>
</div>
<?php }

function patrecord($row){
	$prescid=stripslashes($row['PrescId']);
?>

<p style="font-size:14px; color:#fff; background:#333;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center; margin-top:0px; padding-top:0"><strong>Date: </strong><?php  echo dateprint(stripslashes($row['TransDate'])) ?></p>
<div style="padding:5px 0">
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><strong>Temparature:</strong>&nbsp;<?php  echo stripslashes($row['Temp']) ?></strong> Celsius<br/><strong>Blood Pressure:</strong>&nbsp;<?php  echo stripslashes($row['Bp1']) ?>/<?php  echo stripslashes($row['Bp2']) ?> mmHg<br/><strong>Weight:</strong>&nbsp;<?php echo stripslashes($row['Weight']) ?> Kgs<br/>
<strong>Resp. Rate:</strong>&nbsp;<?php echo stripslashes($row['RespRate']) ?> Breaths/Min<br/><strong>Pulse Rate:</strong>&nbsp;<?php echo stripslashes($row['PulseRate']) ?> Beats/Min<br/><strong>Random Blood Sugar:</strong>&nbsp;<?php echo stripslashes($row['Rbs']) ?> mMoles/Ltr<br/></p>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Health Problems/Allergies: </strong><?php echo stripslashes($row['Allergies']) ?></p>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Other Details: </strong><?php echo stripslashes($row['OtherDetails']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>History:</strong><br/><?php echo stripslashes($row['History']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Physical Examination:</strong><br/><?php echo stripslashes($row['PhyExam']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Lab Investigations:</strong><br/>
<?php 

$resultb =mysqli_query($db, "select * from labrequests where prescid='".$prescid."' order by id");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
															else{$x='<b style="color:#125d30"> - [COMPLETED]</b>';}
				
				echo'
				<p style="margin-left:20px">
				Date: <b>'.stripslashes($rowb['date']).'</b>
				<br/><br/>
				<b>Lab Request</b>'.$x.'<br/><br/>
				'.stripslashes($rowb['request']).'
				<br/><br/>
				<b>Lab Results</b>
				<br/><br/>
				'.stripslashes($rowb['results']).'
			
				</p>
				';


}
 ?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Radiology Investigations:</strong><br/>
<?php 

$resultb =mysqli_query($db, "select * from radrequests where prescid='".$prescid."' order by id");
$num_resultsb = mysqli_num_rows($resultb);	
for ($i=0; $i <$num_resultsb; $i++) {
	$rowb=mysqli_fetch_array($resultb);
	if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
	else{$x='<b style="color:#125d30"> - [COMPLETED]</b>';}
				
				echo'
				<p style="margin-left:20px">
				Date: <b>'.stripslashes($rowb['date']).'</b>
				<br/><br/>
				<b>Radiology Request</b>'.$x.'<br/><br/>
				'.stripslashes($rowb['request']).'
				<br/><br/>
				<b>Radiology Results</b>
				<br/><br/>
				'.stripslashes($rowb['results']).'
			
				</p>
				';


}
 ?><div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Diagnosis:</strong><br/><?php echo stripslashes($row['Diagnosis']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Surgeries:</strong><br/><?php echo stripslashes($row['Treatment']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Prescription:</strong><br/><?php 
$parts=explode(';',stripslashes($row['Prescription']));
foreach ($parts as $key => $val) {
echo $parts[$key].'<br/>';
 }
  ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>
<?php
if(stripslashes($row['Admitted'])==1){
?>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><strong>Admission Details :</strong><br/>
<strong>Admit Date:</strong>&nbsp;<?php  echo stripslashes($row['AdmDate']) ?><br/>
<strong>Ward:</strong>&nbsp;<?php  echo stripslashes($row['WardType']) ?><br/>
<strong>Room No:</strong>&nbsp;<?php  echo stripslashes($row['RoomNo']) ?><br/>
<strong>Bed No:</strong>&nbsp;<?php  echo stripslashes($row['BedNo']) ?><br/>
<strong>Doctor:</strong>&nbsp;<?php  echo stripslashes($row['Doctor']) ?><br/>
<strong>Admission Notes:</strong>&nbsp;<?php  echo stripslashes($row['ProgressNotes']) ?><br/>
<strong>Discharge Date:</strong>&nbsp;<?php  echo stripslashes($row['Discharge']) ?><br/></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dotted #333"></div>
<div style="clear:both; margin-bottom:10px;"></div>
<?php	
}
?>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Doctor's Notes:</strong><br/><?php echo stripslashes($row['DoctorNotes']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Nurse's Notes:</strong><br/><?php echo stripslashes($row['NursesNotes']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Vitals Charts:</strong><br/>
<?php 	$result = mysqli_query($db, "SELECT * FROM  vitals where patid='".stripslashes($row['PatId'])."' order by id desc limit 0,7");
							$num_results = mysqli_num_rows($result);
							if($num_results>0){
					for ($i=0; $i <$num_results; $i++) {
					$row2=mysqli_fetch_array($result);
					$arr1[]='"'.stripslashes($row2['datetime']).'"';
					$arr2[]=stripslashes($row2['temp']);
					$arr3[]=stripslashes($row2['bp1']);
					$arr4[]=stripslashes($row2['bp2']);
					$arr5[]=stripslashes($row2['pulse']);
					$arr6[]=stripslashes($row2['breath']);
					$arr7[]=stripslashes($row2['weight']);
					$arr8[]=stripslashes($row2['random']);
					}
				$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);$arr4=array_reverse($arr4);$arr5=array_reverse($arr5);$arr6=array_reverse($arr6);$arr7=array_reverse($arr7);$arr8=array_reverse($arr8);
				$a=implode($arr1,",");$b=implode($arr2,",");$c=implode($arr3,",");$d=implode($arr4,",");$e=implode($arr5,",");$f=implode($arr6,",");$g=implode($arr7,",");$h=implode($arr8,",");
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Temparature Curve</p>";
	echo'<canvas id="line1" height="300" width="1200"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#0369A1",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$b.']
				}
			]
			
		}

	new Chart(document.getElementById("line1").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Blood Pressure Chart</p>";
	echo'<canvas id="bar" height="300" width="1200"></canvas>
	
<script>

		var barChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#46bfbd",
					strokeColor : "#ccc",
					data : ['.$c.']
				},
				
				{
					fillColor : "#DC2626",
					strokeColor : "#ccc",
					data : ['.$d.']
				}
			]
			
		}

	new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
	
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Pulse Rate Curve</p>";
	echo'
	<canvas id="line2" height="300" width="1200"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#fdb45c",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$e.']
				}
			]
			
		}

	new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Respiratory Rate Curve</p>";
	echo'
	<canvas id="line3" height="300" width="1200"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#666",
					strokeColor : "#333",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$f.']
				}
			]
			
		}

	new Chart(document.getElementById("line3").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Weight Curve</p>";
	echo'
	<canvas id="line4" height="300" width="1200"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#fff",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$g.']
				}
			]
			
		}

	new Chart(document.getElementById("line4").getContext("2d")).Line(lineChartData);
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Random Blood Sugars Curve</p>";
	echo'
	<canvas id="line5" height="300" width="1200"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#ff3",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$h.']
				}
			]
			
		}

	new Chart(document.getElementById("line5").getContext("2d")).Line(lineChartData);
	</script>';
}
?>								
								

<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
<div style="clear:both; margin-bottom:10px"></div>
<div class="cleaner_h5"></div>	
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Drug Record Sheet</strong><br/></p>	
<?php
	$pid=stripslashes($row['PrescId']);
echo'					
	<div class="cleaner_h5"></div>';$result = mysqli_query($db, "SELECT * FROM  drugrecord where pid='".stripslashes($row['PrescId'])."' and status=1 order by stamp asc");
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									
									echo'
									<div id="inside" style="min-height:110px; border-bottom:0; margin-left:100px">
									<div id="title"">
									<div id="figure1" style="width:80px">Date.</div>
									<div id="figure1" style="width:120px">Drugs</div>
									<div id="figure1" style="width:50px">Dose</div>
									<div id="figure1" style="width:50px">Route</div>
									<div id="figure1" style="width:100px">Notes</div>
									<div id="figure1" style="width:60px">Cost</div>
									<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
									<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">AM</strong></div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">1</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">12</div>
									</div>
									
							<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
									<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">PM</strong></div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;border-left:0 ;color:#fff; text-align:center">1</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:1px solid #000;color:#fff; text-align:center">12</div>			</div>			
									
									
									</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'" class="normal">';
	}else{
		echo'<div style="width:auto; height:20px;background:#fff;border-bottom:1.5px solid #333;"  id="normal'.$i.'" class="normal">';
	}
									
									echo'<div class="figure2x" style="width:85px;padding:3px 2px">'.stripslashes($row['date']).'</div>
										<div class="figure2x" style="width:125px;padding:3px 2px">'.stripslashes($row['drugs']).'</div>
										<div class="figure2x" style="width:55px;padding:3px 2px">'.stripslashes($row['dose']).'</div>
										<div class="figure2x" style="width:55px;padding:3px 2px">'.stripslashes($row['route']).'</div>
										<div class="figure2x" style="width:105px;padding:3px 2px">'.stripslashes($row['notes']).'</div>
										<div class="figure2x" style="width:75px;padding:3px 2px;">'.stripslashes($row['cost']).'</div>';
									
										
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
				
				
								echo"</div><div class=\"cleaner\"></div>";
										
										}
										
	echo'</div></div>
	<div class="cleaner_h5"></div>
	';
									}
	

?>





</p>

<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<title><?php echo $title ?></title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chart.js"></script>
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script src="js/functions.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<script src="js/excellentexport.js"></script>
<style>
#title{position:relative; float:left;width:auto; background:#333; border:0px solid #ccc;font-size:10px}
#figure1{position:relative; float:left;width:141.0px; margin-right:2px; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:13px; color:#fff;  background:#333; text-align:center}
.figure2x,#figure2x,.figure2x,#figure2{position:relative; float:left;width:141.7px; border-right:1px solid #333; border-bottom:1px solid #333; margin:0; padding:5px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:11px; color:#333;  background:none; text-align:center;min-height:16px}
.cleaner { clear: both; width: 100%; height: 0px; font-size: 0px;  }
.cleaner_h5 { clear: both; width:100%; height: 5px; }
.cleaner_h10 { clear: both; width:100%; height: 10px; }
.normal,#normal{position:relative; float:left;width:auto; background:#f0f0f0; border-left:1px solid #333; cursor:pointer}
.normal:hover,#normal:hover{background:#C0E4E7}
.put_field{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:11px; text-align:center}
</style>
<style>

@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal;letter-spacing: 1px; text-transform:uppercase
}

</style>

</head>

<body style="background:">
	<a class="bh-skip" href="#bh-main">Skip to main content</a> 

<?php 
switch($id){
case 1:
$rcptno=$_GET['rcptno'];
$pid=$_GET['pid'];

$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ClientId='".$pid."' and Cashier !='' and Date='".date('Y/m/d')."' ");
$row=mysqli_fetch_array($result);
$amount=stripslashes($row['AmountPaid']);
$change=stripslashes($row['Balance']);
$ClientId=stripslashes($row['ClientId']);
$cname=stripslashes($row['ClientName']);
$dept=stripslashes($row['Category']);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);
$date=stripslashes($row['Date']);
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;

$resulta =mysqli_query($db, "SELECT * FROM receipts WHERE rcptno='".$rcptno."' AND patid='".$ClientId."' AND (paymode!='Companies' or paymode!='DMRP') AND date='".date('Y/m/d')."' ");
$num_resultsa = mysqli_num_rows($resulta);
if($num_resultsa<1){
			exit;
		}
$rowa=mysqli_fetch_array($resulta);
$patname=stripslashes($rowa['patname']);

$patid=stripslashes($rowa['patid']);
$time=stripslashes($rowa['time']);
$date=dateprint(stripslashes($rowa['date']));
$amount=$comam=stripslashes($rowa['amount']);
$paymode=stripslashes($rowa['cname']);

?>


<div style="width:330px;min-height:370px; border:2px solid #333" id="bh-main" tabindex="-1">

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:16px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname2 ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:18px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?></br>TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>

<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Patient Name: <?php  echo $patname ?>&nbsp; &nbsp;&nbsp;&nbsp;Patient No: <?php  echo $patid ?>&nbsp; &nbsp;&nbsp;&nbsp; Date:<?php  echo $d ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo convtime($time); ?>&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: <?php  echo $rcptno ?>&nbsp; &nbsp;&nbsp;&nbsp;Dept: <?php  echo $dept ?></strong>
</p>
<div style="clear:both"></div>

<div style="clear:both"/>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<a style="text-align:center;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</a>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<a style="text-align:center;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 30px">Qty.</a>
</div>
<div>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ClientId='".$ClientId."' and Cashier !='' and Date='".date('Y/m/d')."' ");
$num_results = mysqli_num_rows($result);
$qty=0;$itot=0;$tam=0;$b=0;$c=0;$d=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
$tam+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
$b+=$itot;
?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-weight:normal;font-size:10px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:10px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>
<div>
</div>
</div>
<?php } ?>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div>
</div>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount Charged</p>
</div>
<div style="width:40px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount Paid</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php  if(stripslashes($row['Instatus'])=='Companies'){?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Company</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo stripslashes($row['TotalPrice'])?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php } ?>
<?php  if(stripslashes($row['Instatus'])=='Bank'){?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo stripslashes($row['TotalPrice'])?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php } ?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
	<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Mode of Payment </p>
	</div>
	<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
	<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase"><?php  echo $paymode ?></p>
	</div>
<div>
</div>
</div>

<div style="clear:both; margin-bottom:30px"></div>
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">Submitted By <?php  echo $posted ?>.</p>
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">Posted By <?php  echo $cashier ?>.</p>
<!-- <p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">System Developers: APPCO SYSTEMS LTD (betterhealth.co.ke)</p> -->
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">System Developers: betterhealth.co.ke</p>
<!-- <p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Tel: 0726606834</p> -->



</div>

<?php 
break;
case 606:
// $old_patient_id=$_GET['cid'];
// $rcptno=$_GET['rcptno'];
// $pid=$_GET['pid'];
            $pid = safe_decode($_GET['pid']);
            $rcptno = safe_decode($_GET['rcptno']);
            $old_patient_id = safe_decode($_GET['cid']);
            $in_trans_date = safe_decode($_GET['tdt']);


$result =mysqli_query($db, "select * from sales where ClientId='".$pid."' and Cashier!='' and RcptNo='".$rcptno."' and old_patient_id='".$old_patient_id."'");
$row=mysqli_fetch_array($result);
$amount=stripslashes($row['AmountPaid']);
$change=stripslashes($row['Balance']);
$ClientId=stripslashes($row['ClientId']);
$cname=stripslashes($row['ClientName']);
$dept=stripslashes($row['Category']);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);
$date=stripslashes($row['Date']);
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;


$resulta =mysqli_query($db, "select * from receipts where patid='".$pid."' and rcptno='".$rcptno."' and (paymode!='Companies' or paymode!='DMRP') and old_patient_id='".$old_patient_id."'");
$num_resultsa = mysqli_num_rows($resulta);
// if($num_resultsa<1){
// 			exit;
// 		}
$rowa=mysqli_fetch_array($resulta);
$patname=stripslashes($rowa['patname']);

$patid=stripslashes($rowa['patid']);
$time=stripslashes($rowa['time']);
$date=dateprint(stripslashes($rowa['date']));
$amount=$comam=stripslashes($rowa['amount']);
$paymode=stripslashes($rowa['cname']);

$query1 =mysqli_query($db, "select * from users where name='".$cashier."'");
$rw1=mysqli_fetch_array($query1);
$cashier=stripslashes($rw1['fullname']);

$query2 =mysqli_query($db, "select * from users where name='".$posted."'");
$rw2=mysqli_fetch_array($query2);
$posted=stripslashes($rw2['fullname']);

?>

<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 

body {
  background-image: url("images/reprinted1.png");
  background-repeat:  no-repeat;
  
}

</style>


<div style="width:330px;min-height:370px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:16px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:16px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?></br>TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Patient Name: <?php  echo $cname ?>&nbsp; &nbsp;&nbsp;&nbsp;Patient No: <?php  echo $ClientId ?>&nbsp; &nbsp;&nbsp;&nbsp; Date:<?php  echo $d ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo convtime($time); ?>&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: <?php  echo $rcptno ?>&nbsp; &nbsp;&nbsp;&nbsp;Dept: <?php  echo $dept ?></strong>
</p>
<div style="clear:both"></div>

<div style="clear:both"/>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<a style="text-align:center;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</a>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<a style="text-align:center;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 30px">Qty.</a>
</div>
<div>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ClientId='".$ClientId."'");
$num_results = mysqli_num_rows($result);
$qty=0;$itot=0;$tam=0;$b=0;$c=0;$d=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
$tam+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
$b+=$itot;
?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-weight:normal;font-size:10px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:10px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>

<div>

</div>
</div>
<?php } ?>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div>
</div>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount Charged</p>
</div>
<div style="width:40px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount Paid</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php  if(stripslashes($row['Instatus'])=='Companies'){?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Company</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo stripslashes($row['TotalPrice'])?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php } ?>
<?php  if(stripslashes($row['Instatus'])=='Bank'){?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo stripslashes($row['TotalPrice'])?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php } ?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
	<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Mode of Payment </p>
	</div>
	<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
	<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase"><?php  echo $paymode ?></p>
	</div>
<div>
</div>
</div>

<div style="clear:both; margin-bottom:30px"></div>
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">Submitted By <?php  echo $posted ?>.</p>
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">Posted By <?php  echo $cashier ?>.</p>
<!-- <p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">System Developers: APPCO SYSTEMS LTD (betterhealth.co.ke)</p> -->
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">System Developers: betterhealth.co.ke</p>
<!-- <p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Tel: 0726606834</p> -->


</div>

<?php 
break;
case 726606834:
$pagesize=50;
$result =mysqli_query($db, "select * from receipts where rcptno='".$rcptno."' and (paymode!='Companies' or paymode!='DMRP')");
$num_results = mysqli_num_rows($result);
if($num_results<1){
			exit;
		}
$row=mysqli_fetch_array($result);
$patname=stripslashes($row['patname']);
$comam=stripslashes($row['amount']);
$patid=stripslashes($row['patid']);
$time=stripslashes($row['time']);
$date=dateprint(stripslashes($row['date']));


function heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time){
?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>
<div style="width:370px;min-height:500px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Rlogo" src="images/rlogo.png" style="max-height:65px; margin:0px 10px 0 2px; position:absolute;"/>
<p style="text-align:center;font-size:26px; font-weight:normal; margin:0 15px 0 0px;float:right"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">OFFICIAL RECEIPT</p>
<div id="barcode" style="font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>

<p style="text-align:center;   font-weight:normal; margin:0px 5px 0 5px">Date:<?php  echo $date ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo convtime($time); ?>&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: <?php  echo $rcptno ?>&nbsp; &nbsp;&nbsp;&nbsp;Dept: <?php  echo $dept ?></strong>&nbsp; &nbsp;&nbsp;&nbsp;Patient Name: <?php  echo $patname ?>
&nbsp; &nbsp;&nbsp;&nbsp;Patient No: <?php  echo $patid ?></p>
<div style="clear:both; margin-bottom:10px"></div>



<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:160px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:18px; font-weight:bold;margin:0 0 0 0px">Item name</p>
</div>
<div style="width:40px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:18px; font-weight:bold;margin:0 0 0 0px">Qty</p>
</div>
<div style="width:70px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:18px; font-weight:bold;margin:0 0 0 0px">Price</p>
</div>
<div>
<p style="text-align:center;font-size:18px; font-weight:bold;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php

}

function loop112($row,$itot){
?>


<table id="datatable"  style="width:auto;text-align:center;font-size:18px; font-weight:normal;" >
<tbody>
<tr style="width:100%; height:20px; padding:0;text-align:center;">
   		<td  style="width:160px;text-align:center;"><?php  echo stripslashes($row['ItemName']) ?></td>
        <td  style="width:40px;text-align:center;"><?php  echo stripslashes($row['Qty']) ?></td>
        <td  style="width:70px;text-align:center;"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:100px;text-align:center;"><script>document.writeln(( <?php  echo $itot ?>).formatMoney(2, '.', ','));</script></td>
         </tr>
</tbody>
</table>
<div style="clear:both;border-bottom:1.5px solid #333;"></div>
<?php	
	
}

function footing($qty,$b,$d){
?>

<div style="width:auto; height:25px; border-bottom:2px solid #333;  border-top:1px solid #333">
<div style="width:160px; height:25px;border-right:0px solid #333; border-left:0px solid #333;float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 40px">Total</p>
</div>
<div style="width:40px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:70px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"><script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></a>
</div>
</div>
<?php 


}


function finalhead($tam,$cashier,$comam,$posted,$rcptno){
?>	
<div style="clear:both; margin-bottom:25px"></div>

<div style="width:auto; height:25px; border:2px solid #333;border-right:0px solid #333; border-left:0px solid #333;">
	<div style="width:160px; height:25px;border-right:0px solid #333; border-left:0px solid #333;float:left; overflow:hidden">
	<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 40px">Total Amount</p>
	</div>
	<div style="width:40px; height:25px;border-right:1.5px solid #333; float:left;">
	<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
	</div>
	<div style="width:70px; height:25px;border-right:1.5px solid #333; float:left;">
	<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
	</div>
	<div>
	<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
	</div>
</div>

<?php
$resulta =mysqli_query($db, "select * from receipts where rcptno='".$rcptno."' and (paymode!='Companies' or paymode!='DMRP')");
$num_resultsa = mysqli_num_rows($resulta);	
for ($i=0; $i <$num_resultsa; $i++) {
	$rowa=mysqli_fetch_array($resulta);
	if(stripslashes($rowa['paymode'])=='Cash'){
	?>

<div style="width:auto; height:25px; border:2px solid #333; border-top:0;border-right:0px solid #333; border-left:0px solid #333;">
<div style="width:160px; height:25px;border-right:0px solid #333; border-left:0px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 40px">Cash Paid</p>
</div>
<div style="width:40px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div style="width:70px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } 
if(stripslashes($rowa['paymode'])=='Bank'){
	?>

<div style="width:auto; height:25px; border:2px solid #333; border-top:0;border-right:0px solid #333; border-left:0px solid #333;">
<div style="width:160px; height:25px;border-right:0px solid #333; border-left:0px solid #333;float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 40px"><?php  echo stripslashes($rowa['cname']) ?>-REF NO:<?php  echo stripslashes($rowa['cardno']) ?></p>
</div>
<div style="width:40px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div style="width:70px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } if(stripslashes($rowa['paymode'])=='Credit'){
	?>

<div style="width:auto; height:25px; border:2px solid #333; border-top:0;border-right:0px solid #333; border-left:0px solid #333;">
<div style="width:160px; height:25px;float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 40px">Credit:</p>
</div>
<div style="width:40px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div style="width:70px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } if(stripslashes($rowa['paymode'])=='Waiver'){
	?>

<div style="width:auto; height:25px; border:2px solid #333; border-top:0;border-right:0px solid #333; border-left:0px solid #333;">
<div style="width:160px; height:25px;float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 40px">Amount Waivered</p>
</div>
<div style="width:40px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div style="width:70px; height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"></p>
</div>
<div>
<p style="padding-top:4px;text-align:center;   font-weight:normal; margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($rowa['amount']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>





<?php } ?>
<div style="clear:both; margin-bottom:30px"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">Submitted By
<?php  echo $posted ?>.</p>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">Posted By <?php  echo $cashier ?>.</p>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">System Developers: betterhealth.co.ke</p>
</div>
<?php
}
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$dept=stripslashes($row['Category']);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);

$part=explode('.',($num_results/$pagesize));
$part=$part[0];
$part+=1;
$dd=0;
$tam=0;
for ($kk=0; $kk <$part; $kk++) {
		
		$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."'  limit ".$dd.",".$pagesize."");
		$qty=0;$itot=0;$b=0;$c=0;$d=0;
		$num_results = mysqli_num_rows($result);
		if($num_results>0){
		heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time);
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		
		$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
		$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
		$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
		$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
		$b+=$itot;
		
		loop112($row,$itot);
		
		}
		$tam+=$b;
		 footing($qty,$b,$d);
		}
		
		$dd+=$pagesize;
		
}

$result =mysqli_query($db, "select * from users where name='".$cashier."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$cashier=stripslashes($row['fullname']);

$result =mysqli_query($db, "select * from users where name='".$posted."'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$posted=stripslashes($row['fullname']);

finalhead($tam,$cashier,$comam,$posted,$rcptno);

break;
case 2:
$result =mysqli_query($db, "select * from quotation where RcptNo='".$rcptno."'");
$row=mysqli_fetch_array($result);
$amount=stripslashes($row['AmountPaid']);
$balance=stripslashes($row['Balance']);
$date=stripslashes($row['Date']);


?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL QUOTATION<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Qty.</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit Price</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Vat.</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Discount</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total.</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from quotation where RcptNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$qty=0;$itot=0;$tam=0;$b=0;$c=0;$d=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
$s=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
$tam+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
$q=preg_replace('~,~', '', stripslashes($row['Discount']));
$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
$b+=$itot;
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Vat']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $q ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $s ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Totals</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 3:


$result =mysqli_query($db, "select * from creditnotes where Creditno='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=stripslashes($row['TransDate']);


?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:10px; text-transform: uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL CREDIT NOTE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:380px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Qty.</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit Price</p>
</div>

<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total.</p>
</div>

<?php
$result =mysqli_query($db, "select * from creditnotes where Creditno='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$qty=0;$s=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$qty+=preg_replace('~,~', '', stripslashes($row['QtyReturned']));
$s+=preg_replace('~,~', '', stripslashes($row['ReturnTotal']));
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>
<div style="width:380px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['QtyReturned']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ReturnTotal']) ?></p>
</div>
</div>
<?php } ?>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:380px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Totals</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>

<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $s ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>


<div style="clear:both; margin-bottom:20px"></div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 3.1:


$result =mysqli_query($db, "select * from returntostock where ReturNo='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=stripslashes($row['TransDate']);


?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:10px; text-transform: uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL CREDIT NOTE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:380px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Qty.</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit Price</p>
</div>

<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total.</p>
</div>

<?php
$result =mysqli_query($db, "select * from returntostock where ReturNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$qty=0;$s=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$qty+=preg_replace('~,~', '', stripslashes($row['QtyReturned']));
$s+=preg_replace('~,~', '', stripslashes($row['ReturnTotal']));
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>
<div style="width:380px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['QtyReturned']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ReturnTotal']) ?></p>
</div>
</div>
<?php } ?>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:380px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Totals</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>

<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $s ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>


<div style="clear:both; margin-bottom:20px"></div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 4:

$result =mysqli_query($db, "SELECT * FROM newprescription WHERE PrescId='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=date('d/m/Y');
$transdate=stripslashes($row['TransDate']);
$prescid=stripslashes($row['PrescId']);
$patid=stripslashes($row['PatId']);


$resultx =mysqli_query($db, "SELECT * FROM patients WHERE pntno='".$patid."'");
$rowx=mysqli_fetch_array($resultx);
?>
<div style="width:740px;min-height:260px; border:2px solid #333; overflow:auto;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;padding:5px">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:10px; text-transform: uppercase;  font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?><br/> TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL OUT PATIENT RECORD<br/><strong style="font-size:11px">Date:<?php  echo $date ?><br/>Record No: <?php  echo $rcptno ?></strong></p>
<div style="clear:both"></div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="color:#fff;font-size:14px; background:#333; text-align:center; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>Patient ID:</strong>&nbsp;<?php  echo stripslashes($row['PatId']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Patient name: </strong><?php  echo stripslashes($row['PatName']) ?>&nbsp; &nbsp;&nbsp;&nbsp;Age:<?php  echo stripslashes($rowx['age']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Record ID: </strong><?php  echo $rcptno ?></p><div style="clear:both; margin-bottom:1px"></div>
<img alt="Convert to Pdf" src="images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-33px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>

<p  style="font-size:14px; color:#fff; background:#333;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center; margin-top:0px; padding-top:0">Insurance:<?php  echo stripslashes($rowx['insurer']); ?>&nbsp; &nbsp;&nbsp;&nbsp;Card No:<?php  echo stripslashes($rowx['cardno']) ?>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Identity No:<?php  echo stripslashes($rowx['idno']) ?>&nbsp; &nbsp;&nbsp;&nbsp;<strong>Date: </strong><?php  echo stripslashes($row['TransDate']); ?></p>
<div style="padding:5px 0">
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Triage Analysis:</strong><br/></p>
<?php //include('outpathistory.php'); ?>


<div class="col-lg-6" style="background:#000">
            <div class="col-md-6" style="background:#fff;width:400px;float:right">
         
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><strong>Pulse Rate:</strong>&nbsp;<?php echo stripslashes($row['PulseRate']) ?> Beats/Min<br/><strong>Random Blood Sugar:</strong>&nbsp;<?php echo stripslashes($row['Rbs']) ?> mMoles/Ltr<br/></p>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Health Problems/Allergies: </strong><?php echo stripslashes($row['Allergies']) ?></p>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Other Details: </strong><?php echo stripslashes($row['OtherDetails']) ?></p>
            </div> 
     
</div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><strong>Temparature:</strong>&nbsp;<?php  echo stripslashes($row['Temp']) ?></strong> Celsius<br/><strong>Blood Pressure:</strong>&nbsp;<?php  echo stripslashes($row['Bp1']) ?>/<?php  echo stripslashes($row['Bp2']) ?> mmHg<br/><strong>Weight:</strong>&nbsp;<?php echo stripslashes($row['Weight']) ?> Kgs<br/>
<strong>Resp. Rate:</strong>&nbsp;<?php echo stripslashes($row['RespRate']) ?> Breaths/Min</p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>History:</strong><?php echo stripslashes($row['History']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Physical Examination:</strong><?php echo stripslashes($row['PhyExam']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Lab Investigations:</strong>
<?php 

$resultb =mysqli_query($db, "select * from labrequests where prescid='".$prescid."' order by id");
$num_resultsb = mysqli_num_rows($resultb);	
for ($i=0; $i <$num_resultsb; $i++) {
	$rowb=mysqli_fetch_array($resultb);
	if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
	else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
				
				echo'
				<p style="margin-left:20px">
				Date: <b>'.htmlspecialchars(stripslashes($rowb['date'])).'</b>
				<br/>
				<b>Lab Request</b>'.$x.'<br/>
				'.htmlspecialchars(stripslashes($rowb['request'])).'
				<br/>
				<b>Lab Results</b>
				<br/>
				'.htmlspecialchars(stripslashes($rowb['results'])).'
			
				</p><div style="clear:both; margin:10px 0; border-top:1px dashed #333"></div>
				';
}
 ?>


<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Radiology Investigations:</strong>
<?php 

$resultb =mysqli_query($db, "select * from radrequests where prescid='".$prescid."' order by id");
$num_resultsb = mysqli_num_rows($resultb);	
for ($i=0; $i <$num_resultsb; $i++) {
	$rowb=mysqli_fetch_array($resultb);
	if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
	else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
				
	echo'
	<p style="margin-left:20px">
	Date: <b>'.htmlspecialchars(stripslashes($rowb['date'])).'</b>
	<br/>
	<b>Radiology Request</b>'.$x.'<br/>
	'.htmlspecialchars(stripslashes($rowb['request'])).'
	<br/>
	<b>Radiology Results</b>
	<br/>
	'.htmlspecialchars(stripslashes($rowb['results'])).'

	</p><div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
	';
}
 ?>

 <div style="clear:both; margin:0 0 10px 0; border-top:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Diagnosis:</strong><?php echo htmlspecialchars(stripslashes($row['Diagnosis'])) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<!-- <p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Surgeries:</strong><br/><?php ///echo stripslashes($row['Treatment']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div> -->


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Prescription:</strong>

	<?php 

$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$prescid."' order by id");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															
				echo'
				<p style="margin-left:20px;margin-top:-10px">'.htmlspecialchars(stripslashes($rowb['prescription'])).'</p><div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
				';
			}
  ?></p>

<div style="clear:both; margin-bottom:10px"></div>


<div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 4.1:

$result =mysqli_query($db, "select * from inpatients where PrescId='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=date('d/m/Y');
$transdate=stripslashes($row['TransDate']);
$prescid=$pid=stripslashes($row['PrescId']);
						
$obstetrics =mysqli_query($db, "SELECT * FROM obstetrics WHERE prescno='".$prescid."' ");
$obs=mysqli_fetch_array($obstetrics);
$old_in_presc_id=stripslashes($obs['old_in_presc_id']);
$old_in_patient_id=stripslashes($obs['old_in_patient_id']);


?>
<div style="width:1000px;min-height:260px; border:2px solid #333; overflow:auto;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;padding:5px">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?><br/> TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INPATIENT RECORD<br/><strong style="font-size:11px">Date:<?php  echo $date ?><br/>Admission No: <?php  echo $rcptno ?></strong></p>
<div style="clear:both"></div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="color:#fff;font-size:14px; background:#333; text-align:center; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>Patient No:</strong>&nbsp;<?php  echo stripslashes($row['PatId']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Patient name: </strong><?php  echo stripslashes($row['PatName']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Admission No: </strong><?php  echo $rcptno ?></p>
<div style="clear:both; margin-bottom:1px"></div>

<p style="font-size:14px; color:#fff; background:#333;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center; margin-top:0px; padding-top:0"><strong>Admission Date: </strong><?php  echo dateprint(stripslashes($row['TransDate'])) ?></p>
<div style="padding:5px 0">


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Admission Notes:</strong><br/><?php echo stripslashes($row['AdmNotes']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Progress Notes:</strong><br/><?php 
				$resulta =mysqli_query($db, "select * from progress where pid='".$pid."'");
				$num_resultsa = mysqli_num_rows($resulta);	
				for ($i=0; $i <$num_resultsa; $i++) {
				$row=mysqli_fetch_array($resulta);
				echo ''.stripslashes($row['notes']).'<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>';
				}
?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Cadex:</strong><br/><?php 
				$resulta =mysqli_query($db, "select * from cadex where pid='".$pid."'");
				$num_resultsa = mysqli_num_rows($resulta);	
				for ($i=0; $i <$num_resultsa; $i++) {
					$row=mysqli_fetch_array($resulta);
					echo ''.stripslashes($row['notes']).'<div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>';
				}
?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Lab Investigations:</strong><br/>
<?php 

				$resultb =mysqli_query($db, "select * from labrequests where prescid='".$prescid."' order by id");
				$num_resultsb = mysqli_num_rows($resultb);	
				for ($i=0; $i <$num_resultsb; $i++) {
					$rowb=mysqli_fetch_array($resultb);
					if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
					else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
				
				echo'
				<p style="margin-left:20px">
				
				
				<b>Lab Request</b>'.$x.' &nbsp;&nbsp;Date: <b>'.stripslashes($rowb['date']).'</b> <br/>
				'.stripslashes($rowb['request']).'
				<br/>
				<b>Lab Results</b>
				<br/><br/>
				'.stripslashes($rowb['results']).'
			
				</p><div style="clear:both; margin:10px 0; border-top:1px dashed #333"></div>
				';


}
 ?>


<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Radiology Investigations:</strong><br/>
<?php 

				$resultb =mysqli_query($db, "select * from radrequests where prescid='".$prescid."' order by id");
				$num_resultsb = mysqli_num_rows($resultb);	
				for ($i=0; $i <$num_resultsb; $i++) {
					$rowb=mysqli_fetch_array($resultb);
					if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
					else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
				
				echo'
				<p style="margin-left:20px">
				<b>Radiology Request</b>'.$x.'&nbsp;&nbsp;Date: <b>'.stripslashes($rowb['date']).'</b><br/>
				'.stripslashes($rowb['request']).'
				<br/>
				<b>Radiology Results</b>
				<br/><br/>
				'.stripslashes($rowb['results']).'
			
				</p><div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
				';


}
 ?>
<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Theatre Notes:</strong><br/>
<?php 

				$resultb =mysqli_query($db, "select * from theatrequests where prescid='".$prescid."' order by id");
				$num_resultsb = mysqli_num_rows($resultb);	
				for ($i=0; $i <$num_resultsb; $i++) {
					$rowb=mysqli_fetch_array($resultb);
					if(stripslashes($rowb['status'])==0){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
					else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
				
				echo'
				<p style="margin-left:20px">
				<b>Theatre Procedure</b>'.$x.'&nbsp;&nbsp;Date: <b>'.stripslashes($rowb['date']).'</b><br/>
				'.stripslashes($rowb['procedures']).'
				<br/>
				<b>Theatre Notes</b>
				<br/><br/>
				'.stripslashes($rowb['notes']).'
			
				</p><div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
				';


}
 ?>
<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Prescription Summaries:</strong><br/><?php 

				$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$prescid."' order by id");
				$num_resultsb = mysqli_num_rows($resultb);	
				for ($i=0; $i <$num_resultsb; $i++) {
					$rowb=mysqli_fetch_array($resultb);
															
				echo'<p style="margin:0 20px 0 20px">'.stripslashes($rowb['prescription']).'</p>';
			}
  ?></p>

<div style="clear:both; margin-bottom:10px"></div>

<?php 
						
$obstetrics =mysqli_query($db, "SELECT * FROM obstetrics WHERE old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' ");
$obs=mysqli_fetch_array($obstetrics);
$old_in_presc_id=stripslashes($obs['old_in_presc_id']);
$old_in_patient_id=stripslashes($obs['old_in_patient_id']);
?>

<!-- <div style="clear:both; margin-bottom:0px; border-bottom:1px solid #333"></div> -->

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>MATERNITY SUMMARY:</strong><br/></p>

<div style="width:37.0%; border-right:1px solid #333; float:left">

<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<a class="labels" style="margin-left:0px;font-size:10px;font-weight:bold; text-align:center;text-decoration:underline">OBSTETRIC HISTORY</a>
<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Gravida:</strong> <?php echo stripslashes($obs['gravida']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Para:</strong> <?php echo stripslashes($obs['para']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Alive:</strong>  <?php echo stripslashes($obs['alive']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Dead:</strong> <?php echo stripslashes($obs['dead']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Abortion:</strong> <?php echo stripslashes($obs['abortion']);   ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Gestation:</strong> <?php  echo stripslashes($obs['gestation']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Still-Birth:</strong> <?php  echo stripslashes($obs['stillbirth']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Caesarean:</strong> <?php  echo stripslashes($obs['caesarean']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Vacuum:</strong> <?php  echo stripslashes($obs['vacuum']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>LMP:</strong> <?php  echo stripslashes($obs['lmp']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>EDD:</strong> <?php  echo stripslashes($obs['edd']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>APH:</strong> <?php  echo stripslashes($obs['aph']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>PPH:</strong> <?php  echo stripslashes($obs['pph']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Prol Labour:</strong> <?php  echo stripslashes($obs['prollabour']); ?></p>



</div>





<div style="width:27.0%;  border-right:1px solid #333; float:left">

<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<a class="labels" style="margin-left:0px;font-size:10px;font-weight:bold; text-align:center;text-decoration:underline">OBSTETRIC EXAMINATION</a>
<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>

<a class="labels" style="margin-left:0px;font-size:10px;font-weight:bold; text-align:center;text-decoration:underline">ABDOMINAL</a>
<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Fundal Height:</strong> <?php echo stripslashes($obs['fundalheight']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Engagement:</strong> <?php echo stripslashes($obs['engagement']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Fatal Heart:</strong>  <?php echo stripslashes($obs['fatalheart']); ?></p>

<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<a class="labels" style="margin-left:0px;font-size:10px;font-weight:bold; text-align:center;text-decoration:underline">VAGINAL</a>
<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Reason for Doing:</strong> <?php echo stripslashes($obs['reasonfordoing']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Cervical Condition:</strong> <?php echo stripslashes($obs['cervicalcondition']);   ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Dilatation:</strong> <?php  echo stripslashes($obs['dilatation']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Membranes:</strong> <?php  echo stripslashes($obs['membranes']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Draining:</strong> <?php  echo stripslashes($obs['draining']); ?></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Performed BY: <?php echo stripslashes($obs['performedby']); ?>  </br> Date:<?php echo stripslashes($obs['transdate']); ?>-<?php echo stripslashes($obs['perform_time']); ?></p>

</div>





<div style="width:30.0%; border-right:2px solid #fff;float:left">
<div style="clear:both; margin-bottom:20px; border-bottom:1px solid #333"></div>
<a aria-label="labels" class="labels" style="margin-left:0px;font-size:10px;font-weight:bold; text-align:center;text-decoration:underline"></a>
<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<a class="labels" style="margin-left:0px;font-size:10px;font-weight:bold; text-align:center;text-decoration:underline">WKS</a>
<div style="clear:both; margin-bottom:10px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Presentation:</strong> <?php  echo stripslashes($obs['presentation']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Position:</strong> <?php  echo stripslashes($obs['wkposition']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Contractions:</strong> <?php  echo stripslashes($obs['contractions']); ?></p>

<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<a class="labels" style="margin-left:0px;font-size:10px;font-weight:bold; text-align:center;text-decoration:underline">/MIN</a>
<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Presenting Part:</strong> <?php  echo stripslashes($obs['presenting']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Level:</strong> <?php  echo stripslashes($obs['minlevel']); ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Position:</strong> <?php  echo stripslashes($obs['minposition']); ?></p>

<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Pelvis:</strong> <?php echo stripslashes($obs['pelvis']); ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><strong>Other Remarks:</strong> <?php echo stripslashes($obs['other_remarks']); ?></p>


<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Confirmed BY: <?php echo stripslashes($obs['confirmedby']); ?>  </br> Date: <?php echo stripslashes($obs['confirm_date']); ?>-<?php echo stripslashes($obs['confirm_time']); ?></p>




</div>

<?php 

#echo '<div style="padding:5px 0">';

// echo '
// <div class="col-lg-6" style="background:#ccc">
//     <div class="col-md-6" style="background:#fff;width:400px;float:right">
 
// <p style="font-size:11px;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 20px 0 20px"><strong>Pulse Rate:</strong>&nbsp;'.stripslashes($row['PulseRate']).' Beats/Min<br/><strong>Random Blood Sugar:</strong>&nbsp;'.stripslashes($row['Rbs']).' mMoles/Ltr<br/><strong>Health Problems/Allergies: </strong>'.stripslashes($row['Allergies']).'<br/><strong>Other Details: </strong>'.strip_tags(stripslashes($row['OtherDetails']), '<br/>').'</p>
//     </div>      
// </div>';

#echo '</div>';

// echo '
// <p style="font-size:11px;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 20px"><strong>Temparature:</strong>&nbsp;'.stripslashes($row['Temp']).'</strong> Celsius<br/><strong>Blood Pressure:</strong>&nbsp;'.stripslashes($row['Bp1']).'/'.stripslashes($row['Bp2']).'mmHg<br/><strong>Weight:</strong>&nbsp;'.stripslashes($row['Weight']).' Kgs<br/>
// <strong>Resp. Rate:</strong>&nbsp;'.stripslashes($row['RespRate']).' Breaths/Min</p>
// <div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
// <div style="clear:both; margin-bottom:10px"></div>';

?>

<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>VITALS ENTRIES:</strong><br/></p>
<?php

$result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."'");
									$num_results = mysqli_num_rows($result);
									echo'
									
									<div id="inside" style="min-height:110px;">
									<div id="title">
									<div id="figure1" style="width:120px">Date-Time</div>
									<div id="figure1" style="width:80px">Temp</div>
									<div id="figure1" style="width:80px">Bp</div>
									<div id="figure1" style="width:80px">Weight</div>
									<div id="figure1" style="width:80px">Pulse</div>
									<div id="figure1" style="width:80px">Breath</div>
									<div id="figure1" style="width:80px">RBS</div>
									</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										echo"
										<div id=\"normal13".$code."\" class=\"normal\">";
										echo'<div class="figure2x" style="width:125px;padding:3px 2px"><label for="date'.$code.'" class="bh-visually-hidden">RBS</label><input disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['datetime']).'" id="date'.$code.'" style="background:#fff;width:120px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="temp'.$code.'" class="bh-visually-hidden">Text field</label><input disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['temp']).'" id="temp'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="bp1'.$code.'" class="bh-visually-hidden">Text field</label><input  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['bp1']).'/'.stripslashes($row['bp2']).'" id="bp1'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="weight'.$code.'" class="bh-visually-hidden">Text field</label><input disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['weight']).'" id="weight'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="pulse'.$code.'" class="bh-visually-hidden">Text field</label><input  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['pulse']).'" id="pulse'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="breath'.$code.'" class="bh-visually-hidden">Text field</label><input  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['breath']).'" id="breath'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:98px;padding:3px 2px;"><label for="random'.$code.'" class="bh-visually-hidden">Text field</label><input disabled="disabled"  disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['random']).'" id="random'.$code.'" style="background:#fff;width:90px; font-size:10px"/></div>';
										echo"</div><div class=\"cleaner\"></div>";
										}	
										
?>
<div style="clear:both; margin-bottom:10px"></div>


<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>VITALS CHARTS:</strong><br/></p>
<?php 	$result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."' order by id desc limit 0,7");
							$num_results = mysqli_num_rows($result);
							if($num_results>0){
					for ($i=0; $i <$num_results; $i++) {
					$row2=mysqli_fetch_array($result);
					$arr1[]='"'.stripslashes($row2['datetime']).'"';
					$arr2[]=stripslashes($row2['temp']);
					$arr3[]=stripslashes($row2['bp1']);
					$arr4[]=stripslashes($row2['bp2']);
					$arr5[]=stripslashes($row2['pulse']);
					$arr6[]=stripslashes($row2['breath']);
					$arr7[]=stripslashes($row2['weight']);
					$arr8[]=stripslashes($row2['random']);
					}
				$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);$arr4=array_reverse($arr4);$arr5=array_reverse($arr5);$arr6=array_reverse($arr6);$arr7=array_reverse($arr7);$arr8=array_reverse($arr8);
				$a=HA_implode($arr1,",");$b=HA_implode($arr2,",");$c=HA_implode($arr3,",");$d=HA_implode($arr4,",");$e=HA_implode($arr5,",");$f=HA_implode($arr6,",");$g=HA_implode($arr7,",");$h=HA_implode($arr8,",");
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Temparature Curve</p>";
	echo'<canvas id="line1" height="300" width="900"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#0369A1",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$b.']
				}
			]
			
		}

	new Chart(document.getElementById("line1").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Blood Pressure Chart</p>";
	echo'<canvas id="bar" height="300" width="900"></canvas>
	
<script>

		var barChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#46bfbd",
					strokeColor : "#ccc",
					data : ['.$c.']
				},
				
				{
					fillColor : "#DC2626",
					strokeColor : "#ccc",
					data : ['.$d.']
				}
			]
			
		}

	new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
	
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Pulse Rate Curve</p>";
	echo'
	<canvas id="line2" height="300" width="900"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#fdb45c",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$e.']
				}
			]
			
		}

	new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Respiratory Rate Curve</p>";
	echo'
	<canvas id="line3" height="300" width="900"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#666",
					strokeColor : "#333",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$f.']
				}
			]
			
		}

	new Chart(document.getElementById("line3").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Weight Curve</p>";
	echo'
	<canvas id="line4" height="300" width="900"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#fff",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$g.']
				}
			]
			
		}

	new Chart(document.getElementById("line4").getContext("2d")).Line(lineChartData);
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Random Blood Sugars Curve</p>";
	echo'
	<canvas id="line5" height="300" width="900"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#ff3",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$h.']
				}
			]
			
		}

	new Chart(document.getElementById("line5").getContext("2d")).Line(lineChartData);
	</script>';
}
?>	
<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>PRESCRIPTION ADMINISTRATION CHART:</strong><br/></p>
<?PHP

$result = mysqli_query($db, "SELECT * FROM  drugrecord where pid='".$pid."' and status=1 order by stamp asc");
									$num_results = mysqli_num_rows($result);
								
									if($num_results>0){
									
									echo'
									<div class="cleaner_h5"></div>
									<div id="inside" style="min-height:110px; border-bottom:0; margin-left:0px">
									<div id="title"">
									<div id="figure1" style="width:80px">Date.</div>
									<div id="figure1" style="width:120px">Drugs</div>
									<div id="figure1" style="width:50px">Dose</div>
									<div id="figure1" style="width:50px">Route</div>
									<div id="figure1" style="width:100px">Notes</div>
									<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
									<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">AM</strong></div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">1</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">12</div>
									</div>
									
							<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
									<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">PM</strong></div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;border-left:0 ;color:#fff; text-align:center">1</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
									<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:1px solid #000;color:#fff; text-align:center">12</div>			</div>			
									
									
									</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:0px solid #333;" id="normal'.$i.'" class="normal">';
	}else{
		echo'<div style="width:auto; height:20px;background:#fff;border-bottom:0px solid #333;"  id="normal'.$i.'" class="normal">';
	}
									
									echo'<div class="figure2x" style="width:85px;padding:2px 2px;font-size:10px">'.stripslashes($row['date']).'</div>
										<div class="figure2x" style="width:125px;padding:2px 2px;font-size:10px">'.stripslashes($row['drugs']).'</div>
										<div class="figure2x" style="width:55px;padding:2px 2px;font-size:10px">'.stripslashes($row['dose']).'</div>
										<div class="figure2x" style="width:55px;padding:2px 2px;font-size:10px">'.stripslashes($row['route']).'</div>
										<div class="figure2x" style="width:115px;padding:2px 2px;font-size:10px">'.stripslashes($row['notes']).'</div>';
									
										
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
				
				
								echo"</div><div class=\"cleaner\"></div>";
										
										}
									}

?>
<div style="clear:both; margin-bottom:10px"></div>



<div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 4.2:
$old_customer_id = safe_decode(htmlsan($_GET['url_uno']));
$old_customer_no = safe_decode(htmlsan($_GET['url_dos']));
$old_presc_id = safe_decode(htmlsan($_GET['url_tres']));
$old_presc_no = safe_decode(htmlsan($_GET['url_cuatro']));
						
$refertoMedico=mysqli_query($db, "SELECT * FROM `tblrefertomedico` WHERE `ClientId`='".$old_customer_id."' AND `ClientNo`='".$old_customer_no."' AND `PrescId`='".$old_presc_id."' AND `PrescNo`='".$old_presc_no."' ");
$rwMedico=mysqli_fetch_array($refertoMedico);
#$old_in_presc_id=stripslashes($rwMedico['PrescId']);
$old_in_patient_id=stripslashes($rwMedico['ClientId']);
$patient_age=stripslashes($rwMedico['ClientAge']);
$patient_gender=stripslashes($rwMedico['Gender']);
$report_date=stripslashes($rwMedico['ReportDate']);
$physician=stripslashes($rwMedico['AttendinPhysician']);
$facility=stripslashes($rwMedico['Facility']);


$result =mysqli_query($db, "SELECT * FROM inpatients WHERE Id='".$old_presc_id."' AND PrescId='".$old_presc_no."'");
$row=mysqli_fetch_array($result);
$date=date('d/m/Y');
$transdate=stripslashes($row['TransDate']);
$prescid=$pid=stripslashes($row['PrescId']);
						
// $obstetrics =mysqli_query($db, "SELECT * FROM obstetrics WHERE prescno='".$old_presc_no."' ");
// $obs=mysqli_fetch_array($obstetrics);
// $old_in_presc_id=stripslashes($obs['old_in_presc_id']);
// $old_in_patient_id=stripslashes($obs['old_in_patient_id']);


?>
<div style="width:1000px;min-height:260px; border:2px solid #333; overflow:auto;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;padding:5px">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?><br/> TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INPATIENT MEDICAL REPORT SUMMARY<br/><strong style="font-size:11px">Date:<?php  echo $date ?><br/>Admission No: <?php  echo $old_presc_no ?></strong></p>
<div style="clear:both"></div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="color:#fff;font-size:14px; background:#333; text-align:center; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>Patient No:</strong>&nbsp;<?php  echo stripslashes($row['PatId']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Patient name: </strong><?php  echo stripslashes($row['PatName']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Age: </strong><?php  echo $patient_age; ?></p>
<div style="clear:both; margin-bottom:1px"></div>
<img alt="Convert to Pdf" src="images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-33px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>

<p style="font-size:14px; color:#fff; background:#333;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center; margin-top:0px; padding-top:0">Sex: </strong><?php  echo $patient_gender; ?>&nbsp; &nbsp; &nbsp;<strong>Date of Report: </strong><?php  echo $report_date; ?>&nbsp; &nbsp; &nbsp;<strong>Attending Physician: </strong><?php  echo $physician; ?>&nbsp; &nbsp; &nbsp;<strong>Facility: </strong><?php  echo safe_decode('TEFJU0FNSVMgQ0FUSE9MSUMgTUlTU0lPTiBIT1NQSVRBTA--'); ?></p>
<div style="padding:5px 0">


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Clinical Summary:</strong><br/><?php echo stripslashes($rwMedico['ClinicalSummary']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Clinical Findings:</strong><br/><?php echo stripslashes($rwMedico['ClinicalFindings']); ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Investigations:</strong><br/>
<?php  echo stripslashes($rwMedico['Investigations']);?>


<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>

<div style="clear:both; margin-bottom:10px"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Diagnosis:</strong><br/><?php echo stripslashes($rwMedico['Diagnosi']);?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Treatment:</strong><br/><?php 

				$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$prescid."' order by id");
				$num_resultsb = mysqli_num_rows($resultb);	
				for ($i=0; $i <$num_resultsb; $i++) {
					$rowb=mysqli_fetch_array($resultb);
															
				echo'<p style="margin:0 20px 0 20px">'.stripslashes($rowb['prescription']).'</p>';
			}
  ?></p>

<div style="clear:both; margin-bottom:10px"></div>


<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px;text-transform: uppercase;"><strong>Urgent Admission Request Justification:</strong><br/> 
<?php  echo stripslashes($rwMedico['UrgentAdmissionRequest']);?>

<div style="clear:both; margin-bottom:10px"></div>

<!-- <div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div> -->






</div>

<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Recommendation:</strong><br/></p>
<div style="clear:both; margin-bottom:10px"></div>


<!-- <div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>VITALS ENTRIES:</strong><br/></p>  -->
<?php

// $result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."'");
// 									$num_results = mysqli_num_rows($result);
// 									echo'
									
// 									<div id="inside" style="min-height:110px;">
// 									<div id="title">
// 									<div id="figure1" style="width:120px">Date-Time</div>
// 									<div id="figure1" style="width:80px">Temp</div>
// 									<div id="figure1" style="width:80px">Bp</div>
// 									<div id="figure1" style="width:80px">Weight</div>
// 									<div id="figure1" style="width:80px">Pulse</div>
// 									<div id="figure1" style="width:80px">Breath</div>
// 									<div id="figure1" style="width:80px">RBS</div>
// 									</div>';
									
										
										
// 									for ($i=0; $i <$num_results; $i++) {
// 										$row=mysqli_fetch_array($result);
// 										$code=stripslashes($row['id']);
// 										echo"
// 										<div id=\"normal13".$code."\" class=\"normal\">";
// 										echo'<div class="figure2x" style="width:125px;padding:3px 2px"><input disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['datetime']).'" id="date'.$code.'" style="background:#fff;width:120px; font-size:10px"/></div>
// 										<div class="figure2x" style="width:85px;padding:3px 2px;"><input disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['temp']).'" id="temp'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
// 										<div class="figure2x" style="width:85px;padding:3px 2px"><input  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['bp1']).'/'.stripslashes($row['bp2']).'" id="bp1'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
// 										<div class="figure2x" style="width:85px;padding:3px 2px;"><input disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['weight']).'" id="weight'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
// 										<div class="figure2x" style="width:85px;padding:3px 2px"><input  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['pulse']).'" id="pulse'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
// 										<div class="figure2x" style="width:85px;padding:3px 2px;"><input  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['breath']).'" id="breath'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
// 										<div class="figure2x" style="width:98px;padding:3px 2px;"><input disabled="disabled"  disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['random']).'" id="random'.$code.'" style="background:#fff;width:90px; font-size:10px"/></div>';
// 										echo"</div><div class=\"cleaner\"></div>";
// 										}	
										
?>
<div style="clear:both; margin-bottom:10px"></div>



<!-- <div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>PRESCRIPTION ADMINISTRATION CHART:</strong><br/></p>

<div style="clear:both; margin-bottom:10px"></div> -->



<div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 5:

$result =mysqli_query($db, "select * from newprescription where PatId='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=date('d/m/Y');
$transdate=stripslashes($row['TransDate']);


?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?><br/> TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL PATIENT RECORD<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="color:#fff;font-size:14px; background:#333; text-align:center; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>Patient ID:</strong>&nbsp;<?php  echo stripslashes($row['PatId']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Patient name: </strong><?php  echo stripslashes($row['PatName']) ?></p>
<div style="clear:both; margin-bottom:1px"></div>

<?php 
$result =mysqli_query($db, "select * from newprescription where PatId='".$rcptno."'");
$count = mysqli_num_rows($result);
for ($i = 0; $i < $count; $i++){
$row=mysqli_fetch_array($result);
patrecord($row);
}?>


<div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php
break;

case 6:

$result =mysqli_query($db, "select * from purchases where PurchNo='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=stripslashes($row['PurchDate']);
$supname=stripslashes($row['Supplier']);
$invno=stripslashes($row['InvoiceNo']);
$user=stripslashes($row['Username']);


?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL GOODS RECEIVED NOTE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>SUPPLIER:<?php  echo $supname ?><br/>INVOICE No:<?php  echo $invno ?><br/>GRN No:<?php  echo $rcptno ?><br/>PREPARED BY:<?php  echo $user ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item Name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pack</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Batch No.</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Expiry Date.</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Unit.</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Part.</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pur. Price</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Sale Price</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total.</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from purchases where PurchNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$s=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);

$resulta =mysqli_query($db, "select * from items where ItemCode='".stripslashes($row['ItemCode'])."'");
$rowa=mysqli_fetch_array($resulta);

$s+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));

if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"" title="'.stripslashes($row['SalePrice']).'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($rowa['Pack']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['BatchNo']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Expiry']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['UnitBox']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PartBox']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['PurchPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['SalePrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['TotalPrice']) ?></p>
</div>
</div>
<?php } ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Invoice Amount: <script>document.writeln(( <?php  echo $s ?>).formatMoney(2, '.', ','));</script></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php
break;
case 7:

$date=date('Y/m/d');
?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VALUATION REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<div style="clear:both; margin-bottom:10px"></div>

<div style="width:auto; height:40px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:200px; height:40px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:60px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Purchase Price</p>
</div>
<div style="width:50px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Sell Price</p>
</div>
<div style="width:55px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Opening Balance</p>
</div>
<div style="width:65px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Quantity Purchased</p>
</div>
<div style="width:60px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Quantity Sold</p>
</div>
<div style="width:60px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Quantity Issued</p>
</div>
<div style="width:50px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Stock Balance</p>
</div>
<div style="width:60px; height:40px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Sale Value</p>
</div>

<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Purchase Value</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from items  where Type='GOOD'  order by ItemName");
$num_results = mysqli_num_rows($result);
$a=0;$b=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$p=stripslashes($row['PurchPrice'])*stripslashes($row['Bal']);
$s=stripslashes($row['SalePrice'])*stripslashes($row['Bal']);
$a+=$p;
$b+=$s;

if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['PurchPrice']) ?>).formatMoney(2, '.', ','));</script></div>
<div style="width:50px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['SalePrice']) ?>).formatMoney(2, '.', ','));</script></div>
<div style="width:55px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Qopening']) ?></p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Qpurch']) ?></p>
</div>
<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left;overflow:hidden">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Qsold']) ?></p>
</div>
<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left;overflow:hidden">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Qissued']) ?></p>
</div>
<div style="width:50px; height:20px;border-right:1.5px solid #333; float:left; overflow:hiddent;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Bal']) ?></p>
</div>

<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left;overflow:hidden">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $s ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $p ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Sale Value: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Purchase Value: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<?php $c=$b-$a;?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Net Value: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 

break;

case 8:
$result =mysqli_query($db, "select * from issuetable where IssueNo='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=stripslashes($row['TransDate']);
$dep1=stripslashes($row['Dep1']);
$dep2=stripslashes($row['Dep2']);
$issno=stripslashes($row['IssueNo']);
if($dep1=='PROCUREMENT'){$x='Bal';}else{$x=$dep1;}


?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:26px; font-weight:normal;margin:0 0 0 0px"><?php  echo $comname2 ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK REQUEST NOTE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>FROM:  <?php  echo $dep1 ?> TO:  <?php  echo $dep2 ?><br/>REQUESTED BY: <?php  echo stripslashes($row['Requested']) ?><br/>REQUEST No: <?php  echo $rcptno ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item Name</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Requested Units</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Requested Parts</p>
</div>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Current Bal(Units)</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Current Bal(Parts)</p>
</div>

<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from issuetable where IssueNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$s=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$itcode=stripslashes($row['ItemCode']);
$s+=preg_replace('~,~', '', stripslashes($row['Total']));
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
	
		$resultx =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
		$rowx=mysqli_fetch_array($resultx);
		$qty=stripslashes($rowx[$x]);
		$pack=stripslashes($row['Pack']) ;
		$part=$qty%$pack;
		$unit=explode('.',($qty/$pack));
		$unit=$unit[0];
?>

<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['UnitBox']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PartBox']) ?></p>
</div>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $unit ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $part ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['Total']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Stock Requested: <script>document.writeln(( <?php  echo $s ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 9:
$result =mysqli_query($db, "select * from issuetable where IssueNo='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=stripslashes($row['TransDate']);
$bname=stripslashes($row['BranchName']);
$issno=stripslashes($row['IssueNo']);


?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK ISSUE NOTE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item Name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Qty.</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit Price</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Discount</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total.</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from issuetable where IssueNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
$qty=0;$itot=0;$tam=0;$b=0;$c=0;$d=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
$s=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
$tam+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
$q=preg_replace('~,~', '', stripslashes($row['Disc']));
$d+=preg_replace('~,~', '', stripslashes($row['Disc']));
$b+=$itot;
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['UnitPrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $q ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $s ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Totals</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 10:
$pagesize=15;
$date=date('Y/m/d');
$code=$_GET['code'];
$result =mysqli_query($db, "select * from creditcustomers where CustomerId='".$code."'");
$row=mysqli_fetch_array($result);
$cname=stripslashes($row['CustomerName']);



if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
	
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
function heading1($logo,$comname,$email,$cname,$d1,$d2,$Add,$tel,$web){
$fname=clean(strtolower($cname)).'_statement';
?>
<div style="width:100%; border:2px solid #333; margin-bottom:10px;">
<div style="float:left">
<p style="text-align:left;font-size:25px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo strtoupper($comname) ?></p>
<div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:30px 0 0 10px">TO:<br/><strong style="font-size:15px"><?php  echo $cname ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Full Statement Report</p>
<?php } ?>

</div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin-left:10%; position:relative;top:30px"/>
<p style="text-align:right;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-80px 10px 0 10px">OFFICIAL  STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img alt="Convert to Pdf" src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onClick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Date</p>
</div>

<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Invoice No</p>
</div>
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Desc</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Dr</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cr</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Balance</p>
</div>
</div>
<div style="height:340px;">
<?php } 


function footing1($a,$b,$c,$h,$d,$q,$e,$j,$f,$k,$g,$l,$username){
?>
</div>
<div style="clear:both; margin-bottom:50px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">CURRENT</p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">1-30 DAYS PAST DUE</p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">31-60 DAYS PAST DUE</p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">61-90 DAYS PAST DUE</p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OVER 90 DAYS PAST DUE</p>
</div>
<div style="border-right:0">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">AMOUNT DUE</p>
</div>
</div>


<div style="width:100%; height:20px; border-bottom:1.5px solid #333;background:#fff; border-left:0" id="normal">
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<script>document.writeln((<?php  echo  $c-$h ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo  $d-$q ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo  $e-$j ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo  $f-$k ?>).formatMoney(2, '.', ','));</script></p></div>


<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((<?php  echo  $g-$l ?>).formatMoney(2, '.', ','));</script></p></div>
<div style="border-right:0.5px solid #333;">
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln((
<?php  echo  $a-$b ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>


<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>

<?php } ?>


<?php
$d11=preg_replace('~/~', '', $d1); $d22=preg_replace('~/~', '', $d2);

$result =mysqli_query($db, "select * from customerdebts where CustomerId='".$code."'");
$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$j=0;$q=0;$k=0;$l=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
if(stripslashes($row['DrCr'])=='dr'){
$a+=preg_replace('~,~', '', stripslashes($row['Amount']));

$stamp=stripslashes($row['Stamp']);
$x=substr(stripslashes($row['Stamp']),0,4);
$y=substr(stripslashes($row['Stamp']),4,2);
$z=substr(stripslashes($row['Stamp']),6,2);
$datex=date('Y');$datey=date('m');$datez=date('d');
$diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
$tdiff=($diffx*365)+($diffy*30)+($diffz*1);

if($tdiff<=30){
	$c+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>30&&$tdiff<=60){
	$d+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>60&&$tdiff<=90){
	$e+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>90&&$tdiff<=120){
	$f+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>=120){
	$g+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
}
if(stripslashes($row['DrCr'])=='cr'){
$b+=preg_replace('~,~', '', stripslashes($row['Amount']));

$stamp=stripslashes($row['Stamp']);
$x=substr(stripslashes($row['Stamp']),0,2);
$y=substr(stripslashes($row['Stamp']),4,2);
$z=substr(stripslashes($row['Stamp']),6,2);
$datex=date('Y');$datey=date('m');$datez=date('d');
$diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
$tdiff=($diffx*365)+($diffy*30)+($diffz*1);

if($tdiff<=30){
	$h+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>30&&$tdiff<=60){
	$q+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>60&&$tdiff<=90){
	$j+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>90&&$tdiff<=120){
	$k+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if($tdiff>=120){
	$l+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
}}

if($d11==0){
$result =mysqli_query($db, "select * from customerdebts where CustomerId='".$code."'");
}
else{
$result =mysqli_query($db, "select * from customerdebts  where CustomerId='".$code."' and Stamp>='".$d11."' and Stamp<='".$d22."'");
}
$num_results = mysqli_num_rows($result); 

$part=explode('.',($num_results/$pagesize));
$part=$part[0];
$part+=1;
$dd=0;

for ($kk=0; $kk <$part; $kk++) {
	
		if($d11==0){
		$result =mysqli_query($db, "select * from customerdebts where CustomerId='".$code."'   limit ".$dd.",".$pagesize."");
		}
		else{
		$result =mysqli_query($db, "select * from customerdebts  where CustomerId='".$code."' and Stamp>='".$d11."' and Stamp<='".$d22."'  limit ".$dd.",".$pagesize."");
		}
		$num_results = mysqli_num_rows($result);
		if($num_results>0){
		heading1($logo,$comname,$email,$cname,$d1,$d2,$Add,$tel,$web);
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		
		loop111($row,$i,$kk);
		
		}
		footing1($a,$b,$c,$h,$d,$q,$e,$j,$f,$k,$g,$l,$username);
		}
		
		$dd+=$pagesize;
		
}


?>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;display:none " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:11%;">Date</td>
        <td  style="width:15%;">Invoice No.</td>
        <td  style="width:40%;">Details</td>
        <td  style="width:10%;">Dr</td>
        <td  style="width:10%;">Cr</td>
        <td  style="width:14%;">Balance</td>
    </tr>


<?php
$d11=preg_replace('~/~', '', $d1); $d22=preg_replace('~/~', '', $d2);
if($d11==0){
$result =mysqli_query($db, "select * from customerdebts where CustomerId='".$code."'");
}
else{
$result =mysqli_query($db, "select * from customerdebts  where CustomerId='".$code."' and Stamp>='".$d11."' and Stamp<='".$d22."'");
}
$a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$j=0;$q=0;$k=0;$l=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
		if(stripslashes($row['DrCr'])=='dr'){
		$a+=preg_replace('~,~', '', stripslashes($row['Amount']));
		
		$stamp=stripslashes($row['Stamp']);
		$x=substr(stripslashes($row['Stamp']),0,4);
		$y=substr(stripslashes($row['Stamp']),4,2);
		$z=substr(stripslashes($row['Stamp']),6,2);
		$datex=date('Y');$datey=date('m');$datez=date('d');
		$diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
		$tdiff=($diffx*365)+($diffy*30)+($diffz*1);
		
		if($tdiff<=30){
			$c+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>30&&$tdiff<=60){
			$d+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>60&&$tdiff<=90){
			$e+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>90&&$tdiff<=120){
			$f+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		if($tdiff>=120){
			$g+=preg_replace('~,~', '', stripslashes($row['Amount']));
		}
		}
		if(stripslashes($row['DrCr'])=='cr'){
		$b+=preg_replace('~,~', '', stripslashes($row['Amount']));
		
		$stamp=stripslashes($row['Stamp']);
		$x=substr(stripslashes($row['Stamp']),0,2);
		$y=substr(stripslashes($row['Stamp']),4,2);
		$z=substr(stripslashes($row['Stamp']),6,2);
		$datex=date('Y');$datey=date('m');$datez=date('d');
		$diffx=$datex-$x;$diffy=$datey-$y;$diffz=$datez-$z;
		$tdiff=($diffx*365)+($diffy*30)+($diffz*1);
		
			if($tdiff<=30){
				$h+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>30&&$tdiff<=60){
				$q+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>60&&$tdiff<=90){
				$j+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>90&&$tdiff<=120){
				$k+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
			if($tdiff>=120){
				$l+=preg_replace('~,~', '', stripslashes($row['Amount']));
			}
		}


if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo dateprint(stripslashes($row['Date'])) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['InvoiceNo']) ?></td>
<td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid; "><?php  echo stripslashes($row['Description']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">
<?php if(stripslashes($row['DrCr'])=='dr'){?>
<script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script><?php }?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">
<?php if(stripslashes($row['DrCr'])=='cr'){?>
<script>document.writeln((<?php  echo stripslashes($row['Amount']) ?>).formatMoney(2, '.', ','));</script><?php }?></td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; "><script>document.writeln((<?php  echo stripslashes($row['Bal']) ?>).formatMoney(2, '.', ','));</script></td>
<?php } ?>
</tr>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:11%;">CURRENT</td>
        <td  style="width:15%;">1-30 DAYS PAST DUE</td>
        <td  style="width:40%;">31-60 DAYS PAST DUE</td>
        <td  style="width:10%;">61-90 DAYS PAST DUE</td>
        <td  style="width:10%;">OVER 90 DAYS PAST DUE</td>
        <td  style="width:14%;">AMOUNT DUE</td>
    </tr>
<tr style="width:100%; height:20px; padding:0">
   		<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $c-$h ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $d-$q ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:40%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $e-$j ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $f-$k ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $g-$l ?>).formatMoney(2, '.', ','));</script></td>
        <td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid"><script>document.writeln((<?php  echo  $a-$b ?>).formatMoney(2, '.', ','));</script></td>
    </tr>
</tbody>
</table>

</div>
 
<?php
break;

case 11:



$date=date('Y/m/d');
$code=$_GET['code'];
$result =mysqli_query($db, "select * from creditsuppliers where CustomerId='".$code."'");
$row=mysqli_fetch_array($result);
$cname=stripslashes($row['CustomerName']);



if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
	
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL CREDITORS STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Creditor Name:&nbsp;&nbsp;<?php  echo $cname ?>&nbsp;&nbsp;Creditor ID:&nbsp;<?php  echo $code ?></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both; margin-bottom:10px" ></div>

<div style="clear:both; margin-bottom:10px"></div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Date</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Invoice No.</p>
</div>
<div style="width:800px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Desc</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Dr</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cr</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Balance</p>
</div>
</div>
<?php
if($d1==0){
$result =mysqli_query($db, "select * from supplierdebts where SupplierId='".$code."'");
}
else{
$result =mysqli_query($db, "select * from supplierdebts  where SupplierId='".$code."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
}
$a=0;$b=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
if(stripslashes($row['DrCr'])=='dr'){
$a+=preg_replace('~,~', '', stripslashes($row['Amount']));
}
if(stripslashes($row['DrCr'])=='cr'){
$b+=preg_replace('~,~', '', stripslashes($row['Amount']));
}loop1($row,$i);} 

?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Debits: &nbsp;<script>document.writeln((<?php  echo  $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Credits: &nbsp; <script>document.writeln((<?php  echo  $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Balance: &nbsp; <script>document.writeln((<?php  echo  $a-$b ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 


break;


case 13:

$date=date('Y/m/d');
$code=$_GET['code'];

if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname=strtolower($date).'_sales_report';
?>
<div style="width:100%;min-height:260px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL Income Report<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Daily Income Report</p>
<?php } else if($code==7){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Category:<?php  echo $_GET['name'] ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:120px;">Trans Date</td>
        <td  style="width:130px">Receipt No.</td>
        <td  style="width:400px">Item Name</td>
         <td  style="width:100px;">Unit Price</td>
       <td  style="width:100px;">Qty</td>
        <td  style="width:85px">Vat</td>
        <td  style="width:95px">Discount</td>
         <td  style="width:135px;">Total Sale</td>
       <td  style="width:90px;">Posted</td>
        <td  style="width:90px">Cashier</td>
    </tr>


<?php
$dept=array(array());
$result =mysqli_query($db, "select * from maindepts order by Branchname");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0);	
}



$result =mysqli_query($db, "select * from maindepts order by BranchId");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept[$i][1]=stripslashes($row['Branchname']);
$dept[$i][0]=stripslashes($row['BranchId']);
$dept[$i][2]=stripslashes($row['Abbr']);
}
$max=count($dept);
for ($x= 0; $x < $max; $x++){
	$dept[$x][2]==0;
	}
$arr1=array();$arr2=array();$arr3=array();
switch($code){
case 1:
	if($d1==0){
	$result =mysqli_query($db, "select * from sales  where Status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where Stamp>='".$d1."' and Stamp<='".$d2."' and Status!=0 and ItemCode!=57");
	}
	$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
	
break;
case 2:
	if($d1==0){
	$result =mysqli_query($db, "select * from sales where Status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where Stamp>='".$d1."' and Stamp<='".$d2."' and Status!=0 and ItemCode!=57");
	}

$new=array();
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
			if(preg_replace('~,~', '', stripslashes($row['TotalPrice']))>preg_replace('~,~', '', stripslashes($row['TotalCost']))){
				$new[]=stripslashes($row['TransNo']);
			}
	}
$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
foreach ($new as $key => $val) {
$result =mysqli_query($db, "select * from sales where TransNo='".$val."'");
$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}	
loop3($row,$key);
}
break;
case 3:
	if($d1==0){
	$result =mysqli_query($db, "select * from sales where Status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where Stamp>='".$d1."' and Stamp<='".$d2."' and Status!=0 and ItemCode!=57");
	}

$new=array();
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
			if(preg_replace('~,~', '', stripslashes($row['TotalPrice']))<preg_replace('~,~', '', stripslashes($row['TotalCost']))){
				$new[]=stripslashes($row['TransNo']);
			}
	}
$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
foreach ($new as $key => $val) {
$result =mysqli_query($db, "select * from sales where TransNo='".$val."'");
$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));	
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
loop3($row,$key);
}

break;
case 4:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from sales where Cashier='".$name."' and Status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where Cashier='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."' and Status!=0 and ItemCode!=57");
	}
$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
break;
case 5:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from sales where ItemCode='".$name."' and Status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where ItemCode='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."' and Status!=0 and ItemCode!=57");
	}
$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
break;
case 6:

	$result =mysqli_query($db, "select * from sales  where Stamp>='".date('Ymd')."' and Stamp<='".date('Ymd')."' and status!=0 and ItemCode!=57");

$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
break;
case 7:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from sales where Category='".$name."' and status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where Category='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."' and status!=0 and ItemCode!=57");
	}
$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
break;
case 8:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from sales where ClientId='".$name."' and status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where ClientId='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."' and status!=0 and ItemCode!=57");
	}
$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
break;

case 9:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from sales where Iid='".$name."' and status!=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where Iid='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."' and status!=0 and ItemCode!=57");
	}
$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
break;

case 10:
	if($d1==0){
	$result =mysqli_query($db, "select * from sales  where Status=0 and ItemCode!=57");
	}
	else{
	$result =mysqli_query($db, "select * from sales  where Stamp>='".$d1."' and Stamp<='".$d2."' and Status=0 and ItemCode!=57");
	}
	$a=0;$b=0;$c=0;$d=0;$e=0;$u=0;$v=0;$w=0;$x=0;$y=0;$z=0;$q=0;$l=0;$p=0;$j=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Vat']));
	$b+=preg_replace('~,~', '', stripslashes($row['Discount']));
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	$d+=preg_replace('~,~', '', stripslashes($row['TotalCost']));
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['Category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	loop3($row,$i);
	}
	
break;
}
foreach ($arr1 as $key => $val) {
$e+=$val;
}
foreach ($arr2 as $key2 => $val2) {
$u+=$val2;
}
$xy=0;
foreach ($arr3 as $key3 => $val3) {
$xy+=$val3;
}



?>


</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Vat: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Discount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Cost: <script>document.writeln(( <?php  echo $d ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Sales: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Net Income: <script>document.writeln(( <?php  echo $c-$d ?>).formatMoney(2, '.', ','));</script></p>


</div>
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Departmental Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
		if($dept[$x][3]>0){
		echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept[$x][1].": <script>document.writeln((".$dept[$x][3].").formatMoney(2, '.', ','));</script></p>";
		}
	}
		
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 15:

$date=date('Y/m/d');
$name=$_GET['name'];

if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL BANK STATEMENT REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Account No:&nbsp;&nbsp;<?php  echo $_GET['name'] ?></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo  dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>

<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Slip No</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Dr.</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cr.</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Description</p>
</div>
</div>
<?php

	if($d1==0){
	$result =mysqli_query($db, "select * from transactions where AccNo='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from transactions  where AccNo='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
$a=0;$b=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Credit']));
	$b+=preg_replace('~,~', '', stripslashes($row['Debit']));
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
	}
?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['TransDate']) ?></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['SlipNo']) ?></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['Debit']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['Credit']) ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['OtherInfo']) ?></p>
</div>
</div>
<?php
	}

?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Debits: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Credits: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Net: <script>document.writeln(( <?php  echo $a-$b ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 16:
function loop5($row,$i){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
	}
?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['ItemCode']) ?></p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['SalePrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['CorporatePrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['InsurancePrice']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php
}
$date=date('d/m/Y');
$code=$_GET['code'];
?>
<div style="width:840px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL SERVICES PRICE LIST REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?php if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Category:&nbsp;&nbsp;<?php  echo $_GET['name'] ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Price List Report</p>
<?php } ?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Code</p>
</div>

<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Normal Price</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Corporate Price</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Insurance Price</p>
</div>
</div>
<?php
switch($code){
	case 1:
	$result =mysqli_query($db, "select * from items where Type='SERVICE' order by ItemName");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	loop5($row,$i);
	}
	break;
	
	case 2:
	$name=$_GET['name'];
	$result =mysqli_query($db, "select * from items where Category='".$name."' and  Type='SERVICE' order by ItemName");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	loop5($row,$i);
	}
	break;
	
}

	

	

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 17:

$date=date('Y/m/d');
$code=$_GET['code'];

if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL GOODS RECEIVED REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?php if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item ID:&nbsp;<?php  echo $_GET['name'];?></p>
<?php } 
 if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full  Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GRN No</p>
</div>
<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Supplier</p>
</div>
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Part</p>
</div>
<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Price</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
switch($code){
case 1:
	if($d1==0){
	$result =mysqli_query($db, "select * from purchases");
	}
	else{
	$result =mysqli_query($db, "select * from purchases  where Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
$a=0;$b=0;$c=0;$d=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	loop6($row,$i);
	}
break;
case 2:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from purchases where ItemCode='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from purchases  where ItemCode='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
$a=0;$b=0;$c=0;$d=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	loop6($row,$i);
	}
break;
case 3:
$name=$_GET['name'];
	if($d1==0){
	$result =mysqli_query($db, "select * from purchases where SupplierId='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from purchases  where SupplierId='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
$a=0;$b=0;$c=0;$d=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
	loop6($row,$i);
	}

break;

}
?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Cost: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 18:
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$date=date('Ymd');
$datee=date('d/m/Y');
$b=substr($date, -4, 4);
$a=substr($date, -8, 4);
$code=$_GET['code'];

switch($code){
case 1:
$c=100;
if($b>1200){
	$a+=1;
	$d=$b-1200+$c;
	$d=sprintf("%04d",$d);
	$date=$a.$d;
}

else{
$date+=$c;	
}
$x='In One Month Report';
break;

case 2:
$c=300;
if($b>1000){
	$a+=1;
	$d=$b-1200+$c;
	$d=sprintf("%04d",$d);
	$date=$a.$d;
}

else{
$date+=$c;	
}
$x='In Three Months Report';
break;

case 3:
$c=600;
if($b>700){
	$a+=1;
	$d=$b-1200+$c;
	$d=sprintf("%04d",$d);
	$date=$a.$d;
}

else{
$date+=$c;	
}
$x='In Six Months Report';
break;

case 4:
$date+=10000;
$x='In One Year Report';
break;

case 5:
$x='Full Report';
break;

case 6:
$x='Full Report';
break;
}

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL EXPIRY REPORT<br/><strong style="font-size:11px">Date:<?php  echo $datee ?></strong></p>
<div style="clear:both"></div>
<?php
 if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $x ?></p>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:185px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Supplier</p>
</div>
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GRN No</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Batch No</p>
</div>
<div style="width:125px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Purchase Date</p>
</div>
<div style="width:125px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Expiry Date</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Purchase Price</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Quantity</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Cost</p>
</div>
</div>
<?php
if($code==5){
	$result =mysqli_query($db, "select * from purchases");
}else if($code==6){
	$result =mysqli_query($db, "select * from purchases  where expstamp<='".preg_replace('~/~', '',$_GET['d2'])."' and expstamp>='".preg_replace('~/~', '',$_GET['d1'])."'");
}else{$result =mysqli_query($db, "select * from purchases  where expstamp<='".$date."' and expstamp>='".date('Ymd')."'");}
	$c=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
	}	
?>
<div style="width:185px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Supplier']) ?></p>
</div>
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PurchNo']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['BatchNo']) ?></p>
</div>
<div style="width:125px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['PurchDate'])) ?></p></div>

<div style="width:125px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Expiry']) ?></p></div>

<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['PurchPrice']) ?>).formatMoney(2, '.', ','));</script></p></div>

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Quantity']) ?></p></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['TotalPrice']) ?></p>
</div>
</div>
<?php } 
?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Cost: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 

break;
case 19:
function loop7($row,$i){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
	}
?>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo $i; ?></p>
</div>
<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['TransDate']) ?></p>
</div>

<div style="width:420px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Pack']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['UnitBox']) ?></p></div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PartBox']) ?></p></div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<script>document.writeln(( <?php  echo stripslashes($row['Total']) ?>).formatMoney(2, '.', ','));</script></p></div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Requested']) ?></p></div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Issued']) ?></p>
</div>
</div>

<?php }
$date=date('Y/m/d');
$code=$_GET['code'];

if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
if(isset($_GET['name'])){
	$name=$_GET['name'];
}else $name='All';
if(isset($_GET['name2'])){
	$name2=$_GET['name2'];
}else $name2='All';

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK TRANSFER REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?php if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Branch (FROM):&nbsp;&nbsp;<?php  echo $name ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Branch (TO):&nbsp;&nbsp;<?php  echo $name2 ?></p>
<?php } 
 if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">#</p>
</div>

<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>

<div style="width:420px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pack</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Part</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Requested</p>
</div>
<div>
<p style="color:#0088b2;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Issued</p>
</div>
</div>
<?php

switch($code){
case 1:
	if($d1==0){
	$result =mysqli_query($db, "select * from issuetable where Status=2");
	}
	else{
	$result =mysqli_query($db, "select * from issuetable  where Stamp>='".$d1."' and Stamp<='".$d2."' and  Status=2");
	}
$b=0;$c=0;
$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results+1; $i++) {
	$row=mysqli_fetch_array($result);
	$b+=preg_replace('~,~', '', stripslashes($row['Total']));
	loop7($row,$i);
	}
break;

case 2:
$name=$_GET['name'];$name2=$_GET['name2'];
	if($d1==0){
		if($name=='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Status=2");
		}
		else if($name=='All'&&$name2!='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep1='".$name2."' and Status=2");			
		}
		else if($name!='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Status=2");			
		}
		else{
		$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Dep1='".$name2."' and Status=2");		
		}
	
	}
	else{
		
		if($name=='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");				
		}
		else if($name=='All'&&$name2!='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep1='".$name2."' and Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");				
		}
		else if($name!='All'&&$name2=='All'){
			$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");				
		}
		else{
		$result =mysqli_query($db, "select * from issuetable where Dep2='".$name."' and Dep1='".$name2."' and Status=2  and Stamp>='".$d1."' and Stamp<='".$d2."' ");		
		}
	}
$b=0;$c=0;
$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results+1; $i++) {
	$row=mysqli_fetch_array($result);
	$b+=preg_replace('~,~', '', stripslashes($row['Total']));
	loop7($row,$i);
	}

}
	
?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Stock Transfered: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Dispensed By.................................................</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Confirmed By.................................................</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Received By.................................................</p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 

break;

case 20:
$date=date('Y/m/d');
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname=strtolower($name).'_stock_variance';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VARIANCE REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Department:<?php  echo $name ?><br/></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:12%;">Date</td>
        <td  style="width:17%;">Department</td>
        <td  style="width:25%;">Item Name</td>
         <td  style="width:10%;">Pack Size</td>
       <td  style="width:17%;">Difference</td>
        <td  style="width:19%;">Monetary Value</td>
    </tr>

<?php


	if($d1==0&&$name=='All'){
	$result =mysqli_query($db, "select * from variance");
	}
	else if($d1==0&&$name!='All'){
	$result =mysqli_query($db, "select * from variance where dept='".$name."'");
	}
	else if($d1!=0&&$name=='All'){
	$result =mysqli_query($db, "select * from variance  where stamp>='".$d1."' and stamp<='".$d2."'");
	}
	else{
	$result =mysqli_query($db, "select * from variance  where dept='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
	}

$j=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$bala=stripslashes($row['bala']) ;
$balb=stripslashes($row['balb']) ;
$qty=$balb-$bala;
$pack=stripslashes($row['pack']) ;
$part=$qty%$pack;
$unit=explode('.',($qty/$pack));
$unit=$unit[0];
$total=stripslashes($row['total']);
$j+=$total;


if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['date'])) ?></td>
       <td style="width:17%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['dept']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['itemname']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['pack']) ?></td>
          <td style="width:17%;border-width:0.5px; border-color:#666; border-style:solid;"><strong><?php  echo $unit ?></strong> Units <strong><?php  echo $part ?></strong> Parts</td>
        <td style="width:19%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Variance: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 21:
$date=date('Y/m/d');
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname=strtolower($name).'_stock_variance_summary';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VARIANCE SUMMARY<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Department:<?php  echo $name ?><br/></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<td  style="width:9%;">Variance No</td>
   		<td  style="width:30%;">Date</td>
        <td  style="width:30%;">Department</td>
        <td  style="width:39%;">Monetary Value</td>
    </tr>

<?php


	if($d1==0&&$name=='All'){
	$result =mysqli_query($db, "select * from variance");
	}
	else if($d1==0&&$name!='All'){
	$result =mysqli_query($db, "select * from variance where dept='".$name."'");
	}
	else if($d1!=0&&$name=='All'){
	$result =mysqli_query($db, "select * from variance  where stamp>='".$d1."' and stamp<='".$d2."'");
	}
	else{
	$result =mysqli_query($db, "select * from variance  where dept='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
	}

$j=0;$arr=array();
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$vno=stripslashes($row['vno']) ;
$total=stripslashes($row['total']) ;
if(isset($arr[$vno])){
$x=$arr[$vno] + $total;
$arr[$vno]=$x;
}else{
$arr[$vno]=$total;
}
$j+=$total;
}

$i=0;
foreach ($arr as $key => $val) {
	
	$result =mysqli_query($db, "select * from variance where vno='".$key."'");
	$row=mysqli_fetch_array($result);
if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>
    <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $key ?></td>
   		<td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['date'])) ?></td>
       <td style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['dept']) ?></td>
        <td style="width:39%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $val ?>).formatMoney(2, '.', ','));</script></td>
    </tr>


<?php 
$i++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Variance: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 22:
$resulta =mysqli_query($db, "select * from consfee where Id='".$rcptno."'");
$rowa=mysqli_fetch_array($resulta);
$name=stripslashes($rowa['Name']);
$amount=stripslashes($rowa['Amount']);
$apaid=stripslashes($rowa['AmountPaid']);
$change=stripslashes($rowa['ChangeR']);

?>
<div style="width:370px;min-height:320px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?></br>TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL RECEIPT<br/>
<strong style="font-size:11px">Date:<?php  echo date('d/m/Y'); ?>&nbsp; &nbsp; &nbsp; Receipt No: <?php  echo $rcptno ?><br/> Name: <?php  echo $name ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; "/>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333;margin-top:10px">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</p>
</div>

<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px">Price.</p>
</div>
</div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CONSULTATION FEE</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></a>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Total Amount</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Amount Paid</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $apaid ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>


<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Change</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $change ?></p>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>

</div>
<?php 
break;
case 23:
$resulta =mysqli_query($db, "select * from labfee where Id='".$rcptno."'");
$rowa=mysqli_fetch_array($resulta);
$name=stripslashes($rowa['Name']);
$amount=stripslashes($rowa['Amount']);
$apaid=stripslashes($rowa['AmountPaid']);
$change=stripslashes($rowa['ChangeR']);

?>
<div style="width:370px;min-height:320px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?></br>TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL RECEIPT<br/>
<strong style="font-size:11px">Date:<?php  echo date('d/m/Y'); ?>&nbsp; &nbsp; &nbsp; Receipt No: <?php  echo $rcptno ?><br/>Name: <?php  echo $name ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; "/>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333;margin-top:10px">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</p>
</div>

<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px">Price.</p>
</div>
</div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">LABORATORY FEE</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></a>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Total Amount</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Amount Paid</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $apaid ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>


<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Change</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $change ?></p>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>

</div>
<?php 
break;
case 24:
$resulta =mysqli_query($db, "select * from wardfee where Id='".$rcptno."'");
$rowa=mysqli_fetch_array($resulta);
$name=stripslashes($rowa['Name']);
$amount=stripslashes($rowa['Amount']);
$apaid=stripslashes($rowa['AmountPaid']);
$change=stripslashes($rowa['ChangeR']);

?>
<div style="width:370px;min-height:320px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?></br>TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL RECEIPT<br/>
<strong style="font-size:11px">Date:<?php  echo date('d/m/Y'); ?>&nbsp; &nbsp; &nbsp; Receipt No: <?php  echo $rcptno ?><br/> Name: <?php  echo $name ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; "/>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333;margin-top:10px">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</p>
</div>

<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px">Price.</p>
</div>
</div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">INPATIENT FEE</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></a>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Total Amount</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Amount Paid</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $apaid ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>


<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Change</p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $change ?></p>
</div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>

</div>
<?php 
break;



			case 25:
				//die('<h3 style="text-align:center;">Trial balance coming soon</h3>');
				if (isset($_GET['d1'])) {
					$d1 = trim(mysqli_real_escape_string($db, $_GET['d1']));
				} else $d1 = '2024-01-01';
				if (isset($_GET['d2'])) {
					$d2 = trim(mysqli_real_escape_string($db, $_GET['d2']));
				} else $d2 = date('Y-m-d');

				$d1_slash = trim(preg_replace('~-~', '/', $d1));
				$d2_slash = trim(preg_replace('~-~', '/', $d2));
				$date = date_create_from_format("Y/m/d", $d1_slash);
				$startdate_words = date_format($date, "jS M Y");

				$cash_trans = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$bank_trans = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$bank_meta = array();
				$receivables = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$receivables_meta = array();
				$account_payables = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$receipts = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$insurancereceipts = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$expenses = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());

				$res1 = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category IN('Cash','Cashier') ");
				while ($row = mysqli_fetch_assoc($res1)) {
					$cash_trans['ledgerid'][] = intval($row['ledgerid']);
				}
				for ($i = 0; $i < count($cash_trans['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $cash_trans['ledgerid'][$i] . "' OR drid='" . $cash_trans['ledgerid'][$i] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == intval($cash_trans['ledgerid'][$i]))) {
							$cash_trans['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$cash_trans['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$bank_trans['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($bank_trans['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_trans['ledgerid'][$i] . "' OR drid='" . $bank_trans['ledgerid'][$i] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_trans['ledgerid'][$i])) {
							$bank_trans['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$bank_trans['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$cash = floatval(array_sum($cash_trans['tdr'])) - floatval(array_sum($cash_trans['tcr']));
				$bank = floatval(array_sum($bank_trans['tdr'])) - floatval(array_sum($bank_trans['tcr']));

				$resBM = mysqli_query($db, "SELECT DISTINCT ledgerid,`name` FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				while ($row = mysqli_fetch_assoc($resBM)) {
					$bank_meta[] = array('ledgerid' => intval($row['ledgerid']), 'name' => trim(stripslashes($row['name'])), 'balance' => 0);
				}

				for ($i = 0; $i < count($bank_meta); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_meta[$i]['ledgerid'] . "' OR drid='" . $bank_meta[$i]['ledgerid'] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_meta[$i]['ledgerid'])) {
							$bank_meta[$i]['balance'] -= floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$bank_meta[$i]['balance'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Income' AND category!='Insurance' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$receipts['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($receipts['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receipts['ledgerid'][$i] . "' OR drid='" . $receipts['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receipts['ledgerid'][$i])) {
							$receipts['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receipts['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `status`=1 AND `type`='Income' AND category='Insurance' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$insurancereceipts['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($insurancereceipts['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $insurancereceipts['ledgerid'][$i] . "' OR drid='" . $insurancereceipts['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $insurancereceipts['ledgerid'][$i])) {
							$insurancereceipts['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$insurancereceipts['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Expense' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$expenses['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($expenses['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount,transType FROM ledgerentries WHERE (crid='" . $expenses['ledgerid'][$i] . "' OR drid='" . $expenses['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $expenses['ledgerid'][$i])) {
							$expenses['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$expenses['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$receivables['ledgerid'][] = 628;
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=628  ");
				while ($row = mysqli_fetch_assoc($res)) {
					$receivables['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($receivables['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables['ledgerid'][$i] . "' OR drid='" . $receivables['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables['ledgerid'][$i])) {
							$receivables['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receivables['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$receivables_meta[] = array('ledgerid' => 628, 'name' => 'Accounts Receivable', 'balance' => 0);
				$resRM = mysqli_query($db, "SELECT DISTINCT ledgerid,`name` FROM ledgers WHERE `type`='Asset' AND mainLedgerId=628 ");
				while ($row = mysqli_fetch_assoc($resRM)) {
					$receivables_meta[] = array('ledgerid' => intval($row['ledgerid']), 'name' => trim(stripslashes($row['name'])), 'balance' => 0);
				}

				for ($i = 0; $i < count($receivables_meta); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables_meta[$i]['ledgerid'] . "' OR drid='" . $receivables_meta[$i]['ledgerid'] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables_meta[$i]['ledgerid'])) {
							$receivables_meta[$i]['balance'] -= floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receivables_meta[$i]['balance'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$account_payables['ledgerid'][] = 629;
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=629 ");
				while ($row = mysqli_fetch_assoc($res)) {
					$account_payables['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($account_payables['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $account_payables['ledgerid'][$i] . "' OR drid='" . $account_payables['ledgerid'][$i] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $account_payables['ledgerid'][$i])) {
							$account_payables['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$account_payables['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				$output = '';

				$output .= '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml"><head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>Trial Balance - Better Health</title>
				<meta name="keywords" content="" />
				<meta name="description" content="" />

				<head>
						<style type="text/css">
								.bhealth-table {
									width: 100%;
									font-family:helvetica sans-serif;
									font-size: 14px;
									border-collapse: collapse;
								
								}
								.bhealth-table th{
									text-align: left;
								}						
								.bhealth-table td,.bhealth-table th {
									border: 1px solid #aaa;
									padding: 8px;
								}
								.bhealth-table td {
									color:#000;
									font-size: 14px;
								}
								.bhealth-table-striped tr:nth-child(even){
									background-color:#ededed;
								}
						
						</style>
				</head>
				<body>';

				$output .= '<div style="width:100%;padding:10px;">
            <table class="bhealth-table bhealth-table-striped" style="width:100%;">
              <thead>
                <tr>
                  <th colspan="4" style="text-align:center;">TRIAL BALANCE</th>
                </tr>
                <tr>
                  <th colspan="4" style="text-align:center;">PERIOD FROM ' . $d1 . ' TO ' . $d2 . ' </th>
                </tr>';
				$output .= '<tr style="background-color:rgba(15, 17, 18, 0.71);color:#fff;">';
				$output .= '<th colspan="2" style="text-align:left;">DESCRIPTION </th>
                  <th style="text-align:center;">DEBIT</th>
                  <th style="text-align:center;">CREDIT</th>';
				$output .= '</tr>';
				$output .= '</thead>
								<tbody>';
				$output .= '<tr>
								<th colspan="4" style="text-align:left;">CASH BALANCES</th>
							</tr>';

				$output .= '<tr>
                      <td colspan="2" style="text-align:left;"> Cash Balances </td>
                      <td style="text-align:center;">' . number_format($cash, 2) . '</td>
                      <td style="text-align:center;"> </td>
                  </tr>';
				$output .= '<tr>
						<th colspan="4" style="text-align:left;">BANK BALANCES</th>
					</tr>';

				for ($i = 0; $i < count($bank_meta); $i++) {
					if (floatval($bank_meta[$i]['balance']) != 0) {
						$output .= '<tr>
						<td colspan="2" style="text-align:left;"> ' . ucwords(trim(strtolower($bank_meta[$i]['name']))) . ' </td>
						<td style="text-align:center;">' . number_format(floatval($bank_meta[$i]['balance']), 2, '.', ',') . '</td>
						<td style="text-align:center;"></td>
					</tr>';
					}
				}

				// $output.='<tr>
				//                   <td colspan="2" style="text-align:left;">  Bank Balances </td>
				//                   <td style="text-align:center;">'.number_format($bank, 2).'</td>
				//                   <td style="text-align:center;"></td>
				//               </tr>';

				$output .= '<tr>
								<th colspan="4" style="text-align:left;">RECEIVABLES</th>
							</tr>';

				for ($i = 0; $i < count($receivables_meta); $i++) {
					if (floatval($receivables_meta[$i]['balance']) != 0) {
						$output .= '<tr>
						<td colspan="2" style="text-align:left;"> ' . ucwords(trim(strtolower($receivables_meta[$i]['name']))) . ' </td>
						<td style="text-align:center;">' . number_format(floatval($receivables_meta[$i]['balance']), 2, '.', ',') . '</td>
						<td style="text-align:center;"></td>
					</tr>';
					}
				}

				$receivables_bal = floatval(array_sum($receivables['tdr'])) - floatval(array_sum($receivables['tcr']));

				// $output.='<tr>
				//             <td colspan="2" style="text-align:left;"> Receivables  </td>
				//             <td style="text-align:center;">'.number_format($receivables_bal,2).'</td>
				//             <td style="text-align:center;"></td>
				//         </tr>';

				$output .= '<tr>
                      <th colspan="4" style="height:22px;"></th>
                  </tr>';
				$output .= '<tr>
                      <th colspan="4" style="text-align:left;">EXPENSES</th>
                  </tr>';

				$expenses_bal = floatval(array_sum($expenses['tdr'])) - floatval(array_sum($expenses['tcr']));
				$output .= '<tr>
                      <td colspan="2" style="text-align:left;"> Payments  </td>
                      <td style="text-align:center;">' . number_format($expenses_bal, 2) . '</td>
                      <td style="text-align:center;"></td>
                  </tr>';

				$account_payables_bal = floatval(array_sum($account_payables['tcr'])) - floatval(array_sum($account_payables['tdr']));
				$output .= '<tr>
                      <td colspan="2" style="text-align:left;"> Payables</td>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;">' . number_format($account_payables_bal, 2) . '</td>
                  </tr>';
				$output .= '<tr>
                      <th colspan="4" style="text-align:left;">RECEIPTS</th>
                  </tr>';

				$insurance_receipts_bal = floatval(array_sum($insurancereceipts['tcr'])) - floatval(array_sum($insurancereceipts['tdr']));
				$output .= '<tr>
                      <td colspan="2" style="text-align:left;"> Insurance Receipts </td>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;">' . number_format($insurance_receipts_bal, 2) . '</td>
                  </tr>';
				$receipts_bal = floatval(array_sum($receipts['tcr'])) - floatval(array_sum($receipts['tdr']));
				$output .= '<tr>
                      <td colspan="2" style="text-align:left;"> Receipts </td>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;">' . number_format($receipts_bal, 2) . '</td>
                  </tr>';

				$output .= '</tbody>';
				$output .= '<tfoot>';

				$debits = $cash + $bank + $expenses_bal + floatval($receivables_bal);
				$credits = floatval($insurance_receipts_bal) + floatval($receipts_bal) + floatval($account_payables_bal);


				//PREVIOUS BALANCES
				// $cash_trans_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				// $bank_trans_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				// $receivables_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				// $account_payables_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());

				// $res1 = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category IN('Cash','Cashier') ");
				// while ($row = mysqli_fetch_assoc($res1)) {
				// 	$cash_trans_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }
				// for ($i = 0; $i < count($cash_trans_bfwd['ledgerid']); $i++) {
				// 	$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $cash_trans_bfwd['ledgerid'][$i] . "' OR drid='" . $cash_trans_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
				// 	while ($row = mysqli_fetch_assoc($results)) {
				// 		if (intval($row['crid']) > 0 && intval($row['crid']) == intval($cash_trans_bfwd['ledgerid'][$i])) {
				// 			$cash_trans_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		} else {
				// 			$cash_trans_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		}
				// 	}
				// }

				// $res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				// while ($row = mysqli_fetch_assoc($res)) {
				// 	$bank_trans_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }

				// for ($i = 0; $i < count($bank_trans_bfwd['ledgerid']); $i++) {
				// 	$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_trans_bfwd['ledgerid'][$i] . "' OR drid='" . $bank_trans_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
				// 	while ($row = mysqli_fetch_assoc($results)) {
				// 		if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_trans_bfwd['ledgerid'][$i])) {
				// 			$bank_trans_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		} else {
				// 			$bank_trans_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		}
				// 	}
				// }

				// $receivables_bfwd['ledgerid'][] = 628;
				// $res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=628  ");
				// while ($row = mysqli_fetch_assoc($res)) {
				// 	$receivables_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }

				// for ($i = 0; $i < count($receivables_bfwd['ledgerid']); $i++) {
				// 	$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables_bfwd['ledgerid'][$i] . "' OR drid='" . $receivables_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
				// 	while ($row = mysqli_fetch_assoc($results)) {
				// 		if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables_bfwd['ledgerid'][$i])) {
				// 			$receivables_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		} else {
				// 			$receivables_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		}
				// 	}
				// }

				// $account_payables_bfwd['ledgerid'][] = 629;
				// $res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=629 ");
				// while ($row = mysqli_fetch_assoc($res)) {
				// 	$account_payables_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }

				// for ($i = 0; $i < count($account_payables_bfwd['ledgerid']); $i++) {
				// 	$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $account_payables_bfwd['ledgerid'][$i] . "' OR drid='" . $account_payables_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
				// 	while ($row = mysqli_fetch_assoc($results)) {
				// 		if (intval($row['crid']) > 0 && (intval($row['crid']) == $account_payables_bfwd['ledgerid'][$i])) {
				// 			$account_payables_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		} else {
				// 			$account_payables_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
				// 		}
				// 	}
				// }


				// $cash_bal_bfwd = floatval(array_sum($cash_trans_bfwd['tdr'])) - floatval(array_sum($cash_trans_bfwd['tcr']));
				// $bank_bal_bfwd = floatval(array_sum($bank_trans_bfwd['tdr'])) - floatval(array_sum($bank_trans_bfwd['tcr']));
				// $receivables_bal_bfwd = floatval(array_sum($receivables_bfwd['tdr'])) - floatval(array_sum($receivables_bfwd['tcr']));
				// $account_payables_bal_bfwd = floatval(array_sum($account_payables_bfwd['tcr'])) - floatval(array_sum($account_payables_bfwd['tdr']));

				// $totalBalBFwd = floatval($cash_bal_bfwd) + floatval($bank_bal_bfwd) + floatval($receivables_bal_bfwd) - floatval($account_payables_bal_bfwd);

				// if ($totalBalBFwd < 0) {
				// 	$output .= '<tr>
				//       <th colspan="2" style="text-align:left;"> Balance b/fwd ' . $startdate_words . ' </th>
				//       <td style="text-align:center;"> </td>
				//       <th style="text-align:center;">(' . number_format(abs($totalBalBFwd), 2) . ')</th>
				//   </tr>';
				// } else {
				// 	$output .= '<tr>
				//       <th colspan="2" style="text-align:left;">Balance b/fwd ' . $startdate_words . ' </th>
				//       <td class="text-center"> </td>
				//       <th style="text-align:center;">' . number_format($totalBalBFwd, 2) . '</th>
				//   </tr>';
				// }
				// $credits = floatval($credits) + floatval($totalBalBFwd);

				$output .= '<tr>
								<th colspan="2">TOTAL</th>
								<th style="text-align:center;">' . number_format($debits, 2, '.', ',') . ' </th>
								<th style="text-align:center;">' . number_format($credits, 2, '.', ',') . ' </th>
								</tr>';
				$output .= '</tfoot>
						</table>';


				$output .= '
				</body>
		</html>';


				die($output);


				break;


			case 26:
				if (isset($_GET['d1'])) {
					$d1 = trim(mysqli_real_escape_string($db, $_GET['d1']));
				} else $d1 = '2024-01-01';
				if (isset($_GET['d2'])) {
					$d2 = trim(mysqli_real_escape_string($db, $_GET['d2']));
				} else $d2 = date('Y-m-d');

				$d1_slash = trim(preg_replace('~-~', '/', $d1));
				$d2_slash = trim(preg_replace('~-~', '/', $d2));
				$date = date_create_from_format("Y/m/d", $d1_slash);
				$startdate_words = date_format($date, "jS M Y");

				$receipts = array('ledgerid' => array(), 'name' => array(), 'balance' => array(), 'total' => 0);
				$payments = array('ledgerid' => array(), 'name' => array(), 'balance' => array(), 'total' => 0);

				$output = '';

				$output .= '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml"><head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>Statement Of Receipts And Payments - Better Health</title>
				<meta name="keywords" content="" />
				<meta name="description" content="" />

				<head>
						<style type="text/css">
								.bhealth-table {
									width: 100%;
									font-family:helvetica sans-serif;
									font-size: 12px;
									border-collapse: collapse;
								
								}
								.bhealth-table th{
									text-align: left;
									font-size: 14px;
								}						
								.bhealth-table td,.bhealth-table th {
									border: 1.5px solid #aaa;
									padding: 8px;
								}
								.bhealth-table td {
									color:#000;
									font-size: 12px;
								}
								.bhealth-table-striped tr:nth-child(even){
									background-color:#ededed;
								}
								.bhealth-table tr > td:nth-child(2){
									font-size: 14px;
								}

						
						</style>
				</head>
				<body>';

				$output .= '<div style="width:920px;padding:10px;margin-bottom:100px;">
            <table class="bhealth-table bhealth-table-striped" style="width:100%;">
              <thead>
                <tr>
                  <th colspan="3" style="text-align:center;">STATEMENT OF RECEIPTS AND PAYMENTS</th>
                </tr>
                <tr>
                  <th colspan="3" style="text-align:center;">PERIOD FROM ' . $d1 . ' TO ' . $d2 . ' </th>
                </tr>';
				$output .= '<tr style="background-color:rgba(15, 17, 18, 0.71);color:#fff;">';
				$output .= '<th colspan="2" style="text-align:left;">DESCRIPTION </th>
                  	<th style="text-align:center;">AMOUNT</th>';
				$output .= '</tr>';
				$output .= '</thead>
								<tbody>';

				$output .= '<tr>
                      <th colspan="3" style="text-align:left;">RECEIPTS</th>
                  </tr>';

				$res = mysqli_query($db, "SELECT ledgerid,`name`,mainLedgerId FROM ledgers WHERE ledgerid!=1083 AND `type`='Income' ORDER BY ledgerid ASC ");
				while ($row = mysqli_fetch_assoc($res)) {
					if (intval($row['mainLedgerId']) != 628 && intval($row['mainLedgerId']) != 629) {
						$receipts['ledgerid'][] = intval($row['ledgerid']);
						$receipts['name'][intval($row['ledgerid'])] = trim(stripslashes($row['name']));
						$receipts['balance'][intval($row['ledgerid'])] = 0;
					}
				}

				for ($i = 0; $i < count($receipts['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receipts['ledgerid'][$i] . "' OR drid='" . $receipts['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && intval($row['crid']) == $receipts['ledgerid'][$i]) {
							$receipts['balance'][intval($row['crid'])] += floatval(preg_replace('~,~', '', $row['amount']));
							$receipts['total'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receipts['balance'][intval($row['drid'])] -= floatval(preg_replace('~,~', '', $row['amount']));
							$receipts['total'] -= floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				foreach ($receipts['ledgerid'] as $k => $v) {
					if (floatval($receipts['balance'][$v]) != 0) {
						$output .= '<tr>';
						$output .= '<td colspan="2" style="text-align:left;"> ' . strtoupper($receipts['name'][$v]) . ' </td>
														<td style="text-align:center;">' . number_format(floatval($receipts['balance'][$v]), 2, '.', ',') . '</td>';
						$output .= '</tr>';
					}
				}

				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">TOTAL RECEIPTS</th>
											<th style="text-align:center;">' . number_format(floatval($receipts['total']), 2, '.', ',') . '  </th>
                  </tr>';
				$output .= '<tr>
                      <td colspan="3" style="height:18px;"></td>
                  </tr>';

				$output .= '<tr>
                      <th colspan="3" style="text-align:left;">PAYMENTS</th>
                  </tr>';

				$res = mysqli_query($db, "SELECT ledgerid,`name`,mainLedgerId FROM ledgers WHERE `type`='Expense' ORDER BY ledgerid ASC ");
				while ($row = mysqli_fetch_assoc($res)) {
					if (intval($row['mainLedgerId']) != 628 && intval($row['mainLedgerId']) != 629) {
						$payments['ledgerid'][] = intval($row['ledgerid']);
						$payments['name'][intval($row['ledgerid'])] = trim(stripslashes($row['name']));
						$payments['balance'][intval($row['ledgerid'])] = 0;
					}
				}

				for ($i = 0; $i < count($payments['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $payments['ledgerid'][$i] . "' OR drid='" . $payments['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $payments['ledgerid'][$i])) {
							$payments['balance'][intval($row['crid'])] -= floatval(preg_replace('~,~', '', $row['amount']));
							$payments['total'] -= floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$payments['balance'][intval($row['drid'])] += floatval(preg_replace('~,~', '', $row['amount']));
							$payments['total'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				foreach ($payments['ledgerid'] as $k => $v) {
					if (floatval($payments['balance'][$v]) != 0) {
						$output .= '<tr>';
						$output .= '<td colspan="2" style="text-align:left;"> ' . strtoupper($payments['name'][$v]) . ' </td>
														<td style="text-align:center;">' . number_format(floatval($payments['balance'][$v]), 2, '.', ',') . '</td>';
						$output .= '</tr>';
					}
				}

				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">TOTAL PAYMENTS</th>
											<th style="text-align:center;">' . number_format(floatval($payments['total']), 2, '.', ',') . '  </th>
                  </tr>';

				$output .= '<tr>
                      <td colspan="3" style="height:22px;"></td>
                  </tr>';


				$output .= '</tbody>';
				$output .= '<tfoot>';
				$surplus_deficit = floatval($receipts['total']) - floatval($payments['total']);

				$output .= '<tr>
											<th colspan="2" style="text-align:left;">SURPLUS / DEFICIT</th>
											<th style="text-align:center;">' . number_format(floatval($surplus_deficit), 2, '.', ',') . ' </th>
								 </tr>';
				$output .= '</tfoot>
						</table>';



				$output .= '
				</body>
		</html>';


				die($output);


				break;

			case 27:
				//die('<h3 style="text-align:center;">Balance sheet is in development and will be updated soon</h3>');
				if (isset($_GET['d1'])) {
					$d1 = trim(mysqli_real_escape_string($db, $_GET['d1']));
				} else {
					$d1 = date('2024/01/01');
				}
				if (isset($_GET['d2'])) {
					$d2 = trim(mysqli_real_escape_string($db, $_GET['d2']));
				} else {
					$d2 = date('2025/01/01');
				}

				$d1_slash = trim(preg_replace('~-~', '/', $d1));
				$d2_slash = trim(preg_replace('~-~', '/', $d2));
				$date = date_create_from_format("Y/m/d", $d1_slash);
				$startdate_words = date_format($date, "jS M Y");

				$cash_trans = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$bank_trans = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$receivables = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$account_payables = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$other_liabilities = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array(), 'name' => array(), 'balance' => array(), 'total' => 0);

				$res1 = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category IN('Cash','Cashier') ");
				while ($row = mysqli_fetch_assoc($res1)) {
					$cash_trans['ledgerid'][] = intval($row['ledgerid']);
				}
				for ($i = 0; $i < count($cash_trans['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $cash_trans['ledgerid'][$i] . "' OR drid='" . $cash_trans['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && intval($row['crid']) == intval($cash_trans['ledgerid'][$i])) {
							$cash_trans['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$cash_trans['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$bank_trans['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($bank_trans['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_trans['ledgerid'][$i] . "' OR drid='" . $bank_trans['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_trans['ledgerid'][$i])) {
							$bank_trans['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$bank_trans['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$cash = floatval(array_sum($cash_trans['tdr'])) - floatval(array_sum($cash_trans['tcr']));
				$bank = floatval(array_sum($bank_trans['tdr'])) - floatval(array_sum($bank_trans['tcr']));

				$receivables['ledgerid'][] = 628;
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=628  ");
				while ($row = mysqli_fetch_assoc($res)) {
					$receivables['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($receivables['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables['ledgerid'][$i] . "' OR drid='" . $receivables['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables['ledgerid'][$i])) {
							$receivables['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receivables['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$account_payables['ledgerid'][] = 629;
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=629 ");
				while ($row = mysqli_fetch_assoc($res)) {
					$account_payables['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($account_payables['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $account_payables['ledgerid'][$i] . "' OR drid='" . $account_payables['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $account_payables['ledgerid'][$i])) {
							$account_payables['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$account_payables['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				$res = mysqli_query($db, "SELECT ledgerid,`name`,mainLedgerId FROM ledgers WHERE `type`='Liability' AND ledgerid NOT IN(629,684) ");
				while ($row = mysqli_fetch_assoc($res)) {
					if (intval($row['ledgerid']) != 629 && intval($row['mainLedgerId']) != 629) {
						$other_liabilities['ledgerid'][] = intval($row['ledgerid']);
						$other_liabilities['name'][intval($row['ledgerid'])] = trim(stripslashes($row['name']));
					}
				}

				for ($i = 0; $i < count($other_liabilities['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $other_liabilities['ledgerid'][$i] . "' OR drid='" . $other_liabilities['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $other_liabilities['ledgerid'][$i])) {
							$other_liabilities['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$other_liabilities['balance'][intval($row['crid'])] += floatval(preg_replace('~,~', '', $row['amount']));
							$other_liabilities['total'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$other_liabilities['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$other_liabilities['balance'][intval($row['drid'])] -= floatval(preg_replace('~,~', '', $row['amount']));
							$other_liabilities['total'] -= floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				$output = '';

				$output .= '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml"><head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>Balance Sheet - Better Health</title>
				<meta name="keywords" content="" />
				<meta name="description" content="" />

				<head>
						<style type="text/css">
								.bhealth-table {
									width: 100%;
									font-family:helvetica sans-serif;
									font-size: 14px;
									border-collapse: collapse;
								
								}
								.bhealth-table th{
									text-align: left;
								}						
								.bhealth-table td,.bhealth-table th {
									border: 1px solid #aaa;
									padding: 8px;
								}
								.bhealth-table td {
									color:#000;
									font-size: 14px;
								}
								.bhealth-table-striped tr:nth-child(even){
									background-color:#ededed;
								}
						
						</style>
				</head>
				<body>';

				$output .= '
          <div style="width:1000px;">   
            <div style="width:100%;height:100px;">
								<h4 style="text-align:center;">BALANCE SHEET</h4>
								<h3 style="text-align:center;">PERIOD FROM ' . $d1 . ' TO ' . $d2 . ' </h3>
            </div>
          </div>
          <div style="width:1100px;margin-bottom:50px;">
            <table class="bhealth-table bhealth-table-striped" style="width:100%;">
              <thead>
                <tr style="background-color:rgb(60, 59, 59);color:#fff;">
                  <th colspan="2" style="text-align:left;">DESCRIPTION</th>
                  <th style="text-align:center;"> AMOUNT</th>
                  <th style="text-align:center;display:none;"></th>
                </tr>
              </thead>
                <tbody>';
				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">FINANCIAL ASSETS</th>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';
				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">Cash and Cash Equivalents</th>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';
				$output .= '<tr>
                      <td colspan="2" style="text-align:left;">  Bank Balances  </td>
                      <td style="text-align:center;">' . number_format($bank, 2) . '</td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';
				$output .= '<tr>
                      <td colspan="2" style="text-align:left;">  Cash Balances </td>
                      <td style="text-align:center;">' . number_format($cash, 2) . '</td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';
				$total_cash = floatval($cash) + floatval($bank);
				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">Total Cash and Cash Equivalents</th>
                      <th style="text-align:center;">' . number_format($total_cash, 2) . '</th>
                      <th style="text-align:center;display:none;"></th>
                  </tr>';
				$receivables_bal = floatval(array_sum($receivables['tdr'])) - floatval(array_sum($receivables['tcr']));
				$cash_bal = floatval($cash) + floatval($bank) + floatval($receivables_bal);
				$output .= '<tr style="height:26px;">
                      <th colspan="2" style="text-align:left;"></th>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';

				$output .= '<tr>
                      <td colspan="2" style="text-align:left;"> Accounts Receivable  </td>
                      <td style="text-align:center;">' . number_format($receivables_bal, 2) . '</td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';
				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">TOTAL FINANCIAL ASSETS</th>
                      <th style="text-align:center;">' . number_format($cash_bal, 2) . '</th>
                      <th style="text-align:center;display:none;"></th>
                  </tr>';
				$output .= '<tr style="height:26px;">
                      <th colspan="2" style="text-align:left;"></th>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';
				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">FINANCIAL LIABILITIES</th>
                      <td style="text-align:left;"></td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';

				$payable_bal = floatval(array_sum($account_payables['tcr'])) - floatval(array_sum($account_payables['tdr']));
				$output .= '<tr>
                      <td colspan="2" style="text-align:left;">  Accounts Payable </td>';
				if ($payable_bal > 0) {
					$output .= '<td style="text-align:center;">(' . number_format($payable_bal, 2) . ')</td>';
				} else {
					$output .= '<td style="text-align:center;">(' . number_format(abs($payable_bal), 2) . ')</td>';
				}
				$output .= '<td style="text-align:center;display:none;"></td>
                  </tr>';

				foreach ($other_liabilities['ledgerid'] as $k => $v) {
					$output .= '<tr>';
					$output .= '<td colspan="2" style="text-align:left;"> ' . strtoupper($other_liabilities['name'][$v]) . ' </td>
											<td style="text-align:center;">' . number_format(floatval($other_liabilities['balance'][$v]), 2, '.', ',') . '</td>';
					$output .= '</tr>';
				}
				if (floatval($cash_bal) >= 0 && floatval($payable_bal) >= 0 && floatval($other_liabilities['total']) >= 0) {
					$net_assets = floatval($cash_bal) - floatval($payable_bal) - floatval($other_liabilities['total']);
				} else {
					if ($payable_bal >= 0) {
						$net_assets = floatval($cash_bal) - floatval($payable_bal);
					} else {
						$net_assets = floatval($cash_bal) + floatval($payable_bal);
					}
					if (floatval($other_liabilities['total']) >= 0) {
						$net_assets = floatval($cash_bal) - floatval($other_liabilities['total']);
					} else {
						$net_assets = floatval($cash_bal) + floatval($other_liabilities['total']);
					}
				}

				$output .= '<tr>
                      <th colspan="2" style="text-align:left;">NET FINANCIAL ASSETS</th>
                      <th style="text-align:center;">' . number_format($net_assets, 2) . '</th>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';

				$output .= '<tr style="height:26px;">
                        <th colspan="2" style="text-align:left;"></th>
                        <td style="text-align:center;"></td>
                        <td style="text-align:center;display:none;"></td>
                    </tr>';


				//PREVIOUS BALANCES

				$cash_trans_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$bank_trans_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$receivables_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$account_payables_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());

				$res1 = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category IN('Cash','Cashier') ");
				while ($row = mysqli_fetch_assoc($res1)) {
					$cash_trans_bfwd['ledgerid'][] = intval($row['ledgerid']);
				}
				for ($i = 0; $i < count($cash_trans_bfwd['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $cash_trans_bfwd['ledgerid'][$i] . "' OR drid='" . $cash_trans_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && intval($row['crid']) == intval($cash_trans_bfwd['ledgerid'][$i])) {
							$cash_trans_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$cash_trans_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$bank_trans_bfwd['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($bank_trans_bfwd['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_trans_bfwd['ledgerid'][$i] . "' OR drid='" . $bank_trans_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_trans_bfwd['ledgerid'][$i])) {
							$bank_trans_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$bank_trans_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$receivables_bfwd['ledgerid'][] = 628;
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=628  ");
				while ($row = mysqli_fetch_assoc($res)) {
					$receivables_bfwd['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($receivables_bfwd['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables_bfwd['ledgerid'][$i] . "' OR drid='" . $receivables_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables_bfwd['ledgerid'][$i])) {
							$receivables_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receivables_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$account_payables_bfwd['ledgerid'][] = 629;
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=629 ");
				while ($row = mysqli_fetch_assoc($res)) {
					$account_payables_bfwd['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($account_payables_bfwd['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $account_payables_bfwd['ledgerid'][$i] . "' OR drid='" . $account_payables_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $account_payables_bfwd['ledgerid'][$i])) {
							$account_payables_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$account_payables_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				$cash_bal_bfwd = floatval(array_sum($cash_trans_bfwd['tdr'])) - floatval(array_sum($cash_trans_bfwd['tcr']));
				$bank_bal_bfwd = floatval(array_sum($bank_trans_bfwd['tdr'])) - floatval(array_sum($bank_trans_bfwd['tcr']));
				$receivables_bal_bfwd = floatval(array_sum($receivables_bfwd['tdr'])) - floatval(array_sum($receivables_bfwd['tcr']));
				$account_payables_bal_bfwd = floatval(array_sum($account_payables_bfwd['tcr'])) - floatval(array_sum($account_payables_bfwd['tdr']));
				$totalBalBFwd = floatval($cash_bal_bfwd) + floatval($bank_bal_bfwd) + floatval($receivables_bal_bfwd) - floatval($account_payables_bal_bfwd);

				$surplus = floatval($net_assets) - abs(floatval($totalBalBFwd));

				$output .= '<tr>
                        <th colspan="2" style="text-align:left;"> Balance brought forward </th>
                        <th style="text-align:center;">' . number_format(floatval($totalBalBFwd), 2, '.', ',') . '</th>
                        <th style="text-align:center;display:none;"></th>
                    </tr>';
				$output .= '<tr>
                        <th colspan="2" style="text-align:left;">Period Surplus / Deficit</th>';
				$output .= '<th style="text-align:center;">' . number_format(floatval($surplus), 2, '.', ',') . '</th>';
				$output .= '<th style="text-align:center;display:none;"></th>
                    </tr>';
				$output .= '<tr style="height:26px;">
                      <th colspan="2" style="text-align:left;"></th>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;display:none;"></td>
                  </tr>';
				$output .= '</tbody>
              <tfoot>
                  <tr>
                      <th style="text-align:left;" colspan="2">NET FINANCIAL POSITION</th>';
				$output .= '<th style="text-align:center;">' . number_format(floatval($net_assets), 2, '.', ',') . '</th>';
				$output .= '<th style="text-align:center;display:none;"></th>
                  </tr>              
              </tfoot>
            </table>
          </div>';

				$output .= '
				</body>
		</html>';



				die($output);



				break;


case 28:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
$fname=strtolower($date).'_inpatients_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">INPATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong><br/><strong style="font-size:12px">Ward:<?php  echo $name ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">Pat ID</td>
        <td  style="width:25%;">Name</td>
         <td  style="width:15%;">Adm. Date</td>
          <td  style="width:15%;">Ward Type</td>
        <td  style="width:15%;">Bed No</td>
        <td  style="width:19%;">Doctor</td>
    </tr>
    

<?php
if($name=='All'){
		$result =mysqli_query($db, "select * from inpatients where Admitted!=0  order by MainWard desc");
}else{
	$result =mysqli_query($db, "select * from inpatients where Admitted!=0 AND MainWard='".$name."' order by MainWard desc");	
}
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
       <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatName']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['TransDate'])) ?></td>
       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['MainWard']) ?></td>
          <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['BedNo']) ?></td>
        <td style="width:19%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Doctor']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>

	

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;
case 29:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
?>

<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">EMPLOYEES LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Emp ID</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Name</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Dept</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Phone No</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Attendance</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Salary</p>
</div>
</div>
<?php
	$result =mysqli_query($db, "select * from employee where status=1");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'">';
	}
	
	?>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['emp']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['name']).','. stripslashes($row['oname'])?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['dept']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['phone']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
 <?php
		if(stripslashes($row['totattendance'])!=0){
        $a=stripslashes($row['attendance']) / stripslashes($row['totattendance']);
		$a=round($a,2)*100;
		$a=$a.'%';
		}else $a='0%';
		?>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $a ?></p>
</div>
<div>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));</script></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 30:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$user=$_GET['user'];
// $timer1=$_GET['timer1'];
// $timer2=$_GET['timer2'];



?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">SYSTEM ACTIVITY LOG<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php } ?>

<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Time</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Username</p>
</div>

<div>
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Activity</p>
</div>
</div>
<?php


	if($code==1){
				if($d1==0){
				$result =mysqli_query($db, "select * from log where status=1");
				}
				else{
				$result =mysqli_query($db, "select * from log  where stamp>='".$d1."' and stamp<='".$d2."' and status=1");
				}
	
	}
	else if($code==2){
			if($d1==0){
			$result =mysqli_query($db, "select * from log where status=1 and username='".$user."'");
			}
			else{
			$result =mysqli_query($db, "select * from log  where stamp>='".$d1."' and stamp<='".$d2."' and status=1 and username='".$user."'");
			}
	}
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'">';
	}
	
	?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['date']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['time'])?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['username']) ?></p>
</div>
<div>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['activity']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 31:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname='patients_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ALL PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">Pat ID</td>
        <td  style="width:25%;">Name</td>
        <td  style="width:15%;">Gender</td>
         <td  style="width:15%;">Age</td>
       <td  style="width:15%;">Date of Creation</td>
        <td  style="width:19%;">Phone No</td>
    </tr>    
<?php

	if($d1==0){
	$result =mysqli_query($db, "select * from patients where status=1");
	}else{
	$result =mysqli_query($db, "select * from patients where status=1 and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	

	
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['pntno']) ?></td>
       <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  stripslashes($row['name']).' '. stripslashes($row['oname']).' '. stripslashes($row['lname']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gender']) ?></td>
       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo date('Y')-substr(stripslashes($row['dob']),-4,4)?></td>
          <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stamptodate(stripslashes($row['stamp']) )?></td>
        <td style="width:19%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['contact']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>	
	
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;


case 31.1:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname='patients_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CCC PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">Pat ID</td>
        <td  style="width:25%;">Name</td>
        <td  style="width:15%;">Gender</td>
         <td  style="width:15%;">Age</td>
       <td  style="width:15%;">Date of Creation</td>
        <td  style="width:19%;">Phone No</td>
    </tr>    
<?php

	if($d1==0){
	$result =mysqli_query($db, "select * from cccpats where status=1");
	}else{
	$result =mysqli_query($db, "select * from cccpats where status=1 and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	

	
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['pntno']) ?></td>
       <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  stripslashes($row['names']) ?></td>
      <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gender']) ?></td>
       <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo date('Y')-substr(stripslashes($row['dob']),-4,4)?></td>
          <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stamptodate(stripslashes($row['stamp']) )?></td>
        <td style="width:19%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['phone']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>	
	
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 31.2:
$date=date('d/m/Y');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname='patients_list';
$name=$_GET['name'];
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CCC CONSULTATION REPORTS<br/><strong style="font-size:12px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
   		
   		<td  style="width:4%">Date</td>
   		<td  style="width:4%">Cons.ID</td>
   		<td  style="width:4%">Pat ID</td>
        <td  style="width:10%">Patient Name</td>
         <td  style="width:4%">Temp</td>
        <td  style="width:4%">BP</td>
         <td  style="width:4%">Weight</td>
         <td  style="width:4%">P/R</td>
          <td  style="width:4%">B/R</td>
         <td  style="width:7%">History</td>
         <td  style="width:7%">Diagnosis</td>
         <td  style="width:8%">Lab</td>
         <td  style="width:7%">Nutr.</td>
          <td  style="width:7%">Counselling.</td>
        <td  style="width:10%">Prescription</td>


    </tr>    
<?php


	if($name=='All'){
			if($d1==0){
			$result =mysqli_query($db, "select * from cccpresc where Status=1");
			}else{
			$result =mysqli_query($db, "select * from cccpresc where Status=1 and  Stamp>='".$d1."' and Stamp<='".$d2."'");
			}
	}
	else{

			if($d1==0){
			$result =mysqli_query($db, "select * from cccpresc where Status=1 and PatId='".$name."'");
			}else{
			$result =mysqli_query($db, "select * from cccpresc where Status=1 and  Stamp>='".$d1."' and Stamp<='".$d2."'  and PatId='".$name."'");
			}

	}


	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	

if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['TransDate']) ?></td>
   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PrescId']) ?></td>
   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatName']) ?></td>
   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Temp']) ?></td>
   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Bp']) ?></td>
   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Weight']) ?></td>
   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PulseRate']) ?></td>
   		<td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['BreathRate']) ?></td>
   		<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['History']) ?></td>
   		<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Diagnosis']) ?></td>
   		<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Lab']) ?></td>
   		<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Nutrition']) ?></td>
   		<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Counselling']) ?></td>
   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Prescription']) ?></td>
   		
   		
   		
   		
     
    </tr>


<?php } ?>

</tbody>
</table>	
	
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>

</div>
<?php 

break;


case 32:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
?>

<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL DEBTORS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cus ID</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Name</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Credit Limit</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Remaining Credit</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Balance</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Tel</p>
</div>
</div>
<?php
	$a=0;
	$result =mysqli_query($db, "select * from creditcustomers");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Bal']));
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'">';
	}
	
	?>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['CustomerId']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['CustomerName'])?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['CreditLimit']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['RemainingCredit']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['Bal']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Tel']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Balance: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 33:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
?>

<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL CREDITORS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cus ID</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Name</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Bal</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Tel</p>
</div>
</div>
<?php
	$a=0;
	$result =mysqli_query($db, "select * from creditsuppliers");
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['Bal']));
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'">';
	}
	
	?>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['CustomerId']) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['CustomerName'])?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['Bal']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Tel']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Balance: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;
case 34:

$date=date('Y/m/d');
$insid=$_GET['name'];
$code=$_GET['code'];

if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
	$result =mysqli_query($db, "select * from inscompanies where id='".$insid."'");
	$row=mysqli_fetch_array($result);
	$name=stripslashes($row['name']);
?>

<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL insurance ENTRIES REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $name ?></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:115px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>
<div style="width:330px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Patient Name</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Ins. Amount</p>
</div>
</div>
<?php

	if($code==1){
	$result =mysqli_query($db, "select * from sales where Instatus=1 and Insid='".$insid."'");
	}
	else{
	$result =mysqli_query($db, "select * from  sales where Instatus=1 and Insid='".$insid."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
	$arr=array();
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$arr[]=stripslashes($row['RcptNo']);
	}
	$arr = array_unique($arr);
$i=0;$f=0;
foreach ($arr as $key => $val) {
	$result =mysqli_query($db, "select * from sales where RcptNo='".$val."'");
	$row=mysqli_fetch_array($result);
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:115px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Date']) ?></p>
</div>
<div style="width:330px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ClientName']) ?></p>
</div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['Insamount']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<?php $i++;$f+=preg_replace('~,~', '', stripslashes($row['Insamount']));} ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Insurance Amount: <script>document.writeln(( <?php  echo $f ?>).formatMoney(2, '.', ','));</script></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 35:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>

<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DEATHS REPORTS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Name</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">T.O.D</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">D.O.D</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cause</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Confirmed By</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Other Details</p>
</div>
</div>
<?php
	if($code==1){
	$result =mysqli_query($db, "select * from deathsregister");
	}
	else{
	$result =mysqli_query($db, "select * from  deathsregister where Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
	?>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['patname']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['tod'])?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['dod'])) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden"  title="<?php  echo stripslashes($row['cod']) ?>">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['cod']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['confirmed']) ?></p>
</div>
<div style="width:135px;height:20px;overflow:hidden" title="<?php  echo stripslashes($row['odetail']) ?>">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['odetail']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 36:
$pid=safe_decode($_GET['rcptno']);
$prescid=safe_decode($_GET['pid']);
$clientid=safe_decode($_GET['cid']);
$clientno=safe_decode($_GET['cno']);
$result =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' and old_in_presc_id='".$prescid."' and old_in_patient_id='".$clientid."' and patid='".$clientno."'");
$row=mysqli_fetch_array($result);
$pntno=stripslashes($row['patid']) ;
?>
<div style="width:98%;min-height:220px; border:2px solid #333;padding:0 5px">
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:20px; font-weight:normal; text-transform:uppercase;line-height: 1.0;letter-spacing: 1px;
}
</style>
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:26px; font-weight:normal;margin:0 0 0 0px"><?php  echo $comname2 ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:26px; font-weight:normal;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:18px; font-weight:normal;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:18px; font-weight:normal;margin:0 0 0 0px">OFFICIAL DRUG PRESCRIPTION<br/>
Date:<?php  echo date('d/m/Y'); ?></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>
<div style="clear:both; "/>
<?php 
		$result2 =mysqli_query($db, "select auto,insurer from patients where auto='".$clientid."'");
		$row2=mysqli_fetch_array($result2);
		$paymode=stripslashes($row2['insurer']);
?>
<p style="text-align:center;font-size:20px; text-align:center">Patient Name:<?php  echo stripslashes($row['patname']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient No:	<?php  echo stripslashes($row['patid']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment Mode:	<?php  echo stripslashes($row2['insurer']) ?></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>
<p style="text-align:center;font-size:20px; margin-left:10px; font-weight:bold;text-align:left">Rx:</p>

<?php  

$qry254 =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$clientid."' group by prescid");
$qry=mysqli_fetch_array($qry254);
$transdate=stripslashes($qry['date']);
$pharmtime=stripslashes($qry['reqtime']);
$prescribedBy=stripslashes($qry['requested']);
echo'<div style="width:500px;">';
  echo'<a class="labels" style="margin-top:10px;margin-bottom:5px">Date: <b>'.$transdate.'</b>&nbsp;&nbsp;&nbsp; Time: <b>'.$pharmtime.'</b></a><div class="cleaner_h5"></div>';
	 	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$clientid."' order by id");
		$num_resultsb = mysqli_num_rows($resultb);	
		$xa=1;	
		for ($i=0; $i <$num_resultsb; $i++) {
			$rowb=mysqli_fetch_array($resultb);		
			$pharmitems=stripslashes($rowb['itname']);
			$brk='</br>';
			echo '<a class="labels"> '.$xa.'. '.stripslashes($rowb['prescription']).''.$brk.'</a>';
			$xa++;
		}
  echo'<div class="cleaner_h10"></div>';
  echo'<a class="labels" style="margin-top:10px;margin-bottom:5px">Prescribed By: <b>'.$prescribedBy.'</b></a>';
 echo'</div>';


?>

</div>



<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:20px;margin-top:4px"></div>
<div style="clear:both; margin-bottom:20px;border-top:1px dashed #333; "></div>
<p style="text-align:center;font-size:18px; margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:18px; font-weight:normal;margin:0 0 0 0px">Printed By <?php  echo $username ?>.</p>
<p style="text-align:center;font-weight:normal;margin:0 0 0 0px">System Developers: Www.BetterHealth.Co.Ke</p>
<div style="clear:both;margin-top:10px "></div>
</div>
<?php 
break;
case 37:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>

<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">BIRTHS REPORTS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Name</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">T.O.B</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">D.O.B</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Mother</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Doctor</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Other Details</p>
</div>
</div>
<?php
	if($code==1){
	$result =mysqli_query($db, "select * from birthsregister");
	}
	else{
	$result =mysqli_query($db, "select * from  birthsregister where Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
	?>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['name']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['tob'])?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['dob'])) ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['mom']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['doctor']) ?></p>
</div>
<div style="width:135px;height:20px;overflow:hidden" title="<?php  echo stripslashes($row['odetail']) ?>">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['odetail']) ?></p>
</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;
case 38:
$pid=$_GET['rcptno'];
$result =mysqli_query($db, "select * from labrequests where Id='".$pid."'");
if($pid==0){
$result =mysqli_query($db, "select * from labrequests where pid=0 order by Id desc limit 0,1");
}
$row=mysqli_fetch_array($result);
$test=stripslashes($row['request']);
$res=stripslashes($row['results']);
$patient=stripslashes($row['patname']);
$patid=stripslashes($row['patid']);
$labno=stripslashes($row['labno']);
$unique=stripslashes($row['unique_no']);
?>
<div style="width:740px;min-height:800px; border:2px solid #333;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;">

<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:normAL;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>OFFICIAL LABORATORY ANALYSIS</strong><br/>
<strong style="font-size:12px">Date:<?php  echo date('d/m/Y'); ?></strong></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>
<div style="clear:both; "/>

<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:center"><strong>Patient Name: </strong><?php  echo $patient ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Patient No: </strong><?php  echo $patid ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Lab No: </strong><?php  echo $unique ?></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>

<p style="text-align:center; text-transform:uppercase;font-size:14px; margin-left:10px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:left">Lab Tests:</p>

<p style="font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;float:left; margin-left:10px">
<?php  echo $test ?> </p>
<div style="clear:both;"></div>

<p style="text-align:center;text-transform:uppercase;font-size:14px; margin-left:10px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:left">Lab Results:</p>
<p style="font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;float:left; margin-left:10px">
<?php  echo $res ?> </p>

</div>



<div style="clear:both; margin-bottom:20px;border-top:1px dashed #333; "></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Requested :By <?php  echo stripslashes($row['requested']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign............................................Date.............................</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Done By: <?php  echo stripslashes($row['doneby']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign............................................Date.............................</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Verified By:.....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign............................................Date.............................</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin-top:150px">System Developers: betterhealth.co.ke</p>

<div style="clear:both; margin-bottom:10px"></div>
</div>

<?php 
break;
case 39:
$pid=$_GET['rcptno'];
$result =mysqli_query($db, "select * from radrequests where id='".$pid."'");
if($pid==0){
$result =mysqli_query($db, "select * from radrequests where pid=0 order by id desc limit 0,1");
}
$row=mysqli_fetch_array($result);
$test=stripslashes($row['request']);
$res=stripslashes($row['results']);
$patient=stripslashes($row['patname']);
$patid=stripslashes($row['patid']);
?>
<div style="width:740px;min-height:800px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:normAL;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>OFFICIAL RADIOLOGY ANALYSIS</strong><br/>
<strong style="font-size:12px">Date:<?php  echo date('d/m/Y'); ?></strong></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>
<div style="clear:both; "/>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:center"><strong>Patient Name: </strong><?php  echo $patient ?></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>

<p style="text-align:center;font-size:14px; margin-left:10px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:left">Radiology Tests:</p>

<p style="font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;float:left; margin-left:10px">
<?php  echo $test ?> </p>
<div style="clear:both;"></div>

<p style="text-align:center;font-size:14px;text-transform:uppercase; margin-left:10px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:left">Radiology Results:</p>
<p style="font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;float:left; margin-left:10px">
<?php  echo $res ?> </p>


</div>



<div style="clear:both; margin-bottom:20px;border-top:1px dashed #333; "></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Requested By <?php  echo stripslashes($row['requested']) ?>.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Submitted By <?php  echo stripslashes($row['doneby']) ?>.</p>
</div>
<?php 
break;

case 39.1:
$pid=$_GET['rcptno'];
$result =mysqli_query($db, "select * from theatrequests where prescid='".$pid."'");
$row=mysqli_fetch_array($result);
$test=stripslashes($row['procedures']);
$res=stripslashes($row['notes']);
$patient=stripslashes($row['patname']);
$patid=stripslashes($row['patid']);
?>
<div style="width:740px;min-height:800px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:normAL;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>OFFICIAL THEATRE ANALYSIS</strong><br/>
<strong style="font-size:12px">Date:<?php  echo date('d/m/Y'); ?></strong></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>
<div style="clear:both; "/>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:center"><strong>Patient Name: </strong><?php  echo $patient ?></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-top:10px"></div>

<p style="text-align:center;font-size:14px; margin-left:10px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:left">Theatre Procedures:</p>

<p style="font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;float:left; margin-left:10px">
<?php  echo $test ?> </p>
<div style="clear:both;"></div>

<p style="text-align:center;font-size:14px;text-transform:uppercase; margin-left:10px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:left">Theatre Notes:</p>
<p style="font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;float:left; margin-left:10px">
<?php  echo $res ?> </p>


</div>



<div style="clear:both; margin-bottom:20px;border-top:1px dashed #333; "></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Requested By <?php  echo stripslashes($row['requested']) ?>.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Submitted By <?php  echo stripslashes($row['doneby']) ?>.</p>
</div>
<?php 
break;

case 40:

$date=date('Y/m/d');
$regn=safe_decode($_GET['regn']);
$patientid=safe_decode($_GET['cid']);
$prescid=safe_decode($_GET['pid']);
if(isset($_GET['categ'])){
$categ=$_GET['categ'];
}else {$categ=0;}

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL PATIENT BILL<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></p>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date-Time</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Department</p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit Price</p>
</div>
<div style="width:70px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Qty</p>
</div>
<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Price</p>
</div>

<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Cost</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Username</p>
</div>
</div>
<?php
$b=0;$c=0;$e=0;
$patname='PATIENT';
if(($usertype=='Cssd'||$usertype=='Admin'||$usertype=='Accounts'||$usertype=='Recep'||$usertype=='Pharm')&&$categ!='0'){
$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' and category='".$categ."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$patientid."' and itcode NOT IN('84') and status!=4 ");	#order_status!='paid'
}
else if(($usertype=='Cssd'||$usertype=='Admin'||$usertype=='Accounts'||$usertype=='Recep'||$usertype=='Pharm')&&$categ=='0'){
$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$patientid."' and status!=4 and itcode NOT IN('84')");	
}
else{
$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' and category='".$userdep."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$patientid."' and status!=4 and itcode NOT IN('84') ");# and itcode NOT IN('84')
}
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$patname=stripslashes($row['patname']) ;
$e+=preg_replace('~,~', '', stripslashes($row['total']));
	$b+=preg_replace('~,~', '', stripslashes($row['disc']));
	$c+=preg_replace('~,~', '', stripslashes($row['subnet']));


if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['date']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['category']) ?></p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['itname']) ?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['price']) ?>).formatMoney(2, '.', ','));</script></p></div>

<div style="width:70px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['quat']) ?></p></div>

<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['total']) ?></p></div>


<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['subnet']) ?></p></div>


<div   style="overflow:hidden">
<p style="text-align:center;font-size:11px;height:20px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['fullname']) ?></p>
</div>
</div>
<?php } ?>



<div style="clear:both; margin-bottom:20px"></div>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patient Name: <?php  echo $patname?></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Cost: <script>document.writeln(( <?php  echo $e ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Discount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Net Cost: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery. We are now SHIF Accredited.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
</div>
<?php 

break;

case 41:

$date=date('Y/m/d');
$bal=$_GET['bal'];
?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK BALANCE REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<div style="clear:both; margin-bottom:10px"></div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:500px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>

<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Stock Balance</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from items  where Type='GOOD' and Bal<".$bal." and Bal!=0 order by ItemName");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);


if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:500px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Bal']) ?></p>
</div>
</div>
<?php } ?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 

break;

case 42:

$date=date('Y/m/d');
$a=$_GET['reg'];
$regn=$_GET['regn'];
if(isset($_SESSION[$a])){
$max=count($_SESSION[$a]);
if($a=='nurse'){
$result = mysqli_query($db, "DELETE from daycare where patid='".$regn."'");	
for ($i = 0; $i < $max; $i++){
							$itcode = $_SESSION[$a][$i][0];
							$itname = $_SESSION[$a][$i][1];
							$itquat = $_SESSION[$a][$i][2];
							$itprice = $_SESSION[$a][$i][3];
							$tprice = $_SESSION[$a][$i][4];
							$oname = $_SESSION[$a][$i][5];
							$regn = $_SESSION[$a][$i][6];
							$categ = $_SESSION[$a][$i][7];
							$total = $_SESSION[$a][$i][8];
							$disc = $_SESSION[$a][$i][9];
							$subn = $_SESSION[$a][$i][10];
							$date = $_SESSION[$a][$i][11];
							$iid = $_SESSION[$a][$i][12];
							$resulta = mysqli_query($db, "insert into daycare values('','".$regn."','".$oname."','".$itcode."','".$itname."','".$categ."','".$itprice."',
							'".$itquat."','".$tprice."','".$disc."','".$subn."','".$date."','".$iid."')");
							}
}




?>

<div style="width:1140px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL PATIENT BILL<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>Patient Name:<?php  echo $oname ?></strong></p>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date-Time</p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit Price</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Quantity</p>
</div>
<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Price</p>
</div>
<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Discount</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Cost</p>
</div>
</div>
<?php
$b=0;$c=0;$e=0;
for ($i = 0; $i < $max; $i++){
	$e+=preg_replace('~,~', '', $_SESSION[$a][$i][4]);
	$b+=preg_replace('~,~', '', $_SESSION[$a][$i][9]);
	$c+=preg_replace('~,~', '', $_SESSION[$a][$i][10]);
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $_SESSION[$a][$i][11] ?></p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $_SESSION[$a][$i][1] ?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo$_SESSION[$a][$i][3] ?>).formatMoney(2, '.', ','));</script></p></div>

<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $_SESSION[$a][$i][2] ?></p></div>

<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $_SESSION[$a][$i][4] ?></p></div>

<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $_SESSION[$a][$i][9] ?>).formatMoney(2, '.', ','));</script></p></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $_SESSION[$a][$i][10] ?></p>
</div>
</div>
<?php } 
	

?>



<div style="clear:both; margin-bottom:20px"></div>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patient Name: <?php  echo $_SESSION[$a][0][5] ?></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Cost: <script>document.writeln(( <?php  echo $e ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Discount: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Net Cost: <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
</div>
<?php 

unset($_SESSION[$a]);
}
break;

case 43:

$date=date('Y/m/d');
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL DEPOSITS REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo  dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>

<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pat ID</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Dr.</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cr.</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">UserName</p>
</div>
</div>
<?php
if($d1==0){
	$result =mysqli_query($db, "select * from deposits");
	}
	else{
	$result =mysqli_query($db, "select * from deposits  where  stamp>='".$d1."' and stamp<='".$d2."'");
	}
$a=0;$b=0;
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
if(stripslashes($row['drcr'])=='dr'){
$a+=preg_replace('~,~', '', stripslashes($row['amount']));
}
if(stripslashes($row['drcr'])=='cr'){
$b+=preg_replace('~,~', '', stripslashes($row['amount']));
}
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
	}
?>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['date']) ?></p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['patname']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['patid']) ?></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<?php if(stripslashes($row['drcr'])=='dr'){ ?>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></p>
<?php } ?></div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<?php if(stripslashes($row['drcr'])=='cr'){ ?>
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></p>
<?php } ?></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['username']) ?></p>
</div>
</div>
<?php
	}

?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Debits: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Credits: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Net: <script>document.writeln(( <?php  echo $a-$b ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 44:
$result =mysqli_query($db, "select * from deposits where rcptNo='".$rcptno."'");
$row=mysqli_fetch_array($result);

$cname=stripslashes($row['patname']);
$patid=stripslashes($row['patid']);
$d=stripslashes($row['date']);
$amount=stripslashes($row['amount']);
?>
<div style="width:1100px;min-height:370px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Courier New', Courier, monospace;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Courier New', Courier, monospace;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Courier New', Courier, monospace;margin:0 0 0 0px">OFFICIAL RECEIPT<br/><strong style="font-size:12px">Date:<?php  echo $d ?><br/> Receipt No: <?php  echo $rcptno ?><br/>Patient Name: <?php  echo $cname ?></strong></p>
<div style="clear:both; margin-bottom:10px; border-bottom:2px dotted #333"></div>

<div style="clear:both; margin-bottom:50px"></div>
<p style="padding-top:4px;text-align:center;font-size:12px; font-weight:bold;font-family:'Courier New', Courier, monospace;margin:0 0 0 0px">Amount deposited:<script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></a>





<div style="clear:both; margin-bottom:100px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Courier New', Courier, monospace;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Courier New', Courier, monospace;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>
<?php 
break;


case 45:
echo $rcptno;
$a='cart';
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."'");
$row=mysqli_fetch_array($result);
$cid=stripslashes($row['ClientId']);

if(isset($_SESSION[$a])){
$max=count($_SESSION['cart']);
							for ($i = 0; $i < $max; $i++){
							$cname = $_SESSION['cart'][$i][9];
							$freq = $_SESSION['cart'][$i][14];
							$route = $_SESSION['cart'][$i][15];
							$duration = $_SESSION['cart'][$i][16];
							$dosage= $_SESSION['cart'][$i][17];
							$date= $_SESSION['cart'][$i][8];

?>
<body>
<div style="width:280px;height:140px; border:2px solid #333; margin-bottom:10px">
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Courier New', Courier, monospace;margin:5px 0 0 0px"><strong style="font-size:14PX"><?php  echo $comname ?></strong> <br/><strong>DATE:</strong><?php  echo dateprint($date) ?><br/><strong>Ref No:</strong><?php  echo $rcptno ?><br/><strong>NAME:</strong><?php  echo $cname ?><br/><strong>PNT. No:</strong><?php  echo $cid ?><br/><strong>DOSAGE</strong>: <?php  echo $dosage ?><br/><strong>ROUTE:</strong> <?php  echo $route ?><br/><strong>FREQUENCY:</strong> <?php  echo $freq ?><br/><strong>DURATION: </strong><?php  echo $duration ?></p>
</div>
</body>
<?php 
}
}
unset($_SESSION['cart']);
break;
case 46:
function loop11($row,$i){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0"  id="normal'.$i.'">';
	}
?>
<div style="width:85px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['date']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['branchname']) ?></p>
</div>
<div style="width:230px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['itemname']) ?></p>
</div>

<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['qty']) ?></p></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['details']) ?></p>
</div>
</div>

<?php }
$date=date('Y/m/d');
$code=$_GET['code'];
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$result = mysqli_query($db, "insert into log values('0','".$username." accesses Stock usage Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

?>

<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK USAGE REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?php if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Branch:&nbsp;&nbsp;<?php  echo $_GET['name'] ?></p>
<?php } 
 if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:85px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Branch</p>
</div>
<div style="width:230px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Quantity</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Details</p>
</div>
</div>
<?php
if($d1==0){
	$result =mysqli_query($db, "select * from stockuse where Branchname='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from stockuse  where Branchname='".$name."' and stamp>='".$d1."' and stamp<='".$d2."'");
	}
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	loop11($row,$i);
	}
	
?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 

break;

case 47:

$date=date('Y/m/d');
?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK BALANCE REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>



<div style="clear:both; margin-bottom:10px"></div>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Procurement</p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Office</p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Kitchen</p>
</div>
<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Laboratory</p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Radiology</p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pharmacy</p>
</div>
<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Theatre</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Nursing/Ward</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from items  where Type='GOOD'  order by Category,ItemName");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Bal']) ?></p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Office']) ?></p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Kitchen']) ?></div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Laboratory']) ?></div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Radiology']) ?></p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo stripslashes($row['Pharmacy']) ?></p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;overflow:hidden">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Theatre']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Nursing']) ?></p>
</div>
</div>
<?php } ?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 

break;

case 48:
$section=$_GET['section'];
$categ=$_GET['categ'];
$code=$_GET['code'];
$fname=strtolower($rcptno).'_stock_valuation';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VALUATION REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>
<?php
if($code==0){
echo 'Dept:'.$rcptno.'<br/>Section:All';	
}
else if($code==1){
echo 'Dept:'.$rcptno.'<br/>Section:'.$section.'<br/>Category:All';		
}else{echo 'Dept:'.$rcptno.'<br/>Section:'.$section.'<br/>Category:'.$categ.'';	}
?>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:40%;">Item Name</td>
        <td  style="width:12%;">Pack Size</td>
        <td  style="width:12%;">Unit</td>
       <td  style="width:12%;">Part</td>
        <td  style="width:23%;">Total</td>
    </tr>

<?php
if($rcptno=='PROCUREMENT'){$x='Bal';}else {$x=$rcptno;}	
if($code==0){
	$result =mysqli_query($db, "select * from items where Type='GOOD' and ".$x." >0 order by ItemName asc,Category asc");
}
else if($code==1){
	$result =mysqli_query($db, "select * from items where Type='GOOD' and ".$x." >0  and Category='".$section."' order by ItemName asc,Category asc");
}
else if($code==2){
	$result =mysqli_query($db, "select * from items where Type='GOOD'  and ".$x." >0 and Category='".$section."' and SubCategory='".$categ."' order by ItemName asc,Category asc,SubCategory asc");
}

$j=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$pack=stripslashes($row['Pack']) ;
$qty=stripslashes($row[$x]);
$part=$qty%$pack;
$unit=explode('.',($qty/$pack));
$unit=$unit[0];
$total=$qty*stripslashes($row['PurchPrice']);
$j+=$total;


if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ItemName']) ?></td>
       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Pack']) ?></td>
      <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $unit ?></td>
          <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $part ?></td>
        <td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Valuation: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 49:
$section=$_GET['section'];
$categ=$_GET['categ'];
$code=$_GET['code'];
$fname=strtolower($rcptno).'_stock_sheet';
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK SHEET REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>
<?php
if($code==0){
echo 'Dept:'.$rcptno.'<br/>Section:All';	
}
else if($code==1){
echo 'Dept:'.$rcptno.'<br/>Section:'.$section.'<br/>Category:All';		
}else{echo 'Dept:'.$rcptno.'<br/>Section:'.$section.'<br/>Category:'.$categ.'';	}
?>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:16%;">Category</td>
        <td  style="width:32%;">Item Name</td>
        <td  style="width:16%;">Pack Size</td>
       <td  style="width:18%;">Unit</td>
        <td  style="width:18%;">Part</td>
    </tr>

<?php
if($rcptno=='PROCUREMENT'){$x='Bal';}else {$x=$rcptno;}	
if($code==0){
	$result =mysqli_query($db, "select * from items where Type='GOOD'  order by ItemName asc,Category asc");
}
else if($code==1){
	$result =mysqli_query($db, "select * from items where Type='GOOD' and Category='".$section."' order by ItemName asc,Category asc");
}
else if($code==2){
	$result =mysqli_query($db, "select * from items where Type='GOOD' and Category='".$section."' and SubCategory='".$categ."' order by ItemName asc,Category asc,SubCategory asc");
}
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$pack=stripslashes($row['Pack']) ;

if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:16%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['SubCategory']) ?></td>
       <td style="width:32%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ItemName']) ?></td>
      <td style="width:16%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Pack']) ?></td>
          <td style="width:18%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
        <td style="width:18%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
    </tr>


<?php } ?>

</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 50:
$result =mysqli_query($db, "select * from variance where vno='".$rcptno."'");
$row=mysqli_fetch_array($result);
$dept=stripslashes($row['dept']) ;
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VARIANCE REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>Variance Report No:  <?php  echo $rcptno ?><br/>Dept:  <?php  echo $dept ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item Name</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Pack Size</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Unit(Before)</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Part(Before)</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Unit(After)</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Part(After)</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Variance</p>
</div>
</div>
<?php
$j=0;
$result =mysqli_query($db, "select * from variance where vno='".$rcptno."'");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pack=stripslashes($row['pack']) ;
								$bala=stripslashes($row['bala']) ;
								$balb=stripslashes($row['balb']) ;
								$total=stripslashes($row['total']) ;
								
								$parta=$bala%$pack;
								$unita=explode('.',($bala/$pack));
								$unita=$unita[0];
								
								$partb=$balb%$pack;
								$unitb=explode('.',($balb/$pack));
								$unitb=$unitb[0];
								
								$j+=$total;
							
								
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['itemname']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['pack']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $unita ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $parta ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $unitb ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $partb ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Monetary Variance: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo stripslashes($row['username']) ; ;
?>.</p>
</div>
<?php 

break;

case 51:
$result =mysqli_query($db, "select * from goodsreturned where gnrno='".$rcptno."'");
$row=mysqli_fetch_array($result);
$sname=stripslashes($row['sname']);
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL GOODS RETURNED NOTE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>SUPPLIER:  <?php  echo $sname ?><br/>GRN No:  <?php  echo $rcptno ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Batch</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Pack Size</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Unit</p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Part</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Price</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from goodsreturned where gnrno='".$rcptno."' order by itemname");
$num_results = mysqli_num_rows($result);
$q=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$q+=stripslashes($row['total']);
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>


<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['itemname']) ?></p>
</div>
<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['batch']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['pack']) ?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['unit']) ?></p>
</div>
<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['part']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['pprice']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <script>document.writeln(( <?php  echo stripslashes($row['total']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Amount: <script>document.writeln(( <?php  echo $q ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 52:
$result =mysqli_query($db, "select * from lpo where lpono='".$rcptno."'");
$row=mysqli_fetch_array($result);
$sname=stripslashes($row['supplier']);
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">LOCAL PURCHASE ORDER</p>
<p style="font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:20px 10px 0px 10px">
<strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong>
<strong style="font-size:11px; margin-left:20%">SUPPLIER:  <?php  echo $sname ?></strong>
<strong style="font-size:11px; margin-right:10px; float:right">LPO No:  <?php  echo $rcptno ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">No.</p>
</div>

<div style="width:560px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Pack Size</p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Unit</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Price</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from lpo where lpono='".$rcptno."' order by itemname");
$num_results = mysqli_num_rows($result);
$q=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$q+=stripslashes($row['total']);
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo $i+1 ?></p>
</div>
<div style="width:560px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['itemname']) ?></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['pack']) ?></p>
</div>
<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['unit']) ?></p>
</div>

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['price']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['total']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Amount: KShs. <script>document.writeln(( <?php  echo $q ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">PREPARED BY:..................................... SIGN:......................</br/></br/>
AUTHORIZED BY:CHIEF ACCOUNTANT  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;      SIGN:......................  </br/></br/>
APPROVED BY:ADMINISTRATOR    &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;       SIGN:...................... 
</p><div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:left;font-size:14px; text-decoration:underline; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px">TERMS & CONDITIONS</p>
<p style="text-align:left;font-size:11px;font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px">
1. ALL PRICES ARE INCLUSIVE OF TAXES AND VAT WHERE APPLICABLE.<BR/>
2. LPO EXPIRES WITHIN 45 DAYS.<br/>
3. PLEASE QUOTE THIS ORDER No. ON ALL INVOICES AND DELIVERY NOTES.<br/>
4. GOODS NOT IN GOOD CONDITION WILL BE RETURNED.<br/>
5. MEDICINES HAVING INCORRECT BATCH NUMBER WILL NOT BE RECEIVED.<br/>
6. ALL CONSIGNMENTS ARE SUBJECT TO INSPECTION.<br/>
7. GOODS EXPIRING IN THE NEXT 6 MONTHS WILL BE RETURNED.</p>
<div style="clear:both; margin-bottom:20px"></div>
</div>
<?php 
break;

case 53:

$date=date('d/m/Y');
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

function loop13($i,$a,$b,$c,$d,$e,$f){
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;" id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#D1D1D1 "  id="normal'.$i.'">';
	}
?>

<div style="width:125px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<?php  echo dateprint($a)?></p>
</div>

<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $b ?></p></div>

<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $d?></p>
</div>
<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $c ?></p></div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $e ?>).formatMoney(2, '.', ','));</script></p></div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $f?></p>
</div>
</div>
<?php }
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL GOODS RECEIVED INVOICE LISTING REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?></strong></p>
<div style="clear:both"></div>
<?PHP
 if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full  Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:125px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans Date</p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Supplier</p>
</div>
<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Invoice No</p>
</div>
<div style="width:170px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">GRN No.</p>
</div>
<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">UserName</p>
</div>
</div>
<?php




$pos=array(array());
if($d1==0){
	$total=0;
			$result =mysqli_query($db, "select * from purchases");
			$arr=array();
			$num_results = mysqli_num_rows($result);
			for ($i=0; $i <$num_results; $i++) {
				$row=mysqli_fetch_array($result);
			$arr[stripslashes($row['PurchNo'])]= stripslashes($row['TransNo']);
			}
			
			$i=0;
			foreach ($arr as $key => $val) {
			$resulta =mysqli_query($db, "select * from purchases where TransNo='".$val."'");
			$row=mysqli_fetch_array($resulta);
			loop13($i,stripslashes($row['PurchDate']),stripslashes($row['Supplier']),stripslashes($row['PurchNo']),stripslashes($row['InvoiceNo']),stripslashes($row['InvoiceAmt']),stripslashes($row['Username']));
			$i++;
			$total+=stripslashes($row['InvoiceAmt']);
			}
	}
	else{
		
			$total=0;
			$result =mysqli_query($db, "select * from purchases  where Stamp>='".$d1."' and Stamp<='".$d2."' ");
			$arr=array();
			$num_results = mysqli_num_rows($result);
			for ($i=0; $i <$num_results; $i++) {
				$row=mysqli_fetch_array($result);
			$arr[stripslashes($row['PurchNo'])]= stripslashes($row['TransNo']);
			}
			
			$i=0;
			foreach ($arr as $key => $val) {
			$resulta =mysqli_query($db, "select * from purchases where TransNo='".$val."'");
			$row=mysqli_fetch_array($resulta);
			loop13($i,stripslashes($row['PurchDate']),stripslashes($row['Supplier']),stripslashes($row['PurchNo']),stripslashes($row['InvoiceNo']),stripslashes($row['InvoiceAmt']),stripslashes($row['Username']));
			$i++;
			$total+=stripslashes($row['InvoiceAmt']);
			}
	}
	

?>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Amount: <script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></p>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 54:
$code=$_GET['code'];
$date=date('d/m/Y');
if(isset($_GET['name'])){
	$name=$_GET['name'];
}else $name='ALL';
if(isset($_GET['section'])){
	$section=$_GET['section'];
}else $section='ALL';
if(isset($_GET['categ'])){
	$categ=$_GET['categ'];
}else $categ='ALL';

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK RE-ORDER LEVEL REPORT<br/><strong style="font-size:11px">Date:
<?php  echo $date ?><br/><strong style="font-size:11px">Departmental Store:<?php  echo $userdep ?><br/>
<?php
if($code==1){
echo 'Section:All';	
}
else if($code==2){
echo 'Section:'.$section.'<br/>Category:'.$categ.'';
}else{echo'SUPPLIER:'.$name.'';}
?>
</p>
<div style="clear:both"></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">


<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pack Size</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Bal(Unit)</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Bal(Part)</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Min Bal(Unit)</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Min Bal(Part)</p>
</div>
</div>
<?php

if($userdep=='PROCUREMENT'){
	$x='Bal';
}else $x=$userdep;
$pro=array(array());
$arr=array();
	
	
if($code==1){
	$result =mysqli_query($db, "select * from items WHERE Type='GOOD'");	
}
else if($code==2){
	if($section=='All'){
		$result =mysqli_query($db, "select * from items WHERE Type='GOOD'");	
	}
	else if($section!='All'&&$categ=='All'){
		$result =mysqli_query($db, "select * from items WHERE Type='GOOD' and Category='".$section."'");
	}
	else{
		$result =mysqli_query($db, "select * from items WHERE Type='GOOD' and SubCategory='".$categ."'");
	}
	
}
else if($code==3){
	$result =mysqli_query($db, "select * from items WHERE Type='GOOD' and Supplier='".$name."'");
}

	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$itcode = stripslashes($row['ItemCode']);
	$arr[$itcode]=stripslashes($row[$x]);
	}
	foreach ($arr as $key => $val) {
	$result =mysqli_query($db, "select * from minbal  WHERE ItemCode='".$key."'");
	$row=mysqli_fetch_array($result);
			$mbal = stripslashes($row[$userdep]);
			$pack= stripslashes($row['Pack']);
				
				if($mbal>$val){
				$part=$val%$pack;
				$unit=explode('.',($val/$pack));
				$unit=$unit[0]; 
				
				$mpart=$mbal%$pack;
				$munit=explode('.',($mbal/$pack));
				$munit=$munit[0];
				$pro[]=array(stripslashes($row['ItemName']),$pack,$unit,$part,$munit,$mpart);
				}
	}
	

$max=count($pro);
for ($i=1; $i <$max; $i++) {
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>



<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $pro[$i][0] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $pro[$i][1] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $pro[$i][2] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $pro[$i][3] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $pro[$i][4] ?></p>
</div>
<div>
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $pro[$i][5]?></p>
</div>

</div>
<?php } ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 55:
$code=$_GET['code'];
$date=date('d/m/Y');
if(isset($_GET['name'])){
	$name=$_GET['name'];
}else $name='ALL';

?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INVENTORY REPORT<br/><strong style="font-size:11px">Departmental Store:<?php  echo $userdep ?><br/><strong style="font-size:11px">Date:<?php  echo $date ?><br/>SUPPLIER/DEPT:<?php  echo $name ?></strong></p>
<div style="clear:both"></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pack Size</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Part</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Purchase Price</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
if($userdep=='PROCUREMENT'){
	$x='Bal';
}else{$x=$userdep;}
if($code==1){$result =mysqli_query($db, "select * from items WHERE Type='GOOD' and ".$x." >0 order by ItemName");
	}
	else if($code==2){$result =mysqli_query($db, "select * from items WHERE Type='GOOD'  and Category='".$name."' and ".$x." >0 order by ItemName");
	}
else{
	$result =mysqli_query($db, "select * from items  WHERE Type='GOOD' and Supplier='".$name."' and ".$x." >0  order by ItemName");
	}
$num_results = mysqli_num_rows($result);
$xx=0;
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	$pack= stripslashes($row['Pack']);
	$qty= stripslashes($row[$x]);
	$total=$qty*stripslashes($row['PurchPrice']);
	$xx+=preg_replace('~,~', '', $total);
	$part=$qty%$pack;
	$unit=explode('.',($qty/$pack));
	$unit=$unit[0]; 
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>



<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Pack']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $unit ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $part ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PurchPrice']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Valuation: <script>document.writeln(( <?php  echo $xx ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 56:

$date=date('Y/m/d');
$name=$_GET['name'];
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$timer1=$_GET['timer1'];
$timer2=$_GET['timer2'];
$fname=strtolower($name).'_cashier_summary';
?>
<div style="width:100%;min-height:260px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL DAILY CASHIER SUMMARY REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;<?php  echo $timer1 ?>&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo dateprint($d2) ?>&nbsp;&nbsp;&nbsp;<?php  echo $timer2 ?></p>


<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CASHIER USER ID:<?php echo $_GET['name'];?></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
$time1=backtime($timer1);
$time2=backtime($timer2);
$d1=$d1.$time1;
$d2=$d2.$time2;
?>

<!-- <div style="clear:both; margin-bottom:10px"></div>  margin-right:10px-->

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right;margin:-40px 10px 0 0;"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div> 
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
	<td  style="width:10%;">Date</td>
	<td  style="width:6%;">Patient Id</td>
	<td  style="width:17%;">Patient Name</td>
	<td  style="width:6%;">Pay Mode</td>
	<td  style="width:10%;">Company</td>
	<td  style="width:10%;">Rcpt/InvNo</td>
	<td  style="width:10%;">Amount</td>
	<td  style="width:10%;">Time</td>
	<td  style="width:10%;">Department</td>
	<td  style="width:8%;">User Id</td>
    </tr>
    

<?php
$arr1=array();$arr2=array();$arr3=array();
	if($d1==0){
	$result =mysqli_query($db, "select * from receipts  where status!=0 and username='".$name."' AND paymode!='DMRP'");
	}
	else{
	$result =mysqli_query($db, "select * from receipts  where timestamp>='".$d1."' and timestamp<='".$d2."'  and status!=0  and username='".$name."' AND paymode!='DMRP'");
	}
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
	$x+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}

	loop56($row,$i);
	}




?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Cashier's Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash Held: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank: <script>document.writeln(( <?php  echo $x ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 57:



?>
<div style="width:740px;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; info@betterhealth.co.ke</p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL SYSTEM USERS LIST<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Dept</p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 5px">Position</p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Names</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">UserName</p>
</div>
</div>
<?php
$result =mysqli_query($db, "SELECT * FROM users WHERE name NOT IN ('MC001','MARCUS','JM002') order by dept");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 4px">
<?php  echo stripslashes($row['dept']) ?></p>
</div>
<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['position']) ?></p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['fullname']) ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['name']) ?></p>
</div>
</div>
<?php } ?>





<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <?php  echo $Motto ?>.</p>
</div>
<?php 
break;

case 58:
// $rcptno=$_GET['rcptno'];
// $old_in_presc_id=$_GET['pid'];
// $old_in_patient_id=$_GET['cid'];

$result =mysqli_query($db, "select * from  discharge where id='".$rcptno."'");
$row=mysqli_fetch_array($result);
$old_in_presc_id=stripslashes($row['old_in_presc_id']);
$old_in_patient_id=stripslashes($row['old_in_patient_id']);

$resulta =mysqli_query($db, "select * from inpatients where Id='".$old_in_presc_id."'"); 
$rowa=mysqli_fetch_array($resulta);
$pid=$prescno=stripslashes($rowa['PrescId']);
$pntno=stripslashes($rowa['PatId']);
#$acctype=stripslashes($rowa['BillinType']);
?>
<div style="width:100%; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL DISCHARGE SUMMARY<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>

<div style="clear:both; margin-bottom:10px;border-top:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>NAME: </strong>
<?php  echo stripslashes($row['patname']) ?>
<strong style="margin-left:20px"> PATIENT NO:</strong><?php  echo stripslashes($row['patid']) ?> &nbsp; <strong>ADMISSION NO: </strong><?php  echo stripslashes($rowa['PrescId']); ?></p>

<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>DATE OF ADMISSION: </strong>
<label for="datepick2" class="bh-visually-hidden">DATE OF ADMISSION:</label><input type="text" id="datepick2" value="<?php  echo stripslashes($row['admdate']) ?>" style="border-style: none;width:80px;"/>
<strong style="margin-left:20px"> DATE OF DISCHARGE:</strong><label for="datepick3" class="bh-visually-hidden">DATE OF DISCHARGE:</label><input type="text" id="datepick3" value="<?php  echo stripslashes($row['dischargedate']) ?>" style="border-style: none;width:80px;"/></p>

<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>AGE: </strong>
<?php  echo stripslashes($row['age']) ?>
<strong style="margin-left:20px"> SEX:</strong><?php  echo stripslashes($row['sex']) ?><strong style="margin-left:20px"> DOCTOR:</strong><?php  echo stripslashes($row['doctor']) ?></p>
<div style="clear:both; margin-bottom:10px; margin-top:10px;border-top:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>DIAGNOSIS: </strong>
<BR/>
<?php  echo stripslashes($row['diagnosis']) ?><?php  echo stripslashes($rowa['DiagName']) ?></p>

<div style="clear:both; margin-bottom:10px; margin-top:10px;border-top:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>MEDICATION: </strong><BR/>
<?php  echo stripslashes($row['medical']) ?></p>

<div style="clear:both; margin-bottom:10px; margin-top:10px;border-top:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>CLINICAL SUMMARY: </strong><BR/>
<?php  echo stripslashes($row['clinical']) ?></p>

<div style="clear:both; margin-bottom:10px; margin-top:10px;border-top:1px dashed #333"></div>
<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>NEXT APPOINTMENT: </strong><BR/>
<?php  echo dateprint(stripslashes($row['nextapp'])) ?></p>

<div style="clear:both; margin-bottom:20px"></div>
<?php echo'<div style="float:right; margin:0 5px 0 0px;"><img alt="IMG 20240206 WA0003" src="images/IMG-20240206-WA0003.png" style="width:200px; height:50px; margin-right:80px;" /></div>';
echo'<div style="clear:both; margin-bottom:10px"></div>';?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Printed By <?php  echo  stripslashes($row['username']) ?>.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <?php  echo $Motto ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 
break;

case 59:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DISCHARGE REPORTS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>

<a download="discharge_report.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:auto; height:20px;color:#fff; background:#333; padding:0">
   		
   		<td  style="width:120px">Date</td>
   		<td  style="width:80px">Pat Id</td>
   		<td  style="width:200px">Pat Name</td>
        <td  style="width:100px">Pay Mode</td>
         <td  style="width:100px">Doctor</td>
       	 <td  style="width:200px">Diagnosis</td>
         <td  style="width:100px">Diagnosis Code</td>
         <td  style="width:100px">Adm Date</td>
          <td  style="width:100px">Discharge Date</td>
         <td  style="width:100px">Other Details</td>
         

    </tr> 

<?php
	if($code==1){
	$result =mysqli_query($db, "select * from admsumm");
	}
	else{
	$result =mysqli_query($db, "select * from  admsumm where stamp>='".$d1."' and stamp<='".$d2."'");
	}
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$rowx=mysqli_fetch_array($result);
	


if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:120px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['date']) ?></td>
       <td style="width:80px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['patid']) ?></td>
      <td style="width:200px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['patname']) ?></td>
       <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['mode']) ?></td>
          <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['doctor']) ?></td>
        <td style="width:200px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['diag']) ?></td>
       <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['diagcode']) ?></td>
       <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['admdate']) ?></td>
       <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['disdate']) ?></td>
       <td style="width:100px;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['odetail']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 60:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
$dis=$_GET['dis'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DIAGNOSIS REPORTS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DEPARTMENT:<strong style="font-size:12px"><?php  echo $name ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>


<a download="diagnosisreport.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:8%;">Date</td>
        <td  style="width:7%;">Patient Id</td>
        <td  style="width:10%;">Patient Name</td>
         <td  style="width:10%;">Age</td>
         <td  style="width:7%;">Gender</td>
       <td  style="width:15%;">History</td>
        <!-- <td  style="width:10%;">Diagnosis Category</td> -->
        <td  style="width:15%;">Diagnosis Details</td>
        <td  style="width:8%;">Department</td>
        <td  style="width:11%;">Type</td>
    </tr>
    

<?php

$dept=array(array());
$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0);	
}



$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept[$i][1]=stripslashes($row['name']);
$dept[$i][0]=stripslashes($row['id']);
$dept[$i][2]=stripslashes($row['abbr']);
}
$max=count($dept);
for ($x= 0; $x < $max; $x++){
	$dept[$x][2]==0;
	}
$arr1=array();$arr2=array();$arr3=array();


if($name=='All'&&$dis=='All'){
	if($code==1){
	$result =mysqli_query($db, "select * from newprescription");
	}
	else{
	$result =mysqli_query($db, "select * from  newprescription where Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
}
else if($name!='All'&&$dis=='All'){
	
	if($code==1){
	$result =mysqli_query($db, "select * from newprescription where Dept='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from  newprescription where  Dept='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
}
else if($name=='All'&&$dis!='All'){
	
	if($code==1){
	$result =mysqli_query($db, "select * from newprescription where DiagName LIKE '%".$dis."%' ");
	}
	else{
	$result =mysqli_query($db, "select * from  newprescription where  DiagName LIKE '%".$dis."%'  and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
}
else if($name!='All'&&$dis!='All'){
	
	if($code==1){
	$result =mysqli_query($db, "select * from newprescription where DiagName LIKE '%".$dis."%'  and Dept='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from  newprescription where  DiagName LIKE '%".$dis."%' and Stamp>='".$d1."' and Stamp<='".$d2."' and Dept='".$name."'");
	}
}
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	$resultx =mysqli_query($db, "select * from  patients where pntno='".stripslashes($row['PatId'])."' limit 0,1");
	$rowx=mysqli_fetch_array($resultx);

	//count diseases

	$max=count($dept);
	for ($x= 0; $x < $max; $x++){


		$var1=$dept[$x][1];
		$var2=stripslashes($row['DiagName']);
		if(like_match('%'.$var1.'%',$var2)){

			$dept[$x][2]+=1;	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	
	
if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['TransDate'])) ?></td>
       <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatName']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['age']) ?></td>
       <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['gender']) ?></td>
          <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['History']) ?></td>
           <!-- <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  #echo stripslashes($row['DiagName']).' '.stripslashes($row['Diagnosis']).' '.stripslashes($row['DiagCat']);  ?></td> -->
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['DiagName']).' '.stripslashes($row['Diagnosis']).' '.stripslashes($row['DiagCat']);  ?></td>
        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Dept']) ?></td>
          <td style="width:11%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Type']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:10px"></div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Diseases Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
		if($dept[$x][3]>0){
		echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept[$x][1].": ".$dept[$x][3]."</p>";
		}
	}
		
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 60.1:

$date=date('Y/m/d');
$stamp=date('Ymd');
$code=$_GET['code'];
$name=$_GET['name'];
$dis=$_GET['dis'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">INPATIENT DIAGNOSIS REPORTS<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">WARD:<strong style="font-size:12px"><?php  echo $name ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>


<div style="clear:both; margin-bottom:10px"></div>


<a download="diagnosisreport.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:6%;">I/P No.</td>
        <td  style="width:6%;">Adm. No.</td>
        <td  style="width:7%;">PatientNo</td>
        <td  style="width:20%;">Patient Name</td>
       	<td  style="width:15%;">Age</td>
       	<td  style="width:6%;">Genger</td>
         <td  style="width:20%;">Diagnosis Category</td>
      <td  style="width:10%;">Adm. Date</td>
        <td  style="width:10%;">Discharge Date</td>
       	<td  style="width:15%;">Ward</td>
        </tr>
    

<?php

$dept=array(array());
$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0);	
}



$result =mysqli_query($db, "select * from diseases order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept[$i][1]=stripslashes($row['name']);
$dept[$i][0]=stripslashes($row['id']);
$dept[$i][2]=stripslashes($row['abbr']);
}
$max=count($dept);
for ($x= 0; $x < $max; $x++){
	$dept[$x][2]==0;
	}
$arr1=array();$arr2=array();$arr3=array();


if($name=='All'&&$dis=='All'){
	if($code==1){
	$result =mysqli_query($db, "select * from inpatients");
	}
	else{
	$result =mysqli_query($db, "select * from  inpatients where Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
}
else if($name!='All'&&$dis=='All'){
	
	if($code==1){
	$result =mysqli_query($db, "select * from inpatients where MainWard='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from  inpatients where  MainWard='".$name."' and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
}
else if($name=='All'&&$dis!='All'){
	
	if($code==1){
	$result =mysqli_query($db, "select * from inpatients where DiagName LIKE '%".$dis."%' ");
	}
	else{
	$result =mysqli_query($db, "select * from  inpatients where  DiagName LIKE '%".$dis."%'  and Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
}
else if($name!='All'&&$dis!='All'){
	
	if($code==1){
	$result =mysqli_query($db, "select * from inpatients where DiagName LIKE '%".$dis."%'  and MainWard='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from  inpatients where  DiagName LIKE '%".$dis."%' and Stamp>='".$d1."' and Stamp<='".$d2."' and MainWard='".$name."'");
	}
}
$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	$resultx =mysqli_query($db, "select * from  patients where pntno='".stripslashes($row['PatId'])."' limit 0,1");
	$rowx=mysqli_fetch_array($resultx);

	//count diseases

	$max=count($dept);
	for ($x= 0; $x < $max; $x++){


		$var1=$dept[$x][1];
		$var2=stripslashes($row['DiagName']);
		if(like_match('%'.$var1.'%',$var2)){

			$dept[$x][2]+=1;	
			$dept[$x][3]=$dept[$x][2];
		}
	}
	
	
if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['ipno']) ?></td>
      <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PrescId']) ?></td>
       <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
      <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatName']) ?></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['age']) ?></td>
        <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowx['gender']) ?></td>
        <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['DiagName']).' '.stripslashes($row['Diagnosis']).' '.stripslashes($row['DiagCat']); ?></td>
   		<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo dateprint(stripslashes($row['TransDate'])) ?></td>
        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Discharge']) ?></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['MainWard']) ?></td>
     </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:10px"></div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Diseases Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
		if($dept[$x][3]>0){
		echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept[$x][1].": ".$dept[$x][3]."</p>";
		}
	}
		
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 61:
$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;


?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INVENTORY MOVEMENT REPORT<br/><strong style="font-size:11px">Date:<?php  echo $date ?><br/><strong style="font-size:11px">Department:<?php  echo $name ?></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both"></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item Name</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pack Size</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Part</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
</div>
<?php
	$arr=array();
	$arr2=array();	
	$arr3=array(array());
	
	
			if($d1==0){
			$result =mysqli_query($db, "select * from stocktrack  where Dept='".$name."' and (Description LIKE '%STOCK TRANSFER TO%' or Description LIKE '%INPATIENT SALES%'  or Description LIKE '%OUTPATIENT SALES%') ");
			}
			else{
			$result =mysqli_query($db, "select * from stocktrack  where Stamp>='".$d1."' and Stamp<='".$d2."'  and Dept='".$name."'   and (Description LIKE '%STOCK TRANSFER TO%' or Description LIKE '%INPATIENT SALES%'  or Description LIKE '%OUTPATIENT SALES%')");
			}
	
	
				$num_results = mysqli_num_rows($result);
				for ($i=0; $i <$num_results; $i++) {	
				$row=mysqli_fetch_array($result);
				$arr2[stripslashes($row['ItemCode'])]=stripslashes($row['ItemName']).'ÃÂ¸'.stripslashes($row['Pack']) ;
				}
		
		
	foreach ($arr2 as $key2 => $val2) {
		
			$qty=0;$tam=0;
			//from sales
			if($d1==0){
		$resulta =mysqli_query($db, "select * from stocktrack  where Dept='".$name."'  and ItemCode='".$key2."' and (Description LIKE '%STOCK TRANSFER TO%' or Description LIKE '%INPATIENT SALES%'  or Description LIKE '%OUTPATIENT SALES%') ");
			}
			else{
			$resulta =mysqli_query($db, "select * from stocktrack  where Stamp>='".$d1."' and Stamp<='".$d2."'  and Dept='".$name."'    and ItemCode='".$key2."'  and (Description LIKE '%STOCK TRANSFER TO%' or Description LIKE '%INPATIENT SALES%'  or Description LIKE '%OUTPATIENT SALES%')");
			}
				$num_resultsa = mysqli_num_rows($resulta);
				for ($b=0; $b <$num_resultsa; $b++) {
				$rowa=mysqli_fetch_array($resulta);
				$qty+=preg_replace('~,~', '', stripslashes($rowa['Qty']));
				}
				
				$resultx =mysqli_query($db, "select * from items where ItemCode='".$key2."'");
				$rowx=mysqli_fetch_array($resultx);
				$sp= stripslashes($rowx['SalePrice']);
				$tam=$sp*$qty;
	
		//sum total
				$max=count($arr3);
				$parts=explode('ÃÂ¸',$val2);
				$itname=$parts[0];
				$pack=$parts[1];
				
				$part=$qty%$pack;
				$unit=explode('.',($qty/$pack));
				$unit=$unit[0];
				
				if($tam>0){
				$arr3[$max]=array($key2,$itname,$pack,$unit,$part,$tam);
				}
		
	}
$y=$z=0;$x=0;
$max=count($arr3);	
for ($i=1; $i <$max; $i++) {
	$x+=$arr3[$i][3];$y+=$arr3[$i][4];$z+=$arr3[$i][5];
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>




<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr3[$i][1] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr3[$i][2] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr3[$i][3] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr3[$i][4] ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
<script>document.writeln(( <?php  echo $arr3[$i][5] ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<?php } ?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Totals</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $x ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $y ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $z ?>).formatMoney(2, '.', ','));</script></p>
</div>
</div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 62:
$old_patient_id=safe_decode($_GET['cid']);
$rcptno=safe_decode($_GET['rcptno']);
$pid=safe_decode($_GET['pid']);
$result =mysqli_query($db, "SELECT * FROM sales WHERE ClientId='".$pid."' AND Cashier!='' AND RcptNo='".$rcptno."' AND old_patient_id='".$old_patient_id."'");
$row=mysqli_fetch_array($result);
//echo $rcptno; echo $pid; echo date('Ymd'); 
$amount=stripslashes($row['AmountPaid']);
$change=stripslashes($row['Balance']);
$cname=stripslashes($row['ClientName']);
$dept=stripslashes($row['Category']);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);
$date=stripslashes($row['Date']);
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;

$resulta =mysqli_query($db, "SELECT * FROM receipts WHERE patid='".$pid."' AND rcptno='".$rcptno."' AND paymode IN('Cash','Bank') AND old_patient_id='".$old_patient_id."'");
$num_resultsa = mysqli_num_rows($resulta);
if($num_resultsa<1){
			exit;
		}
$rowa=mysqli_fetch_array($resulta);
$patname=stripslashes($rowa['patname']);

$patid=stripslashes($rowa['patid']);
$time=stripslashes($rowa['time']);
$date=dateprint(stripslashes($rowa['date']));
$amount=stripslashes($rowa['amount']);
$paymode=stripslashes($rowa['paymode']);

$query1 =mysqli_query($db, "select * from users where name='".$cashier."'");
$rw1=mysqli_fetch_array($query1);
$cashier=stripslashes($rw1['fullname']);

$query2 =mysqli_query($db, "select * from users where name='".$posted."'");
$rw2=mysqli_fetch_array($query2);
$posted=stripslashes($rw2['fullname']);


?>

<div style="width:330px;min-height:370px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:26px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname2 ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?></br>TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>

<p style="text-align:center;font-size:11px;font-weight:bold; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Patient Name: <?php  echo $patname ?>&nbsp; &nbsp;&nbsp;&nbsp;Patient No: <?php  echo $patid ?>&nbsp; &nbsp;&nbsp;&nbsp; Date:<?php  echo $d ?>&nbsp; &nbsp;&nbsp;&nbsp;Time:<?php  echo convtime($time); ?>&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: <?php  echo $rcptno ?>&nbsp; &nbsp;&nbsp;&nbsp;Dept: <?php  echo $dept ?></strong>
</p>
<div style="clear:both"></div>

<div style="clear:both"/>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<a style="text-align:center;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Item name</a>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<a style="text-align:center;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 30px">Qty.</a>
</div>
<div>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ClientId='".$pid."' and Cashier !='' and old_patient_id='".$old_patient_id."' ");
$num_results = mysqli_num_rows($result);
$qty=0;$itot=0;$tam=0;$b=0;$c=0;$d=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
$tam+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
$itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
$d+=preg_replace('~,~', '', stripslashes($row['Discount']));
$b+=$itot;
?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-weight:bold;font-size:10px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">
<?php  echo stripslashes($row['ItemName']) ?></p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:10px;font-weight:bold; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Qty']) ?></p>
</div>
<div>
</div>
</div>
<?php } ?>

<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $qty ?></p>
</div>
<div>
</div>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount Charged</p>
</div>
<div style="width:40px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo $tam ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount Paid</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php  if(stripslashes($row['Instatus'])==1){?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Insurance</p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><script>document.writeln(( <?php  echo stripslashes($row['Insamount'])?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
</div>
</div>
<?php } ?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Mode of Payment </p>
</div>
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase"><?php  echo $paymode ?></p>
</div>
<div>
</div>
</div>

<div style="clear:both; margin-bottom:30px"></div>
<p style="text-align:center;font-size:11px;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">Submitted By <?php  echo $posted ?>.</p>
<p style="text-align:center;font-size:11px;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">Posted By <?php  echo $cashier ?>.</p>
<p style="text-align:center;font-size:11px;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px; margin:0 0 0 0px">System Developers: betterhealth.co.ke</p>
 <p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Tel: 0726606834</p>


</div>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>
<?php 
break;

case 63:

$date=date('Y/m/d');
if(isset($_GET['name'])){
	$name=$_GET['name'];
}else $name=0;

$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

if(isset($_GET['timer1'])){
	$timer1=$_GET['timer1'];
}else $timer1='12:00am';

if(isset($_GET['timer2'])){
	$timer2=$_GET['timer2'];
}else $timer2='12:00am';


$fname=strtolower($name).'_invoices_report';
?>
<div style="width:100%;min-height:260px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL INVOICES REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;<?php  echo $timer1 ?>&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo dateprint($d2) ?>&nbsp;&nbsp;&nbsp;<?php  echo $timer2 ?></p>
<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
// $time1=backtime($timer1);
// $time2=backtime($timer2);
// $d1=$d1.$time1;
// $d2=$d2.$time2;

?>

<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
		<td  style="width:10%;">Date</td>
		<td  style="width:10%;">Patient Id</td>
		<td  style="width:17%;">Patient Name</td>
		<td  style="width:6%;">Pay Mode</td>
		<td  style="width:10%;">Company</td>
		<td  style="width:10%;">Rcpt/Invoice No</td>
		<td  style="width:10%;">Amount</td>
		<td  style="width:10%;">Time</td>
		<td  style="width:10%;">Department</td>
		<td  style="width:8%;">User Id</td>
    </tr>

<?php
// echo $d1; echo "</br>";
// echo $d2;

$dept=array(array());
$result =mysqli_query($db, "select * from maindepts order by Branchname");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept[$i]=array(0,0,0,0);	
}



$result =mysqli_query($db, "select * from maindepts order by BranchId");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept[$i][1]=stripslashes($row['Branchname']);
$dept[$i][0]=stripslashes($row['BranchId']);
$dept[$i][2]=stripslashes($row['Abbr']);
}
$max=count($dept);
for ($x= 0; $x < $max; $x++){
	$dept[$x][2]==0;
	}
$arr1=array();$arr2=array();$arr3=array();
switch($code){
	case 1:
	
	$result =mysqli_query($db, "select * from receipts  where stamp='".date('Ymd')."' and status!=0 and (paymode='Companies' or paymode='Credit' or paymode!='DMRP')");
	
	break;
	
	case 2:
	
	if($d1==0){
	$result =mysqli_query($db, "select * from receipts  where status!=0  and (paymode='Companies' or paymode='Credit' or paymode!='DMRP')");
	}
	else{
	$result =mysqli_query($db, "select * from receipts  where stamp>='".$d1."' and stamp<='".$d2."'  and status!=0  and (paymode='Companies' or paymode='Credit' or paymode!='DMRP')");
	}
	break;
	
	case 3:
	
	if($d1==0){
	$result =mysqli_query($db, "select * from receipts  where status!=0  and cid='".$name."' and (paymode='Companies' or paymode='Credit' or paymode!='DMRP')");
	}
	else{
	$result =mysqli_query($db, "select * from receipts  where stamp>='".$d1."' and stamp<='".$d2."'  and status!=0  and cid='".$name."'   and (paymode='Companies' or paymode='Credit' or paymode!='DMRP')");
	}
	break;
	
	case 4:
	
	if($d1==0){
	$result =mysqli_query($db, "select * from receipts  where status!=0  and (paymode='Cash' or paymode='Bank')");
	}
	else{
	$result =mysqli_query($db, "select * from receipts  where stamp>='".$d1."' and stamp<='".$d2."'  and status!=0  and (paymode='Cash'  or paymode='Bank')");
	}
	break;
	
	
	
	
	
}

#$arr1=array();$arr2=array();$arr3=array();
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
	$x+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	
	$max=count($dept);
	for ($x= 0; $x < $max; $x++){
		if($dept[$x][1]==stripslashes($row['category'])){
			$dept[$x][2]+=preg_replace('~,~', '', stripslashes($row['amount']));	
			$dept[$x][3]=$dept[$x][2];
		}
	}

	loop56($row,$i);
	}

foreach ($arr1 as $key => $val) {
$e+=$val;
}
foreach ($arr2 as $key2 => $val2) {
$u+=$val2;
}
$xy=0;
foreach ($arr3 as $key3 => $val3) {
$xy+=$val3;
}




?>


</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Cashier's Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash Held: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank: <script>document.writeln(( <?php  echo $x ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>

</div>
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Departmental Breakdown</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max=count($dept);
for ($x= 0; $x < $max; $x++){
		if($dept[$x][3]>0){
		echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept[$x][1].": <script>document.writeln((".$dept[$x][3].").formatMoney(2, '.', ','));</script></p>";
		}
	}
		
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 64:
$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$result =mysqli_query($db, "select * from items where ItemCode='".$name."'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL PROCUREMENT BIN CARD<br/><strong style="font-size:11px">Date:<?php  echo $date ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item:<?php  echo stripslashes($row['ItemName'])  ?><br/>Pack Size:<?php  echo stripslashes($row['Pack'])  ?></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both"></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date</p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From/To</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Units In</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Parts In</p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Units Out</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Parts Out</p>
</div>
</div>
<?php
	$arr1=array(array());$arr1[0]=array(0,0,0,0,0,0,0);
	$arr2=array();	
	$arr3=array(array());
	if($d1==0){
	$result =mysqli_query($db, "select * from purchases  where ItemCode='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from purchases  where Stamp>='".$d1."' and Stamp<='".$d2."' and ItemCode='".$name."'");
	}
	
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
			$max=count($arr1);
			$row=mysqli_fetch_array($result);
			$date=dateprint(stripslashes($row['PurchDate']));
			$arr1[$max]=array($date,stripslashes($row['Supplier']),stripslashes($row['UnitBox']),stripslashes($row['PartBox']),0,0,stripslashes($row['Stamp']));
	}
	
	if($d1==0){
	$result =mysqli_query($db, "select * from issuetable  where ItemCode='".$name."' and Dep1='PROCUREMENT' and Status=2");
	}
	else{
	$result =mysqli_query($db, "select * from issuetable  where Stamp>='".$d1."' and Stamp<='".$d2."' and ItemCode='".$name."' and Dep1='PROCUREMENT' and Status=2");
	}	
	$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
		$max=count($arr1);
		$row=mysqli_fetch_array($result);
		$date=stripslashes($row['TransDate']);
		$arr1[$max]=array($date,stripslashes($row['Dep2']),stripslashes($row['UnitBox']),stripslashes($row['PartBox']),0,0,stripslashes($row['Stamp']));
	}
	
	if($d1==0){
	$result =mysqli_query($db, "select * from issuetable  where ItemCode='".$name."' and Dep2='PROCUREMENT' and Status=2");
	}
	else{
	$result =mysqli_query($db, "select * from issuetable  where Stamp>='".$d1."' and Stamp<='".$d2."' and ItemCode='".$name."' and Dep2='PROCUREMENT' and Status=2");
	}	
	$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
		$max=count($arr1);
		$row=mysqli_fetch_array($result);
		$date=stripslashes($row['TransDate']);
		$arr1[$max]=array($date,stripslashes($row['Dep1']),0,0,stripslashes($row['UnitBox']),stripslashes($row['PartBox']),stripslashes($row['Stamp']));
	}
	
		if($d1==0){
	$result =mysqli_query($db, "select * from goodsreturned  where code='".$name."'");
	}
	else{
	$result =mysqli_query($db, "select * from goodsreturned  where stamp>='".$d1."' and stamp<='".$d2."' and code='".$name."'");
	}	
	$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
		$max=count($arr1);
		$row=mysqli_fetch_array($result);
		$date=dateprint(stripslashes($row['date']));
		$arr1[$max]=array($date,stripslashes($row['sname']),0,0,stripslashes($row['unit']),stripslashes($row['part']),stripslashes($row['stamp']));
	}
	
	$stamp=array();
	foreach ($arr1 as $key => $val) {
	$stamp[$key]=$val[6];
	
 	}
 
	array_multisort($stamp,SORT_ASC,$arr1);
	
$w=$x=$y=$z=0;
$max=count($arr1);	
for ($i=1; $i <$max; $i++) {
	$w+=$arr1[$i][2];$x+=$arr1[$i][3];$y+=$arr1[$i][4];$z+=$arr1[$i][5];
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>




<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr1[$i][0] ?></p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr1[$i][1] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr1[$i][2] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr1[$i][3] ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr1[$i][4] ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <?php  echo $arr1[$i][5] ?></p>
</div>
</div>
<?php } ?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Totals</p>
</div>
<div style="width:300px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $w ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $x ?></p>
</div>
<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $y ?></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $z ?></p>
</div>
</div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 65:
$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['code'];
$dept=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$result =mysqli_query($db, "select * from items where ItemCode='".$name."'");
$row=mysqli_fetch_array($result);
$pack=stripslashes($row['Pack']) ;
?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL <?php  echo $dept ?> BIN CARD<br/><strong style="font-size:11px">Date:<?php  echo $date ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Item:<?php  echo stripslashes($row['ItemName'])  ?><br/>Pack Size:<?php  echo stripslashes($row['Pack'])  ?></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<div style="clear:both"></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date</p>
</div>
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Description</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Qty Units</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Qty Parts</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Bal Units</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Bal Parts</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">UserName</p>
</div>
</div>
<?php

	//goods in
	if($d1==0){
	$result =mysqli_query($db, "select * from stocktrack  where ItemCode='".$name."' and Dept='".$dept."'");
	}
	else{
	$result =mysqli_query($db, "select * from stocktrack  where Stamp>='".$d1."' and Stamp<='".$d2."' and ItemCode='".$name."' and Dept='".$dept."'");
	}	
	$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		
		$pack=stripslashes($row['Pack']) ;
		$qty=stripslashes($row['Qty']);
		$bal=stripslashes($row['Bal']);
		$partq=$qty%$pack;
		$unitq=explode('.',($qty/$pack));
		$unitq=$unitq[0];
		
		$partb=$bal%$pack;
		$unitb=explode('.',($bal/$pack));
		$unitb=$unitb[0];
		
		
	
	
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'"">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
	}
?>




<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['Date'])) ?></p>
</div>
<div style="width:350px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Description']) ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $unitq ?></p>
</div>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $partq ?></p>
</div>

<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $unitb ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $partb ?></p>
</div>

<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <?php  echo stripslashes($row['UserName']) ?></p>
</div>
</div>
<?php } ?>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 66:

$result =mysqli_query($db, "select * from  inpatients where PrescId='".$rcptno."'");
$row=mysqli_fetch_array($result);
$pntno=stripslashes($row['PatId']);
$resulta =mysqli_query($db, "select * from  patients where pntno='".$pntno."'");
$rowa=mysqli_fetch_array($resulta);

?>

<div style="width:100%;min-height:960px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">
ADMISSION FORM<br/>FORM NO:<?php  echo stripslashes($row['PrescId']) ?></p>
<div style="clear:both; margin-bottom:20px"></div>


<div style="clear:both; border-top:1px solid  #333;border-bottom:1px solid  #333; height:26px">
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">PAT No:</p>
</div>
<div style="width:20%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PatId']) ?></p>
</div>
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">I/P No</p>
</div>
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($rowa['ipno']) ?></p>
</div>
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ADM DATE</p>
</div>
<div>
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['AdmDate']) ?></p>
</div>
</div>


<div style="clear:both; border-top:0px solid  #333;border-bottom:1px solid  #333; height:26px">
<div style="width:20%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DOCTOR:</p>
</div>
<div style="width:25%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['Doctor']) ?></p>
</div>
<div style="width:20%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">WARD</p>
</div>
<div>
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['MainWard']) ?></p>
</div>
</div>

<div style="clear:both; border-bottom:1px solid  #333; height:26px">
<div style="width:12%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">NAMES:</p>
</div>
<div style="width:30%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['PatName']) ?></p>
</div>
<div style="width:8%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">D.O.B:</p>
</div>
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($rowa['dob']) ?></p>
</div>
<div style="width:10%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">SEX</p>
</div>
<div>
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo strtoupper(stripslashes($rowa['gender'])) ?></p>
</div>
</div>

<div style="clear:both; border-bottom:1px solid  #333; height:26px">
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ADDRESS:</p>
</div>
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($rowa['address']) ?></p>
</div>
<div style="width:20%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">PHONE</p>
</div>
<div style="width:20%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($rowa['contact']) ?></p>
</div>
<div style="width:10%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">EMAIL</p>
</div>
<div>
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($rowa['email']) ?></p>
</div>
</div>

<div style="clear:both; border-bottom:1px solid  #333; border-top:1px solid  #333;height:26px; margin-top:30px">
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">NEXT OF KIN:</p>
</div>
<div style="width:25%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($rowa['gname']) ?></p>
</div>

<div style="width:20%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">RELATIONSHIP</p>
</div>
<div>
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo strtoupper(stripslashes($rowa['grship'])) ?></p>
</div>
</div>

<div style="clear:both; border-bottom:1px solid  #333; border-top:1px solid  #333;height:26px; margin-top:30px">
<div style="width:15%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">EMPLOYER:</p>
</div>
<div style="width:25%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($rowa['empname']) ?></p>
</div>

<div style="width:20%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">EMPLOYEE NO</p>
</div>
<div>
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo strtoupper(stripslashes($rowa['empno'])) ?></p>
</div>
</div>

<div style="clear:both; border-bottom:1px solid  #333; border-top:1px solid  #333;height:26px; margin-top:30px">
<div style="width:50%; height:26px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ACCOUNT TO BE PAID BY:</p>
</div>

<div>
<p style="text-align:center; font-weight:bold;font-size:15px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo strtoupper(stripslashes($row['PayMode'])) ?></p>
</div>
</div>


<div style="clear:both; border-bottom:1px solid  #333; border-top:1px solid  #333; margin-top:60px; ">
<div style="width:auto; float:left; overflow:hidden;padding:40px 5px">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0px 0 0px">I hereby declare and undertake with the hospital to pay all expenses incurred by me the patient or guarantee that my <br/><br/>employer or 
............................................................................................................ shall pay the fees and expenses aforesaid. I further agree for myself or on behalf of the patient to be bound by all the regulations of the hospital.</p>
</div>
</div>
<div style="clear:both; border-bottom:1px solid  #333; border-top:1px solid  #333; margin-top:60px; ">
<div style="width:auto; float:left; overflow:hidden;padding:40px 5px">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0px 0 0px">I hereby give consent for any necessary operation under anaesthetic to be performed upon me/my wife/ my chid <br/><br/>
<strong style="text-decoration:underline"><?php  echo date('d/m/Y') ?></strong><strong style="margin-left:50px">....................................................</strong> 
<strong style="margin-left:50px">....................................................</strong><br/>
<strong style="float:left;margin-left:50px">Date</strong><strong style="margin-left:80px">Signature</strong> 
<strong style="margin-left:200px">Witness</strong>
</p>
</div>
</div>


<div style="clear:both; border-bottom:1px solid  #333; border-top:1px solid  #333; margin-top:60px; ">
<div style="width:auto; float:left; overflow:hidden;padding:5px">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0px 0 0px">
<strong style="float:left;margin-left:10px">Date of Admission</strong><strong style="margin-left:60px">Time</strong> 
<strong style="margin-left:100px">Signature of Admitting Officer</strong><strong style="margin-left:100px">Date of Discharge</strong>

 <br/><br/>
<strong style="float:left;margin-left:30px"><?php  echo stripslashes($row['AdmDate'])?></strong>
<strong style="float:left;margin-left:70px"><?php  echo date('g:i A') ?></strong> 
<strong style="float:left;margin-left:80px">................................................</strong>
<strong style="float:left;margin-left:60px">....................................</strong><br/>

</p>
</div>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We Care for the Sick</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Admission By <?php  echo $fullname ?>.</p>

</div>

<?php 

break;

case 67:
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno."");
$row=mysqli_fetch_array($result);

?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase; padding:0; margin:0}
</style>
<div style="width:99%;min-height:260px; border:2px solid #333; margin:3px">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute; text-align:LEFT"/>
<p style="text-align:center; font-size:25px;   margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;  margin:0 0 0 0px">OFFICIAL INPATIENT INVOICE</p>
<div id="barcode" style="font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>
<p style="text-align:center;  margin:0 0 0 0px">BILL NO:<?php  echo $rcptno ?>&nbsp;&nbsp;&nbsp;&nbsp;INVOICE NO:<?php  echo stripslashes($row['invno']) ?></p>
<p style="text-align:center; margin-top:5px">Date:<?php  echo date('d/m/Y') ?><br/><br/>
Name:<?php  echo stripslashes($row['patname']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient No:<?php  echo stripslashes($row['patid']) ?><br/>
</p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto;  height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#FFF">
<div style="width:70%;  height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#333;text-align:center;  font-weight:bold; margin:0 0 0 0px">DESCRIPTION</p>
</div>
<div>
<p style="color:#333;text-align:center;  font-weight:bold; margin:0 0 0 0px">PRICE</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='INPATIENT CASH DEPOSIT'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">INPATIENT CASH DEPOSIT</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='ADMISSION FEES'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">ADMISSION FEES</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='BED CHARGES'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">BED CHARGES [<?php  echo stripslashes($row['col6']) ?> WARD FROM <?php  echo stripslashes($row['col2']) ?> TO <?php  echo stripslashes($row['col3']) ?> AT <?php  echo stripslashes($row['col4']) ?> PER DAY]</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<?php
$arr=array();$k=0;
							$resultc =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_resultsc = mysqli_num_rows($resultc);
							for ($z=0; $z <$num_resultsc; $z++) {
								$rowc=mysqli_fetch_array($resultc);
								$bname=stripslashes($rowc['Branchname']);
										
										$e=0;
										$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='".$bname."'");
										$num_results = mysqli_num_rows($result);
										if($num_results>0){
										$row=mysqli_fetch_array($result);
          if(stripslashes($row['col1'])=='ADMINISTRATION'){ $categ='DRUGS [ MEDICINE / DAWA ]'; } else{ $categ=stripslashes($row['col1']);}
										?>
  <div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center"><?php  echo $categ; ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div> 
                                        
                                        <?php
										
										}
							}
							
?>

<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='HOSPITAL FEES'");
$num_results = mysqli_num_rows($result);
							for ($z=0; $z <$num_results; $z++) {
								$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center"><?php  echo stripslashes($row['col1']) ?> - <?php  echo stripslashes($row['col2']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<div style="clear:both; "></div>
<?php } ?>


<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='OTHER FEES'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">OTHER FEES - <?php  echo stripslashes($row['col2']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>



<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='SUBTOTAL'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left; ">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center;font-weight:BOLD">SUBTOTAL</p>
    </div>
    <div><p style="text-align:center;font-weight:BOLD">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<div style="clear:both; margin-bottom:30px"></div>

<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='DISCOUNT'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left;border-TOP:1.5px solid #333;">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">DISCOUNT</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>

<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='BANK PAYMENT'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left;">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">BANK PAYMENT - REF NO:<?php  echo stripslashes($row['col3']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='CLAIM AMOUNT 1'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">COMPANY TO PAY-[<?php  echo stripslashes($row['col2']) ?>] - REF NO:<?php  echo stripslashes($row['col3']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>

<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='CLAIM AMOUNT 2'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">COMPANY TO PAY-[<?php  echo stripslashes($row['col2']) ?>] - REF NO:<?php  echo stripslashes($row['col3']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='CASH TO PAY'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">BALANCE TO PAY</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='DIFFERENCE'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">DIFFERENCE</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<div style="clear:both; margin-bottom:30px"></div>
<p style="float:right;    margin:0 5px 0 0px">Signature........................</p>
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;margin:0 0 0 0px">You were Served By <?php  echo $fullname ?>.</p>
<p style="text-align:center;font-weight:normal; margin:0 0 0 0px">System Developers: BetterHealth.Co.Ke</p>
</div>

<?php 
break;

case 68:
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno."");	
$row=mysqli_fetch_array($result);

?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase; padding:0; margin:0}
</style>
<div style="width:99%;min-height:260px; border:2px solid #333; margin:3px">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute; text-align:LEFT"/>
<p style="text-align:center; font-size:25px;   margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;   margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;  margin:0 0 0 0px">OFFICIAL INPATIENT INVOICE</p>
<div id="barcode" style="font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase"><?php  echo $rcptno ?></div>
<script type="text/javascript">
/* <![CDATA[ */
  function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_Code39(get_object("barcode").innerHTML,1,"yes","in",0,3,0.4,3,"bottom","center","","black","white");
/* ]]> */
</script>
<p style="text-align:center;  margin:0 0 0 0px">BILL NO:<?php  echo $rcptno ?>&nbsp;&nbsp;&nbsp;&nbsp;INVOICE NO:<?php  echo stripslashes($row['invno']) ?></p>
<p style="text-align:center; margin-top:5px">Date:<?php  echo date('d/m/Y') ?><br/><br/>
Name:<?php  echo stripslashes($row['patname']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient No:<?php  echo stripslashes($row['patid']) ?><br/>
</p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto;  height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#FFF">
<div style="width:70%;  height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#333;text-align:center;  font-weight:bold; margin:0 0 0 0px">DESCRIPTION</p>
</div>
<div>
<p style="color:#333;text-align:center;  font-weight:bold; margin:0 0 0 0px">PRICE</p>
</div>
</div>
<?php
$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='INPATIENT CASH DEPOSIT'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">INPATIENT CASH DEPOSIT</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<?php

$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='ADMISSION FEES'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">ADMISSION FEES</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='BED CHARGES'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">BED CHARGES [<?php  echo stripslashes($row['col6']) ?> WARD FROM <?php  echo stripslashes($row['col2']) ?> TO <?php  echo stripslashes($row['col3']) ?> AT <?php  echo stripslashes($row['col4']) ?> PER DAY]</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<?php
$arr=array();$k=0;
							$resultc =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_resultsc = mysqli_num_rows($resultc);
							for ($z=0; $z <$num_resultsc; $z++) {
								$rowc=mysqli_fetch_array($resultc);
								$bname=stripslashes($rowc['Branchname']);
										
										$e=0;
										$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='".$bname."'");
										$num_results = mysqli_num_rows($result);
										if($num_results>0){
										$row=mysqli_fetch_array($result);
          if(stripslashes($row['col1'])=='ADMINISTRATION'){ $categ='DRUGS [ MEDICINE / DAWA ]'; } else{ $categ=stripslashes($row['col1']);}
										?>
  <div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center"><?php  echo $categ; ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div> 
                                        
                                        <?php
										
										}
							}
							
?>

<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='HOSPITAL FEES'");
$num_results = mysqli_num_rows($result);
							for ($z=0; $z <$num_results; $z++) {
								$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center"><?php  echo stripslashes($row['col1']) ?> - <?php  echo stripslashes($row['col2']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<div style="clear:both; "></div>
<?php } ?>

<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='OTHER FEES'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">OTHER FEES - <?php  echo stripslashes($row['col2']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>



<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='SUBTOTAL'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left; ">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center;font-weight:BOLD">SUBTOTAL</p>
    </div>
    <div><p style="text-align:center;font-weight:BOLD">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>
<div style="clear:both; margin-bottom:30px"></div>

<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='DISCOUNT'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left;border-TOP:1.5px solid #333;">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">DISCOUNT</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='BANK PAYMENT'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left;">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">BANK PAYMENT - REF NO:<?php  echo stripslashes($row['col3']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='CLAIM AMOUNT 1'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">COMPANY TO PAY-[<?php  echo stripslashes($row['col2']) ?>] - REF NO:<?php  echo stripslashes($row['col3']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>

<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='CLAIM AMOUNT 2'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">COMPANY TO PAY-[<?php  echo stripslashes($row['col2']) ?>] - REF NO:<?php  echo stripslashes($row['col3']) ?></p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>

<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='CASH TO PAY'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">BALANCE TO PAY</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<?php
$result =mysqli_query($db, "select * from finalbill  where rcptno=".$rcptno." and col1='DIFFERENCE'");
$row=mysqli_fetch_array($result);
?>
<div style="width:100%;  height:20px; border-bottom:1.5px solid #333; float:left">
    <div style="width:70%; height:20px;border-right:1.5px solid #333; float:left;"><p style="text-align:center">DIFFERENCE</p>
    </div>
    <div><p style="text-align:center">
   <script>document.writeln(( <?php  echo stripslashes($row['col5']) ?>).formatMoney(2, '.', ','));</script></p>
    </div>
</div>


<div style="clear:both; margin-bottom:30px"></div>
<p style="float:right;    margin:0 5px 0 0px">Signature........................</p>
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;    margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;    margin:0 0 0 0px">You were Served By <?php  echo $fullname ?>.</p>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">System Developers: BetterHealth.Co.Ke</p>
</div>

<?php 
break;




case 69:
$result =mysqli_query($db, "select * from  waivers where waiverno='".$rcptno."'");
$row=mysqli_fetch_array($result);
?>
<div style="width:740PX;min-height:800px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL WAIVER NOTE<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; margin-bottom:10px;border-top:1px dashed #333"></div>
<p style="text-align:left;margin-left:10px;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><strong>NAME : </strong>
<?php  echo stripslashes($row['patname']) ?>
<strong style="margin-left:20px"> PATIENT NO : </strong><?php  echo stripslashes($row['patid']) ?><strong style="margin-left:20px"> WAIVER NO : </strong><?php  echo stripslashes($row['waiverno']) ?></p>

<p style="text-align:left;margin-left:10px;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><strong>AMOUNT CHARGED: </strong>
<?php  echo stripslashes($row['amount_charged']) ?></p>
<p style="text-align:left;margin-left:10px;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><strong>AMOUNT PAID: </strong>
<?php  echo stripslashes($row['amount_paid']) ?></p>
<p style="text-align:left;margin-left:10px;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><strong>AMOUNT WAIVED: </strong>
<?php  echo stripslashes($row['amount_waived']) ?></p>
<p style="text-align:left;margin-left:10px;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><strong>RECEIPT NO (S): </strong>
<?php  echo stripslashes($row['receiptnos']) ?></p>
<p style="text-align:left;margin-left:10px;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><strong>DIAGNOSIS: </strong>
<?php  echo stripslashes($row['diagnosis']) ?></p>
<p style="text-align:left;margin-left:10px;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><strong>NOTES: </strong>
<?php  echo stripslashes($row['notes']) ?></p>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Prepared By <?php  echo  stripslashes($row['username']) ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>

</div>
<?php 
break;
case 70:
$date=date('Y/m/d');
$code=$_GET['code'];
$code2=$_GET['code2'];
#$code2         = safe_decode($_GET['code2']);
// $in_presc_no   = safe_decode($_GET['pno']);
// $in_presc_id   = safe_decode($_GET['pid']);
// $in_patient_id = safe_decode($_GET['cid']);
// $in_patient_no = safe_decode($_GET['cno']);
$a=$_GET['a'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);

	switch($a){

		case 1:
		$fname='all_lab_tests_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."'");
		}

		break;

		case 2:
		$fname='by_source_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where source='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  source='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  source='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  source='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  source='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  source='".$code2."'");
		}

		break;

		case 3:
		$fname='by_test_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where request='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  request='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  request='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  request='".$code2."'");
		}

		break;

		case 4:
		$fname='by_sample_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where sample='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  sample='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  sample='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  sample='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  sample='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  sample='".$code2."'");
		}

		break;


		case 5:
		$fname='patient_lab_requests';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		#$code2         = safe_decode($_GET['code2']);
		$in_presc_no   = safe_decode($_GET['pno']);
		$in_presc_id   = safe_decode($_GET['pid']);
		$in_patient_id = safe_decode($_GET['cid']);
		$in_patient_no = safe_decode($_GET['cno']);
		
		$result =mysqli_query($db, "select * from labrequests where patid='".$in_patient_no."' and old_in_patient_id='".$in_patient_id."' order by Id desc ");
		$row=mysqli_fetch_array($result);
		$patient=stripslashes($row['patname']);
		$patid=stripslashes($row['patid']);
		$labno=stripslashes($row['labno']);
		$unique=stripslashes($row['unique_no']);

		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where patid='".$in_patient_no."' and old_in_patient_id='".$in_patient_id."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and patid='".$in_patient_no."' and old_in_patient_id='".$in_patient_id."'");
		}

		else if($d1==0&&$code==1){
		#$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  patid='".$in_patient_no."' and old_in_patient_id='".$in_patient_id."'");
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  patid='".$_GET['code2']."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and patid='".$in_patient_no."' and old_in_patient_id='".$in_patient_id."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and patid='".$in_patient_no."' and old_in_patient_id='".$in_patient_id."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and patid='".$in_patient_no."' and old_in_patient_id='".$in_patient_id."'");
		}

		break;


		case 6:
		$fname='by_section_lab_reports';
		$catname=strtoupper(preg_replace('~_~', ' ', $fname));
		$code2=$_GET['code2'];
		
		if($d1==0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests where section='".$code2."'");
		}
		else if($d1!=0&&$code==2){
		$result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  section='".$code2."'");
		}

		else if($d1==0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  section='".$code2."'");
		}
		else if($d1!=0&&$code==1){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  section='".$code2."'");
		}
		
		else if($d1==0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  section='".$code2."'");
		}
		else if($d1!=0&&$code==0){
		$result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  section='".$code2."'");
		}

		break;




	}



?>

<div style="width:740px;min-height:800px; border:2px solid #333;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">LAB REQUEST<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/><strong style="font-size:11px">Category:<?php  echo $catname ?><br/></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo stamptodate($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo stamptodate($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="clear:both; border-bottom:1px dashed #333; margin-top:20px"></div>
<div style="clear:both; "/>

<p style="text-align:center;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;TEXT-ALIGN:center"><strong>Patient Name: </strong><?php  echo $patient ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Patient No: </strong><?php  echo $in_patient_no; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Lab No: </strong><?php  echo $unique ?></p>
<div style="clear:both; border-bottom:1px dashed #333; margin-bottom:10px"></div>


<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#fff; padding:0">
		<td  style="width:2%;">No.</td>
		<td  style="width:10%;TEXT-ALIGN:left;">Lab Test</td>
		<td  style="width:7%;">Date</td>
   		
   	
    </tr>

<?php
	$a=1;$aa=$bb=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	if(stripslashes($row['restype'])=='POSITIVE'){
		$aa+=1;
	}
	if(stripslashes($row['restype'])=='NEGATIVE'){
		$bb+=1;
	}
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#fff; font-weight:normal  ">';}
?>
    <td style="width:7%; border-color:#fff;TEXT-ALIGN:center; border-style:solid;"><?php echo $a ?></td>
    <td style="width:10%; border-color:#fff; TEXT-ALIGN:left; border-style:solid;"><?php echo stripslashes($row['request'])?></td>
    <td style="width:7%; border-color:#fff; border-style:solid;"><?php echo stripslashes($row['date'])?></td>
           
            
   		
    </tr>


<?php 
$a++;
} ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px;border-top:1px dashed #333;margin-top:30px"></div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick Recovery. We are now SHIF Accredited.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Requested :By <?php  echo stripslashes($row['requested']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign............................................Date.............................</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Done By: <?php  echo stripslashes($row['doneby']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign............................................Date.............................</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:10px 0 0 0px">Verified By:.....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign............................................Date.............................</p>

<div style="clear:both; margin-bottom:50px;border-top:1px dashed #333; "></div>
<p style="text-align:center;font-size:10px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin:0 0 0 0px">We wish you quick Recovery.</p>
<p style="text-align:center;font-size:10px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Printed By <?php  echo $username ?>.</p>
<p style="text-align:center;font-size:10px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin:0 0 0 0px">System Developers: betterhealth.co.ke</p>
<div style="clear:both;margin-top:10px "></div>

</div>
<?php 
break;

case 71:

$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname='patients_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $name ?>&nbsp;&nbsp;PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1; ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2; ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:2%;">No.</td>
   		<td  style="width:4%;">Patient No.</td>
        <td  style="width:10%;">Patient Name</td>
        <td  style="width:3%;">Age</td>
        <td  style="width:5%;">Gender (M/F)</td>
        <td  style="width:5%;">Mobile No.</td>
        <td  style="width:5%;">Location / Village</td>
        <td  style="width:4%;">Temp.</td>
        <td  style="width:6%;">BP Reading (Systolic / Diastolic)</td>
        <td  style="width:4%;">Weight</td>
        <td  style="width:3%;">Resp. Rate</td>
        <td  style="width:3%;">Pulse. Rate</td>
        <td  style="width:3%;">R.B.S</td>
        <td  style="width:20%;">Prescription</td>
        <td  style="width:5%;">New / Re-Attendance</td>
        <td  style="width:5%;">New Screening this Year?</td>
        <td  style="width:5%;">Known Hypertensive (Yes/No)</td>
        <td  style="width:5%;">Taking Medicine (Yes/No)</td>
    </tr>   

<?php


$dept1=array(array());
$resultv =mysqli_query($db, "select * from filterclinics order by name");
$num_resultvs = mysqli_num_rows($resultv);
for ($i=0; $i <$num_resultvs; $i++) {
$dept1[$i]=array(0,0,0,0); 
}

$resultv =mysqli_query($db, "select * from filterclinics order by id");
$num_resultvs = mysqli_num_rows($resultv);
for ($i=0; $i <$num_resultvs; $i++) {
$rowv=mysqli_fetch_array($resultv);
$dept1[$i][1]=stripslashes($rowv['name']);
$dept1[$i][0]=stripslashes($rowv['id']);
$dept1[$i][2]=stripslashes($rowv['abbr']);
}
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
  $dept1[$x][2]==0;
  }
//$arr1=array();$arr2=array();$arr3=array();

$dept2=array(array());
$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$dept2[$i]=array(0,0,0,0); 
}

$result =mysqli_query($db, "select * from tbltypes order by id");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$dept2[$i][1]=stripslashes($row['name']);
$dept2[$i][0]=stripslashes($row['id']);
$dept2[$i][2]=stripslashes($row['abbr']);
}

 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
 
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
  $dept2[$x][2]==0;
  }
//$arr1=array();$arr2=array();$arr3=array();

	if($d1==0){
	  $result =mysqli_query($db, "select * from newprescription where OtherDetails='".$name."'");
	  //$result =mysqli_query($db, "select * from newprescription where typeclinics='".$name."' and status=1");
	}else{
	  $result =mysqli_query($db, "select * from newprescription where OtherDetails='".$name."' and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	  //$result =mysqli_query($db, "select * from newprescription where typeclinics='".$name."' and status=1 and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
	$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
	$PatId=stripslashes($row['PatId']);

		  //get receipt no
		  $question =mysqli_query($db, "SELECT * FROM patients where pntno='".$PatId."'  order by auto desc");
		  $rowa=mysqli_fetch_array($question);
		  //$rcptno=stripslashes($rowa['RcptNo']);

		  //count gender
		  $max1=count($dept1);
		  for ($x= 0; $x < $max1; $x++){
		    $var1=strtolower($dept1[$x][1]);
		    $var2=strtolower(stripslashes($rowa['gender']));
		    if($var1==$var2){
		      $dept1[$x][2]+=1;  
		      $dept1[$x][3]=$dept1[$x][2];
		    }
		  }
		  
		  //count attendance
		  $max2=count($dept2);
		  for ($x= 0; $x < $max2; $x++){
		    $var1=$dept2[$x][1];
		    $var2=stripslashes($row['Type']);
		    if(like_match('%'.$var1.'%',$var2)){
		      $dept2[$x][2]+=1;  
		      $dept2[$x][3]=$dept2[$x][2];
		    }
		  }


	if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">'; } else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; } ?>

   		  <td style="width:2%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i; ?></td>
   		  <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']); ?></td>
          <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  stripslashes($row['PatName']);?></td>
	      <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['age']); ?></td>
	      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['gender']); ?></td>
	      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['contact']); ?></td>
	      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['address']); ?></td>
	      <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Temp']); ?></td>
          <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Bp1']);?>/<?php  echo stripslashes($row['Bp2']);?></td>
          <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Weight']);?></td>
          <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['RespRate']); ?></td>
          <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PulseRate']); ?></td>
          <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Rbs']); ?></td>
          <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Prescription']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Type']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['newscreening']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['knownhyper']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['takingmeds']); ?></td>
    </tr>


<?php } ?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:2%;">No.</td>
   		<td  style="width:4%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:4%;"></td>
        <td  style="width:6%;"></td>
        <td  style="width:4%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:20%;">TOTALS :</td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"><?php  //echo $TotalYes; ?></td>
        <td  style="width:5%;"><?php  //echo $Yesknownhyper; ?></td>
        <td  style="width:5%;"><?php  //echo $Yestomeds; ?></td>
    </tr>    
</tbody>
</table>	


<div style="clear:both; margin-bottom:20px;border-top:1px dashed #333;margin-top:30px"></div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Gender Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
    if($dept1[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept1[$x][1].": ".$dept1[$x][3]."</p>";
    }
  }
    
?>
</div>
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">New / Re-Attendance</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
    if($dept2[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept2[$x][1].": ".$dept2[$x][3]."</p>";
    }
  }
    
?>
</div>
<div style="clear:both; margin-bottom:20px"></div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 71123:

$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname='patients_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $name ?>&nbsp;&nbsp;PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:2%;">No.</td>
   		<td  style="width:4%;">Patient No.</td>
        <td  style="width:10%;">Patient Name</td>
        <td  style="width:3%;">Age</td>
        <td  style="width:5%;">Gender (M/F)</td>
        <td  style="width:5%;">Mobile No.</td>
        <td  style="width:5%;">Location / Village</td>
        <td  style="width:4%;">Temp.</td>
        <td  style="width:6%;">BP Reading (Systolic / Diastolic)</td>
        <td  style="width:4%;">Weight</td>
        <td  style="width:3%;">Resp. Rate</td>
        <td  style="width:3%;">Pulse. Rate</td>
        <td  style="width:3%;">R.B.S</td>
        <td  style="width:20%;">Prescription</td>
        <td  style="width:5%;">New / Re-Attendance</td>
        <td  style="width:5%;">New Screening this Year?</td>
        <td  style="width:5%;">Known Hypertensive (Yes/No)</td>
        <td  style="width:5%;">Taking Medicine (Yes/No)</td>
    </tr>    
<?php

	if($d1==0){
	$result =mysqli_query($db, "select * from newprescription where OtherDetails='".$name."'");
	//$result =mysqli_query($db, "select * from newprescription where typeclinics='".$name."' and status=1");
	}else{
	$result =mysqli_query($db, "select * from newprescription where OtherDetails='".$name."' and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	//$result =mysqli_query($db, "select * from newprescription where typeclinics='".$name."' and status=1 and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
	$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
	$PatId=stripslashes($row['PatId']);


	//$resultz=mysqli_query($db, "SELECT COUNT(*) FROM newprescription where OtherDetails='".$name."'");
	$resultz=mysqli_query($db, "SELECT COUNT(newscreening) AS Yesnewscreening FROM newprescription where newscreening='Yes' and OtherDetails='".$name."'");
	$rowz=mysqli_fetch_array($resultz);
	$TotalYes=$rowz['Yesnewscreening'];
	//SELECT COUNT(*) FROM count_demos;
	//SELECT COUNT(ProductID) AS NumberOfProducts FROM Products; 
	$resultv=mysqli_query($db, "SELECT COUNT(knownhyper) AS Yesknownhyper FROM newprescription where knownhyper='Yes' and OtherDetails='".$name."'");
	$rowv=mysqli_fetch_array($resultv);
	$Yesknownhyper=$rowv['Yesknownhyper'];

	$resultx=mysqli_query($db, "SELECT COUNT(takingmeds) AS Yestakingmeds FROM newprescription where takingmeds='Yes' and OtherDetails='".$name."'");
	$rowx=mysqli_fetch_array($resultx);
	$Yestomeds=$rowx['Yestakingmeds'];

							//get receipt no
							$question =mysqli_query($db, "SELECT * FROM patients where pntno='".$PatId."' order by auto desc");
							$rowa=mysqli_fetch_array($question);
							//$rcptno=stripslashes($rowa['RcptNo']);

	
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		  <td style="width:2%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i; ?></td>
   		  <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']); ?></td>
          <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  stripslashes($row['PatName']);?></td>
	      <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['age']); ?></td>
	      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['gender']); ?></td>
	      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['contact']); ?></td>
	      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($rowa['address']); ?></td>
	      <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Temp']); ?></td>
          <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Bp1']);?>/<?php  echo stripslashes($row['Bp2']);?></td>
          <td style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Weight']);?></td>
          <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['RespRate']); ?></td>
          <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PulseRate']); ?></td>
          <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Rbs']); ?></td>
          <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Prescription']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Type']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['newscreening']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['knownhyper']); ?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['takingmeds']); ?></td>
    </tr>


<?php } ?>

<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:2%;">No.</td>
   		<td  style="width:4%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"></td>
        <td  style="width:4%;"></td>
        <td  style="width:6%;"></td>
        <td  style="width:4%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:3%;"></td>
        <td  style="width:20%;">TOTALS :</td>
        <td  style="width:5%;"></td>
        <td  style="width:5%;"><?php  echo $TotalYes; ?></td>
        <td  style="width:5%;"><?php  echo $Yesknownhyper; ?></td>
        <td  style="width:5%;"><?php  echo $Yestomeds; ?></td>
    </tr>    
</tbody>
</table>	

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;
case 72: 

$date=date('Y/m/d');
$name=$_GET['name'];
$code=$_GET['code'];
$insname=$_GET['insname'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$timer1=$_GET['timer1'];
$timer2=$_GET['timer2'];
$fname=strtolower($name).'_cashier_summary';
?>
<div style="width:100%;min-height:260px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL DAILY CASHIER SUMMARY REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;<?php  echo $timer1 ?>&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo dateprint($d2) ?>&nbsp;&nbsp;&nbsp;<?php  echo $timer2 ?></p>


<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CASHIER USER ID:<?php  echo $_GET['name'] ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $_GET['insname'] ?></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
$time1=backtime($timer1);
$time2=backtime($timer2);
$d1=$d1.$time1;
$d2=$d2.$time2;
?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">Date</td>
        <td  style="width:6%;">Patient Id</td>
        <td  style="width:17%;">Patient Name</td>
        <td  style="width:6%;">Pay Mode</td>
         <td  style="width:14%;">Company</td>
         <td  style="width:10%;">Rcpt/Invoice No</td>
       <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Time</td>
         <td  style="width:10%;">Department</td>
        <td  style="width:8%;">User Id</td>
    </tr>
    

<?php
$arr1=array();$arr2=array();$arr3=array();
	if($d1==0){
	$result =mysqli_query($db, "SELECT * FROM receipts  WHERE status!=0 AND username='".$name."' AND cname='".$insname."' AND paymode!='DMRP'");
	}
	else{
	$result =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<='".$d2."'  AND status!=0  AND username='".$name."' AND cname='".$insname."' AND paymode!='DMRP'");
	}
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
	$x+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}

	loop56($row,$i);
	}




?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Cashier's Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash Held: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank: <script>document.writeln(( <?php  echo $x ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 73: 

$date=date('Y/m/d');
$name=$_GET['name'];
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$timer1=$_GET['timer1'];
$timer2=$_GET['timer2'];
$fname=strtolower($name).'_cashier_summary';
?>
<div style="width:100%;min-height:260px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL DAILY CASHIER SUMMARY REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;<?php  echo $timer1 ?>&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo dateprint($d2) ?>&nbsp;&nbsp;&nbsp;<?php  echo $timer2 ?></p>


<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CASHIER USER ID:<?php  echo $_GET['name'] ?></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
$time1=backtime($timer1);
$time2=backtime($timer2);
$d1=$d1.$time1;
$d2=$d2.$time2;
?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">Date</td>
        <td  style="width:6%;">Patient Id</td>
        <td  style="width:17%;">Patient Name</td>
        <td  style="width:6%;">Pay Mode</td>
         <td  style="width:14%;">Company</td>
         <td  style="width:10%;">Rcpt/Invoice No</td>
       <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Time</td>
         <td  style="width:10%;">Department</td>
        <td  style="width:8%;">User Id</td>
    </tr>
    

<?php
$arr1=array();$arr2=array();$arr3=array();
	if($d1==0){
	$result =mysqli_query($db, "SELECT * FROM receipts  WHERE status!=0 AND username='".$name."' AND amount!=0 AND paymode IN('Cash','DMRP') ");
	}
	else{
	$result =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<='".$d2."'  AND status!=0 AND amount!=0  AND username='".$name."' AND paymode IN('Cash','DMRP') ");
	}
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
	$x+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='DMRP'){
	$cc+=preg_replace('~,~', '', stripslashes($row['amount']));
	}

	loop606($row,$i);
	}




?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Cashier's Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash Held: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<!-- <p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px" title="Debtors Payments Received as Cash:">
	Debtors Payments: <script>document.writeln(( <?php  #echo $y ?>).formatMoney(2, '.', ','));</script></p> -->
</div>
<div style="float:right">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Accounts Receivable</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Amount : <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;
case 74: 

$date=date('Y/m/d');
$name=$_GET['name'];
$code=$_GET['code'];
$insname=$_GET['insname'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$timer1=$_GET['timer1'];
$timer2=$_GET['timer2'];
$fname=strtolower($name).'_cashier_summary';
?>
<div style="width:100%;min-height:260px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase;">OFFICIAL Laboratory Income SUMMARY REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;<?php  echo $timer1 ?>&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo dateprint($d2) ?>&nbsp;&nbsp;&nbsp;<?php  echo $timer2 ?></p>


<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase;">Laboratory SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase;">Full Statement Report</p>
<?php } ?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase;">Mode of Payment :<?php  echo $_GET['name'] ?></p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px;text-transform:uppercase;"><?php  echo $_GET['insname'] ?></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
$time1=backtime($timer1);
$time2=backtime($timer2);
$d1=$d1.$time1;
$d2=$d2.$time2;
?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:10%;">Date</td>
        <td  style="width:6%;">Patient Id</td>
        <td  style="width:17%;">Patient Name</td>
        <td  style="width:6%;">Pay Mode</td>
         <td  style="width:14%;">Company</td>
         <td  style="width:10%;">Rcpt/Invoice No</td>
         <td  style="width:10%;">Amount</td>
        <td  style="width:10%;">Time</td>
         <td  style="width:10%;">Department</td>
        <td  style="width:8%;">User Id</td>
    </tr>
    

<?php
$arr1=array();$arr2=array();$arr3=array();
	if($d1==0){
	 $result =mysqli_query($db, "SELECT * FROM receipts WHERE category='LABORATORY' AND paymode='".$name."' AND cname='".$insname."' AND paymode!='DMRP'");
	}else{
	 $result =mysqli_query($db, "SELECT * FROM receipts WHERE timestamp>='".$d1."' AND timestamp<='".$d2."'  AND paymode='".$name."' AND cname='".$insname."' AND category='LABORATORY' AND paymode!='DMRP'");
	}
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
	$x+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}

	looppaymode56($row,$i);
	}




?>

</tbody>
</table>


<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Cashier's Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash Held: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank: <script>document.writeln(( <?php  echo $x ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 75:

$date=date('Y/m/d');
$stamp=date('Ymd');
$name=htmlspecialchars($_GET['name']);
$code=htmlspecialchars($_GET['code']);
if(isset($_GET['d1'])){
	$d1=htmlspecialchars($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=htmlspecialchars($_GET['d2']);
}else $d2=0;
$fname='general_Over18_clinic_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OPD EIGHTEEN & OVER&nbsp;&nbsp;PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
	<td  style="width:5%;">#</td>
	<td  style="width:5%;">Last Date Seen</td>
	<td  style="width:7%;">Re-Attend</td>
	<td  style="width:5%;">Patient No</td>
	<td  style="width:18%;">Patient Name</td>
	<td  style="width:6%;">Age</td>
	<td  style="width:5%;">Temperature</td>
	<td  style="width:5%;">BP</td>
	<td  style="width:5%;">Weight</td>
	<td  style="width:5%;">Resp Rate</td>
	<td  style="width:13%;">Diagnosis Details</td>
	<td  style="width:15%;">Treatment</td>
    </tr>    
<?php //echo $d1; echo $d2;
	  if($d1==0){
	  	$result =mysqli_query($db, "SELECT * FROM geteighteen_and_over where age>=18 ORDER BY Id"); // where age>=18 
	  }else{
	  	$result =mysqli_query($db, "SELECT * FROM  geteighteen_and_over WHERE age>=18 AND Stamp>='".$d1."' AND Stamp<='".$d2."' ORDER BY Id");
	  }


	$num_results = mysqli_num_rows($result);
	//for ($i=0; $i <$num_results; $i++) {
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
							//$notes=mysql_real_escape_string(trim(stripslashes($row['Prescription'])));
							// $notes=$notes.'<br/> Entry Made By:<b>'.$fullname.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date: :<b>'.date('d/m/Y').'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time:<b>'.date('H:i').'</b>';
							 $notes = strip_tags($row['Prescription'], '</br>');

	//$result2x =mysqli_query($db, "SELECT * FROM  newprescription WHERE PatId='".stripslashes($row['pntno'])."' ");// AND PatName='".stripslashes($row['fullnames'])."'
	//$row2x=mysqli_fetch_array($result2x);
	//$temp=stripslashes($row2x['Temp']);htmlspecialchars
	
	if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">'; }else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';} ?>

<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i; ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['TransDate']);; //echo stamptodate($d2)  ?></td>
<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Type']) ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
<td style="width:18%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['PatName'])?></td>
<td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo date('Y')-substr(stripslashes($row['dob']),-4,4)?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['Temp']); ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['Bp1']);?>/<?php  echo htmlspecialchars($row['Bp2']);?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Weight']);?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['RespRate']) ?></td>
<td style="width:13%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['DiagName']) ?></td>
<td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $notes; ?></td>
    </tr>


<?php } ?>

</tbody>
</table>	
	
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 75:

$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$fname='general_OPD_clinic_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box<?php echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OPD <?php  echo $name ?>&nbsp;&nbsp;PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:3%;">#</td>
        <td  style="width:7%;">Last Date Seen</td>
        <td  style="width:7%;">Re-Attend</td>
   		<td  style="width:5%;">Patient No</td>
        <td  style="width:13%;">Patient Name</td>
        <td  style="width:5%;">Temperature</td>
         <td  style="width:5%;">BP</td>
       <td  style="width:5%;">Weight</td>
        <td  style="width:5%;">Resp Rate</td>
        <td  style="width:5%;">PulseRate</td>
        <td  style="width:20%;">Diagnosis Details</td>
        <td  style="width:12%;">Department</td>
    </tr>    
<?php

	if($d1==0){
	$result =mysqli_query($db, "select * from newprescription where Dept='".$name."'");
	//$result =mysqli_query($db, "select * from newprescription where typeclinics='".$name."' and status=1");
	}else{
	$result =mysqli_query($db, "select * from newprescription where Dept='".$name."' and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	//$result =mysqli_query($db, "select * from newprescription where typeclinics='".$name."' and status=1 and  Stamp>='".$d1."' and Stamp<='".$d2."'");
	}
	$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
	

	
	if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i; ?></td>
   		<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['TransDate']) ?></td>
   		<td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Type']) ?></td>
   		<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
       <td style="width:13%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  stripslashes($row['PatName'])?></td>
      <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Temp']) ?></td>
       <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Bp1']);?>/<?php  echo stripslashes($row['Bp2']);?></td>
          <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Weight']);?></td>
        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['RespRate']) ?></td>
        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PulseRate']) ?></td>
        <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['DiagName']) ?></td>
        <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Dept']) ?></td>
    </tr>


<?php } ?>

</tbody>
</table>	
	
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;
case 76:

$date=date('Y/m/d');
$stamp=date('Ymd');
$name=htmlspecialchars($_GET['name']);
$code=htmlspecialchars($_GET['code']);
if(isset($_GET['d1'])){
	$d1=htmlspecialchars($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=htmlspecialchars($_GET['d2']);
}else $d2=0;
$fname='general_Over18_clinic_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OPD EIGHTEEN & OVER&nbsp;&nbsp;PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:3%;">#</td>
        <td  style="width:5%;">Last Date Seen</td>
        <td  style="width:5%;">Re-Attend</td>
   		<td  style="width:5%;">Patient No</td>
        <td  style="width:15%;">Patient Name</td>
        <td  style="width:3%;">Age</td>
        <td  style="width:5%;">Temperature</td>
        <td  style="width:5%;">BP</td>
        <td  style="width:5%;">Weight</td>
        <td  style="width:5%;">Resp Rate</td>
   		<td  style="width:5%;">Gender</td>
        <td  style="width:5%;">Clinic</td>
        <td  style="width:10%;">Diagnosis Details</td>
        <td  style="width:23%;">Treatment</td>
    </tr>    
<?php //echo $d1; echo $d2;

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
  	$result =mysqli_query($db, "SELECT * FROM geteighteen_and_over where age>=18 ORDER BY id"); // where age>=18 
  }else{
  	$result =mysqli_query($db, "SELECT * FROM  geteighteen_and_over WHERE age>=18 AND Stamp>='".$d1."' AND Stamp<='".$d2."' ORDER BY Id");
  }


	$num_results = mysqli_num_rows($result);
	//for ($i=0; $i <$num_results; $i++) {
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
	//$PatId=stripslashes($row['PatId']);
	$notes = strip_tags($row['Prescription'], '</br>');

	
  $resultx =mysqli_query($db, "select * from  newprescription where PatId='".stripslashes($row['PatId'])."' limit 0,1");
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
   
	
	if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">'; }else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';} ?>

   		<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i; ?></td>
   		<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['TransDate']);?></td>
   		<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Type']) ?></td>
   		<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
        <td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['PatName'])?></td>
        <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo date('Y')-substr(stripslashes($row['dob']),-4,4)?></td>
        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['Temp']); ?></td>
        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['Bp1']);?>/<?php  echo htmlspecialchars($row['Bp2']);?></td>
        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Weight']);?></td>
        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['RespRate']) ?></td>
   		<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gender']) ?></td>
        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['OtherDetails']) ?></td>
        <?php 
        	if(stripslashes($row['OtherDetails'])!="NONE"&&stripslashes($row['OtherDetails'])!=''){
				echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['DiagName']).'</td>';
				echo'<td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;">'.$notes.'</td>';
			}else{
				echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
				echo'<td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
			}

        ?>
    </tr>


<?php } ?>

</tbody>
</table>	

<div style="clear:both; margin-bottom:10px"></div>
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Clinic Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
    if($dept2[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept2[$x][1].": ".$dept2[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">New / Re-Attendance</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
    if($dept1[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept1[$x][1].": ".$dept1[$x][3]."</p>";
    }
  }
    
?>
</div>


<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Gender Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept3);
for ($x= 0; $x < $max1; $x++){
    if($dept3[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept3[$x][1].": ".$dept3[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 77:

$date=date('Y/m/d');
$stamp=date('Ymd');
$name=htmlspecialchars($_GET['name']);
$code=htmlspecialchars($_GET['code']);
if(isset($_GET['d1'])){
	$d1=htmlspecialchars($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=htmlspecialchars($_GET['d2']);
}else $d2=0;
$fname='general_Over18_clinic_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OPD EIGHTEEN & OVER&nbsp;&nbsp;PATIENTS LIST<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Report</p>
<?php }?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
<td  style="width:3%;">#</td>
<td  style="width:5%;">Last Date Seen</td>
<td  style="width:5%;">Re-Attend</td>
<td  style="width:5%;">Patient No</td>
<td  style="width:15%;">Patient Name</td>
<td  style="width:3%;">Age</td>
<td  style="width:5%;">Temperature</td>
<td  style="width:5%;">BP</td>
<td  style="width:5%;">Weight</td>
<td  style="width:5%;">Resp Rate</td>
<td  style="width:5%;">Gender</td>
<td  style="width:5%;">Clinic</td>
<td  style="width:10%;">Diagnosis Details</td>
<td  style="width:23%;">Treatment</td>
    </tr>    
<?php //echo $d1; echo $d2;

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
  	$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.geteighteen_and_over WHERE age>=18 ORDER BY Id"); // where age>=18 
  	#$result =mysqli_query($db, "SELECT * FROM dsbetterhealth_310322_1202_edited.geteighteen_and_over WHERE age>=18 ORDER BY Id"); // where age>=18 
  }else{
  	$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.geteighteen_and_over WHERE age>=18 AND Stamp>='".$d1."' AND Stamp<='".$d2."' ORDER BY Id");
  	#$result =mysqli_query($db, "SELECT * FROM dsbetterhealth_310322_1202_edited.geteighteen_and_over WHERE age>=18 AND Stamp>='".$d1."' AND Stamp<='".$d2."' ORDER BY Id");
  }


	$num_results = mysqli_num_rows($result);
	//for ($i=0; $i <$num_results; $i++) {
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
	//$PatId=stripslashes($row['PatId']);
	$notes = strip_tags($row['Prescription'], '</br>');

	
  $resultx =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.newprescription WHERE PatId='".stripslashes($row['PatId'])."' LIMIT 0,1");
  #$resultx =mysqli_query($db, "SELECT * FROM dsbetterhealth_310322_1202_edited.newprescription WHERE PatId='".stripslashes($row['PatId'])."' LIMIT 0,1");
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
   
	
	if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">'; }else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';} ?>

<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $i; ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['TransDate']);?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Type']) ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['PatId']) ?></td>
<td style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;"><?php echo stripslashes($row['PatName'])?></td>
<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo date('Y')-substr(stripslashes($row['dob']),-4,4)?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['Temp']); ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo htmlspecialchars($row['Bp1']);?>/<?php  echo htmlspecialchars($row['Bp2']);?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Weight']);?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['RespRate']) ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['gender']) ?></td>
<td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['OtherDetails']) ?></td>
        <?php 
        	if(stripslashes($row['OtherDetails'])!="NONE"&&stripslashes($row['OtherDetails'])!=''){
				echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['DiagName']).'</td>';
				echo'<td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;">'.$notes.'</td>';
			}else{
				echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
				echo'<td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"></td>';
			}

        ?>
    </tr>


<?php } ?>

</tbody>
</table>	

<div style="clear:both; margin-bottom:10px"></div>
<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Clinic Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max2=count($dept2);
for ($x= 0; $x < $max2; $x++){
    if($dept2[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept2[$x][1].": ".$dept2[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">New / Re-Attendance</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept1);
for ($x= 0; $x < $max1; $x++){
    if($dept1[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept1[$x][1].": ".$dept1[$x][3]."</p>";
    }
  }
    
?>
</div>


<div style="float:right">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Gender Count</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<?php
$max1=count($dept3);
for ($x= 0; $x < $max1; $x++){
    if($dept3[$x][3]>0){
    echo"<p style=\"text-align:right;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px\">".$dept3[$x][1].": ".$dept3[$x][3]."</p>";
    }
  }
    
?>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 78:

$result =mysqli_query($db, "SELECT * FROM newprescription WHERE PrescId='".$rcptno."'");
$row=mysqli_fetch_array($result);
$date=date('d/m/Y');
$transdate=stripslashes($row['TransDate']);
$prescid=stripslashes($row['PrescId']);
$patid=stripslashes($row['PatId']);


$resultx =mysqli_query($db, "SELECT * FROM patients WHERE pntno='".$patid."'");
$rowx=mysqli_fetch_array($resultx);
?>
<div style="width:740px;min-height:260px; border:2px solid #333; overflow:auto;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;padding:5px">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?><br/> TEL: <?php  echo $tel ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL OUT PATIENT RECORD<br/><strong style="font-size:11px">Date:<?php  echo $date ?><br/>Record No: <?php  echo $rcptno ?></strong></p>
<div style="clear:both"></div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="color:#fff;font-size:14px; background:#333; text-align:center; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><strong>Patient ID:</strong>&nbsp;<?php  echo stripslashes($row['PatId']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Patient name: </strong><?php  echo stripslashes($row['PatName']) ?>&nbsp; &nbsp;&nbsp;&nbsp;Age:<?php  echo stripslashes($rowx['age']) ?>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <strong>Record ID: </strong><?php  echo $rcptno ?></p><div style="clear:both; margin-bottom:1px"></div>
<img alt="Convert to Pdf" src="images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-33px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>

<p  style="font-size:14px; color:#fff; background:#333;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:center; margin-top:0px; padding-top:0">Insurance:<?php  echo stripslashes($rowx['insurer']); ?>&nbsp; &nbsp;&nbsp;&nbsp;Card No:<?php  echo stripslashes($rowx['cardno']) ?>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Identity No:<?php  echo stripslashes($rowx['idno']) ?>&nbsp; &nbsp;&nbsp;&nbsp;<strong>Date: </strong><?php  echo stripslashes($row['TransDate']); ?></p>
<div style="padding:5px 0">
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Triage Analysis:</strong><br/></p>
<?php //include('outpathistory.php'); ?>


<div class="col-lg-6" style="background:#000">
            <div class="col-md-6" style="background:#fff;width:400px;float:right">
         
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><strong>Pulse Rate:</strong>&nbsp;<?php echo stripslashes($row['PulseRate']) ?> Beats/Min<br/><strong>Random Blood Sugar:</strong>&nbsp;<?php echo stripslashes($row['Rbs']) ?> mMoles/Ltr<br/></p>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Health Problems/Allergies: </strong><?php echo stripslashes($row['Allergies']) ?></p>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Other Details: </strong><?php echo stripslashes($row['OtherDetails']) ?></p>
            </div> 
     
</div>


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 20px"><strong>Temparature:</strong>&nbsp;<?php  echo stripslashes($row['Temp']) ?></strong> Celsius<br/><strong>Blood Pressure:</strong>&nbsp;<?php  echo stripslashes($row['Bp1']) ?>/<?php  echo stripslashes($row['Bp2']) ?> mmHg<br/><strong>Weight:</strong>&nbsp;<?php echo stripslashes($row['Weight']) ?> Kgs<br/>
<strong>Resp. Rate:</strong>&nbsp;<?php echo stripslashes($row['RespRate']) ?> Breaths/Min</p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>History:</strong><?php echo stripslashes($row['History']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Physical Examination:</strong><?php echo stripslashes($row['PhyExam']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Lab Investigations:</strong>
<?php 

$resultb =mysqli_query($db, "select * from labrequests where prescid='".$prescid."' order by id");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
															else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
				
				echo'
				<p style="margin-left:20px">
				Date: <b>'.stripslashes($rowb['date']).'</b>
				<br/>
				<b>Lab Request</b>'.$x.'<br/>
				'.stripslashes($rowb['request']).'
				<br/>
				<b>Lab Results</b>
				<br/>
				'.stripslashes($rowb['results']).'
			
				</p><div style="clear:both; margin:10px 0; border-top:1px dashed #333"></div>
				';


}
 ?>


<div style="clear:both; margin:0px 0 10px 0; border-bottom:1px solid #333"></div>
<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Radiology Investigations:</strong>
<?php 

$resultb =mysqli_query($db, "select * from radrequests where prescid='".$prescid."' order by id");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
															else{$x='<b style="color:#125d30"> - [COMPLETED]</b>-DONE BY: <b>'.stripslashes($rowb['doneby']).'</b>';}
				
				echo'
				<p style="margin-left:20px">
				Date: <b>'.stripslashes($rowb['date']).'</b>
				<br/>
				<b>Radiology Request</b>'.$x.'<br/>
				'.stripslashes($rowb['request']).'
				<br/>
				<b>Radiology Results</b>
				<br/>
				'.stripslashes($rowb['results']).'
			
				</p><div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
				';


}
 ?><div style="clear:both; margin:0 0 10px 0; border-top:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Diagnosis:</strong><?php echo stripslashes($row['Diagnosis']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div>

<!-- <p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 20px 0 20px"><strong>Surgeries:</strong><br/><?php ///echo stripslashes($row['Treatment']) ?></p>
<div style="clear:both; margin:10px 0; border-bottom:1px solid #333"></div>
<div style="clear:both; margin-bottom:10px"></div> -->


<p style="font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-10px 20px 0 20px"><strong>Prescription:</strong><?php 

$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$prescid."' order by id");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															
				echo'
				<p style="margin-left:20px;margin-top:-10px">'.stripslashes($rowb['prescription']).'</p><div style="clear:both; margin:10px 0; border-bottom:1px dashed #333"></div>
				';
			}
  ?></p>

<div style="clear:both; margin-bottom:10px"></div>


<div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 79:

$section=$_GET['section'];
$categ=$_GET['categ'];
$code=$_GET['code'];
$fname=strtolower($rcptno).'_stock_valuation';
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL STOCK VALUATION REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>
<?php
if($code==0){
echo 'Dept:'.$rcptno.'<br/>Section:All';	
}
else if($code==1){
echo 'Dept:'.$rcptno.'<br/>Section:'.$section.'<br/>Category:All';		
}else{echo 'Dept:'.$rcptno.'<br/>Section:'.$section.'<br/>Category:'.$categ.'';	}
?>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:40%;">Item Name</td>
        <td  style="width:12%;">Pack Size</td>
        <td  style="width:12%;">Unit</td>
       <td  style="width:12%;">Part</td>
        <td  style="width:23%;">Total</td>
    </tr>

<?php //if($rcptno=='PROCUREMENT'){$x='Bal';}else {$x=$rcptno;}	
if($rcptno=='ADMINISTRATION'){$x='Bal';}else {$x=$rcptno;}	
if($code==0){
	$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.items WHERE Type='GOOD' AND ".$x." >0 ORDER BY ItemName ASC,Category ASC");
}
else if($code==1){
	$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.items WHERE Type='GOOD' AND ".$x." >0  AND Category='".$section."' ORDER BY ItemName ASC,Category ASC");
}
else if($code==2){
	$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.items WHERE Type='GOOD'  AND ".$x." >0 AND Category='".$section."' AND SubCategory='".$categ."' ORDER BY ItemName ASC,Category ASC,SubCategory ASC");
}

$j=0;
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
$pack=stripslashes($row['Pack']);
$qty=stripslashes($row[$x]);
$part=$qty%$pack;
$unit=explode('.',($qty/$pack));
$unit=$unit[0];
$total=$qty*stripslashes($row['PurchPrice']);
$j+=$total;


if($i%2==0){
		echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['ItemName']) ?></td>
       <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['Pack']) ?></td>
      <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $unit ?></td>
          <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo $part ?></td>
        <td style="width:23%;border-width:0.5px; border-color:#666; border-style:solid;"><script>document.writeln(( <?php  echo $total ?>).formatMoney(2, '.', ','));</script></td>
    </tr>


<?php } ?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total Valuation: <script>document.writeln(( <?php  echo $j ?>).formatMoney(2, '.', ','));
</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

case 80:

?>
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL ASEET SHEET REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?><br/>
<?php
if($rcptno=='All'){
echo 'Category:All';	
}
else{
$result =mysqli_query($db,"select * from assetsubcategories where id='".$rcptno."'");
$row=mysqli_fetch_array($result);
echo 'Category:'.stripslashes($row['name']).'';
}
$fname=strtolower($rcptno).'_asset_sheet';
?>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>



<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
   		<td  style="width:22%;">Category</td>
        <td  style="width:16%;">Asset ID</td>
        <td  style="width:32%;">Name</td>
       <td  style="width:18%;">Location</td>
        <td  style="width:12%;">Available</td>
    </tr>

<?php
if($rcptno=='All'){
	$result =mysqli_query($db,"select * from assets  order by category asc,name asc");
}
else {
	$result =mysqli_query($db,"select * from assets where  subcatid='".$rcptno."' order by category asc,name asc");
}
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($result);
if($i%2==0){
			echo'
		<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
		}else{
			echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

   		<td style="width:22%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['category']) ?></td>
       <td style="width:16%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['assetid']) ?></td>
      <td style="width:32%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['name']) ?></td>
          <td style="width:18%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['location']) ?></td>
        <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
    </tr>


<?php } ?>

</tbody>
</table>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;


case 81:

$date=date('Y/m/d');
$stamp=date('Ymd');
//$code=$_GET['code'];
$rcptno=$_GET['rcptno'];
$pid=$_GET['pid'];
$cid=$_GET['cid'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:14px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:14px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:14px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"> PATIENTS RECEIPTS/INVOICES LIST <br/> <strong style="font-size:12px"> Date: <?php  echo dateprint($date) ?></strong></p>
<div style="clear:both"></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:14px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p><?php } else{?>
<p style="text-align:center;font-size:14px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Full Report</p>
<?php } ?>


<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:9%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Trans. Date</p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">ReceiptNo</p>
</div>
<div style="width:8%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Cust. No.</p>
</div>
<div style="width:18%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Customer Name.</p>
</div>
<div style="width:8%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">PaymentMode</p>
</div>
<div style="width:14%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Debtors Name.</p>
</div>
<div style="width:12%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Amount</p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Cashier</p>
</div>

</div>
<?php

	$result =mysqli_query($db,"select * from receipts where patid='".$pid."' and old_patient_id='".$cid."' and stamp='".date('Ymd')."' and status=1 and paymode!='DMRP'");
	$num_results = mysqli_num_rows($result);
	for ($i=1; $i <$num_results +1; $i++) {
	$row=mysqli_fetch_array($result);
	
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#f0f0f0" id="normal'.$i.'">';
	}
	
	?>

<div style="width:9%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['date']) ?></p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p onclick="window.open('outpathistory.php?id=63&rcptno=<?php  echo stripslashes($row['rcptno']) ?>&pid=<?php  echo stripslashes($row['patid']) ?>&cid=<?php  echo stripslashes($row['old_patient_id']) ?>')"  style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['rcptno']) ?></p>
</div>
<div style="width:8%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['patid']) ?></p>
</div>
<div style="width:18%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['patname']) ?></p>
</div>
<div style="width:8%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['paymode']) ?></p>
</div>
<div style="width:14%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['cname']) ?></p>
</div>
<div style="width:12%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['amount']) ?></p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:12px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['username']) ?></p>
</div>




</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:14px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:14px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 82:

$date=date('Y/m/d');
$stamp=date('Ymd');
$value=$_GET['value'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;

$resultx =mysqli_query($db,"select * from ledgers where ledgerid='".$value."'");
$rowx=mysqli_fetch_array($resultx);
$bal=stripslashes($rowx['bal']);
$name=stripslashes($rowx['name']);
?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">OFFICIAL CASHIER CREDIT SALES SUMMARY REPORT<br/><strong style="font-size:12px">Date:<?php  echo dateprint($date) ?></strong><br/> <?php if($value!='All'){?> <?php  echo $name ?>-Bal:<script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script> <?php } else{?> All-Bal:0.00 <?php } ?></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo $d1 ?>&nbsp;&nbsp;To:&nbsp;<?php  echo $d2 ?></p><?php } else{?>
<p style="text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;margin:0 0 0 0px">Full Report</p>
<?php } ?>

<div style="clear:both"></div>

<div style="clear:both; margin-bottom:10px"></div>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">

<div style="width:15%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Date</p>
</div>
<div style="width:11%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Trans. Date</p>
</div>

<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Dr Account</p>
</div>
<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Cr Account</p>
</div>
<div style="width:22%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Description</p>
</div>
<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#fff;text-align:center;font-size:12px;text-transform: uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Amount</p>
</div>
<div>
</div>
</div>
<?php

	$a=$d=$c=0;
	if($value=='All'){
	    if($d1==0){
		$result =mysqli_query($db,"select * from ledgerentries where module='DMRP' order by transid asc");
	    }
	    else{
		$result =mysqli_query($db,"select * from ledgerentries  where stamp>='".$d1."' and stamp<='".$d2."' and module='DMRP' order by transid asc");
	    }
	}
	else {
	    if($d1==0){
		$result =mysqli_query($db,"select * from ledgerentries where postby='".$name."' and module='DMRP' order by transid asc");
	    }
	    else{
		$result =mysqli_query($db,"select * from ledgerentries  where stamp>='".$d1."' and stamp<='".$d2."' and postby='".$name."' and module='DMRP' order by transid asc");
	    }

	}

	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$c+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333; " id="normal'.$i.'">';
	}else{
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'">';
	}
	
	?>
<div style="width:15%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden;">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['sysDate']) ?></p>
</div>
<div style="width:11%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo dateprint(stripslashes($row['date']))?></p>
</div>
<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:9px;text-transform: uppercase;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['drname']) ?></p>
</div>
<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:9px;text-transform: uppercase;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['crname']) ?></p>
</div>

<div style="width:22%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:9px;text-transform: uppercase;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['description']) ?></p>
</div>

<div style="width:10%; height:20px;float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>


</div>

</div>
<?php
	}

?>
<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total : <script>document.writeln(( <?php  echo $c ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>

</div>
<?php 

break;

case 83: 

$date=date('Y/m/d');
$name=$_GET['name'];
$code=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0; 
$timer1=$_GET['timer1'];
$timer2=$_GET['timer2'];
$fname=strtolower($name).'_cashier_summary';

?>
<div style="width:100%;min-height:260px; border:2px solid #333">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">OFFICIAL DAILY CASHIER SUMMARY REPORT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;<?php  echo $timer1 ?>&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo dateprint($d2) ?>&nbsp;&nbsp;&nbsp;<?php  echo $timer2 ?></p>


<?php } else if($code==6){?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==7){?>

<?php } else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Full Statement Report</p>
<?php } ?>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">CASHIER USER ID:<?php  echo $_GET['name'] ?></p>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
$time1=backtime($timer1);
$time2=backtime($timer2);
$d1=$d1.$time1;
$d2=$d2.$time2;
?>


<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
	<td  style="width:10%;">Date</td>
	<td  style="width:17%;">Particulars</td>
	<td  style="width:10%;">Pay Mode</td>
	<td  style="width:17%;">Company</td>
	<td  style="width:10%;">Rcpt/Invoice No</td>
	<td  style="width:10%;">Amount</td>
	<td  style="width:8%;">User Name</td>
    </tr>
    

<?php
$arr1=array();$arr2=array();$arr3=array();
  	if($name=='All'){
	   if($d1==0){
	   $result =mysqli_query($db, "SELECT * FROM receipts  WHERE status!=0 AND amount!=0 AND paymode!='Companies'");
	   }
	   else{
	   $result =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<='".$d2."'  AND status!=0 AND amount!=0 AND paymode!='Companies'");
	   }
       }
       else {
	   if($d1==0){
	   $result =mysqli_query($db, "SELECT * FROM receipts  WHERE status!=0 AND username='".$name."' AND amount!=0 AND paymode!='Companies'"); #AND paymode='Cash'
	   }
	   else{
	   $result =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<='".$d2."'  AND status!=0 AND amount!=0  AND username='".$name."' AND paymode!='Companies'"); #AND paymode='Cash'
	   }
       }
	$a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$x=0;$y=0;
	$num_results = mysqli_num_rows($result);
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$a+=preg_replace('~,~', '', stripslashes($row['amount']));
	
	if(stripslashes($row['paymode'])=='Cash'){
	$v+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Credit'){
	$w+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Bank'){
	$x+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='Companies'){
	$y+=preg_replace('~,~', '', stripslashes($row['amount']));	
	}
	if(stripslashes($row['paymode'])=='DMRP'){
	$cc+=preg_replace('~,~', '', stripslashes($row['amount']));
	}

	combinedloop606($row,$i);
	}




?>

<?php 

?>		
</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Amount: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Cashier's Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Cash Held: <script>document.writeln(( <?php  echo $v ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Companies: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank: <script>document.writeln(( <?php  echo $x ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Credit: <script>document.writeln(( <?php  echo $w?>).formatMoney(2, '.', ','));</script></p>
</div>
<div style="float:right">
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Accounts Receivable</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Amount : <script>document.writeln(( <?php  echo $cc ?>).formatMoney(2, '.', ','));</script></p>
</div>


<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
<?php 
break;

			case 84:
				//die('<h3 style="text-align:center;">Trial balance coming soon</h3>');
				if (isset($_GET['d1'])) {
					$d1 = trim(mysqli_real_escape_string($db, $_GET['d1']));
				} else $d1 = '2024-01-01';
				if (isset($_GET['d2'])) {
					$d2 = trim(mysqli_real_escape_string($db, $_GET['d2']));
				} else $d2 = date('Y-m-d');

				$d1_slash = trim(preg_replace('~-~', '/', $d1));
				$d2_slash = trim(preg_replace('~-~', '/', $d2));
				$date = date_create_from_format("Y/m/d", $d1_slash);
				$startdate_words = date_format($date, "jS M Y");

				$cash_trans = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$bank_trans = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$bank_meta = array();
				$receivables = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$receivables_meta = array();
				$account_payables = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$receipts = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$insurancereceipts = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());
				$expenses = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());

				$cash_trans_bfwd = array();
				$bank_trans_bfwd = array();
				//$bank_bfwd_meta = array();
				$receivables_bfwd = array();
				//$receivables_bfwd_meta = array();
				$account_payables_bfwd = array('ledgerid' => array(), 'tdr' => array(), 'tcr' => array());

				$res1 = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category IN('Cash','Cashier') ");
				while ($row = mysqli_fetch_assoc($res1)) {
					$cash_trans['ledgerid'][] = intval($row['ledgerid']);
					$cash_trans_bfwd[intval($row['ledgerid'])] = array('ledgerid' => intval($row['ledgerid']), 'tdr' => 0, 'tcr' => 0);
				}
				for ($i = 0; $i < count($cash_trans['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $cash_trans['ledgerid'][$i] . "' OR drid='" . $cash_trans['ledgerid'][$i] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == intval($cash_trans['ledgerid'][$i]))) {
							$cash_trans['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							//$cash_trans_bfwd[intval($row['crid'])]['tcr'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$cash_trans['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							//$cash_trans_bfwd[intval($row['drid'])]['tdr'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$bank_trans['ledgerid'][] = intval($row['ledgerid']);
					$bank_trans_bfwd[intval($row['ledgerid'])] = array('ledgerid' => intval($row['ledgerid']), 'tdr' => 0, 'tcr' => 0);
				}

				for ($i = 0; $i < count($bank_trans['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_trans['ledgerid'][$i] . "' OR drid='" . $bank_trans['ledgerid'][$i] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_trans['ledgerid'][$i])) {
							$bank_trans['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							//$bank_trans_bfwd[intval($row['crid'])]['tcr'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$bank_trans['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							//$bank_trans_bfwd[intval($row['drid'])]['tdr'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$cash = floatval(array_sum($cash_trans['tdr'])) - floatval(array_sum($cash_trans['tcr']));
				$bank = floatval(array_sum($bank_trans['tdr'])) - floatval(array_sum($bank_trans['tcr']));

				$resBM = mysqli_query($db, "SELECT DISTINCT ledgerid,`name` FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				while ($row = mysqli_fetch_assoc($resBM)) {
					$bank_meta[] = array('ledgerid' => intval($row['ledgerid']), 'name' => trim(stripslashes($row['name'])), 'balance' => 0);
				}

				for ($i = 0; $i < count($bank_meta); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_meta[$i]['ledgerid'] . "' OR drid='" . $bank_meta[$i]['ledgerid'] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_meta[$i]['ledgerid'])) {
							$bank_meta[$i]['balance'] -= floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$bank_meta[$i]['balance'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Income' AND category!='Insurance' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$receipts['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($receipts['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receipts['ledgerid'][$i] . "' OR drid='" . $receipts['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receipts['ledgerid'][$i])) {
							$receipts['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receipts['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `status`=1 AND `type`='Income' AND category='Insurance' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$insurancereceipts['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($insurancereceipts['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $insurancereceipts['ledgerid'][$i] . "' OR drid='" . $insurancereceipts['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $insurancereceipts['ledgerid'][$i])) {
							$insurancereceipts['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$insurancereceipts['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Expense' ");
				while ($row = mysqli_fetch_assoc($res)) {
					$expenses['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($expenses['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount,transType FROM ledgerentries WHERE (crid='" . $expenses['ledgerid'][$i] . "' OR drid='" . $expenses['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $expenses['ledgerid'][$i])) {
							$expenses['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$expenses['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$receivables['ledgerid'][] = 628;
				$receivables_bfwd[628] = array('ledgerid' => 628, 'tdr' => 0, 'tcr' => 0);
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=628  ");
				while ($row = mysqli_fetch_assoc($res)) {
					$receivables['ledgerid'][] = intval($row['ledgerid']);
					$receivables_bfwd[intval($row['ledgerid'])] = array('ledgerid' => intval($row['ledgerid']), 'tdr' => 0, 'tcr' => 0);
				}

				for ($i = 0; $i < count($receivables['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables['ledgerid'][$i] . "' OR drid='" . $receivables['ledgerid'][$i] . "') AND `date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables['ledgerid'][$i])) {
							$receivables['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							//$receivables_bfwd[intval($row['crid'])]['tcr'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receivables['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							//$receivables_bfwd[intval($row['drid'])]['tdr'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$receivables_meta[] = array('ledgerid' => 628, 'name' => 'Accounts Receivable', 'balance' => 0);
				$resRM = mysqli_query($db, "SELECT DISTINCT ledgerid,`name` FROM ledgers WHERE `type`='Asset' AND mainLedgerId=628 ");
				while ($row = mysqli_fetch_assoc($resRM)) {
					$receivables_meta[] = array('ledgerid' => intval($row['ledgerid']), 'name' => trim(stripslashes($row['name'])), 'balance' => 0);
				}

				for ($i = 0; $i < count($receivables_meta); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables_meta[$i]['ledgerid'] . "' OR drid='" . $receivables_meta[$i]['ledgerid'] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables_meta[$i]['ledgerid'])) {
							$receivables_meta[$i]['balance'] -= floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$receivables_meta[$i]['balance'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				$account_payables['ledgerid'][] = 629;
				$account_payables_bfwd['ledgerid'][] = 629;
				$res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=629 ");
				while ($row = mysqli_fetch_assoc($res)) {
					$account_payables['ledgerid'][] = intval($row['ledgerid']);
					$account_payables_bfwd['ledgerid'][] = intval($row['ledgerid']);
				}

				for ($i = 0; $i < count($account_payables['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $account_payables['ledgerid'][$i] . "' OR drid='" . $account_payables['ledgerid'][$i] . "') AND (`date`>='" . $d1_slash . "' AND `date`<='" . $d2_slash . "') ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $account_payables['ledgerid'][$i])) {
							$account_payables['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$account_payables['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				//PREVIOUS BALANCES
				// $res1 = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category IN('Cash','Cashier') ");
				// while ($row = mysqli_fetch_assoc($res1)) {
				// 	$cash_trans_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }

				//for ($i = 0; $i < count($cash_trans_bfwd); $i++) {
				foreach ($cash_trans_bfwd as $i => $v) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $cash_trans_bfwd[$i]['ledgerid'] . "' OR drid='" . $cash_trans_bfwd[$i]['ledgerid'] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && intval($row['crid']) == intval($cash_trans_bfwd[$i]['ledgerid'])) {
							//$cash_trans_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$cash_trans_bfwd[intval($row['crid'])]['tcr'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							//$cash_trans_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$cash_trans_bfwd[intval($row['drid'])]['tdr'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				// $res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE `type`='Asset' AND category='Bank' ");
				// while ($row = mysqli_fetch_assoc($res)) {
				// 	$bank_trans_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }

				//for ($i = 0; $i < count($bank_trans_bfwd); $i++) {
				foreach ($bank_trans_bfwd as $i => $v) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $bank_trans_bfwd[$i]['ledgerid'] . "' OR drid='" . $bank_trans_bfwd[$i]['ledgerid'] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $bank_trans_bfwd[$i]['ledgerid'])) {
							//$bank_trans_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$bank_trans_bfwd[intval($row['crid'])]['tcr'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							//$bank_trans_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$bank_trans_bfwd[intval($row['drid'])]['tdr'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				// $receivables_bfwd['ledgerid'][] = 628;
				// $res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=628  ");
				// while ($row = mysqli_fetch_assoc($res)) {
				// 	$receivables_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }

				//for ($i = 0; $i < count($receivables_bfwd); $i++) {
				foreach ($receivables_bfwd as $i => $v) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $receivables_bfwd[$i]['ledgerid'] . "' OR drid='" . $receivables_bfwd[$i]['ledgerid'] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $receivables_bfwd[$i]['ledgerid'])) {
							//$receivables_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$receivables_bfwd[intval($row['crid'])]['tcr'] += floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							//$receivables_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
							$receivables_bfwd[intval($row['drid'])]['tdr'] += floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}

				// $account_payables_bfwd['ledgerid'][] = 629;
				// $res = mysqli_query($db, "SELECT ledgerid FROM ledgers WHERE mainLedgerId=629 ");
				// while ($row = mysqli_fetch_assoc($res)) {
				// 	$account_payables_bfwd['ledgerid'][] = intval($row['ledgerid']);
				// }

				for ($i = 0; $i < count($account_payables_bfwd['ledgerid']); $i++) {
					$results = mysqli_query($db, "SELECT crid,drid,amount FROM ledgerentries WHERE (crid='" . $account_payables_bfwd['ledgerid'][$i] . "' OR drid='" . $account_payables_bfwd['ledgerid'][$i] . "') AND `date`<'" . $d1_slash . "' ORDER BY transid ASC ");
					while ($row = mysqli_fetch_assoc($results)) {
						if (intval($row['crid']) > 0 && (intval($row['crid']) == $account_payables_bfwd['ledgerid'][$i])) {
							$account_payables_bfwd['tcr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						} else {
							$account_payables_bfwd['tdr'][] = floatval(preg_replace('~,~', '', $row['amount']));
						}
					}
				}


				//$cash_bal_bfwd = floatval(array_sum($cash_trans_bfwd['tdr'])) - floatval(array_sum($cash_trans_bfwd['tcr']));
				//$bank_bal_bfwd = floatval(array_sum($bank_trans_bfwd['tdr'])) - floatval(array_sum($bank_trans_bfwd['tcr']));
				//$receivables_bal_bfwd = floatval(array_sum($receivables_bfwd['tdr'])) - floatval(array_sum($receivables_bfwd['tcr']));
				$cash_bal_bfwd = 0;
				$bank_bal_bfwd = 0;
				$receivables_bal_bfwd = 0;
				$account_payables_bal_bfwd = floatval(array_sum($account_payables_bfwd['tcr'])) - floatval(array_sum($account_payables_bfwd['tdr']));
				//for ($i = 0; $i < count($cash_trans_bfwd); $i++) {
				foreach ($cash_trans_bfwd as $i => $v) {
					$cash_bal_bfwd_single_acnt = floatval($cash_trans_bfwd[$i]['tdr']) - floatval($cash_trans_bfwd[$i]['tcr']);
					$cash_bal_bfwd += floatval($cash_bal_bfwd_single_acnt);
				}

				$output = '';

				$output .= '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml"><head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>Trial Balance Include Balance B/bfwd - Better Health</title>
					<meta name="keywords" content="" />
					<meta name="description" content="" />
	
					<head>
							<style type="text/css">
									.bhealth-table {
										width: 100%;
										font-family:helvetica sans-serif;
										font-size: 14px;
										border-collapse: collapse;
									
									}
									.bhealth-table th{
										text-align: left;
									}						
									.bhealth-table td,.bhealth-table th {
										border: 1px solid #aaa;
										padding: 8px;
									}
									.bhealth-table td {
										color:#000;
										font-size: 14px;
									}
									.bhealth-table-striped tr:nth-child(even){
										background-color:#ededed;
									}
							
							</style>
					</head>
					<body>';

				$output .= '<div style="width:100%;padding:10px;">
				<table class="bhealth-table bhealth-table-striped" style="width:100%;">
				  <thead>
					<tr>
					  <th colspan="4" style="text-align:center;">TRIAL BALANCE</th>
					</tr>
					<tr>
					  <th colspan="4" style="text-align:center;">PERIOD FROM ' . $d1 . ' TO ' . $d2 . ' </th>
					</tr>';
				$output .= '<tr style="background-color:rgba(15, 17, 18, 0.71);color:#fff;">';
				$output .= '<th colspan="2" style="text-align:left;">DESCRIPTION </th>
					  <th style="text-align:center;">DEBIT</th>
					  <th style="text-align:center;">CREDIT</th>';
				$output .= '</tr>';
				$output .= '</thead>
									<tbody>';
				$output .= '<tr>
								<th colspan="4" style="text-align:left;">CASH BALANCES</th>
							</tr>';
				$cash = floatval($cash) + floatval($cash_bal_bfwd);
				$output .= '<tr>
						  <td colspan="2" style="text-align:left;"> Cash Balances</td>
						  <td style="text-align:center;">' . number_format($cash, 2) . '</td>
						  <td style="text-align:center;"> </td>
					  </tr>';
				$output .= '<tr>
												<th colspan="4" style="text-align:left;">BANK BALANCES</th>
										</tr>';

				for ($i = 0; $i < count($bank_meta); $i++) {
					$bank_balbfwd_single_acnt = floatval($bank_trans_bfwd[$bank_meta[$i]['ledgerid']]['tdr']) - floatval($bank_trans_bfwd[$bank_meta[$i]['ledgerid']]['tcr']);
					$bank_bal_plus_balbfwd = floatval($bank_balbfwd_single_acnt) + floatval($bank_meta[$i]['balance']);
					$bank_bal_bfwd += floatval($bank_balbfwd_single_acnt);
					if (floatval($bank_bal_plus_balbfwd) != 0) {
						$output .= '<tr>
							<td colspan="2" style="text-align:left;"> ' . ucwords(trim(strtolower($bank_meta[$i]['name']))) . ' </td>
							<td style="text-align:center;">' . number_format($bank_bal_plus_balbfwd, 2, '.', ',') . '</td>
							<td style="text-align:center;"></td>
						</tr>';
					}
				}

				$bank = floatval($bank) + floatval($bank_bal_bfwd);
				// $output.='<tr>
				//                   <td colspan="2" style="text-align:left;">  Bank Balances </td>
				//                   <td style="text-align:center;">'.number_format($bank, 2).'</td>
				//                   <td style="text-align:center;"></td>
				//               </tr>';

				$output .= '<tr>
												<th colspan="4" style="text-align:left;">RECEIVABLES</th>
										</tr>';

				for ($i = 0; $i < count($receivables_meta); $i++) {
					$receivables_balbfwd_single_acnt = floatval($receivables_bfwd[$receivables_meta[$i]['ledgerid']]['tdr']) - floatval($receivables_bfwd[$receivables_meta[$i]['ledgerid']]['tcr']);
					$receivables_bal_plus_balbfwd = floatval($receivables_balbfwd_single_acnt) + floatval($receivables_meta[$i]['balance']);
					$receivables_bal_bfwd += floatval($receivables_balbfwd_single_acnt);
					if (floatval($receivables_bal_plus_balbfwd) != 0) {
						$output .= '<tr>
							<td colspan="2" style="text-align:left;"> ' . ucwords(trim(strtolower($receivables_meta[$i]['name']))) . ' </td>
							<td style="text-align:center;">' . number_format(floatval($receivables_bal_plus_balbfwd), 2, '.', ',') . '</td>
							<td style="text-align:center;"></td>
						</tr>';
					}
				}

				$receivables_bal = floatval($receivables_bal_bfwd) + floatval(array_sum($receivables['tdr'])) - floatval(array_sum($receivables['tcr']));

				// $output.='<tr>
				//             <td colspan="2" style="text-align:left;"> Receivables  </td>
				//             <td style="text-align:center;">'.number_format($receivables_bal,2).'</td>
				//             <td style="text-align:center;"></td>
				//         </tr>';


				$output .= '<tr>
						  <th colspan="4" style="height:22px;"></th>
					  </tr>';
				$output .= '<tr>
						  <th colspan="4" style="text-align:left;">EXPENSES</th>
					  </tr>';

				$expenses_bal = floatval(array_sum($expenses['tdr'])) - floatval(array_sum($expenses['tcr']));
				$output .= '<tr>
						  <td colspan="2" style="text-align:left;"> Payments  </td>
						  <td style="text-align:center;">' . number_format($expenses_bal, 2) . '</td>
						  <td style="text-align:center;"></td>
					  </tr>';

				$account_payables_bal = floatval(array_sum($account_payables['tcr'])) - floatval(array_sum($account_payables['tdr']));
				$account_payables_bal = floatval($account_payables_bal) + floatval($account_payables_bal_bfwd);
				$output .= '<tr>
						  <td colspan="2" style="text-align:left;"> Payables </td>
						  <td style="text-align:center;"></td>
						  <td style="text-align:center;">' . number_format($account_payables_bal, 2) . '</td>
					  </tr>';
				$output .= '<tr>
						  <th colspan="4" style="text-align:left;">RECEIPTS</th>
					  </tr>';

				$insurance_receipts_bal = floatval(array_sum($insurancereceipts['tcr'])) - floatval(array_sum($insurancereceipts['tdr']));
				$output .= '<tr>
						  <td colspan="2" style="text-align:left;"> Insurance Receipts </td>
						  <td style="text-align:center;"></td>
						  <td style="text-align:center;">' . number_format($insurance_receipts_bal, 2) . '</td>
					  </tr>';
				$receipts_bal = floatval(array_sum($receipts['tcr'])) - floatval(array_sum($receipts['tdr']));
				$output .= '<tr>
						  <td colspan="2" style="text-align:left;"> Receipts </td>
						  <td style="text-align:center;"></td>
						  <td style="text-align:center;">' . number_format($receipts_bal, 2) . '</td>
					  </tr>';

				$output .= '</tbody>';
				$output .= '<tfoot>';

				$debits = $cash + $bank + $expenses_bal + floatval($receivables_bal);
				$credits = floatval($insurance_receipts_bal) + floatval($receipts_bal) + floatval($account_payables_bal);

				$totalBalBFwd = floatval($cash_bal_bfwd) + floatval($bank_bal_bfwd) + floatval($receivables_bal_bfwd) - floatval($account_payables_bal_bfwd);

				$output .= '<tr>
				<th colspan="4" style="height:22px;"> </th>
			</tr>';

				if ($totalBalBFwd < 0) {
					$output .= '<tr>
						  <th colspan="2" style="text-align:left;"> Balance b/fwd ' . $startdate_words . ' </th>
						  <td style="text-align:center;"> </td>
						  <th style="text-align:center;">(' . number_format(abs($totalBalBFwd), 2) . ')</th>
					  </tr>';
				} else {
					// $output .= '<tr>
					// 	  <th colspan="2" style="text-align:left;">Balance b/fwd ' . $startdate_words . ' </th>
					// 	  <td class="text-center"> </td>
					// 	  <th style="text-align:center;">' . number_format($totalBalBFwd, 2) . '</th>
					//   </tr>';
					$output .= '<tr>
					  <th colspan="4" style="text-align:left;">Balance b/fwd ' . $startdate_words . ' </th>
				  </tr>';

					$output .= '<tr>
					  <td colspan="2" style="text-align:left;">Cash  </td>
					  <td class="text-center"> </td>
					  <td style="text-align:center;">' . number_format($cash_bal_bfwd, 2) . '</td>
				  </tr>';
					$output .= '<tr>
						<td colspan="2" style="text-align:left;">Bank  </td>
						<td class="text-center"> </td>
						<td style="text-align:center;">' . number_format($bank_bal_bfwd, 2) . '</td>
					</tr>';
					$output .= '<tr>
						<td colspan="2" style="text-align:left;">Receivables  </td>
						<td class="text-center"> </td>
						<td style="text-align:center;">' . number_format($receivables_bal_bfwd, 2) . '</td>
					</tr>';
					$output .= '<tr>
					<td colspan="2" style="text-align:left;">Payables  </td>
					<td class="text-center"> </td>
					<td style="text-align:center;">' . number_format($account_payables_bal_bfwd, 2) . '</td>
				</tr>';
				}
				$credits = floatval($credits) + floatval($totalBalBFwd);

				$output .= '<tr>
								<th colspan="2">TOTAL</th>
								<th style="text-align:center;">' . number_format($debits, 2, '.', ',') . ' </th>
								<th style="text-align:center;">' . number_format($credits, 2, '.', ',') . ' </th>
			
							</tr>';
				$output .= '</tfoot>
							</table>';


				$output .= '
					</body>
			</html>';


				die($output);


				break;





}

?>									
</body>
</html>