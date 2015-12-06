<?php
	$GLOBALS['idSafe'] = array();

	//Removes html tags, spaces and special characters. It also adds a random number to the end
	function generateSafeID($string){
		$strippedString = strip_tags($string);
		return preg_replace("/[^A-Za-z0-9]/", "", $strippedString).'-'.rand();
	}

	function idSafe($string = 'ID'){
		$id = generateSafeID($string);
		//If the generated id has already been used, it tries again
		if (in_array($id, $GLOBALS['idSafe'])){
			idSafe($string);

		//otherwise it adds it to the list of used id's and returns with the id
		} else {
			array_push($GLOBALS['idSafe'], $id);
			return $id;
		}
	}
?>