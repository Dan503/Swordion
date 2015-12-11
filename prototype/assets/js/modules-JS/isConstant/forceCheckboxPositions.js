/////////////////////////////////////////////
// Force labels next to checkboxes/radios //
///////////////////////////////////////////

//if label isn't next to it's checkbox or radio button, the label is moved
$('input[type="checkbox"],input[type="radio"]').each(function(){
	var partner = $('label[for="'+$(this).attr('id')+'"]');
	if (partner != $(this).next()){
		$(this).after(partner);
	}
});
