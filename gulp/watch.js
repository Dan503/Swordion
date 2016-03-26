// Include gulp
var gulp = require('gulp');

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('prototype/00-source-files/02-js/**/*.js', ['js-hint', 'js-compile']);
    gulp.watch(['prototype/00-source-files/**/*.scss','!**/generated-files/**/*.scss'], ['sass']);
});
