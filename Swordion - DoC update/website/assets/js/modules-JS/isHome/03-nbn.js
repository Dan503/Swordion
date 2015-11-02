
var module_nbn = 'nbn';

module = module_nbn;

moduleTargets[module] = {
    //js hooks
	stage : module+'__stage',
	bg : module+'__background',
	topText : module+'__topText',
	result : module+'__result',

	line_top : module+'__line--top',
	line_bottom : module+'__line--bottom',
	line_1 : module+'__line--1',
	line_2 : module+'__line--2',
	line_3 : module+'__line--3',

	icon_1 : module+'__icon--1',
	icon_2 : module+'__icon--2',
	icon_3 : module+'__icon--3',

	//CSS classes
	//xxxx : module+'__xxxxx-JS',

	//IDs
	countUp : module+'__countUp-JS',
};

jQuery(function($){
	module = module_nbn;

	var stage = $(Hook('stage'));

	if (stage.length){

		var stageHeight = stage.height();
		var counterUpper = $(id('countUp'));

		var counter = new countUp(Span('countUp'), 0, 18, 0, 1.5, VG_countUpOptions);

		counterUpper.text(18);

	 	var mainTween =  new TimelineMax();

//Main
		var mainTimeLine = mainTween
			.from(Hook('topText'),	1, { opacity: 0 })
			.from(Hook([['line_top','line_1']]), 1, { bottom: '100%' }, '-=1')
			.from(Hook([['line_top','line_2']]), 1, { bottom: '100%' }, '-=0.75')
			.from(Hook([['line_top','line_3']]), 1, { bottom: '100%' }, '-=0.75')
			.from(Hook('icon_1'), 1, { opacity: 0 }, '-=0.5')
			.from(Hook('icon_2'), 1, { opacity: 0 }, '-=0.75')
			.from(Hook('icon_3'), 1, { opacity: 0 }, '-=0.75')
			.from(Hook('line_bottom'), 1, { bottom: '100%' }, '-=0.5')
			.addCallback(function(){
				counter.reset();
				counter.start();
			}, '-=0.25')
			.from(Hook('result'), 1, { opacity: 0}, '-=0.25')
			.set({}, {}, "+=1")//dummy time
		;

		var mainScene = new ScrollMagic.Scene({
			duration: stageHeight * 1.5,
			triggerElement: Hook('stage'),
			offset: -VG_headerHeight,
			triggerHook: 'onLeave',
		})
		//.addIndicators({name: 'established'})//to help with debugging
		.addTo(VG_ctrl);

		infoPlayer(module, mainTimeLine, mainScene, {
			timeScale: 1.2,
		});
	}
});