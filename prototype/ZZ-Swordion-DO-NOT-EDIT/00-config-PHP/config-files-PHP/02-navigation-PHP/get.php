<?php

//alters array based on style given
function gotToParentChild($array, $style){
	if ($style == 'strict'){
		return false;
	} else {
		array_pop($locationCopy);
		if ($style == 'lazy'){
			return $locationCopy;
		} else {
			array_push($locationCopy, 0);
			if(isset(getNavMap($locationCopy))){
				newLocation($locationCopy);
			} else {
				gotToParent($locationCopy);
			}
		}
	}
}

function newLocation($location, $direction = 'forward', $style = 'deep'){
	$locationCopy = $location;

	if ($style == 'deep'){//default
		//will go to every possible page in the order they appear in the navMap
	} elseif ($style == 'strict'){
		//will skip over subnav and return false if a nav item doesn't exist
	} elseif ($style == 'lazy'){
		//will go up a level when hitting the edges and will skip over sub nav
	}

	if ($direction = 'forward'){
		//
	} elseif ($direction = 'reverse'){
		return gotToParentChild($location, $style);
	}

}

//work in progress, this will be an upgrade to the $getCurrent etc variables
function get($option, $parameter = null){

	$location = $GLOBALS['location'];
	$lastIndex = end($location);

	switch($option){
		case 'depth' :
			$returnValue = count($location);
		break;

		case 'prev' :
			$lastIndex = $lastIndex - 1;

			if ($lastIndex < 0) {

			}

			$returnValue = getNavMap($location);
		break;

		case 'next' :
			$lastIndex = $lastIndex + 1;



			$returnValue = getNavMap($location);
		break;

	}
};

?>