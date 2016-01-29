<?php

//function that retrieves a map from the navMap variable based on the title attribute
//function not to be used in regular code
function getTitleMap($map, $title) {
    $returnValue = [];

	foreach ($map as $item){
		if (strtolower($item['title']) == strtolower($title)){
            //if provided title matches the current item title,
			$returnValue =  $item;
		} elseif (isset($item['subnav'])){
			$newMap = getTitleMap($item['subnav'], $title);
			if($newMap != NULL) {
                $returnValue = $newMap;
			}
		}
	}

    if ($returnValue == NULL){
        //Fires off a notice if title could not be found
        trigger_error('"'.$title.'" title could not be found in navMap');
    }

	return $returnValue;
}

function checkSearchTerm($searchTerm){
    //Throw an error if neither a string or an interval provided
    if (!is_int($searchTerm) && !is_string($searchTerm)){
        trigger_error('');
		echo ('"'.$searchTerm.'" is neither a string or an interval. It is:<br>');
        var_dump($searchTerm);
		echo ('<br>enable errors to learn more');
    }
};

//function that accepts an array to search for specific sections of the nav map
//array accepts both numbers and titles
//function not to be used in regular code
function getSpecificMap($map, $array){

	foreach ($array as $i => $searchTerm){

		//Throw an error if neither a string or an interval provided
		checkSearchTerm($searchTerm);

		if (is_string($searchTerm)){
			//if item is a string, do a getTitleMap function on the search term using the last map
            if ($i == 0){
    			$returnMap = getTitleMap($map, $searchTerm);
            } else {
                $returnMap = getTitleMap($returnMap['subnav'], $searchTerm);
            }

		} elseif(is_int($searchTerm)) {
			//if item is a number, return the map at the specified index of the last map in array
            if ($i == 0){
    			$returnMap = $map[$searchTerm];
            } else {
    			$returnMap = $returnMap['subnav'][$searchTerm];
            }
		}

	}

    //var_dump($returnMap);
    
	return $returnMap;
}

//function for looking up a specific portion of the navMap using a location array or a title
//use this function in your code
//usage: getNavMap([array of titles/numbers, a single title, or a single number], [*optional* portion to retrieve from return map]);
function getNavMap($searchTerm, $portion = NULL){

	$returnMap = $GLOBALS['navMap'];

	if ($searchTerm == []){
		//if the search term is an empty array, it will return the full nav map
		$returnMap['subnav'] = $returnMap;
		$returnMap['title'] = "Navigation Map";
		return $returnMap;
	}

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
        trigger_error('');
		echo ($searchTerm.' is not a string, interval or an array. It is:<br>');
        var_dump($searchTerm);
		echo ('<br>enable errors to learn more');
	}

	if (isset($portion)) {
		return $returnMap[$portion];
	} else {
		return $returnMap;
	}
}

?>