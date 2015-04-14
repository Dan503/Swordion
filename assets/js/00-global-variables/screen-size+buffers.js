/*************************************************\
  SCREEN SIZE
================================================
  Always know the current screen width & height
\************************************************/

var screen_width = $(window).width();
var screen_height = $(window).height();

//determines how far down the screen animations start (0.66 = 66% down the screen)
var x_high_buffer = parseInt(screen_height * 0.25);
var high_buffer = parseInt(screen_height * 0.33);
var low_buffer = parseInt(screen_height * 0.66);
var x_low_buffer = parseInt(screen_height * 0.75);

$(window).resize(function(){
	screen_width = $(window).width();
	screen_height = $(window).height();

	x_high_buffer = parseInt(screen_height * 0.25);
	high_buffer = parseInt(screen_height * 0.33);
	low_buffer = parseInt(screen_height * 0.66);
	x_low_buffer = parseInt(screen_height * 0.75);
});
