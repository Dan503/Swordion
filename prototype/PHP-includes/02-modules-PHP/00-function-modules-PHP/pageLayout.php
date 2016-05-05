<?php

function pageLayout($portion){
	$portions = array(

'top' => '
	<div class="breadcrumb__neighbor pageLayout">
		<article class="pageLayout__mainArea standardContent">
',

'mid' => '
		</article>
',

'bottom' => '
	</div>
',

	);

	echo $portions[$portion];
}

?>