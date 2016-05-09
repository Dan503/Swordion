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
//required for renaming during minification stage
var rename = require('gulp-rename');
//css minification
var cssnano = require('cssnano');
//allows for css injection without full browser refresh
var browserSync = require('browser-sync');

// Compile the Sass
var sass_output_files = 'prototype-site/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/';

function compileSass(src){
    var processors = [
        autoprefixer({browsers: ['last 2 versions']}),
		flexibility()
    ];

    gulp.src(sass_output_files+src+'.scss')
		.pipe(sassGlob())
		.pipe(sourcemaps.init())
			.pipe(sass().on('error', sass.logError))
	        .pipe(postcss(processors))
		.pipe(sourcemaps.write('./source-maps'))
		.pipe(gulp.dest('prototype-site/assets/css'))
		.on('end', function(){
			if (src === 'modern'){
				gulp.src('prototype-site/assets/css/modern.css')
					.pipe(browserSync.stream());
			}
		});
}


var browsers = [
	'modern',
	'ie9',
	'ie8'
];

var scssTasks = [];

for (var i = 0; i < browsers.length; i++) {
	var browser = browsers[i];
	scssTasks.push('sass-compile-'+browser);

	/*This doesn't work :(
	gulp.task(scssTasks[i], function() {
		return compileSass(browser);
	});
	*/
};

//have to use this ugly way instead
gulp.task(scssTasks[0], function() {
	return compileSass(browsers[0]);
});
gulp.task(scssTasks[1], function() {
	return compileSass(browsers[1]);
});
gulp.task(scssTasks[2], function() {
	return compileSass(browsers[2]);
});


//minifies the css
gulp.task('sass-compile-minify', scssTasks, function() {
    return gulp
		.src([
			'prototype-site/assets/css/*.css',
			'!prototype-site/assets/css/*.min.css'
		])
        .pipe(rename({suffix: '.min'}))
        .pipe(postcss([cssnano()]))
        .pipe(gulp.dest('prototype-site/assets/css/'))
		.on('end', function(){
			gulp.start('copy-to-build:css');
		});
});

