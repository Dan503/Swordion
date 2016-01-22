<?php

//saves the location in string format
$locationString = $_GET['location'];

//Creates the $location array variable based on the location query string in page url
$location = defaultTo($location, explode ("-", $locationString));

//Converts the string values in the $location array to integers
foreach($location as $i => $integer){
	$location[$i] = (int)+$integer;
}

//sets $location as a global variable
$GLOBALS['location'] = $location;
$GLOBALS['locationString'] = $locationString;

?>