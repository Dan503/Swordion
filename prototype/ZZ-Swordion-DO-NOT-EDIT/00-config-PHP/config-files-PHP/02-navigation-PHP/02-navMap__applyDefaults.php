<?php
	//set default links for all nav items based on the $navMap variable

function set_link($isActive, $link, $generatedLink){
	//use the value for 'link' if provided
	//else use the generated link
	return defaultTo($link, $generatedLink);
}

function generateLink ($linkOveride, $basePath, $i, $linkGenType, $siblings){

	foreach ($siblings as $sibIndex => $sibling){
		if (isset($sibling['linkGen']) && $sibling['linkGen'] == 'override-siblings'){
			$sibOveride = $basePath.'-'.($sibIndex+1);
		}
	}


	if (isset($linkOveride)){
		return $linkOveride;//Links to the defined link from the nav map file

	} elseif (isset($sibOveride)) {
		return $sibOveride;//Links to the last sibling page that has 'linkGen' set to "override-siblings"

	} else {
		$link_generation_types = array(
			'normal' => $basePath.$i, //Links directly to the associated page (default)
			'first-child' => $basePath.$i.'-1', //Links to the first page 1 level down
		);

		return $link_generation_types[$linkGenType];
	}
}

function generateDefaults($basePath, &$map, $index, $siblings){
	$recursivePath = $basePath.$index;

	$linkGenType = defaultTo($map['linkGen'], 'normal');

    $map['link'] = generateLink($map['link'], $basePath, $index, $linkGenType, $siblings);

	$map = defaultTo($map, $GLOBALS['navMap__defaults']);

	//if a subnav exists in item, generate defaults for it
    if (isset ($map['subnav'])) {
        foreach ($map['subnav'] as $subIndex => &$subMap) {
			generateDefaults($recursivePath, $subMap, '-'.($subIndex + 1), $map['subnav']);
		}
	}
}

foreach ($navMap as $i => &$nm) {
    generateDefaults('?location=', $nm, $i);
}

$GLOBALS['navMap'] = $navMap;

//var_dump($navMap);

?>