<?php

	$navMap = array(
		array(
			'title' => 'Home',
			'altTitle' => 'Welcome to Swordion',
			'link' => '/',
			'template' => 'home',
			'subnav' => array(
			//sub nav items of the home page are for miscellaneous extra navigation arrays that aren't part of the main site structure
				array(
					'title' => 'miscellaneous',
					'isNavigable' => false,
					'subNavigable' => false,
					'link' => '#',
					'subnav' => array(
						array (
							'title' => '404: page not found',
							'template' => '404',
						), array (
							'title' => 'Search',
							'intro' => !empty($query) ? $pageTitle : 'Search the Department of Communications Annual Report 2014&ndash;15',
						)
					)
				), array(
					'title' => 'Shortcut Links',
					'isNavigable' => false,
					'link' => '#',
					'subnav' => array(
						array(
							'title' => 'example shortcut',
							'link' => '?location=1-1-2'
						)
					)
				)
			)
		), array(
		// part 1
			'title' => 'Overview',
			'subnav' => array(
				array(
					'title' => 'Secretary&rsquo;s review',
				), array (
					'title' => 'About the Department',
					'subnav' => array (
						array(
							'title' => 'Our Corporate Plan',
							'subnav' => array(
								array(
									'title' => 'Enhancing digital productivity',
									'linkGen' => 'override-siblings', //All generated links at this level will point to this page
								),
								array(
									'title' => 'Expanding digital infrastructure',
								),
								array(
									'title' => 'Promoting efficient communications markets',
								),
								array(
									'title' => 'Strengthening our capabilities',
								)
							)
						),
						array (
							'title' => 'Outcome and programme',
							'subnav' => array(
								array(
									'title' => 'Outcome and programme structure',
								)
							)
						)
					)
				)
			)
		), array(
		// part 2
			'title' => 'Performance reporting',
			'linkGen' => 'first-child', //will link to first child page instead of this page
			'subnav' => array(
				array(
					'title' => 'Outcome 1',
					),
				array(
					'title' => '<strong>Programme 1.1:</strong> Digital Technologies and Communications Services',
					'subnav' => array(
						array(
							'title' => 'Enhancing digital productivity',

						),
						array(
							'title' => 'Enhancing digital productivity: significant activities and achievements',
							'subnav' => array(
								array(
									'title' => 'Establish the Digital Transformation Officer',
								),
								array(
									'title' => 'Research advice on digital productivity',
								),
								array(
									'title' => 'Data policy',
								),
								array(
									'title' => 'National ICT Australia Limited (NICTA)',
								),
								array(
									'title' => 'Digital careers',
								),
								array(
									'title' => 'Digital business',
								),
								array (
									'title' => '<strong>Case study:</strong> Open data could drive innovation in digital economy',
								)
							)
						),
					)
				),
			)
		)
	);

	$GLOBALS['navMap'] = $navMap;


?>