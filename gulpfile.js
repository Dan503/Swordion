// Include gulp
var gulp = require('gulp');

// Include this files plugins
var gulpSequence = require('gulp-sequence').use(gulp);

//load gulp modules
require('require-dir')('./gulp');

//define the order gulp tasks run in when running default gulp task
gulp.task('default', gulpSequence(
	['js-hint', 'js-merge', 'sass'],//files in array run simultaniously
	'js-minify',//files outside array run one after the other in order
	'watch'
));
