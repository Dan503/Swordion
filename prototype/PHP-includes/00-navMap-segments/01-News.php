<?php
$navSegment = [
'title' => 'News',
	'template' => 'news-listing',//assigns a template for this page
	'subTemplate' => 'news-story',//assigns a template for all immediate child pages
	'subNavigable' => false,//child pages do not appear in standard navigation
	'subnav' => array(
		['title' => 'Lorem ipsum dolor sit emet'],
		['title' => 'Nam illud vehementer repugnat'],
		['title' => 'Duo Reges'],
		['title' => 'Summum a vobis bonum voluptas dicitur'],
	)
],
?>