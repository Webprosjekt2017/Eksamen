'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function () {
  return gulp.src('./DEV/sass/*.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./assests'));
});

gulp.task('default', function () {
  gulp.watch('./DEV/sass/*.sass', ['sass']);
});
