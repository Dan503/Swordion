<?php

	function update_last(&$array, $value){
		array_pop($array);
		array_push($array, $value);
	}

?>
