<?php
	$GLOBALS['layout_settings'] = [
	];
	include $head;

	breadcrumb();
?>

<?php pageLayout('top'); ?>

<?php include $module.'sidebar.php'; ?>

<?php pageLayout('upper'); ?>

	<h1><?php echo $get['current']['title']; ?></h1>

	<div class="standardContent">
		<?php
			//read the instructions in the "content" folder to understand this function
			loadContent('main.php');
		?>
	</div>

<?php pageLayout('lower'); ?>

<?php
 //you could also place a sidebar here ;)
 // include $module.'sidebar.php';
?>

<?php pageLayout('bottom'); ?>