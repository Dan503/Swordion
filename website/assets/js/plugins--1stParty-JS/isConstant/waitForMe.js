
//Wait until an element has loaded before firing off a function.
//Particularly useful for ajax loaded content ;)
$.fn.waitForMe = function(callback, loopTime, timeout){

	timeout = defaultTo(timeout, 10000);//10 seconds
	loopTime = defaultTo(loopTime, 10);//delay between checks

	var selection = this.selector;
	var currentTime = 0;

	var interval = setInterval(function(){

		//element found successfully
		if ($(selection).length){
			clearInterval(interval);
			callback.call($(selection));

		//element not found within timeout time
		} else if (currentTime >= timeout){
			clearInterval(interval);
			throw "Error: " + selection + " was not found or failed to load.";
		}

		currentTime = currentTime + loopTime;
	}, loopTime);

	return this;
}

//wait until a variable has been defined
function waitForMe(variable, callback, loopTime, timeout){
	timeout = defaultTo(timeout, 10000);//10 seconds
	loopTime = defaultTo(loopTime, 10);//delay between checks

	var currentTime = 0;

	var interval = setInterval(function(){

		//element found successfully
		if (typeof variable !== 'undefined'){
			clearInterval(interval);
			callback.call($(selection));

		//element not found within timeout time
		} else if (currentTime >= timeout){
			clearInterval(interval);
			throw "Error: waitForMe variable was never defined.";
		}

		currentTime = currentTime + loopTime;
	}, loopTime);
}