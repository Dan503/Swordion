
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
			var homeSplash__offset = VG_homeSplash_animDuration * 3;

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
			VG_autoScroll__isPlaying = false;
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
			offset: -VG_headerHeight,
			triggerHook: 'onLeave',
		})
		//.setPin(Hook('stage'))
		//.addIndicators({name: 'established main'})//to help with debugging
		.addTo(VG_ctrl);



//sideTri animation

		if (MQG_home_is_scrollAnimated) {
			var sideTriTimeLine = sideTriTween
				.to(Hook('sideTri'), 2, {top: 0})
				.to(Hook('sideTri'), 3, {top: '-130%'}, '+=7.25')
				.to(Hook('sideTri'), 2, {right: '100%'}, '+=5')
			;
			var sideTriScene = new ScrollMagic.Scene({
				duration: VG_screen_borderedHeight * 10.5 - 60,
				triggerHook: 'onLeave',
				offset: VG_screen_borderedHeight * 0.4
			})
			.setTween(sideTriTimeLine)
			//.addIndicators({name: 'established sideTri'})//to help with debugging
			.addTo(VG_ctrl);

			VG_allScenes.push(sideTriScene);
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