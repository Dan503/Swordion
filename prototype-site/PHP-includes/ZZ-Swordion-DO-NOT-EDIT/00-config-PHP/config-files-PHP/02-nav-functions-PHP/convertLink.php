<?php
//Safely converts link arrays into solid links
function convertLink (&$link){
	$return = getNavMap($link,'link');
	if (isset($return)){
		$link = $return;
	}
}
?>