<?php
	//check if a string is inside another string
	function str_contains($string, $substring){
		return strpos($string, $substring) !== false;
	}
?>