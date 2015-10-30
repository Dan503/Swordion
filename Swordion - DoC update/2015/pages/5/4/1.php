<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php
	sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop')));
?>

<?php mainContentPiece('top'); ?>

    <p>In the 2014&ndash;15 financial year, the Department paid a total of $4,823,311.88 GST inclusive to:</p>
     <?php heading(1); ?>
    <table>
        <thead>
            <tr>
                <th>Organisation name</th>
                <th>Purpose</th>
                <th>Amount of payment</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>BMF</td>
                <td>Creative services for Retune</td>
                <td>376,099.41</td>
            </tr>
            <tr>
                <td>Dentsu Mitchell Media Australia</td>
                <td>Awareness campaign (MyBroadband)</td>
                <td>17,296.13</td>
            </tr>
            <tr>
                <td><strong>Total advertising agencies</strong></td>
                <td><strong></strong></td>
                <td><strong>393,395.53</strong></td>
            </tr>
        </tbody>
    </table>
     <?php heading(2); ?>
    <table>
        <thead>
            <tr>
                <th>Organisation name</th>
                <th>Purpose</th>
                <th>Amount of payment</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Orima</td>
                <td>Market research for Retune</td>
                <td>476,135.00</td>
            </tr>
            <tr>
                <td>Essence Communications Australia</td>
                <td>Stakeholder research for the Bureau of Communications Research and market research for Stay Smart Online</td>
                <td>33,000.00</td>
            </tr>
            <tr>
                <td>Taylor Nelson Sofres Australia</td>
                <td>Market research for Online Copyright</td>
                <td>37,422.00</td>
            </tr>
            <tr>
                <td>Newspoll</td>
                <td>Market research for Do not Call Register</td>
                <td>14,049.20</td>
            </tr>
            <tr>
                <td><strong>Total market research organisations</strong></td>
                <td><strong></strong></td>
                <td><strong>560,606.20</strong></td>
            </tr>
        </tbody>
    </table>
      <?php heading(3); ?>
    <table>
        <thead>
            <tr>
                <th>Organisation name</th>
                <th>Purpose</th>
                <th>Amount of payment</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dentsu Mitchell Media Australia</td>
                <td>Media buy for Retune</td>
                <td>3,797,682.71</td>
            </tr>
            <tr>
                <td>Mediabrands Australia Pty Ltd</td>
                <td>Media buy for Retune</td>
                <td>71,627.44</td>
            </tr>
            <tr>
                <td><strong>Total media advertising</strong></td>
                <td><strong></strong></td>
                <td><strong>3,869,310.15</strong></td>
            </tr>
        </tbody>
    </table>
    <p>During 2014&ndash;15, the Department conducted the following advertising campaign: Retune. Further information on this advertising campaign is available at <a href="http://www.communications.gov.au">www.communications.gov.au</a> and in the reports on Australian Government advertising prepared by the Department of Finance. These reports are available at <a href="http://www.finance.gov.au/advertising/index.html">www.finance.gov.au/advertising/index.html</a>.</p>

<p><?php echo fileLink('Download the word document version', '/downloads/Template-Appendix-4-Advertising-and-market-research-2014-15.docx') ?>.</p>


<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?>

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
