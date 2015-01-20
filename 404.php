<?php
	ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

	$page_title = '404: Page not found';
	include 'header.php';
?>

				<h1><?php echo $page_title ?></h1>

				<p>Sorry, this page doesn&rsquo;t exist. Please check that the URL is correct or return to a previous page.</p>


<?php include 'footer.php'; ?>