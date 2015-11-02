
<?php function generateNavPrimary($start, $end = false){
	$navPrimary__array = $GLOBALS['navMap'];

	$end = $end == false ? count($navPrimary__array) : $end + 1;

	echo '
	<ol class="menuOverlay__mainList navPrimary grid__cell TK-noDots" start="'.$start.'">';

		for ($i = $start; $i < $end; $i++) {
			$item = $navPrimary__array[$i];
			$text = $item['title'];
			$link = defaultTo($item['link'],'#');
			$isActive = $GLOBALS['location'][0] == $i ? true : false;
			$linkActiveClass = $isActive ? ' navPrimary__link--isActive' : '';
			$itemActiveClass = $isActive ? ' navPrimary__item--isActive' : '';

			echo '
			<li class="navPrimary__item navCounters__item'.$itemActiveClass.'"><a href="'.$link.'" class="navPrimary__link'.$linkActiveClass.'">'.$text.'</a>

				<ul class="navPrimary__subList">';

						$navPrimary__subArray = $item['subNav'];

						for ($x = 0; $x < count($navPrimary__subArray); $x++) {
							$subItem = $navPrimary__subArray[$x];
							$subText = $subItem['title'];
							$subLink = defaultTo($subItem['link'],'#');

							$subIsActive =
								$GLOBALS['location'][0] == $i &&
								(!$GLOBALS['isLanding']) &&
								$GLOBALS['location'][1] == $x
							? true : false;

							$subLinkActiveClass = $subIsActive ? ' navPrimary__subLink--isActive navPrimary__link--isActive' : '';
							$subItemActiveClass = $subIsActive ? ' navPrimary__subItem--isActive' : '';

							$subLinkHTML = $i == 4 ?
								fileLink($subText, $subLink, 'navPrimary__subLink navPrimary__link navPrimary__downloadLink'.$subLinkActiveClass)
								:
								'<a href="'.$subLink.'" class="navPrimary__subLink navPrimary__link'.$subLinkActiveClass.'">'.$subText.'</a>';

							echo
							'<li class="navPrimary__subItem'.$subItemActiveClass.'">'.$subLinkHTML.'</li>';
						}
				echo '
				</ul>

			</li>';
		}
	echo '
	</ol>';
}; ?>

<div class="navCounters__counterReset grid grid--cols-2 grid--gutter-navPrimary">
	<?php generateNavPrimary(1, 4); ?>

	<?php generateNavPrimary(5); ?>
</div>


