<?php

function fileLink($linkText, $file, $settings = []){

	$settings = defaultTo($settings, [
		'classes' => [],
		'hooks' => null,
	]);

	$classes = defaultTo($settings['classes'], [
		'main' => '',
		'text' => '',
		'size' => '',
	]);

	if (substr( $file, 0, 1 ) === "/"){
		$fullPath = $_SERVER['DOCUMENT_ROOT'].$file;
	}

	$fileType = strtoupper(pathinfo($fullPath, PATHINFO_EXTENSION));
	$fileSize = humanFileSize($fullPath);
	$fileText = $fileType.' '.$fileSize;

	$hookHTML = isset($settings['hooks']) ? ' data-jshook="'.$settings['hooks'].'"' : '';

	//if you provide the classes as a string, they will be applied to the <a> tag.
	if (is_string($classes)) {
		$classes = ['main' => $classes];
	}

	return '
	<a href="'.$file.'" class="fileLink '.$classes['main'].'"'.$hookHTML.'>
		<span class="fileLink__text '.$classes['text'].'">'.$linkText.'</span>
		<span class="fileLink__size '.$classes['size'].'">('.$fileText.')</span>
	</a>';
}

?>