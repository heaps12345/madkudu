const gulp = require('gulp')
const path = require('path')
const jade = require('gulp-jade')
const less = require('gulp-less')
const autoprefixer = require('gulp-autoprefixer')
const sourcemaps = require('gulp-sourcemaps')
const minifyCSS = require('gulp-clean-css')
const markdown = require('gulp-markdown')
const rename = require('gulp-rename')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const connect = require('gulp-connect')
const open = require('gulp-open')
const browserify = require('browserify')
const livereload = require('gulp-livereload')
const gutil = require('gutil')
const ftp = require('vinyl-ftp')
const clean = require('gulp-clean')
const newer = require('gulp-newer')

const source = require('vinyl-source-stream')

const Paths = {
	HERE: './',
	DEPLOY: [
		'dist/**',
		'dist/.*'
	],
	DIST: 'dist/',
	DIST_JS: 'dist/js/',
	DIST_STATIC: 'dist/static',
	DIST_TOOLKIT_JS: 'dist/js/toolkit.js',
	LESS_TOOLKIT_SOURCES: './less/toolkit-startup.less',
	LESS: [
		'./less/bootstrap/.',
		'./less/madkudu/.',
		'./less/custom/.',
		'./less/*.less'
	],
	LESS_WATCH: './less/**/*.less',
	JADE_WATCH: './jade/**/*.jade',
	JADE: './jade/pages/**/*.jade',
	MARKDOWN: './markdown/*.md',
	DIST_MARKDOWN: './markdown/html',
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
	GOOGLE_VERIFICIATION_FILE: './googlebdc33b3118eeac9b.html',
	STATIC_JS: [
		'./js/vendor/modernizr-custom.js',
		'./js/vendor/parsley.min.js',
		'./js/vendor/moment.min.js',
		'./js/plugins/eonasdan-bootstrap-datetimepicker.min.js'
	],
	SIMULATOR: './js/simulator/simulator.js',
	STATIC: ['./static/**/**'],
	UTILS: [
		'./robots.txt',
		'./madkudu_ico.png',
		'./sitemap.xml',
		'./.htaccess',
    './_redirects'
	]
}

gulp.task('default', ['build', 'serve'])

gulp.task('watch', function () {
	livereload.listen()
	gulp.watch(Paths.LESS_WATCH, ['less-min'])
	gulp.watch(Paths.LESS, ['less-min'])
	gulp.watch(Paths.JS, ['js-min'])
	gulp.watch(Paths.JADE_WATCH, ['jade'])
	gulp.watch(Paths.MARKDOWN, ['jade'])
	// gulp.watch(Paths.STATIC, ['static'])
})

gulp.task('serve', ['server'], function () {
	gulp.src(__filename)
		.pipe(open({uri: 'http://localhost:8080/index.html'}))
})

gulp.task('server', ['watch'], function () {
	connect.server({
		root: 'dist',
		port: 8080,
		livereload: false
	})
})

gulp.task('build', ['less-min', 'js-min', 'jade', 'utils', 'simulator', 'static', 'google_verification'])

gulp.task('less-min', function () {
	gulp.src(Paths.LESS_TOOLKIT_SOURCES)
		.pipe(sourcemaps.init())
		.pipe(less())
		// .pipe(minifyCSS())
		.pipe(autoprefixer())
		.pipe(rename('madkudu.min.css'))
		.pipe(sourcemaps.write(Paths.HERE))
		.pipe(gulp.dest(Paths.DIST))
		.pipe(livereload())
})

gulp.task('clean-js', function () {
	return gulp.src(Paths.DIST_JS, { read: false })
		.pipe(clean())
})

gulp.task('vendor-js', ['clean-js'], function () {
	gulp.src(Paths.STATIC_JS)
		.pipe(gulp.dest(Paths.DIST_JS))
})

gulp.task('js', ['vendor-js'], function () {
	gulp.src(Paths.JS)
		.pipe(concat('toolkit.js'))
		.pipe(gulp.dest(Paths.DIST_JS))
})

// the minimize doesn't seem to be working
gulp.task('js-min', ['js'], function () {
	gulp.src(Paths.DIST_TOOLKIT_JS)
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(Paths.DIST_JS))
		.on('error', gutil.log)
		.pipe(livereload())
})

gulp.task('markdown', function () {
	return gulp.src(Paths.MARKDOWN)
		.pipe(markdown())
		.pipe(gulp.dest(Paths.DIST_MARKDOWN))
})

gulp.task('jade', ['markdown'], function () {
	gulp.src(Paths.JADE)
    .pipe(newer(Paths.DIST))
		.pipe(jade())
		.pipe(gulp.dest(Paths.DIST))
		.pipe(livereload())
})

gulp.task('static', function () {
	gulp.src(Paths.STATIC)
		.pipe(gulp.dest(Paths.DIST_STATIC))
		.pipe(livereload())
})

gulp.task('google_verification', function () {
	gulp.src(Paths.GOOGLE_VERIFICIATION_FILE)
		.pipe(gulp.dest(Paths.DIST))
})

gulp.task('utils', function () {
	gulp.src(Paths.UTILS)
		.pipe(gulp.dest(Paths.DIST))
})

gulp.task('simulator', function () {
	browserify(Paths.SIMULATOR)
		.bundle()
		.pipe(source('simulator.js'))
		.pipe(gulp.dest(Paths.DIST_JS))
})
