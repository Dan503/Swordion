<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>The Office of the General Counsel provided legal advice on many relevant portfolio issues and transactions. The Deregulation Unit established within the Department is in this Division.</p>
    <p>The Office provided advice on a wide variety of matters including:</p>
    <ul>
        <li>National Broadband Network negotiations</li>
        <li>deregulation reforms</li>
        <li>integration of the Telecommunications Universal Service Management <?php infoTip('Agency', 'Agencies are Departments of State, Departments of Parliament and &rsquo;prescribed agencies&rsquo; for the purposes of the Financial Management and Accountability Act 1997. Where the term is used generally in this document, it is meant to refer to departments, agencies, authorities and non&mdash;commercial companies') ?> 
 (<?php infoTip('TUSMA', 'Telecommunications Universal Service Management Agency') ?> 
) into the Department</li>
        <li>departmental procurement and grants contracts</li>
        <li><?php infoTip('FOI', 'Freedom of Information') ?> 
</li>
        <li>creation of the Children&rsquo;s e-Safety Commissioner</li>
        <li>creation of the mobile black spot programme.</li>
    </ul>
    <p>During 2014&ndash;15, the Office of the General Counsel provided input on 10 bills and 29 legislative instruments. Appendix 2 provides further details about legislation.</p>
    <?php heading(1); ?>
    <p>The Australian Government has committed to reduce excessive regulation by $1 billion per year to boost productivity and provide businesses the flexibility to innovate in a globally competitive market. In 2014, significant progress was made with the announcement of over 50 measures aimed at removing the burden of red tape and onerous regulation in the communications sector.</p>
    <p>These initiatives are expected to generate cumulative savings of over $94 million for businesses and consumers, and result in over 3,400 pages of redundant or obsolete regulation being cleared from the statute books. These reforms were achieved through legislation and initiatives implemented by the Australian Communications and Media Authority.</p>
    <p>These measures included reforms such as simplifying local number portability for consumers and industry, exempting classes of commercial broadcast licensees form the requirement to submit audited balance sheets and profit/loss accounts, introducing indefinite registration on the Do-Not-Call Register to benefit over 10 million consumers, and removing unnecessary compliance, reporting and recording keeping requirements across the broadcasting and telecommunications sectors.</p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
