
<?php

function shoutOut($array){

$content = $array['content'];
$highlight = $array['highlight'];

echo '
<div class="shoutOut__block">
	<div class="grid grid--cols-2">
		<div class="grid__cell shoutOut__partner standardContent">
			'.$content.'
		</div>
		<div class="grid__cell shoutOut__parent">
			<div class="shoutOut" data-jshook="shoutOut__scrollTrigger">
				<div class="popins grid grid--vAlign" data-jshook="popins">
					<div class="shoutOut__inner grid__cell">
						<div class="grid__vAlignHelper">'.$highlight.'</div>
					</div>
				</div>
				<div class="shoutOut__shifter" data-jshook="shoutOut__shifter"></div>
			</div>
		</div>
	</div>
</div>
';
}


?>

