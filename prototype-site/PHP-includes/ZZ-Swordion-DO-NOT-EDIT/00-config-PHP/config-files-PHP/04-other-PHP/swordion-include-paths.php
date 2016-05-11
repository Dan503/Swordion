<?php

	$swordion_root = $server_root.'PHP-includes/ZZ-Swordion-DO-NOT-EDIT/';

//holds the paths for swordion system files that should not be edited
	$swordion = array(
		'root' => $swordion_root,
		'base' => $swordion_root.'02-base-PHP/',
		'layout' => $root.'03-layouts-PHP/',
		'template' => $root.'04-templates-PHP/',
	);

	$GLOBALS['swordion'] = $swordion;

?>