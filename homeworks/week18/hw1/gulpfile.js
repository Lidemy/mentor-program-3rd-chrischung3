/* eslint-disable */

// require
const gulp = require('gulp');
const sass = require('gulp-sass');
const babel = require('gulp-babel');
const minifyCSS = require('gulp-minify-css');
const uglify = require('gulp-uglify');

// 建立 task
gulp.task('css', function () {
  // 檔案來源
  return gulp.src('./app.sass')

  // 在 pipe 中放進 plug-in 來解 sass
    .pipe(sass().on('error', sass.logError))

  // minify
    .pipe(minifyCSS({
      keepBreaks: true,
    }))

  // 設定 destination
    .pipe(gulp.dest('./build'));
});

gulp.task('js', function () {
  return gulp.src('./index.js')
    .pipe(babel({
      presets: ['@babel/env'],
    }))
    .pipe(uglify())
    .pipe(gulp.dest('./build'));
});

// 執行
gulp.task('default', gulp.series('css', 'js'));
