// Include gulp
var gulp = require('gulp');

// plugins
var jshint = require('gulp-jshint');

// Check JS for errors
gulp.task('js-hint', function() {
    return gulp.src([
		'prototype-site/00-source-files/02-js/**/*.js',
		'!prototype-site/00-source-files/02-js/**/*.min.js',
		'!prototype-site/00-source-files/02-js/plugins--3rdParty-JS/**/*.js'
	])
        .pipe(jshint({asi: true}))
        .pipe(jshint.reporter('default'));
});
