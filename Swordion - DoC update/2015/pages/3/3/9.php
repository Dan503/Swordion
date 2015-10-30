<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>During 2014&ndash;15, each competitively tendered contract of $100,000 or more (inclusive of GST) included a provision that allowed the Auditor-General access to the premises of the contractor.</p>
    <?php heading(1); ?>
    <p>During 2014&ndash;15, no contracts or standing offers were exempted by the Secretary from being published on AusTender on the basis they would disclose matters exempt under the <em>Freedom of Information Act 1982</em>.</p>
    <?php heading(2); ?>
    <p>We administer the following grant programmes:</p>
    <ul>
    <li>Community Broadcasting</li>
    <li>Consumer Representation Grants</li>
    <li><?php infoTip('Digital Hubs', 'Operating in 40 communities since 2012, this Programme had provided a place where people could go to get help to improve their digital literacy skills by attending free group training, or seeking one-on-one assistance. It ended on 30 June 2015') ?> 
</li>
    <li>Digital Enterprise</li>
    <li>Digital Local Government</li>
    <li>Digital Business Kits</li>
    <li>Digital Careers</li>
    <li>ICT Centre of Excellence&mdash;National ICT Australia</li>
    <li>Spectrum Restacking</li>
    <li>Electronic News Gathering</li>
    <li>Viewer Access Satellite Television</li>
    <li>Regional Equalisation Plan</li>
    <li>Townsville <?php infoTip('NBN', 'National Broadband Network') ?> 
-Enabled Diabetes Telehealth Trial Extension</li>
    </ul>
    <p>Information on grants awarded by the Department during the period 1 July 2014 to 30 June 2015 is available on our website at <a href="http://www.communications.gov.au/who-we-are/department/funding-reporting">www.communications.gov.au/who-we-are/department/funding-reporting</a>.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
