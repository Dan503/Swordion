<?php

	$navMap = array(
		array(
			'title' => 'Home',
			'link' => '/',
			'subNav' => array(
				//This is essentially the "miscellaneous" list holding pages that don't really belong to the Information Architecture.
				array(
					'title' => 'Site Map',
				), array (
					'title' => 'Search Results',
				)
			)
		), array(
			'title' => 'About',
			'link' => '/pages/about/',
			'subNav' => array(
				array(
					'title' => 'page 1',
				), array (
					'title' => 'Page 2',
				), array (
					'title' => 'Page 3',
				)
			)
		), array(
			'title' => 'Lightbox test',
			'link' => '#lightbox-test-constant',
			'subNav' => array(
				array(
					'title' => 'Current Events',
				), array(
					'title' => 'Past Events',
				)
			)
		)
	);

	$GLOBALS['navMap'] = $navMap;


?>