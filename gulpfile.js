
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
	/*[//files in array run simultaniously unless they have dependencies
		'js-hint',
		'js-compile-minify',
		'sass-compile-minify',
		'start-sync-server'
	],
*/
//files outside arrays will run one after the other in order
	'start-sync-server'
	//watch takes a while to activate unfortunatly. It won't track changes until the "Finished 'watch'" message appears. Be patient, you only need to run it once per session
));
