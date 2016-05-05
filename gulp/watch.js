
// Load gulp
var gulp = require('gulp');

// load plugins
var browserSync = require('browser-sync');

//Reloads the page when changing PHP files
gulp.task('php-reload', function(){
	browserSync.reload();
});

// create a task that ensures the js tasks are complete before reloading browsers
gulp.task('js-watch', ['js-hint', 'js-compile-minify'], browserSync.reload());

gulp.task('watch', function(){
	gulp.watch('prototype/**/*.php', ['php-reload']);

	gulp.watch('prototype/00-source-files/02-js/**/*.js', ['js-watch']);

	gulp.watch(['prototype/00-source-files/**/*.scss','!**/generated-files/**/*.scss'], ['sass-compile-modern']);

	gulp.watch(['prototype/00-source-files/04-icomoon-unpackager/**/*'], ['icomoon-unpackager']);
});
