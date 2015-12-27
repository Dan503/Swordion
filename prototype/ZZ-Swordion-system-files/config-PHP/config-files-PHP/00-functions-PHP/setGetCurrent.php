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

?>
