<?php
require_once(__DIR__ . '/includes/db_fns.php');
date_default_timezone_set('Africa/Nairobi'); 
if(isset($_SESSION['valid_user'])){
$old_user = $_SESSION['valid_user'];
$resulta = mysqli_query($db, "DELETE from logintable where username='".$_SESSION['valid_user']."'");	
$resultb = mysqli_query($db, "insert into log values('','".$_SESSION['valid_user']." logs out of system-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$_SESSION['valid_user']."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
$result_dest = session_destroy();
		if (!empty($old_user)) {
				  if ($result_dest)  {
					// if they were logged in and are now logged out
					echo"<script>window.location.href = \"index.php\";</script>";exit;
						} else {// they were logged in and could not be logged out
				  		echo"<script>window.location.href = \"index.php\";</script>";exit;
				  		}
		} else {// if they weren't logged in but came to this page somehow
					echo"<script>window.location.href = \"index.php\";</script>";exit;
		}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<title>Better Health User Authentication</title>
<meta name="keywords" content="Better Health Hospital Management Information System" />
<meta name="description" content="Better-Health Hospital Management Information System" />
<link href="css/templatemo_styleadmin.css" rel="stylesheet" type="text/css" />
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
<link href="css/page.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style2.css" />
<script type='text/javascript' src='js/jquery.min.js'></script>
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#username').focus();
});
document.onkeydown = keydown;
    	function keydown(evt){
      	if (!evt) evt = event;
     	 if (evt.keyCode==13){ //enter
		 if($('#username').val()!=''&& $('#passwd').val()!=''){
        	login();
		 }else{
			$('#passwd').focus();
		 }
      	}
	}

function login(){
	var username=$('#username').val();
	var passwd=$('#passwd').val();
	 if(username==''){
		$().customAlert();
		alert('Error!', '<p>Enter your Username!</p>');
		e.preventDefault();
		}
		else  if(passwd==''){
		$().customAlert();
		alert('Error!', '<p>Enter your password!</p>');
		e.preventDefault();
		}
		else {
	 $('#message').html('<img id="img-spinner" src="images/load.gif" style="margin-top:20px" alt="Loading"/>');
	$.ajax({
	type:'POST',
	url:'login.php',
	data:{username:username, passwd:passwd},
	success:function(data){
		if(data==0){
			$('#message').html('');
	
		}else $('#message').html(data);
			
				if(data==0){
				window.location.href = "loading.php";
			  	}
		}
		});
		}
}


</script>

</head>   
<body id="bod">

<div id="templatemo_wrapper">
	<div id="templatemo_header">
<div class="cleaner"></div>


    		<div id="site_title"><img src="images/wlogo.png" style="display:block; margin:0 auto; max-height:250px; max-width:100%; height:auto" title="Better Health Hospital Management Information System"/></div>
<div class="cleaner_h10"></div>
<p style="font-size:20px; text-align:center; color:#125d30;text-transform:uppercase;">Better Health Hospital Management Information System</p>
    </div>
    
    <div id="templatemo_main" style="border:0">
    
    	
          <div id="wrapper">
          <div class="cleaner_h20"></div>
 
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on"> 
                 
                                <p> 
                                    <label for="username" class="uname">Username </label>
                                    <input id="username" name="username" required type="text" style="text-transform:uppercase;" />
                                </p>
                                 <div class="cleaner_h20"></div>
                                <p> 
                                    <label for="password" class="youpasswd">Password </label>
                                    <input id="passwd" name="passwd" required type="password"/> 
                                </p>
                             
                                <p class="login button"> 
                                 
                                    <input type="button" id="create" value="Login" onclick="login()" />
                                </p>
                                   <div id="message" style="height:40px; width:40px; float:right; margin:10px"></div>
                            </form>
                        </div>
                        <div class="cleaner h10"></div>
<!-- <a onclick="window.open('http://www.appcosystems.com')" href="#" style="font-size:12px; margin-left:170px; color:#125d30; font-weight:bold">  &copy; APPCO SYSTEMS LTD</a> 
<a onclick="window.open('http://www.betterhealthhmis.com')" href="#" style="font-size:12px; margin-left:140px; color:#125d30; font-weight:bold">  &copy; ABOUT BETTER HEALTH | USER GUIDE</a> -->
     <a  onclick="window.open('http://www.betterhealth.co.ke')" style="display:block; text-align:center; font-size:15px; color:#125d30; font-weight:bold">  &copy; APPCO SYSTEMS LTD</a>

              
						
                    </div>	
      
      
           
            </div><!-- END mainbox -->
		</div> <!-- END of home -->
        

</div> 

</body>
</html>