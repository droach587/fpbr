const gulp = require('gulp');
const gulpVars = require('require-dir')('../gulp-vars');
const isProduction = gulpVars.vars();
const sass = require('gulp-sass');
const sassGlob = require('gulp-sass-glob');
const sourcemaps = require('gulp-sourcemaps');
const gulpIf = require('gulp-if');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');

//**
//
// Sassy Sass
//
//**
var sassPaths = [
  'node_modules/foundation-sites/scss',
  'node_modules/slick-carousel/slick',
  'node_modules/fancybox/dist/scss'
];
var compress = 'uncompressed';
compress = gulpIf(isProduction, 'compressed');

gulp.task('sass', () => {
  return gulp.src('source-files/assets/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(sass({
      includePaths: sassPaths,
      outputStyle: compress,
    }).on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('wp-content/themes/fpbr/compiled/css'));
});
