<?php

//function for looking up a specific portion of the navMap using a location array

function getNavMap($location){

	$returnMap = $GLOBALS['navMap'];

	foreach ($location as $i => $index){
		$returnMap = $i == 0 ? $returnMap[$index] : $returnMap['subNav'][($index - 1)];
	}

	return $returnMap;
}

?>