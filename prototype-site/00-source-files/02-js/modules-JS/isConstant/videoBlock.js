
//Allows videos to be played remotely using a play button (doesn't work on iOS)

var module_videoBlock = 'videoBlock';

module = module_videoBlock;

moduleTargets[module] = {

    //js hooks
	playBtn : module+'__playBtn',
};

$(Hook('playBtn')).click(function(e){
	module = module_videoBlock;

	preventDefault(e);
	targetID = $(this).attr('href').substr(1);

	callPlayer(targetID, function() {
	    // This function runs once the player is ready ("onYouTubePlayerReady")
	    callPlayer(targetID, "playVideo");
	});
});