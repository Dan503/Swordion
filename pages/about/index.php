<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

$nav_primary = 1;
$nav_secondary = 2;

include '02-base/body.php';

$modulePath = '01-modules/siteMain/';

$modulePath_internalBody = $modulePath.'internalBody/';

include $modulePath.'breadcrumb.php';

?>



<?php include '02-base/foot.php'; ?>
