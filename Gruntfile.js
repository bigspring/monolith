/*global module:false*/
module.exports = function(grunt) {

var bower_path = 'library/bower_components/';
var required_packages_main = [
	bower_path + 'css_browser_selector/css_browser_selector.js',
	bower_path + 'modernizr/modernizr.js',
	bower_path + 'holderjs/holder.js',
	bower_path + 'bootstrap/dist/js/bootstrap.js',	
	bower_path + 'jquery-placeholder/jquery.placeholder.js',
	'js/site.js'
];
var required_packages_ie = [
	bower_path + 'html5shiv-dist/html5shiv.js',
	bower_path + 'respond/dest/respond.src.js'
];

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    dirs: {
	  dest: 'dist/'
    },
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' + // name/version
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' + // current year
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' + // homepage (not currently set in package.json)
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      '* License: <%= pkg.license %>\n\n' +
	  '* Packages: <%= _.map(pkg.devDependencies, function(package, key) {return key}).join(", ") %>\n' +
	  '* WARNING: THIS FILE IS GENERATED DYNAMICALLY - any changes will be overwritten! */\n\n',
    // Task configuration

	// JS
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
	  main: { // main js files
        src: required_packages_main,
	    dest: '<%= dirs.dest %>/<%= pkg.name %>.js'
      },
	  ie: { // ie support
	    src: required_packages_ie,
		dest: '<%= dirs.dest %>/<%= pkg.name %>-ie.js'
	  }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        files: {
	      'dist/<%= pkg.name %>.min.js': '<%= concat.main.dest %>',
	      'dist/<%= pkg.name %>-ie.min.js': '<%= concat.ie.dest %>'
        }
      }
    }
  });

  // Load all grunt packages from package.json dependencies.
  require('load-grunt-tasks')(grunt);

  // Default task.
  grunt.registerTask('default', ['concat', 'uglify']);

};
