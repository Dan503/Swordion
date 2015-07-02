<?php

	$navMap = array(
		array(
			'text' => 'Home',
			'link' => '/',
		), array(
			'text' => 'About',
			'link' => '/pages/about/',
			'subNav' => array(
				array(
					'text' => 'page 1',
				), array (
					'text' => 'Page 2',
				), array (
					'text' => 'Page 3',
				)
			)
		), array(
			'text' => 'Events',
			'subNav' => array(
				array(
					'text' => 'Current Events',
				), array(
					'text' => 'Past Events',
				)
			)
		)
	);

	$GLOBALS['navMap'] = $navMap;


?>