<?php

//function for checking if a page should have a certain thing or not on it
//$thing = string

//Defining early so it can be used in function modules

function has($thing, $default = true){
	//use query string setting 1st
	if(isset($_GET['has-'.$thing])){
		return $_GET['has-'.$thing];

	//if no query string for it, use the nav map setting
	} elseif (isset($GLOBALS['get']['current']['has'][$thing])){
		return $GLOBALS['get']['current']['has'][$thing];

	//if no nav map setting, use template setting
	} elseif (isset($GLOBALS['template_settings']['has'][$thing])){
		return $GLOBALS['template_settings']['has'][$thing];

	//if nothing else, go with the default setting
	} else {
		if ($default === 'rand' || $default === 'random') {
			//randomly decides if page should have thing or not
			return rand(0,1);
		} else {
			//user defined default
			return $default;
		}
	}
}

?>