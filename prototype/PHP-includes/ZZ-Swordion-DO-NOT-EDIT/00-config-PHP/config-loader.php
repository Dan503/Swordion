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

		if (strpos($path,'.php') !== false) {

			return array($_SERVER['DOCUMENT_ROOT'].$GLOBALS['rootLocation'].$path);

		} else {

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
							'fullName' => $baseName,//includes extension
							'fullPath' => $file, //includes site domain name as well (good for php includes)
							'filePath' => $path.'/'.$baseName, //path from the root directory (good for img src)
							'folderPath' => $path.'/',//path without file at the end
						);
						array_push($fileObjects, $fileObject);
					}

					return $fileObjects;
				break;
			}
		}
	}

//defines the order in which globFiles is applied to folders
	$loadOrder = [
		'/01-error-reporting.php',

		'/ZZ-Swordion-DO-NOT-EDIT/00-config-PHP/config-files-PHP/00-functions-PHP/',

		'/00-config-PHP/early',//late is loaded in template.php under swordion base files

		'/ZZ-Swordion-DO-NOT-EDIT/00-config-PHP/config-files-PHP/02-nav-functions-PHP/',

		'/ZZ-Swordion-DO-NOT-EDIT/00-config-PHP/config-files-PHP/03-nav-config-PHP/',

		'/ZZ-Swordion-DO-NOT-EDIT/00-config-PHP/config-files-PHP/04-other-PHP/',

		'/ZZ-Swordion-DO-NOT-EDIT/01-functions-modules-PHP/',

		'/02-modules-PHP/00-function-modules-PHP/',
	];

	foreach ($loadOrder as $path){
		$configFiles = globFiles('/PHP-includes'.$path, 'array');

		//var_dump($configFiles);
		//echo '<br><br>';

		//Couldn't do a basic globFiles() command because I'd have to move variables to the global scope
		foreach ($configFiles as $configItem){
		    include $configItem;
		}
	}

?>