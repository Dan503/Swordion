
var module_deReg = 'deReg';

module = module_deReg;

moduleTargets[module] = {
//js hooks
	stage : module+'__stage',
	content : module+'__content',

	countUp : module+'__countUp',
	bottomText : module+'__bottomText',

	measuresText: module+'__measuresText',
	pile: module+'__pile',

	money : module+'__money',
	paper : module+'__paper',
	rotator_money : module+'__rotator--money',
	rotator_paper : module+'__rotator--paper',

	pulse : module+'__pulse',
	pulseBase : module+'__pulseBase',
};

jQuery(function($){
	module = module_deReg;

	var stage = $(Hook('stage'));

	if (stage.length){

		var stageHeight = stage.height();

		var counter = [];

		$(Hook('countUp')).each(function(i){
			var origValue = parseInt($(this).attr('data-value'));
			var id = module+'__countUp--'+i+'-JS';

			$(this).attr('id', id);

			counter.push(new countUp(id, 0, origValue, 0, 1.5, VG_countUpOptions));
		});

		var mainTween =  new TimelineMax();

		var textBounceTL = new TimelineMax()
			.to(Hook('measuresText'), 0.5, { top: 0, ease: Circ.easeOut })
			.to(Hook('measuresText'), 0.5, { top: 50, ease: Circ.easeIn })
			.repeat(1)
		;


		var pileComressionTL = new TimelineMax()
			//pile compression
			.to(Hook('pile'), 0.25, { scaleY: 0.7, ease: Circ.easeIn }, '+=0.5')
			.to(Hook('pile'), 0.25, { scaleY: 1, ease: Circ.easeOut })
			.repeat(2)
		;

		var moneySpitTL = new TimelineMax()
			.set(Hook('rotator_money'), {rotation: -6.5})
			.set(Hook('money'), {marginBottom: -17}, 0)
			.staggerTo(Hook('rotator_money'), 2.5, { rotation: -90, scale: 0.5, opacity: 0, ease: Power0.easeNone }, 1, 0)
			.staggerTo(Hook('money'), 3, { marginBottom: 150, ease: Power0.easeNone }, 1, 0)
		;

		var paperSpitTL = new TimelineMax()
			.set(Hook('rotator_paper'), {rotation: 6.5}, 0)
			.set(Hook('paper'), {marginBottom: -17}, 0)
			.staggerTo(Hook('rotator_paper'), 2.5, { rotation: 90, scale: 0.5, opacity: 0, ease: Power0.easeNone }, 1, 0)
			.staggerTo(Hook('paper'), 3, { marginBottom: 150, ease: Power0.easeNone }, 1, 0)
		;

		var pulseTL = new TimelineMax()
			.to(Hook('pulse'), 1, { opacity: 0, scale: 1.5, ease: Circ.easeOut })
			.repeat(2)
		;

		var fullPulseEffectTL = new TimelineMax()
			.to(Hook(['pulseBase', 'pulse']), 1, { opacity: 1, scale: 1,  ease: Back.easeOut.config(5) })
			.add(pulseTL)
		;

		var bottomTextFadeTL = new TimelineMax()
			.addCallback(function(){
					counter[1].reset();
					counter[1].start();

					counter[2].reset();
					counter[2].start();
			})
			.to(Hook('bottomText'), 2, { opacity: 1 })
		;

//Main
		var mainTimeLine = mainTween
			//pile appears
			.set(Hook(['measuresText', 'bottomText']), { opacity: 0 })
			.from(Hook('pile'), 0.75, { scaleY: 0, ease: Back.easeOut.config(4) })
			.add('textThrow', 0.25)
			.addCallback(function(){
				counter[0].reset();
				counter[0].start();
			},'textThrow')
			.fromTo(Hook('measuresText'), 0.5, { opacity: 0, top: 20, ease: Circ.easeIn }, { opacity: 1, top: -60, ease: Circ.easeOut }, 'textThrow')

			//measuresText bounce
			.to(Hook('measuresText'), 0.5, { top: 50, ease: Circ.easeIn })
			.add('startBouncing')
			.add(textBounceTL, 'startBouncing')//, 'sequence')
			.to(Hook('measuresText'), 0.5, { top: 0, ease: Circ.easeOut })
			.add(pileComressionTL, 'startBouncing-=0.75')

			//money/paper spit
			.add('spitMoney', 'startBouncing-=0.25')
			.set(Hook(['money','paper']), {opacity: 0}, 'spitMoney-=1')
			.set(Hook(['money','paper']), {opacity: 1}, 'spitMoney')
			.add(moneySpitTL, 'spitMoney')
			.add(paperSpitTL, 'spitMoney')

			//pulse effect
			.add('pulse','spitMoney+=1')
			.add(fullPulseEffectTL, 'pulse')

			//Bottom text fade in
			.add(bottomTextFadeTL, 'pulse+=1')


		;
		if (MQG_home_is_scrollAnimated) {
			mainTimeLine
			//main side text fade out (desktop only but gives extra count up time to mobile)
			.from(Hook('content'), 1, { opacity: 0 }, 0.5)
			.to(Hook('content'), 1, { opacity: 0 })
		} else {
			mainTimeLine
			//gives extra time for count up on mobile
			//.set({},{}, '+=2')
		}

		var mainScene = new ScrollMagic.Scene({
			duration: stageHeight * 2.3,
			triggerElement: Hook('stage'),
			offset: -VG_headerHeight,
			triggerHook: 'onLeave',
		})
		.on('leave', function(scroll){
			if (scroll.scrollDirection == "REVERSE"){
				$(Hook('text')).slideUp();
			}
		})
		.addTo(VG_ctrl);

		infoPlayer(module, mainTimeLine, mainScene, {
			timeScale: 1.2
		});

		//if scrolled bellow the graphic, count up text will already be visible and at the correct value
		$(Hook('countUp')).each(function(i){
			var origValue = parseInt($(this).attr('data-value'));
			var id = module+'__countUp--'+i+'-JS';

			$(this).text(commafy(origValue));
		});
	}
});