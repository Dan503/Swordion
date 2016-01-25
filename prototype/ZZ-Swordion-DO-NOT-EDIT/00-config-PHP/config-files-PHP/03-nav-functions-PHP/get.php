<?php

//work in progress, this will be an upgrade to the $getCurrent etc variables
function get($option, $parameter = null, $style = 'deep'){

	$location = $GLOBALS['location'];
	$lastIndex = end($location);

/*
	if ($style == 'deep'){//default
		//will go to every possible page in the order they appear in the navMap
	} elseif ($style == 'strict'){
		//will skip over subnav and return NULL if a nav item doesn't exist
	} elseif ($style == 'lazy'){
		//will go up a level when hitting the edges and will skip over sub nav
	}
*/

	switch($option){
		case 'depth' :
			$returnValue = count($location);
		break;

		//prev is working
		case 'prev' :
	        //calculate what the previous location in relation to the nav map is
			$location = getPrevLocation($location, $style);
			$returnValue = getNavMap($location);
			//Note, linkGen screws the system up. I need safe guards for when linkGens are enabled.
		break;

		//next not available yet
		case 'next' :
	        //calculate what the next location in relation to the nav map is
			$location = getNextLocation($location, $style);
			$returnValue = getNavMap($location);
		break;

        case 'current':
            $returnValue = getNavMap($location);
        break;

	}

    if (isset($parameter)){
        return $returnValue[$parameter];
    } else {
        return $returnValue;
    }
};

?>