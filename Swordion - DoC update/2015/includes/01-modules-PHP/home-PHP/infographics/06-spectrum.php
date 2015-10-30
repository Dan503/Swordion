
<?php
	function spectrum__highlight($screen){
		echo '
		<div class="spectrum__highlight TK-'.$screen.'" aria-hidden="true">
			<p class="spectrum__highlightItem" data-jshook="spectrum__highlight spectrum__highlight--1">
				<span class="spectrum__highlightInner"><strong data-jshook="spectrum__countUp" data-value="1476">1,476</strong> free-to-air digital television services</span>
			</p>

			<p class="spectrum__highlightItem" data-jshook="spectrum__highlight spectrum__highlight--2">
				<span class="spectrum__highlightInner"><span class="TK-noWrap"><strong data-jshook="spectrum__countUp" data-value="20.4">20.4</strong> million</span> viewers retuning their televisions</span>
			</p>

			<p class="spectrum__highlightItem" data-jshook="spectrum__highlight spectrum__highlight--3">
				<span class="spectrum__highlightInner"><strong><span data-jshook="spectrum__countUp" data-value="126">126</span> MHz</strong>largest digital UHF in the world</span>
			</p>
		</div>
		';
	}
?>

<div data-jshook="spectrum__highlightsTrigger"></div>
<div class="spectrum infographic TK-fullScreen--hasHeader" data-jshook="spectrum__stage infographic">

	<div class="infographic__mobFG">
		<h2 class="TK-nonLargeScreen spectrum__mobHeading infographic__heading" data-jshook="spectrum__mobHeading">Freeing up spectrum</h2>

		<div class="spectrum__visualBG" data-jshook="spectrum__visual">
			<div class="spectrum__visualWidth">
				<div class="spectrum__visualHeight">
					<div class="spectrum__svgWrap" data-jshook="spectrum__wrap" aria-hidden="true">
						<?php svg('spectrum'); ?>
						<div class="spectrum__svgBG">
							<div class="spectrum__svgMaskedContent TK-fill">
								<div class="spectrum__circle" data-jshook="spectrum__circle"></div>
								<div class="spectrum__gradient TK-fill" data-jshook="spectrum__gradient">
									<div class="spectrum__svgCover spectrum__svgCover--gradient" data-jshook="spectrum__cover--gradient"></div>
								</div>
							</div>
							<div class="spectrum__svgCover" data-jshook="spectrum__cover--svg"></div>
						</div>
					</div>

					<?php spectrum__highlight('largeScreenOnly') ?>
				</div>
			</div>
			<?php spectrum__highlight('nonLargeScreen') ?>
		</div>


		<div class="grid grid--vAlign spectrum__fullScreen TK-fullScreen--hasHeader TK-largeScreenOnly">
			<div class="grid__cell">

					<div class="grid grid--cols-3">
						<div class="grid__cell grid__cell--span-2">

						</div>

						<div class="grid__cell">
							<div class="spectrum__content standardContent" data-jshook="spectrum__content">

								<?php include $modules_lightbox.'text-spectrum.php'; ?>

							</div>
						</div>
					</div>

			</div>
		</div>
	</div>
	<?php infoPlayer('spectrum', 'darkBlue'); ?>
</div>