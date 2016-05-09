// Load gulp
var gulp = require('gulp');

// load plugins
var replace = require('gulp-replace');
var header = require('gulp-header');
var footer = require('gulp-footer');
var rename = require('gulp-rename');

// other variables
var unpackageFolder = 'prototype-site/00-source-files/04-icomoon-unpackager/';

//Gulp tasks

//converts the icomoon scss variables into an scss map
gulp.task('icomoon-scss', function(){
    return gulp.src(unpackageFolder+'variables.scss')
		//replaces the sass variable syntax with sass map syntax
        .pipe(replace(/\$icon-([A-z0-9\-_]*):\s(\"\\[A-z0-9]*");/g, '\t$1: $2,'))
		//removes the "$icomoon-font-path: "fonts" !default;" bit
        .pipe(replace(/\$icomoon-font-path: \"([A-z0-9]*)\" \!default\;/g, ''))
		.pipe(header('$icons: (\n'))
		.pipe(footer(');'))
		.pipe(header('//This is an automatically generated file. DO NOT EDIT! Update the icon font by dumping the contents of icomoon packages into the icomoon unpackager folder\n'))
		.pipe(rename('icon-names.scss'))
        .pipe(gulp.dest('prototype-site/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/generated-files/'))
		.on('end', function(){
			gulp.start(['sass-compile-minify', 'copy-to-build:fonts']);
		});
});

//copies the font files into the correct directory
gulp.task('icomoon-fonts', function(){
	return gulp
		.src(unpackageFolder + 'fonts/*')
		.pipe(gulp.dest('prototype-site/assets/fonts/icon-font/'));
})

//minifies the css
gulp.task('icomoon-unpackager', ['icomoon-scss', 'icomoon-fonts']);

