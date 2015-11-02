<?php
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	$location = array(0, 5);

	include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';
?>

	<?php mainContentPiece('top'); ?>

	<p>Sorry, this page doesn&rsquo;t exist. Please check that the URL is correct or <a href="javascript:history.go(-1)">return to the previous page</a>.</p>

	<?php mainContentPiece('mid'); ?>
	<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
