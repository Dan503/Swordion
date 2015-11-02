<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>Key components of our corporate governance and performance framework include:</p>
    <ul>
        <li>management committees</li>
        <li>the Corporate Plan and business-planning framework</li>
        <li>risk and business continuity management frameworks</li>
        <li>financial and people management frameworks</li>
        <li>internal and external audit</li>
        <li>performance monitoring and reporting.</li>
    </ul>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
