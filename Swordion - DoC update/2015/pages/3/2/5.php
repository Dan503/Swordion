<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>Workforce planning metrics and analysis have been provided regularly to the Executive Leadership Team and have been used to inform planning and decision-making as we transitioned into a new organisational structure in September 2014. We implemented a new strategy that reduced the layers of management from eight to five, increased spans of control and increased the ratio of staff to managers to between five and seven. All positions in the organisation were designed and measured against the work level standards.</p>
    <p>The new fixed establishment identified the number and types of positions within the structure. This ensured  the allocation of resources to align with our strategic direction and meet business priorities.</p>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
