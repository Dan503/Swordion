<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>


<h3>Outcome 1 Strategy</h3>
       <p>We delivered our outcome through a single programme: Digital Technologies and Communications Services.</p>
    <p>Our strategy for delivering the outcome was to provide strategic advice on, and administer projects and initiatives, to:</p>
    <ul>
        <li>Enhance digital productivity&mdash;advising the Government on the opportunities arising from the innovative adoption and use of digital technologies, and supporting government, business and the community to maximise these opportunities.</li>
        <li>Expand digital infrastructure&mdash;advising the Government on the necessary market settings to deliver competitive and efficient digital infrastructure to drive growth in the broader economy.</li>
        <li>Promote efficient communications markets&mdash;advising the Government on the necessary market settings to promote competition, while ensuring access to basic services, making available socially valuable content, and safeguarding consumers from inappropriate content.</li>
    </ul>
<p>This outcome is supported through research to identify, assess and explain developments in digital technologies and communications networks and services.</p>

<?php mainContentPiece('mid'); ?>

<?php

    sidebar(array(
		array(
			'blockType' => 'highlight',
            'icon' => 'devices',
			'altText' => 'icon of various portable devices',
            'text' => 'So all Australians can realise the full potential of digital technologies and communications services'
		)
    ));
?>


<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
