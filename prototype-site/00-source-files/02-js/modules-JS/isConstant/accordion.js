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
	revealer : module+'__revealer',

	//css classes
	item_isOpen : module+'__item--isOpen-JS',
};

if ($(Hook('revealer')).length) {

	//accordion set up code (determines accordion starting state)
	$(Hook('reference')).each(function(){
		module = module_accordion;

		var ref = $(this);

		var showMode = ref.attr('data-accordion-show');

		if (typeof showMode !== 'undefined'){

			//"all" opens all accordion items
			if (showMode === 'all') {
				ref.find(Hook('item'))
					.modAddClass('item_isOpen')
					.children(Hook('revealer'))
						.css('display','block');

			//"none" hides all items
			} else if (showMode === 'none') {
				ref.children(Hook('item'))
					.children(Hook('revealer'))
						.css('display','none');

			//using a number will open the accordion at the specified index (starting at 1)
			} else if (!isNaN(showMode)){
				var items = ref.find(Hook('item'));
				var item = items.eq(parseInt(showMode) - 1);

					items.not(item)
						.children(Hook('revealer'))
						.css('display','none');

					item.modAddClass('item_isOpen')
						.children(Hook('revealer'))
							.css('display','block');
			}
		}
	});

	//manual triggers won't close accordion items unless the user closes it themselves
	$(Hook('trigger_manual')).on('click',function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var _this_item = $(this).closest(Hook('item'));

		$(target).children(Hook('revealer')).slideToggle();
		_this_item.modToggleClass('item_isOpen');
	});

	//auto triggers will close items automatically as users open others
	$(Hook('trigger_auto')).click(function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var _this = $(this);
		var target = _this.attr('href');
		var _targetRevealer = $(target).find(Hook('revealer')).first();
		var _this_item = $(_this.attr('href'));

		var reference = _this.closest(Hook('reference'));

		if (_targetRevealer.is(':visible')){
			_targetRevealer.slideUp();
			_this_item.modRemoveClass('item_isOpen');

		} else {
			var _allItems = reference.find(Hook('item'));

			_allItems
				.not(_this_item.parents())
				.not(_this_item)
					.modRemoveClass('item_isOpen')
						.find(Hook('revealer'))
							.filter(':visible')
							.not(target)
							.slideUp();

			_this_item.modAddClass('item_isOpen');
			_targetRevealer.slideDown();
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

	});

	//handles opening and closing on hover
	$(Hook('trigger_hover')).hoverIntent({

		over: function(){
			module = module_accordion;
			if (min(bp['tablet'])){
				if (!$(this).modHasClass('item_isOpen')){
					$(this).find(Hook(['trigger_auto', 'trigger_manual'])).eq(0).click();
				}
			}
		},

		out: function(){
			module = module_accordion;
			if (min(bp['tablet'])){
				$(this).find(Hook('trigger_manual')).eq(0).click();
				//if no auto-trigger is currently being hovered over
				if (! $(this).closest(Hook('reference')).find(Hook('item') + ':hover ' + Hook('trigger_auto')).length){
					//Then close the auto trigger
					$(this).find(Hook('trigger_auto')).eq(0).click();
				}
			}
		},

		timeout: 100

	});

	//handles opening and closing of items on focus
	$(Hook('trigger_focus')).focus(function(){
		var _this = $(this);
		var _allRevealers = $(Hook('revealer'));
		var _thisRevealer = _this.closest().find(Hook('revealer'));

		_allRevealers.filter(':visible').not(_thisRevealer).slideUp();

		setTimeout(function(){
			if (_this.is(':focus')){
				_thisRevealer.slideDown();
			}
		}, 300);
	})
	.each(function(){
		var _trigger = $(this);
		//hides content when you tap the escape key
		$(window).keyup(function(e){
			module = module_accordion;

			var _revealer = _trigger.closest(Hook('item')).find(Hook('revealer')).filter(':visible');

			if (e.keyCode == 27 && revealer.length){
				_revealer.slideUp();
			}
		});

		//hides the last accordion item when leaving the navigation
		_trigger.closest(Hook('reference')).find('a').blur(function(){
			setTimeout(function(){
				module = module_accordion;
				if (!$(Hook('reference')).find(':focus').length){
					$(Hook('revealer')).slideUp();
				}
			}, 20);
		});
	});

	//can close accordion items when clicking outside this element
	$(Hook('outClickSensor')).outsideClick(function(){
		module = module_accordion;
		var revealer = $(this).find(Hook('revealer')).filter(':visible');
		if (revealer.length){
			revealer.find(Hook(['trigger_auto', 'trigger_manual'])).eq(0).click();
		}
	});
}

