<?php
	//set default links for all nav items based on the $navMap variable

function is_active($isActive, $link){
	//if 'link' has explicitly been set, return true.
	//else return 'isActive' value if it has been defined
	//else return false
	return isset($link) ? true : defaultTo($isActive, false);
}

function set_link($isActive, $link, $generatedLink){
	//If link is active, use 'link' value else generate the link for us
	//(defaults to "#" if link not active)
	return $isActive ? defaultTo($link, $generatedLink) : '#';
}

	foreach ($navMap as $a => &$nm) {
		$nm['isActive'] = is_active($nm['isActive'], $nm['link']);
	    $nm['link'] = set_link($nm['isActive'], $nm['link'], $contentRoot.$a.'.php');

		//Determines if the link appears in the navigation (defaults to true)
		$nm['isNavigable'] = defaultTo($nm['isNavigable'], true);

	    if (isset ($nm['subNav'])) {
	        foreach ($nm['subNav'] as $b => &$sn) {

	        	$pathB = $contentRoot.$a.'/'.($b+1);
	        	if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathB.'/1.php')) {
					$sn['isActive'] = is_active($sn['isActive'], $sn['link']);
				    $sn['link'] = set_link($sn['isActive'], $sn['link'], $pathB.'/1.php');
	        	} else {
					$sn['isActive'] = is_active($sn['isActive'], $sn['link']);
				    $sn['link'] = set_link($sn['isActive'], $sn['link'], $pathB.'.php');
	        	}
				$sn['isNavigable'] = defaultTo($sn['isNavigable'], true);

	            if (isset ($sn['subNav'])) {
	                foreach ($sn['subNav'] as $c => &$sn2) {
						$sn2['isActive'] = is_active($sn2['isActive'], $sn2['link']);
					    $sn2['link'] = set_link($sn2['isActive'], $sn2['link'], $contentRoot.$a.'/'.($b+1).'/'.($c+1).'.php');						$sn2['isNavigable'] = defaultTo($sn2['isNavigable'], true);
	                }
	            }
	        }
	    }
	}
	$GLOBALS['navMap'] = $navMap;
?>