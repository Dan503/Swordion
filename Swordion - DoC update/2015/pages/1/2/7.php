<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>


    <p>As at 30 June 2015, the Communications portfolio included:</p>
    <ul>
        <li>Australia Post</li>
        <li>Australian Broadcasting Corporation (ABC)</li>
        <li>The Australian Communications and Media Authority (the <?php infoTip('ACMA', 'Australian Communications and Media Authority') ?> 
)</li>
        <li><?php infoTip('NBN', 'National Broadband Network') ?>
 Co Limited (NBN Co)</li>
        <li>Special Broadcasting Service Corporation (SBS)</li>
        <li>Telecommunications Universal Service Management <?php infoTip('Agency', 'Agencies are Departments of State, Departments of Parliament and &rsquo;prescribed agencies&rsquo; for the purposes of the Financial Management and Accountability Act 1997. Where the term is used generally in this document, it is meant to refer to departments, agencies, authorities and non&mdash;commercial companies') ?> 
 (<?php infoTip('TUSMA', 'Telecommunications Universal Service Management Agency') ?> 
).</li>
    </ul>
    <p>On 23 January 2015, the Prime Minister and Minister for Communications announced a Digital Transformation Office (<?php infoTip('DTO', 'Digital Transformation Office') ?> 
) would be created in the Communications portfolio. It was formally established as an executive agency on 1 July 2015.</p>
    <p>The transfer of the functions of TUSMA into our Department was announced in the 2014&ndash;15 Budget. In 2014&ndash;15, we worked with TUSMA to permanently transfer staff and functions into the Department effective 1 July 2015.</p>

    <?php heading(1); ?>
    <p>Australia Post is a Government Business Enterprise, wholly owned by the Australian Government. It provides a high-quality mail and delivery service to all Australians and a range of parcel and logistics services.</p>
    <p>We advised on the postal sector and protection of the Government&rsquo;s interest as a shareholder of Australia Post.</p>
    <p>Website <a href="http://www.auspost.com.au">www.auspost.com.au</a></p>

    <?php heading(2); ?>
    <p>The ABC is a national broadcaster. It contributes to and reflects Australia's national identity, fosters creativity and the arts and encourages cultural diversity. The ABC is an integral part of the radio, television and online production industries and the news and information media.</p>
    <p>We supported the Minister with advice on ABC policy and funding matters, the availability and rollout of ABC services, and ABC Board appointments.</p>
    <p>Website <a href="http://www.abc.net.au">www.abc.net.au</a></p>

    <?php heading(3); ?>
    <p>The ACMA is responsible for regulating broadcasting, radio communications, telecommunications and online content in accordance with legislation. The ACMA works with all stakeholders to maximise the public benefit, including the extent to which the regulatory framework addresses the broad concerns of the community, meets the needs of industry, and maintains community and national interest safeguards.</p>
    <p>We advised the Minister on appropriate consumer safeguards relating to the provision of content and communications services regulated by the ACMA.</p>
    <p>Website <a href="http://www.acma.gov.au">www.acma.gov.au</a></p>

    <?php heading(4); ?>
    <p>NBN Co is a Government Business Enterprise, wholly owned by the Australian Government. Its role is to plan, rollout and operate the National Broadband Network, providing high-speed broadband access to all Australians.</p>
    <p>We were responsible for the implementation of, monitoring of and improvements to the regulatory framework for the National Broadband Network, including regulations applying to NBN operations and Telstra&rsquo;s Structural Separation and Migration Plan.</p>
    <p>Website <a href="http://www.nbnco.com.au">www.nbnco.com.au</a></p>

    <?php heading(5); ?>
    <p>The SBS is a national broadcaster. It provides multicultural and multilingual services that inform, educate and entertain all Australians. Its mission is to contribute to a more cohesive, equitable and harmonious Australia through its television, radio and online services.</p>
    <p>We supported the Minister with advice on SBS policy and funding matters, the availability and rollout of SBS services, and SBS Board appointments.</p>
    <p>Website <a href="http://www.sbs.com.au">www.sbs.com.au</a> </p>

    <?php heading(6); ?>
    <p>TUSMA is responsible for supporting the delivery of universal service and other public interest telecommunications services to all Australians.</p>
    <p>Website <a href="http://www.tusma.gov.au">www.tusma.gov.au</a></p>

<?php mainContentPiece('mid'); ?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'desktopOnly'))); ?>

<?php mainContentPiece('bottom'); ?>

<?php
    caseStudy(array(
        'file' => 'bureau-of-comms-research.php',
        'img' => 'bureau-of-comms-research.jpg',
        'title' => 'Bureau of Communications Research',
        'imgAlt' => 'antenna on a roof',
    ));
?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
