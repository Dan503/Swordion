<?php
//Determine weather to load the minified production files or the un-minified development files

//$environment = 'production';//minified files
$environment = 'development';//un-minified files
$GLOBALS['environment'] = $environment;

?>