<?php

function svg($fileName) {
	//generates the svg html
	echo '<!--[if gt IE 8]><!-->';

		include $_SERVER['DOCUMENT_ROOT'].$GLOBALS['root_location'].'/includes/svgs/'.$fileName.'.php';

	echo '<!--<![endif]-->';
}

?>