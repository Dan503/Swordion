<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>Throughout 2014&ndash;15, the Hon Malcolm Turnbull MP served as the Minister for Communications and the Hon Paul Fletcher MP served as his Parliamentary Secretary.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
