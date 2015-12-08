<?php

//Creates $location variable based on folder structure if $location variable does not already exist
	$fileLocationNumbers = str_replace("/pages/","",$_SERVER[REQUEST_URI]);//removes "/pages/" from string
	$fileLocationSetting = substr($fileLocationNumbers, 0, strlen($fileLocationNumbers) - 1) ;//removes trailing slash
	$location = isset($location)?$location : explode ("/", $fileLocationSetting);//saves the location as an array


//Reduces all location variable values by 1 except for the first one.
//This makes it more intuitive when setting the location by letting you start the count from 1 in the folder structure while still making it easy to target the correct item in code.
//Can sometimes cause some confusion though
	for ($i = 0; $i < count($location); $i++) {
		if ($i != 0) {//doesn't reduce the first item
			$location[$i] = $location[$i] - 1;
		}
	}

//sets $location as a global variable
$GLOBALS['location'] = $location;

?>