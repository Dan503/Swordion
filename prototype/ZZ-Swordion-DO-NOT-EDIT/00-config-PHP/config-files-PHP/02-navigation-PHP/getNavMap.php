<?php

//function that retrieves a map from the navMap variable based on the title attribute
//function not to be used in regular code
function getTitleMap($map, $title) {
	$toReturn = "";
	foreach ($map as $item){
		if (strtolower($item['title']) == strtolower($title)){
			$toReturn =  $item;
			return $toReturn;
		} elseif (isset($item['subnav'])){
			$returned = getTitleMap($item['subnav'], $title);
			if($returned != NULL) return $returned;
		}
	}
}

//function that accepts an array to search for specific sections of the nav map
//array accepts both numbers and titles
//function not to be used in regular code
function getSpecificMap($map, $array){

	foreach ($array as $i => $searchTerm){

		//Throw an error if neither a string or an interval provided
		if (!is_int($searchTerm) && !is_string($searchTerm)){
			$error = $searchTerm.' is neither a string or an interval';
			var_dump($searchTerm);
			throw new Exception($error);
		}

		//If the first round
		if ($i == 0){
			if (is_string($searchTerm)){
				//if first item is a string, do a standard getTitleMap function on the search term
				$returnMap = getTitleMap($map, $array[0]);

			} elseif(is_int($searchTerm)) {
				//if first item is a number, return the map at the specified index of the full navMap for the first item in the array
				$returnMap = $map[$searchTerm];
			}

		//For every other round
		} else {
			if (is_string($searchTerm)){
				//use the previously filtered map to search by *title* for each string in the array (excluding first item)
				$returnMap = getTitleMap($returnMap['subnav'], $searchTerm);
			} elseif (is_int($searchTerm)){
				//Use the previously filtered map to search by *number* for each number in the array (excluding first item)
				$returnMap = $returnMap['subnav'][$searchTerm - 1];
			}
		}
	}

	return $returnMap;
}

//function for looking up a specific portion of the navMap using a location array or a title
//use this function in your code
//usage: getNavMap([array of titles/numbers, a single title, or a single number], [*optional* portion to retrieve from return map]);
function getNavMap($searchTerm, $portion = false){

	$returnMap = $GLOBALS['navMap'];

	//code for when an array is given (filters results based on numbers and titles provided in array)
	 if (is_array($searchTerm)){
		$returnMap = getSpecificMap($returnMap, $searchTerm);

	//code for when a string is given (searches full nav map for Title that matches)
	} elseif (is_string($searchTerm)) {
		$returnMap = getTitleMap($returnMap, $searchTerm);

	//code for when a single number is given (treats it as a single level location variable)
	} elseif (is_int($searchTerm)) {
		$returnMap = $returnMap[$searchTerm];

	//throws error if $searchTerm variable doesn't make sense
	} else {
		var_dump($searchTerm);
		$error = $searchTerm.' could not be resolved';
		throw new Exception($error);
	}

	if ($portion == false) {
		return $returnMap;
	} else {
		return $returnMap[$portion];
	}
}

?>