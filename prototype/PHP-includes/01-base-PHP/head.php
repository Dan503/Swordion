<!doctype html>


	<!-- Web Design & Development by Adelphi Digital Consulting Group -->
	<!-- http://adelphi.digital/ (02) 6229 9400 -->

<!-- http://www.paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 8]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">

    <title><?php
		$title = defaultTo($get['current']['altTitle'], $get['current']['title']);
		$titleText = $isHome ? strip_tags($title) : strip_tags($title) . ' | Website name goes here';

		print $titleText;
	?></title>

	<?php
		$socialDescription = strip_tags(defaultTo($get['current']['intro'], 'Social description text'));
		echo '<meta name="description" content="'.$socialDescription.'" />';
	?>

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<?php $shareTitle = $titleText; ?>

	<!-- facebook meta data -->
	<meta property="og:title" content="<?php echo $shareTitle; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo $get['url']; ?>" />
	<meta property="og:image" content="<?php echo $rootLocation; ?>/assets/images/design/share-thumbnail.jpg" />
	<meta property="og:description" content="<?php echo $socialDescription; ?>" />

	<!-- twitter meta data -->
	<meta name="twitter:site" content="<?php $get['url']; ?>">
	<meta name="twitter:title" content="<?php echo $shareTitle; ?>">
	<meta name="twitter:description" content="<?php echo $socialDescription; ?>">
	<meta name="twitter:image" content="<?php echo $rootLocation; ?>/assets/images/design/share-thumbnail.jpg">

    <!-- favicon -->
	<link rel="shortcut icon" href="/2015/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/2015/favicon.ico" type="image/x-icon">

	<!-- touch screen home icon -->
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/2015/apple-icon-57x57-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/2015/apple-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/2015/apple-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/2015/apple-icon-144x144-precomposed.png" />

	<?php
		$min = $environment == 'development'? '' : '.min';

		$styleSheets = array(
			'modern',
			'ie9',
			'ie8'
		);

		foreach ($styleSheets as $browser) {
			echo '
			'.$loadIn[$browser]['before'].'
				<link rel="stylesheet" type="text/css" href="'.$rootLocation.'/assets/css/'.$browser.$min.'.css" />
			'.$loadIn[$browser]['after'];
		}
 	?>

	<!--Google analytics-->
	<script>
		/*
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-XXXXXXXX-XX', 'auto');//UA-XXXXXXXX-XX is replaced with Google analitics ID
		ga('send', 'pageview');
		*/
	</script>

	<!--Modernizr (includes HTML Shiv)-->
	<script src="<?php echo $rootLocation; ?>/assets/js/generated-JS/modernizr.min.js"></script>

</head>


<body class="<?php
	echo $body_classes;
	if ($isHome) { echo ' home'; }
	echo $isLoggedIn ? ' logged-in' : ' logged-out';
	echo ' '.(defaultTo($theme, 'theme--light'));//remove this line if you aren't using themes in your site
?>">

	<!-- I've found the <noscript> tag to not always work properly -->
    <div class="alert alert--nojs alert--error TK-jsHide">
    	<p>Please <a href="http://www.enable-javascript.com/">enable javascript</a> to access the full functionality of this site</p>
    </div>

	<div class="screenFader TK-hide" data-jshook="screenFader"></div>

	<?php /* prevents unwanted horizontal scroll bars caused by .grid--gutter-# classes */ ?>
	<div class="siteContainer">
		<div class="skipLinks">
			<!-- prototype only -->
			<a href="#" class="skipLinks__link TK-skipLink" data-jshook="protoTemplates__trigger">Show template shortcuts</a>
			<!-- end prototype only -->

			<a href="#contentStart-sideNav" class="skipLinks__link TK-skipLink" data-jshook="skipLinks__skipToNav skipLinks__link">Skip to side navigation</a>
			<a href="#contentStart-1" class="skipLinks__link TK-skipLink" data-jshook="skipLinks__link">Skip to content</a>
		</div>

		<?php include $module.'protoTemplates.php'; ?>

		<div class="siteContainer__inner remodal-bg" data-jshook="siteContainer">

			<?php
				include $module.'siteHeader.php';
			?>


			<div class="siteMain TK-pageWidth TK-relative">
