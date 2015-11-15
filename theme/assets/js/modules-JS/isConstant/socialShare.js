var module_socialShare = 'socialShare';

module = module_socialShare;

moduleTargets[module] = {
    //js hooks
	visShifter : module+'__visShifter',
	visScrollTrigger : module+'__visScrollTrigger',
	visBtnTrigger_hide : module+'__visBtnTrigger--hide',
	visBtnTrigger_show : module+'__visBtnTrigger--show',
	visBtnTrigger_toggle : module+'__visBtnTrigger--toggle',

	//css classes
	isHidden_btn : module+'__visShifter--isBtnHidden-JS',
	isHidden_scroll : module+'__visShifter--isScrollHidden-JS'
};

function hasHiddenClass(type) {
	module = module_socialShare;
	return $(Hook('visShifter')).modHasClass('isHidden_'+type);
}

$(Hook('visBtnTrigger_hide')).click(function(){
	module = module_socialShare;
	if (!hasHiddenClass('scroll')){
		$(Hook('visShifter')).modAddClass('isHidden_btn').fadeOut();
	}
});

$(Hook('visBtnTrigger_show')).click(function(){
	module = module_socialShare;
	if (!hasHiddenClass('scroll')){
		$(Hook('visShifter')).modRemoveClass('isHidden_btn').fadeIn();
	}
});

$(Hook('visBtnTrigger_toggle')).click(function(){
	module = module_socialShare;
	if (!hasHiddenClass('scroll')){
		$(Hook('visShifter')).modToggleClass('isHidden_btn').fadeToggle();
	}
});

if ($(Hook('visScrollTrigger')).length) {
	var socialShareScene = new ScrollMagic.Scene({
		triggerElement: Hook('visScrollTrigger'),
		triggerHook: 'onEnter'
	})
	//.addIndicators()
	.on('enter',function(){
		module = module_socialShare;
		if (!hasHiddenClass('btn')){
			$(Hook('visShifter')).modAddClass('isHidden_scroll').fadeOut();
		}
	})
	.on('leave',function(){
		module = module_socialShare;
		if (!hasHiddenClass('btn')){
			$(Hook('visShifter')).modRemoveClass('isHidden_scroll').fadeIn();
		}
	})
	.addTo(G_ctrl);

}

