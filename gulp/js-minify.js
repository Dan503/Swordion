// Include gulp
var gulp = require('gulp');

// plugins
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

//minify all files
gulp.task('js-merge', function() {
    return gulp.src(['prototype/assets/js/generated-JS/*.js','!prototype/assets/js/generated-JS/*.min.js'])
        .pipe(rename(fileName+'.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('prototype/assets/js'));
});
