<?php

function digForLastLocation($prevOrNext, $location){
	$subNav = getNavMap($location, 'subnav');

	if(isset($subNav)){
		if ($prevOrNext == 'prev'){
			array_push($location, count($subNav) - 1);
		} else {
			array_push($location, 0);
		}
		return digForLastLocation($prevOrNext, $location);
	} else {
		return $location;
	}
}

//function for getting previous page location in relation to the navMap
function getPrevLocation($location, $style){//[1,1,1]

     //creating a copy of location so I can retain access to the origional
     $locationCopy = $location;

	if ($location == [0]){
		//basically if on the home page, return as NULL
		return NULL;
	} elseif ($location == [1]){
		//prevents the user from pressing a prev button into miscellaneous pages
		return [0];
	}

	if ($style == 'strict'){
		return NULL;
	} else {
		$lastDigit = end($location);

        //remove last value from the array if not at root level
		if (count($location) > 1 && $lastDigit == 0){
			array_pop($locationCopy);//[1,1]
		} else {
			update_last($locationCopy, $lastDigit - 1);//[1,1,0]
		};

		if ($style == 'lazy' || $style == 'deep' && $lastDigit == 0){
		    //if it's lazy style or it is deep style and it is the first nav item amongst it's siblings, return with the new reduced location array
			return $locationCopy;
		} else {
		    //this is the code for the default "deep" style

            //resetting locationCopy
            $locationCopy = $location;

            //change last item in array to be 1 less
			$prevIndex = end($locationCopy) - 1;
            update_last($locationCopy, $prevIndex);//[1,1,0]

            //get subnav for the previous section
            $prevNav = getNavMap($locationCopy, 'subnav');

            if (isset($prevNav)){

                //point location at the last sub item
                $newIndex = count($prevNav) - 1;
                array_push($locationCopy, $newIndex);

				//keep digging through subnavs until you can't dig any deeper
				return digForLastLocation('prev', $locationCopy);

            } else {
            	//if prev item has no children, point to it as the new location
				update_last($location, $prevIndex);
    			return $location;
            }
		}
	}
}

function newLocation($location, $direction = 'forward', $style){
	$locationCopy = $location;

	if ($direction == 'forward'){
		//
	} elseif ($direction == 'reverse'){
        //calculate what the previous location in relation to the nav map is
		return getPrevLocation($location, $style);
	}
}

//work in progress, this will be an upgrade to the $getCurrent etc variables
function get($option, $parameter = null, $style = 'deep'){

	$location = $GLOBALS['location'];
	$lastIndex = end($location);

/*
	if ($style == 'deep'){//default
		//will go to every possible page in the order they appear in the navMap
	} elseif ($style == 'strict'){
		//will skip over subnav and return NULL if a nav item doesn't exist
	} elseif ($style == 'lazy'){
		//will go up a level when hitting the edges and will skip over sub nav
	}
*/

	switch($option){
		case 'depth' :
			$returnValue = count($location);
		break;

		//prev is working
		case 'prev' :
			$lastIndex = $lastIndex - 1;
		    $location = newLocation($location, 'reverse', $style);
			$returnValue = getNavMap($location);
		break;

		//next not available yet
		case 'next' :
			$lastIndex = $lastIndex + 1;
			$returnValue = getNavMap($location);
		break;

        case 'current':
            $returnValue = getNavMap($location);
        break;

	}

    if (isset($parameter)){
        return $returnValue[$parameter];
    } else {
        return $returnValue;
    }
};

?>