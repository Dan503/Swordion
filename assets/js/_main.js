jQuery(function($){//document.ready function and prevents $ interfearing with other scripts (can't inherit from plugins.js :( )

	//allows skip links to continue tabing from the jump-to point
	$('a.vh.focusable').click(function () {
		var anchor = $(this).attr('href');
		$(anchor).focus();
	});

	$('#equalTest div').equalHeights();
	

	//make any element take up the full screen height minus the header
	function fullScreenDiv (element){
		function fullScreen(target){
			var windowHeight = $(window).height();
			var headerHeight = $('header').height();
			$(target).height(windowHeight - headerHeight);
		};

		fullScreen(element);

		$(window).resize(function(){
			fullScreen(element)
		});
	};

	fullScreenDiv($('.full-screen-div-example'));

	if ($('#element').length){

	}

});//end of document.ready function

