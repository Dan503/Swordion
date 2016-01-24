<?php

function digForLastLocation($prevOrNext, $location){
	$subNav = getNavMap($location, 'subnav');

	echo '<br><br>subnav:<br>';
	var_dump($subNav);

	if(isset($subNav)){
		if ($prevOrNext == 'prev'){
			array_push($location, count($subNav) - 1);
		} else {
			array_push($location, 0);
		}
		return digForLastLocation($prevOrNext, $location);
	} else {
		echo '<br><br>digForLastPrev:<br>';
		var_dump($location);
		return $location;
	}
}

//function for getting previous location when current location ends in 0
function getPrevLocation($location, $style){//[1,1,1]

     //creating a copy of location so I can retain access to the origional
     $locationCopy = $location;

	if ($location == [0]){
		//basically if on the home page, return as NULL
		return NULL;
	}

	echo '<br><br>
	origional:<br>';
	var_dump($location);

	if ($style == 'strict'){
		return null;
	} else {
		$lastDigit = end($location);
	    //step 1
        //remove last value from the array if not at root level
		if (count($location) > 1){
			array_pop($locationCopy);//[1,1]
		}
		if ($style == 'lazy' || $style == 'deep' && $lastDigit == 0){
		    //if it's lazy style or it is deep style and it is the first nav item amongst it's siblings, return with the new reduced location array
			return $locationCopy;
		} else {
		    //this is the code for the default "deep" style

            //resetting locationCopy
            $locationCopy = $location;

            //step 2
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

function newLocation($location, $direction = 'forward', $style = 'deep'){
	$locationCopy = $location;
	//[0,1,0]//current
	//[0,1]//prev
	//[0,0,1]//2x prev

	if ($style == 'deep'){//default
		//will go to every possible page in the order they appear in the navMap
	} elseif ($style == 'strict'){
		//will skip over subnav and return false if a nav item doesn't exist
	} elseif ($style == 'lazy'){
		//will go up a level when hitting the edges and will skip over sub nav
	}

	if ($direction == 'forward'){
		//
	} elseif ($direction == 'reverse'){
        //calculate what the previous location in relation to the nav map is
		return getPrevLocation($location, $style);
	}

}

//var_dump($navMap);

//work in progress, this will be an upgrade to the $getCurrent etc variables
function get($option, $parameter = null, $style = 'deep'){

	$location = $GLOBALS['location'];
	$lastIndex = end($location);

	switch($option){
		case 'depth' :
			$returnValue = count($location);
		break;

		case 'prev' :
			$lastIndex = $lastIndex - 1;

echo '<br><br>before:<br>';
            var_dump($location);

		    $location = newLocation($location, 'reverse', $style);

echo '<br><br>after:<br>';
            var_dump($location);

			$returnValue = getNavMap($location);
		break;

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