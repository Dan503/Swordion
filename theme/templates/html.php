<!doctype html>


	<!-- Web Design & Development by Reading Room -->
	<!-- www.readingroom.com.au (02) 6229 9400 -->

<!-- http://www.paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<?php
	//conversion to variables
	$title = $bp->get_title();

	if ($bp->get_body_classes()){
		$body_classes = $bp->get_body_classes();
	};
?>

	<head profile="http://www.w3.org/1999/xhtml/vocab">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<meta name="description" content="">
		<meta name="author" content="">

		<title><?php echo $title . ' | ' . $site_name; ?></title>
		<style type="text/css" media="all">
			@import url("/drupal-DO-NOT-EDIT/css/system.base.css");
			@import url("/drupal-DO-NOT-EDIT/css/system.menus.css");
			@import url("/drupal-DO-NOT-EDIT/css/system.messages.css");
			@import url("/drupal-DO-NOT-EDIT/css/system.theme.css");
			@import url("/drupal-DO-NOT-EDIT/css/field.css");
			@import url("/drupal-DO-NOT-EDIT/css/node.css");
			@import url("/drupal-DO-NOT-EDIT/css/user.css");
			@import url("/drupal-DO-NOT-EDIT/css/layout.css");
		</style>

		<?php /* Do not upgrade the version of jQuery unless cleared with a drupal developer (Drupal jQuery update currently only goes up to jQuery 1.8) */ ?>
		<script type="text/javascript" src="/drupal-DO-NOT-EDIT/js/jquery.js?v=1.8.2"></script>
		<script type="text/javascript" src="/drupal-DO-NOT-EDIT/js/jquery.once.js?v=1.2"></script>
		<script type="text/javascript" src="/drupal-DO-NOT-EDIT/js/drupal.js"></script>
		<script type="text/javascript" src="/drupal-DO-NOT-EDIT/js/collapse.js"></script>

        <script src="/theme/assets/js/vendor/_modernizr.2.7.1.min.js"></script>

		<link rel="shortcut icon" href="/theme/assets/images/favicon.ico" />
        <link rel="stylesheet" href="/theme/assets/css/style.css">

	<!--[if gt IE 8]><!-->
		<link rel="stylesheet" type="text/css" href="/theme/assets/css/style.css" />
	<?php /* Minified CSS (For use during production phase)
		<link rel="stylesheet" type="text/css" href="/theme/assets/css/style.min.css" />
	*/?>
	<!--<![endif]-->

	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="/theme/assets/css/style-lt-ie9.css" />
	<![endif]-->

	<?php /* Minified CSS (For use during production phase)
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="/theme/assets/css/style-lt-ie9.min.css" />
	<![endif]-->
	*/ ?>

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/_html5.js"></script>
		<script src="/theme/assets/js/plugins/conditional/_selectivizr.min.js"></script>
	<![endif]-->
	<!-- 1. Allows IE to style HTML5 elements -->
	<!-- 2. Allows IE to use CSS3 selectors (eg. :nth-child(odd) ) -->


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
	</head>
	<body class="<?php if (isset($body_classes)) echo $body_classes; ?>" >
		<!-- I've found the <noscript> tag to not always work properly -->
		<div class="alert-nojs jsHide">
			<p>Please <a href="http://www.enable-javascript.com/">enable javascript</a> to access the full functionality of this site</p>
		</div>

		<a href="#content_start" accesskey="2" class="skipLink">Skip to content</a>
		<a href="#start_primary_nav" accesskey="3" class="skipLink">Skip to Main Navigation</a>
		<?php include $bp->get_page_template(); ?>

	<!-- jQuery loader (make sure it's the latest version when starting) -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

		<script type="text/javascript">var js_root = "/theme/assets/js/";</script>
		<script src="/theme/assets/js/merged.js"></script>

	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
		<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
	<![endif]-->

	</body>
</html>