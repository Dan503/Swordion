<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>In 2014&ndash;15, a revised Reward and Recognition programme was launched. #thankyou encourages our staff to recognise and reward each other when they see the demonstration of our desired values, behaviours and high performance standards. In addition, formal recognition occurs through the Australia Day Awards and an Annual Secretary&rsquo;s Award. Four team and two individual awards were presented at the Australia Day Awards in January 2015. </p>
    <p>The individual awards were for working innovatively and collaboratively in leading the development of the NationalMap, and for sustained leadership and commitment to excellence in delivering a number of key projects and developing staff capabilities.</p>
    <p>Team awards were presented to staff who were involved in the Restack and Retune programme, the ABC and SBS Efficiency Study, developing the Government response to the Vertigan Review, and the Telstra and Optus negotiations.</p>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
