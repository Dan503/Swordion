<?php

function mainContentPiece($position, $modifier = false) {

	$location = $GLOBALS['location'];

	switch ($position){
		case 'top':
			if (
				$GLOBALS['isInternal_deep'] && $location[0] == 6 && $location[1] != 0 ||
				$GLOBALS['isInternal_deep'] && $location[0] != 6 && $location[2] != 0 ||
				$modifier != false
			) {
				if ($modifier == 'continued') {
					$GLOBALS['skipTarget'] = $GLOBALS['skipTarget'] + 1;
				}
				skipTarget($GLOBALS['skipTarget']);
			}
			echo '
			<div class="mainContent grid grid--cols-3 grid--gutter-blocks grid--outerGutters-v">
				<div class="grid__cell grid__cell--span-2">';

					if ($location == array(1,0)){
						echo
						'<div class="block block--noPadding">
							<img style="display: block" src="'.$GLOBALS['secretaryImg']['src'].'" alt="'.$GLOBALS['secretaryImg']['altText'].'" />
						</div>';
					}

					echo
					'<div class="block block--responsivePadding">
						<div class="block__inner standardContent fancyLinks">';
							if (
								count($location) > 2 && $modifier == false ||
								$location[0] == 6 && $modifier == false
							) {
								echo '
								<h1>'.$GLOBALS['getCurrent']['title'].'</h1>';
							}
		break;

		case 'mid':
			echo '
							<a class="TK-skipLink" href="#contentStart-'.($GLOBALS['skipTarget']+1).'" data-jshook="skipLinks__nextContentBlock skipLinks__link">Skip to next content block</a>
						</div>
					</div>
				</div>
			';
		break;

		case 'bottom':
			echo '
			</div>
			';
	}
}

?>

