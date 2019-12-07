const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const rename = require('gulp-rename');

const responsive = require('gulp-responsive');

const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');

const del = require('del');

gulp.task('css', () => {
   return gulp.src('./app/src/styles/**/*.scss')
            .pipe(sourcemaps.init())
            // .pipe(sass({ outputStyle: 'expanded' }))
            .pipe(sass({ outputStyle: 'compressed' }))
            .pipe(autoprefixer({
               cascade: false
            }))
            .pipe(rename({
               dirname: "newdir",
               basename: "newstyle",
               prefix: "prefix-",
               suffix: "-suffix",
               extname: ".css"
             }))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('./app/dist/'))
});

gulp.task('responsive', () => {
   return gulp.src('./app/src/images/*.{png,jpg}')
    .pipe(responsive({
      '*.jpg': {
        width: '50%',
        quality: 50,
        format: 'jpg',
        rename: {
           suffix: '--mobile'
        }
      },
       '*.png': [
         {
           width: 300,
           rename: {
            suffix: '--mobile'
           }
         },{
           width: 300 * 2,
           rename: {
              suffix: '--mobile@2'
           }
         }
       ],
    }))
    .pipe(gulp.dest('./app/dist/images/'));
});

gulp.task('scripts-babel', () => {
   return gulp.src('./app/dist/js/main.js')
   .pipe(babel({
       presets: ['@babel/env']
   }))
   .pipe(gulp.dest('./app/dist/js/'))
});

gulp.task('scripts-concat', () => {
   return gulp.src('./app/src/js/*.js')
    .pipe(concat('main.js'))
    .pipe(gulp.dest('./app/dist/js/'));
});

gulp.task('compress-scripts', () => {
   return gulp.src('./app/dist/js/main.js')
      .pipe(uglify())
      .pipe(rename({
         suffix: ".min",
       }))
      .pipe(gulp.dest('./app/dist/js/'))
});

gulp.task('clean', function() {
   return del(['./app/dist/**']);
});

gulp.task('watch', () => {
   gulp.watch('./app/src/styles/**/*', gulp.series('css'));
   gulp.watch('./app/src/images/*', gulp.series('responsive'));
   gulp.watch('./app/src/js/**/*', gulp.series('scripts-concat', 'scripts-babel', 'compress-scripts'));
});

gulp.task('default', gulp.series('clean', 'css', 'scripts-concat', 'scripts-babel', 'compress-scripts', 'responsive', 'watch'));
