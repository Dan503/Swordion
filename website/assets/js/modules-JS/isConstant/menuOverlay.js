
var module_menuOverlay = 'menuOverlay';

module = module_menuOverlay;

moduleTargets[module] = {

    //js hooks
    trigger : module+'__trigger',
	menu : module+'__menu',

	//css classes
	menu_isOpen : module+'__menu--isOpen-JS',
};

jQuery(function($){

	module = module_menuOverlay;

	var clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';

	var menuItems = $(Hook('menu') + ' a');

		menuItems.attr('tabindex',-1);

	$(Hook('trigger')).on(clickEvent,function(e){
		module = module_menuOverlay;
		preventDefault(e);


		$('html').modToggleClass('menu_isOpen');

		var tabindex = $('html').modHasClass('menu_isOpen') ? 0 : -1;

		menuItems.attr('tabindex', tabindex);

		$(this).swapTooltip().blur();
	});

});