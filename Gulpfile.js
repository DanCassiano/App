
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var gulp        = require('gulp');
var sass        = require('gulp-sass');
var sourcemaps  = require('gulp-sourcemaps');
var filter      = require('gulp-filter');

var sassOptions = {
	errLogToConsole: true,
	outputStyle: 'compressed',
	includePaths: ['app-admin/assets/scss']
};


// tarefa do SASS
gulp.task('sass', function () {
	return gulp
		.src('app-admin/assets/scss/app.scss')
		.pipe( sourcemaps.init() )
		.pipe( sass( sassOptions ).on('error', sass.logError)  ) // compile sass
		.pipe( sourcemaps.write() )
		.pipe( gulp.dest('app-admin/assets/css/') ) // diretorio de saida
		.pipe( filter('app-admin/assets/css/*.css') ) 
		.pipe( reload({stream:true}) )
		.resume();
});

gulp.task('browser-sync', function() {
    browserSync.init(['app-admin/assets/css/*.css','app-admin/view/*.php','app-admin/modulos/**/*.php'],
    {
        proxy: "http://localhost/app/app-admin"
    });
});


gulp.task('watch', function() {
	return gulp
		.watch('app-admin/assets/scss/*.scss', ['sass'])
			.on('change', function(event) {
				console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
				browserSync.relaod();
			});
});

// tarefa padrao do Gulp
gulp.task('default', ['sass', 'browser-sync'], function () {
    gulp.watch("app-admin/assets/scss/*.scss", ['sass']);
});

