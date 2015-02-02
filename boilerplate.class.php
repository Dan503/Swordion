<?php

/**
 * Boilerplate class
 *
 * The boilerplate class was created as a framework for front end developers to built prototypes on top of. It handles
 * the friendly urls and breadcrumbs dynamically. It was also designed to make the transition from prototype to Drupal 7
 * theme much smoother by including some Drupal default HTML, cutting down the back end developers conversion / override
 * time.
 * 
 * @author Dan Ashdown
 * @email dan.ashdown@readingroom.com
 */
class boilerplate {
  
  private $current_uri;
  private $curernt_page = array();
  private $body_classes;
  
  private $pages = array();
  private $pages_flat = array();
  private $active_trail = array();
  
  private $navigation_html;
  private $sub_navigation_html;
  private $breadcrumb_html;

  public function __construct($pages) {
    $this->pages = $pages;
    $this->current_uri = $this->current_uri();
    $this->flatten_pages();
    $this->current_page = $this->pages_flat[$this->current_uri];
    $this->active_trail = $this->build_active_trail();
    $this->navigation_html = $this->build_menu();
    
    $this->flatten_pages();
    
    $this->current_page = $this->pages_flat[$this->current_uri];
    $this->body_classes = $this->build_body_classes();
    
    
    $this->sub_navigation_html = $this->build_submenu();
    
    $this->breadcrumb_html = $this->build_breadcrumb();
  }
  
  /**
   * Sets the current pages' URI
   */
  private function current_uri() {
    //Set home if another page isn't requested
    if (empty($_GET['p'])) {
      $_GET['p'] = '/';
    }
    
    return $_GET['p'];
  }
  
  /**
   * Builds a list of body classes for the template
   */
  private function build_body_classes() {
    $classes = '';
 
    if (isset($this->current_page['sidebar-first'])) {
      $classes .= ' sidebar-first';
    }
    if (isset($this->current_page['sidebar-second'])) {
      $classes .= ' sidebar-second';
    }
    if (isset($this->current_page['sidebar-third'])) {
      $classes .= ' sidebar-third';
    }
    if ( ! $classes) {
      $classes .= ' no-sidebars';
    }
    
    if ($this->current_uri == '/') {
      $classes .= ' home';
    }
    
    return $classes;
  }
  
  /**
   * Builds a flat array of pages for checking stuff against
   * @return array 
   */
  private function flatten_pages() {
    foreach ($this->pages as $uri => $item) {
      $this->flatten_pages_helper($uri, $item);
    }
  }
  
  /**
   * Generates a 1 level array with all pages, useful for array_key_exists() and getting item details etc.
   * 
   * @param string $uri - The current items uri
   * @param array $item - The current items details
   */
  private function flatten_pages_helper($uri, $item) {
    $this->pages_flat[$uri] = $item;
    $this->pages_flat[$uri]['parent'] = FALSE;
    
    //Node template file
    if (isset($this->pages_flat[$uri]['node_file'])) {
      $this->pages_flat[$uri]['node_file'] = 'theme/templates/nodes/' . $this->pages_flat[$uri]['node_file'];
    }
    else {
      $this->pages_flat[$uri]['node_file'] = 'theme/templates/nodes/node.php';
    }
    
    //Page template file
    if (isset($this->pages_flat[$uri]['page_file'])) {
      $this->pages_flat[$uri]['page_file'] = 'pages/' . $this->pages_flat[$uri]['page_file'];
    }
    else {
      $this->pages_flat[$uri]['page_file'] = 'pages/page.php';
    }
    
    if (isset($item['children'])) {
      foreach ($item['children'] as $c_uri => $c_item) {
        $this->flatten_pages_helper($c_uri, $c_item);
        $this->pages_flat[$c_uri]['parent'] = $uri;
      }
      if (isset($this->pages_flat[$uri]['children'])) {
        unset($this->pages_flat[$uri]['children']);
      }
    }
  }
  
  /**
   * Generates the breadcrumb from the result of build_active_trail();
   * @return string - The complete HTML
   */
  private function build_breadcrumb() {
    //No breadcrumb on the home page
    if (count($this->active_trail) == 1 && $this->active_trail[0] == '/') {
      return FALSE;
    }

    $breadcrumb = '<ol id="breadcrumb"><li><a href="/">Home</a></li>';

    foreach ($this->active_trail as $uri) {
      $item = $this->pages_flat[$uri];
      if ($uri == $this->current_uri) {
        $breadcrumb .= '<li class="current"> <span>&gt;</span> ' . $item['title'] . '</li>';
      }
      else {
        $breadcrumb .= '<li> <span>&gt;</span> <a href="/' . $uri . '">' . $item['title'] . '</a></li>';
      }
    }

    $breadcrumb .= '</ol>';

    return $breadcrumb;
  }
  
  /**
   * Creates an array of all pages that are in the active trail
   */
  private function build_active_trail() {
    $active_trail = array($this->current_uri);
    $parent = $this->current_page['parent'];
    
    while ($parent) {
      array_unshift($active_trail, $parent);
      $parent = $this->pages_flat[$parent]['parent'];
    }
 
    return $active_trail;
  }
  
  /**
   * Generates the navigation html
   */
  private function build_menu() {
    $counter = 0;
    
    //Get last
    foreach ($this->pages as $uri => $item) {
      if ( ! isset($item['hidden'])) {
        $last = $uri;
      }
    }

    foreach ($this->pages as $uri => $item) {
      $counter++;
      $class = '';

      if ($counter === 1) {
        $class .= ' first';
      }
      else if ($last == $uri) {
        $class .= ' last';
      }

      $this->nav_item_helper($uri, $item, $class);
    }

    return '<ul class="menu clearfix">' . $this->navigation_html . '</ul>';
  }
  
  private function build_submenu() {
    $full_menu = $this->navigation_html;
    $this->navigation_html = '';

    foreach ($this->pages as $uri => $item) {
      if (in_array($uri, $this->active_trail)) {
        $class = '';
        $this->nav_item_helper($uri, $item, $class);
        $links[]=$uri;
      }
    }
    
    $this->sub_navigation_html = $this->navigation_html;
    $this->navigation_html = $full_menu;

    return '<ul class="menu clearfix">' . $this->sub_navigation_html . '</ul>';
  }
  
  /**
   * Generates the menu item html to match Drupals structure
   * 
   * @param string $uri - The uri of the current item
   * @param array $item - The details of the current item
   * @param string $class - Forced classes
   */
  private function nav_item_helper($uri, $item, $class) {
    $classes = $class;
    $active = FALSE;

    //Generate classes
    if ($this->current_uri == $uri) {
      $active = TRUE;
    }
    if ( ! isset($item['children'])) {
      $classes .= ' leaf';
    }
    
    //Forced classes
    if (isset($item['classes'])) {
      $classes .= ' ' . implode(' ', $item['classes']);
    }
    
    //Child classes
    if (isset($item['show_children'])) {
      if ($item['show_children']) {
        $classes .= ' expanded';
      }
      else {
        $classes .= ' collapsed';
      }
    }

    if (in_array($uri, $this->active_trail)) {
      $active_trail = TRUE;
    }
    else {
      $active_trail = FALSE;
    }
    if ( ! isset($item['hidden'])) {
      $this->navigation_html .= '<li class="' . trim($classes) . ($active_trail ? ' active_trail' : '') . '">';

      //Item link
      $this->navigation_html .= '<a href="/' . trim($uri, '/') . '" title="' . $item['title'] . '" class="' . ($active_trail ? ' active_trail' : '')  . ($active ? ' active' : '') . '">' . $item['title'] . '</a>';

      if (isset($item['children'])) {
        $counter = 0;

        $this->navigation_html .= '<ul class="menu clearfix">';

        //Generate children
        foreach ($item['children'] as $c_uri => $c_item) {
          $counter++;
          $c_class = '';

          if ($counter === 1) {
            $c_class .= ' first';
          }
          else if ($counter == count($item['children'])) {
            $c_class .= ' last';
          }

          //Self calling, dun dun duuuun
          $this->navigation_html .= $this->nav_item_helper($c_uri, $c_item, $c_class);

        }

         $this->navigation_html .= '</ul>';
      }

      $this->navigation_html .= '</li>';

    }
  }

  /**
   * Getter for menu
   * @return string
   */
  public function get_menu() {
    return $this->navigation_html;
  }

  /**
   * Getter for sub menu
   * @return string
   */
  public function get_submenu() {
    return $this->sub_navigation_html;
  }

  /**
   * Getter for breadcrumb
   * @return string
   */
  public function get_breadcrumb() {
    return $this->breadcrumb_html;
  }
  
  /**
   * Getter for current_uri
   * @return string
   */
  public function get_uri() {
    return $this->current_uri;
  }
  
  
  /**
   * Getter for current_page
   * @return string
   */
  public function get_page() {
    return $this->current_page;
  }

  /**
   * Get page title
   * @return string
   */
  public function get_title() {
    return $this->current_page['title'];
  }

  /**
   * Get node template
   * @return string
   */
  public function get_node_template() {
    return $this->current_page['node_file'];
  }
  
    /**
   * Get page template
   * @return string
   */
  public function get_page_template() {
    return $this->current_page['page_file'];
  }
  
/*  /**
   * Get body classes
   * @return string
   *
  public function get_body_classes() {
    return $this->body_classes;
  }

  /**
   * Get body classes
   * @return string
   */
  public function get_sidebar($sidebar = 'sidebar-first') {
    if (isset($this->current_page[$sidebar])) {
      include 'theme/templates/sidebars/' . $this->current_page[$sidebar];
    }
  }

  /**
   * Checks if the current page is the homepage
   */
  public function is_home() {
    if ($this->current_uri == '/') {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Custom variables
   */
	public function get_body_classes() {
		return $this->current_page['body_classes'];
	}
}

?>