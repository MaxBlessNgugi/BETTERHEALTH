function Display_Load()
{
$("#loading").fadeIn(900,0);
$("#display").html('<img id="img-spinner" src="images/load.gif" style="position:absolute; top:45%; left:50%" alt="Loading"/>');
}
//Hide Loading Image
function Hide_Load()
{
$("#loading").fadeOut('slow');


}


function paginate(ser,param)
{	

$("#pagination li:first")
.css({'color' : '#FF0084'}).css({'border' : 'solid #999 1px'});
Display_Load();
$("#display").load("pagination.php?page=1&ser=" + ser,"param=" + param, Hide_Load());

//Pagination Click
$("#pagination li").click(function(){
Display_Load();
//CSS Styles
$("#pagination li")
  .css({'border' : 'solid #999 1px'})
.css({'color' : '#0063DC'});

$(this)
.css({'color' : '#FF0084'})
.css({'border' : 'solid #999 1px'});
//Loading Data
var pageNum = this.id;
var tit=$('#title').html();
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param, Hide_Load());
});

}


function pagerefresh(pageNum,ser,param){

Display_Load();
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param, Hide_Load());	
}


function paginateteach(ser,param,page)
{	

Display_Load();


$("#pagination li")
  .css({'border' : 'solid #999 1px'})
.css({'color' : '#0063DC'});


//Loading Data
var pageNum = page;
var tit=$('#title').html();
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param, Hide_Load());


}

function paginatesub(ser,param,page,subid)
{
var ed=$('#datepick').val();	
Display_Load();
//CSS Styles
$("#pagination li")
  .css({'border' : 'solid #999 1px'})
.css({'color' : '#0063DC'});


var pageNum = page;
var tit=$('#title').html();
$("#display").load("pagination.php?page=" + pageNum ,"\nser=" + ser + '&' + "\nparam=" + param + '&' + "\nsubid=" + subid + '&' + "\ned=" + ed, Hide_Load());

}

function catepage(ser,page,param,subid){
Display_Load();
$("#display").load("pagination.php?page=" + page ,"\nser=" + ser + '&' + "\nparam=" + param + '&' + "\nsubid=" + subid, Hide_Load());
}
$('#datepick').live('mouseover', function() {
						$( "#datepick" ).datepicker();
						function backal(d){
							alert(d);
							$( "#datepick" ).datepicker();
						}
				
						});
						$('#datepick2').live('mouseover', function() {
						$( "#datepick2" ).datepicker();
						});
						
						$('#datepick3').live('mouseover', function() {
						$( "#datepick3" ).datepicker();
						});
						$('#datepick4').live('mouseover', function() {
						$( "#datepick4" ).datepicker();
						});
						$('#datepick5').live('mouseover', function() {
						$( "#datepick5" ).datepicker();
						});
						$('#datepick6').live('mouseover', function() {
						$( "#datepick6" ).datepicker();
						});
						$('#datepick7').live('mouseover', function() {
						$( "#datepick7" ).datepicker();
						});
						$('#datepick8').live('mouseover', function() {
						$( "#datepick8" ).datepicker();
						});
						
$( "#ncalendar" ).dialog({autoOpen: false,modal: true});
$( "#newcalendar" ).click(function() {
		$( "#ncalendar" ).dialog( "open" );
		return false;
		});
		
$( "#nevent" ).dialog({autoOpen: false,modal: true});
$( "#newevent" ).click(function() {
		$( "#nevent" ).dialog( "open" );
	$('#pname2').val('');
	$('#pidd2').val('');
	$('#subject2').val('');
	$('#crex2').val(1);
	$('#eid2').val('');
	$('#location2').val('');
	$('#category2').val('');
	$('#datepick6').val('');
	$('#datepick4').val('');
	$('#datepick5').val('');
	$('#recpattern').val('');
	$('#status2').val('');
	$('#priority2').val('');
	$('#completer2').val('');
		return false;
});

$(document).ready(function(){
	$("#itemn" ).combobox();
		$( "#toggle" ).click(function() {
		$( "#itemn" ).toggle();
		});
	$("#itemn").parent().find("input:first").focus();	
	});

      $(function () {
        $('#default_widget').monthpicker();
		$('#other_widget').monthpicker();
		 $('#default_widgeta').monthpicker();
		$('#other_widgeta').monthpicker();
		 $('#default_widgetb').monthpicker();
		$('#other_widgetb').monthpicker();
        $('.monthpicker').monthpicker();

        $('#custom_widget').monthpicker({
            pattern: 'yyyy-mm',
            selectedYear: 2010,
            startYear: 2004,
            finalYear: 2022,
            monthNames: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
        });

        $('#events_widget').monthpicker().bind('monthpicker-click-month', function (e, month) {
            alert('You clicked on month ' + month);

        }).bind('monthpicker-change-year', function (e, year) {
            alert('You chosed the year ' + year);

        }).bind('monthpicker-show', function () {
            alert('showing... ' + $(this).attr('id'));
            
        }).bind('monthpicker-hide', function () {
            alert('hiding... ' + $(this).attr('id'));
        });

        $('#last_widget').monthpicker({selectedYear: 2009, startYear: 2004, finalYear: 2022, openOnFocus: false});

        $('#last_widget').monthpicker().bind('monthpicker-change-year', function (e, year) {
            $('#last_widget').monthpicker('disableMonths', []);
            if (year === '2008') {
                $('#last_widget').monthpicker('disableMonths', [1, 2, 3, 4]);
            }
            if (year === '2010') {
                $('#last_widget').monthpicker('disableMonths', [9, 10, 11, 12]);
            }
        });
 });