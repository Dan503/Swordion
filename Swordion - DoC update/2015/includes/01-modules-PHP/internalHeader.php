<?php

$sectionTitle = $getCurrentSection['title'];
$sectionIntro = defaultTo($getCurrentSection['intro'], 'This page is missing intro text, check the navMap file.');

?>
<header class="internalHeader TK-pageWidth TK-clearFix">

	<div class="internalHeader__logoSiteNameWrap">
		<div class="internalHeader__logo">
			<?php if (!$isHome) echo '<a href="/2015/" title="Back to home">'; ?>
				<?php
					//svg('govLogo--stacked');
					svg('govLogo--inline');
				?>
				<img class="internalHeader__logoImg TK-nonMobile" src="/2015/assets/images/design/govLogo.png" alt="Department of Communications government logo" width="100%" />
			<?php if (!$isHome) echo '</a>'; ?>
		</div>

		<?php if ($isHome) skipTarget(); ?>

		<p class="internalHeader__siteName">
			<?php if (!$isHome) echo '<a href="/2015/" title="Back to home">'; ?>
				<strong class="internalHeader__siteNameText internalHeader__siteNameText--large">Comms</strong>
				<span class="internalHeader__siteNameText TK-weight--light">Annual Report</span>
				<span class="internalHeader__siteNameText TK-weight--bold">2014&ndash;15</span>
			<?php if (!$isHome) echo '</a>'; ?>
		</p>
	</div>

	<?php if ($isHome){ ?>
		<p class="internalHeader__introText homeSplash__introText internalHeader__title TK-weight--normal TK-largeScreenOnly" data-jshook="accordion__content homeSplash__intro"><?php echo $getCurrent['intro']; ?></p>
	<?php } else { ?>
		<div id="sectionIntro" class="internalHeader__titles" data-jshook="accordion__item">
			<?php

			 if (
				$isInternal_shallow ||
				$isInternal_deep && $location[0] == 6 && $location[1] == 0 ||
				$isInternal_deep && $location[0] != 6 && $location[2] == 0
			) {
				skipTarget();
			} ?>

			<?php $titleTag = $isInternal_shallow ? 'h1' : 'p'; ?>

			<<?php echo $titleTag ?> class="internalHeader__pageTitle internalHeader__title TK-weight--bold">
				<?php echo $sectionTitle; ?>
				<a href="#sectionIntro" class="TK-mobileOnly internalHeader__introTrigger infoIcon" data-jshook="accordion__trigger--manual"></a>
			</<?php echo $titleTag ?>>

			<div class="internalHeader__divideDrawer TK-float--left TK-modernOnly"></div>

			<p class="internalHeader__introText internalHeader__title TK-weight--normal" data-jshook="accordion__content"><?php echo $sectionIntro; ?></p>


		</div>
	<?php } ?>
</header>