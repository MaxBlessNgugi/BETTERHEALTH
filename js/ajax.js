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

//$(document).ready(function(){ });
var loader = '<span id="img-spinner" class="bh-spinner" role="status" aria-label="Loading" style="position:absolute; top:45%; left:50%"></span>';

function addstockit(){
$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:4},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
$(document).ready(function(){ 
	$( "#dept6" ).combobox({
		select: function(event,ui){
		 var param = $('#dept6').val();
		 var parts=param.split('θ',3);
		 $('#braid').val(parts[0]);
		 $('#braname').val(parts[1]);
		 var braid = $('#braid').val();
		 var braname = $('#braname').val();
		 //$('#pr').val(parts[1]);
		 if(braid!=''){
			 $("#mainp").html(loader);
				$.ajax({
					url:'link.php',
					data:{id:1,braid:braid,bra:braname},
					success:function(data){
					$('#mainp').html(data);
					}
				});
		 }
		}
	});
	
	 $("#itemcat3" ).combobox({});
	 $("#supplier1" ).combobox({});

	 $("#itemcat2" ).combobox({});
	 $("#supplier2" ).combobox({});
	 $("#docusers254" ).combobox({});
	 
	$("#cashdepo_bankledgerid" ).combobox();
	$("#cashdepo_cashledgerid" ).combobox();
	$("#expense_payfrm_acntid" ).combobox();

   // $('#banktrans_subledgerid').parent().find('input:first').width(252);
   // $('#banktrans_source_subledgerid').parent().find('input:first').width(252);
   // $('#banktrans_recipient_subledgerid').parent().find('input:first').width(252);

});



function addstock2(){
var code = $('#itcode1').val();
var name = $('#itname1').val().replace(/['"]/g,'');
var bra = $('#cat').val();
var braid = $('#braid').val();
var itemcat = $('#itemcat3').val();
var pack = 	$('#packsize').val();
var bal = 	$('#mbal1').val();
var mbal=bal*pack;
var supp = 	$('#supplier1').val();
var ltime = 	$('#ltime1').val();
var molecule = 	$('#molecule').val();
var expiry = $('#datepick4').val();
var covereduncovered = $('input[name=covereduncovered]:checked').val();
//var moredetails = $('#moredetails').val();
var type = 'GOOD';
var pprice = '';
var margin ='';
var sprice = $('#price1').val();
var crpprice = $('#price2').val();
var prshprice = $('#price3').val();
var otcprice = $('#price7').val();
var apaprice = $('#price60').val();
var pacisprice = $('#price61').val();
var liasonprice = $('#price62').val();
var oldmutualprice = $('#price63').val();
var kplcminetprice = $('#price64').val();
var maklmatprice = $('#price65').val();
var minetcsprice = $('#price66').val();
var taxable ='';
var sellable = '';
var vat = '';
var quat = '';
var numexp=/^[0-9]+$/;

if(!(pack.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Pack size field!</p>');
		e.preventDefault();
		return;
	}
	if(!(sprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(crpprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Corporate Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(prshprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the insurance Price field!</p>');
		e.preventDefault();
		return;
	}

	if(!(otcprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the OTC Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(apaprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the APA Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(pacisprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Pacis Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(liasonprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Liason Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(oldmutualprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Old Mutual Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(kplcminetprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the KPLC Minet Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(maklmatprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Makl Maternity Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(minetcsprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Minet Civil Servants Price field!</p>');
		e.preventDefault();
		return;
	}

if(mbal==''){
	mbal=0;
}

		if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter a valid Item Name!</p>');
		e.preventDefault();
		}
		
		else if(pack==''||pack==0){
		$().customAlert();
		alert('Error!', '<p>Enter the Pack Size!</p>');
		e.preventDefault();
		}
		
		
	else{
		$('#res2').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:9,code:code,name:name,pprice:pprice,sprice:sprice,taxable:taxable,sellable:sellable,vat:vat,itemcat:itemcat,quat:quat,type:type,pack:pack,margin:margin,supp:supp,mbal:mbal,ltime:ltime,a:2,bra:bra,molecule:molecule,crpprice:crpprice,prshprice:prshprice,braid:braid,covereduncovered:covereduncovered,expiry:expiry,otcsprice:otcprice,apaprice:apaprice,pacisprice:pacisprice,liasonprice:liasonprice,oldmutualprice:oldmutualprice,kplcminetprice:kplcminetprice,maklmatprice:maklmatprice,minetcsprice:minetcsprice},
		success:function(data){
		$('#res2').html(data);
		}
		});	
		}	
}

$("#item55" ).combobox({
	select: function(event,ui){
	 var str = $('#item55').val();
	 var parts=str.split('θ',20);
	 $('#itcode2').val(parts[0]);
	 $('#packsize2').val(parts[1]);
	 $('#itemcat2').val(parts[2]);
	 $('#mbal2').val(parts[3]/parts[1]);
	 $('#ltime2').val(parts[4]);
    $('#supplier2').val(parts[5]);
	 $('#itname2').val(parts[6]);
	$('#sprice2').val(parts[7]);
	$('#molecule2').val(parts[8]);
	$('#price4').val(parts[9]);
	$('#price5').val(parts[10]);
	$('#price6').val(parts[11]);
	$('#price70').val(parts[12]);
	$('#price71').val(parts[13]);
	$('#price72').val(parts[14]);
	$('#price73').val(parts[15]);
	$('#price74').val(parts[16]);
	$('#price75').val(parts[17]);
	$('#price76').val(parts[18]);

	}
});


function editstock2(bra){
var code = $('#itcode2').val();
var name = $('#itname2').val().replace(/['"]/g,'');
var itemcat = '';
var itemcat2 = $('#itemcat2').val();
var pack = 	$('#packsize2').val();
var mbal = 	$('#mbal2').val();
mbal=mbal*pack;
var supp = 	$('#supplier2').val();
var ltime = 	$('#ltime2').val();
var type = 'GOOD';
var pprice = '';
var margin ='';
var sprice = $('#sprice2').val();
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
var braid = $('#braid').val();
var taxable ='';
var sellable = '';
var vat = '';
var quat = '';
var numexp=/^[0-9]+$/;
var expiry = $('#datepick3').val();
var molecule = 	$('#molecule2').val();
var moredetails = $('#moredetails').val();
var councovered = $('input[name=coun1covered]:checked').val();
	if(mbal==''){
		mbal=0;
	}
	if(!(sprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(crpprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the Corporate Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(prshprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the insurance Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(otcsprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the OTC Price field!</p>');
		e.preventDefault();
		return;
	}
	if(!(apaprice.match(numexp))||!(pacisprice.match(numexp))||!(liasonprice.match(numexp))){
		$().customAlert();
		alert('Error!', '<p>Numericals only in the insurance Price field!</p>');
		e.preventDefault();
		return;
	}
	if(name==''){
	$().customAlert();
	alert('Error!', '<p>Enter a valid Item Name!</p>');
	e.preventDefault();
	}
	
	else if(pack==''){
	$().customAlert();
	alert('Error!', '<p>Enter the Pack Size!</p>');
	e.preventDefault();
	}
	
	else if(itemcat2==''){
	$().customAlert();
	alert('Error!', '<p>Category is required!</p>');
	e.preventDefault();
	}
	
	else if(supp==''){
	$().customAlert();
	alert('Error!', '<p>Supplier is required!</p>');
	e.preventDefault();
	}
	
		
	else{
		$('#res3').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:'10.1',code:code,name:name,pprice:pprice,sprice:sprice,taxable:taxable,sellable:sellable,vat:vat,quat:quat,type:type,pack:pack,margin:margin,supp:supp,mbal:mbal,ltime:ltime,molecule:molecule,itemcat:bra,itemcat2:itemcat2,bra:bra,braid:braid,crpprice:crpprice,prshprice:prshprice,councovered:councovered,moredetails:moredetails,expiry:expiry,otcsprice:otcsprice,apaprice:apaprice,pacisprice:pacisprice,liasonprice:liasonprice,oldmutualprice:oldmutualprice,kplcminetprice:kplcminetprice,maklmatprice:maklmatprice,minetcsprice:minetcsprice},
		success:function(data){
		$('#res3').html(data);
		}
		});	
		}	
}


function patientseenbydoc2(a){
	var name = $('#docusers254').val();
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var view = $('input[name=viewall]:checked').val();
	if(view==null){view=0}
	if(name==''){
		$().customAlert();
			bhFieldError($('#docusers254').parent().find('input:first'), '<p>No user selected!</p>');
			$('#docusers254').parent().find('input:first').focus();
	}
	else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
	}
	else if(view==1){
		window.open("r/opd-patient-by-doc.php?id=31&code=" + name);
	}
	else {window.open("r/opd-patient-by-doc.php?id=31&code=" + name + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}

}
function fetchpurch(){
	var code = $('#code').val();
	var batch = $('#batch').val();
	var invoice = $('#invoice').val();
	$('#display').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:6,code:code,batch:batch,invoice:invoice},
	success:function(data){
		$('#price58').html(data);
		$('#display').html('');
	}
	});
}

function additemret(){
var total = $('#tprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var unit1 = $('#unit58').val();
var part = $('#part58').val();
if(part==''){part=0;}
var code = $('#code').val();
var name = $('#itname7').val();
var pprice = $('#price58').val();
var tprice = $('#tprice').val();
var lpo = $('#lpono').val();
var invoice = $('#invoice').val();
var batch = $('#batch').val();
var expiry = $('#datepick2').val();
var reason = $('#reason').val();
var date = $('#datepick').val();
var sid = $('#supname').val();
var sname = $('#supname option:selected').text();
var pack = $('#pack').val();
var bal = $('#bal').val();
var qty=(unit1*pack) + parseInt(part,10);
var itsale = $('#itemsale').val();
var tsale=qty*itsale;
if(name==''){
	$().customAlert();
		bhFieldError($('#itemxa').parent().find('input:first'), '<p>No item selected!</p>');
		$('#itemxa').parent().find('input:first').focus();
}
else if(unit1==''&&part==''){
		$().customAlert();
		bhFieldError($('#unit58'), '<p>Enter the quantity!</p>');
		$('#unit58').focus();
}
else if(invoice==''){
		$().customAlert();
		bhFieldError($('#invoice'), '<p>Enter the Invoice Number!</p>');
		$('#invoice').focus();
}
else if(pprice==''&&pprice!=0){
		$().customAlert();
		bhFieldError($('#price58'), '<p>Enter the Unit purchase price!</p>');
		$('#price58').focus();
}
else if(sname==''){
		$().customAlert();
		bhFieldError($('#supname'), '<p>Enter the Supplier name!</p>');
		$('#supname').focus();
}
else if(batch==''){
		$().customAlert();
		bhFieldError($('#batch'), '<p>Enter the Batch Number!</p>');
		$('#batch').focus();
}

else{
	$('#display').html(loader);
	$.ajax({
		url:'link.php',
		data:{id:7,code:code,name:name,pprice:pprice,unit1:unit1,part:part,batch:batch,total:total,date:date,invoice:invoice,sname:sname,expiry:expiry,qty:qty,pack:pack,reason:reason,lpo:lpo,bal:bal,tsale:tsale,sid:sid},
		success:function(data){
		$('#display').html(data);
		}
		});
	$('#itemxa').parent().find('input:first').focus().val('');
}
}
function viewcartret(){
	$('#display').html(loader);
$.ajax({
	url:'link.php',
	data:{id:8},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptycartret(){
	$('#display').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:9},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function removelastret(){
	$('#display').html(loader);
	if (!confirm('Remove this record? This action cannot be undone.')) return; $.ajax({
	url:'link.php',
	data:{id:'10.1'},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function delitemret(pid){
	$('#del' + pid).html(loader);
if (!confirm('Delete this record? This action cannot be undone.')) return; $.ajax({
	url:'link.php',
	data:{id:10,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function submitret(){
var maxno = $('#totitems').val();
var fintot = $('#totprice').val();
		if(maxno==''||maxno==0){
		$().customAlert();
		alert('Error!', '<p>No Returns Made!</p>');
		e.preventDefault();
		}
		
	else{
		$('#display').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:90,fintot:fintot},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}

function additemlpo(){
var total = $('#tprice').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var unit1 = $('#unit59').val();
var part = $('#part59').val();
var code = $('#code').val();
var name = $('#itemxa').parent().find("input:first").val();
var pprice = $('#price59').val();
var tprice = $('#tprice').val();
var date = $('#datepick').val();
var sname = $('#supname').val();
var pack = $('#pack').val();
var bal = $('#bal').val();
var qty=(unit1*pack) + parseInt(part,10);
var maxno = $('#totitems').val();
if(name==''){
	$().customAlert();
		bhFieldError($('#itemxa').parent().find('input:first'), '<p>No item selected!</p>');
		$('#itemxa').parent().find('input:first').focus();
}
else if(unit1==''&&part==''){
		$().customAlert();
		bhFieldError($('#unit59'), '<p>Enter the quantity!</p>');
		$('#unit59').focus();
}

else if(pprice==''&&pprice!=0){
		$().customAlert();
		bhFieldError($('#price59'), '<p>Enter the Unit purchase price!</p>');
		$('#price59').focus();
}
else if(sname==''){
		$().customAlert();
		bhFieldError($('#supname'), '<p>Enter the Supplier name!</p>');
		$('#supname').focus();
}

/* MAX NUMBER OF ITEMS IN ONE Lpo=25 */

		else if(parseInt(maxno)>24){
		$().customAlert();
		alert('Error!', '<p>Maximum number of items in one lpo is 25!</p>');
		e.preventDefault();
		}


else{
	$('#display').html(loader);
	$.ajax({
		url:'link.php',
		data:{id:12,code:code,name:name,pprice:pprice,unit1:unit1,part:part,total:total,date:date,sname:sname,qty:qty,pack:pack,bal:bal},
		success:function(data){
		$('#display').html(data);
		}
		});
	$('#itemxa').parent().find('input:first').focus().val('');
}
}
function viewcartlpo(){
	$('#display').html(loader);
$.ajax({
	url:'link.php',
	data:{id:13},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptycartlpo(){
	$('#display').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:14},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function delitemlpo(pid){
	$('#del' + pid).html(loader);
if (!confirm('Delete this record? This action cannot be undone.')) return; $.ajax({
	url:'link.php',
	data:{id:15,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}
function removelastlpo(){
	$('#display').html(loader);
	if (!confirm('Remove this record? This action cannot be undone.')) return; $.ajax({
	url:'link.php',
	data:{id:'15.1'},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function submitlpo(){
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
		data:{id:91,fintot:fintot},
		success:function(data){
		$('#display').html(data);
		}
		});	
		}	
}
$(document).ready(function(){ 
	$("#docx1" ).combobox({
		select: function(event,ui){
		 var param = $('#docx1').val();
		 var ser = $('#ser').val();
		if(ser==1){var x=6}
		if(ser==2){var x=51}
		if(ser==3){var x=52}
		if(ser==4){var x=58}
		if(ser==5){var x=50}
		if(ser==6){var x=66}
		if(ser==7){var x=67}
		window.open('report.php?id='+ x + '&rcptno=' + param);
		}
	});

	$("#patfb" ).combobox({
		select: function(event,ui){
		 var param = $('#patfb').val();
		 var ser = $('#ser').val();
		if(ser==7){var x=2}
		window.open('report2.php?id='+ x + '&rcptno=' + param);
		}
	});
});
function enterinvoicelist(){
a=0;
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
	
	window.open("report.php?id=53&code=" + a);
}
else {window.open("report.php?id=53&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
function enterinvoicelist2(){
a=0;
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
	
	window.open("output.php?id=10&code=" + a);
}
else {window.open("output.php?id=10&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
$(document).ready(function(){ 
	$("#dep90" ).combobox({
		select: function(event,ui){
		 var param = $('#dep90').val();
		 var a = $('#ser').val();
		window.open("report.php?id=55&code=" + a + '&' + "\nname=" + param);
		}
	});
	$("#expiry606" ).combobox({
		select: function(event,ui){
		 var param = $('#expiry606').val();
		 var a = $('#ser').val();
		window.open("report.php?id=18&code=" + param + '&' + "\nexpr=" + a);
		}
	});
	$( "#item89" ).combobox({
		select: function(event,ui){
		 var cus = $('#item89').val();
		 var cusname = $('#item89 option:selected').val();
		 //var clientno = $('#paciente606').val();
		 var clientno = '';
		if(cus==''||cusname==''){
		 //$('#custno').val(cus);	
		 $('#dvpaciente606').hide();
		}else{$('#dvpaciente606').show();}		
		 $('#total').val(''); $('#bal').val('');
		  $('#debtorp').html('-' + cus + '-' + $('#item89 option:selected').text());
		 	 $("#display").html(loader);
				$.ajax({
					url:'link.php',
					data:{id:22,cus:cus,clientno:clientno},
					success:function(data){ 
					$('#display').html(data);
					}
				});
		 } 
	});

	$( "#paciente606" ).combobox({
		select: function(event,ui){
		 var cus = $('#item89').val();
		 var cusname = $('#item89 option:selected').val();
		 var clientno = $('#paciente606').val();
		if(cus==''||cusname==''){
		 //$('#custno').val(cus);	
		 $('#dvpaciente606').hide();
		}else{$('#dvpaciente606').show();}		
		 $('#total').val(''); $('#bal').val('');
		  $('#debtorp').html('-' + cus + '-' + $('#paciente606 option:selected').text());
		 	 $("#display").html(loader);
				$.ajax({
					url:'link.php',
					data:{id:22,cus:cus,clientno:clientno},
					success:function(data){ 
					$('#display').html(data);
					}
				});
		 } 
	});

});
function checkinvbal(tno){
var paying=$('#am' + tno).val();
var bal=$('#invbal' + tno).html();		
if(parseInt(paying,10)>parseInt(bal,10)){
	$().customAlert();
	$('#am' + tno).val(''). focus();
		alert('Error!', '<p>Payment made is more than the invoice balance!</p>');
		e.preventDefault();
}
	
}
function checkinv(tno,amount,cid,cname,invno,invbal,paid,invref){
	var total=$('#total').val();
	var balance=$('#bal').val();
	var paying=$('#am' + tno).val();
	var creditortotal_unpaid_invoices_bal=$('#creditortotal_unpaid_invoices_bal').val();
	if(total==''){total=0}
	if(bal==''){bal=0}
	var rec = $('input[name=check'+ tno + ']:checked').val();
	if(paying==''||paying==0){
		$("#check" + tno).prop("checked",false);
		$().customAlert();
		alert('Error', '<p>No Payments made for this invoice!</p>');
		return false;
	}
	
	if(rec==1){
		var bal=parseFloat(total)+ parseFloat(paying);
		var bal2=parseFloat(balance)- parseFloat(paying);
		$('#total').val(bal);$('#bal').val(bal2);
		
			$.ajax({
				url:'link.php',
				data:{id:23,amount:amount,tno:tno,cid:cid,cname:cname,invno:invno,bal:bal2,paying:paying,invbal:invbal,paid:paid,invref:invref},
				success:function(data){
				}
			});
		
	}else{
		var bal=parseFloat(total)-parseFloat(paying);
		var bal2=parseFloat(balance)+ parseFloat(paying);
		$('#total').val(bal);$('#bal').val(bal2);	
		$('#am' + tno).val('');
		$.ajax({
				url:'link.php',
				data:{id:24,tno:tno},
				success:function(data){
				}
			});
		}
}

function savepayrec(){
		var nbal=$('#bal').val();
		var total=$('#total').val();
		var refno=$('#refno').val();
		var paymode=$('#madeni606').val();
		//var forshow=$('#forshow').val();
		var lid=$('#ac89').find(':selected').val();
		var lname =$('#ac89 option:selected').text();
		var cid1=$('#item89').find(':selected').val();
		var cid1name =$('#item89 option:selected').text();
		if(total==0||total==''){
				$().customAlert();
				alert('Error!', '<p>No payment received</p>');
				return false;				
		}
		
		if(lid==''){
				$().customAlert();
				bhFieldError($('#ac89').parent().find('input:first'), '<p>Select the account used for the payment</p>');
				$('#ac89').parent().find('input:first').focus();
				return false;
				
		}else if(refno==''){
				$().customAlert();
				bhFieldError($('#refno'), '<p>Please enter receipt or cheque number</p>');
				$('#refno').focus();
				return false;
		}else if(cid1==''){
				$().customAlert();
				bhFieldError($('#item89').parent().find('input:first'), '<p>Debtor name is required</p>');
				$('#item89').parent().find('input:first').focus();
				return false;
		}	else{
				$('#display').html(loader);
				$.ajax({
						url:'./data.php',
						data:{id:92,nbal:nbal,total:total,lid:lid,lname:lname,refno:refno,cid1:cid1,cid1name:cid1name,paymode:paymode},
						success:function(data){
								$('#display').html(data);
						}
				});	
		}

}
$(document).ready(function(){ 
	$("#item29" ).combobox({
	select: function(event,ui){
	var str = $('#item29').val();
	var parts=str.split('θ',4);
	$('#cid2').val(parts[0]);
	$('#cname2').val(parts[1]);
	 $('#tel2').val(parts[2]);
	 $('#bal2').val(parts[3]);
	}
	});

	$("#item37" ).combobox({
	select: function(event,ui){
	var str = $('#item37').val();
	window.open("outpathistory.php?id=18&rcptno=" + str);
	}
	});

	$("#item30" ).combobox({});	
});

function setcumul(){

}
$(document).ready(function(){ 
	$( "#item76" ).combobox({
		select: function(event,ui){
			$('#lid76').val('');
			$('#lname76').val('');
			$('#amount76').val('');
			$("#amount76").prop("disabled",false);
			$("#amount76").css({'border' : 'solid #10504F 1px'});
			var code = $('#item76').val();
			if(code=='Cash'){
					$("#cummulative").attr('checked', false);
					$("#amtlabel").show();
					$("#amount76").show();
					$('#lid76').val('');
					$('#lname76').val('');
					$('#acdiv1').hide();
					$('#acdiv3').hide();
					$('#acdiv2').hide();
					$('#rcvpaymentcardnodiv').hide();
					$('#rcvpaycopaydiv').hide();
					$('#amount76').focus();
			}else if(code=='Credit'){
					$("#cummulative").attr('checked', false);
					$('#acdiv1').hide();
					$('#acdiv2').hide();
					$('#acdiv3').hide();
					$('#rcvpaymentcardnodiv').hide();
					$("#amtlabel").show();
					$("#amount76").show();
					$('#rcvpaycopaydiv').hide();
					$("#amount76").prop("disabled",true);
					$("#amount76").css({'border' : 'solid #DC2626 1px'});
					openadmin();
			}
			else if(code=='Cummulative'){
					//$("#cummulative").is(':checked') ? 1 : 0;
					$("#cummulative").attr('checked', true);
					$('#acdiv1').hide();
					$('#acdiv2').hide();
					$('#acdiv3').hide();
					$('#rcvpaymentcardnodiv').hide();
					$("#amtlabel").hide();
					$("#amount76").hide();
					$('#rcvpaycopaydiv').hide();
					$('#cname76').parent().find('input:first').focus();
			}
			else if(code=='Companies'){
					$("#cummulative").attr('checked', false);
					$('#acdiv1').hide();
					$('#acdiv2').show();
					$('#acdiv3').hide();
					$('#rcvpaymentcardnodiv').show();
					$("#amtlabel").show();
					$("#amount76").show();	
					var companyId=$('#cname76').find(':selected').val();
					if(parseInt(companyId)==16){
							$('#rcvpaycopaydiv').show();
					}else{$('#rcvpaycopaydiv').hide();}									
					$('#cname76').parent().find('input:first').focus();
			}
			else if(code=='Bank'){
					$("#cummulative").attr('checked', false);
					$('#acdiv1').show();
					$('#acdiv3').show();
					$("#amtlabel").show();
					$("#amount76").show();
					$("#acdiv2").hide();
					$('#rcvpaymentcardnodiv').hide();
					$('#rcvpaycopaydiv').hide();
					$('#bname76').parent().find('input:first').focus();
					
			}
			else if(code=='Waiver'){
				$("#cummulative").attr('checked', false);
				$('#acdiv2').hide();
				$('#acdiv1').hide();
				$('#acdiv3').show();
				$('#rcvpaymentcardnodiv').show();
				$("#amtlabel").show();
				$("#amount76").show();
				$('#rcvpaycopaydiv').hide();
				$('#ref76').focus();
			}
			
			
		}
	});
	/*$( "#item76" ).combobox({
		select: function(event,ui){
			$('#lid76').val('');
			$('#lname76').val('');
			$('#amount76').val('');
			$("#amount76").prop("disabled",false);
			$("#amount76").css({'border' : 'solid #10504F 1px'});
			var code = $('#item76').val();
			if(code=='Cash'){
			$("#cummulative").attr('checked', false);
			$('#acdiv1').hide();
			$('#acdiv2').hide();
			$('#acdiv3').hide();
			$("#amtlabel").show();
			$("#amount76").show();
			$('#amount76').focus();
			$('#lid76').val('');
			$('#lname76').val('');
			}
			else if(code=='Credit'){
			$("#cummulative").attr('checked', false);
			$('#acdiv1').hide();
			$('#acdiv2').hide();
			$('#acdiv3').hide();
			$("#amtlabel").show();
			$("#amount76").show();
			$("#amount76").prop("disabled",true);
			$("#amount76").css({'border' : 'solid #DC2626 1px'});
			openadmin();
			}
			else if(code=='Cummulative'){
			//$("#cummulative").is(':checked') ? 1 : 0;
			$("#cummulative").attr('checked', true);
			$('#acdiv1').hide();
			$('#acdiv2').hide();
			$('#acdiv3').hide();
			$("#amtlabel").hide();
			$("#amount76").hide();
			$('#cname76').parent().find('input:first').focus();
			}
			else if(code=='Companies'){
			$("#cummulative").attr('checked', false);
			$('#acdiv1').hide();
			$('#acdiv2').show();
			$('#acdiv3').show();
			$("#amtlabel").show();
			$("#amount76").show();
			$('#cname76').parent().find('input:first').focus();
			}
			else if(code=='Bank'){
			$("#cummulative").attr('checked', false);
			$('#acdiv2').hide();
			$('#acdiv1').show();
			$('#acdiv3').show();
			$("#amtlabel").show();
			$("#amount76").show();
			$('#bname76').parent().find('input:first').focus();
			}
			else if(code=='Waiver'){
				$("#cummulative").attr('checked', false);
			$('#acdiv2').hide();
			$('#acdiv1').hide();
			$('#acdiv3').show();
			$("#amtlabel").show();
			$("#amount76").show();
			$('#ref76').focus();
			}
			
			
		}
	});*/
	$( "#bname76" ).combobox({
		select: function(event,ui){
			var lid = $('#bname76').val();
			var lname =$('#bname76 option:selected').text();
			$('#lid76').val(lid);
			$('#lname76').val(lname);
			$('#rcvpaycopaydiv').hide();
			$('#ref76').focus();
		}
	});
	$( "#cname76" ).combobox({
		select: function(event,ui){
				var lid=$('#cname76').find(':selected').val();
				var lname=$('#cname76').find(':selected').text().trim();
				$('#lid76').val(lid);
				$('#lname76').val(lname);
				$('#acdiv1').hide();
				$('#acdiv3').hide();
				$("#amtlabel").show();
				$("#amount76").show();
				$('#rcvpaymentcardnodiv').show();
				$('#amount76').focus();
				var paymentMode=$('#item76').find(':selected').val();
				if(parseInt(lid)==16 && paymentMode=='Companies'){
						$('#rcvpaycopaydiv').show();
				}else{$('#rcvpaycopaydiv').hide();}

		}
	});

});
function addpaymode(){
		var patid = $('#patid76').val();
		var patname = $('#patname76').val();
		var rcptno = $('#rcptno76').val();
		var mode = $('#item76').val();
		// var cid = $('#lid76').val();
		// var cname = $('#lname76').val();
		var cardno76 = $('#receive_payment_cardno76').val();
		var bname76Id=$('#bname76').find(':selected').val();
		var bname76=$('#bname76').find(':selected').text();
		var cid=$('#cname76').find(':selected').val();
		var cname=$('#cname76').find(':selected').text();
		var dc = $('#dc76').val();
		var rcvpayref76 = $('#ref76').val();
		var rcv_copayment=$('#rcv_copayment').find(':selected').val();
		// if(mode!='Companies'&&mode!='Bank'&&mode!='Waiver'){
		// 	var cardno='';
		// }else{
		// 	var cardno = $('#ref76').val();
		// }
		var amount = $('#amount76').val();
		//var numexp=/^[0-9]+$/;
		var view = $('input[name=creditnote]:checked').val();
		if(!(view)){
				view=0;
		}
		var bill = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		if(mode=='Cummulative'){
				amount = bill;	
		}
		// if(parseFloat(amount)<parseFloat(bill) ){
		// 	$().customAlert();
		// 		alert('Error!', '<p>Amount paid is less than amount bill.</p>');
		// 		$('#amount76').focus();
		// 		return false;
		// }

		if(mode=='Bank' && (parseInt(bname76Id)==0||bname76Id==''||bname76Id==0) ){
			$().customAlert();
			alert('Error', '<p>Please select a bank.</p>');
			return false;
		}

		if(mode==''){
			$().customAlert();
				bhFieldError($('#item76').parent().find("input:first"), '<p>Select payment mode</p>');
				$('#item76').parent().find("input:first").focus();	
				return false;
		}

		else if(amount=='' && (mode=='Companies'||mode=='Bank'||mode=='Cash'||mode=='Waiver'||mode=='Credit')){
				$().customAlert();
				bhFieldError($('#amount76'), '<p>Please enter amount paid.</p>');
				$('#amount76').focus();
				return false;	
		}
		else if((amount<0&&view==0)&&dc==0){
					openadmin()
					return false;
		}else if(parseFloat(amount)==0 || parseFloat(amount)<0 ){
				$().customAlert();
				bhFieldError($('#amount76'), '<p>Please enter amount paid.</p>');
				$('#amount76').focus();
				return false;
		}		
		else if(cname=='' && mode=='Companies'){
				$().customAlert();
				alert('Error', '<p>Select an account.</p>');
				return false;
		}
		else if((mode!=='Cash' && mode!=='Companies')&&(rcvpayref76=='')){
				$().customAlert();
				bhFieldError($('#ref76'), '<p>Transaction reference no. is required.</p>');
				$('#ref76').focus();	
				return false;
		}
		else if((mode=='Waiver')&&(rcvpayref76=='')){
				$().customAlert();
				bhFieldError($('#ref76'), '<p>Please enter waiver number in the reference no field.</p>');
				$('#ref76').focus();
				return false;
		}else if(rcv_copayment=='' && (mode=='Companies' && parseInt(cid)==16)){
				$().customAlert();
				bhFieldError($('#rcv_copayment').parent().find("input:first"), '<p>Please select pay type and try again.</p>');
				$('#rcv_copayment').parent().find("input:first").focus();
				return false;
		}else{
				$('#display').html(loader);
				$.ajax({
						url:'./link.php',
						data:{id:26,patid:patid,patname:patname,rcptno:rcptno,mode:mode,cid:cid,cname:cname,amount:amount,bill:bill,cardno76:cardno76,rcvpayref76:rcvpayref76,bname76Id:bname76Id,bname76:bname76,rcv_copayment:rcv_copayment},
						success:function(data){
								$('#display').html(data);
						}
				});
				$('#ref76').val('');
				// $("#item76").parent().find("input:first").val('').focus();
				// $('#lid76').val('');$('#lname76').val('');
				// $('#bname76').val('');$('#cname76').val('');
				// $('#amount76').val('');
				// $('#receive_payment_cardno76').val('');
		}

}
function addpaymode_old(){
var patid = $('#patid76').val();
var patname = $('#patname76').val();
var rcptno = $('#rcptno76').val();
var mode = $('#item76').val();
var cid = $('#lid76').val();
var cname = $('#lname76').val();
var dc = $('#dc76').val();
if(mode!='Companies'&&mode!='Bank'&&mode!='Waiver'){
	var cardno='';
}else{
	var cardno = $('#ref76').val();
}
var amount = $('#amount76').val();

var numexp=/^[0-9]+$/;
var view = $('input[name=creditnote]:checked').val();
if(!(view)){
view=0;
}

	
var bill = $('#fintot').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');

if(mode=='Cummulative'){
	amount = bill;	
}

if(mode==''){
$().customAlert();
	bhFieldError($('#item76').parent().find("input:first"), '<p>Select the Mode pf Payment!</p>');
	$('#item76').parent().find("input:first").focus();	
}

else if(amount=='' && (mode=='Companies'||mode=='Bank'||mode=='Cash'||mode=='Waiver'||mode=='Credit')){
		$().customAlert();
		bhFieldError($('#amount76'), '<p>Enter the amount paid!</p>');
		$('#amount76').focus();	
}
else if((amount<0&&view==0)&&dc==0){
			openadmin();
}
else if((mode=='Companies'||mode=='Bank')&&(cid=='')){
		$().customAlert();
		alert('Error!', '<p>Select an account!</p>');
}
else if((mode=='Companies'||mode=='Bank')&&(cardno=='')){
		$().customAlert();
		bhFieldError($('#ref76'), '<p>Enter the reference no-either card no for insurance companies or cheque no. for banks!</p>');
		$('#ref76').focus();	
}
else if((mode=='Waiver')&&(cardno=='')){
		$().customAlert();
		bhFieldError($('#ref76'), '<p>Enter the Waiver number in the Ref No. Field!</p>');
		$('#ref76').focus();	
}else{
	$('#display').html(loader);
	$.ajax({
		url:'link.php',
		data:{id:26,patid:patid,patname:patname,rcptno:rcptno,mode:mode,cid:cid,cname:cname,cardno:cardno,amount:amount,bill:bill},
		success:function(data){
			$('#display').html(data);
		}
	});
		$("#item76").parent().find("input:first").val('').focus();
		$('#lid76').val('');
		$('#lname76').val('');
		$('#amount76').val('');
		$('#bname76').val('');$('#cname76').val('');$('#ref76').val('');
	}
}
function viewpaymode(){
	var regn =  $('#regn').val();
	$('#display').html(loader);
$.ajax({
	url:'link.php',
	data:{id:27},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function emptypaymode(a){
	$('#display').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:28},
	success:function(data){
	$('#display').html(data);$('#display').html('');
	}
	});	
}
function delpaymode(pid){
$('#del' + pid).html(loader);
if (!confirm('Delete this record? This action cannot be undone.')) return; $.ajax({
	url:'link.php',
	data:{id:29,pid:pid},
	success:function(data){
	$('#display').html(data);
	}
	});	
}

function submitpaymode_old(a,category){
var ampaid = $('#ampaid').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var changeam = $('#changeam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
var credit=$('input[name=creditnote]:checked').val();
var old_patient_id =  $('#old_patient_id').val();
var old_category_id =  $('#old_category_id').val();
var ipd_ref_no =  $('#ipd_ref_no').val();
var ipd_pay_mode =  $('#ipd_pay_mode').val();
var no_of_days_sha = $('#no_of_days_sha').val();
var insid = $('#cname76').val();
//var insname =$('#cname76 option:selected').text();
var cumul=$("#cummulative").is(':checked') ? 1 : 0;
if(credit!=1){credit=0;}
		if(ampaid==''){
			$().customAlert();
			alert('Error!', '<p>No Payments Made!</p>');
			e.preventDefault();
		}
		// else if(cumul==1){
		// 	$('#display').html(loader);
		// 	$.ajax({
		// 		url:'data.php',
		// 		data:{id:93.3,category:category,old_patient_id:old_patient_id,old_category_id:old_category_id,ipd_ref_no:ipd_ref_no,ipd_pay_mode:ipd_pay_mode},
		// 		success:function(data){
		// 			$('#display').html(data);
		// 		}
		// 	});	
		// }
		else if((parseInt(changeam,10)>0)&&credit!=1){
			$().customAlert();
			alert('Error!', '<p>The bill has not been cleared yet!</p>');
			e.preventDefault();	
		}
		else if(parseInt(changeam,10)<0){
			$().customAlert();
			alert('Error!', '<p>The amount paid cannot be more than the pending bill.!</p>');
			e.preventDefault();	
		}else if(parseInt(changeam,10)<0){
			$().customAlert();
			alert('Error!', '<p>The amount paid cannot be more than the pending bill.!</p>');
			e.preventDefault();	
		}
		// else if(no_of_days_sha<7&&insid==26){
		// 	$().customAlert();
		// 	alert('Error!', '<p>For SHA patients revisits should be after 7 Days, Otherwise, they pay cash or be admitted to be treated as Inpatient. '+ no_of_days_sha +' days has past since the last visit.</p>');
		// 	e.preventDefault();	
		// 	return;
			
		// }
		else{
			$('#display').html(loader);
			$.ajax({
				url:'data.php',
				data:{id:93,credit:credit,category:category,old_patient_id:old_patient_id,old_category_id:old_category_id,ipd_ref_no:ipd_ref_no,ipd_pay_mode:ipd_pay_mode},
				success:function(data){
					$('#display').html(data);
				}
			});	
		}	
}

function submitpaymode(a,category){
		var ampaid = $('#ampaid').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		var changeam = $('#changeam').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
		var credit=$('input[name=creditnote]:checked').val();
		var in_trans_date =  $('#in_trans_date').val();
		var old_patient_id =  $('#old_patient_id').val();
		var old_category_id =  $('#old_category_id').val();
		var ipd_ref_no =  $('#ipd_ref_no').val();
		var ipd_pay_mode =  $('#ipd_pay_mode').val();
		var no_of_days_sha = $('#no_of_days_sha').val();
		var insid = $('#cname76').val();
		//var insname =$('#cname76 option:selected').text();
		var cumul=$("#cummulative").is(':checked') ? 1 : 0;
		if(credit!=1){credit=0;}
				if(ampaid==''){
						$().customAlert();
						alert('Error!', '<p>No payment posted</p>');
						e.preventDefault();
				}else if(cumul==1){
						$('#display').html(loader);
						$.ajax({
								url:'./data.php',
								data:{id:93.3,category:category,old_patient_id:old_patient_id,old_category_id:old_category_id,ipd_ref_no:ipd_ref_no,ipd_pay_mode:ipd_pay_mode,in_trans_date:in_trans_date},
								success:function(data){
									$('#display').html(data);
								}
						});	
				}
				else if((parseInt(changeam,10)>0)&&credit!=1){
						$().customAlert();
						alert('Error!', '<p>The bill has not been cleared</p>');
						e.preventDefault();	
				}
				else if(parseInt(changeam,10)<0){
						$().customAlert();
						alert('Error!', '<p>The amount paid cannot be more than pending bill. </p>');
						e.preventDefault();	
				}else if(parseInt(changeam,10)<0){
						$().customAlert();
						alert('Error!', '<p>The amount paid cannot be more than pending bill.\</p>');
						e.preventDefault();	
				}
				else if(no_of_days_sha<7&&insid==26){
					$().customAlert();
					alert('Error!', '<p>For SHA patients revisits should be after 7 Days, Otherwise, they pay cash or be admitted to be treated as Inpatient. '+ no_of_days_sha +' days has past since the last visit.</p>');
					e.preventDefault();	
					return;
					
				}
				else{
						$('#display').html(loader);
						$.ajax({
								url:'./data.php',
								data:{id:93,credit:credit,category:category,old_patient_id:old_patient_id,old_category_id:old_category_id,ipd_ref_no:ipd_ref_no,ipd_pay_mode:ipd_pay_mode,in_trans_date:in_trans_date},
								success:function(data){
										$('#display').html(data);
								}
						});	

				}	
}

$(document).ready(function(){ 
	$("#ac89" ).combobox({});
	$("#ac79" ).combobox({});
	$( "#item79" ).combobox({
		select: function(event,ui){
		 var cus = $('#item79').val();
		 $('#total').val(''); $('#bal').val('');
		  $('#debtorp').html('-' + cus + '-' + $('#item79 option:selected').text());
		 	 $("#display").html(loader);
				$.ajax({
					url:'link.php',
					data:{id:31,cus:cus},
					success:function(data){
					$('#display').html(data);
					}
				});
		 }
		
	});
});
function checkinv2(tno,amount,cid,cname,invno,invbal,paid,invref){
	var total=$('#total').val();
	var balance=$('#bal').val();
	var paying=$('#am' + tno).val();
	if(total==''){total=0}
	if(bal==''){bal=0}
	var rec = $('input[name=check'+ tno + ']:checked').val();
	if(paying==''||paying==0){
		$("#check" + tno).prop("checked",false);
		$().customAlert();
		alert('Error!', '<p>No Payments made for this invoice!</p>');
		e.preventDefault();
		return false;
	}
	
	if(rec==1){
		var bal=parseInt(total,10)+ parseInt(paying,10);
		var bal2=parseInt(balance,10)- parseInt(paying,10);
		$('#total').val(bal);$('#bal').val(bal2);
		
		$.ajax({
				url:'link.php',
				data:{id:32,amount:amount,tno:tno,cid:cid,cname:cname,invno:invno,bal:bal2,paying:paying,invbal:invbal,paid:paid,invref:invref},
				success:function(data){
				}
			});
		
		
		}
		else{
		var bal=parseInt(total,10)-parseInt(paying,10);
		var bal2=parseInt(balance,10)+ parseInt(paying,10);
		$('#total').val(bal);$('#bal').val(bal2);	
		$('#am' + tno).val('');
		$.ajax({
				url:'link.php',
				data:{id:33,tno:tno},
				success:function(data){
				}
			});
		}
	
}

function savepayrec2(){
		var nbal=$('#bal').val();
		var total=$('#total').val();
		var refno=$('#refno').val();
		var lid=$('#ac79').find(':selected').val();
		var lname =$('#ac79 option:selected').text();
		var paycreditorid=$('#item79').find(':selected').val();
		var paycreditorname=$('#item79 option:selected').text();

		if(total==0||total==''){
				$().customAlert();
				alert('Error', '<p>No payment made.</p>');
				return false;
				
		}
		if(lid==''){
				$().customAlert();
				bhFieldError($('#ac79').parent().find('input:first'), '<p>Select account used to make the payment</p>');
				$('#ac79').parent().find('input:first').focus();
				return false;
		}else if(paycreditorid==''){
				$().customAlert();
				bhFieldError($('#paycreditorid').parent().find('input:first'), '<p>Please select a creditor and try again.</p>');
				$('#paycreditorid').parent().find('input:first').focus();
				return false;
		}else{
			$('#display').html(loader);
			$.ajax({
					url:'./data.php',
					data:{id:94,nbal:nbal,total:total,lid:lid,lname:lname,refno:refno,paycreditorid:paycreditorid,paycreditorname:paycreditorname},
					success:function(data){
					$('#display').html(data);
					}
			});	

	}
}
$(document).ready(function(){ 
	$("#pos1" ).combobox({});
	$("#acname3" ).combobox({});
	$( "#dept9" ).combobox({
		select: function(event,ui){
		 var dep9 = $('#dept9').val();
		$("#mainp").html(loader);
		$.ajax({
		url:'link.php',
		data:{id:35,dep9:dep9},
		success:function(data){
		$('#mainp').html(data);
		}
		});
		}
	});

	$( "#dept13" ).combobox({
		select: function(event,ui){
		 var dep = $('#dept13').val();
		$("#mainp").html(loader);
		$.ajax({
		url:'link.php',
		data:{id:54,dep:dep},
		success:function(data){
		$('#mainp').html(data);
		}
		});
		}
	});
});
function checkaccess(code,dep){
	var a = $('input[name=access' + code + ']:checked').val();
	if(a==1){b='YES'}else{b='NO'}
	if(code=='143'){
		$().customAlert();
		alert('Error!', '<p>No Changes Allowed for this specific functionality!</p>');
		e.preventDefault();	
		
	}
	else{
	$.ajax({
		url:'data.php',
		data:{id:95,code:code,dep:dep,b:b},
		success:function(data){
				$('#recentstude').html(data);
		}
	});
	}
}
function checkitemac(code,dep,c){
	var b = $('input[name=access' + c + ']:checked').val();
	if(b!=1){b=0}
	$.ajax({
		url:'data.php',
		data:{id:107,code:code,dep:dep,b:b},
		success:function(data){
				$('#recentstude').html(data);
		}
	});
	
}
function saveadmsumm(pid){
	var patid=$('#patno').val();
	var patname=$('#pname').val();
	var mode=$('#mode').val();
	var diag=$('#diagnosis').val();
	var code=$('#diagcode').val();
	var invoice=$('#invoice').val();
	var doctor=$('#doctor').val();
	var admdate=$('#datepick').val();
	var disdate=$('#datepick2').val();
	var odetail=$('#odetail').val();
	var in_presc_id=$('#in_presc_id').val();
	var in_patient_id=$('#in_patient_id').val();
	var billing = $('input[name=billing]:checked').val();
	var discharge = $('input[name=discharge]:checked').val();
	if(billing!=1){billing=0;}if(discharge!=1){discharge=0;}

	if(patid==''||patname==''||mode==''||diag==''||doctor==''||admdate==''||disdate==''||code==''){
		$().customAlert();
		alert('Error!', '<p>Enter the required fields!</p>');
		e.preventDefault();	
		
	}
	else if(billing==0||discharge==0){
		$().customAlert();
		alert('Error!', '<p>Confirm that billing has been done and the discharge summary processed.!</p>');
		e.preventDefault();	
		
	}
	else{
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'97',patid:patid,patname:patname,doctor:doctor,mode:mode,diag:diag,admdate:admdate,disdate:disdate,odetail:odetail,code:code,pid:pid,invoice:invoice,in_presc_id:in_presc_id,in_patient_id:in_patient_id},
	success:function(data){
	$('#newstudent').html(data);
	
	}
	});
	}
	
}
function issuecred(){
	$("#creditnote").prop("checked",false);
	openadmin();
}
function admitdat(pid){
		$("#bedan").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'98',pid:pid},
	success:function(data){
	$('#bedan').html(data);
	
	}
	});
}

function admitmsee(patid){
var wardid = $('#wardid').val();
var mainward = $('#mainward').val();
var wardtype = $('#wardtype').val();
var bedno = $('#wrdbedno').val();
var roomno = $('#wrdroomno').val();
var insid = $('#insid').val();
var insname = $('#insname').val();
var acctype = $('#acctype').val();
var typeclinics = $('#typeclinics').val();
var doc = $('#doctor').val();
var medrec = $('#medrecord').val();
var ipnosett = $('#ipnosett').val();
var ipno = $('#ipno').val();
var oldpatientid = $('#old_patient_id').val();
var patientname = $('#oname').val();

if(doc==''){
		$().customAlert();
		bhFieldError($('#doctor'), '<p>Select the name of the doctor in charge!</p>');
		$('#doctor').focus();
}
else if(insid==''||insname==''){
		$().customAlert();
		bhFieldError($('#paymode'), '<p>Select Mode of payment!</p>');
		$('#paymode').focus();
}
else if(acctype==''){
		$().customAlert();
		bhFieldError($('#acctype'), '<p>Select account type!</p>');
		$('#acctype').focus();
}
else if(typeclinics==''){
		$().customAlert();
		bhFieldError($('#typeclinics'), '<p>Select clinic!</p>');
		$('#typeclinics').focus();
}
else if(wardid==''||wardtype==''||bedno==''||roomno==''||mainward==''){
		$().customAlert();
		alert('Error!', '<p>Select the ward that the patient is being admitted to!</p>');
}
else if(ipnosett==0&&ipno==''){
		$().customAlert();
		bhFieldError($('#ipno'), '<p>Enter the current Inpatient No.!</p>');
		$('#ipno').focus();
}
else {
	$("#res2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:99,patid:patid,wardid:wardid,wardtype:wardtype,bedno:bedno,roomno:roomno,mainward:mainward,doc:doc,ipno:ipno,ipnosett:ipnosett,medrec:medrec,oldpatientid:oldpatientid,insid:insid,insname:insname,acctype:acctype,typeclinics:typeclinics,patientname:patientname},
	success:function(data){
	$('#res2').html(data);
	}
	});
	
	}
}

function submitbillward(regn){
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
		data:{id:101,regn:regn},
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
function enterinvmov(){
a=0;
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
	
	window.open("r/inventory-movement.php?id=61&code=" + a + '&' + "\nname=" + name);
	
}
else {window.open("r/inventory-movement.php?id=61&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}

// function generatedailystock(){
// a=0;
// var d1 = $('#datepick').val();
// var d2 = $('#datepick2').val();
// //var name = $('#itemname').val();
// var name = 'PHARMACY';
// var view = $('input[name=viewall]:checked').val();
// if(!(view)){
// view=0;
// }
// if(name==''){
// 		$().customAlert();
// 		alert('Error!', '<p>Enter the Name!</p>');
// 		e.preventDefault();	
// }
// else if((d1==''||d2=='')&&view==0){
// 		$().customAlert();
// 		alert('Error!', '<p>Enter the From and To dates!</p>');
// 		e.preventDefault();
// }
// else if(view==1){
	
// 	window.open("r/sv-daily-summary.php?id=61&code=" + a + '&' + "\nname=" + name);
	
// }
// else {window.open("r/sv-daily-summary.php?id=61&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
// }

function generatedailystock(){
	a=0;
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	//var name = $('#itemname').val();
	var name = 'PHARMACY';
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
	else {
		window.open("r/sv-daily-summary.php?id=61&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
		//window.open("r/stock-take.php?id=11&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
	}
		//window.open("r/stock-take.php?id=11&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
}

function generatedailystock2(){
	a=0;
	var d1 = $('#datepick').val();
	var d2 = $('#datepick2').val();
	var name = $('#itemname').val();
	//var name = 'ADMINISTRATION';
	var view = $('input[name=viewall]:checked').val();
	if(name==''){
			$().customAlert();
			alert('Error!', '<p>Enter the Name!</p>');
			e.preventDefault();	
	}
	else if((d1==''||d2=='')){
			$().customAlert();
			alert('Error!', '<p>Enter the From and To dates!</p>');
			e.preventDefault();
	}
	else {
		//window.open("r/sv-daily-summary2.php?id=61&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
		window.open("r/sv-daily-summary4.php?id=61&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
	}
		//window.open("r/stock-take.php?id=11&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
}

function generatedlog(){
	var a=606834;
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
		window.open("r/sv-drug-log.php?id=13&code=" + a + '&' + "\nname=" + name);	
	}
	else {
		window.open("r/sv-drug-log.php?id=13&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
	}
}

function generateAdminlog(){
	var a=606834;
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
		window.open("r/sv-drug-log2.php?id=13&code=" + a + '&' + "\nname=" + name);		
	}
	else {
		window.open("r/sv-drug-log2.php?id=13&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
	}
}

function invoicerep(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:45,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterinvoices(a){
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var timer1 = $('#timer1').val();
var timer2 = $('#timer2').val();
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
	
	window.open("r/invoices-reports.php?id=63&code=" + a + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);
	
}
else {window.open("r/invoices-reports.php?id=63&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\ntimer1=" + timer1 + '&' + "\ntimer2=" + timer2);
}

}
function entermessages(){

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
	window.open("output.php?id=3&code=" + a);
	
}
else {var a=2;
window.open("output.php?id=3&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}

}
function enterqueue(){

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
	var a=2;
	window.open("output.php?id=4&reg=" + a);
	
}
else {var a=3;
window.open("output.php?id=4&reg=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}

}
function invoicerep2(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:46,a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}


function enterinvoicesp(a){
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
	
	window.open("report.php?id=63&code=" + a + '&' + "\nname=" + name);
	
}
else {window.open("report.php?id=63&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}

function bincard(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:47},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}

function depbincard(){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:48},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function enterbincard(){
a=0;
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
	
	window.open("report.php?id=64&code=" + a + '&' + "\nname=" + name);
	
}
else {window.open("report.php?id=64&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
$( "#itemname101" ).combobox({});
function enterdepbincard(){
var a = $('#itemname101').val();
var d1 = $('#datepick').val();
var d2 = $('#datepick2').val();
var name = $('#itemname').val();
var view = $('input[name=viewall]:checked').val();
if(!(view)){
view=0;
}
if(name==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Department Name!</p>');
		e.preventDefault();	
}
else if(a==''){
		$().customAlert();
		alert('Error!', '<p>Enter the Item Name!</p>');
		e.preventDefault();	
}
else if((d1==''||d2=='')&&view==0){
		$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
}
else if(view==1){
	
	window.open("report.php?id=65&code=" + a + '&' + "\nname=" + name);
	
}
else {window.open("report.php?id=65&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
function openlinks(str){
	
	 var parts=str.split('θ',2);
	 var param=parts[0];
	 var cat=parts[1];
	switch(cat){
	case '1':
	$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:140,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
			break;
	case '2':
	$("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:43,pid:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
			break;
			
			case '3':
	window.open('report.php?id=4&rcptno=' + param);
			break;
			
			case '4':
			$("#mainp").html(loader);
			$.ajax({
				url:'link.php',
				data:{id:38,pid:param},
				success:function(data){
					$('#mainp').html(data);
				}
			});
			break;
			
			case '5':
			$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:136,pid:param},
				success:function(data){
					$('#mainp').html(data);
				}
			});
			break;
			case '6':
			$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:21,param:param},
				success:function(data){
					$('#mainp').html(data);
				}
			});
			break;
			case '7':
	window.open('patreport.php?id=1&reg=' + param);
			break;
			
			case '8':
			var b=8;
	window.open("report.php?id=13&code=" + b + '&' + "\nname=" + param);
			break;
			case '9':
			window.open('output.php?id=6&rcptno=' + param);
			break;
			case '10':
			window.open('report.php?id=1&rcptno=' + param);
			break;
			case '11':
			window.open('output.php?id=5&rcptno=' + param);
			break;
			case '12':
			$('#depbal').html(loader);
			$.ajax({
			url:'data.php',
			data:{id:118,code:param},
			success:function(data){
			$('#depbal').html(data);
			}
			});	
			break;
			case '13':
			$('#depbal').html(loader);
			$.ajax({
			url:'data.php',
			data:{id:119,code:param},
			success:function(data){
			$('#depbal').html(data);
			}
			});	
			break;

			case '14':
			$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:158,param:param},
				success:function(data){
					$('#mainp').html(data);
				}
			});
			break;
		
	 }
}
function openewday(a){
	var z = $('#drugs'+a).val();
	var w = $('#dose'+a).val();
	var x = $('#route'+a).val();
	var y = $('#notes'+a).val();
	if(w==''||x==''||y==''||z==''){
		$().customAlert();
		alert('Error!', '<p>Make Sure the drug name,dose,route and notes fields are filled!</p>');
		e.preventDefault();	
}else{
	$("#addnewday" ).dialog( "open" );
	 $('#daycode').val(a);
	return false;
}
}
function adsiku(){
var dat = $('#datepick16').val();
var a = $('#daycode').val();
if(dat==''){
			$().customAlert();
			alert('Error!', '<p>Enter a valid date!</p>');
			}
			else{
		$('#adsiku').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:106,dat:dat,a:a},
		success:function(data){
		$('#adsiku').html(data);
		}
		});	
		}	
}
function depincome(a){	
	$("#mainp").html(loader);
	$.ajax({
	url:'link.php',
	data:{id:'52',a:a},
	success:function(data){
	$('#mainp').html(data);
	}
	});
}
function opencomp(){
	$("#addnewcomp" ).dialog( "open" );
	return false;
}
function openbank(){
	$("#addnewbank" ).dialog( "open" );
	return false;
}
function addnewcomp(){
	var name=$('#compname').val();
	var dept=$('#compdep').val();
	var ip=$('#compip').val();
	if(name==''||dept==''||ip==''){
	$().customAlert();
		alert('Error!', '<p>Make Sure you fill all the required fields!</p>');
		e.preventDefault();		
	}
	
	else{	
	$("#newcomp").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'110',name:name,dept:dept,ip:ip},
	success:function(data){
		$('#newcomp').html(data);
	
	}
	});
	}
}
function addnewbank(){
	var name=$('#bankname').val();
	if(name==''){
	$().customAlert();
		alert('Error!', '<p>Fill the bank name!</p>');
		e.preventDefault();		
	}
	
	else{	
	$("#newbank").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'113',name:name},
	success:function(data){
		$('#newbank').html(data);
	
	}
	});
	}
}

function savecashcollect(){
	var cr=$('#crledger').val();
	var crname=$('#crledger option:selected').text();
	var amount=$('#amount').val();
	var desc=$('#desc').val();
	var datepick2=$('#datepick2').val();
	var cashcol_depositacntid=$('#cashcol_depositacntid').find(':selected').val();
	var cashcol_depositacntname=$('#cashcol_depositacntid').find(':selected').val();
	if(cr==''||amount==''||desc==''||datepick2==''||cashcol_depositacntid==''){
	$().customAlert();
			alert('Error', '<p>All the fields are required!</p>');
			return false;
	}else{
			$("#postresp").html(loader);
			$.ajax({
					url:'./data.php',
					data:{id:'114',cr:cr,amount:amount,desc:desc,crname:crname,datepick2:datepick2,cashcol_depositacntid:cashcol_depositacntid,cashcol_depositacntname:cashcol_depositacntname},
					success:function(data){
							$('#postresp').html(data);
					}
			});

	}

}

function saveexpman(){
	var expensemgt_acntid=$('#expensemgt_acntid').find(':selected').val();
	var expensemgt_acntname=$('#expensemgt_acntid option:selected').text();
	var expense_payfrm_acntid=$('#expense_payfrm_acntid').find(':selected').val();
	var expense_payfrm_acntname=$('#expense_payfrm_acntid option:selected').text();
	var expense_departmentid=$('#expense_departmentid').find(':selected').val();
	var expense_departmentname=$('#expense_departmentid option:selected').text();
	var expensemgt_acntid_subledgerid=$('#expensemgt_acntid_subledgerid').find(':selected').val();
	var expense_payfrm_subledgerid=$('#expense_payfrm_subledgerid').find(':selected').val();
	var amount=$('#amount').val();
	var desc=$('#desc').val();
	var expensedate=$('#datepick').val();
	var expense_refno=$('#expense_refno').val();

	var sb=$('#expensemgt_acntid').find(':selected').data('main');
	if(parseInt(sb)==1){
			if(expensemgt_acntid_subledgerid==''||isNaN(expensemgt_acntid_subledgerid)){
					$().customAlert();
							alert('Error', '<p>Please select a valid expense subaccount.</p>');
					return false;				
			}
	}

	var sbc=$('#expense_payfrm_acntid').find(':selected').data('main');
	if(parseInt(sbc)==1){
			if(expense_payfrm_subledgerid==''||isNaN(expense_payfrm_subledgerid)){
					$().customAlert();
							alert('Error', '<p>Please select bank or cash subaccount.</p>');
					return false;				
			}
	}

	if(expensemgt_acntid==''||amount==''||desc==''||expense_payfrm_acntid==''||expense_departmentid==''){
			$().customAlert();
			alert('Error', '<p>All the fields are required!</p>');
			return false;
	}else{
			$("#postresp").html(loader);
					$.ajax({
					url:'./data.php',
					data:{id:'115',expensemgt_acntid:expensemgt_acntid,amount:amount,desc:desc,expensemgt_acntname:expensemgt_acntname,expensedate:expensedate,expense_refno:expense_refno,expense_departmentid:expense_departmentid,expense_departmentname:expense_departmentname,expense_payfrm_acntname:expense_payfrm_acntname,expense_payfrm_acntid:expense_payfrm_acntid,expensemgt_acntid_subledgerid:expensemgt_acntid_subledgerid,expense_payfrm_subledgerid:expense_payfrm_subledgerid},
					success:function(data){
							$('#postresp').html(data);
					}
			});
	}

}

function savebankdep(){
	var cashdepo_bankledgerid=$('#cashdepo_bankledgerid').find(':selected').val();
	var cashdepo_bankledgername=$('#cashdepo_bankledgerid').find(':selected').text();
	var cashdepo_cashledgerid=$('#cashdepo_cashledgerid').find(':selected').val();
	var cashdepo_cashledgername=$('#cashdepo_cashledgerid').find(':selected').text();
	var cashdepo_amount=$('#cashdepo_amount').val();
	var cashdepo_refno=$('#cashdepo_refno').val();
	var cashdepo_desc=$('#cashdepo_desc').val();
	var cashdepo_datepick2=$('#cashdepo_datepick2').val();
	var cashdepo_cash_subledgerid=$('#cashdepo_cash_subledgerid').find(':selected').val();
	var cashdepo_bank_subledgerid=$('#cashdepo_bank_subledgerid').find(':selected').val();
	var cashdepo_otherincomes_debtorid=$('#cashdepo_otherincomes_debtorid').find(':selected').val();
	var cashdepo_otherincomes_departmentid=$('#cashdepo_otherincomes_departmentid').find(':selected').val();
	
	if(cashdepo_cashledgerid=='' || cashdepo_bankledgerid==''||cashdepo_amount==''||cashdepo_refno==''||cashdepo_datepick2==''){
	$().customAlert();
			alert('Error', '<p>All the fields are required!</p>');
			return false;
	}
	else if(parseFloat(cashdepo_amount)<0||parseFloat(cashdepo_amount)==0 ){
	$().customAlert();
			alert('Error', '<p>Please enter deposit amount</p>');
			return false;
	}else if(parseInt(cashdepo_cashledgerid)!=670 && (cashdepo_otherincomes_debtorid==''||cashdepo_otherincomes_departmentid=='') ){
	$().customAlert();
			alert('Error', '<p>Department and debtor name are required for other incomes.</p>');
			return false;
	}else{
			$("#postresp").html(loader);
			$.ajax({
					url:'./data.php',
					data:{id:'116',cashdepo_bankledgerid:cashdepo_bankledgerid,cashdepo_bankledgername:cashdepo_bankledgername,cashdepo_amount:cashdepo_amount,cashdepo_refno:cashdepo_refno,cashdepo_datepick2:cashdepo_datepick2,cashdepo_desc:cashdepo_desc,cashdepo_cashledgerid:cashdepo_cashledgerid,cashdepo_cashledgername:cashdepo_cashledgername,cashdepo_bank_subledgerid:cashdepo_bank_subledgerid,cashdepo_cash_subledgerid:cashdepo_cash_subledgerid,cashdepo_otherincomes_debtorid:cashdepo_otherincomes_debtorid,cashdepo_otherincomes_departmentid:cashdepo_otherincomes_departmentid},
					success:function(data){
							$('#postresp').html(data);
					}
			});
	}

}
function tickinv(tno,amount){
	var total=$('#total').val();
	if(total==''){total=0}
	var rec = $('input[name=check'+ tno + ']:checked').val();
	if(rec==1){
		var tot=parseInt(total,10)+ parseInt(amount,10);
		$('#total').val(tot);
		
		$.ajax({
				url:'./link.php',
				data:{id:61,tno:tno},
				success:function(data){
				}
			});
		
		
		}
		else{
			var tot=parseInt(total,10)- parseInt(amount,10);
		$('#total').val(tot);
		$.ajax({
				url:'./link.php',
				data:{id:62,tno:tno},
				success:function(data){
				}
			});
		}
	
}
function submitconsinvoice(patid){
	var total=$('#total').val();
		if(total==0||total==''){
				$().customAlert();
				alert('Error!', '<p>No Invoices consolidated!</p>');
				return false;
		}
		
	else{
		$('#newstudent').html(loader);
		$.ajax({
		url:'./data.php',
		data:{id:117,amount:total,patid:patid},
		success:function(data){
		$('#newstudent').html(data);
		}
		});	
	}
}
function getstock(dep1,dep2){
			$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:52,dep1:dep1,dep2:dep2},
				success:function(data){
				$('#mainp').html(data);
				}
			});	
}
function enterstockval(){
a=2;
var dept = $('#dept89').val();
var section = $('#categ90').val();
var categ = $('#subcateg89').val();
if(section=='All'){
	categ='All';a=0;}
if(categ=='All'&&section!='All'){a=1;}
if(dept==''){
		$().customAlert();
		alert('Error!', '<p>Select a Department!</p>');
		e.preventDefault();
}
else if(section==''){
		$().customAlert();
		alert('Error!', '<p>Select a section!</p>');
		e.preventDefault();
}
else if(categ==''&&section!='All'){
		$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
		e.preventDefault();
}
else {
	

	window.open("report.php?id=48&code=" + a + '&' + "\nrcptno=" + dept + '&' + "\nsection=" + section + '&' + "\ncateg=" + categ);}

}
function enterreorder(){
a=2;
var section = $('#categ90').val();
var categ = $('#subcateg89').val();
if(section=='All'){
categ='All';}
if(categ=='All'&&section!='All'){}
if(section==''){
		$().customAlert();
		alert('Error!', '<p>Select a section!</p>');
		e.preventDefault();
}
else if(categ==''&&section!='All'){
		$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
		e.preventDefault();
}
else {
	

	window.open("report.php?id=54&code=" + a + '&' + "\nsection=" + section + '&' + "\ncateg=" + categ);}

}


function enterreturn(a){
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
	
	window.open("output.php?id=9&code=" + a);
}
else {window.open("output.php?id=9&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);}
}
function enterreturnrep(a){
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
	
	window.open("output.php?id=9&code=" + a + '&' + "\nname=" + name);
}
else {window.open("output.php?id=9&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);}
}
$(document).ready(function(){ 
	$( "#categ90" ).combobox({
		select: function(event,ui){
		 var name = $('#categ90').val();
		 if(name!='All'){
		 $("#letacateg").html(loader);
				$.ajax({
					url:'link.php',
					data:{id:71,name:name},
					success:function(data){
					$('#letacateg').html(data);
					}
				});
		 }
		 }
		
	});

	$( "#categ909" ).combobox({
		select: function(event,ui){
		 var name = $('#categ909').val();
		 if(name!='All'){
		 $("#letacateg909").html(loader);
				$.ajax({
					url:'link.php',
					data:{id:71,name:name},
					success:function(data){
					$('#letacateg909').html(data);
					}
				});
		 }
		 }
		
	});
});
function enterstockval2(){
a=2;
var dept = $('#dept89').val();
var section = $('#categ909').val();
var categ = $('#subcateg89').val();
if(section=='All'){
	categ='All';a=0;}
if(categ=='All'&&section!='All'){a=1;}
if(dept==''){
		$().customAlert();
		alert('Error!', '<p>Select a Department!</p>');
		e.preventDefault();
}
else if(section==''){
		$().customAlert();
		alert('Error!', '<p>Select a section!</p>');
		e.preventDefault();
}
else if(categ==''&&section!='All'){
		$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
		e.preventDefault();
}
else {
	

	window.open("report.php?id=79&code=" + a + '&' + "\nrcptno=" + dept + '&' + "\nsection=" + section + '&' + "\ncateg=" + categ);}

}

function enterstocktaking(){
a=2;
var dept = $('#dept89').val();
var section = $('#categ90').val();
var categ = $('#subcateg89').val();
if(section=='All'){
	categ='All';a=0;}
if(categ=='All'&&section!='All'){a=1;}
if(dept==''){
		$().customAlert();
		alert('Error!', '<p>Select a Department!</p>');
		e.preventDefault();
}
else if(section==''){
		$().customAlert();
		alert('Error!', '<p>Select a section!</p>');
		e.preventDefault();
}
else if(categ==''&&section!='All'){
		$().customAlert();
		alert('Error!', '<p>Select a Category!</p>');
		e.preventDefault();
}
else {
	

	window.open("report.php?id=48&code=" + a + '&' + "\nrcptno=" + dept + '&' + "\nsection=" + section + '&' + "\ncateg=" + categ);
	window.open("report.php?id=49&code=" + a + '&' + "\nrcptno=" + dept + '&' + "\nsection=" + section + '&' + "\ncateg=" + categ);}

}

function searchreception(){
	$('#searchres').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:75},
	success:function(data){
	$('#searchres').html(data);
	}
	});	
}
function searchallpatients(){
	$('#searchres').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:75},
	success:function(data){
	$('#searchres').html(data);
	}
	});	
}
$('#patientnorecep').on('keydown', function(ex) {
	if (!ex) ex = event;
		var param = $('#patientnorecep').val();
	if (ex.keyCode==13&&param!=''){ 
	$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:136,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	
	}
});
$('#patientnoall').on('keydown', function(ex) {
	if (!ex) ex = event;
		var param = $('#patientnoall').val();
		var ser = $('#ser').val();
	if (ex.keyCode==13&&param!=''){ 
	$("#mainp").html(loader);
			$.ajax({
				url:'bridge.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#mainp').html(data);
				}
			});
	
	}
});
$('#patientnoccc').on('keydown', function(ex) {
	if (!ex) ex = event;
		var param = $('#patientnoccc').val();
		var d = $('#d').val();
		var ser = $('#ser').val();
	if (ex.keyCode==13&&param!=''){ 
	$("#tabs-"+d).html(loader);
			$.ajax({
				url:'link.php',
				data:{id:ser,param:param},
				success:function(data){
				$('#tabs-'+d).html(data);
				}
			});
	
	}
});

function applywaiver(patid){
	var names=$('#oname').val();
	
	var amp=$('#amp1').val();
	var amc=$('#amc1').val();
	var amw=$('#amw1').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var diagn=$('#diagn1').val();
	var rcpt=$('#rcpt1').val();

	removeArea('social1',area41);
	var social=$('#social1').val();
	addArea('social1',area41);
	
	
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'122',patid:patid,names:names,amp:amp,amc:amc,amw:amw,diagn:diagn,rcpt:rcpt,social:social},
	success:function(data){
	$('#newstudent2').html(data);
	}
	});

}

function calcsocial(a){
var amp = $('#amp'+a).val();
var amc = $('#amc'+a).val();
if(amp==''){amp=0;}
if(amc==''){amc=0;}
amw=parseInt(amc,10) - parseInt(amp,10);
amw=(amw).formatMoney(2, '.', ',');
$('#amw'+a).val(amw);

}
$(document).ready(function(){ 
	$( "#waivernos" ).combobox({
		select: function(event,ui){
		 var param = $('#waivernos').val();
			 $("#display").html(loader);
				$.ajax({
					url:'bridge.php',
					data:{id:161,pid:param},
					success:function(data){
						$('#display').html(data);
					
					}
				});
		}
	});
});
function editwaiver(wid){
	var amp=$('#amp2').val();
	var amc=$('#amc2').val();
	var amw=$('#amw2').val().replace(/[&\/\\#,+()$~%'":*?<>{}]/g,'');
	var diagn=$('#diagn2').val();
	var rcpt=$('#rcpt2').val();
	var waiverno=$('#waiverno2').val();

	removeArea('social2',area42);
	var social=$('#social2').val();
	addArea('social2',area42);
	
	
	$("#newstudent3").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:'123',wid:wid,amp:amp,amc:amc,amw:amw,diagn:diagn,rcpt:rcpt,social:social,waiverno:waiverno},
	success:function(data){
	$('#newstudent3').html(data);
	}
	});

}

function addnewccc(){

	
	var regn=$('#regn').val();
	var names=$('#names').val();
	
	var dob=$('#dob').val();
	var gender = $('#gender').val();
	var phone=$('#phone').val();
	var email=$('#email').val();
	var postal=$('#postal').val();
	var bgroup=$('#bgroup').val();
	
	var gname=$('#gname').val();
	var rship=$('#rship').val();
	var gphone=$('#gphone').val();
	var gaddress=$('#gaddress').val();
	
	
	
	if(regn==''||names==''||phone==''||dob==''){
		$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();
	}
	else{	
	$("#newstudent").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:125,regn:regn,names:names,dob:dob,gender:gender,phone:phone,email:email,postal:postal,gname:gname,rship:rship,gphone:gphone, gaddress:gaddress, bgroup:bgroup},
	success:function(data){
		$('#newstudent').html(data);
	
	}
	});
	}
}
function loadccpats(a){

	$("#tabs-"+a).html(loader);
	$.ajax({
	url:'link.php',
	data:{id:79,a:a},
	success:function(data){
	$('#tabs-'+a).html(data);
	
	}
	});
}
function loadcounspats(a){

	$("#tabs-"+a).html(loader);
	$.ajax({
	url:'link.php',
	data:{id:89,a:a},
	success:function(data){
	$('#tabs-'+a).html(data);
	
	}
	});
}
function loadccpresc(a){


	$("#tabs-"+a).html(loader);
	$.ajax({
	url:'link.php',
	data:{id:83,a:a},
	success:function(data){
	$('#tabs-'+a).html(data);
	
	}
	});
}
function loadcounspresc(a){


	$("#tabs-"+a).html(loader);
	$.ajax({
	url:'link.php',
	data:{id:92,a:a},
	success:function(data){
	$('#tabs-'+a).html(data);
	
	}
	});
}
function searchccc(){
	$('#searchccc').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:80},
	success:function(data){
	$('#searchccc').html(data);
	}
	});	
}
function searchcouns(){
	$('#searchccc').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:90},
	success:function(data){
	$('#searchccc').html(data);
	}
	});	
}
$(document).ready(function(){ 
	$(".pnt5" ).combobox({
		select: function(event,ui){
		 var m = $('#menusearch').val();
		 var param = $('#pnt5' + m).val();
		 var ser = $('#ser').val();
		  var d = $('#d').val();
		 $("#tabs-"+d).html(loader);
				$.ajax({
					url:'link.php',
					data:{id:ser,param:param},
					success:function(data){
					 $("#tabs-"+d).html(data);
					}
				});
		}
		
	});
	$(".pnt6" ).combobox({
		select: function(event,ui){
		 var m = $('#menusearch').val();
		 var param = $('#pnt6' + m).val();
		 var ser = $('#ser').val();
		  var d = $('#d').val();
		 $("#tabs-"+d).html(loader);
				$.ajax({
					url:'link.php',
					data:{id:ser,param:param},
					success:function(data){
					 $("#tabs-"+d).html(data);
					}
				});
		}
		
	});
});
function editpatccc(regn){

	
	var names=$('#names2').val();
	
	var dob=$('#dob2').val();
	var gender = $('#gender2').val();
	var phone=$('#phone2').val();
	var email=$('#email2').val();
	var postal=$('#postal2').val();
	var bgroup=$('#bgroup2').val();
	
	var gname=$('#gname2').val();
	var rship=$('#rship2').val();
	var gphone=$('#gphone2').val();
	var gaddress=$('#gaddress2').val();
	
	
	
	if(regn==''||names==''||phone==''||dob==''){
		$().customAlert();
		alert('Error!', '<p>Make sure you fill all the required details!</p>');
		e.preventDefault();
	}
	else{	
	$("#newstudent2").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:126,regn:regn,names:names,dob:dob,gender:gender,phone:phone,email:email,postal:postal,gname:gname,rship:rship,gphone:gphone, gaddress:gaddress, bgroup:bgroup},
	success:function(data){
		$('#newstudent2').html(data);
	
	}
	});
	}
}

function startccc(regn){

	if(regn==''){
		$().customAlert();
		alert('Error!', '<p>Enter the registration number!</p>');
		e.preventDefault();
	}
	else{	
	$("#newstudent3").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:127,regn:regn},
	success:function(data){
		$('#newstudent3').html(data);
	
	}
	});
	}
}
function startcouns(regn){

	if(regn==''){
		$().customAlert();
		alert('Error!', '<p>Enter the registration number!</p>');
		e.preventDefault();
	}
	else{	
	$("#newstudent3").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:132,regn:regn},
	success:function(data){
		$('#newstudent3').html(data);
	
	}
	});
	}
}
$(document).ready(function(){ 
	$( "#cons29" ).combobox({
		select: function(event,ui){
		 var param = $('#cons29').val();
		 var ser = $('#ser').val();
		var d = $('#d').val();
		 $("#tabs-"+d).html(loader);
				$.ajax({
					url:'link.php',
					data:{id:ser,param:param},
					success:function(data){
					 $("#tabs-"+d).html(data);
					}
				});
		}
	});
});
function saveconsccc(pid){

	

	var temp=$('#temp').val();
	var bp=$('#bp').val();
	var weight = $('#weight').val();
	var pr=$('#pr').val();
	var br=$('#br').val();
	var history=$('#history').val();
	var diagnosis=$('#diagnosis').val();
	var lab=$('#lab').val();
	

	
	$("#newstudent4").html(loader);
	$.ajax({
	url:'data.php',
	data:{id:128,pid:pid,temp:temp,bp:bp,weight:weight,pr:pr,br:br,history:history,diagnosis:diagnosis,lab:lab},
	success:function(data){
		$('#newstudent4').html(data);
	
	}
	});
	
}

function savenutccc(pid){
	removeArea('nutrition',area42);
	var notes=$('#nutrition').val();
	addArea('nutrition',area42);	
	
	$('#newstudent5').html(loader);
	$.ajax({
	url:'data.php',
	data:{id:129,pid:pid,notes:notes},
	success:function(data){
	$('#newstudent5').html(data);
	}
	});
}
function saveconccc(pid){
	removeArea('counselling',area43);
	var notes=$('#counselling').val();
	addArea('counselling',area43);	
	
	$('#newstudent6').html(loader);
	$.ajax({
	url:'data.php',
	data:{id:130,pid:pid,notes:notes},
	success:function(data){
	$('#newstudent6').html(data);
	}
	});
}
function saveconmain(pid){

	var subcat=$('#subcat').val();

	if(subcat==''){
		$().customAlert();
		alert('Error!', '<p>Select the sub-category</p>');
		e.preventDefault();
	}
	else{


		removeArea('counselling',area43);
		var notes=$('#counselling').val();
		addArea('counselling',area43);	
		
		$('#newstudent6').html(loader);
		$.ajax({
		url:'data.php',
		data:{id:133,pid:pid,notes:notes,subcat:subcat},
		success:function(data){
		$('#newstudent6').html(data);
		}
		});
	}
}
function savepharmccc(pid){
	removeArea('prescription',area44);
	var notes=$('#prescription').val();
	addArea('prescription',area44);	
	
	$('#newstudent7').html(loader);
	$.ajax({
	url:'data.php',
	data:{id:131,pid:pid,notes:notes},
	success:function(data){
	$('#newstudent7').html(data);
	}
	});
}
function enterccc1(){
var a=1;	
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
	var a=0;
	window.open("report.php?id=31.1&code=" + a);
	
}
else {window.open("report.php?id=31.1&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2);
}

}

function enterccc2(){
var a=1;	
var d1 = $('#datepick3').val();
var d2 = $('#datepick4').val();
var name = $('#itemname').val();
var view = $('input[name=viewall2]:checked').val();
if(!(view)){
view=0;
}
if((d1==''||d2=='')&&view==0){
	$().customAlert();
		alert('Error!', '<p>Enter the From and To dates!</p>');
		e.preventDefault();
		
}
else if(view==1){
	var a=0;
	window.open("report.php?id=31.2&code=" + a + '&' + "\nname=" + name);
	
}
else {window.open("report.php?id=31.2&code=" + a + '&' + "\nd1=" + d1 + '&' + "\nd2=" + d2 + '&' + "\nname=" + name);
}

}
function loadsubcat(a){

	$('#subcategory').html(loader);
	$.ajax({
	url:'link.php',
	data:{id:94,a:a},
	success:function(data){
	$('#subcategory').html(data);
	}
	});
}

$(document).ready(function(){ 
	$( "#disease" ).combobox({
		select: function(event,ui){
		var str =$('#disease').val();
		var parts=str.split('θ',2)
		var k=parts[0];
		var param=parts[1];
		
		var prev=$("#diseases").html();
		var curr =prev + "<div class=\"tag alert-info alert-dismissable\" id=\"lantag" + k + "\"><button type=\"button\" class=\"close\" onclick=\"dismissdis('" + k + "')\"  aria-hidden=\"true\">&times;</button>" + param + "</div></div>";
		
		$.ajax({
		url:'bridge.php',
		data:{id:'95.1',param:param,k:k,cat:'dis'},
		success:function(data){
			$('#diseases').html(data);
			$("#disease").parent().find("input:first").val('').focus();
			}
		});

		
			}
		
	});
});

function dismissdis(param){
	

	$.ajax({
	url:'bridge.php',
	data:{id:'95.2',param:param,cat:'dis'},
	success:function(data){
		$('#diseases').html(data);
		$("#disease").parent().find("input:first").val('').focus();
		}
	});
}
function onboardBalsPanel(){
		$.ajax({
				url:'r/new-bridge.php',
				type:'post',
				data:{src_id:3},
				success:function(res){
						$('#mainp').html(res);
						$('#onboardbals_category').on('change',function(e){
								var onboardbals_category=$(this).find(':selected').val();
								if(onboardbals_category!==''){
										$.ajax({
												url:'r/new-bridge.php',
												type:'post',
												data:{src_id:4,onboardbals_category:onboardbals_category},
												success:function(resp){
														$('#onboardbals_catarea').html(resp);
														$("#onboardbals_transdate").datepicker();
														$('#saveonboardbals_btn').on('click',function(e){
																var onboardbalsDiv=$('#onboardbals_catarea');
																var onboardbals_transdate=onboardbalsDiv.find('#onboardbals_transdate').val();
																var onboardbals_subjecttype=onboardbalsDiv.find('#onboardbals_subjecttype').val();
																var onboardbals_subjectid=onboardbalsDiv.find('#onboardbals_subjectid :selected').val();
																var onboardbals_transamt=onboardbalsDiv.find('#onboardbals_transamt').val();
																var onboardbals_departmentid=onboardbalsDiv.find('#onboardbals_departmentid :selected').val();
																if(onboardbals_subjecttype==''){
																	return false;
																}else if(parseFloat(onboardbals_transamt)==0 || isNaN(onboardbals_transamt)){
																		$().customAlert();
																			alert('Error', '<p>Please enter amount and try again</p>');
																			return false;																	
																}else if(onboardbals_subjecttype!='BankNoDepartment' && (parseInt(onboardbals_departmentid)==0 || isNaN(onboardbals_departmentid) || onboardbals_departmentid=='') ){
																		$().customAlert();
																			alert('Error', '<p>Please select department and try again</p>');
																			return false;																	
																}else if(onboardbals_transamt=='' || onboardbals_transdate=='' || onboardbals_subjecttype=='' || onboardbals_subjectid==''){
																		$().customAlert();
																			alert('Error', '<p>Please fill all required fields and try again</p>');
																			return false;
																}else {
																	$.ajax({
																		url:'r/data.php',
																		type:'post',
																		data:{src_id:4,onboardbals_transdate:onboardbals_transdate,onboardbals_transamt:onboardbals_transamt,onboardbals_subjectid:onboardbals_subjectid,onboardbals_subjecttype:onboardbals_subjecttype,onboardbals_departmentid:onboardbals_departmentid},
																		success:function(res){
																			onboardBalsPanel();
																			alert(res);
																		}
																	});
																}

														});

														$('#onboardbals_subjectid').on('change',function(e){
																var onboardingContainer=$('#onboardbals_catarea');
																var onboarding_subjecttype=onboardingContainer.find('#onboardbals_subjecttype').val();
																var onboarding_subjectid=onboardingContainer.find('#onboardbals_subjectid :selected').val();
																	onboardingContainer.find('#onboardbals_acnt_currentbal').val('');
																if(onboarding_subjectid=='' || onboarding_subjecttype==''){
																		$().customAlert();
																			alert('Error', '<p>Please fill all required fields and try again</p>');
																			return false;
																}else {
																		$.ajax({
																				url:'r/data.php',
																				type:'post',
																				data:{src_id:6,onboarding_subjectid:onboarding_subjectid,onboarding_subjecttype:onboarding_subjecttype},
																				success:function(res){
																					onboardingContainer.find('#onboardbals_acnt_currentbal').val(res);
																				}
																		});
																}

														});




												}
										});									
								}else{
										$().customAlert();
											alert('Error', '<p>Please select a category.</p>');
											return false;									
								}
						});


				}
		});



}

function manageAssetsPanel(){
		$.ajax({
				url:'r/new-bridge.php',
				type:'post',
				data:{src_id:5},
				success:function(res){
						$('#mainp').html(res);
						$('#assetmanagement_action').on('change',function(e){
								var assetmanagement_action=$(this).find(':selected').val();
								if(assetmanagement_action!==''){
										$.ajax({
												url:'r/new-bridge.php',
												type:'post',
												data:{src_id:6,assetmanagement_action:assetmanagement_action},
												success:function(resp){
														$('#asset_management_container').html(resp);
														$("#assetmanagement_purchasedate").datepicker();
														$('#saveonboardbals_btn').on('click',function(e){
																var onboardbalsDiv=$('#asset_management_container');
																var assetmanagement_purchasedate=onboardbalsDiv.find('#assetmanagement_purchasedate').val();
																var onboardbals_subjecttype=onboardbalsDiv.find('#onboardbals_subjecttype').val();
																var onboardbals_subjectid=onboardbalsDiv.find('#onboardbals_subjectid :selected').val();
																var onboardbals_transamt=onboardbalsDiv.find('#onboardbals_transamt').val();
																var onboardbals_departmentid=onboardbalsDiv.find('#onboardbals_departmentid :selected').val();
																if(onboardbals_subjecttype==''){
																	return false;
																}else if(parseFloat(onboardbals_transamt)==0 || isNaN(onboardbals_transamt)){
																		$().customAlert();
																			alert('Error', '<p>Please enter amount and try again</p>');
																			return false;																	
																}else if(onboardbals_subjecttype!='BankNoDepartment' && (parseInt(onboardbals_departmentid)==0 || isNaN(onboardbals_departmentid) || onboardbals_departmentid=='') ){
																		$().customAlert();
																			alert('Error', '<p>Please select department and try again</p>');
																			return false;																	
																}else if(onboardbals_transamt=='' || assetmanagement_purchasedate=='' || onboardbals_subjecttype=='' || onboardbals_subjectid==''){
																		$().customAlert();
																			alert('Error', '<p>Please fill all required fields and try again</p>');
																			return false;
																}else {
																	$.ajax({
																		url:'r/data.php',
																		type:'post',
																		data:{src_id:4,onboardbals_transdate:assetmanagement_purchasedate,assetmanagement_purchasedate:onboardbals_transamt,onboardbals_subjectid:onboardbals_subjectid,onboardbals_subjecttype:onboardbals_subjecttype,onboardbals_departmentid:onboardbals_departmentid},
																		success:function(res){
																			onboardBalsPanel();
																			alert(res);
																		}
																	});
																}

														});

														$('#onboardbals_subjectid').on('change',function(e){
																var onboardingContainer=$('#onboardbals_catarea');
																var onboarding_subjecttype=onboardingContainer.find('#onboardbals_subjecttype').val();
																var onboarding_subjectid=onboardingContainer.find('#onboardbals_subjectid :selected').val();
																	onboardingContainer.find('#onboardbals_acnt_currentbal').val('');
																if(onboarding_subjectid=='' || onboarding_subjecttype==''){
																		$().customAlert();
																			alert('Error', '<p>Please fill all required fields and try again</p>');
																			return false;
																}else {
																		$.ajax({
																				url:'r/data.php',
																				type:'post',
																				data:{src_id:6,onboarding_subjectid:onboarding_subjectid,onboarding_subjecttype:onboarding_subjecttype},
																				success:function(res){
																					onboardingContainer.find('#onboardbals_acnt_currentbal').val(res);
																				}
																		});
																}

														});




												}
										});									
								}else{
										$().customAlert();
											alert('Error', '<p>Please select a category.</p>');
											return false;									
								}
						});


				}
		});



}

