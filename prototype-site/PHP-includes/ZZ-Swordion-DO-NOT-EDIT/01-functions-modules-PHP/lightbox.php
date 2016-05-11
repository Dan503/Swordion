<?php

function lightbox($file, $settings = array()) {

	$GLOBALS['inLightbox'] = true;

//group lightboxes with the same classes
	$smallForms = array(
		'login',
		'resetPassword',
	);
	$normalForms = array(
		'profile',
	);

//gets current file name
	$filename = pathinfo($file, PATHINFO_FILENAME);


	$settings = defaultTo($settings, array(
		'modifiers' => '',
		'classes' => '',
	));

//reads the settings and turns it into usable class strings
	$modifiers = modifiers('lightbox', $settings['modifiers']);
	$classes = ' '.$settings['classes'];


//Renders the lightbox
	print '
	<div class="remodal lightbox '.$modifiers.$classes.'" data-remodal-id="lightbox__'.$filename.'">
		<a href="javascript: void(0)" data-remodal-action="close" class="lightbox__close btn icon-cross"><span class="TK-visHid">Close</span></a>';

		//includes the content
		include $file;

	print '
	</div>';

}

?>