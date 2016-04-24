<?php

//usage:
// $variable = defaultTo([variable that you want to have a default for] , [default value for variable], [*optional* a string determining how arrays are treated (replaced or just altered)])

	function defaultTo($var, $val){

		//get all the keys in the array
		$keys = array_keys($val);

		$varIsArray = isset($var) && is_array($val);

		//if the first array key is a string then it is assumed that the whole array uses strings indexes
		$arrayIsObject = is_string($keys[0]);

		//if the value you are setting as the default is an array AND it has sting valses for indexes
		if ($varIsArray && $arrayIsObject){

			//go through each key and completely replace it's value with the assigned value
			foreach ($keys as $key){
				$var[$key] = defaultTo($var[$key], $val[$key]);
			}

			return $var;

		} else {
			return isset($var)? $var : $val;
		}

	}
?>