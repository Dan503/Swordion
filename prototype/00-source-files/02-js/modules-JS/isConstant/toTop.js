var module_toTop = 'toTop';

//required for the targeting funcitions
module = module_toTop;

moduleTargets[module] = {
	trigger : module+'__trigger',
	pos : module+'__positioner',
	activationPoint : module+'__activationPoint',
	stateSwitcher : module+'__stateSwitchPoint',

	//classes
	pos_isStatic : module+'__positioner--isStatic-JS',
	isScrolling : module+'--isScrolling-JS',
};

var activation_offset = $(Hook('activationPoint')).offset().top;
var _stateSwitcher = $(Hook('stateSwitcher'));
var stateSwitch_offset = _stateSwitcher.offset().top;
var _pos = $(Hook('pos'));

//if footer is visible on page load, hide the back to top button
if (stateSwitch_offset < G_screen_height){
	_pos.hide();
}

$(window).scroll(function(){
	module = module_toTop;

	//if statements
	var pos_is_static =_pos.modHasClass('pos_isStatic');

	if (
		(G_scrollPos + G_screen_height <= stateSwitch_offset)
	) {
		if (pos_is_static){
			//to top button has a fixed position
	    	_pos.modRemoveClass('pos_isStatic');
		}
    } else if (G_scrollPos > activation_offset && !_pos.modHasClass('isScrolling') && !pos_is_static) {
		//to top button has a static position
    	_pos.modAddClass('pos_isStatic');
    }
});

$(Hook('trigger')).click(function(e){
	preventDefault(e);
	var target = $(this).attr('href');
	var _pos = $(Hook('pos'));

	_pos.modAddClass('isScrolling').modRemoveClass('pos_isStatic');

	$(target).scrollToMe({
		callback: function(){
			module = module_toTop;
			_pos.modRemoveClass('isScrolling');
		}
	});

	//remove focus after clicking
	$(this).blur();
});