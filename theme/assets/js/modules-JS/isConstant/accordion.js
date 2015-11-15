var module_accordion = 'accordion';

//required for the targeting funcitions
module = module_accordion;

moduleTargets[module] = {

	//JS hooks
	item : module+'__item',
	trigger_manual : module+'__trigger--manual',
	trigger_auto: module+'__trigger--auto',
	reference : module+'__reference',
	content : module+'__content',
	heading : module+'__heading',

	//css classes
	item_isOpen : module+'__item--isOpen-JS',
};

if ($(Hook('content')).length) {

	$(Hook('trigger_manual')).on('click',function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var this_item = $(this).closest(Hook('item'));

		$(target).children(Hook('content')).slideToggle();
		this_item.modToggleClass('item_isOpen');
	});

	$(Hook('trigger_auto')).click(function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var targetContent = $(target).find(Hook('content'));
		var this_item = $($(this).attr('href'));

		var reference = $(this).closest(Hook('reference'));

		if (targetContent.is(':visible')){
			targetContent.slideUp();
			this_item.modRemoveClass('item_isOpen');

		} else {
			reference
				.find(Hook('item'))
					.not($(this))
					.modRemoveClass('item_isOpen')
					.end()
				.find(Hook('content')+':visible')
					.not(target)
					.slideUp()
					.end();

			reference
				.find(Hook('heading'))
				.slideDown();

			this_item
				.modAddClass('item_isOpen')
				.find(Hook('content'))
					.slideDown()
					.end()
				.find(Hook('heading'))
					.slideUp();
		}


		//this_item.modToggleClass('item_isOpen');
	});
}

