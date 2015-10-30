<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>
<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>Following our participation in the <?php infoTip('APS', 'Australian Public Service') ?> 
 Telework Trial, which ended in January 2014, and the Working from Anywhere Pilot, carried out between 1 May 2014 and 25 June 2014, we continue to actively drive the initiative of being a more flexible and mobile workforce.</p>
    <p>Flexible working helped us provide best-in-class arrangements that increase workforce agility and flexibility and give employees the ability to improve their work-life balance. Supported by effective and innovative use of leading edge ICT, we have the opportunity to be an APS leader in this area. </p>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
