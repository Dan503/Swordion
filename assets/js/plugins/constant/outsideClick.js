
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
		if (e.which == 27) $('body').click(); //escape key
	});

	//The actual plugin
    $.fn.outsideClick = function(callback, exclusions) {
    	var subject = this;

		//test if exclusions have been set
		var hasExclusions = typeof exclusions !== 'undefined';


		$(document).click(function(event) {

			//click target does not contain subject as a parent
			var clickedOutside = !$(event.target).closest(subject).length;

			//click target was on one of the excluded elements
			var clickedExclusion = $(event.target).closest(exclusions).length;

			var testSuccessful;

			if (hasExclusions) {
				testSuccessful = clickedOutside && !clickedExclusion;
			} else {
				testSuccessful = clickedOutside;
			}

		    if(testSuccessful) {
				callback.call(subject, event);
		    }
		});

        return this;
    };

}(jQuery));

