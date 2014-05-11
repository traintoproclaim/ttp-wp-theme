var gulp = require('gulp');
var gutil = require('gulp-util');
var exec = require('gulp-exec');
var less = require('gulp-less');

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('less', function() {
	gulp.src('./less/style.less')
	.pipe(less())
	.pipe(gulp.dest('./css'));
});

gulp.task('watch', function() {
	gulp.watch('less/*.less', ['less']);
});

