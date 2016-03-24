<?php
include $_SERVER['DOCUMENT_ROOT'].'/PHP-includes/ZZ-Swordion-DO-NOT-EDIT/02-base-PHP/template.php';

var_dump($get['url']);

//If the page doesn't exist in the nav map, redirect to the 404 page with an error message in the URL
if (!isset($get['current'])){ ?>
<!-- Prototype only -->
<script type="text/javascript">
	window.location='/404.php?error='+window.location+'_Does_not_exist_in_the_nav_map';
</script>
<!-- End prototype only -->
<?php } ?>
