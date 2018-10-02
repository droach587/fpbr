const gulp = require('gulp');
const iconfont = require('gulp-iconfont');
const consolidate = require('gulp-consolidate');

//**
//
// Generate Icon font form svgs
// Uncomment include in scss file
//
//**
gulp.task('iconfont', function(){
  gulp.src(['source-files/assets/icons/svgs/*.svg'])
    .pipe(iconfont({
      fontName: 'custom-icon-font',
      formats: ['ttf', 'eot', 'woff', 'svg'],
      normalize: true,
      fontHeight: 1100
    }))
    .on('glyphs', function(glyphs, options) {
      gulp.src('source-files/assets/icons/_icon-font.scss')
        .pipe(consolidate('lodash', {
          glyphs: glyphs,
          fontName: 'custom-icon-font',
          fontPath: '../assets/fonts/icons/',
          className: 'i'
        }))
        .pipe(gulp.dest('source-files/assets/scss/base'));
    })
    .pipe(gulp.dest('source-files/assets/fonts/icons'));
});
