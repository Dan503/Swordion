var module_videoBlock = 'videoBlock';

module = module_videoBlock;

moduleTargets[module] = {

    //js hooks
	playBtn : module+'__playBtn',
    overlay : module+'__overlay',

	//css classes
	overlay_isClosed : module+'__overlay--isClosed-JS',
};

//$('')


$(Hook('playBtn')).click(function(e){
	module = module_videoBlock;

	preventDefault(e);
	targetID = $(this).attr('href').substr(1);

	callPlayer(targetID, function() {
	    // This function runs once the player is ready ("onYouTubePlayerReady")
	    callPlayer(targetID, "playVideo");
	});

	$(Hook('overlay')).modAddClass('overlay_isClosed');

});