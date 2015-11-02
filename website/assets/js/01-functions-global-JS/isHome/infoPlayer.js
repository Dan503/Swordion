function infoPlayer(module_infoPlayer, timeline, scene, settings){

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

		VG_allScenes.push(scene);
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
		.addTo(VG_ctrl);

		VG_allScenes.push(mobBGscene);
	}
}