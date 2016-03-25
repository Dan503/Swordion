// Include gulp
var gulp = require('gulp');

// plugins
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');

// Concatenate & Minify JS
gulp.task('js-merge', function() {
    return gulp.src('assets/js/modules/**/*.js')
		.pipe(sourcemaps.init())
	        .pipe(concat('merged.js'))
		.pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/js/'))
});


gulp.task('js', function() {
    return gulp.src('prototype/00-source-files/02-js/**/*.js')//needs work, doesn't act like how the current version acts
        .pipe(concat('merged.js'))
        .pipe(gulp.dest('prototype/assets/js/generated-JS'))
        .pipe(rename('merged.min.js'))
});
