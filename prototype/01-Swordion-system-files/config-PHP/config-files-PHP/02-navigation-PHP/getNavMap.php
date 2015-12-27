<?php

//function that retrieves map based on title for getNavMap function
function getTitleMap($map, $title) {
	foreach ($map as $i => $item){
		if (strtolower($item['title']) == strtolower($title)){
			return $item;
		} elseif (isset($item['subnav'])){
			getTitleMap($item['subnav'], $title);
		}
	}
}

//function for looking up a specific portion of the navMap using a location array or a title

function getNavMap($locationOrTitle, $portion = false){

	$returnMap = $GLOBALS['navMap'];

	//code for when a location array is given
	if (is_array($locationOrTitle) && is_int($locationOrTitle[0])){
		foreach ($locationOrTitle as $i => $index){
			$returnMap = $i == 0 ? $returnMap[$index] : $returnMap['subnav'][($index - 1)];
		}

	//code for when a title is given
	} elseif (is_string($locationOrTitle)) {
		$returnMap = getTitleMap($returnMap, $locationOrTitle);

	//throws error if $locationOrTitle variable doesn't make sense
	} else {
		$error = $locationOrTitle.' is neither a location array or a title';
		throw new Exception($error);
	}

	if ($portion == false) {
		return $returnMap;
	} else {
		return $returnMap[$portion];
	}
}

?>