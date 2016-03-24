<?php

function isActive($item){
	return
	$GLOBALS['get']['current']['link'] == $item['link'] &&
	$GLOBALS['get']['current']['title'] == $item['title'];
}

?>