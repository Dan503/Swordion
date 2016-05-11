
			</div>
			<!-- @.siteMain -->

			<?php
				include $module.'siteFooter.php';
			?>

		</div>
		<!-- /.siteContainer__inner-->

	</div>
	<!-- /.siteContainer -->

	<?php include $swordion['base'].'autoload-lightboxes.php'; ?>

	<!-- jQuery loader (make sure it's the latest version when starting) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<?php
		$local_jQuery = $rootLocation.'/assets/js/vendor-JS/jquery-1.11.3.min.js';
		echo "<script>window.jQuery || document.write('<script src=".$local_jQuery."><\/script>')</script>";
	?>

	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
		<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
	<![endif]-->

	<?php

		$baseJS = array(
			'isConstant' => $loadIn['all'],
			'prototypeOnly' => $loadIn['all'],
			'isModern' => $loadIn['modern'],
			'isLegacy' => $loadIn['legacy'],
		);

		//loads the site javascript
		foreach ($baseJS as $setName => $extras){
			echo '
			'.$extras['before'].
				'<script src="'.$rootLocation.'/assets/js/generated-JS/'.$setName.$min.'.js" async></script>'
			.$extras['after'].'
			';
		}

	?>


</body>
</html>
