<?php
	$loadIn = array(
		'all' => array (
			'before' => '',
			'after' => '',
		),
		'modern' => array(
			'before' => '<!--[if gt IE 9]><!-->',
			'after' => '<!--<![endif]-->',
		),
		'legacy' => array(
			'before' => '<!--[if lt IE 10]>',
			'after' => '<![endif]-->',
		),
		'ie8' => array(
			'before' => '<!--[if lt IE 9]>',
			'after' => '<![endif]-->',
		),
		'ie9' => array(
			'before' => '<!--[if IE 9]>',
			'after' => '<![endif]-->',
		)
	);
?>