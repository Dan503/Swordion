<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>We support small business participation in the Commonwealth Government procurement market. Small and Medium Enterprises (SME) and Small Enterprise participation statistics are available on the <a href="http://www.finance.gov.au/procurement/statistics-on-commonwealth-purchasing-contracts/">Department of Finance’s website</a>.</p>

<p>We recognise the importance of ensuring that small businesses are paid on time. The results of the Survey of Australian Government Payments to Small Business are available on the <a href="http://www.treasury.gov.au/">Treasury’s website</a>.</p>

<p>We have has met government policy requirements in terms of supporting small and medium sized enterprises in a number of ways:</p>
    <ul>
        <li>Where procurements are considered low risk and their value is below the procurement threshold of $80,000 (GST inclusive), a streamlined process is encouraged and the supplier is engaged using a purchase order as the agreement in lieu of a more formal arrangement.</li>
        <li>We are phasing in the use of the Commonwealth Contracting Suite for low risk procurements valued under $200,000 (GST inclusive).</li>
        <li>Our financial management information system facilitates the payment of invoices on time and provides reports supporting this goal if invoices have not been paid within a certain period of time.</li>
        <li>For procurements valued under $10,000 (GST inclusive) we encourage the use of payment by credit card.</li>
        <li>Approach to market documentation developed by us is clear and straightforward in order to help potential suppliers produce a response that does not require extensive time and effort.   </li>
    </ul>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
