// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var gulpSequence = require('gulp-sequence').use(gulp);

// Lint Task
gulp.task('lint', function() {
    return gulp.src('assets/js/modules/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
var sass_output_files = 'prototype/00-source-files/ZZ-Swordion-DO-NOT-EDIT/sass/output-files/';

function compileSass(src){
    return gulp.src(sass_output_files+src+'.scss')
		.pipe(sassGlob())
        .pipe(sass())
        .pipe(gulp.dest('assets/css'));
}

gulp.task('sass', function() {
	compileSass('modern');
	compileSass('ie9');
	compileSass('ie8');
});

// Concatenate & Minify JS
gulp.task('js', function() {
    return gulp.src('assets/js/modules/**/*.js')
        .pipe(concat('merged.js'))
        .pipe(gulp.dest('assets/js/'))
        .pipe(rename('merged.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/js/modules/**/*.js', ['lint', 'js']);
    gulp.watch('assets/sass/modules/**/*.scss', ['sass']);
});

//define the order gulp tasks run in when running default gulp task
gulp.task('default', gulpSequence(['lint', 'js', 'sass'], 'watch'));