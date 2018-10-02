const gulp = require('gulp');
const watch = require('gulp-watch');

//**
//
// Watch it babe
//
//**
gulp.task('watch', () => {
  gulp.watch(`source-files/assets/scss/**/*`, ['sass']);
  gulp.watch(`source-files/assets/js/**/*`, ['webpack']);
  gulp.watch(`source-files/assets/img/**/*`, ['images']);
  gulp.watch(`source-files/views/**/*`, ['assemble']);
  gulp.watch(`source-files/data/**/*.{json,yml}`, ['assemble']);
});
