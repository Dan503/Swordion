var gulp = require('gulp');

var modernizr = require('gulp-modernizr');
var uglify = require('gulp-uglify');

gulp.task('modernizr', function() {
	gulp.src([
		'prototype-site/assets/js/generated-JS/*.js',
		'!prototype-site/assets/js/generated-JS/*.min.js',
		'prototype-site/assets/css/modern.css'
	])
		.pipe(modernizr('modernizr.min.js', {
			tests: [
				//tests you use should be picked up on and applied to the HTML automatically
				//if a test isn't being applied automatically after using it, list it here.
				//use the documentation here for information on available class names:
				//https://modernizr.com/download?setclasses
			],
			excludeTests: [
				//list any tests you explicitly want to EXCLUDE here (as in false positives)
			],
			options : [
				"setClasses",
				"addTest",
				"html5printshiv",
				"testProp",
				"fnBind"
			],
			cache : true,
		}))
		.pipe(uglify())
		.pipe(gulp.dest("prototype-site/assets/js/generated-JS/"))
});