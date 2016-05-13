<?php
$navSegment = [
'title' => 'Core Concepts',
	//'template' => 'listing',//assigns a template for this page
	//'subTemplate' => 'sub-template-name',//assigns a template for all immediate child pages
	'subNavigable' => false,//child pages do not appear in standard navigation
	'subnav' => array(
		['title' => 'General concepts',
			'subnav' => array(
				['title' => 'Just save files into folders'],
			)
		],
		['title' => 'PHP concepts',
			'subnav' => array(
				['title' => 'Page &gt; Template &gt; Layout cascade'],
				['title' => 'Content loading system'],
				['title' => 'Auto-generated links'],
			)
		],
		['title' => 'Sass concepts',
			'subnav' => array(
				['title' => 'Media Queries'],
				['title' => 'Brand colors'],
				['title' => 'Base files vs Module files'],
				['title' => 'Grid system'],
			)
		],
		['title' => 'Javascript system'],
	)
];
?>