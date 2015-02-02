<?php

/*
 * @file This file operates the URL mapping and settings for the prototype
 * @author Dan Ashdown - dan.ashdown@readingroom.com
 * 
 * A left column is assumed, if this is not the case your filename should contain -nlc-
 * If the page has a right hand column, your filename should contain -rc-
 */

 //URL Mapping
$pages = array(
  '/' => array(
    'title' => 'Home',
    'node_file' => 'homepage.php',
	'body_classes' => 'home'
  ),
  'home2' => array(
    'title' => 'Home',
    'node_file' => 'homepage.php',
    'page_file' => 'page-home2.php',
    'hidden' => FALSE,
  ),
  'standard' => array(
    'title' => 'Standard',
    'node_file' => 'standard/standard.php',
    'show_children' => TRUE,
    'classes' => array('members'),
    'sidebar-first' => 'my-funky-sidebar.php',
    'children' => array(
      /* start 'standard' children */
      'standard/level-2-a' => array(
        'title' => 'Level 2 A',
        'node_file' => 'standard/standard-rc-.php',
        'show_children' => TRUE,
        'children' => array(
          /* start 'standard/level-2-a' children */
          'standard/level-2-a/level-3-a' => array(
            'title' => 'Level 3 A',
            'node_file' => 'standard/standard-rc-.php',
          ),
          'standard/level-2-a/level-3-b' => array(
            'title' => 'Level 3 B',
            'node_file' => 'standard/standard-nlc-.php',
          ),
          /* end 'standard/level-2-a' children */
        ),
      ),
      'standard/level-2-b' => array(
        'title' => 'Level 2 B',
        'node_file' => 'standard/standard-nlc-.php',
      ),
      /* end 'standard' children */
    ),
  ),
  'form' => array(
    'title' => 'Form page',
    'node_file' => 'form.php',
  ),
  'sitemap' => array(
    'title' => 'Sitempap',
    'node_file' => 'sitemap.php',
  ),
  'listing' => array(
    'title' => 'Listing page',
    'node_file' => 'listing.php',
  ),
  'search-results' => array(
    'title' => 'Search Results',
    'node_file' => 'search.php',
    'hidden' => TRUE,
  ),
);

//Defaults
$site_name = 'XXXXXXXXXXXXXXXX_WEBSITE_NAME_GOES_HERE_XXXXXXXXXXXXXXXXXXXXXXXXXXX';
$this_page = array(
  'name' => 'Home',
  'node_file' => 'nodes/homepage.php',
);

?>