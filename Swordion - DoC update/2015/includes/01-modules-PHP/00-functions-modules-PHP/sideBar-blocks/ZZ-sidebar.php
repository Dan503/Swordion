<?php

function sideBar($array){

	$hasNav = false;
	$navType = false;

	foreach($array as $block){
		if ($block['blockType'] == 'nav'){
			$hasNav = true;
			$navType = $block['navType'];
		}
	}

	$GLOBALS['hasSideNav'] = defaultTo($GLOBALS['hasSideNav'], $hasNav);


	if ($navType == 'fixed') {
		$moduleAttrubutes = ' data-jshook="stickySideNav__container"';
		$sideBarClases = 'stickySideNav__container';
	} else {
		$moduleAttrubutes = '';
		$sideBarClases = 'grid__cell';
	}

	echo '
	<aside class="sideBar '.$sideBarClases.'"'.$moduleAttrubutes.'>';
		if ($navType != 'fixed') {
			echo '
			<div class="grid grid--cols-1 grid--enableWrapping grid--gutter-blocks grid--hasInners">';
		}

		foreach($array as $block){
			switch ($block['blockType']){
				case 'nav':
					$navType = $block['navType'];

					if ($navType != 'fixed') {
						echo '
						<div class="sideBar__cell grid__cell TK-'.$navType.'">';
					}
						sideNav($navType);
					if ($navType != 'fixed') {
						echo '
						</div>';
					}
					//
				break;

				case 'twitter':
					echo '
					<div class="sideBar__cell grid__cell">';
						tweet($block['text']);
					echo '
					</div>';
				break;

				case 'moreInfo':
					echo '
					<div class="sideBar__cell grid__cell">';
						moreInfoBox($block);
					echo '
					</div>';
				break;

				case 'highlight':
					echo '
					<div class="sideBar__cell grid__cell">';
						/*<div class="sideInfographic"></div>*/

						iconHighlight($block);

					echo '
					</div>';
				break;
			}
		}


		if ($navType != 'fixed') {
			echo '</div>';
		}

	echo '
	</aside>';
}

?>