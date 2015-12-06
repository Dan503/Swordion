
//make any element take up the full screen height minus the optional subtracted element

$.fn.fillScreen = function(subtractorSelection){

	var _this = this;

	_this.each(function(i){
		$(this).modRemoveClass('fullScreen_isApplied', globals);

		var _subtractor = $(subtractorSelection);
		var extraSubtraction = $(this).attr('data-fullscreen-subtract') || 0;
		var subtractor__height = _subtractor.length ? _subtractor.height() : 0;

		$(this).css('min-height', G_screen_height - subtractor__height - extraSubtraction).modAddClass('fullScreen_isApplied', globals);

	})

};

var filler = $(Hook('fullScreen_filler', globals));
var subtractor = $(Hook('fullScreen_subtractor', globals))

filler.fillScreen(subtractor);

G_onResize.push(function(){
	filler.fillScreen(subtractor);
});
