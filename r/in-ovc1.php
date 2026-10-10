<?php include(__DIR__ . '/../includes/db_fns.php');
bh_authz_note('in-ovc1', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
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

set_time_limit(300);
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
<title>Better Health OPD Visits Comparision Report</title>
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
$name='OPD VISITS COMPARISON';

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
    $years_arr=array();
    $yearly_total_per_cat=array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()));
    $months_arr=array(1=>'JANUARY',2=>'FEBRUARY',3=>'MARCH',4=>'APRIL',5=>'MAY',6=>'JUNE',7=>'JULY',8=>'AUGUST',9=>'SEPTEMBER',10=>'OCTOBER',11=>'NOVEMBER',12=>'DECEMBER' );
    $yearly_total_per_cat_ip=array('under5'=>array(),'over5'=>array(),'totals'=>array());
    $yearly_opd_visits=array(
       -1=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        0=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        1=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        2=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        3=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        4=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        5=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        6=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        7=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        8=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        9=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        10=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        11=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        12=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) ),
        13=>array('NewPatient'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),'Revisit'=>array('under5'=>array(),'over5'=>array(),'totals'=>array()) )
    );

    $yearly_ipd_admissions=array(
        0=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        1=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        2=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        3=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        4=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        5=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        6=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        7=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        8=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        9=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        10=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        11=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        12=>array('under5'=>array(),'over5'=>array(),'totals'=>array()),
        13=>array('under5'=>array(),'over5'=>array(),'totals'=>array())
    );

    if($d2>$d1){
        $temp_yr=$d1;
        while($d2>=$temp_yr){
            foreach ($yearly_opd_visits as $key => $value) {
                $yearly_ipd_admissions[$key]['under5'][$temp_yr]=0;
                $yearly_ipd_admissions[$key]['over5'][$temp_yr]=0;
                $yearly_ipd_admissions[$key]['totals'][$temp_yr]=0;
                $yearly_total_per_cat_ip['under5'][$temp_yr]=0;
                $yearly_total_per_cat_ip['over5'][$temp_yr]=0;                        
                $yearly_total_per_cat_ip['totals'][$temp_yr]=0;
                foreach ($yearly_opd_visits[$key] as $t => $v) {
                    if(!in_array($temp_yr,array_keys($yearly_opd_visits[$key][$t]['under5']))){
                        $yearly_opd_visits[$key][$t]['under5'][$temp_yr]=0;
                        $yearly_opd_visits[$key][$t]['over5'][$temp_yr]=0;
                        $yearly_opd_visits[$key][$t]['totals'][$temp_yr]=0;
                        $years_arr[]=$temp_yr;
                        $yearly_total_per_cat[$t]['under5'][$temp_yr]=0;
                        $yearly_total_per_cat[$t]['over5'][$temp_yr]=0;                        
                        $yearly_total_per_cat[$t]['totals'][$temp_yr]=0;
                    }    
                }
            }
            $temp_yr+=1;
        }
    }else{
        $temp_yr=$d2;
        while($d1>=$temp_yr){
            foreach ($yearly_opd_visits as $key => $value) {
                $yearly_ipd_admissions[$key]['under5'][$temp_yr]=0;
                $yearly_ipd_admissions[$key]['over5'][$temp_yr]=0;
                $yearly_ipd_admissions[$key]['totals'][$temp_yr]=0;
                $yearly_total_per_cat_ip['under5'][$temp_yr]=0;
                $yearly_total_per_cat_ip['over5'][$temp_yr]=0;                        
                $yearly_total_per_cat_ip['totals'][$temp_yr]=0;                                
                foreach ($yearly_opd_visits[$key] as $t => $v) {
                    if(!in_array($temp_yr,array_keys($yearly_opd_visits[$key][$t]['under5']))){
                        $yearly_opd_visits[$key][$t]['under5'][$temp_yr]=0;
                        $yearly_opd_visits[$key][$t]['over5'][$temp_yr]=0;
                        $yearly_opd_visits[$key][$t]['totals'][$temp_yr]=0;
                        $years_arr[]=$temp_yr;
                        $yearly_total_per_cat[$t]['under5'][$temp_yr]=0;
                        $yearly_total_per_cat[$t]['over5'][$temp_yr]=0;                        
                        $yearly_total_per_cat[$t]['totals'][$temp_yr]=0;
                    }    
                }
            }
            $temp_yr+=1;
        }
    }

 ?>
<table id="op_yearly_visits_comparison" class="moh--report moh--report-striped" style="width:100%;">
    <thead>
        <tr style="background-color:#000;color:#fff;">
            <th colspan="<?php echo ((count($years_arr)*6)+1);?>">OUTPATIENT DEPARTMENT COMPARISON BETWEEN NEW AND REVISITS <?php if($d1!=$d2){ echo'FROM '.$d1.' TO '.$d2;}else{ echo'IN '.$d2;} ?> </th>
        </tr>
    </thead>
    <tbody><?php 
    foreach ($yearly_opd_visits as $mon => $value) {
        foreach ($yearly_opd_visits[$mon] as $type => $value) {        
            foreach ($yearly_opd_visits[$mon][$type] as $cat => $cat_years) {
                foreach ($yearly_opd_visits[$mon][$type][$cat] as $year => $year_val) {
                    if($cat=='under5'){
                        $resultsVisits=mysqli_query($db,"SELECT COUNT(DISTINCT newprescription.PatId) AS monthVisits FROM newprescription LEFT JOIN patients ON newprescription.PatId=patients.pntno WHERE newprescription.Type='".$type."' AND ((DATEDIFF(DATE_FORMAT(STR_TO_DATE(newprescription.TransDate,'%Y/%m/%d'),'%Y/%m/%d'),DATE_FORMAT(STR_TO_DATE(patients.dob,'%d/%m/%Y'),'%Y/%m/%d'))+1)/365)<=5 AND DATE_FORMAT(STR_TO_DATE(newprescription.TransDate,'%Y/%m/%d'),'%M')='".ucfirst(strtolower($months_arr[$mon]))."' AND SUBSTRING(newprescription.Stamp,1,4)='".$year."' ");
                        $rowVisits=mysqli_fetch_assoc($resultsVisits);
                        $yearly_opd_visits[$mon][$type][$cat][$year]+=floatval($rowVisits['monthVisits']);                    
                        $yearly_opd_visits[$mon][$type]['totals'][$year]+=floatval($rowVisits['monthVisits']);                    
                        $yearly_total_per_cat[$type][$cat][$year]+=floatval($rowVisits['monthVisits']);
                        $yearly_total_per_cat[$type]['totals'][$year]+=floatval($rowVisits['monthVisits']); 
                    }else if($cat=='over5'){
                        $resultsVisits=mysqli_query($db,"SELECT COUNT(DISTINCT newprescription.PatId) AS monthVisits FROM newprescription LEFT JOIN patients ON newprescription.PatId=patients.pntno WHERE newprescription.Type='".$type."' AND ((DATEDIFF(DATE_FORMAT(STR_TO_DATE(newprescription.TransDate,'%Y/%m/%d'),'%Y/%m/%d'),DATE_FORMAT(STR_TO_DATE(patients.dob,'%d/%m/%Y'),'%Y/%m/%d'))+1)/365)>5 AND DATE_FORMAT(STR_TO_DATE(newprescription.TransDate,'%Y/%m/%d'),'%M')='".ucfirst(strtolower($months_arr[$mon]))."' AND SUBSTRING(newprescription.Stamp,1,4)='".$year."' ");
                        $rowVisits=mysqli_fetch_assoc($resultsVisits);
                        $yearly_opd_visits[$mon][$type][$cat][$year]+=floatval($rowVisits['monthVisits']);                    
                        $yearly_opd_visits[$mon][$type]['totals'][$year]+=floatval($rowVisits['monthVisits']);
                        $yearly_total_per_cat[$type][$cat][$year]+=floatval($rowVisits['monthVisits']);
                        $yearly_total_per_cat[$type]['totals'][$year]+=floatval($rowVisits['monthVisits']);                    
                    }else{continue;}
                    
                }
            }
        }
    }

    $counter=-1;
    foreach ($yearly_opd_visits as $mon => $value) {
        if($counter==-1){
        echo'<tr>';
                echo'<th> </th>';
            foreach ($yearly_opd_visits[$mon] as $type => $v) {
                if($type=='NewPatient'){$type_label='NEW VISIT';}else{$type_label='REVISITS'; }
                echo'<th style="text-align:center;" colspan="'.(count($yearly_opd_visits[$mon][$type]['under5'])*3).'"> '.$type_label.' </th>';
            }
        echo'</tr>';
        }else if($counter==0){
        echo'<tr>';
                echo'<th> </th>';
            foreach ($yearly_opd_visits[$mon] as $type => $v) {
                foreach ($yearly_opd_visits[$mon][$type] as $cat => $cat_years) {
                    if($cat=='under5'){$cat_label='UNDER 5';}else if($cat=='over5'){$cat_label='OVER 5';}else{$cat_label='TOTAL';}
                    echo'<th style="text-align:center;" colspan="'.count($yearly_opd_visits[$mon][$type][$cat]).'"> '.$cat_label.' </th>';
                }
            }
        echo'</tr>';
        echo'<tr>';
                echo'<th style="text-align:left;">MONTH </th>';
            foreach ($yearly_opd_visits[$mon] as $type => $v) {
                foreach ($yearly_opd_visits[$mon][$type] as $cat => $cat_years) {
                    foreach ($yearly_opd_visits[$mon][$type][$cat] as $year => $year_val) {
                        echo'<th style="text-align:left;"> '.$year.' </th>';
                    }                    
                }
            }
        echo'</tr>';
        }else if($counter==13){
        echo'<tr>';
                echo'<th style="text-align:left;">TOTAL </th>';
            foreach ($yearly_opd_visits[$mon] as $type => $value) {
                foreach ($yearly_opd_visits[$mon][$type] as $cat => $cat_years) {
                    foreach ($yearly_opd_visits[$mon][$type][$cat] as $year => $year_val) {
                        echo'<th style="text-align:left;"> '.$yearly_total_per_cat[$type][$cat][$year].' </th>';
                    }
                }
            }
        echo'</tr>';
        }else{
        echo'<tr>';
                echo'<td style="text-align:left;"> '.$months_arr[$mon].' </td>';
            foreach ($yearly_opd_visits[$mon] as $type => $value) {
                foreach ($yearly_opd_visits[$mon][$type] as $cat => $cat_years) {
                    foreach ($yearly_opd_visits[$mon][$type][$cat] as $year => $year_val) {
                        echo'<td style="text-align:left;"> '.$year_val.' </td>';
                    }
                }
            }
        echo'</tr>';
        }

        $counter++; 
    }

    ?>            
    </tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="page-break-after: always;"></div>
<table id="ip_generalward_comparison" class="moh--report moh--report-striped" style="width:100%;">
    <thead>
        <tr style="background-color: #000;color:#fff;">
            <th colspan="<?php echo ((count($years_arr)*3)+1);?>">COMPARISON OF ADMISSIONS IN GENERAL WARD <?php if($d1!=$d2){ echo'FROM '.$d1.' TO '.$d2;}else{ echo'IN '.$d2;} ?> </th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($yearly_ipd_admissions as $mon => $value) {
                foreach ($yearly_ipd_admissions[$mon] as $cat => $value) {        
                    foreach ($yearly_ipd_admissions[$mon][$cat] as $year => $year_val) {
                        if($cat=='under5'){
                            $resultsAdmissions=mysqli_query($db,"SELECT COUNT(DISTINCT inpatients.PatId) AS monthlyAdmissions FROM inpatients LEFT JOIN patients ON inpatients.PatId=patients.pntno WHERE ((DATEDIFF(DATE_FORMAT(STR_TO_DATE(inpatients.TransDate,'%Y/%m/%d'),'%Y/%m/%d'),DATE_FORMAT(STR_TO_DATE(patients.dob,'%d/%m/%Y'),'%Y/%m/%d'))+1)/365)<=5 AND DATE_FORMAT(STR_TO_DATE(inpatients.TransDate,'%Y/%m/%d'),'%M')='".ucfirst(strtolower($months_arr[$mon]))."' AND SUBSTRING(inpatients.Stamp,1,4)='".$year."' ");
                            $rowAdmissions=mysqli_fetch_assoc($resultsAdmissions);
                            $yearly_ipd_admissions[$mon][$cat][$year]+=floatval($rowAdmissions['monthlyAdmissions']);                    
                            $yearly_ipd_admissions[$mon]['totals'][$year]+=floatval($rowAdmissions['monthlyAdmissions']);                    
                            $yearly_total_per_cat_ip[$cat][$year]+=floatval($rowAdmissions['monthlyAdmissions']);
                            $yearly_total_per_cat_ip['totals'][$year]+=floatval($rowAdmissions['monthlyAdmissions']); 
                        }else if($cat=='over5'){
                            $resultsAdmissions=mysqli_query($db,"SELECT COUNT(DISTINCT inpatients.PatId) AS monthlyAdmissions FROM inpatients LEFT JOIN patients ON inpatients.PatId=patients.pntno WHERE ((DATEDIFF(DATE_FORMAT(STR_TO_DATE(inpatients.TransDate,'%Y/%m/%d'),'%Y/%m/%d'),DATE_FORMAT(STR_TO_DATE(patients.dob,'%d/%m/%Y'),'%Y/%m/%d'))+1)/365)>5 AND DATE_FORMAT(STR_TO_DATE(inpatients.TransDate,'%Y/%m/%d'),'%M')='".ucfirst(strtolower($months_arr[$mon]))."' AND SUBSTRING(inpatients.Stamp,1,4)='".$year."' ");
                            $rowAdmissions=mysqli_fetch_assoc($resultsAdmissions);
                            $yearly_ipd_admissions[$mon][$cat][$year]+=floatval($rowAdmissions['monthlyAdmissions']);                    
                            $yearly_ipd_admissions[$mon]['totals'][$year]+=floatval($rowAdmissions['monthlyAdmissions']);
                            $yearly_total_per_cat_ip[$cat][$year]+=floatval($rowAdmissions['monthlyAdmissions']);
                            $yearly_total_per_cat_ip['totals'][$year]+=floatval($rowAdmissions['monthlyAdmissions']);                    
                        }else{continue;}
                        
                    }
                }
            }

            $counter2=0;
            foreach ($yearly_ipd_admissions as $month => $val) {
                if($counter2==0){
                echo'<tr>';
                        echo'<th> </th>';
                    foreach ($yearly_ipd_admissions[$month] as $cat => $v) {
                        if($cat=='under5'){$cat_label='UNDER 5';}else if($cat=='over5'){$cat_label='OVER 5';}else{$cat_label='TOTAL';}
                        echo'<th style="text-align:center;" colspan="'.count($yearly_ipd_admissions[$month][$cat]).'"> '.$cat_label.' </th>';
                    }
                echo'</tr>';
                echo'<tr>';
                        echo'<th style="text-align:left;">MONTH </th>';
                    foreach ($yearly_ipd_admissions[$month] as $cat => $v) {
                        foreach ($yearly_ipd_admissions[$month][$cat] as $year => $year_val) {
                            echo'<th style="text-align:left;"> '.$year.' </th>';
                        }
                    }
                echo'</tr>';
                }else if($counter2==13){
                echo'<tr>';
                        echo'<th style="text-align:left;">TOTAL </th>';
                    foreach ($yearly_ipd_admissions[$month] as $cat => $value) {
                        foreach ($yearly_ipd_admissions[$month][$cat] as $year => $year_val) {
                            echo'<th style="text-align:left;"> '.$yearly_total_per_cat_ip[$cat][$year].' </th>';
                        }
                    }
                echo'</tr>';
                }else if($counter2>0 && $counter2<13){
                echo'<tr>';
                        echo'<td style="text-align:left;"> '.$months_arr[$month].' </td>';
                    foreach ($yearly_ipd_admissions[$month] as $cat => $value) {
                        foreach ($yearly_ipd_admissions[$month][$cat] as $year => $year_val) {
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

<div style="clear:both; margin-bottom:10px"></div>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px;">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:12px; font-weight:bold;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;margin:0px;">Report pulled by <?php  echo $username.' on '.date('d/m/Y H:i:s'); ?>.</p>

</div>

</body>
</html>
