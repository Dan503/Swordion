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

?>