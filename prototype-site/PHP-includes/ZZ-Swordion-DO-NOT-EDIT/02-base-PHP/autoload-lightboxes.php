<?php
/*******************************\
	Auto loading lightboxes!
\*******************************/

	$LB_root = $server_root.'content/lightboxes/';

	$LB = [
		'pages' => globFiles($LB_root.'0-pages/', 'objects'),
		'templates' => globFiles($LB_root.'1-templates/', 'objects'),
		'layouts' => globFiles($LB_root.'2-layouts/', 'objects'),
		'constant' => globFiles($LB_root.'3-constant/', 'objects'),
	];

	foreach ($LB as $type => $fileObjects){
		foreach ($fileObjects as $i => $file){
			$parentFolder = end($file['parentFolders']);

			switch($type){

				case 'pages' :
					if ($parentFolder === $get['current']['locationString']){
						lightbox($file['fullPath']);
					}
				break;

				case 'templates' :
					if ($parentFolder === $get['current']['template']){
						lightbox($file['fullPath']);
					}
				break;

				case 'layouts' :
					if ($parentFolder === $get['current']['layout']){
						lightbox($file['fullPath']);
					}
				break;

				case 'constant' :
						lightbox($file['fullPath']);
				break;
			}
		}
	}

?>
