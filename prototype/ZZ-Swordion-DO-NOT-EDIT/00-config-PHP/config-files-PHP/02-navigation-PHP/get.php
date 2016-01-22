<?php
//work in progress, this will be an upgrade to the $getCurrent etc variables
function get($option, $parameter = null){

	$location = $GLOBALS['location'];

	$calcLastIndex = count($location) - 1;

	$lastIndex = $location[$calcLastIndex];

	switch($option){
		case 'depth' :
			$returnValue = count($location);
		break;

		case 'prev' :
			$location[$calcLastIndex] = $lastIndex - 1;


			$returnValue = getNavMap($location);
		break;

		case 'next' :
			$location[$calcLastIndex] = $lastIndex + 1;
			$returnValue = getNavMap($location);
		break;

	}
};

?>