<?php
//check if the current page is a specific page on the site

	$isHome =
		(is_array($location)) &&
		($location[0] == 0) &&
		(count($location) == 1) ?
			true : false;

	$GLOBALS['isHome'] = $isHome;

	$isLanding =
		(is_array($location)) &&
		($location[0] != 0) &&
		(count($location) == 1) ?
			true : false;
	$GLOBALS['isLanding'] = $isLanding;

	//Miscellaneous is for pages that don't belong in the standard page navigation like search results or site map
	$isMiscellaneous = $location[0] == 0 && count($location) > 1;

	$isInternal_shallow = count($location) == 2 && $location[0] != 6;
	$isInternal_deep = count($location) == 3 || $location[0] == 6 && count($location) == 2;

	$isInternal =
		//!$isMiscellaneous &&
		($isInternal_shallow) ||
		//!$isMiscellaneous &&
		($isInternal_deep)
		 ?
			true : false;

	$GLOBALS['isInternal'] = $isInternal;
	$GLOBALS['isInternal_deep'] = $isInternal_deep;
	$GLOBALS['isInternal_shallow'] = $isInternal_shallow;
?>