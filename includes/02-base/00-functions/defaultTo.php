<?php

//usage:
// $variable = defaultTo([variable that you want to have a default for] , [default value for variable], [*optional* array of other possible settings])

	function defaultTo($var, $val, $command){


		//If no command is given, it will assume you only wish to alter the values in an array, not completlye replace the array
		//It will always completely replace strings 
		$command = isset($command) ? $command : 'alter';

		//if the value you are setting as the default is an array AND is not to be completely replaced
		if (is_array($val) && $command != 'replace'){

			//get all the keys in the array
			$keys = array_keys($val);

			//go through each key and completely replace it's value with the assigned value
			foreach ($keys as $key){
				$var[$key] = defaultTo($var[$key], $val[$key], 'replace');
			}

			return $var;


		} else {
			return isset($var)? $var : $val;
		}

	}
?>