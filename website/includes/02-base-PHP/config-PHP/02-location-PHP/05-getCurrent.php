<?php

//sets the current page navMap array item to a $getCurrent variable
//you can then use it like this $getCurrent['title'] to get the current title text as a span
//also contains code that sets other "get" commands related to the current item

	setGetCurrent();
	$getPrev = $GLOBALS['getPrev'];
	$getStrictPrev = $GLOBALS['getStrictPrev'];//will not go to previous parent if no previous siblings exist
	$getCurrent = $GLOBALS['getCurrent'];
	$getNext = $GLOBALS['getNext'];
	$getStrictNext = $GLOBALS['getStrictNext'];//will not go to next parent if no next siblings exist
	$getSiblings = $GLOBALS['getSiblings'];
	$getParent = $GLOBALS['getParent'];
	$getNextParent = $GLOBALS['getNextParent'];
	$getPrevParent = $GLOBALS['getPrevParent'];
	$getGrandParent = $GLOBALS['getGrandParent'];
	$getNextGrandParent = $GLOBALS['getNextGrandParent'];
	$getPrevGrandParent = $GLOBALS['getPrevGrandParent'];

//Similar to getCurrent except it is locked at the section level
	$getCurrentSection = $location[0] == 6?
		$getParent : $navMap
						[$location[0]]
						['subNav']
						[$location[1]];
	$GLOBALS['getCurrentSection'] = $getCurrentSection;

	//not really part of the "get" family but it's similar
	$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$GLOBALS['currentURL'] = $currentURL;

?>