$(document).ready(function() {

	/******************************************************
		Prototype only code
	******************************************************/

	//gives an inactive class to navigation links that don't go anywhere
	$('#secondary-nav li a').each(function(){
		if ($(this).attr('href') == '#') {
			$(this).addClass('inactive');
		}
	});
	$('#primary-nav li a').each(function(){
		if ($(this).attr('href') == '#') {
			$(this).addClass('inactive');
		}
	});

});//end of document.ready function
