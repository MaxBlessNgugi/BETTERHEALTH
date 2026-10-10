<?php
	require_once(__DIR__ . '/includes/db_fns.php');
bh_authz_note('data', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
	require_once('./r/fun.php');
	if (isset($_SESSION['valid_user'])) {
		$username = $_SESSION['valid_user'];
		$result = mysqli_query($db, "select * from users where name='" . $username . "'");
		$row = mysqli_fetch_array($result);
		#$usertype = stripslashes($row['position']);
		$userid = stripslashes($row['userid']);
		#$fullname = stripslashes($row['fullname']);
		#$userdep = stripslashes($row['dept']);
		include(__DIR__ . '/includes/functions.php');
		include(__DIR__ . '/includes/compile.php');
		$usuario=usuarioAccountDetails($db,$userid);
		$userid=$usuario['old_in_user_id'];
		$username=$usuario['old_in_user_name'];
		$usertype=$usuario['old_in_user_type'];
		$fullname=$usuario['old_in_full_name'];
		$userdep=$usuario['old_in_user_dept'];
		$old_in_user_id=$usuario['userid'];
		$old_in_user_name=$usuario['username'];
		$old_in_user_type=$usuario['usertype'];
		$old_in_full_name=$usuario['fullname'];
		$old_in_user_dept=$usuario['userdep'];
	} else {
		echo "<script>window.location.href = \"index.php\";</script>";exit;
	}
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/functions.js"></script>
<script src="js/ajax.js"></script>
 <script>
 	window.onload = setupRefresh
 </script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/graph.css" />
<link type="text/css" rel="stylesheet" href="css/tokens.css">
<link rel="stylesheet" href="css/components.css" />
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script type="text/javascript" src="js/jquery.flot.min.js"></script>


<?php 
	if (isset($_GET['id'])) {
		$id = htmlsan($_GET['id']);
	} elseif (isset($_POST['id'])) {
		$id = htmlsan($_POST['id']);
	} else {
		$id = 404;
	}
	function chat($db, $username, $userdep)
	{
			
		//check for chats
		echo'<div id="scrollbar2" style="width:200px; height:90px" >
			<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
			<div class="viewport" style="width:180px; height:90px">
				 <div class="overview">';
									$date=date('d/m/y');
									$result =mysqli_query($db, "select * from chat where date='".$date."' order by serial desc");
									$num_results = mysqli_num_rows($result);
										for ($a=0; $a <$num_results; $a++) {
											$row=mysqli_fetch_array($result);
											$name=stripslashes($row['name']);
											$chat=stripslashes($row['chat']);
						echo"
			<p style=\"font-size:12px; color:#333; margin:0px 0px; cursor:pointer;\">";
			echo"<img alt=\"\" src=\"images/bullet.png\" style=\"width:12px; height:12px; margin:0 3px -2px 0\" /><strong style=\"color:#10504F\">".$name."</strong>-".$chat."</p>";
										}
											
											
									echo'</div></div></div>';


			//check for messages							
					
			$result =mysqli_query($db, "select * from messages where name='".$username."' and status=0 order by id desc");
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			$b='';$c='';
			for ($a=0; $a <$num_results; $a++) {
				$row=mysqli_fetch_array($result);
				$id=stripslashes($row['Id']);
				$b.='<b>'.stripslashes($row['sender']).'</b>-'.stripslashes($row['message']).'<br/><label for="check'.$a.'" class="bh-visually-hidden">Mark as Read</label><input id=\"check'.$a.'\" type=\"checkbox\" style=\"float:right; margin:0px 0px 0 10px\" onclick=\"checkmess('.$a.','.$id.');\" title=\"Mark as Read\"/><small style=\"float:right\">['.stripslashes($row['date']).']</small><br/>';
			}
			$c.='<b><a style=\'cursor:pointer\' onclick=\"abouttoexpiry()\" onclick=\"checkall(\''.$username.'\'); \">Mark all as Read</a>';
			echo '<script>
		
			$("#messagelog").dialog( "open" );
			$("#mess").html("<b style=\"margin-left:80px\">You have '.$num_results.' new messages.</b><br/>'.$b.'<br/>'.$c.'");';
			echo" $('#messaudio').html('<embed src=\"images/excuse_me_boss.mp3\" autostart=\"true\" width=\"0\" height=\"0\" id=\"sound1\" enablejavascript=\"true\">');</script>";
			}
			
							
		//check for messages							
					
			$result =mysqli_query($db, "select * from messages where name='".$username."' and status=2 order by id desc");
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			$b='';$c='';
			for ($a=0; $a <$num_results; $a++) {
				$row=mysqli_fetch_array($result);
				$id=stripslashes($row['Id']);
				$b.='<b>'.stripslashes($row['sender']).'</b>-'.stripslashes($row['message']).'<br/>
			 <label for="check'.$a.'" class="bh-visually-hidden">Mark as Read</label><input id=\"check'.$a.'\" type=\"checkbox\" style=\"float:right; margin:0px 0px 0 10px\" onclick=\"checkmess('.$a.','.$id.');\" title=\"Mark as Read\"/>
			 <small style=\"float:right\">['.stripslashes($row['date']).']</small><br/>';
			}
			$c.='<b><a style=\'cursor:pointer\'  onclick=\"abouttoexpiry()\" onclick=\"checkall(\''.$username.'\'); \">Stock Expiry</a>';
			echo '<script>
		
			$("#messagelog").dialog( "open" );
			$("#mess").html("<b style=\"margin-left:80px\">You have '.$num_results.' new messages.</b><br/>'.$b.'<br/>'.$c.'");';
			echo" $('#messaudio').html('<embed src=\"images/excuse_me_boss.mp3\" autostart=\"true\" width=\"0\" height=\"0\" id=\"sound1\" enablejavascript=\"true\">');</script>";
									
			}
			
									
		//check for messages							
					
			$result =mysqli_query($db, "select * from messages where name='".$username."' and status=0 order by id desc");
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			$b='';$c='';
			for ($a=0; $a <$num_results; $a++) {
				$row=mysqli_fetch_array($result);
				$id=stripslashes($row['Id']);
				$b.='<b>'.stripslashes($row['sender']).'</b>-'.stripslashes($row['message']).'<br/><label for="check'.$a.'" class="bh-visually-hidden">Mark as Read</label><input id=\"check'.$a.'\" type=\"checkbox\" style=\"float:right; margin:0px 0px 0 10px\" onclick=\"checkmess('.$a.','.$id.');\" title=\"Mark as Read\"/><small style=\"float:right\">['.stripslashes($row['date']).']</small><br/>';
			}
			$c.='<b><a style=\'cursor:pointer\' onclick=\"checkall(\''.$username.'\');\">Mark all as Read</a>';
			echo '<script>
		
			$("#messagelog").dialog( "open" );
			$("#mess").html("<b style=\"margin-left:80px\">You have '.$num_results.' new messages.</b><br/>'.$b.'<br/>'.$c.'");';
			echo" $('#messaudio').html('<embed src=\"images/excuse_me_boss.mp3\" autostart=\"true\" width=\"0\" height=\"0\" id=\"sound1\" enablejavascript=\"true\">');</script>";
									
			}
			
			
			//check for tasks
			$result =mysqli_query($db, "select * from mytasks where ReminderStatus=1 and Stamp<=".date('YmdHi')." order by Event_id asc limit 0,1");
					$num_results = mysqli_num_rows($result);
					if($num_results>0){
					$row=mysqli_fetch_array($result);
					$eid=stripslashes($row['Event_id']);
					$reason=stripslashes($row['Reason']);
					echo"<script>$('#mytask').html('<embed src=\"images/beep-05.wav\" autostart=\"true\" width=\"0\" height=\"0\" id=\"sound9\" enablejavascript=\"\">');</script>";	
					echo"<script>taskrem(".$eid.",'".$reason."','".stripslashes($row['DueDate'])."','".stripslashes($row['DueTime'])."');</script>";
					
					$result = mysqli_query($db, "update mytasks set ReminderStatus=0 where Event_id='".$eid."'");
					}
		//check for appointments
		
		
		$result =mysqli_query($db, "select * from calendar where ReminderStatus=1 and Stamp<=".date('YmdHi')." order by Event_id asc limit 0,1");
					$num_results = mysqli_num_rows($result);
					if($num_results>0){
					$row=mysqli_fetch_array($result);
					$eid=stripslashes($row['Event_id']);
					$reason=stripslashes($row['Reason']);
					echo"<script>$('#mycalendar').html('<embed src=\"images/beep-05.wav\" autostart=\"true\" width=\"0\" height=\"0\" id=\"sound9\" enablejavascript=\"\">');</script>";	
					echo"<script>taskcal(".$eid.",'".$reason."','".stripslashes($row['StartDate'])."','".stripslashes($row['StartTime'])."','".stripslashes($row['Pat_name'])."');</script>";
					
					$result = mysqli_query($db, "update calendar set ReminderStatus=0 where Event_id='".$eid."'");
					}			
					
				
					
												
	}

	switch($id){
							
		case 1:
		$patid=htmlsan($_GET['patid']);
		$dept4rm=htmlsan($_GET['dept4rm']);
		#$patcategory=htmlsan($_GET['patcategory']);
		$in_ins_id=htmlsan($_GET['in_ins_id']);
		$in_ins_name=htmlsan($_GET['in_ins_name']);
		$in_presc_id=htmlsan($_GET['old_in_presc_id']);
		$old_presc_no=htmlsan($_GET['old_presc_no']);
		$old_customer_id=htmlsan($_GET['old_customer_id']);
		$old_customer_no=htmlsan($_GET['old_customer_no']);
		
		if(isset($_GET['patcategory'])){
		$patcategory=htmlsan($_GET['patcategory']);
		}else $patcategory=getClientCategoryPerVisit($db, $in_presc_id);

		if(isset($_GET['pid'])){
		$pid=htmlsan($_GET['pid']);
		}else $pid=htmlsan($_GET['old_presc_no']);

		$amount=htmlsan($_GET['amount']);
		$change=htmlsan($_GET['change']);
		$pmode=htmlsan($_GET['pmode']);
		if($pmode=='OTC Sale'){
		$status=2;	
		}else $status=0;
		$fintot=htmlsan($_GET['fintot']);
		$stamp=date('Ymd');
		$dat=date('Y/m/d');
		$arr=array();
		
		//get receipt no
		$rcptno=getInvoiceNo($db);		
		$othdrugs=checkOtherMedication($db, $in_presc_id);	
		
		if($pid!=$old_presc_no){
				echo"<script>$().customAlert();
alert('Error!', '<p>Something went wrong somewhere!. Kindly Repeat the transaction</p>');
e.preventDefault();</script>";
			exit;
		}
		else if($patid!=$old_customer_no){
				echo"<script>$().customAlert();
alert('Error!', '<p>Something went wrong somewhere!. Kindly Repeat the transaction</p>');
e.preventDefault();</script>";
			exit;
		}
		else {

			$max=count($_SESSION['cart']);
			for ($i = 0; $i < $max; $i++){
			$qsold=0;
			$itcode = $_SESSION['cart'][$i][0];
			$itname = $_SESSION['cart'][$i][1];
			$itquat = $_SESSION['cart'][$i][2];
			$itprice = $_SESSION['cart'][$i][3];
			$tprice = $_SESSION['cart'][$i][4];
			$tvat = $_SESSION['cart'][$i][5];
			$tdisc = $_SESSION['cart'][$i][6];
			$ftotal=$subn= $_SESSION['cart'][$i][7];
			$date = $_SESSION['cart'][$i][8];
			$cname = $_SESSION['cart'][$i][9];
			$itcost = $_SESSION['cart'][$i][10];
			$bal = $_SESSION['cart'][$i][11];
			$qsold = $_SESSION['cart'][$i][12];
			$categ= $_SESSION['cart'][$i][13];
			$qsold+=$itquat;
			$disp=0;
			#$categ_id=$_SESSION['cart'][$i][23];
			#$in_presc_id=$_SESSION['cart'][$i][22];
			$paid=0;
			$arr[]=$itname;

						$resultz =mysqli_query($db, "SELECT BranchId FROM branchtbl WHERE Branchname='".$categ."' ORDER BY BranchId DESC");
						$rowz=mysqli_fetch_array($resultz);
						$old_category_id=stripslashes($rowz['BranchId']);

					    $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$categ."','".$itcode."','".$itname."','".$itquat."','".$itprice."','".$tvat."','".$tdisc."','".$subn."','".$itcost."','".$disp."','".$date."','".$patid."','".$cname."','','".$in_ins_id."','".$in_ins_name."','','','','".$pmode."','".$fintot."','".$amount."','".$change."','".$stamp."','','".$username."','".$status."','38','','".$old_customer_id."','".$userid."','".$old_category_id."','','uno','dos','tres','cuatro','cinco','seis')");

					
						  $last_id = mysqli_insert_id($db);
							$resulta = mysqli_query($db, "insert into pharmrequests values('0','".$pid."','".$patid."','".$cname."','".$itname."','".$itcode."','".$itname."','".$categ."','".$itprice."','".$itquat."','".$ftotal."','".$tdisc."','".$subn."','".$date."-".date('H:i')."','38','".$username."','".$stamp."',0,'".date('H:i')."','','".$fullname."','','".$in_presc_id."','".$old_customer_id."','".$rcptno."','".$paid."','".$last_id."','".$dept4rm."','".$patcategory."')");		

						#$othdrugs=checkOtherMedication($db, $in_presc_id);	#medico

				
				if($resulta){
				#$val=implode(";<br/>",$arr); 
				$val=implode(";<br/>",$arr); 
				$val=$othdrugs.'<br/> '.$val;
				$resultc = mysqli_query($db, "update pharmrequests set servtime='".date('H:i')."',status=2 where prescid='".$pid."' and old_in_presc_id='".$in_presc_id."'");
				$resultx = mysqli_query($db, "update newprescription set PharmTime='".date('H:i')."',Prescription='".$val."' where Id='".$in_presc_id."'");
				}

			}	

	}



		if($resulta){
		
				echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
		echo"<script>$('#totitems').val('');$('#totprice').val('');$('#totvat').val('');$('#totdisc').val('');$('#fintot').val('');$('#ampaid').val('');$('#change').val('');$('#itemname').val('');$('#code').val('');$('#itcost').val('');$('#bal').val('');$('#quat').val('');$('#price').val('');$('#vat').val('');$('#tprice').val('');$('#tvat').val('');$('#disc').val('');$('#total').val('');$('#cname').val('');
		</script>";
$query1 = mysqli_query($db, "CALL GetUserLogs('".$username." processes patients prescriptions. Invoice No:".$rcptno."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");	
		if($status==2){ 
		echo"<script> window.open('report.php?id=36&rcptno=".safe_encode($pid)."&pid=".safe_encode($in_presc_id)."&cid=".safe_encode($old_customer_id)."&cno=".safe_encode($patid)."');</script>";	
		}
				unset($_SESSION['cart']);	
					echo"
					<script>
					$().customAlert();
					alert('Success!', '<p>Transaction posted.</p>');
					setTimeout(function() {
						makeasale();},500);
					</script>";
					exit;
				}
				else{
				$result = mysqli_query($db, "DELETE from sales where rcptno='".$rcptno."'");
					echo"
					<script>
					$().customAlert();
					alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
					e.preventDefault();
					</script>";
				}
		
		break;
		
		case 3:

			if (!isset($_GET['rcptno']) || !isset($_GET['alltot']) || !isset($_SESSION['credit'])) {
				echo "<script>$('#option4').html('<p style=\"font-size:10px; margin-left:10px\">Error Processing Request. </p>')</script>";
				exit;
			}

			$stamp = date('Ymd');
			$date = date('Y/m/d');
			$question = mysqli_query($db, "SELECT TransNo FROM creditnotes ORDER BY TransNo DESC LIMIT 0,1");
			$ans = mysqli_fetch_assoc($question);
			$crdtno = intval($ans['TransNo']);
			do {
				$crdtno += 1;
				$reslt = mysqli_query($db, "SELECT TransNo FROM creditnotes WHERE Creditno='" . $crdtno . "' LIMIT 0,1");
			} while (mysqli_num_rows($reslt) > 0);
			do {
				$crnref = guidv4();
				$resultCrn = mysqli_query($db, "SELECT TransNo FROM creditnotes WHERE CrnRef='" . $crnref . "' LIMIT 0,1 ");
			} while (mysqli_num_rows($resultCrn) > 0);

			$rcptno = trim(mysqli_real_escape_string($db, $_GET['rcptno']));
			$alltot = trim(mysqli_real_escape_string($db, $_GET['alltot']));
			$max = count($_SESSION['credit']);
			for ($i = 1; $i < $max; $i++) {
				$itcode = intval($_SESSION['credit'][$i][0]);
				$itname = trim(mysqli_real_escape_string($db, $_SESSION['credit'][$i][1]));
				$itquat = floatval(preg_replace('~,~', '', $_SESSION['credit'][$i][2]));
				$itprice = floatval(preg_replace('~,~', '', $_SESSION['credit'][$i][3]));
				$rquat = floatval(preg_replace('~,~', '', $_SESSION['credit'][$i][4]));
				$rtot = floatval(preg_replace('~,~', '', $_SESSION['credit'][$i][5]));
				$remquat = floatval(preg_replace('~,~', '', $_SESSION['credit'][$i][6]));
				$tno = trim(mysqli_real_escape_string($db, $_SESSION['credit'][$i][7]));
				$nsubtotal = ($remquat) * ($itprice);
				$result = mysqli_query($db, "SELECT * FROM sales WHERE TransNo='" . $tno . "'");
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					$rcdate = stripslashes($row['Date']);
					$rctype = stripslashes($row['PayMode']);
					$categ = stripslashes($row['Category']);
					$sales_patid = trim(stripslashes($row['ClientId']));
					$sales_patname = trim(stripslashes($row['ClientName']));
					$old_patient_id = trim(stripslashes($row['old_patient_id']));
					$saleCashier = trim(stripslashes($row['Cashier']));
					$dispensedBy = trim(stripslashes($row['dispensedBy']));
					$UnitPrice = floatval(preg_replace('~,~', '', $row['UnitPrice']));

					$result1 = mysqli_query($db, "SELECT id,paymode,cid,cname,invno,rcpt_uid,bankid,bank_name FROM receipts WHERE patid='" . $sales_patid . "' AND rcptno='" . $rcptno . "' LIMIT 0,1");
					if (mysqli_num_rows($result1) > 0) {
						$row1 = mysqli_fetch_assoc($result1);
						$paymode = trim(stripslashes($row1['paymode']));
						$cid = trim(stripslashes($row1['cid']));
						$invno = trim(stripslashes($row1['invno']));
						$bankid = trim(stripslashes($row1['bankid']));
						$bankname = trim(stripslashes($row1['bank_name']));
						$companyname = trim(stripslashes($row1['cname']));
						$rcpt_uid = trim(stripslashes($row1['rcpt_uid']));
						$crnrcpt_id = intval($row1['id']);
						$crntotalPrice = floatval($UnitPrice) * floatval($remquat);

						@mysqli_query($db, "UPDATE `pharmrequests` SET `quat`='" . $remquat . "',`total`='" . $nsubtotal . "',`subnet`='" . $nsubtotal . "' WHERE `paid`=1 AND `old_in_sale_id`='" . $tno . "' AND `patid`='" . $sales_patid . "' AND `old_in_patient_id`='" . $old_patient_id . "' AND `rcptno`='" . $rcptno . "' ");
						@mysqli_query($db, "UPDATE `sales` SET `Qty`='" . $remquat . "',`TotalPrice`='" . $crntotalPrice . "',`Status`=0  WHERE `TransNo`='" . $tno . "' ");

						$resultRcptNewAmt = mysqli_query($db, "SELECT SUM(TotalPrice) AS RcptNewTotal FROM `sales` WHERE `old_patient_id`='" . $old_patient_id . "' AND `RcptNo`='" . $rcptno . "' ");
						$RcptNewRow = mysqli_fetch_assoc($resultRcptNewAmt);
						@mysqli_query($db, "UPDATE `receipts` SET `amount`='" . floatval($RcptNewRow['RcptNewTotal']) . "' WHERE `id`='" . $crnrcpt_id . "' ");

						$resultb = mysqli_query($db, "SELECT * FROM items WHERE ItemCode='" . $itcode . "' LIMIT 0,1 ");
						$rowb = mysqli_fetch_assoc($resultb);
						$bal = floatval($rowb[$categ]);
						$type = trim(stripslashes($rowb['Type']));
						$pack = stripslashes($rowb['Pack']);
						$crnItembatchNo = trim(stripslashes($rowb['CurrentBatchInUse']));
						if ($type == 'SERVICE') {
							$bal = 0;
						} else {
							$bal = $bal + $rquat;
						}

						if ($categ == 'Bal') {
							$bra = 'ADMINISTRATION';
						} else {
							$bra = $categ;
						}
						$resultd = mysqli_query($db, "insert into stocktrack values('0','" . $date . "','" . $bra . "','" . $itcode . "','" . $itname . "','" . $pack . "','CREDIT NOTE','" . $rquat . "','" . $bal . "','" . $username . "','" . $stamp . "')");

						if ($bra == 'ADMINISTRATION') {
							try {
								$resultb = mysqli_query($db, "update items set ADMINISTRATION='" . $bal . "',Bal='" . $bal . "',Activity='CREDIT NOTE ISSUED',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $rquat . "',DESCRIPTION='GOODS RETURNED',MoreDetail='GOODS RETURNED TO " . $bra . "-" . $rcptno . "',TransactedBy='" . $fullname . "' where ItemCode='" . $itcode . "'");
							} catch (Exception $th) {
							}
						} else if ($bra == 'PHARMACY') {
							try {
								$resultb = mysqli_query($db, "update items set PHARMACY='" . $bal . "',Qopening='" . $bal . "',Activity='CREDIT NOTE ISSUED',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $rquat . "',DESCRIPTION='GOODS RETURNED',MoreDetail='GOODS RETURNED TO " . $bra . "-" . $rcptno . "',TransactedBy='" . $fullname . "' where ItemCode='" . $itcode . "'");
							} catch (Exception $th) {
							}
						} else {
							try {
								$resultb = mysqli_query($db, "update items set " . $bra . "='" . $bal . "',Activity='CREDIT NOTE ISSUED',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $rquat . "',DESCRIPTION='GOODS RETURNED',MoreDetail='GOODS RETURNED TO " . $bra . "-" . $rcptno . "',TransactedBy='" . $fullname . "' where ItemCode='" . $itcode . "'");
							} catch (Exception $th) {
							}
						}

						$resulta = mysqli_query($db, "INSERT INTO creditnotes VALUES('','" . $crdtno . "','" . $rcptno . "','" . $rcdate . "','','" . $date . "','" . $rctype . "','" . $itcode . "','" . $itname . "','" . $itprice . "','" . $itquat . "','" . $rquat . "','" . $remquat . "','" . $rtot . "','1','" . $stamp . "','" . $rcpt_uid . "','" . $crnref . "','" . $dispensedBy . "','" . $saleCashier . "','" . $username . "','" . $categ . "')");
						$resultIncomeAcnt = mysqli_query($db, "SELECT crid,`crname`,drid,drname FROM ledgerentries WHERE crid !=630 AND rcptNo=$rcptno AND rcptUid='" . $rcpt_uid . "' LIMIT 0,1 ");
						if (mysqli_num_rows($resultIncomeAcnt) > 0) {
							$rowIncomeAcnt = mysqli_fetch_assoc($resultIncomeAcnt);
							$crnIncomeAcntId = intval($rowIncomeAcnt['crid']);
							$crnIncomeAcntName = trim(stripslashes($rowIncomeAcnt['crname']));
							$crnBankCashAcntId = intval($rowIncomeAcnt['drid']);
							$crnBankCashAcntName = trim(stripslashes($rowIncomeAcnt['drname']));
						} else {
							$resultIncomeAcnt = mysqli_query($db, "SELECT crid,`crname`,drid,drname FROM ledgerentries WHERE crid !=630 AND payMode=$paymode AND rcptUid='" . $rcpt_uid . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultIncomeAcnt) > 0) {
								$rowIncomeAcnt = mysqli_fetch_assoc($resultIncomeAcnt);
								$crnIncomeAcntId = intval($rowIncomeAcnt['crid']);
								$crnIncomeAcntName = trim(stripslashes($rowIncomeAcnt['crname']));
								$crnBankCashAcntId = intval($rowIncomeAcnt['drid']);
								$crnBankCashAcntName = trim(stripslashes($rowIncomeAcnt['drname']));
							} else {
								$crnIncomeAcntId = 635;
								$crnIncomeAcntName = 'Income';
							}
						}

						$reultsCompanies = mysqli_query($db, "SELECT CustomerId FROM creditcustomers WHERE AccountReceivableLedgerID='" . $cid . "' LIMIT 0,1 ");
						if (mysqli_num_rows($reultsCompanies) > 0) {
							$rowCompanies = mysqli_fetch_assoc($reultsCompanies);
							$cid = intval($rowCompanies['CustomerId']);
						}

						//if ($type == 'GOOD') {
						$resultRcptIncomeAcnt = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid=$crnIncomeAcntId ");
						$rowRcptIncomeAcnt = mysqli_fetch_assoc($resultRcptIncomeAcnt);
						$crnincomeacnt_openingbal = floatval($rowRcptIncomeAcnt['bal']);
						$crnincomeacnt_closingbal = floatval($crnincomeacnt_openingbal) - floatval($rtot);

						if ($paymode == 'Companies') {
							//$result3=mysqli_query($db, "SELECT TransNo FROM customerdebts WHERE CustomerId='".$cid."' AND InvoiceNo='".$invno."' AND PatId='".$sales_patid."' LIMIT 0,1");
							$result3 = mysqli_query($db, "SELECT payment_ledgerid,payment_ledgername FROM customerdebts WHERE CustomerId='" . $cid . "' AND InvoiceNo='" . $invno . "' AND DrCr='cr' LIMIT 0,1");
							if (mysqli_num_rows($result3) > 0) {
								$row3 = mysqli_fetch_assoc($result3);
								$bankorcash_ledgerid = intval($row3['payment_ledgerid']);
								$bankorcash_ledgername = trim(stripslashes($row3['payment_ledgername']));

								$resultc = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid='" . $bankorcash_ledgerid . "'");
								$rowc = mysqli_fetch_assoc($resultc);
								$bankorcash_openingbal = floatval($rowc['bal']);
								$bankorcash_closingbal = floatval($bankorcash_openingbal) - floatval($rtot);

								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $bankorcash_ledgerid . "','" . $bankorcash_ledgername . "','" . $crnIncomeAcntId . "','" . $crnIncomeAcntName . "','" . $rtot . "','" . $categ . " credit note issued for " . $itname . " returned.  ','" . $date . "','" . $bankorcash_closingbal . "','" . $crnincomeacnt_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $bankorcash_openingbal . "','" . $crnincomeacnt_openingbal . "','patient','" . $sales_patid . "','" . $sales_patname . "',null,'issue_goods_returned_credit_note','" . $crnref . "','','" . $rcpt_uid . "','1','" . $cid . "','" . $companyname . "','','',null,'" . $rcptno . "','" . $itcode . "','" . $categ . "','" . $paymode . "','" . $username . "','0','0','','','" . $crdtno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $crnincomeacnt_closingbal . "' WHERE ledgerid='" . $crnIncomeAcntId . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $bankorcash_closingbal . "' WHERE ledgerid='" . $bankorcash_ledgerid . "'");
							} else {
								if (intval($cid) == 14) {
									$resultc = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid=670 ");
									$rowc = mysqli_fetch_assoc($resultc);
									$cash_openingbal = floatval($rowc['bal']);
									$cash_closingbal = floatval($cash_openingbal) - floatval($rtot);

									@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','670','Petty Cash Account','" . $crnIncomeAcntId . "','" . $crnIncomeAcntName . "','" . $rtot . "','" . $categ . " credit note issued for " . $itname . " returned. ','" . $date . "','" . $cash_closingbal . "','" . $crnincomeacnt_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $cash_openingbal . "','" . $crnincomeacnt_openingbal . "','patient','" . $sales_patid . "','" . $sales_patname . "',null,'issue_goods_returned_credit_note','" . $crnref . "','','" . $rcpt_uid . "','1','" . $cid . "','" . $companyname . "','','',null,'" . $rcptno . "','" . $itcode . "','" . $categ . "','" . $paymode . "','" . $username . "','0','0','','','" . $crdtno . "','uno','dos','tres','cuatro','cinco','seis')");
									@mysqli_query($db, "UPDATE ledgers SET bal='" . $crnincomeacnt_closingbal . "' WHERE ledgerid='" . $crnIncomeAcntId . "' ");
									@mysqli_query($db, "UPDATE ledgers SET bal='" . $cash_closingbal . "' WHERE ledgerid=670 ");
								} else {
									$reultsQ = mysqli_query($db, "SELECT AccountReceivableLedgerID FROM creditcustomers WHERE CustomerId='" . $cid . "' ");
									if (mysqli_num_rows($reultsQ) > 0) {
										$rowQ = mysqli_fetch_assoc($reultsQ);
										$company_acntreceivable_ledgerid = intval($rowQ['AccountReceivableLedgerID']);
										if ($company_acntreceivable_ledgerid > 0) {
											$resultc = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid='" . $company_acntreceivable_ledgerid . "' ");
											$rowc = mysqli_fetch_assoc($resultc);
											$company_acntreceivable_ledgername = trim(stripslashes($rowc['name']));
											$company_acntreceivable_openingbal = floatval($rowc['bal']);
											$company_acntreceivable_closingbal = floatval($company_acntreceivable_openingbal) - floatval($rtot);

											@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $company_acntreceivable_ledgerid . "','" . $company_acntreceivable_ledgername . "','" . $crnIncomeAcntId . "','" . $crnIncomeAcntName . "','" . $rtot . "','" . $categ . " credit note issued for " . $itname . " returned. ','" . $date . "','" . $bankorcash_closingbal . "','" . $crnincomeacnt_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $company_acntreceivable_openingbal . "','" . $crnincomeacnt_openingbal . "','patient','" . $sales_patid . "','" . $sales_patname . "',null,'issue_goods_returned_credit_note','" . $crnref . "','','" . $rcpt_uid . "','1','" . $cid . "','" . $companyname . "','','',null,'" . $rcptno . "','" . $itcode . "','" . $categ . "','" . $paymode . "','" . $username . "','0','0','','','" . $crdtno . "','uno','dos','tres','cuatro','cinco','seis')");
											@mysqli_query($db, "UPDATE ledgers SET bal='" . $crnincomeacnt_closingbal . "' WHERE ledgerid='" . $crnIncomeAcntId . "' ");
											@mysqli_query($db, "UPDATE ledgers SET bal='" . $company_acntreceivable_closingbal . "' WHERE ledgerid='" . $company_acntreceivable_ledgerid . "' ");
										}
									}
								}
							}
						} else {
							if ($paymode == 'Cash') {
								$resultc = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid=670 ");
								$rowc = mysqli_fetch_assoc($resultc);
								$cash_openingbal = floatval($rowc['bal']);
								$cash_closingbal = floatval($cash_openingbal) - floatval($rtot);

								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','670','Petty Cash Account','" . $crnIncomeAcntId . "','" . $crnIncomeAcntName . "','" . $rtot . "','" . $categ . " credit note issued for " . $itname . " returned. ','" . $date . "','" . $cash_closingbal . "','" . $crnincomeacnt_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $cash_openingbal . "','" . $crnincomeacnt_openingbal . "','patient','" . $sales_patid . "','" . $sales_patname . "',null,'issue_goods_returned_credit_note','" . $crnref . "','','" . $rcpt_uid . "','1','" . $cid . "','" . $companyname . "','','',null,'" . $rcptno . "','" . $itcode . "','" . $categ . "','" . $paymode . "','" . $username . "','0','0','','','" . $crdtno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $crnincomeacnt_closingbal . "' WHERE ledgerid='" . $crnIncomeAcntId . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $cash_closingbal . "' WHERE ledgerid=670 ");
							} else {
								if (!isset($crnBankCashAcntId)) {
									$crnBankCashAcntId = $bankid;
								}
								$resultc = mysqli_query($db, "SELECT bal,`name`,category FROM ledgers WHERE ledgerid='" . $crnBankCashAcntId . "' ");
								$rowc = mysqli_fetch_assoc($resultc);
								$bank_ledgercategory = trim(stripslashes($rowc['category']));
								$bank_ledgername = trim(stripslashes($rowc['name']));
								$bank_openingbal = floatval($rowc['bal']);
								$bank_closingbal = floatval($bank_openingbal) - floatval($rtot);

								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $crnBankCashAcntId . "','" . $bank_ledgername . "','" . $crnIncomeAcntId . "','" . $crnIncomeAcntName . "','" . $rtot . "','" . $categ . " credit note issued for " . $itname . " returned. ','" . $date . "','" . $bank_closingbal . "','" . $crnincomeacnt_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $bank_openingbal . "','" . $crnincomeacnt_openingbal . "','patient','" . $sales_patid . "','" . $sales_patname . "',null,'issue_goods_returned_credit_note','" . $crnref . "','','" . $rcpt_uid . "','1','" . $cid . "','" . $companyname . "','','',null,'" . $rcptno . "','" . $itcode . "','" . $categ . "','" . $paymode . "','" . $username . "','0','0','','','" . $crdtno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $crnincomeacnt_closingbal . "' WHERE ledgerid='" . $crnIncomeAcntId . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $bank_closingbal . "' WHERE ledgerid='" . $crnBankCashAcntId . "' ");
							}
						}

						$resultb = mysqli_query($db, "SELECT * FROM ledgers WHERE ledgerid=630 ");
						$rowb = mysqli_fetch_assoc($resultb);
						$inventory_openingbal = floatval($rowb['bal']);
						$inventory_closingbal = floatval($inventory_openingbal) + floatval($rtot);
						@mysqli_query($db, "UPDATE ledgers SET bal='" . $inventory_closingbal . "' WHERE ledgerid=630 ");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','','','630','Inventory','" . $rtot . "','" . $categ . " credit note issued for " . $itname . " returned. ','" . $date . "','','" . $inventory_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','','" . $inventory_openingbal . "','patient','" . $sales_patid . "','" . $sales_patname . "',null,'issue_goods_returned_credit_note','" . $crnref . "','','" . $rcpt_uid . "','1','" . $cid . "','" . $companyname . "','','','inventory','" . $rcptno . "','" . $itcode . "','" . $categ . "','" . $paymode . "','" . $username . "','0','0','','','" . $crdtno . "','uno','dos','tres','cuatro','cinco','seis')");
						updateItemBatchBalAndBatchInUse($db, $itcode, 'increasePurchasesBatchBal', $crnItembatchNo, $rquat);
						//}

					} else {
						echo "<script>$('#option4').html('<p style=\"font-size:10px; margin-left:10px\">Invalid Receipt Number</p>')</script>";
						exit;
					}
				}
			}
			echo "<script>$('#retotal').val('');$('#rcptno').val('');$('#cdate').val('');$('#csale').val('');</script>";
			if ($resulta) {
				unset($_SESSION['credit']);
				//update ledgers
				echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';

				echo "
										<script>
										window.open('report.php?id=3&rcptno=" . $crdtno . "');
										$().customAlert();
										alert('Success!', '<p>Transaction Successful.</p>');
										e.preventDefault();
										</script>";
			} else {
				$result = mysqli_query($db, "DELETE FROM creditnotes WHERE Creditno='" . $crdtno . "'");
				echo "
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
										e.preventDefault();
										</script>";
				echo "<script>$('#retotal').val('');$('#rcptno').val('');$('#cdate').val('');$('#csale').val('');</script>";
			}


			break;

							case 4:
							break;
							case 5:
							
							$reg=$_GET['reg'];
							$name=strtoupper($_GET['name']);
							$oname=strtoupper($_GET['oname']);
							$lname=strtoupper($_GET['lname']);
							$fourthname=strtoupper($_GET['fourthname']);
							$fullnames=$name.' '.$oname.' '.$lname.' '.$fourthname;
							$dob=$_GET['dob'];
							$age=$_GET['age'];
							$gender=$_GET['gender'];
							$stream=$_GET['stream'];
							$phone2='';
							$house=$_GET['house'];
							$course=$_GET['course'];
							$gname=$_GET['gname'];
							$rship=$_GET['rship'];
							$gphone=$_GET['gphone'];
							$geno=$_GET['geno'];
							$gaddress=$_GET['gaddress'];
							$bgroup=$_GET['bgroup'];
							$alergy=$_GET['alergy'];
							$tcr=$_GET['tcr'];
							$tdr=$_GET['tdr'];
							$insid=$_GET['insid'];
							$insname=$_GET['insname'];
							$cardno=$_GET['cardno'];
							$company=$_GET['company'];
							$ipno=$_GET['ipno'];
							$regn=$_GET['regn'];
							$auto=$_GET['auto'];
							$typeclinics=$_GET['typeclinics'];
							
							$result = mysqli_query($db, "update patients set pntno='".$regn."', name='".$name."',oname='".$oname."',lname='".$lname."',fourthname='".$fourthname."',fullnames='".$fullnames."'
							,dob='".$dob."',age='".$age."',gender='".$gender."',contact='".$stream."',phone2='".$phone2."',address='".$house."',
							email='".$course."',gname='".$gname."',grship='".$rship."',gcont='".$gphone."',geno='".$geno."',
							gaddress='".$gaddress."',empname='".$tcr."',empno='".$tdr."',insurer='".$insname."',insid='".$insid."',cardno='".$cardno."',company='".$company."',bgroup='".$bgroup."',odetails='".$alergy."',ipno='".$ipno."',typeclinics='".$typeclinics."' where auto='".$auto."'");
							
							$result = mysqli_query($db, "update newprescription set PatName='".$fullnames."'  where PatId='".$reg."'");
							
									if($result){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." edits patients database.Patient No:".$reg."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
										<script>
										setTimeout(function() {
											editpatient(21);},500);</script>";
										exit;
									}
									else {
										echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
										}
				
							
							
							break;
							
		case 7: // GOODS RECEIVED INWARDS(GRN)
			$sdate = date('Y/m/d');
			$stamp = date('Ymd');
			$pro = array();
			$max = count($_SESSION['pur']);
			for ($i = 0; $i < $max; $i++) {
				$pro[] = $_SESSION['pur'][$i][0];
			}
			$pro = array_unique($pro);
			$invoice_uid = guidv4();
			foreach ($pro as $key => $val) {
				for ($i = 0; $i < $max; $i++) {
					$itcode = intval($_SESSION['pur'][$i][0]);
					$itname = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][1]));
					$sname = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][11]));
					$itquat = floatval(preg_replace('~/~', '', $_SESSION['pur'][$i][18]));
					$bal = floatval(preg_replace('~/~', '', $_SESSION['pur'][$i][10]));
					$qpurch = floatval(preg_replace('~/~', '', $_SESSION['pur'][$i][15]));
					$oprice = floatval(preg_replace('~/~', '', $_SESSION['pur'][$i][19]));
					$saleset = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][17]));
					$sp = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][4]));
					$marg = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][20]));
					$pack = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][22]));
					if ($val == $itcode) {
						if (isset($_SESSION[$val])) {
							$x = count($_SESSION[$val]);
							$_SESSION[$val][$x] = array($itquat, $bal, $qpurch, $oprice, $saleset, $sp, $marg, $pack, $itname, $sname);
						} else {
							$_SESSION[$val] = array(array());
							$_SESSION[$val][0] = array($itquat, $bal, $qpurch, $oprice, $saleset, $sp, $marg, $pack, $itname, $sname);
						}
					}
				}
			}

			foreach ($pro as $key => $val) {
				$count = count($_SESSION[$val]);
				$a = 0;
				$b = 0;
				$c = 0;
				for ($i = 0; $i < $count; $i++) {
					$a += floatval(preg_replace('~/~', '', $_SESSION[$val][$i][0]));
					$b += floatval(preg_replace('~/~', '', $_SESSION[$val][$i][1]));
					$c += floatval(preg_replace('~/~', '', $_SESSION[$val][$i][2]));
					$sp = $_SESSION[$val][$i][5];
					$oprice = $_SESSION[$val][$i][3];
					$saleset = $_SESSION[$val][$i][4];
					$marg = $_SESSION[$val][$i][6];
					$pack = $_SESSION[$val][$i][7];
					$itname = $_SESSION[$val][$i][8];
					$supname = $_SESSION[$val][$i][9];
					$expirydate = $_SESSION[$val][$i][10];
					#$expiry = dateprint($_SESSION[$val][$i][10]);
					$expiry = preg_replace('~/~', '', $_SESSION[$val][$i][10]);
				}
				$bal = floatval($a) + floatval($b);
				$qpurch = floatval($a) + floatval($c);
				#$expirystamp = floatval(preg_replace('~/~', '', $expiry));
				$expirystamp = floatval(preg_replace('~/~', '', $expiry));

				if ($saleset == 1) {
					$spr = (floatval($sp) + floatval($oprice)) / 2;
					$spr = round(floatval($spr), 0);
				}
				if ($saleset == 2) {
					$spr = $sp;
				}

				if ($saleset == 3) {
					$spr = $oprice;
				}
				$marg = ($marg + 100) / 100;
				$y = $spr / $marg;
				$pp = round($y, 0);
				$resulta = mysqli_query($db, "INSERT INTO stocktrack VALUES('','" . $sdate . "','ADMINISTRATION','" . $val . "','" . htmlsan(strtoupper($itname)) . "','" . $pack . "','PURCHASES-" . $supname . "','" . $a . "','" . $bal . "','" . $username . "','" . $stamp . "')");
				$resultb = mysqli_query($db, "UPDATE items SET SalePrice='" . $spr . "',PurchPrice='" . $pp . "',ADMINISTRATION='" . $bal . "',Bal='" . $bal . "',Qpurch='" . $qpurch . "',TransDate='" . date('d/m/Y') . "', TranStamp='" . date('Ymd') . "',ExpiryDate='" . $expirydate . "',ExpiryStamp='" . $expirystamp . "',TimeStamp='" . date('YmdHi') . "',Activity='PURCHASED',Quantity='" . $a . "', MoreDetail='PURCHASES-" . $supname . "',TransactedBy='" . $fullname . "' where ItemCode='" . $val . "'");
			}

			$ftotal = floatval(preg_replace('~,~', '', $_GET['fintot']));
			$question = mysqli_query($db, "SELECT PurchNo FROM purchases ORDER BY TransNo DESC LIMIT 0,1");
			$ans = mysqli_fetch_assoc($question);
			$rcptno = intval($ans['PurchNo']);
			do {
				$rcptno += 1;
				$result9 = mysqli_query($db, "SELECT TransNo FROM purchases WHERE PurchNo='" . $rcptno . "' LIMIT 0,1 ");
			} while (mysqli_num_rows($result9) > 0);

			$newftotal = 0;
			$max = count($_SESSION['pur']);
			for ($i = 0; $i < $max; $i++) {
				$qpurch = 0;
				$totalsale = 0;
				$itcode = intval($_SESSION['pur'][$i][0]);
				$itname = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][1]));
				$unit1 = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][2]));
				$part = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][3]));
				$sprice = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][4]));
				$pprice = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][5]));
				$sp = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][6]));
				$pp = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][7]));
				$date = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][8]));
				$total = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][9]));
				$bal = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][10]));
				$sname = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][11]));
				$batch = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][12]));
				$invoice = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][13]));
				$expiry = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][14]));
				$qpurch = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][15]));
				$bonus = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][16]));
				$saleset = trim(mysqli_real_escape_string($db, $_SESSION['pur'][$i][17]));
				$itquat = floatval(preg_replace('~,~', '', $_SESSION['pur'][$i][18]));
				$sid = intval($_SESSION['pur'][$i][21]);
				$qpurch += floatval($itquat);
				#$exstamp = dateprint($expiry);
				$exstamp = preg_replace('~/~', '', $expiry);
				$saleprice =	round(floatval($sp) * floatval($itquat), 2);
				$totalsale += floatval($saleprice);
				do {
					$batch_no2 = guidv4();
					$resultBNo = mysqli_query($db, "SELECT TransNo FROM purchases WHERE BatchNo2='" . $batch_no2 . "' LIMIT 0,1 ");
				} while (mysqli_num_rows($resultBNo) > 0);

				$resulta = mysqli_query($db, "INSERT INTO purchases VALUES('','" . $rcptno . "','" . $date . "','" . $itcode . "','" . $itname . "','" . $unit1 . "','" . $part . "','" . $itquat . "','" . $pprice . "','" . $sprice . "','" . $total . "','" . $sid . "','" . $sname . "','" . $batch . "','" . $expiry . "','" . $invoice . "','" . $ftotal . "','" . $stamp . "','" . $exstamp . "','" . $itquat . "','" . $date . "','" . date('YmdHi') . "','" . $username . "','" . $batch_no2 . "','" . $itquat . "',0 )");
				$resultCS = mysqli_query($db, "SELECT Bal FROM creditsuppliers WHERE CustomerId='" . $sid . "'");
				$rowCS = mysqli_fetch_assoc($resultCS);
				$bal2 = floatval($rowCS['Bal']);
				$bal3 = $bal2 + $total;
				$newftotal += floatval($total);
				@mysqli_query($db, "UPDATE creditsuppliers SET Bal='" . $bal3 . "' WHERE CustomerId='" . $sid . "' ");
				$resultCheck = mysqli_query($db, "SELECT TransNo,Amount,Paid FROM supplierdebts WHERE SupplierId='" . $sid . "' AND InvoiceNo='" . $invoice . "' AND GrnNo='" . $rcptno . "' AND DrCr='dr' AND invuid='" . $invoice_uid . "' ");
				if (mysqli_num_rows($resultCheck) > 0) {
					$rowCheck = mysqli_fetch_assoc($resultCheck);
					$prevInvAmount = floatval($rowCheck['Amount']);
					$newInvAmount = floatval($prevInvAmount) + floatval($total);
					$newInvBal = floatval($newInvAmount) - floatval($rowCheck['Paid']);
					@mysqli_query($db, "UPDATE supplierdebts SET Amount='" . $newInvAmount . "',InvBal='" . $newInvBal . "',Bal='" . $bal3 . "' WHERE TransNo='" . intval($rowCheck['TransNo']) . "' AND invuid='" . $invoice_uid . "' ");
				} else {
					@mysqli_query($db, "INSERT INTO supplierdebts VALUES('','" . $sid . "','" . $sname . "','" . $invoice . "','" . $rcptno . "','" . $total . "','dr','0','" . $total . "','" . $bal3 . "','Purchases','" . date('d/m/Y') . "','" . $stamp . "',1,'" . $invoice_uid . "',null,null,'" . $newftotal . "','629','Accounts Payable','" . $username . "')");
				}

				$resultb = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid=629 ");
				$rowb = mysqli_fetch_assoc($resultb);
				$acntpayable_openingbal = floatval($rowb['bal']);
				$acntpayable_closingbal = $acntpayable_openingbal + $total;

				$resultc = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid=644 ");
				$rowc = mysqli_fetch_assoc($resultc);
				$cogs_openingbal = floatval($rowc['bal']);
				$cogs_closingbal = $cogs_openingbal + $total;

				@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','629','Accounts Payable','644','Cost Of Good Sold','" . $total . "','Goods Received Inwards','" . $date . "','" . $acntpayable_closingbal . "','" . $cogs_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $acntpayable_openingbal . "','" . $cogs_openingbal . "','supplier','" . $sid . "','" . $sname . "','" . $batch_no2 . "','receive_goods_inwards',null,'" . $invoice_uid . "',null,0,null,null,null,null,'invoice','" . $invoice . "','" . $itcode . "','ADMINISTRATION',null,'" . $username . "','0','0',null,null,'" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
				@mysqli_query($db, "UPDATE ledgers SET bal='" . $acntpayable_closingbal . "' WHERE ledgerid=629 ");
				@mysqli_query($db, "UPDATE ledgers SET bal='" . $cogs_closingbal . "' WHERE ledgerid=644 ");

				$resultInventory = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid=630 ");
				$rowInventory = mysqli_fetch_assoc($resultInventory);
				$inventory_openingbal = floatval($rowInventory['bal']);
				$inventory_closingbal = $inventory_openingbal + $total;
				@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','','','630','Inventory','" . $total . "','Goods Received Inwards','" . $date . "','','" . $inventory_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "',null,'" . $inventory_openingbal . "','supplier','" . $sid . "','" . $sname . "','" . $batch_no2 . "','receive_goods_inwards',null,'" . $invoice_uid . "',null,0,null,null,null,null,'invoice','" . $invoice . "','" . $itcode . "','ADMINISTRATION','inventory','" . $username . "','0','0',null,null,'" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
				@mysqli_query($db, "UPDATE ledgers SET bal='" . $inventory_closingbal . "' WHERE ledgerid=630 ");
				//$resultBatchInUse = mysqli_query($db, "SELECT CurrentBatchInUse FROM items WHERE ItemCode='" . $itcode . "' ");
				//$rowBatchInUse = mysqli_fetch_assoc($resultBatchInUse);
				//updateItemBatchBalAndBatchInUse($db, $itcode, 'increasePurchasesBatchBal', trim(stripslashes($rowBatchInUse['CurrentBatchInUse'])), $itquat);
				updateItemBatchBalAndBatchInUse($db, $itcode, 'updateBatchNo');
			}

			@mysqli_query($db, "CALL GetUserLogs('" . $username . ": Purchases Stock and Receives Goods Inwards Purchase No:" . $rcptno . "-COMPUTER IP ADDRESS:" . $_SERVER['REMOTE_ADDR'] . "','" . $username . "','" . date('YmdHi') . "', '" . date('H:i') . "','" . date('d/m/Y') . "','1')");
			unset($_SESSION['pur']);
			foreach ($pro as $key => $val) {
				unset($_SESSION[$val]);
			}

			echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
			echo "
					<script>
					window.open('report.php?id=6&rcptno=" . $rcptno . "');
					setTimeout(function() {
						purchase();},500);
					$().customAlert();
					alert('Success!', '<p>Transaction Successful.</p>');
					e.preventDefault();
					</script>";
			exit;

			break;


							
							case 8:
							$categ=$_GET['categ'];
							$result = mysqli_query($db, "insert into categories values('0','".$categ."')");
							if($result){
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
							<script>$('#catadd').html('".$categ.";');</script>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							break;
							
							case 9:
							$code = trim(mysqli_real_escape_string($db, $_GET['code']));
							$a = trim(mysqli_real_escape_string($db, $_GET['a']));
							$bra = trim(mysqli_real_escape_string($db, $_GET['bra']));
							$braid = trim(mysqli_real_escape_string($db, $_GET['braid']));
							#$branch_id=trim(mysqli_real_escape_string($db,$_GET['items_branch_id']));
							$name = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_GET['name']))));
							$pprice = floatval(preg_replace('~,~', '', $_GET['pprice']));
							$sprice = floatval(preg_replace('~,~', '', $_GET['sprice']));
							$crpprice = floatval(preg_replace('~,~', '', $_GET['crpprice']));
							$prshprice = floatval(preg_replace('~,~', '', $_GET['prshprice']));
							$otcsprice = floatval(preg_replace('~,~', '', $_GET['otcsprice']));
							$apaprice = floatval(preg_replace('~,~', '', $_GET['apaprice']));
							$pacisprice = floatval(preg_replace('~,~', '', $_GET['pacisprice']));
							$liasonprice = floatval(preg_replace('~,~', '', $_GET['liasonprice']));
							$oldmutualprice = floatval(preg_replace('~,~', '', $_GET['oldmutualprice']));
							$kplcminetprice = floatval(preg_replace('~,~', '', $_GET['kplcminetprice']));
							$maklmatprice = floatval(preg_replace('~,~', '', $_GET['maklmatprice']));
							$minetcsprice = floatval(preg_replace('~,~', '', $_GET['minetcsprice']));
							$pack = floatval(preg_replace('~,~', '', $_GET['pack']));
							$margin = trim(mysqli_real_escape_string($db, $_GET['margin']));
							$taxable = trim(mysqli_real_escape_string($db, $_GET['taxable']));
							$sellable = trim(mysqli_real_escape_string($db, $_GET['sellable']));
							$quat = floatval(preg_replace('~,~', '', $_GET['quat']));
							$type = trim(mysqli_real_escape_string($db, $_GET['type']));
							$itemcat = trim(mysqli_real_escape_string($db, $_GET['itemcat']));
							$vat = trim(mysqli_real_escape_string($db, $_GET['vat']));

							$mbal = floatval(preg_replace('~,~', '', $_GET['mbal']));
							$supp = trim(mysqli_real_escape_string($db, $_GET['supp']));
							$ltime = trim(mysqli_real_escape_string($db, $_GET['ltime']));
							$moredetails = 'NEW ITEM';
							$covereduncovered=trim(mysqli_real_escape_string($db,$_GET['covereduncovered']));
							$expirydate = dateprint(trim(mysqli_real_escape_string($db, $_GET['expiry'])));
							$expirystamp = trim(mysqli_real_escape_string($db, preg_replace('~/~', '', $_GET['expiry'])));
							if (isset($_GET['molecule'])) {
								$molecule = trim(mysqli_real_escape_string($db, $_GET['molecule']));
							} else $molecule = NULL;

							if ($braid == '') {
								$resxz = mysqli_query($db, "SELECT CatId,ItemCat,`Type` FROM categories WHERE ItemCat='" . $bra . "' AND Type='SERVICE' ORDER BY ItemCat");
								$rowc = mysqli_fetch_assoc($resxz);
								$braid = stripslashes($rowc['CatId']);
							}

							$result = mysqli_query($db, "SELECT ItemCode FROM items ORDER BY ItemCode DESC LIMIT 0,1");
							if (mysqli_num_rows($result) == 0) {
								$itemcode = 1;
							} else {
								$row = mysqli_fetch_assoc($result);
								$itemcode = intval($row['ItemCode']);
								do {
									$itemcode += 1;
									$result9 = mysqli_query($db, "SELECT ItemCode FROM items WHERE ItemCode='" . $itemcode . "' LIMIT 0,1 ");
								} while (mysqli_num_rows($result9) > 0);
							}

							
							$result = mysqli_query($db, "INSERT INTO items VALUES('" . $itemcode . "','" . $name . "','" . $supp . "','" . $mbal . "','" . $ltime . "','" . $sprice . "','" . $pprice . "','" . $quat . "','','','','','','" . $quat . "','" . $type . "','" . $bra . "','" . $itemcat . "','" . $molecule . "','" . $vat . "','" . $taxable . "','" . $sellable . "','','" . $margin ."','" . $pack . "','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','" . date('Y/m/d') . "','" . date('Ymd') . "','" . $expirydate . "','" . $expirystamp . "','" . $crpprice . "','" . $prshprice . "','" . $otcsprice . "','" . $apaprice . "','" . $pacisprice . "','" . $liasonprice . "','" . $oldmutualprice . "','" . $kplcminetprice . "','" . $maklmatprice . "','" . $minetcsprice . "','" . $braid . "','','','" . date('YmdHi') . "','" . $covereduncovered . "','" . $moredetails . "','ADDED','0','ADDED','" . htmlsan(strtoupper($fullname)) . "','')");
							if($type=='GOOD'){
									$resultb = mysqli_query($db, "INSERT INTO minbal VALUES('" . $itemcode . "','" . $name . "','" . $bra . "','" . $pack . "','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','" . $braid . "')");
									
									$resultc= mysqli_query($db, "UPDATE minbal SET ". $userdep ."='" . $mbal . "',old_category_id='" . $braid . "' WHERE ItemCode='" . $itemcode . "'");
							}
							if($result){
								@mysqli_query($db, "CALL GetUserLogs('" . $username . ": adds new stock item.Item Code:" . $code . "-COMPUTER IP ADDRESS:" . $_SERVER['REMOTE_ADDR'] . "','" . $username . "','" . date('YmdHi') . "', '" . date('H:i') . "','" . date('d/m/Y') . "','1')");
								echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
								if($a==1){
									echo"<script>setTimeout(function() {stockitems();},500);</script>";
								}else{
									echo"<script>setTimeout(function() {
									$.ajax({
										url:'link.php',
										data:{id:1,bra:'" . $_GET['bra'] . "',braid:'" . $braid . "'},
										success:function(data){
										$('#mainp').html(data);
										}
									});
									},500);</script>";
								}
							
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";

							exit;

							break;
							
							case 10:
							$code = trim(mysqli_real_escape_string($db, htmlsan($_GET['code'])));
							$a = trim(mysqli_real_escape_string($db, htmlsan($_GET['a'])));
							$bra = trim(mysqli_real_escape_string($db, $_GET['bra']));
							$braid = trim(mysqli_real_escape_string($db, $_GET['braid']));
							$name = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_GET['name']))));
							$pprice = floatval(preg_replace('~,~', '', $_GET['pprice']));
							$sprice = floatval(preg_replace('~,~', '', $_GET['sprice']));
							$crpprice = floatval(preg_replace('~,~', '', $_GET['crpprice']));
							$prshprice = floatval(preg_replace('~,~', '', $_GET['prshprice']));
							$otcsprice = floatval(preg_replace('~,~', '', $_GET['otcsprice']));
							$apaprice = floatval(preg_replace('~,~', '', $_GET['apaprice']));
							$pacisprice = floatval(preg_replace('~,~', '', $_GET['pacisprice']));
							$liasonprice = floatval(preg_replace('~,~', '', $_GET['liasonprice']));
							$oldmutualprice = floatval(preg_replace('~,~', '', $_GET['oldmutualprice']));
							$kplcminetprice = floatval(preg_replace('~,~', '', $_GET['kplcminetprice']));
							$maklmatprice = floatval(preg_replace('~,~', '', $_GET['maklmatprice']));
							$minetcsprice = floatval(preg_replace('~,~', '', $_GET['minetcsprice']));
							$pack = floatval(preg_replace('~,~', '', $_GET['pack']));
							$margin = trim(mysqli_real_escape_string($db, $_GET['margin']));
							$molecule = trim(mysqli_real_escape_string($db, $_GET['molecule']));
							$taxable = trim(mysqli_real_escape_string($db, $_GET['taxable']));
							$sellable = trim(mysqli_real_escape_string($db, $_GET['sellable']));
							$quat = floatval(preg_replace('~,~', '', $_GET['quat']));
							$type = trim(mysqli_real_escape_string($db, $_GET['type']));
							$itemcat = trim(mysqli_real_escape_string($db, $_GET['itemcat']));
							$vat = trim(mysqli_real_escape_string($db, $_GET['vat']));

							$mbal = floatval(preg_replace('~,~', '', $_GET['mbal']));
							$supp = trim(mysqli_real_escape_string($db, $_GET['supp']));
							$ltime = trim(mysqli_real_escape_string($db, $_GET['ltime']));
							$moredetails = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_GET['moredetails']))));
							$councovered=trim(mysqli_real_escape_string($db,$_GET['councovered']));

							if ($braid=='') {
								$resxz = mysqli_query($db, "SELECT CatId,ItemCat,Type FROM categories WHERE ItemCat='".$_GET['bra']."' AND Type='SERVICE' order by ItemCat");
								$rowc=mysqli_fetch_array($resxz);
								$braid=stripslashes($rowc['CatId']);
							} else {
								$braid=$_GET['braid'];
							}

							
 $result = mysqli_query($db, "update items set ItemName='".$name."',SalePrice='".$sprice."',PurchPrice='".$pprice."',SubCategory='".$itemcat."',Category='".$bra."',CorporatePrice='".$crpprice."',InsurancePrice='".$prshprice."',OtcPrice='".$otcsprice."',ApaPrice='".$apaprice."',PacisPrice='".$pacisprice."',LiasonPrice='".$liasonprice."',OldMutualPrice='".$oldmutualprice."',KplcMinetPrice='".$kplcminetprice."',MaklMaternityPrice='".$maklmatprice."',MinetCivilServantsPrice='".$minetcsprice."',CategoryId='".$braid."',CO_UN='".$councovered."',DESCRIPTION='".$moredetails."',TransDate='".date('d/m/Y')."',TranStamp='".date('Ymd')."',TimeStamp='".date('YmdHi')."',Activity='ITEM MODIFIED',MoreDetail='MODIFIES SERVICE ServiceNo:".$code."', TransactedBy='".htmlsan(strtoupper($fullname))."' where ItemCode=".$code."");

							if($result){
$resulta = mysqli_query($db, "CALL GetUserLogs('".$username." edits Billable Service.Item Code:".$code."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
						echo"<script>setTimeout(function() {stockitems();},500);</script>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							break;
							
							case '10.1':
							$code = trim(mysqli_real_escape_string($db, htmlsan($_GET['code'])));
							$a = trim(mysqli_real_escape_string($db, htmlsan($_GET['a'])));
							$bra = trim(mysqli_real_escape_string($db, $_GET['bra']));
							$braid = trim(mysqli_real_escape_string($db, $_GET['braid']));
							$name = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_GET['name']))));
							$pprice = floatval(preg_replace('~,~', '', $_GET['pprice']));
							$sprice = floatval(preg_replace('~,~', '', $_GET['sprice']));
							$crpprice = floatval(preg_replace('~,~', '', $_GET['crpprice']));
							$prshprice = floatval(preg_replace('~,~', '', $_GET['prshprice']));
							$otcsprice = floatval(preg_replace('~,~', '', $_GET['otcsprice']));
							$apaprice = floatval(preg_replace('~,~', '', $_GET['apaprice']));
							$pacisprice = floatval(preg_replace('~,~', '', $_GET['pacisprice']));
							$liasonprice = floatval(preg_replace('~,~', '', $_GET['liasonprice']));
							$oldmutualprice = floatval(preg_replace('~,~', '', $_GET['oldmutualprice']));
							$kplcminetprice = floatval(preg_replace('~,~', '', $_GET['kplcminetprice']));
							$maklmatprice = floatval(preg_replace('~,~', '', $_GET['maklmatprice']));
							$minetcsprice = floatval(preg_replace('~,~', '', $_GET['minetcsprice']));
							$pack = floatval(preg_replace('~,~', '', $_GET['pack']));
							$margin = trim(mysqli_real_escape_string($db, $_GET['margin']));
							$itemcat2 = trim(mysqli_real_escape_string($db, $_GET['itemcat2']));
							$molecule = trim(mysqli_real_escape_string($db, $_GET['molecule']));
							$taxable = trim(mysqli_real_escape_string($db, $_GET['taxable']));
							$sellable = trim(mysqli_real_escape_string($db, $_GET['sellable']));
							$quat = floatval(preg_replace('~,~', '', $_GET['quat']));
							$type = trim(mysqli_real_escape_string($db, $_GET['type']));
							$vat = trim(mysqli_real_escape_string($db, $_GET['vat']));
							$mbal = floatval(preg_replace('~,~', '', $_GET['mbal']));
							$supp = trim(mysqli_real_escape_string($db, $_GET['supp']));
							$ltime = trim(mysqli_real_escape_string($db, $_GET['ltime']));
							$moredetails = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_GET['moredetails']))));
							$councovered=trim(mysqli_real_escape_string($db,$_GET['councovered']));

							$brake='</br>';
							$editby='MODIFIED BY: '.' '.$old_in_full_name.' '.date('Y-m-d H:i:s');
							#$expirydate=dateprint($_GET['expiry']);
							#$expirystamp=preg_replace('~/~', '', $_GET['expiry']);
							$expirydate = dateprint(trim(mysqli_real_escape_string($db, $_GET['expiry'])));
							$expirystamp = trim(mysqli_real_escape_string($db, preg_replace('~/~', '', $_GET['expiry'])));
							
$result = mysqli_query($db, "update items set ItemName='".$name."',SalePrice='".$sprice."',PurchPrice='".$pprice."',SubCategory='".$itemcat2."',Type='".$type."',Vat='".$vat."',Taxable='".$taxable."',OtcPrice='".$otcsprice."',Pack='".$pack."',Sellable='".$sellable."',Margin='".$margin."',Supplier='".$supp."',LeadTime='".$ltime."',Molecule='".$molecule."',CorporatePrice='".$crpprice."',InsurancePrice='".$prshprice."',ApaPrice='".$apaprice."',PacisPrice='".$pacisprice."',LiasonPrice='".$liasonprice."',OldMutualPrice='".$oldmutualprice."',KplcMinetPrice='".$kplcminetprice."',MaklMaternityPrice='".$maklmatprice."',MinetCivilServantsPrice='".$minetcsprice."',CategoryId='".$braid."',CO_UN='".$councovered."',DESCRIPTION='".$moredetails." ".$editby."',Activity='MODIFIED',TransDate='".date('d/m/Y')."',TranStamp='".date('Ymd')."',TimeStamp='".date('YmdHi')."',ExpiryDate='".$expirydate."',ExpiryStamp='".$expirystamp."',Quantity='0',MoreDetail='ITEM MODIFIED',TransactedBy='".htmlsan(strtoupper($fullname))."'  where ItemCode=".$code."");

				$resultc= mysqli_query($db, "update minbal set ".$userdep."='".$mbal."',old_category_id='".$braid."' where ItemCode='".$code."'");
							if($result){
$resulta = mysqli_query($db, "CALL GetUserLogs('".$username." edits stock item.Item Code:".$code."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')"); 
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							echo"<script>setTimeout(function() {								
								$.ajax({
									url:'link.php',
									data:{id:1,bra:'".$_GET['bra']."',braid:'".$_GET['braid']."'},
									success:function(data){
									$('#mainp').html(data);
									}
								});
								},500);</script>";
							
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							break;
							
							case 11:
							$code=$_GET['code'];
							$a=$_GET['a'];
							$result = mysqli_query($db, "DELETE from items where ItemCode='".$code."'");
							if($result){
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
							echo"<script>$('#itemname3').val('');$('#itname2').val('');$('#itcode2').val('');$('#pprice2').val('');$('#sprice2').val('');$('#taxable2').val('');$('#sellable2').val('');$('#vat2').val('');$('#itemcat2').val('');
							</script>";
							if($a==1){
							echo"<script>setTimeout(function() {stockitems();},2000);</script>";
							}else{echo"<script>setTimeout(function() {addstockitems();},2000);</script>";}
							
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							break;
		case 12:
			$result7 = mysqli_query($db, "SELECT vno FROM variance ORDER BY vno DESC LIMIT 0,1 ");
			$row7 = mysqli_fetch_assoc($result7);
			$rcptno = intval($row7['vno']);
			do {
				$rcptno += 1;
				$result9 = mysqli_query($db, "SELECT vno FROM variance WHERE vno='" . $rcptno . "' LIMIT 0,1 ");
			} while (mysqli_num_rows($result9) > 0);
			$editby = 'ADJUSTED BY: ' . ' ' . $fullname . ' AT ' . date("Y-m-d H:i:s");

			$stamp = date('Ymd');
			$date = date('Y/m/d');
			$bra = trim(mysqli_real_escape_string($db, $_GET['bra']));
			$max = count($_SESSION['stock']);
			$j = 0;
			for ($i = 0; $i < $max; $i++) {
				$adjusted_itemcode = intval($_SESSION['stock'][$i][0]);
				$itname = trim(mysqli_real_escape_string($db, $_SESSION['stock'][$i][1]));
				$moredetails = trim(mysqli_real_escape_string($db, strtoupper($_SESSION['stock'][$i][9])));
				$a = floatval(preg_replace('~,~', '', $_SESSION['stock'][$i][4]));
				$b = floatval(preg_replace('~,~', '', $_SESSION['stock'][$i][5])); 
				$bal = floatval(preg_replace('~,~', '', $_SESSION['stock'][$i][5])); 
				$pack = floatval($_SESSION['stock'][$i][7]); 
				$qty = floatval($_SESSION['stock'][$i][4]); 

				if ($bal > 0 && $pack > 0) {
					$part = $bal % $pack;
					$unit = explode('.', ($bal / $pack));
					$unit = $unit[0];
				} else {
					$part = 0;
					$unit = 0;
				}
				if ($bal > $qty) {
					$diffa = $qty - $bal;
					$diff = $a - $b;
				} else {
					$diffa = $bal - $qty;
					$diff = $b - $a;
				}

				$total = $diffa * floatval(preg_replace('~,~', '', $_SESSION['stock'][$i][8])); //saleprice
				$j += $total;
				@mysqli_query($db, "insert into variance values('','" . $rcptno . "','" . $date . "','" . $bra . "','" . $adjusted_itemcode . "','" . $itname . "','" . $pack . "','" . $bal . "','" . $qty . "','" . $total . "','" . $username . "','" . $stamp . "',1)");
				@mysqli_query($db, "insert into stocktrack values('','" . $date . "','" . $bra . "','" . $adjusted_itemcode . "','" . $itname . "','" . $pack . "','STOCK ADJUSTMENT','" . $diff . "','" . $a . "','" . $username . "','" . $stamp . "')");
				if ($bra == 'ADMINISTRATION') {
					$resultb = mysqli_query($db, "update items set ADMINISTRATION='" . $a . "',Diff='" . $diff . "',Bal='" . $a . "',Activity='ADJUSTED',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $a . "',MoreDetail='" . $bra . " STOCK ADJUSTMENT',TransactedBy='" . $fullname . "', DESCRIPTION='" . $moredetails . " " . $editby . "' where ItemCode='" . $adjusted_itemcode . "'");
				} else if ($bra == 'PHARMACY') {
					$resultb = mysqli_query($db, "update items set PHARMACY='" . $a . "',Diff='" . $diff . "',Qopening='" . $a . "',Activity='ADJUSTED',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $a . "',MoreDetail='" . $bra . " STOCK ADJUSTMENT',TransactedBy='" . $fullname . "', DESCRIPTION='" . $moredetails . " " . $editby . "' where ItemCode='" . $adjusted_itemcode . "'");
				} else {
					try {
						$resultb = mysqli_query($db, "update items set " . $bra . "='" . $a . "',Diff='" . $diff . "',Activity='ADJUSTED',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $a . "',MoreDetail='" . $bra . " STOCK ADJUSTMENT',TransactedBy='" . $fullname . "', DESCRIPTION='" . $moredetails . " " . $editby . "' where ItemCode='" . $adjusted_itemcode . "'");
					} catch (Exception $th) {
						//throw $th;
					}
				}
				$resultBatchInUse = mysqli_query($db, "SELECT CurrentBatchInUse FROM items WHERE ItemCode='" . $adjusted_itemcode . "' ");
				if (mysqli_num_rows($resultBatchInUse) > 0) {
					$rowBatchInUse = mysqli_fetch_assoc($resultBatchInUse);
					$adjusted_item_batchno = trim(stripslashes($rowBatchInUse['CurrentBatchInUse']));
				} else {
					$adjusted_item_batchno = updateItemBatchBalAndBatchInUse($db, $adjusted_itemcode, 'updateBatchNo');
				}

				if ($resultb) {
					if ($qty > $bal) {
						$resultb = mysqli_query($db, "select `bal` from `ledgers` where `ledgerid`=630 ");
						$rowb = mysqli_fetch_assoc($resultb);
						$inventory_openingbal = floatval($rowb['bal']);
						$inventory_closingbal = $inventory_openingbal + $total;

						$resultc = mysqli_query($db, "select `bal` from `ledgers` where `ledgerid`=725 ");
						$rowc = mysqli_fetch_assoc($resultc);
						$cogs_openingbal = floatval($rowc['bal']);
						$cogs_closingbal = $cogs_openingbal - $total;

						$resultl = mysqli_query($db, "insert into ledgerentries values('','725','Stock Adjustment','630','Inventory','" . $total . "','Stock adjustment','" . $date . "','" . $cogs_closingbal . "','" . $inventory_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $cogs_openingbal . "','" . $inventory_openingbal . "','','','','" . $adjusted_item_batchno . "','stock_adjustment','',null,'" . $diffa . "','','','','','',null,'inventory_increased','" . $adjusted_itemcode . "','" . $bra . "','','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
						$resultm = mysqli_query($db, "update ledgers set bal='" . $inventory_closingbal . "' where ledgerid=630 ");
						$resultn = mysqli_query($db, "update ledgers set bal='" . $cogs_closingbal . "' where ledgerid=725 ");
						updateItemBatchBalAndBatchInUse($db, $adjusted_itemcode, 'increasePurchasesBatchBal', $adjusted_item_batchno, $diff);
					} else {
						$resultb = mysqli_query($db, "select `bal` from `ledgers` where `ledgerid`=630 ");
						$rowb = mysqli_fetch_assoc($resultb);
						$inventory_openingbal = floatval($rowb['bal']);
						$inventory_closingbal = $inventory_openingbal - $total;

						$resultc = mysqli_query($db, "select `bal` from `ledgers` where `ledgerid`=725 ");
						$rowc = mysqli_fetch_assoc($resultc);
						$cogs_openingbal = floatval($rowc['bal']);
						$cogs_closingbal = $cogs_openingbal + $total;

						$resultl = mysqli_query($db, "insert into ledgerentries values('','630','Inventory','725','Stock Adjustment','" . $total . "','Stock adjustment','" . $date . "','" . $inventory_closingbal . "','" . $cogs_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $inventory_openingbal . "','" . $cogs_openingbal . "','','','','" . $adjusted_item_batchno . "','stock_adjustment','',null,'" . $diffa . "','','','','','',null,'inventory_decreased','" . $adjusted_itemcode . "','" . $bra . "','','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
						$resultm = mysqli_query($db, "update ledgers set bal='" . $inventory_closingbal . "' where ledgerid=630 ");
						$resultn = mysqli_query($db, "update ledgers set bal='" . $cogs_closingbal . "' where ledgerid=725 ");
						updateItemBatchBalAndBatchInUse($db, $adjusted_itemcode, 'reducePurchasesBatchBal', $adjusted_item_batchno, $diff);
					}
				}
			}
			if ($resultb) {
				$resulta = mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": adjusts stock','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
				echo "<script>		
										window.open('output.php?id=12&rcptno=" . $bra . "');
										window.open('report.php?id=50&rcptno=" . $rcptno . "');
										setTimeout(function() {
										stockadj();},500);
										$().customAlert();
										alert('Success!', '<p>Transaction Successful.</p>');
										e.preventDefault();
										</script>";
				unset($_SESSION['stock']);
				exit;
			} else {
				echo "
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction failed. Please repeat the transaction.</p>');
										e.preventDefault();
										</script>";
			}

			break;

							
							
							case 14:
							$tname=$_GET['tname'];
							$comme=$_GET['comme'];
							$date=date('d/m/y');
							
							$result = mysqli_query($db, "insert into chat values('0','".$date."','".$tname."','".$comme."',1)");
							if($result){
								chat($db, $username,$userdep);
								echo"
										<script>$('#comme').val('');</script>";
									}
							break;
							case 15:
							chat($db, $username,$userdep);
							break;
							
							case 16:
							$actype=$_GET['actype'];
							$bankname=$_GET['bankname'];
							$branchname=$_GET['branchname'];
							$acname=$_GET['acname'];
							$acno=$_GET['acno'];
							$postadd=$_GET['postadd'];
							$emailadd=$_GET['emailadd'];
							$date=$_GET['date'];
							$tel=$_GET['tel'];
							$result = mysqli_query($db, "insert into banktbl values('".$bankname."','".$postadd."','".$branchname."','".$tel."','".$emailadd."','".$acname."','".$actype."','".$acno."','".$date."','')");
							if($result){
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 17:
							$stamp=date('Ymd');
							$amount=$_GET['amount'];
							$bankslip=$_GET['bankslip'];
							$acname=$_GET['acname'];
							$acno=$_GET['acno'];
							$info=$_GET['info'];
							$dep=$_GET['dep'];
							$bal=$_GET['bal'];
							$date=date('Y/m/d');
							$bal+=$amount;
							
							$resultb = mysqli_query($db, "insert into transactions values('0','".$date."','".$acno."','".$acname."','".$amount."','".$amount."','','DEPOSIT','".$bankslip."','".$dep."','".$info."','".$stamp."')");
							
							$resultc = mysqli_query($db, "update banktbl set Bal='".$bal."' where AccNo='".$acno."'");
							
							if($resultb&&$resultc){
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
										echo"
										<script>
										setTimeout(function() {
											bank();},500);
										</script>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 18:
							$stamp=date('Ymd');
							$amount=$_GET['amount'];
							$bankslip=$_GET['bankslip'];
							$acname=$_GET['acname'];
							$acno=$_GET['acno'];
							$info=$_GET['info'];
							$dep=$_GET['dep'];
							$bal=$_GET['bal'];
							$date=date('Y/m/d');
							$bal-=$amount;
							
							$resultb = mysqli_query($db, "insert into transactions values('0','".$date."','".$acno."','".$acname."','".$amount."','','".$amount."','WITHDRAW','".$bankslip."','".$dep."','".$info."','".$stamp."')");
							
							$resultc = mysqli_query($db, "update banktbl set Bal='".$bal."' where AccNo='".$acno."'");
							
							if($resultb&&$resultc){
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							echo"
										<script>
										setTimeout(function() {
											bank();},500);
										</script>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 19:
							$cname=$_GET['cname'];
							$web=$_GET['web'];
							$loc=$_GET['loc'];
							$motto=$_GET['motto'];
							$email=$_GET['email'];
							$tel=$_GET['tel'];
							$add=$_GET['add'];
							
							
							$resultc = mysqli_query($db, "update company set CompanyName='".$cname."',Tel='".$tel."',Address='".$add."',Website='".$web."',Email='".$email."',Description='".$loc."',Motto='".$motto."'");
							
							if($resultc){
		$resulta = mysqli_query($db, "insert into log values('0','".$username." updates company details.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

										echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 20:
							$user=strtoupper($_GET['user']);
							$name=$_GET['name'];
							$pos=$_GET['pos'];
							$pass=$_GET['pass'];
							$dept=$_GET['dept'];
							$usid=$_GET['usid'];
							$hod=$_GET['hod'];
							$pass=sha1($pass);
							
							$result = mysqli_query($db, "insert into users values('0','".$user."','".$pos."','images/users/".$usid.".jpg','".$pass."','".$name."','".$dept."','".$usid."','".$hod."',1,'')");		
							if($result){
		$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts new User into System.User Id:".$user."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
								echo"<script>setTimeout(function() {adduser();},500);</script>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 21:
							
							$user=$_GET['user'];
							$pos=$_GET['pos'];
							$rec=$_GET['rec'];
							$dept=$_GET['dept'];
							$hod=$_GET['hod'];
							if($rec==1){
							$result = mysqli_query($db, "update users set password = sha1('password') where name='".$user."'");

							}
							
							
					$result = mysqli_query($db, "update users set position='".$pos."',dept='".$dept."',hod='".$hod."' where name='".$user."'");
							if($result){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes updates user data.User Id:".$user."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
								echo"<script>setTimeout(function() {adduser();},500);</script>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 22:
							$cash=$_GET['cash'];
							$doc=$_GET['doc'];
							$user=$_GET['user'];
							$admin=$_GET['admin'];
							$code=$_GET['code'];
							$pharm=$_GET['pharm'];
							$lab=$_GET['lab'];
							
							$result = mysqli_query($db, "update accesstbl set Admin='".$admin."',Doctor='".$doc."',Cashier='".$cash."',User='".$user."',Pharm='".$pharm."',Lab='".$lab."',Rad='".$_GET['rad']."'
							,Recep='".$_GET['recep']."',ExtMedic='".$_GET['ext']."',Accounts='".$_GET['acc']."',Store='".$_GET['store']."',Emp='".$_GET['emp']."',Triage='".$_GET['triage']."',Nurse='".$_GET['nurse']."' where AccessCode='".$code."'");
					
							if($result){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." updates user rights .User Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"22\" height=\"22\"/>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"22\" height=\"22\"/>";
							break;

		case 23:
			$name = $_GET['name'];
			$result = mysqli_query($db, "insert into branchtbl values('0','" . $name . "')");

			if ($result) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " inserts a new company branch.Branch name:" . $name . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

				echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
			} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";

			break;

		case 24:
			$code = $_GET['code'];

			$result = mysqli_query($db, "DELETE from branchtbl where BranchId='" . $code . "'");

			if ($result) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " deletes company branch.Branch Id:" . $code . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

				echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
				echo "<script>$('#bname2').val('');</script>";
			} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";

			break;

		case 25:

			$userid = $_GET['userid'];
			$name = $_GET['name'];
			$fname = $_GET['fname'];
			$query = mysqli_query($db, "select * from users where name='" . $name . "' and userid!='" . $userid . "'");
			$count = mysqli_num_rows($query);
			if ($count > 0) {
				echo "<script>
									$().customAlert();
									alert('Error!', '<p>Username already taken.</p>');
									e.preventDefault();
									</script>";
				exit;
			}

			$result = mysqli_query($db, "update users set name='" . $name . "',fullname='" . $fname . "' where userid=" . $userid . "");

			if ($result) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " changes username.User Id:" . $userid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
			} else {
				echo '<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
			}
			break;

		case 26:

			$userid = intval($_GET['userid']);
			$opass = $_GET['opass'];
			$npass = $_GET['npass'];
			$cpass = $_GET['cpass'];
			$resultx = mysqli_query($db, "select * from users where userid=" . $userid . "");
			$row = mysqli_fetch_array($resultx);
			$kpass = stripslashes($row['password']);
			$sopass = sha1($opass);

			if ($sopass != $kpass) {
				echo "<script>$().customAlert();
		alert('Error!', '<p>Your old password is wrong!</p>');
		e.preventDefault();</script>";
				exit;
			}

			if ($cpass != $npass) {
				echo "<script>$().customAlert();
		alert('Error!', '<p>Your New password does not match the confirmation detail!</p>');
		e.preventDefault();</script>";
				exit;
			} else if ($opass == $npass) {
				echo "<script>$().customAlert();
		alert('Error!', '<p>Your old password cannot be the same as your new password!</p>');
		e.preventDefault();</script>";
				exit;
			} else if ((strlen($npass) > 16) || (strlen($npass) < 6)) {
				echo "<script>$().customAlert();
		alert('Error!', '<p>Password length must be between 6 and 16 characters!</p>');
		e.preventDefault();</script>";
				exit;
			} else {
				$pass = sha1($npass);
				$result = mysqli_query($db, "update users set password='" . $pass . "' where userid=" . $userid . "");

				if ($result) {

					$resulta = mysqli_query($db, "insert into log values('0','" . $username . " changes password details.User Id:" . $userid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

					echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>
						<script>
											setTimeout(function() {
											changelogin();},500);
										</script>';
				} else {
					echo '<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
				}
			}
			break;

		case 27:
			$name = trim(mysqli_real_escape_string($db, $_GET['name']));
			$result = mysqli_query($db, "insert into expensetbl values('0','" . $name . "')");
			if ($result) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " inserts expense category.Name:" . $name . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

				echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
			} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";

			break;

		case 28:
			$code = trim(mysqli_real_escape_string($db, $_GET['code']));;

			$result = mysqli_query($db, "DELETE from expensetbl where ExpenseId='" . $code . "'");

			if ($result) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " deletes expense category.Expense Id:" . $code . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
				echo "<script>$('#bname2').val('');</script>";
			} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";

			break;

							
			case 29:
			
			break;
		

		case 30:
			$stamp = date('Ymd');
			$date = date('d/m/Y');

			$question = mysqli_query($db, "SELECT IssueNo FROM issuetable ORDER BY TransNo DESC LIMIT 0,1");
			$ans = mysqli_fetch_array($question);
			$rcptno = intval($ans['IssueNo']) + 1;

			do {
				$rcptno += 1;
				$result4 = mysqli_query($db, "SELECT IssueNo FROM issuetable WHERE IssueNo='" . $rcptno . "' ");
			} while (mysqli_num_rows($result4) > 0);

			$max = count($_SESSION['issue']);
			for ($i = 0; $i < $max; $i++) {
				$itcode = $_SESSION['issue'][$i][0];
				$itname = $_SESSION['issue'][$i][1];
				$itquat = $_SESSION['issue'][$i][2];
				$unit = $_SESSION['issue'][$i][3];
				$part = $_SESSION['issue'][$i][4];
				$pack = $_SESSION['issue'][$i][5];
				$dep1 = $_SESSION['issue'][$i][6];
				$dep2 = $_SESSION['issue'][$i][7];
				$tot = $_SESSION['issue'][$i][8];

				$resulta = mysqli_query($db, "insert into issuetable values('0','" . $rcptno . "','" . $date . "','" . $itcode . "','" . $itname . "','" . $itquat . "','" . $unit . "','" . $part . "','" . $dep1 . "','" . $dep2 . "','" . $pack . "','" . $stamp . "','" . $username . "','',1,'" . $tot . "')");
			}

			if ($resulta) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " makes a stock request.Id:" . $rcptno . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				unset($_SESSION['issue']);
				echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';

				echo "
										<script>
										window.open('report.php?id=8&rcptno=" . $rcptno . "');
										setTimeout(function() {stockrequest();},500);
										$().customAlert();
										alert('Success!', '<p>Transaction Successful.</p>');
										e.preventDefault();
										</script>";
				exit;
			} else {
				$result = mysqli_query($db, "DELETE from issuetable where IssueNo='" . $rcptno . "'");
				echo "
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
										e.preventDefault();
										</script>";
			}


			break;

		case 31:
			if (isset($_GET['name']) && isset($_GET['tel']) && isset($_GET['obal']) && isset($_GET['patno']) && !empty($_GET['name'])) {
				$patno = trim(mysqli_real_escape_string($db, $_GET['patno']));
				$name = strtoupper(trim(mysqli_real_escape_string($db, $_GET['name'])));
				$tel = trim(mysqli_real_escape_string($db, $_GET['tel']));
				$obal = 0; //trim(mysqli_real_escape_string($db,$_GET['obal']));
				$result = mysqli_query($db, "SELECT CustomerId FROM creditcustomers WHERE CustomerName='" . $name . "' LIMIT 0,1 ");
				if (mysqli_num_rows($result) == 0) {
					@mysqli_query($db, "INSERT INTO creditcustomers VALUES('','" . $patno . "','" . $name . "','" . $tel . "','" . $obal . "',NULL,NULL,NULL)");
					if (mysqli_affected_rows($db) > 0) {
						$creditcustomer_id = mysqli_insert_id($db);
						$newIdResult = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` ORDER BY `ledgerid` DESC LIMIT 0,1 ");
						$rowNewId = mysqli_fetch_assoc($newIdResult);
						$new_ledgerid = intval($rowNewId['ledgerid']);
						do {
							$new_ledgerid += 1;
							$result4 = mysqli_query($db, "SELECT id FROM ledgers WHERE ledgerid='" . $new_ledgerid . "' ");
						} while (mysqli_num_rows($result4) > 0);

						@mysqli_query($db, "INSERT INTO ledgers VALUES('','" . $new_ledgerid . "','" . $name . "','Asset','0',1,'" . date('d/m/Y') . "','Insurance',1,628,0,null,null,'" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "','" . $username . "','uno','dos','tres','cuatro','cinco','seis')");
						$account_rcvble_ledgerid = $new_ledgerid;
						$result2 = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` ORDER BY `ledgerid` DESC LIMIT 0,1 ");
						$row2 = mysqli_fetch_assoc($result2);
						$new_ledgerid2 = intval($row2['ledgerid']);
						do {
							$new_ledgerid2 += 1;
							$result7 = mysqli_query($db, "SELECT id FROM ledgers WHERE ledgerid='" . $new_ledgerid2 . "' ");
						} while (mysqli_num_rows($result7) > 0);

						@mysqli_query($db, "INSERT INTO ledgers VALUES('','" . $new_ledgerid2 . "','" . $name . "','Income','0',1,'" . date('d/m/Y') . "','Insurance',1,796,0,'" . $account_rcvble_ledgerid . "',null,'" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "','" . $username . "','uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "UPDATE ledgers SET `IncomeAccountLedgerID`='" . $new_ledgerid2 . "' WHERE `ledgerid`='" . $account_rcvble_ledgerid . "' ");
						@mysqli_query($db, "UPDATE creditcustomers SET `AccountReceivableLedgerID`='" . $account_rcvble_ledgerid . "',`IncomeAccountLedgerID`='" . $new_ledgerid2 . "' WHERE `CustomerId`='" . $creditcustomer_id . "' ");

						@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Adds new debtor. Name:" . $name . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
						echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
						echo '<script>
																setTimeout(function() {
																	creditcust();},500);
																</script>';
						exit;
					} else {
						die("<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>");
					}
				} else {
					die("<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>");
				}
			} else {
				die("<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>");
			}

			break;

		case 32:
			$name = trim(mysqli_real_escape_string($db, $_GET['name']));
			$tel = $_GET['tel'];
			$cid = intval($_GET['cid']);
			$result = mysqli_query($db, "update creditcustomers set CustomerName='" . $name . "',Tel='" . $tel . "' where CustomerId=" . $cid . "");

			if ($result) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " updates debtor detail.Id:" . $cid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
				echo '<script>
										setTimeout(function() {
											creditcust();},500);
										</script>';
			} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";

			break;

							
							case '32.1':
							$name=$_GET['name'];
							$amo=$_GET['amo'];
							$bal=$_GET['bal'];
							$desc=$_GET['desc'];
							$rcred=$_GET['rcred'];
							$cid=$_GET['cid'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
						$resulta = mysqli_query($db, "insert into customerdebts values('0','".$cid."','".$name."','".$amo."','dr','','','".$bal."','','".$desc."','".$date."','".$stamp."',1)");	
						$resultb = mysqli_query($db, "update creditcustomers set Bal='".$bal."',RemainingCredit='".$rcred."' where CustomerId=".$cid."");	
					
							if($resulta&&$resultb){
$resulta = mysqli_query($db, "insert into log values('0','".$username." posts debt to customer.Id:".$cid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							echo'<script>
										setTimeout(function() {
											creditcust();},500);
										</script>';
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 33:
							$name=$_GET['name'];
							$amo=$_GET['amo'];
							$rdebt=$_GET['rdebt'];
							$pmode=$_GET['pmode'];
							$desc=$_GET['desc'];
							$cid=$_GET['cid'];
							$date=date('Y/m/d');
							$stamp=preg_replace('~/~', '', $date);
							
							$resulta = mysqli_query($db, "insert into customerdebts values('0','".$cid."','".$name."','".$amo."','cr','','','".$rdebt."','".$pmode."','".$desc."','".$date."','".$stamp."',1)");	
							$resultb =mysqli_query($db, "SELECT * FROM creditcustomers WHERE CustomerId='".$cid."'");
							$row=mysqli_fetch_array($resultb);
							$rcred=stripslashes($row['RemainingCredit']);
							$rcred=$rcred+$amo;
							$resultc = mysqli_query($db, "update creditcustomers set RemainingCredit='".$rcred."',Bal='".$rdebt."' where CustomerId=".$cid."");
						
							if($resulta&&$resultb&&$resultc){
$resulta = mysqli_query($db, "insert into log values('0','".$username." pays customer debt.Id:".$cid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							echo'<script>
										setTimeout(function() {
											creditcust();},500);
										</script>';
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;


		case 34:
			if (isset($_GET['name']) && isset($_GET['obal']) && isset($_GET['tel']) && !empty($_GET['name'])) {
				$name = trim(mysqli_real_escape_string($db, $_GET['name']));
				$tel = trim(mysqli_real_escape_string($db, $_GET['tel']));
				$obal = 0; //trim(mysqli_real_escape_string($db,$_GET['obal']));
				$result = mysqli_query($db, "SELECT CustomerId FROM creditsuppliers WHERE CustomerName='" . $name . "' LIMIT 0,1 ");
				if (mysqli_num_rows($result) == 0) {
					@mysqli_query($db, "INSERT INTO creditsuppliers VALUES('','" . $name . "','" . $tel . "','" . $obal . "',NULL,NULL,NULL)");
					if (mysqli_affected_rows($db) > 0) {
						$creditsupplier_id = mysqli_insert_id($db);
						$newIdResult = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` ORDER BY `ledgerid` DESC LIMIT 0,1 ");
						$rowNewId = mysqli_fetch_assoc($newIdResult);
						$new_ledgerid = intval($rowNewId['ledgerid']);
						do {
							$new_ledgerid += 1;
							$result4 = mysqli_query($db, "SELECT id FROM ledgers WHERE ledgerid='" . $new_ledgerid . "' ");
						} while (mysqli_num_rows($result4) > 0);

						@mysqli_query($db, "INSERT INTO ledgers VALUES('','" . $new_ledgerid . "','" . $name . "','Asset','0',1,'" . date('d/m/Y') . "','Supplier',1,628,0,null,null,'" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "','" . $username . "','uno','dos','tres','cuatro','cinco','seis')");
						$account_rcvble_ledgerid = $new_ledgerid;
						$result2 = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` ORDER BY `ledgerid` DESC LIMIT 0,1 ");
						$row2 = mysqli_fetch_assoc($result2);
						$new_ledgerid2 = intval($row2['ledgerid']);
						do {
							$new_ledgerid2 += 1;
							$result7 = mysqli_query($db, "SELECT id FROM ledgers WHERE ledgerid='" . $new_ledgerid2 . "' ");
						} while (mysqli_num_rows($result7) > 0);

						@mysqli_query($db, "INSERT INTO ledgers VALUES('','" . $new_ledgerid2 . "','" . $name . "','Income','0',1,'" . date('d/m/Y') . "','Supplier',1,796,0,'" . $account_rcvble_ledgerid . "',null,'" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "','" . $username . "','uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "UPDATE ledgers SET `IncomeAccountLedgerID`='" . $new_ledgerid2 . "' WHERE `ledgerid`='" . $account_rcvble_ledgerid . "' ");
						@mysqli_query($db, "UPDATE creditsuppliers SET `AccountReceivableLedgerID`='" . $account_rcvble_ledgerid . "',`IncomeAccountLedgerID`='" . $new_ledgerid2 . "' WHERE `CustomerId`='" . $creditsupplier_id . "' ");

						@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Adds new creditor. Name:" . $name . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
						echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
						echo '<script>
														setTimeout(function() {
															creditsup();},500);
														</script>';
						exit;
					} else {
						die("<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>");
					}
				} else {
					die("<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>");
				}
			} else {
				die("<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>");
			}

			break;

			case 35:
				$cid = intval($_GET['cid']);

				$result = mysqli_query($db, "DELETE from creditcustomers where CustomerId='" . $cid . "'");

				if ($result) {
					$resulta = mysqli_query($db, "insert into log values('0','" . $username . " deletes credit customer.Id:" . $cid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
					echo '<script>
											setTimeout(function() {
												creditcust();},500);
											</script>';
				} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";

			break;

			case 36:
				$cid = intval($_GET['cid']);


				$resulta = mysqli_query($db, "DELETE FROM creditsuppliers WHERE CustomerId='" . $cid . "'");


				if ($result) {
					$resulta = mysqli_query($db, "insert into log values('0','" . $username . " deletes credit customer.Id:" . $cid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
					echo '<script>
											setTimeout(function() {
												creditsup();},500);
											</script>';
				} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";

			break;

			case 37:
				$name = trim(mysqli_real_escape_string($db, $_GET['name']));
				$tel = $_GET['tel'];
				$cid = intval($_GET['cid']);
				$result = mysqli_query($db, "update creditsuppliers set CustomerName='" . $name . "',Tel='" . $tel . "' where CustomerId=" . $cid . "");

				if ($result) {
					$resulta = mysqli_query($db, "insert into log values('0','" . $username . " updates creditor detail.Id:" . $cid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
					echo '<script>
											setTimeout(function() {
												creditsup();},500);
											</script>';
				} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";

			break;
			
							case '37.1':
							$name=$_GET['name'];
							$amo=$_GET['amo'];
							$bal=$_GET['bal'];
							$desc=$_GET['desc'];
							$rcred=$_GET['rcred'];
							$cid=$_GET['cid'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
						$resulta = mysqli_query($db, "insert into supplierdebts values('0','".$cid."','".$name."','".$amo."','dr','".$bal."','','".$desc."','".$date."','".$stamp."')");	
						$resultb = mysqli_query($db, "update creditsuppliers set Bal='".$bal."',RemainingCredit='".$rcred."' where CustomerId=".$cid."");	
					
							if($resulta&&$resultb){
$resulta = mysqli_query($db, "insert into log values('0','".$username." posts debt to supplier.Id:".$cid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							echo'<script>
										setTimeout(function() {
											creditsup();},500);
										</script>';
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							
							break;


		case 38:
			$name = trim(mysqli_real_escape_string($db, $_GET['name']));
			$amo = $_GET['amo'];
			$rdebt = $_GET['rdebt'];
			$pmode = $_GET['pmode'];
			$desc = $_GET['desc'];
			$cid = intval($_GET['cid']);
			$date = date('Y/m/d');
			$stamp = preg_replace('~/~', '', $date);

			$resulta = mysqli_query($db, "insert into supplierdebts values('0','" . $cid . "','" . $name . "','" . $amo . "','cr','" . $rdebt . "','" . $pmode . "','" . $desc . "','" . $date . "','" . $stamp . "')");
			$resultc = mysqli_query($db, "update creditsuppliers set Bal='" . $rdebt . "' where CustomerId=" . $cid . "");

			if ($resulta && $resultc) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " pays supplier debt.Id:" . $cid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				echo "<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
				echo '<script>
										setTimeout(function() {
											creditsup();},500);
										</script>';
			} else echo "<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";

			break;

							
							case 39:
	
						
							
							$a=$_GET['a'];
							$emp=$_GET['emp'];
							
							
							
							if(isset($_SESSION['lan'])){
								$languages=implode(";",$_SESSION['lan']);
							}else $languages=NULL;
							if(isset($_SESSION['skl'])){
								$skills=implode(";",$_SESSION['skl']);
							}else $skills=NULL;
							if(isset($_SESSION['hobby'])){
								$hobbies=implode(";",$_SESSION['hobby']);
							}else $hobbies=NULL;
							if(isset($_SESSION['exp'])){
								$experience=implode(";",$_SESSION['exp']);
							}else $experience=NULL;
							if(isset($_SESSION['edu'])){
								$education=implode(";",$_SESSION['edu']);
							}else $education=NULL;
							
						
							if($a==1){
								
							$result =mysqli_query($db, "select * from employee where emp='".$emp."'");
							$num_results = mysqli_num_rows($result);
									if($num_results>=1){
										echo"
												<script>
												$().customAlert();
												alert('Error!', '<p>Employee No. already exists in the database</p>');
												e.preventDefault();
												</script>";
										exit;
									}


							$stampexp=$_GET['contto'];
							$stampexp=preg_replace('~/~', '', $stampexp);
							
							$resulta = mysqli_query($db, "insert into employee values('0','".$_GET['emp']."','".strtoupper($_GET['fname'])."','".strtoupper($_GET['mname'])."','".strtoupper($_GET['lname'])."','".strtoupper($_GET['dob'])."','".strtoupper($_GET['mar'])."','".strtoupper($languages)."','".strtoupper($_GET['gender'])."','".strtoupper($_GET['idno'])."','".strtoupper($_GET['phone'])."','".strtoupper($_GET['phone2'])."','".strtoupper($_GET['email'])."',
							'".strtoupper($_GET['phy'])."','".strtoupper($_GET['town'])."','".strtoupper($_GET['sal'])."','".strtoupper($_GET['emptype'])."','".strtoupper($_GET['contfrom'])."','".strtoupper($_GET['contto'])."','".$stampexp."','".strtoupper($_GET['dept'])."','".strtoupper($_GET['branch'])."','".strtoupper($_GET['pos'])."','".mysqli_real_escape_string($db, trim($_GET['jobdesc']))."','".$_GET['bgroup']."','".mysqli_real_escape_string($db, trim($_GET['alergy']))."','".$_GET['ename']."','".$_GET['ephone']."','".$_GET['epostal']."','".$_GET['bid']."','".strtoupper($_GET['bname'])."','".$_GET['acno']."','".$_GET['pinno']."','".$_GET['nssf']."','".$_GET['nhif']."','".strtoupper($education)."','".strtoupper($experience)."','".strtoupper($skills)."','".strtoupper($hobbies)."','images/employees/".$emp.".jpg','0','0','".$_GET['doe']."','','','".date('Ymd')."','".date('d/m/Y')."',1,'')") or die (mysql_error());
							
							
							$fnames=strtoupper($_GET['fname']). ' '.strtoupper($_GET['mname']).' '.strtoupper($_GET['lname']);
							$cur=date('m_Y');
							$resultb = mysqli_query($db, "insert into ".$cur." values('0','".$_GET['emp']."','".strtoupper($_GET['branch'])."','".$fnames."','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')") or die (mysql_error());
							
							}
							
							
							else{
								
							$resulta = mysqli_query($db, "update employee set fname='".strtoupper($_GET['fname'])."',mname='".strtoupper($_GET['mname'])."',lname='".strtoupper($_GET['lname'])."',dob='".strtoupper($_GET['dob'])."',marital='".strtoupper($_GET['mar'])."',languages='".strtoupper($languages)."',gender='".strtoupper($_GET['gender'])."',idno='".strtoupper($_GET['idno'])."',phone='".strtoupper($_GET['phone'])."',phone2='".strtoupper($_GET['phone2'])."',email='".strtoupper($_GET['email'])."',phyadd='".strtoupper($_GET['phy'])."',town='".strtoupper($_GET['town'])."',salary='".strtoupper($_GET['sal'])."',emptype='".strtoupper($_GET['emptype'])."',contractfrom='".strtoupper($_GET['contfrom'])."',contractto='".strtoupper($_GET['contto'])."',dept='".strtoupper($_GET['dept'])."',branch='".strtoupper($_GET['branch'])."',position='".strtoupper($_GET['pos'])."',jobdesc='".mysqli_real_escape_string($db, trim($_GET['jobdesc']))."',bgroup='".strtoupper($_GET['bgroup'])."',alergy='".mysqli_real_escape_string($db, trim($_GET['alergy']))."',ename='".strtoupper($_GET['ename'])."',ephone='".strtoupper($_GET['ephone'])."',epostal='".strtoupper($_GET['epostal'])."',bid='".strtoupper($_GET['bid'])."',bname='".strtoupper($_GET['bname'])."',acno='".strtoupper($_GET['acno'])."',pinno='".strtoupper($_GET['pinno'])."',nssf='".strtoupper($_GET['nssf'])."',nhif='".strtoupper($_GET['nhif'])."',education='".strtoupper($education)."',experience='".strtoupper($experience)."',skills='".strtoupper($skills)."',hobbies='".strtoupper($hobbies)."',employdate='".strtoupper($_GET['doe'])."' where emp='".$emp."'");
							
							
							$resultb =mysqli_query($db, "select * from payroll where status=1 and emp='".$emp."' order by serial desc limit 0,1");
							$row=mysqli_fetch_array($resultb);
							$serial=stripslashes($row['serial']);
				$resultc = mysqli_query($db, "update payroll set bid='".strtoupper($_GET['bid'])."',bname='".strtoupper($_GET['bname'])."',acno='".strtoupper($_GET['acno'])."' where serial='".$serial."'");
								
							}
							
									if($resulta){
$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts data into Employee database.PF No:".$emp."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
									echo'<img alt="" src="images/tick.png" style="margin-top:0px"  width="30" height="30"/>';
									if($a==1){
										echo'<script>setTimeout(function() {newemp();},500);</script>';
                                        }else{echo'<script>setTimeout(function() {seeemp(5);},500);</script>';}
										exit;
									}
									else{
										echo'<img alt="" src="images/delete.png" style="margin-top:0px"  width="30" height="30"/>';
										
									}
							
							break;
							
							
								case 43:
							$sal=$_GET['sal'];
							$name=$_GET['name'];
							$emp=$_GET['emp'];
							$mon=$_GET['mon'];
							$page=$_GET['page'];
							$allow=$_GET['allow'];
							$adva=$_GET['adva'];
							$ins=$_GET['ins'];
							$ded=$_GET['ded'];
							$othrs=$_GET['othrs'];
							$rateot=$_GET['rateot'];
							$date= date('m_Y'); 
							$dept='Others'; 
							$totalot=$rateot*$othrs;
							$net=$sal+$allow+$totalot-$adva-$ins-$ded;
							if($emp!=''){
							$result =mysqli_query($db, "select * from ".$mon." where emp='".$emp."'");
							$num_results = mysqli_num_rows($result);
							if($num_results>=1){
								echo'exists';
								exit;
							}
							
		$resulta = mysqli_query($db, "insert into ".$mon." values('0','".$mon."','".$emp."','".$name."','".$dept."','".$sal."',
							'".$allow."','".$adva."','".$ins."','".$ded."','".$othrs."','".$rateot."','".$totalot."','".$net."',1)");
		$resultb = mysqli_query($db, "insert into salary values('0','".$mon."','".$emp."','".$name."','".$dept."','".$sal."',
							'".$allow."','".$adva."','".$ins."','".$ded."','".$othrs."','".$rateot."','".$totalot."','".$net."','')");
		
		
		
							if($resulta&&$resultb){
									echo'<img alt="" src="images/tick.png"  width="20" height="20"/>';
									echo"<script>
										setTimeout(function() {
											pagerefresh(1,9,'".$mon."');},500);
										</script>
									";
									
									}
								else{
									echo'<img alt="" src="images/delete.png"  width="20" height="20"/>';
									}
									
							}
							else{
									echo'<img alt="" src="images/delete.png"  width="20" height="20"/>';
									}
								break;
								
							case 44:
							$emp=$_GET['emp'];
							$page=$_GET['page'];
							$mon=$_GET['mon'];
						
							echo'<p style="display:none" id="empno">'.$emp.'</p>';
							$resulta = mysqli_query($db, "DELETE from salary where emp='".$emp."'");
							$resultb = mysqli_query($db, "DELETE from ".$mon." where emp='".$emp."'");
							if($resulta&&$resultb){
									echo'
									<img alt="" src="images/delete.png"  width="20" height="20"/>';
									echo"<script>
										setTimeout(function() {
											pagerefresh(".$page.",9,'".$mon."');},500);
										</script>
									";
									}
								
								break;
								
								
							case 45:
							$mon=$_GET['mon'];
							$totalnet=0;$totalsal=0;$totalallow=0;$totaladva=0;$totalins=0;$totalded=0;$totalothrs=0;$totalotal=0;
							$result =mysqli_query($db, "select * from ".$mon."");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$net=stripslashes($row['net']);
							$sal=stripslashes($row['sal']);
							$allow=stripslashes($row['allow']);
							$adva=stripslashes($row['adva']);
							$ins=stripslashes($row['ins']);
							$ded=stripslashes($row['ded']);
							$othrs=stripslashes($row['othrs']);
							$totalot=stripslashes($row['totalot']);
							$totalnet+=$net;
							$totalsal+=$sal;
							$totalallow+=$allow;
							$totaladva+=$adva;
							$totalins+=$ins;
							$totalded+=$ded;
							$totalothrs+=$othrs;
							$totalotal+=$totalot;}
							
							
							$result =mysqli_query($db, "select * from salaryledger where month='".$mon."'");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);}
							$balance=stripslashes($row['Balance']);
							$stamp=stripslashes($row['stamp']);
							$am=stripslashes($row['amount']);
							
		$resultb = mysqli_query($db, "update salaryledger set amount='".$totalnet."',sal='".$totalsal."',allow='".$totalallow."',adva='".$totaladva."',ins='".$totalins."',ded='".$totalded."',othrs='".$totalothrs."',totalot='".$totalotal."',status=0 where month='".$mon."'");
							$totalnet-=$am;
							
							
							$result =mysqli_query($db, "select * from salaryledger where stamp>=".$stamp."");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$monn=stripslashes($row['month']);
							$balance=stripslashes($row['Balance']);
							$balance-=$totalnet;
							$resultc = mysqli_query($db, "update salaryledger set Balance='".$balance."' where month='".$monn."'");
							$balance=0;
							}
							
							if($resultc){
									echo'<img alt="" src="images/tick.png"  width="30" height="30"/>';
									
									}
								else{
									echo'<img alt="" src="images/delete.png"  width="30" height="30"/>';
									}
								
									echo"<script>
										setTimeout(function() {
											location.reload(true);},500);
										</script>
									";
								break;
								
								
						case 46:
							$regn=$_GET['regn'];
							$tbl=$_GET['tbl'];
							
						$result = mysqli_query($db, "update ".$tbl." set status=1 where regn='".$regn."'");
							
							if($result){
									echo'<img alt="" src="images/tick.png" width="20px" height="20px"/>';
																		
									}
								else{
									echo'<img alt="" src="images/delete.png" width="20px" height="20px"/>';
									}
								
									
						break;
						
						case 47:
						$a=$_GET['a'];
						echo $a;
						$result =mysqli_query($db, "select * from items where ItemCode=".$a."");
							$row=mysqli_fetch_array($result);
								$vat=stripslashes($row['Vat']);
								$itemp=stripslashes($row['SalePrice']);
								$item=stripslashes($row['ItemName']);
								$code=stripslashes($row['ItemCode']);
								$itcost = stripslashes($row['PurchPrice']);
								$bal = stripslashes($row['Bal']);
								$qsold = stripslashes($row['Qsold']);
								
								echo"<script>
								$('#total').val('');
								$('#disc').val('');
								$('#price').val(".$itemp.");
								$('#red').val('".$item."');
								$('#code').val(".$code.");
								$('#itcost').val(".$itcost.");
								$('#vat').val(".$vat.");
								$('#bal').val(".$bal.");
								$('#qsold').val(".$qsold.");
								if($('#quat').val()!=''){
								var quat = $('#quat').val();
								var tot=".$itemp." * quat;
								sot=(tot).formatMoney(2, '.', ',');
								$('#tprice').val(sot);
								vat=".$vat." * quat;
								tot=parseInt(tot,10) + parseInt(vat,10);
								tot=(tot).formatMoney(2, '.', ',');
								$('#total').val(tot);
								vat=(vat).formatMoney(2, '.', ',');
								$('#tvat').val(vat);
								}
								$('#quat').focus();
									</script>";
								
								echo $item;
								break;
							
							
							case 48:
							$old_patient_id=htmlsan($_GET['old_patient_id']);
							$regn=htmlsan($_GET['reg']);
							$rcpt=htmlsan($_GET['rcpt']);
							$type=htmlsan($_GET['type']);
							$inp=htmlsan($_GET['inp']);
							$send_to_dept_id=htmlsan($_GET['send_to_dept_id']);
							$oname=htmlsan($_GET['oname']);
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							$cur=date('Y-m');
							$temp='';
							$bp1='';
							$bp2='';
							$weight='';
							$pulserate='';
							$resprate='';
							$rbs='';			
							$newscreening='No';		
							$knownhyper='No';		
							$takingmeds='No';		
							$type_clinic_id=htmlsan($_GET['type_clinic_id']);	
							$fullnames=htmlsan($_GET['oname']);				
							$ttime=date('H:i');	
							$insurancescheme=htmlsan($_GET['insname']);
							$acctype=htmlsan($_GET['acctype']);
							$insid=htmlsan($_GET['insid']);
							$insname=htmlsan($_GET['insname']);
							$as_cc_payin=htmlsan($_GET['as_cc_payin']);
							//$txtacctype=htmlsan($_GET['txtacctype']);
							#if ($insid != 14 || $insname != 'CASH') { $as_cc_payin='Companies'; $mode='Companies';  } else { $as_cc_payin='Cash'; $mode='Cash'; }
									
							
				$resultc =mysqli_query($db, "SELECT * FROM encounters WHERE Month='".$cur."'");
				$rowc=mysqli_fetch_array($resultc);
				$a=stripslashes($rowc[$type]);
				$a++;				
				
				$resultd =mysqli_query($db, "SELECT * FROM newprescription WHERE PatId='".$regn."' and TransDate='".date('Y/m/d')."'");
				$num_resultsd = mysqli_num_rows($resultd);
				if($num_resultsd>0){
										echo"
										<script>
										$().customAlert();
										alert('Failure!', '<p>A similar record for this patient has already been created today.</p>');
										e.preventDefault();
										</script>";
										exit;
				}

        $typeclinics = getClinicById($db, $type_clinic_id);      
        $patcategory = getClientCategory($db, $old_patient_id);
    	$sendto = getSendToName($db, $send_to_dept_id);         
        $in_presc_id = getGeneratePrescId($db);
        $pres='O-'.$in_presc_id;

        if ($patcategory == null || $patcategory == '' || $patcategory == 0) { $patcategory='NORMAL'; }
        if ($insid == 14 || $insname == 'CASH') { $mode='Cash'; $as_cc_payin='Cash'; } else { $mode='Companies'; $as_cc_payin='Companies'; }

				$resulta = mysqli_query($db, "insert into newprescription values('0','".$pres."','".$date."','".$type."','".$regn."','','','".$oname."','".$temp."','".$bp1."','".$bp2."','".$weight."','".$pulserate."','".$resprate."','".$rbs."','','".$typeclinics."','','','','','','','','','','','','','','','','','','','','','','','','','','".$mode."','1','".$stamp."','".date('H:i')."','','','','','','".$sendto."','','','".$inp."','".$patcategory."','','','".$newscreening."','".$knownhyper."','".$takingmeds."','".$acctype."',
			  '".$old_patient_id."','".$send_to_dept_id."','".$type_clinic_id."','".$username."','".$insid."','".$insname."','".date('Y')."','".date('m_Y')."')");	

                $last_id = mysqli_insert_id($db); 
  				if ($patcategory == null || $patcategory == '' || $patcategory == 'NONE' || $patcategory == 0) { $patcategory=getClientCategoryPerVisit($db, $last_id); }
				$resultc= mysqli_query($db, "update newprescription set regCategory='".$patcategory."' where Id='".$last_id."'");

				if($as_cc_payin=='Cash'){
        			$resulte= mysqli_query($db, "update patients set type='".$type."',accountype='".$acctype."',typeclinics='".$typeclinics."',registryCategory='".$patcategory."',updatedBy='".strtoupper($fullname)."',stamp='".date('Ymd')."' where auto='".$old_patient_id."'");
				}
				else{
        			$resulte= mysqli_query($db, "update patients set type='".$type."',accountype='".$acctype."',typeclinics='".$typeclinics."',insid='".$insid."',insurer='".$insname."',registryCategory='".$patcategory."',updatedBy='".strtoupper($fullname)."',stamp='".date('Ymd')."' where auto='".$old_patient_id."'");
				}


				$resultb= mysqli_query($db, "update encounters set ".$type."='".$a."' where Month='".$cur."'");
				$resultc= mysqli_query($db, "update sales set Status=2 where RcptNo='".$rcpt."'");


				if($resulta){
				//send popups
				if($sendto=='GENERAL CONSULTATIONS'){
				$dep='CUSTOMERCARE';	//CUSTOMERCARE
				}else{$dep=$sendto;}
				$resultc =mysqli_query($db, "SELECT * FROM compips WHERE dept='".$dep."'");
				$num_resultsc = mysqli_num_rows($resultc);	
				for ($i=0; $i <$num_resultsc; $i++) {
				$rowc=mysqli_fetch_array($resultc);
				$ip=stripslashes($rowc['ip']);		
				
					$resultd =mysqli_query($db, "SELECT * FROM logintable WHERE computerip='".$ip."'");
					$num_resultsd = mysqli_num_rows($resultd);	
					for ($d=0; $d <$num_resultsd; $d++) {
					$rowd=mysqli_fetch_array($resultd);
					$user=stripslashes($rowd['username']);
					$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient from Reception-".$fullnames."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
					}
							
				}
					
				$result = mysqli_query($db, "CALL GetUserLogs('".$username." starts a new Review consultation-NAME:".$fullnames."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");	
		
					echo'<img alt="Up" src="images/up.jpg" style="width:40px; height:40px;">
										<script>
										setTimeout(function() {
											reception();},500);	
										</script>';
										exit;
										
									}
									else{
										echo'<img alt="Down" src="images/down.jpg" style="width:40px; height:40px;">
										
										';
									}
						
							break;

							case '48.1':
							$pid=htmlsan($_GET['pid']);
							$sendto=htmlsan($_GET['sendto']);	
							$in_presc_id=makesafe($_GET['in_presc_id']);
							$in_patient_id=makesafe($_GET['in_customer_id']);
							$typeclinics=htmlsan($_GET['typeclinics']);
             				$type_clinic_id=htmlsan($_GET['in_clinic_id']);
							$newscreening=htmlsan($_GET['newscreening']);		
							$knownhyper=htmlsan($_GET['knownhyper']);		
							$takingmeds=htmlsan($_GET['takingmeds']);
							$odetails=mksafespec_on(mysqli_real_escape_string($db, trim($_GET['odetail'])));
							$allergies=mksafespec_on(mysqli_real_escape_string($db, trim($_GET['allergies'])));
							
							if (!empty($typeclinics) && ($typeclinics != null)) {
							
								if($type_clinic_id!=$typeclinics){ 
									$type_clinic_id=htmlsan($_GET['typeclinics']); }
								else { 
									$type_clinic_id=htmlsan($_GET['in_clinic_id']); }

							} 
							else { echo"<script>$().customAlert(); alert('Error!', '<p>Clinic is required!</p>'); e.preventDefault();</script>"; exit; }
							
				


							#echo $pid;
            				$patcategory = getClientCategoryPerVisit($db, $in_presc_id);
              				if ($patcategory == null || $patcategory == '') { $patcategory=getClientCategory($db, $in_patient_id); }

							if (($patcategory == null ) || ($patcategory == '')) {  $patcategory = 'NORMAL';  } 

							$resulta= mysqli_query($db, "update newprescription set Temp='".htmlsan($_GET['temp'])."',Bp1='".htmlsan($_GET['bp1'])."',Bp2='".htmlsan($_GET['bp2'])."',Weight='".htmlsan($_GET['weight'])."',RespRate='".htmlsan($_GET['resprate'])."',PulseRate='".htmlsan($_GET['pulserate'])."',Rbs='".htmlsan($_GET['rbs'])."',Dept='".htmlsan($_GET['sendto'])."',Allergies='".$allergies."',OtherDetails='".$odetails."',newscreening='".htmlsan($_GET['newscreening'])."',knownhyper='".htmlsan($_GET['knownhyper'])."',takingmeds='".htmlsan($_GET['takingmeds'])."',regCategory='".$patcategory."',type_clinic_id='".$type_clinic_id."',username='".$username."',Status=2,TriageTime='".date('H:i')."' where Id='".$in_presc_id."' ");

							if($resulta){
								
								//send popups
							$resultc =mysqli_query($db, "SELECT * FROM compips WHERE dept='GENERAL CONSULTATIONS'");
							$num_resultsc = mysqli_num_rows($resultc);	
							for ($i=0; $i <$num_resultsc; $i++) {
							$rowc=mysqli_fetch_array($resultc);
							$ip=stripslashes($rowc['ip']);		
							
								$resultd =mysqli_query($db, "SELECT * FROM logintable WHERE computerip='".$ip."'");
								$num_resultsd = mysqli_num_rows($resultd);	
								for ($d=0; $d <$num_resultsd; $d++) {
								$rowd=mysqli_fetch_array($resultd);
								$user=stripslashes($rowd['username']);
								$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient from Triage','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
								}
										
							}
				$result = mysqli_query($db, "CALL GetUserLogs('".$username." updates consultations[triage information].Presc No:".$pid."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");					
						
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">
										<script>
											setTimeout(function() {
											triage();},500);
										</script>';
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;
							case 49:
							$pid=$_GET['pid'];
							$phist=$_GET['phist'];
							$rectest=$_GET['rectest'];
							$surg=$_GET['surg'];
							$complaint=$_GET['complaint'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							$rec=$_GET['rec'];
							if($rec==1){
							$status=2;
							}
							else if($_GET['fin']==1){
							$status=0;
							}
								else $status=3;
							
				$resulta = mysqli_query($db, "update newprescription set History='".mysqli_real_escape_string($db, trim($phist))."',Tests='".mysqli_real_escape_string($db, trim($rectest))."',Complaint='".mysqli_real_escape_string($db, trim($complaint))."',Surgery='".mysqli_real_escape_string($db, trim($surg))."','".$username."',Status=".$status." where PrescId='".$pid."'");
				
				if($resulta){
				$resulta = mysqli_query($db, "insert into log values('0','".$username." updates prescriptions database (doctor examination stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									
										
									echo'<img alt="Up" src="images/up.jpg" style="margin-top:-50px; margin-right:20px;width:40px; height:40px ">
										<script>
											setTimeout(function() {
											docexam();},500);
										</script>';
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="margin-top:-50px;margin-right:20px;width:40px; height:40px"></p>
										
										';
									}
						
							break;

							case 49.1:
							$pid=$_POST['pid'];
							$lid=$_POST['lid'];
							$sample=$_POST['sample'];
							$condition=$_POST['condition'];
							$rejacc=$_POST['rejacc'];
							$odetail=$_POST['odetail'];
							$source=$_POST['source'];
						

							//get lab no
									$unique=0;

							if($rejacc==1){
							$stat=3;

							$result =mysqli_query($db, "select * from labunique where prescid='".$pid."' order by id desc limit 0,1");
							
							if(mysqli_num_rows($result)>0){
							$row=mysqli_fetch_array($result);
							$unique=stripslashes($row['unique_no']);
							}
							else {
								$result =mysqli_query($db, "select * from labunique  order by id desc limit 0,1");
								$row=mysqli_fetch_array($result);
								$unique=stripslashes($row['unique_no'])+1;
								$resultd = mysqli_query($db, "insert into labunique values('0','".$unique."','".$pid."')");
			
							}

								

							$resulta = mysqli_query($db, "update labrequests set sample='".$sample."',sample_condition='".$condition."',accept_reject='".$rejacc."',status='".$stat."',source='".$source."',other_details='".$odetail."',unique_no='".$unique."',rectime='".date('H:i')."' where Id='".$lid."'");


							}

							else{
								$stat=4;

								$resulta = mysqli_query($db, "update labrequests set sample='".$sample."',sample_condition='".$condition."',accept_reject='".$rejacc."',status='".$stat."',source='".$source."',other_details='".$odetail."',rectime='".date('H:i')."' where Id='".$lid."'");
							}
							
			
			if($resulta){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." receives lab sample (lab reception stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<img alt="Up" src="images/up.jpg" style="width:40px; height:40px/">
										<script>
											setTimeout(function() {
											labrecep();},500);
										</script>';
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="width:40px; height:40px"></p>
										
										';
									}
						
							break;

							case 49.2:
								$db='MYDB';
								$sample=$_POST['sample'];
								$conn=odbc_connect($db,'','') or die("error in connection");
								$sql="select * from TEST_RESULT where SAMPLE_ID='".$sample."'";
								$rs=odbc_exec($conn,$sql);
								if(!$rs)
								{exit("Error in SQL");}
								echo "<div class=\"cleaner_h5\"></div><table><tr>";
								echo "<th >NAME</th>";
								echo "<th >RESULT</th></tr>";

								while (odbc_fetch_row($rs))
								{
									$name=odbc_result($rs, "ITEM_NAME");
									$res=odbc_result($rs, "RESULT");
									echo "<tr><td>$name</td>";
									echo "<td>$res</td><tr>";
								}
								odbc_close($conn);
								echo "</table><div class=\"cleaner_h5\"></div>
								<script>$('#labresults').val(".$sample.");</script>";


							break;

							case 49.3:
								
								$db='FHG';
								$sample=$_POST['sample'];

								$conn=odbc_connect($db,'','') or die("error in connection");
								$sql="select * from SampleValue where SerialNO='".$sample."'";
								$rs=odbc_exec($conn,$sql);


								$sql2="select * from GroupLimit where GroupType=1";
								$rs2=odbc_exec($conn,$sql2);


								if(!$rs)
								{exit("Error in SQL");}
								echo "<div class=\"cleaner_h5\"></div>";
								echo '<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold; padding:0; " >
									<tbody>
									<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
									   		<td  style="width:40%;">Item Name</td>
									        <td  style="width:12%;">Value</td>
									        <td  style="width:12%;">Unit</td>
									       <td  style="width:23%;">Range</td>
									        <td  style="width:12%;">Info</td>
									    </tr>';
									    $wbc=odbc_result($rs, "WBC")/10;
									    $lym=odbc_result($rs, "LY_Radio")/10;
									    $mid=odbc_result($rs, "MO_Radio")/10;
									    $gran=odbc_result($rs, "GR_Radio")/10;
									    $lymh=odbc_result($rs, "LY")/10;
									    $midh=odbc_result($rs, "MO")/10;
									    $granh=odbc_result($rs, "GR")/10;
									
										echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">WBC</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$wbc.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">10^3/uL</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "WBC_L").'-'.odbc_result($rs2, "WBC_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';

									    echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#F0F0F0 ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">LYM%</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$lym.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">%</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "LY_Radio_L").'-'.odbc_result($rs2, "LY_Radio_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';


										echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">MID%</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$mid.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">%</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "MO_Radio_L").'-'.odbc_result($rs2, "MO_Radio_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';

									    echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#F0F0F0 ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">GRAN%</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$gran.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">%</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "GR_Radio_L").'-'.odbc_result($rs2, "GR_Radio_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';

									     echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal; ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">LYM#</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$lymh.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">10^3/uL</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "LY_L").'-'.odbc_result($rs2, "LY_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';

									     echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#F0F0F0 ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">MID#</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$midh.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">10^3/uL</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "MO_L").'-'.odbc_result($rs2, "MO_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';

									      echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal; ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">GRAN#</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$granh.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">10^3/uL</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "GR_L").'-'.odbc_result($rs2, "GR_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';

									      echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal; ">
									    <td style="border-width:0.5px; border-color:#666; border-style:solid;" colspan=5></td>
									    </tr>';

									      echo' <tr style="width:100%; height:20px;padding:0; font-weight:normal;background:#F0F0F0 ">
									    <td style="width:40%;border-width:0.5px; border-color:#666; border-style:solid;">GRAN#</td>
									   <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.$granh.'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">10^3/uL</td>
									   	<td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;">'.odbc_result($rs2, "GR_L").'-'.odbc_result($rs2, "GR_H").'</td>
									     <td style="width:12%;border-width:0.5px; border-color:#666; border-style:solid;"></td>
									    </tr>';




									 
								odbc_close($conn);
								echo "</tbody></table><div class=\"cleaner_h5\"></div>";


							break;
							
							

							case 50:
							$pid=$_POST['pid'];
							$lid=$_POST['lid'];
							$lab=$_POST['lab'];
							#$lab=$_POST['lab'];
							$restype=$_POST['restype'];
							
			#$resultc= mysqli_query($db, "update Sales set Status=2 where RcptNo='".$_POST['fee']."'");
			$resulta = mysqli_query($db, "update labrequests set results='".mysqli_real_escape_string($db, trim($lab))."',restype='".$restype."',doneby='".mysqli_real_escape_string($db, trim($fullname))."',status=2,servtime='".date('H:i')."' where id='".$lid."'");
			$resultx = mysqli_query($db, "update newprescription set LabTime='".date('H:i')."' where PrescId='".$pid."'");
			

					if($resulta){
								
								//send popups//LABORATORY_MAIN
							//$resultc =mysqli_query($db, "SELECT * FROM compips WHERE dept='GENERAL CONSULTATIONS'");
							$resultc =mysqli_query($db, "SELECT * FROM compips WHERE dept='LABORATORY_MAIN'");
							$num_resultsc = mysqli_num_rows($resultc);	
							for ($i=0; $i <$num_resultsc; $i++) {
							$rowc=mysqli_fetch_array($resultc);
							$ip=stripslashes($rowc['ip']);		
							
								$resultd =mysqli_query($db, "SELECT * FROM logintable WHERE computerip='".$ip."'");
								$num_resultsd = mysqli_num_rows($resultd);	
								for ($d=0; $d <$num_resultsd; $d++) {
								$rowd=mysqli_fetch_array($resultd);
								$user=stripslashes($rowd['username']);
								$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','lab analysis for ".mysqli_real_escape_string($db, trim($oname))." completed','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
								}
										
							}
								
							//$resulta = mysqli_query($db, "insert into log values('0','".$username." updates Lab Analysis[Lab Results].Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates lab request database (lab analysis stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo'<img alt="Up" src="images/up.jpg" style="width:40px; height:40px/">
										<script>
											setTimeout(function() {
											labanal();},500);
										</script>';
										exit;
									}
									else{
										//echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
										echo'<p><img alt="Down" src="images/down.jpg" style="width:40px; height:40px"></p>';
									}
						
							break;

							case '50.1':
							$pid=$_POST['pid'];
							$lid=$_POST['lid'];
							$rad=$_POST['rad'];
						
			//$resultc= mysqli_query($db, "update Sales set Status=2 where RcptNo='".$_POST['fee']."'");
			$resulta = mysqli_query($db, "update radrequests set results='".mysqli_real_escape_string($db, trim($rad))."',doneby='".mysqli_real_escape_string($db, trim($fullname))."',status=2,servtime='".date('H:i')."' where id='".$lid."'");
			$resultx = mysqli_query($db, "update newprescription set RadTime='".date('H:i')."' where PrescId='".$pid."'");
				if($resulta){
$resulta = mysqli_query($db, "insert into log values('0','".$username." updates radiology request database (radiology analysis stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<img alt="Up" src="images/up.jpg" style="width:40px; height:40px/">
										<script>
											setTimeout(function() {
											radiology();},500);
										</script>';
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="width:40px; height:40px"></p>
										
										';
									}
						
							break;
							
							
								case '50.2':
							$pid=$_GET['pid'];
							$rad=$_GET['rad'];
			$resultc= mysqli_query($db, "update Sales set Status=2 where RcptNo='".$_GET['fee']."'");
			$resulta = mysqli_query($db, "update newprescription set NursesNotes='".mysqli_real_escape_string($db, trim($_GET['rad']))."',RecNurse=2 where PrescId='".$pid."'");
			if($pid==0){
			$resultb = mysqli_query($db, "insert into externals values('0','".date('d/m/Y')."','".$_GET['oname']."','Nurse Notes:".mysqli_real_escape_string($db, trim($_GET['rad']))."','INPATIENT','".$_GET['fee']."','".date('Ymd')."','".$username."',1)");	
			}
				if($resulta){
$resulta = mysqli_query($db, "insert into log values('0','".$username." updates prescriptions database (Nursing analysis stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<p><img alt="Up" src="images/up.jpg" style="width:40px; height:40px"></p>
										<script>
											setTimeout(function() {
											nursing();},500);
										</script>';
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="width:40px; height:40px"></p>
										
										';
									}
						
							break;
							case '50.3':
							$pid=$_GET['pid'];
							$theatre=$_GET['theatre'];
			$resulta = mysqli_query($db, "update theatrequests set notes='".mysqli_real_escape_string($db, trim($theatre))."',doneby='".mysqli_real_escape_string($db, trim($fullname))."',status=2,servtime='".date('H:i')."' where prescid='".$pid."'");
			
				if($resulta){
$resulta = mysqli_query($db, "insert into log values('0','".$username." updates theatre requests database (Surgery analysis stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<img alt="Up" src="images/up.jpg" style="width:40px; height:40px">
										<script>
											setTimeout(function() {
											theatre();},500);
										</script>';
										exit;
									}
									else{
										echo'<img alt="Down" src="images/down.jpg" style="width:40px; height:40px">
										
										';
									}
						
							break;
								
							case 51:
							$pid=$_GET['pid'];
							$diag=$_GET['diag'];
							$med=$_GET['med'];
							$date=date('d/m/Y');
							if($_GET['fin']==1){
							$status=0;
							}else $status=5;
				$resulta = mysqli_query($db, "update newprescription set Diagnosis='".mysqli_real_escape_string($db, trim($diag))."',DrugsGiven='".mysqli_real_escape_string($db, trim($med))."',Status=".$status." where PrescId='".$pid."'");
				if($resulta){
									
$resulta = mysqli_query($db, "insert into log values('0','".$username." updates prescriptions database (process precription stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
														
									echo'<img alt="Up" src="images/up.jpg" style="width:40px; height:40px"/>
										<script>
											setTimeout(function() {
											procpres();},500);
										</script>';
										exit;
									}
									else{
										echo'<img alt="Down" src="images/down.jpg" style="width:40px; height:40px"/>
										
										';
									}
						
							break;
							
						case 52:
							$pid=$_GET['pid'];
							$instatus=$_GET['instatus'];
							if($instatus==1){
			$resultd = mysqli_query($db, "insert into insentries values('0','".date('d/m/Y')."','".$_GET['patid']."','".$_GET['patname']."','".$_GET['cfee']."','".$_GET['lfee']."','".$_GET['dfee']."','".$_GET['ofee']."','".$_GET['wfee']."','".$_GET['tfee']."','".$_GET['insid']."','".$_GET['insname']."','".$_GET['cardno']."','".$_GET['ifee']."','".date('Ymd')."',1)");
							}
							
				$resulta = mysqli_query($db, "update newprescription set OtherFee='".$_GET['ofee']."',WardFee='".$_GET['wfee']."',TotFees='".$_GET['tfee']."',AmountPaid='".$_GET['afee']."',ChangeR='".$_GET['bal']."',Insurance='".$_GET['ifee']."',Status=0 where PrescId='".$pid."'");
				
				if($resulta){
$resulta = mysqli_query($db, "insert into log values('0','".$username." updates prescriptions database (pharmacy stage).Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
													
										
									echo'<p><img alt="Up" src="images/up.jpg" style="margin-top:-20px; maargin-right:60px"></p>
										<script>
											setTimeout(function() {
											payments();},500);
										</script>';
										echo"
										<script>
										window.open('report.php?id=21&rcptno=".$pid."');
										</script>";
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="margin-top:-20px"></p>
										
										';
									}
						
							break;
							
							
		
						
							
							case 55:
				$pid=$_GET['pid'];
				$resulta = mysqli_query($db, "update sales set Dispensed=1,Status=2 where RcptNo='".$pid."'");
				if($resulta){
$resulta = mysqli_query($db, "insert into log values('0','".$username." dispenses drugs.Presc Id:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
										
										
									echo'<p><img alt="Up" src="images/up.jpg" style="margin-top:-20px"></p>
										<script>
											setTimeout(function() {
											pharmacy();},500);
										</script>';
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="margin-top:-20px"></p>';
									}
						
							break;
							
							case 56:
							$eid=$_GET['a'];
							$result= mysqli_query($db, "update mytasks set Status=0 where Event_id=".$eid."");
							break;
							case '56.1':
							$eid=$_GET['a'];
							$result= mysqli_query($db, "update messages set status=1 where id=".$eid."");
							break;
							
							case '56.2':
							$b=substr($_GET['to'],0,1);
							
							$len=strlen($_GET['to']);
							$len-=1;
							$c=substr($_GET['to'],1,$len);
							
							if($b==1){
							$result = mysqli_query($db, "insert into messages values('0','".$c."','".$_GET['a']."','".$_GET['mess']."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");}
							if($b==2){
							$resulta =mysqli_query($db, "select * from users where dept='".$c."'");
							$num_resultsa = mysqli_num_rows($resulta);	
								for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysqli_fetch_array($resulta);  
							$result = mysqli_query($db, "insert into messages values('0','".stripslashes($rowa['name'])."','".$_GET['a']."','".$_GET['mess']."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");	
								}
							}
							if($b==3){
							$resulta =mysqli_query($db, "select * from users");
							$num_resultsa = mysqli_num_rows($resulta);	
								for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysqli_fetch_array($resulta);  
							$result = mysqli_query($db, "insert into messages values('0','".stripslashes($rowa['name'])."','".$_GET['a']."','".$_GET['mess']."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");	
								}
							}
							if($result){
								echo"<script>
										$('#newmessage').dialog( 'close' );
										refreshmytasks();
										</script>"	;
							}else{echo"
										<script>
										$().customAlert();
										alert('Failure!', '<p>Message not sent.</p>');
										e.preventDefault();
										</script>";}
							break;
							case '56.3':
							$a=$_GET['a'];
							$result= mysqli_query($db, "update messages set status=1 where name='".$a."'");
							break;
							
							case 57:
							$task=$_GET['task'];
							$uid=$_GET['uid'];
							$date=date('d/m/Y');
							$time=date('H:i');
							$result = mysqli_query($db, "insert into mytasks values('0','".$task."','','','','','','".$date."','".$time."','','','','','',1,'".$uid."','','')");
							if($result){
						echo"<script>$('#taskfield').val('');
						refreshmytasks();</script>";
									}
							break;
							
							case 58:
							
							$subj=$_GET['subj'];
							$cate=$_GET['cate'];
							$crex=$_GET['crex'];
							$eid=$_GET['eid'];
							$loc=$_GET['loc'];
							$due=$_GET['due'];
							$duet=$_GET['duet'];
							$star=$_GET['star'];
							$start=$_GET['start'];
							$remind=$_GET['remind'];
							$rem=$_GET['rem'];
							$remt=$_GET['remt'];
							$status=$_GET['status'];
							$pri=$_GET['pri'];
							$comp=$_GET['comp'];
							$notes=$_GET['notes'];
							$a=preg_replace('~/~', '', $rem);
							$b=substr($remt,0,2);
							$c=substr($remt,3,2);
							$d=substr($remt,5,2);
							if($d=='PM'){
								$b=sprintf("%02d",$b+12);
							}
							$stamp=$a.$b.$c;
							
							if($crex==1){
							$result = mysqli_query($db, "insert into mytasks values('0','".$subj."','".$cate."','".$loc."','".$status."','".$pri."','".$comp."','".$star."','".$start."','".$due."','".$duet."','".$remind."','".$rem."','".$remt."',1,'".$userid."','".$notes."','".$stamp."')");
							}
							if($crex==2){
							$result = mysqli_query($db, "update mytasks set Reason='".$subj."',Category='".$cate."',Location='".$loc."',TaskStatus='".$status."',Priority='".$pri."',Complete='".$comp."',StartDate='".$star."',StartTime='".$start."',DueDate='".$due."',DueTime='".$duet."',ReminderStatus='".$remind."',ReminderDate='".$rem."',ReminderTime='".$remt."',User_id='".$userid."',Notes='".$notes."',Stamp='".$stamp."' where Event_id='".$eid."'");	
							}
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>
									<script>refreshmytasks()</script>';
									echo"<script>$('#crex').val(1);$('#subject').val('');$('#location').val('');$('#category').val('');$('#complete').val('');
									$('#priority').val('');$('#status').val('');</script>";
									exit;
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px; width:20px; height:20px"></p>';
									}
							break;
							
							case 59:
							$sno=$_GET['sno'];
							$eid=$_GET['eid'];
							$stamp=date('YmdHi');
							$a=substr($stamp,10,2);
							$f=$stamp+$sno;
							$b=$a+$sno;
							if($b>59){
								$c=substr($stamp,8,2);
								$c++;
								$z=$b-60;
								$b=sprintf("%02d",$z);
								$f=substr($stamp,0,8).$c.$b;
								if($c>23){
								$d=substr($stamp,6,2);
								$d++;
								$y=24-$c;
								$c=sprintf("%02d",$y);
								$f=substr($stamp,0,6).$d.$c.$b;
								}
							}
							$g=substr($f,0,4);
							$h=substr($f,4,2);
							$i=substr($f,6,2);
							$j=substr($f,8,2);
							$k=substr($f,10,2);
							$l=$g.'/'.$h.'/'.$i;//date
							if($j>12){
								$s='PM';
								$j=$j-12;
								$j=sprintf("%02d",$j);
							}else $s='AM';
							$m=$j.':'.$k.$s;//time
							if($sno!=0){
							$result= mysqli_query($db, "update mytasks set ReminderStatus=1,Stamp='".$f."',ReminderDate='".$l."',ReminderTime='".$m."' where Event_id=".$eid."");
							if($result){
							echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>';
							}
							}
							break;
						
							case 60:
							

	//check for system controls:
	//1.Accountant cash in hand limit:
	$result =mysqli_query($db, "select * from ledgers where ledgerid='626'");
	$row=mysqli_fetch_array($result);
	$bal=stripslashes($row['bal']);
	if($bal>50000){
	$resultc =mysqli_query($db, "select * from messages where message='Accountant Cash in Hand Limit exceeded-".date('d/m/Y')."' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
		$resulta =mysqli_query($db, "select * from users where position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','Accountant Cash in Hand Limit exceeded-".date('d/m/Y')."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}
		}
	}
	
	//2.Discount authorized above certain limit.
	$result =mysqli_query($db, "select * from sales where Discount>10000 and Stamp='".date('Ymd')."' and Status=1");
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);  
	$resultc =mysqli_query($db, "select * from messages where message='Discount of ".stripslashes($row['Discount'])." posted by ".stripslashes($row['Posted'])."' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
		$resulta =mysqli_query($db, "select * from users where position='Admin' or position='Accountant' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','Discount of ".stripslashes($row['Discount'])." posted by ".stripslashes($row['Posted'])."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}				
	}
	}
	//3. Patient Overstays in dept
	$resultb =mysqli_query($db, "select * from queue where id=1");
	$rowb=mysqli_fetch_array($resultb);
	$j=$k=$l=$m=$n=$o=0;
		$a=$b=$c=$d=$e=$o=0;
	$result =mysqli_query($db, "select * from newprescription where Stamp='".date('Ymd')."' order by PrescId desc");
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {$row=mysqli_fetch_array($result);
$a=preg_replace('~:~', '', stripslashes($row['TriageTime'])) - preg_replace('~:~', '', stripslashes($row['StartTime']));
$b=preg_replace('~:~', '', stripslashes($row['ConsTime'])) - preg_replace('~:~', '', stripslashes($row['TriageTime']));
$c=preg_replace('~:~', '', stripslashes($row['LabTime'])) - preg_replace('~:~', '', stripslashes($row['ConsTime']));
$d=preg_replace('~:~', '', stripslashes($row['RadTime'])) - preg_replace('~:~', '', stripslashes($row['ConsTime']));
$e=preg_replace('~:~', '', stripslashes($row['PharmTime'])) - preg_replace('~:~', '', stripslashes($row['ConsTime']));
							}
		if(stripslashes($rowb['triage'])<$a){$j++;}
		if(stripslashes($rowb['cons'])<$b){$l++;}
		if(stripslashes($rowb['lab'])<$c){$m++;}
		if(stripslashes($rowb['rad'])<$d){$n++;}
		if(stripslashes($rowb['pharm'])<$e){$e++;}
	if($j>5){
		$resultc =mysqli_query($db, "select * from messages where message='There seems to be a queue lag in the Triage department. Check with the nurses there to fix the issue.(".date('d/m/Y').")' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','There seems to be a queue lag in the Triage department. Check with the nurses there to fix the issue.(".date('d/m/Y').")','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}
		}
		if($k>5){
		$resultc =mysqli_query($db, "select * from messages where message='There seems to be a queue lag in the Consultation department. Check with the doctors there to fix the issue.(".date('d/m/Y').")' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','There seems to be a queue lag in the Consultation department. Check with the doctors there to fix the issue.(".date('d/m/Y').")','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}
		}
		
		if($l>5){
		$resultc =mysqli_query($db, "select * from messages where message='There seems to be a queue lag in the Laboratory department. Check with the lab technicians there to fix the issue.(".date('d/m/Y').")' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','There seems to be a queue lag in the Laboratory department. Check with the lab technicians there to fix the issue.(".date('d/m/Y').")','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}
		}
		
		if($m>5){
		$resultc =mysqli_query($db, "select * from messages where message='There seems to be a queue lag in the Radiology department. Check with the Radiology technicians there to fix the issue.(".date('d/m/Y').")' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','There seems to be a queue lag in the Radiology department. Check with the Radiology technicians there to fix the issue.(".date('d/m/Y').")','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}
		}
		
			if($n>5){
		$resultc =mysqli_query($db, "select * from messages where message='There seems to be a queue lag in the Pharmacy department. Check with the pharmacists there to fix the issue.(".date('d/m/Y').")' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','There seems to be a queue lag in the Pharmacy department. Check with the pharmacists there to fix the issue.(".date('d/m/Y').")','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}
		}
		
		//4. Inpatients bill passes a certain limit.
	$result =mysqli_query($db, "select * from tempbill");
	$arr=array();
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);  
		$arr[]=stripslashes($row['patid']);		
	}
	$arr = array_unique($arr);
	$pre=array(array());
	foreach ($arr as $key => $val) {
			$a=0;
			$result =mysqli_query($db, "select * from tempbill where patid='".$val."'");
			$num_results = mysqli_num_rows($result);	
			for ($i=0; $i <$num_results; $i++) {
			$row=mysqli_fetch_array($result);  
				$a+=preg_replace('~,~', '', stripslashes($row['subnet']));		
			}
			if($a>20000){
			$pre[]=array($val,stripslashes($row['patname']),$a);
			}
	}
	
	$max=count($pre);
	if($max>0){
			for ($i=1; $i <$max; $i++) {
		$resultc =mysqli_query($db, "select * from messages where message='The Inpatient named ".$pre[$i][1]." (Number ".$pre[$i][0].") has an oustanding bill of ".$pre[$i][2]."' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where position='Admin' or position='Accountant' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($x=0; $x <$num_resultsa; $x++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','The Inpatient named ".$pre[$i][1]." (Number ".$pre[$i][0].") has an oustanding bill of ".$pre[$i][2]."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}	
				
				
			}
	}
	
	//5.Drugs fall below a certain limit
	$result =mysqli_query($db, "select * from items where MinBal>Bal and Type='GOOD'");
			$num_results = mysqli_num_rows($result);	
			for ($i=0; $i <$num_results; $i++) {
			$row=mysqli_fetch_array($result);  
		$resultc =mysqli_query($db, "select * from messages where message='The item ".stripslashes($row['ItemName'])." is below the minimum stock balance. It is advised you stock the item.' order by id desc limit 0,1000");	
	      $num_resultsc = mysqli_num_rows($resultc);	
	       if($num_resultsc==0){	
		$resulta =mysqli_query($db, "select * from users where position='Store' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','The item ".stripslashes($row['ItemName'])." is below the minimum stock balance. It is advised you stock the item.','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}				
	}	
}
	
	//6. check for cashier's balance
	$result =mysqli_query($db, "select * from receipts where stamp<='".date('Ymd')."' and stamp<='".date('Ymd')."' and status!=0");
		$arr=array();
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);  
		$arr[]=stripslashes($row['username']);		
	}
	$arr = array_unique($arr);
	$pre=array();	
	foreach ($arr as $key => $val) {
			$a=0;
			$result =mysqli_query($db, "select * from receipts where username='".$val."' and stamp<='".date('Ymd')."' and stamp>='".date('Ymd')."' and status!=0 and paymode='Cash'");
			$num_results = mysqli_num_rows($result);	
			for ($i=0; $i <$num_results; $i++) {
			$row=mysqli_fetch_array($result);  
				$a+=stripslashes($row['amount']);	
			}
			if($a>20000){
			$pre[$val]=$a;
			}
	}
	
	$max=count($pre);
	if($max>0){
		foreach ($pre as $key => $val) {
		$resultc =mysqli_query($db, "select * from messages where message='Cashier User Id ".$key." has exceeded the Cash in Hand Limit.Date-".date('d/m/Y')."' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where position='Accountant' or position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($x=0; $x <$num_resultsa; $x++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','Cashier User Id ".$key." has exceeded the Cash in Hand Limit.Date-".date('d/m/Y')."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}	
				
				
			}
	}	
		
	//7. check for sent transfer requests
	$result =mysqli_query($db, "select * from issuetable where Dep2='".$userdep."' and status=1 order by TransNo desc");
	$pre=array();
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);  
		$pre[stripslashes($row['IssueNo'])]='You have a new stock request from '.stripslashes($row['Dep1']).'. The Request No: is '.stripslashes($row['IssueNo']).'';		
	}

	$max=count($pre);
	if($max>0){
		foreach ($pre as $key => $val) {
		$resultc =mysqli_query($db, "select * from messages where message='".$val."' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where dept='".$userdep."' order by name");
							$num_resultsa = mysqli_num_rows($resulta);
							for ($x=0; $x <$num_resultsa; $x++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','".$val."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}	
				
				
			}
	}
	//7. check for sent admission requests
	$pre=array();
	$result =mysqli_query($db, "select * from newprescription where Admitted=3 order by PrescId desc");
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);  
		$pre[stripslashes($row['PrescId'])]='You have a new admission request for '.stripslashes($row['PatName']).'. The Patient No: is '.stripslashes($row['PatId']).'';		
	}

	$max=count($pre);
	if($max>0){
		foreach ($pre as $key => $val) {
	$resultc =mysqli_query($db, "select * from messages where message='".$val."' order by id desc limit 0,1000");	
	$num_resultsc = mysqli_num_rows($resultc);	
	
	if($num_resultsc==0){	
	$resulta =mysqli_query($db, "select * from users where dept='RECORDS' order by name");
							$num_resultsa = mysqli_num_rows($resulta);
							for ($x=0; $x <$num_resultsa; $x++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','".$val."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	
							}	
			}	
				
				
			}
	}
	
	
	
	//update ledgers
	
$result = mysqli_query($db, "select * from ledgers where date='".date('d/m/Y')."'");
$num_results = mysqli_num_rows($result);
if($num_results==0){
	$date=date('Y/m/d');
						$stamp=date('Ymd');
						$result = mysqli_query($db, "select * from ledgers WHERE ledgerid!=601 order by name");
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
						$row=mysqli_fetch_array($result);
						$lid=stripslashes($row['ledgerid']);
						$name=stripslashes($row['name']);
						$bal=stripslashes($row['bal']);
						$resultc = mysqli_query($db, "insert into generalledger values('0','".$lid."','".$name."','".$date."','".$bal."','".$stamp."',1)");
						}
			$resultf = mysqli_query($db, "update ledgerentries set status=0 where status!=0");
			$resultg = mysqli_query($db, "update ledgers set date='".date('d/m/Y')."'");
			$resulta = mysqli_query($db, "insert into log values('0','".$username." posts entries to general ledger.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	
	}	
	



				$current_date= date('Y-m-d');
				$date = date_create($current_date);
				date_add($date, date_interval_create_from_date_string('90 days'));
				$the_ninety_days= date_format($date, "Y-m-d");				
				$result =mysqli_query($db, "select * from purchases  where expstamp<='".preg_replace('~-~', '',$the_ninety_days)."' and expstamp>='".preg_replace('~-~', '',$current_date)."' order by expstamp ASC");
				$rw=mysqli_fetch_array($result);
				$purchdate=stripslashes($rw['Stamp']);
			    $expirydate=stripslashes($rw['expstamp']);
				$purchdate_1=dateprintexp($purchdate);
				$expirydate_2=dateprintexp($expirydate);

				$num_rows = mysqli_num_rows($result);

				$date1 = date_create_from_format('Y-m-d', $expirydate_2);
				//Create a date object out of today's date:
				$date2 = date_create_from_format('Y-m-d', date('Y-m-d'));
				//Create a comparison of the two dates and store it in an array:
				$diff = (array) date_diff($date1, $date2);

				//Output the array:
				// echo $diff['days'];
				// echo '<pre>'.$diff['days'].'</pre>';
				// echo "If the number of days to expirly is less than or equals to 90days, show alert";
	
			 	$arr=array();
				$result =mysqli_query($db, "select * from accesstbl");
				$num_results = mysqli_num_rows($result);
				for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					$var=stripslashes($row[$usertype]);
					$code=stripslashes($row['AccessCode']);
					$arr[$code]=$var;
				}
				
				if($usertype=='Pharm'){
						if($diff['days']<=90){
							echo"<script>
								 $().customAlert();
								 alert('SystemAlert!', '<p>You have  ".$num_rows." items expiring in ".$diff['days']." days!</p>');
								 setTimeout(function() {
								 abouttoexpiry2();},500);
								 </script>";
								 #exit;
						}
						// if($num_rows!=0){	
						// 	echo'<script>setTimeout(function() {abouttoexpiry2();},500);</script>';
						// }

						if($num_rows!=0){	
						    $resulta =mysqli_query($db, "select * from users where position='Admin' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resulte = mysqli_query($db, "insert into messages values('0','".$name."','System','You have ".$num_rows." items expiring between today and 90 days','".date('d/m/Y-H:i')."','".date('Ymd')."',2)");

							}				
						}

				}
	
				else if($usertype=='Admin'){ #$usertype
				$current_date= date('Y-m-d');
				$date = date_create($current_date);
				date_sub($date, date_interval_create_from_date_string('1 days'));
				$the_one_days= date_format($date, "Y-m-d");				
				$undispensedQry =mysqli_query($db, "select * from pharmrequests  where stamp<='".preg_replace('~-~', '',$current_date)."' and stamp>='".preg_replace('~-~', '',$the_one_days)."' and status=1"); #
				$undispensed254=mysqli_fetch_array($undispensedQry);
				$undispensed_purchdate=stripslashes($undispensed254['stamp']);
			    $undispensed_expirydate=stripslashes($undispensed254['stamp']);
				$undispensed_purchdate_1=dateprintexp($undispensed_purchdate);
				$undispensed_expirydate_2=dateprintexp($undispensed_expirydate);

				$undispensed_num_rows = mysqli_num_rows($undispensedQry)-1;

				$undispensed_date1 = date_create_from_format('Y-m-d', $undispensed_expirydate_2);
				//Create a date object out of today's date:
				$undispensed_date2 = date_create_from_format('Y-m-d', date('Y-m-d'));
				//Create a comparison of the two dates and store it in an array:
				$diff = (array) date_diff($undispensed_date1, $undispensed_date2);

					if($diff['days']){
						echo"<script>
							 $().customAlert();
							 alert('SystemAlert!', '<p>You have  ".$undispensed_num_rows." undispensed drugs for the last 24hrs.</p>');
							 setTimeout(function() {
							 undispensedrugs();},500);
							 </script>";
							 #exit;

						if($undispensed_num_rows!=0){	
						  	$resulta =mysqli_query($db, "SELECT * FROM users WHERE position IN('Admin', 'Pharm') ORDER BY name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);  
								$name=stripslashes($rowa['name']);
								$resulte = mysqli_query("insert into messages values('0','".$name."','System','You have ".$undispensed_num_rows." undispensed drugs for the last 24hrs.','".date('d/m/Y-H:i')."','".date('Ymd')."',2)");

							}				
						}				


					}
				} else{

				}




		break;
							
							case 61:
							
							$subj=$_GET['subj'];
							$cate=$_GET['cate'];
							$crex=$_GET['crex'];
							$eid=$_GET['eid'];
							$loc=$_GET['loc'];
							$end=$_GET['end'];
							$endt=$_GET['endt'];
							$star=$_GET['star'];
							$start=$_GET['start'];
							$remind=$_GET['remind'];
							$rem=$_GET['rem'];
							$remt=$_GET['remt'];
							$status=$_GET['status'];
							$pri=$_GET['pri'];
							$comp=$_GET['comp'];
							$notes=$_GET['notes'];
							$pid=$_GET['pid'];
							$rece=preg_replace('~/~', '', $_GET['rece']);
							$recs=$_GET['recs'];
							$rpat=$_GET['rpat'];
							$reccur=$_GET['reccur'];
							$pat=$_GET['pat'];
							
							$a=preg_replace('~/~', '', $rem);
							$b=substr($remt,0,2);
							$c=substr($remt,3,2);
							$d=substr($remt,5,2);
							
							if($d=='PM'){
								$b=sprintf("%02d",$b+12);
							}
							$stamp=$a.$b.$c;
							
							
							//update database
							
							if($crex==1){
							$result = mysqli_query($db, "insert into calendar values('0','".$pid."','".$pat."','".$subj."','".$cate."','".$loc."','','".$pri."','".$comp."','".$status."','".$star."','".$start."','".$end."','".$endt."','".$remind."','".$rem."','".$remt."',1,'".$reccur."','".$rpat."','".$recs."','".$rece."','".$userid."','".$notes."','".$stamp."','".date('Ymd')."')");
							}
							if($crex==2){
							$result = mysqli_query($db, "update calendar set Pat_name='".$pat."',Pat_id='".$pid."',Reason='".$subj."',Category='".$cate."',Location='".$loc."',TaskStatus='".$status."',Priority='".$pri."',Complete='".$comp."',StartDate='".$star."',StartTime='".$start."',EndDate='".$end."',EndTime='".$endt."',ReminderStatus='".$remind."',ReminderDate='".$rem."',ReminderTime='".$remt."',User_id='".$userid."',Notes='".$notes."',Stamp='".$stamp."',ReccurenceStatus='".$reccur."',ReccurPattern='".$rpat."',ReccurStart='".$recs."',ReccurEnd='".$rece."' where Event_id='".$eid."'");	
							
							}
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>';
									echo"<script>refreshtoday();refreshtoday2('".$pid."');</script>";
									echo"<script>$('#crex2').val(1);$('#subject2').val('');$('#location2').val('');$('#category'2).val('');$('#complete2').val('');
									$('#priority2').val('');$('#status2').val('');$('#patname2').val('');</script>";
									exit;
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px; width:20px; height:20px"></p>';
									}
							break;
							
							case 62:
							$sno=$_GET['sno'];
							$eid=$_GET['eid'];
							$stamp=date('YmdHi');
							$a=substr($stamp,10,2);
							$f=$stamp+$sno;
							$b=$a+$sno;
							if($b>59){
								$c=substr($stamp,8,2);
								$c++;
								$z=$b-60;
								$b=sprintf("%02d",$z);
								$f=substr($stamp,0,8).$c.$b;
								if($c>23){
								$d=substr($stamp,6,2);
								$d++;
								$y=24-$c;
								$c=sprintf("%02d",$y);
								$f=substr($stamp,0,6).$d.$c.$b;
								}
							}
							$g=substr($f,0,4);
							$h=substr($f,4,2);
							$i=substr($f,6,2);
							$j=substr($f,8,2);
							$k=substr($f,10,2);
							$l=$g.'/'.$h.'/'.$i;//date
							if($j>12){
								$s='PM';
								$j=$j-12;
								$j=sprintf("%02d",$j);
							}else $s='AM';
							$m=$j.':'.$k.$s;//time
							if($sno!=0){
							$result= mysqli_query($db, "update calendar set ReminderStatus=1,Stamp='".$f."',ReminderDate='".$l."',ReminderTime='".$m."' where Event_id=".$eid."");
							if($result){
							echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>';
							}
							}
							break;
							
							case 63:
							$pid=$_GET['pid'];
							$x=$_GET['x'];
							$result= mysqli_query($db, "update newprescription set Status=".$x." where PrescId='".$pid."'");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." does a roll back.Presc ID:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
							if($x==0){
							$result= mysqli_query($db, "update consfee set Status=1 where Id=".$pid."");
								
							}
							
							break;
							
							
							
							case 65:
							$a=$_GET['a'];
							if($_GET['rtype']!='either'){
							$resulta = mysqli_query($db, "select * from patients where pntno='".$_GET['pntno']."'");
							$row=mysqli_fetch_array($resulta);
							$gender=stripslashes($row['gender']);
							if($_GET['rtype']!=$gender){
								echo"<script>
									$().customAlert();
									alert('Error!', '<p>You are attempting to admit a ".$gender." patient in a ".$_GET['rtype']." ward!</p>');
									e.preventDefault();
									</script>";
									exit;
							}
							}
							
							if($a==1){
							$resulta = mysqli_query($db, "select * from inpatients where PatId='".$_GET['pntno']."' order by PrescId desc limit 0,1");
							$row=mysqli_fetch_array($resulta);
							$pid=stripslashes($row['PrescId']);
							$doc=stripslashes($row['Doctor']);
							$resultb= mysqli_query($db, "update inpatients set Admitted=1,BedNo='".$_GET['bno']."',RoomNo='".$_GET['rno']."',WardType='".$_GET['wtype']."'  WHERE PrescId='".$pid."'");
								$result= mysqli_query($db, "update wardbeds set status=1,patname='".$_GET['pntname']."',patid='".$_GET['pntno']."',doctor='".$doc."' where id='".$_GET['bid']."'");
							}
							if($result){
						$resulta = mysqli_query($db, "insert into log values('0','".$username." updates inpatients database.Bed No:".$_GET['bno']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>
								<script>setTimeout(function() {inpatient();$("#warddialog" ).dialog( "close" );},500);</script>';
							}else{echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>';
							}
							break;


							case 66:
							$bno=$_GET['bno'];
							$rno=$_GET['rno'];
							$patid=$_GET['patid'];
							$resulta= mysqli_query($db, "update wardbeds set status=0,patname='',patid='',doctor='' where bedno='".$_GET['bno']."' and roomno='".$_GET['rno']."'  and patid='".$_GET['patid']."'");
							$resultb= mysqli_query($db, "update newprescription set Admitted=0,Discharge='".date('d/m/Y')."' where BedNo='".$_GET['bno']."' and RoomNo='".$_GET['rno']."' and PatId='".$_GET['patid']."'");
							$resultb= mysqli_query($db, "update tempbill set status=0 where patid='".$patid."'");	
						if($resulta&&$resultb){
						$resulta = mysqli_query($db, "insert into log values('0','".$username." discharges patient.Bed No:".$_GET['bno']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">
							<script>setTimeout(function() {inpatient();},500);</script>';
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
							break;
						
							case 68:
							$rec=$_GET['rec'];
							$resulta= mysqli_query($db, "update inpatients set progress='".$_GET['notes']."' where patid='".$_GET['patid']."'");
							if($resulta){
						$resulta = mysqli_query($db, "insert into log values('0','".$username." makes inpatient progress notes.Patient Id:".$_GET['patid']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<p><img alt="Up" src="images/up.jpg" style="margin-top:0px; margin-right:10px; width:40px; height:40px"></p>';
								if($rec==1){
								echo'<script>
								setTimeout(function() {startcons('.$_GET['patid'].');},500);</script>';
                                }else{echo'<script>setTimeout(function() {inprogress();},500);</script>';}
							}
							else{echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>';}
							break;
							
							case 69:
							$code=$_GET['user'];
							$result = mysqli_query($db, "DELETE from users where name='".$code."'");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes User from System.User Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px; margin-top:20px"></p>';
								echo"<script>setTimeout(function() {adduser();},500);</script>";	
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px;margin-top:20px"></p>';
										}
							break;
							
							
							
							
							case '23.2':
								
							$transid=$_GET['transid'];
							$cr=$_GET['cr'];
							$dr=$_GET['dr'];
							$drname=$_GET['drname'];
							$crname=$_GET['crname'];
							$desc=$_GET['desc'];
							$amount=$_GET['amount'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							
						if($cr==625||$dr==625||$cr==658||$dr==658||$cr==659||$dr==659){
						$bid=$_GET['bankid'];
						$bname=$_GET['bankname'];
						$desc=$desc.'['.$bname.']';
						}else{
							$bid=NULL;
							$bname=NULL;
						}
						//this is a debit	
						$resulta = mysqli_query($db, "select * from ledgers where ledgerid=".$cr."");
						$row=mysqli_fetch_array($resulta);
						$balc=stripslashes($row['bal']);
						$type=stripslashes($row['type']);
						if($type=='Liability'||$type=='Revenue'||$type=='Equity'||$type=='Drawings'){
						$balc=$balc-$amount;
						/*if($balc<0){
								echo"<script>
									$().customAlert();
									alert('Error!', '<p>Liability/Revenue/Equity Subledger balance cannot be less than zero.</p>');
									e.preventDefault();
									</script>";
									exit;
						}*/
						
						}
						else{
						$balc=$balc+$amount;
						}
						//this is a credit
						$resulta = mysqli_query($db, "select * from ledgers where ledgerid=".$dr."");
						$row=mysqli_fetch_array($resulta);
						$bald=stripslashes($row['bal']);
						$type=stripslashes($row['type']);
						if($type=='Asset'||$type=='Expense'){
						$bald=$bald-$amount;
						/*if($bald<0){
								echo"<script>
									$().customAlert();
									alert('Error!', '<p>Asset/Expense Subledger balance cannot be less than zero.</p>');
									e.preventDefault();
									</script>";
									exit;
						}*/
						
						}
						else{
						$bald=$bald+$amount;
						}
						
						
			$resultb = mysqli_query($db, "insert into ledgerentries values('0','".$cr."','".$crname."','".$dr."','".$drname."','".$amount."','".$desc."','".$date."','".$balc."','".$bald."','".$stamp."','".$bid."','".$bname."',0,'".date('d/m/Y')."-".date('H:i')."','".$username."','MJ')");
			$resulte = mysqli_query($db, "update ledgers set bal='".$balc."' where ledgerid='".$cr."'");
			$resultf = mysqli_query($db, "update ledgers set bal='".$bald."' where ledgerid='".$dr."'");
			
			if($resultb&&$resulte&&$resultf){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." makes a journal entry.Id:".$transid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								$transid=$transid+1;
								echo'<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
								echo"<script>
								setTimeout(function() {
											journalent();},500);
									$('#transid').val(".$transid.");$('#amount').val('');$('#desc').val('');$('#crledger').val('');$('#drledger').val('');$('#bankdiv').hide();
										
										</script>";
									
									}
								else{
									echo'<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
									}
								break;
								
								case '24.2':
								
							$code=$_GET['code'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							
							$result = mysqli_query($db, "select * from ledgerentries where transid=".$code."");
							$row=mysqli_fetch_array($result);
							$cr=stripslashes($row['crid']);
							$dr=stripslashes($row['drid']);
							$crname=stripslashes($row['crname']);
							$drname=stripslashes($row['drname']);
							$amount=stripslashes($row['amount']);
							if($cr==625||$dr==625||$cr==658||$dr==658||$cr==659||$dr==659){
								$bid=stripslashes($row['bankid']);
								$bname=stripslashes($row['accname']);
							}else{
								$bid=NULL;
								$bname=NULL;
							}
							//this was a debit	
							$resulta = mysqli_query($db, "select * from ledgers where ledgerid=".$dr."");
							$rowa=mysqli_fetch_array($resulta);
							$bald=stripslashes($rowa['bal']);
							$type=stripslashes($rowa['type']);
							if($type=='Liability'||$type=='Revenue'||$type=='Equity'||$type=='Drawings'){
								$bald=$bald-$amount;
							}
							else{
								$bald=$bald+$amount;
							}
							$desc='reversal for TX id: '.$code;
							//this is a credit
							$resultb = mysqli_query($db, "select * from ledgers where ledgerid=".$cr."");
							$rowb=mysqli_fetch_array($resultb);
							$balc=stripslashes($rowb['bal']);
							$typeb=stripslashes($rowb['type']);
							if($typeb=='Asset'||$typeb=='Expense'){
								$balc=$balc-$amount;												
							}
							else{
								$balc=$balc+$amount;
							}
							
							
							$resulta = mysqli_query($db, "select * from ledgerentries order by transid desc limit 0,1");
							$row=mysqli_fetch_array($resulta);
							$codea=stripslashes($row['transid'])+1;
						
							$resultb = mysqli_query($db, "insert into ledgerentries values('".$codea."','".$dr."','".$drname."','".$cr."','".$crname."','".$amount."','".$desc."','".$date."','".$bald."','".$balc."','".$stamp."','".$bid."','".$bname."',3,'".date('d/m/Y')."-".date('H:i')."','".$username."','MJR')");
							$resultg = mysqli_query($db, "update ledgerentries set status=3 where transid='".$code."'");
							$resulte = mysqli_query($db, "update ledgers set bal='".$bald."' where ledgerid='".$dr."'");
							$resultf = mysqli_query($db, "update ledgers set bal='".$balc."' where ledgerid='".$cr."'");
			
						if($resultb&&$resulte&&$resultf&&$resultg){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." makes a journal entry reversal.Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
									}
								break;
								
								case '25.2':
								
						$date=date('Y/m/d');
						$stamp=date('Ymd');
						$result = mysqli_query($db, "select * from ledgers WHERE ledgerid!=601 order by name");
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
						$row=mysqli_fetch_array($result);
						$lid=stripslashes($row['ledgerid']);
						$name=stripslashes($row['name']);
						$bal=stripslashes($row['bal']);
						$resultc = mysqli_query($db, "insert into generalledger values('0','".$lid."','".$name."','".$date."','".$bal."','".$stamp."',1)");
						}
			$resultf = mysqli_query($db, "update ledgerentries set status=1 where status=0");
			$resultg = mysqli_query($db, "update ledgers set date='".date('d/m/Y')."'");
			$resulta = mysqli_query($db, "insert into log values('0','".$username." posts entries to general ledger.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<img alt="" src="images/tick.png" width="30px" height="30px"/>';
									
								
								break;
								
								case '26.2':
								
			$result = mysqli_query($db, "update banktbl set BankName='".$_GET['bname']."',Postal='".$_GET['postal']."',BranchName='".$_GET['branch']."',TelNo='".$_GET['tel']."'
			,Email='".$_GET['email']."',AccName='".$_GET['acname']."',AccType='".$_GET['actype']."',AccNo='".$_GET['acno']."',OpenDate='".$_GET['datee']."' where Bankid='".$_GET['acid']."'");
			
						if($result){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." edits bank detail.AC ID:".$_GET['acid']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<img alt="" src="images/tick.png" width="30px" height="30px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="30px" height="30px"/>';
									}		
								break;
							
							case '27.2':
							$actype=$_GET['actype'];
							$bankname=$_GET['bankname'];
							$branchname=$_GET['branchname'];
							$acname=$_GET['acname'];
							
							$acno=$_GET['acno'];
							$postadd=$_GET['postadd'];
							$emailadd=$_GET['emailadd'];
							$date=$_GET['date'];
							$tel=$_GET['tel'];
							$result = mysqli_query($db, "insert into banktbl values('0','".$bankname."','".$postadd."','".$branchname."','".$tel."','".$emailadd."','".$acname."','".$actype."','".$acno."','".$date."','')");
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." adds new bank detail.AC NO:".$_GET['acno']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case '28.2':
							$result = mysqli_query($db, "DELETE from banktbl where Bankid=".$_GET['acid']."");
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes bank detail.Id NO:".$_GET['acid']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							break;
							

		case '29.2':
			$resultb = mysqli_query($db, "select * from ledgers order by ledgerid desc");
			$rowb = mysqli_fetch_array($resultb);
			$lid = intval($rowb['ledgerid']) + 1;
			$result = mysqli_query($db, "insert into ledgers values('" . $lid . "','" . $_GET['ledger'] . "','" . $_GET['type'] . "',0,1,'','" . $_GET['cat'] . "')");
			$resulta = mysqli_query($db, "insert into log values('0','" . $username . " inserts data into ledgers database.Ledger name:" . $_GET['ledger'] . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

			if ($result) {
				echo '<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px"></p>';
				echo "<script>paginate(8,0);</script>";
			} else {
				echo '<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px"></p>';
			}

			break;

		case '30.2':
			if (isset($_GET['code'])) {
				$code = intval($_GET['code']);
				$result = mysqli_query($db, "SELECT `name`,bal,isMainLedger,created_by FROM  ledgers WHERE `ledgerid`='" . $code . "'  ");
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					$name = trim(stripslashes($row['name']));
					$bal = floatval(trim(str_replace(',', '', $row['bal'])));
					$isMainLedger = intval($row['isMainLedger']);
					$category = trim(stripslashes($row['category']));
					$created_by = trim(stripslashes($row['created_by']));
					$nonZeroSubledgers = 0;
					if ($isMainLedger > 0) {
						$resultSubledgerBal = mysqli_query($db, "SELECT COUNT(id) AS nonZeroSubledgers FROM ledgers WHERE bal !=0 AND bal !='' AND mainLedgerId='" . $code . "' ");
						if (mysqli_num_rows($resultSubledgerBal) > 0) {
							$rowSubledgerBal = mysqli_fetch_assoc($resultSubledgerBal);
							$nonZeroSubledgers = intval($rowSubledgerBal['nonZeroSubledgers']);
						}
					}

					if (strtolower($created_by) != 'system' && $bal == 0 && $nonZeroSubledgers == 0 && strtolower($category) != 'department' && strtolower($category) != 'supplier' && strtolower($category) != 'insurance') {
						if ($isMainLedger > 0) {
							$resultSubledgers = mysqli_query($db, "SELECT ledgerid,`name`,bal,created_by FROM ledgers WHERE mainLedgerId='" . $code . "' ");
							while ($rowSubledgers = mysqli_fetch_assoc($resultSubledgers)) {
								$subledgerid = intval($rowSubledgers['ledgerid']);
								$subledgername = trim(stripslashes($rowSubledgers['name']));
								$subledgerbal = floatval(trim(str_replace(',', '', $rowSubledgers['bal'])));
								$subledgercreated_by = trim(stripslashes($rowSubledgers['created_by']));
								@mysqli_query($db, "DELETE FROM ledgers WHERE ledgerid=" . $subledgerid . "");
								@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Deletes subledger (" . mysqli_real_escape_string($db, $subledgername) . ") legderid (" . $subledgerid . ") created by (" . $subledgercreated_by . ") balance (" . $subledgerbal . ") main ledger (" . mysqli_real_escape_string($db, $name) . ") ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
							}
						}

						@mysqli_query($db, "DELETE FROM ledgers WHERE ledgerid=" . $code . "");
						@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Deletes ledger (" . mysqli_real_escape_string($db, $name) . ") legderid (" . $code . ") created by (" . $created_by . ") balance (" . $bal . ") ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
						echo "<script>
									$().customAlert();
									alert('Success', '<p>Account deleted successfully.</p>');
									e.preventDefault();
									</script>";
						exit(0);
					}
				}
			}

			echo "<script>
					$().customAlert();
					alert('Error', '<p>Error Processing Request.</p>');
					e.preventDefault();
				</script>";
			exit(1);

			break;

		case '31.2':
			$code = $_GET['code'];
			$type = $_GET['type'];
			$bal = $_GET['bal'];
			$result = mysqli_query($db, "update ledgers set type='" . $_GET['type'] . "',bal='" . $_GET['bal'] . "',status=1,name='" . $_GET['name'] . "',category='" . $_GET['cat'] . "' where ledgerid='" . $code . "'");
			$resulta = mysqli_query($db, "insert into log values('0','" . $username . " updates ledgers database.Ledger Id:" . $code . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
			if ($result) {
				echo '<p><img alt="Tick" src="images/tick.png" style="width:16px; height:16px; margin-top:-10px; margin-left:20px"></p>';
			} else {
				echo '<p><img alt="Delete" src="images/delete.png" style="width:16px; height:16px; margin-top:0px"></p>';
			}
			break;

							case '32.2':
							$mon=$_GET['mon'];
									$query =mysqli_query($db, "select * from salregister where month='".$mon."'");
									$count = mysqli_num_rows($query);
									if($count>0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>Month has already been registered.</p>');
									e.preventDefault();
									</script>";	
										
									}
									else{
								$resultb =mysqli_query($db, "select * from salary where status=1");
								$num_results = mysqli_num_rows($resultb);
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($resultb);
	$result = mysqli_query($db, "insert into payroll values('0','".$mon."','".stripslashes($row['emp'])."','".stripslashes($row['name'])."','".stripslashes($row['dept'])."','".stripslashes($row['sal'])."','".stripslashes($row['allow'])."','".stripslashes($row['adva'])."','".stripslashes($row['ins'])."','".stripslashes($row['ded'])."','".stripslashes($row['tax'])."','".stripslashes($row['nhif'])."','".stripslashes($row['nssf'])."','".stripslashes($row['othrs'])."','".stripslashes($row['rateot'])."','".stripslashes($row['totalot'])."','".stripslashes($row['net'])."',0)");
									}
								if($result){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." adds new payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	$result= mysqli_query($db, "insert into salregister values('".$mon."','','','','','','','','','','','','','',1)");						
									echo'<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px; margin-top:-5px"></p>';
									echo "<script>paginate(11,'".$mon."');</script>";
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px;margin-top:-5px"></p>';
										}
										
									}
							break;
							
							case '33.2':
							$mon=$_GET['mon'];
									$query =mysqli_query($db, "select * from salregister where month='".$mon."' and status=1");
									$count = mysqli_num_rows($query);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>Payroll for Month does not exist or has already been posted.</p>');
									e.preventDefault();
									</script>";	
										
									}
									else{
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo "<script>payroll('".$mon."');</script>";
										
									}
							break;
							case '34.2':
							$ser=$_GET['ser'];
							$result = mysqli_query($db, "DELETE from payroll where serial='".$ser."'");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from payroll','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							break;
							
							case '35.2':
							$sal=$_GET['sal'];if($sal==''){$sal=0;}
							$emp=$_GET['emp'];
							$mon=$_GET['mon'];
							$rateot=$_GET['rate'];
							$days=$_GET['days'];
							$allow=$_GET['allow'];if($allow==''){$allow=0;}
							$adva=$_GET['adva'];if($adva==''){$adva=0;}
							$ins=$_GET['ins'];if($ins==''){$ins=0;}
							$ded=$_GET['ded'];if($ded==''){$ded=0;}
							$othrs=$_GET['othrs'];if($othrs==''){$othrs=0;}
							$date= date('m_Y');  
							
							
							//calculate  overtime
							$totalot=$othrs*$rateot;
							
							//calculate gross income
							
							//calculate attendance deductions
							//if($days<26){
							//$sal=$sal*$days/26;
							//$sal=round($sal,2);
							//}
							
							$gross=$sal+$allow+$totalot;
							
							
							
							//calculate nssf
							$resulta =mysqli_query($db, "select * from nssf where id=1");
							$rowa=mysqli_fetch_array($resulta);
							$pnssf=stripslashes($rowa['amount']);
							
							if($gross<6000){$nssf=0;}
							else if($gross>=6000&&$gross<=18000){
								$nssf=$pnssf*$gross/100;
							}
							else if($gross>18000){$nssf=1080;}
							else{$nssf=0;}

							$nssf=stripslashes($rowa['amount']);
							
							//calculate nhif
							$resulta =mysqli_query($db, "select * from nhif where ".$gross.">=lower and ".$gross."<=upper");
							$rowa=mysqli_fetch_array($resulta);
							$nhif=stripslashes($rowa['amount']);
							
							
							
							//deduct nssf
							$net=$taxnet=$gross-$nssf;
							
							
						
							//calculate tax
							
							
							$resultx =mysqli_query($db, "select * from tax where id=1");
							$rowx=mysqli_fetch_array($resultx);
							$u1=stripslashes($rowx['upper']);//10164
							$t1=stripslashes($rowx['tax']);//0
							
							$resultx =mysqli_query($db, "select * from tax where id=2");
							$rowx=mysqli_fetch_array($resultx);
							$l2=stripslashes($rowx['lower']);//10164
							$u2=stripslashes($rowx['upper']);//19740
							$t2=stripslashes($rowx['tax']);//15
							
							$resultx =mysqli_query($db, "select * from tax where id=3");
							$rowx=mysqli_fetch_array($resultx);
							$l3=stripslashes($rowx['lower']);
							$u3=stripslashes($rowx['upper']);
							$t3=stripslashes($rowx['tax']);
							
							$resultx =mysqli_query($db, "select * from tax where id=4");
							$rowx=mysqli_fetch_array($resultx);
							$l4=stripslashes($rowx['lower']);
							$u4=stripslashes($rowx['upper']);
							$t4=stripslashes($rowx['tax']);
							
							$resultx =mysqli_query($db, "select * from tax where id=5");
							$rowx=mysqli_fetch_array($resultx);
							$l5=stripslashes($rowx['lower']);
							$t5=stripslashes($rowx['tax']);
							
							
							
							
							$tax=0;$a=0;
						
							if($taxnet<$u1){
							$tax=$t1*$taxnet;
							}
								
							else if(($taxnet>=$l2)&&($taxnet<=$u2)){
							$tax+=0.1*$l2;
							$taxnet-=$l2;
							$a=$taxnet*$t2;
							$tax+=$a;
							
							}
							
							else if(($l3<=$taxnet&&$taxnet<=$u3)){
							$tax+=0.1*$l2;
							$tax+=$t2*($u2-$l2);
							$taxnet-=$u2;
							$a=$taxnet*$t3;
							$tax+=$a;
							}
							
							else if(($l4<=$taxnet&&$taxnet<=$u4)){
							$tax+=0.1*$l2;
							$tax+=$t2*($u2-$l2);
							$tax+=$t3*($u3-$u2);
							$taxnet-=$u3;
							$a=$taxnet*$t4;
							$tax+=$a;
							}
							
							else if(($taxnet>$l5)){
							$tax+=0.1*$l2;
							$tax+=$t2*($u2-$l2);
							$tax+=$t3*($u3-$u2);
							$tax+=$t4*($u4-$u3);
							$taxnet-=$l5;
							$a=$taxnet*$t5;
							$tax+=$a;
							}
							else{}
							
							
							
							if($tax>1162){
							$tax=$tax-1162;
							}
							$tax=round($tax,2);
						//deduct nhif,tax,deductions,insurance,advance,scont,sloan
		$net=$net-$nhif-$ded-$ins-$adva-$tax;
		$net=round($net,2);
		
		$resulta = mysqli_query($db, "update payroll set sal='".$sal."',
		allow='".$allow."',adva='".$adva."',ins='".$ins."',ded='".$ded."',tax='".$tax."',nhif='".$nhif."',nssf='".$nssf."',nhif='".$nhif."',rateot='".$rateot."',othrs='".$othrs."',totalot='".$totalot."',net='".$net."', status=1 where emp='".$emp."' and month='".$mon."'");
		
		if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits payroll.Month:".$mon.";Emp id:".$emp."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	echo"<script>
	$('#sal' + '".$emp."').val('".$sal."');
	$('#nhif' + '".$emp."').val('".$nhif."');
	$('#nssf' + '".$emp."').val('".$nssf."');
	$('#tax' + '".$emp."').val('".$tax."');   
	$('#rate' + '".$emp."').val('".$rateot."');
	$('#ot' + '".$emp."').val('".$totalot."');
	$('#net' + '".$emp."').val('".$net."');
	</script>";
									echo'<img alt="" src="images/tick.png"  width="22" height="22"/>';
									
									}
								else{
									echo'<img alt="" src="images/delete.png"  width="21.5" height="21.5"/>';
									}
								break;
								
							case '36.2':
							$mon=$_GET['mon'];
							$emp=$_GET['emp'];
									
									$query =mysqli_query($db, "select * from salregister where month='".$mon."' and status=1");
									$count = mysqli_num_rows($query);
									if($count==0){
									echo"<script>
									$('#empdi').hide();
									$().customAlert();
									alert('Error!', '<p>Payroll for Month does not exist or has already been posted.</p>');
									e.preventDefault();
									</script>";	
										exit;
									}
									
									$query =mysqli_query($db, "select * from payroll where month='".$mon."' and emp='".$emp."'");
									$count = mysqli_num_rows($query);
									if($count>0){
									echo"<script>
									$('#empdi').hide();
									$().customAlert();
									alert('Error!', '<p>Employee already exists in the payroll.</p>');
									e.preventDefault();
									</script>";	
									exit;	
									}
									else{
						$resultb =mysqli_query($db, "select * from employee where emp='".$emp."'");
								$rowb=mysqli_fetch_array($resultb);
								$emp=stripslashes($rowb['emp']);
								$leave=stripslashes($rowb['leaveac']);
								$names=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);	
								
								$q=0;
								$resultx =mysqli_query($db, "select * from ".$mon." where pfno='".$emp."'");
								$rowx=mysqli_fetch_array($resultx);
					
								for ($x=1; $x<32; $x++) {
											$d=sprintf("%02d",$x);
											$d=$d.'c';
											if(stripslashes($rowx[$d])==1||stripslashes($rowx[$d])==2||stripslashes($rowx[$d])==3){
												$q++;
											}
								}
								
										
				$result =mysqli_query($db, "select * from payroll where status=1 and emp='".$emp."' order by serial desc limit 0,1");
				$row=mysqli_fetch_array($result);
														
$resultc = mysqli_query($db, "insert into payroll values('0','".$mon."','".stripslashes($rowb['emp'])."','".$names."','".stripslashes($rowb['dept'])."','".stripslashes($row['sal'])."','".stripslashes($row['allow'])."','','','','','','','','','','',0,'".stripslashes($rowb['bid'])."','".stripslashes($rowb['bname'])."','".stripslashes($rowb['acno'])."','".$q."')");				
										
	
									if($result){	
	$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts new employee into payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo'<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px; margin-top:-5px"></p>';
									echo "<script>
									$('#mon').hide();payroll('".$mon."');</script>";
										
									}
									
									}
							break;
							case '37.2':
							$mon=$_GET['mon'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							$query =mysqli_query($db, "select * from salregister where month='".$mon."' and status=1");
									$count = mysqli_num_rows($query);
									if($count==0){
									echo"<script>
									$$().customAlert();
									alert('Error!', '<p>Payroll for Month does not exist or has already been posted.</p>');
									e.preventDefault();
									</script>";	
										exit;
									}
									else{
							$totalnet=0;$totalsal=0;$totalallow=0;$totaladva=0;$totalins=0;$totalded=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;$totaltax=0;
							$result =mysqli_query($db, "select * from payroll where month='".$mon."'");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$net=stripslashes($row['net']);
							$sal=stripslashes($row['sal']);
							$allow=stripslashes($row['allow']);
							$adva=stripslashes($row['adva']);
							$ins=stripslashes($row['ins']);
							$ded=stripslashes($row['ded']);
							$othrs=stripslashes($row['othrs']);
							$totalot=stripslashes($row['totalot']);
							$nssf=stripslashes($row['nssf']);
							$nhif=stripslashes($row['nhif']);
							$tax=stripslashes($row['tax']);
							$totalnet+=$net;
							$totalsal+=$sal;
							$totalallow+=$allow;
							$totaladva+=$adva;
							$totalins+=$ins;
							$totalded+=$ded;
							$totalothrs+=$othrs;
							$totalotal+=$totalot;
							$totalnssf+=$nssf;
							$totalnhif+=$nhif;
							$totaltax+=$tax;
							
							if(stripslashes($row['status'])==0){
							echo"<script>
									$().customAlert();
									alert('Error!', '<p>Details of ".stripslashes($row['name'])." have not been saved yet!</p>');
									e.preventDefault();
									</script>";	
								exit;	
							}
							
							
							}
							
							
												
		$resultb = mysqli_query($db, "update salregister set amount='".$totalnet."',date='".$date."',stamp='".$stamp."',sal='".$totalsal."',allow='".$totalallow."',adva='".$totaladva."',nssf='".$totalnssf."',nhif='".$totalnhif."',tax='".$totaltax."',ins='".$totalins."',ded='".$totalded."',othrs='".$totalothrs."',totalot='".$totalotal."',status=0 where month='".$mon."'");
							
							if($resultb){	
	$resulta = mysqli_query($db, "insert into log values('0','".$username." commits payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo"<script>
									$().customAlert();
									alert('Success!', '<p>Payroll Submitted!</p>');
									e.preventDefault();
									</script>";	
										
									}
									
									}
								break;
								
								case '38.2':
								$code=$_GET['code'];
									$query =mysqli_query($db, "select * from nhif where id='".$code."'");
									$count = mysqli_num_rows($query);
									
									if($count>0){
										
							$result = mysqli_query($db, "update nhif set lower='".$_GET['lower']."',upper='".$_GET['upper']."',amount='".$_GET['amount']."' where id='".$code."'");	
									}
									else{
										
								$result= mysqli_query($db, "insert into nhif values('".$code."','".$_GET['lower']."','".$_GET['upper']."','".$_GET['amount']."',1)");	
								}
								if($result){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits nhif table.id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							
							case '39.2':
							$code=$_GET['code'];
							$result = mysqli_query($db, "update tax set lower='".$_GET['lower']."',upper='".$_GET['upper']."',tax='".$_GET['amount']."' where id='".$code."'");	
								
								if($result){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits tax table.id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							
							case '40.2':
								$resulta = mysqli_query($db, "update nssf set amount='".$_GET['employee']."' where id=1");	
							if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits nssf table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							case '41.2':
							$resulta = mysqli_query($db, "update overtime set rate='".$_GET['amount']."' where id=1");	
							if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits overtime table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="22px" height="22px"/>';
									}
							break;
							
							case '29.6':
						$result= mysqli_query($db, "insert into wardbeds values('0','".$_GET['ward']."','".$_GET['roomno']."','".$_GET['roomtype']."','".$_GET['bedno']."','','',0,'')");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts data into wardbeds database.Bed No:".$_GET['bedno']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px"></p>';
									echo "<script>paginate(12,0);</script>";
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px"></p>';
										}
							
							break;	
							case '30.6':
							$code=$_GET['code'];
							$result = mysqli_query($db, "DELETE from wardbeds where id=".$code."");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from wardbeds database.Bed Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							break;
							case '31.6':
							$code=$_GET['code'];
						$result = mysqli_query($db, "update wardbeds set type='".$_GET['roomtype']."',roomno='".$_GET['roomno']."',wardtype='".$_GET['ward']."' where id='".$code."'");	
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates ward beds database.Bed Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="width:16px; height:16px; margin-top:-10px; margin-left:20px"></p>';
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="width:16px; height:16px; margin-top:0px"></p>';
									}
							break;
							
							case '31.7':
							$code=$_GET['code'];
						$result = mysqli_query($db, "update newprescription set Status=0 where PrescId='".$code."'");	
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates prescriptions database.Presc Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="width:16px; height:16px; margin-top:-10px; margin-left:20px"></p>';
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="width:16px; height:16px; margin-top:0px"></p>';
									}
							break;
							
							case '21.8':
							$a=$_GET['a'];
							if($a==1){
							$result= mysqli_query($db, "insert into inscompanies values('0','".$_GET['acno']."','".$_GET['name']."','".$_GET['bal']."','".$_GET['add']."','".$_GET['town']."','".$_GET['tel']."','".$_GET['mobile']."','".$_GET['email']."',1)");
							}
							if($a==2){
							$regn=$_GET['regn'];
							$result= mysqli_query($db, "update inscompanies set acno='".$_GET['acno']."',name='".$_GET['name']."',balance='".$_GET['bal']."',address='".$_GET['add']."',town='".$_GET['town']."',tel='".$_GET['tel']."',mobile='".$_GET['mobile']."',email='".$_GET['email']."' where id='".$regn."'");
							}
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." edits insurance companies database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
									echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px;width:30px; height:30px"></p>';
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px;width:30px; height:30px"></p>';
										}
							
							break;
							case '22.8':
							$regn=$_GET['regn'];
							$result = mysqli_query($db, "DELETE from inscompanies where id='".$regn."'");
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from makes insurance companies.Id:".$_GET['regn']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px;width:30px; height:30px"></p>';
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px;width:30px; height:30px"></p>';
										}
							break;
							
							case '21.9':
							$result= mysqli_query($db, "insert into deathsregister values('0','".$_GET['patid']."','".$_GET['patname']."','".$_GET['age']."','".$_GET['gender']."','".$_GET['tod']."','".$_GET['dod']."','".$_GET['cod']."','".$_GET['con']."','".$_GET['morgue']."','".$_GET['odetail']."','".date('d/m/Y')."','".date('Ymd')."',1)");
							$result= mysqli_query($db, "update patients set status=0 where pntno='".$_GET['patid']."'");
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts data into deaths register database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
									echo'<p><img alt="Up" src="images/up.jpg" style="margin-top:-20px"></p>
										<script>
											setTimeout(function() {
											editpatient(122);},500);
										</script>';
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="margin-top:-20px"></p>';
									}
							
							break;
							case '21.91':
							$result= mysqli_query($db, "insert into birthsregister values('0','".$_GET['name']."','".$_GET['gen']."','".$_GET['tob']."','".$_GET['dob']."','".$_GET['mom']."','".$_GET['doc']."','".$_GET['odetail']."','".date('d/m/Y')."','".date('Ymd')."',1)");
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts data into births register database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
									echo'<p><img alt="Up" src="images/up.jpg" style="margin-top:-20px"></p>
										<script>
											setTimeout(function() {
											birthsregister();},500);
										</script>';
										exit;
									}
									else{
										echo'<p><img alt="Down" src="images/down.jpg" style="margin-top:-20px"></p>';
									}
							
							break;
							case '70':
							$a=$_GET['a'];
							if(isset($_GET['b'])){
							$b=$_GET['b'];}else $b='NULL';
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
						if($a==1){
						$result =mysqli_query($db, "select * from newprescription where Dept='".$b."' and Stamp>='".$d1."' and  Stamp<='".$d2."' and regCategory!='CUSTOM' order by PrescId asc");	
						}else if($b==2){
							$result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and  Stamp<='".$d2."' and regCategory!='CUSTOM' order by PrescId asc");
						}
						else if($b==3){
							$result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and  Stamp<='".$d2."' and regCategory!='CUSTOM' and (Reclab=1 or Reclab=2) order by PrescId asc");
						}
						else if($b==4){
							$result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and  Stamp<='".$d2."' and regCategory!='CUSTOM' and (Recrad=1 or Recrad=2) order by PrescId asc");
						}
							else if($b==5){
							$result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and  Stamp<='".$d2."' and regCategory!='CUSTOM' and (RecTheatre=1 or RecTheatre=2) order by PrescId asc");
						}
							else if($b==6){
							$result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and  Stamp<='".$d2."' and regCategory!='CUSTOM' and DayCare=1 order by PrescId asc");
						}
						else if($b==7){
							$result =mysqli_query($db, "select * from newprescription where Stamp>='".$d1."' and  Stamp<='".$d2."' and regCategory!='CUSTOM'  order by PrescId asc");
						}
					
						$num_results = mysqli_num_rows($result);
						echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
								<option value="">Select one...</option>';
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.stripslashes($row['PrescId']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'-'.dateprint(stripslashes($row['TransDate'])).'</option>';
							}
							echo'</select>';
							break;
							
							case '70.1':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							
						$result =mysqli_query($db, "select * from sales where Stamp>='".$d1."' and  Stamp<='".$d2."' and PayMode='Cash' and Status=0  order by TransNo asc");
						$arr=array();
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
						$row=mysqli_fetch_array($result);
						$arr[stripslashes($row['RcptNo'])]=stripslashes($row['RcptNo']).'#'.stripslashes($row['ClientName']).'#'.stripslashes($row['ClientId']).'#'.stripslashes($row['Date']).'#'.stripslashes($row['Category']).'#'.stripslashes($row['old_patient_id']);
						}
								$count=count($arr);
						echo"<script>$('#cons".$a."').parent().find('input:first').focus().width(480);</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
								<option value="">Select one...</option>';
								foreach ($arr as $key => $val) {
								$pieces=explode("#",$val);
								echo'<option value="'.$key.'#'.$pieces[2].'#'.$pieces[5].'">'.$pieces[1].'-'.$pieces[2].'-'.$pieces[4].'-'.$pieces[5].'</option>';
								}
							echo'</select>';
							break;

							
							case '70.12':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							
						$result =mysqli_query($db, "select * from sales where Stamp>='".$d1."' and  Stamp<='".$d2."' and PayMode='Companies' and Status=0  order by TransNo asc");
						$arr=array();
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
						$row=mysqli_fetch_array($result);
						$arr[stripslashes($row['RcptNo'])]=stripslashes($row['RcptNo']).'#'.stripslashes($row['ClientName']).'#'.stripslashes($row['ClientId']).'#'.stripslashes($row['Date']).'#'.stripslashes($row['Category']).'#'.stripslashes($row['old_patient_id']);
						}
								$count=count($arr);
						echo"<script>$('#rvpay01".$a."').parent().find('input:first').focus().width(480);</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="rvpay01'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="rvpay01'.$a.'">
								<option value="">Select one...</option>';
								foreach ($arr as $key => $val) {
								$pieces=explode("#",$val);
								echo'<option value="'.$key.'#'.$pieces[2].'#'.$pieces[5].'">'.$pieces[1].'-'.$pieces[2].'-'.$pieces[4].'-'.$pieces[5].'</option>';
								}
							echo'</select>';
							break;


							case '70.2':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							$result =mysqli_query($db, "select * from receipts where stamp>='".$d1."' and  stamp<='".$d2."' and paymode='Companies' and invno='' order by id asc");
			$arr=array();
			$num_results = mysqli_num_rows($result);
			for ($i=0; $i <$num_results; $i++) {
			$row=mysqli_fetch_array($result);
			$arr[stripslashes($row['patid'])]=stripslashes($row['rcptno']).'#'.stripslashes($row['patname']).'#'.stripslashes($row['patid']).'#'.stripslashes($row['date']).'#'.stripslashes($row['category']);
			}
						echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
								<option value="">Select one...</option>';
							foreach ($arr as $key => $val) {
								$pieces=explode("#",$val);
								echo'<option value="'.$key.'">'.$pieces[1].'-'.$key.'</option>';
							}
							echo'</select>';
							break;

							case '70.3':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);

							//statuses 1-requested, 3-accepted; 4-rejected; 2-done
							$result =mysqli_query($db, "select * from labrequests where stamp>='".$d1."' and  stamp<='".$d2."' and (status=2 or status=3) order by id asc");
							$num_results = mysqli_num_rows($result);
							$arr=array();
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['prescid']);
								$arr[stripslashes($row['prescid'])]=stripslashes($row['patname']).'-'.stripslashes($row['patid']);
								}
								$count=count($arr);

							echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
						<div class="cleaner_h10"></div>
							<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
							<option value="">Select one...</option>';


							foreach ($arr as $key => $val) {
							echo"<option value=\"".$key."\">".$val."</option>";
							}
						
							echo'</select>';
							break;
							
							case '70.4':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							$result =mysqli_query($db, "select * from radrequests where stamp>='".$d1."' and  stamp<='".$d2."' order by id asc");
							$num_results = mysqli_num_rows($result);
							$arr=array();
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['prescid']);
								$arr[stripslashes($row['prescid'])]=stripslashes($row['patname']).'-'.stripslashes($row['patid']);
								}
								$count=count($arr);

							echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
						<div class="cleaner_h10"></div>
							<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
							<option value="">Select one...</option>';


							foreach ($arr as $key => $val) {
							echo"<option value=\"".$key."\">".$val."</option>";
							}
						
							echo'</select>';
							break;
							case '70.5':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							$result =mysqli_query($db, "select * from theatrequests where stamp>='".$d1."' and  stamp<='".$d2."' order by id asc");
							$num_results = mysqli_num_rows($result);
							$arr=array();
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['prescid']);
								$arr[stripslashes($row['prescid'])]=stripslashes($row['patname']).'-'.stripslashes($row['patid']);
								}
								$count=count($arr);

							echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
						<div class="cleaner_h10"></div>
							<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
							<option value="">Select one...</option>';


							foreach ($arr as $key => $val) {
							echo"<option value=\"".$key."\">".$val."</option>";
							}
						
							echo'</select>';
							break;

							case '70.6':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							$result =mysqli_query($db, "select * from labrequests where stamp>='".$d1."' and  stamp<='".$d2."' AND status=1 AND paid=1 AND deptfrom='OPD' AND request!='CUSTOM-LAB' order by Id asc");
							$num_results = mysqli_num_rows($result);
							$arr=array();
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['prescid']);
								$arr[stripslashes($row['prescid'])]=stripslashes($row['patname']).'-'.stripslashes($row['patid']);
								}
								$count=count($arr);

							echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
						<div class="cleaner_h10"></div>
							<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
							<option value="">Select one...</option>';


							foreach ($arr as $key => $val) {
							echo"<option value=\"".$key."\">".$val."</option>";
							}
						
							echo'</select>';
							break;

							case '70.7':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							$result =mysqli_query($db,"select * from pharmrequests where stamp>='".$d1."' and  stamp<='".$d2."' and paid=0 order by id asc");
							$num_results = mysqli_num_rows($result);
							$arr=array();
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['prescid']);
								$arr[stripslashes($row['old_in_presc_id'])]=stripslashes($row['old_in_presc_id']).'#'.stripslashes($row['prescid']).'#'.stripslashes($row['old_in_patient_id']).'#'.stripslashes($row['patid']).'#'.stripslashes($row['patname']);
								}
								$count=count($arr);
							echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
							<div class="cleaner_h10"></div>
							<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
							<option value="">Select one...</option>';

							foreach ($arr as $key => $val) {
								$pieces=explode("#",$val);
								echo'<option value="'.$key.'#'.$pieces[1].'#'.$pieces[2].'#'.$pieces[3].'">'.$pieces[4].'-'.$pieces[3].'</option>';
							}
						
							echo'</select>';
							break;

							case '70.8':
							$a=$_GET['a'];
							if(isset($_GET['b'])){
							$b=$_GET['b'];}else $b='NULL';
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);

							$result =mysqli_query($db, "select * from cccpresc where  Stamp>='".$d1."' and  Stamp<='".$d2."' order by PrescId asc");	
					
						$num_results = mysqli_num_rows($result);
						echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
								<option value="">Select one...</option>';
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.stripslashes($row['PrescId']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'-'.stripslashes($row['TransDate']).'</option>';
							}
							echo'</select>';
							break;
							case '70.9':
							$a=$_GET['a'];
							if(isset($_GET['b'])){
							$b=$_GET['b'];}else $b='NULL';

							if($b==1){$table='counselling';}
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);

							$result =mysqli_query($db, "select * from ".$table." where  Stamp>='".$d1."' and  Stamp<='".$d2."' order by PrescId asc");	
					
						$num_results = mysqli_num_rows($result);
						echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
								<option value="">Select one...</option>';
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.stripslashes($row['PrescId']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'-'.stripslashes($row['TransDate']).'</option>';
							}
							echo'</select>';
							break;		

							case '70.11': 
							$a=$_GET['a'];
							$dept4rm=$_GET['dept4rm'];
							if(isset($_GET['b'])){
							$b=$_GET['b'];}else $b='NULL';
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);

						if($dept4rm=='IPD'){
							$result =mysqli_query($db, "select * from pharmrequests where paid=0 and status=0 and stamp>='".$d1."' and stamp<='".$d1."' group by prescid asc");
						}
						else if($dept4rm=='OPD'){
							$result =mysqli_query($db, "select * from pharmrequests where paid=1 and status=1 and stamp>='".$d1."' and stamp<='".$d1."' group by prescid asc");
						}
						else {
							$result =mysqli_query($db, "select * from pharmrequests where regcategory!='CUSTOM' and stamp>='".$d1."' and stamp<='".$d1."' group by prescid asc");	
							#$result =0;							
						}
					
						$num_results = mysqli_num_rows($result);
						echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
								<option value="">Select one...</option>';
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
					echo'<option value="'.stripslashes($row['old_in_presc_id']).'ÃÂ¸'.stripslashes($row['prescid']).'ÃÂ¸'.stripslashes($row['old_in_patient_id']).'ÃÂ¸'.stripslashes($row['id']).'ÃÂ¸'.stripslashes($row['patid']).'ÃÂ¸'.stripslashes($row['dept4rm']).'">'.stripslashes($row['patname']).'-'.stripslashes($row['patid']).'-'.stripslashes($row['deptfrom']).'</option>';
							}
							echo'</select>';
							break;	

							case '70.12':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
							$result =mysqli_query($db, "select * from labrequests where stamp>='".$d1."' and  stamp<='".$d2."' AND status=1 AND paid=0 AND deptfrom='IPD' AND request!='CUSTOM-LAB' order by Id asc");
							$num_results = mysqli_num_rows($result);
							$arr=array();
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['prescid']);
								$arr[stripslashes($row['prescid'])]=stripslashes($row['patname']).'-'.stripslashes($row['patid']);
								}
								$count=count($arr);

							echo"<script>$('#cons3199".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$count.'</strong></a>
						<div class="cleaner_h10"></div>
							<label for="cons3199'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons3199'.$a.'">
							<option value="">Select one...</option>';


							foreach ($arr as $key => $val) {
							echo"<option value=\"".$key."\">".$val."</option>";
							}
						
							echo'</select>';
							break;										
							
							case 71:
								$pid=$_POST['pid'];
								$resulta =mysqli_query($db, "select Id,old_patient_id,Dept,PatId,PatName,PrescId from newprescription where PrescId='".$pid."'");
								$rowa=mysqli_fetch_array($resulta);
								$in_presc_id=stripslashes($rowa['Id']);
								$old_patient_id=stripslashes($rowa['old_patient_id']);
								$sendto=stripslashes($rowa['Dept']);
								$patid=stripslashes($rowa['PatId']);
								$patname=stripslashes($rowa['PatName']);
								$paid=0;

								$stamp=date('Ymd');
								$dat=date('Y/m/d');
								$presc=mysqli_real_escape_string($db, trim($_POST['presc']));
								$patientclinic=mysqli_real_escape_string($db, trim($_POST['typeclinics']));
								$typeclinics=strip_tags($patientclinic);
								$insid=htmlsan($_POST['insid']);
								$insname=htmlsan($_POST['insname']);
								$accntype=htmlsan($_POST['accntype']);
								$mode=htmlsan($_POST['switchboard']);
        						if ($insid == 14 || $insname == 'CASH') { $mode='Cash'; } else { $mode='Companies'; }
        						#if ($switchboard == 1) { $mode='Cash'; } else { $mode='Companies'; }
        						#if ($switchboard == 'Cash') { $mode='Cash'; } else { $mode='Companies'; }
        						#if ($switchboard == 'Cash') else if ($switchboard == 'Companies') { $mode='Companies'; } { $mode='Cash'; } else { $mode='Companies'; }
			
								if(isset($_SESSION['dis'])){
									$diseases=implode(";",$_SESSION['dis']);
								}else $diseases=NULL;

								$s=strlen($diseases);
								$diseases=substr($diseases,0,$s);

        						if($_POST['switchboard']=='Cash'){ 
									$resulta= mysqli_query($db, "UPDATE newprescription SET History='".mysqli_real_escape_string($db, trim($_POST['history']))."',Prescription='".$presc."',DiagName='".$diseases."',Diagnosis='".mysqli_real_escape_string($db, trim($_POST['diag']))."',PhyExam='".mysqli_real_escape_string($db, trim($_POST['phy']))."',Dressing='".mysqli_real_escape_string($db, trim($_POST['history2']))."',Status=4,Dept='".$_POST['sendto']."',ReviewDate='".$_POST['reviewdate']."',ConsTime='".date('H:i')."',Temp='".$_POST['temp']."',Bp1='".$_POST['bp1']."',Bp2='".$_POST['bp2']."',Weight='".$_POST['weight']."',RespRate='".$_POST['resprate']."',PulseRate='".$_POST['pulserate']."',Rbs='".$_POST['rbs']."',OtherDetails='".$typeclinics."',newscreening='".$_POST['newscreening']."',knownhyper='".$_POST['knownhyper']."',takingmeds='".$_POST['takingmeds']."',DayCare='".$_POST['dress']."',username='".$username."',AccType='Normal',in_insurer_id=14,in_insurer_name='CASH',Mode='Cash' WHERE Id='".$in_presc_id."'");
								//$resulta= mysqli_query($db, "UPDATE pharmrequests SET prescription='".mysqli_real_escape_string($db, trim($_POST['presc']))."' where PrescId='".$pid."'");
        						} else { 
									$resulta= mysqli_query($db, "UPDATE newprescription SET History='".mysqli_real_escape_string($db, trim($_POST['history']))."',Prescription='".$presc."',DiagName='".$diseases."',Diagnosis='".mysqli_real_escape_string($db, trim($_POST['diag']))."',PhyExam='".mysqli_real_escape_string($db, trim($_POST['phy']))."',Dressing='".mysqli_real_escape_string($db, trim($_POST['history2']))."',Status=4,Dept='".$_POST['sendto']."',ReviewDate='".$_POST['reviewdate']."',ConsTime='".date('H:i')."',Temp='".$_POST['temp']."',Bp1='".$_POST['bp1']."',Bp2='".$_POST['bp2']."',Weight='".$_POST['weight']."',RespRate='".$_POST['resprate']."',PulseRate='".$_POST['pulserate']."',Rbs='".$_POST['rbs']."',OtherDetails='".$typeclinics."',newscreening='".$_POST['newscreening']."',knownhyper='".$_POST['knownhyper']."',takingmeds='".$_POST['takingmeds']."',DayCare='".$_POST['dress']."',AccType='".htmlsan($_POST['accntype'])."',in_insurer_id='".htmlsan($_POST['insid'])."',in_insurer_name='".htmlsan($_POST['insname'])."',username='".$username."',Mode='".$mode."' WHERE Id='".$in_presc_id."'");
								//$resulta= mysqli_query($db, "UPDATE pharmrequests SET prescription='".mysqli_real_escape_string($db, trim($_POST['presc']))."' where PrescId='".$pid."'");
        						}
								
								//get receipt no
								$question =mysqli_query($db, "SELECT TransNo,RcptNo FROM sales order by TransNo desc limit 0,1");
								$ans=mysqli_fetch_array($question);
								$rcptno=stripslashes($ans['RcptNo'])+1;
								$arr=array();

								if($_POST['recp']==1){
									$arr[]='PHARMACY';
								
										$a='pharmcart';

										$max=count($_SESSION[$a]);
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
										$prescname= $_SESSION[$a][$i][13];
										$categ_id = $_SESSION[$a][$i][14];
										#$dispstatus = $_SESSION[$a][$i][15]; #if 2 - dispensed
										#$paidstatus = $_SESSION[$a][$i][16]; #if 1 - paid
										#$payrcptno = $_SESSION[$a][$i][17];
										// $salesid = $_SESSION[$a][$i][18]; 
										// $pharmid = $_SESSION[$a][$i][19]; 
										$disp=0;
										$arr[]=$categ;
										$dept=$categ;
										#if($payrcptno!=''){$rcptno=$payrcptno;}else{$rcptno=$rcptno;}


										// $result =mysqli_query($db, "select * from pharmrequests where itcode='".$itcode."' and prescid='".$pid."' and old_in_presc_id='".$in_presc_id."' and old_in_patient_id='".$old_patient_id."' and deptfrom='OPD'");
										// $num_results = mysqli_num_rows($result);
										// if($num_results>=1){
										// 	echo"
										// 			<script>
										// 			$().customAlert();
										// 			alert('Error!', '<p>Similar item already exists.</p>');
										// 			e.preventDefault();
										// 			</script>";
										// 	exit;
										#}else{

									    $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$patid."','".$patname."','','','','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");

									
										  $last_id = mysqli_insert_id($db);
										  #$res = mysqli_query($db, "insert into pharmsales values('0','".$last_id."')");
											$resulta = mysqli_query($db, "insert into pharmrequests values('0','".$pid."','".$patid."','".$patname."','".$prescname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$username."','".$stamp."',0,'".date('H:i')."','','".$fullname."','','".$in_presc_id."','".$old_patient_id."','".$rcptno."','".$paid."','".$last_id."','OPD','NORMAL')");			
											#$resultb= mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE Id='".$in_presc_id."'");
										  #echo "New record created successfully. Last inserted ID is: " . $last_id;

										#} 
									
										#$resultb= mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE PrescId='".$pid."'");old_in_sale_id
									}

								}


								if($_POST['recl']==1){
									//insert into lab requests
									$question =mysqli_query($db, "SELECT id,labno FROM labrequests order by id desc limit 0,1");
									$ans=mysqli_fetch_array($question);
									$labno=stripslashes($ans['labno'])+1;
								
									$a='lab';

									$max=count($_SESSION[$a]);
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
									$iid = $_SESSION[$a][$i][12];
									$categ_id = $_SESSION[$a][$i][15];
									$sec = $_SESSION[$a][$i][16];
									$disp=0;
									$arr[]=$categ;
									$dept=$categ;

								$resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','','','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
								
								$last_id = mysqli_insert_id($db);
								$resulty = mysqli_query($db, "insert into labrequests values('0','".$labno."','".$pid."','".$patid."','".$patname."','".$sec."','".$itname."','','".date('H:i')."','','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','','','','','','','','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','NORMAL')");	

								
								}


							}

							if($_POST['recr']==1){
								
								//insert into rad requests
								$question =mysqli_query($db, "SELECT id,radno FROM radrequests order by id desc limit 0,1");
								$ans=mysqli_fetch_array($question);
								$radno=stripslashes($ans['radno'])+1;
								
								$a='rad';
								$max=count($_SESSION[$a]);
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
									$iid = $_SESSION[$a][$i][12];
									$categ_id = $_SESSION[$a][$i][15];
									$disp=0;
									$arr[]=$categ;
									$dept=$categ;						

								$resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','','','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
								
								$last_id = mysqli_insert_id($db);
								$resulty = mysqli_query($db, "insert into radrequests values('0','".$radno."','".$pid."','".$patid."','".$patname."','".$itname."','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','RADIOLOGY','NORMAL')");	

																
								}

							}



							if($_POST['dress']==1){

								$question =mysqli_query($db, "SELECT id,dreno FROM opdservicerequests order by id desc limit 0,1");
								$ans=mysqli_fetch_array($question);
								$dreno=stripslashes($ans['dreno'])+1;
								
								$a='dresser';
								$max=count($_SESSION[$a]);
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
									$iid = $_SESSION[$a][$i][12];
									$categ_id = $_SESSION[$a][$i][15];
									$sec = $_SESSION[$a][$i][16];
									$disp=0;
									$arr[]=$categ;
									$dept=$categ;						

								$resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','','','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
								
								$last_id = mysqli_insert_id($db);
								$resulty = mysqli_query($db, "insert into opdservicerequests values('0','".$dreno."','".$pid."','".$patid."','".$patname."','".$itname."','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','NORMAL')");	

																
								}

							}

							
							
			if($resulta){
				foreach ($arr as $key => $val) {
				//send popups
				  $resultc =mysqli_query($db, "SELECT ip,dept FROM compips WHERE dept='".$val."'");
				  $num_resultsc = mysqli_num_rows($resultc);	
					for ($i=0; $i <$num_resultsc; $i++) {
					$rowc=mysqli_fetch_array($resultc);
					$ip=stripslashes($rowc['ip']);		
					
						$resultd =mysqli_query($db, "SELECT username,computerip FROM logintable WHERE computerip='".$ip."'");
						$num_resultsd = mysqli_num_rows($resultd);	
						for ($d=0; $d <$num_resultsd; $d++) {
						$rowd=mysqli_fetch_array($resultd);
						$user=stripslashes($rowd['username']);
						$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient from ".$dept."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
						}
								
					}	
				}
							
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates consultations.Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo"<img alt=\"Tick\" src=\"images/tick.png\" style=\"width:30px; height:30px;\">
										<script>
											setTimeout(function() {
											docexam('".$sendto."');},500);
										</script>";
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;
							
							case 72:
							$pid=$_GET['pid'];
							$resulta= mysqli_query($db, "update newprescription set WardType='".$_GET['wtype']."',RoomNo='".$_GET['rno']."',BedNo='".$_GET['bno']."',AdmDate='".date('d/m/Y')."',Admitted=1,Doctor='".$fullname."' where PrescId='".$pid."'");
							$resultb= mysqli_query($db, "update wardbeds set patname='".$_GET['patname']."',patid='".$_GET['patid']."',Status=1 where bedno='".$_GET['bno']."' and roomno='".$_GET['rno']."'");
							
							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates consultations[admissions information].Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;
							case '73':
							$a=$_GET['a'];
							$d1=preg_replace('~/~', '', $_GET['d1']);
							$d2=preg_replace('~/~', '', $_GET['d2']);
			$result =mysqli_query($db, "select * from sales where Stamp>='".$d1."' and  Stamp<='".$d2."' and Dispensed=0 and Category='PHARMACY' and Status=1 order by TransNo asc");
			$arr=array();
			$num_results = mysqli_num_rows($result);
			for ($i=0; $i <$num_results; $i++) {
			$row=mysqli_fetch_array($result);
			$arr[stripslashes($row['RcptNo'])]=stripslashes($row['ClientName']);
			}
						echo"<script>$('#cons".$a."').parent().find('input:first').focus();</script>";
						echo'<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump">'.count($arr).'</strong></a>
						<div class="cleaner_h10"></div>
						<label for="cons'.$a.'" class="bh-visually-hidden">No. of Patients:</label><select id="cons'.$a.'">
							<option value="">Select one...</option>';
							foreach ($arr as $key => $val) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.$key.'">'.$key.','.$val.'</option>';
							}
							echo'</select>';
							break;
							
							case 75:
							$item=$_POST['itemd'];
							$cat=$_POST['cat'];
							 if($cat=="diseases"){
									$result = mysqli_query($db, "insert into ".$cat." values('0','".$item."','')");	
								}else{
									$result = mysqli_query($db, "insert into ".$cat." values('0','".$item."')");									
								}
							if($result){
$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts data into ".$cat." database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">
<script>$("#itemdefault").val("").focus();</script>';
echo"
										<script>
										setTimeout(function() {
										addmedical();},500);
										</script>";
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
							break;
							case '75.1':
							$item=$_GET['itemd'];
							$itid=$_GET['itid'];
							$cat=$_GET['cat'];
							$result= mysqli_query($db, "update ".$cat." set name='".$item."' where id='".$itid."'");
							
							if($result){
$resulta = mysqli_query($db, "insert into log values('0','".$username." updates ".$cat." database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
									echo"
										<script>
										setTimeout(function() {
										addmedical();},500);
										</script>";
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
							break;
								case '75.2':
							$itid=$_GET['itid'];
							$cat=$_GET['cat'];
							$result = mysqli_query($db, "DELETE from ".$cat." where id='".$itid."'");
							
							if($result){
$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from ".$cat." database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
									echo"
										<script>
										setTimeout(function() {
										addmedical();},500);
										</script>";
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
							break;
							case 76:
							$pid=$_GET['pid'];
							$query =mysqli_query($db, "select * from admdetails where pid='".$pid."'");
							$count = mysqli_num_rows($query);
							if($count>0){
							$resulta= mysqli_query($db, "update admdetails set tw1='".$_GET['tw1']."',tb1='".$_GET['tb1']."',td1='".$_GET['td1']."',tw2='".$_GET['tw2']."',tb2='".$_GET['tb2']."',td2='".$_GET['td2']."',physician='".$_GET['phy']."',surgeon='".$_GET['sur']."',anaesthetist='".$_GET['anae']."',paeditrician='".$_GET['paed']."',previous='".$_GET['previous']."',current='".$_GET['current']."',height='".$_GET['height']."',weight='".$_GET['weight']."',bmi='".$_GET['bmi']."',steroidate='".$_GET['steroidate']."',steroid='".$_GET['steroid']."' where pid='".$pid."'");
							}else{
							$resulta= mysqli_query($db, "insert into admdetails values('".$pid."','".$_GET['patid']."','".$_GET['patname']."','".$_GET['bedno']."','".$_GET['tw1']."','".$_GET['tb1']."','".$_GET['td1']."','".$_GET['tw2']."','".$_GET['tb2']."','".$_GET['td2']."','".$_GET['phy']."','".$_GET['sur']."','".$_GET['anae']."','".$_GET['paed']."','".$_GET['previous']."','".$_GET['current']."','".$_GET['height']."','".$_GET['weight']."','".$_GET['bmi']."','".$_GET['steroid']."','".$_GET['steroidate']."')");
							}
							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates inpatient prescripion administration chart,Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;
							
							
							
							case '77.1':
							$code=$_GET['code'];
							$y=$_GET['y'];
							$q=$_GET['q'];
							$resulta =mysqli_query($db, "select * from inpatients where PrescId='".$_GET['q']."'");
							$rowa=mysqli_fetch_array($resulta);
							if($y==1){
							$resulta = mysqli_query($db, "update vitals set temp='".$_GET['c']."',bp1='".$_GET['d']."',bp2='".$_GET['e']."',
							weight='".$_GET['f']."',pulse='".$_GET['g']."',breath='".$_GET['h']."',random='".$_GET['i']."' where id='".$code."'");	
								}
							else{
								$resulta= mysqli_query($db, "insert into vitals values('0','".$_GET['j']."','".$_GET['q']."','".$_GET['a']."','".$_GET['b']."','".$_GET['c']."','".$_GET['d']."','".$_GET['e']."','".$_GET['f']."','".$_GET['g']."','".$_GET['h']."','".$_GET['i']."','".$rowa['Id']."','".$rowa['old_in_patient_id']."')");	
								}
								if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits vitals table.id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img alt="" src="images/tick.png" width="16px" height="16px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="16px" height="16px"/>';
									}
							break;
							
							case 78:
							$pid=$_GET['pid'];
							$notes=mysqli_real_escape_string($db, trim($_GET['notes']));
							$resulta =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
							$rowa=mysqli_fetch_array($resulta);
							
							$notes=$notes.'<br/> Entry Made By:<b>'.$fullname.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date: :<b>'.date('d/m/Y').'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time:<b>'.date('H:i').'</b>';
							
							$resulta = mysqli_query($db, "insert into cadex values('0','".$rowa['PrescId']."','".$rowa['PatId']."','".$rowa['PatName']."','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','".$notes."','".$rowa['Id']."','".$rowa['old_in_patient_id']."')");
							
							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates consultations[nurses information].Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
							echo"
										<script>
										setTimeout(function() {
										treatchart();},500);
										</script>";
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;

							case '78.1':
							$pid=$_POST['pid'];
							$notes=mysqli_real_escape_string($db, trim($_POST['notes']));
							
							$resulta= mysqli_query($db, "update inpatients set AdmNotes='".$notes."' where PrescId='".$pid."'");
							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates admission notes.Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
							exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;

							case '78.2':
							$pid=$_POST['pid'];
							$notes=mysqli_real_escape_string($db, trim($_POST['notes']));
							$notes=$notes.'<br/> Entry Made By:<b>'.$fullname.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date: :<b>'.date('d/m/Y').'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time:<b>'.date('H:i').'</b>';
							
							$resulta =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
							$rowa=mysqli_fetch_array($resulta);
							$resultb = mysqli_query($db, "insert into progress values('0','".$rowa['PrescId']."','".$rowa['PatId']."','".$rowa['PatName']."','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','".$notes."','".date('H:i')."','".$rowa['Id']."','".$rowa['old_in_patient_id']."')");
							
							if($resultb){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates progress notes.Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
							
							echo"
							<script>
							setTimeout(function() {
							$.ajax({
							url:'link.php',
							data:{id:77,pid:".$_POST['pid']."},
							success:function(data){
							$('#mainp').html(data);
							}
							});
							},500);
							</script>";
							
							exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;

				case 79:
		            $dat   = date('Y/m/d');
		            $stamp = date('Ymd');
		            $a     = trim(mysqli_real_escape_string($db, $_GET['a']));
		            $mode  = trim(mysqli_real_escape_string($db, $_GET['madeni606']));
		            $old_patient_id  = trim(mysqli_real_escape_string($db, $_GET['old_patient_id']));
		            $old_consult_id  = trim(mysqli_real_escape_string($db, $_GET['old_consult_id']));
		            $old_request_id  = trim(mysqli_real_escape_string($db, $_GET['old_request_id']));
		            $in_currins_no   = trim(mysqli_real_escape_string($db, $_GET['in_currins_no']));
		            $in_currins_nome = trim(mysqli_real_escape_string($db, $_GET['in_currins_nome']));

		            $question = mysqli_query($db, "SELECT DISTINCT RcptNo FROM sales ORDER BY RcptNo DESC LIMIT 0,1");
		            $ans = mysqli_fetch_array($question);
		            $get_receipt_no = intval($ans['RcptNo']);

		            do {
		                $get_receipt_no += 1;
		                $result4 = mysqli_query($db, "SELECT TransNo FROM sales WHERE RcptNo='" . $get_receipt_no . "' ");
		            } while (mysqli_num_rows($result4) > 0);

		            $rcptno = $get_receipt_no;

		            $un = 'UN-' . $rcptno;
		            $refno = 'R-' . $rcptno;
		            $arr = array();
		            $arr2 = array();

					
				$max=count($_SESSION[$a]);
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
					$iid = $_SESSION[$a][$i][12];
	                if ($a == 'ward') {
	                    $disp = 1;
	                } else {
	                    $disp = 0;
	                }

	                $dept = $categ;
	                $arr[] = $itname;

	                $resultc = mysqli_query($db, "SELECT CatId,ItemCat FROM categories WHERE ItemCat='" . $categ . "' AND Type='SERVICE' ");
	                $rowc = mysqli_fetch_array($resultc);
	                $old_category_id = stripslashes($rowc['CatId']);

	                $resulta = mysqli_query($db, "insert into sales values('','" . $rcptno . "','" . $dept . "','" . $itcode . "','" . $itname . "','" . $itquat . "','" . $itprice . "',0,'" . $disc . "','" . $subn . "',0,'" . $disp . "','" . $dat . "','" . $regn . "','" . $oname . "','','" . $in_currins_no . "','" . $in_currins_nome . "','" . $refno . "','','','" . $mode . "','','','" . $subn . "','" . $stamp . "','','" . $username . "',0,'" . $iid . "','','" . $old_patient_id . "','" . $userid . "','" . $old_category_id . "','','uno','dos','tres','cuatro','cinco','seis')");

	                $last_id = mysqli_insert_id($db);
				
					if($a=='lab'){
						if($max > 0){	
							$request_res =mysqli_query($db, "SELECT * FROM labrequests WHERE Id='".$old_request_id."'");
							$rw=mysqli_fetch_array($request_res);
							$labno=stripslashes($rw['labno']);	
							$presc_no=stripslashes($rw['prescid']);	
							$in_presc_id=stripslashes($rw['old_in_presc_id']);	
							$in_pat_id=stripslashes($rw['old_in_patient_id']);	
							$deptfrom=stripslashes($rw['deptfrom']);	
							$section=stripslashes($rw['section']);	
							$regcategory=stripslashes($rw['regcategory']);	
                        	$resulta = mysqli_query($db, "insert into labrequests values('','" . $labno . "','" . $presc_no . "','" . $regn . "','" . $oname . "','" . $section . "','" . $itname . "','laboratory results','" . date('H:i') . "','','','" . date('d/m/Y') . "','" . date('Ymd') . "','" . $fullname . "','',1,'" . $get_receipt_no . "','0','','','','','', '','','" . $in_presc_id . "','" . $in_pat_id . "','" . $deptfrom . "','" . $last_id . "','" . $regcategory . "')");
						}else{
                        	$resultd = mysqli_query($db, "update labrequests set rcptno='" . $get_receipt_no . "', old_in_sale_id='" . $last_id . "' where patid='" . $regn . "' AND old_in_presc_id='" . $old_consult_id . "' AND stamp='" . date('Ymd') . "' AND paid=0");
						}
                    	$val = implode(";<br>", $arr);
                    	$resultx = mysqli_query($db, "update newprescription set LabTests='" . $val . "',LabTime='" . date('H:i') . "' where Id='" . $old_consult_id . "'");
					}

					if($a=='rad'){
						if($max > 0){
							$request_res =mysqli_query($db, "SELECT * FROM radrequests WHERE id='".$old_request_id."'");
							$rw=mysqli_fetch_array($request_res);
							$radno=stripslashes($rw['radno']);	
							$rad_presc_no=stripslashes($rw['prescid']);	
							$in_presc_id=stripslashes($rw['old_in_presc_id']);	
							$in_pat_id=stripslashes($rw['old_in_patient_id']);	
							$deptfrom=stripslashes($rw['deptfrom']);	
							$section=stripslashes($rw['section']);	
							$regcategory=stripslashes($rw['regcategory']);	
                        	$resulta = mysqli_query($db, "insert into radrequests values('0','" . $radno . "','" . $rad_presc_no . "','" . $regn . "','" . $oname . "','" . $itname . "','ultrasound results','" . date('H:i') . "','','" . date('d/m/Y') . "','" . date('Ymd') . "','" . $fullname . "','',1,'" . $get_receipt_no . "','0','" . $in_presc_id . "','" . $in_pat_id . "','" . $deptfrom . "','" . $last_id . "','" . $section . "','" . $regcategory . "')");						
						
						}else{
                        	$resultd = mysqli_query($db, "update radrequests set rcptno='" . $get_receipt_no . "', old_in_sale_id='" . $last_id . "' where patid='" . $regn . "' AND old_in_presc_id='" . $old_consult_id . "' AND stamp='" . date('Ymd') . "' AND paid=0");
						}
                    	$val = implode(";<br>", $arr);
                    	$resultx = mysqli_query($db, "update newprescription set RadTests='" . $val . "',RadTime='" . date('H:i') . "' where Id='" . $old_consult_id . "'");
					}
				}
	            if ($a == 'ward') {
	                $resultb = mysqli_query($db, "UPDATE tempbill SET status=0 WHERE patid='" . $patid . "'");
	            }
	            if ($a == 'nurse') {
	                $result = mysqli_query($db, "DELETE FROM daycare WHERE patid='" . $regn . "'");
	            }
				
				if($resulta){
					unset($_SESSION[$a]);
					echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					echo"<script>$('#totitems').val('');$('#total').val('');$('#tprice').val('');$('#price44').val('');$('#quat44').val('');$('#disc44').val('');$('#sub44').val('');
						$('#disc44').prop('readonly',true);$('#disc44').css({'border' : 'solid #DC2626 1px'});</script>";
					$query1 = mysqli_query($db, "CALL GetUserLogs('".$username." posts bill from COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."-Rcpt No:".$rcptno."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
					echo"<script>
							$().customAlert();
							alert('Success!', '<p>Bill Posted.</p>');
							</script>";
					exit;
				}else{
					$result = mysqli_query($db, "DELETE from sales where RcptNo='".$rcptno."'");
					echo"<script>
							$().customAlert();
							alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
							e.preventDefault();
							</script>";
				}
				
				break;
				
							case 80:
							$pid=$_GET['pid'];
							$rec=$_GET['rec'];
							$regn=$_GET['regn'];
							$oname=$_GET['oname'];
							$fintot=$_GET['fintot'];
							$amountpaid=$_GET['amountpaid'];
							$instatus=$_GET['instatus'];
							$indep=$_GET['indep'];
							$change=$_GET['bal'];
							$dep=$_GET['dep'];
							if($instatus==1){
							$insid=$_GET['insid'];
							$insname=$_GET['insname'];
							$cardno=$_GET['cardno'];
							$insamount=$_GET['insamount'];
							}else {$insid=NULL;$insname=NULL;$cardno=NULL;$insamount=NULL;}
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							if($rec==1){
							$query =mysqli_query($db, "select * from creditcustomers where CustomerId='".$regn."'");
							$count = mysqli_num_rows($query);
							if($count==0){
								$result = mysqli_query($db, "insert into creditcustomers values('".$regn."','".$oname."','','','','".$date."','','','0')");	
							}
							$resultb =mysqli_query($db, "SELECT * FROM creditcustomers WHERE CustomerId='".$regn."'");
							$row=mysqli_fetch_array($resultb);
							$rcred=stripslashes($row['RemainingCredit']);
							$bal2=stripslashes($row['Bal']);
						
							$bal3=$bal2+abs($change);
							$rcred=$rcred-abs($change);
						$resultc = mysqli_query($db, "insert into customerdebts values('0','".$regn."','".$oname."','".abs($change)."','dr','','','".$bal3."','','Hospital charges on ".$date."','".$date."','".$stamp."',1)");	
						$resultd = mysqli_query($db, "update creditcustomers set Bal='".$bal3."',RemainingCredit='".$rcred."' where CustomerId='".$regn."'");	
						}
							
						$resulta= mysqli_query($db, "update sales set Instatus='".$_GET['instatus']."',Insid='".$_GET['insid']."',Insname='".$_GET['insname']."',CardNo='".$_GET['cardno']."',Insamount='".$_GET['insamount']."',Deposit='".$_GET['dep']."',PayMode='Cash',Total='".$_GET['fintot']."',AmountPaid='".$_GET['amountpaid']."',Balance='".$_GET['bal']."',Cashier='".$fullname."',Status=1 where RcptNo='".$pid."'");
						if($indep==1){
						$resulte= mysqli_query($db, "insert into deposits values('0','".$_GET['oname']."','".$_GET['regn']."','".$_GET['dep']."','dr','".date('Ymd')."','".date('d/m/Y')."','1','".$username."')");
													
						}
						//UPDATE DATABASE -REDUCTION OF STOCK ITEMS
						
						$result =mysqli_query($db, "select * from sales where RcptNo='".$pid."'");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$itcode=stripslashes($row['ItemCode']);
								$categ=stripslashes($row['Category']);
								$qty=stripslashes($row['Qty']);
								$query =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
								$rowq=mysqli_fetch_array($query);
								$bal=stripslashes($rowq[$categ]);
								#$bal=stripslashes($row['MOBILECLINIC']);
								$diff=$bal-$qty;
								$resultb= mysqli_query($db, "update items set ".$categ."='".$diff."' where ItemCode='".$itcode."'  and Type='GOOD'");
							}
						
						
							if($resulta){
								echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
									echo"<script>$('#totitems').val('');$('#total').val('');$('#tprice').val('');$('#price44').val('');$('#quat44').val('');</script>";
										$resultc = mysqli_query($db, "insert into log values('0','".$username." posts payments.Rcpt No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo"
										<script>
										window.open('report.php?id=1&rcptno=".$pid."&&pid=".$regn."');
										$().customAlert();
										alert('Success!', '<p>Payment Posted.</p>');
										setTimeout(function() {
										payments();},500);
										</script>";
										exit;
									}
									else{
										$result = mysqli_query($db, "update sales set Status=0 where RcptNo='".$pid."'");
									echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
										e.preventDefault();
										</script>";
									}
							
							
							
							break;
							
							case 81:
							$result =mysqli_query($db, "select * from patients");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$age=stripslashes($row['age']);
								$pno=stripslashes($row['pntno']);
								$age=$age+1;
								$resultb = mysqli_query($db, "update patients set age='".$age."' where pntno='".$pno."'");
							}
							if($resultb){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." updates age in patients database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo"
										<script>
										$().customAlert();
										alert('Success!', '<p>Ages updated.</p>');
										e.preventDefault();
										</script>";
										
									}
									else{
										echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Please Repeat again.</p>');
										e.preventDefault();
										</script>";
									}
							break;
							case '82':
							$a=$_GET['a'];
							if($a==1){
							$result= mysqli_query($db, "insert into extmedics values('0','".$_GET['acno']."','".$_GET['name']."','".$_GET['add']."','".$_GET['town']."','".$_GET['tel']."','".$_GET['mobile']."','".$_GET['email']."',1)");
							}
							if($a==2){
							$regn=$_GET['regn'];
							$result= mysqli_query($db, "update extmedics set acno='".$_GET['acno']."',name='".$_GET['name']."',address='".$_GET['add']."',town='".$_GET['town']."',tel='".$_GET['tel']."',mobile='".$_GET['mobile']."',email='".$_GET['email']."' where id='".$regn."'");
							}
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." edits External Medics database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
									echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px;width:30px; height:30px"></p>';
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px;width:30px; height:30px"></p>';
										}
							
							break;
							case '83':
							$regn=$_GET['regn'];
							$result = mysqli_query($db, "DELETE from extmedics where id='".$regn."'");
							if($result){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from External Medics database.Id:".$_GET['regn']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px;width:30px; height:30px"></p>';
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px;width:30px; height:30px"></p>';
										}
							break;
case 84:
						$name=$_GET['name'];
							$pass=$_GET['pass'];

							$result = mysqli_query($db, "select * from users  where name='".$name."' and password = sha1('".$pass."')");
							$num_results = mysqli_num_rows($result);
							if($num_results>0){
 							$rowa=mysqli_fetch_array($result);
							$usert=stripslashes($rowa['position']);

							$result =mysqli_query($db, "select * from accesstbl where AccessCode=147");
							 $row=mysqli_fetch_array($result);
							$var=stripslashes($row[$usert]);

							if($var=='YES'){
									$resulta = mysqli_query($db, "insert into log values('0','".$name." authorizes transaction.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								
								echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px;width:30px; height:30px"></p>';
								echo"<script>$('#adname').val('');$('#adpass').val('');
								$('#disc44').prop('readonly',false);$('#disc44').css({'border' : 'solid #10504F 1px'});
$('#disc').prop('readonly',false);$('#disc').css({'border' : 'solid #10504F 1px'});
								$('#credstatus').prop('checked',true);
								$('#creditnote').prop('checked',true);
								$( '#adminauth' ).dialog( 'close' );
								$('#amount76').prop('disabled',false);
								$('#amount76').css({'border' : 'solid #10504F 1px'});</script>";
								}
								else{echo'<p><img alt="Down" src="images/down.jpg" style="margin-top:0px;width:30px; height:30px"></p>';}
							}	else{echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px;width:30px; height:30px"></p>';}
							
							
							break;
							case 85:
							$tid=$_GET['tid'];
							if($usertype=='Accounts'||$usertype=='Admin'){
							$result = mysqli_query($db, "DELETE from sales where TransNo='".$tid."'");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from income database.Record No:".$tid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo"<script>
										$().customAlert();
										alert('Success!', '<p>Delete Succesful.</p>');
										e.preventDefault();
										</script>"	;
							}else{echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Delete not Succesful.You may not be authorized to process this action</p>');
										e.preventDefault();
										</script>";}
							break;
							

		case 87:
			$itcode = intval($_GET['itcode']);
			$bid = trim(mysqli_real_escape_string($db, $_GET['bid']));
			$bname = trim(mysqli_real_escape_string($db, $_GET['bname']));
			$qty = floatval(str_replace(",", "", $_GET['qty']));
			$notes = trim(mysqli_real_escape_string($db, $_GET['notes']));
			$date = date('Y/m/d');
			$stamp = date('Ymd');
			$result = mysqli_query($db, "select * from items where ItemCode='" . $itcode . "'");
			$row = mysqli_fetch_assoc($result);
			if ($bname == 'PROCUREMENT') {
				$branch = 'Bal';
			} else {
				$branch = $bname;
			}
			$bal = floatval(str_replace(",", "", stripslashes($row[$branch])));
			$itname = stripslashes($row['ItemName']);
			$sprice = floatval(str_replace(",", "", stripslashes($row['PurchPrice'])));
			$pack = floatval($row['Pack']);
			$nbal = $bal - $qty;
			$total = $sprice * $qty;

			//insert into stock track
			$resultd = mysqli_query($db, "insert into stocktrack values('0','" . $date . "','" . $bname . "','" . $itcode . "','" . $itname . "','" . $pack . "','STOCK USAGE REGISTER','" . $qty . "','" . $nbal . "','" . $username . "','" . $stamp . "')");

			if ($bname == 'ADMINISTRATION') {
				$resultb = mysqli_query($db, "update items set ADMINISTRATION='" . $nbal . "',Bal='" . $nbal . "',Qissued='" . $issqty . "',Activity='STOCK-USAGE-STORE',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $qty . "',MoreDetail='" . $bname . " STOCK USAGE REGISTER',TransactedBy='" . strtoupper($fullname) . "' where ItemCode='" . $itcode . "'");
			} else if ($bname == 'PHARMACY') {
				$resultb = mysqli_query($db, "update items set PHARMACY='" . $nbal . "',Qopening='" . $nbal . "',Qissued='" . $issqty . "',Activity='STOCK-USAGE-PHARMACY',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $qty . "',MoreDetail='" . $bname . " STOCK USAGE REGISTER',TransactedBy='" . strtoupper($fullname) . "' where ItemCode='" . $itcode . "'");
			} else {
				$resultb = mysqli_query($db, "update items set " . $bname . "='" . $nbal . "',Qissued='" . $issqty . "',Activity='STOCK-USAGE',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $qty . "',MoreDetail='" . $bname . " STOCK USAGE REGISTER',TransactedBy='" . strtoupper($fullname) . "' where ItemCode='" . $itcode . "'");
			}


			#$resultb = mysqli_query($db, "update items set ".$branch."='".$nbal."' where ItemCode='".$itcode."'");
			$resulta = mysqli_query($db, "insert into stockuse values('0','" . $bid . "','" . $bname . "','" . $itcode . "','" . $itname . "','" . $qty . "','" . $notes . "','" . date('d/m/Y') . "','" . date('Ymd') . "','" . $username . "',1)");
			if ($resulta && $resultb) {

				//update ledgers-stock
				$amount = $total;
				$resultb = mysqli_query($db, "select bal from ledgers where ledgerid='630'");
				$rowb = mysqli_fetch_assoc($resultb);
				$inventory_openingbal = floatval($rowb['bal']);
				$inventory_closingbal = $inventory_openingbal - $amount;

				$resultc = mysqli_query($db, "select bal from ledgers where ledgerid='701'");
				$rowc = mysqli_fetch_assoc($resultc);
				$stockusage_openingbal = floatval($rowc['bal']);
				$stockusage_closingbal = $stockusage_openingbal + $amount;

				$resultl = mysqli_query($db, "insert into ledgerentries values('','630','Inventory','701','STOCK USAGE EXPENSE','" . $amount . "','Stock Usage','" . $date . "','" . $inventory_closingbal . "','" . $stockusage_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $inventory_openingbal . "','" . $stockusage_openingbal . "','','','','','','','','','','','','','',null,null,null,'','','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
				$resultm = mysqli_query($db, "update ledgers set bal='" . $inventory_closingbal . "' where ledgerid='630'");
				$resultn = mysqli_query($db, "update ledgers set bal='" . $stockusage_closingbal . "' where ledgerid='701'");
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " makes an entry in the stock usage database.','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				echo "
										<script>
											setTimeout(function() {
										stockusage();},500);
										$().customAlert();
										alert('Success!', '<p>Entry Posted.</p>');
										e.preventDefault();
									</script>";
				exit;
			} else {
				echo "
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Please Try again.</p>');
										e.preventDefault();
										</script>";
				exit;
			}
			break;


		case 88:
			$date = date('d/m/Y');
			$stamp = date('Ymd');
			$transno = $_GET['param'];
			$result = mysqli_query($db, "select * from issuetable where TransNo='" . $transno . "'");
			$row = mysqli_fetch_array($result);
			$qty = stripslashes($row['Qty']);
			$itcode = stripslashes($row['ItemCode']);
			$itname = stripslashes($row['ItemName']);
			$pack = stripslashes($row['Pack']);
			$dep1 = $bname1 = stripslashes($row['Dep1']);
			$dep2 = $bname2 = stripslashes($row['Dep2']);
			$result = mysqli_query($db, "select * from items where ItemCode='" . $itcode . "'");
			$row = mysqli_fetch_array($result);
			$transqty = stripslashes($row['Qt']);
			$a = stripslashes($row[$dep1]);
			$b = stripslashes($row[$dep2]);
			$a = $a + $qty;
			$b = $b - $qty;

			$tqty = $transqty + $qty;

			if ($b < 0) {
				echo "<script>		
										$().customAlert();
										alert('Failed!', '<p>Balance of this item is not enough for transfer.</p>');
										e.preventDefault();
										</script>";
				exit;
			}

			//insert into stock track
			$resultd = mysqli_query($db, "insert into stocktrack values('0','" . date('Y/m/d') . "','" . $bname1 . "','" . $itcode . "','" . $itname . "','" . $pack . "','STOCK TRANSFER FROM " . $bname2 . "','" . $qty . "','" . $a . "','" . $username . "','" . $stamp . "')");

			$resulte = mysqli_query($db, "insert into stocktrack values('0','" . date('Y/m/d') . "','" . $bname2 . "','" . $itcode . "','" . $itname . "','" . $pack . "','STOCK TRANSFER TO " . $bname1 . "','" . $qty . "','" . $b . "','" . $username . "','" . $stamp . "')");


			if ($dep1 == 'PHARMACY' && $dep2 == 'ADMINISTRATION') {
				$resultb = mysqli_query($db, "update items set " . $dep1 . "='" . $a . "'," . $dep2 . "='" . $b . "',Qopening='" . $a . "',Qt='" . $tqty . "',Bal='" . $b . "',Quantity='" . $qty . "',MoreDetail='STOCK TRANSFER FROM " . $bname2 . " TO " . $bname1 . "',TransactedBy='" . $fullname . "',Activity='TRANSFERED',TransDate='" . date('Y/m/d') . "',TranStamp='" . $stamp . "',TimeStamp='" . date('YmdHi') . "' where ItemCode='" . $itcode . "'");
			} else {
				$resultb = mysqli_query($db, "update items set " . $dep1 . "='" . $a . "'," . $dep2 . "='" . $b . "',Quantity='" . $qty . "',Qt='" . $tqty . "',MoreDetail='STOCK TRANSFER FROM " . $bname2 . " TO " . $bname1 . "',TransactedBy='" . $fullname . "',Activity='TRANSFERED',TransDate='" . date('Y/m/d') . "',TranStamp='" . $stamp . "',TimeStamp='" . date('YmdHi') . "' where ItemCode='" . $itcode . "'");
			}

			if ($resultb) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " transfers item No:" . $itcode . ", Trans No:" . $transno . ".','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				$resultc = mysqli_query($db, "update issuetable set Status=2,Issued='" . $username . "',TransDate='" . $date . "',Stamp='" . $stamp . "' where TransNo='" . $transno . "'");
				echo "<script>$('#normal' + " . $transno . ").html('');</script>";
			}
		break;

		case 89:
			$transno = intval($_GET['param']);
			$resultc = mysqli_query($db, "update issuetable set Status=0  where TransNo='" . $transno . "'");
			$resulta = mysqli_query($db, "insert into log values('0','" . $username . " revokes stock transfer, Trans No:" . $transno . ".','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
		break;

		case 90:
			$stamp = date('Ymd');
			$question = mysqli_query($db, "SELECT gnrno FROM goodsreturned ORDER BY id DESC LIMIT 0,1");
			$ans = mysqli_fetch_assoc($question);
			$rcptno = intval($ans['gnrno']);
			do {
				$rcptno += 1;
				$result4 = mysqli_query($db, "SELECT id FROM goodsreturned WHERE gnrno='" . $rcptno . "' ");
			} while (mysqli_num_rows($result4) > 0);

			$rcpt_uid = guidv4();
			$fintot = floatval(str_replace(",", "", $_GET['fintot']));
			$totalsale = 0;
			$max = count($_SESSION['ret']);
			for ($i = 0; $i < $max; $i++) {
				$code = $_SESSION['ret'][$i][0];
				$name = $_SESSION['ret'][$i][1];
				$unit = $_SESSION['ret'][$i][2];
				$part = $_SESSION['ret'][$i][3];
				$pprice = floatval(str_replace(",", "", $_SESSION['ret'][$i][4]));
				$date = $_SESSION['ret'][$i][5];
				$total = floatval(str_replace(",", "", $_SESSION['ret'][$i][6]));
				$sname = $_SESSION['ret'][$i][7];
				$batch = $_SESSION['ret'][$i][8];
				$invoice = $_SESSION['ret'][$i][9];
				$expiry = $_SESSION['ret'][$i][10];
				$lpo = $_SESSION['ret'][$i][11];
				$reason = $_SESSION['ret'][$i][12];
				$pack = $_SESSION['ret'][$i][13];
				$bal = floatval(str_replace(",", "", $_SESSION['ret'][$i][14]));
				$qty = floatval(str_replace(",", "", $_SESSION['ret'][$i][15]));
				$totalsale += floatval(str_replace(",", "", $_SESSION['ret'][$i][16]));
				$sid = $_SESSION['ret'][$i][17];
				$diff = $bal - $qty;

				//insert into stock track
				$resultd = mysqli_query($db, "insert into stocktrack values('','" . date('Y/m/d') . "','ADMINISTRATION','" . $code . "','" . $name . "','" . $pack . "','GOODS RETURNED-" . $sname . "','" . $qty . "','" . $diff . "','" . $username . "','" . $stamp . "')");
				$resultb = mysqli_query($db, "update items set ADMINISTRATION='" . $diff . "',Qret='" . $qty . "',Bal='" . $diff . "',Activity='GOODS RETURNED OUTWARDS',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $qty . "',MoreDetail='GOODS RETURNED OUTWARDS-" . $sname . "',TransactedBy='" . $fullname . "' where ItemCode='" . $code . "'");
				$resulta = mysqli_query($db, "insert into goodsreturned values('','" . $rcptno . "','" . $code . "','" . $name . "','" . $unit . "','" . $part . "','" . $pprice . "','" . $date . "','" . $total . "','" . $sname . "','" . $batch . "','" . $invoice . "','" . $expiry . "','" . $lpo . "','" . $reason . "','" . $pack . "','" . date('Ymd') . "','" . $username . "',1,'" . $totalsale . "')");

				$resultb = mysqli_query($db, "select bal from ledgers where ledgerid=630 ");
				$rowb = mysqli_fetch_assoc($resultb);
				$inv_openingbal = floatval($rowb['bal']);
				$inv_closingbal = $inv_openingbal - $total;

				$resultc = mysqli_query($db, "select bal from ledgers where ledgerid=651 ");
				$rowc = mysqli_fetch_assoc($resultc);
				$gro_openingbal = floatval($rowc['bal']);
				$gro_closingbal = $gro_openingbal + $total;

				$resultl = mysqli_query($db, "insert into ledgerentries values('','630','Inventory','651','Goods Returned Outwards','" . $total . "','Goods Returned Outwards','" . $date . "','" . $inv_closingbal . "','" . $gro_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $inv_openingbal . "','" . $gro_openingbal . "','supplier',null,'" . $sname . "',null,'return_goods_outwards','" . $rcpt_uid . "','" . $invoice . "','','','','','','','" . $name . "',null,'" . $code . "','ADMINISTRATION','','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
				$resultm = mysqli_query($db, "update ledgers set bal='" . $inv_closingbal . "' where ledgerid=630 ");
				$resultn = mysqli_query($db, "update ledgers set bal='" . $gro_closingbal . "' where ledgerid=651 ");

				//update ledgers-acs/payable
				$total = $fintot;
				$resultb = mysqli_query($db, "select bal from ledgers where ledgerid=629 ");
				$rowb = mysqli_fetch_assoc($resultb);
				$acntspayable_openingbal = floatval($rowb['bal']);
				$acntspayable_closingbal = $acntspayable_openingbal - $total;

				$resultc = mysqli_query($db, "select bal from ledgers where ledgerid=644 ");
				$rowc = mysqli_fetch_assoc($resultc);
				$cogs_openingbal = floatval($rowc['bal']);
				$cogs_closingbal = $cogs_openingbal - $total;

				$resultl = mysqli_query($db, "insert into ledgerentries values('','644','Cost of Goods Sold','629','Accounts Payable','" . $total . "','Goods Returned Outwards','" . $date . "','" . $cogs_closingbal . "','" . $acntspayable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $cogs_openingbal . "','" . $acntspayable_openingbal . "','supplier',null,'" . $sname . "',null,'return_goods_outwards','" . $rcpt_uid . "','" . $invoice . "','','','','','','','" . $name . "',null,'" . $code . "','ADMINISTRATION','','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
				$resultm = mysqli_query($db, "update ledgers set bal='" . $acntspayable_closingbal . "' where ledgerid=629 ");
				$resultn = mysqli_query($db, "update ledgers set bal='" . $cogs_closingbal . "' where ledgerid=644 ");
			}

			if ($resulta && $resultb) {
				$resulta = mysqli_query($db, "insert into log values('','" . $username . " returns goods. Rcpt No." . $rcptno . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

				$amount = $totalsale;
				// $resultb = mysqli_query($db, "select bal from ledgers where ledgerid=630 ");
				// $rowb = mysqli_fetch_assoc($resultb);
				// $inv_openingbal = floatval($rowb['bal']);
				// $inv_closingbal = $inv_openingbal - $amount;

				// $resultc = mysqli_query($db, "select bal from ledgers where ledgerid=651 ");
				// $rowc = mysqli_fetch_assoc($resultc);
				// $gro_openingbal = floatval($rowc['bal']);
				// $gro_closingbal = $gro_openingbal + $amount;

				// $resultl = mysqli_query($db, "insert into ledgerentries values('','630','Inventory','651','Goods Returned Outwards','" . $amount . "','Goods Returned Outwards','" . $date . "','" . $inv_closingbal . "','" . $gro_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','". $inv_openingbal. "','" . $gro_openingbal . "','','','','','','','','','','','','','',null,null,null,'','',null,'0','0','','',null)");
				// $resultm = mysqli_query($db, "update ledgers set bal='" . $inv_closingbal . "' where ledgerid=630 ");
				// $resultn = mysqli_query($db, "update ledgers set bal='" . $gro_closingbal . "' where ledgerid=651 ");

				$amount = $fintot;
				// $resultb = mysqli_query($db, "select bal from ledgers where ledgerid=629 ");
				// $rowb = mysqli_fetch_assoc($resultb);
				// $acntspayable_openingbal = floatval($rowb['bal']);
				// $acntspayable_closingbal = $acntspayable_openingbal - $amount;

				// $resultc = mysqli_query($db, "select bal from ledgers where ledgerid=644 ");
				// $rowc = mysqli_fetch_assoc($resultc);
				// $cogs_openingbal = floatval($rowc['bal']);
				// $cogs_closingbal = $cogs_openingbal - $amount;

				// $resultl = mysqli_query($db, "insert into ledgerentries values('','644','Cost of Goods Sold','629','Accounts Payable','" . $amount . "','Goods Returned Outwards','" . $date . "','" . $cogs_closingbal . "','" . $acntspayable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','". $cogs_openingbal. "','" . $acntspayable_openingbal . "','','','','','','','','','','','','','',null,null,null,'','','" . $username . "','0','0','','',null)");
				// $resultm = mysqli_query($db, "update ledgers set bal='" . $acntspayable_closingbal . "' where ledgerid=629 ");
				// $resultn = mysqli_query($db, "update ledgers set bal='" . $cogs_closingbal . "' where ledgerid=644 ");

				//post credit note
				$resultc = mysqli_query($db, "SELECT * FROM creditsuppliers WHERE CustomerId='" . $sid . "'");
				$rowc = mysqli_fetch_assoc($resultc);
				$bal2 = floatval($rowc['Bal']);
				$bal3 = $bal2 - $amount;
				$resulta = mysqli_query($db, "insert into supplierdebts values('','" . $sid . "','" . $sname . "','" . $invoice . "','" . $rcptno . "','" . $amount . "','cr','0','" . $bal3 . "','" . $bal3 . "','Purchases','" . date('d/m/Y') . "','" . $stamp . "',1,null,'" . $rcpt_uid . "',null,null,'629','Accounts Payable','" . $username . "')");
				$resultn = mysqli_query($db, "update creditsuppliers set Bal='" . $bal3 . "' where CustomerId='" . $sid . "'");


				unset($_SESSION['ret']);
				echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
				echo "<script>		
										window.open('report.php?id=51&rcptno=" . $rcptno . "');
										setTimeout(function() {
											returnout();},500);
										$().customAlert();
										alert('Success!', '<p>Transaction Successful.</p>');
										e.preventDefault();
										</script>";
				exit;
			} else {
				echo "
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
										e.preventDefault();
										</script>";
			}

			break;

		case 91:
			$stamp = date('Ymd');

			//get receipt no
			$question = mysqli_query($db, "SELECT * FROM lpo order by id desc limit 0,1");
			$ans = mysqli_fetch_array($question);
			$rcptno = intval($ans['lpono']) + 1;


			$max = count($_SESSION['lpo']);
			for ($i = 0; $i < $max; $i++) {
				$code = $_SESSION['lpo'][$i][0];
				$name = $_SESSION['lpo'][$i][1];
				$unit = $_SESSION['lpo'][$i][2];
				$part = $_SESSION['lpo'][$i][3];
				$pprice = $_SESSION['lpo'][$i][4];
				$date = $_SESSION['lpo'][$i][5];
				$total = $_SESSION['lpo'][$i][6];
				$sname = $_SESSION['lpo'][$i][7];
				$pack = $_SESSION['lpo'][$i][8];

				$resulta = mysqli_query($db, "insert into lpo values('0','" . $rcptno . "','" . $sname . "','" . $date . "','" . $name . "','" . $pack . "','" . $unit . "','" . $part . "','" . $pprice . "','" . $total . "','" . date('Ymd') . "','" . $username . "',1)");
			}
			if ($resulta) {
				$resulta = mysqli_query($db, "insert into log values('0','" . $username . " prepares lpo.Rcpt No." . $rcptno . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				unset($_SESSION['lpo']);
				echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
				echo "<script>		
										window.open('report.php?id=52&rcptno=" . $rcptno . "');
										setTimeout(function() {
											lpo();},500);
										$().customAlert();
										alert('Success!', '<p>Transaction Successful.</p>');
										e.preventDefault();
										</script>";
				exit;
			} else {
				echo "
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
										e.preventDefault();
										</script>";
			}

			break;


		case 92:
			if (isset($_GET['nbal']) && isset($_GET['total']) && isset($_GET['lid']) && isset($_GET['lname']) && isset($_GET['refno'])) {
				$nbal = floatval(str_replace(",", "", $_GET['nbal']));
				$total = floatval(str_replace(",", "", $_GET['total']));
				$lid = intval($_GET['lid']);
				$lname = trim(mysqli_real_escape_string($db, $_GET['lname']));
				$refno = trim(mysqli_real_escape_string($db, $_GET['refno']));
				$paymode = trim(mysqli_real_escape_string($db, $_GET['paymode']));
				$cid1 = intval($_GET['cid1']);
				$cid1name = trim(mysqli_real_escape_string($db, $_GET['cid1name']));
				$stamp = date('Ymd');
				$date = date('Y/m/d');
				$totinv = '';

				if ($lid == 0) {
					die("<script>$().customAlert();alert('Error', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
				} else if ($cid1 == 0) {
					die("<script>$().customAlert();alert('Error', '<p>Please select a debtor. </p>');e.preventDefault();</script>");
				}

				$rcpt_uid = guidv4();
				$max = count($_SESSION['credinvoice']);
				if ($max > 0 && $total > 0) {
					$resultK = mysqli_query($db, "SELECT CustomerName,AccountReceivableLedgerID,IncomeAccountLedgerID FROM creditcustomers WHERE CustomerId='" . $cid1 . "' LIMIT 0,1 ");
					if (mysqli_num_rows($resultK) > 0) {
						$rowK = mysqli_fetch_assoc($resultK);
						$AccountReceivableLedgerID = intval($rowK['AccountReceivableLedgerID']);
						$creditCustomerName = trim(stripslashes($rowK['CustomerName']));

						@mysqli_query($db, "UPDATE creditcustomers SET Bal='" . $nbal . "' WHERE CustomerId='" . $cid1 . "'");
						if ($AccountReceivableLedgerID > 0) {
							@mysqli_query($db, "INSERT INTO debtreceipts VALUES('','" . $cid1 . "','" . $creditCustomerName . "','" . $total . "','" . $totinv . "','" . $nbal . "','" . date('Y/m/d') . "','" . date('Ymd') . "','" . $username . "',1,'" . $refno . "','" . $rcpt_uid . "','" .$paymode. "','" . $lid . "','" . $lname . "','uno','dos','tres','cuatro','cinco','seis')");
							$rcptno = mysqli_insert_id($db);

							foreach ($_SESSION['credinvoice'] as $i => $val) {
								$code = trim(mysqli_real_escape_string($db, $_SESSION['credinvoice'][$i][0]));
								$amount = floatval(str_replace(",", "", $_SESSION['credinvoice'][$i][1]));
								$cid = intval($_SESSION['credinvoice'][$i][2]);
								if ($cid1 !== $cid) {
									die("<script>$().customAlert();alert('Error', '<p>There was an error while processing request. </p>');e.preventDefault();</script>");
								}
								$cname = trim(mysqli_real_escape_string($db, $_SESSION['credinvoice'][$i][3]));
								$invref = trim(mysqli_real_escape_string($db, $_SESSION['credinvoice'][$i][9]));
								$invno = trim(mysqli_real_escape_string($db, $_SESSION['credinvoice'][$i][4]));
								$totinv .= $invno . ';';
								$bal = floatval(str_replace(",", "", $_SESSION['credinvoice'][$i][5]));
								$paying = floatval(str_replace(",", "", $_SESSION['credinvoice'][$i][6]));
								$invbal = floatval(str_replace(",", "", $_SESSION['credinvoice'][$i][7]));
								$paid = floatval(str_replace(",", "", $_SESSION['credinvoice'][$i][8]));
								$sbal = $amount - $paying;
								$npaid = $paid + $paying;
								$ninvbal = $invbal - $paying;

								$resultK = mysqli_query($db, "SELECT AccountReceivableLedgerID,IncomeAccountLedgerID FROM creditcustomers WHERE CustomerId='" . $cid . "' LIMIT 0,1 ");
								$rowK = mysqli_fetch_assoc($resultK);
								$AccountReceivableLedgerID2 = intval($rowK['AccountReceivableLedgerID']);
								$IncomeAccountLedgerID2 = intval($rowK['IncomeAccountLedgerID']);

								$resultvc = mysqli_query($db, "SELECT TransNo,PatId,PatName,old_patient_id FROM customerdebts WHERE TransNo='" . $code . "' LIMIT 0,1 ");
								$rowvc = mysqli_fetch_assoc($resultvc);
								$patid = trim(stripslashes($rowvc['PatId']));
								$patname = trim(stripslashes($rowvc['PatName']));
								$in_patient_id = trim(stripslashes($rowvc['old_patient_id']));

								$resulta = mysqli_query($db, "INSERT INTO customerdebts VALUES('','" . $cid . "','" . $cname . "','" . $invno . "','" . $paying . "','cr','" . $npaid . "','" . $ninvbal . "','" . $bal . "','Debtor payment for invoice No: " . $invno . " payment reference No: " . $refno . "','" . date('Y/m/d') . "','" . date('Ymd') . "',1,'" . $patid . "','" . $patname . "','" . $in_patient_id . "','" . $AccountReceivableLedgerID2 . "',NULL,'" . $IncomeAccountLedgerID2 . "',NULL,'" . $rcpt_uid . "','" . $username . "','" . $refno . "','" . $lid . "','" . $lname . "','uno','dos','tres','cuatro','cinco','seis')");
								$rcpt_id = mysqli_insert_id($db);
								$resultb = mysqli_query($db, "UPDATE customerdebts SET InvBal='" . $ninvbal . "',Paid='" . $npaid . "' WHERE TransNo='" . $code . "' ");
								if ($ninvbal == 0) {
									@mysqli_query($db, "UPDATE customerdebts SET `Status`=2 WHERE TransNo='" . $code . "'");
								}
								$resultf = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid='" . $AccountReceivableLedgerID2 . "'  LIMIT 0,1 ");
								$rowf = mysqli_fetch_assoc($resultf);
								$receivable_openingbal = floatval($rowf['bal']);
								$receivable_ledgername = trim(stripslashes($rowf['name']));
								$receivable_closingbal = $receivable_openingbal - $paying;

								$resultg = mysqli_query($db, "SELECT bal,category FROM ledgers WHERE ledgerid='" . $lid . "' LIMIT 0,1  ");
								$rowg = mysqli_fetch_assoc($resultg);
								$debtor_paymode = trim(stripslashes($rowg['category']));
								$bank_openingbal = floatval($rowg['bal']);
								$bank_closingbal = $bank_openingbal + $paying;

								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $AccountReceivableLedgerID2 . "','" . $receivable_ledgername . "','" . $lid . "','" . $lname . "','" . $paying . "','" . $creditCustomerName . ": Payment Received.','" . $date . "','" . $receivable_closingbal . "','" . $bank_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $receivable_openingbal . "','" . $bank_openingbal . "','patient','" . $patid . "','" . $patname . "',null,'receive_debtor_payment','" . $rcpt_uid . "','" . $invref . "','" . $refno . "',1,'" . $cid . "','" . $cname . "','','',null,'" . $invno . "',null,null,'" . $debtor_paymode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $receivable_closingbal . "' WHERE ledgerid='" . $AccountReceivableLedgerID2 . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $bank_closingbal . "' WHERE ledgerid='" . $lid . "' ");
							}

							// MOVED INSIDE FOREACH
							// $resultf = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid='" . $AccountReceivableLedgerID . "' ");
							// $rowf = mysqli_fetch_assoc($resultf);
							// $receivable_openingbal = floatval($rowf['bal']);
							// $receivable_ledgername = trim(stripslashes($rowf['name']));
							// $receivable_closingbal = $receivable_openingbal - $total;

							// $resultg = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid='" . $lid . "' ");
							// $rowg = mysqli_fetch_assoc($resultg);
							// $bank_openingbal = floatval($rowg['bal']);
							// $bank_closingbal = $bank_openingbal + $total;

							// @mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $AccountReceivableLedgerID . "','" . $receivable_ledgername . "','" . $lid . "','" . $lname . "','" . $total . "','" . $creditCustomerName . ": Payment Received.','" . $date . "','" . $receivable_closingbal . "','" . $bank_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $receivable_openingbal . "','" . $bank_openingbal . "','debtor','" . $cid1 . "','" . $creditCustomerName . "',null,'receive_debtor_payment','" . $rcpt_uid . "',null,'" . $refno . "',1,'" . $cid1 . "','" . $creditCustomerName . "','','',null,null,null,null,'Bank','" . $username . "','0','0','','',null)");
							// @mysqli_query($db, "UPDATE ledgers SET bal='" . $receivable_closingbal . "' WHERE ledgerid='" . $AccountReceivableLedgerID . "' ");
							// @mysqli_query($db, "UPDATE ledgers SET bal='" . $bank_closingbal . "' WHERE ledgerid='" . $lid . "' ");

							@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Receives debtor payment, " . $creditCustomerName . ". Ref: " . $refno . " Receipt Id. " . $rcpt_uid . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
							unset($_SESSION['credinvoice']);
							echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
							echo "<script>window.open('output.php?id=18&rcptno=" . $rcptno . "');</script>";
							echo "<script>	$('#total').val('');	$('#bal').val('');
																$().customAlert();
																alert('Success', '<p>Transaction Successful.</p>');
																	$.ajax({
																	url:'./link.php',
																	data:{id:22,cus:'" . $cid1 . "'},
																	success:function(data){
																	$('#display').html(data);
																	}
																});
																</script>";
							exit;
						} else {
							die("<script>$().customAlert();alert('Error', '<p>Error. </p>');e.preventDefault();</script>");
						}
					} else {
						die("<script>$().customAlert();alert('Error', '<p>Debtor account receivable ledger not found. </p>');e.preventDefault();</script>");
					}
				} else {
					die("<script>$().customAlert();alert('Error', '<p>Transaction failed.Please repeat the transaction.</p>');e.preventDefault();</script>");
				}
			} else {
				die("<script>$().customAlert();alert('Error', '<p>Bad Request.</p>');e.preventDefault();</script>");
			}

			break;
		case 93:
			if (isset($_GET['category']) && isset($_GET['old_patient_id']) && isset($_GET['old_category_id'])) {

				$category         = trim(mysqli_real_escape_string($db, $_GET['category']));
				$in_trans_date    = trim(mysqli_real_escape_string($db, $_GET['in_trans_date']));
				$old_patient_id   = trim(mysqli_real_escape_string($db, $_GET['old_patient_id']));
				$old_category_id  = trim(mysqli_real_escape_string($db, ($_GET['old_category_id'])));
				$ipd_presc_id     = trim(mysqli_real_escape_string($db, ($_GET['ipd_ref_no'])));
				$ipd_cash_paymode = trim(mysqli_real_escape_string($db, ($_GET['ipd_pay_mode'])));

				$resultCash = mysqli_query($db, "SELECT `ledgerid`,`name` FROM `ledgers` WHERE `name`='" . mysqli_real_escape_string($db, $username) . "' LIMIT 0,1 ");
				if (mysqli_num_rows($resultCash) > 0) {
					$row = mysqli_fetch_assoc($resultCash);
					$cashacc = intval($row['ledgerid']);
					$cashname = stripslashes($row['name']);
				} else {
					$newIdResult = mysqli_query($db, "SELECT `ledgerid` FROM `ledgers` ORDER BY `ledgerid` DESC LIMIT 0,1 ");
					$rowNewId = mysqli_fetch_assoc($newIdResult);
					$new_ledgerid = intval($rowNewId['ledgerid']);
					do {
						$new_ledgerid += 1;
						$result4 = mysqli_query($db, "SELECT id FROM ledgers WHERE ledgerid='" . $new_ledgerid . "' ");
					} while (mysqli_num_rows($result4) > 0);
					@mysqli_query($db, "INSERT INTO ledgers VALUES('','" . $new_ledgerid . "','" . mysqli_real_escape_string($db, $username) . "','Asset','0',1,'" . date('d/m/Y') . "','Cashier',1,'626',0,null,null,'" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "','" . $username . "','uno','dos','tres','cuatro','cinco','seis')");
					if (mysqli_affected_rows($db) > 0) {
						$cashacc = $new_ledgerid;
						$cashname = $username;
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px"></p>');
					}
				}

				$resulta = mysqli_query($db, "select `name` from users where position='ChiefCashier' limit 0,1");
				if (mysqli_num_rows($resulta) > 0) {
					$rowa = mysqli_fetch_assoc($resulta);
					$chiefcashier = trim(stripslashes($rowa['name']));
				} else {
					$chiefcashier = '';
				}

				$credo = trim(mysqli_real_escape_string($db, $_GET['credit']));
				$stamp = date('Ymd');
				$date = date('Y/m/d');
				$totmode = '';
				$max = count($_SESSION['pay']);

				do {
					$rcpt_uid = guidv4();
					$result4 = mysqli_query($db, "SELECT id FROM receipts WHERE rcpt_uid='" . $rcpt_uid . "' LIMIT 0,1 ");
				} while (mysqli_num_rows($result4) > 0);

				for ($i = 0; $i < $max; $i++) {
					$patid = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][0]));
					$patname = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][1]));
					$rcptno = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][2]));
					$mode = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][3]));
					$cid = intval($_SESSION['pay'][$i][4]);
					$cname = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][5]));
					$amount = floatval(preg_replace('~,~', '', trim($_SESSION['pay'][$i][7])));
					$rcvpayref76 = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][6]));
					$totalbill = floatval(preg_replace('~,~', '', trim($_SESSION['pay'][$i][8])));
					$cardno = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][9]));
					$bankacc_id = intval($_SESSION['pay'][$i][10]);
					$bankacc_name = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][11]));
					$rcv_copayment = trim(mysqli_real_escape_string($db, $_SESSION['pay'][$i][12]));
					$totmode .= $mode . ';';

					$resultPat = mysqli_query($db, "SELECT `insid`,`insurer`,`cardno` FROM `patients` WHERE `pntno`='" . $patid . "' AND `auto`='" . $old_patient_id . "' LIMIT 0,1 ");
					$rowPat = mysqli_fetch_assoc($resultPat);
					$insid = intval($rowPat['insid']);
					$insurer = trim(stripslashes($rowPat['insurer']));
					$insurer_cardno = trim(stripslashes($rowPat['cardno']));

					if ($mode == 'Bank' && $bankacc_id == 0) {
						$bankacc_id = 859;
						$bankacc_name = 'STANDARD CHATTERED BANK';
						//die("<script type='text/javascript'>$().customAlert();alert('Error', '<p>Please select a valid bank. </p>');e.preventDefault();</script>");
					}

					$hasInsurance = 0;
					$isCopay = 0;
					if ($mode == 'Companies') {
						$hasInsurance = 1;
						$isCopay = 0;
						if ($cid == 14) {
							$isCopay = 1;
						} else {
							$rcv_copayment = '';
							$resultCheck = mysqli_query($db, "SELECT `IncomeAccountLedgerID` FROM `ledgers` WHERE `ledgerid`='" . $cid . "' LIMIT 0,1 ");
							$rowCheck = mysqli_fetch_assoc($resultCheck);
							if (intval($rowCheck['IncomeAccountLedgerID']) == 0) {
								die("<script type='text/javascript'>$().customAlert();alert('Error', '<p>Transaction failed, company income ledger not found. </p>');e.preventDefault();</script>");
							}
						}
					}



					if ($mode == 'Companies' || $mode == 'Cash') {
						$resultp = mysqli_query($db, "INSERT INTO receipts VALUES('','" . $date . "','" . $patid . "','" . $patname . "','" . $rcptno . "','" . $mode . "','" . $cid . "','" . $cname . "','" . $cardno . "','" . $amount . "','" . $stamp . "',1,'" . $username . "','','" . $category . "','" . date('Hi') . "','" . $stamp . "" . date('Hi') . "','" . $old_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "','" . $rcvpayref76 . "','" . $cashacc . "','" . $cashname . "','" . $hasInsurance . "','" . $isCopay . "',null,null,null,'" . $rcv_copayment . "','','','',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");

						$resultp = mysqli_query($db, "INSERT INTO tblreceipts VALUES('','" . $date . "','" . $patid . "','" . $patname . "','" . $rcptno . "','','','" . $mode . "','" . $cid . "','" . $cname . "','" . $cardno . "','" . $amount . "','" . $stamp . "',1,'" . $username . "','','" . $category . "','" . date('Hi') . "','" . $stamp . "" . date('Hi') . "','" . $old_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "','" . $rcvpayref76 . "','" . $cashacc . "','" . $cashname . "','" . $hasInsurance . "','" . $isCopay . "',null,null,null,'" . $rcv_copayment . "','','','',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");
					} else {
						$resultp = mysqli_query($db, "INSERT INTO receipts VALUES('','" . $date . "','" . $patid . "','" . $patname . "','" . $rcptno . "','" . $mode . "','" . $cid . "','" . $cname . "','" . $cardno . "','" . $amount . "','" . $stamp . "',1,'" . $username . "','','" . $category . "','" . date('Hi') . "','" . $stamp . "" . date('Hi') . "','" . $old_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "','" . $rcvpayref76 . "','" . $cashacc . "','" . $cashname . "','" . $hasInsurance . "','" . $isCopay . "',null,null,null,'" . $rcv_copayment . "','','','',null,'" . $bankacc_id . "','" . $bankacc_name . "','uno','dos','tres','cuatro','cinco','seis')");

						$resultp = mysqli_query($db, "INSERT INTO tblreceipts VALUES('','" . $date . "','" . $patid . "','" . $patname . "','" . $rcptno . "','','','" . $mode . "','" . $cid . "','" . $cname . "','" . $cardno . "','" . $amount . "','" . $stamp . "',1,'" . $username . "','','" . $category . "','" . date('Hi') . "','" . $stamp . "" . date('Hi') . "','" . $old_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "','" . $rcvpayref76 . "','" . $cashacc . "','" . $cashname . "','" . $hasInsurance . "','" . $isCopay . "',null,null,null,'" . $rcv_copayment . "','','','',null,'" . $bankacc_id . "','" . $bankacc_name . "','uno','dos','tres','cuatro','cinco','seis')");
					}

					if ($mode == 'Cash') {
						$departmentalLedgerEntryResult = mysqli_query($db, "SELECT `TransNo`,`Category`,`ItemCode`,`ItemName`,`TotalPrice`,`AmountPaid`,`Balance` FROM `sales` WHERE `ClientId`='" . $patid . "' AND `Balance`>0 AND `RcptNo`='" . $rcptno . "' ");
						if (mysqli_num_rows($departmentalLedgerEntryResult) > 0) {
							$departmentalTotal = 0;
							while ($row = mysqli_fetch_assoc($departmentalLedgerEntryResult)) {
								$actualdepartmentName = trim(stripslashes($row['Category']));
								$departmentItemName = trim(stripslashes($row['ItemName']));
								$departmentItemCode = intval($row['ItemCode']);
								$departmentItemBal = floatval(preg_replace('~,~', '', stripslashes($row['Balance'])));
								if ($amt_paidby_patient >= $departmentItemBal) {
									$departmentAmt = $departmentItemBal;
									$newDepartmentItemBal = 0;
									$amt_paidby_patient = floatval($amt_paidby_patient) - floatval($departmentItemBal);
									$departmentItemStatus = 1;
								} else {
									$departmentAmt = $amt_paidby_patient;
									$newDepartmentItemBal = floatval($departmentItemBal) - floatval($amt_paidby_patient);
									$amt_paidby_patient = 0;
									$departmentItemStatus = 0;
								}
								$departmentalTotal += $departmentAmt;
								$newDepartmentItemAmtPaid = floatval(preg_replace('~,~', '', stripslashes($row['AmountPaid']))) + $departmentAmt;
								@mysqli_query($db, "UPDATE `sales` SET `AmountPaid`='" . $newDepartmentItemAmtPaid . "',`Balance`='" . $newDepartmentItemBal . "',`Status`='" . $departmentItemStatus . "' WHERE `TransNo`='" . intval($row['TransNo']) . "'");
								$resultbCash = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cashacc . "' LIMIT 0,1");
								$rowbCash = mysqli_fetch_assoc($resultbCash);
								$opening_cashbal3 = floatval($rowbCash['bal']);
								$closing_cashbal3 = $opening_cashbal3 + $departmentAmt;
								$resultDepartmentalIncome = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $actualdepartmentName . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultDepartmentalIncome) > 0) {
									$rowzDInc3 = mysqli_fetch_assoc($resultDepartmentalIncome);
									$opening_incomebalD3 = floatval($rowzDInc3['bal']);
									$incomeAccIdD3 = intval($rowzDInc3['ledgerid']);
									$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
									$incomeAccNameD3 = $actualdepartmentName;
								} else {
									$resultDepartmentalIncome = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
									$rowzDInc3 = mysqli_fetch_assoc($resultDepartmentalIncome);
									$opening_incomebalD3 = floatval($rowzDInc3['bal']);
									$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
									$incomeAccIdD3 = 635;
									$incomeAccNameD3 = 'Income';
								}
								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccIdD3 . "','" . $incomeAccNameD3 . "','" . $cashacc . "','" . $cashname . "','" . $departmentAmt . "','" . $departmentItemName . ": Cash Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebalD3 . "','" . $closing_cashbal3 . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebalD3 . "','" . $opening_cashbal3 . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','','',null,1,'" . $rcv_copayment . "',null,'" . $departmentItemCode . "','" . $actualdepartmentName . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebalD3 . "' WHERE ledgerid='" . $incomeAccIdD3 . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_cashbal3 . "' WHERE ledgerid='" . $cashacc . "'");
							}
							if ($departmentalTotal < $amount) {
								$departmentalBalAmt = floatval($amount) - floatval($departmentalTotal);
								$resultb = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cashacc . "' LIMIT 0,1");
								$rowb = mysqli_fetch_assoc($resultb);
								$opening_cashbal = floatval($rowb['bal']);
								$cashbal = $opening_cashbal + $departmentalBalAmt;

								$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultz) > 0) {
									$rowz = mysqli_fetch_assoc($resultz);
									$opening_incomebal = floatval($rowz['bal']);
									$incomeAccId = intval($rowz['ledgerid']);
									$incomebal = $opening_incomebal + $departmentalBalAmt;
									$incomeAccName = $category;
								} else {
									$resultz = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
									$rowz = mysqli_fetch_assoc($resultz);
									$opening_incomebal = floatval($rowz['bal']);
									$incomebal = $opening_incomebal + $departmentalBalAmt;
									$incomeAccId = 635;
									$incomeAccName = 'Income';
								}

								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $cashacc . "','" . $cashname . "','" . $departmentalBalAmt . "','" . $category . ": Cash Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebal . "','" . $cashbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_cashbal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "',null,1,'" . $rcv_copayment . "',null,null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebal . "' WHERE ledgerid='" . $incomeAccId . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $cashbal . "' WHERE ledgerid='" . $cashacc . "'");
							}
						} else {
							$resultb = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cashacc . "' LIMIT 0,1");
							$rowb = mysqli_fetch_assoc($resultb);
							$opening_cashbal = floatval($rowb['bal']);
							$cashbal = $opening_cashbal + $amount;

							$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultz) > 0) {
								$rowz = mysqli_fetch_assoc($resultz);
								$opening_incomebal = floatval($rowz['bal']);
								$incomeAccId = intval($rowz['ledgerid']);
								$incomebal = $opening_incomebal + $amount;
								$incomeAccName = $category;
							} else {
								$resultz = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
								$rowz = mysqli_fetch_assoc($resultz);
								$opening_incomebal = floatval($rowz['bal']);
								$incomebal = $opening_incomebal + $amount;
								$incomeAccId = 635;
								$incomeAccName = 'Income';
							}
							@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $cashacc . "','" . $cashname . "','" . $amount . "','" . $category . ": Cash Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebal . "','" . $cashbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_cashbal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','','',null,1,'" . $rcv_copayment . "',null,null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
							@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebal . "' WHERE ledgerid='" . $incomeAccId . "' ");
							@mysqli_query($db, "UPDATE ledgers SET bal='" . $cashbal . "' WHERE ledgerid='" . $cashacc . "'");
						}

						$cash_rcpt_no = getReceiptNo($db);
						$updt_csh_rcptno = mysqli_query($db, "UPDATE `tblreceipts` SET `cash_rcpt_no`='" . $cash_rcpt_no . "' WHERE `rcptno`='" . $rcptno . "'");

						if ($chiefcashier != '' && $cashbal > 50000) {
							@mysqli_query($db, "INSERT INTO messages VALUES('','" . $chiefcashier . "','System','" . $cashname . "-" . $cashbal . " .<br/>Cash in Hand Limit exceeded-" . date('d/m/Y') . "','" . date('d/m/Y-H:i') . "','" . date('Ymd') . "',0)");
						}
					}

					if ($mode == 'Companies') {
						if ($cid == 14) {
							$departmentalLedgerEntryResult = mysqli_query($db, "SELECT `TransNo`,`Category`,`ItemCode`,`ItemName`,`TotalPrice`,`AmountPaid`,`Balance` FROM `sales` WHERE `ClientId`='" . $patid . "' AND `Balance`>0 AND `RcptNo`='" . $rcptno . "' ");
							if (mysqli_num_rows($departmentalLedgerEntryResult) > 0) {
								$departmentalTotal = 0;
								$amt_paidby_patient = $amount;
								while ($row = mysqli_fetch_assoc($departmentalLedgerEntryResult)) {
									$actualdepartmentName = trim(stripslashes($row['Category']));
									$departmentItemName = trim(stripslashes($row['ItemName']));
									$departmentItemCode = intval($row['ItemCode']);
									$departmentItemBal = floatval(preg_replace('~,~', '', stripslashes($row['Balance'])));
									if ($amt_paidby_patient >= $departmentItemBal) {
										$departmentAmt = $departmentItemBal;
										$newDepartmentItemBal = 0;
										$amt_paidby_patient = floatval($amt_paidby_patient) - floatval($departmentItemBal);
										$departmentItemStatus = 1;
									} else {
										$departmentAmt = $amt_paidby_patient;
										$newDepartmentItemBal = floatval($departmentItemBal) - floatval($amt_paidby_patient);
										$amt_paidby_patient = 0;
										$departmentItemStatus = 0;
									}
									$departmentalTotal += $departmentAmt;
									$newDepartmentItemAmtPaid = floatval(preg_replace('~,~', '', stripslashes($row['AmountPaid']))) + $departmentAmt;
									@mysqli_query($db, "UPDATE `sales` SET `AmountPaid`='" . $newDepartmentItemAmtPaid . "',`Balance`='" . $newDepartmentItemBal . "',`Status`='" . $departmentItemStatus . "' WHERE `TransNo`='" . intval($row['TransNo']) . "'");
									$resultbCash = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cashacc . "' LIMIT 0,1");
									$rowbCash = mysqli_fetch_assoc($resultbCash);
									$opening_cashbal3 = floatval($rowbCash['bal']);
									$closing_cashbal3 = $opening_cashbal3 + $departmentAmt;
									$resultDepartmentalIncome = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $actualdepartmentName . "' LIMIT 0,1 ");
									if (mysqli_num_rows($resultDepartmentalIncome) > 0) {
										$rowzDInc3 = mysqli_fetch_assoc($resultDepartmentalIncome);
										$opening_incomebalD3 = floatval($rowzDInc3['bal']);
										$incomeAccIdD3 = intval($rowzDInc3['ledgerid']);
										$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
										$incomeAccNameD3 = $actualdepartmentName;
									} else {
										$resultDepartmentalIncome = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
										$rowzDInc3 = mysqli_fetch_assoc($resultDepartmentalIncome);
										$opening_incomebalD3 = floatval($rowzDInc3['bal']);
										$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
										$incomeAccIdD3 = 635;
										$incomeAccNameD3 = 'Income';
									}
									@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccIdD3 . "','" . $incomeAccNameD3 . "','" . $cashacc . "','" . $cashname . "','" . $departmentAmt . "','" . $departmentItemName . ": Cash Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebalD3 . "','" . $closing_cashbal3 . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebalD3 . "','" . $opening_cashbal3 . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','','',635,626,'" . $rcv_copayment . "','cash','" . $departmentItemCode . "','" . $actualdepartmentName . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
									@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebalD3 . "' WHERE ledgerid='" . $incomeAccIdD3 . "' ");
									@mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_cashbal3 . "' WHERE ledgerid='" . $cashacc . "'");
								}
								if ($departmentalTotal < $amount) {
									$departmentalBalAmt = floatval($amount) - floatval($departmentalTotal);
									$resultb = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cashacc . "' LIMIT 0,1");
									$rowb = mysqli_fetch_assoc($resultb);
									$opening_cashbal = floatval($rowb['bal']);
									$cashbal = $opening_cashbal + $departmentalBalAmt;

									$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
									if (mysqli_num_rows($resultz) > 0) {
										$rowz = mysqli_fetch_assoc($resultz);
										$opening_incomebal = floatval($rowz['bal']);
										$incomeAccId = intval($rowz['ledgerid']);
										$incomebal = $opening_incomebal + $departmentalBalAmt;
										$incomeAccName = $category;
									} else {
										$resultz = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
										$rowz = mysqli_fetch_assoc($resultz);
										$opening_incomebal = floatval($rowz['bal']);
										$incomebal = $opening_incomebal + $departmentalBalAmt;
										$incomeAccId = 635;
										$incomeAccName = 'Income';
									}

									@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $cashacc . "','" . $cashname . "','" . $departmentalBalAmt . "','" . $category . ": Cash Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebal . "','" . $cashbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_cashbal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "',635,626,'" . $rcv_copayment . "','cash',null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
									@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebal . "' WHERE ledgerid='" . $incomeAccId . "' ");
									@mysqli_query($db, "UPDATE ledgers SET bal='" . $cashbal . "' WHERE ledgerid='" . $cashacc . "'");
								}
							} else {
								$resultb = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cashacc . "' LIMIT 0,1");
								$rowb = mysqli_fetch_assoc($resultb);
								$opening_cashbal = floatval($rowb['bal']);
								$cashbal = $opening_cashbal + $amount;

								$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultz) > 0) {
									$rowz = mysqli_fetch_assoc($resultz);
									$opening_incomebal = floatval($rowz['bal']);
									$incomebal = $opening_incomebal + $amount;
									$incomeAccId = intval($rowz['ledgerid']);
									$incomeAccName = $category;
								} else {
									$resultz = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
									$rowz = mysqli_fetch_assoc($resultz);
									$opening_incomebal = floatval($rowz['bal']);
									$incomebal = $opening_incomebal + $amount;
									$incomeAccId = 635;
									$incomeAccName = 'Income';
								}

								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $cashacc . "','" . $cashname . "','" . $amount . "','" . strtolower($category) . ": Cash Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebal . "','" . $cashbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_cashbal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "',635,626,'" . $rcv_copayment . "','cash',null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebal . "' WHERE ledgerid='" . $incomeAccId . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $cashbal . "' WHERE ledgerid='" . $cashacc . "'");
							}

							$cash_rcpt_no = getReceiptNo($db);
							$updt_csh_rcptno = mysqli_query($db, "UPDATE `tblreceipts` SET `cash_rcpt_no`='" . $cash_rcpt_no . "' WHERE `rcptno`='" . $rcptno . "'");
						} else {
							$resultAR = mysqli_query($db, "SELECT `bal`,`AccountReceivableLedgerID`,`IncomeAccountLedgerID` FROM `ledgers` WHERE `ledgerid`='" . $cid . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultAR) > 0) {
								$rowAR = mysqli_fetch_assoc($resultAR);
								$company_incomeacntId = intval($rowAR['IncomeAccountLedgerID']);
								$departmentalLedgerEntryResult = mysqli_query($db, "SELECT `TransNo`,`Category`,`ItemCode`,`ItemName`,`TotalPrice`,`AmountPaid`,`Balance` FROM `sales` WHERE `ClientId`='" . $patid . "' AND `Balance`>0 AND `RcptNo`='" . $rcptno . "' ");
								if (mysqli_num_rows($departmentalLedgerEntryResult) > 0) {
									$departmentalTotal = 0;
									$amt_paidby_patient = $amount;
									while ($row = mysqli_fetch_assoc($departmentalLedgerEntryResult)) {
										$actualdepartmentName = trim(stripslashes($row['Category']));
										$departmentItemName = trim(stripslashes($row['ItemName']));
										$departmentItemCode = intval($row['ItemCode']);
										$departmentItemBal = floatval(preg_replace('~,~', '', stripslashes($row['Balance'])));
										if ($amt_paidby_patient >= $departmentItemBal) {
											$departmentAmt = $departmentItemBal;
											$newDepartmentItemBal = 0;
											$amt_paidby_patient = floatval($amt_paidby_patient) - floatval($departmentItemBal);
											$departmentItemStatus = 1;
										} else {
											$departmentAmt = $amt_paidby_patient;
											$newDepartmentItemBal = floatval($departmentItemBal) - floatval($amt_paidby_patient);
											$amt_paidby_patient = 0;
											$departmentItemStatus = 0;
										}
										$departmentalTotal += $departmentAmt;
										$newDepartmentItemAmtPaid = floatval(preg_replace('~,~', '', stripslashes($row['AmountPaid']))) + $departmentAmt;
										@mysqli_query($db, "UPDATE `sales` SET `AmountPaid`='" . $newDepartmentItemAmtPaid . "',`Balance`='" . $newDepartmentItemBal . "',`Status`='" . $departmentItemStatus . "' WHERE `TransNo`='" . intval($row['TransNo']) . "'");
										$resultCompanyAR = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cid . "' LIMIT 0,1");
										$rowCompanyAR = mysqli_fetch_assoc($resultCompanyAR);
										$opening_company_acntrcvblebal = floatval($rowCompanyAR['bal']);
										$closing_company_acntrcvblebal = $opening_company_acntrcvblebal + $departmentAmt;
										$resultCompanyIncome = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `mainLedgerId`=635 AND `name`='" . $actualdepartmentName . "' LIMIT 0,1 ");
										if (mysqli_num_rows($resultCompanyIncome) > 0) {
											$rowzDInc3 = mysqli_fetch_assoc($resultCompanyIncome);
											$opening_incomebalD3 = floatval($rowzDInc3['bal']);
											$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
											$incomeAccIdD3 = intval($rowzDInc3['ledgerid']);
											$incomeAccNameD3 = trim(stripslashes($rowzDInc3['name']));
										} else {
											$resultCompanyIncome = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM `ledgers` WHERE `ledgerid`='" . $company_incomeacntId . "' LIMIT 0,1 ");
											if (mysqli_num_rows($resultCompanyIncome) == 0) $resultCompanyIncome = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM `ledgers` WHERE `ledgerid`=796 LIMIT 0,1 ");
											$rowzDInc3 = mysqli_fetch_assoc($resultCompanyIncome);
											$opening_incomebalD3 = floatval($rowzDInc3['bal']);
											$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
											$incomeAccIdD3 = intval($rowzDInc3['ledgerid']);
											$incomeAccNameD3 = trim(stripslashes($rowzDInc3['name']));
										}
										@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccIdD3 . "','" . $incomeAccNameD3 . "','" . $cid . "','" . $cname . "','" . $departmentAmt . "','" . ucwords(strtolower($departmentItemName)) . ": Debtor: " . ucwords(strtolower($cname)) . " Patient: " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebalD3 . "','" . $closing_company_acntrcvblebal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebalD3 . "','" . $opening_company_acntrcvblebal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "',635,628,'" . $rcv_copayment . "','insurance','" . $departmentItemCode . "','" . $actualdepartmentName . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
										@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebalD3 . "' WHERE ledgerid='" . $incomeAccIdD3 . "' ");
										@mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_company_acntrcvblebal . "' WHERE ledgerid='" . $cid . "'");
									}
									if ($departmentalTotal < $amount) {
										$departmentalBalAmt = floatval($amount) - floatval($departmentalTotal);
										$resultCompanyAR = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $cid . "' LIMIT 0,1");
										$rowCompanyAR = mysqli_fetch_assoc($resultCompanyAR);
										$opening_company_acntrcvblebal = floatval($rowCompanyAR['bal']);
										$closing_company_acntrcvblebal = $opening_company_acntrcvblebal + $departmentalBalAmt;

										$resultCompanyIncome = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `mainLedgerId`=635 AND `name`='" . $category . "' LIMIT 0,1 ");
										if (mysqli_num_rows($resultCompanyIncome) > 0) {
											$rowzDInc3 = mysqli_fetch_assoc($resultCompanyIncome);
											$opening_incomebalD3 = floatval($rowzDInc3['bal']);
											$incomebalD3 = $opening_incomebalD3 + $departmentalBalAmt;
											$incomeAccIdD3 = intval($rowzDInc3['ledgerid']);
											$incomeAccNameD3 = trim(stripslashes($rowzDInc3['name']));
										} else {
											$resultCompanyIncome = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=796 LIMIT 0,1 ");
											$rowzDInc3 = mysqli_fetch_assoc($resultCompanyIncome);
											$opening_incomebalD3 = floatval($rowzDInc3['bal']);
											$incomebalD3 = $opening_incomebalD3 + $departmentalBalAmt;
											$incomeAccIdD3 = 796;
											$incomeAccNameD3 = 'INSURANCE RECEIPTS';
										}

										@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccIdD3 . "','" . $incomeAccNameD3 . "','" . $cid . "','" . $cname . "','" . $departmentalBalAmt . "','" . ucwords(strtolower($category)) . ": Credit Sale. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebalD3 . "','" . $closing_company_acntrcvblebal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebalD3 . "','" . $opening_company_acntrcvblebal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "',635,628,'" . $rcv_copayment . "','insurance',null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
										@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebalD3 . "' WHERE ledgerid='" . $incomeAccIdD3 . "' ");
										@mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_company_acntrcvblebal . "' WHERE ledgerid='" . $cid . "'");
									}
								} else {
									$opening_acntrcvablebal = floatval($rowAR['bal']);
									$closing_acntrcvablebal = $opening_acntrcvablebal + $amount;

									if ($company_incomeacntId <= 0) $company_incomeacntId = 796;
									$resultz = mysqli_query($db, "SELECT `bal`,`name` FROM `ledgers` WHERE `ledgerid`='" . $company_incomeacntId . "' LIMIT 0,1 ");
									$rowz = mysqli_fetch_assoc($resultz);
									$company_incomeacntName = trim(stripslashes($rowz['name']));
									$opening_company_incomebal = floatval($rowz['bal']);
									$closing_company_incomebal = $opening_company_incomebal + $amount;

									$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $company_incomeacntId . "','" . $company_incomeacntName . "','" . $cid . "','" . $cname . "','" . $amount . "','" . ucwords(strtolower($category)) . " payment receivable from debtor " . strtolower($company_incomeacntName) . ". ','" . $date . "','" . $closing_company_incomebal . "','" . $closing_acntrcvablebal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_company_incomebal . "','" . $opening_acntrcvablebal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "',null,null,'" . $hasInsurance . "','" . $cid . "','" . $cname . "',635,628,null,'insurance',null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
									$resultm = mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $closing_company_incomebal . "' WHERE `ledgerid`='" . $company_incomeacntId . "' ");
									$resultn = mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $closing_acntrcvablebal . "' WHERE `ledgerid`='" . $cid . "' ");
								}
								$comp_rcpt_no = getCompanyReceiptNo($db);
								$updt_cmp_rcptno = mysqli_query($db, "UPDATE `tblreceipts` SET `comp_rcpt_no`='" . $comp_rcpt_no . "' WHERE `rcptno`='" . $rcptno . "'");
							} else {
								$resultAR = mysqli_query($db, "SELECT `ledgerid`,`bal`,`name` FROM `ledgers` WHERE `mainLedgerId`=628 AND `name`='" . $cname . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultAR) == 0) $resultAR = mysqli_query($db, "SELECT `bal`,`name` FROM `ledgers` WHERE `ledgerid`=628 LIMIT 0,1 ");
								$rowAR = mysqli_fetch_assoc($resultAR);
								$opening_acntrcvablebal = floatval($rowAR['bal']);
								$closing_acntrcvablebal = $opening_acntrcvablebal + $amount;
								$company_acntrcvbleName = trim(stripslashes($rowAR['name']));
								$company_acntrcvbleId = intval($rowAR['ledgerid']);

								$resultz = mysqli_query($db, "SELECT `ledgerid`,`bal`,`name` FROM `ledgers` WHERE `mainLedgerId`=796 AND `name`='" . $cname . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultz) == 0) $resultz = mysqli_query($db, "SELECT `ledgerid`,`bal`,`name` FROM `ledgers` WHERE `ledgerid`=796 LIMIT 0,1 ");
								$rowz = mysqli_fetch_assoc($resultz);
								$company_incomeacntName = trim(stripslashes($rowz['name']));
								$opening_company_incomebal = floatval($rowz['bal']);
								$closing_company_incomebal = $opening_company_incomebal + $amount;
								$company_incomeacntId = intval($rowz['ledgerid']);

								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $company_incomeacntId . "','" . $company_incomeacntName . "','" . $company_acntrcvbleId . "','" . $company_acntrcvbleName . "','" . $amount . "','" . ucwords(strtolower($category)) . " payment receivable from debtor " . strtolower($company_incomeacntName) . ". ','" . $date . "','" . $closing_company_incomebal . "','" . $closing_acntrcvablebal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_company_incomebal . "','" . $opening_acntrcvablebal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "',null,null,'" . $hasInsurance . "','" . $cid . "','" . $cname . "',796,628,null,'insurance',null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $closing_company_incomebal . "' WHERE `ledgerid`='" . $company_incomeacntId . "' ");
								@mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $closing_acntrcvablebal . "' WHERE `ledgerid`='" . $company_acntrcvbleId . "' ");

								$comp_rcpt_no = getCompanyReceiptNo($db);
								$updt_cmp_rcptno = mysqli_query($db, "UPDATE `tblreceipts` SET `comp_rcpt_no`='" . $comp_rcpt_no . "' WHERE `rcptno`='" . $rcptno . "'");
							}
						}

						echo "<script>window.open('outpathistory.php?id=726&rcptno=" . safe_encode($rcptno) . "&pid=" . safe_encode($patid) . "&cid=" . safe_encode($old_patient_id) . "');</script>";
					}

					if ($mode == 'Bank') {
						$departmentalLedgerEntryResult = mysqli_query($db, "SELECT `TransNo`,`Category`,`ItemCode`,`ItemName`,`TotalPrice`,`AmountPaid`,`Balance` FROM `sales` WHERE `ClientId`='" . $patid . "' AND `Balance`>0 AND `RcptNo`='" . $rcptno . "' ");
						if (mysqli_num_rows($departmentalLedgerEntryResult) > 0) {
							$departmentalTotal = 0;
							$amt_paidby_patient = $amount;
							while ($row = mysqli_fetch_assoc($departmentalLedgerEntryResult)) {
								$actualdepartmentName = trim(stripslashes($row['Category']));
								$departmentItemName = trim(stripslashes($row['ItemName']));
								$departmentItemCode = intval($row['ItemCode']);
								$departmentItemBal = floatval(preg_replace('~,~', '', stripslashes($row['Balance'])));
								if ($amt_paidby_patient >= $departmentItemBal) {
									$departmentAmt = $departmentItemBal;
									$newDepartmentItemBal = 0;
									$amt_paidby_patient = floatval($amt_paidby_patient) - floatval($departmentItemBal);
									$departmentItemStatus = 1;
								} else {
									$departmentAmt = $amt_paidby_patient;
									$newDepartmentItemBal = floatval($departmentItemBal) - floatval($amt_paidby_patient);
									$amt_paidby_patient = 0;
									$departmentItemStatus = 0;
								}
								$departmentalTotal += $departmentAmt;
								$newDepartmentItemAmtPaid = floatval(preg_replace('~,~', '', stripslashes($row['AmountPaid']))) + $departmentAmt;
								@mysqli_query($db, "UPDATE `sales` SET `AmountPaid`='" . $newDepartmentItemAmtPaid . "',`Balance`='" . $newDepartmentItemBal . "',`Status`='" . $departmentItemStatus . "' WHERE `TransNo`='" . intval($row['TransNo']) . "'");
								$resultbBank = mysqli_query($db, "SELECT `bal`,`mainLedgerId` FROM `ledgers` WHERE `ledgerid`='" . $bankacc_id . "' LIMIT 0,1");
								$rowbBank = mysqli_fetch_assoc($resultbBank);
								$bank_mainacntid3 = intval($rowbBank['mainLedgerId']);
								$opening_bankbal3 = floatval($rowbBank['bal']);
								$closing_bankbal3 = $opening_bankbal3 + $departmentAmt;
								$resultDepartmentalIncome = mysqli_query($db, "SELECT ledgerid,bal,`name`,`mainLedgerId` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $actualdepartmentName . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultDepartmentalIncome) > 0) {
									$rowzDInc3 = mysqli_fetch_assoc($resultDepartmentalIncome);
									$incomeaccnt_mainacntid = intval($rowzDInc3['mainLedgerId']);
									$opening_incomebalD3 = floatval($rowzDInc3['bal']);
									$incomeAccIdD3 = intval($rowzDInc3['ledgerid']);
									$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
									$incomeAccNameD3 = $actualdepartmentName;
								} else {
									$resultDepartmentalIncome = mysqli_query($db, "SELECT `bal`,`mainLedgerId` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
									$rowzDInc3 = mysqli_fetch_assoc($resultDepartmentalIncome);
									$incomeaccnt_mainacntid = intval($rowzDInc3['mainLedgerId']);
									$opening_incomebalD3 = floatval($rowzDInc3['bal']);
									$incomebalD3 = $opening_incomebalD3 + $departmentAmt;
									$incomeAccIdD3 = 635;
									$incomeAccNameD3 = 'Income';
								}
								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccIdD3 . "','" . $incomeAccNameD3 . "','" . $bankacc_id . "','" . $bankacc_name . "','" . $departmentAmt . "','" . $departmentItemName . " Bank Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebalD3 . "','" . $closing_bankbal3 . "','" . $stamp . "','" . $bankacc_id . "','" . $bankacc_name . "',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebalD3 . "','" . $opening_bankbal3 . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "',null,'" . $rcvpayref76 . "','" . $hasInsurance . "','','','" . $incomeaccnt_mainacntid . "','" . $bank_mainacntid3 . "','" . $rcv_copayment . "',null,'" . $departmentItemCode . "','" . $actualdepartmentName . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebalD3 . "' WHERE ledgerid='" . $incomeAccIdD3 . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_bankbal3 . "' WHERE ledgerid='" . $bankacc_id . "'");
							}
							if ($departmentalTotal < $amount) {
								$departmentalBalAmt = floatval($amount) - floatval($departmentalTotal);
								$resultb = mysqli_query($db, "SELECT `bal`,`mainLedgerId` FROM `ledgers` WHERE `ledgerid`='" . $bankacc_id . "' LIMIT 0,1");
								$rowb = mysqli_fetch_assoc($resultb);
								$bank_mainacntid = intval($rowb['mainLedgerId']);
								$opening_bankbal = floatval($rowb['bal']);
								$bankbal = $opening_bankbal + $departmentalBalAmt;

								$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name`,`mainLedgerId` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultz) > 0) {
									$rowz = mysqli_fetch_assoc($resultz);
									$incomeaccnt_mainacntid = intval($rowz['mainLedgerId']);
									$opening_incomebal = floatval($rowz['bal']);
									$incomeAccId = intval($rowz['ledgerid']);
									$incomebal = $opening_incomebal + $departmentalBalAmt;
									$incomeAccName = $category;
								} else {
									$resultz = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
									$rowz = mysqli_fetch_assoc($resultz);
									$opening_incomebal = floatval($rowz['bal']);
									$incomebal = $opening_incomebal + $departmentalBalAmt;
									$incomeAccId = 635;
									$incomeAccName = 'Income';
								}
								@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $bankacc_id . "','" . $bankacc_name . "','" . $departmentalBalAmt . "','" . ucwords(strtolower($category)) . " Bank Payment. Patient " . ucwords(strtolower($patname)) . ". ','" . $date . "','" . $incomebal . "','" . $bankbal . "','" . $stamp . "','" . $bankacc_id . "','" . $bankacc_name . "',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_bankbal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "',null,'" . $rcvpayref76 . "','" . $hasInsurance . "','','','" . $incomeaccnt_mainacntid . "','" . $bank_mainacntid . "','" . $rcv_copayment . "',null,null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebal . "' WHERE ledgerid='" . $incomeAccId . "' ");
								@mysqli_query($db, "UPDATE ledgers SET bal='" . $bankbal . "' WHERE ledgerid='" . $bankacc_id . "'");
							}
						} else {
							$resultb = mysqli_query($db, "SELECT `bal`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $bankacc_id . "' LIMIT 0,1 ");
							$rowb = mysqli_fetch_assoc($resultb);
							$bank_mainacntid = intval($rowb['mainLedgerId']);
							$opening_bankbal = floatval($rowb['bal']);
							$bankbal = $opening_bankbal + $amount;

							$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name`,`mainLedgerId` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultz) > 0) {
								$rowz = mysqli_fetch_assoc($resultz);
								$incomeaccnt_mainacntid = intval($rowz['mainLedgerId']);
								$opening_incomebal = floatval($rowz['bal']);
								$incomeAccId = intval($rowz['ledgerid']);
								$incomebal = $opening_incomebal + $amount;
								$incomeAccName = $category;
							} else {
								$resultz = mysqli_query($db, "SELECT `bal`,`mainLedgerId` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
								$rowz = mysqli_fetch_assoc($resultz);
								$incomeaccnt_mainacntid = intval($rowz['mainLedgerId']);
								$opening_incomebal = floatval($rowz['bal']);
								$incomebal = $opening_incomebal + $amount;
								$incomeAccId = 635;
								$incomeAccName = 'Income';
							}

							@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $bankacc_id . "','" . $bankacc_name . "','" . $amount . "','" . ucwords(strtolower($category)) . " Bank Payment. Patient " . strtolower($patname) . ". ','" . $date . "','" . $incomebal . "','" . $bankbal . "','" . $stamp . "','" . $bankacc_id . "','" . $bankacc_name . "',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_bankbal . "','patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "',null,'" . $rcvpayref76 . "','" . $hasInsurance . "','','','" . $incomeaccnt_mainacntid . "','" . $bank_mainacntid . "','" . $rcv_copayment . "',null,null,'" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
							@mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $incomebal . "' WHERE `ledgerid`='" . $incomeAccId . "' ");
							@mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $bankbal . "' WHERE `ledgerid`='" . $bankacc_id . "'");
						}
						$cash_rcpt_no = getBankReceiptNo($db);
						$updt_bnk_rcptno = mysqli_query($db, "UPDATE `tblreceipts` SET `cash_rcpt_no`='" . $cash_rcpt_no . "' WHERE `rcptno`='" . $rcptno . "'");
					}

					echo "<script>window.open('report.php?id=62&rcptno=" . safe_encode($rcptno) . "&pid=" . safe_encode($patid) . "&cid=" . safe_encode($old_patient_id) . "&tdt=" . safe_encode($in_trans_date) . "');</script>";
					echo "<script>window.open('outpathistory.php?id=62&rcptno=" . safe_encode($rcptno) . "&pid=" . safe_encode($patid) . "&cid=" . safe_encode($old_patient_id) . "&tdt=" . safe_encode($in_trans_date) . "');</script>";
				}

				$resultt5 = mysqli_query($db, "SELECT `TransNo`,SUM(AmountPaid) AS totalPaid FROM `sales` WHERE `ClientId`='" . $patid . "' AND `RcptNo`='" . $rcptno . "' ");
				if (mysqli_num_rows($resultt5) > 0) {
				}

				$resultq = mysqli_query($db, "UPDATE sales SET `Status`=1,Cashier='" . $username . "',old_cashier_id='" . $userid . "' WHERE old_patient_id='" . $old_patient_id . "' AND RcptNo='" . $rcptno . "'  ");
				$resultq = mysqli_query($db, "UPDATE pharmrequests SET `status`=1,paid=1 WHERE old_in_patient_id='" . $old_patient_id . "' AND rcptno='" . $rcptno . "' ");

				$resultq = mysqli_query($db, "UPDATE labrequests SET `status`=1,paid=1 WHERE old_in_patient_id='" . $old_patient_id . "' AND rcptno='" . $rcptno . "' ");
				$resultq = mysqli_query($db, "UPDATE radrequests SET `status`=1,paid=1 WHERE old_in_patient_id='" . $old_patient_id . "' AND rcptno='" . $rcptno . "' ");

				//reduce stock
				$result = mysqli_query($db, "SELECT * FROM sales WHERE old_patient_id='" . $old_patient_id . "' AND Dispensed=0 AND ClientId='" . $patid . "' AND RcptNo='" . $rcptno . "' ");
				$num_results = mysqli_num_rows($result);
				for ($i = 0; $i < $num_results; $i++) {
					$row = mysqli_fetch_assoc($result);
					$itcode = trim(stripslashes($row['ItemCode']));
					$itname = stripslashes($row['ItemName']);
					$categ = stripslashes($row['Category']);
					$patname = stripslashes($row['ClientName']);
					$qty = floatval($row['Qty']);
					$totcost = floatval($row['TotalCost']);
					$totprice = floatval($row['TotalPrice']);

					$resultb = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE ledgerid=630 ");
					$rowb = mysqli_fetch_assoc($resultb);
					$opening_inventorybal = floatval($rowb['bal']);
					$closing_inventorybal = floatval($opening_inventorybal) - floatval($totprice);
					$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','630','Inventory','','','" . $totprice . "','" . $itname . " [" . $rcptno . "]','" . $date . "','" . $closing_inventorybal . "','','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_inventorybal . "',null,'patient','" . $patid . "','" . $patname . "',null,'receive_patient_payment','" . $rcpt_uid . "',null,'" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "','','','" . $rcv_copayment . "','inventory','" . $itcode . "','" . $category . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
					$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_inventorybal . "' WHERE ledgerid=630 ");

					$query = mysqli_query($db, "SELECT * FROM items WHERE ItemCode='" . $itcode . "'");
					$rowq = mysqli_fetch_assoc($query);
					$type = trim(stripslashes($rowq['Type']));
					$CurrentBatchInUse = trim(stripslashes($rowq['CurrentBatchInUse']));

					if ($type == 'GOOD') {
						$bal = floatval($rowq[$categ]);
						$qsold = floatval($rowq['Qsold']);
						$type = stripslashes($rowq['Type']);
						$pack = stripslashes($rowq['Pack']);
						$diff = floatval($bal) - floatval($qty);
						$soldqty = floatval($qsold) + floatval($qty);
						$resultd = mysqli_query($db, "INSERT INTO stocktrack VALUES('','" . $date . "','" . $categ . "','" . $itcode . "','" . $itname . "','" . $pack . "','OUTPATIENT SALES-" . $patname . "','" . $qty . "','" . $diff . "','" . $username . "','" . $stamp . "')");

						if ($categ == 'ADMINISTRATION') {
							try {
								$resultb = mysqli_query($db, "UPDATE items SET " . $categ . "='" . $diff . "',Bal='" . $diff . "', Qsold='" . $soldqty . "', TransDate='" . date('d/m/Y') . "', TranStamp='" . date('Ymd') . "', TimeStamp='" . date('YmdHi') . "', Activity='OPDSALES-FROM-" . $categ . "', MoreDetail='OPDSALES-FROM-" . $categ . "-TO-" . $patname . "', Quantity='" . $qty . "', TransactedBy='" . mysqli_real_escape_string($db, $fullname) . "' WHERE ItemCode='" . $itcode . "' ");
							} catch (Exception $e) {
								//throw new Exception("Department items column not found.", 1);
							}
						} else if ($categ == 'PHARMACY') {
							try {
								$resultb = mysqli_query($db, "UPDATE items SET " . $categ . "='" . $diff . "',Qopening='" . $diff . "', Qsold='" . $soldqty . "', TransDate='" . date('d/m/Y') . "', TranStamp='" . date('Ymd') . "', TimeStamp='" . date('YmdHi') . "', Activity='OPDSALES-FROM-" . $categ . "', MoreDetail='OPDSALES-FROM-" . $categ . "-TO-" . $patname . "', Quantity='" . $qty . "', TransactedBy='" . mysqli_real_escape_string($db, $fullname) . "' WHERE ItemCode='" . $itcode . "' ");
							} catch (Exception $e) {
								//throw new Exception("Department items column not found.", 1);
							}
						} else {
							try {
								$resultb = mysqli_query($db, "UPDATE items SET " . $categ . "='" . $diff . "', Qsold='" . $soldqty . "', TransDate='" . date('d/m/Y') . "', TranStamp='" . date('Ymd') . "', TimeStamp='" . date('YmdHi') . "', Activity='OPDSALES-FROM-" . $categ . "', MoreDetail='OPDSALES-FROM-" . $categ . "-TO-" . $patname . "', Quantity='" . $qty . "', TransactedBy='" . mysqli_real_escape_string($db, $fullname) . "' WHERE ItemCode='" . $itcode . "' ");
							} catch (Exception $e) {
								//throw new Exception("Department items column not found.", 1);
							}
						}

						$newbatchNo = $CurrentBatchInUse ? '' : updateItemBatchBalAndBatchInUse($db, $itcode, 'updateBatchNo');
						if ($newbatchNo != '') {
							updateItemBatchBalAndBatchInUse($db, $itcode, 'reducePurchasesBatchBal', $newbatchNo, $qty);
						}
					}
				}

				if ($resultp && $resultq) {
					@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Receives payment. Receipt No." . $rcptno . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					unset($_SESSION['pay']);
					echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';

					echo "<script>
									$().customAlert();
									alert('Success!', '<p>Payment Posted.</p>');
									setTimeout(function() {
									paymentsTesting();},500);
									</script>";
					echo "<script>$('#totitems').val('');
									$('#lid76').val('');
									$('#lname76').val('');
									$('#ref76').val('');
									$('#amount76').val('');
									$('#ampaid').val('');
									$('#changeam').val('');
									</script>";
					exit;
				} else {
					die("<script type='text/javascript'>$().customAlert();alert('Error', '<p>Transaction failed, please repeat the transaction. </p>');e.preventDefault();</script>");
				}
				exit;
			} else {
				die("<script type='text/javascript'>$().customAlert();alert('Error', '<p>Bad Request. </p>');e.preventDefault();</script>");
			}


			break;

		case 93.3:
			if (isset($_GET['category']) && isset($_GET['old_patient_id']) && isset($_GET['old_category_id'])) {

				$category = trim(mysqli_real_escape_string($db, $_GET['category']));
				$old_patient_id = trim(mysqli_real_escape_string($db, $_GET['old_patient_id']));
				$old_category_id = trim(mysqli_real_escape_string($db, $_GET['old_category_id']));

				$stamp = date('Ymd');
				$date = date('Y/m/d');
				$totmode = '';
				$max = count($_SESSION['pay']);
				//for ($i = 0; $i < $max; $i++){
				$patid = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][0]));
				$patname = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][1]));
				$rcptno = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][2]));
				$paymode = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][3]));
				$company_id = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][4]));
				$company_name = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][5]));
				$rcvpayref76 = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][6]));
				$amount = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][7]));
				$totalbill = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][8]));
				$cardno = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][9]));
				$bankacc_id = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][10]));
				$bankacc_name = trim(mysqli_real_escape_string($db, $_SESSION['pay'][0][11]));
				do {
					$rcpt_uid = guidv4();
					$result4 = mysqli_query($db, "SELECT id FROM receipts WHERE rcpt_uid='" . $rcpt_uid . "' LIMIT 0,1 ");
				} while (mysqli_num_rows($result4) > 0);

				$totmode .= $mode . ';';
				$resultp = mysqli_query($db, "INSERT INTO receipts VALUES('','" . $date . "','" . $patid . "','" . $patname . "','" . $rcptno . "','Cumulative','','','','" . $amount . "','" . $stamp . "',1,'" . $username . "','','" . $category . "','" . date('Hi') . "','" . $stamp . "" . date('Hi') . "','" . $old_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "',null,'" . $cashacc . "','" . $cashname . "',0,0,null,null,null,null,'','','',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");

				//If mode is Cash
				$resultx = mysqli_query($db, "SELECT * FROM sales WHERE RcptNo = '" . $rcptno . "' LIMIT 0,1");
				$num_results = mysqli_num_rows($resultx);
				$rowx = mysqli_fetch_assoc($resultx);

				echo "<script>window.open('report.php?id=62&rcptno=" . $rcptno . "');</script>";

				$a = 'nurse';
				$date = date('d/m/Y') . '-' . date('H:i');
				if (isset($_SESSION[$a])) {
					$max = count($_SESSION[$a]);
					$_SESSION[$a][$max] = array($rowx['ItemCode'], $rowx['ItemName'], $rowx['Qty'], $rowx['UnitPrice'], $rowx['TotalPrice'], $rowx['ClientName'], $rowx['ClientId'], $category, $rowx['TotalCost'], $rowx['Discount'], $rowx['TotalPrice'], $rowx['Date'], $rowx['Iid'], $fullname, $date, $cardno, $rcvpayref76, $company_id, $company_name, $bankacc_id, $bankacc_name);
					$max = count($_SESSION[$a]);
				} else {
					$_SESSION[$a] = array(array());
					$_SESSION[$a][0] = array($rowx['ItemCode'], $rowx['ItemName'], $rowx['Qty'], $rowx['UnitPrice'], $rowx['TotalPrice'], $rowx['ClientName'], $rowx['ClientId'], $category, $rowx['TotalCost'], $rowx['Discount'], $rowx['TotalPrice'], $rowx['Date'], $rowx['Iid'], $fullname, $date, $cardno, $rcvpayref76, $company_id, $company_name, $bankacc_id, $bankacc_name);
					$max = count($_SESSION[$a]);
				}
				//TODO: ADD COLS TO TABLE AND ADD EXTRA VALUES
				$resulta = mysqli_query($db, "insert into daycare values('','" . $rowx['ClientId'] . "','" . $rowx['ClientName'] . "','" . $rowx['ItemCode'] . "','" . $rowx['ItemName'] . "','" . $category . "','" . $rowx['UnitPrice'] . "',
								'" . $rowx['Qty'] . "','" . $rowx['TotalPrice'] . "','" . $rowx['Discount'] . "','" . $rowx['TotalPrice'] . "','" . $rowx['Date'] . "','" . $rowx['Iid'] . "')");

				$resultn = mysqli_query($db, "UPDATE `sales` SET `Status`=2 WHERE `RcptNo`='" . $rcptno . "'");
				//}

				if ($resultp && $resulta) {

					$resulta = mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": posts cumulative payment.Receipt No." . $rcptno . ", receipt uid:" . $rcpt_uid . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					unset($_SESSION['pay']);
					echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					echo "<script>
									$().customAlert();
									alert('Success!', '<p>Payment Posted.</p>');
									setTimeout(function() {
									payments();},500);
									</script>";
					echo "<script>$('#totitems').val('');
									$('#lid76').val('');
									$('#lname76').val('');
									$('#ref76').val('');
									$('#amount76').val('');
									$('#ampaid').val('');
									$('#changeam').val('');
									</script>";
					exit;
				} else {
					die("<script type='text/javascript'>$().customAlert();alert('Error', '<p>Transaction failed, please repeat the transaction. </p>');e.preventDefault();</script>");
				}
			} else {
				die("<script type='text/javascript'>$().customAlert();alert('Error', '<p>Bad Request. </p>');e.preventDefault();</script>");
			}

			exit;

			break;



		case 94: //PAY CREDITOR
			if (isset($_GET['total']) && isset($_GET['refno']) && isset($_GET['lid']) && isset($_GET['paycreditorid'])) {
				$nbal = floatval(str_replace(",", "", $_GET['nbal']));
				$total = floatval(str_replace(",", "", $_GET['total']));
				$refno = trim(mysqli_real_escape_string($db, $_GET['refno']));
				$lid = intval($_GET['lid']);
				$lname = trim(mysqli_real_escape_string($db, $_GET['lname']));
				$paycreditorid = intval($_GET['paycreditorid']);
				$paycreditorname = strtoupper(trim(mysqli_real_escape_string($db, $_GET['paycreditorname'])));

				$stamp = date('Ymd');
				$date = date('Y/m/d');
				$rcpt_uid = guidv4();
				$resulta = false;
				$max = count($_SESSION['supinvoice']);
				foreach ($_SESSION['supinvoice'] as $i => $val) {
					$code = intval($_SESSION['supinvoice'][$i][0]);
					$amount = floatval(str_replace(",", "", $_SESSION['supinvoice'][$i][1]));
					$cid = intval($_SESSION['supinvoice'][$i][2]);
					if ($paycreditorid != $cid) {
						die("<script>$().customAlert();alert('Sorry', '<p>Error.</p>');e.preventDefault();</script>");
					}
					$cname = trim(mysqli_real_escape_string($db, $_SESSION['supinvoice'][$i][3]));
					$invno = trim(mysqli_real_escape_string($db, $_SESSION['supinvoice'][$i][4]));
					$bal = floatval(str_replace(",", "", $_SESSION['supinvoice'][$i][5]));
					$paying = floatval(str_replace(",", "", $_SESSION['supinvoice'][$i][6]));
					$invbal = floatval(str_replace(",", "", $_SESSION['supinvoice'][$i][7]));
					$paid = floatval(str_replace(",", "", $_SESSION['supinvoice'][$i][8]));
					$sbal = floatval($amount) - floatval($paying);
					$npaid = floatval($paid) + floatval($paying);
					$ninvbal = floatval($invbal) - floatval($paying);
					$invref = trim(mysqli_real_escape_string($db, $_SESSION['supinvoice'][$i][9]));

					$resulta = mysqli_query($db, "INSERT INTO supplierdebts VALUES('','" . $cid . "','" . $cname . "','" . $invno . "','','" . $paying . "','cr','" . $npaid . "','" . $ninvbal . "','" . $bal . "','Supplier payment.','" . date('d/m/Y') . "','" . date('Ymd') . "',1,'" . $invref . "','" . $rcpt_uid . "','" . $refno . "',null,'" . $lid . "','" . $lname . "','" . $username . "')");
					$resultb = mysqli_query($db, "UPDATE supplierdebts SET InvBal='" . $ninvbal . "',Paid='" . $npaid . "' WHERE TransNo='" . $code . "'");
					if ($ninvbal == 0) {
						$resultc = mysqli_query($db, "UPDATE supplierdebts SET `Status`=2 WHERE TransNo='" . $code . "'");
					}

					$resulCS = mysqli_query($db, "SELECT Bal FROM creditsuppliers WHERE CustomerId='" . $cid . "' ");
					$rowCS = mysqli_fetch_assoc($resulCS);
					$csupplier_closingbal = floatval($rowCS['Bal']) - floatval($paying);
					@mysqli_query($db, "UPDATE creditsuppliers SET Bal='" . $csupplier_closingbal . "' WHERE CustomerId='" . $cid . "'");

					$resultf = mysqli_query($db, "SELECT bal,category FROM ledgers WHERE ledgerid=629");
					$rowf = mysqli_fetch_assoc($resultf);
					$acntspayable_openingbal = floatval($rowf['bal']);
					$acntspayable_closingbal = $acntspayable_openingbal - floatval($paying);

					$resultg = mysqli_query($db, "SELECT bal,category FROM ledgers WHERE ledgerid=" . $lid . "");
					$rowg = mysqli_fetch_assoc($resultg);
					$creditor_paymode = trim(stripslashes($rowg['category']));
					$bankorcash_openingbal = floatval($rowg['bal']);
					$bankorcash_closingbal = $bankorcash_openingbal - floatval($paying);

					$resulte = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $lid . "','" . $lname . "','629','Accounts Payable','" . $paying . "','" . ucwords(strtolower($cname)) . " Supplier Payment.','" . $date . "','" . $bankorcash_closingbal . "','" . $acntspayable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $bankorcash_openingbal . "','" . $acntspayable_openingbal . "','supplier','" . $cid . "','" . $cname . "',null,'pay_creditor','" . $rcpt_uid . "','" . $invref . "','" . $refno . "',0,'" . $paycreditorid . "','" . $paycreditorname . "',null,null,null,'" . $invno . "',null,null,'" . $creditor_paymode . "','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
					$resultf = mysqli_query($db, "UPDATE ledgers SET bal='" . $acntspayable_closingbal . "' WHERE ledgerid=629");
					$resultg = mysqli_query($db, "UPDATE ledgers SET bal='" . $bankorcash_closingbal . "' WHERE ledgerid=" . $lid . "");
				}

				//MOVED INSIDE FOREACH LOOP TO BE RECORDED FOR EACH INVOICE
				// $result = mysqli_query($db, "UPDATE creditsuppliers SET Bal='" . $nbal . "' WHERE CustomerId='" . $paycreditorid . "'");
				// $resultf = mysqli_query($db, "SELECT bal,category FROM ledgers WHERE ledgerid=629");
				// $rowf = mysqli_fetch_assoc($resultf);
				// $acntspayable_openingbal = floatval($rowf['bal']);
				// $acntspayable_closingbal = $acntspayable_openingbal - floatval($total);

				// $resultg = mysqli_query($db, "SELECT bal,category FROM ledgers WHERE ledgerid=" . $lid . "");
				// $rowg = mysqli_fetch_assoc($resultg);
				// $creditor_paymode=trim(stripslashes($rowg['category']));
				// $bankorcash_openingbal = floatval($rowg['bal']);
				// $bankorcash_closingbal = $bankorcash_openingbal - floatval($total);

				// $resulte = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $lid . "','" . $lname . "','629','Accounts Payable','" . $total . "','" . $paycreditorname . " Supplier Payment.','" . $date . "','" . $bankorcash_closingbal . "','" . $acntspayable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $bankorcash_openingbal . "','" . $acntspayable_openingbal . "','supplier','" . $paycreditorid . "','" . $paycreditorname . "',null,'pay_creditor','" . $rcpt_uid . "',null,'" . $refno . "',0,'" . $paycreditorid . "','" . $paycreditorname . "',null,null,null,null,null,'','". $creditor_paymode."','" . $username . "','0','0','','',null)");
				// $resultf = mysqli_query($db, "UPDATE ledgers SET bal='" . $acntspayable_closingbal . "' WHERE ledgerid=629");
				// $resultg = mysqli_query($db, "UPDATE ledgers SET bal='" . $bankorcash_closingbal . "' WHERE ledgerid=" . $lid . "");

				@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Pays Creditor, " . $paycreditorname . ", invoice " . $invno . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				unset($_SESSION['supinvoice']);
				echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
				echo "<script>	$('#total').val('');	$('#bal').val('');
										$().customAlert();
											alert('Success!', '<p>Transaction Successful.</p>');
											$.ajax({
											url:'./link.php',
											data:{id:31,cus:'" . $cid . "'},
											success:function(data){
											$('#display').html(data);
											}
										});										
									</script>";
				exit;
			} else {
				die("<script>$().customAlert();alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');e.preventDefault();</script>");
			}


			break;

							
							case 95:
							$b=$_GET['b'];
							$code=$_GET['code'];
							$dep=$_GET['dep'];
							$resultg = mysqli_query($db, "update accesstbl set ".$dep."='".$b."' where AccessCode=".$code."");
							break;

							
							case 96:
							$sumno=$_GET['sumno'];
							$prescid=$_GET['prescid'];
							
							if(isset($_SESSION['dis'])){
								$diseases=implode(";",$_SESSION['dis']);
							}else $diseases=NULL;

							$s=strlen($diseases);
							$diseases=substr($diseases,0,$s);
							
							$resultb= mysqli_query($db, "update inpatients set DiagName='".$diseases."' where PrescId='".$_GET['prescid']."'");

							if($sumno>0){
							$rcptno=$sumno;
							$result = mysqli_query($db, "DELETE from discharge where sumno='".$sumno."'");	
							}else{
							//get receipt no
							$question =mysqli_query($db, "SELECT * FROM discharge order by id desc limit 0,1");
							$ans=mysqli_fetch_array($question);
							$rcptno=stripslashes($ans['sumno'])+1;
							}
							$result = mysqli_query($db, "insert into discharge values('0','".$rcptno."','".$_GET['patid']."','".$_GET['patname']."','".$_GET['admdate']."','".$_GET['disdate']."','".$_GET['age']."','".$_GET['sex']."','".$_GET['disdiag']."','".mysqli_real_escape_string($db, trim($_GET['dismed']))."','".mysqli_real_escape_string($db, trim($_GET['clinsumm']))."','".$_GET['doctor']."','".$_GET['nextapp']."','".date('d/m/Y')."','".date('Ymd')."',1,'".$fullname."')");

							if($result){
								echo"<script>
								window.open('report.php?id=58&rcptno=".$rcptno."');
								$().customAlert();
										alert('Success!', '<p>Summary processed.</p>');
										</script>";
								exit;
							}
							else{
								echo"
								<script>
								$().customAlert();
								alert('Sorry!', '<p>Please repeat again.</p>');
								e.preventDefault();
								</script>";
							}
							break;
							
							case 97:
							$resultc = mysqli_query($db, "insert into admsumm values('0','".date('d/m/Y')."','".$_GET['patid']."','".$_GET['patname']."','".$_GET['mode']."','".$_GET['doctor']."','".$_GET['diag']."','".$_GET['code']."','".$_GET['admdate']."','".$_GET['disdate']."','".mysqli_real_escape_string($db, trim($_GET['odetail']))."','".date('Ymd')."',1,'".$fullname."','".$_GET['invoice']."','".$_GET['in_presc_id']."','".$_GET['in_patient_id']."')");
							
							$pid=$_GET['pid'];
							$result =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
							$num_results = mysqli_num_rows($result);
							$rowb=mysqli_fetch_array($result);
							$bno=stripslashes($rowb['BedNo']);
							$rno=stripslashes($rowb['RoomNo']);
							$patid=stripslashes($rowb['PatId']);
							$resulta= mysqli_query($db, "update wardbeds set status=0,patname='',patid='',doctor='' where bedno='".$bno."' and roomno='".$rno."'  and patid='".$patid."'");
							#$resultc= mysqli_query($db, "UPDATE temp_bill SET status=6 WHERE patid='".$patid."' AND status=5");
							$resultb= mysqli_query($db, "update inpatients set Admitted=0,Discharge='".$_GET['disdate']."' where PrescId='".$_GET['pid']."'");
								#$resultb = mysqli_query($db, "DELETE from tempbill where patid='".$patid."'");	
								if($resultc&&$resultb){
								echo"<script>
										$().customAlert();
										alert('Success!', '<p>Patient Discharged.</p>');
										setTimeout(function() {
											admsumm1();},500);
										</script>";
											
							exit;
									}
									else{
										echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Please repeat again.</p>');
										e.preventDefault();
										</script>";
									}
							break;
							
							
							case 98:
							$pid=$_GET['pid'];
							$resultg = mysqli_query($db, "update newprescription set Admitted=3 where PrescId='".$pid."'");
							if($resultg){
								echo"STATUS:<b>PATIENT DUE FOR ADMISSION AT RECORDS OFFICE</b>";
							}
							break;
							
							
							case 99:
							$patid=$_GET['patid'];
							#$pay=strtoupper($_GET['pay']);
							$wardid=$_GET['wardid'];
							$mainward=$_GET['mainward'];
							$wardtype=$_GET['wardtype'];
							$roomno=$_GET['roomno'];
							$bedno=$_GET['bedno'];
							$ipnosett=$_GET['ipnosett'];
							$ipno=$_GET['ipno'];
							$doc=strtoupper($_GET['doc']);
							$medrec=$_GET['medrec'];
							$oldpatientid=$_GET['oldpatientid'];
							$insid=$_GET['insid'];
							$insname=strtoupper($_GET['insname']);
							$acctype=$_GET['acctype'];
							$typeclinics=$_GET['typeclinics'];
							$patientname=$_GET['patientname'];
							
							
							//sort out inpatient NO
							if($ipnosett==1){
							//get i/p no if new patient
							$result =mysqli_query($db, "select * from ipnos order by id desc limit 0,1");
							$num_results = mysqli_num_rows($result);
							$row=mysqli_fetch_array($result);
							if(mysqli_num_rows($result)==0){
							$ipno='1/'.date('Y');
								}else {
									$d=substr(stripslashes($row['ipno']),-4,4);
										if($d!=date('Y')){
										$ipno='1/'.date('Y');	
										}
										else{
										$a=substr(stripslashes($row['ipno']),-5,5);
										$b=preg_replace('~'.$a.'~', '', stripslashes($row['ipno']));
										$c=$b + 1;
										$ipno=$c.'/'.date('Y');}
								}
								$resulte = mysqli_query($db, "insert into ipnos values('0','".$ipno."')");
							}
							
							$resultg = mysqli_query($db, "update patients set ipno='".$ipno."' where auto=".$oldpatientid."");
							
							if($_GET['wardtype']!='either'){
								$resulta = mysqli_query($db, "select * from patients where auto='".$_GET['oldpatientid']."'");
								$row=mysqli_fetch_array($resulta);
								$gender=stripslashes($row['gender']);
								// if($_GET['wardtype']!=$gender){
								// 	echo"<script>
								// 		$().customAlert();
								// 		alert('Error!', '<p>You are attempting to admit a ".$gender." patient in a ".$_GET['wardtype']." ward!</p>');
								// 		e.preventDefault();
								// 		</script>";
								// 		exit;
								// } //SORT OUT MEDICAL RECORD ISSUE
							
								// else 
								if($medrec==0){
								$resultc =mysqli_query($db, "SELECT * FROM inpatients WHERE PatId='".$patid."' AND old_in_patient_id='".$oldpatientid."' order by PrescId desc limit 0,1");
									if(mysqli_num_rows($resultc)==0){										
											echo"<script>
											$().customAlert();
											alert('Sorry!', '<p>No medical record exists for this patient. Select Create New Record under Medical Record Setting.</p>');
											e.preventDefault();
											</script>";
											
												exit;
									}
								
								$rowc=mysqli_fetch_array($resultc);
								$prescid=stripslashes($rowc['PrescId']);
								$resulth = mysqli_query($db, "update inpatients set Admitted=1,AdmDate='".date('d/m/Y')."',PayMode='".$pay."',Doctor='".$doc."',MainWard='".$mainward."',WardType='".$wardtype."',RoomNo='".$roomno."',BedNo='".$bedno."' where PrescId='".$prescid."'");
								$resultg = mysqli_query($db, "update wardbeds set patname='".$patientname."',patid='".$patid."',status=1,doctor='".$fullname."' where id=".$wardid."");
								
								}
							}
							
							if($medrec==1){
							$resultc =mysqli_query($db, "SELECT * FROM inpatients order by Id desc limit 0,1");
							$rowc=mysqli_fetch_array($resultc);
							$prescid=stripslashes($rowc['Id'])+1;
							$prescid='I-'.$prescid;


							$resultd =mysqli_query($db, "SELECT * FROM inpatients WHERE PatId='".$patid."' AND old_in_patient_id='".$oldpatientid."' AND Admitted!=0 order by PrescId desc limit 0,1");
								if(mysqli_num_rows($resultd)>0){

										
										echo"<script>
										$().customAlert();
										alert('Sorry!', '<p>Patient has already been admitted!</p>');
										e.preventDefault();
										</script>";
										
											exit;
								}

							// $resultd =mysqli_query($db, "SELECT * FROM sales WHERE ClientId='".$patid."' and Status=1 and ItemCode='84' order by TransNo desc limit 0,1");
							// 	if(mysqli_num_rows($resultd)==0){										
							// 			echo"<script>
							// 			$().customAlert();
							// 			alert('Sorry!', '<p>Patient has not paid inpatient admission fee! Go to billing and bill Admission Deposit/Fee</p>');
							// 			e.preventDefault();
							// 			</script>";										
							// 				exit;
							// 	}else{

							// 	$rowd=mysqli_fetch_array($resultd);
							// 	$transno=stripslashes($rowd['TransNo']);
							// 	$resulth = mysqli_query($db, "update sales set Status=2 where TransNo='".$transno."'");
							

							// 	}
							
							
							// $resultc =mysqli_query($db, "SELECT auto,fullnames FROM patients where auto='".$oldpatientid."' order by auto desc limit 0,1");
							// #$resultc =mysqli_query($db, "SELECT auto,fullnames FROM patients where pntno='".$patid."' order by auto desc limit 0,1");
							// $rowc=mysqli_fetch_array($resultc);
						  // $patientid=stripslashes($rowc['auto']);		

							$resulta = mysqli_query($db, "insert into inpatients values('0','".$prescid."','".date('Y/m/d')."','".$patid."','".$patientname."','".$mainward."','1','".$wardtype."','".$roomno."','".$bedno."','".date('d/m/Y')."','','".$doc."','',1,'".date('Ymd')."','".$insname."','','','".$acctype."','".$typeclinics."','".$oldpatientid."','".$insid."')");

							$resultg = mysqli_query($db, "update wardbeds set patname='".$patientname."',patid='".$patid."',status=1,doctor='".$fullname."' where id=".$wardid."");

							
							}
							
							
							
							
							
			if($resultc>0){
				//send popups
				$resultc =mysqli_query($db, "SELECT * FROM compips WHERE dept='".$ward."'");
				$num_resultsc = mysqli_num_rows($resultc);	
				for ($i=0; $i <$num_resultsc; $i++) {
				$rowc=mysqli_fetch_array($resultc);
				$ip=stripslashes($rowc['ip']);		
				
					$resultd =mysqli_query($db, "SELECT * FROM logintable WHERE computerip='".$ip."'");
					$num_resultsd = mysqli_num_rows($resultd);	
					for ($d=0; $d <$num_resultsd; $d++) {
					$rowd=mysqli_fetch_array($resultd);
					$user=stripslashes($rowd['username']);
					$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient for Admission from Records','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
					}
							
				}
							
							$resulta = mysqli_query($db, "insert into log values('0','".$username." makes a patient admission from records.IP No:".$ipno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
											echo'<img alt="" src="images/tick.png" width="30px" height="30px"/>';
						echo"<script>
							window.open('report.php?id=66&rcptno=".$prescid."');
							
						$().customAlert();
							alert('Successful!', '<p>Patient admitted.<br/>System Patient No:<b>".$patid."</b><br/>I/P No:<b>".$ipno."</b></p>');
								setTimeout(function() {
											editpatient(158);},500);
										</script>";
										
										exit;
									}
									else{
														echo'<img alt="" src="images/delete.png" width="30px" height="30px"/>';
									echo"<script>
										$().customAlert();
										alert('Sorry!', '<p>Please try again.Check Direct Admission if patient has not seen the doctor yet.</p>');
										e.preventDefault();
										</script>";
									} 
						
							break;

		case 100:
			$a = 'ward';
			$in_presc_id=trim(mysqli_real_escape_string($db,$_GET['presc_id']));
			$in_patient_id=trim(mysqli_real_escape_string($db,$_GET['patient_id']));
			$bill_uid = guidv4();
			$invno_uid = guidv4(); //TODO: CONFIRM IF THEY SHOULD BE IN THE FOR LOOP LIKE billno

			if (isset($_SESSION[$a])) {
				$max = count($_SESSION[$a]);
				#echo "<pre>";print_r($_SESSION[$a]);echo "</pre>";
				##echo "<pre>";print_r($row);echo "</pre>";
				for ($i = 0; $i < $max; $i++) {
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
					$date = $_SESSION[$a][$i][14];
					$catid = $_SESSION[$a][$i][15];
					#$prescid = $_SESSION[$a][$i][16];
					#$clientid = $_SESSION[$a][$i][17];
					$stamp = preg_replace('~/~', '', $date);
					$date = $date . '-' . date('H:i');
					$iid = $_SESSION[$a][$i][12];
					$names = $_SESSION[$a][$i][13];
					#$nwsubn = $itprice*$itquat;

					$billno = getBillNo($db);


					$resulta = mysqli_query($db, "insert into tempbill values('0','" . $regn . "','" . $oname . "','" . $itcode . "','" . $itname . "','" . $categ . "','" . $itprice . "','" . $itquat . "','" . $tprice . "','" . $disc . "','" . $subn . "','" . $date . "','" . $iid . "','" . $names . "','" . $stamp . "',1,'" . $in_presc_id . "','" . $in_patient_id . "','" . $billno . "','" . $catid . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");


					$outpatno = getOutPatientClientNo($db, $in_patient_id);
					$inpatno = getInPatientClientNo($db, $in_patient_id);


					//update reduction of items
					// $query = mysqli_query($db, "select * from items where ItemCode='" . $itcode . "'");
					// $rowq = mysqli_fetch_array($query);
					// $type = stripslashes($rowq['Type']);

					// if ($type == 'GOOD') {
					// 	#$categ='PHARMACY';
					// 	$bal = stripslashes($rowq[$categ]);
					// 	$pack = stripslashes($rowq['Pack']);
					// 	$qsold = stripslashes($rowq['Qsold']);
					// 	$diff = $bal - $itquat;
					// 	$soldqty = $qsold + $qty;

					// 	$resultd = mysqli_query($db, "insert into stocktrack values('0','" . date('Y/m/d') . "','" . $categ . "','" . $itcode . "','" . $itname . "','" . $pack . "','INPATIENT SALES-" . $oname . "','" . $itquat . "','" . $diff . "','" . $username . "','" . $stamp . "')");

					// 	$resultb = mysqli_query($db, "update items set " . $categ . "='" . $diff . "', Qsold='" . $soldqty . "', TransDate='" . date('d/m/Y') . "', TranStamp='" . date('Ymd') . "', TimeStamp='" . date('YmdHi') . "', Activity='IPDSALES-FROM-" . $categ . "', MoreDetail='IPDSALES-FROM-" . $categ . "-TO-" . $oname . "', Quantity='" . $itquat . "', TransactedBy='" . $names . "' where ItemCode='" . $itcode . "' and Type='GOOD'");

					// 	$rcpt_uid = 0;
					// 	$rcvpayref76 = 0;
					// 	$hasInsurance = 0;
					// 	$cid = 0;
					// 	$cname = 0;
					// 	$rcv_copayment = 0;
					// 	$mode = 'Companies';
					// 	$isop = 0;
					// 	$isip = 1;

					// 	//update ledgers        
					// 	$resultb = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE ledgerid='630'");
					// 	$rowb = mysqli_fetch_assoc($resultb);
					// 	$opening_inventorybal = floatval($rowb['bal']);
					// 	$closing_inventorybal = floatval($opening_inventorybal) - floatval($subn);

					// 	$resultc = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE ledgerid='644'");
					// 	$rowc = mysqli_fetch_assoc($resultc);
					// 	$opening_cogbal = floatval($rowc['bal']);
					// 	$closing_cogbal = floatval($opening_cogbal) + floatval($subn);

					// 	$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','630','Inventory','644','Cost of Goods Sold','" . $subn . "','Inpatient Drugs','" . $date . "','" . $closing_inventorybal . "','" . $closing_cogbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_inventorybal . "','" . $opening_cogbal . "','patient','" . $regn . "','" . $oname . "',null,'inpatient_drugs_charge_sheet','" . $rcpt_uid . "',null,'" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "','','','" . $rcv_copayment . "','','" . $itcode . "','" . $categ . "','" . $mode . "','" . $username . "','" . $isop . "','" . $isip . "','','" . $inpatno . "','')");
					// 	$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_inventorybal . "' WHERE ledgerid=630 ");
					// 	$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_cogbal . "' WHERE ledgerid=644 ");
					// }
				}
			}


			if ($resulta) {
				@mysqli_query($db, "CALL GetUserLogs('".$username." adds item to patient interim bill','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
				unset($_SESSION[$a]);
				echo "<script>
							window.open('report.php?id=40&regn=" . safe_encode($regn) . "&cid=" . safe_encode($in_patient_id) . "&pid=" . safe_encode($in_presc_id) . "');
						$().customAlert();
						alert('Successful!', '<p>Item added to charge sheet.</p>');
							setTimeout(function() {
							inbill();},500);
						</script>";
				exit;
			} else {
				echo "<script>
						$().customAlert();
						alert('Sorry!', '<p>Please try again.</p>');
						e.preventDefault();
						</script>";
			}


			break;

						case 101:
							$stamp=date('Ymd');
							$dat=date('Y/m/d');
							$regn=$_GET['regn'];
							
							//get receipt no
							$question =mysqli_query($db, "SELECT * FROM sales order by TransNo desc limit 0,1");
							$ans=mysqli_fetch_array($question);
							$rcptno=stripslashes($ans['RcptNo'])+1;
							
							$c=0;
							$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' and status=1 and itcode NOT IN('84')");
							$num_results = mysqli_num_rows($result);
							if($num_results==0){
								echo"<script>
										$().customAlert();
										alert('Sorry!', '<p>The patient bill is empty. Add some items first before submitting.</p>');
										e.preventDefault();
										</script>";
										exit;
							}
							
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);				

							$query =mysqli_query($db, "select ItemCode,CategoryId from items where ItemCode='".stripslashes($row['itcode'])."'");
							$rowq=mysqli_fetch_array($query);
							$type=stripslashes($rowq['CategoryId']);

							$resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".stripslashes($row['category'])."','".stripslashes($row['itcode'])."','".stripslashes($row['itname'])."','".stripslashes($row['quat'])."','".stripslashes($row['price'])."',0,'".stripslashes($row['disc'])."','".stripslashes($row['subnet'])."',0,1,'".$dat."','".stripslashes($row['patid'])."','".stripslashes($row['patname'])."','','','','','','','','','','','".$stamp."','','".$username."',0,'".stripslashes($row['iid'])."','','".stripslashes($row['old_in_patient_id'])."','','".stripslashes($rowq['CategoryId'])."','')");
							}						
							
							if($resulta){
							$resultb= mysqli_query($db, "update tempbill set status=0 where patid='".$patid."'");		
							#$resultb= mysqli_query($db, "update temp_bill set status=0 where patid='".$patid."'");		
									echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
									echo"<script>$('#totitems').val('');$('#total').val('');$('#tprice').val('');$('#price44').val('');$('#quat44').val('');$('#disc44').val('');$('#sub44').val('');
									$('#disc44').prop('readonly',true);$('#disc44').css({'border' : 'solid #DC2626 1px'});</script>";
										$resultc = mysqli_query($db, "insert into log values('0','".$username." posts bill.Rcpt No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo"
										<script>
										$().customAlert();
										alert('Success!', '<p>Bill Posted.</p>');
										</script>";
										exit;
									}
									else{
									$result = mysqli_query($db, "DELETE from sales where rcptno='".$rcptno."'");
										echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
										e.preventDefault();
										</script>";
									}
							
							break;
							
							case '102':
							$code=$_GET['code'];
							$resulta = mysqli_query($db, "update drugrecord set drugs='".$_GET['b']."',dose='".$_GET['c']."',route='".$_GET['d']."',notes='".$_GET['e']."',cost='".$_GET['f']."',tid='".$code."' where id='".$code."'");	
								
							
								if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits drug record table.id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img alt="" src="images/tick.png" width="16px" height="16px"/>';
								}
								else{
									echo'<img alt="" src="images/tick.png" width="16px" height="16px"/>';
									}
							break;
							
							case '103':
							$code=$_GET['code'];
							$resulta = mysqli_query($db, "update drugrecord set ".$_GET['box']."='".$_GET['a']."' where id='".$code."'");	
								
							break;
							
							case '104':
							$pid=$_GET['pid'];
						
							$resulta = mysqli_query($db, "insert into drugrecord values('0','".$_GET['pid']."','".$_GET['patid']."','".$_GET['patname']."','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
							if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." adds new row into drug record table.pid:".$_GET['pid']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo"
				<script>
				$.ajax({
				url:'link.php',
				data:{id:43,pid:'".$pid."'},
				success:function(data){
				$('#mainp').html(data);
				}
				});
			</script>";
								}
								
								
							break;
							
							case 105:
							$a=$_GET['a'];
							$b=$_GET['b'];
							
							$resulta = mysqli_query($db, "select * from wardbeds where id='".$a."'");
							$rowa=mysqli_fetch_array($resulta);
							
							$resultb= mysqli_query($db, "update wardbeds set status=1,patname='".stripslashes($rowa['patname'])."',patid='".stripslashes($rowa['patid'])."',doctor='".stripslashes($rowa['doctor'])."' where id='".$_GET['b']."'");
							$resultc= mysqli_query($db, "update wardbeds set status=0,patname='',patid='',doctor='' where id='".$_GET['a']."'");
							
							$result = mysqli_query($db, "select * from inpatients where PatId='".stripslashes($rowa['patid'])."' order by PrescId desc limit 0,1");
							$row=mysqli_fetch_array($result);
							$pid=stripslashes($row['PrescId']);
							
							$resultd = mysqli_query($db, "select * from wardbeds where id='".$b."'");
							$rowd=mysqli_fetch_array($resultd);
							
							
							$resultb= mysqli_query($db, "update inpatients set BedNo='".stripslashes($rowd['bedno'])."',RoomNo='".stripslashes($rowd['roomno'])."',WardType='".stripslashes($rowd['wardtype'])."',Doctor='".stripslashes($rowd['doctor'])."' WHERE PrescId='".$pid."'");
							
							
							if($resultb){
						$resulta = mysqli_query($db, "insert into log values('0','".$username." transfers patient to new bed.Bed No:".$_GET['b']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo"
										<script>
										setTimeout(function() {
											inpatient();},1000);
										</script>";
							}else{echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px; margin-right:10px; width:20px; height:20px"></p>';}
							
							
							
							break;
							
							case 106:
							$dat=$_GET['dat'];
							$a=$_GET['a'];
							
							$resulta = mysqli_query($db, "select * from drugrecord where id='".$a."'");
							$rowa=mysqli_fetch_array($resulta);
							$pid=stripslashes($rowa['pid']);
							
							$resultb = mysqli_query($db, "insert into drugrecord values('0','".stripslashes($rowa['pid'])."','".stripslashes($rowa['patid'])."','".stripslashes($rowa['patname'])."','".$_GET['dat']."','".stripslashes($rowa['drugs'])."','".stripslashes($rowa['dose'])."','".stripslashes($rowa['route'])."','".stripslashes($rowa['notes'])."','".stripslashes($rowa['cost'])."','','','','','','','','','','','','','','','','','','','','','','','','','".date('Ymd')."',1,'".stripslashes($rowa['tid'])."')");
							
							
							if($resultb){
						$resulta = mysqli_query($db, "insert into log values('0','".$username." Adds new day of :".stripslashes($rowa['drugs'])."-Day:".$_GET['dat']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo'<img alt="" src="images/tick.png" width="16px" height="16px"/>';
						echo"
							<script>
							$.ajax({
							url:'link.php',
							data:{id:43,pid:'".$pid."'},
							success:function(data){
							$('#mainp').html(data);
							}
							});
							$('#addnewday' ).dialog( 'close' );
						</script>";
								}
								else{
									echo'<img alt="" src="images/tick.png" width="16px" height="16px"/>';
									}
							
							
							break;
							case 107:
							$b=$_GET['b'];
							$code=$_GET['code'];
							$dep=$_GET['dep'];
							$resultg = mysqli_query($db, "update sections set ".$dep."='".$b."' where id=".$code."");
							break;
							case '108':
							$code=$_GET['code'];
							$result = mysqli_query($db, "DELETE from compips where id=".$code."");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes computer from computer ips database.Comp ID:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							break;
							case '109':
							$code=$_GET['code'];
							$ip=$_GET['ip'];
							$name=$_GET['name'];
							$dept=$_GET['dept'];
							$result = mysqli_query($db, "update compips set dept='".$_GET['dept']."',name='".$_GET['name']."',ip='".$_GET['ip']."' where id='".$code."'");	
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates Computer IPs database.Comp Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="width:16px; height:16px; margin-top:-10px; margin-left:20px"></p>';
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="width:16px; height:16px; margin-top:0px"></p>';
									}
							break;
							
							case '110':
						$result= mysqli_query($db, "insert into compips values('0','".$_GET['ip']."','".$_GET['dept']."','".$_GET['name']."')");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts data into computer ips database.IP No:".$_GET['ip']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					
							if($result){
									echo'<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px"></p>';
									echo "<script>paginate(15,0);</script>";
									}
									else{
										echo'<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px"></p>';
										}
							
							break;	
		case '111':
			if (isset($_GET['code'])) {
				$code = intval($_GET['code']);
				$result = mysqli_query($db, "DELETE FROM banktbl WHERE id=" . $code . "");
				@mysqli_query($db, "insert into log values('','" . $username . " deletes bank from banks database.Bank ID:" . $code . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
			}

		break;
		case '112':
			if (isset($_GET['name']) && isset($_GET['code'])) {
				$code = intval($_GET['code']);
				$name = mysqli_real_escape_string($db, trim(htmlspecialchars($_GET['name'])));
				$result = mysqli_query($db, "update banktbl set bank='" . $name . "' where id=" . $code . "");
				if ($result) {
					@mysqli_query($db, "insert into log values('','" . $username . " updates Banks database.Bank Id:" . $code . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					echo '<p><img alt="Tick" src="images/tick.png" style="width:16px; height:16px; margin-top:-10px; margin-left:20px"></p>';
				} else {
					echo '<p><img alt="Delete" src="images/delete.png" style="width:16px; height:16px; margin-top:0px"></p>';
				}
			} else {
				echo '<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px"></p>';
			}


		break;
		case '113':
			if (isset($_GET['name'])) {
				$name = mysqli_real_escape_string($db, trim(htmlspecialchars($_GET['name'])));
				$result = mysqli_query($db, "insert into banktbl values('','" . $name . "')");

				if ($result) {
					@mysqli_query($db, "insert into log values('','" . $username . " inserts data into banks database.Bank Name:" . $_GET['name'] . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					echo '<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px"></p>';
					echo "<script>paginate(16,0);</script>";
				} else {
					echo '<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px"></p>';
				}
			} else {
				echo '<p><img alt="Delete" src="images/delete.png" style="width:30px; height:30px"></p>';
			}

		break;
		case '114':
			if (isset($_GET['cr']) && isset($_GET['amount']) && isset($_GET['desc']) && isset($_GET['crname']) && isset($_GET['datepick2']) && isset($_GET['cashcol_depositacntid'])) {
				$cr = intval($_GET['cr']); //Cashier Ledgerid
				$crname = trim(mysqli_real_escape_string($db, $_GET['crname']));
				$cashcol_depositacntid = intval($_GET['cashcol_depositacntid']);
				$cashcol_depositacntname = trim(mysqli_real_escape_string($db, $_GET['cashcol_depositacntname']));
				$desc = trim(mysqli_real_escape_string($db, str_replace("'", "", $_GET['desc'])));
				$amount = floatval(str_replace(",", "", trim($_GET['amount'])));
				$datepick2 = trim(mysqli_real_escape_string($db, $_GET['datepick2']));
				$date = date('Y/m/d');
				$stamp = date('Ymd');

				if ($cr == 0 || $cashcol_depositacntid == 0) {
					echo "<script>
											$().customAlert();
													alert('Error', '<p>Please select cashier and deposit accounts.</p>');
											</script>";
					exit(0);
				}

				if ($amount < 0 || $amount == 0) {
					echo "<script>
											$().customAlert();
													alert('Error', '<p>Please enter amount collected and try again.</p>');
											</script>";
					exit(0);
				}

				//Credit cashier account	
				$resultCr = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE `ledgerid`='" . $cr . "' ");
				if (mysqli_num_rows($resultCr) > 0) {
					$rowCr = mysqli_fetch_assoc($resultCr);
					$cashierAcOpeningBal = floatval($rowCr['bal']);
					$cashierAcClosingBal = $cashierAcOpeningBal - $amount; //new cr bal

				} else {
					echo "<script>
											$().customAlert();
													alert('Error', '<p>Cashier ledger not found </p>');
											</script>";
					exit(0);
				}

				//Debit cash account	
				$resultDr = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE `ledgerid`='" . $cashcol_depositacntid . "' ");
				$rowDr = mysqli_fetch_assoc($resultDr);
				$drAcOpeningBal = floatval($rowDr['bal']);
				$drAcClosingBal = $drAcOpeningBal + $amount;

				if ($cashierAcOpeningBal < $amount) {
					echo "<script>
											$().customAlert();
													alert('Error', '<p>Selected cashier balance is less than the amount collected.</p>');
											</script>";
					exit(0);
				}

				@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $cr . "','" . $crname . "','" . $cashcol_depositacntid . "','" . $cashcol_depositacntname . "','" . $amount . "','" . $desc . " - " . $date . "','" . $datepick2 . "','" . $cashierAcClosingBal . "','" . $drAcClosingBal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $cashierAcOpeningBal . "','" . $drAcOpeningBal . "',NULL,NULL,NULL,NULL,'cashier_cash_collection',null,null,null,0,null,null,626,626,null,null,null,'','','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
				if (mysqli_affected_rows($db) > 0) {
					@mysqli_query($db, "UPDATE ledgers SET bal='" . $cashierAcClosingBal . "' WHERE ledgerid='" . $cr . "' ");
					@mysqli_query($db, "UPDATE ledgers SET bal='" . $drAcClosingBal . "' WHERE ledgerid='" . $cashcol_depositacntid . "' ");
					@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Collects cash from " . $crname . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

					echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
					echo "<script>
										setTimeout(function() {
													cashcollect();},500);
											</script>";
					exit(1);
				} else {
					die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
				}
			} else {
				die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
			}


			break;
		case '115':
			if (isset($_GET['expensemgt_acntid']) && isset($_GET['expense_departmentid']) && isset($_GET['expense_payfrm_acntid']) && isset($_GET['expensedate']) && isset($_GET['amount'])) {
				$expenseAcntId = intval($_GET['expensemgt_acntid']);
				$expenseAcntName = trim(mysqli_real_escape_string($db, $_GET['expensemgt_acntname']));
				$desc = trim(mysqli_real_escape_string($db, $_GET['desc']));
				$amount = floatval(preg_replace('~,~', '', $_GET['amount']));
				$expensedate = trim(mysqli_real_escape_string($db, $_GET['expensedate']));
				$expense_refno = trim(mysqli_real_escape_string($db, $_GET['expense_refno']));
				$expense_departmentname = mysqli_real_escape_string($db, $_GET['expense_departmentname']);
				$expense_payfrm_acntid = intval($_GET['expense_payfrm_acntid']);
				$expense_payfrm_acntname = mysqli_real_escape_string($db, $_GET['expense_payfrm_acntname']);
				$expense_departmentid = intval($_GET['expense_departmentid']);
				$stamp = preg_replace('~/~', '', $expensedate);

				$expense_payfrm_subledgerid = intval($_GET['expense_payfrm_subledgerid']);
				$expensemgt_acntid_subledgerid = intval($_GET['expensemgt_acntid_subledgerid']);

				$resultMain = mysqli_query($db, "SELECT `isMainLedger` FROM ledgers WHERE ledgerid='" . $expenseAcntId . "' LIMIT 0,1 ");
				if (mysqli_num_rows($resultMain) > 0) {
					$rowMain = mysqli_fetch_assoc($resultMain);
					if (intval($rowMain['isMainLedger']) == 1) {
						if ($expensemgt_acntid_subledgerid == 0) {
							die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a bank sub account and try again. </p>');e.preventDefault();</script>");
						} else {
							$resultSub = mysqli_query($db, "SELECT `name`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $expensemgt_acntid_subledgerid . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultSub) > 0) {
								$rowSub = mysqli_fetch_assoc($resultSub);
								if (intval($rowSub['mainLedgerId']) == $expenseAcntId) {
									$expenseAcntId = $expensemgt_acntid_subledgerid;
									$expenseAcntName = trim(stripslashes($rowSub['name']));
								} else {
									die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Incorrect expense account subledger main bank account. </p>');e.preventDefault();</script>");
								}
							} else {
								die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid expense account subledger. </p>');e.preventDefault();</script>");
							}
						}
					}
				} else {
					die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid expense account. </p>');e.preventDefault();</script>");
				}

				$resultMain1 = mysqli_query($db, "SELECT `isMainLedger` FROM ledgers WHERE ledgerid='" . $expense_payfrm_acntid . "' LIMIT 0,1 ");
				if (mysqli_num_rows($resultMain1) > 0) {
					$rowMain1 = mysqli_fetch_assoc($resultMain1);
					if (intval($rowMain1['isMainLedger']) == 1) {
						if ($expense_payfrm_subledgerid == 0) {
							die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a bank or cash sub account and try again. </p>');e.preventDefault();</script>");
						} else {
							$resultSub1 = mysqli_query($db, "SELECT `name`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $expense_payfrm_subledgerid . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultSub1) > 0) {
								$rowSub1 = mysqli_fetch_assoc($resultSub1);
								if (intval($rowSub1['mainLedgerId']) == $expense_payfrm_acntid) {
									$expense_payfrm_acntid = $expense_payfrm_subledgerid;
									$expense_payfrm_acntname = trim(stripslashes($rowSub1['name']));
								} else {
									die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Incorrect bank/cash subledger main bank account. </p>');e.preventDefault();</script>");
								}
							} else {
								die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank/cash account subledger. </p>');e.preventDefault();</script>");
							}
						}
					}
				} else {
					die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank/cash account. </p>');e.preventDefault();</script>");
				}

				if ($expenseAcntId == 0 || $expense_payfrm_acntid == 0 || $expense_departmentid == 0 || empty($expensedate)) {
					die("<script>$().customAlert();alert('Error', '<p>Transaction accounts, department, transaction date and amount are required.</p>');e.preventDefault();</script>");
				}

				if ($amount == 0 || $amount < 0) {
					die("<script>$().customAlert();alert('Error', '<p>Please enter amount and try again.</p>');e.preventDefault();</script>");
				}

				//expense account	
				$resultEx = mysqli_query($db, "SELECT bal,mainLedgerId FROM ledgers WHERE ledgerid='" . $expenseAcntId . "' ");
				$rowEx = mysqli_fetch_assoc($resultEx);
				$expenseAcnt_parentId = intval($rowEx['mainLedgerId']);
				$expenseAcnt_openingBal = floatval($rowEx['bal']);
				$expenseAcnt_closingBal = floatval($rowEx['bal']) + floatval($amount);

				//Cash/Bank account	
				$resultCr = mysqli_query($db, "SELECT bal,mainLedgerId,category FROM ledgers WHERE ledgerid='" . $expense_payfrm_acntid . "' ");
				$rowCr = mysqli_fetch_assoc($resultCr);
				$bankAcnt_category = trim(stripslashes($rowCr['category']));
				$bankAcnt_parentId = intval($rowCr['mainLedgerId']);
				$bankAcnt_openingBal = floatval($rowCr['bal']);
				$bankAcnt_closingBal = floatval($rowCr['bal']) - floatval($amount);

				if (floatval($bankAcnt_openingBal) < floatval($amount)) {
					die("<script>$().customAlert();alert('Error', '<p>Available cash/ bank account balance is less than expense amount.</p>');e.preventDefault();</script>");
				}

				$rcpt_uid = guidv4();
				@mysqli_query($db, "INSERT INTO expenses VALUES('','" . $expensedate . "','" . $amount . "','" . $expense_refno . "','" . $expenseAcntId . "','" . $expenseAcntName . "','" . $expense_payfrm_acntid . "','" . $expense_payfrm_acntname . "','" . $bankAcnt_category . "','" . $expense_departmentid . "','" . $expense_departmentname . "','" . $desc . "','" . $rcpt_uid . "','" . $stamp . "','" . date('Y-m-d H:i:s') . "','" . $username . "','1') ");
				if (mysqli_affected_rows($db) > 0) {
					@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $expense_payfrm_acntid . "','" . $expense_payfrm_acntname . "','" . $expenseAcntId . "','" . $expenseAcntName . "','" . $amount . "','" . $desc . "','" . $expensedate . "','" . $bankAcnt_closingBal . "','" . $expenseAcnt_closingBal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $bankAcnt_openingBal . "','" . $expenseAcnt_openingBal . "','','','','','add_expense','" . $rcpt_uid . "',null,'" . $expense_refno . "',0,null,null,'" . $bankAcnt_parentId . "','" . $expenseAcnt_parentId . "',null,null,null,'" . $expense_departmentname . "','" . $bankAcnt_category . "','" . $username . "','0','0','','',null,'uno','dos','tres','cuatro','cinco','seis')");
					@mysqli_query($db, "UPDATE ledgers SET bal='" . $bankAcnt_closingBal . "' WHERE ledgerid='" . $expense_payfrm_acntid . "' ");
					@mysqli_query($db, "UPDATE ledgers SET bal='" . $expenseAcnt_closingBal . "' WHERE ledgerid='" . $expenseAcntId . "' ");
					@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Adds an expense. Expense Account:" . $expenseAcntName . " Amount:" . $amount . " Paid From:" . $expense_payfrm_acntname . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					die('<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p><script>setTimeout(function() {expman();},500);</script>');
				} else {
					die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
				}
			}

			break;

		case '116':
			if (isset($_GET['cashdepo_refno']) && isset($_GET['cashdepo_amount']) && isset($_GET['cashdepo_cashledgerid']) && isset($_GET['cashdepo_bankledgername']) && isset($_GET['cashdepo_bankledgerid'])) {
				$cashdepo_bankledgerid = intval($_GET['cashdepo_bankledgerid']);
				$cashdepo_bankledgername = trim(mysqli_real_escape_string($db, $_GET['cashdepo_bankledgername']));
				$cashdepo_cashledgerid = intval($_GET['cashdepo_cashledgerid']);
				$cashdepo_cashledgername = trim(mysqli_real_escape_string($db, $_GET['cashdepo_cashledgername']));
				$cashdepo_desc = trim(mysqli_real_escape_string($db, $_GET['cashdepo_desc']));
				$cashdepo_refno = trim(mysqli_real_escape_string($db, $_GET['cashdepo_refno']));
				$cashdepo_amount = floatval(str_replace(",", "", trim($_GET['cashdepo_amount'])));
				$cashdepo_datepick2 = trim(mysqli_real_escape_string($db, $_GET['cashdepo_datepick2']));
				$date = date('Y/m/d');
				$stamp = date('Ymd');

				$cashdepo_cash_subledgerid = intval($_GET['cashdepo_cash_subledgerid']);
				$cashdepo_bank_subledgerid = intval($_GET['cashdepo_bank_subledgerid']);
				$cashdepo_otherincomes_debtorid = intval($_GET['cashdepo_otherincomes_debtorid']);
				$cashdepo_otherincomes_departmentid = intval($_GET['cashdepo_otherincomes_departmentid']);
				$cashdepo_cashledger_type = '';

				$resultMain = mysqli_query($db, "SELECT `isMainLedger`,`type` FROM ledgers WHERE ledgerid='" . $cashdepo_cashledgerid . "' LIMIT 0,1 ");
				if (mysqli_num_rows($resultMain) > 0) {
					$rowMain = mysqli_fetch_assoc($resultMain);
					$cashdepo_cashledger_type = trim(stripslashes($rowMain['type']));
					if (intval($rowMain['isMainLedger']) == 1) {
						if ($cashdepo_cash_subledgerid == 0) {
							die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a cash sub account and try again. </p>');e.preventDefault();</script>");
						} else {
							$resultSub = mysqli_query($db, "SELECT `name`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $cashdepo_cash_subledgerid . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultSub) > 0) {
								$rowSub = mysqli_fetch_assoc($resultSub);
								if (intval($rowSub['mainLedgerId']) == $cashdepo_cashledgerid) {
									$cashdepo_cashledgerid = $cashdepo_cash_subledgerid;
									$cashdepo_cashledgername = trim(stripslashes($rowSub['name']));
								} else {
									die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Incorrect cash subledger main bank account. </p>');e.preventDefault();</script>");
								}
							} else {
								die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid cash subledger. </p>');e.preventDefault();</script>");
							}
						}
					}

					if ($cashdepo_cashledger_type == 'Other_Income' && ($cashdepo_otherincomes_debtorid == 0 || $cashdepo_otherincomes_departmentid == 0)) {
						die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Department and debtor name are required for other incomes. </p>');e.preventDefault();</script>");
					} else if ($cashdepo_cashledger_type != 'Other_Income') {
						$cashdepo_otherincomes_debtorid = 0;
						$cashdepo_otherincomes_departmentid = 0;
					}
				} else {
					die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid cash account. </p>');e.preventDefault();</script>");
				}

				$resultMain1 = mysqli_query($db, "SELECT `isMainLedger` FROM ledgers WHERE ledgerid='" . $cashdepo_bankledgerid . "' LIMIT 0,1 ");
				if (mysqli_num_rows($resultMain1) > 0) {
					$rowMain1 = mysqli_fetch_assoc($resultMain1);
					if (intval($rowMain1['isMainLedger']) == 1) {
						if ($cashdepo_bank_subledgerid == 0) {
							die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank subaccount and try again. </p>');e.preventDefault();</script>");
						} else {
							$resultSub1 = mysqli_query($db, "SELECT `name`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $cashdepo_bank_subledgerid . "' LIMIT 0,1 ");
							if (mysqli_num_rows($resultSub1) > 0) {
								$rowSub1 = mysqli_fetch_assoc($resultSub1);
								if (intval($rowSub1['mainLedgerId']) == $cashdepo_bankledgerid) {
									$cashdepo_bankledgerid = $cashdepo_bank_subledgerid;
									$cashdepo_bankledgername = trim(stripslashes($rowSub1['name']));
								} else {
									die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Incorrect bank subledger main bank account. </p>');e.preventDefault();</script>");
								}
							} else {
								die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank subledger. </p>');e.preventDefault();</script>");
							}
						}
					}
				} else {
					die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
				}


				if ($cashdepo_cashledgerid == 0 || $cashdepo_bankledgerid == 0) {
					echo "<script>
												$().customAlert();
														alert('Error', '<p>Please select valid cash and bank accounts.</p>');
												</script>";
					exit(0);
				}
				if ($cashdepo_refno == '') {
					echo "<script>
												$().customAlert();
														alert('Error', '<p>Please enter transaction reference number.</p>');
												</script>";
					exit(0);
				}

				if ($cashdepo_amount == 0 || $cashdepo_amount < 0) {
					echo "<script>
							$().customAlert();
							alert('Error', '<p>Please enter amount to deposit.</p>');
							</script>";
					exit(0);
				}

				$resulta = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid='" . $cashdepo_cashledgerid . "' LIMIT 0,1 ");
				$rowa = mysqli_fetch_assoc($resulta);
				$cashledger_openingbal = floatval($rowa['bal']);

				if ($cashledger_openingbal < $cashdepo_amount) {
					echo "<script>
												$().customAlert();
														alert('Error', '<p>Available cash account balance " . number_format($cashledger_openingbal, 2, '.', ',') . " is less than deposited amount.</p>');
												</script>";
					exit(0);
				}

				$cashledger_closingbal = $cashledger_openingbal - $cashdepo_amount;

				$resultb = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid='" . $cashdepo_bankledgerid . "' LIMIT 0,1 ");
				$rowb = mysqli_fetch_assoc($resultb);
				$bankledger_openingbal = floatval($rowb['bal']);
				$bankledger_closingbal = $bankledger_openingbal + $cashdepo_amount;

				$rcpt_uid = guidv4();
				if ($cashdepo_cashledger_type == 'Other_Income') {
					$resultOI = mysqli_query($db, "SELECT ItemCat FROM categories WHERE CatId='" . $cashdepo_otherincomes_departmentid . "' LIMIT 0,1 ");
					$rowOI = mysqli_fetch_assoc($resultOI);
					$cashdepo_otherincomes_departmentname = trim(stripslashes($rowOI['ItemCat']));
					$resultOI = mysqli_query($db, "SELECT CustomerName FROM creditcustomers WHERE CustomerId='" . $cashdepo_otherincomes_debtorid . "' LIMIT 0,1 ");
					$rowOI = mysqli_fetch_assoc($resultOI);
					$cashdepo_otherincomes_debtorname = trim(stripslashes($rowOI['CustomerName']));

					@mysqli_query($db, "INSERT INTO bankdeposits VALUES('','" . $rcpt_uid . "','" . $cashdepo_amount . "','" . $cashdepo_datepick2 . "','other income deposit','" . $cashdepo_refno . "','" . $cashdepo_cashledgerid . "','" . $cashdepo_cashledgername . "','" . $cashdepo_bankledgerid . "','" . $cashdepo_bankledgername . "','" . $cashdepo_desc . "','" . $username . "','" . $stamp . "',1,'" . $cashdepo_otherincomes_departmentid . "','" . $cashdepo_otherincomes_departmentname . "','debtor','" . $cashdepo_otherincomes_debtorid . "','" . $cashdepo_otherincomes_debtorname . "')");
					if (mysqli_affected_rows($db) > 0) {
						@mysqli_query($db, "UPDATE ledgers SET bal='" . $cashledger_closingbal . "' WHERE ledgerid='" . $cashdepo_cashledgerid . "'");
						@mysqli_query($db, "UPDATE ledgers SET bal='" . $bankledger_closingbal . "' WHERE ledgerid='" . $cashdepo_bankledgerid . "'");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $cashdepo_cashledgerid . "','" . $cashdepo_cashledgername . "','" . $cashdepo_bankledgerid . "','" . $cashdepo_bankledgername . "','" . $cashdepo_amount . "','" . $cashdepo_desc . " - " . $date . "','" . $cashdepo_datepick2 . "','" . $cashledger_closingbal . "','" . $bankledger_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $cashledger_openingbal . "','" . $bankledger_openingbal . "','debtor','" . $cashdepo_otherincomes_debtorid . "','" . $cashdepo_otherincomes_debtorname . "',null,'other_income_deposit','" . $rcpt_uid . "',null,'" . $cashdepo_refno . "',0,null,null,626,null,null,null,null,'" . $cashdepo_otherincomes_departmentname . "',null,'" . $username . "','0','0',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Deposits " . $cashdepo_otherincomes_departmentname . " other income from " . $cashdepo_otherincomes_debtorname . ". Bank Account:" . $cashdepo_bankledgername . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

						echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
						echo "<script>
												setTimeout(function() {
															bankdep();},500);
													</script>";
						exit;
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
					}
				} else {
					@mysqli_query($db, "INSERT INTO bankdeposits VALUES('','" . $rcpt_uid . "','" . $cashdepo_amount . "','" . $cashdepo_datepick2 . "','cash deposit','" . $cashdepo_refno . "','" . $cashdepo_cashledgerid . "','" . $cashdepo_cashledgername . "','" . $cashdepo_bankledgerid . "','" . $cashdepo_bankledgername . "','" . $cashdepo_desc . "','" . $username . "','" . $stamp . "',1,null,null,null,null,null)");
					if (mysqli_affected_rows($db) > 0) {
						@mysqli_query($db, "UPDATE ledgers SET bal='" . $cashledger_closingbal . "' WHERE ledgerid='" . $cashdepo_cashledgerid . "'");
						@mysqli_query($db, "UPDATE ledgers SET bal='" . $bankledger_closingbal . "' WHERE ledgerid='" . $cashdepo_bankledgerid . "'");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $cashdepo_cashledgerid . "','" . $cashdepo_cashledgername . "','" . $cashdepo_bankledgerid . "','" . $cashdepo_bankledgername . "','" . $cashdepo_amount . "','" . $cashdepo_desc . " - " . $date . "','" . $cashdepo_datepick2 . "','" . $cashledger_closingbal . "','" . $bankledger_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $cashledger_openingbal . "','" . $bankledger_openingbal . "',null,null,null,null,'cash_deposit','" . $rcpt_uid . "',null,'" . $cashdepo_refno . "',0,null,null,626,null,null,null,null,null,null,'" . $username . "','0','0',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Deposits cash. Bank Account:" . $cashdepo_bankledgername . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

						echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
						echo "<script>
												setTimeout(function() {
															bankdep();},500);
													</script>";
						exit;
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
					}
				}
			} else {
				die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
			}


		break;

		case 117:
			if (isset($_GET['patid']) && isset($_GET['amount'])) {
				$patid = intval($_GET['patid']);
				$amount = floatval(preg_replace('~,~', '', $_GET['amount']));
				$date = date('Y/m/d');
				$stamp = date('Ymd');

				$question = mysqli_query($db, "SELECT InvoiceNo FROM customerdebts WHERE DrCr='dr' ORDER BY TransNo DESC LIMIT 0,1");
				$ans = mysqli_fetch_assoc($question);
				$rcptno = intval($ans['InvoiceNo']);

				do {
					$rcptno += 1;
					$result = mysqli_query($db, "SELECT TransNo FROM customerdebts WHERE InvoiceNo='" . $rcptno . "' LIMIT 0,1");
				} while (mysqli_num_rows($result) > 0);

				$rcptnosArr = [];
				foreach ($_SESSION['consinvoice'] as $val) {
					$rcptnosArr[] = intval($val);
				}

				if (count($rcptnosArr) > 0) {
					//update credit customers
					$resultxd = mysqli_query($db, "SELECT * FROM receipts WHERE patid='" . $patid . "' AND rcptno='" . $rcptnosArr[0] . "' AND paymode='Companies' AND cid!=14 ");
					$num_results = mysqli_num_rows($resultxd);
					if ($num_results == 0) {
						$resultxd = mysqli_query($db, "SELECT * FROM receipts WHERE patid='" . $patid . "' AND rcptno='" . $rcptnosArr[0] . "' AND cid!=14 AND cid <> '' AND cid <> '0' AND cid <> 0");
						if (mysqli_num_rows($resultxd) == 0) {
							$resultxd = mysqli_query($db, "SELECT * FROM receipts WHERE patid='" . $patid . "' AND rcptno='" . $rcptnosArr[0] . "' AND cid!=14 AND cid!='' ");
						}
					}

					if (mysqli_num_rows($resultxd) > 0) {
						$rowxd = mysqli_fetch_assoc($resultxd);
						$cid = intval($rowxd['cid']);
						if ($cid > 0) {
							$rcpt_no = stripslashes($rowxd['rcptno']);
							$patid = intval($rowxd['patid']);
							$in_patient_id = intval($rowxd['old_patient_id']);

							$resultc = mysqli_query($db, "SELECT CustomerId,CustomerName,Bal FROM creditcustomers WHERE AccountReceivableLedgerID='" . $cid . "' LIMIT 0,1");
							if (mysqli_num_rows($resultc) > 0) {
								$rowc = mysqli_fetch_assoc($resultc);
								$insuranceCompanyId = intval($rowc['CustomerId']);
								$bal2 = floatval(preg_replace('~,~', '', $rowc['Bal']));
								$bal3 = $bal2 + $amount;
								$insuranceCompanyName = trim(mysqli_real_escape_string($db, $rowc['CustomerName']));

								$invoice_uid = guidv4();
								@mysqli_query($db, "INSERT INTO customerdebts VALUES('','" . $insuranceCompanyId . "','" . $insuranceCompanyName . "','" . $rcptno . "','" . $amount . "','dr','0','" . $amount . "','" . $bal3 . "','Patient Name: " . trim(mysqli_real_escape_string($db, $rowxd['patname'])) . "; Patient No:" . stripslashes($rowxd['patid']) . "; Ref No:" . stripslashes($rowxd['cardno']) . "','" . date('Y/m/d') . "','" . date('Ymd') . "',1,'" . stripslashes($rowxd['patid']) . "','" . trim(mysqli_real_escape_string($db, $rowxd['patname'])) . "','" . stripslashes($rowxd['old_patient_id']) . "','" . $cid . "','" . trim(mysqli_real_escape_string($db, $rowxd['cname'])) . "',NULL,NULL,'" . $invoice_uid . "','" . $username . "',NULL,NULL,NULL,'uno','dos','tres','cuatro','cinco','seis')");
								if (mysqli_affected_rows($db) > 0) {
									@mysqli_query($db, "UPDATE creditcustomers SET Bal='" . $bal3 . "' WHERE CustomerId='" . $insuranceCompanyId . "'");

									foreach ($_SESSION['consinvoice'] as $val) {
										@mysqli_query($db, "UPDATE receipts SET invno='" . $rcptno . "',insurance_invuid='" . $invoice_uid . "' WHERE rcptno='" . intval($val) . "' AND paymode='Companies'");
										@mysqli_query($db, "UPDATE tblreceipts SET invno='" . $rcptno . "',insurance_invuid='" . $invoice_uid . "' WHERE rcptno='" . intval($val) . "' AND paymode='Companies'");
										@mysqli_query($db, "UPDATE sales SET InvNo='" . $rcptno . "' WHERE RcptNo='" . intval($val) . "' ");
										@mysqli_query($db, "UPDATE ledgerentries SET invoiceUid='" . $invoice_uid . "' WHERE subjectType='patient' AND subjectId='" . $patid . "' AND payMode='Companies' AND rcptNo='" . intval($val) . "' ");
									}

									//LEDGERS ALREADY UPDATED WHEN RECIEVING PAYMENT
									@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Consolidates invoices. Invoice No: " . $rcptno . " Insurance: " . $insuranceCompanyName . " Patient: " . trim(mysqli_real_escape_string($db, $rowxd['patname'])) . " Amount: " . $amount . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
									unset($_SESSION['consinvoice']);
									echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
									echo "<script> window.open('outpathistory.php?id=3&rcptno=" . safe_encode($rcpt_no) . "&pid=" . safe_encode($patid) . "&&cid=" . safe_encode($in_patient_id) . "');
																								$().customAlert();
																							alert('Success!', '<p>Transaction Successful.</p>');
																							setTimeout(function() {
																								consinv();},500);
																						</script>";
									exit(1);
								} else {
									die("<script>$().customAlert();alert('Error', '<p>Transaction failed. Please Repeat the transaction.</p>');e.preventDefault();</script>");
								}
							} else {
								die("<script>$().customAlert();alert('Error', '<p>Transaction failed. Company not found</p>');e.preventDefault();</script>");
							}
						} else {
							die("<script>$().customAlert();alert('Error', '<p>Transaction failed. Company not found</p>');e.preventDefault();</script>");
						}
					} else {
						die("<script>$().customAlert();alert('Error', '<p>Transaction failed.</p>');e.preventDefault();</script>");
					}
				} else {
					die("<script>$().customAlert();alert('Sorry!', '<p>Transaction failed. Please repeat the transaction.</p>');e.preventDefault();</script>");
				}
			} else {
				die("<script>$().customAlert();alert('Error', '<p>Bad Request.</p>');e.preventDefault();</script>");
			}


			break;
							
							case 118:
							$code=$_GET['code'];
							$pro=array(array());
							
								$result =mysqli_query($db, "select * from branchtbl order by Branchname");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$bname=stripslashes($row['Branchname']);
								
								if($bname=='PROCUREMENT'){$dept='Bal';}else{$dept=$bname;}
								
								$resultd =mysqli_query($db, "SELECT * FROM items WHERE ItemCode='".$code."'");
								$rowd=mysqli_fetch_array($resultd);
								$bal=stripslashes($rowd[$dept]);
								$itname=stripslashes($rowd['ItemName']);
								if($bal>0){
									
									$pack=stripslashes($rowd['Pack']);
									$part=$bal%$pack;
									$unit=explode('.',($bal/$pack));
									$unit=$unit[0];
									$max=count($pro);
									if($max==0){
									$pro[0]=array($bname,$unit,$part);	
									}else{$pro[$max]=array($bname,$unit,$part);	}
								}
								
								
								
							}
							
							echo"<script>
							$(window).keydown(function(e) {
							if (e.keyCode == '27') {
								hidealert();
							}
							});
				</script>";
							echo'
							<div id="modalDiv">	</div>
							<div id="alertDiv" style="width:400px; height:200px;background:#fff;opacity:1000">';
							echo'<p class="title" style="margin-top:0">STOCK AVAILABILITY<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></p>';
							echo'<div class="message" style="padding:5px 15px">
												<h5>'.$itname.'-Pack:'.$pack.'</h5>
											<div id="inside" style="height:106px; overflow-y:auto">
													<div id="title">
													<div id="figure1" style="width:200px">Department</div>
													<div id="figure1" style="width:50px">Unit</div>
													<div id="figure1" style="width:50px">Part</div>
													</div>';
														$max=count($pro);
													for ($i=1; $i <$max; $i++) {
													echo"<div id=\"normal\" onclick=\"getstock('".$userdep."','".$pro[$i][0]."')\" title=\"Request from ".$pro[$i][0]."\">";
													echo"
													<div id=\"figure2\" style=\"width:200px\">".$pro[$i][0]."</div>
													<div id=\"figure2\" style=\"width:51px\">".$pro[$i][1]."</div>
													<div id=\"figure2\" style=\"width:51px\">".$pro[$i][2]."</div>
													</div><div class=\"cleaner\"></div>";
												
													}
													
							
						
							
							echo'
							</div>
						
							</div>
							
							</div>';
							break;
							
							case 119:
							$code=$_GET['code'];
							$pro=array(array());
							$itname='';
							
								$result =mysqli_query($db, "select * from creditsuppliers order by CustomerName");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$supid=stripslashes($row['CustomerId']);
								$sname=stripslashes($row['CustomerName']);
									
								$resultd =mysqli_query($db, "SELECT * FROM purchases WHERE SupplierId='".$supid."' and ItemCode='".$code."' order by TransNo desc limit 0,1");
								$num_resultsd = mysqli_num_rows($resultd);
								
								if($num_resultsd>0){
								$rowd=mysqli_fetch_array($resultd);
								$price=stripslashes($rowd['PurchPrice']);
								$itname=stripslashes($rowd['ItemName']);
								$max=count($pro);
									if($max==0){
									$pro[0]=array($sname,$price);	
									}else{$pro[$max]=array($sname,$price);		}
								}
							
							}
							
						echo"<script>
							$(window).keydown(function(e) {
							if (e.keyCode == '27') {
								hidealert();
							}
							});
							</script>";
							echo'<div id="modalDiv">	</div>
							<div id="alertDiv" style="width:400px; height:200px;background:#fff;opacity:1000">';
							echo'<p class="title" style="margin-top:0">PURCHASE PRICE COMPARISON<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></p>';
							echo'<div class="message" style="padding:5px 15px">
											<h5>'.$itname.'</h5>
											<div id="inside" style="height:106px; overflow-y:auto">
													<div id="title">
													<div id="figure1" style="width:250px">Supplier</div>
													<div id="figure1" style="width:50px">Price</div>
													</div>';
													$max=count($pro);
													for ($i=1; $i <$max; $i++) {
													echo'
													<div id="normal">';
													echo"
													<div id=\"figure2\" style=\"width:250px\">".$pro[$i][0]."</div>
													<div id=\"figure2\" style=\"width:51px\">".$pro[$i][1]."</div>
													</div><div class=\"cleaner\"></div>";
												
													}
													
							
						
							
							echo'</div></div>
							
							</div>';
							break;
							
							case 120:
							$name=$_GET['name'];
							$pass=$_GET['pass'];
							$authid=$_GET['authid'];
							
							switch($authid){
								case 1:
								$result = mysqli_query($db, "select * from users  where name='".$name."' and password = sha1('".$pass."') and ((dept='".$userdep."' and hod='HOD') or (Position='Admin' or Position='Store'))");
								$num_results = mysqli_num_rows($result);
								if($num_results>0){
									$resulta = mysqli_query($db, "insert into log values('0','".$name." authorizes Stock request transaction.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
									echo'<p><img alt="Tick" src="images/tick.png" style="margin-top:0px;width:30px; height:30px"></p>';
									echo"<script>
										$( '#adminauth2' ).dialog( 'close' );
									submitissue();</script>";
									
								}
								 else{echo'<p><img alt="Delete" src="images/delete.png" style="margin-top:0px;width:30px; height:30px"></p>';}
							
								
								break;
								
								
							}

							break;
							
							case 121:
			if (isset($_GET['regn']) && isset($_GET['adm']) && isset($_GET['bfrom']) && isset($_GET['hf1']) && isset($_GET['dn2']) && isset($_GET['bday']) && isset($_GET['comtotal']) && isset($_GET['old_presc_id'])) {
							
							$stamp=date('Ymd');
							$date=date('Y/m/d');
							$dat=date('Y/m/d');
							$patid = $regn = trim(mysqli_real_escape_string($db, $_GET['regn']));
							$patname = $name = trim(mysqli_real_escape_string($db, $_GET['name']));
							$adm = trim(mysqli_real_escape_string($db, $_GET['adm']));
							$bfrom = trim(mysqli_real_escape_string($db, $_GET['bfrom']));
							$bto = trim(mysqli_real_escape_string($db, $_GET['bto']));
							$bday = trim(mysqli_real_escape_string($db, $_GET['bday']));
							$bed = trim(mysqli_real_escape_string($db, $_GET['bed']));
							$btype = trim(mysqli_real_escape_string($db, $_GET['btype']));
										

							$insid = $cid = intval($_GET['insid']);
							$insname = trim(mysqli_real_escape_string($db, $_GET['insname']));

							$insid2 = $cid2 = intval($_GET['insid2']);
							$insname2 = trim(mysqli_real_escape_string($db, $_GET['insname2']));

							$hf1 = trim(mysqli_real_escape_string($db, $_GET['hf1']));
							$dn1 = trim(mysqli_real_escape_string($db, $_GET['dn1']));
							$parts = explode('ÃÂ¸', $dn1);
							$did1 = trim(mysqli_real_escape_string($db, $parts[0]));
							$dn1 = trim(mysqli_real_escape_string($db, $parts[1]));
							$dt1 = trim(mysqli_real_escape_string($db, $_GET['dt1']));

							$hf2 = trim(mysqli_real_escape_string($db, $_GET['hf2']));
							$dn2 = trim(mysqli_real_escape_string($db, $_GET['dn2']));
							$parts = explode('ÃÂ¸', $dn2);
							$did2 = trim(mysqli_real_escape_string($db, $parts[0]));
							$dn2 = trim(mysqli_real_escape_string($db, $parts[1]));
							$dt2 = trim(mysqli_real_escape_string($db, $_GET['dt2']));

							$hf3 = trim(mysqli_real_escape_string($db, $_GET['hf3']));
							$dn3 = trim(mysqli_real_escape_string($db, $_GET['dn3']));
							$parts = explode('ÃÂ¸', $dn3);
							$did3 = trim(mysqli_real_escape_string($db, $parts[0]));
							$dn3 = trim(mysqli_real_escape_string($db, $parts[1]));

							$dt3 = trim(mysqli_real_escape_string($db, $_GET['dt3']));

							$otdesc = trim(mysqli_real_escape_string($db, $_GET['otdesc']));
							$ottotal = floatval(preg_replace('~,~', '', $_GET['ottotal']));

							$subtotal = floatval(preg_replace('~,~', '', $_GET['subtotal']));
							$claimno = trim(mysqli_real_escape_string($db, $_GET['claimno']));
							$nhiftotal = floatval(preg_replace('~,~', '', $_GET['nhiftotal']));
							$comtotal = floatval(preg_replace('~,~', '', $_GET['comtotal']));
							$com2total = floatval(preg_replace('~,~', '', $_GET['com2total']));
							$cashtotal = floatval(preg_replace('~,~', '', $_GET['cashtotal']));
							$losstotal = floatval(preg_replace('~,~', '', $_GET['losstotal']));
							$disctotal = floatval(preg_replace('~,~', '', $_GET['disctotal']));
							$deptotal = floatval(preg_replace('~,~', '', $_GET['deptotal']));

							$old_in_presc_id = trim(mysqli_real_escape_string($db, $_GET['old_presc_id']));
							#$old_in_presc_no = trim(mysqli_real_escape_string($db, $_GET['old_presc_no']));
							$old_in_patient_id = intval($_GET['old_patient_id']);
							$paciente_interno = trim(mysqli_real_escape_string($db, $_GET['paciente_interno']));
							$mulacctotal = floatval(preg_replace('~,~', '', $_GET['mulacctotal']));
							$claim_reference_no = trim(mysqli_real_escape_string($db, $_GET['claim_reference_no']));
							$mulabkaccid = trim(mysqli_real_escape_string($db, $_GET['mulabkaccid']));
							$mulabkaccname = trim(mysqli_real_escape_string($db, $_GET['mulabkaccname']));
							$reference_no = trim(mysqli_real_escape_string($db, $_GET['reference_no']));
							$reference2_no = trim(mysqli_real_escape_string($db, $_GET['reference2_no']));
							$usr_cashacc_no = $cashacc = trim(mysqli_real_escape_string($db, $_GET['usr_cashacc_no']));
							$usr_cashacc_name = $cashname = trim(mysqli_real_escape_string($db, $_GET['usr_cashacc_name']));
							$old_category_id = 12;
							$category = 'WARD';

				if ($comtotal > 0 && $insid == 0) {
					die("<script>$().customAlert();alert('Error', '<p>Please select company to pay and try again.</p>');e.preventDefault();</script>");
				} else if ($comtotal > 0 && $insid > 0) {
					$result7 = mysqli_query($db, "SELECT AccountReceivableLedgerID FROM creditcustomers WHERE CustomerId='" . $insid . "'");
					if (mysqli_num_rows($result7) > 0) {
						$row7 = mysqli_fetch_assoc($result7);
						if (intval($row7['AccountReceivableLedgerID']) == 0) {
							die("<script>$().customAlert();alert('Error', '<p>Company account receivable not found.</p>');e.preventDefault();</script>");
						}
					} else {
						die("<script>$().customAlert();alert('Error','<p>Company not found.</p>');e.preventDefault();</script>");
					}
				}

				if ($com2total > 0 && $insid2 == 0) {
					die("<script>$().customAlert();alert('Error', '<p>Please select company to pay and try again.</p>');e.preventDefault();</script>");
				} else if ($com2total > 0 && $insid2 > 0) {
					$result34 = mysqli_query($db, "SELECT AccountReceivableLedgerID FROM creditcustomers WHERE CustomerId='" . $insid2 . "'");
					if (mysqli_num_rows($result34) > 0) {
						$row34 = mysqli_fetch_assoc($result34);
						if (intval($row34['AccountReceivableLedgerID']) == 0) {
							die("<script>$().customAlert();alert('Error', '<p>Company account receivable not found.</p>');e.preventDefault();</script>");
						}
					} else {
						die("<script>$().customAlert();alert('Error','<p>Company not found.</p>');e.preventDefault();</script>");
					}
				}

				if ($nhiftotal > 0) {
					$result8 = mysqli_query($db, "SELECT AccountReceivableLedgerID FROM creditcustomers WHERE CustomerId=26 ");
					if (mysqli_num_rows($result8) > 0) {
						$row8 = mysqli_fetch_assoc($result8);
						if (intval($row8['AccountReceivableLedgerID']) == 0) {
							die("<script>$().customAlert();alert('Error', '<p>NHIF account receivable not found.</p>');e.preventDefault();</script>");
						}
					} else {
						die("<script>$().customAlert();alert('Error','<p>NHIF not found.</p>');e.preventDefault();</script>");
					}
				}

				$question = mysqli_query($db, "SELECT InvoiceNo FROM customerdebts WHERE DrCr='dr' ORDER BY TransNo DESC LIMIT 0,1");
				$ans = mysqli_fetch_assoc($question);
				$invno = intval($ans['InvoiceNo']);
				do {
					$invno += 1;
					$result9 = mysqli_query($db, "SELECT InvoiceNo FROM customerdebts WHERE DrCr='dr' AND InvoiceNo='" . $invno . "' ");
				} while (mysqli_num_rows($result9) > 0);

				$invno_uid = guidv4();
				$arr = array();
				$k = 0;
				$resultc = mysqli_query($db, "SELECT Branchname FROM maindepts ORDER BY Branchname");
				$num_resultsc = mysqli_num_rows($resultc);
				for ($z = 0; $z < $num_resultsc; $z++) {
					$rowc = mysqli_fetch_assoc($resultc);
					$bname = stripslashes($rowc['Branchname']);
					$e = 0;
					$resultd = mysqli_query($db, "SELECT subnet FROM tempbill WHERE old_in_presc_id='" . $old_in_presc_id . "' AND old_in_patient_id='" . $old_in_patient_id . "' AND category='" . $bname . "' AND status!=4 AND itcode!='84'");
					$num_resultsd = mysqli_num_rows($resultd);
					for ($i = 0; $i < $num_resultsd; $i++) {
						$rowd = mysqli_fetch_assoc($resultd);
						$e += floatval(preg_replace('~,~', '', trim(stripslashes($rowd['subnet']))));
					}

					if ($e > 0) {
						$arr[$bname] = $e;
					}
					$k += $e;
				}


				$x = 0; //deposit
				$resultd = mysqli_query($db, "SELECT subnet FROM tempbill WHERE old_in_presc_id='" . $old_in_presc_id . "' AND old_in_patient_id='" . $old_in_patient_id . "' AND `itcode`='84'");
				$num_resultsd = mysqli_num_rows($resultd);
				for ($i = 0; $i < $num_resultsd; $i++) {
					$rowd = mysqli_fetch_assoc($resultd);
					$x += floatval(preg_replace('~,~', '', trim(stripslashes($rowd['subnet']))));
				}

				//get invoice no
				$question = mysqli_query($db, "SELECT billno FROM tempbill ORDER BY id DESC LIMIT 0,1");
				$ans = mysqli_fetch_assoc($question);
				$billno = intval($ans['billno']);
				do {
					$billno += 1;
					$result9 = mysqli_query($db, "SELECT billno FROM tempbill WHERE billno='" . $billno . "' ");
				} while (mysqli_num_rows($result9) > 0);

				//get receipt no
				$question = mysqli_query($db, "SELECT rcptno FROM finalbill ORDER BY id DESC LIMIT 0,1");

				if (mysqli_num_rows($question) == 0) {
					$frcpt = 1;
				} else {
					$ans = mysqli_fetch_assoc($question);
					$frcpt = intval($ans['rcptno']);
					do {
						$frcpt += 1;
						$result9 = mysqli_query($db, "SELECT rcptno FROM finalbill WHERE rcptno='" . $frcpt . "' ");
					} while (mysqli_num_rows($result9) > 0);
				}

				$frcpt_uid = guidv4();
				if ($x != 0) {
					$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','INPATIENT CASH DEPOSIT','','','','" . $deptotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				}

				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','ADMISSION FEES','','','','" . $adm . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','BED CHARGES','" . $bfrom . "','" . $bto . "','" . $bday . "','" . $bed . "','" . $btype . "',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");

				foreach ($arr as $key => $val) {
					$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','" . $key . "','','','','" . $val . "','',1,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				}
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','HOSPITAL FEES - " . $hf1 . "','" . $dn1 . "','','','" . $dt1 . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','HOSPITAL FEES - " . $hf2 . "','" . $dn2 . "','','','" . $dt2 . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','HOSPITAL FEES - " . $hf3 . "','" . $dn3 . "','','','" . $dt3 . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','OTHER FEES','" . $otdesc . "','','','" . $ottotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','SUBTOTAL','','','','" . $subtotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','DISCOUNT','','','','" . $disctotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				#$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','SHA INPATIENT','" . $claimno . "','','','" . $nhiftotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,'" . $insid . "','" . $insname . "',null,null,'" . $claimno . "')");

				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','BANK PAYMENT','" . $mulabkaccname . "','" . $claim_reference_no . "','','" . $mulacctotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,'" . $mulabkaccid . "','" . $mulabkaccname . "',null,null,'" . $claim_reference_no . "')");
				#$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','CLAIM AMOUNT','" . $insname . "','" . $reference_no . "','','" . $comtotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,'" . $insid . "','" . $insname . "',null,null,'" . $reference_no . "')");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','".$frcpt."','".$invno."','".$regn."','".$name."','CLAIM AMOUNT 1','".$insname."','".$reference_no."','','".$comtotal."','',5,'".$dat."','".$stamp."','".$username."','" . $frcpt_uid . "','" . $invno_uid . "',null,null,'" . $insid . "','" . $insname . "',null,null,'" . $reference_no . "')");	
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','".$frcpt."','".$invno."','".$regn."','".$name."','CLAIM AMOUNT 2','".$insname2."','".$reference2_no."','','".$com2total."','',5,'".$dat."','".$stamp."','".$username."','" . $frcpt_uid . "','" . $invno_uid . "',null,null,'" . $insid2 . "','" . $insname2 . "',null,null,'" . $reference2_no . "')");	

				#$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','".$frcpt."','".$invno."','".$regn."','".$name."','COMPANY TO PAY','".$insname."','','','".$comtotal."','',5,'".$dat."','".$stamp."','".$username."','".$frcpt_uid."','".$invno_uid."',null,null,'".$insid."','".$insname."',null,null,'".$claimno."')");	
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','CASH TO PAY','','','','" . $cashtotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");
				$resultz = mysqli_query($db, "INSERT INTO finalbill VALUES('','" . $frcpt . "','" . $invno . "','" . $regn . "','" . $name . "','DIFFERENCE','','','','" . $losstotal . "','',5,'" . $dat . "','" . $stamp . "','" . $username . "','" . $frcpt_uid . "','" . $invno_uid . "',null,null,null,null,null,null,null)");

				$bill_uid = guidv4();
				$invno_uid = guidv4();
				//admission
				if ($adm > 0) {
					$resulta = mysqli_query($db, "INSERT INTO tempbill VALUES('','" . $regn . "','" . $name . "','51','INPATIENT ADMISSION FEES','WARD','" . $adm . "','1','" . $adm . "','','" . $adm . "','" . $dat . "-" . date('H:i') . "','','" . $fullname . "','" . $stamp . "',1,'" . $old_in_presc_id . "','" . $old_in_patient_id . "','" . $billno . "','" . $old_category_id . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
				}
				//bed
				if ($bed > 0) {
					$resulta = mysqli_query($db, "INSERT INTO tempbill VALUES('','" . $regn . "','" . $name . "','52','INPATIENT BED CHARGES','WARD','" . $bed . "','1','" . $bed . "','','" . $bed . "','" . $dat . "-" . date('H:i') . "','','" . $fullname . "','" . $stamp . "',1,'" . $old_in_presc_id . "','" . $old_in_patient_id . "','" . $billno . "','" . $old_category_id . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
				}

				//doctor charges
				if ($dt1 > 0) {
					$resulta = mysqli_query($db, "INSERT INTO tempbill VALUES('','" . $regn . "','" . $name . "','53','INPATIENT DOCTORS FEES','WARD','" . $dt1 . "','1','" . $dt1 . "','','" . $dt1 . "','" . $dat . "-" . date('H:i') . "','" . $did1 . "','" . $fullname . "','" . $stamp . "',1,'" . $old_in_presc_id . "','" . $old_in_patient_id . "','" . $billno . "','" . $old_category_id . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
				}
				if ($dt2 > 0) {
					$resulta = mysqli_query($db, "INSERT INTO tempbill VALUES('','" . $regn . "','" . $name . "','54','INPATIENT NURSING FEES','WARD','" . $dt2 . "','1','" . $dt2 . "','','" . $dt2 . "','" . $dat . "-" . date('H:i') . "','" . $did2 . "','" . $fullname . "','" . $stamp . "',1,'" . $old_in_presc_id . "','" . $old_in_patient_id . "','" . $billno . "','" . $old_category_id . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
				}
				if ($dt3 > 0) {
					$resulta = mysqli_query($db, "INSERT INTO tempbill VALUES('','" . $regn . "','" . $name . "','55','INPATIENT DOCTORS FEES','WARD','" . $dt3 . "','1','" . $dt3 . "','','" . $dt3 . "','" . $dat . "-" . date('H:i') . "','" . $did3 . "','" . $fullname . "','" . $stamp . "',1,'" . $old_in_presc_id . "','" . $old_in_patient_id . "','" . $billno . "','" . $old_category_id . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
				}

				//other fees
				if ($ottotal > 0) {
					$resulta = mysqli_query($db, "INSERT INTO tempbill VALUES('','" . $regn . "','" . $name . "','56','INPATIENT OTHER CHARGES','WARD','" . $ottotal . "','1','" . $ottotal . "','','" . $ottotal . "','" . $dat . "-" . date('H:i') . "','','" . $fullname . "','" . $stamp . "',1,'" . $old_in_presc_id . "','" . $old_in_patient_id . "','" . $billno . "','" . $old_category_id . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
				}

				//transfer data from tempbill to sales and delete from tempbill
				$question = mysqli_query($db, "SELECT RcptNo FROM sales ORDER BY TransNo DESC LIMIT 0,1");
				$ans = mysqli_fetch_assoc($question);
				$rcptno = intval($ans['RcptNo']);
				do {
					$rcptno += 1;
					$result9 = mysqli_query($db, "SELECT RcptNo FROM sales WHERE RcptNo='" . $rcptno . "' ");
				} while (mysqli_num_rows($result9) > 0);

				$result = mysqli_query($db, "SELECT * FROM  tempbill WHERE patid='" . $regn . "' AND old_in_presc_id='" . $old_in_presc_id . "' AND old_in_patient_id='" . $old_in_patient_id . "' and status=1"); # and ItemCode!='84'
				$num_results = mysqli_num_rows($result);
				for ($i = 0; $i < $num_results; $i++) {
					$row = mysqli_fetch_assoc($result);
					$resulta = mysqli_query($db, "INSERT INTO sales VALUES('','" . $rcptno . "','" . stripslashes($row['category']) . "','" . stripslashes($row['itcode']) . "','" . stripslashes($row['itname']) . "','" . stripslashes($row['quat']) . "','" . stripslashes($row['price']) . "',0,'" . stripslashes($row['disc']) . "','" . stripslashes($row['subnet']) . "',0,1,'" . $dat . "','" . stripslashes($row['patid']) . "','" . stripslashes($row['patname']) . "','','','','','','','','','','','" . $stamp . "','" . $username . "','" . $username . "',1,'" . stripslashes($row['iid']) . "','','" . $old_in_patient_id . "','" . $userid . "','" . stripslashes($row['old_category_id']) . "','" . $fullname . "','uno','dos','tres','cuatro','cinco','seis')");
				}

				$result = mysqli_query($db, "DELETE FROM tempbill WHERE patid='" . $regn . "' AND old_in_presc_id='" . $old_in_presc_id . "' AND old_in_patient_id='" . $old_in_patient_id . "'");

				//cash
				$question = mysqli_query($db, "SELECT RcptNo FROM sales ORDER BY TransNo DESC LIMIT 0,1");
				$ans = mysqli_fetch_assoc($question);
				$rcptno2 = intval($ans['RcptNo']);
				do {
					$rcptno2 += 1;
					$result9 = mysqli_query($db, "SELECT RcptNo FROM sales WHERE RcptNo='" . $rcptno2 . "' ");
				} while (mysqli_num_rows($result9) > 0);

				if ($cashtotal != 0) {
					$rcpt_uid = guidv4();
					$resulta = mysqli_query($db, "insert into sales values('','" . $rcptno2 . "','WARD','57','INPATIENT CASH PAID','1','" . $cashtotal . "',0,'','" . $cashtotal . "',0,0,'" . date('Y/m/d') . "','" . $regn . "','" . $name . "','','','','','','','','','','','" . date('Ymd') . "','" . $usr_cashacc_name . "','" . $usr_cashacc_name . "',1,'1','','" . $old_in_patient_id . "','" . $userid . "','12','" . $fullname . "','uno','dos','tres','cuatro','cinco','seis')");

					$resultp = mysqli_query($db, "insert into receipts values('','" . date('Y/m/d') . "','" . $regn . "','" . $name . "','" . $rcptno2 . "','Cash','','','','" . $cashtotal . "','" . date('Ymd') . "',1,'" . $usr_cashacc_name . "','','WARD','" . date('Hi') . "','" . date('Ymd') . "" . date('Hi') . "','" . $old_in_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "',null,null,null,0,0,'" . $invno_uid . "',null,null,null,'','','" . $old_in_presc_id . "','inpatient',null,null,'uno','dos','tres','cuatro','cinco','seis')");

					$amount = $cashtotal;
					$resultb = mysqli_query($db, "SELECT `bal` FROM `ledgers` WHERE `ledgerid`='" . $usr_cashacc_no . "' LIMIT 0,1");
					$rowb = mysqli_fetch_assoc($resultb);
					$opening_cashbal = floatval($rowb['bal']);
					$cashbal = $opening_cashbal + $amount;

					$resultz = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `type`='Income' AND `category`='Department' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
					if (mysqli_num_rows($resultz) > 0) {
						$rowz = mysqli_fetch_assoc($resultz);
						$opening_incomebal = floatval($rowz['bal']);
						$incomeAccId = intval($rowz['ledgerid']);
						$incomebal = $opening_incomebal + $amount;
						$incomeAccName = $category;
					} else {
						$resultz = mysqli_query($db, "SELECT ledgerid,`bal` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
						$rowz = mysqli_fetch_assoc($resultz);
						$opening_incomebal = floatval($rowz['bal']);
						$incomeAccId = intval($rowz['ledgerid']);
						$incomebal = $opening_incomebal + $amount;
						$incomeAccName = 'Income';
					}

					$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $usr_cashacc_no . "','" . $usr_cashacc_name . "','" . $amount . "','" . ucwords(strtolower($category)) . " cash payment by patient " . strtolower($patname) . ". ','" . $dat . "','" . $incomebal . "','" . $cashbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_cashbal . "','patient','" . $patid . "','" . $patname . "',null,'ipd_receive_patient_payment','" . $rcpt_uid . "','','0','0','','',null,1,'0','inpatient',57,'" . $category . "','Cash','" . $username . "','0','1','','" . $paciente_interno . "','" . $rcptno2 . "','uno','dos','tres','cuatro','cinco','seis')");
					$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebal . "' WHERE ledgerid='" . $incomeAccId . "' ");
					$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $cashbal . "' WHERE ledgerid='" . $usr_cashacc_no . "'");
				}

						
							
				if($mulacctotal!=0){
					$amount=$mulacctotal;
					$rcpt_uid = guidv4();
				    $resultp = mysqli_query($db, "insert into receipts values('0','" . date('Y/m/d') . "','" . $regn . "','" . $name . "','" . $rcptno2 . "','Bank','" . $mulabkaccid . "','" . $mulabkaccname . "','" . $claim_reference_no . "','" . $amount . "','" . date('Ymd') . "',1,'" . $username . "','rcptno','WARD','" . date('Hi') . "','" . date('Ymd') . "" . date('Hi') . "','" . $old_in_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "',null,null,null,0,0,'" . $invno_uid . "',null,null,null,'','','" . $old_in_presc_id . "','inpatient',null,null,'uno','dos','tres','cuatro','cinco','seis')");

					$amount = $mulacctotal;
					$resultb = mysqli_query($db, "SELECT `bal`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $mulabkaccid . "' LIMIT 0,1 ");
					$rowb = mysqli_fetch_assoc($resultb);
					$bank_mainacntid = intval($rowb['mainLedgerId']);
					$opening_bankbal = floatval($rowb['bal']);
					$bankbal = $opening_bankbal + $amount;

					//get balance of income revenue ledger
					$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name`,`mainLedgerId` FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
					if (mysqli_num_rows($resultz) > 0) {
						$rowz = mysqli_fetch_assoc($resultz);
						$incomeaccnt_mainacntid = intval($rowz['mainLedgerId']);
						$opening_incomebal = floatval($rowz['bal']);
						$incomeAccId = intval($rowz['ledgerid']);
						$incomebal = $opening_incomebal + $amount;
						$incomeAccName = $category;
					} else { 
					    //get balance of income revenue ledger
						$resultz = mysqli_query($db, "SELECT `bal`,`mainLedgerId` FROM `ledgers` WHERE `ledgerid`=635 LIMIT 0,1 ");
						$rowz = mysqli_fetch_assoc($resultz);
						$incomeaccnt_mainacntid = intval($rowz['mainLedgerId']);
						$opening_incomebal = floatval($rowz['bal']);
						$incomebal = $opening_incomebal + $amount;
						$incomeAccId = 635;
						$incomeAccName = 'Income';
					}
					
					// @mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $mulabkaccid . "','" . $mulabkaccname . "','".$amount."','Bank Payment: Patient: " . ucwords(strtolower($patname)) . ".-Ref No:".$claim_reference_no."','".$date."','".$incomebal."','".$bankbal."','".$stamp."','','',0,'" . date('Y-m-d H:i:s') . "','".$opening_incomebal."','" . $opening_bankbal . "','patient','" . $patid . "','" . $patname . "',null,'ipd_receive_patient_payment','" . $rcpt_uid . "',null,'0','0','','',null,1,'0','inpatient',12,'" . $category . "','Bank','" . $username . "','0','1','','" . $paciente_interno . "','" . $rcptno . "')");

					@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $incomeAccId . "','" . $incomeAccName . "','" . $mulabkaccid . "','" . $mulabkaccname . "','" . $amount . "','" . ucwords(strtolower($category)) . " Bank Payment. Patient " . strtolower($patname) . ". ','" . $date . "','" . $incomebal . "','" . $bankbal . "','" . $stamp . "','" . $mulabkaccid . "','" . $mulabkaccname . "',0,'" . date('Y-m-d H:i:s') . "','" . $opening_incomebal . "','" . $opening_bankbal . "','patient','" . $patid . "','" . $patname . "',null,'ipd_receive_patient_payment','" . $rcpt_uid . "',null,'" . $claim_reference_no . "','" . $hasInsurance . "','','','" . $incomeaccnt_mainacntid . "','" . $bank_mainacntid . "','rcv_copayment',null,null,'" . $category . "','Bank','" . $username . "','0','0','','" . $paciente_interno . "','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
					@mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $incomebal . "' WHERE `ledgerid`='" . $incomeAccId . "' ");
					@mysqli_query($db, "UPDATE `ledgers` SET `bal`='" . $bankbal . "' WHERE `ledgerid`='" . $mulabkaccid . "'");									
				}



				//company
				if ($comtotal > 0) {
					$amount = $comtotal;
					$resultc = mysqli_query($db, "SELECT Bal,AccountReceivableLedgerID,IncomeAccountLedgerID FROM creditcustomers WHERE CustomerId='" . $insid . "'");
					$rowc = mysqli_fetch_assoc($resultc);
					$bal2 = floatval(preg_replace('~,~', '', trim(stripslashes($rowc['Bal']))));
					$company_acntreceivable_ledgerid = intval($rowc['AccountReceivableLedgerID']);
					$company_incomeacnt_ledgerid = intval($rowc['IncomeAccountLedgerID']);
					$bal3 = $bal2 + floatval($amount);

					$resultd = mysqli_query($db, "INSERT INTO customerdebts VALUES('','" . $insid . "','" . $insname . "','" . $invno . "','" . $comtotal . "','dr','0','" . $comtotal . "','" . $bal3 . "','Patient Name:" . $name . "; Patient No:" . $regn . "','" . date('Y/m/d') . "','" . date('Ymd') . "',1,'" . $regn . "','" . $name . "','" . $old_in_patient_id . "','" . $company_acntreceivable_ledgerid . "',NULL,'" . $company_incomeacnt_ledgerid . "',NULL,'" . $invno_uid . "','" . $username . "',NULL,NULL,NULL,'uno','dos','tres','cuatro','cinco','seis')");
					$resulte = mysqli_query($db, "UPDATE creditcustomers SET Bal='" . $bal3 . "' WHERE CustomerId='" . $cid . "'");
					$resulty = mysqli_query($db, "UPDATE sales SET InvNo='" . $invno . "' WHERE RcptNo='" . $rcptno . "'");
					$rcpt_uid = guidv4();
					$resultp = mysqli_query($db, "INSERT INTO receipts VALUES('','" . date('Y/m/d') . "','" . $regn . "','" . $name . "','" . $rcptno . "','Companies','" . $insid . "','" . $insname . "','" . $reference_no . "','" . $amount . "','" . date('Ymd') . "',1,'" . $username . "','" . $invno . "','WARD','" . date('Hi') . "','" . date('Ymd') . "" . date('Hi') . "','" . $old_in_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "',null,null,null,0,0,'" . $invno_uid . "',null,null,null,'','','" . $old_in_presc_id . "','inpatient',null,null,'uno','dos','tres','cuatro','cinco','seis')");

					$resultb = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid='" . $company_acntreceivable_ledgerid . "' ");
					$rowb = mysqli_fetch_assoc($resultb);
					$company_acntreceivable_ledgername = trim(stripslashes($rowb['name']));
					$company_acntreceivable_openingbal = floatval($rowb['bal']);
					$company_acntreceivable_closingbal = $company_acntreceivable_openingbal + floatval($amount);

					//get balance of income ledger
					$resultz = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid='" . $company_incomeacnt_ledgerid . "'   ");
					$rowz = mysqli_fetch_assoc($resultz);
					$company_incomeacnt_openingbal = floatval($rowz['bal']);
					$company_inccomeacnt_lname = trim(stripslashes($rowz['name']));
					$company_incomeacnt_closingbal = $company_incomeacnt_openingbal + floatval($amount);

					$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $company_incomeacnt_ledgerid . "','" . $company_inccomeacnt_lname . "','" . $company_acntreceivable_ledgerid . "','" . $company_acntreceivable_ledgername . "','" . $amount . "','Inpatient credit sale. Insurance: " . ucwords(strtolower($insname)) . " Invoice:" . $rcptno . "','" . $dat . "','" . $company_incomeacnt_closingbal . "','" . $company_acntreceivable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $company_incomeacnt_openingbal . "','" . $company_acntreceivable_openingbal . "','patient','" . $regn . "','" . $name . "','" . $rcptno . "','inpatient_company_invoice_posted','" . $rcpt_uid . "','" . $invno_uid . "','" . $reference_no . "',1,'" . $insid . "','" . $insname . "',null,null,null,'inpatient',null,'" . $category . "','Companies','" . $username . "','0','1',null,'" . $paciente_interno . "','" . $rcptno2 . "','uno','dos','tres','cuatro','cinco','seis')");
					$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $company_incomeacnt_closingbal . "' WHERE ledgerid='" . $company_incomeacnt_ledgerid . "' ");
					$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $company_acntreceivable_closingbal . "' WHERE ledgerid='" . $company_acntreceivable_ledgerid . "' ");
				}

				if ($com2total > 0) {
					$amount = $com2total;
					$resultc = mysqli_query($db, "SELECT Bal,AccountReceivableLedgerID,IncomeAccountLedgerID FROM creditcustomers WHERE CustomerId='".$insid2."'");
					$rowc = mysqli_fetch_assoc($resultc);
					$bal2 = floatval(preg_replace('~,~', '', trim(stripslashes($rowc['Bal']))));
					$nhif_acntreceivable_ledgerid = intval($rowc['AccountReceivableLedgerID']);
					$nhif_incomeacnt_ledgerid = intval($rowc['IncomeAccountLedgerID']);
					$bal3 = $bal2 + floatval($amount);

					$resultd = mysqli_query($db, "INSERT INTO customerdebts VALUES('','".$insid2."','".$insname2."','" . $invno . "','" . $com2total . "','dr','0','" . $com2total . "','" . $bal3 . "','Patient Name:" . $name . "; Patient No:" . $regn . "','" . date('Y/m/d') . "','" . date('Ymd') . "',1,'" . $regn . "','" . $name . "','" . $old_in_patient_id . "','" . $nhif_acntreceivable_ledgerid . "',NULL,'" . $nhif_incomeacnt_ledgerid . "',NULL,NULL,'" . $username . "',NULL,NULL,NULL,'uno','dos','tres','cuatro','cinco','seis')");
					$resulte = mysqli_query($db, "UPDATE creditcustomers SET Bal='" . $bal3 . "' WHERE CustomerId='".$insid2."' ");
					$resulty = mysqli_query($db, "UPDATE sales SET InvNo='".$invno."' WHERE RcptNo='".$rcptno."'");	
					$rcpt_uid = guidv4();
					$resultp = mysqli_query($db, "INSERT INTO receipts VALUES('','" . date('Y/m/d') . "','" . $regn . "','" . $name . "','" . $rcptno . "','Companies','".$insid2."','".$insname2."','".$reference2_no."','" . $amount . "','" . date('Ymd') . "',1,'" . $username . "','" . $invno . "','WARD','" . date('Hi') . "','" . date('Ymd') . "" . date('Hi') . "','" . $old_in_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "',null,null,null,0,0,'" . $invno_uid . "',null,null,null,'','','" . $old_in_presc_id . "','inpatient',null,null,'uno','dos','tres','cuatro','cinco','seis')");

					$resultb = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid='" . $nhif_acntreceivable_ledgerid . "' ");
					$rowb = mysqli_fetch_assoc($resultb);
					$nhif_acntreceivable_ledgername = trim(stripslashes($rowb['name']));
					$nhif_acntreceivable_openingbal = floatval($rowb['bal']);
					$nhif_acntreceivable_closingbal = $nhif_acntreceivable_openingbal + floatval($amount);

					$resultz = mysqli_query($db, "SELECT bal,`name` FROM ledgers WHERE ledgerid='" . $nhif_incomeacnt_ledgerid . "' ");
					$rowz = mysqli_fetch_assoc($resultz);
					$nhif_incomeacnt_openingbal = floatval($rowz['bal']);
					$nhif_inccomeacnt_lname = trim(stripslashes($rowz['name']));
					$nhif_incomeacnt_closingbal = $nhif_incomeacnt_openingbal + floatval($amount);

					$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $nhif_incomeacnt_ledgerid . "','" . $nhif_inccomeacnt_lname . "','" . $nhif_acntreceivable_ledgerid . "','" . $nhif_acntreceivable_ledgername . "','" . $amount . "','".$insname2." credit sale. ','" . $dat . "','" . $nhif_incomeacnt_closingbal . "','" . $nhif_acntreceivable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $nhif_incomeacnt_openingbal . "','" . $nhif_acntreceivable_openingbal . "','patient','" . $regn . "','" . $name . "','" . $rcptno . "','inpatient_company_invoice_posted','" . $rcpt_uid . "','" . $invno_uid . "','" . $reference2_no . "',1,'".$insid2."','".$insname2."',null,null,null,'inpatient',null,'" . $category . "','Companies','" . $username . "','0','1',null,'" . $paciente_interno . "','" . $rcptno2 . "','uno','dos','tres','cuatro','cinco','seis')");
					$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $nhif_incomeacnt_closingbal . "' WHERE ledgerid='" . $nhif_incomeacnt_ledgerid . "' ");
					$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $nhif_acntreceivable_closingbal . "' WHERE ledgerid='" . $nhif_acntreceivable_ledgerid . "' ");
				}

				//difference
				if (floatval($losstotal) > 0 || floatval($losstotal) < 0) {
					//TODO: if amount positive it shuld be recorded as a receivable if negative record as loss in p&l account
					if (floatval($losstotal) > 0) {
						$amount = $losstotal;
						$resultb = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `type`='Asset' AND mainLedgerId=628 AND `name`='" . $category . "' LIMIT 0,1 ");
						$rowb = mysqli_fetch_assoc($resultb);
						$diff_acnt_receivable_openingbal = floatval($rowb['bal']);
						$diff_acnt_receivable_ledgerid = intval($rowb['ledgerid']);
						$diff_acnt_receivable_closingbal = $diff_acnt_receivable_openingbal + $amount;

						$resultz = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `type`='Income' AND mainLedgerId=635 AND `name`='" . $category . "' LIMIT 0,1 ");
						$rowz = mysqli_fetch_assoc($resultz);
						$diff_income_acnt_openingbal = floatval($rowz['bal']);
						$diff_income_acnt_ledgerid = intval($rowz['ledgerid']);
						$diff_income_acnt_closingbal = $diff_income_acnt_openingbal + $amount;

						if ($diff_acnt_receivable_ledgerid > 0 && $diff_income_acnt_ledgerid > 0) {
							$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $diff_income_acnt_ledgerid . "','" . $category . "','" . $diff_acnt_receivable_ledgerid . "','" . $category . "','" . $amount . "','Inpatient bill difference. Invoice No: " . $invno . "','" . $dat . "','" . $diff_income_acnt_closingbal . "','" . $diff_acnt_receivable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $diff_income_acnt_openingbal . "','" . $diff_acnt_receivable_openingbal . "','patient','" . $regn . "','" . $name . "','" . $rcptno . "','inpatient_bill_difference','" . $frcpt_uid . "','" . $invno_uid . "',null,1,'" . $insid . "','" . $insname . "',null,null,null,'inpatient',null,'" . $category . "',null,'" . $username . "','0','1',null,'" . $paciente_interno . "','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
							$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_income_acnt_closingbal . "' WHERE ledgerid='" . $diff_income_acnt_ledgerid . "' ");
							$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_acnt_receivable_closingbal . "' WHERE ledgerid='" . $diff_acnt_receivable_ledgerid . "' ");
						} else {
							$resultb = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `ledgerid`=628 LIMIT 0,1 ");
							$rowb = mysqli_fetch_assoc($resultb);
							$diff_acnt_receivable_openingbal = floatval($rowb['bal']);
							$diff_acnt_receivable_ledgerid = intval($rowb['ledgerid']);
							$diff_acnt_receivable_closingbal = $diff_acnt_receivable_openingbal + $amount;

							$resultz = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `ledgerid`=635 LIMIT 0,1 ");
							$rowz = mysqli_fetch_assoc($resultz);
							$diff_income_acnt_openingbal = floatval($rowz['bal']);
							$diff_income_acnt_ledgerid = intval($rowz['ledgerid']);
							$diff_income_acnt_closingbal = $diff_income_acnt_openingbal + $amount;

							$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $diff_income_acnt_ledgerid . "','Income','" . $diff_acnt_receivable_ledgerid . "','Accounts Receivable','" . $amount . "','Inpatient bill difference. Invoice No: " . $invno . "','" . $dat . "','" . $diff_income_acnt_closingbal . "','" . $diff_acnt_receivable_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $diff_income_acnt_openingbal . "','" . $diff_acnt_receivable_openingbal . "','patient','" . $regn . "','" . $name . "','" . $rcptno . "','inpatient_bill_difference','" . $frcpt_uid . "','" . $invno_uid . "',null,1,'" . $insid . "','" . $insname . "',null,null,null,'inpatient',null,'" . $category . "',null,'" . $username . "','0','1',null,'" . $paciente_interno . "','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
							$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_income_acnt_closingbal . "' WHERE ledgerid='" . $diff_income_acnt_ledgerid . "' ");
							$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_acnt_receivable_closingbal . "' WHERE ledgerid='" . $diff_acnt_receivable_ledgerid . "' ");
						}
					} else {
						$amount = abs($losstotal);
						$resultz = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `type`='Expense' AND `name`='" . $category . "' LIMIT 0,1 ");
						$rowz = mysqli_fetch_assoc($resultz);
						$diff_expenseacnt_openingbal = floatval($rowz['bal']);
						$diff_expenseacnt_ledgerid = intval($rowz['ledgerid']);
						$diff_expenseacnt_closingbal = $diff_expenseacnt_openingbal + $amount;

						$resultb = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `type`='Liability' AND mainLedgerId=629 AND `name`='" . $category . "' LIMIT 0,1 ");
						$rowb = mysqli_fetch_assoc($resultb);
						$diff_acntpayable_openingbal = floatval($rowb['bal']);
						$diff_acntpayable_ledgerid = intval($rowb['ledgerid']);
						$diff_acntpayable_closingbal = $diff_acntpayable_openingbal + $amount;

						if ($diff_acntpayable_ledgerid > 0 && $diff_expenseacnt_ledgerid > 0) {
							$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $diff_acntpayable_ledgerid . "','" . $category . "','" . $diff_expenseacnt_ledgerid . "','" . $category . "','" . $amount . "','Inpatient bill difference. Invoice No: " . $invno . "','" . $dat . "','" . $diff_acntpayable_closingbal . "','" . $diff_expenseacnt_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $diff_acntpayable_openingbal . "','" . $diff_expenseacnt_openingbal . "','patient','" . $regn . "','" . $name . "','" . $rcptno . "','inpatient_bill_difference','" . $frcpt_uid . "','" . $invno_uid . "',null,1,'" . $insid . "','" . $insname . "',null,null,'positive','inpatient',null,'" . $category . "',null,'" . $username . "','0','1',null,'" . $paciente_interno . "','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
							$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_acntpayable_closingbal . "' WHERE ledgerid='" . $diff_acntpayable_ledgerid . "' ");
							$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_expenseacnt_closingbal . "' WHERE ledgerid='" . $diff_expenseacnt_ledgerid . "' ");
						} else {
							$resultb = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `ledgerid`=683 LIMIT 0,1 ");
							$rowb = mysqli_fetch_assoc($resultb);
							$diff_expenseacnt_openingbal = floatval($rowb['bal']);
							$diff_expenseacnt_ledgerid = intval($rowb['ledgerid']);
							$diff_expenseacnt_closingbal = $diff_expenseacnt_openingbal + $amount;

							$resultz = mysqli_query($db, "SELECT ledgerid,bal FROM ledgers WHERE `ledgerid`=629 LIMIT 0,1 ");
							$rowz = mysqli_fetch_assoc($resultz);
							$diff_acntpayable_openingbal = floatval($rowz['bal']);
							$diff_acntpayable_ledgerid = intval($rowz['ledgerid']);
							$diff_acntpayable_closingbal = $diff_acntpayable_openingbal + $amount;

							$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $diff_acntpayable_ledgerid . "','Accounts Payable','" . $diff_expenseacnt_ledgerid . "','Differences Expense','" . $amount . "','Inpatient bill difference. Invoice No: " . $invno . "','" . $dat . "','" . $diff_acntpayable_closingbal . "','" . $diff_expenseacnt_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $diff_acntpayable_openingbal . "','" . $diff_expenseacnt_openingbal . "','patient','" . $regn . "','" . $name . "','" . $rcptno . "','inpatient_bill_difference','" . $frcpt_uid . "','" . $invno_uid . "',null,1,'" . $insid . "','" . $insname . "',null,null,'negative','inpatient',null,'" . $category . "',null,'" . $username . "','0','1',null,'" . $paciente_interno . "','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
							$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_acntpayable_closingbal . "' WHERE ledgerid='" . $diff_acntpayable_ledgerid . "' ");
							$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $diff_expenseacnt_closingbal . "' WHERE ledgerid='" . $diff_expenseacnt_ledgerid . "' ");
						}
					}
				}

				//discount
				if ($disctotal > 0) {
					$amount = $losstotal;
					$resultb = mysqli_query($db, "SELECT bal FROM ledgers WHERE ledgerid=686");
					$rowb = mysqli_fetch_assoc($resultb);
					$disc_expense_openingbal = floatval($rowb['bal']);
					$disc_expense_closingbal = $disc_expense_openingbal + $amount;

					$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE `category`='Cashier' AND `name`='" . $username . "' LIMIT 0,1 ");
					if (mysqli_num_rows($resultz) == 0) {
						$resultz = mysqli_query($db, "SELECT ledgerid,bal,`name` FROM ledgers WHERE ledgerid=670 LIMIT 0,1 ");
					}
					$rowz = mysqli_fetch_assoc($resultz);
					$disc_cashant_openingbal = floatval($rowz['bal']);
					$disc_cashant_ledgerid = intval($rowz['ledgerid']);
					$disc_cashacnt_lname = trim(stripslashes($rowz['name']));
					$disc_cashant_closingbal = $disc_cashant_openingbal + $amount;

					$resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $disc_cashant_ledgerid . "','" . $disc_cashacnt_lname . "','686','Discounts Expense','" . $amount . "','Inpatient bill discount given to patient: " . ucwords(strtolower($name)) . "','" . $dat . "','" . $disc_cashant_closingbal . "','" . $disc_expense_closingbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $disc_cashant_openingbal . "','" . $disc_expense_openingbal . "','patient','" . $regn . "','" . $name . "','" . $rcptno . "','inpatient_bill_discount','" . $frcpt_uid . "','" . $invno_uid . "',null,1,'" . $insid . "','" . $insname . "',null,null,null,'inpatient',null,'" . $category . "',null,'" . $username . "','0','1',null,'" . $paciente_interno . "','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");
					$resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $disc_cashant_closingbal . "' WHERE ledgerid='" . $disc_cashant_ledgerid . "' ");
					$resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $disc_expense_closingbal . "' WHERE ledgerid=686 ");
				}

				if ($resultz) {
					@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Posts Inpatient Final Bill. Receipt No." . $rcptno . "','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
					echo '<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					echo "
											<script>
												window.open('report.php?id=68&rcptno=" . $frcpt . "');
												$().customAlert();
												alert('Success!', '<p>Bill Posted.</p>');
												setTimeout(function() {
													infinalbill();},500);
											</script>";
					exit;
				} else {
					die("<script>$().customAlert();alert('Error', '<p>Transaction failed. Please repeat the transaction.</p>');e.preventDefault();</script>");
				}
			} else {
				die("<script>$().customAlert();alert('Error', '<p>Bad Request.</p>');e.preventDefault();</script>");
			}



							
						// if($resultz){
						// 	$resulta = mysqli_query($db, "insert into log values('0','".$username." Posts Inpatient Final Bill.Receipt No.".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						// 	echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';	
						// 	echo"<img alt=\"Submit\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:0px 0 0 60px; float:left\" title=\"Submit\" onclick=\"generateRequestOrder('".$rcptno2."','".$cid."')\"/>";
						// 			echo"
						// 				<script>
						// 				window.open('report.php?id=68&rcptno=".$frcpt."');
						// 				$().customAlert();
						// 				alert('Success!', '<p>Bill Posted.</p>');
						// 				setTimeout(function() {
						// 					infinalbill();},500);
						// 				</script>";
						// 	exit;
						// 			}
						// 			else{
						// 				echo"
						// 				<script>
						// 				$().customAlert();
						// 				alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
						// 				e.preventDefault();
						// 				</script>";
						// 			}	
							
						
							
							break;
							

							case 123:
							$wid=$_GET['wid'];
							$waiverno=$_GET['waiverno'];
							$amc=$_GET['amc'];
							$amp=$_GET['amp'];
							$amw=$_GET['amw'];
							$diagn=$_GET['diagn'];
							$rcpt=$_GET['rcpt'];
							$social=$_GET['social'];
							

							$result = mysqli_query($db, "update waivers set amount_charged='".$_GET['amc']."',amount_paid='".$_GET['amp']."',amount_waived='".$_GET['amw']."',diagnosis='".$_GET['diagn']."',receiptnos='".$_GET['rcpt']."',notes='".$_GET['social']."' where id=".$wid."");	
							
							if($result){
									$resulta = mysqli_query($db, "insert into log values('0','".$username." updates waiver note.Waiver ID.".$wid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
								echo"<script>
								window.open('report.php?id=69&rcptno=".$waiverno."');
								$().customAlert();
										alert('Success!', '<p>Waiver Note Updated.</p>');
										setTimeout(function() {
											editpatient(160);},500);
										</script>";
							exit;
									}
									else{
										echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Please repeat again.</p>');
										e.preventDefault();
										</script>";
									}
							break;
							
							case 124:
							$pid=$_POST['pid'];
							$presc=$_POST['presc'];
							$resulta =mysqli_query($db, "SELECT * FROM inpatients WHERE PrescId='".$pid."'");
							$rowa=mysqli_fetch_array($resulta);
							$old_presc_id=stripslashes($rowa['Id']);
							$old_patient_id=stripslashes($rowa['old_in_patient_id']);
							$patid=stripslashes($rowa['PatId']);
							$patname=stripslashes($rowa['PatName']);
							$stamp=date('Ymd');
							$dat=date('Y/m/d');
							$paid=0;

							if(isset($_SESSION['dis'])){
								$diseases=implode(";",$_SESSION['dis']);
							}else $diseases=NULL;

							$s=strlen($diseases);
							$diseases=substr($diseases,0,$s);

							#History='".mysqli_real_escape_string($db, trim($_POST['history']))."',DiagName='".$diseases."',Diagnosis='".mysqli_real_escape_string($db, trim($_POST['diag']))."'
							$query_1= mysqli_query($db, "UPDATE inpatients SET DiagName='".$diseases."',Diagnosis='".mysqli_real_escape_string($db, trim($_POST['diag']))."' WHERE Id='".$old_presc_id."'");

							$arr=array();

							#$billno=getBillNo($db);
							$bill_uid = guidv4();
							$invno_uid = guidv4();
							
							if($_POST['recp']==1){
								$arr[]='PHARMACY';

								$a='pharmcart';								
								
								$max=count($_SESSION[$a]);
								for ($i = 0; $i < $max; $i++){
									$itcode = $_SESSION[$a][$i][0];
									$itname = $_SESSION[$a][$i][1];
									$itquat = $_SESSION[$a][$i][2];
									$itprice = $_SESSION[$a][$i][3];
									$tprice = $_SESSION[$a][$i][4];
									$oname = $_SESSION[$a][$i][5];
									$patname = $_SESSION[$a][$i][5];
									$regn = $_SESSION[$a][$i][6];
									$categ = $_SESSION[$a][$i][7];
									$total = $_SESSION[$a][$i][8];
									$disc = $_SESSION[$a][$i][9];
									$subn = $_SESSION[$a][$i][10];
									$iid = $_SESSION[$a][$i][12];

									$prescname= $_SESSION[$a][$i][13];
									$categ_id = $_SESSION[$a][$i][14];
									$disp=0;
									$arr[]=$categ;
									$dept=$categ;
									
											$billno = getBillNo($db);

											$query_2 = mysqli_query($db, "INSERT INTO tempbill VALUES('0','".$regn."','".$patname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$fullname."','".$stamp."',1,'".$old_presc_id."','".$old_patient_id."','".$billno."','".$categ_id."','" . $bill_uid . "','" . $invno_uid . "',null,null)");			

										    $last_id = mysqli_insert_id($db);
											$query_3 = mysqli_query($db, "INSERT INTO pharmrequests VALUES('0','".$pid."','".$patid."','".$patname."','".$prescname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$username."','".$stamp."',1,'".date('H:i')."','','".$fullname."','','".$old_presc_id."','".$old_patient_id."','".$billno."','".$paid."','".$last_id."','IPD','NORMAL')");		

											 $query_4 = mysqli_query($db, "UPDATE inpatients SET Doctor='".$old_in_full_name."',PatName='".$oname."' WHERE Id='".$old_presc_id."'");


								
								}

							}
							if($_POST['recl']==1){
								
								$labno = getLabNo($db);
								
								$a='lab';
								
								
								$max=count($_SESSION[$a]);
								for ($i = 0; $i < $max; $i++){
									$itcode = $_SESSION[$a][$i][0];
									$itname = $_SESSION[$a][$i][1];
									$itquat = $_SESSION[$a][$i][2];
									$itprice = $_SESSION[$a][$i][3];
									$tprice = $_SESSION[$a][$i][4];
									$oname = $_SESSION[$a][$i][5];
									$patname = $_SESSION[$a][$i][5];
									$regn = $_SESSION[$a][$i][6];
									$categ = $_SESSION[$a][$i][7];
									$total = $_SESSION[$a][$i][8];
									$disc = $_SESSION[$a][$i][9];
									$subn = $_SESSION[$a][$i][10];
									$iid = $_SESSION[$a][$i][12];
									$categ_id = $_SESSION[$a][$i][15];
									$sec = $_SESSION[$a][$i][16];
									$categ_id = 10;
									$disp=0;
									$arr[]=$categ;
									$dept=$categ;
									
									$billno = getBillNo($db);


									$result =mysqli_query($db, "SELECT * FROM tempbill WHERE patid='".$pid."' AND itcode='".$itcode."' AND old_in_presc_id='".$old_presc_id."' AND old_in_patient_id='".$old_patient_id."' AND stamp='".date('Ymd')."'");
									$num_results = mysqli_num_rows($result);
									if($num_results>=1){
										echo"
												<script>
												$().customAlert();
												alert('Error!', '<p>Similar item already exists.</p>');
												e.preventDefault();
												</script>";
										exit;
									}else{

										$query_4 = mysqli_query($db, "INSERT INTO tempbill VALUES('0','".$regn."','".$patname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$fullname."','".$stamp."',1,'".$old_presc_id."','".$old_patient_id."','".$billno."','".$categ_id."','" . $bill_uid . "','" . $invno_uid . "',null,null)");		

									    $last_id = mysqli_insert_id($db);
										$query_5 = mysqli_query($db, "INSERT INTO labrequests VALUES('0','".$labno."','".$pid."','".$patid."','".$patname."','".$sec."','".$itname."','','".date('H:i')."','','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$billno."',0,'','','','','','','','".$old_presc_id."','".$old_patient_id."','IPD','".$last_id."','NORMAL')");	
									}
								
								}

							}


							if($_POST['recr']==1){
								
								$radno = getRadNo($db);
								
								$a='rad';
								
								
								$max=count($_SESSION[$a]);
								for ($i = 0; $i < $max; $i++){
									$itcode = $_SESSION[$a][$i][0];
									$itname = $_SESSION[$a][$i][1];
									$itquat = $_SESSION[$a][$i][2];
									$itprice = $_SESSION[$a][$i][3];
									$tprice = $_SESSION[$a][$i][4];
									$oname = $_SESSION[$a][$i][5];
									$patname = $_SESSION[$a][$i][5];
									$regn = $_SESSION[$a][$i][6];
									$categ = $_SESSION[$a][$i][7];
									$total = $_SESSION[$a][$i][8];
									$disc = $_SESSION[$a][$i][9];
									$subn = $_SESSION[$a][$i][10];
									$iid = $_SESSION[$a][$i][12];
									$categ_id = $_SESSION[$a][$i][15];
									$categ_id = 11;
									$disp=0;

									$arr[]=$categ;
									$dept=$categ;
									
									$billno = getBillNo($db);


									$result =mysqli_query($db, "SELECT * FROM tempbill WHERE patid='".$regn."' AND itcode='".$itcode."' AND old_in_presc_id='".$old_presc_id."' AND old_in_patient_id='".$old_patient_id."' AND stamp='".date('Ymd')."'");
									$num_results = mysqli_num_rows($result);
									if($num_results>=1){
										echo"
												<script>
												$().customAlert();
												alert('Error!', '<p>Similar item already exists.</p>');
												e.preventDefault();
												</script>";
										exit;
									}else{

										$query_6 = mysqli_query($db, "INSERT INTO tempbill VALUES('0','".$regn."','".$patname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$fullname."','".$stamp."',1,'".$old_presc_id."','".$old_patient_id."','".$billno."','".$categ_id."','" . $bill_uid . "','" . $invno_uid . "',null,null)");			
										
										$last_id = mysqli_insert_id($db);
										$query_7 = mysqli_query($db, "INSERT INTO radrequests VALUES('0','".$radno."','".$pid."','".$patid."','".$patname."','".$itname."','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$billno."',0,'".$old_presc_id."','".$old_patient_id."','IPD','".$last_id."','RADIOLOGY','NORMAL')");	

									}
								
								}

							}




					if($query_1&&($query_2&&$query_3)||($query_4&&$query_5)||($query_6&&$query_7)){
				//send popups
			foreach ($arr as $key => $val) {
				$resultc =mysqli_query($db, "SELECT * FROM compips WHERE dept='".$val."'");
				$num_resultsc = mysqli_num_rows($resultc);	
				for ($i=0; $i <$num_resultsc; $i++) {
				$rowc=mysqli_fetch_array($resultc);
				$ip=stripslashes($rowc['ip']);		
				
					$resultd =mysqli_query($db, "SELECT * FROM logintable WHERE computerip='".$ip."'");
					$num_resultsd = mysqli_num_rows($resultd);	
					for ($d=0; $d <$num_resultsd; $d++) {
					$rowd=mysqli_fetch_array($resultd);
					$user=stripslashes($rowd['username']);
					$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient from Inpatient-".$patname."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
					}
							
				}
			}
					
					
						$result = mysqli_query($db, "CALL GetUserLogs('".$username." manages inpatient-NAME:".$patname."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");

						echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
						echo"<script>
					setTimeout(function() {
							treatchart2();},500);
					</script>";
						exit;										
					}
					else{
						echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
					}
						
						break;
							
						case 125:
							
							$regn=$_GET['regn'];
							$names=strtoupper($_GET['names']);
							$dob=$_GET['dob'];
							$gender=$_GET['gender'];
							$phone=$_GET['phone'];
							$postal=$_GET['postal'];
							$email=$_GET['email'];
							$bgroup=$_GET['bgroup'];


							$gname=$_GET['gname'];
							$rship=$_GET['rship'];
							$gphone=$_GET['gphone'];
							$gaddress=$_GET['gaddress'];
							
							$stamp=date('Ymd');
							$cur=date('Y-m');
							
							
						
								$query =mysqli_query($db, "select * from cccpats where pntno='".$regn."' order by id desc");
									$count = mysqli_num_rows($query);
									if($count>0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There exists a similar patient Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}


				$resulta = mysqli_query($db, "insert into cccpats values('0','".$regn."','".$names."','".$dob."','".$gender."','".$phone."','".$postal."','".$email."','".$bgroup."','".$gname."','".$gphone."','".$rship."','".$gaddress."','1','".$stamp."')");
				$new=$regn+1;
				
							
							if($resulta){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." insers new ccc patient into database-NAME:".$names."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
								echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
								<script>
								$().customAlert();
										alert('Success!', '<p>Record created.Patient No:".$regn."</p>');
									e.preventDefault();

								</script>";
										
								exit;
									}
									else {
										echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
										}
							
							break;

							case 126:
							
							$regn=$_GET['regn'];
							
							
							$stamp=date('Ymd');
							$cur=date('Y-m');
							
							
						
								$query =mysqli_query($db, "select * from cccpats where pntno='".$regn."' order by id desc");
									$count = mysqli_num_rows($query);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}

				$resulta = mysqli_query($db, "update cccpats set names='".strtoupper($_GET['names'])."',dob='".$_GET['dob']."',gender='".$_GET['gender']."',phone='".$_GET['phone']."',address='".$_GET['postal']."',email='".$_GET['email']."',bgroup='".$_GET['bgroup']."',gname='".$_GET['gname']."',gcont='".$_GET['gphone']."',rship='".$_GET['rship']."',gaddress='".$_GET['gaddress']."'  where pntno=".$regn."");	
							
						
							if($resulta){

								$resulta = mysqli_query($db, "insert into log values('0','".$username." edits ccc patient data-NAME:".strtoupper($_GET['names'])."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
								echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
								<script>
								$().customAlert();
										alert('Success!', '<p>Record Updated.Patient No:".$regn."</p>');
									e.preventDefault();

								</script>";
										
								exit;
									}
									else {
										echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
										}
							
							break;

							case 127:
							
							$regn=$_GET['regn'];
							
							
							$stamp=date('Ymd');
							$date=date('d/m/Y');
							
							
						
								$query =mysqli_query($db, "select * from cccpats where pntno='".$regn."' order by id desc");
									$count = mysqli_num_rows($query);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}

							$row=mysqli_fetch_array($query);
							$names=stripslashes($row['names']);

				$resulta = mysqli_query($db, "insert into cccpresc values('0','".$date."','".$regn."','".$names."','','','','','','','','','','','','".$stamp."',1)");
							
						
							if($resulta){

								$resulta = mysqli_query($db, "insert into log values('0','".$username." starts a new ccc consultation -NAME:".$names."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
								echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
								<script>
								$().customAlert();
										alert('Success!', '<p>Consultation Record Created.Patient No:".$regn."</p>');
									e.preventDefault();

								</script>";
										
								exit;
									}
									else {
										echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
										}
							
							break;

							case 128:
							
							$pid=$_GET['pid'];
							$temp=$_GET['temp'];
							$bp=$_GET['bp'];
							$weight=$_GET['weight'];
							$pr=$_GET['pr'];
							$br=$_GET['br'];
							$history=mysqli_real_escape_string($db, trim($_GET['history']));
							$diagnosis=mysqli_real_escape_string($db, trim($_GET['diagnosis']));
							$lab=mysqli_real_escape_string($db, trim($_GET['lab']));


							$stamp=date('Ymd');
							$date=date('d/m/Y');
							$cur=date('Y-m');
							
							
						$resulta =mysqli_query($db, "update cccpresc set Lab='".$lab."',Temp='".$temp."',Bp='".$bp."',Weight='".$weight."',PulseRate='".$pr."',BreathRate='".$br."',History='".$history."',Diagnosis='".$diagnosis."' where PrescId='".$pid."'");

					
				
							
							if($resulta){
								$resulta = mysqli_query($db, "insert into log values('0','".$username." updates ccc consultations (Consultation Stage)-Presc id:".strtoupper($_GET['pid'])."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
								echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
								<script>
								$().customAlert();
										alert('Success!', '<p>Record Updated</p>');
									e.preventDefault();

								</script>";								
								exit;
									}
									else {
										echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
										}
							
							break;


							case 129:
							$pid=$_GET['pid'];
							$notes=mysqli_real_escape_string($db, trim($_GET['notes']));
							
							$resulta =mysqli_query($db, "update cccpresc set Nutrition='".$notes."' where PrescId='".$pid."'");

							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates ccc consultations[Nutrition information].Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
							echo"
										
										<script>
								$().customAlert();
										alert('Success!', '<p>Record Updated</p>');
									e.preventDefault();

								</script>";		
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;

							case 130:
							$pid=$_GET['pid'];
							$notes=mysqli_real_escape_string($db, trim($_GET['notes']));
							
							$resulta =mysqli_query($db, "update cccpresc set Counselling='".$notes."' where PrescId='".$pid."'");

							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates ccc consultations[Counselling information].Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
							echo"
										
										<script>
								$().customAlert();
										alert('Success!', '<p>Record Updated</p>');
									e.preventDefault();

								</script>";		
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;

							case 131:
							$pid=$_GET['pid'];
							$notes=mysqli_real_escape_string($db, trim($_GET['notes']));
							
							$resulta =mysqli_query($db, "update cccpresc set Prescription='".$notes."' where PrescId='".$pid."'");

							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates ccc consultations[Prescription information].Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
							echo"
										
										<script>
								$().customAlert();
										alert('Success!', '<p>Record Updated</p>');
									e.preventDefault();

								</script>";		
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;

							case 132:
							
							$regn=$_GET['regn'];
							$stamp=date('Ymd');
							$date=date('d/m/Y');
							
							
						
								$query =mysqli_query($db, "select * from cccpats where pntno='".$regn."' order by id desc");
									$count = mysqli_num_rows($query);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}

							$row=mysqli_fetch_array($query);
							$names=stripslashes($row['names']);

				$resulta = mysqli_query($db, "insert into counselling values('0','".$date."','".$regn."','".$names."','','','','','','".$stamp."',1)");
							
						
							if($resulta){

								$resulta = mysqli_query($db, "insert into log values('0','".$username." starts a new counselling consultation -NAME:".$names."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				
								echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
								<script>
								$().customAlert();
										alert('Success!', '<p>Consultation Record Created.Patient No:".$regn."</p>');
									e.preventDefault();

								</script>";
										
								exit;
									}
									else {
										echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
										}
							
							break;

							case 133:
							$pid=$_GET['pid'];
							$subcat=$_GET['subcat'];
							$notes=mysqli_real_escape_string($db, trim($_GET['notes']));

							$resultb =mysqli_query($db, "select * from counscats where id='".$subcat."'");
							$rowb=mysqli_fetch_array($resultb);
							
							
							$resulta =mysqli_query($db, "update counselling set Notes='".$notes."',Category='".stripslashes($rowb['cat'])."',SubCategory='".stripslashes($rowb['name'])."',SubCatId='".stripslashes($rowb['id'])."',CatId='".stripslashes($rowb['catid'])."' where PrescId='".$pid."'");

							if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates Counselling consultations. Presc No:".$pid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							echo'<img alt="Tick" src="images/tick.png" style="width:30px; height:30px;">';
							echo"
										
										<script>
								$().customAlert();
										alert('Success!', '<p>Record Updated</p>');
									e.preventDefault();

								</script>";		
										exit;
									}
									else{
										echo'<img alt="Delete" src="images/delete.png" style="width:30px; height:30px;">';
									}
						
							break;


				case 133.1:
				$resulta = mysqli_query($db, "update employee set terminationdate='".$_GET['dot']."',terminationreason='".$_GET['reason']."',status=0 where emp='".$_GET['emp']."'");
					if($resulta){
					$resulta = mysqli_query($db, "insert into log values('0','".$username." terminates employment .PF No:".$_GET['emp']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo"<script>$().customAlert();alert('Success!', '<p>Employment terminated.</p>');e.preventDefault();</script>";
									exit;
									}
									else{echo"<script>$().customAlert();alert('Failure!', '<p>Please repeat again.</p>');e.preventDefault();</script>";}
				
				break;


				case 134:
				$rdate=$_GET['tdate'];
				$stamp=preg_replace('~/~', '', $rdate);
				$action=$_GET['action'];
				$aid=$_GET['a'];
				
				$x=substr($rdate,8,2);
				$y=substr($rdate,5,2);
				$z=substr($rdate,0,4);
				
				$mon=$y.'_'.$z;
				$k=$x.'c';
				
				$result =mysqli_query($db, "select * from ".$mon." where id='".$aid."'");
				$row=mysqli_fetch_array($result);
				$pfno=stripslashes($row['pfno']);
				
				//check if leave is valid
				
				
				if($action==2){
				
					
				$result =mysqli_query($db, "select * from leaves where endstamp>='".$stamp."' and emp='".$pfno."' and status=2");
				$num_results = mysqli_num_rows($result);	
				if($num_results==0){
					echo"<script>$().customAlert();alert('Error!', '<p>This employee is not on work leave</p>');e.preventDefault();</script>";
			
					$action=0;
				  }
				}
				
					
				if($action==3){
					
				$q=0;
				$result =mysqli_query($db, "select * from ".$mon." where id='".$aid."'");
				$row=mysqli_fetch_array($result);
					
				for ($i=1; $i <32; $i++) {
							$d=sprintf("%02d",$i);
							$d=$d.'c';
							if(stripslashes($row[$d])==3){
								$q++;
							}
				}
				
				if($q>=7){
					echo"<script>$().customAlert();alert('Error!', '<p>Maximum number of days for sick leave exceeded.</p>');e.preventDefault();</script>";
				  	$action=0;	
					}
				}
				
				
				
				
				$resulta = mysqli_query($db, "update  ".$mon." set ".$k."='".$action."' where id='".$_GET['a']."'");
				
				$resultb =mysqli_query($db, "select * from employee where emp='".$pfno."'");
				$rowb=mysqli_fetch_array($resultb);
				$att=stripslashes($rowb['attendance']);
				$tot=stripslashes($rowb['totattendance']);
				
				if($action==0){
					$tot=$tot+1;
					
				}else{
					$tot=$tot+1;
					$att=$att+1;
				}
				
				
				$resultn = mysqli_query($db, "update employee set attendance='".$att."',totattendance='".$tot."' where emp='".$pfno."'");	
				
				break;
				
				case 135:
				$emp=$_GET['emp'];
				$result =mysqli_query($db, "select * from employee where emp='".$emp."' and status=1");
				$num_results = mysqli_num_rows($result);
				if($num_results==0){
								echo"<script>$().customAlert();alert('Error!', '<p>The PF No. entered is incorrect</p>');e.preventDefault();</script>";
						
					  exit;
				}
				
				
				$row=mysqli_fetch_array($result);
				$name=stripslashes($row['fname']).' '.stripslashes($row['mname']).' '.stripslashes($row['lname']);
				$resulta = mysqli_query($db, "insert into leaves values('0','".$_GET['emp']."','".$name."','".stripslashes($row['branch'])."','".stripslashes($row['position'])."','".$_GET['from']."','".$_GET['to']."','".$_GET['days']."','".$_GET['shadow']."','".date('d/m/Y')."','".date('Ymd')."',0,'".$username."','".preg_replace('~/~', '',$_GET['from'])."','".preg_replace('~/~', '',$_GET['to'])."')") or die (mysql_error());
					
					if($resulta){
$resulta = mysqli_query($db, "insert into log values('0','".$username." makes a leave application .PF No:".$_GET['emp']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo"<script>hidenewstude();
					$().customAlert();alert('Success!', '<p>Leave Application successful.</p>');e.preventDefault();</script>";
						
						exit;
					}
					else{	echo"<script>$().customAlert();alert('Failure!', '<p>Please repeat the request</p>');e.preventDefault();</script>";
						
					}
				
				break;
				case 136:
				
				
				
				$lid=$_GET['a'];
				$result =mysqli_query($db, "select * from leaves where id='".$lid."'");
				$row=mysqli_fetch_array($result);
				$emp=stripslashes($row['emp']);
				$cdate=stripslashes($row['commencedate']);
				$days=stripslashes($row['days']);
				
				$resultb =mysqli_query($db, "select * from employee where emp='".$emp."'");
				$rowb=mysqli_fetch_array($resultb);
				$leave=stripslashes($rowb['leaveac']);
				
				$action=$_GET['action'];
				if($action=='Approve'){
					$stat=2;$x='approved';$leave=$leave-$days;
				}else{$stat=1;$x='denied';}
				
				$result =mysqli_query($db, "select * from users where pfno='".$emp."'");
				$row=mysqli_fetch_array($result);
				$user=stripslashes($row['name']);
				
				$resulta = mysqli_query($db, "update leaves set status='".$stat."' where id='".$_GET['a']."'");
				
				
				$resultm = mysqli_query($db, "update employee set leaveac='".$leave."' where emp='".$emp."'");	
			
					if($resulta){

$resulta = mysqli_query($db, "insert into log values('0','".$username." authorizes leave .ID No:".$_GET['a']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
$resultb = mysqli_query($db, "insert into messages values('0','".$user."','System','Your Leave Request Commencing on ".$cdate." has been ".$x."','','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
				exit;
			}
								
				
				break;
				
				case 137:
									
								
									$mon=$_GET['mon'];
									$query =mysqli_query($db, "select * from salregister where month='".$mon."'");
									$count = mysqli_num_rows($query);
									if($count>0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>Payroll for the Month has already been created.</p>');
									e.preventDefault();
									</script>";	
										exit;
									}
								else{
									
								
							
									
									
								$resultb =mysqli_query($db, "select * from employee where status=1");
								$num_results = mysqli_num_rows($resultb);
								for ($i=0; $i <$num_results; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$emp=stripslashes($rowb['emp']);
								$leave=stripslashes($rowb['leaveac']);
								$names=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);	
								
								$q=0;
								$resultx =mysqli_query($db, "select * from ".$mon." where pfno='".$emp."'");
								if(!$resultx){
									$q=26;
									}
								$rowx=mysqli_fetch_array($resultx);
					
								for ($x=1; $x<32; $x++) {
											$d=sprintf("%02d",$x);
											$d=$d.'c';
											if(stripslashes($rowx[$d])==1||stripslashes($rowx[$d])==2||stripslashes($rowx[$d])==3){
												$q++;
											}
								}
								
								
								$result =mysqli_query($db, "select * from payroll where status=1 and emp='".$emp."' order by serial desc limit 0,1");
								$row=mysqli_fetch_array($result);
														
$resultc = mysqli_query($db, "insert into payroll values('0','".$mon."','".stripslashes($rowb['emp'])."','".$names."','".stripslashes($rowb['dept'])."','".stripslashes($row['sal'])."','".stripslashes($row['allow'])."','','','','','','','','','','',0,'".stripslashes($rowb['bid'])."','".stripslashes($rowb['bname'])."','".stripslashes($rowb['acno'])."','".$q."')");

									if($q>=26){
									$leave=$leave+2;	
		$resultm = mysqli_query($db, "update employee set leaveac='".$leave."' where emp='".$emp."'");	
							}


									}
								if($result){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." adds new payroll.Month:".$mon."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	$result= mysqli_query($db, "insert into salregister values('".$mon."','','','','','','','','','','','','','',1)");						
									echo "<script>
									payroll('".$mon."');
									</script>";
									exit;
									}
									else{
									echo "<script>
									$().customAlert();
									alert('Error!', '<p>Payroll not Created</p>');
									e.preventDefault();
									</script>";
									exit;
										}
										
									}
							break;
							
							case 138:
							$emp=$_GET['emp'];
							$phone=$_GET['phone'];if($phone==''){$phone=0;}
							$health=$_GET['health'];if($health==''){$health=0;}
							$vehicle=$_GET['vehicle'];if($vehicle==''){$vehicle=0;}
							$entertainment=$_GET['entertainment'];if($entertainment==''){$entertainment=0;}
							$house=$_GET['house'];if($house==''){$house=0;}
							$perdiem=$_GET['perdiem'];if($perdiem==''){$perdiem=0;}
							$others=$_GET['others'];if($others==''){$others=0;}
							$date= date('m_Y');  
							
							
		
		$resulta = mysqli_query($db, "update benefits set phone='".$phone."',
		health='".$health."',vehicle='".$vehicle."',house='".$house."',entertainment='".$entertainment."',perdiem='".$perdiem."',others='".$others."',status=1 where pfno='".$emp."'");
		
		if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." edits Employee Benefits;Emp id:".$emp."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

									echo'<img alt="" src="images/tick.png"  width="22" height="22"/>';
									
									}
								else{
									echo'<img alt="" src="images/delete.png"  width="21.5" height="21.5"/>';
									}
								break;
								
						case 139:
							$ser=$_GET['ser'];
							$result = mysqli_query($db, "DELETE from benefits where id='".$ser."'");
							$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from benefits table','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							break;
						
					

					case 140:
									$emp=$_GET['emp'];
									
									$query =mysqli_query($db, "select * from benefits where pfno='".$emp."'");
									$count = mysqli_num_rows($query);
									if($count>0){
										
									
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>Employee already exists in the Benefits scheme.</p>');
									e.preventDefault();
									</script>";
										
									exit;	
									}
									else{
								$resultb =mysqli_query($db, "select * from employee where emp='".$emp."'");
								$rowb=mysqli_fetch_array($resultb);
								$emp=stripslashes($rowb['emp']);
								$names=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);	
								
					
$resultc = mysqli_query($db, "insert into benefits values('0','".$emp."','".$names."','','','','','','','','','1')");				
										
										
									if($resultc){	
	$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts new employee into benefits scheme.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'<p><img alt="Tick" src="images/tick.png" style="width:30px; height:30px; margin-top:-5px"></p>';
									echo "<script>$('#mon').hide();empben();</script>";
										
									}
									
									}
							break;


							case 141:
							$a=$_GET['a'];
							$regn=$_GET['regn'];
							$name=strtoupper($_GET['name']);
							$vname=strtoupper($_GET['vname']);
							$dop=$_GET['dop'];
							$dispdate=$_GET['dispdate'];
							$asscat=$_GET['asscat'];
							$catname=$_GET['catname'];
							$location=$_GET['location'];
							$deprate=$_GET['deprate'];
							$price=$_GET['price'];
							$odetail=$_GET['odetail'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							
							
							
							if($a==1){	
							$resulta = mysqli_query($db, "select * from assets where assetid='".$regn."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							if($num_resultsa!=0){
								echo"
														<script>
														$().customAlert();
														alert('Error!', '<p>Asset ID already exists.</p>');
														e.preventDefault();
														</script>";
														exit;
							}
									
						$resulta = mysqli_query($db, "insert into assets values('0','".$regn."','".$name."','".$asscat."','".$catname."','".$vname."','".$dop."','".$dispdate."','".$location."','".$price."','".$deprate."','".$odetail."','".$date."','".$stamp."',1)");
							$resultx = mysqli_query($db, "insert into assettrack values('0','".$regn."','".$name."','New Asset','New Asset Registration','".$price."','".$date."','".$stamp."',1,'".$username."')");
							}else{
						$resulta = mysqli_query($db, "update assets set assetid='".$regn."',name='".$name."',subcatid='".$asscat."',category='".$catname."',vendor='".$vname."',dateofpurchase='".$dop."',disposaldate='".$dispdate."',location='".$location."',price='".$price."',deprate='".$deprate."',odetail='".$odetail."' where assetid=".$regn."");
						$resultx = mysqli_query($db, "insert into assettrack values('0','".$regn."','".$name."','Edit Asset','Asset editing','".$price."','".$date."','".$stamp."',1,'".$username."')");
							}
												
							
						if($resulta){
							$resulta = mysqli_query($db, "insert into log values('0','".$username." updates assets database.Asset No:".$regn."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						echo"<img alt=\"\" src=\"images/tick.png\" style=\"\"  width=\"30\" height=\"30\"/>";
						if($a==1){
						echo"<script>setTimeout(function() {addasset();},500);</script>";	
						}else{
							echo"<script>setTimeout(function() {editasset(113);},500);</script>";	
						}
								
							}
							else {echo"<img alt=\"\" src=\"images/delete.png\" style=\"\"  width=\"30\" height=\"30\"/>";}
							
							break;
							
							case 142:
							$regn=$_GET['regn'];
							$name=strtoupper($_GET['name']);
							$doa=$_GET['doa'];
							$dor=$_GET['dor'];
							$assby=$_GET['assby'];
							$assto=$_GET['assto'];
							$location=$_GET['location'];
							$price=$_GET['price'];
							$odetail=$_GET['odetail'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							
		
					
		$resulta = mysqli_query($db, "insert into assignments values('0','".$regn."','".$name."','".$price."','".$location."','".$assby."','".$assto."','".$doa."','".$dor."','','".$odetail."','".$date."','".$stamp."',1,'".$username."')");
		$resultb= mysqli_query($db, "update assets set status=2 where assetid='".$regn."'");
			
			if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." assigns asset.Asset No:".$regn."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		$resultx = mysqli_query($db, "insert into assettrack values('0','".$regn."','".$name."','Asset Assignment','Asset Assigned by ".$assby." to ".$assto."','".$price."','".$date."','".$stamp."',1,'".$username."')");
echo"<img alt=\"\" src=\"images/tick.png\" style=\"\"  width=\"30\" height=\"30\"/>";
echo"<script>setTimeout(function() {assignasset(117);},500);</script>";	
}
							else {echo"<img alt=\"\" src=\"images/delete.png\" style=\"\"  width=\"30\" height=\"30\"/>";}
							
							break;
							
							case 143:
							$regn=$_GET['regn'];
							$assid=$_GET['assid'];
							$dor=$_GET['dor'];
							$recby=$_GET['recby'];
							$odetail=$_GET['odetail'];
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							$price=$_GET['price'];
							$name=$_GET['name'];
		
		$resulta= mysqli_query($db, "update assignments set dor='".$dor."',receivedby='".$recby."',odetail='".$odetail."',status=2 where id=".$assid."");
		$resultb= mysqli_query($db, "update assets set status=1 where assetid='".$regn."'");
			
			if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." returns asset.Asset No:".$regn."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	$resultx = mysqli_query($db, "insert into assettrack values('0','".$regn."','".$name."','Asset Return','Asset returned  to ".$recby."','".$price."','".$date."','".$stamp."',1,'".$username."')");
echo"<img alt=\"\" src=\"images/tick.png\" style=\"\"  width=\"30\" height=\"30\"/>";
echo"<script>setTimeout(function() {returnasset(119);},500);</script>";	
}
							else {echo"<img alt=\"\" src=\"images/delete.png\" style=\"\"  width=\"30\" height=\"30\"/>";}
							
							break;
							
							case 144:
					
							$assid=$_GET['param'];
							$result = mysqli_query($db, "select * from assets where id='".$assid."'");
							$row=mysqli_fetch_array($result);
							$regn=stripslashes($row['assetid']);
							$price=stripslashes($row['price']);
							$name=stripslashes($row['name']);
							
							
							$date=date('Y/m/d');
							$stamp=date('Ymd');
						
		
		$resulta= mysqli_query($db, "update assignments set status=0 where assid=".$regn."");
		$resultb= mysqli_query($db, "update assets set status=0 where id='".$assid."'");
			
			if($resulta){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." disposes asset.Asset No:".$regn."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	$resultx = mysqli_query($db, "insert into assettrack values('0','".$regn."','".$name."','Asset Disposal','Asset disposed  by ".$username."','".$price."','".$date."','".$stamp."',1,'".$username."')");
	echo"<script>$().customAlert();alert('Success!', '<p>Asset Disposed.</p>');e.preventDefault();</script>";
echo"<script>setTimeout(function() {dispasset(121);},500);</script>";	
}
							else {echo"<script>$().customAlert();alert('Error!', '<p>Failed. Please try again.</p>');e.preventDefault();</script>";}
							
							break;
							
							case 145:
					
							$assid=$_GET['assid'];
							$odetail=$_GET['odetail'];
							$price=$_GET['price'];
							$result = mysqli_query($db, "select * from assets where id='".$assid."'");
							$row=mysqli_fetch_array($result);
							$regn=stripslashes($row['assetid']);
							$name=stripslashes($row['name']);
							
							
							$date=date('Y/m/d');
							$stamp=date('Ymd');
							
							$resultx = mysqli_query($db, "insert into assettrack values('0','".$regn."','".$name."','Asset Management','".$odetail."','".$price."','".$date."','".$stamp."',1,'".$username."')");
						
		if($resultx){
	$resulta = mysqli_query($db, "insert into log values('0','".$username." manages asset.Asset No:".$regn."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	
	echo"<script>$().customAlert();alert('Success!', '<p>Details captured.</p>');e.preventDefault();</script>";
echo"<script>setTimeout(function() {dispasset(122);},500);</script>";	
}
							else {echo"<script>$().customAlert();alert('Success!', '<p>Asset Disposed.</p>');e.preventDefault();</script>";}
							
							break;

							case 146:
							$name=$_GET['name'];
							$cat=$_GET['cat'];
							$result = mysqli_query($db, "insert into ".$cat." values('0','".$name."')");	
					
							if($result){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." inserts a new data into ".$cat." table.name:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
								echo'<script>setTimeout(function() {editvariables();},500);</script>';	
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
							
							break;
							case 147:
							$vname=$_GET['vname'];
							$sysvar=$_GET['sysvar'];
							$bid=$_GET['bid'];
							
					$result = mysqli_query($db, "update ".$sysvar." set name='".$vname."' where id='".$bid."'");		
					
						if($result){
								
	$resulta = mysqli_query($db, "insert into log values('0','".$username." updates system variable.Name:".$vname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
						echo'<img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:0px 0 0 0px">';
								echo'<script>setTimeout(function() {editvariables();},500);</script>';	
									}
								else{
									echo'<img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px">';
									}
							
								break;
							
							case 148:
							$sysvar=$_GET['sysvar'];
								$bid=$_GET['bid'];
								$vname=$_GET['vname'];
								$result = mysqli_query($db, "DELETE from ".$sysvar." where id='".$bid."'");
								if($result){
								
	$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes system variable.Name:".$vname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
						
						echo'<img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:0px 0 0 0px">';
						echo'<script>setTimeout(function() {editvariables();},500);</script>';
									
									}
								else{
									echo'<img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px">';
									}
							
								break;


		case '149':
			if (isset($_GET['banktrans_drledgerid']) && isset($_GET['banktrans_amount']) && isset($_GET['banktrans_drledgername']) && isset($_GET['banktrans_refno']) && isset($_GET['banktrans_desc']) && isset($_GET['banktrans_transdate'])) {
				$banktrans_drledgerid = intval($_GET['banktrans_drledgerid']);
				$drname = trim(mysqli_real_escape_string($db, $_GET['banktrans_drledgername']));
				$banktrans_desc = trim(mysqli_real_escape_string($db, preg_replace("~'~", "", $_GET['banktrans_desc'])));
				$banktrans_transdate = trim(mysqli_real_escape_string($db, $_GET['banktrans_transdate']));
				$action = trim(mysqli_real_escape_string($db, $_GET['banktrans_action']));
				$banktrans_amount = floatval(preg_replace('~,~', '', $_GET['banktrans_amount']));
				$banktrans_sourceledgerid = intval($_GET['banktrans_sourceledgerid']);
				$banktrans_recipientledgerid = intval($_GET['banktrans_recipientledgerid']);
				$banktrans_refno = trim(mysqli_real_escape_string($db, $_GET['banktrans_refno']));
				$date = date('Y/m/d');
				$stamp = date('Ymd');

				$banktrans_subledgerid = intval($_GET['banktrans_subledgerid']);
				$banktrans_source_subledgerid = intval($_GET['banktrans_source_subledgerid']);
				$banktrans_recipient_subledgerid = intval($_GET['banktrans_recipient_subledgerid']);

				$uncaptured_banktrans_debtorid = intval($_GET['uncaptured_banktrans_debtorid']);
				$uncaptured_banktrans_departmentid = intval($_GET['uncaptured_banktrans_departmentid']);

				if ($banktrans_refno == '') {
					echo "<script>
						$().customAlert();
								alert('Error', '<p>Please enter transaction reference number.</p>');
						</script>";
					exit(1);
				}

				if ($banktrans_amount == 0 || $banktrans_amount < 0) {
					echo "<script>
							$().customAlert();
							alert('Error', '<p>Please enter amount and try again.</p>');
							</script>";
					exit(1);
				}
				if ($action == 'Uncaptured Bank Deposits' && ($uncaptured_banktrans_debtorid == 0 || $uncaptured_banktrans_departmentid == 0)) {
					echo "<script>
						$().customAlert();
								alert('Error', '<p>Department and debtor name are required for uncaptured deposits.</p>');
						</script>";
					exit(1);
				}

				if ($action == 'Bank Transfer') {
					$resultMain = mysqli_query($db, "SELECT `isMainLedger` FROM ledgers WHERE ledgerid='" . $banktrans_sourceledgerid . "' LIMIT 0,1 ");
					if (mysqli_num_rows($resultMain) > 0) {
						$rowMain = mysqli_fetch_assoc($resultMain);
						if (intval($rowMain['isMainLedger']) == 1) {
							if ($banktrans_source_subledgerid == 0) {
								die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a bank sub account and try again. </p>');e.preventDefault();</script>");
							} else {
								$resultSub = mysqli_query($db, "SELECT `mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_source_subledgerid . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultSub) > 0) {
									$rowSub = mysqli_fetch_assoc($resultSub);
									if (intval($rowSub['mainLedgerId']) == $banktrans_sourceledgerid) {
										$banktrans_sourceledgerid = $banktrans_source_subledgerid;
									} else {
										die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Incorrect subledger main bank account. </p>');e.preventDefault();</script>");
									}
								} else {
									die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
								}
							}
						}
					} else {
						die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
					}

					$resultMain1 = mysqli_query($db, "SELECT `isMainLedger` FROM ledgers WHERE ledgerid='" . $banktrans_recipientledgerid . "' LIMIT 0,1 ");
					if (mysqli_num_rows($resultMain1) > 0) {
						$rowMain1 = mysqli_fetch_assoc($resultMain1);
						if (intval($rowMain1['isMainLedger']) == 1) {
							if ($banktrans_recipient_subledgerid == 0) {
								die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a bank sub account and try again. </p>');e.preventDefault();</script>");
							} else {
								$resultSub1 = mysqli_query($db, "SELECT `mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_recipient_subledgerid . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultSub1) > 0) {
									$rowSub1 = mysqli_fetch_assoc($resultSub1);
									if (intval($rowSub1['mainLedgerId']) == $banktrans_recipientledgerid) {
										$banktrans_recipientledgerid = $banktrans_recipient_subledgerid;
									} else {
										die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Incorrect subledger main bank account. </p>');e.preventDefault();</script>");
									}
								} else {
									die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
								}
							}
						}
					} else {
						die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
					}
				} else {
					$resultMain = mysqli_query($db, "SELECT `isMainLedger` FROM ledgers WHERE ledgerid='" . $banktrans_drledgerid . "' LIMIT 0,1 ");
					if (mysqli_num_rows($resultMain) > 0) {
						$rowMain = mysqli_fetch_assoc($resultMain);
						if (intval($rowMain['isMainLedger']) == 1) {
							if ($banktrans_subledgerid == 0) {
								die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a bank sub account and try again. </p>');e.preventDefault();</script>");
							} else {
								$resultSub = mysqli_query($db, "SELECT `mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_subledgerid . "' LIMIT 0,1 ");
								if (mysqli_num_rows($resultSub) > 0) {
									$rowSub = mysqli_fetch_assoc($resultSub);
									if (intval($rowSub['mainLedgerId']) == $banktrans_drledgerid) {
										$banktrans_drledgerid = $banktrans_subledgerid;
									} else {
										die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Incorrect subledger main bank account. </p>');e.preventDefault();</script>");
									}
								} else {
									die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
								}
							}
						}
					} else {
						die("<script type='text/javascript'>$().customAlert();alert('ERROR', '<p>Please select a valid bank account. </p>');e.preventDefault();</script>");
					}
				}

				if (($action == 'Bank Transfer' && ($banktrans_sourceledgerid == 0 || $banktrans_recipientledgerid == 0))) {
					echo "<script>
							$().customAlert();
									alert('Error', '<p>Please select both source and recipient bank</p>');
							</script>";
					exit(1);
				}

				if (($action == 'Bank Transfer' && ($banktrans_sourceledgerid == $banktrans_recipientledgerid))) {
					echo "<script>
							$().customAlert();
									alert('Error', '<p>Same source and recipient bank account.</p>');
							</script>";
					exit(1);
				}

				if (($banktrans_drledgerid == 0 && ($action == 'Cash Deposit' || $action == 'Bank Withdrawal' || $action == 'Cheque Deposit' || $action == 'Cheque Payment'))) {
					echo "<script>
							$().customAlert();
									alert('Error', '<p>Please select a bank account </p>');
							</script>";
					exit(1);
				}

				if (($action == 'Uncaptured Bank Deposits' && ($uncaptured_banktrans_departmentid == 0 || $uncaptured_banktrans_debtorid == 0))) {
					echo "<script>
							$().customAlert();
									alert('Error', '<p>Department and debtor name are required for uncaptured deposits </p>');
							</script>";
					exit(1);
				}

				$rcpt_uid = guidv4();
				if ($action == 'Cash Deposit') {
					//cash account	
					$result = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers  WHERE ledgerid=670");
					$row = mysqli_fetch_assoc($result);
					$cashacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_cashbal = floatval($row['bal']);

					if ($opening_cashbal < $banktrans_amount) {
						echo "<script>
							$().customAlert();
									alert('Error', '<p>Available petty cash account balance " . number_format($opening_cashbal, 2, '.', ',') . " is less than deposited amount.</p>');
								
							</script>";
						exit(1);
					}

					$closing_cashbal = floatval($opening_cashbal) - floatval($banktrans_amount);

					//bank account	
					$resulta = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_drledgerid . "' ");
					$row = mysqli_fetch_assoc($resulta);
					$bankacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_bankbal = floatval($row['bal']);
					$closing_bankbal = floatval($opening_bankbal) + floatval($banktrans_amount);

					@mysqli_query($db, "INSERT INTO bankdeposits VALUES('','" . $rcpt_uid . "','" . $banktrans_amount . "','" . $banktrans_transdate . "','Cash Deposit','" . $banktrans_refno . "','670','Petty Cash Account','" . $banktrans_drledgerid . "','" . $drname . "','" . $banktrans_desc . "','" . $username . "','" . $stamp . "',1,null,null,null,null,null)");
					if (mysqli_affected_rows($db) > 0) {
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_cashbal . "' WHERE `ledgerid`=670 ");
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_bankbal . "' WHERE `ledgerid`='" . $banktrans_drledgerid . "' ");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','670','Petty Cash Account','" . $banktrans_drledgerid . "','" . $drname . "','" . $banktrans_amount . "','" . $banktrans_desc . " - " . $date . "','" . $banktrans_transdate . "','" . $closing_cashbal . "','" . $closing_bankbal . "','" . $stamp . "','" . $banktrans_drledgerid . "','" . $drname . "',1,'" . date('Y-m-d H:i:s') . "','" . $opening_cashbal . "','" . $opening_bankbal . "',null,null,null,null,'Cash Deposit','" . $rcpt_uid . "',null,'" . $banktrans_refno . "',0,null,null,'" . $cashacc_mainLedgerId . "','" . $bankacc_mainLedgerId . "',null,null,null,null,null,'" . $username . "','0','0',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Deposits cash. Bank Account:" . $drname . " Cash Account: NOTES AND COINS ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

						echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
						echo "<script>setTimeout(function() {bankdepp();},500);</script>";
						exit(0);
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
					}
				}

				if ($action == 'Uncaptured Bank Deposits') {
					$resultOI = mysqli_query($db, "SELECT ItemCat FROM categories WHERE CatId='" . $uncaptured_banktrans_departmentid . "' LIMIT 0,1 ");
					$rowOI = mysqli_fetch_assoc($resultOI);
					$uncaptured_banktrans_departmentname = trim(stripslashes($rowOI['ItemCat']));
					$resultOI = mysqli_query($db, "SELECT CustomerName,Bal FROM creditcustomers WHERE CustomerId='" . $uncaptured_banktrans_debtorid . "' LIMIT 0,1 ");
					$rowOI = mysqli_fetch_assoc($resultOI);
					$uncaptured_banktrans_debtorname = trim(stripslashes($rowOI['CustomerName']));
					$new_uncaptured_banktrans_debtorbal = floatval($rowOI['Bal']) - floatval($banktrans_amount);

					$resulta = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_drledgerid . "' ");
					$row = mysqli_fetch_assoc($resulta);
					$bankacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_bankbal = floatval($row['bal']);
					$closing_bankbal = floatval($opening_bankbal) + floatval($banktrans_amount);

					@mysqli_query($db, "INSERT INTO bankdeposits VALUES('','" . $rcpt_uid . "','" . $banktrans_amount . "','" . $banktrans_transdate . "','Uncaptured Bank Deposits','" . $banktrans_refno . "','670','Petty Cash Account','" . $banktrans_drledgerid . "','" . $drname . "','" . $banktrans_desc . "','" . $username . "','" . $stamp . "',1,'" . $uncaptured_banktrans_departmentid . "','" . $uncaptured_banktrans_departmentname . "','debtor','" . $uncaptured_banktrans_debtorid . "','" . $uncaptured_banktrans_debtorname . "' )");
					if (mysqli_affected_rows($db) > 0) {
						$resultDI = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers WHERE `mainLedgerId`= 635 AND `name`='" . $uncaptured_banktrans_departmentname . "' ");
						if (mysqli_num_rows($resultDI) > 0) {
							$rowDI = mysqli_fetch_assoc($resultDI);
							$income_acnt_ledgername = trim(stripslashes($rowDI['name']));
							$income_acnt_mainLedgerId = intval($rowDI['mainLedgerId']);
							$income_acnt_ledgerId = intval($rowDI['ledgerid']);
							$income_acnt_openingbal = floatval($rowDI['bal']);
							$income_acnt_closingbal = floatval($income_acnt_openingbal) + floatval($banktrans_amount);
						} else {
							$resultI = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers WHERE `ledgerid`=796 ");
							$rowI = mysqli_fetch_assoc($resultI);
							$income_acnt_ledgername = trim(stripslashes($rowI['name']));
							$income_acnt_mainLedgerId = 796;
							$income_acnt_ledgerId = intval($rowI['ledgerid']);
							$income_acnt_openingbal = floatval($rowI['bal']);
							$income_acnt_closingbal = floatval($income_acnt_openingbal) + floatval($banktrans_amount);
						}
						@mysqli_query($db, "UPDATE creditcustomers SET `Bal`='" . $new_uncaptured_banktrans_debtorbal . "' WHERE `CustomerId`='" . $uncaptured_banktrans_debtorid . "' ");
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $income_acnt_closingbal . "' WHERE `ledgerid`='" . $income_acnt_ledgerId . "' ");
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_bankbal . "' WHERE `ledgerid`='" . $banktrans_drledgerid . "' ");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $income_acnt_ledgerId . "','" . $income_acnt_ledgername . "','" . $banktrans_drledgerid . "','" . $drname . "','" . $banktrans_amount . "','" . $banktrans_desc . " - " . $date . "','" . $banktrans_transdate . "','" . $income_acnt_closingbal . "','" . $closing_bankbal . "','" . $stamp . "','" . $banktrans_drledgerid . "','" . $drname . "',1,'" . date('Y-m-d H:i:s') . "','" . $income_acnt_openingbal . "','" . $opening_bankbal . "','debtor','" . $uncaptured_banktrans_debtorid . "','" . $uncaptured_banktrans_debtorname . "',null,'Uncaptured Bank Deposits','" . $rcpt_uid . "',null,'" . $banktrans_refno . "',0,null,null,'" . $income_acnt_mainLedgerId . "','" . $bankacc_mainLedgerId . "',null,null,null,'" . $uncaptured_banktrans_departmentname . "',null,'" . $username . "','0','0',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");

						@mysqli_query($db, "INSERT INTO `log` VALUES('','" . $username . ": Deposits Uncaptured " . $uncaptured_banktrans_departmentname . " Bank Deposits from " . $uncaptured_banktrans_debtorname . ". Bank Account:" . $drname . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

						echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
						echo "<script>setTimeout(function() {bankdepp();},500);</script>";
						exit(0);
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
					}
				}

				if ($action == 'Fund Petty Cash') {
					//Petty cash account	
					$result = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers  WHERE ledgerid=670");
					$row = mysqli_fetch_assoc($result);
					$pettycashacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_cashbal = floatval($row['bal']);
					$closing_cashbal = floatval($opening_cashbal) + floatval($banktrans_amount);

					//bank account	
					$resulta = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_drledgerid . "' ");
					$row = mysqli_fetch_assoc($resulta);
					$bankacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_bankbal = floatval($row['bal']);
					if ($opening_bankbal < $banktrans_amount) {
						echo "<script>
															$().customAlert();
																	alert('Error', '<p>Selected bank account balance " . number_format($opening_bankbal, 2, '.', ',') . " is less than requested amount.</p>');
																
															</script>";
						exit(1);
					}


					$closing_bankbal = floatval($opening_bankbal) - floatval($banktrans_amount);

					@mysqli_query($db, "INSERT INTO bankdeposits VALUES('','" . $rcpt_uid . "','" . $banktrans_amount . "','" . $banktrans_transdate . "','Fund Petty Cash','" . $banktrans_refno . "','670','Petty Cash Account','" . $banktrans_drledgerid . "','" . $drname . "','" . $banktrans_desc . "','" . $username . "','" . $stamp . "',1,null,null,null,null,null)");
					if (mysqli_affected_rows($db) > 0) {
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_cashbal . "' WHERE `ledgerid`=670 ");
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_bankbal . "' WHERE `ledgerid`='" . $banktrans_drledgerid . "' ");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $banktrans_drledgerid . "','" . $drname . "','670','Petty Cash Account','" . $banktrans_amount . "','" . $banktrans_desc . " - " . $date . "','" . $banktrans_transdate . "','" . $closing_bankbal . "','" . $closing_cashbal . "','" . $stamp . "','" . $banktrans_drledgerid . "','" . $drname . "',1,'" . date('Y-m-d H:i:s') . "','" . $opening_bankbal . "','" . $opening_cashbal . "',null,null,null,null,'Fund Petty Cash','" . $rcpt_uid . "',null,'" . $banktrans_refno . "',0,null,null,'" . $bankacc_mainLedgerId . "','" . $pettycashacc_mainLedgerId . "',null,null,null,null,null,'" . $username . "','0','0',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Funds petty cash. Bank Account:" . $drname . "  ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

						echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
						echo "<script>setTimeout(function() {bankdepp();},500);</script>";
						exit(0);
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
					}
				}



				if ($action == 'Bank Withdrawal') {
					//bank account	
					$resulta = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_drledgerid . "' ");
					$row = mysqli_fetch_assoc($resulta);
					$bankacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_bankbal = floatval($row['bal']);

					if ($opening_bankbal < $banktrans_amount) {
						echo "<script>
															$().customAlert();
																	alert('Error', '<p>Available bank account balance " . number_format($opening_bankbal, 2, '.', ',') . " is less than requested amount.</p>');
															
															</script>";
						exit(1);
					}

					$closing_bankbal = floatval($opening_bankbal) - floatval($banktrans_amount);

					//cash account	
					$result = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers  WHERE ledgerid=670");
					$row = mysqli_fetch_assoc($result);
					$cashacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_cashbal = floatval($row['bal']);
					$closing_cashbal = floatval($opening_cashbal) + floatval($banktrans_amount);

					@mysqli_query($db, "INSERT INTO bankdeposits VALUES('','" . $rcpt_uid . "','" . $banktrans_amount . "','" . $banktrans_transdate . "','Bank Withdrawal','" . $banktrans_refno . "','670','Petty Cash Account','" . $banktrans_drledgerid . "','" . $drname . "','" . $banktrans_desc . "','" . $username . "','" . $stamp . "',1,null,null,null,null,null)");
					if (mysqli_affected_rows($db) > 0) {
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_cashbal . "' WHERE `ledgerid`=670 ");
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_bankbal . "' WHERE `ledgerid`='" . $banktrans_drledgerid . "' ");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $banktrans_drledgerid . "','" . $drname . "','670','Petty Cash Account','" . $banktrans_amount . "','" . $banktrans_desc . " - " . $date . "','" . $banktrans_transdate . "','" . $closing_bankbal . "','" . $closing_cashbal . "','" . $stamp . "','" . $banktrans_drledgerid . "','" . $drname . "',1,'" . date('Y-m-d H:i:s') . "','" . $opening_bankbal . "','" . $opening_cashbal . "',null,null,null,null,'Bank Withdrawal','" . $rcpt_uid . "',null,'" . $banktrans_refno . "',0,null,null,'" . $bankacc_mainLedgerId . "','" . $cashacc_mainLedgerId . "',null,null,null,null,null,'" . $username . "','0','0',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Makes a bank withdrwal. Bank Account:" . $drname . " Cash Account: Petty Cash Account ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

						echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
						echo "<script>setTimeout(function() {bankdepp();},500);</script>";
						exit(0);
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
					}
				}

				if ($action == 'Bank Transfer') {
					//Source bank account	
					$result = mysqli_query($db, "SELECT `name`,`bal`,`mainLedgerId` FROM ledgers  WHERE ledgerid='" . $banktrans_sourceledgerid . "' ");
					$row = mysqli_fetch_assoc($result);
					$sourcebankacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_sourcebal = floatval($row['bal']);
					$sourcebank_name = trim(stripslashes($row['name']));

					if ($opening_sourcebal < $banktrans_amount) {
						echo "<script>
															$().customAlert();
																	alert('Error', '<p>Source bank account balance " . number_format($opening_sourcebal, 2, '.', ',') . " is less than requested transfer amount</p>');
													
															</script>";
						exit(1);
					}

					$closing_sourcebal = floatval($opening_sourcebal) - floatval($banktrans_amount);

					//Recipient bank account	
					$resulta = mysqli_query($db, "SELECT `ledgerid`,`name`,`bal`,`mainLedgerId` FROM ledgers WHERE ledgerid='" . $banktrans_recipientledgerid . "' ");
					$row = mysqli_fetch_assoc($resulta);
					$recipientbankacc_mainLedgerId = intval($row['mainLedgerId']);
					$opening_recipientbal = floatval($row['bal']);
					$recipientbank_name = trim(stripslashes($row['name']));
					$closing_recipientbal = floatval($opening_recipientbal) + floatval($banktrans_amount);

					@mysqli_query($db, "INSERT INTO bankdeposits VALUES('','" . $rcpt_uid . "','" . $banktrans_amount . "','" . $banktrans_transdate . "','Bank Transfer','" . $banktrans_refno . "','" . $banktrans_sourceledgerid . "','" . $sourcebank_name . "','" . $banktrans_recipientledgerid . "','" . $recipientbank_name . "','" . $banktrans_desc . "','" . $username . "','" . $stamp . "',1,null,null,null,null,null)");
					if (mysqli_affected_rows($db) > 0) {
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_sourcebal . "' WHERE `ledgerid`='" . $banktrans_sourceledgerid . "' ");
						@mysqli_query($db, "UPDATE ledgers SET `bal`='" . $closing_recipientbal . "' WHERE `ledgerid`='" . $banktrans_recipientledgerid . "' ");
						@mysqli_query($db, "INSERT INTO ledgerentries VALUES('','" . $banktrans_sourceledgerid . "','" . $sourcebank_name . "','" . $banktrans_recipientledgerid . "','" . $recipientbank_name . "','" . $banktrans_amount . "','" . $banktrans_desc . " - " . $date . "','" . $banktrans_transdate . "','" . $closing_sourcebal . "','" . $closing_recipientbal . "','" . $stamp . "','','',1,'" . date('Y-m-d H:i:s') . "','" . $opening_sourcebal . "','" . $opening_recipientbal . "',null,null,null,null,'Bank Transfer','" . $rcpt_uid . "',null,'" . $banktrans_refno . "',0,null,'" . $sourcebankacc_mainLedgerId . "','" . $recipientbankacc_mainLedgerId . "',null,null,null,null,null,null,'" . $username . "','0','0',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");
						@mysqli_query($db, "INSERT INTO log VALUES('','" . $username . ": Makes a bank transfer from " . $sourcebank_name . " to " . $recipientbank_name . " amount transfered: " . $banktrans_amount . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

						echo '<p><img alt="Tick" src="images/tick.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>';
						echo "<script>setTimeout(function() {bankdepp();},500);</script>";
						exit(0);
					} else {
						die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
					}
				}
			} else {
				die('<p><img alt="Delete" src="images/delete.png" style=" width:30px; height:30px; margin:-10px 0 0 0px"></p>');
			}



			break;


		case 150:
			$usernm = trim(mysqli_real_escape_string($db, $_GET['usernm']));
			$itcode = intval($_GET['itcode']);
			$bid = intval($_GET['bid']);
			$bname = trim(mysqli_real_escape_string($db, $_GET['bname']));
			$qty = floatval($_GET['qty']);
			$notes = trim(mysqli_real_escape_string($db, $_GET['notes']));
			$date = date('Y/m/d');
			$stamp = date('Ymd');
			$result = mysqli_query($db, "select * from items where ItemCode='" . $itcode . "'");
			$row = mysqli_fetch_assoc($result);
			if ($bname == 'PROCUREMENT') {
				$branch = 'Bal';
			} else {
				$branch = $bname;
			}
			$bal = floatval($row[$branch]);
			$itname = stripslashes($row['ItemName']);
			$sprice = floatval($row['PurchPrice']);
			$issdqty = floatval($row['Qissued']);
			$pack = floatval($row['Pack']);
			$nbal = $bal - $qty;
			$total = $sprice * $qty;
			$issqty = $issdqty + $qty;
			$resultd = mysqli_query($db, "insert into stocktrack values('','" . $date . "','" . $bname . "','" . $itcode . "','" . $itname . "','" . $pack . "','STOCK USAGE REGISTER','" . $qty . "','" . $nbal . "','" . $username . "','" . $stamp . "')");

			if ($bname == 'ADMINISTRATION') {
				$resultb = mysqli_query($db, "update items set ADMINISTRATION='" . $nbal . "',Bal='" . $nbal . "',Qissued='" . $issqty . "',Activity='STOCK-ISSUE-STORE',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $qty . "',DESCRIPTION='STOCK ISSUE',MoreDetail='" . $bname . " STOCK ISSUE REGISTER',TransactedBy='" . strtoupper($fullname) . "' where ItemCode='" . $itcode . "'");
			} else if ($bname == 'PHARMACY') {
				$resultb = mysqli_query($db, "update items set PHARMACY='" . $nbal . "',Qopening='" . $nbal . "',Qissued='" . $issqty . "',Activity='STOCK-ISSUE-PHARMACY',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $qty . "',DESCRIPTION='STOCK ISSUE',MoreDetail='" . $bname . " STOCK ISSUE REGISTER',TransactedBy='" . strtoupper($fullname) . "' where ItemCode='" . $itcode . "'");
			} else {
				$resultb = mysqli_query($db, "update items set " . $bname . "='" . $nbal . "',Qissued='" . $issqty . "',Activity='STOCK-ISSUE',TransDate='" . date('d/m/Y') . "',TranStamp='" . date('Ymd') . "',TimeStamp='" . date('YmdHi') . "',Quantity='" . $qty . "',DESCRIPTION='STOCK ISSUE',MoreDetail='" . $bname . " STOCK ISSUE REGISTER',TransactedBy='" . strtoupper($fullname) . "' where ItemCode='" . $itcode . "'");
			}

			$resulta = mysqli_query($db, "insert into stockuse values('','" . $bid . "','" . $bname . "','" . $itcode . "','" . $itname . "','" . $qty . "','" . $notes . "','" . date('d/m/Y') . "','" . date('Ymd') . "','" . $username . "',1)");
			if ($resulta && $resultb) {
				$stockuse_id = mysqli_insert_id($db);
				$amount = $total;
				$resultb = mysqli_query($db, "select bal from ledgers where ledgerid=630 ");
				$rowb = mysqli_fetch_assoc($resultb);
				$invbal = floatval($rowb['bal']);
				$closinginvbal = $invbal - $amount;

				$resultc = mysqli_query($db, "select bal from ledgers where ledgerid=701 ");
				$rowc = mysqli_fetch_assoc($resultc);
				$supbal = floatval($rowc['bal']);
				$closingsupbal = $supbal + $amount;

				$resultl = mysqli_query($db, "insert into ledgerentries values('','630','Inventory','701','Stock Usage','" . $amount . "','Stock Usage','" . $date . "','" . $closinginvbal . "','" . $closingsupbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $invbal . "','" . $supbal . "',null,null,null,null,'register_stock_usage','','','','','','','','',null,null,'" . $itcode . "','" . $bname . "','','" . $username . "','0','0','','','" . $stockuse_id . "','uno','dos','tres','cuatro','cinco','seis')");
				$resultm = mysqli_query($db, "update ledgers set bal='" . $closinginvbal . "' where ledgerid=630 ");
				$resultn = mysqli_query($db, "update ledgers set bal='" . $closingsupbal . "' where ledgerid=701 ");
				$resulta = mysqli_query($db, "insert into log values('','" . $username . ": Registers stock usage. Item: " . $itname . " Quantity: " . $qty . "  Department: " . $bname . " ','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
				echo "
										<script>
											setTimeout(function() {
										stockissuetouser();},500);
										$().customAlert();
										alert('Success!', '<p>Entry Posted.</p>');
										e.preventDefault();
									</script>";
			} else {
				echo "
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Please Try again.</p>');
										e.preventDefault();
										</script>";
			}


			break;

							
							case 151: ////code,emp,cclinics
							$code=$_GET['code'];
							$emp=$_GET['emp'];
							$cclinics=$_GET['cclinics'];
							
							$result = mysqli_query($db, "update newprescription set OtherDetails='".$cclinics."' where Id='".$code."'");
					
							if($result){
			$resulta = mysqli_query($db, "insert into log values('0','".$username." updates patient cclinics .Patient No:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							
							echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"22\" height=\"22\"/>";
							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"22\" height=\"22\"/>";
							break;

							case 152:
							//$a="";
							$a=$_GET['transunits'];
							$b=$_GET['transparts'];
							$c=$_GET['packsize'];
							$cid=$_GET['cusid'];

							$d=$a * $c;
							$ttqty=$d + $b;

							$result = mysqli_query($db, "update issuetable set UnitBox='".$a."',Qty='".$ttqty."',PartBox='".$b."' where TransNo=".$cid."");	
					
							if($result){
$resulta = mysqli_query($db, "insert into log values('0','".$username." updates/edits/modifies user stock request.Id:".$cid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");				echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							echo'<script>
										setTimeout(function() {
											stocktransfer();},500);
										</script>';
							//echo"<script>$('#normal' + ".$transno.").html('');</script>";	

							}
							else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
							
							break;
							
							case 153:
							$stamp=date('Ymd');
							$date=date('Y/m/d');
							//get credit no
							$question =mysqli_query($db, "SELECT * FROM creditnotes order by TransNo desc limit 0,1");
							$ans=mysqli_fetch_array($question);
							$crdtno=stripslashes($ans['Creditno'])+1;
							
							$rcptno=$_GET['rcptno'];
							$alltot=$_GET['alltot'];
							$max=count($_SESSION['credit']);
							for ($i = 1; $i < $max; $i++){
							$itcode = $_SESSION['credit'][$i][0];
							$itname = $_SESSION['credit'][$i][1];
							$itquat = $_SESSION['credit'][$i][2];
							$itprice = $_SESSION['credit'][$i][3];
							$rquat = $_SESSION['credit'][$i][4];
							$rtot = $_SESSION['credit'][$i][5];
							$remquat = $_SESSION['credit'][$i][6];
							$tno = $_SESSION['credit'][$i][7];
							$result =mysqli_query($db, "SELECT * FROM sales WHERE TransNo='".$tno."'");
							$row=mysqli_fetch_array($result);
							$rcdate=stripslashes($row['Date']);
							$rctype=stripslashes($row['PayMode']);
							$categ=stripslashes($row['Category']);
							$cashname=stripslashes($row['Cashier']);

							$resultxk = mysqli_query($db, "select * from ledgers where name='".$cashname."' order by ledgerid desc limit 0,1");
							$rowxk=mysqli_fetch_array($resultxk);
							$cashacc=stripslashes($rowxk['ledgerid']);
							#$cashbal=stripslashes($rowxk['bal']);
					
	$resulta = mysqli_query($db, "insert into creditnotes values('0','".$crdtno."','".$rcptno."','".$rcdate."','','".$date."','".$rctype."','".$itcode."','".$itname."','".$itprice."','".$itquat."','".$rquat."','".$remquat."','".$rtot."','1','".$stamp."')");
			
				}
	echo"<script>$('#retotal').val('');$('#rcptno').val('');$('#cdate').val('');$('#csale').val('');</script>";
									if($resulta){
									unset($_SESSION['credit']);
									//update ledgers

									$resultb = mysqli_query($db, "select * from ledgers where ledgerid='".$cashacc."'");
									$rowb=mysqli_fetch_array($resultb);
									$cashbal=stripslashes($rowb['bal']);
									$cashbal=$cashbal-$itprice;
									//get balance of income revenue ledger
									$resultz = mysqli_query($db, "select * from ledgers where ledgerid=635");
									$rowz=mysqli_fetch_array($resultz);
									$incomebal=stripslashes($rowz['bal']);
									
									$incomebal=$incomebal-$itprice;
									
									$resultl = mysqli_query($db, "insert into ledgerentries values('0','".$cashacc."','".$cashname."','635','Income Revenue','".$alltot."','Service Income from Cash sales refunded-Inv No:".$rcptno." Item Price:".$itprice." Total Refunded:".$alltot."','".$date."','".$cashbal."','".$incomebal."','".$stamp."','','',0,'".date('d/m/Y')."-".date('H:i')."','".$username."','SI Refunded')");
									#$resultm = mysqli_query($db, "update ledgers set bal='".$incomebal."' where ledgerid='635'");
									#$resultn = mysqli_query($db, "update ledgers set bal='".$cashbal."' where ledgerid='".$cashacc."'");

			echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
			$resulta = mysqli_query($db, "insert into log values('0','".$username." updates credit note from Service Cash sales refunded-Inv No:".$rcptno." cclinics .Item Code:".$itcode."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
										echo"
										<script>
										window.open('report.php?id=3&rcptno=".$crdtno."');
										$().customAlert();
										alert('Success!', '<p>Transaction Successful.</p>');
										e.preventDefault();
										</script>";
	
										
									}
									else{
								$result = mysqli_query($db, "DELETE from creditnotes where Creditno='".$crdtno."'");
										echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
										e.preventDefault();
										</script>";
				echo"<script>$('#retotal').val('');$('#rcptno').val('');$('#cdate').val('');$('#csale').val('');</script>";
									}
		
							
							break;

										
							

		case '154':
		$code=$_GET['code'];
		$itcode=$_GET['b'];
		$itname=$_GET['itemname'];
		$patientid=$_GET['patientid'];
		$prescid=$_GET['prescid'];
		$prescno=$_GET['prescno'];
		$patid=$_GET['oldpatid'];
		$date=date('Y/m/d');					
		$stamp=date('Ymd');			
						
		$sqlQry = mysqli_query($db, "select * from tempbill where id=".$code."");
		$row=mysqli_fetch_array($sqlQry);
		$category=htmlsan(stripslashes($row['category']));
		$itcode=htmlsan(stripslashes($row['itcode']));
		$itname=htmlsan(stripslashes($row['itname']));
		$qty=htmlsan(stripslashes($row['quat']));
		$subn=htmlsan(stripslashes($row['subnet']));
		$billno=htmlsan(stripslashes($row['billno']));
		$patient_no=htmlsan(stripslashes($row['patid']));
		$patient_name=htmlsan(stripslashes($row['patname']));
		$qty=htmlsan(stripslashes($row['quat']));
		if ($category=='PHARMACY'||$category=='ADMINISTRATION') {
			$resulta = mysqli_query($db, "DELETE FROM tempbill WHERE id='".$code."'");	
			$resultb = mysqli_query($db, "DELETE FROM pharmrequests WHERE old_in_sale_id='".$code."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$patientid."' AND prescid='".$prescno."' AND patid='".$patient_no."' AND itcode='".$itcode."' AND rcptno='".$billno."' AND deptfrom='IPD' AND status=1  ");
									
			$query =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
			$rowq=mysqli_fetch_array($query);
			$bal=htmlsan(stripslashes($rowq[$category]));
			$type=htmlsan(stripslashes($rowq['Type']));
			$pack=htmlsan(stripslashes($rowq['Pack']));
			$qsold=htmlsan(stripslashes($rowq['Qsold']));
			$diff=$bal+$qty;
			$soldqty=$qsold-$qty;

			if($type=='GOOD'){
				$resultd = mysqli_query($db, "insert into stocktrack values('0','".$date."','".$category."','".$itcode."','".$itname."','".$pack."','INPATIENT SALES-".$patient_name."','".$qty."','".$diff."','".$username."','".$stamp."')");	
					
				if($category=='ADMINISTRATION'){
					$resultb= mysqli_query($db, "update items set ".$category."='".$diff."',Bal='".$diff."', Qsold='".$soldqty."', TransDate='".date('d/m/Y')."', TranStamp='".date('Ymd')."', TimeStamp='".date('YmdHi')."', Activity='IPDSALES-FROM-".$category."', MoreDetail='IPDSALES-FROM-".$category."-TO-".$patient_name."', Quantity='".$qty."', TransactedBy='".$fullname."' where ItemCode='".$itcode."' and Type='GOOD'");
				}		

				if($category=='PHARMACY'){
					$resultb= mysqli_query($db, "update items set ".$category."='".$diff."',Qopening='".$diff."', Qsold='".$soldqty."', TransDate='".date('d/m/Y')."', TranStamp='".date('Ymd')."', TimeStamp='".date('YmdHi')."', Activity='IPDSALES-FROM-".$category."', MoreDetail='IPDSALES-FROM-".$category."-TO-".$patient_name."', Quantity='".$qty."', TransactedBy='".$fullname."' where ItemCode='".$itcode."' and Type='GOOD'");
				}
                  //   $resultb = mysqli_query($db, "select * from ledgers where ledgerid='630'");
                  //   $rowb=mysqli_fetch_array($resultb);
                  //   $invbal=stripslashes($rowb['bal']);
                  //   $invbal=$invbal+$subn;
                    
                  //   $resultc = mysqli_query($db, "select * from ledgers where ledgerid='644'");
                  //   $rowc=mysqli_fetch_array($resultc);
                  //   $supbal=stripslashes($rowc['bal']);
                  //   $supbal=$supbal-$subn;
                      
                  // $resultl = mysqli_query($db, "insert into ledgerentries values('0','630','Inventory','644','Cost of Goods Sold','".$subn."','Inpatient Goods Returned','".date('Y/m/d')."','".$invbal."','".$supbal."','".$stamp."','','',0,'".date('d/m/Y')."-".date('H:i')."')");
                  // $resultm = mysqli_query($db, "update ledgers set bal='".$invbal."' where ledgerid='630'");
                  // $resultn = mysqli_query($db, "update ledgers set bal='".$supbal."' where ledgerid='644'");  

			}
		} 
		else if ($category=='LABORATORY') {
			$resulta = mysqli_query($db, "DELETE FROM tempbill WHERE id='".$code."'");	
			$resultb = mysqli_query($db, "DELETE FROM labrequests WHERE old_in_sale_id='".$code."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$patientid."' AND prescid='".$prescno."' AND patid='".$patient_no."' AND deptfrom='IPD'  ");			
		}
		else if ($category=='RADIOLOGY') {
			$resulta = mysqli_query($db, "DELETE FROM tempbill WHERE id='".$code."'");	
			$resultb = mysqli_query($db, "DELETE FROM radrequests WHERE old_in_sale_id='".$code."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$patientid."' AND prescid='".$prescno."' AND patid='".$patient_no."' AND deptfrom='IPD'  ");			
		}
		else {
			$resulta = mysqli_query($db, "DELETE FROM tempbill WHERE id='".$code."'");			
		}
		
	  $resultb = mysqli_query($db, "insert into temp_interim_bill values('0','".$prescno."','".$patid."','".$itcode."','".$itname."','deletes IPD invoice item from interim bill. ProductCode:".$itcode."','".$prescid."','".$patientid."','".$username."','".date('d/m/Y')."-".date('H:i')."','".date('YmdHi')."','".date('Ymd')."',0)");

		if($resulta&&$resultb){
			$resultd =mysqli_query($db, "SELECT `userid`,`name` FROM `users` WHERE `position`='Admin'");
			$num_resultsd = mysqli_num_rows($resultd);	
			for ($d=0; $d <$num_resultsd; $d++) {
			$rowd=mysqli_fetch_array($resultd);
			$user=stripslashes($rowd['name']);
			$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','".$fullname."-[".$username."]- Deletes an item from IPD Patient Interim Bill. ProductCode: ".$itcode.". ProductName:".$itname.". <br/>PatientNo:".$patient_no.".PatientName:".$patient_name.".<br/>".date('d/m/Y')."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
			}

			$result = mysqli_query($db, "CALL GetUserLogs('".$username." deletes IPD invoice item from interim bill. ProductCode:".$itcode.".ProductName:".$itname.".PrescNo:".$prescno.". PrescId:".$prescid.".PatientID:".$patientid."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
	
		echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"20\" height=\"20\"/>";
		echo"<script>
			setTimeout(function() {
			treatchart();},500);
			</script>";
			exit;
		#echo"<script>$('#bname2').val('');</script>";
		}
		else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"20\" height=\"20\"/>";
		
		break;
				
		
							
							case '155':	
							$old_presc_id=trim(mysqli_real_escape_string($db,$_GET['presc_id']));
							$old_presc_no=trim(mysqli_real_escape_string($db,$_GET['presc_no']));
							$old_patient_id=trim(mysqli_real_escape_string($db,$_GET['patient_id']));
							$old_patient_no=trim(mysqli_real_escape_string($db,$_GET['patient_no']));
							$usr_cashacc_no=trim(mysqli_real_escape_string($db,$_GET['usr_cashacc_no']));
							$usr_cashacc_name=trim(mysqli_real_escape_string($db,$_GET['usr_cashacc_name']));
							$amount=htmlsan($_GET['depamt']);

							$rcptno=getInvoiceNo($db);					
				            $bill_uid = guidv4();
				            $invno_uid = guidv4();
							$stamp=date('Ymd');
							$date=date('Y/m/d');
							$date2=date('Y/m/d').'-'.date('H:i');

							$negative='-';
							$depoamt_one=htmlsan($_GET['depamt']);
							$depoamt_two=$negative.''.$depoamt_one;

							$billno = getBillNo($db);

		                #$rcpt_uid = 0;
		                $rcpt_uid = guidv4();
		                $rcvpayref76 = 0;
		                $hasInsurance = 0;
		                $cid = 0;
		                $cname = 0;
		                $cardno = 0;
		                $rcv_copayment = 0;
		                $mode = 'Cash';
		                $category = 'WARD';
		                $old_category_id = 12;
		                $departmentItemCode = 84;
		                $actualdepartmentName = 'ADMISSION DEPOSIT';
		                #$actualdepartmentName = 'ACTUALDEPARTMENTNAME';
		                $isop = 0;
		                $isip = 1;

	
$result =mysqli_query($db, "SELECT Id,PrescId,PatId,PatName,old_in_patient_id FROM inpatients WHERE Id='".$old_presc_id."' AND old_in_patient_id='".$old_patient_id."' AND PatId='".$old_patient_no."' AND Admitted!=0 order by PatName");
$num_results = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$old_pat_name=makesafe(stripslashes($row['PatName']));
$q1=mysqli_query($db, "SELECT * FROM tempbill WHERE itcode='84' AND old_in_presc_id='".$old_presc_id."' AND old_in_patient_id='".$old_patient_id."' AND patid='".$old_patient_no."' AND status=1 ORDER BY id DESC LIMIT 0,1");
$num_resultsdo = mysqli_num_rows($q1);
if($num_resultsdo==0){
	$resulta = mysqli_query($db, "INSERT INTO tempbill VALUES('','" . makesafe(stripslashes($row['PatId'])) . "','" . makesafe(stripslashes($row['PatName'])) . "','84','ADMISSION DEPOSIT','WARD','0','1','0','0','0','".$date2."','0','".$fullname."','".date('Ymd')."',1,'".stripslashes($row['Id'])."','".stripslashes($row['old_in_patient_id'])."','".$billno."','" . $old_category_id . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
	#$rowz=mysqli_fetch_array($resultz);
	$old_depo_id = mysqli_insert_id($db);
}
#else{
$q2=mysqli_query($db, "SELECT * FROM tempbill WHERE itcode='84' AND old_in_presc_id='".$old_presc_id."' AND old_in_patient_id='".$old_patient_id."' AND patid='".$old_patient_no."' AND status=1 ORDER BY id DESC LIMIT 0,1");
$num_resultsdo2 = mysqli_num_rows($q2);
if($num_resultsdo2>0){
	$rowd=mysqli_fetch_array($q2);
	$old_depo_id=stripslashes($rowd['id']);
	$depamount=stripslashes($C['subnet']);
	$deptotal=$depamount+$depoamt_two;

	$resulta = mysqli_query($db, "INSERT INTO sales VALUES('0','".$rcptno."','WARD','84','ADMISSION DEPOSIT','1','".$amount."',0,'','".$amount."','".$amount."',1,'".$date."','".$old_patient_no."','".$old_pat_name."','','','','','','','','','','','".$stamp."','".$username."','".$username."',1,'1','','".$old_patient_id."','".$userid."','" . $old_category_id . "','".$fullname."','uno','dos','tres','cuatro','cinco','seis')");	

	$resulta = mysqli_query($db, "INSERT INTO receipts VALUES('','".$date."','" . makesafe(stripslashes($rowd['PatId'])) . "','" . makesafe(stripslashes($rowd['PatName'])) . "','".$rcptno."','" . $mode . "','','','','".$amount."','".$stamp."',1,'".$username."','','" . $category . "','".date('Hi')."','".$stamp."".date('Hi')."','".$old_patient_id."','".$userid."','" . $old_category_id . "','" . $rcpt_uid . "','" . $rcvpayref76 . "','" . $usr_cashacc_no . "','" . $usr_cashacc_name . "','" . $hasInsurance . "','" . $isCopay . "',null,null,null,'" . $rcv_copayment . "','','','',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");

	$resultp = mysqli_query($db, "INSERT INTO tblreceipts VALUES('','" . $date . "','" . makesafe(stripslashes($rowd['PatId'])) . "','" . makesafe(stripslashes($rowd['PatName'])) . "','" . $rcptno . "','','','" . $mode . "','" . $cid . "','" . $cname . "','" . $cardno . "','" . $amount . "','" . $stamp . "',1,'" . $username . "','','" . $category . "','" . date('Hi') . "','" . $stamp . "" . date('Hi') . "','" . $old_patient_id . "','" . $userid . "','" . $old_category_id . "','" . $rcpt_uid . "','" . $rcvpayref76 . "','" . $usr_cashacc_no . "','" . $usr_cashacc_name . "','" . $hasInsurance . "','" . $isCopay . "',null,null,null,'" . $rcv_copayment . "','','','',null,null,null,'uno','dos','tres','cuatro','cinco','seis')");


	$resulte = mysqli_query($db, "INSERT INTO deposits VALUES('0','".$old_pat_name."','".$old_patient_no."','".$depoamt_two."','dr','".$stamp."','".$date."','1','".$username."','".$old_presc_id."','".$old_presc_no."','".$old_patient_id."')");
	$resultdep = mysqli_query($db, "UPDATE tempbill SET price='".$deptotal."',total='".$deptotal."',subnet='".$deptotal."' WHERE id='".$old_depo_id."'");

	$resultb = mysqli_query($db, "SELECT * FROM ledgers WHERE ledgerid='".$usr_cashacc_no."'");
	$rowb=mysqli_fetch_array($resultb);
	$opening_cashbal=stripslashes($rowb['bal']);
	$closing_cashbal=$opening_cashbal+$amount;

	$resultz = mysqli_query($db, "SELECT * FROM ledgers WHERE ledgerid=635");
	$rowz=mysqli_fetch_array($resultz);
	$openin_incomebal=stripslashes($rowz['bal']);
	
	$incomebal=$openin_incomebal+$amount;
	
	@mysqli_query($db, "insert into ledgerentries values('','635','Income Revenue','".$usr_cashacc_no."','".$usr_cashacc_name."','".$amount."','Cash Deposit-Inv No:".$rcptno."','".$date."','".$incomebal."','".$closing_cashbal."','".$stamp."','','',0,'" . date('Y-m-d H:i:s') . "','" . $openin_incomebal . "','" . $opening_cashbal . "','patient','" . $old_patient_no . "','" . $old_pat_name . "',null,'ipd_receive_patient_payment','" . $rcpt_uid . "','','" . $rcvpayref76 . "','" . $hasInsurance . "','','',null,1,'" . $rcv_copayment . "',null,'" . $departmentItemCode . "','" . $actualdepartmentName . "','" . $mode . "','" . $username . "','0','0','','','" . $rcptno . "','uno','dos','tres','cuatro','cinco','seis')");

    @mysqli_query($db, "UPDATE ledgers SET bal='" . $incomebal . "' WHERE ledgerid='635' ");
    @mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_cashbal . "' WHERE ledgerid='" . $usr_cashacc_no . "'");
		
	$chiefcashier=existinChiefCashierChecker($db);

	if($chiefcashier!=''&&$cashbal>50000){
		$resultb = mysqli_query($db, "insert into messages values('0','".$chiefcashier."','System','".$usr_cashacc_name."-".$closing_cashbal." .<br/>Cash in Hand Limit exceeded-".date('d/m/Y')."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
	}

	echo"<script>window.open('report.php?id=62&rcptno=".safe_encode($rcptno)."&pid=".safe_encode($old_patient_no)."&cid=".safe_encode($old_patient_id)."');</script>";	
	echo"<script>window.open('outpathistory.php?id=62&rcptno=".safe_encode($rcptno)."&pid=".safe_encode($old_patient_no)."&cid=".safe_encode($old_patient_id)."');</script>";


}


				if($resulta){
					$resultd =mysqli_query($db, "SELECT `userid`,`name` FROM `users` WHERE `name` IN('MC001','JM002','NM021','GS005')");
					$num_resultsd = mysqli_num_rows($resultd);	
					for ($d=0; $d <$num_resultsd; $d++) {
					$rowd=mysqli_fetch_array($resultd);
					$user=stripslashes($rowd['name']);
					$resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','".$fullname."-[".$usr_cashacc_name."]-Receives Deposit. Amount: ".$amount."/=.<br/>Total Cash in Hand: ".$cashbal."/=.<br/>".date('d/m/Y')."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
					}

					$result = mysqli_query($db, "CALL GetUserLogs('".$username." deposit received.RcptNo:".$rcptno."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");

					#unset($_SESSION[$a]);	
					echo"<script>
							window.open('report.php?id=40&regn=" . safe_encode($old_patient_no) . "&cid=" . safe_encode($old_patient_id) . "&pid=" . safe_encode($old_presc_id) . "');
							$().customAlert();
							alert('Successful!', '<p>Payment Posted.</p>');
								setTimeout(function() {
								infinalbill();},500);
							</script>";
							exit;
						}
						else{
						echo"<script>
							$().customAlert();
							alert('Sorry!', '<p>Please try again.</p>');
							e.preventDefault();
							</script>";
							}

						
						break;							

							
			case 156:
			$a='ward';
			$stamp=date('Ymd');
			$dat=date('Y/m/d');
			$old_presc_id=trim(mysqli_real_escape_string($db,$_GET['old_presc_id']));
			$old_presc_no=trim(mysqli_real_escape_string($db,$_GET['old_presc_no']));
			$old_patient_id=trim(mysqli_real_escape_string($db,$_GET['old_patient_id']));
			$old_patient_no=trim(mysqli_real_escape_string($db,$_GET['old_patient_no']));
			$old_request_id=trim(mysqli_real_escape_string($db,$_GET['old_request_id']));
			$category=trim(mysqli_real_escape_string($db,$_GET['category']));
            $bill_uid = guidv4();
            $invno_uid = guidv4(); //TODO: CONFIRM IF THEY SHOULD BE IN THE FOR LOOP LIKE billno
			$mode='IPDCash';

			$rcptno = getInvoiceNo($db);
			// $sqlQry =mysqli_query($db, "SELECT TransNo,RcptNo FROM sales order by TransNo desc limit 0,1");
			// $qry=mysqli_fetch_array($sqlQry);
			// $rcptno=stripslashes($qry['RcptNo']);
			// $rcptno = intval($rcptno)+1;
			$un='UN-'.$rcptno;
			$refno='R-'.$rcptno;
			$arr=array();
			#$arr2=array();

			
			if(isset($_SESSION[$a])){
					$max=count($_SESSION[$a]);
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
					$date = $_SESSION[$a][$i][14];
					$catid = $_SESSION[$a][$i][15];
					$prescid = $_SESSION[$a][$i][16];
					$clientid = $_SESSION[$a][$i][17];
					$stamp=preg_replace('~/~', '', $date);
					$date=$date.'-'.date('H:i');
					$iid = $_SESSION[$a][$i][12];
					$names = $_SESSION[$a][$i][13];
					#$nwsubn = $itprice*$itquat;
					if($a=='ward'){
						$disp=1;
					}else{$disp=0;}

					//get invoice no
					// $question =mysqli_query($db, "SELECT * FROM tempbill order by id desc limit 0,1");
					// $ans=mysqli_fetch_array($question);
					// $billno=stripslashes($ans['billno'])+1;
					$billno = getBillNo($db);

					$resultc =mysqli_query($db, "SELECT CatId,ItemCat FROM categories WHERE ItemCat='".$categ."' AND Type='SERVICE' ");
					$rowc=mysqli_fetch_array($resultc);
					$old_category_id=stripslashes($rowc['CatId']);	

                    $resulta = mysqli_query($db, "insert into tempbill values('0','" . $old_patient_no . "','" . htmlsan(strtoupper($oname)) . "','" . $itcode . "','" . htmlsan(strtoupper($itname)) . "','" . $categ . "','" . $itprice . "','" . $itquat . "','" . $tprice . "','" . $disc . "','" . $subn . "','" . $date . "','" . $iid . "','" . htmlsan(strtoupper($names)) . "','" . $stamp . "',1,'" . $old_presc_id . "','" . $old_patient_id . "','" . $billno . "','" . $catid . "','" . $bill_uid . "','" . $invno_uid . "',null,null)");
		
					
					$resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$categ."','".$itcode."','".htmlsan(strtoupper($itname))."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$old_patient_no."','".htmlsan(strtoupper($oname))."','','','','".$old_presc_id."','','','".$mode."','','','','".$stamp."','','".strtoupper($username)."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$old_category_id."','','uno','dos','tres','cuatro','cinco','seis')");

					$last_id = mysqli_insert_id($db);

					
					if ($category=='Laboratory') {
						$labno = getLabNo($db);
						$section = getLabSectionNameById($db, $itcode);
						$resulty = mysqli_query($db, "insert into labrequests values('0','".$labno."','".$old_presc_no."','".$old_patient_no."','".htmlsan(strtoupper($oname))."','".$section."','".htmlsan(strtoupper($itname))."','','".date('H:i')."','','','".date('d/m/Y')."','".date('Ymd')."','".strtoupper($fullname)."','',1,'".$rcptno."',0,'','','','','','','','".$old_presc_id."','".$old_patient_id."','IPD','".$last_id."','NORMAL')");	
					} #else { }

					if ($category=='Pharmacy') { $paid=0;
						$resulta = mysqli_query($db, "insert into pharmrequests values('0','".$old_presc_no."','".$old_patient_no."','".htmlsan(strtoupper($oname))."','".htmlsan(strtoupper($itname))."','".$itcode."','".htmlsan(strtoupper($itname))."','".$categ."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$username."','".$stamp."',0,'".date('H:i')."','','".strtoupper($fullname)."','','".$old_presc_id."','".$old_patient_id."','".$rcptno."','".$paid."','".$last_id."','OPD','NORMAL')");		
					} #else { }


                    $outpatno = getOutPatientClientNo($db, $in_patient_id);
                    $inpatno = getInPatientClientNo($db, $in_patient_id);
					
					//update reduction of items
					// $query =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
					// $rowq=mysqli_fetch_array($query);
					// $type=stripslashes($rowq['Type']);
							
					// if($type=='GOOD'){
		            //     $bal = stripslashes($rowq[$categ]);
		            //     $pack = stripslashes($rowq['Pack']);
		            //     $qsold = stripslashes($rowq['Qsold']);
		            //     $diff = $bal - $itquat;
		            //     $soldqty = $qsold + $qty;

					// 	$resultd = mysqli_query($db, "insert into stocktrack values('0','".date('Y/m/d')."','".$categ."','".$itcode."','".$itname."','".$pack."','INPATIENT SALES-".$oname."','".$itquat."','".$diff."','".$username."','".$stamp."')");		

		            //     $resultb = mysqli_query($db, "update items set " . $categ . "='" . $diff . "', Qsold='" . $soldqty . "', TransDate='" . date('d/m/Y') . "', TranStamp='" . date('Ymd') . "', TimeStamp='" . date('YmdHi') . "', Activity='IPDSALES-FROM-" . $categ . "', MoreDetail='IPDSALES-FROM-" . $categ . "-TO-" . $oname . "', Quantity='" . $itquat . "', TransactedBy='" . $names . "' where ItemCode='" . $itcode . "' and Type='GOOD'");

		            //     $rcpt_uid = 0;
		            //     $rcvpayref76 = 0;
		            //     $hasInsurance = 0;
		            //     $cid = 0;
		            //     $cname = 0;
		            //     $rcv_copayment = 0;
		            //     $mode = 'Cash';
		            //     $isop = 0;
		            //     $isip = 1;

		            //     //update ledgers        
		            //     $resultb = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE ledgerid='630'");
		            //     $rowb = mysqli_fetch_assoc($resultb);
		            //     $opening_inventorybal = floatval($rowb['bal']);
		            //     $closing_inventorybal = floatval($opening_inventorybal) - floatval($subn);

		            //     $resultc = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE ledgerid='644'");
		            //     $rowc = mysqli_fetch_assoc($resultc);
		            //     $opening_cogbal = floatval($rowc['bal']);
		            //     $closing_cogbal = floatval($opening_cogbal) + floatval($subn);

		            //     $resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','630','Inventory','644','Cost of Goods Sold','" . $subn . "','Inpatient Drugs','" . $date . "','" . $closing_inventorybal . "','" . $closing_cogbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_inventorybal . "','" . $opening_cogbal . "','patient','" . $regn . "','" . $oname . "',null,'inpatient_drugs_charge_sheet','" . $rcpt_uid . "',null,'" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "','','','" . $rcv_copayment . "','','" . $itcode . "','" . $categ . "','" . $mode . "','" . $username . "','" . $isop . "','" . $isip . "','','" . $inpatno . "','')");
		            //     $resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_inventorybal . "' WHERE ledgerid=630 ");
		            //     $resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_cogbal . "' WHERE ledgerid=644 ");
					// }
						
				}
			}


			if($resulta){
				@mysqli_query($db, "CALL GetUserLogs('".$username." adds item to patient interim bill','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
				unset($_SESSION[$a]);	
				echo"<script>
				window.open('report.php?id=40&regn=" . safe_encode($regn) . "&cid=" . safe_encode($old_patient_id) . "&pid=" . safe_encode($old_presc_id) . "');
					$().customAlert();
					alert('Successful!', '<p>Item added to charge sheet.</p>');
						setTimeout(function() {
						inbill();},500);
					</script>";
					exit;
				}
				else{
				echo"<script>
					$().customAlert();
					alert('Sorry!', '<p>Please try again.</p>');
					e.preventDefault();
					</script>";
				}

			
			break;
						
							

				case '157':
				$code=$_GET['code'];
				$itcode=$_GET['b'];
				$patientid=$_GET['patientid'];
				$prescid=$_GET['prescid'];
				$prescno=$_GET['prescno'];
				$patid=$_GET['oldpatid'];
				$dept4rm=$_GET['dept4rm'];
				$date=date('Y/m/d');					
				$stamp=date('Ymd');			

			    $resulta = mysqli_query($db, "DELETE FROM tblprescphcdiagnosis WHERE DiagnosisId='".$code."'");	

				if($resulta){
					$result = mysqli_query($db, "CALL GetUserLogs('".$username." deletes IPD diagnosis. Patient No:".$patid.".PrescNo:".$prescno."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
				echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"20\" height=\"20\"/>";
					if($dept4rm=='OPD'){
					echo"<script>
						setTimeout(function() {
						docexam('GENERAL CONSULTATIONS');},500);
						</script>";
						exit;

					}else{
					echo"<script>
						setTimeout(function() {
						treatchart();},500);
						</script>";
						exit;
					}
				#echo"<script>$('#bname2').val('');</script>";
				}
				else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"20\" height=\"20\"/>";
				
				break;
				case '158': 
				$code=$_GET['code'];
				$itcode=$_GET['b'];
				$patientid=$_GET['patientid'];
				$prescid=$_GET['prescid'];
				$prescno=$_GET['prescno'];
				$patid=$_GET['oldpatid'];
				#$dept4rm=$_GET['dept4rm'];
				$date=date('Y/m/d');					
				$stamp=date('Ymd');			
	            $ttime2=date('H:i'); 
	            $startTime = date("H:i:s");
	            $convertedTime = date('H:i:s',strtotime('+1 minute',strtotime($ttime2)));

        		$sqlQry = mysqli_query($db, "CALL sp_startNewCustomConsultation('".$patientid."','".$patid."','".$prescid."','".$prescno."','".$startTime."','".$convertedTime."','".$date."')");


				if($sqlQry){
					$result = mysqli_query($db, "CALL GetUserLogs('".$username." starts new consultation for a CUSTOM patient. Patient No:".$patid.".PrescNo:".$prescno."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
				echo"<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"20\" height=\"20\"/>";
					echo"<script>
						setTimeout(function() {
						reception();},500);
						</script>";
						exit;
				#echo"<script>$('#bname2').val('');</script>";
				}
				else echo"<img alt=\"\" src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"20\" height=\"20\"/>";

			    break;



		case 159:
			$result = mysqli_query($db, "insert into log values('0','" . $username . " accesses Expiry Notification Settings Panel','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
			echo '<div id="modalDiv2"></div>';
			echo '<div id="mon" style="width:310px;height:250px">
					<div id="tit" style="width:290px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
						<h5 style="margin-right:10px;font-size:14px; color:#fff">Expiry Notification Settings
						<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
					</div>
					<div class="cleaner_h5"></div>
					<a class="labels" style="margin-left:5px;margin-bottom:5px">Select Frequency:</a>
					<div class="ui-widget" style="margin-left:5px;margin-bottom:5px;width:300px; float:left">
						<label for="alerts-frequency" class="bh-visually-hidden">Select Frequency:</label><select class="select" id="alerts-frequency" style="width:180px; margin-left:5px;">
							<option value=""></option>
							<option value="7 days">Weekly</option>
							<option value="14 days">Every 2 Weeks</option>
							<option value="30 days">Monthly</option>
							<option value="90 days">Quarterly</option>
						</select>
					</div>
					<div class="cleaner_h5"></div>
					<a class="labels" style="margin-left:5px;margin-bottom:5px">Recipient:</a>
					<div class="ui-widget" style="margin-left:5px;margin-bottom:5px;width:300px; float:left">
						<label for="alerts-recipient1" class="bh-visually-hidden">Recipient:</label><select class="select" id="alerts-recipient1" style="width:180px; margin-left:5px;">
							<option value=""></option>';
			$result = mysqli_query($db, "SELECT userid,name,fullname FROM users WHERE fullname NOT IN('MARK NORMAN','JOHN MUSOMA','PATRICK MWANGI','MARTIN WAMBUGU') AND status=1");
			while ($row = mysqli_fetch_array($result)) {
				echo "<option value=\"" . stripslashes($row['name']) . "\">" . stripslashes($row['fullname']) . "</option>";
			}
			echo '</select>
					</div>
					<div class="cleaner_h5"></div>
						<label for="exp_frequency" class="bh-visually-hidden">Text field</label><input type="text" class="input_field" style="margin:3px 5px;display:none;" id="exp_frequency" readonly="readonly">
						<label for="email_frequency" class="bh-visually-hidden">Text field</label><input type="text" class="input_field" style="margin:3px 5px;display:none;" id="email_frequency" readonly="readonly">
						<input type="button" value="Cancel" style="float:right; margin-right:20px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
						<input type="button" value="Submit" style="float:right; margin-right:10px; 
						cursor:pointer; width:80px" class="select" onclick="expiryAlertsFrequency();"/>
					<div class="cleaner"></div>
					
			</div>';

			break;


		case 160:
			$result = mysqli_query($db, "insert into log values('0','" . $username . " accesses Views Items Expiring in the next 30 days Panel','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
			echo '<div id="modalDiv2"></div>';
			echo '<div id="mon" style="width:510px;height:250px">
					<div id="tit" style="width:490px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
						<h5 style="margin-right:10px;font-size:14px;text-align:center; color:#fff">Items About To Expire
						<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
					</div>
					<div class="cleaner_h5"></div>
					<table id="delete_expired_tbl" style="width:96%;margin:5px;" border="1px" cellpadding="15px" cellspacing="0">
						<thead>
							<th style="width:50%;padding:2px;">Item Name</th>
							<th style="width:30%;padding:2px;">Expiry Date</th>
							<th style="width:20%;padding:2px;">Delete</th>
						</thead>
						<tbody>';
			$current_date = date('Y-m-d');
			$date = date_create($current_date);
			date_add($date, date_interval_create_from_date_string('30 days'));
			$next_one_month = date_format($date, "Y-m-d");
			$result = mysqli_query($db, "select * from purchases  where expstamp<='" . preg_replace('~-~', '', $next_one_month) . "' and expstamp>='" . preg_replace('~-~', '', $current_date) . "'");
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr id="delExp' . stripslashes($row['TransNo']) . '">
									<td style="padding:2px;">' . ucwords(strtolower(stripslashes($row['ItemName']))) . '</td>
									<td style="padding:2px;" align="center">' . stripslashes($row['Expiry']) . '</td>
							        <td style="padding:2px;" align="center">
	<input type="button" value="Delete" style="
						cursor:pointer; width:80%;height:20px;margin-left:10px;padding-bottom:2px;color:#fff;background-color:#e9024e;" class="select" onclick="deleteExpired(' . stripslashes($row['TransNo']) . ');"/>
									</td></tr>';
			}
			echo '	</tbody>
					</table>
					<div class="cleaner"></div>
					
			</div>';

			break;

			    case 161: 
			    break;
			    case 162: break;

			    case 404:
		           header("Location: custom-404-page.php");
		           #header('Location: http://www.betterhealth.co.ke/404.html'); exit;
			    break;
						
							
							
							
							
				
							
							
		}

?>
							
							
