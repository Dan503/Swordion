
var module_homeBGassets = 'homeBGassets';

module = module_homeBGassets;

moduleTargets[module] = {
    //js hooks
	stage : module+'__stage',
	container : module+'__container',
	bg : module+'__background',
	bg_trigger : module+'__bgTrigger',

	corner : module+'__corner',
	corner_trigger : module+'__cornerTrigger',

	deRegCorner: module+'__deRegCorner',
	ausPostTri: module+'__ausPostTri',
	ausPostTri_trigger: module+'__ausPostTriTrigger',
	//cornerDeReg_trigger : module+'__cornerDeReg_trigger'

	//CSS classes
	//xxxx : module+'__xxxxx-JS',
};

jQuery(function($){
	module = module_homeBGassets;

	var stage = $(Hook('stage'));

	if (stage.length){

		var stageHeight = $(Hook('stage')).height();

//BACKGROUND
	 	var bgTween =  new TimelineMax();
		var bgTimeLine = bgTween
			.to(Hook('bg'), 1, { top: '-200%' }, '+=0.5')//to yellow
			.to(Hook('bg'), 1, { top: '-400%' }, '+=2.5')//to blue
			.to(Hook('bg'), 1, { top: '-600%' }, '+=1.5')//to gradient
			.to(Hook('bg'), 1, { top: '-700%' }, '+=4')//to solid blue
		;
		var bgScene = new ScrollMagic.Scene({
			duration: (stageHeight - 60) * 11,
			triggerElement: Hook('bg_trigger'),
			offset: (stageHeight - 60) * -0.25,
			triggerHook: 'onEnter',
		})
		.setTween(bgTimeLine)
		//.addIndicators({name: 'homeBGassets__bg'})//to help with debugging
		.addTo(VG_ctrl);
		VG_allScenes.push(bgScene);


//CORNER
	 	var cornerTween =  new TimelineMax();
		var cornerTimeLine = cornerTween
			.from(Hook('corner'), 5, { left: '200%' })//to solid blue

			.to(Hook('corner'), 3.5, { left: '48%', ease: Power1.easeInOut }, '+=10')//to half blue

			.to(Hook('corner'), 3, { left: '-0%', skewX: 0, ease: Power1.easeIn }, '+=17')//to solid grey
			.set(Hook('bg'), { top: '-200%' })
			.to(Hook('corner'), 1, { left: '-38%', skewX: 45, ease: Power2.easeOut }, '-=0')//to solid yellow
			.from(Hook('deRegCorner'), 1, { left: '200%', ease: Power2.easeOut }, '-=0.5')

			.to(Hook('deRegCorner'), 1.5, { left: '200%', ease: Power2.easeIn }, '+=8')
			.to(Hook('corner'), 1.5, { left: '-0%', skewX: 0, ease: Power2.easeIn }, '-=1.5')
			.set(Hook(['corner', 'bg']), {opacity: 0})
		;
		var cornerScene = new ScrollMagic.Scene({
			duration: (stageHeight) * 12,
			triggerElement: Hook('corner_trigger'),
			offset: (stageHeight - 60) * 0.5,
			triggerHook: 'onEnter',
		})
		.setTween(cornerTimeLine)
		//.addIndicators({name: 'homeBGassets__bg'})//to help with debugging
		.addTo(VG_ctrl);
		VG_allScenes.push(cornerScene);

	}
});