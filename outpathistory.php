<?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('outpathistory', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/includes/functions.php');
//$ser=$_GET['ser'];
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}

$result4 =mysqli_query($db, "select * from users where name='".$username."'");
$row4=mysqli_fetch_array($result4);
$fullname=stripslashes($row4['fullname']);
$sign_image=stripslashes($row4['sign_image']);

$id=$_GET['id'];
if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno']; $pid=$_GET['pid']; }

$result =mysqli_query($db, "select * from company");
$row=mysqli_fetch_array($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$comname2=strtoupper(stripslashes($row['CompanyName2']));
$tel=stripslashes($row['Tel']);
$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);

switch($id){

    case 1:
    $title='Better Health Consolidated Outpatient Invoice';
    break;
    case 3:
    $title='Better Health Consolidated Outpatient Invoice';
    break;
    case 2:
    $title='Better Health Interim OutPatient Invoices';
    break;
    case 18:
    $title='Better Health Debtors Receipts ';
    break;
    case 25:
    $title='Better Health Pharmacy Reports ';
    break;

    case 62:
    $title='Better Health Receipts/Invoices';
    break;
    case 63:
    $title='Better Health RePrint Receipts/Invoices';
    break;
    case 726:
    $title='Better Health Interim OutPatient Invoices';
    break;

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<title><?php echo $title ?></title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
 <script type="text/javascript" src="js/jquery.js"></script>
<script src="js/functions.js"></script>

<link type="text/css" rel="stylesheet" href="css/feedback.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<script src="js/excellentexport.js"></script> 
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="assets/vendor/ui/jquery.ui.all.css">
<script src="js/jquery.js"></script>
<script src="assets/vendor/ui/jquery.ui.core.js"></script>
<script src="assets/vendor/ui/jquery.ui.widget.js"></script>
<script src="assets/vendor/ui/jquery.ui.datepicker.js"></script>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:14px; font-weight:bold; text-transform:uppercase;line-height: 1.0;letter-spacing: 2px;
}
</style>

</head>

<body>
	<?php require_once __DIR__ . '/includes/render.php'; echo bh_skip_link('#bh-main'); ?>
	<div id="bh-main" tabindex="-1"></div>

<?php 
switch($id){
case 1:
            $pid = safe_decode($_GET['pid']);
            $rcptno = safe_decode($_GET['rcptno']);
            $old_patient_id = safe_decode($_GET['cid']);
            #$in_trans_date = safe_decode($_GET['tdt']);

            $result5 = mysqli_query($db, "select * from receipts where patid='" . $pid . "' and  invno='" . $rcptno . "' and old_patient_id='" . $old_patient_id . "' and paymode='Companies'");
            $num_results5 = mysqli_num_rows($result5);

// $pid=$_GET['pid'];
// $rcptno=$_GET['rcptno'];

// $result5 =mysqli_query($db, "select * from receipts where patid='".$pid."' and  invno='".$rcptno."' and paymode='Companies'");
// $num_results5 = mysqli_num_rows($result5);

if($num_results5<1){
    echo"<script>window.location.href = \"report.php?id=67&rcptno=".$rcptno."&pid=".$patid."\";</script>";
 }
$comam=0; $arr5=array();
for ($i=0; $i <$num_results5; $i++) {
$row=mysqli_fetch_array($result5);
#echo "<pre>";print_r($row);echo "</pre>";
$arr5[stripslashes($row['cid'])]=stripslashes($row['cid']);
$comam+=preg_replace('~,~', '', stripslashes($row['amount']));  
}
foreach ($arr5 as $key => $val) {
        $result =mysqli_query($db, "select * from receipts where patid='".$pid."' and  invno='".$rcptno."' and cid='".$val."' and paymode='Companies'");
        $num_results = mysqli_num_rows($result);
        $c2222omam=0;$companyam=0;
            for ($i=0; $i <$num_results; $i++) {
                $row=mysqli_fetch_array($result);
                $companyam+=preg_replace('~,~', '', stripslashes($row['amount']));  
            }

}
        
$patname=stripslashes($row['patname']);
$patid=stripslashes($row['patid']);
$cname=stripslashes($row['cname']);
$cardno=stripslashes($row['cardno']);
$time=stripslashes($row['time']);
$date=dateprint(stripslashes($row['date']));

?>

<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>


<?php
heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$cname,$cardno,$time,$comname2);
$arr=array();
$result =mysqli_query($db, "select * from sales where ClientId='".$patid."' and InvNo='".$rcptno."' and Cashier !='' and ItemCode!='84' ");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {

$row=mysqli_fetch_array($result);
$arr[stripslashes($row['Category'])]=stripslashes($row['Category']);
}

        $tam=0;
        foreach ($arr as $key => $val) {
        dephead($val);
        $result =mysqli_query($db, "select * from sales where ClientId='".$patid."' and InvNo='".$rcptno."' and Category='".$val."' and ItemCode!='84'");
        $qty=0;$itot=0;$b=0;$c=0;$d=0;
        $num_results = mysqli_num_rows($result);
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
        
    
finalhead($tam,$fullname,$comam,$companyam,$sign_image);


?>


<!-- </div> -->
<?php 
break;
case 2:
            $pid = safe_decode($_GET['pid']);
            $rcptno = safe_decode($_GET['rcptno']);
            $old_patient_id = safe_decode($_GET['cid']);
            #$in_trans_date = safe_decode($_GET['tdt']);
$pagesize=15;
$result =mysqli_query($db, "select * from receipts where rcptno='".$rcptno."'  and paymode='Companies'");
#$result =mysqli_query($db, "select * from receipts where patid='".$pid."' and  invno='".$rcptno."' and paymode='Companies'");
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

?>

<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>

<?php
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ItemCode!='84'");
#$result =mysqli_query($db, "select * from sales where InvNo='".$rcptno."' and  ClientId='".$pid."' and ItemCode!='84'");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);
$dept=stripslashes($row['Category']);
$part=explode('.',($num_results/$pagesize));
$part=$part[0];
$part+=1;
$dd=0;
$tam=0;
for ($kk=0; $kk <$part; $kk++) {
        
        $result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ItemCode!='84'  limit ".$dd.",".$pagesize."");
        #$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and  ClientId='".$pid."' and ItemCode!='84'  limit ".$dd.",".$pagesize."");
        $qty=0;$itot=0;$b=0;$c=0;$d=0;
        $num_results = mysqli_num_rows($result);
        if($num_results>0){
        headinop($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time,$comname2);
        for ($i=0; $i <$num_results; $i++) {
        $row=mysqli_fetch_array($result);
        
        $qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
        $itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
        $c+=preg_replace('~,~', '', stripslashes($row['Vat']));
        $d+=preg_replace('~,~', '', stripslashes($row['Discount']));
        $b+=$itot;
        
        loopoutp112($row,$itot);
        
        }
        $tam+=$b;
         footyoutp($qty,$b,$d);
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

finalheadoutp($tam,$cashier,$comam,$posted);


?>



<?php 
break;
case 3:
$rcptno=safe_decode($_GET['rcptno']);
$pid=safe_decode($_GET['pid']);
$old_patient_id=safe_decode($_GET['cid']);

$resultxz =mysqli_query($db, "select * from receipts where patid='".$pid."' and  rcptno='".$rcptno."' and  old_patient_id='".$old_patient_id."' and paymode='Companies' ");
$num_results = mysqli_num_rows($resultxz);
//$patid=stripslashes($row['patid']);
//echo $num_results;

if($num_results<1){
 echo"<script>window.location.href = \"report.php?id=67&rcptno=".$rcptno."&pid=".$pid."\";</script>";
 }
$comam=0;
for ($i=0; $i <$num_results; $i++) {
$row=mysqli_fetch_array($resultxz);
//secho "<pre>";print_r($row);echo "</pre>";
$comam+=preg_replace('~,~', '', stripslashes($row['amount']));  
}
        
$patname=stripslashes($row['patname']);
$patid=stripslashes($row['patid']);
$cname=stripslashes($row['cname']);
$cardno=stripslashes($row['cardno']);
$time=stripslashes($row['time']);
$date=dateprint(stripslashes($row['date']));

?>

<?php
bh_header($db,$logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$cname,$cardno,$time,$comname2);
$arr=array();
$result =mysqli_query($db, "select * from sales where ClientId='".$patid."' and  old_patient_id='".$old_patient_id."' and RcptNo='".$rcptno."' and Cashier !='' and ItemCode!='84' ");
//$result =mysqli_query($db, "select * from sales where InvNo='".$rcptno."'");
$num_results = mysqli_num_rows($result);
for ($i=0; $i <$num_results; $i++) {

$row=mysqli_fetch_array($result);
$arr[stripslashes($row['Category'])]=stripslashes($row['Category']);
}

        $tam=0;
        foreach ($arr as $key => $val) {
        dephead($val);
        $result =mysqli_query($db, "select * from sales where ClientId='".$patid."' and  old_patient_id='".$old_patient_id."' and RcptNo='".$rcptno."' and ItemCode!='84'  and Category='".$val."'");
        $qty=0;$itot=0;$b=0;$c=0;$d=0;
        $num_results = mysqli_num_rows($result);
                    for ($i=0; $i <$num_results; $i++) {
                    $row=mysqli_fetch_array($result);
                    
                    $qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
                    $itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
                    $c+=preg_replace('~,~', '', stripslashes($row['Vat']));
                    $d+=preg_replace('~,~', '', stripslashes($row['Discount']));
                    $b+=$itot;
                    
                    bh_loop112($row,$itot);
                    
                    }
        $tam+=$b;
         bh_footer($qty,$b,$d);
        }
        
    


bh_finalhead($tam,$fullname,$comam,$sign_image);



?>


<!-- </div> -->
<?php 
break;
case 726:
// $rcptno=$_GET['rcptno'];
// $pid=$_GET['pid'];
$old_patient_id=safe_decode($_GET['cid']);
$rcptno=safe_decode($_GET['rcptno']);
$pid=safe_decode($_GET['pid']);

$pagesize=15;
$result =mysqli_query($db, "select * from receipts where patid='".$pid."' and stamp='".date('Ymd')."' and rcptno='".$rcptno."' and paymode='Companies' and old_patient_id='".$old_patient_id."'");
//echo date('Ymd'); //exit;
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

//function heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$cname,$cardno,$time){
?>

<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>

<?php
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ClientId='".$pid."' and Cashier !='' and old_patient_id='".$old_patient_id."' and ItemCode!='84' ");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$cashier=stripslashes($row['Cashier']);
$posted=stripslashes($row['Posted']);
$dept=stripslashes($row['Category']);
$part=explode('.',($num_results/$pagesize));
$part=$part[0];
$part+=1;
$dd=0;
$tam=0;
for ($kk=0; $kk <$part; $kk++) {
        
        $result =mysqli_query($db, "select * from sales where ClientId='".$pid."' and Cashier !='' and ItemCode!='84' and RcptNo='".$rcptno."'  limit ".$dd.",".$pagesize."");
        $qty=0;$itot=0;$b=0;$c=0;$d=0;
        $num_results = mysqli_num_rows($result);
        if($num_results>0){
        headinop($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time,$comname2);
        for ($i=0; $i <$num_results; $i++) {
        $row=mysqli_fetch_array($result);
        
        $qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
        $itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
        $c+=preg_replace('~,~', '', stripslashes($row['Vat']));
        $d+=preg_replace('~,~', '', stripslashes($row['Discount']));
        $b+=$itot;
        
        loopoutp112($row,$itot);
        
        }
        $tam+=$b;
         footyoutp($qty,$b,$d);
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

finalheadoutp($tam,$cashier,$comam,$posted);

?>



<?php 
break;

case 18:
$result =mysqli_query($db, "select * from debtreceipts where id='".$rcptno."'");
$num_results = mysqli_num_rows($result);
if($num_results<1){
            exit;
        }
$row=mysqli_fetch_array($result);
$cname=stripslashes($row['cname']);
$cid=stripslashes($row['cid']);
$amount=stripslashes($row['amount']);
$desc=stripslashes($row['description']);
$bal=stripslashes($row['invbal']);
$stamp=stripslashes($row['stamp']);
$user=stripslashes($row['username']);
$patient_id=stripslashes($row['in_patient_id']);
$patient_no=stripslashes($row['in_patient_no']);
$patient_name=stripslashes($row['in_patient_name']);
$date=dateprint(stripslashes($row['date']));
?>
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>
<?php 
echo "<div style='width:100%;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333'>";
echo "<div style='clear:both; margin-bottom:10px'></div>";
echo "<img alt=\"Logo\" src=".$logo." style='max-height:105px; margin:0px 10px 0 10px; position:absolute;'/>";
echo "<p style='text-align:center;font-size:26px; font-weight:normal; margin:0 0 0 0px'>".$comname."</p>";
echo "<div style='clear:both'></div>";
echo "<p style='text-align:center;   font-weight:normal; margin:0 0 0 0px'>P.O Box ".$Add."<br/>Tel: ".$tel."
<br/>Website: ".$web."<br/>Email: ".$email."</p><div style='clear:both'></div>";
echo "<div style='clear:both'></div>";
echo "<p style='text-align:center;font-weight:normal;margin:0 0 0 0px'>OFFICIAL DEBTORS RECEIPT</p>";
echo "<div id='barcode' style='font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase'>".$rcptno."</div>";

?>
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
<?php
echo "<p style='text-align:center;   font-weight:normal; margin:0px 0 0 0px'>Date:".$date." &nbsp; &nbsp;&nbsp;&nbsp;Time:".date('H:i A')."&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: ".$rcptno."&nbsp; &nbsp;&nbsp;&nbsp;CUSTOMER NAME:".$patient_name."
&nbsp; &nbsp;&nbsp;&nbsp;CUSTOMER NO: ".$patient_no."</p>";
echo "<div style='clear:both; margin-bottom:10px; border-bottom:1px dashed #333'></div>";

echo "<p style='text-align:left; margin-left:10px;  font-weight:normal;'>AMOUNT PAID:";
?>
<script>document.writeln(( <?php  echo $amount ?>).formatMoney(2, '.', ','));</script>
<?php 
echo "</p>
<p style='text-align:left; margin-left:10px;  font-weight:normal;'>AMOUNT IN WORDS:"; ?>
<script>document.writeln(toWords(<?php echo $amount?>));</script> Kenya shillings only.
<?php
echo "</p>";
echo "<p style='text-align:left; margin-left:10px;  font-weight:normal;'>BEING PAYMENT FOR INVOICE NO:".$desc." ";
echo "</p>";
echo "<p style='text-align:left; margin-left:10px;  font-weight:normal;'>REMAINING Balance: ";?>
    <script>document.writeln(( <?php  echo $bal ?>).formatMoney(2, '.', ','));</script>
<?php
echo "</p>";
?>

<?php
echo "<div style='clear:both; margin-bottom:30px'></div>";
     echo "<p style='text-align:center;   font-weight:normal; margin:0 0 0 0px'>THANKYOU FOR YOUR PARTNERSHIP</p>";
     echo "<p style='text-align:center;   font-weight:normal; margin:0 0 0 0px'>Received By ".$user.".</p>";
     #echo "<p style='text-align:center;   font-weight:normal; margin:0 0 0 0px'>System Developers: APPCO SYSTEMS (www.BetterHealth.Co.Ke)</p>";
echo "</div>";?>
<?php
break;

case 25:
?>
<?php
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

?>
<?php

    switch($a){

        case 1:
        $fname='all_pharmacy_reports';
        $catname=strtoupper(preg_replace('~_~', ' ', $fname));
        
        if($d1==0&&$code==2){
        $result =mysqli_query($db, "select * from pharmrequests");
        }
        else if($d1!=0&&$code==2){
        $result =mysqli_query($db, "select * from pharmrequests  where stamp>='".$d1."' and stamp<='".$d2."'");
        }

        else if($d1==0&&$code==1){
        $result =mysqli_query($db, "select * from pharmrequests where status=2");
        }
        else if($d1!=0&&$code==1){
        $result =mysqli_query($db, "select * from pharmrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."'");
        }
        
        else if($d1==0&&$code==0){
        $result =mysqli_query($db, "select * from pharmrequests where status=1");
        }
        else if($d1!=0&&$code==0){
        $result =mysqli_query($db, "select * from pharmrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."'");
        }

        break;

        case 2:
        
        $fname='by_patient_pharmacy_reports';
        $catname=strtoupper(preg_replace('~_~', ' ', $fname));
        $code2=$_GET['code2'];
        
        if($d1==0&&$code==2){
        $result =mysqli_query($db, "select * from pharmrequests where patid='".$code2."'");
        }
        else if($d1!=0&&$code==2){
        $result =mysqli_query($db, "select * from pharmrequests  where stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
        }

        else if($d1==0&&$code==1){
        $result =mysqli_query($db, "select * from pharmrequests where status=2 and  patid='".$code2."'");
        }
        else if($d1!=0&&$code==1){
        $result =mysqli_query($db, "select * from pharmrequests  where status=2 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
        }
        
        else if($d1==0&&$code==0){
        $result =mysqli_query($db, "select * from pharmrequests where status=1 and  patid='".$code2."'");
        }
        else if($d1!=0&&$code==0){
        $result =mysqli_query($db, "select * from pharmrequests  where status=1 and stamp>='".$d1."' and stamp<='".$d2."' and  patid='".$code2."'");
        }

        break;

    }

?>
<?php 
echo "<div style='width:100%;min-height:260px; border:2px solid #333'>";
echo "<div style='clear:both; margin-bottom:10px'></div>";
echo "<img alt=\"Logo\" src=".$logo." style='max-height:105px; margin:0px 10px 0 10px; position:absolute;'/>";
echo "<p style='text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px'>".$comname."</p>";
echo "<div style='clear:both'></div>";
echo "<p style='text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px'>P.O Box ".$Add."<br/>Tel: ".$tel."<br/>Website: ".$web."<br/>Email: ".$email."</p>";
echo "<div style='clear:both'></div>";
echo "<p style='text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px'>PHARMACY REPORTS<br/><strong style='font-size:14px'>Date:".date('d/m/Y')."<br/><strong style='font-size:14px'>Category:".$catname."<br/></strong></p>";
?>
<?php if($d1!=0){
        echo "<p style='text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px'>From:&nbsp;&nbsp;".stamptodate($d1)."&nbsp;&nbsp;To:&nbsp;".stamptodate($d2)."</p>"; 
 ?>
<?php } else {
       echo "<p style='text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px'>Full Report</p>"; 
?>
<?php }?>

<?php
echo "<div style='clear:both; margin-bottom:10px'></div>";
echo "<p><a download='".$fname.".xls' href='data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+' onClick='return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');'><img alt=\"Convert to Excel\" src='images/excel.png' style='30px; height:30px; float:right; margin-right:10px' title='Convert to Excel'/></a></p>";
echo "<div style='clear:both; margin-bottom:10px' ></div>";
echo "<table id='datatable'  style='width:100%;text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0;' >";
echo "<tbody>";

?>
<?php
        echo "<tr style='width:100%; height:20px;color:#fff; background:#333; padding:0'>";
                echo "<td  style='width:5%;'>No.</td>";
                echo "<td  style='width:10%;'>Date</td>";
                echo "<td  style='width:20%;'>Patient Name</td>";
                echo "<td  style='width:30%;'>Prescription</td>";
                echo "<td  style='width:7%;'>Start Time</td>";
                echo "<td  style='width:7%;'>Finish Time</td>";
                echo "<td  style='width:12%;'>Prescribed By</td>";
                echo "<td  style='width:12%;'>Dispensed By</td>";
        echo "</tr>";
?>
<?php

    $a=1;
    $num_results = mysqli_num_rows($result);
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
    if($i%2==0){
        echo'<tr style="width:100%;height:20px;padding:0;font-weight:normal">';
        }else{ echo'<tr style="width:100%;height:20px;padding:0;background:#f0f0f0;font-weight:normal">';}

                 echo "<td style='width:5%;border-width:0.5px; border-color:#666; border-style:solid;'>".$a."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['date'])."</td>";
                 echo "<td style='width:20%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['patname'])."</td>";
                 echo "<td style='width:30%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['prescription'])."</td>";
                 echo "<td style='width:7%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['reqtime'])."</td>";
                 echo "<td style='width:7%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['servtime'])."</td>";
                 echo "<td style='width:12%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['requested'])."</td>";
                 echo "<td style='width:12%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row['dispensedby'])."</td>";
        
  echo "</tr>";
?>
    


<?php 
$a++;
} ?>

<?php 
echo "</tbody>";
echo "</table>";
$a=$a-1 ;

echo "<div style='clear:both; margin-bottom:20px'></div>";
#echo "<p style='text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px'>Total Tests: ".$a."</p>";
echo "<div style='clear:both; margin-bottom:20px'></div>";
echo '<p style="text-align:center;font-size:11px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>';
echo "<p style='text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px'>Report pulled By ".$username.".</p>";
echo "</div>";
?>

<?php 
break;

case 62:
?>
<?php
$old_patient_id=safe_encode($_GET['cid']);
$rcptno=safe_encode($_GET['rcptno']);
$pid=safe_encode($_GET['pid']);
$result =mysqli_query($db, "select * from sales where ClientId='".$pid."' and Cashier!='' and RcptNo='".$rcptno."' and old_patient_id='".$old_patient_id."'");
//$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."'");
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

$resulta =mysqli_query($db, "select * from receipts where patid='".$pid."' and rcptno='".$rcptno."' and paymode!='Companies' and old_patient_id='".$old_patient_id."'");
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
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:bold; text-transform:uppercase;line-height: 1;letter-spacing: 2px;
}
</style>

<?php 
echo'<div style="width:330px;min-height:370px; border:2px solid #333">';//echo'<div style="clear:both; margin-bottom:10px"></div>';

echo'<p style="text-align:center;font-size:18px; font-weight:bold;margin:0 0 0 0px">'.$comname.'</br>P.O BOX '.$Add.'</br>TEL: '.$tel.'</p>';
//echo'<div style="clear:both"></div>';
echo'<div style="clear:both; margin-bottom:5px"></div>';

echo'<p style="text-align:center;font-size:18px;font-weight:bold; margin:-10px 0 0 0px">Patient Name: '.$patname.'&nbsp; &nbsp;&nbsp;&nbsp;Patient No: '.$patid.'&nbsp; &nbsp;&nbsp;&nbsp; Date:'.$d.'&nbsp; &nbsp;&nbsp;&nbsp;Time:'.convtime($time).'&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: '.$rcptno.'&nbsp; &nbsp;&nbsp;&nbsp;Dept: '.$dept.'</p>';
echo'<div style="clear:both"></div>';
echo'<div style="clear:both"/>';
echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">'; 
  echo'<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<a style="text-align:center;font-size:16px;text-transform:uppercase; font-weight:bold;margin:0 0 0 40px">Item name</a>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<a style="text-align:center;font-size:16px;text-transform:uppercase; font-weight:bold;margin:0 0 0 30px">Qty.</a>';echo'
</div>';
echo'<div>';
echo'</div>';echo'
</div>';
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
echo'<div style="width:auto; height:20px; border-bottom:1.0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-weight:bold;font-size:16px;margin:0 0 0 10px">';echo'
'.stripslashes($row['ItemName']).'</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px;font-weight:bold; margin:0 0 0 10px">';echo'
'.stripslashes($row['Qty']).'</p>';echo'
</div>';echo'

<div>';echo'

</div>';echo'
</div>'; }
echo'
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px; font-weight:bold;margin:0 0 0 10px">Total</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 10px">'.$qty.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';echo'


<div style="clear:both; margin-bottom:20px"></div>';echo'
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px; font-weight:bold;margin:0 0 0 10px">Total Amount Charged</p>';echo'
</div>';echo'
<div style="width:40px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 40px">'.$tam.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';echo'
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px; font-weight:bold;margin:0 0 0 10px">Total Amount Paid</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 10px">'.$amount.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';
if(stripslashes($row['Instatus'])==1){
    echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px; font-weight:bold;margin:0 0 0 10px">Insurance</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 20px">'.$Insamount.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';
}
echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px; font-weight:bold;margin:0 0 0 10px">Mode of Payment </p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px; font-weight:bold;margin:0 0 0 0px;text-transform:uppercase">'.$paymode.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';
echo'<div style="clear:both; margin-bottom:20px"></div>';
echo'
<p style="text-align:center;font-size:16px; font-weight:bold; margin:0 0 0 0px; margin:0 0 0 0px">We wish you quick recovery.</p>';echo'
<p style="text-align:center;font-size:16px; font-weight:bold; margin:0 0 0 0px; margin:0 0 0 0px">Submitted By '.$posted.'.</p>';echo'
<p style="text-align:center;font-size:16px; font-weight:bold; margin:0 0 0 0px; margin:0 0 0 0px">Received By '.$cashier.'.</p>';
echo'<p style="text-align:center;font-size:16px; font-weight:bold; margin:0 0 0 0px; margin:0 0 0 0px">System Developers: BetterHealth.Co.Ke</p>';
echo'<p style="text-align:center;font-size:16px; font-weight:bold; margin:0 0 0 0px">Tel: 0726606834</p>';

echo'</div>';
?>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>
<?php 
break;

case 63:
?>
<?php
$pid = safe_decode($_GET['pid']);
$rcptno = safe_decode($_GET['rcptno']);
$old_patient_id = safe_decode($_GET['cid']);
#$in_trans_date = safe_decode($_GET['tdt']);
$result =mysqli_query($db, "select * from sales where ClientId='".$pid."' and Cashier!='' and RcptNo='".$rcptno."' and old_patient_id='".$old_patient_id."'");
$row=mysqli_fetch_array($result);
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
<style>
@font-face { font-family: Merchant; src: url('fonts/Merchant.TTF'); } 
body {
  background-image: url("images/reprinted1.png");
  background-repeat:  no-repeat;
}
</style>
<?php 
echo'<div style="width:330px;min-height:370px; border:2px solid #333">';
echo'<p style="text-align:center;font-size:18px; font-weight:normal;font-family:Merchant;margin:0 0 0 0px">'.$comname.'</br>P.O BOX '.$Add.'</br>TEL: '.$tel.'</p>';
echo'<div style="clear:both; margin-bottom:20px"></div>';
echo'<p style="text-align:center;font-size:18px;font-weight:normal; font-family:Merchant;margin:-10px 0 0 0px">Patient Name: '.$patname.'&nbsp; &nbsp;&nbsp;&nbsp;Patient No: '.$patid.'&nbsp; &nbsp;&nbsp;&nbsp; Date:'.$d.'&nbsp; &nbsp;&nbsp;&nbsp;Time:'.convtime($time).'&nbsp; &nbsp;&nbsp;&nbsp;Receipt No: '.$rcptno.'&nbsp; &nbsp;&nbsp;&nbsp;Dept: '.$dept.'</p>';
echo'<div style="clear:both"></div>';
echo'<div style="clear:both"/>';
echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">'; 
  echo'<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<a style="text-align:center;font-size:16px;text-transform:uppercase; font-weight:bold;font-family:Merchant;margin:0 0 0 40px">Item name</a>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<a style="text-align:center;font-size:16px;text-transform:uppercase; font-weight:bold;font-family:Merchant;margin:0 0 0 30px">Qty.</a>';echo'
</div>';
echo'<div>';
echo'</div>';echo'
</div>';
$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and ClientId='".$pid."' and Cashier !=''  ");
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
echo'<div style="width:auto; height:20px; border-bottom:1.0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-weight:normal;font-size:16pxfont-family:Merchant;margin:0 0 0 10px">';echo'
'.stripslashes($row['ItemName']).'</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px;font-weight:normal; font-family:Merchant;margin:0 0 0 10px">';echo'
'.stripslashes($row['Qty']).'</p>';echo'
</div>';echo'

<div>';echo'

</div>';echo'
</div>'; }
echo'
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px font-weight:bold;font-family:Merchant;margin:0 0 0 10px">Total</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px font-weight:bold;font-family:Merchant;margin:0 0 0 10px">'.$qty.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';echo'


<div style="clear:both; margin-bottom:20px"></div>';echo'
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px font-weight:normal;font-family:Merchant;margin:0 0 0 10px">Total Amount Charged</p>';echo'
</div>';echo'
<div style="width:40px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px font-weight:normal;font-family:Merchant;margin:0 0 0 40px">'.$tam.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';echo'
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px font-weight:normal;font-family:Merchant;margin:0 0 0 10px">Total Amount Paid</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px; font-weight:normal;font-family:Merchant;margin:0 0 0 10px">'.$amount.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';
if(stripslashes($row['Instatus'])==1){
    echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px font-weight:normal;font-family:Merchant;margin:0 0 0 10px">Insurance</p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px font-weight:normal;font-family:Merchant;margin:0 0 0 20px">'.$Insamount.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';
}
echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">';echo'
<div style="width:240px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="text-align:left;font-size:16px font-weight:normal;font-family:Merchant;margin:0 0 0 10px">Mode of Payment </p>';echo'
</div>';echo'
<div style="width:80px; height:20px;border-right:1.5px solid #fff; float:left;">';echo'
<p style="text-align:center;font-size:16px font-weight:normal;font-family:Merchant;margin:0 0 0 0px;text-transform:uppercase">'.$paymode.'</p>';echo'
</div>';echo'
<div>';echo'
</div>';echo'
</div>';
echo'<div style="clear:both; margin-bottom:20px"></div>';
echo'
<p style="text-align:center;font-size:16pxfont-weight:normal;font-family:Merchant;margin:0 0 0 0px; margin:0 0 0 0px">We wish you quick recovery.</p>';echo'
<p style="text-align:center;font-size:16pxfont-weight:normal;font-family:Merchant;margin:0 0 0 0px; margin:0 0 0 0px">Submitted By '.$posted.'.</p>';echo'
<p style="text-align:center;font-size:16pxfont-weight:normal;font-family:Merchant;margin:0 0 0 0px; margin:0 0 0 0px">Received By '.$cashier.'.</p>';
echo'<p style="text-align:center;font-size:16pxfont-weight:normal;font-family:Merchant;margin:0 0 0 0px; margin:0 0 0 0px">System Developers: BetterHealth.Co.Ke</p>';
echo'<p style="text-align:center;font-size:16px font-weight:bold;font-family:Merchant;margin:0 0 0 0px">Tel: 0726606834</p>';

echo'</div>';
?>
<script type="text/javascript">
window.print();
window.onfocus=function(){ window.close();}
</script>
<?php 
break;

}
?>          

</body>
</html>
