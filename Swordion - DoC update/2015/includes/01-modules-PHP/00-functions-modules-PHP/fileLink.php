<?php

function fileLink($linkText, $file, $classes = ''){
	if (substr( $file, 0, 1 ) === "/"){
		$fullPath = $_SERVER['DOCUMENT_ROOT'].$file;
	}

	$fileType = strtoupper(pathinfo($fullPath, PATHINFO_EXTENSION));
	$fileSize = humanFileSize($fullPath);
	$fileText = '('.$fileType.' '.$fileSize.')';
	return '<a href="'.$file.'" class="'.$classes.'">'.$linkText.' <strong>'.$fileText.'</strong></a>';
}

?>