<?php
	//http://jeffreysambells.com/2012/10/25/human-readable-filesize-php
	function human_filesize_calculation($bytes, $decimals = 2) {
	    $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
	    $factor = floor((strlen($bytes) - 1) / 3);
	    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
	}

	function humanFileSize($file, $decimals = 2){
		human_filesize_calculation(filesize($file), $decimals);
	}
?>