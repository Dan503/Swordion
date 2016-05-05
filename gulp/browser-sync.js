// Include gulp
var gulp = require('gulp');

// plugins
var php = require('gulp-connect-php');
var browserSync = require('browser-sync');

//Boot up PHP server and run browsersync
gulp.task('start-php-server', function() {
  php.server({base: 'prototype', port: 8010, keepalive: true}, function (){
    browserSync({
      proxy: '127.0.0.1:8010',
	  port: 8080,
	  open: true,
    });
  });
});