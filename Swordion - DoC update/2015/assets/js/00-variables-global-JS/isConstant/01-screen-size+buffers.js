/*************************************************\
  SCREEN SIZE
================================================
  Always know the current screen width & height

  //VG for Variable Global
\************************************************/

function getPageHeight(){
	return $('[data-jshook*="siteContainer"]').outerHeight();
}

var VG_screen_width = $(window).width();
var VG_screen_height = $(window).height();
var VG_page_height = getPageHeight();
var VG_headerHeight = $('.progressBar').height() + $('.headerTools__title').height();

var VG_screen_borderedHeight = VG_screen_height - 40;


//determines how far down the screen animations start (0.66 = 66% down the screen)
var VG_buffer_higher = parseInt(VG_screen_height * 0.25);
var VG_buffer_high = parseInt(VG_screen_height * 0.33);
var VG_buffer_low = parseInt(VG_screen_height * 0.66);
var VG_buffer_lower = parseInt(VG_screen_height * 0.75);

//Holds functions that fire on resize/scroll
//use VG_onResize.push(function(){...}); anywhere to fire functions after user has resized screen
//use VG_onScrollStop.push(function(){...}); anywhere to fire functions at end of scroll
var VG_onResize = [];
var VG_onScrollStop = [];

$(window).resize(function(){
	VG_screen_width = $(window).width();
	VG_screen_height = $(window).height();
	VG_page_height = $('[data-jshook*="siteContainer"]').outerHeight();

	VG_buffer_higher = parseInt(VG_screen_height * 0.25);
	VG_buffer_high = parseInt(VG_screen_height * 0.33);
	VG_buffer_low = parseInt(VG_screen_height * 0.66);
	VG_buffer_lower = parseInt(VG_screen_height * 0.75);

	clearTimeout(window.resizedFinished);
    window.resizedFinished = setTimeout(function(i, resizeFunction){
    	$.each(VG_onResize, function(){
    		//calls functions that fire after user resizes the screen
			if (typeof resizeFunction !== 'undefined') {
	    		resizeFunction.call();
			}
    	});
    }, 250);

});

var VG_scrollPos = $(document).scrollTop();

var willChangeElement = $('.TK-willChange');
var willChangeClass = 'TK-willChange--isApplied-JS';

$(window).scroll(function(e){
    VG_scrollPos = $(document).scrollTop();

	if (VG_scrollPos < (VG_screen_height + 300)) {
		willChangeElement.not('.'+willChangeClass).addClass(willChangeClass);
	} else {
		willChangeElement.filter('.'+willChangeClass).removeClass(willChangeClass);
	}

	clearTimeout(window.scrolling);
    window.scrolling = setTimeout(function(){
    	$.each(VG_onScrollStop, function(i, scrollStopFunction){
    		//calls functions that fire after user has finished scrolling
			if (typeof scrollStopFunction !== 'undefined') {
	    		scrollStopFunction.call();
			}
    	});
    }, 250);
	//console.log(scrollPos);

});

VG_onScrollStop.push(function(){
	willChangeElement.filter('.'+willChangeClass).removeClass(willChangeClass);
});
