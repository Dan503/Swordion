<!doctype html>


	<!-- Web Design & Development by Reading Room -->
	<!-- www.readingroom.com.au (02) 6229 9400 -->

<!-- http://www.paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 8]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<?php
	//sets the php error reporting configuration for the site to be less fussy about undefined variables
	ini_set('error_reporting','E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE');

	//Set errors to this for debugging
	//ini_set('error_reporting','ALL');
?>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">

    <title><?php
        if ($home == true) print 'Swordion Starter Kit';
        else print $page_title . ' | Website name goes here' ?>
    </title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- favicon -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<!--[if gt IE 8]><!-->
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
	<?php /* Minified CSS (For use during production phase)
		<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css" />
	*/?>
	<!--<![endif]-->

	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="/assets/css/style-lt-ie9.css" />
	<![endif]-->

	<?php /* Minified CSS (For use during production phase)
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="/assets/css/style-lt-ie9.min.css" />
	<![endif]-->
	*/ ?>

	<script src="/assets/js/vendor/_modernizr.2.7.1.min.js"></script>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/_html5.js"></script>
		<script src="/assets/js/plugins/conditional/_selectivizr.min.js"></script>
	<![endif]-->
	<!-- 1. Allows IE to style HTML5 elements -->
	<!-- 2. Allows IE to use CSS3 selectors (eg. :nth-child(odd) ) -->
	<?php /* I haven't seen selectivizr work yet :( */ ?>

</head>
<body class="<?php echo $body_classes ?> theme-dark">

	<!-- I've found the <noscript> tag to not always work properly -->
    <div class="noscript-message jsHide">
    	<p>Please <a href="http://www.enable-javascript.com/">enable javascript</a> to access the full functionality of this site</p>
    </div>

	<div id="siteContainer" class="container">
		<div id="skipLinks">
			<a href="#contentStart" class="vh focusable" title="">Skip to content</a>
		</div>
		<header>

				<div class="wrapper">
					<h2 id="logo">Logo</h2>
				</div>
				<!-- @.wrapper-->

		</header>
		<!-- @#siteheader-->
