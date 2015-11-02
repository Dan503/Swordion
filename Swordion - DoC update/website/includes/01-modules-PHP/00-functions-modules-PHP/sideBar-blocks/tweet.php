<?php

function tweet ($content){
	$urlContent =urlencode(strip_tags($content));
	$url = shrinkUrl($GLOBALS['currentURL']);
	echo '
<div class="block block--breakout tweet grid__inner">
	<p>'.$content.'</p>
	<a href="http://twitter.com/intent/tweet?status='.$urlContent.'+'.$url.'" class="block__tweetBtn">Tweet</a>
</div>
	';
}

?>