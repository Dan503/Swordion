
//make any element take up the full screen height minus the optional subtracted element

var module_fullScreen = 'fullScreen';

module = module_fullScreen;

moduleTargets[module] = {
    //js hooks
    screenFiller : module+'__screenFiller',
    subtractor : module+'__subtractor',
};


$.fn.fullScreen = function(subtraction){
	var _this = this;


}
$.fn.fillScreen = function(subtractorElement){
	module = module_fullScreen;
	var subtractor__height = $(subtractorElement).length ? $(subtractorElement).height() : 0;

	this.height(screen__height - subtractor__height);
};

var screenFiller = $(Hook('screenFiller'));
var subtractor = $(Hook('subtractor'))

screenFiller.fillScreen(subtractor);

$(window).resize(function(){
	screenFiller.fillScreen(subtractor);
});
