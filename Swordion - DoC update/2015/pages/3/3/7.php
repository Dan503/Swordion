<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>We engage consultants to provide specialised professional services when we do not have the capability or capacity to perform these in-house, or where we need independent research, review, assessment or advice. Consultants are typically engaged to investigate or diagnose a specific issue or problem, carry out reviews or evaluations, as well as provide independent advice, information or solutions to help us make decisions.</p>
    <p>Before engaging consultants, we take into account the skills and resources needed for the task, the skills available internally and the cost-effectiveness of engaging external expertise. Our policy for selecting and engaging consultants in 2014&ndash;15 was in accordance with the <?php infoTip('PGPA', 'Public Governance and Performance Accountability Act 2013') ?> 
 Act and the CPRs and based on the core principle of achieving value for money.</p>
    <p>During 2014&ndash;15, 50 new consultancy contracts were entered into involving total actual expenditure of $3.610 million. In addition, 42 ongoing consultancy contracts were active during the 2014&ndash;15 year, involving total actual expenditure of $4.244 million.</p>
    <p>It should be noted that information on contracts and consultancies valued at least $10,000 (GST inclusive) is available through the AusTender website at <a href="http://www.tenders.gov.au">www.tenders.gov.au</a>.</p>
    <h2>Figure 3.2 Expenditure on consultancy contracts from 2012&ndash;15</h2>
    <p><a class="enlargeImg" data-jshook="enlargeImg__trigger" href="#lightbox__figure-3-2" title="Enlarge image"><img src="/2015/assets/images/content/expenditure-on-consultancy-contracts.png" alt="Figure 3.2 Expenditure on consultancy contracts from 2012&ndash;15"></a></p>
<p><?php echo fileLink('Download the full data', '/2015/downloads/ZPO4-1-July-2014-to-30-June-2015.xlsx') ?></p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
