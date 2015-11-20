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
        bower: 'assets/bower_components',
        icons: 'assets/icons',
        fonts: 'assets/fonts'
      },
      src: {
        all: '_src',
        scss: '_src/scss',
        js: '_src/js'
      },
      dist: 'assets/dist',
      dependencies: {
        default: [
          // foundation dependency list - ([un]comment as required)
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.abide.js',
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.accordion.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.alert.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.clearing.js',
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.dropdown.js',
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.equalizer.js',
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.interchange.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.joyride.js',
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.magellan.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.offcanvas.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.orbit.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.reveal.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.slider.js',
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.tab.js',
          //'<%= project.assets.bower %>/foundation/js/foundation/foundation.tooltip.js',
          '<%= project.assets.bower %>/foundation/js/foundation/foundation.topbar.js',

          // other dependencies
          '<%= project.assets.bower %>/modernizr/modernizr.js',
          '<%= project.assets.bower %>/holderjs/holder.js',
          '<%= project.assets.bower %>/fastclick/lib/fastclick.js',
          '<%= project.assets.bower %>/retina.js/dist/retina.js',
          '<%= project.assets.js%>/morph-search.js',

          // site dependencies
          '<%= project.src.js %>/custom.js'
        ],
        ie: [
          // nonsense IE fixes
          '<%= project.assets.bower %>/jquery-placeholder/jquery.placeholder.js',
          '<%= project.assets.bower %>/html5shiv/dist/html5shiv.js',
          '<%= project.assets.bower %>/respond/dest/respond.src.js',
          // IE site dependencies
          '<%= project.src.js %>/ie-custom.js'
        ],
        ie8: [
          '<%= project.assets.bower %>/REM-unit-polyfill/js/rem.js'
        ]
      }
    },

    banner: '/*!\n* <%= pkg.name %> <%= pkg.version %>\n' + // name/version
    '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' + // homepage
    '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>\n' +
    '* License: <%= pkg.license %>\n' +
    '* Packages: <%= _.map(pkg.devDependencies, function(package, key) {return key}).join(", ") %>\n*/\n',

    /**
    * JS tasks
    * - jshint validation
    * - concatenation of files
    * - minification
    */
    jshint: { // TODO: assign to a task
      files: ['Gruntfile.js', 'assets/js/**/*.js'],
      src: {
        files: ['<%= project.dependencies.default %>', '<%= project.dependencies.ie %>']
      },
      options: {
        globals: {
          jQuery: true
        }
      }
    },
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
      main: { // main js files
        src: '<%= project.dependencies.default %>',
        dest: '<%= project.assets.js %>/base.js',
      },
      ie: { // ie support js files
        src: '<%= project.dependencies.ie %>',
        dest: '<%= project.assets.js %>/ie.js'
      },
      ie8: {
        src: '<%= project.assets.bower %>/REM-unit-polyfill/js/rem.js',
        dest: '<%= project.assets.js %>/ie8.js'
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
    * Copy other dependencies
    * - Font Awesome
    */
    copy: {
      main: {
        files: [
          {
            expand: true,
            dot: true,
            cwd: '<%= project.assets.bower %>/fontawesome/',
            src: ['fonts/*.*'],
            dest: '<%= project.assets.fonts %>/fontawesome/'
          }
        ]
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
      },
      options: {
        livereload: true
      }
    }
  });

  // Load all grunt packages from package.json dependencies.
  require('load-grunt-tasks')(grunt);

  // Default task
  grunt.registerTask('default', ['concat', 'sass', 'copy', 'watch']); // dev mode
  grunt.registerTask('prod', ['concat', 'uglify', 'sass', 'cssmin', 'copy']); // prod mode
};
