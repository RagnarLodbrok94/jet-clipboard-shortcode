// Load all necessary modules.
let rename       = require('gulp-rename'),
	sass         = require('gulp-sass'),
	notify       = require('gulp-notify'),
	autoprefixer = require('gulp-autoprefixer'),
	sourcemaps   = require('gulp-sourcemaps');

const {src, dest, task, watch, series, parallel} = require('gulp');

task('styles', function() {
	return src('assets/scss/styles.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			errorLogToConsole: true,
			outputStyle      : 'compressed'
		}))
		.on('error', console.error.bind(console))
		.pipe(autoprefixer({
			browsers: ['last 10 versions'],
			cascade : false
		}))
		.pipe(rename({suffix: '.min'}))
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./assets/css/'))
		.pipe(notify('Compile Admin Sass Done!'));
});

task('default', parallel('styles'));

task('watch', function() {
	watch('assets/scss/**/*.scss', series('styles'));
});