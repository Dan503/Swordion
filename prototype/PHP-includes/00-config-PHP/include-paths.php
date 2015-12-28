<?php

//Do not alter this file other than adding to the array if needed

//Commonly used include paths
	$root = $_SERVER['DOCUMENT_ROOT'].$root_location.'/';

	$main_root = $root.'PHP-includes/';

//holds the paths for user editable modules
	$include = array(
		'root' => $main_root,

		'base' => $main_root.'01-base-PHP/',

		'module' => $main_root.'02-modules-PHP/',
	);

	$head = $include['base'].'head.php';

?>