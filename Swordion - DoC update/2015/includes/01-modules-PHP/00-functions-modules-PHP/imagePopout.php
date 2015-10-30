
<?php

	function imgPopout ($content){
		$idPartial = idSafe($content['heading']);
		$id = 'imgPopout--'.$idPartial;

		echo '
<div class="imgPopout TK-relative">
	<div class="imgPopout__preview grid grid--cols-3 grid--disableMQs" data-jshook="imgPopout__preview">
		<div class="imgPopout__introText grid__cell grid__cell--span-2">
			<p>'.$content['intro'].'</p>
		</div>
		<a href="#'.$id.'" class="imgPopout__expandLink grid__cell TK-relative" data-jshook="imgPopout__trigger">
			<img class="imgPopout__imgSmall" src="'.$content['imgSrc'].'" alt="'.$content['imgAlt'].'" />
			<span class="imgPopout__expandIcon"></span>
		</a>
	</div>
	<div id="'.$id.'" class="imgPopout__expander" data-jshook="imgPopout__expander">
		<div class="imgPopout__expanderGrid grid grid--cols-3 grid--enableWrapping">
			<div class="grid__cell grid__cell--span-2 grid__cell--vAlign TK-relative imgPopout__imgLargeContainer">
				<img class="imgPopout__imgLarge" src="'.$content['imgSrc'].'" alt="'.$content['imgAlt'].'" />
			</div>
			<div class="grid__cell imgPopout__textLarge TK-relative">
				<a href="#'.$id.'" title="close" class="closeBtn imgPopout__close" data-jshook="imgPopout__close"></a>
				<div>
					<h2>'.$content['heading'].'</h2>
					'.$content['content'].'
				</div>
				<a href="'.$content['btnLink'].'" class="imgPopout__btn">'.$content['btnText'].'</a>
			</div>
		</div>
	</div>
</div>
		';
	}

?>

