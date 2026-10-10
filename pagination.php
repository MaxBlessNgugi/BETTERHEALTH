<?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('pagination', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
if (isset($_SESSION['valid_user'])) {
	$username = $_SESSION['valid_user'];
	$result = mysqli_query($db, "select * from users where name='" . $username . "'");
	$row = mysqli_fetch_array($result);
	$usertype = stripslashes($row['position']);
	$userdep = stripslashes($row['dept']);
	include(__DIR__ . '/includes/functions.php');
} else {
	echo "<script>window.location.href = \"index.php\";</script>";exit;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type='text/javascript' src='js/functions.js'></script>
<link rel="stylesheet" type="text/css" href="assets/vendor/jquery.confirm/jquery.confirm.css" />
<script src="assets/vendor/jquery.confirm/jquery.confirm.js"></script>
<link type="text/css" rel="stylesheet" href="css/tokens.css">
<link rel="stylesheet" href="css/components.css" />
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<link type="text/css" rel="stylesheet" href="css/jquery.custom.alerts.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/jquery.custom.alerts.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script>
	Number.prototype.formatMoney = function(c, d, t) {
		var n = this,
			c = isNaN(c = Math.abs(c)) ? 2 : c,
			d = d == undefined ? "," : d,
			t = t == undefined ? "." : t,
			s = n < 0 ? "-" : "",
			i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
			j = (j = i.length) > 3 ? j % 3 : 0;
		return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};
</script>
<script type="text/javascript">
	$("#ncalendar").dialog({
		autoOpen: false
	});
	$("#newcalendar").click(function() {
		$("#ncalendar").dialog("open");
		return false;
	});

	function clickit(a, b, c) {
		$().customAlert();
		alert('Document Viewer', '<strong>Name:</strong>' + a + '<br/><strong>Date:</strong>' + b + '<br/><strong>Details:</strong>' + c);
	}


	$(function() {

		$('.rightclickarea').bind('contextmenu', function(e) {
			var $cmenu = $(this).next();
			$('<div class="overlay"></div>').css({
				left: '0px',
				top: '0px',
				position: 'absolute',
				width: '100%',
				height: '100%',
				zIndex: '100'
			}).mouseover(function() {
				$(this).remove();
				$cmenu.hide();
			}).bind('contextmenu', function() {
				return false;
			}).appendTo(document.body);
			$(this).next().css({
				left: e.pageX,
				top: e.pageY,
				zIndex: '101'
			}).show(100);

			return false;
		});

		$('.vmenu .first_li').live('click', function() {
			if ($(this).children().size() == 1) {
				b = openlinks($(this).children().text());
				window[b]();
				$('.vmenu').hide();
				$('.overlay').hide();
			}
		});

		$('.vmenu .inner_li span').live('click', function() {
			alert($(this).text());
			$('.vmenu').hide();
			$('.overlay').hide();
		});


		$(".first_li , .sec_li, .inner_li span").hover(function() {
				$(this).css({
					backgroundColor: '#E0EDFE',
					cursor: 'pointer'
				});
				if ($(this).children().size() > 0)
					$(this).find('.inner_li').show();
				$(this).css({
					cursor: 'pointer',
					backgroundColor: '#E0EDFE'
				});
			},
			function() {
				$(this).css('background-color', '#fff');
				$(this).find('.inner_li').hide();
			});


	});
</script>
<?php
$per_page = 10;
$page = $_GET['page'];
$id = $_GET['ser'];
$param = $_GET['param'];

$start = ($page - 1) * $per_page;

					
switch($id){
     case 1:
		
		$result =mysqli_query($db, "select * from items where ".$_SESSION['rights']."");
		$count = mysqli_num_rows($result);
		echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
			
		$result =mysqli_query($db, "select * from items where ".$_SESSION['rights']." limit ".$start.",".$per_page."");
			$num_results = mysqli_num_rows($result);
			footitem($result,$param,1,$userdep);
			if($count>0){
			page($param,$count,1,$page);
			}
		break;
			
		case 2:
$result =mysqli_query($db, "SELECT * FROM items WHERE ItemCode='".$param."'");
		$count = mysqli_num_rows($result);
		echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
	$result = mysqli_query($db, "SELECT * FROM items WHERE ItemCode='".$param."' limit ".$start.",".$per_page."");
	$num_results = mysqli_num_rows($result);
			$num_results = mysqli_num_rows($result);
			footitem($result,$param,1,$userdep);
			if($count>0){
			page($param,$count,2,$page);
			}
			break;
			
			case 3:
		$result =mysqli_query($db, "select * from patients where status=1  ORDER BY name LIMIT 0,100");
		$count = mysqli_num_rows($result);
		echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
			
		$result =mysqli_query($db, "select * from patients where status=1  ORDER BY name limit ".$start.",".$per_page."");
			$num_results = mysqli_num_rows($result);
			footpat($result,$param,2,$usertype);
			if($count>0){
			page($param,$count,3,$page);
			}
			break;
			
		case 4:
$result =mysqli_query($db, "SELECT * FROM patients WHERE pntno='".$param."'");
		$count = mysqli_num_rows($result);
		echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
	$result = mysqli_query($db, "SELECT * FROM patients WHERE pntno='".$param."' limit ".$start.",".$per_page."");
	$num_results = mysqli_num_rows($result);
			$num_results = mysqli_num_rows($result);
			footpat($result,$param,2,$usertype);
			if($count>0){
			page($param,$count,4,$page);
			}
			break;

			case 4.1:
			$subid=$_GET['subid'];
			$result =mysqli_query($db, "SELECT * FROM patients WHERE ".$subid." LIKE '%".$param."%' and status=1");
			$count = mysqli_num_rows($result);
			$result =mysqli_query($db, "SELECT * FROM patients WHERE ".$subid." LIKE '%".$param."%'  and status=1 limit ".$start.",".$per_page."");
		
			echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
			$num_results = mysqli_num_rows($result);
			if($num_results>0){
			footpat($result,$param,2,$usertype);
			}
			if($count>0){
			page2($param,$count,4.1,$page,$subid);
			}
			
			break;
			
			case '0.4':
		$result =mysqli_query($db, "select * from employee where status=1");
		$count = mysqli_num_rows($result);
		echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
			
		$result =mysqli_query($db, "select * from employee  where status=1 limit ".$start.",".$per_page."");
			$num_results = mysqli_num_rows($result);
			footemp($result,$param,4);
			if($count>0){
			page($param,$count,$id,$page);
			}
			break;
			case '5':
		$result =mysqli_query($db, "SELECT * FROM employee WHERE emp='".$param."' and status=1");
		$count = mysqli_num_rows($result);
		echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
			
			$result = mysqli_query($db, "SELECT * FROM employee WHERE emp='".$param."' and status=1 limit ".$start.",".$per_page."");
			$num_results = mysqli_num_rows($result);
			footemp($result,$param,4);
			if($count>0){
			page($param,$count,5,$page);
			}
			break;
			case '6':
		$subid=$_GET['subid'];
		$result =mysqli_query($db, "SELECT * FROM employee WHERE dept='".$param."' and status=1");
		$count = mysqli_num_rows($result);
		echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
			
			$result = mysqli_query($db, "SELECT * FROM employee WHERE dept='".$param."' and status=1 limit ".$start.",".$per_page."");
			$num_results = mysqli_num_rows($result);
			footemp($result,$param,4);
			if($count>0){
			page2($param,$count,6,$page,$subid);
			}
			
			break;
	case '7':
		$result = mysqli_query($db, "SELECT * FROM employee where status=1");
		$count = mysqli_num_rows($result);
		echo '<p style="font-size:12px; margin-left:10px">' . $count . ' Results Found.</p>';

		$result = mysqli_query($db, "SELECT * FROM  employee where status=1 limit " . $start . "," . $per_page . "");
		$num_results = mysqli_num_rows($result);
		if ($num_results > 0) {
			echo '
									
									<div id="inside" style="min-height:310px; width:700px">
									<div id="title">
									<div id="figure1" style="margin-left:0px">Emp No.</div>
									<div id="figure1" style="width:200px">Emp Name.</div>
									<div id="figure1" style="width:70px">Present</div>
									<div id="figure1" style="width:70px">Absent</div>
									</div>';
		}
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_array($result);
			$regn = stripslashes($row['emp']);
			$name = stripslashes($row['oname']);
			$att = stripslashes($row['attendance']);
			$tot = stripslashes($row['totattendance']);
			echo "
										<div id=\"normal\" class=\"normal\">
										<div onclick=\"revdis('" . $regn . "','" . $name . "')\" id=\"figure2\">" . $regn . "</div>
										<div onclick=\"revdis('" . $regn . "','" . $name . "')\" id=\"figure2\" style=\"width:200px\">" . $name . "</div>
										<div class=\"figure2\" style=\"width:72px\" title=\"Click to check attendance\" id=\"save1" . $regn . "\" onclick=\"checkemp(" . $regn . "," . $att . "," . $tot . ",1)\"><img alt=\"4\" src=\"images/4.png\" style=\"width:16px;height:16px\"/></div>
										<div class=\"figure2\" style=\"width:70px\" title=\"Click to check attendance\" id=\"save0" . $regn . "\" onclick=\"checkemp(" . $regn . "," . $att . "," . $tot . ",0)\"><img alt=\"Delete\" src=\"images/delete.png\" style=\"width:16px;height:16px\"/></div>";
			echo "</div><div class=\"cleaner\"></div>";
		}


		echo '</div>';
		if ($count > 0) {
			page($param, $count, 7, $page);
		}
		break;
	case '8':

		$result = mysqli_query($db, "SELECT id FROM ledgers WHERE `status`=1");
		$count = mysqli_num_rows($result);
		echo '<p style="font-size:12px; margin-left:10px">' . $count . ' Results Found.</p>';

		$result = mysqli_query($db, "SELECT * FROM  ledgers WHERE `status`=1 AND `ledgerid`!=601 ORDER BY `type` ASC, `category` ASC LIMIT " . $start . "," . $per_page . "");
		$num_results = mysqli_num_rows($result);
		if ($num_results > 0) {
			echo '<div id="inside" style="min-height:310px;text-align:left;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:60px;text-align:left;"> </div>
									<div id="figure1" style="width:300px;text-align:left;">Ledger Name</div>
									<div id="figure1" style="width:110px;text-align:left;">Type</div>
									<div id="figure1" style="width:110px;text-align:left;">Category</div>
									<div id="figure1" style="width:140px;text-align:left;padding-left:5px;">Balance</div>
									<div id="figure1" style="width:52px;text-align:left;">Delete</div>
									';
			echo '</div>';
		}
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_array($result);
			$code = intval($row['ledgerid']);
			$name = trim(stripslashes($row['name']));
			$bal = floatval(trim(str_replace(',', '', $row['bal'])));
			$status = intval($row['status']);
			$isMainLedger = intval($row['isMainLedger']);
			$created_by = trim(stripslashes($row['created_by']));
			$category = trim(stripslashes($row['category']));
			$nonZeroSubledgers =0;
			if($isMainLedger>0){
				$resultSubledgerBal= mysqli_query($db, "SELECT COUNT(id) AS nonZeroSubledgers FROM ledgers WHERE bal !=0 AND bal !='' AND mainLedgerId='". $code."' ");
				if(mysqli_num_rows($resultSubledgerBal)>0){
					$rowSubledgerBal = mysqli_fetch_assoc($resultSubledgerBal);
					$nonZeroSubledgers=intval($rowSubledgerBal['nonZeroSubledgers']);
				}
			}

			echo "
										<div id=\"normal" . $code . "\" class=\"normal\" >
										<div id=\"figure2\" onclick=\"window.open('rep.php?id=1&value=" . $code . "')\" style=\"width:60px\">" . $code . "</div>
						<div id=\"figure2\" style=\"height:19px; padding-top:2px;width:302px\">
								<label for=\"name" . $code . "\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" class=\"put_field\" value=\"" . strtoupper($name) . "\"id=\"name" . $code . "\" style=\"background:#fff;width:290px;text-align:left;\" disabled/>
										</div>
										<div id=\"figure2\" style=\"width:111px; margin-top:-4px; height:20px\">";
			if (intval($row['ledgerid']) == 601) {
				echo '<strong id="type' . $code . '">General Ledger</strong>';
			} else {
				echo "
									
										<label for=\"type" . $code . "\" class=\"bh-visually-hidden\">General Ledger</label><select class=\"select\" id=\"type" . $code . "\" style=\"width:110px; padding:0\">
										<option value=\"" . trim(stripslashes($row['type'])) . "\" selected=\"selected\">" . stripslashes($row['type']) . "</option>";
				echo "</select>";
			}
			echo "</div>
										
										<div id=\"figure2\" style=\"width:111px; margin-top:-4px; height:20px\">
										<label for=\"cat" . $code . "\" class=\"bh-visually-hidden\">Text field</label><select class=\"select\" id=\"cat" . $code . "\" style=\"width:110px; padding:0\">
										<option value=\"" . trim(stripslashes($row['category'])) . "\" selected=\"selected\">" . stripslashes($row['category']) . "</option>";
			echo "</select></div>";

			echo "<div id=\"figure2\" style=\"height:19px; padding-top:2px;width:141px\">
											<label for=\"bal" . $code . "\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" class=\"put_field\" value=\"" . number_format(floatval($bal), 2, '.', ',') . "\" id=\"bal" . $code . "\" style=\"background:#fff;width:130px;text-align:left;padding-left:5px;\" disabled/>
										</div>";
			if (strtolower($created_by) == 'system') {
				echo "<div class=\"figure2\" style=\"width:51px\" id=\"figure2" . $code . "\" title=\"System Account\" > </div>";
			} else if(strtolower($category) == 'department' || strtolower($category) == 'supplier' || strtolower($category) == 'insurance'){
				echo "<div class=\"figure2\" style=\"width:51px\" id=\"figure2" . $code . "\" title=". $category." > </div>";
			} else {
				if (floatval($bal) == 0 && $nonZeroSubledgers==0) {
					echo "<div class=\"figure2\" style=\"width:51px\" id=\"figure2" . $code . "\" title=\"Delete\" onclick=\"removeledger(" . $code . ",'" . $bal . "')\"><img alt=\"Discard\" src=\"images/discard.png\" style=\"width:20px;height:16.5px\"/></div>";
				} else {
					echo "<div class=\"figure2\" style=\"width:51px\" id=\"figure2" . $code . "\" title=\"Account should have zero balance to delete\" > <img alt=\"Discard\" src=\"images/discard.png\" style=\"width:20px;height:16.5px\"/> </div>";
				}
			}

			echo "</div><div class=\"cleaner\"></div>";
		}

		echo '</div>';
		if ($count > 0) {
			page(0, $count, 8, $page);
		}


		break;
									
									case '9':
								$result =mysqli_query($db, "select * from employee where status=0");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
								$result =mysqli_query($db, "select * from employee  where status=0 limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									footemp($result,$param,5);
									if($count>0){
									page($param,$count,9,$page);
									}
									break;
									case '10':
								$result =mysqli_query($db, "SELECT * FROM employee WHERE emp='".$param."' and status=0");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
									$result = mysqli_query($db, "SELECT * FROM employee WHERE emp='".$param."' and status=0 limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									footemp($result,$param,5);
									if($count>0){
									page($param,$count,10,$page);
									}
									break;
									
									
									case '11':
									$mon=$_GET['param'];
									$query =mysqli_query($db, "select * from payroll where month='".$mon."'");
									$count = mysqli_num_rows($query);
									echo'<div class="cleaner_h10"></div>
									<p style="font-size:12px; margin-left:10px" id="count">'.$count.' Results Found.</p>';								
									$result =mysqli_query($db, "select * from  payroll where month='".$mon."' limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="width:40px">Emp.</div>
									<div id="figure1" style="width:100px">Name</div>
									<div id="figure1" style="width:60px">Sal.</div>
									<div id="figure1" style="width:50px">Allow.</div>
									<div id="figure1" style="width:50px">Adva.</div>
									<div id="figure1" style="width:40px">Insu.</div>
									<div id="figure1" style="width:40px">Deds.</div>
									<div id="figure1" style="width:50px">OT hrs.</div>
									<div id="figure1" style="width:50px">NHIF.</div>
									<div id="figure1" style="width:50px">NSSF.</div>
									<div id="figure1" style="width:40px">Tax.</div>
									<div id="figure1" style="width:40px">Rate.</div>
									<div id="figure1" style="width:50px">OT.</div>
									<div id="figure1" style="width:55px">Net Pay</div>
									<div id="figure1" style="width:40px">Rem</div>
									<div id="figure1" style="width:28px">Save</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$sta=stripslashes($row['status']);
									$emp=stripslashes($row['emp']);
									$name=stripslashes($row['name']);
									$sal=stripslashes($row['sal']);
									$allow=stripslashes($row['allow']);
									$adva=stripslashes($row['adva']);
									$ins=stripslashes($row['ins']);
									$ded=stripslashes($row['ded']);
									$nssf=stripslashes($row['nssf']);
									$nhif=stripslashes($row['nhif']);
									$tax=stripslashes($row['tax']);
									$othrs=stripslashes($row['othrs']);
									$rateot=stripslashes($row['rateot']);
									$net=stripslashes($row['net']);
									$totalot=stripslashes($row['totalot']);
									
				echo'<div id="normal'.stripslashes($row['serial']).'"  class="normal">
				<div class="figure2x"  style="width:40px">'.$emp.'</div>
				<div class="figure2x"  style="width:120px; overflow-x:hidden; ">'.$name.'</div>
				<div class="figure2x" style="width:60px;padding:2.5px 1px"><label for="sal'.$emp.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.$sal.'" id="sal'.$emp.'" style="background:#fff;width:55px"/></div>
				<div class="figure2x" style="width:50px;padding:2.5px 1px"><label for="allow'.$emp.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.$allow.'" id="allow'.$emp.'" style="background:#fff;width:45px"/></div>
				<div class="figure2x" style="width:50px;padding:2.5px 1px"><label for="adva'.$emp.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.$adva.'"id="adva'.$emp.'" style="background:#fff;width:45px"/></div>
				<div class="figure2x" style="width:50px;padding:2.5px 1px"><label for="ins'.$emp.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.$ins.'" id="ins'.$emp.'" style="background:#fff;width:45px"/></div>
				<div class="figure2x" style="width:50px;padding:2.5px 1px"><label for="ded'.$emp.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.$ded.'" id="ded'.$emp.'" style="background:#fff;width:45px"/></div>
				<div class="figure2x" style="width:50px;padding:2.5px 1px"><label for="hrs'.$emp.'" class="bh-visually-hidden">Text field</label><input type="text" class="put_field" value="'.$othrs.'" id="hrs'.$emp.'" style="background:#fff;width:45px"/></div>
				<div class="figure2x" style="width:50px;" id="nhif'.$emp.'">'.$nhif.'</div>
				<div class="figure2x" style="width:50px;" id="nssf'.$emp.'">'.$nssf.'</div>
				<div class="figure2x" style="width:50px;" id="tax'.$emp.'">'.$tax.'</div>
				<div class="figure2x" style="width:40px;" id="rate'.$emp.'">'.$rateot.'</div>
				<div class="figure2x" style="width:40px;" id="ot'.$emp.'">'.$totalot.'</div>
				<div class="figure2x" style="width:66px;" id="net'.$emp.'"><strong>'.$net.'</strong></div>';
	echo"<div class=\"figure2x\" style=\"width:40px;padding:5.5px 5px\" id=\"rem".$emp."\"   onclick=\"deleteemp('".stripslashes($row['serial'])."')\">";		
	echo"<img alt=\"\" src=\"images/discard.png\" width=\"16\" height=\"16\"/></div>";
	if($sta==0){
	echo"<div class=\"figure2x\" style=\"width:40px;padding:5.5px 5px\" id=\"save".$emp."\"  onclick=\"saveemp('".$emp."',".$page.",'".$mon."')\">";
	echo"<img alt=\"\" src=\"images/save.jpg\" width=\"16\" height=\"16\"/>
	</div>";
	}
	if($sta==1){
	echo"<div class=\"figure2t\" style=\"width:40px;padding:5.5px 5px\" id=\"save".$emp."\"  onclick=\"saveemp('".$emp."',".$page.",'".$mon."')\">";
	echo"<img alt=\"\" src=\"images/tick.png\" width=\"16\" height=\"16\"/>
	</div>";
	}
				echo'
				</div>';	
				}
				echo'</div>';
				echo "<script>$('#paysett').hide();</script>";
									if($count>0){
									page($param,$count,11,$page);
									}
											break;
											
											
											case '12':
								$result =mysqli_query($db, "SELECT * FROM wardbeds");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
									$result = mysqli_query($db, "SELECT * FROM  wardbeds  order by roomno limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									echo'
									
									<div id="inside" style="min-height:310px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px">Bed No.</div>
									<div id="figure1" style="width:70px">Room No</div>
									<div id="figure1" style="width:110px">Room Type</div>
									<div id="figure1" style="width:110px">Ward Type</div>
									<div id="figure1" style="width:60px">Save</div>
									<div id="figure1"  style="width:129px">Remove</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										$wardtype=stripslashes($row['wardtype']);
										$roomno=stripslashes($row['roomno']);
										$type=stripslashes($row['type']);
										$bedno=stripslashes($row['bedno']);
										echo"
										<div id=\"normal".$code."\" class=\"normal\">
										<div id=\"figure2\">".$bedno."</div>
										<div id=\"figure2x\"style=\"width:70px;height:22px; padding:2px 0\"><label for=\"roomno".$code."\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" class=\"put_field\" value=\"".$roomno."\"id=\"roomno".$code."\" style=\"background:#fff;width:60px\"/></div>
										<div id=\"figure2\" style=\"width:111px; margin-top:-4px; height:20px\">
										<label for=\"roomtype".$code."\" class=\"bh-visually-hidden\">Text field</label><select class=\"select\" id=\"roomtype".$code."\" style=\"width:110px; padding:0\">
										<option value=\"".stripslashes($row['type'])."\" selected=\"selected\">".stripslashes($row['type'])."</option>
										<option value=\"male\">male</option>
										<option value=\"female\">female</option>
											<option value=\"either\">Either</option>
										</select></div>
										<div id=\"figure2\" style=\"width:111px; margin-top:-4px; height:20px\">
										<label for=\"wardtype".$code."\" class=\"bh-visually-hidden\">Either</label><select class=\"select\" id=\"wardtype".$code."\" style=\"width:110px; padding:0\">
										<option value=\"".stripslashes($row['wardtype'])."\" selected=\"selected\">".stripslashes($row['wardtype'])."</option>";
										echo'<option value="MALE_WARD">MALE WARD</option>
										<option value="FEMALE_WARD">FEMALE WARD</option>
										<option value="SURGICAL_WARD">SURGICAL_WARD</option>
										<option value="MATERNITY">MATERNITY</option>
										<option value="PAEDIATRICS">PAEDIATRICS</option>';
											echo"</select></div>
										<div class=\"figure2\" style=\"width:60px\" id=\"save".$code."\" onclick=\"savebed(".$code.")\"><img alt=\"Save\" src=\"images/save.jpg\" style=\"width:16px;height:16px\"/></div>
										<div class=\"figure2\" id=\"figure2".$code."\" onclick=\"removebed(".$code.")\"><img alt=\"Discard\" src=\"images/discard.png\" style=\"width:20px;height:16.5px\"/></div>";
										
										echo"</div><div class=\"cleaner\"></div>";
										}	
									
									
									echo'</div>';
									if($count>0){
									page(0,$count,12,$page);
									}
									break;
								
								case 13:
								
								$result =mysqli_query($db, "SELECT * FROM receipts where paymode='Companies' and invno!='' ");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
								$result = mysqli_query($db, "SELECT * FROM receipts  where paymode='Companies' and invno!='' limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									footinvoice($result,$param,13,$db);
									if($count>0){
									page($param,$count,13,$page);
									}
									break;
									case 14:
					$result =mysqli_query($db, "SELECT * FROM receipts WHERE invno='".$param."' and invno!='' ");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
							$result = mysqli_query($db, "SELECT * FROM receipts WHERE invno='".$param."' and invno!='' limit ".$start.",".$per_page."");
							$num_results = mysqli_num_rows($result);
									$num_results = mysqli_num_rows($result);
									footinvoice($result,$param,13,$db);
									if($count>0){
									page($param,$count,14,$page);
									}
									break;
									
									case '15':
								$result =mysqli_query($db, "SELECT * FROM compips");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
							$arr=array();		
							$result =mysqli_query($db, "select * from branchtbl");
							$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$arr[]=stripslashes($row['Branchname']);
							}
									
									
									$result = mysqli_query($db, "SELECT * FROM  compips limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									echo'
									
									<div id="inside" style="min-height:310px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px">Id.</div>
									<div id="figure1" style="width:200px">Dept Name</div>
									<div id="figure1" style="width:150px">Comp Name</div>
									<div id="figure1" style="width:150px">IP Address</div>
									<div id="figure1" style="width:60px">Save</div>
									<div id="figure1">Remove</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										$name=stripslashes($row['name']);
										$ip=stripslashes($row['ip']);
										echo"
										<div id=\"normal".$code."\" class=\"normal\">
										<div id=\"figure2\">".$code."</div>
										
										<div id=\"figure2\" style=\"width:200px; margin-top:-4px; height:20px\">
										<label for=\"deptt".$code."\" class=\"bh-visually-hidden\">Text field</label><select class=\"select\" id=\"deptt".$code."\" style=\"width:190px; padding:0\">
										<option value=\"".stripslashes($row['dept'])."\" selected=\"selected\">".stripslashes($row['dept'])."</option>
										<option value=\"TRIAGE\">TRIAGE</option>
										<option value=\"GENERAL CONSULTATIONS\">GENERAL CONSULTATIONS</option>";
										foreach ($arr as $key => $val) {echo"<option value=\"".$val."\">".$val."</option>";}
										echo"</select>
										
										</div>
										
										<div id=\"figure2x\" style=\"height:19px; padding-top:2px;width:150px\">
										<label for=\"name".$code."\" class=\"bh-visually-hidden\">GENERAL CONSULTATIONS</label><input type=\"text\" class=\"put_field\" value=\"".$name."\"id=\"name".$code."\" style=\"background:#fff;width:135px\"/></div>
										
										<div id=\"figure2x\" style=\"height:19px; padding-top:2px;width:150px\">
										<label for=\"ip".$code."\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" class=\"put_field\" value=\"".$ip."\"id=\"ip".$code."\" style=\"background:#fff;width:135px\"/></div>
										
										<div class=\"figure2\" style=\"width:64px\" id=\"save".$code."\" onclick=\"saveip(".$code.")\"><img alt=\"Save\" src=\"images/save.jpg\" style=\"width:16px;height:16px\"/></div>
										<div class=\"figure2\" id=\"figure2".$code."\" onclick=\"removeip(".$code.")\"><img alt=\"Discard\" src=\"images/discard.png\" style=\"width:20px;height:16.5px\"/></div>";
										
										echo"</div><div class=\"cleaner\"></div>";
										}	
									
									
									echo'</div>';
									if($count>0){
									page(0,$count,15,$page);
									}
									break;
									
										case '16':
								$result =mysqli_query($db, "SELECT * FROM banktbl");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
								
									$result = mysqli_query($db, "SELECT * FROM  banktbl limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									echo'
									
									<div id="inside" style="min-height:310px; ">
									<div id="title">
									<div id="figure1" style="width:400px;margin-left:0px">Bank</div>
									<div id="figure1" style="width:60px">Save</div>
									<div id="figure1">Remove</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										$name=stripslashes($row['name']);
									
										echo"
										<div id=\"normal".$code."\" class=\"normal\">
										
										<div id=\"figure2x\" style=\"height:19px; padding-top:2px;width:400px\">
										<label for=\"name".$code."\" class=\"bh-visually-hidden\">Text field</label><input type=\"text\" class=\"put_field\" value=\"".$name."\"id=\"name".$code."\" style=\"background:#fff;width:390px\"/></div>
										<div class=\"figure2\" style=\"width:61px\" id=\"save".$code."\" onclick=\"savebank(".$code.")\"><img alt=\"Save\" src=\"images/save.jpg\" style=\"width:16px;height:16px\"/></div>
										<div class=\"figure2\" id=\"figure2".$code."\" onclick=\"removebank(".$code.")\"><img alt=\"Discard\" src=\"images/discard.png\" style=\"width:20px;height:16.5px\"/></div>";
										
										echo"</div>
										<div class=\"cleaner\"></div>";
										}	
									
									
									echo'</div>';
									if($count>0){
									page(0,$count,16,$page);
									}
									break;

									case 17:
								$result =mysqli_query($db, "select * from assets");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									
								$result =mysqli_query($db, "select * from assets limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									footasset($result,$param,9);
									if($count>0){
									page($param,$count,17,$page);
									}
									break;
									
								case 18:
								$result =mysqli_query($db, "SELECT * FROM assets WHERE id='".$param."'");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
							$result = mysqli_query($db, "SELECT * FROM assets WHERE id='".$param."' limit ".$start.",".$per_page."");
							$num_results = mysqli_num_rows($result);
									$num_results = mysqli_num_rows($result);
									footasset($result,$param,9);
									if($count>0){
									page($param,$count,18,$page);
									}
									break;

									case '19':
								$result =mysqli_query($db, "SELECT * FROM extmedics where type = 'Locum'");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
								
									$result = mysqli_query($db, "SELECT * FROM  extmedics where type = 'Locum' limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									echo'
									
									<div id="inside" style="min-height:310px; ">
									<div id="title">
									<div id="figure1" style="width:400px;margin-left:0px">Name</div>
									<div id="figure1" style="width:150px;margin-left:0px">Position</div>
									<div id="figure1" style="width:200px;margin-left:0px">Mobile</div>
									<div id="figure1" style="width:100px;margin-left:0px">User Name</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
										$row=mysqli_fetch_array($result);
										$code=stripslashes($row['id']);
										$name=stripslashes($row['name']);
										$pos=stripslashes($row['pos']);
										$mobile=stripslashes($row['mobile']);
										$uname=stripslashes($row['uname']);
									
										echo"
										<div id=\"normal".$code."\" class=\"normal\">
										
										<div id=\"figure2x\" style=\"height:19px; padding-top:2px;width:400px\">$name</div>
										<div id=\"figure2x\" style=\"height:19px; padding-top:2px;width:150px\">$pos</div>
										<div id=\"figure2x\" style=\"height:19px; padding-top:2px;width:200px\">$mobile</div>
										<div id=\"figure2x\" style=\"height:19px; padding-top:2px;width:100px\">$uname</div>
										</div><div class=\"cleaner\"></div>";
										}	
									
									
									echo'</div>';
									if($count>0){
									page(0,$count,19,$page);
									}
									break;
										
									case 20:
								$result =mysqli_query($db, "select * from admsumm where status=1  ORDER BY patname LIMIT 0,1000");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
								$result =mysqli_query($db, "select * from admsumm where status=1  ORDER BY patname limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									findisum($result,$param,2,$usertype);
									if($count>0){
									page($param,$count,20,$page);
									}
									break;
									
								case 21:
					$result =mysqli_query($db, "SELECT * FROM admsumm WHERE patid='".$param."'");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
							$result = mysqli_query($db, "SELECT * FROM admsumm WHERE patid='".$param."' limit ".$start.",".$per_page."");
							$num_results = mysqli_num_rows($result);
									$num_results = mysqli_num_rows($result);
									findisum($result,$param,2,$usertype);
									if($count>0){
									page($param,$count,21,$page);
									}
									break;

									case 22:
									$subid=$_GET['subid'];
									$result =mysqli_query($db, "SELECT * FROM admsumm WHERE ".$subid." LIKE '%".$param."%' and status=1");
									$count = mysqli_num_rows($result);
									$result =mysqli_query($db, "SELECT * FROM admsumm WHERE ".$subid." LIKE '%".$param."%'  and status=1 limit ".$start.",".$per_page."");
								
									echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									findisum($result,$param,2,$usertype);
									}
									if($count>0){
									page2($param,$count,22,$page,$subid);
									}
									
									break;
									
									
									case 23:
								#$result =mysqli_query($db, "select * from discharge");
								$result =mysqli_query($db, "select * from discharge where status=1  ORDER BY patname LIMIT 0,100");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
								#$result =mysqli_query($db, "select * from discharge limit ".$start.",".$per_page."");
								$result =mysqli_query($db, "select * from discharge where status=1  ORDER BY patname limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									buscards($result,$param,23,$usertype);
									if($count>0){
									page($param,$count,23,$page);
									}
									break;
									
								case 24:
					$result =mysqli_query($db, "SELECT * FROM discharge WHERE patid='".$param."'");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
							$result = mysqli_query($db, "SELECT * FROM discharge WHERE patid='".$param."' limit ".$start.",".$per_page."");
							$num_results = mysqli_num_rows($result);
									buscards($result,$param,23,$usertype);
									if($count>0){
									page($param,$count,24,$page);
									}
									break;

									case 25:
									$subid=$_GET['subid'];
									$result =mysqli_query($db, "SELECT * FROM discharge WHERE ".$subid." LIKE '%".$param."%' and status=1");
									$count = mysqli_num_rows($result);
									$result =mysqli_query($db, "SELECT * FROM discharge WHERE ".$subid." LIKE '%".$param."%'  and status=1 limit ".$start.",".$per_page."");
								
									echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									buscards($result,$param,23,$usertype);
									}
									if($count>0){
									page2($param,$count,25,$page,$subid);
									}
									
									break;



									
					// 				case 3:
					// 			$result =mysqli_query($db, "select * from discharge where status=1  ORDER BY patname LIMIT 0,100");
					// 			$count = mysqli_num_rows($result);
					// 			echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
					// 			$result =mysqli_query($db, "select * from patients where status=1  ORDER BY patname limit ".$start.",".$per_page."");
					// 				$num_results = mysqli_num_rows($result);
					// 				footpat($result,$param,2,$usertype);
					// 				if($count>0){
					// 				page($param,$count,3,$page);
					// 				}
					// 				break;
									
					// 			case 4:
					// $result =mysqli_query($db, "SELECT * FROM patients WHERE pntno='".$param."'");
					// 			$count = mysqli_num_rows($result);
					// 			echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
					// 		$result = mysqli_query($db, "SELECT * FROM patients WHERE pntno='".$param."' limit ".$start.",".$per_page."");
					// 		$num_results = mysqli_num_rows($result);
					// 				$num_results = mysqli_num_rows($result);
					// 				footpat($result,$param,2,$usertype);
					// 				if($count>0){
					// 				page($param,$count,4,$page);
					// 				}
					// 				break;

					// 				case 4.1:
					// 				$subid=$_GET['subid'];
					// 				$result =mysqli_query($db, "SELECT * FROM patients WHERE ".$subid." LIKE '%".$param."%' and status=1");
					// 				$count = mysqli_num_rows($result);
					// 				$result =mysqli_query($db, "SELECT * FROM patients WHERE ".$subid." LIKE '%".$param."%'  and status=1 limit ".$start.",".$per_page."");
								
					// 				echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
					// 				$num_results = mysqli_num_rows($result);
					// 				if($num_results>0){
					// 				footpat($result,$param,2,$usertype);
					// 				}
					// 				if($count>0){
					// 				page2($param,$count,4.1,$page,$subid);
					// 				}
									
					// 				break;
									



									
									
									case 26:
								#$result =mysqli_query($db, "select * from inpatients where Status=1 ORDER BY PatName DESC");
								$result =mysqli_query($db, "select * from inpatients");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
									
								$result =mysqli_query($db, "select * from inpatients limit ".$start.",".$per_page."");
									$num_results = mysqli_num_rows($result);
									buscarInpat($result,$param,2,$usertype);
									if($count>0){
									page($param,$count,26,$page);
									}
									break;
									
								case 27:
								$result =mysqli_query($db, "SELECT * FROM inpatients WHERE PatId='".$param."'");
								$count = mysqli_num_rows($result);
								echo'<p style="font-size:12px; margin-left:10px">'.$count.' Results Found.</p>';
							$result = mysqli_query($db, "SELECT * FROM inpatients WHERE PatId='".$param."' limit ".$start.",".$per_page."");
							$num_results = mysqli_num_rows($result);
									$num_results = mysqli_num_rows($result);
									buscarInpat($result,$param,2,$usertype);
									if($count>0){
									page($param,$count,27,$page);
									}
									break;

									case 28:
									$subid=$_GET['subid'];
									#$result =mysqli_query($db, "SELECT * FROM inpatients WHERE ".$subid." LIKE '%".$param."%' and Status=1 ORDER BY PatName DESC");
									$result =mysqli_query($db, "SELECT * FROM inpatients WHERE ".$subid." LIKE '%".$param."%' ");
									$count = mysqli_num_rows($result);
									#$result =mysqli_query($db, "SELECT * FROM inpatients WHERE ".$subid." LIKE '%".$param."%'  and Status=1 limit ".$start.",".$per_page."");
									$result =mysqli_query($db, "SELECT * FROM inpatients WHERE ".$subid." LIKE '%".$param."%' limit ".$start.",".$per_page."");
								
									echo'<p style="font-size:11px; margin-left:10px">'.$count.' Results Found.</p>';
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									buscarInpat($result,$param,2,$usertype);
									}
									if($count>0){
									page2($param,$count,28,$page,$subid);
									}
									
									break;
									
	}

?>
