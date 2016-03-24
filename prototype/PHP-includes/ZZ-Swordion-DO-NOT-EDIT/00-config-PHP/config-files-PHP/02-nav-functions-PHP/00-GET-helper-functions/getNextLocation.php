<?php

//function for getting previous page location in relation to the navMap
function getNextLocation($location, $style){//[1,1,1]

     //creating a copy of location so I can retain access to the origional
     $locationCopy = $location;

	if ($location == [0]){
		//prevents the user from pressing a next button into miscellaneous pages
		return [1];
	}

	$lastDigit = end($location);//1

	$siblings = get('siblings');

	//negative 1 to align it with index counting from 0 so code makes more sense
	$siblingCount = count($siblings) - 1;



	//if strict and no next items available, return NULL
	if ($style == 'strict' && $lastDigit + 1 > $siblingCount){
		return NULL;
	} else {
		if(hasLinkGen('override-siblings')){
			if(hasSubNav($location) && $style == 'deep'){
				return get('children', 0, 'location');
			} else {
				array_pop($locationCopy);
				$newLastDigit = end($locationCopy);
				update_last($locationCopy, $newLastDigit + 1);
				return $locationCopy;
			}
		}

		//keep digging through parents until you hit a page with a sibling after it
		$locationDig = digForLastLocation('next', $locationCopy);

		//var_dump($locationDig);

		if ($locationDig == NULL){
			//I'm a little worried about this causing unwanted edge cases
			return NULL;
		}

		if (hasLinkGen){}

		//resetting locationCopy
		$locationCopy = $location;

		//change last item in array to be 1 higher
		$nextIndex = $lastDigit + 1;

		if ($style == 'lazy'){
			update_last($locationCopy, $nextIndex);//[1,1,2]

			if (getNavMap($locationCopy) == NULL){
				return $locationDig;
			} else {
				return $locationCopy;
			}

		//check if current page has a navigable subnav
        } elseif (hasSubnav($location)){

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

?>