<?php 

require_once(__DIR__ . '/db_fns.php');
bh_require_auth();

function open_invoice_summary($logo,$comname,$Add,$tel,$web,$email,$cname){
echo'<div style="width:100%;min-height:260px; border:2px solid #333">
<img alt="" src=../'.$logo.' style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">'.$comname.'<br/>P.O Box '.$Add.'<br/>Tel: '.$tel.'
<br/>Website: '.$web.'<br/>Email: '.$email.'<br/>OFFICIAL OPEN INVOICES SUMMARY<br/><strong style="font-size:16px">COMPANY:'.$cname.'</strong><br/><strong style="font-size:16px">Date: '.date('d/m/Y').'</strong></p>';







}

function unregistered_patients_eports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$pgheadtitle){
echo '
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Logo" src="../'.$logo.'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">'.$comname.'<br/>P.O Box '.$Add.'<br/>Tel: '.$tel.'
<br/>Website: '.$web.'<br/>Email: '.$email.'<br/>'.$pgheadtitle.'<br/>';
echo ' <strong style="font-size:16px">Date:'.dateprint($date).'</strong></p>';
 if($d1!=0){
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;'.dateprint($d1).'&nbsp;&nbsp;To:&nbsp;'.dateprint($d2).'</p>';
 } else {
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Full Report</p>';
 }
}
function lab_patient_reports($logo,$comname,$Add,$tel,$web,$email,$d1,$d2,$catname){
echo '
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Logo" src="'.$logo.'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">'.$comname.'<br/>P.O Box '.$Add.'<br/>Tel: '.$tel.'
<br/>Website: '.$web.'<br/>Email: '.$email.'<br/>';
$x='LAB REPORTS';
echo $x;
echo ' <br/><strong style="font-size:16px">Date:'.date('d/m/Y').'</strong><br/><strong style="font-size:16px">Category:'.$catname.'</strong></p>';
 if($d1!=0){
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;'.stamptodate($d1).'&nbsp;&nbsp;To:&nbsp;'.stamptodate($d2).'</p>';
 } else {
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Full Report</p>';
 }
 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
}


function pharmacy_dispenses_patient_reports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$code2,$pgheadtitle,$catname){
echo '
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Logo" src="../'.$logo.'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">'.$comname.'<br/>P.O Box '.$Add.'<br/>Tel: '.$tel.'
<br/>Website: '.$web.'<br/>Email: '.htmlspecialchars($email).'<br/>'.$pgheadtitle.'<br/>';
echo ' <strong style="font-size:16px">Date:'.date('d/m/Y').'</strong><br/><strong style="font-size:16px">Category:'.htmlspecialchars($catname).'</strong></p>';
 if($d1!=0){
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;'.dateprint($d1).'&nbsp;&nbsp;To:&nbsp;'.dateprint($d2).'</p>';
 } else {
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Full Report</p>';
 }
 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
}
function pharmacy_dispenses_patient_reports2($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$code2,$pgheadtitle,$catname){
echo '
<div style="width:100%;min-height:260px; border:2px solid #333">
<div style="clear:both; margin-bottom:10px"></div>
<img alt="Logo" src="../'.$logo.'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>
<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">'.$comname.'<br/>P.O Box '.$Add.'<br/>Tel: '.$tel.'
<br/>Website: '.$web.'<br/>Email: '.htmlspecialchars($email).'<br/>'.$pgheadtitle.'<br/>';
echo ' <strong style="font-size:16px">Date:'.date('d/m/Y').'</strong><br/><strong style="font-size:16px">Category:'.htmlspecialchars($catname).'</strong></p>';
 if($d1!=0){
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;'.dateprint($d1).'&nbsp;&nbsp;To:&nbsp;'.dateprint($d2).'</p>';
 } else {
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;margin:0 0 0 0px">Full Report</p>';
 }
 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);
}
function general_opd_clinic_patients_reports($logo,$comname,$Add,$tel,$web,$email,$date,$d1,$d2,$code,$pgheadtitle){
echo '<div style="width:100%;min-height:260px; border:2px solid #333">';
echo '<div style="clear:both; margin-bottom:10px"></div>';
echo '<img alt="Htmlspecialchars Logo" src="../'.htmlspecialchars($logo).'" style="max-height:105px; margin:0px 10px 0 10px; position:absolute;"/>';
echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">
'.htmlspecialchars($comname).'<br/>P.O Box '.htmlspecialchars($Add).'<br/>Tel: '.htmlspecialchars($tel).'<br/>Website: '.htmlspecialchars($web).'<br/>
Email: '.htmlspecialchars($email).'<br/>OPD '.$pgheadtitle.' PATIENTS LIST<br/><strong style="font-size:16px">Date:'.dateprint($date).'</strong></p>';

 if($d1!=0){
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">From:&nbsp;&nbsp;'.dateprint($d1).'&nbsp;&nbsp;To:&nbsp;'.dateprint($d2).'</p>';
 } else {
  echo '<p style="text-align:center;font-size:16px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;margin:0 0 0 0px">Full Report</p>';
 }

 $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);

//echo '<div style="clear:both; margin-bottom:10px"></div>';



}

function opdpatientsnewvisit_comparision_patient_reports($db,$d1,$d2){

echo '<table id="datatable1" style="width:50%;float: left;text-align:center;font-size:14px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding:0;" >';
#echo '<tbody>';
echo '<tr>
        <thscope="row"></th>
        <th scope="row" colspan="6">NEWVISIT</th>
      </tr>';
echo '<tr style="width:50%; height:20px;color:#fff; background:#333; padding:0">
        <td style="width:15%;">MONTH</td>
        <td colspan="2"><5</td>
        <td colspan="2">>5</td>
        <td colspan="2">TOTALS</td>
      </tr>';
echo '<tr style="width:50%; height:20px;color:#fff; background:#333; padding:0">
          <td style="width:10%;">MONTH</td>
          <td style="width:10%;">2022</td>
          <td style="width:10%;">2023</td>
          <td style="width:10%;">2022</td>
          <td style="width:10%;">2023</td>
          <td style="width:10%;">2022</td>
          <td style="width:10%;">2023</td>
      </tr>';


  $query = mysqli_query($db, "CALL sp_opdPatientsVisitComparision();"); 
  #$result =mysqli_query($db, "select * from sp_opdPatientsVisitComparision where Year>='".$d1."' and Year<='".$d2."' "); 

  $a=1;
  $zx=0;
    $num_rows = mysqli_num_rows($query);
    for ($i=0; $i <$num_rows; $i++) {
    $qry=mysqli_fetch_array($query);

    if($i%2==0){
        echo'<tr style="width:50%;height:20px;padding:0;font-weight:normal">';
        }else{ echo'<tr style="width:50%;height:20px;padding:0;background:#f0f0f0;font-weight:normal">';}

                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($qry['MonthName'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($qry['PatientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($qry['PatientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($qry['PatientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($qry['PatientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($qry['Miaka'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($qry['MedicalId'])."</td>";
        
  echo "</tr>";
}
#echo'</tbody>';
echo'</table>'; 



}

function opdrevisit_comparision_patient_reports($db,$d1,$d2){
echo '<table id="res254" style="width:50%;float: right;text-align:center;font-size:14px; font-weight:bold;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; padding:0;" >';
echo '<tbody>';
echo '<tr>
        <thscope="row"></th>
        <th scope="row" colspan="5">REVISIT</th>
      </tr>';
echo '<tr style="width:50%; height:20px;color:#fff; background:#333; padding:0">
        <td colspan="2"><5</td>
        <td colspan="2">>5</td>
        <td colspan="2">TOTALS</td>
      </tr>';
echo '<tr style="width:50%; height:20px;color:#fff; background:#333; padding:0">
          <td style="width:10%;">2022</td>
          <td style="width:10%;">2023</td>
          <td style="width:10%;">2022</td>
          <td style="width:10%;">2023</td>
          <td style="width:10%;">2022</td>
          <td style="width:10%;">2023</td>
      </tr>';
  if(!check_required_files()){ require_once(__DIR__ . '/../r/init.php'); }
  #$res254 = "CALL sp_opdClientsVisitComparision";
  #mysqli_query($db,$res254);
    $res254 =mysqli_query($db, "CALL sp_opdClientsVisitComparision();"); 
    $num_res254 = mysqli_num_rows($res254);
    for ($m=0; $m <$num_res254; $m++) {
    $row254=mysqli_fetch_array($res254);
    #echo print_r($row254);
    //  echo '<pre>';
    //   print_r($row254);
    // echo '</pre>';

    if($m%2==0){
        echo'<tr style="width:50%;height:20px;padding:0;font-weight:normal">';
        }else{ echo'<tr style="width:50%;height:20px;padding:0;background:#f0f0f0;font-weight:normal">';}

                 #echo "<td style='width:5%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['MonthName'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['ClientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['ClientType'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['Year'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['MonthName'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['DayOfWeek'])."</td>";
                 echo "<td style='width:10%;border-width:0.5px; border-color:#666; border-style:solid;'>".stripslashes($row254['MedicalId'])."</td>";
        
      echo "</tr>";
       //$m++;
    }
echo'</tbody>';
echo'</table>'; 
echo '<div style="clear:both; margin-bottom:10px" ></div>';
    #echo print_r($row254);
     echo '<pre>';
      print_r($row254);
    echo '</pre>';



}