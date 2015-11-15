<?php

//a quick an easy way to add modifier classes to elements

//usage:
//modifiers('moduleName', array('mod1', 'mod2', 'mod3'))
// >> moduleName--mod1 moduleName--mod2 moduleName--mod3

//modifiers('moduleName', 'string'); (useful for functions)
// >> moduleName--string

	function modifiers($module, $variable = '') {
		if ($variable == '') {
			return '';
		} else {

			if (is_array ($variable)) {
				$modifier = '';

				for ($i = 0; $i < count($variable); $i++) {
					$modifier = $modifier.' '.$module.'--'.$variable[$i];
				}
				return ' '.$modifier;
			} else {
				return ' '.$module.'--'.$variable;
			}

		}
	}

?>