This folder (not including sub folders) holds the direct include php modules. Modules that will always be exactly the same on every page in terms of HTML structure go in this folder and are included like this:

<?php include $include['module'].'fileName.php'; ?>