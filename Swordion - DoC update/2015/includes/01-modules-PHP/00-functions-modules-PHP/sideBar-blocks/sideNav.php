<?php

function sideNav ($device){

$location = $GLOBALS['location'];
$getCurrent = $GLOBALS['getCurrent'];
$getCurrentSection = $GLOBALS['getCurrentSection'];

$sectionName = $getCurrentSection['title'];
$subNav = $getCurrentSection['subNav'];

$randomNumber = rand ();

$sideNavID = 'sideNav-'.$randomNumber;

$jsHideClass = $device == 'nonDesktop' ? ' TK-hide' : '';

$isSticky = $device == '' ? true : false;

$stickyModuleClass = $isSticky ? ' stickySideNav' : '';


echo '
<div id="'.$sideNavID.'" class="block block--breakout sideNav'.$stickyModuleClass.' grid__inner TK-'.$device.'" data-jshook="accordion__item sideNav__wrapper skipLinks__sideNav">';

	switch($device) {

		case 'desktopOnly':	skipTarget('sideNav');	break;

		case 'fixed' :
			echo '
			<a href="#" title="Close side navigation" class="stickySideNav__close closeBtn" data-jshook="stickySideNav__trigger--close"></a>';
			break;

		case 'nonDesktop' :
			echo '
			<a href="#'.$sideNavID.'" class="TK-nonDesktop" data-jshook="accordion__trigger--manual" title="open/close nav">';
			break;

	}

	echo '
	<h2 class="sideNav__heading">
		Within '.$sectionName.'
		<span class="TK-nonDesktop sideNav__expandNavTrigger"></span>
	</h2>';

	if ($device == 'nonDesktop'){
		echo '</a>';
	}

	echo '
	<nav class="'.$jsHideClass.'" data-jshook="accordion__content">
		<ul class="sideNav__list" data-jshook="accordion__reference">';
				for ($i = 0; $i < count($subNav); $i++) {
					$item = $subNav[$i];
					$text = $item['title'];
					$randomNumber = rand();
					$idText = idSafe($text);
					$itemID = $idText.$randomNumber;
					$link = defaultTo($item['link'], '?');
					$accordionID = 'item-'.$itemID;

					$isActive = $getCurrent['title'] == $text;
					$activeClass = $isActive ? ' sideNav__item--isActive accordion__item--isOpen-JS' : '';
					$jsHideClass = $isActive ? '' : ' TK-jsHide';

					$tertiaryNav = $item['subNav'];//$subNav[$i]['subNav'];

					echo
					'<li id="'.$accordionID.'" class="sideNav__item'.$activeClass.'" data-jshook="accordion__item">
						<div class="TK-relative">
							<a href="'.$link.'" class="sideNav__link">'.$text.'</a>';
							if (isset($tertiaryNav)){
								echo '
								<a href="#'.$accordionID.'" class="sideNav__trigger" title="open/close item" data-jshook="accordion__trigger--auto"></a>';
							}
						echo '
						</div>
					';


						if (isset($tertiaryNav)){
							echo '
							<ul class="sideNav__subList'.$jsHideClass.'" data-jshook="accordion__content">';
								for ($x = 0; $x < count($tertiaryNav); $x++){
									$subItem = $tertiaryNav[$x];
									$subText = $subItem['title'];
									$headingID = idSafe($subText);
									$subLinkURL = $isActive?  '' : $link;
									$subLink = $subLinkURL.'#heading-'.$headingID;

									echo '
									<li class="sideNav__subItem">
										<a href="'.$subLink.'" class="sideNav__subLink">
											'.$subText.'
										</a>
									</li>
									';
								}
							echo '
							</ul>
							';
						}

					echo
					'</li>';
				}
		echo '
		</ul>
	</nav>
</div>
	';
}

?>