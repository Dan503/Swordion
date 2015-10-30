<?php

function videoBlock($text, $srcID){

//use this bit of the youtube embed url for the "src" variable: http://grabilla.com/05814-cf4d34e5-99d8-40ee-847c-825f97c31523.png

	$id = idSafe($text);
	echo '
<div class="block block--noPadding videoBlock">
	<div class="videoBlock__overlay" data-jshook="videoBlock__overlay">
		<a href="#'.$id.'" class="videoBlock__intro" data-jshook="videoBlock__playBtn">
			<div class="videoBlock__text">
				<p>'.$text.'</p>
			</div>
			<div class="videoBlock__playBtn">Play this video <span class="videoBlock__btnIcon"></span></div>
		</a>
	</div>
';

	video($srcID, array(
		'text' => $text,
		'id' => $id,
		'classes' => 'videoBlock__video',
	));

echo
'
</div>
	';
}

?>

