ÃÂÃÂ¯ÃÂÃÂ»ÃÂÃÂ¿<?php 
require_once(__DIR__ . '/includes/db_fns.php');
bh_authz_note('main', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
require_once('./r/fun.php');
if (isset($_SESSION['valid_user'])) {
	$username = trim(mysqli_real_escape_string($db, $_SESSION['valid_user']));
	$result = mysqli_query($db, "select * from users where name='" . $username . "'");
	$row = mysqli_fetch_array($result);
	$usertype = stripslashes($row['position']);
	$photo = stripslashes($row['photo']);
	$userid = stripslashes($row['userid']);
	$userdep = stripslashes($row['dept']);
	include(__DIR__ . '/includes/functions.php');
	include __DIR__ . '/includes/func.php';
	include __DIR__ . '/includes/compile.php';
	include __DIR__ . '/includes/components.php';
	$usuario=usuarioAccountDetails($db,$userid);
} else {
	echo "<script>window.location.href = \"index.php\";</script>";
	exit;
}

#$usuario=usuarioAccountDetails($db,$username);
#$usuario=usuarioAccountDetails($db,$userid);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<title>Better Health Hospital Management Information System</title>
<meta name="keywords" content="betterhealth" />
<meta name="description" content="betterhealth" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/bhealth_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/custom.css">
<link id="favicon" href="images/fav.png" rel="icon" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="assets/vendor/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="assets/vendor/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">$(document).ready(function() {$('.fancybox').fancybox();});</script>

<script type="text/javascript">
	//$(document).ready(function(){ });
	window.onload = setupRefresh;
	// --- R-03 session timeout -------------------------------------------------
	// 15 minutes of inactivity ends the session (guidance: 15-30 min).
	// An accessible warning appears 75 seconds beforehand (guidance: 60-90 s)
	// with an explicit "Stay logged in" action.
	var SESSION_TIMEOUT_MS = 15 * 60 * 1000;
	var SESSION_WARNING_MS = 75 * 1000;
	var timer = 0;
	var logoutTimer = 0;
	var sessionEnabled = false;
	var sessionWarningOpen = false;
	var sessionCountdownId = 0;
	var sessionLastArm = 0;
	function setupRefresh(){
		var b = $('#remote').val();
		var c = $('#server').val();
		if(b==c||b=='::1'){
		  serverstuff();
		  setInterval("serverstuff();",120000);
		}
		else{
			refreshchat();
			setInterval("refreshchat();",120000);
			sessionEnabled = true;
			armSessionTimeout();
		}
		
	}
		  //serverstuff();
		  //setInterval("serverstuff();",120000);
		  
	function armSessionTimeout(){
		clearSessionTimeout();
		timer = setTimeout("showSessionWarning();", SESSION_TIMEOUT_MS - SESSION_WARNING_MS);
		logoutTimer = setTimeout("auto_logout();", SESSION_TIMEOUT_MS);
	}
	function clearSessionTimeout(){
		if(timer != 0){
			clearTimeout(timer);
			timer = 0;
		}
		if(logoutTimer != 0){
			clearTimeout(logoutTimer);
			logoutTimer = 0;
		}
	}
	function reset_interval(){
		if(!sessionEnabled){ return; }
		var now = new Date().getTime();
		if(!sessionWarningOpen && (now - sessionLastArm) < 1000){ return; }
		sessionLastArm = now;
		clearSessionTimeout();
		hideSessionWarning();
		armSessionTimeout();
	}
	function showSessionWarning(){
		var el = document.getElementById('sessionWarn');
		if(!el){ return; }
		sessionWarningOpen = true;
		el.hidden = false;
		var left = Math.round(SESSION_WARNING_MS / 1000);
		var c = document.getElementById('sessionWarnCount');
		if(c){ c.innerHTML = left; }
		if(sessionCountdownId != 0){ clearInterval(sessionCountdownId); }
		sessionCountdownId = setInterval(function(){
			left = left - 1;
			if(left < 0){ left = 0; }
			var n = document.getElementById('sessionWarnCount');
			if(n){ n.innerHTML = left; }
		}, 1000);
		var btn = document.getElementById('sessionStayBtn');
		if(btn){ try{ btn.focus(); }catch(e){} }
	}
	function hideSessionWarning(){
		if(!sessionWarningOpen){ return; }
		sessionWarningOpen = false;
		if(sessionCountdownId != 0){
			clearInterval(sessionCountdownId);
			sessionCountdownId = 0;
		}
		var el = document.getElementById('sessionWarn');
		if(el){ el.hidden = true; }
	}
	function stayLoggedIn(e){
		if(e && e.preventDefault){ e.preventDefault(); }
		reset_interval();
		return false;
	}
	function sessionWarnKeys(e){
		if(!sessionWarningOpen){ return; }
		var k = e.key || e.keyCode;
		if(k === 'Escape' || k === 'Esc' || k === 27){
			stayLoggedIn(e);
		}
	}
	if(document.addEventListener){
		document.addEventListener('keydown', sessionWarnKeys, false);
	}
	function auto_logout(){
		var b = $('#remote').val();
		if(b!='127.0.0.1'){
				window.location.href = "index.php";
		}
	}
	//Archives and Records Management Resources
	// function archive_records(){
	// 	window.location.href = "http://192.168.9.36/BHealth-14042025/main.php";
	// }
	// function smarthr_manager(){
	// 	window.location.href = "http://192.168.9.36/Smart-HR-Manager/index.php";
	// }
	//Archives and Records Management Resources
	function archive_records(){
		window.location.href = "http://192.168.9.36/BHealth-06022023-22012024/main.php";
	}
	function archive_records_23012024_26112025(){
		window.location.href = "http://192.168.9.36/BHealth-23012024-26112025/main.php";
	}
	function smarthr_manager(){
		window.location.href = "http://192.168.9.36/Smart-HR-Manager/index.php";
	}
		   
	$('#taskfield').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
					posttask('<?php echo $usuario['old_in_user_id'];	 ?>');
			}
	});
	$('#comme').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
					postchat('<?php echo $usuario['old_in_user_name']; ?>');
			}
	});
</script>
 
<link rel="stylesheet" href="assets/vendor/ui/jquery.ui.all.css">
<link rel="stylesheet" href="assets/vendor/ui/demos.css">
<script src="js/functions.js"></script>
<script src="assets/vendor/ui/jquery.ui.core.js"></script>
<script src="assets/vendor/ui/jquery.ui.widget.js"></script>

<script src="assets/vendor/ui/jquery.ui.effect.js"></script>

<script src="assets/vendor/ui/jquery.ui.effect-bounce.js"></script>
<script src="assets/vendor/ui/jquery.ui.datepicker.js"></script>
<script src="assets/vendor/ui/jquery.ui.position.js"></script>
<script src="assets/vendor/ui/jquery.ui.dialog.js"></script>
<script src="assets/vendor/ui/jquery.ui.tabs.js"></script>

<script src="assets/vendor/ui/jquery.ui.effect-blind.js"></script>

<script src="assets/vendor/ui/jquery.ui.effect-explode.js"></script>
<script src="assets/vendor/ui/jquery.ui.autocomplete.js"></script>
<script src="assets/vendor/ui/jquery.ui.tooltip.js"></script>
<script src="assets/vendor/ui/jquery.ui.resizable.js"></script>
<script src="assets/vendor/ui/jquery.ui.mouse.js"></script>
<script src="assets/vendor/ui/jquery.ui.button.js"></script>
<script src="assets/vendor/ui/jquery.ui.menu.js"></script>
<script src="assets/vendor/ui/jquery.ui.draggable.js"></script>
<script src="assets/vendor/ui/jquery.ui.droppable.js"></script>
<script src="assets/vendor/ui/jquery.ui.mouse.js"></script>
<script src="assets/vendor/ui/jquery.ui.resizable.js"></script>
<script src="assets/vendor/ui/jquery.ui.progressbar.js"></script>
<link rel="stylesheet" href="css/style.css">



<script src="assets/vendor/ui/jquery.ui.accordion.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
 <script src="js/scripter.js"></script>
 <script src="js/ajax.js"></script>
<script src="js/functions.js"></script>
 <script src="js/ajax.js"></script>
<script src="js/func.js"></script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script> 
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<link rel="stylesheet" href="css/website.css" type="text/css" media="screen"/>
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/vendor/jquery.confirm/jquery.confirm.css" />
<script src="js/help.js"></script>
<script src="assets/vendor/jquery.confirm/jquery.confirm.js"></script>
	<script>
		$(function() {
			$("#datepickermain").datepicker();
			$("#datepicker").datepicker();
			$("#datepicker").datepicker("option", "showAnim", "bounce");
			$("#datepicker2").datepicker();
			$("#datepicker2").datepicker("option", "showAnim", "bounce");
			$("#datepicker3").datepicker();
			$("#datepicker3").datepicker("option", "showAnim", "bounce");
			$("#datepick17").datepicker();
			$("#datepick17").datepicker("option", "showAnim", "bounce");
			// $("#expirydate").datepicker();  
			// $("#datepick3").datepicker();  

			//$( "#datepickermain" ).datepicker( "option", "showAnim", "bounce" );

		});
	</script>
	<script>
		$(function() {
			$("#tabs").tabs();
			$("#tabs4").tabs();
			$("#tabs5").tabs();
			$("#tabs6").tabs();
			$("#tabs7").tabs();
			$("#tabs8").tabs();
			$("#tabs9").tabs();
		});
	</script>
	<script>
		// increase the default animation speed to exaggerate the effect
		$.fx.speeds._default = 1000;

		$("#mytask").dialog({
			autoOpen: false,
			show: "explode",
			hide: "explode",
			modal: true
		});

		$("#mycalendar").dialog({
			autoOpen: false,
			show: "explode",
			hide: "explode",
			modal: true
		});
		$(function() {
			$("#warddialog").dialog({
				autoOpen: false,
				show: "bounce",
				hide: "explode",
				modal: true
			});
		});
		$(function() {
			$("#newledger").dialog({
				autoOpen: false,
				show: "bounce",
				hide: "explode",
				modal: true
			});
			$("#newsubledger_dialog").dialog({
				autoOpen: false,
				show: "fade",
				hide: "scale",
				modal: true
			});
		});
		$(function() {
			$("#newbed").dialog({
				autoOpen: false,
				show: "bounce",
				hide: "explode",
				modal: true
			});
		});
	</script>
	<script>
		$('#pnt4').parent().find('input:first').width(120);
	</script>
	<script type="text/javascript">
		document.addEventListener('domready', function(event) {

			$$('input.DatePicker').each(function(el) {
				new DatePicker(el);
			});
		});
		$(function() {
			$("#dialog-modal").dialog({
				height: 140,
				modal: true
			});
		});
	</script>
	<script>
		$(function() {
			$("#accordion").accordion({
				event: "click"
			});
			$("#progressbar").progressbar({
				value: 100
			});
		});

		var def = 0;
	</script>
	<script type="text/javascript">
		$('#scrollbar1').live('mouseenter', function() {
			$('#scrollbar1').tinyscrollbar();
		});
		$(document).ready(function() {
			$('#scrollbar2').tinyscrollbar();
		});

		function scroller2() {
			$('#scrollbar2').tinyscrollbar();
		}
		homepage();
		setInterval("checkItemsExpiry();", 120000);
	</script>

<style>   
 	.vmenu{border:1px solid #ccc;position:fixed;top:0;left:0;background:#fff;	display:none;font-size:0.75em;}
       .vmenu .first_li{width:150px;display:block;padding:5px 10px;cursor:pointer;margin: 0;display: block;list-style: none;padding: 5px 5px;font-size:11px;  }
        
        .vmenu .first_li:hover,.vmenu .last_li:hover{background-color: #E0EDFE;}
</style>

<style>
.ui-progressbar .ui-progressbar-value { background-image: url(images/pbar-ani.gif);}
	.custom-combobox {
		position: relative;
		display: inline-block;
	}
	.custom-combobox-toggle {
		position: absolute;
		top: 0;
		bottom: 0;
		margin-left: -1px;
		padding: 0;
		/* support: IE7 */
		*height: 1.7em;
		*top: 0.1em;
	}
	.custom-combobox-input {
		margin: 0;
		padding: 0.0em 0.3em;
	}
	.ui-autocomplete {
	max-height: 150px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
}
.ui-tooltip {
	padding: 8px;
	position: absolute;
	z-index: 9999;
	max-width: 300px;
	-webkit-box-shadow: 0 0 5px #aaa;
	box-shadow: 0 0 5px #aaa;
}
body .ui-tooltip {
	border-width: 2px;
}
	</style>
 	
  <style>
	#resizable { width: 150px; height: 150px; padding: 0.5em; }
	#resizable h3 { text-align: center; margin: 0; }
	.ui-resizable-helper { border: 2px dotted #00F; }
	</style>	
    
    
<script>
	$(function() {
		$( "#sidep" ).resizable({
			animate: true,
			helper: "ui-resizable-helper",
			alsoResize: ".site",
			maxHeight: 480,
			maxWidth: 320,
			minHeight: 480,
			minWidth: 235
			
		});
		
		
		
	});
	
	</script>
    	<script>
	$(function() {
		$( "#show-option" ).tooltip({
			show: {
				effect: "slideDown",
				delay: 250
			}
		});
		$( "#hide-option" ).tooltip({
			hide: {
				effect: "explode",
				delay: 250
			}
		});
		$( "#sidep" ).tooltip({
			show: null,
			position: {
				my: "left top",
				at: "left bottom"
			},
			open: function( event, ui ) {
				ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
			}
		});
	});
	</script>  		
    <script type="text/javascript" src="js/nicEdit.js"></script>
<script>
var area1,area2,area3,area4,area5,area6,area7,area8,area9,area10,area11,area12,area13,area14,area15,area16,area17,area18;
</script>	

	
<link rel="stylesheet" href="css/shell.css">
<script type="text/javascript" src="js/bh-shell.js"></script>
</head>
<body id="body" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
	<a class="bh-skip" href="#mainp">Skip to main content</a>

<div id="templatemo_container"  class="site">
 <div id="header">
    	<div class="site" id="sitename_panel"><img alt="AppCo Systems" src="images/applogo.png" style="width:200px;height:50px" title="AppCo Systems"/></div>
      <div class="bh-topbar-search">
        <label for="bh-globalsearch">Find a screen</label>
        <input type="search" id="bh-globalsearch" name="bh-globalsearch" autocomplete="off" placeholder="Search modules, quick access, reports" aria-describedby="bh-search-status" />
        <span class="bh-search-count" id="bh-search-status" role="status" aria-live="polite"></span>
      </div>
        
<nav id="templatemo_menu" class="ddsmoothmenu" aria-label="Modules">
            <ul>
               
          	<li class="bh-nav-top"><a class="patients bh-nav-item" href="#" aria-haspopup="true" aria-expanded="false"><span class="bh-nav-icon" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="7" r="3"/><path d="M2.5 16.5c0-3 2.4-4.6 5.5-4.6s5.5 1.6 5.5 4.6"/><path d="M14 6.5h4M16 4.5v4"/></svg></span><span class="bh-nav-text">Patients</span></a>
             <ul>
             <?php 
			 
				#Undefined variable: || Undefined index:
				if(isset($_SESSION['valid_user'])){			
				 //check if cashier has ledger
				 	$cashacc=0;
				 	$result =mysqli_query($db, "SELECT * FROM ledgers");
					$num_results = mysqli_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					if($username==substr(stripslashes($row['name']),0,5)){$cashacc=1;}
					}

				 	$arr=array();
					$result =mysqli_query($db, "select * from accesstbl");
					$num_results = mysqli_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
						$row=mysqli_fetch_array($result);
						$var=stripslashes($row[$usertype]);
						$code=stripslashes($row['AccessCode']);
						$arr[$code]=$var;
					}
					
				}
				
				if($arr[101]=='YES'){
					echo'<li><a onclick="newcustomtpatient();">Add New Patient</a>';
				}else echo'<li><p style="color:#ccc;display:none;">Add new Patient</p></li>';
				if($arr[102]=='YES'){
				echo'<li><a onclick="editpatient(21);">Edit Patient Details</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Edit Patient Details</p></li>';
				if($arr[103]=='YES'){
				echo'<li><a onclick="editpatient(114);">Patient Chart</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Patient Chart</p></li>';
				if($arr[104]=='YES'){
				echo'<li><a onclick="findpatient();">Find OPD Patient</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Find OPD Patient</p></li>';
				if($arr[252]=='YES'){
				echo'<li><a onclick="buscarInpatient();">Find IPD Patient</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Find IPD Patient</p></li>';
				if($arr[105]=='YES'){
				echo' <li><a onclick="editpatient(157);">Delete Patient Record</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Delete Patient Record</p></li>';
				
              ?>
             </ul> 
            </li>
              <li class="bh-nav-top"><a class="consultations bh-nav-item" href="#" aria-haspopup="true" aria-expanded="false"><span class="bh-nav-icon" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3.5" width="12" height="14" rx="1.5"/><path d="M7.5 3.5V2.5h5v1"/><path d="M7 8.5h6M7 12h6"/></svg></span><span class="bh-nav-text">Consultations</span></a>
                 <ul style="width:494px">
             <li style="width:164px; border-right:2px  dashed #000; float:left">
                <?php
                if($arr[106]=='YES'){
				echo' <a onclick="reception()">Reception</a>';
				}else echo'<p style="color:#ccc;display:none;">Reception</p>';
				if($arr[112]=='YES'&&$cashacc==1){
				echo' <a onclick="paymentsTesting();">Receive Payment</a>';
				}else echo'<p style="color:#ccc;display:none;">Receive Payment</p>';
				if($arr[107]=='YES'){
				echo' <a onclick="triage()">Triage</a>';
				}else echo'<p style="color:#ccc;display:none;">Triage</p>';
				  if($arr[108]=='YES'){
				echo"<a onclick=\"docexam('GENERAL CONSULTATIONS');\">Consultations</a>";
				}else echo'<p style="color:#ccc;display:none;">Consultations</p>';
				if($arr[109]=='YES'){
				echo' <a onclick="labbill();">Lab Billing</a>';
				}else echo'<p style="color:#ccc;display:none;">Lab Billing</p>';
				if($arr[110]=='YES'){
				echo' <a onclick="labrecep();">Lab Reception</a>';
				}else echo'<p style="color:#ccc;display:none;">Lab Reception</p>';
				 if($arr[111]=='YES'){
				echo' <a onclick="labanal();">Lab Analysis</a>';
				}else echo'<p style="color:#ccc;display:none;">Lab Analysis</p>';	
				if($arr[120]=='YES'){
				echo' <a onclick="radbill();">Radiology Billing</a>';
				}else echo'<p style="color:#ccc;display:none;">Radiology Billing</p>';
				if($arr[121]=='YES'){
				echo' <a onclick="radiology();">Radiology Analysis</a>';
				}else echo'<p style="color:#ccc;display:none;">Radiology Analysis</p>';

				if($arr[113]=='YES'){
				echo'<a onclick="makeasale();">Pharmacy Billing</a>';
				}else echo'<p style="color:#ccc;display:none;">Pharmacy Billing</p>';
				if($arr[113]=='YES'){
				echo'<a onclick="makeanorder();">Pharmacy Requests</a>';
				}else echo'<p style="color:#ccc;display:none;">Pharmacy Requests </p>';

				if($arr[115]=='YES'){
				echo' <a onclick="consinv();">Consolidate Invoices</a>';
				}else echo'<p style="color:#ccc;display:none;">Consolidate Invoices</p>';
			
				if($arr[114]=='YES'){
				echo' <a onclick="viewhistory();">Patient History</a>';
				}else echo'<p style="color:#ccc;display:none;">Patient History</p>';	


				echo' </li> 
				<li style="width:164px; border-right:2px dashed #000; float:left">';	

				if($arr[116]=='YES'){
				echo' <a onclick="nursing();">Corporate Billing</a>';
				}else echo'<p style="color:#ccc;display:none;">Corporate Billing</p>';

				if($arr[211]=='YES'){
				echo' <a onclick="nursingclinic();">OPD Clinic Records</a>';
				}else echo'<p style="color:#ccc;display:none;">OPD Clinic Records</p>';

				if($arr[117]=='YES'){
				echo"<a onclick=\"docexam('DENTAL CLINIC');\">Dental Clinic</a>";
				}else echo'<p style="color:#ccc;display:none;">Dental Clinic</p>';
				
				if($arr[118]=='YES'){
				echo"<a onclick=\"docexam('EYE CLINIC');\">Eye Clinic</a>";
				}else echo'<p style="color:#ccc;display:none;">Eye Clinic</p>';					
				
				if($arr[119]=='YES'){
				echo"<a onclick=\"docmch('MCH CLINIC');\">Mother Child Health</a>";
				}else echo'<p style="color:#ccc;display:none;">Mother Child Health</p>';

				 if($arr[230]=='YES'){
				echo"<a onclick=\"docexam('PHYSIOTHERAPY');\">Physiotherapy</a>";
				}else echo'<p style="color:#ccc;display:none;">Physiotherapy</p>';				
				
				if($arr[232]=='YES'){
				echo"<a onclick=\"docexam('PAEDIATRICS');\">Paediatrics</a>";
				}else echo'<p style="color:#ccc;display:none;">Paediatrics</p>';				

				if($arr[233]=='YES'){
				echo"<a onclick=\"emergencyexam('EMERGENCIES');\">Emergencies</a>";
				}else echo'<p style="color:#ccc;display:none;">Emergencies</p>';

				if($arr[234]=='YES'){
				echo"<a onclick=\"docexam('DIALYSIS');\">Dialysis</a>";
				}else echo'<p style="color:#ccc;display:none;">Dialysis</p>';
				
				
				
				if($arr[235]=='YES'){
				echo"<a onclick=\"docexam('AMBULANCE');\">Ambulance</a>";
				}else echo'<p style="color:#ccc;display:none;">Ambulance</p>';	
				

				if($arr[211]=='YES'){
				echo"<a onclick=\"docexam('NUTRITION');\">Nutrition</a>";
				}else echo'<p style="color:#ccc;display:none;">Nutrition</p>';	

				if($arr[211]=='YES'){
				echo' <a onclick="counselling();">Counselling</a>';
				}else echo'<p style="color:#ccc;display:none;">Counselling</p>';

				if($arr[211]=='YES'){
				echo' <a onclick="ccc();">Comprehensive Care</a>'; 
				}else echo'<p style="color:#ccc;display:none;">Comprehensive Care</p>';



				if($arr[122]=='YES'){
				echo' <a onclick="stockitems();">Manage Billable Services</a>';
				}else{ echo'<p style="color:#ccc;display:none;">Manage Billable Services</p>';}
				if($arr[123]=='YES'){
				echo' <a onclick="printreceipt();">Reprint Receipt/Invoice</a>';
				}else{ echo'<p style="color:#ccc;display:none;">Reprint Receipt/Invoice</p>';}				
					

				echo' </li> <li style="width:164px; border-right:0px dashed #000; float:left">';
				

				echo'<p style="color:#0085B2; text-decoration:underline">Inpatient Management</P>';
				
				if($arr[212]=='YES'){
				echo'<a onclick="editpatient(158);">Admit Patients</a>';
				}else echo'<p style="color:#ccc;display:none;">Admit Patients</p>';
				if($arr[213]=='YES'){
				echo' <a onclick="inpatient();">Ward Manager</a>';
				}else echo'<p style="color:#ccc;display:none;">Ward Manager</p>';
				 if($arr[214]=='YES'){
				echo' <a onclick="nwcustomipdbill();">Inpatients Charge Sheet</a>';
				}else echo'<p style="color:#ccc;display:none;">Inpatients Charge Sheet</p>';
				if($arr[215]=='YES'){
				echo' <a onclick="treatchart();">Inpatient Treatment(Nurse)</a>';
				}else echo'<p style="color:#ccc;display:none;">Inpatient Treatment(Nurse)</p>';

				if($arr[216]=='YES'){
				echo' <a onclick="treatchart2();">Inpatient Treatment(Doctor)</a>';
				}else echo'<p style="color:#ccc;display:none;">Inpatient Treatment(Doctor)</p>';
				
				if($arr[217]=='YES'){
				echo' <a onclick="dischargeTwo();">Discharge Summary</a>';
				}else echo'<p style="color:#ccc;display:none;">Discharge Summary</p>';
				
				if($arr[217]=='YES'){
				echo' <a onclick="riassunto_del_referto_medico();">Medical Report Summary</a>';
				}else echo'<p style="color:#ccc;display:none;">Medical Report Summary</p>';
				
				 if($arr[218]=='YES'){
				echo' <a onclick="infinalbill();">Inpatients Final Bill</a>';
				}else echo'<p style="color:#ccc;display:none;">Inpatients Final Bill</p>';
				
				if($arr[219]=='YES'){
				echo'<a onclick="admsumm1();">Discharge Patient</a>';
				}else echo'<p style="color:#ccc;display:none;">Discharge Patient</p>';
				

				

				if($arr[220]=='YES'){
				echo'<a onclick="repgrn(7);">Reprint Final Bill</a>';
				}else echo'<p style="color:#ccc;display:none;">Reprint Final Bill</p>';
				 
                	if($arr[115]=='YES'){
				echo' <a onclick="birthsregister();">Births Register</a>';
				}else echo'<p style="color:#ccc;display:none;">Births Register</p>';
					if($arr[221]=='YES'){
				echo' <a onclick="editpatient(122);">Deaths Register</a>';
				}else echo'<p style="color:#ccc;display:none;">Deaths Register</p>';  
				if($arr[253]=='YES'){
				echo' <a onclick="findDischargeSum();">Find Discharged Patient</a>';
				}else echo'<p style="color:#ccc;display:none;">Find Discharge Summary</p>';  
				if($arr[254]=='YES'){
				echo' <a onclick="buscarDischargeSum();">Find Discharge Summary</a>';
				}else echo'<p style="color:#ccc;display:none;">Find Discharge Summary</p>';  

				 					  
				echo' </li> ';
						 ?>
                </ul>
              </li>
             <li class="bh-nav-top"><a class="finance bh-nav-item" href="#" aria-haspopup="true" aria-expanded="false"><span class="bh-nav-icon" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="10" r="7"/><path d="M10 6v8M12.2 8H9.2a1.6 1.6 0 0 0 0 3.2h1.6a1.6 1.6 0 0 1 0 3.2H7.8"/></svg></span><span class="bh-nav-text">Finance</span></a>
                    <ul>
                     <?php
				 if($arr[126]=='YES'){
				echo'<li><a onclick="ledgers();">Ledgers Panel</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Ledgers Panel</p></li>';
				 if($arr[127]=='YES'){
				echo'<li><a onclick="creditcust();">Debtors Management</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Debtors Management</p></li>';
				 if($arr[128]=='YES'){
				echo'<li><a onclick="creditsup();">Creditors Management</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Creditors Management</p></li>';
				if($arr[129]=='YES'){
				echo'<li><a onclick="findinvoice();">Find Invoices</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Find Invoices</p></li>';
				if($arr[130]=='YES'){
				echo'<li><a onclick="issuecredit();">Pharmacy Credit Note</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">OPD Pharmacy Credit Note</p></li>';
				if($arr[248]=='YES'){
				echo'<li><a onclick="printcredit();">RePrint Credit Note</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">RePrint Credit Note</p></li>';

				 if($arr[131]=='YES'){
				echo'<li><a onclick="cashcollect();">Cash Collection</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Cash Collection</p></li>';
				if($arr[132]=='YES'){
				echo'<li><a onclick="expman();">Expenses Management</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Expenses Management</p></li>';

				if($arr[133]=='YES'){
				echo'<li><a onclick="bankdep();">Bank Deposits</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Bank Deposits</p></li>';
				if($arr[134]=='YES'){
				echo' <li><a onclick="bankdepp();">Bank Transactions</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Bank Transactions</p></li>';
				if ($arr[134] == 'YES') {
					echo ' <li><a onclick="openBankRecon();">Bank Reconciliation</a></li>';
				} else echo '<li><p style="color:#ccc;display:none;">Bank Reconciliation</p></li>';
				?>
             	 </ul>
               </li>
              <li class="bh-nav-top"><a class="inventory bh-nav-item" href="#" aria-haspopup="true" aria-expanded="false"><span class="bh-nav-icon" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7l7-4 7 4v6.5l-7 4-7-4z"/><path d="M3 7l7 4 7-4M10 11v6.5"/></svg></span><span class="bh-nav-text">Inventory</span></a>
                <ul style="width:328px">
             	<li style="width:164px; border-right:2px  dashed #000; float:left">
             	 <p style="color:#0085B2; text-decoration:underline">Stock Management</p>
                <?php
				 if($arr[135]=='YES'){
				echo' <a onclick="finditem();">Find Stock Items</a>';
				}else echo'<p style="color:#ccc;display:none;">Find Stock Items</p>';
      			if($arr[136]=='YES'){
				echo'<a onclick="addstockit();">Add/Edit Stock Items</a>';
				}else {echo'<p style="color:#ccc;display:none;">Add/Edit Stock Items</p>';}
			    if($arr[137]=='YES'){
				echo'<a onclick="purchase();">Goods Received Inwards</a>';
				}else {echo'<p style="color:#ccc;display:none;">Goods Received Inwards</p>';}
				if($arr[138]=='YES'){
				echo'<a onclick="stockrequest();">Stock Request</a>';
				}else {echo'<p style="color:#ccc;display:none;">Stock Request</p>';}
				 if($arr[139]=='YES'){
				echo'<a onclick="stocktransfer();">Stock Transfer </a>';
				}else {echo'<p style="color:#ccc;display:none;">Stock Transfer</p>';}
				 if($arr[140]=='YES'){
				echo"<a onclick=\"stocktake()\">Stock Taking</a>";
				}else echo'<p style="color:#ccc;display:none;">Stock Taking</p>';
                if($arr[141]=='YES'){
				echo"<a onclick=\"randomstocktake()\">Random Stock Take</a>";
				}else echo'<p style="color:#ccc;display:none;">Random Stock Take</p>';
				if($arr[142]=='YES'){
				echo'<a onclick="stockadj()">Stock Adjustment</a>';
				}else echo'<p style="color:#ccc;display:none;">Stock Adjustment</p>';
				if($arr[143]=='YES'){
				echo'<a onclick="stockval()">Stock Valuation</a>';
				}else echo'<p style="color:#ccc;display:none;">Stock Adjustment</p>';
				
				if($arr[144]=='YES'){
				echo'<a onclick="stockusage()">Stock Usage Register</a>';
				}else echo'<p style="color:#ccc;display:none;">Stock Usage Register</p>';
				if($arr[145]=='YES'){
				echo'<a onclick="stockissuetouser()">Stock Issue</a>';
				}else echo'<p style="color:#ccc;display:none;">Stock Stock Issue</p>';
				if($arr[146]=='YES'){
				echo'  <a onclick="returnout();">Goods Returned Outwards</a>';
				}else echo'<p style="color:#ccc;display:none;">Goods Returned Outwards</p>';
				  if($arr[147]=='YES'){
				echo'<a onclick="lpo();">Local Purchase Order</a>';
				}else echo'<p style="color:#ccc;display:none;">Local Purchase Order</p>';
				
				?>
            	<li style="width:164px; float:left">
                 <p style="color:#0085B2; text-decoration:underline">Asset Management</p>
                      <?php
                 if($arr[236]=='YES'){
				echo' <a onclick="addasset();">Add New Asset</a>';
				}else echo'<p style="color:#ccc;display:none;">Add New Asset</p>';
				if($arr[237]=='YES'){
				echo' <a onclick="editasset(113);">Edit Asset Details</a>';
				}else echo'<p style="color:#ccc;display:none;">Edit Asset Details</p>';
				if($arr[238]=='YES'){
				echo' <a onclick="editasset(114);">Delete Asset</a>';
				}else echo'<p style="color:#ccc;display:none;">Delete Asset</p>';
				if($arr[239]=='YES'){
				echo' <a onclick="findasset();">Find Assets</a>';
				}else echo'<p style="color:#ccc;display:none;">Find Assets</p>';
				if($arr[240]=='YES'){
				echo' <a onclick="assignasset(117);">Assign Asset</a>';
				}else echo'<p style="color:#ccc;display:none;">Assign Asset</p>';
				if($arr[241]=='YES'){
				echo' <a onclick="returnasset(119);">Return Asset</a>';
				}else echo'<p style="color:#ccc;display:none;">Return Asset</p>';
				if($arr[242]=='YES'){
				echo' <a onclick="dispasset(144);">Dispose Asset</a>';
				}else echo'<p style="color:#ccc;display:none;">Dispose Asset</p>';
				if($arr[243]=='YES'){
				echo' <a onclick="dispasset(121);">Manage Asset</a>';
				}else echo'<p style="color:#ccc;display:none;">Manage Asset</p>';
				if($arr[244]=='YES'){
				echo' <a onclick="assetcount();">Asset Count</a>';
				}else {echo'<p style="color:#ccc;display:none;">Asset Count</p>';}
                      ?>
                   </li>
                     </ul> 
            
              
              <li class="bh-nav-top"><a class="reports bh-nav-item" href="#" aria-haspopup="true" aria-expanded="false"><span class="bh-nav-icon" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 2.5h6l4 4v11H5z"/><path d="M11 2.5v4h4"/><path d="M7.5 10.5h5M7.5 13.5h5"/></svg></span><span class="bh-nav-text">Reports</span></a> 
            <ul style="width:824px">
             <li style="width:164px; border-right:2px  dashed #000; float:left">
              <?php
			  if($arr[148]=='YES'){
                echo' <p style="color:#0085B2; text-decoration:underline">Cashier Daily Summary</P>';
				echo' <a onclick="cashiernhifdaily()">SHIF Daily Summary</a>';
				}else echo'<p style="color:#ccc;display:none;">Daily SHIF|CASH Summary</p>';

			  if($arr[149]=='YES'){
				echo' <a onclick="cashierdaily()">Combined Daily Summary</a>
				<a onclick="cashiercashdaily();">CASH Daily Summary</a>
				<a onclick="salesrep(10);">Unposted Entries</a>';
				}else echo'<p style="color:#ccc;display:none;">Combined Daily Summary</p>';
				if($arr[150]=='YES'){
                echo' <p style="color:#0085B2; text-decoration:underline">Three Months Summary</P>';
				echo"<a onclick=\"threemonths();\">Several Months Summary</a>";
				echo' <a onclick="dailysumm()">Managerial Daily Summary</a>';
				}else echo'<p style="color:#ccc;display:none;">Three Months Summary</p>';
								if ($arr[151] == 'YES') {
									echo ' <p style="color:#0085B2; text-decoration:underline">Financial Statements</P>';
									echo "<a onclick=\"finrep(84)\">Trial Balance</a>
									<a onclick=\"finrep(26)\">Income Statement</a>
									<a onclick=\"finrep(27)\">Balance Sheet</a>
									<a onclick=\"finrep(25)\">Trial Balance 2</a>";
								} else echo '<p style="color:#ccc;display:none;">Financial Statements</p>';
				if($arr[152]=='YES'){
				    echo'<p style="color:#0085B2; text-decoration:underline">Income Report</p>';
            echo" <a onclick=\"window.open('report.php?id=13&code=6');\">Today Income</a>";
            echo'<a onclick="salesrep(1);">All</a>
            <a onclick="salesun(5);">By Item</a>
						<a onclick="salesun2(7);">By Department</a>
						<a onclick="salesun3(8);">By Patient</a>
						<a onclick="salesun7(9);">By Doctor</a>';
				}else echo'<p style="color:#ccc;display:none;">Invoices/Receipts Report</p>';

				if($arr[153]=='YES'){
						echo' <a onclick="labincrep()">Laboratory Income Report</a>';
				}else echo'<p style="color:#ccc;display:none;">Laboratory Income Report</p>';
				if($arr[154]=='YES'){
						echo'<a onclick="depincome(7)">Departmental Income</a>';
				}else {echo'<p style="color:#ccc;display:none;">Departmental Income</p>';}				
				if($arr[155]=='YES'){
					echo'<p style="color:#0085B2; text-decoration:underline">Invoices Report</p>';
          echo"<a onclick=\"window.open('report.php?id=63&code=1');\">Today Invoices</a>";
          echo'<a onclick="invoicerep(2);">All Invoices</a>';
					echo'<a onclick="invoicerep2(3);">By Company</a>';
				  echo'<a onclick="invoicerep(4);">Receipts(Cash Paying)</a>';
				  echo'<a onclick="repfinalb(7);">Reprint Final Bill</a>';
				}else {echo'<p style="color:#ccc;display:none;">Invoices Report</p>';}

			
				echo'</li>';
				//echo'<li style="width:160px; border-right:2px  dashed #000; float:left">';
				


		
		//echo'</li>';
		echo'<li style="width:164px; border-right:2px  dashed #000; float:left">';
					if($arr[156]=='YES'){
				echo'<p style="color:#0085B2; text-decoration:underline">Procurement</p>
               		 <a onclick="purchaserep(1,85);">Goods Received-All</a>
              		<a onclick="purchaserep(2,86);">Goods Received-By Item</a>
					<a onclick="purchaserep(3,87);">Goods Received-By Supplier</a>
					
					  <a onclick="returnrep(1,66);">Goods Returned-All</a>
              		<a onclick="returnrep(2,67);">Goods Returned-By Item</a>
					<a onclick="returnrep(3,68);">Goods Returned-By Supplier</a>
					
					<a onclick="repgrn(1);">Reprint GRN(Received) 1</a>
					<a onclick="dept_guds_received_note();">Reprint GRN(Received) 2</a>

					<a onclick="repgrn(2);">Reprint GRN(Returned)</a>
					<a onclick="repgrn(3);">Reprint LPO</a>
					<a onclick="lposumm(5)">LPO Summaries</a>
					<a onclick="invoicelist();">Invoice Listing-Inwards</a>
					<a onclick="invoicelist2();">Invoice Listing-Outwards</a>';

					echo"<a onclick=\"window.open('report.php?id=55&code=1')\">Inventory-All</a>";
					echo'<a onclick="invrep2(2);">Inventory-By Category</a>
					<a onclick="invrep3(3);">Inventory-By Supplier</a>';
					#echo'<a onclick="expreport(3);">Expiry Report 1</a>';
					echo'<a onclick="expiryrecep();">Expiry Report</a>';

				}else echo'<p style="color:#ccc;display:none;">Procurement</p>';
				if($arr[157]=='YES'){
				echo'<a  onclick="repgrn(5)">Reprint Variance Report</a>';
				}else echo'<p style="color:#ccc;display:none;">Reprint Variance Report</p>';
				if($arr[158]=='YES'){
				echo'<a  onclick="varsum(5)">Variance Reports</a>';
				}else echo'<p style="color:#ccc;display:none;">Variance Reports</p>';
				if($arr[159]=='YES'){
				echo'<a  onclick="varsum2(5)">Variance Summaries</a>';
				}else echo'<p style="color:#ccc;display:none;">Variance Summaries</p>';

			  if($arr[175]=='YES'){
				echo'<p style="color:#0085B2; text-decoration:underline">Stock Transfer Report</p>
				     <a onclick="issuerep1(1);">Stock Transfer-All</a>
				     <a onclick="issuerep2(2);">Stock Transfer-By Dept</a>
             <a onclick="transfersumm(5)">Transfer Summaries</a>';
				}else echo'<p style="color:#ccc;display:none;">Stock Transfer Report</p>';			
				if($arr[162]=='YES'){
				echo'<p style="color:#0085B2; text-decoration:underline">Stock Movement Reports</p>';
				echo'<a  onclick="stockuserep()">Stock Usage Report</a>';
				echo'<a onclick="inven_daily_summary();">Stock Daily Sum Pharm</a>';
				echo'<a onclick="inven_daily_summary2();">Stock Daily Sum Admin</a>';
				echo'<a onclick="inven_daily_summary3();">Dispensing Drug Log</a>';
				echo'<a onclick="inven_daily_summary4();">Admin Drug Log</a>';
				}else {echo'<p style="color:#ccc;display:none;">Stock Movement Report</p>';}
				

				
				
				 echo'</li>';
				   
				echo'<li style="width:160px; border-right:2px  dashed #000; float:left">';
				
				  if($arr[161]=='YES'){
				echo'<p style="color:#0085B2; text-decoration:underline">HR Reports</p>';
					echo'  <a onclick="monthrep()">Detailed Monthly Report</a>
					<a onclick="monthbank()">Monthly Bank Summary</a>
					<a onclick="monthind()">Individual Bank Report</a>';
					 echo"<a onclick=\"window.open('hroutput.php?id=16&code=1')\">Salaries Summary</a>";
	         echo'<a onclick="employeesum()">Employee Summary</a>
	              <a onclick="indpayslip()">Individual Pay Slips</a>
					 <a onclick="payslip()">All Pay Slips</a>
					 <a onclick="attendancerep()">Attendance Report</a>
					 <a onclick="leaverep()">Leave Report</a>
					 <a onclick="emplist()">Employees List</a>';
					}else {echo'<p style="color:#ccc;display:none;">HR Reports</p>';}

				echo'<p style="color:#0085B2; text-decoration:underline">Other Reports</p>';
				if($arr[163]=='YES'){
				echo'<a onclick="ledrep()">Ledger Reports</a>';
				}else echo'<p style="color:#ccc;display:none;">Ledger Reports</p>';
				if($arr[164]=='YES'){
				echo'<a onclick="queuerep()">Queue Reports</a>';
				}else echo'<p style="color:#ccc;display:none;">Queue Reports</p>';
				if($arr[165]=='YES'){
				echo'<a onclick="logrep()">Activity Log-All</a>';
				}else echo'<p style="color:#ccc;display:none;">Activity Log-All</p>';
				 if($arr[166]=='YES'){
				echo'<a onclick="logrepuser()">Activity Log By User</a>';
				}else echo'<p style="color:#ccc;display:none;">Activity Log  By User</p>';
				if($arr[167]=='YES'){
				echo"<a onclick=\"window.open('report.php?id=32&code=1')\">Debtors List</a>";
				}else echo'<p style="color:#ccc;display:none;">Debtors List</p>';
				if($arr[168]=='YES'){
				echo"<a onclick=\"window.open('report.php?id=57&code=1')\">System Users List</a>";
				}else echo'<p style="color:#ccc;display:none;">System Users  List</p>';
				if($arr[169]=='YES'){
				echo"<a onclick=\"window.open('report.php?id=33&code=1')\">Creditors List</a>";
				}else {echo'<p style="color:#ccc;display:none;">Creditors List</p>';}
				if($arr[177]=='YES'){
				echo'<a onclick="mesrep(2)">Message Reports</a>';
				}else {echo'<p style="color:#ccc;display:none;">Message Reports</p>';}	
				

				if($arr[130]=='YES'){
				  echo'<p style="color:#0085B2; text-decoration:underline">RePrint Credit Note</p>';
				echo'<a onclick="printcredit();">RePrint Credit Note [OPD]</a>';
				}else {echo'<p style="color:#ccc;display:none;">RePrint Credit Note</p>';}

				if($arr[248]=='YES'){
        echo'<a onclick="getPharmCredit(1);">Reprint Credit Note [IDP]</a>';
				}else {echo'<p style="color:#ccc;display:none;">RePrint Credit Note</p>';}
						
					if($arr[258]=='YES'){
					  echo'<p style="color:#0085b2; text-decoration:underline">Cash Income Reports</p>';
					echo'<a onclick="cashiercash_comp_daily();">By Cashier</a>';
					}else {echo'<p style="color:#ccc;display:none;">Cash Income Reports</p>';}				




	echo'</li>';
	echo'<li style="width:160px; border-right:2px  dashed #000; float:left">';
			    if($arr[170]=='YES'){
				echo'<p style="color:#0085B2; text-decoration:underline">Lab Reports</p>
						 <a onclick="labrep1()">All Tests</a>
             <a onclick="labrep2()">By Source</a>
             <a onclick="labrep3()">By Test</a>
				     <a onclick="labrep4()">By Sample</a>
				     <a onclick="labrep5()">By Patient</a>
					   <a onclick="labrep6()">By Section</a>
					   <a onclick="todaylabrep()">Patients Lab Requests</a>';
				}else{ echo'<p style="color:#ccc;display:none;">Lab Reports</p>';}				
				if($arr[171]=='YES'){
				    echo'<p style="color:#0085B2; text-decoration:underline">Pharmacy Reports</p>';
				 		echo'<a onclick="pharmrep1()">All Prescriptions</a>';
            echo'<a onclick="pharmrep2()">By Patient</a>';
            #echo'<a onclick="pharmrep3()">Custom Dispenses</a>';
				}else{echo'<p style="color:#ccc;display:none;">Pharmacy Reports</p>';}			

				if($arr[249]=='YES'){
				echo'<p style="color:#0085B2;text-decoration:underline">Radiology Reports</p>
				 	<a onclick="radrep1()">All Tests</a>
                     <a onclick="radrep2()">By Test</a>
				   <a onclick="radrep3()">By Patient</a>';
				}else{ echo'<p style="color:#ccc;display:none;">Radiology Reports</p>';}
				if($arr[250]=='YES'){
				echo'<p style="color:#0085B2;text-decoration:underline">Theatre Reports</p>
				     <a onclick="theatrep1()">All Procedures</a>
             <a onclick="theatrep2()">By Patient</a>';
				}else{echo'<p style="color:#ccc;display:none;">Theatre Reports</p>';}
				
				if($arr[160]=='YES'){
						echo'<p style="color:#0085B2; text-decoration:underline">Stock/Goods Price List</p>';
            echo" <a onclick=\"window.open('r/sg-price-list-all.php?id=8&code=1')\">All</a>";
            echo'<a onclick="goodspricelist(2);">By Section</a>';
				}else {echo'<p style="color:#ccc;display:none;">Stock/Goods Price List</p>';}
				 
				if($arr[172]=='YES'){
				   echo'<p style="color:#0085B2; text-decoration:underline">Services Price List</p>';
           echo" <a onclick=\"window.open('report.php?id=16&code=1')\">All</a>";
           echo'<a onclick="pricelist(2);">By Dept</a>';
				}else {echo'<p style="color:#ccc;display:none;">Stock Price List</p>';}		

				


	echo'</li>';
	echo'<li style="width:160px; border-right:0px  dashed #000; float:left">
				 <p style="color:#0085B2; text-decoration:underline">Records Reports</p>';
				if($arr[173]=='YES'){
				echo'<a onclick="diagrep()">Diagnosis Reports (OPD)</a>
						 <a onclick="diagrep2()">Diagnosis Reports (IPD)</a>';
        echo'<a onclick="generalOutpatients()">General Outpatients</a>';
        echo'<a onclick="generalInpatients()">General In-Patients</a>';
				echo'<a onclick="patientrep(1);">Outpatients Summary</a>
					   <a onclick="patientrep(4);">Unregistered Patients</a>
             <a onclick="patientrev(3);">Patients Review Report</a>';
				echo'<a onclick="birthrep()">Births Reports</a>
						 <a onclick="deathrep()">Deaths Reports</a>';
				}else {echo'<p style="color:#ccc;display:none;">Records Reports</p>';}		
				if($arr[174]=='YES'){
					echo'<p style="color:#10504F; text-decoration:underline">Records Reports</p>';
							echo'<a onclick="patlist()">All Patients List</a>';
						 echo'<a onclick="pharmrep3()">All Custom Patients</a>';
             #echo'<a onclick="bydeptcustomrep()">Custom Patients By Dept </a>';
						 echo'<a onclick="patientseenbydoc()">Patients By Doctor</a>';
              echo'<a onclick="genoutrep()">General OPD By Clinics </a>';
				}else {echo'<p style="color:#ccc;display:none;">All Patients List</p>';}				
				if($arr[222]=='YES'){
				  echo'<p style="color:#0085B2; text-decoration:underline">Admissions Reports</p>';
      	  echo'<a onclick="generalAdmissions()">General Admissions</a>';
      	  echo'<a onclick="diagrep2()">Diagnosis Reports (IPD)</a>';
          echo'<a onclick="patientrep(2);">Admissions Summary</a>';	
      	  echo'<a onclick="repgrn(6);">Reprint Admisssion Form</a>';
        echo'<a onclick="getDischargeSummary(1);">Reprint Discharge Summary</a>';
      	  echo'<a onclick="inpatlist()">In-Patients List</a>';
      	  echo'<a onclick="admrep()">Inpatient Discharges</a>';
				}else {echo'<p style="color:#ccc;display:none;">In-Patient Reports</p>';}	
				if($arr[174]=='YES'){
				  echo'<p style="color:#0085B2; text-decoration:underline">HHA Reports</p>';
          echo'<a onclick="genbyclinic()">Patients By Clinic</a>';
				}else {echo'<p style="color:#ccc;display:none;">HHA Reports</p>';}	
				if($arr[257]=='YES'){
				  echo'<p style="color:#0085B2; text-decoration:underline">Health Statistics Reports</p>';
          echo'<a onclick="opdTypeComparision()">OPD Visits Comparison</a>';
          echo'<a onclick="antenatalAttendance()">Antenatal Attendance</a>';
        echo'<a onclick="theatreUtilizationSearch()">Theatre/Rad Utilization</a>';
				}else {echo'<p style="color:#ccc;display:none;">Health Statistics Reports</p>';}			



				
echo'</li>';
				?>
      </ul>
      </li>
      <li class="bh-nav-top"><a class="employees bh-nav-item" href="#" aria-haspopup="true" aria-expanded="false"><span class="bh-nav-icon" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="7.5" cy="7" r="2.8"/><path d="M2.5 16.5c0-2.8 2.2-4.4 5-4.4s5 1.6 5 4.4"/><circle cx="14.6" cy="7.6" r="2.2"/><path d="M13.2 12.4c2.6-.5 4.3 1 4.3 3.9"/></svg></span><span class="bh-nav-text">Employees</span></a>
    <ul style="width:495px">
   	<li style="width:164px; border-right:2px  dashed #000; float:left">
   <?php
        if($arr[178]=='YES'){
				echo' <a onclick="newemp();">Add New Employee</a>';
				}else echo'<p style="color:#ccc;display:none;">Add New Employee</p>';
				  if($arr[179]=='YES'){
				echo' <a onclick="seeemp(61);">Edit Employee Info</a>';
				}else echo'<p style="color:#ccc;display:none;">Edit Employee Info</p>';
				  if($arr[180]=='YES'){
				echo' <a onclick="findemp();">Find Employee</a>';
				}else echo'<p style="color:#ccc;display:none;">Find Employee</p>';
				  if($arr[181]=='YES'){
				echo' <a onclick="seeemp(74);">Delete Employee Record</a>';
				}else echo'<p style="color:#ccc;display:none;">Delete Employee Record</p>';
				  if($arr[182]=='YES'){
				echo' <a onclick="seeemp(62.1);">Employee Chart</a>';
				}else echo'<p style="color:#ccc;display:none;">Employee Chart</p>';
				  if($arr[183]=='YES'){
				echo' <a onclick="terminate();">Terminate Employment</a>';
				}else echo'<p style="color:#ccc;display:none;">Terminate Employment</p>';
				  if($arr[184]=='YES'){
				echo' <a onclick="documents();">Download H/R Documents</a>';
				}else echo'<p style="color:#ccc;display:none;">Download H/R Documents</p>';
				  if($arr[185]=='YES'){
				echo' <a onclick="exemp();">Ex-Employees Panel</a>';
				}else {echo'<p style="color:#ccc;display:none;">Ex-Employees Panel</p>';}
				?>
           </li>
                    
              <li style="width:164px; float:left;border-right:2px  dashed #000;">
                    <?php
                 if($arr[186]=='YES'){
				echo' <a onclick="takeatt();">Attendance Manager</a>';
				}else echo'<p style="color:#ccc;display:none;">Attendance Manager</p>';
				 if($arr[187]=='YES'){
				echo' <a onclick="reqleave();">Request for Leave</a>';
				}else echo'<p style="color:#ccc;display:none;">Request for Leave</p>';
				 if($arr[188]=='YES'){
				echo' <a onclick="authleave();">Authorize Leave</a>';
				}else echo'<p style="color:#ccc;display:none;">Authorize Leave</p>';
				 if($arr[189]=='YES'){
				echo' <a onclick="leavecal();">Leave Calendar</a>';
				}else echo'<p style="color:#ccc;display:none;">Leave Calendar</p>';
				 if($arr[190]=='YES'){
				echo' <a onclick="newpay();">New Payroll</a>';
				}else echo'<p style="color:#ccc;display:none;">New Payroll</p>';
				 if($arr[191]=='YES'){
				echo' <a onclick="editpay();">Edit Payroll</a>';
				}else echo'<p style="color:#ccc;display:none;">Edit Payroll</p>';
				 if($arr[192]=='YES'){
				echo' <a onclick="paysett();">Payroll Settings</a>';
				}else echo'<p style="color:#ccc;display:none;">Payroll Settings</p>';
				 if($arr[193]=='YES'){
				echo' <a onclick="empben();">Employee Benefits</a>';
				}else {echo'<p style="color:#ccc;display:none;">Employee Benefits</p>';}
				?>
               </li>
               <li style="width:164px; float:left">
               <p style="color:#0085B2; text-decoration:underline">External Medics</p>
                    <?php
                if($arr[194]=='YES'){
				echo'<a onclick="newextmedic();">Add/Edit External Medics</a>';
				}else echo'<p style="color:#ccc;display:none;">Add/Edit External Medics</p>';
				 if($arr[195]=='YES'){
				echo' <a onclick="locregister();">Locums Register</a>';
				}else echo'<p style="color:#ccc;display:none;">Locums Register</p>';
				 if($arr[196]=='YES'){
				echo' <a onclick="locin();">Locum Check-in</a>';
				}else echo'<p style="color:#ccc;display:none;">Locum Check-in</p>';
				 if($arr[197]=='YES'){
				echo' <a onclick="locout();">Locum Check-out</a>';
				}else echo'<p style="color:#ccc;display:none;">Locum Check-out</p>';
				?>
               </li>
              	</ul>
              </li>
             <li class="bh-nav-top"><a class="settings bh-nav-item" href="#" aria-haspopup="true" aria-expanded="false"><span class="bh-nav-icon" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="10" r="3"/><path d="M10 2.6v2.1M10 15.3v2.1M2.6 10h2.1M15.3 10h2.1M4.75 4.75l1.5 1.5M13.75 13.75l1.5 1.5M15.25 4.75l-1.5 1.5M6.25 13.75l-1.5 1.5"/></svg></span><span class="bh-nav-text">Settings</span></a>
              <ul>
               <?php
			  	if($arr[198]=='YES'){
				echo'<li><a onclick="company();">Company Details</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Company Details</p></li>';
				if($arr[199]=='YES'){
				echo'<li><a onclick="adduser();">System Users Manager</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">System Users Manager</p></li>';
				if($arr[200]=='YES'){
				echo'<li><a onclick="useraccess();">User Access Rights</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">User Access Rights</p></li>';
				if($arr[201]=='YES'){
				echo'<li><a onclick="itemaccess();">Items Access Rights</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Items Access Rights</p></li>';
				if($arr[202]=='YES'){
				echo'<li><a onclick="changelogin();">Change Password</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Change Password</p></li>';				
				if($arr[245]=='YES'){
				echo'<li><a onclick="setupbeds();">Set Ward Beds</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Set Ward Beds</p></li>';				
				if($arr[261]=='YES'){
				echo'<li><a onclick="onboardBalsPanel();">Onboard Balances</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Onboard Balances</p></li>';					
				if($arr[261]=='YES'){
				echo'<li><a onclick="manageAssetsPanel();">Manage Assets</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Manage Assets</p></li>';				
				if($arr[203]=='YES'){
				echo'<li><a onclick="setupcomp();">Set up Comp IPS</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Set up Comp IPS</p></li>';
				if($arr[204]=='YES'){
				echo'<li><a onclick="setupbank();">Set up Banks</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Set up Banks</p></li>';
				if($arr[205]=='YES'){
				echo' <li><a onclick="notes();">Medical Notes</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Deaths Register</p></li>';  
				if($arr[206]=='YES'){
				echo'<li><a onclick="addmedical();">Add/Edit Medical Data</a></li>';
				}else echo'<li><p style="color:#ccc;display:none;">Add/Edit Medical Data</p></li>';
				if($arr[202]=='YES'){
				echo"<li><a onclick='archive_records()'>Archive and Records</a></li>";
				}else echo'<li><p style="color:#ccc;display:none;">Archive and Records</p></li>';			
				if($arr[201]=='YES'){
				echo"<li><a onclick='smarthr_manager()'>Smart HR Manager</a></li>";
				}else echo'<li><p style="color:#ccc;display:none;">Smart HR Manager</p></li>';		
				// if($arr[202]=='YES'){
				// echo"<li><a onclick='archive_records()'>Archive and Records</a></li>";
				// }else echo'<li><p style="color:#ccc;display:none;">Archive and Records</p></li>';			
				if($arr[202]=='YES'){
				echo"<li><a onclick='archive_records_23012024_26112025()'>Archive and Records</a></li>";
				}else echo'<li><p style="color:#ccc;display:none;">Archive and Records</p></li>';	
				// if($arr[202]=='YES'){
				// echo"<li><a onclick='archive_records_06022023_22012024()'>Archive and Records</a></li>";
				// }else echo'<li><p style="color:#ccc;display:none;">Archive and Records</p></li>';			
				// if($arr[202]=='YES'){
				// echo"<li><a onclick='archive_records_23012024_26112025()'>Archive and Records</a></li>";
				// }else echo'<li><p style="color:#ccc;display:none;">Archive and Records</p></li>';			
				// if($arr[201]=='YES'){
				// echo"<li><a onclick='smarthr_manager()'>Smart HR Manager</a></li>";
				// }else echo'<li><p style="color:#ccc;display:none;">Smart HR Manager</p></li>';			
				// if($arr[202]=='YES'){
				// echo"<li><a onclick='archive_records()'>Back To Main System</a></li>";
				// }else echo'<li><p style="color:#ccc;display:none;">Back To Main Systems</p></li>';		
								
							
				
				?>
              	 </ul>
                </li>
                
             </ul>    	

          <div class="cleaner"></div>  	
          
        </nav>
        

  </div><!--end header-->
  <div class="cleaner"></div> 
 <div id="sidep" style="overflow:hidden" title="">
	<?php
	if (isset($arr) && is_array($arr)) {
		$bh_favs = array();
		if (isset($arr[101]) && $arr[101] == 'YES') $bh_favs[] = array('newcustomtpatient();', 'Add new patient');
		if (isset($arr[103]) && $arr[103] == 'YES') $bh_favs[] = array('editpatient(114);', 'Patient chart');
		if (isset($arr[104]) && $arr[104] == 'YES') $bh_favs[] = array('findpatient();', 'Find OPD patient');
		if (isset($arr[106]) && $arr[106] == 'YES') $bh_favs[] = array('reception();', 'Reception');
		if (isset($arr[112]) && $arr[112] == 'YES') $bh_favs[] = array('paymentsTesting();', 'Receive payment');
		if (!empty($bh_favs)) {
			echo '<div class="bh-favourites"><h3>My shortcuts</h3><ul>';
			foreach ($bh_favs as $bh_f) {
				echo '<li><a href="#" onclick="' . $bh_f[0] . ' return false;">' . $bh_f[1] . '</a></li>';
			}
			echo '</ul></div>';
		}
	}
	?>
  <div class="demo">
  <div style="width:auto; height:40px; border:1px solid #0085B2; background:#fff; padding:0 0px; border-radius:0px">
  <?php 
  	
	echo'<img alt="Photo" src="'.$photo.'" style="float:left;max-height:40px;">
	<p style="margin-left:10px; color:#10504F; font-size:15px; margin-top:3px; float:left">Logged in as: '.$username.'<br/>
	<small style="size:10px">Dept:'.$userdep.'</small></p>';
	# - '.$usuario['usertype'].' - '.$usuario['old_in_user_type'].'
	?>
   
  </div>
  <?php
$result =mysqli_query($db, "select * from company");
$row=mysqli_fetch_array($result);

  ?>
 <div style="height:105px; border:1px solid #0085B2; background:#fff; padding:0 0px; border-radius:0px;margin-top:5px">
  <img alt="Logo" src="images/logo.png" style="float:left;max-height:95px; margin:0px 10px 0 0px"/>
 <p style="font-size:12px; margin-top:5px; margin-right:5px; color:#000">Licensed to:<br/><strong style="font-size:12px;color:#333;"><?php echo strtoupper(stripslashes($row['CompanyName'])) ?></strong><br/><?php echo strtoupper(stripslashes($row['Motto'])) ?><br/></p>
</div>
<h2 style="color:#fff;margin:7px 0 7px 5px">Quick Access Panel</h2>
<div id="accordion">
<h3 ><a style="color:#fff" href="#">Start a Task</a></h3>
	<div>
    <img alt="Profile" src="images/profile.png" style="width:17px; height:17px; margin-top:0px; float:left"/>
	<a id="sidelink" style="float:left; margin:1px 0 0 5px; font-size:11px; color:#000;cursor:pointer; text-decoration:none" onclick="homepage();">Dashboard</a>
    <div class="cleaner" style="margin-bottom:5px"></div> 
    <img alt="Att" src="images/att.jpg" style="width:17px; height:17px; margin-top:0px; float:left"/>
	<a id="sidelink" style="float:left; margin:1px 0 0 5px; font-size:11px; color:#000; cursor:pointer; text-decoration:none" onclick="reception();">Reception</a>
    <div class="cleaner" style="margin-bottom:5px"></div> 
     <img alt="Delete" src="images/delete.png" style="width:17px; height:17px; margin-top:0px; float:left"/>
	<a id="sidelink" style="float:left; margin:1px 0 0 5px; font-size:11px; color:#000; cursor:pointer; text-decoration:none" onclick="hidenewstude();">Exit Main Display</a>
    <div class="cleaner" style="margin-bottom:5px"></div> 
  	</div>
	<h3 style="color:#fff"><a style="color:#fff" href="#">Quick Item Find</a></h3>
	<div>
	  <div class="ui-widget" style="margin-left:-12px">
	<label for="item1" class="bh-visually-hidden">Quick Item Find</label><select id="item1">
		<option value="">Select one...</option>
        <?php
		$resulta =mysqli_query($db, "select * from items  where ".$_SESSION['rights']." order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['ItemCode']).'">'.stripslashes($rowa['ItemName']).'</option>';
							}
		?>
	</select>
	</div>
	</div>
    <h3 style="color:#fff"><a style="color:#fff" href="#">Quick Patient Find</a></h3>
            <div style="height:70px">
             	 <div class="ui-widget" style="margin-left:-12px">
	<label for="pnt1" class="bh-visually-hidden">Quick Patient Find</label><select id="pnt1">
		<option value="">Select one...</option>
        <?php
		
		$resulta =mysqli_query($db, "select * from patients where status=1 order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['pntno']).'">'.stripslashes($rowa['name']).' '.stripslashes($rowa['oname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['pntno']).'</option>';
							}
		?>
	</select>
	</div>
            </div>
            
            <h3 style="color:#fff"><a style="color:#fff" href="#">Ongoing Notifications</a></h3>
            <div>
                        <?php 
echo'<div id="chata" style="height:90px; padding-bottom:5px;" ondblclick="refreshchat();" onmouseenter="scroller2();" title="Double Click to Refresh">
		<div id="scrollbar2" style="width:200px; height:90px" >
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
		echo"<img alt=\"\" src=\"images/bullet.png\" style=\"width:12px; height:12px; margin:0 3px -2px 0\" /><strong style=\"color:#0085B2\">".$name."</strong>-".$chat."</p>";
									}
										
										
								echo'</div></div></div>	</div><div class="cleaner"></div> 
		
		<form action="#" method="get">
		<div id="search" class="input_field" style="float:left;margin:10px;width:180px; padding:0">
		<input type="text" placeholder="Write Something..." name="keyword" id="comme"  class="input_field" style="border:0; float:left;width:130px;"';echo"/>";
		echo'<input aria-label="Text field" type="text"  id="" class="" style="font-size:12px; display:none; width:50px"/>';
				echo"<img alt=\"\" src=\"images/back2.png\" onclick=\"postchat('".$username."')\" height=\"24\" width=\"24\" id=\"searchbutton\" style=\"margin:3px 5px 0 0; float:right; cursor:pointer\">
				</div></form>";
				echo'<div id="xclusive" style="width:50px; height:50px; display:none"></div>';
?>  
   
         </div>

</div>

</div><!-- End demo -->

  </div>
   <div id="mainp" tabindex="-1">
   
   
     
   
   
<div id="progressbar" style="width:190px;margin-top:22%;margin-left:39%">
<div style="float:left; margin-top:3px;  margin-left:5px;color:#0085B2; font-weight:bold">Loading Dashboard...Kindly Wait</div></div>



        
        
        
  
 </div>
    		<div id="mytask" title="Task Reminder"></div> 
                  <div id="mycalendar" title="Event/Appointment Reminder"></div>          
                
    <div class="cleaner"></div> 
     <div id="bottomp" class="site">
            <nav id="footer_menul" class="ddsmoothmenu" aria-label="Session menu">
                    <ul>
                        <li><a onclick="logout()" class="logout" title="Better Health Hospital Management Information System"></a></li>  
                    
                     </ul>
             </nav>
             <div id="footer_menuc" class="ddsmoothmenu">
             <div id="clock">
             </div>
             </div>
             <nav id="footer_menur" class="ddsmoothmenu" aria-label="Calendar and date picker">
                    <ul>
                  <li><input type="button"  id="datepickermain" class="datepick" style="font-size:0px"/></li>
                	
                         
                         
                    </ul>
             </nav>
  	</div>
    <div class="cleaner"></div>
    
</div><!--end container-->
<div id="warddialog" title="Assign a Bed">
<a class="labels">Bed No:</a>
<label for="bednoo" class="bh-visually-hidden">Bed No:</label><input type="text" id="bednoo"  class="in_field" value="" style="width:120px;float:right; margin-right:10px; border-color:var(--color-danger, #DC2626)" disabled="disabled"/> 
<label for="a" class="bh-visually-hidden">Bed No:</label><input type="text" id="a"  class="in_field" value="" style="display:none"/> 
<div class="cleaner_h10"></div>
<a class="labels">Room No:</a>
<label for="roomno" class="bh-visually-hidden">Room No:</label><input type="text" id="roomno"  class="in_field" value="" style="width:120px;float:right; margin-right:10px ;border-color:var(--color-danger, #DC2626)" disabled="disabled"/> 
<div class="cleaner_h10"></div>
<a class="labels">Room Type:</a>
<label for="roomtype" class="bh-visually-hidden">Room Type:</label><input type="text" id="roomtype"  class="in_field" value="" style="width:120px;float:right; margin-right:10px; border-color:var(--color-danger, #DC2626)" disabled="disabled"/> 
<div class="cleaner_h10"></div>
<a class="labels">Ward Type:</a>
<label for="wardtype" class="bh-visually-hidden">Ward Type:</label><input type="text" id="wardtype"  class="in_field" value="" style="width:120px;float:right; margin-right:10px; border-color:var(--color-danger, #DC2626)" disabled="disabled"/> 
<input type="hidden" id="bbid"/>
<div class="cleaner_h10"></div>
 <a class="labels">Patient:<span>*</span></a><div class="cleaner"></div>
<div id="yepyep">

</div>
 <div class="cleaner_h10"></div>
<input type="button" value="Submit" style="float:left; margin-left:80px; cursor:pointer; width:80px" class="select" onclick="admitpatient();"/>
<div id="wod" style="float:right;height:20px; "></div>	
 </div>
 

	<!-- New Ledger -->
	<div style="display:none;" id="newledger" title="Add New Ledger" />
	<a class="labels">Ledger Name:<span>*</span></a>
	<input type="text" id="ledgername" class="input_field" style="width:250px" placeholder="Enter ledger name" />
	<div class="cleaner_h10"></div>
	<a class="labels">Ledger Type:<span>*</span></a>
	<label for="ledgertype" class="bh-visually-hidden">Ledger Type:</label><select class="select" id="ledgertype" style="width:150px;">
		<option value="">Select an option</option>
		<option value="Asset">Asset</option>
		<option value="Liability">Liability</option>
		<option value="Income">Income</option>
		<option value="Expense">Expense</option>
		<option value="Other_Income">Other Income</option>
		<option value="Other_Expense">Other Expense</option>
	</select>
	<div class="cleaner_h10"></div>
	<a class="labels">Category:<span>*</span></a>
	<label for="ledgercat" class="bh-visually-hidden">Category:</label><select class="select" id="ledgercat" style="width:150px;margin-left:20px">
		<option value="">Select an option</option>
		<option value="Other">Other</option>
		<option value="Cashier">Cashier</option>
		<option value="Bank">Bank</option>
		<option value="PhysicalAsset">PhysicalAsset</option>
	</select>
	<div class="cleaner_h10"></div>
	<a class="labels" style="margin-left:10px">Create as a main account with subledgers
		<label for="newledgerhassubledgers_cb" class="bh-visually-hidden">PhysicalAsset</label><input type="checkbox" id="newledgerhassubledgers_cb" style="cursor:pointer;" />
	</a>
	<div class="cleaner_h10"></div>
	<img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer;" onclick="addnewledger()" />
	<div id="newled" style="float:right"></div>
	</div>

	<!-- New Subledger -->
	<div style="display:none;color:#fff;" id="newsubledger_dialog" title="NEW SUBLEDGER">
		<div class="cleaner_h10"></div>
		<div class="cleaner_h10"></div>
		<a class="labels" style="margin-right:5px;">Main Ledger:<span>*</span></a>
		<label for="new_subledger_ledgerid" class="bh-visually-hidden">Main Ledger:</label><select class="select" id="new_subledger_ledgerid" style="width:250px;">
			<option value="">Select an Option</option>
			<?php
			$mainLedgers = mysqli_query($db, "SELECT `ledgerid`,`name` FROM `ledgers` WHERE `status`=1 AND `ledgerid`!=601 AND `isMainLedger`=1 ORDER BY `ledgerid` ASC");
			while ($row = mysqli_fetch_assoc($mainLedgers)) {
				echo '<option value="' . intval($row['ledgerid']) . '">' . ucwords(strtolower(trim(stripslashes($row['name'])))) . ' </option>';
			}
			?>
		</select>
		<div class="cleaner_h10"></div>
		<a class="labels" style="margin-right:5px;">Subledger Name:<span>*</span></a>
		<input type="text" id="new_subledger_name" class="input_field" style="width:200px" placeholder="Enter Name" />
		<div class="cleaner_h10"></div>
		<div class="cleaner_h10"></div>
		<img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="addNewSubledger()" />
		<div id="newsubledres" style="float:right"></div>
	</div>

 
   <!--KTDA Monthly Deductions  -->
  <div style="display:none" id="newpractice" title="Update Stock Request"/>
    <a class="labels" style="display:none">TransN :<span>*</span></a>
  <input type="text" id="cusid" placeholder="Transno" class="input_field" style="width:100px;display:none"/>
    <a class="labels">PackSize:</a>
  <input type="text" id="packsize" placeholder="Pack Size" class="input_field" style="width:240px" disabled="disabled" /> 
	<div class="cleaner_h10"></div>
    <a class="labels">Units :<span>*</span></a>
  <input type="text" id="transferunits" placeholder="In Units" class="input_field" style="width:250px;margin-left:10px;"/> 
	<div class="cleaner_h10"></div>
    <a class="labels">Parts :<span>*</span></a>
  <input type="text" id="transferparts"  placeholder="In Parts" class="input_field" style="width:250px;margin-left:10px;"/> 
	<div class="cleaner_h10"></div>
 <img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="postnewdeds()"/>
 <div id="newprac" style="float:right"></div>
  </div>

   <!-- Admin Authorization -->
  <script>
  $('#adminauth').live('keydown', function(evt) {
	if (!evt) evt = event;
	if (evt.keyCode==13){ 
	adlog();
	}
});
		</script>
  <div style="display:none" id="adminauth" title="Function Authorization"/>
    <a class="labels" style="text-decoration:blink">User Name:<span>*</span></a>
  <label for="adname" class="bh-visually-hidden">User Name:</label><input type="text" id="adname" class="input_field" style="width:150px"/> 
	<div class="cleaner_h10"></div>
    <a class="labels">Password:<span>*</span></a>
  <label for="adpass" class="bh-visually-hidden">Password:</label><input type="password" id="adpass" class="input_field" style="width:150px; margin-left:10px"/> 
	<div class="cleaner_h10"></div>
 <img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="adlog()"/>
 <div id="adlog" style="float:right"></div>
  </div>
  
  
   <div style="display:none" id="adminauth2" title="Function Authorization"/>
    <a class="labels" style="text-decoration:blink">User Name:<span>*</span></a>
  <label for="adname2" class="bh-visually-hidden">User Name:</label><input type="text" id="adname2" class="input_field" style="width:150px"/> 
	<div class="cleaner_h10"></div>
    <a class="labels">Password:<span>*</span></a>
  <label for="adpass2" class="bh-visually-hidden">Password:</label><input type="password" id="adpass2" class="input_field" style="width:150px; margin-left:10px"/>
  <input type="hidden" id="authid"/> 
	<div class="cleaner_h10"></div>
 <img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="adlog2()"/>
 <div id="adlog2" style="float:right"></div>
  </div>
  
  
  <div  style="display:none" id="addnewday" title="Add New Day-Drug Record"/>
    <a class="labels" style="text-decoration:blink">Day:<span>*</span></a>
  <label for="datepick16" class="bh-visually-hidden">Day:</label><input type="text" id="datepick16" class="input_field" style="width:150px"/> 
  <input type="hidden" id="daycode"/>
	<div class="cleaner_h10"></div>
 <img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="adsiku()"/>
 <div id="adsiku" style="float:right"></div>
  </div>
 
 <div style="display:none" id="messagelog" title="New Message Alert">
    <a aria-label="labels" class="labels" id="mess"></a>
    <div id="messaudio" style="float:right"></div>
  </div>
    <div style="display:none" id="newmessage" title="Create New Message"/>
      <a class="labels">To:<span>*</span></a>
   <?php 
echo'<div class="ui-widget" style="margin:0 10px 0 0px;  float:left; width:120px">
	<label for="user1" class="bh-visually-hidden">To:</label><select id="user1">
		<option value="">Select one...</option>';
	$resulta =mysqli_query($db, "select * from users where name!='".$username."' order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								$resultb =mysqli_query($db, "select * from logintable where username='".stripslashes($rowa['name'])."'");
								if(mysqli_num_rows($resultb)>0){
								echo'<option value="1'.stripslashes($rowa['name']).'" style="font-weight:bold"><b>'.stripslashes($rowa['name']).'-'.stripslashes($rowa['fullname']).' ['.stripslashes($rowa['dept']).']....Online</b></option>';
								}else{
								echo'<option value="1'.stripslashes($rowa['name']).'"><b>'.stripslashes($rowa['name']).'-'.stripslashes($rowa['fullname']).' ['.stripslashes($rowa['dept']).']</option>';	
								}
							}
							
							$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"2".stripslashes($row['Branchname'])."\">".stripslashes($row['Branchname'])."</option>";
							}
							echo"<option value=\"3All\">Everyone</option>";
	echo'</select>
	</div>
		<div class="cleaner_h5"></div>
	<form action="#" method="get">
	<a class="labels">Message:<span>*</span></a>
		<div class="cleaner"></div>
		<div id="taskadd" class="input_field" style="float:left;margin:5px 10px 10px 0px;width:330px; padding:0; background:#fff">
		<label for="mezzage" class="bh-visually-hidden">Message:</label><textarea  id="mezzage"  class="input_field" style="border:0; float:left;width:280px; font-size:11px;background:#fff; height:60px"';echo"></textarea>";
		echo'<input aria-label="Message:" type="text"  id="" class="" style="font-size:12px; display:none; width:50px"/>';
				echo"<img alt=\"Send Message\" src=\"images/back2.png\" title=\"Send Message\" onclick=\"sendmessage('".$username."')\" height=\"24\" width=\"24\" id=\"searchbutton\" style=\"margin:3px 5px 0 0; float:right; cursor:pointer\">
				</div>";                
 ?> 
  
  </div>
  
   <!-- New Bed -->
  <div style="display:none" id="newbed" title="Add New Bed"/>
    <a class="labels">Bed No:<span>*</span></a>
  <label for="bedno1" class="bh-visually-hidden">Bed No:</label><input type="text" id="bedno1" class="input_field" style="width:150px; float:right; margin-right:10px"/> 
	<div class="cleaner_h10"></div>
    <a class="labels">Room No:<span>*</span></a>
  <label for="roomna2" class="bh-visually-hidden">Room No:</label><input type="text" id="roomna2" class="input_field" style="width:150px; float:right; margin-right:10px"/> 
	<div class="cleaner_h10"></div>
    <a class="labels">Room Type:<span>*</span></a>
 <label for="roomtyp1" class="bh-visually-hidden">Room Type:</label><select class="select" id="roomtyp1" style="width:150px; float:right; margin-right:10px">
										<option value="male">male</option>
										<option value="female">female</option>
                                        <option value="either">Either</option>
	</select> 
	<div class="cleaner_h10"></div>
      <a class="labels">Ward Type:<span>*</span></a>
 <label for="wardtyp1" class="bh-visually-hidden">Ward Type:</label><select class="select" id="wardtyp1" style="width:150px; float:right; margin-right:10px">
								<option value="AMENITY_A">AMENITY A</option>
								<option value="AMENITY_B">AMENITY B</option>
								<option value="ISOLATION_A">ISOLATION A</option>
								<option value="ISOLATION_B">ISOLATION B</option>
								<option value="MALE_WARD">MALE WARD</option>
								<option value="FEMALE_WARD">FEMALE WARD</option>
								<option value="SURGICAL_WARD">SURGICAL_WARD</option>
								<option value="MATERNITY">MATERNITY</option>
								<option value="PAEDIATRICS">PAEDIATRICS</option>
	</select> 
	<div class="cleaner_h10"></div>
 <img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="addnewbed()"/>
 <div id="newward" style="float:right"></div>
  </div>
  
  
   <!-- New Computer -->
  <div style="display:none" id="addnewcomp" title="Add New Computer"/>
    <a class="labels">Name:<span>*</span></a>
  <label for="compname" class="bh-visually-hidden">Name:</label><input type="text" id="compname" class="input_field" style="width:150px; float:right; margin-right:10px"/> 
	<div class="cleaner_h10"></div>
    <a class="labels">Dept:<span>*</span></a>
    <?php
	$arr=array();
	$result =mysqli_query($db, "select * from branchtbl");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[]=stripslashes($row['Branchname']);
							}
	?>
 <label for="compdep" class="bh-visually-hidden">Dept:</label><select class="select" id="compdep" style="width:250px; float:right; margin-right:10px">
										<option value="male">TRIAGE</option>
										<option value="female">GENERAL CONSULTATIONS</option>
                                        <?php
										foreach ($arr as $key => $val) {echo"<option value=\"".$val."\">".$val."</option>";}
										?>
	</select> 
	<div class="cleaner_h10"></div>
    <a class="labels">IP:<span>*</span></a>
  <label for="compip" class="bh-visually-hidden">IP:</label><input type="text" id="compip" class="input_field" style="width:150px; float:right; margin-right:10px"/> 
	<div class="cleaner_h10"></div>
    
	<div class="cleaner_h10"></div>
 <img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="addnewcomp()"/>
 <div id="newcomp" style="float:right"></div>
  </div>
  
     <!-- New Bank -->
  <div style="display:none" id="addnewbank" title="Add New Bank"/>
    <a class="labels">Name:<span>*</span></a>
  <label for="bankname" class="bh-visually-hidden">Name:</label><input type="text" id="bankname" class="input_field" style="width:250px; float:right; margin-right:10px"/> 
	<div class="cleaner_h10"></div>
 <img alt="Subm" src="images/subm.jpg" style="width:60px; height:30px; margin-left:100px; cursor:pointer" onclick="addnewbank()"/>
 <div id="newbank" style="float:right"></div>
  </div>


  <?php                
//check if month is registered in attendancelog
	$cur=date('m_Y');
	$arr=array();
	
	$result =mysqli_query($db, "select * from attendancelog");
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$mon=stripslashes($row['month']);
		if($mon==$cur){
			$arr[]=$mon;
		}
	}
	if(count($arr)==0){
	$result = mysqli_query($db, "insert into attendancelog values('','".$cur."',0)");
	$resultb = mysqli_query($db, "CREATE TABLE bh_lcmh_121125_finance.".$cur." (id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY) AS (SELECT * FROM attendance)");
	$resultc =mysqli_query($db, "select * from employee where status=1 order by branch");
									$num_resultsc = mysqli_num_rows($resultc);
									for ($a=0; $a <$num_resultsc; $a++) {
									set_time_limit (0);
									$rowb=mysqli_fetch_array($resultc);
									$name=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);
								$resultd = mysqli_query($db, "insert into ".$cur." values('','".stripslashes($rowb['emp'])."','".stripslashes($rowb['branch'])."','".$name."','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");								
								}
	
	}
	
 ?>
  
  <?php                
//check if month is registered in encounters
	$cur=date('Y-m');
	$arr=array();
	
	$result =mysqli_query($db, "select * from encounters");
	$num_results = mysqli_num_rows($result);	
	for ($i=0; $i <$num_results; $i++) {
	$row=mysqli_fetch_array($result);
	$mon=stripslashes($row['Month']);
		if($mon==$cur){
			$arr[]=$mon;
		}
	}
	if(count($arr)==0){
	$result = mysqli_query($db, "insert into encounters values('','".$cur."','0','0','0')");
	//check if any employee contract is due for renewal


		$d1=date('Ymd');
		$date=strtotime(date('Y-m-d'));
		$d2=date('Ymd', strtotime('+1 month', $date));

			$resultc =mysqli_query($db, "select * from employee where status=1  and emptype='CONTRACT' and stampexp>='".$d1."'  and stampexp<='".$d2."' order by emp");
			$num_resultsc = mysqli_num_rows($resultc);
			for ($a=0; $a <$num_resultsc; $a++) {
			$rowb=mysqli_fetch_array($resultc);
			$names=stripslashes($rowb['fname']).' '.stripslashes($rowb['mname']).' '.stripslashes($rowb['lname']);
			
								$resulta =mysqli_query($db, "select * from users where position='Emp' or position='Accountant' order by name");
								$num_resultsa = mysqli_num_rows($resulta);	
								for ($i=0; $i <$num_resultsa; $i++) {
									$rowa=mysqli_fetch_array($resulta);  
									$name=stripslashes($rowa['name']);
									$resultb = mysqli_query($db, "insert into messages values('0','".$name."','System','Employment contract for ".$names." is expiring on  ".dateprint(stripslashes($rowb['contractto']))."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
		
								}		


			}
	

	}

	
 ?>
<?php
echo'<div id="ncalendar" title="My Tasks" style="overflow-y:auto; height:700px; display:none">
					<a class="labels">Subject:<span>*</span></a><label for="subject" class="bh-visually-hidden">Oname</label><input type="text" id="subject" name="oname"  class="in_field" value="" style="width:280px;float:left; margin-left:10px"/> 
					<div class="cleaner_h10"></div>
					<a class="labels">Location:</a><label for="location" class="bh-visually-hidden">Oname</label><input type="text" id="location" name="oname"  class="in_field" value=""  style="width:280px;float:left; margin-left:10px"/> 
					<div class="cleaner_h10"></div>';
					$resultc =mysqli_query($db, "select * from tasks order by Name asc");
					$num_resultsc = mysqli_num_rows($resultc);
					echo'<a class="labels">Category:</a>
					<label for="category" class="bh-visually-hidden">Category:</label><select class="select" id="category" style="float:left; width:200px; margin-left:10px">';
							
							for ($i=0; $i <$num_resultsc; $i++) {
								$rowc=mysqli_fetch_array($resultc);
							echo'<option value="'.stripslashes($rowc['Index']).'">'.stripslashes($rowc['Name']).'</option>';
							}
							echo'
					</select>
					<div class="cleaner_h10"></div>
					<a class="labels">Due:</a><label for="datepick" class="bh-visually-hidden">Oname</label><input type="text" id="datepick" name="oname"  class="in_field" value="" style="float:left;width:80px;margin-left:5px"/> 
					<label for="time1" class="bh-visually-hidden">Due:</label><select class="select" id="time1" style="float:left; width:55px; margin-left:5px">';
					for ($i=1; $i <13; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time2" class="bh-visually-hidden">Due:</label><select class="select" id="time2" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <60; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time3" class="bh-visually-hidden">Text field</label><select class="select" id="time3" style="float:left; width:60px; margin-left:5px;">
						<option value="AM">AM</option>
						<option value="PM">PM</option>
					</select>
					<div class="cleaner_h10"></div>
					<a class="labels">Start:</a><label for="datepick2" class="bh-visually-hidden">Oname</label><input type="text" id="datepick2" name="oname"  class="in_field" value="" style="float:left;width:80px;margin-left:5px"/> 
					<label for="time4" class="bh-visually-hidden">Start:</label><select class="select" id="time4" style="float:left; width:55px; margin-left:5px">';
					for ($i=1; $i <13; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time5" class="bh-visually-hidden">Start:</label><select class="select" id="time5" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <60; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time6" class="bh-visually-hidden">Text field</label><select class="select" id="time6" style="float:left; width:60px; margin-left:5px;">
						<option value="AM">AM</option>
						<option value="PM">PM</option>
					</select>
					<div class="cleaner_h10"></div>
					<a class="labels">Status:</a>
					<label for="status" class="bh-visually-hidden">Status:</label><select class="select" id="status" style="float:left; width:100px; margin-left:5px;">
						<option value="Not Started">Not Started</option>
						<option value="In Progress">In Progress</option>
						<option value="Completed">Completed</option>
						<option value="Waiting on Someone Else">Waiting on Someone Else</option>
						<option value="Deferred">Deferred</option>
					</select>
					<a class="labels" style="margin-left:5px">Priority:</a>
					<label for="priority" class="bh-visually-hidden">Priority:</label><select class="select" id="priority" style="float:left; width:80px; margin-left:5px;">
						<option value="Normal">Normal</option>
						<option value="High">High</option>
						<option value="Low">Low</option>
					</select>
					<label for="crex" class="bh-visually-hidden">Low</label><input id="crex" style="display:none" value="1"/>
					<label for="eid" class="bh-visually-hidden">Low</label><input id="eid" style="display:none" value="00"/>
					<div class="cleaner_h10"></div>
					<a class="labels">Complete:</a>
					<label for="completer" class="bh-visually-hidden">Complete:</label><select class="select" id="completer" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <101; $i=$i+5) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select><a class="labels" style="margin-left:3px">%</a>
					<a class="labels" style="margin-left:10px">Reminder?</a>
					<label for="remind" class="bh-visually-hidden">Remind</label><input type="checkbox" name="remind" id="remind" style="margin:8px 0 0 5px" onclick="showrem()" value="1"/>
					<div class="cleaner_h10"></div>
					<div id="showrem" style="display:none">
					<a class="labels">Reminder:</a><label for="datepick3" class="bh-visually-hidden">Oname</label><input type="text" id="datepick3" name="oname"  class="in_field" value="'.date('Y/m/d').'" style="float:left;width:80px;margin-left:5px"/> 
					<label for="time7" class="bh-visually-hidden">Reminder:</label><select class="select" id="time7" style="float:left; width:55px; margin-left:5px">';
					for ($i=1; $i <13; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time8" class="bh-visually-hidden">Text field</label><select class="select" id="time8" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <60; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time9" class="bh-visually-hidden">Text field</label><select class="select" id="time9" style="float:left; width:55px; margin-left:5px;">
						<option value="AM">AM</option>
						<option value="PM">PM</option>
					</select>
					</div>
					<div class="cleaner"></div>
					<a class="labels">Notes</a>
					<div class="cleaner_h10"></div>
					<label for="notes" class="bh-visually-hidden">Notes</label><textarea id="notes" style="float:left;height:70px; width:320px" class="alergy" ></textarea>
					<div class="cleaner_h10"></div>
					<input type="button" value="Submit" style="float:left; margin-left:80px; cursor:pointer; width:80px" class="select" onclick="newtasks();"/>
					<div id="taskstud" style="float:right;height:20px; "></div>			
               </div>';
			   
	
	
	echo'<div id="nevent" title="Appointments" style="overflow-y:auto; height:700px; display:none">
	<a class="labels">Patient:<span>*</span></a>
	
	<div class="ui-widget" style="margin:0 10px 0 10px;  float:left; width:280px">
	<label for="patname14" class="bh-visually-hidden">Patient:</label><select id="patname14">
		<option value="">Select one...</option>';
	$resulta =mysqli_query($db, "select * from patients where status=1 order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['pntno']).'ÃÂÃÂÃÂÃÂ¸'.stripslashes($rowa['name']).' '.stripslashes($rowa['oname']).' '.stripslashes($rowa['lname']).'">'.stripslashes($rowa['name']).' '.stripslashes($rowa['oname']).' '.stripslashes($rowa['lname']).'-'.stripslashes($rowa['pntno']).'</option>';
							}
	echo'</select>
	</div>
					<div class="cleaner_h10"></div>
					<a class="labels">Subject:<span>*</span></a><label for="subject2" class="bh-visually-hidden">Oname</label><input type="text" id="subject2" name="oname"  class="in_field" value="" style="width:280px;float:left; margin-left:10px"/> 
					<input type="hidden" id="pidd2" name="oname"  class="in_field" value="" style="diplay:none"/> 
					<input type="hidden" id="pname2" name="oname"  class="in_field" value="" style="diplay:none"/> 
					
					<div class="cleaner_h10"></div>
					<a class="labels">Location:</a><label for="location2" class="bh-visually-hidden">Oname</label><input type="text" id="location2" name="oname"  class="in_field" value=""  style="width:280px;float:left; margin-left:10px"/> 
					<div class="cleaner_h10"></div>';
					$resultc =mysqli_query($db, "select * from tasks order by Name asc");
					$num_resultsc = mysqli_num_rows($resultc);
					echo'<a class="labels">Category:</a>
					<label for="category2" class="bh-visually-hidden">Category:</label><select class="select" id="category2" style="float:left; width:200px; margin-left:10px">';
							
							for ($i=0; $i <$num_resultsc; $i++) {
								$rowc=mysqli_fetch_array($resultc);
							echo'<option value="'.stripslashes($rowc['Index']).'">'.stripslashes($rowc['Name']).'</option>';
							}
							echo'
					</select>
					<div class="cleaner_h10"></div>
					<a class="labels">Start:</a><label for="datepick6" class="bh-visually-hidden">Oname</label><input type="text" id="datepick6" name="oname"  class="in_field" value="'.date('Y/m/d').'" style="float:left;width:80px;margin-left:5px"/> 
					<label for="time12" class="bh-visually-hidden">Start:</label><select class="select" id="time12" style="float:left; width:55px; margin-left:5px">';
					for ($i=1; $i <13; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time22" class="bh-visually-hidden">Text field</label><select class="select" id="time22" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <60; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time32" class="bh-visually-hidden">Text field</label><select class="select" id="time32" style="float:left; width:60px; margin-left:5px;">
						<option value="AM">AM</option>
						<option value="PM">PM</option>
					</select>
					<div class="cleaner_h10"></div>
					<a class="labels">End:</a><label for="datepick7" class="bh-visually-hidden">Oname</label><input type="text" id="datepick7" name="oname"  class="in_field" value="" style="float:left;width:80px;margin-left:5px"/> 
					<label for="time42" class="bh-visually-hidden">End:</label><select class="select" id="time42" style="float:left; width:55px; margin-left:5px">';
					for ($i=1; $i <13; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time52" class="bh-visually-hidden">End:</label><select class="select" id="time52" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <60; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time62" class="bh-visually-hidden">Text field</label><select class="select" id="time62" style="float:left; width:60px; margin-left:5px;">
						<option value="AM">AM</option>
						<option value="PM">PM</option>
					</select>
					<div class="cleaner_h10"></div>
					<a class="labels">Status:</a>
					<label for="status2" class="bh-visually-hidden">Status:</label><select class="select" id="status2" style="float:left; width:100px; margin-left:5px;">
						<option value="Not Started">Not Started</option>
						<option value="In Progress">In Progress</option>
						<option value="Completed">Completed</option>
						<option value="Waiting on Someone Else">Waiting on Someone Else</option>
						<option value="Deferred">Deferred</option>
					</select>
					<a class="labels" style="margin-left:5px">Priority:</a>
					<label for="priority2" class="bh-visually-hidden">Priority:</label><select class="select" id="priority2" style="float:left; width:80px; margin-left:5px;">
						<option value="Normal">Normal</option>
						<option value="High">High</option>
						<option value="Low">Low</option>
					</select>
					<label for="crex2" class="bh-visually-hidden">Low</label><input id="crex2" style="display:none" value="1"/>
					<label for="eid2" class="bh-visually-hidden">Low</label><input id="eid2" style="display:none" value="00"/>
					<div class="cleaner_h10"></div>
					<a class="labels">Complete:</a>
					<label for="completer2" class="bh-visually-hidden">Complete:</label><select class="select" id="completer2" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <101; $i=$i+5) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select><a class="labels" style="margin-left:3px">%</a>
					<a class="labels" style="margin-left:10px">Reminder?</a>
					<label for="remind2" class="bh-visually-hidden">Remind2</label><input type="checkbox" name="remind2" id="remind2" style="float:left;margin:8px 5px 0 5px" onclick="showrem2()" value="1"/>
					<a class="labels" style="margin-left:10px">Reccur?</a>
					<label for="reccur" class="bh-visually-hidden">Reccur</label><input type="checkbox" name="reccur" id="reccur" style="float:left;margin:8px 0px 0 5px" onclick="showrec()" value="1"/>
					<div class="cleaner_h10"></div>
					<div id="showrem2" style="display:none">
					<a class="labels">Reminder:</a><label for="datepick8" class="bh-visually-hidden">Oname</label><input type="text" id="datepick8" name="oname"  class="in_field" value="" style="float:left;width:80px;margin-left:5px"/> 
					<label for="time72" class="bh-visually-hidden">Reminder:</label><select class="select" id="time72" style="float:left; width:55px; margin-left:5px">';
					for ($i=1; $i <13; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time82" class="bh-visually-hidden">Reminder:</label><select class="select" id="time82" style="float:left; width:55px; margin-left:5px">';
					for ($i=0; $i <60; $i++) {
						echo'<option value="'.sprintf("%02d",$i).'">'.sprintf("%02d",$i).'</option>';
							}
							echo'
					</select>
					<label for="time92" class="bh-visually-hidden">Text field</label><select class="select" id="time92" style="float:left; width:55px; margin-left:5px;">
						<option value="AM">AM</option>
						<option value="PM">PM</option>
					</select>
					<div class="cleaner_h10"></div>
					</div>
					
					<div id="showrec" style="display:none">
					<a class="labels">Reccur Start:</a><label for="datepick4" class="bh-visually-hidden">Oname</label><input type="text" id="datepick4" name="oname"  class="in_field" value="'.date('Y/m/d').'" style="float:left;width:80px;margin-left:5px"/> 
					<a class="labels" style="margin-left:5px">End:</a>
					<label for="datepick5" class="bh-visually-hidden">Oname</label><input type="text" id="datepick5" name="oname"  class="in_field" value="" style="float:left;width:80px;margin-left:5px"/> 
					<div class="cleaner_h10"></div>
					<a class="labels">Reccurence Pattern:</a>
					<label for="recpattern" class="bh-visually-hidden">Reccurence Pattern:</label><select class="select" id="recpattern" style="float:left; width:85px; margin-left:5px;">
						<option value="1">Daily</option>
						<option value="7">Weekly</option>
						<option value="30">Monthly</option>
						<option value="365">Yearly</option>
					</select>
					</div>
					
					<div class="cleaner"></div>
					<a class="labels">Notes</a>
					<label for="notes2" class="bh-visually-hidden">Notes</label><textarea id="notes2" style="float:left;height:70px; width:320px" class="alergy" ></textarea>
					<div class="cleaner_h10"></div>
					<input type="button" value="Submit" style="float:left; margin-left:80px; cursor:pointer; width:80px" class="select" onclick="newevents();"/>
					<div id="taskevent" style="float:right;height:20px; "></div>			
               </div>';
		   
?>
<input type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" id="remote" />
<input type="hidden" value="<?php echo $server ?>" id="server" />
<div id="sessionWarn" role="alertdialog" aria-modal="true" aria-labelledby="sessionWarnTitle" aria-describedby="sessionWarnDesc" hidden>
	<div id="sessionWarnCard">
		<p id="sessionWarnTitle">Your session is about to expire</p>
		<p id="sessionWarnDesc">You will be signed out in <span id="sessionWarnCount">75</span> seconds because of inactivity. Choose &ldquo;Stay logged in&rdquo; to continue working.</p>
		<button type="button" id="sessionStayBtn" onclick="stayLoggedIn(event);">Stay logged in</button>
	</div>
</div>
</body>
</html>
