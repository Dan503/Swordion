<?php

function video($srcID, $extras = array()){

	$extras = defaultTo($extras, array(
		'text' => null,
		'id' => null,
		'classes' => null,
		'wrapper-hooks' => null,
		'hooks' => null
	));

	$titleAttr = !isset($extras['text']) ? 'YouTube video"' : 'Video: '.$extras['text'];

	$id = defaultTo($extras['id'], idSafe('video-'.$srcID));

	$parsedUrl = parse_url($GLOBALS['get']['url']);
	$rootURL = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];

	echo '
<div class="responsiveVideo '.$extras['classes'].'" data-jshook="'.$extras['wrapper-hooks'].'">
	<iframe id="'.$id.'" title="'.$titleAttr.'" data-jshook="'.$extras['hooks'].'" width="560" height="315" src="https://www.youtube-nocookie.com/embed/'.$srcID.'?rel=0&enablejsapi=1&controls=1&showinfo=0'./*&origin='.$rootURL.*/'" frameborder="0" allowfullscreen></iframe>
</div>';

};

?>