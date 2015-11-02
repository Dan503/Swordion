
var module_spectrum = 'spectrum';

module = module_spectrum;

moduleTargets[module] = {
//js hooks
	stage : module+'__stage',

	highlightsTrigger : module+'__highlightsTrigger',
	countUp : module+'__countUp',
	highlight : module+'__highlight',
	highlight_1 : module+'__highlight--1',
	highlight_2 : module+'__highlight--2',
	highlight_3 : module+'__highlight--3',

	circle : module+'__circle',
	gradient : module+'__gradient',
	cover_svg : module+'__cover--svg',
	cover_gradient : module+'__cover--gradient',
	wrap : module+'__wrap',
	content : module+'__content',
	visual : module+'__visual',
};

jQuery(function($){
	module = module_spectrum;

	var stage = $(Hook('stage'));

	if (stage.length){

		var stageHeight = stage.height();
		var highlightDelay = (stageHeight * 0.25);
		var duration = 4;

		var counter = [];
		var realIndex = 0;

		$(Hook('countUp')).each(function(i){
			if ($(this).is(':visible')){
				var origValue = parseFloat($(this).attr('data-value'));
				var id = module+'__countUp--'+i+'-JS';

				$(this)
					.attr('id', id)
					.text(commafy(origValue));

				var decimals = (realIndex == 1) ? 1 : 0;

				counter.push(new countUp(id, 0, origValue, decimals, 2, VG_countUpOptions));

				realIndex ++;
			}
		});

//Main
		var mainTween =  new TimelineMax();

		if (!MQG_home_is_scrollAnimated) mainTween.from(Hook('visual'), 0.5, { opacity: 0});

		var mainTimeLine = mainTween
			.set(Hook('wrap'), {opacity: 0})
			.set(Hook('wrap'), {opacity: 1},'+=0.0001')
			.from(Hook('wrap'), 0.1, { right: '100%' })
			.addCallback(function(){
				counter[0].reset();
			}, "+=0.000001")
			.addCallback(function(){
				counter[0].reset();
				counter[0].start();
			}, "+=0.000001")

			.add('static')
			.to(Hook('highlight_1'), 0.5, { opacity: 1}, 'static')
			.from(Hook('cover_svg'), 3, { right: 0 }, 'static')
			.from(Hook('content'), 1, { opacity: 0}, 'static')

			.add('circle', 'static+=4')
			.from(Hook('circle'), 5, { width:'0%' }, 'circle')
			.addCallback(function(){
				counter[0].reset();
				counter[0].start();
			}, 'circle+=0.5')
			.addCallback(function(){
				counter[1].reset();
				counter[1].start();
			}, 'circle')
			.to(Hook('highlight_1'), 0.5, { opacity: 0}, 'circle')
			.to(Hook('highlight_2'), 0.5, { opacity: 1}, 'circle')

			.add('gradient', 'circle+=4')
			.addCallback(function(){
				counter[1].reset();
				counter[1].start();
			}, 'gradient+=0.5')
			.addCallback(function(){
				counter[2].reset();
				counter[2].start();
			}, 'gradient')
			.to(Hook('highlight_2'), 0.5, { opacity: 0}, 'gradient')
			.to(Hook('highlight_3'), 0.5, { opacity: 1}, 'gradient')
			.set(Hook('cover_gradient'), { opacity: 1 }, 'gradient')
			.set(Hook('gradient'), { opacity: 1 }, 'gradient')
			.from(Hook('cover_gradient'), 3, { right: 0 }, 'gradient')
			.to(Hook('cover_svg'), 1, { right: 0 }, 'gradient+=3')
			.set(Hook('wrap'), { opacity: 0 }, 'gradient+=4')
			.to(Hook('highlight_3'), 0.5, { opacity: 0}, 'gradient+=3')
		;

		if (!MQG_home_is_scrollAnimated) mainTween.to(Hook('visual'), 0.5, { opacity: 0 }, '-=0.5');

		var mainScene = new ScrollMagic.Scene({
			duration: stageHeight * duration + highlightDelay,
			triggerElement: Hook('stage'),
			offset: -VG_headerHeight,
			triggerHook: 'onLeave',
		})
		.addTo(VG_ctrl);

		infoPlayer(module, mainTimeLine, mainScene, {
			onReset: function(){
				$(Hook('highlight')).css({opacity: 0});
			},
			timeScale: 1,
		});
	}
});