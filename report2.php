<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<?php include(__DIR__ . '/includes/db_fns.php');
date_default_timezone_set('Africa/Nairobi'); 
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fulname=stripslashes($row['fullname']);
include(__DIR__ . '/includes/functions.php'); 
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;
bh_authz_note('report2', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));}


if(isset($_GET['id'])){
$id=$_GET['id'];
}
else{
$id=$_POST['id'];
}

if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno'];}
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
  $title=' Statement';
  break;
  case 2:
  $title='Inpatient Patient Invoice';
  break;
  case 3:
  $title='Inpatient Patient Invoice';
  break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
<title><?php echo $title ?></title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chart.js"></script>
<script src="js/functions.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<script src="js/excellentexport.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="assets/vendor/ui/jquery.ui.all.css">
<script src="js/jquery.js"></script>
<script src="assets/vendor/ui/jquery.ui.core.js"></script>
<script src="assets/vendor/ui/jquery.ui.widget.js"></script>
<link type="text/css" rel="stylesheet" href="css/tokens.css">
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script src="assets/vendor/ui/jquery.ui.datepicker.js"></script>

<script>
 $(function() {
    $( "#datepicker" ).datepicker();
 }); 
 $('#datepick1').live('mouseover', function() {
    $( "#datepick1" ).datepicker();
 });
 $('#datepick2').live('mouseover', function() {
      $( "#datepick2" ).datepicker();
 });
</script>
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

</head>

<body style="background:">
	<?php require_once __DIR__ . '/includes/render.php'; echo bh_skip_link('#bh-main'); ?> 

<?PHP
switch($id){

  case 1:
  $date=date('d/m/Y');
$hid=$_GET['hid'];
$hname=$_GET['hname'];
$result =mysqli_query($db, "select * from receipts where hid='".$hid."' and drcr='cr'");
$row=mysqli_fetch_array($result);
$cname=stripslashes($row['cname']);
$filename=$cname.'&nbsp;LANDLORD RENT STATEMENT';

$stamp=date('Ymd');
$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=$_GET['d2'];
}else $d2=0;
//$fname='patients_list';
?>

<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>

<p style="text-align:left;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"> <?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Location: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:left;font-size:11px; font-weight:normal;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:30px 0 0 10px">TO:<br/><strong style="font-size:15px"><?php  echo $cname ?></strong></p>

<p style="text-align:right;font-size:15px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:-80px 10px 0 10px">OFFICIAL  STATEMENT<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<div style="clear:both; margin-bottom:10px" ></div>
<p><a download="<?php  echo $filename ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img alt="Convert to Excel" src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img alt="Convert to Pdf" src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onClick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>
<div style="clear:both"></div>


<?php if($d1!=0){?>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } else {?>
<p style="text-align:left;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"> Statement</p>
<?php } ?>

<?php $d1=stampreverse($d1); $d2=stampreverse($d2);?>

<div style="clear:both; margin-bottom:10px"></div>

<div style="clear:both; margin-bottom:10px" ></div>
<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
      <td  style="width:10%;">DATE</td>
        <td  style="width:10%;">REF.</td>
        <td  style="width:25%;">NAME</td>
         <td  style="width:25%;">DETAILS</td>
       <td  style="width:15%;">DR.</td>
        <td  style="width:19%;">CR.</td>
    </tr>    
<?php
$result =mysqli_query($db, "select * from mainhouses where houseid='".$hid."' ");
              $row=mysqli_fetch_array($result);
              $agentcom=stripslashes($row['agentcom']);
            //  $agentcom2=stripslashes($row['agentcom2']);
              $tax=stripslashes($row['tax']);

  if($d1==0){
  $result =mysqli_query($db, "select * from receipts where hid='".$hid."' and status=1 ");
  $row=mysqli_fetch_array($result);
  }else{
  $result =mysqli_query($db, "select * from receipts where hid='".$hid."' and status=1 and  stamp>='".$d1."' and stamp<='".$d2."'");
  }
  $a=0;$b=0;$gb=0;$c=0;$x=0;$v=0;$y=0;$z=0;$cb1=0;$cb=0;

  $result =mysqli_query($db, "select * from receipts where hid='".$hid."' and status=1 ");
  $a=0;$b=0;$c=0;$d=0;$e=0;$f=0;$g=0;$h=0;$j=0;$k=0; $v=0;$w=0;$y=0;$x=array();$shift1=0;
  $num_results = mysqli_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysqli_fetch_array($result);
  if(stripslashes($row['drcr'])=='cr'){
  $a+=preg_replace('~,~', '', stripslashes($row['amount']));  
  }
  if(stripslashes($row['drcr'])=='dr'){
  $b+=preg_replace('~,~', '', stripslashes($row['amount']));  
  }

  $gb=$b-$a;
 

  $x=$agentcom/100;
  $v=$tax/100;
  $y=$x*$a;
  $z=$v*$y;

  $cb1=$y+$z;
  $cb=$gb-$cb1;

  if($i%2==0){
    echo'
    <tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
    }else{
      echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}
?>

      <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['date']) ?></td>
       <td style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo  stripslashes($row['rcptno']) ?></td>
      <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['tname']) ?></td>
       <td style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;"><?php  echo stripslashes($row['description']) ?></td>
       <td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid; ">
        <?php if(stripslashes($row['drcr'])=='dr'){?>
        <script>document.writeln((<?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script><?php }?></td>

        <td  style="width:19%;border-width:0.5px; border-color:#666; border-style:solid; ">
        <?php if(stripslashes($row['drcr'])=='cr'){?>
        <script>document.writeln((<?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));</script><?php }?></td>
    </tr>


<?php } ?>

</tbody>
</table>  
  
<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #800"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #800"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Dr: <script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #800"></div>

<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Cr: <script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #800"></div>

<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Gross Balance: <script>document.writeln(( <?php  echo $gb ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:10px; border-bottom:1px dashed #800"></div>

<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 10px 0 10px">Total Commissionable Amount:<script>document.writeln(( <?php  echo $a ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Commission @ 5.00%: <script>document.writeln(( <?php  echo $y ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">VAT @ 16.00% : <script>document.writeln(( <?php  echo $z ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:10px; border-bottom:1px dashed #800"></div>

<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Closing Balance: <script>document.writeln(( <?php  echo $cb ?>).formatMoney(2, '.', ','));</script> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php  echo date('d/m/Y') ?></p>
<p style="text-align:left;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Available Balance: <script>document.writeln(( <?php  echo $cb ?>).formatMoney(2, '.', ','));</script> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php  echo date('d/m/Y') ?></p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #800"></div>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Served By <?php  echo $fulname ?>.</p>
<p style="text-align:center;font-size:11px; font-weight:bold; font-style:italic; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ONE STOP SOLUTION FOR ALL YOUR PROPERTY NEEDS.</p>

</div>
<?php 

break;

  case 2:
  $date=date('m/d/Y');
 $result =mysqli_query($db, "select * from temp_bill  where patid=".$rcptno." AND status=5");
  $row=mysqli_fetch_array($result);
  $regn=stripslashes($row['patid']);
  $patn=stripslashes($row['patname']);


   if($regn!=''){
       $resultin =mysqli_query($db, "select * from patients where pntno=".$regn." ");
        $rowin=mysqli_fetch_array($resultin);
        $ipnoregn=stripslashes($rowin['ipno']);
       // $patn=stripslashes($rowin['ClientName']);
    }else{
                    echo"
                    <script>
                    $().customAlert();
                    alert('Sorry!', '<p>You need to discharge the patient first.</p>');
                    e.preventDefault();
                    </script>";
                    exit();
                  }

  $result =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='SUBTOTAL'");
$row=mysqli_fetch_array($result);
$col5=stripslashes($row['col5']) ;

$resulta =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='DIFFERENCE'");
$rowa=mysqli_fetch_array($resulta);
$col52=stripslashes($rowa['col5']) ;


$resulta =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='CLAIM AMOUNT'");
$rowa=mysqli_fetch_array($resulta);
$col22=stripslashes($rowa['col2']) ;

?>
<div style="width:750px; border:2px solid #333">

<div style="width:60.0%; border-right:1px DASHED #333; float:left">

<img alt="Logorep" src="images/logorep.jpg" style="float:left;max-height:105px; width:90px; margin:0px 10px 0 10px; "/>
<p style="text-align:left; font-weight:bold;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo $comname ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?><br/>W: <?php  echo $web ?><br/>E: <?php  echo $email ?></p>
</div>

<div style="width:20.0%; border-right:1px DASHED #333; float:left">

</div>

<div style="width:39.0%; float:left">
<p style="text-align:left;font-size:10px; margin-right:50px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Patient: <?php  echo $patn?></p>
<p style="text-align:left;font-size:10px; margin-right:50px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Inpatient No: <label for="inpno" class="bh-visually-hidden">Patient:</label><input type="text" id="inpno" value="<?php  echo $ipnoregn?>"></p>
<!-- <p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Date:<?php  echo date('d/m/Y') ?></p> -->
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Date:<label for="datepick1" class="bh-visually-hidden">Date:</label><input type="text" id="datepick1" value="<?php echo date('d/m/Y') ?>"></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Cost: <script>document.writeln(( <?php  echo $col5 ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:10px; text-transform:uppercase;font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Net Cost: <script>document.writeln(( <?php  echo $col52 ?>).formatMoney(2, '.', ','));</script></p>
<div style="clear:both; margin-bottom:10px" ></div>
</div>

<div style="clear:both; margin-bottom:0px; border-bottom:2px solid #333"></div>



    <div style="width:16.0%; border-right:1px solid #333; float:left">

    <div style="clear:both; margin-bottom:47px;"></div>

    </div>

    <div style="width:40.0%; border-right:2px solid #333; float:left">
    <p style="text-align:left;font-size:11px;text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;NHIF INPATIENT</p>
    <div style="clear:both; margin-bottom:5px; border-bottom:2px solid #FFF"></div>
    <p style="text-align:left;font-size:11px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;<?php  echo $patn?></p>
  
    </div>

    <div style="width:39.0%; border-right:2px solid #ff;float:left">
    <p style="text-align:center;font-size:14px; text-transform:uppercase; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">CREDIT SALES INVOICE</p>
    <div id="barcode" style="font-family: Merchant; font-size:14px; font-weight:normal;"><?php  echo $rcptno ?></div>
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

    </div>

    <div style="clear:both; margin-bottom:0px; border-bottom:2px solid #333"></div>




<div style="clear:both; margin-bottom:10px"></div>
<div style="width:750px; height:20px;font-weight:bold; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#fff">
<div style="width:70px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#000;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">REF.</p>
</div>

<div style="width:150px; height:20px;font-weight:bold;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#000;text-align:center;font-weight:bold;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">DATE</p>
</div>

<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="color:#000;text-align:center;font-weight:bold;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">ITEM NAME</p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#000;text-align:center;font-weight:bold;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">QTY</p>
</div>
<div style="width:90px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#000;text-align:center;font-weight:bold;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">PRICE</p>
</div>



<div style="width:110px; height:20px;border-right:1.5px solid #fff; float:left; overflow:hidden">
<p style="color:#000;text-align:center;font-weight:bold;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">TOTAL COST</p>
</div>

</div>
<?php
/*$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and col1='SUBTOTAL'");
$row=mysqli_fetch_array($result);
$col5=stripslashes($row['col5']) ;*/
?>
<?php
/*$result =mysqli_query($db, "select * from sales where ClientId=".$regn." ");
$row=mysqli_fetch_array($result);
$itemname=stripslashes($row['ItemName']) ;
$category=stripslashes($row['Category']) ;
*/
$b=0;$c=0;$e=0;$tprice=0;
//$result =mysqli_query($db, "select * from finalbill  where invno=".$rcptno." and patid=".$regn." and col1 NOT IN('SUBTOTAL','DISCOUNT','NHIF REBATE','CLAIM AMOUNT','CLAIM AMOUNT','DIFFERENCE') ");
//$result =mysqli_query($db, "select * from sales where InvNo='".$rcptno."'");
$result =mysqli_query($db, "select * from temp_bill  where patid=".$rcptno." AND status=5");
$num_results = mysqli_num_rows($result);
for ($i=1; $i <$num_results+1; $i++) {
$row=mysqli_fetch_array($result);
$saledate=stripslashes($row['date']) ;
$tprice+=preg_replace('~,~', '', stripslashes($row['total']));

/*$patname=stripslashes($row['patname']) ;
$col1=stripslashes($row['col1']) ;
$col5=stripslashes($row['col5']) ;
$col2=stripslashes($row['col2']) ;*/

     

if($i%2==0){
  echo'<div style="width:auto; height:20px;  " id="normal'.$i.'"">';
  }else{
    echo'<div style="width:auto; height:20px;background:#fff "  id="normal'.$i.'"">';
  }
?>
<div style="width:70px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $i ?></p></div>


<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <?php  echo stripslashes($row['date']) ?></p></div>



<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:LEFT; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px"><?php  echo stripslashes($row['itname']) ?>
</p>
</div>
<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <?php  echo stripslashes($row['quat']) ?></p></div>

<div style="width:90px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"> <?php  echo stripslashes($row['price']) ?></p></div>



<div style="width:110px; height:20px;border-right:1.5px solid #fff; float:left; overflow:hidden ">
<p style="text-align:center; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['total']) ?></p></div>
</div>
<?php } 
  

?>
<?php 
$resultf =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='NHIF REBATE' and status=5");
$rowf=mysqli_fetch_array($resultf);
$col56=stripslashes($rowf['col5']) ;
$col57=stripslashes($rowf['col2']) ;

$resulte =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='BED CHARGES' and status=5");
$rowe=mysqli_fetch_array($resulte);
$col23=stripslashes($rowe['col2']) ;
$col24=stripslashes($rowe['col3']) ;
$pno=stripslashes($rowe['patid']) ;

$resulte =mysqli_query($db, "select * from inpatients where patid=".$rcptno." ");
$rowe=mysqli_fetch_array($resulte);
$wardtype=stripslashes($rowe['WardType']) ;
$bedno=stripslashes($rowe['BedNo']) ;

$result =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='SUBTOTAL' and status=5");
$row=mysqli_fetch_array($result);
$col5s=stripslashes($row['col5']) ;

$resulta =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='DIFFERENCE' and status=5");
$rowa=mysqli_fetch_array($resulta);
$col58=stripslashes($rowa['col5']) ;

$resultv =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='CLAIM AMOUNT' and status=5");
$rowv=mysqli_fetch_array($resultv);
$col222=stripslashes($rowv['col5']) ;

$resultt =mysqli_query($db, "select * from finalbill  where patid=".$rcptno." and col1='CASH TO PAY' and status=5");
$rowt=mysqli_fetch_array($resultt);
$colct=stripslashes($rowt['col5']) ;
?>



<div style="clear:both; margin-bottom:0px; border-bottom:1px solid #333"></div>

<div style="width:37.0%; border-right:1px solid #333; float:left">

<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Admission Date: <?php echo $col23 ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Discharge Date:  <label for="datepick2" class="bh-visually-hidden">Admission Date:</label><input type="text" id="datepick2" value="<?php echo $col24 ?>"></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Admission No:  <?php echo $pno ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Bed No: <?php echo $bedno  ?></p>
<p style="text-align:left;font-size:12px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Ward: <?php echo $wardtype   ?></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Claim No: <?php  echo $col57 ?></p>



</div>





<div style="width:27.0%;  border-right:1px solid #333; float:left">


<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Total Bill: <script>document.writeln(( <?php  echo $tprice ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Less Payment: <script>document.writeln(( <?php  echo $col222 ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Less NIHF: <script>document.writeln(( <?php  echo $col56 ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Less Discount: <script>document.writeln(( <?php  echo $col5d ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Balance: <script>document.writeln(( <?php  echo $colct ?>).formatMoney(2, '.', ','));</script></p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Net Payable: <script>document.writeln(( <?php  echo $tprice ?>).formatMoney(2, '.', ','));</script></p>





</div>





<div style="width:30.0%; border-right:2px solid #fff;float:left">

<div style="clear:both; margin-bottom:5px; border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">TOTAL INVOICE: <script>document.writeln(( <?php echo $tprice  ?>).formatMoney(2, '.', ','));</script></p>



<div style="clear:both; margin-bottom:50px;border-bottom:1px solid #333"></div>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Your health is our concern.</p>
<p style="text-align:left;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 10px">Prepared By <?php  echo $username ?>.</p>
</div>

<div style="clear:both; margin-bottom:0px; border-bottom:1px SOLID #333"></div>

</div>
</div>
<?php 

break;
case 3:

$date=date('Y/m/d');
$regn=$_GET['regn'];
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
<div style="width:135px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Discount</p>
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
$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' and category='".$categ."' and status=1"); 
}
else if(($usertype=='Cssd'||$usertype=='Admin'||$usertype=='Accounts'||$usertype=='Recep'||$usertype=='Pharm')&&$categ=='0'){
$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' and status=1"); 
}
else{
$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' and category='".$userdep."' and status=1");
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
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo stripslashes($row['disc']) ?>).formatMoney(2, '.', ','));</script></p></div>

<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden ">
<p style="text-align:center;height:20px; font-weight:normal;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['subnet']) ?></p></div>


<div   style="overflow:hidden">
<p style="text-align:center;font-size:11px;height:20px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo stripslashes($row['fullname']) ?></p>
</div>
</div>
<?php } 
  

?>



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
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">We wish you quick recovery. We are now NHIF Accredited.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
</div>
</div>
<?php 

break;




}

?>
</body>
</HTML>