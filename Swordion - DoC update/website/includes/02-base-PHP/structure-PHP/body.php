<?php
	include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/config.php';
?>


<!doctype html>


	<!-- Web Design & Development by Reading Room -->
	<!-- www.readingroom.com.au (02) 6229 9400 -->

<!-- http://www.paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 8]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<?php



//Holds the site <head> tag (mostly metadata)
	include 'head.php';


?>

<body class="<?php
	echo $body_classes;
	if ($isHome) { echo ' home'; }
	echo ($isLoggedIn ? ' logged-in' : ' logged-out');
?>">

	<!-- I've found the <noscript> tag to not always work properly -->
    <div class="alert alert--nojs alert--error TK-jsHide">
    	<p>Please <a href="http://www.enable-javascript.com/">enable javascript</a> to access the full functionality of this site</p>
    </div>

	<div class="screenFader" data-jshook="screenFader"></div>

	<?php /* prevents unwanted horizontal scroll bars caused by .grid--gutter-# classes */ ?>
	<div class="TK-overflowHidden">

		<div class="siteContainer remodal-bg" data-jshook="siteContainer progressBar__tracker<?php if($isHome) echo ' autoScroll__reference'; ?>">
			<div class="skipLinks">
				<a href="#contentStart-sideNav" class="skipLinks__link TK-skipLink" data-jshook="skipLinks__skipToNav skipLinks__link">Skip to side navigation</a>
				<a href="#contentStart-1" class="skipLinks__link TK-skipLink" data-jshook="skipLinks__link">Skip to content</a>
			</div>


			<?php include $modules_headerTools.'00-headerTools.php'; ?>

			<?php include $modules.'socialShare.php'; ?>

			<div class="siteContainer__inner TK-relative<?php
				echo $isLanding? ' siteContainer__inner--gradient' : '';
			?>"<?php
				echo $isLanding? ' data-jshook="fullScreen__filler" data-fullscreen-subtract="60"' : '';
			?>>
				<?php if ($isHome){
					include $modules_home.'homeBGassets.php';
				} ?>

				<?php if ($isLanding){ ?>
					<div class="landingTri">
						<div class="landingTri__inner"></div>
					</div>
				<?php } ?>

				<?php if ($isInternal){ ?>
					<div class="decorativeSideTri">
						<div class="decorativeSideTri__triangle">
							<div class="decorativeSideTri__border"></div>
						</div>
					</div>

					<div class="decorativeBaseTri"></div>
				<?php
						include $modules.'internalHeader.php';
					}
				?>


				<div class="siteMain<?php
					echo !$isHome ? ' TK-pageWidth' : '';
				?>"<?php
					echo $isInternal ? ' data-jshook="headerTransform__scrollTrigger"' : '';
				?>>
