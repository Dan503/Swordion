<?php

function digForLastLocation($prevOrNext, $location){
	$subNav = getNavMap($location, 'subnav');

	if ($prevOrNext == 'prev'){
		if(isset($subNav)){
			array_push($location, count($subNav) - 1);
			return digForLastLocation($prevOrNext, $location);
		} else {
			return $location;
		}
	} else {
		//haven't written next code yet
	}
}

?>