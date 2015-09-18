/*************************************************\
  SCREEN SIZE
================================================
  Always know the current screen width & height

  //VG for Variable Global
\************************************************/

var VG_screen_width = $(window).width();
var VG_screen_height = $(window).height();
var VG_page_height = $('[data-jshook*="siteContainer"]').outerHeight();

var VG_screen_borderedHeight = VG_screen_height - 40;


//determines how far down the screen animations start (0.66 = 66% down the screen)
var VG_buffer_higher = parseInt(VG_screen_height * 0.25);
var VG_buffer_high = parseInt(VG_screen_height * 0.33);
var VG_buffer_low = parseInt(VG_screen_height * 0.66);
var VG_buffer_lower = parseInt(VG_screen_height * 0.75);

//Holds functions that fire on resize/scroll
//use VG_onResize.push(function(){...}); anywhere to fire functions after user has resized screen
//use VG_onScroll.push(function(){...}); anywhere to fire functions at end of scroll
var VG_onResize = [];
var VG_onScroll = [];

$(window).resize(function(){
	VG_screen_width = $(window).width();
	VG_screen_height = $(window).height();

	VG_buffer_higher = parseInt(VG_screen_height * 0.25);
	VG_buffer_high = parseInt(VG_screen_height * 0.33);
	VG_buffer_low = parseInt(VG_screen_height * 0.66);
	VG_buffer_lower = parseInt(VG_screen_height * 0.75);

	clearTimeout(window.resizedFinished);
    window.resizedFinished = setTimeout(function(){
    	$.each(VG_onResize, function(){
    		//calls functions that fire after user resizes the screen
    		this.call();
    	});
    }, 250);

});

var VG_scrollPos = $(document).scrollTop();
$(window).scroll(function(){
    VG_scrollPos = $(document).scrollTop();

	clearTimeout(window.scrolling);
    window.scrolling = setTimeout(function(){
    	$.each(VG_onScroll, function(){
    		//calls functions that fire after user has finished scrolling
    		this.call();
    	});
    }, 250);
	//console.log(scrollPos);
});


