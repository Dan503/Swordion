<?php

function video($srcID, $extras = array()){

	$extras = defaultTo($extras, array(
		'text' => '',
		'id' => '',
		'classes' => '',
		'wrapper-hooks' => '',
		'hooks' => ''
	));

	$titleAttr = $extras['text'] == '' ? 'YouTube video"' : 'Video: '.$extras['text'];

	if ($extras['text'] != ''){
		$id = defaultTo($extras['id'], idSafe($extras['text']));
	} else {
		$id = '';
	}

	echo '
<div class="video '.$extras['classes'].'" data-jshook="'.$extras['wrapper-hooks'].'">
	<iframe id="'.$id.'" title="'.$titleAttr.'" data-jshook="'.$extras['hooks'].'" width="560" height="315" src="https://www.youtube-nocookie.com/embed/'.$srcID.'?rel=0&enablejsapi=1&controls=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>';

};

?>