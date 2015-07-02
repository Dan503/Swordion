<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

//the longer the array, the deeper the nav item
$GLOBALS['location'] = array(1, 0);

include '02-base/body.php';

$modulePath = '01-modules/siteMain/';

$modulePath_internalBody = $modulePath.'internalBody/';

include $modulePath.'breadcrumb.php';

?>



<?php include '02-base/foot.php'; ?>
