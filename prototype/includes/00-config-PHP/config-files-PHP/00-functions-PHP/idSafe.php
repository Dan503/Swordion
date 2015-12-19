<?php
	$GLOBALS['idSafe'] = array();

	//Removes html tags, spaces and special characters. It also adds a random number to the end
	function generateSafeID($string, $hasNumber){
		$strippedString = strip_tags($string);
		$number = $hasNumber ? '-'.rand() : '';

		return preg_replace("/[^A-Za-z0-9]/", "", $strippedString).$number;
	}

	function idSafe($string = 'ID', $hasNumber = true){
		$id = generateSafeID($string, $hasNumber);

		if (in_array($id, $GLOBALS['idSafe'])){
		//If the generated id has already been used and numbers are enabled, it tries again
			if ($hasNumber){
				idSafe($string);
			} else {
				//if numbers aren't enabled and it detects a duplicate id, an error will be thrown 
				throw new Exception('Duplicate ID '.$string.' detected.');
			}

		//otherwise it adds it to the list of used id's and returns with the id
		} else {
			array_push($GLOBALS['idSafe'], $id);
			return $id;
		}
	}
?>