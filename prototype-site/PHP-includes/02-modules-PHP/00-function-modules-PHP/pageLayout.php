<?php

function pageLayout($portion){
	$portions = array(

'top' => '
	<div class="breadcrumb__neighbor pageLayout grid grid--cols-3 grid--gutter-pageLayout">
',

'upper' => '
		<article class="pageLayout__mainArea standardContent grid__cell--span-2">
',

'lower' => '
		</article>
',

'bottom' => '
	</div>
',

	);

	echo $portions[$portion];
}

?>