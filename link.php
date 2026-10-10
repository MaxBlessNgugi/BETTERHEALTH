<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include(__DIR__ . '/includes/db_fns.php');
bh_enforce_panel('link.php', isset($_GET['id']) ? $_GET['id'] : '');
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
#include __DIR__ . '/includes/func.php';
include __DIR__ . '/includes/compile.php';
#include __DIR__ . '/includes/components.php';
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}

?>
<script src="js/functions.js"></script>
<script src="js/help.js"></script>
<script src="js/ajax.js"></script>
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
    <link rel="stylesheet" href="css/font-awesome.min.css" />
     <link href='assets/vendor/DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
	
<script>
				
						$('#datepick').live('mouseover', function() {
						$( "#datepick" ).datepicker();
						function backal(d){
							alert(d);
							$( "#datepick" ).datepicker();
						}
				
						});
						$('#datepick2').live('mouseover', function() {
						$( "#datepick2" ).datepicker();
						});
						
						$('#datepick3').live('mouseover', function() {
						$( "#datepick3" ).datepicker();
						});
						$('#datepick4').live('mouseover', function() {
						$( "#datepick4" ).datepicker();
						});
						$('#datepick5').live('mouseover', function() {
						$( "#datepick5" ).datepicker();
						});
						$('#datepick6').live('mouseover', function() {
						$( "#datepick6" ).datepicker();
						});
						$('#datepick7').live('mouseover', function() {
						$( "#datepick7" ).datepicker();
						});
						$('#datepick8').live('mouseover', function() {
						$( "#datepick8" ).datepicker();
						});
		
		</script>
<script>
	$(function() {
		$( "#tabs" ).tabs();$( "#tabs2" ).tabs();
	});
	</script>
<script type="text/javascript">
$( "#ncalendar" ).dialog({autoOpen: false,modal: true});
$( "#newcalendar" ).click(function() {
		$( "#ncalendar" ).dialog( "open" );
		return false;
		});
		
$( "#nevent" ).dialog({autoOpen: false,modal: true});
$( "#newevent" ).click(function() {
		$( "#nevent" ).dialog( "open" );
	$('#pname2').val('');
	$('#pidd2').val('');
	$('#subject2').val('');
	$('#crex2').val(1);
	$('#eid2').val('');
	$('#location2').val('');
	$('#category2').val('');
	$('#datepick6').val('');
	$('#datepick4').val('');
	$('#datepick5').val('');
	$('#recpattern').val('');
	$('#status2').val('');
	$('#priority2').val('');
	$('#completer2').val('');
		return false;
		});

</script>
<script>window.onload = setupRefresh</script>
<script type="text/javascript" src="js/jquery.lightbox.js"></script>
<script src="assets/vendor/DataTables/datatables.min.js"></script>
		  <script src="js/ipdddtscript.js"></script>
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
            finalYear: 2022,
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

        $('#last_widget').monthpicker({selectedYear: 2009, startYear: 2004, finalYear: 2022, openOnFocus: false});

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
							   
	
$(function() {
 
			$('.rightclickarea').bind('contextmenu',function(e){
			var $cmenu = $(this).next();
			$('<div class="overlay"></div>').css({left : '0px', top : '0px',position: 'absolute', width:                                                   '100%', height: '100%', zIndex: '100' }).mouseover(function() {
				$(this).remove();
				$cmenu.hide();
			}).bind('contextmenu' , function(){return false;}).appendTo(document.body);
			$(this).next().css({ left: e.pageX, top: e.pageY, zIndex: '101' }).show(100);
 
			return false;
			 });
 
			 $('.vmenu .first_li').live('click',function() {
				if( $(this).children().size() == 1 ) {
						b=openlinks($(this).children().text());
						window[b]();
					$('.vmenu').hide();
					$('.overlay').hide();
				}
			 });
 
			 $('.vmenu .inner_li span').live('click',function() {
					alert($(this).text());
					$('.vmenu').hide();
					$('.overlay').hide();
			 });
 
 
			$(".first_li , .sec_li, .inner_li span").hover(function () {
				$(this).css({backgroundColor : '#E0EDFE' , cursor : 'pointer'});
			if ( $(this).children().size() >0 )
					$(this).find('.inner_li').show();	
					$(this).css({cursor : 'pointer',backgroundColor : '#E0EDFE'});
			}, 
			function () {
				$(this).css('background-color' , '#fff' );
				$(this).find('.inner_li').hide();
			});
 
 
		});
		</script>	
<link rel="stylesheet" href="css/custom.css">
<link href="css/page.css" rel="stylesheet" type="text/css" />
<?php
$id=$_GET['id'];

switch($id){
							
							
							
							case 1:
						echo"<script>$('#itemcat3').parent().find('input:first').width(150);
						$('#supplier1').parent().find('input:first').width(150);
						$('#itemcat2').parent().find('input:first').width(150);
						$('#supplier2').parent().find('input:first').width(150);</script>";				
	$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses Add/Edit stock items Panel-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");		

				$braid=$_GET['braid'];
				$bra=$_GET['bra'];

				// if($bra=='PHARMACEUTICALS'){
				//   $braid='1';
				// }
			echo'	<input type="hidden" id="cat" value="'.$bra.'"/><input type="hidden" id="braid" value="'.$braid.'"/>

							<div id="newstude">
	<div id="results">						
	<div id="block1" style="height:221px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">'.$_GET['bra'].'-Add Stock Item-'.$_GET['braid'].'</h5>';
	echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-25px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help37()\"/></div>";								
$result =mysqli_query($db, "select ItemCode from items order by ItemCode desc limit 0,1");
							$row=mysqli_fetch_array($result);
							if(mysqli_num_rows($result)==0){
							$itemcode=1;
							}else $itemcode=stripslashes($row['ItemCode']) + 1;
							
	echo'<a class="labels" style="margin-left:5px;display:none;">Item Code:</a>
				<label for="itcode1" class="bh-visually-hidden">Item Code:</label><input type="text" id="itcode1" class="input_field" disabled="disabled" style="width:50px; margin-left:10px;border-color:var(--color-danger, #DC2626);display:none;" value="'.$itemcode.'"/> 
						<a class="labels" style="margin-left:5px">Item Name:<span>*</span></a>
							  <label for="itname1" class="bh-visually-hidden">Item Name:</label><input type="text" id="itname1" class="input_field"  style="width:250px; margin-left:10px;"/> 
							  <a class="labels" style="margin-left:5px">Pack Size:<span>*</span></a>
							  <label for="packsize" class="bh-visually-hidden">Pack Size:</label><input type="text" id="packsize" class="input_field" value="1" style="width:50px; margin-left:10px;"/>';

				 echo'<a class="labels" style="margin:0 10 0 0px">&nbsp;&nbsp;Covered/UnCovered:&nbsp;&nbsp;</a>';
					 echo'<label for="coun1NHIF" class="bh-visually-hidden">Covereduncovered</label><input id="coun1NHIF"  name="covereduncovered" type="radio" style="margin:6px 2px 0px 0px;" value="YES" class="radio" checked="checked">&nbsp;Yes.
				          <label for="coun2NHIF" class="bh-visually-hidden">Covereduncovered</label><input id="coun2NHIF" name="covereduncovered" type="radio" style="margin:6px 2px 0px 0px;" value="NO" class="radio">&nbsp;No.'; 
		
							
				   echo'<div class="cleaner_h5"></div>
						<a class="labels">Category:<span>*</span></a>
						<div class="ui-widget" style="margin-left:5px;float:left; width:150px;">
							<label for="itemcat3" class="bh-visually-hidden">Category:</label><select class="select" id="itemcat3" style="width:150px;">
							<option value=""></option>';
							if($bra=='PROCUREMENT'){$result =mysqli_query($db, "select * from subcategories order by name");
							}else{$result =mysqli_query($db, "select * from subcategories where branch='".$bra."' order by name");}
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
							}
							echo'</select>	
							</div>';							
						echo'<a class="labels" style="margin-left:40px">Supplier:</a>
						<div class="ui-widget" style="margin-left:5px;float:left; width:150px; margin-right:5px">
							<label for="supplier1" class="bh-visually-hidden">Supplier:</label><select class="select" id="supplier1" style="width:150px; margin-left:10px;">
							<option></option>';
							$result =mysqli_query($db, "select * from creditsuppliers");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['CustomerId']).'">'.stripslashes($row['CustomerName']).'</option>';
							}
							echo'</select>	
							</div>
							<a class="labels" style="margin-left:35px" title="Minimum Bal Departmental wise">Min Bal(Dept):</a>
							<label for="mbal1" class="bh-visually-hidden">In terms of Units not parts</label><input type="text" id="mbal1" class="input_field"  style="width:30px; margin-left:2px;" title="In terms of Units not parts"/>';
						if($bra=='PHARMACEUTICALS'){
						echo'<a class="labels" style="margin-left:5px">Molecule:</a>
						<label for="molecule" class="bh-visually-hidden">Molecule:</label><input type="text" id="molecule" class="input_field"  style="width:30px; margin-left:10px;" value=""/>';
						}
					    echo'<div class="cleaner_h5"></div>
					<a class="labels" style="margin-left:5px;">Lead Time:</a>
						<label for="ltime1" class="bh-visually-hidden">Lead Time:</label><input type="text" id="ltime1" class="input_field"  style="width:50px; margin-left:10px;" />
							 <a class="labels" style="margin-left:5px;display:;">Expiry Date:</a>
							<input type="text" id="datepick4" class="input_field" value="'.date('Y/m/d').'"  style="width:90px; margin-left:10px;float:left;display:;" placeholder="dd/mm/yyyy"/>';
							echo'<a class="labels" style="margin-left:5px">Normal Price:<span>*</span></a>
						<label for="price1" class="bh-visually-hidden">Normal Price:</label><input type="text" id="price1" class="input_field"  style="width:50px; margin-left:10px;" value=""/>
							<a class="labels" style="margin-left:5px">Corp Price:<span>*</span></a>
						<label for="price2" class="bh-visually-hidden">Corp Price:</label><input type="text" id="price2" class="input_field"  style="width:50px; margin-left:10px;"/>';
						echo'<a class="labels" style="margin-left:5px">Ins. Price:<span>*</span></a>
						<label for="price3" class="bh-visually-hidden">Ins. Price:</label><input type="text" id="price3" class="input_field"  style="width:50px; margin-left:10px;"/>';
						echo'<div class="cleaner_h5"></div>';
						echo'<a class="labels" style="margin-left:5px">OTC Price:<span>*</span></a>
						<label for="price7" class="bh-visually-hidden">OTC Price:</label><input type="text" id="price7" class="input_field" style="width:50px; margin-left:10px;"/>';
						echo'<a class="labels" style="margin-left:5px" title="APA Price">APA Price:<span>*</span></a>
						<label for="price60" class="bh-visually-hidden">APA Price</label><input type="text" id="price60" class="input_field"  style="width:50px; margin-left:10px;" value="" title="APA Price"/>
						<a class="labels" style="margin-left:5px" title="Pacis Price">Pacis Price:<span>*</span></a>
						<label for="price61" class="bh-visually-hidden">Pacis Price</label><input type="text" id="price61" class="input_field"  style="width:50px; margin-left:10px;" value="" title="Pacis Price"/>
						<a class="labels" style="margin-left:5px" title="Liason Price">Liason Price:<span>*</span></a>
						<label for="price62" class="bh-visually-hidden">Liason Price</label><input type="text" id="price62" class="input_field"  style="width:50px; margin-left:10px;" value="" title="Liason Price"/>
						<a class="labels" style="margin-left:5px" title="Old Mutual Price">Old Mutual:<span>*</span></a>
						<label for="price63" class="bh-visually-hidden">Old Mutual Price</label><input type="text" id="price63" class="input_field"  style="width:50px; margin-left:10px;" value="" title="Old Mutual Price"/><div class="cleaner_h5"></div>
						<a class="labels" style="margin-left:5px" title="Kplc Minet Price">Kplc Minet:<span>*</span></a>
						<label for="price64" class="bh-visually-hidden">Kplc Minet Price</label><input type="text" id="price64" class="input_field"  style="width:50px; margin-left:10px;" value="" title="Kplc Minet Price"/>
						<a class="labels" style="margin-left:5px" title="Makl Maternity Price">Makl Maternity:<span>*</span></a>
						<label for="price65" class="bh-visually-hidden">Makl Maternity Price</label><input type="text" id="price65" class="input_field"  style="width:50px; margin-left:10px;" value="" title="Makl Maternity Price"/>
						<a class="labels" style="margin-left:5px" title="Minet Civil Servants Price">Minet CS:<span>*</span></a>
						<label for="price66" class="bh-visually-hidden">Minet Civil Servants Price</label><input type="text" id="price66" class="input_field"  style="width:50px; margin-left:10px;" value="" title="Minet Civil Servants Price"/>';
						#echo'<div class="cleaner_h5"></div>';
					
				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addstock2()\"/>";
				echo'<div id="res2" style="float:left;width:40px; height:40px; margin-left:10px"></div></div>
			<div style="height:245px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">'.$bra.'-Edit/Delete Stock Item-'.$_GET['braid'].'</h5>
	<a class="labels" style="margin-left:0px">Item Name:</a>
<div class="ui_widget"  style="margin-left:0px;float:left;">
		<label for="item55" class="bh-visually-hidden">Item Name:</label><select id="item55">
		<option value="">Select one...</option>';
		if($bra=='PROCUREMENT'){$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");}
		#else{$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");}
		else{$result =mysqli_query($db, "select * from items where Type='GOOD' and Category='".$bra."' order by ItemName");}
		
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pack=stripslashes($row['Pack']);
								$itcode = stripslashes($row['ItemCode']);
								$cat=stripslashes($row['SubCategory']);
								$lead = stripslashes($row['LeadTime']);

								$res_mbal =mysqli_query($db, "select * from minbal where ItemCode=".$itcode."");
								$num_row_mbal = mysqli_num_rows($res_mbal);
								if(mysqli_num_rows($res_mbal) > 0){
								$rw_mbal=mysqli_fetch_array($res_mbal);
								$mbal = stripslashes($rw_mbal[$userdep]);}
								else{ $mbal = 0; }
								
								$name = stripslashes($row['ItemName']);
								$sup = stripslashes($row['Supplier']);
								$mol = stripslashes($row['Molecule']);
								$spr = stripslashes($row['SalePrice']);
								$cpr = stripslashes($row['CorporatePrice']);
								$ppr = stripslashes($row['InsurancePrice']);
								$otcpr = stripslashes($row['OtcPrice']);
								$apapr = stripslashes($row['ApaPrice']);
								$pacis = stripslashes($row['PacisPrice']);
								$liason = stripslashes($row['LiasonPrice']);
								$mutual = stripslashes($row['OldMutualPrice']);
								$kplcmin = stripslashes($row['KplcMinetPrice']);
								$maklmat = stripslashes($row['MaklMaternityPrice']);
								$minetcs = stripslashes($row['MinetCivilServantsPrice']);
							echo'<option value="'.$itcode.'ÃÂÃÂ¸'.$pack.'ÃÂÃÂ¸'.$cat.'ÃÂÃÂ¸'.$mbal.'ÃÂÃÂ¸'.$lead.'ÃÂÃÂ¸'.$sup.'ÃÂÃÂ¸'.$name.'ÃÂÃÂ¸'.$spr.'ÃÂÃÂ¸'.$mol.'ÃÂÃÂ¸'.$cpr.'ÃÂÃÂ¸'.$ppr.'ÃÂÃÂ¸'.$otcpr.'ÃÂÃÂ¸'.$apapr.'ÃÂÃÂ¸'.$pacis.'ÃÂÃÂ¸'.$liason.'ÃÂÃÂ¸'.$mutual.'ÃÂÃÂ¸'.$kplcmin.'ÃÂÃÂ¸'.$maklmat.'ÃÂÃÂ¸'.$minetcs.'">'.stripslashes($row['ItemName']).'</option>';
							}

		echo'
	</select>
	</div>			
	
							  <input type="hidden" id="itcode2" class="input_field" disabled="disabled"  style="width:60px; margin-left:10px;border-color:var(--color-danger, #DC2626);display:none;"/> 
							 	  <a class="labels" style="margin-left:35px">Pack Size:<span>*</span></a>
							  <label for="packsize2" class="bh-visually-hidden">Pack Size:</label><input type="text" id="packsize2" class="input_field"  style="width:50px; margin-left:10px;"/> ';
							  echo'<a class="labels" style="margin:0 10 0 0px">&nbsp;&nbsp;Covered/UnCovered:&nbsp;&nbsp;</a>';
	         echo'<label for="cover1NHIF" class="bh-visually-hidden">Coun1covered</label><input id="cover1NHIF" name="coun1covered" type="radio" class="radio" style="margin:6px 2px 0px 0px;" value="YES" checked="checked">Yes.
				  <label for="cover2NHIF" class="bh-visually-hidden">Coun1covered</label><input id="cover2NHIF" name="coun1covered" type="radio" class="radio" style="margin:6px 2px 0px 0px;" value="NO">No.';
				   echo'<div class="cleaner_h5"></div>						
						<a class="labels" style="margin-left:5px;">Category:</a>
						<div class="ui-widget" style="margin-left:5px;float:left; width:150px; margin-right:5px">
							<label for="itemcat2" class="bh-visually-hidden">Category:</label><select class="select" id="itemcat2" style="width:150px; margin-left:10px;">
							<option value="">Select one...</option>';
							if($bra=='PROCUREMENT'){$result =mysqli_query($db, "select * from subcategories order by name");
							}else{$result =mysqli_query($db, "select * from subcategories where branch='".$bra."' order by name");}
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
							}
							echo'</select>	
							</div>
						<a class="labels" style="margin-left:40px">Supplier:</a>
						<div class="ui-widget" style="margin-left:5px;float:left; width:150px; margin-right:5px">
							<label for="supplier2" class="bh-visually-hidden">Supplier:</label><select class="select" id="supplier2" style="width:150px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from creditsuppliers");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['CustomerId']).'">'.stripslashes($row['CustomerName']).'</option>';
							}
							echo'</select>	
						</div>
						
						<a class="labels" style="margin-left:35px">Min Bal:</a>
						<label for="mbal2" class="bh-visually-hidden">Min Bal:</label><input type="text" id="mbal2" class="input_field"  style="width:50px; margin-left:5px;"/>
						<a class="labels" style="margin-left:5px">Molecule:</a>
						<label for="molecule2" class="bh-visually-hidden">Molecule:</label><input type="text" id="molecule2" class="input_field"  style="width:50px; margin-left:5px;" value=""/><div class="cleaner_h5"></div>
						<a class="labels" style="margin-left:5px">Lead Time:</a>
						<label for="ltime2" class="bh-visually-hidden">Lead Time:</label><input type="text" id="ltime2" class="input_field"  style="width:30px; margin-left:10px;" value=""/>
						<a class="labels" style="margin-left:5px;display:;">Expiry:</a>
						<input type="text" id="datepick3" class="input_field" value="'.date('d/m/Y').'"  style="width:90px; margin-left:10px;float:left;display:;" placeholder="dd/mm/yyyy"/>
						
						<a class="labels" style="margin-left:5px">Normal Price:<span>*</span></a>
					    <label for="sprice2" class="bh-visually-hidden">Normal Price:</label><input type="text" id="sprice2" class="input_field" style="width:50px; margin-left:10px; margin-right:10px;"/> 
						<a class="labels" style="margin-left:5px">Corp Price:<span>*</span></a>
						<label for="price4" class="bh-visually-hidden">Corp Price:</label><input type="text" id="price4" class="input_field" style="width:50px; margin-left:10px;"/>
						<a class="labels" style="margin-left:5px">Ins. Price:<span>*</span></a>
						<label for="price5" class="bh-visually-hidden">Ins. Price:</label><input type="text" id="price5" class="input_field" style="width:50px; margin-left:10px;"/><div class="cleaner_h5"></div>
						<a class="labels" style="margin-left:5px">OTC Price:<span>*</span></a>
						<label for="price6" class="bh-visually-hidden">OTC Price:</label><input type="text" id="price6" class="input_field" style="width:50px; margin-left:10px;"/>';

						echo'<a class="labels" style="margin-left:5px" title="APA Price">APA Price:<span>*</span></a>
						<label for="price70" class="bh-visually-hidden">APA Price</label><input type="text" id="price70" class="input_field"  style="width:50px; margin-left:10px;" title="APA Price"/>
						<a class="labels" style="margin-left:5px" title="Pacis Price">Pacis Price:<span>*</span></a>
						<label for="price71" class="bh-visually-hidden">Pacis Price</label><input type="text" id="price71" class="input_field"  style="width:50px; margin-left:10px;" title="Pacis Price"/>
						<a class="labels" style="margin-left:5px" title="Liason Price">Liason Price:<span>*</span></a>
						<label for="price72" class="bh-visually-hidden">Liason Price</label><input type="text" id="price72" class="input_field"  style="width:50px; margin-left:10px;" title="Liason Price"/>
						<a class="labels" style="margin-left:5px" title="Old Mutual Price">Old Mutual:<span>*</span></a>
						<label for="price73" class="bh-visually-hidden">Old Mutual Price</label><input type="text" id="price73" class="input_field"  style="width:50px; margin-left:10px;" title="Old Mutual Price"/><div class="cleaner_h5"></div>
						<a class="labels" style="margin-left:5px" title="Kplc Minet Price">Kplc Minet:<span>*</span></a>
						<label for="price74" class="bh-visually-hidden">Kplc Minet Price</label><input type="text" id="price74" class="input_field"  style="width:50px; margin-left:10px;" title="Kplc Minet Price"/>
						<a class="labels" style="margin-left:5px" title="Makl Maternity Price">Makl Maternity:<span>*</span></a>
						<label for="price75" class="bh-visually-hidden">Makl Maternity Price</label><input type="text" id="price75" class="input_field"  style="width:50px; margin-left:10px;" title="Makl Maternity Price"/>
						<a class="labels" style="margin-left:5px" title="Minet Civil Servants Price">Minet CS:<span>*</span></a>
						<label for="price76" class="bh-visually-hidden">Minet Civil Servants Price</label><input type="text" id="price76" class="input_field"  style="width:50px; margin-left:10px;" title="Minet Civil Servants Price"/>';

						echo'<a class="labels" style="margin-left:5px">New Name:</a>
						<label for="itname2" class="bh-visually-hidden">New Name:</label><input type="text" id="itname2" class="input_field"  style="width:200px; margin-left:5px;"/><div class="cleaner_h5"></div>
						<a class="labels" style="margin-left:5px">Reason:</a>
						<input type="text" id="moredetails" class="input_field" placeholder="why you want to edit or delete"  style="width:200px; margin-left:5px;"/>';
							
				echo"<img alt=\"Edit Item\" src=\"images/back.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:-1px 0 0 2px; float:left\" title=\"Edit Item\" onclick=\"editstock2('".$bra."')\"/>";
				echo"<img alt=\"Delete Item\" src=\"images/empty.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:-1px 0 0 -1px; float:left\" title=\"Delete Item\" onclick=\"deleteitem(2)\"/>";
				#margin:-5px 0 0 10px;
						#echo'<div class="cleaner_h5"></div>';

		     // echo'<a class="labels" style="margin-left:5px;display:;">Expiry Date:</a>
			// 		<input type="text" id="datepick3" class="input_field" value="'.date('Y/m/d').'"  style="width:90px; margin-left:10px;float:left;display:;" placeholder="dd/mm/yyyy"/>';
				echo'<div id="res3" style="float:left;width:40px; height:50px; margin-left:10px"></div></div>
					
					<div style="height:0px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
					
					</div>			
							
										
									</div>
									
									<div id="recentstude">
										</div>
									</div>';
						break;
						
						case 2:
								
$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses Stock Transfer Panel-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");	
$issueno=$_GET['param'];
$result =mysqli_query($db, "select * from issuetable where IssueNo='".$issueno."' and status=1 order by TransNo asc");
$row=mysqli_fetch_array($result);
$dep1=stripslashes($row['Dep1']);
$dep2=stripslashes($row['Dep2']);
if($dep2=='PROCUREMENT'){$x='Bal';}else{$x=$dep2;}
echo'<div id="newstude">
	<div id="results" style="min-height:350px;">
	<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;">
							<h5 style="text-align:center;">Stock Transfer from '.$dep2.' to '.$dep1.'; ISSUE No: '.$issueno.'</h5>
							<div id="depbal" style="float:right; margin-right:10px"></div>';
									echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-25px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help57()\"/></div>";								
echo'<div class="cleaner_h5"></div>
	<div style="width:950px;height:400px; overflow-y:auto">
									<div id="title">
									<div id="figure1" style="margin-left:0px;width:300px">Item Name</div>
									<div id="figure1" style="width:80px">Pack</div>
									<div id="figure1" style="width:100px">Unit</div>
									<div id="figure1" style="width:100px">Part</div>
									<div id="figure1" style="width:100px">Transfer</div>
									<div id="figure1" style="width:91px">Revoke</div>
									<div id="figure1" style="width:30px">Save</div>
									</div>';
$result =mysqli_query($db, "select * from issuetable where IssueNo='".$issueno."' and status=1 order by TransNo asc");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$transno=stripslashes($row['TransNo']);
							$itcode=stripslashes($row['ItemCode']);
							$qty=stripslashes($row['Qty']);
							$packsize=stripslashes($row['Pack']);
							$resultx =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
							$rowx=mysqli_fetch_array($resultx);
							$cbal=stripslashes($rowx[$x]);
							if($cbal<$qty){echo"<div class=\"rightclickarea\" ><div class=\"normal\" id=\"normal".$transno."\" style=\"background:var(--color-danger, #DC2626)\" >";}
							else {echo"<div class=\"rightclickarea\" ><div class=\"normal\" id=\"normal".$transno."\" >";}
									echo"<div id=\"figure2\" style=\"width:300px\">".stripslashes($row['ItemName'])."</div>
										<div id=\"figure2\"  style=\"width:80px\">".stripslashes($row['Pack'])."</div>
									<div id=\"figure2\"  style=\"width:100px\">".stripslashes($row['UnitBox'])."</div>
									<div id=\"figure2\"   style=\"width:100px\">".stripslashes($row['PartBox'])."</div>
			<div id=\"transfer".$transno."\" class=\"figure2\" onclick=\"transfer(".$transno.")\" style=\"height:16px;width:100px; border-right:1px solid #333\">							<img alt=\"\" src=\"images/right3green.png\" width=\"20\" height=\"22\" /></div>
								<div id=\"revoke".$transno."\" class=\"figure2\" onclick=\"revoke(".$transno.")\" style=\"height:16px;width:100px; border-right:1px solid #333\">							<img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>
								
							<div id=\"newle\" style=\"width:30px; height:30px; float:right;margin:0px 10px 0 0\"><img alt=\"Update Stock Request\" src=\"images/plus.png\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Update Stock Request\" onclick=\"openprac(".$transno.",".$packsize.")\"/></div>
									</div></div>";

					echo'<div class="vmenu">';
		echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['ItemCode']).'ÃÂÃÂ¸12</span>Stock Availability</div>
		<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['ItemCode']).'ÃÂÃÂ¸13</span>Compare Purchase</div>
		</div>';
									
									}
									echo'</div><div id="mes"></div>';
							
	
	
	
	echo'</div>
	</div></div>';
	
							break;	
							case 3:
					echo"<script>$('#dept5').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">Stock Taking';
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
	
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="dept5" class="bh-visually-hidden">Text field</label><select id="dept5"  style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from branchtbl order by Branchname");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
			$row=mysqli_fetch_array($result);
			$bname=stripslashes($row['Branchname']);
			
			echo'<option value="'.$bname.'">'.stripslashes($row['Branchname']).'</option>';
		}
		echo'
			</select>
		</div>
	<div class="cleaner_h5"></div>
			
				</div>';	
							break;
							
							case 4:
					echo"<script>$('#dept6').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">Add/Edit Stock Items';
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
	
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="dept6" class="bh-visually-hidden">Text field</label><select id="dept6"  style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from categories where Type='GOOD' order by ItemCat");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$braid=stripslashes($row['CatId']);
								$braname=stripslashes($row['ItemCat']);
								echo"<option value=\"".$braid."ÃÂÃÂ¸".$braname."\">".$braname."</option>";
							}
		echo'
			</select>
		</div>
		<input type="hidden" id="braid" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
		<input type="hidden" id="braname" class="input_field"  style="display:none;width:50px; margin-left:5px;"/>
	<div class="cleaner_h5"></div>
			
				</div>';	
							break;
							
							case 5:
						
								echo"<script>
								$('#supname').focus();
								$('#itemxa').parent().find('input:first').width(230);</script>";
	echo'<script>document.onkeydown = keydown;
    	function keydown(evt){
      	if (!evt) evt = event;
		
		
			
		if (evt.keyCode==113){ //f2
		   evt.preventDefault();
		 $("#ampaid").focus();
	   }
	   if (evt.keyCode==115){ //f4
	   	evt.preventDefault();
      	$("#itemname1").parent().find("input:first").focus();	
	   }
		 if (evt.keyCode==119){ //f8
		 evt.preventDefault();
       viewcartret(); 
      	}
     	 if (evt.keyCode==112){ //f1
		 evt.preventDefault();
       	additemret(); 
      	}
		if (evt.keyCode==121){ //f10
		evt.preventDefault();
		submitret(); 
      	}
		if (evt.keyCode==123){ //f12
		evt.preventDefault();
		help60(); 
      	}
		if (evt.keyCode==120){ //f9
		evt.preventDefault();
        emptycartret(); 
      	}
		if (evt.keyCode==118){ //f7
		evt.preventDefault();
		deptbalance(); 
      	}
		
		if (evt.keyCode==116){ //f5
		evt.preventDefault();
		purchasesumm();
      	}
		
		if (evt.keyCode==114){ //f3
		evt.preventDefault();
		removelastret();
      	}
		
		 }</script>';
	echo"<script>$('#supname').parent().find('input:first').width(180);</script>";
	$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses Purchase Stock Panel-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");	
								echo'
							<div id="newstude">
	<div id="results">						
	<div style="height:186px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">Goods Returned Outwards</h5><div id="depbal" style="float:right; margin-right:10px"></div>';
	echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-25px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help60()\"/></div>";								
echo'
								<a class="labels">Supplier:<span>*</span></a>
						<div class="ui-widget" style="margin-left:5px;float:left; width:200px; margin-right:15px">
							<label for="supname" class="bh-visually-hidden">Supplier:</label><select class="select" id="supname" style="width:200px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from creditsuppliers");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['CustomerId']).'">'.stripslashes($row['CustomerName']).'</option>';
							}
							echo'</select>	
							</div><a class="labels" style="margin-left:5px">Invoice No:<span>*</span></a>
							  <label for="invoice" class="bh-visually-hidden">Invoice No:</label><input type="text" id="invoice" class="input_field"  style="width:80px; margin-left:10px;float:left"/> 
							<a class="labels" style="margin-left:5px">Date:</a>
							<label for="datepick" class="bh-visually-hidden">Date:</label><input type="text" id="datepick" class="input_field" value="'.date('Y/m/d').'"  style="width:100px; margin-left:10px;float:left"/>
							<a class="labels" style="margin-left:5px">LPO No:</a>
							  <label for="lpono" class="bh-visually-hidden">LPO No:</label><input type="text" id="lpono" class="input_field"  style="width:60px; margin-left:10px;float:left"/> 
							  <div class="cleaner_h5"></div><a class="labels">Item:<span>*</span></a>
							 <div class="ui-widget" style="margin-left:10px; float:left">
	<label for="itemxa" class="bh-visually-hidden">Item:</label><select id="itemxa" style="float:left">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$spr=stripslashes($row['SalePrice']);
								$itemc=stripslashes($row['ItemCode']);
								$itcost = stripslashes($row['PurchPrice']);
								$bal = stripslashes($row['PHARMACY']);
								$qsold = stripslashes($row['Qsold']);
								$qpurch = stripslashes($row['Qpurch']);
								$name = stripslashes($row['ItemName']);
								$pack = stripslashes($row['Pack']);
								
					echo'<option value="'.$spr.'ÃÂÃÂ¸'.$itemc.'ÃÂÃÂ¸'.$itcost.'ÃÂÃÂ¸'.$bal.'ÃÂÃÂ¸'.$qpurch.'ÃÂÃÂ¸'.$qsold.'ÃÂÃÂ¸'.$name.'ÃÂÃÂ¸'.$pack.'">'.stripslashes($row['ItemName']).'</option>';
							}
	echo'</select>
	</div>
					<label for="itemsale" class="bh-visually-hidden">Text field</label><input type="text" id="itemsale" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="itname7" class="bh-visually-hidden">Text field</label><input type="text" id="itname7" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="code" class="bh-visually-hidden">Text field</label><input type="text" id="code" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="itcost" class="bh-visually-hidden">Text field</label><input type="text" id="itcost" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="bal" class="bh-visually-hidden">Text field</label><input type="text" id="bal" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="qpurch" class="bh-visually-hidden">Text field</label><input type="text" id="qpurch" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="cusid" class="bh-visually-hidden">Text field</label><input type="text" id="cusid" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="vat" class="bh-visually-hidden">Text field</label><input type="text" id="vat" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="tvat" class="bh-visually-hidden">Text field</label><input type="text" id="tvat" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="qty" class="bh-visually-hidden">Text field</label><input type="text" id="qty" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="sp56" class="bh-visually-hidden">Text field</label><input type="text" id="sp56" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="pp56" class="bh-visually-hidden">Text field</label><input type="text" id="pp56" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					
							<a class="labels" style="margin-left:35px">Pack:</a>
							<label for="pack" class="bh-visually-hidden">Pack:</label><input type="text" id="pack" class="input_field"  style="width:40px; margin-left:10px;float:left; border-color:var(--color-danger, #DC2626)" disabled="disabled""/>
							
							<a class="labels" style="margin-left:5px">Unit:</a>
							<label for="unit58" class="bh-visually-hidden">Unit:</label><input type="text" id="unit58" class="input_field"  style="width:50px; margin-left:5px;float:left"/>
							<a class="labels" style="margin-left:5px">Part:</a>
							<label for="part58" class="bh-visually-hidden">Part:</label><input type="text" id="part58" class="input_field"  style="width:50px; margin-left:5px;float:left"/>
						<a class="labels" style="margin-left:5px">Batch No:<span>*</span></a>
							<label for="batch" class="bh-visually-hidden">Batch No:</label><input type="text" id="batch" class="input_field"  style="width:70px;margin-left:5px;float:left"/>
							 <div class="cleaner_h5"></div>	
							 <a class="labels" style="margin-left:5px">Expiry Date:</a>
							<label for="datepick2" class="bh-visually-hidden">Expiry Date:</label><input type="text" id="datepick2" class="input_field"  style="width:90px; margin-left:10px;float:left"/>
						<a class="labels" style="margin-left:5px">Reason:</a>
							<label for="reason" class="bh-visually-hidden">Reason:</label><input type="text" id="reason" class="input_field"  style="width:380px; margin-left:10px;float:left"/>
							<div class="cleaner_h5"></div>		
								<a class="labels" style="margin-left:5px">Pur. Price:</a>
							<label for="price58" class="bh-visually-hidden">Double Click to fetch price</label><input type="text" id="price58" class="input_field"  style="width:70px; margin-left:10px;float:left" title="Double Click to fetch price" ondblclick="fetchpurch()"/>
								<a class="labels" style="margin-left:5px">Total Price:</a>
							<label for="tprice" class="bh-visually-hidden">Total Price:</label><input type="text" disabled="disabled" id="tprice" class="input_field"  style="width:70px; margin-left:10px;float:left; border-color:var(--color-danger, #DC2626)"/>';
							
							
				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"additemret()\"/>";
				echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"View Current Cart\" onclick=\"viewcartret()\"/>";
				echo"<img alt=\"Empty Current Cart\" src=\"images/empty.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Empty Current Cart\" onclick=\"emptycartret()\"/>";
					 	
										
									echo'</div>
	<div id="itemsdisp" style="height:280px; width:766px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">Items</h5>
	<div id="display" style="margin-top:0px; height:250px;">
	
	</div>
	</div>				</div>
									
									<div id="recentstude">
									<h5 style="margin-left:10px">Receive Goods</h5>';
							if(isset($_SESSION['ret'])){
							$max=count($_SESSION['ret']);
							$tprice=0;$tvat=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['ret'][$i][6]);
							}
							echo"<script>$('#totitems').val(".$max.")</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
							}
							
							echo'<a class="labels" style="margin-left:5px">Total Items:</a>';
							echo'<label for="totitems" class="bh-visually-hidden">Total Items:</label><input type="text" disabled="disabled" id="totitems" class="input_field"  style="float:right;width:100px; margin-left:10px;border-color:var(--color-danger, #DC2626);" value=""/>
							<div class="cleaner_h5"></div>
							<a class="labels" style="margin-left:5px">Total Amount:</a>
							<label for="totprice" class="bh-visually-hidden">Total Amount:</label><input type="text" disabled="disabled" id="totprice" class="input_field"  style="float:right;width:100px; margin-left:10px;border-color:var(--color-danger, #DC2626);" value=""/>
								
							<div class="cleaner_h5"></div>
					<h5 style="border-bottom:2px solid #10504F"></h5>
					<div class="cleaner_h5"></div>';
							echo"<img alt=\"Submit\" src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:0px 0 0 60px; float:left\" title=\"Submit\" onclick=\"submitret()\"/>";
								echo'</div>
									</div>';
						
										
							break;	
							
							case 6:
							$code=$_GET['code'];
							$batch=$_GET['batch'];
							$invoice=$_GET['invoice'];
							$result =mysqli_query($db, "select * from purchases where InvoiceNo='".$invoice."' and  BatchNo='".$batch."' and ItemCode='".$code."'");
							$num_results = mysqli_num_rows($result);
							if($num_results>0){
							$row=mysqli_fetch_array($result);
							$itcost = stripslashes($row['PurchPrice']);
							echo"
										<script>
										$('#price58').val(".$itcost.");
										var pack = $('#pack').val();
										var part = $('#part58').val();
										if(part==''){part=0;}
										var unit1 = $('#unit58').val();
										var qty=(unit1*pack) + parseInt(part,10);
										var cost='".$itcost."';
										var cost=cost/pack;
										var tot=qty*cost;
										tot=Math.round(tot);
										sot=(tot).formatMoney(2, '.', ',');
										$('#tprice').val(sot);
										</script>";
							}else{echo"
										<script>
										$('#price58').val(0);
										</script>";}
							
							break;
							
							case 7:
							$code=$_GET['code'];
							$name=$_GET['name'];
							$pprice=$_GET['pprice'];
							$total=$_GET['total'];
							$unit1=$_GET['unit1'];
							$part=$_GET['part'];
							$batch=$_GET['batch'];
							$date=$_GET['date'];
							$sname=$_GET['sname'];
							$invoice=$_GET['invoice'];
							$expiry=$_GET['expiry'];
							$qty=$_GET['qty'];
							$lpo=$_GET['lpo'];
							$reason=$_GET['reason'];
							$pack=$_GET['pack'];
							$bal=$_GET['bal'];
							$tsale=$_GET['tsale'];
							$sid=$_GET['sid'];
							if(isset($_SESSION['ret'])){
							$max=count($_SESSION['ret']);
							$a=0;
							for ($i = 0; $i < $max; $i++){
								if($code==$_SESSION['ret'][$i][0]){
									$a++;
								}
							}
								if($a==0){
							$_SESSION['ret'][$max]=array($code,$name,$unit1,$part,$pprice,$date,$total,$sname,$batch,$invoice,$expiry,$lpo,$reason,$pack,$bal,$qty,$tsale,$sid);
							$max=count($_SESSION['ret']);
								}
								else{
								echo"
											<script>
											$().customAlert();
											alert('Sorry!', '<p>Item cannot be reentered. Remove the first entry if you want to make another entry.</p>');
											e.preventDefault();
											</script>";	
											echo'<embed src="images/beep-08.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
											cartitemsret($max);
											exit;
								}
							}
							
							else{
							$_SESSION['ret']=array(array());
							$_SESSION['ret'][0]=array($code,$name,$unit1,$part,$pprice,$date,$total,$sname,$batch,$invoice,$expiry,$lpo,$reason,$pack,$bal,$qty,$tsale,$sid);
							$max=count($_SESSION['ret']);}
							echo'<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
							$tprice=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['ret'][$i][6]);
							
							}
							echo"<script>$('#totitems').val(".$max.")</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
							cartitemsret($max);
							
					break;	
					
					case 8:
					
					echo'<embed src="images/beep-08.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					if(isset($_SESSION['ret'])){
							$max=count($_SESSION['ret']);
							cartitemsret($max);
					}
					else	{ echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>The Current Return cart is empty.</p>');
										e.preventDefault();
										</script>";
										
									}
								
					break;
					
					case 9:
					
					
					if(isset($_SESSION['ret'])){
							unset($_SESSION['ret']);
							echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
							echo"<script>$('#totitems').val('');
							$('#totprice').val('');$('#totdisc').val('');$('#fintot').val('');$('#ampaid').val('');
							$('#change').val('');
							</script>";
					}
					else	{ echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>The Current cart is already empty.</p>');
										e.preventDefault();
										</script>";
										
									}
								
					break;
					
					case 10:
					$pid=$_GET['pid'];
					unset($_SESSION['ret'][$pid]);
					echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					$_SESSION['ret']=array_values($_SESSION['ret']);
					$max=count($_SESSION['ret']);
					$tprice=0;$tvat=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['ret'][$i][6]);
							}
							echo"<script>$('#totitems').val(".$max.")</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
					cartitemsret($max);
								
					break;
					
					case '10.1':
					end($_SESSION['ret']);
					$pid= key($_SESSION['ret']);
					unset($_SESSION['ret'][$pid]);
					echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					$_SESSION['ret']=array_values($_SESSION['ret']);
					$max=count($_SESSION['ret']);
					$tprice=0;$tvat=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['ret'][$i][6]);
							}
							echo"<script>$('#totitems').val(".$max.")</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
					cartitemsret($max);
								
					break;
					
					
					case 11:
					echo"<script>$('#supname').focus();$('#itemxa').parent().find('input:first').width(330);</script>";
	echo'<script>document.onkeydown = keydown;
    	function keydown(evt){
      	if (!evt) evt = event;
		
			if (evt.keyCode==113){ //f2
		   evt.preventDefault();
		 $("#ampaid").focus();
	   }
	   if (evt.keyCode==115){ //f4
	   	evt.preventDefault();
      	$("#itemname1").parent().find("input:first").focus();	
	   }
		 if (evt.keyCode==119){ //f8
		 evt.preventDefault();
     viewcartlpo(); 
      	}
     	 if (evt.keyCode==112){ //f1
		 evt.preventDefault();
      additemlpo(); 
      	}
		if (evt.keyCode==121){ //f10
		evt.preventDefault();
		submitlpo(); 
      	}
		if (evt.keyCode==123){ //f12
		evt.preventDefault();
		help39(); 
      	}
		if (evt.keyCode==120){ //f9
		evt.preventDefault();
       emptycartlpo(); 
      	}
		if (evt.keyCode==118){ //f7
		evt.preventDefault();
		deptbalance(); 
      	}
		
		if (evt.keyCode==116){ //f5
		evt.preventDefault();
		purchasesumm();
      	}
		
		if (evt.keyCode==114){ //f3
		evt.preventDefault();
		removelastlpo();
      	}
		
		
     	 
    }</script>';
	echo"<script>$('#supname').parent().find('input:first').width(180);</script>";
	$result = mysqli_query($db, "insert into log values('0','".$username." accesses Local Purchase Order Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	
								echo'
							<div id="newstude">
	<div id="results">						
	<div style="height:156px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">Local Purchase Order</h5><div id="depbal" style="float:right; margin-right:10px"></div>';
								
echo'
								<a class="labels">Supplier:<span>*</span></a>
						<div class="ui-widget" style="margin-left:5px;float:left; width:200px; margin-right:15px">
							<label for="supname" class="bh-visually-hidden">Supplier:</label><select class="select" id="supname" style="width:200px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from creditsuppliers");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['CustomerName']).'">'.stripslashes($row['CustomerName']).'</option>';
							}
							echo'</select>	
							</div><a class="labels" style="margin-left:5px">Date:</a>
							<label for="datepick" class="bh-visually-hidden">Date:</label><input type="text" id="datepick" class="input_field" value="'.date('Y/m/d').'"  style="width:100px; margin-left:10px;float:left"/>
							<div class="cleaner_h5"></div><a class="labels">Item Name:<span>*</span></a>
							 <div class="ui-widget" style="margin-left:10px; float:left">
	<label for="itemxa" class="bh-visually-hidden">Item Name:</label><select id="itemxa" style="float:left">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$spr=stripslashes($row['SalePrice']);
								$itemc=stripslashes($row['ItemCode']);
								$itcost = stripslashes($row['PurchPrice']);
								$bal = stripslashes($row['Bal']);
								$qsold = stripslashes($row['Qsold']);
								$qpurch = stripslashes($row['Qpurch']);
								$name = stripslashes($row['ItemName']);
								$pack = stripslashes($row['Pack']);
								
					echo'<option value="'.$spr.'ÃÂÃÂ¸'.$itemc.'ÃÂÃÂ¸'.$itcost.'ÃÂÃÂ¸'.$bal.'ÃÂÃÂ¸'.$qpurch.'ÃÂÃÂ¸'.$qsold.'ÃÂÃÂ¸'.$name.'ÃÂÃÂ¸'.$pack.'">'.stripslashes($row['ItemName']).'</option>';
							}
	echo'</select>
	</div>
					<label for="itemsale" class="bh-visually-hidden">Text field</label><input type="text" id="itemsale" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="itname7" class="bh-visually-hidden">Text field</label><input type="text" id="itname7" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="code" class="bh-visually-hidden">Text field</label><input type="text" id="code" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="itcost" class="bh-visually-hidden">Text field</label><input type="text" id="itcost" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="bal" class="bh-visually-hidden">Text field</label><input type="text" id="bal" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="qpurch" class="bh-visually-hidden">Text field</label><input type="text" id="qpurch" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="cusid" class="bh-visually-hidden">Text field</label><input type="text" id="cusid" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="vat" class="bh-visually-hidden">Text field</label><input type="text" id="vat" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="tvat" class="bh-visually-hidden">Text field</label><input type="text" id="tvat" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<label for="qty" class="bh-visually-hidden">Text field</label><input type="text" id="qty" value="" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
					<a class="labels" style="margin-left:35px">Pack:</a>
							<label for="pack" class="bh-visually-hidden">Pack:</label><input type="text" id="pack" class="input_field"  style="width:40px; margin-left:10px;float:left; border-color:var(--color-danger, #DC2626)" disabled="disabled""/>
							
							<a class="labels" style="margin-left:5px">Unit:</a>
							<label for="unit59" class="bh-visually-hidden">Unit:</label><input type="text" id="unit59" class="input_field"  style="width:50px; margin-left:5px;float:left"/>
							<a class="labels" style="margin-left:5px">Part:</a>
							<label for="part59" class="bh-visually-hidden">Part:</label><input type="text" id="part59" class="input_field"  style="width:50px; margin-left:5px;float:left"/>
							<div class="cleaner_h10"></div>	
							<a class="labels" style="margin-left:5px">Pur. Price:</a>
							<label for="price59" class="bh-visually-hidden">Double Click to fetch price</label><input type="text" id="price59" class="input_field"  style="width:70px; margin-left:5px;float:left" title="Double Click to fetch price" ondblclick="fetchpurch()"/>
								
								<a class="labels" style="margin-left:5px">Total Price:</a>
							<label for="tprice" class="bh-visually-hidden">Total Price:</label><input type="text" disabled="disabled" id="tprice" class="input_field"  style="width:70px; margin-left:10px;float:left; border-color:var(--color-danger, #DC2626)"/>';
							
							
				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"additemlpo()\"/>";
				echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"View Current Cart\" onclick=\"viewcartlpo()\"/>";
				echo"<img alt=\"Empty Current Cart\" src=\"images/empty.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Empty Current Cart\" onclick=\"emptycartlpo()\"/>";
					 	
										
									echo'</div>
	<div id="itemsdisp" style="height:310px; width:766px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5 style="text-align:center">Items</h5>
	<div id="display" style="margin-top:0px; height:280px;">
	
	</div>
	</div>				</div>
									
									<div id="recentstude">
									<h5 style="margin-left:10px">Submit LPO</h5>';
							if(isset($_SESSION['lpo'])){
							$max=count($_SESSION['lpo']);
							$tprice=0;$tvat=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['lpo'][$i][6]);
							}
							echo"<script>$('#totitems').val(".$max.")</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
							}
							
							echo'<a class="labels" style="margin-left:5px">Total Items:</a>';
							echo'<label for="totitems" class="bh-visually-hidden">Total Items:</label><input type="text" disabled="disabled" id="totitems" class="input_field"  style="float:right;width:100px; margin-left:10px;border-color:var(--color-danger, #DC2626);" value=""/>
							<div class="cleaner_h5"></div>
							<a class="labels" style="margin-left:5px">Total Amount:</a>
							<label for="totprice" class="bh-visually-hidden">Total Amount:</label><input type="text" disabled="disabled" id="totprice" class="input_field"  style="float:right;width:100px; margin-left:10px;border-color:var(--color-danger, #DC2626);" value=""/>
								
							<div class="cleaner_h5"></div>
					<h5 style="border-bottom:2px solid #10504F"></h5>
					<div class="cleaner_h5"></div>';
							echo"<img alt=\"Submit\" src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:0px 0 0 60px; float:left\" title=\"Submit\" onclick=\"submitlpo()\"/>";
								echo'</div>
									</div>';
						
										
							break;	
							
							case 12:
							$code=$_GET['code'];
							$name=$_GET['name'];
							$pprice=$_GET['pprice'];
							$total=$_GET['total'];
							$unit1=$_GET['unit1'];
							$part=$_GET['part'];
							$date=$_GET['date'];
							$sname=$_GET['sname'];
							$qty=$_GET['qty'];
							$pack=$_GET['pack'];
							$bal=$_GET['bal'];
							if(isset($_SESSION['lpo'])){
							$max=count($_SESSION['lpo']);
							$a=0;
							for ($i = 0; $i < $max; $i++){
								if($name==$_SESSION['lpo'][$i][1]){
									$a++;
								}
							}
								if($a==0){
							$_SESSION['lpo'][$max]=array($code,$name,$unit1,$part,$pprice,$date,$total,$sname,$pack);
							$max=count($_SESSION['lpo']);
								}
								else{
								echo"
											<script>
											$().customAlert();
											alert('Sorry!', '<p>Item cannot be reentered. Remove the first entry if you want to make another entry.</p>');
											e.preventDefault();
											</script>";	
											echo'<embed src="images/beep-08.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
											cartitemslpo($max);
											exit;
								}
							}
							
							else{
							$_SESSION['lpo']=array(array());
							$_SESSION['lpo'][0]=array($code,$name,$unit1,$part,$pprice,$date,$total,$sname,$pack);
							$max=count($_SESSION['lpo']);}
							echo'<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
							$tprice=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['lpo'][$i][6]);
							
							}
							echo"<script>$('#totitems').val(".$max.");$('#unit59').val('');$('#part59').val('');$('#price59').val('');$('#tprice').val('');</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
							cartitemslpo($max);
							
					break;	
					
					case 13:
					
					echo'<embed src="images/beep-08.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					if(isset($_SESSION['lpo'])){
							$max=count($_SESSION['lpo']);
							cartitemslpo($max);
					}
					else	{ echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>The Current Lpo cart is empty.</p>');
										e.preventDefault();
										</script>";
										
									}
								
					break;
					
					case 14:
					
					
					if(isset($_SESSION['lpo'])){
							unset($_SESSION['lpo']);
							echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
							echo"<script>$('#totitems').val('');
							$('#totprice').val('');$('#totdisc').val('');$('#fintot').val('');$('#ampaid').val('');
							$('#change').val('');
							</script>";
					}
					else	{ echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>The Current cart is already empty.</p>');
										e.preventDefault();
										</script>";
										
									}
								
					break;
					
					case 15:
					$pid=$_GET['pid'];
					unset($_SESSION['lpo'][$pid]);
					echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					$_SESSION['lpo']=array_values($_SESSION['lpo']);
					$max=count($_SESSION['lpo']);
					$tprice=0;$tvat=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['lpo'][$i][6]);
							}
							echo"<script>$('#totitems').val(".$max.")</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
					cartitemslpo($max);
								
					break;
					
					case '15.1':
					end($_SESSION['lpo']);
					$pid= key($_SESSION['lpo']);
					unset($_SESSION['lpo'][$pid]);
					echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					$_SESSION['lpo']=array_values($_SESSION['lpo']);
					$max=count($_SESSION['lpo']);
					$tprice=0;$tvat=0;$tdisc=0;$ftotal=0;
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['lpo'][$i][6]);
							}
							echo"<script>$('#totitems').val(".$max.")</script>
							<script>$('#totprice').val((".$tprice.").formatMoney(2, '.', ','))</script>";
					cartitemslpo($max);
								
					break;
					
					case 16:
					$a=$_GET['a'];
					echo"<script>$('#docx1').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			if($a==1){
				echo'Reprint Goods Received Note';
			}
			if($a==2){
				echo'Reprint Goods Return Note';
			}
			if($a==3){
				echo'Reprint Local Purchase Order';
			}
			
			if($a==4){
				echo'Reprint  Discharge Summary';
			}
			if($a==5){
				echo'Reprint Variance Report';
			}
				if($a==6){
				echo'Reprint Admission Form';
			}
				if($a==7){
				echo'Reprint Final Bill';
			}
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		
	<div id="op1">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="docx1" class="bh-visually-hidden">Text field</label><select id="docx1" class="docx" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$arr=array();
		if($a==1){
		$result =mysqli_query($db, "select * from purchases");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['PurchNo'])]=stripslashes($row['PurchNo']).'-'.stripslashes($row['Supplier']).'-'.stripslashes($row['PurchDate']);
			}
		}
		if($a==2){
		$result =mysqli_query($db, "select * from goodsreturned");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['gnrno'])]=stripslashes($row['gnrno']).'-'.stripslashes($row['sname']).'-'.stripslashes($row['date']);
			}
		}
		if($a==3){
		$result =mysqli_query($db, "select * from lpo");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['lpono'])]=stripslashes($row['lpono']).'-'.stripslashes($row['supplier']).'-'.stripslashes($row['date']);
			}
		}
		if($a==4){
		$result =mysqli_query($db, "select * from discharge");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['sumno'])]=stripslashes($row['sumno']).'-'.stripslashes($row['patname']).'-'.stripslashes($row['date']);
			}
		}
		
		if($a==5){
		$result =mysqli_query($db, "select * from variance");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['vno'])]=stripslashes($row['vno']).'-'.stripslashes($row['dept']).'-'.dateprint(stripslashes($row['date']));
			}
		}
		
		
								if($a==6){
		$result =mysqli_query($db, "select * from inpatients");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['PrescId'])]=stripslashes($row['PatName']).'-Patient No:'.stripslashes($row['PatId']).'-AdmDate'.stripslashes($row['AdmDate']);
			}
		}
		
							if($a==7){
		$result =mysqli_query($db, "select * from finalbill");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['invno'])]=stripslashes($row['patname']).'-Patient No:'.stripslashes($row['patid']).'-Date:'.dateprint(stripslashes($row['date'])).'-Inv No:'.stripslashes($row['rcptno']);
			}
		}
		
		
							
							foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$val.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	
			<div class="cleaner_h5"></div>
			
				</div>';	
							break;							
							case 17:
					
						echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Invoice Listing  (Inwards) Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Invoice Listing (Inwards) Rep.
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterinvoicelist();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							case '17.1':
					
						echo"<script>$('#itemname').parent().find('input:first').focus().width(230);</script>";
//$result = mysqli_query($db, "insert into log values('0','".$username." accesses Inventory Movement Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:250px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Stock Movement  Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Dept Name:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Dept Name:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">';
						if($usertype=='Admin'||$usertype=='Accountant'||$usertype=='Store'||$usertype=='Pharm'){
							echo'
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['Branchname']).'">'.stripslashes($row['Branchname']).'</option>';
							}
								}else{echo'<option value="'.$userdep.'">'.$userdep.'</option>';}
							echo'</select>
							</div>
						<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">From:</a>
				<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick" type="text">
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">To:</a>
				<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:right; margin-right:80px" id="datepick2" type="text">				
					<div class="cleaner"></div>
					<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px display:none;" name="viewall" value="1">
					<a class="labels" style="margin-left:10px; float:left display:none;">View All</a>
					
					<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterinvmov();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
								case 18:
					
					
						echo"<script>$('#reorderx').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Re-Order Level Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Re-Order Level-By Supplier
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="reorderx" class="bh-visually-hidden">Re-Order Level-By Supplier</label><select class="select" id="reorderx" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from creditsuppliers");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['CustomerId']).'">'.stripslashes($row['CustomerName']).'</option>';
							}
							echo'</select>	
					<div class="cleaner_h5"></div>
									
					</div>';
						
							break;
							case 19:
					
						echo"<script>$('#dep90').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Inventory Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

					$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Inventory Report-By Category
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="dep90" class="bh-visually-hidden">Inventory Report-By Category</label><select class="select" id="dep90" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from categories order by ItemCat");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".stripslashes($row['ItemCat'])."\">".stripslashes($row['ItemCat'])."</option>";
							}
							echo'</select>
							</div>
						<div class="cleaner_h5"></div>
				</div>';
							break;
							
							case 20:
						echo"<script>$('#dep90').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Purchases Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

					$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Inventory Report-By Supplier
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
				<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="dep90" class="bh-visually-hidden">Inventory Report-By Supplier</label><select class="select" id="dep90" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from creditsuppliers");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['CustomerId']).'">'.stripslashes($row['CustomerName']).'</option>';
							}
							echo'</select>	
						<div class="cleaner_h5"></div>
			</div>';
						
							break;
							
							case 21:
				echo"<script>$('#item89').parent().find('input:first').width(150).focus();$('#paatient89').parent().find('input:first').width(150).focus();$('#ac89').parent().find('input:first').width(150);</script>";
							
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Debtors Management Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							
							echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">Debtors Management<strong id="debtorp"></strong><strong id="debtord"></strong></h2>';
	echo'
								<div class="cleaner" style="border-bottom:2px solid #333"></div>
					<div id="tabs" style="width:1000px; height:436px; float:left; margin:5px 0 0 0px">
			<ul>
				<li><a href="#tabs-1">Receive Payments</a></li>
				<li><a href="#tabs-2">Add New Debtor</a></li>
				<li><a href="#tabs-3">Edit/Delete Debtors</a></li>
				<li><a href="#tabs-4">Statements</a></li>
				<li><a href="#tabs-5">Reprint Debtor Receipt</a></li>
				<li><a href="#tabs-6">Inpatient Debtors</a></li>
				</ul>
			<div id="tabs-1">
				<a class="labels" style="margin-left:10px">Debtor Name:</a>
			<div class="ui_widget"  style="margin-left:10px;float:left; width:200px">
		<label for="item89" class="bh-visually-hidden">Debtor Name:</label><select id="item89">
		<option value="">Select one...</option>';
			$resulta = mysqli_query($db, "select * from creditcustomers where CustomerId!=14 order by CustomerName");
			$num_resultsa = mysqli_num_rows($resulta);
			for ($i = 0; $i < $num_resultsa; $i++) {
				$rowa = mysqli_fetch_assoc($resulta);
				echo "<option value=\"" . intval($rowa['CustomerId']) . "\">" . stripslashes($rowa['CustomerName']) . "</option>";
			}
		echo'
		</select></div>
		<div class="ui_widget"  style="margin-left:20px;float:left; width:220px;">	
		<a class="labels" style="margin-right:10px">A/c:<span>*</span></a>					
		<label for="ac89" class="bh-visually-hidden">A/c:</label><select id="ac89" style="margin-left:10px">
		<option value="">Select one...</option>';
			$resulta = mysqli_query($db, "SELECT ledgerid,`name` FROM ledgers WHERE `type`='Asset' AND `category`='Bank' AND name!='MPESA' ");
			$num_resultsa = mysqli_num_rows($resulta);
			for ($i = 0; $i < $num_resultsa; $i++) {
				$rowa = mysqli_fetch_assoc($resulta);
				echo '<option value="' . intval($rowa['ledgerid']) . '">' . stripslashes($rowa['name']) . '</option>';
			}
		echo'</select>
		</div>
		<label for="bal" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="bal" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right"/>
				<a class="labels" style="margin-left:5px; float:right">Balance:</a>
<label for="total" class="bh-visually-hidden">Balance:</label><input type="text" disabled="disabled" id="total" value="0" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right"/>
				<a class="labels" style="margin-left:5px; float:right">Total:</a>
				<label for="refno" class="bh-visually-hidden">Total:</label><input type="text"  id="refno" class="input_field"  style="width:80px; margin-left:5px; float:right"/>
				<a class="labels" style="margin-left:5px; float:right">Ref No:</a>';
	 	echo'<div class="cleaner_h5"></div>';
echo'<div id="itemsdisp" style="height:320px; width:666px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<div id="display" style="margin-top:0px; height:330px;">
	
	</div>
	</div>	';
								echo"<input type=\"button\" value=\"Save\" id=\"submit\"  
								style=\"margin-left:60px; float:left; cursor:pointer;width:50px\"
								 class=\"in_field\" onclick=\"savepayrec();\"/>";
								
								echo'<input type="button" value="Exit" id="exit" style="margin-left:10px;
								 float:left; cursor:pointer;width:50px" class="in_field" 
								 onclick="hidenewstude();"/>';

// echo'<div class="ui_widget"  style="margin-right:30px;float:right; width:100px;display:none;">
// 		<select id="madeni606" disabled="disabled" style="display:none;">';
// 		echo'<option value="Bank">Bank</option>';
// 		echo'<option value="Cash">Cash</option>';
// 	echo"<script>$('#madeni606').parent().find('input:first').width(100);</script>";
// 	echo'</select>
// 	</div>';	
								 	
					echo'<div id="newstudent" style="float:right; margin-right:10px;height:40px;"></div>

				</div>
			
				
				<div id="tabs-2">';
				echo'<div class="ui_widget" style="margin-left:10px;float:left; width:200px;display:none;"><label for="paatient89" class="bh-visually-hidden">Cash</label><select id="paatient89"><option value="0" selected="selected">0</option>'; echo'</select></div>
					<input type="hidden" id="patno" class="input_field" value="0" placeholder="patno" style="width:50px; margin-left:10px;display:none;"/> 
				<a class="labels" style="margin-left:5px">Name:<span>*</span></a>
					<label for="cname1" class="bh-visually-hidden">Name:</label><input type="text" id="cname1" class="input_field"  style="width:190px; margin-left:10px;"/> 
						<a class="labels" style="margin-left:5px">Telephone:<span>*</span></a>
					<label for="tel1" class="bh-visually-hidden">Telephone:</label><input type="text" id="tel1" class="input_field" value="0726606834"  style="width:100px; margin-left:10px;"/>
					<a class="labels" style="margin-left:5px">Balance B/F:<span>*</span></a>
					<label for="obal1" class="bh-visually-hidden">Balance B/F:</label><input type="text" id="obal1" class="input_field" value="0"  style="width:100px; margin-left:10px;"/>';
				echo"<img alt=\"Add Account\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Account\" onclick=\"addnewcus()\"/>";
				echo'<div id="res2" style="float:left;width:40px; height:40px; margin-left:10px"></div>
				</div>		
				
				
				<div id="tabs-3">
		<a class="labels" style="margin-left:10px">Debtor Name:</a>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
		<label for="item29" class="bh-visually-hidden">Debtor Name:</label><select id="item29">
		<option value="">Select one...</option>';
			$resulta = mysqli_query($db, "select * from creditcustomers where CustomerId NOT IN('16','14') order by CustomerName");
			$num_resultsa = mysqli_num_rows($resulta);
			for ($i = 0; $i < $num_resultsa; $i++) {
				$row = mysqli_fetch_assoc($resulta);
				$cid = intval($row['CustomerId']);
				$name = trim(stripslashes($row['CustomerName']));
				$tel = trim(stripslashes($row['Tel']));
				$bal = floatval(preg_replace('~,~', '', $row['Bal']));
				echo '<option value="' . $cid . 'ÃÂÃÂ¸' . $name . 'ÃÂÃÂ¸' . $tel . 'ÃÂÃÂ¸' . $bal . '">' . stripslashes($row['CustomerName']) . '</option>';
			}
		echo'
		</select></div>
			<input type="hidden" id="cid2" class="input_field" disabled="disabled" style="width:80px; margin-left:10px;border-color:var(--color-danger, #DC2626);display:none;"/> 
				<div class="cleaner_h5"></div>
			 <a class="labels" style="margin-left:0px">Name:</a>
			<label for="cname2" class="bh-visually-hidden">Name:</label><input type="text" id="cname2" class="input_field" style="width:200px; margin-left:10px;"/>
			<a class="labels" style="margin-left:5px">Telephone:</a>
			<label for="tel2" class="bh-visually-hidden">Telephone:</label><input type="text" id="tel2" class="input_field"  style="width:100px; margin-left:10px;"/>
			
						';
						
							
				echo"<img alt=\"Edit Detail\" src=\"images/back.jpg\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:0px 0 0 10px; float:left\" title=\"Edit Detail\" onclick=\"savecredcust()\"/>";
				#echo"<img alt=\"Delete Debtor\" src=\"images/empty.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:0px 0 0 10px; float:left\" title=\"Delete Debtor\" onclick=\"delcreditcus()\"/>";
				echo'<div id="res3" style="float:left;width:40px; height:40px; margin-left:10px"></div>
				</div>
				
		<div id="tabs-5">
		<a class="labels" style="margin-left:10px">Search:</a>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
		<label for="item37" class="bh-visually-hidden">Search:</label><select id="item37">
		<option value="">Select one...</option>';
			$resulta = mysqli_query($db, "select * from debtreceipts where cname!='' order by id desc");
			$num_resultsa = mysqli_num_rows($resulta);
			for ($i = 0; $i < $num_resultsa; $i++) {
				$row = mysqli_fetch_assoc($resulta);
				echo '<option value="' . intval($row['id']) . '">' . stripslashes($row['cname']) . '-' . stripslashes($row['date']) . '-' . stripslashes($row['amount']) . '</option>';
			}
		echo'
		</select></div>
			
				</div>
				
		<div id="tabs-6">';
		
		$arr=array();
		$resulta = mysqli_query($db, "select patid,patname from tempbill where status=1");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								$arr[stripslashes($row['patid'])]=	stripslashes($row['patname']);
							}
			echo'<div id="chati" style="width:750px; height:350px; overflow-y:auto">';
				echo'<div id="inside" style="min-height:260px;">
									<div id="title">
									<div id="figure1"  style="margin-left:0px; width:150px">Pat Id</div>
									<div id="figure1"  style="margin-left:0px; width:300px">Pat Name</div>
									<div id="figure1" style="width:200px">Amount</div>
									</div>
								';				
				$a=0;			
		foreach ($arr as $key => $val) {
			
									$resulta =mysqli_query($db, "select * from tempbill where patid='".$key."' and status=1");
									$num_resultsa = mysqli_num_rows($resulta);
									$e=0;	
									for ($i=0; $i <$num_resultsa; $i++) {
										$row=mysqli_fetch_array($resulta);
										$e+=preg_replace('~,~', '', stripslashes($row['subnet']));
									}	
									if($a%2==0){
	echo"<div id=\"normal\" onclick=\"window.open('report.php?id=40&regn=' + ".$key.")\" >";
	}else{
		echo"<div id=\"normal\" style=\"background:#fff\" onclick=\"window.open('report.php?id=40&regn=' + ".$key.")\" >";
	}
								echo"<div id=\"figure2t\" style=\"width:152px;\">".$key."</div>
										<div id=\"figure2t\" style=\"width:300px\">".$val."</div>
										<div id=\"figure2t\" style=\"width:200px\">".$e."</div>
										</div>
										<div class=\"cleaner\"></div>";
								$a++;


							}
			
		echo'</div></div></div>
			
				<div id="tabs-4">
					<a class="labels" style="margin-left:5px">Debtor Name:</a>
					<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
					<label for="item30" class="bh-visually-hidden">Debtor Name:</label><select id="item30">
					<option value="">Select one...</option>';
						$resulta = mysqli_query($db, "select * from creditcustomers where  CustomerName!='' order by CustomerName");
						$num_resultsa = mysqli_num_rows($resulta);
						for ($i = 0; $i < $num_resultsa; $i++) {
							$row = mysqli_fetch_assoc($resulta);
							$cid = intval($row['CustomerId']);
							$name = stripslashes($row['CustomerName']);
							echo '<option value="' . $cid . '">' . stripslashes($row['CustomerName']) . '-' . $cid . '</option>';
						}
					echo'
					</select></div>
						<div class="cleaner_h5"></div>
							<a class="labels" style="margin-left:5px">From:</a>
						<label for="datepick" class="bh-visually-hidden">From:</label><input type="text" id="datepick" class="input_field"  style="float:left;width:190px; margin-left:50px;" value=""/>
							<div class="cleaner_h5"></div>
							<a class="labels" style="margin-left:5px">To:</a>
							<label for="datepick2" class="bh-visually-hidden">To:</label><input type="text" id="datepick2" class="input_field"  style="float:left;width:190px; margin-left:65px;" value=""/>
							<div class="cleaner_h5"></div>
							<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 0 0 10px;" name="viewall" value="1"/>
							<a class="labels" style="float:left;margin-left:5px">View All:</a>
							<div class="cleaner_h10"></div>';
							echo"<input type=\"button\" value=\"View\" id=\"submit\"  
								style=\"margin-left:60px; float:left; cursor:pointer;width:50px\"
								 class=\"in_field\" onclick=\"viewstatement();\"/>";
								
								echo'<input type="button" value="Exit" id="exit" style="margin-left:10px;
								 float:left; cursor:pointer;width:50px" class="in_field" 
								 onclick="hidenewstude();"/>	
								 	
								 
					</div>		
				
					
			

			</div></div>';

				break;
			
				
				case 22:
				$cus = trim(mysqli_real_escape_string($db, $_GET['cus']));
				$clientno = trim(mysqli_real_escape_string($db, $_GET['clientno']));
				// $cus=$_GET['cus'];
				// $clientno=$_GET['clientno'];

				$_SESSION['credinvoice']=array(array());
				unset($_SESSION['credinvoice'][0]);
				$max=count($_SESSION['credinvoice']);
	   echo"<script>$('#paciente606').parent().find('input:first').width(150);$('#forshow').parent().find('input:first').width(150);$('#forshow').attr('disabled','disabled'); $('#forshow').parent().find('input:first').prop('disabled',true);$('#forshow').parent().find('input:first').css({'border' : 'solid #ccc 1px'}); $('#madeni606').parent().find('input:first').width(150); $('#madeni606').attr('disabled','disabled');$('#madeni606').parent().find('input:first').prop('disabled',true); $('#madeni606').parent().find('input:first').css({'border' : 'solid #ccc 1px'});</script>";
	   echo'<div id="dvpaciente606" style="display:;">';
		   echo'<a class="labels" style="margin-left:0px">Patient Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:200px">
					<label for="paciente606" class="bh-visually-hidden">Patient Name:</label><select id="paciente606">
					<option value="">Select one...</option>';
					$resulta =mysqli_query($db, "select TransNo,PatId,PatName,Date,InvoiceNo from customerdebts where DrCr='dr' and CustomerId='".$cus."' and Status=1");
					$num_resultsa = mysqli_num_rows($resulta);	
					for ($i=0; $i <$num_resultsa; $i++) {
						$rowa=mysqli_fetch_array($resulta);
						echo"<option value=\"".stripslashes($rowa['PatId'])."\">".stripslashes($rowa['PatName'])."-[".stripslashes($rowa['Date'])."]-[:".stripslashes($rowa['InvoiceNo'])."]</option>";
				    }
					echo'</select>
				</div>';
echo'<a class="labels" style="margin-left:10px;">Mode:<span>*</span></a>';
echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:150px;">
		<label for="madeni606" class="bh-visually-hidden">Mode:</label><select id="madeni606" disabled="disabled">';
		echo'<option value="Bank">Bank</option>';
		echo'<option value="Cash">Cash</option>';
	echo"<script>$('#madeni606').parent().find('input:first').width(150);</script>";
	echo'</select>
	</div>';	

	    echo'</div>
			 <h5>Invoices</h5>';
				echo'<div id="chati" style="width:950px; height:280px;margin-top:-20px; overflow-y:auto">';
				#echo'<h5>Invoices</h5>';
echo"<a style=\"float:right; margin-right:10px; cursor:pointer; text-decoration:underline\" onclick=\"window.open('r/open-invoice-summary.php?id=2&rcptno=".$cus."')\">Print Open Invoices</a>";
				echo'<div id="inside" style="min-height:260px;">
									<div id="title">
									<div id="figure1"  style="margin-left:0px; width:50px">Check</div>
									<div id="figure1"  style="margin-left:0px; width:75px">Date</div>
									<div id="figure1" style="width:250px">Patient Details</div>
									<div id="figure1" style="width:120px">Invoice No</div>
									<div id="figure1" style="width:80px">Amount</div>
									<div id="figure1" style="width:80px">Paid</div>
									<div id="figure1" style="width:80px">Bal</div>
									<div id="figure1" style="width:90px">Paying</div>
									</div>
								';
								
				$result =mysqli_query($db, "select * from creditcustomers where CustomerId='".$cus."'");
				$row=mysqli_fetch_array($result);
				$bal=stripslashes($row['Bal']);
				echo"<script>$('#bal').val(".$bal.");
				bal=(".$bal.").formatMoney(2, '.', ',');
				$('#debtord').html('-Balance:' + bal);</script>";
				
				if ($clientno!='') {
					$resulta =mysqli_query($db, "select * from customerdebts where PatId='".$clientno."' and DrCr='dr' and Status=1 order by TransNo desc");
				} else {
					$resulta =mysqli_query($db, "select * from customerdebts where CustomerId='".$cus."' and DrCr='dr' and Status=1 order by TransNo desc");
				}
				
				$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
							$rowa = mysqli_fetch_assoc($resulta);
							$tno = intval($rowa['TransNo']);
							$invoiceno = intval($rowa['InvoiceNo']);
							$patid = intval($rowa['PatId']);
							$in_pat_id = stripslashes($rowa['old_patient_id']);
			echo"<div id=\"normal\" >";
echo"<div id=\"figure2t\" style=\"width:50px;height:16px; overflow:hidden\"><label for=\"check".$tno."\" class=\"bh-visually-hidden\">Check . Tno.</label><input type=\"checkbox\" id=\"check".$tno."\"  onclick=\"checkinv('" . $tno . "','" . stripslashes($rowa['Amount']) . "','" . stripslashes($rowa['CustomerId']) . "','" . stripslashes($rowa['CustomerName']) . "','" . stripslashes($rowa['InvoiceNo']) . "','" . stripslashes($rowa['InvBal']) . "','" . stripslashes($rowa['Paid']) . "','" . trim(stripslashes($rowa['trans_uid'])) . "')\"')\" name=\"check".$tno."\" value=\"1\" /></div>
<div id=\"figure2t\" style=\"width:75px;\">".dateprint(stripslashes($rowa['Date']))."</div>
<div id=\"figure2t\" style=\"width:250px;overflow:hidden\" onclick=\"generateNewCons('" . safe_encode($invoiceno) . "','" . safe_encode($patid) . "','" . safe_encode($in_pat_id) . "')\"  title=\"" . stripslashes($rowa['Description']) . "\" >" . stripslashes($rowa['PatName']) . "-[" . stripslashes($rowa['PatId']) . "]</div>
<div id=\"figure2t\" style=\"width:120px\">".stripslashes($rowa['InvoiceNo'])."</div>
<div id=\"figure2t\" style=\"width:80px\">" . floatval(preg_replace('~,~', '', $rowa['Amount'])) . "</div>
<div id=\"figure2t\" style=\"width:80px\">" . floatval(preg_replace('~,~', '', $rowa['Paid'])) . "</div>
<div class=\"figure2t\" id=\"invbal" . $tno . "\" style=\"width:80px\">" . floatval(preg_replace('~,~', '', $rowa['InvBal'])) . "</div>
			<div id=\"figure2t\" style=\"width:97px\"><label for=\"am" . $tno . "\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" onkeyup=\"checkinvbal(" . $tno . ")\" id=\"am" . $tno . "\" style=\"text-align:center; margin-top:-2px;width:70px\" /> </div>
			</div>
			<div class=\"cleaner\"></div>";
							}
							
							
				
				break;

	case 23:

		$tno = trim(mysqli_real_escape_string($db, $_GET['tno']));
		$inv_amount = floatval(str_replace(",", "", $_GET['amount']));
		$max = count($_SESSION['credinvoice']);
		$_SESSION['credinvoice'][$tno] = array($tno, $inv_amount, trim(mysqli_real_escape_string($db, $_GET['cid'])), trim(mysqli_real_escape_string($db, $_GET['cname'])), trim(mysqli_real_escape_string($db, $_GET['invno'])), floatval(str_replace(",", "", $_GET['bal'])), floatval(str_replace(",", "", $_GET['paying'])), floatval(str_replace(",", "", $_GET['invbal'])), floatval(str_replace(",", "", $_GET['paid'])), trim(mysqli_real_escape_string($db, $_GET['invref'])));


		break;

	case 24:

		$tno = trim(mysqli_real_escape_string($db, $_GET['tno']));
		// if (isset($_SESSION['credinvoice'][$tno])){
		// 		$result = mysqli_query($db, "SELECT Bal FROM creditcustomers WHERE CustomerId='" . intval($_SESSION['credinvoice'][$tno][2]) . "'");
		// 		$row = mysqli_fetch_assoc($result);
		// 		$total_unpaid_invoices_bal = floatval($row['Bal']);
		unset($_SESSION['credinvoice'][$tno]);
		$paying_total = 0;
		foreach ($_SESSION['credinvoice'] as $key => $credinvoice) {
			$paying_total += floatval(preg_replace('~,~', '', $_SESSION['credinvoice'][$key][6]));
		}

		die($paying_total);
		//}

		break;

	case 26:

		if (isset($_GET['patid']) && isset($_GET['patname']) && isset($_GET['amount']) && isset($_GET['mode']) && isset($_GET['cid']) && isset($_GET['cardno76']) && isset($_GET['rcvpayref76'])) {
			$patid = intval($_GET['patid']);
			$patname = trim(mysqli_real_escape_string($db, $_GET['patname']));
			$rcptno = trim(mysqli_real_escape_string($db, $_GET['rcptno']));
			$mode = trim(mysqli_real_escape_string($db, $_GET['mode']));
			$cid = intval($_GET['cid']);
			$cname = trim(mysqli_real_escape_string($db, $_GET['cname']));
			$cardno = trim(mysqli_real_escape_string($db, $_GET['cardno76']));
			$amount = floatval(preg_replace('~,~', '', trim($_GET['amount'])));
			$bill = floatval(preg_replace('~,~', '', trim($_GET['bill'])));
			$rcvpayref76 = trim(mysqli_real_escape_string($db, $_GET['rcvpayref76']));
			$bname76Id = intval($_GET['bname76Id']);
			$bname76 = trim(mysqli_real_escape_string($db, $_GET['bname76']));
			$rcv_copayment = trim(mysqli_real_escape_string($db, $_GET['rcv_copayment']));

			if ($mode == 'Bank' && ($bname76Id == 0 || $bname76 == '')) {
				echo "
					<script>
					$().customAlert();
					alert('Error!', '<p>Please select a bank and try again.</p>');
					e.preventDefault();
					</script>";
				exit;
			}


			if ($mode == 'Waiver') {
				$result = mysqli_query($db, "select * from waivers where patid='" . $patid . "' and waiverno='" . $rcvpayref76 . "' and stamp='" . date('Ymd') . "'");
				if (mysqli_num_rows($result) == 0) {
					echo "
											<script>
											$().customAlert();
											alert('Error!', '<p>Invalid waiver number.</p>');
											e.preventDefault();
											</script>";
					exit;
				}
			}

			if (isset($_SESSION['pay'])) {
				$max = count($_SESSION['pay']);
				$_SESSION['pay'][$max] = array($patid, $patname, $rcptno, $mode, $cid, $cname, $rcvpayref76, $amount, $bill, $cardno, $bname76Id, $bname76, $rcv_copayment);
				$max = count($_SESSION['pay']);
			} else {
				$_SESSION['pay'] = array(array());
				$_SESSION['pay'][0] = array($patid, $patname, $rcptno, $mode, $cid, $cname, $rcvpayref76, $amount, $bill, $cardno, $bname76Id, $bname76, $rcv_copayment);
				$max = count($_SESSION['pay']);
			}
			echo '<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
			$tpaid = 0;
			for ($i = 0; $i < $max; $i++) {
				$tpaid += floatval(preg_replace('~,~', '', $_SESSION['pay'][$i][7]));
			}
			// if(floatval($bill)< floatval($tpaid)){
			// 		die("<script type='text/javascript'>$().customAlert();alert('Error', '<p>Amount paid is less than amount bill. </p>');e.preventDefault();</script>");
			// }

			$bal = floatval($bill) - floatval($tpaid);
			echo "<script>$('#ampaid').val((" . $tpaid . ").formatMoney(2, '.', ','));
							$('#changeam').val((" . $bal . ").formatMoney(2, '.', ','))</script>";
			cartitemspay($max);
			exit;
		} else {
			die("<script type='text/javascript'>$().customAlert();alert('Error!', '<p>Bad Request</p>');e.preventDefault();</script>");
		}


		break;

					
					case 27:
					
					echo'<embed src="images/beep-08.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					if(isset($_SESSION['pay'])){
							$max=count($_SESSION['pay']);
							$tprice=0;$bill='';
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['pay'][$i][7]);
							$bill=$_SESSION['pay'][$i][8];
							}
							
							$bal=$bill-$tprice;
							echo"<script>$('#ampaid').val((".$tprice.").formatMoney(2, '.', ','));
							$('#changeam').val((".$bal.").formatMoney(2, '.', ','))</script>";
							cartitemspay($max);
					}
					else	{ echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>The Current Payments cart is empty.</p>');
										e.preventDefault();
										</script>";
										
									}
								
					break;
					
					case 28:
					
					
					if(isset($_SESSION['pay'])){
							unset($_SESSION['pay']);
							echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
							echo"<script>$('#totitems').val('');
							$('#lid76').val('');
							$('#lname76').val('');
							$('#ref76').val('');
							$('#amount76').val('');
							$('#ampaid').val('');
							$('#changeam').val('');
							</script>";
					}
					else	{ echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>The Current Pay cart is already empty.</p>');
										e.preventDefault();
										</script>";
										
									}
								
					break;
					
					case 29:
					$pid=$_GET['pid'];
					unset($_SESSION['pay'][$pid]);
					echo'<embed src="images/beep-01.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';
					$_SESSION['pay']=array_values($_SESSION['pay']);
					$max=count($_SESSION['pay']);
					$tprice=0;$bill='';
							for ($i = 0; $i < $max; $i++){
							$tprice+=preg_replace('~,~', '', $_SESSION['pay'][$i][7]);
							$bill=$_SESSION['pay'][$i][8];
							}
							
							$bal=$bill-$tprice;
							echo"<script>$('#ampaid').val((".$tprice.").formatMoney(2, '.', ','));
							$('#changeam').val((".$bal.").formatMoney(2, '.', ','))</script>";
							cartitemspay($max);
								
					break;
					
						case 30:
				echo"<script>$('#item79').parent().find('input:first').width(150).focus();$('#ac79').parent().find('input:first').width(150);</script>";
							
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Creditors/Vendors Management Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							
							echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">Creditors/Vendors Management<strong id="debtorp"></strong><strong id="debtord"></strong></h2>';
	echo'
								<div class="cleaner" style="border-bottom:2px solid #333"></div>
					<div id="tabs" style="width:1000px; height:436px; float:left; margin:5px 0 0 0px">
			<ul>
				<li><a href="#tabs-1">Make Payments</a></li>
				<li><a href="#tabs-2">Add New Creditor</a></li>
				<li><a href="#tabs-3">Edit/Delete Creditors</a></li>
				<li><a href="#tabs-4">Statements</a></li>
				</ul>
			<div id="tabs-1">
				<a class="labels" style="margin-left:10px">Creditor Name:</a>
			<div class="ui_widget"  style="margin-left:10px;float:left; width:200px">
		<label for="item79" class="bh-visually-hidden">Creditor Name:</label><select id="item79">
		<option value="">Select one...</option>';
		$resulta = mysqli_query($db, "SELECT CustomerId,CustomerName FROM creditsuppliers ORDER BY CustomerName");
		$num_resultsa = mysqli_num_rows($resulta);
		for ($i = 0; $i < $num_resultsa; $i++) {
			$rowa = mysqli_fetch_assoc($resulta);
			echo "<option value=\"" . intval($rowa['CustomerId']) . "\">" . stripslashes($rowa['CustomerName']) . "</option>";
		}
		echo'
		</select></div>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:220px;">	
		<a class="labels" style="margin-left:20px">A/c:<span>*</span></a>					
		<label for="ac79" class="bh-visually-hidden">A/c:</label><select id="ac79" style="margin-left:10px">
		<option value="">Select one...</option>';
		$resulta = mysqli_query($db, "SELECT ledgerid,`name` FROM ledgers WHERE `type`='Asset' AND `category` IN('Bank','Cash') ");
		$num_resultsa = mysqli_num_rows($resulta);
		for ($i = 0; $i < $num_resultsa; $i++) {
			$rowa = mysqli_fetch_assoc($resulta);
			echo '<option value="' . intval($rowa['ledgerid']) . '">' . stripslashes($rowa['name']) . '</option>';
		}
		echo'</select>
		</div>

		<label for="bal" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="bal" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right"/>
				<a class="labels" style="margin-left:5px; float:right">Balance:</a>
<label for="total" class="bh-visually-hidden">Balance:</label><input type="text" disabled="disabled" id="total" value="0" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right"/>
				<a class="labels" style="margin-left:5px; float:right">Total:</a>
					<label for="refno" class="bh-visually-hidden">Total:</label><input type="text"  id="refno" class="input_field"  style="width:80px; margin-left:5px; float:right"/>
				<a class="labels" style="margin-left:5px; float:right">Ref No:</a>';
				echo'
	<div id="itemsdisp" style="height:350px; width:666px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
	<h5>Invoices</h5>
	<div id="display" style="margin-top:0px; height:330px;">
	
	</div>
	</div>	';
								echo"<input type=\"button\" value=\"Save\" id=\"submit\"  
								style=\"margin-left:60px; float:left; cursor:pointer;width:50px\"
								 class=\"in_field\" onclick=\"savepayrec2();\"/>";
								
								echo'<input type="button" value="Exit" id="exit" style="margin-left:10px;
								 float:left; cursor:pointer;width:50px" class="in_field" 
								 onclick="hidenewstude();"/>	
								 	
								 <div id="newstudent" style="float:right; margin-right:10px;height:40px; "></div>
				</div>
			
				
				<div id="tabs-2">
				<a class="labels" style="margin-left:5px">Name:<span>*</span></a>
					<label for="cname1" class="bh-visually-hidden">Name:</label><input type="text" id="cname1" class="input_field"  style="width:190px; margin-left:10px;"/> 
						<a class="labels" style="margin-left:5px">Telephone:<span>*</span></a>
					<label for="tel1" class="bh-visually-hidden">Telephone:</label><input type="text" id="tel1" class="input_field" value="0726606834"  style="width:100px; margin-left:10px;"/>
					<a class="labels" style="margin-left:5px">Arrears B/F:<span>*</span></a>
					<label for="obal1" class="bh-visually-hidden">Arrears B/F:</label><input type="text" id="obal1" class="input_field" value="0"  style="width:100px; margin-left:10px;"/>';
				echo"<img alt=\"Add Account\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Account\" onclick=\"addnewsup()\"/>";
				echo'<div id="res2" style="float:left;width:40px; height:40px; margin-left:10px"></div>
				</div>		
				
				
				<div id="tabs-3">
		<a class="labels" style="margin-left:10px">Creditor Name:</a>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
		<label for="item29" class="bh-visually-hidden">Creditor Name:</label><select id="item29">
		<option value="">Select one...</option>';
		$resulta = mysqli_query($db, "select * from creditsuppliers order by CustomerName");
		$num_resultsa = mysqli_num_rows($resulta);
		for ($i = 0; $i < $num_resultsa; $i++) {
			$row = mysqli_fetch_assoc($resulta);
			$cid = stripslashes($row['CustomerId']);
			$name = stripslashes($row['CustomerName']);
			$tel = stripslashes($row['Tel']);
			$bal = stripslashes($row['Bal']);
			echo '<option value="' . $cid . 'ÃÂÃÂ¸' . $name . 'ÃÂÃÂ¸' . $tel . 'ÃÂÃÂ¸' . $bal . '">' . stripslashes($row['CustomerName']) . '</option>';
		}
		echo'
		</select></div>
			<input type="hidden" id="cid2" disabled="disabled" class="input_field" style="width:80px; margin-left:10px;border-color:var(--color-danger, #DC2626);display:none;"/> 
				<div class="cleaner_h5"></div>
			 <a class="labels" style="margin-left:0px">Name:</a>
			<label for="cname2" class="bh-visually-hidden">Name:</label><input type="text" id="cname2" class="input_field" style="width:200px; margin-left:10px;"/>
			<a class="labels" style="margin-left:5px">Telephone:</a>
			<label for="tel2" class="bh-visually-hidden">Telephone:</label><input type="text" id="tel2" class="input_field"  style="width:100px; margin-left:10px;"/>
			<input type="hidden" id="bal2" class="input_field"  style="width:100px; margin-left:10px;"/>
						';
						
							
				echo"<img alt=\"Edit Detail\" src=\"images/back.jpg\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:0px 0 0 10px; float:left\" title=\"Edit Detail\" onclick=\"savecredsup()\"/>";
				echo'<div id="res3" style="float:left;width:40px; height:40px; margin-left:10px"></div>
				</div>
			
				<div id="tabs-4">
					<a class="labels" style="margin-left:5px">Creditor Name:</a>
					<div class="ui_widget"  style="margin-left:10px;float:left; width:300px">
					<label for="item30" class="bh-visually-hidden">Creditor Name:</label><select id="item30">
					<option value="">Select one...</option>';
					$resulta = mysqli_query($db, "select * from creditsuppliers order by CustomerName");
					$num_resultsa = mysqli_num_rows($resulta);
					for ($i = 0; $i < $num_resultsa; $i++) {
						$row = mysqli_fetch_assoc($resulta);
						$cid = stripslashes($row['CustomerId']);
						$name = stripslashes($row['CustomerName']);
						echo '<option value="' . $cid . '">' . stripslashes($row['CustomerName']) . '-' . $cid . '</option>';
					}
					echo'
					</select></div>
						<div class="cleaner_h5"></div>
							<a class="labels" style="margin-left:5px">From:</a>
						<label for="datepick" class="bh-visually-hidden">From:</label><input type="text" id="datepick" class="input_field"  style="float:left;width:190px; margin-left:50px;" value=""/>
							<div class="cleaner_h5"></div>
							<a class="labels" style="margin-left:5px">To:</a>
							<label for="datepick2" class="bh-visually-hidden">To:</label><input type="text" id="datepick2" class="input_field"  style="float:left;width:190px; margin-left:65px;" value=""/>
							<div class="cleaner_h5"></div>
							<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 0 0 10px;" name="viewall" value="1"/>
							<a class="labels" style="float:left;margin-left:5px">View All:</a>
							<div class="cleaner_h10"></div>';
							echo"<input type=\"button\" value=\"View\" id=\"submit\"  
								style=\"margin-left:60px; float:left; cursor:pointer;width:50px\"
								 class=\"in_field\" onclick=\"viewstatement2();\"/>";
								
								echo'<input type="button" value="Exit" id="exit" style="margin-left:10px;
								 float:left; cursor:pointer;width:50px" class="in_field" 
								 onclick="hidenewstude();"/>	
								 	
								 
					</div>		
				
					
			

			</div></div>';

				break;
				
				case 31:
				$cus = trim(mysqli_real_escape_string($db, $_GET['cus']));
				$_SESSION['supinvoice']=array(array());
				unset($_SESSION['supinvoice'][0]);
				$max=count($_SESSION['supinvoice']);
				echo'<div id="chati" style="width:950px; height:280px; overflow-y:auto">
				<div id="inside" style="min-height:260px;">
									<div id="title">
									<div id="figure1"  style="margin-left:0px; width:100px">Check</div>
									<div id="figure1"  style="margin-left:0px; width:125px">Date</div>
									<div id="figure1" style="width:150px">Invoice No</div>
									<div id="figure1" style="width:100px">Amount</div>
									<div id="figure1" style="width:100px">Paid</div>
									<div id="figure1" style="width:100px">Bal</div>
									<div id="figure1" style="width:130px">Paying</div>
									</div>
								';
								
				$result =mysqli_query($db, "select * from creditsuppliers where CustomerId='".$cus."'");
				$row = mysqli_fetch_assoc($result);
				$bal=stripslashes($row['Bal']);
				echo"<script>$('#bal').val(".$bal.");
				bal=(".$bal.").formatMoney(2, '.', ',');
				$('#debtord').html('-Balance:' + bal);</script>";
				
				$resulta =mysqli_query($db, "select * from supplierdebts where SupplierId='".$cus."' and DrCr='dr' and Status=1");
				$num_resultsa = mysqli_num_rows($resulta);	
				for ($i=0; $i <$num_resultsa; $i++) {
				$rowa = mysqli_fetch_assoc($resulta);
				$tno=stripslashes($rowa['TransNo']);
				echo'<div id="normal">';
				echo "<div id=\"figure2t\" style=\"width:100px;height:16px; overflow:hidden\"><label for=\"check" . $tno . "\" class=\"bh-visually-hidden\">Check . Tno .</label><input type=\"checkbox\" id=\"check" . $tno . "\" onclick=\"checkinv2('" . $tno . "','" . stripslashes($rowa['Amount']) . "','" . stripslashes($rowa['SupplierId']) . "','" . stripslashes($rowa['SupplierName']) . "','" . stripslashes($rowa['InvoiceNo']) . "','" . stripslashes($rowa['InvBal']) . "','" . stripslashes($rowa['Paid']) . "','" . stripslashes($rowa['invuid']) . "')\" name=\"check" . $tno . "\" value=\"1\" /></div>
				<div id=\"figure2t\" style=\"width:125px\">" . stripslashes($rowa['Date']) . "</div>
				<div id=\"figure2t\" style=\"width:150px\">" . stripslashes($rowa['InvoiceNo']) . "</div>
					<div id=\"figure2t\" style=\"width:100px\">" . stripslashes($rowa['Amount']) . "</div>
					<div id=\"figure2t\" style=\"width:100px\">" . stripslashes($rowa['Paid']) . "</div>
						<div class=\"figure2t\" id=\"invbal" . $tno . "\" style=\"width:100px\">" . stripslashes($rowa['InvBal']) . "</div>
				<div id=\"figure2t\" style=\"width:136px\"><label for=\"am" . $tno . "\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" onkeyup=\"checkinvbal(" . $tno . ")\" id=\"am" . $tno . "\" style=\"width:110px;text-align:center; margin-top:-2px\" /> </div>
				</div>
				<div class=\"cleaner\"></div>";
				}
							
							
				
				break;

	case 32:
		if (isset($_GET['tno']) &&  isset($_GET['amount']) && isset($_GET['cid']) && isset($_GET['invno']) && isset($_GET['paying']) && isset($_GET['paid'])) {
			$tno = trim(mysqli_real_escape_string($db, $_GET['tno']));
			$amount = floatval(preg_replace('~,~', '', $_GET['amount']));
			$max = count($_SESSION['supinvoice']);
			$_SESSION['supinvoice'][$tno] = array($tno, $amount, intval($_GET['cid']), trim(mysqli_real_escape_string($db, $_GET['cname'])), trim(mysqli_real_escape_string($db, $_GET['invno'])), floatval(preg_replace('~,~', '', $_GET['bal'])), floatval(preg_replace('~,~', '', $_GET['paying'])), floatval(preg_replace('~,~', '', $_GET['invbal'])), floatval(preg_replace('~,~', '', $_GET['paid'])), trim(mysqli_real_escape_string($db, $_GET['invref'])));
			exit;
		} else {
			unset($_SESSION['supinvoice']);
			echo "<script>window.location.href = \"index.php\";</script>";
			exit;
		}

		break;

	case 33:

		$tno = $_GET['tno'];
		unset($_SESSION['supinvoice'][$tno]);

		break;
				
					case 34:
					echo"<script>$('#dept9').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">User Access Rights';
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
	
	 <div class="ui-widget" style="margin-left:10px; float:left; width:270px">
	<label for="dept9" class="bh-visually-hidden">Text field</label><select class="select" id="dept9" style="width:260px;float:left; ">
	<option value="">Select one...</option>
								<option value="Admin">Admin</option>
								<option value="Doctor">Doctor</option>
								<option value="MOI">Medical Officer Incharge</option>
								<option value="Pharm">Pharmacist</option>
								<option value="ChiefCashier">Chief Cashier</option>
								<option value="Lab">LabTech</option>
								<option value="User">User</option>
								<option value="Rad">Radiology</option>
								<option value="Recep">Customer Care</option>
								<option value="ExtMedic">External Medic</option>
								<option value="Accounts">Accounts</option>
								<option value="Store">Procurement</option>
								<option value="Emp">Employee Manager</option>
								<option value="Triage">Triage</option>
								<option value="Nurse">Nurse</option>
								<option value="Eye">Eye Clinic</option>
								<option value="Dental">Dental</option>
								<option value="Mch">MCH</option>
								<option value="Hdu">HDU/Dialysis</option>
								<option value="Physiotherapy">Physiotherapy</option>
								<option value="Emergencies">Emergencies</option>
								<option value="Theatre">Theatre</option>
								<option value="Cssd">CSSD</option>
								<option value="Records">Records</option>
								<option value="Paediatrics">Paediatrics</option>
								<option value="Dialysis">Dialysis</option>
								<option value="Ambulance">Ambulance</option>
								<option value="Accountant">Accountant</option>
								<option value="CreditController">Credit Controller</option>
								<option value="Matron">Matron</option>
								<option value="Counselling">Counselling</option>

								<option value="Social">Social</option>
								<option value="Nutrition">Nutrition</option>
								<option value="Vct">Vct</option>
								<option value="Mortuary">Mortuary</option>
								<option value="BioMedic">BioMedic</option>
								
						</select>
						</div>
	<div class="cleaner_h5"></div>
			
				</div>';	
							break;	
							
							case 35:
							$dep9=$_GET['dep9'];
						$result = mysqli_query($db, "insert into log values('0','".$username." accesses User Access Rights Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<div id="newstude">
	<div id="results">						
	<div id="block1" style="height:471px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px; overflow-y:auto">
	<h5 style="text-align:center">User Access Rights-Position: '.$dep9.'</h5>';
		$result =mysqli_query($db, "select * from accesstbl order by Descrip");
									$num_results = mysqli_num_rows($result);
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$code=stripslashes($row['AccessCode']);
									if(stripslashes($row[$dep9])=='YES'){
	echo "<input aria-label=\"Access . Code.\" type=\"checkbox\" name=\"access".$code."\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkaccess('".$code."','".$dep9."')\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">".stripslashes($row['Descrip'])."</a>	<div class=\"cleaner_h5\"></div>";	
									}
									else{
		echo "<input aria-label=\"Access . Code.\" type=\"checkbox\"  name=\"access".$code."\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkaccess('".$code."','".$dep9."')\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">".stripslashes($row['Descrip'])."</a>	<div class=\"cleaner_h5\"></div>";										
										
									}
									
									}
				
				
							
										
									echo'</div>
									</div>	
									<div id="recentstude">
										</div>
									</div>';
						
							break;
							
							case 36:
					$stamp=date('Ymd');
					echo"<script>$('#cons21').parent().find('input:first').focus();</script>";
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
			<label for="cons21" class="bh-visually-hidden">No. of Patients:</label><select id="cons21">
				<option value="">Select one...</option>';
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.stripslashes($row['PrescId']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'</option>';
							}
							
		echo'</select>
		</div>
	<div class="cleaner_h5"></div>
		</div>';
					
					
				break;
				case 37:
							$result = mysqli_query($db, "insert into log values('0','".$username." accesses Discharge Summary Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							$pid=$_GET['pid'];
							$resulta =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
							$rowa=$rowq=mysqli_fetch_array($resulta);
							$pntno=stripslashes($rowa['PatId']);
							$result =mysqli_query($db, "select * from patients where pntno='".$pntno."'");
							$row=mysqli_fetch_array($result);
							
							$resultb =mysqli_query($db, "select * from admdetails where pid='".$pid."'");
							$rowb=mysqli_fetch_array($resultb);
							
							$resultc =mysqli_query($db, "select * from discharge where patid='".$pntno."' order by id desc limit 0,1");
							$rowc=mysqli_fetch_array($resultc);
								echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">DISCHARGE SUMMARY-'.stripslashes($rowa['PatName']).'-'.stripslashes($rowa['PatId']).'</h2>';
									
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('report.php?id=4&rcptno='".$pid."')\" title=\"Print Patient Report\">";
		echo'	<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
								echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savedischarge('".stripslashes($rowc['sumno'])."','".$pid."')\"/></div>";
				echo'	 <div id="res2" style="float:right;width:40px; height:40px; margin-left:10px"></div>';
								echo'
			<div id="tabs" style="width:1000px; height:425px; float:left; margin:0px 0 0 0px">
			<ul>
				<li><a href="#tabs-1">Admission Details</a></li>
				<li><a href="#tabs-2">Diagnosis</a></li>
				<li><a href="#tabs-3">Medication</a></li>
				<li><a href="#tabs-4">Clinical Summary</a></li>
			
				</ul>
			<div id="tabs-1">
			<a class="labels" style="float:left">Pat No:</a>
       <label for="patid" class="bh-visually-hidden">Patid</label><input type="text" id="patid" name="patid"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['pntno']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Pat Name:</a>
      <label for="patname" class="bh-visually-hidden">Patname</label><input type="text" id="patname" name="patname"   style="float:left;margin-left:10px;width:200px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['PatName']).'" disabled="disabled"/> 
	
		<a class="labels" style="float:left; margin-left:10px">Address:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:90px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['address']).'" disabled="disabled"/> 
	  <a class="labels" style="float:left; margin-left:10px">Age:</a>
						  <label for="tdate" class="bh-visually-hidden">Age:</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">
						 <label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="float:left;border-color:var(--color-danger, #DC2626);margin-left:10px"/> 
						 <input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
						 echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
								echo'
 
	<a class="labels" style="float:left; margin-left:10px">Sex:</a>
      <label for="sex" class="bh-visually-hidden">Oname</label><input type="text" id="sex" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['gender']).'" disabled="disabled"/> 	
		<div class="cleaner_h5"></div>
		
	<a class="labels" style="float:left; margin-left:0px">Contact:</a>
      <label for="contact" class="bh-visually-hidden">Oname</label><input type="text" id="contact" name="oname"   style="float:left;margin-left:10px;width:120px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['contact']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Doctor:</a>
      <label for="doctor" class="bh-visually-hidden">Oname</label><input type="text" id="doctor" name="oname"   style="float:left;margin-left:10px;width:200px;" disabled="disabled" class="in_field" value="'.stripslashes($rowa['Doctor']).'"/> 
	  <a class="labels" style="float:left; margin-left:10px">Ward:</a>
      <label for="ward" class="bh-visually-hidden">Oname</label><input type="text" id="ward" name="oname"   style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['WardType']).'" disabled="disabled"/> 
	  <a class="labels" style="float:left; margin-left:10px">Room No:</a>
      <label for="roomno" class="bh-visually-hidden">Oname</label><input type="text" id="roomno" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['RoomNo']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
      <label for="bednum" class="bh-visually-hidden">Oname</label><input type="text" id="bednum" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['BedNo']).'" disabled="disabled"/> 
	<div class="cleaner_h5"></div>
	<a class="labels" style="float:left;">Date of Admission:</a>
      <label for="datepick" class="bh-visually-hidden">Oname</label><input type="text" id="datepick" name="oname"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['AdmDate']).'" disabled="disabled"/> 
	  <a class="labels" style="float:left; margin-left:10px">Date of Discharge:</a>
      <label for="datepick2" class="bh-visually-hidden">Oname</label><input type="text" id="datepick2" name="oname"   style="float:left;margin-left:10px;width:100px;" class="in_field" value="'.date('Y/m/d').'" /> 
	  <a class="labels" style="float:left; margin-left:10px">Next appointment:</a>
      <label for="datepick3" class="bh-visually-hidden">Oname</label><input type="text" id="datepick3" name="oname"   style="float:left;margin-left:10px;width:150px;" class="in_field" value="'.stripslashes($rowc['nextapp']).'"/> 
	<div class="cleaner_h5"></div>
			</div>	
			<div id="tabs-2">

			<script>area31 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("disdiag");</script>
			<div style="width:520px;float:left">
		<label for="disdiag" class="bh-visually-hidden">Text field</label><textarea id="disdiag"  style="float:left;height:320px; width:500px" class="alergy">'.stripslashes($rowc['diagnosis']).'</textarea>
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
		$parts=explode(';',stripslashes($rowq['DiagName']));
		foreach ($parts as $key => $val) {
		$_SESSION['dis'][$key]=$val;
			if($val!=''){
			echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismissdis(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
			}
		}


					echo'</div>';

				echo'</div>
			</div>	
			<div id="tabs-3">';
			echo'<script>area32 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("dismed");</script>
	<label for="dismed" class="bh-visually-hidden">Text field</label><textarea id="dismed"  style="float:left;height:340px; width:960px" class="alergy">'.stripslashes($rowc['medical']).'</textarea>';
			echo'</div>	
			<div id="tabs-4">
			<script>area33 = new nicEditor({fullPanel : true,maxHeight : 350}).panelInstance("clinsumm");</script>
	<label for="clinsumm" class="bh-visually-hidden">Text field</label><textarea id="clinsumm"  style="float:left;height:340px; width:960px" class="alergy">'.stripslashes($rowc['clinical']).'</textarea>
			</div>	
		</div>
		
		</div>';	
							
							break;
							
							case 38:
			$pid=$_GET['pid'];
							
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Admissions Summary Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
	$result =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
							$num_results = mysqli_num_rows($result);
							$row=mysqli_fetch_array($result);
							echo'<div id="newstude">
						<h2  style="float:left; padding:5px 5px 0 0; margin:0">Discharge Patient</h2>';
			echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:0px 10px 0 0\"></div>";						
				echo'
								<div class="cleaner" style="border-bottom:2px solid #333"></div>
								<div id="personal">
								<a class="labels">Pay Mode:<span>*</span></a>
                                 <label for="mode" class="bh-visually-hidden">Oname</label><input type="text" id="mode" name="oname" class="in_field" value="'.stripslashes($row['PayMode']).'" /> 
								<div class="cleaner_h5"></div>
							 <a class="labels">Pnt Name<span>*</span></a>
                                <label for="pname" class="bh-visually-hidden">Oname</label><input type="text" id="pname" name="oname" style="border-color:var(--color-danger, #DC2626)"  class="in_field" value="'.stripslashes($row['PatName']).'" disabled="disabled"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Patient No.<span>*</span></a>
                                <label for="patno" class="bh-visually-hidden">Oname</label><input type="text" id="patno" name="oname" style="border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['PatId']).'" disabled="disabled"/> 
                                <input type="hidden" id="in_presc_id" name="in_presc_id" style="border-color:var(--color-danger, #DC2626);display:none;" value="'.stripslashes($row['Id']).'" disabled="disabled"/> 
                                <input type="hidden" id="in_patient_id" name="in_patient_id" style="border-color:var(--color-danger, #DC2626);display:none;" value="'.stripslashes($row['old_in_patient_id']).'" disabled="disabled"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Diagnosis<span>*</span></a>
                                <label for="diagnosis" class="bh-visually-hidden">Oname</label><input type="text" id="diagnosis" name="oname" class="in_field" value=""/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Diag. Code<span>*</span></a>
                                <label for="diagcode" class="bh-visually-hidden">Oname</label><input type="text" id="diagcode" name="oname" class="in_field" value=""/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Invoice No.</a>
                                <label for="invoice" class="bh-visually-hidden">Oname</label><input type="text" id="invoice" name="oname" class="in_field" value=""/> 
								<div class="cleaner_h5"></div>
								<a class="labels" title="">Doctor:<span>*</span></a>
                                <label for="doctor" class="bh-visually-hidden">&#39;.stripslashes(&#36;row[&#39;Doctor&#39;]).&#39;</label><input type="text" id="doctor" name="oname" style="border-color:var(--color-danger, #DC2626)" class="in_field" value="" title="'.stripslashes($row['Doctor']).'"/> 
								<div class="cleaner_h5"></div>
									<a class="labels">Adm Date.<span>*</span></a>
                                <label for="datepick" class="bh-visually-hidden">Oname</label><input type="text" id="datepick" name="oname" class="in_field" value="'.stripslashes($row['AdmDate']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Discharge:<span>*</span></a>
                                <label for="datepick2" class="bh-visually-hidden">Oname</label><input type="text" id="datepick2" name="oname" class="in_field" value=""/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Billing Completed?</a>
								<input aria-label="Billing" type="checkbox" style="float:left; margin:8px 5px 0 20px" name="billing" value="1">
								<div class="cleaner_h5"></div>
								<a class="labels">Discharge Summary?</a>
								<input aria-label="Discharge" type="checkbox" style="float:left; margin:8px 5px 0 10px" name="discharge" value="1">
								<div class="cleaner_h5"></div>
								
								</div>
							
								
								
								<div id="personal">
								<h5>Submit Details</h5>
								<a class="labels">Other Details:</a>
								<label for="odetail" class="bh-visually-hidden">Other Details:</label><textarea id="odetail" style="float:right;height:170px" class="alergy"></textarea>
								<div class="cleaner_h5"></div>';
							echo"<input type=\"button\" value=\"Save\" id=\"submit\" style=\"margin-left:40px; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"saveadmsumm('".$pid."');\"/>";
							echo'<input type="button" value="Exit" id="exit" style="margin-left:10px;float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>	
								 	
								 <div id="newstudent" style="float:right; margin-right:60px;height:20px; "></div>
								
								</div>
								<div id="personal">
								
								</div>
								
								<div id="personal">
								
								</div>
   							';
							break;	
							
							case 39:
					
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Admissions Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Admissions Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enteradm();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
								case 40:
										echo"<script>$('#itemname').parent().find('input:first').focus().width(250);</script>";
											echo"<script>$('.combos').parent().find('input:first').width(250);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Diagnosis Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Diagnosis Report (OPD)
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Department:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Department:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="All">All</option>
								<option value="GENERAL CONSULTATIONS">General Consultations</option>
								<option value="EYE CLINIC">Eye Clinic</option>
								<option value="MCH CLINIC">MCH CLINIC</option>
								<option value="DENTAL CLINIC">Dental Clinic</option>
						</select>
							</div>
						<div class="cleaner_h5"></div>';

						$result =mysqli_query($db, "select * from diseases  order by name");
							$num_results = mysqli_num_rows($result);
				echo'<a class="labels" style="margin-left:20px">Disease:</a>
				<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="diseas" class="bh-visually-hidden">Disease:</label><select class="combos" id="diseas" style="width:250px; margin-left:10px;">
						<option value="All">All</option>';
						
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
									cursor:pointer; width:80px" class="select" onclick="enterdiagrep();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;


							case 41:
										echo"<script>$('#itemname').parent().find('input:first').focus().width(250);</script>";
											echo"<script>$('.combos').parent().find('input:first').width(250);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Diagnosis Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Diagnosis Report (IPD)
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Department:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Department:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="All">All</option>
								<option value="MALE_WARD">MALE_WARD</option>
								<option value="FEMALE_WARD">FEMALE_WARD</option>
								<option value="CHEMOTHERAPY">CHEMOTHERAPY</option>
								<option value="ELDERS_WARD">ELDERS WARD</option>
								<option value="PRIVATE_WARD">PRIVATE WARD</option>
								
						</select>
							</div>
						<div class="cleaner_h5"></div>';

						$result =mysqli_query($db, "select * from diseases  order by name");
							$num_results = mysqli_num_rows($result);
				echo'<a class="labels" style="margin-left:20px">Disease:</a>
				<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="diseas" class="bh-visually-hidden">Disease:</label><select class="combos" id="diseas" style="width:250px; margin-left:10px;">
						<option value="All">All</option>';
						
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
									cursor:pointer; width:80px" class="select" onclick="enterdiagrep2();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

							
							
							
							case 42:
				echo"<script>$('#itemv').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Discharge Patient Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Patient Discharge
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>';
					$result =mysqli_query($db, "select * from inpatients where Admitted!=0 order by PatName");
							$num_results = mysqli_num_rows($result);
							echo'
			
				<div class="ui-widget" style="margin-left:10px; float:left">
						<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
				<label for="itemv" class="bh-visually-hidden">No. of Patients:</label><select class="select" id="itemv" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
						
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".stripslashes($row['PrescId'])."\">".stripslashes($row['PatName'])."-".stripslashes($row['PatId'])."-[".stripslashes($row['TransDate'])."]</option>";
							}
							echo'</select>
				</div>
				<div class="cleaner_h5"></div>
				
						
						</div>';
							break;
							
							case 43:
	$result = mysqli_query($db, "CALL GetUserLogs('".$username." accesses Prescription Administration Chart Panel-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
							$pid=$_GET['pid'];
							
							$resulta =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
							$rowa=mysqli_fetch_array($resulta);
							$old_in_presc_id=stripslashes($rowa['Id']);
							$old_in_patient_id=stripslashes($rowa['old_in_patient_id']);
							$pntno=stripslashes($rowa['PatId']);
							$in_admission_date=stripslashes($rowa['AdmDate']);
							$in_admission_notes=stripslashes($rowa['AdmNotes']);
							$result =mysqli_query($db, "select * from patients where auto='".$old_in_patient_id."'");
							$row=$rowp=mysqli_fetch_array($result);
							
							$resultb =mysqli_query($db, "select * from admdetails where pid='".$pid."'");
							$rowb=mysqli_fetch_array($resultb);
								
							echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">INPATIENT TREATMENT [NURSE MODULE]-'.stripslashes($rowa['PatName']).'-'.stripslashes($rowa['PatId']).'</h2>';
									
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('report.php?id=4.1&rcptno=".$pid."')\" title=\"Print Patient Report\">";
				
								echo'
			<div id="tabs" style="width:1000px; height:435px; float:left; margin:0px 0 0 0px">
			<ul>
				<li><a href="#tabs-1">Admission Details</a></li>
				<li><a href="#tabs-2">Drug Record Sheet</a></li>
				<li><a href="#tabs-3">Nurses Notes (Cadex)</a></li>
				<li><a href="#tabs-4">Vitals Entries</a></li>
				<li><a href="#tabs-6">Patient File</a></li>
				<li><a href="#tabs-5">Patient Interim Bill</a></li>
				<li><a href="#tabs-7">Maternity Chart</a></li>
				<li><a href="#tb_bld_transfussion_chart">Blood Transfussion Chart</a></li>
				</ul>
			<div id="tabs-1">
				 <a class="labels" style="float:left">Pat No:</a>
       <label for="patid" class="bh-visually-hidden">Patid</label><input type="text" id="patid" name="patid"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['pntno']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Pat Name:</a>
      <label for="patname" class="bh-visually-hidden">Patname</label><input type="text" id="patname" name="patname"   style="float:left;margin-left:10px;width:250px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['PatName']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Ward:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['WardType']).'" disabled="disabled"/> 
		<a class="labels" style="float:left; margin-left:10px">Address:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['address']).'" disabled="disabled"/> 
		<div class="cleaner_h5"></div>
		<a class="labels" style="float:left">Age:</a>
		<label for="tdate" class="bh-visually-hidden">Age:</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">
						 <label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="float:left;margin-left:10px;border-color:var(--color-danger, #DC2626)"/> 
						 <input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
						 echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
      
	echo'<input type="hidden" disabled="disabled" id="old_patient_id" value="'.$old_in_patient_id.'" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="old_presc_id" value="'.$old_in_presc_id.'" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="prescno" value="'.$pid.'" style="display:none;"/>';
	echo'<a class="labels" style="float:left; margin-left:10px">Sex:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['gender']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Contact:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['contact']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Doctor:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['Doctor']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
      <label for="bednu" class="bh-visually-hidden">Oname</label><input type="text" id="bednu" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['BedNo']).'" disabled="disabled"/> 
	<div class="cleaner_h5"></div>
	<a class="labels" style="float:left">Transferred To:</a>
		<label for="tw1" class="bh-visually-hidden">Oname</label><input type="text" id="tw1" name="oname"   style="float:left;margin-left:10px;width:150px;" class="in_field" value="'.stripslashes($rowb['tw1']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
      <label for="tb1" class="bh-visually-hidden">Oname</label><input type="text" id="tb1" name="oname"   style="float:left;margin-left:10px;width:80px" class="in_field" value="'.stripslashes($rowb['tb1']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Date:</a>
      <label for="td1" class="bh-visually-hidden">Oname</label><input type="text" id="td1" name="oname"   style="float:left;margin-left:10px;width:110px;" class="in_field" value="'.stripslashes($rowb['td1']).'"/> 
		<div class="cleaner_h5"></div>
		<a class="labels" style="float:left; ">Transferred To:</a>
		<label for="tw2" class="bh-visually-hidden">Oname</label><input type="text" id="tw2" name="oname"   style="float:left;margin-left:10px;width:150px;" class="in_field" value="'.stripslashes($rowb['tw2']).'"/> 
		<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
      <label for="tb2" class="bh-visually-hidden">Oname</label><input type="text" id="tb2" name="oname"   style="float:left;margin-left:10px;width:80px" class="in_field" value="'.stripslashes($rowb['tb2']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Date:</a>
      <label for="td2" class="bh-visually-hidden">Oname</label><input type="text" id="td2" name="oname"   style="float:left;margin-left:10px;width:110px;" class="in_field" value="'.stripslashes($rowb['td2']).'"/> 
	<div class="cleaner_h5"></div>
	
	<a class="labels" style="float:left; ">Physician:</a>
		<label for="phy" class="bh-visually-hidden">Oname</label><input type="text" id="phy" name="oname"   style="float:left;margin-left:10px;width:130px;" class="in_field" value="'.stripslashes($rowb['physician']).'"/> 
		<a class="labels" style="float:left; margin-left:10px">Surgeon:</a>
      <label for="sur" class="bh-visually-hidden">Oname</label><input type="text" id="sur" name="oname"   style="float:left;margin-left:10px;width:130px" class="in_field" value="'.stripslashes($rowb['surgeon']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Anaesthetist:</a>
      <label for="anae" class="bh-visually-hidden">Oname</label><input type="text" id="anae" name="oname"   style="float:left;margin-left:10px;width:130px;" class="in_field" value="'.stripslashes($rowb['anaesthetist']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Paeditrician:</a>
      <label for="paed" class="bh-visually-hidden">Oname</label><input type="text" id="paed" name="oname"   style="float:left;margin-left:10px;width:130px;" class="in_field" value="'.stripslashes($rowb['paeditrician']).'"/> 
	<div class="cleaner_h5"></div>
	
	
	<a class="labels" style="float:left;">Previous:</a>
      <label for="previous" class="bh-visually-hidden">Oname</label><input type="text" id="previous" name="oname"   style="float:left;margin-left:10px;width:280px" class="in_field" value="'.stripslashes($rowb['previous']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Current:</a>
      <label for="current" class="bh-visually-hidden">Oname</label><input type="text" id="current" name="oname"   style="float:left;margin-left:10px;width:280px" class="in_field" value="'.stripslashes($rowb['current']).'"/> 
	<div class="cleaner_h5"></div>
	<a class="labels" style="float:left">Height:</a>
		<label for="height" class="bh-visually-hidden">Oname</label><input type="text" id="height" name="oname"   style="float:left;margin-left:10px;width:50px;" class="in_field" value="'.stripslashes($rowb['height']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Weight:</a>
      <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname"   style="float:left;margin-left:10px;width:50px" class="in_field" value="'.stripslashes($rowb['weight']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">BMI:</a>
      <label for="bmi" class="bh-visually-hidden">Oname</label><input type="text" id="bmi" name="oname"   style="float:left;margin-left:10px;width:70px; border-color:var(--color-danger, #DC2626)" disabled class="in_field" value="'.stripslashes($rowb['bmi']).'"/> 
		<a class="labels" style="float:left; margin-left:10px">STEROID THERAPY:</a>';
		 if(stripslashes($rowb['steroid'])=='yes'){
									 echo'<label for="maleGender" class="bh-visually-hidden">Steroid</label><input style="float:left; margin-top:8px""  id="maleGender" name="steroid" type="radio" value="yes" class="radio" checked="checked"><a class="labels" style="float:left;">YES.</a>
								<label for="femaleGender" class="bh-visually-hidden">Steroid</label><input  style="float:left; margin-top:8px"  id="femaleGender" name="steroid" type="radio" value="no" class="radio"><a class="labels" style="float:left;">NO.</a>'; 
								 }
							 else{
                                echo'<label for="maleGender" class="bh-visually-hidden">Steroid</label><input  style="float:left; margin-top:8px"  id="maleGender" name="steroid" type="radio" value="yes" class="radio"><a class="labels" style="float:left;">YES.</a>
								<label for="femaleGender" class="bh-visually-hidden">Steroid</label><input  style="float:left; margin-top:8px"  id="femaleGender" name="steroid" type="radio" value="no" class="radio"  checked="checked"><a class="labels" style="float:left;">NO.</a>';}							
		echo'<a class="labels" style="float:left;margin-left:10px;">Date:</a>
		<label for="steroidate" class="bh-visually-hidden">Oname</label><input type="text" id="steroidate" name="oname"   style="float:left;margin-left:10px;width:90px;" class="in_field" value="'.stripslashes($rowb['steroidate']).'"/> 
	<div id="save1" style="float:right; width:30px; height:30px;"><img alt="Back" src="images/back.jpg" style="float:right; width:30px; height:30px; cursor:pointer" onclick="savein1(\''.$pid.'\')"/></div>					
	<div class="cleaner"></div>
					</div> 


					<div id="tabs-3" style="overflow-y:auto;height:375px;">';
	echo"<div id=\"savez\" style=\"float:right; width:30px; height:30px;\"><img alt=\"Save Nurse Notes\" src=\"images/back.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:-3px 0px 0 0px; float:right\" title=\"Save Nurse Notes\"onclick=\"savenursenotes('".$pid."')\"/></div>";
	echo'<script>area20 = new nicEditor({fullPanel : true,maxHeight : 360}).panelInstance("nursenotes");</script>
	<label for="nursenotes" class="bh-visually-hidden">Text field</label><textarea id="nursenotes"  style="float:left;height:350px; width:930px" class="alergy"></textarea>

				</div>';
							
$obstetrics =mysqli_query($db, "SELECT * FROM obstetrics WHERE old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' ");
$obs=mysqli_fetch_array($obstetrics);
$num_obstetrics = mysqli_num_rows($obstetrics);
#$old_in_presc_id=stripslashes($obs['Id']);
#$old_in_patient_id=stripslashes($obs['old_in_patient_id']);

echo'<div id="tabs-7" style="overflow-y:auto;height:375px;">';	
	 echo' <div id="page">';	
		echo'<div id="newstude">';
			 #echo '<h2 style="float:left; padding:5px 5px 0 0; margin:0;">New Patient Information [EMERGENCY]</h2>';
			echo '<div id="personal">';
			    echo ' <h5>OBSTETRIC HISTORY</h5>';
				echo'<div class="cleaner_h5"></div>';
				echo ' <a class="labels" style="display:">Patient No:<span>*</span></a>
	                    <label for="regn" class="bh-visually-hidden">Field</label><input type="text" id="regn" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:;"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Gravida:<span>*</span></a>
	                    <input type="text" id="gravida" name="field" class="in_field" style="text-transform:uppercase" placeholder="gravida" value="'.stripslashes($obs['gravida']).'"/>
						<div class="cleaner_h5"></div>
						 <a class="labels">Para:<span>*</span></a>
	                    <input type="text" id="para" name="field" class="in_field" style="text-transform:uppercase" placeholder="para" value="'.stripslashes($obs['para']).'"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">Alive:<span>*</span></a>
	                    <input type="text" id="alive" name="field" class="in_field" style="text-transform:uppercase" placeholder="alive" value="'.stripslashes($obs['alive']).'"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Dead:<span>*</span></a>
	                    <input type="text" id="dead" name="field" class="in_field" style="text-transform:uppercase" placeholder="dead" value="'.stripslashes($obs['dead']).'"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Abortion:<span>*</span></a>
	                    <input type="text" id="abortion" name="field" class="in_field" style="text-transform:uppercase" placeholder="abortion" value="'.stripslashes($obs['abortion']).'"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Gestation:<span>*</span></a>
	                    <input type="text" id="gestation" name="field" class="in_field" style="text-transform:uppercase" placeholder="gestation" value="'.stripslashes($obs['gestation']).'"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Still-Birth:<span>*</span></a>
	                    <input type="text" id="stillbirth" name="field" class="in_field" style="text-transform:uppercase" placeholder="still birth" value="'.stripslashes($obs['stillbirth']).'"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Caesarean:<span>*</span></a>
	                    <input type="text" id="caesarean" name="field" class="in_field" style="text-transform:uppercase" placeholder="caesarean" value="'.stripslashes($obs['caesarean']).'"/> 
	                    <div class="cleaner_h5"></div>
	                    <a class="labels">Vacuum:<span>*</span></a>
	                    <input type="text" id="vacuum" name="field" class="in_field" style="text-transform:uppercase" placeholder="vacuum" value="'.stripslashes($obs['vacuum']).'"/> 
						<div class="cleaner_h5"></div>';


			 echo'</div>';
			echo '<div id="personal" style="width:150px;">';
				#echo'<div class="cleaner_h5"></div>';
				  echo '<h5></h5>';
				echo'<div class="cleaner_h20"></div>';
				   echo' <a class="labels">LMP:<span>*</span></a>
	                    <input type="text" id="lmp" name="field" class="in_field" value="'.stripslashes($obs['lmp']).'" style="text-transform:uppercase;width:77px;margin-left:5px;float:left" placeholder="LMP"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">EDD:<span>*</span></a>
	                    <input type="text" id="edd" name="field" class="in_field" value="'.stripslashes($obs['edd']).'" style="text-transform:uppercase;width:77px;margin-left:5px;float:left" placeholder="EDD"/> 
	                    <div class="cleaner_h5"></div>
	                    <a class="labels">APH:<span>*</span></a>
	                    <input type="text" id="aph" name="field" class="in_field" value="'.stripslashes($obs['aph']).'" style="text-transform:uppercase;width:77px;margin-left:5px;float:left" placeholder="APH"/> 
						<div class="cleaner_h5"></div>
	                    <a class="labels">PPH:<span>*</span></a>
	                    <input type="text" id="pph" name="field" class="in_field" value="'.stripslashes($obs['pph']).'" style="text-transform:uppercase;width:77px;margin-left:5px;float:left" placeholder="PPH"/> 
						<div class="cleaner_h5"></div>
				         <a class="labels">Prol:<span>*</span></a>
	                    <input type="text" id="prollabour" name="field" class="in_field" value="'.stripslashes($obs['prollabour']).'" style="text-transform:uppercase;width:77px;margin-left:5px;float:left" placeholder="prol labour"/> 
						<div class="cleaner_h5"></div>';


			 echo'</div>';
			echo '<div id="personal">';
				  echo '<h5>OBSTETRIC EXAMINATION</h5>';
			#echo'<div class="cleaner_h5"></div>';
			echo'<a class="labels" style="margin-left:0px;font-size:12px;font-weight:bold; text-align:center;text-decoration:underline">ABDOMINAL</a>';
			echo'<div class="cleaner_h5"></div>';

						echo'<a class="labels">FundalHeight:</a>
	                    <input type="text" id="fundalheight" name="field" class="in_field" value="'.stripslashes($obs['fundalheight']).'" style="text-transform:uppercase" placeholder="fundal height"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Engagement:<span>*</span></a>
	                    <input type="text" id="engagement" name="field" class="in_field" value="'.stripslashes($obs['engagement']).'" style="text-transform:uppercase" placeholder="engagement"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Fatal Heart:<span>*</span></a>
	                    <input type="text" id="fatalheart" name="field" class="in_field" value="'.stripslashes($obs['fatalheart']).'" style="text-transform:uppercase" placeholder="fatal heart"/> 
	                    <div class="cleaner_h5"></div>';

			#echo'<div class="cleaner_h5"></div>';
			echo'<a class="labels" style="margin-left:0px;font-size:12px;font-weight:bold; text-align:center;text-decoration:underline">VAGINAL</a>';
			echo'<div class="cleaner_h5"></div>';

						echo'<a class="labels">Reason:<span>*</span></a>
	                    <input type="text" id="reasonfordoing" name="field" class="in_field" value="'.stripslashes($obs['reasonfordoing']).'" style="text-transform:uppercase" placeholder="reason for doing"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Cervical:<span>*</span></a>
	                    <input type="text" id="cervicalcondition" name="field" class="in_field" value="'.stripslashes($obs['cervicalcondition']).'" style="text-transform:uppercase" placeholder="cervical condition"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Dilatation:<span>*</span></a>
	                    <input type="text" id="dilatation" name="field" class="in_field" value="'.stripslashes($obs['dilatation']).'" style="text-transform:uppercase" placeholder="dilatation"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Membranes:<span>*</span></a>
	                    <input type="text" id="membranes" name="field" class="in_field" value="'.stripslashes($obs['membranes']).'" style="text-transform:uppercase" placeholder="membranes"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Draining:<span>*</span></a>
	                    <input type="text" id="draining" name="field" class="in_field" value="'.stripslashes($obs['draining']).'" style="text-transform:uppercase" placeholder="draining"/> 
	                    <div class="cleaner_h5"></div>';
						// echo'<a class="labels">Remarks:</a>
	                    // <input type="text" id="alive" name="field" class="in_field" style="text-transform:uppercase" placeholder="other remarks"/> 
	                    // <div class="cleaner_h5"></div>';

			 echo'</div>';
			echo '<div id="personal">';
			echo'<div class="cleaner_h5"></div>';
			echo'<div class="cleaner_h20"></div>';
			#echo'<div class="cleaner_h5"></div>';
			echo'<a class="labels" style="margin-left:0px;font-size:12px;font-weight:bold; text-align:center;text-decoration:underline">WKS</a>';
			echo'<div class="cleaner_h5"></div>';

						echo'<a class="labels">Presentation:<span>*</span></a>
	                    <input type="text" id="presentation" name="field" class="in_field" value="'.stripslashes($obs['presentation']).'" style="text-transform:uppercase" placeholder="presentation"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Position:<span>*</span></a>
	                    <input type="text" id="wkposition" name="field" class="in_field" value="'.stripslashes($obs['wkposition']).'" style="text-transform:uppercase" placeholder="position"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Contraction<span>*</span></a>
	                    <input type="text" id="contractions" name="field" class="in_field" value="'.stripslashes($obs['contractions']).'" style="text-transform:uppercase" placeholder="contractions"/> 
	                    <div class="cleaner_h5"></div>';

			#echo'<div class="cleaner_h5"></div>';
			echo'<a class="labels" style="margin-left:0px;font-size:12px;font-weight:bold; text-align:center;text-decoration:underline">/MIN</a>';
			echo'<div class="cleaner_h5"></div>';

						echo'<a class="labels">Presenting:<span>*</span></a>
	                    <input type="text" id="presenting" name="field" class="in_field" value="'.stripslashes($obs['presenting']).'" style="text-transform:uppercase" placeholder="presenting part"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Level:<span>*</span></a>
	                    <input type="text" id="minlevel" name="field" class="in_field" value="'.stripslashes($obs['minlevel']).'" style="text-transform:uppercase" placeholder="level"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Position:</a>
	                    <input type="text" id="minposition" name="field" class="in_field" value="'.stripslashes($obs['minposition']).'" style="text-transform:uppercase" placeholder="position"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Pelvis:</a>
	                    <input type="text" id="pelvis" name="field" class="in_field" value="'.stripslashes($obs['pelvis']).'" style="text-transform:uppercase" placeholder="pelvis"/> 
	                    <div class="cleaner_h5"></div>';
						// echo'<a class="labels">Remarks:</a>
	                    // <input type="text" id="other_remarks" name="field" class="in_field" value="'.stripslashes($obs['other_remarks']).'" style="text-transform:uppercase" placeholder="other remarks"/>';
						echo'<a class="labels">Remarks:</a>
						<label for="other_remarks" class="bh-visually-hidden">Remarks:</label><textarea id="other_remarks" style="float:right;height:20px;width:140px;border-color:#10504F;" class="alergy" >'.stripslashes($obs['other_remarks']).'</textarea>
	                    <div class="cleaner_h5"></div>';

		if($num_obstetrics>=1){
			echo'<input type="hidden" id="obstetrics_id" name="field" class="in_field" value="'.stripslashes($obs['id']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/> ';
			echo"<img alt=\"Submit\" src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:20px 0 0 50px; float:left\" title=\"Submit\" onclick=\"editobstetric(2)\"/>"; 
		}else{ 
			echo"<img alt=\"Submit\" src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:20px 0 0 50px; float:left\" title=\"Submit\" onclick=\"addnewobstetric(1)\"/>";
		}
	                    //echo'<div class="cleaner_h5"></div>';
				echo'<div id="nwpatientreg" style="float:left;width:40px; height:40px; margin-left:10px"></div>';
				echo'<div class="cleaner_h20"></div>';

			 echo'</div>';

	    echo'</div>';			
	echo'</div>';			
echo'</div>';			


echo'<div id="tb_bld_transfussion_chart" style="overflow-x:hidden;height:375px;">';	
	 echo' <div id="page">';	
	//  echo'<div id="newstude">
	// <div id="results">';
		echo'<div id="block1" style="height:225px; width:1050px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;overflow-y:hidden;">';
			echo '<div id="personal" style="height:220px;">';
			    echo ' <h5>BLOOD TRANSFUSSION CHART</h5>';
				echo'<div class="cleaner_h5"></div>';
				echo ' <a class="labels" style="display:;">Patient No:<span>*</span></a>
	                    <label for="in_customer_no" class="bh-visually-hidden">In Customer No</label><input type="text" id="in_customer_no" name="in_customer_no" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:;"/> 
						<div class="cleaner_h5"></div>
						<a class="labels">Batch No:<span>*</span></a>
	                    <input type="text" id="in_batch_no" name="field" class="in_field" style="text-transform:uppercase" placeholder="Batch No" maxlength="10"/>
						<div class="cleaner_h5"></div>
						<a class="labels">Blood Group:<span>*</span></a>
                                <label for="bgroup" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup" name="bgroup" style="float:right; padding:2px 5px">';
                           #if ($old_blood_grp!='') { echo'<option selected="selected" value="'.$old_blood_grp.'">'.$old_blood_grp.'</option>'; } else { echo'<option value="">None</option>'; }
                           
						   echo'<option value="">None</option>
								<option value="A Rh+">A Rh+</option>
								<option value="A Rh-">A Rh-</option>
								<option value="B Rh+">B Rh+</option>
								<option value="B Rh-">B Rh-</option>
								<option value="AB Rh+">AB Rh+</option>
								<option value="AB Rh-">AB Rh-</option>
								<option value="O Rh+">O Rh+</option>
								<option value="O Rh-">O Rh-</option>
								</select>
	                    <div class="cleaner_h5"></div>
						<a class="labels">Type Of BG:<span>*</span></a>
	                    <input type="text" id="bgrouptype" name="field" class="in_field" style="text-transform:uppercase" placeholder="Type Of Blood Group" maxlength="30"/> 
	                    <div class="cleaner_h5"></div>
	                    <a class="labels">Start Time:<span>*</span></a>
	                    <input type="text" id="startime" name="field" class="in_field" style="text-transform:uppercase;border-color:var(--color-danger, #DC2626);" disabled="disabled" placeholder="Time Started" value="'.date('H:i').'"/> 
	                    <div class="cleaner_h5"></div>

						';


			 echo'</div>';
			echo '<div id="personal" style="height:220px;">';
				  echo '<h5>VITALS BEFORE TRANSFUSSION</h5>';
				  echo '<a class="labels">Temp:<span>*</span></a>
	                    <label for="btemp" class="bh-visually-hidden">Oname</label><input type="text" id="btemp" name="oname"  class="in_field" maxlength="3"  style="width:30px; float:left; margin-left:50px"/> 
						<div style="float:left; margin-top:2px"><a class="labels" style="font-size:5px; margin-top:0px;font-weight:bold; margin-left:5px">0</a></div><div style="float:left; margin=left:3px"><a style="font-size:11px;font-weight:bold;"  class="labels">C</a></div>
							<div class="cleaner_h5"></div>
						<a class="labels">B.P:<span>*</span></a>
	                    <div style="width:40px; float:left;margin-left:65px; padding:1px " class="in_field">
						<div style="float:left; border-bottom:1px solid #333; width:35px"><label for="bp1" class="bh-visually-hidden">Oname</label><input type="text" id="bp1" name="oname"  maxlength="3"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px; margin-top:0px;margin-bottom:2px;text-align:center"/> </div>
						<div class="cleaner"></div>
						<div style="float:left"><label for="bp2" class="bh-visually-hidden">Oname</label><input type="text" id="bp2" name="oname"  maxlength="3"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px;  margin-top:2px;text-align:center"/>  </div>
						</div>
						
						<a class="labels" style="font-weight:bold; margin-left:5px; margin-top:20px">mmHg</a>
						<div class="cleaner_h5"></div>
						<a class="labels">PR:<span>*</span></a>
	                    <input type="text" id="pr" name="field" class="in_field" style="text-transform:uppercase" placeholder="PR" maxlength="20"/> 
	                    <div class="cleaner_h5"></div>
						<a class="labels">Diagnosis:<span>*</span></a>
	                    <textarea id="other_diagnosis_remarks" style="float:right;height:20px;width:140px;border-color:#10504F;" class="alergy" placeholder="DIAGNOSIS" maxlength="200"></textarea>
	                    <div class="cleaner_h5"></div>';


			 echo'</div>';
			echo '<div id="personal" style="height:220px;">';
				   echo '<h5>REASON FOR TRANSFUSSION</h5>';
				   echo'<div class="cleaner_h5"></div>
						<a class="labels">Reason:<span>*</span></a>
	                    <textarea id="transfussion_reason" style="float:right;height:40px;width:140px;border-color:#10504F;"  maxlength="200" class="alergy" placeholder="REASON FOR TRANSFUSSION" ></textarea>
	                    <div class="cleaner_h5"></div>';

						echo'<a class="labels">Checked By:<span>*</span></a>
	                    <input type="text" id="counter_checker" name="field" class="in_field" style="text-transform:uppercase" placeholder="Counter Checked By" maxlength="50" value="'.$fullname.'"/> 
	                    <div class="cleaner_h5"></div>
	                    <a class="labels">Volume:<span>*</span></a>
	                    <input type="text" id="volume" name="field" class="in_field" style="text-transform:uppercase;" placeholder="Volume"  maxlength="20"/> 
						<div class="cleaner_h5"></div>';
				echo'<div class="cleaner_h10"></div>';

			#echo'<div class="cleaner_h5"></div>';

		#if($num_bt_row>=1){
			#echo'<input type="hidden" id="obstetrics_id" name="field" class="in_field" value="'.stripslashes($btRow['Id']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626);display:none;"/> ';
			#echo"<img alt=\"Submit\" src=\"images/back.jpg\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:20px 0 0 50px; float:left\" title=\"Submit\" onclick=\"editobstetric(2)\"/>"; 
		#}else{ 
			#echo"<img alt=\"Submit\" src=\"images/subm.jpg\" width=\"100\" height=\"50\" style=\"cursor:pointer; margin:20px 0 0 50px; float:left\" title=\"Submit\" onclick=\"addnewobstetric(1)\"/>";
				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:right\" title=\"Add Item\" onclick=\"addBldTransfusse(1)\"/>";
		#}
	                    //echo'<div class="cleaner_h5"></div>';
				echo'<div id="btransfussion" style="float:left;width:40px; height:40px; margin-left:10px"></div>';
				echo'<div class="cleaner_h20"></div>';

			 	  echo'<div id="res2" style="float:left;width:40px; height:20px; margin-left:10px"></div>';
 				 echo'</div>';	

				echo '<div id="personal" style="height:150px;">';
				echo'<a class="labels">Remarks:</a><div class="cleaner_h5"></div>';
					echo'<textarea id="per_prescription_patient_remarks" style="float:left;height:30px;width:140px;border-color:#10504F;" class="alergy" placeholder="REMARKS" maxlength="200"></textarea>
	                    <div class="cleaner_h5"></div>';
	                echo'<a class="labels">Remarks After:</a><div class="cleaner_h5"></div>';
					echo'<textarea id="remarks_on_patient_condition_after_transfussion" style="float:left;height:40px;width:140px;border-color:#10504F;" class="alergy" placeholder="REMARKS ON PATIENTS CONDITION AFTER TRANSFUSSION:" maxlength="200"></textarea>
	                    <div class="cleaner_h5"></div>';
 				 echo'</div>';	


 			echo'</div>';	
			 echo'<div style="height:220px; width:960px; background:#; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">';
			 echo '<h2 style="color:#000;">BLOOD TRANSFUSSION CHART</h2>';
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin-top:-36px; cursor:pointer\" onclick=\"window.open('r/dss.php?id=4.1&pid=".safe_encode($old_in_presc_id)."&pno=".safe_encode($pid)."&cid=".safe_encode($old_in_patient_id)."&cno=".safe_encode($pntno)."')\" title=\"Print Patient Report\">";

$btQry =mysqli_query($db, "SELECT * FROM `tblbtransfussion` WHERE `PrescId`='".$old_in_presc_id."' AND `ClientId`='".$old_in_patient_id."'AND `ClientNo`='".$pntno."'");
$num_bt_row = mysqli_num_rows($btQry);
			echo'<div class="cleaner_h5"></div>';
				echo'<div id="chati" style="height:200px; width:960px;overflow-y:hidden">
						<div id="inside">
							<div id="title">
								<div id="figure1" style="width:100px">DATE</div>
								<div id="figure1" style="width:80px">TIME</div>
								<div id="figure1" style="width:80px">BP</div>
								<div id="figure1" style="width:80px">PR</div>
								<div id="figure1" style="width:40px">TEMP</div>
								<div id="figure1" style="width:50px">SPO2</div>
								<div id="figure1" style="width:350px">REMARKS</div>
								<div id="figure1" style="width:57px">SIGN</div>
							</div>';

						if($num_bt_row==0){									
							echo'<div class="cleaner_h5"></div>
							no records yet.';
						}

						$c=0;
							for ($i=0; $i <$num_bt_row; $i++) {
							$btRow=mysqli_fetch_array($btQry);
							$code=stripslashes($btRow['Id']);
							$stats=stripslashes($btRow['Status']);

									if($stats==1){echo"<div class=\"normal\" id=\"normal".$code."\" style=\"background:#ccc\" >";}
									else {echo"<div class=\"normal\" id=\"normal".$code."\" style=\"width:;\">";}

								  echo'<div class="figure2x" style="width:100px;">'.stripslashes($btRow['TransDate']).'</div>
										<div class="figure2x" style="width:80px;">'.stripslashes($btRow['TimeStarted']).'</div>
										<div class="figure2x" style="width:80px;">'.stripslashes($btRow['Bp1']).' / '.stripslashes($btRow['Bp2']).'</div>										
										<div class="figure2x" style="width:80px;">'.stripslashes($btRow['Pr']).'</div>
										<div class="figure2x" style="width:40px;">'.stripslashes($btRow['Temp']).'</div>
										<div class="figure2x" style="width:50px;"></div>
										<div class="figure2x" style="width:350px;">'.stripslashes($btRow['Remarks']).'</div>';		
								   echo'<div class="figure2x" style="width:65px;"></div>';

								
							   echo'</div>';
							}
							
					echo'</div></div>';

					echo'<div class="cleaner_h10"></div>';




			 echo'</div>';
		
// echo'</div>';		
// echo'</div>';		


	echo'</div>';			
echo'</div>';			



		echo'<div id="tabs-2" style="height:350px;overflow-y:auto ">';
	echo"<img alt=\"Add new Drug\" src=\"images/document_add.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:-3px 20px 0 0px; float:left\" title=\"Add new Drug\"onclick=\"addnewrowz('".$pid."','".stripslashes($rowa['PatName'])."','".$pntno."')\"/>	
	<div class=\"cleaner_h5\"></div>";
						
	$result = mysqli_query($db, "SELECT * FROM  drugrecord where pid='".$pid."' and status=0");
									$num_results = mysqli_num_rows($result);
									echo'
									
									<div id="inside">
									<div id="title">
									<div id="figure1" style="width:250px">Drugs</div>
									<div id="figure1" style="width:100px">Dose</div>
									<div id="figure1" style="width:100px">Route</div>
									<div id="figure1" style="width:292px">Notes</div>
									<div id="figure1" style="width:65px;">Save </div>
									</div>';
									
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										echo"
										<div id=\"normal".$code."\" class=\"normal\" style=\"border-top:2px solid #000\">";
									echo'
										<div class="figure2x" style="width:255px;padding:3px 2px"><label for="drugs'.$code.'" class="bh-visually-hidden">Save</label><input type="text" class="put_field" value="'.stripslashes($row['drugs']).'" id="drugs'.$code.'" style="background:#fff;width:250px; font-size:10px"/></div>
										<div class="figure2x" style="width:105px;padding:3px 2px"><label for="dose'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['dose']).'" id="dose'.$code.'" style="background:#fff;width:100px; font-size:10px"/></div>
										<div class="figure2x" style="width:105px;padding:3px 2px"><label for="route'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['route']).'" id="route'.$code.'" style="background:#fff;width:100px; font-size:10px"/></div>
										<div class="figure2x" style="width:295px;padding:3px 2px"><label for="notes'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['notes']).'" id="notes'.$code.'" style="background:#fff;width:220px; font-size:10px"/></div>
										<div class="figure2x" style="width:65px;padding:3px 2px;display:none"><label for="cost'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['cost']).'" id="cost'.$code.'" style="background:#fff;width:60px; font-size:10px"/></div>';
										echo"<div class=\"figure2\" title=\"Save Record\" style=\"width:32px;padding:5px 5px;\" id=\"savethat".$code."\" onclick=\"savethat(".$code.")\"><img alt=\"Save\" src=\"images/save.jpg\" style=\"width:20px;height:16px\"/></div>";
										echo"<div class=\"figure2\"  title=\"Add New Day\" style=\"width:32px;padding:5px 5px;\" id=\"addthat".$code."\" onclick=\"openewday(".$code.")\"><img alt=\"Plus\" src=\"images/plus.png\" style=\"width:20px;height:20px\"/></div>";
									echo'</div>
									<div class="cleaner"></div>';	
									
									
									$resulta = mysqli_query($db, "SELECT * FROM  drugrecord where tid='".$code."' and status=1");
									$num_resultsa = mysqli_num_rows($resulta);
								
									for ($x=0; $x <$num_resultsa; $x++) {
										$rowa=mysqli_fetch_array($resulta);
										$cod=stripslashes($rowa['id']);
										echo"
										<div id=\"normal".$cod."\" class=\"normal\">";
										
									echo'<div class="figure2x" style="width:255px;padding:6px 2px"><label for="date'.$cod.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($rowa['date']).'" id="date'.$cod.'" style="background:#fff;width:150px; font-size:10px" disabled="disabled"/></div>
									<div class="figure2x" style="width:35px;padding:7.5px 2px"><b>AM</b></div>
									
									
									<div style="float:left">
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left;border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">1</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">2</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">3</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000; border-bottom:0;  color:#000; text-align:center">4</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">5</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">6</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left;border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">7</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">8</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">9</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000; border-bottom:0;  color:#000; text-align:center">10</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">11</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">12</div>
									
									<div class="cleaner"></div>
									<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="1am&#39;. Cod.&#39;" style="float:left" type="checkbox"  value="1" onclick=tickdrug("1am",'.$cod.')  name="1am'.$cod.'"';  if(stripslashes($rowa['1am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="2am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("2am",'.$cod.')  name="2am'.$cod.'"'; if(stripslashes($rowa['2am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="3am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("3am",'.$cod.')  name="3am'.$cod.'"'; if(stripslashes($rowa['3am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="4am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("4am",'.$cod.')  name="4am'.$cod.'"'; if(stripslashes($rowa['4am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="5am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("5am",'.$cod.')  name="5am'.$cod.'"'; if(stripslashes($rowa['5am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="6am&#39;. Cod.&#39;" type="checkbox" value="1" onclick=tickdrug("6am",'.$cod.')  name="6am'.$cod.'"';  if(stripslashes($rowa['6am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="7am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("7am",'.$cod.')  name="7am'.$cod.'"';  if(stripslashes($rowa['7am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="8am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("8am",'.$cod.')  name="8am'.$cod.'"'; if(stripslashes($rowa['8am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="9am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("9am",'.$cod.')  name="9am'.$cod.'"'; if(stripslashes($rowa['9am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="10am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("10am",'.$cod.')  name="10am'.$cod.'"'; if(stripslashes($rowa['10am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="11am&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("11am",'.$cod.')  name="11am'.$cod.'"'; if(stripslashes($rowa['11am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="12am&#39;. Cod.&#39;" type="checkbox" value="1" onclick=tickdrug("12am",'.$cod.')  name="12am'.$cod.'"';  if(stripslashes($rowa['12am'])==1){echo'checked="checked"';} echo' /></div>	
	
	</div>
		<div class="figure2x" style="width:33px;padding:7.5px 2px"><b>PM</b></div>
		
			<div style="float:left">
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left;border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">1</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">2</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">3</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000; border-bottom:0;  color:#000; text-align:center">4</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">5</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">6</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left;border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">7</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">8</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">9</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000; border-bottom:0;  color:#000; text-align:center">10</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">11</div>
									<div style="width:16px; height:12px;padding:0 2.5px; margin:0;float:left; border-right:1px solid #000;border-bottom:0;   color:#000; text-align:center">12</div>
									
									<div class="cleaner"></div>
									<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="1pm&#39;. Cod.&#39;" style="float:left" type="checkbox"  value="1" onclick=tickdrug("1pm",'.$cod.')  name="1pm'.$cod.'"';  if(stripslashes($rowa['1pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="2pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("2pm",'.$cod.')  name="2pm'.$cod.'"'; if(stripslashes($rowa['2pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="3pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("3pm",'.$cod.')  name="3pm'.$cod.'"'; if(stripslashes($rowa['3pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="4pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("4pm",'.$cod.')  name="4pm'.$cod.'"'; if(stripslashes($rowa['4pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="5pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("5pm",'.$cod.')  name="5pm'.$cod.'"'; if(stripslashes($rowa['5pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="6pm&#39;. Cod.&#39;" type="checkbox" value="1" onclick=tickdrug("6pm",'.$cod.')  name="6pm'.$cod.'"';  if(stripslashes($rowa['6pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="7pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("7pm",'.$cod.')  name="7pm'.$cod.'"';  if(stripslashes($rowa['7pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="8pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("8pm",'.$cod.')  name="8pm'.$cod.'"'; if(stripslashes($rowa['8pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="9pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("9pm",'.$cod.')  name="9pm'.$cod.'"'; if(stripslashes($rowa['9pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="10pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("10pm",'.$cod.')  name="10pm'.$cod.'"'; if(stripslashes($rowa['10pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="11pm&#39;. Cod.&#39;" type="checkbox"  value="1" onclick=tickdrug("11pm",'.$cod.')  name="11pm'.$cod.'"'; if(stripslashes($rowa['11pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:15px;padding:2px 3px;"><input aria-label="12pm&#39;. Cod.&#39;" type="checkbox" value="1" onclick=tickdrug("12pm",'.$cod.')  name="12pm'.$cod.'"';  if(stripslashes($rowa['12pm'])==1){echo'checked="checked"';} echo' /></div>	
	
	</div>
	
	
	</div><div class="cleaner"></div>';	
									}
									
									echo'<div class="cleaner"></div>';
									}
									
						echo'</div>	
					</div>';
								


	#echo'<div id="tabs-7" style="overflow-y:auto;height:375px;">';

	#echo'</div>';			



 echo'<div id="tabs-6" style="overflow-y:auto;height:375px;">

<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">ADMISSION DETAILS ['.$in_admission_date.']</a>
	<div class="cleaner_h5"></div>
	<a class="labels">'.$in_admission_notes.'</a>
	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">PROGRESS NOTES</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from progress where pid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> '.stripslashes($row['notes']).'</a><div class="cleaner_h5"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">CADEX</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from cadex where pid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> '.stripslashes($row['notes']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">PHARMACY PRESCRIPTIONS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> '.stripslashes($row['prescription']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>PRESCRIBED BY:</b> '.stripslashes($row['requested']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">LABORATORY REQUESTS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from labrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='IPD'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> 
								<b>REQUEST:</b><BR/>'.stripslashes($row['request']).'</a><div class="cleaner_h5"></div>
								<b>RESULTS:</b><BR/>'.stripslashes($row['results']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>REQUESTED BY:</b> '.stripslashes($row['requested']).'</a><br/><div class="cleaner"></div>
								<a class="labels"><b>DONE BY:</b> '.stripslashes($row['doneby']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">RADIOLOGY REQUESTS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from radrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='IPD'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> 
								<b>REQUEST:</b><BR/>'.stripslashes($row['request']).'</a><div class="cleaner_h5"></div>
								<b>RESULTS:</b><BR/>'.stripslashes($row['results']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>REQUESTED BY:</b> '.stripslashes($row['requested']).'</a><br/><div class="cleaner"></div>
								<a class="labels"><b>DONE BY:</b> '.stripslashes($row['doneby']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">THEATRE REQUESTS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from theatrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='IPD'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> 
								<b>REQUEST:</b><BR/>'.stripslashes($row['procedures']).'</a><div class="cleaner_h5"></div>
								<b>RESULTS:</b><BR/>'.stripslashes($row['notes']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>REQUESTED BY:</b> '.stripslashes($row['requested']).'</a><br/><div class="cleaner"></div>
								<a class="labels"><b>DONE BY:</b> '.stripslashes($row['doneby']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

		<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">PRESCRIPTION ADMINISTRATION CHART</a>
	<div class="cleaner_h5"></div>';

	$result = mysqli_query($db, "SELECT * FROM  drugrecord where pid='".$pid."' and status=1 order by stamp asc");
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									
									echo'
									<div class="cleaner_h5"></div>
									<div id="inside" style=" border-bottom:0; margin-left:0px">
									<div id="title"">
											<div id="figure1" style="width:80px">Date.</div>
											<div id="figure1" style="width:120px">Drugs</div>
											<div id="figure1" style="width:50px">Dose</div>
											<div id="figure1" style="width:50px">Route</div>
											<div id="figure1" style="width:100px">Notes</div>
											<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
											<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">AM</strong></div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">1</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">12</div>
											</div>
									
											<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
											<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">PM</strong></div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;border-left:0 ;color:#fff; text-align:center">1</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:1px solid #000;color:#fff; text-align:center">12</div>	
											</div>			
											
											
											</div>

											</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:0px solid #333;" id="normal'.$i.'" class="normal">';
	}else{
		echo'<div style="width:auto; height:20px;background:#fff;border-bottom:0px solid #333;"  id="normal'.$i.'" class="normal">';
	}
									
									echo'<div class="figure2x" style="width:85px;padding:2px 2px;font-size:10px">'.stripslashes($row['date']).'</div>
										<div class="figure2x" style="width:125px;padding:2px 2px;font-size:10px">'.stripslashes($row['drugs']).'</div>
										<div class="figure2x" style="width:55px;padding:2px 2px;font-size:10px">'.stripslashes($row['dose']).'</div>
										<div class="figure2x" style="width:55px;padding:2px 2px;font-size:10px">'.stripslashes($row['route']).'</div>
										<div class="figure2x" style="width:115px;padding:2px 2px;font-size:10px">'.stripslashes($row['notes']).'</div>';
									
										
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
				
				
								echo"</div><div class=\"cleaner\"></div>";
										
										}
									}

	
echo'		<div class="cleaner_h10"></div>
<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">VITALS ENTRIES</a>
	<div class="cleaner_h5"></div>';
		$result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."'");
									$num_results = mysqli_num_rows($result);
									echo'
									
									<div id="inside" style="min-height:110px;">
									<div id="title">
									<div id="figure1" style="width:120px">Date-Time</div>
									<div id="figure1" style="width:80px">Temp</div>
									<div id="figure1" style="width:80px">Bp</div>
									<div id="figure1" style="width:80px">Weight</div>
									<div id="figure1" style="width:80px">Pulse</div>
									<div id="figure1" style="width:80px">Breath</div>
									<div id="figure1" style="width:80px">RBS</div>
									</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										echo"
										<div id=\"normal13".$code."\" class=\"normal\">";
										echo'<div class="figure2x" style="width:125px;padding:3px 2px"><input aria-label="RBS" disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['datetime']).'" style="background:#fff;width:120px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><input aria-label="Text field" disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['temp']).'"  style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><input aria-label="Text field"  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['bp1']).'/'.stripslashes($row['bp2']).'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><input aria-label="Text field" disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['weight']).'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><input aria-label="Text field"  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['pulse']).'"  style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><input aria-label="Text field"  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['breath']).'"  style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:98px;padding:3px 2px;"><input aria-label="Text field" disabled="disabled"  disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['random']).'"  style="background:#fff;width:90px; font-size:10px"/></div>';
										echo"</div><div class=\"cleaner\"></div>";
										}	
										
									
										
						echo'</div>
<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">VITALS CHARTS</a>
	<div class="cleaner_h5"></div>';
					$result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."' order by id desc limit 0,7");
					$num_results = mysqli_num_rows($result);
					if($num_results>0){

					for ($i=0; $i <$num_results; $i++) {
					$row2=mysqli_fetch_array($result);
					$arr1[]='"'.stripslashes($row2['datetime']).'"';
					$arr2[]=stripslashes($row2['temp']);
					$arr3[]=stripslashes($row2['bp1']);
					$arr4[]=stripslashes($row2['bp2']);
					$arr5[]=stripslashes($row2['pulse']);
					$arr6[]=stripslashes($row2['breath']);
					$arr7[]=stripslashes($row2['weight']);
					$arr8[]=stripslashes($row2['random']);
					}
				$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);$arr4=array_reverse($arr4);$arr5=array_reverse($arr5);$arr6=array_reverse($arr6);$arr7=array_reverse($arr7);$arr8=array_reverse($arr8);
				$a=HA_implode($arr1,",");$b=HA_implode($arr2,",");$c=HA_implode($arr3,",");$d=HA_implode($arr4,",");$e=HA_implode($arr5,",");$f=HA_implode($arr6,",");$g=HA_implode($arr7,",");$h=HA_implode($arr8,",");
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Temparature Curve</p>";
	echo'<canvas id="line1" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#0369A1",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$b.']
				}
			]
			
		}

	new Chart(document.getElementById("line1").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Blood Pressure Chart</p>";
	echo'<canvas id="bar" height="200" width="950"></canvas>
	
<script>

		var barChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#46bfbd",
					strokeColor : "#ccc",
					data : ['.$c.']
				},
				
				{
					fillColor : "#DC2626",
					strokeColor : "#ccc",
					data : ['.$d.']
				}
			]
			
		}

	new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
	
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Pulse Rate Curve</p>";
	echo'
	<canvas id="line2" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#fdb45c",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$e.']
				}
			]
			
		}

	new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Respiratory Rate Curve</p>";
	echo'
	<canvas id="line3" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#666",
					strokeColor : "#333",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$f.']
				}
			]
			
		}

	new Chart(document.getElementById("line3").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Weight Curve</p>";
	echo'
	<canvas id="line4" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#10504F",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$g.']
				}
			]
			
		}

	new Chart(document.getElementById("line4").getContext("2d")).Line(lineChartData);
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Random Blood Sugars Curve</p>";
	echo'
	<canvas id="line5" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#ff3",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$h.']
				}
			]
			
		}

	new Chart(document.getElementById("line5").getContext("2d")).Line(lineChartData);
	</script>';
}
	
	echo'<div class="cleaner_h5"></div>


	</div>

					
					
				
			<div id="tabs-4" style="height:350px;overflow-y:auto ">';
			echo"<img alt=\"Add new row\" src=\"images/document_add.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:-3px 20px 0 0px; float:right\" title=\"Add new row\"onclick=\"addnewrowa(13)\"/>";
	
	$result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."'");
									$num_results = mysqli_num_rows($result);
									echo'
									
									<div id="inside" style="min-height:110px;width:100%;">
									<div id="title">
									<div id="figure1" style="width:120px">Date-Time</div>
									<div id="figure1" style="width:80px">Temp</div>
									<div id="figure1" style="width:80px">Bp1</div>
									<div id="figure1" style="width:80px">Bp2</div>
									<div id="figure1" style="width:80px">Weight</div>
									<div id="figure1" style="width:80px">Pulse</div>
									<div id="figure1" style="width:80px">Breath</div>
									<div id="figure1" style="width:80px">RBS</div>
									<div id="figure1" style="width:38px;">Save </div>
									</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										echo"
										<div id=\"normal13".$code."\" class=\"normal\">";
										echo'<div class="figure2x" style="width:125px;padding:3px 2px"><label for="date'.$code.'" class="bh-visually-hidden">Save</label><input type="text" class="put_field" value="'.stripslashes($row['datetime']).'" id="date'.$code.'" style="background:#fff;width:120px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="temp'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['temp']).'" id="temp'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="bp1'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['bp1']).'" id="bp1'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="bp2'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['bp2']).'" id="bp2'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="weight'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['weight']).'" id="weight'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="pulse'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['pulse']).'" id="pulse'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="breath'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['breath']).'" id="breath'.$code.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:95px;padding:3px 2px;"><label for="random'.$code.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.stripslashes($row['random']).'" id="random'.$code.'" style="background:#fff;width:90px; font-size:10px"/></div>';
										echo"<div class=\"figure2\" style=\"width:44px;padding:5px 5px;\" id=\"savevitals".$code."\" onclick=\"savevitals(".$code.",1,'".$pid."')\"><img alt=\"Save\" src=\"images/save.jpg\" style=\"width:20px;height:16px\"/></div>";						
										echo"</div><div class=\"cleaner\"></div>";
										}	
										
											for ($i=100; $i <200; $i++) {
									echo"
									<div id=\"normal13".$i."\" class=\"normal\" style=\"display:none\">";
									echo'<div class="figure2x" style="width:125px;padding:3px 2px"><label for="date'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.date('d/m/Y-H:i').'"  id="date'.$i.'" style="background:#fff;width:120px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="temp'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" id="temp'.$i.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="bp1'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" id="bp1'.$i.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="bp2'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" id="bp2'.$i.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="weight'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field"  id="weight'.$i.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><label for="pulse'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field"id="pulse'.$i.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><label for="breath'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field"  id="breath'.$i.'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:95px;padding:3px 2px;"><label for="random'.$i.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field"  id="random'.$i.'" style="background:#fff;width:90px; font-size:10px"/></div>';
										echo"<div class=\"figure2\" style=\"width:44px;padding:5px 5px;\" id=\"savevitals".$i."\" onclick=\"savevitals(".$i.",2,'".$pid."')\"><img alt=\"Save\" src=\"images/save.jpg\" style=\"width:20px;height:16px\"/></div>";	
								
									echo"</div><div class=\"cleaner\"></div>";
										}
										
						echo'</div></div>
<div id="tabs-5" style="height:400px;padding:0px;overflow-y:auto;">';

					 	$arr=array();
						$result =mysqli_query($db, "select * from accesstbl");
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$var=stripslashes($row[$usertype]);
							$code=stripslashes($row['AccessCode']);
							$arr[$code]=$var;
						}

	  echo'<div id="results">';
		echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333;">';

					 	$arr=array();
						$result =mysqli_query($db, "select * from accesstbl");
						$num_results = mysqli_num_rows($result);
						for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							$var=stripslashes($row[$usertype]);
							$code=stripslashes($row['AccessCode']);
							$arr[$code]=$var;
						}

$result =mysqli_query($db, "select * from tempbill where patid='".$pntno."' and old_in_presc_id='".$old_in_presc_id."' and old_in_patient_id='".$old_in_patient_id."'");
$num_rows = mysqli_num_rows($result);
			echo'<div class="cleaner_h5"></div>';
				echo'<div id="chati" style="overflow-y:scroll">
						<div id="inside">
							<div id="title">
								<div id="figure1" style="width:140px">Date-Time</div>
								<div id="figure1" style="width:130px">Department</div>
								<div id="figure1" style="width:250px">Item Name</div>
								<div id="figure1" style="width:80px">Unit Price</div>
								<div id="figure1" style="width:40px">Qty</div>
								<div id="figure1" style="width:80px">Total Price</div>
								<div id="figure1" style="width:127px" title="Prescribed By">Username</div>
								<div id="figure1" style="width:50px">#</div>
								<div id="figure1" style="margin-left:0px;width:50px">InvNo</div>
							</div>';

						if($num_rows==0){									
							echo'<div class="cleaner_h5"></div>
							no records yet.';
						}

						$c=0;
							for ($i=0; $i <$num_rows; $i++) {
							$row=mysqli_fetch_array($result);
							$code=stripslashes($row['id']);
							$itcode=stripslashes($row['itcode']);
							$itname=stripslashes($row['itname']);
							$patname=stripslashes($row['patname']);
							$status=stripslashes($row['status']);
							$itot=preg_replace('~,~', '', stripslashes($row['quat'])) *  preg_replace('~,~', '', stripslashes($row['price']));
							$c+=$itot;

									if($status==1){echo"<div class=\"normal\" id=\"normal".$code."\" style=\"width:1055px;background:#ccc\" >";}
									else {echo"<div class=\"normal\" id=\"normal".$code."\" style=\"width:1055px;\">";}

								  echo'<div class="figure2x" style="width:140px;">'.stripslashes($row['date']).'</div>
										<div class="figure2x" style="width:130px;">'.stripslashes($row['category']).'</div>
										<div class="figure2x" style="width:250px;">'.stripslashes($row['itname']).'</div>
										<input type="hidden" class="hidden" value="'.stripslashes($row['itname']).'" id="productname'.$code.'" style="display:none;"/>
										<input type="hidden" class="hidden" value="'.stripslashes($row['old_in_patient_id']).'" id="patientid'.$code.'" style="display:none;"/>
										<input type="hidden" class="hidden" value="'.stripslashes($row['old_in_presc_id']).'" id="oldprescid'.$code.'" style="display:none;"/>
										<input type="hidden" class="hidden" value="'.$pid.'" id="oldprescno'.$code.'" style="display:none;"/>
										<input type="hidden" class="hidden" value="'.$pntno.'" id="oldpatid'.$code.'" style="display:none;"/>
										
										<div class="figure2x" style="width:80px;">'.stripslashes($row['price']).'</div>
										<div class="figure2x" style="width:40px;">'.stripslashes($row['quat']).'</div>
										<div class="figure2x" style="width:80px;">'.stripslashes($row['subnet']).'</div>
										<div class="figure2x" style="width:130px;">'.stripslashes($row['fullname']).'</div>';					

	if($arr[260]=='YES'){
		if ($status==1) {
	 	echo"<div class=\"figure2t\" style=\"height:16px;width:50px; border-right:1px solid #333\" id=\"deltempitem".$code."\" title=\"Delete Item\" onclick=\"deleteTempBillItem(".$code.",".$itcode.")\"><img alt=\"Empty\" src=\"images/empty.png\" style=\"width:20px;height:22px\"/></div>";	
	 	}
	 	else{
	 		echo"<div id=\"deltempitem".$code."\" class=\"figure2t\" style=\"height:16px;width:50px; border-right:1px solid #333\" title=\"Sorry. Not Allowed. The Item has already been dispensed from pharmacy. Sister Incharge can still delete it, physically return the drugs and adjust stock.\"><img alt=\"\" src=\"images/close.png\" width=\"20\" height=\"22\"/></div>";
	 	}
	}
	else{
		echo"<div id=\"deltempitem".$code."\" class=\"figure2t\" style=\"height:16px;width:50px; border-right:1px solid #333\" title=\"Sorry. Not Allowed\"><img alt=\"\" src=\"images/close.png\" width=\"20\" height=\"22\"/></div>";
	}

								  echo'<div class="figure2x" style="width:50px;overflow:hidden;height:16px;">'.stripslashes($row['billno']).'</div>';

								
							   echo'</div>';
							}
							
					echo'</div></div>';

					echo'<div class="cleaner_h10"></div>';
					echo'<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">Total:<b>'.number_format($c, 2).'</b></p>';
					echo'<div class="cleaner_h10"></div>';

					echo'<div id="displaymes"></div>';


					echo'<div class="cleaner_h10"></div>';


	    echo'</div>';
	  echo'</div>';

	echo'</div>';
							break;
							
							case 44:
							 
echo'<div class="ui-widget" style="margin:0 10px 0 0px;  float:left; width:120px">
	<label for="pnt4" class="bh-visually-hidden">Total:</label><select id="pnt4">
		<option value="">Select one...</option>';
	$resulta =mysqli_query($db, "select * from inpatients where Admitted=1 order by PatName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['PatId']).'">'.stripslashes($rowa['PatName']).'-'.stripslashes($rowa['PatId']).'</option>';
							}
	echo'</select>
	</div>';                

							
							break;
							
							case 45:
					$a=$_GET['a'];
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Invoices Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Invoices/Receipts Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:10px">From:</a>
				<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:left;width:80px; margin-left:10px" id="datepick" type="text">
				<a class="labels" style="margin-left:10px">Time:</a>
				<label for="timer1" class="bh-visually-hidden">Time:</label><select class="select" id="timer1" style="float:left; margin-left:10px;width:80px">
					<option value="12:00am">12:00am</option>
						<option value="12:30am">12:30am</option>
						<option value="01:00am">1:00am</option>
						<option value="01:30am">1:30am</option>
						<option value="02:00am">2:00am</option>
						<option value="02:30am">2:30am</option>
						<option value="03:00am">3:00am</option>
						<option value="03:30am">3:30am</option>
						<option value="04:00am">4:00am</option>
						<option value="04:30am">4:30am</option>
						<option value="05:00am">5:00am</option>
						<option value="05:30am">5:30am</option>
						<option value="06:00am">6:00am</option>
						<option value="06:30am">6:30am</option>
						<option value="07:00am">7:00am</option>
						<option value="07:30am">7:30am</option>
						<option value="08:00am">8:00am</option>
						<option value="08:30am">8:30am</option>
						<option value="09:00am">9:00am</option>
						<option value="09:30am">9:30am</option>
						<option value="10:00am">10:00am</option>
						<option value="10:30am">10:30am</option>
						<option value="11:00am">11:00am</option>
						<option value="11:30am">11:30am</option>
						<option value="12:00pm">12:00pm</option>
						<option value="12:30pm">12:30pm</option>
						<option value="01:00pm">1:00pm</option>
						<option value="01:30pm">1:30pm</option>
						<option value="02:00pm">2:00pm</option>
						<option value="02:30pm">2:30pm</option>
						<option value="03:00pm">3:00pm</option>
						<option value="03:30pm">3:30pm</option>
						<option value="04:00pm">4:00pm</option>
						<option value="04:30pm">4:30pm</option>
						<option value="05:00pm">5:00pm</option>
						<option value="05:30pm">5:30pm</option>
						<option value="06:00pm">6:00pm</option>
						<option value="06:30pm">6:30pm</option>
						<option value="07:00pm">7:00pm</option>
						<option value="07:30pm">7:30pm</option>
						<option value="08:00pm">8:00pm</option>
						<option value="08:30pm">8:30pm</option>
						<option value="09:00pm">9:00pm</option>
						<option value="09:30pm">9:30pm</option>
						<option value="10:00pm">10:00pm</option>
						<option value="10:30pm">10:30pm</option>
						<option value="11:00pm">11:00pm</option>
						<option value="11:30pm">11:30pm</option>
						
						
					</select>
				
				<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:10px">To:</a>
				<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:left;width:80px; margin-left:25px" id="datepick2" type="text">
				<a class="labels" style="margin-left:10px">Time:</a>
				<label for="timer2" class="bh-visually-hidden">Time:</label><select class="select" id="timer2" style="float:left; margin-left:10px;width:80px">
					<option value="12:00am">12:00am</option>
						<option value="12:30am">12:30am</option>
						<option value="01:00am">1:00am</option>
						<option value="01:30am">1:30am</option>
						<option value="02:00am">2:00am</option>
						<option value="02:30am">2:30am</option>
						<option value="03:00am">3:00am</option>
						<option value="03:30am">3:30am</option>
						<option value="04:00am">4:00am</option>
						<option value="04:30am">4:30am</option>
						<option value="05:00am">5:00am</option>
						<option value="05:30am">5:30am</option>
						<option value="06:00am">6:00am</option>
						<option value="06:30am">6:30am</option>
						<option value="07:00am">7:00am</option>
						<option value="07:30am">7:30am</option>
						<option value="08:00am">8:00am</option>
						<option value="08:30am">8:30am</option>
						<option value="09:00am">9:00am</option>
						<option value="09:30am">9:30am</option>
						<option value="10:00am">10:00am</option>
						<option value="10:30am">10:30am</option>
						<option value="11:00am">11:00am</option>
						<option value="11:30am">11:30am</option>
						<option value="12:00pm">12:00pm</option>
						<option value="12:30pm">12:30pm</option>
						<option value="01:00pm">1:00pm</option>
						<option value="01:30pm">1:30pm</option>
						<option value="02:00pm">2:00pm</option>
						<option value="02:30pm">2:30pm</option>
						<option value="03:00pm">3:00pm</option>
						<option value="03:30pm">3:30pm</option>
						<option value="04:00pm">4:00pm</option>
						<option value="04:30pm">4:30pm</option>
						<option value="05:00pm">5:00pm</option>
						<option value="05:30pm">5:30pm</option>
						<option value="06:00pm">6:00pm</option>
						<option value="06:30pm">6:30pm</option>
						<option value="07:00pm">7:00pm</option>
						<option value="07:30pm">7:30pm</option>
						<option value="08:00pm">8:00pm</option>
						<option value="08:30pm">8:30pm</option>
						<option value="09:00pm">9:00pm</option>
						<option value="09:30pm">9:30pm</option>
						<option value="10:00pm">10:00pm</option>
						<option value="10:30pm">10:30pm</option>
						<option value="11:00pm">11:00pm</option>
						<option value="11:30pm">11:30pm</option>
						
						
					</select>
				
				<div class="cleaner_h5"></div>
					<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
					<a class="labels" style="margin-left:10px; float:left">View All</a>
					
					<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterinvoices('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
					break;
					
					case 46:
					$a=$_GET['a'];
						echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Income Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Invoices Report-By company
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<a class="labels" style="margin-left:20px">Company Name:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					
					<label for="itemname" class="bh-visually-hidden">Company Name:</label><select class="select" id="itemname" style="width:280px; margin-left:10px;">
					<option value="">Select one...</option>';
							$result =mysqli_query($db, "select CustomerId,CustomerName from creditcustomers where CustomerName!='' order by CustomerName");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option value="'.stripslashes($row['CustomerId']).'">'.stripslashes($row['CustomerName']).'</option>';
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
									cursor:pointer; width:80px" class="select" onclick="enterinvoicesp('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
							case 47:
					echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Bin Card Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Summ. Bin Card (Procurement)
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<a class="labels" style="margin-left:20px">Item:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
				
					<label for="itemname" class="bh-visually-hidden">Item:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".stripslashes($row['ItemCode'])."\">".stripslashes($row['ItemName'])."</option>";
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
									cursor:pointer; width:80px" class="select" onclick="enterbincard();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
							case 48:
					echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Departmental Bin Card Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:300px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Bin Card
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<a class="labels" style="margin-left:20px">Department:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="itemname" class="bh-visually-hidden">Department:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							if($usertype=='Admin'||$usertype=='Accountant'||$usertype=='Store'){
							echo'
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['Branchname']).'">'.stripslashes($row['Branchname']).'</option>';
							}
								}else{echo'<option value="'.$userdep.'">'.$userdep.'</option>';}
							echo'</select></div>
						<a class="labels" style="margin-left:20px">Item:</a>
						<div class="ui-widget" style="margin-left:10px; float:left">
				
					<label for="itemname101" class="bh-visually-hidden">Item:</label><select class="select" id="itemname101" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".stripslashes($row['ItemCode'])."\">".stripslashes($row['ItemName'])."</option>";
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
									cursor:pointer; width:80px" class="select" onclick="enterdepbincard();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							case 49:
							$param=$_GET['param'];
echo"<script>$('#item22').parent().find('input:first').focus().width(400);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Invoice Search Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							echo'
							<div id="newstude">
								<div id="findstude"><h5 style="margin-left:10px">Invoice Search Panel</h5>';
echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-25px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help1()\"/></div>";
						$arr=array();
						$resulta =mysqli_query($db, "select * from receipts where paymode='Companies'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								$arr[stripslashes($rowa['invno'])]=stripslashes($rowa['patname']).'-'.stripslashes($rowa['patid']);
							}								
									
							echo'<div class="ui-widget" style="margin:0 10px 0 10px; float:left">
	<label for="item22" class="bh-visually-hidden">Text field</label><select id="item22">
		<option value="">Select one...</option>';
		
			foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$val.'-'.$key.'</option>';
							}
			
	echo'</select>
	</div>';			
	echo'<div id="results" style="min-height:350px; min-width:700px">';
										
										if(isset($_GET['param'])){
										$param=$_GET['param'];}
										else $param='default';
										echo'
										<div id="loading" ></div>
                    					<div id="display" style="height:310px;"></div>
                						<div class="cleaner_h5"></div>';
                    					if($param=='default'){
                    					echo "<script>paginate(13,'".$param."');</script>";
										recent(13,14);
										}
										
											else {
											echo "<script>paginate(14,'".$param."');</script>";
										recent(13,14);
											}	
							break;
								case 50:
				
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Messages Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Messages Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="entermessages();"/>
					<div class="cleaner"></div>
						
						</div>';
					break;
					
						case 51:
				
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Queue Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Queue Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterqueue();"/>
					<div class="cleaner"></div>
						
						</div>';
					break;
					case '52':
					$a=$_GET['a'];
					echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Income Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Departmental Income Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<a class="labels" style="margin-left:20px">Department:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
				
					<label for="itemname" class="bh-visually-hidden">Department:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">';
							
			//echo"<option value=\"".$userdep."\">".$userdep."</option>";

							if($usertype=='Admin'){
							echo'
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['Branchname']).'">'.stripslashes($row['Branchname']).'</option>';
							}
								}else{echo'<option value="'.$userdep.'">'.$userdep.'</option>';}

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
									cursor:pointer; width:80px" class="select" onclick="entersalesp('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
							case 53:
					echo"<script>$('#dept13').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">Items Access Rights';
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
	
	 <div class="ui-widget" style="margin-left:10px; float:left; width:270px">
<label for="dept13" class="bh-visually-hidden">Text field</label><select id="dept13"  style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$bname=stripslashes($row['Branchname']);
								
								echo'<option value="'.$bname.'">'.stripslashes($row['Branchname']).'</option>';
							}
		echo'
			</select>
		</div>
	<div class="cleaner_h5"></div>
			
				</div>';	
							break;	
							case 54:
							$dep=$_GET['dep'];
						$result = mysqli_query($db, "insert into log values('0','".$username." accesses Items Access Rights Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<div id="newstude">
	<div id="results">						
	<div id="block1" style="height:471px; width:766px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px; overflow-y:auto">
	<h5 style="text-align:center">Items Access Rights-Department:'.$dep.'</h5>';
		$result =mysqli_query($db, "select * from sections where branch='".$dep."'");
									$row=mysqli_fetch_array($result);
									$code=stripslashes($row['id']);
				
			if(stripslashes($row['amb'])==1){
echo "<input aria-label=\"Access1\" type=\"checkbox\" name=\"access1\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','amb',1)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">AMBULANCE</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access1\" type=\"checkbox\"  name=\"access1\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','amb',1)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">AMBULANCE</a>	<div class=\"cleaner_h5\"></div>";	}
			
		if(stripslashes($row['counselling'])==1){
echo "<input aria-label=\"Access2\" type=\"checkbox\" name=\"access2\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','counselling',2)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">COUNSELLING</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access2\" type=\"checkbox\"  name=\"access2\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','counselling',2)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">COUNSELLING</a>	<div class=\"cleaner_h5\"></div>";	}
									
		if(stripslashes($row['cssd'])==1){
echo "<input aria-label=\"Access3\" type=\"checkbox\" name=\"access3\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','cssd',3)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">CSSD</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access3\" type=\"checkbox\"  name=\"access3\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','cssd',3)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">CSSD</a>	<div class=\"cleaner_h5\"></div>";	}
		if(stripslashes($row['cus'])==1){
echo "<input aria-label=\"Access4\" type=\"checkbox\" name=\"access4\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','cus',4)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">CUSTOMER CARE</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access4\" type=\"checkbox\"  name=\"access4\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','cus',4)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">CUSTOMER CARE</a>	<div class=\"cleaner_h5\"></div>";	}
			
				if(stripslashes($row['dental'])==1){
echo "<input aria-label=\"Access5\" type=\"checkbox\" name=\"access5\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','dental',5)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">DENTAL CLINIC</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access5\" type=\"checkbox\"  name=\"access5\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','dental',5)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">DENTAL CLINIC</a>	<div class=\"cleaner_h5\"></div>";	}
					
				if(stripslashes($row['dialysis'])==1){
echo "<input aria-label=\"Access6\" type=\"checkbox\" name=\"access6\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','dialysis',6)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">DIALYSIS</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access6\" type=\"checkbox\"  name=\"access6\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','dialysis',6)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">DIALYSIS</a>	<div class=\"cleaner_h5\"></div>";	}	
					if(stripslashes($row['emergencies'])==1){
echo "<input aria-label=\"Access7\" type=\"checkbox\" name=\"access7\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','emergencies',7)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">EMERGENCIES</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access7\" type=\"checkbox\"  name=\"access7\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','emergencies',7)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">EMERGENCIES</a>	<div class=\"cleaner_h5\"></div>";	}
			if(stripslashes($row['eye'])==1){
echo "<input aria-label=\"Access8\" type=\"checkbox\" name=\"access8\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','eye',8)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">EYE CLINIC</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access8\" type=\"checkbox\"  name=\"access8\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','eye',8)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">EYE CLINIC</a>	<div class=\"cleaner_h5\"></div>";	}	
					if(stripslashes($row['general'])==1){
echo "<input aria-label=\"Access9\" type=\"checkbox\" name=\"access9\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','general',9)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">GENERAL</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access9\" type=\"checkbox\"  name=\"access9\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','general',9)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">GENERAL</a>	<div class=\"cleaner_h5\"></div>";	}
				if(stripslashes($row['mobile'])==1){
echo "<input aria-label=\"Access10\" type=\"checkbox\" name=\"access10\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','mobile',10)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">MOBILECLINIC</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access10\" type=\"checkbox\"  name=\"access10\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','mobile',10)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">MOBILECLINIC</a>	<div class=\"cleaner_h5\"></div>";	}	
			if(stripslashes($row['housekeeping'])==1){
echo "<input aria-label=\"Access24\" type=\"checkbox\" name=\"access24\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','housekeeping',24)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">HOUSEKEEPING</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access24\" type=\"checkbox\"  name=\"access24\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','housekeeping',24)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">HOUSEKEEPING</a>	<div class=\"cleaner_h5\"></div>";	}	
				if(stripslashes($row['ward'])==1){
echo "<input aria-label=\"Access11\" type=\"checkbox\" name=\"access11\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','ward',11)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">WARD</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access11\" type=\"checkbox\"  name=\"access11\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','ward',11)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">WARD</a>	<div class=\"cleaner_h5\"></div>";	}
		if(stripslashes($row['kitchen'])==1){
echo "<input aria-label=\"Access12\" type=\"checkbox\" name=\"access12\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','kitchen',12)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">KITCHEN</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access12\" type=\"checkbox\"  name=\"access12\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','kitchen',12)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">KITCHEN</a>	<div class=\"cleaner_h5\"></div>";	}
			if(stripslashes($row['lab'])==1){
echo "<input aria-label=\"Access13\" type=\"checkbox\" name=\"access13\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','lab',13)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">LABORATORY</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access13\" type=\"checkbox\"  name=\"access13\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','lab',13)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">LABORATORY</a>	<div class=\"cleaner_h5\"></div>";	}
			if(stripslashes($row['maternity'])==1){
echo "<input aria-label=\"Access14\" type=\"checkbox\" name=\"access14\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','maternity',14)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">MATERNITY</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access14\" type=\"checkbox\"  name=\"access14\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','maternity',14)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">MATERNITY</a>	<div class=\"cleaner_h5\"></div>";	}
				if(stripslashes($row['mch'])==1){
echo "<input aria-label=\"Access15\" type=\"checkbox\" name=\"access15\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','mch',15)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">MCH</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access15\" type=\"checkbox\"  name=\"access15\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','mch',15)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">MCH</a>	<div class=\"cleaner_h5\"></div>";	}
			if(stripslashes($row['ortho'])==1){
echo "<input aria-label=\"Access16\" type=\"checkbox\" name=\"access16\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','ortho',16)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">ORTHOPAEDIC</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access16\" type=\"checkbox\"  name=\"access16\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','ortho',16)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">ORTHOPAEDIC</a>	<div class=\"cleaner_h5\"></div>";	}	
			if(stripslashes($row['opd'])==1){
echo "<input aria-label=\"Access17\" type=\"checkbox\" name=\"access17\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','opd',17)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">OUTPATIENT</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access17\" type=\"checkbox\"  name=\"access17\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','opd',17)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">OUTPATIENT</a>	<div class=\"cleaner_h5\"></div>";	}
			
		if(stripslashes($row['paediatrics'])==1){
echo "<input aria-label=\"Access18\" type=\"checkbox\" name=\"access18\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','paediatrics',18)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">PAEDIATRICS</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access18\" type=\"checkbox\"  name=\"access18\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','paediatrics',18)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">PAEDIATRICS</a>	<div class=\"cleaner_h5\"></div>";	}								
		if(stripslashes($row['pharmaceutical'])==1){
echo "<input aria-label=\"Access19\" type=\"checkbox\" name=\"access19\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','pharmaceutical',19)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">PHARMACEUTICALS</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access19\" type=\"checkbox\"  name=\"access19\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','pharmaceutical',19)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">PHARMACEUTICALS</a>	<div class=\"cleaner_h5\"></div>";	}							
			
			if(stripslashes($row['phy'])==1){
echo "<input aria-label=\"Access20\" type=\"checkbox\" name=\"access20\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','phy',20)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">PHYSIOTHERAPY</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access20\" type=\"checkbox\"  name=\"access20\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','phy',20)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">PHYSIOTHERAPY</a>	<div class=\"cleaner_h5\"></div>";	}
			
			if(stripslashes($row['rad'])==1){
echo "<input aria-label=\"Access21\" type=\"checkbox\" name=\"access21\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','rad',21)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">RADIOLOGY</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access21\" type=\"checkbox\"  name=\"access21\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','rad',21)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">RADIOLOGY</a>	<div class=\"cleaner_h5\"></div>";	}		
				
		if(stripslashes($row['stationery'])==1){
echo "<input aria-label=\"Access22\" type=\"checkbox\" name=\"access22\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','stationery',22)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">STATIONERY</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access22\" type=\"checkbox\"  name=\"access22\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','stationery',22)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">STATIONERY</a>	<div class=\"cleaner_h5\"></div>";	}
		if(stripslashes($row['theatre'])==1){
echo "<input aria-label=\"Access23\" type=\"checkbox\" name=\"access23\" style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" checked=\"checked\" onclick=\"checkitemac('".$code."','theatre',23)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">THEATRE</a><div class=\"cleaner_h5\"></div>";	
									}else{
		echo "<input aria-label=\"Access23\" type=\"checkbox\"  name=\"access23\"  style=\"float:left; margin:8px 0 0 10px;\" value=\"1\" onclick=\"checkitemac('".$code."','theatre',23)\"/><a class=\"labels\" style=\"float:left;margin-left:5px; margin-right:20px\">THEATRE</a>	<div class=\"cleaner_h5\"></div>";	}					
										
									echo'</div>
									</div>	
									<div id="recentstude">
										</div>
									</div>';
						
							break;
							case '55':
							
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Set up Comp IPs Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

								echo'
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">';
								
							echo'<h5 style="text-align:center;">Set up Computer IPs Panel</h5><div class="cleaner"></div>';
									echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-25px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help58()\"/></div>";								
						echo"<div id=\"newle\" style=\"width:30px; height:30px; float:right;margin:0px 10px 0 0\"><img alt=\"Add New Computer\" src=\"images/plus.png\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Add New Computer\" onclick=\"opencomp()\"/></div>";		
									
									 	echo'
										<div id="loading" ></div>
                    					<div id="display" style="height:310px;"></div>
                						';
                    					echo "<script>paginate(15,0);</script>";
										
											
									
							echo'</div></div>
						</div></div>';
							
							break;
							case '56':
							
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Set up Banks Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

								echo'
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px">';
								
							echo'<h5 style="text-align:center;">Set up Banks Panel</h5><div class="cleaner"></div>';
									echo"<div id=\"backatt\" style=\"width:30px; height:30px; float:right;margin:-25px 5px 0 0\"><img alt=\"Help\" src=\"images/findstud.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help59()\"/></div>";								
						echo"<div id=\"newle\" style=\"width:30px; height:30px; float:right;margin:0px 10px 0 0\"><img alt=\"Add New Computer\" src=\"images/plus.png\" width=\"30\" height=\"30\" style=\"cursor:pointer;\" title=\"Add New Computer\" onclick=\"openbank()\"/></div>";		
									
									 	echo'
										<div id="loading" ></div>
                    					<div id="display" style="height:310px;"></div>
                						';
                    					echo "<script>paginate(16,0);</script>";
										
											
									
							echo'</div></div>
						</div></div>';
							
							break;
	case '57':

		@mysqli_query($db, "insert into log values('','" . $username . ": Accesses Cash Collection Panel.','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

		echo '
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;">
							<div style="width:456px; float:left">	
							<h5 style="text-align:center; margin-top:20px">CHIEF CASHIER: CASH COLLECTION</h5>';

		echo '<div class="cleaner_h5"></div>
							<a class="labels" style="float:left; margin-left:10px;">Cashier Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
									<label for="crledger" class="bh-visually-hidden">Cashier Account:</label><select style="float:left; margin-left:20px; width:250px" class="select" id="crledger">
											<option value="">Select one...</option>';
		$result = mysqli_query($db, "SELECT ledgerid,`name`,`bal` FROM ledgers WHERE category='Cashier' ORDER BY `name`");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			$name = trim(stripslashes($row['name']));
			$cbal = trim(stripslashes($row['bal']));
			//if($username!=$name ){
			echo '<option value="' . intval($row['ledgerid']) . '">' . $name . '</option>';
			//}
		}

		echo '</select></div>';
		echo '<div class="cleaner_h5"></div>';

		echo '<div class="cleaner_h5"></div>
							<a class="labels" style="float:left; margin-left:10px;">Deposit Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
									<label for="cashcol_depositacntid" class="bh-visually-hidden">Deposit Account:</label><select style="float:left; margin-left:20px; width:250px" class="select" id="cashcol_depositacntid">
											<option value="">Select one...</option>';
		$result = mysqli_query($db, "SELECT ledgerid,`name` FROM ledgers WHERE `isMainLedger`!=1 AND category='Cash' ORDER BY `name`");
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<option value="' . intval($row['ledgerid']) . '">' . trim(stripslashes($row['name'])) . '</option>';
		}
		echo '</select></div>';
		echo '<div class="cleaner_h5"></div>';

		echo '<a class="labels" style="float:left; margin-left:10px;">Amount:<span>*</span></a>
		<label for="amount" class="bh-visually-hidden">Name</label><input type="text" id="amount" name="name" class="input_field" value=""  style="width:240px; float:right; margin-right:10px"/>		
		<div class="cleaner_h5"></div>	
						<a class="labels" style="float:left; margin-left:10px;">Date:<span>*</span></a>
					    <label for="datepick2" class="bh-visually-hidden">Name</label><input type="text" id="datepick2" name="name" class="input_field" value="' . date('Y/m/d') . '"  style="width:240px; float:right; margin-right:10px"/>		
					     <div class="cleaner_h5"></div>	
			<a class="labels" style="margin-left:10px">Notes:<span>*</span></a>
			<label for="desc" class="bh-visually-hidden">Notes:</label><textarea id="desc" class="input_field"  style="width:240px;height:100px; margin-right:10px; float:right; font-size:11px"/>
	<div class="cleaner_h20"></div>';
		echo "<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:220px; float:left; cursor:pointer;width:60px\" class=\"input_field\" onclick=\"savecashcollect();\"/>";
		echo '<div id="postresp" style="float:left; width:40px;height:40px; margin-left:20px"></div>';
		echo '</div>';

		echo '<div style="width:; float:left; border-left:2px solid #10504F; height:400px; margin-left:50px; padding-left:20px; margin-top:20px">';
		echo '<div id="tabs" style="height:">';
		echo '<ul>';
		echo '<li><a href="#tabs-1">Cashier Balance.</a></li>';
		echo '<li><a href="#tabs-2">Admission Deposits.</a></li>';
		echo '<li><a href="#tabs-3">OPD Night Charges.</a></li>';
		echo '<li><a href="#tabs-4">Penalties.</a></li>';
		//echo'<li><a href="#tabs-5">Deductions.</a></li>';
		echo '</ul>';
		echo '<div id="tabs-1">';
		echo '<h5 style="text-align:; "> CASHIER BALANCES</h5>';
		echo '<div style="height:350px; width:400px; overflow-y:auto;">';
		$result = mysqli_query($db, "SELECT `name`,`bal` FROM ledgers WHERE category='Cashier' ORDER BY bal DESC");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			$name = stripslashes($row['name']);
			if ($username == trim(stripslashes($row['name']))) {
				echo '<p style="color:var(--color-danger, #DC2626)">' . $name . '-<b>' . stripslashes($row['bal']) . '</b></p>';
			} else {
				echo '<p>' . $name . '-<b>' . stripslashes($row['bal']) . '</b></p>';
			}
		}
		echo '</div>';
		echo '</div>';
		echo '<div id="tabs-2">';
		echo '<div style="height:200px; width:400px; overflow-y:auto;">';
		echo '<h5 style="text-align:center; ">ADMISSION DEPOSITS</h5>';
		echo '<div class="cleaner_h5"></div>';
		// $resultd =mysqli_query($db, "SELECT * FROM SALES WHERE ClientId='".$patid."' and Status=1 and ItemCode='84' order by TransNo desc limit 0,1");


		echo '</div>';
		echo '</div>';
		echo '<div id="tabs-3">';
		echo '<div style="height:200px; width:400px; overflow-y:auto;">';
		echo '<h5 style="text-align:center; ">OPD NIGHT CHARGES / ADMISSION DEPOSITS</h5>';
		$result = mysqli_query($db, "select * from ledgers where category='NightNurse' order by bal desc");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			$name = stripslashes($row['name']);
			if ($username == substr(stripslashes($row['name']), 0, 5)) {
				echo '<p style="color:var(--color-danger, #DC2626)">' . $name . '-<b>' . stripslashes($row['bal']) . '</b></p>';
			} else {
				echo '<p>' . $name . '-<b>' . stripslashes($row['bal']) . '</b></p>';
			}
		}
		echo '<div class="cleaner_h5"></div>';


		echo '</div>';
		echo '</div>';
		echo '<div id="tabs-4">';
		echo '<h5 style="text-align:center; ">CASHIER PENALTIES/ADVANCES</h5>';
		echo '<div class="cleaner_h5"></div>';
		echo '</div>';
		// echo'<div id="tabs-5">';
		// echo'</div>';
		echo '</div>';
		echo '</div>';


		echo '</div></div>';
		break;

	case '58':

		@mysqli_query($db, "insert into log values('','" . $username . ": Accesses Expense Management Panel.','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

		echo '
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;">
							<div style="width:456px; float:left">	
							<h5 style="text-align:center; margin-top:20px">Expense Management</h5>';

		echo '<div class="cleaner_h5"></div>
						<a class="labels" style="float:left; margin-left:10px;">Expense Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="expensemgt_acntid" class="bh-visually-hidden">Expense Account:</label><select id="expensemgt_acntid" style="float:left; margin-left:20px; width:250px" class="select">
									<option value=""></option>';
		$result = mysqli_query($db, "SELECT ledgerid,`name`,`category`,`isMainLedger` FROM ledgers WHERE `type` IN('Expense','Other_Expense') AND `isSubledger`!=1 ORDER BY `name` ");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			echo '<option value="' . intval($row['ledgerid']) . '" data-mcat="' . trim(stripslashes($row['category'])) . '" data-main="' . intval($row['isMainLedger']) . '" >' . trim(stripslashes($row['name'])) . '</option>';
		}

		echo '</select></div>';
		echo '<div class="cleaner_h5"></div>';

		echo '<div id="expensemgt_acntid_subledgerdiv" style="width:470px;float:left;display:none;">	
				<a style="text-align:left;" class="labels">Expense Subaccount:<span>*</span> </a>		
				   <div class="ui-widget" style="margin-right:10px;float:right;">					
						<label for="expensemgt_acntid_subledgerid" class="bh-visually-hidden">Expense Subaccount:</label><select id="expensemgt_acntid_subledgerid" class="input_field" style="width:252px;margin-right:15px;">
								<option value=""></option>';
		echo '</select>';
		echo '</div>';
		echo '<div class="cleaner_h5"></div>';
		echo '</div>';



		echo '<a class="labels" style="float:left; margin-left:10px;">Pay From: <span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="expense_payfrm_acntid" class="bh-visually-hidden">Pay From:</label><select id="expense_payfrm_acntid" style="float:left; margin-left:20px; width:250px" class="select">
							<option value=""></option>';
		$result = mysqli_query($db, "SELECT ledgerid,`name`,`category`,`isMainLedger` FROM ledgers WHERE `type`='Asset' AND `isSubledger`!=1 AND `category` IN('Bank','Cash') ORDER BY `name` ");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			echo '<option value="' . intval($row['ledgerid']) . '" data-mcat="' . trim(stripslashes($row['category'])) . '" data-main="' . intval($row['isMainLedger']) . '" >' . trim(stripslashes($row['name'])) . '</option>';
		}

		echo '</select></div>';
		echo '<div class="cleaner_h5"></div>';

		echo '<div id="expense_payfrm_subledgerdiv" style="width:470px;float:left;display:none;">	
				<a style="text-align:left;" class="labels">Pay From Subaccount:<span>*</span> </a>				
				   <div class="ui-widget" style="margin-right:10px;float:right;">					
						<label for="expense_payfrm_subledgerid" class="bh-visually-hidden">Pay From Subaccount:</label><select id="expense_payfrm_subledgerid" class="input_field" style="width:252px;margin-right:15px;">
								<option value=""></option>';
		echo '</select>';
		echo '</div>';
		echo '<div class="cleaner_h5"></div>';
		echo '</div>';



		echo '<a class="labels" style="float:left; margin-left:10px;">Department: <span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="expense_departmentid" class="bh-visually-hidden">Department:</label><select style="float:left; margin-left:20px; width:252px" class="select" id="expense_departmentid">
							<option value="">Select an option</option>';
		$result = mysqli_query($db, "SELECT CatId,`ItemCat` FROM categories ");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			echo '<option value="' . intval($row['CatId']) . '">' . trim(stripslashes($row['ItemCat'])) . '</option>';
		}

		echo '</select></div>';
		echo '<div class="cleaner_h5"></div>';
		echo '<a class="labels" style="float:left; margin-left:10px;">Amount:<span>*</span></a>
				<input type="text" id="amount" class="input_field" style="width:240px; float:right; margin-right:10px" placeholder="Enter Amount"/>';

		echo '<div class="cleaner_h5"></div>';
		echo '<a class="labels" style="float:left; margin-left:10px;">Reference No: </a>
				<input type="text" id="expense_refno" class="input_field" style="width:240px; float:right; margin-right:10px" placeholder="Payment reference number"/>		
		<div class="cleaner_h5"></div>';

		echo '<a class="labels" style="float:left; margin-left:10px;">Date:<span>*</span></a>
			<label for="datepick" class="bh-visually-hidden">Date:</label><input type="text" id="datepick" class="input_field" value="' . date('Y/m/d') . '"  style="width:240px; float:right; margin-right:10px"/>	<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:10px">Notes:<span>*</span></a>
			<label for="desc" class="bh-visually-hidden">Notes:</label><textarea id="desc" class="input_field"  style="width:240px;height:50px; margin-right:10px; float:right; font-size:11px"/>
	<div class="cleaner_h10"></div>';
		echo "<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:220px; float:left; cursor:pointer;width:60px\" class=\"input_field\" onclick=\"saveexpman();\"/>";
		echo '<div id="postresp" style="float:left; width:40px;height:40px; margin-left:20px"></div>';
		echo '</div>
							
						<div style="width:400px; float:left; border-left:2px solid #10504F; height:400px; margin-left:50px; padding-left:20px; margin-top:20px">
							<h5 style="text-align:center; "> ACCOUNT BALANCES</h5>
							<div class="cleaner_h5"></div>
						<div style="height:380px; width:400px; overflow-y:auto;">';
		$resultPC = mysqli_query($db, "SELECT `name`,bal FROM ledgers WHERE `isMainLedger`=0 AND `type`='Asset' AND `category` IN('Cash','Bank')  ");
		while ($rowPC = mysqli_fetch_assoc($resultPC)) {
			echo '<p> <b>' . ucwords(strtolower((trim(stripslashes($rowPC['name']))))) . ' <span style="color:var(--color-danger, #DC2626); font-size:13px;">Ksh.' . number_format(floatval($rowPC['bal']), 2, '.', ',') . '</span> </b></p>';
		}

		echo '
						</div>
						</div>	
							
							
							</div></div>
							';


		break;

	case '59':

		@mysqli_query($db, "insert into log values('','" . $username . ": Accesses Cash Deposit Panel.','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");
		$output = '';
		$output .= '
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;">
							<div style="width:456px; float:left">	
							<h5 style="text-align:center; margin-top:20px">Cash Deposit</h5>';

		$output .= '<div class="cleaner_h5"></div>
						<a class="labels" style="float:left; margin-left:10px;">Cash Account (Source):<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="cashdepo_cashledgerid" class="bh-visually-hidden">Cash Account (Source):</label><select id="cashdepo_cashledgerid" style="float:left; margin-left:20px; width:250px" class="select">
							<option value=""></option>';
		$result = mysqli_query($db, "SELECT `ledgerid`,`name`,`category`,`isMainLedger`,`type` FROM ledgers WHERE `ledgerid`=670 ");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			$value = intval($row['ledgerid']);
			$output .= '<option value="' . $value . '" data-mcat="' . trim(stripslashes($row['category'])) . '" data-main="' . intval($row['isMainLedger']) . '" data-ltype="' . trim(stripslashes($row['type'])) . '" >' . trim(stripslashes($row['name'])) . '</option>';
		}

		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<div id="cashdepo_cash_subledgerdiv" class="ui_widget" style="margin-right:10px;float:right; width:400px;display:none;">	
				<a style="text-align:left;" class="labels" style="float:left;margin-left:0px;">Cash Subaccount:<span>*</span> </a>					
				<label for="cashdepo_cash_subledgerid" class="bh-visually-hidden">Cash Subaccount:</label><select id="cashdepo_cash_subledgerid" class="input_field" style="width:200px;margin-left:100px;">
						<option value=""></option>';
		$output .= '</select>
				<div class="cleaner_h5"></div>
		</div>';

		$output .= '<div class="cleaner_h5"></div>
						<a class="labels" style="float:left; margin-left:10px;">Bank Account (Recipient):<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="cashdepo_bankledgerid" class="bh-visually-hidden">Bank Account (Recipient):</label><select id="cashdepo_bankledgerid" style="float:left; margin-left:20px; width:250px" class="select">
							<option value=""></option>';
		$result3 = mysqli_query($db, "SELECT `ledgerid`,`name`,`category`,`isMainLedger` FROM `ledgers` WHERE `type`='Asset' AND `isSubledger`!=1 AND `category`='Bank' ORDER BY `name` ");
		$num_results3 = mysqli_num_rows($result3);
		for ($i = 0; $i < $num_results3; $i++) {
			$row = mysqli_fetch_assoc($result3);
			$name = stripslashes($row['name']);
			$value = intval($row['ledgerid']);
			$output .= '<option value="' . $value . '" data-mcat="' . trim(stripslashes($row['category'])) . '" data-main="' . intval($row['isMainLedger']) . '" >' . $name . '</option>';
		}

		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<div id="cashdepo_bank_subledgerdiv" class="ui_widget" style="margin-right:10px;float:right; width:400px;display:none;">	
				<a style="text-align:left;" class="labels" style="float:left;margin-left:0px;">Bank Subaccount:<span>*</span> </a>					
				<label for="cashdepo_bank_subledgerid" class="bh-visually-hidden">Bank Subaccount:</label><select id="cashdepo_bank_subledgerid" class="input_field" style="width:200px;margin-left:100px;">
						<option value=""></option>';
		$output .= '</select>
				<div class="cleaner_h5"></div>
		</div>';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left; margin-left:10px;">Deposit Amount:<span>*</span></a>
		<input type="text" id="cashdepo_amount" class="input_field" style="width:240px; float:right; margin-right:10px" placeholder="Enter Amount"/>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<div id="cashdepoother_incomes_container" style="display:none;">';

		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left; margin-left:10px;">Debtor (Source): <span>*</span></a>
										<div class="ui-widget" style="margin-right:10px; float:right">
										<label for="cashdepo_otherincomes_debtorid" class="bh-visually-hidden">Debtor (Source):</label><select style="float:left; margin-left:20px; width:252px" class="select" id="cashdepo_otherincomes_debtorid">
										<option value="">Select an option</option>';
		$result = mysqli_query($db, "SELECT CustomerId,CustomerName FROM creditcustomers WHERE AccountReceivableLedgerID>0 AND IncomeAccountLedgerID>0 AND CustomerName!='CASH' ORDER BY CustomerName DESC ");
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= '<option value="' . intval($row['CustomerId']) . '">' . trim(stripslashes($row['CustomerName'])) . ' </option>';
		}
		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left; margin-left:10px;">Department: <span>*</span></a>
										<div class="ui-widget" style="margin-right:10px; float:right">
										<label for="cashdepo_otherincomes_departmentid" class="bh-visually-hidden">Department:</label><select style="float:left; margin-left:20px; width:252px" class="select" id="cashdepo_otherincomes_departmentid">
										<option value="">Select an option</option>';
		$result = mysqli_query($db, "SELECT CatId,`ItemCat` FROM categories ");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			$output .= '<option value="' . intval($row['CatId']) . '">' . trim(stripslashes($row['ItemCat'])) . '</option>';
		}
		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '</div>';

		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left; margin-left:10px;">Transaction Ref:<span>*</span></a>
		<input type="text" id="cashdepo_refno" class="input_field" style="width:240px; float:right; margin-right:10px" placeholder="Reference number"/>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<a class="labels" style="float:left; margin-left:10px;">Transaction Date:<span>*</span></a>
					    <label for="cashdepo_datepick2" class="bh-visually-hidden">Transaction Date:</label><input type="text" id="cashdepo_datepick2" class="input_field" value="' . date('Y/m/d') . '" style="width:240px; float:right; margin-right:10px;" />		
					     <div class="cleaner_h5"></div>	
			<a class="labels" style="margin-left:10px">Notes: </a>
			<label for="cashdepo_desc" class="bh-visually-hidden">Notes:</label><textarea id="cashdepo_desc" class="input_field" style="width:240px;height:100px; margin-right:10px; float:right; font-size:11px"/>
	<div class="cleaner_h20"></div>';
		$output .= "<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:220px; float:left; cursor:pointer;width:60px\" class=\"input_field\" onclick=\"savebankdep();\"/>";
		$output .= '<div id="postresp" style="float:left; width:40px;height:40px; margin-left:20px"></div>';
		$output .= '</div>
							
						<div style="width:400px; float:left; border-left:2px solid #10504F; height:400px; margin-left:50px; padding-left:20px; margin-top:20px">
							<h5 style="text-align:center; ">CASH BALANCES </h5>
							<div class="cleaner_h5"></div>
						<div style="height:380px; width:400px; overflow-y:auto;">';
		$result = mysqli_query($db, "SELECT ledgerid,`name`,bal FROM ledgers WHERE mainLedgerId=626 ORDER BY bal DESC");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			//if($username==substr(stripslashes($row['name']),0,5)){
			$output .= '<p style="font-size:13px;">' . strtoupper(trim(stripslashes($row['name']))) . ': <b style="color:var(--color-danger, #DC2626); font-size:13px;">' . number_format(floatval($row['bal']), 2, '.', ',') . '</b></p>';
			//}
		}
		$output .= '
						</div>
						</div>	
							
							
							</div></div>
							';


		die($output);


		break;



	case 61:

		$tno = $_GET['tno'];
		$_SESSION['consinvoice'][$tno] = $tno;
		break;

	case 62:

		$tno = $_GET['tno'];
		unset($_SESSION['consinvoice'][$tno]);

		break;

				
					case 63:
					$result = mysqli_query($db, "insert into log values('0','".$username." accesses Stock Valuation Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo"<script>$('#dept89').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:180px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
			echo"<h5 style=\"margin-right:10px; color:#fff\">Stock Valuation:";
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()">
				</h5></div>
				<div class="cleaner_h5"></div>
					<a class="labels" style="float:left; margin-left:10px;">Dept:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="dept89" class="bh-visually-hidden">Dept:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="dept89">';
							if($usertype=='Admin'||$usertype=='Accountant'||$usertype=='Store'){
							echo'
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['Branchname']).'">'.stripslashes($row['Branchname']).'</option>';
							}
								}else{echo'<option value="'.$userdep.'">'.$userdep.'</option>';}
							echo'</select></div>
								<div class="cleaner_h5"></div>
								<a class="labels" style="float:left; margin-left:10px;">Section:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="categ90" class="bh-visually-hidden">Section:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="categ90">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from categories where Type='GOOD'");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['ItemCat']).'">'.stripslashes($row['ItemCat']).'</option>';
							}
							
							echo'	<option value="All">All</option></select></div>
				<div class="cleaner_h10"></div>
				
				
				<div id="letacateg"></div>
				
			
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterstockval();"/>
					<div class="cleaner_h5"></div>
								</div>
								</div>	
		';
							break;
					
							case 64:
					$result = mysqli_query($db, "insert into log values('0','".$username." accesses Stock Taking Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo"<script>$('#dept89').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:180px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
			echo"<h5 style=\"margin-right:10px; color:#fff\">Stock Taking:";
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()">
				</h5></div>
				<div class="cleaner_h5"></div>
					<a class="labels" style="float:left; margin-left:10px;">Dept:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="dept89" class="bh-visually-hidden">Dept:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="dept89">';
							if($usertype=='Admin'||$usertype=='Accountant'||$usertype=='Store'){
							echo'
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['Branchname']).'">'.stripslashes($row['Branchname']).'</option>';
							}
								}else{echo'<option value="'.$userdep.'">'.$userdep.'</option>';}
							echo'</select></div>
								<div class="cleaner_h5"></div>
							<a class="labels" style="float:left; margin-left:10px;">Section:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="categ90" class="bh-visually-hidden">Section:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="categ90">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from categories where Type='GOOD'");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['ItemCat']).'">'.stripslashes($row['ItemCat']).'</option>';
							}
							
							echo'	<option value="All">All</option></select></div>
				<div class="cleaner_h10"></div>
				
				
				<div id="letacateg"></div>
				
			
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterstocktaking();"/>
					<div class="cleaner_h5"></div>
								</div>
								</div>	
		';
							break;
							
								case 65:
					
						echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Goods Price List Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

					$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:170px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Goods Price List
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<a class="labels" style="margin-left:20px">Section:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Section:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from categories where Type='GOOD'");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option value="'.stripslashes($row['ItemCat']).'">'.stripslashes($row['ItemCat']).'</option>';
							}
						echo'</select>
						<div class="cleaner_h5"></div>
					<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="entergoodsprice('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
							case 66:
					
						echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Goods Returned Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

					$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Goods Returned Report-All
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterreturn('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
							case 67:
						echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Purchases Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

					$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:250px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Goods Returned Report-By Item
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<a class="labels" style="margin-left:20px">Item Name:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Item Name:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from items where Type='GOOD' order by ItemName");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".stripslashes($row['ItemCode'])."\">".stripslashes($row['ItemName'])."</option>";
							}
							echo'</select>
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
									cursor:pointer; width:80px" class="select" onclick="enterreturnrep('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
						
							break;
							case 68:
						echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Purchases Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

					$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:250px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Goods Returned-By Supplier
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<a class="labels" style="margin-left:20px">Supplier Name:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Supplier Name:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from creditsuppliers");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['CustomerName']).'">'.stripslashes($row['CustomerName']).'</option>';
							}
							echo'</select>	
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
									cursor:pointer; width:80px" class="select" onclick="enterreturnrep('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
						
							break;
							
							case 69:
					
						echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Invoice Listing-Outwards Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Invoice Listing (Outwards)
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterinvoicelist2();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
							case 70:
					
					
						echo"<script>$('#categ90').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Re-Order Level Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Re-Order Level-By Section/All
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="float:left; margin-left:10px;">Section:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="categ90" class="bh-visually-hidden">Section:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="categ90">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from categories where Type='GOOD'");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['ItemCat']).'">'.stripslashes($row['ItemCat']).'</option>';
							}
							
							echo'	<option value="All">All</option></select></div>
				<div class="cleaner_h10"></div>
				
				
				<div id="letacateg"></div>
				
			
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterreorder();"/>
					<div class="cleaner_h5"></div>
								
					</div>';
						
							break;
							
							case 71:
							$name=$_GET['name'];
							echo'<a class="labels" style="float:left; margin-left:10px;">Sub-Category:</a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="subcateg89" class="bh-visually-hidden">Sub-Category:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="subcateg89">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from subcategories where branch='".$name."' order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option  value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
							}
							echo'	<option value="All">All</option></select></div>
				<div class="cleaner_h10"></div>';
							
							break;
							
							case 72:
					
					
						echo"<script>$('#randomstock').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Random Stock Take Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Random Stock Take
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="randomstock" class="bh-visually-hidden">Random Stock Take</label><select class="select" id="randomstock" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from categories where Type='GOOD'");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option value="'.stripslashes($row['ItemCat']).'">'.stripslashes($row['ItemCat']).'</option>';
							}
							echo'<option value="All">All</option></select>	
					<div class="cleaner_h5"></div>
									
					</div>';
						
							break;
							
							case 73:
				$a=$_GET['a'];
				$result = mysqli_query($db, "insert into log values('0','".$username." accesses Patients Reports Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">';
				if($a==1){
				echo'<h5 style="margin-right:10px; color:#fff">OutPatients Report';
				}
				else if($a==2){
				echo'<h5 style="margin-right:10px; color:#fff">InPatients Report';
				}else if($a==4){
				echo'<h5 style="margin-right:10px; color:#fff">Unregistered Patients Report';
				}else{echo'<h5 style="margin-right:10px; color:#fff">All Patients Report';}
				echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterpatreport('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
								case '73.1':
				$a=$_GET['a'];
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Patients Reviews Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
$a=$_GET['a'];
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">';
				echo'<h5 style="margin-right:10px; color:#fff">Patients Review Report';
				echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterpatreview('.$a.');"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							case '73.2':
		
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Patients List Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">';
				echo'<h5 style="margin-right:10px; color:#fff">Patients List Report';
				echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterpatlist();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;
							
								case '73.3':
					
					
						echo"<script>$('#inpatlist').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Inpatients List Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Current In-Patients List
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="inpatlist" class="bh-visually-hidden">Current In-Patients List</label><select class="select" id="inpatlist" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
					echo'<option value="All">All</option>
					<option value="MALE_WARD">MALE WARD</option>
					<option value="MATERNITY">MATERNITY</option>
					<option value="FEMALE_WARD">FEMALE WARD</option>
					<option value="PAEDIATRICS">PAEDIATRICS</option>
					</select>	
					<div class="cleaner_h5"></div>
									
					</div>';
						
							break;
							
							case '73.4':
					
					
						echo"<script>$('#dispcat').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Inpatients List Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
			echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Pharmacy Dispenses Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="dispcat" class="bh-visually-hidden">Pharmacy Dispenses Report</label><select class="combos" id="dispcat" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
					echo'<option value="All">All Patients</option>
					<option value="Unregistered">Unregistered Patients</option>
					<option value="Registered">Registered Patients</option>
					</select>	
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
									cursor:pointer; width:80px" class="select" onclick="enterpharmdisp();"/>
					<div class="cleaner_h5"></div>
					
									
					</div>';
						
							break;
							
							
							case 74:
							
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Consultations Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
		
							$pid=25;
							$resulta =mysqli_query($db, "select * from newprescription where PrescId='".$pid."'");
							$rowa=mysqli_fetch_array($resulta);
							$patid=stripslashes($rowa['PatId']);
							$dept=stripslashes($rowa['Dept']);
							$dcare=stripslashes($rowa['DayCare']);
							$result =mysqli_query($db, "select * from patients where pntno='".stripslashes($rowa['PatId'])."'");
							$row=mysqli_fetch_array($result);
							
							
							echo'<div id="newstude">';
						
								echo"<h2  style=\"float:left; padding:5px 5px 0 0; margin:0\">".$dept."-".stripslashes($row['name'])." ".stripslashes($row['oname'])." ".stripslashes($row['lname'])." [".stripslashes($row['pntno'])."] </h2>";
								
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 5px 0 0px; cursor:pointer\" onclick=\"window.open('report.php?id=4&rcptno=".$pid."')\" title=\"Print Patient Report\">";
		echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Help" id="submit"  style="padding:2px 5px; border-color:#fff; background:#ff3; float:left; cursor:pointer;width:50px" class="in_field" onclick="help53();"/></div>
								<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
								echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savenewpresc('".$pid."'')\"/></div>";
		
echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
								
<div id="tabs5" style="width:996px; height:433px">
	<ul>
		<li><a href="#tabs-1">Demographics</a></li>
		<li><a href="#tabs-2">Triage</a></li>
		<li><a href="#tabs-3">History</a></li>
		<li><a href="#tabs-8">Phy. Exam.</a></li>
		<li><a href="#tabs-7">Diagnosis</a></li>
		<li><a href="#tabs-9">Theatre</a></li>
		
	</ul>';
	if($dcare==1){
		$xxx=0;
								echo"<script>
									$().customAlert();
									alert('Alert!', '<p> This Patient is registerd as a corporate. <br/>Any billing should be done in the Corporate Billing/Accumulative Billing Panel.</p>');
									e.preventDefault();
									</script>";
							}else {$xxx=1;}
	echo'<div id="tabs-1">
	<form method="post" name="personal_form" action="#">
								<input type="hidden" name="post" value="Send" />
								<div id="personal" style="border:2px solid #333; height:365px; margin-left:0px">
								<h5>Demographics</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn" class="bh-visually-hidden">Regn</label><input type="text" id="regn" name="regn" class="in_field"  
								value="'.stripslashes($row['pntno']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626)" /> 
								<div class="cleaner_h5"></div>
								<a class="labels">1<sup>st</sup> Name:<span>*</span></a>
                                <label for="name" class="bh-visually-hidden">Name</label><input type="text" id="name" name="name" disabled="disabled"  style="border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['name']).'"/>
								<div class="cleaner_h5"></div>
								 <a class="labels">2<sup>nd</sup> Name:<span>*</span></a>
                                <label for="oname" class="bh-visually-hidden">Oname</label><input type="text" id="oname" name="oname" class="in_field" value="'.stripslashes($row['oname']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">3<sup>rd</sup> Name:<span>*</span></a>
                                <label for="lname" class="bh-visually-hidden">Oname</label><input type="text" id="lname" name="oname"  disabled="disabled"  style="border-color:var(--color-danger, #DC2626)"  class="in_field" value="'.stripslashes($row['lname']).'"/> 
								<div class="cleaner_h5"></div>
						 <a class="labels">Age:</a>';
						  $a=date('Y')-substr(stripslashes($row['dob']),-4,4);
                         echo' <label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="border-color:var(--color-danger, #DC2626)" value="'.$a.'"/> 
								<div class="cleaner_h5"></div>
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
				
					</div>
								
							
								<div id="personal" style="border:2px solid #333; height:365px; margin-left:0px">
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
									echo'<option value="'.stripslashes($row['insid']).'ÃÂÃÂ¸'.stripslashes($row['name']).'" selected="selected">'.stripslashes($row['insurer']).'</option>';
									$resultb =mysqli_query($db, "select * from inscompanies order by name");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['id']).'ÃÂÃÂ¸'.stripslashes($rowb['name']).'">'.stripslashes($rowb['name']).'</option>';
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
							
								<div id="personal" style="border:2px solid #333; height:365px; margin-left:0px">
								<h5>Guardian/Next of Kin Details</h5>
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
								<div id="personal" style="border:2px solid #333; height:365px; margin-left:0px; width:172px">
								<h5>Photo</h5>';
								echo'<div class="cleaner_h5"></div>
								
								<iframe name="leiframe" id="leiframe" class="leiframe" src="'.stripslashes($row['image']).'" style="float:left;margin-left:20px">
								</iframe>
                            	
								</div>
					</div>
	<div id="tabs-2">
								
							
								
								
								
								<div id="personal" style="border:2px solid #333; height:365px; margin-left:0px; width:300px">
								<h5>Triage Analysis</h5>
								<a class="labels">Temp:</a>
                                <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"  class="in_field" value="'.stripslashes($rowa['Temp']).'"  style="width:30px; float:left; margin-left:50px"/> 
								<div style="float:left; margin-top:2px"><a class="labels" style="font-size:5px; margin-top:0px;font-weight:bold; margin-left:5px">0</a></div><div style="float:left; margin=left:3px"><a style="font-size:11px;font-weight:bold;"  class="labels">C</a></div>
 								<div class="cleaner_h5"></div>
								<a class="labels">B.P:</a>
                                <div style="width:40px; float:left;margin-left:62px; padding:1px " class="in_field">
								<div style="float:left; border-bottom:1px solid #333; width:35px"><label for="bp1" class="bh-visually-hidden">Oname</label><input type="text" id="bp1" name="oname" value="'.stripslashes($rowa['Bp1']).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px; margin-top:0px;margin-bottom:2px;text-align:center"/> </div>
								<div class="cleaner"></div>
								<div style="float:left"><label for="bp2" class="bh-visually-hidden">Oname</label><input type="text" id="bp2" name="oname" value="'.stripslashes($rowa['Bp2']).'"  style="width:25px; float:left;background:none;font-size:11px; margin-left:5px;  margin-top:2px;text-align:center"/>  </div>
								</div>
								
								<a class="labels" style="font-weight:bold; margin-left:5px; margin-top:20px">mmHg</a>
								<div class="cleaner_h5"></div>
								<a class="labels">Weight:</a>
                                <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname" class="in_field" value="'.stripslashes($rowa['Weight']).'"  style="width:30px; float:left; margin-left:42px"/> 
								<a class="labels" style="font-weight:bold; margin-left:5px">Kgs</a>
								<div class="cleaner_h5"></div>
								<a class="labels">Resp. Rate:</a>
                                <label for="resprate" class="bh-visually-hidden">Oname</label><input type="text" id="resprate" name="oname" class="in_field" value="'.stripslashes($rowa['RespRate']).'"  style="width:30px; float:left; margin-left:23px" /> 
								<a class="labels" style="font-weight:bold; margin-left:5px">Breaths/Min</a>
								<div class="cleaner_h5"></div>
								<a class="labels">Pulse Rate:</a>
                                <label for="pulserate" class="bh-visually-hidden">Oname</label><input type="text" id="pulserate" name="oname" class="in_field" value="'.stripslashes($rowa['PulseRate']).'"  style="width:30px; float:left; margin-left:25px" /> 
							<a class="labels" style="font-weight:bold; margin-left:5px">Beats/Min</a>
							<div class="cleaner_h5"></div>
								<a class="labels">R.B.S:</a>
                                <label for="rbs" class="bh-visually-hidden">Oname</label><input type="text" id="rbs" name="oname" class="in_field" value="'.stripslashes($rowa['Rbs']).'"  style="width:30px; float:left; margin-left:54px" /> 
							<a class="labels" style="font-weight:bold; margin-left:5px">mMoles/Ltr</a>
								</div>
								<div id="personal" style="border:2px solid #333; height:365px; margin-left:0px; width:300px">
								<h5>Health Problems/Allergies</h5>
								<label for="allergies" class="bh-visually-hidden">Health Problems/Allergies</label><textarea id="allergies" style="float:right;height:255px; width:290px" class="alergy">'.stripslashes($rowa['Allergies']).'</textarea>
								</div>
								<div id="personal" style="border:2px solid #333; height:365px; margin-left:0px; width:300px">
								<h5>Other Details</h5>
								<label for="hodetails" class="bh-visually-hidden">Other Details</label><textarea id="hodetails" style="float:right;height:255px; width:290px" class="alergy">'.stripslashes($rowa['OtherDetails']).'</textarea>
								</div>
							
	
	</div>

	
	

	
</div>
							</div>
   							';
							
					break;
					
					case 75:
					echo'<a class="labels" style="margin-left:10px; font-weight:bold">Search By:</a>
		<label for="menusearch" class="bh-visually-hidden">Search By:</label><select class="input_field" id="menusearch" style="float:right; margin-right:10px">
		<option value="1" onclick="menuop(1)">Patient Name</option>
		<option value="2" onclick="menuop(2)">Patient No</option>
		<option value="3" onclick="menuop(3)">Next of Kin</option>
		<option value="4" onclick="menuop(4)">Phone No</option>
			<option value="5" onclick="menuop(5)">O/P No</option>
		</select>
		<div class="cleaner_h5"></div>
	<div id="op1">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt31" class="bh-visually-hidden">O/P No</label><select id="pnt31" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['name']).' '.stripslashes($row['oname']).' '.stripslashes($row['lname']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	<div id="op2" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt32" class="bh-visually-hidden">Text field</label><select id="pnt32" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by pntno");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['pntno']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op3" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt33" class="bh-visually-hidden">Text field</label><select id="pnt33" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by gname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['gname']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op4" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt34" class="bh-visually-hidden">Text field</label><select id="pnt34" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by contact");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['contact']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	<div id="op5" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt35" class="bh-visually-hidden">Text field</label><select id="pnt35" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by opno asc");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['opno']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	<div class="cleaner_h5"></div>';
	break;
	
	case 76:
	echo'<a class="labels" style="margin-left:10px; font-weight:bold">Search By:</a>
		<label for="menusearch" class="bh-visually-hidden">Search By:</label><select class="input_field" id="menusearch" style="float:right; margin-right:10px">
		<option value="1" onclick="menuop(1)">Patient Name</option>
		<option value="2" onclick="menuop(2)">Patient No</option>
		<option value="3" onclick="menuop(3)">Next of Kin</option>
		<option value="4" onclick="menuop(4)">Phone No</option>
		<option value="5" onclick="menuop(5)">O/P No</option>
		
		</select>
		<div class="cleaner_h5"></div>
	<div id="op1">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt31" class="bh-visually-hidden">O/P No</label><select id="pnt31" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['name']).' '.stripslashes($row['oname']).' '.stripslashes($row['lname']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	<div id="op2" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt32" class="bh-visually-hidden">Text field</label><select id="pnt32" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by pntno");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['pntno']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op3" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt33" class="bh-visually-hidden">Text field</label><select id="pnt33" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by gname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['gname']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op4" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt34" class="bh-visually-hidden">Text field</label><select id="pnt34" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by contact");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['contact']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	<div id="op5" style="display:none">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="pnt35" class="bh-visually-hidden">Text field</label><select id="pnt35" class="pnt3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from patients where status=1 order by opno asc");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pntno=stripslashes($row['pntno']);
								echo'<option value="'.$pntno.'">'.stripslashes($row['opno']).'</option>';
							}
		echo'
			</select>
		</div>
	</div>';
	break;

		case 77:
@mysqli_query($db, "CALL GetUserLogs('".$username." accesses Inpatient Management-Doctor Module Panel From-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");

							$pid=trim(mysqli_real_escape_string($db,$_GET['pid']));

							#$pid=$_GET['pid'];
							
							$resulta =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
							$rowa=$rown=mysqli_fetch_array($resulta);
							$pntno=stripslashes($rowa['PatId']);
							$acctype=stripslashes($rowa['BillinType']);
							$typeclinics=stripslashes($rowa['TypeClinics']);
							$in_insurer_id=stripslashes($rowa['insid']);
							$old_in_presc_id=stripslashes($rowa['Id']);
						    $old_in_presc_no=stripslashes($rowa['PrescId']);
							$old_in_patient_id=stripslashes($rowa['old_in_patient_id']);
							$result =mysqli_query($db, "select * from patients where auto='".$old_in_patient_id."'");
							$row=$rowp=mysqli_fetch_array($result);
							$oname=stripslashes($row['fullnames']);
							$regn=stripslashes($row['pntno']);
						    $old_patient_id=stripslashes($row['auto']);

						    $paciente=pacienteRegistryDetails($db,$old_patient_id);
						    $otherdetail=otherIPDpacienteDetails($db,$pid); #$otherdetail['tw1']
							
							$resultb =mysqli_query($db, "select * from admdetails where pid='".$pid."'");
							$rowb=mysqli_fetch_array($resultb);
								
							echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">INPATIENT [DOCTOR MODULE]-'.stripslashes($rowa['PatName']).'-'.stripslashes($rowa['PatId']).'-'.$pid.'</h2>';
		
		echo'<div id="" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>';
							echo'<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
								echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savedocin('".$pid."')\"/></div>";
									
		echo"<img alt=\"Print Patient Report\" src=\"images/print.png\" width=\"30\" height=\"30\" style=\"float:right; margin:0px 10px 0 10px; cursor:pointer\" onclick=\"window.open('report.php?id=4.1&rcptno=".$pid."')\" title=\"Print Patient Report\">";
				
						echo'<script>
						$(function(){
						area8 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance("diagnosis");
						});
						</script>';

								echo'
			<div id="tabs" style="width:1000px; height:435px; float:left; margin:0px 0 0 0px">
			<ul>
				<li><a href="#tabs-1">Admission Details</a></li>
				<li><a href="#tabs-10">Previous History</a></li>
				<li><a href="#tabs-2">Admission Notes</a></li>
				<li><a href="#tabs-6">Patient File</a></li>
				<li><a href="#tabs-9">Patient Interim Bill</a></li>
				<li><a href="#tabs-3">Progress Notes</a></li>
				<li style="display:none;"><a href="#tabs-8" style="display:none;">Diagnosis</a></li>
				<li><a href="#tabs_phc_diagnosis_ipd">Diagnosis</a></li>
				<li><a href="#tabs-4">Pharmacy</a></li>
				<li><a href="#tabs-5">Laboratory</a></li>
				<li><a href="#tabs-7">Radiology</a></li>
				<li style="display:none;"><a href="#tabs-20">Settings</a></li>
			</ul>
			<div id="tabs-1">
				 <a class="labels" style="float:left">Pat No:</a>
       <label for="patid" class="bh-visually-hidden">Patid</label><input type="text" id="patid" name="patid"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.makesafe(stripslashes($row['pntno'])).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Pat Name:</a>
      <label for="patname" class="bh-visually-hidden">Patname</label><input type="text" id="patname" name="patname"   style="float:left;margin-left:10px;width:250px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.makesafe(stripslashes($row['fullnames'])).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Ward:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['WardType']).'" disabled="disabled"/> 
		<a class="labels" style="float:left; margin-left:10px">Address:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname" style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($row['address']).'" disabled="disabled"/> 
		<div class="cleaner_h5"></div>
		<a class="labels" style="float:left">Age:</a>
		<label for="tdate" class="bh-visually-hidden">Age:</label><input type="text" style="display:none" id="tdate" value="'.date('Y').'">
						 <label for="age" class="bh-visually-hidden">Age</label><input type="text" id="age" name="age" disabled="disabled" class="in_field"  style="float:left;margin-left:10px;border-color:var(--color-danger, #DC2626)"/> 
						 <input type="hidden" id="dob" value="'.stripslashes($row['dob']).'"/>';
						 echo"<script>calcage('".stripslashes($row['dob'])."')</script>";
      
	echo'<a class="labels" style="float:left; margin-left:10px">Sex:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.$paciente['in_patient_gender'].'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Contact:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:100px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.$paciente['in_patient_contact'].'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Doctor:</a>
      <label for="temp" class="bh-visually-hidden">Oname</label><input type="text" id="temp" name="oname"   style="float:left;margin-left:10px;width:130px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['Doctor']).'" disabled="disabled"/> 
	<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
      <label for="bednu" class="bh-visually-hidden">Oname</label><input type="text" id="bednu" name="oname"   style="float:left;margin-left:10px;width:50px;border-color:var(--color-danger, #DC2626)" class="in_field" value="'.stripslashes($rowa['BedNo']).'" disabled="disabled"/> 
      <input type="hidden" id="txtacctype" disabled="disabled" name="oname" style="width:40px;border-color:var(--color-danger, #DC2626);display:none;" value="'.$acctype.'"/><input type="hidden" id="typeclinics" disabled="disabled" name="oname" style="width:40px;border-color:var(--color-danger, #DC2626);display:none;" value="'.$typeclinics.'"/><input type="hidden" id="old_patient_id" disabled="disabled" style="width:40px;border-color:var(--color-danger, #DC2626);display:none;" value="'.makesafe($old_in_patient_id).'"/><input type="hidden" id="old_presc_id" disabled="disabled" style="width:40px;border-color:var(--color-danger, #DC2626);display:none;" value="'.makesafe($old_in_presc_id).'"/>	
				<input type="hidden" disabled="disabled" id="enc_pres_id" name="enc_pres_id" value="'.safe_encode(makesafe($old_in_presc_id)).'" style="display:none;"/>
				<input type="hidden" disabled="disabled" id="enc_pres_no" name="enc_pres_no" value="'.safe_encode(makesafe($old_in_presc_no)).'" style="width:20px;display:none;"/>
				<input type="hidden" disabled="disabled" id="enc_cust_id" name="enc_cust_id" value="'.safe_encode(makesafe($old_in_patient_id)).'" style="width:20px;display:none;"/>
				<input type="hidden" disabled="disabled" id="enc_cust_no" name="enc_cust_no" value="'.safe_encode(makesafe($regn)).'" style="width:40px;display:none;"/>

      <input type="hidden" id="datepick" class="input_field" value="'.date('Y/m/d').'" style="width:70px; margin-left:0px;"/>
	<div class="cleaner_h5"></div>
	<a class="labels" style="float:left">Transferred To:</a>
		<label for="tw1" class="bh-visually-hidden">Oname</label><input type="text" id="tw1" name="oname"   style="float:left;margin-left:10px;width:150px;" class="in_field" value="'.stripslashes($rowb['tw1']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
      <label for="tb1" class="bh-visually-hidden">Oname</label><input type="text" id="tb1" name="oname"   style="float:left;margin-left:10px;width:80px" class="in_field" value="'.stripslashes($rowb['tb1']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Date:</a>
      <label for="td1" class="bh-visually-hidden">Oname</label><input type="text" id="td1" name="oname"   style="float:left;margin-left:10px;width:110px;" class="in_field" value="'.stripslashes($rowb['td1']).'"/> 
		<div class="cleaner_h5"></div>
		<a class="labels" style="float:left; ">Transferred To:</a>
		<label for="tw2" class="bh-visually-hidden">Oname</label><input type="text" id="tw2" name="oname"   style="float:left;margin-left:10px;width:150px;" class="in_field" value="'.stripslashes($rowb['tw2']).'"/> 
		<a class="labels" style="float:left; margin-left:10px">Bed No:</a>
      <label for="tb2" class="bh-visually-hidden">Oname</label><input type="text" id="tb2" name="oname"   style="float:left;margin-left:10px;width:80px" class="in_field" value="'.stripslashes($rowb['tb2']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Date:</a>
      <label for="td2" class="bh-visually-hidden">Oname</label><input type="text" id="td2" name="oname"   style="float:left;margin-left:10px;width:110px;" class="in_field" value="'.stripslashes($rowb['td2']).'"/> 
	<div class="cleaner_h5"></div>
	
	<a class="labels" style="float:left; ">Physician:</a>
		<label for="phy" class="bh-visually-hidden">Oname</label><input type="text" id="phy" name="oname"   style="float:left;margin-left:10px;width:130px;" class="in_field" value="'.stripslashes($rowb['physician']).'"/> 
		<a class="labels" style="float:left; margin-left:10px">Surgeon:</a>
      <label for="sur" class="bh-visually-hidden">Oname</label><input type="text" id="sur" name="oname"   style="float:left;margin-left:10px;width:130px" class="in_field" value="'.stripslashes($rowb['surgeon']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Anaesthetist:</a>
      <label for="anae" class="bh-visually-hidden">Oname</label><input type="text" id="anae" name="oname"   style="float:left;margin-left:10px;width:130px;" class="in_field" value="'.stripslashes($rowb['anaesthetist']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Paeditrician:</a>
      <label for="paed" class="bh-visually-hidden">Oname</label><input type="text" id="paed" name="oname"   style="float:left;margin-left:10px;width:130px;" class="in_field" value="'.stripslashes($rowb['paeditrician']).'"/> 
	<div class="cleaner_h5"></div>
	
	
	<a class="labels" style="float:left;">Previous:</a>
      <label for="previous" class="bh-visually-hidden">Oname</label><input type="text" id="previous" name="oname"   style="float:left;margin-left:10px;width:280px" class="in_field" value="'.stripslashes($rowb['previous']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Current:</a>
      <label for="current" class="bh-visually-hidden">Oname</label><input type="text" id="current" name="oname"   style="float:left;margin-left:10px;width:280px" class="in_field" value="'.stripslashes($rowb['current']).'"/> 
	<div class="cleaner_h5"></div>
	<a class="labels" style="float:left">Height:</a>
		<label for="height" class="bh-visually-hidden">Oname</label><input type="text" id="height" name="oname"   style="float:left;margin-left:10px;width:50px;" class="in_field" value="'.stripslashes($rowb['height']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">Weight:</a>
      <label for="weight" class="bh-visually-hidden">Oname</label><input type="text" id="weight" name="oname"   style="float:left;margin-left:0px;width:50px" class="in_field" value="'.stripslashes($rowb['weight']).'"/> 
	<a class="labels" style="float:left; margin-left:10px">BMI:</a>
      <label for="bmi" class="bh-visually-hidden">Oname</label><input type="text" id="bmi" name="oname"   style="float:left;margin-left:10px;width:70px;1 border-color:var(--color-danger, #DC2626)" disabled class="in_field" value="'.stripslashes($rowb['bmi']).'"/> 
		<a class="labels" style="float:left; margin-left:10px">STEROID THERAPY:</a>';
		 if(stripslashes($rowb['steroid'])=='yes'){
									 echo'<label for="maleGender" class="bh-visually-hidden">Steroid</label><input style="float:left; margin-top:8px""  id="maleGender" name="steroid" type="radio" value="yes" class="radio" checked="checked"><a class="labels" style="float:left;">YES.</a>
								<label for="femaleGender" class="bh-visually-hidden">Steroid</label><input  style="float:left; margin-top:8px"  id="femaleGender" name="steroid" type="radio" value="no" class="radio"><a class="labels" style="float:left;">NO.</a>'; 
								 }
							 else{
                                echo'<label for="maleGender" class="bh-visually-hidden">Steroid</label><input  style="float:left; margin-top:8px"  id="maleGender" name="steroid" type="radio" value="yes" class="radio"><a class="labels" style="float:left;">YES.</a>
								<label for="femaleGender" class="bh-visually-hidden">Steroid</label><input  style="float:left; margin-top:8px"  id="femaleGender" name="steroid" type="radio" value="no" class="radio"  checked="checked"><a class="labels" style="float:left;">NO.</a>';}							
		echo'<a class="labels" style="float:left;margin-left:10px;">Date:</a>
		<label for="steroidate" class="bh-visually-hidden">Oname</label><input type="text" id="steroidate" name="oname"   style="float:left;margin-left:10px;width:90px;" class="in_field" value="'.stripslashes($rowb['steroidate']).'"/> 
	<div id="save1" style="float:right; width:30px; height:30px;"><img alt="Back" src="images/back.jpg" style="float:right; width:30px; height:30px; cursor:pointer" onclick="savein1(\''.$pid.'\')"/></div>					
	<div class="cleaner"></div>';
echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none;">
			<label for="txtextmedicinc" class="bh-visually-hidden">Text field</label><select id="txtextmedicinc">';
			echo'<option value="38">HOSPITAL</option>';
			echo"<script>$('#txtextmedicinc').parent().find('input:first').width(100);</script>";
		echo'</select>
	</div>';




				echo'</div>';
				 echo'<div id="tabs-2" style="height:350px;verflow-y:auto ">';
	echo"<div id=\"savey\" style=\"float:right; width:30px; height:30px;\"><img alt=\"Save Admission Notes\" src=\"images/back.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:-3px 0px 0 0px; float:right\" title=\"Save Admission Notes\"onclick=\"saveadmnotes('".$pid."')\"/></div>";
	echo'<script>area12 = new nicEditor({fullPanel : true,maxHeight :360}).panelInstance("docnotes");</script>
	<label for="docnotes" class="bh-visually-hidden">Text field</label><textarea id="docnotes" style="float:right;height:350px; width:930px" class="alergy"></textarea>
	
				
					</div>
								
				<div id="tabs-3" style="overflow-y:auto;height:375px;">';
	echo"<div id=\"savez\" style=\"float:right; width:30px; height:30px;\"><img alt=\"Save Progress Notes\" src=\"images/back.jpg\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin:-3px 0px 0 0px; float:right\" title=\"Save Progress Notes\"onclick=\"saveprognotes('".$pid."')\"/></div>";
	echo'<script>area20 = new nicEditor({fullPanel : true,maxHeight : 360}).panelInstance("prognotes");</script>
	<label for="prognotes" class="bh-visually-hidden">Text field</label><textarea id="prognotes"  style="float:left;height:350px; width:930px" class="alergy"></textarea>

				</div>
				<div id="tabs-4" style="overflow-y:auto;height:400px;padding:0 5px 5px 15px;">';
		if(isset($_SESSION['pharmcart'])){
							unset($_SESSION['pharmcart']);
						}
			echo"<script>$('#labt').parent().find('input:first').width(300);
						$('#dr1').parent().find('input:first').width(180);
						$('.dr').parent().find('input:first').width(75);
						$('#docInpPharm1').parent().find('input:first').width(180);
						area10 = new nicEditor({fullPanel : true,maxHeight :256}).panelInstance('prescription');
						</script>";
						
	echo'<a class="labels">Drug Name</a><a class="labels" style="margin-left:210px">Dosage</a>	
	<a class="labels" style="margin-left:100px">Route</a><a class="labels" style="margin-left:90px">Frequency</a>		
	<a class="labels" style="margin-left:100px">Duration</a><a class="labels" style="margin-left:80px">Qty</a>
	<div class="cleaner"></div>		
	<div class="ui-widget" style="margin-left:0px; float:left;" >
		<label for="docInpPharm1" class="bh-visually-hidden">Qty</label><select class="drugname" id="docInpPharm1" style="width:260px; margin-left:0px;">
		<option value="">Select one...</option>';
		$resultb =mysqli_query($db, "select * from items where PHARMACY>0 and SalePrice>0 and CorporatePrice>0 and InsurancePrice>0 and ApaPrice>0 and PacisPrice>0 and LiasonPrice>0 and OldMutualPrice>0 and KplcMinetPrice>0 and MaklMaternityPrice>0 and MinetCivilServantsPrice>0 and Category='PHARMACEUTICALS' order by ItemName");	
		#$resultb =mysqli_query($db, "select * from items where PHARMACY>0 and SalePrice>0 and CorporatePrice>0 and InsurancePrice>0 and Type='GOOD' and Category='PHARMACEUTICALS' order by ItemName");
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
								echo"<option value=\"".$code."ÃÂÃÂ¸".$item."ÃÂÃÂ¸".$sprice."ÃÂÃÂ¸".$cpr."ÃÂÃÂ¸".$ppr."ÃÂÃÂ¸".$categ."ÃÂÃÂ¸".$type."ÃÂÃÂ¸".$bal."ÃÂÃÂ¸".$catid."ÃÂÃÂ¸".$coun."ÃÂÃÂ¸".$otcpr."ÃÂÃÂ¸".$apapr."ÃÂÃÂ¸".$pacis."ÃÂÃÂ¸".$liason."ÃÂÃÂ¸".$mutual."ÃÂÃÂ¸".$kplcmin."ÃÂÃÂ¸".$maklmat."ÃÂÃÂ¸".$minetcs."\">".stripslashes($rowb['ItemName'])." -Bal: ".stripslashes($rowb['PHARMACY'])."</option>";
							}
							
								echo'</select>
								</div>
	<input type="hidden" disabled="disabled" id="txtproductcode" class="input_field" style="display:;width:20px; margin-left:5px;display:none;"/>
	<input type="hidden" disabled="disabled" id="dname" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="dbal" style="display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprnormal" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprinsurance" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="price254" class="input_field" style="width:70px; margin-left:10px;border-color:var(--color-danger, #DC2626);display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhcateg" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid" name="txtcatid" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtype" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="lcmhtprice" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtdisc"  class="input_field" value="0" style="width:60px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="lcmhsub44" class="input_field" style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>	
	<input type="hidden" disabled="disabled" id="lcmhtotal44" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>


	<label for="dr9" class="bh-visually-hidden">Text field</label><input type="text" id="dr9" class="in_field" value="" style="width:30px; float:left; margin-left:50px"/> 
		
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
		
		</select>
		</div>
		
		<div class="ui-widget" style="margin-left:35px; float:left;" >
		<label for="dr6" class="bh-visually-hidden">Patch</label><select class="dr" id="dr6">
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
		
		
		<div class="ui-widget" style="margin-left:35px; float:left;" >
		<label for="dr5" class="bh-visually-hidden">Inhalation</label><select class="dr" id="dr5">
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
		
		
		
		<label for="dr7" class="bh-visually-hidden">Oname</label><input type="text" id="dr7" name="oname" class="in_field" value="" style="width:30px; float:left; margin-left:50px"/> 
		
		<div class="ui-widget" style="margin-left:2px; float:left;" >
		<label for="dr8" class="bh-visually-hidden">Thrice Weekly</label><select class="dr" id="dr8">
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
		
		<label for="quat4dr34" class="bh-visually-hidden">This is the actual quantity that is billed.</label><input type="text" id="quat4dr34" name="oname" class="in_field" maxlength="2" value="1" style="width:30px; float:left; margin-left:30px" title="This is the actual quantity that is billed."/>';
		
echo'<img alt="Document Add" src="images/document_add.png" style="margin-left:10px; width:30px; height:30px;float:left; cursor:pointer" onclick="addthispresc()"/>';
echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-left:5px; float:left\" title=\"View Current Cart\" onclick=\"viewpharmcartIPDbill('nurse')\"/>";										
	echo'<div class="cleaner_h5"></div>
	<div style="width:420px; float:left;padding:1px;">';
	echo'<label for="prescription" class="bh-visually-hidden">Text field</label><textarea id="prescription" style="float:right;height:256px; width:400px" class="alergy">';
 	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
	$num_resultsb = mysqli_num_rows($resultb);	
	$xa=1;	
	for ($i=0; $i <$num_resultsb; $i++) {
		$rowb=mysqli_fetch_array($resultb);		
		$pharmitems=stripslashes($rowb['itname']);
		echo ''.$xa.'. '.stripslashes($rowb['prescription']).'<br>';
		$xa++;
	}
	echo'</textarea>';
	// echo'<div class="cleaner"></div>';
echo'</div>';

	echo'<div style="width:530px; float:left;padding:1px;">';
		echo'<div id="tabs4" style="height:298px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Prescription Summary.</a></li>';
					echo'<li><a href="#tabs-2">Invoice Items.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
						 	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id");
							$num_resultsb = mysqli_num_rows($resultb);	
							$xa=1;	
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);		
								$pharmitems=stripslashes($rowb['itname']);
								echo ''.$xa.'. '.stripslashes($rowb['prescription']).'<br>';
								$xa++;
							}
				echo'</div>';
				echo'<div id="tabs-2" style="padding:0;">'; 
			 		echo'<div id="displayinv" style="width:600px;background-color:#;">';
			 		echo'</div>';

							// echo'<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">';
							// 	echo"<input type=\"button\" value=\"Save\" id=\"submit\"  style=\"padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px\" class=\"in_field\" onclick=\"savedocin('".$pid."')\"/></div>";


				echo'</div>';

		echo'</div>';
   echo'</div>';

echo'<div class="cleaner"></div>';
echo'<div id="send_n_print_prescription" style="height:30px;">';#background-color:#123;
	echo'<div class="cleaner"></div>';
	echo'<label for="recpharm" class="bh-visually-hidden">Recpharm</label><input type="checkbox" value="1" name="recpharm" id="recpharm" style="float:left;margin:8px 0 0 0px">
	<a class="labels" style="margin-left:10px"><b>Send Prescription to Pharmacy On Save</b></a>';
	echo'<input aria-label="Printrec" type="checkbox" value="1" name="printrec" style="float:left;margin:8px 3px 0 8px;"><a class="labels">Print Precription on Save</a>';
echo'</div>';



echo'</div>
<div id="tabs-6" style="overflow-y:auto;height:375px;">

<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">ADMISSION DETAILS ['.stripslashes($rown['AdmDate']).']</a>
	<div class="cleaner_h5"></div>
	<a class="labels">'.stripslashes($rown['AdmNotes']).'</a>
	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">PROGRESS NOTES</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from progress where pid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> '.stripslashes($row['notes']).'</a><div class="cleaner_h5"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">CADEX</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from cadex where pid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> '.stripslashes($row['notes']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">PHARMACY PRESCRIPTIONS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> '.stripslashes($row['prescription']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>PRESCRIBED BY:</b> '.stripslashes($row['requested']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">LABORATORY REQUESTS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from labrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> 
								<b>REQUEST:</b><BR/>'.stripslashes($row['request']).'</a><div class="cleaner_h5"></div>
								<b>RESULTS:</b><BR/>'.stripslashes($row['results']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>REQUESTED BY:</b> '.stripslashes($row['requested']).'</a><br/><div class="cleaner"></div>
								<a class="labels"><b>DONE BY:</b> '.stripslashes($row['doneby']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">RADIOLOGY REQUESTS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from radrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> 
								<b>REQUEST:</b><BR/>'.stripslashes($row['request']).'</a><div class="cleaner_h5"></div>
								<b>RESULTS:</b><BR/>'.stripslashes($row['results']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>REQUESTED BY:</b> '.stripslashes($row['requested']).'</a><br/><div class="cleaner"></div>
								<a class="labels"><b>DONE BY:</b> '.stripslashes($row['doneby']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">THEATRE REQUESTS</a>
	<div class="cleaner_h5"></div>';
	$resulta =mysqli_query($db, "select * from theatrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='IPD'");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$row=mysqli_fetch_array($resulta);
								echo '<a class="labels"><b>['.stripslashes($row['date']).'</b>] <br/> 
								<b>REQUEST:</b><BR/>'.stripslashes($row['procedures']).'</a><div class="cleaner_h5"></div>
								<b>RESULTS:</b><BR/>'.stripslashes($row['notes']).'</a><div class="cleaner_h5"></div>
								<a class="labels"><b>REQUESTED BY:</b> '.stripslashes($row['requested']).'</a><br/><div class="cleaner"></div>
								<a class="labels"><b>DONE BY:</b> '.stripslashes($row['doneby']).'</a><div class="cleaner_h5" style="border-top:1.5px dashed #333"></div>';
						}
	
	echo'


	<div class="cleaner_h5"></div>

		<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">PRESCRIPTION ADMINISTRATION CHART</a>
	<div class="cleaner_h5"></div>';

	$result = mysqli_query($db, "SELECT * FROM  drugrecord where pid='".$pid."' and status=1 order by stamp asc");
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									
									echo'
									<div class="cleaner_h5"></div>
									<div id="inside" style=" border-bottom:0; margin-left:0px">
									<div id="title"">
											<div id="figure1" style="width:80px">Date.</div>
											<div id="figure1" style="width:120px">Drugs</div>
											<div id="figure1" style="width:50px">Dose</div>
											<div id="figure1" style="width:50px">Route</div>
											<div id="figure1" style="width:100px">Notes</div>
											<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
											<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">AM</strong></div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">1</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">12</div>
											</div>
									
											<div style="width:240px;padding:0; margin:0; height:25px; float:left; border-right:1px solid #fff">
											<div style="width:240px; height:12px;padding:0; margin:0;float:left"><strong style="float:left; margin-left:45px; color:#fff">PM</strong></div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;border-left:0 ;color:#fff; text-align:center">1</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">2</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">3</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">4</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0 ;color:#fff; text-align:center">5</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">6</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">7</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">8</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0 ; color:#fff; text-align:center">9</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff; border-right:0; color:#fff; text-align:center">10</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:0;  color:#fff; text-align:center">11</div>
											<div style="width:19px; height:12px;padding:0; margin:0;float:left; border:1px solid #fff;border-right:1px solid #000;color:#fff; text-align:center">12</div>	
											</div>			
											
											
											</div>

											</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										if($i%2==0){
	echo'<div style="width:auto; height:20px; border-bottom:0px solid #333;" id="normal'.$i.'" class="normal">';
	}else{
		echo'<div style="width:auto; height:20px;background:#fff;border-bottom:0px solid #333;"  id="normal'.$i.'" class="normal">';
	}
									
									echo'<div class="figure2x" style="width:85px;padding:2px 2px;font-size:10px">'.stripslashes($row['date']).'</div>
										<div class="figure2x" style="width:125px;padding:2px 2px;font-size:10px">'.stripslashes($row['drugs']).'</div>
										<div class="figure2x" style="width:55px;padding:2px 2px;font-size:10px">'.stripslashes($row['dose']).'</div>
										<div class="figure2x" style="width:55px;padding:2px 2px;font-size:10px">'.stripslashes($row['route']).'</div>
										<div class="figure2x" style="width:115px;padding:2px 2px;font-size:10px">'.stripslashes($row['notes']).'</div>';
									
										
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7am'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8am'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11am'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12am'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['1pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['2pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['3pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['4pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['5pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['6pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
	echo'<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" style="float:left" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['7pm'])==1){echo'checked="checked"';} echo'/></div>
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled" value="1"'; if(stripslashes($row['8pm'])==1){echo'checked="checked"';} echo'/></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['9pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['10pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1" '; if(stripslashes($row['11pm'])==1){echo'checked="checked"';} echo' /></div>	
	<div class="figure2x" style="width:16px;padding:2.5px 3px 2.5px 0px;"><input aria-label="1" type="checkbox" disabled="disabled"  value="1"'; if(stripslashes($row['12pm'])==1){echo'checked="checked"';} echo' /></div>	';	
	
				
				
								echo"</div><div class=\"cleaner\"></div>";
										
										}
									}

	
echo'		<div class="cleaner_h10"></div>
<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">VITALS ENTRIES</a>
	<div class="cleaner_h5"></div>';
		$result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."'");
									$num_results = mysqli_num_rows($result);
									echo'
									
									<div id="inside" style="min-height:110px;">
									<div id="title">
									<div id="figure1" style="width:120px">Date-Time</div>
									<div id="figure1" style="width:80px">Temp</div>
									<div id="figure1" style="width:80px">Bp</div>
									<div id="figure1" style="width:80px">Weight</div>
									<div id="figure1" style="width:80px">Pulse</div>
									<div id="figure1" style="width:80px">Breath</div>
									<div id="figure1" style="width:80px">RBS</div>
									</div>';
									
										
										
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										echo"
										<div id=\"normal13".$code."\" class=\"normal\">";
										echo'<div class="figure2x" style="width:125px;padding:3px 2px"><input aria-label="RBS" disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['datetime']).'" style="background:#fff;width:120px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><input aria-label="Text field" disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['temp']).'"  style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><input aria-label="Text field"  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['bp1']).'/'.stripslashes($row['bp2']).'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><input aria-label="Text field" disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['weight']).'" style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px"><input aria-label="Text field"  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['pulse']).'"  style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:85px;padding:3px 2px;"><input aria-label="Text field"  disabled="disabled" type="text" class="put_field" value="'.stripslashes($row['breath']).'"  style="background:#fff;width:80px; font-size:10px"/></div>
										<div class="figure2x" style="width:98px;padding:3px 2px;"><input aria-label="Text field" disabled="disabled"  disabled="disabled"  type="text" class="put_field" value="'.stripslashes($row['random']).'"  style="background:#fff;width:90px; font-size:10px"/></div>';
										echo"</div><div class=\"cleaner\"></div>";
										}	
										
									
										
						echo'</div>
<div class="cleaner_h5"></div>

	<a class="labels" style="margin-left:0px;font-size:16px;font-weight:bold; text-align:center;text-decoration:underline">VITALS CHARTS</a>
	<div class="cleaner_h5"></div>';
					$result = mysqli_query($db, "SELECT * FROM  vitals where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' order by id desc limit 0,7");
					$num_results = mysqli_num_rows($result);
					if($num_results>0){

					for ($i=0; $i <$num_results; $i++) {
					$row2=mysqli_fetch_array($result);
					$arr1[]='"'.stripslashes($row2['datetime']).'"';
					$arr2[]=stripslashes($row2['temp']);
					$arr3[]=stripslashes($row2['bp1']);
					$arr4[]=stripslashes($row2['bp2']);
					$arr5[]=stripslashes($row2['pulse']);
					$arr6[]=stripslashes($row2['breath']);
					$arr7[]=stripslashes($row2['weight']);
					$arr8[]=stripslashes($row2['random']);
					}
				$arr1=array_reverse($arr1);$arr2=array_reverse($arr2);$arr3=array_reverse($arr3);$arr4=array_reverse($arr4);$arr5=array_reverse($arr5);$arr6=array_reverse($arr6);$arr7=array_reverse($arr7);$arr8=array_reverse($arr8);
				$a=HA_implode($arr1,",");$b=HA_implode($arr2,",");$c=HA_implode($arr3,",");$d=HA_implode($arr4,",");$e=HA_implode($arr5,",");$f=HA_implode($arr6,",");$g=HA_implode($arr7,",");$h=HA_implode($arr8,",");
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Temparature Curve</p>";
	echo'<canvas id="line1" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#0369A1",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$b.']
				}
			]
			
		}

	new Chart(document.getElementById("line1").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Blood Pressure Chart</p>";
	echo'<canvas id="bar" height="200" width="950"></canvas>
	
<script>

		var barChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#46bfbd",
					strokeColor : "#ccc",
					data : ['.$c.']
				},
				
				{
					fillColor : "#DC2626",
					strokeColor : "#ccc",
					data : ['.$d.']
				}
			]
			
		}

	new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
	
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Pulse Rate Curve</p>";
	echo'
	<canvas id="line2" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#fdb45c",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$e.']
				}
			]
			
		}

	new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Respiratory Rate Curve</p>";
	echo'
	<canvas id="line3" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#666",
					strokeColor : "#333",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$f.']
				}
			]
			
		}

	new Chart(document.getElementById("line3").getContext("2d")).Line(lineChartData);
	</script>
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Weight Curve</p>";
	echo'
	<canvas id="line4" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#10504F",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$g.']
				}
			]
			
		}

	new Chart(document.getElementById("line4").getContext("2d")).Line(lineChartData);
	</script>
	
	<div class="cleaner_h10"></div>
	';
	echo"<p style=\"margin-top:0px; margin-left:20px;font-size:11px;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;\">Random Blood Sugars Curve</p>";
	echo'
	<canvas id="line5" height="200" width="950"></canvas>
	
<script>

		var lineChartData = {
			labels : ['.$a.'],
			datasets : [
				{
					fillColor : "#ff3",
					strokeColor : "#666",
					pointColor : "#fff",
					pointStrokeColor : "#000",
					data : ['.$h.']
				}
			]
			
		}

	new Chart(document.getElementById("line5").getContext("2d")).Line(lineChartData);
	</script>';
}
	
	echo'<div class="cleaner_h5"></div>


	</div>
				<div id="tabs-10">

		<div class="cleaner_h5"></div>
		 <div style="height:360px; overflow-y:auto; border:0px solid #ccc;width:100%;padding:2px">';


		 	 $result =mysqli_query($db, "select * from newprescription where PatId='".$pntno."' and PrescId!='".$pid."' ");
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
				     	$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$opid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='IPD' order by id");
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
   				
   				$result =mysqli_query($db, "select * from inpatients where  PatId='".$pntno."' and PrescId!='".$pid."'");
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

			<table id="datatable-2"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;padding:0; " >
			<tbody>';

					for ($i=0; $i <$num_results; $i++) {
					$row=mysqli_fetch_array($result);
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
	<label for="orderitem44" class="bh-visually-hidden">Lab Test:</label><select id="orderitem44">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from items where SalePrice>0 and CorporatePrice>0 and InsurancePrice>0 and ApaPrice>0 and PacisPrice>0 and LiasonPrice>0 and OldMutualPrice>0 and KplcMinetPrice>0 and MaklMaternityPrice>0 and MinetCivilServantsPrice>0 and Category='LABORATORY' order by ItemName");	
		#$resulta =mysqli_query($db, "select * from items  where Category='Laboratory' and SalePrice>0 order by ItemName");
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
<input type="hidden" disabled="disabled" id="quat44" class="input_field"  style="width:40px; margin-left:10px;display:none;" value="1"/>
<input type="hidden" disabled="disabled" id="price44" class="input_field"  style="width:70px; margin-left:10px;display:none;"/>
<input type="hidden" disabled="disabled" id="red" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
<input type="hidden" disabled="disabled" id="categ" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
<input type="hidden" disabled="disabled" id="code" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
<input type="hidden" disabled="disabled" id="txtcatid44" name="txtcatid44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
<input type="hidden" disabled="disabled" id="txtsec44" name="txtsec44" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
<input type="hidden" disabled="disabled" id="txtprcorporate44" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
<input type="hidden" disabled="disabled" id="txtprinsurance44" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';

				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addbill2('lab',0)\"/>";
				echo '<label for="disc44" class="bh-visually-hidden">Text field</label><input type="text" id="disc44"  class="input_field"  value="0" style="width:60px; margin-left:10px;display:none"/>';
				echo'<input type="hidden" disabled="disabled" id="old_patient_id" name="old_patient_id" value="'.$old_in_patient_id.'" style="width:20px;display:none;"/>';
				echo'<input type="hidden" disabled="disabled" id="old_presc_id" name="old_presc_id" value="'.$old_in_presc_id.'" style="display:none;"/>';
				echo'<input type="hidden" disabled="disabled" id="old_presc_no" name="old_presc_no" value="'.$pid.'" style="width:20px;display:none;"/>';
				echo'<input type="hidden" disabled="disabled" id="regn" name="regn" value="'.$regn.'" style="width:40px;display:none;"/>';
				echo'<input type="hidden" disabled="disabled" id="oname" value="'.$oname.'" style="width:40px;display:none;"/>';
				echo'<input type="hidden" disabled="disabled" id="patid" value="'.$regn.'" style="width:40px;display:none;"/>';
				echo'<input type="hidden" disabled="disabled" id="patname" value="'.$oname.'" style="width:40px;display:none;"/>';
				#echo'<input type="hidden" disabled="disabled" id="in_consult_dept" value="'.$dept.'" style="width:20px;display:none;"/>';
					

						
			echo'<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
				<label for="income44" class="bh-visually-hidden">Text field</label><select id="income44">';
				echo'<option value="38">HOSPITAL</option>';
				echo"<script>$('#income44').parent().find('input:first').width(100);</script>";
			echo'</select></div>';
	echo'<div id="itemsdisp" style="height:270px; width:366px; background:#fff; margin-right:5px; padding-left:10px; border-radius:0px">
			<h5>LAB TESTS</h5>
			<div id="display" style="margin-top:0px; height:250px;">
			
			</div>
		</div>	
		<input aria-label="Printlab" type="checkbox" value="1" name="printlab" style="float:left;margin:50px 3px 10px 0px;"><a class="labels" style="margin:50px 3px 10px 0px;">Print Laboratory Test on Save</a>

</div>
	

		<div style="float:left; padding-left:10px">';
		echo'<h5>Lab Requests Summary</h5>';

	echo'<div style="height:340px; overflow-y:auto; border:1px solid #ccc;width:520px;padding:2px">';
		echo'<div id="labtabs8" style="height:340px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Results.</a></li>';
					echo'<li><a href="#tabs-2">Edit Requests.</a></li>';
					echo'<li><a href="#tabs-3">Presc.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 #echo'<div style="width:430px; float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
					 		$resultb =mysqli_query($db, "select * from labrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='IPD' order by Id");
							$lab_phc_diagnosis_num_rows = mysqli_num_rows($resultb);
							for ($i=0; $i <$lab_phc_diagnosis_num_rows; $i++) {
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
								echo'<input type="hidden" disabled="disabled" id="sub44" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none;"/>';
								echo'<input type="hidden" disabled="disabled" id="tprice" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none"/>';
								echo'<input type="hidden" disabled="disabled" id="total254" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
								echo'<input type="hidden" disabled="disabled" id="labftotal44" style="display:none;"/>';
								echo'<div class="cleaner"></div>';

					 #echo'</div>';
				echo'</div>';
				echo'<div id="tabs-2" style="margin:1px;">';

							echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:5px 10px 0 0\">
								<img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/>
								</div>";
							echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-right:5px; float:right\" title=\"View Current Cart\" onclick=\"viewmaabaraIPDBill('nurse')\"/>";
							echo'<div id="maabarainv" style="height:350px;margin-left:-85px;margin-top:0px; float:left;"></div>';


				echo'</div>';
				echo'<div id="tabs-3">';

				echo'</div>';


		echo'</div>';
   echo'</div>';



	echo'</div>
	</div>';
//end tabs 6


echo'<div id="tabs-7">';
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
		$resulta =mysqli_query($db, "select * from items where Category='Radiology' and SalePrice>0 order by ItemName");
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
								$bal = stripslashes($row[$userdep]);
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
		<input type="hidden" disabled="disabled" id="bal45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		<input type="hidden" disabled="disabled" id="type45" class="input_field"  style="display:none;width:20px; margin-left:5px;"/>
		</div>
	<input type="hidden" disabled="disabled" id="quat45" class="input_field" style="width:40px; margin-left:10px;display:none" value="1"/>
	<input type="hidden" disabled="disabled" id="price45" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="red45" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="categ45" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="code45" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtcatid45" name="txtcatid45" class="input_field" style="display:none;width:20px; margin-left:5px;"/>
	<input type="hidden" disabled="disabled" id="txtprcorporate45" class="input_field" style="width:70px; margin-left:10px;display:none;"/>
	<input type="hidden" disabled="disabled" id="txtprinsurance45" class="input_field" style="width:70px; margin-left:10px;display:none;"/>';

				echo"<img alt=\"Add Item\" src=\"images/plus.png\" width=\"40\" height=\"40\" style=\"cursor:pointer; margin:-5px 0 0 10px; float:left\" title=\"Add Item\" onclick=\"addbill3('rad',0)\"/>";
				echo'<label for="tprice45" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="tprice45" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none"/>';
				echo '<label for="disc45" class="bh-visually-hidden">Text field</label><input type="text" id="disc45"  class="input_field"  value="0" style="width:60px; margin-left:10px;display:none"/>
				<input type="hidden" id="regn" value="'.$regn.'"/><input type="hidden" id="oname" value="'.$oname.'"/>';
				echo'<label for="sub45" class="bh-visually-hidden">Text field</label><input type="text" disabled="disabled" id="sub45" class="input_field"  style="width:60px;border-color:var(--color-danger, #DC2626); margin-left:10px;display:none""/>		
			<div class="ui_widget"  style="margin-left:10px;float:left; width:100px;display:none">
			<label for="income45" class="bh-visually-hidden">Text field</label><select id="income45">';
			echo'<option value="38">HOSPITAL</option>';
			echo"<script>$('#income45').parent().find('input:first').width(100);</script>";
		echo'</select></div>
<label for="total45" class="bh-visually-hidden">HOSPITAL</label><input type="text" disabled="disabled" id="total45" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none""/>';
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
		echo'<div id="radtabs9" style="height:700px">';
		      echo'<ul>';
					echo'<li><a href="#tabs-1">Results.</a></li>';
					echo'<li><a href="#tabs-2">Edit Requests.</a></li>';
					echo'<li><a href="#tabs-3">Scan Images.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs-1">';
					 #echo'<div style="width:430px; float:left;padding:2px;height:230px; overflow-y:auto; border:1px solid #ccc;">';
			$resultb =mysqli_query($db, "select * from radrequests where prescid='".$pid."' AND old_in_presc_id='".$old_in_presc_id."' AND old_in_patient_id='".$old_in_patient_id."' AND deptfrom='IPD' order by id");
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
				echo'<div id="tabs-2">';

						   echo"<div id=\"backatt\" style=\"width:25px; height:25px; float:right;margin:5px 10px 0 0\"><img alt=\"Help\" src=\"images/h.png\" width=\"25\" height=\"25\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help62()\"/></div>";
						  echo"<img alt=\"View Current Cart\" src=\"images/zoom.png\" width=\"30\" height=\"30\" style=\"cursor:pointer; margin-right:5px; float:right\" title=\"View Current Cart\" onclick=\"viewRadiolojiaIPDBill('nurse')\"/>";
							echo'<div id="radiolojiainv" style="height:350px;margin-left:5px;margin-top:0px; float:left;"></div>';
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
	</div>';//end tabs 7


	echo'<div id="tabs-9" style="overflow-y:auto;height:375px;">

	<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333">
	<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Date-Time</p>
	</div>
	<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Department</p>
	</div>
	<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Item Name</p>
	</div>
	<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Unit Price</p>
	</div>
	<div style="width:70px; height:20px;border-right:1.5px solid #333; float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Qty</p>
	</div>
	<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Total Price</p>
	</div>
	<div style="width:120px; height:20px;float:left;">
	<p style="color:#fff;text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Username</p>
	</div>
	</div>';
		
		$result =mysqli_query($db, "select * from  tempbill where patid='".$regn."' and old_in_presc_id='".$old_in_presc_id."' and old_in_patient_id='".$old_in_patient_id."' and itcode!='84' ");
		$num_row = mysqli_num_rows($result);
		$c=0;
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
		$rowxk=mysqli_fetch_array($result);
		$patname=stripslashes($rowxk['patname']);
		$postedBY=stripslashes($rowxk['fullname']);
		$c+=preg_replace('~,~', '', stripslashes($rowxk['subnet']));
		if($i%2==0){
			echo'<div style="height:20px; border-bottom:1.5px solid #333; border-left:1.5px solid #333;" id="normal'.$i.'"">';
			}else{
				echo'<div style="height:20px; border-bottom:1.5px solid #333;border-left:1.5px solid #333;background:#d1d1d1 "  id="normal'.$i.'"">';
			}
		
		echo'
		<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($rowxk['date']).'</p>
		</div>
		<div style="width:120px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($rowxk['category']).'</p>
		</div>
		<div style="width:250px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($rowxk['itname']).'</p>
		</div>
		<div style="width:130px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($rowxk['price']).'</p>
		</div>
		<div style="width:70px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($rowxk['quat']).'</p>
		</div>
		<div style="width:100px; height:20px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($rowxk['subnet']).'</p>
		</div>';

		echo'<div style="height:20px;border-right:1.5px solid #333; float:left;width:120px; overflow:hidden">';
		echo'<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">'.stripslashes($rowxk['fullname']).'</p>'; //}
		echo'</div>';
		
		echo'</div><div class="cleaner"></div>';

	}

echo'
<div class="cleaner_h10"></div>
<p style="text-align:center; font-weight:normal;font-size:11px;margin:0 0 0 0px">Total:<b>'.number_format($c, 2).'</b></p>';
	echo'</div>';

// echo'<div id="tabs-8" style="display:none;">';
		
	
// 	 echo '<script>	area9 = new nicEditor({fullPanel : true,maxHeight :240 }).panelInstance("treatment");</script>';
// 	echo'
	

// 		<div style="float:left; padding-left:10px">
// 		<h5>Disease Summary</h5>';
// 		 echo'<div class="cleaner_h5"></div>
// 		 <div style="height:340px; overflow-y:auto; border:1px solid #ccc;width:480px;padding:2px">
// 		 					<a class="labels" style="margin-left:20px;font-weight:bold">Diseases:</a>';
// 					if(isset($_SESSION['dis'])){
// 							unset($_SESSION['dis']);
// 						}
// 					$_SESSION['diseases']=array();

// 	echo'<div class="cleaner_h5"></div>
// 	<div class="ui-widget"  style="float:left; margin-left:25px">
// 	<select id="disease" class="combos">
// 		<option value="">Select one...</option>';
// 		$resulta =mysqli_query($db, "select * from diseases order by name");
// 							$num_resultsa = mysqli_num_rows($resulta);	
// 							for ($i=0; $i <$num_resultsa; $i++) {
// 								$row=mysqli_fetch_array($resulta);
// 								$name=stripslashes($row['name']);
// 							$k=stripslashes($row['id']);
// 								echo"<option value=\"".$k."ÃÂÃÂ¸".$name."\">".$name."</option>";
// 						}
// 		echo'</select>
// </div>
// 	<div class="cleaner_h5"></div>
// 					<div id="diseases" style="width:100%;">';
// 		$parts=explode(';',stripslashes($rowa['DiagName']));
// 		foreach ($parts as $key => $val) {
// 		$_SESSION['dis'][$key]=$val;
// 			if($val!=''){
// 			echo'<div class="tag alert-info alert-dismissable" id="lantag'.$key.'"><button type="button" class="close" onclick="dismissdis(\''.$key.'\')"  aria-hidden="true">&times;</button>'.$val.'</div>';
// 			}
// 	}


// 					echo'</div>';



// 		echo'</div>
// 		</div>
// </div>';//end tabs 8



   echo'<div id="tabs-20">';
		   echo'<div style="float:left; padding-right:10px; border-right:0;width:350px">';
		  				 echo "<h5>DISCHARGE</h5>";

		   echo'</div>';
		   echo'<div style="float:right; padding-left:10px">';
					echo'<div id="processdis" style="margin-top:10px; height:50px;"> </div>';

		   echo'</div>';
		   echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
		   echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';

		   echo'<div style="float:left; padding-right:10px; border-right:0;width:350px">';
		  				 echo "<h5>CO-UN</h5>";
	
		   echo'</div>';
		   echo'<div style="float:right; padding-left:10px">';
					//echo'<div id="processdis" style="margin-top:10px; height:50px;"> </div>';
			 echo'<input type="hidden" disabled="disabled" id="txtcoverage" class="input_field" style="width:80px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';
			 echo'<input type="hidden" disabled="disabled" id="txtinsurer_id" class="input_field" value="'.$in_insurer_id.'" style="width:80px; margin-left:20px; border-color:var(--color-danger, #DC2626);display:none;"/>';
			 echo'<input type="hidden" disabled="disabled" id="dept4rm" value="IPD" style="width:20px;margin-left:20px;display:none;"/>';
			 echo'<input type="hidden" disabled="disabled" id="old_patient_id" value="'.$old_in_patient_id.'" style="width:20px;display:none;"/>
				  <input type="hidden" disabled="disabled" id="old_presc_id" value="'.$old_in_presc_id.'" style="width:20px;display:none;"/>
				  <input type="hidden" disabled="disabled" id="old_presc_no" name="old_presc_no" value="'.$old_in_presc_no.'" style="width:20px;display:none;"/>
				  <input type="hidden" disabled="disabled" id="regn" name="regn" value="'.$regn.'" style="width:40px;display:none;"/>
				  <input type="hidden" disabled="disabled" id="oname" value="'.$oname.'" style="width:40px;display:none;"/>
				  <input type="hidden" disabled="disabled" id="patid" value="'.$regn.'" style="width:40px;display:none;"/>
				  <input type="hidden" disabled="disabled" id="patname" value="'.$oname.'" style="width:40px;display:none;"/>';
echo'<input type="hidden" disabled="disabled" id="txttotalcoverage786" class="input_field" style="width:80px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';
echo'<input type="hidden" disabled="disabled" id="totalcoverage786" class="input_field" value="0" style="width:40px;margin-left:20px;border-color:var(--color-danger, #DC2626);display:none;"/>';

		   echo'</div>';
		   echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';
		   echo'<div class="cleaner" style="border-top:1px dashed #333; margin-top:2px;margin-bottom:20px"></div>';


   echo'</div>';

	
 	 
  echo'<div id="tabs_phc_diagnosis_ipd" style="padding:0px;">';
		   #echo'<h5>PHC Diagnosis:</h5>';
	echo'<div style="width:995px;height:400px; float:left;padding:0px;">';
		echo'<div id="phcdiagnosis606" style="height:395px;overflow-x:hidden;">';
		      echo'<ul>';
					echo'<li><a href="#tabs_phc_findiagnosis_summary">Find Diagnosis.</a></li>';
					echo'<li><a href="#tabs_phc_diagnosis_summary_dos">Diagnosis Summary.</a></li>';
					echo'<li><a href="#tabs_phc_diseases_summary">Diseases Summary.</a></li>';
			  echo'</ul>';
				echo'<div id="tabs_phc_findiagnosis_summary">';
							#echo'<div class="cleaner_h5"></div>';
					 		echo'<div id="disphcdiagtbl" class="" style="background-color:#123;">';
					 		echo'</div>';
					 		echo'<p><span id="appco_status_message" name="appco_status_message" class="black"></span></p>';
					 		echo'<p><span id="message" name="message" class="white"></span></p>';
					 		#echo'';
	                      echo'<table id="phcdiaginoisTable" class="display dataTable" width="100%">
	                                <thead>
	                                    <tr>
	                                        <thscope="col">Parent Name (Parent Code)</th>
	                                        <thscope="col">Name</th>
	                                        <thscope="col">Diagnosis Code</th>
	                                        <thscope="col">Action</th>
	                                    </tr>
	                                </thead>
	                                
	                            </table>';


							#$phcdiagnosis = trim(mysqli_real_escape_string($db, makesafe(strtoupper(stripslashes($rowa['Diagnosis'])))));								
							$phcdiagnosis = strip_tags($rowa['Diagnosis'], '</br>');

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
						echo "<script> area10 = new nicEditor({fullPanel : true,maxHeight :320}).panelInstance('diagnosis');</script>";
					    echo'<div style="width:520px;float:left;display:;">
								<label for="diagnosis" class="bh-visually-hidden">Text field</label><textarea id="diagnosis" style="float:left;height:256px; width:500px;display:;" class="alergy">'; 
									$phcSqlQry =mysqli_query($db, "SELECT * FROM tblprescphcdiagnosis WHERE PatientNo='".$regn."' AND PatientId='".$old_in_patient_id."'  AND PrescId='".$old_in_presc_id."'  AND PrescNo='".$old_in_presc_no."' ");
									$phc_num_row = mysqli_num_rows($phcSqlQry);$xa=1;	
									for ($i=0; $i <$phc_num_row; $i++) {
										$phcrw=mysqli_fetch_array($phcSqlQry);
										echo'<p style="font-size:11px;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:-20px 0 0 0;">'.stripslashes($phcrw['DiagnosisChildName']).'</p>';
										$xa++;
									}
									echo''.stripslashes($rowa['Diagnosis']).'';
									#echo''.htmlspecialchars($phcdiagnosis).'';

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
				echo'<div id="tabs_phc_diagnosis_summary_dos" style="height:400px;padding:0px;overflow-y:auto;">';
				  echo'<div id="results">';
					echo'<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333; background:#333;">';
			$phcSqlQry =mysqli_query($db, "SELECT * FROM tblprescphcdiagnosis WHERE PatientNo='".$regn."' AND PatientId='".$old_in_patient_id."'  AND PrescId='".$old_in_presc_id."'  AND PrescNo='".$old_in_presc_no."' ");
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
													<input type="hidden" disabled="disabled" class="hidden" value="'.$regn.'" id="oldpatid'.$code.'" style="display:none;"/>
												    <input type="hidden" disabled="disabled" class="hidden" value="IPD" id="dept4rm'.$code.'" style="display:none;"/>';	
				 	echo"<div class=\"figure2t\" style=\"height:16px;width:50px; border-right:1px solid #333\" id=\"deltempitem".$code."\" title=\"Delete Item\" onclick=\"deletephcDiagItem(".$code.",".$itcode.")\"><img alt=\"Empty\" src=\"images/empty.png\" style=\"width:20px;height:22px\"/></div>";					

											
										   echo'</div>';
										}
										
								echo'</div></div>';
								echo'<div class="cleaner_h10"></div>';
								echo'<div id="displaymes"></div>';
									echo'<div class="cleaner_h5"></div>'; #lab_phc_diagnosis_num_rows
									echo'<input type="hidden" disabled="disabled" class="hidden" value="'.$lab_phc_diagnosis_num_rows.'" id="phc_diagnosis_num_rows" style="display:none;"/>';
								echo'<div class="cleaner_h10"></div>';
					 	        echo'<div id="refresh_phc_diagnosis_ipd" class="" style="background-color:#123;"></div>';
					 		    echo'<div id="disp_phc_diagnosis_ipd" class="" style="background-color:#123;"></div>';


				    echo'</div>';
				  echo'</div>';

				echo'</div>';


		   #echo'<script src="js/ipdddtscript.js"></script>';









		echo'</div>';
		#echo'<input type="hidden" disabled="disabled" id="drug26docfee" class="input_field"  style="width:80px;border-color:var(--color-danger, #DC2626); font-weight:bold; margin-left:5px; float:right;display:none;"/>';
   echo'</div>';

		   #echo'<script src="js/ipdddtscript.js"></script>';


   echo'</div>';
	



// echo'<div id="tabs-19" style="display:none;">';
// if(isset($_SESSION['theatcart'])){
// 							unset($_SESSION['theatcart']);
// 						}
// 	echo'<div style="float:left; padding-right:10px; border-right:0">
// 					<h5>MAKE A THEATRE REQUEST</h5>
// 					<label for="rectheatre" class="bh-visually-hidden">Rectheatre</label><input type="checkbox" value="1" name="rectheatre" id="rectheatre" style="float:left;margin:8px 0 0 10px">
// 					<a class="labels" style="margin-left:10px">Send Request to Theatre on Save</a>
// 					 <div class="cleaner"></div>';		
				
//    echo'</div>
	

// 		<div style="float:left; padding-left:10px">';
// 		echo'<h5>Theatre Requests Summary</h5>';


// 		echo'</div>
// 	</div>';





			echo'</div></div>';
							break;

							case 78:
				
							
				$result = mysqli_query($db, "insert into log values('0','".$username." accesses CCC Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">Comprehensive Care Center [CCC]<strong id="debtorp"></strong><strong id="debtord"></strong></h2>';
	echo'<input type="button" value="Exit" id="submit"  style="margin-right:10px;padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>';
								
	echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
					<div id="tabs" style="width:1000px; height:436px; float:left; margin:5px 0 0 0px">

						<ul>
						<li><a href="#tabs-1">New Patient</a></li>
						<li style="cursor:pointer" onclick="loadccpats(2)"><a  href="#tabs-2">Edit Patient</a></li>
						<li style="cursor:pointer" onclick="loadccpats(3)"><a  href="#tabs-3">New Consultation</a></li>
						<li style="cursor:pointer" onclick="loadccpresc(4)"><a href="#tabs-4">Consultation</a></li>
						<li style="cursor:pointer" onclick="loadccpresc(5)"><a href="#tabs-5">Nutrition</a></li>
						<li style="cursor:pointer" onclick="loadccpresc(6)"><a href="#tabs-6">Counselling</a></li>
						<li style="cursor:pointer" onclick="loadccpresc(7)"><a href="#tabs-7">Pharmacy</a></li>
						<li><a href="#tabs-8">Reports</a></li>
						</ul>
						

						<div id="tabs-1">';

						$result =mysqli_query($db, "select * from cccpats order by id desc limit 0,1");
							$row=mysqli_fetch_array($result);
							if(mysqli_num_rows($result)==0){$pntno=1;
								}else {
									$pntno=stripslashes($row['pntno'])+1;	}

							echo'
							<div id="personal" style="height:300px">
							<h5>Personal Details</h5>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn" class="bh-visually-hidden">Field</label><input type="text" id="regn" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Names:<span>*</span></a>
                                <label for="names" class="bh-visually-hidden">Field</label><input type="text" id="names" name="field" class="in_field" style="text-transform:uppercase"/>
								<div class="cleaner_h5"></div>
								 
							
								 <a class="labels">D.o.b:<span>*</span></a>
								<input id="dob" name="dob" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10">
								<div class="cleaner_h5"></div>
								 <a class="labels" style="margin-right:30px">Gender:</a>
                                <label for="gender" class="bh-visually-hidden">Gender:</label><select class="select" id="gender" style="float:right">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								
								</select>
								<div class="cleaner_h5"></div>
								<a class="labels">Phone No:<span>*</span></a>
                                <label for="phone" class="bh-visually-hidden">Stream</label><input type="text" id="phone" name="stream" class="in_field"/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Postal Add:</a>
                                <label for="postal" class="bh-visually-hidden">House</label><input type="text" id="postal" name="house" class="in_field"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Email:</a>
                                <label for="email" class="bh-visually-hidden">Course</label><input type="text" id="email" name="course" class="in_field"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">B.Group:</a>
                                <label for="bgroup" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup" name="bgroup" style="float:right">
								<option value="">None</option>
								<option value="A Rh+">A Rh+</option>
								<option value="A Rh-">A Rh-</option>
								<option value="B Rh+">B Rh+</option>
								<option value="B Rh-">B Rh-</option>
								<option value="AB Rh+">AB Rh+</option>
								<option value="AB Rh-">AB Rh-</option>
								<option value="O Rh+">O Rh+</option>
								<option value="O Rh-">O Rh-</option>
								</select>
								</div>
							
								<div id="personal"  style="height:300px">
								<h5>Guardian Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Names:</a>
                                <label for="gname" class="bh-visually-hidden">Gname</label><input type="text" id="gname" name="gname" class="in_field"/>
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
                                <label for="gphone" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone" name="gphone" class="in_field"/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Address:</a>
                                <label for="gaddress" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress" name="gaddress" class="in_field"/> 
								<div class="cleaner_h20"></div>


								
								<input type="button" value="Save" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:70px;margin-left:170px" class="in_field" onclick="addnewccc();"/>
			
								<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>';



							
						echo'</div>

						<div id="tabs-2">


						</div>
						<div id="tabs-3">


						</div>
						<div id="tabs-4">


						</div>

						<div id="tabs-5">


						</div>
						<div id="tabs-6">


						</div>
						<div id="tabs-7">


						</div>
						<div id="tabs-8">



							<div id="personal" style="height:300px;width:300px">
								<h5>Patients List</h5>
								<a class="labels">From:<span>*</span></a>
                                <input type="text" id="datepick" name="field" class="in_field" placeholder="dd/mm/yyyy" />
								<div class="cleaner_h5"></div>
								<a class="labels">To:<span>*</span></a>
                                <input type="text" id="datepick2" name="field" class="in_field" placeholder="dd/mm/yyyy" />
								<div class="cleaner_h5"></div>
								<div class="cleaner"></div>
								<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
								<a class="labels" style="margin-left:10px; float:left">View All</a>
								<input type="button" value="Submit" id="submit"  style="padding:5px 5px; float:left; cursor:pointer;width:70px;margin-left:170px" class="in_field" onclick="enterccc1();"/>
			
								<script>$("#itemname").parent().find("input:first").focus().width(180);</script>
								<div class="cleaner_h5"></div>
								<h5>Patients Medical Records</h5>
								<a class="labels" style="margin-left:0px">Patient Name:</a>
							<div class="ui-widget" style="margin-left:25px; float:left;" id="widg6" >
								<label for="itemname" class="bh-visually-hidden">Patient Name:</label><select id="itemname" style="width:260px; margin-left:10px;">
								<option value="All">All</option>';
									$resultb =mysqli_query($db, "select * from cccpats order by names asc");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($i=0; $i <$num_resultsb; $i++) {
															$rowb=mysqli_fetch_array($resultb);
															echo'<option value="'.stripslashes($rowb['pntno']).'">'.stripslashes($rowb['names']).'-'.stripslashes($rowb['pntno']).'</option>';
														}
								echo'</select>
								</div>
								<div class="cleaner_h5"></div>
								<a class="labels">From:<span>*</span></a>
                                <input type="text" id="datepick3" name="field" class="in_field" placeholder="dd/mm/yyyy" />
								<div class="cleaner_h5"></div>
								<a class="labels">To:<span>*</span></a>
                                <input type="text" id="datepick4" name="field" class="in_field" placeholder="dd/mm/yyyy" />
								<div class="cleaner_h5"></div>
								<div class="cleaner"></div>
								<input aria-label="Viewall2" type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall2" value="1">
								<a class="labels" style="margin-left:10px; float:left">View All</a>
								<input type="button" value="Submit" id="submit"  style="padding:5px 5px; float:left; cursor:pointer;width:70px;margin-left:170px" class="in_field" onclick="enterccc2();"/>
			
								</div>




							</div>
			
				
			
			

			</div></div>';

				break;

				case 79:
				$a=$_GET['a'];
				if($a==2){
					$x='Edit CCC Patient Details';
					$ser=81;
				}
				if($a==3){
					$x='NEW CCC CONSULTATION';
					$ser=82;
				}
				

			echo"<script>$('#patientnoccc').focus();</script>";	
			echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:380px">
					<div id="tit" style="width:360px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">'.$x.'';
			
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
	<div class="cleaner"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$ser.'"/>
		<input type="hidden" id="d" name="ser"  value="'.$a.'"/>
			<a class="labels" style="margin-left:10px">Patient No:</a>	
	 <input type="text" id="patientnoccc" name="regn" placeholder="Type Number and Press Enter" class="in_field" value=""  style="float:left;margin-left:10px;width:180px"/>
	 		 <img alt="Zoom" src="images/zoom.png" style="width:30px; height:30px; float:right; cursor:pointer; margin-right:5px" onclick="searchccc()"/> 
	 	<a class="labels" style="float:right;margin-right:10px">Or  Search</a>	
	<div class="cleaner_h5"></div>	
		<div class="cleaner_h5"></div>	
		<div id="searchccc">
			<div class="cleaner_h5"></div>	
		</div>							
			<div class="cleaner"></div>';
			echo'</div>
		<div class="cleaner_h5"></div>
				</div>';	
					break;


					case 80:
										echo'<a class="labels" style="margin-left:10px; font-weight:bold">Search By:</a>
							<label for="menusearch" class="bh-visually-hidden">Search By:</label><select class="input_field" id="menusearch" style="float:right; margin-right:10px">
							<option value="1" onclick="menuop(1)">Patient Name</option>
							<option value="2" onclick="menuop(2)">Patient No</option>
							<option value="3" onclick="menuop(3)">Next of Kin</option>
							<option value="4" onclick="menuop(4)">Phone No</option>
							</select>
							<div class="cleaner_h5"></div>
						<div id="op1">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt51" class="bh-visually-hidden">Phone No</label><select id="pnt51" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from cccpats where status=1 order by names");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['names']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						<div id="op2" style="display:none">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt52" class="bh-visually-hidden">Text field</label><select id="pnt52" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from cccpats where status=1 order by pntno");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['pntno']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						
						<div id="op3" style="display:none">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt53" class="bh-visually-hidden">Text field</label><select id="pnt53" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from cccpats where status=1 order by gname");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['gname']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						
						<div id="op4" style="display:none">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt54" class="bh-visually-hidden">Text field</label><select id="pnt54" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from cccpats where status=1 order by phone");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['phone']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						<div class="cleaner_h5"></div>
						';
						break;		

						case 81:
						$pntno=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from cccpats where pntno='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							echo'
							<div id="personal" style="height:300px">
							<h5>Personal Details</h5>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn2" class="bh-visually-hidden">Field</label><input type="text" id="regn2" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Names:<span>*</span></a>
                                <label for="names2" class="bh-visually-hidden">Field</label><input type="text" id="names2" value="'.stripslashes($row['names']).'" name="field" class="in_field" style="text-transform:uppercase"/>
								<div class="cleaner_h5"></div>
								 
							
								 <a class="labels">D.o.b:<span>*</span></a>
								<input id="dob2" name="dob2" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10" value="'.stripslashes($row['dob']).'">
								<div class="cleaner_h5"></div>
								 <a class="labels" style="margin-right:30px">Gender:</a>
                                <label for="gender2" class="bh-visually-hidden">Gender:</label><select class="select" id="gender2" style="float:right">
                                <option value="'.stripslashes($row['gender']).'">'.stripslashes($row['gender']).'</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								
								</select>
								<div class="cleaner_h5"></div>
								<a class="labels">Phone No:<span>*</span></a>
                                <label for="phone2" class="bh-visually-hidden">Stream</label><input type="text" id="phone2" name="stream" class="in_field" value="'.stripslashes($row['phone']).'"/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Postal Add:</a>
                                <label for="postal2" class="bh-visually-hidden">House</label><input type="text" id="postal2" name="house" class="in_field" value="'.stripslashes($row['address']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Email:</a>
                                <label for="email2" class="bh-visually-hidden">Course</label><input type="text" id="email2" name="course" class="in_field"  value="'.stripslashes($row['email']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">B.Group:</a>
                                <label for="bgroup2" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup2" name="bgroup" style="float:right">
                                 <option value="'.stripslashes($row['bgroup']).'">'.stripslashes($row['bgroup']).'</option>
								<option value="">None</option>
								<option value="A Rh+">A Rh+</option>
								<option value="A Rh-">A Rh-</option>
								<option value="B Rh+">B Rh+</option>
								<option value="B Rh-">B Rh-</option>
								<option value="AB Rh+">AB Rh+</option>
								<option value="AB Rh-">AB Rh-</option>
								<option value="O Rh+">O Rh+</option>
								<option value="O Rh-">O Rh-</option>
								</select>
								</div>
							
								<div id="personal"  style="height:300px">
								<h5>Guardian Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Names:</a>
                                <label for="gname2" class="bh-visually-hidden">Gname</label><input type="text" id="gname2" name="gname" class="in_field"   value="'.stripslashes($row['gname']).'"/>
								<div class="cleaner_h5"></div>
								 <a class="labels">R-ship:</a>
                                <label for="rship2" class="bh-visually-hidden">Rship</label><select class="select" id="rship2" name="rship" style="float:right">
								 <option value="'.stripslashes($row['rship']).'">'.stripslashes($row['rship']).'</option>
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
                                <label for="gphone2" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone2" name="gphone" class="in_field"   value="'.stripslashes($row['gcont']).'"/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Address:</a>
                                <label for="gaddress2" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress2" name="gaddress" class="in_field"   value="'.stripslashes($row['gaddress']).'"/> 
								<div class="cleaner_h20"></div>


								
								<input type="button" value="Save" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:70px;margin-left:170px" class="in_field" onclick="editpatccc('.$pntno.');"/>
			
								<div id="newstudent2" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>';




						break;		

						case 82:
						$pntno=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from cccpats where pntno='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							echo'
							<div id="personal" style="height:300px">
							<h5>Personal Details</h5>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn2" class="bh-visually-hidden">Field</label><input type="text" id="regn2" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Names:<span>*</span></a>
                                <label for="names2" class="bh-visually-hidden">Field</label><input type="text" id="names2" value="'.stripslashes($row['names']).'" name="field"  disabled="disabled" class="in_field" style="text-transform:uppercase;border-color:var(--color-danger, #DC2626);"/>
								<div class="cleaner_h5"></div>
								 
							
								 <a class="labels">D.o.b:<span>*</span></a>
								<input id="dob2" disabled="disabled" style="border-color:var(--color-danger, #DC2626); " name="dob2" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10" value="'.stripslashes($row['dob']).'">
								<div class="cleaner_h5"></div>
								 <a class="labels" style="margin-right:30px">Gender:</a>
                                <label for="gender2" class="bh-visually-hidden">Gender:</label><select class="select" id="gender2" style="float:right;border-color:var(--color-danger, #DC2626);"  disabled="disabled">
                                <option value="'.stripslashes($row['gender']).'">'.stripslashes($row['gender']).'</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								
								</select>
								<div class="cleaner_h5"></div>
								<a class="labels">Phone No:<span>*</span></a>
                                <label for="phone2" class="bh-visually-hidden">Stream</label><input type="text" id="phone2" name="stream" class="in_field" value="'.stripslashes($row['phone']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Postal Add:</a>
                                <label for="postal2" class="bh-visually-hidden">House</label><input type="text" id="postal2" name="house" class="in_field" value="'.stripslashes($row['address']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Email:</a>
                                <label for="email2" class="bh-visually-hidden">Course</label><input type="text" id="email2" name="course" class="in_field"  value="'.stripslashes($row['email']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">B.Group:</a>
                                <label for="bgroup2" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup2" name="bgroup" style="float:right;border-color:var(--color-danger, #DC2626);"   disabled="disabled" >
                                 <option value="'.stripslashes($row['bgroup']).'">'.stripslashes($row['bgroup']).'</option>
								<option value="">None</option>
								<option value="A Rh+">A Rh+</option>
								<option value="A Rh-">A Rh-</option>
								<option value="B Rh+">B Rh+</option>
								<option value="B Rh-">B Rh-</option>
								<option value="AB Rh+">AB Rh+</option>
								<option value="AB Rh-">AB Rh-</option>
								<option value="O Rh+">O Rh+</option>
								<option value="O Rh-">O Rh-</option>
								</select>
								</div>
							
								<div id="personal"  style="height:300px">
								<h5>Guardian Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Names:</a>
                                <label for="gname2" class="bh-visually-hidden">Gname</label><input type="text" id="gname2" name="gname" class="in_field"   value="'.stripslashes($row['gname']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/>
								<div class="cleaner_h5"></div>
								 <a class="labels">R-ship:</a>
                                <label for="rship2" class="bh-visually-hidden">Rship</label><select class="select" id="rship2" name="rship" style="float:right;border-color:var(--color-danger, #DC2626);"   disabled="disabled" >
								 <option value="'.stripslashes($row['rship']).'">'.stripslashes($row['rship']).'</option>
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
                                <label for="gphone2" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone2" name="gphone" class="in_field"   value="'.stripslashes($row['gcont']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Address:</a>
                                <label for="gaddress2" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress2" name="gaddress" class="in_field"   value="'.stripslashes($row['gaddress']).'"   disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Date:</a>
                                <label for="Date" class="bh-visually-hidden">Gaddress</label><input type="text" id="Date" name="gaddress" class="in_field"   value="'.date('d/m/Y').'"   disabled="disabled" style="border-color:var(--color-danger, #DC2626);font-weight:BOLD "/> 
								<div class="cleaner_h20"></div>


								
								<input type="button" value="Start New Consultation" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:150px;margin-left:80px" class="in_field" onclick="startccc('.$pntno.');"/>
			
								<div id="newstudent3" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>';




						break;	


							case 83:
								$a=$_GET['a'];
								if($a==4){
									$x='CCC CONSULTATIONS';
									$ser=84;
								}
								if($a==5){
									$x='CCC NUTRITION';
									$ser=85;
								}
								if($a==6){
									$x='CCC COUNSELLING';
									$ser=86;
								}
								if($a==7){
									$x='CCC PHARMACY';
									$ser=87;
								}
								
									$stamp=date('Ymd');
							echo"<script>$('#cons29').parent().find('input:first').focus();</script>";
							echo'<div id="modalDiv"></div>';
							echo'<div id="alertDiv" style="min-height:90px; width:380px;TOP:20%">
									<div id="tit" style="width:360px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
							<h5 style="margin-right:0px; color:#fff">'.$x.'
							<input type="hidden" id="ser" name="ser"  value="'.$ser.'"/>
						<input type="hidden" id="d" name="ser"  value="'.$a.'"/>
							
							<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5></div>
						<div class="cleaner_h5"></div>';
					$result =mysqli_query($db, "select * from cccpresc where Stamp>='".date('Ymd')."' and  Stamp<='".date('Ymd')."' order by PrescId asc");
			$num_results = mysqli_num_rows($result);
				echo'<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:10px">From:</a>
				<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick" type="text" value="'.date('Y/m/d').'">
				<a class="labels" style="margin-left:10px">To:</a>
				<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick2" type="text" value="'.date('Y/m/d').'">				
					<img alt="Search Consultations using these dates" src="images/back2.png" style="float:left; margin-left:10px;width:30px;height:30px; cursor:pointer" title="Search Consultations using these dates" onclick="searchpayccc(29,2);"/>
					<div class="cleaner"></div>
			<div class="ui-widget" style="margin:0 10px 0 10px; float:left" id="searchpay">
			<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
			<div class="cleaner_h5"></div>
			<label for="cons29" class="bh-visually-hidden">No. of Patients:</label><select id="cons29">
				<option value="">Select one...</option>';
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.stripslashes($row['PrescId']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'</option>';
							}
		echo'</select>
		</div>';
	echo"<a class=\"labels\" style=\"margin-left:90px\"><strong>Today's Patients</strong></a>";
	echo'<div class="cleaner"></div>
									<div id="title" style="margin-left:10px">
									<div id="figure1" style="margin-left:0px; width:240px">Pat. Name</div>
									<div id="figure1" style="width:69px">Pat. No</div>
									</div><div class="cleaner"></div>
	<div id="inside" style="max-height:108px; overflow-y:auto; margin-left:10px">';
	$resultb =mysqli_query($db, "select * from cccpresc where Stamp>='".date('Ymd')."' and  Stamp<='".date('Ymd')."' order by PrescId desc");
			$num_resultsb = mysqli_num_rows($resultb);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$pid=stripslashes($rowb['PrescId']);
		if(stripslashes($rowb['Status'])==1){
		echo"<div class=\"normal1\" style=\"\" onclick=\"seeccc('".$pid."',".$ser.")\">";
		}else {echo"<div class=\"normal2\"  style=\"\" onclick=\"seeccc('".$pid."',".$ser.")\">";}
		echo'<div id="figure2" style="width:240px">'.stripslashes($rowb['PatName']).'</div>
		<div id="figure2" style="width:70px">'.stripslashes($rowb['PatId']).'</div>
		</div>
		<div class="cleaner"></div>
		';}
		echo'</div>
		
		<div class="cleaner_h5"></div>
								</div>';	
									break;	

						case 84:
							$pid=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from cccpresc where PrescId='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							echo'
							<div id="personal" style="height:300px">
							<h5>Personal Details</h5>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn3" class="bh-visually-hidden">Field</label><input type="text" id="regn3" name="field" class="in_field" value="'.stripslashes($row['PatId']).'" disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Names:<span>*</span></a>
                                <label for="names3" class="bh-visually-hidden">Field</label><input type="text" id="names3" value="'.stripslashes($row['PatName']).'" name="field"  disabled="disabled" class="in_field" style="text-transform:uppercase;border-color:var(--color-danger, #DC2626);"/>
								<div class="cleaner_h5"></div>

								<h5>Triage Details</h5>
								<a class="labels">Temp:</a>
                                <input type="text" placeholder="Celsius" id="temp" name="field" class="in_field" value="'.stripslashes($row['Temp']).'" style=" "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">B/P:</a>
                                <input type="text"  placeholder="mmHg" id="bp" value="'.stripslashes($row['Bp']).'" name="field" class="in_field"/>
								<div class="cleaner_h5"></div>
								<a class="labels">Weight:</a>
                                <input type="text"  placeholder="Kgs" id="weight" value="'.stripslashes($row['Weight']).'" name="field" class="in_field"/>
								<div class="cleaner_h5"></div>
								<a class="labels">Pulse Rate:</a>
                                <input type="text"  placeholder="Beats/Min" id="pr" value="'.stripslashes($row['PulseRate']).'" name="field" class="in_field"/>
								<div class="cleaner_h5"></div>
								<a class="labels">Breath Rate:</a>
                                <input type="text"  placeholder="Breaths/Min" id="br" value="'.stripslashes($row['BreathRate']).'" name="field" class="in_field"/>
								<div class="cleaner_h5"></div>
								 
							
								</div>
							
								


								<div id="personal"  style="height:300px">
								<h5>History Details</h5>
								<label for="history" class="bh-visually-hidden">History Details</label><textarea class="alergy" id="history" style="width:210px;height:100px;padding:10px">'.stripslashes($row['History']).'</textarea>
								<div class="cleaner_h5"></div>
								<h5>Lab Details</h5>
								<label for="lab" class="bh-visually-hidden">Lab Details</label><textarea class="alergy" id="lab"  style="width:210px;height:100px;padding:10px">'.stripslashes($row['Lab']).'</textarea>
								<div class="cleaner_h5"></div>
								
								</div>


								<div id="personal"  style="height:300px">
								
								<h5>Diagnosis Details</h5>
								<label for="diagnosis" class="bh-visually-hidden">Diagnosis Details</label><textarea class="alergy" id="diagnosis"   style="width:210px;height:100px;padding:10px">'.stripslashes($row['Diagnosis']).'</textarea>
								<div class="cleaner_h5"></div>

								
								<input type="button" value="Save Consultation" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:150px;margin-left:20px" class="in_field" onclick="saveconsccc('.$pid.');"/>
			
								<div id="newstudent4" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>





								';




						break;	

						case 85:
							$pid=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from cccpresc where PrescId='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							
								echo'<script>area42 = new nicEditor({fullPanel : true,maxHeight : 310}).panelInstance("nutrition");</script>
								<label for="nutrition" class="bh-visually-hidden">Text field</label><textarea id="nutrition"  style="float:left;height:300px; width:930px" class="alergy">'.stripslashes($row['Nutrition']).'</textarea>
								<div class="cleaner_h5"></div>
								<input type="button" value="Save Notes" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:150px;margin-left:20px" class="in_field" onclick="savenutccc('.$pid.');"/>
			
								<div id="newstudent5" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>





								';




						break;	

						case 86:
							$pid=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from cccpresc where PrescId='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							
								echo'<script>area43 = new nicEditor({fullPanel : true,maxHeight : 310}).panelInstance("counselling");</script>
								<label for="counselling" class="bh-visually-hidden">Text field</label><textarea id="counselling"  style="float:left;height:300px; width:930px" class="alergy">'.stripslashes($row['Counselling']).'</textarea>
								<div class="cleaner_h5"></div>
								<input type="button" value="Save Notes" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:150px;margin-left:20px" class="in_field" onclick="saveconccc('.$pid.');"/>
			
								<div id="newstudent6" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>





								';




						break;	

						case 87:
							$pid=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from cccpresc where PrescId='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							
								echo'<script>area44 = new nicEditor({fullPanel : true,maxHeight : 310}).panelInstance("prescription");</script>
								<label for="prescription" class="bh-visually-hidden">Text field</label><textarea id="prescription"  style="float:left;height:300px; width:930px" class="alergy">'.stripslashes($row['Prescription']).'</textarea>
								<div class="cleaner_h5"></div>
								<input type="button" value="Save Notes" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:150px;margin-left:20px" class="in_field" onclick="savepharmccc('.$pid.');"/>
			
								<div id="newstudent7" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>





								';




						break;	

						case 88:
				
							
				$result = mysqli_query($db, "insert into log values('0','".$username." accesses Counselling Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">Counselling<strong id="debtorp"></strong><strong id="debtord"></strong></h2>';
	echo'<input type="button" value="Exit" id="submit"  style="margin-right:10px;padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>';
								
	echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
					<div id="tabs" style="width:1000px; height:436px; float:left; margin:5px 0 0 0px">

						<ul>
						<li style="cursor:pointer" onclick="loadcounspats(9)"><a  href="#tabs-9">New Consultation</a></li>
						<li style="cursor:pointer" onclick="loadcounspresc(10)"><a href="#tabs-10">Consultation</a></li>
						</ul>
						

						
						<div id="tabs-9">


						</div>
						<div id="tabs-10">


						</div>
						

					</div></div>';

				break;

				case 89:
				$a=$_GET['a'];
				if($a==9){
					$x='NEW CONSULTATION';
					$ser=91;
				}
				echo"<script>$('#patientnoccc').focus();</script>";	
			echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:380px">
					<div id="tit" style="width:360px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">'.$x.'';
			
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
	<div class="cleaner"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$ser.'"/>
		<input type="hidden" id="d" name="ser"  value="'.$a.'"/>
			<a class="labels" style="margin-left:10px">Patient No:</a>	
	 <input type="text" id="patientnoccc" name="regn" placeholder="Type Number and Press Enter" class="in_field" value=""  style="float:left;margin-left:10px;width:180px"/>
	 		 <img alt="Zoom" src="images/zoom.png" style="width:30px; height:30px; float:right; cursor:pointer; margin-right:5px" onclick="searchcouns()"/> 
	 	<a class="labels" style="float:right;margin-right:10px">Or  Search</a>	
	<div class="cleaner_h5"></div>	
		<div class="cleaner_h5"></div>	
		<div id="searchccc">
			<div class="cleaner_h5"></div>	
		</div>							
			<div class="cleaner"></div>';
			echo'</div>
		<div class="cleaner_h5"></div>
				</div>';	
					break;


					case 90:
								echo'<a class="labels" style="margin-left:10px; font-weight:bold">Search By:</a>
							<label for="menusearch" class="bh-visually-hidden">Search By:</label><select class="input_field" id="menusearch" style="float:right; margin-right:10px">
							<option value="1" onclick="menuop(1)">Patient Name</option>
							<option value="2" onclick="menuop(2)">Patient No</option>
							<option value="3" onclick="menuop(3)">Next of Kin</option>
							<option value="4" onclick="menuop(4)">Phone No</option>
							</select>
							<div class="cleaner_h5"></div>
						<div id="op1">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt51" class="bh-visually-hidden">Phone No</label><select id="pnt51" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from patients where status=1 order by fullnames");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['fullnames']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						<div id="op2" style="display:none">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt52" class="bh-visually-hidden">Text field</label><select id="pnt52" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from patients where status=1 order by pntno");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['pntno']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						
						<div id="op3" style="display:none">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt53" class="bh-visually-hidden">Text field</label><select id="pnt53" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from patients where status=1 order by gname");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['gname']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						
						<div id="op4" style="display:none">
							<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
							<label for="pnt54" class="bh-visually-hidden">Text field</label><select id="pnt54" class="pnt5" style="width:260px; margin-left:10px;">
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from patients where status=1 order by contact");
												$num_results = mysqli_num_rows($result);
												for ($i=0; $i <$num_results; $i++) {
													$row=mysqli_fetch_array($result);
													$pntno=stripslashes($row['pntno']);
													echo'<option value="'.$pntno.'">'.stripslashes($row['contact']).'</option>';
												}
							echo'
								</select>
							</div>
						</div>
						<div class="cleaner_h5"></div>
						';
						break;	

						case 91:
						$pntno=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from cccpats where pntno='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							echo'
							<div id="personal" style="height:300px">
							<h5>Personal Details</h5>
								<a class="labels">Patient No:<span>*</span></a>
                                <label for="regn2" class="bh-visually-hidden">Field</label><input type="text" id="regn2" name="field" class="in_field" value="'.$pntno.'" disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Names:<span>*</span></a>
                                <label for="names2" class="bh-visually-hidden">Field</label><input type="text" id="names2" value="'.stripslashes($row['names']).'" name="field"  disabled="disabled" class="in_field" style="text-transform:uppercase;border-color:var(--color-danger, #DC2626);"/>
								<div class="cleaner_h5"></div>
								 
							
								 <a class="labels">D.o.b:<span>*</span></a>
								<input id="dob2" disabled="disabled" style="border-color:var(--color-danger, #DC2626); " name="dob2" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10" value="'.stripslashes($row['dob']).'">
								<div class="cleaner_h5"></div>
								 <a class="labels" style="margin-right:30px">Gender:</a>
                                <label for="gender2" class="bh-visually-hidden">Gender:</label><select class="select" id="gender2" style="float:right;border-color:var(--color-danger, #DC2626);"  disabled="disabled">
                                <option value="'.stripslashes($row['gender']).'">'.stripslashes($row['gender']).'</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								
								</select>
								<div class="cleaner_h5"></div>
								<a class="labels">Phone No:<span>*</span></a>
                                <label for="phone2" class="bh-visually-hidden">Stream</label><input type="text" id="phone2" name="stream" class="in_field" value="'.stripslashes($row['phone']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Postal Add:</a>
                                <label for="postal2" class="bh-visually-hidden">House</label><input type="text" id="postal2" name="house" class="in_field" value="'.stripslashes($row['address']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Email:</a>
                                <label for="email2" class="bh-visually-hidden">Course</label><input type="text" id="email2" name="course" class="in_field"  value="'.stripslashes($row['email']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">B.Group:</a>
                                <label for="bgroup2" class="bh-visually-hidden">Bgroup</label><select class="select" id="bgroup2" name="bgroup" style="float:right;border-color:var(--color-danger, #DC2626);"   disabled="disabled" >
                                 <option value="'.stripslashes($row['bgroup']).'">'.stripslashes($row['bgroup']).'</option>
								<option value="">None</option>
								<option value="A Rh+">A Rh+</option>
								<option value="A Rh-">A Rh-</option>
								<option value="B Rh+">B Rh+</option>
								<option value="B Rh-">B Rh-</option>
								<option value="AB Rh+">AB Rh+</option>
								<option value="AB Rh-">AB Rh-</option>
								<option value="O Rh+">O Rh+</option>
								<option value="O Rh-">O Rh-</option>
								</select>
								</div>
							
								<div id="personal"  style="height:300px">
								<h5>Guardian Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Names:</a>
                                <label for="gname2" class="bh-visually-hidden">Gname</label><input type="text" id="gname2" name="gname" class="in_field"   value="'.stripslashes($row['gname']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/>
								<div class="cleaner_h5"></div>
								 <a class="labels">R-ship:</a>
                                <label for="rship2" class="bh-visually-hidden">Rship</label><select class="select" id="rship2" name="rship" style="float:right;border-color:var(--color-danger, #DC2626);"   disabled="disabled" >
								 <option value="'.stripslashes($row['rship']).'">'.stripslashes($row['rship']).'</option>
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
                                <label for="gphone2" class="bh-visually-hidden">Gphone</label><input type="text" id="gphone2" name="gphone" class="in_field"   value="'.stripslashes($row['gcont']).'"  disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								
								<a class="labels">Address:</a>
                                <label for="gaddress2" class="bh-visually-hidden">Gaddress</label><input type="text" id="gaddress2" name="gaddress" class="in_field"   value="'.stripslashes($row['gaddress']).'"   disabled="disabled" style="border-color:var(--color-danger, #DC2626); "/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Date:</a>
                                <label for="Date" class="bh-visually-hidden">Gaddress</label><input type="text" id="Date" name="gaddress" class="in_field"   value="'.date('d/m/Y').'"   disabled="disabled" style="border-color:var(--color-danger, #DC2626);font-weight:BOLD "/> 
								<div class="cleaner_h20"></div>


								
								<input type="button" value="Start New Consultation" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:150px;margin-left:80px" class="in_field" onclick="startcouns('.$pntno.');"/>
			
								<div id="newstudent3" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>';




						break;	


							case 92:
								$a=$_GET['a'];
								if($a==10){
									$x='Counselling CONSULTATIONS';
									$ser=93;
									$table='counselling';
								}
								
									$stamp=date('Ymd');
							echo"<script>$('#cons29').parent().find('input:first').focus();</script>";
							echo'<div id="modalDiv"></div>';
							echo'<div id="alertDiv" style="min-height:90px; width:380px;TOP:20%">
									<div id="tit" style="width:360px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
							<h5 style="margin-right:0px; color:#fff">'.$x.'
							<input type="hidden" id="ser" name="ser"  value="'.$ser.'"/>
						<input type="hidden" id="d" name="ser"  value="'.$a.'"/>
							
							<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5></div>
						<div class="cleaner_h5"></div>';
					$result =mysqli_query($db, "select * from ".$table." where Stamp>='".date('Ymd')."' and  Stamp<='".date('Ymd')."' order by PrescId asc");
			$num_results = mysqli_num_rows($result);
				echo'<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:10px">From:</a>
				<label for="datepick" class="bh-visually-hidden">From:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick" type="text" value="'.date('Y/m/d').'">
				<a class="labels" style="margin-left:10px">To:</a>
				<label for="datepick2" class="bh-visually-hidden">To:</label><input class="input_field" style="float:left; margin-left:10px; width:80px; font-size:11px" id="datepick2" type="text" value="'.date('Y/m/d').'">				
					<img alt="Search Consultations using these dates" src="images/back2.png" style="float:left; margin-left:10px;width:30px;height:30px; cursor:pointer" title="Search Consultations using these dates" onclick="sachcouns(29,1);"/>
					<div class="cleaner"></div>
			<div class="ui-widget" style="margin:0 10px 0 10px; float:left" id="searchpay">
			<a class="labels" style="margin-left:0px">No. of Patients:<strong id="nump"> '.$num_results.'</strong></a>
			<div class="cleaner_h5"></div>
			<label for="cons29" class="bh-visually-hidden">No. of Patients:</label><select id="cons29">
				<option value="">Select one...</option>';
								for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$pid=stripslashes($row['PrescId']);
								echo'<option value="'.stripslashes($row['PrescId']).'">'.stripslashes($row['PatName']).'-'.stripslashes($row['PatId']).'</option>';
							}
		echo'</select>
		</div>';
	echo"<a class=\"labels\" style=\"margin-left:90px\"><strong>Today's Patients</strong></a>";
	echo'<div class="cleaner"></div>
									<div id="title" style="margin-left:10px">
									<div id="figure1" style="margin-left:0px; width:240px">Pat. Name</div>
									<div id="figure1" style="width:69px">Pat. No</div>
									</div><div class="cleaner"></div>
	<div id="inside" style="max-height:108px; overflow-y:auto; margin-left:10px">';
	$resultb =mysqli_query($db, "select * from ".$table."  where Stamp>='".date('Ymd')."' and  Stamp<='".date('Ymd')."' order by PrescId desc");
			$num_resultsb = mysqli_num_rows($resultb);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$pid=stripslashes($rowb['PrescId']);
		if(stripslashes($rowb['Status'])==1){
		echo"<div class=\"normal1\" style=\"\" onclick=\"seeccc('".$pid."',".$ser.")\">";
		}else {echo"<div class=\"normal2\"  style=\"\" onclick=\"seeccc('".$pid."',".$ser.")\">";}
		echo'<div id="figure2" style="width:240px">'.stripslashes($rowb['PatName']).'</div>
		<div id="figure2" style="width:70px">'.stripslashes($rowb['PatId']).'</div>
		</div>
		<div class="cleaner"></div>
		';}
		echo'</div>
		
		<div class="cleaner_h5"></div>
								</div>';	
									break;	

							case 93:
							$pid=$param=$_GET['param'];
							$result =mysqli_query($db, "select * from counselling where PrescId='".$param."'");
							$count = mysqli_num_rows($result);
									if($count==0){
									echo"<script>
									$().customAlert();
									alert('Error!', '<p>There is no patient registered under this Number in the database!</p>');
									e.preventDefault();
									</script>";	
								exit;
							}
							$row=mysqli_fetch_array($result);

							$arr=array();
							$resultb =mysqli_query($db, "select * from counscats order by cat");
							$num_resultsb = mysqli_num_rows($resultb);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$arr[stripslashes($rowb['catid'])]=stripslashes($rowb['cat']);
							}
								
							echo'
							<a class="labels" style="margin-left:10px; font-weight:bold">Name:<b>'.stripslashes($row['PatName']).'</b></a>
							<a class="labels" style="margin-left:10px; font-weight:bold">Category</a>
							<label for="maincat" class="bh-visually-hidden">Category</label><select class="input_field" id="maincat" style="float:left; margin-left:10px;width:250px">';
							echo '<option value="'.stripslashes($row['CatId']).'">'.stripslashes($row['Category']).'</option>';
							foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'" onclick="loadsubcat('.$key.')">'.$val.'</option>';
							}
							echo'</select>';
							$arr=array();
							$resultb =mysqli_query($db, "select * from counscats where catid!='".stripslashes($row['SubCatId'])."' order by name");
							$num_resultsb = mysqli_num_rows($resultb);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$arr[stripslashes($rowb['id'])]=stripslashes($rowb['name']);
							}
							echo'<div id="subcategory" style="margin-left:20px">
									<a class="labels" style="margin-left:10px; font-weight:bold">Sub-Category</a>
									<label for="subcat" class="bh-visually-hidden">Sub-Category</label><select class="input_field" id="subcat" style="float:left; margin-left:10px;width:250px;">
									<option value="'.stripslashes($row['SubCatId']).'">'.stripslashes($row['SubCategory']).'</option>';
									foreach ($arr as $key => $val) {
										echo'<option value="'.$key.'">'.$val.'</option>';
										}
									echo'</select>

							</div>

							<div class="cleaner_h10"></div>';

							
								echo'<script>area43 = new nicEditor({fullPanel : true,maxHeight : 280}).panelInstance("counselling");</script>
								<label for="counselling" class="bh-visually-hidden">Text field</label><textarea id="counselling"  style="float:left;height:270px; width:950px" class="alergy">'.stripslashes($row['Notes']).'</textarea>
								<div class="cleaner_h5"></div>
								<input type="button" value="Save Notes" id="submit"  style="padding:5px 5px; background:#fff;  float:left; cursor:pointer;width:150px;margin-left:20px" class="in_field" onclick="saveconmain('.$pid.');"/>
			
								<div id="newstudent6" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								</div>';

						break;	

						case 94:

						$a=$_GET['a'];

						$arr=array();
							$resultb =mysqli_query($db, "select * from counscats where catid='".$a."' order by name");
							$num_resultsb = mysqli_num_rows($resultb);
							for ($i=0; $i <$num_resultsb; $i++) {
								$rowb=mysqli_fetch_array($resultb);
								$arr[stripslashes($rowb['id'])]=stripslashes($rowb['name']);
							}
								
							echo'
							<a class="labels" style="margin-left:10px; font-weight:bold">Sub-Category</a>
							<label for="subcat" class="bh-visually-hidden">Sub-Category</label><select class="input_field" id="subcat" style="float:left; margin-left:10px;width:250px">';
							echo '<option value="" disabled="disabled" selected="selected">Select One....</option>';
							foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$val.'</option>';
							}
							echo'</select>';


						break;

						case 95:
				
							
				$result = mysqli_query($db, "insert into log values('0','".$username." accesses Nutrition Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="newstude">
							<h2  style="float:left; padding:5px 5px 0 0; margin:0">Nutrition<strong id="debtorp"></strong><strong id="debtord"></strong></h2>';
	echo'<input type="button" value="Exit" id="submit"  style="margin-right:10px;padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:right; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/>';
								
	echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
					<div id="tabs" style="width:1000px; height:436px; float:left; margin:5px 0 0 0px">

						<ul>
						<li style="cursor:pointer" onclick="loadcounspats(9)"><a  href="#tabs-9">New Consultation</a></li>
						<li style="cursor:pointer" onclick="loadcounspresc(10)"><a href="#tabs-10">Consultation</a></li>
						</ul>
						

						
						<div id="tabs-9">


						</div>
						<div id="tabs-10">


						</div>
						

					</div></div>';

				break;

				case 96:
				
				$result = mysqli_query($db, "insert into log values('0','".$username." accesses Waivers Reports Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">';
				echo'<h5 style="margin-right:10px; color:#fff">Waiver Reports';
				echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
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
									cursor:pointer; width:80px" class="select" onclick="enterwaiverrep();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;

					case 97:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Counselling Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Category:</a>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Category:</label><select id="itemname" style="width:260px; margin-left:10px;">
		<option value="All">All</option>';
		$resulta =mysqli_query($db, "select * from counscats order by name");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								echo'<option value="'.stripslashes($rowa['id']).'">'.stripslashes($rowa['name']).'</option>';
							}
		echo'
	</select>
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
									cursor:pointer; width:80px" class="select" onclick="entercounsrep();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;


							case 98:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">All Tests Lab Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
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
									cursor:pointer; width:80px" class="select" onclick="enterlabrep1();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;

					case 99:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Source Lab Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Source:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Source:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">
				<option value="OUTPATIENT">OUTPATIENT</option>
								<option value="MALE WARD">MALE WARD</option>
								<option value="FEMALE WARD">FEMALE WARD</option>
								<option value="MATERNITY">MATERNITY</option>
								<option value="PAEDIATRICS">PAEDIATRICS</option>
				</select>
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
									cursor:pointer; width:80px" class="select" onclick="enterlabrep2();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;


							case 100:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Test Lab Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Test Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Test Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';

				$resulta =mysqli_query($db, "select * from items  where Category='Laboratory' order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);

								echo '	<option value="'.stripslashes($rowa['ItemName']).'">'.stripslashes($rowa['ItemName']).'</option>';
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
									cursor:pointer; width:80px" class="select" onclick="enterlabrep3();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

								case 101:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Sample Lab Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Test Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Test Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';

				$result =mysqli_query($db, "select * from labsamples order by name");
			
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'</option>';
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
									cursor:pointer; width:80px" class="select" onclick="enterlabrep4();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

					case 102:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Patient Lab Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Patient Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Patient Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';
				$result =mysqli_query($db, "SELECT auto,pntno FROM patients ORDER BY fullnames");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".makesafe(stripslashes($row['pntno']))."\">".makesafe(stripslashes($row['fullnames']))."-".makesafe(stripslashes($row['pntno']))."</option>";
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
									cursor:pointer; width:80px" class="select" onclick="enterlabrep5();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;
				case 103:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Section Lab Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Test Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Test Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">
						<option value="LABORATORY_MAIN">LABORATORY_MAIN</option>
							<option value="LAB_HISTOLOGY">LAB_HISTOLOGY</option>
							<option value="LAB_SEROLOGY">LAB_SEROLOGY</option>
							<option value="LAB_MCH">LAB_MCH</option>
							<option value="LAB_HEMATOLOGY">LAB_HEMATOLOGY</option>
							<option value="LAB_BACTERIOLOGY">LAB_BACTERIOLOGY</option>
							<option value="LAB_PARASITOLOGY">LAB_PARASITOLOGY</option>
							<option value="LAB_BIOCHEMISTRY">LAB_BIOCHEMISTRY</option>
				</select>
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
									cursor:pointer; width:80px" class="select" onclick="enterlabrep6();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

					case 104:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">All Tests Radiology Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
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
									cursor:pointer; width:80px" class="select" onclick="enterradrep1();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;


					case 105:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Test Radiology Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Test Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Test Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';

				$resulta =mysqli_query($db, "select * from items  where Category='Radiology' order by ItemName");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);

								echo '	<option value="'.stripslashes($rowa['ItemName']).'">'.stripslashes($rowa['ItemName']).'</option>';
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
									cursor:pointer; width:80px" class="select" onclick="enterradrep2();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

				case 106:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Patient Rad. Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Patient Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Patient Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';
				$result =mysqli_query($db, "SELECT auto,pntno FROM patients ORDER BY fullnames");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".makesafe(stripslashes($row['pntno']))."\">".makesafe(stripslashes($row['fullnames']))."-".makesafe(stripslashes($row['pntno']))."</option>";
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
									cursor:pointer; width:80px" class="select" onclick="enterradrep3();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

				case 107:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Pharmacy Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
					<option value="1">Dispensed</option>
					<option value="0">Not Dispensed</option>
					<option value="2">All</option>
				</select>
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
									cursor:pointer; width:80px" class="select" onclick="enterpharmrep1();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;

							case 108:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Patient Pharm. Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Dispensed</option>
					<option value="0">Not Dispensed</option>
					<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Patient Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Patient Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';
				$result =mysqli_query($db, "SELECT auto,pntno FROM patients ORDER BY fullnames");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".makesafe(stripslashes($row['pntno']))."\">".makesafe(stripslashes($row['fullnames']))."-".makesafe(stripslashes($row['pntno']))."</option>";
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
									cursor:pointer; width:80px" class="select" onclick="enterpharmrep2();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

				case 109:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Theatre Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
					<option value="1">Dispensed</option>
					<option value="0">Not Dispensed</option>
					<option value="2">All</option>
				</select>
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
									cursor:pointer; width:80px" class="select" onclick="entertheatrep1();"/>
					<div class="cleaner"></div>
						
						</div>';
							break;

				case 110:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">By Patient Theatre Reports
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Dispensed</option>
					<option value="0">Not Dispensed</option>
					<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Patient Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Patient Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';
				$result =mysqli_query($db, "SELECT auto,pntno FROM patients ORDER BY fullnames");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".makesafe(stripslashes($row['pntno']))."\">".makesafe(stripslashes($row['fullnames']))."-".makesafe(stripslashes($row['pntno']))."</option>";
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
									cursor:pointer; width:80px" class="select" onclick="entertheatrep2();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;


							case 111:
							echo"<script>$('.combos').parent().find('input:first').width(130);</script>";
							$result = mysqli_query($db, "insert into log values('0','".$username." accesses New Asset Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
							 echo'<div id="page">
							 <div id="newstude">
								<h2 style="float:left; padding:5px 5px 0 0; margin:0;">New Asset Information</h2>';
								echo'
									<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;"></div>
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewasset(1);"/></div>';
										

								echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
								<form method="post" name="personal_form" action="#">
								<input type="hidden" name="post" value="Send" />
								<div id="personal">
								<h5>Asset Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Asset ID:<span>*</span></a>
                                <label for="assid" class="bh-visually-hidden">Field</label><input type="text" id="assid" name="field" class="in_field" value="" style="border-color:var(--color-danger, #DC2626)" onkeyup="setstamp()"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Asset Name:<span>*</span></a>
                                <label for="assname" class="bh-visually-hidden">Field</label><input type="text" id="assname" name="field" class="in_field" style="text-transform:uppercase"/>
								<div class="cleaner_h5"></div>
								<a class="labels" style="margin-left:0px">Category:<span>*</span></a>
	<div class="ui-widget" style="margin-right:25px; float:right">
					<label for="asscat" class="bh-visually-hidden">Category:</label><select class="combos" id="asscat" style="width:200px; margin-left:10px;">
						<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from assetsubcategories  order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option value="'.stripslashes($row['id']).'">'.stripslashes($row['name']).'</option>';
						
							}
										
						echo'</select></div>
	<div class="cleaner_h5"></div>
								<a class="labels">Vendor:</a>
                                <label for="vname" class="bh-visually-hidden">Field</label><input type="text" id="vname" name="field" class="in_field" style="text-transform:uppercase"/> 
								<div class="cleaner_h5"></div>
								 <a class="labels">Date of Purchase:</a>
			<input id="dop" style="width:100px" name="dop" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10">
								<div class="cleaner_h5"></div>
							<a class="labels">Disposal Date:</a>
                                <input placeholder="dd/mm/yyyy" type="text" maxlength="10" id="dispdate"  class="in_field" style="width:130px"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Location:</a>
                                <label for="location" class="bh-visually-hidden">Location:</label><input type="text" id="location"  class="in_field"/> 
								<div class="cleaner_h5"></div>
									<a class="labels">Price:</a>
                                <label for="price" class="bh-visually-hidden">Price:</label><input type="text" id="price" class="in_field"/> 
								<div class="cleaner_h5"></div>
								<a class="labels" >App/Dep. Rate:<span>[%]</span></a>
                                <label for="deprate" class="bh-visually-hidden">Appreciation/Depreciation Rate per year in Percent</label><input type="text" id="deprate"  class="in_field"title="Appreciation/Depreciation Rate per year in Percent" style="width:110px" /> 
								<div class="cleaner_h5"></div>
								
								
								</div>
							
								
								
								<div id="personal" style="width:491px">
								<h5>Other Details[NOTES]</h5>
								<div class="cleaner_h5"></div>
								<script>
								area1=new nicEditor({fullPanel : true,maxHeight : 300}).panelInstance("odetail");
								</script>
								<label for="odetail" class="bh-visually-hidden">Text field</label><textarea id="odetail" style="float:left;width:470px;height:290px;"></textarea>
								</div>
								<div id="personal">
								</form>
								<h5>Upload Photo</h5>';
								echo'<div class="cleaner_h5"></div>
								
							
								<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
      							
								<dd class="custuploadblock_js">
								<label for="photoupload" class="bh-visually-hidden">Image</label><input style="opacity:0; float:left;" name="image" id="photoupload"  
								class="transfileform_js" type="file">
								</dd>
								<iframe name="leiframe" id="leiframe" class="leiframe">
								</iframe>
                            	<input type="hidden" id="stamp" name="stamp" value=""/>
								<input type="hidden" id="id" name="id"  value="9"/>
								<div class="cleaner_h20"></div>
     							<input type="submit" value="upload" id="send"  
								style="margin-left:50px; float:left; cursor:pointer"class="in_field"/>
								</form>
								</div>
								</div>
   							';
						
							
							break;
							
						
							
							case 112:
					$a=$_GET['a'];
					echo"<script>$('#ass1').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			
			if($a==113){
				echo'Edit Asset Information';
			}
			if($a==114){
				echo'Delete Asset Record';
			}
			
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="ass1" class="bh-visually-hidden">Text field</label><select id="ass1" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from assets order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$assid=stripslashes($row['id']);
								echo'<option value="'.$assid.'">'.stripslashes($row['assetid']).'-'.stripslashes($row['name']).'-{'.stripslashes($row['category']).'}</option>';
							}
		echo'
	</select>
	</div>
				</div>';
							
							break;
							
								case 113:
								$reg=$_GET['param'];
							echo"<script>$('.combos').parent().find('input:first').width(130);</script>";
							$result = mysqli_query($db, "insert into log values('0','".$username." accesses Edit Asset Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
								$resultd =mysqli_query($db, "select * from assets where id='".$reg."'");
							$rowd=mysqli_fetch_array($resultd);	
							 echo'<div id="page">
							 <div id="newstude">
								<h2 style="float:left; padding:5px 5px 0 0; margin:0;">Edit Asset Information</h2>';
								echo'
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewasset(2);"/></div>';
										

								echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
								<form method="post" name="personal_form" action="#">
								<input type="hidden" name="post" value="Send" />
								<div id="personal">
								<h5>Asset Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Asset ID:<span>*</span></a>
                                <label for="assid" class="bh-visually-hidden">Field</label><input type="text" id="assid" name="field" class="in_field" value="'.stripslashes($rowd['assetid']).'" style="border-color:var(--color-danger, #DC2626)" onkeyup="setstamp()"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Asset Name:<span>*</span></a>
                                <label for="assname" class="bh-visually-hidden">Field</label><input type="text" id="assname" name="field" class="in_field" style="text-transform:uppercase" value="'.stripslashes($rowd['name']).'"/>
								<div class="cleaner_h5"></div>
								<a class="labels" style="margin-left:0px">Category:<span>*</span></a>
	<div class="ui-widget" style="margin-right:25px; float:right">
					<label for="asscat" class="bh-visually-hidden">Category:</label><select class="combos" id="asscat" style="width:200px; margin-left:10px;">
					<option value="'.stripslashes($rowd['subcatid']).'" selected="selected">'.stripslashes($rowd['category']).'</option>';
							$result =mysqli_query($db, "select * from assetsubcategories  order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option value="'.stripslashes($row['id']).'">'.stripslashes($row['name']).'</option>';
						
							}
										
						echo'</select></div>
	<div class="cleaner_h5"></div>
								<a class="labels">Vendor:</a>
                                <label for="vname" class="bh-visually-hidden">Field</label><input type="text" id="vname" name="field" class="in_field" style="text-transform:uppercase" value="'.stripslashes($rowd['vendor']).'"/> 
								<div class="cleaner_h5"></div>
								 <a class="labels">Date of Purchase:</a>
			<input id="dop" style="width:100px" name="dop" class="in_field"  placeholder="dd/mm/yyyy" type="text" maxlength="10" value="'.stripslashes($rowd['dateofpurchase']).'">
								<div class="cleaner_h5"></div>
							<a class="labels">Disposal Date:</a>
                                <input placeholder="dd/mm/yyyy" type="text" maxlength="10" id="dispdate"  class="in_field" style="width:130px" value="'.stripslashes($rowd['disposaldate']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Location:</a>
                                <label for="location" class="bh-visually-hidden">Location:</label><input type="text" id="location"  class="in_field" value="'.stripslashes($rowd['location']).'"/> 
								<div class="cleaner_h5"></div>
									<a class="labels">Price:</a>
                                <label for="price" class="bh-visually-hidden">Price:</label><input type="text" id="price" class="in_field" value="'.stripslashes($rowd['price']).'"/> 
								<div class="cleaner_h5"></div>
								<a class="labels" >App/Dep. Rate:<span>[%]</span></a>
                                <label for="deprate" class="bh-visually-hidden">Appreciation/Depreciation Rate per year in Percent</label><input type="text" id="deprate"  class="in_field"title="Appreciation/Depreciation Rate per year in Percent" style="width:110px" value="'.stripslashes($rowd['deprate']).'" /> 
								<div class="cleaner_h5"></div>
								
								
								</div>
							
								
								
								<div id="personal" style="width:491px">
								<h5>Other Details[NOTES]</h5>
								<div class="cleaner_h5"></div>
								<script>
								area1=new nicEditor({fullPanel : true,maxHeight : 300}).panelInstance("odetail");
								</script>
								<label for="odetail" class="bh-visually-hidden">Text field</label><textarea id="odetail" style="float:left;width:470px;height:290px;">'.stripslashes($rowd['odetail']).'</textarea>
								</div>
								<div id="personal">
								</form>
								<h5>Upload Photo</h5>';
								echo'<div class="cleaner_h5"></div>
								
							
								<form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
      							
								<dd class="custuploadblock_js">
								<label for="photoupload" class="bh-visually-hidden">Image</label><input style="opacity:0; float:left;" name="image" id="photoupload"  
								class="transfileform_js" type="file">
								</dd>
								<iframe name="leiframe" id="leiframe" class="leiframe"  src="images/assets/'.stripslashes($rowd['assetid']).'.jpg">
								</iframe>
                            	<input type="hidden" id="stamp" name="stamp" value=""/>
								<input type="hidden" id="id" name="id"  value="9"/>
								<div class="cleaner_h20"></div>
     							<input type="submit" value="upload" id="send"  
								style="margin-left:50px; float:left; cursor:pointer"class="in_field"/>
								</form>
								</div>
								</div>
   							';
						
							
							break;
							
							case 114:
							$assno=$_GET['param'];
							$result = mysqli_query($db, "DELETE from assets where id='".$assno."'");
							if($result){
						$resulta = mysqli_query($db, "insert into log values('0','".$username." deletes data from assets database.Asset No:".$assno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
								echo"<script>
										$().customAlert();
										alert('Success!', '<p>Delete Succesful.</p>');
										e.preventDefault();
										</script>"	;
							}else{echo"
										<script>
										$().customAlert();
										alert('Sorry!', '<p>Delete not Succesful.</p>');
										e.preventDefault();
										</script>";}
							break;
							
							case 115:
							$param='Default';
							
echo"<script>$('#cus2').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Assets Search Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

							echo'
							<div id="newstude">
								<div id="findstude"><h5 style="margin-left:10px">Assets Search Panel</h5>';
							
									
							echo'<div class="ui-widget" style="margin:0 10px 0 10px; float:left">
	<label for="ass2" class="bh-visually-hidden">Assets Search Panel</label><select id="ass2">
		<option value="">Select one...</option>';
		$resulta =mysqli_query($db, "select * from assets order by assetid");
							$num_resultsa = mysqli_num_rows($resulta);	
							for ($i=0; $i <$num_resultsa; $i++) {
								$rowa=mysqli_fetch_array($resulta);
								$assid=stripslashes($rowa['id']);
								echo'<option value="'.$assid.'">'.stripslashes($rowa['assetid']).'-'.stripslashes($rowa['name']).'-{'.stripslashes($rowa['category']).'}</option>';}
	echo'</select>
	</div>';			
	echo'<div id="results" style="min-height:350px; min-width:700px">';
										
										if(isset($_GET['param'])){
										$param=$_GET['param'];}
										else $param='default';
										echo'
										<div id="loading" ></div>
                    					<div id="display" style="height:310px;"></div>
                						<div class="cleaner_h5"></div>';
                    					if($param=='default'){
                    					echo "<script>paginate(17,'".$param."');</script>";
										recent(9,18);
										}
										
											else {
											echo "<script>paginate(18,'".$param."');</script>";
										recent(9,18);
											}	
							
							break;
							
							case 116:
					$a=$_GET['a'];
					echo"<script>$('#ass3').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			
			if($a==117){
				echo'ASSET ASSIGNMENT';
			}
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="ass3" class="bh-visually-hidden">Text field</label><select id="ass3" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from assets where status=1 order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$assid=stripslashes($row['id']);
								echo'<option value="'.$assid.'">'.stripslashes($row['assetid']).'-'.stripslashes($row['name']).'-{'.stripslashes($row['category']).'}</option>';
							}
		echo'
	</select>
	</div>
				</div>';
							
							break;
							
								case 117:
								$reg=$_GET['param'];
							echo"<script>$('.combos').parent().find('input:first').width(130);</script>";
							$result = mysqli_query($db, "insert into log values('0','".$username." accesses Assign Asset Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
								$resultd =mysqli_query($db, "select * from assets where id='".$reg."'");
							$rowd=mysqli_fetch_array($resultd);	
							 echo'<div id="page">
							 <div id="newstude">
								<h2 style="float:left; padding:5px 5px 0 0; margin:0;">Assign Asset-Asset Code:'.stripslashes($rowd['assetid']).'</h2>';
								echo'
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="assignnewasset();"/></div>';
										

								echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
								<div id="personal">
								<h5>Asset Photo</h5>';
								echo'<div class="cleaner_h5"></div>
								
								<iframe name="leiframe" style="width:170px; height:170px; margin-left:30px; float:left" id="leiframe" class="leiframe"  src="images/assets/'.stripslashes($rowd['assetid']).'.jpg">
								</iframe>
								<h5>Asset Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Asset ID:<span>*</span></a>
                                <label for="assid" class="bh-visually-hidden">Field</label><input type="text" id="assid" name="field" class="in_field" value="'.stripslashes($rowd['assetid']).'" style="border-color:var(--color-danger, #DC2626)" disabled="disabled" onkeyup="setstamp()"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Asset Name:<span>*</span></a>
                                <label for="assname" class="bh-visually-hidden">Field</label><input type="text" id="assname" name="field" class="in_field" style="text-transform:uppercase;border-color:var(--color-danger, #DC2626)" disabled="disabled" value="'.stripslashes($rowd['name']).'"/>
								<div class="cleaner_h5"></div>
								<a class="labels">Location:</a>
                                <label for="location" class="bh-visually-hidden">Location:</label><input type="text" id="location"  class="in_field" style="border-color:var(--color-danger, #DC2626)" disabled="disabled" value="'.stripslashes($rowd['location']).'"/> 
								<div class="cleaner_h5"></div>
									<a class="labels">Price:</a>
                                <label for="price" class="bh-visually-hidden">Price:</label><input type="text" id="price" class="in_field" style="border-color:var(--color-danger, #DC2626)" disabled="disabled" value="'.stripslashes($rowd['price']).'"/> 
								<div class="cleaner_h5"></div>
								
                            	</div>
								<div id="personal">
									<h5>Assignment Details</h5>
									<a class="labels">Assigned To:<span>*</span></a>
			<label for="assignto" class="bh-visually-hidden">Assignto</label><input id="assignto" name="assignto" class="in_field"  type="text" >
								<div class="cleaner_h5"></div>
									<a class="labels">Assigned By:<span>*</span></a>
			<label for="assignby" class="bh-visually-hidden">Assignby</label><input id="assignby" name="assignby" class="in_field"  type="text" >
								<div class="cleaner_h5"></div>
								
								<a class="labels">Date of Assign:<span>*</span></a>
			<label for="datepick" class="bh-visually-hidden">Doa</label><input id="datepick" style="width:100px" name="doa" class="in_field"  type="text" maxlength="10" value="'.date('Y/m/d').'">
								<div class="cleaner_h5"></div>
								<a class="labels">Date of Return:</a>
			<label for="datepick2" class="bh-visually-hidden">Dor</label><input id="datepick2" style="width:100px" name="dor" class="in_field"  type="text" maxlength="10" value="">
								<div class="cleaner_h5"></div>
						
								
							
								
								
								</div>
							
								
								
								<div id="personal" style="width:491px">
								<h5>Assignment NOTES</h5>
								<div class="cleaner_h5"></div>
								<script>
								area1=new nicEditor({fullPanel : true,maxHeight : 300}).panelInstance("odetail");
								</script>
								<label for="odetail" class="bh-visually-hidden">Assignment NOTES</label><textarea id="odetail" style="float:left;width:470px;height:290px;"></textarea>
								</div>
								
								</div>
   							';
						
							
							break;
							
							case 118:
					$a=$_GET['a'];
					echo"<script>$('#ass4').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			
			if($a==119){
				echo'ASSET Return';
			}
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="ass4" class="bh-visually-hidden">Text field</label><select id="ass4" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from assignments where status=1 order by assname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$assid=stripslashes($row['id']);
								echo'<option value="'.$assid.'">'.stripslashes($row['assid']).'-'.stripslashes($row['assname']).'</option>';
							}
		echo'
	</select>
	</div>
				</div>';
							
							break;
							
							case 119:
								$reg=$_GET['param'];
							echo"<script>$('.combos').parent().find('input:first').width(130);</script>";
							$result = mysqli_query($db, "insert into log values('0','".$username." accesses Assign return Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");
							$resulte=mysqli_query($db, "select * from assignments where id='".$reg."'");
							$rowe=mysqli_fetch_array($resulte);	
							
							$resultd =mysqli_query($db, "select * from assets where assetid='".stripslashes($rowe['assid'])."'");
							$rowd=mysqli_fetch_array($resultd);	
							
							 echo'<div id="page">
							 <div id="newstude">
								<h2 style="float:left; padding:5px 5px 0 0; margin:0;">Return Asset-Asset Code:'.stripslashes($rowd['assetid']).'</h2>';
								echo'
								<div id="saveclose" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Exit" id="submit"  style="padding:2px 5px; border-color:#fff; background:var(--color-danger, #DC2626); float:left; cursor:pointer;width:50px" class="in_field" onclick="hidenewstude();"/></div>
								<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;">
								<input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="returnnewasset('.$reg.');"/></div>';
										

								echo'<div class="cleaner" style="border-bottom:2px solid #333"></div>
								<div id="personal">
								<h5>Asset Photo</h5>';
								echo'<div class="cleaner_h5"></div>
								
								<iframe name="leiframe" style="width:170px; height:170px; margin-left:30px; float:left" id="leiframe" class="leiframe"  src="images/assets/'.stripslashes($rowd['assetid']).'.jpg">
								</iframe>
								<h5>Asset Details</h5>
								<div class="cleaner_h5"></div>
								<a class="labels">Asset ID:<span>*</span></a>
                                <label for="assid" class="bh-visually-hidden">Field</label><input type="text" id="assid" name="field" class="in_field" value="'.stripslashes($rowd['assetid']).'" style="border-color:var(--color-danger, #DC2626)" disabled="disabled" onkeyup="setstamp()"/> 
								<div class="cleaner_h5"></div>
								<a class="labels">Asset Name:<span>*</span></a>
                                <label for="assname" class="bh-visually-hidden">Field</label><input type="text" id="assname" name="field" class="in_field" style="text-transform:uppercase;border-color:var(--color-danger, #DC2626)" disabled="disabled" value="'.stripslashes($rowd['name']).'"/>
								<div class="cleaner_h5"></div>
								<a class="labels">Location:</a>
                                <label for="location" class="bh-visually-hidden">Location:</label><input type="text" id="location"  class="in_field" style="border-color:var(--color-danger, #DC2626)" disabled="disabled" value="'.stripslashes($rowd['location']).'"/> 
								<div class="cleaner_h5"></div>
									<a class="labels">Price:</a>
                                <label for="price" class="bh-visually-hidden">Price:</label><input type="text" id="price" class="in_field" style="border-color:var(--color-danger, #DC2626)" disabled="disabled" value="'.stripslashes($rowd['price']).'"/> 
								<div class="cleaner_h5"></div>
								
                            	</div>
								<div id="personal">
									<h5>Assignment Details</h5>
									<a class="labels">Assigned To:<span>*</span></a>
			<label for="assignto" class="bh-visually-hidden">Assignto</label><input id="assignto"  name="assignto" class="in_field"  type="text" style="border-color:var(--color-danger, #DC2626)" disabled="disabled" value="'.stripslashes($rowe['assto']).'"  >
								<div class="cleaner_h5"></div>
									<a class="labels">Assigned By:<span>*</span></a>
			<label for="assignby" class="bh-visually-hidden">Assignby</label><input id="assignby"  name="assignby" class="in_field"  type="text" style="border-color:var(--color-danger, #DC2626)" disabled="disabled"  value="'.stripslashes($rowe['assby']).'" >
								<div class="cleaner_h5"></div>
								
								<a class="labels">Date of Assign:<span>*</span></a>
			<label for="datepick" class="bh-visually-hidden">Doa</label><input id="datepick" style="width:100px;border-color:var(--color-danger, #DC2626)" name="doa" class="in_field"   disabled="disabled"  type="text" maxlength="10"  value="'.stripslashes($rowe['doa']).'">
								<div class="cleaner_h5"></div>
								<a class="labels">Received By:<span>*</span></a>
			<label for="receivedby" class="bh-visually-hidden">Receivedby</label><input id="receivedby" name="receivedby" class="in_field"  type="text" >
								<div class="cleaner_h5"></div>
								<a class="labels">Date of Return:<span>*</span></a>
			<label for="datepick2" class="bh-visually-hidden">Dor</label><input id="datepick2" style="width:100px" name="dor" class="in_field"  type="text" maxlength="10"   value="'.stripslashes($rowe['dor']).'">
								<div class="cleaner_h5"></div>
						
								
							
								
								
								</div>
							
								
								
								<div id="personal" style="width:491px">
								<h5>Assignment/Reception NOTES</h5>
								<div class="cleaner_h5"></div>
								<script>
								area1=new nicEditor({fullPanel : true,maxHeight : 300}).panelInstance("odetail");
								</script>
								<label for="odetail" class="bh-visually-hidden">Assignment/Reception NOTES</label><textarea id="odetail" style="float:left;width:470px;height:290px;">'.stripslashes($rowe['odetail']).'</textarea>
								</div>
								
								</div>
   							';
						
							
							break;
							
								case 120:
					$a=$_GET['a'];
					echo"<script>$('#ass5').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			
			if($a==144){
				echo'ASSET Disposal';
			}
			if($a==121){
				echo'ASSET Management';
			}
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="ass5" class="bh-visually-hidden">Text field</label><select id="ass5" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
	$result =mysqli_query($db, "select * from assets where status!=0 order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$assid=stripslashes($row['id']);
								echo'<option value="'.$assid.'">'.stripslashes($row['assetid']).'-'.stripslashes($row['name']).'-{'.stripslashes($row['category']).'}</option>';
							}
		echo'
	</select>
	</div>
				</div>';
							
							break;
							
								
								case 121:
						$param=$_GET['param'];
						$result = mysqli_query($db, "select * from assets where id='".$param."'");
						$row=mysqli_fetch_array($result);
						$regn=stripslashes($row['assetid']);
						$price=stripslashes($row['price']);
						$name=stripslashes($row['name']);
					echo"<script>$('#ass5').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">ASSET MANAGEMENT';
			
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<a class="labels"  style="margin-left:10px">Code:<b>'.$regn.'</b></a>
		<div class="cleaner_h5"></div>
		<a class="labels"  style="margin-left:10px">Name:<b>'.$name.'</b></a>
		<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:10px">Notes<span>*</span></a>
		<label for="odetail" class="bh-visually-hidden">Notes</label><textarea id="odetail" class="alergy" style="float:left;width:280px;height:100px;MARGIN-LEFT:10PX"></textarea>
		<div class="cleaner_h5"></div>
					<a class="labels"  style="margin-left:10px">Amount:<span>*</span></a>
			<label for="amount" class="bh-visually-hidden">Amount</label><input id="amount"  name="amount" class="in_field"  type="text" style="float:right; margin-right:10px" value=""  >
		<div class="cleaner_h5"></div>
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="manageasset('.$param.');"/>
					<div class="cleaner"></div>
				<div class="cleaner_h10"></div>
			</div>';
							
							break;



					case 122:
					$result = mysqli_query($db, "insert into log values('0','".$username." accesses Asset Count Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo"<script>$('#categ96').parent().find('input:first').focus().width(250);</script>";
				echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
			echo"<h5 style=\"margin-right:10px; color:#fff\">Asset Count:";
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()">
				</h5></div>
				<div class="cleaner_h5"></div>
					<a class="labels" style="float:left; margin-left:10px;">Category:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="categ96" class="bh-visually-hidden">Category:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="categ96">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from assetsubcategories");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['id']).'">'.stripslashes($row['name']).'</option>';
							}
							
							echo'	<option value="All">ALL</option></select></div>
				<div class="cleaner_h10"></div>
				</div>
								</div>	
		';
							break;


								case 123:
					echo"<script>$('#ass99').parent().find('input:first').width(250).focus();</script>";
				echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Assets List
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
				<label for="ass99" class="bh-visually-hidden">Assets List</label><select id="ass99" style="width:260px; margin-left:10px;">
				<option value="">Select one...</option>
		<option value="1">Active Assets</option>
		<option value="0">Disposed Assets</option>
		<option value="2">All Assets</option>
	</select>
	</div>
						<div class="cleaner_h5"></div>
						
						</div>';
							break;
							
								case 124:
				echo"<script>$('#ass97').parent().find('input:first').focus().width(230);</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			
		echo'Asset Tracking Report';
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<a class="labels" style="margin-left:5px">Asset:</a>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:200px">
		<label for="ass97" class="bh-visually-hidden">Asset:</label><select id="ass97" style="width:240px; margin-left:5px;">
		<option value="">Select one...</option>';
		$result =mysqli_query($db, "select * from assets order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$assid=stripslashes($row['id']);
								echo'<option value="'.$assid.'">'.stripslashes($row['assetid']).'-'.stripslashes($row['name']).'-{'.stripslashes($row['category']).'}</option>';
							}
		echo'
	</select>
	</div>
	
	<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:5px">From:</a>
				<label for="datepick" class="bh-visually-hidden">Doe</label><input id="datepick" name="doe" class="in_field" type="text"  style="width:80%;float:right; margin-right:10px"> 
				<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:5px">To:</a>
			 <label for="datepick2" class="bh-visually-hidden">Doe</label><input id="datepick2" name="doe" class="in_field" v  type="text"  style="width:80%;float:right; margin-right:10px"> 
			 <div class="cleaner"></div>
					<input aria-label="Viewall" type="checkbox" style="float:left; margin:8px 5px 0 30px" name="viewall" value="1">
					<a class="labels" style="margin-left:10px; float:left">View All</a>
			 	<div class="cleaner_h5"></div>
			
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterasstrack();"/>
						<div class="cleaner_h5"></div>
				</div>';
							
							break;
							case '1255555555555555':
							
								$result = mysqli_query($db, "insert into log values('','".$username." accesses Bank Transactions Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

								echo'
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;">
							<div style="width:456px; float:left">	
							<h5 style="text-align:center; margin-top:20px">Bank Transactions</h5>';
																
							echo'<div class="cleaner_h5"></div>
							 <a class="labels"  style="float:left; margin-left:10px;">Choose Action:</a>
                                 <label for="action" class="bh-visually-hidden">Rship</label><select class="select" id="action" name="rship" style="float:right; margin-left:30px;">
								<option value="Cash Deposit">Cash Deposit</option>
								<option value="Cash Withdrawal">Cash Withdrawal</option>
								<option value="Cheque Deposit">Cheque Deposit</option>
								<option value="Cheque Payment">Cheque Payment</option>
								<option value="Bank Transfer">Bank Transfer</option>
								<option value="RTGS">RTGS</option>
								<option value="Bank Payment">Bank Payment</option>
								</select> 
								<div class="cleaner_h5"></div>
						<a class="labels" style="float:left; margin-left:10px;">Bank Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="drledger" class="bh-visually-hidden">Bank Account:</label><select style="float:left; margin-left:20px; width:250px" class="select" id="drledger">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from ledgers where type='Asset' order by name");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$name=stripslashes($row['name']);
									$value=stripslashes($row['ledgerid']);
									echo'<option value="'.$value.'">'.$name.'</option>';
									
							}
										
										echo'</select></div>
										<div class="cleaner_h5"></div>
				

		<div id="actvexpdiv1" style="display:none;">

						<a class="labels" style="float:left; margin-left:10px;">Expense Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="expaccledger" class="bh-visually-hidden">Expense Account:</label><select style="float:left; margin-left:20px; width:250px" class="select" id="expaccledger">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from ledgers where type='Expense' order by name");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$name=stripslashes($row['name']);
									$value=stripslashes($row['ledgerid']);
									echo'<option value="'.$value.'">'.$name.'</option>';
									
							}
						echo'</select>
						</div>
						<div class="cleaner_h5"></div>
						<a class="labels" style="float:left; margin-left:10px;">Date:<span>*</span></a>
					    <label for="datepick2" class="bh-visually-hidden">Name</label><input type="text" id="datepick2" name="name" class="input_field" value="'.date('Y/m/d').'"  style="width:240px; float:right; margin-right:10px"/>		
					     <div class="cleaner_h5"></div>	
		</div>

		<div class="cleaner_h5"></div>
		<a class="labels" style="float:left; margin-left:10px;">Amount:<span>*</span></a>
		<label for="amount" class="bh-visually-hidden">Name</label><input type="text" id="amount" name="name" class="input_field" value=""  style="width:240px; float:right; margin-right:10px"/>		
		<div class="cleaner_h5"></div>	
			<a class="labels" style="margin-left:10px">Notes:<span>*</span></a>
			<label for="desc" class="bh-visually-hidden">Notes:</label><textarea id="desc" class="input_field"  style="width:240px;height:100px; margin-right:10px; float:right; font-size:11px"/>
	<div class="cleaner_h20"></div>';
			echo"<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:220px; float:left; cursor:pointer;width:60px\" class=\"input_field\" onclick=\"savebankdepp();\"/>";							
		echo'<div id="postresp" style="float:left; width:40px;height:40px; margin-left:20px"></div>';
							echo'</div>
							
							
						<div style="width:400px; float:left; border-left:2px solid #0085b2; height:400px; margin-left:50px; padding-left:20px; margin-top:20px">
							<h5 style="text-align:center; ">CURRENT CASH IN HAND BALANCE</h5>
							<div class="cleaner_h5"></div>
						<div style="height:380px; width:400px; overflow-y:auto;">';
						$result =mysqli_query($db, "select * from ledgers where ledgerid='626'");
						$row=mysqli_fetch_array($result);
						echo'<p style="color:var(--color-danger, #DC2626); font-size:13px">BALANCE:<strong id="cashbal">'.stripslashes($row['bal']).'</strong></p>';
						echo'
						</div>
						</div>	
							
							</div>

							</div>
							';
							break;

	case '125':
		$output = '';
		@mysqli_query($db, "insert into log values('','" . $username . ": Accesses Bank Transactions Panel.','" . $username . "','" . date('YmdHi') . "','" . date('H:i') . "','" . date('d/m/Y') . "','1')");

		$output .= '
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;overflow-y:auto;">
							<div style="width:456px; margin:5px; float:left;">	
							<h5 style="text-align:center; margin-top:20px">Bank Transactions</h5>';

		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<div id="bank_trans_action_div" style="width:470px;float:left;">';
		$output .= '<a class="labels" style="float:left; margin-right:90px;">Choose Action: </a>
              	<label for="banktrans_action" class="bh-visually-hidden">Rship</label><select class="select" id="banktrans_action" name="rship" style="float:right; margin-left:10px;">
									<option value="Cash Deposit">Cash Deposit</option>
									<option value="Bank Withdrawal">Bank Withdrawal</option>';
		$output .= '<option value="Bank Transfer">Bank Transfer</option>';
		$output .= '<option value="Fund Petty Cash">Fund Petty Cash</option>';
		$output .= '<option value="Uncaptured Bank Deposits">Uncaptured Bank Deposits</option>';
		$output .= '</select>';
		$output .= '</div>';

		$output .= '<div id="banktrans_drledgerdiv">';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left;">Bank Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
									<label for="banktrans_drledger" class="bh-visually-hidden">Bank Account:</label><select id="banktrans_drledger" style="float:left; margin-left:20px; width:250px" class="select">
											<option value=""></option>';
		$result2 = mysqli_query($db, "SELECT `ledgerid`,`bal`,`name`,`category`,`isMainLedger` FROM ledgers WHERE `type`='Asset' AND `category`='Bank' AND `isSubledger`!=1 ORDER BY `name` ");
		while ($row = mysqli_fetch_assoc($result2)) {
			$output .= '<option value="' . intval($row['ledgerid']) . '" data-mcat="' . trim(stripslashes($row['category'])) . '" data-main="' . intval($row['isMainLedger']) . '">' . stripslashes($row['name']) . ' ' . number_format(floatval($row['bal']), 2, '.', ',') . '</option>';
		}
		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '</div>';

		$output .= '<div id="banktrans_subledgerdiv" style="width:470px;float:left;display:none;">	
				<a class="labels">Bank Account Subledger:<span>*</span> </a>			
				   <div class="ui-widget" style="margin-right:10px;float:right;">					
						<label for="banktrans_subledgerid" class="bh-visually-hidden">Bank Account Subledger:</label><select id="banktrans_subledgerid" class="input_field" style="width:252px;margin-right:15px;">
								<option value=""></option>';
		$output .= '</select>';
		$output .= '</div>';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '</div>';

		$output .= '<div id="banktrans_transferbanks" style="display:none;">';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left;">Bank Account: (Source)<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
									<label for="banktrans_sourceledgerid" class="bh-visually-hidden">Bank Account: (Source)</label><select id="banktrans_sourceledgerid" style="float:left; margin-left:20px; width:250px" class="select" >
											<option value=""></option>';
		$resulta1 = mysqli_query($db, "SELECT `ledgerid`,`bal`,`name`,`category`,`isMainLedger` FROM ledgers WHERE `type`='Asset' AND `category`='Bank' AND `isSubledger`!=1 ORDER BY `name` ");
		while ($rowa = mysqli_fetch_assoc($resulta1)) {
			$output .= '<option value="' . intval($rowa['ledgerid']) . '" data-mcat="' . trim(stripslashes($rowa['category'])) . '" data-main="' . intval($rowa['isMainLedger']) . '">' . stripslashes($rowa['name']) . ' ' . number_format(floatval($rowa['bal']), 2, '.', ',') . '</option>';
		}
		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<div id="banktrans_source_subledgerdiv" style="width:470px;float:left;display:none;">	
				<a class="labels">Source Account Subledger:<span>*</span> </a>
				   <div class="ui-widget" style="margin-right:10px; float:right;">								
					  <label for="banktrans_source_subledgerid" class="bh-visually-hidden">Source Account Subledger:</label><select id="banktrans_source_subledgerid" class="input_field" style="width:252px;margin-right:15px;">
						<option value=""></option>';
		$output .= '</select>';
		$output .= '</div>';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '</div>';

		$output .= '<a class="labels" style="float:left;">Bank Account: (Recipient)<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
									<label for="banktrans_recipientledgerid" class="bh-visually-hidden">Bank Account: (Recipient)</label><select id="banktrans_recipientledgerid" style="float:left; margin-left:20px; width:250px" class="select">
											<option value=""></option>';
		$resulta2 = mysqli_query($db, "SELECT `ledgerid`,`bal`,`name`,`category`,`isMainLedger` FROM ledgers WHERE `type`='Asset' AND `category`='Bank' AND `isSubledger`!=1 ORDER BY `name` ");
		while ($rowa = mysqli_fetch_assoc($resulta2)) {
			$output .= '<option value="' . intval($rowa['ledgerid']) . '" data-mcat="' . trim(stripslashes($rowa['category'])) . '" data-main="' . intval($rowa['isMainLedger']) . '">' . stripslashes($rowa['name']) . ' ' . number_format(floatval($rowa['bal']), 2, '.', ',') . '</option>';
		}
		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<div id="banktrans_recipient_subledgerdiv" style="width:470px;float:left;display:none;">	
				<a class="labels">Recipient Account Subledger:<span>*</span> </a>
				     <div class="ui-widget" style="margin-right:10px; float:right;">					
				       <label for="banktrans_recipient_subledgerid" class="bh-visually-hidden">Recipient Account Subledger:</label><select id="banktrans_recipient_subledgerid" class="input_field" style="width:252px;margin-right:15px;">
						<option value=""></option>';
		$output .= '</select>';
		$output .= '</div>';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '</div>';

		$output .= '</div>';

		$output .= '<a class="labels" style="float:left;">Transaction Date:<span>*</span></a>
					<label for="banktrans_transdate" class="bh-visually-hidden">Transaction Date:</label><input type="text" id="banktrans_transdate" class="input_field" value="' . date('Y/m/d') . '" readonly style="width:240px; float:right; margin-right:10px" />';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left;">Reference No.<span>*</span></a>
					<input type="text" id="banktrans_refno" class="input_field" style="width:240px; float:right; margin-right:10px" placeholder="Cheque /receipt number" maxlength="20"/>';
		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left;">Amount:<span>*</span></a>
		<input type="text" id="banktrans_amount" class="input_field" style="width:240px; float:right; margin-right:10px" placeholder="Enter Amount" maxlength="6"/>		
		<div class="cleaner_h5"></div>';

		$output .= '<div id="uncaptured_banktrans_container" style="display:none;">';

		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left; margin-left:10px;">Debtor (Source): <span>*</span></a>
					<div class="ui-widget" style="margin-right:10px; float:right">
					<label for="uncaptured_banktrans_debtorid" class="bh-visually-hidden">Debtor (Source):</label><select id="uncaptured_banktrans_debtorid" style="float:left; margin-left:20px; width:252px" class="select">
					<option value="">Select an option</option>';
		$result = mysqli_query($db, "SELECT CustomerId,CustomerName FROM creditcustomers WHERE AccountReceivableLedgerID>0 AND IncomeAccountLedgerID>0 AND CustomerName!='CASH' ORDER BY CustomerName DESC ");
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= '<option value="' . intval($row['CustomerId']) . '">' . trim(stripslashes($row['CustomerName'])) . ' </option>';
		}
		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '<div class="cleaner_h5"></div>';
		$output .= '<a class="labels" style="float:left; margin-left:10px;">Department: <span>*</span></a>
					<div class="ui-widget" style="margin-right:10px; float:right">
					<label for="uncaptured_banktrans_departmentid" class="bh-visually-hidden">Department:</label><select id="uncaptured_banktrans_departmentid" style="float:left; margin-left:20px; width:252px" class="select" >
					<option value="">Select an option</option>';
		$result = mysqli_query($db, "SELECT CatId,`ItemCat` FROM categories ");
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_assoc($result);
			$output .= '<option value="' . intval($row['CatId']) . '">' . trim(stripslashes($row['ItemCat'])) . '</option>';
		}
		$output .= '</select></div>';
		$output .= '<div class="cleaner_h5"></div>';

		$output .= '</div>';

		$output .= '<a class="labels">Notes:<span>*</span></a>
			<label for="banktrans_desc" class="bh-visually-hidden">Notes:</label><textarea id="banktrans_desc" class="input_field" style="width:240px;height:60px; margin-right:10px; float:right; font-size:11px" maxlength="150"/>
			<div class="cleaner_h20"></div>';
		$output .= "<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:220px; float:left; cursor:pointer;width:60px\" class=\"input_field\" onclick=\"savebankdepp();\"/>";
		$output .= '<div id="postresp" style="float:left; width:40px;height:40px; margin-left:20px"></div>';
		$output .= '</div>
							
							
						<div style="width:400px; float:left; border-left:2px solid #0085b2; height:400px; margin-left:50px; padding-left:20px; margin-top:20px">
							<h5 style="text-align:center; ">CASH BALANCE</h5>
							<div class="cleaner_h5"></div>
						<div style="height:380px; width:400px; overflow-y:auto;">';
		$result = mysqli_query($db, "SELECT SUM(bal) AS avalibleCashBal FROM `ledgers` WHERE `isSubledger`=1 AND `mainLedgerId`=626 ");
		$row = mysqli_fetch_assoc($result);
		$output .= '<p style="font-size:14px;">BALANCE: <b id="cashbal" style="color:var(--color-danger, #DC2626);">' . number_format(floatval($row['avalibleCashBal']), 2, '.', ',') . '</b></p>';
		$output .= '
						</div>
						</div>	
							
							</div>

							</div>
							';
		die($output);

		break;
							case 126:
				echo"<script>$('#itemname').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:260px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Patients Lab Requests
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:0px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Status:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname" class="bh-visually-hidden">Status:</label><select id="itemname" style="width:260px; margin-left:10px;">
				<option value="1">Done</option>
				<option value="0">Not Done</option>
				<option value="2">All</option>
				</select>
				</div>
			<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:20px">Patient Name:</a>
				<div class="ui_widget" style="margin-left:10px;float:left; width:270px">
				<label for="itemname2" class="bh-visually-hidden">Patient Name:</label><select id="itemname2" class="combos" style="width:260px; margin-left:10px;">';

				$result =mysqli_query($db, "select * from patients order by name");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
			echo"<option value=\"".stripslashes($row['pntno'])."\">".stripslashes($row['fullnames'])."-".stripslashes($row['pntno'])."</option>";
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
									cursor:pointer; width:80px" class="select" onclick="pntslabrep();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;
							case 127:
					$a=$_GET['a'];
					echo"<script>$('#patfb').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			if($a==7){
				echo'Reprint Final Bill';
			}
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		
	<div id="op1">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="patfb" class="bh-visually-hidden">Text field</label><select id="patfb" class="docx" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$arr=array();
		
							if($a==7){
		$result =mysqli_query($db, "select * from temp_bill");
		$num_results = mysqli_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[stripslashes($row['patid'])]=stripslashes($row['patname']).'-Patient No:'.stripslashes($row['patid']).'-Date:'.dateprint(stripslashes($row['date'])).'-Inv No:'.stripslashes($row['id']);
			}
		}
		
		
							
							foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$val.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	
			<div class="cleaner_h5"></div>
			
				</div>';	
							break;						
							case 128:
										echo"<script>$('#itemname').parent().find('input:first').focus().width(250);</script>";
											echo"<script>$('.combos').parent().find('input:first').width(250);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses General Outpatients Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Outpatients (FILTER CLINICS)
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
									cursor:pointer; width:80px" class="select" onclick="generaloutpatfilterclinic();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;
							/*gen_outpatients.php*/								
							case 129:
										echo"<script>$('#itemname').parent().find('input:first').focus().width(250);</script>";
											echo"<script>$('.combos').parent().find('input:first').width(250);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses Diagnosis MCH Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">MCH Diagnosis Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Department:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Department:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
								<option value="All">All</option>
								<option value="GENERAL CONSULTATIONS">General Consultations</option>
								<option value="EYE CLINIC">Eye Clinic</option>
								<option value="MCH">MCH</option>
								<option value="DENTAL CLINIC">Dental Clinic</option>
						</select>
							</div>
						<div class="cleaner_h5"></div>';

						$result =mysqli_query($db, "select * from tbldiseases  order by id");
							$num_results = mysqli_num_rows($result);
				echo'<a class="labels" style="margin-left:20px">Disease:</a>
				<div class="ui-widget" style="margin-left:10px; float:left">
				<label for="diseas" class="bh-visually-hidden">Disease:</label><select class="combos" id="diseas" style="width:250px; margin-left:10px;">
						<option value="All">All</option>';
						
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
									cursor:pointer; width:80px" class="select" onclick="generaloutpatfiltermch();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

							case 130:
										echo"<script>$('#itemname').parent().find('input:first').focus().width(250);</script>";
											echo"<script>$('.combos').parent().find('input:first').width(250);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses general out patients clinics Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">General (OPD) Clinics 
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">Department:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="itemname" class="bh-visually-hidden">Department:</label><select class="select" id="itemname" style="width:250px; margin-left:10px;">
						<option value=""></option>
								<option value="EYE CLINIC">Eye Clinic</option>
								<option value="MCH CLINIC">MCH Clinic</option>
								<option value="DENTAL CLINIC">Dental Clinic</option>
								<option value="DIALYSIS">Dialysis Clinic</option>
								<option value="AMBULANCE">Ambulance Clinic</option>
								<option value="EMERGENCIES">Emergencies Clinic</option>
								<option value="PAEDIATRICS">Paediatrics Clinic</option>
								<option value="PHYSIOTHERAPY">Physiotherapy Clinic</option>
								<option value="GENERAL CONSULTATIONS">General Consultations</option>
						</select>
							</div>
						<div class="cleaner_h5"></div>';
						
			echo'
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
									cursor:pointer; width:80px" class="select" onclick="fetchgenopdrep();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;


							case '131':
						
								$result = mysqli_query($db, "insert into log values('0','".$username." accesses old Cash Collection Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

								echo'
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;">
							<div style="width:456px; float:left">	
							<h5 style="text-align:center; margin-top:20px">CHIEF CASHIER:CASH COLLECTION -AS AT 11/01/22</h5>';
																
							echo'<div class="cleaner_h5"></div>
						<a class="labels" style="float:left; margin-left:10px;">Cashier Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="crledger" class="bh-visually-hidden">Cashier Account:</label><select style="float:left; margin-left:20px; width:250px" class="select" id="crledger">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.ledgers WHERE category='Cashier' ORDER BY name");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$name=stripslashes($row['name']);
									$value=stripslashes($row['ledgerid']);
									if($username!=substr(stripslashes($row['name']),0,5)){
									echo'<option value="'.$value.'">'.$name.'</option>';
									}
							}
										
										echo'</select></div>
										<div class="cleaner_h5"></div>
			<a class="labels" style="float:left; margin-left:10px;">Amount:<span>*</span></a>
		<label for="amount" class="bh-visually-hidden">Name</label><input type="text" id="amount" name="name" class="input_field" value=""  style="width:240px; float:right; margin-right:10px"/>		
		<div class="cleaner_h5"></div>	
			<a class="labels" style="margin-left:10px">Notes:<span>*</span></a>
			<label for="desc" class="bh-visually-hidden">Notes:</label><textarea id="desc" class="input_field"  style="width:240px;height:100px; margin-right:10px; float:right; font-size:11px"/>
	<div class="cleaner_h20"></div>';
			echo"<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:220px; float:left; cursor:pointer;width:60px\" class=\"input_field\" onclick=\"savecashcollect_old();\"/>";							
		echo'<div id="postresp" style="float:left; width:40px;height:40px; margin-left:20px"></div>';
							echo'</div>
							
						<div style="width:400px; float:left; border-left:2px solid #10504F; height:400px; margin-left:50px; padding-left:20px; margin-top:20px">
							<h5 style="text-align:center; ">CURRENT CASHIER BALANCES  -AS AT 11/01/22</h5>
							<div class="cleaner_h5"></div>
						<div style="height:380px; width:400px; overflow-y:auto;">';
						$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.ledgers WHERE category='Cashier' ORDER BY bal DESC");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$name=stripslashes($row['name']);
									if($username==substr(stripslashes($row['name']),0,5)){
										echo'<p style="color:var(--color-danger, #DC2626)">'.$name.'-<b>'.stripslashes($row['bal']).'</b></p>';
									}else{echo'<p>'.$name.'-<b>'.stripslashes($row['bal']).'</b></p>';}
							}
						echo'
						</div>
						</div>	
							
							
							</div></div>
							';
							break;
							
							case '132':
							
								$result = mysqli_query($db, "insert into log values('0','".$username." accesses old Expenses Management Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

								echo'
							<div id="newstude">
							<div id="results" style="min-height:350px;">
						<div id="block1" style="float:left;height:470px; width:996px; background:#fff; margin:0 5px 5px 0;padding-left:10px; border-radius:0px;">
							<div style="width:456px; float:left">	
							<h5 style="text-align:center; margin-top:20px">Expenses ManagemenT AS AT -11/01/22</h5>';
																
							echo'<div class="cleaner_h5"></div>
						<a class="labels" style="float:left; margin-left:10px;">Expense Account:<span>*</span></a>
							 <div class="ui-widget" style="margin-right:10px; float:right">
							<label for="drledger" class="bh-visually-hidden">Expense Account:</label><select style="float:left; margin-left:20px; width:250px" class="select" id="drledger">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.ledgers WHERE type='Expense' ORDER BY name");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$name=stripslashes($row['name']);
									$value=stripslashes($row['ledgerid']);
								echo'<option value="'.$value.'">'.$name.'</option>';
									
							}
										
										echo'</select></div>
										<div class="cleaner_h5"></div>
			<a class="labels" style="float:left; margin-left:10px;">Amount:<span>*</span></a>
		<label for="amount" class="bh-visually-hidden">Name</label><input type="text" id="amount" name="name" class="input_field" value=""  style="width:240px; float:right; margin-right:10px"/>		
		<div class="cleaner_h5"></div>	
		<a class="labels" style="float:left; margin-left:10px;">Date:<span>*</span></a>
			<label for="datepick" class="bh-visually-hidden">Name</label><input type="text" id="datepick" name="name" class="input_field" value=""  style="width:240px; float:right; margin-right:10px"/>	<div class="cleaner_h5"></div>
			<a class="labels" style="margin-left:10px">Notes:<span>*</span></a>
			<label for="desc" class="bh-visually-hidden">Notes:</label><textarea id="desc" class="input_field"  style="width:240px;height:100px; margin-right:10px; float:right; font-size:11px"/>
	<div class="cleaner_h20"></div>';
			echo"<input type=\"button\" value=\"Submit\" id=\"submit\" style=\"margin-left:220px; float:left; cursor:pointer;width:60px\" class=\"input_field\" onclick=\"saveexpman_old();\"/>";							
		echo'<div id="postresp" style="float:left; width:40px;height:40px; margin-left:20px"></div>';
							echo'</div>
							
						<div style="width:400px; float:left; border-left:2px solid #10504F; height:400px; margin-left:50px; padding-left:20px; margin-top:20px">
							<h5 style="text-align:center; ">CURRENT ACCOUNT BALANCE AS AT -11/01/22</h5>
							<div class="cleaner_h5"></div>
						<div style="height:380px; width:400px; overflow-y:auto;">';
						$result =mysqli_query($db, "SELECT * FROM betterhealth_12012021_0558.ledgers WHERE ledgerid='670'");
						$row=mysqli_fetch_array($result);
									$name=stripslashes($row['name']);
									echo'<p style="color:var(--color-danger, #DC2626); font-size:13px">'.$name.'-<b>'.stripslashes($row['bal']).'</b></p>';
									
						echo'
						</div>
						</div>	
							
							
							</div></div>
							';
							break;


					case 133:
					$result = mysqli_query($db, "insert into log values('0','".$username." accesses Stock Valuation Panel.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo"<script>$('#dept89').parent().find('input:first').focus();</script>";
				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:180px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">';
			echo"<h5 style=\"margin-right:10px; color:#fff\">Stock Valuation:- 31/12/21";
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()">
				</h5></div>
				<div class="cleaner_h5"></div>
					<a class="labels" style="float:left; margin-left:10px;">Dept:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="dept89" class="bh-visually-hidden">Dept:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="dept89">';
							if($usertype=='Admin'||$usertype=='Accountant'||$usertype=='Store'){
							echo'
							<option value="">Select one...</option>';
							$result =mysqli_query($db, "select * from branchtbl order by Branchname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['Branchname']).'">'.stripslashes($row['Branchname']).'</option>';
							}
								}else{echo'<option value="'.$userdep.'">'.$userdep.'</option>';}
							echo'</select></div>
								<div class="cleaner_h5"></div>
								<a class="labels" style="float:left; margin-left:10px;">Section:<span>*</span></a>
					<div class="cleaner_h5"></div>
				<div class="ui-widget" style="margin-left:10px; float:left">
							<label for="categ909" class="bh-visually-hidden">Section:</label><select style="float:left; margin-left:10px; width:250px" class="select" id="categ909">
							<option value="">Select one...</option>';
						$result =mysqli_query($db, "select * from categories where Type='GOOD'");
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
								echo'<option value="'.stripslashes($row['ItemCat']).'">'.stripslashes($row['ItemCat']).'</option>';
							}
							
							echo'	<option value="All">All</option></select></div>';
				echo'<div class="cleaner_h10"></div>
				
				
				<div id="letacateg909"></div>
				
			
									<input type="button" value="Cancel" style="float:right; margin-right:70px; cursor:pointer; width:80px" class="select" onclick="hidediv()"/>
									<input type="button" value="Submit" style="float:right; margin-right:10px; 
									cursor:pointer; width:80px" class="select" onclick="enterstockval2();"/>
					<div class="cleaner_h5"></div>
								</div>
								</div>';

							break;

							
						 case 134:
					$a=$_GET['a'];
					echo"<script>$('#clientCredit1').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';			
			if($a==1){
				echo'Reprint Pharmacy Credit Note';
			}					
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="clientCredit1" class="bh-visually-hidden">Text field</label><select id="clientCredit1" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
	$result =mysqli_query($db, "select * from creditnotes where status=1 group by RcptNo ASC");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$assid=stripslashes($row['Creditno']);
								echo'<option value="'.$assid.'">'.stripslashes($row['ReceiptDate']).'-[RcptNo-'.stripslashes($row['RcptNo']).']</option>';
							}
		echo'
	</select>
	</div>
				</div>';
							
							break;		

							case 135:
					echo"<script>$('#docusers254').parent().find('input:first').focus().width(250);</script>";
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Patients List By Doctor
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<a class="labels" style="margin-left:20px">User:</a>
					<div class="cleaner_h5"></div>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="docusers254" class="bh-visually-hidden">User:</label><select class="select" id="docusers254" style="width:250px; margin-left:10px;">
						<option value=""></option>';
							$result =mysqli_query($db, "SELECT * FROM users WHERE position='Doctor' AND name NOT IN ('MC001','MARCUS','JM002','PA016') ORDER BY fullname");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
							echo'<option value="'.stripslashes($row['name']).'">'.stripslashes($row['name']).'-'.strtoupper($row['fullname']).'</option>';
							}
						echo'</select>
							</div>
						<div class="cleaner_h5"></div>';
						
			echo'
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
									cursor:pointer; width:80px" class="select" onclick="patientseenbydoc2();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;

							case 136:
					$a=$_GET['a'];
					echo"<script>$('#patfb').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';
			if($a==7){
				echo'Reprint Final Bill';
			}
			echo"<div id=\"backatt\" style=\"width:9px; height:20px; float:right;margin:0px 5px 0 10px\"><img alt=\"Help\" src=\"images/helper.png\" width=\"10\" height=\"20\" style=\"cursor:pointer;\" title=\"Help\" onclick=\"help4()\"/></div>";								

			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		
	<div id="op1">
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="patfb" class="bh-visually-hidden">Text field</label><select id="patfb" class="docx" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
		$arr=array();
		
							if($a==7){
		$result =mysql_query("select * from tempbill");
		$num_results = mysql_num_rows($result);
		for ($i=0; $i <$num_results; $i++) {
								$row=mysql_fetch_array($result);
								$arr[stripslashes($row['patid'])]=stripslashes($row['patname']).'-Patient No:'.stripslashes($row['patid']).'-Date:'.dateprint(stripslashes($row['date'])).'-Inv No:'.stripslashes($row['id']);
			}
		}
		
		
							
							foreach ($arr as $key => $val) {
								echo'<option value="'.$key.'">'.$val.'</option>';
							}
		echo'
			</select>
		</div>
	</div>
	
	
			<div class="cleaner_h5"></div>
			
				</div>';	
							break;						
					
							

						 case 137:
					$a=$_GET['a'];
					echo"<script>$('#etDischargeSum1').parent().find('input:first').focus();</script>";	
					echo'<div id="modalDiv"></div>';
				echo'<div id="alertDiv" style="min-height:90px; width:320px;top:20%;border:5px solid #666">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 10px;border-radius:0px 0px 0 0">
			<h5 style="margin-right:0px; color:#fff">';			
			if($a==1){
				echo'Reprint Discharge Summary';
			}					
			echo'<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5></div>
		<div class="cleaner_h5"></div>
		<input type="hidden" id="ser" name="ser"  value="'.$a.'"/>
		<div class="ui_widget"  style="margin-left:10px;float:left; width:270px">
		<label for="etDischargeSum1" class="bh-visually-hidden">Text field</label><select id="etDischargeSum1" style="width:260px; margin-left:10px;">
		<option value="">Select one...</option>';
	$result =mysqli_query($db, "select * from discharge");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$assid=stripslashes($row['id']);
								echo'<option value="'.$assid.'">'.stripslashes($row['patname']).'-[PatientNo-'.stripslashes($row['patid']).']</option>';
							}
		echo'
	</select>
	</div>
				</div>';
							
							break;		

							
							case 138:
										echo"<script>$('#itemname').parent().find('input:first').focus().width(250);</script>";
											echo"<script>$('.combos').parent().find('input:first').width(250);</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses General In-Patients Reports Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
					echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:200px">
					<div id="tit" style="width:280px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">In-Patients (FILTER CLINICS)
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
									cursor:pointer; width:80px" class="select" onclick="generalInpatfilterclinic();"/>
					<div class="cleaner_h5"></div>
						
						</div>';
							break;					
					
							
							case 139:
					#$a=$_GET['a'];
					$a=date('YmdHi');
					
						echo"<script>$('#expiry606').parent().find('input:first').focus();</script>";
$result = mysqli_query($db, "insert into log values('0','".$username." accesses expiry Report Panel','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	

				echo'<div id="modalDiv"></div>';
			echo'<div id="alertDiv" style="min-height:90px; width:320px">
					<div id="tit" style="width:300px; background:#10504F; padding:5px 0px 5px 20px;border-radius:0px 0px 0 0">
				<h5 style="margin-right:10px; color:#fff">Expiry Report
				<img alt="Delete" src="images/delete.png" style="width:20px; height:20px; float:right; border:1px solid #fff; border-radius:2px; cursor:pointer" onclick="hidediv()"></h5>
				</div>
				<div class="cleaner_h5"></div>
				<input type="hidden" id="ser" name="ser"  value="'.safe_encode($a).'"/>
					<div class="ui-widget" style="margin-left:10px; float:left">
					<label for="expiry606" class="bh-visually-hidden">Expiry Report</label><select class="select" id="expiry606" style="width:250px; margin-left:10px;">
						<option value="">Select one...</option>';
						echo'<option value="1">In One Month Report</option>';
						echo'<option value="2">In Three Months Report</option>';
						echo'<option value="3">In Six Months Report</option>';
						echo'<option value="4">In One Year Report</option>';
						echo'<option value="5">Full Report</option>';
							echo'</select>
							</div>
						<div class="cleaner_h5"></div>
				</div>';
							break;
							

							

							


							
							









	
					
					
}