
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
			offset: -VG_headerHeight,
			triggerHook: 'onLeave',
		})
		//.addIndicators({name: 'established'})//to help with debugging
		.addTo(VG_ctrl);

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
			.addTo(VG_ctrl);
			VG_allScenes.push(triScene);
		//}
	}
});