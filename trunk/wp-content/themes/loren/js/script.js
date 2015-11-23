/*** Document Ready Functions ***/
jQuery(document).ready(function(){

	"use strict";

 

 
 /*** MESSAGE BOX TOGGLE FUNCTION ***/
jQuery(".message-box-title").click(function(){
	jQuery(".message-box-title").toggleClass("opened");
	jQuery(".message-box-title > i").toggleClass("icon-angle-down");
	jQuery(".message-form").slideToggle();
});	
	




jQuery(".product a").click(function(){
	jQuery(this).parent().parent().slideUp();
});	



/*** DROP DOWN MENU ***/
jQuery("#menu-navigation > li").hover(function(){
	jQuery("ul",this).slideToggle('fast');
	jQuery("ul li ul",this).hide();		
});	
jQuery("#menu-navigation > li ul li").hover(function(){
	jQuery("ul",this).slideToggle('fast');
});	


/*** Responsive Menu Function ***/
	jQuery('.ipadMenu').change(function(){
		var loc = jQuery('option:selected', this).val();
		document.location.href = loc;
	});


	

/*** ACCORDIONS ***/
jQuery('.accordion_content').not('.open').hide();

jQuery('.accordion_toggle a').click(function(e){
	if(jQuery(this).parent().hasClass('current')) {
		jQuery(this).parent()
			.removeClass('current')
			.next('.accordion_content').slideUp();
	} else {
		jQuery(document).find('.current')
			.removeClass('current')
			.next('.accordion_content').slideUp();
		jQuery(this).parent()
			.addClass('current')
			.next('.accordion_content').slideDown();
	}
	e.preventDefault();
});




/*** ACCORDIONS ***/
jQuery('.accordion_content').not('.open').hide();

jQuery('.accordion_toggle input').click(function(e){
	if(jQuery(this).parent().hasClass('current')) {
		jQuery(this).parent()
			.removeClass('current')
			.next('.accordion_content').slideUp();
	} else {
		jQuery(document).find('.current')
			.removeClass('current')
			.next('.accordion_content').slideUp();
		jQuery(this).parent()
			.addClass('current')
			.next('.accordion_content').slideDown();
	}
	e.preventDefault();
});




/*** STICKY MENU ***/
var nav = jQuery('.sticky');
jQuery(window).scroll(function () {
	if (jQuery(this).scrollTop() > 50) {
			nav.addClass("stick");
	}
	else {
			nav.removeClass("stick");
	}
});



/*** TOGGLE HEADER ***/
jQuery(".show-header").click(function(){
	jQuery(".toggle-header").slideToggle();
	jQuery(".top-bar-toggle").slideToggle();
	jQuery(this).toggleClass("move-down");
});	


/*** CHECKOUT PAGE FORM TOGGLE ICON ***/
jQuery(".form-toggle.accordion_toggle a").click(function(){
	jQuery(this).toggleClass("pointed");
});	






/*** COUNT DOWN TIMER ***/
if (jQuery('.count-down').length !== 0){
	jQuery('.count-down').countdown({
		timestamp : (new Date()).getTime() + 19*24*60*60*1000
	});
}
if (jQuery('.count-down2').length !== 0){
	jQuery('.count-down2').countdown({
		timestamp : (new Date()).getTime() + 10*24*60*60*1000
	});
}



/*** Side Panel Functions ***/
jQuery(".panel-icon").click(function(){
	jQuery(".side-panel").toggleClass("show");
});	


jQuery(".boxed-style").click( function(){
	jQuery(".theme-layout").addClass("boxed");
	jQuery("body").addClass('bg-body1');
});
jQuery(".full-style").click( function(){
	jQuery(".theme-layout").removeClass("boxed");
	jQuery("body").removeClass('bg-body1');
	jQuery("body").removeClass('bg-body2');
	jQuery("body").removeClass('bg-body3');
	jQuery("body").removeClass('bg-body4');
});
jQuery(".pat1").click( function(){
	jQuery("body").addClass('bg-body1');
	jQuery("body").removeClass('bg-body2');
	jQuery("body").removeClass('bg-body3');
	jQuery("body").removeClass('bg-body4');
});
jQuery(".pat2").click( function(){
	jQuery("body").removeClass('bg-body1');
	jQuery("body").addClass('bg-body2');
	jQuery("body").removeClass('bg-body3');
	jQuery("body").removeClass('bg-body4');
});
jQuery(".pat3").click( function(){
	jQuery("body").removeClass('bg-body1');
	jQuery("body").removeClass('bg-body2');
	jQuery("body").addClass('bg-body3');
	jQuery("body").removeClass('bg-body4');
});
jQuery(".pat4").click( function(){
	jQuery("body").removeClass('bg-body1');
	jQuery("body").removeClass('bg-body2');
	jQuery("body").removeClass('bg-body3');
	jQuery("body").addClass('bg-body4');
});


});		