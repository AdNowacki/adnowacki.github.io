var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    svgmin = require('gulp-svgmin'),
    responsive = require('gulp-responsive');

const scripts = [
  'app/src/js/jq.js', 
  'app/src/js/hammer.js', 
  'app/src/js/slick.min.js', 
  'app/src/js/main.js'
];

const styles = 'app/src/scss/style.scss';

const images = 'app/src/images/*';

gulp.task('sass', function(){
  return gulp.src(styles)
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

gulp.task('imagemin', function(){
  return gulp.src(images)
  .pipe(imagemin(
    {
      interlaced: true,
      progressive: true,
      optimizationLevel: 5,
      svgoPlugins: [
        // {removeViewBox: true},
        {cleanupIDs: true}
      ]
    }
  ))
  .pipe(gulp.dest('app/dist/assets/images'))
});

gulp.task('scripts', function() {
  return gulp.src(scripts)
    .pipe(concat('main.js'))
    .pipe(gulp.dest('app/dist/'))
    .pipe(rename('main.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('app/dist/'));
});

gulp.task('svgmin', function () {
  return gulp.src(images+'.svg')
      .pipe(svgmin())
      .pipe(gulp.dest('app/dist/images'));
});


gulp.task('responsive-images', function () {
  return gulp.src('app/src/images/*.{jpg,png}')
    .pipe(responsive({
      '*': [{
              width: 400,
              rename: {
                suffix: '-w400',
              },
            }, 
            {
              width: 768,
              rename: {
                suffix: '-w768',
              },
            }],
    }))
    .pipe(gulp.dest('app/dist/images'));
});

gulp.task('watch', function(){
  gulp.watch('app/src/scss/**/*.scss', ['sass']); 
  gulp.watch('app/src/scss/**/*.scss', ['sass-production']); 
  gulp.watch('app/src/js/**/*.js', ['scripts']); 
  gulp.watch('app/src/images/**/*', ['imagemin']); 
  // gulp.watch('app/src/images/**/*', ['responsive-images']); 
})

gulp.task('default', ['sass', 'imagemin', 'sass-production', 'scripts', 'svgmin', 'watch']);