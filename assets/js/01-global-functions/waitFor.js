
//Wait until an element has loaded before firing off a function.
//Particularly useful for ajax loaded content ;)
function waitFor(element, callback){
	var interval = setInterval(function(){
		if ($(element).length){
			clearInterval(interval);
			callback();
		}
	}, 10);
}