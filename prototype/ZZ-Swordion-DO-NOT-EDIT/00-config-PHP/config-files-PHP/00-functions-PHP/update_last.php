<?php

function update_last(&$array, $value){
	if(count($array) == 1){
		$array[0] = $value;
	} else {
		array_pop($array);
		array_push($array, $value);
	}
}

?>
