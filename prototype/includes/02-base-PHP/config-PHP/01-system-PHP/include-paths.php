<?php

//Commonly used include paths
	$includeRoot = $_SERVER['DOCUMENT_ROOT'].$root_location.'/includes/';

	$modulesRoot = $includeRoot.'01-modules-PHP/';

	$baseRoot = $includeRoot.'02-base-PHP/';

	$include = array(
		'root' => $includeRoot,

		'module' => $includeRoot.'01-modules-PHP/',
		'home' => $modulesRoot.'home-PHP/',
		'lightbox__root' => $modulesRoot.'01-lightboxes-PHP/',
		'lightbox' => $modulesRoot.'01-lightboxes-PHP/'.$locationString.'/',

		'base' => $baseRoot
	);

?>