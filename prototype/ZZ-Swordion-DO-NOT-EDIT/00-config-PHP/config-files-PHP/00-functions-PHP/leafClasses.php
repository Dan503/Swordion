<?php

function leafClasses($items_array, $i, $classes = ''){
	$classes = $classes.' leaf';
	if($i == 0){ $classes = $classes.' first'; }
	if($i == count($items_array) - 1){ $classes = $classes.' last'; }

	return $classes;
}

?>