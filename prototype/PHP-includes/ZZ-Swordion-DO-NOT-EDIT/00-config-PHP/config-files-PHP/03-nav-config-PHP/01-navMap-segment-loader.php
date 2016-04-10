<?php

$navSegments = globFiles('PHP-includes/00-navMap-segments','array');

$navMap = [
	'title' => 'ROOT',
	'subnav' => [],
];

//goes through each nav segment in the navMap-segments folder and pushes them to the array in order of file name
foreach ($navSegments as $segement){
	include $segement;
	array_push($navMap['subnav'], $navSegment);
}

$GLOBALS['navMap'] = $navMap;

?>