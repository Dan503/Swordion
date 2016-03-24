<?php
include $_SERVER['DOCUMENT_ROOT'].'/PHP-includes/ZZ-Swordion-DO-NOT-EDIT/02-base-PHP/template.php';

var_dump($get['current']);

//If the page doesn't exist in the nav map, redirect to the 404 page
if (!isset($get['current'])){ ?>

<script type="text/javascript">
	window.location="/404.php";
</script>

<?php } ?>
