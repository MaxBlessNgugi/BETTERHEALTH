<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('budget', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$fullname=stripslashes($row['fullname']);
$userid=stripslashes($row['userid']);
$userdep=stripslashes($row['dept']);
include(__DIR__ . '/includes/functions.php'); 
include(__DIR__ . '/includes/compile.php');
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}

?>
<script src="js/func.js"></script>
<script src="js/functions.js"></script>
<script src="js/ajax.js"></script>
<script src="js/help.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/auth.js"></script>
<script src="assets/vendor/ui/jquery.ui.position.js"></script>
<link rel="stylesheet" type="text/css" href="assets/vendor/jquery.confirm/jquery.confirm.css" />
<script src="assets/vendor/jquery.confirm/jquery.confirm.js"></script>
<link rel="stylesheet" href="css/website.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/lightbox.css" />
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script type="text/javascript" src="js/chart.js"></script>


<script>
// $(document).ready(function(){
//  $('.selectpicker').selectpicker();

//  $('#framework').change(function(){
//   $('#hidden_framework').val($('#framework').val());
//  });

//  $('#multiple_select_form').on('submit', function(event){
//   event.preventDefault();
//   if($('#framework').val() != '')
//   {
//    var form_data = $(this).serialize();
//    $.ajax({
//     url:"insert.php",
//     method:"POST",
//     data:form_data,
//     success:function(data)
//     {
//      //console.log(data);
//      $('#hidden_framework').val('');
//      $('.selectpicker').selectpicker('val', '');
//      alert(data);
//     }
//    })
//   }
//   else
//   {
//    alert("Please select framework");
//    return false;
//   }
//  });
// });
</script>

<script>
	$(function() {
		$( "#tabs" ).tabs();$( "#tabs2" ).tabs();$( "#tabs3" ).tabs();
	});
	</script>

<script>window.onload = setupRefresh</script>
<script>
$(document).ready(function(){ 
	$("#itemn" ).combobox();
		$( "#toggle" ).click(function() {
		$( "#itemn" ).toggle();
		});
	$("#itemn").parent().find("input:first").focus();	
	});


	</script>

    <script>
		$('input').live('keypress',function
		(e){
			if(e.keyCode==13){
				var inputs=
				$(this).parents('form').eq(0).find
				(':input');
				var idx=inputs.index
				(this);
				if(idx ==
				inputs.length-1){
					inputs[0].select()
				}else{
					inputs[idx +
					1].focus();
					inputs[idx +
					1].select();
				}
				return false;
			}
		});
	   
    </script>
 
<?php
$id=$_GET['id'];
switch($id){
		
	case 1:

		//$old_patient_id=$_GET['old_patient_id'];
				if(isset($_SESSION['cons'])){unset($_SESSION['cons']);}
						
				echo"<script>$('#item44').parent().find('input:first').focus();</script>";
	echo'<script>document.onkeydown = keydown;
    	function keydown(evt){
      	if (!evt) evt = event;
		
		 if (evt.keyCode==115){ //f4
	   	evt.preventDefault();
     $("#item44").parent().find("input:first").focus();	
	   }
		 if (evt.keyCode==119){ //f8
		 evt.preventDefault();
     	viewbill("cons"); 
      	}
     	 if (evt.keyCode==112){ //f1
		 evt.preventDefault();
       addbill("cons",1); 
      	}
		if (evt.keyCode==121){ //f10
		evt.preventDefault();
		submitbill("cons"); 
      	}
		if (evt.keyCode==123){ //f12
		evt.preventDefault();
		help61(); 
      	}
		if (evt.keyCode==120){ //f9
		evt.preventDefault();
          emptybill("cons"); 
      	}
		if (evt.keyCode==118){ //f7
		evt.preventDefault();
		deptbalance(); 
      	}
		
	
		
		if (evt.keyCode==114){ //f3
		evt.preventDefault();
		removelastbill("cons");
      	}
		
		
     	 
    }</script>';						
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Reception Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		$rcptno=$_GET['rcptno'];
		echo $rcptno;
		
		if(isset($_GET['rcpt'])){
		$rcpt=$_GET['rcpt'];
		$resultb =mysqli_query($db, "select * from sales where RcptNo=".$rcpt."");
		$rowb=mysqli_fetch_array($resultb);
		$reg=stripslashes($rowb['ClientId']);
		$stat=stripslashes($rowb['Status']);
		$result =mysqli_query($db, "select * from patients where pntno='".$reg."'");
		$row=mysqli_fetch_array($result);
		$old_patient_id=stripslashes($row['auto']);
		$insuranceScheme=stripslashes($row['insurer']);
	}else if(isset($_GET['param'])){
		$reg=$_GET['param'];
		$old_patient_id=$_GET['old_patient_id'];
		$result =mysqli_query($db, "select * from patients where pntno='".$reg."'");
		if( mysqli_num_rows($result)==0){
			echo "<script>reception();</script>";
			echo"
										<script>
										$().customAlert();
										alert('Error!', '<p>No patient is registered under this number.</p>');
										e.preventDefault();
										</script>";
										
										exit;
		}
		$row=mysqli_fetch_array($result);
		
	}else if(isset($_GET['pid'])){
		$reg=$_GET['pid'];
	$result =mysqli_query($db, "select * from patients where pntno='".$reg."'");
							$row=mysqli_fetch_array($result);
			$old_patient_id=stripslashes($row['auto']);
			$insid=stripslashes($row['insid']);
			$insuranceScheme=$insname=stripslashes($row['insurer']);
			$cardno=stripslashes($row['cardno']);
	}
	
		
							$names=stripslashes($row['name']).' '.stripslashes($row['oname']).' '.stripslashes($row['lname']);
							#$type_clinic_id = stripslashes($row['typeclinics']);
							$accountype = stripslashes($row['accountype']);
							$type_clinic_abbr = stripslashes($row['typeclinics']);

					          //type_clinic_id
					        $qry_clinic =mysqli_query($db, "SELECT id,Abbr,Name FROM clinics WHERE Abbr='".$type_clinic_abbr."'");
					        $rwclinc=mysqli_fetch_array($qry_clinic);
							$type_clinic_id = stripslashes($rwclinc['id']);
					        $type_clinic_abbr=stripslashes($rwclinc['Abbr']);
					        $typeclinics=stripslashes($rwclinc['Name']);
							
							$resultz =mysqli_query($db, "select * from newprescription where PatId='".$reg."' order by Id desc limit 0,1");
							$rowz=mysqli_fetch_array($resultz);
							$PrescId=stripslashes($rowz['PrescId']);

			
		echo'<div id="newstude">';
		echo"<script>
			document.onkeydown = keydown;
			function keydown(evt){
				if (!evt) evt = event;
				if (evt.keyCode==123){ //f12
					addnewcustompat(); 
				}
			}
			</script>";
			echo'<h2  style="float:left; padding:5px 5px 0 0; margin:0">Reception</h2>
				<input type="hidden" id="lastdate" value="'.dateprint(stripslashes($rowz['TransDate'])).'"/>
				<input type="hidden" id="reviewdate" value="'.preg_replace('~/~', '', stripslashes($rowz['TransDate'])).'"/>
				<input type="hidden" id="old_patient_id" value="'.stripslashes($row['auto']).'"/>
				<input type="hidden" id="todaystamp" value="'.date('Ymd').'"/>';

		#echo"<h2  style=\"float:left; padding:5px 5px 0 0; margin:0\">New Patient Information [] </h2>";
				
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('patreport.php?id=1&reg=".$patid."')\" title=\"Print Patient Report\">";
		echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
		<input type="button" value="Help" id="submit"  style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help53();"/></div>
		<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
		<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
		<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
		<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">';
		echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"addnewcustompat()\"/></div>";
		echo"<script>$('#currentins').parent().find('input:first').width(130).prop('disabled',true);</script>";
		// echo"<script>
		// $('#docopdUpt2').parent().find('input:first').width(150);
		// $('#currentins').css({'border' : 'solid #DC2626 1px'});
		// $('#symptoms').parent().find('input:first').width(530);
		// $('#diagt').parent().find('input:first').width(330);
		// $('#surgt').parent().find('input:first').width(530);
		// $('#treat').parent().find('input:first').width(530);
		// $('#presct').parent().find('input:first').width(430);
		// $('#dr1').parent().find('input:first').width(180);
		// $('.dr').parent().find('input:first').width(75);
		// $('#radt').parent().find('input:first').width(300);
		// $('#docInpPharm1').parent().find('input:first').width(180);
		
		// 	</script>";		

		echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>';
								
				echo'<div id="personal">			
				<h5>Demographics</h5>
								<div class="cleaner_h5"></div>
			<iframe name="leiframe" style="margin-right:60px" id="leiframe" class="leiframe" src="images/patients/default.jpg"></iframe>					
			<div class="cleaner_h5"></div>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field"  
								value="'.stripslashes($row['pntno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
								<div class="cleaner_h5" style="display:none"></div>
								<a class="labels" style="display:none">O/P No:<span>*</span></a>
                                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field"  
								value="'.stripslashes($row['opno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none" /> 
								<div class="cleaner_h5"></div>

								<a class="labels">Full Names:<span>*</span></a>
                                <label for="oname" class="bh-visually-hidden">Oname</label><input type="text" id="oname" name="oname" class="in_field"  
								value="'.stripslashes($row['fullnames']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
							<div class="cleaner_h5"></div>
							 <a class="labels">Age:</a>
						  <label for="tdate" class="bh-visually-hidden">Age:</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">
						 <label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="border-color:var(--color-danger, #DC2626)"/> 
						 <input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
						 echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
								echo'<div class="cleaner_h5"></div>
								 <a class="labels" style="margin-right:30px">Gender:<span>*</span></a>';
								 if(stripslashes($row['gender'])=='male'){
									 echo'<label for="maleGender" class="bh-visually-hidden">Gender</label><input  id="maleGender" disabled="disabled" name="gender" type="radio" value="male" class="radio" checked="checked">Male.
								<label for="femaleGender" class="bh-visually-hidden">Gender</label><input  id="femaleGender" name="gender" type="radio" value="female" class="radio" disabled="disabled">Female.'; 
								 }
							 else{
                                echo'<label for="maleGender" class="bh-visually-hidden">Gender</label><input  id="maleGender" disabled="disabled" name="gender" type="radio" value="male" class="radio">Male.
								<label for="femaleGender" class="bh-visually-hidden">Gender</label><input  id="femaleGender" name="gender" type="radio" value="female" class="radio"  checked="checked disabled="disabled">Female.';}
								echo'<div class="cleaner"></div> 
								<a class="labels">Contact:<span>*</span></a>
                                <label for="stream" class="bh-visually-hidden">Stream</label><input type="text" id="stream"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['contact']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Acc Type:<span>*</span></a>
                                <label for="insurancescheme" class="bh-visually-hidden">Insurancescheme</label><input type="text" id="insurancescheme"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="insurancescheme" class="in_field" value="'.stripslashes($row['accountype']).'"/> 
                                <div class="cleaner_h5"></div>
								<a class="labels">Pay Mode:<span>*</span></a>
                                <label for="paymode" class="bh-visually-hidden">Stream</label><input type="text" id="paymode"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['insurer']).'"/> 
                                <div class="cleaner_h5"></div>
								<a class="labels">Clinics:<span>*</span></a>
                                <label for="typeclinics" class="bh-visually-hidden">Stream</label><input type="text" id="typeclinics"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['typeclinics']).'"/> 
                                <div class="cleaner_h5"></div>
                                <div class="cleaner_h5"></div>
				
					</div>';

		echo'<div id="tabs" style="width:748px; height:428px; float:left; margin:5px 0 0 0px">
		<ul>';
			#echo'<li><a href="#tabs-1">Add Patient</a></li>';
			echo'<li><a href="#tabs-1">Billing</a></li>';
			echo'<li><a href="#tabs-2">Triage</a></li>';
			echo'<li><a href="#tabs-4">Receive Payment</a></li>';
			echo'<li><a href="#tabs-5">Start New Consultation</a></li>';
			// echo'<li><a href="#tabs-6">Phycho</a></li>';			
			// echo'<li><a href="#tabs-7">Dressing</a></li>';
			// echo'<li style="display:none;"><a href="#tabs-9" style="display:none;">Theatre</a></li>
			// <li><a href="#tabs-10">Pharmacy</a></li>
			// <li><a href="#tabs-5">Laboratory</a></li>
			// <li style="display:;"><a href="#tabs-6" style="display:;">Radiology</a></li>
			// 
			// <li style="display:none;"><a href="#tabs-11">Other Details</a></li>';
			
		echo'</ul>';


echo'<div id="tabs-1">';

		// echo'<div id="personal">';
				
		// 			echo'<h5>Demographics</h5><div class="cleaner_h5"></div>
		// 			<a class="labels">Patient No:<span>*</span></a>
		// 			<input type="text" id="regn" name="regn" class="in_field"  
		// 			value="'.stripslashes($row['pntno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
		// 			<div class="cleaner_h5" style="display:none"></div>
		// 			<a class="labels" style="display:none">O/P No:<span>*</span></a>
		// 			<input type="text" id="regn" name="regn" class="in_field"  
		// 			value="'.stripslashes($row['opno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none" /> 
		// 			<div class="cleaner_h5"></div>

		// 			<a class="labels">Full Names:<span>*</span></a>
		// 			<input type="text" id="oname" name="oname" class="in_field"  
		// 			value="'.stripslashes($row['fullnames']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
		// 			<div class="cleaner_h5"></div>
		// 			<a class="labels">Age:</a>
		// 			<input type="text" style="display:none" id="tdate" value="'.date('Y').'">
		// 			<input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="border-color:var(--color-danger, #DC2626)"/> 
		// 			<input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
		// 			echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
		// 			echo'<div class="cleaner_h5"></div>
		// 			<a class="labels" style="margin-right:30px">Gender:<span>*</span></a>';
		// 			if(stripslashes($row['gender'])=='male'){
		// 			 echo'<input  id="maleGender" disabled="disabled" name="gender" type="radio" value="male" class="radio" checked="checked">Male.
		// 			<input  id="femaleGender" name="gender" type="radio" value="female" class="radio" disabled="disabled">Female.'; 
		// 			}
		// 			else{
		// 			echo'<input  id="maleGender" disabled="disabled" name="gender" type="radio" value="male" class="radio">Male.
		// 			<input  id="femaleGender" name="gender" type="radio" value="female" class="radio"  checked="checked disabled="disabled">Female.';}
		// 			echo'<div class="cleaner"></div> 
		// 			<a class="labels">Contact:<span>*</span></a>
		// 			<input type="text" id="stream"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['contact']).'"/> 
		// 			<div class="cleaner_h5"></div>
		// 			<a class="labels">Acc Type:<span>*</span></a>
		// 			<input type="text" id="insurancescheme"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="insurancescheme" class="in_field" value="'.stripslashes($row['accountype']).'"/> 
		// 			<div class="cleaner_h5"></div>
		// 			<a class="labels">Pay Mode:<span>*</span></a>
		// 			<input type="text" id="paymode"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['insurer']).'"/> 
		// 			<div class="cleaner_h5"></div>
		// 			<a class="labels">Clinics:<span>*</span></a>
		// 			<input type="text" id="typeclinics"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['typeclinics']).'"/> 
		// 			<div class="cleaner_h5"></div>
		// 			<div class="cleaner_h5"></div>';



		// echo'</div>';		
						
		echo'<div id="personal" style="height:300px; margin-left:0px; width:700px">';
			echo'<h5>Billing</h5>

				<a class="labels" style="margin-left:10px">Item:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
				<label for="nwordertooth77" class="bh-visually-hidden">Item:</label><select id="nwordertooth77">
					<option value="">Select one...</option>';
						$resulta =mysqli_query($db, "select * from items where ".$_SESSION['rights']." order by ItemName");
						$num_resultsa = mysqli_num_rows($resulta);	
						for ($i=0; $i <$num_resultsa; $i++) {
							$rowa=mysqli_fetch_array($resulta);
							$itemp=stripslashes($rowa['SalePrice']);
							$item=stripslashes($rowa['ItemName']);
							$code=stripslashes($rowa['ItemCode']);
							$categ = stripslashes($rowa['Category']);
							$type = stripslashes($rowa['Type']);
							$cpr = stripslashes($rowa['CorporatePrice']);
							$ppr = stripslashes($rowa['insurancePrice']);
							//$schem24 = stripslashes($row['insurer']);
							$bal = stripslashes($rowa[$userdep]);
							echo"<option value=\"".$itemp."ÃÂ¸".$item."ÃÂ¸".$code."ÃÂ¸".$categ."ÃÂ¸".$bal."ÃÂ¸".$type."ÃÂ¸".$cpr."ÃÂ¸".$ppr."\">".$item."</option>";
						}
					echo'
					</select><label for="bal44" class="bh-visually-hidden">Text field</label><input type="text" id="bal44" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="type44" class="bh-visually-hidden">Text field</label><input type="text" id="type44" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
				</div>
				<a class="labels" style="margin-left:10px">Qty:</a>
				<label for="quat44" class="bh-visually-hidden">Qty:</label><input type="text" id="quat44" class="input_field"  style="width:40px; margin-left:10px;" value="1"/>
				<a class="labels" style="margin-left:5px">Price:</a>
				<label for="price44" class="bh-visually-hidden">Price:</label><input type="text" id="price44" class="input_field" style="width:70px; margin-left:10px;" disabled="disabled"/>
				<label for="categ" class="bh-visually-hidden">Price:</label><input type="text" id="categ" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
				<label for="code" class="bh-visually-hidden">Price:</label><input type="text" id="code" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>';
			echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addbill('cons',1)\"/>";
			echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"View Current Cart\" onclick=\"viewbill('cons')\"/>";
			//echo"<img alt=\"Empty Current Cart\" src=\"images/empty.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Empty Current Cart\" onclick=\"emptybill('cons')\"/>";
			echo'<div class="col-md-2" style="margin-left:-10px;">
						<a class="labels"  disabled="disabled" style="margin-left:13px">Total Price:</a>
						<label for="tprice" class="bh-visually-hidden">Total Price:</label><input type="text" disabled="disabled" id="tprice" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:15px;" disabled="disabled"/>
   					</div>';

				echo'<a class="labels"  disabled="disabled" style="margin-left:5px;display:none;">Discount:</a>';
					$result =mysqli_query($db, "select * from accesstbl where AccessCode=208");
					$row=mysqli_fetch_array($result);
					if(stripslashes($row[$usertype])=='YES'){
						echo '<label for="disc44" class="bh-visually-hidden">Discount:</label><input type="text" id="disc44"  class="input_field"  value="0" style="width:60px; margin-left:10px;display:none;"/>	';
					}else{
					echo'<label for="disc44" class="bh-visually-hidden">Double Click to Get Authorization</label><input type="text" id="disc44" title="Double Click to Get Authorization" class="input_field"  value="0" style="width:60px; margin-left:10px;border-color:var(--color-danger, #DC2626);" ondblclick="openadmin()" readonly="readonly"/>	';}


				
				echo'<div class="col-md-2" style="margin-left:-30px;">
						<a class="labels"  disabled="disabled" style="margin-left:13px">Subnet:</a>
						<label for="sub44" class="bh-visually-hidden">Subnet:</label><input type="text" disabled="disabled" id="sub44" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:15px;"/>
   					</div>';		


					
							
			
echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none;">
	<label for="income44" class="bh-visually-hidden">Subnet:</label><select id="income44" style="display:none;">';
		$resulta =mysqli_query($db, "select * from extmedics order by id");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$id=stripslashes($row['id']);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$id."\">".$name."</option>";
						}
echo"<script>$('#income44').parent().find('input:first').width(100);</script>";
		echo'
		</select>
	</div>';	

echo'<label for="total" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="total" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>
				<a class="labels" style="margin-left:5px; float:right;display:none;">Final Total:</a>';

				echo'<div class="col-md-4" style="margin-left:-45px;">
						<a class="labels"  disabled="disabled" style="margin-left:13px;float:left;">Name:</a>
						<label for="red" class="bh-visually-hidden">Name:</label><input type="text" id="red" class="input_field"  style="width:230px;border-color:#000; margin-left:15px;float:;" disabled="disabled"/>
   					</div>';		
			
 	//include('multipleselect.php');
// echo'
//    <div class="col-md-4" style="margin-left:20px;">
// 	<a class="labels"  disabled="disabled" style="margin-left:0px;float:left;">Teeth:</a>
//     <form method="post" id="multiple_select_form">
//      <select name="framework" id="framework" class="form-control selectpicker" data-live-search="true" multiple>
//       <option value="1">1</option>
//       <option value="2">2</option>
//       <option value="3">3</option>
//       <option value="4">4</option>
//       <option value="5">5</option>
//       <option value="Laravel">Laravel</option>
//       <option value="Symfony">Symfony</option>
//       <option value="CakePHP">CakePHP</option>
//       <option value="Zend">Zend</option>
//       <option value="Yii">Yii</option>
//       <option value="Slim">Slim</option>
//      </select>
//      <br />
//      <input type="hidden" name="hidden_framework" id="hidden_framework" />
//     </form>
//    </div>';
   	echo' <div class="col-md-4" style="margin-left:20px;">';		
		echo'<form method="post" id="multiple_select_form"><a class="labels">Teeth:<span>*</span></a>
			     <label for="framework" class="bh-visually-hidden">Framework</label><select name="framework" id="framework" class="form-control selectpicker" data-live-search="true" multiple>
						<option value="">Select tooth..</option>';
				$result =mysqli_query($db, "SELECT id,toothno FROM teethservice ORDER BY id DESC");
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
					echo"<option value=\"".stripslashes($row['id'])."\">".stripslashes($row['toothno'])."</option>";
						}
	   				echo'</select>';
		   echo' <input type="hidden" name="hidden_framework" id="hidden_framework" />';
	    echo'</form>';
	    echo'</div>';

	echo'<div id="itemsdisp" style="height:270px; width:666px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5>Items</h5>
	<div id="display" style="margin-top:0px; height:250px;">
	
	</div>
	</div>';

	echo"<input type=\"button\" value=\"Save\" id=\"submit\" style=\"margin-left:60px; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"submitconbill('cons');\"/>";
	echo'<input type="button" value="Exit" id="exit" style="margin-left:10px; float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>	
	 <div id="newstudent" style="float:right; margin-right:10px;height:40px; "></div>';




		echo'</div>';		




	
echo'</div>';

echo'<div id="tabs-2">';

	echo'<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:300px">';
	echo'<h5>Triage Analysis</h5>';
			#$result =mysqli_query($db, "select * from patients where pntno='".$reg."'");
			$result =mysqli_query($db, "select temp,bp1,bp2,weight,resprate,pulserate,rbs,newscreening,knownhyper,takingmeds,insurer from patients where pntno='".$reg."'");
			$row=mysqli_fetch_array($result);
			$insuranceScheme=stripslashes($row['insurer']);
			echo'<div id="">
				<a class="labels">Temp:<span>*</span></a>
		        <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"  class="in_field" value="'.stripslashes($row['temp']).'"  style="width:30px; float:left; margin-left:50px"/> 
				<div style="float:left; margin-top:2px"><a class="labels" style="font-size:5px; margin-top:0px;font-weight:bold; margin-left:5px">0</a></div><div style="float:left; margin=left:3px"><a style="font-size:11px;font-weight:bold;"  class="labels">C</a></div>
					<div class="cleaner_h5"></div>
				<a class="labels">B.P:<span>*</span></a>
		        <div style="width:40px; float:left;margin-left:65px; padding:1px " class="in_field">
				<div style="float:left; border-bottom:1px solid #333; width:35px"><label for="bp1" class="bh-visually-hidden">Oname</label><input type="text" id="bp1" name="oname" value="'.stripslashes($row['bp1']).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px; margin-top:0px;margin-bottom:2px;text-align:center"/> </div>
				<div class="cleaner"></div>
				<div style="float:left"><label for="bp2" class="bh-visually-hidden">Oname</label><input type="text" id="bp2" name="oname" value="'.stripslashes($row['bp2']).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px;  margin-top:2px;text-align:center"/>  </div>
				</div>
				
				<a class="labels" style="font-weight:bold; margin-left:5px; margin-top:20px">mmHg</a>
				<div class="cleaner_h5"></div>
				<a class="labels">Weight:<span>*</span></a>
		        <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname" class="in_field" value="'.stripslashes($row['weight']).'"  style="width:30px; float:left; margin-left:44px"/> 
				<a class="labels" style="font-weight:bold; margin-left:5px">Kgs</a>
				<div class="cleaner_h5"></div>
				<a class="labels">Resp. Rate:</a>
		        <label for="resprate" class="bh-visually-hidden">Oname</label><input type="text" id="resprate" name="oname" class="in_field" value="'.stripslashes($row['resprate']).'"  style="width:30px; float:left; margin-left:30px" /> 
				<a class="labels" style="font-weight:bold; margin-left:5px">Breaths/Min</a>
				<div class="cleaner_h5"></div>
				<a class="labels">Pulse Rate:<span>*</span></a>
		        <label for="pulserate" class="bh-visually-hidden">Oname</label><input type="text" id="pulserate" name="oname" class="in_field" value="'.stripslashes($row['pulserate']).'"  style="width:30px; float:left; margin-left:25px" /> 
			<a class="labels" style="font-weight:bold; margin-left:5px">Beats/Min</a>
				<div class="cleaner_h5"></div>
				<a class="labels">R.B.S:</a>
		        <label for="rbs" class="bh-visually-hidden">Oname</label><input type="text" id="rbs" name="oname" class="in_field" value="'.stripslashes($row['rbs']).'"  style="width:30px; float:left; margin-left:59px" /> 
			<a class="labels" style="font-weight:bold; margin-left:5px">mMoles/Ltr</a>
				<div class="cleaner_h5"></div>


				</div>';

			     echo'<div class="cleaner"></div>
				 <a class="labels" style="margin-right:5px">New Screening this calender year:</a>';
				 if(stripslashes($row['newscreening'])=='Yes'){
					 echo'<label for="yestohyper" class="bh-visually-hidden">Gender2</label><input  id="yestohyper" name="gender2" type="radio" value="Yes"  checked="checked" class="radio" style="margin-top:8px">Y.
				 <label for="notohyper" class="bh-visually-hidden">Gender2</label><input  id="notohyper" name="gender2" type="radio" value="No" class="radio" style="margin-top:8px">N.'; 
				 }else{ echo'<label for="yestohyper" class="bh-visually-hidden">Gender2</label><input  id="yestohyper" name="gender2" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
				 <label for="notohyper" class="bh-visually-hidden">Gender2</label><input  id="notohyper" name="gender2" type="radio" value="No" class="radio" checked="checked"  style="margin-top:8px">N.';}

			     echo'<div class="cleaner"></div>
				 <a class="labels" style="margin-right:30px">Known Hypertensive:</a>';
				 if(stripslashes($row['knownhyper'])=='Yes'){
					 echo'<label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input  id="yesknownhyper" name="gender3" type="radio" value="Yes" checked="checked" class="radio" style="margin-top:8px">Y.
				 <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input  id="noknownhyper" name="gender3" type="radio" value="No" class="radio"  style="margin-top:8px">N.'; 
				 }else{ echo'<label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input  id="yesknownhyper" name="gender3" type="radio" value="Yes" class="radio"  style="margin-top:8px">Y.
				 <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input  id="noknownhyper" name="gender3" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.';}

			     echo'<div class="cleaner"></div>
				 <a class="labels" style="margin-right:30px">Taking Medicine:</a>';
				 if(stripslashes($row['takingmeds'])=='Yes'){
					 echo'<label for="yestomeds" class="bh-visually-hidden">Gender4</label><input  id="yestomeds" name="gender4" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
				 <label for="yestomeds" class="bh-visually-hidden">Gender4</label><input  id="yestomeds" name="gender4" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.'; 
				 }else{ echo'<label for="notomeds" class="bh-visually-hidden">Gender4</label><input  id="notomeds" name="gender4" type="radio" value="Yes" class="radio"style="margin-top:8px">Y.
				 <label for="notomeds" class="bh-visually-hidden">Gender4</label><input  id="notomeds" name="gender4" type="radio" value="No" class="radio" checked="checked"  style="margin-top:8px">N.';}


	echo'</div>';

	echo'<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:300px">
	<h5>Health Problems/Allergies</h5>
	<label for="allergies" class="bh-visually-hidden">Health Problems/Allergies</label><textarea id="allergies" style="float:right;height:315px; width:280px;border:0" disabled="disabled" class="alergy">'.stripslashes($rowa['Allergies']).'</textarea>
	</div>';

	// echo'<div id="personal" style="border:0; height:365px; margin-left:0px; width:300px">
	// <h5>Other Details</h5>
	// <label for="hodetails" class="bh-visually-hidden">Other Details</label><textarea id="hodetails" style="float:right;height:315px; width:280px;border:0" disabled="disabled" class="alergy">'.stripslashes($rowa['OtherDetails']).'</textarea>
	// </div>';
						

echo'</div>';

echo'<div id="tabs-4">';

	echo'<div id="personal" style="border:0; height:365px; margin-left:0px; width:300px; float:left;">';
		   echo'<h5>Receive Payment 1</h5>';



	  echo'</div>';
	  echo'<div id="personal">';
		   echo'<h5>Receive Payment 2</h5>';

 	#include('multipleselect.php');


	  echo'</div>';
	  //echo'<div id="personal">';
		   //echo'<h5>Receive Payment 3</h5>';



	  //echo'</div>';


echo'</div>';
echo'<div id="tabs-5">';
			echo'<a class="labels">Select Payment:<span>*</span></a>
	<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">';
			//$resultc =mysqli_query($db, "select * from sales where Status=1   and ItemCode='2' and ClientId='".$reg."' order by TransNo desc");
			$resultc =mysqli_query($db, "select * from sales where Status=1 and ItemCode='1' and ClientId='".$reg."' order by TransNo desc");
			$arr=array();
			$num_resultsc = mysqli_num_rows($resultc);
			for ($i=0; $i <$num_resultsc; $i++) {
			$rowc=mysqli_fetch_array($resultc);
			$insurancescheme=stripslashes($rowc['Insname']);
			$arr[stripslashes($rowc['RcptNo'])]=stripslashes($rowc['ClientName']);
		}
		echo'<label for="consfee" class="bh-visually-hidden">Text field</label><select id="consfee">';
		if(isset($_GET['rcpt'])){
		echo"<option value=\"".$_GET['rcpt']."\">".$names.",Rcpt No:".$_GET['rcpt']."</option>";	
		}else{
		echo'<option value="">Select one...</option>';
		
		foreach ($arr as $key => $val) {
								echo"<option value=\"".$key."\">".$val.",Rcpt No:".$key."</option>";
						}
		}
		echo'
		</select>
	</div>';
	
	#echo"<script>$('#nwsendto').parent().find('input:first').width(100);</script>";
	#echo'<a class="labels" style="margin-left:8px;display:none;">Corporate/Accumulative Billing?</a>';
	echo'<a class="labels" style="margin-left:8px;display:none;">Day Care</a>';
	echo'<label for="accum" class="bh-visually-hidden">Accum</label><input type="checkbox" value="0" name="accum" id="accum" style="margin:8px 0 0 10px;display:none;">';
	echo'<div class="cleaner_h5"></div>';

	
	echo'<div class="cleaner_h5"></div>
								<a class="labels">Acc Type:<span>*</span></a>
								<label for="acctype" class="bh-visually-hidden">Acc Type:</label><select class="select" id="acctype" style="margin-left:42px;">
								<option value="Normal">Normal</option>
								<option value="Corporate">Corporate</option>
								<option value="insurance">Wholesale</option>
								</select>';
	
	
	echo'<div class="cleaner_h5"></div>
				<a class="labels">Clinic:<span>*</span></a>
                                <label for="typeDMclinic" class="bh-visually-hidden">Clinic:</label><select  class="select" id="typeDMclinic" style="margin-left:60px">
								<option value="">Select clinic..</option>';
						$result =mysqli_query($db, "SELECT id,Name FROM clinics ORDER BY id DESC");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
				echo"<option value=\"".stripslashes($row['id'])."\">".stripslashes($row['Name'])."</option>";
								}
			   				echo'</select>';
	
	
	echo'<div class="cleaner_h5"></div>
								<a class="labels">Type:<span>*</span></a>
                                <label for="ctype" class="bh-visually-hidden">Type:</label><select  class="select" id="ctype" style="margin-left:65px">
								<option value="">Select patient type...</option>
								<option value="NewPatient">New Patient</option>
								<option value="Revisit">Revisit</option>
								<option value="Review">Review</option>
								
								</select>
								<div class="cleaner_h5"></div>';
if(isset($_GET['rcpt'])){
			 echo'<div class="ui-widget" style="float:left">
					<a class="labels">Send To:<span>*</span></a>
					<label for="sendto" class="bh-visually-hidden">Send To:</label><select class="select" id="sendto" style="margin-left:50px;">';
				                $result =mysqli_query($db, "SELECT id,name FROM sendto WHERE status=1 ORDER BY id ASC");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
				   					echo"<option value=\"".stripslashes($row['id'])."\">".stripslashes($row['name'])."</option>";
								}
			   echo'</select>
				</div><div class="cleaner_h5"></div>';
				echo"<input type=\"button\" value=\"Send Patient\" id=\"submit\" style=\"margin-left:100px; float:left; cursor:pointer;width:100px\" class=\"in_field\" onclick=\"addpresc();\"/>";		
}
else{
			 echo'<div class="ui-widget" style="float:left">
					<a class="labels">Send To:<span>*</span></a>
					<label for="sendto" class="bh-visually-hidden">Send To:</label><select class="select" id="sendto" style="margin-left:50px;">';
				                $result =mysqli_query($db, "SELECT id,name FROM sendto WHERE id NOT IN ('1','2','3','4','5','6') ORDER BY name ASC");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
				   					echo"<option value=\"".stripslashes($row['id'])."\">".stripslashes($row['name'])."</option>";
								}
			   echo'</select>
				</div><div class="cleaner_h5"></div>';
				echo"<input type=\"button\" value=\"Send Patient\" id=\"submit\" style=\"margin-left:100px; float:left; cursor:pointer;width:100px\" class=\"in_field\" onclick=\"addcustompresc();\"/>";		

}

echo'<input type="button" value="Exit" id="exit" style="margin-left:20px;float:left; cursor:pointer;width:50px" class="in_field"onclick="hidenewstude();"/>	
			<div id="newstudent2" style="float:left; margin-left:10px;height:20px;"></div>';

			
	 // echo'<div class="">';
		//    echo'<h5>Start New Consultation</h5>';			
   // echo'</div>';
echo'</div>';
// echo'<div id="tabs-6">';
// 		   echo'<h5>Pyscho</h5>';


// echo'</div>';
// echo'<div id="tabs-7">';
// 		   echo'<h5>Dressing</h5>';
			
// echo'</div>';

// echo'<div id="tabs-8">';
// 		   echo'<h5>Receive Payment</h5>';
	
// echo'</div>';
// echo'<div id="tabs-11" style="display:;">';
					
// echo'</div>';
// echo'<div id="tabs-9">';

// echo'</div>';
// echo'<div id="tabs-10">';	

// echo'</div>';



echo'</div>';							

	break;

	case 2:
							
						$stamp=date('Ymd');
					echo"<script>$('#cons8800').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv2"></div>';
			echo'<div id="mon" style="min-height:110px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
			echo"<h5 style=\"margin-right:10px; color:#fff\">Pharmacy Adjustment:";
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";
										
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()">
				</h5></div>';
				$resultx =mysqli_query($db, "select * from pharmrequests where stamp>='".date('Ymd')."' and stamp<='".date('Ymd')."' group by prescid asc");
				$rowx=mysqli_fetch_array($resultx);
				$dept4rm=stripslashes($rowx['deptfrom']);

	// if($dept4rm=='IPD'){$result =mysqli_query($db, "select * from pharmrequests where paid=0 and status=0 and stamp>='".date('Ymd')."' and stamp<='".date('Ymd')."' group by prescid asc");
	// }else{$result =mysqli_query($db, "select * from pharmrequests where paid=1 and status=1 and stamp>='".date('Ymd')."' and stamp<='".date('Ymd')."' group by prescid asc");}

		$result =mysqli_query($db, "select * from pharmrequests where paid=0 and status=0 and stamp>='".date('Ymd')."' and stamp<='".date('Ymd')."' group by prescid asc");
				$num_results = mysqli_num_rows($result);
				echo'<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:10px">From:</a>
				<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick" type="text" value="'.date('Y/m/d').'">
				<a class="labels" style="margin-left:10px">To:</a>
				<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick2" type="text" value="'.date('Y/m/d').'">				
					<img alt="Search Pharmacy using these dates" src="images/back2.png" style="float:left; margin-left:10px;width:30px;height:30px; cursor:pointer" title="Search Pharmacy using these dates" onclick="searchpharmacyrequest(88,7);"/>
					<div class="cleaner"></div>
			<div class="ui-widget" style="margin:0 10px 0 10px; float:left" id="searchpharmacyrequest">
			<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
			<div class="cleaner_h5"></div>
			<label for="cons8800" class="bh-visually-hidden">No. of Patients:</label><select id="cons8800">
				<option value="">Select one...</option>';
					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					$pid=stripslashes($row['prescid']);
					//echo'<option value="'.stripslashes($row['id']).'ÃÂ¸'.stripslashes($row['prescid']).'ÃÂ¸'.stripslashes($row['old_in_presc_id']).'ÃÂ¸'.stripslashes($row['old_in_patient_id']).'">'.stripslashes($row['patname']).'-'.stripslashes($row['patid']).'</option>';
					echo'<option value="'.stripslashes($row['id']).'#'.stripslashes($row['old_in_presc_id']).'#'.stripslashes($row['prescid']).'#'.stripslashes($row['old_in_patient_id']).'#'.stripslashes($row['patid']).'">'.stripslashes($row['patname']).'-'.stripslashes($row['patid']).'</option>';
				    }
		echo'</select>
		</div>
	<div class="cleaner"></div>
	<label for="idpay" class="bh-visually-hidden">Text field</label><input class="input_field" style="display:none" id="idpay" type="text" value="3">';
	echo"<a class=\"labels\" style=\"margin-left:90px\"><strong>Today's Patients</strong></a>";
	echo'<div class="cleaner"></div>
	<div id="title" style="margin-left:10px">
	<div id="figure1" style="margin-left:0px; width:200px">Pat. Name</div>
	<div id="figure1" style="width:69px">Pat. No</div>
	</div><div class="cleaner"></div>
	<div id="inside" style="max-height:108px; overflow-y:auto; margin-left:10px">';

	$result =mysqli_query($db, "select * from pharmrequests where paid=0 and status=0 and stamp>='".date('Ymd')."' and stamp<='".date('Ymd')."' group by prescid asc");
				$num_results = mysqli_num_rows($result);
				for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					$code=stripslashes($row['id']);
					$prescno=stripslashes($row['prescid']);
					$prescid=stripslashes($row['old_in_presc_id']);
					$clientid=stripslashes($row['old_in_patient_id']);
		
		if(stripslashes($row['status'])==1){		
		echo"<div class=\"normal1\"  onclick=\"getorder2('".$prescid."','".$prescno."','".$clientid."','".$code."',3)\">";
		}else if(stripslashes($row['status'])==0){
			echo"<div class=\"normal1\"  onclick=\"getorder2('".$prescid."','".$prescno."','".$clientid."','".$code."',3)\">";
		}else {echo"<div class=\"normal2\"  onclick=\"getorder2('".$prescid."','".$prescno."','".$clientid."','".$code."',3)\">";}
		
		echo'<div id="figure2" style="width:200px">'.stripslashes($row['patname']).'</div>
		<div id="figure2" style="width:70px">'.stripslashes($row['patid']).'</div>
		</div>
		<div class="cleaner"></div>
		';}
		echo'</div>
		
		<div class="cleaner_h5"></div></div>
								</div>
		</div>';
							
							
	break;		
						
	case 3:
		// $code=$_GET['code'];
		// $prescid=$_GET['prescid'];
		// $prescno=$_GET['prescno'];
		// $clientid=$_GET['clientid'];
		// $clientno=$_GET['clientno'];
			
$old_in_presc_id=$_GET['prescid'];
$old_in_patient_id=$_GET['clientid'];
$pid=$_GET['prescno'];
$old_pharmacy_id=$_GET['code'];
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=date('Y/m/d');
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=date('Y/m/d');
$d1=preg_replace('~/~', '', $_GET['d1']);
$d2=preg_replace('~/~', '', $_GET['d2']);
$query =mysqli_query($db, "SELECT id,prescid,patid,patname,rcptno,deptfrom FROM pharmrequests WHERE id='".$_GET['code']."' and stamp>='".$d1."' and  stamp<='".$d2."'  ");
   $res = mysqli_fetch_array($query);
	#$code=stripslashes($res['id']);
	$clientno=stripslashes($res['patid']);
	$clientname=stripslashes($res['patname']);
	$rcptno=stripslashes($res['rcptno']);
	$dept4rm=stripslashes($res['deptfrom']);


		$resulta =mysqli_query($db, "select * from newprescription where PrescId='".$pid."'");
		#$resulta =mysqli_query($db, "select * from newprescription where PrescId='".$pid."'");
		$rowa=mysqli_fetch_array($resulta);
		$old_in_presc_id=stripslashes($rowa['Id']);
		$old_in_patient_id=stripslashes($rowa['old_patient_id']);
		$pntno=$patid=stripslashes($rowa['PatId']);
		$dept=stripslashes($rowa['Dept']);
		$dcare=stripslashes($rowa['DayCare']);
		$pharmpresc=stripslashes($rowa['Prescription']);
		$transdate=stripslashes($rowa['TransDate']);
		$pharmtime=stripslashes($rowa['PharmTime']);
		$acctype=stripslashes($rowa['AccType']);
		#$typeclinik=stripslashes($rowa['OtherDetails']);
		$patientclinic=mysqli_real_escape_string($db, trim(stripslashes($rowa['OtherDetails'])));
		$typeclinik=strip_tags($patientclinic);
		$result =mysqli_query($db, "select * from patients where pntno='".stripslashes($rowa['PatId'])."'");
		$row=mysqli_fetch_array($result);
		$patname=stripslashes($row['fullnames']);
		$old_patient_id=stripslashes($row['auto']);
			
		echo'<div id="newstude">';
		echo"<script>
			document.onkeydown = keydown;
			function keydown(evt){
				if (!evt) evt = event;
				if (evt.keyCode==123){ //f12
					savepharmAdjust('".$pid."'); 
				}
			}
			</script>";

			echo'<h2  style="float:left; padding:5px 5px 0 0; margin:0">PHARMACY ADJUSTMENTS -: '.$clientname.' - '.$clientno.' - '.$dept4rm.'</h2>';

		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('patreport.php?id=1&reg=".$patid."')\" title=\"Print Patient Report\">";
		echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
		<input type="button" value="Help" id="submit"  style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help53();"/></div>
		<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
		<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
		<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
		<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">';
		echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savepharmAdjust('".$pid."')\"/></div>";


		echo"<script>$('#currentins').parent().find('input:first').width(130).prop('disabled',true);</script>";
		echo"<script>
		$('#docopdUpt2').parent().find('input:first').width(150);
		$('#currentins').css({'border' : 'solid #DC2626 1px'});
		$('#symptoms').parent().find('input:first').width(530);
		$('#diagt').parent().find('input:first').width(330);
		$('#surgt').parent().find('input:first').width(530);
		$('#treat').parent().find('input:first').width(530);
		$('#presct').parent().find('input:first').width(430);
		$('#dr1').parent().find('input:first').width(180);
		$('.dr').parent().find('input:first').width(75);
		$('#radt').parent().find('input:first').width(300);
		$('#docInpPharm1').parent().find('input:first').width(150);
		
			</script>";
		echo'<script>
		$(function(){
			area10 = new nicEditor({fullPanel : true,maxHeight :170}).panelInstance("prescription");
		});
		</script>';		

		echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>';
								
		echo'<div id="personal">			
				<h5>Demographics</h5>
				<div class="cleaner_h5"></div>
				<iframe name="leiframe" style="margin-right:60px" id="leiframe" class="leiframe" src="images/patients/default.jpg"></iframe>					
				<div class="cleaner_h5"></div>
				<a class="labels">Patient No:<span>*</span></a>
                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field"  
				value="'.stripslashes($row['pntno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
				<div class="cleaner_h5" style="display:none"></div>
				<a class="labels" style="display:none">O/P No:<span>*</span></a>
                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field"  
				value="'.stripslashes($row['opno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none" /> 
				<div class="cleaner_h5"></div>

				<a class="labels">Full Names:<span>*</span></a>
                <label for="oname" class="bh-visually-hidden">Oname</label><input type="text" id="oname" name="oname" class="in_field"  
				value="'.stripslashes($row['fullnames']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
			   <div class="cleaner_h5"></div>
			   <a class="labels">Age:</a>
			   <label for="tdate" class="bh-visually-hidden">Age:</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">
			  <label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="border-color:var(--color-danger, #DC2626)"/> 
			 <input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
			 echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
				echo'<div class="cleaner_h5"></div>
				 <a class="labels" style="margin-right:30px">Gender:<span>*</span></a>';
				 if(stripslashes($row['gender'])=='male'){
					 echo'<label for="maleGender" class="bh-visually-hidden">Gender</label><input  id="maleGender" disabled="disabled" name="gender" type="radio" value="male" class="radio" checked="checked">Male.
				<label for="femaleGender" class="bh-visually-hidden">Gender</label><input  id="femaleGender" name="gender" type="radio" value="female" class="radio" disabled="disabled">Female.'; 
				 }
			 else{
                echo'<label for="maleGender" class="bh-visually-hidden">Gender</label><input  id="maleGender" disabled="disabled" name="gender" type="radio" value="male" class="radio">Male.
				<label for="femaleGender" class="bh-visually-hidden">Gender</label><input  id="femaleGender" name="gender" type="radio" value="female" class="radio"  checked="checked disabled="disabled">Female.';}
				echo'<div class="cleaner"></div> 
				<a class="labels">Contact:<span>*</span></a>
                <label for="stream" class="bh-visually-hidden">Stream</label><input type="text" id="stream"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['contact']).'"/> 
				<div class="cleaner_h5"></div>
				<a class="labels">Acc Type:<span>*</span></a>
                <label for="insurancescheme" class="bh-visually-hidden">Insurancescheme</label><input type="text" id="insurancescheme"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="insurancescheme" class="in_field" value="'.stripslashes($row['accountype']).'"/> 
                <div class="cleaner_h5"></div>
				<a class="labels">Pay Mode:<span>*</span></a>
                <label for="paymode" class="bh-visually-hidden">Stream</label><input type="text" id="paymode"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['insurer']).'"/> 
                <div class="cleaner_h5"></div>
				<a class="labels">Clinics:<span>*</span></a>
                <label for="typeclinics" class="bh-visually-hidden">Stream</label><input type="text" id="typeclinics"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['typeclinics']).'"/> 
                <div class="cleaner_h5"></div>
                <div class="cleaner_h5"></div>

	</div>

	<div id="tabs" style="width:748px; height:428px; float:left; margin:5px 0 0 0px">
		<ul>';
		   echo'<li><a href="#tabs-1">Prescription Summary</a></li>';
		   echo'<li><a href="#tabs-2">Triage</a></li>';			
	echo'</ul>';
		if(isset($_SESSION['pharmcart'])){
							unset($_SESSION['pharmcart']);
						}
		echo'<div id="tabs-1">';

	// 		echo'<label for="recpharm" class="bh-visually-hidden">Recpharm</label><input type="checkbox" value="1" name="recpharm" id="recpharm" style="float:left;margin:8px 0 0 0px">

	// <a class="labels" style="margin-left:10px"><b>Send Prescription to Pharmacy On Save</b></a>

	// <a class="labels" style="margin-left:30px;display:none;">Prescription Templates:</a>
	// <div class="ui-widget" style="margin-left:25px; float:left;display:none;" id="widg7" >
	// 							<label for="presct" class="bh-visually-hidden">Prescription Templates:</label><select id="presct" style="width:260px; margin-left:10px;">
	// 							<option value="">Select one...</option>';
	// 								$resultb =mysqli_query($db, "select * from prescriptions order by name asc");
	// 													$num_resultsb = mysqli_num_rows($resultb);	
	// 													for ($i=0; $i <$num_resultsb; $i++) {
	// 														$rowb=mysqli_fetch_array($resultb);
	// 														echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
	// 													}
	// 							echo'</select>
	// 							</div>';
	
	echo'<div class="cleaner"></div>
	<a class="labels">Drug Name</a><a class="labels" style="margin-left:160px">Dosage</a>	
	<a class="labels" style="margin-left:100px">Route</a><a class="labels" style="margin-left:90px;display:none;">Frequency</a>		
	<a class="labels" style="margin-left:100px">Duration</a><a class="labels" style="margin-left:70px">Qty</a>
	<div class="cleaner"></div>';		
	echo'
	<div class="cleaner"></div>		
	<div class="ui-widget" style="margin-left:-5px; float:left;" >
		<label for="docInpPharm1" class="bh-visually-hidden">Qty</label><select class="drugname" id="docInpPharm1" style=" margin-left:0px;">
		<option value="">Select one...</option>';
			#$resultb =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
			$resultb =mysqli_query($db, "select * from items where PHARMACY>0 and Type='GOOD' order by ItemName");
			$num_resultsb = mysqli_num_rows($resultb);
			// $resultc =mysqli_query($db, "select * from items where DDA>0 and Type='GOOD' order by ItemName");
			// $num_resultsc = mysqli_num_rows($resultc);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$code=stripslashes($rowb['ItemCode']);
								$item=stripslashes($rowb['ItemName']);
								$sprice=stripslashes($rowb['SalePrice']);
								$cpr = stripslashes($rowb['CorporatePrice']);
								$ppr = stripslashes($rowb['insurancePrice']);
								$categ = stripslashes($rowb['Category']);
								$catid = stripslashes($rowb['CategoryId']);
								$type = stripslashes($rowb['Type']);
								$bal = stripslashes($rowb['PHARMACY']);
								echo"<option value=\"".$code."ÃÂ¸".$item."ÃÂ¸".$sprice."ÃÂ¸".$cpr."ÃÂ¸".$ppr."ÃÂ¸".$categ."ÃÂ¸".$type."ÃÂ¸".$bal."ÃÂ¸".$catid."\">".stripslashes($rowb['ItemName'])." Bal: ".stripslashes($rowb['PHARMACY'])."</option>";

							}
							// for ($i=0; $i <$num_resultsc; $i++) {
							// 	$rowc=mysqli_fetch_array($resultc);
							// 	$code=stripslashes($rowc['ItemCode']);
							// 	$item=stripslashes($rowc['ItemName']);
							// 	$sprice=stripslashes($rowc['SalePrice']);
							// 	$cpr = stripslashes($rowc['CorporatePrice']);
							// 	$ppr = stripslashes($rowc['insurancePrice']);
							// 	$categ = 'DDA';
							// 	$catid = stripslashes($rowc['CategoryId']);
							// 	$type = stripslashes($rowc['Type']);
							// 	$bal = stripslashes($rowc['DDA']);
							// 	echo"<option value=\"".$code."ÃÂ¸".$item."ÃÂ¸".$sprice."ÃÂ¸".$cpr."ÃÂ¸".$ppr."ÃÂ¸".$categ."ÃÂ¸".$type."ÃÂ¸".$bal."ÃÂ¸".$catid."\">".stripslashes($rowc['ItemName'])." DDA: ".stripslashes($rowc['DDA'])."</option>";
							// }
								echo'</select>
								</div>
	<input type="hidden" disabled="disabled" id="txtproductcode" class="input_field" style="width:20px; margin-left:5px;display:none;"/>
	<input type="hidden" disabled="disabled" id="dname" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="dbal" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprnormal" name"txtprnormal" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate" name="txtprcorporate" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprinsurance" name="txtprinsurance" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<label for="lcmhcateg" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="lcmhcateg" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid" name="txtcatid" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtype" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtprice" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtdisc"  class="input_field" value="0" style="width:60px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhsub44" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>	
	<input type="hidden" disabled="disabled" id="lcmhtotal44" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
				echo '<input type="hidden" disabled="disabled" id="old_patient_id" value="'.$old_in_patient_id.'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="old_presc_id" value="'.$old_in_presc_id.'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="regn" value="'.$patid.'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="oname" value="'.$patname.'" style="display:none;"/>';
	//echo'<input type="hidden" id="regn" value="'.$patid.'"/><input type="hidden" id="oname" value="'.$patname.'"/>';
	
	echo'<label for="dr9" class="bh-visually-hidden">Text field</label><input type="text" id="dr9" class="in_field" value="" style="width:30px; float:left; margin-left:30px;padding:6px 5px"/> 
		<div class="ui-widget" style="margin-left:2px; float:left;" >
		<label for="dr4" class="bh-visually-hidden">Text field</label><select class="dr" id="dr4">
		<option value="">Select one...</option>
		<option value="Tabs">Tabs</option>
		<option value="Mls">Mls</option>
		<option value="Capsules">Capsules</option>
		<option value="Suspensions">Suspensions</option>
		<option value="Elixirs">Elixirs</option>
		<option value="Syrups">Syrups</option>
		<option value="Creams">Creams</option>
		<option value="Ointments">Ointments</option>
		<option value="Suppositories">Suppositories</option>
		<option value="Inhalers">Inhalers</option>
		<option value="Vials">Vials</option>
		<option value="Patch">Patch</option>
		<option value="Pessaries">Pessaries</option>
		<option value="Ampoule"></option>

		</select>
		</div>
		
		<div class="ui-widget" style="margin-left:30px; float:left;" >
		<label for="dr6" class="bh-visually-hidden">Pessaries</label><select class="dr" id="dr6">
		<option value="">Select one...</option>
		<option value="Oral">Oral</option>
		<option value="Rectal">Rectal</option>
		<option value="I.V">I.V</option>
		<option value="I.M">I.M</option>
		<option value="S.C">S.C</option>
		<option value="Intraspinal Injection">Intraspinal Injection</option>
		<option value="Inhalation">Inhalation</option>
		<option value="Vaginal">Vaginal</option>
		<option value="Aural">Aural</option>
		<option value="Tropical">Tropical</option>
		<option value="Intranasal">Intranasal</option>
		</select>
		</div>';
		
		
		echo'<div class="ui-widget" style="margin-left:35px; float:left;display:none;" >
		<label for="dr5" class="bh-visually-hidden">Intranasal</label><select class="dr" id="dr5">
		<option value="">Select one...</option>
		<option value="1">stat</option>
		<option value="1">n/a</option>
		<option value="24">Once Hourly</option>
		<option value="1">Once Daily</option>
		<option value="2">Twice Daily</option>
		<option value="3">Thrice Daily</option>
		<option value="4">Four Times Daily</option>
		<option value="0.1429">Once Weekly</option>
		<option value="0.2857">Twice Weekly</option>
		<option value="0.4286">Thrice Weekly</option>
		<option value="0.5714">Four Times Weekly</option>
		<option value="1">Mane</option>
		<option value="1">Nocte</option>
		<option value="4">Qid/Qds</option>
		<option value="1">P.R.N</option>
		</select>
		</div>';
		
		
		
		echo'<label for="dr7" class="bh-visually-hidden">Oname</label><input type="text" id="dr7" name="oname" class="in_field" value="" style="width:30px; float:left; margin-left:30px;padding:6px 5px"/> 
		
		<div class="ui-widget" style="margin-left:2px; float:left;" >
		<label for="dr8" class="bh-visually-hidden">P.R.N</label><select class="dr" id="dr8">
		<option value="">Select one...</option>
		<option value="1">stat</option>
		<option value="1">n/a</option>
		<option value="0.04167">Hours</option>
		<option value="1">days</option>
		<option value="7">weeks</option>
		<option value="30">months</option>
		<option value="1">Single Dose</option>
		<option value="1">Continous</option>
		<option value="1">When Needed</option>
		</select>
		</div>
		
		<label for="quat4dr34" class="bh-visually-hidden">This is the actual quantity that is billed.</label><input type="text" id="quat4dr34" name="oname" class="in_field" value="" style="width:30px; float:left; margin-left:30px;padding:6px 5px" title="This is the actual quantity that is billed."/>';
		
 echo'<img alt="Document Add" src="images/document_add.png" style="margin-left:5px; width:20px; height:20px;float:left; cursor:pointer" onclick="addthispresc()"/>';			
echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"20\" height=\"20\" style=\"cursor:pointer; margin-left:5px; float:left\" title=\"View Current Cart\" onclick=\"viewpharmcartbill('nurse')\"/>";
//echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"View Current Cart\" onclick=\"viewbill('cons')\"/>";				
echo'<div class="cleaner_h5"></div>
	<div style="width:260px; margin-left:-10px; float:left;background:#;">';
	echo'<label for="prescription" class="bh-visually-hidden">Text field</label><textarea id="prescription" style="float:right;height:170px; width:240px" class="alergy">';
 		$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
	$num_resultsb = mysqli_num_rows($resultb);	
	$xa=1;	
	for ($i=0; $i <$num_resultsb; $i++) {
		$rowb=mysqli_fetch_array($resultb);		
		$pharmitems=stripslashes($rowb['itname']);
		#echo''.$pharmitems.'</br>'; 
		echo '<a class="labels"> '.$xa.'. '.stripslashes($rowb['prescription']).'</a>';
		$xa++;
	}
	echo'</textarea>';

	echo'<div class="cleaner"></div>
	<input aria-label="Printrec" type="checkbox" value="1" name="printrec" style="float:left;margin:8px 3px 0 0px;"><a class="labels">Print Prescription on Save</a>
	</div>';

	echo'<div style="width:440px; float:left;padding:2px;">';
		#echo'<div class="cleaner_h5"></div>';
		echo'<div id="tabs4" style="height:260px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Prescriptions Summary.</a></li>';
					echo'<li><a href="#tabs-2">Invoice Items.</a></li>';
					echo'<li><a href="#tabs-3">Presc.</a></li>';
					//echo'<li><a href="#tabs-4">Proc.</a></li>';
					//echo'<li><a href="#tabs-5">Surg.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 echo'<div>';
					  echo'<a class="labels" style="margin-top:10px;margin-bottom:5px">Date: <b>'.$transdate.'</b>&nbsp;&nbsp;&nbsp; Time: <b>'.$pharmtime.'</b></a><div class="cleaner_h5"></div>';
						 	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
							$num_resultsb = mysqli_num_rows($resultb);	
							$xa=1;	
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);		
								$pharmitems=stripslashes($rowb['itname']);
								echo '<a class="labels"> '.$xa.'. '.stripslashes($rowb['prescription']).'</a>';
								$xa++;
							}
					  #echo'<a class="labels" style="margin-top:10px;margin-bottom:5px">Prescribed By: <b>'.$prescribedBy.'</b>&nbsp;&nbsp;&nbsp; Time: <b>'.$pharmtime.'</b></a>';
					 #echo'<label for="old_rcpt_no" class="bh-visually-hidden">Prescribed By:</label><input type="text" id="old_rcpt_no" value="'.$old_rcpt_no.'"/>';
					 echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="float:right;height:100px;margin:2px;">';
			 		echo'<div id="displayinv" style="background-color:#;margin-left:10px;">';

			 		echo'</div>';
				echo'</div>';
				echo'<div id="tabs-3">';
					 // echo'<div style="width:430px; float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
					 // echo'</div>';
				echo'</div>';
				// echo'<div id="tabs-4">';
				// echo'</div>';
				// echo'<div id="tabs-5">';
				// echo'</div>';
		echo'</div>';
   echo'</div>';










			
		echo'</div>';

		// echo'<div id="tabs-2">';

		// 	echo'<div id="personal" >';
		// 	echo'<h5>Triage Analysis</h5>';
				

		// 	echo'</div>';

				

		// echo'</div>';








	echo'</div>';		
echo'</div>';							

	break;
	
							case 4:
						
		$result = mysqli_query($db, "insert into log values('0','".$username." accesses IPD Issue Credit Note Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		
								echo'
							<div id="newstude">
	<div id="results">						
	<div style="height:126px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">IPD Issue Credit Note</h5>';
						echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-25px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help41()\"/></div>";								
echo'<a class="labels" style="margin-left:10px">Invoice No:</a>
					<label for="rcptno" class="bh-visually-hidden">Invoice No:</label><input type="text" id="rcptno" class="input_field"  style="width:170px; margin-left:10px;"/>';
					echo"<img alt=\"Search Receipt\" src=\"images/zoom.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Search Receipt\" onclick=\"searchreturntostock()\"/>";
							echo'<div id="option4" style="float:left;margin-left:70px"></div>
							  <div class="cleaner_h5"></div>	
							<a class="labels" style="margin-left:5px">Return Total:</a>
							<label for="retotal" class="bh-visually-hidden">Return Total:</label><input type="text" disabled="disabled" id="retotal" class="input_field"  style="width:100px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:10px;"/>';
							
				echo"<img alt=\"Issue Credit Note\" src=\"images/back.jpg\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Issue Credit Note\" onclick=\"iscreditreturntostock()\"/>";
				
					 	
										
									echo'</div>
	<div id="itemsdisp" style="height:340px; width:766px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">Items</h5>
	<div id="display" style="margin-top:0px; height:250px;">
	
	</div>
	</div>						
							
										
									</div>
									
									<div id="recentstude">
									
								</div>
									</div>';
						
							break;
							
							case 5:
							echo"<script>$('#retotal').val('');</script>";
							$searchh=$_GET['searchdata'];
							$result =mysqli_query($db, "SELECT * FROM tempbill WHERE billno='".$searchh."' AND category='PHARMACY' AND status=1");
							$count = mysqli_num_rows($result);
							if($count==0){
	echo"<script>$('#option4').html('<p style=\"font-size:10px; margin-left:10px\">Invalid Receipt Number-Either non existent or has not been posted.</p>')</script>";
	exit;
							}
else{							
								$a=0;
								for ($i = 0; $i < $count; $i++){
								$row=mysqli_fetch_array($result);
								$a=stripslashes($row['subnet']);
								$date=stripslashes($row['date']);
									}
	echo"<script>$('#option4').html('<img alt=\"\" src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>');
	$('#cdate').val('".$date."');
	$('#crct').val('".$searchh."');
	$('#csale').val((".$a.").formatMoney(2, '.', ','));
</script>";}
	echo'<div id="chati">
				<div id="scrollbar1" style="width:760px; height:300px" onmouseenter="scroller();">
		<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
		<div class="viewport" style="width:740px; height:300px">
			 <div class="overview">
				<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:236px">ItemName</div>
									<div id="figure1"  style="width:70px">Unit Price</div>
									<div id="figure1" style="width:80px">Qty. Prchsd</div>
									<div id="figure1"  style="width:70px">Return Qty</div>
									<div id="figure1"  style="width:75px">Remain Qty</div>
									<div id="figure1"  style="width:80px">Return Total</div>
									<div id="figure1"  style="width:45px">Add</div>
									
									</div>';
				if($count>0){
				$_SESSION['credit']=array(array());
				$result =mysqli_query($db, "SELECT * FROM tempbill WHERE billno='".$searchh."' AND category='PHARMACY' AND status=1"); #search by pntno, auto, date, billno, Category
				$rcptno=$searchh;
				$count = mysqli_num_rows($result);
				for ($i = 0; $i < $count; $i++){
				$row=mysqli_fetch_array($result);
				$code=stripslashes($row['itcode']);
				$tno=stripslashes($row['id']);
				$name=stripslashes($row['itname']);
				$price=stripslashes($row['price']);
				$qty=stripslashes($row['quat']);
				echo'<div id="normal">';
				echo"<div id=\"name".$code."\" class=\"figure2t\" style=\"width:240px;height:16px;overflow:hidden\">".$name."</div>
		<div id=\"price".$code."\" class=\"figure2t\" style=\"width:70px\">".$price."</div>
	<div id=\"iqty".$code."\" class=\"figure2t\" style=\"width:80px; overflow:hidden\">".$qty."</div>
		<div id=\"figure2t\" style=\"width:70px; padding:3px 5px; height:20px\"><label for=\"rqty".$code."\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" id=\"rqty".$code."\" onkeyup=\"qtykeyupreturntostock(".$code.")\" class=\"put_field\" style=\"width:70px; background:fff; border:0\"/></div>
			<div id=\"remqty".$code."\" class=\"figure2t\" style=\"width:80px\"></div>
				<div  id=\"rtot".$code."\" class=\"figure2t\" style=\"width:80px;\"></div>
				<div  id=\"add".$code."\" class=\"figure2t\" style=\"width:42px; height:16px; border-right:1px solid #333\">
				<img alt=\"\" src=\"images/document_add.png\" width=\"22\"  onclick=\"addcreditreturntostock(".$code.",".$tno.")\" height=\"22\" /></div></div>";
										}
					}
							echo'</div></div></div></div></div>';
							break;
							
							case 6:
							echo'<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">
							<img alt="" src="images/tick.png" width="19" height="19" />';
							$price=$_GET['price'];
							$quat=$_GET['quat'];
							$rquat=$_GET['rquat'];
							$remquat=$_GET['remquat'];
							$rtot=$_GET['rtot'];
							$code=$_GET['code'];
							$name=$_GET['name'];
							$tno=$_GET['tno'];
							if(isset($_SESSION['credit'])){
							$max=count($_SESSION['credit']);
							$_SESSION['credit'][$max]=array($code,$name,$quat,$price,$rquat,$rtot,$remquat,$tno);
							}
							
							else{
							$_SESSION['credit']=array(array());
							$_SESSION['credit'][0]=array($code,$name,$quat,$price,$rquat,$rtot,$remquat,$tno);}
							$a=0;
							$max=count($_SESSION['credit']);
						
							for ($i =1; $i < $max; $i++){
							$a+=preg_replace('~,~', '', $_SESSION['credit'][$i][5]);
							}
							echo"<script>$('#retotal').val((".$a.").formatMoney(2, '.', ','));</script>";
							break;



							
						case 7:

							echo' <div id="newstude">
							        <div id="results" style="width:1000px;">						
										<div style="width:994px; height:464px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
										<h5 style="text-align:center">EXPIRY BY DATE RANGE</h5>';

							$current_date= date('Y-m-d');
							$date = date_create($current_date);
							date_add($date, date_interval_create_from_date_string('150 days'));
							$the_ninety_days= date_format($date, "Y-m-d");	
							$result =mysqli_query($db, "select * from purchases where expstamp>='".preg_replace('~-~', '',$current_date)."' and expstamp<='".preg_replace('~-~', '',$the_ninety_days)."' order by expstamp ASC");
							$num_rows = mysqli_num_rows($result);
						    $count = mysqli_num_rows($result);

							echo'<div id="chati">
										<div id="scrollbar1" style="width:900px; height:430px" onmouseenter="scroller();">
								<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
								<div class="viewport" style="width:880px; height:430px">
									 <div class="overview">
										<div id="inside" style="min-height:300px;">
															<div id="title">';
												echo '<div id="figure1"  style="width:90px">PurchDate</div>';
												echo '<div id="figure1"  style="width:90px">ExpiryDate</div>';
												echo '<div id="figure1"  style="width:80px" title="To/After Expiry">To/After</div>';
												echo '<div id="figure1"  style="width:80px" title="To/After Expiry">To/After</div>';
												echo '<div id="figure1"  style="width:270px">Item Name</div>';
												echo '<div id="figure1"  style="width:70px">Purch Qty</div>';
												#echo '<div id="figure1"  style="width:70px">Total Qty</div>';
												echo '<div id="figure1"  style="width:70px;margin-left:-5px;">Expired</div>';
												echo '<div id="figure1"  style="width:30px">Action</div>';						
													   echo'</div>';
													if($count==0){
														
														echo'<div class="cleaner_h5"></div>
														No records found.';
													}
												for ($i=0; $i <$count; $i++) {
													$rw=mysqli_fetch_array($result);
													$ptransid=stripslashes($rw['TransNo']);
													$purchdate=stripslashes($rw['Stamp']);
													$pitcode=stripslashes($rw['ItemCode']);
													$pitname=stripslashes($rw['ItemName']);
													$purchasedqty=stripslashes($rw['Quantity']);
													$expirydate=stripslashes($rw['expstamp']);
													$oldbal=stripslashes($rw['Bal']);
													$purchdate_1=dateprintexp($purchdate);
													$expirydate_2=dateprintexp($expirydate);

													$origin = date_create($expirydate_2);
													#$origin = date_create($current_date);
													$target = date_create($current_date);
													#$target = date_create($purchdate_1);
													$interval = date_diff($origin, $target);
													#$interval = date_diff($target, $origin);
													#echo $interval->format('%R%a days');


						#$a= array(1,-2,4,-7.3,105); 
						$a= $interval->format('%R%a days');
						$b=array_map("abs",$a); 
						while (list ($key, $val) = each ($b)) { 
						echo "$key -> $val <br>"; 
						}

												

												 $resultz =mysqli_query($db, "select * from  items where ItemCode='".$pitcode."' ");
												 $num_resultzs = mysqli_num_rows($resultz);
													for ($i=0; $i <$num_resultzs; $i++) {
														$rowz=mysqli_fetch_array($resultz);
														$code=stripslashes($rowz['ItemCode']);
														$qtypurch=stripslashes($rowz['Qpurch']);
														$itdiff=stripslashes($rowz['Diff']);
														$adminbal=stripslashes($rowz['ADMINISTRATION']);
													}

								echo"<div id=\"normal\">";
													     echo "<div id=\"purchdate".$code."\" class=\"figure2t\" style=\"width:90px\">".dateprintexp($purchdate)."</div>";
														 echo "<div id=\"expirydate".$code."\" class=\"figure2t\" style=\"width:90px; height:16px; overflow:hidden\">".dateprintexp($expirydate)."</div>";
														 echo "<div id=\"expirydays".$code."\" class=\"figure2t\" style=\"width:80px; height:16px; overflow:hidden\">".$interval->format('%R%a days')."</div>";
														 echo "<div id=\"expirydays".$code."\" class=\"figure2t\" style=\"width:80px; height:16px; overflow:hidden\">".abs($interval->format('%R%a days'))."</div>";
														 echo "<div id=\"itname".$code."\" class=\"figure2t\" style=\"width:270px; height:16px; overflow:hidden\">".$pitname."</div>";
														 echo "<div id=\"purchasedqty".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">".$purchasedqty."</div>";
														 #echo "<div id=\"purchasedbal".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">".$adminbal."</div>";

														$resrxw =mysqli_query($db, "select * from accesstbl where AccessCode=256");
														$rxw=mysqli_fetch_array($resrxw);
														$viewexp=stripslashes($rxw[$usertype]);
														if($viewexp='YES'){
															echo "<div class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">";
																 echo "<label for=\"expiredqty".$code."\" class=\"bh-visually-hidden\">Number</label><input type=\"number\" id=\"expiredqty".$code."\" style=\"text-align:center; margin-top:-2px;width:60px\" />";
															echo "</div>";
															echo "<div id=\"disp".$code."\" class=\"figure2t\" style=\"width:30px;height:16px; overflow:hidden\">";
																echo "<img alt=\"\" src=\"images/save.jpg\" onclick=\"recordexpiry('".$code."','".$ptransid."');\" width=\"22\" height=\"22\"/>";
														    echo "</div>";
														}else{
															echo "<div class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">";
																 	 echo "<input aria-label=\"Text field\" type=\"text\" style=\"text-align:center; margin-top:-2px;width:60px\"  disabled=\"disabled\"/>";
																 echo "</div>";
															echo "<div id=\"disp".$code."\" class=\"figure2t\" style=\"width:30px;height:16px; overflow:hidden\">";
																	echo "<div id=\"display\"></div>";
																	 echo "<img alt=\"\" src=\"images/save.jpg\"  width=\"22\" height=\"22\" disabled=\"disabled\"/>";
														    echo "</div>";
														}

						          echo"</div>";
												 }
											echo'</div></div></div></div></div>';




							echo'</div>
							</div>
						</div>';

							break;

							case 8:
							echo' <div id="newstude">
							        <div id="results" style="width:1000px;">						
										<div style="width:994px; height:464px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
										<h5 style="text-align:center">UNDISPENSED DRUGS FOR THE LAST 24HRS</h5>';
				$current_date= date('Y-m-d');
				$date = date_create($current_date);
				date_sub($date, date_interval_create_from_date_string('1 days'));
				$the_one_days= date_format($date, "Y-m-d");				
				$undispensedQry =mysqli_query($db, "select * from pharmrequests  where stamp<='".preg_replace('~-~', '',$current_date)."' and stamp>='".preg_replace('~-~', '',$the_one_days)."' and status=1"); 
				$num_rows = mysqli_num_rows($undispensedQry);
				$count = mysqli_num_rows($undispensedQry);

				$undispensed_num_rows = mysqli_num_rows($undispensedQry);
				$undispensed254=mysqli_fetch_array($undispensedQry);

							echo'<div id="chati">
										<div id="scrollbar1" style="width:900px; height:430px" onmouseenter="scroller();">
								<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
								<div class="viewport" style="width:880px; height:430px">
									 <div class="overview">
										<div id="inside" style="min-height:300px;">
															<div id="title">';
												echo '<div id="figure1"  style="width:120px">Date</div>';
												echo '<div id="figure1"  style="width:50px">Pat.No</div>';
												echo '<div id="figure1"  style="width:200px">Patient Name</div>';
												echo '<div id="figure1"  style="width:250px">Item Name</div>';
												echo '<div id="figure1"  style="width:50px">I/O</div>';
												echo '<div id="figure1"  style="width:120px;margin-left:-5px;">RequestBy</div>';				
													   echo'</div>';
													if($count==0){
														
														echo'<div class="cleaner_h5"></div>
														No records found.';
													}
												for ($i=0; $i <$count; $i++) {
													$rw=mysqli_fetch_array($undispensedQry);
													$ptransid=stripslashes($rw['id']);
													$trans_date=stripslashes($rw['date']);
													$patid=stripslashes($rw['patid']);
													$patname=stripslashes($rw['patname']);
													$itname=stripslashes($rw['itname']);
													$dept4rm=stripslashes($rw['deptfrom']);
													$requested=stripslashes($rw['requested']);

											echo"<div id=\"normal\">";
													   echo "<div id=\"purchdate".$code."\" class=\"figure2t\" style=\"width:120px\">".$trans_date."</div>";
														 echo "<div id=\"expirydate".$code."\" class=\"figure2t\" style=\"width:50px; height:16px; overflow:hidden\">".$patid."</div>";
														 echo "<div id=\"expirydays".$code."\" class=\"figure2t\" style=\"width:200px; height:16px; overflow:hidden\">".$patname."</div>";
														 echo "<div id=\"itname".$code."\" class=\"figure2t\" style=\"width:250px; height:16px; overflow:hidden\">".$itname."</div>";
														 echo "<div id=\"purchasedqty".$code."\" class=\"figure2t\" style=\"width:50px; height:16px; overflow:hidden\">".$dept4rm."</div>";
														echo "<div class=\"figure2t\" style=\"width:120px; height:16px; overflow:hidden\">".$requested."</div>";

						          echo"</div>";
												 }
											echo'</div></div></div></div></div>';




							echo'</div>
							</div>
						</div>';

							break;
							
							case 9:

							break;
	





}

