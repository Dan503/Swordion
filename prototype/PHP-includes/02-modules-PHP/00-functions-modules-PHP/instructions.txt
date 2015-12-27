Most of the time, in order to create robust php module includes, you'll need to build them as functions so that you can parse variables into them.

I have some in here already as an example of how to do them.

Any file you save in this folder will instantly be included at the top of the page so that it is usable in your template files the instant you save the file.

If you are getting a blank white screen after adding a function module, you've probably made a PHP syntax error. You can de-bug your PHP by enabling errors from the error-reporting.php config file by uncommenting the commented out line of code. Comment it out again once you are done.

Ignore all notices of undefined variables. It's a side-effect of the defaultTo() PHP function. PHP doesn't like undefined variables being parsed into functions.