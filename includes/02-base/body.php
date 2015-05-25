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


//adds all php functions
$files = glob($_SERVER['DOCUMENT_ROOT'].'/includes/02-base/functions/*.php', GLOB_BRACE);
foreach($files as $file) {
  include $file;
}

//introduces the navigationMap
	include 'navigationMap.php';

//Holds the site <head> tag (mostly metadata)
	include 'head.php';


?>

<body class="<?php echo $body_classes ?>">

	<!-- I've found the <noscript> tag to not always work properly -->
    <div class="alert alert--nojs alert--error TK-jsHide">
    	<p>Please <a href="http://www.enable-javascript.com/">enable javascript</a> to access the full functionality of this site</p>
    </div>

	<div class="siteContainer">
		<div class="skipLinks">
			<a href="#contentStart" class="skipLinks-link TK-skipLink" title="">Skip to content</a>
		</div>


		<?php include ($_SERVER['DOCUMENT_ROOT'].'/includes/01-modules/siteHeader/00-siteHeader.php'); ?>

		<div class="siteMain width--page">

			<?php if (!$hasSideBar) echo '<a href="javascript:void(0)" id="contentStart"></a>'; ?>
