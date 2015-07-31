
//make any element take up the full screen height minus the optional subtracted element

var module_fullScreen = 'fullScreen';

module = module_fullScreen;

moduleTargets[module] = {
    //js hooks
    screenFill : module+'__screenFill',
    subtractor : module+'__subtractor',
};


$.fn.fullScreen = function(subtraction){
	var _this = this;


}
function fillScreen(target){
	module = module_fullScreen;
	var subtractionHeight = $(Hook('subtractor')).length ? $(Hook('subtractor')).height() : 0;

	target.height(screen__height - subtractionHeight);
};

fillScreen(Hook('screenFill'));

$(window).resize(function(){
	fillScreen(_this)
});
