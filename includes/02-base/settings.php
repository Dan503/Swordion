<?php

// Enables use of PHP sessions
	session_start();
	$_SESSION["logged-in"] = isset($_SESSION["logged-in"]) ? $_SESSION["logged-in"]: false; //default session is logged out
	$isLoggedIn = $_SESSION["logged-in"];
	$GLOBALS['isLoggedIn'] = $isLoggedIn;


//Determine weather to load the minified production files or the un-minified development files
	//$environment = 'production';
	$environment = 'development';
	$GLOBALS['environment'] = $environment;

//sets the php error reporting configuration for the site to be less fussy about undefined variables
//Essential for the "defaultTo()" function
	ini_set('error_reporting','E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE');

//Uncomment this for debugging PHP
	//error_reporting(-1);


//required function for globFiles()
	function globLevel($globPath, $levels){
		return glob($_SERVER['DOCUMENT_ROOT'].$globPath.$levels.'*.php', GLOB_BRACE);
	}

//function for bulk loading files
	function globFiles ($path) {

		$allLevels = array(
			globLevel($path, ''),
			globLevel($path, '**/'),
			globLevel($path, '**/**/'),
			globLevel($path, '**/**/**/'),
		);

		$files = array();

		foreach($allLevels as $level){
			if ($level != false) {
				$files = array_merge($files, $level);
			}
		}

		foreach($files as $file) {
		  include $file;
		}
	}

//adds all custom PHP functions to the site (other than the "globFiles()" funtion)
	globFiles('/includes/02-base/00-functions/');
	globFiles('/includes/01-modules/00-functions/');

//Introduces the navigationMap
	include 'navMap.php';

//Commonly used include paths
	$includes = $_SERVER['DOCUMENT_ROOT'].'/includes/';
	$modules = $_SERVER['DOCUMENT_ROOT'].'/includes/01-modules/';
	$modules_siteMain = $modules.'siteMain/';
	$modules_internal = $modules.'siteMain/internal/';


//Default sidebar settings
	$hasSidebar = defaultTo($hasSidebar, true);
	$sidebarHas = defaultTo($sidebarHas, array(
		'nav' => true,
		'related' => true,
	));

//check if it is the home page
	$GLOBALS['location'] = $location;
	$isHome = $location[0] == 0 ? true : false;
	$GLOBALS['isHome'] = $isHome;

	getTitle();
	$pageTitle = $GLOBALS['pageTitle'];

	$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


	if ($isLoggedIn) {
		$constantLightboxes = array(
			'logged-in',
		);
	} else {
		$constantLightboxes = array(
			'logged-out',
		);
	}

?>