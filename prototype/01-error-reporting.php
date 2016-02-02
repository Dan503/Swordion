<?php
//sets the php error reporting configuration for the site to be less fussy about undefined variables

//Essential for the "defaultTo()" function
ini_set('error_reporting','E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE');

//Uncomment this for debugging PHP
error_reporting(-1);

?>