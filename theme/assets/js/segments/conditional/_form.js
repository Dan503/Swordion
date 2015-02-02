
//General Form Javascript

//style select boxes
if ($('select').length){
	$('select').wrap('<div class="styled-select"></div>');
	$('select.error').removeClass('error').parent().addClass('error');
};

//style browse buttons
if ($('input[type="file"]').length){
	$('input[type="file"]').wrap('<div class="styled-browse-button"><a href="javascript:void(0)" class="action"></a></div>');
	$('.styled-browse-button').append('<span class="styled-browse-preview"></span>').find('a').prepend('Browse');
	$('input[type="file"].error').removeClass('error').parent().addClass('error');
	$('input[type="file"]').change(function(){
		var file_path = $(this).val();
		var last_slash = file_path.lastIndexOf("\\") + 1;
		var file_only = file_path.substr(last_slash);
		$(this).parent().next().text(file_only);
	});
	$('input[type=reset]').click(function(){
		$('.styled-browse-preview').text('');
	})
};
