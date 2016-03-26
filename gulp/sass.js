// Load gulp
var gulp = require('gulp');

// load plugins
var sass = require('gulp-sass');//compiles sass using libSASS
var sassGlob = require('gulp-sass-glob');//enables the use of sass globbing @import syntax in sass files (only at root level)
var sourcemaps = require('gulp-sourcemaps');//enables the generation of source maps in the css

// Compile the Sass
var sass_output_files = 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/';

function compileSass(src){
    return gulp
		.src(sass_output_files+src+'.scss')
		.pipe(sassGlob())
		.pipe(sourcemaps.init())
			.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.write('./source-maps'))
		.pipe(gulp.dest('prototype/assets/css'));
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
