<?php
	//set default links for all nav items based on the $navMap variable

function set_link($isActive, $link, $generatedLink){
	//use the value for 'link' if provided
	//else use the generated link
	return defaultTo($link, $generatedLink);
}

function generateLink ($testLink, $basePath, $i){

	if (isset($testLink)){
		return $testLink;

	} else {
		$path_exists = file_exists($_SERVER['DOCUMENT_ROOT'].$basePath.($i+1).'/index.php');
		$path_levelDown_exists = file_exists($_SERVER['DOCUMENT_ROOT'].$basePath.($i+1).'/1/index.php');
		$path_first_exists = file_exists($_SERVER['DOCUMENT_ROOT'].$basePath.'1/index.php');

	   	if ($path_exists) {
			//Detects if correct file exist and links to it if it does
			return $basePath.($i+1).'/';

	   	} else if ($path_levelDown_exists) {
			//if the correct page doesn't exist, it links to the first page of the next level down
			return $basePath.($i+1).'/1/';

		} else if ($path_first_exists) {
			//if the correct page doesn't exist and the next level down doesn't exist, it links to the first sibling page
			return $basePath.'1/';

	   	} else {
			//if none of the above exist, it just leaves the link as a '#'
			return '#';
	   	}
	}
}

function generateDefaults($inputPath, &$map, $index){
	$recursivePath = $inputPath.($index+1).'/';

    $map['link'] = generateLink($map['link'], $inputPath, $index);//applies the link
	$map = defaultTo($map, array(
		'isNavigable' => true,//means Item is navigable
		'subNavigable' => true,//means subnav will appear in the nav
	));

	//if a subnav exists in item, generate defaults for it
    if (isset ($map['subnav'])) {
        foreach ($map['subnav'] as $subIndex => &$subMap) {
			generateDefaults($recursivePath, $subMap, $subIndex);
		}
	}
}

foreach ($navMap as $i => &$nm) {
	$path = $contentRoot.$i.'/';

    $nm['link'] = generateLink($nm['link'], $path, $i - 1);

	//Determines if the link appears in the navigation (defaults to true)
	$nm = defaultTo($nm, array(
		'isNavigable' => true,//means Item is navigable
		'subNavigable' => true,//means subnav will appear in the nav
	));

    if (isset ($nm['subnav'])) {
        foreach ($nm['subnav'] as $subIndex => &$subMap) {
        	generateDefaults($path, $subMap, $subIndex);
		}
	}
}
$GLOBALS['navMap'] = $navMap;

//var_dump($navMap);

?>