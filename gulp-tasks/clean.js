//**
//
// Clean the build folder out!
//
//**
const gulp = require('gulp');
const clean = require('gulp-clean');

gulp.task('clean:build', cb => {
  return gulp.src('wp-content/themes/fpbr/compiled', {read: false})
    .pipe(clean());
  cb();
});
