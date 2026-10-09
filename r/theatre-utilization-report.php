<?php 
include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('theatre-utilization-report', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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
<title>Better Health Theatre &amp; Radiology Utilization Report</title>
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
    $name='THEATRE AND RADIOLOGY UTILIZATION';


?>

<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img src="../<?php echo $logo ?>" style="max-height:105px; margin:0px 10px; position:absolute;"/>
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
    $yearly_total_reqs_per_cat=array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array());

    $yearly_utilization_reqs=array(
        0=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        1=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        2=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        3=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        4=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        5=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        6=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        7=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        8=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        9=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        10=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        11=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        12=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array()),
        13=>array('major_operations'=>array(),'minor_operations'=>array(),'totals'=>array())
    );

    if($d2>$d1){
        $temp_yr=$d1;
        while($d2>=$temp_yr){
            $year_monthly_ultrasound[$temp_yr]=array('January'=>0,'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0 );
            foreach ($yearly_utilization_reqs as $key => $value) {
                $yearly_utilization_reqs[$key]['major_operations'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['minor_operations'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['totals'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['major_operations'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['minor_operations'][$temp_yr]=0;                        
                $yearly_total_reqs_per_cat['totals'][$temp_yr]=0;
                $years_arr[]=$temp_yr;
            }
            $temp_yr+=1;
        }
    }else{
        $temp_yr=$d2;
        while($d1>=$temp_yr){
            $year_monthly_ultrasound[$temp_yr]=array('January'=>0,'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0 );
            foreach ($yearly_utilization_reqs as $key => $value) {
                $yearly_utilization_reqs[$key]['major_operations'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['minor_operations'][$temp_yr]=0;
                $yearly_utilization_reqs[$key]['totals'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['major_operations'][$temp_yr]=0;
                $yearly_total_reqs_per_cat['minor_operations'][$temp_yr]=0;                        
                $yearly_total_reqs_per_cat['totals'][$temp_yr]=0; 
                $years_arr[]=$temp_yr;                               
            }
            $temp_yr+=1;
        }
    }

 ?>
<table class="moh--report moh--report-striped" style="width:100%;">
    <thead>
        <tr style="background-color: #000;color:#fff;">
            <th colspan="<?php echo ((count($years_arr)*3)+1);?>"> THEATRE UTILIZATION FROM JANUARY <?php echo $d1.' TO DECEMBER '.$d2; ?> </th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($yearly_utilization_reqs as $mon => $value) {
                foreach ($yearly_utilization_reqs[$mon] as $cat => $value) {        
                    foreach ($yearly_utilization_reqs[$mon][$cat] as $year => $year_val) {
                        if($cat=='major_operations'){
                            $resultsTheatre=mysqli_query($db,"SELECT COUNT(DISTINCT prescid) AS totalReqs FROM theatrequests WHERE DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%M')='".ucfirst(strtolower($months_arr[$mon]))."' AND DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%Y')='".$year."' AND deptfrom='IPD' ");
                            $rowTheatre=mysqli_fetch_assoc($resultsTheatre);
                            $yearly_utilization_reqs[$mon][$cat][$year]+=floatval($rowTheatre['totalReqs']);                    
                            $yearly_utilization_reqs[$mon]['totals'][$year]+=floatval($rowTheatre['totalReqs']);                    
                            $yearly_total_reqs_per_cat[$cat][$year]+=floatval($rowTheatre['totalReqs']);
                            $yearly_total_reqs_per_cat['totals'][$year]+=floatval($rowTheatre['totalReqs']); 
                        }else if($cat=='minor_operations'){
                            $resultsTheatre=mysqli_query($db,"SELECT COUNT(DISTINCT prescid) AS totalReqs FROM theatrequests WHERE DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%M')='".ucfirst(strtolower($months_arr[$mon]))."' AND DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%Y')='".$year."' AND deptfrom='OPD' ");
                            $rowTheatre=mysqli_fetch_assoc($resultsTheatre);
                            $yearly_utilization_reqs[$mon][$cat][$year]+=floatval($rowTheatre['totalReqs']);                    
                            $yearly_utilization_reqs[$mon]['totals'][$year]+=floatval($rowTheatre['totalReqs']);                    
                            $yearly_total_reqs_per_cat[$cat][$year]+=floatval($rowTheatre['totalReqs']);
                            $yearly_total_reqs_per_cat['totals'][$year]+=floatval($rowTheatre['totalReqs']);                   
                        }else{continue;}
                        
                    }
                }
            }


            $counter2=0;
            foreach ($yearly_utilization_reqs as $month => $val) {
                if($counter2==0){
                echo'<tr>';
                        echo'<th> </th>';
                    foreach ($yearly_utilization_reqs[$month] as $cat => $v) {
                        if($cat=='major_operations'){$cat_label='MAJOR OPERATIONS';}else if($cat=='minor_operations'){$cat_label='MINOR OPERATIONS';}else{$cat_label='TOTAL';}
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

<div style="clear:both; margin-bottom:20px"></div>
<div style="page-break-after: always;"></div>
<table class="moh--report moh--report-striped" style="width:100%;">
    <thead>
        <tr style="background-color:#262626;color:#fff;">
            <th colspan="14"> ULTRASOUND UTILIZATION FROM JANUARY <?php echo $d1.' TO DECEMBER '.$d2; ?> </th>
        </tr>
        <tr>
            <th></th>
            <?php 
                for ($i=1; $i<=count($months_arr); $i++) { 
                    echo'<th> '.$months_arr[$i].'</th>';
                }
            ?>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($year_monthly_ultrasound as $year => $value) {
                echo'<tr> 
                    <th> '.$year.'</th>';
                $year_total=0;
                foreach ($year_monthly_ultrasound[$year] as $mon => $reqs) {
                    $result=mysqli_query($db,"SELECT COUNT(DISTINCT radno) AS totalReqs FROM radrequests WHERE request LIKE '%ULTRASOUND%' AND DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%M')='".trim($mon)."' AND DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%Y')='".$year."' ");
                    $row=mysqli_fetch_assoc($result);
                    echo'<th> '.intval($row['totalReqs']).'</th>';
                    $year_total+=intval($row['totalReqs']);
                }

                echo'<th> '.$year_total.'</th> </tr>';

            }


        ?>
    
    </tbody>

</table>

<div style="width:100%;padding:5px 5px 5px 100px;clear:both;">
    <ul>
        <li>.............................................................</li>
    </ul>
</div>

<div style="clear:both; margin-bottom:40px"></div>
<table class="moh--report moh--report-striped" style="width:100%;">
    <thead>
        <tr style="background-color:#262626;color:#fff;">
            <th colspan="14"> X-RAY UTILIZATION FROM JANUARY <?php echo $d1.' TO DECEMBER '.$d2; ?> </th>
        </tr>
        <tr>
            <th></th>
            <?php 
                for ($i=1; $i<=count($months_arr); $i++) { 
                    echo'<th> '.$months_arr[$i].'</th>';
                }
            ?>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($year_monthly_ultrasound as $year => $value) {
                echo'<tr> 
                        <th> '.$year.'</th>';
                $year_total=0;
                foreach ($year_monthly_ultrasound[$year] as $mon => $reqs) {
                    $result=mysqli_query($db,"SELECT COUNT(DISTINCT radno) AS totalReqs FROM radrequests WHERE request LIKE '%X-RAY%' AND DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%M')='".trim($mon)."' AND DATE_FORMAT(STR_TO_DATE(date,'%d/%m/%Y'),'%Y')='".$year."' ");
                    $row=mysqli_fetch_assoc($result);
                    echo'<th> '.intval($row['totalReqs']).'</th>';
                    $year_total+=intval($row['totalReqs']);
                }

                echo'<th> '.$year_total.'</th> </tr>';

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
