
///*================================================*\
//	CONFIGURATION RELATED JS
//----------------------------------------------------
//	This file holds functions and variables that
//	give key measurements for other functions to use
//*================================================*/



///*================================================*\
//	BREAK POINTS
//----------------------------------------------------
//	Defines the points at which the page design
//	will snap and drastically change it's styles
//
//	!!!WARNING!!!
//	Ensure that these are always in synch with
//	the SASS break points:
//	/assets/sass/00-config-files/break-points.scss
//*================================================*/
var
bp_x_small = 350, //essentially iphones in portrait only

bp_small = 450,

bp_mobile = 600, //maximum for strict mobile view

bp_phablet = 770,

bp_tablet = 960,//maximum for tablets in portrait

bp_desktop = 1024,//point at which desktop content reaches the edge of of the screen

bp_large = 1200;//point at which desktop content reaches the edge of of the screen



/****************************************\
 Always know current screen width & height
\****************************************/

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



/****************************************\
   Allow time for css animations
   but only in browsers that support
   CSS3 animation
\****************************************/

function animation_time(time){
	if ($('html.csstransitions').length){
		return time;
	} else {
		return 0;
	};
}
//example usage:
/*
	setTimeout(function(){
		//script to carry out after css animation
	}, animation_time(500));
*/


/****************************************\
   IE safe version of preventDefault
\****************************************/
function preventDefault(e){
	(e.preventDefault) ? e.preventDefault() : e.returnValue = false;
}

//Not sure what this does. I think it prevents errors in browsers without a console... I think.
// usage: log('inside coolFunc', this, arguments);
window.log=function(){log.history=log.history||[];log.history.push(arguments);this.console&&(arguments.callee=arguments.callee.caller,console.log(Array.prototype.slice.call(arguments)))};
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();)b[a]=b[a]||c})(window.console=window.console||{});
