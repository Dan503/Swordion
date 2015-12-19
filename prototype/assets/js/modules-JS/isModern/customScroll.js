var module_customScroll = 'customScroll';

//required for the targeting funcitions
module = module_customScroll;

moduleTargets[module] = {

	//JS hooks
	scroller : module+'__scroller',
};

$(window).load(function(){
	module = module_customScroll;
	$(Hook('scroller')).mCustomScrollbar();
});
