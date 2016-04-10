<?php

//set of $has variables that are used throughout the prototype in if statements to tell if a thing should appear or not
//'test' => default ('rand' or 'random' = random; true = true; false = false)
$has_test_defaults = array(
	'sidebar' => true, //will always appear by default unless otherwise stated
	'related' => 'random',//randomly decides if it should appear by default
	'accordion' => false,//will never appear by default unless otherwise stated
	'breadcrumb' => true,
);

//"has" variables are configured late so that the navMap is complete before running the code

//This code means: if $has['thing'] has not already been defined, define it with the "has" function (found in Swordion files)
foreach($has_test_defaults as $thing => $default){
	$has[$thing] = defaultTo($has[$thing], has($thing, $default));
}

$GLOBALS['has'] = $has;

?>
