<?php
	//generates the current location as a string variable ("1-2-3" structure)
	$locationString = '';
	foreach($location as $i => $depth){
		if ($i == 0) {
			$locationString = $depth;
		} else {
			$depth ++;
			$locationString = $locationString.'-'.$depth;
		}
	}
	$GLOBALS['locationString'] = $locationString;
?>