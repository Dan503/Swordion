
		</div>
		<!-- @.mainArea -->

		<?php include '01-modules/siteFooter/00-siteFooter.php'; ?>

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
