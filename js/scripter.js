// JavaScript Document

	ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});

	
(function( $ ) {
		$.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );

				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},

			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

				this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.attr( "placeholder", "Type Search Term..." )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-combo ui-corner-left" )
					.autocomplete({
						delay: 0,
						focus:true,
						minLength: 0,
						source: $.proxy( this, "_source" )
					})
					.tooltip({
						tooltipClass: "ui-state-highlight"
					});

				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},

					autocompletechange: "_removeIfInvalid"
				});
			},

			_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;
		},
		_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.tooltip()
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "custom-combobox-toggle ui-corner-right  ui-state-showall " )
					.mousedown(function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.click(function() {
						input.focus();

						// Close if already visible
						if ( wasOpen ) {
							return;
						}

						// Pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						
					});
			},

			_source: function( request, response ) {
				var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = $( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
						return {
							label: text,
							value: text,
							option: this
						};
				}) );
			},

			_removeIfInvalid: function( event, ui ) {

				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}

				// Search for a match (case-insensitive)
				var value = this.input.val(),
					valueLowerCase = value.toLowerCase(),
					valid = false;
				this.element.children( "option" ).each(function() {
					if ( $( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});

				// Found a match, nothing to do
				if ( valid ) {
					return;
				}

				// Remove invalid value
				this.input
					
					.attr( "title", value + " didn't match any term" )
					.tooltip( "open" );
				this._delay(function() {
					this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
			},

			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );

	
		
	
	
	
	$(function() {
		$( "#mytask" ).dialog({
			autoOpen: false,
			show: "bounce",
			hide: "explode"
		});
		
		$( "#mycalendar" ).dialog({
			autoOpen: false,
			show: "bounce",
			hide: "explode"
		});
		
		$( "#nonregisteremp" ).dialog({
			autoOpen: false,
			show: "bounce",
			hide: "explode"
		});
		
		$( "#notallowed" ).dialog({
			autoOpen: false,
			show: "bounce",
			hide: "explode"
		});
	
		$( "#aboutopener" ).click(function() {
			$( "#aboutdialog" ).dialog( "open" );
			return false;
		});
	});
	$(function() {
		$( "#disclaimerdialog" ).dialog({
			autoOpen: false,
			show: "bounce",
			hide: "explode"
		});

		$( "#disclaimeropener" ).click(function() {
			$( "#disclaimerdialog" ).dialog( "open" );
			return false;
		});
	});	
		$(function() {
			$( "#nevent" ).dialog({autoOpen: false,modal: true});
			$( "#ncalendar" ).dialog({autoOpen: false,modal: true});
			$( "#newbed" ).dialog({autoOpen: false,modal: true});
			$( "#newledger" ).dialog({autoOpen: false,modal: true});
			$( "#adminauth" ).dialog({autoOpen: false,modal: true});
			$( "#messagelog" ).dialog({autoOpen: false,modal: true});
			$( "#newmessage" ).dialog({autoOpen: false,modal: true});
			$( "#addnewday" ).dialog({autoOpen: false,modal: true});
			$( "#addnewcomp" ).dialog({autoOpen: false,modal: true});
			$( "#addnewbank" ).dialog({autoOpen: false,modal: true});
			$( "#adminauth2" ).dialog({autoOpen: false,modal: true});
			$( "#newpractice" ).dialog({autoOpen: false,modal: true});
			$( "#newpractice2" ).dialog({autoOpen: false,modal: true});
			});	
		
$(function() {
		$( "#accordion" ).accordion({
			event: "click"
		});
	});

	var def=0;
	
	
// window.addEvent('domready', function(){

// 	$$('input.DatePicker').each( function(el){
// 	new DatePicker(el);
// 	});

// });
// How to wait for the DOM ready event in plain JavaScript
// document.addEventListener('DOMContentLoaded', (event) => {
//   //the event occurred
// });
document.addEventListener('DOMContentLoaded', function(event) {
  
	// $$('input.DatePicker').each( function(el){
	// new DatePicker(el);
	// });
});

// document.addEventListener('domready', function(event) {
  
// 	$$('input.DatePicker').each( function(el){
// 	new DatePicker(el);
// 	});
// });

$.fx.speeds._default = 1000;
	
	



	
		

$('#itsearch').live('keydown', function(evt) {
	if (!evt) evt = event;
	if (evt.keyCode==13){ 
	itemsearch();
	}
});

$('#patsearch').live('keydown', function(evt) {
	if (!evt) evt = event;
	if (evt.keyCode==13){ 
	patientsearch();
	}
});
$('#taskfield').live('keydown', function(evt) {
	if (!evt) evt = event;
	if (evt.keyCode==13){ 
	posttask('<?php echo $userid	 ?>');
	}
});

$(function() {
		
		$( "#combobox" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	