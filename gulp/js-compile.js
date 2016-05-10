// Include gulp
var gulp = require('gulp');

// plugins
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');

//for minification
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

var jsMerge = {
	//this is the only thing you might want to edit
	//it determines what file names are generated
	splits : [
		//base splits
		//don't edit unless you know what you are doing
		'isConstant',
		'prototypeOnly',
		'isLegacy',
		'isModern',

		//extra splits
		//you can get rid of this if you also remove it in the base-PHP/foot.php file
		'isHome',
	],

	//don't edit this bit
	components : [
		{
			folder: 'plugins--3rdParty-JS',
			//isSplit : true //(default)
		}, {
			folder: '00-variables-global-JS',
		}, {
			folder: '01-functions-global-JS',
			isSwordionFile: true,
		}, {
			folder: '01-functions-global-JS',
			isSwordionFile: false,
		}, {
			folder: 'plugins--1stParty-JS',
		}, {
			file: 'doc.ready-open.js',
			isSwordionFile: true,
			//usedIn : 'all', //(default)// other option is an array eg. ['isHome', 'isModern']
		}, {
			folder : 'modules-JS',
		}, {
			file: 'doc.ready-close.js',
			isSwordionFile: true,
		}
	]
};

var JS_merge_files = {};

//generates an array of files delegated to each split
//you shouldn't need to edit this
for (var x = 0; x < jsMerge.splits.length; x++){
	var root = '';
	var split = jsMerge.splits[x];
	JS_merge_files[split] = [];
	for (var i = 0; i < jsMerge.components.length; i++){
		var component = jsMerge.components[i];
		//default "isSwordionFile" to "false"
		component.isSwordionFile = component.isSwordionFile || false;
		//sets the root folder depending on if it is a swordion file or not
		root = component.isSwordionFile ?
			'prototype-site/00-source-files/ZZ-Swordion-DO-NOT-EDIT/js/' : //true
			'prototype-site/00-source-files/02-js/';
		//if it's a file
		if (typeof component.file !== 'undefined'){
			//default "usedIn" to "all"
			component.usedIn = component.usedIn || 'all';
			//if file is used in all, or current split is in the "usedIn" array
			if (component.usedIn == 'all' || component.usedIn.indexOf(split) > -1){
				JS_merge_files[split].push(root + component.file);
			}
		//else it's a folder
		} else {
			//default "isSplit" to "true"
			component.isSplit = component.isSplit || true;
			//if componenet is not split, only load it in the 'isConstant' set
			if (component.isSplit || split == 'isConstant'){
				var currentSplit = component.isSplit ? '/' + split : '';
				JS_merge_files[split].push(root + component.folder + currentSplit + '/**/*.js');
			}
		}
	};
}

//use this to test the output array
//console.log(JS_merge_files);

var mergeTasks = [];

jsMerge.splits.forEach(function(split, i){
	mergeTasks.push('js-compile:'+split);

	gulp.task(mergeTasks[i], function() {
	    gulp.src(JS_merge_files[split])
			.pipe(sourcemaps.init())
		        .pipe(concat(split+'.js'))
			.pipe(sourcemaps.write('./source-maps'))
	        .pipe(gulp.dest('prototype-site/assets/js/generated-JS'))
			.on('end', function(){
				if (i == mergeTasks.length - 1){
					setTimeout(function(){
						gulp.start(['js-minify']);
					}, 100);
				}
			})
	});
});

//minifies the JS
gulp.task('js-minify', function() {
    return gulp
		.src([
			'prototype-site/assets/js/generated-JS/*.js',
			'!prototype-site/assets/js/generated-JS/*.min.js'
		])
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('prototype-site/assets/js/generated-JS/'))
		.on('end', function(){
			gulp.start('copy-to-build:js');
		});
});

gulp.task('js-compile', mergeTasks);
