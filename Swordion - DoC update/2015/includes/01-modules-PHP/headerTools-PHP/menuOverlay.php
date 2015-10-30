
<nav class="menuOverlay" data-jshook="menuOverlay__menu">
	<div class="menuOverlay__scroller">
		<div class="menuOverlay__grid grid grid--cols-6 grid--disableMQs fancyLinks fancyLinks--light">
			<aside class="menuOverlay__sideCell grid__cell">
				<ul class="menuOverlay__sideList">

<?php
	$isActive = $GLOBALS['location'][0] == $i ? true : false;
	$linkActiveClass = $isActive ? ' navPrimary__link--isActive' : '';
?>
					<li class="menuOverlay__sideItem">
						<a href="/2015/" class="menuOverlay__sideLink<?php echo $isHome? ' navPrimary__link--isActive' : ''; ?>">Home</a>
					</li>

					<?php
						$sideLinks__array = $navMap[0]['subNav'];

						foreach ($sideLinks__array as $i => $item) {
							$isActive = $location[0] == 0 && $location[1] == $i && !$isHome ? true : false;
							$linkActiveClass = $isActive ? ' navPrimary__link--isActive' : '';
							$text = $item['title'];
							$link = defaultTo($item['link'],'#');

							if ($item['isNavigable']){
								echo
								'<li class="menuOverlay__sideItem"><a href="'.$link.'" class="menuOverlay__sideLink'.$linkActiveClass.'">'.$text.'</a></li>';
							}
						}
					?>
				</ul>
			</aside>
			<div class="menuOverlay__mainCell grid__cell grid__cell--span-5">
				<?php include 'navPrimary.php' ?>
			</div>
		</div>
	</div>
</nav>