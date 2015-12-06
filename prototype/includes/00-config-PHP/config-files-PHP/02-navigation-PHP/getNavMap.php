<?php

//function for looking up a specific portion of the navMap using a location array

function getNavMap($location, $portion = false){

	$returnMap = $GLOBALS['navMap'];

	foreach ($location as $i => $index){
		$returnMap = $i == 0 ? $returnMap[$index] : $returnMap['subnav'][($index - 1)];
	}

	if ($portion == false) {
		return $returnMap;
	} else {
		return $returnMap[$portion];
	}
}

?>