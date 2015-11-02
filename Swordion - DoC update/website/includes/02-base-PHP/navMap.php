<?php

	$navMap = array(
		array(
			'title' => 'Welcome to Swordion',
			'link' => '/',
			'subNav' => array(
				array (
					'title' => '404: page not found',
					'isNavigable' => false
				), array (
					'title' => 'Search',
					'intro' => !empty($query) ? $pageTitle : 'Search the Department of Communications Annual Report 2014&ndash;15',
					'isNavigable' => false
				)/*,
				array (
					'title' => 'Full featured example page',
				)*/
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