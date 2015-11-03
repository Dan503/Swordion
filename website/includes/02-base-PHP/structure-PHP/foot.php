
				</div>
				<!-- @.mainArea -->

			</div>
			<!-- @.siteContainer__inner-->

			<?php
				include $modules.'siteFooter-PHP/00-siteFooter.php';
			?>

		</div>
		<!-- @.siteContainer-->

		<?php if ($GLOBALS['hasSideNav']){ ?>
			<div data-jshook="headerTransform__transformer">
				<a href="#" title="Open side navigation" class="stickySideNav__open" data-jshook="stickySideNav__trigger--open">Within this section</a>

				<?php sideBar(array(array('blockType' => 'nav','navType' => 'fixed'))); ?>
			</div>
		<?php } ?>

	</div>
	<!-- TK-overflowHidden -->

	<?php include $includes.'02-base-PHP/autoload-lightboxes.php'; ?>

	<!-- jQuery loader (make sure it's the latest version when starting) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<?php
		$local_jQuery = $rootLocation.'/assets/js/vendor-JS/jquery-1.11.3.min.js';
		echo "<script>window.jQuery || document.write('<script src=".$local_jQuery."><\/script>')</script>";
	?>

	<!--[if gt IE 9 ]>

		<!-- GSAP -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/jquery.gsap.min.js"></script>

		<!-- scrollMagic -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js"></script>
		<?php /*scrollMagic add indicators debugger tool
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>*/ ?>

	<!-- <![endif]-->

	<!--Google analytics code-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-32664322-12', 'auto');//UA-XXXXXXXX-XX is replaced with Google analitics ID
    ga('send', 'pageview');
  </script>

	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
		<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
	<![endif]-->

	<script type="text/javascript">
		var js_root = '<?php echo $rootLocation."/assets/js/"; ?>';
	</script>

	<?php
		$min = $environment == 'development'? '' : '.min';

		$baseJS = array(
			'isConstant' => $loadIn['all'],
			'isModern' => $loadIn['modern'],
			'isLegacy' => $loadIn['legacy'],
		);

		foreach ($baseJS as $setName => $extras){
			echo '
			'.$extras['before'].
				'<script src="'.$rootLocation.'/assets/js/ZZ-merged-JS/'.$setName.$min.'.js"></script>'
			.$extras['after'].'
			';
		}

		$extraJS = array(
		//this is referencing the $locationString variable, it is NOT a numerical index
			'0' => array(
				'isHome' => $loadIn['modern'],
			)
		);

		foreach ($extraJS as $stringLocation => $JSincludes) {
			if ($locationString == $stringLocation) {
				foreach ($JSincludes as $setName => $extras){
					echo '
					'.$extras['before'].
						'<script src="'.$rootLocation.'/assets/js/ZZ-merged-JS/'.$setName.$min.'.js"></script>'
					.$extras['after'].'
					';
				}
			}
		}

	?>


</body>
</html>
