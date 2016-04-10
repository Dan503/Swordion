<?php

//Define alterations to the main layout in the template_settings
/*
'alterationGroup' => [
	'alterationType' => 'alterationValue',
]
*/

$GLOBALS['template_settings'] = [
	//overides the default 'has'
	'has' => [
		'sidebar' => false,
	]
];

//Define the layout that this template uses
$get['current']['layout'] = 'standard';

?>