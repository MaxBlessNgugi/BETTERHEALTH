<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include(__DIR__ . '/includes/db_fns.php');
bh_enforce_panel('bridgerep.php', isset($_GET['id']) ? $_GET['id'] : '');
date_default_timezone_set('Africa/Nairobi');
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$usertype=stripslashes($row['position']);
$fullname=stripslashes($row['fullname']);
$userid=stripslashes($row['userid']);
$userdep=stripslashes($row['dept']);
include(__DIR__ . '/includes/functions.php'); 
include __DIR__ . '/includes/func.php';
include __DIR__ . '/includes/compile.php';
include __DIR__ . '/includes/components.php';
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}

?>
<script src="js/func.js"></script>
<script src="js/functions.js"></script>
<script src="js/ajax.js"></script>
<script src="js/help.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.txt"></script>
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
<!-- <script src="../code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link href='assets/vendor/DataTables/datatables.min.css' rel='stylesheet' type='text/css'>


<script>
	$(function() {
		$( "#tabs" ).tabs();$( "#tabs2" ).tabs();$( "#tabs3" ).tabs();
	});
	</script>
<script>window.onload = setupRefresh</script>
<script type="text/javascript" src="js/jquery.lightbox.js"></script>
<script src="assets/vendor/DataTables/datatables.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('.light').lightBox({overlayBgColor: '#000',overlayOpacity:0.6});
	});
</script>
<script>
$(document).ready(function(){
	$("#itemn" ).combobox();
		$( "#toggle" ).click(function() {
		$( "#itemn" ).toggle();
		});
	$("#itemn").parent().find("input:first").focus();	
	});


	</script>
<script type="text/javascript">
      $(function () {
        $('#default_widget').monthpicker();
		$('#other_widget').monthpicker();
		 $('#default_widgeta').monthpicker();
		$('#other_widgeta').monthpicker();
		 $('#default_widgetb').monthpicker();
		$('#other_widgetb').monthpicker();
        $('.monthpicker').monthpicker();

        $('#custom_widget').monthpicker({
            pattern: 'yyyy-mm',
            selectedYear: 2010,
            startYear: 2004,
            finalYear: 2029,
            monthNames: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
        });

        $('#events_widget').monthpicker().bind('monthpicker-click-month', function (e, month) {
            alert('You clicked on month ' + month);

        }).bind('monthpicker-change-year', function (e, year) {
            alert('You chosed the year ' + year);

        }).bind('monthpicker-show', function () {
            alert('showing... ' + $(this).attr('id'));
            
        }).bind('monthpicker-hide', function () {
            alert('hiding... ' + $(this).attr('id'));
        });

        $('#last_widget').monthpicker({selectedYear: 2009, startYear: 2004, finalYear: 2029, openOnFocus: false});

        $('#last_widget').monthpicker().bind('monthpicker-change-year', function (e, year) {
            $('#last_widget').monthpicker('disableMonths', []);
            if (year === '2008') {
                $('#last_widget').monthpicker('disableMonths', [1, 2, 3, 4]);
            }
            if (year === '2010') {
                $('#last_widget').monthpicker('disableMonths', [9, 10, 11, 12]);
            }
        });
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
<link rel="stylesheet" href="css/custom.css">
<link href="css/page.css" rel="stylesheet" type="text/css" />
<?php
$id=$_GET['id'];
switch($id){
		
	case 1:

	$result =mysqli_query($db, "select auto,pntno from patients order by auto desc limit 0,1");
	$row=mysqli_fetch_array($result);
	 $old_patient_id=stripslashes($row['auto'])+1;
	if(mysqli_num_rows($result)==0){$pntno=1;
		}else {
			$pntno=stripslashes($row['pntno'])+1;	}
		echo"<script>$('#currentins').parent().find('input:first').width(140);
		$('#newreg76').parent().find('input:first').width(140);
		$('#bnamempesa76').parent().find('input:first').width(140);
		$('#cname76').parent().find('input:first').width(140);
		</script>";
		echo'<script>document.onkeydown = keydown;
		function keydown(evt){
		if (!evt) evt = event;
		if (evt.keyCode==121){ //f2
		evt.preventDefault();
	   addnewpat();
	   }
	   if (evt.keyCode==112){ //f2
		evt.preventDefault();
	   help3();
	   }
		}
		 </script>';
	 echo' <label for="tdate" class="bh-visually-hidden">Text field</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">';	
	 echo' <div id="page">';	
		echo'<div id="newstude">';
			 echo '<h2 style="float:left; padding:5px 5px 0 0; margin:0;">New Patient Information</h2>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Help" id="submit" style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help3();"/>';
echo '</div>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>';
echo '</div>';

echo '<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;"></div>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewpat();"/>'; 
echo '</div>';

	 echo '<div class="cleaner" style="border-bottom:2px solid #333"></div>';
			echo '<form method="post" name="personal_form" action="#">';
			echo '<input type="hidden" name="post" value="Send" />';
			echo '<div id="personal">';
			    echo ' <h5>Personal Details</h5>';
				echo ' <a class="labels" style="display:">Patient No:<span>*</span></a>
	            <label for="old_patient_id" class="bh-visually-hidden">Field</label><input type="text" id="old_patient_id" name="field" class="in_field"  disabled="disabled" value="'.$old_patient_id.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/> 
	                    <label for="regn" class="bh-visually-hidden">Field</label><input type="text" id="regn" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:;"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">1st Name:<span>*</span></a>
	                    <label for="fname" class="bh-visually-hidden">Field</label><input type="text" id="fname" name="field" class="in_field" maxlength="15" style="text-transform:uppercase"/>
						<div class="cleaner_h5"></div>
						 <a class="labels">2nd Name:<span>*</span></a>
	                    <label for="oname" class="bh-visually-hidden">Field</label><input type="text" id="oname" name="field" class="in_field" maxlength="15" style="text-transform:uppercase"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">3rd:</a>
	                    <label for="lname" class="bh-visually-hidden">Field</label><input type="text" id="lname" name="field" class="in_field" maxlength="15" style="text-transform:uppercase;width:77px;margin-left:5px;float:left"/> 
	                    <a class="labels" style="margin-left:5px">4th:</a>
	                    <label for="fourthname" class="bh-visually-hidden">Field</label><input type="text" id="fourthname" name="field" class="in_field" maxlength="15" style="text-transform:uppercase;width:77px;margin-left:5px;float:left"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">IDNumber:<span>*</span></a>								
	                    <label for="regnid" class="bh-visually-hidden">Field</label><input type="text" id="regnid" name="field"  onkeyup="validatenum("regnid")" class="in_field" maxlength="8" style="border-color:#; "/> 
						<div class="cleaner_h5"></div>
					
						 <a class="labels">D.o.b:<span>*</span></a>
	<input id="dob" name="dob" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10">
						<div class="cleaner_h5"></div>
						 <a class="labels">Age:<span>*</span></a>
	<label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" class="in_field" style="border-color:var(--color-danger, #DC2626);margin-left:5px;" /> 
					<div class="cleaner_h5"></div>
						 <a class="labels" style="margin-right:30px">Gender:</a>
	                    <label for="maleGender" class="bh-visually-hidden">Gender</label><input  id="maleGender" name="gender" type="radio" value="male" class="radio" checked="checked">Male.
						 <label for="femaleGender" class="bh-visually-hidden">Gender</label><input  id="femaleGender" name="gender" type="radio" value="female" class="radio">Female.
						<div class="cleaner"></div> 
						<a class="labels">Phone No:<span>*</span></a>
	                    <label for="stream" class="bh-visually-hidden">Stream</label><input type="text" id="stream" name="stream" maxlength="10" class="in_field"/> 
					
						
	                    <label for="phone2" class="bh-visually-hidden">Stream</label><input type="text" id="phone2" name="stream" maxlength="10" class="in_field" style="border-color:#;display:none;"/> 
	                    <input type="hidden" id="txtCardNumber" name="txtCardNumber" style="display:none;" />
						<div class="cleaner_h5"></div>
						<a class="labels">Phy Add:</a>
	                    <label for="house" class="bh-visually-hidden">House</label><input type="text" id="house" name="house" class="in_field" style="text-transform:uppercase;"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">Email:</a>
	                    <label for="course" class="bh-visually-hidden">Course</label><input type="text" id="course" name="course" class="in_field"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">B.Group:</a>
	                    <label for="bgroup" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup" name="bgroup" style="float:right; padding:2px 5px">
						<option value="">None</option>
						<option value="A Rh+">A Rh+</option>
						<option value="A Rh-">A Rh-</option>
						<option value="B Rh+">B Rh+</option>
						<option value="B Rh-">B Rh-</option>
						<option value="AB Rh+">AB Rh+</option>
						<option value="AB Rh-">AB Rh-</option>
						<option value="O Rh+">O Rh+</option>
						<option value="O Rh-">O Rh-</option>
						</select>';


			 echo '</div>';

			echo '<div id="personal">';
				  echo '<h5>Next Of Kin</h5>';
				  echo '<div class="cleaner"></div>
						<a class="labels">Names:</a>
	                    <label for="gname" class="bh-visually-hidden">Gname</label><input type="text" id="gname" name="gname" class="in_field" style="text-transform:uppercase"/>
						<div class="cleaner_h5"></div>
						 <a class="labels">R-ship:</a>
	                    <label for="rship" class="bh-visually-hidden">Rship</label><select class="select" id="rship" name="rship" style="float:right">
						<option value="">None</option>
						<option value="Father">Father</option>
						<option value="Mother">Mother</option>
						<option value="Husband">Husband</option>
						<option value="Wife">Wife</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Uncle">Uncle</option>
						<option value="Aunt">Aunt</option>
						<option value="Cousin">Cousin</option>
						<option value="Son">Son</option>
						<option value="Daughter">Daughter</option>
						<option value="Others">Others</option>
						</select> 
						<div class="cleaner_h5"></div>
						<a class="labels">Phone No:<span>*</span></a>
	                    <label for="gphone" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone" name="gphone" maxlength="10" class="in_field"/> 
						<div class="cleaner_h5"></div>
						<a class="labels" style="display:;">Phone No[2]:</a>
	                    <label for="geno" class="bh-visually-hidden">Geno</label><input type="text" id="geno" name="geno" maxlength="10" class="in_field" style="display:;"/> 
						<div class="cleaner_h5" style="display:;"></div>
						<a class="labels" style="display:;">Address:</a>
	                    <label for="gaddress" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress" name="gaddress" class="in_field" style="display:;"/> 
						<div class="cleaner_h5"></div>
							
						<a class="labels">Clinic:<span>*</span></a>
	                    <label for="typeclinics" class="bh-visually-hidden">Typeclinics</label><select class="select" id="typeclinics" name="typeclinics" style="float:right">
						<option value="">select clinic</option>
						<option value="ENT">ENT</option>
						<option value="NONE">NONE</option>
						<option value="DM">DIABETIC</option>
						<option value="HTN">HYPERTENSIVE</option>
						<option value="DM-HTN">DIABETIC AND HYPERTENSIVE</option> 
						</select> <div class="cleaner"></div>';

						echo'<div class="cleaner_h5"></div>
						<a class="labels">Acc Type:<span>*</span></a>
						<label for="acctype" class="bh-visually-hidden">Acc Type:</label><select class="select" id="acctype" style="float:right;">
						<option value="">select account..</option>';
					$result =mysqli_query($db, "SELECT Id,Name,Initials FROM tblbillintypes WHERE Status=1 ORDER BY Id ASC");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
					echo"<option value=\"".stripslashes($row['Initials'])."\">".stripslashes($row['Name'])."</option>";
							}
							echo'</select>';
	
					
	echo'<div class="cleaner_h5"></div>';	
				   echo'<label for="patcategory" class="bh-visually-hidden">Text field</label><select class="select" id="patcategory" style="float:right;display:none;">
						<option selected="selected" value="NORMAL">Normal</option>
						</select>';

	echo'<div class="cleaner_h5"></div>';	
							// echo '<h5>Consultations Fee</h5>';
							// echo '<div class="cleaner"></div>';



			 echo '</div>';

			echo '<div id="personal">';
					  //echo '<div class="cleaner_h5"></div>';
					  echo ' <h5>insurance scheme</h5>';
					  //echo '<div class="ui_widget"  style="margin-right:25px;float:; display:" id="acdiv2">	';
						echo '<div class="cleaner_h5"></div>';
						echo '<a class="labels">Insurer:</a>';
						echo '<div class="ui-widget" style="margin-right:25px; float:right">';
						echo '<label for="currentins" class="bh-visually-hidden">Insurer:</label><select id="currentins" style="width:140px; margin-right:40px;">';
							echo '<option value="">Select one...</option>';
						$resulta =mysqli_query($db, "select CustomerId, CustomerName, PatientId from creditcustomers where PatientId=0 and CustomerName!='' order by CustomerName");
						$num_resultsa = mysqli_num_rows($resulta);	
						for ($i=0; $i <$num_resultsa; $i++) {
							$rowa=mysqli_fetch_array($resulta);
							echo"<option value=\"".stripslashes($rowa['CustomerId'])."ÃÂÃÂ¸".stripslashes($rowa['CustomerName'])."\">".stripslashes($rowa['CustomerName'])."</option>";	
						}
							echo '</select>';
						echo ' </div>';

							
							echo ' <div class="cleaner_h5"></div>';
							echo ' <a class="labels" style="margin-left:2px">Ref/CardNo:</a>';
							echo ' <label for="ref76" class="bh-visually-hidden">Gaddress</label><input type="text" id="ref76" name="gaddress" class="in_field" style="text-transform:uppercase"/>'; 

							echo ' <div class="cleaner_h5"></div>';
							echo ' <a class="labels" style=";display:none;">Company:</a>';
							echo ' <input type="hidden" id="company" name="" class="in_field"  placeholder="company" style="text-transform:uppercase;display:none;"/>';
							echo ' <label for="alergy" class="bh-visually-hidden">Company:</label><textarea id="alergy" style="text-transform:uppercase;height:20px;display:none"></textarea>';
							echo ' <div class="cleaner"></div>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <label for="insid" class="bh-visually-hidden">Oname</label><input type="text" id="insid" name="oname"  class="in_field" style="display:none;width:20px;"/>';
						echo ' <label for="insname" class="bh-visually-hidden">Oname</label><input type="text" id="insname" name="oname"  class="in_field" style="text-transform:uppercase;display:none;width:20px;"/>';

						echo'<h5>Employer Details</h5>';
							echo ' <a class="labels">Employer:</a>';
							echo ' <label for="tcr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tcr" name="gaddress" class="in_field" style="text-transform:uppercase;"/>'; 
							echo ' <div class="cleaner_h5"></div>';
							echo ' <a class="labels">Emp. No:</a>';
							echo ' <label for="tdr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tdr" name="gaddress" class="in_field" style="text-transform:uppercase;"/>'; 



			 echo '</div>';

			echo '<div id="personal">';
		    echo '</form>';
			echo '<h5>Upload Photo</h5>';
			echo '<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">';
					 echo '<dd class="custuploadblock_js">';
					 echo '<label for="photoupload" class="bh-visually-hidden">Image</label><input style="opacity:0; float:left;" name="image" id="photoupload" class="transfileform_js" type="file">';
					 echo '</dd>';
					 echo '<iframe name="leiframe" id="leiframe" class="leiframe"></iframe>';
	            	 echo '<input type="hidden" id="stamp" name="stamp" value="'.$pntno.'"/>';
					 echo '<input type="hidden" id="id" name="id"  value="1"/>';
					 echo '<div class="cleaner_h20"></div>';
					 echo '<input type="submit" value="upload" id="send" style="margin-left:50px; float:left; cursor:pointer"class="in_field"/>';
					
			 echo '</form>';
					 echo '<div class="cleaner_h40"></div>';
					 echo '<div class="cleaner_h20"></div>';
					 echo '<div id="newstudent" style="float:right; margin-right:20px;height:20px; "></div>';

			 echo '</div>';






	    echo '</div>';
	 echo '</div>';


	break;
	case 2:
		echo"<script>$('#itemname').parent().find('input:first').focus().width(230);</script>";
//$result = mysqli_query($db, "insert into log values('0','".$username." accesses stock daily summary report panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		echo'<div id="modalDiv"></div>';
		echo'<div id="alertDiv" style="height:150px">

				<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
					<h5 style="margin-right:10px; color:#fff">Stock Daily Sum. Pharmacy
					<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
			    </div>

			<div class="cleaner_h5"></div>';

	 echo' <div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">From:</a>
			<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
			<div class="cleaner_h5"></div>

			<a class="labels" style="margin-left:20px">To:</a>
			<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
			<div class="cleaner"></div>

			<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px; display:none;" name="viewall" value="1">
			<a class="labels" style="margin-left:10px; float:left; display:none;">View All</a>
			<div class="cleaner_h5"></div>

			<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
			<input type="button" value="Submit" style="float:right; margin-right:10px; cursor:pointer; width:80px" class="select" onclick="generatedailystock();"/>
			<div class="cleaner"></div>

		</div>';


	break;
	case 3:
				$stamp=date('Ymd');
				echo"<script>$('#cons23').parent().find('input:first').focus();</script>";
			echo'<div id="modalDiv2"></div>';
		echo'<div id="mon" style="min-height:110px;max-height:320px;  width:320px;">';

			echo'<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
				echo"<h5 style=\"margin-right:10px; color:#fff\">NEW PATIENT:";
					echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
					echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()">';
				echo'</h5>';
			echo'</div>';
					
		echo '<div class="col-6 col-md" style="margin-left:20px;">';
		    echo '<h5>Operations</h5>';
		    echo '<div class="cleaner_h5"></div>';
		    echo '<ul>';
					 	$arr=array();
						$result =mysqli_query($db, "select * from accesstbl");
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$var=stripslashes($row[$usertype]);
							$code=stripslashes($row['AccessCode']);
							$arr[$code]=$var;
						}

	if($arr[101]=='YES'){echo '<li><a onclick="newpatientreg();" style="font-size:15px;">ADD PATIENT [NORMAL]</a></li>';}
	else{echo '<li style="color:#ccc;display:none;"><a style="font-size:15px;">ADD PATIENT [NORMAL]</a></li>';}

	if($arr[210]=='YES'){ echo '<li><a onclick="newcustompatient();" style="font-size:15px;">ADD PATIENT [CUSTOM]</a></li>';}
	else{echo '<li style="color:#ccc;display:none;"><a style="font-size:15px;">ADD PATIENT [CUSTOM]</a></li>';}
				
			 echo '</ul>';
		echo '</div>';


	      echo'</div>';
	    echo'</div>';
	echo'</div>';
				
	break;

	case 4:

	$result =mysqli_query($db, "select auto,pntno from patients order by auto desc limit 0,1");
	$row=mysqli_fetch_array($result);
	 $old_patient_id=stripslashes($row['auto'])+1;
	if(mysqli_num_rows($result)==0){$pntno=1;
		}else {
			$pntno=stripslashes($row['pntno'])+1;	}
		echo"<script>$('#currentins').parent().find('input:first').width(140);
		$('#newreg76').parent().find('input:first').width(140);
		$('#bnamempesa76').parent().find('input:first').width(140);
		$('#cname76').parent().find('input:first').width(140);
		</script>";
		echo'<script>document.onkeydown = keydown;
		function keydown(evt){
		if (!evt) evt = event;
		if (evt.keyCode==121){ //f2
		evt.preventDefault();
	   addnewcustompat();
	   }
	   if (evt.keyCode==112){ //f2
		evt.preventDefault();
	   help3();
	   }
		}
		 </script>';
	 echo' <label for="tdate" class="bh-visually-hidden">Text field</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">';	
	 echo' <div id="page">';	
		echo'<div id="newstude">';
			 echo '<h2 style="float:left; padding:5px 5px 0 0; margin:0;">New Patient Information (Custom)</h2>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Help" id="submit" style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help3();"/>';
echo '</div>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>';
echo '</div>';

echo '<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;"></div>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewcustompat();"/>'; 
echo '</div>';

	 echo '<div class="cleaner" style="border-bottom:2px solid #333"></div>';
			echo '<form method="post" name="personal_form" action="#">';
			echo '<input type="hidden" name="post" value="Send" />';
			echo '<div id="personal">';
			    echo ' <h5>Personal Details</h5>';
				echo ' <a class="labels" style="display:">Patient No:<span>*</span></a>
	            <label for="old_patient_id" class="bh-visually-hidden">Field</label><input type="text" id="old_patient_id" name="field" class="in_field" value="'.$old_patient_id.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/> 
	                    <label for="regn" class="bh-visually-hidden">Field</label><input type="text" id="regn" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:;"/> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels">1st Name:<span>*</span></a>
	                    <label for="fname" class="bh-visually-hidden">Field</label><input type="text" id="fname" name="field" maxlength="15" class="in_field" style="text-transform:uppercase"/>';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels">2nd Name:<span>*</span></a>
	                 <label for="oname" class="bh-visually-hidden">Field</label><input type="text" id="oname" name="field" maxlength="15"class="in_field" style="text-transform:uppercase"/> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels">3rd:</a>
	                  <label for="lname" class="bh-visually-hidden">Field</label><input type="text" id="lname" name="field" class="in_field" maxlength="15" style="text-transform:uppercase;width:77px;margin-left:5px;float:left"/> ';
				  //echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="margin-left:5px">4th:</a>
	                    <label for="fourthname" class="bh-visually-hidden">Field</label><input type="text" id="fourthname" name="field" class="in_field"  maxlength="15" style="text-transform:uppercase;width:77px;margin-left:5px;float:left"/> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels">IDNumber:<span>*</span></a>								
	                    <label for="regnid" class="bh-visually-hidden">Field</label><input type="text" id="regnid" name="field"  onkeyup="validatenum("regnid")" class="in_field" maxlength="8" style="border-color:#; "/> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels">D.o.b:<span>*</span></a>
	<input id="dob" name="dob" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10">';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels">Age:<span>*</span></a>
	<label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" class="in_field" style="border-color:var(--color-danger, #DC2626);margin-left:5px;" /> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="margin-right:30px">Gender:</a>
	                    <label for="maleGender" class="bh-visually-hidden">Gender</label><input  id="maleGender" name="gender" type="radio" value="male" class="radio" checked="checked">Male.
						 <label for="femaleGender" class="bh-visually-hidden">Gender</label><input  id="femaleGender" name="gender" type="radio" value="female" class="radio">Female.';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels">Phone No:</a>
	                    <label for="stream" class="bh-visually-hidden">Stream</label><input type="text" id="stream" name="stream" maxlength="10" class="in_field"/> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<label for="phone2" class="bh-visually-hidden">Stream</label><input type="text" id="phone2" name="stream" maxlength="10" class="in_field" style="border-color:#;display:none;"/> ';
				  //echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="display:;">Phy Add:</a>
	                    <label for="house" class="bh-visually-hidden">House</label><input type="text" id="house" name="house" class="in_field" style="text-transform:uppercase;display:;"/> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="display:;">Email:</a>
	                    <label for="course" class="bh-visually-hidden">Course</label><input type="text" id="course" name="course" class="in_field" style="display:;"/> ';
				  echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="display:;">B.Group:</a>
	                    <label for="bgroup" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup" name="bgroup" style="float:right; display:; padding:2px 5px">
						<option value="">None</option>
						<option value="A Rh+">A Rh+</option>
						<option value="A Rh-">A Rh-</option>
						<option value="B Rh+">B Rh+</option>
						<option value="B Rh-">B Rh-</option>
						<option value="AB Rh+">AB Rh+</option>
						<option value="AB Rh-">AB Rh-</option>
						<option value="O Rh+">O Rh+</option>
						<option value="O Rh-">O Rh-</option>
						</select>';


			 echo '</div>';

			echo '<div id="personal">';
				  //echo '<h5>Next Of Kin</h5>';
				  //echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="display:none">Names:</a>
	                    <label for="gname" class="bh-visually-hidden">Gname</label><input type="text" id="gname" name="gname" class="in_field" style="text-transform:uppercase;display:none"/>';
				  //echo'<div class="cleaner_h5"></div>';
				  echo'<a class="labels" style="display:none">R-ship:</a>
	                    <label for="rship" class="bh-visually-hidden">Rship</label><select class="select" id="rship" name="rship" style="float:right;display:none">
						<option value="">None</option>
						<option value="Father">Father</option>
						<option value="Mother">Mother</option>
						<option value="Husband">Husband</option>
						<option value="Wife">Wife</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Uncle">Uncle</option>
						<option value="Aunt">Aunt</option>
						<option value="Cousin">Cousin</option>
						<option value="Son">Son</option>
						<option value="Daughter">Daughter</option>
						<option value="Others">Others</option>
						</select> ';
				  //echo'<div class="cleaner_h5"></div>';
				  echo'<a class="labels" style="display:none">Phone No:</a>
	                    <label for="gphone" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone" name="gphone" maxlength="10" class="in_field" style="display:none"/> ';
				  //echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="display:none;">Phone No[2]:</a>
	                    <label for="geno" class="bh-visually-hidden">Geno</label><input type="text" id="geno" name="geno" maxlength="10" class="in_field" style="display:none;"/> ';
				  //echo'<div class="cleaner_h5"></div>';
				  echo '<div class="cleaner_h5" style="display:none;"></div>';
				  //echo'<div class="cleaner_h5"></div>';
				  echo '<a class="labels" style="display:none;">Address:</a>
	                    <label for="gaddress" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress" name="gaddress" class="in_field" style="display:none;"/> 
						<div class="cleaner_h5" style="display:none;"></div>';
						//echo'<div class="cleaner_h5"></div>';
				  //echo'<div class="cleaner_h5"></div>';
						  //echo '<div class="cleaner_h5"></div>';
						  echo ' <h5>insurance scheme</h5>';
						  //echo '<div class="ui_widget"  style="margin-right:25px;float:; display:" id="acdiv2">	';
							echo '<div class="cleaner_h5"></div>';
							echo '<a class="labels">Insurer:</a>';
							echo '<div class="ui-widget" style="margin-right:25px; float:right">';
							echo '<label for="currentins" class="bh-visually-hidden">Insurer:</label><select id="currentins" style="width:140px; margin-right:40px;">';
								echo '<option value="">Select one...</option>';
							$resulta =mysqli_query($db, "select CustomerId, CustomerName, PatientId from creditcustomers where PatientId=0 and CustomerName!='' order by CustomerName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo"<option value=\"".stripslashes($rowa['CustomerId'])."ÃÂÃÂ¸".stripslashes($rowa['CustomerName'])."\">".stripslashes($rowa['CustomerName'])."</option>";	
							}
								echo '</select>';
							echo ' </div>';

								//echo ' </div>';
								// echo ' <div id="acdiv3" style="display:none">';
								echo ' <div class="cleaner_h5"></div>';
								echo ' <a class="labels" style="margin-left:2px">Ref/CardNo:</a>';
								echo ' <label for="ref76" class="bh-visually-hidden">Gaddress</label><input type="text" id="ref76" name="gaddress" class="in_field" style="text-transform:uppercase"/>'; 
								// echo ' </div>';


								echo ' <div class="cleaner_h5"></div>';
								echo ' <a class="labels" style=";display:none;">Company:</a>';
								echo ' <input type="hidden" id="company" name="" class="in_field"  placeholder="company" style="text-transform:uppercase;display:none;"/>';
								echo ' <label for="alergy" class="bh-visually-hidden">Company:</label><textarea id="alergy" style="text-transform:uppercase;height:20px;display:none"></textarea>';

							echo ' <label for="insid" class="bh-visually-hidden">Oname</label><input type="text" id="insid" name="oname" class="in_field" style="display:none;width:20px;"/>';
							echo ' <label for="insname" class="bh-visually-hidden">Oname</label><input type="text" id="insname" name="oname" class="in_field" style="text-transform:uppercase;display:none;width:20px;"/>';

					
	echo'<div class="cleaner_h5"></div>';	
				   echo'<label for="patcategory" class="bh-visually-hidden">Text field</label><select class="select" id="patcategory" style="float:right;display:none;">
						<option value="NORMAL">Normal</option>
						<option selected="selected" value="CUSTOM">Custom</option>
						</select>';

	echo'<div class="cleaner_h5"></div>';


				  echo '<h5>START NEW CONSULTATION</h5>';
				 // echo '<h5>CLINIC</h5>';

	echo'<div class="cleaner_h5"></div>
								<a class="labels">Acc Type:<span>*</span></a>
								<label for="acctype" class="bh-visually-hidden">Acc Type:</label><select class="select" id="acctype" style="float:right;">
								<option value="OTC" selected="selected">OTC</option>
								</select>';
	

						  echo '<div class="cleaner_h5"></div>';
				  echo '<a class="labels">Clinic:<span>*</span></a>
                                <label for="typeclinics" class="bh-visually-hidden">Typeclinics</label><select  class="select" id="typeclinics" name="typeclinics" style="float:right;">';
						$result =mysqli_query($db, "SELECT id,Name FROM clinics ORDER BY id DESC");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
				echo"<option value=\"".stripslashes($row['id'])."\">".stripslashes($row['Name'])."</option>";
								}
			   				echo'</select>';
	
						  echo '<div class="cleaner_h5"></div>';
			 echo'<div class="ui-widget">
					<a class="labels">Send To:<span>*</span></a>
					<label for="sendto" class="bh-visually-hidden">Send To:</label><select class="select" id="sendto" style="float:right;">';
				                $result =mysqli_query($db, "SELECT id,name FROM sendto WHERE id NOT IN ('1','2','3','4','5','9','10','13') ORDER BY id ASC");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
				   					echo"<option value=\"".stripslashes($row['id'])."\">".stripslashes($row['name'])."</option>";
								}
			   echo'</select>
				</div>';
			echo'<div class="cleaner_h5"></div>';
				// echo"<input type=\"button\" value=\"Send Patient\" id=\"submit\" style=\"margin-left:100px; float:left; cursor:pointer;width:100px\" class=\"in_field\" onclick=\"addcustompresc();\"/>";		


						 echo'<div class="cleaner_h5"></div>';
	

			 echo '</div>';

			echo '<div id="personal">';
				echo ' <label for="tcr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tcr" name="gaddress" class="in_field" style="text-transform:uppercase;display:none"/>'; 
				echo ' <label for="tdr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tdr" name="gaddress" class="in_field" style="text-transform:uppercase;display:none"/>'; 
				echo ' <h5>Triage Analysis</h5>';
						echo '<a class="labels">Temp:</a>';
                        echo ' <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"  class="in_field" value="0" style="width:30px; float:left; margin-left:50px"/>';
						echo ' <div style="float:left; margin-top:2px"><a class="labels" style="font-size:5px; margin-top:0px;font-weight:bold; margin-left:5px">0</a></div>';
						echo ' <div style="float:left; margin=left:3px"><a style="font-size:11px;font-weight:bold;"  class="labels">C</a></div>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">B.P:</a>';
                        echo ' <div style="width:40px; float:left;margin-left:65px; padding:1px " class="in_field">';
						echo ' <div style="float:left; border-bottom:1px solid #333; width:35px"><label for="bp1" class="bh-visually-hidden">Oname</label><input type="text" id="bp1" name="oname" value="0" style="width:25px; float:left;background:none;font-size:11px; margin-left:5px; margin-top:0px;margin-bottom:2px;text-align:center"/> </div>';
						echo ' <div class="cleaner"></div>';
						echo ' <div style="float:left"><label for="bp2" class="bh-visually-hidden">Oname</label><input type="text" id="bp2" name="oname" value="0" style="width:25px; float:left;background:none;font-size:11px; margin-left:5px;  margin-top:2px;text-align:center"/>  </div>';
						echo ' </div>';
						
						echo ' <a class="labels" style="font-weight:bold; margin-left:5px; margin-top:20px">mmHg</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">Weight:</a>';
                        echo ' <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname" class="in_field" value="0" style="width:30px; float:left; margin-left:50px"/>';
						echo ' <a class="labels" style="font-weight:bold; margin-left:5px">Kgs</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">Resp. Rate:</a>';
                        echo ' <label for="resprate" class="bh-visually-hidden">Oname</label><input type="text" id="resprate" name="oname" value="0" class="in_field"style="width:30px; float:left; margin-left:30px" /> ';
						echo ' <a class="labels" style="font-weight:bold; margin-left:5px">Breaths/Min</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">Pulse Rate:</a>';
                        echo ' <label for="pulserate" class="bh-visually-hidden">Oname</label><input type="text" id="pulserate" name="oname" value="0" class="in_field"  style="width:30px; float:left; margin-left:25px" /> ';
					    echo ' <a class="labels" style="font-weight:bold; margin-left:5px">Beats/Min</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">R.B.S:</a>';
                        echo ' <label for="rbs" class="bh-visually-hidden">Oname</label><input type="text" id="rbs" name="oname" class="in_field"   style="width:30px; float:left; margin-left:58px" />';
					    echo ' <a class="labels" style="font-weight:bold; margin-left:5px">mMoles/Ltr</a>';
						echo ' <div class="cleaner_h5"></div>';


						echo ' <a class="labels" style="margin-right:5px">New Screening this calender year:</a>';
                        echo ' <label for="yestohyper" class="bh-visually-hidden">Gender2</label><input id="yestohyper" name="gender2" type="radio" value="Yes" class="radio">Y.';
						echo ' <label for="notohyper" class="bh-visually-hidden">Gender2</label><input id="notohyper" name="gender2" type="radio" value="No" class="radio" checked="checked">N.';
						echo ' <div class="cleaner"></div>';


					    echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels" style="margin-right:30px">Known Hypertensive:</a>';
                        echo ' <label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input id="yesknownhyper" name="gender3" type="radio" value="Yes" class="radio">Y.';
						echo ' <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input id="noknownhyper" name="gender3" type="radio" value="No" class="radio" checked="checked">N.';
						echo ' <div class="cleaner"></div> ';


					    echo ' <div class="cleaner_h5"></div>';
					    echo ' <a class="labels" style="margin-right:30px">Taking Medicine:</a>';
                        echo ' <label for="yestomeds" class="bh-visually-hidden">Gender4</label><input id="yestomeds" name="gender4" type="radio" value="Yes" class="radio">Y.';
						echo ' <label for="notomeds" class="bh-visually-hidden">Gender4</label><input id="notomeds" name="gender4" type="radio" value="No" class="radio" checked="checked">N.';
						echo ' <div class="cleaner"></div>';






			 echo '</div>';

			echo '<div id="personal">';
		    echo '</form>';
			echo '<h5>Upload Photo</h5>';
			echo '<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">';
					 echo '<dd class="custuploadblock_js">';
					 echo '<label for="photoupload" class="bh-visually-hidden">Image</label><input style="opacity:0; float:left;" name="image" id="photoupload" class="transfileform_js" type="file">';
					 echo '</dd>';
					 echo '<iframe name="leiframe" id="leiframe" class="leiframe"></iframe>';
	            	 echo '<input type="hidden" id="stamp" name="stamp" value="'.$pntno.'"/>';
					 echo '<input type="hidden" id="id" name="id"  value="1"/>';
					 echo '<div class="cleaner_h20"></div>';
					 echo '<input type="submit" value="upload" id="send" style="margin-left:50px; float:left; cursor:pointer"class="in_field"/>';
					
			 echo '</form>';
					 echo '<div class="cleaner_h40"></div>';
					 echo '<div class="cleaner_h20"></div>';
					 echo '<div id="newstudent" style="float:right; margin-right:20px;height:20px; "></div>';

			 echo '</div>';






	    echo '</div>';
	 echo '</div>';


	break;
	case 5:
	echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses custom departmental report panel-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
	echo'<div id="modalDiv"></div>';
echo'<div id="alertDiv" style="min-height:200px; width:320px">
		<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
	<h5 style="margin-right:10px; color:#fff">CUSTOM DEPARTMENTAL REPORTS
	<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
	</div>';
	echo'<div class="cleaner_h5"></div>';
	echo '<div class="cleaner_h5"></div>';
	echo'<a class="labels" style="margin-left:20px">Department:<span>*</span></a>';
	 echo'<div class="ui-widget" style="margin-left:10px;float:left; width:270px">
			<label for="sendto" class="bh-visually-hidden">Department:</label><select class="select" id="sendto" style="width:260px; margin-left:10px;">';
                $result =mysqli_query($db, "SELECT CatId,ItemCat,Type FROM categories WHERE Type='SERVICE' ORDER BY ItemCat ASC");
				$num_results = mysqli_num_rows($result);
				for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
   					echo"<option value=\"".htmlsan(safe_encode(stripslashes($row['ItemCat'])))."\">".stripslashes($row['ItemCat'])."</option>";
				}
				echo'<option value="'.htmlsan(safe_encode('ADMINISTRATION')).'">ADMINISTRATION</option>';
				echo'<option value="'.htmlsan(safe_encode('DISPENSING')).'">DISPENSING</option>';
				echo'<option value="'.htmlsan(safe_encode('PHARMACY')).'">PHARMACY</option>';
				echo'<option value="'.htmlsan(safe_encode('All')).'">All</option>';
	   echo'</select>
		</div>';
	echo'<div class="cleaner_h5"></div>';
	echo'<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:20px">From:</a>
	<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:20px">To:</a>
	<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
		<div class="cleaner"></div>
		<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
	<input style="display:none" id="rid" value="'.htmlsan(safe_encode(606834)).'" type="hidden">	
		<a class="labels" style="margin-left:10px; float:left">View All</a>
		
		<div class="cleaner_h5"></div>
						<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
						<input type="button" value="Submit" style="float:right; margin-right:10px; 
						cursor:pointer; width:80px" class="select" onclick="enterpharmrep3();"/>
		<div class="cleaner_h5"></div>
			
			</div>';

	break;
		
	case 6:
		echo"<script>$('#itemname').parent().find('input:first').focus().width(230);</script>";
$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses stock daily summary report panel-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
		echo'<div id="modalDiv"></div>';
		echo'<div id="alertDiv" style="height:250px">

				<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
					<h5 style="margin-right:10px; color:#fff">Stock Daily Summary Admin
					<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
			    </div>

			<div class="cleaner_h5"></div>';

			echo'<a class="labels" style="margin-left:20px">Dept Name:</a>
			<div class="cleaner_h5"></div>
			<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="itemname" class="bh-visually-hidden">Dept Name:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">';
				echo'<option value="'.$userdep.'">'.$userdep.'</option>';
				echo'</select>
			</div>';

	 echo' <div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">From:</a>
			<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
			<div class="cleaner_h5"></div>

			<a class="labels" style="margin-left:20px">To:</a>
			<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
			<div class="cleaner"></div>

			<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px; display:none;" name="viewall" value="1">
			<a class="labels" style="margin-left:10px; float:left; display:none;">View All</a>
			<div class="cleaner_h5"></div>

			<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
			<input type="button" value="Submit" style="float:right; margin-right:10px; cursor:pointer; width:80px" class="select" onclick="generatedailystock2();"/>
			<div class="cleaner"></div>

		</div>';

	break;
	case 7:
		echo"<script>$('#itemname').parent().find('input:first').focus().width(230);</script>";
//$result = mysqli_query($db, "insert into log values('0','".$username." accesses stock daily summary report panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		echo'<div id="modalDiv"></div>';
		echo'<div id="alertDiv" style="height:250px">

				<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
					<h5 style="margin-right:10px; color:#fff">Dispensing Drug Log
					<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
			    </div>

			<div class="cleaner_h5"></div>';

			echo'<a class="labels" style="margin-left:20px">Dept Name:</a>
			<div class="cleaner_h5"></div>
			<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="itemname" class="bh-visually-hidden">Dept Name:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">';
				if($usertype=='Admin'||$usertype=='Store'||$usertype=='Pharm'||$usertype=='ChiefCashier'){
					echo'<option value="">Select one...</option>';
					$result =mysqli_query($db, "select * from items order by ItemName");
					$num_results = mysqli_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
						$row=mysqli_fetch_array($result);
					echo"<option value=\"".stripslashes($row['ItemCode'])."\">".stripslashes($row['ItemName'])."</option>";
					}
				}else{echo'<option value="">Nothing..</option>';}
				echo'</select>
			</div>';

	 echo' <div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">From:</a>
			<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
			<div class="cleaner_h5"></div>

			<a class="labels" style="margin-left:20px">To:</a>
			<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
			<div class="cleaner"></div>

			<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px; display:;" name="viewall" value="1">
			<a class="labels" style="margin-left:10px; float:left; display:;">View All</a>
			<div class="cleaner_h5"></div>

			<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
			<input type="button" value="Submit" style="float:right; margin-right:10px; cursor:pointer; width:80px" class="select" onclick="generatedlog();"/>
			<div class="cleaner"></div>

		</div>';
	break;
	
	case 8:
		echo"<script>$('#itemname').parent().find('input:first').focus().width(230);</script>";
		echo'<div id="modalDiv"></div>';
		echo'<div id="alertDiv" style="height:250px">

				<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
					<h5 style="margin-right:10px; color:#fff">Admin Drug Log
					<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
			    </div>

			<div class="cleaner_h5"></div>';

			echo'<a class="labels" style="margin-left:20px">Dept Name:</a>
			<div class="cleaner_h5"></div>
			<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="itemname" class="bh-visually-hidden">Dept Name:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">';
				if($usertype=='Admin'||$usertype=='Store'||$usertype=='Pharm'||$usertype=='ChiefCashier'){
					echo'<option value="">Select one...</option>';
					$result =mysqli_query($db, "select * from items order by ItemName");
					$num_results = mysqli_num_rows($result);
					for ($i=0; $i <$num_results; $i++) {
						$row=mysqli_fetch_array($result);
					echo"<option value=\"".stripslashes($row['ItemCode'])."\">".stripslashes($row['ItemName'])."</option>";
					}
				}else{echo'<option value="">Nothing to see here men....</option>';}
				echo'</select>
			</div>';

	 echo' <div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">From:</a>
			<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
			<div class="cleaner_h5"></div>

			<a class="labels" style="margin-left:20px">To:</a>
			<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
			<div class="cleaner"></div>

			<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px; display:;" name="viewall" value="1">
			<a class="labels" style="margin-left:10px; float:left; display:;">View All</a>
			<div class="cleaner_h5"></div>

			<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
			<input type="button" value="Submit" style="float:right; margin-right:10px; cursor:pointer; width:80px" class="select" onclick="generateAdminlog();"/>
			<div class="cleaner"></div>

		</div>';
		break;
		
	case 9:

	$result =mysqli_query($db, "select auto,pntno from patients order by auto desc limit 0,1");
	$row=mysqli_fetch_array($result);
	 $old_patient_id=stripslashes($row['auto'])+1;
	if(mysqli_num_rows($result)==0){$pntno=1;
		}else {
			$pntno=stripslashes($row['pntno'])+1;	}
		echo"<script>$('#currentins').parent().find('input:first').width(140);
		$('#newreg76').parent().find('input:first').width(140);
		$('#bnamempesa76').parent().find('input:first').width(140);
		$('#cname76').parent().find('input:first').width(140);
		</script>";
		echo'<script>document.onkeydown = keydown;
		function keydown(evt){
		if (!evt) evt = event;
		if (evt.keyCode==121){ //f2
		evt.preventDefault();
	   addnewemergencypat();
	   }
	   if (evt.keyCode==112){ //f2
		evt.preventDefault();
	   help3();
	   }
		}
		 </script>';
	 echo' <label for="tdate" class="bh-visually-hidden">Text field</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">';	
	 echo' <div id="page">';	
		echo'<div id="newstude">';
			 echo '<h2 style="float:left; padding:5px 5px 0 0; margin:0;">New Patient Information [EMERGENCY]</h2>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Help" id="submit" style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help3();"/>';
echo '</div>';
 
echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>';
echo '</div>';

echo '<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;"></div>';

echo '<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
echo '<input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewemergencypat();"/>'; 
echo '</div>';

	 echo '<div class="cleaner" style="border-bottom:2px solid #333"></div>';
			echo '<form method="post" name="personal_form" action="#">';
			echo '<input type="hidden" name="post" value="Send" />';
			echo '<div id="personal">';
			    echo ' <h5>Personal Details</h5>';
				echo ' <a class="labels" style="display:">Patient No:<span>*</span></a>
	            <label for="oldpatientid" class="bh-visually-hidden">Field</label><input type="text" id="oldpatientid" name="field" class="in_field" value="'.$old_patient_id.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/> 
	                    <label for="regn" class="bh-visually-hidden">Field</label><input type="text" id="regn" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:;"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">1st Name:<span>*</span></a>
	                    <label for="fname" class="bh-visually-hidden">Field</label><input type="text" id="fname" name="field" class="in_field" style="text-transform:uppercase"/>
						<div class="cleaner_h5"></div>
						 <a class="labels">2nd Name:<span>*</span></a>
	                    <label for="oname" class="bh-visually-hidden">Field</label><input type="text" id="oname" name="field" class="in_field" style="text-transform:uppercase"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">3rd:</a>
	                    <label for="lname" class="bh-visually-hidden">Field</label><input type="text" id="lname" name="field" class="in_field" style="text-transform:uppercase;width:77px;margin-left:5px;float:left"/> 
	                    <a class="labels" style="margin-left:5px">4th:</a>
	                    <label for="fourthname" class="bh-visually-hidden">Field</label><input type="text" id="fourthname" name="field" class="in_field" style="text-transform:uppercase;width:77px;margin-left:5px;float:left"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">IDNumber:</a>								
	                    <label for="regnid" class="bh-visually-hidden">Field</label><input type="text" id="regnid" name="field"  onkeyup="validatenum("regnid")" class="in_field" maxlength="8" style="border-color:#; "/> 
						<div class="cleaner_h5"></div>
					
						 <a class="labels">D.o.b:<span>*</span></a>
	<input id="dob" name="dob" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10">
						<div class="cleaner_h5"></div>
						 <a class="labels">Age:<span>*</span></a>
	<label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" class="in_field" style="border-color:var(--color-danger, #DC2626);margin-left:5px;" /> 
					<div class="cleaner_h5"></div>
						 <a class="labels" style="margin-right:30px">Gender:</a>
	                    <label for="maleGender" class="bh-visually-hidden">Gender</label><input  id="maleGender" name="gender" type="radio" value="male" class="radio" checked="checked">Male.
						 <label for="femaleGender" class="bh-visually-hidden">Gender</label><input  id="femaleGender" name="gender" type="radio" value="female" class="radio">Female.
						<div class="cleaner"></div> 
						<a class="labels">Phone No:<span>*</span></a>
	                    <label for="stream" class="bh-visually-hidden">Stream</label><input type="text" id="stream" name="stream" maxlength="10" class="in_field"/> 
					
						
	                    <label for="phone2" class="bh-visually-hidden">Stream</label><input type="text" id="phone2" name="stream" maxlength="10" class="in_field" style="border-color:#;display:none;"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">Phy Add:</a>
	                    <label for="house" class="bh-visually-hidden">House</label><input type="text" id="house" name="house" class="in_field" style="text-transform:uppercase;"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">Email:</a>
	                    <label for="course" class="bh-visually-hidden">Course</label><input type="text" id="course" name="course" class="in_field"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">B.Group:</a>
	                    <label for="bgroup" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup" name="bgroup" style="float:right; padding:2px 5px">
						<option value="">None</option>
						<option value="A Rh+">A Rh+</option>
						<option value="A Rh-">A Rh-</option>
						<option value="B Rh+">B Rh+</option>
						<option value="B Rh-">B Rh-</option>
						<option value="AB Rh+">AB Rh+</option>
						<option value="AB Rh-">AB Rh-</option>
						<option value="O Rh+">O Rh+</option>
						<option value="O Rh-">O Rh-</option>
						</select>';


			 echo '</div>';

			echo '<div id="personal">';
				  echo '<h5>Next Of Kin</h5>';
				  echo '<div class="cleaner"></div>
						<a class="labels">Names:</a>
	                    <label for="gname" class="bh-visually-hidden">Gname</label><input type="text" id="gname" name="gname" class="in_field" style="text-transform:uppercase"/>
						<div class="cleaner_h5"></div>
						 <a class="labels">R-ship:</a>
	                    <label for="rship" class="bh-visually-hidden">Rship</label><select class="select" id="rship" name="rship" style="float:right">
						<option value="">None</option>
						<option value="Father">Father</option>
						<option value="Mother">Mother</option>
						<option value="Husband">Husband</option>
						<option value="Wife">Wife</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Uncle">Uncle</option>
						<option value="Aunt">Aunt</option>
						<option value="Cousin">Cousin</option>
						<option value="Son">Son</option>
						<option value="Daughter">Daughter</option>
						<option value="Others">Others</option>
						</select> 
						<div class="cleaner_h5"></div>
						<a class="labels">Phone No:</a>
	                    <label for="gphone" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone" name="gphone" maxlength="10" class="in_field"/> 
						<div class="cleaner_h5"></div>
						<a class="labels" style="display:none;">Phone No[2]:</a>
	                    <label for="geno" class="bh-visually-hidden">Geno</label><input type="text" id="geno" name="geno" maxlength="10" class="in_field" style="display:none;"/> 
						<div class="cleaner_h5" style="display:none;"></div>
						<a class="labels" style="display:none;">Address:</a>
	                    <label for="gaddress" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress" name="gaddress" class="in_field" style="display:none;"/> 
						<div class="cleaner_h5" style="display:none;"></div>
							
						<a class="labels">Clinic:<span>*</span></a>
	                    <label for="typeclinics" class="bh-visually-hidden">Typeclinics</label><select class="select" id="typeclinics" name="typeclinics" style="float:right">
						<option value="">select clinic</option>
						<option value="ENT">ENT</option>
						<option value="NONE">NONE</option>
						<option value="DM">DIABETIC</option>
						<option value="HTN">HYPERTENSIVE</option>
						<option value="DM-HTN">DIABETIC AND HYPERTENSIVE</option> 
						</select> <div class="cleaner"></div>';

						echo'<div class="cleaner_h5"></div>
						<a class="labels">Acc Type:<span>*</span></a>
						<label for="acctype" class="bh-visually-hidden">Acc Type:</label><select class="select" id="acctype" style="float:right;">
						<option value="">select account..</option>
						<option value="Normal">Normal</option>
						<option selected="selected" value="Corporate">Corporate</option>
						<option value="Insurance">Insurance</option>
						</select>';

						
				   echo'<label for="patcategory" class="bh-visually-hidden">Insurance</label><select class="select" id="patcategory" style="float:right;display:none;">
						<option selected="selected" value="EMERGENCIES">Emergency</option>
						</select>';
	

							echo '<h5>Consultations Fee</h5>';
							echo '<div class="cleaner"></div>';
							echo '<a class="labels">Mode:<span>*</span></a>';
							echo '<div class="ui_widget" style="margin-right:22px;float:right; width:150px">';
                                echo '<label for="newreg76" class="bh-visually-hidden">Mode:</label><select id="newreg76" style="float:right">';
								echo '<option value="">Select one...</option>';
								echo '<option value="Cash">Cash</option>';
								echo '<option value="Companies">Companies</option>';
								echo '<option value="Bank">Bank</option>';
								echo '</select>'; 
							  echo '<div class="cleaner"></div>';
							echo '</div>';

							echo '<div class="ui_widget"  style="margin-right:26px;float:right; display:none" id="acdiv1">';	
								echo '<div class="cleaner_h10"></div>';
								echo '<a class="labels" style="margin-right:20px;">A/c:<span>*</span></a>';				
								echo '<label for="bnamempesa76" class="bh-visually-hidden">A/c:</label><select id="bnamempesa76">';
								echo '<option value="">Select one...</option>';
										$resulta =mysqli_query($db, "select * from ledgers where type='Asset' and category='Bank'");
										$num_resultsa = mysqli_num_rows($resulta);
										for ($i=0; $i <$num_resultsa; $i++) {
										$rowa=mysqli_fetch_array($resulta);
										echo'<option value="'.stripslashes($rowa['ledgerid']).'">'.stripslashes($rowa['name']).'</option>';			
										}
								echo '</select>';
							echo '</div>';

						  echo '<div class="ui_widget"  style="margin-right:25px;float:; display:none" id="acdiv2">	';
							echo '<div class="cleaner_h5"></div>';
							echo '<a class="labels">Insurer:</a>';
							echo '<div class="ui-widget" style="margin-left:px; float:right">';
							echo '<label for="currentins" class="bh-visually-hidden">Insurer:</label><select id="currentins" style="width:140px; margin-right:40px;">';
								echo '<option value="">Select one...</option>';
							$resulta =mysqli_query($db, "select CustomerId, CustomerName, PatientId from creditcustomers where PatientId=0 and CustomerName!='' order by CustomerName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo"<option value=\"".stripslashes($rowa['CustomerId'])."ÃÂÃÂ¸".stripslashes($rowa['CustomerName'])."\">".stripslashes($rowa['CustomerName'])."</option>";	
							}
								echo '</select>';
							echo ' </div>';

								echo ' </div>';
								echo ' <div id="acdiv3" style="display:none">';
								echo ' <div class="cleaner_h5"></div>';
								echo ' <a class="labels" style="margin-left:2px">Ref/CardNo:</a>';
								echo ' <label for="ref76" class="bh-visually-hidden">Gaddress</label><input type="text" id="ref76" name="gaddress" class="in_field" style="text-transform:uppercase"/>'; 
								echo ' </div>';


								echo ' <div class="cleaner_h5"></div>';
								echo ' <a class="labels" style=";display:none;">Company:</a>';
								echo ' <input type="hidden" id="company" name="" class="in_field"  placeholder="company" style="text-transform:uppercase;display:none;"/>';
								echo ' <label for="alergy" class="bh-visually-hidden">Company:</label><textarea id="alergy" style="text-transform:uppercase;height:20px;display:none"></textarea>';
								echo ' <div class="cleaner"></div>';
								echo ' <a class="labels">Item:</a>';
								echo ' <div class="ui-widget" style="margin-right:25px; float:right">';
								echo ' <label for="cconsultfee" class="bh-visually-hidden">Item:</label><select id="cconsultfee" style="margin-left:10px;">';
								echo ' <option value="">Select one...</option>';
								//$resulta =mysqli_query($db, "select * from items where ".$_SESSION['rights']." order by ItemName");
							$resulta =mysqli_query($db, "select * from items where Category='CUSTOMERCARE' order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo"<option value=\"".stripslashes($rowa['ItemCode'])."ÃÂÃÂ¸".stripslashes($rowa['ItemName'])."ÃÂÃÂ¸".stripslashes($rowa['Category'])."ÃÂÃÂ¸".stripslashes($rowa['SalePrice'])."ÃÂÃÂ¸".stripslashes($rowa['items_category_id'])."\">".stripslashes($rowa['ItemName'])."</option>";	
							}
								echo '</select>'; 
							echo '</div>';
							echo ' <div class="cleaner_h5"></div>';
							echo ' <a class="labels">Price:</a>';
							echo ' <label for="SalePrice" class="bh-visually-hidden">Oname</label><input type="text" id="SalePrice" name="oname"  class="in_field" style="display:"/>'; 
							echo ' <label for="insid" class="bh-visually-hidden">Oname</label><input type="text" id="insid" name="oname"  class="in_field" style="display:none;width:20px;"/>';
							echo ' <label for="insname" class="bh-visually-hidden">Oname</label><input type="text" id="insname" name="oname"  class="in_field" style="text-transform:uppercase;display:none;width:20px;"/>';



			 echo '</div>';

			echo '<div id="personal">';
				echo ' <label for="tcr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tcr" name="gaddress" class="in_field" style="text-transform:uppercase;display:none"/>'; 
				echo ' <label for="tdr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tdr" name="gaddress" class="in_field" style="text-transform:uppercase;display:none"/>'; 
				echo ' <label for="ItemCode" class="bh-visually-hidden">Oname</label><input type="text" id="ItemCode" name="oname"  class="in_field" style="display:none" />';
				echo ' <label for="ItemName" class="bh-visually-hidden">Oname</label><input type="text" id="ItemName" name="oname"  class="in_field" style="display:none"/>'; 
				echo ' <label for="old_category_id" class="bh-visually-hidden">Oname</label><input type="text" id="old_category_id" name="oname"  class="in_field" style="display:none"/>';
				echo ' <label for="Category" class="bh-visually-hidden">Oname</label><input type="text" id="Category" name="oname"  class="in_field" style="display:none"/>';
				echo ' <h5>Triage Analysis</h5>';
			    //echo ' <h5>Personal Details</h5>';
				echo '<a class="labels">Temp:<span>*</span></a>';
                        echo ' <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"  class="in_field" style="width:30px; float:left; margin-left:50px"/>';
						echo ' <div style="float:left; margin-top:2px"><a class="labels" style="font-size:5px; margin-top:0px;font-weight:bold; margin-left:5px">0</a></div>';
						echo ' <div style="float:left; margin=left:3px"><a style="font-size:11px;font-weight:bold;"  class="labels">C</a></div>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">B.P:<span>*</span></a>';
                        echo ' <div style="width:40px; float:left;margin-left:65px; padding:1px " class="in_field">';
						echo ' <div style="float:left; border-bottom:1px solid #333; width:35px"><label for="bp1" class="bh-visually-hidden">Oname</label><input type="text" id="bp1" name="oname" style="width:25px; float:left;background:none;font-size:11px; margin-left:5px; margin-top:0px;margin-bottom:2px;text-align:center"/> </div>';
						echo ' <div class="cleaner"></div>';
						echo ' <div style="float:left"><label for="bp2" class="bh-visually-hidden">Oname</label><input type="text" id="bp2" name="oname" style="width:25px; float:left;background:none;font-size:11px; margin-left:5px;  margin-top:2px;text-align:center"/>  </div>';
						echo ' </div>';
						
						echo ' <a class="labels" style="font-weight:bold; margin-left:5px; margin-top:20px">mmHg</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">Weight:</a>';
                        echo ' <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname" class="in_field" style="width:30px; float:left; margin-left:50px"/>';
						echo ' <a class="labels" style="font-weight:bold; margin-left:5px">Kgs</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">Resp. Rate:</a>';
                        echo ' <label for="resprate" class="bh-visually-hidden">Oname</label><input type="text" id="resprate" name="oname" class="in_field"style="width:30px; float:left; margin-left:30px" /> ';
						echo ' <a class="labels" style="font-weight:bold; margin-left:5px">Breaths/Min</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">Pulse Rate:<span>*</span></a>';
                        echo ' <label for="pulserate" class="bh-visually-hidden">Oname</label><input type="text" id="pulserate" name="oname" class="in_field"  style="width:30px; float:left; margin-left:25px" /> ';
					    echo ' <a class="labels" style="font-weight:bold; margin-left:5px">Beats/Min</a>';
						echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels">R.B.S:</a>';
                        echo ' <label for="rbs" class="bh-visually-hidden">Oname</label><input type="text" id="rbs" name="oname" class="in_field"   style="width:30px; float:left; margin-left:58px" />';
					    echo ' <a class="labels" style="font-weight:bold; margin-left:5px">mMoles/Ltr</a>';
						echo ' <div class="cleaner_h5"></div>';


						echo ' <a class="labels" style="margin-right:5px">New Screening this calender year:</a>';
                        echo ' <label for="yestohyper" class="bh-visually-hidden">Gender2</label><input id="yestohyper" name="gender2" type="radio" value="Yes" class="radio">Y.';
						echo ' <label for="notohyper" class="bh-visually-hidden">Gender2</label><input id="notohyper" name="gender2" type="radio" value="No" class="radio" checked="checked">N.';
						echo ' <div class="cleaner"></div>';


					    echo ' <div class="cleaner_h5"></div>';
						echo ' <a class="labels" style="margin-right:30px">Known Hypertensive:</a>';
                        echo ' <label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input id="yesknownhyper" name="gender3" type="radio" value="Yes" class="radio">Y.';
						echo ' <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input id="noknownhyper" name="gender3" type="radio" value="No" class="radio" checked="checked">N.';
						echo ' <div class="cleaner"></div> ';


					    echo ' <div class="cleaner_h5"></div>';
					    echo ' <a class="labels" style="margin-right:30px">Taking Medicine:</a>';
                        echo ' <label for="yestomeds" class="bh-visually-hidden">Gender4</label><input id="yestomeds" name="gender4" type="radio" value="Yes" class="radio">Y.';
						echo ' <label for="notomeds" class="bh-visually-hidden">Gender4</label><input id="notomeds" name="gender4" type="radio" value="No" class="radio" checked="checked">N.';
						echo ' <div class="cleaner"></div>';






			 echo '</div>';

			echo '<div id="personal">';
		    echo '</form>';
			echo '<h5>Upload Photo</h5>';
			echo '<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">';
					 echo '<dd class="custuploadblock_js">';
					 echo '<label for="photoupload" class="bh-visually-hidden">Image</label><input style="opacity:0; float:left;" name="image" id="photoupload" class="transfileform_js" type="file">';
					 echo '</dd>';
					 echo '<iframe name="leiframe" id="leiframe" class="leiframe"></iframe>';
	            	 echo '<input type="hidden" id="stamp" name="stamp" value="'.$pntno.'"/>';
					 echo '<input type="hidden" id="id" name="id"  value="1"/>';
					 echo '<div class="cleaner_h20"></div>';
					 echo '<input type="submit" value="upload" id="send" style="margin-left:50px; float:left; cursor:pointer"class="in_field"/>';
					
			 echo '</form>';
					 echo '<div class="cleaner_h40"></div>';
					 echo '<div class="cleaner_h20"></div>';
					 echo '<div id="newstudent" style="float:right; margin-right:20px;height:20px; "></div>';

			 echo '</div>';






	    echo '</div>';
	 echo '</div>';


		break;
		case 10:
		//Clinic Patient Selection Interface
		$stamp=date('Ymd');
		$a=$_GET['a'];
		echo"<script>$('#cons1').parent().find('input:first').focus().width(480);</script>";
	echo'<div id="modalDiv2"></div>';
      echo'<div id="mon" style="min-height:110px; width:560px;position:absolute; top:30%; left:23%;">
		     <div id="tit" style="width:540px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
		   echo"<h5 style=\"margin-right:10px; color:#fff\">".$a."";
		    echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
		      echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()">
			   </h5></div>';
				$result =mysqli_query($db, "select * from newprescription where Dept='".$a."' and Stamp>='".date('Ymd')."' and  Stamp<='".date('Ymd')."' order by PrescId asc");
				$num_results = mysqli_num_rows($result);
			echo'<div class="cleaner_h5"></div>
				<label for="idpay" class="bh-visually-hidden">Text field</label><input class="input_field" style="display:none" id="idpay" type="text" value="95">
			<a class="labels" style="margin-left:10px">From:</a>
			<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:left; margin-left:10px; width:180px; font-size:11px" id="datepick" type="text" value="'.date('Y/m/d').'">
				<a class="labels" style="margin-left:10px">To:</a>
				<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:left; margin-left:10px; width:180px; font-size:11px" id="datepick2" type="text" value="'.date('Y/m/d').'">';		
					echo"<img alt=\"Search Consultations using these dates\" src=\"images/back2.png\" style=\"float:left; margin-left:10px;width:30px;height:30px; cursor:pointer\" title=\"Search Consultations using these dates\" onclick=\"searchpay(1,'".$a."');\"/>";
					echo'<div class="cleaner"></div>
					<div class="ui-widget" style="margin:0 10px 0 10px; float:left" id="searchpay">
							<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
					<div class="cleaner_h5"></div>
					<label for="cons1" class="bh-visually-hidden">No. of Patients:</label><select id="cons1">
						<option value="">Select one...</option>';
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.stripslashes($row['PrescId']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'</option>';
							}
				echo'</select>
				</div>
			<div class="cleaner"></div>';
			echo"<a class=\"labels\" style=\"margin-left:30px\"><strong>Today's Patients</strong></a>";
			echo'<div class="cleaner"></div>
									<div id="title" style="margin-left:10px">
									<div id="figure1" style="margin-left:0px; width:188px">Patient Name</div>
									<div id="figure1" style="width:70px">Patient No</div>
									<div id="figure1" style="width:150px">Scheme</div>
									<div id="figure1" style="width:70px">Type</div>
									</div><div class="cleaner"></div>
	            <div id="inside" style="max-height:108px; overflow-y:auto; margin-left:10px">';
					$resultb =mysqli_query($db, "select * from newprescription where Dept='".$a."' and Stamp>='".date('Ymd')."' and  Stamp<='".date('Ymd')."' order by PrescId desc");
					$num_resultsb = mysqli_num_rows($resultb);
					for ($i=0; $i <$num_resultsb; $i++) {
						$rowb=mysqli_fetch_array($resultb);
						$prescid=stripslashes($rowb['Id']);
						$prescno=stripslashes($rowb['PrescId']);
						$clientid=stripslashes($rowb['old_patient_id']);
						if(stripslashes($rowb['Status'])==2){
							echo"<div class=\"normal1\" style=\"\" onclick=\"emergpat('".$pid."',11)\">";
						}else {
							echo"<div class=\"normal2\" style=\"\" onclick=\"emergpat('".$pid."',11)\">";
						}
                 echo'<div id="figure2" style="width:188px">'.stripslashes($rowb['PatName']).'</div>
						<div id="figure2" style="width:70px">'.stripslashes($rowb['PatId']).'</div>
						<div id="figure2" style="width:150px">'.stripslashes($rowb['Complaint']).'</div>
						<div id="figure2" style="width:71px">'.stripslashes($rowb['Type']).'</div>
						</div><div class="cleaner"></div>';
		//foreach ($arr as $key => $val) {

					}
		echo'</div>
		<div class="cleaner_h5"></div>
		</div>';
		break;			
		case 11:
		$result = mysqli_query($db, "insert into log values('0','".$username." accesses Consultations Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

		$prescid=$_GET['prescid'];
		$clientid=$_GET['clientid'];
		if(isset($_GET['pid'])){ $pid=$_GET['pid']; }else{ $pid='O-'.$_GET['prescid'];}

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
					savenewpresc('".$pid."'); 
				}
			}
			</script>";
		echo"<h2  style=\"float:left; padding:5px 5px 0 0; margin:0\">".$dept."-".stripslashes($row['name'])." ".stripslashes($row['oname'])." ".stripslashes($row['lname'])." [".stripslashes($row['pntno'])."] </h2>";
				
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('patreport.php?id=1&reg=".$patid."')\" title=\"Print Patient Report\">";
		echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
		<input type="button" value="Help" id="submit"  style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help53();"/></div>
		<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
		<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
		<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
		<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">';
		echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savenewpresc('".$pid."')\"/></div>";
		echo"<script>$('#currentins').parent().find('input:first').width(130).prop('disabled',true);</script>
		<script>
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
		$('#docInpPharm1').parent().find('input:first').width(180);
		$('#widg1').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
			clearsymp();
				}
			});
			$('#widg2').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
			clearlab();
				}
			});
			$('#widg3').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
			clearrad();
				}
			});
			$('#widg4').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
			cleardiag();
				}
			});
			$('#widg5').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
			clearsurg();
				}
			});
			$('#widg6').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
			cleartreat();
				}
			});
			$('#widg7').live('keydown', function(evt) {
			if (!evt) evt = event;
			if (evt.keyCode==13){ 
			clearpresc();
				}
			});
			</script>";		
		echo'<script>
		$(function(){
		
		area3 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("history");
		area8 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("diagnosis");
		area9 = new nicEditor({fullPanel : true,maxHeight :300}).panelInstance("treatment");
		area10 = new nicEditor({fullPanel : true,maxHeight :220}).panelInstance("prescription");
		area14 = new nicEditor({fullPanel : true,maxHeight :350}).panelInstance("phyexam");
		area18 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("history2");
		});
		</script>
		<div class="cleaner" style="border-bottom:2px solid #333"></div>
				
		<div id="tabs" style="width:996px; height:433px">
		<ul>
			<li><a href="#tabs-1">Demographics</a></li>
			<li><a href="#tabs-2">Triage Analysis</a></li>
			<li><a href="#tabs-12">Past History</a></li>
			<li><a href="#tabs-3">Current History</a></li>
			<li><a href="#tabs-8">Physical Examination</a></li>
			<li><a href="#tabs-7">Diagnosis</a></li>
			<li style="display:none;"><a href="#tabs-9" style="display:none;">Theatre</a></li>
			<li><a href="#tabs-10">Pharmacy</a></li>
			<li><a href="#tabs-5">Laboratory</a></li>
			<li style="display:;"><a href="#tabs-6" style="display:;">Radiology</a></li>
			<li><a href="#tabs-18">Dressing</a></li>
			<li style="display:none;"><a href="#tabs-11">Other Details</a></li>
			
		</ul>';
if($dcare==1){
$xxx=0;
			
			}else {$xxx=1;}
echo'<div id="tabs-1">
<form method="post" name="personal_form" action="#">
				<input type="hidden" name="post" value="Send" />
				<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px">
				<h5>Demographics</h5>
				<div class="cleaner_h5"></div>
				<a class="labels">Patient No:<span>*</span></a>
                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field"  
				value="'.stripslashes($row['pntno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
				<div class="cleaner_h5"></div>
				<a class="labels">Full Names:<span>*</span></a>
				<label for="oname" class="bh-visually-hidden">Full Names:</label><textarea id="oname" style="float:right;height:40px;border-color:var(--color-danger, #DC2626)" disabled="disabled" class="alergy" >'.stripslashes($row['fullnames']).'</textarea>
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
				echo'<div class="cleaner_h5"></div> 
				<a class="labels">Contact:<span>*</span></a>
                <label for="stream" class="bh-visually-hidden">Stream</label><input type="text" id="stream"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['contact']).'"/> 
				<div class="cleaner_h5"></div>
				<a class="labels">B.Group:<strong style="margin-left:20px"> '.stripslashes($row['bgroup']).'</strong></a>
                <div class="cleaner_h5"></div>
				<a class="labels">AccType:<span>*</span></a>
<label for="txtacctype" class="bh-visually-hidden">Txtacctype</label><input type="text" id="txtacctype"  name="txtacctype"   style="border-color:var(--color-danger, #DC2626);display:;" class="in_field" value="'.$acctype.'" disabled="disabled"/> 
                <div class="cleaner_h5"></div>
				<a class="labels">Clinic:<span>*</span></a>
<label for="typeclinics254" class="bh-visually-hidden">Oname</label><input type="text" id="typeclinics254" name="oname"   style="border-color:var(--color-danger, #DC2626);display:;" class="in_field" value="'.$typeclinik.'" disabled="disabled"/> 

	</div>
				
			
				<div id="personal" style="border-right:1px solid #ccc;  height:365px; margin-left:0px">
				<h5>Employer Details</h5>
				<a class="labels">Employer:</a>
				<label for="tcr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tcr" name="gaddress" class="in_field" value="'.stripslashes($row['empname']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
				<div class="cleaner_h5"></div>
				<a class="labels">Emp. No:</a>
				<label for="tdr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tdr" name="gaddress" class="in_field" value="'.stripslashes($row['empno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
				<div class="cleaner_h5"></div>
				<h5>Insurance Scheme Details</h5>
				<a class="labels">Insurer:</a>
				<div class="ui-widget" style="margin-right:25px; float:right;border-color:var(--color-danger, #DC2626)"  disabled="disabled" >
				<label for="currentins" class="bh-visually-hidden">Insurer:</label><select id="currentins" style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>';
					echo'<option value="'.stripslashes($row['insid']).'ÃÂÃÂ¸'.stripslashes($row['insurer']).'" selected="selected">'.stripslashes($row['insurer']).'</option>';
					$resultb =mysqli_query($db, "select * from creditcustomers order by CustomerName");
										$num_resultsb = mysqli_num_rows($resultb);	
										for ($i=0; $i <$num_resultsb; $i++) {
											$rowb=mysqli_fetch_array($resultb);
											echo'<option value="'.stripslashes($rowb['CustomerId']).'ÃÂÃÂ¸'.stripslashes($rowb['CustomerName']).'">'.stripslashes($rowb['CustomerName']).'</option>';
										}
				echo'</select>
				</div><div class="cleaner_h5"></div>
				<a class="labels">Card No:</a>
				<label for="cardno" class="bh-visually-hidden">Gaddress</label><input type="text" id="cardno" name="gaddress" class="in_field" value="'.stripslashes($row['cardno']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
				<label for="insid" class="bh-visually-hidden">Oname</label><input type="text" id="insid" name="oname"  class="in_field" style="display:none"/> 
				<label for="insname" class="bh-visually-hidden">Oname</label><input type="text" id="insname" name="oname"  class="in_field" style="display:none"/> 
				<div class="cleaner_h5"></div>
				<a class="labels">Other Details/Notes:</a>
				<div class="cleaner_h5"></div>
				<label for="alergy" class="bh-visually-hidden">Other Details/Notes:</label><textarea id="alergy" class="alergy"  disabled="disabled" style="border-color:var(--color-danger, #DC2626)">'.stripslashes($row['odetails']).'</textarea>
				<div class="cleaner_h5"></div>
				</div>
			
				<div id="personal" style="border-right:1px solid #ccc;  height:365px; margin-left:0px">
				<h5>Guardian Details</h5>
				<div class="cleaner_h5"></div>
				<a class="labels">Names:</a>
                <label for="gname" class="bh-visually-hidden">Gname</label><input type="text" id="gname" name="gname" class="in_field" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" value="'.stripslashes($row['gname']).'"/>
				<div class="cleaner_h5"></div>
				 <a class="labels">R-ship:</a>
                <label for="rship" class="bh-visually-hidden">Rship</label><select class="select" id="rship" name="rship" style="float:right;border-color:var(--color-danger, #DC2626)" disabled="disabled">
				<option value="'.stripslashes($row['grship']).'" selected="selected">'.stripslashes($row['grship']).'</option>
				<option value="father">Father</option>
				<option value="mother">Mother</option>
				<option value="sister">Sister</option>
				<option value="Brother">Brother</option>
				<option value="uncle">Uncle</option>
				<option value="aunt">Aunt</option>
				<option value="cousin">Cousin</option>
				<option value="Son">Son</option>
				<option value="Daughter">Daughter</option>
				<option value="others">Others</option>
				</select> 
				<div class="cleaner_h5"></div>
				<a class="labels">Contacts:</a>
                <label for="gphone" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone" name="gphone" class="in_field" value="'.stripslashes($row['gcont']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
				<div class="cleaner_h5"></div>
				<a class="labels">E-No:</a>
                <label for="geno" class="bh-visually-hidden">Geno</label><input type="text" id="geno" name="geno" class="in_field" value="'.stripslashes($row['geno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
				<div class="cleaner_h5"></div>
				<a class="labels">Address:</a>
                <label for="gaddress" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress" name="gaddress" class="in_field" value="'.stripslashes($row['gaddress']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
				<div class="cleaner_h5"></div>
				</div>
				<div id="personal" style="border:0;height:365px; margin-left:0px; width:172px">
				<h5>Photo</h5>';
				echo'<div class="cleaner_h5"></div>
				
				<iframe name="leiframe" id="leiframe" class="leiframe" src="'.stripslashes($row['image']).'" style="float:left;margin-left:20px" onerror="if(this.src!='.stripslashes($row['image']).') this.src="images/clogo.png"">
				</iframe>
            	
				</div>
	</div>
	<div id="tabs-2">

		<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:300px">
		<h5>Triage Analysis</h5>
		<a class="labels">Temp:</a>
        <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"  class="in_field" value="'.stripslashes($rowa['Temp']).'"  style="width:30px; float:left; margin-left:46px;border-color:#" /> 
		<div style="float:left; margin-top:2px"><a class="labels" style="font-size:5px; margin-top:0px;font-weight:bold; margin-left:5px">0</a></div><div style="float:left; margin=left:3px"><a style="font-size:11px;font-weight:bold;"  class="labels">C</a></div>
			<div class="cleaner_h5"></div>
		<a class="labels">B.P:</a>
        <div style="width:40px; float:left;margin-left:62px; padding:1px ;border-color:#" class="in_field">
		<div style="float:left; border-bottom:1px solid #333; width:35px"><label for="bp1" class="bh-visually-hidden">Oname</label><input type="text" id="bp1" name="oname" value="'.stripslashes($rowa['Bp1']).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px; margin-top:0px;margin-bottom:2px;text-align:center;border-color:#" > </div>
		<div class="cleaner"></div>
		<div style="float:left"><label for="bp2" class="bh-visually-hidden">Oname</label><input type="text" id="bp2" name="oname" value="'.stripslashes($rowa['Bp2']).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px;  margin-top:2px;text-align:center;border-color:#" />  </div>
		</div>
		
		<a class="labels" style="font-weight:bold; margin-left:5px; margin-top:20px">mmHg</a>
		<div class="cleaner_h5"></div>
		<a class="labels">Weight:</a>
        <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname" class="in_field" value="'.stripslashes($rowa['Weight']).'"  style="width:30px; float:left; margin-left:42px;border-color:#" /> 
		<a class="labels" style="font-weight:bold; margin-left:5px">Kgs</a>
		<div class="cleaner_h5"></div>
		<a class="labels">Resp. Rate:</a>
        <label for="resprate" class="bh-visually-hidden">Oname</label><input type="text" id="resprate" name="oname" class="in_field" value="'.stripslashes($rowa['RespRate']).'"  style="width:30px; float:left; margin-left:23px;border-color:#" /> 
		<a class="labels" style="font-weight:bold; margin-left:5px">Breaths/Min</a>
		<div class="cleaner_h5"></div>
		<a class="labels">Pulse Rate:</a>
        <label for="pulserate" class="bh-visually-hidden">Oname</label><input type="text" id="pulserate" name="oname" class="in_field" value="'.stripslashes($rowa['PulseRate']).'"  style="width:30px; float:left; margin-left:25px;border-color:#" /> 
	<a class="labels" style="font-weight:bold; margin-left:5px">Beats/Min</a>
	<div class="cleaner_h5"></div>
		<a class="labels">R.B.S:</a>
        <label for="rbs" class="bh-visually-hidden">Oname</label><input type="text" id="rbs" name="oname" class="in_field" value="'.stripslashes($rowa['Rbs']).'"  style="width:30px; float:left; margin-left:54px;border-color:#"  /> 
	<a class="labels" style="font-weight:bold; margin-left:5px">mMoles/Ltr</a>';

		echo'<div class="cleaner_h5"></div>
		<a class="labels">Clinic:<span>*</span></a>
        <label for="typeDMclinic" class="bh-visually-hidden">TypeDMclinic</label><select  class="select" id="typeDMclinic" name="typeDMclinic" style="margin-left:24px">'; 
if($typeclinik!=''){echo'<option selected="selected" value="'.$typeclinik.'">'.$typeclinik.'</option>';}else{echo'<option value="">Select clinic..</option>';}
#echo'<option value="">Select clinic..</option>';
$result =mysqli_query($db, "SELECT id,Abbr,Name FROM clinics ORDER BY id DESC");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
			$row=mysqli_fetch_array($result);
echo"<option value=\"".stripslashes($row['Abbr'])."\">".stripslashes($row['Name'])."</option>";
		}
		echo'</select>';


	     echo'<div class="cleaner"></div>
		 <a class="labels" style="margin-right:5px">New Screening this calender year:</a>';
		 if(stripslashes($rowa['newscreening'])=='No'){
			 echo'<label for="yestohyper" class="bh-visually-hidden">Gender2</label><input  id="yestohyper" name="gender2" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
		 <label for="notohyper" class="bh-visually-hidden">Gender2</label><input  id="notohyper" name="gender2" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.'; 
		 }else{ echo'<label for="yestohyper" class="bh-visually-hidden">Gender2</label><input  id="yestohyper" name="gender2" type="radio" value="Yes" class="radio" checked="checked" style="margin-top:8px">Y.
		 <label for="notohyper" class="bh-visually-hidden">Gender2</label><input  id="notohyper" name="gender2" type="radio" value="No" class="radio" style="margin-top:8px">N.';}

	     echo'<div class="cleaner"></div>
		 <a class="labels" style="margin-right:30px">Known Hypertensive:</a>';
		 if(stripslashes($rowa['knownhyper'])=='No'){
			 echo'<label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input  id="yesknownhyper" name="gender3" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
		 <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input  id="noknownhyper" name="gender3" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.'; 
		 }else{ echo'<label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input  id="yesknownhyper" name="gender3" type="radio" value="Yes" class="radio" checked="checked" style="margin-top:8px">Y.
		 <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input  id="noknownhyper" name="gender3" type="radio" value="No" class="radio" style="margin-top:8px">N.';}

	     echo'<div class="cleaner"></div>
		 <a class="labels" style="margin-right:30px">Taking Medicine:</a>';
		 if(stripslashes($rowa['takingmeds'])=='No'){
			 echo'<label for="yestomeds" class="bh-visually-hidden">Gender4</label><input  id="yestomeds" name="gender4" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
		 <label for="yestomeds" class="bh-visually-hidden">Gender4</label><input  id="yestomeds" name="gender4" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.'; 
		 }else{ echo'<label for="notomeds" class="bh-visually-hidden">Gender4</label><input  id="notomeds" name="gender4" type="radio" value="Yes" class="radio" checked="checked" style="margin-top:8px">Y.
		 <label for="notomeds" class="bh-visually-hidden">Gender4</label><input  id="notomeds" name="gender4" type="radio" value="No" class="radio" style="margin-top:8px">N.';}
		echo'</div>
		<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:300px">
		<h5>Health Problems/Allergies</h5>
		<label for="allergies" class="bh-visually-hidden">Health Problems/Allergies</label><textarea id="allergies" style="float:right;height:315px; width:280px;border:0" disabled="disabled" class="alergy">'.stripslashes($rowa['Allergies']).'</textarea>
		</div>
		<div id="personal" style="border:0; height:365px; margin-left:0px; width:300px">
		<h5>Other Details</h5>
		<label for="hodetails" class="bh-visually-hidden">Other Details</label><textarea id="hodetails" style="float:right;height:315px; width:280px;border:0" disabled="disabled" class="alergy">'.stripslashes($rowa['OtherDetails']).'</textarea>
		</div>';
							
	
echo'</div>';

echo'<div id="tabs-18">';

		if(isset($_SESSION['dresser'])){
					unset($_SESSION['dresser']);
				}

echo"<script>$('#order606').parent().find('input:first').width(250);</script>";
echo'<div style="float:left; padding-right:10px; border-right:0">';
		echo'<h5>MAKE A DRESSING & INJECTION REQUEST</h5>';

	   echo'<label for="daydressin" class="bh-visually-hidden">Daydressin</label><input type="checkbox" value="1" name="daydressin" id="daydressin" style="float:left;margin:8px 0 0 10px">';
	   echo'<a class="labels" style="margin-left:10px">Send Request to Dressing on Save</a>';
	   echo'<div class="cleaner"></div>';

			echo'<a class="labels" style="margin-left:10px">Item:</a>
				 <div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
					<label for="order606" class="bh-visually-hidden">Item:</label><select id="order606">
						<option value="">Select one...</option>';
					        $resulta =mysqli_query($db, "select * from items  where Category IN ('CUSTOMERCARE', 'OPD SERVICES', 'DENTAL') order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$itemp=stripslashes($row['SalePrice']);
								$item=stripslashes($row['ItemName']);
								$code=stripslashes($row['ItemCode']);
								$categ = stripslashes($row['Category']);
								$catid = stripslashes($row['items_category_id']);
								$subcat = stripslashes($row['SubCategory']);
								$cpr = stripslashes($row['CorporatePrice']);
								$ppr = stripslashes($row['InsurancePrice']);
								$type = stripslashes($row['Type']);
								$bal = stripslashes($row[$userdep]);
								echo"<option value=\"".$itemp."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$code."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$subcat."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."\">".$item." -".$itemp."</option>";
							 }
				echo'</select>'; 
			echo'</div>
			<label for="bal606" class="bh-visually-hidden">Text field</label><input type="text" id="bal606" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
			<label for="type606" class="bh-visually-hidden">Text field</label><input type="text" id="type606" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
	
			<input type="hidden" disabled="disabled" id="quat606" class="input_field" style="width:40px; margin-left:10px;display:none" value="1"/>
			<input type="hidden" disabled="disabled" id="price606" class="input_field" style="width:70px; margin-left:10px;display:none"/>
			<input type="hidden" disabled="disabled" id="red606" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
			<input type="hidden" disabled="disabled" id="categ606" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
			<input type="hidden" disabled="disabled" id="code606" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
			<input type="hidden" disabled="disabled" id="txtcatid606" name="txtcatid44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
			<input type="hidden" disabled="disabled" id="txtsec606" name="txtsec44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
			<input type="hidden" disabled="disabled" id="txtprcorporate606" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
			<input type="hidden" disabled="disabled" id="txtprInsurance606" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';

			echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addbill4('dresser',0)\"/>";
			echo'<label for="tprice606" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="tprice606" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none"/>';
			echo '<label for="disc606" class="bh-visually-hidden">Text field</label><input type="text" id="disc606"  class="input_field"  value="0" style="width:60px; margin-left:10px;display:none"/>';
			echo'<label for="sub606" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="sub606" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none""/>		
			<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
			<label for="income606" class="bh-visually-hidden">Text field</label><select id="income606">';
				$resulta =mysqli_query($db, "select * from extmedics order by id");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$id=stripslashes($row['id']);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$id."\">".$name."</option>";
						}
			echo"<script>$('#income606').parent().find('input:first').width(100);</script>";
		echo'</select></div>
<label for="total606" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="total606" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none""/>';
				
		echo'<div id="itemsdisp" style="height:270px; width:366px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
				<h5>ITEMS</h5>
				<div id="dresserdisp" style="width:306px; margin-right:5px; height:250px;float:left;">
				
				</div>
			</div>';	

echo'</div>';

echo'<div style="float:left">
		<h5>Injection/Dressing</h5>';

	echo'<div style="border-left:2px solid #10504F; height:340px; overflow-y:auto;  width:520px;padding:2px">';
		echo'<div id="dressertabs18" style="height:700px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-31">Summary.</a></li>';
					echo'<li><a href="#tabs-32">Edit Request.</a></li>';
					echo'<li><a href="#tabs-33">Services.</a></li>';
					//echo'<li><a href="#tabs-34">Proc.</a></li>';
					//echo'<li><a href="#tabs-35">Surg.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-31">';
				     echo'<div class="cleaner_h5"></div>';								
					 		$resultb =mysqli_query($db, "select * from opdservicerequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
							$num_resultsb = mysqli_num_rows($resultb);	
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);									
									echo'<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b> Time: <b>'.stripslashes($rowb['date']).'</b></a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Request</b></a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['request']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Details/Notes</b></a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['results']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';

								}
					 echo'<div class="cleaner_h5"></div>';
				echo'</div>';
				echo'<div id="tabs-32" style="margin:1px;">';

							echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:5px 10px 0 0\"><img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/></div>";
							echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-right:5px; float:right\" title=\"View Current Cart\" onclick=\"viewdresserbill('nurse')\"/>";
							echo'<div id="dresserinv" style="height:350px;margin-left:10px;margin-top:0px; float:left;"></div>';


				echo'</div>';
				echo'<div id="tabs-33">';
						echo'<div class="cleaner"></div>'; 
					    echo'<a class="labels">Injection or Dressing Services:</a>
							<div class="ui-widget" style="margin-left:10px; float:left;" id="widg18" >
								<label for="symptoms2" class="bh-visually-hidden">Injection or Dressing Services:</label><select id="symptoms2" style="width:240px; margin-left:5px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from items where Category IN ('CUSTOMERCARE', 'OPD SERVICES', 'DENTAL') order by ItemName");
									$num_resultsb = mysqli_num_rows($resultb);	
									for ($i=0; $i <$num_resultsb; $i++) {
										$rowb=mysqli_fetch_array($resultb);
										echo'<option value="'.stripslashes($rowb['ItemName']).'">'.stripslashes($rowb['ItemName']).'-'.stripslashes($rowb['SalePrice']).'</option>';
									}
							echo'</select>';
						echo'</div>';
				     echo'<div class="cleaner_h5"></div>';								
					 echo'<label for="history2" class="bh-visually-hidden">Text field</label><textarea id="history2" style="float:right;height:200px; width:450px" class="alergy">';
							    $resultb =mysqli_query($db, "select * from opdservicerequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
								$num_resultsb = mysqli_num_rows($resultb);	
								$xa=1;	
								for ($i=0; $i <$num_resultsb; $i++) {
									$rowb=mysqli_fetch_array($resultb);		
									$pharmitems=stripslashes($rowb['request']);
									#echo''.$pharmitems.'</br>';
									echo '<a class="labels" style="margin-left:5px;"> <b>'.$xa.'. '.stripslashes($rowb['request']).'</b></a><br/><div class="cleaner"></div>';
									$xa++;
								}
					 echo'</textarea>';	
					 echo'<div class="cleaner_h5"></div>';		

				echo'</div>';


		echo'</div>';
   echo'</div>';


   echo'</div>';
echo'</div>';

echo'<div id="tabs-3">
	<a class="labels">Type Symptom name and press enter:</a>
	<div class="ui-widget" style="margin-left:25px; float:left;" id="widg1" >
								<label for="symptoms" class="bh-visually-hidden">Type Symptom name and press enter:</label><select id="symptoms" style="width:260px; margin-left:10px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from symptoms order by name");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
														}
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
	<label for="history" class="bh-visually-hidden">Text field</label><textarea id="history" style="float:right;height:310px; width:950px" class="alergy">'.stripslashes($rowa['History']).'</textarea>
	<label for="complaint" class="bh-visually-hidden">Text field</label><textarea id="complaint" style="float:right;height:310px; width:950px; display:none" class="alergy"></textarea>
	
	</div>
	
	<div id="tabs-5">';

if(isset($_SESSION['lab'])){
							unset($_SESSION['lab']);
						}
	 echo" <script>$('#labt').parent().find('input:first').width(250);</script>";
	 echo" <script>$('#orderitem44').parent().find('input:first').width(250);</script>";
	echo'<div style="float:left; padding-right:10px; border-right:0">
					<h5>MAKE A LAB REQUEST</h5>
					<label for="labrec" class="bh-visually-hidden">Labrec</label><input type="checkbox" value="1" name="labrec" id="labrec" style="float:left;margin:8px 0 0 10px">
					<a class="labels" style="margin-left:10px">Send Request to Lab on Save</a>
					 <div class="cleaner"></div>

<a class="labels" style="margin-left:10px">Lab Test:</a>
<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
	<label for="orderitem44" class="bh-visually-hidden">Lab Test:</label><select id="orderitem44">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from items  where Category='Laboratory' order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$itemp=stripslashes($row['SalePrice']);
								$item=stripslashes($row['ItemName']);
								$code=stripslashes($row['ItemCode']);
								$categ = stripslashes($row['Category']);
								$catid = stripslashes($row['items_category_id']);
								$subcat = stripslashes($row['SubCategory']);
								$cpr = stripslashes($row['CorporatePrice']);
								$ppr = stripslashes($row['InsurancePrice']);
								$type = stripslashes($row['Type']);
								$bal = stripslashes($row[$userdep]);
								echo"<option value=\"".$itemp."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$code."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$subcat."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."\">".$item."</option>";
						}
		echo'
		</select>
		<label for="bal44" class="bh-visually-hidden">Text field</label><input type="text" id="bal44" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		<label for="type44" class="bh-visually-hidden">Text field</label><input type="text" id="type44" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		</div>
				<input type="hidden" disabled="disabled" id="quat44" class="input_field" style="width:40px; margin-left:10px;display:none" value="1"/>
				<input type="hidden" disabled="disabled" id="price44" class="input_field" style="width:70px; margin-left:10px;display:none"/>
				<input type="hidden" disabled="disabled" id="red" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="categ" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="code" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtcatid44" name="txtcatid44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtsec44" name="txtsec44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtprcorporate44" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
				<input type="hidden" disabled="disabled" id="txtprInsurance44" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';
				#echo'	<input type="hidden" disabled="disabled" id="txtprnormal44" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';

				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addbill2('lab',0)\"/>";
				echo'<label for="tprice" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="tprice" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none"/>';
				echo '<label for="disc44" class="bh-visually-hidden">Text field</label><input type="text" id="disc44"  class="input_field"  value="0" style="width:60px; margin-left:10px;display:none"/>';
				echo '<input type="hidden" disabled="disabled" id="old_patient_id" value="'.$old_in_patient_id.'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="old_presc_id" value="'.$old_in_presc_id.'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="regn" value="'.$patid.'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="oname" value="'.$patname.'" style="display:none;"/>';
				echo'<label for="sub44" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="sub44" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none""/>		
			<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
			<label for="income44" class="bh-visually-hidden">Text field</label><select id="income44">';
				$resulta =mysqli_query($db, "select * from extmedics order by id");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$id=stripslashes($row['id']);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$id."\">".$name."</option>";
						}
			echo"<script>$('#income44').parent().find('input:first').width(100);</script>";
		echo'</select></div>
<label for="total" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="total" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none""/>';
				echo'
	<div id="itemsdisp" style="height:270px; width:366px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5>LAB TESTS</h5>
	<div id="display" style="margin-top:0px; height:250px;">
	
	</div>
	</div>	
</div>
	

		<div style="float:left; padding-left:10px">';
		echo'<h5>Lab Requests Summary</h5>';
		//<input aria-label="Printlab" type="checkbox" value="1" name="printlab" style="float:left;margin:8px 3px 0 0px;"><a class="labels">Print Lab Analysis on Save</a>
		 #echo'<div class="cleaner_h5"></div>';
		

	echo'<div style="height:340px; overflow-y:auto; border:1px solid #ccc;width:520px;padding:2px">';
		#echo'<h5>Lab Results</h5>';
		#echo'<div class="cleaner_h5"></div>';
		#echo'<h5>Examination Details</h5>';
		echo'<div id="labtabs8" style="height:340px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Results.</a></li>';
					echo'<li><a href="#tabs-2">Edit Requests.</a></li>';
					echo'<li><a href="#tabs-3">Presc.</a></li>';
					//echo'<li><a href="#tabs-4">Proc.</a></li>';
					//echo'<li><a href="#tabs-5">Surg.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 #echo'<div style="width:430px; float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
					 		$resultb =mysqli_query($db, "select * from labrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
							$num_resultsb = mysqli_num_rows($resultb);	
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
								else if(stripslashes($rowb['status'])==2){$x='<b style="color:#10504F"> - [COMPLETED]</b>';}
								else if(stripslashes($rowb['status'])==3){$x='<b style="color:var(--color-danger, #DC2626)"> - [IN PROCESS]</b>';}
								else{$x='<b style="color:var(--color-danger, #DC2626)"> - [SAMPLE REJECTED]</b>';}
									
									echo'<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b></a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Lab Request</b>'.$x.'</a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['request']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Lab Results</b></a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['results']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';

								}
								echo'<div class="cleaner"></div>';
								echo'<input type="hidden" disabled="disabled" id="total" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
								#echo'<div class="cleaner"></div>';
								echo'<input type="hidden" disabled="disabled" id="labftotal44" style="display:none;"/>';
								#echo'<div class="cleaner"></div>';
					 #echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="margin:1px;">';

							echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:5px 10px 0 0\"><img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/></div>";

							echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-right:5px; float:right\" title=\"View Current Cart\" onclick=\"viewmaabarabill('nurse')\"/>";
							echo'<div id="maabarainv" style="height:350px;margin-left:-85px;margin-top:0px; float:left;"></div>';


				echo'</div>';
				echo'<div id="tabs-3">';

				echo'</div>';


		echo'</div>';
   echo'</div>';



	echo'</div>
	</div>
	<div id="tabs-6">';
		if(isset($_SESSION['rad'])){
							unset($_SESSION['rad']);
						}
	 echo" <script>$('#labt').parent().find('input:first').width(250);</script>";
	echo'<div style="float:left; padding-right:10px; border-right:0px solid #333">
					<h5>MAKE A RADIOLOGY REQUEST</h5>
					<label for="radrec" class="bh-visually-hidden">Radrec</label><input type="checkbox" value="1" name="radrec" id="radrec" style="float:left;margin:8px 0 0 10px">
					<a class="labels" style="margin-left:10px">Send to Radiology on Save</a>
					 <div class="cleaner"></div>
					



<a class="labels" style="margin-left:10px">Rad Test:</a>
<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
	<label for="item45" class="bh-visually-hidden">Rad Test:</label><select id="item45">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from items  where Category='Radiology' order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$itemp=stripslashes($row['SalePrice']);
								$item=stripslashes($row['ItemName']);
								$code=stripslashes($row['ItemCode']);
								$categ = stripslashes($row['Category']);
								$catid = stripslashes($row['items_category_id']);
								$cpr = stripslashes($row['CorporatePrice']);
								$ppr = stripslashes($row['InsurancePrice']);
								$type = stripslashes($row['Type']);
								$bal = stripslashes($row[$userdep]);
								echo"<option value=\"".$itemp."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$code."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."\">".$item."</option>";
						}
		echo'
		</select>
		<label for="bal45" class="bh-visually-hidden">Text field</label><input type="text" id="bal45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		<label for="type45" class="bh-visually-hidden">Text field</label><input type="text" id="type45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		</div>
							<label for="quat45" class="bh-visually-hidden">Text field</label><input type="text" id="quat45" class="input_field"  style="width:40px; margin-left:10px;display:none" value="1"/>
							<label for="price45" class="bh-visually-hidden">Text field</label><input type="text" id="price45" class="input_field"  style="width:70px; margin-left:10px;display:none"/>
							<label for="red45" class="bh-visually-hidden">Text field</label><input type="text" id="red45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
							<label for="categ45" class="bh-visually-hidden">Text field</label><input type="text" id="categ45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
							<label for="code45" class="bh-visually-hidden">Text field</label><input type="text" id="code45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid45" name="txtcatid45" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate45" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprInsurance45" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';
	//echo'	<input type="hidden" disabled="disabled" id="txtprnormal45" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';

				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addbill3('rad',0)\"/>";
				echo'<label for="tprice45" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="tprice45" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none" disabled="disabled"/>';
				echo '<label for="disc45" class="bh-visually-hidden">Text field</label><input type="text" id="disc45"  class="input_field"  value="0" style="width:60px; margin-left:10px;display:none"/>
				<input type="hidden" id="old_patient_id" value="'.$old_in_patient_id.'"/><input type="hidden" id="old_presc_id" value="'.$old_in_presc_id.'"/>
				<input type="hidden" id="regn" value="'.$patid.'"/><input type="hidden" id="oname" value="'.$patname.'"/>';
				echo'<label for="sub45" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="sub45" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none""/>		
			<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
			<label for="income45" class="bh-visually-hidden">Text field</label><select id="income45">';
				$resulta =mysqli_query($db, "select * from extmedics order by id");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$id=stripslashes($row['id']);
								$name=stripslashes($row['name']);
								echo"<option value=\"".$id."\">".$name."</option>";
						}
			echo"<script>$('#income45').parent().find('input:first').width(100);</script>";
		echo'</select></div>
<label for="total45" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="total45" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none""/>';
				echo'
	<div id="itemsdisp" style="height:270px; width:366px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5>RADIOLOGY TESTS</h5>
	<div id="display45" style="margin-top:0px; height:250px;">
	
	</div>
	</div>	
</div>


	
		<div style="float:left; padding-left:10px">
		<h5>Radiology Results</h5>';
		//<input aria-label="Printrad" type="checkbox" value="1" name="printrad" style="float:left;margin:8px 3px 0 0px;"><a class="labels">Print Radiology Analysis on Save</a>

	echo'<div style="height:340px; overflow-y:auto; border:1px solid #ccc;width:520px;padding:2px">';
		#echo'<h5>Lab Results</h5>';
		#echo'<div class="cleaner_h5"></div>';
		#echo'<h5>Examination Details</h5>';
		echo'<div id="radtabs9" style="height:700px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Results.</a></li>';
					echo'<li><a href="#tabs-2">Edit Requests.</a></li>';
					echo'<li><a href="#tabs-3">Scan Images.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 #echo'<div style="width:430px; float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
			$resultb =mysqli_query($db, "select * from radrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
							$num_resultsb = mysqli_num_rows($resultb);	
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
								else{$x='<b style="color:#10504F"> - [COMPLETED]</b>';}
								echo'<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b></a>
									 <div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									 <a class="labels"><b>Radiology Request</b>'.$x.'</a><div class="cleaner"></div>
									 <a class="labels">'.stripslashes($rowb['request']).'</a>
									 <div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									 <a class="labels"><b>Radiology Results</b></a><div class="cleaner"></div>
									 <a class="labels">'.stripslashes($rowb['results']).'</a>
									 <div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
							 }

					 #echo'</div>';
					      echo'<div class="cleaner"></div>';
					      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
				echo'</div>';
				echo'<div id="tabs-2" style="margin:1px;">';

							echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:5px 10px 0 0\"><img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/></div>";
						  echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-right:5px; float:right\" title=\"View Current Cart\" onclick=\"viewRadiolojiaBill('nurse')\"/>";
							echo'<div id="radiolojiainv" style="height:350px;margin-left:10px;margin-top:0px; float:left;"></div>';
					      echo'<div class="cleaner"></div>';
					      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
				echo'</div>';
				echo'<div id="tabs-3">';
				      echo'<div class="cleaner_h5"></div>';
					  echo'<h5>Scan Images</h5>';
					  echo'<div id="wrap" style="width:450px; height:100px; background:#fff; border:1px solid #ccc; BORDER-RADIUS:0PX; padding:10px; padding-right:5px; overflow:auto;">';
								$result2 =mysqli_query($db, "select * from raddocuments where PrescId='".$pid."' order by Stamp desc");
								$num_results2 = mysqli_num_rows($result2);
								for ($i=0; $i <$num_results2; $i++) {
								$row2=mysqli_fetch_array($result2);
								    if(stripslashes($row2['Type'])=='Image'){
									  echo"<a class=\"fancybox\" href=\"". stripslashes($row2['Link'])."\" title=\"".stripslashes($row2['Name'])."-".stripslashes($row2['Date'])."\" data-fancybox-group=\"gallery\" ><img alt=\"Stripslashes Row2 Link\" src=\"". stripslashes($row2['Link'])."\" style=\"max-height:100px;margin-right:5px; max-width:100px;\" /></a>";
									} 
									if(stripslashes($row2['Type'])=='Document'){
									echo"<a class=\"fancybox\" href=\"images/adobe.png\" title=\"".stripslashes($row2['Name'])."-".stripslashes($row2['Date'])."\" data-fancybox-group=\"gallery\" ><img alt=\"Adobe\" src=\"images/adobe.png\" style=\"max-height:100px;margin-right:5px; max-width:100px;\" /></a>";
							 		} 

								}
						echo'</div>';
					      echo'<div class="cleaner"></div>';
					      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
				echo'</div>';


		echo'</div>';
   echo'</div>';


			
   echo'</div>
	</div>

	<div id="tabs-12">

		<div class="cleaner_h5"></div>
		 <div style="height:360px; overflow-y:auto; border:0px solid #ccc;width:100%;padding:2px">';


		 	 $result =mysqli_query($db, "select * from newprescription where PatId='".$pntno."' and PrescId!='".$pid."'");
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			
             echo'<h5 style="text-align:center;">OutPatient Medical Records ['.$num_results.']</h1>
           		<div style="clear:both; margin-bottom:10px"></div>
         
					<div style="width:100%; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
					<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Date</p>
					</div>
					<div style="width:30%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">History</p>
					</div>
					<div style="width:30%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Diagnosis</p>
					</div>
					<div style="width:29%; height:20px;float:left;">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Prescription</p>
					</div>
					</div>

			<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
			<tbody>';

					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					$opid=stripslashes($row['PrescId']);
					if($i%2==0){
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4&rcptno=".stripslashes($row['PrescId'])."')\">";
					}
					else{
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;background:#f0f0f0;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4&rcptno=".stripslashes($row['PrescId'])."')\">";
					}
					echo'<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.dateprint(stripslashes($row['TransDate'])).'</td>
				    <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['History']).'</td>
				    <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Diagnosis']).'</td>
				     <td  style="width:29%;border-width:0.5px; border-color:#666; border-style:solid;">';
				     	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$opid."' order by id");
																	$num_resultsb = mysqli_num_rows($resultb);	
																	for ($x=0; $x <$num_resultsb; $x++) {
																		$rowb=mysqli_fetch_array($resultb);
																		
							
							echo stripslashes($rowb['prescription']).'<br/>';

								}
				     	
				     echo'</td>
				     </tr>';
						} 

echo'</tbody></table><div style="clear:both; margin-bottom:10px"></div>';
   				}

   				$result =mysqli_query($db, "select * from inpatients where PatId='".$pntno."'");
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			
             echo'<h5 style="text-align:center;">Inpatient Medical Records ['.$num_results.']</h1>
           		<div style="clear:both; margin-bottom:10px"></div>
         
					<div style="width:100%; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
					<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Date</p>
					</div>
					<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Doctor in Charge</p>
					</div>
					
					<div style="width:69%; height:20px;float:left;">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Admission Notes</p>
					</div>
					</div>

			<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
			<tbody>';

					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					$pid=stripslashes($row['PrescId']);
					if($i%2==0){
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4.1&rcptno=".stripslashes($row['PrescId'])."')\">";
					}
					else{
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;background:#f0f0f0;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4.1&rcptno=".stripslashes($row['PrescId'])."')\">";
						
					}
					echo'<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.dateprint(stripslashes($row['TransDate'])).'</td>
				    <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Doctor']).'</td>
				 	 <td  style="width:69%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['AdmNotes']).'</td>
				     </tr>';
						} 

echo'</tbody></table><div style="clear:both; margin-bottom:10px"></div>';
   				}

		 echo'</div>


				</div>

	<div id="tabs-7">
	
	<a class="labels" style="margin-left:20px;display:none;">Type Diagnosis name and press enter:</a>
	<div class="ui-widget" style="margin-left:25px; float:left;display:none;" id="widg4" >
								<label for="diagt" class="bh-visually-hidden">Type Diagnosis name and press enter:</label><select id="diagt" style="width:260px; margin-left:10px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from diagnosis order by name asc");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
														}
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
			<div style="width:520px;float:left;display:none;">
			<label for="diagnosis" class="bh-visually-hidden">Text field</label><textarea id="diagnosis" style="float:left;height:290px; width:500px;display:none;" class="alergy">'.stripslashes($rowa['Diagnosis']).'</textarea>
				</div>
				<div style="width:370px; border:1px solid #ccc; height:310px; float:left; margin-left:20px">
					<a class="labels" style="margin-left:20px;font-weight:bold">Diseases Summary:</a>';
					if(isset($_SESSION['dis'])){
							unset($_SESSION['dis']);
						}
					$_SESSION['diseases']=array();

	echo'<div class="cleaner_h5"></div>
	<div class="ui-widget"  style="float:left; margin-left:25px">
	<label for="disease" class="bh-visually-hidden">Diseases Summary:</label><select id="disease" class="combos">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from diseases order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$name=stripslashes($row['name']);
							$k=stripslashes($row['id']);
								echo"<option value=\"".$k."ÃÂÃÂ¸".$name."\">".$name."</option>";
						}
		echo'</select>
</div>
	<div class="cleaner_h5"></div>
					<div id="diseases" style="width:100%;">';
		$parts=explode(';',stripslashes($rowa['DiagName']));
		foreach ($parts as $key => $val) {
		$_SESSION['dis'][$key]=$val;
			if($val!=''){
			echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismissdis(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
			}
	}


					echo'</div>';

				echo'</div>
	</div>
	<div id="tabs-8">
	<label for="phyexam" class="bh-visually-hidden">Text field</label><textarea id="phyexam"  style="float:right;height:330px; width:950px" class="alergy">'.stripslashes($rowa['PhyExam']).'</textarea>
	</div>
	<div id="tabs-11" style="display:none;">
	<a class="labels">Send To Other Doctor(On Save):<span>*</span></a>
                                <label for="deptsendto" class="bh-visually-hidden">Send To Other Doctor(On Save):</label><select  class="select" id="deptsendto" style="margin-left:20px; width:250px">
								<option selected="selected" value="'.$dept.'">'.$dept.'</option>';
						$result =mysqli_query($db, "SELECT id,name FROM sendto WHERE status=1 ORDER BY id ASC");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
				echo"<option value=\"".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
								}
			                   echo'</select>

<a class="labels" style="margin-left:20px">Next Review Date:</a>
<label for="datepick3" class="bh-visually-hidden">Next Review Date:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick3" type="text" value="">
				
								</div>
	<div id="tabs-9">
	<label for="rectheatre" class="bh-visually-hidden">Rectheatre</label><input type="checkbox" value="1" name="rectheatre" id="rectheatre" style="float:left;margin:8px 0 0 10px">
	<a class="labels" style="margin-left:10px"><b>Send to Theatre On Save</b></a>
	<a class="labels" style="margin-left:20px">Type Procedure :</a>
	<div class="ui-widget" style="margin-left:25px; float:left;" id="widg6" >
								<label for="treat" class="bh-visually-hidden">Type Procedure :</label><select id="treat" style="width:260px; margin-left:10px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from procedures order by name asc");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
														}
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
	<div style="width:490px; float:left;">							
	<label for="treatment" class="bh-visually-hidden">Text field</label><textarea id="treatment" style="float:right;height:290px; width:480px" class="alergy">'.stripslashes($rowa['Treatment']).'</textarea>
	</div>

<div style="width:470px; float:left;padding:2px;">
<h5>Theatre Summary</h5>
<div style="width:460px; float:left;padding:2px;height:315px; overflow-y:auto; border:1px solid #ccc;">';
$resultb =mysqli_query($db, "select * from theatrequests where prescid='".$pid."' order by id");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
															else{$x='<b style="color:#10504F"> - [COMPLETED]</b>';}
				
				echo'
				
				<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b></a>
				<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
				<a class="labels"><b>Theatre Procedures</b>'.$x.'</a><div class="cleaner"></div>
				<a class="labels">'.stripslashes($rowb['procedures']).'</a>
				<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
				<a class="labels"><b>Theatre Notes</b></a><div class="cleaner"></div>
				<a class="labels">'.stripslashes($rowb['notes']).'</a>
				<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>
				';



														}


echo'</div></div>

	</div>';
		if(isset($_SESSION['pharmcart'])){
							unset($_SESSION['pharmcart']);
						}
echo'<div id="tabs-10">

	<label for="recpharm" class="bh-visually-hidden">Recpharm</label><input type="checkbox" value="1" name="recpharm" id="recpharm" style="float:left;margin:8px 0 0 0px">

	<a class="labels" style="margin-left:10px"><b>Send Prescription to Pharmacy On Save</b></a>

	<a class="labels" style="margin-left:30px">Prescription Templates:</a>
	<div class="ui-widget" style="margin-left:25px; float:left;" id="widg7" >
								<label for="presct" class="bh-visually-hidden">Prescription Templates:</label><select id="presct" style="width:260px; margin-left:10px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from prescriptions order by name asc");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
														}
								echo'</select>
								</div>
	
	
	 <div class="cleaner"></div>
	<div class="cleaner"></div>
	<a class="labels">Drug Name</a><a class="labels" style="margin-left:210px">Dosage</a>	
	<a class="labels" style="margin-left:100px">Route</a><a class="labels" style="margin-left:90px">Frequency</a>		
	<a class="labels" style="margin-left:100px">Duration</a><a class="labels" style="margin-left:70px">Quantity</a>
	<div class="cleaner"></div>';		
	echo'
	<div class="cleaner"></div>		
	<div class="ui-widget" style="margin-left:0px; float:left;" >
		<label for="docInpPharm1" class="bh-visually-hidden">Quantity</label><select class="drugname" id="docInpPharm1" style="width:260px; margin-left:0px;">
		<option value="">Select one...</option>';
			#$resultb =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
			$resultb =mysqli_query($db, "select * from items where PHARMACY>0 and Type='GOOD' order by ItemName");
			$num_resultsb = mysqli_num_rows($resultb);
			$resultc =mysqli_query($db, "select * from items where DDA>0 and Type='GOOD' order by ItemName");
			$num_resultsc = mysqli_num_rows($resultc);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$code=stripslashes($rowb['ItemCode']);
								$item=stripslashes($rowb['ItemName']);
								$sprice=stripslashes($rowb['SalePrice']);
								$cpr = stripslashes($rowb['CorporatePrice']);
								$ppr = stripslashes($rowb['InsurancePrice']);
								$categ = stripslashes($rowb['Category']);
								$catid = stripslashes($rowb['items_category_id']);
								$type = stripslashes($rowb['Type']);
								$bal = stripslashes($rowb['PHARMACY']);
								echo"<option value=\"".$code."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$sprice."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$catid."\">".stripslashes($rowb['ItemName'])." Bal: ".stripslashes($rowb['PHARMACY'])."</option>";

							}
							for ($i=0; $i <$num_resultsc; $i++) {
								$rowc=mysqli_fetch_array($resultc);#echo'<option value="'.stripslashes($rowc['ItemName']).'ÃÂÃÂ¸'.stripslashes($rowc['DDA']).'">'.stripslashes($rowc['ItemName']).', DDABal:'.stripslashes($rowc['DDA']).'</option>';
								$code=stripslashes($rowc['ItemCode']);
								$item=stripslashes($rowc['ItemName']);
								$sprice=stripslashes($rowc['SalePrice']);
								$cpr = stripslashes($rowc['CorporatePrice']);
								$ppr = stripslashes($rowc['InsurancePrice']);
								$categ = 'DDA';
								$catid = stripslashes($rowc['items_category_id']);
								$type = stripslashes($rowc['Type']);
								$bal = stripslashes($rowc['DDA']);
								echo"<option value=\"".$code."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$sprice."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$catid."\">".stripslashes($rowc['ItemName'])." DDA: ".stripslashes($rowc['DDA'])."</option>";
							}
								echo'</select>
								</div>
	<input type="hidden" disabled="disabled" id="txtproductcode" class="input_field" style="width:20px; margin-left:5px;display:none;"/>
	<input type="hidden" disabled="disabled" id="dname" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="dbal" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprnormal" name"txtprnormal" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate" name="txtprcorporate" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprInsurance" name="txtprInsurance" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<label for="lcmhcateg" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="lcmhcateg" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid" name="txtcatid" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtype" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtprice" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtdisc"  class="input_field" value="0" style="width:60px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhsub44" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>	
	<input type="hidden" disabled="disabled" id="lcmhtotal44" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
	//echo'<input type="hidden" id="regn" value="'.$patid.'"/><input type="hidden" id="oname" value="'.$patname.'"/>';
	
	echo'<label for="dr9" class="bh-visually-hidden">Text field</label><input type="text" id="dr9" class="in_field" value="" style="width:30px; float:left; margin-left:50px;padding:6px 5px"/> 
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
		
		<div class="ui-widget" style="margin-left:35px; float:left;" >
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
		</div>
		
		
		<div class="ui-widget" style="margin-left:35px; float:left;" >
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
		</div>
		
		
		
		<label for="dr7" class="bh-visually-hidden">Oname</label><input type="text" id="dr7" name="oname" class="in_field" value="" style="width:30px; float:left; margin-left:50px;padding:6px 5px"/> 
		
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
		
 echo'<img alt="Document Add" src="images/document_add.png" style="margin-left:10px; width:30px; height:30px;float:left; cursor:pointer" onclick="addthispresc()"/>';			
echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-left:5px; float:left\" title=\"View Current Cart\" onclick=\"viewpharmcartbill('nurse')\"/>";			
echo'<div class="cleaner_h5"></div>
	<div style="width:520px; float:left">';
	echo'<label for="prescription" class="bh-visually-hidden">Text field</label><textarea id="prescription" style="float:right;height:210px; width:500px" class="alergy">';
 	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
	$num_resultsb = mysqli_num_rows($resultb);	
	$xa=1;	
	for ($i=0; $i <$num_resultsb; $i++) {
		$rowb=mysqli_fetch_array($resultb);		
		$pharmitems=stripslashes($rowb['itname']);
		echo '<a class="labels"> '.$xa.'. '.stripslashes($rowb['prescription']).'</a>';
		$xa++;
	}
	echo'</textarea>';

	echo'<div class="cleaner"></div>
	<input aria-label="Printrec" type="checkbox" value="1" name="printrec" style="float:left;margin:8px 3px 0 0px;"><a class="labels">Print Prescription on Save</a>
	</div>';

	echo'<div style="width:440px; float:left;padding:2px;">';
		echo'<div id="tabs4" style="height:260px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Prescriptions Summary.</a></li>';
					echo'<li><a href="#tabs-2">Invoice Items.</a></li>';

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
					 echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="float:right;height:100px;margin:2px;">';
			 		echo'<div id="displayinv" style="background-color:#;margin-left:10px;">';

			 		echo'</div>';
				echo'</div>';


		echo'</div>';
   echo'</div>';


	echo'</div>	
	</div>
	

</div>';							
break;

case 12:
if(isset($_GET['d1'])){
	$d1=htmlsan($_GET['d1']);
}else $d1=date('Y/m/d');
if(isset($_GET['d2'])){
	$d2=htmlsan($_GET['d2']);
}else $d2=date('Y/m/d');
$d1=preg_replace('~/~', '', $_GET['d1']);
$d2=preg_replace('~/~', '', $_GET['d2']);
$query =mysqli_query($db, "SELECT id,prescid,patid,patname,rcptno,deptfrom FROM pharmrequests WHERE id='".htmlsan($_GET['code'])."' and stamp>='".$d1."' and  stamp<='".$d2."'  ");
   $res = mysqli_fetch_array($query);
	#$code=stripslashes($res['id']);
	$clientno=makesafe(stripslashes($res['patid']));
	$clientname=makesafe(stripslashes($res['patname']));
	$rcptno=makesafe(stripslashes($res['rcptno']));
	$dept4rm=makesafe(stripslashes($res['deptfrom']));
	echo'<div style="width:auto; margin:0px; height:471px; background:#none; border-radius:0px; padding:5px 0 5px 5px">';
		echo'<h2  style="float:left; padding:5px 5px 0 0; margin:0">Pharmacy Requests -: '.$clientname.' - '.$clientno.' - '.$dept4rm.'</h2>';
		echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-2px 5px 0 0\"><img alt=\"Prescription\" src=\"images/presc.png\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Prescription\"  onclick=\"window.open('report.php?id=36&rcptno=".safe_encode($_GET['prescno'])."&pid=".safe_encode($_GET['prescid'])."&cid=".safe_encode($_GET['clientid'])."&cno=".safe_encode($clientno)."')\"/></div>";			
		echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>';
		#echo'<h5>Examination Details</h5>';
		echo'<div id="personal">';	
				echo'<iframe name="leiframe" style="margin-right:60px" id="leiframe" class="leiframe" src="images/patients/default.jpg"></iframe>';
				echo'<div class="cleaner_h5"></div>';
				echo'<a class="labels" style="margin-left:5px">Receipt No:</a>';
				echo'<label for="rcptno" class="bh-visually-hidden">Rcptno</label><input type="text" disabled="disabled" id="rcptno" name="rcptno"  class="input_field" style="float:right;width:100px; margin-left:10px;border-color:var(--color-danger, #DC2626);"  value="'.$rcptno.'"/>';
				echo'<div class="cleaner_h5"></div>';
				echo'<a class="labels" style="margin-left:5px">PatientNo:</a>';
				echo'<label for="clientno" class="bh-visually-hidden">Clientno</label><input type="text" disabled="disabled" id="clientno"  name="clientno" class="input_field" style="float:right;width:100px; margin-left:10px;border-color:var(--color-danger, #DC2626);" value="'.$clientno.'"/>';
				echo'<div class="cleaner_h5"></div>';
				echo'<a class="labels" style="margin-left:5px">PatientName:</a>';
				echo'<label for="clientname" class="bh-visually-hidden">Clientname</label><input type="text" disabled="disabled" id="clientname"  name="clientname" class="input_field" style="float:right;width:100px; margin-left:10px;border-color:var(--color-danger, #DC2626);" value="'.$clientname.'"/>';
				echo'<div class="cleaner_h5"></div>';

					
				 

		echo'</div>';

		echo'<div id="tabs4" style="width:748px; height:428px; float:left; margin:5px 0 0 0px; overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Prescriptions Summary.</a></li>';
					echo'<li><a href="#tabs-4">Service Requests.</a></li>';
					echo'<li><a href="#tabs-3">Invoice Items.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 echo'<div id="results">';
					     echo'<div style="height:470px; width:700px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">';
if($dept4rm=='IPD'){
	$result=mysqli_query($db, "SELECT * FROM pharmrequests WHERE prescid='".htmlsan($_GET['prescno'])."' AND old_in_presc_id='".htmlsan($_GET['prescid'])."' AND old_in_patient_id='".htmlsan($_GET['clientid'])."' AND category IN('PHARMACY', 'ADMINISTRATION') and stamp>='".$d1."' and stamp<='".$d2."' order by id asc");
}else{
	$result=mysqli_query($db, "SELECT * FROM pharmrequests WHERE prescid='".htmlsan($_GET['prescno'])."' AND old_in_presc_id='".htmlsan($_GET['prescid'])."' AND old_in_patient_id='".htmlsan($_GET['clientid'])."' AND category IN('PHARMACY', 'ADMINISTRATION') and stamp>='".$d1."' and stamp<='".$d2."' order by id asc");
}

						   $num_rows = mysqli_num_rows($result);
						echo'<div class="cleaner_h5"></div>';
							echo'<div id="chati" style="width:740px; height:300px; overflow-y:scroll">
									<div id="inside" style="min-height:260px;">
										<div id="title">
											<div id="figure1" style="margin-left:0px;width:400px">Prescription</div>
											<div id="figure1" style="width:50px">Qty</div>
											<div id="figure1" style="width:60px">Price</div>
											<div id="figure1" style="width:60px" title="Prescribed By">Presc. By</div>
											<div id="figure1" style="width:50px">Dispense</div>
										</div>';

									if($num_rows==0){									
										echo'<div class="cleaner_h5"></div>
										no records yet.';
									}

										for ($i=0; $i <$num_rows; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										$itcode=stripslashes($row['itcode']);
										$slcode=stripslashes($row['old_in_sale_id']);
										$qty=stripslashes($row['quat']);
										$status=stripslashes($row['status']);
										$paid=stripslashes($row['paid']);
										$rcptno=stripslashes($row['rcptno']);
										$dept4rm=stripslashes($row['deptfrom']);

												if($status==2){echo"<div class=\"normal\" id=\"normal".$code."\" style=\"background:#ccc\" >";}
												else {echo"<div class=\"normal\" id=\"normal".$code."\">";}
										#echo'<div id="normal">';
												echo"<div id=\"figure2t\" style=\"width:400px;overflow:hidden;height:16px;\">".stripslashes($row['prescription'])."</div>";
												echo"<div id=\"figure2t\" style=\"width:50px\">".stripslashes($row['quat'])."</div>";
												echo"<div id=\"figure2t\" style=\"width:60px\">".stripslashes($row['price'])."</div>";
												echo"<div id=\"figure2t\" style=\"width:60px\">".stripslashes($row['username'])."</div>";
												if($dept4rm=='OPD'&&$paid==1&&$status==1){
													echo"<div id=\"sendnotice".$code."\" class=\"figure2t\" onclick=\"sendconfirmation(".$code.",".$itcode.",".$slcode.",".$qty.",".$rcptno.",".$d1.",".$d2.")\" style=\"height:16px;width:55px; border-right:1px solid #333\"><img alt=\"\" src=\"images/right3green.png\" width=\"20\" height=\"22\" /></div>";
												} elseif ($dept4rm=='IPD'&&$paid==0&&$status==1) {
													echo"<div id=\"sendnotice".$code."\" class=\"figure2t\" onclick=\"sendconfirmation(".$code.",".$itcode.",".$slcode.",".$qty.",".$rcptno.",".$d1.",".$d2.")\" style=\"height:16px;width:55px; border-right:1px solid #333\"><img alt=\"\" src=\"images/right3green.png\" width=\"20\" height=\"22\" /></div>";
												} else{
													echo"<div id=\"sendnotice".$code."\" class=\"figure2t\" onclick=\"checkIPDOPDStatus(".$dept4rm.")\" style=\"height:16px;width:55px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";
												}
										   echo'</div>';
										}
										
								echo'</div></div>';
								echo'<div id="displaymes"></div>';

					 	 echo'</div>';
					 echo'</div>';

				echo'</div>';
				echo'<div id="tabs-3">';
						echo'
								<div id="personal" style="overflow:auto; width:491px">
								<h5>Prescription Details</h5>
									<a class="labels">Patient Name:<span>*</span></a>
	                                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field"  
									value="'.$clientname.'" disabled="disabled" style="float:left;border-color:var(--color-danger, #DC2626); width:200px" /> 
										<h5>Drugs Checklist</h5>';
										$result =mysqli_query($db, "select * from sales where RcptNo='".$rcptno."' and Category IN('PHARMACY', 'ADMINISTRATION') ");
										$num_results = mysqli_num_rows($result);
										for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										echo'<input aria-label="Check&#39;. I.&#39;" type="checkbox" value="1" name="check'.$i.'" style="float:left; margin:8px 0 0 5px"/><a class="labels" style="margin-left:5px">'.stripslashes($row['ItemName']). '  ['.stripslashes($row['Qty']).']</a><div class="cleaner"></div>';
										}
									echo'<div class="cleaner_h5"></div>';
									echo'<div id="newstudent" style="float:left; margin-left:20px;height:20px; "></div>
									<div class="cleaner_h5"></div>
								</div>';
						
	


				echo'</div>';
				echo'<div id="tabs-4">';
							echo '<h5 style="margin-left:6px;">Requested Services ::</h5>';


						// echo '<p style="font-size:11px;">';
						// echo '<div style="clear:both; margin-bottom:5px"></div>';
						// 	$resultb=mysqli_query($db, "SELECT * FROM opdservicerequests WHERE prescid='".htmlsan($_GET['prescno'])."' AND old_in_presc_id='".htmlsan($_GET['prescid'])."' AND patid='".htmlsan($clientno)."' AND old_in_patient_id='".htmlsan($_GET['clientid'])."' AND stamp>='".$d1."' and stamp<='".$d2."' order by id asc");
						// 	$num_resultsb = mysqli_num_rows($resultb);	
						// 	$xa=1;	
						// 	for ($i=0; $i <$num_resultsb; $i++) {
						// 		$rowb=mysqli_fetch_array($resultb);									
						// 		$notes = strip_tags($rowb['request'], '</br>');									
						// 		echo'<p style="font-size:11px;margin-left:20px;margin-top:0px;width:400px;height:8px;"><b>'.$xa.'. '.htmlspecialchars($notes).'</b>.</p><div style="clear:both; margin:0px 0; border-bottom:1px dashed #333"></div>';
						// 		$xa++;
						// 	}
						// echo'</p>';


						$resultq =mysqli_query($db, "SELECT * FROM sales WHERE  ClientId='".htmlsan($clientno)."' AND old_patient_id='".htmlsan($_GET['clientid'])."' AND Stamp>='".$d1."' AND Stamp<='".$d2."'  and Category IN ('OPD SERVICES') and Cashier!=''");
						$num_resultsa = mysqli_num_rows($resultq);
						$xa=1;	
						for ($i=0; $i <$num_resultsa; $i++) {
								$rowq=mysqli_fetch_array($resultq);
								echo '<a class="labels" style="margin-left:5px;"> <b>'.$xa.'. '.stripslashes($rowq['ItemName']).'- Price : ['.stripslashes($rowq['TotalPrice']).'/=]</b></a><br/><div class="cleaner"></div>';
								$xa++;
						}

				echo'</div>';


		echo'</div>';
   echo'</div>';
	
	break;

	case 13:
	echo"<script>$('#itemname').parent().find('input:first').focus().width(250);</script>";
	echo"<script>$('.combos').parent().find('input:first').width(250);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses General Admissions Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Admissions (FILTER CLINICS)
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Category:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Category:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="OverFive">Over 5</option>
						<option value="UnderFive">Under 5</option>
						<option value="Over60">Over 60</option>
					</select>
							</div>
						<div class="cleaner_h5"></div>';

						$result =mysqli_query($db, "select * from filterclinics order by name desc");
							$num_results = mysqli_num_rows($result);
				echo'<a class="labels" style="margin-left:20px">Gender:</a>
				<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="diseas" class="bh-visually-hidden">Gender:</label><select class="combos" id="diseas" style="width:250px; margin-left:10px;">';						
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
							}
							echo'</select>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">From:</a>
				<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">To:</a>
				<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
					<div class="cleaner"></div>
					<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
					<a class="labels" style="margin-left:10px; float:left">View All</a>
					
					<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="generalAdmissionsFilterClinic();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
		break;						

		case 14:
		echo"<script>$('#pntno').parent().find('input:first').focus();</script>";	
		$result = mysqli_query($db, "insert into log values('0','".$username." accesses drugs expiry Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

echo'
<div id="newstude">
	<div id="results">						
		<div style="height:469px; width:997px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
		     <h5 style="text-align:center">EXPIRY BY DATE RANGE</h5>';
	//echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-20px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help28()\"/></div>";								
		echo'<div class="cleaner_h5"></div>';


	$current_date= date('Y-m-d');
	$date = date_create($current_date);
	date_add($date, date_interval_create_from_date_string('90 days'));
	$next_one_month= date_format($date, "Y-m-d");				
	$result =mysqli_query($db, "select * from purchases  where expstamp<='".preg_replace('~-~', '',$next_one_month)."' and expstamp>='".preg_replace('~-~', '',$current_date)."'");
	$num_rows = mysqli_num_rows($result);
    $count = mysqli_num_rows($result);
	// for ($i = 0; $i < $count; $i++){
	// 	$row=mysqli_fetch_array($result);
	// 	$transid=stripslashes($row['TransNo']);
	// 	$itcode=stripslashes($row['ItemCode']);
	// 	$itname=stripslashes($row['ItemName']);
	// 	$pres=stripslashes($row['Prescription']);
	//  }		

  // echo " <div class='col-2'>";
  //   echo " <a class='somalabel' style='color:#fff;'>Total &nbsp;:&nbsp;<span>*</span></a>";
  //   echo " <input type='text' id='total' class='input_box' value='0' disabled='disabled'>";
  // echo " </div>";
  // echo " <div class='col-2'>";
  //   echo " <a class='somalabel' style='color:#fff;'>Bal &nbsp;:&nbsp;<span>*</span></a>";
  //   echo " <label for="bal" class="bh-visually-hidden">Bal</label><input type='text' id='bal' name='bal' class='input_box' disabled='disabled'>";
  // echo " </div>";
  // echo " <div class='cleaner_h10'></div>";

	echo'<div id="chati">
	        <div id="scrollbar1" style="width:960px; height:300px" onmouseenter="scroller();">
		     <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
		        <div class="viewport" style="width:960px; height:300px">
				 <div class="overview">
					<div id="inside" style="min-height:300px;">
						<div id="title">
							<div id="figure1"  style="width:120px">Expiry</div>
							<div id="figure1"  style="width:200px">Item Name</div>
							<div id="figure1"  style="width:120px">Category</div>
							<div id="figure1"  style="width:70px">Pack Size</div>
							<div id="figure1"  style="width:70px">Available</div>
							<div id="figure1"  style="width:93px">Expired</div>
							<div id="figure1"  style="width:90px">New Bal</div>
							<div id="figure1"  style="width:50px">Action</div>
						
						</div>';
							if($count==0){
								
								echo'<div class="cleaner_h5"></div>
								No records to display under this selection.';
							}
			
						for ($i = 0; $i < $count; $i++){
						$rw=mysqli_fetch_array($result);
						$ptransid=stripslashes($rw['TransNo']);
						$pitcode=stripslashes($rw['ItemCode']);
						$pitname=stripslashes($rw['ItemName']);
						$date=stripslashes($rw['PurchDate']);

								$resulta =mysqli_query($db, "select * from items where ItemCode='".$pitcode."'");
								$rowa=mysqli_fetch_array($resulta);
								//$num_rows = mysqli_num_rows($resulta);
								//for ($i = 0; $i < $num_rows; $i++){
									//$rowa=mysqli_fetch_array($resulta);
									//$transid=stripslashes($rowa['TransNo']);
								   //$tno=stripslashes($rowa['TransNo']);
									$code=stripslashes($rowa['ItemCode']);
									$itname=stripslashes($rowa['ItemName']);
									$scat=stripslashes($rowa['SubCategory']);
									$itpack=stripslashes($rowa['Pack']);
									$tqty=stripslashes($rowa['ADMINISTRATION']);
									$date=stripslashes($rw['PurchDate']);
									//$code=stripslashes($rowa['PrescId']);
									$nwqty=0;
				echo"<div id=\"normal\" title=\"Expired Drugs Record\" >";
					echo"<div id=\"date".$code."\" class=\"figure2t\" style=\"width:120px\">".$date."</div>
						 <div id=\"itname".$code."\" class=\"figure2t\" style=\"width:200px; height:16px; overflow:hidden\">".$itname."</div>
						 <div id=\"scat".$code."\" class=\"figure2t\" style=\"width:120px; height:16px; overflow:hidden\">".$scat."</div>
						 <div id=\"itpack".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">".$itpack."</div>
						 <div  class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">
						  <label for=\"curbal".$code."\" class=\"bh-visually-hidden\">Curbal . Code.</label><input type=\"text\" id=\"curbal".$code."\" name=\"curbal".$code."\" value=\"".$tqty."\" style=\"text-align:center; margin-top:-2px;width:70px\" />
						 </div>";
					echo"<div class=\"figure2t\" style=\"width:100px; height:16px; overflow:hidden\">
						 <label for=\"expdqty".$code."\" class=\"bh-visually-hidden\">Expdqty . Code.</label><input type=\"text\" onkeyup=\"chckqtybal(".$code.")\" id=\"expdqty".$code."\" name=\"expdqty".$code."\" style=\"text-align:center; margin-top:-2px;width:70px\" />
						 </div>";
					 echo"<div class=\"figure2t\" style=\"width:90px; height:16px; overflow:hidden\">
					 	  <label for=\"nwbal".$code."\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" id=\"nwbal".$code."\" style=\"text-align:center; margin-top:-2px;width:70px\" />
					 	  </div>";
					echo "<div id=\"display".$code."\" class=\"figure2t\" style=\"width:50px;height:16px; overflow:hidden\">
							<img alt=\"\" src=\"images/save.jpg\" onclick=\"recordexpiry('".$code."','".$itname."','".$itpack."','".$tqty."','".$expdqty."','".$nwbal."');\" width=\"22\" height=\"22\"/></div>";
				echo"</div>";

							//}				

					  }
			 echo'</div>
				</div>
			  </div>
		    </div>
	      </div>';



	echo'</div>
	</div>
</div>';

break;
			

case '14.1':
echo"<script>$('#pntno').parent().find('input:first').focus();</script>";	
$result = mysqli_query($db, "insert into log values('0','".$username." accesses drugs expiry Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

echo'
<div id="newstude">
	<div id="results">						
		<div style="height:469px; width:997px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
		     <h5 style="text-align:center">EXPIRY BY DATE RANGE 14.1</h5>';					
		echo'<div class="cleaner_h5"></div>';


	$current_date= date('Y-m-d');
	$date = date_create($current_date);
	date_add($date, date_interval_create_from_date_string('30 days'));
	$next_one_month= date_format($date, "Y-m-d");				
	#$next_one_month= date_format($date, "Y-m-d");				
	//$result =mysqli_query($db, "select * from purchases  where expstamp<='".preg_replace('~-~', '',$next_one_month)."' and expstamp>='".preg_replace('~-~', '',$current_date)."'");
	//$result =mysqli_query($db, "select * from purchases  where expstamp>='20210301' and expstamp>='".preg_replace('~-~', '',$next_one_month)."'");
	$result =mysqli_query($db, "select * from purchases  where expstamp>='20230301' and expstamp<='20231101'");
	$num_rows = mysqli_num_rows($result);
    $count = mysqli_num_rows($result);

	echo'<div id="chati">
	        <div style="width:960px; height:300px" >
		     <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
		        <div class="viewport" style="width:960px; height:300px">
				 <div class="overview">
					<div id="inside" style="min-height:300px;">
						<div id="title">
							<div id="figure1"  style="width:120px">ExpiryDate</div>
							<div id="figure1"  style="width:200px">Item Name</div>
							<div id="figure1"  style="width:70px">purchaseqty</div>
							<div id="figure1"  style="width:70px">purchasedbal</div>
							<div id="figure1"  style="width:70px">Used Qty</div>
							<div id="figure1"  style="width:70px">Expired Qty</div>
							<div id="figure1"  style="width:70px">Balance</div>
							<div id="figure1"  style="width:50px">Action</div>
						
						</div>';
							if($count==0){
								
								echo'<div class="cleaner_h5"></div>
								No records to display under this selection.';
							}
			
						for ($i = 0; $i < $count; $i++){
						$rw=mysqli_fetch_array($result);
						$ptransid=stripslashes($rw['TransNo']);
						$date=stripslashes($rw['PurchDate']);
						$pitcode=stripslashes($rw['ItemCode']);
						$pitname=stripslashes($rw['ItemName']);
						$purchaseqty=stripslashes($rw['Quantity']);
						$expirydate=stripslashes($rw['Expiry']);
						$purchasedbal=stripslashes($rw['Bal']);

								$resulta =mysqli_query($db, "select * from items where ItemCode='".$pitcode."'");
								$rowa=mysqli_fetch_array($resulta);
								$num_rows = mysqli_num_rows($resulta);
								  for ($i = 0; $i < $num_rows; $i++){
								 	$rowa=mysqli_fetch_array($resulta);
									$itembal=stripslashes($rowa['Bal']);

									$nwqty=0;
				echo"<div id=\"normal\" title=\"Expired Drugs Record\" >";
					echo"<div id=\"expirydate".$code."\" class=\"figure2t\" style=\"width:120px\">".$expirydate."</div>
						 <div id=\"itname".$code."\" class=\"figure2t\" style=\"width:200px; height:16px; overflow:hidden\">".$pitname."</div>
						 <div id=\"purchasedqty".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">".$purchasedqty."</div>
						 <div id=\"purchasedbal".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">".$purchasedbal."</div>
						 <div id=\"usedqty".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">usedqty</div>
						 <div id=\"expiredqty".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">expiredqty</div>
						 <div id=\"balance".$code."\" class=\"figure2t\" style=\"width:70px; height:16px; overflow:hidden\">".$itembal."</div>";

					echo "<div id=\"display".$code."\" class=\"figure2t\" style=\"width:50px;height:16px; overflow:hidden\">
							<img alt=\"\" src=\"images/save.jpg\"  width=\"22\" height=\"22\"/></div>";

				echo"</div>";

							}				

					  }
			 echo'</div>
				</div>
			  </div>
		    </div>
	      </div>';



			echo'</div>
			</div>
		</div>';

		break;

case 15:
$stamp=date('Ymd');
echo"<script>$('#dischargesum606').parent().find('input:first').focus();</script>";
echo'<div id="modalDiv"></div>';
	echo'<div id="alertDiv" style="min-height:110px; width:320px">
			<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
	echo"<h5 style=\"margin-right:10px; color:#fff\">Discharge Summary:";
	echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
	echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()">
		</h5></div>';
	$result =mysqli_query($db, "select * from inpatients where Admitted!=0 order by PrescId desc");
	$num_results = mysqli_num_rows($result);
echo'<div class="ui-widget" style="margin:0 10px 0 10px; float:left" id="searchpay">
	  <a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
	  <div class="cleaner_h5"></div>
	  <label for="dischargesum606" class="bh-visually-hidden">No. of Patients:</label><select id="dischargesum606">
		<option value="">Select one...</option>';
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		$pid=stripslashes($row['PrescId']);
		echo'<option value="'.stripslashes($row['Id']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'-['.stripslashes($row['TransDate']).']</option>';
		}							
	echo'</select>
	 </div>
		<input type="hidden" id="prescid" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
		<input type="hidden" id="prescno" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
		<input type="hidden" id="clientid" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
   <div class="cleaner_h5"></div>
</div>';
break;
case 16:
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Discharge Summary Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
$prescid=$_GET['pid'];
#$prescno=$pid=$_GET['prescno'];
#$clientid=$_GET['clientid'];
$resulta =mysqli_query($db, "select * from inpatients where Id='".$prescid."'"); 
$rowa=$rowq=mysqli_fetch_array($resulta);
$pid=$prescno=stripslashes($rowa['PrescId']);
$pntno=stripslashes($rowa['PatId']);
$acctype=stripslashes($rowa['BillinType']);
$typeclinics=stripslashes($rowa['TypeClinics']);
$old_in_presc_id=stripslashes($rowa['Id']);
$old_in_patient_id=stripslashes($rowa['old_in_patient_id']);
$result =mysqli_query($db, "select * from patients where auto='".stripslashes($rowa['old_in_patient_id'])."'");
$row=mysqli_fetch_array($result);

$resultb =mysqli_query($db, "select * from admdetails where pid='".$pid."' and pntno='".$pntno."'");
$rowb=mysqli_fetch_array($resultb);

$sqlDiscQry =mysqli_query($db, "select * from discharge where patid='".$pntno."' and old_in_patient_id='".$old_in_patient_id."' and old_in_presc_id='".$old_in_presc_id."' order by id desc limit 0,1");
#s$rowDisc=mysqli_fetch_array($sqlDiscQry);
#if(mysqli_num_rows($sqlDiscQry) > 0){
	$rowDisc=mysqli_fetch_array($sqlDiscQry);
	$sumno     = stripslashes($rowDisc['sumno']);
	$nextapp   = stripslashes($rowDisc['nextapp']);
	$diagnosis = stripslashes($rowDisc['diagnosis']);
	$medical = stripslashes($rowDisc['medical']);
	$clinical = stripslashes($rowDisc['clinical']);
#}
#else{ $sumno = 0; $nextapp = ''; $diagnosis = ''; $medical = ''; $clinical = ''; }
	echo'<div style="width:auto; margin:0px; height:471px; background:#none; border-radius:0px; padding:5px 0 5px 5px">';
	echo'<h2  style="float:left; padding:5px 5px 0 0; margin:0">DISCHARGE SUMMARY-'.stripslashes($rowa['PatName']).'-'.stripslashes($rowa['PatId']).'-'.$sumno.'-'.$pntno.'-'.$old_in_presc_id.'-'.$old_in_patient_id.'-'.$sumno.'</h2>';	
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('report.php?id=4&rcptno='".$pid."')\" title=\"Print Patient Report\">";
		echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;"><input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
			<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
			echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savenewdischarge('".$sumno."','".$pid."')\"/></div>";
				echo'<div id="res2" style="float:right;width:30px; height:10px; margin-left:10px"></div>';

				echo"<script>
						$('#docInpPharm1').parent().find('input:first').focus().width(180);
						$('#dr4').parent().find('input:first').width(100);
						$('#dr6').parent().find('input:first').width(100);
						$('#dr5').parent().find('input:first').width(100);
						$('#dr8').parent().find('input:first').width(100);
						$('#txtextmedicinc').parent().find('input:first').width(180);
						area10 = new nicEditor({fullPanel : true,maxHeight :230}).panelInstance('prescription');
				</script>";
  				// echo"$('#docopdUpt2').parent().find('input:first').width(150);
				  //    $('#docInpPharm1').parent().find('input:first').width(180);";

		echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>';
		echo'<div id="personal">';	

      echo'<input type="hidden" id="txtacctype" disabled="disabled" name="oname" style="border-color:var(--color-danger, #DC2626);display:none;" class="in_field" value="'.$acctype.'" disabled="disabled"/>';
      echo'<input type="hidden" id="typeclinics" disabled="disabled" name="oname"  style="border-color:var(--color-danger, #DC2626);display:none;" class="in_field" value="'.$typeclinics.'" disabled="disabled"/>';
	  echo'<input type="hidden" id="old_patient_id" disabled="disabled" value="'.$old_in_patient_id.'"/><input disabled="disabled" type="hidden" id="old_presc_id" value="'.$old_in_presc_id.'"/>';echo'<label for="recpharm" class="bh-visually-hidden">Recpharm</label><input type="checkbox" value="1" name="recpharm" id="recpharm" style="float:left;margin:8px 0 0 8px">
	<a class="labels" style="margin-left:10px">Send Prescription to Pharmacy On Save </a>';

		echo'</div>';

		echo'<div id="tabs4" style="width:748px; height:428px; float:left; margin:5px 0 0 0px; overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Admissions Details.</a></li>';
					echo'<li><a href="#tabs-2">Diagnosis.</a></li>';
					echo'<li><a href="#tabs-3">Prescription.</a></li>';
					echo'<li><a href="#tabs-4">Clinical Summary.</a></li>';
					echo'<li><a href="#tabs-5">Patient Interim Bill.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';

echo'<a class="labels" style="float:left">Pat No:</a>
<label for="patid" class="bh-visually-hidden">Patid</label><input type="text" id="patid" name="patid"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.makesafe(stripslashes($row['pntno'])).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Pat Name:</a>
<label for="patname" class="bh-visually-hidden">Patname</label><input type="text" id="patname" name="patname"   style="float:left;margin-left:10px;width:200px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.makesafe(stripslashes($rowa['PatName'])).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Address:</a>
<label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:90px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['address']).'" disabled="disabled"/> 
<div class="cleaner_h5"></div>
<a class="labels" style="float:left; margin-left:10px">Age:</a>
<label for="tdate" class="bh-visually-hidden">Age:</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">
<label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="float:left;border-color:var(--color-danger, #DC2626);margin-left:10px"/> 
<input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
echo'<a class="labels" style="float:left; margin-left:10px">Sex:</a>
<label for="sex" class="bh-visually-hidden">Oname</label><input type="text" id="sex" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['gender']).'" disabled="disabled"/> 	
<a class="labels" style="float:left; margin-left:5px">Contact:</a>
<label for="contact" class="bh-visually-hidden">Oname</label><input type="text" id="contact" name="oname"   style="float:left;margin-left:10px;width:120px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['contact']).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Doctor:</a>
<label for="doctor" class="bh-visually-hidden">Oname</label><input type="text" id="doctor" name="oname"   style="float:left;margin-left:10px;width:120px;" disabled="disabled" class="in_field" value="'.stripslashes($rowa['Doctor']).'"/> 
<div class="cleaner_h5"></div>
<a class="labels" style="float:left; margin-left:10px">Ward:</a>
<label for="ward" class="bh-visually-hidden">Oname</label><input type="text" id="ward" name="oname"   style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['WardType']).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Room No:</a>
<label for="roomno" class="bh-visually-hidden">Oname</label><input type="text" id="roomno" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['RoomNo']).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
<label for="bednum" class="bh-visually-hidden">Oname</label><input type="text" id="bednum" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['BedNo']).'" disabled="disabled"/> 
<a class="labels" style="float:left;margin-left:5px;">Date of Admission:</a>
<label for="datepick" class="bh-visually-hidden">Oname</label><input type="text" id="datepick" name="oname"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['AdmDate']).'" disabled="disabled"/> 
<div class="cleaner_h5"></div>
<a class="labels" style="float:left; margin-left:10px">Date of Discharge:</a>
<label for="datepick2" class="bh-visually-hidden">Oname</label><input type="text" id="datepick2" name="oname"   style="float:left;margin-left:10px;width:100px;" class="in_field" value="'.date('Y/m/d').'" /> 
<a class="labels" style="float:left; margin-left:10px">Next appointment:</a>
<label for="datepick3" class="bh-visually-hidden">Oname</label><input type="text" id="datepick3" name="oname"   style="float:left;margin-left:10px;width:150px;" class="in_field" value="'.$nextapp.'"/> 
<div class="cleaner_h5"></div>';


				echo'</div>';
				echo'<div id="tabs-2" style="float:right;height:100px;margin:2px;">';

							echo'<script>area31 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("disdiag");</script>
							<div style="width:330px;float:left;">
							<label for="disdiag" class="bh-visually-hidden">Text field</label><textarea id="disdiag"  style="float:left;height:236px; width:320px;" class="alergy">'.$diagnosis.'</textarea>
							</div>

							<div style="width:330px; border:1px solid #ccc; height:310px; float:left; margin-left:10px">
								<a class="labels" style="margin-left:10px;font-weight:bold">Diseases Summary:</a>';
								if(isset($_SESSION['dis'])){
										unset($_SESSION['dis']);
									}
								$_SESSION['diseases']=array();

								echo'<div class="cleaner_h5"></div>
								<div class="ui-widget"  style="float:left; margin-left:12px">
									<label for="disease" class="bh-visually-hidden">Diseases Summary:</label><select id="disease" class="combos">
										<option value="">Select one...</option>';
										$resulta =mysqli_query($db, "select * from diseases order by name");
										$num_resultsa = mysqli_num_rows($resulta);	
										for ($i=0; $i <$num_resultsa; $i++) {
											$row=mysqli_fetch_array($resulta);
											$name=stripslashes($row['name']);
										$k=stripslashes($row['id']);
											echo"<option value=\"".$k."ÃÂÃÂ¸".$name."\">".$name."</option>";
									    }
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
								<div id="diseases" style="width:100%;">';
									$parts=explode(';',stripslashes($rowq['DiagName']));
									foreach ($parts as $key => $val) {
									$_SESSION['dis'][$key]=$val;
										if($val!=''){
										echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismissdis(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
										}
									}
							echo'</div>';

						echo'</div>';


				echo'</div>';
				echo'<div id="tabs-3">';
					 // echo'<div style="width:430px; float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">'; '.date('d/m/Y').'-'.date('H:i').'
		if(isset($_SESSION['pharmcart'])){
							unset($_SESSION['pharmcart']);
						}

						echo'<h5>Medication</h5>
							<a class="labels" style="margin-left:0px;display:none;">Date:</a>
							<label for="datepick" class="bh-visually-hidden">Date:</label><input type="text" id="datepick" class="input_field" value="'.date('d/m/Y').'-'.date('H:i').'"  style="width:70px; margin-left:0px;display:none;"/>';
echo'<a class="labels" style="margin-left:10px">Item:</a>';
	echo'<div class="ui-widget" style="margin-left:0px; float:left;" >
		<label for="appcoDocOrder019" class="bh-visually-hidden">Item:</label><select class="drugname" id="appcoDocOrder019" style="margin-left:0px;float:left;">
		<option value="">Select one...</option>';
			$resultb =mysqli_query($db, "select * from items where PHARMACY>0 and SalePrice>0 and CorporatePrice>0 and InsurancePrice>0 and ApaPrice>0 and PacisPrice>0 and LiasonPrice>0 and OldMutualPrice>0 and KplcMinetPrice>0 and MaklMaternityPrice>0 and MinetCivilServantsPrice>0 and Type='GOOD' and Category='PHARMACEUTICALS' order by ItemName");			
			$num_resultsb = mysqli_num_rows($resultb);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$code=stripslashes($rowb['ItemCode']);
								$item=stripslashes($rowb['ItemName']);
								$sprice=stripslashes($rowb['SalePrice']);
								$cpr = stripslashes($rowb['CorporatePrice']);
								$ppr = stripslashes($rowb['InsurancePrice']);
								$categ = stripslashes($rowb['Category']);
								$catid = stripslashes($rowb['CategoryId']);
								$type = stripslashes($rowb['Type']);
								$bal = stripslashes($rowb['PHARMACY']);
								$coun = stripslashes($rowb['CO_UN']);
								$otcpr = stripslashes($rowb['OtcPrice']);
								$apapr = stripslashes($rowb['ApaPrice']);
								$pacis = stripslashes($rowb['PacisPrice']);
								$liason = stripslashes($rowb['LiasonPrice']);
								$mutual = stripslashes($rowb['OldMutualPrice']);
								$kplcmin = stripslashes($rowb['KplcMinetPrice']);
								$maklmat = stripslashes($rowb['MaklMaternityPrice']);
								$minetcs = stripslashes($rowb['MinetCivilServantsPrice']);
								echo"<option value=\"".$code."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$sprice."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$coun."ÃÂÃÂ¸".$otcpr."ÃÂÃÂ¸".$apapr."ÃÂÃÂ¸".$pacis."ÃÂÃÂ¸".$liason."ÃÂÃÂ¸".$mutual."ÃÂÃÂ¸".$kplcmin."ÃÂÃÂ¸".$maklmat."ÃÂÃÂ¸".$minetcs."\">".stripslashes($rowb['ItemName'])." Bal: ".stripslashes($rowb['PHARMACY'])."</option>";

							}
								echo'</select>
								</div>';							
	echo'<input type="hidden" disabled="disabled" id="txtproductcode" class="input_field" style="width:20px; margin-left:5px;display:none;"/>
	<input type="hidden" disabled="disabled" id="dname" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="dbal" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprnormal" name"txtprnormal" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate" name="txtprcorporate" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprInsurance" name="txtprInsurance" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="price254" class="input_field" style="width:70px; margin-left:10px;border-color:var(--color-danger, #DC2626);display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhcateg" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid" name="txtcatid" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtype" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtprice" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtdisc"  class="input_field" value="0" style="width:60px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhsub44" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>	
	<input type="hidden" disabled="disabled" id="lcmhtotal44" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
	//echo'<input type="hidden" id="regn" value="'.$patid.'"/><input type="hidden" id="oname" value="'.$patname.'"/>';
	
echo'<div class="ui_widget" style="margin-left:10px;float:left; width:100px;display:none;">
		<label for="txtextmedicinc" class="bh-visually-hidden">Text field</label><select id="txtextmedicinc">';
			echo'<option value="38">HOSPITAL</option>';
		echo"<script>$('#txtextmedicinc').parent().find('input:first').width(100);</script>";
	echo'</select>
	</div>';


#echo'<div class="cleaner_h5"></div>';
	echo'<a class="labels" style="margin-left:30px">Dosage</a>';
echo'<label for="dr9" class="bh-visually-hidden">Dosage</label><input type="text" id="dr9" class="in_field" value="" style="width:30px; float:left; margin-left:10px"/> 
		
		<div class="ui-widget" style="margin-left:2px; float:left;" >
		<label for="dr4" class="bh-visually-hidden">Dosage</label><select class="dr" id="dr4">
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
		
		</select>
		</div>
		

	<a class="labels" style="margin-left:30px">Route</a>
		<div class="ui-widget" style="margin-left:10px; float:left;" >
		<label for="dr6" class="bh-visually-hidden">Route</label><select class="dr" id="dr6">
		<option value="">Select one...</option>
		<option value="Oral">Oral</option>
		<option value="Rectal">Rectal</option>
		<option value="I.V">I.V</option>
		<option value="I.M">I.M</option>
		<option value="S.C">S.C</option>
		<option value="Intraspinal Injection">Intraspinal Injection</option>
		<option value="Inhalation">Inhalation</option>
		</select>
		</div>

		<div class="cleaner_h5"></div>	
		<a class="labels" style="margin-left:10px">Frequency</a>	
		<div class="ui-widget" style="margin-left:10px; float:left;" >
		<label for="dr5" class="bh-visually-hidden">Frequency</label><select class="dr" id="dr5">
		<option value="">Select one...</option>
		<option value="1">stat</option>
		<option value="1">n/a</option>
		<option value="24">Once Hourly</option>
		<option value="1">Once Daily</option>
		<option value="2">Twice Daily</option>
		<option value="3">Thrice Daily</option>
		<option value="0.1429">Once Weekly</option>
		<option value="0.2857">Twice Weekly</option>
		<option value="0.4286">Thrice Weekly</option>
		</select>
		</div>
		
		
	<a class="labels" style="margin-left:30px">Duration</a>
		<label for="dr7" class="bh-visually-hidden">Oname</label><input type="text" id="dr7" name="oname" class="in_field" value="" style="width:30px; float:left; margin-left:10px"/> 
		
		<div class="ui-widget" style="margin-left:2px; float:left;" >
		<label for="dr8" class="bh-visually-hidden">Duration</label><select class="dr" id="dr8">
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
		</div>';

	echo'<a class="labels" style="margin-left:30px">Qty:</a>
	<label for="quat4dr34" class="bh-visually-hidden">Qty:</label><input type="text" id="quat4dr34" class="input_field"  style="width:30px; margin-left:10px;" />';
		
 echo'<img alt="Document Add" src="images/document_add.png" style="margin-left:10px; width:30px; height:30px;float:left; cursor:pointer" onclick="addthispresc606()"/>';			
echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-left:5px; float:left\" title=\"View Current Cart\" onclick=\"viewpharmcartbill('nurse')\"/>";								
	echo'<div style="width:710px; float:left;padding:2px;">';
		echo'<div id="consultabs6" style="height:284px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Prescription Summary.</a></li>';
					echo'<li><a href="#tabs-2">Invoice Items.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 echo'<div>';
			     	 		#echo'<h5>Prescription</h5>';
							echo'<label for="prescription" class="bh-visually-hidden">Prescription</label><textarea id="prescription" style="float:left;height:180px; width:650px" class="alergy">
								'.$medical.'';
							echo'</textarea>';
								
					 echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="float:right;height:100px;margin:2px;">';
					 #echo'<div style="float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
					 		echo'<div id="displayinv" style="background-color:#fff;margin-left:10px;">';
					 		echo'</div>';
					 #echo'</div>';
				echo'</div>';

		echo'</div>';
   echo'</div>';


					 // echo'</div>';
				echo'</div>';
				echo'<div id="tabs-4">';
						echo'<script>area33 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("clinsumm");</script>';
						echo'<label for="clinsumm" class="bh-visually-hidden">Text field</label><textarea id="clinsumm" style="float:left;height:250px; width:650px" class="alergy">'.$clinical.'</textarea>';

				echo'</div>';
				echo'<div id="tabs-5">';
					echo'
	<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333; overflow:auto;">
	<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Date-Time</p>
	</div>
	<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Department</p>
	</div>
	<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Item Name</p>
	</div>
	<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Unit Price</p>
	</div>
	<div style="width:30px; height:20px;border-right:1.5px solid #333; float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Qty</p>
	</div>
	<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Price</p>
	</div>
	<div style="width:110px; height:20px;float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Username</p>
	</div>
	</div>';


		$result =mysqli_query($db, "select * from tempbill where patid='".$pntno."' and old_in_presc_id='".$old_in_presc_id."' and old_in_patient_id='".$old_in_patient_id."' and itcode!='84' ");
		$c=0;
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		$patname=stripslashes($row['patname']) ;
		$c+=preg_replace('~,~', '', stripslashes($row['subnet']));
		if($i%2==0){
			echo'<div style="height:20px; border-bottom:1.5px solid #333; border-left:1.5px solid #333;" id="normal'.$i.'"">';
			}else{
				echo'<div style="height:20px; border-bottom:1.5px solid #333;border-left:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
			}
		
		echo'
		<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($row['date']).'</p>
		</div>
		<div style="width:80px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($row['category']).'</p>
		</div>
		<div style="width:200px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($row['itname']).'</p>
		</div>
		<div style="width:60px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($row['price']).'</p>
		</div>
		<div style="width:30px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($row['quat']).'</p>
		</div>
		<div style="width:65px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($row['subnet']).'</p>
		</div>
		<div style="width:110px;height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($row['fullname']).'</p>
		</div>
		
		</div><div class="cleaner"></div>';

	}

echo'
<div class="cleaner_h10"></div>
<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">Total:<b>'.number_format($c, 2).'</b></p>';

	 echo'<div id="newstudent" style="float:right; margin-right:10px;height:40px; "></div>';

				echo'</div>';
		echo'</div>';
   echo'</div>';
	
	break;
						
		
		
	
	case 17:
	echo"<script>$('#customsendto').parent().find('input:first').focus();</script>";
	echo'<div id="modalDiv"></div>';
echo'<div id="alertDiv" style="min-height:200px; width:320px">
		<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
	<h5 style="margin-right:10px; color:#fff">CUSTOM DEPARTMENTAL LIST
	<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
	</div>';
	echo'<div class="cleaner_h5"></div>';
	echo'<a class="labels" style="margin-left:20px">Department:<span>*</span></a>';
	 echo'<div class="ui-widget" style="margin-left:10px;float:left; width:270px">
			<label for="customsendto" class="bh-visually-hidden">Customsendto</label><select class="select" id="customsendto" name="customsendto" style="width:260px; margin-left:10px;">';
			echo'<option value=""></option>';
				$result =mysqli_query($db, "SELECT id,name FROM sendto WHERE id NOT IN ('1','2','9','10','13') ORDER BY name ASC");
				$num_results = mysqli_num_rows($result);
				for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
   					echo"<option value=\"".stripslashes($row['name'])."\">".stripslashes($row['name'])."</option>";
				}

	   echo'</select>
		</div>';
	echo'<div class="cleaner_h5"></div>';
	echo'<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:20px">From:</a>
	<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
	<div class="cleaner_h5"></div>
	<a class="labels" style="margin-left:20px">To:</a>
	<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
		<div class="cleaner"></div>
		<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
		<a class="labels" style="margin-left:10px; float:left">View All</a>
		
		<div class="cleaner_h5"></div>
						<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
						<input type="button" value="Submit" style="float:right; margin-right:10px; 
						cursor:pointer; width:80px" class="select" onclick="generatecustombydeptrept();"/>
		<div class="cleaner_h5"></div>
			
			</div>';

	break;
		
		
	case 18:
				$stamp=date('Ymd');
				echo"<script>$('#cons23').parent().find('input:first').focus();</script>";
			echo'<div id="modalDiv2"></div>';
		echo'<div id="mon" style="min-height:110px;max-height:320px;  width:320px;">';

			echo'<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
				echo"<h5 style=\"margin-right:10px; color:#fff\">Inpatient Billing:";					
					echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()">';
				echo'</h5>';
			echo'</div>';
					
		echo '<div class="col-6 col-md" style="margin-left:20px;">';
		    echo '<h5>Operations</h5>';
		    echo '<div class="cleaner_h5"></div>';
		    echo '<ul>';
		        #echo '<li>';

					 	$arr=array();
						$result =mysqli_query($db, "select * from accesstbl");
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$var=stripslashes($row[$usertype]);
							$code=stripslashes($row['AccessCode']);
							$arr[$code]=$var;
						}

	if($arr[101]=='YES'){echo '<li><a onclick="ipdcashbill();" style="font-size:15px;">CASH PAYING</a></li>';}
	else{echo '<li style="color:#ccc;display:none;"><a style="font-size:15px;">CASH PAYING</a></li>';}

	if($arr[210]=='YES'){ echo '<li><a onclick="inbill();" style="font-size:15px;">COMPANY PAYING</a></li>';}
	else{echo '<li style="color:#ccc;display:none;"><a style="font-size:15px;">COMPANY PAYING</a></li>';}
	
				
			   # echo '</li>';
			 echo '</ul>';
		echo '</div>';


	      echo'</div>';
	    echo'</div>';
	echo'</div>';
				
	break;

case 19:
$stamp=date('Ymd');
echo"<script>$('#riassunto_del_referto_medico834').parent().find('input:first').focus();</script>";
echo'<div id="modalDiv"></div>';
	echo'<div id="alertDiv" style="min-height:110px; width:320px">
			<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
	echo"<h5 style=\"margin-right:10px; color:#fff\">Medical Report Summary:";
	echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
	echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()">
		</h5></div>';
	$result =mysqli_query($db, "select * from inpatients where Admitted!=0 order by PrescId desc");
	$num_results = mysqli_num_rows($result);
echo'<div class="ui-widget" style="margin:0 10px 0 10px; float:left" id="buscar">
	  <a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
	  <div class="cleaner_h5"></div>
	  <label for="riassunto_del_referto_medico834" class="bh-visually-hidden">No. of Patients:</label><select id="riassunto_del_referto_medico834">
		<option value="">Select one...</option>';
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		$pid=stripslashes($row['PrescId']);
		echo'<option value="'.stripslashes($row['Id']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'</option>';
		}							
	echo'</select>
	 </div>
		<input type="hidden" id="prescid" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
		<input type="hidden" id="prescno" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
		<input type="hidden" id="clientid" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
   <div class="cleaner_h5"></div>
</div>';
break;
case 20:
$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses medical report summary panel for PrescId:".$_GET['pid']."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");


#$result = mysqli_query($db, "insert into log values('0','".$username." accesses medical report summary panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
$prescid=$_GET['pid'];
#$prescno=$pid=$_GET['prescno'];
#$clientid=$_GET['clientid'];
$resulta =mysqli_query($db, "select * from inpatients where Id='".$prescid."'"); 
$rowa=mysqli_fetch_array($resulta);
$pid=stripslashes($rowa['PrescId']);
$pntno=stripslashes($rowa['PatId']);
$patname=stripslashes($rowa['PatName']);
$acctype=stripslashes($rowa['BillinType']);
$typeclinics=stripslashes($rowa['TypeClinics']);
$old_in_presc_id=stripslashes($rowa['Id']);
$old_in_patient_id=stripslashes($rowa['old_in_patient_id']);
$result =mysqli_query($db, "select * from patients where auto='".stripslashes($rowa['old_in_patient_id'])."'");
$row=mysqli_fetch_array($result);

// $resultb =mysqli_query($db, "select * from admdetails where pid='".$pid."' and pntno='".$pntno."'");
// $rowb=mysqli_fetch_array($resultb);

$resultc=mysqli_query($db, "SELECT * FROM tblrefertomedico WHERE ClientId='".$old_in_patient_id."' AND ClientNo='".$pntno."' AND PrescId='".$prescid."' AND PrescNo='".$pid."' ORDER BY Id DESC LIMIT 0,1");
$rowc=mysqli_fetch_array($resultc);
// if(mysqli_num_rows($resultc)>0){
// echo"
// 		<script>
// 		$().customAlert();
// 		alert('Error!', '<p>Todays Report For ".$patname." Already Exists!.Try again Tomorrow.</p>');
// 		e.preventDefault();
// 		</script>";	
// 		exit;
// }
if(mysqli_num_rows($resultc)>0){ $medico=stripslashes($rowc['Id']); } else{$medico=0; } 
#$medico_id=stripslashes($rowc['Id']);
#$discharge_last_id = 
	echo'<div style="width:auto; margin:0px; height:471px; background:#none; border-radius:0px; padding:5px 0 5px 5px">';
	echo'<h2  style="float:left; padding:5px 5px 0 0; margin:0">PAZIENTE MEDICAL SUMMARY-'.stripslashes($rowa['PatName']).'-'.stripslashes($rowa['PatId']).'-'.$pid.'</h2>';	
						echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('report.php?id=4.2&url_uno=".safe_encode(htmlsan($old_in_patient_id))."&url_dos=".safe_encode(htmlsan($pntno))."&url_tres=".safe_encode(htmlsan($old_in_presc_id))."&url_cuatro=".safe_encode(htmlsan($pid))."')\" title=\"Print Patient Report\">";
		echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;"><input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
			<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
			echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savenewrefertomedico('".$medico."','".$pid."')\"/></div>";
				echo'<div id="res2" style="float:right;width:30px; height:10px; margin-left:10px"></div>';

				echo"<script>
						$('#docInpPharm1').parent().find('input:first').focus().width(180);
						$('#dr4').parent().find('input:first').width(100);
						$('#dr6').parent().find('input:first').width(100);
						$('#dr5').parent().find('input:first').width(100);
						$('#dr8').parent().find('input:first').width(100);
						$('#txtextmedicinc').parent().find('input:first').width(180);
						area10 = new nicEditor({fullPanel : true,maxHeight :230}).panelInstance('prescription');
				</script>";
  				// echo"$('#docopdUpt2').parent().find('input:first').width(150);
				  //    $('#docInpPharm1').parent().find('input:first').width(180);";

		echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>';
		#echo'<div id="personal">';	

      echo'<input type="hidden" id="txtacctype" disabled="disabled" name="oname" style="border-color:var(--color-danger, #DC2626);display:none;" class="in_field" value="'.$acctype.'" disabled="disabled"/>';
      echo'<input type="hidden" id="typeclinics" disabled="disabled" name="oname"  style="border-color:var(--color-danger, #DC2626);display:none;" class="in_field" value="'.$typeclinics.'" disabled="disabled"/>';
	  echo'<input type="hidden" id="old_patient_id" disabled="disabled" value="'.$old_in_patient_id.'"/><input disabled="disabled" type="hidden" id="old_presc_id" value="'.$old_in_presc_id.'"/>';

	//   echo'<input type="checkbox" value="1" name="recpharm" id="recpharm" style="float:left;margin:8px 0 0 8px">
	// <a class="labels" style="margin-left:10px">Send Prescription to Pharmacy On Save </a>';

		#echo'</div>';

		echo'<div id="tabs4" style="width:998px; height:428px; float:left; margin:5px 0 0 0px; overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Admissions Details.</a></li>';
					echo'<li><a href="#riassunto_clinico" title="Finding [no letter s]-clinico">Clinical Summary.</a></li>';
					echo'<li><a href="#risultati_clinici" title="Findings [with letter s]-clinici">Clinical Findings.</a></li>';
					echo'<li><a href="#indagini">Investigations.</a></li>';
					echo'<li><a href="#diagnosi">Diagnosis.</a></li>';
					echo'<li><a href="#trattamento">Prescription.</a></li>';
					echo'<li><a href="#urgent_admission_request_justification" title="Urgent Admission Request Justification:">Justification.</a></li>';
					echo'<li><a href="#raccomandazioni">Recommendation</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';

echo'<a class="labels" style="float:left">Pat No:</a>
<label for="patid" class="bh-visually-hidden">Patid</label><input type="text" id="patid" name="patid"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['pntno']).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Pat Name:</a>
<label for="patname" class="bh-visually-hidden">Patname</label><input type="text" id="patname" name="patname"   style="float:left;margin-left:10px;width:200px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['PatName']).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Address:</a>
<label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:90px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['address']).'" disabled="disabled"/> 
<div class="cleaner_h5"></div>
<a class="labels" style="float:left; margin-left:10px">Age:</a>
<label for="tdate" class="bh-visually-hidden">Age:</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">
<label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="float:left;border-color:var(--color-danger, #DC2626);margin-left:10px"/> 
<input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
echo'<a class="labels" style="float:left; margin-left:10px">Sex:</a>
<label for="sex" class="bh-visually-hidden">Oname</label><input type="text" id="sex" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626);" class="in_field" value="'.stripslashes($row['gender']).'" disabled="disabled"/> 	
<a class="labels" style="float:left; margin-left:5px">Contact:</a>
<label for="contact" class="bh-visually-hidden">Oname</label><input type="text" id="contact" name="oname"   style="float:left;margin-left:10px;width:120px;border-color:var(--color-danger, #DC2626);" class="in_field" value="'.stripslashes($row['contact']).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Doctor:</a>
<label for="doctor" class="bh-visually-hidden">Oname</label><input type="text" id="doctor" name="oname"   style="float:left;margin-left:10px;width:120px;border-color:var(--color-danger, #DC2626);" disabled="disabled" class="in_field" value="'.$fullname.'"/> 
<div class="cleaner_h5"></div>
<a class="labels" style="float:left;margin-left:5px;">Date of Admission:</a>
<label for="datepick" class="bh-visually-hidden">Oname</label><input type="text" id="datepick" name="oname"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626);" class="in_field" value="'.stripslashes($rowa['AdmDate']).'" disabled="disabled"/> 
<a class="labels" style="float:left; margin-left:10px">Date:</a>
<label for="datepick2" class="bh-visually-hidden">Oname</label><input type="text" id="datepick2" name="oname"   style="float:left;margin-left:10px;width:100px;" class="in_field" value="'.date('Y/m/d').'" /> 
<input type="hidden" id="datepick3" name="oname" style="float:left;margin-left:10px;width:150px;display:none;" class="in_field" value="'.stampreverse(date('Y/m/d')).'"/> 
<input type="hidden" id="lc_hospital" name="lc_hospital"   style="float:left;margin-left:10px;width:300px;display:none;" value="TEFJU0FNSVMgQ0FUSE9MSUMgTUlTU0lPTiBIT1NQSVRBTA--"/> 
<div class="cleaner_h5"></div>';


				echo'</div>';
				echo'<div id="riassunto_clinico" title="Finding [no letter s]-clinico">';
						echo'<h5>Clinical Summary:</h5>';
						echo'<script>area33 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("clinsumm");</script>';
						echo'<label for="clinsumm" class="bh-visually-hidden">Clinical Summary:</label><textarea id="clinsumm" style="float:left;height:250px; width:950px" class="alergy">'.stripslashes($rowc['ClinicalSummary']).'</textarea>';

				echo'</div>';
				echo'<div id="risultati_clinici" title="Findings [with letter s]-clinici">';
						echo'<h5>Clinical Findings (on Presentation):</h5>';
						echo'<script>area34 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("risultaticlinici");</script>';
						echo'<label for="risultaticlinici" class="bh-visually-hidden">Clinical Findings (on Presentation):</label><textarea id="risultaticlinici" style="float:left;height:250px; width:950px" class="alergy">'.stripslashes($rowc['ClinicalFindings']).'</textarea>';

				echo'</div>';
				echo'<div id="indagini">';
						echo'<h5>Investigations</h5>';
						echo'<script>area35 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("investigations");</script>';
						echo'<label for="investigations" class="bh-visually-hidden">Investigations</label><textarea id="investigations" style="float:left;height:250px; width:950px" class="alergy">'.stripslashes($rowc['Investigations']).'</textarea>';


				echo'</div>';
				echo'<div id="diagnosi" style="float:;height:100px;margin:2px;">';

							echo'<script>area31 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("disdiag");</script>
							<div style="width:330px;float:left;">
							<label for="disdiag" class="bh-visually-hidden">Text field</label><textarea id="disdiag"  style="float:left;height:236px; width:620px;" class="alergy">'.stripslashes($rowc['Diagnosi']).'</textarea>
							</div>

							<div style="width:330px; border:1px solid #ccc; height:310px; float:right; margin-left:10px">
								<a class="labels" style="margin-left:10px;font-weight:bold">Diseases Summary:</a>';
								if(isset($_SESSION['dis'])){
										unset($_SESSION['dis']);
									}
								$_SESSION['diseases']=array();

								echo'<div class="cleaner_h5"></div>
								<div class="ui-widget"  style="float:left; margin-left:12px">
									<label for="disease" class="bh-visually-hidden">Diseases Summary:</label><select id="disease" class="combos">
										<option value="">Select one...</option>';
										$resulta =mysqli_query($db, "select * from diseases order by name");
										$num_resultsa = mysqli_num_rows($resulta);	
										for ($i=0; $i <$num_resultsa; $i++) {
											$row=mysqli_fetch_array($resulta);
											$name=stripslashes($row['name']);
										$k=stripslashes($row['id']);
											echo"<option value=\"".$k."ÃÂÃÂ¸".$name."\">".$name."</option>";
									    }
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
								<div id="diseases" style="width:100%;">';
									$parts=explode(';',stripslashes($rowa['DiagName']));
									#$parts=explode(';',stripslashes($rowc['Diseases']));
									foreach ($parts as $key => $val) {
									$_SESSION['dis'][$key]=$val;
										if($val!=''){
										echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismissdis(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
										}
									}
							echo'</div>';

						echo'</div>';


				echo'</div>';
				echo'<div id="trattamento">';

						#echo'<h5>Medication</h5>';
								
	echo'<div style="width:710px; float:left;padding:2px;">';
		echo'<div id="consultabs6" style="height:284px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Prescription Summary.</a></li>';
					echo'<li><a href="#tabs-2">Invoice Items.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 echo'<div>';
			     	 		#echo'<h5>Prescription</h5>';
							echo'<label for="prescription" class="bh-visually-hidden">Prescription</label><textarea id="prescription" style="float:left;height:180px; width:650px" class="alergy">
								'.stripslashes($rowc['Trattamento']).'';
							echo'</textarea>';
								
					 echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="float:right;height:100px;margin:2px;">';
					 #echo'<div style="float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
					 		echo'<div id="displayinv" style="background-color:#fff;margin-left:10px;">';
					 		echo'</div>';
					 #echo'</div>';
				echo'</div>';

		echo'</div>';
   echo'</div>';


					 // echo'</div>';
				echo'</div>';
				echo'<div id="urgent_admission_request_justification">';
						echo'<h5>Urgent Admission Request Justification:</h5>';
						echo'<script>area36 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("urgent_admission_request");</script>';
						echo'<label for="urgent_admission_request" class="bh-visually-hidden">Urgent Admission Request Justification:</label><textarea id="urgent_admission_request" style="float:left;height:250px; width:950px" class="alergy">'.stripslashes($rowc['UrgentAdmissionRequest']).'</textarea>';

				echo'</div>';
				echo'<div id="raccomandazioni">';
						echo'<h5>Recommendation:</h5>';
						echo'<script>area37 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("raccomandazione");</script>';
						echo'<label for="raccomandazione" class="bh-visually-hidden">Recommendation:</label><textarea id="raccomandazione" style="float:left;height:250px; width:950px" class="alergy">'.stripslashes($rowc['Raccomandazione']).'</textarea>';

				echo'</div>';




		echo'</div>';
   echo'</div>';
	
	break;
						

		case 21:
						//Consultations panel		 
			$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses Consultations Panel-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");

						$pid=$_GET['pid'];
						$resulta =mysqli_query($db, "select * from newprescription where PrescId='".$pid."'");
						$rowa=mysqli_fetch_array($resulta);
						$pntno=$patid=htmlsan(stripslashes($rowa['PatId']));
						$old_in_presc_id=stripslashes($rowa['Id']);
						$old_in_presc_no=stripslashes($rowa['PrescId']);
						$old_in_patient_id=htmlsan(stripslashes($rowa['old_patient_id']));
						$dept=htmlsan(stripslashes($rowa['Dept']));
						$dcare=stripslashes($rowa['DayCare']);
						$pharmpresc=stripslashes($rowa['Prescription']);
						$transdate=stripslashes($rowa['TransDate']);
						$pharmtime=stripslashes($rowa['PharmTime']);
						$acctype=htmlsan(stripslashes($rowa['AccType']));
						$clinic_id=htmlsan(stripslashes($rowa['type_clinic_id']));
						$clinikId=stripslashes($rowa['type_clinic_id']);
						$in_insurer_id=stripslashes($rowa['in_insurer_id']);
						$in_insurer_name=stripslashes($rowa['in_insurer_name']);
						$mode=stripslashes($rowa['Mode']);
						#$typeclinik=stripslashes($rowa['OtherDetails']);
						$patientclinic=mysqli_real_escape_string($db, trim(stripslashes($rowa['OtherDetails'])));
						#$typeclinik=strip_tags($patientclinic);
						$clinikname=getClinicByName($db, $clinic_id);
						$typeclinik=getClinicById($db, $clinic_id);
						$result =mysqli_query($db, "select * from patients where auto='".$old_in_patient_id."'");
						$row=mysqli_fetch_array($result);
						$old_in_patient_id=stripslashes($row['auto']);
						$patname=htmlsan(stripslashes($row['fullnames']));
						$in_ins_no=stripslashes($row['insid']);
						$in_ins_name=stripslashes($row['insurer']);

						if (($acctype != null ) || ($acctype != '')) { 
							$acctype = htmlsan(stripslashes($rowa['AccType'])); } 
						else if ($acctype == '') { $acctype = stripslashes($row['accountype']); }  
						else{ 
							$acctype = 'Normal'; }
						
        				#if ($acctype != null ||$acctype != ''||$in_insurer_id == 14 || $in_insurer_name == 'CASH') { $mode='Cash'; } else { $mode='Companies'; }
						echo'<div id="newstude">';
						echo"<script>
							document.onkeydown = keydown;
							function keydown(evt){
								if (!evt) evt = event;
								if (evt.keyCode==123){ //f12
									savenewswitchboardpresc('".$pid."'); 
								}
							}
							</script>";
						echo"<h2  style=\"float:left; padding:5px 5px 0 0; margin:0\">".$dept."-".htmlsan(stripslashes($row['fullnames']))." [".stripslashes($row['pntno'])."] </h2>";
								
						echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('patreport.php?id=1&reg=".$patid."')\" title=\"Print Patient Report\">";
						echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
						<input type="button" value="Help" id="submit"  style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help53();"/></div>
						<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
						<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
						<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
						<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">';
						echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savenewswitchboardpresc('".$pid."')\"/></div>";
						echo"<script>$('#switchpaymodeins').parent().find('input:first').width(130).prop('disabled',true);$('#switchboard').parent().find('input:first').width(130);</script>
						<script>
						$('#docopdUpt2').parent().find('input:first').width(150);
						$('#switchpaymodeins').css({'border' : 'solid #DC2626 1px'});
						$('#switchboard').css({'border' : 'solid #DC2626 1px'});
						$('#symptoms').parent().find('input:first').width(530);
						$('#diagt').parent().find('input:first').width(330);
						$('#surgt').parent().find('input:first').width(530);
						$('#treat').parent().find('input:first').width(530);
						$('#presct').parent().find('input:first').width(430);
						$('#dr1').parent().find('input:first').width(180);
						$('.dr').parent().find('input:first').width(75);
						$('#radt').parent().find('input:first').width(300);
						$('#appcoDocOrder019').parent().find('input:first').width(180);
						$('#widg1').live('keydown', function(evt) {
							if (!evt) evt = event;
							if (evt.keyCode==13){ 
							clearsymp();
								}
							});
							$('#widg2').live('keydown', function(evt) {
							if (!evt) evt = event;
							if (evt.keyCode==13){ 
							clearlab();
								}
							});
							$('#widg3').live('keydown', function(evt) {
							if (!evt) evt = event;
							if (evt.keyCode==13){ 
							clearrad();
								}
							});
							$('#widg4').live('keydown', function(evt) {
							if (!evt) evt = event;
							if (evt.keyCode==13){ 
							cleardiag();
								}
							});
							$('#widg5').live('keydown', function(evt) {
							if (!evt) evt = event;
							if (evt.keyCode==13){ 
							clearsurg();
								}
							});
							$('#widg6').live('keydown', function(evt) {
							if (!evt) evt = event;
							if (evt.keyCode==13){ 
							cleartreat();
								}
							});
							$('#widg7').live('keydown', function(evt) {
							if (!evt) evt = event;
							if (evt.keyCode==13){ 
							clearpresc();
								}
							});
							</script>";		
						echo'<script>
						$(function(){
						
						area3 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("history");
						area8 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("diagnosis");
						area9 = new nicEditor({fullPanel : true,maxHeight :300}).panelInstance("treatment");
						area10 = new nicEditor({fullPanel : true,maxHeight :220}).panelInstance("prescription");
						area14 = new nicEditor({fullPanel : true,maxHeight :350}).panelInstance("phyexam");
						area16 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("diagnosis254");
						area18 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("history2");
						});
						</script>
						<div class="cleaner" style="border-bottom:2px solid #333"></div>
								
						<div id="tabs" style="width:996px; height:433px">
						<ul>
							<li><a href="#tabs-1">Demographics</a></li>
							<li><a href="#tabs-2">Triage Analysis</a></li>
							<li><a href="#tabs-12">Past History</a></li>
							<li><a href="#tabs-3">Current History</a></li>
							<li><a href="#tabs-8">Physical Examination</a></li>
							<li style="display:none;"><a href="#tabs-7">DiagnosisPHCD</a></li>
							<li><a href="#tabs_phc_diagnosis">Diagnosis</a></li>
							<li style="display:none;"><a href="#tabs-9" style="display:none;">1</a></li>
							<li style="display:none;"><a href="#tabs-19" style="display:none;">2</a></li>
							<li><a href="#tabs-10">Pharmacy</a></li>
							<li><a href="#tabs-5">Laboratory</a></li>
							<li><a href="#tabs-6">Radiology</a></li>
							<li><a href="#tabs-18">Service Billing</a></li>
							<li><a href="#tabs-11">Other Details</a></li>
							<li style="display:;"><a href="#tabs-14">Bill</a></li>
							
						</ul>';
	if($dcare==1){
		$xxx=0;
							
							}else {$xxx=1;}
	echo'<div id="tabs-1">
	<form method="post" name="personal_form" action="#">
								<input type="hidden" name="post" value="Send" />
								<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px">
								<h5>Demographics</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field" value="'.htmlsan(stripslashes($row['pntno'])).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
								<div class="cleaner_h5"></div>
								<a class="labels">Full Names:<span>*</span></a>
                                <label for="oname" class="bh-visually-hidden">Oname</label><input type="text" id="oname" name="oname" class="in_field" value="'.htmlsan(stripslashes($row['fullnames'])).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
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
								echo'<div class="cleaner_h5"></div> 
								<a class="labels">Contact:<span>*</span></a>
                                <label for="stream" class="bh-visually-hidden">Stream</label><input type="text" id="stream"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" name="stream" class="in_field" value="'.stripslashes($row['contact']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">B.Group:<strong style="margin-left:20px"> '.stripslashes($row['bgroup']).'</strong></a>
                                <div class="cleaner_h5"></div>
								<a class="labels" style="display:;">AccType:<span>*</span></a>
      <label for="txtacctype" class="bh-visually-hidden">Txtacctype</label><input type="text" id="txtacctype" name="txtacctype" style="border-color:var(--color-danger, #DC2626);display:;" class="in_field" value="'.$acctype.'" disabled="disabled"/> 
                                <div class="cleaner_h5"></div>
      <label for="accntype" class="bh-visually-hidden">Accntype</label><input type="text" id="accntype" name="accntype" style="border-color:var(--color-danger, #DC2626);display:none;" class="in_field" value="'.stripslashes($row['accountype']).'" disabled="disabled"/> 
                                <div class="cleaner_h5"></div>
								<a class="labels">Clinic:<span>*</span></a>
      <label for="typeclinics254" class="bh-visually-hidden">Oname</label><input type="text" id="typeclinics254" name="oname"   style="border-color:var(--color-danger, #DC2626);display:;" class="in_field" value="'.$typeclinik.'" disabled="disabled"/> 
				
					</div>
								
							
								
								<div id="personal" style="border-right:1px solid #ccc;  height:365px; margin-left:0px">
								<h5>Employer Details</h5>
								<a class="labels">Employer:</a>
								<label for="tcr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tcr" name="gaddress" class="in_field" value="'.stripslashes($row['empname']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Emp. No:</a>
								<label for="tdr" class="bh-visually-hidden">Gaddress</label><input type="text" id="tdr" name="gaddress" class="in_field" value="'.stripslashes($row['empno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
								<div class="cleaner_h5"></div>';
								 echo'<h5>Insurance Scheme Details</h5>';
									 echo'<div class="cleaner_h5" id="signboard"></div>';
									echo'<a class="labels" style="display:;">Mode:</a>';	
										echo'<div class="ui_widget"  style="margin-right:25px;float:right;display:;">';						
											echo'<label for="switchboard" class="bh-visually-hidden">Mode:</label><select id="switchboard" style="margin-left:10px;">';
													echo'<option value="">select one...</option>';
													echo'<option value="'.$mode.'" selected="selected">'.$mode.'</option>';
											echo'</select>';
									 echo'</div>';
	                                echo'<div class="cleaner_h5"></div>';
									echo'<a class="labels" style="display:;">Insurer:</a>
									<div class="ui-widget" style="margin-right:25px; float:right;border-color:var(--color-danger, #DC2626);display:;" disabled="disabled">
									<label for="switchpaymodeins" class="bh-visually-hidden">Insurer:</label><select id="switchpaymodeins" style="width:260px; margin-left:10px;" >';
							echo'<option value="'.stripslashes($rowa['in_insurer_id']).'ÃÂÃÂ¸'.stripslashes($rowa['in_insurer_name']).'" selected="selected">'.stripslashes($rowa['in_insurer_name']).'</option>';
									echo'</select>
									</div>'; 
									echo'<div class="cleaner_h5"></div>';
									echo'<a class="labels">Card No:</a>
									<label for="cardno" class="bh-visually-hidden">Gaddress</label><input type="text" id="cardno" name="gaddress" class="in_field" value="'.htmlsan(stripslashes($row['cardno'])).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/>';

								echo'<div class="cleaner_h5"></div>';
								echo'<input type="hidden" id="insid" name="oname" class="in_field" disabled="disabled" style="border-color:f00;display:none;"/> 
								<input type="hidden" id="insname" name="oname" class="in_field" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/>';
								echo'<input type="hidden" id="in_defaultins_no" value="'.stripslashes($row['insid']).'" disabled="disabled" style="border-color:f00;display:none;"/> 
								<input type="hidden" id="in_defaultins_nome" value="'.stripslashes($row['insurer']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/> 
								<input type="hidden" id="in_currins_no" value="'.stripslashes($rowa['in_insurer_id']).'" disabled="disabled" style="border-color:f00;display:none;"/> 
								<input type="hidden" id="in_currins_nome" value="'.stripslashes($rowa['in_insurer_name']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/> 
								<label for="alergy" class="bh-visually-hidden">Text field</label><textarea id="alergy" class="alergy"  disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;">'.htmlsan(stripslashes($row['odetails'])).'</textarea>
								<div class="cleaner_h5"></div>
								</div>
							
								<div id="personal" style="border-right:1px solid #ccc;  height:365px; margin-left:0px">
								<h5>Guardian Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Names:</a>
                                <label for="gname" class="bh-visually-hidden">Gname</label><input type="text" id="gname" name="gname" class="in_field" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" value="'.htmlsan(stripslashes($row['gname'])).'"/>
								<div class="cleaner_h5"></div>
								 <a class="labels">R-ship:</a>
                                <label for="rship" class="bh-visually-hidden">Rship</label><select class="select" id="rship" name="rship" style="float:right;border-color:var(--color-danger, #DC2626)" disabled="disabled">
								<option value="'.stripslashes($row['grship']).'" selected="selected">'.stripslashes($row['grship']).'</option>
								<option value="father">Father</option>
								<option value="mother">Mother</option>
								<option value="sister">Sister</option>
								<option value="Brother">Brother</option>
								<option value="uncle">Uncle</option>
								<option value="aunt">Aunt</option>
								<option value="cousin">Cousin</option>
								<option value="Son">Son</option>
								<option value="Daughter">Daughter</option>
								<option value="others">Others</option>
								</select> 
								<div class="cleaner_h5"></div>
								<a class="labels">Contacts:</a>
                                <label for="gphone" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone" name="gphone" class="in_field" value="'.htmlsan(stripslashes($row['gcont'])).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">E-No:</a>
                                <label for="geno" class="bh-visually-hidden">Geno</label><input type="text" id="geno" name="geno" class="in_field" value="'.htmlsan(stripslashes($row['geno'])).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Address:</a>
                                <label for="gaddress" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress" name="gaddress" class="in_field" value="'.stripslashes($row['gaddress']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)"/> 
								<div class="cleaner_h5"></div>
								</div>
								<div id="personal" style="border:0;height:365px; margin-left:0px; width:172px">
								<h5>Photo</h5>';
								echo'<div class="cleaner_h5"></div>
								
								<iframe name="leiframe" id="leiframe" class="leiframe" src="'.stripslashes($row['image']).'" style="float:left;margin-left:20px" onerror="if(this.src!='.stripslashes($row['image']).') this.src="images/clogo.png"">
								</iframe>
                            	
								</div>
					</div>
	<div id="tabs-2">
								
								
								<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:300px">
								<h5>Triage Analysis</h5>
								<a class="labels">Temp:</a>
                                <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"  class="in_field" value="'.htmlsan(stripslashes($rowa['Temp'])).'"  style="width:30px; float:left; margin-left:46px;border-color:#" /> 
								<div style="float:left; margin-top:2px"><a class="labels" style="font-size:5px; margin-top:0px;font-weight:bold; margin-left:5px">0</a></div><div style="float:left; margin=left:3px"><a style="font-size:11px;font-weight:bold;"  class="labels">C</a></div>
 								<div class="cleaner_h5"></div>
								<a class="labels">B.P:</a>
                                <div style="width:40px; float:left;margin-left:62px; padding:1px ;border-color:#" class="in_field">
								<div style="float:left; border-bottom:1px solid #333; width:35px"><label for="bp1" class="bh-visually-hidden">Oname</label><input type="text" id="bp1" name="oname" value="'.htmlsan(stripslashes($rowa['Bp1'])).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px; margin-top:0px;margin-bottom:2px;text-align:center;border-color:#" > </div>
								<div class="cleaner"></div>
								<div style="float:left"><label for="bp2" class="bh-visually-hidden">Oname</label><input type="text" id="bp2" name="oname" value="'.htmlsan(stripslashes($rowa['Bp2'])).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px;  margin-top:2px;text-align:center;border-color:#" />  </div>
								</div>
								
								<a class="labels" style="font-weight:bold; margin-left:5px; margin-top:20px">mmHg</a>
								<div class="cleaner_h5"></div>
								<a class="labels">Weight:</a>
                                <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname" class="in_field" value="'.htmlsan(stripslashes($rowa['Weight'])).'"  style="width:30px; float:left; margin-left:42px;border-color:#" /> 
								<a class="labels" style="font-weight:bold; margin-left:5px">Kgs</a>
								<div class="cleaner_h5"></div>
								<a class="labels">Resp. Rate:</a>
                                <label for="resprate" class="bh-visually-hidden">Oname</label><input type="text" id="resprate" name="oname" class="in_field" value="'.htmlsan(stripslashes($rowa['RespRate'])).'"  style="width:30px; float:left; margin-left:23px;border-color:#" /> 
								<a class="labels" style="font-weight:bold; margin-left:5px">Breaths/Min</a>
								<div class="cleaner_h5"></div>
								<a class="labels">Pulse Rate:</a>
                                <label for="pulserate" class="bh-visually-hidden">Oname</label><input type="text" id="pulserate" name="oname" class="in_field" value="'.htmlsan(stripslashes($rowa['PulseRate'])).'"  style="width:30px; float:left; margin-left:25px;border-color:#" /> 
							<a class="labels" style="font-weight:bold; margin-left:5px">Beats/Min</a>
							<div class="cleaner_h5"></div>
								<a class="labels">R.B.S:</a>
                                <label for="rbs" class="bh-visually-hidden">Oname</label><input type="text" id="rbs" name="oname" class="in_field" value="'.htmlsan(stripslashes($rowa['Rbs'])).'"  style="width:30px; float:left; margin-left:54px;border-color:#"  /> 
							<a class="labels" style="font-weight:bold; margin-left:5px">mMoles/Ltr</a>';

								echo'<div class="cleaner_h5"></div>
								<a class="labels">Clinic:<span>*</span></a>
                                <label for="typeDMclinic" class="bh-visually-hidden">TypeDMclinic</label><select  class="select" id="typeDMclinic" name="typeDMclinic" style="margin-left:24px">'; 
	if($typeclinik!=''){echo'<option selected="selected" value="'.$typeclinik.'">'.$clinikname.'</option>';}else{echo'<option value="">Select clinic..</option>';}
						#echo'<option value="">Select clinic..</option>';
						$result =mysqli_query($db, "SELECT id,Abbr,Name FROM clinics ORDER BY id DESC");
								$num_results = mysqli_num_rows($result);
								for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
				echo"<option value=\"".stripslashes($row['Abbr'])."\">".stripslashes($row['Name'])."</option>";
								}
			   				echo'</select>';


							     echo'<div class="cleaner"></div>
								 <a class="labels" style="margin-right:5px">New Screening this calender year:</a>';
								 if(stripslashes($rowa['newscreening'])=='No'){
									 echo'<label for="yestohyper" class="bh-visually-hidden">Gender2</label><input  id="yestohyper" name="gender2" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
								 <label for="notohyper" class="bh-visually-hidden">Gender2</label><input  id="notohyper" name="gender2" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.'; 
								 }else{ echo'<label for="yestohyper" class="bh-visually-hidden">Gender2</label><input  id="yestohyper" name="gender2" type="radio" value="Yes" class="radio" checked="checked" style="margin-top:8px">Y.
								 <label for="notohyper" class="bh-visually-hidden">Gender2</label><input  id="notohyper" name="gender2" type="radio" value="No" class="radio" style="margin-top:8px">N.';}

							     echo'<div class="cleaner"></div>
								 <a class="labels" style="margin-right:30px">Known Hypertensive:</a>';
								 if(stripslashes($rowa['knownhyper'])=='No'){
									 echo'<label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input  id="yesknownhyper" name="gender3" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
								 <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input  id="noknownhyper" name="gender3" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.'; 
								 }else{ echo'<label for="yesknownhyper" class="bh-visually-hidden">Gender3</label><input  id="yesknownhyper" name="gender3" type="radio" value="Yes" class="radio" checked="checked" style="margin-top:8px">Y.
								 <label for="noknownhyper" class="bh-visually-hidden">Gender3</label><input  id="noknownhyper" name="gender3" type="radio" value="No" class="radio" style="margin-top:8px">N.';}

							     echo'<div class="cleaner"></div>
								 <a class="labels" style="margin-right:30px">Taking Medicine:</a>';
								 if(stripslashes($rowa['takingmeds'])=='No'){
									 echo'<label for="yestomeds" class="bh-visually-hidden">Gender4</label><input  id="yestomeds" name="gender4" type="radio" value="Yes" class="radio" style="margin-top:8px">Y.
								 <label for="yestomeds" class="bh-visually-hidden">Gender4</label><input  id="yestomeds" name="gender4" type="radio" value="No" class="radio" checked="checked" style="margin-top:8px">N.'; 
								 }else{ echo'<label for="notomeds" class="bh-visually-hidden">Gender4</label><input  id="notomeds" name="gender4" type="radio" value="Yes" class="radio" checked="checked" style="margin-top:8px">Y.
								 <label for="notomeds" class="bh-visually-hidden">Gender4</label><input  id="notomeds" name="gender4" type="radio" value="No" class="radio" style="margin-top:8px">N.';}
								echo'</div>
								<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:300px">
								<h5>Health Problems/Allergies</h5>
								<label for="allergies" class="bh-visually-hidden">Health Problems/Allergies</label><textarea id="allergies" style="float:right;height:315px; width:280px;border:0" disabled="disabled" class="alergy">'.stripslashes($rowa['Allergies']).'</textarea>
								</div>
								<div id="personal" style="border:0; height:365px; margin-left:0px; width:300px">
								<h5>Other Details</h5>
								<label for="hodetails" class="bh-visually-hidden">Other Details</label><textarea id="hodetails" style="float:right;height:315px; width:280px;border:0" disabled="disabled" class="alergy">'.stripslashes($rowa['OtherDetails']).'</textarea>
								</div>
							
	
	</div>
	<div id="tabs-18">';

if(isset($_SESSION['dresser'])){
							unset($_SESSION['dresser']);
						}

	 echo" <script>$('#appcorder653').parent().find('input:first').width(250);</script>";
	echo'<div style="float:left; padding-right:10px; border-right:0">
					<h5>MMAKE A SERVICE REQUEST</h5>';

echo'<label for="daydressin" class="bh-visually-hidden">Daydressin</label><input type="checkbox" value="1" name="daydressin" id="daydressin" style="float:left;margin:8px 0 0 10px">
		<a class="labels" style="margin-left:10px">Send Request to Dressing on Save</a>';
   echo'<div class="cleaner"></div>';

echo'<a class="labels" style="margin-left:10px">Item:</a>
<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
	<label for="appcorder653" class="bh-visually-hidden">Item:</label><select id="appcorder653">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from items  where Category IN ('CUSTOMERCARE', 'OPD SERVICES', 'DENTAL') and SalePrice>0 order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$itemp=stripslashes($row['SalePrice']);
								$item=stripslashes($row['ItemName']);
								$code=stripslashes($row['ItemCode']);
								$categ = stripslashes($row['Category']);
								$catid = stripslashes($row['CategoryId']);
								$subcat = stripslashes($row['SubCategory']);
								$cpr = stripslashes($row['CorporatePrice']);
								$ppr = stripslashes($row['InsurancePrice']);
								$type = stripslashes($row['Type']);
								$bal = 0;
								$coun = stripslashes($row['CO_UN']);
								$otcpr = stripslashes($row['OtcPrice']);
								$apapr = stripslashes($row['ApaPrice']);
								$pacis = stripslashes($row['PacisPrice']);
								$liason = stripslashes($row['LiasonPrice']);
								$mutual = stripslashes($row['OldMutualPrice']);
								$kplcmin = stripslashes($row['KplcMinetPrice']);
								$maklmat = stripslashes($row['MaklMaternityPrice']);
								$minetcs = stripslashes($row['MinetCivilServantsPrice']);
								echo"<option value=\"".$itemp."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$code."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$subcat."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$coun."ÃÂÃÂ¸".$otcpr."ÃÂÃÂ¸".$apapr."ÃÂÃÂ¸".$pacis."ÃÂÃÂ¸".$liason."ÃÂÃÂ¸".$mutual."ÃÂÃÂ¸".$kplcmin."ÃÂÃÂ¸".$maklmat."ÃÂÃÂ¸".$minetcs."\">".$item." -".$itemp."</option>";
						}
		echo'
		</select>
		<label for="bal606" class="bh-visually-hidden">Text field</label><input type="text" id="bal606" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		<label for="type606" class="bh-visually-hidden">Text field</label><input type="text" id="type606" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		</div>
				<input type="hidden" disabled="disabled" id="quat606" class="input_field" style="width:40px; margin-left:10px;display:none" value="1"/>
				<input type="hidden" disabled="disabled" id="price606" class="input_field" style="width:70px; margin-left:10px;display:none"/>
				<input type="hidden" disabled="disabled" id="red606" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="categ606" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="code606" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtcatid606" name="txtcatid44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtsec606" name="txtsec44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtprcorporate606" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
				<input type="hidden" disabled="disabled" id="txtprinsurance606" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';

				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addorder653('dresser',0)\"/>";
				echo'<label for="tprice606" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="tprice606" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none"/>';
				echo '<label for="disc606" class="bh-visually-hidden">Text field</label><input type="text" id="disc606"  class="input_field"  value="0" style="width:60px; margin-left:10px;display:none"/>';
				echo'<label for="sub606" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="sub606" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none""/>		
			<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
			<label for="income606" class="bh-visually-hidden">Text field</label><select id="income606">';
			echo'<option value="38">HOSPITAL</option>';
			echo"<script>$('#income606').parent().find('input:first').width(100);</script>";
		echo'</select></div>
<label for="total606" class="bh-visually-hidden">HOSPITAL</label><input type="text" disabled="disabled" id="total606" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none""/>';
				
		echo'<div id="itemsdisp" style="height:270px; width:366px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
				<h5>ITEMS</h5>
				<div id="dresserdisp" style="width:306px; margin-right:5px; height:250px;float:left;">
				
				</div>
			</div>';	

echo'</div>';

echo'<div style="float:left">
		<h5>Services</h5>';


	echo'<div style="border-left:2px solid #10504F; height:340px; overflow-y:auto;  width:520px;padding:2px">';
		echo'<div id="dressertabs18" style="height:700px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-31">Summary.</a></li>';
					echo'<li><a href="#tabs-32">Edit Request.</a></li>';
					echo'<li><a href="#tabs-33">Services.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-31">';
				     echo'<div class="cleaner_h5"></div>';								
					 		$resultb =mysqli_query($db, "select * from opdservicerequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='OPD' order by id");
							$num_resultsb = mysqli_num_rows($resultb);	
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);									
									echo'<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b> Time: <b>'.stripslashes($rowb['date']).'</b></a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Request</b></a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['request']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Details/Notes</b></a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['results']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';

								}
				      echo'<div class="cleaner"></div>';
				      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';

				echo'</div>';
				echo'<div id="tabs-32" >';

							echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:5px 10px 0 0\"><img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/></div>";
							echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-top:5px; float:right\" title=\"View Current Cart\" onclick=\"viewdresserbill('nurse')\"/>";
							echo'<div id="dresserinv" style="height:350px;margin-left:10px;margin-top:0px; float:left;"></div>';
						    echo'<div class="cleaner"></div>';
						    echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';


				echo'</div>';
				echo'<div id="tabs-33">';
						echo'<div class="cleaner"></div>'; 
					    echo'<a class="labels">Injection or Dressing Services:</a>';
						echo'<div class="ui-widget" style="margin-left:10px; float:left;" id="widg18" >
								<label for="symptoms2" class="bh-visually-hidden">Injection or Dressing Services:</label><select id="symptoms2" style="width:240px; margin-left:5px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from items where Category IN ('OPD SERVICES', 'DENTAL') order by ItemName");
									$num_resultsb = mysqli_num_rows($resultb);	
									for ($i=0; $i <$num_resultsb; $i++) {
										$rowb=mysqli_fetch_array($resultb);
										echo'<option value="'.stripslashes($rowb['ItemName']).'">'.stripslashes($rowb['ItemName']).'-'.stripslashes($rowb['SalePrice']).'</option>';
									}
							echo'</select>';
						echo'</div>';
				     echo'<div class="cleaner_h5"></div>';								
					 echo'<label for="history2" class="bh-visually-hidden">Text field</label><textarea id="history2" style="float:right;height:200px; width:450px" class="alergy">';
							    $resultb =mysqli_query($db, "select * from opdservicerequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='OPD' order by id");
								$num_resultsb = mysqli_num_rows($resultb);	
								$xa=1;	
								for ($i=0; $i <$num_resultsb; $i++) {
									$rowb=mysqli_fetch_array($resultb);		
									$pharmitems=stripslashes($rowb['request']);
									#echo''.$pharmitems.'</br>';
									echo '<a class="labels" style="margin-left:5px;"> <b>'.$xa.'. '.stripslashes($rowb['request']).'</b></a><br/><div class="cleaner"></div>';
									$xa++;
								}
					 echo'</textarea>';	
				      echo'<div class="cleaner"></div>';
				      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';


				echo'</div>';


		echo'</div>';
   echo'</div>';



	echo'</div>';
echo'</div>';



echo'<div id="tabs-3">
	<a class="labels">Type Symptom name and press enter:</a>
	<div class="ui-widget" style="margin-left:25px; float:left;" id="widg1" >
								<label for="symptoms" class="bh-visually-hidden">Type Symptom name and press enter:</label><select id="symptoms" style="width:260px; margin-left:10px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from symptoms order by name");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
														}
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
	<label for="history" class="bh-visually-hidden">Text field</label><textarea id="history" style="float:right;height:310px; width:950px" class="alergy">'.stripslashes($rowa['History']).'</textarea>
	<label for="complaint" class="bh-visually-hidden">Text field</label><textarea id="complaint" style="float:right;height:310px; width:950px; display:none" class="alergy"></textarea>
	
	</div>
	
	<div id="tabs-5">';

if(isset($_SESSION['lab'])){
							unset($_SESSION['lab']);
						}
	 echo" <script>$('#labt').parent().find('input:first').width(250);</script>";
	echo'<div style="float:left; padding-right:10px; border-right:0">
					<h5>MAKE A LAB REQUEST</h5>
					<label for="labrec" class="bh-visually-hidden">Labrec</label><input type="checkbox" value="1" name="labrec" id="labrec" style="float:left;margin:8px 0 0 10px">
					<a class="labels" style="margin-left:10px">Send Request to Lab on Save</a>
					 <div class="cleaner"></div>

<a class="labels" style="margin-left:10px">Lab Test:</a>
<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
	<label for="appcorder420" class="bh-visually-hidden">Lab Test:</label><select id="appcorder420">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from items  where Category='Laboratory' and SalePrice>0 order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$itemp=stripslashes($row['SalePrice']);
								$item=stripslashes($row['ItemName']);
								$code=stripslashes($row['ItemCode']);
								$categ = stripslashes($row['Category']);
								$catid = stripslashes($row['CategoryId']);
								$subcat = stripslashes($row['SubCategory']);
								$cpr = stripslashes($row['CorporatePrice']);
								$ppr = stripslashes($row['InsurancePrice']);
								$type = stripslashes($row['Type']);
								$bal = stripslashes($row['LABORATORY_MAIN']);
								$coun = stripslashes($row['CO_UN']);
								$otcpr = stripslashes($row['OtcPrice']);
								$apapr = stripslashes($row['ApaPrice']);
								$pacis = stripslashes($row['PacisPrice']);
								$liason = stripslashes($row['LiasonPrice']);
								$mutual = stripslashes($row['OldMutualPrice']);
								$kplcmin = stripslashes($row['KplcMinetPrice']);
								$maklmat = stripslashes($row['MaklMaternityPrice']);
								$minetcs = stripslashes($row['MinetCivilServantsPrice']);
								echo"<option value=\"".$itemp."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$code."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$subcat."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$coun."ÃÂÃÂ¸".$otcpr."ÃÂÃÂ¸".$apapr."ÃÂÃÂ¸".$pacis."ÃÂÃÂ¸".$liason."ÃÂÃÂ¸".$mutual."ÃÂÃÂ¸".$kplcmin."ÃÂÃÂ¸".$maklmat."ÃÂÃÂ¸".$minetcs."\">".$item."</option>";
						}
		echo'
		</select>
		<input type="hidden" id="bal44" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		<input type="hidden" id="type44" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		</div>
				<input type="hidden" disabled="disabled" id="quat44" class="input_field" style="width:40px; margin-left:10px;display:none" value="1"/>
				<input type="hidden" disabled="disabled" disabled="disabled" id="price44" class="input_field" style="width:20px; margin-left:10px;display:none"/>
				<input type="hidden" disabled="disabled" id="red" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="categ" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="code" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtcatid44" name="txtcatid44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtsec44" name="txtsec44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
				<input type="hidden" disabled="disabled" id="txtprcorporate44" class="input_field" style="width:20px; margin-left:10px;display:none;"/>
				<input type="hidden" disabled="disabled" id="txtprinsurance44" class="input_field" style="width:20px; margin-left:10px;display:none;"/>';

				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addorder420('lab',0)\"/>";
				echo'<input type="hidden" disabled="disabled" id="tprice" class="input_field"  style="width:20px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none"/>';
				echo '<input type="hidden" id="disc44" class="input_field" value="0" style="width:20px; margin-left:10px;display:none"/>';
				echo'<input type="hidden" disabled="disabled" id="old_patient_id" name="old_patient_id" value="'.$old_in_patient_id.'" style="width:20px;display:none;"/>
				<input type="hidden" disabled="disabled" id="old_presc_id" name="old_presc_id" value="'.$old_in_presc_id.'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="old_presc_no" name="old_presc_no" value="'.$old_in_presc_no.'" style="width:20px;display:none;"/>
				<input type="hidden" disabled="disabled" id="regn" name="regn" value="'.$patid.'" style="width:40px;display:none;"/>
				<input type="hidden" disabled="disabled" id="oname" value="'.$patname.'" style="width:40px;display:none;"/>
				<input type="hidden" disabled="disabled" id="patid" value="'.$patid.'" style="width:40px;display:none;"/>
				<input type="hidden" disabled="disabled" id="patname" value="'.$patname.'" style="width:40px;display:none;"/>
				<input type="hidden" disabled="disabled" id="in_consult_dept" value="'.$dept.'" style="width:20px;display:none;"/>';
				echo'<input type="hidden" disabled="disabled" id="sub44" class="input_field"  style="width:20px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none""/>		
			<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
			<label for="income44" class="bh-visually-hidden">Text field</label><select id="income44">';
			echo'<option value="38">HOSPITAL</option>';
			echo"<script>$('#income44').parent().find('input:first').width(100);</script>";
		echo'</select></div>';
		
				echo'
	<div id="itemsdisp" style="height:270px; width:366px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5>LAB TESTS</h5>
	<div id="display" style="margin-top:0px; height:250px;">
	
	</div>
	</div>	
</div>
	

		<div style="float:left; padding-left:10px">';
		echo'<h5>Lab Requests Summary</h5>';

	echo'<div style="height:340px; overflow-y:auto; border:1px solid #ccc;width:520px;padding:2px">';
		echo'<div id="labtabs8" style="height:700px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Results.</a></li>';
					echo'<li><a href="#tabs-2">Edit Requests.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 #echo'<div style="width:430px; float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
					 		$resultb =mysqli_query($db, "select * from labrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='OPD' order by id");
							$num_resultsb = mysqli_num_rows($resultb);	
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
								else if(stripslashes($rowb['status'])==2){$x='<b style="color:#10504F"> - [COMPLETED]</b>';}
								else if(stripslashes($rowb['status'])==3){$x='<b style="color:var(--color-danger, #DC2626)"> - [IN PROCESS]</b>';}
								else{$x='<b style="color:var(--color-danger, #DC2626)"> - [SAMPLE REJECTED]</b>';}
									
									echo'<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b></a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Lab Request</b>'.$x.'</a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['request']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
									<a class="labels"><b>Lab Results</b></a><div class="cleaner"></div>
									<a class="labels">'.stripslashes($rowb['results']).'</a>
									<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';

								}
								echo'<div class="cleaner"></div>';
								echo'<input type="hidden" disabled="disabled" id="total" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
								echo'<div class="cleaner"></div>';
								echo'<input type="hidden" disabled="disabled" id="labftotal44" style="display:none;"/>';
								echo'<div class="cleaner"></div>';
					 #echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="margin:1px;">';

						echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:0 10px 0 0\"><img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/></div>";
						echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-right:5px; float:right\" title=\"View Current Cart\" onclick=\"viewmaabarabill('nurse')\"/>";
						echo'<div id="maabarainv" style="height:350px;margin-left:-85px;margin-top:0px; float:left;"></div>';
				        echo'<div class="cleaner"></div>';
				        echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';



				echo'</div>';
				


		echo'</div>';
   echo'</div>';



		echo'</div>
	</div>
	<div id="tabs-6">';
		if(isset($_SESSION['rad'])){
							unset($_SESSION['rad']);
						}
	 echo" <script>$('#labt').parent().find('input:first').width(250);</script>";
	echo'<div style="float:left; padding-right:10px; border-right:0px solid #333">
					<h5>MAKE A RADIOLOGY REQUEST</h5>
					<label for="radrec" class="bh-visually-hidden">Radrec</label><input type="checkbox" value="1" name="radrec" id="radrec" style="float:left;margin:8px 0 0 10px">
					<a class="labels" style="margin-left:10px">Send to Radiology on Save</a>
					 <div class="cleaner"></div>
					

<a class="labels" style="margin-left:10px">Rad Test:</a>
<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
	<label for="appcorder790" class="bh-visually-hidden">Rad Test:</label><select id="appcorder790">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from items  where Category='Radiology' AND SalePrice>0 order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$itemp=stripslashes($row['SalePrice']);
								$item=stripslashes($row['ItemName']);
								$code=stripslashes($row['ItemCode']);
								$categ = stripslashes($row['Category']);
								$catid = stripslashes($row['CategoryId']);
								$cpr = stripslashes($row['CorporatePrice']);
								$ppr = stripslashes($row['InsurancePrice']);
								$type = stripslashes($row['Type']);
								$bal = stripslashes($row['RADIOLOGY']);
								$coun = stripslashes($row['CO_UN']);
								$otcpr = stripslashes($row['OtcPrice']);
								$apapr = stripslashes($row['ApaPrice']);
								$pacis = stripslashes($row['PacisPrice']);
								$liason = stripslashes($row['LiasonPrice']);
								$mutual = stripslashes($row['OldMutualPrice']);
								$kplcmin = stripslashes($row['KplcMinetPrice']);
								$maklmat = stripslashes($row['MaklMaternityPrice']);
								$minetcs = stripslashes($row['MinetCivilServantsPrice']);
								echo"<option value=\"".$itemp."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$code."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$coun."ÃÂÃÂ¸".$otcpr."ÃÂÃÂ¸".$apapr."ÃÂÃÂ¸".$pacis."ÃÂÃÂ¸".$liason."ÃÂÃÂ¸".$mutual."ÃÂÃÂ¸".$kplcmin."ÃÂÃÂ¸".$maklmat."ÃÂÃÂ¸".$minetcs."\">".$item."</option>";
						}
		echo'
		</select>
		<input type="hidden" id="bal45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		<input type="hidden" id="type45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		</div>
							<input type="hidden" id="quat45" class="input_field"  style="width:20px; margin-left:10px;display:none" value="1"/>
							<input type="hidden" id="price45" class="input_field"  style="width:20px; margin-left:10px;display:none"/>
							<input type="hidden" id="red45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
							<input type="hidden" id="categ45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
							<input type="hidden" id="code45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid45" name="txtcatid45" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate45" class="input_field" style="width:20px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprinsurance45" class="input_field" style="width:20px; margin-left:10px;display:none;"/>';

				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addorder790('rad',0)\"/>";
				echo'<input type="hidden" disabled="disabled" id="tprice45" class="input_field"  style="width:20px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none" disabled="disabled"/>';
				echo '<input type="hidden" id="disc45"  class="input_field"  value="0" style="width:20px; margin-left:10px;display:none"/>';
				echo'<input type="hidden" disabled="disabled" id="sub45" class="input_field"  style="width:20px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none""/>		
			<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
			<label for="income45" class="bh-visually-hidden">Text field</label><select id="income45">';
			echo'<option value="38">HOSPITAL</option>';
			echo"<script>$('#income45').parent().find('input:first').width(100);</script>";
		echo'</select></div>
<input type="hidden" disabled="disabled" id="total45" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none""/>';
				echo'
	<div id="itemsdisp" style="height:270px; width:366px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5>RADIOLOGY TESTS</h5>
	<div id="display45" style="margin-top:0px; height:250px;">
	
	</div>
	</div>	
</div>
	
		<div style="float:left; padding-left:10px">
		<h5>Radiology Results</h5>';

	echo'<div style="height:340px; overflow-y:auto; border:1px solid #ccc;width:520px;padding:2px">';
		echo'<div id="radtabs9" style="height:700px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Results.</a></li>';
					echo'<li><a href="#tabs-2">Edit Requests.</a></li>';
					echo'<li><a href="#tabs-3">Scan Images.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
									$resultb =mysqli_query($db, "select * from radrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='OPD' order by id");
									$num_resultsb = mysqli_num_rows($resultb);	
									for ($i=0; $i <$num_resultsb; $i++) {
										$rowb=mysqli_fetch_array($resultb);
										if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
										else{$x='<b style="color:#10504F"> - [COMPLETED]</b>';}
										echo'<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b></a>
											 <div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
											 <a class="labels"><b>Radiology Request</b>'.$x.'</a><div class="cleaner"></div>
											 <a class="labels">'.stripslashes($rowb['request']).'</a>
											 <div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
											 <a class="labels"><b>Radiology Results</b></a><div class="cleaner"></div>
											 <a class="labels">'.stripslashes($rowb['results']).'</a>
											 <div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
									 }

					      echo'<div class="cleaner"></div>';
					      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';


				echo'</div>';
				echo'<div id="tabs-2">';

							echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:0 10px 0 0\"><img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/></div>";
							echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-right:5px; float:right\" title=\"View Current Cart\" onclick=\"viewRadiolojiaBill('nurse')\"/>";
							echo'<div id="radiolojiainv" style="height:350px;margin-left:10px;margin-top:0px; float:left;"></div>';

					      echo'<div class="cleaner"></div>';
					      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';


				echo'</div>';
				echo'<div id="tabs-3">';
				      echo'<div class="cleaner_h5"></div>';
					  echo'<h5>Scan Images</h5>';
					  echo'<div id="wrap" style="width:450px; height:100px; background:#fff; border:1px solid #ccc; BORDER-RADIUS:0PX; padding:10px; padding-right:5px; overflow:auto;">';
								$result2 =mysqli_query($db, "select * from raddocuments where PrescId='".$pid."' order by Stamp desc");
								$num_results2 = mysqli_num_rows($result2);
								for ($i=0; $i <$num_results2; $i++) {
								$row2=mysqli_fetch_array($result2);
								    if(stripslashes($row2['Type'])=='Image'){
									  echo"<a class=\"fancybox\" href=\"". stripslashes($row2['Link'])."\" title=\"".stripslashes($row2['Name'])."-".stripslashes($row2['Date'])."\" data-fancybox-group=\"gallery\" ><img alt=\"Stripslashes Row2 Link\" src=\"". stripslashes($row2['Link'])."\" style=\"max-height:100px;margin-right:5px; max-width:100px;\" /></a>";
									} 
									if(stripslashes($row2['Type'])=='Document'){
									echo"<a class=\"fancybox\" href=\"images/adobe.png\" title=\"".stripslashes($row2['Name'])."-".stripslashes($row2['Date'])."\" data-fancybox-group=\"gallery\" ><img alt=\"Adobe\" src=\"images/adobe.png\" style=\"max-height:100px;margin-right:5px; max-width:100px;\" /></a>";
							 		} 

								}
						echo'</div>';
				      echo'<div class="cleaner"></div>';
				      echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';


				echo'</div>';


		echo'</div>';
   echo'</div>';



	echo'</div>
	</div>

	<div id="tabs-12">

		<div class="cleaner_h5"></div>
		 <div style="height:360px; overflow-y:auto; border:0px solid #ccc;width:100%;padding:2px">';


		    $result =mysqli_query($db, "select * from newprescription where PatId='".$pntno."' and  PrescId!='".$pid."'");
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			
             echo'<h5 style="text-align:center;">OutPatient Medical Records ['.$num_results.']</h1>
           		<div style="clear:both; margin-bottom:10px"></div>
         
					<div style="width:100%; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
					<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Date</p>
					</div>
					<div style="width:30%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">History</p>
					</div>
					<div style="width:30%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Diagnosis</p>
					</div>
					<div style="width:29%; height:20px;float:left;">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Prescription</p>
					</div>
					</div>

			<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
			<tbody>';

					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					$opid=stripslashes($row['PrescId']);
					if($i%2==0){
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4&rcptno=".stripslashes($row['PrescId'])."')\">";
					}
					else{
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;background:#f0f0f0;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4&rcptno=".stripslashes($row['PrescId'])."')\">";
					}
					echo'<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.dateprint(stripslashes($row['TransDate'])).'</td>
				    <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['History']).'</td>
				    <td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['DiagName']).'</td>
				     <td  style="width:29%;border-width:0.5px; border-color:#666; border-style:solid;">';
				     	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$opid."' order by id");
																	$num_resultsb = mysqli_num_rows($resultb);	
																	for ($x=0; $x <$num_resultsb; $x++) {
																		$rowb=mysqli_fetch_array($resultb);
																		
							
							echo stripslashes($rowb['prescription']).'<br/>';

								}
				     	
				     echo'</td>
				     </tr>';
						} 

echo'</tbody></table><div style="clear:both; margin-bottom:10px"></div>';
   				}

   #$result =mysqli_query($db, "select * from inpatients where PatId='".$pntno."' AND old_in_patient_id='".$old_in_patient_id."'");
   			$result =mysqli_query($db, "select * from inpatients where PatId='".$pntno."' AND PrescId!='".$pid."'");
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			
             echo'<h5 style="text-align:center;">Inpatient Medical Records ['.$num_results.']</h1>
           		<div style="clear:both; margin-bottom:10px"></div>
         
					<div style="width:100%; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
					<div style="width:10%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Date</p>
					</div>
					<div style="width:20%; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Doctor in Charge</p>
					</div>
					
					<div style="width:69%; height:20px;float:left;">
					<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Admission Notes</p>
					</div>
					</div>

			<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
			<tbody>';

					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
					$pid=stripslashes($row['PrescId']);
					if($i%2==0){
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4.1&rcptno=".stripslashes($row['PrescId'])."')\">";
					}
					else{
					echo"<tr title=\"Click to Open\" style=\"width:100%; height:20px;color:#333;cursor:pointer;font-weight:normal;background:#f0f0f0;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4.1&rcptno=".stripslashes($row['PrescId'])."')\">";
						
					}
					echo'<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;">'.dateprint(stripslashes($row['TransDate'])).'</td>
				    <td  style="width:20%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['Doctor']).'</td>
				 	 <td  style="width:69%;border-width:0.5px; border-color:#666; border-style:solid;">'.stripslashes($row['AdmNotes']).'</td>
				     </tr>';
						} 

echo'</tbody></table><div style="clear:both; margin-bottom:10px"></div>';
   				}

		 echo'</div>';


echo'</div>';
echo'<div id="tabs-7" style="display:none;">';
	
	    //  echo'<a class="labels" style="margin-left:20px;display:;">Type Diagnosis name and press enter:</a>
		// 	<div class="ui-widget" style="margin-left:25px; float:left;display:;" id="widg4" >
		// 	      <select id="diagt" style="width:260px; margin-left:10px;">
		// 	      <option value="">Select one...</option>';
		// 			$resultb =mysqli_query($db, "select * from diagnosis order by name asc");
		// 			$num_resultsb = mysqli_num_rows($resultb);	
		// 			for ($i=0; $i <$num_resultsb; $i++) {
		// 				$rowb=mysqli_fetch_array($resultb);
		// 				echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
		// 			}
		// 	echo'</select>
		// </div>';
		echo'<div class="cleaner_h5"></div>';
		echo'<div style="width:520px;float:left;display:none;">
				<label for="diagnosis254" class="bh-visually-hidden">Text field</label><textarea id="diagnosis254" style="float:left;height:290px; width:500px;display:none;" class="alergy">'.stripslashes($rowa['Diagnosis']).'</textarea>
			</div>';

		// echo'<div style="width:370px; border:1px solid #ccc; height:310px; float:left; margin-left:20px">
		// 			<a class="labels" style="margin-left:20px;font-weight:bold">Diseases Summary:</a>';
		// 			if(isset($_SESSION['dis'])){
		// 					unset($_SESSION['dis']);
		// 				}
		// 			$_SESSION['diseases']=array();

		// 	echo'<div class="cleaner_h5"></div>
		// 	<div class="ui-widget"  style="float:left; margin-left:25px">
		// 	    <select id="disease" class="combos">
		// 		<option value="">Select one...</option>';
		// 		$resulta =mysqli_query($db, "select * from diseases order by name");
		// 		$num_resultsa = mysqli_num_rows($resulta);	
		// 		for ($i=0; $i <$num_resultsa; $i++) {
		// 			$row=mysqli_fetch_array($resulta);
		// 			$name=stripslashes($row['name']);
		// 		$k=stripslashes($row['id']);
		// 			echo"<option value=\"".$k."ÃÂÃÂ¸".$name."\">".$name."</option>";
		// 		}
		// 	echo'</select>
		// 	</div>
		// 	<div class="cleaner_h5"></div>
		// 			<div id="diseases" style="width:100%;">';
		// $parts=explode(';',stripslashes($rowa['DiagName']));
		// foreach ($parts as $key => $val) {
		// $_SESSION['dis'][$key]=$val;
		// 	if($val!=''){
		// 	echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismissdis(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
		// 	}
	    // }
		// 			echo'</div>';

		// 	echo'</div>';

echo'</div>';
echo'<div id="tabs-8">';
     echo'<label for="phyexam" class="bh-visually-hidden">Text field</label><textarea id="phyexam"  style="float:right;height:330px; width:950px" class="alergy">'.stripslashes($rowa['PhyExam']).'</textarea>';
echo'</div>';
echo'<div id="tabs-11">
	<a class="labels">Send To Other Doctor(On Save):<span>*</span></a>
                                <label for="deptsendto" class="bh-visually-hidden">Send To Other Doctor(On Save):</label><select  class="select" id="deptsendto" style="margin-left:20px; width:250px">
                                <option selected="selected" value="MCH CLINIC">MCH Clinic</option>';
			                   echo'</select>

<a class="labels" style="margin-left:20px">Next Review Date:</a>
<label for="datepick3" class="bh-visually-hidden">Next Review Date:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick3" type="text" value="">';
				
echo'</div>';

echo'<div id="tabs-9">
	<label for="rectheatre" class="bh-visually-hidden">Rectheatre</label><input type="checkbox" value="1" name="rectheatre" id="rectheatre" style="float:left;margin:8px 0 0 10px">
	<a class="labels" style="margin-left:10px"><b>Send to Theatre On Save</b></a>
	<a class="labels" style="margin-left:20px">Type Procedure :</a>
	<div class="ui-widget" style="margin-left:25px; float:left;" id="widg6" >
								<label for="treat" class="bh-visually-hidden">Type Procedure :</label><select id="treat" style="width:260px; margin-left:10px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from procedures order by name asc");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
														}
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
	<div style="width:490px; float:left;">							
	<label for="treatment" class="bh-visually-hidden">Text field</label><textarea id="treatment" style="float:right;height:290px; width:480px" class="alergy">'.stripslashes($rowa['Treatment']).'</textarea>
	</div>

<div style="width:470px; float:left;padding:2px;">
<h5>Theatre Summary</h5>
<div style="width:460px; float:left;padding:2px;height:315px; overflow-y:auto; border:1px solid #ccc;">';
				$resultb =mysqli_query($db, "select * from theatrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='OPD' order by id");
				$num_resultsb = mysqli_num_rows($resultb);	
				for ($i=0; $i <$num_resultsb; $i++) {
					$rowb=mysqli_fetch_array($resultb);
					if(stripslashes($rowb['status'])==1){$x='<b style="color:var(--color-danger, #DC2626)"> - [PENDING]</b>';}
					else{$x='<b style="color:#10504F"> - [COMPLETED]</b>';}
				
				echo'<a class="labels">Date: <b>'.stripslashes($rowb['date']).'</b></a>
				<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
				<a class="labels"><b>Theatre Procedures</b>'.$x.'</a><div class="cleaner"></div>
				<a class="labels">'.stripslashes($rowb['procedures']).'</a>
				<div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>
				<a class="labels"><b>Theatre Notes</b></a><div class="cleaner"></div>
				<a class="labels">'.stripslashes($rowb['notes']).'</a>
				<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';

				}


echo'</div></div>

</div>';

		if(isset($_SESSION['pharmcart'])){
							unset($_SESSION['pharmcart']);
						}
echo'<div id="tabs-10">

	<label for="recpharm" class="bh-visually-hidden">Recpharm</label><input type="checkbox" value="1" name="recpharm" id="recpharm" style="float:left;margin:8px 0 0 0px">
	<a class="labels" style="margin-left:10px"><b>Send Prescription to Pharmacy On Save</b></a>
	<a class="labels" style="margin-left:30px">Prescription Templates:</a>
	<div class="ui-widget" style="margin-left:25px; float:left;" id="widg7" >
								<label for="presct" class="bh-visually-hidden">Prescription Templates:</label><select id="presct" style="width:260px; margin-left:10px;">
								<option value="">Select one...</option>';
									$resultb =mysqli_query($db, "select * from prescriptions order by name asc");
									$num_resultsb = mysqli_num_rows($resultb);	
									for ($i=0; $i <$num_resultsb; $i++) {
										$rowb=mysqli_fetch_array($resultb);
										echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
									}
								echo'</select>
								</div>
	
	
	 <div class="cleaner"></div>
	<div class="cleaner"></div>
	<a class="labels">Drug Name</a><a class="labels" style="margin-left:210px">Dosage</a>	
	<a class="labels" style="margin-left:100px">Route</a><a class="labels" style="margin-left:90px">Frequency</a>		
	<a class="labels" style="margin-left:100px">Duration</a><a class="labels" style="margin-left:70px">Quantity</a>
	<div class="cleaner"></div>';		
	echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
		<label for="txtextmedicinc" class="bh-visually-hidden">Quantity</label><select id="txtextmedicinc">';
			echo'<option value="38">HOSPITAL</option>';
		echo"<script>$('#txtextmedicinc').parent().find('input:first').width(100);</script>";
	echo'</select></div>';

	echo'
	<div class="cleaner"></div>		
	<div class="ui-widget" style="margin-left:0px; float:left;" >
		<label for="appcoDocOrder019" class="bh-visually-hidden">HOSPITAL</label><select class="drugname" id="appcoDocOrder019" style="width:260px; margin-left:0px;">
		<option value="">Select one...</option>';
			$resultb =mysqli_query($db, "select * from items where PHARMACY>0 and SalePrice>0 and CorporatePrice>0 and InsurancePrice>0 and Type='GOOD' and Category='PHARMACEUTICALS' order by ItemName");
			$num_resultsb = mysqli_num_rows($resultb);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$code=stripslashes($rowb['ItemCode']);
								$item=stripslashes($rowb['ItemName']);
								$sprice=stripslashes($rowb['SalePrice']);
								$cpr = stripslashes($rowb['CorporatePrice']);
								$ppr = stripslashes($rowb['InsurancePrice']);
								$categ = stripslashes($rowb['Category']);
								$catid = stripslashes($rowb['CategoryId']);
								$type = stripslashes($rowb['Type']);
								$bal = stripslashes($rowb['PHARMACY']);
								$coun = stripslashes($rowb['CO_UN']);
								$otcpr = stripslashes($rowb['OtcPrice']);
								$apapr = stripslashes($rowb['ApaPrice']);
								$pacis = stripslashes($rowb['PacisPrice']);
								$liason = stripslashes($rowb['LiasonPrice']);
								$mutual = stripslashes($rowb['OldMutualPrice']);
								$kplcmin = stripslashes($rowb['KplcMinetPrice']);
								$maklmat = stripslashes($rowb['MaklMaternityPrice']);
								$minetcs = stripslashes($rowb['MinetCivilServantsPrice']);
								echo"<option value=\"".$code."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$sprice."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$coun."ÃÂÃÂ¸".$otcpr."ÃÂÃÂ¸".$apapr."ÃÂÃÂ¸".$pacis."ÃÂÃÂ¸".$liason."ÃÂÃÂ¸".$mutual."ÃÂÃÂ¸".$kplcmin."ÃÂÃÂ¸".$maklmat."ÃÂÃÂ¸".$minetcs."\">".stripslashes($rowb['ItemName'])." Bal: ".stripslashes($rowb['PHARMACY'])."</option>";

							}
								echo'</select>
								</div>
	<input type="hidden" disabled="disabled" id="txtproductcode" class="input_field" style="width:20px; margin-left:5px;display:none;"/>
	<input type="hidden" disabled="disabled" id="dname" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="dbal" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprnormal" name"txtprnormal" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate" name="txtprcorporate" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprinsurance" name="txtprinsurance" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="price254" class="input_field" style="width:70px; margin-left:10px;border-color:var(--color-danger, #DC2626);display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhcateg" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid" name="txtcatid" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtype" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtprice" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtdisc"  class="input_field" value="0" style="width:60px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhsub44" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>	
	<input type="hidden" disabled="disabled" id="lcmhtotal44" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';

	
	echo'<label for="dr9" class="bh-visually-hidden">Text field</label><input type="text" id="dr9" class="in_field" value="" style="width:30px; float:left; margin-left:50px;padding:6px 5px"/> 
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
		
		<div class="ui-widget" style="margin-left:35px; float:left;" >
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
		</div>
		
		
		<div class="ui-widget" style="margin-left:35px; float:left;" >
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
		</div>
		
		
		
		<label for="dr7" class="bh-visually-hidden">Oname</label><input type="text" id="dr7" name="oname" class="in_field" value="" style="width:30px; float:left; margin-left:50px;padding:6px 5px"/> 
		
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
		
<label for="txtqty019" class="bh-visually-hidden">This is the actual quantity that is billed.</label><input type="text" id="txtqty019" name="oname" class="in_field" maxlength="2" value="1" style="width:30px; float:left; margin-left:30px;padding:6px 5px" title="This is the actual quantity that is billed."/>';
		
 echo'<img alt="Document Add" src="images/document_add.png" style="margin-left:10px; width:30px; height:30px;float:left; cursor:pointer" onclick="addthispresc019()"/>';			
echo"<img alt=\"View Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-left:5px; float:left\" title=\"View Cart\" onclick=\"viewpharmcartbill('nurse')\"/>";											

echo'<div class="cleaner_h5"></div>
	<div style="width:420px; float:left">';
	echo'<label for="prescription" class="bh-visually-hidden">Text field</label><textarea id="prescription" style="float:right;height:210px; width:400px" class="alergy">'.stripslashes($rowa['Prescription']).'</textarea>';
	echo'<div class="cleaner"></div>
	<input aria-label="Printrec" type="checkbox" value="1" name="printrec" style="float:left;margin:8px 3px 0 0px;"><a class="labels">Print Prescription on Save</a>
	</div>';

	echo'<div style="width:540px; float:left;padding:2px;">';
		echo'<div id="tabs4" style="height:260px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Prescriptions Summary.</a></li>';
					echo'<li><a href="#tabs-2">Edit Requests.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 echo'<div>';
							echo'<a class="labels" style="margin-top:10px;margin-bottom:5px">Date: <b>'.$transdate.'</b>&nbsp;&nbsp;&nbsp; Time: <b>'.$pharmtime.'</b></a>
								<div class="cleaner"></div>
							    <a class="labels">'.$pharmpresc.'</a>
							    <div class="cleaner" style="border-top:1px dashed #333; margin-bottom:2px;margin-top:2px"></div>';
					 echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="padding:0;">'; 
			 		echo'<div id="displayinv" style="width:600px;background-color:#;">';

			 		echo'</div>';
				echo'</div>';

		echo'</div>';
   echo'</div>';


	
echo'</div>';

echo'<div id="tabs-14">';
		   echo'<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:400px; overflow-y:auto;">';
		   		#echo'<h5>Invoice & Receipt Details</h5>';
		   		echo'<h5>Particulars:</h5>';

						$resultb =mysqli_query($db, "select * from sales where ClientId='".$pntno."' and old_patient_id='".$old_in_patient_id."' and Date='".date('Y/m/d')."'");
						$rowb=mysqli_fetch_array($resultb);
						$old_patient_id=stripslashes($rowb['old_patient_id']);
						$reg=stripslashes($rowb['ClientId']);
						$stat=stripslashes($rowb['Status']);


						echo '<table style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; padding:0; ">';
						echo'<tbody>';
						echo'<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0;">
						      <td>RcptNo</td>
						      <td>ItemName</td>
						      <td>Qty</td>
						      <td>Price</td>
						      <td>TotalPrice</td>
						    </tr>';

							$totalcoverage=0;$b=0;
							$resultb =mysqli_query($db, "select * from sales where ClientId='".$pntno."' and old_patient_id='".$old_in_patient_id."' and Date='".date('Y/m/d')."'");
						    $res_num = mysqli_num_rows($resultb);
						    for ($i=0; $i <$res_num; $i++) {
						    $rw254=mysqli_fetch_array($resultb);
							$itot=preg_replace('~,~', '', stripslashes($rw254['Qty'])) *  preg_replace('~,~', '', stripslashes($rw254['UnitPrice']));
							$b+=$itot;
							$totalcoverage+=preg_replace('~,~', '', stripslashes($rw254['TotalPrice']));

						    if($i%2==0){
						        echo'<tr style="width:100%; height:20px;padding:0; font-weight:normal ">';
						        }else{ echo'<tr style="width:100%; height:20px;padding:0; background:#f0f0f0; font-weight:normal  ">';}

						                 echo '<td>'.stripslashes($rw254['RcptNo']).'</td>';
						                 echo '<td>'.stripslashes($rw254['ItemName']).'</td>';
						                 echo '<td>'.stripslashes($rw254['Qty']).'</td>';
						                 echo '<td>'.stripslashes($rw254['UnitPrice']).'</td>';
						                 echo '<td>'.stripslashes($rw254['TotalPrice']).'</td>';
						        
						      echo "</tr>";
						    }
						echo'</tbody>';
						echo'</table>';


					    echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
						echo'<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">Total:<b>'.number_format($b, 2).'</b></p>';
					    echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';




		   echo'</div>';
		   echo'<div id="personal" style="border-right:1px solid #ccc; height:365px; margin-left:0px; width:150px; overflow-y:auto;display:none;">';
				   echo'<div style="float:left; padding-right:10px; border-right:0;width:0px">';
				  				 //echo "<h5>DISCHARGE</h5>";

				   echo'</div>';
				   echo'<div style="float:right; padding-left:10px">';
							echo'<div id="processdis" style="margin-top:10px; height:50px;"> </div>';

				   echo'</div>';
				echo'<label for="txttotalcoverage786" class="bh-visually-hidden">DISCHARGE</label><input type="text" id="txttotalcoverage786" class="input_field" style="width:80px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';

		   	echo'</div>';
		   	echo'<div id="personal" style="border:0; height:365px; margin-left:0px; width:300px; overflow-y:auto;display:none;">';

					   echo'<div style="float:left; padding-right:2px; border-right:0;width:100px;display:none;">';
					  				 echo "<h5>CO-UN</h5>";
				
					   echo'</div>';
					   echo'<div style="float:right;display:none;">';
					echo'<label for="totalcoverage786" class="bh-visually-hidden">CO-UN</label><input type="text" disabled="disabled" id="totalcoverage786" class="input_field" value="'.$totalcoverage.'" style="width:40px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';
						 echo'<label for="txtcoverage" class="bh-visually-hidden">CO-UN</label><input type="text" disabled="disabled" id="txtcoverage" class="input_field" style="width:20px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';
						 echo'<label for="txtinsurer_id" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="txtinsurer_id" class="input_field" value="'.$in_insurer_id.'" style="width:20px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';
						 echo'<label for="dept4rm" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="dept4rm" class="input_field" value="OPD" style="width:20px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';

	
								//echo'<div id="processdis1" style="margin-top:10px; height:50px;"> </div>';
								//echo'<div id="processdis2" style="margin-top:10px; height:50px;"> </div>';

					   echo'</div>';
					   //echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';


		     echo'</div>';


   echo'</div>';
	

  echo'<div id="tabs_phc_diagnosis" style="padding:0px;">';
		   #echo'<h5>PHC Diagnosis:</h5>';

	echo'<div style="width:995px;height:400px; float:left;padding:0px;">';
		echo'<div id="phcdiagnosis606" style="height:395px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs_phc_findiagnosis_summary">Find Diagnosis.</a></li>';
					echo'<li><a href="#tabs_phc_diagnosis_summary">Diagnosis Summary.</a></li>';
					echo'<li><a href="#tabs_phc_diseases_summary">Diseases Summary.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs_phc_findiagnosis_summary">';
							#echo'<div class="cleaner_h5"></div>';
					 		echo'<div id="disphcdiagtbl" class="" style="background-color:#123;">';
					 		echo'</div>';
					 		//echo'<p id="appco_status_message" name="appco_status_message" class="black"></p>';
					 		//echo'<p id="message" name="message" class="white"></p>';
					 		echo'<p><span id="appco_status_message" name="appco_status_message" class="black"></span></p>';
					 		echo'<p><span id="message" name="message" class="white"></span></p>';
					 		#echo'';

	                      echo'<table id="phcdiaginoisTable" class="display dataTable" width="100%">
	                                <thead>
	                                    <tr>
	                                        <th>Parent Name (Parent Code)</th>
	                                        <th>Name</th>
	                                        <th>Diagnosis Code</th>
	                                        <th>Action</th>
	                                    </tr>
	                                </thead>
	                                
	                            </table>';


				echo'</div>';
				echo'<div id="tabs_phc_diagnosis_summary" style="height:400px;padding:0px;overflow-y:auto;">';
					  echo'<div id="results">';
						echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333;">';
				$phcSqlQry =mysqli_query($db, "SELECT * FROM tblprescphcdiagnosis WHERE PatientNo='".$patid."' AND PatientId='".$old_in_patient_id."'  AND PrescId='".$old_in_presc_id."'  AND PrescNo='".$old_in_presc_no."' ");
				$num_rows = mysqli_num_rows($phcSqlQry);
								echo'<div id="chati" style="overflow-y:scroll">
										<div id="inside">
											<div id="title">
												<div id="figure1" style="width:450px">Parent Name/Parent Code</div>
												<div id="figure1" style="width:408px" title="ChildName">Name</div>
												<div id="figure1" style="width:100px">Diagnosis Code</div>
												<div id="figure1" style="width:50px">#</div>
											</div>';

										if($num_rows==0){									
											echo'<div class="cleaner_h5"></div>
											no records yet.';
										}

										$c=0;
											for ($i=1; $i <$num_rows +1; $i++) {
											$rwphc=mysqli_fetch_array($phcSqlQry);
											$code=stripslashes($rwphc['DiagnosisId']);
											$itcode=stripslashes($rwphc['PHCDiagnosisId']);
											#$status=stripslashes($rwphc['PrescNo']);
											$status=0;

													if($status==1){echo"<div class=\"normal\" id=\"normal".$code."\" style=\"width:1055px;background:#ccc\" >";}
													else {echo"<div class=\"normal\" id=\"normal".$code."\" style=\"width:1055px;\">";}

												  echo'<div class="figure2x" style="width:450px;">'.stripslashes($rwphc['DiagnosisParentNameParentCode']).'</div>
														<div class="figure2x" style="width:408px;">'.stripslashes($rwphc['DiagnosisChildName']).'</div>
														<div class="figure2x" style="width:100px;">'.stripslashes($rwphc['DiagnosisCode']).'</div>
														<input type="hidden" disabled="disabled" class="hidden" value="'.$old_in_patient_id.'" id="patientid'.$code.'" style="display:none;"/>
														<input type="hidden" disabled="disabled" class="hidden" value="'.$old_in_presc_id.'" id="oldprescid'.$code.'" style="display:none;"/>
														<input type="hidden" disabled="disabled" class="hidden" value="'.$old_in_presc_no.'" id="oldprescno'.$code.'" style="display:none;"/>
														<input type="hidden" disabled="disabled" class="hidden" value="'.$patid.'" id="oldpatid'.$code.'" style="display:none;"/>
													    <input type="hidden" disabled="disabled" class="hidden" value="OPD" id="dept4rm'.$code.'" style="display:none;"/>';	
					 	echo"<div class=\"figure2t\" style=\"height:16px;width:50px; border-right:1px solid #333\" id=\"deltempitem".$code."\" title=\"Delete Item\" onclick=\"deletephcDiagItem(".$code.",".$itcode.")\"><img alt=\"Empty\" src=\"images/empty.png\" style=\"width:20px;height:22px\"/></div>";					

												
											   echo'</div>';
											}
											
									echo'</div></div>';
									echo'<div class="cleaner_h10"></div>';
									echo'<div id="displaymes"></div>';
									echo'<div class="cleaner_h10"></div>';
						 	        echo'<div id="refresh_phc_diagnosis_ipd" class="" style="background-color:#123;"></div>';
						 		    echo'<div id="disp_phc_diagnosis_ipd" class="" style="background-color:#123;"></div>';


					    echo'</div>';
					  echo'</div>';


				echo'</div>';
				echo'<div id="tabs_phc_diseases_summary" style="padding:0;height:395px;overflow-x:hidden;">';
	
				     echo'<a class="labels" style="margin-left:20px;display:;">Type Diagnosis name and press enter:</a>
						<div class="ui-widget" style="margin-left:25px; float:left;display:;" id="widg4" >
						      <label for="diagt" class="bh-visually-hidden">Type Diagnosis name and press enter:</label><select id="diagt" style="width:260px; margin-left:10px;">
						      <option value="">Select one...</option>';
								$resultb =mysqli_query($db, "select * from diagnosis order by name asc");
								$num_resultsb = mysqli_num_rows($resultb);	
								for ($i=0; $i <$num_resultsb; $i++) {
									$rowb=mysqli_fetch_array($resultb);
									echo'<option value="'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
								}
						echo'</select>
						</div>';
						echo'<div class="cleaner_h5"></div>';
					    echo'<div style="width:520px;float:left;display:;">
								<label for="diagnosis" class="bh-visually-hidden">Text field</label><textarea id="diagnosis" style="float:left;height:256px; width:500px;display:;" class="alergy">'.stripslashes($rowa['Diagnosis']).''; 
								#'.stripslashes($rowa['Diagnosis']).'
									// $phcSqlQry =mysqli_query($db, "SELECT * FROM tblprescphcdiagnosis WHERE PatientNo='".$patid."' AND PatientId='".$old_in_patient_id."'  AND PrescId='".$old_in_presc_id."'  AND PrescNo='".$old_in_presc_no."' ");
									// $phc_num_row = mysqli_num_rows($phcSqlQry);$xa=1;	
									// for ($i=0; $i <$phc_num_row; $i++) {
									// 	$phcrw=mysqli_fetch_array($phcSqlQry);
									// 	echo'<p style="font-size:11px;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:-20px 0 0 0">'.stripslashes($phcrw['DiagnosisParentNameParentCode']).' : '.stripslashes($phcrw['DiagnosisChildName']).'</p>';
									// 	$xa++;
									// }
							echo'</textarea>
							</div>

							<div style="width:370px; border:1px solid #ccc; height:310px; float:left; margin-left:20px">
								<a class="labels" style="margin-left:20px;font-weight:bold">Diseases Summary:</a>';
								if(isset($_SESSION['dis'])){
										unset($_SESSION['dis']);
									}
								$_SESSION['diseases']=array();

						echo'<div class="cleaner_h5"></div>
						<div class="ui-widget"  style="float:left; margin-left:25px">
						    <label for="disease" class="bh-visually-hidden">Diseases Summary:</label><select id="disease" class="combos">
							<option value="">Select one...</option>';
							$resulta =mysqli_query($db, "select * from diseases order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$name=stripslashes($row['name']);
							$k=stripslashes($row['id']);
								echo"<option value=\"".$k."ÃÂÃÂ¸".$name."\">".$name."</option>";
							}
						echo'</select>
						</div>
						<div class="cleaner_h5"></div>
								<div id="diseases" style="width:100%;">';
					$parts=explode(';',stripslashes($rowa['DiagName']));
					foreach ($parts as $key => $val) {
					$_SESSION['dis'][$key]=$val;
						if($val!=''){
						echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismissdis(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
						}
				    }
								echo'</div>';

						echo'</div>';


				echo'</div>';

		echo'</div>';
		#echo'<input type="hidden" disabled="disabled" id="drug26docfee" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
   echo'</div>';

		   echo "";
		   echo'<script src="js/ddtscript.js"></script>';

		   


   echo'</div>';
	




echo'</div>';
	

	
					echo'</div>';																	
					break;
		case 22:break;
		case 23:break;


		
}