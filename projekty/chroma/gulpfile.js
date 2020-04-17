const gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify-es').default,
    rename = require('gulp-rename'),
    purgecss = require('gulp-purgecss')

const scripts = [
  'app/src/js/main.js'
];

const styles = 'app/src/scss/style.scss';
const lessImportansStyles = 'app/src/scss/less-important-style.scss'

gulp.task('sass', function(){
  return gulp.src(styles)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('app/dist/'))
});

gulp.task('sass-less-important', function(){
  return gulp.src(lessImportansStyles)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('app/dist/'))
});

gulp.task('sass-production', function(){
  return gulp.src(styles)
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(rename('style.production.css'))
    .pipe(gulp.dest('app/dist/'))
});

gulp.task('sass-less-important-production', function(){
  return gulp.src(lessImportansStyles)
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(rename('less-important-style.production.css'))
    .pipe(gulp.dest('app/dist/'))
});

gulp.task('scripts', function() {
  return gulp.src(scripts)
    .pipe(concat('main.js'))
    .pipe(gulp.dest('app/dist/'))
    .pipe(rename('main.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('app/dist/'));
});

gulp.task('purgecss', function() {
  return gulp
    .src('app/dist/style.production.css')
    .pipe(rename('style.purge.css'))
    .pipe(
      purgecss({
        content: ['app/*.php', 'app/*.html']
      })
    )
    .pipe(gulp.dest('app/dist'))
})

gulp.task('watch', function(){
  gulp.watch('app/src/scss/**/*.scss', ['sass', 'sass-less-important']); 
  gulp.watch('app/src/scss/**/*.scss', ['sass-production', 'sass-less-important-production']); 
  // gulp.watch('app/src/scss/**/*.scss', ['purgecss']); 
  gulp.watch('app/src/js/**/*.js', ['scripts']); 
});


gulp.task('default', ['sass', 'sass-production', 'sass-less-important', 'sass-less-important-production', 'scripts', 'watch']);