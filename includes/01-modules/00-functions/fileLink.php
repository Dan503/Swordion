<?php

function fileLink($linkText, $file, $classes = ''){
	if (substr( $file, 0, 1 ) === "/"){
		$file = $_SERVER['DOCUMENT_ROOT'].$file;
	}

	$fileType = strtoupper(pathinfo($file, PATHINFO_EXTENSION));
	$fileSize = humanFileSize($file);
	$fileText = '('.$fileType.' '.$fileSize.')';
	return '<a href="'.$file.'" class="'.$classes.'">'.$linkText.' <strong>'.$fileText.'</strong></a>';
}

?>