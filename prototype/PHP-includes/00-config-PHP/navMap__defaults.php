<?php

//Any settings applied here will be applied to every item in the nav map unless overwritten in the navMap itself.
//Links are generated automatically through the "navMap__applyDefaults" file in the do-not-edit part of Swordion

$GLOBALS['navMap__defaults'] = array(
	'subNavigable' => true,//means that the items subnav will appear in the navigation (this needs to be coded in though, it isn't pre-packaged)
	'subTemplate' => 'standard',//determines what the default template for the site is (do not remove this but you can change it to a different template if you like)
	//'link' => '#',//disables auto link generation
);

?>