<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php
	sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop')));
?>

<?php mainContentPiece('top'); ?>

    <p>In 2014&ndash;15, we implemented a number of major projects and initiatives designed to provide a leading edge digital experience to staff and stakeholders.</p>
    <p>We delivered a new departmental website, communications.gov.au, on 15 June 2015. The new site was built in the whole-of-government content management system, known as GovCMS, and designed based on user research.</p>
    <p>It features an innovative &lsquo;Have Your Say&rsquo; consultation page allowing citizens and stakeholders to more easily provide their views on policies being developed. All pages on the old website were rewritten in plain English. More than 700 pages of content were reviewed and reduced to just over 450 pages and three sites were amalgamated into the one departmental website, providing a more consistent user experience. Early feedback has been positive, with an increase in visits to the site and &lsquo;Have Your Say&rsquo; section.</p>
    <p>The Digital Literacy Training Programme was launched in February 2015 to increase staff understanding and engagement with digital channels, social media and internal and external business platforms. From February to June 2015, 339 staff attended a training session or innovation lab. Over 5,000 videos were viewed on the Lynda.com platform, equating to over 310 hours by 280 staff, and four out of the top five videos viewed related to digital literacy learning.</p>
    <p>We continued to support the successful implementation of broader policy and programme initiatives across the Department. In 2014&ndash;15, we prepared 72 ministerial and 27 departmental media releases, responded to 391 media enquiries, and prepared 82 speeches. We provided social and digital content and live web streaming for two public forums designed to raise awareness of issues around online copyright infringement and digital innovation and transformation. We delivered a total of 78 videos, 19 animations and 49 infographics, as well as a large number of tweets and posts for social media.</p>
    <p>The Department uses a number of social media platforms to share information and engage with the community. Our corporate Twitter account, @CommsAu, provides updates on ministerial announcements, promotes policy and programme work, and aims to engage the community in the work we do.</p>
    <p>In 2014&ndash;15, we implemented a new strategic approach to our Twitter content planning, increasing our focus on our policy areas, consultations, and the impact of our policy and programmes. This has seen a 28 per cent increase in our followers and a 45 per cent increase in engagement (based on URL clicks, retweets, replies and favourites).</p>
    <p>We also reshaped the Department&rsquo;s Graduate Facebook page to promote the culture of the Department and the opportunities available to graduates. Current and previous graduates provided content and shared their experiences. By using photos, videos and personal stories, 'Likes' to the page increased by 110 per cent over the year.</p>
    <p>During the reporting period, we implemented and evaluated the Retune communications campaign. The campaign raised awareness of the need to retune television and digital recording equipment once restack work was completed at 426 sites around the country.</p>
       <p>Internally, we have been building a new intranet that supports a culture of collaboration and open communication. The new intranet is based on extensive user feedback and includes an internal social network where staff can comment and collaborate on documents, publish posts and like and share information.</p>
    <p>The new intranet was released in late July 2015. Over the next financial year, we will review and refresh our communication and digital strategies to make sure they remain relevant and support our strategic objectives.</p>

<?php mainContentPiece('mid'); ?>

<?php

    sidebar(array(
		array(
			'blockType' => 'nav',
            'navType' => 'desktopOnly'
		), array(
			'blockType' => 'moreInfo',
           'text' => 'Department of Communications website',
			'btnText' => 'Our new website',
			'link' => 'https://www.communications.gov.au/'
		), array(
			'blockType' => 'highlight',
            'icon' => 'presentation',
			'altText' => 'icon of a line graph in a presentation',
            'text' => 'We&rsquo;ve seen a 28 per cent increase in our twitter followers and a 45 per cent increase in engagement'
		), array(
			'blockType' => 'moreInfo',
           'text' => 'Have your say',
			'btnText' => 'Take a look',
			'link' => 'https://www.communications.gov.au/have-your-say'
		)
    ));
?>


<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
