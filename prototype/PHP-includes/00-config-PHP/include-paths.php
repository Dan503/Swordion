<?php

//Commonly used include paths
	$includeRoot = $_SERVER['DOCUMENT_ROOT'].$root_location.'/includes/';

	$baseRoot = $includeRoot.'01-base-PHP/';

	$modulesRoot = $includeRoot.'02-modules-PHP/';

	$include = array(
		'root' => $includeRoot,

		'base' => $baseRoot,

		'module' => $includeRoot.'02-modules-PHP/',

		'template' => $includeRoot.'03-templates-PHP/',

		'lightbox__root' => $modulesRoot.'01-lightboxes-PHP/',
		'lightbox' => $modulesRoot.'01-lightboxes-PHP/'.$locationString.'/',
	);

	$head = $include['base'].'01-head.php';

?>