<?php
	//set default links for all nav items based on the $navMap variable

//for catching template hits as it reads the nav map
$GLOBALS['templateHits'] = [];
$GLOBALS['templateMap'] = [];

function set_link($isActive, $link, $generatedLink){
	//use the value for 'link' if provided
	//else use the generated link
	$link = getNavMap($link,'link');
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
			'first-child' => $basePath.$i.'-0', //Links to the first page 1 level down
		);

		return $link_generation_types[$linkGenType];
	}
}

function generateDefaults($basePath, &$map, $index, $parent, $location){
	$recursivePath = $basePath.$index;

	$linkGenType = defaultTo($map['linkGen'], 'normal');

	$map = defaultTo($map, $GLOBALS['navMap__defaults']);

	$map['template'] = defaultTo($map['template'], $parent['subTemplate']);

	//if not already set to something generate a link for it
	if (!isset($map['link'])){
	    $map['link'] = generateLink($map['link'], $basePath, $index, $linkGenType, $parent['subnav']);
	}

	$map['location'] = $location;
	$map['locationString'] = implode('-', $location);
	$map['queryLocation'] = '?location='.$map['locationString'];

	//if a subnav exists in item, generate defaults for it
    if (isset ($map['subnav'])) {
        foreach ($map['subnav'] as $subIndex => &$subMap) {
	    	$locationCopy = $location;
			array_push($locationCopy, $subIndex);
			generateDefaults($recursivePath, $subMap, '-'.$subIndex, $map, $locationCopy);
		}
	}
}

//reads all template files
$templateFiles = globFiles('/PHP-includes/04-templates-PHP/', 'objects');
$defaultTemplateMap = [];

$templateListIndex = count($navMap['subnav'][0]['subnav']);
foreach ($templateFiles as $i => $templateFile){
	$locationString = '0-'.$templateListIndex.'-'.$i;
	//Add current template to templateMap
	$GLOBALS['templateMap'][$templateFile['fileName']] = [
		'title' => $templateFile['fileName'],
		'link' =>  '?location='.$locationString,
		'template' => $templateFile['fileName'],
		'subNavigable' => true,
		'subTemplate' => 'standard',
		'location' => [0, $templateListIndex, $i],
		'locationString' => $locationString,
		'queryLocation' => '?location='.$locationString,
	];
}

//generate the list for the template quick links
function generateTemplateList($map, $location, $arrayLink = null){
	if(!in_array($map['template'], $GLOBALS['templateHits'])){

		//Uses the links template instead of the current page template
		if (isset($arrayLink)){
			$map['template'] = get($arrayLink,'template');
		}

		//avoid adding standard template to list until out of the miscellaneous section of the navMap
		if (!($location[0] == 0 && $map['template'] === $GLOBALS['defaultTemplate'])){

			//add current template to template hits so it doesn't add it again
			array_push($GLOBALS['templateHits'], $map['template']);

			//ensures the link is not in array format
			convertLink($map['link']);

			//Ensures locations are set from the home page (404 screws it up otherwise)
			$openingSlash = substr($map['link'], 0, 9 ) === "?location" ? '/' : '';

			//Add current template to templateMap
			$GLOBALS['templateMap'][$map['template']] = [
				'title' => $map['template'],
				'link' =>  $map['link'],
			];
		}
	}
}

function generateSearchObjectLinks(&$map, $location, $subIndex){
	if (is_array($map['link'])){
		$arrayLink = $map['link'];
		$map['link'] = '?location='.(getNavMap($map['link'],'locationString'));
	}

	generateTemplateList($map, $location, $arrayLink);

    if (isset ($map['subnav'])) {
    	$newLocation = $location;
		array_push($newLocation, $subIndex);

        foreach ($map['subnav'] as $i => &$subMap) {
			generateSearchObjectLinks($subMap, $newLocation, $i);
		}
	}
}

//Go through the whole nav map and apply all the default values
foreach ($navMap['subnav'] as $i => &$nm) {
	$navMap['subTemplate'] = defaultTo($navMap['subTemplate'], $GLOBALS['navMap__defaults']['subTemplate']);
	$nm['template'] = defaultTo($nm['template'], $navMap['subTemplate']);
    generateDefaults('?location=', $nm, $i, $nm, [$i]);
};

//Go through the whole navMap again and convert all search array objects into links
foreach ($navMap['subnav'] as $i => &$nm) {
	generateSearchObjectLinks($nm, [$i]);
}

//creates a list of only the template titles for simple sorting
$templateList = [];
foreach ($GLOBALS['templateMap'] as $key => $templateItem){
	$templateList[$key] = $templateItem['title'];
	$key ++;
}

//sorts the list into alphabetical order while retaining key values
asort($templateList);

//generates a new templateMap list now sorted into alphabetical order
$finalTemplateMap = [];
foreach ($templateList as $key => $tempItem){
	array_push($finalTemplateMap, $GLOBALS['templateMap'][$key]);
}
$GLOBALS['templateMap'] = $finalTemplateMap;

//adds the generated template map to the main nav map
array_push($navMap['subnav'][0]['subnav'], [
	'title' => 'templateList',
	'subnav' => $GLOBALS['templateMap'],
]);

//save all changes in the nav map to the global version of the navMap
$GLOBALS['navMap'] = $navMap;

?>