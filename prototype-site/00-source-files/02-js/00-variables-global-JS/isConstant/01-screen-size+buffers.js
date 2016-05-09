/*************************************************\
  SCREEN SIZE
================================================
  Always know the current screen width & height

  //VG for Variable Global
\************************************************/

function getPageHeight(){
	return $('[data-jshook*="siteContainer"]').outerHeight();
}

var G_screen_width = $(window).width();
var G_screen_height = $(window).height();
var G_page_height = getPageHeight();
var G_header_height = $('.progressBar').height() + $('.headerTools__title').height();

//determines how far down the screen animations start (0.66 = 66% down the screen)
var G_buffer_higher = parseInt(G_screen_height * 0.25);
var G_buffer_high = parseInt(G_screen_height * 0.33);
var G_buffer_low = parseInt(G_screen_height * 0.66);
var G_buffer_lower = parseInt(G_screen_height * 0.75);

//Holds functions that fire on resize/scroll
//use G_onResizeStop.push(function(){...}); anywhere to fire functions after user has resized screen
//use G_onScrollStop.push(function(){...}); anywhere to fire functions at end of scroll
var G_onResizeStop = [];
var G_onScrollStop = [];

$(window).resize(function(){
	G_screen_width = $(window).width();
	G_screen_height = $(window).height();
	G_page_height = $('[data-jshook*="siteContainer"]').outerHeight();

	G_buffer_higher = parseInt(G_screen_height * 0.25);
	G_buffer_high = parseInt(G_screen_height * 0.33);
	G_buffer_low = parseInt(G_screen_height * 0.66);
	G_buffer_lower = parseInt(G_screen_height * 0.75);

	clearTimeout(window.resizedFinished);
    window.resizedFinished = setTimeout(function(){
    	$.each(G_onResizeStop, function(i, resizeFunction){
    		//calls functions that fire after user resizes the screen
			if (typeof resizeFunction !== 'undefined') {
	    		resizeFunction.call();
			}
    	});
    }, 250);

});

var G_scrollPos = $(document).scrollTop();

var willChangeElement = $('.TK-willChange');
var willChangeClass = 'TK-willChange--isApplied-JS';

$(window).scroll(function(e){
    G_scrollPos = $(document).scrollTop();

	if (G_scrollPos < (G_screen_height + 300)) {
		willChangeElement.not('.'+willChangeClass).addClass(willChangeClass);
	} else {
		willChangeElement.filter('.'+willChangeClass).removeClass(willChangeClass);
	}

	clearTimeout(window.scrolling);
    window.scrolling = setTimeout(function(){
    	$.each(G_onScrollStop, function(i, scrollStopFunction){
    		//calls functions that fire after user has finished scrolling
			if (typeof scrollStopFunction !== 'undefined') {
	    		scrollStopFunction.call();
			}
    	});
    }, 250);
	//console.log(scrollPos);

});

G_onScrollStop.push(function(){
	willChangeElement.filter('.'+willChangeClass).removeClass(willChangeClass);
});
