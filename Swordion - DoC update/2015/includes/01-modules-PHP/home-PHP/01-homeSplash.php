<div class="homeSplash infographic" data-jshook="homeSplash__stage infographic">

	<?php var_dump($modules); ?>

	<?php include $modules.'internalHeader.php'; ?>

	<p class="homeSplash__numbers TK-modernOnly">
		<span class="homeSplash__number homeSplash__number--left" data-jshook="homeSplash__number--left">14</span>
		<span class="homeSplash__slash" data-jshook="homeSplash__slash"></span>
		<span class="TK-visHid">&ndash;</span>
		<span class="homeSplash__number homeSplash__number--right" data-jshook="homeSplash__number--right">15</span>
	</p>

	<p class="internalHeader__introText homeSplash__introText internalHeader__title TK-weight--normal TK-nonLargeScreen" data-jshook="accordion__content homeSplash__intro"><?php echo $getCurrent['intro']; ?></p>

	<p class="homeSplash__scrollInstruction scrollInstruction TK-largeScreenOnly" data-jshook="homeSplash__scrollInstruction">
		<span class="scrollInstruction__text">Scroll for highlights<span class="TK-modernOnly"><br> <a href="#" data-jshook="autoScroll__playPause">or let us scroll for you</a></span></span>
		<span class="scrollInstruction__animation">
			<span class="scrollInstruction__arrow"></span>
			<span class="scrollInstruction__arrow"></span>
			<span class="scrollInstruction__arrow"></span>
		</span>
	</p>

</div>