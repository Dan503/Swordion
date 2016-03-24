<?php

//finds out if the current page is located within the provided location array or deeper
//excellent for setting active classes on navigation

function amCurrentlyUnder ($locationArray){

	$testResults = [];

	foreach ($locationArray as $depth => $locale) {

		if (isset($GLOBALS['location'][$depth])){

			//test each item in the provided array against the current page location
			$locationMatch = $GLOBALS['location'][$depth] == $locale;

			if($locationMatch){
			//if the location matches, it adds "true" to the test results array
				array_push($testResults, true);

			} else {
			//if not, it adds "false"
				array_push($testResults, false);
			};
		} else {
			//if the provided array isn't as long as the current global location, it adds false to the test results array
			array_push($testResults, false);
		}
	}

	//if any of the location tests returned as false, this whole function returns as false
	return !in_array(false, $testResults);
}

?>