<?php

//Gets the current page title (based on the "location" global variable) and out puts it to a 'pageTitle' global variable
	function getNavItem($map, $currTarget, $currDepth) {
		$location = $GLOBALS['location'];

		if (isset($location[$currDepth])){

			$nextTarget = $location[$currDepth];


			if (isset($location[$currDepth + 1])) {
				if (!isset($location[$currDepth + 2])) {
					$GLOBALS['getPrevGrandParent'] = $map[$currTarget - 1];
					$GLOBALS['getGrandParent'] = $map[$currTarget];
					$GLOBALS['getNextGrandParent'] = $map[$currTarget + 1];
				}
				getNavItem($map[$currTarget]['subnav'], $nextTarget, $currDepth + 1);


			//if second last loop
			} else {
				$finalLocation = $location[$currDepth];
				$finalMap = $map[$currTarget]['subnav'];

				$GLOBALS['getPrev'] = $finalMap[$finalLocation - 1];
				$GLOBALS['getStrictPrev'] = $GLOBALS['getPrev'];
				if (!isset($GLOBALS['getPrev'])) {
					$GLOBALS['getPrev'] = $GLOBALS['getPrevParent'];
				}

				$GLOBALS['getCurrent'] = $finalMap[$finalLocation];

				$GLOBALS['getSiblings'] = $finalMap;
				$GLOBALS['getParent'] = $map[$currTarget];

				$GLOBALS['getNextParent'] = $GLOBALS['getGrandParent']['subnav'][$currTarget + 1];
				$GLOBALS['getPrevParent'] = $GLOBALS['getGrandParent']['subnav'][$currTarget - 1];

				$GLOBALS['getNext'] = $finalMap[$finalLocation + 1];
				$GLOBALS['getStrictNext'] = $GLOBALS['getNext'];
				if (!isset($GLOBALS['getNext'])) {
					$nextSection = defaultTo($GLOBALS['getNextParent'], $GLOBALS['getNextGrandParent']);
					$GLOBALS['getNext'] = $nextSection;
				};

			}

		} else if (count($location) == 1) {
			$GLOBALS['getPrev'] = $map[$currTarget - 1];
			$GLOBALS['getStrictPrev'] = $GLOBALS['getPrev'];

			$GLOBALS['getCurrent'] = $map[$currTarget];

			$GLOBALS['getNext'] = $map[$currTarget + 1];
			$GLOBALS['getStrictNext'] = $GLOBALS['getNext'];

			$GLOBALS['getSiblings'] = $map;
		}
	};

	function setGetCurrent(){
		$map = $GLOBALS['navMap'];
		$target = $GLOBALS['location'][0];
		getNavItem($map, $target, 1);

		if ($GLOBALS['getNext']['title'] == 'Search'){
			$GLOBALS['getNext'] = $map[1];
			$GLOBALS['getNext']['title'] = '<strong>01</strong> '.$GLOBALS['getNext']['title'];
		} else if ($GLOBALS['getCurrent']['title'] == 'Compliance index'){
			$GLOBALS['getNext'] = $map[7];
			$GLOBALS['getNext']['title'] = '<strong>07</strong> '.$GLOBALS['getNext']['title'];
		}
	}



//sets the current page navMap array item to a $getCurrent variable
//you can then use it like this $getCurrent['title'] to get the current title text as a span
//also contains code that sets other "get" commands related to the current item

	$getDepth = count($location);
	$GLOBALS['getDepth'] = $getDepth;

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

	//not really part of the "get" family but it's similar
	$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$GLOBALS['currentURL'] = $currentURL;

?>