
var module_stickySideNav = 'stickySideNav';

module = module_stickySideNav;

moduleTargets[module] = {
    //js hooks
	container : module+'__container',
    trigger_open : module+'__trigger--open',
	trigger_close : module+'__trigger--close',

	//css classes
	container_isOpen : module+'__container--isOpen-JS',
};

$(Hook('trigger_open')).click(function(e){
	module = module_stickySideNav;
	preventDefault(e);
	$(Hook('container')).modAddClass('container_isOpen');
});

$(Hook('trigger_close')).click(function(e){
	module = module_stickySideNav;
	preventDefault(e);
	$(Hook('container')).modRemoveClass('container_isOpen');
});

$(Hook('container')).outsideClick(function(){
	module = module_stickySideNav;
	$(Hook('trigger_close')).click();
}, Hook('trigger_open'));