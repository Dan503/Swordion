<?php

//Adds the Swordion php configuration files
require('swordion-php-config/config-loader.php');

/* DO NOT EDIT BELOW THIS LINE OR ELSE YOU WILL HAVE A GRUMPY BACK END DEV */

require('boilerplate.class.php');
require('settings.php');

$bp = new boilerplate($pages);

include "theme/templates/html.php";

?>