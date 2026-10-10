<?php include(__DIR__ . '/includes/db_fns.php');

bh_require_auth();
include(__DIR__ . '/includes/functions.php'); 
date_default_timezone_set('Africa/Nairobi');
$value=$_GET['value'];
$resultx =mysqli_query($db, "select * from ledgers where ledgerid='".$value."'");
$rowx=mysqli_fetch_array($resultx);
$bal=stripslashes($rowx['bal']);
$name=stripslashes($rowx['name']);
if(isset($_GET['d1'])){
	$d1=$_GET['d1'];
}else $d1=0;
if(isset($_GET['d2'])){
	$d2=$_GET['d2'];
}else $d2=0;





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/tokens.css" />
<link rel="stylesheet" href="css/components.css" />
<title>Better Health  Reports</title>
<link id="favicon" href="images/fav.png" rel="icon" type="image/png"/>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/green.css" media="all" />
<link type="text/css" rel="stylesheet" href="css/feedback.css">
<script type="text/javascript" src="js/bh-feedback.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
</head>

<body>
	<a class="bh-skip" href="#bh-main">Skip to main content</a>
 
       <div  class="owner" id="bh-main" tabindex="-1">
        <div class="ptopret"></div>
       <div class="paper-top"></div>
       <div class="ptopret"></div>
     
      </div>
       <div class="cleaner"></div>
   
      <div id="paper-mid">
     
=====================================================================================================================================================         
        <div class="entry">
        
          <div class="selfx">
       
             <h1 style="width:100%font-size:30px;">
			<?php 
			$resultx =mysqli_query($db, "select * from company");
			$rowx=mysqli_fetch_array($resultx);
			echo stripslashes($rowx['CompanyName'])?></h1>
           <h1 style="width:100%;font-size:30px;"><?php echo $name ?> </h1>
           <h1 style="width:100%;font-size:30px;">Ledger Report</h1>
           <?php if($d1==0){?>
           <h1 style="width:100%;font-size:30px;">Full Report<br/></h1>
			 <?php } else {?><h1 style="width:100%;font-size:30px;">From: <?php echo' &nbsp'.dateprint($d1) ?> to <?php echo' &nbsp'.dateprint($d2) ?> <br/></h1><?php } ?>
            <h1 style="width:100%;font-size:30px;">Balance: 
			<script>
             var ex  =( <?php  echo $bal ?>).formatMoney(2, '.', ',');
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
        <div class="entry" style="padding-left:10px">
        <div class="cleaner_h20"></div>
       
      								
 <?php 
$d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);

if($value==601){
	echo'<div id="figure6">
									<div id="fig7"  style="width:100px">Date</div>
                                    <div id="fig7"  style="width:102px">Trans ID.</div>
									<div id="fig7"  style="width:222px">Ledger Id</div>
									<div id="fig7x" style="width:452px">Ledger Name</div>
									<div id="fig7"  style="width:243px">Balance</div>
									</div>';
	if($d1==0){
$result =mysqli_query($db, "select * from generalledger order by transid desc");
}
else{
	$result =mysqli_query($db, "select * from generalledger  where stamp>='".$d1."' and stamp<='".$d2."'  order by transid desc");
	}
$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							
							echo'<div id="figure8">
								
									<div id="fig9a" class="fig9"style="width:100px">'.dateprint(stripslashes($row['date'])).'</div>
									<div id="fig9" style="width:100px">'.stripslashes($row['transid']).'</div>';
									echo'<div id="fig9" style="width:220px">'.stripslashes($row['lid']).'</div>';
									echo'<div id="fig9x" class="fig9" style="width:450px">'.stripslashes($row['lname']).'</div>';?>
						<div id="fig9b" class="fig9" style="width:240px">
									<script>
             						document.writeln(( <?php  echo stripslashes($row['balance']) ?>).formatMoney(2, '.', ','));
             						</script>
                                    
                                    </div>
                              	</div>
									<div class="cleaner"></div>
                                    <?php }
										
	
	

exit;
}

echo'								<div id="figure6">
									<div id="fig7"  style="width:150px;color:#fff;">Date</div>
                                    <div id="fig7"  style="width:102px;color:#fff;">Trans ID.</div>
									<div id="fig7"  style="width:222px;color:#fff;">From</div>
									<div id="fig7x" style="width:452px;color:#fff;">Description</div>
									<div id="fig7" style="width:102px;color:#fff;">Amount</div>
									<div id="fig7"  style="width:143px;color:#fff;">Balance</div>
									</div>';

if($d1==0){
$result =mysqli_query($db, "select * from ledgerentries where crid=".$value." or drid=".$value." order by transid desc");
}
else{
	$result =mysqli_query($db, "select * from ledgerentries  where stamp>='".$d1."' and stamp<='".$d2."' and (crid=".$value." or drid=".$value.") order by transid desc");
	}
$num_results = mysqli_num_rows($result);
							for ($i=0; $i <$num_results; $i++) {
							$row=mysqli_fetch_array($result);
							
							echo'<div id="figure8">';
									if(stripslashes($row['sysDate'])==''){
									echo'<div id="fig9" style="width:150px">'.dateprint(stripslashes($row['date'])).'</div>';
									}else echo'<div id="fig9" style="width:150px">'.stripslashes($row['sysDate']).'</div>';

									//echo'<div id="fig9a" class="fig9"style="width:130px">'.stripslashes($row['sysDate']).'</div>';
									echo'<div id="fig9" style="width:100px">'.stripslashes($row['transid']).'</div>';
									if(stripslashes($row['crid'])==$value){
									echo'<div id="fig9" style="width:220px">'.stripslashes($row['drname']).'</div>';
									}else echo'<div id="fig9" style="width:220px">'.stripslashes($row['crname']).'</div>';
									echo'
									<div id="fig9x" class="fig9" style="width:450px">'.stripslashes($row['description']).'</div>';?>
									<div id="fig9" style="width:100px"><script>
             						document.writeln(( <?php  echo stripslashes($row['amount']) ?>).formatMoney(2, '.', ','));
             						</script></div>
									<div id="fig9b" class="fig9" style="width:140px">
									<?php if(stripslashes($row['crid'])==$value){ ?>
	                                    <script>
	             						document.writeln(( <?php  echo stripslashes($row['crbal']) ?>).formatMoney(2, '.', ','));
	             						</script>
                                    <?php } else { ?>
	                                    <script>
	             						document.writeln(( <?php  echo stripslashes($row['drbal']) ?>).formatMoney(2, '.', ','));
	             						</script>
                                      <?php }?>
                                    </div>
                              	</div>
									<div class="cleaner"></div>
                                    <?php }
										?>
                                  
                                    
        
      </div>
   </div>
</body>
</html>