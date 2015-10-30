<?php

$GLOBALS['bg_pos'] = 'left';

function infoPlayer($module, $bgColor = false) {

//infoPlayer
	echo '
	<div class="infoPlayer TK-nonLargeScreen" data-jshook="'.$module.'__infoPlayer">
		<div class="infoPlayer__overlay">
			<button class="infoPlayer__overPlay" data-jshook="'.$module.'__overPlay" title="Play animation">
				<span class="infoPlayer__overPlayInner"></span>
			</button>
		</div>

		<div class="infoPlayer__controls grid grid--noWrap">
			<button class="infoPlayer__playPause infoPlayer__btn grid__cell" data-jshook="'.$module.'__playPause" title="play/pause"></button>
			<button class=" infoPlayer__btn grid__cell" title="Reset animation" data-jshook="'.$module.'__reset"><i class="infoPlayer__reset iconHome-reset"></i></button>
			<div class="infoPlayer__progressWrap grid__cell">
				<input class="infoPlayer__progress" type="range" value="0" min="0" max="1" step="0.001" title="Animation progress" data-jshook="'.$module.'__progress" />
			</div>
			<a href="#lightbox__text-'.$module.'" class="infoPlayer__info infoPlayer__btn grid__cell" title="More information" data-jshook="'.$module.'">
				<i class="infoPlayer__infoIcon"></i>
			</a>
		</div>
	</div>';


	$mobBG_exclusions = array(
		'igEstablished',
		'ausPost'
	);

//mobBG
	if ($bgColor != false){
		echo '
		<div class="infoPlayer__mobBG '.$module.'__mobBG infographic__mobBG infographic__mobBG--'.$bgColor.' infographic__mobBG--'.$GLOBALS['bg_pos'].'" data-jshook="'.$module.'__mobBG '.$module.'__mobBG--'.$GLOBALS['bg_pos'].'"></div>
		';

		$GLOBALS['bg_pos'] = $GLOBALS['bg_pos'] == 'left' ? 'right' : 'left';

	}
}

?>