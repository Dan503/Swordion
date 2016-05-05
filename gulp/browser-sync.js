// Include gulp
var gulp = require('gulp');

// plugins
var php = require('gulp-connect-php');
var browserSync = require('browser-sync');

// create a task that ensures the js tasks are complete before reloading browsers
gulp.task('js-watch', ['js-hint', 'js-compile-minify'], browserSync.reload);

//Boot up PHP server and run browsersync
gulp.task('start-sync-server', function() {
  php.server({base: 'prototype', port: 8010, keepalive: true}, function (){
    browserSync({
      proxy: '127.0.0.1:8010',
	  port: 8080,
	  open: true,
    });
  });

  gulp.watch('prototype/**/*.php').on('change', browserSync.reload());

  gulp.watch('prototype/00-source-files/02-js/**/*.js', ['js-watch']);

  gulp.watch(['prototype/00-source-files/**/*.scss','!**/generated-files/**/*.scss'], ['sass-compile-modern']);
});