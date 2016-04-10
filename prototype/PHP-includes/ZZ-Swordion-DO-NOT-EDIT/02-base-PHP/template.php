<?php

//loads most config settings and functions
include $_SERVER['DOCUMENT_ROOT'].'/PHP-includes/ZZ-Swordion-DO-NOT-EDIT/00-config-PHP/config-loader.php';

//loads the current template settings
include $swordion['template'].$get['current']['template'].'.php';

//This code loads the late user config files
$lateConfigFiles = globFiles('/PHP-includes/00-config-PHP/late', 'array');
//Couldn't do a basic globFiles() command because I'd have to move variables to the global scope
foreach ($lateConfigFiles as $configItem){
    include $configItem;
}

//builds the main page layout
include $swordion['layout'].$get['current']['layout'].'.php';

//builds the footer
include $base.'foot.php';

?>
