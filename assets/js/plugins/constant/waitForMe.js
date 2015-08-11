
//Wait until an element has loaded before firing off a function.
//Particularly useful for ajax loaded content ;)
$.fn.waitForMe = function(callback){

	var element = this;
	var timeout = 10000;//10 seconds
	var loopTime = 10;//delay between checks
	var currentTime = 0;

	var interval = setInterval(function(){

		//element found successfully
		if (element.length){
			clearInterval(interval);
			callback.call(element);

		//element not found within timeout time
		} else if (currentTime >= timeout){
			clearInterval(interval);
			console.log("Error: " + element.selector + " was not found or failed to load.");
		}

		currentTime = currentTime + loopTime;
	}, loopTime);

	return this;
}
