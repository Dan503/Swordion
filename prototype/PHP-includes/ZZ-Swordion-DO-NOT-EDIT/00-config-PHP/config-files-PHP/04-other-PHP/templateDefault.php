<?php

//Define a setting to look for and if it can't be found then use the provided default
//usage: $var = templateDefault('setting name to look for', 'default value');

//$settings = [array] eg. ['megaFeature', 'heading'] is similar to targeting like $get['current']['megaFeature']['heading']
//$default = anything


function templateDefault($settings, $default){

	$currentPageSetting = $GLOBALS['get']['current'];
	foreach($settings as $nextSetting) {
		$currentPageSetting = $currentPageSetting[$nextSetting];
	}

	$currentTemplateSetting = $GLOBALS['template_settings'];
	foreach($settings as $nextSetting) {
		$currentTemplateSetting = $currentTemplateSetting[$nextSetting];
	}

	//convert array links into standard links safely
	//(messes with stuff when trying to default to an array though)
	/*
	convertLink($currentPageSetting);
	convertLink($currentTemplateSetting);
	convertLink($default);
	*/

	//look for the nav map setting in the current page navMap first and use that if found
	if (isset($currentPageSetting)){
		//defaultTo enables the ability to not fully replace arrays
		return defaultTo($currentPageSetting, $default);

	//if not in the nav map, look in the template settings and use that
	} elseif (isset($currentTemplateSetting)){
		return defaultTo($currentTemplateSetting, $default);

	//if still not found, use the provided default value
	} else {
		return $default;
	}
}

?>