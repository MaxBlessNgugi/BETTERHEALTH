<?php

require_once(__DIR__ . '/db_fns.php');
bh_require_auth();
/*
 * @author Appco Systems Ltd
 * @website https://www.AppcoSystems.Com
 * @website https://www.BetterHealth.Co.Ke
 * @facebbok https://www.facebook.com/appcosystems
 * @twitter https://twitter.com/appcosystems
 * @googleplus https://plus.google.com/+appcosystems
 * info@appcosystems.com
 * info@BetterHealth.Co.Ke
 * support@BetterHealth.Co.Ke
 */ 
$nwdatetime=date("Y-m-d H:i:s");
$nwtimestamp=date('YmdHis');
$nwdate=date('Y-m-d');
$nwstamp=date('Ymd');
$randomno=date('dHis').RAND(1,99);

function nwrandomno(){
    $rand = date('dHis').RAND(1,99);
    return $rand;
}
function nwtimestamp(){
    $dt = date('YmdHis');
    return $dt;
}
function nwdatetime(){
    $dt = date('Y-m-d H:i:s');
    return $dt;
}
function getCustomerId($db, $tbl, $regn){
  $query = mysqli_query($db, "SELECT `id` FROM ".$tbl." WHERE `pntno`='".$regn."'");
  $row = mysqli_fetch_array($query);
  $id = trim($row['id']);
  return $id;
}

function getClientId($db, $regn){
  $query = mysqli_query($db, "SELECT `auto` FROM `patients` WHERE `pntno`='".$regn."'");
  $row = mysqli_fetch_array($query);
  $id = trim($row['auto']);
  return $id;
}

function getClientNo($db, $clientid){
  $query = mysqli_query($db, "SELECT `pntno` FROM `patients` WHERE `auto`='".$clientid."'");
  $row = mysqli_fetch_array($query);
  $regn = trim($row['pntno']);
  return $regn;
}
function getOutPatientClientNo($db, $clientid){
  $query = mysqli_query($db, "SELECT `opno` FROM `patients` WHERE `auto`='".$clientid."'");
  $row = mysqli_fetch_array($query);
  $opno = trim($row['opno']);
  return $opno;
}
function getInPatientClientNo($db, $clientid){
  $query = mysqli_query($db, "SELECT `ipno` FROM `patients` WHERE `auto`='".$clientid."'");
  $row = mysqli_fetch_array($query);
  $ipno = trim($row['ipno']);
  return $ipno;
}
function getClientCategory($db, $clientid){
  $query = mysqli_query($db, "SELECT `registryCategory` FROM `patients` WHERE `auto`='".$clientid."'");
  $row = mysqli_fetch_array($query);
  $name = htmlsan(stripslashes($row['registryCategory']));
  return $name;
}
function getClientCategoryPerVisit($db, $prescid){
  $query = mysqli_query($db, "SELECT `regCategory` FROM `newprescription` WHERE `Id`='".$prescid."'");
  $row = mysqli_fetch_array($query);
  $name = htmlsan(stripslashes($row['regCategory']));
  return $name;
}
function getClientBillinTypePerVisit($db, $prescid){
  $query = mysqli_query($db, "SELECT `AccType` FROM `newprescription` WHERE `Id`='".$prescid."'");
  $row = mysqli_fetch_array($query);
  $name = htmlsan(stripslashes($row['AccType']));
  return $name;
}
function getWardClientBillinTypePerVisit($db, $prescid){
  $query = mysqli_query($db, "SELECT `BillinType` FROM `inpatients` WHERE `Id`='".$prescid."'");
  $row = mysqli_fetch_array($query);
  $name = htmlsan(stripslashes($row['BillinType']));
  return $name;
}
function getInsurerIdPerVisit($db, $prescid){
  $query = mysqli_query($db, "SELECT `in_insurer_id` FROM `newprescription` WHERE `Id`='".$prescid."'");
  $row = mysqli_fetch_array($query);
  $id = htmlsan(stripslashes($row['in_insurer_id']));
  return $id;
}
function getWardInsurerIdPerVisit($db, $prescid){
  $query = mysqli_query($db, "SELECT `insid` FROM `inpatients` WHERE `Id`='".$prescid."'");
  $row = mysqli_fetch_array($query);
  $id = htmlsan(stripslashes($row['insid']));
  return $id;
}
function checkOtherMedication($db, $prescid){
  $query = mysqli_query($db, "SELECT `Prescription` FROM `newprescription` WHERE `Id`='".$prescid."'");
  $row = mysqli_fetch_array($query);
  $name = stripslashes($row['Prescription']);
  return $name;
}
function getSendToName($db, $id) {
    $result = mysqli_query($db, "SELECT `name` FROM `sendto` WHERE `id`='".$id."' ");
    $row = mysqli_fetch_array($result);
    $name = htmlsan(stripslashes($row['name']));
    return $name;  
}
// function getClientOPDIPDInfo($db, $id) {
//     $result = mysqli_query($db, "SELECT `name` FROM `sendto` WHERE `id`='".$id."' ");
//     $row = mysqli_fetch_array($result);
//     $name = htmlsan(stripslashes($row['name']));
//     return $name;  
// }
function isClientInOPDorIPD($db, $id) {
    $result = mysqli_query($db, "SELECT `name` FROM `sendto` WHERE `id`='".$id."' ");
    $row = mysqli_fetch_array($result);
    $name = htmlsan(stripslashes($row['name']));
    return $name;  
}

function getGeneratePrescId($db) {
    $result = mysqli_query($db, "SELECT `Id` FROM `newprescription` ORDER BY `Id` DESC LIMIT 0,1");
    $row = mysqli_fetch_array($result);
    $id = stripslashes($row['Id'])+1;
    #$pres='O-'.$in_presc_id;
    return $id;  
}
function getPrescId($db, $prescno) {
    $result = mysqli_query($db, "SELECT `Id` FROM `newprescription` WHERE `PrescId`='".$prescno."' ");
    $row = mysqli_fetch_array($result);
    $id = htmlsan(stripslashes($row['Id']));
    return $id;  
}
function getPrescNo($db, $prescid) {
    $result = mysqli_query($db, "SELECT `PrescId` FROM `newprescription` WHERE `Id`='".$prescid."' ");
    $row = mysqli_fetch_array($result);
    $pid = htmlsan(stripslashes($row['PrescId']));
    return $pid;  
}
function getLabNo($db) {
    $result = mysqli_query($db, "SELECT `Id`,`labno` FROM `labrequests` ORDER BY `Id` DESC LIMIT 0,1");
    $row = mysqli_fetch_array($result);
    $labno = stripslashes($row['labno'])+1;
    return $labno;  
}
function getRadNo($db) {
    $result = mysqli_query($db, "SELECT `id`,`radno` FROM `radrequests` ORDER BY `id` DESC LIMIT 0,1");
    $row = mysqli_fetch_array($result);
    $radno = stripslashes($row['radno'])+1;
    return $radno;  
}
function getDreNo($db) {
    $result = mysqli_query($db, "SELECT `id`,`dreno` FROM `opdservicerequests` ORDER BY `id` DESC LIMIT 0,1");
    $row = mysqli_fetch_array($result);
    $dreno = stripslashes($row['dreno'])+1;
    return $dreno;  
}
function getBillNo($db) {
    $result = mysqli_query($db, "SELECT `id`,`billno` FROM `tempbill` ORDER BY `id` DESC LIMIT 0,1");
    $row = mysqli_fetch_array($result);
    $billno = stripslashes($row['billno'])+1;
    #$billno=1;
    return $billno;  
}
function getClinicId($db, $name) {
    $result = mysqli_query($db, "SELECT `id` FROM `clinics` WHERE `Abbr`='".$name."' ");
    $row = mysqli_fetch_array($result);
    $id = stripslashes($row['id']);
    return $id;  
}
function getClinicById($db, $id) {
    $result = mysqli_query($db, "SELECT `Abbr` FROM `clinics` WHERE `id`='".$id."' ");
    $row = mysqli_fetch_array($result);
    $name = htmlsan(stripslashes($row['Abbr']));
    return $name;  
}
function getClinicByName($db, $id) {
    $result = mysqli_query($db, "SELECT `Name` FROM `clinics` WHERE `id`='".$id."' ");
    $row = mysqli_fetch_array($result);
    $name = htmlsan(stripslashes($row['Name']));
    return $name;  
}
function getClienTypeClinic($db, $id){
    $query = mysqli_query($db, "SELECT `typeclinics` FROM `patients` WHERE `auto`='".$id."'");
    $row = mysqli_fetch_array($query);
    $name = htmlsan(stripslashes($row['typeclinics']));
    return $name;
}
function getTypeClinicId($db, $id){
    $query = mysqli_query($db, "SELECT `type_clinic_id` FROM `newprescription` WHERE `Id`='".$id."'");
    $row = mysqli_fetch_array($query);
    $clinic_id = htmlsan(stripslashes($row['type_clinic_id']));
    return getClinicById($db, $clinic_id);
}
function getPresClinicId($db, $id){
    $query = mysqli_query($db, "SELECT `type_clinic_id` FROM `newprescription` WHERE `Id`='".$id."'");
    $row = mysqli_fetch_array($query);
    $cid = htmlsan(stripslashes($row['type_clinic_id']));
    return $cid;
}
function getInvoiceNo($db) {
    $result = mysqli_query($db, "SELECT `RcptNo` FROM `sales` ORDER BY `TransNo` DESC LIMIT 0,1");
    $row = mysqli_fetch_array($result);
    $rcptno = stripslashes($row['RcptNo']);
    $rcptno = intval($rcptno)+1;
    return $rcptno;  
}
function getReceiptNo($db) {
    $result2 = mysqli_query($db, "SELECT `cash_rcpt_no` FROM `tblreceipts` WHERE `cash_rcpt_no` != 0 ORDER BY `id` DESC LIMIT 0,1");
    $row2 = mysqli_fetch_array($result2);
    $rcptno = intval($row2['cash_rcpt_no'])+1;
    return $rcptno;  
}
function getCompanyReceiptNo($db) {                
    $result3 = mysqli_query($db, "SELECT `comp_rcpt_no` FROM `tblreceipts` WHERE `comp_rcpt_no` != 0 ORDER BY `id` DESC LIMIT 0,1");
    $row3 = mysqli_fetch_array($result3);
    $rcptno = intval($row3['comp_rcpt_no'])+1;
    return $rcptno;  
}
function getBankReceiptNo($db) {                
    $result4 = mysqli_query($db, "SELECT `cash_rcpt_no` FROM `tblreceipts` WHERE `cash_rcpt_no` != 0 ORDER BY `id` DESC LIMIT 0,1");
    $row4 = mysqli_fetch_array($result4);
    $rcptno = intval($row4['cash_rcpt_no'])+1;
    return $rcptno;  
}
function getOPDServiceNo($db) {
    $result = mysqli_query($db, "SELECT `id`,`dreno` FROM `opdservicerequests` ORDER BY `id` DESC LIMIT 0,1");
    $row = mysqli_fetch_array($result);
    $servno = stripslashes($row['dreno'])+1;
    return $servno;  
}
// function getDailyInvoiceTotalCoverage($db,$clientno,$clientid) {
//     $sqlQry = mysqli_query($db, "SELECT SUM(TotalPrice) AS totcover FROM sales WHERE ClientId='".$clientno."' AND old_patient_id='".$clientid."' AND Date='".date('Y/m/d')."'");
//     $rw254 = mysqli_fetch_array($sqlQry);
//     if (isset($rw254['totcover'])) { $totcover = $rw254['totcover']; } else { $totcover=0; }
//     return $totcover;      
// }
function getDailyInvoiceTotalCoverage($db,$clientno,$clientid,$insid) {
    $result =mysqli_query($db, "SELECT * FROM sales WHERE ClientId='".$clientno."' AND old_patient_id='".$clientid."' AND Date='".date('Y/m/d')."'");
    $num_results = mysqli_num_rows($result);
    $qty=0;$itot=0;$tam=0;$b=0;$c=0;$d=0;
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
    $qty+=preg_replace('~,~', '', stripslashes($row['Qty']));
    $tam+=preg_replace('~,~', '', stripslashes($row['TotalPrice']));
    $itot=preg_replace('~,~', '', stripslashes($row['Qty'])) *  preg_replace('~,~', '', stripslashes($row['UnitPrice']));
    $d+=preg_replace('~,~', '', stripslashes($row['Discount']));
    $b+=$itot;
    }
    #echo print_r($row254);
    //  echo '<pre>';
    //   print_r($row254);
    // echo '</pre>';
                         
    if (isset($tam)) { $tam=$tam; } else { $tam=0; }                            
    return $tam;      
}
function getDailyIPDInvoiceTotalCoverage($db,$clientno,$clientid) {
    $sqlQry = mysqli_query($db, "SELECT SUM(TotalPrice) AS totcover FROM sales WHERE ClientId='".$clientno."' AND old_patient_id='".$clientid."' AND Date='".date('Y/m/d')."'");
    $rw254 = mysqli_fetch_array($sqlQry);
    if (isset($rw254['totcover'])) { $totcover = $rw254['totcover']; } else { $totcover=0; }
    return $totcover;      
}
function getTotalIPDInvoiceCoverage_deleted_scene($db,$clientno,$clientid,$prescid) {
    $sqlQry = mysqli_query($db, "SELECT SUM(subnet) AS totcover FROM tempbill WHERE patid='".$clientno."' AND old_in_patient_id='".$clientid."' AND old_in_presc_id='".$prescid."'");
    $rw254 = mysqli_fetch_array($sqlQry);
    if (isset($rw254['totcover'])) { $totcover=$rw254['totcover']; } else { $totcover=0; }                            
    return $totcover;      
}
function getTotalIPDInvoiceCoverage($db,$clientno,$clientid,$prescid) {
    $result =mysqli_query($db, "SELECT * FROM tempbill WHERE patid='".$clientno."' AND old_in_patient_id='".$clientid."' AND old_in_presc_id='".$prescid."' AND stamp='".date('Ymd')."'");
    $num_results = mysqli_num_rows($result);
    $qty=0;$itot=0;$tam=0;$b=0;$c=0;$d=0;
    for ($i=0; $i <$num_results; $i++) {
    $row=mysqli_fetch_array($result);
    $qty+=preg_replace('~,~', '', stripslashes($row['quat']));
    $tam+=preg_replace('~,~', '', stripslashes($row['subnet']));
    $itot=preg_replace('~,~', '', stripslashes($row['quat'])) *  preg_replace('~,~', '', stripslashes($row['price']));
    #$c+=preg_replace('~,~', '', stripslashes($row['Vat']));
    $d+=preg_replace('~,~', '', stripslashes($row['disc']));
    $b+=$itot;
    }
    #echo print_r($row254);
    //  echo '<pre>';
    //   print_r($row254);
    // echo '</pre>';
                         
    if (isset($tam)) { $tam=$tam; } else { $tam=0; }                            
    return $tam;      
}

function getLedgerNoByName($db, $username) {
    $res_ldg = mysqli_query($db, "SELECT `id`,`ledgerid` FROM `ledgers` WHERE `name`='".$username."' ");
    $rw_ldg = mysqli_fetch_array($res_ldg);
    $lid = htmlsan(stripslashes($rw_ldg['ledgerid'])); 
    return $lid;  
}

function existinChiefCashierChecker($db){   
  $query = mysqli_query($db, "SELECT `name` FROM `users` WHERE `position`='ChiefCashier' ORDER BY `userid` DESC LIMIT 0,1");
  $row = mysqli_fetch_array($query);
  $name = trim($row['name']);
  return $name;
}

function getLabSectionNameById($db, $id) {
    $result = mysqli_query($db, "SELECT `SubCategory` FROM `items` WHERE `ItemCode`='".$id."' ");
    $row = mysqli_fetch_array($result);
    $name = htmlsan(stripslashes($row['SubCategory']));
    return $name;  
}

function bankAccountDetails($db,$id) {
  $result=mysqli_query($db,"SELECT * FROM bank_accounts WHERE id=".$id);
  $row=mysqli_fetch_array($result);
  $response=array(
      'name'=>ucwords(strtolower(stripslashes($row['accountName']))),
      'bank_id'=>stripslashes($row['bankID']),
      'branch_id'=>stripslashes($row['branchID']),
      'accnt_no'=>stripslashes($row['accountNo']),
      'type'=>stripslashes($row['type']),
      'bal'=>stripslashes($row['bal']),
      'desc'=>ucwords(strtolower(stripslashes($row['description']))),
      'opening_date'=>stripslashes($row['openingDate']),
      'min_id'=>stripslashes($row['ministryID'])
    ); 
  return $response;
 
}
function usuarioAccountDetails($db,$id) {
  $result=mysqli_query($db,"SELECT * FROM users WHERE userid=".$id);
  $row=mysqli_fetch_array($result);
  $response=array(
      'fullname'=>ucwords(strtoupper(stripslashes($row['fullname']))),
      'old_in_full_name'=>ucwords(strtoupper(stripslashes($row['fullname']))),
      'username'=>ucwords(strtoupper(stripslashes($row['name']))),
      'old_in_user_name'=>ucwords(strtoupper(stripslashes($row['name']))),
      'usertype'=>stripslashes($row['position']),
      'old_in_user_type'=>stripslashes($row['position']),
      'userid'=>stripslashes($row['userid']),
      'old_in_user_id'=>stripslashes($row['userid']),
      'photo'=>stripslashes($row['photo']),
      'userdep'=>stripslashes($row['dept']),
      'old_in_user_dept'=>stripslashes($row['dept']),
      'sign_image'=>ucwords(strtolower(stripslashes($row['sign_image']))),
      'userno'=>stripslashes($row['userno'])
    ); 
  return $response;
 
}

function pacienteRegistryDetails($db,$id) {
  $result=mysqli_query($db,"SELECT * FROM patients WHERE auto=".$id);
  $row=mysqli_fetch_array($result);
  $response=array(
      'in_patient_id'=>stripslashes($row['auto']),
      'in_patient_no'=>stripslashes($row['pntno']),
      'in_patient_name'=>ucwords(strtoupper(stripslashes($row['fullnames']))),
      'in_birth_date'=>stripslashes($row['dob']),
      'in_patient_age'=>stripslashes($row['age']),
      'in_patient_gender'=>stripslashes($row['gender']),
      'in_patient_contact'=>stripslashes($row['contact']),
      'in_patient_address'=>stripslashes($row['address']),
      'in_patient_email'=>stripslashes($row['email']),
      'in_patient_gname'=>stripslashes($row['gname']),
      'in_patient_grship'=>stripslashes($row['grship']),
      'in_patient_gcont'=>stripslashes($row['gcont']),
      'in_patient_geno'=>stripslashes($row['geno']),
      'in_insurer_id'=>stripslashes($row['insid']),
      'in_insurer_name'=>stripslashes($row['insurer']),
      'in_insurer_cardno'=>stripslashes($row['cardno'])
    ); 
  return $response;
 
}

#$paciente=pacienteRegistryDetails($db,$id);

function otherIPDpacienteDetails($db,$param) {
  $result254=mysqli_query($db,"SELECT * FROM admdetails WHERE pid='".$param."'");
  $row254=mysqli_fetch_array($result254);
  $response=array(
      'pid'=>stripslashes($row254['pid']),
      'pntno'=>stripslashes($row254['pntno']),
      'patname'=>ucwords(strtoupper(stripslashes($row254['patname']))),
      'bedno'=>stripslashes($row254['bedno']),
      'tw1'=>stripslashes($row254['tw1']),
      'tb1'=>stripslashes($row254['tb1']),
      'td1'=>stripslashes($row254['td1']),
      'tw2'=>stripslashes($row254['tw2']),
      'tb2'=>stripslashes($row254['tb2']),
      'td2'=>stripslashes($row254['td2']),
      'physician'=>stripslashes($row254['physician']),
      'surgeon'=>stripslashes($row254['surgeon']),
      'anaesthetist'=>stripslashes($row254['anaesthetist']),
      'paeditrician'=>stripslashes($row254['paeditrician']),
      'previous'=>stripslashes($row254['previous']),
      'current'=>stripslashes($row254['current']),
      'height'=>stripslashes($row254['height']),
      'weight'=>stripslashes($row254['weight']),
      'bmi'=>stripslashes($row254['bmi']),
      'steroid'=>stripslashes($row254['steroid']),
      'steroidate'=>stripslashes($row254['steroidate'])
    ); 
  return $response;
 
}

#$paciente=pacienteRegistryDetails($db,$id);

?>