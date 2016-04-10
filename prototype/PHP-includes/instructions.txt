It is through these folders that you add HTML to the website. There are more details inside each folder.

If you are ever just seeing a big blank screen, try uncommenting the "error_reporting(-1);" line in 01-error-reporting.php file (make sure to commment it again after you're done though).

It will reveal all error and warning messages. Don't get freaked out by the huge list of undefined variable warnings. It's part of how the defaultTo function works and it can't be helped. In order to have a default, you need to be able to parse undefined variables into the function. PHP doesn't like having undefined variables parsed into it's functions though thus the warning messages.