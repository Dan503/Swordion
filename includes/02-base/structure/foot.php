
		</div>
		<!-- @.mainArea -->

		<?php
			include $modules.'siteFooter/00-siteFooter.php';


/*******************************\
	Auto loading lightboxes!
\*******************************/
			$lightboxSets = isset($lightboxSets) ? $lightboxSets : array();
			$exactLightboxes = isset($exactLightboxes) ? $exactLightboxes : array();

			$lightboxSets = array_merge($lightboxSets, $constantLightboxes);

		//adds all constant lightboxes to the site
		//(use this if the lightbox needs to appear on every page in the site unconditionally)
		//place content files in the "/includes/01-modules/01-lightboxes/constant/" folder to use this
			$lightboxFiles = glob($_SERVER['DOCUMENT_ROOT'].'/includes/01-modules/01-lightboxes/constant/*.php', GLOB_BRACE);

			foreach($lightboxFiles as $file) {
			  lightbox($file);
			}

		//adds all conditional lightbox sets to the site
		//(use this if you want to bulk load a bunch of lightboxes onto a page but don't want them to be loaded on every page across the site
		//place files in a new folder under "/includes/01-modules/01-lightboxes/conditional/" folder to use this.
		//Then state the folder name in the $lightboxSets variable as part of an array
			foreach($lightboxSets as $set) {
				$lightboxFiles = glob($_SERVER['DOCUMENT_ROOT'].'/includes/01-modules/01-lightboxes/conditional/'.$set.'/*.php', GLOB_BRACE);

				foreach($lightboxFiles as $file) {
				  lightbox($file);
				}
			}

		//adds all conditional exact lightboxes to the site
		//(use this if you want to cherry pick exact lightboxes without loading entire sets)
		//If you are using this then you are probably after a file that you have already used on a different page
		//State the path to the file name starting from the "/includes/01-modules/01-lightboxes/conditional/" folder in the $exactLightboxes variable as part of an array
			foreach($exactLightboxes as $lightbox) {
				$lightboxFiles = glob($_SERVER['DOCUMENT_ROOT'].'/includes/01-modules/01-lightboxes/conditional/'.$lightbox.'.php', GLOB_BRACE);

				foreach($lightboxFiles as $file) {
				  lightbox($file);
				}
			}
		?>

	</div>
	<!-- @.siteContainer-->

	<!-- jQuery loader (make sure it's the latest version when starting) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

	<script type="text/javascript">
		var js_root = "/assets/js/";
	</script>

	<?php
		$merged = $environment == 'development'? 'merged' : 'merged.min';
		echo '<script src="/assets/js/'.$merged.'.js"></script>'
	?>


	<!--Google analytics code-->
	<!--<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>-->

	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
		<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
	<![endif]-->

</body>
</html>
