<?php

//saves the location in string format
$locationString = $_GET['location'];

//Creates the $location array variable based on the location query string in page url
$location = defaultTo($location, explode ("-", $locationString));

//Converts the string values in the $location array to integers
foreach($location as $i => $integer){
	$location[$i] = (int)+$integer;
}

//Reduces all location variable values by 1 except for the first one.
//This makes it more intuitive when setting the location by letting you start the count from 1 in the folder structure while still making it easy to target the correct item in code.
//... can sometimes cause some confusion though :/
	for ($i = 0; $i < count($location); $i++) {
		if ($i != 0) {//doesn't reduce the first item
			$location[$i] = $location[$i] - 1;
		}
	}

//sets $location as a global variable
$GLOBALS['location'] = $location;
$GLOBALS['locationString'] = $locationString;

?>