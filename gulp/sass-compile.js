// LOAD GULP
var gulp = require('gulp');

// LOAD PLUGINS

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
//required for renaming during minification stage
var rename = require('gulp-rename');
//css minification
var cssnano = require('cssnano');
//allows for css injection without full browser refresh
var browserSync = require('browser-sync');
//convert px values to rem values
var pxtorem = require('postcss-pxtorem');

// SASS COMPILATION VARIABLES

var sass_output_files = 'prototype-site/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/';

var browsers = [
	'modern',
	'ie9',
	'ie8',
	'prototype-modern',
	'prototype-ie9',
	'prototype-ie8',
];

//https://www.npmjs.com/package/postcss-pxtorem
var remConversionOptions = {
    rootValue: 10,
    unitPrecision: 5,
    propWhiteList: ['font', 'font-size', 'letter-spacing'],
    selectorBlackList: [],
    replace: false,
    mediaQuery: false,
    minPixelValue: 0
}

var scssTasks = [];


// SASS COMPILATION TASKS

browsers.forEach(function(browser, i){
	scssTasks.push('sass-compile:'+browser);

	gulp.task(scssTasks[i], function() {
	    var processors = [
	        autoprefixer({browsers: ['last 2 versions']}),
			flexibility(),
			pxtorem(remConversionOptions)
	    ];

	    gulp.src(sass_output_files+browser+'.scss')
			.pipe(sassGlob())
			.pipe(sourcemaps.init())
				.pipe(sass().on('error', sass.logError))
		        .pipe(postcss(processors))
			.pipe(sourcemaps.write('./source-maps'))
			.pipe(gulp.dest('prototype-site/assets/css'))
			.on('end', function(){
				if (browser === 'modern'){
					gulp.src('prototype-site/assets/css/modern.css')
						.pipe(browserSync.stream());
					gulp.start('modernizr');
				}

				if (i == browsers.length - 1){
					setTimeout(function(){
						gulp.start('css-minify');
					}, 100);
				}
			});
	});
});

//minifies the css
gulp.task('css-minify', function() {
    return gulp
		.src([
			'prototype-site/assets/css/*.css',
			'!prototype-site/assets/css/*.min.css',
			'!prototype-site/assets/css/prototype-modern.css',
			'!prototype-site/assets/css/prototype-ie8.css',
			'!prototype-site/assets/css/prototype-ie9.css',
		])
        .pipe(rename({suffix: '.min'}))
        .pipe(postcss([cssnano()]))
        .pipe(gulp.dest('build-site/assets/css/'))
		.on('end', function(){
			//just for any extra bits
			gulp.start('copy-to-build:css');
		});
});

gulp.task('sass-compile', scssTasks);
