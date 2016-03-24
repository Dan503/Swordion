<?php

function getSiblingParent($location, $nextPrev){
	$locationCopy = $location;
	array_pop($locationCopy);
	$lastDigit = end($locationCopy);
	if ($nextPrev == 'next'){
		update_last($locationCopy, $lastDigit + 1);
	} else {
		update_last($locationCopy, $lastDigit - 1);
	}
	return getNavMap($locationCopy);
}

?>