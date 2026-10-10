<?php 

require_once(__DIR__ . '/db_fns.php');
bh_require_auth();
// if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
//   echo "called directly";
// } else {
//   echo "included/required";
// }
function check_required_files(){
	$target_file = 'C:/X/7427/apps/nodejs/htdocs/Better-Health/SMH/Better-Health/r/init.php'; // or use __FILE__

	if ($x=function($e){return str_replace(array('\\'), '/', $e);}) if(in_array( $x($target_file), array_map( $x ,  get_included_files() ) ) )
	{
	  
	    if ($x === false)
	        return false;
	    else
	        return true;

	}
}
function HA_implode($value1,$value2){

     if (is_array($value1)) {
         return  implode($value2, $value1);
     } else {
         return  implode($value1, $value2);
     }

 }

function sanitizeArray($data){
  $response = array();
  foreach ($data as $value) {
    $data = trim($value);
    $data = stripslashes($data);
    $response[] = htmlspecialchars($data);  
  }
  return $response;
}

function htmlsan($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function makesafe($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return strtoupper($data);
}
function safe_encode($string) {
    return strtr(base64_encode($string), '+/=', '-_-');
}
function safe_decode($string) {
    return base64_decode(strtr($string, '-_-', '+/='));
}		
function mksafent_on($string) {
    return htmlentities($data, ENT_QUOTES, 'UTF-8');
}
function mksafent_off($string) {
    return html_entity_decode($data, ENT_QUOTES, 'UTF-8');
}									
function mksafespec_on($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'utf-8');
}
function mksafespec_off($data) {
    return htmlspecialchars_decode($data, ENT_QUOTES);
}
function like($str, $searchTerm) {
    $searchTerm = strtolower($searchTerm);
    $str = strtolower($str);
    $pos = strpos($str, $searchTerm);
    if ($pos === false)
        return false;
    else
        return true;
}											
function dateprintexp($date){
$a=substr($date,0,4);
$b=substr($date,4,2);
$c=substr($date,6,2);
$d=$a.'-'.$b.'-'.$c;
return $d;	
}												
function dateprint($date){
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}
function stampreverse($date){
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.$b.$a;
return $d;	
}
function stamptodate($date){
$a=substr($date,0,4);
$b=substr($date,4,2);
$c=substr($date,6,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}

function stamptostamp($date){
$a=substr($date,0,4);
$b=substr($date,4,2);
$c=substr($date,6,2);
$d=$a.'/'.$b.'/'.$c;
return $d;	
}
function like_match($pattern,$subject){
	@$pattern=str_replace('%', '.*', preg_quote($pattern));
	 return (bool) preg_match("/^{$pattern}$/i", $subject);
}
function convtime($time){
$a=substr($time,0,2);
$b=substr($time,2,2);	
	if($a=='00'){
	$time='12:'.$b.' AM';
	}
	else if($a>11&&$a!=12){
	$a=$a-12;
	$time=$a.':'.$b.' PM';
	}
	else if($a=='12'){
	$time=$a.':'.$b.' PM';	
	}
	else{
		$time=$a.':'.$b.' AM';	
	
	}
	
	return $time;	
}
function backtime($time){
$a=substr($time,0,2);
$b=substr($time,3,2);	
$c=substr($time,5,2);

if($time=='12:30am'){
	$time='0030';
	return $time;
}
else if($time=='12:30pm'){
	$time='1230';
	return $time;
}
else if($time=='12:00pm'){
	$time='1200';
	return $time;
}
else if($time=='12:00am'){
	$time='0000';
	return $time;
}
else if($c=='am'){
	$time=$a.$b;
	return $time;
}
else if($c=='pm'){
	$a=$a+12;
	$time=$a.$b;
	return $time;
}
else{
	$time=$a.$b;
	return $time;
}
}
function timeconvert($y,$x){
	$x=preg_replace('~:~', '', $x);
	$y=preg_replace('~:~', '', $y);
	$a=substr($x, 0, 2);
	$b=substr($y, 0, 2);
	$c=substr($y, 2, 2);
	
	
	if($a>$b){
		$b=$b+24;
		$y=$b.$c;
	}
	$a=substr($x, 0, 2);
	$b=substr($y, 0, 2);
	$c=substr($x, 2, 2);
	$d=substr($y, 2, 2);
	
	$e=$b-$a;
	$f=$e * 60;
	$g=$d-$c;
	
	$h=$f+$g;
	return $h;
}
function clean($string){
	$string=str_replace('', '', $string);
	$string=str_replace('-', '', $string);
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
function cartitems($max){
	echo'<div id="chati" style="width:760px; height:240px; overflow-y:scroll">
				
				<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:200px">ItemName</div>
									<div id="figure1" style="width:60px">Quantity</div>
									<div id="figure1"  style="width:70px">Unit Price</div>
									<div id="figure1"  style="width:70px">Total Price</div>
									<div id="figure1"  style="width:60px">VAT</div>
									<div id="figure1"  style="width:60px">Discount</div>
									<div id="figure1"  style="width:70px">SubTotal</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:200px;height:16px; overflow:hidden\">".$_SESSION['cart'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['cart'][$row][2]."</div>
										<div id=\"figure2t\" style=\"width:70px\">".$_SESSION['cart'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:70px\">".$_SESSION['cart'][$row][4]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['cart'][$row][5]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['cart'][$row][6]."</div>
										<div id=\"figure2t\" style=\"width:77px\">".$_SESSION['cart'][$row][7]."</div>
				<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delitem(".$row.")\" style=\"height:16px;width:50px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
							echo'</div></div>';
}

function footasset($result,$param,$a){	
									
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px;width:71px">Asset Code</div>
									<div id="figure1" style="width:250px"> Asset Name</div>
									<div id="figure1"  style="width:220px">Category</div>
									<div id="figure1" style="width:71px">Price</div>
									<div id="figure1" style="width:72px">Location</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$code=stripslashes($row['id']);
									$p=stripslashes($row['name']);
									echo'
									<div id="normal">';
									echo"<div id=\"figure2\" style=\"width:71px\">".stripslashes($row['assetid'])."</div>
									<div id=\"figure2\" style=\"width:252.4px; overflow:hidden;\">".stripslashes($row['name'])."</div>
									<div id=\"figure2\"  style=\"width:221px\">".stripslashes($row['category'])."</div>
									<div id=\"figure2\" style=\"width:71.9px\">".stripslashes($row['price'])."</div>
									<div id=\"figure2\" style=\"width:71.9px\">".stripslashes($row['location'])."</div>
									</div>";
									
									
									}
									echo'</div>';
									if($param!='default'){
									addsearch($p,$a,$code);
									}
	
}
function cartbill($max,$a){
	echo'<div id="chati" style="width:700px; height:200px; overflow-y:scroll">
				<div id="inside" style="min-height:300px;">';

				  echo'<div id="title">';
						   echo'<div id="figure1" style="margin-left:0px; width:200px">ItemName</div>
								<div id="figure1" style="width:60px">Quantity</div>
								<div id="figure1"  style="width:70px">Unit Price</div>
								<div id="figure1"  style="width:70px">Total Price</div>
								<div id="figure1"  style="width:70px">Discount</div>
								<div id="figure1"  style="width:65px">Subnet</div>';
						   echo'<div id="figure1"  style="width:55px">Remove</div>';	

					echo'</div>';
					for ($row = 0; $row < $max; $row++)
					{
					echo'<div id="normal">';
					   echo"<div id=\"figure2t\" style=\"width:200px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>
							<div id=\"figure2t\" style=\"width:60px\">".$_SESSION[$a][$row][2]."</div>
							<div id=\"figure2t\" style=\"width:70px\">".$_SESSION[$a][$row][3]."</div>
							<div id=\"figure2t\" style=\"width:70px\">".$_SESSION[$a][$row][4]."</div>
							<div id=\"figure2t\" style=\"width:70px\">".$_SESSION[$a][$row][9]."</div>
							<div id=\"figure2t\" style=\"width:70px\">".$_SESSION[$a][$row][10]."</div>";
						echo"<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delbill(".$row.",'".$a."')\" style=\"height:16px;width:56px;border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";

					echo"</div>";
					 }			
		echo'</div>
		</div>';

}
function cartbill2($max,$a){
	echo'<div id="chati" style="width:400px; height:200px; overflow-y:auto">
				<div id="inside">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:240px">ItemName</div>
								    <div id="figure1"  style="width:70px">Unit Price</div>
									<div id="figure1"  style="width:40px">Remove</div>';	
									
									echo'</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
								echo"<div id=\"figure2t\" style=\"width:240px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>
									 <div id=\"figure2t\" style=\"width:70px\">".$_SESSION[$a][$row][3]."</div>";
									echo"<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delbill2(".$row.",'".$a."',".$_SESSION[$a][$row][17].",".$_SESSION[$a][$row][3].")\" style=\"height:16px;width:42px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
									
				echo"</div>";	}
									
							echo'</div></div>';
}
function cartbill3($max,$a){
	echo'<div id="chati" style="width:400px; height:200px; overflow-y:auto">
				<div id="inside">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:240px">ItemName</div>
								    <div id="figure1"  style="width:68px">Unit Price</div>
									<div id="figure1"  style="width:55px">Remove</div>';	
									
									echo'</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
								echo"<div id=\"figure2t\" style=\"width:240px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>
									 <div id=\"figure2t\" style=\"width:70px\">".$_SESSION[$a][$row][3]."</div>";
									echo"<div id=\"delrad".$row."\" class=\"figure2t\" onclick=\"delbill3(".$row.",'".$a."',".$_SESSION[$a][$row][16].",".$_SESSION[$a][$row][3].")\" style=\"height:16px;width:56px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
									
				echo"</div>";	}
									
							echo'</div></div>';
}
function theatcartbill5($max,$a){
	echo'<div id="chati" style="width:350px; height:200px; overflow-y:auto">
				<div id="inside">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:240px">ItemName</div>
									<div id="figure1"  style="width:55px">Remove</div>';	
									
									echo'</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
								echo"<div id=\"figure2t\" style=\"width:240px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
									echo"<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delbill5(".$row.",".$_SESSION[$a][$row][13].",".$_SESSION[$a][$row][16].",'".$a."')\" style=\"height:16px;width:56px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
									
				echo"</div>";	}
									
							echo'</div></div>';
}
function pharmcartbillWidthAuto($max,$a){
	#echo'<div id="" style="width:550px;height:200px;float:right;overflow-y:scroll">';
	echo'<div id="" style="width:530px;height:268px;overflow-y:auto">';
		echo'<div id="inside" style="min-height:150px;">';
			echo'<div id="title" style="width:502px;">';
					echo'<div id="figure1" style="width:285px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1" style="width:50px">UnitPrice</div>';
					echo'<div id="figure1" style="width:50px">Total</div>';
					echo'<div id="figure1"  style="width:30px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="width:502px;">';
					echo"<div id=\"figure2t\" style=\"width:290px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][3]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][10]."</div>";
						
					if($_SESSION[$a][$row][16]==1){
						echo"<div id=\"delpharmcart".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus(".$_SESSION[$a][$row][17].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delpharmcartbill44(".$row.",".$_SESSION[$a][$row][18].",".$_SESSION[$a][$row][19].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_rcpt_no" value="'.$_SESSION[$a][$row][17].'"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}

function pharmcartbill($max,$a){
	echo'<div id="" style="width:auto;height:268px;overflow-y:auto">';
		echo'<div id="inside" style="width:auto;min-height:150px;">';
			echo'<div id="title" style="width:auto;">';
					echo'<div id="figure1" style="width:285px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1" style="width:50px">UnitPrice</div>';
					echo'<div id="figure1" style="width:50px">Total</div>';
					echo'<div id="figure1"  style="width:39px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="width:auto;">';
					echo"<div id=\"figure2t\" style=\"width:290px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][3]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][10]."</div>";
						
					if($_SESSION[$a][$row][16]==1){
						echo"<div id=\"delpharmcart".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus(".$_SESSION[$a][$row][17].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delpharmcartbill44(".$row.",".$_SESSION[$a][$row][18].",".$_SESSION[$a][$row][19].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_rcpt_no" value="'.$_SESSION[$a][$row][17].'"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}
function pharmcartIPDbill($max,$a){
	echo'<div id="" style="width:auto;height:268px;overflow-y:auto">';
		echo'<div id="inside" style="width:auto;min-height:150px;">';
			echo'<div id="title" style="width:auto;">';
					echo'<div id="figure1" style="width:285px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1" style="width:50px">UnitPrice</div>';
					echo'<div id="figure1" style="width:50px">Total</div>';
					echo'<div id="figure1"  style="width:39px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="width:auto;">';
					echo"<div id=\"figure2t\" style=\"width:290px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][3]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][10]."</div>";
						
					if($_SESSION[$a][$row][16]==1){
						echo"<div id=\"delpharmcart".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus(".$_SESSION[$a][$row][17].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delpharmcartIPDbill44(".$row.",".$_SESSION[$a][$row][18].",".$_SESSION[$a][$row][19].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_rcpt_no" value="'.$_SESSION[$a][$row][17].'"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}
function pharmcartbill2($max,$a){
	echo'<div id="" style="width:auto;height:230px;overflow-y:auto">';
		echo'<div id="inside" style="width:auto;min-height:150px;">';
			echo'<div id="title" style="width:auto;">';
					echo'<div id="figure1" style="width:285px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1" style="width:50px">UnitPrice</div>';
					echo'<div id="figure1" style="width:50px">Total</div>';
					echo'<div id="figure1"  style="width:39px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="width:auto;">';
					echo"<div id=\"figure2t\" style=\"width:290px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][3]."</div>";
					echo"<div id=\"figure2t\" style=\"width:50px\">".$_SESSION[$a][$row][10]."</div>";
						
							echo"<div id=\"delpharmcart".$row."\" class=\"figure2t\" onclick=\"delpharmcartbill(".$row.",'".$a."',".$_SESSION[$a][$row][15].",".$_SESSION[$a][$row][3].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
						
					#echo'<input type="hidden" disabled="disabled" id="old_rcpt_no" value="'.$_SESSION[$a][$row][17].'"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}
function maabaracartbill($max,$a){
	echo'<div id="" style="width:500px; height:200px;">';
		echo'<div id="inside" style="min-height:300px;">';
			echo'<div id="title" style="margin-left:90px;;width:390px;">';
					echo'<div id="figure1" style="width:295px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1"  style="width:30px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="margin-left:90px;">';
					echo"<div id=\"figure2t\" style=\"width:300px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
						
					if($_SESSION[$a][$row][17]==1){
						echo"<div id=\"delmaabara".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus2(".$_SESSION[$a][$row][14].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"delmaabara".$row."\" class=\"figure2t\" onclick=\"delmaabarabill44(".$row.",".$_SESSION[$a][$row][15].",".$_SESSION[$a][$row][16].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_lab_rcpt_no" value="'.$_SESSION[$a][$row][14].'" style="width:70px;"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}
function maabaracartIPDBill($max,$a){
	echo'<div id="" style="width:500px; height:200px;">';
		echo'<div id="inside" style="min-height:300px;">';
			echo'<div id="title" style="margin-left:90px;;width:390px;">';
					echo'<div id="figure1" style="width:295px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1"  style="width:30px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="margin-left:90px;">';
					echo"<div id=\"figure2t\" style=\"width:300px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
						
					if($_SESSION[$a][$row][17]==1){
						echo"<div id=\"delmaabara".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus2(".$_SESSION[$a][$row][14].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"delmaabara".$row."\" class=\"figure2t\" onclick=\"delmaabaraIPDBill44(".$row.",".$_SESSION[$a][$row][15].",".$_SESSION[$a][$row][16].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_lab_rcpt_no" value="'.$_SESSION[$a][$row][14].'" style="width:70px;"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}
function drecartbill2($max,$a){
	echo'<div id="chati" style="width:350px; height:200px;">
				<div id="inside">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:240px">ItemName</div>
									<div id="figure1"  style="width:55px">Remove</div>';	
									
									echo'</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
								echo"<div id=\"figure2t\" style=\"width:240px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
									echo"<div id=\"deldre".$row."\" class=\"figure2t\" onclick=\"delbill4(".$row.",'".$a."',".$_SESSION[$a][$row][17].",".$_SESSION[$a][$row][3].")\" style=\"height:16px;width:56px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
									
				echo"</div>";	}
									
							echo'</div></div>';
}
function dressercartbill($max,$a){
	echo'<div id="" style="width:420px; height:200px;">';
		echo'<div id="inside" style="min-height:300px;">';
			echo'<div id="title" style="margin-left:5px;;width:390px;">';
					echo'<div id="figure1" style="width:295px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1"  style="width:30px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="margin-left:5px;">';
					echo"<div id=\"figure2t\" style=\"width:300px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
						
					if($_SESSION[$a][$row][17]==1){
						echo"<div id=\"deldresser".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus3(".$_SESSION[$a][$row][14].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"deldresser".$row."\" class=\"figure2t\" onclick=\"deldresserbill606(".$row.",".$_SESSION[$a][$row][15].",".$_SESSION[$a][$row][16].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_dresser_rcptno" value="'.$_SESSION[$a][$row][14].'" style="width:70px;"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}
function radiolojiacartbill($max,$a){
	echo'<div id="" style="width:420px; height:200px;">';
		echo'<div id="inside" style="min-height:300px;">';
			echo'<div id="title" style="margin-left:5px;;width:390px;">';
					echo'<div id="figure1" style="width:295px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1"  style="width:30px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="margin-left:5px;">';
					echo"<div id=\"figure2t\" style=\"width:300px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
						
					if($_SESSION[$a][$row][17]==1){
						echo"<div id=\"delradiolojia".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus4(".$_SESSION[$a][$row][14].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"delradiolojia".$row."\" class=\"figure2t\" onclick=\"delRadiolojiaBill834(".$row.",".$_SESSION[$a][$row][15].",".$_SESSION[$a][$row][16].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_rad_rcptno" value="'.$_SESSION[$a][$row][14].'" style="width:70px;"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';
}
function radiolojiacartIPDBill($max,$a){
	echo'<div id="" style="width:420px; height:200px;">';
		echo'<div id="inside" style="min-height:300px;">';
			echo'<div id="title" style="margin-left:5px;;width:390px;">';
					echo'<div id="figure1" style="width:295px">ItemName</div>';
					echo'<div id="figure1" style="width:20px">Qty</div>';
					echo'<div id="figure1"  style="width:30px">Remove</div>';						
			echo'</div>';
			for ($row = 0; $row < $max; $row++){
			echo'<div id="normal" style="margin-left:5px;">';
					echo"<div id=\"figure2t\" style=\"width:300px;height:16px; overflow:hidden\" title=\"".$_SESSION[$a][$row][1]."\">".$_SESSION[$a][$row][1]."</div>";
					echo"<div id=\"figure2t\" style=\"width:20px\">".$_SESSION[$a][$row][2]."</div>";
						
					if($_SESSION[$a][$row][17]==1){
						echo"<div id=\"delradiolojia".$row."\" class=\"figure2t\" onclick=\"checkItemPaidStatus4(".$_SESSION[$a][$row][14].")\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/redarrow.png\" width=\"20\" height=\"22\" /></div>";		
					}else{
						echo"<div id=\"delradiolojia".$row."\" class=\"figure2t\" onclick=\"delRadiolojiaIPDBill834(".$row.",".$_SESSION[$a][$row][15].",".$_SESSION[$a][$row][16].",'".$a."')\" style=\"height:16px;width:37px; border-right:1px solid #333\"><img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>";
					}	
					echo'<input type="hidden" disabled="disabled" id="old_rad_rcptno" value="'.$_SESSION[$a][$row][14].'" style="width:70px;"/>';
		   echo"</div>";
				}					
	   echo'</div>';
  echo'</div>';

}
function cartitemsquot($max){
	echo'<div id="chati" style="width:760px; height:290px; overflow-y:scroll">
							<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:200px">ItemName</div>
									<div id="figure1" style="width:60px">Quantity</div>
									<div id="figure1"  style="width:70px">Unit Price</div>
									<div id="figure1"  style="width:70px">Total Price</div>
									<div id="figure1"  style="width:60px">VAT</div>
									<div id="figure1"  style="width:60px">Discount</div>
									<div id="figure1"  style="width:70px">SubTotal</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:200px;overflow:hidden;height:16px;\">".$_SESSION['quot'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['quot'][$row][2]."</div>
										<div id=\"figure2t\" style=\"width:70px\">".$_SESSION['quot'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:70px\">".$_SESSION['quot'][$row][4]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['quot'][$row][5]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['quot'][$row][6]."</div>
										<div id=\"figure2t\" style=\"width:77px\">".$_SESSION['quot'][$row][7]."</div>
				<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delitemquot(".$row.")\" style=\"height:16px;width:50px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}

function cartitemspur($max){
	echo'<div id="chati" style="width:760px; height:250px; overflow-y:scroll">
							<div id="inside" style="min-height:250px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:200px">ItemName</div>
									<div id="figure1"  style="width:60px">Batch No</div>
									<div id="figure1" style="width:60px">Unit</div>
									<div id="figure1"  style="width:70px">Part</div>
									<div id="figure1"  style="width:70px">Total Price</div>
									<div id="figure1"  style="width:60px">Purchase</div>
									<div id="figure1"  style="width:70px">Selling</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:200px;overflow:hidden;height:16px;\">".$_SESSION['pur'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['pur'][$row][12]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['pur'][$row][2]."</div>
										<div id=\"figure2t\" style=\"width:70px\">".$_SESSION['pur'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:70px\">".$_SESSION['pur'][$row][9]."</div>
										<div id=\"figure2t\" style=\"width:77px\">".$_SESSION['pur'][$row][5]."</div>
										<div id=\"figure2t\" style=\"width:60px\">".$_SESSION['pur'][$row][4]."</div>
										
				<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delitempur(".$row.")\" style=\"height:16px;width:50px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}
function cartitemsret($max){
	echo'<div id="chati" style="width:760px; height:250px; overflow-y:scroll">
							<div id="inside" style="min-height:250px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:200px">ItemName</div>
									<div id="figure1"  style="width:100px">Batch No</div>
									<div id="figure1" style="width:100px">Unit</div>
									<div id="figure1"  style="width:100px">Part</div>
									<div id="figure1"  style="width:100px">Total Price</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:200px;overflow:hidden;height:16px;\">".$_SESSION['ret'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['ret'][$row][8]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['ret'][$row][2]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['ret'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['ret'][$row][6]."</div>
										<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delitemret(".$row.")\" style=\"height:16px;width:55px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}
function cartitemslpo($max){
	echo'<div id="chati" style="width:760px; height:250px; overflow-y:scroll">
							<div id="inside" style="min-height:250px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:200px">ItemName</div>
									<div id="figure1" style="width:100px">Unit</div>
									<div id="figure1"  style="width:100px">Part</div>
									<div id="figure1"  style="width:100px">Price</div>
									<div id="figure1"  style="width:100px">Total Price</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:200px;overflow:hidden;height:16px;\">".$_SESSION['lpo'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['lpo'][$row][2]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['lpo'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['lpo'][$row][4]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['lpo'][$row][6]."</div>
										<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delitemlpo(".$row.")\" style=\"height:16px;width:55px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}
function cartitemspay($max){
	echo'<div id="chati" style="width:740px; height:260px; overflow-y:scroll">
							<div id="inside" style="min-height:260px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:100px">Mode</div>
									<div id="figure1" style="width:100px">A/c Id</div>
									<div id="figure1"  style="width:170px">A/c Name</div>
									<div id="figure1"  style="width:100px">Ref No.</div>
									<div id="figure1"  style="width:100px">Amount</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:100px;overflow:hidden;height:16px;\">".$_SESSION['pay'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['pay'][$row][4]."</div>
										<div id=\"figure2t\" style=\"width:170px\">".$_SESSION['pay'][$row][5]."</div>";
										if ($_SESSION['pay'][$row][3]=='Companies') { echo"<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['pay'][$row][9]."</div>"; } 
										else {echo"<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['pay'][$row][6]."</div>";}
										
										#echo"<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['pay'][$row][6]."</div>";
										echo"<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['pay'][$row][7]."</div>
										<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delpaymode(".$row.")\" style=\"height:16px;width:55px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}
function cartitemstock($max){
echo'<div id="chati" style="width:760px; height:250px; overflow-y:scroll">
							<div id="inside" style="min-height:250px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:300px">ItemName</div>
									<div id="figure1"  style="width:50px">Unit</div>
									<div id="figure1" style="width:50px">Part</div>
									<div id="figure1" style="width:200px">Reason</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:300px;overflow:hidden;height:16px;\">".$_SESSION['stock'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:50px\">".$_SESSION['stock'][$row][2]."</div>
										<div id=\"figure2t\" style=\"width:50px\">".$_SESSION['stock'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:200px\">".$_SESSION['stock'][$row][9]."</div>
					<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delitemstock(".$row.")\" style=\"height:16px;width:50px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}

function cartexpense($max){
echo'<div id="chati" style="width:760px; height:250px; overflow-y:scroll">
							<div id="inside" style="min-height:250px;">
									<div id="title">
									<div id="figure1"  style="width:70px">Item Code</div>
									<div id="figure1" style="margin-left:0px; width:270px">ItemName</div>
									<div id="figure1"  style="width:130px">Amount</div>
									<div id="figure1" style="width:120px">Date</div>
									<div id="figure1"  style="width:70px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:70px\">".$_SESSION['expense'][$row][0]."</div>
										<div id=\"figure2t\" style=\"width:270px;overflow:hidden;height:16px;\">".$_SESSION['expense'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:130px\">".$_SESSION['expense'][$row][2]."</div>
										<div id=\"figure2t\" style=\"width:120px\">".$_SESSION['expense'][$row][3]."</div>
										
				<div id=\"del".$row."\" class=\"figure2t\" onclick=\"deleteexpense(".$row.")\" style=\"height:16px;width:74px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}

function cartissue($max){
echo'<div id="chati" style="width:760px; height:250px; overflow-y:scroll">
							<div id="inside" style="min-height:250px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:300px">ItemName</div>
									<div id="figure1"  style="width:100px">Unit</div>
									<div id="figure1" style="width:100px">Part</div>
									<div id="figure1"  style="width:50px">Remove</div>
									</div>';
									for ($row = 0; $row < $max; $row++)
									{
									echo'<div id="normal">';
										echo"<div id=\"figure2t\" style=\"width:300px;overflow:hidden;height:16px;\">".$_SESSION['issue'][$row][1]."</div>
										<div id=\"figure2t\" style=\"width:100px\">".$_SESSION['issue'][$row][3]."</div>
										<div id=\"figure2t\" style=\"width:103px\">".$_SESSION['issue'][$row][4]."</div>
					<div id=\"del".$row."\" class=\"figure2t\" onclick=\"delissue(".$row.")\" style=\"height:16px;width:50px; border-right:1px solid #333\">
										<img alt=\"\" src=\"images/discard.png\" width=\"20\" height=\"22\" /></div>
										</div>";
										}
									
									echo'</div></div>';
}

function footemp($result,$param,$a){	
									
									$num_results = mysqli_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px">Emp No.</div>
									<div id="figure1">Name</div>
									<div id="figure1">Branch</div>
									<div id="figure1">Position</div>
									<div id="figure1">Contact</div>
									</div>';
									
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$emp=stripslashes($row['emp']);
									$fname=stripslashes($row['fname']);
									$mname=stripslashes($row['mname']);
									$lname=stripslashes($row['lname']);
									$p=$fname.' '.$mname.' '.$lname;
									$dept=stripslashes($row['dept']);
									$pos=stripslashes($row['position']);
									$phone=stripslashes($row['phone']);
									
									echo"
									<div id=\"normal\" onclick=\"empchart('".$emp."')\">
									<div id=\"figure2\" style=\"overflow:hidden\">".$emp."</div>
									<div id=\"figure2\" style=\"overflow:hidden\">".$p."</div>
									<div id=\"figure2\" style=\"overflow:hidden\">".$dept."</div>
									<div id=\"figure2\" style=\"overflow:hidden\">".$pos."</div>
									<div id=\"figure2\" style=\"overflow:hidden\">".$phone."</div>
									</div>";
									
									
									}
									echo'</div>';
									
									if($param!='default'){
									addsearch($p,$a,$emp);
									}
									}
}

function footitem($result,$param,$a,$userdep){	
									
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:60px">Code</div>
									<div id="figure1" style="width:235px"> Item Name</div>
									<div id="figure1"  style="width:120px">Category</div>
									<div id="figure1" style="width:64px">Pack</div>
									<div id="figure1" style="width:71px">SalePrice</div>
									<div id="figure1" style="width:60px">Unit</div>
									<div id="figure1" style="width:62px">Part</div>
									
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$code=stripslashes($row['ItemCode']);
									$p=stripslashes($row['ItemName']);
									$pack=stripslashes($row['Pack']);
									if($userdep=='PROCUREMENT'){
									$qty=stripslashes($row['Bal']);
									}else{$qty=stripslashes($row[$userdep]);}
									if($pack==0||$pack==''){$pack=1;}
									$part=$qty%$pack;
									$unit=explode('.',($qty/$pack));
									$unit=$unit[0];
									
									echo'
									<div id="normal"  class="rightclickarea" >';
									echo"<div id=\"figure2\" style=\"width:61.9px\" name=\"itemcoding\">".stripslashes($row['ItemCode'])."</div>
		<div id=\"figure2\" style=\"width:236.9px; overflow:hidden;\" title=\"".stripslashes($row['ItemName'])."\">".stripslashes($row['ItemName'])."</div>
									<div id=\"figure2\"  style=\"width:121.9px;overflow:hidden;\">".stripslashes($row['Category'])."</div>
									<div id=\"figure2\" style=\"width:61.9px\">".$pack."</div>
									<div id=\"figure2\" style=\"width:71.9px\">".stripslashes($row['SalePrice'])."</div>
									<div id=\"figure2\" style=\"width:61.9px\">".$unit."</div>
									<div id=\"figure2\" style=\"width:61.9px\">".$part."</div>
									<input type=\"hidden\" id=\"code\" value=\"".stripslashes($row['ItemCode'])."\"/>
									</div>";
									
									echo'<div class="vmenu">';
		echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['ItemCode']).'Î¸12</span>Stock Availability</div>
		<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['ItemCode']).'Î¸13</span>Compare Purchase</div>
		</div>';
									
									}
									echo'</div>';
									if($param!='default'){
									addsearch($p,$a,$code);
									}
	
}

function footinvoice($result,$param,$a,$db){	
									
									
									$num_results = mysqli_num_rows($result);
									if($num_results>0){
										$pro=array();
										$num_resultsa = mysqli_num_rows($result);	
										for ($i=0; $i <$num_resultsa; $i++) {
										$rowa=mysqli_fetch_array($result);
										$pro[stripslashes($rowa['rcptno'])]=stripslashes($rowa['patname']);
									}								
							$arr=array(array());	
							foreach ($pro as $key => $val) {
							$resulta =mysqli_query($db, "SELECT * FROM receipts WHERE rcptno='".$key."' and paymode='Companies' and invno!='' ");
							$rowa=mysqli_fetch_array($resulta);
							$max=count($arr);
			$arr[$max]=array(dateprint(stripslashes($rowa['date'])),stripslashes($rowa['invno']),stripslashes($rowa['patname']),stripslashes($rowa['patid']),stripslashes($rowa['paymode']),stripslashes($rowa['cname']),stripslashes($rowa['amount']));
							}
										
									
										
										
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px; width:100px">Date</div>
									<div id="figure1" style="width:141px">Invoice No.</div>
									<div id="figure1" style="width:305px">Patient Name</div>
									<div id="figure1"  style="width:153px">Patient ID</div>
									</div>';
									}
									$max=count($arr);
									for ($i=1; $i <$max; $i++) {
										$p=$arr[$i][2].'-'.$arr[$i][1];
										$code=$arr[$i][1];
									echo"
									<div id=\"normal\"  onclick=\"window.open('outpathistory.php?id=1&pid=".$arr[$i][3]."&rcptno=' + ".$arr[$i][1].")\">";
									echo"<div id=\"figure2\" style=\"width:101.9px\">".$arr[$i][0]."</div>
									<div id=\"figure2\" style=\"width:141.9px; overflow:hidden;\">".$arr[$i][1]."</div>
									<div id=\"figure2\"  style=\"width:305.9px;overflow:hidden;\"  title=\"".$arr[$i][2]."\">".$arr[$i][2]."</div>
									<div id=\"figure2\" style=\"width:151.9px\">".$arr[$i][3]."</div>
									</div>";
									
									
									}
									echo'</div>';
									if($param!='default'){
									addsearch($p,$a,$code);
									}
	
}
function diffdays($a,$b){

	$diff = abs(strtotime($b) - strtotime($a));

	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

	return $days;

}
function diffdays2($a,$b){

	$diff = abs(strtotime($b) - strtotime($a));

	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

	return $days;

}


function footpat($result,$param,$a,$usertype){	
									// if(!$db){ require_once(__DIR__ . '/../r/init.php'); }
	require_once(__DIR__ . '/../r/init.php');
									$arr=array();
									$resulta =mysqli_query($db, "select * from accesstbl");
									$num_resultsa = mysqli_num_rows($resulta);
									for ($v=0; $v <$num_resultsa; $v++) {
										$rowa=mysqli_fetch_array($resulta);
										$var=stripslashes($rowa[$usertype]);
										$code=stripslashes($rowa['AccessCode']);
										$arr[$code]=$var;
									}
				
									
									$num_results = mysqli_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px">Pat No.</div>
									<div id="figure1" style="width:291px"> PatientName</div>
									<div id="figure1">BGroup</div>
									<div id="figure1">Contact</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$pntno=stripslashes($row['pntno']);
									$name=stripslashes($row['fullnames']);
									$bgroup=stripslashes($row['bgroup']);
									$phone=stripslashes($row['contact']);
									
									echo"
									<div class=\"rightclickarea\" id=\"normal\">";
									echo"<div id=\"figure2\">".$pntno."</div>
									<div id=\"figure2\"  style=\"width:291.9px\">".$name."</div>
									<div id=\"figure2\">".$bgroup."</div>
									<div id=\"figure2\">".$phone."</div>
									</div>";
									echo'<div class="vmenu" style="font-size:11px">';
		if($arr[106]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸5</span>Start New Consultation</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸5</span>Start New Consultation</div>';
				if($arr[102]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸6</span>Edit Patient Details</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸6</span>Edit Patient Details</div>';
				if($arr[103]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸7</span>Open Patient Chart</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸7</span>Open Patient Chart</div>';	
				if($arr[135]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸8</span>View Income Statement</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['pntno']).'Î¸8</span>View Income Statement</div>';
 	       
		 echo'</div>';
									
									}
									echo'</div>';
									if($param!='default'){
									addsearch($name,$a,$pntno);
									}
	
}

function findisum($result,$param,$a,$usertype){	

									$arr=array();
									$resulta =mysqli_query($db, "select * from accesstbl");
									$num_resultsa = mysqli_num_rows($resulta);
									for ($v=0; $v <$num_resultsa; $v++) {
										$rowa=mysqli_fetch_array($resulta);
										$var=stripslashes($rowa[$usertype]);
										$code=stripslashes($rowa['AccessCode']);
										$arr[$code]=$var;
									}
				
									
									$num_results = mysqli_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px">Patient No.</div>
									<div id="figure1" style="width:291px"> PatientName</div>
									<div id="figure1">Date Of Admission</div>
									<div id="figure1">Date Of Discharge</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$pntno=stripslashes($row['patid']);
									$name=stripslashes($row['patname']);
									$bgroup=stripslashes($row['admdate']);
									$phone=stripslashes($row['disdate']);
									
									echo"
									<div class=\"rightclickarea\" id=\"normal\">";
									echo"<div id=\"figure2\">".$pntno."</div>
									<div id=\"figure2\"  style=\"width:291.9px\">".$name."</div>
									<div id=\"figure2\">".$bgroup."</div>
									<div id=\"figure2\">".$phone."</div>
									</div>";
									echo'<div class="vmenu" style="font-size:11px">';

		if($arr[106]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸5</span>Start New Consultation</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸5</span>Start New Consultation</div>';
				if($arr[102]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸6</span>Edit Patient Details</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸6</span>Edit Patient Details</div>';
				if($arr[103]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸7</span>Open Patient Chart</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸7</span>Open Patient Chart</div>';	
				if($arr[135]=='YES'){
					echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸8</span>View Income Statement</div>';
				}else echo'<div class="first_li"  style="border-bottom:1px solid #ccc;"><span style="display:none">'.stripslashes($row['patid']).'Î¸8</span>View Income Statement</div>';
 	       
		 echo'</div>';
									
									}
									echo'</div>';
									if($param!='default'){
									addsearch($name,$a,$pntno);
									}
	
}

function buscards($result,$param,$a,$usertype){	
									
									$num_results = mysqli_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="margin-left:0px">Patient No.</div>
									<div id="figure1" style="width:291px"> Patient Name</div>
									<div id="figure1">Date Of Admission</div>
									<div id="figure1">Date Of Discharge</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									#$code=stripslashes($row['Id']);
									$cusno=stripslashes($row['patid']);
									$name=stripslashes($row['patname']);
									$address=stripslashes($row['admdate']);
									$phone=stripslashes($row['dischargedate']);
									
									if($i%2==0){echo"<div id=\"normal\" style=\"background:#fff\" onclick=\"window.open('report.php?id=58&rcptno=".stripslashes($row['id'])."')\">";}
									else{echo"<div id=\"normal\" style=\"background:#f0f0f0\" onclick=\"window.open('report.php?id=58&reg=".stripslashes($row['id'])."')\">";}
									echo"<div id=\"figure2\">".$cusno."</div>
									<div id=\"figure2\"  style=\"width:291.9px\">".$name."</div>
									<div id=\"figure2\">".$address."</div>
									<div id=\"figure2\">".$phone."</div>
									</div>";
									
									
									}
									echo'</div>';
									if($param!='default'){
									addsearch($name,$a,$cusno);
									}
	
}

function buscarInpat($result,$param,$a,$usertype){	
									
									$num_results = mysqli_num_rows($result);
									
									if($num_results>0){
									echo'
									<div id="inside" style="min-height:300px;">
									<div id="title">
									<div id="figure1" style="width:60px;">Pat. No.</div>
									<div id="figure1" style="width:60px;">Adm. No.</div>
									<div id="figure1" style="width:220px">Patient Name</div>
									<div id="figure1" style="width:120px;">Date Of Admission</div>
									<div id="figure1" style="width:120px;">Date Of Discharge</div>
									<div id="figure1" style="width:100px;">Stats</div>
									</div>';
									}
									for ($i=0; $i <$num_results; $i++) {
									$row=mysqli_fetch_array($result);
									$code=stripslashes($row['Id']);
									$pid=stripslashes($row['PrescId']);
									$cusno=stripslashes($row['PatId']);
									$name=stripslashes($row['PatName']);
									$admdate=stripslashes($row['AdmDate']);
									$disdate=stripslashes($row['Discharge']);
									$admitted=stripslashes($row['Admitted']);
									
									if($i%2==0){echo"<div id=\"normal\" style=\"background:#fff\"   onclick=\"window.open('report.php?id=4.1&rcptno=".stripslashes($row['PrescId'])."')\">";}
									else{echo"<div id=\"normal\" style=\"background:#f0f0f0\"   onclick=\"window.open('report.php?id=4.1&rcptno=".stripslashes($row['PrescId'])."')\">";}
											echo"<div id=\"figure2\" style=\"width:60px;\">".$cusno."</div>";
											echo"<div id=\"figure2\" style=\"width:60px;\">".$pid."</div>";
											echo"<div id=\"figure2\"  style=\"width:225px\">".$name."</div>";
											echo"<div id=\"figure2\" style=\"width:120px;\">".$admdate."</div>";
											echo"<div id=\"figure2\" style=\"width:120px;\">".$disdate."</div>";
											// echo"<div id=\"figure2\" style=\"width:100px;\">";
											// if ($admitted==1) { echo'<p style="color:#10504F;">Admitted</p>'; } else { echo'<p style="color:var(--color-danger, #DC2626);">Discharge</p>'; }
											// echo"</div>";
											if ($admitted==1) { echo"<div id=\"figure2\" style=\"width:100px;color:#10504F;\">ADMITTED</div>"; } 
											else { echo"<div id=\"figure2\" style=\"width:100px;color:var(--color-danger, #DC2626);\">DISCHARGED</div>"; }

											
											#if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {}

									echo"</div>";
									
									
									}
									echo'</div>';
									if($param!='default'){
									addsearch($name,$a,$cusno);
									}
	
}

function heading($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$cname,$cardno,$time,$comname2){
	include_once(__DIR__ . '/../r/init.php');
echo'<div style="width:100%;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:2px solid #333">';
echo'<div style="clear:both; margin-bottom:10px"></div>';
echo'<img alt="Logo" src="'.$logo.'" style="max-height:70px; margin:0px 10px 0 10px; position:absolute;"/>';
echo'<p style="text-align:center;font-size:25px;margin:0 0 0 0px">'.$comname2.'</p>';
echo'<div style="clear:both"></div>';
echo'<p style="text-align:center;font-size:25px;margin:0 0 0 0px">'.$comname.'</p>';
echo'<div style="clear:both"></div>';
echo'<p style="text-align:center;margin:0 0 0 0px">P.O Box '.$Add.'<br/>Tel: '.$tel.'<br/>Website: '.$web.'<br/>Email: '.$email.'</p><div style="clear:both"></div>';
echo'<div style="clear:both"></div>';
echo'<p style="text-align:center;margin:0 0 0 0px;">OFFICIAL INVOICE</p>';
//echo'<div id="barcode" style="font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase">'.$rcptno.'</div>';
echo'<p style="text-align:center;    margin:0px 0 0 0px;border-bottom:1px dashed #333;border-top:1px dashed #333; padding:5px 0">Date:<label for="datepick2" class="bh-visually-hidden">OFFICIAL INVOICE</label><input type="text" id="datepick2" value="'.$date.'" style="border-style: none;"/> &nbsp; &nbsp;&nbsp;&nbsp;Time:'.convtime($time).' &nbsp; &nbsp;&nbsp;&nbsp;Invoice No: '.$rcptno.' &nbsp; &nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp; Patient Name: '.$patname.'&nbsp; &nbsp;&nbsp;&nbsp;Patient No: '.$patid.'</p>';
		$resultx =mysqli_query($db, "select auto,pntno,company from patients where pntno='".$patid."'");
		$rowx=mysqli_fetch_array($resultx);
echo '<p style="text-align:center; margin:0px 0 0 0px;border-bottom:1px dashed #333; padding:5px 0">Insurance:'.$cname.'&nbsp;&nbsp;&nbsp;Company:'.stripslashes($rowx['company']).' &nbsp; &nbsp;&nbsp;&nbsp;Card No: '.$cardno.'</p>';
echo'<div style="clear:both; margin-bottom:10px"></div>';
echo'<img alt="Convert to Pdf" src="images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-43px; cursor:pointer" onclick="window.print()" title="Convert to Pdf"/>';
echo'<div style="width:auto;  height:25px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">';echo'
<div style="width:300px;  height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Item name</p>';echo'
</div>';echo'
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Qty.</p>';echo'
</div>';echo'
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Price.</p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Total.</p>';echo'
</div>';
echo'</div>';


}
function loop112($row,$itot){
	echo'<div style="width:auto;  height:25px; border-bottom:1px solid #333">';echo'
<div style="width:300px;  height:25px;border-right:1px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;font-weight:normal;  margin:0 0 0 4px">'.stripslashes($row['ItemName']).'</p>';echo'
</div>';echo'
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px">'.stripslashes($row['Qty']).'</p>';echo'
</div>';echo'
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px">'.stripslashes($row['UnitPrice']).'</p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px">'.$itot .'</p>';echo'
</div>';echo'
</div>';
}
function footing($qty,$b,$d){
	echo'
<div style="width:auto;  height:25px; border-bottom:2px solid #333;  border-top:1px solid #333">';echo'
<div style="width:300px;  height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">Total</p>';echo'
</div>';echo'
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">qty</p>';echo'
</div>';echo'
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">qty</label><input type="text" id="companybill" value="'.$b.'" style="border-style: none;width:80px;"/></a>';echo'
</div>';echo'
</div>';
}
function dephead($dep){
	echo'<div style="width:auto;  height:25px; border-bottom:2px solid #333;  border-top:0px solid #333; margin-top:20px">';echo'
			<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">'.$dep.'</p>';echo'
		</div>';
}
function finalhead($tam,$fullname,$comam,$com2am,$sign_image){
	echo'<div>';echo'
<div style="clear:both; margin:20px 0"></div>';echo'
<div style="width:auto; height:25px; border-top:2px solid #333;border-bottom:2px solid #333;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">TOTAL AMOUNT BILLED</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$tam.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';echo'
</div>';

if($tam!=$comam){
	$nwvalue=$tam-$comam;
echo'
<div style="width:auto; height:25px; border-top:2px solid #333;border-bottom:2px solid #333; border-top:0;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">AMOUNT PAID:</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$nwvalue.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';echo'
</div>';

}
echo'
<div style="width:auto; height:25px;  border-top:2px solid #333;border-bottom:2px solid #333;border-top:0;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">CLAIM AMOUNT 1:</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';
$companyamnt=$comam-$com2am;
echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$companyamnt.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';echo'
</div>';

echo'
<div style="width:auto; height:25px;  border-top:2px solid #333;border-bottom:2px solid #333;border-top:0;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">CLAIM AMOUNT 2: [SHA]</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';
#$companyam=$comam-$com2am;
echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$com2am.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';
echo'</div>';


echo'<div style="float:right; margin:0 5px 0 0px;"><img alt="IMG 20240206 WA0003" src="images/IMG-20240206-WA0003.png" style="width:250px; height:40px; margin-right:100px;" /></div>';
echo'<div style="clear:both; margin-bottom:80px"></div>';

if($username='MC001'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='TL006'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='MC001'){
echo'<img alt="IMG 20240206 Lucy Muthara" src="images/IMG-20240206-Lucy-Muthara.png" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='LW009'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='JM036'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='AW043'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else{
echo'<p style="float:right;margin:0 5px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}

#echo $username;


#echo'<p style="float:right;margin:0 5px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
echo'<div style="clear:both; margin-bottom:40px"></div>';
echo'<div style="float:right; margin:0 5px 0 0px;"></div>';

echo'<div style="clear:both; margin-bottom:10px"></div>';echo'
<p style="text-align:center;    margin:0 0 0 0px">We wish you quick recovery.</p>';echo'
<p style="text-align:center;    margin:0 0 0 0px">You were Served By '.$fullname.'</p>';echo'
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">System Developers: APPCO SYSTEMS (www.BetterHealth.Co.Ke)</p>';echo'
</div>';echo'
</div>';

}

function headinop($logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$dept,$time,$comname2){
	echo'<div style="width:816px;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:1px solid #333">

<div style="width:60.0%; border-right:1px DASHED #333; float:left">
<img alt="Logo" src="'.$logo.'" style="float:left;max-height:107px; width:90px; margin:0px 10px 0 10px; "/>
<p style="text-align:left;font-size:16px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 10px">'.$comname.'<br/>'.$comname2.'<br/>P.O Box '.$Add.'<br/>Tel:'.$tel.'<br/>E: '.$email.'</p>
</div>

<div style="width:20.0%; border-right:1px DASHED #333; float:left">

</div>

<div style="width:39.0%; float:left; margin-left:5px;">
<p style="text-align:left;font-size:16px; margin-right:50px; text-transform:uppercase;font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 10px">Patient: '.$patname.' <br/>Invoice No: '.$rcptno.'<br/> Date:'.date('d/m/Y').'<br/>Time:'.convtime($time).' <br/>OPD No: '.$patid.'</p>';
//echo'<div style="clear:both; margin-bottom:10px" ></div>';
echo'<img alt="Convert to Pdf" src="images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-33px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>';
echo'</div>';

echo'<div style="clear:both; margin-bottom:0px; border-bottom:2px solid #333"></div>';

 echo'<div style="width:16.0%; border-right:1px solid #333; float:left">';
    echo'<p style="text-align:left; font-weight:bold;font-size:16px; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:10 10 20 10px;">INVOIVE TO :</p>';
    echo'<div style="clear:both; margin-bottom:47px;"></div>';

    echo'</div>';

    echo'<div style="width:40.0%; border-right:2px solid #333; float:left">';
    echo'<p style="text-align:left;font-size:18px;text-transform:uppercase; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;'.$patname.'</p>';
    //echo'<div style="clear:both; margin-bottom:5px; border-bottom:2px solid #333"></div>';
    echo'<p style="text-align:left;font-size:16px; text-transform:uppercase; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 7 10px">&nbsp;&nbsp;OUT-PATIENT</p>';
  
    echo'</div>';

    echo'<div style="width:39.0%; border-right:2px solid #ff;float:left">';
    echo'<p style="text-align:center;font-size:14px; text-transform:uppercase; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 10px">OFFICIAL INTERIM INVOICE</p>';
    //echo'<div id="barcode" style="font-family: Merchant; font-size:14px; font-weight:normal;">'.$rcptno.'</div>';
    echo'</div>';
    echo'<div style="clear:both; margin-bottom:10px; border-bottom:2px solid #333"></div>
		<div style="width:816px;   height:25px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">
		<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="padding-top:4px;text-align:center;font-weight:bold;  margin:0 0 0 0px">Item name</p>
		</div>
		<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
		<p style="padding-top:4px;text-align:center;font-weight:bold;  margin:0 0 0 0px">Qty.</p>
		</div>
		<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
		<p style="padding-top:4px;text-align:center;font-weight:bold;  margin:0 0 0 0px">Price.</p>
		</div>
		<div>
		<p style="padding-top:4px;text-align:center;font-weight:bold;  margin:0 0 0 0px">Total.</p>
		</div>
		</div>';

}


function bh_header($db,$logo,$comname,$email,$patname,$patid,$date,$Add,$tel,$web,$rcptno,$cname,$cardno,$time,$comname2){
echo'<div style="width:100%;min-height:300px; border:2px solid #333; margin-bottom:10px; border-bottom:2px solid #333">';
echo'<div style="clear:both; margin-bottom:10px"></div>';
echo'<img alt="Logo" src="'.$logo.'" style="max-height:70px; margin:0px 10px 0 10px; position:absolute;"/>';
echo'<p style="text-align:center;font-size:25px;margin:0 0 0 0px">'.$comname2.'</p>';
echo'<div style="clear:both"></div>';
echo'<p style="text-align:center;font-size:25px;margin:0 0 0 0px">'.$comname.'</p>';
echo'<div style="clear:both"></div>';
echo'<p style="text-align:center;margin:0 0 0 0px">P.O Box '.$Add.'<br/>Tel: '.$tel.'<br/>Website: '.$web.'<br/>Email: '.$email.'</p><div style="clear:both"></div>';
echo'<div style="clear:both"></div>';
echo'<p style="text-align:center;margin:0 0 0 0px;">OFFICIAL INVOICE</p>';
//echo'<div id="barcode" style="font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase">'.$rcptno.'</div>';
echo'<p style="text-align:center;    margin:0px 0 0 0px;border-bottom:1px dashed #333;border-top:1px dashed #333; padding:5px 0">Date:<label for="datepick2" class="bh-visually-hidden">OFFICIAL INVOICE</label><input type="text" id="datepick2" value="'.$date.'" style="border-style: none;"/> &nbsp; &nbsp;&nbsp;&nbsp;Time:'.convtime($time).' &nbsp; &nbsp;&nbsp;&nbsp;Invoice No: '.$rcptno.' &nbsp; &nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp; Patient Name: '.$patname.'&nbsp; &nbsp;&nbsp;&nbsp;Patient No: '.$patid.'</p>';
		$resultx =mysqli_query($db, "select * from patients where pntno='".$patid."'");
		$rowx=mysqli_fetch_array($resultx);
echo '<p style="text-align:center; margin:0px 0 0 0px;border-bottom:1px dashed #333; padding:5px 0">Insurance:'.$cname.'&nbsp;&nbsp;&nbsp;Company:'.stripslashes($rowx['company']).' &nbsp; &nbsp;&nbsp;&nbsp;Card No: '.$cardno.'</p>';
echo'<div style="clear:both; margin-bottom:10px"></div>';
echo'<img alt="Convert to Pdf" src="images/adobe.png" style="height:30px; float:right; margin-right:10px;  margin-top:-43px; cursor:pointer" onclick="window.print()" title="Convert to Pdf"/>';
echo'<div style="width:auto;  height:25px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333">';echo'
<div style="width:300px;  height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Item name</p>';echo'
</div>';echo'
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Qty.</p>';echo'
</div>';echo'
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Price.</p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">Total.</p>';echo'
</div>';
echo'</div>';


}
function bh_loop112($row,$itot){
	echo'<div style="width:auto;  height:25px; border-bottom:1px solid #333">';echo'
<div style="width:300px;  height:25px;border-right:1px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;font-weight:normal;  margin:0 0 0 4px">'.stripslashes($row['ItemName']).'</p>';echo'
</div>';echo'
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px">'.stripslashes($row['Qty']).'</p>';echo'
</div>';echo'
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px">'.stripslashes($row['UnitPrice']).'</p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center; font-weight:normal;  margin:0 0 0 0px">'.$itot .'</p>';echo'
</div>';echo'
</div>';
}
function bh_footer($qty,$b,$d){
	echo'
<div style="width:auto;  height:25px; border-bottom:2px solid #333;  border-top:1px solid #333">';echo'
<div style="width:300px;  height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">Total</p>';echo'
</div>';echo'
<div style="width:140px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px">qty</p>';echo'
</div>';echo'
<div style="width:150px;  height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">qty</label><input type="text" id="companybill" value="'.$b.'" style="border-style: none;width:80px;"/></a>';echo'
</div>';echo'
</div>';
}
function bh_finalhead($tam,$fullname,$comam,$sign_image){
	echo'<div>';echo'
<div style="clear:both; margin:20px 0"></div>';echo'
<div style="width:auto; height:25px; border-top:2px solid #333;border-bottom:2px solid #333;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">TOTAL AMOUNT BILLED</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$tam.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';echo'
</div>';

if($tam!=$comam){
	$nwvalue=$tam-$comam;
echo'
<div style="width:auto; height:25px; border-top:2px solid #333;border-bottom:2px solid #333; border-top:0;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">AMOUNT PAID:</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$nwvalue.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';echo'
</div>';

}
echo'
<div style="width:auto; height:25px;  border-top:2px solid #333;border-bottom:2px solid #333;border-top:0;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">CLAIM AMOUNT 1:</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$comam.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';
echo'</div>';

echo'
<div style="width:auto; height:25px;  border-top:2px solid #333;border-bottom:2px solid #333;border-top:0;">';echo'
<div style="width:300px; height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 40px">CLAIM AMOUNT 2: [SHA]</p>';echo'
</div>';echo'
<div style="width:140px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div style="width:150px; height:25px;border-right:1.5px solid #333; float:left;">';echo'
<p style="padding-top:4px;text-align:center;    margin:0 0 0 0px"></p>';echo'
</div>';echo'
<div>';echo'
<p style="padding-top:4px;text-align:center;    margin:0 -40px 0 0px">&nbsp;&nbsp;<label for="companybill" class="bh-visually-hidden">Text field</label><input type="text" id="companybill" value="'.$comam.'" style="border-style: none;width:80px;"/></p>';echo'
</div>';
echo'</div>';

echo'<div style="float:right; margin:0 5px 0 0px;"><img alt="IMG 20240206 WA0003" src="images/IMG-20240206-WA0003.png" style="width:250px; height:40px; margin-right:100px;" /></div>';
echo'<div style="clear:both; margin-bottom:80px"></div>';

if($username='MC001'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='TL006'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='MC001'){
echo'<img alt="IMG 20240206 Lucy Muthara" src="images/IMG-20240206-Lucy-Muthara.png" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='LW009'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else if($username='JM036'){
echo'<img alt="Sign Image" src="'.$sign_image.'" style="width:150px; height:80px;float:right;margin:-60px 200px 5px 5px" />';
echo'<p style="float:right;margin:25px -280px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}
else{
echo'<p style="float:right;margin:0 5px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
}

#echo $username;


#echo'<p style="float:right;margin:0 5px 0 0px"> Signature..................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
echo'<div style="clear:both; margin-bottom:40px"></div>';
echo'<div style="float:right; margin:0 5px 0 0px;"></div>';

echo'<div style="clear:both; margin-bottom:10px"></div>';echo'
<p style="text-align:center;    margin:0 0 0 0px">We wish you quick recovery.</p>';echo'
<p style="text-align:center;    margin:0 0 0 0px">You were Served By '.$fullname.'</p>';echo'
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px">System Developers: APPCO SYSTEMS (www.BetterHealth.Co.Ke)</p>';echo'
</div>';echo'
</div>';

}

function loopoutp112($row,$itot){
	echo '<div style="width:816px;   height:25px; border-bottom:1.5px solid #333">
<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
<p style="padding-top:4px;text-align:center;font-weight:normal;   margin:0 0 0 4px">'.stripslashes($row['ItemName']).'</p>
</div>
<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px">'.stripslashes($row['Qty']).'</p>
</div>
<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px">'.stripslashes($row['UnitPrice']).'</p>
</div>
<div>
<p style="padding-top:4px;text-align:center; font-weight:normal;   margin:0 0 0 0px">'.$itot.'</p>
</div>
</div>';
}
function footyoutp($qty,$b,$d){
 echo '<div style="width:816px;   height:25px; border-bottom:1px solid #333;  border-top:1px solid #333">
	<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Total</p>
	</div>
	<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">'.$qty.'</p>
	</div>
	<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
	</div>
	<div>
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">'.$b.'</a>
	</div>
	</div>
	</div>';
}
function finalheadoutp($tam,$cashier,$comam,$posted){
echo'<div>
<div style="clear:both; margin-bottom:20px"></div>
<div style="width:816px;   height:25px; border:1px solid #333;">
	<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Total Amount Billed</p>
	</div>
	<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
	</div>
	<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
	</div>
	<div>
	<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">'.$tam.'</p>
	</div>
</div>';

	if($tam!=$comam){
		$nwval=$tam-$comam;
	echo'<div style="width:816px;   height:25px; border:1px solid #333; border-top:0;">
			<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
			<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Amount Paid:</p>
			</div>
			<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
			<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
			</div>
			<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
			<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
			</div>
			<div>
			<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">'.$nwval.'</p>
			</div>
	    </div>';

	}

echo'<div style="width:816px;   height:25px; border:1px solid #333; border-top:0;">
		<div style="width:200px;   height:25px;border-right:1.5px solid #333; float:left; overflow:hidden">
		<p style="padding-top:4px;text-align:center;  margin:0 0 0 40px">Claim Amount:</p>
		</div>
		<div style="width:140px;   height:25px;border-right:1.5px solid #333; float:left;">
		<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
		</div>
		<div style="width:270px;   height:25px;border-right:1.5px solid #333; float:left;">
		<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px"></p>
		</div>
		<div>
		<p style="padding-top:4px;text-align:center;  margin:0 0 0 0px">'.$comam .'</p>
		</div>
		</div>
		<div style="width:816px;min-height:30px; border:1px solid #333; margin-bottom:10px; border-bottom:1px solid #333">
		<div style="clear:both; margin-bottom:10px"></div>
		<p style="text-align:center; width:816px;  margin:0 0 0 0px">We wish you quick recovery.</p>
		<p style="text-align:center; width:816px;  margin:0 0 0 0px">Prepared By '.$cashier.'.</p>
	 </div>
</div>';
}


function tasks($uid,$userid,$username){
	
	echo'<div id="mytasks" style="float:left;height:233px; width:501px; background:#fff; margin:0 0px 5px 0;padding-left:0px; border-radius:5px" onmouseover="showtaskadd();" onmouseout="hidetaskadd();">
			<div style="width:auto; height:25px; background:#f0f0f0; border-radius:5px 5px 0 0">
							<h5 style="text-align:center">Personal Manager</h5>
							</div>
							<img alt="Refresh" src="images/refresh.png" style="width:20px; height:20px; float:right; margin:-22px 10px 0 0; cursor:pointer" onclick="refreshmytasks()"  title="Refresh"/>		
				<div id="tabs2" style="width:493px; height:200px; float:left; margin:0px 5px 0 0px">
				<ul>
				<li><a href="#tabs-4">Messages</a><img alt="Create Message" src="images/plus.png" style="width:20px; height:20px; float:right; margin:4px 10px 0 0; cursor:pointer" onclick="createnewmess()"  title="Create Message"/></li>
				<li><a href="#tabs-5">My To do List</a><img alt="Create Task" src="images/plus.png" style="width:20px; height:20px; float:right; margin:4px 10px 0 0; cursor:pointer" onclick="createbigtask()"  title="Create Task" id="newcalendar"/></li>
				</ul>
			
			<div id="tabs-5">
							<div style="height:120px; overflow-y:auto">';
							$result =mysqli_query($db, "select * from mytasks where status=1 and User_id=".$userid." order by Event_id desc");
							$num_results = mysqli_num_rows($result);	
							for ($i=0; $i <$num_results; $i++) {
								$row=mysqli_fetch_array($result);
								$eid=stripslashes($row['Event_id']);
								$reason=stripslashes($row['Reason']);
				echo"<div id=\"task".$i."\">";
				echo'<input aria-label="Checkbox" type="checkbox" style="float:left; margin:8px 0px 0 10px" onclick="checktask('.$i.','.$eid.');"/>';
				echo"<a class=\"leb\" style=\"margin-left:10px; cursor:pointer\" 
				onclick=\"viewtask(".stripslashes($row['Event_id']).",'".stripslashes($row['Reason'])."','".stripslashes($row['Category'])."','".stripslashes($row['Location'])."'
				,'".stripslashes($row['TaskStatus'])."','".stripslashes($row['Priority'])."','".stripslashes($row['Complete'])."','".stripslashes($row['StartDate'])."','".stripslashes($row['StartTime'])."'
				,'".stripslashes($row['DueDate'])."','".stripslashes($row['DueTime'])."','".stripslashes($row['ReminderStatus'])."','".stripslashes($row['ReminderDate'])."','".stripslashes($row['ReminderTime'])."'
				,'".stripslashes($row['Status'])."','".stripslashes($row['User_id'])."','".stripslashes($row['Notes'])."')\">".$reason."</a>";
					echo'<div class="cleaner"></div>
					</div>';
							}
								
			echo'</div>
			<form action="#" method="get">
		<div id="taskadd" class="input_field" style="display:none;float:left;margin:5px 10px 10px 0px;width:460px; padding:0; background:#fff">
		<input type="text" placeholder="Type a task and press Enter..." name="keyword" id="taskfield"  class="input_field" style="border:0; float:left;width:400px; font-size:11px;background:#fff"';echo"/>";
		echo'<input aria-label="Text field" type="text"  id="" class="" style="font-size:12px; display:none; width:50px"/>';
				echo"<img alt=\"\" src=\"images/back2.png\" onclick=\"posttask('".$userid."')\" height=\"24\" width=\"24\" id=\"searchbutton\" style=\"margin:3px 5px 0 0; float:right; cursor:pointer\">
				</div></form>";
			echo'</div>
			<div id="tabs-4">
			<div style="height:150px; overflow-y:auto">';
			$result =mysqli_query($db, "select * from messages where sender='".$username."' or name='".$username."' order by id desc LIMIT 0,50");
			$num_results = mysqli_num_rows($result);	
			for ($i=0; $i <$num_results; $i++) {
				$row=mysqli_fetch_array($result);
				$id=stripslashes($row['id']);
				$message=stripslashes($row['message']);
				$from=stripslashes($row['sender']);
				$name=stripslashes($row['name']);
				$sta=stripslashes($row['status']);
									if($from==$username){
									$im="images/redarrow.png";$in=$name;
								}else {$im="images/right3green.png";$in=$from;}
				echo"<div id=\"mes".$i."\">";
				echo"<div class=\"cleaner\"></div><img alt=\"Im\" src=\"".$im."\" style=\"width:20px; height:20px; float:left; margin-top:2px\"/>";
				if($sta==0&&$name==$username){echo"
				<a class=\"leb\" id=\"lebo".$i."\" style=\"margin-left:10px; cursor:pointer; font-weight:bold; background:#3f9; padding:2px\" >".$message."";
				echo'<br/><label for="check'.$i.'" class="bh-visually-hidden">Mark as Read</label><input id="check'.$i.'" type="checkbox" style="float:right; margin:0px 0px 0 10px" onclick="checkmess('.$i.','.$id.');" title="Mark as Read"/><small style="float:right; font-weight:normal">['.stripslashes($row['date']).']-<b style="color:var(--color-danger, #DC2626)">'.$in.'</b></small></a>';
				}else{echo"<a class=\"leb\" style=\"margin-left:10px; cursor:pointer\" >".$message."";echo'<br/><small style="float:right; font-weight:normal">['.stripslashes($row['date']).']-<b style="color:var(--color-danger, #DC2626)">'.$in.'</b></small></a>';}
				echo'</div><div class=\"cleaner_h5\"></div>';
							}
				
				echo'</div></div>
			</div></div>';
}

function addsearch($param,$des,$regn){
		
		
		if(isset($_SESSION['recent'])){
				if(is_array($_SESSION['recent'])){
				$max=count($_SESSION['recent']);
				$_SESSION['recent'][$max]=array($param,$des,$regn,);
				$_SESSION['recent'] = array_unique($_SESSION['recent'], SORT_REGULAR);
					}
			}
		
		else{
			$_SESSION['recent']=array(array());
			$_SESSION['recent'][0]=array($param,$des,$regn,);
			$_SESSION['recent'] = array_unique($_SESSION['recent'], SORT_REGULAR);
							
			
		}
	
}
function page($param,$count,$z,$page){
	//pagination
	$per_page = 10;
    $pages = ceil($count/$per_page);
	$b=$page;
	echo'</div><div class="cleaner_h10"></div><ul id="pagination">';
		$c=$pages-5;
		if($b<=$c){
										$b=$page+5;
										}
										else{
											$b=$pages;
											}
										if($page>6){
											$f=$page-5;
											echo'<a style="font-size:30px; float:left; margin-right:5px"> ...</a>';
										}
										else{
											$f=1;
											}
										for($i=$f; $i<=$page-1; $i++){
										echo "<li id=\"".$i."\" onclick=\"paginateteach('".$z."','".$param."',".$i.")\">".$i."</li>";
										}
										

		echo "<li id=\"onspot\" onclick=\"paginateteach('".$z."','".$param."',".$page.")\" style=\"color:#FF0084; border:1px solid #999\">".$page."</li>";		
                 						for($i=$page+1; $i<=$b; $i++){
										echo "<li id=\"".$i."\" onclick=\"paginateteach('".$z."','".$param."',".$i.")\">".$i."</li>";
										}
										if($b!=$pages){echo'<p style="font-size:30px"> ...</p>';}
					 					echo '</ul>';
	
}
function page2($param,$count,$z,$page,$subid){
									//pagination
										$per_page = 10;
                    					$pages = ceil($count/$per_page);
										$b=$page;
								echo'</div>
								<div class="cleaner_h10"></div>
								<ul id="pagination">';
										$c=$pages-5;
										if($b<=$c){
										$b=$page+5;
										}
										else{
											$b=$pages;
											}
										if($page>6){
											$f=$page-5;
											echo'<a style="font-size:30px; float:left; margin-right:5px"> ...</a>';
										}
										else{
											$f=1;
											}
										for($i=$f; $i<=$page-1; $i++){
										echo "<li id=\"".$i."\" onclick=\"catepage('".$z."','".$i."','".$param."','".$subid."')\">".$i."</li>";
										}
										

		echo "<li id=\"onspot\" onclick=\"catepage('".$z."','".$i."','".$param."','".$subid."')\" style=\"color:#FF0084; border:1px solid #999\">".$page."</li>";		
                 						for($i=$page+1; $i<=$b; $i++){
										echo "<li id=\"".$i."\" onclick=\"catepage('".$z."','".$i."','".$param."','".$subid."')\">".$i."</li>";
										}
										if($b!=$pages){echo'<p style="font-size:30px"> ...</p>';}
					 					echo '</ul>';
	
}

function recent($a,$b){		
							echo'</div>
							</div>
							<div id="recentstude">
							<h5 style="margin-left:10px">Recent Searches</h5>';
							if(isset($_SESSION['recent'])){
								if(is_array($_SESSION['recent'])){
								$max=count($_SESSION['recent']);
								$least=0;
								if($max>=10){$least=$max-10;}
									
									for($i=$max-1;$i>=$least;$i--){
									$param=$_SESSION['recent'][$i][0];
									$des=$_SESSION['recent'][$i][1];
									$regn=$_SESSION['recent'][$i][2];
									if($des==$a){  
									echo"
<p style=\"font-size:11px; color:#333; margin-left:10px; cursor:pointer;\" onclick=\"paginate('".$b."','".$regn."')\">";
				echo"<img alt=\"\" src=\"images/bullet.png\" style=\"width:12px; height:12px; margin:0 3px -2px 0\" onclick=\"paginate('".$b."','".$regn."')\">".$param."</p>";
									
										}
									}
							}
							}
							echo'</div>
							</div>';
}
function studreport($result,$result2,$server,$usertype){
	$row=mysqli_fetch_array($result);
		#include(__DIR__ . '/includes/db_fns.php');
		require_once(__DIR__ . '/../r/init.php');
		$result3 =mysqli_query($db, "select * from company");
		$row3=mysqli_fetch_array($result3);
		$comname=stripslashes($row3['CompanyName']);
		$tel=stripslashes($row3['Tel']);
		$Add=stripslashes($row3['Address']);
		$email=stripslashes($row3['Email']);
	?>
	<div id="wrapper" style="color:#000; text-transform:uppercase">

  <div class="wrapper-mid">
    <!-- Begin Paper -->
  <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
        
        <div class="entry">
    <p style="text-align:center;font-size:18px;color:#10504F; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:14px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0 0 0 0px">P.O BOX <?php  echo $Add ?><BR/>Tel: <?php  echo $tel ?><br/>Email: <?php  echo $email ?></p>
<div class="cleaner_h20"></div>
</div>        
          <!-- Begin Image -->
          <img alt="" class="portrait" src="<?php echo stripslashes($row['image']) ?>" alt="Photo" style="margin-left:0px" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 style="width:auto; margin-top:30px; margin-left:10px;color:#10504F"><?php echo stripslashes($row['fullnames']) ?></h1>
            
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
       
        </div>
        <!-- Begin 1st Row -->
        
        <div class="entry">
        <div class="cleaner_h20"></div>
        <div class="detail_l">
        <h>Personal Details</h>
        
        	<ul>
            <li class=""><strong>Patient No: </strong><?php echo stripslashes($row['pntno']) ?></li>
             <li class=""><strong>O/P No: </strong><?php echo stripslashes($row['opno']) ?></li>
             <li class=""><strong>Date of Birth: </strong><?php echo stripslashes($row['dob']) ?></li>
              <li class=""><strong>Age: </strong><?php 
			   $a=date('Y')-substr(stripslashes($row['dob']),-4,4);
			  echo $a ?></li>
              <script>calcage(<?php substr(stripslashes($row['dob'])) ?>)</script>
              <li class=""><strong>Contact: </strong><?php echo stripslashes($row['contact']) ?></li>
              <li class=""><strong>Address: </strong><?php echo stripslashes($row['address']) ?></li>
             <li class=""><strong>Email: </strong><?php echo stripslashes($row['email']) ?></li>
             
           
            </ul>
        </div>
        <div class="detail_r">
         <h>Guardian Details</h>
        
        	<ul>
            <li class=""><strong>Names: </strong><?php echo stripslashes($row['gname']) ?></li>
              <li class=""><strong>R-Ship: </strong><?php echo stripslashes($row['grship']) ?></li>
              <li class=""><strong>Contacts: </strong><?php echo stripslashes($row['gcont']) ?></li>
              <li class=""><strong>Emergency No: </strong><?php echo stripslashes($row['geno']) ?></li>
              <li class=""><strong>Address: </strong><?php echo stripslashes($row['gaddress']) ?></li>
      	</ul>
        
        </div>
          <div class="cleaner_h20"></div>  
             <div class="cleaner_h20"></div> 
        <div class="detail_l" style="height:120px">
         <h>Employer Details</h>
        
        	<ul>
            <li class=""><strong>Employer Name: </strong><?php echo stripslashes($row['empname']) ?></li>
              <li class=""><strong>Employee No: </strong><?php echo stripslashes($row['empno']) ?></li>
              
      	</ul>
        </div>
        <div class="detail_r" style="height:120px">
        <h>Insurance Details</h>
        
        	<ul>
            <li class=""><strong>Insurer: </strong><?php echo stripslashes($row['insurer']) ?></li>
              <li class=""><strong>Card No: </strong><?php echo stripslashes($row['cardno']) ?></li>
              
      	</ul>
        </div>
          <div class="cleaner_h20"></div> 
        <div class="detaill" style="float:left;width:auto; min-height:100px; margin-left:20px;">
        <h>Documents</h>
        <img alt="Add Document" style="float:right; width:30px; height:30px; cursor:pointer" src="images/plus.png" title="Add Document" onclick="addoc();" />
         <div class="cleaner_h10"></div> 
         <?php 
		$num_results2 = mysqli_num_rows($result2);
		for ($i=0; $i <$num_results2; $i++) {
		$row2=mysqli_fetch_array($result2);
		if(stripslashes($row2['Type'])=='Image'){
		?>
        <div class="pot" title="click to Open">
        <img alt="" class="portrait2" src="<?php echo stripslashes($row2['Link']) ?>" alt="Photo"  onclick="window.open('http://<?php echo $server ?>/Better-Health/<?php echo stripslashes($row2['Link']) ?>')" style="max-width:100px; max-height:100px" />
        <p><?php echo stripslashes($row2['Name']) ?></p>
        </div>
		<?php } 
		if(stripslashes($row2['Type'])=='Document'){
		?>
        <div class="pot"  title="click to Open">
        <img class="portrait2" src="images/adobe.png" alt="Document"  onclick="window.open('http://<?php echo $server ?>/Better-Health/<?php echo stripslashes($row2['Link']) ?>')" />
      <p><?php echo stripslashes($row2['Name']) ?></p>
        </div> <?php } 
		}
		$stamp =RAND(1,99).date('s').RAND(1,99);
		$pntno=stripslashes($row['pntno']);
		?>
        </div>
            <div class="cleaner_h20"></div> 
            <div id="dok" style="width:auto; height:340px; border:1px solid #ccc; padding:10px; display:none">
            <img alt="Hide" style="float:right; width:30px; height:30px; cursor:pointer" src="images/delete.png" title="Hide" onclick="hidedoc();" />
        	
            <div class="cleaner_h10"></div>
            <form method="post" action="upload.php" enctype="multipart/form-data" target="leiframe">
      					<a class="labels">File Name:</a>
        	<label for="fname" class="bh-visually-hidden">Fname</label><input type="text" id="fname" required="required" name="fname" class="in_field" style="height:30px; margin-left:10px; float:left; width:150px"/>
            <div class="cleaner_h10"></div>
             <a class="labels">Type:</a>
            <label for="type" class="bh-visually-hidden">Type</label><select class="select" id="type" name="type" style="float:left; padding:5px; margin-left:10px">
            <option value="Image">Image</option>
            <option value="Document">Document</option>
            </select>	
            <div class="cleaner_h10"></div>	
            <a class="labels">Details:</a>
            <textarea aria-label="Details" name="details" style="width:300px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; height:120px; border:1px solid #10504F; float:left; margin-left:10px; border-radius:5px"></textarea>
								
								 <dd class="custuploadblock_js">
								<label for="photoupload" class="bh-visually-hidden">Image</label><input style="opacity:0; float:left;" name="image" id="photoupload"  
								class="transfileform_js" type="file">
								</dd>
								<iframe name="leiframe" id="leiframe" class="leiframe" style="float:right">
								</iframe>
                                <input type="hidden" id="pntno" name="pntno" value="<?php echo $pntno ?>"/>
                            	<input type="hidden" id="stamp" name="stamp" value="<?php echo $stamp ?>"/>
								<input type="hidden" id="id" name="id"  value="7"/>
								<div class="cleaner_h20"></div>
     							<input type="submit" value="upload" id="send"  
								style="margin-left:50px; float:left; cursor:pointer; height:35px"class="in_field"/>
								</form>
            
            </div>
            <div class="cleaner_h40" style="border-bottom:2px solid #ccc"></div>
          <div class="cleaner_h10"></div>  
          
           <?php
		   $result =mysqli_query($db, "select * from accesstbl where AccessCode=113");
			$row=mysqli_fetch_array($result);
			$var=stripslashes($row[$usertype]);
		   
           $result =mysqli_query($db, "select * from newprescription where PatId='".$pntno."'");
			$num_results = mysqli_num_rows($result);
			if($num_results>0&&$var=='YES'){
			?>
             <h1 style="text-align:center; margin-top:0; font-size:25px">OutPatient Medical Records</h1>
           <p style="margin-left:50px"><strong>No. of Records: </strong><?php echo $num_results ?></p>
          <div style="clear:both; margin-bottom:10px"></div>
         
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333;border-right:1.5px solid #333;">
<div style="width:155px; height:20px;border-right:1.5px solid #333;border-left:1.5px solid #333;  float:left; overflow:hidden">
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:5 0 0 0px">Date</p>
</div>

<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:5 0 0 0px">History</p>
</div>
<div style="width:185px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:5 0 0 0px">Diagnosis</p>
</div>
<div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:5 0 0 0px">Prescription</p>
</div>
</div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>


 <?php
			
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		$pid=stripslashes($row['PrescId']);
		?>
		<?php
		echo"<tr style=\"width:auto; height:20px;color:#333;cursor:pointer;font-weight:normal;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4&rcptno=".stripslashes($row['PrescId'])."')\">";
		?>
   		<td  style="width:113px;"><?php echo dateprint(stripslashes($row['TransDate'])); ?></td>
        <td  style="width:134px"><?php echo stripslashes($row['History'])?></td>
        <td  style="width:137px"><?php echo stripslashes($row['Diagnosis'])?></td>
         <td  style="width:204px;">
         	
         	<?php

				$resultb =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' order by id");
														$num_resultsb = mysqli_num_rows($resultb);	
														for ($x=0; $x <$num_resultsb; $x++) {
															$rowb=mysqli_fetch_array($resultb);
															
				
				echo stripslashes($rowb['prescription']).'<br/>';

					}
         	?>
         </td>
       
    </tr>
<?php } ?>

</tbody>
</table>
 <div style="clear:both; margin-bottom:10px"></div>
   <?php }

    $result =mysqli_query($db, "select * from inpatients where PatId='".$pntno."'");
			$num_results = mysqli_num_rows($result);
			if($num_results>0&&$var=='YES'){
			?>
             <h1 style="text-align:center; margin-top:0; font-size:25px">Inpatient Medical Records</h1>
           <p style="margin-left:50px"><strong>No. of Records: </strong><?php echo $num_results ?></p>
          <div style="clear:both; margin-bottom:10px"></div>
         
<div style="width:auto; height:20px; border-bottom:1.5px solid #333;  border-top:1.5px solid #333;border-right:1.5px solid #333;">
<div style="width:155px; height:20px;border-right:1.5px solid #333;border-left:1.5px solid #333;  float:left; overflow:hidden">
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:5 0 0 0px">Date</p>
</div>

<div style="width:180px; height:20px;border-right:1.5px solid #333; float:left;">
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:5 0 0 0px">Doctor in Charge</p>
</div>

<div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:5 0 0 0px">Admission Notes</p>
</div>
</div>

<table id="datatable"  style="width:100%;text-align:center;font-size:11px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; padding:0; " >
<tbody>


 <?php
			
		for ($i=0; $i <$num_results; $i++) {
		$row=mysqli_fetch_array($result);
		$pid=stripslashes($row['PrescId']);
		?>
		<?php
		echo"<tr style=\"width:auto; height:20px;color:#333;cursor:pointer;font-weight:normal;  padding:0\" onclick=\"window.open('http://$server/Better-Health/report.php?id=4.1&rcptno=".stripslashes($row['PrescId'])."')\">";
		?>
   		<td  style="width:135px;"><?php echo dateprint(stripslashes($row['TransDate'])); ?></td>
        <td  style="width:160px"><?php echo stripslashes($row['Doctor'])?></td>
        <td><?php echo stripslashes($row['AdmNotes'])?></td>
          </tr>
<?php } ?>

</tbody>
</table>
   <?php }?>
          
        </div>
        <!-- Begin 5th Row -->
      </div>
   
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>

</div>

<?php 
}
function employreport($result,$resulta){
	$row=mysqli_fetch_array($result);
	$rowa=mysqli_fetch_array($resulta);
?>
<!-- Begin Wrapper -->
<div id="container" style="height:1250px;">
<div id="wrapper">

  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <img alt="" class="portrait" src="<?php echo stripslashes($row['image']) ?>" alt="Photo" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 style="width:auto; margin-top:30px"><?php echo stripslashes($row['name']); echo' &nbsp'. stripslashes($row['oname']) ?></h1>
            
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
       
        </div>
        <!-- Begin 1st Row -->
        
        <div class="entry">
        <div class="cleaner_h20"></div>
        <div class="detail_l">
        <h>Personal Details</h>
        
        	<ul>
            <li class=""><strong>Emp No: </strong><?php echo stripslashes($row['emp']) ?></li>
             <li class=""><strong>Age: </strong><?php echo stripslashes($row['dob']) ?></li>
              <li class=""><strong>Phone: </strong><?php echo stripslashes($row['phone']) ?></li>
               <li class=""><strong>Address: </strong><?php echo stripslashes($row['address']) ?></li>
              <li class=""><strong>Dept: </strong><?php echo stripslashes($row['dept']) ?></li>
              <li class=""><strong>Position: </strong><?php echo stripslashes($row['pos']) ?></li>
              
            
            </ul>
        </div>
          
          
        <div class="detail_r" style="height:120px">
        <h>Salary Details</h>
        
        	<ul>
            <li class=""><strong>Gross Salary: </strong><?php echo stripslashes($rowa['sal']) ?></li>
             <li class=""><strong>Total Allowances: </strong><?php echo stripslashes($rowa['allow']) ?></li>
             <li class=""><strong>Advance: </strong><?php echo stripslashes($rowa['adva']) ?></li>
             <li class=""><strong>Insurance: </strong><?php echo stripslashes($rowa['ins']) ?></li>
              <li class=""><strong>NHIF: </strong><?php echo stripslashes($rowa['nhif']) ?></li>
               <li class=""><strong>NSSF: </strong><?php echo stripslashes($rowa['nssf']) ?></li>
                <li class=""><strong>Tax: </strong><?php echo stripslashes($rowa['tax']) ?></li>
             <li class=""><strong>Other Deductions: </strong><?php echo stripslashes($rowa['ded']) ?></li>
             <li class=""><strong>Overtime Hours: </strong><?php echo stripslashes($rowa['othrs']) ?></li>
             <li class=""><strong> Overtime Rate: </strong><?php echo stripslashes($rowa['rateot']) ?></li>
             <li class=""><strong>Net Pay: </strong><?php echo stripslashes($rowa['net']) ?></li>
              
            
           
            </ul>
        </div>
        <?php
		if(stripslashes($row['totattendance'])!=0){
        $a=stripslashes($row['attendance']) / stripslashes($row['totattendance']);
		$a=round($a,2)*100;
		$a=$a.'%';
		}else $a='0%';
		?>
        	
          <div class="cleaner_h50"></div>  
          
           <div class="detail_l">
          <h>Medical Details</h>
        
        	<ul>
            <li class=""><strong>Blood Group: </strong><?php echo stripslashes($row['bgroup']) ?></li>
              <li class=""><strong>Known Allergies: </strong><?php echo stripslashes($row['alergy']) ?></li>
              
      	</ul>
          <div class="cleaner_h10"></div>  
        <h>Other Details</h>
     
        	<ul>
            <li class=""><strong>Bank: </strong><?php echo stripslashes($row['bname'])?></li>
              <li class=""><strong>A/C No: </strong><?php echo stripslashes($row['acno'])?></li>
              <li class=""><strong>Attendance Level: </strong><?php echo $a ?></li>
      	</ul>
        </div>
     
         <div class="cleaner_h20"></div>  
        <h style="margin-left:250px"><strong>As of:</strong><?php echo stripslashes($rowa['month']) ?></h>
          
        </div>
        <!-- Begin 5th Row -->
      </div>
   
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>

</div>
</div>

<?php
}

function implement($result,$reg){
$row=mysqli_fetch_array($result);

?>
  	
      
       <div  class="owner">
        <div class="ptopret"></div>
       <div class="paper-top"></div>
       <div class="ptopret"></div>
     
      </div>
       <div class="cleaner"></div>
   
      <div id="paper-mid">
      
=====================================================================================================================================================         
        <div class="entry">
        
          <div class="self">
       
            <h1 style="width:100%">
			<?php 
			$resultx =mysqli_query($db, "select * from company");
			$rowx=mysqli_fetch_array($resultx);
			echo stripslashes($rowx['CompanyName'])?><br/></h1>
           <h1 style="width:100%">Payroll Report<br/></h1>
			<h1 style="width:100%">Month: <?php echo' &nbsp'. stripslashes($row['month']) ?><br/></h1>
            
            <h1 style="width:100%">Allocation: 
			<script>
             var ex  =( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ',');
             document.writeln(ex);
             </script>   
		
		<br/></h1>
			</h1>
            
            
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
       
        </div>
        <!-- Begin 1st Row -->
=====================================================================================================================================================       
        <div class="entry">
        <div class="cleaner_h20"></div>
       
      								<div id="figure6">
									<div id="figure7" style="width:60px">Emp</div>
									<div id="figure7" style="width:142px">Name</div>
									<div id="figure7" style="width:102px">Sal.</div>
									<div id="figure7" style="width:82px">Allow.</div>
                                    <div id="figure7" style="width:82px">OT hrs.</div>
									<div id="figure7" style="width:82px">Rate.</div>
									<div id="figure7" style="width:82px">Total OT.</div>
									<div id="figure7" style="width:82px">Adva.</div>
									<div id="figure7" style="width:82px">Insu.</div>
									<div id="figure7" style="width:82px">Deds.</div>
                                    <div id="figure7" style="width:82px">Tax.</div>
                                    <div id="figure7" style="width:82px">NSSF.</div>
									<div id="figure7" style="width:82px">NHIF.</div>
									
									<div id="figure7" style="width:104px">Net Pay</div>
									</div>
                             <?php 
							$result =mysqli_query($db, "select * from payroll where month='".$reg."'");
						$totalnet=0;$totalsal=0;$totalallow=0;$totaladva=0;$totalins=0;$totalded=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;$totaltax=0;
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
							$('.entry').hide();
										$().customAlert();
									alert('Error!', '<p>Cannot Preview Payroll.Details of ".stripslashes($row['name'])." have not been saved yet!</p>');
									e.preventDefault();
									</script>";	
								exit;	
							}
							echo'<div id="figure8">
									<div id="figure9a" class="figure9" style="width:60px">'.stripslashes($row['emp']).'</div>
									<div id="figure9" style="width:140px">'.stripslashes($row['name']).'</div>';?>
									<div id="figure9" style="width:100px">
									<script>
             						document.writeln(( <?php  echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));
             						</script>
                                    </div>
                                    <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['allow']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><?php echo stripslashes($row['othrs']) ?></div>
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['rateot']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['totalot']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    <div id="figure9b" class="figure9" style="width:100px"><script>
             						document.writeln(( <?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));
             						</script></div>
									
                                    
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['adva']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['ins']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['ded']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['tax']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['nssf']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['nhif']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     
                                    
                                   
									</div>
									<div class="cleaner"></div>
                                    <?php }
										?>
                                    <div id="figure6">
									<div id="figure7i" style="width:60px">Total</div>
									<div id="figure7i" style="width:142px"></div>
									<div id="figure7i" style="width:102px"><script>
             						document.writeln(( <?php  echo $totalsal ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalallow ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    <div id="figure7i" style="width:82px"><?php echo $totalothrs ?></div>
                                    <div id="figure7i" style="width:82px"></div>
                                  <div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalotal ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totaladva ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalins ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalded ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    <div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totaltax ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    <div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalnssf ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalnhif ?>).formatMoney(2, '.', ','));
             						</script></div>
									
                                    
									
                                    <div id="figure7i" style="width:104px">
									<script>
             						document.writeln(( <?php  echo $totalnet ?>).formatMoney(2, '.', ','));
             						</script></div>
									</div>
                                    
        
      </div>
   </div>
<?php }

function implement2(){

?>
  	
      
       <div  class="owner">
        <div class="ptopret"></div>
       <div class="paper-top"></div>
       <div class="ptopret"></div>
     
      </div>
       <div class="cleaner"></div>
   
      <div id="paper-mid">
      
=====================================================================================================================================================         
        <div class="entry">
        
          <div class="self">
       
            <h1 style="width:100%">
			<?php 
			$resultx =mysqli_query($db, "select * from company");
			$rowx=mysqli_fetch_array($resultx);
			echo stripslashes($rowx['CompanyName'])?><br/></h1>
           <h1 style="width:100%">Payroll Report<br/></h1>
			<h1 style="width:100%">Salaries Summary<br/></h1>
            
            
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
       
        </div>
        <!-- Begin 1st Row -->
=====================================================================================================================================================       
        <div class="entry" style="margin-left:30px">
        <div class="cleaner_h20"></div>
       
      								<div id="figure6">
									<div id="figure7" style="width:120px">Month</div>
									<div id="figure7" style="width:132px">Amount</div>
									<div id="figure7" style="width:122px">Sal.</div>
									<div id="figure7" style="width:82px">Allow.</div>
									<div id="figure7" style="width:82px">Adva.</div>
									<div id="figure7" style="width:82px">Insu.</div>
									<div id="figure7" style="width:82px">Deds.</div>
                                    <div id="figure7" style="width:82px">NSSF.</div>
									<div id="figure7" style="width:82px">NHIF.</div>
									<div id="figure7" style="width:82px">Tax.</div>
									<div id="figure7" style="width:82px">OT hrs.</div>
									<div id="figure7" style="width:82px">Rate.</div>
									<div id="figure7" style="width:82px">Total OT.</div>
									</div>
                             <?php 
							$result =mysqli_query($db, "select * from salregister");
						$totalnet=0;$totalam=0;$totalsal=0;$totalallow=0;$totaladva=0;$totalins=0;$totalded=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;$totaltax=0;
						$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
								$amount=stripslashes($row['amount']);
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
								$totalam+=$amount;
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
							
							
							echo'<div id="figure8">
									<div id="figure9a" class="figure9" style="width:120px">'.stripslashes($row['month']).'</div>';?>
									<div id="figure9" style="width:130px"><script>
             						document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure9" style="width:120px">
									<script>
             						document.writeln(( <?php  echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));
             						</script>
                                    </div>
                                    <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['allow']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['adva']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['ins']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['ded']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['nssf']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['nhif']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['tax']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
                                    <div id="figure9" style="width:80px"><?php echo stripslashes($row['othrs']) ?></div>
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['rateot']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9b" class="figure9" style="width:78px"><script>
             						document.writeln(( <?php  echo stripslashes($row['totalot']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                   
									</div>
									<div class="cleaner"></div>
                                    <?php }
										?>
                                    <div id="figure6">
									<div id="figure7i" style="width:120px">Total</div>
									<div id="figure7i" style="width:132px">
                                    <script>
             						document.writeln(( <?php  echo $totalam ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:122px"><script>
             						document.writeln(( <?php  echo $totalsal ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalallow ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totaladva ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalins ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalded ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
                                    <div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalnssf ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalnhif ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totaltax ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
									<div id="figure7i" style="width:82px"><?php echo $totalothrs ?></div>
                                    <div id="figure7i" style="width:82px"></div>
                                  <div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalotal ?>).formatMoney(2, '.', ','));
             						</script></div>
                                   
									</div>
                                    
        
      </div>
   </div>
<?php }
function implement3($result,$reg){
$row=mysqli_fetch_array($result);

?>
  	
      
       <div  class="owner">
        <div class="ptopret"></div>
       <div class="paper-top"></div>
       <div class="ptopret"></div>
     
      </div>
       <div class="cleaner"></div>
   
      <div id="paper-mid">
      
=====================================================================================================================================================         
        <div class="entry">
        
          <div class="self">
       
            <h1 style="width:100%">
			<?php 
			$resultx =mysqli_query($db, "select * from company");
			$rowx=mysqli_fetch_array($resultx);
			echo stripslashes($rowx['CompanyName'])?><br/></h1>
           <h1 style="width:100%">Employee Payroll Summary<br/></h1>
			 <h1 style="width:100%">Emp id: <?php  echo $reg ?>
			 
		
		<br/></h1>
			</h1>
            
            
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
       
        </div>
        <!-- Begin 1st Row -->
=====================================================================================================================================================       
        <div class="entry">
        <div class="cleaner_h20"></div>
       
      								<div id="figure6">
									<div id="figure7" style="width:60px">Emp</div>
									<div id="figure7" style="width:142px">Name</div>
									<div id="figure7" style="width:102px">Sal.</div>
									<div id="figure7" style="width:82px">Allow.</div>
									<div id="figure7" style="width:82px">Adva.</div>
									<div id="figure7" style="width:82px">Insu.</div>
									<div id="figure7" style="width:82px">Deds.</div>
                                    <div id="figure7" style="width:82px">NSSF.</div>
									<div id="figure7" style="width:82px">NHIF.</div>
									<div id="figure7" style="width:82px">Tax.</div>
									<div id="figure7" style="width:82px">OT hrs.</div>
									<div id="figure7" style="width:82px">Rate.</div>
									<div id="figure7" style="width:82px">Total OT.</div>
									<div id="figure7" style="width:104px">Net Pay</div>
									</div>
                             <?php 
							$result =mysqli_query($db, "select * from payroll where emp='".$reg."'");
						$totalnet=0;$totalsal=0;$totalallow=0;$totaladva=0;$totalins=0;$totalded=0;$totalothrs=0;$totalotal=0;$totalnssf=0;$totalnhif=0;$totaltax=0;
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
							
							
							echo'<div id="figure8">
									<div id="figure9a" class="figure9" style="width:60px">'.stripslashes($row['emp']).'</div>
									<div id="figure9" style="width:140px">'.stripslashes($row['month']).'</div>';?>
									<div id="figure9" style="width:100px">
									<script>
             						document.writeln(( <?php  echo stripslashes($row['sal']) ?>).formatMoney(2, '.', ','));
             						</script>
                                    </div>
                                    <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['allow']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['adva']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['ins']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['ded']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['nssf']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['nhif']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                     <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['tax']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
                                    <div id="figure9" style="width:80px"><?php echo stripslashes($row['othrs']) ?></div>
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['rateot']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                      <div id="figure9" style="width:80px"><script>
             						document.writeln(( <?php  echo stripslashes($row['totalot']) ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    <div id="figure9b" class="figure9" style="width:100px"><script>
             						document.writeln(( <?php  echo stripslashes($row['net']) ?>).formatMoney(2, '.', ','));
             						</script></div>
									
									</div>
									<div class="cleaner"></div>
                                    <?php }
										?>
                                    <div id="figure6">
									<div id="figure7i" style="width:60px">Total</div>
									<div id="figure7i" style="width:142px"></div>
									<div id="figure7i" style="width:102px"><script>
             						document.writeln(( <?php  echo $totalsal ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalallow ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totaladva ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalins ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalded ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
                                    <div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalnssf ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalnhif ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totaltax ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    
									<div id="figure7i" style="width:82px"><?php echo $totalothrs ?></div>
                                    <div id="figure7i" style="width:82px"></div>
                                  <div id="figure7i" style="width:82px"><script>
             						document.writeln(( <?php  echo $totalotal ?>).formatMoney(2, '.', ','));
             						</script></div>
                                    <div id="figure7i" style="width:104px">
									<script>
             						document.writeln(( <?php  echo $totalnet ?>).formatMoney(2, '.', ','));
             						</script></div>
									</div>
                                    
        
      </div>
   </div>
<?php }

?>