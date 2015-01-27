
//make any element take up the full screen height minus the optional subtracted element

$.fn.fullScreen = function(subtraction){
	var _this = this;

	function fillScreen(target){
		var windowHeight = $(window).height();
		var subtractionHeight =  typeof subtraction != 'undefined' ? $(subtraction).height() : 0;

		target.height(windowHeight - subtractionHeight);
	};

	fillScreen(_this);

	$(window).resize(function(){
		fillScreen(_this)
	});
}

$('.js-fullScreen').fullScreen('header');
