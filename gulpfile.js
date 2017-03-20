'use strict';

var   gulp        = require('gulp');
var   sass        = require('gulp-sass');
const pug         = require('gulp-pug2');
var   browserSync = require('browser-sync').create();

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:4000/"
    });
});

gulp.task('reload', function() {
  browserSync.notify("Compiling, please wait!", 1000);
  setTimeout(function() {browserSync.reload();}, 900);
});

gulp.task('pug', function() {
    return gulp.src('./_pug/*.pug')
        .pipe(pug({ yourTemplate: 'Locals' }))
        .pipe(gulp.dest('src/pages'));
});

gulp.task('sass', function () {
  return gulp.src(['./_sass/*.sass', './_sass/*.scss'])
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('src/assets/css'))
    .pipe(browserSync.reload({ stream:true }));
});

gulp.task('default', ['browser-sync'], function () {
  gulp.watch(['./_sass/*.sass', './_sass/*.scss'], ['sass']);
  gulp.watch('./_pug/*.pug', ['pug']);
  gulp.watch(['src/pages/*.html', 'src/assets/js/*.js', '*.php'], ['reload']);
});
