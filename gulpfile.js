'use strict';

var   gulp  = require('gulp');
var   sass  = require('gulp-sass');
const pug   = require('gulp-pug2');

gulp.task('pug', function() {
    return gulp.src('./_pug/*.pug')
        .pipe(pug({ yourTemplate: 'Locals' }))
        .pipe(gulp.dest('./_includes'))
});

gulp.task('sass', function () {
  return gulp.src('./_sass/*.sass')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('./assets'));
});

gulp.task('default', function () {
  gulp.watch('./_sass/*.sass', ['sass']);
  gulp.watch('./_pug/*.pug', ['pug'])
});
