<?php

//function for getting previous location when current location ends in 0
function getPrevLocation($location, $style){
	if ($style == 'strict'){
		return null;
	} else {
	    //step 1
        //remove last value from the array
		array_pop($location);
		if ($style == 'lazy'){
		    //if it's lazy style, return with the new location array
			return $location;
		} else {
		    //this is the code for "deep" style
            
            //creating a copy as I'll need this version of $location later
            $locationCopy = $location;
            
            //step 2
            //change last item in array to be 1 less
			$prevIndex = end($locationCopy) - 1;
            update_last($locationCopy, $prevIndex);
            
            //get
            $prevNav = getNavMap($locationCopy, 'subnav');
            
            if ($prevIndex < 0){
                //if prevIndex = -1, run this function again with the new array
				getPrevLocation($locationCopy, $style);
                
            } elseif ($prevNav != null) {
                //point location at the last sub item 
                $newIndex = count($prevNav) - 1;
                array_push($locationCopy, $newIndex);
                
                //incase there are more sub items, run the function again
                getPrevLocation($locationCopy, $style);
            } else {
                //if no subnav found on previous item, just return to parent directory like 'lazy' style
    			return $location;                
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

	if ($direction == 'forward'){
		//
	} elseif ($direction == 'reverse'){
	    //reduce last location value by 1
	    $prevLocationValue = end($location) - 1;
        
        //if last location value is less than 0 (ie. -1)
	    if ($prevLocationValue < 0){
	        //run the complex prev location function
    		return getPrevLocation($location, $style);	        
	    } else {
	        //change last value to the new value            
            update_last($location, $prevLocationValue);
	        
	        return $location;
	    }
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

		    $location = newLocation($location, 'reverse', $style);

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