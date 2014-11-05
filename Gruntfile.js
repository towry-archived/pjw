module.exports = function (grunt) {
    var 
    debug = false
        , _be, _ma, _co;

    if (debug) {
        _be = !0, _ma = false, _co = false;
    } else {
        _be = !1, _ma = !0, _co = !0;
    }
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        dest: 'assets',
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    '<%= dest %>/css/main.css': 'assets/sass/main.scss'
                }
            }
        },
        watch: {
            sass: {
                files: ['Gruntfile.js', 'assets/sass/*.scss', 'assets/sass/lib/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                    reload: true,
                    debounceDelay: 250,
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.registerTask('default', ['sass', 'watch']);
    grunt.registerTask('concat' ['concat']);
}
