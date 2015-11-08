/* This is a generated file. Do not edit */function infoPlayer(module_infoPlayer, timeline, scene, settings){

settings = defaultTo(settings, {
	timeScale: 1.75,
	onPlay : function(){},
	onPause : function(){},
	onReset : function(){},
	onUpdate : function(){},
	onDrag : function(){},
});

module = module_infoPlayer;

//by using defaultTo, it's merging the objects
moduleTargets[module] = defaultTo(moduleTargets[module], {
//player controls
	infoPlayer : module+'__infoPlayer',
	playPause : module+'__playPause',
	overPlay : module+'__overPlay',
	reset : module+'__reset',
	progress : module+'__progress',

//Other hooks
	mobBG: module+'__mobBG',
	mobBG_left: module+'__mobBG--left',
	mobBG_right: module+'__mobBG--right',
	mobHeading: module+'__mobHeading',

//CSS classes
	playPause_isPlaying : 'infoPlayer__playPause--isPlaying-JS',
	overPlay_isHidden : 'infoPlayer__overPlay--isHidden-JS',
	overPlay_showsReset : 'infoPlayer__overPlay--showsReset-JS',
});

	if (MQG_home_is_scrollAnimated) {
		scene
			.setPin(Hook('stage'))
			.setTween(timeline);

		G_allScenes.push(scene);
	} else {

		timeline.pause();
		timeline.timeScale(settings.timeScale);

		var progressBar = $(Hook('progress'));
		var playPause = $(Hook('playPause'));
		var overPlay = $(Hook('overPlay'));

		overPlay.click(function(){
			module = module_infoPlayer;
			playPause.click();
		});

		playPause.click(function(){
			module = module_infoPlayer;
			overPlay.modAddClass('overPlay_isHidden');
			if(timeline.progress() == 1){
				settings.onPlay.call($(this), timeline.progress());
				timeline.restart().play();
				$(this).modAddClass('playPause_isPlaying');
			} else {
				if (timeline.paused()){
					$(this).modAddClass('playPause_isPlaying');
					settings.onPlay.call($(this), timeline.progress());
				} else {
					$(this).modRemoveClass('playPause_isPlaying');
					settings.onPause.call($(this), timeline.progress());
				}
				timeline.paused(!timeline.paused());
			}
		});

		$(Hook('reset')).click(function(){
			module = module_infoPlayer;
			timeline.restart().pause();
			progressBar.val(0);
			playPause.modRemoveClass('playPause_isPlaying');
			overPlay.modRemoveClass('overPlay_showsReset').modRemoveClass('overPlay_isHidden');

			settings.onReset.call($(this), timeline.progress());
			/*if (module == 'nbn'){
				_text.hide();
			}*/
		});

		timeline.eventCallback('onUpdate', function(){
			module = module_infoPlayer;
			progressBar.val(timeline.progress());
			if(timeline.progress() == 1){
				playPause.modRemoveClass('playPause_isPlaying');
				overPlay.modAddClass('overPlay_showsReset').modRemoveClass('overPlay_isHidden');
			}
			if(timeline.progress() == 0){
				overPlay.modRemoveClass('overPlay_showsReset').modRemoveClass('overPlay_isHidden');
			}
			settings.onUpdate.call(timeline, timeline.progress());
		});

		progressBar.on("input change", function() {
			module = module_infoPlayer;
			timeline.pause();
			var currentProgress = timeline.progress();
			var newProgress = $(this).val();
			if (currentProgress < 1 && currentProgress > 0){
				overPlay.modAddClass('overPlay_isHidden');
				if (overPlay.modHasClass('overPlay_showsReset')){
					overPlay.modRemoveClass('overPlay_showsReset');
				}
			} else if (currentProgress == 0){
				overPlay.modRemoveClass('overPlay_isHidden');
				//_text.hide();
			}

			timeline.progress(newProgress);
			playPause.modRemoveClass('playPause_isPlaying');

			settings.onDrag.call($(this), newProgress);
		});

		mobBGtimeline = new TimelineMax()
			.from (Hook('mobBG_left'), 1, {x: '-100%'})
			.from (Hook('mobBG_right'), 1, {x: '100%'},0)
			.from (Hook('mobHeading'), 1, { opacity: 0 }, '-=0.75')
		;

		var mobBGscene = new ScrollMagic.Scene({
			duration: $(Hook('stage')).height() * 0.5,
			triggerElement: Hook('stage'),
		})
		.setTween(mobBGtimeline)
		//.addIndicators({name: 'infoPlayer_mobileBGs'})//to help with debugging
		.addTo(G_ctrl);

		G_allScenes.push(mobBGscene);
	}
}

//document.ready opening (it will be correct in the merged js file)
jQuery(function($){

moduleTargets = moduleTargets || {};

var module_homeSplash = 'homeSplash';

module = module_homeSplash;

moduleTargets[module] = {
    //js hooks
	stage : module+'__stage',
	number_left : module+'__number--left',
	number_right : module+'__number--right',
	slash : module+'__slash',
	scrollInstruction : module+'__scrollInstruction',
	intro : module+'__intro',

	menuBG : module+'__menuBG',
	searchBG : module+'__searchBG',
	wrapper : module+'__wrapper',

	igTriClone : module+'__igTriClone',

	//CSS classes
	wrapper_isHidden : module+'__wrapper--isHidden-JS',
};

jQuery(function($){

	module = module_homeSplash;

	var stage = $(Hook('stage'));
	var slider = $(Hook('slider'));

	if (stage.length){

		var animDuration = G_homeSplash_animDuration;

		var headerTools_size = {
			L : min('tablet'),
			M : inside('tablet', 'mobile'),
			S : max('mobile')
		}

		if (headerTools_size['L']){
			var bgPositions = {
				menuBG : {
					top: '-46.3%',
					left: '-30%'
				},
				searchBG : {
					top: '-29%',
				},
				menuBG_before : {
					top: '-46.3%',
					left: '-30%'
				},
				searchBG_before : {
					top: '-29%',
				}
			}
		} else if (headerTools_size['M']) {
			var bgPositions = {
				menuBG : {
					top: '-55%',
					left: '-30%'
				},
				searchBG : {
					top: '-30%',
				},
				menuBG_before : {
					top: '-55%',
					left: '-30%'
				},
				searchBG_before : {
					top: '-30%',
				}
			}
		} else if (headerTools_size['S']) {
			var bgPositions = {
				menuBG : {
					top: '-63%',
					left: '-30%'
				},
				searchBG : {
					top: '-38%',
				},
				menuBG_before : {
					top: '-70%',
					left: '-30%'
				},
				searchBG_before : {
					top: '-45%',
				}
			}
		}

		var tween =  new TimelineMax();

		var stage = $(Hook('stage'));

		var scene = new ScrollMagic.Scene({
			duration: animDuration,
			offset: 0
		})
		.on('end',function(scroll){
			module = module_homeSplash;

			if (scroll.scrollDirection == "FORWARD") {
				$(Hook('wrapper'))
					.modAddClass('wrapper_isHidden');
				$('.headerTools')
					.addClass('headerTransform--transformLock-JS')
					.addClass('headerTransform--isTransformed-JS');
			} else {
				$(Hook('wrapper'))
					.modRemoveClass('wrapper_isHidden');
				$('.headerTools')
					.removeClass('headerTransform--transformLock-JS')
					.removeClass('headerTransform--isTransformed-JS');
			}

		})
		//.addIndicators({name: 'homeSplash'})//to help with debugging
		;

		if (MQG_home_is_scrollAnimated) {

			var desktopTL = tween
				.to(Hook('number_left'), 1, { top: '-75%', left: '75%', opacity: 0 })
				.to(Hook('scrollInstruction'), 0.5, { opacity: 0 }, '0')
				.to(Hook('number_right'), 1, { bottom: '-75%', right: '75%', opacity: 0 }, '0')
				.to(Hook('slash'), 1, { width: '0%', marginLeft: '50%', marginRight: '50%' }, '0')
				.to(Hook('menuBG'),	1, bgPositions['menuBG'], '0')
				.to(Hook('searchBG'), 1, bgPositions['searchBG'], '0')
				.set(Hook('igTriClone'),{ display: 'none' }, '-=0.2')
			;

			scene
				.setTween(desktopTL)
				.setPin(Hook('stage'))
		} else {

			var mobileTL = tween
				.to(Hook('number_left'), 1, { top: '-75%', left: '75%', opacity: 0 })
				.to(Hook('scrollInstruction'), 0.5, { opacity: 0 }, '0')
				.to(Hook('number_right'), 1, { bottom: '-75%', right: '75%', opacity: 0 }, '0')
				.to(Hook('slash'), 1, { width: '0%', marginLeft: '50%', marginRight: '50%' }, '0')
				.fromTo(Hook('menuBG'), 2, bgPositions['menuBG_before'], bgPositions['menuBG'], '0' )
				.fromTo(Hook('searchBG'), 2, bgPositions['searchBG_before'], bgPositions['searchBG'], '0')
				.set(Hook('igTriClone'),{ display: 'none' }, '-=0.2')
				.to(Hook('intro'), 0.5, { opacity: 0 }, '-=1')
				.set(Hook('intro'), { display: 'block' })
				.set(Hook('intro'), { display: 'none' })
			;

			scene
				.setTween(mobileTL)
		}

		scene.addTo(G_ctrl)

		G_allScenes.push(scene);
	}
});

var module_igEstablished = 'igEstablished';

module = module_igEstablished;

moduleTargets[module] = {
//js hooks
	stage : module+'__stage',
	visual : module+'__visual',
	indicator : module+'__indicator',
	text : module+'__text',
	sideTri : module+'__sideTri',
	textContainer : module+'__textContainer',
	jumpLink : module+'__jumpLink',

//DTO hooks
	triangle : module+'__DTO-triangle',
	circle : module+'__DTO-circle',
	letters : module+'__DTO-letters',
	wink : module+'__DTO-wink',
	happy : module+'__DTO-happy',
	smile : module+'__DTO-smile',
	DTO_text : module+'__DTO-text',
	jumpLink_dto : module+'__jumpLink--dto',

//BCR hooks
	pieSeg : module+'__BCR-pieSeg',
	pieSeg_left : module+'__BCR-pieSeg--left',
	pieSeg_right : module+'__BCR-pieSeg--right',
	BCR_text : module+'__BCR-text',
	jumpLink_bcr : module+'__jumpLink--bcr',

//CS hooks
	CS_gradient : module+'__CS-gradient',
	CS_icon : module+'__CS-icon',
	CS_text : module+'__CS-text',
	jumpLink_cs : module+'__jumpLink--cs',

};

jQuery(function($){
	module = module_igEstablished;

	var stage = $(Hook('stage'));
	var stageHeight = stage.height();

	if (stage.length){

		var mainTween =  new TimelineMax();
		var sideTriTween =  new TimelineMax();

		var sceneDuration = stageHeight * 4;

//Jump to stages of animation

		$(Hook('jumpLink')).click(function(e){
			preventDefault(e);
			var homeSplash__offset = G_homeSplash_animDuration * 3;

			var scrollPoints = {
				//number is the scrollMagic .on('progress',function(e){e.progress}) result
				dto : homeSplash__offset + (sceneDuration * 0.095),
				bcr : homeSplash__offset + (sceneDuration * 0.677),
				cs  : homeSplash__offset + (sceneDuration * 0.977),
			};
			var scrollTarget = $(this).attr('href').substr(1);

			$('html, body').stop();
			scrollTo(scrollPoints[scrollTarget], {
				duration: 0,
			});
			$(Hook('playPause', 'autoScroll')).modRemoveClass('isPlaying', 'autoScroll');
			G_autoScroll__isPlaying = false;
		});

//main animation

		var _text, DTO_text, BCR_text, CS_text;

		var txt = {};
		var textTypes = ['DTO_text', 'BCR_text', 'CS_text'];
		var textArray = [];
		var fadeSlideMethod = MQG_home_is_scrollAnimated ? 'slide' : 'fade';

		$(Hook('textContainer')).filter(':visible').each(function(index){
			module = module_igEstablished;
			var _this = $(this);

			//if it is a version of the text that is visible at this screen size
			if (_this.is(':visible')){
				$.each(textTypes, function(i, d){
					module = module_igEstablished;

					//if the text container holds the current target text
					if (_this.find(Hook(d)).length){
						//add the target text to the textArray
						textArray.push(_this.find(Hook(d)));

						//if an array for the current target hasn't been created yet
						if (typeof txt[d] === 'undefined'){
							//create a new array with the name of the target in the first slot and elements array in the second slot
							txt[d] = [d, [_this.find(Hook(d))]];
						} else {
							//else add the current target to the existing array of elements
							txt[d][1].push(_this.find(Hook(d)));
						}
					};

//on the last round of both .each() loops
if(isLastRound(i,textTypes) && isLastRound(index,$(Hook('textContainer')).filter(':visible'))){
					//go through each item in txt
					$.each(txt, function(x, data){
						//find out what type of text it is
						var type = data[0];
						//merge the array of elements into a single jQuery selector
						var elements = mergeSelectors(data[1]);

						//apply the selectors to the text variables used in the time line
						switch (type){
							case 'DTO_text' : DTO_text = elements; break;
							case 'BCR_text' : BCR_text = elements; break;
							case 'CS_text'  : CS_text  = elements; break;
						}
					})

					//creates a single selector targeting all text types used at this screen size
					_text = mergeSelectors(textArray);


		var mainTimeLine = mainTween
//DTO
			//Dot pops in
			.addCallback(function(){
				if (DTO_text.is(':hidden')){
					_text.not(DTO_text).fadeOrSlide(fadeSlideMethod, 'out');
					DTO_text.fadeOrSlide(fadeSlideMethod, 'in');
				} else {
					DTO_text.fadeOrSlide(fadeSlideMethod, 'out');
				}
			},'+=0.000001')
			.to(Hook('visual'),	1, { scale: 1 })
			.to(Hook('letters'), 1, { scale: 0 }, '+=1')
			.to(Hook('wink'), 1, { scale: 1, opacity: 1 }, '-=1')

			//to square
			.to(Hook('circle'), 1, { borderRadius: 0 }, '+=1')
			.to(Hook('wink'), 1, { scale: 0, opacity: 0 }, '-=1')
			.to(Hook('happy'),1, { scale: 1, opacity: 1 }, '-=1')

			//to triangle
			.to(Hook('circle'),	1, { scale: 0 }, '+=1')
			.to(Hook('happy'), 1, { scale: 0, opacity: 0 }, '-=1')
			.to(Hook('triangle'), 1, { scale: 1 }, '-=1')
			.to(Hook('smile'), 1, { scale: 1, opacity: 1 }, '-=1')

			//to white circle
			.to(Hook('triangle'), 1, { scale: 0 }, '+=1')
			.to(Hook('smile'), 1, { scale: 0, opacity: 0 }, '-=1')
			.to(Hook('circle'),	1, { scale: 1, borderRadius: '50%' }, '-=1')
			.to(Hook('circle'), 0.5, { backgroundColor: '#fff' }, '-=0.5')
			.from(Hook('circle'), 1, { boxShadow: '0px 0px 0px rgba(255,255,255,0)'}, '-=1')
			.to(Hook('indicator'), 1, { top: '33%'}, '-=1')

//BCR
			//text change
			.addCallback(function(){
				module = module_igEstablished;
				textSwap(_text, DTO_text, BCR_text, fadeSlideMethod);
			})
			//switch to pieChart mode
			.set(Hook('circle'), { backgroundColor: '#EEEFF3', border: '10px solid #fff' })
			.set(Hook('pieSeg'), { display: 'block' })

			//open piechart segments
			.to(Hook('pieSeg_left'), 1, { rotation: -18 })
			.to(Hook('pieSeg_right'), 1, { rotation: 115 }, '-=1')

			//Close piechart segments
			.to(Hook('pieSeg_left'), 1, { rotation: 45 }, '+=1')
			.to(Hook('pieSeg_right'), 1, { rotation: 45 }, '-=1')
			.to(Hook('indicator'), 1, { top: '66%'}, '-=1')

//CS
			//Switch to gradient fill mode
			.set(Hook('circle'), { backgroundColor: '#fff', borderWidth: 0 })
			.set(Hook('pieSeg'), { display: 'none' })
			//text change
			.addCallback(function(){
				module = module_igEstablished;
				textSwap(_text, BCR_text, CS_text, fadeSlideMethod);
			})

			//gradient fade in
			.from(Hook('CS_gradient'), 1, {opacity: 0})
			.to(Hook('CS_icon'), 2, {scale: 1})
		;

		var mainScene = new ScrollMagic.Scene({
			duration: sceneDuration,
			triggerElement: Hook('stage'),
			offset: -G_header_height,
			triggerHook: 'onLeave',
		})
		//.setPin(Hook('stage'))
		//.addIndicators({name: 'established main'})//to help with debugging
		.addTo(G_ctrl);



//sideTri animation

		if (MQG_home_is_scrollAnimated) {
			var sideTriTimeLine = sideTriTween
				.to(Hook('sideTri'), 2, {top: 0})
				.to(Hook('sideTri'), 3, {top: '-130%'}, '+=7.25')
				.to(Hook('sideTri'), 2, {right: '100%'}, '+=5')
			;
			var sideTriScene = new ScrollMagic.Scene({
				duration: G_screen_borderedHeight * 10.5 - 60,
				triggerHook: 'onLeave',
				offset: G_screen_borderedHeight * 0.4
			})
			.setTween(sideTriTimeLine)
			//.addIndicators({name: 'established sideTri'})//to help with debugging
			.addTo(G_ctrl);

			G_allScenes.push(sideTriScene);
		}

		infoPlayer(module, mainTimeLine, mainScene, {
			onReset: function(){
				_text.hide();
			},
		});

					}
				})
			}
		});

	}
});

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

		var counter = new countUp(Span('countUp'), 0, 18, 0, 1.5, G_countUpOptions);

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
			offset: -G_header_height,
			triggerHook: 'onLeave',
		})
		//.addIndicators({name: 'established'})//to help with debugging
		.addTo(G_ctrl);

		infoPlayer(module, mainTimeLine, mainScene, {
			timeScale: 1.2,
		});
	}
});

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

			counter[direction] = new countUp(Span(name), 0, origValue, 0, 1.5, G_countUpOptions);
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
			offset: -G_header_height,
			triggerHook: 'onLeave',
		})
		.on('end', function(){
			module = module_onlineSafety;
			//ensures the balls are animating if screen is lower than infographic on page load
			$(Hook('ball')).not(Class('ball_isAnimating')).modAddClass('ball_isAnimating');
		})
		//.addIndicators({name: 'established'})//to help with debugging
		.addTo(G_ctrl);

		infoPlayer(module, mainTimeLine, mainScene, {
			timeScale: 1.4,
		});

	}
});

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

			counter.push(new countUp(id, 0, origValue, 0, 1, G_countUpOptions));
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
			offset: -G_header_height,
			triggerHook: 'onLeave',
		})
		.addTo(G_ctrl);

		G_allScenes.push(mainScene);

		infoPlayer(module, mainTimeLine, mainScene, {
			onReset: function(){
				_text.hide();
			},
			timeScale: 1
		});
	}
});

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

				counter.push(new countUp(id, 0, origValue, decimals, 2, G_countUpOptions));

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
			offset: -G_header_height,
			triggerHook: 'onLeave',
		})
		.addTo(G_ctrl);

		infoPlayer(module, mainTimeLine, mainScene, {
			onReset: function(){
				$(Hook('highlight')).css({opacity: 0});
			},
			timeScale: 1,
		});
	}
});

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

			counter.push(new countUp(id, 0, origValue, 0, 1.5, G_countUpOptions));
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
			offset: -G_header_height,
			triggerHook: 'onLeave',
		})
		.on('leave', function(scroll){
			if (scroll.scrollDirection == "REVERSE"){
				$(Hook('text')).slideUp();
			}
		})
		.addTo(G_ctrl);

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

var module_ausPost = 'ausPost';

module = module_ausPost;

moduleTargets[module] = {
//js hooks
	stage : module+'__stage',
	content : module+'__content',
	video: module+'__video',

	envelope : module+'__envelope',
	envelope_top : module+'__envelope--top',
	envelope_bottom : module+'__envelope--bottom',
	envelope_leave : module+'__envelope--leave',
	envelope_stay : module+'__envelope--stay',

	tri : module+'__tri',
	tri_trigger : module+'__triTrigger',

	playVid : module+'__playVid',
	mobileHeading : module+'__mobileHeading',

//IDs
	video : module+'__video'
};

jQuery(function($){
	module = module_ausPost;

	var stage = $(Hook('stage'));

	if (stage.length){

		$(Hook('playVid')).click(function(){
			setTimeout(function(){
				module = module_ausPost;
				callPlayer(Span('video'), function() {
				    // This function runs once the player is ready ("onYouTubePlayerReady")
				    callPlayer(Span('video'), "playVideo");
				});
			}, 100)
		});

		$(document).on('closing', '[data-remodal-id="lightbox__ausPostVid"]', function (e) {
			module = module_ausPost;
			callPlayer(Span('video'), function() {
			    // This function runs once the player is ready ("onYouTubePlayerReady")
			    callPlayer(Span('video'), "pauseVideo");
				//it's strange but it won't jump back to position without this
			});
		});

		$(Hook('envelope')).each(function(){
			module = module_ausPost;
			$(this).attr('data-position', $(this).css('transform') + '; left:' + $(this).css('left'))
		});

		var stageHeight = stage.height();

//Main
		var mainTween =  new TimelineMax();
		var mainTimeLine = mainTween
			.from(Hook('content'), 1, { opacity: 0 }, 0)

			.add('envelopePopin', 0)
			.staggerFrom(Hook('envelope_top'), 1, {opacity: 0, scale: 0, ease: Back.easeOut.config(4) }, 0.05, 'envelopePopin')
			.staggerFrom(Hook('envelope_bottom'), 1, {opacity: 0, scale: 0, ease: Back.easeOut.config(4) }, 0.05, 'envelopePopin')

			.add('colorChange')
			.from(Hook('video'), 1, { scale: 0, opacity: 0, ease: Back.easeOut.config(1.5) }, 'colorChange-=1')
			.to(Hook('envelope_leave'), 1, { opacity: 0, scale: 0, ease: Power2.easeIn }, 'colorChange')
			.to(Hook('envelope_stay'), 1, { color: '#fff', opacity: 1, ease: Power2.easeIn }, 'colorChange')
			.addCallback(function(){
				//adds the origional position styles back for when rewinding animation
				module = module_ausPost;
				$(Hook('envelope_leave')).each(function(){
					_this = $(this);
					_this.attr('style', _this.attr('data-position') + '; opacity: 0');
				})
			})
			.set(Hook('envelope_leave'), { color: '#fff', left: 0 })

			.add('startMoving', 'colorChange+=0.5')
			.staggerTo(Hook([['envelope_stay','envelope_top']]), 1, { left: '100%', ease: Power2.easeIn }, -0.1, 'startMoving')
			.staggerTo(Hook([['envelope_stay','envelope_bottom']]), 4, { left: '100%', ease: Power2.easeIn }, -0.3, 'startMoving')
			.staggerTo(Hook([['envelope_leave','envelope_top']]), 1, { opacity: 1, left: '100%', ease: Power2.easeIn }, 0.2, 'startMoving+=0.75')
		;

		if (MQG_home_is_scrollAnimated){
			mainTimeLine
				.staggerTo(Hook(['video', 'content']), 1, { scale: 0, opacity: 0, ease: Back.easeIn.config(1.5) }, 0.25, '-=0.5')
				.set({},{},'+=1')
			;
		}

		var mainScene = new ScrollMagic.Scene({
			duration: stageHeight * 4.25,
			triggerElement: Hook('stage'),
			offset: -G_header_height,
			triggerHook: 'onLeave',
		})
		//.addIndicators({name: 'established'})//to help with debugging
		.addTo(G_ctrl);

		infoPlayer(module, mainTimeLine, mainScene);


//TRIANGLE
		//if (MQG_home_is_scrollAnimated){
		 	var triTween =  new TimelineMax();

			var sceneSettings = {};


			if (MQG_home_is_scrollAnimated){
				var triTimeLine = triTween
					.from(Hook('tri'), 0.5, { right: '120%', ease: Back.easeOut.config(1.5) })
					.to(Hook('tri'), 0.5, { right: '120%', ease: Back.easeIn.config(1.5) }, 4.5)
				;
				sceneSettings = {
					triggerHook: 'onEnter',
				}
			} else {
				var triTimeLine = triTween
					.from(Hook('mobileHeading'), 0.5, { opacity: 0 })
					.from(Hook('tri'), 0.5, { right: '120%', ease: Power2.easeOut }, 0)
					.to(Hook('tri'), 0.5, { right: '120%', ease: Power2.easeIn })
				;
				sceneSettings = {
					duration : stageHeight,
					offset: 0,
				}
			}

			sceneSettings = defaultTo(sceneSettings,{
				duration: (stageHeight - 60) * 4.8,
				triggerElement: Hook('tri_trigger'),
				offset: (stageHeight - 60) * 0.75,
			});

			var triScene = new ScrollMagic.Scene(sceneSettings)
			.setTween(triTimeLine)
			.addTo(G_ctrl);
			G_allScenes.push(triScene);
		//}
	}
});
var module_autoScroll = 'autoScroll';

module = module_autoScroll;

moduleTargets[module] = {
    //js hooks
	reference : module+'__reference',
	playPause : module+'__playPause',

	//classes
	isPlaying : 'infoPlayer__playPause--isPlaying-JS',
	showsReset : module+'__btn--showsReset-JS',
};

jQuery(function($){
	module = module_autoScroll;

	var destination = $(Hook('reference')).outerHeight() - G_screen_height + 85;

	var playPauseBtn = $(Hook('playPause'));

	function addReset(){
		module = module_autoScroll;
		//console.log(G_autoScroll__isPlaying);
		playPauseBtn
			.modRemoveClass('isPlaying')
			.modAddClass('showsReset');
		G_autoScroll__isPlaying = false;
	}

	playPauseBtn.click(function(e){
		module = module_autoScroll;
		preventDefault(e);

		var maxDuration = 60;//seconds

		//reduces the duration the closer you get to the bottom of the page so animation speed stays consistent
		var duration = (destination - G_scrollPos) / destination * maxDuration;

	//realised I actually want to target all instances

		if (G_autoScroll__isPlaying) {
			playPauseBtn.modRemoveClass('isPlaying');
			$('html, body').stop();
			G_autoScroll__isPlaying = false;
		} else {
			if (playPauseBtn.modHasClass('showsReset')){
				scrollTo(0, {duration: 0});//instant scroll (not animated)
				playPauseBtn.modRemoveClass('showsReset');
			} else {
				G_autoScroll__isPlaying = true;
				playPauseBtn.modAddClass('isPlaying');

				scrollTo(destination, {
					duration: duration,
					ease: 'linear',
					callback: function(){
						addReset();
					}
				});
			}

		}
	});

	$(window).on('mousewheel', function(){
		module = module_autoScroll;
		playPauseBtn.modRemoveClass('isPlaying');
		//$('html, body').stop(); //handeled in scrollToMe JS
		G_autoScroll__isPlaying = false;

		if (G_scrollPos >= destination - 100){
			addReset();
		} else {
			playPauseBtn.modRemoveClass('showsReset');
		}
	});

});


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
		.addTo(G_ctrl);
		G_allScenes.push(bgScene);


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
		.addTo(G_ctrl);
		G_allScenes.push(cornerScene);

	}
});

//!!DO NOT EDIT!!!
//document.ready closing bracket (it will be correct in the merged js file)

});//end of document.ready function
