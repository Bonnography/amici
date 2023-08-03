const config = require('../../gulpconfig')(),
    $ = require('gulp-load-plugins')(),
    gulp = require('gulp');


function gzip () {
    return gulp.src(config.target.css + '*.css')
        .pipe($.gzip())
        .pipe(gulp.dest(config.target.css));
}


function scssMain () {
    return gulp.src(config.source.scssSelection)
        .pipe($.sourcemaps.init())
        .pipe($.sass())
        .pipe($.autoprefixer({
            cascade: false
        }))
        .pipe($.debug())
        .pipe($.cssbeautify({
            indent: '   ',
            openbrace: 'seperate-line',
            autosemicolon: true
        }))
        .pipe(gulp.dest(config.source.css))
        .pipe($.cssmin())
        .pipe($.rename({
            suffix: '.min'
        }))
        .pipe($.sourcemaps.write('./'))
        .pipe(gulp.dest(config.target.css));
}

const scss = gulp.series(scssMain, gzip);
exports.scss = scss;
gulp.task('css', scssMain);