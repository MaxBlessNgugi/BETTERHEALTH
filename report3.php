<?php include(__DIR__ . '/includes/db_fns.php');
include(__DIR__ . '/includes/functions.php');
include __DIR__ . '/includes/func.php';
//$ser=$_GET['ser'];
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;
bh_authz_note('report3', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));}
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

switch($id){

    case 1:
    $title='Better Health Daily Summary Report';
    break;  
    case 2:
    $title='Better Health Open Invoices Reports ';
    break;
    case 3:
    $title='Better Health Lab Reports ';
    break;

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<title><?php echo $title ?></title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/functions.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<script src="js/excellentexport.js"></script>

<style>
body,p{
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>

<?php 
switch($id){
case 1:
?>
<?php

if(isset($_GET['d1'])){
    $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
    $d2=$_GET['d2'];
}else $d2=0;


$days=array();
$d1=preg_replace('~/~', '', $d1);
$d2=preg_replace('~/~', '', $d2);
$days[]=stamptostamp($d1);
$dd=$d1;

while($dd < $d2) {

    $dd=strtotime($dd);
    $dd=date('Ymd', strtotime('+1 day', $dd));
    $days[]=stamptostamp($dd);
    
  } 



echo'<div style="width:100%; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="'.$logo.'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">'.$comname.'</p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">P.O Box '.$Add.'<br/>Tel: '.$tel.'
<br/>Website: '.$web.'<br/>Email: '.$email.'</p><div style="clear:both"></div>
<p style="text-align:center;font-size:18px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">MANAGERIAL DAILY SUMMARY REPORT<br/>
</strong></p>
<div style="clear:both; margin-bottom:10px" ></div>


<div style="width:100%;">';


?>

<?php
$pro=array(array()); $arr1=array();$arr2=array();$arr3=array();$arr4=array();$arr5=array();$arr6=array();
foreach ($days as $key => $date) {

    $xx=0;$yy=0;$cdate=$date;
    $tom=strtotime($date);
    $tom=date('Ymd', strtotime('+1 day', $tom));

    $stamper=$date=preg_replace('~/~', '', $date);
    $d1=$date.'0800';$d2=$date.'1900';
    $result =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<'".$d2."'  AND status!=0");
    $resultmm =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<'".$d2."'  and status!=0 GROUP BY patid");
    $dpats = mysqli_num_rows($resultmm);
    $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$y=0;$x=array();$shift1=0;
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
    $shift1=$a+=preg_replace('~,~', '', stripslashes($row['amount']));
    
    if(stripslashes($row['paymode'])=='Cash'){
    $v+=preg_replace('~,~', '', stripslashes($row['amount']));  
    }
    if(stripslashes($row['paymode'])=='Credit'){
    $w+=preg_replace('~,~', '', stripslashes($row['amount']));  
    }
    if(stripslashes($row['paymode'])=='Bank'){
        if (isset($x[$row['cname']])) {
            $x[$row['cname']] += preg_replace('~,~', '', stripslashes($row['amount']));
        }else{
            $x[$row['cname']] = preg_replace('~,~', '', stripslashes($row['amount']));
        }
    }
    if(stripslashes($row['paymode'])=='Companies'){
    $y+=preg_replace('~,~', '', stripslashes($row['amount']));  
    }
    
    }
    $xx+=$a;$yy+=$v;
    
    

    $dep=0;
    $result =mysqli_query($db, "select * from bankdeposits where stamp=".$stamper."");
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
    $dep+=preg_replace('~,~', '', stripslashes($row['amount']));

    }
    ?>

<?php

echo '
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">Date:'.dateprint($cdate).'</p>
<div style="width:33.0%; border-right:1px DASHED #333; float:left">
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">SHIFT 1</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Patients Seen In Shift: '.$dpats.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Cash: '.$v.'</p>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Companies: '.$y.'</p>';?>
<?php foreach ($x as $key => $bank) {
        echo'<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">'.$key.': '.$bank.'</p>';
 } ?> <?php

echo' <p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Credit: '.$w.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Totals: '.$w.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
</div>';

    $stamper=$date=preg_replace('~/~', '', $date);
    $d1=$date.'1900';$d2=$tom.'0800';
    $result =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<'".$d2."'  AND status!=0");
    $resultmm =mysqli_query($db, "SELECT * FROM receipts  WHERE timestamp>='".$d1."' AND timestamp<'".$d2."'  and status!=0 GROUP BY patid");
    $npats = mysqli_num_rows($resultmm);
    $a=0;$b=0;$c=0;$d=0;$v=0;$w=0;$y=0;$x=array();$shift2=0;
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
    $shift2=$a+=preg_replace('~,~', '', stripslashes($row['amount']));
    
    if(stripslashes($row['paymode'])=='Cash'){
    $v+=preg_replace('~,~', '', stripslashes($row['amount']));  
    }
    if(stripslashes($row['paymode'])=='Credit'){
    $w+=preg_replace('~,~', '', stripslashes($row['amount']));  
    }
    if(stripslashes($row['paymode'])=='Bank'){
        if (isset($x[$row['cname']])) {
            $x[$row['cname']] += preg_replace('~,~', '', stripslashes($row['amount']));
        }else{
            $x[$row['cname']] = preg_replace('~,~', '', stripslashes($row['amount']));
        }
    }
    if(stripslashes($row['paymode'])=='Companies'){
    $y+=preg_replace('~,~', '', stripslashes($row['amount']));  
    }
    
    }

    $xx+=$a;$yy+=$v;

    $pats=0;
    $d1=$date.'0800';
    $result =mysqli_query($db, "select * from receipts where timestamp>='".$d1."' and timestamp<'".$d2."' and status !=0 group by patid");
    $num_results = mysqli_num_rows($result);
    $pats=$num_results;
    ?>
    <?php 

    echo'<div style="width:33.0%; border-right:1px DASHED #333; float:left">
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">SHIFT 2</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Patients Seen In Shift: '.$$npats.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Cash: '.$v.'</p>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Companies: '.$y.'</p>'; ?>
<?php foreach ($x as $key => $bank) {
    echo '<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">'.$key.': '.$bank.'</p>';
 } ?><?php

echo '<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Credit: '.$w.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Totals: '.$a.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
</div>';

echo'<div style="width:33.0%; border-right:1px DASHED #333;float:left">
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">TOTALS</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Total Income:'.$xx.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Total Cash: '.$yy.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Amount Banked:'.$dep.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Patients Seen:'.$pats.'</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
</div>

<div style="clear:both; margin-bottom:20px"></div>';

    ?>

<?php 

$arr1[]='"'.stamptodate($date).'"'; $arr2[]=$shift1;    $arr3[]=$shift2;    
$arr4[]='"'.stamptodate($date).'"'; $arr5[]=$dpats; $arr6[]=$npats; 
} ?>

<?php
echo'</div>
<p style="text-align:center;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">GRAPHICAL REPRESENTATION: INCOME</p>';

//$arr1=array_slice($arr1,0,7);$arr2=array_slice($arr2,0,7);$arr3=array_slice($arr3,0,7);
//$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);
$pa=implode($arr1,",");$xy=implode($arr2,",");$ab=implode($arr3,",");

echo'<canvas id="line" height="400" width="1200"></canvas>
<script>

        var lineChartData = {
            labels : ['.$pa.'],
            datasets : [
                {
                    fillColor : "#0369A1",
                    strokeColor : "#666",
                    pointColor : "#fff",
                    pointStrokeColor : "#000",
                    data : ['.$xy.']
                },
                {
                    fillColor : "#DC2626",
                    strokeColor : "#010504F",
                    pointColor : "#000",
                    pointStrokeColor : "#fff",
                    data : ['.$ab.']
                }
            ]
            
        }

    new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
    
    </script>
<p style="margin-top:0px"><input type="button" style="background:var(--color-info, #0369A1); height:10px; width:10px;"/><small style="margin-top:-15px">Day Shift</small>
<input type="button" style="background:var(--color-danger, #DC2626); height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">>Night Shift</small></p>   ';  
        
?>

<?php
echo'<p style="text-align:center;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">GRAPHICAL REPRESENTATION: PATIENTS SEEN</p>
<div style="clear:both; margin-bottom:20px"></div>';

//$arr1=array_slice($arr1,0,7);$arr2=array_slice($arr2,0,7);$arr3=array_slice($arr3,0,7);
//$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);
$pa=implode($arr4,",");$xy=implode($arr5,",");$ab=implode($arr6,",");

echo'<canvas id="line2" height="400" width="1200"></canvas>
<script>

        var lineChartData = {
            labels : ['.$pa.'],
            datasets : [
                {
                    fillColor : "#ff3",
                    strokeColor : "#666",
                    pointColor : "#fff",
                    pointStrokeColor : "#000",
                    data : ['.$xy.']
                },
                {
                    fillColor : "#0f6",
                    strokeColor : "#010504F",
                    pointColor : "#000",
                    pointStrokeColor : "#fff",
                    data : ['.$ab.']
                }
            ]
            
        }

    new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData);
    
    </script>
<p style="margin-top:0px"><input type="button" style="background:#ff3; height:10px; width:10px;"/><small style="margin-top:-15px">Day Shift</small>
<input type="button" style="background:#0f6; height:10px; width:10px; margin-left:10px"/><small style="margin-top:-15px">Night Shift</small></p>    ';  

echo'<p style="text-align:center;font-size:15px; font-weight:bold;font-family:Merchant;margin:0 0 0 0px">Report pulled By '.$username.'.</p>
</div>';
?>

<?php 
break;
case 2:
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
echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img src='images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
#echo "<div style='clear:both; margin-bottom:10px' ></div>";
echo "<table id='datatable'  style='width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;' >";
echo "<tbody>";

?>
<?php 
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
?>



<?php
echo '<p style="text-align:center;font-size:11px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:11px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';

break;
case 3:
$date=date('Y/m/d');
$code=$_GET['code'];
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
        //$code=$_GET['code'];

        
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
        $fname='by_patient_lab_reports';
        $catname=strtoupper(preg_replace('~_~', ' ', $fname));
        $code2=$_GET['code2'];
        
        if($d1==0&&$code==2){
        $result =mysqli_query($db, "select * from labrequests where patid='".$code2."'");
        }
        else if($d1!=0&&$code==2){
        $result =mysqli_query($db, "select * from labrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
        }

        else if($d1==0&&$code==1){
        $result =mysqli_query($db, "select * from labrequests where accept_reject=1 and  patid='".$code2."'");
        }
        else if($d1!=0&&$code==1){
        $result =mysqli_query($db, "select * from labrequests  where accept_reject=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
        }
        
        else if($d1==0&&$code==0){
        $result =mysqli_query($db, "select * from labrequests where accept_reject!=1 and  patid='".$code2."'");
        }
        else if($d1!=0&&$code==0){
        $result =mysqli_query($db, "select * from labrequests  where accept_reject!=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
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

lab_patient_reports($logo,$comname,$Add,$tel,$web,$email,$d1,$d2,$catname)
?>
<style>
a:hover {
  background-color: yellow;
  font-size: 12px;
}
</style>
<?php
echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img src='images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
// echo "<table id='datatable'  style='width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;' >";
// echo "<tbody>";
echo '<table id="datatable"  style="width:100%;text-align:center;font-size:12px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0;" >';
echo '<tbody>';
echo ' <tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
            <td  style="width:3%;">No.</td>
            <td  style="width:7%;">Date</td>
            <td  style="width:3%;">Lab No</td>
            <td  style="width:10%;">Patient Name</td>
            <td  style="width:7%;">Source</td>
            <td  style="width:7%;">Lab Section</td>
            <td  style="width:10%;">Lab Test</td>
            <td  style="width:6%;">Sample</td>
            <td  style="width:5%;">Start Time</td>
            <td  style="width:5%;">Finish Time</td>
            <td  style="width:5%;">Result Type</td>
            <td  style="width:8%;">Done By</td>
        </tr>';

    $a=1;$aa=$bb=0;

    $resultage =mysqli_query($db, "select * from patients where pntno='".$code."'");
        $rowage=mysqli_fetch_array($resultage);
        $pntno=stripslashes($rowage['pntno']);

    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
    $labno=stripslashes($row['Id']);
    if(stripslashes($row['restype'])=='POSITIVE'){
        $aa+=1;
    }
    if(stripslashes($row['restype'])=='NEGATIVE'){
        $bb+=1;
    }

    if($i%2==0){ echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal">'; } else { echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal">'; }

                        echo '
                        <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;">'.$a.'</td>
                        <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['date']).'</td>
                        <td style="width:3%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['unique_no']).'</td>
                        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><a style="color:#0085B2; font-weight:bold;" href="" onclick="window.open(\'report.php?id=38&rcptno='.$labno.'\');">'.stripslashes($row['patname']).'-['.stripslashes($row['patid']).']</a></td>
                        <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['source']).'</td>
                        <td style="width:7%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['section']).'</td>
                        <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><a style="color:#0085B2; font-weight:bold;" href="" onclick="window.open(\'report.php?id=38&rcptno='.$labno.'\');">'.stripslashes($row['request']).'</a></td>
                        <td style="width:6%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['sample']).'</td>
                        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['rectime']).'</td>
                        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['servtime']).'</td>
                        <td style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['restype']).'</td>
                        <td style="width:8%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['doneby']).'</td>';
                echo'</tr>';
                $a++;
    } 
echo'
</tbody>
</table>'; 
echo '
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Total Tests: '.$a.'</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Positive Tests: '.$aa.'</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Negative Tests: '.$bb.'</p>
<div style="clear:both; margin-bottom:20px"></div>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo '<p style="text-align:center;font-size:14px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande, sans-serif;margin:0 0 0 0px">Report pulled By '.$username.'</p>';
echo '</div>';

break;

}
?>          

</body>
</html>
