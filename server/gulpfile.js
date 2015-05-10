var elixir = require('laravel-elixir'),
	gulp = require('gulp'),
	concat = require('gulp-concat'),
	browserSync = require('browser-sync'),
	templateCache = require('gulp-angular-templatecache'),
	bowerFiles = require('main-bower-files'),
	reload = browserSync.reload,
	ASSETS_DIR = './resources/assets/';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 * Elixir Task Definitions
 */
elixir(function(mix) {
	// Run before browserify
    mix.task('templates');
});

elixir(function(mix) {
    mix.task('bower');
});

elixir(function(mix) {
    mix.browserify('app.js', 'resources/assets/js/browserified/app.js');
});

elixir(function(mix) {
    mix.scripts(['vendor.js', 'browserified/app.js'], 'public/js/bundle.js');
});

elixir(function(mix) {
    mix.sass('app.scss');
});

/**
 * Custom Gulp Tasks
 */
// Concatenate all main bower files into one file
gulp.task('bower', function() {
	return gulp.src(bowerFiles(), {base: 'bower_components/'})
		.pipe(concat('vendor.js'))
		.pipe(gulp.dest(ASSETS_DIR + 'js'));
});

// Concatenate all angular templates into one file
gulp.task('templates', function() {
	return gulp.src(ASSETS_DIR + 'templates/**/*.html')
		.pipe(templateCache())
		.pipe(gulp.dest(ASSETS_DIR + 'js'));
});

// Creates basic http server and serves files from the public dir
// Also initiates a watcher and will auto reload browser on change
gulp.task('serve', ['watch'], function() {
    browserSync({
        notify: false,
        port: 9000,
        server: {
            baseDir: ['./public/']
        }
    });

    // Reload when public files change
    gulp.watch([
        './public/**/*.{js,html,css}'
    ]).on('change', reload);
});