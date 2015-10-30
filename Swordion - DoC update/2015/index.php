<?php

$location = array(0);

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<div class="TK-modernOnly">

<?php

//Couldn't do a basic globFiles() command because I'd have to move variables to the global scope
$infographics = globFiles($modules_home.'infographics/', 'objects');
foreach ($infographics as $ig){
	include $ig['fullPath'];
}

?>

</div>



<?php

echo '<!--[if lt IE 10]>';

$images = globFiles('/assets/images/design/legacy-infographics/', 'objects', '*');

$igEstablished_isTriggered = false;

foreach($images as $image){

	$module = substr($image['fileName'], 3);

	if(substr($module, 0, 13) == 'igEstablished') {
		$module = 'igEstablished';
	}
	$infoText = $modules_lightbox.'text-'.$module.'.php';

	$linkBits = array(
		'ausPost' => '<a href="#lightbox__ausPostVid" title="Watch video: Australians love their post service and that is why we will introduce sensible reforms to ensure it is viable for future generations #CommsAu" data-jshook="ausPost__playVid" class="ieInfographic__imageWrap">',
		'nbn' => '<a href="#lightbox__nbn__links" title="Access the links" class="ieInfographic__imageWrap">',
	);
	$linkDefault = '<div class="ieInfographic__imageWrap">';
	$linkStart = defaultTo($linkBits[$module], $linkDefault);
	$linkEnd = $linkStart != $linkDefault ? '</a>' : '</div>';

	echo '
	<div class="ieInfographic TK-pageWidth">
		<div class="TK-visHid">';
			if ($module == 'homeSplash'){
				echo '
				<div class="TK-visHid">
					<p>The Department of Communications promotes an innovative and competitive communications sector so Australians can realise the full potential of digital technologies and communications services.</p>
				</div>';
			} elseif ($module != 'igEstablished' || !$igEstablished_isTriggered){
				include $infoText;
			}
		echo
		'</div>';

		echo
		$linkStart.'
			<img src="'.$image['path'].'" class="ieInfographic__image" alt="'.$module.' infographic image" />
		'.$linkEnd.'
	</div>';

	if ($module == 'igEstablished') {
		$igEstablished_isTriggered = true;
	}
}

echo '<![endif]-->';

?>


<?php /*<div class="infographic TK-fullScreen--hasHeader" data-jshook="infographic"></div>*/ ?>

<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
