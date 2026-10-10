<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('invoices-reports', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/../includes/functions.php');
include __DIR__ . '/../includes/func.php';
//$ser=$_GET['ser'];
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
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
<title>Better Health Invoices Reports</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="../css/roboto-varela.css"/>
<link rel="stylesheet" type="text/css" href="../css/material-icons.css"/> -->
<!-- <link rel="stylesheet" type="text/css" href="../../assets/includes/jquery.confirm.css" />
<link rel="stylesheet" type="text/css" href="../../assets/includes/jquery.custom.alerts.css"> -->

<style>
/*@font-face { font-family: Merchant; src: url('../fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}*/
</style>

</head>

<body>
	<?php require_once __DIR__ . '/../includes/render.php'; echo bh_skip_link('#bh-main'); ?>

<?php 

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
<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">

<div style="clear:both; margin-bottom:10px;"></div>
<img alt="" src="../<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
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
$time1=backtime($timer1);
$time2=backtime($timer2);
//$d1=$d1.$time1;
//$d2=$d2.$time2;
?>

<div style="clear:both; margin-bottom:10px"></div>
<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="../images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
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
#opd_invoices_report_summary($d1,$d2,$name);

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

switch($code){
    case 1:
    
    $result =mysqli_query($db, "select * from receipts  where stamp='".date('Ymd')."' and status!=0 and (paymode='Companies' or paymode='Credit')");
    
    break;
    
    case 2:
    
    if($d1==0){
    $result =mysqli_query($db, "select * from receipts  where status!=0  and (paymode='Companies' or paymode='Credit')");
    }
    else{
    $result =mysqli_query($db, "select * from receipts  where stamp>='".$d1."' and stamp<='".$d2."'  and status!=0  and (paymode='Companies' or paymode='Credit')");
    }
    break;
    
    case 3:
    
    if($d1==0){
    $result =mysqli_query($db, "select * from receipts  where status!=0  and cid='".$name."' and (paymode='Companies' or paymode='Credit')");
    }
    else{
    $result =mysqli_query($db, "select * from receipts  where stamp>='".$d1."' and stamp<='".$d2."'  and status!=0  and cid='".$name."'   and (paymode='Companies' or paymode='Credit')");
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

$arr1=array();$arr2=array();$arr3=array();
    $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$xs=0;$y=0;
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
    $xs+=preg_replace('~,~', '', stripslashes($row['amount'])); 
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


    if($i%2==0){
        echo'
        <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
        }else{
            echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}

                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.dateprint(stripslashes($row['date'])).'</td>';
                echo'<td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['patid']).'</td>';
                echo'<td style="width:17%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['patname']).'</td>';
                echo'<td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['paymode']).'</td>';
                echo'<td style="width:14%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['cname']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['rcptno']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['amount']).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.convtime(stripslashes($row['time'])).'</td>';
                echo'<td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['category']).'</td>';
                echo'<td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['username']).'</td>';
            echo'</tr>';   
            
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
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bank: <script>document.writeln(( <?php  echo $xs ?>).formatMoney(2, '.', ','));</script></p>
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



?>          

</body>
</html>
