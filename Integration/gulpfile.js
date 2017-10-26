/* gabriel/saint-leonart
 *
 * /gulpfile.js - Gulp tasks
 *
 *
 * coded by gabriel!
 *
 * started at 13/07/2017
 */

 var gulp = require( "gulp" ),
     htmlmin = require('gulp-htmlmin'),
     image = require( "gulp-image" ),
     sass = require( "gulp-sass" ),
     autoprefixer = require( "gulp-autoprefixer" ),
     csso = require( "gulp-csso" ),
     //pug = require( "gulp-pug" ),
     browserSync = require("browser-sync").create(),
     babel = require( "gulp-babel" );

// --- Task for browser sync
   gulp.task('serve', ['css'], function() {

        browserSync.init({
            proxy:'leonart.app',
        });

});

// --- Task for images
gulp.task( "images", function(){
    gulp.src( "src/img/**" )
        .pipe( image() )
        .pipe( gulp.dest( "assets/img" ) )
} );
// --- Task for styles
gulp.task( "css", function(){
    gulp.src( "src/sass/**/*.scss" )
        .pipe( sass().on( "error", sass.logError ) )
        .pipe( autoprefixer() )
        .pipe( csso() )
        .pipe( gulp.dest( "assets/css" ) )
        .pipe( browserSync.stream());
} );
// --- Task for html
gulp.task( "html", function(){
    gulp.src( "src/*.html" )
        .pipe(htmlmin({collapseWhitespace: true}))
        .pipe( gulp.dest( "." ) );
        //.pipe( browserSync.stream() );
} );
// --- Task for fonts
gulp.task( "font", function(){
    gulp.src( "src/fonts/**" )
        .pipe( gulp.dest( "assets/fonts" ) );
} );
// --- Task for js
gulp.task( "js", function(){
    gulp.src( "src/js/**/*.js" )
        .pipe( babel() )
        .pipe( gulp.dest( "assets/js" ) )
        .pipe( browserSync.stream());
} );
// --- Watch tasks
gulp.task( "watch", function(){
    gulp.watch( "src/images/**", [ "images" ] );
    gulp.watch( "src/fonts/**", [ "font" ] );
    gulp.watch( "src/sass/**/*.scss", [ "css" ] );
    //gulp.watch( 'src/sass/**/*.scss').on('change',browserSync.reload)
    gulp.watch( "src/*.html", [ "html" ] );
    gulp.watch( "src/js/**/*.js", [ "js" ] );
    gulp.watch( '*.php').on('change',browserSync.reload);
});
// --- Aliases
gulp.task( "default", [ "images", "font", "html", "css", "js", "serve" ] );
gulp.task( "work", [ "default", "watch" ] );
