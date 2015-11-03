<?php

//Creates $location variable based on folder structure if $location variable does not already exist
	$fileLocationSetting = str_replace(".php","",str_replace("/pages/","",$_SERVER[REQUEST_URI]));
	$location = isset($location)?$location : explode ("/", $fileLocationSetting);


//Reduces all location variable values by 1 except for the first one.
//This makes it more intuitive when setting the location by letting you start the count from 1 in the folder structure while still making it easy to target the correct item in code.
	for ($i = 0; $i < count($location); $i++) {
		if ($i != 0) {//doesn't reduce the first item
			$location[$i] = $location[$i] - 1;
		}
	}

//sets $location as a global variable
$GLOBALS['location'] = $location;

?>