
<?php

function infoTip ($text, $content){

echo
'<span tabindex="0" class="tooltip tooltip--infoTip infoTip" data-jshook="infoTip__trigger">
	'.$text.'
	<span class="tooltip__text infoTip__text">
		'.$content.'
		<button class="closeBtn infoTip__closeBtn TK-nonDesktop" data-jshook="infoTip__close"></button>
	</span>
</span>';
}

?>

