<?php
/*******************************\
	Auto loading lightboxes!
\*******************************/

	$lightboxSets = defaultTo($lightboxSets, array());
	$exactLightboxes = defaultTo($exactLightboxes, array());


	$lightboxFiles_template = globFiles($swordion['lightbox--template'], 'array');
	$lightboxFiles_location = globFiles($swordion['lightbox--location'], 'array');

//automatically adds lightboxes that are specific to the current page to the lightboxSets array

	//adds the current page template to $lightboxSets
	array_push($lightboxSets, $getCurrent['template']);

	//adds $locationString to $lightboxSets
	//(expects 1-2-3 folder name for location array(1,2,3)
	array_push($lightboxSets, $locationString);

//adds all constant lightboxes to the site
//use this if the lightbox needs to appear on every page on the site unconditionally
//place content files in the "/includes/01-modules/01-modules-PHP/01-lightboxes-PHP/00-constant-lightboxes-PHP/" folder to use this
	$lightboxConstants = globFiles($swordion['lightbox--root'].'00-constant-lightboxes/', 'array');

	foreach($lightboxConstants as $file) {
	  lightbox($file);
	}

//adds all conditional lightbox sets to the site
//Use this if you want to bulk load a bunch of lightboxes onto a page but don't want them to be loaded on every page across the site and the lightbox isn't specific to a single page

	foreach($lightboxSets as $set) {
		$lightboxFiles = globFiles($swordion['lightbox--root'].$set.'/', 'array');

		foreach($lightboxFiles as $file) {
			lightbox($file);
		}
	}

//adds all exact lightboxes to the site
//use this if you want to cherry pick exact lightboxes from sets without loading the full set
//If you are using this then you are probably after a file that you have already used on a different page
//State the path to the file name starting from the "/PHP-includes/02-modules-PHP/01-lightboxes-PHP/" folder in the $exactLightboxes variable as part of an array
//eg. $exactLightboxes = array('home/video', '1-2-4/deptCommsOrgChart');
	foreach($exactLightboxes as $lightbox) {
		$lightboxFiles = glob($swordion['lightbox--root'].$lightbox.'.php', GLOB_BRACE);

		foreach($lightboxFiles as $file) {
		  lightbox($file);
		}
	}
?>
