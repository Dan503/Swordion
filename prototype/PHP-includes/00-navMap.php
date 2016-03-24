<?php

$navMap = [
	'title' => 'ROOT',
	//'subTemplate' => 'home',//you can use this attribute to define a new default template for all direct subnav items
	'subnav' => array(
		['title' => 'Home',
			'altTitle' => 'Welcome to Swordion',
			'link' => '/',
			'template' => 'home',
			'subNavigable' => false,
			'subnav' => array(
			//sub nav items of the home page are for miscellaneous extra navigation arrays that aren't part of the main site structure
				['title' => 'miscellaneous',
					//this is the page the template list uses for it's "standard" template link, link it to a standard content page.
					//'link' => ['Place a standard page title here'],
					'isNavigable' => false,
					'subnav' => array(
						['title' => '404: page not found',
							'template' => '404',
						],
						['title' => 'Search',
							'intro' => !empty($query) ? $pageTitle : 'Search the Department of Communications Annual Report 2014&ndash;15',
						]
					)
				],
				['title' => 'Shortcut Links',
					'isNavigable' => false,
					'subnav' => array(
						['title' => 'example shortcut',
							//parse in a navMap search array object to point the link at that page
							'link' => ['Performance reporting'],
						]
					)
				]
			)
		],

		// part 1
		['title' => 'Overview',
			'subnav' => array(
				['title' => 'Secretary&rsquo;s review'],
				['title' => 'About the Department',
					'subnav' => array (
						['title' => 'Our Corporate Plan',
							'subnav' => array(
								['title' => 'Enhancing digital productivity',
									'linkGen' => 'override-siblings', //All generated links at this level will point to this page
								],
								['title' => 'Expanding digital infrastructure'],
								['title' => 'Promoting efficient communications markets'],
								['title' => 'Strengthening our capabilities'],
							)
						],
						['title' => 'Outcome and programme',
							'subnav' => array(
								['title' => 'Outcome and programme structure'],
							)
						]
					)
				]
			)
		],

		// part 2
		['title' => 'Performance reporting',
			//'linkGen' => 'first-child', //will link to first child page instead of this page
			'subnav' => array(
				['title' => 'Outcome 1'],
				['title' => '<strong>Programme 1.1:</strong> Digital Technologies and Communications Services',
					'subnav' => array(
						['title' => 'Enhancing digital productivity'],
						['title' => 'Enhancing digital productivity: significant activities and achievements',
							'subnav' => array(
								['title' => 'Establish the Digital Transformation Officer'],
								['title' => 'Research advice on digital productivity'],
								['title' => 'Data policy'],
								['title' => 'National ICT Australia Limited (NICTA)'],
								['title' => 'Digital careers'],
								['title' => 'Digital business'],
								['title' => '<strong>Case study:</strong> Open data could drive innovation in digital economy'],
							)
						],
					)
				],
			)
		]
	)
];

$GLOBALS['navMap'] = $navMap;

?>