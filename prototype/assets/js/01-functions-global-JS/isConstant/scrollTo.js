//scroll to a specific pixel value point on the screen
function scrollTo(targetScrollPos, settings) {
	settings = defaultTo(settings, {
		duration : 0.5,
		callback : function(){},
		offset : 75,
		target : $('html, body'),
		ease : 'swing'//ease in and out
	});

	var finalScrollPos = targetScrollPos == 'max' ?
			G_page_height - G_screen_height :
			targetScrollPos;

	$('html, body').animate(
		{scrollTop: finalScrollPos - settings.offset},
		settings.duration * 1000,
		settings.ease,
		function(){
			settings.callback.call(settings.target)
		}
	);
}
