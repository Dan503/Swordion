Often in order to create robust php module includes, you'll need to build them as functions so that you can parse variables into them.

I have some in here already as both an example of how to do them and a handy shortcut to common things that need module functions made for them.

Any file you save in this folder will be automatically included at the top of the page so that it is instantly usable in your layout files once you save the php file.

If you are getting a blank white screen after adding a function module, you've probably made a PHP syntax error. You can de-bug your PHP by enabling errors from the error-reporting.php config file by uncommenting the commented out line of code. Comment it out again once you are done.

Ignore all notices of undefined variables. It's a side-effect of the defaultTo() PHP function. PHP doesn't like undefined variables being parsed into functions.