<?php

function isActive($item){
	return
	$GLOBALS['getCurrent']['link'] == $item['link'] &&
	$GLOBALS['getCurrent']['title'] == $item['title'];
}

?>