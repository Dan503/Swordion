
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">

<?php
	//sets the page title for the current page
	if (isset($nav_tertiary) && $nav_tertiary >= 0){
		$pageTitle =
			$navigationMap
				[$nav_primary]
				['subNav']
				[$nav_secondary]
				['subNav']
				[$nav_tertiary]
				['text'];
	} else if (isset($nav_secondary) && $nav_secondary >= 0){
		$pageTitle =
			$navigationMap
				[$nav_primary]
				['subNav']
				[$nav_secondary]
				['text'];
	} else {
		$pageTitle =
			$navigationMap
				[$nav_primary]
				['text'];
	}
?>

    <title><?php
        if ($home == true) {
			print 'Home Page welcome message';
        } else {
			print $pageTitle . ' | Swordion';
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
			if ($environment == 'development') {
				//Unminified css for development phase
				echo '<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />';
			} else if ($environment == 'production') {
				//Minified CSS (for use during production phase)
				echo '<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css" />';
			}
		?>
	<!--<![endif]-->

	<?php
		if ($environment == 'development') {
			//Unminified css for development phase
			echo
			'<!--[if lt IE 9]>
				<link rel="stylesheet" type="text/css" href="/assets/css/style-lt-ie9.css" />
			<![endif]-->';
		} else if ($environment == 'production') {
			//Minified CSS (for use during production phase)
			echo
			'<!--[if lt IE 9]>
				<link rel="stylesheet" type="text/css" href="/assets/css/style-lt-ie9.min.css" />
			<![endif]-->';
		}
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