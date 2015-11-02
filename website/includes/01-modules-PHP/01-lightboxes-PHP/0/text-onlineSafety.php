
<?php $inLightbox = $GLOBALS['inLightbox']; ?>

<?php if (!$inLightbox){ ?>
	<h2 class="infographic__heading onlineSafety__heading  infographic__heading--isAbsolute">Online Safety</h2>
<?php } ?>
<div class="standardContent<?php echo !$inLightbox? ' onlineSafety__content' : ''; ?>">
	<?php if ($inLightbox){ ?>
		<h2>Online Safety</h2>
	<?php } ?>
	<p>This year the website received <strong <?php echo !$inLightbox? ' data-jshook="onlineSafety__highlight--1"' : ''; ?>>766,167 unique visitors</strong>.</p>

	<p>The free Stay Smart Online Alert Service sends email and social media messages to more than <strong <?php echo !$inLightbox? ' data-jshook="onlineSafety__highlight--2"' : ''; ?>>21,000 subscribers</strong> and <strong <?php echo !$inLightbox? ' data-jshook="onlineSafety__highlight--3"' : ''; ?>>9,300 Facebook followers</strong> about current threats.</p>
</div>
