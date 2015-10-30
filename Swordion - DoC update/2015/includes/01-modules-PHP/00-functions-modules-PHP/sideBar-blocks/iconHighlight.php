
<?php

function iconHighlight($content){
		echo '
<div class="block block--breakout block--yellow iconHighlight grid__inner">
	<div class="block__iconHighlight icon-'.$content['icon'].'">
		<span class="TK-visHid">'.$content['altText'].'</span>
	</div>
	<p>&lsquo;'.$content['text'].'&rsquo;</p>
</div>
		';
}

?>

