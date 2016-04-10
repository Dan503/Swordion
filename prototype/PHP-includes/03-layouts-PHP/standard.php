<?php
	include $head;
?>

<article class="standardContent">

	<h1><?php echo $get['current']['title']; ?></h1>

	<?php
		//read the instructions in the "content" folder to understaned this function
		loadContent('main.php');
	?>

</article>
