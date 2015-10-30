<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

// Grab the query string 'q' for the page title and search URL
// Dynamic page title based on search query
$query = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
if(!empty($query)) {
  $pageTitle = 'Search results for <strong>&ldquo;'.htmlspecialchars($query, ENT_COMPAT, 'UTF-8').'&rdquo;</strong>';
}

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php mainContentPiece('top'); ?>

<?php include $modules.'searchResults.php'; ?>

<?php mainContentPiece('mid'); ?>

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
