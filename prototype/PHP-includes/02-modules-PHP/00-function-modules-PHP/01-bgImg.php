<?php

function bgImg ($img, $settings = []){

	$settings = defaultTo($settings, [
		'classes' => '',
		'altText' => 'Alt text for image goes here',
		'output' => 'echo',
	]);

	$HTML = '
	<div class="bgImg '.$settings['classes'].'">
		<img src="'.$img.'" alt="'.$settings['altText'].'" />
	</div>';

	if ($settings['output'] == 'echo'){
		echo $HTML;
	} else {
		return $HTML;
	}

}

?>