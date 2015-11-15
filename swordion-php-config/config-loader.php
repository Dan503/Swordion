<?php

	//allows you to hold the site inside a sub-directory
	$rootLocation = '';
	$GLOBALS['rootLocation'] = $rootLocation;

	//Defines the root directory for where all the site content pages are held
	$contentRoot = $rootLocation.'/pages/';
	$GLOBALS['contentRoot'] = $contentRoot;


//required function for globFiles()
	function globArray($globPath, $levels = '', $fileType = '*.php'){

		$rootPath = $_SERVER['DOCUMENT_ROOT'].$GLOBALS['rootLocation'];

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



	//Couldn't do a basic globFiles() command because I'd have to move variables to the global scope
	$configFiles = globFiles('/swordion-php-config/config-PHP/', 'array');
	foreach ($configFiles as $configItem){
	    include $configItem;
	}

//loads the functions that generate modules
	//globFiles('/includes/01-modules-PHP/00-functions-modules-PHP/');

?>