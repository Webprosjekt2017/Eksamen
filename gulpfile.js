'use strict';

var   gulp        = require('gulp');
var   sass        = require('gulp-sass');
const pug         = require('gulp-pug2');
var   browserSync = require('browser-sync').create();
var   rename      = require('gulp-rename');

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:4000/"
    });
});

gulp.task('reload', function() {
  setTimeout(function() { browserSync.reload(); }, 900);
});

gulp.task('pug_pages', function() {
    return gulp.src('./_pug/pages/*.pug')
        .pipe(pug({ yourTemplate: 'Locals' }))
        .pipe(rename({extname: '.php'}))
        .pipe(gulp.dest('src/pages'));
});

gulp.task('pug_inc', function() {
    return gulp.src('./_pug/includes/*.pug')
        .pipe(pug({ yourTemplate: 'Locals' }))
        .pipe(rename({extname: '.php'}))
        .pipe(gulp.dest('src/includes'));
});

gulp.task('sass', function () {
  return gulp.src(['./_sass/*.sass', './_sass/*.scss'])
    .pipe(sass().on('error', sass.logError)) //{outputStyle: 'compressed'}
    .pipe(gulp.dest('src/assets/css'));
});

gulp.task('css_inject', function() {
  return gulp.src('src/assets/css/*.css')
    .pipe(browserSync.reload({ stream:true }));
});

gulp.task('default', ['browser-sync'], function () {
  gulp.watch(['_sass/*.sass', '_sass/*.scss'], ['sass']);
  gulp.watch('_pug/pages/*.pug', ['pug_pages']);
  gulp.watch('_pug/includes/*.pug', ['pug_inc']);
  gulp.watch('src/assets/css/*.css', ['css_inject']);
  gulp.watch(['src/**/*.html', 'src/assets/js/*.js', 'src/**/*.php'], ['reload']);
});
