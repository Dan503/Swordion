
//This is to hide the home screen until all the heights have been calculated

var module_screenFader = 'screenFader';

module = module_screenFader;

moduleTargets[module] = {
    //js hooks
    module : module,
};

var screenFade = function(direction, time) {
	module = module_screenFader;
	time = defaultTo(time, 1000)

	var fn = {
		'in' : function(time){
			$(Hook('module')).fadeIn(time);
		},
		'out' : function(time){
			$(Hook('module')).fadeOut(time)
		}
	}
	fn[direction](time);
};

if ($(Hook('module')).length){
	if ($(Hook('fullScreen_filler', globals)).length) {
		$(Class('fullScreen_isApplied', globals)).waitForMe(function(){
			screenFade('out');
		});
	} else {
		screenFade('out');
	}
}

