<?php

function hasLinkGen($linkGenType, $prevNext = 'next'){
	switch ($linkGenType){
		case 'override-siblings':
			foreach (get('siblings') as $i => $sibling){
				if (isset($sibling['linkGen']) && $sibling['linkGen'] == 'override-siblings'){
					return true;
				}
			}
			return false;
		break;

		case 'first-child':
			$linkGen = get($prevNext,'linkGen');
			return $linkGen == 'first-child';
		break;
	}
}

?>
