<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

//the longer the array, the deeper the nav item
$location = array(1, 0);

$sidebarHas = array(
	'related' => false,
);

include '02-base/structure/body.php';

breadcrumb();

?>

<h1><?php echo $pageTitle ?></h1>

<?php include '02-base/structure/foot.php'; ?>
