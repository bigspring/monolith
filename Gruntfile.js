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
                scss: '_src/scss'
            },
            dependencies: {
                default: [
                    '<%= project.assets.bower %>/css_browser_selector/css_browser_selector.js',
                    '<%= project.assets.bower %>/modernizr/modernizr.js',
                    '<%= project.assets.bower %>/holderjs/holder.js',
                    '<%= project.assets.bower %>/jquery-placeholder/jquery.placeholder.js',
                    '<%= project.src %>/js/custom.js'
                ],
                ie: [
                    '<%= project.bower %>/html5shiv-dist/html5shiv.js',
                    '<%= project.bower %>/respond/dest/respond.src.js'
                ]
            }
        },

        banner: '/*! <%= pkg.name %> <%= pkg.version %> - ' + // name/version
            '<%= grunt.template.today("yyyy-mm-dd") %>\n' + // current year
            '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' + // homepage (not currently set in package.json)
            '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
            '* License: <%= pkg.license %>\n\n' +
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
                    '<%= project.assets.js %>/base.min.js': '<%= concat.main.dest %>',
                    '<%= project.assets.js %>/ie.min.js': '<%= concat.ie.dest %>'
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
                includePaths: ['<%= project.assets.bower %>/foundation/scss']
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
                banner: '<%= banner %>'
            },
            minify: {
                expand: true,
                cwd: '<%= project.assets.css %>',
                src: ['*.css', '!*.min.css'],
                dest: '<%= project.assets.css %>',
                ext: '.min.css'
            }
        },

        /**
         * WATCH ALL THE THINGS
         */
        watch: {
            js: {
                files: ['<%= project.src.all %>/**/*.js'],
                tasks: ['concat', 'uglify']
            },
            css: {
                files: ['<%= project.src.scss %>/**/*.scss'],
                tasks: ['sass', 'cssmin']
            }
        }
    });

    // Load all grunt packages from package.json dependencies.
    require('load-grunt-tasks')(grunt);

    // Default task
    grunt.registerTask('default', ['concat', 'uglify', 'sass', 'cssmin', 'watch']);
};