<?php

function pageLayout($portion){
	$portions = array(

'top' => '
	<div class="breadcrumb__neighbor pageLayout">
',

'upper' => '
		<article class="pageLayout__mainArea standardContent">
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