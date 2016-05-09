<?php

//Do not alter this file other than adding to it if needed

//Commonly used include paths
	$server_root = $_SERVER['DOCUMENT_ROOT'].'/';

	$root = $server_root.'PHP-includes/';

	$base = $root.'01-base-PHP/';
	$GLOBALS['base'] = $base;

	$module = $root.'02-modules-PHP/';
	$GLOBALS['module'] = $module;

//holds the paths for user editable modules

	$head = $base.'head.php';

?>