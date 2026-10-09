// Convert numbers to words
// copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
// permission to use this Javascript on your web page is granted
// provided that all of the code (including this copyright notice) is
// used exactly as shown (you can change the numbering system if you wish)

// American Numbering System
var th = ['','thousand','million', 'billion','trillion'];
// uncomment this line for English Number System
// var th = ['','thousand','million', 'milliard','billion'];

var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}

// Convert figures to money values
Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 }; 

var loader = '<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>';
//var loader = loader;
//var loader = loader;

$(function() {
	$( "#tabs" ).tabs();
	$( "#tabs4" ).tabs();
	$( "#tabs5" ).tabs();
	$( "#tabs6" ).tabs();
	$( "#tabs7" ).tabs();
	$( "#tabs8" ).tabs();
	$( "#tabs9" ).tabs();
	  $( "#consultabs6" ).tabs(); $( "#pharmtabs7" ).tabs(); $( "#labtabs8" ).tabs(); $( "#radtabs9" ).tabs(); $( "#theatabs6" ).tabs();  $( "#dressertabs18" ).tabs(); $( "#phcdiagnosis606" ).tabs();

});
	
$(document).ready(function(){ 
// $(".combos" ).combobox({});

	$( "#item1" ).combobox({
		select: function(event,ui){
		 var param = $('#item1').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:1,param:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
	$('#item1').parent().find('input:first').focus().width(180);
   $('#paciente606').parent().find('input:first').width(150);




	$("#item2" ).combobox({
		select: function(event,ui){
		 var param = $('#item2').val();
			paginate(2,param);
		}
	});
	$("#item22" ).combobox({
		select: function(event,ui){
		 var param = $('#item22').val();
			paginate(14,param);
		}
	});


	$("#item3" ).combobox({
		select: function(event,ui){
		 var param = $('#item3').val();
		 var med = $('#medication').val();	
		 med=med + '' + param + '-';
		 $('#medication').val(med).focus;
		
		}
	});
	$("#bedno" ).combobox({});
	$( "#pnt1" ).combobox({
		select: function(event,ui){
		 var param = $('#pnt1').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:2,param:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
	$('#pnt1').parent().find('input:first').focus().width(180);

	$( ".pnt2" ).combobox({
		select: function(event,ui){
		 var m = $('#menusearch').val();
		 var param = $('#pnt2' + m).val();
		paginate(4,param);
		}
	});



});
// $(function() { });

function getorder(prescid,prescno,clientid,code,id){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
      $().customAlert();
      alert('Error!', '<p>Enter the From and To dates!</p>');
      e.preventDefault();
}
else {
 $("#mainp").html(loader);
   $.ajax({
      url:'bridgerep.php',
      data:{id:id,prescid:prescid,prescno:prescno,clientid:clientid,code:code,d1:d1,d2:d2},
      success:function(data){
         $('#mainp').html(data);
      }
   });   
}
}
function finditem(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:1,param:'default'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function findinvoice(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:49,param:'default'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function findpatient(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:2,param:'default'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function sachpatient(){

		var param = $('#parametersearch2').val();
		var menu = $('#menusearch').val();
		if (param!=''){ 
		paginatesub(4.1,param,1,menu);	
		}

}

function findDischargeSum(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:183,param:'default'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function srchdischarg(){

		var param = $('#parametersearch2').val();
		var menu = $('#menusearch').val();
		if (param!=''){ 
		paginatesub(22,param,1,menu);	
		}

}
function buscarDischargeSum(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:184,param:'default'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
// function viewcateg(){
// 	var param = $('#menusearch').val();
// 	paginate(24,param);
// }
function viewdischargcateg(){
		var param = $('#parametersearch2').val();
		var menu = $('#menusearch').val();
		if (param!=''){ 
		paginatesub(25,param,1,menu);	
		}
}
function buscarInpatient(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:185,param:'default'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function viewInpatient(){
		var param = $('#parametersearch2').val();
		var menu = $('#menusearch').val();
		if (param!=''){ 
		paginatesub(28,param,1,menu);	
		}
}
function modal(){
	$( "#dialog-message" ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
					$('#itemname').focus();
				}
			}
		});
		$("#dialog-message").html('<p style="font-size:12px">Select an item first</p>');
}
function makeanorder(){
	var a='0.8';
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function pharmacyadjustment(){
	$("#mainp").html(loader);
	$.ajax({
	url:'budget.php',
	data:{id:2},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function makeasale(){
	var a='0.7';
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function cssdbill(){
	var a='0.8';
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function abouttoexpiry2(){
	$("#mainp").html(loader);
	$.ajax({
	url:'budget.php',
	data:{id:7},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function undispensedrugs(){ 
	$("#mainp").html(loader);
	$.ajax({
	url:'budget.php',
	data:{id:8},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

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
		data:{id:12,code:code,ptransid:ptransid,expdqty:expdqty},
			success:function(data){
			$('#display').html(data);
			}
			});
		
	}
}

$(document).ready(function(){
	$( "#cons1444" ).combobox({
		select: function(event,ui){
		 var param = $('#cons1444').val();
		 var d1    = $('#datepick').val();
		 var d2    = $('#datepick2').val();
       var parts=param.split('#',4)
       var prescid=parts[0];
       var prescno=parts[1];
       var clientid=parts[2];
       var clientno=parts[3];

       //console.log(code,prescno,prescid,clientid,clientno);

		if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		} else{
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:'0.1',pid:param,prescid:prescid,prescno:prescno,clientid:clientid,clientno:clientno,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		   }
		}
	});

	// $( "#cons88" ).combobox({
	// 	select: function(event,ui){
	// 	 var param = $('#cons88').val();
	// 	 var d1    = $('#datepick').val();
	// 	 var d2    = $('#datepick2').val();
   //     var parts=param.split('θ',4)
   //     var code=parts[0];
   //     var prescno=parts[1];
   //     var prescid=parts[2];
   //     var clientid=parts[3];

   //     //console.log(code,prescno,prescid,clientid);

	// 	if(d1==''||d2==''){
	// 	$().customAlert();
	// 	alert('Error!', '<p>Enter the From and To dates!</p>');
	// 	e.preventDefault();
	// 	} else{
	// 		 $("#mainp").html(loader);
	// 			$.ajax({
	// 				url:'bridgerep.php',
	// 				data:{id:12,code:code,prescno:prescno,prescid:prescid,clientid:clientid,d1:d1,d2:d2},
	// 				success:function(data){
	// 					$('#mainp').html(data); 
	// 				}
	// 			});
	// 	   }
	// 	}
	// });

	$( "#cons88" ).combobox({
		select: function(event,ui){
		 var param = $('#cons88').val();
		 var d1    = $('#datepick').val();
		 var d2    = $('#datepick2').val();
       var parts=param.split('θ',6)
       // var code=parts[0];
       // var prescno=parts[1];
       // var prescid=parts[2];
       // var clientid=parts[3];
       var prescid=parts[0];
       var prescno=parts[1];
       var clientid=parts[2];
       var code=parts[3];
       var clientno=parts[4];
       var dept4rm=parts[5];

       //console.log(code,prescno,prescid,clientid);

		if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		} else{
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridgerep.php',
					data:{id:12,code:code,prescno:prescno,prescid:prescid,clientid:clientid,dept4rm:dept4rm,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data); 
					}
				});
		   }
		}
	});
	$( "#cons14" ).combobox({
		select: function(event,ui){
		 var param = $('#cons14').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:'0.1',pid:param},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		}
	});
	$( "#cons8800" ).combobox({
		select: function(event,ui){
		 var param = $('#cons8800').val();
		 var d1    = $('#datepick').val();
		 var d2    = $('#datepick2').val();
       var parts=param.split('#',5)
       var code=parts[0];
       var prescid=parts[1];
       var prescno=parts[2];
       var clientid=parts[3];
       var clientno=parts[4];

       //console.log(code,prescno,prescid,clientid,clientno);

		if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		} else{
			 $("#mainp").html(loader);
				$.ajax({
					url:'budget.php',
					data:{id:3,pid:param,code:code,prescid:prescid,prescno:prescno,clientid:clientid,clientno:clientno,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		   }
		}
	});
	$( "#cons63" ).combobox({
		select: function(event,ui){
		 var param = $('#cons63').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:'155',pid:param},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		}
	});
	
	$("#item4" ).combobox({
		select: function(event,ui){
		 var str = $('#item4').val();
		 var parts=str.split('θ',11);
		 $('#vat').val(parts[0]);
		 $('#price').val(parts[1]);
		 $('#pr').val(parts[1]);
		 $('#red').val(parts[2]);
		 $('#code').val(parts[3]);
		 $('#itcost').val(parts[4]);
	     $('#bal').val(parts[5]);
		 $('#qsold').val(parts[6]);
		  $('#categ').val(parts[7]);
	 //var bal = $('#dbal').val();
	 //if(parts[5]==''){bal=0}
			if($('#quat').val()==''){$('#quat').val('1')}
		 
		    if($('#quat').val()!=''){
				var quat = $('#quat').val();
	         if($('#txtacctype').val()=='Insurance'){
	             $('#price').val(parts[9]);
	             var tot=parts[9] * quat;
	         }
	         else if($('#txtacctype').val()=='Corporate'){
	             $('#price').val(parts[8]);
	             var tot=parts[8] * quat;
	         }
	         else if($('#txtacctype').val()=='OTC'){
	             $('#price').val(parts[10]);
	             var tot=parts[10] * quat;
	         }
	         else{
	             $('#price').val(parts[1]);
	             var tot=parts[1] * quat;         
	         }

				//var tot=".$itemp." * quat;
				sot=(tot).formatMoney(2, '.', ',');
				$('#tprice').val(sot);
				//vat=".$vat." * quat;
				vat=parts[0] * quat;
				tot=parseInt(tot,10) + parseInt(vat,10);
				tot=(tot).formatMoney(2, '.', ',');
				$('#total').val(tot);
				vat=(vat).formatMoney(2, '.', ',');
				$('#tvat').val(vat);
			}
			$('#quat').focus();
		
		 }
	});


});

$(document).ready(function(){
	$('#quat').keyup(function() {
	var price = $('#price').val();
	var bal = $('#bal').val();
	if(bal==''){bal=0}
	var vat = $('#vat').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var quat = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tot=price * quat;
	if(parseInt(quat,10) >parseInt(bal,10) ){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Department. Bal is ' + bal + '</p>');
		$('#quat').val('');	
		return;	
	}
	sot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(sot);
	vat=vat * quat;
	tot=parseInt(tot,10) + parseInt(vat,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#total').val(tot);
	vat=(vat).formatMoney(2, '.', ',');
	$('#tvat').val(vat);
	});
});
$(document).ready(function(){
	$('#price').keyup(function() {
	var quat = $('#quat').val();
	var vat = $('#vat').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var price = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tot=price * quat;
	sot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(sot);
	vat=vat * quat;
	tot=parseInt(tot,10) + parseInt(vat,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#total').val(tot);
	vat=(vat).formatMoney(2, '.', ',');
	$('#tvat').val(vat);
	});
});


$(document).ready(function(){
	$('#disc').keyup(function() {
	var tvat = $('#tvat').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var price = $('#pr').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var quat = $('#quat').val();
	var disc = $(this).val();
	if(disc!=''){
	var discpr=disc;
	}
	else{
	var discpr=0;	
	}
	var tprice=price*quat;
	var tot=Math.round(parseInt(tprice,10) + parseInt(tvat,10) - parseInt(discpr,10));
	tot=(tot).formatMoney(2, '.', ',');
	$('#total').val(tot);
	
	});
});


function additem(a){

var price = $('#price').val();
var tprice = $('#tprice').val();
var quat = $('#quat').val();
var fbal = $('#bal').val();
if(fbal==''){fbal=0}
var qsold = $('#qsold').val();
var bal=parseInt(fbal,10) - parseInt(quat,10);
var code = $('#code').val();
var itcost = $('#itcost').val();
var name =  $('#red').val();
var tvat = $('#tvat').val();
var disc = $('#discpr').val();
var total = $('#total').val();
var date = $('#datepick').val();
var smode =  $('#smode').val();
var categ =  $('#categ').val();
var categid =  $('#oldcategid').val();
var newprescid =  $('#old_in_presc_id').val();
var dept4rm = $('#dept4rm').val();
var txtcoverage = $('#txtcoverage').val();
var txtinsurer_id = $('#txtinsurer_id').val();
var dept4rm = $('#dept4rm').val();
//var ttcover786      = $('#totalcoverage786').val();
//var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

var capbill = $('#txttotalcoverage786').val();


//prescription
var dr9 = $('#dr9').val();
var dr4 = $('#dr4').parent().find("input:first").val();



var dr7 = $('#dr7').val();
var dr8 = $('#dr8').parent().find("input:first").val();


var dosage=dr9 + ' ' + dr4;
var duration=dr7 + ' ' + dr8;
var route = $('#dr6').parent().find("input:first").val();
var freq = $('#dr5').parent().find("input:first").val();

if(smode=='credit'){
var cname = $('#creditcust').val();
}
if(smode=='cash') {
var cname =  $('#cname').val();}
if(cname==''){
$().customAlert();
	alert('Error!', '<p>Enter the Patient Name!</p>');
	$('#cname').focus();	
}
else if(price==''){

$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
	$('#item4').parent().find("input:first").focus();	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat').focus();	
}

else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + fbal + '</p>');
		$('#quat').focus();	
		return;	
}
else if(bal<0){
		$().customAlert();
		alert('Error!', '<p>Quantity entered exceeds existing stock!<br/>Existing Balance is: ' + fbal + ' units.</p>');
		$('#quat').focus();	
}

else{
	var a='0.2';
	$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:a,code:code,name:name,price:price,quat:quat,tvat:tvat,disc:disc,total:total,date:date,cname:cname,tprice:tprice,itcost:itcost,bal:bal,qsold:qsold,categ:categ,duration:duration,freq:freq,route:route,dosage:dosage,categid:categid,newprescid:newprescid,totalcoverage786:capbill},
		success:function(data){
			//do something
			$('#display').html(data);
		}
		});
	$("#item4").parent().find("input:first").val('').focus();
	$('#quat').val(1);	
$('#disc').val('');		$('#dr7').val('');$('#dr9').val('');
$('.dr').parent('').find("input:first").val('');	
}
}
function delitem(pid){
$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:3,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
$(document).ready(function(){
$('#ampaid').keyup(function() {
	var fintot = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var amount = $(this).val();
	var change=parseInt(amount,10) - parseInt(fintot,10);
	change=(change).formatMoney(2, '.', ',');
	$('#change').val(change);
	});
});
function pickcreditcust(cusid,climit){
 $('#cusid').val(cusid);
  $('#climit').val(climit);
  $().customAlert();
	alert('Credit Balance', '<p>Remaining Credit is Kshs. ' + climit + '</p>');
	e.preventDefault();
}

function checkItemPaidStatus(rcptno){
  $().customAlert();
   alert('Error', '<p>No changing or deleting. Item is either paid for or dispensed. Receipt No. ' + rcptno + '</p>');
   e.preventDefault();
}
function checkItemPaidStatus2(rcptno){
  $().customAlert();
   alert('Error', '<p>No changing or deleting. Test already paid for. Receipt No. ' + rcptno + '</p>');
   e.preventDefault();
}
function checkItemPaidStatus3(rcptno){
  $().customAlert();
   alert('Error', '<p>No changing or deleting. Test already paid for. Receipt No. ' + rcptno + '</p>');
   e.preventDefault();
}
function checkItemPaidStatus4(rcptno){
  $().customAlert();
   alert('Error', '<p>No changing or deleting. Test already paid for. Receipt No. ' + rcptno + '</p>');
   e.preventDefault();
}

function submitpos(pid){	
var tprice = $('#totprice').val();
var tvat = $('#totvat').val();
var type = $('#type').val();
var tdisc = $('#totdisc').val();
var patid = $('#patid').val();
var pmode =  $('#pmode').val();
var smode =  $('#smode').val();
var fintot = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var amount = $('#ampaid').val();
var change = $('#change').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var cusid =  $('#cusid').val();
var climit =  $('#climit').val();
var a=parseInt(amount,10)+parseInt(climit,10)-parseInt(fintot,10);
var dept4rm = $('#dept4rm').val();
var patcategory = $('#patcategory').val();
var in_ins_id = $('#insid').val();
var in_ins_name = $('#insname').val();
var old_in_presc_id =  $('#old_in_presc_id').val();
var old_presc_no =  $('#old_presc_no').val();
var old_customer_id =  $('#old_patient_id').val();
var old_customer_no =  $('#old_patient_no').val();
  
 	if(fintot==''){
			$().customAlert();
			alert('Error!', '<p>No Sales Made!</p>');
			$('#item4').parent().find("input:first").focus();
			e.preventDefault();
	}
	else if(pmode=='OTC Sale'&&amount==''){
					$().customAlert();
						alert('Error!', '<p>No Amount paid!</p>');
						$('#ampaid').focus();
	}
	else if((parseInt(amount,10)<parseInt(fintot,10))&&pmode=='OTC Sale'){
						$().customAlert();
						alert('Error!', '<p>The amount paid is less than the Final Total!</p>');
						$('#ampaid').focus();
	}
		
	else{
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:1,amount:amount,change:change,pmode:pmode,fintot:fintot,patid:patid,pid:pid,old_in_presc_id:old_in_presc_id,old_presc_no:old_presc_no,old_customer_id:old_customer_id,old_customer_no:old_customer_no,patcategory:patcategory,dept4rm:dept4rm,in_ins_id:in_ins_id,in_ins_name:in_ins_name},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function viewcart(){
	$('#display').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:4},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptycart(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:5},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function removelastcart(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'3.1'},
	success:function(data){
		$('#display').html(data);
	}
	});	
}

function quotation(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:6},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$("#itemname7" ).combobox({
		select: function(event,ui){
		 var str = $('#itemname7').val();
		 var parts=str.split('θ',6)
			var itemp=parts[0];
			var vat=parts[1];
			var code=parts[2];
			var itcost=parts[3];
			var bal=parts[4];
			var name=parts[5];
	 $('#total').val('');
		$('#disc').val('');
		$('#price').val(itemp);
		$('#code').val(code);
		$('#itcost').val(itcost);
		$('#vat').val(vat);
		$('#bal').val(bal);
		$('#itname7').val(name);
		if($('#quat').val()!=''){
		var quat = $('#quat').val();
		var tot=itemp * quat;
		sot=(tot).formatMoney(2, '.', ',');
		$('#tprice').val(sot);
		vat=vat * quat;
		tot=parseInt(tot,10) + parseInt(vat,10);
		tot=(tot).formatMoney(2, '.', ',');
		$('#total').val(tot);
		vat=(vat).formatMoney(2, '.', ',');
		$('#tvat').val(vat);
		}
		$('#quat').focus();
	 }
	});
});
function additemquot(){
var price = $('#price').val();
var tprice = $('#tprice').val();
var quat = $('#quat').val();
var bal = $('#bal').val();
bal=parseInt(bal,10) - parseInt(quat,10);
var code = $('#code').val();
var itcost = $('#itcost').val();
var name = $('#itname7').val();
var tvat = $('#tvat').val();
var disc = $('#disc').val();
var total = $('#total').val();
if(price==''){
	$().customAlert();
		alert('Error!', '<p>No item selected!</p>');
		$('#itemname7').parent().find('input:first').focus();
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat').focus();
}
else{
	$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:7,code:code,name:name,price:price,quat:quat,tvat:tvat,disc:disc,total:total,tprice:tprice,itcost:itcost,bal:bal},
		success:function(data){
			//do something
			$('#display').html(data);
			$('#itemname7').parent().find('input:first').focus().val('');
		}
		});
	
}
}
function viewcartquot(){
	$('#display').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:8},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptycartquot(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:9},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function delitemquot(pid){
	$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:10,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}


function submitposquot(){
var tprice = $('#totprice').val();
var tvat = $('#totvat').val();
var tdisc = $('#totdisc').val();
var pmode =  $('#pmode').val();
var fintot = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var amount = $('#ampaid').val();
var change = $('#change').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

		if(fintot==''){
		$().customAlert();
		alert('Error!', '<p>No Entries Made!</p>');
		e.preventDefault();
		}
		
		
	else{
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:2,amount:amount,change:change,tprice:tprice,tvat:tvat,tdisc:tdisc,pmode:pmode},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function printreceipt(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:11},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function printquotation(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:13},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function printcredit(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:18},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function issuecredit(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:15},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function ipdissuecredit(){
$("#mainp").html(loader);
	$.ajax({
	url:'budget.php',
	data:{id:4},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function issueservicecredit(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:179},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function setitemname(){
$('#option1').hide();
$('#option2').show();
$('#option3').hide();
$('#option5').hide();
}

function setitemdate(){
$('#option1').hide();
$('#option3').show();
$('#option2').hide();
$('#option5').hide();
}
function setdefault(){
$('#option3').hide();
$('#option1').show();
$('#option2').hide();
$('#option5').hide();
}
function setbranch(){
$('#option5').show();
$('#option1').hide();
$('#option2').hide();
$('#option3').hide();
$('#pmode').val('Credit');
}
function setcash(){
$('#option1').show();
$('#option2').hide();
$('#pmode').val('Cash');
}
function setcredit(){
$('#option2').show();
$('#option1').hide();
$('#pmode').val('Credit');
}
function searchitem(){
	var itemmode =  $('#itemcat').val();
	if(itemmode=='Date'){
	var cat = 'datepick';
	}
	else if (itemmode=='ItemName'){
	var cat = 'itemname';	
	}

	else{
	var cat = 'itemdefault';
	}
	
	var searchdata = $('#'+ cat).val();
	if(searchdata!=''){
		$('#display').html('<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">');
		$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:12,itemmode:itemmode,searchdata:searchdata},
		success:function(data){
		$('#display').html(data);
		}
		});	
	}
		
}

function searchquot(){
	var itemmode =  $('#itemcat').val();
	if(itemmode=='Date'){
	var cat = 'datepick';
	}
	else if (itemmode=='ItemName'){
	var cat = 'itemname';	
	}

	else{
	var cat = 'itemdefault';
	}
	
	var searchdata = $('#'+ cat).val();
	if(searchdata!=''){
		$('#display').html('<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">');
		$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:14,itemmode:itemmode,searchdata:searchdata},
		success:function(data){
		$('#display').html(data);
		}
		});	
	}
		
}

function searchcredit(){
	var itemmode =  $('#itemcat').val();
	if(itemmode=='TransDate'||itemmode=='ReceiptDate'){
	var cat = 'datepick';
	}
	else if (itemmode=='ItemName'){
	var cat = 'itemname';	
	}

	else{
	var cat = 'itemdefault';
	}
	
	var searchdata = $('#'+ cat).val();
	if(searchdata!=''){
		$('#display').html('<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">');
		$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:19,itemmode:itemmode,searchdata:searchdata},
		success:function(data){
		$('#display').html(data);
		}
		});	
	}
		
}
function searchreceipt(){
	var searchdata =  $('#rcptno').val();
		if(searchdata!=''){
		$('#display').html('<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">');
		$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:16,searchdata:searchdata},
		success:function(data){
		$('#display').html(data);
		}
		});	
	}
		
}
function qtykeyup(code) {
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
	

function addcredit(code,tno){
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
	url:'bridge.php',
	data:{id:17,code:code,name:name,price:price,rtot:rtot,quat:quat,remquat:remquat,rquat:rquat,tno:tno},
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

function iscredit(){
	var rcptno = $('#rcptno').val();
	var rtot = $('#retotal').val();
	rtot=rtot.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	rtot =parseInt(rtot,10);
	if(rtot>0){
		$('#display').html(loader);
$.ajax({
	url:'data.php',
	data:{id:3,rcptno:rcptno,alltot:rtot},
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

function getservicereceipt(){
	var searchdata =  $('#rcptno').val();
		if(searchdata!=''){
		$('#display').html('<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">');
		$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:180,searchdata:searchdata},
		success:function(data){
		$('#display').html(data);
		}
		});	
	}
		
}
function addServcredit(code,tno){
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
	url:'bridge.php',
	data:{id:181,code:code,name:name,price:price,rtot:rtot,quat:quat,remquat:remquat,rquat:rquat,tno:tno},
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

function isservcredit(){
	var rcptno = $('#rcptno').val();
	var rtot = $('#retotal').val();
	rtot=rtot.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	rtot =parseInt(rtot,10);
	if(rtot>0){
		$('#display').html(loader);
$.ajax({
	url:'data.php',
	data:{id:153,rcptno:rcptno,alltot:rtot},
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

function vwclinicshistory(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:175},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function pharmacyDispenseDrugs(){
$("#mainp").html(loader);
   $.ajax({
   url:'bridge.php',
   data:{id:99},
   success:function(data){
   $('#mainp').html(data);
   }
   });
}


function update_category_others(){
	$("#mainp").html(loader);
	$.ajax({
	url:'django_update_stuff.php',
	data:{id:'1.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function update_django_stuff_etc(){
	$("#mainp").html(loader);
	$.ajax({
	url:'django_update_stuff.php',
	data:{id:1},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function just_for_review_django_flat_design(){
	$("#mainp").html(loader);
	$.ajax({
	url:'django_update_stuff.php',
	data:{id:2},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

//category_id No.1
function upd_allrecords_tbl_items(){
	var category_name = $('#pntno').val();
	if(category_name==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:3,category_name:category_name},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

//update DENTAL DEPT # No.2 
function change_dentaldept_to_denta_tbl_minbal(){
	var category_name = $('#cons1').val();
	if(category_name==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:4,category_name:category_name},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

//update old_item_id n old_category_id No.3
function upd_allrecords_tbl_minbal(){
	var category_name = $('#currentins').val();
	if(category_name==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:5,category_name:category_name},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

//update old_item_id from old_item_id=0 to old_item_id=itemcode from patients table No.4
function upd_old_item_id_shud_not_be_zero(){
	var cons3 = $('#cons4').val();
	if(cons3==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'bridge.php',
			data:{id:180,cons3:cons3},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function minbal_not_in_items_and_no_item_id(){
	var minbal_not_in_items = $('#minbal_not_in_items').val();
	if(minbal_not_in_items==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:6,minbal_not_in_items:minbal_not_in_items},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}
function update_pay_mode_cash_companies_in_sales(){
	var update_pay_mode_cash = $('#update_pay_mode_cash').val();
	if(update_pay_mode_cash==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:7,update_pay_mode_cash:update_pay_mode_cash},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_patient_incremental_in_sales(){
	var update_pay_tient = $('#update_patient_incremental').val();
	if(update_pay_tient==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:8,update_pay_tient:update_pay_tient},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_user_incremental_in_sales(){
	var update_pay_tient = $('#update_user_incremental').val();
	if(update_pay_tient==''){
	$().customAlert();
		alert('Error!', '<p>Select a User!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:9,update_pay_tient:update_pay_tient},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_category_in_sales_edited(){
	var update_pay_tient = $('#update_categories_inc').val();
	if(update_pay_tient==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:10,update_pay_tient:update_pay_tient},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_pharmacy_n_administration_category_in_sales_edited(){
	var update_pay_tient = $('#update_pharmacy_n_admin_catid_col_sales_edited').val();
	if(update_pay_tient==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:11,update_pay_tient:update_pay_tient},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}



function update_p_id_inrcpt(){
	var patient_id_patno_not_blank = $('#patient_id_patno_not_blank').val();
	if(patient_id_patno_not_blank==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient ID!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:12,patient_id_patno_not_blank:patient_id_patno_not_blank},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_p_id_inrcpt_unregistered(){
	var patient_id_unregistered = $('#patient_id_patno_blank_unregistered').val();
	if(patient_id_unregistered==''){
	$().customAlert();
		alert('Error!', '<p>Select a nregistered patient!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:15,patient_id_unregistered:patient_id_unregistered},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_user_id_inrcpt_where_patno_not_blank_receipt_edited(){
	var update_user_id_inrcpt = $('#update_user_id_inrcpt_where_patno_not_blank').val();
	if(update_user_id_inrcpt==''){
	$().customAlert();
		alert('Error!', '<p>Select a User ID!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:13,update_user_id_inrcpt:update_user_id_inrcpt},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_category_id_inrcpt_where_patno_not_blank_receipt_edited(){
	var update_pay_tient = $('#update_category_id_inrcpt_where_patno_not_blank').val();
	if(update_pay_tient==''){
	$().customAlert();
		alert('Error!', '<p>Select a Category ID!</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:14,update_pay_tient:update_pay_tient},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_patient_id_in_newpresc_where_oldpatid_zero_newpresc_edited(){
	var update_patient_id_in_newpresc = $('#update_patient_id_in_newpresc_edited').val();
	if(update_patient_id_in_newpresc==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:16,update_patient_id_in_newpresc:update_patient_id_in_newpresc},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_send_to_dept_id_in_newpresc_where_deptid_zero_newpresc_edited(){
	var update_send_to_dept_id_in_newpresc = $('#update_send_to_dept_id_in_newpresc').val();
	if(update_send_to_dept_id_in_newpresc==''){
	$().customAlert();
		alert('Error!', '<p>Select Department</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:17,update_send_to_dept_id_in_newpresc:update_send_to_dept_id_in_newpresc},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_type_clinic_id_in_newpresc_where_clinic_id_zero_newpresc_edited(){
	var update_type_clinic_id_in_newpresc = $('#update_type_clinic_id_in_newpresc').val();
	if(update_type_clinic_id_in_newpresc==''){
	$().customAlert();
		alert('Error!', '<p>Select Clinic</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:18,update_type_clinic_id_in_newpresc:update_type_clinic_id_in_newpresc},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function check_anything_like_hypertensive_in_history_newpresc_where_od_none(){
	var check_anything_like_hypertensive_in_history = $('#check_anything_like_hypertensive_in_history').val();
	if(check_anything_like_hypertensive_in_history==''){
	$().customAlert();
		alert('Error!', '<p>Select Clinic</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:19,check_anything_like_hypertensive_in_history:check_anything_like_hypertensive_in_history},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_old_in_presc_id_pharmacy_requests_where_its_equal_zero(){
	var update_old_in_presc_id_pharmacy_requests = $('#update_old_in_presc_id_pharmacy_requests').val();
	if(update_old_in_presc_id_pharmacy_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:20,update_old_in_presc_id_pharmacy_requests:update_old_in_presc_id_pharmacy_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_old_in_patient_id_pharmacy_requests_where_patid_not_zero(){
	var update_old_in_patient_id_pharmacy_requests = $('#update_old_in_patient_id_pharmacy_requests').val();
	if(update_old_in_patient_id_pharmacy_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:21,update_old_in_patient_id_pharmacy_requests:update_old_in_patient_id_pharmacy_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_old_in_presc_id_laboratory_requests_where_its_equal_zero(){
	var update_old_in_presc_id_laboratory_requests = $('#update_old_in_presc_id_laboratory_requests').val();
	if(update_old_in_presc_id_laboratory_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:22,update_old_in_presc_id_laboratory_requests:update_old_in_presc_id_laboratory_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_old_in_patient_id_laboratory_requests_where_patid_not_zero(){
	var update_old_in_patient_id_laboratory_requests = $('#update_old_in_patient_id_laboratory_requests').val();
	if(update_old_in_patient_id_laboratory_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:23,update_old_in_patient_id_laboratory_requests:update_old_in_patient_id_laboratory_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}
function update_old_in_presc_id_radiology_requests_where_its_equal_zero(){
	var update_old_in_presc_id_radiology_requests = $('#update_old_in_presc_id_radiology_requests').val();
	if(update_old_in_presc_id_radiology_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:24,update_old_in_presc_id_radiology_requests:update_old_in_presc_id_radiology_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_old_in_patient_id_radiology_requests_where_patid_not_zero(){
	var update_old_in_patient_id_radiology_requests = $('#update_old_in_patient_id_radiology_requests').val();
	if(update_old_in_patient_id_radiology_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:25,update_old_in_patient_id_radiology_requests:update_old_in_patient_id_radiology_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}


function update_old_in_presc_id_theatre_requests_where_its_equal_zero(){
	var update_old_in_presc_id_theatre_requests = $('#update_old_in_presc_id_theatre_requests').val();
	if(update_old_in_presc_id_theatre_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:26,update_old_in_presc_id_theatre_requests:update_old_in_presc_id_theatre_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_old_in_patient_id_theatre_requests_where_patid_not_zero(){
	var update_old_in_patient_id_theatre_requests = $('#update_old_in_patient_id_theatre_requests').val();
	if(update_old_in_patient_id_theatre_requests==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:27,update_old_in_patient_id_theatre_requests:update_old_in_patient_id_theatre_requests},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}

function update_patient_id_in_discharge_where_oldpatid_zero(){
	var update_patient_id_in_discharge = $('#update_patient_id_in_discharge').val();
	if(update_patient_id_in_discharge==''){
	$().customAlert();
		alert('Error!', '<p>Select a Patient</p>');
	e.preventDefault();	
	}
	else {
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:28,update_patient_id_in_discharge:update_patient_id_in_discharge},
			success:function(data){
			 $('#django').html(data);
			}
		});
	}
}





function filterclinics(){//filterspecialinics
	var date1 = $('#datepick').val();
	var date2 = $('#datepick2').val();
	var pntno = $('#pntno').val();
	if(pntno==''){
	$().customAlert();
	alert('Error!', '<p>Select a patient!</p>');
	e.preventDefault();	
	}
	else if(date1==''||date2==''){
	$().customAlert();
	alert('Error!', '<p>Enter the From and To dates!</p>');
	e.preventDefault();	
	}
	else{
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:176,date1:date1,date2:date2,pntno:pntno,a:1},
	success:function(data){
	 $('#display').html(data);
	}
	});
	
	}
}
function viewallclinics(){
	var pntno = $('#pntno').val();
		if(pntno==''){
	$().customAlert();
	alert('Error!', '<p>Select a clinic!</p>');
	e.preventDefault();	
	}
	else {
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:176,pntno:pntno,a:2},
	success:function(data){
	 $('#display').html(data);
	}
	});
	}
}

function viewupdateclinic(code){ 
    var emp=$('#pntno' + code).val();
    var cclinics=$('#cclinics' + code).val();

    $('#save' + code).html(loader);
    $.ajax({
    url:'data.php',
    data:{id:151,code:code,emp:emp,cclinics:cclinics},
    success:function(data){
    $('#save' + code).html(data);
    }
    });
}

function nwcustomipdbill(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:18},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function newcustomtpatient(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:3},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function newemergencypatreg(){
	
$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:9},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function newcustompatient(){
	
$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:4},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function newpatient(){
	
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:20},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



// function addnewpat(){
// 	var regn=$('#regn').val();
// 	var regnid=$('#regnid').val();
// 	var name=$('#fname').val();
// 	var lname=$('#lname').val();
// 	var oname=$('#oname').val();
// 	var fourthname=$('#fourthname').val();
// 	var dob=$('#dob').val();
// 	var age=$('#age').val();
// 	var gender = $('input[name=gender]:checked').val();
// 	var stream=$('#stream').val();
// 	var phone2=$('#phone2').val();
// 	var house=$('#house').val();
// 	var course=$('#course').val();
// 	var gname=$('#gname').val();
// 	var rship=$('#rship').val();
// 	var gphone=$('#gphone').val();
// 	var geno=$('#geno').val();
// 	var gaddress=$('#gaddress').val();
// 	var bgroup=$('#bgroup').val();
// 	var alergy=$('#alergy').val();
// 	var tcr=$('#tcr').val();
// 	var tdr=$('#tdr').val();
// 	var cardno=$('#ref76').val();
// 	var company=$('#company').val();
// 	var insid=$('#insid').val();
// 	var insname=$('#insname').val();
// 	var image=$('#stamp').val();
// 	var numexp=/^[0-9]+$/;
// 	//var numexp=/^[0-9]+$/;
// 	var typeclinics=$('#typeclinics').val();
// 	var temp=$('#temp').val();
// 	var bp1=$('#bp1').val();
// 	var bp2=$('#bp2').val();
// 	var weight=$('#weight').val();
// 	var resprate=$('#resprate').val();
// 	var pulserate=$('#pulserate').val();
// 	var rbs=$('#rbs').val();
// 	var ItemCode=$('#ItemCode').val();
// 	var ItemName=$('#ItemName').val();
// 	var Category=$('#Category').val();
// 	var SalePrice=$('#SalePrice').val();
// 	var instatus=$('#newreg76').val();
// 	var old_patient_id=$('#old_patient_id').val();
// 	var old_category_id=$('#old_category_id').val();
// 	//var SalePrice=$('#SalePrice').val();
// 	var newscreening=$('input[name=gender2]:checked').val();
// 	var knownhyper=$('input[name=gender3]:checked').val();
// 	var takingmeds=$('input[name=gender4]:checked').val();
//     //var instatus = $('input[name=instatus]:checked').val();
//     //if(instatus!=1){instatus="Cash"}
//     //if(instatus==1){instatus="Companies"}newreg76

// 	if(regn==''||name==''||oname==''||age==''||stream==''||regnid==''||typeclinics==''||temp==''||bp1==''||bp2==''||pulserate==''){
// 	$().customAlert();
// 		alert('Error!', '<p>Make sure you fill all the required details!</p>');
// 		e.preventDefault();	
// 	}else if(instatus==''){
// 		//var instatus="Companies";
// 		$().customAlert();
// 		alert('Error!', '<p>Select mode of payment!</p>');
// 		$('#currentins').parent().find('input:first').focus();
// 	}
	
// 	else{	
// 	$("#newstudent").html(loader);
// 	$.ajax({
// 	url:'data.php',
// 	data:{id:4,regn:regn,regnid:regnid,name:name,oname:oname,lname:lname,dob:dob,age:age,gender:gender,stream:stream,house:house,course:course,gname:gname,rship:rship,gphone:gphone,phone2:phone2,geno:geno,gaddress:gaddress,bgroup:bgroup,alergy:alergy,tcr:tcr,tdr:tdr,insid:insid,insname:insname,image:image,cardno:cardno,company:company,fourthname:fourthname,typeclinics:typeclinics,temp:temp,bp1:bp1,bp2:bp2,weight:weight,resprate:resprate,pulserate:pulserate,rbs:rbs,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,ItemCode:ItemCode,ItemName:ItemName,Category:Category,SalePrice:SalePrice,instatus:instatus,old_patient_id:old_patient_id,old_category_id:old_category_id},
// 	success:function(data){
// 		$('#newstudent').html(data);
	
// 	}
// 	});
// 	}
// }

function editpatient(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:22,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function viewhistory(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:177},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function hidediv(){
$('#mon').hide();$('#alertDiv, #modalDiv, #modalDiv2').remove();

}
function hidealert(){
$('#alertDiv, #modalDiv, #modalDiv2').remove();
}
function hidenewstude(){
$('#newstude').hide();
$('#mon').hide();
}

function editpat(reg){
	var name=$('#fname').val();
	var oname=$('#oname').val();
	var lname=$('#lname').val();
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
	var cardno=$('#cardno').val();
	var company=$('#company').val();
	var insid=$('#insid').val();
	var insname=$('#insname').val();
	var image=$('#stamp').val();
	var ipno=$('#inpatient').val();
	var regn=$('#regn').val();
	var auto=$('#auto').val();
	var typeclinics=$('#typeclinics').val();
	if(regn==''||name==''||oname==''||age==''||stream==''||typeclinics==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();	
	}
	else{
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:5,reg:reg,regn:regn,auto:auto,name:name,oname:oname,lname:lname,fourthname:fourthname,phone2:phone2,dob:dob,age:age,gender:gender,stream:stream,house:house,course:course,gname:gname,rship:rship,gphone:gphone,geno:geno, gaddress:gaddress, bgroup:bgroup,alergy:alergy,tcr:tcr,tdr:tdr,image:image,cardno:cardno,insid:insid,insname:insname,ipno:ipno,company:company,typeclinics:typeclinics},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}
function admitpat(){
var adm = $('input[name=admitpat]:checked').val();
if(adm==1){
$("#datepick").prop("disabled",false);
$("#datepick").css({'border' : 'solid #10504F 1px'});
$('#bedno').parent().find('input:first').prop("disabled",false);
$('#bedno').parent().find('input:first').css({'border' : 'solid #10504F 1px'});
}
else if(adm='undefined'){
$("#datepick").attr("disabled","disabled");
$("#datepick").css({'border' : 'solid #ccc 1px'});
$('#bedno').parent().find('input:first').prop("disabled",true);
$('#bedno').parent().find('input:first').css({'border' : 'solid #ccc 1px'});
}
}

function addpresc(){
	var old_patient_id = $('#old_patient_id').val();
	var no_of_days_sha = $('#no_of_days_sha').val();
	var reg=$('#regn').val();
	var ldate=$('#lastdate').val();
	var rdate=$('#reviewdate').val();
	var tstamp=$('#todaystamp').val();
	var rcpt=$('#consfee').val();
	var type=$('#ctype').val();
	var sendto=$('#sendto').val();
	var inp = $('#accum').val();
	var txtacctype = $('#paymode').val();
	var typeclinics = $('#typeDMclinic').val();
	var temp=$('#temp').val();
	var bp1=$('#bp1').val();
	var bp2=$('#bp2').val();
	var weight=$('#weight').val();
	var pulserate=$('#pulserate').val();
	var resprate=$('#resprate').val();
	var rbs=$('#rbs').val();
	var newscreening=$('input[name=gender2]:checked').val();
	var knownhyper=$('input[name=gender3]:checked').val();
	var takingmeds=$('input[name=gender4]:checked').val();
	var acctype = $('#acctype').val();
	var insid = $('#insid').val();
	var insname = $('#insname').val();
	
	if (sendto=='GENERAL CONSULTATIONS') {
		sendto = 'TRIAGE';
	};
	if(inp!=1){inp=0;}
	var today=new Date();
	var dd=today.getDate();
	var mm=today.getMonth()+1;
	var yyyy=today.getFullYear();
	if(dd<10){dd='0'+dd}
	if(mm<10){mm='0'+mm}
	today=mm+'/'+dd+'/'+yyyy;
	
	var g=ldate.substr(0,2);
	var h=ldate.substr(3,2);
	var i=ldate.substr(6,4);
	var y=h+'/'+ g +'/'+ i;
	
	 var today=new Date("" + today + "");
 	var y=new Date("" + y + "");
	var  timeDiff=Math.abs(today.getTime() - y.getTime());
	var diffDays=Math.ceil(timeDiff/(1000*3600*24));
	
	var oname=$('#oname').val();
	if(reg==''||old_patient_id==''){
	$().customAlert();
		alert('Error!', '<p>The patient has not been registered yet.!</p>');
		e.preventDefault();	
		return;
	}
	else if(typeclinics==''){
			$().customAlert();
			alert('Error!', '<p>Boss clinic is required.!</p>');
			e.preventDefault();	
			return;
	}
	else if(acctype==''||type==''){
			$().customAlert();
			alert('Error!', '<p>account type and patient type are required.</p>');
			e.preventDefault();	
			return;
	}
	
	else if(temp==''||bp1==''||weight==''||pulserate==''||bp2==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill at least the Temparature,Blood Pressure,Pulse rate and Bill Consultation fee and receive payment for the patient</p>');
		e.preventDefault();	
		return;
	}
	
	
	//else if((rcpt==''&&type!='Review')&&(rcpt==''&&inp!=1)){
	//$().customAlert();
	//	alert('Error!', '<p>Select the payment made by the patient.</p>');
	//	e.preventDefault();	
	//	return;
	//}
	else if((rcpt=='')){
	$().customAlert();
		alert('Error!', '<p>Select the payment made by the patient. Bill Consultation fee and receive payment for the patient</p>');
		e.preventDefault();	
		return;
	}
	
	
	else if(ldate=='//'&&type=='Review'){
			$().customAlert();
			alert('Error!', '<p>The patient has actually to have been seen first for Review.</p>');
			e.preventDefault();	
			return;
	}

	else if(type=='Review'&&diffDays>7&&parseInt(tstamp,10)>parseInt(rdate,10)){
	$().customAlert();
	alert('Error!', '<p>Patient does not qualify for review. Patient has exceeded review date period.</p>');
	e.preventDefault();	
	return;
	
	}

	else if(no_of_days_sha<7&&insid==26){
				$('#cashpayindvbelow21').show();
				$('#currentactdvover21').hide();
				$('#currentactdv').hide();
	$().customAlert();
	alert('Error!', '<p>For SHA patients revisits should be after 7 Days, Otherwise, they pay cash or be admitted to be treated as Inpatient. '+ no_of_days_sha +' days has past since the last visit.</p>');
	e.preventDefault();	
	return;
	
	}
	
	else{
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:48,old_patient_id:old_patient_id,reg:reg,oname:oname,rcpt:rcpt,type:type,send_to_dept_id:sendto,inp:inp,txtacctype:txtacctype,type_clinic_id:typeclinics,temp:temp,bp1:bp1,bp2:bp2,weight:weight,pulserate:pulserate,resprate:resprate,rbs:rbs,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,acctype:acctype,insid:insid,insname:insname},
	success:function(data){
	$('#newstudent2').html(data);
	
	}
	});
	}
}

function addcashpayingpresc(){
	var old_patient_id = $('#old_patient_id').val();
	var no_of_days_sha = $('#no_of_days_sha').val();
	var reg=$('#regn').val();
	var ldate=$('#lastdate').val();
	var rdate=$('#reviewdate').val();
	var tstamp=$('#todaystamp').val();
	var rcpt=$('#consfee').val();
	var type=$('#ctype').val();
	var sendto=$('#sendto').val();
	var inp = $('#accum').val();
	var typeclinics = $('#typeDMclinic').val();
	var temp=$('#temp').val();
	var bp1=$('#bp1').val();
	var bp2=$('#bp2').val();
	var weight=$('#weight').val();
	var pulserate=$('#pulserate').val();
	var resprate=$('#resprate').val();
	var rbs=$('#rbs').val();
	var as_cc_payin = $('#as_cc_payin').val();
	var newscreening=$('input[name=gender2]:checked').val();
	var knownhyper=$('input[name=gender3]:checked').val();
	var takingmeds=$('input[name=gender4]:checked').val();
	var acctype = $('#acctype').val();
	var txtacctype = $('#txtacctype').val();
	var insid = "14";
	var insname = "CASH";
	
	if (sendto=='GENERAL CONSULTATIONS') {
		sendto = 'TRIAGE';
	};
	if(inp!=1){inp=0;}
	var today=new Date();
	var dd=today.getDate();
	var mm=today.getMonth()+1;
	var yyyy=today.getFullYear();
	if(dd<10){dd='0'+dd}
	if(mm<10){mm='0'+mm}
	today=mm+'/'+dd+'/'+yyyy;
	
	var g=ldate.substr(0,2);
	var h=ldate.substr(3,2);
	var i=ldate.substr(6,4);
	var y=h+'/'+ g +'/'+ i;
	
	 var today=new Date("" + today + "");
 	var y=new Date("" + y + "");
	var  timeDiff=Math.abs(today.getTime() - y.getTime());
	var diffDays=Math.ceil(timeDiff/(1000*3600*24));
	
	var oname=$('#oname').val();
	if(reg==''||old_patient_id==''){
	$().customAlert();
		alert('Error!', '<p>The patient has not been registered yet.!</p>');
		e.preventDefault();	
		return;
	}
	else if(typeclinics==''){
			$().customAlert();
			alert('Error!', '<p>Boss clinic is required.!</p>');
			e.preventDefault();	
			return;
	}
	else if(acctype==''||type==''){
			$().customAlert();
			alert('Error!', '<p>account type and patient type are required.</p>');
			e.preventDefault();	
			return;
	}
	
	else if(temp==''||bp1==''||weight==''||pulserate==''||bp2==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill at least the Temparature,Blood Pressure,Pulse rate and Bill Consultation fee and receive payment for the patient</p>');
		e.preventDefault();	
		return;
	}
	
	
	//else if((rcpt==''&&type!='Review')&&(rcpt==''&&inp!=1)){
	//$().customAlert();
	//	alert('Error!', '<p>Select the payment made by the patient.</p>');
	//	e.preventDefault();	
	//	return;
	//}
	else if((rcpt=='')){
	$().customAlert();
		alert('Error!', '<p>Select the payment made by the patient. Bill Consultation fee and receive payment for the patient</p>');
		e.preventDefault();	
		return;
	}
	
	
	else if(ldate=='//'&&type=='Review'){
			$().customAlert();
			alert('Error!', '<p>The patient has actually to have been seen first for Review.</p>');
			e.preventDefault();	
			return;
	}

	else if(type=='Review'&&diffDays>7&&parseInt(tstamp,10)>parseInt(rdate,10)){
	$().customAlert();
	alert('Error!', '<p>Patient does not qualify for review. Patient has exceeded review date period.</p>');
	e.preventDefault();	
	return;
	
	}

	// else if(no_of_days_sha<7&&insid==26){
	// $().customAlert();
	// alert('Error!', '<p>For SHA patients revisits should be after 7 Days, Otherwise, they pay cash or be admitted to be treated as Inpatient. '+ no_of_days_sha +' days has past since the last visit.</p>');
	// e.preventDefault();	
	// return;
	
	// }
	
	else{
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:48,old_patient_id:old_patient_id,reg:reg,oname:oname,rcpt:rcpt,type:type,send_to_dept_id:sendto,inp:inp,txtacctype:txtacctype,type_clinic_id:typeclinics,temp:temp,bp1:bp1,bp2:bp2,weight:weight,pulserate:pulserate,resprate:resprate,rbs:rbs,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,acctype:acctype,insid:insid,insname:insname,as_cc_payin:as_cc_payin},
	success:function(data){
	$('#newstudent2').html(data);
	
	}
	});
	}
}
function add2mchpresc(){
	var old_patient_id = $('#old_patient_id').val();
	var no_of_days_sha = $('#no_of_days_sha').val();
	var reg=$('#regn').val();
	var ldate=$('#lastdate').val();
	var rdate=$('#reviewdate').val();
	var tstamp=$('#todaystamp').val();
	var rcpt=$('#consfee').val();
	var type=$('#ctype').val();
	var sendosid=$('#sendto').val();
	var sendto=$('#sendto option:selected').text(); //sendDosId sendosnome
	var sendosnome = $('#sendto option:selected').text();
	var inp = $('#accum').val();
	var typeclinics = $('#typeDMclinic').val();
	var temp=$('#temp').val();
	var bp1=$('#bp1').val();
	var bp2=$('#bp2').val();
	var weight=$('#weight').val();
	var pulserate=$('#pulserate').val();
	var resprate=$('#resprate').val();
	var rbs=$('#rbs').val();
	var as_cc_payin = $('#as_cc_payin').val();
	var newscreening=$('input[name=gender2]:checked').val();
	var knownhyper=$('input[name=gender3]:checked').val();
	var takingmeds=$('input[name=gender4]:checked').val();
	var acctype = $('#acctype').val();
	var txtacctype = $('#txtacctype').val();
	var insid = $('#insid').val();
	var insname = $('#insname').val();
	
	if (sendto=='MCH CLINIC') {
		sendto = 'TRIAGE';
	};
	if(inp!=1){inp=0;}
	var today=new Date();
	var dd=today.getDate();
	var mm=today.getMonth()+1;
	var yyyy=today.getFullYear();
	if(dd<10){dd='0'+dd}
	if(mm<10){mm='0'+mm}
	today=mm+'/'+dd+'/'+yyyy;
	
	var g=ldate.substr(0,2);
	var h=ldate.substr(3,2);
	var i=ldate.substr(6,4);
	var y=h+'/'+ g +'/'+ i;
	
	 var today=new Date("" + today + "");
 	var y=new Date("" + y + "");
	var  timeDiff=Math.abs(today.getTime() - y.getTime());
	var diffDays=Math.ceil(timeDiff/(1000*3600*24));
	
	var oname=$('#oname').val();
	if(reg==''||old_patient_id==''){
	$().customAlert();
		alert('Error!', '<p>The patient has not been registered yet.!</p>');
		e.preventDefault();	
		return;
	}
	else if(typeclinics==''){
			$().customAlert();
			alert('Error!', '<p>Boss clinic is required.!</p>');
			e.preventDefault();	
			return;
	}
	else if(acctype==''||type==''){
			$().customAlert();
			alert('Error!', '<p>account type and patient type are required.</p>');
			e.preventDefault();	
			return;
	}
	
	else if(temp==''||bp1==''||weight==''||pulserate==''||bp2==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill at least the Temparature,Blood Pressure,Pulse rate and Bill Consultation fee and receive payment for the patient</p>');
		e.preventDefault();	
		return;
	}
	else if(sendosnome!='MCH CLINIC'&&sendosid!=3){
			$().customAlert();
			alert('Error!', '<p>The patient can only be sent to MCH. MCH Required.</p>');
			e.preventDefault();	
			return;
	}
	
	
	//else if((rcpt==''&&type!='Review')&&(rcpt==''&&inp!=1)){
	//$().customAlert();
	//	alert('Error!', '<p>Select the payment made by the patient.</p>');
	//	e.preventDefault();	
	//	return;
	//}
	else if((rcpt=='')){
	$().customAlert();
		alert('Error!', '<p>Select the payment made by the patient. Bill Consultation fee and receive payment for the patient</p>');
		e.preventDefault();	
		return;
	}
	
	
	else if(ldate=='//'&&type=='Review'){
			$().customAlert();
			alert('Error!', '<p>The patient has actually to have been seen first for Review.</p>');
			e.preventDefault();	
			return;
	}

	else if(type=='Review'&&diffDays>7&&parseInt(tstamp,10)>parseInt(rdate,10)){
	$().customAlert();
	alert('Error!', '<p>Patient does not qualify for review. Patient has exceeded review date period.</p>');
	e.preventDefault();	
	return;
	
	}

	// else if(no_of_days_sha<7&&insid==26){
	// $().customAlert();
	// alert('Error!', '<p>For SHA patients revisits should be after 7 Days, Otherwise, they pay cash or be admitted to be treated as Inpatient. '+ no_of_days_sha +' days has past since the last visit.</p>');
	// e.preventDefault();	
	// return;
	
	// }
	
	else{
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:48,old_patient_id:old_patient_id,reg:reg,oname:oname,rcpt:rcpt,type:type,send_to_dept_id:sendosid,inp:inp,txtacctype:txtacctype,type_clinic_id:typeclinics,temp:temp,bp1:bp1,bp2:bp2,weight:weight,pulserate:pulserate,resprate:resprate,rbs:rbs,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,acctype:acctype,insid:insid,insname:insname,as_cc_payin:as_cc_payin},
	success:function(data){
	$('#newstudent2').html(data);
	
	}
	});
	}
}
function addcustompresc(){
	var old_patient_id = $('#old_patient_id').val();
	var reg=$('#regn').val();
	var ldate=$('#lastdate').val();
	var rdate=$('#reviewdate').val();
	var tstamp=$('#todaystamp').val();
	var rcpt=$('#consfee').val();
	var type=$('#ctype').val();
	var sendto=$('#sendto').val();
	var inp = $('#accum').val();
	var txtacctype = $('#paymode').val();
	var typeclinics = $('#typeDMclinic').val();
	var temp='0';
	var bp1='0';
	var bp2='0';
	var weight='0';
	var pulserate='0';
	var resprate='0';
	var rbs='0';
	var newscreening='No';
	var knownhyper='No';
	var takingmeds='No';
	var acctype = $('#acctype').val();
	var insid = $('#insid').val();
	var insname = $('#insname').val();
	
	if(inp!=1){inp=0;}
	var today=new Date();
	var dd=today.getDate();
	var mm=today.getMonth()+1;
	var yyyy=today.getFullYear();
	if(dd<10){dd='0'+dd}
	if(mm<10){mm='0'+mm}
	today=mm+'/'+dd+'/'+yyyy;
	
	var g=ldate.substr(0,2);
	var h=ldate.substr(3,2);
	var i=ldate.substr(6,4);
	var y=h+'/'+ g +'/'+ i;
	
	 var today=new Date("" + today + "");
 	var y=new Date("" + y + "");
	var  timeDiff=Math.abs(today.getTime() - y.getTime());
	var diffDays=Math.ceil(timeDiff/(1000*3600*24));
	
	var oname=$('#oname').val();
	if(reg==''||old_patient_id==''){
	$().customAlert();
		alert('Error!', '<p>The patient has not been registered yet.!</p>');
		e.preventDefault();	
		return;
	}
	else if(typeclinics==''){
			$().customAlert();
			alert('Error!', '<p>Boss clinic is required.!</p>');
			e.preventDefault();	
			return;
	}
	else if(insid==''||insname==''){
			$().customAlert();
			alert('Error!', '<p>Boss payment mode is required.!</p>');
			e.preventDefault();	
			return;
	}
	else if(acctype==''||type==''){
			$().customAlert();
			alert('Error!', '<p>account type and patient type are required.</p>');
			e.preventDefault();	
			return;
	}
	
	else if(temp==''||bp1==''||weight==''||pulserate==''||bp2==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill at least the Temparature,Blood Pressure,Pulse rate and Bill Consultation fee and receive payment for the patient</p>');
		e.preventDefault();	
		return;
	}
	
	
	//else if((rcpt==''&&type!='Review')&&(rcpt==''&&inp!=1)){
	//$().customAlert();
	//	alert('Error!', '<p>Select the payment made by the patient.</p>');
	//	e.preventDefault();	
	//	return;
	//}
	// else if((rcpt=='')){
	// $().customAlert();
	// 	alert('Error!', '<p>Select the payment made by the patient. Bill Consultation fee and receive payment for the patient</p>');
	// 	e.preventDefault();	
	// 	return;
	// }
	
	
	else if(ldate=='//'&&type=='Review'){
			$().customAlert();
			alert('Error!', '<p>The patient has actually to have been seen first for Review.</p>');
			e.preventDefault();	
			return;
	}

	else if(type=='Review'&&diffDays>7&&parseInt(tstamp,10)>parseInt(rdate,10)){
	$().customAlert();
	alert('Error!', '<p>Patient does not qualify for review. Patient has exceeded review date period.</p>');
	e.preventDefault();	
	return;
	
	}
	
	else{
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data_rep.php',
	data:{id:2,old_patient_id:old_patient_id,reg:reg,oname:oname,rcpt:rcpt,type:type,send_to_dept_id:sendto,inp:inp,txtacctype:txtacctype,type_clinic_id:typeclinics,temp:temp,bp1:bp1,bp2:bp2,weight:weight,pulserate:pulserate,resprate:resprate,rbs:rbs,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,acctype:acctype,insid:insid,insname:insname},
	success:function(data){
	$('#newstudent2').html(data);
	
	}
	});
	}
}

function savetriage(pid){
	var temp=$('#temp').val();
	var bp1=$('#bp1').val();
	var bp2=$('#bp2').val();
	var type=$('#ctype').val();
	var weight=$('#weight').val();
	var pulserate=$('#pulserate').val();
	var resprate=$('#resprate').val();
	var rbs=$('#rbs').val();
	var typeclinics = $('#typeDMclinic').val();
	var newscreening=$('input[name=gender2]:checked').val();
	var knownhyper=$('input[name=gender3]:checked').val();
	var takingmeds=$('input[name=gender4]:checked').val();
	var in_clinic_id=$('#in_clinic_id').val();
	var in_presc_id=$('#in_presc_id').val();
	var in_customer_id=$('#in_customer_id').val();
	var sendto=$('#sendto').val();
	if(temp==''||bp1==''||weight==''||pulserate==''||bp2==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill at least the Temparature,Blood Pressure,Pulse rate and Weight fields!</p>');
		e.preventDefault();	
	}
	else if(typeclinics==''){
			$().customAlert();
			alert('Error!', '<p>Boss clinic is required.!</p>');
			e.preventDefault();	
			return;
	}
	else{
	removeArea('odetail',area15);
	var odetail=$('#odetail').val();
	addArea('odetail',area15);
	
	removeArea('allergies',area14);
	var allergies=$('#allergies').val();
	addArea('allergies',area14);
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'48.1',pid:pid,temp:temp,bp1:bp1,bp2:bp2,weight:weight,odetail:odetail,allergies:allergies,pulserate:pulserate,resprate:resprate,rbs:rbs,sendto:sendto,typeclinics:typeclinics,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,in_customer_id:in_customer_id,in_presc_id:in_presc_id,in_clinic_id:in_clinic_id},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}

function viewhistory2(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:24},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function filterrecord(){
	var date1 = $('#datepick').val();
	var date2 = $('#datepick2').val();
	var pntno = $('#pntno').val();
	if(pntno==''){
	$().customAlert();
	alert('Error!', '<p>Select a patient!</p>');
	e.preventDefault();	
	}
	else if(date1==''||date2==''){
	$().customAlert();
	alert('Error!', '<p>Enter the From and To dates!</p>');
	e.preventDefault();	
	}
	else{
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:25,date1:date1,date2:date2,pntno:pntno,a:1},
	success:function(data){
	 $('#display').html(data);
	}
	});
	
	}
}

function filterrecord2(){
	var date1 = $('#datepick').val();
	var date2 = $('#datepick2').val();
	var pntno = $('#pntno').val();
	if(pntno==''){
	$().customAlert();
	alert('Error!', '<p>Select a patient!</p>');
	e.preventDefault();	
	}
	else if(date1==''||date2==''){
	$().customAlert();
	alert('Error!', '<p>Enter the From and To dates!</p>');
	e.preventDefault();	
	}
	else{
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:178,date1:date1,date2:date2,pntno:pntno,a:1},
	success:function(data){
	 $('#display').html(data);
	}
	});
	
	}
}

function viewallrec2(){
	var pntno = $('#pntno').val();
		if(pntno==''){
	$().customAlert();
	alert('Error!', '<p>Select a patient!</p>');
	e.preventDefault();	
	}
	else {
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:178,pntno:pntno,a:2},
	success:function(data){
	 $('#display').html(data);
	}
	});
	}
}

function viewallrec(){
	var pntno = $('#pntno').val();
		if(pntno==''){
	$().customAlert();
	alert('Error!', '<p>Select a patient!</p>');
	e.preventDefault();	
	}
	else {
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:25,pntno:pntno,a:2},
	success:function(data){
	 $('#display').html(data);
	}
	});
	}
}
function printallrec(){
	var pntno = $('#pntno').val();
		if(pntno==''){
	$().customAlert();
	alert('Error!', '<p>Select a patient!</p>');
	e.preventDefault();	
	}
	else window.open('report.php?id=5&rcptno=' + pntno);
}

function purchase(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:26},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function savewardbill(){
var fintot = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var presc_id =  $('#old_consult_id').val();
var patient_id =  $('#old_patient_id').val();
if(fintot==''){
		$().customAlert();
		alert('Error!', '<p>No items added!</p>');
		
}else{
$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:100,presc_id:presc_id,patient_id:patient_id},
	success:function(data){
	$('#newstudent').html(data);
	}
	});
}
	
}
function savenursebill(a){
	var fintot = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var regn = $('#regn').val();
	nursing();
	window.open("report.php?id=42&reg=" + a + '&' + "\nregn=" + regn);
	
}
function subIPDCashbill(){
var presc_id =  $('#old_consult_id').val();
var presc_no =  $('#old_consult_no').val();
var patient_id =  $('#old_patient_id').val();
var patient_no =  $('#regn').val();
var category =  $('#category').val();
var fintot = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(fintot==''){
		$().customAlert();
		alert('Error!', '<p>No items added!</p>');
		
}else{
$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:156,old_patient_id:patient_id,old_patient_no:patient_no,old_presc_id:presc_id,old_presc_no:presc_no,category:category},
	success:function(data){
	$('#newstudent').html(data);
	}
	});
}
	
}

function subdepbill254(){
var presc_id =  $('#old_presc_id').val();
var presc_no =  $('#old_presc_no').val();
var patient_id =  $('#old_patient_id').val();
var patient_no =  $('#regn').val();
var usr_cashacc_no =  $('#usr_cashacc_no').val();
var usr_cashacc_name =  $('#usr_cashacc_name').val();
var fintot =  $('#depamt').val();
if(fintot==''){
		$().customAlert();
		alert('Error!', '<p>Amount is Required!</p>');
		
}else{
$("#displaydep").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'155',presc_id:presc_id,presc_no:presc_no,patient_id:patient_id,patient_no:patient_no,depamt:fintot,usr_cashacc_no:usr_cashacc_no,usr_cashacc_name:usr_cashacc_name},
	success:function(data){
	$('#displaydep').html(data);
	}
	});
}
	
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
function validatealp(a){
    var numexp=/^[a-zA-Z ]+$/;
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

function pickpricepur(itemp,code,itcost,bal,qpurch){
	$('#total').val('');
	$('#discc').val('');
	$('#price').val(itcost);
	$('#code').val(code);
	$('#itcost').val(itcost);
	$('#bal').val(bal);
	$('#qpurch').val(qpurch);
	if($('#quatt').val()!=''){
	var quat = $('#quatt').val();
	var tot=itcost * quat;
	sot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(sot);
	tot=parseInt(tot,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#total').val(tot);
	}
}

$(document).ready(function(){
	$('#quatt').keyup(function() {
	var price = $('#pricet').val();
	var quat = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tot=price * quat;
	sot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(sot);
	tot=parseInt(tot,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#total').val(tot);
	});
});

$(document).ready(function(){
	$('#discc').keyup(function() {
	var tprice = $('#tprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var disc = $(this).val();
	var tot=parseInt(tprice,10) - parseInt(disc,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#total').val(tot);
	});
});


function additempur(){

var total = $('#tprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var unit1 = $('#unit56').val();
var part = $('#part56').val();
var pack = $('#pack').val();
if(part==''){part=0;}
var bal = $('#bal').val();
var qpurch = $('#qpurch').val();
var code = $('#code').val();
var sp = $('#sp56').val();
var pp = $('#pp56').val();
var name = $('#itname7').val();
var pprice = $('#price56').val();
var sprice = $('#pricet').val();
var saleset = $('#saleset').val();
var bonus = $('input[name=bonus]:checked').val();
if(bonus!=1){bonus=0}
var date = $('#datepick').val();
var sid = $('#supname').val();
var sname =$('#supname option:selected').text();
var invoice = $('#invoice').val();
var batch = $('#batch').val();
var qty = $('#qty').val();
var expiry = $('#datepick3').val();
var oprice = $('#itemsale').val();
var marg = $('#margin').val();
if(bonus==1){
	pprice = total=0;
	$('#price56').val(pprice);
	$('#tprice').val(total);
}

if(name==''){
	$().customAlert();
		alert('Error!', '<p>No item selected!</p>');
		$('#itemxa').parent().find('input:first').focus();
}
else if(unit1==''&&part==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#unit56').focus();
}
else if(invoice==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Invoice Number!</p>');
		$('#invoice').focus();
}
else if(pprice==''&&pprice!=0){
		$().customAlert();
		alert('Error!', '<p>Enter the Unit purchase price!</p>');
		$('#price56').focus();
}
else if(sid==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Supplier name!</p>');
		$('#supname').focus();
}
else if(expiry==''){
		$().customAlert();
		alert('Error!', '<p>Select expiry date!</p>');
		$('#datepick3').focus();
}

else{
	$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:27,code:code,name:name,pprice:pprice,sprice:sprice,unit1:unit1,part:part,batch:batch,sp:sp,pp:pp,total:total,date:date,invoice:invoice,bal:bal,sname:sname,expiry:expiry,qpurch:qpurch,saleset:saleset,bonus:bonus,qty:qty,oprice:oprice,marg:marg,sid:sid,pack:pack},
		success:function(data){
			//do something
			$('#display').html(data);
		}
		});
	$('#itemxa').parent().find('input:first').focus().val('');
	$('#unit56').val('');$('#part56').val('');$('#price56').val('');$('#pricet').val('');$('#batch').val('');$('#datepick3').val('');$('#tprice').val('');$('#pack').val('');
}
}
function viewcartpur(){
	$('#display').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:28},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptycartpur(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:29},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function delitempur(pid){
	$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:30,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function removelastpur(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'30.1'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function picksupplier(cusid){
	$('#cusid').val(cusid);
}

function submitpur(){
var maxno = $('#totitems').val();
var fintot = $('#totprice').val();
		if(maxno==''||maxno==0){
		$().customAlert();
		alert('Error!', '<p>No Purchases Made!</p>');
		e.preventDefault();
		}
		
	else{
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:7,fintot:fintot},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function stockitems(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:31},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addcat(){
var categ = $('#categ').val();
		if(categ==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid category Name!</p>');
		e.preventDefault();
		}
		
	else{
		$('#res').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:8,categ:categ},
		success:function(data){
		$('#res').html(data);
		}
		});	
		}	
}
$(document).ready(function(){
	$("#labitem" ).combobox({
		select: function(event,ui){
		 //var sec = $('#labitem').val();
		 var sec = $('#labitem option:selected').text();
		 if(sec=='LABORATORY'){
		 	$('#labsec').show();
		 	$('#labsection').parent().find('input:first').focus();
		 }else{$('#labsec').hide();}
		 
		}
	});
});

function addnewstock(){
var code = $('#itcode1').val();
var name = $('#itname1').val();
var bra = $('#labitem').val();
var braid = $('#labitem').val();
var bra = $('#labitem option:selected').text();
var itemcat = $('#labsection').val();
var pack = 	'';
var mbal = 	'';
var supp = 	'';
var ltime = '';
var type = 'SERVICE';
var pprice = '';
var margin ='';
var expiry = $('#datepick4').val();
var sprice = $('#sprice1').val();
var crpprice = $('#price2').val();
var prshprice = $('#price3').val();
var otcsprice = $('#price7').val();
var apaprice = $('#price60').val();
var pacisprice = $('#price61').val();
var liasonprice = $('#price62').val();
var oldmutualprice = $('#price63').val();
var kplcminetprice = $('#price64').val();
var maklmatprice = $('#price65').val();
var minetcsprice = $('#price66').val();
var covereduncovered = $('input[name=covereduncovered]:checked').val();
var taxable ='';
var sellable = '';
var vat = '';
var quat = '';
var molecule = '';

		if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Item Name!</p>');
		e.preventDefault();
		}
		
		else if(bra=='LABORATORY'&&itemcat==''){
		$().customAlert();
		alert('Error!', '<p>Select a section for the LABORATORY!</p>');
		e.preventDefault();
		}
	
		else if(bra==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Dept!</p>');
		e.preventDefault();
		}

		else if(sprice==''||crpprice==''||prshprice==''||otcsprice==''||apaprice==''||pacisprice==''||liasonprice==''||oldmutualprice==''||kplcminetprice==''||maklmatprice==''||minetcsprice==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Service Charge!</p>');
		e.preventDefault();
		}
		
		
	else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:9,code:code,name:name,pprice:pprice,sprice:sprice,taxable:taxable,sellable:sellable,vat:vat,itemcat:itemcat,quat:quat,type:type,pack:pack,margin:margin,supp:supp,mbal:mbal,ltime:ltime,a:1,bra:bra,molecule:molecule,crpprice:crpprice,prshprice:prshprice,braid:braid,covereduncovered:covereduncovered,otcsprice:otcsprice,apaprice:apaprice,pacisprice:pacisprice,liasonprice:liasonprice,oldmutualprice:oldmutualprice,kplcminetprice:kplcminetprice,maklmatprice:maklmatprice,minetcsprice:minetcsprice,expiry:expiry},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}	
}
$(document).ready(function(){
	$('#item5').parent().find('input:first').width(170); 
	$("#item5" ).combobox({
		select: function(event,ui){
		 var str = $('#item5').val();
		 var parts=str.split('θ',16);
		 $('#sprice2').val(parts[0]);
		 $('#itcode2').val(parts[1]);
		 $('#itname2').val(parts[2]);
		 $('#labitem2').val(parts[3]);
		 $('#price4').val(parts[5]);
		 $('#price5').val(parts[6]);
		 $('#price6').val(parts[7]);
		 $('#price70').val(parts[8]);
		 $('#price71').val(parts[9]);
		 $('#price72').val(parts[10]);
		 $('#price73').val(parts[11]);
		 $('#price74').val(parts[12]);
		 $('#price75').val(parts[13]);
		 $('#price76').val(parts[14]);
		 var cat=parts[3];
		 if(cat=='LABORATORY'){
		 	$('#labsec2').show();
		 	$('#labsection2').val(parts[4]);
		 }else{$('#labsec2').hide();}

		}
	});
});
function seleclab(){
	 //var sec = $('#labitem2').val();
	 var sec = $('#labitem2 option:selected').text();
	 if(sec=='LABORATORY'){
	 	$('#labsec2').show();
	 	 }else{$('#labsec2').hide();}
}
$(document).ready(function(){
	$( "#itemname" ).combobox({});
	$("#itemcat1" ).combobox({});
	$( "#itemname1" ).combobox({
		select: function(event,ui){
		 var str = $('#itemname1').val();
		 var parts=str.split('θ',7)
		 var itemp=parts[0];
		 var code=parts[1];
		 var itcost=parts[2];
		 var bal=parts[3];
		 var qpurch=parts[4];
		 var qsold=parts[5];
		 var name=parts[6];
		
		$('#total').val('');
		$('#discc').val('');
		$('#price').val(itcost);
		$('#pricet').val(itcost);
		$('#code').val(code);
		$('#itcost').val(itcost);
		$('#bal').val(bal);
		$('#itname7').val(name);
		$('#qpurch').val(qpurch);
		$('#qsold').val(qsold);
		if($('#quatt').val()!=''){
		var quat = $('#quatt').val();
		var tot=itcost * quat;
		sot=(tot).formatMoney(2, '.', ',');
		$('#tprice').val(sot);
		tot=parseInt(tot,10);
		tot=(tot).formatMoney(2, '.', ',');
		$('#total').val(tot);
		}
		$('#quatt').focus();
		}
	});
	$( "#itemname2" ).combobox({});
	$( "#itemxa" ).combobox({
		select: function(event,ui){
		 var str = $('#itemxa').val();
		 var parts=str.split('θ',8)
		 var itemp=parts[0];
		 var code=parts[1];
		 var itcost=parts[2];
		 var bal=parts[3];
		 var qpurch=parts[4];
		 var qsold=parts[5];
		 var name=parts[6];
		 var pack=parts[7];
		
		$('#total').val('');
		$('#discc').val('');
		$('#itemsale').val(itemp);
		$('#itemdet').val('Name:' + name + '<br/>Pack Size:' + pack + '<br/>Sale Price:' + itemp + '<br/>Purchase Price:' + itcost + '<br/>Balance:' + bal);
		$('#code').val(code);
		$('#itcost').val(itcost);
		$('#bal').val(bal);
		$('#itname7').val(name);
		$('#qpurch').val(qpurch);
		$('#qsold').val(qsold);
		$('#pack').val(pack);

		$('#unit56').focus();$('#unit59').focus();
		}
	});
});

function editstock(){
var code = $('#itcode2').val();
var name = $('#itname2').val();
var braid = $('#labitem2').val();
var bra = $('#labitem2 option:selected').text();
var itemcat = $('#labsection2').val();
var sprice = 	$('#sprice2').val();
var crpprice = $('#price4').val();
var prshprice = $('#price5').val();
var otcsprice = $('#price6').val();
var apaprice = $('#price70').val();
var pacisprice = $('#price71').val();
var liasonprice = $('#price72').val();
var oldmutualprice = $('#price73').val();
var kplcminetprice = $('#price74').val();
var maklmatprice = $('#price75').val();
var minetcsprice = $('#price76').val();
var moredetails = $('#moredetails').val();
var councovered = $('input[name=coun1covered]:checked').val();
var mbal = 	'';
var supp = 	'';
var ltime = '';
var type = 'SERVICE';
var pprice = '';
var margin ='';
var taxable ='';
var sellable = '';
var vat = '';
var quat = '';
var pack= '';
var molecule= '';


		if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Item Name!</p>');
		e.preventDefault();
		}

		else if(bra=='LABORATORY'&&itemcat==''){
		$().customAlert();
		alert('Error!', '<p>Select a section for the LABORATORY!</p>');
		e.preventDefault();
		}
		

		else if(sprice==''||crpprice==''||prshprice==''||otcsprice==''||apaprice==''||pacisprice==''||liasonprice==''||oldmutualprice==''||kplcminetprice==''||maklmatprice==''||minetcsprice==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Service Charge!</p>');
		e.preventDefault();
		}
		
		else if(bra==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Dept!</p>');
		e.preventDefault();
		}
		else if(moredetails==''){
		$().customAlert();
		alert('Error!', '<p>Enter the reason!</p>');
		e.preventDefault();
		}

		
	else{
		$('#res3').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:10,code:code,name:name,pprice:pprice,sprice:sprice,taxable:taxable,sellable:sellable,vat:vat,itemcat:itemcat,bra:bra,quat:quat,type:type,pack:pack,margin:margin,supp:supp,mbal:mbal,ltime:ltime,a:1,molecule:molecule,crpprice:crpprice,prshprice:prshprice,braid:braid,moredetails:moredetails,councovered:councovered,otcsprice:otcsprice,apaprice:apaprice,pacisprice:pacisprice,liasonprice:liasonprice,oldmutualprice:oldmutualprice,kplcminetprice:kplcminetprice,maklmatprice:maklmatprice,minetcsprice:minetcsprice},
		success:function(data){
		$('#res3').html(data);
		}
		});	
		}	
}

function deleteitem(a){
	var code = $('#itcode2').val();
	if(code==''){
		$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
		e.preventDefault();
		}
	$('#res3').html(loader);$.ajax({
	url:'data.php',
	data:{id:11,code:code,a:a},
	success:function(data){
	$('#res3').html(data);
	}
	});
}


function stocktake(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:64},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function stockadj(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'33.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#branches" ).combobox({
		select: function(event,ui){
		 var param = $('#branches').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:33,param:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});

	$( "#brancht" ).combobox({});

});
function stockusage(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:149},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function submitstockuse(){
var bid = $('#brancht').val();
var bname=$('#brancht option:selected').text();
var itcode= $('#itemname').val();
var qty= $('#qty').val();
var notes = $('#notes').val();
		if(bid==''){
		$().customAlert();
		alert('Error!', '<p>No Branch/department selected!</p>');
		$('#brancht').parent().find('input:first').focus();
		}
		else if(itcode==''){
		$().customAlert();
		alert('Error!', '<p>No Item selected!</p>');
		$('#itemname').parent().find('input:first').focus();
		}
		else if(qty==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity used!</p>');
		$('#qty').focus();
		}
		else if(notes==''){
		$().customAlert();
		alert('Error!', '<p>Enter the details!</p>');
		$('#notes').focus();
		}
	else{
		$('#postresp').html('<img id="img-spinner" src="images/load.gif"  alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:87,itcode:itcode,bid:bid,bname:bname,notes:notes,qty:qty},
		success:function(data){
		$('#postresp').html(data);
		}
		});	
		}	
}
$(document).ready(function(){
	$( "#itemname6" ).combobox({
		select: function(event,ui){
		 var str = $('#itemname6').val();
		 var parts=str.split('θ',3)
	$('#itcode').val(parts[0]);
	 $('#bal').val(parts[1]);
	 $('#itname7').val(parts[2]);
	 $('#quat').focus();
	 }
	});
});
function addtakestock(){
var dep1 = $('#dep1').val();
var unit1 = $('#unit58').val();
var part = $('#part58').val();
if(part==''){part=0;}
var bal = $('#bal').val();
var code = $('#code').val();
var name =  $('#itname7').val();
var pack = $('#pack').val();
var spr = $('#spr').val();
var qty=(unit1*pack) + parseInt(part,10);
if(unit1==''&&part==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#unit57').focus();
}

else{
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:34,code:code,name:name,pack:pack,dep1:dep1,qty:qty,bal:bal,unit1:unit1,part:part,spr:spr},
		success:function(data){
		$('#display').html(data);
		$('#itemxb').parent().find('input:first').focus().val('');
		$('#unit58').val('');
		$('#part58').val('');
		$('#bal1').val('');
		$('#bal2').val('');
		}
		});
	
}
}


function viewtakestock(bra){
	$('#display').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:36,bra:bra},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function checkbill(){
var rec = $('input[name=billable]:checked').val();
if(rec==1){$('#pricet').val(0);}	

}
function emptytakestock(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:37},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function delitemstock(pid){
	$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:35,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function removelaststock(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'35.1'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function pickstock(code,bal){
$('#itcode').val(code);
 $('#bal').val(bal);
}

function submitstock(bra){
var tot = $('#totitems').val();
		if(tot==''){
		$().customAlert();
		alert('Error!', '<p>No Entries Made!</p>');
		$('#itemxb').parent().find('input:first').focus();
		}
		
	else{
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:12,bra:bra},
		success:function(data){
		$('#display').html(data);
		$('#itemxb').parent().find('input:first').focus();
		}
		});	
		}	
}

function bank(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:43},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function pickexpense(code){
 $('#ecode').val(code);
}



function addexpense(){
var code = $('#ecode').val();
var amount = $('#amount').val();
var date = $('#datepick').val();
var name = $('#expensename').val();


		
		if(code==''){
		$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
		e.preventDefault();
		}
		else if(amount==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Amount!</p>');
		e.preventDefault();
		}
		if(date==''){
		$().customAlert();
		alert('Error!', '<p>Enter the date!</p>');
		e.preventDefault();
		}
		
	else{
		$('#display').html(loader);
		$.ajax({
		url:'bridge.php',
		data:{id:39,code:code,date:date,amount:amount,name:name},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function viewexpense(){
	$('#display').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:41},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptyexpense(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:42},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function deleteexpense(pid){
	$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:40,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function submitexpense(){
var tot = $('#totitems').val();
		if(tot==''){
		$().customAlert();
		alert('Error!', '<p>No Entries Made!</p>');
		e.preventDefault();
		}
	else{
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:13},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function postchat(tname){
	var comme=$('#comme').val();
	if(comme!=''){	
	$("#chata").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:14,comme:comme,tname:tname},
	success:function(data){
	$('#chata').html(data);
	}
	});
	 }
}
function refreshchat(){
	$("#chata").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:15},
	success:function(data){
	$('#chata').html(data);
	}
	});
}

function reloadpharmcartbill(a,pid){
	$('#displayinv').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:'132.13',a:a,pid:pid},
		success:function(data){
		$('#displayinv').html(data);
	}
	});	
}

function serverstuff(){
	$("#xclusive").html(loader)
	$.ajax({
	url:'data.php',
	data:{id:60},
	success:function(data){
	$('#xclusive').html(data);
	}
	});
}

function pickacc(acno,bal){
 $('#acno2').val(acno);
 $('#acbal2').val(bal);
}

function pickacc2(acno,bal){
 $('#acno3').val(acno);
 $('#acbal3').val(bal);
}

function deposit(){
var amount = $('#amount2').val();
var acno = $('#acno2').val();
var bankslip = $('#bankslip2').val();
var acname = $('#acname2').val();
var info = $('#info2').val();
var dep = $('#dep2').val();
var bal = $('#acbal2').val();


		
		if(acno==''){
		$().customAlert();
		alert('Error!', '<p>Select an Account!</p>');
		e.preventDefault();
		}
		else if(amount==''){
		$().customAlert();
		alert('Error!', '<p>Enter the amount deposited!</p>');
		e.preventDefault();
		}
		
	else{
		$('#res3').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:17,bankslip:bankslip,info:info,acname:acname,acno:acno,dep:dep,bal:bal,amount:amount},
		success:function(data){
		$('#res3').html(data);
		}
		});	
		}	
}

function withdraw(){
var amount = $('#amount3').val();
var acno = $('#acno3').val();
var bankslip = $('#bankslip3').val();
var acname = $('#acname3').val();
var info = $('#info3').val();
var dep = $('#dep3').val();
var bal = $('#acbal3').val();


		
		if(acno==''){
		$().customAlert();
		alert('Error!', '<p>Select an Account!</p>');
		e.preventDefault();
		}
		else if(amount==''){
		$().customAlert();
		alert('Error!', '<p>Enter the amount withdrawn!</p>');
		e.preventDefault();
		}
		
	else{
		$('#res4').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:18,bankslip:bankslip,info:info,acname:acname,acno:acno,dep:dep,bal:bal,amount:amount},
		success:function(data){
		$('#res4').html(data);
		}
		});	
		}	
}

function company(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:44},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function adduser(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:45},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addnewuser(usid){
var name = $('#fname').val();
var name1 = $('#name1').val();
var user = $('#name1').val() + $('#name2').val();
var pass = $('#pass1').val();
var pos = $('#pos1').val();
var dept = $('#itemname').val();
var hod = $('input[name=hod]:checked').val();
if(hod!='HOD'){hod=''}

		if(name1==''){
		$().customAlert();
		alert('Error!', '<p>Enter the user initials!</p>');
		$('#name1').focus();
		}
		else if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the full names!</p>');
		$('#fname').focus();
		}
		else if(pass==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Password!</p>');
		$('#pass1').focus();
		}
		else if(pos==''){
		$().customAlert();
		alert('Error!', '<p>Select the user position!</p>');
		$("#pos1").parent().find("input:first").focus();	
		}
		else if(dept==''){
		$().customAlert();
		alert('Error!', '<p>Select the department!</p>');
		$("#itemname").parent().find("input:first").focus();	
		}
		
	else{
		$('#res1').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:20,user:user,name:name,pos:pos,pass:pass,dept:dept,usid:usid,hod:hod},
		success:function(data){
		$('#res1').html(data);
		}
		});	
		}	
}

$(document).ready(function(){
	$("#acname3" ).combobox({
		select: function(event,ui){
		 var str = $('#acname3').val();
		 var parts=str.split('θ',5);
		 $('#itemnames').val(parts[0]);
		 $('#pos2').val(parts[2]);
		 $('#stamper').val(parts[1]);
		 var hod=parts[4];
		 if(hod=='HOD'){
		$('input[name=hod2]').prop("checked",true);
		 }else{$('input[name=hod2]').prop("checked",false);}
		 $('#lei2').html('<div style="position:absolute;width:100px; right:255px; opacity:2, z-index:10000;top:208px;height:100px; border:2px solid #10504F"><img id="img-spinner" src="' + parts[3] + '"  style="margin:10px; max-width:80px;max-height:80px " alt="Loading"/></div>');
		}
	});
});
function edituser(){
var user = $('#stamper').val();
var pos = $('#pos2').val();
var dept = $('#itemnames').val();
var rec = $('input[name=respas]:checked').val();
if(rec!=1){rec=0}
var hod = $('input[name=hod2]:checked').val();
if(hod!='HOD'){hod=''}
 if(user==''){
		$().customAlert();
		alert('Error!', '<p>Select a Username!</p>');
		e.preventDefault();
		}
		else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:21,user:user,pos:pos,rec:rec,dept:dept,hod:hod},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}
}

function useraccess(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:34},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function itemaccess(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:53},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function saveaccess(code){
	admin=$('#Admin' + code).val();
	doc=$('#Doctor' + code).val();
	cash=$('#Cashier' + code).val();
	user=$('#User' + code).val();
	pharm=$('#Pharm' + code).val();
	lab=$('#Lab' + code).val();
	rad=$('#Rad' + code).val();
	recep=$('#Recep' + code).val();
	ext=$('#ExtMedic' + code).val();
	acc=$('#Accounts' + code).val();
	store=$('#Store' + code).val();
	emp=$('#Emp' + code).val();
	triage=$('#Triage' + code).val();
	nurse=$('#Nurse' + code).val();
	if(admin=='NO'&&code==143){
	$.confirm({
			'title'		: 'Save Admin Confirmation',
			'message'	: 'You are about to lock out the admin from the general setings panel;including this panel.Continue with this action?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:22,code:code,admin:admin,doc:doc,cash:cash,user:user,pharm:pharm,lab:lab,rad:rad,recep:recep,ext:ext,acc:acc,store:store,triage:triage,nurse:nurse,emp:emp},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
	}
	
	else{

	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:22,code:code,admin:admin,doc:doc,cash:cash,user:user,pharm:pharm,lab:lab,rad:rad,recep:recep,ext:ext,acc:acc,store:store,triage:triage,nurse:nurse,emp:emp},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
	}
}

function editbranch(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:47},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addnewbr(){
var name = $('#bname1').val();
 if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Branchname!</p>');
		e.preventDefault();
		}
		else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:23,name:name},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}
}

function delbranch(){
var code = $('#bname2').val();
 
		$('#res4').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:24,code:code},
		success:function(data){
		$('#res4').html(data);
		}
		});	
		
}

function changelogin(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:48},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function postinit(userid){
	
	var name=$('#name').val();
	var fname=$('#fname').val();
	if(name==''||fname==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Username and make sure the full names field is filled!</p>');
		e.preventDefault();
		}
	else{
	$("#postresp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:25,userid:userid,name:name,fname:fname},
	success:function(data){
	$('#postresp').html(data);
	}
	});
	}

}

function postpass(userid){
	
	var opass=$('#opass').val();
	var npass=$('#npass').val();
	var cpass=$('#cpass').val();

	if(opass==''){
		$().customAlert();
		alert('Error!', '<p>Enter your old password!</p>');
		e.preventDefault();
		}
		else if(npass==''){
		$().customAlert();
		alert('Error!', '<p>Enter a new password!</p>');
		e.preventDefault();
		}
		else if(cpass==''){
		$().customAlert();
		alert('Error!', '<p>Confirm password!</p>');
		e.preventDefault();
		}
	else{
	$("#aresp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:26,opass:opass,npass:npass,cpass:cpass,userid:userid},
	success:function(data){
	$('#aresp').html(data);
	}
	});
	}
}


function addnewexp(){
var name = $('#bname1').val();
 if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Expense name!</p>');
		e.preventDefault();
		}
		else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:27,name:name},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}
}

function delexpense(){
var code = $('#bname2').val();
 
		$('#res4').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:28,code:code},
		success:function(data){
		$('#res4').html(data);
		}
		});	
		
}



function addnewnomacc(){
var name = $('#name1').val();
var nom = $('#nom1').val();
var datee = $('#datepick').val();
var amount = $('#amount1').val();
 if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Item name!</p>');
		e.preventDefault();
		}
		else  if(amount==''){
		$().customAlert();
		alert('Error!', '<p>Enter the  Amount!</p>');
		e.preventDefault();
		}
		else  if(datee==''){
		$().customAlert();
		alert('Error!', '<p>Enter the acquisition date!</p>');
		e.preventDefault();
		}
		
		else{
		$('#res1').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:29,name:name,nom:nom,datee:datee,amount:amount},
		success:function(data){
		$('#res1').html(data);
		}
		});	
		}
}

function picknom(nid){
	
		$('#inside').html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading" alt="Loading"/>');
		$.ajax({
		url:'bridge.php',
		data:{id:51,nid:nid},
		success:function(data){
		$('#inside').html(data);
		}
		});	
		
}

function stockissue(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:52},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addissue(){
var dep1 = $('#dep1').val();
var dep2 = $('#dep2').val();
var unit1 = $('#unit57').val();
var part = $('#part57').val();
if(part==''){part=0}
var bal = $('#bal').val();
var code = $('#code').val();
var name =  $('#itname7').val();
var pack = $('#pack').val();
var spr = $('#spr').val();
var qty=(unit1*pack) + parseInt(part,10);
var tot=spr*qty;
//if(qty>bal){
		//$('#unit57').val('');
		//$('#part57').val('');
		//$().customAlert();
		//alert('Error!', '<p>Quantity requested cannot exceed the stock balance!</p>');
		//$('#unit57').focus();
//}

if(code==''){
	$().customAlert();
		alert('Error!', '<p>No item selected!</p>');
		$("#itemxb").parent().find("input:first").focus();	
}
else if(unit1==''&&part==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#unit57').focus();
}

else{
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:53,code:code,name:name,unit1:unit1,part:part,pack:pack,dep1:dep1,dep2:dep2,qty:qty,tot:tot},
		success:function(data){
		$('#display').html(data);
		$('#itemxb').parent().find('input:first').focus().val('');
		$('#unit57').val('');
		$('#part57').val('');
		$('#bal1').val('');
		$('#bal2').val('');
		$('#pack').val('');
		}
		});
	
}
}

function viewissue(){
	$('#display').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:54},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptyissue(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:55},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function removelastissue(){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'56.1'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function delissue(pid){
	$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:56,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function submitissue(){
	
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:30},
		success:function(data){
		$('#display').html(data);
		}
		});	
		
}

function creditcust(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:21},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addnewcus(){
var patno = $('#patno').val();
var name = $('#cname1').val();
var tel = $('#tel1').val();
var obal = $('#obal1').val();

if(name==''){
	$().customAlert();
		alert('Error', '<p>Please enter debtor name.</p>');
		return false;
}
else{
		$('#res2').html(loader);
		$.ajax({
				url:'./data.php',
				data:{id:31,name:name,tel:tel,obal:obal,patno:patno},
				success:function(data){
						$('#res2').html(data);
				}
		});
		
}

}
function pickcredcust(cid,cname,clim,rcred,tel,post,email,rcred){
 $('#cid2').val(cid);
  $('#cname2').val(cname);
  $('#lim2').val(clim);
   $('#rcred2').val(rcred);
 $('#tel2').val(tel);
  $('#post2').val(post);
    $('#email2').val(email);

}
function pickcredsup(cid,cname,tel,post,email){
 $('#cid2').val(cid);
  $('#cname2').val(cname);
 $('#tel2').val(tel);
  $('#post2').val(post);
    $('#email2').val(email);

}

function savecredcust(){
var name = $('#cname2').val();
var tel = $('#tel2').val();
var cid = $('#cid2').val();
		if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		

		else if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid name!</p>');
		e.preventDefault();
		}
		
		else if(tel==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid phone Number!</p>');
		e.preventDefault();
		}
		
	
	else{
		$('#res3').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:32,name:name,tel:tel,cid:cid},
		success:function(data){
		$('#res3').html(data);
		}
		});	
		}	
}

function pickcredcust2(cid,bal){
 $('#cid3').val(cid);
  $('#tdebt').val(bal);
}
function pickcredcust3(cid){
 $('#cid4').val(cid);
}
function pickcredcust5(cid,rcred,bal){
 $('#cid5').val(cid);
  $('#rcredo').val(rcred);
  $('#rcred5').val(rcred);
$('#bal5').val(bal);
$('#balo').val(bal);

}
$('#amount5').keyup(function() {
	var rcred = $('#rcredo').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var bal5 = $('#balo').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var amo = $(this).val();
	if(amo==''){amo=0}
	var rem=parseInt(rcred,10) - parseInt(amo,10);
	rem=(rem).formatMoney(2, '.', ',');
	$('#rcred5').val(rem);
	var bal=parseInt(bal5,10)  + parseInt(amo,10);
	bal=(bal).formatMoney(2, '.', ',');
	$('#bal5').val(bal);
	
	});

function postdebt(){
var amo = $('#amount5').val();
var name = $('#cn5').val();
var rcred = $('#rcred5').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var cid = $('#cid5').val();
var desc = $('#desc5').val();
var bal = $('#bal5').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		else if(parseInt(amo,10)<=0||amo==''){
		$().customAlert();
		alert('Error!', '<p>No amount paid!</p>');
		e.preventDefault();
		}
		
		else if(parseInt(rcred,10)<0){
		$().customAlert();
		alert('Error!', '<p>The credit limit has been exceeded!</p>');
		e.preventDefault();
		}
		
		else if(desc==''){
		$().customAlert();
		alert('Error!', '<p>Enter the transaction description!</p>');
		e.preventDefault();
		}
	else{
		$('#res5').html('<img id="img-spinner" src="images/load.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:'32.1',name:name,amo:amo,rcred:rcred,cid:cid,desc:desc,bal:bal},
		success:function(data){
		$('#res5').html(data);
		}
		});	
		}	
}
$(document).ready(function(){
	$('#amountp').keyup(function() {
	var tdebt = $('#tdebt').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var am = $(this).val();
	var rem=parseInt(tdebt,10)  - parseInt(am,10);
	rem=(rem).formatMoney(2, '.', ',');
	$('#rdebt').val(rem);
	});
});

function paydebt(){
var name = $('#cn3').val();
var amo = $('#amountp').val();
var rdebt = $('#rdebt').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var pmode = $('#pmode').val();
var cid = $('#cid3').val();
var desc = $('#desc').val();
		if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		

		else if(parseInt(amo,10)<=0||amo==''){
		$().customAlert();
		alert('Error!', '<p>No amount paid!</p>');
		e.preventDefault();
		}
		
		else if(parseInt(rdebt,10)<0){
		$().customAlert();
		alert('Error!', '<p>The debt value has been exceeded!</p>');
		e.preventDefault();
		}
		else if(desc==''){
		$().customAlert();
		alert('Error!', '<p>Enter the transaction description!</p>');
		e.preventDefault();
		}
		
	else{
		$('#res4').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:33,name:name,amo:amo,rdebt:rdebt,pmode:pmode,cid:cid,desc:desc},
		success:function(data){
		$('#res4').html(data);
		}
		});	
		}	
}

function viewstatement(){
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	var cid = $('#item30').val();
	if(view==null){view=0}
	if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
	else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	window.open("report.php?id=10&code=" + cid);
}
else {window.open("report.php?id=10&code=" + cid + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}
function creditsup(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:30},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function delcreditcus(){
	var cid = $('#cid2').val();
	var bal = $('#bal2').val();
	if(bal>0){
		$().customAlert();
		alert('Error!', '<p>Customer has a pending balance of '+ bal + '.It has to be cleared before deletion!</p>');
		e.preventDefault();
		}
		else{
	if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		else{
		$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this credit customer from the system.This cannot be restored later! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$('#res3').html('loader');
	$.ajax({
	url:'data.php',
	data:{id:35,cid:cid},
	success:function(data){
	$('#res3').html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		}
		
		}
		

}
function delcreditsup(){
	var cid = $('#cid2').val();
	var bal = $('#bal2').val();
	if(bal>0){
		$().customAlert();
		alert('Error!', '<p>Customer has a pending balance of '+ bal + '.It has to be cleared before deletion!</p>');
		e.preventDefault();
		}
		else{
	if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		else{
		$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this credit Supplier from the system.This cannot be restored later! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$('#res3').html('loader');
	$.ajax({
	url:'data.php',
	data:{id:36,cid:cid},
	success:function(data){
	$('#res3').html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		}
		
		}
		

}
function addnewsup(){
var name = $('#cname1').val();
var tel = $('#tel1').val();
var obal = $('#obal1').val();

if(name==''){
	$().customAlert();
		alert('Error!', '<p>Enter a valid Name!</p>');
		e.preventDefault();
}
else if(tel==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Telephone Nummber!</p>');
		e.preventDefault();
}
else{
	$('#res2').html(loader);
	$.ajax({
		url:'./data.php',
		data:{id:34,name:name,tel:tel,obal:obal},
		success:function(data){
			//do something
			$('#res2').html(data);
		}
		});
	
}
}

function savecredsup(){
var name = $('#cname2').val();
var tel = $('#tel2').val();
var cid = $('#cid2').val();

		if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		

		else if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid name!</p>');
		e.preventDefault();
		}
		
		else if(tel==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid phone Number!</p>');
		e.preventDefault();
		}
		
	
	else{
		$('#res3').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:37,name:name,tel:tel,cid:cid},
		success:function(data){
		$('#res3').html(data);
		}
		});	
		}	
}
function postsupdebt(){
var amo = $('#amount5').val();
var name = $('#cn5').val();
var rcred = $('#rcred5').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var cid = $('#cid5').val();
var desc = $('#desc5').val();
var bal = $('#bal5').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		else if(parseInt(amo,10)<=0||amo==''){
		$().customAlert();
		alert('Error!', '<p>No amount paid!</p>');
		e.preventDefault();
		}
		
		else if(desc==''){
		$().customAlert();
		alert('Error!', '<p>Enter the transaction description!</p>');
		e.preventDefault();
		}
	else{
		$('#res5').html('<img id="img-spinner" src="images/load.gif" style="margin-top:0px" alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:'37.1',name:name,amo:amo,rcred:rcred,cid:cid,desc:desc,bal:bal},
		success:function(data){
		$('#res5').html(data);
		}
		});	
		}	
}
function paysupdebt(){
var name = $('#cn3').val();
var amo = $('#amountp').val();
var rdebt = $('#rdebt').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var pmode = $('#pmode').val();
var cid = $('#cid3').val();
var desc = $('#desc').val();
		if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
		

		else if(parseInt(amo,10)<=0||amo==''){
		$().customAlert();
		alert('Error!', '<p>No amount paid!</p>');
		e.preventDefault();
		}
		
		else if(parseInt(rdebt,10)<0){
		$().customAlert();
		alert('Error!', '<p>The debt value has been exceeded!</p>');
		e.preventDefault();
		}
		else if(desc==''){
		$().customAlert();
		alert('Error!', '<p>Enter the transaction description!</p>');
		e.preventDefault();
		}
		
	else{
		$('#res4').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:38,name:name,amo:amo,rdebt:rdebt,pmode:pmode,cid:cid,desc:desc},
		success:function(data){
		$('#res4').html(data);
		}
		});	
		}	
}

function viewstatement2(){
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	var cid = $('#item30').val();
	if(view==null){view=0}
	if(cid==''){
		$().customAlert();
		alert('Error!', '<p>Select a customer first!</p>');
		e.preventDefault();
		}
	else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	window.open("report.php?id=11&code=" + cid);
}
else {window.open("report.php?id=11&code=" + cid + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}


function profitloss(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:77},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterprofit(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
code=2;
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	window.open("report.php?id=12&code=" + code);
}
else {window.open("report.php?id=12&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function salesrep(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:78,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function deprep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:146},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterdeposits(){
var a=0;
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
window.open("report.php?id=43&code=" + a);
	
}
else {window.open("report.php?id=43&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}

}

function entersales(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=13&code=" + a);
	
}
else {window.open("report.php?id=13&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}

}


function salesrepun(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:79,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function cashierdaily(){
	var a=0;	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'79.1',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function dailysumm(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'79.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterdailysumm(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the start and end dates!</p>');
		e.preventDefault();	
}

else{
	
	//window.open("output.php?id=29&d1=" + d1 + '&' + "\nd2=" + d2);
	window.open("report3.php?id=1&d1=" + d1 + '&' + "\nd2=" + d2);
}
}


function expreport(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:82,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function entersalesp(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=13&code=" + a + '&' + "\nname=" + name);
	
}
else {window.open("report.php?id=13&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
function fetchlabcompanyinc(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#comppaymode').val();
var insname = $('#insname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){//||insname=''
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=74&code=" + a + '&' + "\nname=" + name + '&' + "\ninsname=" + insname);
	
}
else {window.open("report.php?id=74&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ninsname=" + insname);}
}
function entersalescashier(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var timer1 = $('#timer1').val();
var timer2 = $('#timer2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=56&code=" + a + '&' + "\nname=" + name + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);
	
}
else {window.open("report.php?id=56&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);}
}


function salesun(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:80,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function salesun2(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'81',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function salesun3(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'81.1',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function salesun7(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'81.2',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function exprep(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:81,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterexpe(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=14&code=" + a);
}
else {window.open("report.php?id=14&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

function enterexp(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=14&code=" + a + '&' + "\nname=" + name);
}
else {window.open("report.php?id=14&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}

function bankstate(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:83},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterbank(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
var a=0;
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=15&code=" + a + '&' + "\nname=" + name);
}
else {window.open("report.php?id=15&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}

function pricelist(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:84,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function goodspricelist(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:65,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterprice(a){
var name = $('#itemname').val();
window.open("report.php?id=16&code=" + a + '&' + "\nname=" + name);
}

function entergoodsprice(a){
var name = $('#itemname').val();
window.open("r/sg-price-list-all.php?id=8&code=" + a + '&' + "\nname=" + name);
}

function purchaserep(a,b){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:b,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function returnrep(a,b){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:b,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function stockbal(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'86.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterpurch(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=17&code=" + a);
}
else {window.open("report.php?id=17&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
function enterstockbal(){
var b = $('#below').val();

if(b==''){
		$().customAlert();
		alert('Error!', '<p>Enter the limit!</p>');
		e.preventDefault();
}
else{window.open("report.php?id=41&bal=" + b);}
}
function enterpurchase(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=17&code=" + a + '&' + "\nname=" + name);
}
else {window.open("report.php?id=17&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}


function issuerep1(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:88,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function expreport(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'88.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function finrep(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'./bridge.php',
	data:{id:'78.1',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function generateCons(a,b,c){
	//window.open("output.php?id=5&rcptno=" + a + '&' + "\npid=" + b);
	window.open("outpathistory.php?id=726&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c);
	window.open("outpathistory.php?id=2&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c);
	window.open("outpathistory.php?id=63&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c);
}
function generaterRcptInv(a,b,c,d){
	window.open("report.php?id=606&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c + '&' + "\ntdt=" + d);
	window.open("outpathistory.php?id=2&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c + '&' + "\ntdt=" + d);
	window.open("outpathistory.php?id=63&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c + '&' + "\ntdt=" + d);
}
function generateNewCons(a,b,c){
	if (b=='') {
		window.open("outpathistory.php?id=1&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c);
		window.open("outpathistory.php?id=2&rcptno=" + a + '&' + "\npid=" + b);
	} else {
		window.open("outpathistory.php?id=1&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c);
		window.open("outpathistory.php?id=2&rcptno=" + a + '&' + "\npid=" + b);
	}
	
}

function generateRequestOrder(a,b,c){
	window.open("outpathistory.php?id=63&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c);
	window.open("report.php?id=81&rcptno=" + a + '&' + "\npid=" + b + '&' + "\ncid=" + c);	
}

function enterfin(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var d3 = $('#datepick3').val();
if((d1==''||d2=='')&&d3==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(d3!=''){
window.open("report.php?id=" + a + '&' + "\nd2=" + d3);
}
else {window.open("report.php?id=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
function enterexpiry(){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
var a=5;	
	window.open("report.php?id=18&code=" + a);
}
else {var a=6;
	window.open("report.php?id=18&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
function enterissue(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=19&code=" + a);
}
else {window.open("report.php?id=19&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
function issuerep2(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:89,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function stockuserep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'89.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function transfersumm(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'89.2',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterissue2(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var name2 = $('#itemname2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=19&code=" + a + '&' + "\nname=" + name + '&' + "\nname2=" + name2);
}
else {window.open("report.php?id=19&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nname2=" + name2);}
}

function enterissue3(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var name2 = $('#itemname2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("output.php?id=20&code=" + a + '&' + "\nname=" + name + '&' + "\nname2=" + name2);
}
else {window.open("output.php?id=20&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\nname2=" + name2);}
}
function enterstockuse(){
	var a=0;
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=46&code=" + a + '&' + "\nname=" + name);
}
else {window.open("report.php?id=46&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
function enterstockvar(){
var a=0;
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=20code=" + a + '&' + "\nname=" + name);
}
else {window.open("report.php?id=20&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
function enterstockvar2(){
var a=0;
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=21code=" + a + '&' + "\nname=" + name);
}
else {window.open("report.php?id=21&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}

function enterlposumm(){
var a=0;
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("output.php?id=19code=" + a + '&' + "\nname=" + name);
}
else {window.open("output.php?id=19&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
function itemsearch(){
          var param = $('#itsearch').val();
		  if(param!=''){
         $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:90,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
		}
}

function patientsearch(){
          var param = $('#patsearch').val();
		  if(param!=''){
         $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:91,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
		}
}

function emergencyexam(a){
$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:10,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	}); 
}

function docmch(a){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:192,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	}); 
}


function docexam(a){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:94,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	}); 
}

$(document).ready(function(){
	$( "#cons1" ).combobox({
		select: function(event,ui){
		 var param = $('#cons1').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:95,pid:param},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		}
	});
	$( "#cons13" ).combobox({
		select: function(event,ui){
		 var param = $('#cons13').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:93,pid:param},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		}
	});
	$( "#cons23" ).combobox({
		select: function(event,ui){
		 var param = $('#cons23').val();
		  var d1 = $('#datepick').val();
		   var d2 = $('#datepick2').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:154,pid:param,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		}
	});
});
function seeconsinv(param){
	  var d1 = $('#datepick').val();
	   var d2 = $('#datepick2').val();
		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:154,pid:param,d1:d1,d2:d2},
				success:function(data){
					$('#mainp').html(data);
				
				}
			});
}
function getPharmReq(prescid,prescno,clientid,clientno,id){
 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:id,prescid:prescid,prescno:prescno,clientid:clientid,clientno:clientno},
				success:function(data){
					$('#mainp').html(data);
				
				}
			});	
}
function getPayReq(pid,clientno,oldpatientid,id){
 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:id,pid:pid,clientno:clientno,oldpatientid:oldpatientid},
				success:function(data){
					$('#mainp').html(data);
				
				}
			});	
}
function emergpat(param,id){
 $("#mainp").html(loader);
	$.ajax({
		url:'bridgerep.php',
		data:{id:id,pid:param},
		success:function(data){
			$('#mainp').html(data);
		
		}
	});	
}
function seepat(param,id){
 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:id,pid:param},
				//id == 95 == consultations
				success:function(data){
					$('#mainp').html(data);
				
				}
			});	
}
function doconst(param,id){
 $("#mainp").html(loader);
			$.ajax({
				url:'bridgerep.php',
				data:{id:id,pid:param},
				success:function(data){
					$('#mainp').html(data);
				
				}
			});	
}
function seeccc(param,id){
 	var ser = $('#ser').val();
	var d = $('#d').val();
	 $("#tabs-"+d).html(loader);
			$.ajax({
				url:'link.php',
				data:{id:id,param:param},
				success:function(data){
					$("#tabs-"+d).html(data);
				
				}
			});	
}
function seepat2(rcpt,id){
 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:id,rcpt:rcpt},
				success:function(data){
					$('#mainp').html(data);
				
				}
			});	
}
$(document).ready(function(){
	$( "#cons2" ).combobox({
		select: function(event,ui){
		 var param = $('#cons').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:95,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function reclab(){
var rec = $('input[name=reclab]:checked').val();
if(rec==1){
$("#rectest").prop("disabled",false);
$("#rectest").css({'border' : 'solid #10504F 1px'});		
}
else{
$("#rectest").val('');
$("#rectest").prop("disabled",true);
$("#rectest").css({'border' : 'solid #ccc 1px'});	
}
}
function addocexam(pid){
	var rec = $('input[name=reclab]:checked').val();
	if(rec==1){rec=1}else {rec=0}
	var fin = $('input[name=finishent]:checked').val();
	if(fin==1){fin=1}else {fin=0}
	var phist=$('#phist').val();
	var complaint=$('#complaint').val();
	var rectest=$('#rectest').val();
	var surg=$('#surgeries').val();
	if(rec==1&&rectest==''){
	$().customAlert();
		alert('Error!', '<p>Fill the Recommended tests Field!</p>');
		e.preventDefault();		
	}
	
	if(complaint==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill at least the Complaints Field!</p>');
		e.preventDefault();	
	}
	else{
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:49,pid:pid,phist:phist,rectest:rectest,surg:surg,complaint:complaint,rec:rec,fin:fin},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}
function labanal(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:96},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function labbill(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:97.2},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function radbill(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:125.2},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function labrecep(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:96.2},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#cons3" ).combobox({
		select: function(event,ui){
		 var param = $('#cons3').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:96.1,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
	$( "#cons31" ).combobox({
		select: function(event,ui){
		 var param = $('#cons31').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:96.3,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
	$( "#cons3199" ).combobox({
		select: function(event,ui){
		 var param = $('#cons3199').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:96.3,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
	$( "#cons31993" ).combobox({
		select: function(event,ui){
		 var param = $('#cons31993').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:96.1,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function labreceive(pid,lid){
	
	var sample=$('#sample').val(); 
	var condition=$('#condition').val(); 
	var rejacc=$('#rejacc').val(); 
	var source=$('#source').val(); 
	var odetail=$('#odetail').val(); 
	var dept4rm=$('#dept4rm').val(); 
	var fee=$('#paid').val(); 
	
	if((fee==0)&&(dept4rm=='OPD')){
		$().customAlert();
		alert('Error!', '<p>The patient has not paid for this service.</p>');
		$('#rectest').focus();	
		return;
	}
	else if(sample==''||condition==''||rejacc==''||source==''){
	$().customAlert();
		alert('Error!', '<p>All details are required!</p>');
		$('#sample').focus();	
		return;
	}
		
	else{

	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	type:'POST',
	data:{id:49.1,pid:pid,sample:sample,condition:condition,rejacc:rejacc,lid:lid,source:source,odetail:odetail},
	success:function(data){
		$('#newstudent2').html(data);
	
	}
	});
	
		
	}
}

function importlab(){
	
	var sample=$('#sampleid1').val() + $('#sampleid2').val();
	var db=$('#labtst').val(); 
	
	
	if(sample==''||db==''){
	$().customAlert();
		alert('Error!', '<p>All details are required!</p>');
		$('#sample').focus();	
		return;
	}
		
	else{

	$("#labtestimport").html(loader);
	$.ajax({
	url:'data.php',
	type:'POST',
	data:{id:db,sample:sample},
	success:function(data){
	$('#labtestimport').html(data);
	
	}
	});
	
		
	}
}

function labres(pid,a,lid){
	
	var fee=0;
	var oname  = $('#oname').val(); 
	var inp = $('input[name=inpat]:checked').val();
	var restype  = $('#restype').val(); 
	
	if(oname==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;
	}
	
		
	else{

	removeArea('labresults',area17);
	var lab=$('#labresults').val();
	addArea('labresults',area17);
	
	
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	type:'POST',
	data:{id:50,pid:pid,lab:lab,fee:fee,oname:oname,lid:lid,restype:restype},
	success:function(data){
		$('#newstudent2').html(data);
		if(pid!=0){
		window.open('report.php?id=38&rcptno=' + lid);
			}
	
	}
	});
	
		
	}
}
function radiology(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:125},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function nursing(){
	$("#mainp").html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:144},
		success:function(data){
			$('#mainp').html(data);
		}
	});
}
function nursingclinic(){
	$("#mainp").html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:167},
		success:function(data){
			$('#mainp').html(data);
		}
	});
}
$(document).ready(function(){
	$( "#cons11" ).combobox({
		select: function(event,ui){
		 var param = $('#cons11').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:125.1,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
	$( "#cons17" ).combobox({
		select: function(event,ui){
		 var param = $('#cons17').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:145,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function nurseres(pid){
	var fee=$('#consfee').val();
	var oname=$('#oname').val();
	var inp = $('input[name=inpat]:checked').val();
	if(fee==''&&inp!=1){
	$().customAlert();
		alert('Error!', '<p>Select the payment made by the patient!</p>');
		$('#consfee').parent().find('input:first').focus();
	}
	
	else if(oname==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#rectest').focus();	
	}
	else{
	removeArea('nurseresults',area33);
	var rad=$('#nurseresults').val();
	addArea('nurseresults',area33);
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'50.2',pid:pid,rad:rad,fee:fee,oname:oname},
	success:function(data){
		$('#newstudent2').html(data);
	}
	});
	
	}
}
function uphoto(pid){
var fname  = $('#fname').val(); 
 if(fname!=''){
 	setTimeout(function() {
									
	$("#imageslog").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:126.1,pid:pid},
	success:function(data){
	$('#imageslog').html(data);
	}
	});
},3000);
	}

}

function radres(pid,a,lid){
	
	var fee=$('#paid').val(); 
	var oname  = $('#oname').val(); 
	var inp = $('input[name=inpat]:checked').val();
	
	if(oname==''||radresults==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;
	}
	else if(fee==0){
	$().customAlert();
		alert('Error!', '<p>The patient has not paid for this service.</p>');
		$('#rectest').focus();	
		return;
	}
		
	else{

	removeArea('radresults',area19);
	var rad=$('#radresults').val();
	addArea('radresults',area19);

	
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	type:'POST',
	data:{id:'50.1',pid:pid,rad:rad,fee:fee,oname:oname,lid:lid},
	success:function(data){
		$('#newstudent2').html(data);
		if(pid!=0){
		window.open('report.php?id=39&rcptno=' + lid);
			}
	
	}
	});
	
		
	}
}
function procpres(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:98},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#cons4" ).combobox({
		select: function(event,ui){
		 var param = $('#cons4').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:23,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function savepresc(pid){
	var diag=$('#diagnosis').val();
	var med=$('#medication').val();
	var fin = $('input[name=finishent]:checked').val();
	if(fin==1){fin=1}else {fin=0}
	if(diag==''){
	$().customAlert();
		alert('Error!', '<p>Fill the diagnosis field!</p>');
		e.preventDefault();		
	}
	else if(fin==0&&med==''){
	$().customAlert();
		alert('Error!', '<p>Fill the medication Field!</p>');
		e.preventDefault();		
	}
	else{
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:51,pid:pid,diag:diag,med:med,fin:fin},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}

function pharmacy(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:99},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#cons5" ).combobox({
		select: function(event,ui){
		 var param = $('#cons5').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:113,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function humanise (diff) {
  // The string we're working with to create the representation
  var str = '';
  // Map lengths of `diff` to different time periods
  var values = {
    ' year': 365, 
    ' month': 30, 
    ' day': 1
  };

  // Iterate over the values...
  for (var x in values) {
    var amount = Math.floor(diff / values[x]);

    // ... and find the largest time value that fits into the diff
    if (amount >= 1) {
       // If we match, add to the string ('s' is for pluralization)
       str += amount + x + (amount > 1 ? 's' : '') + ' ';

       // and subtract from the diff
       diff -= amount * values[x];
    }
  }

  return str;
}




$('#dob').keyup(function() {
	
	var dob = $(this).val();
	if(dob.length<10){
	$('#age').val('');
	}
	if(dob.length>9){
	var yr=dob.substr(6,4);
	var tdate = $('#tdate').val();

	if(yr <= tdate){
			
					var today=new Date();
					var dd=today.getDate();
					var mm=today.getMonth()+1;
					var yyyy=today.getFullYear();
					if(dd<10){dd='0'+dd}
					if(mm<10){mm='0'+mm}
						today=mm+'/'+dd+'/'+yyyy;
					
						var a=dob.substr(0,2);
						var b=dob.substr(3,2);
						var c=dob.substr(6,4);
						var y=b+'/'+ a +'/'+ c;
						
						
						
						var today=new Date("" + today + "");
						var y=new Date("" + y + "");
						var  timeDiff=today.getTime() - y.getTime();
						if(timeDiff==0){
						$('#age').val('0 days');
						return;
						}
						if(timeDiff<0){
							
							return;
						}
						var diffDays=Math.ceil(timeDiff/(1000*3600*24));
						var age=humanise(diffDays);
						$('#age').val(age);
	}
	}
	});


function calcage(dob){
if(dob.length<10){
	$('#age').val('');
	}
	if(dob.length>9){
	var yr=dob.substr(6,4);
	var tdate = $('#tdate').val();

	if(yr <= tdate){
			
					var today=new Date();
					var dd=today.getDate();
					var mm=today.getMonth()+1;
					var yyyy=today.getFullYear();
					if(dd<10){dd='0'+dd}
					if(mm<10){mm='0'+mm}
						today=mm+'/'+dd+'/'+yyyy;
					
						var a=dob.substr(0,2);
						var b=dob.substr(3,2);
						var c=dob.substr(6,4);
						var y=b+'/'+ a +'/'+ c;
						
						
						
						var today=new Date("" + today + "");
						var y=new Date("" + y + "");
						var  timeDiff=today.getTime() - y.getTime();
						if(timeDiff==0){
						$('#age').val('0 days');
						return;
						}
						if(timeDiff<0){
							
							return;
						}
						var diffDays=Math.ceil(timeDiff/(1000*3600*24));
						var age=humanise(diffDays);
						$('#age').val(age);
	}
	}	
}

function paycons(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:103},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function conspay(){

var name = $('#name').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var amount = $('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var apaid = $('#apcons').val();
var change = $('#change').val()
		if(amount==''){
			$().customAlert();
			alert('Error!', '<p>Enter the Consultation Charge!</p>');
			$('#amount').focus();
			}
			else if(apaid==''){
			$().customAlert();
			alert('Error!', '<p>Enter the amount paid!</p>');
			$('#apcons').focus();
			}
			else if((parseInt(apaid,10)<parseInt(amount,10))){
				$().customAlert();
				alert('Error!', '<p>The amount paid is less than the Consultation Charge!</p>');
				$('#apcons').focus();
				}
			else if(name==''){
			$().customAlert();
			alert('Error!', '<p>Enter the patient name!</p>');
			$('#ampaid').focus();
			}
	else{
		$("#mainp").html(loader);
	$.ajax({
		url:'data.php',
		data:{id:53,name:name,amount:amount,apaid:apaid,change:change},
		success:function(data){
		$('#mainp').html(data);
		}
		});	
		}	
}

function newpay(a){
$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:36.1,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function paynew(auto,a){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:a,auto:auto},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function setcons(auto,am){
	$('#auto').val(auto);
	$('#consult').val(am);
}

function paylab(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:105},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#cons2" ).combobox({
		select: function(event,ui){
		 var param = $('#cons2').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:106,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function sublab(pid){

var lab = $('#lfee').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var amount = $('#amountl').val();
var name = $('#oname').val();
var change = $('#changeam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		if(lab==''){
			$().customAlert();
			alert('Error!', '<p>Enter the lab charge!</p>');
			$('#lfee').focus();
			}
			else if(amount==''){
			$().customAlert();
			alert('Error!', '<p>Enter the amount paid!</p>');
			$('#amountl').focus();
			}
		else if((parseInt(amount,10)<parseInt(lab,10))){
		$().customAlert();
		alert('Error!', '<p>The amount paid is less than the Lab Charge!</p>');
		$('#amountl').focus();
		}
			
		
	else{
		$('#newstudent').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:54,pid:pid,lab:lab,amount:amount,change:change,name:name},
		success:function(data){
		$('#newstudent').html(data);
		}
		});	
		}	
}
function upt_all_items_with_blank_otcprice(){
		$('#django').html(loader);
		$.ajax({
			url:'datarep.php',
			data:{id:29},
			success:function(data){
			 $('#django').html(data);
			}
		});
}
$(document).ready(function(){
$('#amountl').keyup(function() {
	var lfee = $('#lfee').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var amount = $(this).val();
	var change=parseInt(amount,10) - parseInt(lfee,10);
	change=(change).formatMoney(2, '.', ',');
	$('#changeam').val(change);
	});
});

function disdrugs(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:107},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#cons6" ).combobox({
		select: function(event,ui){
		 var param = $('#cons6').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:113,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function subdrugs(pid,num){

	var b=0;
	for (var i=0; i < num; i++) {
	var a = $('input[name=check'+ i + ']:checked').val();
	if(a!=1){
		b=1;
	}
	}
	if(b==1){
		
		$.confirm({
			'title'		: 'Continue Confirmation',
			'message'	: 'Some items in the checklist are not checked. <br/>Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){

	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:55,pid:pid},
	success:function(data){
	$('#newstudent').html(data);
	}
	});
	
		}
			},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}
	
	else{
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:55,pid:pid},
	success:function(data){
	$('#newstudent').html(data);
	}
	});
	}
}

$(document).ready(function(){
$('#apcons').keyup(function() {
	var cfee = $('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var amount = $(this).val();
	var change=parseInt(amount,10) - parseInt(cfee,10);
	change=(change).formatMoney(2, '.', ',');
	$('#change').val(change);
	});
  
  $('#pnt4').combobox({});

});

function homepage(){
	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:108},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function stockissuetouser(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:166},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function submitstockuse2(){
var bid = $('#brancht').val();
var bname=$('#brancht option:selected').text();
var itcode= $('#itemname').val();
var qty= $('#qty').val();
var notes = $('#notes').val();
var usernm = $('#acname3').val();
		if(bid==''){
		$().customAlert();
		alert('Error!', '<p>No Branch/department selected!</p>');
		$('#brancht').parent().find('input:first').focus();
		}
		else if(itcode==''){
		$().customAlert();
		alert('Error!', '<p>No Item selected!</p>');
		$('#itemname').parent().find('input:first').focus();
		}
		else if(qty==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity used!</p>');
		$('#qty').focus();
		}
		else if(notes==''){
		$().customAlert();
		alert('Error!', '<p>Enter the details!</p>');
		$('#notes').focus();
		}else if(usernm==''){
		$().customAlert();
		alert('Error!', '<p>select User!</p>');
		$('#usernm').focus();
		}
	else{
		$('#postresp').html('<img id="img-spinner" src="images/load.gif"  alt="Loading"/>');
		$.ajax({
		url:'data.php',
		data:{id:150,itcode:itcode,bid:bid,bname:bname,notes:notes,qty:qty,usernm:usernm},
		success:function(data){
		$('#postresp').html(data);
		}
		});	
		}	
}

function refreshtoday(){
	$("#todayev").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:109},
	success:function(data){
	$('#todayev').html(data);
	}
	});
}

function refreshtoday2(pid){
	$("#tabs-14").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'95.7',patid:pid},
	success:function(data){
	$('#tabs-14').html(data);
	}
	});
}
function refreshencounters(){
	$("#encounters").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:110},
	success:function(data){
	$('#encounters').html(data);
	}
	});
}
function refreshmytasks(){
	$("#mytasks").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:111},
	success:function(data){
	$('#mytasks').html(data);
	}
	});
}

function refreshpatients(){
	$("#recentpat").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:112},
	success:function(data){
	$('#recentpat').html(data);
	}
	});
}

function checktask(i,a){
	
	$.ajax({
	url:'data.php',
	data:{id:56,a:a},
	success:function(data){
	$('#task' + i).hide();
	}
	});
}
function checkmess(i,a){
	$.ajax({
	url:'data.php',
	data:{id:'56.1',a:a},
	success:function(data){
	$('#lebo' + i).css({'font-weight' : 'normal'});
	$('#lebo' + i).css({'background' : '#fff'});
	$('#check' + i).hide();
	$('#messagelog').dialog( 'close' );
	}
	});
}
function checkall(a){
	$("#messaudio").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'56.3',a:a},
	success:function(data){
	$('#messagelog').dialog( 'close' );
	}
	});
}
function showtaskadd(){
	$('#taskadd').show();
}
function hidetaskadd(){
	$('#taskadd').hide();
}

function posttask(uid){
	var task=$('#taskfield').val();
	if(task!=''){	
	$("#mytasks").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:57,task:task,uid:uid},
	success:function(data){
	$('#mytasks').html(data);
	}
	});
	 }
}
function showrem(){
	var rem = $('input[name=remind]:checked').val();
	if(rem==1){
	$('#showrem').show();

	}
	else{
		$('#showrem').hide();
		
	}
	
}
function showrec(){
	var rec = $('input[name=reccur]:checked').val();
	if(rec==1){
	$('#showrec').show();

	}
	else{
		$('#showrec').hide();
		
	}
	
}

function showrem2(){
	var rem = $('input[name=remind2]:checked').val();
	if(rem==1){
	$('#showrem2').show();

	}
	else{
		$('#showrem2').hide();
		
	}
	
}
function newtasks(){
	var subj=$('#subject').val();
	var crex=$('#crex').val();
	var eid=$('#eid').val();
	var loc=$('#location').val();
	var cate=$('#category').val();
	var due=$('#datepick').val();
	var duet=$('#time1').val() + ':' + $('#time2').val() + '' + $('#time3').val();
	var star=$('#datepick2').val();
	var start=$('#time4').val() + ':' + $('#time5').val() + '' + $('#time6').val();
	var rem=$('#datepick3').val();
	var remt=$('#time7').val() + ':' + $('#time8').val() + '' + $('#time9').val();
	var status=$('#status').val();
	var pri=$('#priority').val();
	var comp=$('#completer').val();
	var remind = $('input[name=remind]:checked').val();
	if(remind!=1){
		remind=0;
	}
	var notes=$('#notes').val();
	if(subj!=''){	
	$("#taskstud").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0px 0 130px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:58,subj:subj,loc:loc,cate:cate,due:due,duet:duet,star:star,start:start,rem:rem,remt:remt,status:status,pri:pri,comp:comp,notes:notes,remind:remind,crex:crex,eid:eid},
	success:function(data){
	$('#taskstud').html(data);
	}
	});
	 }
	 else{
		$().customAlert();
			alert('Error!', '<p>Enter the subject field!</p>');
			$('#subject').focus(); 
	 }
}

function viewtask(eid,subj,cate,loc,tstatus,pri,comp,star,start,due,duet,rstatus,rem,remt,status,uid,notes){
	$( "#ncalendar" ).dialog( "open" );
	$('#crex').val(2);
	$('#subject').val(subj);$('#location').val(loc);$('#category').val(cate);
	$('#datepick').val(due);$('#time1').val(duet.substr(0,2));$('#time2').val(duet.substr(3,2));$('#time3').val(duet.substr(5,2));
	$('#datepick2').val(due);$('#time4').val(start.substr(0,2));$('#time5').val(start.substr(3,2));$('#time6').val(start.substr(5,2));
		$('#status').val(tstatus);	$('#priority').val(pri);$('#completer').val(comp);
		if(rstatus==1){
			$('#showrem').show();
			$("#remind").prop("checked",true);
			$('#datepick3').val(rem);$('#time7').val(remt.substr(0,2));$('#time8').val(remt.substr(3,2));$('#time9').val(remt.substr(5,2));
		}else  {$('#showrem').show();}
		$('#notes').val(notes);$('#eid').val(eid);
		return false;
}

function taskrem(eid,reason,due,duet){
		$( "#mytask" ).dialog( "open" );
		$( "#mytask" ).html('<img src="images/attend.png" style="float:right;"/><p><strong>Subject: </strong>' + reason + '<br/><strong>Due Date: </strong>' + due + '<br/><strong>Due Time: </strong>' + duet + '</p><strong>Snooze:</strong><select id="snooze" onchange="snooze(' + eid + ')" style="margin-left:5px"><option value="0">0 Mins</option><option value="5">5 Mins</option><option value="10">10 Mins</option><option value="30">30 Mins</option></select><div id="xex"></div>');
}

function taskcal(eid,reason,due,duet,pat){
		$( "#mycalendar" ).dialog( "open" );
		$( "#mycalendar" ).html('<img src="images/attend.png" style="float:right;"/><p><strong>Patient: </strong>' + pat + '<br/><strong>Subject: </strong>' + reason + '<br/><strong>Start Date: </strong>' + due + '<br/><strong>Start Time: </strong>' + duet + '</p><strong>Snooze:</strong><select id="snooze2" onchange="snoozee(' + eid + ')" style="margin-left:5px"><option value="0">0 Mins</option><option value="5">5 Mins</option><option value="10">10 Mins</option><option value="30">30 Mins</option></select><div id="yex"></div>');
}


function snooze(eid){
	var sno=$('#snooze').val();
	$.ajax({
	url:'data.php',
	data:{id:59,sno:sno,eid:eid},
	success:function(data){
	$('#xex').html(data);
	}
	});
}

function snoozee(eid){
	var sno=$('#snooze2').val();
	$.ajax({
	url:'data.php',
	data:{id:62,sno:sno,eid:eid},
	success:function(data){
	$('#yex').html(data);
	}
	});
}

function newevents(){
	var pat=$('#pname2').val();
	var pid=$('#pidd2').val();
	var subj=$('#subject2').val();
	var crex=$('#crex2').val();
	var eid=$('#eid2').val();
	var loc=$('#location2').val();
	var cate=$('#category2').val();
	var star=$('#datepick6').val();
	var start=$('#time12').val() + ':' + $('#time22').val() + '' + $('#time32').val();
	var end=$('#datepick7').val();
	var endt=$('#time42').val() + ':' + $('#time52').val() + '' + $('#time62').val();
	var rem=$('#datepick8').val();
	var remt=$('#time72').val() + ':' + $('#time82').val() + '' + $('#time92').val();
	var recs=$('#datepick4').val();
	var rece=$('#datepick5').val();
	var rpat=$('#recpattern').val();
	var status=$('#status2').val();
	var pri=$('#priority2').val();
	var comp=$('#completer2').val();
	var remind = $('input[name=remind2]:checked').val();
	if (pid==''){
		$().customAlert();
			alert('Error!', '<p>Select a patient!</p>');
			$('#patname14').parent().find('input:first').focus();
	 }else{
	if(remind!=1){
		remind=0;
	}
	var reccur = $('input[name=reccur]:checked').val();
	if(reccur!=1){
		reccur=0;
	}
	var notes=$('#notes2').val();
	if(subj!=''){	
	$("#taskevent").html('<img id="img-spinner" src="images/load.gif" style="margin:10px 0px 0 130px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:61,pid:pid,subj:subj,loc:loc,cate:cate,end:end,endt:endt,star:star,start:start,rem:rem,remt:remt,status:status,pri:pri,comp:comp,notes:notes,remind:remind,crex:crex,eid:eid,recs:recs,rece:rece,rpat:rpat,reccur:reccur,pat:pat},
	success:function(data){
	$('#taskevent').html(data);
	}
	});
	 }
	 else{
		$().customAlert();
			alert('Error!', '<p>Enter the subject field!</p>');
			$('#subject2').focus(); 
	 }
}
}
function setpnt(a){
$('#pidd2').val(a);	
}
function viewevent(eid,subj,cate,loc,tstatus,pri,comp,star,start,end,endt,rstatus,rem,remt,status,uid,notes,rstat,rpat,recs,rece,pat,pid){
	$( "#nevent" ).dialog( "open" );
	if(rstatus==1){
			$('#showrem2').show();
			$("#remind2").prop("checked",true);
			$('#datepick8').val(rem);$('#time72').val(remt.substr(0,2));$('#time82').val(remt.substr(3,2));$('#time92').val(remt.substr(5,2));
	}else  {$('#showrem2').show();}
		if(rstat==1){
			$('#showrec').show();
			$("#reccur").prop("checked",true);
			$('#datepick4').val(recs);$('#datepick5').val(rece);$('#recpattern').val(rpat);
		}else  {$('#showrec').show();}
	$('#crex2').val(2);
	$('#pname2').val(pat);
	$('#pidd2').val(pid);
	$('#subject2').val(subj);$('#location2').val(loc);$('#category2').val(cate);
	$('#datepick6').val(star);$('#time12').val(start.substr(0,2));$('#time22').val(start.substr(3,2));$('#time32').val(start.substr(5,2));
	$('#datepick7').val(end);$('#time42').val(endt.substr(0,2));$('#time52').val(endt.substr(3,2));$('#time62').val(endt.substr(5,2));
	$('#status').val(tstatus);	$('#priority').val(pri);$('#completer').val(comp);
	$('#notes2').val(notes);$('#eid2').val(eid);
	$('#datepick2').val(due);$('#time4').val(start.substr(0,2));$('#time5').val(start.substr(3,2));$('#time6').val(start.substr(5,2));
		
		
		return false;
}



function delpnt(patid){
	
	$("#mainp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:64,patid:patid},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function addoc(){
	$('#dok').fadeIn();
}
function hidedoc(){
	$('#dok').fadeOut();
}
function inpatient(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:115},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function openward(a,b,c,d,e,f){
	$("#warddialog" ).dialog( "open" );
	$("#yepyep").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:44},
	success:function(data){
	$('#yepyep').html(data);
	}
	});
	$('#pnt4').parent().find('input:first').focus().width(240);
	$('#bednoo').val(d);
	$('#roomno').val(c);
	$('#roomtype').val(b);
	$('#wardtype').val(a);
	$('#bbid').val(f);
	$('#a').val(e);
	return false;
}



function repfinalb(a){	
	$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
	$.ajax({
	url:'link.php',
	data:{id:'136',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function admitpatient(){
var a = $('#a').val();
var bno = $('#bednoo').val();
var bid = $('#bbid').val();
var rno = $('#roomno').val();
var rtype = $('#roomtype').val();
var wtype = $('#wardtype').val();
var pntno = $('#pnt4').val();
var pntname=$('#pnt4 option:selected').text();

			if(pntno==''){
			$().customAlert();
			alert('Error!', '<p>Select a patient!</p>');
			}
			else{
		$('#wod').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:65,bno:bno,rno:rno,rtype:rtype,wtype:wtype,pntno:pntno,pntname:pntname,a:a,bid:bid},
		success:function(data){
		$('#wod').html(data);
		}
		});	
		}	
}
function dischargepatient(a,b,c){
		$('#dis' + a + b).html(loader);
		$("#bedan").html(loader);
		$.ajax({
		url:'data.php',
		data:{id:66,rno:b,bno:a,patid:c},
		success:function(data){
		$('#dis' + a + b).html(data);
		$('#bedan').html(data);
		$("#progress").prop("disabled",true);
		$("#progress").css({'border' : 'solid #DC2626 1px'});
		$("#docnotes").prop("disabled",true);
		$("#docnotes").css({'border' : 'solid #DC2626 1px'});
		}
		});	
}

function payward(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:116},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function wardpay(){

var name = $('#pnt4').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var amount = $('#amount').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var apaid = $('#apcons').val();
var change = $('#change').val()
			if(name==''){
			$().customAlert();
			alert('Error!', '<p>Enter the patient name!</p>');
			$('#ampaid').focus();
			}
			else if(amount==''){
			$().customAlert();
			alert('Error!', '<p>Enter the Inpatient Charges!</p>');
			//$('#amount').focus();
			}
			else if(apaid==''){
			$().customAlert();
			alert('Error!', '<p>Enter the amount paid!</p>');
			$('#apcons').focus();
			}
			else if((parseInt(apaid,10)<parseInt(amount,10))){
				$().customAlert();
				alert('Error!', '<p>The amount paid is less than the Consultation Charge!</p>');
				$('#apcons').focus();
				}
		
	else{
		$("#mainp").html(loader);
	$.ajax({
		url:'data.php',
		data:{id:67,name:name,amount:amount,apaid:apaid,change:change},
		success:function(data){
		$('#mainp').html(data);
		}
		});	
		}	
}
function inprogress(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:117},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#cons7" ).combobox({
		select: function(event,ui){
		 var param = $('#cons7').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:118,patid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
});
function subprogress(patid){
	var rec = $('input[name=recnew]:checked').val();
	if(rec==1){rec=1}else {rec=0}
	var notes=$('#notes').val();
	if(notes==''){
	$().customAlert();
		alert('Error!', '<p>No progress notes made!</p>');
		e.preventDefault();	
	}
	else{	
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:68,patid:patid,notes:notes,rec:rec},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}
function disclaimer(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:119},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function logout(){	

	$.confirm({
			'title'		: 'Logout Confirmation',
			'message'	: 'You are about to Logout from the system. <br/>Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){

				window.location.href = "index.php"
	
		}
			},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}

function xx(date,x,y){	

	$.confirm({
			'title'		: 'Pending Entry Alert',
			'message'	: 'This client has a pending entry in the ' + x + ' stage dated ' + date + '. <br/>Continue to add another Entry?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'gray',
					'action': function(){
						yy(y);
						}	
				},
				'No'	: {
					'class'	: 'blue',
					'action': function(){

				$('#newstude').hide();
	
		}
					
				}
			}
		});
	
	}
function yy(code){
	$.ajax({
	url:'data.php',
	data:{id:'31.7',code:code},
	success:function(data){
	}
	});
}	
function rollback(x,pid,stage){	

	$.confirm({
			'title'		: 'Roll Back Confirmation',
			'message'	: 'You are about to roll back this entry to the ' + stage + ' stage.<br/>Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){

	$("#mainp").html('');
	$.ajax({
	url:'data.php',
	data:{id:63,pid:pid,x:x},
	success:function(data){
	$('#mainp').html(data);
	}
	});
	
		}
			},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}
function about(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:120},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function aboutdiv(a){
	for(i=0;i<15;i++){
	$('#div' + i).hide(); 
	$("#link" + i).css({'color' : '#333'});	
	}	
	$('#div' + a).fadeIn();
	$('#link'+ a ).css({'color' : '#10504F'});
 }

 function editvariables(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:47.5},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function addnewvar(){
var cat = $('#cat1').val();
var name = $('#name1').val();
 if(name==''||cat==''){
		$().customAlert();
		alert('Error!', '<p>Select a category and enter the name!</p>');
		e.preventDefault();
		}
		else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:146,name:name,cat:cat},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}
}
function changecatt(){
	 var str = $('#cat2').val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var b=parts[1];
 	for(i=0;i<13;i++){
	$('#opt' + i).hide(); 
	}	
	
	 $('#opt'+a).show();
	$('#name2').val('');
}
function setvar(a){
	var str = $('#syscat'+a).val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var b=parts[1];
	$('#name2').val(b);	
}

function editvar(){
	
	 var str = $('#cat2').val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var sysvar=parts[1];
	 
	var str = $('#syscat'+a).val();
	 var parts=str.split('θ',2);
	 var bid=parts[0];
	var vname=$('#name2').val();
	
	if(sysvar==''){
		$().customAlert();
		alert('Error!', '<p>Select a category!</p>');
		}
		else if(vname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the variable name!</p>');
		}
		
	else{
	$("#res4").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:147,sysvar:sysvar,vname:vname,bid:bid},
	success:function(data){
	$('#res4').html(data);
	}
	});
	}
}

function delvar(){
	
	 var str = $('#cat2').val();
	 var parts=str.split('θ',2);
	 var a=parts[0];
	 var sysvar=parts[1];
	 
	var str = $('#syscat'+a).val();
	 var parts=str.split('θ',2);
	 var bid=parts[0];
	var vname=parts[1];
	
	if(sysvar==''){
		$().customAlert();
		alert('Error!', '<p>Select a category!</p>');
		}
	else{
	$("#res4").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:148,sysvar:sysvar,bid:bid,vname:vname},
	success:function(data){
	$('#res4').html(data);
	}
	});
	}
}
 function editcompany(){
var elem = $(this).closest('.item');
var cname = $('#cname').val();
var tel = $('#tel').val();
var add = $('#add').val();
var web = $('#web').val();
var email = $('#email').val();	
var motto = $('#motto').val();
var loc = $('#loc').val();

		if(cname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Company Name!</p>');
		e.preventDefault();
		}
		else if(tel==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Company Telephone No.!</p>');
		e.preventDefault();
		}
		else if(add==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Company Address!</p>');
		e.preventDefault();
		}
		else{
		
	$('#res2').html('<img id="img-spinner" src="images/load.gif" style="margin-top:30px" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:19,cname:cname,tel:tel,add:add,add:add,web:web,email:email,motto:motto,loc:loc},
	success:function(data){
	$('#res2').html(data);
	}
	});
				
		}
}
function deluser(){
	
	var user = $('#stamper').val();
	if(user==1){
	$().customAlert();
		alert('Error!', '<p>You cannot delete the Admin User!</p>');
		e.preventDefault();		
	}
	if(user==''){
		$().customAlert();
		alert('Error!', '<p>Select a User!</p>');
		e.preventDefault();
		}
		else{
		$.confirm({
			'title'		: 'Delete User Confirmation',
			'message'	: 'You are about to delete this user from the system. This cannot be reversed later. Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#res2").html('<img id="img-spinner" src="images/load.gif" style="margin:40px 0 0 10px;" alt="Loading"/>');
	$.ajax({
	url:'data.php',
	data:{id:69,user:user},
	success:function(data){
		$("#res2").html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		}
}

function dismisslan(param){
	
	$("#lantag" + param).hide();
	$.ajax({
	url:'hr.php',
	data:{id:'59.2',param:param,cat:'lan'},
	});
}
function dismissbach(param){
	$("#edutag" + param).hide();
	$.ajax({
	url:'hr.php',
	data:{id:'59.2',param:param,cat:'edu'},
	});
}
function dismissskl(param){
	
	$("#skilltag" + param).hide();
	$.ajax({
	url:'hr.php',
	data:{id:'59.2',param:param,cat:'skl'},
	});
}
function dismisshobby(param){
	
	$("#hobbytag" + param).hide();
	$.ajax({
	url:'hr.php',
	data:{id:'59.2',param:param,cat:'hobby'},
	});
}	
function dismissexp(param){
	$("#exptag" + param).hide();
	$.ajax({
	url:'hr.php',
	data:{id:'59.2',param:param,cat:'exp'},
	});
}	
function showcontract(){
	$('#contract').show();
}
function hidecontract(){
	$('#datepick').val('');$('#datepick2').val('');
	$('#contract').hide();
}
function showphoto(param){
	$("#picreview").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:76.1,param:param},
	success:function(data){
	$('#picreview').html(data);
	}
	});
}
function updatephoto(param){
	var name=$('#fname').val();
	var desc=$('#filedesc').val();
	var dou=$('#datepicker').val();
	$("#uphoto").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:2,param:param,name:name,desc:desc,dou:dou},
	success:function(data){
	$('#uphoto').html(data);
	}
	});
}

function deletephoto(param){
	$("#uphoto").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:3,param:param},
	success:function(data){
	$('#uphoto').html(data);
	}
	});
}
$(document).ready(function(){ 
	$( "#language" ).combobox({
		select: function(event,ui){
		var str =$('#language').val();
		var parts=str.split('θ',2)
		var k=parts[0];
		var param=parts[1];
		
		var prev=$("#languages").html();
		var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"lantag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismisslan('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div></div>";
		$('#languages').html(curr);
		$.ajax({
		url:'hr.php',
		data:{id:'59.1',param:param,k:k,cat:'lan'},
		});
		
		$('#language').parent().find("input:first").focus().val('');
		}
	});

	$("#experience" ).combobox({
		select: function(event,ui){
		var str =$('#experience').val();
		var parts=str.split('θ',2)
		var k=parts[0];
		var param=parts[1];
		
		var prev=$("#experiences").html();
		var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"exptag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissexp('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div></div>";
		$('#experiences').html(curr);
		$.ajax({
		url:'hr.php',
		data:{id:'59.1',param:param,k:k,cat:'exp'},
		});
		
		$('#experience').parent().find("input:first").text('').focus();
		}
	});

	$('#skill').on('keydown', function(ex) {
		if (!ex) ex = event;
		if (ex.keyCode==13){ 
		addskill();
		}
	});

	$("#town" ).combobox();
	
});
function addskill(){
	var param =$('#skill').val();
	var k=Math.floor((Math.random() * 50) + 1); 
	var prev=$("#skills").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"skilltag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissskl('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div></div>";
	$('#skills').html(curr);
	$.ajax({
	url:'hr.php',
	data:{id:'59.1',param:param,cat:'skl',k:k},
	});

	$('#skill').val('').focus();
	
	
}

$('#hobby').on('keydown', function(ex) {
	if (!ex) ex = event;
	if (ex.keyCode==13){ 
	addhobby();
	}
});

function addhobby(){
	var param =$('#hobby').val();
	var k=Math.floor((Math.random() * 50) + 1); 
	var prev=$("#hobbies").html();
	var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"hobbytag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismisshobby('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div>";
	$('#hobbies').html(curr);
	$.ajax({
	url:'hr.php',
	data:{id:'59.1',param:param,cat:'hobby',k:k},
	});
	
	$('#hobby').val('').focus();
	
	
}

function showedu(a){
	for(i=0;i<5;i++){
	$('#option' + i).hide(); 
	}	
	$('#option' + a).show();
	}
$(document).ready(function(){
	$("#certificate" ).combobox({
		select: function(event,ui){
		var str =$('#certificate').val();
		var parts=str.split('θ',2)
		 var k=parts[0];
		 var param=parts[1];
		
		var tag = document.getElementById("tag"+ param);
		if (!tag) {
		var prev=$("#bachelors").html();
		var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"edutag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissbach('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div>";
		$('#bachelors').html(curr);
		$.ajax({
		url:'hr.php',
		data:{id:'59.1',param:param,cat:'edu',k:k},
		});
		
		}
		}
		
	});
});

function terminate(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:150},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function termemp(){
	var emp=$('#emp55').val();
	var dot=$('#datepick').val();
	var reason=$('#reason').val();
	
	
	if(emp==''||dot==''||reason==''){
		$().customAlert();
		alert('Error!', '<p>Fill all the Required Fields!</p>');
		e.preventDefault();
		return;
	}
	
	
	$("#mainp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:133.1,emp:emp,dot:dot,reason:reason},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function documents(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:151},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function loadpdf(a){
	
	$("#display").html('<object data="hrmdocs/' +a +'" type="application/pdf" width="100%" height="95%"></object>');

}
function reqleave(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:153},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function submleave(){
	var emp=$('#pfno').val();
	var from=$('#datepick').val();
	var to=$('#datepick2').val();
	var shadow=$('#shadow').val();
	
	
	if(emp==''||from==''||to==''||shadow==''){
	$().customAlert();
		alert('Error!', '<p>Fill all the Required Fields!</p>');
		e.preventDefault();
		$('#pfno').focus();
		return;
	}
	
	var d1=from;
	var d2=to;
	var g=d1.substr(8,2);
	var h=d1.substr(5,2);
	var i=d1.substr(0,4);
	var j=i+h+g;
	var x=h+'/'+ g +'/'+ i;

	var g=d2.substr(8,2);
	var h=d2.substr(5,2);
	var i=d2.substr(0,4);
	var k=i+h+g;
	var y=h+'/'+ g +'/'+ i;
	
	
	 //mm/dd/yyyy
	 var d11=new Date("" + x + "");
	 var d22=new Date("" + y + "");
	 var  timeDiff=Math.abs(d22.getTime() - d11.getTime());
	 var diffDays=Math.ceil(timeDiff/(1000*3600*24));
	
	
	$("#mainp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:135,emp:emp,from:from,to:to,shadow:shadow,days:diffDays},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function authleave(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:154},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function leaveauth(a){
	var action=$('#action'+a).val();
		$.confirm({
			'title'		: 'Leave Authorization',
			'message'	: action + ' Leave?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
			$.ajax({
				url:'data.php',
				data:{id:136,action:action,a:a},
				success:function(data){
				$("#leave"+a).html('');
				}
			});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){
						
						}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
}

function leavecal(){
		$('#shortie').fadeOut(0);$('#shortvalue').val(0);	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:155},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function showleaves(){
	var d1 = $('#datepicker3').val();
	var d2 = $('#datepicker4').val();
	if(d1==''){
	$().customAlert();
		alert('Error!', '<p>Pick a valid date!</p>');
		 $('#datepicker4').focus();
		return;
	}
	var g=d1.substr(0,2);
	var h=d1.substr(3,2);
	var i=d1.substr(6,4);
	var j=i+h+g;
	var x=i+ h + g;
	
	var g=d2.substr(0,2);
	var h=d2.substr(3,2);
	var i=d2.substr(6,4);
	var j=i+h+g;
	var y=i+ h + g;
	
	$("#display").fadeOut(500);
	$.ajax({
	url:'hr.php',
	data:{id:19,stamp1:x,stamp2:y},
	success:function(data){
	$('#display').html(data);
	$("#display").fadeIn(500);
	}
	});
}
function newemp(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:59},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addnewemp(a){
	var emp=$('#emp').val();
	var fname=$('#fname').val();
	var mname=$('#mname').val();
	var lname=$('#lname').val();
	var dob=$('#dob').val();
	var mar=$('#mar').val();
	var gender = $('input[name=gender]:checked').val();
	var idno=$('#idno').val();
	var phone=$('#phone').val();
	var phone2=$('#phone2').val();
	var email=$('#emailadd').val();
	var phy=$('#phyadd').val();
	var town=$('#town').val();
	
	if(fname==''||mname==''||lname==''||idno==''||phone==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required Fields in the Personal Details Sub-Panel!</p>');
		return;
	}
	
	var sal=$('#sal').val();
	var doe=$('#datepick').val();
	var emptype = $('input[name=emptype]:checked').val();
	var dept=$('#dept').val();
	var pos=$('#pos').val();
	var jobdesc=$('#jobdesc').val();
	var contfrom=$('#datepick2').val();
	var contto=$('#datepick3').val();
	var branch=$('#branch').val();
	
	if(sal==''||doe==''||branch==''||emptype==''||dept==''||pos==''||(emptype=='Contract'&&(contfrom==''||contto==''))){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required Fields in the Employment Details Sub-Panel!</p>');
		return;
	}
	
	var bgroup=$('#bgroup').val();
	var alergy=$('#alergy').val();
	
	var ename=$('#ename').val();
	var ephone=$('#ephone').val();
	var epostal=$('#epostal').val();
	
	if(ename==''||ephone==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required Fields in the Emergency Contact Details Sub-Panel!</p>');
		return;
	}
	
	var str=$('#bank').val();
	var parts=str.split('#',2);
	var bid=parts[0];
    var bname=parts[1];
	
	if(!bname){bname='';}
	var acno=$('#acno').val();
	var pinno=$('#pinno').val();
	var nhif=$('#nhif').val();
	var nssf=$('#nssf').val();
	

	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:39,a:a,emp:emp,fname:fname,mname:mname,lname:lname,dob:dob,mar:mar,gender:gender,idno:idno,phone:phone,phone2:phone2,email:email,phy:phy,town:town,sal:sal,doe:doe,emptype:emptype,pos:pos,dept:dept,jobdesc:jobdesc,contfrom:contfrom,contto:contto, bgroup:bgroup,alergy:alergy,ename:ename,ephone:ephone,epostal:epostal,bid:bid,bname:bname,acno:acno,pinno:pinno,nhif:nhif,nssf:nssf,branch:branch},
	success:function(data){
	$('#newstudent').html(data);
	
	}
	});
}

$(document).ready(function(){
	$( "#stude4" ).combobox({
		select: function(event,ui){
		 var param = $('#stude4').val();
		 var ser = $('#ser').val();
		 if(ser==74){
				$.confirm({
				'title'		: 'Delete Confirmation',
				'message'	: 'You are about to remove this record from the Database. <br/>This cannot be restored at a later time! Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'blue',
						'action': function(){
		$("#mainp").html(loader);
				$.ajax({
					url:'hr.php',
					data:{id:ser,param:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
						}
					},
					'No'	: {
						'class'	: 'gray',
						'action': function(){$('#mainp').html('');}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
		 
			 
		 }
		 else{
		$("#mainp").html(loader);
				$.ajax({
					url:'hr.php',
					data:{id:ser,param:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
		}
	});
});
function seeemp(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:60,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function empchart(param){
	$("#mainp").html(loader);
			$.ajax({
				url:'hr.php',
				data:{id:62.1,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
}
function cate(){
	var a=$('#categ').val();
	$("#cate1").hide();
	$("#cate2").hide();
	$("#cate3").hide();
	$("#cate4").hide();
	$("#cate" + a).show();
	
}

function categchange(a,b){
	var param =$("#category" + a).val();
	catepage(3,1,param,b);	
}
$(document).ready(function(){
	$( "#emp1" ).combobox({
		select: function(event,ui){
		 var param = $('#emp1').val();
		paginate(5,param);
		}
	});
	$( "#emp2" ).combobox({
		select: function(event,ui){
		 var param = $('#emp2').val();
		paginate(10,param);
		}
	});

});
function editemp(emp){
	var emp=$('#emp').val();
	var name=$('#name').val();
	var oname=$('#oname').val();
	var dob=$('#dob').val();
	var gender = $('input[name=gender]:checked').val();
	var dept=$('#dept').val();
	var pos=$('#pos').val();
	var phone=$('#phone').val();
	var address=$('#address').val();
	var bgroup=$('#bgroup').val();
	var alergy=$('#alergy').val();
	var image=$('#stamp').val();
	if(emp==''||name==''||oname==''||address==''||phone==''||pos==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required Fields!</p>');
		e.preventDefault();		
	}
	$("#newemp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:40,emp:emp,name:name,oname:oname,dob:dob,gender:gender,pos:pos,dept:dept,phone:phone,address:address, bgroup:bgroup,alergy:alergy,image:image},
	success:function(data){
		$('#newemp').html(data);
	
	}
	});
}
function categemp(){
	var param =$("#categ").val();
	catepage(6,1,param,0);	
}
function findemp(){
	var param='default';
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:62,param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function exemp(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:76},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function takeatt(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:73},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function checkatt(a){

	var d = new Date();
	var n = d.getMonth(); 
	n++;

	var n=n.toString();
	
	if(n.length==1){
	n=0+n;
	}

	var d = new Date();
	var m = d.getFullYear(); 
	var cur=n + '_' + m;
		
	var action=$('#action'+a).val();
	var d1=$('#datepick').val();
	
	var h=d1.substr(5,2);
	var i=d1.substr(0,4);
	var x=h + '_' + i;
	
	if(cur!=x){
	$().customAlert();
		alert('Error!', '<p>Cannot edit Attendance Logs for  Months other than the current Month!</p>'+x);
		return;	
	}
	
	if(action==1){
	$("#back"+a).css({'background' : '#0f6'});
	}
	else if(action==2){
	$("#back"+a).css({'background' : '#0369A1'});
	}
	else if(action==3){
	$("#back"+a).css({'background' : '#ff3'});
	}
	else{
	$("#back"+a).css({'background' : '#DC2626'});
	}
	$.ajax({
	url:'data.php',
	data:{id:134,action:action,a:a,tdate:d1},
	success:function(data){

	if(data=='0'){
		$("#back"+a).css({'background' : '#DC2626'});
		$('#action'+a).val(0);
	}
	
	$('#resu').html('');
	}
	});
}
function showattendance(){
	var d1 = $('#datepick').val();
	if(d1==''){
	$().customAlert();
		alert('Error!', '<p>Pick a valid date!</p>');
		 $('#datepicker3').focus();
		return;
	}
	var g=d1.substr(8,2);
	var h=d1.substr(5,2);
	var i=d1.substr(0,4);
	var x=h + '_' + i;
	$("#display").fadeOut(500);
	$.ajax({
	url:'hr.php',
	data:{id:152,mon:x,tdate:g,d1:d1},
	success:function(data){
	$('#display').html(data);
	$("#display").fadeIn(500);
	}
	});
}
function checkemp(regn,att,tot,a){

$('#save' + a + regn).html(loader);
	$.ajax({
	dataType : 'html',
	url:'data.php',
	data:{id:41,regn:regn,att:att,tot:tot,a:a},
	success:function(data){
	$('#save' + a + regn).html(data);
	}
	});
}
$(document).ready(function(){
	$("#ledger" ).combobox({});	
});

function ledgers(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:121},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function openlen(){
$( "#newledger" ).dialog( "open" );
}
// function addnewledger(){
// 	var ledger=$('#ledgername').val();
// 	var type=$('#ledgertype').val();
// 	var cat=$('#ledgercat').val();
// 	if(ledger==''){
// 	$().customAlert();
// 		alert('Error!', '<p>Make Sure you fill the LedgerName Field!</p>');
// 		e.preventDefault();		
// 	}
// 	else{	
// 	$("#newled").html(loader);
// 	$.ajax({
// 	url:'data.php',
// 	data:{id:'29.2',ledger:ledger,type:type,cat:cat},
// 	success:function(data){
// 		$('#newled').html(data);
	
// 	}
// 	});
// 	}
// }
function addnewledger(){
		var ledger=$('#ledgername').val();
		var type=$('#ledgertype').find(':selected').val();
		var cat=$('#ledgercat').find(':selected').val();
		var newledgerhassubledgers_cb=document.getElementById('newledgerhassubledgers_cb');
		if(newledgerhassubledgers_cb.checked){newledgerhassubledgers_cb=1;
		}else{newledgerhassubledgers_cb=0;}
		if(ledger=='' || type=='' || cat=='' ){
				$().customAlert();
					alert('Error', '<p>All fields are required.</p>');
					return false;		
		}
		else{	
				$("#newled").html(loader);
				$.ajax({
						url:'./r/data.php',
						type:'post',
						data:{src_id:2,ledger:ledger,type:type,cat:cat,newledgerhassubledgers_cb:newledgerhassubledgers_cb},
						success:function(data){
							$('#newled').html(data);
							setTimeout(() => {
									//$( "#newledger" ).dialog( "close" );
									window.location.reload(true);
							}, 500);
						},
						error: function(err){
							window.open('./index.php');
							return false;
						}
				});
		}

}

function openNewSubledgerDialog(){
	$( "#newsubledger_dialog" ).dialog( "open" );
}

function addNewSubledger(){
		var new_subledger_ledgerid=$('#new_subledger_ledgerid').find(':selected').val();
		var new_subledger_name=$('#new_subledger_name').val();
		if(new_subledger_ledgerid==''){
					$().customAlert();
					alert('Error', '<p style="text-align:center;">Ledger is required!</p>');
					e.preventDefault();
		}else if(new_subledger_name==''){
				$().customAlert();
						alert('Error', '<p style="text-align:center;">Sub-ledger name can\'t be empty!</p>');
				e.preventDefault();
		}else{	
				$("#newsubledres").html(loader);
				$.ajax({
						url:'./r/data.php',
						type:'POST',
						data:{src_id:1,new_subledger_name:new_subledger_name,new_subledger_ledgerid:new_subledger_ledgerid},
						success:function(res){
								$('#newsubledres').html(res);
								setTimeout(() => {
									//$( "#newsubledger_dialog" ).dialog( "close" );
									window.location.reload(true);
								}, 500);

						},
						error:function(err){
								$().customAlert();
										alert('Error', '<p style="text-align:center;">There was an error with your request.</p>');
								e.preventDefault();							
						}
				});

		}

}
function removeledger(code,bal){
	if(code==601||code==602||code==625||code==635||code==627||code==628||code==629||code==626){
	$().customAlert();
		alert('Error!', '<p>You cannot delete the General,Salary,Cash,Sales,Loans,debtors,creditors or Bank A/Cs Ledgers!</p>');
		e.preventDefault();		
	}
	else if(bal!=0){
	$().customAlert();
		alert('Error!', '<p>Ledger must be zerolized for you to remove it!</p>');
		e.preventDefault();		
	}else{
		$.confirm({
			'title'		: 'Remove Ledger Confirmation',
			'message'	: 'You are about to remove this Ledger. <br/> Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#normal" + code).html('');
	$.ajax({
	url:'data.php',
	data:{id:'30.2',code:code},
	success:function(data){
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	}
}
function update_debtor_bal(code){
	//var type=$('#type' + code).val();
	var bal=$('#bal' + code).val();
	var name=$('#name' + code).val();
	var cat=$('#cat' + code).val();
	var status=$('#status' + code).val();
	$('#save' + code).html(loader);
	$.ajax({
	url:'data_rep.php',
	data:{id:'1.2',code:code,bal:bal,name:name,cat:cat,status:status},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function nice_try_caution_ledger(code){
	var cat=$('#cat' + code).val();
	$('#save' + code).html(loader);
	$.ajax({
	url:'data_rep.php',
	data:{id:'1.3',code:code},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function saveledger(code){
	var type=$('#type' + code).val();
	var bal=$('#bal' + code).val();
	var name=$('#name' + code).val();
	var cat=$('#cat' + code).val();
	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'31.2',code:code,type:type,bal:bal,name:name,cat:cat},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function journalent(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'31.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#crledger" ).combobox({
		select: function(event,ui){
		
			if($('#crledger').val()==658){
			$("#meddiv").show();
			}
			
		}
	});
	$( "#drledger" ).combobox({
		select: function(event,ui){
			if($('#drledger').val()==658){
			$("#meddiv").show();
			}
			
	}});
	$("#medic1" ).combobox({});
	$("#insd1" ).combobox({});	
});

function savetrans(){
	var dr=$('#drledger').val();
	var cr=$('#crledger').val();
	var crname=$('#crledger option:selected').text();
	var drname=$('#drledger option:selected').text();
	var amount=$('#amount').val();
	var transid=$('#transid').val();
	var bankid=$('#bank').val();
	var bankname=$('#bank option:selected').text();
	var desc=$('#desc').val();
	var mid=$('#medic1').val();
	var mname=$('#medic1 option:selected').text();
	var iid=$('#insd1').val();
	var iname=$('#insd1 option:selected').text();
	if(cr==658||dr==658){
		bankid=mid;
		bankname=mname;
	}
	if(cr==659||dr==659){
		bankid=iid;
		bankname=iname;
	}
	
	if((cr==658||dr==658)&&mid==''){
		$().customAlert();
			alert('Sorry!', '<p>Select the Medic!</p>');
			e.preventDefault();
	}
	
	else if(cr==''||dr==''||amount==''||desc==''){
	$().customAlert();
			alert('Sorry!', '<p>All the fields are required!</p>');
			e.preventDefault();
	}
	else if(cr==dr){	
			$().customAlert();
			alert('Sorry!', '<p>Transactions cannot be carried out between the same ledger!</p>');
			e.preventDefault();
		}
	else{
	$("#postresp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'23.2',transid:transid,cr:cr,dr:dr,amount:amount,desc:desc,crname:crname,drname:drname,bankid:bankid,bankname:bankname},
	success:function(data){
	$('#postresp').html(data);
	}
	});
	}
}
function findentries(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'32.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$('#ledger').combobox({});
	$('#pntno').combobox({});
	$('#paatient89').combobox({});
	$( "#paatient89" ).combobox({
		select: function(event,ui){
		 var str = $('#paatient89').val();
		 var parts=str.split('#',4)
		$('#patno').val(parts[0]);
		$('#cname1').val(parts[1]);
	 	$('#tel1').val(parts[2]);
	 	//$('#itname7').val(parts[2]);
	 	$('#tel1').focus();
	 }
	});
});
function searchjournal(){
	var itemmode =  $('#itemcat').val();
	if(itemmode=='date'){
	var cat = 'datepick';
	}
	else if (itemmode=='bankid'){
	var cat = 'bank';	
	}
	else if (itemmode=='ledger'){
	var cat = 'ledger';	
	}

	else{
	var cat = 'itemdefault';
	}
	
	var searchdata = $('#'+ cat).val();
	if(searchdata!=''){
		$('#display').html('<embed src="images/beep-02.wav" autostart="true" width="0" height="0" id="sound1" enablejavascript="true">');
		$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:'33.2',itemmode:itemmode,searchdata:searchdata},
		success:function(data){
		$('#display').html(data);
		}
		});	
	}
		
}
function reversejournal(code,status){
	if(status==1){
		$().customAlert();
			alert('Sorry!', '<p>Entry already posted to General Leder. You cannot reverse posted entry!</p>');
			e.preventDefault();
		
	}
	else if(status==3){
		$().customAlert();
			alert('Sorry!', '<p>This entry has already been reversed or is a reversal entry.You cannot reverse an already reversed entry!</p>');
			e.preventDefault();
		
	}else{
		$.confirm({
			'title'		: 'Reverse Entry Confirmation',
			'message'	: 'You are about to reverse this particular entry. <br/> Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'24.2',code:code},
	success:function(data){
		$('#save' + code).html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	}
}

function postgeneral(){
	
		$.confirm({
			'title'		: 'Post Entries Confirmation',
			'message'	: 'You are about to post all unposted entries into the general ledger. These cannot be reversed later. Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mes").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'25.2'},
	success:function(data){
		$("#mes").html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
}

function editbanks(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'34.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#acbank" ).combobox({
		select: function(event,ui){
			var str = $('#acbank').val();
			var parts=str.split('θ',10);
			$('#acid2').val(parts[0]);
			$('#bname2').val(parts[1]);
			$('#postal2').val(parts[2]);
			$('#branch2').val(parts[3]);
			$('#tel2').val(parts[4]);
			$('#email2').val(parts[5]);
			$('#acname2').val(parts[6]);
			$('#actype2').val(parts[7]);
			$('#acno2').val(parts[8]);
			$('#datepick2').val(parts[9]);
	   }
	});
});
function editbank(){
	
	if($('#bname2').val()==''||$('#branch2').val()==''||$('#acname2').val()==''||$('#acno2').val()==''){
	$().customAlert();
			alert('Sorry!', '<p>Make sure you fill the required fields!</p>');
			e.preventDefault();
	}
	else{
	$("#mes").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'26.2',acid:$('#acid2').val(),bname:$('#bname2').val(),postal:$('#postal2').val(),tel:$('#tel2').val(),email:$('#email2').val(),
	acname:$('#acname2').val(),actype:$('#actype2').val(),acno:$('#acno2').val(),datee:$('#datepick2').val(),branch:$('#branch2').val()},
	success:function(data){
	$('#mes').html(data);
	}
	});
	}
}
function addnewacc(){
var actype = $('#actype').val();
var acno = $('#acno').val();
var bankname = $('#bankname').val();
var acname = $('#acname').val();
var branchname = $('#branchname').val();
var postadd = $('#postadd').val();
var date = $('#datepick').val();
var emailadd = $('#emailadd').val();
var tel = $('#telephone').val();

		
		if(bankname==''){
		$().customAlert();
		alert('Error!', '<p>Enter a Bank Name!</p>');
		e.preventDefault();
		}
		else if(branchname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Branch Name!</p>');
		e.preventDefault();
		}
		
		else if(acname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Account Name!</p>');
		e.preventDefault();
		}
		else if(acno==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Account Number!</p>');
		e.preventDefault();
		}
		
		
	else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'27.2',actype:actype,bankname:bankname,branchname:branchname,acname:acname,acno:acno,postadd:postadd,emailadd:emailadd,date:date,tel:tel},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}	
}
function delbank(){
	var acid = $('#acid2').val();
	if(acid==''){
		$().customAlert();
		alert('Error!', '<p>Select a Bank Account!</p>');
		e.preventDefault();
		}
		$.confirm({
			'title'		: 'Delete Account Confirmation',
			'message'	: 'You are about to delete this account. This cannot be reversed later. Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mes").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'28.2',acid:acid},
	success:function(data){
		$("#mes").html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
}
$("#bank" ).combobox({});
function payroll(mon){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'36.2',mon:mon},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function newpayroll(){
	var mon=$('#default_widget').val();
	if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else{
			
			$.confirm({
			'title'		: 'Create Payroll Confirmation',
			'message'	: 'You are about to create a pay roll for this month. This cannot be reversed later. Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mainp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:137,mon:mon},
	success:function(data){
		$("#mainp").html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		}
}

function editpay(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'36.3'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function editpayroll(){
	var mon=$('#default_widget').val()
	if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else{
		$("#mainp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'33.2',mon:mon},
	success:function(data){
		$("#mainp").html(data);
	}
	});
		}
}
function deleteemp(ser){
$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this person from the Payroll. <br/>This cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#normal" + ser).html('');$.ajax({
	url:'data.php',
	data:{id:'34.2',ser:ser},
	success:function(data){
	$("#normal" + ser).html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}
function commitpay(){
		 var mon = $('#curmon').val();
	
	$.confirm({
			'title'		: 'Commit Confirmation',
			'message'	: 'You are about to commit this Payroll. <br/>You cannot edit this payroll at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){

	 $("#display").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'37.2',mon:mon},
	success:function(data){
	$('#display').html(data);
	
	}
	});
	
		}
			},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
}

function savepayemp(emp,mon){	
	var sal=$('#sal' + emp).val();
	var allow=$('#allow' + emp).val();
	var adva=$('#adva' + emp).val();
	var ins=$('#ins' + emp).val();
	var ded=$('#ded' + emp).val();
	var hrs=$('#hrs' + emp).val();
	var rate=$('#rate' + emp).val();
	var days=$('#days' + emp).val();
	$('#save' + emp).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'35.2',emp:emp,sal:sal,allow:allow,adva:adva,ins:ins,ded:ded,othrs:hrs,mon:mon,days:days,rate:rate},
	success:function(data){
	$('#save' + emp).html(data);
	}
	});
}
function deletepayemp(ser){
$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this person from the Payroll. <br/>This cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#pay" + ser).html('');
	$.ajax({
	url:'data.php',
	data:{id:'34.2',ser:ser},
	success:function(data){
	$("#pay" + ser).html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}
function addtopay(){
 $("#mes").html(loader);
		 $.ajax({
		url:'hr.php',
		data:{id:'36.4'},
		success:function(data){
		$('#mes').html(data);
		}
		});
}
$( "#addemp" ).combobox({
	select: function(event,ui){
		 var param = $('#addemp').val();
		 var mon = $('#curmon').val();
		 $("#mes").html(loader);
		 $.ajax({
		url:'data.php',
		data:{id:'36.2',emp:param,mon:mon},
		success:function(data){
		$('#mes').html(data);
		}
		});
	}
});



function openpayreport(){
	 var mon = $('#curmon').val();
	 if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else{
			window.open('payreport.php?id=1&reg='+ mon)
		}
}


$( "#emppay" ).combobox({
	select: function(event,ui){
	 var emp = $('#emppay').val();
	  var mon = $('#default_widget').val();
	  if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else{
	$("#mes2").html(loader);
			$.ajax({
				url:'data.php',
				data:{id:'36.2',emp:emp,mon:mon},
				success:function(data){
				$('#mes2').html(data);
				}
			});
		}
}
});
function addpay(){
$('#empdi').show();
}

function patientseenbydoc(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:135},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function genoutrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:130},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
// function getbyacctype(){	
// 	$("#mainp").html(loader);
// 	$.ajax({
// 	url:'link.php',
// 	data:{id:131},
// 	success:function(data){
// 	$('#mainp').html(data);
// 	}
// 	});
// }

function fetchgenopdrep_old(){

var name = $('#itemname').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((name=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter Clinic Name!</p>');
		e.preventDefault();
}
else if((name!=18)&&view==1){
	var a=1;
	window.open("report.php?id=75&code=" + a + '&' + "\nname=" + name);
}
else if((name==18)&&view==1){
	var a=18;
	window.open("report.php?id=76&code=" + a + '&' + "\nname=" + name);
}
else if((name==18)&&(d1!=''||d2!='')){
	var a=18;
	window.open("report.php?id=76&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
}
else {var a=0;
	window.open("report.php?id=75&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}

}

function fetchgenopdrep(){

var name = $('#itemname').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((name=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter Clinic Name!</p>');
		e.preventDefault();
}
else if((name!=18)&&view==1){
	var a=1; 
	//var pg=""
	//window.open("report.php?id=75&code=" + a + '&' + "\nname=" + name);
	window.open("r/patients-list.php?id=75&code=" + a + '&' + "\nname=" + name);
}
else if((name==18)&&view==1){
	var a=18;
	window.open("r/over-18-patients-list.php?id=76&code=" + a + '&' + "\nname=" + name);
}
else if((name==110122)&&view==1){
	var a=110122;
	alert('Please wait..this will take a minute');
	window.open("r/over-18-patients-list-110122.php?id=77&code=" + a + '&' + "\nname=" + name);
}
else if((name==18)&&(d1!=''||d2!='')){
	var a=18;
	window.open("r/over-18-patients-list.php?id=76&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
}
else if((name==110122)&&(d1!=''||d2!='')){
	var a=110122;
	window.open("r/over-18-patients-list-110122.php?id=77&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
}
else {var a=0;
	window.open("r/patients-list.php?id=75&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}

}


function saveemp(emp,page,mon){	
	var sal=$('#sal' + emp).val();
	var allow=$('#allow' + emp).val();
	var adva=$('#adva' + emp).val();
	var ins=$('#ins' + emp).val();
	var ded=$('#ded' + emp).val();
	var hrs=$('#hrs' + emp).val();
	$('#save' + emp).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'37.2',emp:emp,sal:sal,allow:allow,adva:adva,ins:ins,ded:ded,othrs:hrs,mon:mon,page:page},
	success:function(data){
	$('#save' + emp).html(data);
	}
	});
}

function openpayreport(){
	 var mon = $('#default_widget').val();
	 if(mon==''){
		$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();
		}
		else{
			window.open('payreport.php?id=1&reg='+ mon)
		}
}
function paysett(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'36.5'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function savenhif(code){	
	var lower=$('#lower' + code).val();
	var upper=$('#upper' + code).val();
	var amount=$('#amount' + code).val();
	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'38.2',code:code,upper:upper,lower:lower,amount:amount},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function savetax(code){	
	var lower=$('#taxlower' + code).val();
	var upper=$('#taxupper' + code).val();
	var amount=$('#taxpercent' + code).val();
	$('#taxsave' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'39.2',code:code,upper:upper,lower:lower,amount:amount},
	success:function(data){
	$('#taxsave' + code).html(data);
	}
	});
}
function submnssf(){	
	var employee=$('#employeenssf').val();
	if(employee==''){
		$().customAlert();
		alert('Error!', '<p>Enter the employee contributions.</p>');
		e.preventDefault();
		}
		else{
	$("#mes3").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'40.2',employee:employee},
	success:function(data){
	$('#mes3').html(data);
	}
	});
	}
}
function submover(){	
	var amount=$('#overtime').val();
	if(amount==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Rate per Hour.</p>');
		e.preventDefault();
		}
		else{
	$("#mes4").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'41.2',amount:amount},
	success:function(data){
	$('#mes4').html(data);
	}
	});
	}
}

function empben(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'36.6'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$("#emp5" ).combobox().change(function(){
		 var param = $('#emp5').val();
		 $("#mainp").html(loader);
		 $.ajax({
		url:'data.php',
		data:{id:18,emp:param},
		success:function(data){
		$('#mainp').html(data);
		}
		});
		
});

function savebenemp(emp){	
	var phone=$('#phone' + emp).val();
	var health=$('#health' + emp).val();
	var vehicle=$('#vehicle' + emp).val();
	var house=$('#house' + emp).val();
	var entertainment=$('#entertainment' + emp).val();
	var perdiem=$('#perdiem' + emp).val();
	var others=$('#others' + emp).val();
	$('#save' + emp).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:138,emp:emp,phone:phone,health:health,vehicle:vehicle,house:house,entertainment:entertainment,perdiem:perdiem,others:others},
	success:function(data){
	$('#save' + emp).html(data);
	}
	});
}


function deletebenemp(ser){
$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this person from the Benefits Section. <br/>This cannot be restored at a later time! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#pay" + ser).html('');$.ajax({
	url:'data.php',
	data:{id:'139',ser:ser},
	success:function(data){
	$("#pay" + ser).html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	
	}

function addempben(){
 $("#mes").html(loader);
		 $.ajax({
		url:'hr.php',
		data:{id:'36.7'},
		success:function(data){
		$('#mes').html(data);
		}
		});
}
$( "#addempben" ).combobox({
	select: function(event,ui){
		 var param = $('#addempben').val();
		 $("#mes").html(loader);
		 $.ajax({
		url:'data.php',
		data:{id:'140',emp:param},
		success:function(data){
		$('#mes').html(data);
		}
		});
	}
});

function monthrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'49.3'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payslip(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'57.3'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function indpayslip(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'57.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterindpayslip(){
	 var mon = $('#monthsum').val();
	  var emp = $('#cus19').val();	
		window.open("hroutput.php?id=18&mon=" + mon + '&' + "\nemp=" + emp + '&' + "\ncode=1");
}
$( "#cus19" ).combobox({});
function payslip2(){
	var reg = $('#default_widget').val();
	if(reg==''){
	$().customAlert();
		alert('Error!', '<p>Select a month!</p>');
		e.preventDefault();	
	}else{
	window.open("payslip.php?id=2&mon=" + reg);	
	}
	
}
$( "#month1" ).combobox({
	select: function(event,ui){
	 var reg = $('#month1').val();
	window.open("hroutput.php?id=15&reg=" + reg);
	}
});
function monthbank(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'49.4'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function monthind(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'49.5'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#month2" ).combobox({
	select: function(event,ui){
	 var reg = $('#month2').val();
	window.open("hroutput.php?id=18&mon=" + reg + '&' + "\ncode=2");
	}
});
$( "#month14" ).combobox({
	select: function(event,ui){
	 var reg = $('#month14').val();
	window.open("hroutput.php?id=1&reg=" + reg);
	}
});
$( "#empbank" ).combobox({});
function enterindbank(){
	 var mon = $('#monthsum').val();
	  var bank = $('#empbank').val();	
		window.open("hroutput.php?id=2&mon=" + mon + '&' + "\nbank=" + bank);
}

$( "#cus8" ).combobox({});
$( "#monthsum" ).combobox({});
function employeesum(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:'50.3'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#cus9" ).combobox({
	select: function(event,ui){
	 var reg = $('#cus9').val();
	window.open("hroutput.php?id=17&reg=" + reg);
	}
});

function attendancerep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:158},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterattendance(){
	 var mon = $('#monthsum').val();
	  var branch = $('#branch').val();	
	  if(mon==''||branch==''){
	$().customAlert();
		alert('Error!', '<p>Select both fields!</p>');
		e.preventDefault();	
	}else{
		window.open("hroutput.php?id=19&mon=" + mon + '&' + "\nbranch=" + branch + '&' + "\ncode=1");
	}
}
function leaverep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:159},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterleaverep(){
	 var d1 = $('#datepick').val();
	 var d2 = $('#datepick2').val();	
	 var view = $('input[name=viewall]:checked').val();
		if(!(view)){
		view=0;
		}
	if((d1==''||d2=='')&&view==0){
	$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();	
	}
	else if(view==1){
	window.open("hroutput.php?id=20&code=1");
}
else{
		window.open("hroutput.php?id=20&d1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ncode=2");
	}
}
function emplist(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:157},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#emp99" ).combobox({
	select: function(event,ui){
	var reg = $('#emp99').val();
	window.open("hroutput.php?id=21&reg=" + reg);
	}
});
function ledrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'51.3'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterled(){
var regn = $('#cus8').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
	else if(regn==''){
		$().customAlert();
		alert('Error!', '<p>Select a Ledger Name!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("rep.php?id=1&value=" + regn);
}
else {
	window.open("rep.php?id=1&value=" + regn + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}
}
function gtcash_accreceiverep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:189},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function entercash_accreceiverep(){
var regn = $('#cus8').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
	else if(regn==''){
		$().customAlert();
		alert('Error!', '<p>Select a Ledger Name!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("report.php?id=82&value=" + regn);
}
else {
	window.open("report.php?id=82&value=" + regn + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}
}
function logrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'52.3'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function queuerep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:51},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function mesrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:50},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function logrepuser(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'52.4'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterlog(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var user = $('#itemname').val();
if(user==null){user=0}

var t1 = $('#time1').val();
var t2 = $('#time2').val();
var t3 = $('#time3').val();
var t4 = $('#time4').val();
if(t1.length==1){
	t1=0+t1;
}
if(t3.length==1){
	t3=0+t3;
}


var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){

	window.open("report.php?id=30&code=" + a + '&' + "\nuser=" + user);
}
else {
d1=d1+t1+t2;
d2=d2+t3+t4;
	window.open("report.php?id=30&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2+ '&' + "\nuser=" + user);
}
}

function genbyclinic(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:163},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function  timed1(){
	t1=$('#time1').val().length;
	if(t1==2){
		$('#time2').focus();
	}
}
function  timed2(){
	t3=$('#time3').val().length;
	if(t3==2){
		$('#time4').focus();
	}
}

function setupbeds(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'57.4'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function setupcomp(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'55'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function setupbank(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'56'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function openbed(){
	$("#newbed" ).dialog( "open" );
	return false;
}

function addnewbed(){
	var bedno=$('#bedno1').val();
	var roomtype=$('#roomtyp1').val();
	var roomno=$('#roomna2').val();
	var ward=$('#wardtyp1').val();
	if(bedno==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill the Bed no Field!</p>');
		e.preventDefault();		
	}
	else if(roomno==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill the Room no Field!</p>');
		e.preventDefault();		
	}
	else{	
	$("#newward").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'29.6',roomno:roomno,roomtype:roomtype,bedno:bedno,ward:ward},
	success:function(data){
		$('#newward').html(data);
	
	}
	});
	}
}
function removebed(code){

	$("#normal" + code).html('');
	$.ajax({
	url:'data.php',
	data:{id:'30.6',code:code},
	success:function(data){
	}
	});
}
function savebed(code){
	var ward=$('#wardtype' + code).val();
	var roomtype=$('#roomtype' + code).val();
	var roomno=$('#roomno' + code).val();
	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'31.6',code:code,roomtype:roomtype,ward:ward,roomno:roomno},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function setupins(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'30.9'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


$( "#cons10" ).combobox({
	select: function(event,ui){
	 var param = $('#cons10').val();
		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:123,pid:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
});
function startcons(param){
	 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:93,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});	
}
function addins(a){
var name = $('#name').val();
var acno = $('#acno').val();
var bal = $('#bal').val();
var add = $('#add').val();
var town = $('#town').val();
var tel = $('#tel').val();
var mobile = $('#mobile').val();
var email = $('#email').val();
 if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Company name!</p>');
		e.preventDefault();
		}
	
	else{
		$('#res1').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:'21.8',a:a,name:name,acno:acno,bal:bal,add:add,town:town,tel:tel,mobile:mobile,email:email},
		success:function(data){
		$('#res1').html(data);
		}
		});	
		}	
}

$( "#insa" ).combobox({
	select: function(event,ui){
	 var str = $('#insa').val();
	 var parts=str.split('θ',9);
	 $('#regn').val(parts[0]);
	 $('#acno2').val(parts[1]);
	 $('#name2').val(parts[2]);
	 $('#bal2').val(parts[3]);
	 $('#add2').val(parts[4]);
	 $('#town2').val(parts[5]);
	 $('#tel2').val(parts[6]);
	 $('#mobile2').val(parts[7]);
	 $('#email2').val(parts[8]);
	 }
});
function editins(a){
var name = $('#name2').val();
var regn = $('#regn').val();
var acno = $('#acno2').val();
var bal = $('#bal2').val();
var add = $('#add2').val();
var town = $('#town2').val();
var tel = $('#tel2').val();
var mobile = $('#mobile2').val();
var email = $('#email2').val();
 if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Company name!</p>');
		e.preventDefault();
		}
	
	else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'21.8',a:a,name:name,acno:acno,bal:bal,add:add,town:town,tel:tel,mobile:mobile,email:email,regn:regn},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}	
}
function delins(){
	var regn=$('#regn').val();
	if(regn==''){
	$().customAlert();
		alert('Error!', '<p>Enter a valid Company name!</p>');
		e.preventDefault();		
	}
	else{	
	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this insurance company.Continue with this action?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$('#res2').html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'22.8',regn:regn},
	success:function(data){
	$('#res2').html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
	
	}
}

function regdeath(patid){
var patname = $('#oname').val();
var age = $('#age').val();
var gender = $('#gen').val();
var tod = $('#tod').val();
var dod = $('#datepick').val();
var cod = $('#cod').val();
var con = $('#confirmed').val();
var morgue = $('#morgue').val();
var odetail = $('#odetail').val();
 if(tod==''||dod==''||cod==''||con==''||morgue==''){
		$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();
		}
	
	else{
		$('#newstudent').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'21.9',patid:patid,patname:patname,age:age,gender:gender,tod:tod,dod:dod,cod:cod,con:con,morgue:morgue,odetail:odetail},
		success:function(data){
		$('#newstudent').html(data);
		}
		});	
		}	
}
function regbirth(){
var name = $('#name').val();
var tob = $('#tob').val();
var dob = $('#datepick').val();
var mom = $('#mother').val();
var doc = $('#doctor').val();
var odetail = $('#odetail').val();
var gen = $('input[name=gender]:checked').val();
 if(tob==''||dob==''||mom==''||doc==''){
		$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();
		}
	
	else{
		$('#newstudent').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'21.91',name:name,tob:tob,dob:dob,mom:mom,doc:doc,gen:gen,odetail:odetail},
		success:function(data){
		$('#newstudent').html(data);
		}
		});	
		}	
}
function insurep(){
	 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:123},
				success:function(data){
				$('#mainp').html(data);
				}
			});	
}
function enterinsur(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#insa').val();
var view = $('input[name=viewall]:checked').val();
var a=0;
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	a=1;
	window.open("report.php?id=34&code=" + a + '&' + "\nname=" + name);
}
else {window.open("report.php?id=34&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
function deathrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:124},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function birthrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'124.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterdeath(){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	var a=1;
	window.open("report.php?id=35&code=" + a);
}
else {var a=0;
	window.open("report.php?id=35&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}
$( "#clinicname" ).combobox({
	select: function(event,ui){
	var str = $('#clinicname').val();
	 var parts=str.split('#',2)
	 var id=parts[0];
	 var clname=parts[1];
	$('#typeclinics').val(clname);
	}
});


function enterclinic(){
var name = $('#typeclinics').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
	if(!(view)){
	view=0;
	}
	if((name=='')&&view==0){
			$().customAlert();
			alert('Error!', '<p>Enter Clinic Name!</p>');
			e.preventDefault();
	}
	else if(view==1){
		var a=1;
		window.open("report.php?id=71&code=" + a + '&' + "\nname=" + name);
	}
	else {var a=0;
		window.open("report.php?id=71&code=" + a + '&' + "\nname=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
	}

}

function enterbirth(){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	var a=1;
	window.open("report.php?id=37&code=" + a);
}
else {var a=0;
	window.open("report.php?id=37&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}
function searchpay(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpay").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:70,a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchpay').html(data);
	}
	});
	}
}

function searchpayccc(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpay").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:70.9,a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchpay').html(data);
	}
	});
	}
}
function sachcouns(a,b){
	alert('');

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpay").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:70.9,a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchpay').html(data);
	}
	});
	}
}

function searchlab(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchlab").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.3',a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchlab').html(data);
	}
	});
	}
}
function searchlab2(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchlab").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.6',a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchlab').html(data);
	}
	});
	}
}
function searchlab99(a,b){

var d1 = $('#datepick3').val();
var d2 = $('#datepick4').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchlab99").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.12',a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchlab99').html(data);
	}
	});
	}
}
function searchpharmacy(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpharmacy").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.7',a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchpharmacy').html(data);
	}
	});
	}
}
function searchpharmacyrequest(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpharmacyrequest").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.11',a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchpharmacyrequest').html(data);
	}
	});
	}
}
// function searchpharmacyrequest(a,b){

// var d1 = $('#datepick').val();
// var d2 = $('#datepick2').val();
// if(d1==''||d2==''){
// 		$().customAlert();
// 		alert('Error!', '<p>Enter the From and To dates!</p>');
// 		e.preventDefault();
// }
// else {
// 	$("#searchpharmacyrequest").html(loader);
// 	$.ajax({
// 	url:'data.php',
// 	data:{id:'70.11',a:a,d1:d1,d2:d2,b:b},
// 	success:function(data){
// 	$('#searchpharmacyrequest').html(data);
// 	}
// 	});
// 	}
// }
function searchtheatre(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchtheatre").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.5',a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchtheatre').html(data);
	}
	});
	}
}
function searchrad(a,b){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchrad").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.4',a:a,d1:d1,d2:d2,b:b},
	success:function(data){
	$('#searchrad').html(data);
	}
	});
	}
}
function searchpay2(a){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpay").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.1',a:a,d1:d1,d2:d2},
	success:function(data){
	$('#searchpay').html(data);
	}
	});
	}
}
function searchpaydos(a){

var d1 = $('#datepick3').val();
var d2 = $('#datepick4').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpaydos").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.12',a:a,d1:d1,d2:d2},
	success:function(data){
	$('#searchpaydos').html(data);
	}
	});
	}
}
function searchpay3(a){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpay").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'70.2',a:a,d1:d1,d2:d2},
	success:function(data){
	$('#searchpay').html(data);
	}
	});
	}
}
function searchpharm(a){

var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else {
	$("#searchpharm").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:73,a:a,d1:d1,d2:d2},
	success:function(data){
	$('#searchpharm').html(data);
	}
	});
	}
}
$( "#cons9" ).combobox({
	select: function(event,ui){
	 var param = $('#cons9').val();
	 var id = $('#idpay').val();
		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:id,patid:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
});
function dispall(){
	var rec = $('input[name=searchfromall]:checked').val();
	if(rec==1){
$('#dispall').show();	
$('#cons9').parent().find('input:first').focus();
	}else{
	$('#dispall').hide();	
	$('#cons8').parent().find('input:first').focus();		
	}
}
$(".pnt3" ).combobox({
	select: function(event,ui){
	 var m = $('#menusearch').val();
	 var param = $('#pnt3' + m).val();
	 var ser = $('#ser').val();
	 
	 if(ser==157){
		 var title='Delete Confirmation';
		 var message='You are about to remove this record from the Database. <br/>This cannot be restored at a later time! Continue?';
			$.confirm({
			'title'		: title,
			'message'	: message,
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
			$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){$('#mainp').html('');}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	 
		 
	 }
	 else{
	$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
	}
});
function menuop(a){
	for(i=0;i<5;i++){
	$('#op' + i).hide(); 
	}	
	$('#op' + a).show();
	$('#pnt3').parent().find('input:first').focus();	
 }
 function menuop2(a){
	for(i=0;i<5;i++){
	$('#op' + i).hide(); 
	}	
	$('#op' + a).show();
	$('#pnt2').parent().find('input:first').focus();	
 }


function showpat1(){
	$('#pat2').hide();
	$('#pat3').hide();
	$('#pat1').show();	
	$("#pat11").css({'background' : '#fff'});	
	$("#pat12").css({'background' : '#ff3'});
	$("#pat13").css({'background' : '#0f6'});		
}
function showpat2(){
	$('#pat1').hide();
	$('#pat3').hide();
	$('#pat2').show();
	$("#pat12").css({'background' : '#fff'});	
	$("#pat11").css({'background' : '#DC2626'});		
	$("#pat13").css({'background' : '#0f6'});	
}
function showpat3(){
	$('#pat1').hide();
	$('#pat3').show();
	$('#pat2').hide();
	$("#pat12").css({'background' : '#ff3'});	
	$("#pat11").css({'background' : '#DC2626'});		
	$("#pat13").css({'background' : '#fff'});	
}
function newpayments(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:169},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payments(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:101},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function paymentsTesting(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'101.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function dispdrugs(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:99},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payments1(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:100},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payments2(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:102},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payments3(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:103},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payments4(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:104},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payments5(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:105},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function consinv(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:153},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$(document).ready(function(){
	$( "#cons8888" ).combobox({
		select: function(event,ui){
		 var param = $('#cons8888').val();
		 var d1    = $('#datepick').val();
		 var d2    = $('#datepick2').val();
       var parts=param.split('#',3)
       var rcptno=parts[0];
       var clientno=parts[1];
       var clientid=parts[2];

       //console.log(code,prescno,prescid,clientid,clientno);

		if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		} else{
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:137,pid:rcptno,clientno:clientno,oldpatientid:clientid,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		   }
		}
	});
	$( "#cons8" ).combobox({
		select: function(event,ui){
		 var param = $('#cons8').val();
		 var d1    = $('#datepick').val();
		 var d2    = $('#datepick2').val();
       var parts=param.split('#',3)
       var rcptno=parts[0];
       var clientno=parts[1];
       var clientid=parts[2];

       //console.log(code,prescno,prescid,clientid,clientno);

		if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		} else{
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:137,pid:rcptno,clientno:clientno,oldpatientid:clientid,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		   }
		}
	});
	$( "#rvpay90" ).combobox({
		select: function(event,ui){
		 var param = $('#rvpay90').val();
		 var d1    = $('#datepick').val();
		 var d2    = $('#datepick2').val();
       var parts=param.split('#',3)
       var rcptno=parts[0];
       var clientno=parts[1];
       var clientid=parts[2];

       //console.log(code,prescno,prescid,clientid,clientno);

		if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		} else{
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:'137.1',pid:rcptno,clientno:clientno,oldpatientid:clientid,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		   }
		}
	});
	$( "#rvpay019" ).combobox({
		select: function(event,ui){
		 var param = $('#rvpay019').val();
		 var d1    = $('#datepick').val();
		 var d2    = $('#datepick2').val();
       var parts=param.split('#',3)
       var rcptno=parts[0];
       var clientno=parts[1];
       var clientid=parts[2];

       //console.log(code,prescno,prescid,clientid,clientno);

		if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		} else{
			 $("#mainp").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:'137.1',pid:rcptno,clientno:clientno,oldpatientid:clientid,d1:d1,d2:d2},
					success:function(data){
						$('#mainp').html(data);
					
					}
				});
		   }
		}
	});
	$( "#wardlist" ).combobox({
		select: function(event,ui){
		 var str = $('#wardlist').val();
		 var parts=str.split('θ',5)
		 $('#wardid').val(parts[0]);
		 $('#mainward').val(parts[1]);
		 $('#wrdroomno').val(parts[2]);
		 $('#wardtype').val(parts[3]);
		 $('#wrdbedno').val(parts[4]);
		 $('#wrdbedno').focus();
		}
	});
	$( "#currentins" ).combobox({
		select: function(event,ui){
		 var str = $('#currentins').val();
		 var parts=str.split('θ',2)
		 $('#insid').val(parts[0]);
		 $('#insname').val(parts[1]);
		 $('#refno').focus();
		}
	});
	$( "#currentins2" ).combobox({
		select: function(event,ui){
		 var str = $('#currentins2').val();
		 var parts=str.split('θ',2)
		 $('#insid').val(parts[0]);
		 $('#insname').val(parts[1]);
		 //$('#cardno').focus();
	   }
	});
	$( "#switchpaymodeins" ).combobox({});
	$( "#switchpaymodeins" ).combobox({
		select: function(event,ui){
		 var str = $('#switchpaymodeins').val();
		 var parts=str.split('θ',2);
		 $('#insid').val(parts[0]);
		 $('#insname').val(parts[1]);
		 $('#txtinsurer_id').val(parts[0]);
		 $('#in_currins_no').val(parts[0]);
		 $('#in_currins_nome').val(parts[1]);
		 //$('#cardno').focus();
	   }
	});
	$( "#insurerscheme606" ).combobox({});
	$( "#insurerscheme606" ).combobox({
		select: function(event,ui){
		 var str     = $('#insurerscheme606').val();
		 var parts   = str.split('θ',2);
		 $('#insid').val(parts[0]);
		 $('#insname').val(parts[1]);
		 $('#txtinsurer_id').val(parts[0]);
		 if(parts[0]!=14&&parts[1]!='CASH'){
		 		$('#madeni606 option:selected').text("Companies");
		 		$('#madeni606').val("Companies");
		 }else{
		 		$('#madeni606 option:selected').text("Cash");
		 		$('#madeni606').val("Cash");
		 }
		 //$('#refno').focus();
		}
	});
	// $( "#switchpaymode" ).combobox({
	// 	select: function(event,ui){
	// 	 var str = $('#switchpaymode').val();
	// 	 var parts=str.split('θ',2)
	// 	 $('#insid').val(parts[0]);
	// 	 $('#txtinsurer_id').val(parts[0]);
	// 	 //$('#refno').focus();
	// 	}
	// });
	$( "#switchpaymode" ).combobox({
		select: function(event,ui){
		 var presc_no = $('#old_presc_no').val();
		 var str      = $('#switchpaymode').val();
		 var case_no  = 95;
		 var parts    = str.split('θ',2);
		 $('#insid').val(parts[0]);
		 $('#txtinsurer_id').val(parts[0]);
		 $('#insname').val(parts[1]);
		 if(parts[0]==14){
		   $('#switchboard').val("Cash");
		   var param  = 'Cash';
		 }else{
		   $('#switchboard').val("Companies");	 	
		   var param  = 'Companies';
		 }

		 if(param=='Cash'){
				$.confirm({
				'title'		: 'Multiple Invoice Generation Confirmation[CASH]',
				'message'	: 'You are about to start the process of generating multiple invoices for this patient. Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'blue',
						'action': function(){
							savenewswitchboardprescdos(presc_no);
							seepat(presc_no,case_no);
							//docexam(dept);
						}
					},
					'No'	: {
						'class'	: 'gray',
						'action': function(){$('#signboard').html('');}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
		 
			 
		 }
		 if(param=='Companies'){
				$.confirm({
				'title'		: 'Multiple Invoice Generation Confirmation[COMPANY]',
				'message'	: 'You are about to start the process of generating multiple invoices for this patient. Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'blue',
						'action': function(){
							savenewswitchboardprescdos(presc_no);
							seepat(presc_no,case_no);
							//docexam(dept);
						}
					},
					'No'	: {
						'class'	: 'gray',
						'action': function(){$('#signboard').html('');}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
		 	
		 }



		 //$('#refno').focus();
		}
	});
	//$('#switchboard').parent().find('input:first').width(150); 
	$( "#forshow" ).combobox({});
	$( "#madeni606" ).combobox({});
	$( "#switchboard" ).combobox({});
	$("#cconsultfee").combobox();
	$('#cconsultfee').parent().find('input:first').width(150); 
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

});

// $( "#switchboard" ).combobox({
// 	select: function(event,ui){
// 	 var param    = $('#switchboard').val(); 
// 	 var presc_no = $('#old_presc_no').val();
// 	 var dept 	  = $('#in_consult_dept').val();
// 	 var case_no  = 95;
// 	 if(param=='Cash'){
// 			$.confirm({
// 			'title'		: 'Multiple Invoice Generation Confirmation',
// 			'message'	: 'You are about to start the process of generating multiple invoices for this patient. Continue?',
// 			'buttons'	: {
// 				'Yes'	: {
// 					'class'	: 'blue',
// 					'action': function(){
// 						savenewswitchboardpresc(presc_no);
// 						seepat(presc_no,case_no);
// 						//docexam(dept);
// 					}
// 				},
// 				'No'	: {
// 					'class'	: 'gray',
// 					'action': function(){$('#signboard').html('');}	// Nothing to do in this case. You can as well omit the action property.
// 				}
// 			}
// 		});
	 
		 
// 	 }
// 	 else if(param=='Companies'){
// 						savenewswitchboardpresc(presc_no);
// 						seepat(presc_no,case_no);
// 						//docexam(dept);
	 	
// 	 }


// 	}
// });

function savenewswitchboardprescdos(pid){
	$("#saveclose").html(loader);
	var in_nwins_no       = $('#insid').val();   
	var in_nwins_nome     = $('#insname').val();
	var accntype    = $('#accntype').val();
	var complaint   =$('#complaint').val();
	var sendto      = $('#deptsendto').val();
	var reviewdate  = $('#datepick3').val();
	var switchboard = $('#switchboard').val();
	var in_defaultins_no       = $('#in_defaultins_no').val();
	var in_defaultins_nome     = $('#in_defaultins_nome').val();
	//var in_currentins_no       = $('#switchpaymode').val();
	//var in_currentins_nome     =$('#switchpaymode option:selected').text();
	var in_currentins_no       = $('#in_currins_no').val();
	var in_currentins_nome     = $('#in_currins_nome').val();
	var in_payment_mode        = $('#in_payment_mode').val();
	// if(in_nwins_no==''){ in_nwins_no=$('#in_currins_no').val(); }
	// if(in_nwins_nome==''){ in_nwins_nome=$('#in_currins_nome').val(); }


	if($('#insid').val()!=''&&$('#insid').val()!=$('#in_currins_no').val()){ in_currentins_no=$('#in_currins_no').val(); in_nwins_no=$('#insid').val();  } //else { in_currentins_no=$('#in_defaultins_no').val(); in_nwins_no=$('#in_currins_no').val(); }
	if($('#insname').val()!=''&&$('#insname').val()!=$('#in_currins_nome').val()){ in_currentins_nome=$('#in_currins_nome').val(); in_nwins_nome=$('#insname').val(); } //else { in_currentins_nome=$('#in_defaultins_nome').val(); in_nwins_nome=$('#in_currins_nome').val(); }

	// if($('#insid').val()==''||$('#insname').val()==''){ 
	// 	in_currentins_no=$('#in_currins_no').val();
	// 	in_currentins_nome= $('#in_currins_nome').val();
	// } else { in_currentins_no=$('#in_currins_no').val(); }

	//if($('#insname').val()==''||$('#insname').val()!=$('#in_currins_nome').val()){ in_currentins_nome=$('#insname').val(); } else { in_currentins_nome=$('#in_currins_nome').val(); }

	var temp=$('#temp').val();
	var bp1=$('#bp1').val();
	var bp2=$('#bp2').val();
	//var type=$('#ctype').val();
	var weight=$('#weight').val();
	var pulserate=$('#pulserate').val();
	var resprate=$('#resprate').val();
	var rbs=$('#rbs').val();
	var typeclinics = $('#typeDMclinic').val();
	var newscreening=$('input[name=gender2]:checked').val();
	var knownhyper=$('input[name=gender3]:checked').val();
	var takingmeds=$('input[name=gender4]:checked').val();
	
	removeArea('history',area3);
	var history=$('#history').val();
	addArea('history',area3);

	removeArea('history2',area18);
	var history2=$('#history2').val();
	addArea('history2',area18);
	
	
	removeArea('phyexam',area14);
	var phy=$('#phyexam').val();
	addArea('phyexam',area14);
	
	
	
	removeArea('diagnosis',area8);
	var diag=$('#diagnosis').val();
	addArea('diagnosis',area8);
		
	removeArea('prescription',area10);
	var presc=$('#prescription').val();
	addArea('prescription',area10);
	
	
	var rec = $('input[name=printrec]:checked').val();
	var plab = $('input[name=printlab]:checked').val();
	//var plab = 0;
	var prad =0;

	var dress = $('input[name=daydressin]:checked').val();
	if(dress==1){dress=1}else {dress=0}
	
	var recl = $('input[name=labrec]:checked').val();
	if(recl==1){recl=1}else {recl=0}
	var recr = $('input[name=radrec]:checked').val();
	if(recr==1){recr=1}else {recr=0}
	var recp = $('input[name=recpharm]:checked').val();
	if(recp==1){recp=1}else {recp=0}
	recn=0;
	$.ajax({
	url:'data_rep.php',
	type:'POST',
	data:{id:'13.1',pid:pid,history:history,history2:history2,dress:dress,diag:diag,presc:presc,recl:recl,recr:recr,recp:recp,recn:recn,phy:phy,sendto:sendto,reviewdate:reviewdate,
	temp:temp,bp1:bp1,bp2:bp2,weight:weight,pulserate:pulserate,resprate:resprate,rbs:rbs,typeclinics:typeclinics,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,complaint:complaint,in_default_accntype:accntype,in_defaultins_no:in_defaultins_no,in_defaultins_nome:in_defaultins_nome,in_currentins_no:in_currentins_no,in_currentins_nome:in_currentins_nome,switchboard:switchboard,in_payment_mode:in_payment_mode,in_nwins_no:in_nwins_no,in_nwins_nome:in_nwins_nome},
	success:function(data){
	$('#saveclose').html(data);
	if(rec==1){
	window.open('report.php?id=36&rcptno=' + pid);
		}
		if(plab==1){
	window.open('report.php?id=38&rcptno=' + pid);
		}
		if(prad==1){
	window.open('report.php?id=39&rcptno=' + pid);
		}
	}
	});
	
}

function savenewswitchboardpresc(pid){
	$("#saveclose").html(loader);
	var pres_id = $('#enc_pres_id').val();
	var pres_no = $('#enc_pres_no').val();
	var cust_id = $('#enc_cust_id').val();
	var cust_no = $('#enc_cust_no').val();
	var in_nwins_no       = $('#insid').val();  
	var in_nwins_nome     = $('#insname').val();
	var accntype    = $('#accntype').val();
	var complaint   =$('#complaint').val();
	var sendto      = $('#deptsendto').val();
	var reviewdate  = $('#datepick3').val();
	var switchboard = $('#switchboard').val();
	var in_defaultins_no       = $('#in_defaultins_no').val();
	var in_defaultins_nome     = $('#in_defaultins_nome').val();
	// var in_currentins_no       = $('#switchpaymodeins').val(); //26?SHA OUT
	// var in_currentins_nome     =$('#switchpaymodeins option:selected').text();
	var in_currentins_no       = $('#in_currins_no').val();
	var in_currentins_nome     = $('#in_currins_nome').val();
	var in_payment_mode        = $('#in_payment_mode').val();

	var temp=$('#temp').val();
	var bp1=$('#bp1').val();
	var bp2=$('#bp2').val();
	//var type=$('#ctype').val();
	var weight=$('#weight').val();
	var pulserate=$('#pulserate').val();
	var resprate=$('#resprate').val();
	var rbs=$('#rbs').val();
	var typeclinics = $('#typeDMclinic').val();
	var newscreening=$('input[name=gender2]:checked').val();
	var knownhyper=$('input[name=gender3]:checked').val();
	var takingmeds=$('input[name=gender4]:checked').val();

	removeArea('history',area3);
	var history=$('#history').val();
	addArea('history',area3);

	removeArea('history2',area18);
	var history2=$('#history2').val();
	addArea('history2',area18);
	
	
	removeArea('phyexam',area14);
	var phy=$('#phyexam').val();
	addArea('phyexam',area14);
	
	
	
	removeArea('diagnosis',area8);
	var diag=$('#diagnosis').val();
	addArea('diagnosis',area8);
	var phc_diagnosis_num_rows        = $('#phc_diagnosis_num_rows').val();

	
	removeArea('prescription',area10);
	var presc=$('#prescription').val();
	addArea('prescription',area10);
	
	var rec = $('input[name=printrec]:checked').val();
	var plab = $('input[name=printlab]:checked').val();
	//var plab = 0;
	var prad =0;

	var dress = $('input[name=daydressin]:checked').val();
	if(dress==1){dress=1}else {dress=0}
	
	var recl = $('input[name=labrec]:checked').val();
	if(recl==1){recl=1}else {recl=0}
	var recr = $('input[name=radrec]:checked').val();
	if(recr==1){recr=1}else {recr=0}
	var recp = $('input[name=recpharm]:checked').val();
	if(recp==1){recp=1}else {recp=0}
	recn=0;
	if(phc_diagnosis_num_rows!=0){
	$().customAlert();
	alert('Error!', '<p>Diagnosis is required!</p>');
	//$('#tabs_phc_diagnosis').focus();
	return false;
	}

	if($('#phc_diagnosis_num_rows').val()!=0||$('#phc_diagnosis_num_rows').val()!=''){
		$.ajax({
		url:'data_rep.php',
		type:'POST',
		data:{id:13,pid:pid,history:history,history2:history2,dress:dress,diag:diag,presc:presc,recl:recl,recr:recr,recp:recp,recn:recn,phy:phy,sendto:sendto,reviewdate:reviewdate,
		temp:temp,bp1:bp1,bp2:bp2,weight:weight,pulserate:pulserate,resprate:resprate,rbs:rbs,typeclinics:typeclinics,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,complaint:complaint,in_default_accntype:accntype,in_defaultins_no:in_defaultins_no,in_defaultins_nome:in_defaultins_nome,in_currentins_no:in_currentins_no,in_currentins_nome:in_currentins_nome,switchboard:switchboard,in_payment_mode:in_payment_mode},
		success:function(data){
		$('#saveclose').html(data);
		if(rec==1){
		window.open("report.php?id=36&rcptno=" + pres_no + '&' + "\npid=" + pres_id + '&' + "\ncid=" + cust_id + '&' + "\ncno=" + cust_no);
			}
			if(plab==1){
		window.open('report.php?id=38&rcptno=' + pid);
			}
			if(prad==1){
		window.open('report.php?id=39&rcptno=' + pid);
			}
		}
		});
	}else{
		$().customAlert();
		alert('Error!', '<p>Diagnosis is required!</p>');
		return false;
	}
	
}

$('#amountins').keyup(function() {
	var fintot = parseInt($('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	var payam=$('#payam').val();
	if(payam!=''){payam = parseInt($('#payam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	}else payam=0;
	var dep=$('#depam').val();
	if(dep!=''){dep = parseInt($('#depam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	}else dep=0;
	var amount = $(this).val();
	if(amount==''){amount=0;
	}
	var tot=parseInt(amount,10) + parseInt(payam,10) + parseInt(dep,10);
	var change=parseInt(tot,10) - parseInt(fintot,10);
	change=(change).formatMoney(2, '.', ',');
	$('#changeam').val(change);
});

$('#newreg76').parent().find('input:first').width(100).prop('disabled',true);
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

$('#payam').keyup(function() {
	var fintot = parseInt($('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	var ins=$('#amountins').val();
	if(ins!=''){ins = parseInt($('#amountins').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	}else ins=0;
	var dep=$('#depam').val();
	if(dep!=''){dep = parseInt($('#depam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	}else dep=0;
	var amount = $(this).val();
	if(amount==''){amount=0;
	}
	var tot=parseInt(amount,10) + parseInt(ins,10) + parseInt(dep,10);
	var change=parseInt(tot,10) - parseInt(fintot,10);
	change=(change).formatMoney(2, '.', ',');
	$('#changeam').val(change);
	});


$('#depam').keyup(function() {
	var amount = $(this).val();
	var dep=$('#depbal').val();
     if(parseInt(dep)<parseInt(amount)){
			$().customAlert();
			alert('Error!', '<p>The amount deducting cannot be less than the deposit balance.</p>');
			$('#depam').val('');$('#depam').focus();
			}
else{
	var fintot = parseInt($('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	var ins=$('#amountins').val();
	if(ins!=''){ins = parseInt($('#amountins').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	}else ins=0;
	var pay=$('#payam').val();
	if(pay!=''){pay = parseInt($('#payam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
	}else pay=0;
	
	if(amount==''){amount=0;
	}
	var tot=parseInt(amount,10) + parseInt(ins,10) + parseInt(pay,10);
	var change=parseInt(tot,10) - parseInt(fintot,10);
	change=(change).formatMoney(2, '.', ',');
	$('#changeam').val(change);
}
	});

function submam(pid){
var insamount = $('#amountins').val();
var amountpaid = $('#payam').val();
var regn = $('#regn').val();
var oname = $('#oname').val();
var fintot = $('#fintot').val();
var bal = $('#changeam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var dep = $('#depam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var insid = $('#insid').val();
var insname = $('#insname').val();
var instatus = $('input[name=instatus]:checked').val();
if(instatus!=1){instatus=0}
var indep = $('input[name=depstatus]:checked').val();
if(indep!=1){indep=0}
var rec = $('input[name=credstatus]:checked').val();
if(rec!=1){rec=0}
var cardno = $('#cardno').val();
	if(amountpaid==''){
	$().customAlert();
	alert('Error!', '<p>No Amount paid!</p>');
	$('#payam').focus();
	}
	else if(instatus==1&&(insid==''||insamount==''||cardno=='')){
	$().customAlert();
	alert('Error!', '<p>Fill all the insurance details!</p>');
	$('#currentins').parent().find('input:first').focus();
	}
	else if((parseInt(bal)<0)&&rec==0){
	$().customAlert();
	alert('Error!', '<p>The balance cannot be negative.To allow negative balance, first check Enable credit.</p>');
	$('#payam').focus();
	}
	else{
		$('#newstudent').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:80,regn:regn,oname:oname,amountpaid:amountpaid,insamount:insamount,bal:bal,insid:insid,insname:insname,instatus:instatus,cardno:cardno,pid:pid,fintot:fintot,rec:rec,dep:dep,indep:indep},
		success:function(data){
		$('#newstudent').html(data);
		}
		});	
	}	
}

$(document).ready(function(){
	$("#consfee" ).combobox({});
	$("#income44" ).combobox({});
	$("#txtextmedicinc" ).combobox({});
	

	$("#docInpPharm1" ).combobox({
		select: function(event,ui){
		 var str = $('#docInpPharm1').val();
		 var parts=str.split('θ',18);
		 $('#txtproductcode').val(parts[0]);
		 $('#dname').val(parts[1]);
		 $('#txtprnormal').val(parts[2]);
		 $('#txtprcorporate').val(parts[3]);
		 $('#txtprinsurance').val(parts[4]);
		 $('#lcmhcateg').val(parts[5]);
		 $('#lcmhtype').val(parts[6]);
		 $('#dbal').val(parts[7]);
		 $('#txtcatid').val(parts[8]);
		 $('#txtcoverage').val(parts[9]);
		 //$('#lcmhtotal44').val(parts[9]);
	    var acctype 	        = $('#txtacctype').val();
	    var insurance_pr      = $('#txtprinsurance').val(parts[4]);
	    var corporate_pr      = $('#txtprcorporate').val(parts[3]);
	    var normal_pr    	  = $('#txtprnormal').val(parts[2]);
	    var insurer_id   	  = $('#txtinsurer_id').val();
	 	 var ttcover786 		  = $('#totalcoverage786').val();
	 	 var ttoverallcover420 = $('#txttotalcoverage786').val();

	 	if(parts[9]=='NO'){
	 		if($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26){
				$().customAlert();
				alert('Error!', '<p>This item is not covered!</p>');
				$('#txtcoverage').val('');
				return;	
			}
	 	}

	     if($('#quat4dr34').val()!=''){
	        var txtqty = $('#quat4dr34').val();
	 		  //if (txtqty=='') {txtqty=1;}

					   if($('#txtacctype').val()=='Insurance'){
					   	$('#price254').val(parts[4]);
					      var tot=parts[4] * txtqty;
					   }else if($('#txtacctype').val()=='Corporate'){
					   	$('#price254').val(parts[3]);
					      var tot=parts[3] * txtqty;
					   }else if($('#txtacctype').val()=='OTC'){
			             $('#price254').val(parts[10]);
			             var tot=parts[10] * txtqty;
			         }else if($('#txtacctype').val()=='APA'){
			             $('#price254').val(parts[11]);
			             var tot=parts[11] * txtqty;
			         }else if($('#txtacctype').val()=='Pacis'){
			             $('#price254').val(parts[12]);
			             var tot=parts[12] * txtqty;
			         }else if($('#txtacctype').val()=='Liason'){
			             $('#price254').val(parts[13]);
			             var tot=parts[13] * txtqty;
			         }else if($('#txtacctype').val()=='OldMutual'){
			             $('#price254').val(parts[14]);
			             var tot=parts[14] * txtqty;
			         }else if($('#txtacctype').val()=='KplcMinet'){
			             $('#price254').val(parts[15]);
			             var tot=parts[15] * txtqty;
			         }else if($('#txtacctype').val()=='MaklMaternity'){
			             $('#price254').val(parts[16]);
			             var tot=parts[16] * txtqty;
			         }else if($('#txtacctype').val()=='MinetCivilServants'){
			             $('#price254').val(parts[17]);
			             var tot=parts[17] * txtqty;
			         }
					   else{
					   	$('#price254').val(parts[2]);
					      var tot=parts[2] * txtqty;
					   }

				 var txtprice 	 = $('#price254').val();
			    //var txtprice    = $('#price254').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

			    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
				 	 var totsumcoverd2 = $('#totalcoverage786').val();
				 	 var ttoverallcover420 = parseInt(totsumcoverd2,10) + (tot);
			    }

			    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()!=''){
				 	 var totsumcoverd2 =  $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''); 	
				 	 var ttoverallcover420 = parseInt(totsumcoverd2,10) + (tot);	
				 	 var prevtotrecoverd019 = $('#txttotalcoverage786').val(); 	
			    }

		 	   //$('#txttotalcoverage786').val(ttoverallcover420);

	        if((insurer_id==20||insurer_id==26)&&(acctype=='Insurance')&&(parts[4]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[4] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='Corporate')&&(parts[3]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[3] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='Normal')&&(parts[2]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[2] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='OTC')&&(parts[10]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='APA')&&(parts[11]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='Pacis')&&(parts[12]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='Liason')&&(parts[13]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='OldMutual')&&(parts[14]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='KplcMinet')&&(parts[15]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='MaklMaternity')&&(parts[16]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==20||insurer_id==26)&&(acctype=='MinetCivilServants')&&(parts[17]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
	        else if((insurer_id==2)&&(acctype=='Insurance')&&(parts[4]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[4] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
	        else if((insurer_id==8)&&(acctype=='Insurance')&&(parts[4]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[4] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2)&&(acctype=='Corporate')&&(parts[3]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[3] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==8)&&(acctype=='Corporate')&&(parts[3]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[3] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2)&&(acctype=='Normal')&&(parts[2]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[2] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==8)&&(acctype=='Normal')&&(parts[2]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[2] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='OTC')&&(parts[10]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='APA')&&(parts[11]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='Pacis')&&(parts[12]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='Liason')&&(parts[13]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='OldMutual')&&(parts[14]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='KplcMinet')&&(parts[15]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='MaklMaternity')&&(parts[16]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==2||insurer_id==8)&&(acctype=='MinetCivilServants')&&(parts[17]>=1501||ttoverallcover420>=1501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='Normal')&&(parts[2]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[2] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='Corporate')&&(parts[3]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[3] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='Insurance')&&(parts[4]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[4] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='OTC')&&(parts[10]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='APA')&&(parts[11]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='Pacis')&&(parts[12]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='Liason')&&(parts[13]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='OldMutual')&&(parts[14]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='KplcMinet')&&(parts[15]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='MaklMaternity')&&(parts[16]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==26)&&(acctype=='MinetCivilServants')&&(parts[17]>=501||ttoverallcover420>=501)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }

		      else if((insurer_id==33)&&(acctype=='Normal')&&(parts[2]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[2] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='Corporate')&&(parts[3]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[3] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='Insurance')&&(parts[4]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[4] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='OTC')&&(parts[10]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='APA')&&(parts[11]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='Pacis')&&(parts[12]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='Liason')&&(parts[13]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='OldMutual')&&(parts[14]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='KplcMinet')&&(parts[15]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='MaklMaternity')&&(parts[16]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }
		      else if((insurer_id==33)&&(acctype=='MinetCivilServants')&&(parts[17]>=1001||ttoverallcover420>=1001)){
			      $().customAlert();
			      alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			      $('#txttotalcoverage786').val(totsumcoverd2);
					clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
					return;	
		      }

		      else{

					   if((insurer_id==20)&&(ttoverallcover420>=501)){
					      $().customAlert();
	      				alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
							clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
							return;	
					   }
					   if((insurer_id==2)&&(ttoverallcover420>=1501)){
					      $().customAlert();
	      				alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
							clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
							return;	
					   }
					   if((insurer_id==8)&&(ttoverallcover420>=1501)){
					      $().customAlert();
	      				alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
							clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
							return;	
					   }
					   if((insurer_id==26)&&(ttoverallcover420>=501)){
					      $().customAlert();
	      				alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
							clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
							return;	
					   }
					   if((insurer_id==33)&&(ttoverallcover420>=1001)){
					      $().customAlert();
	      				alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
							clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
							return;	
					   }
		      }
				sot=(tot).formatMoney(2, '.', ',');
				$('#lcmhtprice').val(sot);
				$('#lcmhsub44').val(sot);

	     }

			$('#quat4dr34').focus();
		
		 }
	});

	$("#appcoDocOrder834" ).combobox({
		select: function(event,ui){
		 var str = $('#appcoDocOrder834').val();
		 var parts=str.split('θ',18);
		 $('#txtproductcode').val(parts[0]);
		 $('#dname').val(parts[1]);
		 $('#txtprnormal').val(parts[2]);
		 $('#txtprcorporate').val(parts[3]);
		 $('#txtprinsurance').val(parts[4]);
		 $('#lcmhcateg').val(parts[5]);
		 $('#lcmhtype').val(parts[6]);
		 $('#dbal').val(parts[7]);
		 $('#txtcatid').val(parts[8]);
		 $('#txtcoverage').val(parts[9]);
		 //$('#lcmhtotal44').val(parts[9]);
	    var acctype 	        = $('#txtacctype').val();
	    var insurance_pr      = $('#txtprinsurance').val(parts[4]);
	    var corporate_pr      = $('#txtprcorporate').val(parts[3]);
	    var normal_pr    	  = $('#txtprnormal').val(parts[2]);
	    var insurer_id   	  = $('#txtinsurer_id').val();
	 	 var ttcover786 		  = $('#totalcoverage786').val();
	 	 var ttoverallcover420 = $('#txttotalcoverage786').val();

	 


	     if($('#quat4dr34').val()!=''){
	        var txtqty = $('#quat4dr34').val();
	 		  if (txtqty=='') {txtqty=1;}
			   if($('#txtacctype').val()=='Insurance'){
			   	$('#price254').val(parts[4]);
			      var tot=parts[4] * txtqty;
			   }else if($('#txtacctype').val()=='Corporate'){
			   	$('#price254').val(parts[3]);
			      var tot=parts[3] * txtqty;
			   }else{
			   	$('#price254').val(parts[2]);
			      var tot=parts[2] * txtqty;
			   }

			    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
				 	 var totsumcoverd = $('#totalcoverage786').val();
				 	 var ttoverallcover420 = parseInt(totsumcoverd,10) + (tot);
				 	 $('#txttotalcoverage786').val(ttoverallcover420);
			    }

			    if($('#txttotalcoverage786').val()!=''){
				 	 var totsumcoverd = $('#txttotalcoverage786').val(); 	
				 	 var ttoverallcover420 = parseInt(totsumcoverd,10) + (tot);	
			    }

	     }

				sot=(tot).formatMoney(2, '.', ',');
				$('#lcmhtprice').val(sot);
				$('#lcmhsub44').val(sot);
			   $('#quat4dr34').focus();
		
		 }
	});


	$("#appcoDocOrder019" ).combobox({
		select: function(event,ui){
		 var str = $('#appcoDocOrder019').val();
		 var parts=str.split('θ',18);
		 $('#txtproductcode').val(parts[0]);
		 $('#dname').val(parts[1]);
		 $('#txtprnormal').val(parts[2]);
		 $('#txtprcorporate').val(parts[3]);
		 $('#txtprinsurance').val(parts[4]);
		 $('#lcmhcateg').val(parts[5]);
		 $('#lcmhtype').val(parts[6]);
		 $('#dbal').val(parts[7]);
		 $('#txtcatid').val(parts[8]);
		 $('#txtcoverage').val(parts[9]);
		 //$('#lcmhtotal44').val(parts[9]);
	    var acctype 	        = $('#txtacctype').val();
	    var insurance_pr      = $('#txtprinsurance').val(parts[4]);
	    var corporate_pr      = $('#txtprcorporate').val(parts[3]);
	    var normal_pr    	  = $('#txtprnormal').val(parts[2]);
	    var insurer_id   	  = $('#txtinsurer_id').val();
	 	 var ttcover786 		  = $('#totalcoverage786').val();
	 	 var ttoverallcover420 = $('#txttotalcoverage786').val();

	 


	     if($('#txtqty019').val()!=''){
	        var txtqty = $('#txtqty019').val();
	 		  if (txtqty=='') {txtqty=1;}
			   if($('#txtacctype').val()=='Insurance'){
			   	$('#price254').val(parts[4]);
			      var tot=parts[4] * txtqty;
			   }else if($('#txtacctype').val()=='Corporate'){
			   	$('#price254').val(parts[3]);
			      var tot=parts[3] * txtqty;
			   }else{
			   	$('#price254').val(parts[2]);
			      var tot=parts[2] * txtqty;
			   }

			    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
				 	 var totsumcoverd = $('#totalcoverage786').val();
				 	 var ttoverallcover420 = parseInt(totsumcoverd,10) + (tot);
				 	 $('#txttotalcoverage786').val(ttoverallcover420);
			    }

			    if($('#txttotalcoverage786').val()!=''){
				 	 var totsumcoverd = $('#txttotalcoverage786').val(); 	
				 	 var ttoverallcover420 = parseInt(totsumcoverd,10) + (tot);	
			    }

	     }

				sot=(tot).formatMoney(2, '.', ',');
				$('#lcmhtprice').val(sot);
				$('#lcmhsub44').val(sot);
			$('#txtqty019').focus();
		
		 }
	});


});

$(document).ready(function(){
$('#txtqty019').keyup(function() {
	 var txtprice 	 = $('#price254').val();
    var txtacctype = $('#txtacctype').val();
    var txtdisc    = $('#txtdisc').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
    if(txtdisc==''){
        txtdisc=0;	
    }
	var qty = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var sot=txtprice * qty;
	var tot=parseInt(sot,10) - parseInt(txtdisc,10);
	var sot=(sot).formatMoney(2, '.', ',');
	$('#lcmhtprice').val(sot);
	tot=(tot).formatMoney(2, '.', ',');
	$('#lcmhsub44').val(tot);
});
});


//$(document).ready(function(){
$('#quat4dr34').keyup(function() {
	 var txtprice 			  = $('#price254').val();
    var acctype 	        = $('#txtacctype').val();
    var insurer_id   	  = $('#txtinsurer_id').val();
	 var ttcover786   	  = $('#totalcoverage786').val();
	 var bal = $('#dbal').val();
	 if(bal==''){bal=0}

	 var qty = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	 //var totperitem=txtprice * qty;
	 var sot=txtprice * qty;
	//var qty = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(parseInt(qty,10) >parseInt(bal,10) ){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Department. Bal is ' + bal + '</p>');
		$('#quat4dr34').val('');	
		return;	
	}

    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
	 	 var totsumcoverd = $('#totalcoverage786').val();
	 	 //var totsumcoverd = parseInt(totsumcoverd2,10) - parseInt(txtprice,10);
	 	 var ttoverallcover420 = parseInt(totsumcoverd,10) + (sot);
    }

    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()!=''){
	 	 var totsumcoverd = $('#txttotalcoverage786').val(); 	
	 	 //var totsumcoverd = parseInt(totsumcoverd2,10) - parseInt(txtprice,10);
	 	 var ttoverallcover420 = parseInt(totsumcoverd,10) + (sot);	
    }

	 //$('#txttotalcoverage786').val(ttoverallcover420);
    var txtdisc = $('#txtdisc').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
    if(txtdisc==''){
        txtdisc=0;	
    }

     if((insurer_id==20||insurer_id==26)&&(acctype=='Insurance')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='Corporate')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='Normal')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='OTC')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='APA')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='Pacis')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='Liason')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='OldMutual')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='KplcMinet')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='MaklMaternity')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if((insurer_id==20||insurer_id==26)&&(acctype=='MinetCivilServants')&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
     else if(acctype=='Insurance'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Corporate'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Normal'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Price: '+ ttoverallcover420 +'/=</p>');
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OTC'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='APA'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Pacis'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Liason'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OldMutual'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='KplcMinet'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MaklMaternity'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MinetCivilServants'&&(insurer_id==2)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
     else if(acctype=='Insurance'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Corporate'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Normal'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OTC'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='APA'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Pacis'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Liason'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OldMutual'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='KplcMinet'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MaklMaternity'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MinetCivilServants'&&(insurer_id==8)&&(txtprice>=1501||ttoverallcover420>=1501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }


     else if(acctype=='Insurance'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Corporate'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Normal'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OTC'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='APA'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Pacis'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Liason'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OldMutual'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='KplcMinet'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MaklMaternity'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MinetCivilServants'&&(insurer_id==26)&&(txtprice>=501||ttoverallcover420>=501)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
     else if(acctype=='Insurance'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Corporate'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Normal'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OTC'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='APA'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Pacis'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='Liason'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='OldMutual'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='KplcMinet'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MaklMaternity'&&(insurer_id==33)&&(txtprice>=V||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }
      else if(acctype=='MinetCivilServants'&&(insurer_id==33)&&(txtprice>=1001||ttoverallcover420>=1001)){
	      $().customAlert();
			alert('Error!', '<p>Limit Reached. Total Invoice: '+ ttoverallcover420 +'/=.<br/> Unit Price: '+ txtprice +'/=.</p>');
			$('#txttotalcoverage786').val(totsumcoverd);
			clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
			return;	
      }

      else {

			//var sot=txtprice * qty;

			//var capbill = parseInt(ttoverallcover420,10) + (sot);
		   if((insurer_id==20)&&(ttoverallcover420>=501)){
		      $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
		   }
		   if((insurer_id==2)&&(ttoverallcover420>=1501)){
		      $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
		   }
		   if((insurer_id==8)&&(ttoverallcover420>=1501)){
		      $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
		   }
		   if((insurer_id==26)&&(ttoverallcover420>=501)){
		      $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
		   }
		   if((insurer_id==33)&&(ttoverallcover420>=1001)){
		      $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
		   }
			var tot=parseInt(sot,10) - parseInt(txtdisc,10);
			var sot=(sot).formatMoney(2, '.', ',');
			$('#lcmhtprice').val(sot);
			tot=(tot).formatMoney(2, '.', ',');
			$('#lcmhsub44').val(tot);

      }


});
//});

function PharmBill254(a,b,prescname){

var txtacctype = $('#txtacctype').val();
var txtprice =  $('#price254').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tprice 	=  $('#lcmhtprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var quat = $('#quat4dr34').val();
var disc = $('#txtdisc').val();
var subn = $('#lcmhsub44').val();
var iid = $('#txtextmedicinc').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#dbal').val();
if(bal==''){bal=0}
var type = $('#lcmhtype').val();
var code = $('#txtproductcode').val();
var name =  $('#dname').val();
var categ =  $('#lcmhcateg').val();
var txtcatid =  $('#txtcatid').val();
var oname =  $('#patname').val(); 
var regn =  $('#patid').val();
var dept4rm           = $('#dept4rm').val();
var txtcoverage       = $('#txtcoverage').val();
var txtinsurer_id     = $('#txtinsurer_id').val();
var totalcoverage786  = $('#totalcoverage786').val(); 
//var ttoverallcover420 = $('#txttotalcoverage786').val(); 
var ttoverallcover420 =  $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total 				 =  $('#lcmhtotal44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totdrugs 			 = $('#lcmhtotal44').val(); 
//if (totdrugs==''){totdrugs=txtprice;} 
//var capbill = parseInt(totdrugs,10) + parseInt(txtprice,10);
if ($('#txttotalcoverage786').val()!=''){
   var capbill = parseInt(ttoverallcover420,10) + parseInt(tprice,10);
}else{
	var totalcoverage786=$('#totalcoverage786').val();
   var capbill = parseInt(totalcoverage786,10) + parseInt(tprice,10);
}


//$('#txttotalcoverage786').val(capbill);

if(txtprice==''){
		$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
		clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
		//$('#docInpPharm1').parent().find("input:first").focus();	
		return;	
}
else if(code==''||name==''){
		$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
		clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
		//$('#docInpPharm1').parent().find("input:first").focus();	
		return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
		$('#quat4dr34').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat4dr34').focus();	
		return;	
}
else if($('#oname').val()==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#patname').focus();	
		return;	
}

else{
	if(dept4rm=='OPD'){
			if((txtinsurer_id==2||txtinsurer_id==8)&&(capbill>=1501)){
			   $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&ttoverallcover420>=501){
			   $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&ttoverallcover420>=1501){
			   $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&capbill>=1501){
			   $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
			}
			else if((txtinsurer_id==26)&&ttoverallcover420>=501){
			   $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
			}
			else if((txtinsurer_id==26)&&capbill>=501){
			   $().customAlert();
		      alert('Error!', '<p>Limit Reached. Total Bill is '+ ttoverallcover420 +'/=</p>');
				clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
				return;	
			}
			else{
			$('#displayinv').html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:'131.3',iid:iid,a:a,code:code,name:name,prescname:prescname,price:txtprice,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,totalcoverage786:capbill},
				success:function(data){
					$('#displayinv').html(data);
				}
				});
			}
		clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();

	}
	else{
	$('#displayinv').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:'131.3',iid:iid,a:a,code:code,name:name,prescname:prescname,price:txtprice,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,totalcoverage786:capbill},
		success:function(data){
			//do something
			$('#displayinv').html(data);
		}
		});
	}
	clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
}
}

function PharmBill834(a,b,prescname){

var txtacctype = $('#txtacctype').val();
var txtprice = $('#price254').val();
var tprice = $('#lcmhtprice').val();
var quat = $('#txtqty019').val();
var disc = $('#txtdisc').val();
var subn = $('#lcmhsub44').val();
var iid = $('#txtextmedicinc').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#dbal').val();
if(bal==''){bal=0}
var type = $('#lcmhtype').val();
var code = $('#txtproductcode').val();
var name =  $('#dname').val();
var categ =  $('#lcmhcateg').val();
var txtcatid =  $('#txtcatid').val();
var oname =  $('#patname').val(); 
var regn =  $('#patid').val();
var dept4rm           = $('#dept4rm').val();
var txtcoverage       = $('#txtcoverage').val();
var txtinsurer_id     = $('#txtinsurer_id').val();
var totalcoverage786  = $('#totalcoverage786').val(); 
var ttoverallcover420 = $('#txttotalcoverage786').val(); 
var total 				 =  $('#lcmhtotal44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totdrugs 			 = $('#lcmhtotal44').val(); 
if (totdrugs==''){totdrugs=txtprice;} 
//var capbill = parseInt(totdrugs,10) + parseInt(txtprice,10);
var capbill = $('#txttotalcoverage786').val(); 

if(txtprice==''){
		$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
		$('#appcoDocOrder019').parent().find("input:first").focus();	
		return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#txtqty019').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#txtqty019').focus();	
		return;	
}
else if($('#oname').val()==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#patname').focus();	
		return;	
}

else{
	$('#displayinv').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:'131.3',iid:iid,a:a,code:code,name:name,prescname:prescname,price:txtprice,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,totalcoverage786:capbill},
		success:function(data){
			//do something
			$('#displayinv').html(data);
		}
		});
	clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
}
}


function PharmBill606(a,b,prescname){
var txtacctype = $('#txtacctype').val();
var txtprice =  $('#price254').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tprice 	=  $('#lcmhtprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var quat = $('#quat4dr34').val();
var disc = $('#txtdisc').val();
var subn = $('#lcmhsub44').val();
var iid = $('#txtextmedicinc').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#dbal').val();
if(bal==''){bal=0}
var type = $('#lcmhtype').val();
var code = $('#txtproductcode').val();
var name =  $('#dname').val();
var categ =  $('#lcmhcateg').val();
var txtcatid =  $('#txtcatid').val();
var oname =  $('#patname').val(); 
var regn =  $('#patid').val();
var dept4rm = $('#dept4rm').val();
var txtcoverage = $('#txtcoverage').val();
var txtinsurer_id = $('#txtinsurer_id').val();
var totalcoverage786  = $('#totalcoverage786').val(); 
var ttoverallcover420 = $('#txttotalcoverage786').val(); 
var total =  $('#lcmhtotal44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var capbill = $('#txttotalcoverage786').val(); 

	if(txtprice==''){
	$().customAlert();
			alert('Error!', '<p>Select an item!</p>');
		$('#docInpPharm1').parent().find("input:first").focus();	
		return;	
	}
	else if(quat==''){
			$().customAlert();
			alert('Error!', '<p>Enter the quantity!</p>');
			$('#quat4dr34').focus();	
			return;	
	}
	else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
			$().customAlert();
			alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
			$('#quat4dr34').focus();	
			return;	
	}
	else if($('#oname').val() ==''){
		$().customAlert();
			alert('Error!', '<p>Fill the name of the patient!</p>');
			$('#patname').focus();	
			return;	
	}
	else{
		$('#displayinv').html(loader);
		$.ajax({
			url:'bridge.php',
			data:{id:'131.3',iid:iid,a:a,code:code,name:name,prescname:prescname,price:txtprice,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,totalcoverage786:capbill},
			success:function(data){
				//do something
				$('#displayinv').html(data);
			}
		});
		clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
	}
}
function unregnpat(){
	var id = $('#idpay').val();
	$("#mainp").html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:id,pid:'0'},
		success:function(data){
		$('#mainp').html(data);
		}
	});
}
$("#symptoms" ).combobox({
	select: function(event,ui){
	var param = $('#symptoms').val();
	removeArea('history',area3);
	var med=$('#history').val();
	med=med + param + ';<br/>';
	$('#history').val(med);
	area3 = new nicEditor({fullPanel : true}).panelInstance("history");
}	
});

function clearsymp(){
	$("#symptoms").parent().find("input:first").val('').focus();
}
$("#symptoms2" ).combobox({
	select: function(event,ui){
	var param = $('#symptoms2').val();
	removeArea('history2',area18);
	var med=$('#history2').val();
	med=med + param + ';<br/>';
	$('#history2').val(med);
	area18 = new nicEditor({fullPanel : true}).panelInstance("history2");
}	
});

function removeArea(a,b) {
b.removeInstance(a);
}
function addArea(a,b) {
b = new nicEditor({fullPanel : true}).panelInstance(a);
}
function savenewpresc(pid){
	$("#saveclose").html(loader);
	var insid       = $('#insid').val();
	var insname     = $('#insname').val();
	var accntype    = $('#accntype').val();
	var sendto      =$('#deptsendto').val();
	var reviewdate  =$('#datepick3').val();
	var switchboard = $('#switchboard').val();

	var temp=$('#temp').val();
	var bp1=$('#bp1').val();
	var bp2=$('#bp2').val();
	//var type=$('#ctype').val();
	var weight=$('#weight').val();
	var pulserate=$('#pulserate').val();
	var resprate=$('#resprate').val();
	var rbs=$('#rbs').val();
	var typeclinics = $('#typeDMclinic').val();
	var newscreening=$('input[name=gender2]:checked').val();
	var knownhyper=$('input[name=gender3]:checked').val();
	var takingmeds=$('input[name=gender4]:checked').val();
	// if(typeclinics==''){
	// 	$().customAlert();
	// 	alert('Error!', '<p>Clinic is required. Triage tab.!</p>');
	// 	$('#typeDMclinic').focus();
	// }
	
	removeArea('history',area3);
	var history=$('#history').val();
	addArea('history',area3);

	removeArea('history2',area18);
	var history2=$('#history2').val();
	addArea('history2',area18);
	
	
	removeArea('phyexam',area14);
	var phy=$('#phyexam').val();
	addArea('phyexam',area14);
	
	
	
	removeArea('diagnosis',area8);
	var diag=$('#diagnosis').val();
	addArea('diagnosis',area8);
	
	removeArea('treatment',area9);
	var tre=$('#treatment').val();
	addArea('treatment',area9);
	
	removeArea('prescription',area10);
	var presc=$('#prescription').val();
	addArea('prescription',area10);

	if(history==''||history=='<br/>'||history=='</br>'||history=='<br>'||history=='None'||history=='none'){
		$().customAlert();
		alert('Error!', '<p>Current History is Required.</p>');
		$('#history').focus();
	}
	//alert(history);

	// if(phy==''||phy=='<br/>'||phy=='</br>'||phy=='<br>'||phy=='None'||phy=='none'){
	// 	$().customAlert();
	// 	alert('Error!', '<p>Physical Examination is Required.</p>');
	// 	$('#phyexam').focus();
	// }
	//alert(phy);

	// if(diag==''||diag=='<br/>'||diag=='</br>'||diag=='<br>'||diag=='None'||diag=='none'){
	// 	$().customAlert();
	// 	alert('Error!', '<p>Diagnosis is Required. Select Diseases Summary.</p>');
	// 	$('#diagnosis').focus();
	// }
	//alert(diag);
	
	
	var rec = $('input[name=printrec]:checked').val();
	var plab = 0;
	var prad =0;

	var dress = $('input[name=daydressin]:checked').val();
	if(dress==1){dress=1}else {dress=0}
	
	var recl = $('input[name=labrec]:checked').val();
	if(recl==1){recl=1}else {recl=0}
	var recr = $('input[name=radrec]:checked').val();
	if(recr==1){recr=1}else {recr=0}
	var recp = $('input[name=recpharm]:checked').val();
	if(recp==1){recp=1}else {recp=0}
	recn=0;
	var rect = $('input[name=rectheatre]:checked').val();
	if(rect==1){rect=1}else {rect=0}
	$.ajax({
	url:'data.php',
	type:'POST',
	data:{id:71,pid:pid,history:history,history2:history2,dress:dress,diag:diag,tre:tre,presc:presc,recl:recl,recr:recr,recp:recp,recn:recn,phy:phy,rect:rect,sendto:sendto,reviewdate:reviewdate,
	temp:temp,bp1:bp1,bp2:bp2,weight:weight,pulserate:pulserate,resprate:resprate,rbs:rbs,typeclinics:typeclinics,newscreening:newscreening,knownhyper:knownhyper,takingmeds:takingmeds,accntype:accntype,insid:insid,insname:insname,switchboard:switchboard},
	success:function(data){
	$('#saveclose').html(data);
	if(rec==1){
	window.open('report.php?id=36&rcptno=' + pid);
		}
		if(plab==1){
	window.open('report.php?id=38&rcptno=' + pid);
		}
		if(prad==1){
	window.open('report.php?id=39&rcptno=' + pid);
		}
	}
	});
	
}


function savedocin(pid){	
	$("#saveclose").html(loader);
	var oldprescid=$('#old_presc_id').val();
	var oldpatientid=$('#old_patient_id').val();
	var pres_id = $('#enc_pres_id').val();
	var pres_no = $('#enc_pres_no').val();
	var cust_id = $('#enc_cust_id').val();
	var cust_no = $('#enc_cust_no').val();

	//removeArea('prescription',area10);
	var presc=$('#prescription').val();
	//addArea('prescription',area10);	
	
	//removeArea('diagnosis',area8);
	var diag=$('#diagnosis').val();
	//addArea('diagnosis',area8);
	var phc_diagnosis_num_rows        = $('#phc_diagnosis_num_rows').val();
	
	var rec = $('input[name=printrec]:checked').val();
	var plab = $('input[name=printlab]:checked').val();
	//var plab = 0;
	var prad =0;
	
	
	var recl = $('input[name=labrec]:checked').val();
	if(recl==1){recl=1}else {recl=0}
	var recr = $('input[name=radrec]:checked').val();
	if(recr==1){recr=1}else {recr=0}
	var recp = $('input[name=recpharm]:checked').val();
	if(recp==1){recp=1}else {recp=0}

	// if(phc_diagnosis_num_rows!=0){
	// 	$().customAlert();
	// 	alert('Error!', '<p>Diagnosis is required!</p>');
	// 	return false;
	// }

 	// if(presc==''){
	// 	$().customAlert();
	// 	alert('Error!', '<p>Prescription is Required!</p>');
	// 	$("#docInpPharm1").focus();
	// }
 	// else if(diag==''){
	// 	$().customAlert();
	// 	alert('Error!', '<p>Diagnosis is Required!</p>');
	// 	$("#docInpPharm1").focus();
	// }
	// else{
		//$("#saveclose").html(loader);	
	//if($('#phc_diagnosis_num_rows').val()!=0||$('#phc_diagnosis_num_rows').val()!=''){	
		$.ajax({
			url:'data.php',
			type:'POST',
			data:{id:124,pid:pid,presc:presc,recl:recl,recr:recr,recp:recp,diag:diag},
			success:function(data){
				$('#saveclose').html(data);
				if(rec==1){
					window.open("report.php?id=36&rcptno=" + pres_no + '&' + "\npid=" + pres_id + '&' + "\ncid=" + cust_id + '&' + "\ncno=" + cust_no);
				}
				if(plab==1){
					window.open("report.php?id=70&code=2&a=5&pno=" + pres_no + '&' + "\npid=" + pres_id + '&' + "\ncid=" + cust_id + '&' + "\ncno=" + cust_no + '&' + "\ncode2=" + cust_id);
				}
				if(prad==1){
					window.open('report.php?id=39&rcptno=' + pid);
				}
			}
		});
	// }else{
	// 	$().customAlert();
	// 	alert('Error!', '<p>Diagnosis is required!</p>');
	// 	return false;
	// }

	//}
	
}


function savenewpresc2(pid){
	//alert(pid);

	removeArea('phyexam',area14);
	var phy=$('#phyexam').val();
	addArea('phyexam',area14);
	
	removeArea('diagnosis',area8);
	var diag=$('#diagnosis').val();
	addArea('diagnosis',area8);
	
	
	removeArea('history',area3);
	var history=$('#history').val();
	addArea('history',area3);

	// removeArea('history2',area18);
	// var history2=$('#history2').val();
	// addArea('history2',area18);

	if(history==''||history=='<br/>'||history=='</br>'||history=='<br>'||history=='None'||history=='none'){
		$().customAlert();
		alert('Error!', '<p>Current History is Required.</p>');
		$('#history').focus();
	}
	//alert(history);

	if(phy==''||phy=='<br/>'||phy=='</br>'||phy=='<br>'||phy=='None'||phy=='none'){
		$().customAlert();
		alert('Error!', '<p>Physical Examination is Required.</p>');
		$('#phyexam').focus();
	}
	//alert(phy);

	if(diag==''||diag=='<br/>'||diag=='</br>'||diag=='<br>'||diag=='None'||diag=='none'){
		$().customAlert();
		alert('Error!', '<p>Diagnosis is Required. Select Diseases Summary.</p>');
		$('#diagnosis').focus();
	}
	//alert(diag);
	
	
}

function showlab(){
	alert('');
}
function clearlab(){
 $("#labt").parent().find("input:first").val('').focus();		
}
function clearrad(){
 $("#radt").parent().find("input:first").val('').focus();		
}
function cleardiag(){
 $("#diagt").parent().find("input:first").val('').focus();		
}
function clearlabrt(){
 $("#labrt").parent().find("input:first").val('').focus();		
}
function clearsurg(){
 $("#surgt").parent().find("input:first").val('').focus();		
}
function cleartreat(){
 $("#treat").parent().find("input:first").val('').focus();		
}
function clearpresc(){
 $("#presct").parent().find("input:first").val('').focus();		
}
$(document).ready(function(){
	$("#labt" ).combobox({
		select: function(event,ui){
		var param = $('#labt').val();
		removeArea('labtests',area4);
		var med = $('#labtests').val();
		med=med + param + ';<br/>';
		 $('#labtests').val(med);
		area4 = new nicEditor({fullPanel : true}).panelInstance("labtests");
		}
		
	});
	$("#radt" ).combobox({
		select: function(event,ui){
		var param = $('#radt').val();
		removeArea('radtests',area5);
		var med = $('#radtests').val();
		med=med + param + ';<br/>';
		$('#radtests').val(med);
		area5 = new nicEditor({fullPanel : true}).panelInstance("radtests");
		}
		
	});
	$("#diagt" ).combobox({
		select: function(event,ui){
		var param = $('#diagt').val();
		removeArea('diagnosis',area8);
		var med = $('#diagnosis').val();
		med=med + param + ';<br/>';
		$('#diagnosis').val(med);
		area8 = new nicEditor({fullPanel : true}).panelInstance("diagnosis");
		}
		
	});
	$("#labrt" ).combobox({
		select: function(event,ui){
		var param = $('#labrt').val();
		$("#labtemp").html(loader);
			$.ajax({
			url:'bridge.php',
			data:{id:97.1,param:param},
			success:function(data){
			$('#labtemp').html(data);
			}
			});	
		}
		
	});
	$("#surgt" ).combobox({
		select: function(event,ui){
		 var param = $('#surgt').val();
		 var med = $('#surgery').val();	
		 med=med + '\n' + param + '; ';
		 $('#surgery').val(med);
		}
		
	});
	$("#treat" ).combobox({
		select: function(event,ui){
		var param = $('#treat').val();
		removeArea('treatment',area9);
		var med = $('#treatment').val();
		med=med + param + ';<br/>';
		$('#treatment').val(med);
		area9 = new nicEditor({fullPanel : true}).panelInstance("treatment");
		}
		
	});
	$("#presct" ).combobox({
		select: function(event,ui){
		var param = $('#presct').val();
		removeArea('prescription',area10);
		var med = $('#prescription').val();
		if(document.getElementById("prescription").value.match(/\n/g)){
			var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
			med=med  + '\n' +  s + '. ' + param + ';<br/> ';
		 	$('#prescription').val(med);
		}
				else {
					if(med!=''){
					s=1;
					med=med + s + '. ' + param + ';\n<br/> ';
		 			$('#prescription').val(med);
					}else	{s=1;
					med=med + s + '. ' + param + ';';
		 			$('#prescription').val(med);
					}
				}
			area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
		}
		
	});
	$(".dr" ).combobox({});
	$("#dr1" ).combobox({
		select: function(event,ui){
		var str = $('#dr1').val();
		 var parts=str.split('θ',2);
		 $('#dname').val(parts[0]);
		 $('#dbal').val(parts[1]);
		}
		
	});

});

function addthispresc2(){
	var dr1 = $('#dname').val();
	var dr3 = $('#quat4dr34').val();
	var dbal = $('#dbal').val();
	var dr4 = $('#dr4').parent().find("input:first").val();
	var dr5 = $('#dr5').parent().find("input:first").val();
	var dr6 = $('#dr6').parent().find("input:first").val();
	var dr8 = $('#dr8').parent().find("input:first").val();
	
	var dr7 = $('#dr7').val();
	if(dr7==''){dr7=1}
	var dr9 = $('#dr9').val();
	if(dr9==''){dr9=1}
	var d5 = $('#dr5').val();
	if(d5==''){d5=1}
	var d8= $('#dr8').val();
	if(d8==''){d8=1}
	
	if($('#quat4dr34').val()==''){
	var dr3=Math.round(dr9*d5*dr7*d8);
	}
	
	
	var param=dr1 + '-' + dr9 + ' ' + dr4  + '-' + dr6 + '-' + dr5 + '-' + dr7 + ' ' + dr8 + '-' + dr3;
	removeArea('prescription',area10);
	var med = $('#prescription').val();	

	//PharmBill254('pharmcart',0);
	//PharmBill254('pharmcart',0,param);

	$('#dname').val('');
	$('#quat4dr34').val('');
	$('#dbal').val('');
	$('#dr4').parent().find("input:first").val('');
	$('#dr5').parent().find("input:first").val('');
	$('#dr6').parent().find("input:first").val('');
	$('#dr8').parent().find("input:first").val('');
	
	if($('#dr1').val()==''){
	$().customAlert();
		alert('Error!', '<p>Select a drug!</p>');
		$('#dr1').parent().find("input:first").focus();	
	}
	else if(parseInt(dr3,10)>parseInt(dbal,10)){
		$.confirm({
			'title'		: 'Proceed Confirmation',
			'message'	: 'The drug quantity you have entered is more than the existing stock whose balance is ' + dbal +' units.Do you want to proceed to add this prescription?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
			removeArea('prescription',area10);
			if(document.getElementById("prescription").value.match(/\n/g)){
				var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
				med=med  + '\n' +  s + '. ' + param + ';<br/> ';
				$('#prescription').val(med);
			}
			else {
						if(med!=''){
						s=1;
						med=med + s + '. ' + param + ';\n<br/> ';
						$('#prescription').val(med);
						}else	{s=1;
						med=med + s + '. ' + param + ';';
						$('#prescription').val(med);
						
						}
					}
				area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
		
	}
else{
	
			 if(document.getElementById("prescription").value.match(/\n/g)){
				var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
				med=med  + '\n' +  s + '. ' + param + ';<br/> ';
				$('#prescription').val(med);
			}
			else {
							if(med!=''){
							s=1;
							med=med + s + '. ' + param + ';\n<br/> ';
							$('#prescription').val(med);
							}else	{s=1;
							med=med + s + '. ' + param + ';';
							$('#prescription').val(med);
							}
					}
					
			
	}
	area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
}

function addthispresc(){
	var dr1 = $('#dname').val();
	var dr3 = $('#quat4dr34').val();
	var dbal = $('#dbal').val();
	var dr4 = $('#dr4').parent().find("input:first").val();
	var dr5 = $('#dr5').parent().find("input:first").val();
	var dr6 = $('#dr6').parent().find("input:first").val();
	var dr8 = $('#dr8').parent().find("input:first").val();
	
	var dr7 = $('#dr7').val();
	if(dr7==''){dr7=1}
	var dr9 = $('#dr9').val();
	if(dr9==''){dr9=1}
	var d5 = $('#dr5').val();
	if(d5==''){d5=1}
	var d8= $('#dr8').val();
	if(d8==''){d8=1}
	
	if($('#quat4dr34').val()==''){
	var dr3=Math.round(dr9*d5*dr7*d8);
	}
	
	
	var param=dr1 + '-' + dr9 + ' ' + dr4  + '-' + dr6 + '-' + dr5 + '-' + dr7 + ' ' + dr8 + '-' + dr3;
	removeArea('prescription',area10);
	var med = $('#prescription').val();	
	
	// if($('#txtproductcode').val()==''||$('#dname').val()==''){
	// $().customAlert();
	// 	alert('Error!', '<p>Select a drug!</p>');
	// 	$("#docInpPharm1").parent().find("input:first").val('').focus();
		
	// }
	
		if($('#txtproductcode').val()!=''||$('#dname').val()!=''){

			PharmBill254('pharmcart',0,param);

			$('#dname').val('');
			$('#quat4dr34').val(1);
			$('#dbal').val('');
			$('#dr4').parent().find("input:first").val('');
			$('#dr5').parent().find("input:first").val('');
			$('#dr6').parent().find("input:first").val('');
			$('#dr8').parent().find("input:first").val('');
		   $('#txtproductcode').val('');
		   $('#dname').val('');
			
			if($('#docInpPharm1').val()==''){
			$().customAlert();
				alert('Error!', '<p>Select a drug!</p>');
				$("#docInpPharm1").parent().find("input:first").val('').focus();
				
			}
			else if(parseInt(dr3,10)>parseInt(dbal,10)){
				$.confirm({
					'title'		: 'Proceed Confirmation',
					'message'	: 'The drug quantity you have entered is more than the existing stock whose balance is ' + dbal +' units.Do you want to proceed to add this prescription?',
					'buttons'	: {
						'Yes'	: {
							'class'	: 'blue',
							'action': function(){
					removeArea('prescription',area10);
					if(document.getElementById("prescription").value.match(/\n/g)){
						var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
						med=med  + '\n' +  s + '. ' + param + ';<br/> ';
						$('#prescription').val(med);
					}
					else {
								if(med!=''){
								s=1;
								med=med + s + '. ' + param + ';\n<br/> ';
								$('#prescription').val(med);
								}else	{s=1;
								med=med + s + '. ' + param + ';';
								$('#prescription').val(med);
								
								}
							}
						area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
							}
						},
						'No'	: {
							'class'	: 'gray',
							'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
						}
					}
				});	
				
			}
		else{
			
					 if(document.getElementById("prescription").value.match(/\n/g)){
						var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
						med=med  + '\n' +  s + '. ' + param + ';<br/> ';
						$('#prescription').val(med);
					}
					else {
									if(med!=''){
									s=1;
									med=med + s + '. ' + param + ';\n<br/> ';
									$('#prescription').val(med);
									}else	{s=1;
									med=med + s + '. ' + param + ';';
									$('#prescription').val(med);
									}
							}
							
					
			}

	}
	else{
		clrprescribpharm_txtboxes_toprompt_selectitem_after_invalidbill();
	}


	area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
}

function addthispresc606(){
	var dr1 = $('#dname').val();
	var dept4rm = $('#dept4rm').val();
	var dr3 = $('#quat4dr34').val();
	var dbal = $('#dbal').val();
	var dr4 = $('#dr4').parent().find("input:first").val();
	var dr5 = $('#dr5').parent().find("input:first").val();
	var dr6 = $('#dr6').parent().find("input:first").val();
	var dr8 = $('#dr8').parent().find("input:first").val();
	
	var dr7 = $('#dr7').val();
	if(dr7==''){dr7=1}
	var dr9 = $('#dr9').val();
	if(dr9==''){dr9=1}
	var d5 = $('#dr5').val();
	if(d5==''){d5=1}
	var d8= $('#dr8').val();
	if(d8==''){d8=1}
	
	if($('#quat4dr34').val()==''){
	var dr3=Math.round(dr9*d5*dr7*d8);
	}
	
	
	var param=dr1 + '-' + dr9 + ' ' + dr4  + '-' + dr6 + '-' + dr5 + '-' + dr7 + ' ' + dr8 + '-' + dr3;
	removeArea('prescription',area10);
	var med = $('#prescription').val();	

	PharmBill606('pharmcart',0,param);

	$('#dname').val('');
	$('#quat4dr34').val(1);
	$('#dbal').val('');
	$('#dr4').parent().find("input:first").val('');
	$('#dr5').parent().find("input:first").val('');
	$('#dr6').parent().find("input:first").val('');
	$('#dr8').parent().find("input:first").val('');
   $('#txtproductcode').val('');
   $('#dname').val('');
	
	if($('#docInpPharm1').val()==''){
	$().customAlert();
		alert('Error!', '<p>Select a drug!</p>');
		$("#docInpPharm1").parent().find("input:first").val('').focus();
		
	}
	else if(parseInt(dr3,10)>parseInt(dbal,10)){
		$.confirm({
			'title'		: 'Proceed Confirmation',
			'message'	: 'The drug quantity you have entered is more than the existing stock whose balance is ' + dbal +' units.Do you want to proceed to add this prescription?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
			removeArea('prescription',area10);
			if(document.getElementById("prescription").value.match(/\n/g)){
				var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
				med=med  + '\n' +  s + '. ' + param + ';<br/> ';
				$('#prescription').val(med);
			}
			else {
						if(med!=''){
						s=1;
						med=med + s + '. ' + param + ';\n<br/> ';
						$('#prescription').val(med);
						}else	{s=1;
						med=med + s + '. ' + param + ';';
						$('#prescription').val(med);
						
						}
					}
				area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
		
	}
else{
	
			 if(document.getElementById("prescription").value.match(/\n/g)){
				var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
				med=med  + '\n' +  s + '. ' + param + ';<br/> ';
				$('#prescription').val(med);
			}
			else {
							if(med!=''){
							s=1;
							med=med + s + '. ' + param + ';\n<br/> ';
							$('#prescription').val(med);
							}else	{s=1;
							med=med + s + '. ' + param + ';';
							$('#prescription').val(med);
							}
					}
					
			
	}
	area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
}

function addthispresc019(){
	var dr1 = $('#dname').val();
	var dr3 = $('#txtqty019').val();
	var dbal = $('#dbal').val();
	var dr4 = $('#dr4').parent().find("input:first").val();
	var dr5 = $('#dr5').parent().find("input:first").val();
	var dr6 = $('#dr6').parent().find("input:first").val();
	var dr8 = $('#dr8').parent().find("input:first").val();
	
	var dr7 = $('#dr7').val();
	if(dr7==''){dr7=1}
	var dr9 = $('#dr9').val();
	if(dr9==''){dr9=1}
	var d5 = $('#dr5').val();
	if(d5==''){d5=1}
	var d8= $('#dr8').val();
	if(d8==''){d8=1}
	
	if($('#txtqty019').val()==''){
	var dr3=Math.round(dr9*d5*dr7*d8);
	}
	
	
	var param=dr1 + '-' + dr9 + ' ' + dr4  + '-' + dr6 + '-' + dr5 + '-' + dr7 + ' ' + dr8 + '-' + dr3;
	removeArea('prescription',area10);
	var med = $('#prescription').val();	

	PharmBill834('pharmcart',0,param);

	$('#dname').val('');
	$('#txtqty019').val(1);
	$('#dbal').val('');
	$('#dr4').parent().find("input:first").val('');
	$('#dr5').parent().find("input:first").val('');
	$('#dr6').parent().find("input:first").val('');
	$('#dr8').parent().find("input:first").val('');
	
	if($('#appcoDocOrder019').val()==''){
	$().customAlert();
		alert('Error!', '<p>Select a drug!</p>');
		$('#appcoDocOrder019').parent().find("input:first").focus();	
	}
	else if(parseInt(dr3,10)>parseInt(dbal,10)){
		$.confirm({
			'title'		: 'Proceed Confirmation',
			'message'	: 'The drug quantity you have entered is more than the existing stock whose balance is ' + dbal +' units.Do you want to proceed to add this prescription?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
			removeArea('prescription',area10);
			if(document.getElementById("prescription").value.match(/\n/g)){
				var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
				med=med  + '\n' +  s + '. ' + param + ';<br/> ';
				$('#prescription').val(med);
			}
			else {
						if(med!=''){
						s=1;
						med=med + s + '. ' + param + ';\n<br/> ';
						$('#prescription').val(med);
						}else	{s=1;
						med=med + s + '. ' + param + ';';
						$('#prescription').val(med);
						
						}
					}
				area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
		
	}
else{
	
			 if(document.getElementById("prescription").value.match(/\n/g)){
				var s=document.getElementById("prescription").value.match(/\n/g).length +  1;
				med=med  + '\n' +  s + '. ' + param + ';<br/> ';
				$('#prescription').val(med);
			}
			else {
							if(med!=''){
							s=1;
							med=med + s + '. ' + param + ';\n<br/> ';
							$('#prescription').val(med);
							}else	{s=1;
							med=med + s + '. ' + param + ';';
							$('#prescription').val(med);
							}
					}
					
			
	}
	area10 = new nicEditor({fullPanel : true}).panelInstance("prescription");	
}
$( "#bedward" ).combobox({
	select: function(event,ui){
	var pid = $('#pid1').val();
	var patid = $('#patid1').val();
	var patname = $('#oname').val();
	 var str = $('#bedward').val();
	 var parts=str.split('θ',3);
	var wtype=parts[0];
	var rno=parts[1];
	var bno=parts[2];
	var rec = $('input[name=patadmit]:checked').val();
	if(rec==1){
	$("#bedan").html(loader);
			$.ajax({
				url:'data.php',
				data:{id:72,pid:pid,patid:patid,wtype:wtype,rno:rno,bno:bno,patname:patname},
				success:function(data){
				$('#bedan').html(data);
				$("#progress").prop("disabled",false);
				$("#progress").css({'border' : 'solid #10504F 1px'});
				$("#docnotes").prop("disabled",false);
				$("#docnotes").css({'border' : 'solid #10504F 1px'});
				}
			});
	}
	}
});

function addmedical(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:127},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function adata(){
var cat = $('#itemcat').val();
removeArea('medata',a0);
var itemd=$('#medata').val();
addArea('medata',a0);
 	if(itemd==''){
		$().customAlert();
		alert('Error!', '<p>Enter some data in the Data field!</p>');
		$("#itemdefault").focus();
		}
	
	else{
		$('#newstudent').html(loader);
		$.ajax({
		url:'data.php',
		type:'POST',
		data:{id:75,cat:cat,itemd:itemd},
		success:function(data){
		$('#newstudent').html(data);
		}
		});	
		}	
}
function edata(){
var cat = $('#itemcat2').val();
var itid = $('#itid').val();
removeArea('medata2',a2);
var itemd=$('#medata2').val();
addArea('medata2',a2);
if(itid==''){
		$().customAlert();
		alert('Error!', '<p>Select a parameter!</p>');
		$("#itemdefault").focus();
		}

 	else if(itemd==''){
		$().customAlert();
		alert('Error!', '<p>Enter some data in the Data field!</p>');
		$("#itemdefault").focus();
		}
	
	else{
		$('#newstudent2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'75.1',cat:cat,itemd:itemd,itid:itid},
		success:function(data){
		$('#newstudent2').html(data);
		}
		});	
		}	
}
function ddata(){
var cat = $('#itemcat').val();
var itid = $('#itid').val();
if(itid==''){
		$().customAlert();
		alert('Error!', '<p>Select a parameter!</p>');
		$("#itemdefault").focus();
		}
 
	else{
		$('#newstudent2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'75.2',cat:cat,itid:itid},
		success:function(data){
		$('#newstudent2').html(data);
		}
		});	
		}	
}

function treatchart(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:128,to:43},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function treatchart2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:128,to:77},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#cons12" ).combobox({
	select: function(event,ui){
	 var param = $('#cons12').val();
	  var id = $('#to').val();
	  $("#mainp").html(loader);
	 	$.ajax({
				url:'link.php',
				data:{id:id,pid:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	 
	}
});
// JavaScript Document
function opener(a){
		$('#op'+ a).html('<img src="images/close.png" style="float:left; width:30px; height:30px; cursor:pointer" onclick="closer(' + a + ')"/>');
		$('#div'+ a).show();
}
function closer(a){
		$('#op'+ a).html('<img src="images/open.png" style="float:left; width:30px; height:30px; cursor:pointer" onclick="opener(' + a + ')"/>');
		$('#div'+ a).hide();
}
$('#height').keyup(function() {
	var w = $('#weight').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var h = $(this).val();
	if(h!=0&&h!=''&&c!=0&&c!=''){
		h=h/100;
		var c= h * h;
		var b=parseInt(w,10) /c;
		b=Math.round(b*100)/100;
		$('#bmi').val(b);
	}
});
$('#weight').keyup(function() {
	var h = $('#height').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var w = $(this).val();
	if(h!=0&&h!=''&&c!=0&&c!=''){
		h=h/100;
		var c= h * h;
		var b=parseInt(w,10) /c;
		b=Math.round(b*100)/100;
		$('#bmi').val(b);
	}
});
function savein1(pid){
var patid = $('#patid').val();
var patname = $('#patname').val();
var bedno = $('#bednu').val();

var tw1 = $('#tw1').val();
var tb1 = $('#tb1').val();
var td1 =  $('#td1').val();
var tw2 = $('#tw2').val();
var tb2 = $('#tb2').val();
var td2 =  $('#td2').val();

var phy =  $('#phy').val();
var sur = $('#sur').val();
var anae = $('#anae').val();
var paed =  $('#paed').val();

var previous =  $('#previous').val();
var current = $('#current').val();
var height = $('#height').val();
var weight =  $('#weight').val();
var bmi =  $('#bmi').val();

var steroid = $('input[name=steroid]:checked').val();
var steroidate = $('#steroidate').val();

			
	$('#save1').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:76,pid:pid,patid:patid,patname:patname,bedno:bedno,tw1:tw1,tb1:tb1,td1:td1,tw2:tw2,tb2:tb2,td2:td2,phy:phy,sur:sur,anae:anae,paed:paed,previous:previous,current:current,height:height,weight:weight,bmi:bmi,steroid:steroid,steroidate:steroidate},
		success:function(data){
		$('#save1').html(data);
		}
		});	
		
}
function addnewrowa(a){
	var code=Math.floor((Math.random()*100)+100);
	$("#normal" + a + code).show()
}

function previewreceipt(a){
	window.open('report.php?id=1.1&ser='+a);
}


function saveonce(code,pid,z,y,x){	
	var a=$('#da' + x + code).val();
	var b=$('#ti' + x + code).val();
	var c=$('#drug' + x + code).val();
	var d=$('#dose' + x + code).val();
	var e=$('#route' + x + code).val();
	var f=$('#dsign' + x + code).val();
	var g=$('#given' + x + code).val();
	var h=$('#tgiven' + x + code).val();
	var i=$('#pdate' + x + code).val();
	var j=$('#pqty' + x + code).val();
	var k=$('#phm' + x + code).val();
	var l=$('#ward' + x + code).val();
	
	$('#saveonce' + x  + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'77',code:code,a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h,i:i,j:j,k:k,l:l,pid:pid,z:z,x:x,y:y},
	success:function(data){
	$('#saveonce' + x  + code).html(data);
	}
	});
}

function savethat(code){	
	var b=$('#drugs' + code).val();
	var c=$('#dose' + code).val();
	var d=$('#route' + code).val();
	var e=$('#notes' + code).val();
	var f=$('#cost' + code).val();
		if(b==''||c==''||d==''||e==''){
		$().customAlert();
		alert('Error!', '<p>Make Sure the drug name,dose,route and notes fields are filled!</p>');
		e.preventDefault();	
}else{
	$('#savethat' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'102',code:code,b:b,c:c,d:d,e:e,f:f},
	success:function(data){
	$('#savethat' + code).html(data);
	}
	});
}
}
function tickdrug(box,code){	
	var a = $('input[name='+ box + code + ']:checked').val();
	if(a!=1){a=0}
	$.ajax({
	url:'data.php',
	data:{id:'103',code:code,a:a,box:box},
	});
}
function addnewrowz(pid,patname,patid){	
	$.ajax({
	url:'data.php',
	data:{id:'104',pid:pid,patid:patid,patname:patname},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function savenursenotes(pid){
	removeArea('nursenotes',area20);
	var notes=$('#nursenotes').val();
	addArea('nursenotes',area20);	
	
	$('#savez').html(loader);
	$.ajax({
	url:'data.php',
	data:{id:78,pid:pid,notes:notes},
	success:function(data){
	$('#savez').html(data);
	}
	});
}
function saveprognotes(pid){
	removeArea('prognotes',area20);
	var notes=$('#prognotes').val();
	addArea('prognotes',area20);	
	
	$('#savez').html(loader);
	$.ajax({
	url:'data.php',
	type:'POST',
	data:{id:'78.2',pid:pid,notes:notes},
	success:function(data){
	$('#savez').html(data);
	}
	});
}
function saveadmnotes(pid){
	removeArea('docnotes',area12);
	var notes=$('#docnotes').val();
	addArea('docnotes',area12);	
	
	$('#savey').html(loader);
	$.ajax({
	url:'data.php',
	type:'POST',
	data:{id:'78.1',pid:pid,notes:notes},
	success:function(data){
	$('#savey').html(data);
	}
	});
}
function savevitals(code,y,q){	
	var x='';
	var a=$('#patid').val();
	var b=$('#patname').val();
	var c=$('#temp' + x + code).val();
	var d=$('#bp1' + x + code).val();
	var e=$('#bp2' + x + code).val();
	var f=$('#weight' + x + code).val();
	var g=$('#pulse' + x + code).val();
	var h=$('#breath' + x + code).val();
	var i=$('#random' + x + code).val();
	var j=$('#date' + x + code).val();

	
	$('#savevitals' + x  + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'77.1',code:code,a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h,i:i,y:y,j:j,q:q},
	success:function(data){
	$('#savevitals' + x  + code).html(data);
	}
	});
}
function deleteTempBillItem(code,b){	
	var patientid=$('#oldpatid' + code).val();
	var prescid=$('#oldprescid' + code).val();
	var prescno=$('#oldprescno' + code).val();
	var itemname=$('#productname' + code).val();
	var oldpatid=$('#oldpatid' + code).val();
	if(patientid==''||prescid==''||prescno==''||itemname==''){
			$().customAlert();
			alert('Error!', '<p>All fields are required!</p>');
			e.preventDefault();	
	}else{
		$('#deltempitem' + code).html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'154',code:code,b:b,patientid:patientid,prescid:prescid,prescno:prescno,oldpatid:oldpatid},
		success:function(data){
		$('#deltempitem' + code).html(data);
		}
		});
	}
}
function deletephcDiagItem(code,b){	
	var patientid=$('#oldpatid' + code).val();
	var prescid=$('#oldprescid' + code).val();
	var prescno=$('#oldprescno' + code).val();
	var itemname=$('#productname' + code).val();
	var oldpatid=$('#oldpatid' + code).val();
	var dept4rm=$('#dept4rm' + code).val();
	if(patientid==''||prescid==''||prescno==''||itemname==''){
			$().customAlert();
			alert('Error!', '<p>All fields are required!</p>');
			e.preventDefault();	
	}else{
		$('#deltempitem' + code).html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'157',code:code,b:b,patientid:patientid,prescid:prescid,prescno:prescno,itemname:itemname,oldpatid:oldpatid,dept4rm:dept4rm},
		success:function(data){
		$('#deltempitem' + code).html(data);
		}
		});
	}
}
function reception(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:135},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function newreception(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:173},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function triage(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:138},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$("#orderitem834" ).combobox({
	select: function(event,ui){
	 var str = $('#orderitem834').val();
	 var parts=str.split('θ',11);
	 //$('#price834').val(parts[0]);
	 $('#red834').val(parts[1]);
	 $('#code834').val(parts[2]);
	 $('#categ834').val(parts[3]);
	 $('#bal834').val(parts[4]);
	 $('#type834').val(parts[5]);
    $('#txtcatid834').val(parts[6]);
    $('#txtsec834').val(parts[7]);
    $('#txtprcorporate834').val(parts[8]);
    $('#txtprinsurance834').val(parts[9]);
     if($('#quat834').val()!=''){
        var txtqty = $('#quat834').val();
        if($('#txtacctype').val()=='Insurance'){
             $('#price834').val(parts[9]);
             var tot=parts[9] * txtqty;
         }else if($('#txtacctype').val()=='Corporate'){
             $('#price834').val(parts[8]);
             var tot=parts[8] * txtqty;
         }else{
             $('#price834').val(parts[0]);
             var tot=parts[0] * txtqty;         
         }
         sot=(tot).formatMoney(2, '.', ',');
         $('#tprice834').val(sot);
         $('#sub834').val(sot);
      }
	
		//$('#quat834').focus();
	
	 }
});

//ordernursing606
$("#order606" ).combobox({
   select: function(event,ui){
    var str = $('#order606').val();
    var parts=str.split('θ',19);
    //$('#price44').val(parts[0]);
    $('#red606').val(parts[1]);
    $('#code606').val(parts[2]);
    $('#categ606').val(parts[3]);
    $('#bal606').val(parts[4]);
    $('#type606').val(parts[5]);
    $('#txtcatid606').val(parts[6]);
    $('#txtsec606').val(parts[7]);
    $('#txtprcorporate606').val(parts[8]);
    $('#txtprinsurance606').val(parts[9]);
    $('#txtcoverage').val(parts[10]);

		 	if(parts[10]=='NO'){
		 		if($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26){
					$().customAlert();
					alert('Error!', '<p>This item is not covered!</p>');
					$('#txtcoverage').val('');
					return;	
				}
		 	}

	     if($('#quat606').val()!=''){
	        var txtqty = $('#quat606').val();
           if($('#txtacctype').val()=='Insurance'){
                $('#price606').val(parts[9]);
                var tot=parts[9] * txtqty;
            }else if($('#txtacctype').val()=='Corporate'){
                $('#price606').val(parts[8]);
                var tot=parts[8] * txtqty;
            }else if($('#txtacctype').val()=='OTC'){
	             $('#price606').val(parts[11]);
	             var tot=parts[11] * txtqty;
	         }else if($('#txtacctype').val()=='APA'){
	             $('#price606').val(parts[12]);
	             var tot=parts[12] * txtqty;
	         }else if($('#txtacctype').val()=='Pacis'){
	             $('#price606').val(parts[13]);
	             var tot=parts[13] * txtqty;
	         }else if($('#txtacctype').val()=='Liason'){
	             $('#price606').val(parts[14]);
	             var tot=parts[14] * txtqty;
	         }else if($('#txtacctype').val()=='OldMutual'){
	             $('#price606').val(parts[15]);
	             var tot=parts[15] * txtqty;
	         }else if($('#txtacctype').val()=='KplcMinet'){
	             $('#price606').val(parts[16]);
	             var tot=parts[16] * txtqty;
	         }else if($('#txtacctype').val()=='MaklMaternity'){
	             $('#price606').val(parts[17]);
	             var tot=parts[17] * txtqty;
	         }else if($('#txtacctype').val()=='MinetCivilServants'){
	             $('#price606').val(parts[18]);
	             var tot=parts[18] * txtqty;
	         }else{
                $('#price606').val(parts[0]);
                var tot=parts[0] * txtqty;         
            }

			    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
				 	 var totsumcoverd = $('#totalcoverage786').val();
				 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);
			    }

			    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()!=''){
				 	 var totsumcoverd1 = $('#totalcoverage786').val();
				 	 var totsumcoverd2 = $('#txttotalcoverage786').val(); 	
				 	 var totsumcoverd254 = parseInt(totsumcoverd2,10) + (tot);	
				 	 var prevtotrecoverd019 = $('#txttotalcoverage786').val(); 	
			    }

		 	   $('#txttotalcoverage786').val(totsumcoverd254);
	        if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='APA')&&(parts[12]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
	         else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='APA')&&(parts[12]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=1501||totsumcoverd254>=1501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
	         else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='APA')&&(parts[12]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=501||totsumcoverd254>=501)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }

	         else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='APA')&&(parts[12]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=1001||totsumcoverd254>=1001)){
			      $().customAlert();
				   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
				   $('#txttotalcoverage786').val(totsumcoverd2);
					clrdresserdisp_txtboxes_after_invalid_bill_notification();
					return;	
		      }
		      else{

						
						   if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&(totsumcoverd254>=501)){
						      $().customAlert();
				   			alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
								clrdresserdisp_txtboxes_after_invalid_bill_notification();
								return;	
						   }
						   if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&(totsumcoverd254>=1501)){
						      $().customAlert();
				   			alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
								clrdresserdisp_txtboxes_after_invalid_bill_notification();
								return;	
						   }
						   if(($('#txtinsurer_id').val()==33)&&(totsumcoverd254>=1001)){
						      $().customAlert();
				   			alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
								clrdresserdisp_txtboxes_after_invalid_bill_notification();
								return;	
						   }

						   //addbill4('dresser',0);

		      }
	         sot=(tot).formatMoney(2, '.', ',');
	         $('#tprice606').val(sot);
	         $('#sub606').val(sot);
				addbill4('dresser',0);
	      }

         
    }
});

//ordernursing606      
$("#appcorder653" ).combobox({
   select: function(event,ui){
    var str = $('#appcorder653').val();
    var parts=str.split('θ',19);
    $('#red606').val(parts[1]);
    $('#code606').val(parts[2]);
    $('#categ606').val(parts[3]);
    $('#bal606').val(parts[4]);
    $('#type606').val(parts[5]);
    $('#txtcatid606').val(parts[6]);
    $('#txtsec606').val(parts[7]);
    $('#txtprcorporate606').val(parts[8]);
    $('#txtprinsurance606').val(parts[9]);
    $('#txtcoverage').val(parts[10]);

	     if($('#quat606').val()!=''){
	        var txtqty = $('#quat606').val();
           if($('#txtacctype').val()=='Insurance'){
                $('#price606').val(parts[9]);
                var tot=parts[9] * txtqty;
            }else if($('#txtacctype').val()=='Corporate'){
                $('#price606').val(parts[8]);
                var tot=parts[8] * txtqty;
            }else{
                $('#price606').val(parts[0]);
                var tot=parts[0] * txtqty;         
            }

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
				 var totsumcoverd = $('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);
			 	 $('#txttotalcoverage786').val(totsumcoverd254);
		    }else{
				 var totsumcoverd = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);	
		    }

	         sot=(tot).formatMoney(2, '.', ',');
	         $('#tprice606').val(sot);
	         $('#sub606').val(sot);
	      }

         
    }
});
$("#orderitem44" ).combobox({
	select: function(event,ui){
	 var str = $('#orderitem44').val();
	 var parts=str.split('θ',19);
	 //$('#price44').val(parts[0]);
	 $('#red').val(parts[1]);
	 $('#code').val(parts[2]);
	 $('#categ').val(parts[3]);
	 $('#bal44').val(parts[4]);
	 $('#type44').val(parts[5]);
    $('#txtcatid44').val(parts[6]);
    $('#txtsec44').val(parts[7]);
    $('#txtprcorporate44').val(parts[8]);
    $('#txtprinsurance44').val(parts[9]);
    $('#txtcoverage').val(parts[10]);

	 	if(parts[10]=='NO'){
	 		if($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26){
				$().customAlert();
				alert('Error!', '<p>This item is not covered!</p>');
				$('#txtcoverage').val('');
				return;	
			}
	 	}
	
     if($('#quat44').val()!=''){
        var txtqty = $('#quat44').val();
        if($('#txtacctype').val()=='Insurance'){
             $('#price44').val(parts[9]);
             var tot=parts[9] * txtqty;
         }else if($('#txtacctype').val()=='Corporate'){
             $('#price44').val(parts[8]);
             var tot=parts[8] * txtqty;
         }else if($('#txtacctype').val()=='OTC'){
             $('#price44').val(parts[11]);
             var tot=parts[11] * txtqty;
         }else if($('#txtacctype').val()=='APA'){
             $('#price44').val(parts[12]);
             var tot=parts[12] * txtqty;
         }else if($('#txtacctype').val()=='Pacis'){
             $('#price44').val(parts[13]);
             var tot=parts[13] * txtqty;
         }else if($('#txtacctype').val()=='Liason'){
             $('#price44').val(parts[14]);
             var tot=parts[14] * txtqty;
         }else if($('#txtacctype').val()=='OldMutual'){
             $('#price44').val(parts[15]);
             var tot=parts[15] * txtqty;
         }else if($('#txtacctype').val()=='KplcMinet'){
             $('#price44').val(parts[16]);
             var tot=parts[16] * txtqty;
         }else if($('#txtacctype').val()=='MaklMaternity'){
             $('#price44').val(parts[17]);
             var tot=parts[17] * txtqty;
         }else if($('#txtacctype').val()=='MinetCivilServants'){
             $('#price44').val(parts[18]);
             var tot=parts[18] * txtqty;
         }else{
             $('#price44').val(parts[0]);
             var tot=parts[0] * txtqty;         
         }

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
			 	 var totsumcoverd = $('#totalcoverage786').val();
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);
	 	   	 //$('#txttotalcoverage786').val(totsumcoverd);
		    }

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()!=''){
			 	 var totsumcoverd = $('#totalcoverage786').val();
			 	 var totsumcoverd2 = $('#txttotalcoverage786').val(); 	
			 	 var totsumcoverd254 = parseInt(totsumcoverd2,10) + (tot);	
			 	 var prevtotrecoverd019 = $('#txttotalcoverage786').val(); 	
			 	 //$('#txttotalcoverage786').val(totsumcoverd254);
		    }

	 	   //$('#txttotalcoverage786').val(totsumcoverd);
	 	   $('#txttotalcoverage786').val(totsumcoverd254);
        if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='APA')&&(parts[12]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='APA')&&(parts[12]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='APA')&&(parts[12]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }

         else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Insurance')&&(parts[9]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[9] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Corporate')&&(parts[8]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='OTC')&&(parts[11]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='APA')&&(parts[12]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Pacis')&&(parts[13]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Liason')&&(parts[14]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='OldMutual')&&(parts[15]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='KplcMinet')&&(parts[16]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[17]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[18]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[18] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
	      }

	      else{

					
					   if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&(totsumcoverd254>=501)){
					      $().customAlert();
			   			alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
							clrlaboratory_txtboxes_after_invalid_bill_notification();
							return;	
					   }
					   if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&(totsumcoverd254>=1501)){
					      $().customAlert();
			   			alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
							clrlaboratory_txtboxes_after_invalid_bill_notification();
							return;	
					   }
					   if(($('#txtinsurer_id').val()==33)&&(totsumcoverd254>=1001)){
					      $().customAlert();
			   			alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
							clrlaboratory_txtboxes_after_invalid_bill_notification();
							return;	
					   }

					   //addbill2('lab',0);

	      }
         sot=(tot).formatMoney(2, '.', ',');
         $('#tprice').val(sot);
         $('#sub44').val(sot);
			addbill2('lab',0);
      }

		//$('#quat44').focus();
	
	 }
});

$("#appcorder420" ).combobox({
	select: function(event,ui){
	 var str = $('#appcorder420').val();
	 var parts=str.split('θ',19);
	 //$('#price44').val(parts[0]);
	 $('#red').val(parts[1]);
	 $('#code').val(parts[2]);
	 $('#categ').val(parts[3]);
	 $('#bal44').val(parts[4]);
	 $('#type44').val(parts[5]);
    $('#txtcatid44').val(parts[6]);
    $('#txtsec44').val(parts[7]);
    $('#txtprcorporate44').val(parts[8]);
    $('#txtprinsurance44').val(parts[9]);
    $('#txtcoverage').val(parts[10]);
	
     if($('#quat44').val()!=''){
        var txtqty = $('#quat44').val();
        $('#price44').val(parts[0]);
        var tot=parts[0] * txtqty; 

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
			 	 var totsumcoverd = $('#totalcoverage786').val();
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);
			 	 $('#txttotalcoverage786').val(totsumcoverd254); 	
		    }else{
				 var totsumcoverd    = $('#txttotalcoverage786').val();    
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);	
		    }

         sot=(tot).formatMoney(2, '.', ',');
         $('#tprice').val(sot);
         $('#sub44').val(sot);
      }

		//$('#quat44').focus();
	
	 }
});

$("#item44" ).combobox({
	select: function(event,ui){
	 var str = $('#item44').val();
	 var parts=str.split('θ',6);
	 $('#price44').val(parts[0]);
	 $('#red').val(parts[1]);
	 $('#code').val(parts[2]);
	 $('#categ').val(parts[3]);
	 $('#bal44').val(parts[4]);
	 $('#type44').val(parts[5]);
 	if($('#quat44').val()!=''){
	var quat = $('#quat44').val();
	var tot=parts[0] * quat;
	sot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(sot);
	$('#sub44').val(sot);
	}
	
	$('#quat44').focus();
	
	 }
});

$("#generalorder834" ).combobox({
	select: function(event,ui){
	 var str = $('#generalorder834').val();
	 var parts=str.split('θ',20);
	 //$('#price44').val(parts[0]);
	 $('#red').val(parts[1]);
	 $('#code').val(parts[2]);
	 $('#categ').val(parts[3]);
	 $('#bal44').val(parts[4]);
	 $('#type44').val(parts[5]);
    $('#txtcatid').val(parts[8]);
    $('#txtcoverage').val(parts[9]);
	 //var ttcover786 = $('#totalcoverage786').val();
    //var ttcover786 		=  $('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
    //var totsumcoverd254 =  $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
    //if(totsumcoverd254==''){ totsumcoverd254 = ttcover786; } 

    	if ($('#dept4rm').val()=='OPD') {
			if($('#insurerscheme606').val() ==''||$('#madeni606').val() ==''||$('#accountype').val() ==''){
				$().customAlert();
					alert('Error!', '<p>All fields are required.</p>');
					$('#insurerscheme606').focus();	
					return;	
			}
		}
		if($('#accountype').val()==''){
			$().customAlert();
			alert('Error!', '<p>Type of billing is required.</p>');
			$('#accountype').focus();	
			return;	
		}


     if($('#quat44').val()!=''){
        var txtqty = $('#quat44').val();
        if($('#accountype').val()=='Insurance'){
             $('#price44').val(parts[7]);
             var tot=parts[7] * txtqty;
         }else if($('#accountype').val()=='Corporate'){
             $('#price44').val(parts[6]);
             var tot=parts[6] * txtqty;
         }else if($('#accountype').val()=='OTC'){
             $('#price44').val(parts[10]);
             var tot=parts[10] * txtqty;
         }else if($('#accountype').val()=='APA'){
             $('#price44').val(parts[11]);
             var tot=parts[11] * txtqty;
         }else if($('#accountype').val()=='Pacis'){
             $('#price44').val(parts[12]);
             var tot=parts[12] * txtqty;
         }else if($('#accountype').val()=='Liason'){
             $('#price44').val(parts[13]);
             var tot=parts[13] * txtqty;
         }else if($('#accountype').val()=='OldMutual'){
             $('#price44').val(parts[14]);
             var tot=parts[14] * txtqty;
         }else if($('#accountype').val()=='KplcMinet'){
             $('#price44').val(parts[15]);
             var tot=parts[15] * txtqty;
         }else if($('#accountype').val()=='MaklMaternity'){
             $('#price44').val(parts[16]);
             var tot=parts[16] * txtqty;
         }else if($('#accountype').val()=='MinetCivilServants'){
             $('#price44').val(parts[17]);
             var tot=parts[17] * txtqty;
         }else{
             $('#price44').val(parts[0]);
             var tot=parts[0] * txtqty;         
         }

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
			 	 var totsumcoverd = $('#totalcoverage786').val();
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);
			 	 $('#txttotalcoverage786').val(totsumcoverd254);
			      //$().customAlert();
				   //alert('Drug!', '<p>Empty: '+ totsumcoverd254 + '/=</p>');
					//return;	    	
		    }else{
				 var totsumcoverd    = $('#txttotalcoverage786').val();    
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);	
		    }
						
        if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Insurance')&&(parts[7]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Corporate')&&(parts[6]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Normal')&&(parts[0]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='OTC')&&(parts[10]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='APA')&&(parts[11]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Pacis')&&(parts[12]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Liason')&&(parts[13]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='OldMutual')&&(parts[14]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='KplcMinet')&&(parts[15]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='MaklMaternity')&&(parts[16]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='MinetCivilServants')&&(parts[17]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Insurance')&&(parts[7]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Corporate')&&(parts[6]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Normal')&&(parts[0]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='OTC')&&(parts[10]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='APA')&&(parts[11]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Pacis')&&(parts[12]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Liason')&&(parts[13]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='OldMutual')&&(parts[14]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='KplcMinet')&&(parts[15]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='MaklMaternity')&&(parts[16]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='MinetCivilServants')&&(parts[17]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[7]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Insurance')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[6]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Corporate')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[0]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Normal')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[10]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='OTC')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[11]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='APA')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[12]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Pacis')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[13]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Liason')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[14]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='OldMutual')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[15]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='KplcMinet')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[16]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='MaklMaternity')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[17]>=501||totsumcoverd254>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='MinetCivilServants')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[7]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Insurance')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[6]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Corporate')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[0]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Normal')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[10]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='OTC')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[11]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='APA')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[12]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Pacis')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[13]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Liason')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[14]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='OldMutual')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[15]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='KplcMinet')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[16]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='MaklMaternity')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((parts[17]>=1001||totsumcoverd254>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='MinetCivilServants')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
        
        

	      else{

				//var capbill = parseInt(totsumcoverd254,10) + (tot);
				//var capbill = (ttcover786) + (tot);
			   if(($('#dept4rm').val()=='OPD'&&$('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&(totsumcoverd254>=501)){
			      $().customAlert();
			   	alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#dept4rm').val()=='OPD'&&$('#txtinsurer_id').val()==26)&&(totsumcoverd254>=501)){
			      $().customAlert();
			   	alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&(totsumcoverd254>=1501)){
			      $().customAlert();
			   	alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#dept4rm').val()=='OPD'&&$('#txtinsurer_id').val()==33)&&(totsumcoverd254>=1001)){
			      $().customAlert();
			   	alert('Cap Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }


	      }
         sot=(tot).formatMoney(2, '.', ',');
         $('#tprice').val(sot);
         $('#sub44').val(sot);
      }

	 $('#quat44').focus();

   }
});

$(document).ready(function(){
	$('#quat44').keyup(function() {
	var price = $('#price44').val();
	var quat = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var disc = $('#disc44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(disc==''){
	disc=0;	
	}

    if($('#txttotalcoverage786').val()!=''){
	 	 var totsumcoverd = $('#txttotalcoverage786').val(); 	
		 //var totsumcoverd = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
    }
	 var totperitem=price * quat;
	 //var sot=price * quat;
    var ttoverallcover420 = parseInt(totperitem,10) + parseInt(totsumcoverd,10);
	 $('#txttotalcoverage786').val(ttoverallcover420);
	  if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Insurance')&&(price>=501||ttoverallcover420>=501)){
	      $().customAlert();
		   alert('Error!', '<p>Limit Reached. Bill: '+ ttoverallcover420 +'/=.</p>');
	      clrgeneralorder_txtboxes_after_invalid_bill_notification();
			return;	
	   }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Corporate')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Normal')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='OTC')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='APA')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Pacis')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='Liason')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='OldMutual')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='KplcMinet')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Price: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='MaklMaternity')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#dept4rm').val()=='OPD'&&$('#accountype').val()=='MinetCivilServants')&&(price>=501||ttoverallcover420>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }

	      
         else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Insurance')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Corporate')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Normal')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='OTC')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }


	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='APA')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Pacis')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='Liason')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='OldMutual')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='KplcMinet')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='MaklMaternity')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&($('#accountype').val()=='MinetCivilServants')&&(price>=1501||ttoverallcover420>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Bill: '+ ttoverallcover420 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }


         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Insurance')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Corporate')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Normal')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='OTC')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }


         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='APA')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Pacis')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='Liason')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='OldMutual')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }


         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='KplcMinet')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='MaklMaternity')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=501||ttoverallcover420>=501)&&($('#txtinsurer_id').val()==26)&&($('#accountype').val()=='MinetCivilServants')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }


         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Insurance')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Corporate')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Normal')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='OTC')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='APA')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Pacis')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='Liason')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='OldMutual')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='KplcMinet')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='MaklMaternity')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if((price>=1001||ttoverallcover420>=1001)&&($('#txtinsurer_id').val()==33)&&($('#accountype').val()=='MinetCivilServants')&&($('#dept4rm').val()=='OPD')){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	   else{

						
				//var capbill = parseInt(totsumcoverd254,10) + (tot);
				//var capbill = (ttcover786) + (tot);
			   if(($('#dept4rm').val()=='OPD'&&$('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&(ttoverallcover420>=501)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ ttoverallcover420 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#dept4rm').val()=='OPD'&&$('#txtinsurer_id').val()==26)&&(ttoverallcover420>=501)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ ttoverallcover420 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&$('#dept4rm').val()=='OPD'&&(ttoverallcover420>=1501)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ ttoverallcover420 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#dept4rm').val()=='OPD'&&$('#txtinsurer_id').val()==33)&&(ttoverallcover420>=1001)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ ttoverallcover420 +'/=.</p>');
		      	clrgeneralorder_txtboxes_after_invalid_bill_notification();
					return;	
			   }

	   }


		var sot=price * quat;
		var tot=parseInt(sot,10) - parseInt(disc,10);
		var sot=(sot).formatMoney(2, '.', ',');
		$('#tprice').val(sot);
		tot=(tot).formatMoney(2, '.', ',');
		$('#sub44').val(tot);


	});
});
$(document).ready(function(){
	$('#price44').keyup(function() {
	var quat = $('#quat44').val();
	var price = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var disc = $('#disc44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(disc==''){
	disc=0;	
	}
	var sot=price * quat;
	var tot=parseInt(sot,10) - parseInt(disc,10);
	var sot=(sot).formatMoney(2, '.', ',');
	$('#tprice').val(sot);
	tot=(tot).formatMoney(2, '.', ',');
	$('#sub44').val(tot);
	});
});
$(document).ready(function(){
	$('#disc44').keyup(function() {
	var tprice = $('#tprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var disc = $(this).val();
	if(disc==''){
	disc=0;	
	}
	var tot=parseInt(tprice,10) - parseInt(disc,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#sub44').val(tot);
	});
});

function addbill(a,b){

var txtacctype = $('#txtacctype').val();
var price = $('#price44').val();
var tprice = $('#tprice').val();
var quat = $('#quat44').val();
var disc = $('#disc44').val();
var subn = $('#sub44').val();
var iid = $('#income44').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#bal44').val();
if(bal==''){bal=0}
var type = $('#type44').val();

var code = $('#code').val();
var name =  $('#red').val();
var categ =  $('#categ').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var dept4rm =  $('#dept4rm').val();
var txtcatid =  $('#txtcatid').val();
var prescid =  $('#old_consult_id').val();
var clientid =  $('#old_patient_id').val();
var txtcoverage = $('#txtcoverage').val();
var txtinsurer_id = $('#txtinsurer_id').val();
var ttcover786 = $('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total =  $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var capbill         = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

if(code==''){
$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
	$('#generalorder834').parent().find("input:first").focus();	
	return;	
}
else if(price==''){
$().customAlert();
		alert('Error!', '<p>Enter the price!</p>');
	$('#generalorder834').parent().find("input:first").focus();	
	return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat44').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat44').focus();	
		return;	
}
else if($('#oname').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;	
}
else{
		if(dept4rm=='OPD'){
			if((txtinsurer_id==20||txtinsurer_id==26)&&(price>=501||totsumcoverd254>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
				clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(capbill>=501||totsumcoverd254>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
				//e.preventDefault();//exit;
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(price>=1501||totsumcoverd254>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
				clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(capbill>=1501||totsumcoverd254>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
		      clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(capbill>=1501||totsumcoverd254>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
				clrgeneralorder_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else{
				$('#display').html(loader);
				$.ajax({
				url:'bridge.php',
				data:{id:131,iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,prescid:prescid,clientid:clientid,totalcoverage786:capbill},
				success:function(data){
					//do something
					$('#display').html(data);
				}
				});
			}

	   }
	   else{
			$('#display').html(loader);
			$.ajax({
			url:'bridge.php',
			data:{id:131,iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,prescid:prescid,clientid:clientid,totalcoverage786:capbill},
			success:function(data){
				//do something
				$('#display').html(data);
			}
			});
	   }
	
		clrgeneralorder_txtboxes_after_invalid_bill_notification();

  }
}

function addbill2(a,b){
var price = $('#price44').val();
//var price 			  = $('#price44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tprice = $('#tprice').val();
//var tprice 			  = $('#tprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var quat = $('#quat44').val();
var disc = $('#disc44').val();
var subn = $('#sub44').val();
//var subn 			  = $('#sub44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var iid = $('#income44').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#bal44').val();
if(bal==''){bal=0}
var type = $('#type44').val();

var code = $('#code').val();
var name =  $('#red').val();
var categ =  $('#categ').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var txtcatid= $('#txtcatid44').val();
var txtsec = $('#txtsec44').val();
var dept4rm = $('#dept4rm').val();
var ttcover786 	  = $('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total 			  = $('#total254').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totlabtst 		  = $('#total254').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var labftotal44     =  $('#labftotal44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var txtcoverage     = $('#txtcoverage').val();
var txtinsurer_id   = $('#txtinsurer_id').val();
var capbill = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

if(price==''){
	$().customAlert();
	alert('Error!', '<p>Select an item!</p>');
	$('#orderitem44').parent().find("input:first").focus();	
	return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat44').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat44').focus();	
		return;	
}
else if($('#oname').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;	
}
else{	
	if(dept4rm=='OPD'){
			if((txtinsurer_id==20||txtinsurer_id==26)&&(price>=501||tprice>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Price should be 500/= or less. Price is '+ price +'/=.</p>');
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(capbill>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=.</p>');
				//e.preventDefault();//exit;
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&(capbill>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=.</p>');
				//e.preventDefault();//exit;
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&(labftotal44>=501||total>=501||subn>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=.</p>');
				//e.preventDefault();//exit;
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(totsumcoverd254>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=. B4 : '+ totsumcoverd254 +'/=.</p>');
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(totsumcoverd254>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=. B4: '+ totsumcoverd254 +'/=.</p>');
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(price>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Price should be 1500/= or less. Price: '+ price +'/=.</p>');
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(capbill>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 1500/= or less. Total Bill: '+ capbill +'/=. B4: '+ capbill +'/=.</p>');
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(totsumcoverd254>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 1500/= or less. Total Bill: '+ capbill +'/=. B4: '+ totsumcoverd254 +'/=.</p>');
				clrlaboratory_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else{
				$('#display').html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:'131.1',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,txtsec:txtsec,totalcoverage786:capbill},
					success:function(data){
						//do something
						$('#display').html(data);
					}
				});
			}

	}
	else{
		$('#display').html(loader);
		$.ajax({
			url:'bridge.php',
			data:{id:'131.1',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,txtsec:txtsec,totalcoverage786:capbill},
			success:function(data){
				//do something
				$('#display').html(data);
			}
		});
	}
	clrlaboratory_txtboxes_after_invalid_bill_notification();
}
}

function addorder420(a,b){
var price = $('#price44').val();
var tprice = $('#tprice').val();
var quat = $('#quat44').val();
var disc = $('#disc44').val();
var subn = $('#sub44').val();
var iid = $('#income44').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#bal44').val();
if(bal==''){bal=0}
var type = $('#type44').val();

var code = $('#code').val();
var name =  $('#red').val();
var categ =  $('#categ').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var txtcatid= $('#txtcatid44').val();
var txtsec = $('#txtsec44').val();
var dept4rm = $('#dept4rm').val();
var ttcover786 	  = $('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total 			  = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totlabtst 		  = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var labftotal44     =  $('#labftotal44').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var txtcoverage     = $('#txtcoverage').val();
var txtinsurer_id   = $('#txtinsurer_id').val();
var totcover78      = parseInt(ttcover786,10) + parseInt(totlabtst,10);
var totlab          = parseInt(totlabtst,10) + parseInt(price,10);
var capbill = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

if(price==''){
	$().customAlert();
	alert('Error!', '<p>Select an item!</p>');
	$('#appcorder420').parent().find("input:first").focus();	
	return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat44').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat44').focus();	
		return;	
}
else if($('#oname').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;	
}
else{	
	$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:'131.1',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,txtsec:txtsec,totalcoverage786:ttcover786},
		success:function(data){
			$('#display').html(data);
		}
	});
	clrlaboratory_txtboxes_after_invalid_bill_notification();
}
}

function viewbill(a){
	var regn =  $('#regn').val();
	$('#display').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:133,a:a,regn:regn},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptybill(a){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:134,a:a},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function delbill(pid,a){
$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:132,pid:pid,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function delbill2(pid,a,b,c){
var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
$('#del' + pid).html(loader);
var tcovd=parseInt(totsumcoverd254,10)- parseInt(c,10);
$('#txttotalcoverage786').val((tcovd).formatMoney(2, '.', ','));
$.ajax({
	url:'bridge.php',
	data:{id:'132.2',pid:pid,a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function delbill3(pid,a,b,c){
var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
$('#delrad' + pid).html(loader);
var tcovd=parseInt(totsumcoverd254,10)- parseInt(c,10);
$('#txttotalcoverage786').val((tcovd).formatMoney(2, '.', ','));
$.ajax({
	url:'bridge.php',
	data:{id:'132.3',pid:pid,a:a},
	success:function(data){
	$('#display45').html(data);
	}
	});	
}
function delbill4(pid,a,b,c){
var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
$('#deldre' + pid).html(loader);
var tcovd=parseInt(totsumcoverd254,10)- parseInt(c,10);
$('#txttotalcoverage786').val((tcovd).formatMoney(2, '.', ','));
$.ajax({
	url:'bridge.php',
	data:{id:'132.8',pid:pid,a:a},
	success:function(data){
	$('#dresserdisp').html(data);
	}
	});	
}
function delbill5(pid,saleid,pharmid,a){
$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'132.12',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#ipdtheatreinv').html(data);
	}
	});	
}
function delpharmcartbill44(pid,saleid,pharmid,a){
$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'132.4',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#displayinv').html(data);
	}
	});	
}
function delpharmcartbill(pid,a,b,c){
var totsumcoverd254 = $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
$('#delpharmcart' + pid).html(loader);
var tcovd=parseInt(totsumcoverd254,10)- parseInt(c,10);
$('#txttotalcoverage786').val((tcovd).formatMoney(2, '.', ','));
//$('#delpharmcart' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'132.15',pid:pid,a:a},
	success:function(data){
	$('#displayinv').html(data);
	}
	});	
}
function delpharmcartIPDbill44(pid,saleid,pharmid,a){
$('#del' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'132.14',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#displayinv').html(data);
	}
	});	
}
function viewpharmcartbill(a){
	var in_patient_no =  $('#regn').val();
	var in_presc_id   =  $('#old_presc_id').val();
	var in_patient_id =  $('#old_patient_id').val();
	$('#displayinv').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'133.1',a:a,in_patient_no:in_patient_no,in_patient_id:in_patient_id,in_presc_id:in_presc_id},
	success:function(data){
	$('#displayinv').html(data);
	}
	});	
}
function viewpharmcartIPDbill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#displayinv').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'133.9',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#displayinv').html(data);
	}
	});	
}
function viewmaabarabill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#maabarainv').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'133.2',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#maabarainv').html(data);
	}
	});	
}
function viewmaabaraIPDBill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#maabarainv').html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'133.5',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#maabarainv').html(data);
	}
	});	
}
function delmaabarabill44(pid,saleid,pharmid,a){
$('#delmaabara' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'132.5',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#maabarainv').html(data);
	}
	});	
}
function delmaabaraIPDBill44(pid,saleid,pharmid,a){
$('#delmaabara' + pid).html(loader);
$.ajax({
	url:'bridge.php',
	data:{id:'132.9',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#maabarainv').html(data);
	}
	});	
}

function viewRadiolojiaBill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#radiolojiainv').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'133.4',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#radiolojiainv').html(data);
	}
	});	
}
function viewRadiolojiaIPDBill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#radiolojiainv').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'133.6',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#radiolojiainv').html(data);
	}
	});	
}
function delRadiolojiaBill834(pid,saleid,pharmid,a){
$('#delradiolojia' + pid).html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'132.7',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#radiolojiainv').html(data);
	}
	});	
}
function delRadiolojiaIPDBill834(pid,saleid,pharmid,a){
$('#delradiolojia' + pid).html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'132.11',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#radiolojiainv').html(data);
	}
	});	
}


function viewdresserbill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#dresserinv').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'133.3',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#dresserinv').html(data);
	}
	});	
}
function deldresserbill606(pid,saleid,pharmid,a){
$('#deldresser' + pid).html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'132.6',pid:pid,a:a,saleid:saleid,pharmid:pharmid},
	success:function(data){
	$('#dresserinv').html(data);
	}
	});	
}

function viewtheatreBill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#theatreinv').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'133.7',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#theatreinv').html(data);
	}
	});	
}
function viewtheatreIPDBill(a){
	var regn =  $('#regn').val();
	var oldpatientid =  $('#old_patient_id').val();
	var oldprescid =  $('#old_presc_id').val();
	$('#ipdtheatreinv').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'133.8',a:a,regn:regn,oldpatientid:oldpatientid,oldprescid:oldprescid},
	success:function(data){
	$('#ipdtheatreinv').html(data);
	}
	});	
}

function addbill4(a,b){

//var txtacctype = $('#txtacctype').val();
var price = $('#price606').val();
var tprice = $('#tprice606').val();
var quat = $('#quat606').val();
var disc = $('#disc606').val();
var subn = $('#sub606').val();
var iid = $('#income606').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#bal606').val();
if(bal==''){bal=0}
var type = $('#type606').val();

var code = $('#code606').val();
var name =  $('#red606').val();
var categ =  $('#categ606').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var txtcatid= $('#txtcatid606').val();
var txtsec = $('#txtsec606').val();
var dept4rm = $('#dept4rm').val();
var txtcoverage = $('#txtcoverage').val();
var txtinsurer_id = $('#txtinsurer_id').val();
//var ttcover786 = parseInt($('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
var ttcover786 =  $('#total606').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
//var totsumcoverd254 = parseInt($('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
var totsumcoverd254 =  $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total =  $('#total606').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totsbitem =  $('#total606').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

var totcover78   = parseInt(ttcover786,10) + parseInt(totsbitem,10);
var totservbil   = parseInt(totsbitem,10) + parseInt(price,10);

if(totsumcoverd254==''){ totsumcoverd254 = totcover78; } 
//var capbill = parseInt(totsumcoverd254,10) + parseInt(price,10);

var capbill =  $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if(price==''){
		$().customAlert();
			alert('Error!', '<p>Select an item!</p>');
		$('#order606').parent().find("input:first").focus();	
		return;	
	}
	else if(quat==''){
			$().customAlert();
			alert('Error!', '<p>Enter the quantity!</p>');
			$('#quat606').focus();	
			return;	
	}
	else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
			$().customAlert();
			alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
			$('#quat606').focus();	
			return;	
	}
	else if($('#oname').val() ==''){
		$().customAlert();
			alert('Error!', '<p>Fill the name of the patient!</p>');
			$('#oname').focus();	
			return;	
	}
	else{
		if(dept4rm=='OPD'){
			if((txtinsurer_id==20||txtinsurer_id==26)&&(price>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Price should be 700/= or less. Price: '+ price +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(totcover78>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 700/= or less. Total Bill: '+ capbill +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(totsumcoverd254>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 700/= or less. Total Bill: '+ capbill +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==26||txtinsurer_id==26)&&(price>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Price should be 500/= or less. Price: '+ price +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==26)&&(totcover78>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==26)&&(totsumcoverd254>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(price>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Price should be 1500/= or less. Price: '+ price +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(capbill>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 1500/= or less. Total Bill: '+ capbill +'/=.</p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(totsumcoverd254>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 1500/= or less. Total Bill: '+ capbill +'/=. </p>');
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else{
				$('#dresserdisp').html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:'131.4',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,txtsec:txtsec,totalcoverage786:capbill},
					success:function(data){
						$('#dresserdisp').html(data);
					}
				});
			}
		}
		else{
			$('#dresserdisp').html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:'131.4',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,txtsec:txtsec,totalcoverage786:capbill},
				success:function(data){
					$('#dresserdisp').html(data);
				}
			});
		}
				clrdresserdisp_txtboxes_after_invalid_bill_notification();
	}
}

function addorder653(a,b){

//var txtacctype = $('#txtacctype').val();
var price = $('#price606').val();
var tprice = $('#tprice606').val();
var quat = $('#quat606').val();
var disc = $('#disc606').val();
var subn = $('#sub606').val();
var iid = $('#income606').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#bal606').val();
if(bal==''){bal=0}
var type = $('#type606').val();

var code = $('#code606').val();
var name =  $('#red606').val();
var categ =  $('#categ606').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var txtcatid= $('#txtcatid606').val();
var txtsec = $('#txtsec606').val();
var dept4rm = $('#dept4rm').val();
var txtcoverage = $('#txtcoverage').val();
var txtinsurer_id = $('#txtinsurer_id').val();
var ttcover786 =  $('#total606').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totsumcoverd254 =  $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var total =  $('#total606').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totsbitem =  $('#total606').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

var totcover78   = parseInt(ttcover786,10) + parseInt(totsbitem,10);
var totservbil   = parseInt(totsbitem,10) + parseInt(price,10);

if(totsumcoverd254==''){ totsumcoverd254 = totcover78; } 
var capbill = parseInt(totsumcoverd254,10) + parseInt(price,10);

	if(price==''){
		$().customAlert();
			alert('Error!', '<p>Select an item!</p>');
		$('#order606').parent().find("input:first").focus();	
		return;	
	}
	else if(quat==''){
			$().customAlert();
			alert('Error!', '<p>Enter the quantity!</p>');
			$('#quat606').focus();	
			return;	
	}
	else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
			$().customAlert();
			alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
			$('#quat606').focus();	
			return;	
	}
	else if($('#oname').val() ==''){
		$().customAlert();
			alert('Error!', '<p>Fill the name of the patient!</p>');
			$('#oname').focus();	
			return;	
	}
	else{
		$('#dresserdisp').html(loader);
		$.ajax({
			url:'bridge.php',
			data:{id:'131.4',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,txtsec:txtsec,totalcoverage786:ttcover786},
			success:function(data){
				$('#dresserdisp').html(data);
			}
		});
		clrdresserdisp_txtboxes_after_invalid_bill_notification();
	}
}


function addbill5(a,b){
var price = $('#price834').val();
var tprice = $('#tprice834').val();
var quat = $('#quat834').val();
var disc = $('#disc834').val();
var subn = $('#sub834').val();
var iid = $('#income834').val();

var dat = $('#datepick').val();
if(dat==''){dat=0;}

var bal = $('#bal834').val();
if(bal==''){bal=0}
var type = $('#type834').val();
var code = $('#code834').val();
var name =  $('#red834').val();
var categ =  $('#categ834').val();

var oname =  $('#oname').val(); 
var regn =  $('#regn').val();

var txtcatid= $('#txtcatid834').val();
var txtsec = $('#txtsec834').val();

var total =  $('#total834').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
//var ftotal =  $('#ftotal834').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

if(price==''){
	$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
	$('#orderitem834').parent().find("input:first").focus();	
	return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat834').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat834').focus();	
		return;	
}
else if($('#oname').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;	
}
else{
	$('#disptheatproc').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:'131.5',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,txtsec:txtsec},
		success:function(data){
			//do something
			$('#disptheatproc').html(data);
		}
	});
	$("#orderitem834").parent().find("input:first").val('').focus();
	$('#disc834').val('0');	
	$('#price834').val('');
	$('#tprice834').val('');
	$('#sub834').val('');
	$('#income834').val('');
}
}


function removelastbill(a){
	$('#display').html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'132.1',a:a},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function submitbill(a){
	var fintot = $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var oname  =  $('#oname').val(); 
	var madeni606  =  $('#madeni606').val(); 
	var old_patient_id =  $('#old_patient_id').val();
	var old_consult_id =  $('#old_consult_id').val();
	var old_request_id =$('#old_request_id').val();
	var in_currins_no  = $('#insid').val();
	var in_currins_nome= $('#insname').val();

	if(fintot==''){
		$().customAlert();
		alert('Error!', '<p>No Sales Made!</p>');
		$('#itemnam').parent().find("input:first").focus();
		e.preventDefault();
	}else if($('#oname').val() ==''){
		$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
	}else if(a=='ward'||a=='nurse'){
		$.confirm({
			'title'		: 'Submit Patient Bill Confirmation',
			'message'	: 'You are about to submit this bill to the cashier.No changes can be made to the bill after this! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						$('#display').html(loader);
						$.ajax({
							url:'data.php',
							data:{id:79,a:a,old_patient_id:old_patient_id,old_consult_id:old_consult_id,old_request_id:old_request_id,madeni606:madeni606,in_currins_no:in_currins_no,in_currins_nome:in_currins_nome},
							success:function(data){
								$('#display').html(data);
							}
						});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	}else{			
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:79,a:a,old_patient_id:old_patient_id,old_consult_id:old_consult_id,old_request_id:old_request_id,madeni606:madeni606,in_currins_no:in_currins_no,in_currins_nome:in_currins_nome},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}
function inbill(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:139},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function infinalbill(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'139.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function ipdcashbill(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'139.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$("#cons15" ).combobox({
	select: function(event,ui){
	 var param = $('#cons15').val();
		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:140,pid:param},
				success:function(data){
					$('#mainp').html(data);
				}
			});
	}
});
function openprac(cusid,packsize){
 $('#cusid').val(cusid);
 $('#packsize').val(packsize);
 //  $().customAlert();
	// alert('Credit Balance', '<p>Remaining Credit is Kshs. ' + packsize + '</p>');
	// e.preventDefault();
	$( "#newpractice" ).dialog( "open" );
}
function postnewdeds(){
	var transunits=$('#transferunits').val();
	var transparts=$('#transferparts').val();
	var cusid=$('#cusid').val();
	var packsize=$('#packsize').val();
	if(cusid==''||packsize==''){
	$().customAlert();
		alert('Error!', '<p>All fields are Mandatory</p>');
		e.preventDefault();		
	}
	else{	
	$("#newprac").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:152,transunits:transunits,transparts:transparts,cusid:cusid,packsize:packsize},
	success:function(data){
		$('#newprac').html(data);
		$('#cusid').val('');
		$('#packsize').val('');
		$('#transferunits').val('');
		$('#transferparts').val('');
		$( "#newpractice" ).dialog( "close" );
	
	}
	});
	}
}
function birthsregister(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:141},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function patage(){
	
		$.confirm({
			'title'		: 'Update Patient Ages Confirmation',
			'message'	: 'You are about to update ages (add 1 year) for all patients in the database.This cannot be restored later! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mainp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:81},
	success:function(data){
	$('#mainp').html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
}
function extmedic(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:142},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function addmed(a){
var name = $('#name').val();
var acno = $('#acno').val();
var add = $('#add').val();
var town = $('#towna').val();
var tel = $('#tel').val();
var mobile = $('#mobile').val();
var email = $('#email').val();
 if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid name!</p>');
		e.preventDefault();
		}
	
	else{
		$('#res1').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:'82',a:a,name:name,acno:acno,add:add,town:town,tel:tel,mobile:mobile,email:email},
		success:function(data){
		$('#res1').html(data);
		}
		});	
		}	
}

$( "#extmedic" ).combobox({
	select: function(event,ui){
	 var str = $('#extmedic').val();
	 var parts=str.split('θ',8);
	 $('#regn').val(parts[0]);
	$('#name2').val(parts[1]);
	 $('#acno2').val(parts[2]);
	 $('#add2').val(parts[3]);
	 $('#town2').val(parts[4]);
	 $('#tel2').val(parts[5]);
	 $('#mobile2').val(parts[6]);
	 $('#email2').val(parts[7]);
	 }
});
function editmed(a){
var name = $('#name2').val();
var regn = $('#regn').val();
var acno = $('#acno2').val();
var add = $('#add2').val();
var town = $('#town2').val();
var tel = $('#tel2').val();
var mobile = $('#mobile2').val();
var email = $('#email2').val();
 if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Company name!</p>');
		e.preventDefault();
		}
	
	else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'82',a:a,name:name,acno:acno,add:add,town:town,tel:tel,mobile:mobile,email:email,regn:regn},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}	
}
function delmed(){
	var regn=$('#regn').val();
	if(regn==''){
	$().customAlert();
		alert('Error!', '<p>Enter a valid Company name!</p>');
		e.preventDefault();		
	}
	else{	
	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this External Medic.Continue with this action?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$('#res2').html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'83',regn:regn},
	success:function(data){
	$('#res2').html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
	
	}
}
$("#patname14" ).combobox({
select: function(event,ui){
var str = $('#patname14').val();
var parts=str.split('θ',2)
$('#pidd2').val(parts[0]);
$('#pname2').val(parts[1]);
 $('#subject2').focus();
}
});
function openadmin(a,b){
$("#adminauth").dialog( "open" );
$('#adlog').html('');
$("#credstatus").prop("checked",false);
}
function openadmin2(a){
if(a==1){
		var tot = $('#totitems').val();
		if(tot==''||tot==0){
		$().customAlert();
		alert('Error!', '<p>No Entries Made!</p>');
		e.preventDefault();
		return;
		}
		else{
			submitissue();
		}	
		return;
		
}
$("#adminauth2").dialog( "open" );
$('#adlog2').html('');
$('#authid').val(a);
}
function createnewmess(){
$("#newmessage").dialog( "open" );
}
$("#user1" ).combobox({});
function sendmessage(a){
var to = $('#user1').val();
var mess = $('#mezzage').val();

		if(to==''||mess==''){
		$().customAlert();
		alert('Error!', '<p>Enter both the Receiver and the Message!</p>');
		e.preventDefault();
		}
	
	else{
		$("#mytasks").html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'56.2',to:to,a:a,mess:mess},
		success:function(data){
		$('#mytasks').html(data);
		}
		});	
		}	
}
function adlog(a){
var name = $('#adname').val();
var pass = $('#adpass').val();

		if(name==''||pass==''){
		$().customAlert();
		alert('Error!', '<p>Enter both the Username and the Password!</p>');
		e.preventDefault();
		}
	
	else{
		$('#adlog').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:84,name:name,pass:pass},
		success:function(data){
		$('#adlog').html(data);
		}
		});	
		}	
}
function adlog2(){
var name = $('#adname2').val();
var pass = $('#adpass2').val();
var authid = $('#authid').val();
		if(name==''||pass==''){
		$().customAlert();
		alert('Error!', '<p>Enter both the Username and the Password!</p>');
		e.preventDefault();
		}
	
	else{
		$('#adlog2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:120,name:name,pass:pass,authid:authid},
		success:function(data){
		$('#adlog2').html(data);
		}
		});	
		}	
}
function notes(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:143},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$("#coz6" ).combobox();
$("#coz1" ).combobox({
	select: function(event,ui){
	var str = $('#coz1').val();
	 var parts=str.split('θ',2);
	removeArea('medata2',a2);
	$('#itid').val(parts[0]);
	 $('#medata2').val(parts[1]);
	a2= new nicEditor({fullPanel : true}).panelInstance("medata2");
	}
});
$("#coz2" ).combobox({
	select: function(event,ui){
	var str = $('#coz2').val();
	 var parts=str.split('θ',2);
	removeArea('medata2',a2);
	$('#itid').val(parts[0]);
	 $('#medata2').val(parts[1]);
	a2= new nicEditor({fullPanel : true}).panelInstance("medata2");
	}
});
$("#coz3" ).combobox({
	select: function(event,ui){
	var str = $('#coz3').val();
	 var parts=str.split('θ',2);
	removeArea('medata2',a2);
	$('#itid').val(parts[0]);
	 $('#medata2').val(parts[1]);
	a2= new nicEditor({fullPanel : true}).panelInstance("medata2");
	}
});
$("#coz4" ).combobox({
	select: function(event,ui){
	var str = $('#coz4').val();
	 var parts=str.split('θ',2);
	removeArea('medata2',a2);
	$('#itid').val(parts[0]);
	 $('#medata2').val(parts[1]);
	a2= new nicEditor({fullPanel : true}).panelInstance("medata2");
	}
});
$("#coz5" ).combobox({
	select: function(event,ui){
	var str = $('#coz5').val();
	 var parts=str.split('θ',2);
	removeArea('medata2',a2);
	$('#itid').val(parts[0]);
	 $('#medata2').val(parts[1]);
	a2= new nicEditor({fullPanel : true}).panelInstance("medata2");
	}
});
$("#coz6" ).combobox({
	select: function(event,ui){
	var str = $('#coz6').val();
	 var parts=str.split('θ',2);
	removeArea('medata2',a2);
	$('#itid').val(parts[0]);
	 $('#medata2').val(parts[1]);
	a2= new nicEditor({fullPanel : true}).panelInstance("medata2");
	}
});
function clearops(){
	$(".coz").parent().find("input:first").val('').focus();
}
function ops(a){
	for(i=0;i<5;i++){
	$('#op' + i).hide(); 
	}	
	$('#op' + a).show();
 }
 function remin(tid){
	 $.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to remove this record from income database.Continue with this action?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
		$('#figw' + tid).html('');
	$.ajax({
	url:'data.php',
	data:{id:85,tid:tid},
	success:function(data){
	$('#figw' + tid).html(data);
	}
	});	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
	 

}

function loadep(){
var dep = $('#deposit').val();
var patname = $('#name').val() + ',' + $('#oname').val();
var patid = $('#regn').val();
if(dep==''){
		$().customAlert();
		alert('Error!', '<p>Enter the deposit amount!</p>');
		e.preventDefault();
		}
else if(patid==''){
		$().customAlert();
		alert('Error!', '<p>No patient selected!</p>');
		e.preventDefault();
		}
	
	else{
		$('#newstudent3').html('loader');
		$.ajax({
		url:'data.php',
		data:{id:'86',dep:dep,patname:patname,patid:patid},
		success:function(data){
		$('#newstudent3').html(data);
		}
		});	
		}	
}
$(document).ready(function(){
	$('#margin1').keyup(function() {
	var price = $('#sprice1').val();
	var margin = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(price==''){
	price=0;	
	}
	var a=price * margin/100;
	var tot=parseInt(price,10) - parseInt(a,10);
	$('#pprice1').val(tot);
	});
	
	$('#sprice1').keyup(function() {
	var margin = $('#margin1').val();
	var price = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(margin==''){
	margin=0;	
	}
	var a=price * margin/100;
	var tot=parseInt(price,10) - parseInt(a,10);
	$('#pprice1').val(tot);
	});
});
$(document).ready(function(){
	$('#margin2').keyup(function() {
	var price = $('#sprice2').val();
	var margin = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(price==''){
	price=0;	
	}
	var a=price * margin/100;
	var tot=parseInt(price,10) - parseInt(a,10);
	$('#pprice2').val(tot);
	});
	
	$('#sprice2').keyup(function() {
	var margin = $('#margin2').val();
	var price = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(margin==''){
	margin=0;	
	}
	var a=price * margin/100;
	var tot=parseInt(price,10) - parseInt(a,10);
	$('#pprice2').val(tot);
	});
});
function addlabel(){
	removeArea('prelabel',area29);
	var pre=$('#prelabel').val();
	$('#prelab').val('');
	addArea('prelabel',area29);
	
	$.ajax({
	url:'bridge.php',
	data:{id:'111.1',pre:pre},
	success:function(data){
	$('#prelab').html(data);
	}
	});
}
function savelabel(){
window.open('report.php?id=45');
}

function theatre(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:147},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#cons20" ).combobox({
	select: function(event,ui){
	 var param = $('#cons20').val();

		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:148,pid:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
});
function theatres(pid){
	var oname  = $('#oname').val(); 
	if(oname==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;
	}
	
	removeArea('theatre',area35);
	var theatre=$('#theatre').val();
	addArea('theatre',area35);
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'50.3',pid:pid,theatre:theatre},
	success:function(data){
		$('#newstudent2').html(data);
		window.open('report.php?id=39.1&rcptno=' + pid);
	}
	});
}

$(document).ready(function(){
	$('#price56').keyup(function() {
	var unit1 = $('#unit56').val();
	var part = $('#part56').val();
	if(part==''){part=0;}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
	var selp=((parseFloat(marg,10) +100)/100)*price;
	var sp=Math.round(selp/pack);
	var pp=Math.round(price/pack);
	$('#pp56').val(pp);
	$('#sp56').val(sp);
	selp=(selp).formatMoney(2, '.', ',');
	$('#pricet').val(sp);
	
	});
	
	$('#unit56').keyup(function() {
	var unit1 = $('#unit56').val();
	var part = $('#part56').val();
	if(part==''){part=0;}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price = $('#price56').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
	var selp=((parseFloat(marg,10) +100)/100)*price;
	var sp=Math.round(selp/pack);
	var pp=Math.round(price/pack);
	$('#pp56').val(pp);
	$('#sp56').val(sp);
	selp=(selp).formatMoney(2, '.', ',');
	$('#pricet').val(selp);
	
	});
	
	
	$('#part56').keyup(function() {
	var unit1 = $('#unit56').val();
	var part = $('#part56').val();
	if(part==''){part=0;}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price = $('#price56').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
	var selp=((parseFloat(marg,10) +100)/100)*price;
	var sp=Math.round(selp/pack);
	var pp=Math.round(price/pack);
	$('#pp56').val(pp);
	$('#sp56').val(sp);
	selp=(selp).formatMoney(2, '.', ',');
	$('#pricet').val(selp);
	
	});
});
$( "#dept1" ).combobox({
	select: function(event,ui){
	 var dep2 = $('#dept2').val();
	 var dep1 = $('#dept1').val();
	 if(dep2!=''){
		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:52,dep1:dep1,dep2:dep2},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	 }else{$('#dept2').parent().find('input:first').focus();}
	}
});
$( "#dept2" ).combobox({
	select: function(event,ui){
	 var dep2 = $('#dept2').val();
	 var dep1 = $('#dept1').val();
	 if(dep1!=''){
		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:52,dep1:dep1,dep2:dep2},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	 }
	}
});
$( "#categ89" ).combobox({});
$( "#dept89" ).combobox({});
$( "#subcateg89" ).combobox({});
function stockrequest(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:150},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#itemxb" ).combobox({
	select: function(event,ui){
	 var str = $('#itemxb').val();
	 var parts=str.split('θ',5)
	 
	 var pack=parts[0];
	 var bal=parts[2];
	 var a=Math.floor(bal/pack);
	 var b=bal%pack;
	 $('#bal1').val(a);
	 $('#bal2').val(b);
	 $('#pack').val(parts[0]);
	$('#code').val(parts[1]);
	$('#bal').val(parts[2]);
	$('#itname7').val(parts[3]);
	$('#spr').val(parts[4]);
	$('#unit57').focus();
	}
});
$('#unit57').keyup(function() {
	var pack = $('#pack').val();
	var part = $('#part57').val();
	if(part==''){part=0;}
	var bal = $('#bal').val();
	var unit1 = $('#unit57').val();
	var qty=(unit1*pack) + parseInt(part,10);
	//if(qty>bal){
		//$('#part57').val('');
		//$('#unit57').val('');
		//$().customAlert();
		//alert('Error!', '<p>Quantity requested cannot exceed the stock balance!</p>');
		//$('#unit57').focus();
	//}
	});
$('#part57').keyup(function() {
	var pack = $('#pack').val();
	var part = $('#part57').val();
	if(part==''){part=0;}
	var bal = $('#bal').val();
	var unit1 = $('#unit57').val();
	var qty=(unit1*pack) + parseInt(part,10);
	//if(qty>bal){
		//$('#part57').val('');
		//$('#unit57').val('');
		//$().customAlert();
		//alert('Error!', '<p>Quantity requested cannot exceed the stock balance!</p>');
		//$('#part57').focus();
	//}
	});
	
function stocktransfer(){
$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:152},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#dept3" ).combobox({
	select: function(event,ui){
	 var dep3 = $('#dept3').val();
	 if(dep3!=''){
		 $("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:152,dep3:dep3},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	 }
	}
});
$( "#dept4" ).combobox({
	select: function(event,ui){
	 var param = $('#dept4').val();
	 if(param!=''){
		 $("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:2,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	 }
	}
});
function seeissue(param){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:2,param:param},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function transfer(param){
	$.ajax({
	url:'data.php',
	data:{id:88,param:param},
	success:function(data){
	$('#mes').html(data);
	}
	});
}
function revoke(param){
	$.ajax({
	url:'data.php',
	data:{id:89,param:param},
	success:function(data){
	$('#normal' + param).html('');
	}
	});
}
$( "#dept5" ).combobox({
	select: function(event,ui){
	 var dep5 = $('#dept5').val();
	window.open('report.php?id=48&rcptno=' + dep5);
	window.open('report.php?id=49&rcptno=' + dep5);
	 
	}
});

function returnout(param){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:5},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$('#price58').keyup(function() {
	var unit1 = $('#unit58').val();
	var part = $('#part58').val();
	if(part==''){part=0}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price =  $('#price58').val();
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
});

$('#unit58').keyup(function() {
	var unit1 = $('#unit58').val();
	var part = $('#part58').val();
	if(part==''){part=0}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price =  $('#price58').val();
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
});

$('#part58').keyup(function() {
	var unit1 = $('#unit58').val();
	var part = $('#part58').val();
	if(part==''){part=0}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price =  $('#price58').val();
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
});
function lpo(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:11},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$('#price59').keyup(function() {
var unit1 = $('#unit59').val();
	var part = $('#part59').val();
	if(part==''){part=0}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price =  $('#price59').val();
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
});

$('#unit59').keyup(function() {
var unit1 = $('#unit59').val();
	var part = $('#part59').val();
	if(part==''){part=0}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price =  $('#price59').val();
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
});

$('#part59').keyup(function() {
	var unit1 = $('#unit59').val();
	var part = $('#part59').val();
	if(part==''){part=0}
	var pack = $('#pack').val();
	var marg = $('#margin').val();
	var price =  $('#price59').val();
	var tab=price/pack;
	var qty=(unit1*pack) + parseInt(part,10);
	$('#qty').val(qty);
	var tot=qty*tab;
	tot=(tot).formatMoney(2, '.', ',');
	$('#tprice').val(tot);
});
function repgrn(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'16',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function repfinalb(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'127',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function invoicelist(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'17'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function invoicelist2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'69'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function reorder(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:18,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function reorder1(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:70,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#reorderx" ).combobox({
	select: function(event,ui){
	a=3;
	 var name = $('#reorderx').val();
	{window.open("report.php?id=54&code=" + a + '&' + "\nname=" + name);}
	}
});
$( "#reordery" ).combobox({
	select: function(event,ui){
	a=2;
	 var name = $('#reordery').val();
	 if(name=='All'){a=1;}
	window.open("report.php?id=54&code=" + a + '&' + "\nname=" + name);
	}
});
$( "#randomstock" ).combobox({
	select: function(event,ui){
	a=3;
	 var name = $('#randomstock').val();
	{window.open("r/random-stock-take.php?id=11&code=" + a + '&' + "\nname=" + name);}
	}
});
$( "#inpatlist" ).combobox({
	select: function(event,ui){
	a=3;
	 var name = $('#inpatlist').val();
	{window.open("report.php?id=28&code=" + a + '&' + "\nname=" + name);}
	}
});
function invrep2(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:19,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function invrep3(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:20,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function payme(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:25,pid:7191015287},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function discharge(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:36},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){
	$( "#cons21" ).combobox({
		select: function(event,ui){
		 var param = $('#cons21').val();
			 $("#mainp").html(loader);
				$.ajax({
					url:'link.php',
					data:{id:37,pid:param},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		}
	});
	$( "#dischargesum606" ).combobox({
		select: function(event,ui){
		 var param = $('#dischargesum606').val();
			$("#mainp").html(loader);
			$.ajax({
				url:'bridgerep.php',
				data:{id:16,pid:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
		}
	});
	$( "#riassunto_del_referto_medico834" ).combobox({
		select: function(event,ui){
		 var param = $('#riassunto_del_referto_medico834').val();
			$("#mainp").html(loader);
			$.ajax({
				url:'bridgerep.php',
				data:{id:20,pid:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
		}
	});


});
function savedischarge(sumno,prescid){
	var patid=$('#patid').val();
	var patname=$('#patname').val();
	var age=$('#age').val();
	var sex=$('#sex').val();
	var contact=$('#contact').val();
	var doctor=$('#doctor').val();
	var ward=$('#ward').val();
	var roomno=$('#roomno').val();
	var bedno=$('#bednum').val();
	var admdate=$('#datepick').val();
	var disdate=$('#datepick2').val();
	var nextapp=$('#datepick3').val();
	
	removeArea('disdiag',area31);
	var disdiag=$('#disdiag').val();
	addArea('disdiag',area31);
	
	removeArea('dismed',area32);
	var dismed=$('#dismed').val();
	addArea('dismed',area32);
	
	removeArea('clinsumm',area33);
	var clinsumm=$('#clinsumm').val();
	addArea('clinsumm',area33);
	
	$("#res2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'96',patid:patid,prescid:prescid,patname:patname,age:age,sex:sex,contact:contact,doctor:doctor,ward:ward,roomno:roomno,bedno:bedno,admdate:admdate,disdate:disdate,nextapp:nextapp,disdiag:disdiag,dismed:dismed,clinsumm:clinsumm,sumno:sumno},
	success:function(data){
	$('#res2').html(data);
	
	}
	});
	
}



function savenewdischarge(sumno,pid){
	$("#res2").html(loader);
	var patid=$('#patid').val();
	var patname=$('#patname').val();
	var age=$('#age').val();
	var sex=$('#sex').val();
	var contact=$('#contact').val();
	var doctor=$('#doctor').val();
	var ward=$('#ward').val();
	var roomno=$('#roomno').val();
	var bedno=$('#bednum').val();
	var admdate=$('#datepick').val();
	var disdate=$('#datepick2').val();
	var nextapp=$('#datepick3').val();
	var prescid=$('#old_presc_id').val();
	var clientid=$('#old_patient_id').val();
	
	removeArea('disdiag',area31);
	var disdiag=$('#disdiag').val();
	addArea('disdiag',area31);
	
	removeArea('prescription',area10);
	var prescription=$('#prescription').val();
	addArea('prescription',area10);
	
	removeArea('clinsumm',area33);
	var clinsumm=$('#clinsumm').val();
	addArea('clinsumm',area33);

	var recp = $('input[name=recpharm]:checked').val();
	if(recp==1){recp=1}//else {recp=0}
	
	$.ajax({
	url:'data_rep.php',
	type:'POST',
	data:{id:9,patid:patid,pid:pid,patname:patname,age:age,sex:sex,contact:contact,doctor:doctor,ward:ward,roomno:roomno,bedno:bedno,admdate:admdate,disdate:disdate,nextapp:nextapp,disdiag:disdiag,prescription:prescription,clinsumm:clinsumm,sumno:sumno,recp:recp,prescid:prescid,clientid:clientid},
	success:function(data){
	$('#res2').html(data);
	
	}
	});
	
}



function dischargeTwo(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:15},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function riassunto_del_referto_medico(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:19},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function savenewrefertomedico(a,pid){
	$("#res2").html(loader);
	var patid=$('#patid').val();
	var patname=$('#patname').val();
	var age=$('#age').val();
	var sex=$('#sex').val();
	var doctor=$('#doctor').val();
	var reportdt=$('#datepick2').val();
	var lc_hospital=$('#lc_hospital').val();
	var prescid=$('#old_presc_id').val();
	var clientid=$('#old_patient_id').val();
	
	removeArea('disdiag',area31);
	var disdiag=$('#disdiag').val();
	addArea('disdiag',area31);
	
	removeArea('prescription',area10);
	var prescription=$('#prescription').val();
	addArea('prescription',area10);
	
	removeArea('clinsumm',area33);
	var clinsumm=$('#clinsumm').val();
	addArea('clinsumm',area33);
	
	removeArea('risultaticlinici',area34);
	var risultaticlinici=$('#risultaticlinici').val();
	addArea('risultaticlinici',area34);
	
	removeArea('investigations',area35);
	var investigations=$('#investigations').val();
	addArea('investigations',area35);
	
	removeArea('urgent_admission_request',area36);
	var urgent_admission_request=$('#urgent_admission_request').val();
	addArea('urgent_admission_request',area36);
	
	removeArea('raccomandazione',area37);
	var raccomandazione=$('#raccomandazione').val();
	addArea('raccomandazione',area37);

	if(disdiag==''||prescription==''||clinsumm==''||risultaticlinici==''||investigations==''||urgent_admission_request==''||raccomandazione==''){
			$().customAlert();
			alert('Error!', '<p>All fields are required!</p>');
			e.preventDefault();
	}
	else {
		$.ajax({
		url:'data_rep.php',
		type:'POST',
		data:{id:15,medico_id:a,patid:patid,pid:pid,patname:patname,prescid:prescid,clientid:clientid,age:age,sex:sex,risultaticlinici:risultaticlinici,doctor:doctor,investigations:investigations,reportdt:reportdt,lc_hospital:lc_hospital,disdiag:disdiag,prescription:prescription,clinsumm:clinsumm,urgent_admission_request:urgent_admission_request,raccomandazione:raccomandazione},
		success:function(data){
		$('#res2').html(data);		
		}
		});
	}
	
}
function admsumm(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:38},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function admrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:39},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enteradm(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	var a=1;
	window.open("report.php?id=59&code=" + a);
}
else {var a=0;
	window.open("report.php?id=59&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}
function diagrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:40},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function generalmchOutpat(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:129},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function generalOutpatients(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:128},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function generalInpatients(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:138},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function generalAdmissions(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:13},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function diagrep2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:41},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterdiagrep(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var name = $('#itemname').val();
var dis = $('#diseas').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
		return
}

if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	var a=1;
	window.open("report.php?id=60&code=" + a + '&' + "\nname=" + name + '&' + "\ndis=" + dis);
}
else {var a=0;
	window.open("report.php?id=60&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ndis=" + dis);}

}


function generaloutpatfilterclinic(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var name = $('#itemname').val();
var dis = $('#diseas').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
		return
}

/*if(view==0){
		$().customAlert();
		alert('Error!', '<p>Check view all!</p>');
		e.preventDefault();
}*/
else if(view==1){
	var a=1;
	window.open("gen_outpatients.php?id=1&code=" + a + '&' + "\nname=" + name + '&' + "\ndis=" + dis);
}
else {var a=0;
	window.open("gen_outpatients.php?id=1&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ndis=" + dis);}
}

function generaloutpatfiltermch(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var name = $('#itemname').val();
var dis = $('#diseas').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
		return
}

if(view==0){
		$().customAlert();
		alert('Error!', '<p>Check view all!</p>');
		e.preventDefault();
}
else if(view==1){
	var a=1;
	window.open("gen_outpatients.php?id=2&code=" + a + '&' + "\nname=" + name + '&' + "\ndis=" + dis);
}
else {var a=0;
	window.open("gen_outpatients.php?id=2&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ndis=" + dis);}
}

function generalInpatfilterclinic(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var name = $('#itemname').val();
var dis = $('#diseas').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
		return
}

/*if(view==0){
		$().customAlert();
		alert('Error!', '<p>Check view all!</p>');
		e.preventDefault();
}*/
else if(view==1){
	var a=1;
	window.open("gen_inpatients.php?id=1&code=" + a + '&' + "\nname=" + name + '&' + "\ndis=" + dis);
}
else {var a=0;
	window.open("gen_inpatients.php?id=1&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ndis=" + dis);}
}

function generalAdmissionsFilterClinic(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var name = $('#itemname').val();
var dis = $('#diseas').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
		return
}

/*if(view==0){
		$().customAlert();
		alert('Error!', '<p>Check view all!</p>');
		e.preventDefault();
}*/
else if(view==1){
	var a=1;
	window.open("gen_outpatients.php?id=3&code=" + a + '&' + "\nname=" + name + '&' + "\ndis=" + dis);
}
else {var a=0;
	window.open("gen_outpatients.php?id=3&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ndis=" + dis);}
}

function enterdiagrep2(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var name = $('#itemname').val();
var dis = $('#diseas').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
		return
}

if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	var a=1;
	window.open("report.php?id=60.1&code=" + a + '&' + "\nname=" + name + '&' + "\ndis=" + dis);
}
else {var a=0;
	window.open("report.php?id=60.1&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ndis=" + dis);}

}
function dueadmit(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:41},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function admsumm1(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:42},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$("#itemv" ).combobox({
	select: function(event,ui){
	 var param = $('#itemv').val();
		 $("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:38,pid:param},
				success:function(data){
					$('#mainp').html(data);
				}
			});
	}
});
function invmov(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'17.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function inven_daily_summary(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:2},
	success:function(data){
	$('#mainp').html(data);
	}
	});

}

function inven_daily_summary2(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:6},
	success:function(data){
	$('#mainp').html(data);
	}
	});

}
function inven_daily_summary3(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:7},
	success:function(data){
	$('#mainp').html(data);
	}
	});

}

function inven_daily_summary4(){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:8},
	success:function(data){
	$('#mainp').html(data);
	}
	});

}
function dragit(a) {
		$( ".draggable" ).draggable({ revert: "valid" });
		$( ".droppable" ).droppable({
			accept: ".draggable",
			drop: function( event, ui ) {
			var c=$( this ).find( "a" ).html();
			var b=$( this ).find( "p" ).html();
			if(c==0){
				$( ".draggable" ).draggable({ revert: "invalid" });
			$.confirm({
			'title'		: 'Patient Transfer Confirmation',
			'message'	: 'You are about to transfer this patient to a new bed.Continue with this action?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$.ajax({
	url:'data.php',
	data:{id:105,a:a,b:b},
	success:function(data){
	$('#mainp').html(data);
	}
	});
	
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){inpatient()}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
			}
			
			}
		});
		
	}
function saveip(code){
	var dept=$('#deptt' + code).val();
	var name=$('#name' + code).val();
	var ip=$('#ip' + code).val();
	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'109',code:code,dept:dept,name:name,ip:ip},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function removeip(code){
	$("#normal" + code).html('');
	$.ajax({
	url:'data.php',
	data:{id:'108',code:code},
	success:function(data){
	}
	});
}

function savebank(code){
	var name=$('#name' + code).val();
	$('#save' + code).html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'112',code:code,name:name},
	success:function(data){
	$('#save' + code).html(data);
	}
	});
}

function removebank(code){
	$("#normal" + code).html('');
	$.ajax({
	url:'data.php',
	data:{id:'111',code:code},
	success:function(data){
	}
	});
}
function cashcollect(){	
	$("#mainp").html(loader);
	$.ajax({
			url:'./link.php',
			data:{id:'57'},
			success:function(data){
					$('#mainp').html(data);
			}
	});

}
function expman(){	
		$("#mainp").html(loader);
		$.ajax({
				url:'./link.php',
				data:{id:'58'},
				success:function(data){
						$('#mainp').html(data);
						$("#expensemgt_acntid" ).combobox({
								select: function(e,ui){
										var selectInpt4=$(this);
										var lid4=selectInpt4.find(':selected').val();
										var sb4=selectInpt4.find(':selected').data('main');
										var mcat4=selectInpt4.find(':selected').data('mcat');
										if(parseInt(sb4)==1){
												$.ajax({
														url:'./r/data.php',
														type:'post',
														dataType:'json',
														data:{src_id:3,lid:lid4,mcat:mcat4},
														success:function(res){
																const inpt4=document.getElementById('expensemgt_acntid_subledgerid');
																$('#expensemgt_acntid_subledgerid').html('<option value="">Select an option</option>');
																res.forEach(subledger=>{
																		inpt4.options[inpt4.options.length] = new Option(subledger.name, subledger.ledgerid);
																});
														}
												});
																		
												$('#expensemgt_acntid_subledgerdiv').show();
										}else{$('#expensemgt_acntid_subledgerdiv').hide();}

								}
						});

						$("#expense_payfrm_acntid" ).combobox({
								select: function(e,ui){
										var selectInpt=$(this);
										var lid=selectInpt.find(':selected').val();
										var sb=selectInpt.find(':selected').data('main');
										var mcat=selectInpt.find(':selected').data('mcat');
										if(parseInt(sb)==1){
												$.ajax({
														url:'./r/data.php',
														type:'post',
														dataType:'json',
														data:{src_id:3,lid:lid,mcat:mcat},
														success:function(res){
																const inpt=document.getElementById('expense_payfrm_subledgerid');
																$('#expense_payfrm_subledgerid').html('<option value="">Select an option</option>');
																res.forEach(subledger=>{
																		inpt.options[inpt.options.length] = new Option(subledger.name, subledger.ledgerid);
																});
														}
												});
																		
												$('#expense_payfrm_subledgerdiv').show();
										}else{$('#expense_payfrm_subledgerdiv').hide();}

								}
						});

				}
		});
		
}

function bankdep(){	
	$("#mainp").html(loader);
	$.ajax({
			url:'./link.php',
			data:{id:'59'},
			success:function(data){
					$('#mainp').html(data);
					$("#cashdepo_datepick2" ).datepicker();
					$("#cashdepo_cashledgerid" ).combobox({
						select: function(e,ui){
							var selectInpt=$(this);
							var lid=selectInpt.find(':selected').val();
							var sb=selectInpt.find(':selected').data('main');
							var mcat=selectInpt.find(':selected').data('mcat');
							var ltype=selectInpt.find(':selected').data('ltype');
							if(parseInt(sb)==1){
								$.ajax({
									url:'./r/data.php',
									type:'post',
									dataType:'json',
									data:{src_id:3,lid:lid,mcat:mcat},
									success:function(res){
										const inpt=document.getElementById('cashdepo_cash_subledgerid');
										$('#cashdepo_cash_subledgerid').html('<option value="">Select an option</option>');
										res.forEach(subledger=>{
											inpt.options[inpt.options.length] = new Option(subledger.name, subledger.ledgerid);
										});
									}
								});							
								$('#cashdepo_cash_subledgerdiv').show();
							}else{$('#cashdepo_cash_subledgerdiv').hide();}
							if(ltype=='Other_Income'){
								$('#cashdepoother_incomes_container').show();
							}else{
								$('#cashdepoother_incomes_container').hide();
							}

						}
					});

					$("#cashdepo_bankledgerid" ).combobox({
							select: function(e,ui){
									var selectInpt=$(this);
									var lid=selectInpt.find(':selected').val();
									var sb=selectInpt.find(':selected').data('main');
									var mcat=selectInpt.find(':selected').data('mcat');
									if(parseInt(sb)==1){
											$.ajax({
													url:'./r/data.php',
													type:'post',
													dataType:'json',
													data:{src_id:3,lid:lid,mcat:mcat},
													success:function(res){
															const inpt=document.getElementById('cashdepo_bank_subledgerid');
															$('#cashdepo_bank_subledgerid').html('<option value="">Select an option</option>');
															res.forEach(subledger=>{
																	inpt.options[inpt.options.length] = new Option(subledger.name, subledger.ledgerid);
															});
													}
											});
																	
											$('#cashdepo_bank_subledgerdiv').show();
									}else{$('#cashdepo_bank_subledgerdiv').hide();}

							}
					});

			}
	});
}
function deptbalance(){
		var code= $('#code').val();
		if(code==''){
		$().customAlert();
		alert('Error!', '<p>No item to view!</p>');
		e.preventDefault();
		}
		
	else{
		$('#depbal').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:118,code:code},
		success:function(data){
		$('#depbal').html(data);
		}
		});	
	}
}
function purchasesumm(){
		var code= $('#code').val();
		if(code==''){
		$().customAlert();
		alert('Error!', '<p>No item to view!</p>');
		e.preventDefault();
		}
		
	else{
		$('#depbal').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:119,code:code},
		success:function(data){
		$('#depbal').html(data);
		}
		});	
	}
}
function stockval(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:63},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function stockval2(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:133},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function randomstocktake(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:72},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function patientrep(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:73,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function patientrev(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'73.1',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterpatreport(a){
	if(a==2){
		enterpatreport2(a);
		return;
	}else if(a==4){
		enterpatreport3(a);
		return;
	}
	var pg = "OUTPATIENT REPORT";
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	if(view==null){view=0}
	if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	window.open("r/unregistered.php?id=13&code=" + a + '&' + "\npg=" + pg);
}
else {
	//window.open("output.php?id=13&code=" + a + '&' + "\nd1=" + d1 + '&' + "\npg=" + pg);
	window.open("r/unregistered.php?id=13&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\npg=" + pg);
}

}

function enterpatreport2(a){
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	if(view==null){view=0}
	if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	window.open("output.php?id=30&code=" + a);
}
else {window.open("output.php?id=30&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}

function enterpatreport3(a){
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	var pg = "Unregistered Patients Report";
	if(view==null){view=0}
	if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
	}
	else if(view==1){
		//window.open("output.php?id=13.3&code=" + a);
		window.open("r/unregistered.php?id=13.3&code=" + a + '&' + "\npg=" + pg);
	}
	else {
		//window.open("output.php?id=13.3&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
		window.open("r/unregistered.php?id=13.3&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\npg=" + pg);
	}

}

function enterpatreview(a){
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	var pg = "Patients Review Report";
	if(view==null){view=0}
	if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	window.open("r/patients-review.php?id=16&code=" + a + '&' + "\npg=" + pg);
}
else {window.open("r/patients-review.php?id=16&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\npg=" + pg);}

}
function enterpatlist(a){
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	if(view==null){view=0}
	if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	window.open("report.php?id=31&code=" + a);
}
else {window.open("report.php?id=31&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}
function calcinpatient(){
	var adm = $('#admtotal').val();
	var bed = $('#bedtotal').val();
	var doc1 = $('#doctotal1').val();
	var doc2 = $('#doctotal2').val();
	var doc3 = $('#doctotal3').val();
	var oth = $('#othertotal').val();
	var subt =  $('#subt').val();
	var nhif = $('#nhiftotal').val();
	var com = $('#comtotal').val();
	var com2 = $('#com2total').val();
	var cash = $('#cashtotal').val();
	var disc = $('#disc44').val();
	var mulacc = $('#mulacctotal').val();
	var deptotal =  $('#deptotal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	

	
	if(adm==''){adm=0;}
	if(bed==''){bed=0;}
	if(oth==''){oth=0;}
	if(doc1==''){doc1=0;}
	if(doc2==''){doc2=0;}
	if(doc3==''){doc3=0;}
	if(subt==''){subt=0;}
	if(nhif==''){nhif=0;}
	if(com==''){com=0;}
	if(com2==''){com2=0;}
	if(cash==''){cash=0;}
	if(disc==''){disc=0;}
	if(deptotal==''){deptotal=0;}
	if(mulacc==''){mulacc=0;}
	
	var a=parseInt(adm,10)  + parseInt(bed,10) + parseInt(doc1,10) + parseInt(doc2,10) + parseInt(doc3,10) + parseInt(oth,10) + parseInt(subt,10);
	var b=parseInt(nhif,10)  + parseInt(com,10)  + parseInt(com2,10) + parseInt(cash,10) + parseInt(disc,10) + parseInt(mulacc,10) ;
	var c=parseInt(a,10) - parseInt(b,10);
	
	c=(c).formatMoney(2, '.', ',');
	a=(a).formatMoney(2, '.', ',');
	$('#subtotal').val(a);
	$('#losstotal').val(c);

	
}

function submitinfinal(){
var name =  $('#oname').val(); 
var regn =  $('#regn').val();
var adm = $('#admtotal').val();
var bfrom = $('#fromdate').val();
var bto = $('#todate').val();
var bday = $('#perday').val();
var bed = $('#bedtotal').val();
var btype = $('#btype').val();


var hf1 = $('#hosfee1').val();
var dn1 = $('#docname1').val();
var dt1 =  $('#doctotal1').val();
var hf2 = $('#hosfee2').val();
var dn2 = $('#docname2').val();
var dt2 =  $('#doctotal2').val();
var hf3 = $('#hosfee3').val();
var dn3 = $('#docname3').val();
var dt3 =  $('#doctotal3').val();
var otdesc =  $('#otdesc').val();
var ottotal = $('#othertotal').val();


var str = $('#compay').val();
var parts=str.split('θ',2)
var insid=parts[0];
var insname=parts[1];
if(insname==null){insname=0}
var str = $('#compaytwo').val();
var parts=str.split('θ',2)
var insid2=parts[0];
var insname2=parts[1];
if(insname2==null){insname2=0}
var mula = $('#mulabnkacc').val();
var mparts=mula.split('θ',2)
var mulabkaccid=mparts[0];
var mulabkaccname=mparts[1];
if(mulabkaccid==null){mulabkaccname=0}
var deptotal =  $('#deptotal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var subtotal =  $('#subtotal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var claimno =  $('#claimno').val();
var nhiftotal =  $('#nhiftotal').val();
var comtotal =  $('#comtotal').val();
var com2total =  $('#com2total').val();
var cashtotal =  $('#cashtotal').val();
var disctotal =  $('#disc44').val();
var losstotal =  $('#losstotal').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var old_patient_id = $('#old_patient_id').val();
var old_presc_id = $('#old_presc_id').val();
var mulacctotal = $('#mulacctotal').val();//mpesabartotal
var claim_reference_no = $('#claim_reference_no').val();
var reference_no = $('#reference_no').val();
var reference2_no = $('#reference2_no').val();
var usr_cashacc_no = $('#usr_cashacc_no').val();
var usr_cashacc_name = $('#usr_cashacc_name').val();
var paciente_interno = $('#paciente_interno').val();


if((comtotal!=''||com2total!='')&&insid==''||insid2==''){
		$().customAlert();
		alert('Error!', '<p>Select the Paying Company!</p>');
		e.preventDefault();
		return;
}
if((comtotal!=''||com2total!='')&&reference_no==''||reference2_no==''){
		$().customAlert();
		alert('Error!', '<p>Card number is required!</p>');
		e.preventDefault();	
		return;
}
if((mulacctotal!='')&&claim_reference_no==''){
		$().customAlert();
		alert('Error!', '<p>Mpesa Reference number is required!</p>');
		e.preventDefault();	
		return;
}

$.confirm({
			'title'		: 'Submit Patient Bill Confirmation',
			'message'	: 'You are about to submit this bill to the cashier.No changes can be made to the bill after this! Continue?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
		$('#newstudent').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:121,name:name,regn:regn,adm:adm,bfrom:bfrom,bto:bto,bday:bday,bed:bed,hf1:hf1,dn1:dn1,dt1:dt1,hf2:hf2,dn2:dn2,dt2:dt2,hf3:hf3,dn3:dn3,dt3:dt3,otdesc:otdesc,ottotal:ottotal,subtotal:subtotal,claimno:claimno,nhiftotal:nhiftotal,com2total:com2total,comtotal:comtotal,cashtotal:cashtotal,losstotal:losstotal,insid:insid,insname:insname,insid2:insid2,insname2:insname2,disctotal:disctotal,btype:btype,deptotal:deptotal,old_patient_id:old_patient_id,old_presc_id:old_presc_id,mulacctotal:mulacctotal,claim_reference_no:claim_reference_no,reference_no:reference_no,reference2_no:reference2_no,usr_cashacc_no:usr_cashacc_no,usr_cashacc_name:usr_cashacc_name,mulabkaccid:mulabkaccid,mulabkaccname:mulabkaccname,paciente_interno:paciente_interno},
		success:function(data){
		$('#newstudent').html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		

}
function previewinfinal(){
var regn =  $('#regn').val();
var pid =  $('#old_presc_id').val();
var cid =  $('#old_patient_id').val();
window.open("report.php?id=40&regn=" +  regn + '&' + "\ncid=" + cid + '&' + "\npid=" + pid);
}
function varsum(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'92'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function varsum2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'92.1'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function lposumm(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:'92.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function patlist(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'73.2'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function inpatlist(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'73.3'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function pharmdisp(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'73.4'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterpharmdisp(){
a=0;
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#dispcat').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Select the Category!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("output.php?id=17&code=" + a + '&' + "\nname=" + name);
	
}
else {window.open("output.php?id=17&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
function viewinp(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:128,to:95},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function hideip(a){
	if(a==0){ $('#ip').hide();}else{$('#ip').show();}
}

$("#item45" ).combobox({
   select: function(event,ui){
    var str = $('#item45').val();
    var parts=str.split('θ',18);
    //$('#price45').val(parts[0]);
    $('#red45').val(parts[1]);
    $('#code45').val(parts[2]);
    $('#categ45').val(parts[3]);
    $('#bal45').val(parts[4]);
    $('#type45').val(parts[5]);
    $('#txtcatid45').val(parts[6]);
    $('#txtprcorporate45').val(parts[7]);
    $('#txtprinsurance45').val(parts[8]);
    $('#txtcoverage').val(parts[9]);

	 	if(parts[9]=='NO'){
	 		if($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26){
				$().customAlert();
				alert('Error!', '<p>This item is not covered!</p>');
				$('#txtcoverage').val('');
				return;	
			}
	 	}

     if($('#quat45').val()!=''){
        var txtqty = $('#quat45').val();

		      if($('#txtacctype').val()=='Insurance'){
	            $('#price45').val(parts[8]);
	            var tot=parts[8] * txtqty;
	         }else if($('#txtacctype').val()=='Corporate'){
	            $('#price45').val(parts[7]);
	            var tot=parts[7] * txtqty;
	         }else if($('#txtacctype').val()=='OTC'){
	             $('#price45').val(parts[10]);
	             var tot=parts[10] * txtqty;
	         }else if($('#txtacctype').val()=='APA'){
	             $('#price45').val(parts[11]);
	             var tot=parts[11] * txtqty;
	         }else if($('#txtacctype').val()=='Pacis'){
	             $('#price45').val(parts[12]);
	             var tot=parts[12] * txtqty;
	         }else if($('#txtacctype').val()=='Liason'){
	             $('#price45').val(parts[13]);
	             var tot=parts[13] * txtqty;
	         }else if($('#txtacctype').val()=='OldMutual'){
	             $('#price45').val(parts[14]);
	             var tot=parts[14] * txtqty;
	         }else if($('#txtacctype').val()=='KplcMinet'){
	             $('#price45').val(parts[15]);
	             var tot=parts[15] * txtqty;
	         }else if($('#txtacctype').val()=='MaklMaternity'){
	             $('#price45').val(parts[16]);
	             var tot=parts[16] * txtqty;
	         }else if($('#txtacctype').val()=='MinetCivilServants'){
	             $('#price45').val(parts[17]);
	             var tot=parts[17] * txtqty;
	         }else{
	            $('#price45').val(parts[0]);
	            var tot=parts[0] * txtqty;
	         }

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
			 	 var totsumcoverd = $('#totalcoverage786').val();
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);
		    }

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()!=''){
			 	 var totsumcoverd = $('#totalcoverage786').val();
			 	 var totsumcoverd2 = $('#txttotalcoverage786').val(); 	
			 	 var totsumcoverd254 = parseInt(totsumcoverd2,10) + (tot);	
		    }

	 	   $('#txttotalcoverage786').val(totsumcoverd254);

        if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Insurance')&&(parts[8]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Corporate')&&(parts[7]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[7] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OTC')&&(parts[10]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='APA')&&(parts[11]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Pacis')&&(parts[12]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Liason')&&(parts[13]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OldMutual')&&(parts[14]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='KplcMinet')&&(parts[15]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[16]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[17]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
        else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Insurance')&&(parts[8]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Corporate')&&(parts[7]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[7] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='OTC')&&(parts[10]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='APA')&&(parts[11]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Pacis')&&(parts[12]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='Liason')&&(parts[13]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='OldMutual')&&(parts[14]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='KplcMinet')&&(parts[15]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[16]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[17]>=1501||totsumcoverd254>=1501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Insurance')&&(parts[8]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Corporate')&&(parts[7]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[7] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OTC')&&(parts[10]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='APA')&&(parts[11]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Pacis')&&(parts[12]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='Liason')&&(parts[13]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='OldMutual')&&(parts[14]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='KplcMinet')&&(parts[15]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[16]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==26)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[17]>=501||totsumcoverd254>=501)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
         else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Insurance')&&(parts[8]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[8] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Corporate')&&(parts[7]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[7] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Normal')&&(parts[0]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[0] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='OTC')&&(parts[10]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[10] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='APA')&&(parts[11]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[11] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Pacis')&&(parts[12]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[12] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='Liason')&&(parts[13]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[13] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='OldMutual')&&(parts[14]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[14] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='KplcMinet')&&(parts[15]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[15] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='MaklMaternity')&&(parts[16]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[16] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }
	      else if(($('#txtinsurer_id').val()==33)&&($('#txtacctype').val()=='MinetCivilServants')&&(parts[17]>=1001||totsumcoverd254>=1001)){
		      $().customAlert();
			   alert('Error!', '<p>Limit Reached. Total Invoice: '+ totsumcoverd254 +'/=.<br/> Unit Price: '+ parts[17] +'/=.</p>');
			   $('#txttotalcoverage786').val(totsumcoverd2);
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
	      }



	      else{

			   if(($('#txtinsurer_id').val()==20||$('#txtinsurer_id').val()==26)&&(totsumcoverd254>=501)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
					clrultrasound_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#txtinsurer_id').val()==26)&&(totsumcoverd254>=501)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
					clrultrasound_txtboxes_after_invalid_bill_notification();
					return;	
			   }

			   if(($('#txtinsurer_id').val()==2||$('#txtinsurer_id').val()==8)&&(totsumcoverd254>=1501)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
					clrultrasound_txtboxes_after_invalid_bill_notification();
					return;	
			   }
			   if(($('#txtinsurer_id').val()==33)&&(totsumcoverd254>=1001)){
			      $().customAlert();
			   	alert('Error!', '<p>Limit Reached. Bill: '+ totsumcoverd254 +'/=.</p>');
					clrultrasound_txtboxes_after_invalid_bill_notification();
					return;	
			   }

			   //addbill3('rad',0);


	      }
         sot=(tot).formatMoney(2, '.', ',');
         $('#tprice45').val(sot);
         $('#sub45').val(sot);
			addbill3('rad',0);
      }


   	$('#quat45').focus();
   
    }
});

$("#appcorder790" ).combobox({
   select: function(event,ui){
    var str = $('#appcorder790').val();
    var parts=str.split('θ',18);
    $('#red45').val(parts[1]);
    $('#code45').val(parts[2]);
    $('#categ45').val(parts[3]);
    $('#bal45').val(parts[4]);
    $('#type45').val(parts[5]);
    $('#txtcatid45').val(parts[6]);
    $('#txtprcorporate45').val(parts[7]);
    $('#txtprinsurance45').val(parts[8]);
    $('#txtcoverage').val(parts[9]);
	 var ttcover786 =  $('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
    var totsumcoverd254 =  $('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
    if(totsumcoverd254==''){ totsumcoverd254 = ttcover786; } 

     if($('#quat45').val()!=''){
         var txtqty = $('#quat45').val();
	      if($('#txtacctype').val()=='Insurance'){
            $('#price45').val(parts[8]);
            var tot=parts[8] * txtqty;
         }else if($('#txtacctype').val()=='Corporate'){
            $('#price45').val(parts[7]);
            var tot=parts[7] * txtqty;
         }else{
            $('#price45').val(parts[0]);
            var tot=parts[0] * txtqty;
         }

		    if($('#totalcoverage786').val()!=''&&$('#txttotalcoverage786').val()==''){
			 	 var totsumcoverd = $('#totalcoverage786').val();
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);
			 	 $('#txttotalcoverage786').val(totsumcoverd254);
		    }else{
				 var totsumcoverd    = $('#txttotalcoverage786').val();    
			 	 var totsumcoverd254 = parseInt(totsumcoverd,10) + (tot);	
		    }

         sot=(tot).formatMoney(2, '.', ',');
         $('#tprice45').val(sot);
         $('#sub45').val(sot);
      }


   	$('#quat45').focus();
   
    }
});
$(document).ready(function(){
	$('#quat45').keyup(function() {
	var price = $('#price45').val();
	var quat = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var disc = $('#disc45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(disc==''){
	disc=0;	
	}
	var sot=price * quat;
	var tot=parseInt(sot,10) - parseInt(disc,10);
	var sot=(sot).formatMoney(2, '.', ',');
	$('#tprice45').val(sot);
	tot=(tot).formatMoney(2, '.', ',');
	$('#sub45').val(tot);
	});
});

$(document).ready(function(){
	$('#price45').keyup(function() {
	var quat = $('#quat45').val();
	var price = $(this).val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var disc = $('#disc45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(disc==''){
	disc=0;	
	}
	var sot=price * quat;
	var tot=parseInt(sot,10) - parseInt(disc,10);
	var sot=(sot).formatMoney(2, '.', ',');
	$('#tprice45').val(sot);
	tot=(tot).formatMoney(2, '.', ',');
	$('#sub45').val(tot);
	});
});
$(document).ready(function(){
	$('#disc45').keyup(function() {
	var tprice = $('#tprice45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var disc = $(this).val();
	if(disc==''){
	disc=0;	
	}
	var tot=parseInt(tprice,10) - parseInt(disc,10);
	tot=(tot).formatMoney(2, '.', ',');
	$('#sub45').val(tot);
	});
});

function addbill3(a,b){
var price = $('#price45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tprice = $('#tprice45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var quat = $('#quat45').val();
var disc = $('#disc45').val();
var subn = $('#sub45').val();
var iid = $('#income45').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#bal45').val();
if(bal==''){bal=0}
var type = $('#type45').val();
var code = $('#code45').val();
var name =  $('#red45').val();
var categ =  $('#categ45').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var txtcatid= $('#txtcatid45').val();
var dept4rm = $('#dept4rm').val();
var txtcoverage = $('#txtcoverage').val();
var txtinsurer_id = $('#txtinsurer_id').val();
var total =  $('#total45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
//var ttcover786 = parseInt($('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
var ttcover786 = $('#totalcoverage786').val();
var totsumcoverd254 = parseInt($('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);

//var totrad          = parseInt(totradtst,10) + parseInt(price,10);

var capbill = parseInt($('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);


if(price==''){
$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
		clrultrasound_txtboxes_after_invalid_bill_notification();
	$('#item45').parent().find("input:first").focus();	
	return;	
}
else if(code==''||name==''){
		$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
		clrultrasound_txtboxes_after_invalid_bill_notification();
	   $('#item45').parent().find("input:first").focus();	
		return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat45').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat45').focus();	
		return;	
}
else if($('#oname').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();
		return;	
	}

else{
	if(dept4rm=='OPD'){
			if((txtinsurer_id==20||txtinsurer_id==26)&&(price>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Price should be 500/= or less. Price: '+ price +'/=.</p>');
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(capbill>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=. B4 : '+ totcover78 +'/=.</p>');
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==20||txtinsurer_id==26)&&(totsumcoverd254>=501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 500/= or less. Total Bill: '+ capbill +'/=.</p>');
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(price>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Price should be 1500/= or less. Price: '+ price +'/=.</p>');
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(capbill>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 1500/= or less. Total Bill: '+ capbill +'/=. B4: '+ totsumcoverd254 +'/=. </p>');
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else if((txtinsurer_id==2||txtinsurer_id==8)&&(totsumcoverd254>=1501)){
			   $().customAlert();
			   alert('Error!', '<p>Invalid Bill. Bill should be 1500/= or less. Total Bill: '+ capbill +'/=. B4: '+ totsumcoverd254 +'/=. </p>');
				clrultrasound_txtboxes_after_invalid_bill_notification();
				return;	
			}
			else{
			   $('#display45').html(loader);
			   $.ajax({
				url:'bridge.php',
				data:{id:'131.2',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,totalcoverage786:capbill},
					success:function(data){
						$('#display45').html(data);
					}
				});	
	     }
	}
	else{	
	   $('#display45').html(loader);
	   $.ajax({
		url:'bridge.php',
		data:{id:'131.2',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,totalcoverage786:capbill},
			success:function(data){
				$('#display45').html(data);
			}
		});
	}
	clrultrasound_txtboxes_after_invalid_bill_notification();
   }
}

function addorder790(a,b){
var price = $('#price45').val();
var tprice = $('#tprice45').val();
var quat = $('#quat45').val();
var disc = $('#disc45').val();
var subn = $('#sub45').val();
var iid = $('#income45').val();
var dat = $('#datepick').val();
if(dat==''){dat=0;}
var bal = $('#bal45').val();
if(bal==''){bal=0}
var type = $('#type45').val();
var code = $('#code45').val();
var name =  $('#red45').val();
var categ =  $('#categ45').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var txtcatid= $('#txtcatid45').val();
var dept4rm = $('#dept4rm').val();
var txtcoverage = $('#txtcoverage').val();
var txtinsurer_id = $('#txtinsurer_id').val();
var total =  $('#total45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var totradtst  = parseInt($('#total45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
var ttcover786 = parseInt($('#totalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
var capbill = parseInt($('#total45').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);
var totsumcoverd254 = parseInt($('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);

var totcover78      = parseInt(ttcover786,10) + parseInt(totradtst,10);
var totrad          = parseInt(totradtst,10) + parseInt(price,10);
var capbill = parseInt($('#txttotalcoverage786').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''),10);


if(price==''){
$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
	$('#appcorder790').parent().find("input:first").focus();	
	return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat45').focus();	
		return;	
}
else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat45').focus();	
		return;	
}
else if($('#oname').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();
		return;	
	}

else{
   $('#display45').html(loader);
   $.ajax({
	url:'bridge.php',
	data:{id:'131.2',iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat,txtcatid:txtcatid,totalcoverage786:ttcover786},
		success:function(data){
			$('#display45').html(data);
		}
	});	
	clrultrasound_txtboxes_after_invalid_bill_notification();
   }
}
function ccc(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:78},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function counselling(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:88},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function nutrition(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:88},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function bankdepp(){	
		$("#mainp").html(loader);
		$.ajax({
				url:'./link.php',
				data:{id:'125'},
				success:function(data){
						$('#mainp').html(data);
						$('#banktrans_transdate').datepicker();
						$("#banktrans_action" ).combobox({
								select: function(event,ui){
										var banktransAction=$('#banktrans_action').find(':selected').val();
										if(banktransAction=='Bank Transfer'){
												$('#banktrans_drledgerdiv').hide();
												$('#uncaptured_banktrans_container').hide();
												$('#banktrans_transferbanks').show();
										}else if(banktransAction=='Uncaptured Bank Deposits'){
											$('#banktrans_transferbanks').hide();
											$('#banktrans_drledgerdiv').show();	
											$('#uncaptured_banktrans_container').show();
										}else{
											$('#banktrans_transferbanks').hide();
											$('#uncaptured_banktrans_container').hide();
											$('#banktrans_drledgerdiv').show();										
										}
										$('#banktrans_subledgerdiv').hide();
										$('#banktrans_source_subledgerdiv').hide();
										$('#banktrans_recipient_subledgerdiv').hide();
										
								}
						});

						$("#banktrans_drledger").combobox({
								select: function(event,ui){
										var selectInpt1=$(this);
										var lid1=selectInpt1.find(':selected').val();
										var sb1=selectInpt1.find(':selected').data('main');
										var mcat1=selectInpt1.find(':selected').data('mcat');
										if(parseInt(sb1)==1){
												$.ajax({
														url:'./r/data.php',
														type:'post',
														dataType:'json',
														data:{src_id:3,lid:lid1,mcat:mcat1},
														success:function(res){
																const inpt1=document.getElementById('banktrans_subledgerid');
																$('#banktrans_subledgerid').html('<option value="">Select an option</option>');
																res.forEach(subledger=>{
																		inpt1.options[inpt1.options.length] = new Option(subledger.name, subledger.ledgerid);
																});
														}
												});
																		
												$('#banktrans_subledgerdiv').show();
										}else{$('#banktrans_subledgerdiv').hide();}

								}
						});

						$("#banktrans_sourceledgerid").combobox({
								select: function(event,ui){
										var selectInpt2=$(this);
										var lid2=selectInpt2.find(':selected').val();
										var sb2=selectInpt2.find(':selected').data('main');
										var mcat2=selectInpt2.find(':selected').data('mcat');
										if(parseInt(sb2)==1){
												$.ajax({
														url:'./r/data.php',
														type:'post',
														dataType:'json',
														data:{src_id:3,lid:lid2,mcat:mcat2},
														success:function(res){
																const inpt2=document.getElementById('banktrans_source_subledgerid');
																$('#banktrans_source_subledgerid').html('<option value="">Select an option</option>');
																res.forEach(subledger=>{
																		inpt2.options[inpt2.options.length] = new Option(subledger.name, subledger.ledgerid);
																});
														}
												});
																		
												$('#banktrans_source_subledgerdiv').show();
										}else{$('#banktrans_source_subledgerdiv').hide();}

								}
						});
						$("#banktrans_recipientledgerid").combobox({
								select: function(event,ui){
										var selectInpt3=$(this);
										var lid3=selectInpt3.find(':selected').val();
										var sb3=selectInpt3.find(':selected').data('main');
										var mcat3=selectInpt3.find(':selected').data('mcat');
										if(parseInt(sb3)==1){
												$.ajax({
														url:'./r/data.php',
														type:'post',
														dataType:'json',
														data:{src_id:3,lid:lid3,mcat:mcat3},
														success:function(res){
																const inpt3=document.getElementById('banktrans_recipient_subledgerid');
																$('#banktrans_recipient_subledgerid').html('<option value="">Select an option</option>');
																res.forEach(subledger=>{
																		inpt3.options[inpt3.options.length] = new Option(subledger.name, subledger.ledgerid);
																});
														}
												});
																		
												$('#banktrans_recipient_subledgerdiv').show();
										}else{$('#banktrans_recipient_subledgerdiv').hide();}

								}
						});

				}
		});
}

function openBankRecon(){	
		$("#mainp").html(loader);
		$.ajax({
			url:'./r/new-bridge.php',
			type:'post',
			data:{src_id:1},
			success:function(data){
					$('#mainp').html(data);
					$("#recon_startdate" ).datepicker();$("#recon_enddate" ).datepicker();
					$(document).on('click','#reconcileBankBtn',function(e){
							var reconBtn=e.target;reconBtn.setAttribute("disabled","disabled");
							var confirmedRecontbl=$("#confirmedrecontbl >tbody");	
									confirmedRecontbl.empty();
							var confirmed_recondiv=$("#confirmed_recondiv");
									confirmed_recondiv.css({'display':'none'});
							var unconfrmdRecontbl=$("#unconfirmedrecontbl >tbody");	
									unconfrmdRecontbl.empty();									
							var unconfirmed_recondiv=$("#unconfirmed_recondiv");
									unconfirmed_recondiv.css({'display':'none'});
							var summary_recondiv=$("#summary_recondiv");
									summary_recondiv.css({'display':'none'});
							var reconsumtotalconfirmed=$('#reconsummarytblconfirmedtotal');
									reconsumtotalconfirmed.empty();
							var reconsumtotalunconfirmed=$('#reconsummarytblunconfirmedtotal');
									reconsumtotalunconfirmed.empty();
							var reconsumtotalBankBal=$('#reconsumrytblbankbaltotal');
									reconsumtotalBankBal.empty();
							var reconbankbalunconfirmedtotal_diff=$('#reconbankbalunconfirmedtotal_diff');
									reconbankbalunconfirmedtotal_diff.empty();									
							var confrmdReconTotal=0;var unconfrmdReconTotal=0;
							var confrmdReconDepositTotal=0;var unconfrmdReconDepositTotal=0;
							var confrmdReconWithdrwTotal=0;var unconfrmdReconWithdrwTotal=0;
							var reconTxns=[];
							var recontrs=$("#bank_recontbl >tbody").find('tr');
									recontrs.each(function(){
											var recontr=$(this);
											var recontds=recontr.children('td');
											if(recontds.length==10){
													var reconInpt=recontr.find(':input[type="checkbox"][name="bank_reconcb"]');
													var reconamt=reconInpt.data('amt');
													var reconNoteInpt=recontr.find(':input[type="text"][name="reconcnote"]');
													var reconNote=reconNoteInpt.val();
													var reconNoteId=reconNoteInpt.data('transid');
													var bankid=reconNoteInpt.data('bankid');
													if(reconInpt.is(':checked')){
															confrmdReconTotal+=parseFloat(reconamt);
															confrmdReconDepositTotal+=parseFloat(recontds.eq(6).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));
															confrmdReconWithdrwTotal+=parseFloat(recontds.eq(5).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));
															confirmedRecontbl.append(`<tr><td>${recontds.eq(0).text()}</td> <td>${recontds.eq(1).text()}</td><td>${recontds.eq(2).text()}</td><td>${recontds.eq(3).text()}</td><td>${recontds.eq(4).text()}</td><td>${recontds.eq(5).text()}</td><td>${recontds.eq(6).text()}</td> <td>${recontds.eq(7).text()}</td> <td>${reconNote} </td> </tr>`);
															reconTxns.push({'transid':reconNoteId,'bankid':bankid,'reconnote':reconNote });
															reconTxns.push({'transid':reconNoteId,'bankid':bankid,'confirmed':1,'reconnote':reconNote });
													}else{
															unconfrmdReconTotal+=parseFloat(reconamt);
															unconfrmdReconDepositTotal+=parseFloat(recontds.eq(6).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));
															unconfrmdReconWithdrwTotal+=parseFloat(recontds.eq(5).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));													
															unconfrmdRecontbl.append(`<tr><td>${recontds.eq(0).text()}</td> <td>${recontds.eq(1).text()}</td><td>${recontds.eq(2).text()}</td><td>${recontds.eq(3).text()}</td><td>${recontds.eq(4).text()}</td><td>${recontds.eq(5).text()}</td><td>${recontds.eq(6).text()}</td> <td>${recontds.eq(7).text()} </td> <td> ${reconNote}  </td> </tr>`);
															reconTxns.push({'transid':reconNoteId,'bankid':bankid,'confirmed':0,'reconnote':reconNote });
													}
											}		
									});							
									confirmed_recondiv.find('#confirmedrecontblwithdrawtotal').text(parseFloat(confrmdReconWithdrwTotal).formatMoney(2,'.',','));
									$('#rconsumryconfirmeddeposittotal').text(parseFloat(confrmdReconDepositTotal).formatMoney(2,'.',','));
									confirmed_recondiv.find('#confirmedrecontbldepositbaltotal').text(parseFloat(confrmdReconDepositTotal).formatMoney(2,'.',','));
									$('#rconsumryconfirmedwithdrwtotal').text(parseFloat(confrmdReconWithdrwTotal).formatMoney(2,'.',','));
									unconfirmed_recondiv.find('#unconfirmedrecontblwithdrawtotal').text(parseFloat(unconfrmdReconWithdrwTotal).formatMoney(2,'.',','));
									$('#rconsumryunconfirmedwithdrwtotal').text(parseFloat(unconfrmdReconWithdrwTotal).formatMoney(2,'.',','));
									unconfirmed_recondiv.find('#unconfirmedrecontbldepositbaltotal').text(parseFloat(unconfrmdReconDepositTotal).formatMoney(2,'.',','));
									$('#rconsumryunconfirmeddeposittotal').text(parseFloat(unconfrmdReconDepositTotal).formatMoney(2,'.',','));
									confirmed_recondiv.css({'display':'block'});unconfirmed_recondiv.css({'display':'block'});
									var confrmdReconTotalBal=parseFloat(confrmdReconDepositTotal)-parseFloat(confrmdReconWithdrwTotal);
									reconsumtotalconfirmed.text(parseFloat(confrmdReconTotalBal).formatMoney(2,'.',','));
									var unconfrmdReconTotalBal=parseFloat(unconfrmdReconDepositTotal)-parseFloat(unconfrmdReconWithdrwTotal);
									reconsumtotalunconfirmed.text(parseFloat(unconfrmdReconTotalBal).formatMoney(2,'.',','));
									var bank_bal=$('#recon_userbankbal_inpt').val();
									$('#bank_balh4').text(parseFloat(bank_bal).formatMoney(2,'.',','));
									$('#unconfirmed_balh4').text(parseFloat(unconfrmdReconTotalBal).formatMoney(2,'.',','));
									if(parseFloat(unconfrmdReconTotalBal)<0){
											var newdiff=parseFloat(bank_bal)+parseFloat(unconfrmdReconTotalBal);
									}else{
											var newdiff=parseFloat(bank_bal)-parseFloat(unconfrmdReconTotalBal);
									}
									$('#bankbal_unconfirmedbal_diffh4').text(parseFloat(newdiff).formatMoney(2,'.',','));
									summary_recondiv.css({'display':'block'});
									if(reconTxns.length>0){
											$.ajax({
													url:'./r/data.php',
													type:'post',
													data:{src_id:5,reconTxns:JSON.stringify(reconTxns)},
													success:function(resp){
															//console.log(resp);
													}	
											});
									}
							if(document.getElementById('printreconreport_btn').hasAttribute('disabled')){
									document.getElementById('printreconreport_btn').removeAttribute('disabled');
							}
					});
					$(document).on('click',':input[type="checkbox"][name="bank_reconcb"]',function(e){
							document.getElementById('reconcileBankBtn').removeAttribute('disabled');
					});
					$('.ui-datepicker-title').addClass('text-white');
					// $('#printreconreport_btn').on('click',function(e){
					// 		e.preventDefault();
					// 		$('#bankreconrprt_html').val($('#print_recon_rpt').html());
					// 		$('#printreconrprt_form').submit();

					// });

			}
		});

}

$(document).on('click','#printreconreport_btn',function(e){
	e.preventDefault();
	$('#bankreconrprt_html').val($('#print_recon_rpt').html());
	$('#printreconrprt_form').submit();

});

function bankReconSearch(){	
		var recontbl=$("#bank_recontbl >tbody");	
				recontbl.html(loader);
		$("#confirmed_recondiv").css({'display':'none'});
		$("#unconfirmed_recondiv").css({'display':'none'});
		$("#confirmedrecontbl >tbody").empty();
		$("#unconfirmedrecontbl >tbody").empty();
		var reconContainer=$("#recon_container");
		var recon_searchbank=$("#recon_searchbank").find(':selected').val();
		var recon_searchdispfilter=$("#recon_searchdispfilter").find(':selected').val();
		//var recon_searchname=$("#recon_searchbank").find(':selected').text();
		var recon_startdate=reconContainer.find('#recon_startdate').val(),
				recon_enddate=reconContainer.find('#recon_enddate').val();
		// $('#recon_bank_title').text(`${recon_searchname.toUpperCase()} RECONCILITION SUMMARY`);
		// $('#recon_period_title').text(`PERIOD: ${recon_startdate} TO ${recon_enddate}`);
		$.ajax({
			url:'./r/new-bridge.php',
			type:'post',
			dataType:'json',
			data:{src_id:2,recon_startdate:recon_startdate,recon_enddate:recon_enddate,recon_searchbank:recon_searchbank,recon_searchdispfilter:recon_searchdispfilter},
			success:function(res){
					recontbl.html(res.tbl);
					$('#recon_localbankopeningbal').val(res.opening_bal);
					$('#recontitle_paragraph').text(`${res.recon_searchbankname.toUpperCase()} RECONCILITION FOR PERIOD: ${recon_startdate} TO ${recon_enddate}`);
					$(document).on('click','#reconcileBankBtn',function(e){
							var reconBtn=e.target;reconBtn.setAttribute("disabled","disabled");
							var confirmedRecontbl=$("#confirmedrecontbl >tbody");	
									confirmedRecontbl.empty();
							var confirmed_recondiv=$("#confirmed_recondiv");
									confirmed_recondiv.css({'display':'none'});
							var unconfrmdRecontbl=$("#unconfirmedrecontbl >tbody");	
									unconfrmdRecontbl.empty();									
							var unconfirmed_recondiv=$("#unconfirmed_recondiv");
									unconfirmed_recondiv.css({'display':'none'});
							var summary_recondiv=$("#summary_recondiv");
									summary_recondiv.css({'display':'none'});
							var reconsumtotalconfirmed=$('#reconsummarytblconfirmedtotal');
									reconsumtotalconfirmed.empty();
							var reconsumtotalunconfirmed=$('#reconsummarytblunconfirmedtotal');
									reconsumtotalunconfirmed.empty();
							var confrmdReconTotal=0;var unconfrmdReconTotal=0;
							var confrmdReconDepositTotal=0;var unconfrmdReconDepositTotal=0;
							var confrmdReconWithdrwTotal=0;var unconfrmdReconWithdrwTotal=0;
							var reconTxns=[];
							var recontrs=$("#bank_recontbl >tbody").find('tr');
									recontrs.each(function(){
											var recontr=$(this);
											var recontds=recontr.children('td');
											if(recontds.length==10){
													var reconInpt=recontr.find(':input[type="checkbox"][name="bank_reconcb"]');
													var reconamt=reconInpt.data('amt');
													var reconNoteInpt=recontr.find(':input[type="text"][name="reconcnote"]');
													var reconNote=reconNoteInpt.val();
													var reconNoteId=reconNoteInpt.data('transid');
													var bankid=reconNoteInpt.data('bankid');
													if(reconInpt.is(':checked')){
															confrmdReconTotal+=parseFloat(reconamt);
															confrmdReconDepositTotal+=parseFloat(recontds.eq(6).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));
															confrmdReconWithdrwTotal+=parseFloat(recontds.eq(5).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));
															confirmedRecontbl.append(`<tr><td>${recontds.eq(0).text()}</td> <td>${recontds.eq(1).text()}</td><td>${recontds.eq(2).text()}</td><td>${recontds.eq(3).text()}</td><td>${recontds.eq(4).text()}</td><td>${recontds.eq(5).text()}</td><td>${recontds.eq(6).text()}</td> <td>${recontds.eq(7).text()}</td> <td>${reconNote} </td> </tr>`);
															reconTxns.push({'transid':reconNoteId,'bankid':bankid,'confirmed':1,'reconnote':reconNote });
													}else{
															unconfrmdReconTotal+=parseFloat(reconamt);
															unconfrmdReconDepositTotal+=parseFloat(recontds.eq(6).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));
															unconfrmdReconWithdrwTotal+=parseFloat(recontds.eq(5).text().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,''));													
															unconfrmdRecontbl.append(`<tr><td>${recontds.eq(0).text()}</td> <td>${recontds.eq(1).text()}</td><td>${recontds.eq(2).text()}</td><td>${recontds.eq(3).text()}</td><td>${recontds.eq(4).text()}</td><td>${recontds.eq(5).text()}</td><td>${recontds.eq(6).text()}</td> <td>${recontds.eq(7).text()} </td> <td> ${reconNote}  </td> </tr>`);
															reconTxns.push({'transid':reconNoteId,'bankid':bankid,'confirmed':0,'reconnote':reconNote });
													}
											}
									});							
									confirmed_recondiv.find('#confirmedrecontblwithdrawtotal').text(parseFloat(confrmdReconWithdrwTotal).formatMoney(2,'.',','));
									$('#rconsumryconfirmeddeposittotal').text(parseFloat(confrmdReconDepositTotal).formatMoney(2,'.',','));
									confirmed_recondiv.find('#confirmedrecontbldepositbaltotal').text(parseFloat(confrmdReconDepositTotal).formatMoney(2,'.',','));
									$('#rconsumryconfirmedwithdrwtotal').text(parseFloat(confrmdReconWithdrwTotal).formatMoney(2,'.',','));
									unconfirmed_recondiv.find('#unconfirmedrecontblwithdrawtotal').text(parseFloat(unconfrmdReconWithdrwTotal).formatMoney(2,'.',','));
									$('#rconsumryunconfirmedwithdrwtotal').text(parseFloat(unconfrmdReconWithdrwTotal).formatMoney(2,'.',','));
									unconfirmed_recondiv.find('#unconfirmedrecontbldepositbaltotal').text(parseFloat(unconfrmdReconDepositTotal).formatMoney(2,'.',','));
									$('#rconsumryunconfirmeddeposittotal').text(parseFloat(unconfrmdReconDepositTotal).formatMoney(2,'.',','));
									confirmed_recondiv.css({'display':'block'});unconfirmed_recondiv.css({'display':'block'});
									var confrmdReconTotalBal=parseFloat(confrmdReconDepositTotal)-parseFloat(confrmdReconWithdrwTotal);
									reconsumtotalconfirmed.text(parseFloat(confrmdReconTotalBal).formatMoney(2,'.',','));
									var unconfrmdReconTotalBal=parseFloat(unconfrmdReconDepositTotal)-parseFloat(unconfrmdReconWithdrwTotal);
									reconsumtotalunconfirmed.text(parseFloat(unconfrmdReconTotalBal).formatMoney(2,'.',','));
									var bank_bal=$('#recon_userbankbal_inpt').val();
									$('#bank_balh4').text(parseFloat(bank_bal).formatMoney(2,'.',','));
									$('#unconfirmed_balh4').text(parseFloat(unconfrmdReconTotalBal).formatMoney(2,'.',','));
									if(parseFloat(unconfrmdReconTotalBal)<0){
											var newdiff=parseFloat(bank_bal)+parseFloat(unconfrmdReconTotalBal);
									}else{
											var newdiff=parseFloat(bank_bal)-parseFloat(unconfrmdReconTotalBal);
									}									
									$('#bankbal_unconfirmedbal_diffh4').text(parseFloat(newdiff).formatMoney(2,'.',','));
									summary_recondiv.css({'display':'block'});
									if(reconTxns.length>0){
											$.ajax({
													url:'./r/data.php',
													type:'post',
													data:{src_id:5,reconTxns:JSON.stringify(reconTxns)},
													success:function(resp){
															console.log(resp);
													}	
											});
									}
							if(document.getElementById('printreconreport_btn').hasAttribute('disabled')){
									document.getElementById('printreconreport_btn').removeAttribute('disabled');
							}
									
					});
					$(document).on('click',':input[type="checkbox"][name="bank_reconcb"]',function(e){
							document.getElementById('reconcileBankBtn').removeAttribute('disabled');
					});
					// $('#printreconreport_btn').on('click',function(e){
					// 		e.preventDefault();
					// 		$('#bankreconrprt_html').val($('#print_recon_rpt').html());
					// 		$('#printreconrprt_form').submit();

					// });


			}
		});

}

// $(document).on('click','#printreconreport_btn',function(e){
// 	e.preventDefault();
// 	$('#bankreconrprt_html').val($('#print_recon_rpt').html());
// 	$('#printreconrprt_form').submit();

// });

function savebankdepp(){
		var banktrans_drledgerid=$('#banktrans_drledger').find(':selected').val();
		var banktrans_drledgername=$('#banktrans_drledger option:selected').text();
		var banktrans_sourceledgerid=$('#banktrans_sourceledgerid').find(':selected').val();
		var banktrans_recipientledgerid=$('#banktrans_recipientledgerid').find(':selected').val();
		var banktrans_amount=$('#banktrans_amount').val();
		var banktrans_desc=$('#banktrans_desc').val();
		var banktrans_transdate=$('#banktrans_transdate').val();
		var banktrans_action=$('#banktrans_action').find(':selected').val();
		var banktrans_refno=$('#banktrans_refno').val();		
		var banktrans_subledgerid=$('#banktrans_sourceledgerid').find(':selected').val();
		var banktrans_source_subledgerid=$('#banktrans_source_subledgerid').find(':selected').val();
		var banktrans_recipient_subledgerid=$('#banktrans_recipient_subledgerid').find(':selected').val();
		var uncaptured_banktrans_debtorid=$('#uncaptured_banktrans_debtorid').find(':selected').val();
		var uncaptured_banktrans_departmentid=$('#uncaptured_banktrans_departmentid').find(':selected').val();

		if(banktrans_amount==''||banktrans_refno==''||banktrans_transdate==''){
				$().customAlert();
						alert('Error', '<p>All the fields are required</p>');
						return false;
		}
		if(banktrans_drledgerid=='' && banktrans_action!=='Bank Transfer'){
				$().customAlert();
						alert('Error', '<p>Please select a bank account and try again</p>');
				return false;
		}else if(parseFloat(banktrans_amount)==0 || parseFloat(banktrans_amount)<0){
				$().customAlert();
					alert('Error', '<p>Enter amount to post</p>');
				return false;
		}else if((banktrans_action=='Bank Transfer' && (banktrans_sourceledgerid=='' || banktrans_recipientledgerid=='')) ){
				$().customAlert();
					alert('Error', '<p>Please select both source and recipient bank</p>');
				return false;
		}else if((banktrans_action=='Bank Transfer' && (banktrans_sourceledgerid==banktrans_recipientledgerid)) ){
				$().customAlert();
					alert('Error', '<p>You cannot transfer to the same bank account </p>');
				return false;
		}else if((banktrans_action=='Uncaptured Bank Deposits' && (uncaptured_banktrans_departmentid==uncaptured_banktrans_debtorid)) ){
				$().customAlert();
					alert('Error', '<p>Department and debtor name are required for uncaptured deposits. </p>');
				return false;
		}else{
				$("#postresp").html(loader);
				$.ajax({
						url:'./data.php',
						data:{id:'149',banktrans_drledgerid:banktrans_drledgerid,banktrans_amount:banktrans_amount,banktrans_desc:banktrans_desc,banktrans_drledgername:banktrans_drledgername,banktrans_action:banktrans_action,banktrans_transdate:banktrans_transdate,banktrans_sourceledgerid:banktrans_sourceledgerid,banktrans_refno:banktrans_refno,banktrans_recipientledgerid:banktrans_recipientledgerid,
										banktrans_subledgerid:banktrans_subledgerid,banktrans_source_subledgerid:banktrans_source_subledgerid,banktrans_recipient_subledgerid:banktrans_recipient_subledgerid,uncaptured_banktrans_departmentid:uncaptured_banktrans_departmentid,uncaptured_banktrans_debtorid:uncaptured_banktrans_debtorid},
						success:function(data){
								$('#postresp').html(data);
						}
				});
		}

}
$(document).ready(function(){ 
	$( "#action" ).combobox({
		select: function(event,ui){
			var code = $('#action').val();
			if(code=='Bank Payment'){
			$("#actvexpdiv1").show();
			}
			else if(code=='Cash Deposit'){
			$('#actvexpdiv1').hide();
			}
			else if(code=='Cash Withdrawal'){
			$('#actvexpdiv1').hide();
			}
			else if(code=='Cheque Deposit'){
			$('#actvexpdiv1').hide();
			}
			else if(code=='Bank Transfer'){
			$('#actvexpdiv1').hide();
			}
			else if(code=='RTGS'){
			$('#actvexpdiv1').hide();
			}
			
			
		}
	});
	

});

function waiverrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:96},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterwaiverrep(){
	var a=0;
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	if(view==null){view=0}
	if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
	}
	else if(view==1){
		window.open("output.php?id=21&code=" + a);
	}
	else {window.open("output.php?id=21&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}


function counsrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:97},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function entercounsrep(){
var code = $('#itemname').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("output.php?id=22&code=" + code);
}
else {
	window.open("output.php?id=22&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}
}

function labrep1(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:98},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterlabrep1(){
var a=1;
var code = $('#itemname').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	//window.open("output.php?id=23&code=" + code + '&' + "\na=" + a);
	window.open("report3.php?id=3&code=" + code + '&' + "\na=" + a);
}
else {
	//window.open("output.php?id=23&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
	window.open("report3.php?id=3&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
}
}

function labrep2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:99},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterlabrep2(){
var a=2;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("report3.php?id=3&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("report3.php?id=3&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}

function labrep3(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:100},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterlabrep3(){
var a=3;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("report3.php?id=3&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("report3.php?id=3&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}

function labrep4(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:101},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterlabrep4(){
var a=4;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("report3.php?id=3&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("report3.php?id=3&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}

function labrep5(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:102},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterlabrep5(){
var a=5;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("report3.php?id=3&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("report3.php?id=3&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}
function pntslabrep(){
var a=5;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("report.php?id=70&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("report.php?id=70&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}
function labrep6(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:103},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function todaylabrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:126},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterlabrep6(){
var a=6;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("report3.php?id=3&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("report3.php?id=3&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}

function radrep1(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:104},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterradrep1(){
var a=1;
var code = $('#itemname').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("output.php?id=24&code=" + code + '&' + "\na=" + a);
}
else {
	window.open("output.php?id=24&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
}
}
function radrep2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:105},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$("#currentins2" ).combobox({});
$("#comppaymode" ).combobox({
	select: function(event,ui){
		 var sec = $('#comppaymode').val();
		 if(sec=='Companies'){
		 	$('#companyinc').show();
		 	$('#companyinc2').hide();
		 	var insid = $('#insid').val('');
		 	var insname = $('#insname').val('');
		 	$('#currentins').parent().find('input:first').focus();
		 	//$('#currentins2').parent().find('input:first').focus();
		 }else if(sec=='Bank'){
		 	$('#companyinc').hide();
		 	$('#companyinc2').show();
		 	var insid = $('#insid').val('');
		 	var insname = $('#insname').val('');
		 	//$('#currentins').parent().find('input:first').focus();
		 	$('#currentins2').parent().find('input:first').focus();
		 }else{
		 	$('#companyinc').hide();
		 	$('#companyinc2').hide();
		 	var insid = $('#insid').val('');
		 	var insname = $('#insname').val('');
		}
	 
	}
});

function labincrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:172},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterradrep2(){
var a=2;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("output.php?id=24&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("output.php?id=24&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}

function radrep3(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:106},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterradrep3(){
var a=3;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("output.php?id=24&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("output.php?id=24&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}


function cashiercash_comp_daily(){
	var a=0;	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:190,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function fetchcashcashiersales(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var timer1 = $('#timer1').val();
var timer2 = $('#timer2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=83&code=" + a + '&' + "\nname=" + name + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);
	
}
else {window.open("report.php?id=83&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);}
}

function pharmrep1(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:107},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterpharmrep1(){
var a=1;
var code = $('#itemname').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("outpathistory.php?id=25&code=" + code + '&' + "\na=" + a);
}
else {
	window.open("outpathistory.php?id=25&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
}
}

function pharmrep2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:108},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterpharmrep2(){
var a=2;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("outpathistory.php?id=25&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("outpathistory.php?id=25&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}

function bydeptcustomrep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:17},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function pharmrep3(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridgerep.php',
	data:{id:5},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function enterpharmrep3(){
var a=2;
//var code = "CUSTOM DISPENSING";
var rid = $('#rid').val();
var code = $('#sendto').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("r/in-custom-dispensin.php?id="+ rid +"&code=" + code + '&' + "\na=" + a);
}
else {
	window.open("r/in-custom-dispensin.php?id="+ rid +"&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
}
}

function generatecustombydeptrept(){
var a=2;
//var code = "DEPARTMENTAL CUSTOM PATIENTS";
var name = $('#customsendto').val();
var sendto = $('#customsendto option:selected').text();
//var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if(sendto==''){
	$().customAlert();
		alert('Error!', '<p>No item selected!</p>');
		$('#customsendto').parent().find('input:first').focus();
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("r/in-custom-bydept.php?id=606834&code=" + sendto + '&' + "\na=" + a);
}
else {
	window.open("r/in-custom-bydept.php?id=606834&code=" + sendto + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
}
}

function genOPDVisitCompRept(){
	var a=2;
	var code = "DEPARTMENTAL CUSTOM PATIENTS";
	var sendto = "OPDVisitsComparision";
	var d1 = $('#opd_visit_comparison_yearpicker1').find(':selected').val();
	var d2 = $('#opd_visit_comparison_yearpicker2').find(':selected').val();
	//var view = $('input[name=opd_visit_comparison_viewall]:checked').val();
	var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	if(sendto==''){
		$().customAlert();
			alert('Error!', '<p>No item selected!</p>');
	}
	else if((d1==''||d2=='')){
			$().customAlert();
			alert('Error!', '<p>Select From and To year!</p>');
			e.preventDefault();
	}
	else {
		//window.open("r/in-ovc.php?id=3&code=" + sendto + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
		window.open("r/in-ovc1.php?id=4&code=" + sendto + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
	}

}


function theatreUtilizationReport(){
	var d1 = $('#theatre_utilization_yearpicker1').find(':selected').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var d2 = $('#theatre_utilization_yearpicker2').find(':selected').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if((d1==''||d2=='')){
		alert('Error: Select from and to year!');
		return false;
	}else {
		window.open("r/theatre-utilization-report.php?id=4&d1="+d1+"&d2="+d2);
	}

}

function antenatalAttendanceReport(){
	var d1 = $('#antenatal_attendance_yearpicker1').find(':selected').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var d2 = $('#antenatal_attendance_yearpicker2').find(':selected').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

	if((d1==''||d2=='')){
		alert('Error: Select from and to year!');
		return false;
	}else {
		window.open("r/anc-mch-analysis.php?id=4&d1="+d1+"&d2="+d2);
	}

}



function theatrep1(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:109},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function entertheatrep1(){
var a=1;
var code = $('#itemname').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("output.php?id=26&code=" + code + '&' + "\na=" + a);
}
else {
	window.open("output.php?id=26&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a);
}
}



function theatrep2(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:110},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function entertheatrep2(){
var a=2;
var code = $('#itemname').val();
var code2 = $('#itemname2').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var view = $('input[name=viewall]:checked').val();
var datef=d1.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var tof=d2.replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(parseInt(tof,10)<parseInt(datef,10)){
		$().customAlert();
		alert('Error!', '<p>Please Enter some valid dates!</p>');
		e.preventDefault();
	}
else if(view==1){
	window.open("output.php?id=26&code=" + code + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
else {
	window.open("output.php?id=26&code=" + code + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\na=" + a + '&' + "\ncode2=" + code2);
}
}

function addasset(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'111'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function opdTypeComparision(){
	var a=0;	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:186,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function theatreUtilizationSearch(){
	var a=0;	
	$("#mainp").html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:187,a:a},
		success:function(data){
			$('#mainp').html(data);
		}
	});

}
function antenatalAttendance(){
	var a=0;	
	$("#mainp").html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:188,a:a},
		success:function(data){
			$('#mainp').html(data);
		}
	});

}
function cashiernhifdaily(){
	var a=0;	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:164,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function cashiercashdaily(){
	var a=0;	
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:165,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enternhlfcashiersales(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var insname = $('#insname').val();
var timer1 = $('#timer1').val();
var timer2 = $('#timer2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''||insname==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=72&code=" + a + '&' + "\nname=" + name + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2 + '&' + "\ninsname=" + insname);
	
}
else {window.open("report.php?id=72&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ninsname=" + insname + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);}
}

function entercashcashiersales(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var timer1 = $('#timer1').val();
var timer2 = $('#timer2').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=73&code=" + a + '&' + "\nname=" + name + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);
	
}
else {window.open("report.php?id=73&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);}
}

function setstamp(){
	 var id = $('#assid').val();
	 $('#stamp').val(id);
}

function addnewasset(a){
	var regn=$('#assid').val();
	var name=$('#assname').val();
	var asscat=$('#asscat').val();
	var catname=$('#asscat option:selected').text();
	var vname=$('#vname').val();
	var dop=$('#dop').val();
	var dispdate=$('#dispdate').val();
	var location=$('#location').val();
	var price=$('#price').val();
	var deprate=$('#deprate').val();
	
	if(regn==''||name==''||asscat==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();	
	}
	else{
	removeArea('odetail',area1);
	var odetail=$('#odetail').val();
	addArea('odetail',area1);	
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:141,a:a,regn:regn,name:name,vname:vname,asscat:asscat,dop:dop,dispdate:dispdate,location:location,price:price,deprate:deprate,catname:catname,odetail:odetail},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}
function editasset(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:112,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$( "#ass1" ).combobox({
	select: function(event,ui){
	 var param = $('#ass1').val();
	 var ser = $('#ser').val();
	 if(ser==114){
		 var title='Delete Confirmation';
		 var message='You are about to remove this record from the Database. <br/>This cannot be restored at a later time! Continue?';
			$.confirm({
			'title'		: title,
			'message'	: message,
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){$('#mainp').html('');}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	 
		 
	 }
	 else{
	$("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
	}
});


function findasset(){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:115,param:'default'},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function billchargesheet(a,b){

var price = $('#price44').val();
var tprice = $('#tprice').val();
var quat = $('#quat44').val();
var disc = $('#disc44').val();
var subn = $('#sub44').val();
var iid = $('#income44').val();
var dat = $('#datepick3').val();
if(dat==''){dat=0;}
var bal = $('#bal44').val();
if(bal==''){bal=0}
var type = $('#type44').val();

var code = $('#code').val();
var name =  $('#red').val();
var categ =  $('#categ').val();
var oname =  $('#oname').val(); 
var regn =  $('#regn').val();
var total =  $('#total').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

if(code==''){
$().customAlert();
		alert('Error!', '<p>Select an item!</p>');
	$('#item44').parent().find("input:first").focus();	
	return;	
}
else if(price==''){
$().customAlert();
		alert('Error!', '<p>Enter the price!</p>');
	$('#item44').parent().find("input:first").focus();	
	return;	
}
else if(quat==''){
		$().customAlert();
		alert('Error!', '<p>Enter the quantity!</p>');
		$('#quat44').focus();	
		return;	
}
/*else if((parseInt(quat,10) >parseInt(bal,10) )&&type=='GOOD'){
		$().customAlert();
		alert('Error!', '<p>The quantity entered cannot exceed the balance existing under this Departmental store. Bal is ' + bal + '</p>');
		$('#quat44').focus();	
		return;	
}*/
else if($('#oname').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Fill the name of the patient!</p>');
		$('#oname').focus();	
		return;	
	}
else if($('#datepick3').val() ==''){
	$().customAlert();
		alert('Error!', '<p>Select the Date!</p>');
		$('#datepick3').focus();	
		return;	
	}

else{
	
	
	$('#display').html(loader);
	$.ajax({
		url:'bridge.php',
		data:{id:131,iid:iid,a:a,code:code,name:name,price:price,quat:quat,tprice:tprice,oname:oname,regn:regn,categ:categ,total:total,disc:disc,subn:subn,type:type,dat:dat},
		success:function(data){
			//do something
			$('#display').html(data);
		}
		});
		$("#item44").parent().find("input:first").val('').focus();
		$('#disc44').val('0');	
		$('#price44').val('');
		$('#code').val('');
		$('#quat44').val('');
		 $('#tprice').val('');
		 $('#sub44').val('');
		 $('#income44').val('');
		 $('#datepick3').val('');
}
}

$("#ass2" ).combobox({
	select: function(event,ui){
	 var param = $('#ass2').val();
		paginate(18,param);
	}
});

function assignasset(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:116,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


$( "#ass3" ).combobox({
	select: function(event,ui){
	 var param = $('#ass3').val();
	 var ser = $('#ser').val();
	
	$("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
});

function assignnewasset(){
	var regn=$('#assid').val();
	var name=$('#assname').val();
	var location=$('#location').val();
	var price=$('#price').val();
	var assby=$('#assignby').val();
	var assto=$('#assignto').val();
	var doa=$('#datepick').val();
	var dor=$('#datepick2').val();

	if(assby==''||assto==''||doa==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();	
	}
	else{
	removeArea('odetail',area1);
	var odetail=$('#odetail').val();
	addArea('odetail',area1);	
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:142,regn:regn,name:name,location:location,price:price,assby:assby,assto:assto,doa:doa,dor:dor,odetail:odetail},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}
function returnasset(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:118,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


$( "#ass4" ).combobox({
	select: function(event,ui){
	 var param = $('#ass4').val();
	 var ser = $('#ser').val();
	
	$("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
});

function returnnewasset(assid){
	var regn=$('#assid').val();
	var recby=$('#receivedby').val();
	var dor=$('#datepick2').val();
	var price=$('#price').val();
	var name=$('#assname').val();
	if(recby==''||dor==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();	
	}
	else{
	removeArea('odetail',area1);
	var odetail=$('#odetail').val();
	addArea('odetail',area1);	
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:143,regn:regn,assid:assid,recby:recby,dor:dor,odetail:odetail,price:price,name:name},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}
function dispasset(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:120,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


$( "#ass5" ).combobox({
	select: function(event,ui){
	 var param = $('#ass5').val();
	 var ser = $('#ser').val();
	  if(ser==144){
		 var title='Dispose Confirmation';
		 var message='You are about to dispose this Asset. <br/>This cannot be restored at a later time! Continue?';
			$.confirm({
			'title'		: title,
			'message'	: message,
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$("#mainp").html(loader);
			$.ajax({
				url:'data.php',
				data:{id:144,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){$('#mainp').html('');}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	 
		 
	 }
	 else{
	
	$("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	}
	}
});

function manageasset(assid){
	var price=$('#amount').val();
	var odetail=$('#odetail').val();
	if(odetail==''||price==''){
	$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();	
	}
	else{
	$("#mainp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:145,assid:assid,odetail:odetail,price:price},
	success:function(data){
	$('#mainp').html(data);
	
	}
	});
	}
}

$( ".combos" ).combobox({});

function assetcount(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:122},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


$( "#categ96" ).combobox({
select: function(event,ui){
var dept = $('#categ96').val();
window.open("report.php?id=80&rcptno=" + dept);

 }
});

function asslist(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:123},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

$( "#ass99" ).combobox({
	select: function(event,ui){
	var reg = $('#ass99').val();
	window.open("output.php?id=27&reg=" + reg);
	}
});

function asstrack(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:124},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterasstrack(){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var a = $('#ass97').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("output.php?id=28&reg=" + a);
	
}
else {window.open("output.php?id=28&reg=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}

$( "#ass97" ).combobox({});

/* LOCUMS */

function newloc(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:200},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}



function newextmedic(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:201},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function locregister(){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:204},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function addextmed(a){
	var name = $('#name').val();
	var type = $('#type').val();
	var pos = $('#pos').val();
	var add = $('#add').val();
	var town = $('#towna').val();
	var tel = $('#tel').val();
	var mobile = $('#mobile').val();
	var email = $('#email').val();
	var uname = $('#uname').val();
 	if(name=='' || type=='' || pos=='' || mobile==''){
		$().customAlert();
		alert('Error!', '<p>Enter all required details!</p>');
		e.preventDefault();
	}else{
		$('#res1').html('loader');
		$.ajax({
			url:'hr.php',
			data:{id:202,a:a,name:name,type:type,pos:pos,add:add,town:town,tel:tel,mobile:mobile,email:email,uname:uname},
			success:function(data){
				$('#res1').html(data);
			}
		});	
	}	
}

$( "#extmedic" ).combobox({
	select: function(event,ui){
	 var str = $('#extmedic').val();
	 var parts=str.split('θ',10);
	 $('#regn').val(parts[0]);
	$('#name2').val(parts[1]);
	 $('#type2').val(parts[2]);
	 $('#pos2').val(parts[3]);
	 $('#add2').val(parts[4]);
	 $('#town2').val(parts[5]);
	 $('#tel2').val(parts[6]);
	 $('#mobile2').val(parts[7]);
	 $('#email2').val(parts[8]);
	 $('#uname2').val(parts[9]);
	 }
});
function editextmed(a){
var name = $('#name2').val();
var regn = $('#regn').val();
var type = $('#type2').val();
var pos = $('#pos2').val();
var add = $('#add2').val();
var town = $('#town2').val();
var tel = $('#tel2').val();
var mobile = $('#mobile2').val();
var email = $('#email2').val();
var uname = $('#uname2').val();
 if(name=='' || type=='' || pos=='' || mobile==''){
		$().customAlert();
		alert('Error!', '<p>Enter all required details!</p>');
		e.preventDefault();
		}
	
	else{
		$('#res2').html(loader);
		$.ajax({
		url:'hr.php',
		data:{id:202,a:a,name:name,type:type,pos:pos,add:add,town:town,tel:tel,mobile:mobile,email:email,regn:regn,uname:uname},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}	
}

function delextmed(){
	var regn=$('#regn').val();
	if(regn==''){
	$().customAlert();
		alert('Error!', '<p>Enter a valid Company name!</p>');
		e.preventDefault();		
	}
	else{	
	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this External Medic.Continue with this action?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
	$('#res2').html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:203,regn:regn},
	success:function(data){
	$('#res2').html(data);
	}
	});
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
	
	}
}
$( "#loc4" ).combobox({
	select: function(event,ui){
	 	var param = $('#loc4').val();
		var ser = $('#ser').val();
		if(ser==207){
			$.confirm({
				'title'		: 'Punch-In Confirmation',
				'message'	: 'You are about to punch-in locum personnel. Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'blue',
						'action': function(){
							$("#mainp").html(loader);
							$.ajax({
								url:'hr.php',
								data:{id:ser,param:param},
								success:function(data){
								$('#mainp').html(data);
								}
							});
						}
					},
					'No'	: {
						'class'	: 'gray',
						'action': function(){$('#mainp').html('');}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
		}else if(ser==208){
			$.confirm({
				'title'		: 'Punch-Out Confirmation',
				'message'	: 'You are about to punch-out locum personnel. Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'blue',
						'action': function(){
							$("#mainp").html(loader);
							$.ajax({
								url:'hr.php',
								data:{id:ser,param:param},
								success:function(data){
								$('#mainp').html(data);
								}
							});
						}
					},
					'No'	: {
						'class'	: 'gray',
						'action': function(){$('#mainp').html('');}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
		}else{
			$("#mainp").html(loader);
			$.ajax({
				url:'hr.php',
				data:{id:ser,param:param},
				success:function(data){
					$('#mainp').html(data);
				}
			});
		}
	}
});

function locin(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:205,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function locout(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'hr.php',
	data:{id:206,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function threemonths(a){
	$("#mainp").html(loader);
	$.ajax({
	url:'bridge.php',
	data:{id:162,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function enter3months(){
var a=0;
var d1 = $('#default_widgeta').val();
var d2 = $('#default_widgetb').val();



var g=d1.substr(0,2);
var h=d1.substr(3,4);

var i=d2.substr(0,2);
var j=d2.substr(3,4);

var d1=h+g;
var d2=j+i;

k = parseInt(h)*12 + parseInt(g);
l = parseInt(j)*12 + parseInt(i);

var diff=l-k;

if(d1==''||d2==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Months Range!</p>');
		e.preventDefault();
}


else if(parseInt(diff)<0){
		$().customAlert();
		alert('Error!', '<p>Enter the Months Range Appropriately!</p>');
		e.preventDefault();
}
else if(parseInt(diff)>5){
		$().customAlert();
		alert('Error!', '<p>Months Range cannot be greater than six months!</p>');
		e.preventDefault();
}

else {window.open("output.php?id=15&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}

}
function getPharmCredit(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:134,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){ 
	$("#clientCredit1" ).combobox({
		select: function(event,ui){
		 var param = $('#clientCredit1').val();
		 var ser = $('#ser').val();
		if(ser==1){var x=3}
		window.open('report.php?id='+ x + '&rcptno=' + param);
		}
	});
	$("#etDischargeSum1" ).combobox({
		select: function(event,ui){
		 var param = $('#etDischargeSum1').val();
		 var ser = $('#ser').val();
		if(ser==1){var x=58}
		window.open('report.php?id='+ x + '&rcptno=' + param);
		}
	});

});

function getDischargeSummary(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:137,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function ssendCustomPatientItem(code,b){	
	var patientid=$('#oldpatid' + code).val();
	var prescid=$('#oldprescid' + code).val();
	var prescno=$('#oldprescno' + code).val();
	//var itemname=$('#productname' + code).val();
	var oldpatid=$('#oldpatid' + code).val();
	//var dept4rm=$('#dept4rm' + code).val();
	if(patientid==''||prescid==''||prescno==''||oldpatid==''){
			$().customAlert();
			alert('Error!', '<p>All fields are required!</p>');
			e.preventDefault();	
	}else{
		$('#deltempitem' + code).html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'158',code:code,b:b,patientid:patientid,prescid:prescid,prescno:prescno,oldpatid:oldpatid},
		success:function(data){
		$('#deltempitem' + code).html(data);
		}
		});
	}
}


// function ops254(a){
// 	for(i=0;i<5;i++){
// 	$('#op' + i).hide(); 
// 	}	
// 	$('#op' + a).show();
// }
$(document).ready(function(){
	$('#txtdatamodifier606').parent().find('input:first').width(100).prop('disabled',true);
	$("#txtdatamodifier606").combobox({
		select: function(event,ui){
			var code = $('#txtdatamodifier606').val();
			if(code=='symptoms'){
				$('#op1').show();
				$('#op2').hide();
				$('#op3').hide();
				$('#op4').hide();
				$('#op5').hide();
				$('#op6').hide();
			}else if(code=='diagnosis'){
				$('#op1').hide();
				$('#op2').show();
				$('#op3').hide();
				$('#op4').hide();
				$('#op5').hide();
				$('#op6').hide();
			}else if(code=='procedures'){
				$('#op1').hide();
				$('#op2').hide();
				$('#op3').show();
				$('#op4').hide();
				$('#op5').hide();
				$('#op6').hide();
			}else if(code=='prescriptions'){
				$('#op1').hide();
				$('#op2').hide();
				$('#op3').hide();
				$('#op4').show();
				$('#op5').hide();
				$('#op6').hide();
			}else if(code=='labresults'){
				$('#op1').hide();
				$('#op2').hide();
				$('#op3').hide();
				$('#op4').hide();
				$('#op5').show();
				$('#op6').hide();
			}else if(code=='diseases'){
				$('#op1').hide();
				$('#op2').hide();
				$('#op3').hide();
				$('#op4').hide();
				$('#op5').hide();
				$('#op6').show();
			}								
			
		}
	});
});

function expiryAlerts(){
	$("#mainp").html(loader);
	$.ajax({
		url:'data.php',
		data:{id:159},
		success:function(data){
			$('#mainp').html(data);
		}
	});

}
function deleteExpired(transNo){
	var delete_expired_tbl = $('#delete_expired_tbl');
	//delete_expired_tbl.find('tr#delExp'+transNo).children('td:eq(2)').html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');	
	delete_expired_tbl.find('tr#delExp'+transNo).children().last().html(loader);
	var rows=delete_expired_tbl.find('tbody > tr');
	var row_count=rows.length;
	$.ajax({
		type:'POST',
		url:'notifications.php',
		data:{id:154,transNo:transNo,row_count:row_count},
		success:function(data){
			if(data=='Success'){
				delete_expired_tbl.find('tr#delExp'+transNo).remove();
			}
		}
	});	
}
function expiryAlertsFrequency(){
	var exp_frequency =$('#exp_frequency').val();
	var email_frequency =$('#email_frequency').val();
	if (email_frequency=='' || email_frequency=='undefined' || email_frequency=='' || email_frequency=='undefined' ){
		alert('Notification Frequency and Recipient are required');
		return false;	
	}else{
		$("#mainp").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
		$.ajax({
			type:'POST',
			url:'notifications.php',
			data:{id:152,exp_frequency:exp_frequency,email_frequency:email_frequency},
			success:function(data){
				$("#mainp").empty();
				alert(data);

			}
		});

	}
	
}

function checkItemsExpiry(){
	$.ajax({
		type:'GET',
		url:'bridge.php',
		data:{id:193,param:'status_check'},
		success:function(response){
			var response = response.trim();
			var res=response.substring(response.length - 6);
			var response=response.substring(response.length - 13);
			//console.log('Response== '+response);
			//var response = JSON.parse(data);
			//if(response=='success'){
				if(res=='notify'){
					$.confirm({
							'title'		: 'Expiry',
							'message'	: 'You have items due to expire between today and 30 days, view items?',
							'buttons'	: {
								'Yes'	: {
									'class'	: 'blue',
									'action': function(){
										$.ajax({
											url:'data.php',
											data:{id:160},
											success:function(data){
												$('#mainp').html(data);
											}
										});
									}
								},
								'No'	: {
									'class'	: 'gray',
									'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
								}
							}
						});	
				}else if(response=='status_update'){
					$.ajax({
						type:'POST',
						url:'notifications.php',
						data:{id:153,param:'status_update'},
						success:function(data){
							return false;
						}
					});

				}

			//}	


		}


	});

}
function expiryrecep(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:139},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}