
<?php

function moreInfoBox($content){
	echo '
<div class="block block--breakout block--blue moreInfoBox grid__inner">
	<p>'.$content['text'].'</p>
	<a href="'.$content['link'].'" class="block__infoBtn">'.$content['btnText'].'<span class="block__infoBtnIcon"></span></a>
</div>
	';
}

?>
