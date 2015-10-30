<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

<h3><?php infoTip('PBS', 'Portfolio Budget Statements') ?> 
 and <?php infoTip('PAES', 'Portfolio Additional Estimates Statements') ?> 
 2014&ndash;15 Deliverables and Key Performance Indicators </h3>

                <h4>Deliverables:</h4>
                <ul>
                    <li>Support the Minister on ABC and SBS policy and funding matters, the transmission of ABC and SBS services and on ABC and SBS board appointments.</li>
                    <li>Provision of Community Broadcasting Programme funding to assist community broadcasters, including with the delivery of community radio services.</li>
                    <li>Advice to the Minister on appropriate consumer safeguards relating to the provision of content and communications services.</li>
                    <li>Advice to the Minister on the production and provision of content, including media diversity and ownership.</li>
                    <li>In consultation with stakeholders, assess the extent to which the current regulatory frameworks operating in the communications, broadcasting and media sectors remain appropriate, particularly given technological changes.</li>
                    <li>Supporting consumer interests and protection against harm through policy advice and:</li>
                    <ul>
                        <li>funding for the Australian Communications Consumer Action Network through the Consumer Representation Grants Programme</li>
                        <li>advice on cybersecurity initiatives to inform and educate Australian consumers and small businesses about managing the risk of financial fraud and loss of personal information online.</li>
                    </ul>
                    <li>Establishment of the Office of the Children&rsquo;s e-Safety Commissioner (the Commissioner).</li>
                    <li>Establishment of, and support for, the Ministerial Advisory Council on Communications, which is tasked with providing advice on deregulation options across the Portfolio.</li>
                    <li>Advice on the postal sector and protection of the Australian Government&rsquo;s interest as a shareholder of Australia&nbsp;Post.</li>
                </ul>
             <table>
            <thead>
            <tr>
                <th>
                    Key Performance Indicator
                </th>
                <th>
                    Result
                </th>
            </tr>
            </thead>
               <tbody>
            <tr>
                <td>
                    <p>High-quality, strategic and timely advice on necessary market settings to promote competition, while ensuring access to basic services, making available socially valuable content, and safeguarding consumers from inappropriate content.</p>
                </td>
                <td>
                    <p><strong>Achieved </strong></p>
                    <p>We provided strategic and timely advice to the Minister on media policy, including ownership and control, and anti-siphoning. We supported deregulation across the communications and media environment. We also developed a framework for significant reform of Australia Post. We advised on possible implications for the communications sector, of recommendations in the Harper Review.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Effective regulatory frameworks for, and information about open, competitive and efficient communications markets, consumer interests, and online safety and security.</p>
                </td>
                <td>
                    <p><strong>Achieved </strong></p>
                    <p>We supported reforms to broadcasting and telecommunications consumer regulatory frameworks; to help businesses more effectively serve their customers. We supported the development and establishment of the Children&rsquo;s e-Safety Commissioner function, and delivered the free Stay Smart Online Alert Service, which sends email and social media messages to more than 21,000 subscribers and 9,300 Facebook followers about current threats. The Parliament amended the registration period on the Do Not Call Register from eight years to an indefinite period.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Contribution to the broad objective that all Australians have access to a range of free-to-air and subscription television and radio services, through effective policy and effectively administered funding.</p>
                </td>
                <td>
                    <p><strong>Achieved </strong></p>
                    <p>We provided policy advice in relation to the ABC and SBS, including implementation of the Efficiency Study, options for procurement of transmission services, and Board appointments. We published a paper on the future regulation of digital television that looked at possible reforms and streamlining in the context of a rapidly changing communications environment and the Government&rsquo;s commitment to deregulation. We continued support for community broadcasting through the Community Broadcasting Foundation grant.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Regular, timely collaboration and engagement on portfolio deregulation options, through the effective establishment and support for the Ministerial Advisory Council on Communications.</p>
                </td>
                <td>
                    <p><strong>Achieved </strong></p>
                    <p>The Ministerial Advisory Council on Communications met on 7 March 2014. Members welcomed the Government&rsquo;s move to free business from the burden of unnecessary and duplicative regulation, and discussed how industry and government working together can provide greater leadership for Australian innovation, particularly in the digital domain.</p>
                    <p>The Minister and Parliamentary Secretary have continued to consult with members of the Advisory Council on deregulatory measures since the March meeting.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Office of the Children&rsquo;s e-Safety Commissioner is established to promote a coordinated approach to online safety of children.</p>
                </td>
                <td>
                    <p><strong>Achieved </strong></p>
                    <p>On 24 March 2015, the <em>Enhancing Online Safety for Children Act 2015</em> was enacted. It established the Children&rsquo;s e-Safety Commissioner as an independent statutory office to take a national leadership role in online safety for children from <br /> 1 July 2015.</p>
                </td>
            </tr>
        </tbody>
    </table>

<?php mainContentPiece('mid'); ?>

<?php

    sidebar(array(
		array(
			'blockType' => 'nav',
            'navType' => 'desktopOnly'
		), array(
			'blockType' => 'highlight',
            'icon' => 'manInSpot',
			'altText' => 'icon of a man standing in a circle that is at the base of his feet',
            'text' => 'Safeguarding consumers from inappropriate content and unfair dealing'
		), array(
			'blockType' => 'moreInfo',
            'text' => 'Enhancing Online Safety for Children',
            'btnText' => 'Read more',
            'link' => 'https://www.communications.gov.au/have-your-say/enhancing-online-safety-children'
		)
    ));
?>


<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
