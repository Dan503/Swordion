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
