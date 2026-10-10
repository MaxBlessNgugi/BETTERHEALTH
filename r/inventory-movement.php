<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('inventory-movement', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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

// $id=$_GET['id'];
// if(isset($_GET['rcptno'])){
// $rcptno=$_GET['rcptno']; //$pid=$_GET['pid']; 
// }

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
<title>Better Health Inventory Movement Report</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="../css/feedback.css">
<script type="text/javascript" src="../js/bh-feedback.js"></script>
<script src="../js/functions.js"></script>
<script type="text/javascript" src="../js/connectcode-javascript-code39.js"></script>
<script src="../js/excellentexport.js"></script>


<style>
/*@font-face { font-family: Merchant; src: url('../fonts/Merchant.TTF'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}*/
</style>

</head>

<body>
	<a class="bh-skip" href="#bh-main">Skip to main content</a>

<?php 
$date=date('Y/m/d');
$stamp=date('Ymd');
$name=$_GET['name'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Inventory Movement Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

?>

<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="../<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
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
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Pack Size</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Unit</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Part</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Total</p>
</div>
<div>
<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Description</p>
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
				$arr2[stripslashes($row['ItemCode'])]=stripslashes($row['ItemName']).'ÃÂÃÂ¸'.stripslashes($row['Pack']) ;
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
				$parts=explode('ÃÂÃÂ¸',$val2);
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
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr3[$i][2] ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr3[$i][3] ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $arr3[$i][4] ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-weight:normal;font-size:11px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $arr3[$i][5] ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px;font-weight:normal; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php echo stripslashes($rowa['Description']); ?>
</p>
</div>
</div>
<?php } ?>
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:0px solid #333">
<div style="width:400px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 40px">Totals</p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $x ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $y ?></p>
</div>
<div style="width:150px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><script>document.writeln(( <?php  echo $z ?>).formatMoney(2, '.', ','));</script></p>
</div>
<div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"></p>
</div>
</div>
<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">Transaction By <?php  echo $username ?>.</p>
</div>
<?php 



?>          

</body>
</html>
