<?php

//function for checking if an array contains a string or not (good for checking if an array is a navMap search array)
function array_has_string($array){
	return count(array_filter($array, 'is_string')) ? true : false;
}

?>