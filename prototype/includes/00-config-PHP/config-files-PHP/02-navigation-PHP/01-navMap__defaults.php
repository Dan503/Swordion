<?php
	//set default links for all nav items based on the $navMap variable

function is_active($link, $path){
	//if 'link' has explicitly been set, return true.
	//or if the file defined by the path variable exists return true
	//else return false
	return isset($link) || file_exists($_SERVER['DOCUMENT_ROOT'].$path) ? true : false;
}

function set_link($isActive, $link, $generatedLink){
	//use the value for 'link' if provided
	//else use the generated link
	//if the link isn't active though, return as "#"
	return $isActive ? defaultTo($link, $generatedLink) : '#';
}

function generateDefaults($inputPath, $map, $b){
   	$outputPath = $inputPath;
	$recursivePath = $inputPath.($b+1).'/';

	$path_exists = file_exists($_SERVER['DOCUMENT_ROOT'].$outputPath.($b+1).'/index.php');
	$path_firstExists = file_exists($_SERVER['DOCUMENT_ROOT'].$outputPath.'1/index.php');
	$path_levelDownExists = file_exists($_SERVER['DOCUMENT_ROOT'].$outputPath.($b+1).'/1/index.php');

   	if ($path_exists) {
		//Detects if correct file exist and links to it if it does
		$outputPath = $outputPath.($b+1).'/';

	} else if ($path_firstExists) {
		//if the correct page doesn't exist, links to the first page
		$outputPath = $outputPath.'1/';

   	} else {
		//if the first page and correct page don't exist, it links to the first page of the next level down
		$outputPath = $outputPath.($b+1).'/1/';
   	}
	//just leaves it as '#' if the next level down doesn't exist either (part of the set_link function)

	$map['isActive'] = is_active($map['link'], $outputPath);
    $map['link'] = set_link($map['isActive'], $map['link'], $outputPath);//applies the link
	$map['isNavigable'] = defaultTo($map['isNavigable'], true);//means Item is navigable
	$map['subNavigable'] = defaultTo($map['subNavigable'], true);//means subnav will appear in the nav

echo '

'.$map['title'].'
';
	var_dump($outputPath);
	var_dump($map['link']);

    if (isset ($map['subnav'])) {
        foreach ($map['subnav'] as $c => &$subMap) {
			generateDefaults($recursivePath, $subMap, $c);
		}
	}

}

	foreach ($navMap as $a => &$nm) {
		$pathA = $contentRoot.$a.'.php';
		$nm['isActive'] = is_active($nm['link'], $pathA);
	    $nm['link'] = set_link($nm['isActive'], $nm['link'], $pathA);

		//Determines if the link appears in the navigation (defaults to true)
		$nm['isNavigable'] = defaultTo($nm['isNavigable'], true);
		$nm['subNavigable'] = defaultTo($nm['subNavigable'], true);//means subnav will appear in the nav

	    if (isset ($nm['subnav'])) {
	        foreach ($nm['subnav'] as $b => &$map) {
	        	generateDefaults($contentRoot.$a.'/', $map, $b);
			}
		}
	}
	$GLOBALS['navMap'] = $navMap;

	//var_dump($navMap);
?>