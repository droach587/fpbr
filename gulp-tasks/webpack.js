const gulp = require('gulp');
const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const gulpIf = require('gulp-if');
const gulpVars = require('require-dir')('../gulp-vars');
const isProduction = gulpVars.vars();
const path = require('path');
const BabiliPlugin = require("babili-webpack-plugin");
const ModernizrWebpackPlugin = require("modernizr-webpack-plugin");

//**
//
// Webpack
//
//**

var config = {
  "options" : [
		"setClasses",
		"addTest",
		"html5printshiv",
		"testProp",
		"fnBind",
	],
  "feature-detects": [
    'touchevents',
  ],
  minify: true,
}

gulp.task('webpack', () => {
  return gulp.src('source-files/assets/js/main.js')
    .pipe(
      webpackStream({
        output: {
          filename: 'bundle.js',
        },
        watch: false,
        devtool: 'eval',
        entry: [
          'babel-polyfill',
          './source-files/assets/js/main.js'
        ],
        plugins: [
          new ModernizrWebpackPlugin(config),
          new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery"
          }),
          new webpack.optimize.UglifyJsPlugin({
            sourceMap: true,
            compress: {
              warnings: false,
              comparisons: false,  // don't optimize comparisons
            },
        }),
        ],
        module: {
          loaders: [
            {
              test: /\.js$/,
              exclude: /node_modules/,
              use: {
                loader: 'babel-loader',
                options: {
                  presets: ['react','es2015', 'stage-2'],
                  plugins: ['transform-decorators-legacy','transform-class-properties']
                }
              }
            },
          ],
        },
        resolve: {
          alias: {
            jquery: path.resolve('node_modules', 'jquery/dist/jquery.js'),
            'slick': path.resolve('node_modules', 'slick-carousel/slick/slick.min.js'),
            "mobx" : path.resolve('node_modules', 'mobx/lib/mobx.umd.min.js'),
            "mobx-react" : path.resolve('node_modules', 'mobx-react/index.min.js'),
            "react" : path.resolve('node_modules', 'react/umd/react.production.min.js'),
            "react-dom" : path.resolve('node_modules', 'react-dom/umd/react-dom.production.min.js'),
            'fecha' : path.resolve('node_modules', 'fecha/fecha.js'),
            'axios' : path.resolve('node_modules', 'axios/dist/axios.js'),
            'entities' : path.resolve('node_modules', 'entities/index.js'),
            'moment' : path.resolve('node_modules', 'moment/moment.js'),
            'fancy' : path.resolve('node_modules', 'fancybox/dist/js/jquery.fancybox.pack.js'),
            'fancy-media' : path.resolve('node_modules', 'fancybox/dist/helpers/js/jquery.fancybox-media.js'),
            'waypoints' : path.resolve('node_modules', 'waypoints/lib/noframework.waypoints.js')
          }
        }
      }, webpack)
    )
    .pipe(gulp.dest('wp-content/themes/fpbr/compiled/js'));
});
