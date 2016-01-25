<?php

//function for getting previous page location in relation to the navMap
function getNextLocation($location, $style){//[1,1,1]

     //creating a copy of location so I can retain access to the origional
     $locationCopy = $location;

	if ($location == [end($location)]){//if location = [X] (X being the last item at the root level of the nav map)
		//basically if on the home page, return as NULL
		return NULL;
	} elseif ($location == [0]){
		//prevents the user from pressing a next button into miscellaneous pages
		return [1];
	}

	$lastDigit = end($location);

	//negative 1 to align it with index counting from 0 so code makes more sense
	$siblingCount = count(get('parent','subnav')) - 1;

	//if strict and no next items available, return NULL
	if ($style == 'strict' && $lastDigit + 1 > $siblingCount){
		return NULL;
	} else {

		//keep digging through parents until you hit a page with a sibling after it
		$locationDig = digForLastLocation('next', $locationCopy);

		if ($locationDig == NULL){
			return NULL;
		}

		if ($style == 'lazy'){
		    //if it's lazy style or it is deep style and it is the first nav item amongst it's siblings, return with the new reduced location array
			return $locationDig;
		} else {
		    //this is the code for the default "deep" style

            //resetting locationCopy
            $locationCopy = $location;

            //change last item in array to be 1 higher
			$nextIndex = end($locationCopy) + 1;

			//check if current page has a navigable subnav
            if (hasSubnav($location)){

                //point location at the first sub item
                array_push($locationCopy, 0);//[1,1,1,0]

				return $locationCopy;

            } else {

				update_last($locationCopy, $nextIndex);//[1,1,2]

				$siblingNonExistant = end($locationCopy) > $siblingCount;

				if ($siblingNonExistant){
					return $locationDig;
				} else {
	    			return $locationCopy;
				}

            }
		}
	}
}

?>