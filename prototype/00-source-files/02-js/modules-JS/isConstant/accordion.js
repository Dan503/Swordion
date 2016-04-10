var module_accordion = 'accordion';

//required for the targeting funcitions
module = module_accordion;

moduleTargets[module] = {

	//JS hooks
	item : module+'__item',
	trigger: module+'__trigger',
	trigger_manual : module+'__trigger--manual',
	trigger_auto: module+'__trigger--auto',
	trigger_hover: module+'__trigger--hover',
	reference : module+'__reference',
	content : module+'__content',

	//css classes
	item_isOpen : module+'__item--isOpen-JS',
};

if ($(Hook('content')).length) {

	$(Hook('reference')).each(function(){
		module = module_accordion;

		var ref = $(this);

		var showMode = ref.attr('data-accordion-show');

		if (typeof showMode !== 'undefined'){

			var setUp = {
				first : function(){
					//"first" Opens the first accordion item
					ref.find(Hook('item'))
						.filter(':first-child')
							.modAddClass('item_isOpen')
							.children(Hook('content'))
								.css('display','block');
				},
				all : function(){
					//"all" opens all accordion items
					ref.find(Hook('item'))
						.modAddClass('item_isOpen')
						.children(Hook('content'))
							.css('display','block');
				},
				none : function(){
					//"none" opens no accordion items
				}
			};

			//applies the set up functionality
			setUp[showMode]();
		}
	});

	$(Hook('trigger_manual')).on('click',function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var _this_item = $(this).closest(Hook('item'));

		$(target).children(Hook('content')).slideToggle();
		_this_item.modToggleClass('item_isOpen');
	});

	$(Hook('trigger_auto')).click(function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var _this = $(this);
		var target = _this.attr('href');
		var _targetContent = $(target).find(Hook('content')).first();
		var _this_item = $(_this.attr('href'));

		var reference = _this.closest(Hook('reference'));

		if (_targetContent.is(':visible')){
			_targetContent.slideUp();
			_this_item.modRemoveClass('item_isOpen');

		} else {
			var _allItems = reference.find(Hook('item'));


			_allItems
				.not(_this_item.parents())
				.not(_this_item)
					.modRemoveClass('item_isOpen')
						.find(Hook('content'))
							.filter(':visible')
							.not(target)
							.slideUp();

			_this_item.modAddClass('item_isOpen');
			_targetContent.slideDown();
		}

		//automatically scroll the page to the top of the segment after it has finished opening
		setTimeout(function(){
			//add data-accordion-autoscroll="true" to activate
			//automatically enables page scrolling on mobile unless cancelled with data-accordion-autoscroll="false"
			var hasAutoScroll =
				max(bp['mobile']) &&
				reference.attr('data-accordion-autoscroll') != 'false'
				||
				reference.attr('data-accordion-autoscroll') == 'true';

			if (hasAutoScroll) $(target).scrollToMe();
		}, 400);


		//_this_item.modToggleClass('item_isOpen');
	});

	$(Hook('trigger_hover')).hoverIntent(function(){
		if (min(bp['tablet'])){
			module = module_accordion;
			if (!$(this).modHasClass('item_isOpen')){
				$(this).find(Hook(['trigger_auto', 'trigger_manual'])).eq(0).click();
			}
		}
	}, function(){
		if (min(bp['tablet'])){
			$(this).find(Hook('trigger_manual')).eq(0).click();
				console.log('fsdhfsdh');
			//if no auto-trigger present in
			if (!$(Hook('item') + ':hover').find(Hook('trigger_auto')).length){
				$(this).find(Hook('trigger_auto')).eq(0).click();
			}
		}
	});
}

