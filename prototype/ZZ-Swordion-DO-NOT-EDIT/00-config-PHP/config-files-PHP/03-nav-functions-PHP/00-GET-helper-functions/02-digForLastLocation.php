<?php

function digForLastLocation($prevOrNext, $location){

	$subNav = getNavMap($location, 'subnav');

	if ($prevOrNext == 'prev'){
		if(hasSubnav($location)){
			array_push($location, count($subNav) - 1);
			return digForLastLocation($prevOrNext, $location);
		} else {
			return $location;
		}
	} else {

		$locationCopy = $location;

		$atRootLevel = count($location) == 1;

		$parentSibings = $atRootLevel ? $GLOBALS['navMap'] : get('grandParent','subnav');

		$siblingCount = count($parentSibings) - 1;

		if (!$atRootLevel){
			array_pop($locationCopy);
		}

		$lastDigit = end($locationCopy);


		$isLastSibling = $lastDigit == $siblingCount;

		if ($isLastSibling && !$atRootLevel){
			return digForLastLocation($prevOrNext, $locationCopy);

		} else {
			$nextSiblingLocation = $locationCopy;

			update_last($nextSiblingLocation, $lastDigit + 1);//[1,2]

			return $nextSiblingLocation;

		};
	}
}

?>