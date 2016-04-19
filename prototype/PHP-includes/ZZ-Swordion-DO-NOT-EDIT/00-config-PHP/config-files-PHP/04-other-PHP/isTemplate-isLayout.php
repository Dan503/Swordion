<?php

/*
function to quickly check if piece can be used in current template

usage:
if (isTemplate(['list','of','allowed','templates'])){
	echo 'conditional content goes here';
}
*/

function isTemplate($templateList){
	$return = false;
	foreach($templateList as $template){
		if ($GLOBALS['get']['current']['template'] === $template){
			$return = true;
		}
	}
	return $return;
}

//same thing but for layouts
function isLayout($layoutList){
	$return = false;
	foreach($layoutList as $layout){
		if ($GLOBALS['get']['current']['layout'] === $layout){
			$return = true;
		}
	}
	return $return;
}

?>