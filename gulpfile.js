var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('sass', function(){
    return gulp.src('./scss/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('./css/'));
});

gulp.task('watch', function() {
    gulp.watch('./scss/*.scss');
});
