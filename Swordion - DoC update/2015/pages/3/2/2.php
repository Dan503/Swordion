<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <?php heading(1); ?>
    <p>We faced a unique challenge in supporting managers and staff following the restructure. Our People Strategy was focused on enhancing our strategic policy, people and team management capabilities. Training programmes included policy, analytical and writing skills, micro and macroeconomics, statistical analysis, having quality conversations, project management, team building and effectiveness and Team Management Systems workshops.</p>
    <p>A greater focus through our performance management conversations process on the identification and development of capability using the 70|20|10 approach to learning through education, exposure and experience was successfully implemented. A range of online learning resources was launched to support these initiatives.</p>
    <?php heading(2); ?>
    <p>Training in core skills is provided for all staff. In 2014&ndash;15, key priority areas included policy, economics, analytics, written communications skills, project management, enhancing performance through conversations and managing underperformance. Middle managers also took part in the Essentials for Managing Staff programme.</p>
    <p>We launched a range of online learning resources in 2014&ndash;15 to support the implementation of the Capability Development Strategy, focused on development through education, exposure and experience. We implemented our learning management system with enhanced e-learning courses and online resources in July 2015.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
