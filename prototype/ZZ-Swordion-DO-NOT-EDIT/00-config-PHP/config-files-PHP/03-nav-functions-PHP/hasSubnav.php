<?php
function hasSubnav($navItem_or_location){
	//subNavigable is applied to all items by default so that's how it can tell if it is a nav item or a location array
	if(isset($navItem_or_location['subNavigable'])){
		$item = $navItem_or_location;
	} else {
		$item = getNavMap($navItem_or_location);
	}
	return $item['subNavigable'] && isset($item['subnav']);
}
?>