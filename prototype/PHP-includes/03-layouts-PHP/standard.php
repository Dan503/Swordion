<?php
	include $head;

	breadcrumb();
?>

<?php pageLayout('top'); ?>

	<h1><?php echo $get['current']['title']; ?></h1>

	<?php
		//read the instructions in the "content" folder to understaned this function
		loadContent('main.php');
	?>

<?php pageLayout('mid'); ?>

<?php
 //you can place a sidebar here ;)
 // include $module.'sidebar.php';
?>

<?php pageLayout('bottom'); ?>