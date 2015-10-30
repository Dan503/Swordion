<?php
ini_set('include_path', $_SERVER['DOCUMENT_ROOT'].'/includes/');

include $_SERVER['DOCUMENT_ROOT'].'/2015/includes/02-base-PHP/structure-PHP/body.php';

?>

<?php sidebar(array(array('blockType' => 'nav', 'navType' => 'nonDesktop'))); ?> 

<?php mainContentPiece('top'); ?>

    <?php heading(1); ?>
    <p>Our consultative arrangements in 2014&ndash;15 included formal forums such as the Workplace Consultative Committee, the Health and Safety Committee and the Senior Leadership Group. In addition, there was extensive consultation with staff throughout the restructure process through staff meetings, forums, blogs and the Secretary&rsquo;s bulletins.</p>
    <?php heading(2); ?>
    <p>In 2015, representatives of each of the networks and forums within the Department came together to form the Departmental Engagement Taskforce (DET). This was created to provide opportunities for members to collaborate on a range of network driven activities and initiatives. It provides a collaborative environment where new ideas and opportunities for staff to contribute to the culture of the Department are actively encouraged and supported.</p>
    <p>The DET held an inaugural EXPO in June 2015 where member networks and forums showcased their initiatives and talked to interested staff about joining in and making the Department a great place to work.</p>
    <p>Comms in Focus, a programme of recurring month-long events on a theme relevant to the work of the Department was launched in 2015. It showcases leading industry guests and highlights our own expertise through a programme of events, master classes, panel discussions and Talking Heads presentations. The theme for May 2015 was &lsquo;Technology Change&mdash;Policy Questions&rsquo;.</p>
    <?php heading(3); ?>
    <p>Our Social Club is made up of a group of staff from across the Department who work hard to maintain a positive, collaborative and social workplace environment. The Social Club organises the annual Christmas Party, trivia nights, happy hours and a number of ad hoc events throughout the year.&nbsp;It also supports charities and community events, including fundraising and awareness raising for worthwhile charities such as Lifeline Australia.</p>
    <p>The Department has supported a number of charities on a regular basis such as the Rotary Club of Canberra&rsquo;s Circus Quirkus for over 10 years.</p>
    <p>In 2014&ndash;15, the Social Club completed the successful year-long and department-wide competition known as 'The Games', which culminated in the 2014 Christmas Party. The Social Club has also increased its engagement with other departmental networks and groups through the Departmental Engagement Taskforce.</p>

<?php mainContentPiece('mid'); ?>


<?php

    sidebar(array(
		array(
			'blockType' => 'nav',
            'navType' => 'desktopOnly'
		), array(
			'blockType' => 'highlight',
            'icon' => 'socialClub',
			'altText' => 'Icon of a group of people',
            'text' => 'Our Social Club is made up of a group of staff from across the Department who work hard to maintain a positive, collaborative and social workplace environment'
		), array(
			'blockType' => 'highlight',
            'icon' => 'share',
			'altText' => 'Share icon',
            'text' => '#thankyou &ndash; one of the Department&rsquo;s Reward and Recognition programmes'
		)
    ));
?>

<?php mainContentPiece('bottom'); ?>


<?php include $includes.'02-base-PHP/structure-PHP/foot.php'; ?>
