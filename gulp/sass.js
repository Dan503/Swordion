// Load gulp
var gulp = require('gulp');

// load plugins
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');

// Compile the Sass
var sass_output_files = 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/';

function compileSass(src){
    return gulp.src(sass_output_files+src+'.scss')
		.pipe(sassGlob())
        .pipe(sass())
        .pipe(gulp.dest('assets/css'));
}

gulp.task('sass', function() {
	var sourceFiles = [
		'modern',
		'ie9',
		'ie8'
	];
	for (file of sourceFiles) {
		compileSass(file);
	}
});
