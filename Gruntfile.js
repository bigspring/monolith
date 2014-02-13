/*global module:false*/
module.exports = function(grunt) {

/**
 * Define paths/names
 */
var bower_path = 'library/bower_components/';
var dependencies_main = [
	bower_path + 'css_browser_selector/css_browser_selector.js',
	bower_path + 'modernizr/modernizr.js',
	bower_path + 'holderjs/holder.js',
	bower_path + 'bootstrap/dist/js/bootstrap.js',	
	bower_path + 'jquery-placeholder/jquery.placeholder.js',
	'_src/js/site.js'
];
var dependencies_ie = [
	bower_path + 'html5shiv-dist/html5shiv.js',
	bower_path + 'respond/dest/respond.src.js'
];
var less_files = [
	'_src/less/base.less'
];

  /**
  * Project configuration
  */
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    dirs: {
	  jsdest: 'js/',
	  cssdest: 'css/'
    },
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' + // name/version
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' + // current year
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' + // homepage (not currently set in package.json)
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      '* License: <%= pkg.license %>\n\n' +
	  '* Packages: <%= _.map(pkg.devDependencies, function(package, key) {return key}).join(", ") %>\n' +
	  '* WARNING: THIS FILE IS GENERATED DYNAMICALLY - any changes will be overwritten! */\n\n',

    /**
     * Task configuration
     */

    // JS tasks
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
	  main: { // main js files
        src: dependencies_main,
	    dest: '<%= dirs.jsdest %>/base.js'
      },
	  ie: { // ie support js files
	    src: dependencies_ie,
		dest: '<%= dirs.jsdest %>/ie.js'
	  }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        files: {
	      '<%= dirs.jsdest %>/base.min.js': '<%= concat.main.dest %>',
	      '<%= dirs.jsdest %>/ie.min.js': '<%= concat.ie.dest %>'
        }
      }
    },

	// CSS tasks
	less: {
	  options: {
		banner: '<%= banner %>'
	  },
	  main: {
	    files: {
	      'css/base.css': less_files
	    }
	  }
	},
	cssmin: {
	  options: {
		banner: '<%= banner %>'
	  },
	  minify: {
		  expand: true,
		  cwd: 'css/',
		  src: ['*.css', '!*.min.css'], // currently not minimising all files in css/
		  dest: '<%= dirs.cssdest %>/',
		  ext: '.min.css'
	  }
	},

	// WATCH ALL THE THINGS
	watch: {
	  js: {
		files: dependencies_main.concat(dependencies_ie),
		tasks: ['concat', 'uglify']
	  },
	  css: {
		files: ['_src/less/*.less'], // sets the folders to watch
		tasks: ['less', 'cssmin'] // runs the tasks
	  }
	}
  });

  // Load all grunt packages from package.json dependencies.
  require('load-grunt-tasks')(grunt);

  // Default task.
  grunt.registerTask('default', ['concat', 'uglify', 'less', 'cssmin', 'watch']);

};