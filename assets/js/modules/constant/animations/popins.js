var module_popins = 'popins';

module = module_popins;

moduleTargets[module] = {
    //js hooks
    popins : module,

    //class modifiers
    isActivated: module+'-item--isActivated',
};

$(Hook('popins')).each(function(){
	var _this = $(this);

	var scene = new ScrollMagic.Scene({
		triggerElement: this
	})
	.addIndicators()
	.on('enter',function(){
		module = module_popins;

		_this.rapidStages({
			activationName: Span('isActivated')
		})
	})
	.addTo(ctrl);
});