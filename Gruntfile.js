module.exports = function(grunt) {

    grunt.initConfig({

        // Metadata.
        pkg: grunt.file.readJSON('package.json'),

        /**
         * Define project constants, dependencies, etc.
         */
        project: {
            assets: {
                js: 'assets/js',
                css: 'assets/css',
                bower: 'assets/bower_components'
            },
            src: {
                all: '_src',
                scss: '_src/scss',
                js: '_src/js'
            },
            dist: 'assets/dist',
            dependencies: {
                default: [
                    '<%= project.assets.bower %>/foundation/js/foundation/foundation.js',
                    '<%= project.assets.bower %>/foundation/js/foundation/foundation.topbar.js',
                    '<%= project.assets.bower %>/foundation/js/foundation/foundation.offcanvas.js',
                    '<%= project.assets.bower %>/foundation/js/foundation/foundation.dropdown.js',
                    '<%= project.assets.bower %>/modernizr/modernizr.js',
                    '<%= project.assets.bower %>/holderjs/holder.js',
                    '<%= project.assets.bower %>/fastclick/lib/fastclick.js',
                    '<%= project.assets.bower %>/retina.js/dist/retina.js',                   
                    '<%= project.src.js %>/custom.js'
                ],
                ie: [
                    '<%= project.assets.bower %>/jquery-placeholder/jquery.placeholder.js',
                    '<%= project.assets.bower %>/html5shiv/dist/html5shiv.js',
                    '<%= project.assets.bower %>/respond/dest/respond.src.js'
                ]
            }
        },

        banner: '/*! <%= pkg.name %> <%= pkg.version %> - ' + // name/version
            '<%= grunt.template.today("yyyy-mm-dd HH:MM:ss") %>\n' + // current year
            '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' + // homepage (not currently set in package.json)
            '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>\n' +
            '* License: <%= pkg.license %>\n' +
            '* Packages: <%= _.map(pkg.devDependencies, function(package, key) {return key}).join(", ") %> */\n\n',

        /**
         * JS tasks
         * - concatenation of files
         * - minification
         */
        concat: {
            options: {
                banner: '<%= banner %>',
                stripBanners: true
            },
            main: { // main js files
                src: '<%= project.dependencies.default %>',
                dest: '<%= project.assets.js %>/base.js'
            },
            ie: { // ie support js files
                src: '<%= project.dependencies.ie %>',
                dest: '<%= project.assets.js %>/ie.js'
            }
        },
        uglify: {
            options: {
                banner: '<%= banner %>'
            },
            dist: {
                files: {
                    '<%= project.dist %>/base.min.js': '<%= concat.main.dest %>',
                    '<%= project.dist %>/ie.min.js': '<%= concat.ie.dest %>'
                }
            }
        },

        /**
         * CSStasks
         * - SASS compilation
         * - minification
         */
        sass: {
            options: {
                includePaths: ['<%= project.assets.bower %>/foundation/scss', '<%= project.assets.bower %>']
            },
            dist: {
                options: {
                    outputStyle: 'nested'
                },
                files: {
                    '<%= project.assets.css %>/base.css': '<%= project.src.scss %>/compiler.scss'
                }
            }
        },
        cssmin: {
            options: {
                banner: '<%= banner %>',
                keepSpecialComments: 0
            },
            minify: {
                expand: true,
                cwd: '<%= project.assets.css %>',
                src: ['*.css', '!*.min.css'],
                dest: '<%= project.dist %>',
                ext: '.min.css'
            }
        },

        /**
         * WATCH ALL THE THINGS
         */
        watch: {
            js: {
                files: ['<%= project.src.all %>/**/*.js'],
                tasks: ['concat']
            },
            css: {
                files: ['<%= project.src.scss %>/**/*.scss'],
                tasks: ['sass']
            }
        }
    });

    // Load all grunt packages from package.json dependencies.
    require('load-grunt-tasks')(grunt);

    // Default task
    grunt.registerTask('default', ['concat', 'sass', 'watch']); // dev mode
    grunt.registerTask('prod', ['concat', 'uglify', 'sass', 'cssmin']); // prod mode
};