<?php

function svg($fileName) {
	//generates the svg html
	echo '<!--[if gt IE 8]><!-->';

		include $_SERVER['DOCUMENT_ROOT'].$GLOBALS['rootLocation'].'/includes/svgs/'.$fileName.'.php';

	echo '<!--<![endif]-->';
}

?>