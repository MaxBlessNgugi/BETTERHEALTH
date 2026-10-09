<?php require(__DIR__ . '/includes/db_fns.php');
date_default_timezone_set('Africa/Nairobi');
if(isset($_SESSION['valid_user'])){
	$username=$_SESSION['valid_user'];
	$result =mysqli_query($db,"select * from users where name='".$username."'");
	$row=mysqli_fetch_array($result);
	$usertype=stripslashes($row['position']);
	$userid=stripslashes($row['userid']);
	$userdep=stripslashes($row['dept']);
}
else{ header('Location: index.php');}


$id=htmlspecialchars($_POST['id']);

switch($id){
		case 152:
		$email_frequency = trim(htmlspecialchars($_POST['email_frequency']));
		$exp_frequency = trim(htmlspecialchars($_POST['exp_frequency']));
		$current_date= date('Y-m-d');
		//$next_alert=date('Y-m-d', strtotime($current_date.'+'. $exp_frequency));
		$date = date_create($current_date);
		date_add($date, date_interval_create_from_date_string($exp_frequency));
		$next_alert= date_format($date, "Y-m-d");

		$result= mysqli_query($db,"update notifications set frequency='".$exp_frequency."',email='".$email_frequency."',nextAlert='".$next_alert."' where id=1");
		echo "Update successful";

		break;
		case 153:
		$param = trim(htmlspecialchars($_POST['param']));
		$current_date= date('Y-m-d');
		if($param=='status_check'){
			$result= mysqli_query($db,"select frequency,email,email2,lastAlert,nextAlert from notifications where id=1 and lastAlert !='".$current_date."' ");
			$row= mysqli_fetch_array($result);
			$frequency = stripslashes($row['frequency']);
			$email = stripslashes($row['email']);
			$email2 = stripslashes($row['email2']);
			$lastAlert = stripslashes($row['lastAlert']);
			$nextAlert = stripslashes($row['nextAlert']);
		
			if($nextAlert==$current_date){
				$date = date_create($current_date);
				date_add($date, date_interval_create_from_date_string('30 days'));
				$next_one_month= date_format($date, "Y-m-d");				
				$result =mysqli_query($db,"select * from purchases  where expstamp<='".preg_replace('~-~', '',$next_one_month)."' and expstamp>='".preg_replace('~-~', '',$current_date)."'");
				
				if(mysqli_num_rows($result)>0 && $email==$username || $email2==$username){
					//$response=array('type'=>'success','action'=>'notify','message'=>$frequency,'email'=>$email,'email2'=>$email2 );
					//echo json_encode($response);
					echo "notify";
				}else{
					//$response=array('type'=>'success','action'=>'status_update','message'=>$frequency,'email'=>$email,'email2'=>$email2 );
					//echo json_encode($response);					
					echo "status_update";
				}
			
			}else{
				//$response=array('type'=>'error','action'=>'hold_alert','message'=>$frequency,'email'=>$email,'email2'=>$email2 );
				//echo json_encode($response);
				echo "hold_alert";	
			}


		}elseif ($param=='status_update') {
			$result= mysqli_query($db,"select frequency,lastAlert from notifications where id=1 ");
			$row= mysqli_fetch_array($result);
			$message = stripslashes($row['frequency']);
			$lastAlert = stripslashes($row['lastAlert']);
			//$message = trim(htmlspecialchars($_POST['message']));
			$date = date_create($current_date);
			date_add($date, date_interval_create_from_date_string($message));
			$next_alert= date_format($date, "Y-m-d");

			if($lastAlert != $current_date ){
				$result= mysqli_query($db,"update notifications set lastAlert='".$current_date."',nextAlert='".$next_alert."',lastAlertStatus='Delivered' where id=1");
				//$response=array('type'=>'success','action'=>'exit');
				//echo json_encode($response);
				echo 'Updated';
			}else{
				echo "Error!";
			}


			
		}


		break;	
		case 154:
		$transNo = trim(htmlspecialchars($_POST['transNo']));
		$row_count = trim(htmlspecialchars($_POST['row_count']));
		$result= mysqli_query($db,"select ItemCode,ItemName from purchases where TransNo='".$transNo."' ");
		$row= mysqli_fetch_array($result);
		$ItemCode = stripslashes($row['ItemCode']);
		$ItemName = stripslashes($row['ItemName']);

		$result= mysqli_query($db,"delete from purchases where TransNo='".$transNo."'");
		//$resulta= mysqli_query($db,"delete from items where ItemCode='".$ItemCode."'");
		$resultb = mysqli_query($db,"insert into log values('0','".$username.": Deletes ".$ItemName." from database ','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		if($row_count-1==0){
			$result= mysqli_query($db,"select frequency,lastAlert from notifications where id=1 ");
			$row= mysqli_fetch_array($result);
			$frequency = stripslashes($row['frequency']);			
			$date = date_create(date('Y-m-d'));
			date_add($date, date_interval_create_from_date_string($frequency));
			$next_alert= date_format($date, "Y-m-d");

			$result= mysqli_query($db,"update notifications set lastAlert='".date('Y-m-d')."' and nextAlert='".$next_alert."' and lastAlertStatus='Delivered' where id=1");
				
		}

		if($result && $resulta && $resultb){
			echo'Success';
		}else{
			echo "Error";
		}

		break;		



}




?>