
// Load gulp
var gulp = require('gulp');

// load plugins
var _delete = require('del');

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

gulp.task('clean-build:css', function(){
	return _delete([
		root.build+paths.css+'**/*'
	]);
});

gulp.task('clean-build:js', function(){
	return _delete([
		root.build+paths.js+'**/*'
	]);
});

gulp.task('clean-build:fonts', function(){
	return _delete([
		root.build+paths.fonts+'**/*'
	]);
});

gulp.task('clean-build:other', function(){
	return _delete(exclusions('build'));
});

gulp.task('copy-to-build:css', ['clean-build:css'], function(){
	gulp.src(root.proto+paths.css+'**/*')
		.pipe(gulp.dest(root.build+paths.css));
});

gulp.task('copy-to-build:js', ['clean-build:js'], function(){
	gulp.src(root.proto+paths.js+'**/*')
		.pipe(gulp.dest(root.build+paths.js));
});

gulp.task('copy-to-build:fonts', ['clean-build:fonts'], function(){
	gulp.src(root.proto+paths.fonts+'**/*')
		.pipe(gulp.dest(root.build+paths.fonts));
});

gulp.task('copy-to-build:other', ['clean-build:other'], function(){
	gulp.src(exclusions('prototype'))
	.pipe(gulp.dest(root.build+paths.assets));
});

gulp.task('copy-to-build', [
	'copy-to-build:css',
	'copy-to-build:js',
	'copy-to-build:fonts',
	'copy-to-build:other'
]);