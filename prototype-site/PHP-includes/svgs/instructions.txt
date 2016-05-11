To add svg's directly to the site easily as inline HTML (so that you can alter them with css), save the svg file as a php file in this folder. Then call it in the HTML like this:

<?php svg('fileName'); ?>

Remove the doc type and any tags outside of the <svg> tag though