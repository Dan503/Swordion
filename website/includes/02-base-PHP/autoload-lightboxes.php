<?php
/*******************************\
	Auto loading lightboxes!
\*******************************/

	$lightboxSets = defaultTo($lightboxSets, array());
	$exactLightboxes = defaultTo($exactLightboxes, array());

	//automatically adds lightboxes that are specific to the current page to the lightboxSets array
	//(expects 1-2-3 folder for location array(1,2,3)
	//$locationString found in config file
	array_push($lightboxSets,$locationString);

//adds all constant lightboxes to the site
//use this if the lightbox needs to appear on every page on the site unconditionally
//place content files in the "/includes/01-modules/01-modules-PHP/01-lightboxes-PHP/00-constant-lightboxes-PHP/" folder to use this
	$lightboxConstants = globFiles('/includes/01-modules-PHP/01-lightboxes-PHP/00-constant-lightboxes-PHP/', 'array');

	foreach($lightboxConstants as $file) {
	  lightbox($file);
	}

//adds all conditional lightbox sets to the site
//Use this if you want to bulk load a bunch of lightboxes onto a page but don't want them to be loaded on every page across the site and the lightbox isn't specific to a single page
//place files in a new folder under "/includes/01-modules/01-lightboxes/conditional/" folder to use this.
//Then state the folder name in the $lightboxSets variable as part of an array

	foreach($lightboxSets as $set) {
		$lightboxFiles = globFiles('/includes/01-modules-PHP/01-lightboxes-PHP/'.$set.'/', 'array');

		foreach($lightboxFiles as $file) {
			lightbox($file);
		}
	}

//adds all exact lightboxes to the site
//use this if you want to cherry pick exact lightboxes from sets without loading the full set
//If you are using this then you are probably after a file that you have already used on a different page
//State the path to the file name starting from the "/includes/01-modules-PHP/01-lightboxes-PHP/" folder in the $exactLightboxes variable as part of an array
	foreach($exactLightboxes as $lightbox) {
		$lightboxFiles = glob($_SERVER['DOCUMENT_ROOT'].$GLOBALS['rootLocation'].'/includes/01-modules-PHP/01-lightboxes-PHP/'.$lightbox.'.php', GLOB_BRACE);

		foreach($lightboxFiles as $file) {
		  lightbox($file);
		}
	}
?>
