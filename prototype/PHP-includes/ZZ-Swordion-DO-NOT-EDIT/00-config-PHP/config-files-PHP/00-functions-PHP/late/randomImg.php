<?php

foreach($GLOBALS['supportedImgFormats'] as $ext){
	$GLOBALS['contentImages'][$ext] = globFiles('/assets/images/content','objects','*.'.$ext);
}

//returns with a random image from the /assets/images/content folder
//avoid providing absolute paths (starting the string with a "/") as it will hinder PHP performance
function randomImg($path = '', $fileTypes = null) {
	$fileTypes = defaultTo($fileTypes, $GLOBALS['supportedImgFormats']);
	$img_array = [];

//need to filter down the images to those that match the correct path into this variable
	$finalImages = [];

	$standardBasePath = '/assets/images/content/';
	$pathStartsWithRoot = $path[0] === '/';
	$isStandardPath = substr($path,23) === $standardBasePath || !$pathStartsWithRoot;


	//if $path starts with "/" create a new set of files to search through
	if ($pathStartsWithRoot && !$isStandardPath){
		$imgFiles = [];
		foreach($fileTypes as $ext){
			$imgFiles[$ext] = globFiles($path,'objects','*.'.$ext);
		}
	//else assume the images are in the content folder
	} else {
		$imgFiles = $GLOBALS['contentImages'];
		$path = $pathStartsWithRoot ? $path : $standardBasePath.$path;
	}

	//adds only the images with the correct file types to the list of images that need searching
	foreach($fileTypes as $ext){
		$img_array = array_merge($img_array, $imgFiles[$ext]);
	}

	//filters the list of images down to only the images in the correct folder (or deeper)
	foreach($img_array as $img) {
		$inCorrectFolder = substr($img['filePath'], 0, strlen($path)) === $path;
		$fileExists = file_exists($img['fullPath']);//function sometimes fails without this
		if ($inCorrectFolder && $fileExists){
			array_push($finalImages, $img);
		}
	}

	$imgObject = $finalImages[rand(0, count($finalImages))];

	//it was still failing :( had to check again before output
	return file_exists($imgObject['fullPath']) ? $imgObject['filePath'] : randomImg($path, $fileTypes);
}

?>