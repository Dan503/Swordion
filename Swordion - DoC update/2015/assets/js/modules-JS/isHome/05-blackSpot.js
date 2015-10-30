
var module_blackSpot = 'blackSpot';

module = module_blackSpot;

moduleTargets[module] = {
//js hooks
	stage : module+'__stage',

	countUp : module+'__countUp',
	text : module+'__text',

	highlight_1 : module+'__textHighlight--1',
	highlight_2 : module+'__textHighlight--2',
	highlight_3 : module+'__textHighlight--3',

	tower : module+'__tower',
	wave_left : module+'__wave--left',
	wave_right : module+'__wave--right',
	wave_1 : module+'__wave--1',
	wave_2 : module+'__wave--2',
	wave_3 : module+'__wave--3',

	dotMask : module+'__dotMask',
	dots : module+'__dots',

	road : module+'__road',
	//xxxx : module+'__xxxxx-JS',

//progress points at which JS functions are called
	//phases : [0.74]//without dummy time at end
	phases : [0.35, 0.60]
};

jQuery(function($){
	module = module_blackSpot;

	var stage = $(Hook('stage'));

	if (stage.length){

		var stageHeight = stage.height();

		var counter = [];
		var textTransition = 'fade';

		var _text = $(Hook('text'));

		_text.hide();

		$(Hook('countUp')).each(function(i){
			var origValue = parseInt($(this).attr('data-value'));
			var id = module+'__countUp--'+i+'-JS';

			$(this)
				.attr('id', id)
				.text(commafy(origValue));

			counter.push(new countUp(id, 0, origValue, 0, 1, VG_countUpOptions));
		});

		var mainTween =  new TimelineMax();

//Main
		var mainTimeLine = mainTween
			.addCallback(function() {
				if (_text.eq(0).is(':hidden')){
					_text.not(_text.eq(0)).fadeOut();
					_text.eq(0).fadeIn();
					counter[0].reset();
					counter[0].start();
				} else {
					_text.eq(0).fadeOut();
				}
			}, '+=0.00001')
			.from(Hook('tower'), 2, { rotationX: 90, ease: Elastic.easeOut.config(2, 0.5) })
			.staggerFromTo(Hook('wave_left'), 1, { scale: 0, opacity: 1, right: '100%' }, { scale: 1.5, opacity: 0, right: '400%'}, 0.25, '-=1')
			.staggerFromTo(Hook('wave_right'), 1, { scale: 0, opacity: 1, left: '100%' }, { scale: 1.5, opacity: 0, left: '400%'}, 0.25, '-=1.5')
			.addCallback(function(){
				if (_text.eq(0).is(':hidden')){
					counter[0].reset();
					counter[0].start();
				}
				textSwap(_text, _text.eq(0), _text.eq(1), textTransition)
			})
			.to(Hook('tower'), 1, { rotationX: 90 })
			.to(Hook('highlight_1'), 1, { color: '#FFD204' }, 0)

			.to(Hook('highlight_1'), 1, { color: '#FFFFFF' }, '-=1')
			.to(Hook('highlight_2'), 1, { color: '#FFD204' }, '-=1')
			.from(Hook('dots'), 1, { scale: 0, opacity: 0 }, '-=0.75')
			.to(Hook('dots'), 1, { scale: 2, opacity: 0 }, '+=1')
			.addCallback(function(){
				if (_text.eq(2).is(':hidden')){
					counter[1].reset();
					counter[1].start();
				}
				textSwap(_text, _text.eq(1), _text.eq(2), textTransition)
			}, '-=1')

			.to(Hook('highlight_2'), 1, { color: '#FFFFFF' }, '-=1')
			.to(Hook('highlight_3'), 1, { color: '#FFD204' }, '-=1')
			.fromTo(Hook('road'), 1, { height: '0%' }, { height: '16%' }, '-=0.6')
			.to(Hook('road'), 1, { height: '54%' })
			.to(Hook('road'), 1, { height: '100%' })
			.to(Hook('highlight_3'), 1, { color: '#FFFFFF' }, '-=0.5')
		;

		var mainScene = new ScrollMagic.Scene({
			duration: stageHeight * 3.2,
			triggerElement: Hook('stage'),
			offset: -VG_headerHeight,
			triggerHook: 'onLeave',
		})
		.addTo(VG_ctrl);

		VG_allScenes.push(mainScene);

		infoPlayer(module, mainTimeLine, mainScene, {
			onReset: function(){
				_text.hide();
			},
			timeScale: 1
		});
	}
});