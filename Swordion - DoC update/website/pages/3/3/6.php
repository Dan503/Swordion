<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>Our procurement policies, processes and practices are consistent with the (<?php infoTip('PGPA', 'Public Governance and Performance Accountability Act 2013') ?> 
 Act) and the Commonwealth Procurement Rules (CPRs). Appropriate controls are in place to make sure procurement is carried out in accordance with the CPRs. These controls also help identify potential areas for improvement. </p>
    <p>We publish procurement activities and annual procurement plans on AusTender. Information on expected procurement activities in 2014&ndash;15 is included in our latest annual procurement plan and is also available on AusTender. </p>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
