const gulp = require('gulp');
const browserSync = require('browser-sync');
const reload = browserSync.reload;

gulp.task('sync', function() {
  browserSync({
    proxy: "fpbr.local",
  });

  gulp.watch("source-files/assets/**/*").on('change', reload);
});
