<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>
    <p>In 2014&ndash;15, we requested 28 security clearances from the Australian Government Security Vetting <?php infoTip('Agency', 'Agencies are Departments of State, Departments of Parliament and &rsquo;prescribed agencies&rsquo; for the purposes of the Financial Management and Accountability Act 1997. Where the term is used generally in this document, it is meant to refer to departments, agencies, authorities and non&mdash;commercial companies') ?> 
. Due to the support services we provide to <?php infoTip('TUSMA', 'Telecommunications Universal Service Management Agency') ?> 
, it included clearances for staff from this agency.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
