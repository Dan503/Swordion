<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <p>In 2014&ndash;15, we consolidated all existing programmes from 2013&ndash;14 into a single programme: Digital Technologies and Communications Services. This reflected a restructure of our Department to better address the strategic priorities and directions in our <a href="http://www.communications.gov.au/about_us#corpplan"><?php infoTip('Corporate Plan 2014&ndash;17', 'The 2014&ndash;17 Corporate Plan has been updated to comply with Public Governance, Performance and Accountability Act requirements and environmental developments since 2013. From 15 September 2015, our Corporate Plan is renamed as 2015&ndash;19 Corporate Plan') ?> </a>.</p>

    <?php heading(1); ?>
    <p>Table 1.1 Outcome and programme structure in 2014&ndash;15</p>
    <table>
        <thead>
            <tr>
                <th>
                    <p>2014&ndash;15 Portfolio Budget Statements</p>
                </th>
                <th>
                    <p>2014&ndash;15 Portfolio Additional Estimates Statements</p>
                </th>
                <th>
                    <p>2014&ndash;15 Portfolio Supplementary Additional Estimates Statements</p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p><strong>Outcome 1: </strong></p>
                    <p>Promote an innovative and competitive communications sector, through policy development, advice and programme delivery, so all Australians can realise the full potential of digital technologies and communications services.</p>
                </td>
                <td>
                    <p>No change</p>
                </td>
                <td>
                    <p>No change</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong>Programme 1.1 Digital Technologies and Communications Services:</strong></p>
                    <p>To provide strategic advice on and administer projects and initiatives, to:</p>
                    <ul>
                        <li>enhance digital productivity&mdash;advising Government on the opportunities arising from the innovative adoption and use of digital technologies, and supporting government, business and the community to maximise these opportunities</li>
                        <li>expand digital infrastructure&mdash;advising Government on the necessary market settings to deliver competitive and efficient digital infrastructure to drive growth in the broader economy</li>
                        <li>promote efficient communications markets&mdash;advising Government on the necessary market settings to promote competition, while ensuring access to basic services, making available socially valuable content, and safeguarding consumers from inappropriate content.</li>
					</ul>
                    <p>This is supported through research to identify, assess and explain developments in digital technologies and communications networks and services.</p>
                </td>
                <td>
                    <p>No change</p>
                </td>
                <td>
                    <p>No change</p>
                </td>
            </tr>
        </tbody>
    </table>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?> 

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
