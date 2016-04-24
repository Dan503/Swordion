<?php

//Define a setting to look for and if it can't be found then use the provided default
//usage: $var = templateDefault('setting name to look for', 'default value');

//$settings = [array] eg. ['megaFeature', 'heading'] is similar to targeting like $get['current']['megaFeature']['heading']
//$default = anything


function templateDefault($settings, $default){

	//looks through layout settings first, then in the template settings then in the navMap item,
	//each one able to overwrite the last
	$order = ['layout', 'template', 'navMap'];

	$settingTypes = [
		$order[0] => $GLOBALS['layout_settings'],
		$order[1] => $GLOBALS['template_settings'],
		$order[2] => $GLOBALS['get']['current'],
	];

	$returnValue = $default;

	foreach ($order as $i => $settingType) {
		$setting = $settingTypes[$settingType];

		//turns array from [1,2,3] to $var[1][2][3]
		foreach($settings as $nextSetting) {
			$setting = $setting[$nextSetting];
		}

		//If settings are found, apply those settings
		if (isset($setting)){
			//defaultTo enables the ability to not fully replace arrays allowing you to set only the settings you need to set
			$returnValue = defaultTo($setting, $default);
		}

		//Ensures that settings are retained through the cascade
		$default = $returnValue;
	}

	return $returnValue;
}

?>