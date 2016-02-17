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
	outClickSensor : module+'__outClickSensor',

	//css classes
	item_isOpen : module+'__item--isOpen-JS',
};

if ($(Hook('content')).length) {

	$(Hook('item')+'.active-trail').modAddClass('item_isOpen').children(Hook('content')).show();

	$(Hook('trigger_manual')).on('click',function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var this_item = $(target).closest(Hook('item'));

		$(target).slideToggle();
		this_item.modToggleClass('item_isOpen');
	});

	$(Hook('trigger_auto')).click(function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var targetContent = $(target);
		var this_item = $($(this).attr('href')).closest(Hook('item'));

		var reference = $(this).closest(Hook('reference'));

		if (targetContent.is(':visible')){
			//hide this item
			targetContent.slideUp();
			this_item
				.modRemoveClass('item_isOpen')

				//hide it's children
				.find(Hook('item'))
					.filter(Class('item_isOpen'))
					.modRemoveClass('item_isOpen')
					.find(Hook('content'))
						.filter(':visible')
						.slideUp();

		} else {
			//hide other items
			reference
				.find(Hook('item'))
					.not(this_item)
					.not(this_item.parentsUntil(reference))
					.modRemoveClass('item_isOpen')
				.children(Hook('content'))
					.filter(':visible')
					.not(target)
					.slideUp();

			//show this item
			this_item.modAddClass('item_isOpen');
			targetContent.slideDown();
		}
	});

	$(Hook('outClickSensor')).outsideClick(function(){
		module = module_accordion;
		if ($(this).find(Hook('content')).eq(0).is(':visible')){
			$(this).find(Hook(['trigger_auto', 'trigger_manual'])).eq(0).click();
		}
	})
}

