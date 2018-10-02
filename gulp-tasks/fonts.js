//**
//
// Move fonts over
//
//**
const gulp = require('gulp');

gulp.task('fonts', function() {
  return gulp.src('source-files/assets/fonts/**/*')
    .pipe(gulp.dest('wp-content/themes/fpbr/compiled/assets/fonts'));
});
