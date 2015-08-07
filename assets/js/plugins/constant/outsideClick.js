
//Fire a function when the user clicks outside an element

//usage:
/*
	$(#element).outsideClick(function(){
		//code you want to run when clicked outside
	});
*/

//inspired by
//http://stackoverflow.com/a/3028037/1611058

(function($) {

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

