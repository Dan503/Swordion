<?php

$navSegment = [
'title' => 'Home',
	'altTitle' => 'Welcome to Swordion',
	'link' => '/',
	'template' => 'home',
	'subNavigable' => false,
	'subnav' => array(
	//sub nav items of the home page are for miscellaneous extra navigation arrays that aren't part of the main site structure
		['title' => 'miscellaneous',
			//'link' => ['Place a standard page title here'],
			'subnav' => array(
				['title' => '404: page not found',
					'template' => '404',
				],
				['title' => 'Search']
			)
		],
		['title' => 'Shortcut Links',
			'subnav' => array(
				['title' => 'example shortcut',
					//parse in a navMap search array to point the link at that page
					'link' => ['About us'],
				]
			)
		]
	)
];

?>