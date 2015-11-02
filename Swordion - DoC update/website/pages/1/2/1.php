<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>


    <p>The Department of Communications promotes an innovative and competitive communications sector so Australians can realise the full potential of digital technologies and communications services.</p>

    <p>We are the Government&rsquo;s pre-eminent advisor on communications, in particular digital technologies and communications services.</p>

    <p>Our four strategic priorities, as outlined in the <?php infoTip('Corporate Plan 2014&ndash;17', 'The 2014&ndash;17 Corporate Plan has been updated to comply with Public Governance, Performance and Accountability Act requirements and environmental developments since 2013. From 15 September 2015, our Corporate Plan is renamed as 2015&ndash;19 Corporate Plan') ?> , are as follows:</p>
    <ul>
        <li><?php heading(1); ?> Rapid technological change is transforming the economy, with significant implications for productivity, competition and innovation. The speed and success with which certain sectors, and the economy as a whole, can adopt these technologies is of increasing importance to our national prosperity. We advise the Government on opportunities arising from the innovative adoption and use of digital technologies.</li>
        <li><?php heading(2); ?> Australia&rsquo;s economy and security increasingly relies on the availability and integrity of digital infrastructure, communications networks and systems. We advise the Government on the necessary market settings to deliver competitive and efficient digital infrastructure to drive growth in the broader economy.</li>
        <li><?php heading(3); ?> We advise the Government on the necessary market settings to promote competition, while ensuring access to basic services, making available socially valuable content, and safeguarding consumers from inappropriate content.</li>
        <li><?php heading(4); ?> To be the Government&rsquo;s pre-eminent advisor on digital technologies and communications services we must possess strong capabilities in leadership, strategy and delivery.</li>
    </ul>

    <p>We are guided by the <a href="http://www.apsc.gov.au/aps-employment-policy-and-advice/aps-values-and-code-of-conduct/aps-values">Australian Public Service Values</a>, which underpin our work and are demonstrated in our workplace behaviours and <a href="https://www.communications.gov.au/who-we-are/department/client-service-charter">Client Service Charter</a>.</p>

<?php mainContentPiece('mid'); ?>

<?php

    sidebar(array(
		array(
			'blockType' => 'nav',
            'navType' => 'desktopOnly'
		), array(
			'blockType' => 'highlight',
            'icon' => 'review',
			'altText' => 'icon of an eye looking over work',
            'text' => 'Increase staff ownership of and accountability for their work'
		),array(
			'blockType' => 'twitter',
			'text' => 'See how #CommsAu have successfully delivered a major policy and programme agenda',
		), array(
			'blockType' => 'highlight',
            'icon' => 'strength',
			'altText' => 'icon of a strong arm flexing',
            'text' => 'The capability review found our Department has a range of strengths, including a collegiate, dedicated workforce'
		), array(
			'blockType' => 'moreInfo',
            'text' => 'Corporate Plan 2015-19',
            'btnText' => 'See the Corporate Plan',
            'link' => 'https://www.communications.gov.au/who-we-are/department/corporate-plan'
		)
    ));
?>


<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
