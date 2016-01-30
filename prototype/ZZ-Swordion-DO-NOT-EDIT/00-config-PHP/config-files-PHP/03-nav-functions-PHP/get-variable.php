<?php

	//to help improve PHP performance, it's better to use these variables than the "get" function directly

	$GLOBALS = defaultTo($GLOBALS, [
		'getDepth' => get('depth'),
		'getCurrent' => get('current'),

		'getPrev' => get('prev'),
		'getStrictPrev' => get('prev', null, 'strict'),
		'getLazyPrev' => get('prev', null, 'lazy'),

		'getNext' => get('next'),
		'getStrictNext' => get('next', null, 'strict'),
		'getLazyNext' => get('next', null, 'lazy'),

		'getSiblings' => get('siblings'),

		'getParent' => get('parent'),
		'getNextParent' => get('nextParent'),
		'getPrevParent' => get('prevParent'),
		'getGrandParent' => get('grandParent'),

		'getURL' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
	]);

	$get = [
		'depth' => $GLOBALS['getDepth'],
		'current' => $GLOBALS['getCurrent'],

		'prev' => $GLOBALS['getPrev'],
		'strictPrev' => $GLOBALS['getStrictPrev'],
		'lazyPrev' => $GLOBALS['getLazyPrev'],

		'next' => $GLOBALS['getNext'],
		'strictNext' => $GLOBALS['getStrictNext'],
		'lazyNext' => $GLOBALS['getLazyNext'],

		'getSiblings' => $GLOBALS['getSiblings'],

		'getParent' => $GLOBALS['getParent'],
		'getNextParent' => $GLOBALS['getNextParent'],
		'getPrevParent' => $GLOBALS['getPrevParent'],
		'getGrandParent' => $GLOBALS['getGrandParent'],

		'url' => $GLOBALS['getURL'],
	];

?>