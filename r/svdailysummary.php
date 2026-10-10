<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('svdailysummary', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<?php require_once __DIR__ . '/../includes/render.php'; echo bh_head(array(
  'title' => 'Better Health Stock Daily Summary Reports',
  'base' => '../',
  'extra' => array(
    '<style>',
    '@font-face { font-family: Merchant; src: url(\'../fonts/Merchant.TTF\'); }',
    'body,p{',
    'font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase',
    '}',
    '</style>',
    '<script type="text/javascript" src="../js/bh-grid.js"></script>'
  )
)); ?>

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
echo '<table id="datatable" class="bh-grid" data-bh-thead="first"  style="width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;"  tabindex="-1"><caption>Better Health Stock Daily Summary Reports</caption>';
echo '<thead>';
echo ' <tr style="width:100%; height:20px;color:#fff; background:#2c3e50; padding:0;text-transform:;">';
?>
	    	<th scope="col"  style="width:3%;">#</th>
	    	<th scope="col"  style="width:10%;">Date</th>
	        <th scope="col"  style="width:20%;">Item Name</th>
	        <th scope="col"  style="width:10%;">PREV QTY</th>  
	        <th scope="col"  style="width:10%;">QTY ADDED</th>  
	        <th scope="col"  style="width:10%;">Qty REMOVED</th> 
	        <th scope="col"  style="width:10%;">QTY Bal</th>
	        <th scope="col"  style="width:20%;">Description</th>
	        <th scope="col"  style="width:10%;">User</th>

<?php 
      echo '</tr></thead><tbody>';

	if($d1==0){
	#$result =mysqli_query($db, "select * from stocktrack ");
	$result =mysqli_query($db, "select * from stocktrack  where Dept='".$name."' ");
	}
	else{
	#$result =mysqli_query($db, "select * from stocktrack  where Stamp>='".$d1."' and Stamp<='".$d2."' ");
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


	$bal_aft_transfer=stripslashes($row['Bal']);
	$qty_transfered=stripslashes($row['Qty']);
	$bal_b4_transfer=$bal_aft_transfer-$qty_transfered;
						 // $resultz =mysql_query("select * from  items where ItemCode='".$itcode."' ");
						 // $num_resultzs = mysql_num_rows($resultz);
							// for ($i=0; $i <$num_resultzs; $i++) {
							// 	$rowz=mysql_fetch_array($resultz);
							// 	#$adminbal=stripslashes($rowz['ADMINISTRATION']);
							// 	$disp_current_bal=stripslashes($rowz['PHARMACY']);
							// }


    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

			    		echo '
						<td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;"> '.$xx.'</td>
					   	<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.dateprint(stripslashes($row['Date'])).'</td>
					    <td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['ItemName']).'</td>';
				          #echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_disp.'</td>';
				          // if ($desc== 'STOCK TRANSFER FROM ADMINISTRATION') {
				          // 	echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';
				          // 	echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';
				          // } else {
				          // 	echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';
				          // 	echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Qty']).'</td>';
				          // }$bal_aft_transfer!= $qty_transfered&&$desc!='STOCK TRANSFER FROM ADMINISTRATION'
				         // if ($bal_aft_disp == $qtydispensed&&$desc!='STOCK TRANSFER FROM ADMINISTRATION') {
				         // 	// code...
				         // } else {
				         // 	// code...
				         // }
				         
				         if ($bal_aft_transfer == $qty_transfered&&$desc == 'STOCK TRANSFER FROM ADMINISTRATION') { 
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 					    #PREVQTY
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Qty']).'</td>';   #QTYADDED
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 		           	          #QTYREMOVED
				         } 
				         // else if ($bal_aft_transfer!= $qty_transfered&&$desc != 'STOCK TRANSFER FROM ADMINISTRATION') {
				         //  echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_transfer.'</td>';             #PREVQTY
				         //  echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 					    #QTYADDED
				         //  echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';    #QTYREMOVED
				         // }
				          else {
				           // echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_disp.'</td>';                #PREVQTY
				           // echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';   #QTYADDED
				           // echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>';    				    #QTYREMOVED
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.$bal_b4_transfer.'</td>';             #PREVQTY
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">0</td>'; 					    #QTYADDED
				          echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Qty']).'</td>';    #QTYREMOVED
					    }
				          
				          
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Bal']).'</td>';
					    echo'<td style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['Description']).'</td>';
					    echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"> '.stripslashes($row['UserName']).'</td>';
				echo'</tr>';
				$xx++;
    } 
echo'
<tr style="width:100%; height:20px;color:#fff; background:#fff; padding:0">
        <td  style="width:3%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:20%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:20%;"></td>
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
