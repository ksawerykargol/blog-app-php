var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css');

gulp.task('buildcss', function(){
	gulp.src('assets-dev/styles/*.css')
	.pipe(cleanCSS())
	.pipe(gulp.dest('assets-prod/styles'));
});

gulp.task('copyimages', function(){
	gulp.src('assets-dev/images/*.png')
	.pipe(gulp.dest('assets-prod/images'));
});