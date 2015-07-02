<?php

	function modifier($variable, $module) {
		if ($variable == '') {
			return '';
		} else if (isset($variable)) {

			if (is_array ($variable)) {
				$modifier = '';

				for ($i = 0; $i < count($variable); $i++) {
					$modifier = $modifier.' '.$module.'--'.$variable[$i];
				}
				return $modifier;
			} else {
				return ' '.$module.'--'.$variable;
			}

		} else {
			return '';
		}
	}

?>