/*************************************************\
  SCREEN SIZE
================================================
  Always know the current screen width & height

  //VG for Variable Global
\************************************************/

var VG_screen_width = $(window).width();
var VG_screen_height = $(window).height();
var VG_page_height = $('[data-jshook*="siteContainer"]').outerHeight();

//determines how far down the screen animations start (0.66 = 66% down the screen)
var VG_buffer_higher = parseInt(VG_screen_height * 0.25);
var VG_buffer_high = parseInt(VG_screen_height * 0.33);
var VG_buffer_low = parseInt(VG_screen_height * 0.66);
var VG_buffer_lower = parseInt(VG_screen_height * 0.75);

$(window).resize(function(){
	VG_screen_width = $(window).width();
	VG_screen_height = $(window).height();

	VG_buffer_higher = parseInt(VG_screen_height * 0.25);
	VG_buffer_high = parseInt(VG_screen_height * 0.33);
	VG_buffer_low = parseInt(VG_screen_height * 0.66);
	VG_buffer_lower = parseInt(VG_screen_height * 0.75);
});


var VG_scrollPos = $(document).scrollTop();
$(window).scroll(function(){
    VG_scrollPos = $(document).scrollTop();
	//console.log(scrollPos);
});
