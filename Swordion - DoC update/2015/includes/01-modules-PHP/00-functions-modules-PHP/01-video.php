<?php

function video($srcID, $extras){

	$extras = defaultTo($extras, array(
		'text' => '',
		'id' => '',
		'classes' => '',
	));

	$titleAttr = $extras['text'] == '' ? '' : ' title="Video: '.$extras['text'].'"';

	echo '
<div class="video '.$extras['classes'].'">
	<iframe'.$titleAttr.' id="'.$extras['id'].'" width="560" height="315" src="https://www.youtube-nocookie.com/embed/'.$srcID.'?rel=0&enablejsapi=1&controls=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>';

};

?>