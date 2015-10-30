<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>In 2014&ndash;15, we started developing a three-year Diversity and Inclusion Strategy, a key initiative identified in the 2014&ndash;17 people strategy. Development involved consultation sessions with staff across the Department and the development of a number of actions plans to support implementation.</p>
    <p>The Strategy identifies the strategic priorities that drive our direction in three key areas:</p>
    <ol>
        <li>Promoting and supporting diversity amongst employees.</li>
        <li>Leveraging the diversity of our workforce to enhance the quality of policy advice and services.</li>
        <li>Demonstrating how digital technologies and communications services can enhance diversity and inclusion across the Australian Public Service.</li>
    </ol>
    <p>Work will continue in 2015&ndash;16 to make sure our workforce reflects, respects and benefits from diversity.</p>
    <p>From June 2015, Commonwealth departments and agencies must report the number of ongoing and non-going employees for the current and preceding year who identify as Indigenous. In 2013&ndash;14, we had four ongoing and nil non-going employees who identified as Indigenous, and in 2014&ndash;15 we had three ongoing and nil non-going employees who identified as Indigenous.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
