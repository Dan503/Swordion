///////////////////////////
// Style browse buttons//
/////////////////////////

if ($('input[type="file"]').length){

	$('input[type="file"]')
	.each(function(){
		var displayPos = defaultTo($(this).attr('data-display-pos'), 'right');//file name defaults to showing on the right
		var classes = $(this).attr('class');
		var buttonText = defaultTo($(this).attr('title'), 'Browse');

		var html_btn = '<a href="javascript:void(0)" class="styledBrowse__btn-JSadded classes-moved-to-here '+classes+'">'+buttonText+'</a>';
		var html_display = '<span class="styledBrowse__display-JSadded"></span>';

		var displayOrder = {
			left : [html_display, html_btn],
			right : [html_btn, html_display]
		}

		$(this).wrap('<div class="styledBrowse-JSadded"></div>');
		$(this).parent()
			.append(displayOrder[displayPos][1])
			.append(displayOrder[displayPos][0]);

		$('input[type="file"]').attr('class','');

	})
	.change(function(){
		var file_path = $(this).val();
		var last_slash = file_path.lastIndexOf("\\") + 1;
		var file_only = file_path.substr(last_slash);
		$(this).siblings('.styledBrowse__display-JSadded').text(file_only);
	});

	$('input[type=reset]').click(function(){
		$('.styledBrowse__display-JSadded').text('');
	})
};
