<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/00-config-PHP/config-loader.php';

$template = defaultTo($getCurrent['template'], 'standard');

include $include['template'].$template.'.php';

include '03-foot.php';

?>
