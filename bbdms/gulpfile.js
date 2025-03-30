var gulp = require('gulp');
var browserSync = require('browser-sync').create();

// Copy vendor files from /node_modules into /vendor
gulp.task('copy', function(done) {
    // Copy Bootstrap files
    gulp.src(['node_modules/bootstrap/dist/**/*', '!**/npm.js', '!**/bootstrap-theme.*', '!**/*.map'])
        .pipe(gulp.dest('vendor/bootstrap'));

    // Copy jQuery files
    gulp.src(['node_modules/jquery/dist/jquery.js', 'node_modules/jquery/dist/jquery.min.js'])
        .pipe(gulp.dest('vendor/jquery'));

    // Copy Tether files
    gulp.src(['node_modules/tether/dist/js/*.js'])
        .pipe(gulp.dest('vendor/tether'));

    done(); // Mark task as complete
});

// Configure the browserSync task
gulp.task('browserSync', function(done) {
    browserSync.init({
        server: {
            baseDir: './'  // Ensure it's pointing to the correct directory
        },
        notify: false // Disable notifications
    });
    done();
});

// Watch task for live reloading
gulp.task('watch', function() {
    gulp.watch('css/*.css').on('change', browserSync.reload);
    gulp.watch('*.html').on('change', browserSync.reload);
    gulp.watch('js/*.js').on('change', browserSync.reload); // Watch for JS changes
});

// Default task
gulp.task('default', gulp.series('copy'));

// Dev task with browserSync and file watching
gulp.task('dev', gulp.series('copy', 'browserSync', 'watch'));