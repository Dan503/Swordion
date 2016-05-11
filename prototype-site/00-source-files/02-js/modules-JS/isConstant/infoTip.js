
//This would be completely redundant code if iOS behaved properly
//When unfocusing from infoTip, CSS would close it but iOS isn't appying or stripping focus properly with pure CSS

var module_infoTip = 'infoTip';

module = module_infoTip;

moduleTargets[module] = {
    //js hooks
    trigger : module+'__trigger',
	close : module+'__close',

	//css classes
	isClosed : module+'--isClosed-JS',
	isOpen : module+'--isOpen-JS',
};

$(Hook('trigger')).click(function(e){
	module = module_infoTip;
	$(this).modAddClass('isOpen').modRemoveClass('isClosed');
	e.stopPropagation();
})
.outsideClick(function(){
	module = module_infoTip;
	if ($(this).modHasClass('isOpen')){
		$(this).modAddClass('isClosed').modRemoveClass('isOpen');
	}
});

$(Hook('close')).click(function(e){
	module = module_infoTip;
	$(this).closest(Hook('trigger')).modAddClass('isClosed').modRemoveClass('isOpen');
	e.stopPropagation();
});