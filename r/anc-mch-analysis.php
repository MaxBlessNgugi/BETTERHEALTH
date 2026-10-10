<?php 
include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('anc-mch-analysis', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
include(__DIR__ . '/../includes/functions.php');
include __DIR__ . '/../includes/func.php';
include(__DIR__ . '/../includes/compile.php');

if(isset($_SESSION['valid_user'])){
    $username=$_SESSION['valid_user'];
}
else{
    echo"<script>window.location.href = \"index.php\";</script>";
    exit;
}

$result4 =mysqli_query($db, "select fullname from users where name='".mysqli_real_escape_string($db,$username)."'");
$row4=mysqli_fetch_assoc($result4);
$fullname=stripslashes($row4['fullname']);

$result =mysqli_query($db, "select * from company");
$row=mysqli_fetch_assoc($result);
$comname=strtoupper(stripslashes($row['CompanyName']));
$tel=stripslashes($row['Tel']);
$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../css/tokens.css" />
<link rel="stylesheet" href="../css/components.css" />
<title>Better Health Maternal Health Care Services</title>
<link id="favicon" href="../images/fav.png" rel="icon" type="image/png"/>
<style type="text/css">
    p{
        font-family:helvetica sans-serif;
        font-size: 14px;        
    }
    .moh--report {
        font-family:helvetica sans-serif;
        font-size: 14px;
        border-collapse: collapse;
    }
    .moh--report td,.moh--report th {
        border: 1px solid #000;
        padding: 5px;
    }
    .moh--report-striped tr:nth-child(even){
        background-color: #f2f2f2;
    }
    .moh-report-cb{
        cursor: pointer;
    }

</style>

</head>
<body>
	<a class="bh-skip" href="#bh-main">Skip to main content</a>
<?php
    $date=date('Y/m/d');
    $stamp=date('Ymd');
    $code=htmlsan($_GET['code']);
    $from_date=htmlsan($_GET['d1']);
    $to_date=htmlsan($_GET['d2']);
    if(isset($_GET['d1'])){
    	$d1=intval($_GET['d1']);
    }else $d1=0;
    if(isset($_GET['d2'])){
    	$d2=intval($_GET['d2']);
    }else $d2=0;
    $name='HEALTH STATISTICS REPORT';


?>

<div style="width:100%;min-height:260px; border:2px solid #333" id="bh-main" tabindex="-1">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="" src="../<?php echo $logo ?>" style="max-height:105px; margin:0px 10px; position:absolute;"/>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px;"><?php echo str_replace("_", " ", $comname); ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px;">P.O BOX <?php echo $Add ?>, TEL: <?php echo $tel ?>
<br/>WEBSITE: <?php echo $web ?><br/>EMAIL: <?php echo $email ?></p><div style="clear:both"></div>
<div style="clear:both"></div>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px"><?php echo $name ?> FROM&nbsp;<?php echo $d1 ?>&nbsp;TO&nbsp;<?php echo $d2 ?></p><?php } else{?>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px">FULL REPORT </p>
<?php } ?>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px;"> <strong style="font-size:12px">DATE:<?php echo dateprint($date) ?></strong> </p>

<div style="clear:both; margin-bottom:10px"></div>

<?php
    $years_arr=array(); $year_monthly_ultrasound=array();
    $months_arr=array(1=>'JANUARY',2=>'FEBRUARY',3=>'MARCH',4=>'APRIL',5=>'MAY',6=>'JUNE',7=>'JULY',8=>'AUGUST',9=>'SEPTEMBER',10=>'OCTOBER',11=>'NOVEMBER',12=>'DECEMBER' );
    $yearly_total_reqs_per_cat=array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array());

    $yearly_utilization_reqs=array(
        0=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        1=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        2=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        3=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        4=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        5=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        6=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        7=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        8=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        9=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        10=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        11=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        12=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array()),
        13=>array('NewPatient'=>array(),'Revisit'=>array(),'totals'=>array())
    );

    if($d2>$d1){
        $temp_yr=$d1;
        while($d2>=$temp_yr){
            foreach ($yearly_utilization_reqs as $key => $value) {
                $yearly_utilization_reqs[$key]['NewPatient'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['Revisit'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['totals'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['NewPatient'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['Revisit'][$temp_yr]=0;                        
                $yearly_total_reqs_per_cat['totals'][$temp_yr]=0;
                $years_arr[]=$temp_yr;
            }
            $temp_yr+=1;
        }
    }else{
        $temp_yr=$d2;
        while($d1>=$temp_yr){
            foreach ($yearly_utilization_reqs as $key => $value) {
                $yearly_utilization_reqs[$key]['NewPatient'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['Revisit'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['totals'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['NewPatient'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['Revisit'][$temp_yr]=0;                        
                $yearly_total_reqs_per_cat['totals'][$temp_yr]=0; 
                $years_arr[]=$temp_yr;                               
            }
            $temp_yr+=1;
        }
    }

 ?>

 <div style="width:100%;clear: both;padding: 10px;">
     <h4>MATERNAL HEALTH CARE SERVICES</h4>
 </div>
<table class="moh--report moh--report-striped" style="width:100%;">
    <thead>
        <tr style="background-color: #000;color:#fff;">
            <th colspan="<?php echo ((count($years_arr)*3)+1);?>"> ANTENATAL ATTENDANCE WORKLOAD ANALYSIS FROM JANUARY <?php echo $d1.' TO DECEMBER '.$d2; ?> </th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($yearly_utilization_reqs as $mon => $value) {
                foreach ($yearly_utilization_reqs[$mon] as $cat => $value) {        
                    foreach ($yearly_utilization_reqs[$mon][$cat] as $year => $year_val) {
                        $resultsVisits=mysqli_query($db, "SELECT COUNT(DISTINCT PatId) AS monthVisits FROM newprescription WHERE Type='".$cat."' AND DATE_FORMAT(STR_TO_DATE(TransDate,'%Y/%m/%d'),'%M')='".ucfirst(strtolower($months_arr[$mon]))."' AND DATE_FORMAT(STR_TO_DATE(TransDate,'%Y/%m/%d'),'%Y')='".$year."' AND Dept='ANC/MCH CLINIC' ");
                        $rowVisits=mysqli_fetch_assoc($resultsVisits);
                        $yearly_utilization_reqs[$mon][$cat][$year]+=floatval($rowVisits['monthVisits']);                    
                        $yearly_utilization_reqs[$mon]['totals'][$year]+=floatval($rowVisits['monthVisits']);                    
                        $yearly_total_reqs_per_cat[$cat][$year]+=floatval($rowVisits['monthVisits']);
                        $yearly_total_reqs_per_cat['totals'][$year]+=floatval($rowVisits['monthVisits']); 
                        
                    }
                }
            }


            $counter2=0;
            foreach ($yearly_utilization_reqs as $month => $val) {
                if($counter2==0){
                echo'<tr>';
                        echo'<th> </th>';
                    foreach ($yearly_utilization_reqs[$month] as $cat => $v) {
                        if($cat=='NewPatient'){$cat_label='FIRST VISITS';}else if($cat=='Revisit'){$cat_label='REVISITS';}else{$cat_label='TOTAL';}
                        echo'<th style="text-align:center;" colspan="'.count($yearly_utilization_reqs[$month][$cat]).'"> '.$cat_label.' </th>';
                    }
                echo'</tr>';
                echo'<tr>';
                        echo'<th style="text-align:left;">MONTH </th>';
                    foreach ($yearly_utilization_reqs[$month] as $cat => $v) {
                        foreach ($yearly_utilization_reqs[$month][$cat] as $year => $year_val) {
                            echo'<th style="text-align:left;"> '.$year.' </th>';
                        }
                    }
                echo'</tr>';
                }else if($counter2==13){
                echo'<tr>';
                        echo'<th style="text-align:left;">TOTAL </th>';
                    foreach ($yearly_utilization_reqs[$month] as $cat => $value) {
                        foreach ($yearly_utilization_reqs[$month][$cat] as $year => $year_val) {
                            echo'<th style="text-align:left;"> '.$yearly_total_reqs_per_cat[$cat][$year].' </th>';
                        }
                    }
                echo'</tr>';
                }else if($counter2>0 && $counter2<13){
                echo'<tr>';
                        echo'<td style="text-align:left;"> '.$months_arr[$month].' </td>';
                    foreach ($yearly_utilization_reqs[$month] as $cat => $value) {
                        foreach ($yearly_utilization_reqs[$month][$cat] as $year => $year_val) {
                            echo'<td style="text-align:left;"> '.$year_val.' </td>';
                        }
                    }
                echo'</tr>';
                }

                $counter2++; 
            }

        ?>
    </tbody>
</table>

<div style="width:100%;padding:5px 5px 5px 100px;clear:both;">
        <ul>
            <li>.............................................................</li>
        </ul>
</div>

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px;">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px;">Report pulled by <?php  echo $username.' on '.date('d/m/Y H:i:s'); ?>.</p>




</div>

</body>
</html>
