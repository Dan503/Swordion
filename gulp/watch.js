
// Load gulp
var gulp = require('gulp');

// load plugins
var browserSync = require('browser-sync');

gulp.task('watch', function(){

	//Reloads the page when changing PHP files
	gulp.watch('prototype-site/**/*.php', function(){
		browserSync.reload();
	});

	//compiles JS and reloads page when changing JS files
	gulp.watch('prototype-site/00-source-files/02-js/**/*.js', ['js-compile']);

	//compiles css and reloads page when changing scss files
	gulp.watch(['prototype-site/00-source-files/**/*.scss','!**/generated-files/**/*.scss'], ['sass-compile:modern']);

	//compiles css, unpackages icons, and reloads page when unpackager contents are changed
	gulp.watch(['prototype-site/00-source-files/04-icomoon-unpackager/**/*'], ['icomoon-unpackager']);
});
