<?php
function hasSubnav($navItem_or_location){

	if (!is_array($navItem_or_location)){
        trigger_error('');
		echo ('"'.$navItem_or_location.'" must be either a navMap item or a getNavMap friendly array (array of titles, indexes or both). It is currently:');
        var_dump($navItem_or_location);
		echo ('<br>enable errors to learn more');
	}

	//subNavigable is applied to all items by default so that's how it can tell if it is a nav item or a location array
	if(isset($navItem_or_location['subNavigable'])){
		$item = $navItem_or_location;
	} else {
		$item = getNavMap($navItem_or_location);
	}
	return $item['subNavigable'] && isset($item['subnav']);
}
?>