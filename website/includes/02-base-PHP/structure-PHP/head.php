
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">

    <title><?php
        if ($isHome == true) {
			print strip_tags($getCurrent['title']);
        } else {
			print strip_tags($getCurrent['title']) . ' | Department of Communications 2014-15 Annual Report';
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