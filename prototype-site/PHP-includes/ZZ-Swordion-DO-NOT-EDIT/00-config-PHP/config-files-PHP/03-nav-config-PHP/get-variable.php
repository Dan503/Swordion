<?php

	//to help improve PHP performance, it's better to use these variables than the "get" function directly

	$get = [
		'depth' => get('depth'),

		//allows custom 'current' attributes to be saved outside of the nav map
		'current' => defaultTo($get['current'], get('current')),

		'prev' => get('prev'),
		'strictPrev' => get('prev', null, 'strict'),
		'lazyPrev' => get('prev', null, 'lazy'),

		'next' => get('next'),
		'strictNext' => get('next', null, 'strict'),
		'lazyNext' => get('next', null, 'lazy'),

		'siblings' => get('siblings'),

		'parent' => get('parent'),
		'nextParent' => get('nextParent'),
		'prevParent' => get('prevParent'),
		'grandParent' => get('grandParent'),

		'url' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
	];

	$GLOBALS['get'] = $get;

?>