
function randomNumber(lower_bound, upper_bound, amount) {

	amount = defaultTo(amount, 1);
	lower_bound = defaultTo(lower_bound, 0);
	upper_bound = defaultTo(upper_bound, 999999999);

	var unique_random_numbers = [];

	//Example, including customisable intervals [lower_bound, upper_bound)
	while (unique_random_numbers.length < amount) {
	    var random_number = Math.round(Math.random()*(upper_bound - lower_bound) + lower_bound);
	    if (unique_random_numbers.indexOf(random_number) == -1) {
	        // Yay! new random number
	        unique_random_numbers.push( random_number );
	    }
	}

	if (amount == 1) {
		return unique_random_numbers[0];
	} else {
		return unique_random_numbers;
	}
	// unique_random_numbers is an array containing 3 unique numbers in the given range
}
