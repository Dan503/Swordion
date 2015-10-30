<?php
	function idSafe($string){
		$strippedString = strip_tags($string);
		return preg_replace("/[^A-Za-z0-9]/", "", $strippedString);
	}
?>