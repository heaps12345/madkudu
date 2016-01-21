var gulp = require('gulp');
var path = require('path');
var jade = require('gulp-jade');
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var connect = require('gulp-connect');
var open = require('gulp-open');

var Paths = {
	HERE: './',
	DIST: 'dist/',
	DIST_STATIC: 'dist/static',
	DIST_TOOLKIT_JS: 'dist/toolkit.js',
	LESS_TOOLKIT_SOURCES: './less/toolkit*',
	LESS: './less/**/**',
	JADE_WATCH: './jade/**/*.jade',
	JADE: './jade/pages/*.jade',
	JS: [
		'./js/bootstrap/transition.js',
		'./js/bootstrap/alert.js',
		'./js/bootstrap/affix.js',
		'./js/bootstrap/button.js',
		'./js/bootstrap/carousel.js',
		'./js/bootstrap/collapse.js',
		'./js/bootstrap/dropdown.js',
		'./js/bootstrap/modal.js',
		'./js/bootstrap/tooltip.js',
		'./js/bootstrap/popover.js',
		'./js/bootstrap/scrollspy.js',
		'./js/bootstrap/tab.js',
		'./js/custom/*',
		'./js/madkudu/**.js',
	],
	STATIC: ['./static/**/**']
};

gulp.task('default', ['build', 'serve']);

gulp.task('build', ['less-min', 'js-min', 'jade', 'static']);

gulp.task('watch', function () {
	gulp.watch(Paths.LESS, ['less-min']);
	gulp.watch(Paths.JS,   ['js-min']);
	gulp.watch(Paths.JADE_WATCH, ['jade']);
	gulp.watch(Paths.STATIC, ['static']);
});

gulp.task('docs', ['server_docs'], function () {
	gulp.src(__filename)
		.pipe(open({uri: 'http://localhost:9001/docs/'}));
});

gulp.task('server_docs', function () {
	connect.server({
		root: 'docs',
		port: 9001,
		livereload: true
	});
});

gulp.task('serve', ['server'], function () {
	gulp.src(__filename)
		.pipe(open({uri: 'http://localhost:9001/index.html'}));
});

gulp.task('server', ['watch'], function () {
	connect.server({
		root: 'dist',
		port: 9001,
		livereload: true
	});
});

gulp.task('less', function () {
	return gulp.src(Paths.LESS_TOOLKIT_SOURCES)
		.pipe(sourcemaps.init())
		.pipe(less())
		.pipe(autoprefixer())
		.pipe(sourcemaps.write(Paths.HERE))
		.pipe(gulp.dest('dist'));
});

gulp.task('less-min', ['less'], function () {
	return gulp.src(Paths.LESS_TOOLKIT_SOURCES)
		.pipe(sourcemaps.init())
		.pipe(less())
		.pipe(minifyCSS())
		.pipe(autoprefixer())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(sourcemaps.write(Paths.HERE))
		.pipe(gulp.dest(Paths.DIST));
});

gulp.task('js', function () {
	return gulp.src(Paths.JS)
		.pipe(concat('toolkit.js'))
		.pipe(gulp.dest(Paths.DIST));
});

gulp.task('js-min', ['js'], function () {
	return gulp.src(Paths.DIST_TOOLKIT_JS)
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(Paths.DIST));
});

gulp.task('jade', function () {
	return gulp.src(Paths.JADE)
		.pipe(jade())
		.pipe(gulp.dest(Paths.DIST));
});

gulp.task('static', function () {
	return gulp.src(Paths.STATIC)
  		.pipe(gulp.dest(Paths.DIST_STATIC));
});
