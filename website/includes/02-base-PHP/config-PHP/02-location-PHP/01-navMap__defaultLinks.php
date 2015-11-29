<?php
	//set default links for all nav items based on the $navMap variable

function is_active($link, $path){
	//if 'link' has explicitly been set, return true.
	//or if the file defined by the path variable exists return true
	//else return false
	return isset($link) || file_exists($_SERVER['DOCUMENT_ROOT'].$path) ? true : false;
}

function set_link($isActive, $link, $generatedLink){
	//use the value for 'link' if provided
	//else use the generated link
	//if the link isn't active though, return as "#"
	return $isActive ? defaultTo($link, $generatedLink) : '#';
}

	foreach ($navMap as $a => &$nm) {
		$pathA = $contentRoot.$a.'.php';
		$nm['isActive'] = is_active($nm['link'], $pathA);
	    $nm['link'] = set_link($nm['isActive'], $nm['link'], $pathA);

		//Determines if the link appears in the navigation (defaults to true)
		$nm['isNavigable'] = defaultTo($nm['isNavigable'], true);

	    if (isset ($nm['subNav'])) {
	        foreach ($nm['subNav'] as $b => &$sn) {

	        	$pathB = $contentRoot.$a.'/';

				$pathB_exists = file_exists($_SERVER['DOCUMENT_ROOT'].$pathB.($b+1).'.php');
				$pathB_firstExists = file_exists($_SERVER['DOCUMENT_ROOT'].$pathB.'1.php');
	        	if ($pathB_exists) {
					//Detects if correct file exist and links to it if it does
					$pathB = $pathB.($b+1).'.php';
				} else if ($pathB_firstExists) {
					//if the correct page doesn't exist, links to the first page
					$pathB = $pathB.'1.php';
	        	} else {
					//if the first page and correct page don't exist, it links to the first page of the next level down
					$pathB = $pathB.($b+1).'/1.php';
	        	}
				//just leaves it as '#' if the next level down doesn't exist either (part of the set_link function)

				$sn['isActive'] = is_active($sn['link'], $pathB);
			    $sn['link'] = set_link($sn['isActive'], $sn['link'], $pathB);
				$sn['isNavigable'] = defaultTo($sn['isNavigable'], true);

	            if (isset ($sn['subNav'])) {
	                foreach ($sn['subNav'] as $c => &$sn2) {

			        	$pathC = $contentRoot.$a.'/'.($b+1).'/';

						$pathC_exists = file_exists($_SERVER['DOCUMENT_ROOT'].$pathC.($c+1).'.php');
						$pathC_firstExists = file_exists($_SERVER['DOCUMENT_ROOT'].$pathC.'1.php');

			        	if ($pathC_exists) {
							$pathC = $pathC.($c+1).'.php';
						} else if ($pathC_firstExists) {
							$pathC = $pathC.'1.php';
			        	} else {
			        		//checks the next level down if no files found on the current level
							$pathC = $pathC.($c+1).'/1.php';
			        	}

						$sn2['isActive'] = is_active($sn2['link'], $pathC);
					    $sn2['link'] = set_link($sn2['isActive'], $sn2['link'], $pathC);
						$sn2['isNavigable'] = defaultTo($sn2['isNavigable'], true);
	                }
	            }
	        }
	    }
	}
	$GLOBALS['navMap'] = $navMap;
?>