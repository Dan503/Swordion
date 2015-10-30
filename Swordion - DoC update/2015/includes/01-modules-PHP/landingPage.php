
<div class="landingGrid grid grid--cols-2 grid--vAlign grid--disableMQs">
	<div class="landingGrid__cell landingGrid__intro grid__cell">

		<div class="grid__vAlignHelper landingTri__mobileHeader">
			<div class="internalHeader__logoSiteNameWrap internalHeader__logoSiteNameWrap--landing TK-clearFix">
					<div class="internalHeader__logo internalHeader__logo--landing">
						<a href="/2015/" title="Back to home">
							<?php
								svg('govLogo--stacked');
								svg('govLogo--inline');
							?>
							<!--[if lt IE 9]><img class="internalHeader__logoImg" src="/2015/assets/images/design/govLogo--white.png" alt="Department of Communications government logo" width="100%" /><![endif]-->
						</a>
					</div>

					<p class="internalHeader__siteName internalHeader__siteName--landing">
						<a href="/2015/" title="Back to home">
							<strong class="internalHeader__siteNameText internalHeader__siteNameText--large">Comms</strong>
							<span class="internalHeader__siteNameText TK-weight--light">Annual Report</span>
							<span class="internalHeader__siteNameText TK-weight--bold">2014&ndash;15</span>
						</a>
					</p>
			</div>

			<div class="landingIntro">
				<?php skipTarget(); ?>

				<h1 class="landingIntro__heading">Section <?php echo $location[0].'<br> '.$getCurrent['title']; ?></h1>


				<p class="landingIntro__text"><?php echo defaultTo($getCurrent['intro'], 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id ne cogitari quidem potest quale sit, ut non repugnet ipsum sibi. Sin tantum modo ad indicia veteris memoriae cognoscenda, curiosorum. Quae diligentissime contra Aristonem dicuntur a Chryippo. Luxuriam non reprehendit, modo sit vacua infinita cupiditate et timore.'); ?></p>
			</div>
		</div>
	</div>

	<div class="landingGrid__cell landingGrid__links grid__cell TK-relative landingLinks" data-jshook="fullScreen__filler" data-fullscreen-subtract="60">
		<div class="landingLinks__inner">
			<h2 class="landingLinks__heading">
				<strong class="landingLinks__counter">
					<span class="navCounters__item--manual">
						<?php echo $location[0] < 10 ? '0'.$location[0] : $location[0]; ?>
					</span>
				</strong>
				<span class="landingLinks__headingText">In this section</span>
			</h2>
			<ul class="landingLinks__list TK-noDots">
				<?php
					foreach ($getCurrent['subNav'] as $item) {
						$text = $item['title'];
						$link = defaultTo($item['link'],'#');

						$linkHTML = $location[0] == 4 ?
							fileLink($text,$link,'landingLinks__link') : '<a href="'.$link.'" class="landingLinks__link">'.$text.'</a>';

						echo
						'<li class="landingLinks__item">'.$linkHTML.'</li>';
					}
				?>

			</ul>
		</div>
	</div>
</div>