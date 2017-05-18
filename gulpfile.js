"use strict";

var   gulp        = require('gulp');
var   sass        = require('gulp-sass');
const pug         = require('gulp-pug2');
var   browserSync = require('browser-sync').create();
var   rename      = require('gulp-rename');
var   browserify  = require('gulp-browserify');
const autoprefix  = require('gulp-autoprefixer');

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:4000/"
    });
});

gulp.task('reload', function() {
  setTimeout(function() { browserSync.reload(); }, 900);
});

gulp.task('pug', function() {
    return gulp.src('./_pug/**/*.pug')
        .pipe(pug({ yourTemplate: 'Locals' }))
        .pipe(rename({extname: '.php'}))
        .pipe(gulp.dest('src/'));
});

gulp.task('sass', function () {
  return gulp.src(['./_sass/*.sass', './_sass/*.scss'])
    .pipe(sass().on('error', sass.logError)) //{outputStyle: 'compressed'}
    .pipe(autoprefix())
    .pipe(gulp.dest('src/assets/css'));
});

gulp.task('css_inject', function() {
  return gulp.src('src/assets/css/*.css')
    .pipe(browserSync.reload({ stream:true }));
});

gulp.task('js_browserify', function() {
  return gulp.src('_js/*.js')
    .pipe(browserify())
    .pipe(gulp.dest('src/assets/js'));
})

gulp.task('default', ['browser-sync'], function () {
  gulp.watch(['_sass/*.sass', '_sass/*.scss'], ['sass']);
  gulp.watch('_pug/**/*.pug', ['pug']);
  gulp.watch('_js/*.js', ['js_browserify']);
  gulp.watch('src/assets/css/*.css', ['css_inject']);
  gulp.watch(['src/**/*.html', 'src/assets/js/*.js', 'src/**/*.php'], ['reload']);
});
