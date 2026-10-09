 <?php include(__DIR__ . '/includes/db_fns.php');
bh_authz_note('data_rep', isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ser']) ? $_GET['ser'] : ''));
//ini_set('display_errors', 0);
date_default_timezone_set('Africa/Nairobi');
if(isset($_SESSION['valid_user'])){
$old_in_user_name=$username=$_SESSION['valid_user'];
$result =mysqli_query($db, "select * from users where name='".$username."'");
$row=mysqli_fetch_array($result);
$old_in_user_type=$usertype=stripslashes($row['position']);
$old_in_user_id=$userid=stripslashes($row['userid']);
$old_in_full_name=$fullname=stripslashes($row['fullname']);
$old_in_user_dept=$userdep=stripslashes($row['dept']);
include(__DIR__ . '/includes/functions.php'); 
include(__DIR__ . '/includes/compile.php');
}
else{echo"<script>window.location.href = \"index.php\";</script>";exit;}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/functions.js"></script>
<script src="js/websters.js"></script>
<script src="js/func.js"></script>
<script src="js/ajax.js"></script>
<script>window.onload = setupRefresh</script> 


<?php 
if (isset($_GET['id'])) {$id = htmlsan($_GET['id']);}elseif (isset($_POST['id'])) {$id = htmlsan($_POST['id']);}else{$id=404;} 
switch($id){
              case '1.1':

              $image=$_GET['image'];
              $image=preg_replace('~/~', '', $image);
              $regn=htmlsan($_GET['regn']);
              $regnid=htmlsan($_GET['regnid']);
              $name=htmlsan(strtoupper($_GET['name']));
              $oname=htmlsan(strtoupper($_GET['oname']));
              $lname=htmlsan(strtoupper($_GET['lname']));
              $fourthname=htmlsan(strtoupper($_GET['fourthname']));

              $fullnames=$name.' '.$oname.' '.$lname.' '.$fourthname;
              $age=date('Y')-substr($_GET['dob'],-4,4);
              $stamp=date('Ymd');
              $date=date('Y/m/d');

              
              //get o/p no
              $result =mysqli_query($db, "select auto,opno from patients where opno!='' order by auto desc limit 0,1");
              $num_results = mysqli_num_rows($result);
              $row=mysqli_fetch_array($result);
              if(mysqli_num_rows($result)==0){
              $opno='1-'.date('Y');
                }else {
                  $d=substr(stripslashes($row['opno']),-4,4);
                    if($d!=date('Y')){
                    $opno='1-'.date('Y'); 
                    }
                    else{
                    $a=substr(stripslashes($row['opno']),-5,5);
                    $b=preg_replace('~'.$a.'~', '', stripslashes($row['opno']));
                    $c=$b + 1;
                    $opno=$c.'-'.date('Y');}
                }
                
        $query =mysqli_query($db, "select auto,pntno from patients where pntno='".$regn."' order by auto desc");
                  $count = mysqli_num_rows($query);
                  if($count>0){
                  echo"<script>
                  $().customAlert();
                  alert('Error!', '<p>There exists a similar patient Number in the database.</p>');
                  e.preventDefault();
                  newpatientreg();
                  </script>"; 
                  echo'<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;">
                <input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewpat();"/></div>';
                  exit;
              }

        $queryy =mysqli_query($db, "select auto,idno from patients where idno='".$regnid."' order by auto desc");
                  $countt = mysqli_num_rows($queryy);
                  if($countt>0){
                  echo"<script>
                  $().customAlert();
                  alert('Error!', '<p>There exists a similar IDNO Number in the database.</p>');
                  e.preventDefault();
                  newpatientreg();
                  </script>"; 
                  echo'<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;">
                <input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewpat();"/></div>';
                  exit;
        }

        $resulta = mysqli_query($db, "insert into patients values('0','".htmlsan($_GET['regn'])."','".htmlsan(strtoupper($_GET['name']))."','".htmlsan(strtoupper($_GET['oname']))."','".htmlsan(strtoupper($_GET['lname']))."','".htmlsan(strtoupper($_GET['fourthname']))."','".$fullnames."','".htmlsan($_GET['dob'])."','".htmlsan($_GET['age'])."','".htmlsan($_GET['gender'])."','".htmlsan($_GET['stream'])."','".htmlsan($_GET['phone2'])."','".htmlsan($_GET['house'])."','".htmlsan($_GET['course'])."','".htmlsan($_GET['gname'])."','".htmlsan($_GET['rship'])."','".htmlsan($_GET['gphone'])."','".htmlsan($_GET['geno'])."','".htmlsan($_GET['gaddress'])."','".htmlsan($_GET['tcr'])."','".htmlsan($_GET['tdr'])."','".htmlsan($_GET['insid'])."','".htmlsan($_GET['insname'])."','".htmlsan($_GET['cardno'])."','".htmlsan($_GET['company'])."','".htmlsan($_GET['bgroup'])."','".htmlsan($_GET['alergy'])."','images/patients/default.jpg','1','".$stamp."','".$opno."','','".htmlsan($_GET['typeclinics'])."','".htmlsan($_GET['regnid'])."','NewPatient','','','','','','','','','','','".htmlsan($_GET['acctype'])."','".htmlsan($_GET['patcategory'])."','".date('d/m/Y')."','".date('H:i')."','".$username."','')");
        $resultd = mysqli_query($db, "insert into recentpats values('0','".htmlsan($fullnames)."','".htmlsan($_GET['regn'])."')");        
       

              if($resulta){
                echo"<img src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
                <input type=\"hidden\" id=\"paramid\" value=\"".$regn."\"/>";
                echo"<script>var param=".$regn."</script>";
                echo"<script>
                    $().customAlert();
                    alert('Success!', '<p>Record created.<br/>IDNo:<b>".$regnid."</b><br/>Patient No:<b>".$regn."</b><br/>O/P No:<b>".$opno."</b></p>');
                    </script>"; 
                    ?>

                    <script>
                      var param = $('#paramid').val();
                      $.ajax({
                      url:'bridge.php',
                      data:{id:136,pid:param},
                      success:function(data){
                      $('#mainp').html(data);
                      }
                      });

                    </script>

                  <?php
                    exit;
                  }
                  else {
                    echo"<img src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
                    }
              
              break;

              case '1.2':
              $code=$_GET['code'];
              $status=$_GET['status'];
              #$type=$_GET['type'];
              $cbal=$_GET['bal'];


                $resultb = mysqli_query($db, "select * from creditcustomers where CustomerId='".$status."' order by CustomerId desc");
                $rowb=mysqli_fetch_array($resultb);
                $CustomerId=stripslashes($rowb['CustomerId']);
                $CustomerName=stripslashes($rowb['CustomerName']);
                $bal2=stripslashes($rowb['Bal']);
                $bal3=$bal2-$cbal;
              

               // if($status=2){
               //    echo"<script>
               //      $().customAlert();
               //      alert('Success!', '<p>Record Already Updated. Cant update twice</p>');
               //      </script>"; 
               //    }
                
            
                 $result = mysqli_query($db, "update creditcustomers set Bal='".$bal3."' where CustomerId='".$status."' "); 
                 $resulta = mysqli_query($db, "update ledgers set status=2 where ledgerid='".$code."' "); 
                
               if($result){
                  #echo'<p><img src="images/tick.png" style="width:16px; height:16px; margin-top:-10px; margin-left:20px"></p>';
                  echo"<script>
                    $().customAlert();
                    alert('Success!', '<p>Record Updated.<br/>Debtor:<b>".$CustomerName."</b><br/>DebtNo:<b>".$CustomerId."</b><br/>New Bal:<b>".$bal3."</b></p>');
                    </script>"; 
                  }
                  else{
                    echo'<p><img src="images/delete.png" style="width:16px; height:16px; margin-top:0px"></p>';
                  }
              break;
              case '1.3':

                  #echo'<p><img src="images/caution-spinner.gif" style="width:16px; height:16px; margin-top:-10px; margin-left:20px"></p>';
                  echo"<script>
                    $().customAlert();
                    alert('Nice Try!', '<p><b> Finish with debtors balances first :)</b></p>');
                    </script>"; 
                    #echo"<script>$('#save' + ".$code.").html('<img id='img-spinner' src='images/nice-try-caution-spinner.gif' style='position:absolute; top:45%; left:50%' alt='Loading/>');</script>"; 
              break;

              case 2:

              $old_patient_id=htmlsan($_GET['old_patient_id']);
              $send_to_dept_id=htmlsan($_GET['send_to_dept_id']);
              $type_clinic_id=htmlsan($_GET['type_clinic_id']);
              $oname=htmlsan($_GET['oname']);
              $regn=htmlsan($_GET['reg']);
              $rcpt=htmlsan($_GET['rcpt']);
              $type=htmlsan($_GET['type']);
              $inp=htmlsan($_GET['inp']);
              $date=date('Y/m/d');
              $stamp=date('Ymd');
              $cur=date('Y-m');
              $temp=htmlsan($_GET['temp']);
              $bp1=htmlsan($_GET['bp1']);
              $bp2=htmlsan($_GET['bp2']);
              $weight=htmlsan($_GET['weight']);
              $pulserate=htmlsan($_GET['pulserate']);
              $resprate=htmlsan($_GET['resprate']);
              $rbs=htmlsan($_GET['rbs']);    
              $newscreening=htmlsan($_GET['newscreening']);    
              $knownhyper=htmlsan($_GET['knownhyper']);    
              $takingmeds=htmlsan($_GET['takingmeds']);    
              $fullnames=htmlsan($_GET['oname']);        
              $ttime=date('H:i'); 
              #$insurancescheme=htmlsan($_GET['insurancescheme']);
              $acctype=htmlsan($_GET['acctype']);
              $insid=htmlsan($_GET['insid']);
              $insname=htmlsan($_GET['insname']);
              if ($insid == 14 || $insname == 'CASH') { $mode='Cash'; } else { $mode='Companies'; }
              #$patcategory=htmlsan($_GET['patcategory']);
              $patcategory='CUSTOM';
              $paid=0;
              $brk="</br>";                  
              
        $resultc =mysqli_query($db, "SELECT * FROM encounters WHERE Month='".$cur."'");
        $rowc=mysqli_fetch_array($resultc);
        $a=stripslashes($rowc[$type]);
        $a++;       
        
        $resultd =mysqli_query($db, "SELECT * FROM newprescription WHERE PatId='".$regn."' and TransDate='".date('Y/m/d')."'");
        $num_resultsd = mysqli_num_rows($resultd);
        if($num_resultsd>0){
                    echo"
                    <script>
                    $().customAlert();
                    alert('Failure!', '<p>A similar record for this patient has already been created today.</p>');
                    e.preventDefault();
                    </script>";
                    exit;
        }
        
          //get clinic id
        $qry_clinic =mysqli_query($db, "SELECT Abbr,Name FROM clinics WHERE id='".$type_clinic_id."'");
        $rwclinc=mysqli_fetch_array($qry_clinic);
        $typeclinics=stripslashes($rwclinc['Abbr']);

          //get sendto id
        $qry_sendto =mysqli_query($db, "SELECT name FROM sendto WHERE id='".$send_to_dept_id."'");
        $rwsendto=mysqli_fetch_array($qry_sendto);
        $sendto=stripslashes($rwsendto['name']);

        if($send_to_dept_id==1){
          $patcategory='NORMAL';
          $sendto='GENERAL CONSULTATIONS';
        }
                  

        //get pres
        $question =mysqli_query($db, "SELECT * FROM newprescription order by Id desc limit 0,1");
        $ans=mysqli_fetch_array($question);
        $in_presc_id=stripslashes($ans['Id'])+1;
        $pres='P-'.$in_presc_id;

        $resulta = mysqli_query($db, "insert into newprescription values('0','".$pres."','".$date."','".$type."','".$regn."','','','".$oname."','".$temp."','".$bp1."','".$bp2."','".$weight."','".$pulserate."','".$resprate."','".$rbs."','','','','','','','','','','','','','','','','','','','','','','','','','','','','".$mode."','1','".$stamp."','".date('H:i')."','".$ttime."','','','','','".$sendto."','','','".$inp."','".$patcategory."','','".$sendto."','".$newscreening."','".$knownhyper."','".$takingmeds."','".$acctype."',
        '".$old_patient_id."','".$send_to_dept_id."','".$type_clinic_id."','".$username."','".$insid."','".$insname."','".date('Y')."','".date('m_Y')."')");   

        $resulte= mysqli_query($db, "update patients set type='".$type."',accountype='".$acctype."',typeclinics='".$typeclinics."',insid='".$insid."',insurer='".$insname."',registryCategory='".$patcategory."',updatedBy='".strtoupper($fullname)."',stamp='".date('Ymd')."' where auto='".$old_patient_id."'");

        if($send_to_dept_id==6){
          //insert into radiology requests
          $question =mysqli_query($db, "SELECT id,radno FROM radrequests order by id desc limit 0,1");
          $rowc=mysqli_fetch_array($question);
          $radno=stripslashes($rowc['radno'])+1;
                #$last_id = mysqli_insert_id($db); 

          $resulty = mysqli_query($db, "insert into radrequests values('0','".$radno."','".$pres."','".$regn."','".htmlsan(strtoupper($fullnames))."','CUSTOM-RADIOLOGY','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'0','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','','RADIOLOGY','".$patcategory."')");  

        }
        if($send_to_dept_id==7){
            $resulta = mysqli_query($db, "insert into pharmrequests values('0','".$pres."','".htmlsan($_GET['reg'])."','".htmlsan(strtoupper($fullnames))."','CUSTOM-DISPENSING','','','".$sendto."','0','0','0','0','0','".date('Y/m/d')."-".date('H:i')."','38','".$username."','".$stamp."',0,'".date('H:i')."','','".$fullname."','','".$in_presc_id."','".$old_patient_id."','','0','','OPD','".$patcategory."')");      
        }

        if($send_to_dept_id==8){
          //insert into lab requests
          $question =mysqli_query($db, "SELECT Id,labno FROM labrequests order by Id desc limit 0,1");
          $ans=mysqli_fetch_array($question);
          $refno=stripslashes($ans['labno'])+1;

          $resulty = mysqli_query($db, "insert into labrequests values('0','".$refno."','".$pres."','".$regn."','".htmlsan(strtoupper($fullnames))."','LABORATORY_MAIN','CUSTOM-LAB','','".date('H:i')."','','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'0','".$paid."','','','','','','','','".$in_presc_id."','".$old_patient_id."','OPD','','".$patcategory."')");  

        }


        $resultb= mysqli_query($db, "update encounters set ".$type."='".$a."' where Month='".$cur."'");

        if($resulta){
        //send popups
        if($sendto=='GENERAL CONSULTATIONS'){
        $dep='TRIAGE';  //CUSTOMERCARE
        }else{$dep=$sendto;}
        $resultc =mysqli_query($db, "SELECT * FROM compips WHERE dept='".$dep."'");
        $num_resultsc = mysqli_num_rows($resultc);  
        for ($i=0; $i <$num_resultsc; $i++) {
        $rowc=mysqli_fetch_array($resultc);
        $ip=stripslashes($rowc['ip']);    
        
          $resultd =mysqli_query($db, "SELECT * FROM logintable WHERE computerip='".$ip."'");
          $num_resultsd = mysqli_num_rows($resultd);  
          for ($d=0; $d <$num_resultsd; $d++) {
          $rowd=mysqli_fetch_array($resultd);
          $user=stripslashes($rowd['username']);
          $resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient from Reception-".$fullnames."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
          }
              
        }
          
          
          
  $result = mysqli_query($db, "CALL GetUserLogs('".$username." starts a new Review consultation-NAME:".$fullnames."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");
          echo'<img src="images/up.jpg" style="width:40px; height:40px;">
                    <script>
                    setTimeout(function() {
                      reception();},500); 
                    </script>';
                    exit;
                    
                  }
                  else{
                    echo'<img src="images/down.jpg" style="width:40px; height:40px;">
                    
                    ';
                  }
            

              break;


              case 3:

              $image=$_GET['image'];
              $image=preg_replace('~/~', '', $image);
              $old_patient_id=htmlsan($_GET['old_patient_id']);
              $type_clinic_id=htmlsan($_GET['typeclinics']);
              $send_to_dept_id=htmlsan($_GET['send_to_dept_id']);
              $patcategory=htmlsan($_GET['patcategory']);
              $regn=htmlsan($_GET['regn']);
              $regnid=htmlsan($_GET['regnid']);
              $name=htmlsan(strtoupper($_GET['name']));
              $oname=htmlsan(strtoupper($_GET['oname']));
              $lname=htmlsan(strtoupper($_GET['lname']));
              $fourthname=htmlsan(strtoupper($_GET['fourthname']));

              $fullnames=$name.' '.$oname.' '.$lname.' '.$fourthname;
              $age=date('Y')-substr($_GET['dob'],-4,4);
              $stamp=date('Ymd');
              $inp=0;
              $date=date('Y/m/d');
              $stamp=date('Ymd');
              $ttime=date('H:i'); 
              $paid=0;
              $cur=date('Y-m');
              $brk="</br>";
              $insid=htmlsan($_GET['insid']);
              $insname=htmlsan($_GET['insname']);
              #if ($insid == 14 || $insname == 'CASH') { $mode='Cash'; } else { $mode='Companies'; }

             
              $typeclinics = getClinicById($db, $type_clinic_id);      
              
              //get o/p no
              $result =mysqli_query($db, "select auto,opno from patients where opno!='' order by auto desc limit 0,1");
              $num_results = mysqli_num_rows($result);
              $row=mysqli_fetch_array($result);
              if(mysqli_num_rows($result)==0){
              $opno='1-'.date('Y');
                }else {
                  $d=substr(stripslashes($row['opno']),-4,4);
                    if($d!=date('Y')){
                    $opno='1-'.date('Y'); 
                    }
                    else{
                    $a=substr(stripslashes($row['opno']),-5,5);
                    $b=preg_replace('~'.$a.'~', '', stripslashes($row['opno']));
                    $c=$b + 1;
                    $opno=$c.'-'.date('Y');}
                }
                
        $query =mysqli_query($db, "select auto,pntno from patients where pntno='".$regn."' order by auto desc");
                  $count = mysqli_num_rows($query);
                  if($count>0){
                  echo"<script>
                  $().customAlert();
                  alert('Error!', '<p>There exists a similar patient Number in the database.</p>');
                  e.preventDefault();
                  newpatientreg();
                  </script>"; 
                  echo'<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;">
                <input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewcustompat();"/></div>';
                  exit;
              }
              
        $queryy =mysqli_query($db, "select auto,idno from patients where idno='".$regnid."' order by auto desc");
                  $countt = mysqli_num_rows($queryy);
                  if($countt>0){
                  echo"<script>
                  $().customAlert();
                  alert('Error!', '<p>There exists a similar IDNO Number in the database.</p>');
                  e.preventDefault();
                  newpatientreg();
                  </script>"; 
                  echo'<div id="newstudent" style="width:50px; height:30px;float:right;margin-right:10px;">
                <input type="button" value="Save" id="submit"  style="padding:2px 5px; border-color:#fff; background:#0f6; float:left; cursor:pointer;width:50px" class="in_field" onclick="addnewcustompat();"/></div>';
                  exit;
        }

        $resulta = mysqli_query($db, "insert into patients values('0','".htmlsan($_GET['regn'])."','".htmlsan(strtoupper($_GET['name']))."','".htmlsan(strtoupper($_GET['oname']))."','".htmlsan(strtoupper($_GET['lname']))."','".htmlsan(strtoupper($_GET['fourthname']))."','".$fullnames."','".htmlsan($_GET['dob'])."','".htmlsan($_GET['age'])."','".$_GET['gender']."','".htmlsan($_GET['stream'])."','".htmlsan($_GET['phone2'])."','".htmlsan($_GET['house'])."','".htmlsan($_GET['course'])."','".htmlsan($_GET['gname'])."','".htmlsan($_GET['rship'])."','".htmlsan($_GET['gphone'])."','".htmlsan($_GET['geno'])."','".htmlsan($_GET['gaddress'])."','".htmlsan($_GET['tcr'])."','".htmlsan($_GET['tdr'])."','14','CASH','".htmlsan($_GET['cardno'])."','".htmlsan($_GET['company'])."','".htmlsan($_GET['bgroup'])."','".htmlsan($_GET['alergy'])."','images/patients/default.jpg','1','".$stamp."','".$opno."','','".$typeclinics."','".htmlsan($_GET['regnid'])."','NewPatient','".htmlsan($_GET['temp'])."','".htmlsan($_GET['bp1'])."','".htmlsan($_GET['bp2'])."','".htmlsan($_GET['weight'])."','".htmlsan($_GET['resprate'])."','".htmlsan($_GET['pulserate'])."','".htmlsan($_GET['rbs'])."','".htmlsan($_GET['newscreening'])."','".htmlsan($_GET['knownhyper'])."','".htmlsan($_GET['takingmeds'])."','".htmlsan($_GET['acctype'])."','".htmlsan($_GET['patcategory'])."','".date('d/m/Y')."','".date('H:i')."','".$username."','')");

        $clientid = mysqli_insert_id($db);
        $in_regn_no = getClientNo($db, $clientid);          
        $sendto = getSendToName($db, $send_to_dept_id);          
        $in_presc_id = getGeneratePrescId($db);
        $pres='O-'.$in_presc_id;
        $resultd = mysqli_query($db, "insert into recentpats values('0','".$fullnames."','".$in_regn_no."')");     

        $resulta = mysqli_query($db, "insert into newprescription values('0','".$pres."','".$date."','NewPatient','".htmlsan($in_regn_no)."','','','".strtoupper($fullnames)."','".htmlsan($_GET['temp'])."','".htmlsan($_GET['bp1'])."','".htmlsan($_GET['bp2'])."','".htmlsan($_GET['weight'])."','".htmlsan($_GET['pulserate'])."','".htmlsan($_GET['resprate'])."','".htmlsan($_GET['rbs'])."','', '','','','','','','','','','','','','','','','','','','','','','','','','','','Cash','2','".$stamp."','".date('H:i')."','".$ttime."','','','','','".$sendto."','','','".$send_to_dept_id."','".htmlsan($_GET['patcategory'])."','','".$sendto."','".htmlsan($_GET['newscreening'])."','".htmlsan($_GET['knownhyper'])."','".htmlsan($_GET['takingmeds'])."','".htmlsan($_GET['acctype'])."','".$old_patient_id."','".$send_to_dept_id."','".$type_clinic_id."','".$username."','14','CASH','".date('Y')."','".date('m_Y')."')");  
 

        if($send_to_dept_id==7){
            $resulta = mysqli_query($db, "insert into pharmrequests values('0','".$pres."','".htmlsan($in_regn_no)."','".strtoupper($fullnames)."','CUSTOM-DISPENSING','','','".$sendto."','0','0','0','0','0','".date('d/m/Y')."-".date('H:i')."','38','".$username."','".$stamp."',0,'".date('H:i')."','','".strtoupper($fullname)."','','".$in_presc_id."','".$old_patient_id."','','0','','OPD','".htmlsan($_GET['patcategory'])."')");      
        }


        if($send_to_dept_id==6){
          $radno = getRadNo($db);
          $resulty = mysqli_query($db, "insert into radrequests values('0','".$radno."','".$pres."','".htmlsan($in_regn_no)."','".strtoupper($fullnames)."','CUSTOM-RADIOLOGY','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".strtoupper($fullname)."','',0,'0','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','','RADIOLOGY','".htmlsan($_GET['patcategory'])."')");  
        }
      
        if($send_to_dept_id==8){
          $labno = getLabNo($db);
          $resulty = mysqli_query($db, "insert into labrequests values('0','".$labno."','".$pres."','".htmlsan($in_regn_no)."','".strtoupper($fullnames)."','LABORATORY_MAIN','CUSTOM-LAB','','".date('H:i')."','','','".date('d/m/Y')."','".date('Ymd')."','".strtoupper($fullname)."','',1,'0','".$paid."','','','','','','','','".$in_presc_id."','".$old_patient_id."','OPD','','".htmlsan($_GET['patcategory'])."')");  

        }

        if($send_to_dept_id==24){
          $resulty = mysqli_query($db, "insert into theatrequests values('0','".$pres."','".$regn."','".strtoupper($fullnames)."','CUSTOM-THEATRE','NOTES','".date('H:i')."','servtime','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','','0','0','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','','".htmlsan($_GET['patcategory'])."')");  
        }


        $resultb= mysqli_query($db, "update encounters set ".$type."='".$a."' where Month='".$cur."'");



              if($resulta){
                echo"<img src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>
                <input type=\"hidden\" id=\"paramid\" value=\"".$regn."\"/>
                <input type=\"hidden\" id=\"old_patient_id\" value=\"".$old_patient_id."\"/>";
                echo"<script>var param=".$regn."</script>";
                echo"<script>var old_patient_id=".$old_patient_id."</script>";
                echo"<script>
                    $().customAlert();
                    alert('Success!', '<p>Record created.<br/>IDNo:<b>".$regnid."</b><br/>Patient No:<b>".$regn."</b><br/>O/P No:<b>".$opno."</b></p>');
                    setTimeout(function() {
                    newcustompatient();},500);
                    </script>"; 
                    exit;
                    ?>
                    <script>
                      // $("#mainp").html(loader);
                       $.ajax({
                       url:'bridgerep.php',
                       data:{id:1},
                       success:function(data){
                       $('#mainp').html(data);
                       }
                       });
                    </script>

                  <?php
                    exit;
                  }
                  else {
                    echo"<img src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
                    }

              break;

              case 4:

              break;
            
            case "5_original":
            $transno=$_GET['code'];
            $itcode=$_GET['itcode'];
            $saleid=$_GET['slcode'];
            $soldqty=$_GET['qty'];
            $rcptno=$_GET['rcptno'];
            $d1=$_GET['d1'];
            $d2=$_GET['d2'];
            
            // //get balance of income revenue ledger
            $resultz = mysqli_query($db, "select * from pharmrequests where id='".$transno."'");
            $rowz=mysqli_fetch_array($resultz);
            $code=stripslashes($rowz['id']);
            $itcode=stripslashes($rowz['itcode']);
            $itname=stripslashes($rowz['itname']);
            $rcptno=stripslashes($rowz['rcptno']);
            $salesid=stripslashes($rowz['old_in_sale_id']);
            $prescid=stripslashes($rowz['old_in_presc_id']);
            $prescno=stripslashes($rowz['prescid']);
            $clientid=stripslashes($rowz['old_in_patient_id']);
            $clientno=stripslashes($rowz['patid']);
            $clientname=stripslashes($rowz['patname']);
            $itquat=stripslashes($rowz['quat']);
            $categ=stripslashes($rowz['category']);
            $subn=stripslashes($rowz['subnet']);
            $deptfrom=stripslashes($rowz['deptfrom']);
            $stamp=date('Ymd');
            $codeid=12;
            $ddate=date('Y/m/d');

            #echo $pid;
            if($deptfrom=='OPD'){
              $resultq = mysqli_query($db, "update sales set Dispensed=1,dispensedBy='".htmlsan(strtoupper($fullname))."' where TransNo='".$saleid."'");
              $resultq = mysqli_query($db, "update pharmrequests set status=2,servtime='".date('H:i')."',dispensedby='".htmlsan(strtoupper($fullname))."' where id='".$transno."'");
              $resultb= mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE Id='".$prescid."'");             
            }

            if($deptfrom=='IPD'){
              $resultq = mysqli_query($db, "update sales set Dispensed=1,dispensedBy='".$fullname."' where TransNo='".$saleid."'");
              $resultq = mysqli_query($db, "update pharmrequests set status=2,paid=1,servtime='".date('H:i')."',dispensedby='".$fullname."' where id='".$transno."'");
              $resultq = mysqli_query($db, "update tempbill set status=2 where id='".$salesid."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$clientid."' AND patid='".$clientno."' AND itcode='".$itcode."' AND billno='".$rcptno."'");
              $resultb= mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE Id='".$prescid."'");
              
              
              //update reduction of items
              $query =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
                $rowq=mysqli_fetch_array($query);
                $bal=stripslashes($rowq[$categ]);
                $type=stripslashes($rowq['Type']);
                $pack=stripslashes($rowq['Pack']);
                $diff=$bal-$itquat;
                
              //insert into stock track
                $resultd = mysqli_query($db, "insert into stocktrack values('0','".date('Y/m/d')."','".$categ."','".$itcode."','".$itname."','".$pack."','INPATIENT SALES-".$clientname."','".$itquat."','".$diff."','".$username."','".$stamp."')");      
                            
                            $resultx= mysqli_query($db, "update items set ".$categ."='".$diff."' where ItemCode='".$itcode."' and Type='GOOD'");
                            
                            //update ledgers
                          
                if($type=='GOOD'){
                    $resultb = mysqli_query($db, "select * from ledgers where ledgerid='630'");
                    $rowb=mysqli_fetch_array($resultb);
                    $invbal=stripslashes($rowb['bal']);
                    $invbal=$invbal-$subn;
                    
                    $resultc = mysqli_query($db, "select * from ledgers where ledgerid='644'");
                    $rowc=mysqli_fetch_array($resultc);
                    $supbal=stripslashes($rowc['bal']);
                    $supbal=$supbal+$subn;
                      
                  $resultl = mysqli_query($db, "insert into ledgerentries values('0','630','Inventory','644','Cost of Goods Sold','".$subn."','Inpatient Drugs','".date('Y/m/d')."','".$invbal."','".$supbal."','".$stamp."','','',0,'".date('d/m/Y')."-".date('H:i')."','".$username."','IPD Goods Sold')");
                  $resultm = mysqli_query($db, "update ledgers set bal='".$invbal."' where ledgerid='630'");
                  $resultn = mysqli_query($db, "update ledgers set bal='".$supbal."' where ledgerid='644'");  
                }

            }

            if($resultq){
              $resulta = mysqli_query($db, "insert into log values('0','".$username." dispenses drugs. ReceiptNo:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
              echo"<script>setTimeout(function() {
                $.ajax({
                  url:'bridgerep.php',
                  data:{id:'".$codeid."',prescid:'".$prescid."',prescno:'".$prescno."',clientid:'".$clientid."',code:'".$code."',d1:'".$d1."',d2:'".$d2."'},
                  success:function(data){
                  $('#mainp').html(data);
                  }
                });
                },500);</script>";
              echo'<img src="images/tick.png" style="width:30px; height:30px;">';

              }
              else{
                echo'<img src="images/delete.png" style="width:30px; height:30px;">';
              }
            
            break;
  
            
            case 5:
            $transno=$_GET['code'];
            $itcode=$_GET['itcode'];
            $saleid=$_GET['slcode'];
            $soldqty=$_GET['qty'];
            $rcptno=$_GET['rcptno'];
            $d1=$_GET['d1'];
            $d2=$_GET['d2'];
            
            $resultz = mysqli_query($db, "select * from pharmrequests where id='".$transno."'");
            $rowz=mysqli_fetch_array($resultz);
            $code=stripslashes($rowz['id']);
            $itcode=stripslashes($rowz['itcode']);
            $itname=stripslashes($rowz['itname']);
            $rcptno=stripslashes($rowz['rcptno']);
            $salesid=stripslashes($rowz['old_in_sale_id']);
            $prescid=stripslashes($rowz['old_in_presc_id']);
            $prescno=stripslashes($rowz['prescid']);
            $clientid=stripslashes($rowz['old_in_patient_id']);
            $clientno=stripslashes($rowz['patid']);
            $clientname=stripslashes($rowz['patname']);
            $itquat=stripslashes($rowz['quat']);
            $categ=stripslashes($rowz['category']);
            $subn=stripslashes($rowz['subnet']);
            $dept4rm=stripslashes($rowz['deptfrom']);
            $stamp=date('Ymd');
            $codeid=12;
            $ddate=date('Y/m/d');
            $date = date('Y-m-d H:i:s');

            $outpatno = getOutPatientClientNo($db, $clientid);
            $inpatno = getInPatientClientNo($db, $clientid);

          #echo $pid;
          if($dept4rm=='OPD'){
              $result254 = mysqli_query($db, "UPDATE sales SET Dispensed=1,dispensedBy='".htmlsan(strtoupper($fullname))."' WHERE TransNo='".$saleid."'");
              $result254 = mysqli_query($db, "UPDATE pharmrequests SET status=2,servtime='".date('H:i')."',dispensedby='".htmlsan(strtoupper($fullname))."' WHERE id='".$transno."'");
              $result254 = mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE Id='".$prescid."'");             
          }

          if($dept4rm=='IPD'){
            $resultq = mysqli_query($db, "UPDATE sales SET Dispensed=1,dispensedBy='".$fullname."' WHERE TransNo='".$saleid."'");
            $resultq = mysqli_query($db, "UPDATE pharmrequests SET status=2,paid=1,servtime='".date('H:i')."',dispensedby='".$fullname."' WHERE id='".$transno."'");
            $resultq = mysqli_query($db, "UPDATE tempbill SET status=2 WHERE id='".$salesid."' AND old_in_presc_id='".$prescid."' AND old_in_patient_id='".$clientid."' AND patid='".$clientno."' AND itcode='".$itcode."' AND billno='".$rcptno."'");
            $resultb= mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE Id='".$prescid."'");
            
            
                //update reduction of items
                $query = mysqli_query($db, "SELECT * FROM items WHERE ItemCode='".$itcode."'");
                $rowq = mysqli_fetch_array($query);
                $type = stripslashes($rowq['Type']);

                if($type=='GOOD'){
                    $bal = stripslashes($rowq[$categ]);
                    $pack = stripslashes($rowq['Pack']);
                    $qsold = stripslashes($rowq['Qsold']);
                    $diff = $bal - $itquat;
                    $soldqty = $qsold + $qty;

                    //insert into stock track
                    $resultd = mysqli_query($db, "INSERT INTO stocktrack VALUES('0','".date('Y/m/d')."','".$categ."','".$itcode."','".$itname."','".$pack."','INPATIENT SALES-".$clientname."','".$itquat."','".$diff."','".$username."','".$stamp."')");      

                    $resultx = mysqli_query($db, "UPDATE items SET " . $categ . "='" . $diff . "', Qsold='" . $soldqty . "', TransDate='" . date('d/m/Y') . "', TranStamp='" . date('Ymd') . "', TimeStamp='" . date('YmdHi') . "', Activity='IPDSALES-FROM-" . $categ . "', MoreDetail='IPDSALES-FROM-" . $categ . "-TO-" . $clientname . "', Quantity='" . $itquat . "', TransactedBy='" . $fullname . "' WHERE ItemCode='" . $itcode . "' AND Type='GOOD'");

                    $rcpt_uid = 0;
                    $rcvpayref76 = 0;
                    $hasInsurance = 0;
                    $cid = 0;
                    $cname = 0;
                    $rcv_copayment = 0;
                    $mode = 0;
                    $isop = 0;
                    $isip = 1;

                    //update ledgers        
                    $resultb = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE ledgerid='630'");
                    $rowb = mysqli_fetch_assoc($resultb);
                    $opening_inventorybal = floatval($rowb['bal']);
                    $closing_inventorybal = floatval($opening_inventorybal) - floatval($subn);

                    $resultc = mysqli_query($db, "SELECT `bal` FROM ledgers WHERE ledgerid='644'");
                    $rowc = mysqli_fetch_assoc($resultc);
                    $opening_cogbal = floatval($rowc['bal']);
                    $closing_cogbal = floatval($opening_cogbal) + floatval($subn);

                    $resultl = mysqli_query($db, "INSERT INTO ledgerentries VALUES('','630','Inventory','644','Cost of Goods Sold','" . $subn . "','Inpatient Drugs','" . $date . "','" . $closing_inventorybal . "','" . $closing_cogbal . "','" . $stamp . "','','',0,'" . date('Y-m-d H:i:s') . "','" . $opening_inventorybal . "','" . $opening_cogbal . "','patient','" . $clientno . "','" . $clientname . "',null,'inpatient_drugs_charge_sheet','" . $rcpt_uid . "',null,'" . $rcvpayref76 . "','" . $hasInsurance . "','" . $cid . "','" . $cname . "','','','" . $rcv_copayment . "','','" . $itcode . "','" . $categ . "','" . $mode . "','" . $username . "','" . $isop . "','" . $isip . "','','" . $inpatno . "','','uno','dos','tres','cuatro','cinco','seis')");
                    $resultm = mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_inventorybal . "' WHERE ledgerid=630 ");
                    $resultn = mysqli_query($db, "UPDATE ledgers SET bal='" . $closing_cogbal . "' WHERE ledgerid=644 "); 
                }

            }

      if($result254){
        @mysqli_query($db, "insert into log values('0','".$username." dispenses drugs. ReceiptNo:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
        echo"<script>setTimeout(function() {
          $.ajax({
            url:'bridgerep.php',
            data:{id:'".$codeid."',prescid:'".$prescid."',prescno:'".$prescno."',clientid:'".$clientid."',code:'".$code."',d1:'".$d1."',d2:'".$d2."'},
            success:function(data){
            $('#mainp').html(data);
            }
          });
          },500);</script>";
        echo'<img src="images/tick.png" style="width:30px; height:30px;">';

        }
        else{
          echo'<img src="images/delete.png" style="width:30px; height:30px;">';
        }
            
            break;
            case 6:
            $transno=$_GET['code'];
            $itcode=$_GET['itcode'];
            $saleid=$_GET['slcode'];
            $soldqty=$_GET['qty'];
            $rcptno=$_GET['rcptno'];

            if($resulta){
            $resulta = mysqli_query($db, "insert into log values('0','".$username." makes order item confirmation[order item ready state].Order No:".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
            echo'<img src="images/tick.png" style="width:30px; height:30px;">';

                  exit;
                    ?>
                    <script>
                      var param = $('#rcptno').val();
                      $.ajax({
                      url:'budget.php',
                      data:{id:2,pid:param},
                      success:function(data){
                      $('#mainp').html(data);
                      }
                      });
                    </script>
                  <?php
                    exit;
                }
                else{
                  echo'<img src="images/delete.png" style="width:30px; height:30px;">';
                }
        break;      
        
    case 7:
      $itcode=$_GET['code'];
      $ptransid=$_GET['ptransid'];
      $bid=6;
      $bname="ADMINISTRATION";
      $qty=$_GET['expdqty'];
      $date=date('Y/m/d');
      $stamp=date('Ymd');
      $result =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
      $row=mysqli_fetch_array($result);
      if($bname=='PROCUREMENT'){$branch='Bal';}else{$branch=$bname;}
      $bal=stripslashes($row[$branch]);
      #$bal=stripslashes($row['ADMINISTRATION']);
      #$bal2=stripslashes($row['PHARMACY']);
      $itname=stripslashes($row['ItemName']);
      $sprice=stripslashes($row['PurchPrice']);
      $pack=stripslashes($row['Pack']);
      $qpurch=stripslashes($row['Qpurch']);
      $nbal=$bal-$qty;
      $total=$sprice*$qty;

      $nwqpurch=$qpurch-$qty;
      
$resrwx =mysqli_query($db, "select * from purchases where TransNo='".$ptransid."' ORDER BY TransNo DESC");
$rwx=mysqli_fetch_array($resrwx);
$resrwxb = mysqli_query($db, "insert into expired_purchases values('0','".$ptransid."','".stripslashes($rwx['PurchNo'])."','".stripslashes($rwx['PurchDate'])."','".stripslashes($rwx['ItemCode'])."', '".stripslashes($rwx['ItemName'])."','".stripslashes($rwx['UnitBox'])."','".stripslashes($rwx['PartBox'])."','".stripslashes($rwx['Quantity'])."','".stripslashes($rwx['PurchPrice'])."','".stripslashes($rwx['SalePrice'])."','".stripslashes($rwx['TotalPrice'])."','".stripslashes($rwx['SupplierId'])."','".stripslashes($rwx['Supplier'])."','".stripslashes($rwx['BatchNo'])."','".stripslashes($rwx['Expiry'])."','".stripslashes($rwx['InvoiceNo'])."','".stripslashes($rwx['InvoiceAmt'])."','".stripslashes($rwx['Stamp'])."','".stripslashes($rwx['expstamp'])."','".stripslashes($rwx['Bal'])."','".stripslashes($rwx['StockDate'])."','".stripslashes($rwx['Username'])."')");
                            

      //insert into stock track
// $resultd = mysqli_query($db, "insert into stocktrack values('0','".$date."','".$bname."','".$itcode."','".$itname."','".$pack."','EXPIRED STOCK DELETION REGISTER','".$qty."','".$nbal."','".$username."','".$stamp."')");  

//       $resultb = mysqli_query($db, "update items set ".$branch."='".$nbal."', Qpurch='".$nwqpurch."', Diff=0 where ItemCode='".$itcode."'");
//       $resulta = mysqli_query($db, "insert into stockuse values('0','".$bid."','".$bname."','".$itcode."','".$itname."','".$qty."','EXPIRED STOCK DELETION REGISTER','".date('d/m/Y')."','".date('Ymd')."','".$username."',1)");  
//       $resultc = mysqli_query($db, "DELETE FROM purchases where TransNo='".$ptransid."'");

if($resulta&&$resultb){
        
        //update ledgers-stock
// $amount=$total;
// $resultb = mysqli_query($db, "select * from ledgers where ledgerid='630'");
//   $rowb=mysqli_fetch_array($resultb);
//   $invbal=stripslashes($rowb['bal']);
//   $invbal=$invbal-$amount;
  
//   $resultc = mysqli_query($db, "select * from ledgers where ledgerid='701'");
//   $rowc=mysqli_fetch_array($resultc);
//   $supbal=stripslashes($rowc['bal']);
//   $supbal=$supbal+$amount;
  
// $resultl = mysqli_query($db, "insert into ledgerentries values('0','630','Inventory','701','STOCK EXPIRY DELETION EXPENSES','".$amount."','Stock Expiry','".$date."','".$invbal."','".$supbal."','".$stamp."','','',0,'".date('d/m/Y')."-".date('H:i')."','".$username."','SE')");
// $resultm = mysqli_query($db, "update ledgers set bal='".$invbal."' where ledgerid='630'");
// $resultn = mysqli_query($db, "update ledgers set bal='".$supbal."' where ledgerid='701'");
$resulta = mysqli_query($db, "insert into log values('0','".$username." makes an entry in the stock expiry database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')"); 
         echo"<img src=\"images/tick.png\" style=\"margin-top:30px\"  width=\"30\" height=\"30\"/>";
         echo"<script>
            setTimeout(function() {
            abouttoexpiry2();},500);
            $().customAlert();
            alert('Success!', '<p>Entry Posted.</p>');
            e.preventDefault();
          </script>";
            
          }
          else{
            echo"
            <script>
            $().customAlert();
            alert('Sorry!', '<p>Please Try again.</p>');
            e.preventDefault();
            </script>";
          }
          break;          

          case 8:
          $sumno=$_GET['sumno'];
          $prescid=$_GET['prescid'];

          $pid=$_GET['prescid'];
          #$presc=$_POST['presc'];
          $resulta =mysqli_query($db, "select * from inpatients where PrescId='".$pid."'");
          $rowa=mysqli_fetch_array($resulta);
          $old_presc_id=stripslashes($rowa['Id']);
          $old_patient_id=stripslashes($rowa['old_in_patient_id']);
          $patid=stripslashes($rowa['PatId']);
          $patname=stripslashes($rowa['PatName']);
          $stamp=date('Ymd');
          $dat=date('Y/m/d');
          $paid=0; #not paid but IPD
          $arr=array();

          if(isset($_SESSION['dis'])){
            $diseases=implode(";",$_SESSION['dis']);
          }else $diseases=NULL;

          $s=strlen($diseases);
          $diseases=substr($diseases,0,$s);
          
          $resultb= mysqli_query($db, "update inpatients set DiagName='".$diseases."' where PrescId='".$_GET['prescid']."'");

          
          if($_GET['recp']==1){
            $arr[]='PHARMACY';

            $a='pharmcart';               
            
            $max=count($_SESSION[$a]);
            for ($i = 0; $i < $max; $i++){
              $itcode = $_SESSION[$a][$i][0];
              $itname = $_SESSION[$a][$i][1];
              $itquat = $_SESSION[$a][$i][2];
              $itprice = $_SESSION[$a][$i][3];
              $tprice = $_SESSION[$a][$i][4];
              $oname = $_SESSION[$a][$i][5];
              $regn = $_SESSION[$a][$i][6];
              $categ = $_SESSION[$a][$i][7];
              $total = $_SESSION[$a][$i][8];
              $disc = $_SESSION[$a][$i][9];
              $subn = $_SESSION[$a][$i][10];
              $iid = $_SESSION[$a][$i][12];

              $prescname= $_SESSION[$a][$i][13];
              $categ_id = $_SESSION[$a][$i][14];
              $dispstatus = $_SESSION[$a][$i][15]; #if 2 - dispensed
              $paidstatus = $_SESSION[$a][$i][16]; #if 1 - paid
              $payrcptno = $_SESSION[$a][$i][17];
              // $salesid = $_SESSION[$a][$i][18]; 
              // $pharmid = $_SESSION[$a][$i][19]; 
              $disp=0;
              $arr[]=$categ;
              $dept=$categ;
                #if($payrcptno!=''){$rcptno=$payrcptno;}else{$rcptno=$rcptno;}

                $result =mysqli_query($db, "select * from pharmrequests where prescid='".$pid."' and itcode='".$itcode."' and stamp='".date('Ymd')."'");
                $num_results = mysqli_num_rows($result);
                if($num_results>=1){
                  echo"<script>
                      $().customAlert();
                      alert('Error!', '<p>Similar item already exists.</p>');
                      e.preventDefault();
                      </script>";
                  exit;
                }else{
                  
                  $resulta = mysqli_query($db, "insert into tempbill values('0','".$regn."','".$patname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$fullname."','".$stamp."',1,'".$old_presc_id."','".$old_patient_id."')");      

                  $last_id = mysqli_insert_id($db);
                  #$res = mysqli_query($db, "insert into pharmsales values('0','".$last_id."')");
                  $resulta = mysqli_query($db, "insert into pharmrequests values('0','".$pid."','".$patid."','".$patname."','".$prescname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$username."','".$stamp."',0,'".date('H:i')."','st','".$fullname."','','".$old_presc_id."','".$old_patient_id."','','".$paid."','".$last_id."','IPD')");    

                }


            
            }

          }

          if($sumno>0){
          $rcptno=$sumno;
          $result = mysqli_query($db, "DELETE from discharge where sumno='".$sumno."'");  
          }else{
          //get receipt no
          $question =mysqli_query($db, "SELECT * FROM discharge order by id desc limit 0,1");
          $ans=mysqli_fetch_array($question);
          $rcptno=stripslashes($ans['sumno'])+1;
          }
          $result = mysqli_query($db, "insert into discharge values('0','".$rcptno."','".$_GET['patid']."','".$_GET['patname']."','".$_GET['admdate']."','".$_GET['disdate']."','".$_GET['age']."','".$_GET['sex']."','".$_GET['disdiag']."','".mysqli_real_escape_string($db, trim($_GET['prescription']))."','".mysqli_real_escape_string($db, trim($_GET['clinsumm']))."','".$_GET['doctor']."','".$_GET['nextapp']."','".date('d/m/Y')."','".date('Ymd')."',1,'".$fullname."')");

          if($result){
            echo"<script>
            window.open('report.php?id=58&rcptno=".$rcptno."');
            $().customAlert();
                alert('Success!', '<p>Summary processed.</p>');
                </script>";
            exit;
          }
          else{
            echo"
            <script>
            $().customAlert();
            alert('Sorry!', '<p>Please repeat again.</p>');
            e.preventDefault();
            </script>";
          }
          break;
          
          case 9:
              $pid = trim(mysqli_real_escape_string($db, $_POST['pid']));
              $patid = trim(mysqli_real_escape_string($db, $_POST['patid']));
              $sumno = trim(mysqli_real_escape_string($db, $_POST['sumno']));
              $old_presc_id = trim(mysqli_real_escape_string($db, $_POST['prescid']));
              $old_patient_id = trim(mysqli_real_escape_string($db, $_POST['clientid']));
              #$name = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_POST['name']))));
              // $pid=$_POST['pid'];
              // $sumno=$_POST['sumno'];
              // $old_presc_id=$_POST['prescid'];
              // $old_patient_id=$_POST['clientid'];
              $stamp=date('Ymd');
              $dat=date('Y/m/d');
              $paid=0;
          
          $presc=mysqli_real_escape_string($db, trim($_POST['prescription'])).'</b>';
          $patclinsumm=mysqli_real_escape_string($db, trim($_POST['clinsumm']));
          // #$clinsumm=strip_tags($patclinsumm);
              #$presc = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_POST['prescription']))));
              #$patclinsumm = trim(mysqli_real_escape_string($db, makesafe(strtoupper($_POST['clinsumm']))));

          $arr=array();

          if(isset($_SESSION['dis'])){
            $diseases=implode(";",$_SESSION['dis']);
          }else $diseases=NULL;

          $s=strlen($diseases);
          $diseases=substr($diseases,0,$s);

          if($sumno>0){
          $rcptno=$sumno;
          $result = mysqli_query($db, "DELETE from discharge where sumno='".$sumno."'");  
          }else{
          //get receipt no
          $question =mysqli_query($db, "SELECT * FROM discharge order by id desc limit 0,1");
          $ans=mysqli_fetch_array($question);
          $rcptno=stripslashes($ans['sumno'])+1;
          }

          $query_1 = mysqli_query($db, "insert into discharge values('0','".$rcptno."','".trim(mysqli_real_escape_string($db, $_POST['patid']))."','".trim(mysqli_real_escape_string($db, makesafe(strtoupper($_POST['patname']))))."','".$_POST['admdate']."','".date('d/m/Y')."','".$_POST['age']."','".$_POST['sex']."','".$_POST['disdiag']."','".$presc."','".$patclinsumm."','".$_POST['doctor']."','".$_POST['nextapp']."','".date('d/m/Y')."','".date('Ymd')."',1,'".$fullname."','".trim(mysqli_real_escape_string($db, $_POST['prescid']))."','".trim(mysqli_real_escape_string($db, $_POST['clientid']))."')");
          
           $discharge_last_id = mysqli_insert_id($db);
          
           $query_2 = mysqli_query($db, "update inpatients set DiagName='".$diseases."' where Id='".$_POST['prescid']."'");

          //get invoice no
          $billno=getBillNo($db);
                                
          if($_POST['recp']==1){
            $arr[]='PHARMACY';

            $a='pharmcart';               
            #$max=count($_SESSION['pharmcart']);
            $max=count($_SESSION[$a]);
            for ($i = 0; $i < $max; $i++){
              $itcode = $_SESSION[$a][$i][0];
              $itname = $_SESSION[$a][$i][1];
              $itquat = $_SESSION[$a][$i][2];
              $itprice = $_SESSION[$a][$i][3];
              $tprice = $_SESSION[$a][$i][4];
              $oname = $_SESSION[$a][$i][5];
              $regn = $_SESSION[$a][$i][6];
              $categ = $_SESSION[$a][$i][7];
              $total = $_SESSION[$a][$i][8];
              $disc = $_SESSION[$a][$i][9];
              $subn = $_SESSION[$a][$i][10];
              $iid = $_SESSION[$a][$i][12];

              $prescname= $_SESSION[$a][$i][13];
              $categ_id = $_SESSION[$a][$i][14];
              $dispstatus = $_SESSION[$a][$i][15]; 
              $paidstatus = $_SESSION[$a][$i][16]; 
              $payrcptno = $_SESSION[$a][$i][17];
              // $salesid = $_SESSION[$a][$i][18]; 
              // $pharmid = $_SESSION[$a][$i][19]; 
              $disp=0;
              $arr[]=$categ;
              $dept=$categ;
                #if($payrcptno!=''){$rcptno=$payrcptno;}else{$rcptno=$rcptno;} 

                // $result =mysqli_query($db, "select * from pharmrequests where itcode='".$itcode."' and prescid='".$pid."' and old_in_presc_id='".$old_presc_id."' and old_in_patient_id='".$old_patient_id."' and deptfrom='IPD' and stamp='".date('Ymd')."'");
                // $num_results = mysqli_num_rows($result);
                // if($num_results>=1){
                //   echo"<script>
                //       $().customAlert();
                //       alert('Error!', '<p>Similar item already exists.</p>');
                //       e.preventDefault();
                //       </script>";
                //   exit;
                // }else{

                $query_3 = mysqli_query($db, "insert into tempbill values('0','".$regn."','".$oname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$fullname."','".$stamp."',1,'".$old_presc_id."','".$old_patient_id."','".$billno."','".$categ_id."','','0','','0','".$rcptno."','created')");      

                $last_id = mysqli_insert_id($db);
                $query_4 = mysqli_query($db, "insert into pharmrequests values('0','".$pid."','".$regn."','".$oname."','".$prescname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$username."','".$stamp."',1,'".date('H:i')."','','".$fullname."','','".$old_presc_id."','".$old_patient_id."','".$billno."','".$paid."','".$last_id."','IPD','NORMAL')");    

                $query_5 = mysqli_query($db, "update inpatients set Doctor='".$old_in_full_name."',Discharge='".date('d/m/Y')."-".date('H:i')."' where Id='".$old_presc_id."'");
                //}

            
            }

          }


          if($query_1&&$query_2||($query_3&&$query_4&&$query_5)){
              unset($_SESSION['pharmcart']);    
      $resulta = mysqli_query($db, "insert into log values('0','".$username." generates discharge summary and bills new drugs for inpatient-NAME:".$oname."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
            echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';   
            echo"<script>
            window.open('report.php?id=58&rcptno=".$discharge_last_id."');
            $().customAlert();
                alert('Success!', '<p>Summary processed.</p>');
                </script>";
            exit;
          }
          else{
            echo"
            <script>
            $().customAlert();
            alert('Sorry!', '<p>Please repeat again.</p>');
            e.preventDefault();
            </script>";
          }
          break;
              
              
              
          case 10:
          $stamp=date('Ymd');
          $date=date('Y/m/d');
          
          //get credit no
          $question =mysqli_query($db, "SELECT * FROM returntostock order by TransNo desc limit 0,1");
          $ans=mysqli_fetch_array($question);
          $crdtno=stripslashes($ans['ReturNo'])+1;
          
          $rcptno=$_GET['rcptno'];
          $alltot=$_GET['alltot'];
          $max=count($_SESSION['credit']);
          for ($i = 1; $i < $max; $i++){
          $itcode = $_SESSION['credit'][$i][0];
          $itname = $_SESSION['credit'][$i][1];
          $itquat = $_SESSION['credit'][$i][2];
          $itprice = $_SESSION['credit'][$i][3];
          $rquat = $_SESSION['credit'][$i][4];
          $rtot = $_SESSION['credit'][$i][5];
          $remquat = $_SESSION['credit'][$i][6];
          $tno = $_SESSION['credit'][$i][7];
          $nsubtotal = ($remquat) * ($itprice);
          $result =mysqli_query($db, "SELECT * FROM tempbill WHERE id='".$tno."'");
          $row=mysqli_fetch_array($result);
          $rcdate=stripslashes($row['date']);
          $rcprice=stripslashes($row['price']);
          $sales_patid = trim(stripslashes($row['patid']));
          $old_presc_id = trim(stripslashes($row['old_in_presc_id']));
          $old_patient_id = trim(stripslashes($row['old_in_patient_id']));
          #$rctype=stripslashes($row['PayMode']);
          #$rctype='OTC Sale';
          $rctype='Regular';
          $categ=stripslashes($row['category']);
          
          
          $resultb =mysqli_query($db, "SELECT * FROM items WHERE ItemCode='".$itcode."' and Type='GOOD'");
          $rowb=mysqli_fetch_array($resultb);
          $bal=stripslashes($rowb[$categ]); 
          $type=stripslashes($rowb['Type']);
          $pack=stripslashes($rowb['Pack']);
          $bal=$bal+$rquat; 

          #$bal=$bal+$rquat; 
              
              
  //insert into stock track
  //if($categ=='Bal'){$bra='PROCUREMENT';}else{$bra=$categ;}
      $resultd = mysqli_query($db, "insert into stocktrack values('0','".$date."','".$bra."','".$itcode."','".$itname."','".$pack."','CREDIT NOTE','".$rquat."','".$bal."','".$username."','".$stamp."')");             
                      
  $resultc= mysqli_query($db, "update items set ".$categ."='".$bal."' where ItemCode='".$itcode."'"); 
  
  $resultx= mysqli_query($db, "update tempbill set quat='".$remquat."',subnet='".$rtot."' where id='".$tno."'"); 

            @mysqli_query($db, "UPDATE `pharmrequests` SET `quat`='" . $remquat . "',`total`='" . $nsubtotal . "',`subnet`='" . $nsubtotal . "' WHERE `old_in_sale_id`='" . $tno . "' AND `patid`='" . $sales_patid . "' AND `old_in_patient_id`='" . $old_patient_id . "' AND `old_in_presc_id`='" . $old_presc_id . "' AND `deptfrom`='IPD' ");
          
  $resulta = mysqli_query($db, "insert into returntostock values('0','".$crdtno."','".$rcptno."','".$rcdate."','','".$date."','".$rctype."','".$itcode."','".$itname."','".$itprice."','".$itquat."','".$rquat."','".$remquat."','".$rtot."','1','".$stamp."','ReturnToStockReason','".$fullname."')");
      
        }
  echo"<script>$('#retotal').val('');$('#rcptno').val('');$('#cdate').val('');$('#csale').val('');</script>";
              if($resulta){
              unset($_SESSION['credit']);
  echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';        
                echo"<script>
                window.open('report.php?id=3.1&rcptno=".$crdtno."');
                $().customAlert();
                alert('Success!', '<p>Transaction Successful.</p>');
                e.preventDefault();
                </script>";                
              }else{
            $result = mysqli_query($db, "DELETE from returntostock where ReturNo='".$crdtno."'");
                echo"
                <script>
                $().customAlert();
                alert('Sorry!', '<p>Transaction Failure.Please Repeat the transaction.</p>');
                e.preventDefault();
                </script>";
    echo"<script>$('#retotal').val('');$('#rcptno').val('');$('#cdate').val('');$('#csale').val('');</script>";
              }

          
          break;
          case 11:
              $a = trim(mysqli_real_escape_string($db, htmlsan($_GET['a'])));
              $obstetricsid = trim(mysqli_real_escape_string($db, $_GET['obstetricsid']));
              $clientid = trim(mysqli_real_escape_string($db, $_GET['clientid']));
              $prescid = trim(mysqli_real_escape_string($db, $_GET['prescid']));
              $patid = trim(mysqli_real_escape_string($db, $_GET['patid']));
              $prescno = trim(mysqli_real_escape_string($db, htmlsan($_GET['prescno'])));
              $gravida = trim(mysqli_real_escape_string($db, htmlsan($_GET['gravida'])));
              $para = trim(mysqli_real_escape_string($db, $_GET['para']));
              $alive = trim(mysqli_real_escape_string($db, $_GET['alive']));
              $dead = trim(mysqli_real_escape_string($db, htmlsan($_GET['dead'])));
              $abortion = trim(mysqli_real_escape_string($db, htmlsan($_GET['abortion'])));
              $gestation = trim(mysqli_real_escape_string($db, $_GET['gestation']));
              $stillbirth = trim(mysqli_real_escape_string($db, $_GET['stillbirth']));
              $caesarean = trim(mysqli_real_escape_string($db, htmlsan($_GET['caesarean'])));
              $vacuum = trim(mysqli_real_escape_string($db, htmlsan($_GET['vacuum'])));
              $lmp = trim(mysqli_real_escape_string($db, $_GET['lmp']));
              $edd = trim(mysqli_real_escape_string($db, $_GET['edd']));
              $aph = trim(mysqli_real_escape_string($db, htmlsan($_GET['aph'])));
              $pph = trim(mysqli_real_escape_string($db, htmlsan($_GET['pph'])));
              $prollabour = trim(mysqli_real_escape_string($db, $_GET['prollabour']));
              $fundalheight = trim(mysqli_real_escape_string($db, $_GET['fundalheight']));
              $engagement = trim(mysqli_real_escape_string($db, htmlsan($_GET['engagement'])));
              $fatalheart = trim(mysqli_real_escape_string($db, htmlsan($_GET['fatalheart'])));
              $reasonfordoing = trim(mysqli_real_escape_string($db, $_GET['reasonfordoing']));
              $cervicalcondition = trim(mysqli_real_escape_string($db, $_GET['cervicalcondition']));
              $dilatation = trim(mysqli_real_escape_string($db, htmlsan($_GET['dilatation'])));
              $membranes = trim(mysqli_real_escape_string($db, htmlsan($_GET['membranes'])));
              $draining = trim(mysqli_real_escape_string($db, $_GET['draining']));
              $presentation = trim(mysqli_real_escape_string($db, $_GET['presentation']));
              $wkposition = trim(mysqli_real_escape_string($db, htmlsan($_GET['wkposition'])));
              $contractions = trim(mysqli_real_escape_string($db, htmlsan($_GET['contractions'])));
              $presenting = trim(mysqli_real_escape_string($db, $_GET['presenting']));
              $minlevel = trim(mysqli_real_escape_string($db, $_GET['minlevel']));
              $minposition = trim(mysqli_real_escape_string($db, htmlsan($_GET['minposition'])));
              $pelvis = trim(mysqli_real_escape_string($db, $_GET['pelvis']));
              $otherremarks = trim(mysqli_real_escape_string($db, $_GET['otherremarks']));
              $date=date('Y/m/d');
              $time=date('H:i');
              $stamp=date('Ymd');
              $status=1;
              #$performedby=
              #$confirmedby=

              if($a==1){               

                  $resulta = mysqli_query($db, "insert into obstetrics values('0','".$prescno."','".$patid."','".$gravida."','".$para."','".$alive."','".$dead."','".$abortion."','".$gestation."','".$stillbirth."','".$caesarean."','".$vacuum."','".$lmp."','".$edd."','".$aph."','".$pph."','".$prollabour."','".$fundalheight."','".$engagement."','".$fatalheart."','".$reasonfordoing."','".$cervicalcondition."','".$dilatation."','".$membranes."','".$draining."','".$presentation."','".$wkposition."','".$contractions."','".$presenting."','".$minlevel."','".$minposition."','".$pelvis."','".$otherremarks."','".$date."','".$time."','".$stamp."','".$old_in_full_name."','','','','".$prescid."','".$clientid."',1)");
              

              }
              else{

                  $resulta = mysqli_query($db, "update obstetrics set gravida='".trim(mysqli_real_escape_string($db, $_GET['gravida']))."',para='".trim(mysqli_real_escape_string($db, $_GET['para']))."',alive='".trim(mysqli_real_escape_string($db, $_GET['alive']))."',dead='".trim(mysqli_real_escape_string($db, $_GET['dead']))."',abortion='".trim(mysqli_real_escape_string($db, $_GET['abortion']))."',gestation='".trim(mysqli_real_escape_string($db, $_GET['gestation']))."',stillbirth='".trim(mysqli_real_escape_string($db, $_GET['stillbirth']))."',caesarean='".trim(mysqli_real_escape_string($db, $_GET['caesarean']))."',vacuum='".trim(mysqli_real_escape_string($db, $_GET['vacuum']))."',lmp='".trim(mysqli_real_escape_string($db, $_GET['lmp']))."',edd='".trim(mysqli_real_escape_string($db, $_GET['edd']))."',aph='".trim(mysqli_real_escape_string($db, $_GET['aph']))."',pph='".trim(mysqli_real_escape_string($db, $_GET['pph']))."',prollabour='".trim(mysqli_real_escape_string($db, $_GET['prollabour']))."',fundalheight='".trim(mysqli_real_escape_string($db, $_GET['fundalheight']))."',engagement='".trim(mysqli_real_escape_string($db, $_GET['engagement']))."',fatalheart='".trim(mysqli_real_escape_string($db, $_GET['fatalheart']))."',reasonfordoing='".trim(mysqli_real_escape_string($db, $_GET['reasonfordoing']))."',cervicalcondition='".trim(mysqli_real_escape_string($db, $_GET['cervicalcondition']))."',dilatation='".trim(mysqli_real_escape_string($db, $_GET['dilatation']))."',membranes='".trim(mysqli_real_escape_string($db, $_GET['membranes']))."',draining='".trim(mysqli_real_escape_string($db, $_GET['draining']))."',presentation='".trim(mysqli_real_escape_string($db, $_GET['presentation']))."',wkposition='".trim(mysqli_real_escape_string($db, $_GET['wkposition']))."',contractions='".trim(mysqli_real_escape_string($db, $_GET['contractions']))."',presenting='".trim(mysqli_real_escape_string($db, $_GET['presenting']))."',minlevel='".trim(mysqli_real_escape_string($db, $_GET['minlevel']))."', minposition='".trim(mysqli_real_escape_string($db, $_GET['minposition']))."',pelvis='".trim(mysqli_real_escape_string($db, $_GET['pelvis']))."',other_remarks='".trim(mysqli_real_escape_string($db, $_GET['otherremarks']))."',confirmedby='".$old_in_full_name."',confirm_date='".$date."',confirm_time='".$time."' where id='".$obstetricsid."'");


              }
                          
              
              if($resulta){
      $resulta = mysqli_query($db, "insert into log values('0','".$username." accesses obstetrics database.Patient No:".$patid."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  

              echo"<img src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
              if($a==1){
              echo"<script>setTimeout(function() {treatchart();},500);</script>";
              }else{echo"<script>setTimeout(function() {
                $.ajax({
                  url:'link.php',
                  data:{id:43,pid:'".makesafe($_GET['prescno'])."'},
                  success:function(data){
                  $('#mainp').html(data);
                  }
                });
                },500);</script>";}
              
              }
              else echo"<img src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
          break;

          
    case 12:
      $itcode=$_GET['code'];
      $ptransid=$_GET['ptransid'];
      $bid=6;
      $bname="ADMINISTRATION";
      $qty=$_GET['expdqty'];
      $date=date('Y/m/d');
      $stamp=date('Ymd');
      $result =mysqli_query($db, "select * from items where ItemCode='".$itcode."'");
      $row=mysqli_fetch_array($result);
      if($bname=='PROCUREMENT'){$branch='Bal';}else{$branch=$bname;}
      $bal=stripslashes($row[$branch]);
      #$bal=stripslashes($row['ADMINISTRATION']);
      #$bal2=stripslashes($row['PHARMACY']);
      $itname=stripslashes($row['ItemName']);
      $sprice=stripslashes($row['PurchPrice']);
      $pack=stripslashes($row['Pack']);
      $qpurch=stripslashes($row['Qpurch']);
      $nbal=$bal-$qty;
      $total=$sprice*$qty;

      $nwqpurch=$qpurch-$qty;
      
      $resultd =mysqli_query($db, "SELECT * FROM expired_purchases WHERE TransNo='".$ptransid."' and Date='".date('Y/m/d')."'");
      $num_resultsd = mysqli_num_rows($resultd);
      if($num_resultsd>0){
                  echo"
                  <script>
                  $().customAlert();
                  alert('Failure!', '<p>A similar record already created today.</p>');
                  e.preventDefault();
                  </script>";
                  exit;
      }
      
$resrwx =mysqli_query($db, "select * from purchases where TransNo='".$ptransid."' ORDER BY TransNo DESC");
$rwx=mysqli_fetch_array($resrwx);
$resrwxb = mysqli_query($db, "insert into expired_purchases values('0','".$ptransid."','".stripslashes($rwx['PurchNo'])."','".stripslashes($rwx['PurchDate'])."','".stripslashes($rwx['ItemCode'])."', '".stripslashes($rwx['ItemName'])."','".stripslashes($rwx['UnitBox'])."','".stripslashes($rwx['PartBox'])."','".stripslashes($rwx['Quantity'])."','".stripslashes($rwx['PurchPrice'])."','".stripslashes($rwx['SalePrice'])."','".stripslashes($rwx['TotalPrice'])."','".stripslashes($rwx['SupplierId'])."','".stripslashes($rwx['Supplier'])."','".stripslashes($rwx['BatchNo'])."','".stripslashes($rwx['Expiry'])."','".stripslashes($rwx['InvoiceNo'])."','".stripslashes($rwx['InvoiceAmt'])."','".stripslashes($rwx['Stamp'])."','".stripslashes($rwx['expstamp'])."','".stripslashes($rwx['Bal'])."','".stripslashes($rwx['StockDate'])."','".stripslashes($rwx['Username'])."','".date('Y/m/d')."')");
                            

      //insert into stock track
$resultd = mysqli_query($db, "insert into stocktrack values('0','".$date."','".$bname."','".$itcode."','".$itname."','".$pack."','EXPIRED STOCK DELETION REGISTER','".$qty."','".$nbal."','".$username."','".$stamp."')");  

      // $resultb = mysqli_query($db, "update items set ".$branch."='".$nbal."', Qpurch='".$nwqpurch."', Diff=0 where ItemCode='".$itcode."'");
      // $resulta = mysqli_query($db, "insert into stockuse values('0','".$bid."','".$bname."','".$itcode."','".$itname."','".$qty."','EXPIRED STOCK DELETION REGISTER','".date('d/m/Y')."','".date('Ymd')."','".$username."',1)");  
      // $resultc = mysqli_query($db, "DELETE FROM purchases where TransNo='".$ptransid."'");

if($resulta&&$resultb){
        
        //update ledgers-stock
// $amount=$total;
// $resultb = mysqli_query($db, "select * from ledgers where ledgerid='630'");
//   $rowb=mysqli_fetch_array($resultb);
//   $invbal=stripslashes($rowb['bal']);
//   $invbal=$invbal-$amount;
  
//   $resultc = mysqli_query($db, "select * from ledgers where ledgerid='701'");
//   $rowc=mysqli_fetch_array($resultc);
//   $supbal=stripslashes($rowc['bal']);
//   $supbal=$supbal+$amount;
  
// $resultl = mysqli_query($db, "insert into ledgerentries values('0','630','Inventory','701','STOCK EXPIRY DELETION EXPENSES','".$amount."','Stock Expiry','".$date."','".$invbal."','".$supbal."','".$stamp."','','',0,'".date('d/m/Y')."-".date('H:i')."','".$username."','SE')");
// $resultm = mysqli_query($db, "update ledgers set bal='".$invbal."' where ledgerid='630'");
// $resultn = mysqli_query($db, "update ledgers set bal='".$supbal."' where ledgerid='701'");
$resulta = mysqli_query($db, "insert into log values('0','".$username." makes an entry in the stock expiry database.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')"); 
            echo"<script>
               $().customAlert();
               alert('Success!', '<p>Entry Posted.</p>');
               setTimeout(function() {
               abouttoexpiry2();},500);
               </script>";
            
          }
          else{
            echo"
            <script>
            $().customAlert();
            alert('Sorry!', '<p>Please Try again.</p>');
            e.preventDefault();
            </script>";
          }
          break;                
              
              case 13:
                $pid=$_POST['pid'];
                $resulta =mysqli_query($db, "select Id,old_patient_id,Dept,PatId,PatName,PrescId,AccType from newprescription where PrescId='".$pid."'");
                $rowa=mysqli_fetch_array($resulta);
                $in_presc_id=stripslashes($rowa['Id']);
                $old_patient_id=stripslashes($rowa['old_patient_id']);
                $in_current_acctype=stripslashes($rowa['AccType']);
                $sendto=stripslashes($rowa['Dept']);
                $patid=stripslashes($rowa['PatId']);
                $patname=stripslashes($rowa['PatName']);
                $paid=0;

                $stamp         = date('Ymd');
                $dat           = date('Y/m/d');
                $presc         = mysqli_real_escape_string($db, trim($_POST['presc']));
                $patientclinic = mysqli_real_escape_string($db, trim($_POST['typeclinics']));
                $typeclinics   = strip_tags($patientclinic);

                // $in_nwins_no    = htmlsan($_POST['in_nwins_no']);
                // $in_nwins_nome    = htmlsan($_POST['in_nwins_nome']);

                $in_currentins_no    = htmlsan($_POST['in_currentins_no']);
                $in_currentins_nome  = htmlsan($_POST['in_currentins_nome']);
                $in_defaultins_no    = htmlsan($_POST['in_defaultins_no']);
                $in_defaultins_nome  = htmlsan($_POST['in_defaultins_nome']);
                $in_default_accntype = htmlsan($_POST['in_default_accntype']);
                $mode                = htmlsan($_POST['switchboard']); #in_payment_mode
                #if ($in_defaultins_no == 14 || $in_defaultins_nome == 'CASH') { $mode='Cash'; } else { $mode='Companies'; } 
                #if ($in_currentins_no != 14 || $in_defaultins_nome != 'CASH') { $mode='Companies'; } else { $mode='Cash'; }
                #if ($in_currentins_no==14&&$in_currentins_nome=='CASH') { $mode='Cash'; }
                if ($in_currentins_no!=14&&$in_currentins_nome!='CASH') { $mode='Companies'; $txtacctype=$in_current_acctype; $in_ins_no=$in_currentins_no; $in_ins_nome=$in_currentins_nome; } 
                else if ($in_currentins_no==14&&$in_currentins_nome=='CASH') { $mode='Cash'; $txtacctype='Normal'; $in_ins_no=$in_currentins_no; $in_ins_nome=$in_currentins_nome;  } 
                else { $mode='Bank'; $txtacctype='Corporate'; $in_ins_no=000; $in_ins_nome=$in_defaultins_nome;  }

                #$typeclinics = getClinicById($db, $type_clinic_id);           
      
                if(isset($_SESSION['dis'])){
                  $diseases=implode(";",$_SESSION['dis']);
                }else $diseases=NULL;

                $s=strlen($diseases);
                $diseases=substr($diseases,0,$s);

                $resulta= mysqli_query($db, "UPDATE newprescription SET History='".mysqli_real_escape_string($db, trim($_POST['history']))."',Prescription='".$presc."',DiagName='".$diseases."',Diagnosis='".mysqli_real_escape_string($db, trim($_POST['diag']))."',PhyExam='".mysqli_real_escape_string($db, trim($_POST['phy']))."',Dressing='".mysqli_real_escape_string($db, trim($_POST['history2']))."',Status=4,Dept='".$_POST['sendto']."',ReviewDate='".$_POST['reviewdate']."',ConsTime='".date('H:i')."',Temp='".$_POST['temp']."',Bp1='".$_POST['bp1']."',Bp2='".$_POST['bp2']."',Weight='".$_POST['weight']."',RespRate='".$_POST['resprate']."',PulseRate='".$_POST['pulserate']."',Rbs='".$_POST['rbs']."',OtherDetails='".$typeclinics."',newscreening='".$_POST['newscreening']."',knownhyper='".$_POST['knownhyper']."',takingmeds='".$_POST['takingmeds']."',DayCare='".$_POST['dress']."',AccType='".htmlsan($txtacctype)."',in_insurer_id='".htmlsan($in_ins_no)."',in_insurer_name='".htmlsan($in_ins_nome)."',username='".$username."',Mode='".$mode."' WHERE Id='".$in_presc_id."'");
                //$resulta= mysqli_query($db, "UPDATE pharmrequests SET prescription='".mysqli_real_escape_string($db, trim($_POST['presc']))."' where PrescId='".$pid."'");
                
                //get receipt no
                $question =mysqli_query($db, "SELECT TransNo,RcptNo FROM sales order by TransNo desc limit 0,1");
                $ans=mysqli_fetch_array($question);
                $rcptno=stripslashes($ans['RcptNo'])+1;
                $arr=array();

                if($_POST['recp']==1){
                  $arr[]='PHARMACY';
                
                    $a='pharmcart';

                    $max=count($_SESSION[$a]);
                    for ($i = 0; $i < $max; $i++){
                    $itcode = $_SESSION[$a][$i][0];
                    $itname = $_SESSION[$a][$i][1];
                    $itquat = $_SESSION[$a][$i][2];
                    $itprice = $_SESSION[$a][$i][3];
                    $tprice = $_SESSION[$a][$i][4];
                    $oname = $_SESSION[$a][$i][5];
                    $regn = $_SESSION[$a][$i][6];
                    $categ = $_SESSION[$a][$i][7];
                    $total = $_SESSION[$a][$i][8];
                    $disc = $_SESSION[$a][$i][9];
                    $subn = $_SESSION[$a][$i][10];
                    $date = $_SESSION[$a][$i][11];
                    $iid = $_SESSION[$a][$i][12];
                    $prescname= $_SESSION[$a][$i][13];
                    $categ_id = $_SESSION[$a][$i][14];
                    $totcover = $_SESSION[$a][$i][15]; 
                    #$paidstatus = $_SESSION[$a][$i][16]; 
                    #$payrcptno = $_SESSION[$a][$i][17];
                    // $salesid = $_SESSION[$a][$i][18]; 
                    // $pharmid = $_SESSION[$a][$i][19]; 
                    $disp=0;
                    $arr[]=$categ;
                    $dept=$categ;
                    #if($payrcptno!=''){$rcptno=$payrcptno;}else{$rcptno=$rcptno;}


                    // $result =mysqli_query($db, "select * from pharmrequests where itcode='".$itcode."' and prescid='".$pid."' and old_in_presc_id='".$in_presc_id."' and old_in_patient_id='".$old_patient_id."' and deptfrom='OPD'");
                    // $num_results = mysqli_num_rows($result);
                    // if($num_results>=1){
                    //   echo"
                    //       <script>
                    //       $().customAlert();
                    //       alert('Error!', '<p>Similar item already exists.</p>');
                    //       e.preventDefault();
                    //       </script>";
                    //   exit;
                    // }else{

                      $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$patid."','".$patname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");

                  
                      $last_id = mysqli_insert_id($db);
                      $resulta = mysqli_query($db, "insert into pharmrequests values('0','".$pid."','".$patid."','".$patname."','".$prescname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$username."','".$stamp."',0,'".date('H:i')."','st','".$fullname."','','".$in_presc_id."','".$old_patient_id."','".$rcptno."','".$paid."','".$last_id."','OPD','NORMAL')");     

                    #} 
                  
                    #$resultb= mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE PrescId='".$pid."'");old_in_sale_id
                  }

                }


                if($_POST['recl']==1){
                  //insert into lab requests
                  $question =mysqli_query($db, "SELECT id,labno FROM labrequests order by id desc limit 0,1");
                  $ans=mysqli_fetch_array($question);
                  $labno=stripslashes($ans['labno'])+1;
                
                  $a='lab';

                  $max=count($_SESSION[$a]);
                  for ($i = 0; $i < $max; $i++){
                  $itcode = $_SESSION[$a][$i][0];
                  $itname = $_SESSION[$a][$i][1];
                  $itquat = $_SESSION[$a][$i][2];
                  $itprice = $_SESSION[$a][$i][3];
                  $tprice = $_SESSION[$a][$i][4];
                  $oname = $_SESSION[$a][$i][5];
                  $regn = $_SESSION[$a][$i][6];
                  $categ = $_SESSION[$a][$i][7];
                  $total = $_SESSION[$a][$i][8];
                  $disc = $_SESSION[$a][$i][9];
                  $subn = $_SESSION[$a][$i][10];
                  $iid = $_SESSION[$a][$i][12];
                  $categ_id = $_SESSION[$a][$i][15];
                  $sec = $_SESSION[$a][$i][16];
                  $disp=0;
                  $arr[]=$categ;
                  $dept=$categ;

                $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
                
                $last_id = mysqli_insert_id($db);
                $resulty = mysqli_query($db, "insert into labrequests values('0','".$labno."','".$pid."','".$patid."','".$patname."','".$sec."','".$itname."','','".date('H:i')."','','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','','','','','','','','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','NORMAL')"); 

                
                }


              }

              if($_POST['recr']==1){
                
                //insert into rad requests
                $question =mysqli_query($db, "SELECT id,radno FROM radrequests order by id desc limit 0,1");
                $ans=mysqli_fetch_array($question);
                $radno=stripslashes($ans['radno'])+1;
                
                $a='rad';
                $max=count($_SESSION[$a]);
                for ($i = 0; $i < $max; $i++){
                  $itcode = $_SESSION[$a][$i][0];
                  $itname = $_SESSION[$a][$i][1];
                  $itquat = $_SESSION[$a][$i][2];
                  $itprice = $_SESSION[$a][$i][3];
                  $tprice = $_SESSION[$a][$i][4];
                  $oname = $_SESSION[$a][$i][5];
                  $regn = $_SESSION[$a][$i][6];
                  $categ = $_SESSION[$a][$i][7];
                  $total = $_SESSION[$a][$i][8];
                  $disc = $_SESSION[$a][$i][9];
                  $subn = $_SESSION[$a][$i][10];
                  $iid = $_SESSION[$a][$i][12];
                  $categ_id = $_SESSION[$a][$i][15];
                  $disp=0;
                  $arr[]=$categ;
                  $dept=$categ;           

                $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
                
                $last_id = mysqli_insert_id($db);
                $resulty = mysqli_query($db, "insert into radrequests values('0','".$radno."','".$pid."','".$patid."','".$patname."','".$itname."','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','RADIOLOGY','NORMAL')");  

                                
                }

              }



              if($_POST['dress']==1){

                $question =mysqli_query($db, "SELECT id,dreno FROM opdservicerequests order by id desc limit 0,1");
                $ans=mysqli_fetch_array($question);
                $dreno=stripslashes($ans['dreno'])+1;
                
                $a='dresser';
                $max=count($_SESSION[$a]);
                for ($i = 0; $i < $max; $i++){
                  $itcode = $_SESSION[$a][$i][0];
                  $itname = $_SESSION[$a][$i][1];
                  $itquat = $_SESSION[$a][$i][2];
                  $itprice = $_SESSION[$a][$i][3];
                  $tprice = $_SESSION[$a][$i][4];
                  $oname = $_SESSION[$a][$i][5];
                  $regn = $_SESSION[$a][$i][6];
                  $categ = $_SESSION[$a][$i][7];
                  $total = $_SESSION[$a][$i][8];
                  $disc = $_SESSION[$a][$i][9];
                  $subn = $_SESSION[$a][$i][10];
                  $iid = $_SESSION[$a][$i][12];
                  $categ_id = $_SESSION[$a][$i][15];
                  $sec = $_SESSION[$a][$i][16];
                  $disp=0;
                  $arr[]=$categ;
                  $dept=$categ;           

                $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
                
                $last_id = mysqli_insert_id($db);
                $resulty = mysqli_query($db, "insert into opdservicerequests values('0','".$dreno."','".$pid."','".$patid."','".$patname."','".$itname."','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','NORMAL')"); 

                                
                }

              }

              
              
      if($resulta){
        foreach ($arr as $key => $val) {
        //send popups
          $resultc =mysqli_query($db, "SELECT ip,dept FROM compips WHERE dept='".$val."'");
          $num_resultsc = mysqli_num_rows($resultc);  
          for ($i=0; $i <$num_resultsc; $i++) {
          $rowc=mysqli_fetch_array($resultc);
          $ip=stripslashes($rowc['ip']);    
          
            $resultd =mysqli_query($db, "SELECT username,computerip FROM logintable WHERE computerip='".$ip."'");
            $num_resultsd = mysqli_num_rows($resultd);  
            for ($d=0; $d <$num_resultsd; $d++) {
            $rowd=mysqli_fetch_array($resultd);
            $user=stripslashes($rowd['username']);
            $resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient from ".$dept."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
            }
                
          } 
        }
       
      $resulta = mysqli_query($db, "CALL GetUserLogs('".$username." updates consultations.Presc No:".$pid."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");  
              echo"<img src=\"images/tick.png\" style=\"width:30px; height:30px;\">
                    <script>
                      setTimeout(function() {
                      docexam('".$sendto."');},500);
                    </script>";
                    exit;
                  }
                  else{
                    echo'<img src="images/delete.png" style="width:30px; height:30px;">';
                  }
            
              break;
              
              
              case '13.1':
                $pid=$_POST['pid'];
                $resulta =mysqli_query($db, "select Id,old_patient_id,Dept,PatId,PatName,PrescId,AccType from newprescription where PrescId='".$pid."'");
                $rowa=mysqli_fetch_array($resulta);
                $in_presc_id=stripslashes($rowa['Id']);
                $old_patient_id=stripslashes($rowa['old_patient_id']);
                $in_current_acctype=stripslashes($rowa['AccType']);
                $sendto=stripslashes($rowa['Dept']);
                $patid=stripslashes($rowa['PatId']);
                $patname=stripslashes($rowa['PatName']);
                $paid=0;

                $stamp         = date('Ymd');
                $dat           = date('Y/m/d');
                $presc         = mysqli_real_escape_string($db, trim($_POST['presc']));
                $patientclinic = mysqli_real_escape_string($db, trim($_POST['typeclinics']));
                $typeclinics   = strip_tags($patientclinic);

                $in_nwins_no    = htmlsan($_POST['in_nwins_no']);
                $in_nwins_nome    = htmlsan($_POST['in_nwins_nome']);

                $in_currentins_no    = htmlsan($_POST['in_currentins_no']);
                $in_currentins_nome  = htmlsan($_POST['in_currentins_nome']);
                $in_defaultins_no    = htmlsan($_POST['in_defaultins_no']);
                $in_defaultins_nome  = htmlsan($_POST['in_defaultins_nome']);
                $in_default_accntype = htmlsan($_POST['in_default_accntype']);
                $mode                = htmlsan($_POST['switchboard']); #in_payment_mode
                #if ($in_defaultins_no == 14 || $in_defaultins_nome == 'CASH') { $mode='Cash'; } else { $mode='Companies'; } 
                #if ($in_currentins_no != 14 || $in_defaultins_nome != 'CASH') { $mode='Companies'; } else { $mode='Cash'; }
                #if ($in_currentins_no==14&&$in_currentins_nome=='CASH') { $mode='Cash'; }
                if ($in_currentins_no!=14&&$in_currentins_nome!='CASH') { $mode='Companies'; $txtacctype=$in_current_acctype; $in_ins_no=$in_currentins_no; $in_ins_nome=$in_currentins_nome; } 
                else if ($in_currentins_no==14&&$in_currentins_nome=='CASH') { $mode='Cash'; $txtacctype='Normal'; $in_ins_no=$in_currentins_no; $in_ins_nome=$in_currentins_nome;  } 
                else { $mode='Bank'; $txtacctype='Corporate'; $in_ins_no=000; $in_ins_nome=$in_defaultins_nome;  }

                #$typeclinics = getClinicById($db, $type_clinic_id);     
        // if ($patcategory == null || $patcategory == '' || $patcategory == 0) { $patcategory='NORMAL'; }
        // if ($insid == 14 || $insname == 'CASH') { $mode='Cash'; $as_cc_payin='Cash'; } else { $mode='Companies'; $as_cc_payin='Companies'; } 
      
      
                if(isset($_SESSION['dis'])){
                  $diseases=implode(";",$_SESSION['dis']);
                }else $diseases=NULL;

                $s=strlen($diseases);
                $diseases=substr($diseases,0,$s);

                $resulta= mysqli_query($db, "UPDATE newprescription SET History='".mysqli_real_escape_string($db, trim($_POST['history']))."',Prescription='".$presc."',DiagName='".$diseases."',Diagnosis='".mysqli_real_escape_string($db, trim($_POST['diag']))."',PhyExam='".mysqli_real_escape_string($db, trim($_POST['phy']))."',Dressing='".mysqli_real_escape_string($db, trim($_POST['history2']))."',Status=4,Dept='".$_POST['sendto']."',ReviewDate='".$_POST['reviewdate']."',ConsTime='".date('H:i')."',Temp='".$_POST['temp']."',Bp1='".$_POST['bp1']."',Bp2='".$_POST['bp2']."',Weight='".$_POST['weight']."',RespRate='".$_POST['resprate']."',PulseRate='".$_POST['pulserate']."',Rbs='".$_POST['rbs']."',OtherDetails='".$typeclinics."',newscreening='".$_POST['newscreening']."',knownhyper='".$_POST['knownhyper']."',takingmeds='".$_POST['takingmeds']."',DayCare='".$_POST['dress']."',AccType='".htmlsan($txtacctype)."',in_insurer_id='".htmlsan($in_nwins_no)."',in_insurer_name='".htmlsan($in_nwins_nome)."',username='".$username."',Mode='".$mode."' WHERE Id='".$in_presc_id."'");
                //$resulta= mysqli_query($db, "UPDATE pharmrequests SET prescription='".mysqli_real_escape_string($db, trim($_POST['presc']))."' where PrescId='".$pid."'");
                
                //get receipt no
                $question =mysqli_query($db, "SELECT TransNo,RcptNo FROM sales order by TransNo desc limit 0,1");
                $ans=mysqli_fetch_array($question);
                $rcptno=stripslashes($ans['RcptNo'])+1;
                $arr=array();

                if($_POST['recp']==1){
                  $arr[]='PHARMACY';
                
                    $a='pharmcart';

                    $max=count($_SESSION[$a]);
                    for ($i = 0; $i < $max; $i++){
                    $itcode = $_SESSION[$a][$i][0];
                    $itname = $_SESSION[$a][$i][1];
                    $itquat = $_SESSION[$a][$i][2];
                    $itprice = $_SESSION[$a][$i][3];
                    $tprice = $_SESSION[$a][$i][4];
                    $oname = $_SESSION[$a][$i][5];
                    $regn = $_SESSION[$a][$i][6];
                    $categ = $_SESSION[$a][$i][7];
                    $total = $_SESSION[$a][$i][8];
                    $disc = $_SESSION[$a][$i][9];
                    $subn = $_SESSION[$a][$i][10];
                    $date = $_SESSION[$a][$i][11];
                    $iid = $_SESSION[$a][$i][12];
                    $prescname= $_SESSION[$a][$i][13];
                    $categ_id = $_SESSION[$a][$i][14];
                    $dispstatus = $_SESSION[$a][$i][15]; #if 2 - dispensed
                    $paidstatus = $_SESSION[$a][$i][16]; #if 1 - paid
                    $payrcptno = $_SESSION[$a][$i][17];
                    // $salesid = $_SESSION[$a][$i][18]; 
                    // $pharmid = $_SESSION[$a][$i][19]; 
                    $disp=0;
                    $arr[]=$categ;
                    $dept=$categ;
                    if($payrcptno!=''){$rcptno=$payrcptno;}else{$rcptno=$rcptno;}


                    // $result =mysqli_query($db, "select * from pharmrequests where itcode='".$itcode."' and prescid='".$pid."' and old_in_presc_id='".$in_presc_id."' and old_in_patient_id='".$old_patient_id."' and deptfrom='OPD'");
                    // $num_results = mysqli_num_rows($result);
                    // if($num_results>=1){
                    //   echo"
                    //       <script>
                    //       $().customAlert();
                    //       alert('Error!', '<p>Similar item already exists.</p>');
                    //       e.preventDefault();
                    //       </script>";
                    //   exit;
                    // }else{

                      $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$patid."','".$patname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");

                  
                      $last_id = mysqli_insert_id($db);
                      $resulta = mysqli_query($db, "insert into pharmrequests values('0','".$pid."','".$patid."','".$patname."','".$prescname."','".$itcode."','".$itname."','".$dept."','".$itprice."','".$itquat."','0','".$disc."','".$subn."','".$dat."-".date('H:i')."','".$iid."','".$username."','".$stamp."',0,'".date('H:i')."','st','".$fullname."','','".$in_presc_id."','".$old_patient_id."','".$rcptno."','".$paid."','".$last_id."','OPD','NORMAL')");     

                    #} 
                  
                    #$resultb= mysqli_query($db, "UPDATE newprescription SET PharmTime='".date('H:i')."' WHERE PrescId='".$pid."'");old_in_sale_id
                  }

                }


                if($_POST['recl']==1){
                  //insert into lab requests
                  $question =mysqli_query($db, "SELECT id,labno FROM labrequests order by id desc limit 0,1");
                  $ans=mysqli_fetch_array($question);
                  $labno=stripslashes($ans['labno'])+1;
                
                  $a='lab';

                  $max=count($_SESSION[$a]);
                  for ($i = 0; $i < $max; $i++){
                  $itcode = $_SESSION[$a][$i][0];
                  $itname = $_SESSION[$a][$i][1];
                  $itquat = $_SESSION[$a][$i][2];
                  $itprice = $_SESSION[$a][$i][3];
                  $tprice = $_SESSION[$a][$i][4];
                  $oname = $_SESSION[$a][$i][5];
                  $regn = $_SESSION[$a][$i][6];
                  $categ = $_SESSION[$a][$i][7];
                  $total = $_SESSION[$a][$i][8];
                  $disc = $_SESSION[$a][$i][9];
                  $subn = $_SESSION[$a][$i][10];
                  $iid = $_SESSION[$a][$i][12];
                  $categ_id = $_SESSION[$a][$i][15];
                  $sec = $_SESSION[$a][$i][16];
                  $disp=0;
                  $arr[]=$categ;
                  $dept=$categ;

                $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
                
                $last_id = mysqli_insert_id($db);
                $resulty = mysqli_query($db, "insert into labrequests values('0','".$labno."','".$pid."','".$patid."','".$patname."','".$sec."','".$itname."','','".date('H:i')."','','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','','','','','','','','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','NORMAL')"); 

                
                }


              }

              if($_POST['recr']==1){
                
                //insert into rad requests
                $question =mysqli_query($db, "SELECT id,radno FROM radrequests order by id desc limit 0,1");
                $ans=mysqli_fetch_array($question);
                $radno=stripslashes($ans['radno'])+1;
                
                $a='rad';
                $max=count($_SESSION[$a]);
                for ($i = 0; $i < $max; $i++){
                  $itcode = $_SESSION[$a][$i][0];
                  $itname = $_SESSION[$a][$i][1];
                  $itquat = $_SESSION[$a][$i][2];
                  $itprice = $_SESSION[$a][$i][3];
                  $tprice = $_SESSION[$a][$i][4];
                  $oname = $_SESSION[$a][$i][5];
                  $regn = $_SESSION[$a][$i][6];
                  $categ = $_SESSION[$a][$i][7];
                  $total = $_SESSION[$a][$i][8];
                  $disc = $_SESSION[$a][$i][9];
                  $subn = $_SESSION[$a][$i][10];
                  $iid = $_SESSION[$a][$i][12];
                  $categ_id = $_SESSION[$a][$i][15];
                  $disp=0;
                  $arr[]=$categ;
                  $dept=$categ;           

                $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
                
                $last_id = mysqli_insert_id($db);
                $resulty = mysqli_query($db, "insert into radrequests values('0','".$radno."','".$pid."','".$patid."','".$patname."','".$itname."','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','RADIOLOGY','NORMAL')");  

                                
                }

              }



              if($_POST['dress']==1){

                $question =mysqli_query($db, "SELECT id,dreno FROM opdservicerequests order by id desc limit 0,1");
                $ans=mysqli_fetch_array($question);
                $dreno=stripslashes($ans['dreno'])+1;
                
                $a='dresser';
                $max=count($_SESSION[$a]);
                for ($i = 0; $i < $max; $i++){
                  $itcode = $_SESSION[$a][$i][0];
                  $itname = $_SESSION[$a][$i][1];
                  $itquat = $_SESSION[$a][$i][2];
                  $itprice = $_SESSION[$a][$i][3];
                  $tprice = $_SESSION[$a][$i][4];
                  $oname = $_SESSION[$a][$i][5];
                  $regn = $_SESSION[$a][$i][6];
                  $categ = $_SESSION[$a][$i][7];
                  $total = $_SESSION[$a][$i][8];
                  $disc = $_SESSION[$a][$i][9];
                  $subn = $_SESSION[$a][$i][10];
                  $iid = $_SESSION[$a][$i][12];
                  $categ_id = $_SESSION[$a][$i][15];
                  $sec = $_SESSION[$a][$i][16];
                  $disp=0;
                  $arr[]=$categ;
                  $dept=$categ;           

                $resulta = mysqli_query($db, "insert into sales values('0','".$rcptno."','".$dept."','".$itcode."','".$itname."','".$itquat."','".$itprice."',0,'".$disc."','".$subn."',0,'".$disp."','".$dat."','".$regn."','".$oname."','','".$in_currentins_no."','".$in_currentins_nome."','','','','".$mode."','','','','".$stamp."','','".$username."',0,'".$iid."','','".$old_patient_id."','".$userid."','".$categ_id."','','uno','dos','tres','cuatro','cinco','seis')");
                
                $last_id = mysqli_insert_id($db);
                $resulty = mysqli_query($db, "insert into opdservicerequests values('0','".$dreno."','".$pid."','".$patid."','".$patname."','".$itname."','','".date('H:i')."','','".date('d/m/Y')."','".date('Ymd')."','".$fullname."','',1,'".$rcptno."','".$paid."','".$in_presc_id."','".$old_patient_id."','OPD','".$last_id."','NORMAL')"); 

                                
                }

              }

              
              
      if($resulta){
        foreach ($arr as $key => $val) {
        //send popups
          $resultc =mysqli_query($db, "SELECT ip,dept FROM compips WHERE dept='".$val."'");
          $num_resultsc = mysqli_num_rows($resultc);  
          for ($i=0; $i <$num_resultsc; $i++) {
          $rowc=mysqli_fetch_array($resultc);
          $ip=stripslashes($rowc['ip']);    
          
            $resultd =mysqli_query($db, "SELECT username,computerip FROM logintable WHERE computerip='".$ip."'");
            $num_resultsd = mysqli_num_rows($resultd);  
            for ($d=0; $d <$num_resultsd; $d++) {
            $rowd=mysqli_fetch_array($resultd);
            $user=stripslashes($rowd['username']);
            $resulte = mysqli_query($db, "insert into messages values('0','".$user."','System','Incoming Patient from ".$dept."','".date('d/m/Y-H:i')."','".date('Ymd')."',0)");
            }
                
          } 
        }
       
      $resulta = mysqli_query($db, "CALL GetUserLogs('".$username." updates consultations.Presc No:".$pid."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");  
              echo"<img src=\"images/tick.png\" style=\"width:30px; height:30px;\">
                    <script>
                      setTimeout(function() {
                      docexam('".$sendto."');},500);
                    </script>";
                    exit;
                  }
                  else{
                    echo'<img src="images/delete.png" style="width:30px; height:30px;">';
                  }
            
              break;

              case 14:
              $a=$_GET['a'];
              $clientid=makesafe($_GET['clientid']);
              $clientno=makesafe($_GET['clientno']);
              $prescid=makesafe($_GET['prescid']);
              $prescno=makesafe($_GET['prescno']);
              $name=makesafe(strtoupper($_GET['patname']));
              $age=makesafe($_GET['age']);
              $in_batch_no=makesafe($_GET['in_batch_no']);
              $bgroup=makesafe($_GET['bgroup']);
              $bgrouptype=makesafe($_GET['bgrouptype']);
              $startime=makesafe($_GET['startime']);
              $temp=makesafe($_GET['temp']);
              $bp1=makesafe($_GET['bp1']);
              $bp2=makesafe($_GET['bp2']);
              $pr=makesafe($_GET['pr']);
              $diagnosis=makesafe($_GET['diagnosis']);
              $reason=makesafe($_GET['reason']);
              $counter_checker=makesafe($_GET['counter_checker']);
              #$transact_by=htmlsan(strtoupper($fullname));
              $volume=makesafe($_GET['volume']);
              #htmlsan(strtoupper($fullname))
              $per_prescription_remarks=makesafe($_GET['per_prescription_remarks']);
              $patient_condition_remarks=makesafe($_GET['patient_condition_remarks']);
              #$moredetails='NEW ITEM';
              
              $resultz = mysqli_query($db, "insert into tblbtransfussion values('0','".$clientid."','".$clientno."','".$prescid."','".$prescno."','".$name."','".$age."','".$in_batch_no."','".$bgroup."','".$bgrouptype."','".$startime."','".$temp."','".$bp1."','".$bp2."','".$pr."','".$diagnosis."','".$reason."','".$volume."','".$username."','".$counter_checker."','".htmlsan(strtoupper($fullname))."','".$per_prescription_remarks."','".$patient_condition_remarks."','".date('Y/m/d')."','".date('Ymd')."','".date('YmdHi')."','".date("Y-m-d H:i:s")."',1)");

              if($resultz){      
$resulta = mysqli_query($db, "CALL GetUserLogs('".$username." adds blood transfussion for PatientNo:".$clientno." PatientName:".$name."-COMPUTER IP ADDRESS:".$_SERVER['REMOTE_ADDR']."','".$username."','".date('YmdHi')."', '".date('H:i')."','".date('d/m/Y')."','1')");

              echo"<img src=\"images/tick.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
              if($a==1){
              echo"<script>setTimeout(function() {treatchart();},500);</script>";
              }else{echo"<script>setTimeout(function() {
                $.ajax({
                  url:'link.php',
                  data:{id:43,pid:'".makesafe($_GET['prescno'])."'},
                  success:function(data){
                  $('#mainp').html(data);
                  }
                });
                },500);</script>";}
              
              }
              else echo"<img src=\"images/delete.png\" style=\"margin-top:0px\"  width=\"30\" height=\"30\"/>";
              break;
          
          case 15:
          $medico_id=$_POST['medico_id'];
          $pid=$_POST['pid'];
          #$sumno=$_POST['sumno'];
          $old_presc_id=$_POST['prescid'];
          $old_patient_id=$_POST['clientid'];
          $stamp=date('Ymd');
          $dat=date('Y/m/d');
          $paid=0;
          
          $presc=mysqli_real_escape_string($db, trim($_POST['prescription'])).'</b>';
          $patclinsumm=mysqli_real_escape_string($db, trim($_POST['clinsumm']));
          #$clinsumm=strip_tags($patclinsumm);
          $patclincfind=mysqli_real_escape_string($db, trim($_POST['risultaticlinici']));
          $investigation=mysqli_real_escape_string($db, trim($_POST['investigations']));
          $diagnosi=mysqli_real_escape_string($db, trim($_POST['disdiag']));
          $urgent_admission=mysqli_real_escape_string($db, trim($_POST['urgent_admission_request']));
          $raccomandazione=mysqli_real_escape_string($db, trim($_POST['raccomandazione']));
          $appco_dt=date("Y-m-d H:i:s");
          #$appco_dt=date("Y-m-d H:i");
          $appco_ds=date('YmdHi'); 
          $report_ds=stampreverse($_POST['reportds']);


          $arr=array();

          if(isset($_SESSION['dis'])){
            $diseases=implode(";",$_SESSION['dis']);
          }else $diseases=NULL;

          $s=strlen($diseases);
          $diseases=substr($diseases,0,$s);

          // if($sumno>0){
          // $rcptno=$sumno;
          // $result = mysqli_query($db, "DELETE from discharge where sumno='".$sumno."'");  
          // }else{
          // //get receipt no
          // $question =mysqli_query($db, "SELECT * FROM discharge order by id desc limit 0,1"); 
          // $ans=mysqli_fetch_array($question);
          // $rcptno=stripslashes($ans['sumno'])+1;
          // }

          if($medico_id==0){
            $result = mysqli_query($db, "INSERT INTO tblrefertomedico VALUES('','".$_POST['clientid']."','".$_POST['patid']."','".$_POST['prescid']."','".$_POST['pid']."','".$_POST['patname']."','".$_POST['age']."','".$_POST['sex']."','".$_POST['reportdt']."','".stampreverse($_POST['reportdt'])."','".$_POST['doctor']."','".$_POST['lc_hospital']."','".$patclinsumm."','".$patclincfind."','".$investigation."','".$diagnosi."','".$diseases."','".$presc."','".$urgent_admission."','".$raccomandazione."','OTHER DETAILS','".$fullname."','lub','lud','".date('d/m/Y')."','".date('Ymd')."','".$appco_dt."','".$appco_ds."',1)");
            
            $discharge_last_id = mysqli_insert_id($db);              
          }
          else{ 
            $resultc= mysqli_query($db, "UPDATE tblrefertomedico SET ClinicalSummary='".$patclinsumm."',ClinicalFindings='".$patclincfind."',Investigations='".$investigation."',Diagnosi='".$diagnosi."',Diseases='".$diseases."',Trattamento='".$presc."',UrgentAdmissionRequest='".$urgent_admission."',Raccomandazione='".$raccomandazione."',LastUpdateBy='".$fullname."',LastUpdateDate='".$appco_dt."' WHERE Id='".$_POST['medico_id']."'");
          }
                  
          
          #$resultb= mysqli_query($db, "update inpatients set DiagName='".$diseases."' where Id='".$_POST['prescid']."'");

          //get invoice no
          // $query =mysqli_query($db, "SELECT * FROM tempbill order by id desc limit 0,1");
          // $qry=mysqli_fetch_array($query);
          // $billno=stripslashes($qry['billno'])+1;


            #window.open('report.php?id=4.2&rcptno=".$discharge_last_id."');
                                
       


          if($result){
              #unset($_SESSION['pharmcart']);    
      $resulta = mysqli_query($db, "insert into log values('0','".$username." generates medical records summary for inpatient-NAME:".$_POST['patname']."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  
            echo'<embed src="images/honk3.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">';   
            echo"<script>
            window.open('report.php?id=4.2&url_uno=".safe_encode(htmlsan($_POST['clientid']))."&url_dos=".safe_encode(htmlsan($_POST['patid']))."&url_tres=".safe_encode(htmlsan($_POST['prescid']))."&url_cuatro=".safe_encode(htmlsan($_POST['pid']))."');
            $().customAlert();
                alert('Success!', '<p>Medical Records Registered Successful.</p>');
                </script>";
              echo"<script>setTimeout(function() {riassunto_del_referto_medico();},500);</script>";
            exit;
          }
          else{
            echo"
            <script>
            $().customAlert();
            alert('Sorry!', '<p>Please repeat again.</p>');
            e.preventDefault();
            </script>";
          }
          break;
              


          case 16:break;

          case 17:break;

          case 404:
              header("Location: custom-404-page.php");
              #header("Location: http://betterhealth.co.ke/");
          break;


    }

?>
              
              
