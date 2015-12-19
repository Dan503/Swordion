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
		$title = defaultTo($getCurrent['altTitle'], $getCurrent['title']);
        if ($isHome == true) {
			print strip_tags($title);
        } else {
			print strip_tags($title) . ' | Website name goes here';
        }
	?></title>

	<?php
		$socialDescription = strip_tags(defaultTo($getCurrent['intro'], $getCurrentSection['intro']));
		echo '<meta name="description" content="'.$socialDescription.'" />';
	?>

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<?php $shareTitle = ($isHome) ? 'Department of Communications 2014-15 Annual Report' :  strip_tags($getCurrent['title']) . ' | Department of Communications 2014-15 Annual Report'; ?>

	<!-- facebook meta data -->
	<meta property="og:title" content="<?php echo $shareTitle; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo $currentURL; ?>" />
	<meta property="og:image" content="<?php echo $rootLocation; ?>/assets/images/design/share-thumbnail.jpg" />
	<meta property="og:description" content="<?php echo $socialDescription; ?>" />

	<!-- twitter meta data -->
	<meta name="twitter:site" content="<?php $currentURL; ?>">
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

	<!--Modernizr-->
	<script src="<?php echo $rootLocation; ?>/assets/js/vendor-JS/modernizr.2.8.3.min.js"></script>

	<!-- Allows IE8 to style HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->

</head>


<body class="<?php
	echo $body_classes;
	if ($isHome) { echo ' home'; }
	echo ($isLoggedIn ? ' logged-in' : ' logged-out');
	echo ' '.(defaultTo($theme, 'theme--light'));
?>">

	<!-- I've found the <noscript> tag to not always work properly -->
    <div class="alert alert--nojs alert--error TK-jsHide">
    	<p>Please <a href="http://www.enable-javascript.com/">enable javascript</a> to access the full functionality of this site</p>
    </div>

	<div class="screenFader" data-jshook="screenFader"></div>

	<?php /* prevents unwanted horizontal scroll bars caused by .grid--gutter-# classes */ ?>
	<div class="TK-overflowHidden">

		<div class="siteContainer remodal-bg TK-clearFix" data-jshook="siteContainer">
			<div class="skipLinks">
				<a href="#contentStart-sideNav" class="skipLinks__link TK-skipLink" data-jshook="skipLinks__skipToNav skipLinks__link">Skip to side navigation</a>
				<a href="#contentStart-1" class="skipLinks__link TK-skipLink" data-jshook="skipLinks__link">Skip to content</a>
			</div>

			<?php
				include $include['module'].'siteHeader.php';
			?>


			<div class="siteMain TK-pageWidth TK-relative">