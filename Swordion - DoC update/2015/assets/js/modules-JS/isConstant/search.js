var module_search = 'search';

module = module_search;


moduleTargets[module] = {
    //js hooks
	container: module+'__container',
    trigger : module+'__trigger',
	input : module+'__input',

	//css classes
	open : module+'--isOpen-JS',
};

var triggerHasHover = false;

var V_savedScrollPos = VG_scrollPos;

var _container = $(Hook('container'));

$(Hook('input')).prop('disabled', true);

$(Hook('trigger')).click(function(){
	module = module_search;

	if (!$(this).closest(_container).length && !is_iOS()){
		$(this).closest('form').submit();
	} else {
		if (!_container.modHasClass('open')){
			V_savedScrollPos = VG_scrollPos;

			if (is_iOS()){
				$('body').css({
					position: 'relative',
					top: -VG_scrollPos
				});
				$('html').addClass('TK-overflowHidden');
			}
			_container.modAddClass('open');
			$(Hook('input')).prop('disabled', false).focus();
			$(this).swapTooltip();
		}
	};
}).on('mouseover', function(){
	triggerHasHover = true;
}).on('mouseout', function(){
	triggerHasHover = false;
});

$(Hook('input')).blur(function(){
	module = module_search;

	if (is_iOS()){
		$('body').removeAttr('style');
		$('html').removeClass('TK-overflowHidden');
		$(document).scrollTop(V_savedScrollPos);
	}

	if(triggerHasHover && !is_iOS()){
		$(this).closest('form').submit();
	}

      if(_container.modHasClass('open')) {
          _container.modRemoveClass('open');
	   $(Hook('trigger')).swapTooltip();
	   $(Hook('input')).prop('disabled', true);
      }
});
