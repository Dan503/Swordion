
// Include gulp
var gulp = require('gulp');

// Include this files plugins
var gulpSequence = require('gulp-sequence').use(gulp);

//load gulp modules
require('require-dir')('./gulp');

//This task will generate all the necessary files without starting the php server or the watch command
gulp.task('compile', [
	'icomoon-unpackager',//includes sass compilation
	'js-compile',
	'copy-to-build:other'
]);

//The default task generates all necessary files, boots up the php server and runs the watch command
//define the order gulp tasks run in when running default gulp task
gulp.task('default', gulpSequence(
	[//files in array run simultaniously unless they have dependencies
		'compile',
		'start-php-server',
	],

//files outside arrays will run one after the other in order
	'watch'
	//watch can take a REALLY long time to finish activating due to the large number of files it is watching. It won't track any changes until the "Finished 'watch'" message appears in the console. Please be patient while watch is starting, you only need to run it once per session and it can't start until all other tasks have finished
));

