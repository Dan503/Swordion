<?php

//Define alterations to the main layout
//'alterationType' => 'alterationValue',
$GLOBALS['template_settings'] = [
];

//Define the layout that this template uses
$get['current']['layout'] = '404';

//load the layout
include $layout.$get['current']['layout'].'.php';

?>