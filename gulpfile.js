
//Use this instead for gulp task loading
//It follows similar sensibilities to how the rest of swordion works
//https://www.npmjs.com/package/gulp-task-loader


// Include gulp
var gulp = require('gulp');

// Include this files plugins
var gulpSequence = require('gulp-sequence').use(gulp);

//load gulp modules
require('require-dir')('./gulp');

//define the order gulp tasks run in when running default gulp task
gulp.task('default', gulpSequence(
	[//files in array run simultaniously unless they have dependencies
		'js-compile',
		'icomoon-unpackager',//includes sass compilation
		'start-php-server',
		'copy-to-build:other',
	],

//files outside arrays will run one after the other in order
	'watch'
	//watch can take a REALLY long time to finish activating due to the large number of files it is watching. It won't track any changes until the "Finished 'watch'" message appears in the console. Please be patient while watch is starting, you only need to run it once per session and it can't start until all other tasks have finished
));
