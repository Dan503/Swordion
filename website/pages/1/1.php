<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

$GLOBALS['secretaryImg'] = array(
	'src' => '/2015/assets/images/content/secretary_840px-wide.jpg',
	'altText' => 'Secretary Drew Clarke'
);

include $_SERVER['DOCUMENT_ROOT'].'/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php mainContentPiece('top'); ?>

			    <p>2014&ndash;15 was a year of significant structural change across the portfolio, including within the Department of Communications. These changes responded to the Government&rsquo;s election and other commitments and the rapidly evolving communications sector.</p>
			    <p>We welcomed the Government&rsquo;s initiative to establish a Digital Transformation Office (<?php infoTip('DTO', 'Digital Transformation Office') ?> 
) within our portfolio, given our priority to enhance Australia&rsquo;s digital productivity. The DTO will ensure that government services and information can be delivered digitally from start to finish and better serve the needs of citizens and businesses. The Department assisted in the DTO&rsquo;s formal establishment on 1 July 2015.</p>
    <p>We also assisted the Parliamentary Secretary with the establishment of the Children&rsquo;s e-Safety Commissioner as an independent statutory office within the Australian Communications and Media Authority (the <?php infoTip('ACMA', 'Australian Communications and Media Authority') ?> 
).</p>
			    <p>We managed the transition of the functions of the Telecommunications Universal Service Management Agency (<?php infoTip('TUSMA', 'Telecommunications Universal Service Management Agency') ?> 
) into the Department in line with the Government&rsquo;s smaller government initiative.</p>
			    <p>Within the Department, we realigned our internal operations and our structure to better support our strategic priorities and a rapidly evolving communications environment. We created a Department better able to fulfil our purpose of promoting an innovative and competitive communications sector so all Australians can realise the full potential of digital technologies and communication services.</p>

    <p>Our new structure was put in place in September 2014 and has three policy areas&mdash;Infrastructure, Digital Productivity and Consumer and Content, which cut across traditional industry boundaries&mdash;a Strategy Group to provide cross-divisional oversight, a Corporate Division and an Office of General Counsel.</p>
    <p>We also established the <?php infoTip('Bureau of Communications Research', 'The Department&rsquo;s independent economic and statistical research unit') ?> 
 to improve how the impacts of digitisation on productivity growth in the Australian economy are measured and interpreted. The Bureau will also strengthen the Department&rsquo;s capability for evidence-based policy advice in an increasingly complex environment.</p>
    <p>Our restructure was not without challenge and it says much about the calibre of our staff that during what was an unsettling process, we continued to deliver a major policy and programme agenda.</p>
    <p>Critical to that agenda was supporting the rollout of the National Broadband Network by NBN Co. In 2014&ndash;15, we took part in negotiations to amend commercial arrangements between NBN Co and Telstra, NBN Co and Optus, and between Telstra and the Commonwealth, relating to the National Broadband Network. The amendments accommodate the Government&rsquo;s preferred use of different technologies for the network, including allowing NBN Co to progressively take ownership of Telstra&rsquo;s copper and cable networks and Optus&rsquo; cable network.</p>
    <p>We also worked with NBN Co on deployment principles and a strategic planning approach to determine which technologies are to be used in which area. We provided advice and support to the government-appointed panel of experts in finalising the Independent Cost Benefit Analysis of Broadband and Review of Regulation.</p>
    <p>In December 2014, we called for applications from mobile network operators and specialist infrastructure providers for the Mobile Black Spot Programme. In June 2015, the Minister and Parliamentary Secretary announced that almost 500 new or upgraded mobile base stations would be built around Australia.</p>
    <p>The restack of broadcasting services was completed in November 2014, marking the completion of Australia&rsquo;s conversion to digital only television. Under the restack project, 1,476 free-to-air digital television services were successfully relocated to new channels, freeing up valuable spectrum and making it ready for use for new mobile and wireless broadband services from 1 January 2015.</p>
    <p>We also progressed significant policy reform, in particular through the completion of the Spectrum Review in conjunction with the ACMA. This is the first review of the spectrum framework in more than 20 years and aims to set a future reform pathway for this increasingly critical and contested public good.</p>
    <p>We supported the Minister in developing and announcing reform initiatives to help Australia Post remain viable in the face of the dramatic drop in its letters business.</p>
    <p>We continued to contribute to the Government&rsquo;s deregulation agenda with more than 50 measures to reduce the compliance burden on industry and individuals announced, generating more than $94 million in regulatory savings. This included not requiring Australians to re-register their details on the popular Do Not Call Register.</p>
    <p>Internally, and in keeping with our aim to be at the leading edge of digital government, we signed a contract to move our entire IT infrastructure to a secure cloud service&mdash;the first Commonwealth Department to do so. We redeveloped our website in the GovCMS platform&mdash;the whole-of-government content management system solution&mdash;meaning that we have built an open source product, reaping the gains of cloud hosting and contributing back to a new government digital web community.</p>
    <p>Operationally, we reported an operating surplus of $0.6 million (excluding depreciation) in 2014&ndash;15, down from $1 million (excluding depreciation) in 2013&ndash;14, with a net cost of services of $96.7 million.</p>
    <p>Soon after our restructure the Australian Public Service Commission (<?php infoTip('APSC', 'Australian Public Service Commission') ?> 
) carried out a Capability Review of the Department. It found we have a range of strengths, including a collegiate, dedicated workforce with a strong delivery focus, positive stakeholder relationships and a clear strategy and purpose. The Review also provided direction on where we need to further focus and we have used it to shape our longer-term approach to strengthening leadership, strategy and delivery. We will continue our programme of work to respond to these findings in 2015&ndash;16.</p>
    <p>Our capabilities will serve us well in delivering our priorities in 2015&ndash;16. This will include further reform of the policy and regulatory framework for the telecommunications sector, working closely with NBN Co as the rollout of the multi-technology mix starts to reach scale, conducting round two of the Mobile Black Spot Programme, finalising the Spectrum Review outcomes, undertaking a major review of the ACMA, and completing the Regional Telecommunications Review.</p>
    <p>I thank staff for their hard work and collegiate attitude through what has been a busy and challenging time and look forward to another exciting and demanding year for our new Department of Communications.</p>
    
   <p>Drew Clarke</p>
   <p>Secretary</p>

<?php mainContentPiece('mid'); ?>

<?php

    sidebar(array(
		array(
			'blockType' => 'twitter',
			'text' => '2014&ndash;15 was a year of significant structural change across the portfolio, including within the Department of Comms',
		), array(
			'blockType' => 'highlight',
            'icon' => 'trophy',
			'altText' => 'icon of a trophy with the number 1 on it',
            'text' => 'We created a Department better able to fulfill our purpose of promoting an innovative and competitive communications sector so all Australians can realise the full potential of digital technologies and communication services'
		), array(
			'blockType' => 'moreInfo',
            'text' => 'Our new structure was put in place in September 2014',
            'btnText' => 'See the Org chart',
            'link' => '/2015/pages/1/2/4.php'
		), array(
			'blockType' => 'highlight',
            'icon' => 'meeting',
			'altText' => 'Icon of two people shaking hands',
            'text' => 'I thank staff for their hard work and collegiate attitude'
		)
    ));
?>

<?php mainContentPiece('bottom'); ?>


<?php
	videoBlock(
		'Secretary Overview - Comms Annual Report 2014&ndash;15',
		//only this bit: http://grabilla.com/05814-cf4d34e5-99d8-40ee-847c-825f97c31523.png
		'm_Y0EbUz7uw'
	);
?>



<?php include $include['base'].'structure-PHP/foot.php'; ?>
