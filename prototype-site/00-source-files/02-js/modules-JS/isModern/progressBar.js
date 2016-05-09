
var module_progressBar = 'progressBar';

module = module_progressBar;

moduleTargets[module] = {
    //js hooks
    parent : module+'__parent',
	progress : module+'__progress',
	tracker : module+'__tracker',
};


jQuery(function($){
	module = module_progressBar;

	var target = $('.siteContainer');

	function progressScene() {

		module = module_progressBar;

		var tween =  new TimelineMax();

		var timeLine = tween
			.to(
				Hook('progress'),
				1,
				{ width: '99.9%'}
			)
		;

		var scene = new ScrollMagic.Scene({
			//How long the duration of the scroll animation goes for. It's based on pixels, I recommend using $('.element').height()
			//the duration can also be defined as a percentage (eg. "50%"). The percentage is a percentage of the total screen **WINDOW** height.
		    duration: $(Hook('tracker')).outerHeight() - G_screen_height,

			//determines the element that controls when the animations starts
			triggerElement: $(Hook('tracker')),

			//The default is that it activates when the top of the trigger element hits the center of the screen.
			//"onLeave" triggers when the top of the element hits the top of the screen.
			//"onEnter" triggers when the top of the element hits the botom of the screen.
			triggerHook: 'onLeave',

		})
		.setTween(timeLine)
		//.addIndicators({name: 'progressBar'})//to help with debugging
		.addTo(G_ctrl);

		G_allScenes.push(scene);
	}
	if ($(Hook('fullScreen_filler',globals)).length){
		$(Class('fullScreen_isApplied',globals)).waitForMe(function(){
			G_page_height = getPageHeight();
			progressScene();
		})
	} else {
		setTimeout(function(){
			G_page_height = getPageHeight();
			progressScene();
		},10)
	}


});