 <?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('datarep', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
//ini_set('display_errors', 0);
date_default_timezone_set('Africa/Nairobi');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
$fullname=stripslashes($row['fullname']);
$userdep=stripslashes($row['dept']);
include(__DIR__ . '/includes/functions.php'); 
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script src="js/functions.js"></script>
<script src="js/ajax.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/graph.css" />
<script type="text/javascript" src="js/jquery.flot.min.js"></script>


<?php 
  if(isset($_POST['id'])){$id=$_POST['id'];}
  else{$id=$_GET['id'];}
switch($id){

							case 29:
							#$hid=$_GET['category_name'];
							$date=date('d/m/Y');
							$stamp=date('Ymd');
							#$new_item_id=RAND(1,9).date('dHis').RAND(1,9)+1;
							
							//track unposted
							$_SESSION['notp']=array();
							#$resultx=mysqli_query($db, "SELECT ItemCode FROM items WHERE ItemCode=1325 ORDER BY ItemCode DESC");
							$resultx=mysqli_query($db, "SELECT ItemCode FROM items WHERE SalePrice!='0.00' AND SalePrice!='' AND Category='PHARMACEUTICALS' AND Type='GOOD' ORDER BY ItemCode DESC");
							$posted=0;
							$num_resultx = mysqli_num_rows($resultx);
							for ($i=0; $i <$num_resultx; $i++) {
							$rowx=mysqli_fetch_array($resultx);
							$max=count($_SESSION['notp']);
							$_SESSION['notp'][$max]=stripslashes($rowx['ItemCode']);
							}

							#$resulty=mysqli_query($db, "SELECT ItemCode,SalePrice,OtcPrice FROM items WHERE ItemCode=1325 ORDER BY ItemCode DESC");
							$resulty=mysqli_query($db, "SELECT ItemCode,SalePrice,OtcPrice FROM items WHERE SalePrice!='0.00' AND SalePrice!='' AND Category='PHARMACEUTICALS' AND Type='GOOD' ORDER BY ItemCode DESC");
							$posted=0;
							$num_resulty = mysqli_num_rows($resulty);
							for ($i=0; $i <$num_resulty; $i++) {
								$rowy=mysqli_fetch_array($resulty);
								$transact_id=stripslashes($rowy['ItemCode']);
								$saleprice=stripslashes($rowy['SalePrice']);
								$margin=10;
										#$marg=($margin+100)/100;
										$marg=($margin/100)*($saleprice);
										$otcpr=$saleprice+$marg;
										$otcprice=round($otcpr,0);	

										$resultc = mysqli_query($db, "UPDATE items SET OtcPrice='".$otcprice."' WHERE ItemCode='".$transact_id."' "); 

										$posted+=1;
							
										if($resulty&&$resultc){
											unset($_SESSION['notp'][$transact_id]);
										}
								}								

							if($posted==$num_resultx){
									echo'<p>'.$posted.'/'.$num_resultx.' posted.</p>';
									echo'<img alt="" src="images/tick.png" width="30px" height="30px"/>'; 
									echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"22\" height=\"22\"/>";
									}else{
										$notposted=$num_resultx-$posted;
										echo'<p>'.$notposted.'/'.$num_resultx.' not posted.';
										echo'<h5>Patients Ids. Not Posted</h5>
										<div id="notposted">';
											foreach ($arr as $key => $val) {
											echo $val.'<br/>';	
											}
											echo'</div>';
									}


							break;



				
							
		}

?>
							
							
