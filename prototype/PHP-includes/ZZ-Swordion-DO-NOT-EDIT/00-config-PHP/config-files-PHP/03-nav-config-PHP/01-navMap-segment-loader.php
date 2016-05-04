<?php

$navSegments = globFiles('/PHP-includes/00-navMap','array');

$navMap = [
	'title' => 'ROOT',
	'subnav' => [],
];

//goes through each nav segment in the navMap folder and pushes them to the array in order of file name
foreach ($navSegments as $segement){
	include $segement;
	array_push($navMap['subnav'], $navSegment);
}

$GLOBALS['navMap'] = $navMap;

?>