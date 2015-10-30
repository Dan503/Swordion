<?php

function heading($index){
	$location = $GLOBALS['location'];
	$getCurrent =$GLOBALS['getCurrent'];
	$text = $getCurrent['subNav'][$index - 1]['title'];
	$id = idSafe($text);

	echo '<h2 id="heading-'.$id.'">'.$text.'</h2>';
}

?>