
var module_styledSelect = 'styledSelect';

module = module_styledSelect;

moduleTargets[module] = {
    //CSS classes
	wrapper : module+'-JSadded',
	display : module+'__display-JSadded',
};

// Styled select boxes
$('select').each(function(){
	var text = $(this).find('option:selected').text();
	var extra_classes = ' classes-moved-from-select-to-here-with-js ' + $(this).attr('class');
	$(this).attr('class', '');
	$(this).wrap('<div class="'+Span('wrapper') + extra_classes +'" />');
	$(this).after('<span class="'+Span('display')+' TK-elipsis">' + text + '</span>');
	if ($(this).hasClass('hasError')){
		$(this).parent().addClass('hasError');
	}
});

$('select').on('change', function(){
	var text = $(this).find('option:selected').text();
	$(this).next(Class('display')).html(text);
});
