
//Fire a function when the user clicks outside an element

//usage:
/*
	$('#element').outsideClick(function(){
		//code you want to run when clicked outside
	});
*/

//inspired by
//http://stackoverflow.com/a/3028037/1611058

(function($) {
	//when the user hits the escape key, it will trigger all outsideClick functions
	$(document).on("keyup", function (e) {
		if (e.which == 27) $('body').click();
	});

	//The actual plugin
    $.fn.outsideClick = function(callback) {
    	var subject = this;

		$(document).click(function(event) {
		    if(!$(event.target).closest(subject).length) {
				callback.call(subject);
		    }
		});

        return this;
    };

}(jQuery));

