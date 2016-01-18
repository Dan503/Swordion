<?php

//finds out if the current page is located within the provided location array or deeper
//excellent for setting active classes on navigation

function currentlyUnder ($locationArray){

	$testResults = [];

	foreach ($locationArray as $depth => $locale) {

		$isFinalLoop = $depth == count($locationArray) - 1;

		//test each item in the provided array against the current page location
		$locationMatch = $GLOBALS['location'][$depth] == $locale;

		if($locationMatch){
		//if the location matches, it adds "true" to the test case array
			array_push($testResults, true);

		} else {
		//if not, it adds "false"
			array_push($testResults, false);
		};
	}

	//if any of the location tests returned as false, this whole function returns as false
	return in_array(false, $testResults) ? false : true;
}

?>