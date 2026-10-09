<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('open-invoice-summary', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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

$id=$_GET['id'];
if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno']; //$pid=$_GET['pid']; 
}

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
<title>Better Health Open Invoices Reports</title>
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


$rcptno = $_GET['rcptno'];
#$rcptno = $_GET['rcptno'];

$result =mysqli_query($db, "select * from creditcustomers where CustomerId='".$rcptno."'");
$row=mysqli_fetch_array($result);
$bal=stripslashes($row['Bal']);
$cname=stripslashes($row['CustomerName']);
$fname=clean(strtolower($cname));

open_invoice_summary($logo,$comname,$Add,$tel,$web,$email,$cname);
#echo $rcptno;
?>
<?php
#echo "<div style='clear:both; margin-bottom:10px'></div>";
// echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img src='../images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
#echo "<div style='clear:both; margin-bottom:10px' ></div>";
#echo "<table id='datatable'  style='width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;' >";
#echo "<tbody>";

?>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="../images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>

<?php 
echo "<table id='datatable'  style='width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;' >";
echo "<tbody>";
// echo '<table id="datatable"  style="width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;" >';
// echo '<tbody>';
echo '
        <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
            <td  style="width:10%;">Date</td>
            <td  style="width:38%;">Details</td>
            <td  style="width:10%;">Invoice No.</td>
            <td  style="width:14%;">Invoice Amount</td>
            <td  style="width:14%;">Amount Paid</td>
            <td  style="width:14%;">Balance</td>
        </tr>';

        $a=$b=$c=0;
        $resulta =mysqli_query($db, "select * from customerdebts where CustomerId='".$rcptno."' and DrCr='dr' and Status=1");
        $num_resultsa = mysqli_num_rows($resulta);  
        for ($i=0; $i <$num_resultsa; $i++) {
        $rowa=mysqli_fetch_array($resulta);
        $a+=preg_replace('~,~', '', stripslashes($rowa['Amount']));
        $b+=preg_replace('~,~', '', stripslashes($rowa['Paid']));
        $c+=preg_replace('~,~', '', stripslashes($rowa['InvBal']));

    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

    echo '
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">'.dateprint(stripslashes($rowa['Date'])).'</td>
<td  style="width:38%;border-width:0.5px; border-color:#666; border-style:solid; ">'.stripslashes($rowa['Description']).'</td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid; ">'.stripslashes($rowa['InvoiceNo']).'</td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; ">'.stripslashes($rowa['Amount']).'</td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; ">'.stripslashes($rowa['Paid']).'</td>
<td  style="width:14%;border-width:0.5px; border-color:#666; border-style:solid; ">'.stripslashes($rowa['InvBal']).'</td>';

 } 
echo'
</tr>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:10%;">Totals</td>
        <td  style="width:38%;"></td>
        <td  style="width:10%;"></td>
        <td  style="width:14%;">'.$a.'</td>
        <td  style="width:14%;">'.$b.'</td>
        <td  style="width:14%;">'.$c.'</td>
    </tr>

</tbody>
</table>'; 
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';


?>          

</body>
</html>
