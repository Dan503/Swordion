
var module_onlineSafety = 'onlineSafety';

module = module_onlineSafety;

moduleTargets[module] = {
//js hooks
	stage : module+'__stage',
	content : module+'__content',

	man : module+'__manIcon',
	woman : module+'__womanIcon',
	computer : module+'__computer',
	facebook : module+'__facebook',

	envolope_1 : module+'__envolope--1',
	envolope_2 : module+'__envolope--2',
	envolope_3 : module+'__envolope--3',

	text_top : module+'__text--visitors',
	text_left : module+'__text--subscribers',
	text_right : module+'__text--followers',

	highlight_1 : module+'__highlight--1',
	highlight_2 : module+'__highlight--2',
	highlight_3 : module+'__highlight--3',

	line_top : module+'__line--top',
	line_bottom : module+'__line--bottom',
	line_left : module+'__line--left',
	line_right : module+'__line--right',

	ball : module+'__ball',
	ball_top : module+'__ball--top',
	ball_bottom : module+'__ball--bottom',
	ball_left : module+'__ball--left',
	ball_right : module+'__ball--right',

//CSS classes
	ball_isAnimating : module+'__ball--isAnimating-JS',

//IDs
	countUp_top : module+'__countUp--visitors-JS',
	countUp_left : module+'__countUp--subscribers-JS',
	countUp_right : module+'__countUp--followers-JS',
};

jQuery(function($){
	module = module_onlineSafety;

	var stage = $(Hook('stage'));

	if (stage.length){

		var stageHeight = stage.height();

		var counters = ['top', 'left', 'right'];
		var counter = {};

		$.each(counters, function(i, direction){
			var name = 'countUp_' + direction;
			var element = $(id(name));
			var origValue = parseInt(element.attr('data-value'));

			counter[direction] = new countUp(Span(name), 0, origValue, 0, 1.5, VG_countUpOptions);
			element.text(commafy(origValue));
		});

		var mainTween =  new TimelineMax();

//Main
		var mainTimeLine = mainTween
			.addCallback(function(){
				counter.top.reset();
			})
			.set({},{}, "+=0.000001")//helps with making sure number counts correctly
			.addCallback(function(){
				counter.top.reset();
				counter.top.start();
			})
			.from(Hook('content'), 1, { opacity: 0 })
			.from(Hook('text_top'), 2, { opacity: 0 }, 0)
			.from(Hook('highlight_1'), 1, { color: '#ffffff'}, 0)
			.from(Hook('man'), 1, { opacity: 0, scale: 0, ease: Back.easeOut.config(4) }, '0')
			.from(Hook('woman'), 1, { opacity: 0, scale: 0, ease: Back.easeOut.config(4) }, '-=1.75')
			.from(Hook('line_top'), 1, { bottom: '100%' }, '-=1.25')

			.from(Hook('computer'), 1, { scale: 0, ease: Back.easeOut.config(3) }, '-=0.5')
			.from(Hook('line_left'), 1, { bottom: '100%' }, '-=0.2')
			.from(Hook('line_right'), 1, { bottom: '100%' }, '-=1')
			.addCallback(function(){
				module = module_onlineSafety;
				$(Hook('ball')).modToggleClass('ball_isAnimating');
			})
			.from(Hook('envolope_1'), 1, { scale: 0, ease: Back.easeOut.config(2) }, '-=0.3')
			.from(Hook('envolope_2'), 1, { scale: 0, ease: Back.easeOut.config(2) }, '-=0.75')
			.from(Hook('envolope_3'), 1, { scale: 0, ease: Back.easeOut.config(2) }, '-=0.75')
			.addCallback(function(){
				counter.right.reset();
				counter.right.start();

				counter.left.reset();
				counter.left.start();
			}, '-=1')
			.from(Hook('text_left'), 1, { opacity: 0 }, '-=1')
			.from(Hook('highlight_2'), 1, { color: '#ffffff'}, '-=1')

			.from(Hook('highlight_3'), 1, { color: '#ffffff'}, '-=1')
			.from(Hook('facebook'), 1, { scale: 0, ease: Back.easeOut.config(3) }, '-=1.25')
			.from(Hook('text_right'), 1, { opacity: 0 }, '-=1')

			.add('top_ball_animates')
			.to(Hook('ball_top'),0.5, { scale: 1, ease: Power2.easeOut, }, 'top_ball_animates')
			.to(Hook('ball_top'),1.5, { top: '100%', ease: Power1.easeIn }, 'top_ball_animates')
			.to(Hook('ball_top'),0.5, { scale: 0, ease: Power2.easeIn, }, '-=0.4')

			.add('top_ball_at_bottom')
			.to(Hook('ball_bottom'), 0.5, { scale: 1, ease: Power2.easeOut, }, 'top_ball_at_bottom')
			.to(Hook('ball_bottom'), 1.5, { top: '100%', ease: Power1.easeIn }, 'top_ball_at_bottom')
			.to(Hook('ball_bottom'), 0.5, { scale: 0, ease: Power2.easeIn, }, '-=0.4')

			//.set({}, {}, "+=3")//dummy time
		;

		var mainScene = new ScrollMagic.Scene({
			duration: stageHeight * 2,
			triggerElement: Hook('stage'),
			offset: -VG_headerHeight,
			triggerHook: 'onLeave',
		})
		.on('end', function(){
			module = module_onlineSafety;
			//ensures the balls are animating if screen is lower than infographic on page load
			$(Hook('ball')).not(Class('ball_isAnimating')).modAddClass('ball_isAnimating');
		})
		//.addIndicators({name: 'established'})//to help with debugging
		.addTo(VG_ctrl);

		infoPlayer(module, mainTimeLine, mainScene, {
			timeScale: 1.4,
		});

	}
});