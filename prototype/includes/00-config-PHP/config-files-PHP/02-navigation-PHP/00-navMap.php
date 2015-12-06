<?php

	$navMap = array(
		array(
			'title' => 'Welcome to Swordion',
			'link' => '/',
			'template' => 'home',
			'subNav' => array(
			//sub nav items of the home page are for miscellaneous extra navigation arrays that aren't part of the main site structure
				array(
					'title' => 'miscellaneous',
					'isNavigable' => false,
					'subNav' => array(
						array (
							'title' => '404: page not found',
						), array (
							'title' => 'Search',
							'intro' => !empty($query) ? $pageTitle : 'Search the Department of Communications Annual Report 2014&ndash;15',
						)
					)
				), array(
					'title' => 'Shortcut Links',
					'subNav' => array(
						array(
							'title' => 'example shortcut',
							'link' => '/pages/1/2/3.php'
						)
					)
				)
			)
		), array(
		// part 1
			'title' => 'Overview',
			'subNav' => array(
				array(
					'title' => 'Secretary&rsquo;s review',
				), array (
					'title' => 'About the Department',
					'subNav' => array (
						array(
							'title' => 'Our Corporate Plan',
							'subNav' => array(
								array(
									'title' => 'Enhancing digital productivity',
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
							'subNav' => array(
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
			'subNav' => array(
				array(
					'title' => 'Outcome 1',
					),
				array(
					'title' => '<strong>Programme 1.1:</strong> Digital Technologies and Communications Services',
					'subNav' => array(
						array(
							'title' => 'Enhancing digital productivity',

						),
						array(
							'title' => 'Enhancing digital productivity: significant activities and achievements',
							'subNav' => array(
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