var module_dropMenu = 'dropMenu';

//required for the targeting funcitions
module = module_dropMenu;

moduleTargets[module] = {
//JS Hooks
	trigger_hover : module+'__trigger--hover',
	trigger_focus : module+'__trigger--focus',
	revealer : module+'__revealer',
	reference : module+'__reference',
};

//hides dropMenu when you tap the escape key
$(window).keyup(function(e){
	module = module_dropMenu;

	var revealer = $(Hook('revealer')).filter(':visible');

	if (e.keyCode == 27 && revealer.length){
		revealer.slideUp();
	}
});

//handles opening and closing on hover
$(Hook('trigger_hover')).hoverIntent({

	over: function(){
		module = module_dropMenu;

		//Shows menu when hovering on
		$(this).find(Hook('revealer')).slideDown();

	},

	out: function(){
		module = module_dropMenu;

		//Hides menu when hovering off
		$(this).find(Hook('revealer')).slideUp();
	},

	timeout: 100

});

//handles opening and closing on focus
$(Hook('trigger_focus')).focus(function(){
	var _this = $(this);
	var _allRevealers = $(Hook('revealer'));
	var _thisRevealer = _this.parent().find(Hook('revealer'));

	_allRevealers.filter(':visible').not(_thisRevealer).slideUp();

	setTimeout(function(){
		if (_this.is(':focus')){
			_thisRevealer.slideDown();
		}
	}, 300);
});

//hides the last dropMenu when leaving the navigation (assuming last item has a dropMenu)
$(Hook('reference')).find('a').blur(function(){
	setTimeout(function(){
		module = module_dropMenu;
		if (!$(Hook('reference')).find(':focus').length){
			$(Hook('revealer')).slideUp();
		}
	}, 20);
});
