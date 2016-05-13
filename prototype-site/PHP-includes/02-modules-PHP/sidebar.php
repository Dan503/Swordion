
<?php
/*
These are the default settings for this module include.
These settings can be overwritten in either the navmap item, template settings or layout settings by doing this:

$GLOBALS['template_settings'] = [
	'sidebar' => [
		'nav' => false,
	]
];
*/
$tempSets = templateDefault(['sidebar'], [
	'nav' => true,
	'highlight' => true
]);
?>

<?php
/*
uses the $has variable to check if the page should include this module or not
the default settings can be found in the has-thing-config.php file under the late config files folder
This can be overwritten in the navmap item, template settings or layout settings by doing this:

$GLOBALS['template_settings'] = [
	'has' => [
		//'sidebar' => false,
	]
];
*/
if ($has['sidebar']){ ?>

	<div class="sidebar grid__cell">
		<div class="sidebar__inner grid grid--gutter-pageLayout grid--vertical">
			<?php
			//if settings allow the navigation to appear
			if ($tempSets['nav']){

				//Will open only the active nav item
				$accordionShow = $get['depth'] > 1 ? $location[1] + 1 : 'none';
				?>

				<ul class="nav sidebar__cell grid__cell TK-noDots" data-jshook="accordion__reference" data-accordion-show="<?php echo $accordionShow; ?>">
					<?php
					//starting from the root level navigation of the current page
					foreach(get([$location[0]], 'subnav') as $i => $navItem){
						//generate the navigation
						nav__item($navItem, $i);
					}
					?>
				</ul>
			<?php } ?>

			<?php if ($tempSets['highlight']){ ?>

				<div class="sideBar__cell grid__cell">
					<h2><a href="#">Highlight</a></h2>
					<p>Lorem ipsum dolor sit amet</p>
					<a href="#" class="btn btn--fullWidth">Button</a>
				</div>

			<?php } ?>
		</div>
	</div>

<?php } ?>

