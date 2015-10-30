<?php

//Helps with DoC code integration
$root_location = '/2015';
$GLOBALS['root_location'] = $root_location;

//Defines the root directory for where all the site content pages are held
$contentRoot = $root_location.'/pages/';
$GLOBALS['contentRoot'] = $contentRoot;

//Determine weather to load the minified production files or the un-minified development files
	//use this to minify the JS http://fmarcia.info/jsmin/test.html
	//scrollMagic breaks using grunt JS minification
	$environment = 'production';
	//$environment = 'development';
	$GLOBALS['environment'] = $environment;

//sets the php error reporting configuration for the site to be less fussy about undefined variables
//Essential for the "defaultTo()" function
	ini_set('error_reporting','E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE');

//Uncomment this for debugging PHP
	//error_reporting(-1);

//required function for globFiles()
	function globArray($globPath, $levels = '', $fileType = '*.php'){

		$rootPath = $_SERVER['DOCUMENT_ROOT'].$GLOBALS['root_location'];

		$computedRootPath = strpos($globPath,$rootPath) !== false ? '' : $rootPath;
		return glob($computedRootPath.$globPath.$levels.$fileType, GLOB_BRACE);
	}

//function for bulk loading files
	function globFiles ($path, $returnAs = 'include', $fileType = '*.php') {

		$allLevels = array(
			globArray($path, '', $fileType),
			globArray($path, '**/', $fileType),
			globArray($path, '**/**/', $fileType),
			globArray($path, '**/**/**/', $fileType),
		);

		$files = array();

		foreach($allLevels as $level){
			if ($level != false) {
				$files = array_merge($files, $level);
			}
		}

		switch($returnAs) {
			case 'include' :
				foreach($files as $file) {
				  include $file;
				}
			break;

			case 'array' :
				return $files;
			break;

			case 'objects' :
				$fileObjects = array();

				foreach($files as $file) {

					$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', pathinfo($file)['dirname']);

					$baseName = basename($file);

					$fileObject = array(
						'fileName' => pathinfo($file)['filename'],//excludes extension
						'extension' => pathinfo($file)['extension'],
						'baseName' => $baseName,//includes extension
						'fullPath' => $file, //includes site domain name as well (good for php includes)
						'path' => $path.'/'.$baseName, //path from the root directory (good for img src)
						'partialPath' => $path.'/',//path without file at the end
					);
					array_push($fileObjects, $fileObject);
				}

				return $fileObjects;
			break;
		}
	}

//adds all PHP utility functions to the site (other than the "globFiles()" function)
	globFiles('/includes/02-base-PHP/00-functions-base-PHP/');


//Introduces the Navigation Map
	include 'navMap.php';

//set default links to all nav items
	foreach ($navMap as $a => &$nm) {
	    $nm['link'] = defaultTo($nm['link'], $contentRoot.$a.'.php');
		$nm['isNavigable'] = defaultTo($nm['isNavigable'], true);

	    if (isset ($nm['subNav'])) {
	        foreach ($nm['subNav'] as $b => &$sn) {
	        	$pathB = $contentRoot.$a.'/'.($b+1);
	        	if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathB.'/1.php')) {
		            $sn['link'] = defaultTo($sn['link'],$pathB.'/1.php');
	        	} else {
		            $sn['link'] = defaultTo($sn['link'],$pathB.'.php');
	        	}
				$sn['isNavigable'] = defaultTo($sn['isNavigable'], true);

	            if (isset ($sn['subNav'])) {
	                foreach ($sn['subNav'] as $c => &$sn2) {
	                    $sn2['link'] = defaultTo($sn2['link'],$contentRoot.$a.'/'.($b+1).'/'.($c+1).'.php');
						$sn2['isNavigable'] = defaultTo($sn2['isNavigable'], true);
	                }
	            }
	        }
	    }
	}
	$GLOBALS['navMap'] = $navMap;

//Creates $location variable based on folder structure if not already set
	$fileLocationSetting = str_replace(".php","",str_replace("/2015/pages/","",$_SERVER[REQUEST_URI]));
	$location = isset($location)?$location : explode ("/", $fileLocationSetting);


//Makes it more intuitive when setting the location by letting you start the count from 1 while still making it easy to target the correct item in code.
	for ($i = 0; $i < count($location); $i++) {
		if ($i != 0) {//doesn't reduce the first item
			$location[$i] = $location[$i] - 1;
		}
	}

	//generates the current location as a string variable ("1-2-3" structure)
	$locationString = '';
	foreach($location as $i => $depth){
		if ($i == 0) {
			$locationString = $depth;
		} else {
			$depth ++;
			$locationString = $locationString.'-'.$depth;
		}
	}
	$GLOBALS['locationString'] = $locationString;

//sets $location as a global variable
	$GLOBALS['location'] = $location;

//check if it is the home page
	$isHome =
		(is_array($location)) &&
		($location[0] == 0) &&
		(count($location) == 1) ?
			true : false;

	$GLOBALS['isHome'] = $isHome;

	$isLanding =
		(is_array($location)) &&
		($location[0] != 0) &&
		(count($location) == 1) ?
			true : false;
	$GLOBALS['isLanding'] = $isLanding;

	$isSearchResults = $location == array(0,3)? true : false;

	$isMiscellaneous = $location[0] == 0 && count($location) > 1;

	$isInternal_shallow = count($location) == 2 && $location[0] != 6;
	$isInternal_deep = count($location) == 3 || $location[0] == 6 && count($location) == 2;

	$isInternal =
		//!$isMiscellaneous &&
		($isInternal_shallow) ||
		//!$isMiscellaneous &&
		($isInternal_deep)
		 ?
			true : false;

	$GLOBALS['isInternal'] = $isInternal;
	$GLOBALS['isInternal_deep'] = $isInternal_deep;
	$GLOBALS['isInternal_shallow'] = $isInternal_shallow;

	$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$GLOBALS['currentURL'] = $currentURL;




//sets the current page navMap array item to a $getCurrent variable
//you can then use it like this $getCurrent['title'] to get the current title text as a span
//also contains code that sets other "get" related to the current item
	setGetCurrent();
	$getPrev = $GLOBALS['getPrev'];
	$getStrictPrev = $GLOBALS['getStrictPrev'];//will not go to previous parent if no previous siblings exist
	$getCurrent = $GLOBALS['getCurrent'];
	$getNext = $GLOBALS['getNext'];
	$getStrictNext = $GLOBALS['getStrictNext'];//will not go to next parent if no next siblings exist
	$getSiblings = $GLOBALS['getSiblings'];
	$getParent = $GLOBALS['getParent'];
	$getNextParent = $GLOBALS['getNextParent'];
	$getPrevParent = $GLOBALS['getPrevParent'];
	$getGrandParent = $GLOBALS['getGrandParent'];
	$getNextGrandParent = $GLOBALS['getNextGrandParent'];
	$getPrevGrandParent = $GLOBALS['getPrevGrandParent'];

//Similar to getCurrent except it is locked at the section level
	$getCurrentSection = $location[0] == 6?
		$getParent : $navMap
						[$location[0]]
						['subNav']
						[$location[1]];
	$GLOBALS['getCurrentSection'] = $getCurrentSection;

	//lightbox variables
	$GLOBALS['inLightbox'] = false;

//Commonly used include paths
	$includes = $_SERVER['DOCUMENT_ROOT'].$root_location.'/includes/';
	$modules = $includes.'01-modules-PHP/';
	$modules_headerTools = $modules.'headerTools-PHP/';
	$modules_siteFooter = $modules.'siteFooter-PHP/';
	$modules_home = $modules.'home-PHP/';
	$modules_lightbox_root = $modules.'01-lightboxes-PHP/';
	$modules_lightbox = $modules_lightbox_root.$locationString.'/';

	$pageTitle = defaultTo($pageTitle, $getCurrent['title']);


	$GLOBALS['skipTarget'] = 1;

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


//loads the functions that generate modules
	globFiles('/includes/01-modules-PHP/00-functions-modules-PHP/');

?>