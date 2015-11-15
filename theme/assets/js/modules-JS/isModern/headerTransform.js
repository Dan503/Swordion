
var module_headerTransform = 'headerTransform';

module = module_headerTransform;

moduleTargets[module] = {

    //js hooks
	transformer : module+'__transformer',
    btnTrigger : module+'__btnTrigger',
	scrollTrigger: module+'__scrollTrigger',

	//css classes
	isTransitoning : module+'--isTransitoning-JS',
	isTransformed : module+'--isTransformed-JS',
	menu_isOpen : module+'__menu--isOpen-JS',
	transformLock : module+'--transformLock-JS',
	stickySideNav_open : 'stickySideNav__container--isOpen-JS',
};


	var clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';

	$(Hook('btnTrigger')).on(clickEvent,function(e){
		module = module_headerTransform;
		preventDefault(e);

		if (!$(Hook('transformer')).modHasClass('transformLock')){
			$(Hook('transformer')).modToggleClass('isTransformed');
		}
	});


if ($(Hook('scrollTrigger')).length){

	var transformOnScroll = new ScrollMagic.Scene({

		//determines the element that controls when the animations starts
		triggerElement: Hook('scrollTrigger'),

		//The default is that it activates when the top of the trigger element hits the center of the screen.
		//"onLeave" triggers when the top of the element hits the top of the screen.
		//"onEnter" triggers when the top of the element hits the botom of the screen.
		triggerHook: 'onLeave',

		//Tweak the starting location by a certain number of pixels
		//offset: 0
	})
	//.setClassToggle(Hook('transformer'), Span('isTransformed'))
	.on('enter',function(){
		module = module_headerTransform;

		$(Hook('transformer'))
			.modRemoveClass('wasBtnTriggered')
			.modAddClass('transformLock')
			.modAddClass('isTransformed');
	})
	.on('leave',function(){
		module = module_headerTransform;

		$(Hook('transformer'))
			.modRemoveClass('isTransformed')
			.modRemoveClass('transformLock');
		$(Class('stickySideNav_open')).modRemoveClass('stickySideNav_open');
	})
	//.addIndicators({name: 'header transform'})//to help with debugging
	.addTo(G_ctrl);
}

