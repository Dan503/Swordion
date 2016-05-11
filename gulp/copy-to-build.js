
// Load gulp
var gulp = require('gulp');

// load plugins
//var _delete = require('del');

var root = {
	build : 'build-site',
	proto : 'prototype-site',
}

var paths = {
	assets: '/assets/',
	css:    '/assets/css/',
	js:     '/assets/js/',
	fonts:  '/assets/fonts/',
}

function exclusions(siteType){
	var site = siteType == 'build' ? root.build : root.proto;

	return [
		site+paths.assets+'**/*',
		'!'+site+paths.css+'**/*',
		'!'+site+paths.js+'**/*',
		'!'+site+paths.fonts+'**/*',
		'!'+site+paths.assets+'instructions.txt',
	]
}

//Doesn't copy css or source maps, just copies any other non-css things in the css folder
gulp.task('copy-to-build:css', function(){
	gulp.src([
		root.proto+paths.css+'**/*',
		'!'+root.proto+paths.css+'**/*.css',
		'!'+root.proto+paths.css+'source-maps/*',
	])
		.pipe(gulp.dest(root.build+paths.css));
});

//Only copies the non-generated stuff in the js folder (not source maps though)
gulp.task('copy-to-build:js', function(){
	gulp.src([
		root.proto+paths.js+'**/*',
		'!'+root.proto+paths.js+'generated-JS/**/*.js',
		'!'+root.proto+paths.js+'generated-JS/source-maps/*',
	])
		.pipe(gulp.dest(root.build+paths.js));
});

gulp.task('copy-to-build:fonts', function(){
	gulp.src(root.proto+paths.fonts+'**/*')
		.pipe(gulp.dest(root.build+paths.fonts));
});

gulp.task('copy-to-build:other', function(){
	gulp.src(exclusions('prototype'))
	.pipe(gulp.dest(root.build+paths.assets));
});

gulp.task('copy-to-build', [
	'copy-to-build:css',
	'copy-to-build:js',
	'copy-to-build:fonts',
	'copy-to-build:other'
]);