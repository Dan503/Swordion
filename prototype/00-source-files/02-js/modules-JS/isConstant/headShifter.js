var module_headShifter = 'headShifter';

//required for the targeting funcitions
module = module_headShifter;

moduleTargets[module] = {

	//JS hooks
	shifter : module+'__shifter',

	//css classes
	isShifted : module+'__shifter--isShifted-JS',
};

var _shifter = $(Hook('shifter'));

//test scroll direction
var lastScrollTop = 0;
$(window).scroll(function(event){
	module = module_headShifter;
	//only triggers code on mobile size screens
	if (max(bp['mobile'])){
		var st = $(this).scrollTop();
		var amScrollingDown = st > lastScrollTop;
		var amPastHeader = st > _shifter.height();
		if (amScrollingDown && amPastHeader){
			// downscroll code
			//hide header
			_shifter.not(Class('isShifted')).modAddClass('isShifted');
		} else {
			// upscroll code
			//show header
			_shifter.filter(Class('isShifted')).modRemoveClass('isShifted');
		}
		lastScrollTop = st;
	}
});