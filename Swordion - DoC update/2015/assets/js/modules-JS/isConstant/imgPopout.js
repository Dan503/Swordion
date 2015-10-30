
var module_popout = 'imgPopout';

module = module_popout;

moduleTargets[module] = {
    //js hooks
	expander : module+'__expander',
    trigger : module+'__trigger',
	close : module+'__close',
	preview : module+'__preview',

	//css classes
	expander_isOpen : module+'__expander--isOpen-JS',
	preview_isOpen : module+'__preview--isOpen-JS',
};

$(Hook('trigger')).click(function(e){
	module = module_popout;
	preventDefault(e);
	$(this).closest(Hook('preview')).modAddClass('preview_isOpen');
	$($(this).attr('href')).modAddClass('expander_isOpen');
});

$(Hook('expander')).outsideClick(function(e){
	module = module_popout;
	$(this).modRemoveClass('expander_isOpen').siblings(Class('preview_isOpen')).modRemoveClass('preview_isOpen');
},
Hook('trigger'));

$(Hook('close')).click(function(e){
	module = module_popout;
	preventDefault(e);

	$($(this).attr('href'))
		.modRemoveClass('expander_isOpen')
		.closest(Hook('expander'))
			.siblings(Class('preview_isOpen'))
				.modRemoveClass('preview_isOpen');
});
