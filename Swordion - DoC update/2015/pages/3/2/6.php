<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');


include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>The Secondment Programme has been implemented to build internal capability and knowledge, provide capability development for those with high potential and emerging talent, and enhance organisational relationships and connections government departments and agencies, and with our portfolio agencies.</p>
    <p>During the reporting period, the Department of the Prime Minister and Cabinet, Australian Competition and Consumer Commission, Australian Trade Commission, NBN Co, Australian Communications and Media Authority and the Digital Transformation Office participated in the Secondment Programme.</p>
    
    <p>The Programme offers a chance to increase internal capability through better understanding portfolio and commercial issues, and building relationships with key stakeholders. It is proposed it will expand to include placements in the broader <?php infoTip('APS', 'Australian Public Service') ?> 
 and industry.</p>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
