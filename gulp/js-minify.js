// Include gulp
var gulp = require('gulp');

// plugins
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

//Can't save this globaly :(
var splits = [
	//base splits
	//don't edit unless you know what you are doing
	'isConstant',
	'prototypeOnly',
	'isLegacy',
	'isModern',

	//extra splits
	//you can get rid of this if you also remove it in the base-PHP/foot.php file
	'isHome',
]

//minify all files
function minifyJS(fileName){
    return gulp.src(['prototype/assets/js/generated-JS/'+fileName+'.js','!prototype/assets/js/generated-JS/'+fileName+'.min.js'])
        .pipe(rename(fileName+'.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('prototype/assets/js'));
}

// Gulp task for minifying the JS
gulp.task('js-minify', function() {
	for (split of splits) {
		minifyJS(split);
	}
});
