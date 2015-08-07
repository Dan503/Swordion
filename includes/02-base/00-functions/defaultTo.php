<?php

//usage:
// $variable = defaultTo([variable that you want to have a default for] , [default value for variable], [*optional* a string determining how arrays are treated (replaced or just altered)])

	function defaultTo($var, $val, $command = 'alter'){

		//if the value you are setting as the default is an array AND is not to be completely replaced
		if (isset($var) && is_array($val) && $command != 'replace'){

			//get all the keys in the array
			$keys = array_keys($val);

			//go through each key and completely replace it's value with the assigned value
			foreach ($keys as $key){
				var_dump($var[$key]);
				var_dump($val[$key]);
				echo '<br>';
				$var[$key] = defaultTo($var[$key], $val[$key], 'replace');
			}

			return $var;


		} else {
			return isset($var)? $var : $val;
		}

	}
?>