
//randomNumber(); generates a random number between 0 and 999999999

//randomNumber(5,10); generates a random number between 5 and 10

//randomNumber(5, 10, {amount : 3}); generates 3 unique random numbers in between 5 and 10

//randomNumber(5, 10, {amount : 3, unique: false}); generates 3 random numbers in between 5 and 10 that may double up.

function randomNumber(lower_bound, upper_bound, settings) {

	lower_bound = defaultTo(lower_bound, 0);
	upper_bound = defaultTo(upper_bound, 999999999);

	settings = defaultTo(settings, {
		amount : 1,
		unique : true,
	});

	var random_numbers = [];

	if (lower_bound > upper_bound) {
		throw "Random number lower bound (" + lower_bound + ") must be higher than upper bound (" + upper_bound + ")";
	} else if ((upper_bound - lower_bound) > settings.amount && settings.unique){
		console.warn("There are less than " + settings.amount + " unique numbers between " + lower_bound + " and " + upper_bound + ". Numbers will not be unique");
		settings.unique = false;
	}

	//Example, including customisable intervals [lower_bound, upper_bound)
	while (random_numbers.length < settings.amount) {

		//creates random number
	    var number = Math.round(Math.random()*(upper_bound - lower_bound) + lower_bound);

		//tests for uniquness or gets set to true if unique is set to false
		var uniqueTest = settings.unique ? random_numbers.indexOf(number) == -1 : true;

	    if (uniqueTest) {
	        // Yay! new random number
	        random_numbers.push( number );
	    }
	}

	if (settings.amount == 1) {
		return random_numbers[0];
	} else {
		return random_numbers;
	}
}
