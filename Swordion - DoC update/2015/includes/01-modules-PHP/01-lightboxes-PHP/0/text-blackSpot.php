
<?php $inLightbox = $GLOBALS['inLightbox']; ?>

<div class="<?php if ($inLightbox) echo 'standardContent'; ?>">
	<h2 class="<?php if(!$inLightbox) echo 'blackSpot__heading infographic__heading infographic__heading--isAbsolute'; ?>">Mobile Black Spot Programme</h2>

	<ul class="TK-visHid">
		<li>500 Base stations</li>
		<li>Now even more coverage</li>
		<li>5,700kms with extra coverage</li>
	</ul>

	<div class="<?php if(!$inLightbox) echo 'blackSpot__content '; ?>standardContent">
		<p>Almost <span class="blackSpot__textHighlight" <?php if (!$inLightbox) echo 'data-jshook="blackSpot__textHighlight blackSpot__textHighlight--1"'; ?>><strong>500</strong> [499] new or upgraded mobile base stations</span> would be built around Australia under the <span class="blackSpot__textHighlight"><strong>$100 million</strong> Mobile Black Spot Programme</span>.</p>

		<p>These would provide <span class="blackSpot__textHighlight" <?php if (!$inLightbox) echo 'data-jshook="blackSpot__textHighlight blackSpot__textHighlight--2"'; ?>>new handheld coverage to <strong>68,600</strong> km<sup>2</sup> and new external antenna coverage to over <strong>150,000</strong> km<sup>2</sup></span>, and over <span class="blackSpot__textHighlight" <?php if (!$inLightbox) echo 'data-jshook="blackSpot__textHighlight blackSpot__textHighlight--3"'; ?>><strong>5,700</strong> km of major transport routes</span> will receive new handheld or external antenna coverage.</p>
	</div>
</div>