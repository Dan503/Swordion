<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>We have maintained our commitment to continuing and improving our environmental performance through a number of initiatives. These included:</p>
    <ul>
        <li>Recycling lamps containing mercury by signing up to the FluoroCycle scheme.</li>
        <li>Continued organic waste recycling of biodegradable materials and food waste.</li>
        <li>Reduction of paper towel usage in washrooms with the introduction of hand dryers.</li>
    </ul>
    <p>These initiatives have allowed us to minimise our environmental footprint. We also considered the environment in our procurement activities by making sure office equipment and whitegoods were replaced with energy efficient models.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
