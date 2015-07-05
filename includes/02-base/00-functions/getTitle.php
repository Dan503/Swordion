<?php

//Gets the current page title (based on the "location" global variable) and out puts it to a 'pageTitle' global variable

	function getNavItem($map, $currDepth) {
		$location = $GLOBALS['location'];

		if (isset($location[$currDepth])){

			$target = $location[$currDepth];

			getNavItem($map['subNav'][$target], $currDepth + 1);

		} else {
			$GLOBALS['pageTitle'] = $map['text'];
		}
	};

	function getTitle() {
		$map = $GLOBALS['navMap'];
		if (is_array($GLOBALS['location'])){
			$target = $GLOBALS['location'][0];
			getNavItem($map[$target], 1);
		} else {
			$GLOBALS['pageTitle'] = $GLOBALS['location'];
		}
	}

?>
