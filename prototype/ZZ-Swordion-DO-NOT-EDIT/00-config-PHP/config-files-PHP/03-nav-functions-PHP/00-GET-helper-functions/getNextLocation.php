<?php

//function for getting previous page location in relation to the navMap
function getNextLocation($location, $style){//[1,1,1]


     //creating a copy of location so I can retain access to the origional
     $locationCopy = $location;

	if ($location == [0]){
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

		//var_dump($locationDig);

		if ($locationDig == NULL){
			return NULL;
		}

		if ($style == 'lazy'){
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