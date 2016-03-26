// Load gulp
var gulp = require('gulp');

// load plugins

//compiles sass using libSASS
var sass = require('gulp-sass');
//enables the use of sass globbing @import syntax in sass files (only at root level)
var sassGlob = require('gulp-sass-glob');
//enables the generation of source maps in the css
var sourcemaps = require('gulp-sourcemaps');
//enables the use of postcss
var postcss = require('gulp-postcss');
//automatically adds prefixes
var autoprefixer = require('autoprefixer');
//adds the flexibility JS polyfill -js-display: flex; css
var flexibility = require('postcss-flexibility');

gulp.task('css', function () {
    return gulp.src('./src/*.css')
        .pipe(postcss(processors))
        .pipe(gulp.dest('./dest'));
});

// Compile the Sass
var sass_output_files = 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/';

function compileSass(src){
    var processors = [
        autoprefixer({browsers: ['last 2 versions']}),
		flexibility()
    ];

    return gulp
		.src(sass_output_files+src+'.scss')
		.pipe(sassGlob())
		.pipe(sourcemaps.init())
			.pipe(sass().on('error', sass.logError))
	        .pipe(postcss(processors))
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
