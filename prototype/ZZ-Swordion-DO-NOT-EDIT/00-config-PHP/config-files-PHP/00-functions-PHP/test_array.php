<?php

function test_array($test, $array){

	$testResults = [];

	foreach ($array as $i => $arrayItem) {
		if($test){
		//if the test is true, it adds a "true" to the test results array
			array_push($testResults, true);

		} else {
		//if not, it adds "false"
			array_push($testResults, false);
		};
	}
	//If the test returned false on any of the array items, the whole function returns as false, otherwise it returns as true
	return in_array(false, $testResults) ? false : true;
};

?>