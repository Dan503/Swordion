
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">

    <title><?php
        if ($isHome == true) {
			print 'Home Page welcome message';
        } else {
			print strip_tags($pageTitle) . ' | Swordion';
        }
	?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- favicon -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<!-- touch screen home icon -->
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/apple-icon-57x57-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-icon-144x144-precomposed.png" />

	<?php
		//$environment = 'production';
		$environment = 'development';
	?>

	<!--[if gt IE 8]><!-->
		<?php
			$modern = $environment == 'development'? 'modern' : 'modern.min';
			echo '<link rel="stylesheet" type="text/css" href="/assets/css/'.$modern.'.css" />';
		?>
	<!--<![endif]-->

	<?php
		$legacy = $environment == 'development'? 'lt-ie9' : 'lt-ie9.min';
		echo
		'<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="/assets/css/'.$legacy.'.css" />
		<![endif]-->';
 	?>

	<script src="/assets/js/vendor/_modernizr.2.7.1.min.js"></script>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/_html5.js"></script>
		<script src="/assets/js/plugins/conditional/_selectivizr.min.js"></script>
	<![endif]-->
	<!-- 1. Allows IE to style HTML5 elements -->
	<!-- 2. Allows IE to use CSS3 selectors (eg. :nth-child(odd) ) -->
	<?php /* I haven't seen selectivizr work yet :( */ ?>

</head>