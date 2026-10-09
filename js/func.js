// Convert numbers to words
// copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
// permission to use this Javascript on your web page is granted
// provided that all of the code (including this copyright notice) is
// used exactly as shown (you can change the numbering system if you wish)

// American Numbering System
// var th = ['','thousand','million', 'billion','trillion'];
// // uncomment this line for English Number System
// // var th = ['','thousand','million', 'milliard','billion'];

// var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}

// // Convert figures to money values
// Number.prototype.formatMoney = function(c, d, t){
// var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
//    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
//  }; 

var loader = '<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>';

// $(function() { });
//$(document).ready(function(){ });
// $(function() { 
//       $( ".draggable" ).droppable();
//       $(".combos" ).combobox({});
//       });

$(document).ready(function(){ 
   $(".combos" ).combobox({});
   $("#itemn" ).combobox();
      $( "#toggle" ).click(function() {
      $( "#itemn" ).toggle();
      });
   $("#itemn").parent().find("input:first").focus();  
   $('#minbal_not_in_items').combobox({});
   $('#update_pay_mode_cash').combobox({});
   $('#update_patient_incremental').combobox({});
   $('#update_user_incremental').combobox({});
   $('#update_categories_inc').combobox({});
   $('#update_pharmacy_n_admin_catid_col_sales_edited').combobox({});
   $('#patient_id_patno_not_blank').combobox({});
   //minbal_not_in_items_and_no_item_id #minbal_not_in_items
   $('#update_user_id_inrcpt_where_patno_not_blank').combobox({});
   $('#update_category_id_inrcpt_where_patno_not_blank').combobox({});
   $('#patient_id_patno_blank_unregistered').combobox({});
   $('#update_old_in_presc_id_pharmacy_requests').combobox({});
   $('#update_old_in_presc_id_laboratory_requests').combobox({});
   //$('#minbal_not_in_items').combobox({});
   $('#update_patient_id_in_newpresc_edited').combobox({});
   $('#update_send_to_dept_id_in_newpresc').combobox({});
   $('#update_type_clinic_id_in_newpresc').combobox({});
   $('#check_anything_like_hypertensive_in_history').combobox({});
   $('#update_old_in_patient_id_laboratory_requests').combobox({});
   $('#update_old_in_presc_id_radiology_requests').combobox({});
   $('#update_old_in_patient_id_radiology_requests').combobox({});
   $('#update_old_in_presc_id_theatre_requests').combobox({});
   $('#update_old_in_patient_id_theatre_requests').combobox({});
   $('#update_old_in_patient_id_pharmacy_requests').combobox({});
   $('#update_patient_id_in_discharge').combobox({});
   

   $('#expaccledger').parent().find('input:first').width(140).prop('disabled',false);
   $('#action').parent().find('input:first').width(140).prop('disabled',false);

   $("#expaccledger" ).combobox();
   $("#action" ).combobox();
   $("#coz6" ).combobox();
   $("#town" ).combobox();
   $("#insu" ).combobox({});
   $('#pntno').combobox({});
   $("#supname" ).combobox({});
   $("#docopdUpt2" ).combobox({});
   $("#order606" ).combobox({});
   $("#wardlist" ).combobox({});
   $("#empbank" ).combobox({});
   $("#income606" ).combobox({});
   $("#nightnurse726" ).combobox({});
   $("#nightnurse606" ).combobox({});
   $("#nightnurse834" ).combobox({});
   $( "#orderitem834" ).combobox({});
   $("#customsendto" ).combobox({});
   $("#txtdatamodifier606" ).combobox({});


   $('#newreg76').parent().find('input:first').width(140).prop('disabled',true);
   $("#newreg76").combobox({
      select: function(event,ui){
         var code = $('#newreg76').val();
         if(code=='Cash'){
            $('#acdiv1').hide();
            $('#acdiv2').hide();
            $('#acdiv3').hide();
            $('#lid76').val('');
            $('#lname76').val('');
         }else if(code=='Companies'){
            $('#acdiv1').hide();
            $('#acdiv2').show();
            $('#acdiv3').show();
            $('#cname76').parent().find('input:first').focus();
         }else if(code=='Bank'){
            $('#acdiv2').hide();
            $('#acdiv1').show();
            $('#acdiv3').show();
            $('#bname76').parent().find('input:first').focus();
         }     
         
      }
   });

   $( "#bnamempesa76" ).combobox({});
   $('#bnamempesa76').parent().find('input:first').width(140); 
   $("#cconsultfee").combobox();
   $('#cconsultfee').parent().find('input:first').width(140); 
   $( "#cconsultfee" ).combobox({
      select: function(event,ui){
       var str = $('#cconsultfee').val();
       var parts=str.split('θ',5)
       $('#ItemCode').val(parts[0]);
       $('#ItemName').val(parts[1]);
       $('#Category').val(parts[2]);
       $('#SalePrice').val(parts[3]);
       $('#old_category_id').val(parts[4]);
       //$('#cardno').focus();
      }
   });
   $( "#empbank" ).combobox({});
   $( "#currentins" ).combobox({
      select: function(event,ui){
       var str = $('#currentins').val();
       var parts=str.split('θ',2)
       $('#insid').val(parts[0]);
       $('#insname').val(parts[1]);
       $('#refno').focus();
      }
   });




});



function newpatientreg(){
$("#mainp").html(loader);
   $.ajax({
   url:'bridgerep.php',
   data:{id:1},
   success:function(data){
   $('#mainp').html(data);
   }
   });
}

function validatenum(a){
    var numexp=/^[0-9]+$/;
    if($("#" + a).val().match(numexp)){
        $("#"+a).css({'border' : 'solid #75c5cf 1px'});
        return true;
    }else{
        $("#"+a).css({'border' : 'solid #D46752 2px'});
        var str=$("#"+a).val();
        var b=str.length;
        b=b-1;
        var g=str.substr(0,b);
        $("#"+a).val(g);
        
    }
}



function addnewpat(){
   var regn=$('#regn').val();
   var regnid=$('#regnid').val();
   var name=$('#fname').val();
   var lname=$('#lname').val();
   var oname=$('#oname').val();
   var fourthname=$('#fourthname').val();
   var dob=$('#dob').val();
   var age=$('#age').val();
   var gender = $('input[name=gender]:checked').val();
   var stream=$('#stream').val();
   var phone2=$('#phone2').val();
   var house=$('#house').val();
   var course=$('#course').val();
   var gname=$('#gname').val();
   var rship=$('#rship').val();
   var gphone=$('#gphone').val();
   var geno=$('#geno').val();
   var gaddress=$('#gaddress').val();
   var bgroup=$('#bgroup').val();
   var alergy=$('#alergy').val();
   var tcr=$('#tcr').val();
   var tdr=$('#tdr').val();
   var cardno=$('#ref76').val();
   var company=$('#company').val();
   var insid=$('#insid').val();
   var insname=$('#insname').val();
   var image=$('#stamp').val();
   var typeclinics=$('#typeclinics').val();
   var acctype=$('#acctype').val();
   var patcategory=$('#patcategory').val();
   var old_patient_id=$('#old_patient_id').val();

   // var x = document.getElementById['txtCardNumber'].value;
   // if (x.length < 5) {
   //  alert('please enter at least 5 characters');
   //  return false;
   // }
   
   // if (document.getElementById(txtCardNumber).value.length < 5) {
   //  alert('please enter at least 5 characters');
   //  return false;
   // }

   if(regn==''||name==''||oname==''||age==''||stream==''||regnid==''||typeclinics==''||acctype==''){
   $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
      e.preventDefault();  
   }
   // else if (regnid.length < 10) {
   //    $().customAlert();
   //    alert('Error!', '<p>ID Number requires at least 8 digits!</p>');
   //    e.preventDefault();  
   //  return false;
   // }
   else if (stream.length < 10) {
      $().customAlert();
      alert('Error!', '<p>Phone No requires at least 10 digits!</p>');
      e.preventDefault();  
    return false;
   }
   else if (gphone.length < 10) {
      $().customAlert();
      alert('Error!', '<p>Next Of Kin Phone No requires at least 10 digits!</p>');
      e.preventDefault();  
    return false;
   }
   else{ 
   $("#newstudent").html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:'1.1',regn:regn,regnid:regnid,name:name,oname:oname,lname:lname,dob:dob,age:age,gender:gender,stream:stream,house:house,course:course,gname:gname,rship:rship,gphone:gphone,phone2:phone2,geno:geno,gaddress:gaddress,bgroup:bgroup,alergy:alergy,tcr:tcr,tdr:tdr,insid:insid,insname:insname,image:image,cardno:cardno,company:company,fourthname:fourthname,typeclinics:typeclinics,acctype:acctype,old_patient_id:old_patient_id,patcategory:patcategory},
   success:function(data){
      $('#newstudent').html(data);
   
   }
   });
   }
}

function addnewcustompat(){
   var regn=$('#regn').val();
   var regnid=$('#regnid').val();
   var name=$('#fname').val();
   var lname=$('#lname').val();
   var oname=$('#oname').val();
   var fourthname=$('#fourthname').val();
   var dob=$('#dob').val();
   var age=$('#age').val();
   var gender = $('input[name=gender]:checked').val();
   var stream=$('#stream').val();
   var phone2=$('#phone2').val();
   var house=$('#house').val();
   var course=$('#course').val();
   var gname=$('#gname').val();
   var rship=$('#rship').val();
   var gphone=$('#gphone').val();
   var geno=$('#geno').val();
   var gaddress=$('#gaddress').val();
   var bgroup=$('#bgroup').val();
   var alergy=$('#alergy').val();
   var tcr=$('#tcr').val();
   var tdr=$('#tdr').val();
   var cardno=$('#ref76').val();
   var company=$('#company').val();
   var insid=$('#insid').val();
   var insname=$('#insname').val();
   var image=$('#stamp').val();
   var numexp=/^[0-9]+$/;
   var typeclinics=$('#typeclinics').val();
   var acctype=$('#acctype').val();
   var send_to_dept_id=$('#sendto').val();
   var temp=$('#temp').val();
   var bp1=$('#bp1').val();
   var bp2=$('#bp2').val();
   var weight=$('#weight').val();
   var resprate=$('#resprate').val();
   var pulserate=$('#pulserate').val();
   var rbs=$('#rbs').val();
   var patcategory=$('#patcategory').val();
   var old_patient_id=$('#old_patient_id').val();
   var newscreening=$('input[name=gender2]:checked').val();
   var knownhyper=$('input[name=gender3]:checked').val();
   var takingmeds=$('input[name=gender4]:checked').val();
   if(regn==''||name==''||oname==''||age==''||typeclinics==''||acctype==''||send_to_dept_id==''){
   $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
      e.preventDefault();  
   }
   // else if(instatus==''){
   //    //var instatus="Companies";
   //    $().customAlert();
   //    alert('Error!', '<p>Select mode of payment!</p>');
   //    $('#currentins').parent().find('input:first').focus();
   // }
   
   else{ 
   $("#newstudent").html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:3,regn:regn,regnid:regnid,name:name,oname:oname,lname:lname,dob:dob,age:age,gender:gender,stream:stream,house:house,course:course,gname:gname,rship:rship,gphone:gphone,
   phone2:phone2,geno:geno,gaddress:gaddress,bgroup:bgroup,alergy:alergy,tcr:tcr,tdr:tdr,insid:insid,insname:insname,image:image,cardno:cardno,company:company,fourthname:fourthname,
   typeclinics:typeclinics,temp:temp,bp1:bp1,bp2:bp2,weight:weight,resprate:resprate,pulserate:pulserate,rbs:rbs,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,old_patient_id:old_patient_id,acctype:acctype,send_to_dept_id:send_to_dept_id,patcategory:patcategory},
   success:function(data){
      $('#newstudent').html(data);
   
   }
   });
   }
}


function addnewemergencypat(){
   var regn=$('#regn').val();
   var regnid=$('#regnid').val();
   var name=$('#fname').val();
   var lname=$('#lname').val();
   var oname=$('#oname').val();
   var fourthname=$('#fourthname').val();
   var dob=$('#dob').val();
   var age=$('#age').val();
   var gender = $('input[name=gender]:checked').val();
   var stream=$('#stream').val();
   var phone2=$('#phone2').val();
   var house=$('#house').val();
   var course=$('#course').val();
   var gname=$('#gname').val();
   var rship=$('#rship').val();
   var gphone=$('#gphone').val();
   var geno=$('#geno').val();
   var gaddress=$('#gaddress').val();
   var bgroup=$('#bgroup').val();
   var alergy=$('#alergy').val();
   var tcr=$('#tcr').val();
   var tdr=$('#tdr').val();
   var cardno=$('#ref76').val();
   var company=$('#company').val();
   var insid=$('#insid').val();
   var insname=$('#insname').val();
   var image=$('#stamp').val();
   var numexp=/^[0-9]+$/;
   //var numexp=/^[0-9]+$/;
   var typeclinics=$('#typeclinics').val();
   var acctype=$('#acctype').val();
   var temp=$('#temp').val();
   var bp1=$('#bp1').val();
   var bp2=$('#bp2').val();
   var weight=$('#weight').val();
   var resprate=$('#resprate').val();
   var pulserate=$('#pulserate').val();
   var rbs=$('#rbs').val();
   var ItemCode=$('#ItemCode').val();
   var ItemName=$('#ItemName').val();
   var Category=$('#Category').val();
   var SalePrice=$('#SalePrice').val();
   var instatus=$('#newreg76').val();
   var oldpatientid=$('#oldpatientid').val();
   var old_category_id=$('#old_category_id').val();
   var patcategory=$('#patcategory').val();
   var newscreening=$('input[name=gender2]:checked').val();
   var knownhyper=$('input[name=gender3]:checked').val();
   var takingmeds=$('input[name=gender4]:checked').val();
    //var instatus = $('input[name=instatus]:checked').val();
    //if(instatus!=1){instatus="Cash"}
    //if(instatus==1){instatus="Companies"}newreg76

   if(regn==''||name==''||oname==''||age==''||stream==''||regnid==''||typeclinics==''||temp==''||bp1==''||bp2==''||pulserate==''||acctype==''){
   $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
      e.preventDefault();  
   }else if(instatus==''){
      //var instatus="Companies";
      $().customAlert();
      alert('Error!', '<p>Select mode of payment!</p>');
      $('#currentins').parent().find('input:first').focus();
   }
   
   else{ 
   $("#newstudent").html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:4,regn:regn,regnid:regnid,name:name,oname:oname,lname:lname,dob:dob,age:age,gender:gender,stream:stream,house:house,course:course,gname:gname,rship:rship,gphone:gphone,phone2:phone2,geno:geno,gaddress:gaddress,bgroup:bgroup,alergy:alergy,tcr:tcr,tdr:tdr,insid:insid,insname:insname,image:image,cardno:cardno,company:company,fourthname:fourthname,typeclinics:typeclinics,temp:temp,bp1:bp1,bp2:bp2,weight:weight,resprate:resprate,pulserate:pulserate,rbs:rbs,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,ItemCode:ItemCode,ItemName:ItemName,Category:Category,SalePrice:SalePrice,instatus:instatus,oldpatientid:oldpatientid,old_category_id:old_category_id,acctype:acctype,patcategory:patcategory},
   success:function(data){
      $('#newstudent').html(data);   
   }
   });
   }
}

function addnewobstetric(a){
   var clientid=$('#old_patient_id').val();
   var prescid=$('#old_presc_id').val();
   var patid=$('#patid').val();
   var prescno=$('#prescno').val();
   var gravida=$('#gravida').val();
   var para=$('#para').val();
   var alive=$('#alive').val();
   var dead=$('#dead').val();
   var abortion=$('#abortion').val();
   var gestation=$('#gestation').val();
   var stillbirth=$('#stillbirth').val();
   var caesarean=$('#caesarean').val();
   var vacuum=$('#vacuum').val();
   var lmp=$('#lmp').val();
   var edd=$('#edd').val();
   var aph=$('#aph').val();
   var pph=$('#pph').val();
   var prollabour=$('#prollabour').val();
   var fundalheight=$('#fundalheight').val();
   var engagement=$('#engagement').val();
   var fatalheart=$('#fatalheart').val();
   var reasonfordoing=$('#reasonfordoing').val();
   var cervicalcondition=$('#cervicalcondition').val();
   var dilatation=$('#dilatation').val();
   var membranes=$('#membranes').val();
   var draining=$('#draining').val();
   var presentation=$('#presentation').val();
   var wkposition=$('#wkposition').val();
   var contractions=$('#contractions').val();
   var presenting=$('#presenting').val();
   var minlevel=$('#minlevel').val();
   var minposition=$('#minposition').val();
   var pelvis=$('#pelvis').val();
   var otherremarks=$('#other_remarks').val();

   if(gravida==''||para==''||alive==''||dead==''||abortion==''||gestation==''||stillbirth==''||caesarean==''||vacuum==''||lmp==''||edd==''||aph==''){
   $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
      e.preventDefault();  
   }else if(pph==''||prollabour==''||engagement==''||fatalheart==''||reasonfordoing==''||cervicalcondition==''||dilatation==''||membranes==''||draining==''||presentation==''||wkposition==''||contractions==''||presenting==''||minlevel==''){
      $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
   }
   
   else{ 
   $("#nwpatientreg").html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:11,a:a,gravida:gravida,para:para,alive:alive,dead:dead,abortion:abortion,gestation:gestation,stillbirth:stillbirth,caesarean:caesarean,vacuum:vacuum,lmp:lmp,edd:edd,aph:aph,pph:pph,prollabour:prollabour,fundalheight:fundalheight,engagement:engagement,fatalheart:fatalheart,reasonfordoing:reasonfordoing,cervicalcondition:cervicalcondition,dilatation:dilatation,membranes:membranes,draining:draining,presentation:presentation,wkposition:wkposition,contractions:contractions,presenting:presenting,minlevel:minlevel,minposition:minposition,pelvis:pelvis,otherremarks:otherremarks,clientid:clientid,prescid:prescid,patid:patid,prescno:prescno},
   success:function(data){
      $('#nwpatientreg').html(data);   
   }
   });
   }
}

function editobstetric(a){
   var obstetricsid=$('#obstetrics_id').val();
   var clientid=$('#old_patient_id').val();
   var prescid=$('#old_presc_id').val();
   var patid=$('#patid').val();
   var prescno=$('#prescno').val();
   var gravida=$('#gravida').val();
   var para=$('#para').val();
   var alive=$('#alive').val();
   var dead=$('#dead').val();
   var abortion=$('#abortion').val();
   var gestation=$('#gestation').val();
   var stillbirth=$('#stillbirth').val();
   var caesarean=$('#caesarean').val();
   var vacuum=$('#vacuum').val();
   var lmp=$('#lmp').val();
   var edd=$('#edd').val();
   var aph=$('#aph').val();
   var pph=$('#pph').val();
   var prollabour=$('#prollabour').val();
   var fundalheight=$('#fundalheight').val();
   var engagement=$('#engagement').val();
   var fatalheart=$('#fatalheart').val();
   var reasonfordoing=$('#reasonfordoing').val();
   var cervicalcondition=$('#cervicalcondition').val();
   var dilatation=$('#dilatation').val();
   var membranes=$('#membranes').val();
   var draining=$('#draining').val();
   var presentation=$('#presentation').val();
   var wkposition=$('#wkposition').val();
   var contractions=$('#contractions').val();
   var presenting=$('#presenting').val();
   var minlevel=$('#minlevel').val();
   var minposition=$('#minposition').val();
   var pelvis=$('#pelvis').val();
   var otherremarks=$('#other_remarks').val();

   if(gravida==''||para==''||alive==''||dead==''||abortion==''||gestation==''||stillbirth==''||caesarean==''||vacuum==''||lmp==''||edd==''||aph==''){
   $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
      e.preventDefault();  
   }else if(pph==''||prollabour==''||engagement==''||fatalheart==''||reasonfordoing==''||cervicalcondition==''||dilatation==''||membranes==''||draining==''||presentation==''||wkposition==''||contractions==''||presenting==''||minlevel==''){
      $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
   }
   
   else{ 
   $("#nwpatientreg").html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:11,a:a,gravida:gravida,para:para,alive:alive,dead:dead,abortion:abortion,gestation:gestation,stillbirth:stillbirth,caesarean:caesarean,vacuum:vacuum,lmp:lmp,edd:edd,aph:aph,pph:pph,prollabour:prollabour,fundalheight:fundalheight,engagement:engagement,fatalheart:fatalheart,reasonfordoing:reasonfordoing,cervicalcondition:cervicalcondition,dilatation:dilatation,membranes:membranes,draining:draining,presentation:presentation,wkposition:wkposition,contractions:contractions,presenting:presenting,minlevel:minlevel,minposition:minposition,pelvis:pelvis,otherremarks:otherremarks,clientid:clientid,prescid:prescid,patid:patid,prescno:prescno,obstetricsid:obstetricsid},
   success:function(data){
      $('#nwpatientreg').html(data);   
   }
   });
   }
}

function addBldTransfusse(a){
   var clientid=$('#old_patient_id').val();
   var clientno=$('#in_customer_no').val();
   var patname=$('#patname').val();
   var prescid=$('#old_presc_id').val();
   var prescno=$('#prescno').val();
   var age=$('#age').val();

   var in_batch_no=$('#in_batch_no').val();
   var bgroup=$('#bgroup').val();
   //var bgroup=$('#bgroup option:selected').text();
   var bgrouptype=$('#bgrouptype').val();
   var startime=$('#startime').val();

   var temp=$('#btemp').val();
   var bp1=$('#bp1').val();
   var bp2=$('#bp2').val();
   var pr=$('#pr').val();
   var diagnosis=$('#other_diagnosis_remarks').val();
   var reason=$('#transfussion_reason').val();
   var counter_checker=$('#counter_checker').val();
   var volume=$('#volume').val();
   var per_prescription_remarks=$('#per_prescription_patient_remarks').val();
   var patient_condition_remarks=$('#remarks_on_patient_condition_after_transfussion').val();

   console.log(clientno);

   if(age==''||in_batch_no==''||bgroup==''||bgrouptype==''||startime==''||temp==''||bp1==''||bp2==''||pr==''||diagnosis==''||reason==''||counter_checker==''||volume==''){
   $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
      e.preventDefault();  
      return;
   }else if(clientid==''||prescid==''||clientno==''||patname==''||prescno==''){
      $().customAlert();
      alert('Error!', '<p>Make sure you fill all the required details!</p>');
      e.preventDefault();
      return;
   }
   
   else{ 
   $("#btransfussion").html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:14,a:a,clientno:clientno,age:age,in_batch_no:in_batch_no,bgroup:bgroup,bgrouptype:bgrouptype,startime:startime,temp:temp,bp1:bp1,bp2:bp2,pr:pr,diagnosis:diagnosis,reason:reason,counter_checker:counter_checker,volume:volume,clientid:clientid,prescid:prescid,patname:patname,prescno:prescno,per_prescription_remarks:per_prescription_remarks,patient_condition_remarks:patient_condition_remarks},
   success:function(data){
      $('#btransfussion').html(data);   
   }
   });
   }
}

function sendconfirmation(code,itcode,slcode,qty,rcptno,d1,d2){
   $('#sendnotice' + code).html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:5,code:code,itcode:itcode,slcode:slcode,qty:qty,rcptno:rcptno,d1:d1,d2:d2},
   success:function(data){
   $('#displaymes').html(data);
   }
   });
}


function sendBillToCashier(){
var rcptno = $('#rcptno').val();
var clientno = $('#clientno').val();
var clientname = $('#clientname').val();

if(rcptno==''||clientno==''){
$().customAlert();
alert('Error!', '<p>No client selected!</p>');
e.preventDefault();
} else{
   $('#displaymes').html(loader);
   $.ajax({
   url:'data_rep.php',
   data:{id:6,rcptno:rcptno,clientno:clientno,clientname:clientname},
   success:function(data){
       $('#displaymes').html(data);
      }
   });   
  }   
}

function checkItemStatus(rcptno){
 // $('#cusid').val(cusid);
 //  $('#climit').val(climit);
  $().customAlert();
   alert('Error', '<p>No changing or deleting. Item already paid for. Receipt No. ' + rcptno + '</p>');
   e.preventDefault();
}
function checkIPDOPDStatus(rcptno){
  $().customAlert();//you cant issues drugs twice
   alert('Error', '<p>Already dispensed. You can`t dispense twice. Department. ' + rcptno + '</p>');
   e.preventDefault();
}


// function saveledg23sder(code){
//    var type=$('#type' + code).val();
//    var bal=$('#bal' + code).val();
//    $('#save' + code).html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:25%; left:50%" alt="Loading"/>');
//    $.ajax({
//    url:'data.php',
//    data:{id:'31.2',code:code,type:type,bal:bal},
//    success:function(data){
//    $('#save' + code).html(data);
//    }
//    });
// }

function abouttoexpiry(){
   $("#mainp").html(loader);
   $.ajax({
   url:'bridgerep.php',
   data:{id:14},
   success:function(data){
   $('#mainp').html(data);
   }
   });
}

function abouttoexpiry2(){
   $("#mainp").html(loader);
   $.ajax({
   url:'bridgerep.php',
   data:{id:'14.1'},
   success:function(data){
   $('#mainp').html(data);
   }
   });
}

// function abouttoexpiry2(){
//    $("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
//    $.ajax({
//    url:'bridgerep.php',
//    data:{id:2},
//    success:function(data){
//    $('#mainp').html(data);
//    }
//    });
// }

// function abouttoexpiry3(){
//    $("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
//    $.ajax({
//    url:'bridgerep.php',
//    data:{id:5},
//    success:function(data){
//    $('#mainp').html(data);
//    }
//    });
// }

function recordexpiry(code,ptransid){
   var expdqty = $('#expiredqty'+code).val();

   if(expdqty==''){
         $().customAlert();
         alert('Error!', '<p>Enter the quantity!</p>');
         //$('#unit57').focus();
   }

   else{
      $('#display').html(loader);
      $.ajax({
      url:'data_rep.php',
      data:{id:7,code:code,ptransid:ptransid,expdqty:expdqty},
         success:function(data){
         $('#display').html(data);
         }
         });
      
   }
}


$("#nwitem44444444444" ).combobox({
   select: function(event,ui){
    var schem24 = $('#insurancescheme').val();
    //var schem24 = $('#actype').val();
    var str = $('#nwitem44').val();
    var parts=str.split('θ',8);
    //$('#price44').val(parts[0]);
    $('#red').val(parts[1]);
    $('#code').val(parts[2]);
    $('#categ').val(parts[3]);
    $('#bal44').val(parts[4]);
    $('#type44').val(parts[5]);
      if(schem24=='Normal'||schem24==''||schem24=='empty string'){ 
          $('#price44').val(parts[0]);
            if($('#quat44').val()!=''){
            var quat = $('#quat44').val();
            var tot=parts[0] * quat;
            }
      } else if (schem24=='Corporate'){
          $('#price44').val(parts[6]);
            if($('#quat44').val()!=''){
            var quat = $('#quat44').val();
            var tot=parts[6] * quat;
            }
      }else {
          $('#price44').val(parts[7]);
            if($('#quat44').val()!=''){
            var quat = $('#quat44').val();
            var tot=parts[7] * quat;
            }
      }
   sot=(tot).formatMoney(2, '.', ',');
   $('#tprice').val(sot);
   $('#sub44').val(sot);
   $('#quat44').focus();
   
   }
});


// $(document).ready(function(){
//    $("#itemname7" ).combobox({
//       select: function(event,ui){
//        var str = $('#itemname7').val();
//        var parts=str.split('θ',6)
//          var itemp=parts[0];
//          var vat=parts[1];
//          var code=parts[2];
//          var itcost=parts[3];
//          var bal=parts[4];
//          var name=parts[5];
//     $('#total').val('');
//       $('#disc').val('');
//       $('#price').val(itemp);
//       $('#code').val(code);
//       $('#itcost').val(itcost);
//       $('#vat').val(vat);
//       $('#bal').val(bal);
//       $('#itname7').val(name);
//       if($('#quat').val()!=''){
//       var quat = $('#quat').val();
//       var tot=itemp * quat;
//       sot=(tot).formatMoney(2, '.', ',');
//       $('#tprice').val(sot);
//       vat=vat * quat;
//       tot=parseInt(tot,10) + parseInt(vat,10);
//       tot=(tot).formatMoney(2, '.', ',');
//       $('#total').val(tot);
//       vat=(vat).formatMoney(2, '.', ',');
//       $('#tvat').val(vat);
//       }
//       $('#quat').focus();
//     }
//    });
// });

// $(document).ready(function(){
//    // $("#consfee" ).combobox({});
//    // $("#income44" ).combobox({});
//    // $("#txtextmedicinc" ).combobox({});
//    $("#docInpPharm133" ).combobox({
//       select: function(event,ui){
//        var str = $('#docInpPharm1').val();
//        var parts=str.split('θ',10);
//        $('#txtproductcode').val(parts[0]);
//        $('#dname').val(parts[1]);
//        $('#txtprnormal').val(parts[2]);
//        $('#txtprcorporate').val(parts[3]);
//        $('#txtprinsurance').val(parts[4]);
//        $('#lcmhcateg').val(parts[5]);
//        $('#lcmhtype').val(parts[6]);
//        $('#dbal').val(parts[7]);
//        $('#txtcatid').val(parts[8]);


//          if($('#quat4dr34').val()!=''){
//             var txtqty = $('#quat4dr34').val();
//             if($('#txtacctype').val()=='insurance'){
//                var tot=parts[4] * txtqty;
//             }else if($('#txtacctype').val()=='Corporate'){
//                var tot=parts[3] * txtqty;
//             }else{
//                  var tot=parts[2] * txtqty;
//             }
//             sot=(tot).formatMoney(2, '.', ',');
//             $('#lcmhtprice').val(sot);
//             $('#lcmhsub44').val(sot);
//          }

//          $('#quat4dr34').focus();
      
//        }
//    });
// });



// $("#item45" ).combobox({
//    select: function(event,ui){
//     var str = $('#item45').val();
//     var parts=str.split('θ',11);
//     $('#price45').val(parts[0]);
//     $('#red45').val(parts[1]);
//     $('#code45').val(parts[2]);
//     $('#categ45').val(parts[3]);
//     $('#bal45').val(parts[4]);
//     $('#type45').val(parts[5]);
//     $('#txtcatid45').val(parts[6]);
//     $('#txtprcorporate45').val(parts[7]);
//     $('#txtprinsurance45').val(parts[8]);
//       if($('#quat45').val()!=''){
//          var txtqty = $('#quat45').val();
//          if($('#txtacctype').val()=='insurance'){
//             var tot=parts[8] * txtqty;
//          }else if($('#txtacctype').val()=='Corporate'){
//             var tot=parts[7] * txtqty;
//          }else{
//               var tot=parts[0] * txtqty;
//          }
//          sot=(tot).formatMoney(2, '.', ',');
//          $('#tprice45').val(sot);
//          $('#sub45').val(sot);
//       }

   
//    $('#quat45').focus();
   
//     }
// });



   // if($('#txtprinsurance45').val(parts[8])==''||$('#txtprinsurance45').val(parts[8])==0){
   //    $().customAlert();
   //    alert('Error!', '<p>You must update all the prices of this item or talk to some who can!</p>');
   //    $('#item45').focus();
   // }
   // if($('#price45').val(parts[0])==''||$('#price45').val(parts[0])==0||$('#txtprcorporate45').val(parts[7])==''||$('#txtprcorporate45').val(parts[7])==0||$('#txtprinsurance45').val(parts[8])==''||$('#txtprinsurance45').val(parts[8])==0){
   //    $().customAlert();
   //    alert('Error!', '<p>You must update all the prices of this item or talk to some who can!</p>');
   //    $('#item45').focus();
   // }


 
// $("#item45" ).combobox({
//    select: function(event,ui){
//     var str = $('#item45').val();
//     var parts=str.split('θ',10);
//     //$('#price45').val(parts[0]);
//     $('#red45').val(parts[1]);
//     $('#code45').val(parts[2]);
//     $('#categ45').val(parts[3]);
//     $('#bal45').val(parts[4]);
//     $('#type45').val(parts[5]);
//     $('#txtcatid45').val(parts[6]);
//     var prcorporate45 = $('#txtprcorporate45').val(parts[7]);
//     var prinsurance45 = $('#txtprinsurance45').val(parts[8]);

//    if(prinsurance45==0||prinsurance45==''){
//       $().customAlert();
//       alert('Error!', '<p>You must update all the prices of this item or talk to some who can!</p>');
//       $('#item45').focus();
//    }

//    if(prcorporate45==0||prcorporate45==''){
//       $().customAlert();
//       alert('Error!', '<p>You must update all the prices of this item or talk to some who can!</p>');
//       $('#item45').focus();
//    }

//       // if($('#quat45').val()!=''){
//       //    var txtqty = $('#quat45').val();
//       //    if($('#txtacctype').val()=='insurance'){
//          //    $('#price45').val(parts[8]);
//       //       var tot=parts[8] * txtqty;
//       //    }else if($('#txtacctype').val()=='Corporate'){
//          //    $('#price45').val(parts[7]);
//       //       var tot=parts[7] * txtqty;
//       //    }else{
//          //       $('#price45').val(parts[0]);
//       //         var tot=parts[0] * txtqty;
//       //    }
//       //    sot=(tot).formatMoney(2, '.', ',');
//       //    $('#tprice45').val(sot);
//       //    $('#sub45').val(sot);
//       // }

   
//    $('#quat45').focus();
   
//     }
// });

function searchreturntostock(){
   var searchdata =  $('#rcptno').val();
      if(searchdata!=''){
      $('#display').html('<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">');
      $('#display').html(loader);
   $.ajax({
      url:'budget.php',
      data:{id:5,searchdata:searchdata},
      success:function(data){
      $('#display').html(data);
      }
      });   
   }
      
}
function qtykeyupreturntostock(code) {
   var iqty = $('#iqty' + code).html();
   var rqty = $('#rqty' + code).val();
   var price = $('#price' + code).html();
   var iqty =parseInt(iqty,10);
   var rqty =parseInt(rqty,10);
   if(rqty>iqty){
      $().customAlert();
      alert('Error!', '<p>Invalid Return quantity. Cannot return more than purchased!</p>');
      e.preventDefault();
   }
   else{
   $('#rtot' + code).html('');
   $('#remqty' + code).html('');
   if(rqty>0){
      remqty=iqty-rqty;
      $('#remqty' + code).html(remqty);
      rtot=price * rqty;
      rtot=(rtot).formatMoney(2, '.', ',');
      $('#rtot' + code).html(rtot);
   }
   }
   }
   

function addcreditreturntostock(code,tno){
   var name = $('#name' + code).html();
   var rquat = $('#rqty' + code).val();
   var price = $('#price' + code).html();
   var rtot = $('#rtot' + code).html();
   var quat = $('#iqty' + code).html();
   var remquat = $('#remqty' + code).html();
   var rquat =parseInt(rquat,10);
   if(rquat>0){
   $('#add' + code).html(loader);
$.ajax({
   url:'budget.php',
   data:{id:6,code:code,name:name,price:price,rtot:rtot,quat:quat,remquat:remquat,rquat:rquat,tno:tno},
   success:function(data){
    $('#add' + code).html(data);
   }
   });
   }
   else{
   $().customAlert();
      alert('Error!', '<p>Invalid Return quantity. Must at least return one unit!</p>');
      e.preventDefault();  
   
   }
}

function iscreditreturntostock(){
   var rcptno = $('#rcptno').val();
   var rtot = $('#retotal').val();
   rtot=rtot.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
   rtot =parseInt(rtot,10);
   if(rtot>0){
      $('#display').html(loader);
$.ajax({
   url:'data_rep.php',
   data:{id:10,rcptno:rcptno,alltot:rtot},
   success:function(data){
    $('#display').html(data);
   }
   });
   }
   else{
   $().customAlert();
      alert('Error!', '<p>Invalid Return quantity. Must at least return one unit!</p>');
      e.preventDefault();  
   
   }

}



function clear_txtboxes_to_prevent_a_user_from_still_adding_an_item_to_the_cart_after_invalid_bill_notification(){

}

function clr_theatre_txtboxes_after_invalid_bill_notification(){

}
function clrgeneralorder_txtboxes_after_invalid_bill_notification(){
   $('#disc44').val('0');  
   $('#price44').val('');
   $('#code').val('');
   $('#quat44').val(1);
   $('#tprice').val('');
   $('#sub44').val('');
   $('#income44').val('');
   //$('#datepick').val('');
   $('#txtcoverage').val('');
   //$("#generalorder834nocap").parent().find("input:first").val('').focus();
   $("#generalorder834").parent().find("input:first").val('').focus();
   //exit;
}
function clrlaboratory_txtboxes_after_invalid_bill_notification(){
   $('#disc44').val('0');  
   $('#price44').val('');
   $('#tprice').val('');
   $('#sub44').val('');
   $('#income44').val('');
   $('#txtcoverage').val('');
   $("#orderitem44").parent().find("input:first").val('').focus();
}
function clrultrasound_txtboxes_after_invalid_bill_notification(){
   $('#disc45').val('0');  
   $('#price45').val('');
   $('#tprice45').val('');
   $('#sub45').val('');
   $('#income45').val('');
   $('#txtcoverage').val('');
   $("#item45").parent().find("input:first").val('').focus();
}
function clrdresserdisp_txtboxes_after_invalid_bill_notification(){
   $('#disc606').val('0'); 
   $('#price606').val('');
   $('#tprice606').val('');
   $('#sub606').val('');
   $('#income606').val('');
   $('#txtcoverage').val('');
   $("#order606").parent().find("input:first").val('').focus();
}
function clrtheatre_txtboxes_toprompt_selectitem_after_invalidbill(){
   $('#quat834').val(1);
   $('#disc834').val('0'); 
   $('#price834').val('');
   $('#tprice834').val('');
   $('#sub834').val('');
   $('#income834').val('');
   $('#txtcoverage').val('');
   $("#orderitem834").parent().find("input:first").val('').focus();
}
function clrpharmbill_txtboxes_toprompt_selectitem_after_invalidbill(){
   $("#item4").parent().find("input:first").val('').focus();
   //$('#quat').val(1);   
   $('#quat').val();   
   $('#price').val('');     
   $('#tprice').val('');     
   $('#total').val('');     
   $('#totitems').val('');     
   $('#totprice').val('');    
   $('#tvat').val('');      
   $('#totvat').val('');     
   $('#disc').val(0);     
   $('#totdisc').val(0);     
   $('#fintot').val('');     
   $('#dr7').val('');
   $('#dr9').val('');
   $('.dr').parent('').find("input:first").val('');   
}

function clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill(){
   $('#quat4dr34').val(1);
   //$('#quat4dr34').val('');
   $('#txtdisc').val(0); 
   $('#txtproductcode').val('');
   $('#dname').val('');
   $('#txtprinsurance').val('');
   $('#txtprcorporate').val('');
   $('#txtprnormal').val('');
   $('#lcmhtotal44').val('');
   $('#lcmhtprice').val('');
   $('#lcmhsub44').val('');
   $('#txtcoverage').val('');
   $('#txtproductcode').val('');
   $('#dname').val('');
   //$('#docInpPharm1').val('');
   $("#docInpPharm1").parent().find("input:first").val('').focus();

      $("#docInpPharm1").parent().find("input:first").val('').focus();
      $("#docInpPharm1").parent().find("input:first").val('').focus();
      //$('#docInpPharm1').val('');
      //$('#docInpPharm1').parent().find("input:first").focus();  
}


