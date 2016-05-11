
//Reveals the template list on the prototype

var module_protoTemplates = 'protoTemplates';

module = module_protoTemplates;

moduleTargets[module] = {
    //js hooks
    trigger : module+'__trigger',
	target : module+'__target',
	focus : module+'__focus',
	closer : module+'__closer',
	link : module+'__link',

	target_open : module+'--isOpen',
};

$(Hook('trigger')).click(function(e){
	module = module_protoTemplates;
	e.preventDefault();
	$(Hook('target')).modAddClass('target_open');
	$(Hook('focus')).focus();
});

$(Hook('link')).click(function(e){
	e.stopPropagation();
});

$(Hook('closer')).click(function(e){
	module = module_protoTemplates;
	e.preventDefault();
	$(Hook('target')).modRemoveClass('target_open');
});

$('body').keyup(function(key){
	module = module_protoTemplates;
	if (key.keyCode == 27){//if escape key
		$(Hook('closer')).click();
	}
});