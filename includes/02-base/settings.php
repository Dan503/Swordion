<?php

	// Start a login session
	session_start();
	$_SESSION["logged-in"] = isset($_SESSION["logged-in"]) ? $_SESSION["logged-in"]: false;
	$isLoggedIn = $_SESSION["logged-in"];


//Determine weather to load the minified production files or the un-minified development files
	//$environment = 'production';
	$environment = 'development';

//sets the php error reporting configuration for the site to be less fussy about undefined variables
	ini_set('error_reporting','E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE');

//Enable this for debugging
	//error_reporting(-1);


//required function for globFiles()
	function globLevel($globPath, $levels){
		return glob($_SERVER['DOCUMENT_ROOT'].$globPath.$levels.'*.php', GLOB_BRACE);
	}

//function for bulk loading files
	function globFiles ($path) {
		$level1 = globLevel($path, '');
		$level2 = globLevel($path, '**/');
		$level3 = globLevel($path, '**/**/');
		$level4 = globLevel($path, '**/**/**/');

		$files = array_merge($level1, $level2);
		$files = array_merge($files, $level3);
		$files = array_merge($files, $level4);

		foreach($files as $file) {
		  include $file;
		}
	}

//adds all custom PHP functions to the site (other than the "globFiles()" funtion)
	globFiles('/includes/02-base/functions/');

//Introduces the navigationMap
	include 'navMap.php';

//Commonly used include paths
	$modulePath = $_SERVER['DOCUMENT_ROOT'].'/includes/01-modules/';
	$modulePath_siteMain = $modulePath.'siteMain/';
	$modulePath_internalBody = $modulePath.'siteMain/internalBody/';


//Default sidebar settings
	$hasSidebar = defaultTo($hasSidebar, true);
	$sidebarHas = defaultTo($sidebarHas, array(
		'nav' => true,
		'airHistory' => true,
		'related' => true,
		'pathFinder' => true,
	));

?>