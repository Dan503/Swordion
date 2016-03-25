// Include gulp
var gulp = require('gulp');

// plugins
var jshint = require('gulp-jshint');

// Check JS for errors
gulp.task('js-hint', function() {
    return gulp.src('assets/js/modules/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});
