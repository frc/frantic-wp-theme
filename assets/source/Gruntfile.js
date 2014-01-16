module.exports = function(grunt) {

	'use strict';


	// Configuration.
	var config = {
		webroot: '..'
	};


	// Project configuration.
	grunt.initConfig({
		/**
		 * Get configuration options.
		 */
		config: config,


		/**
		 * Get the project metadata.
		 */
		pkg: grunt.file.readJSON('package.json'),


		/**
		 * Run predefined tasks whenever watched file patters are added, changed or deleted.
		 */
		watch: {
			options: {
				livereload: true
			},
			css: {
				files: ['styles/**/*.scss'],
				tasks: [
					'sass:dev',
					'csslint'
				]
			},
			js: {
				files: ['scripts/**/*.js'],
				tasks: [
					'uglify:dev',
					'jshint'
				]
			}
		},


		/**
		 * Compile SASS to CSS.
		 */
		sass: {
			dev: {
				options: {
					style: 'compact',
					precision: 15
				},
				files: {
					'<%= config.webroot %>/css/main.css': 'styles/style.scss'
				}
			},
			dist: {
				options: {
					style: 'compressed',
					precision: 15
				},
				files: {
					'<%= config.webroot %>/css/main.css': 'styles/style.scss'
				}
			}
		},


		/**
		 * Lint CSS files.
		 */
		csslint: {
			options: {
				// Get CSSLint options from external file.
				csslintrc: '.csslintrc'
			},
			strict: {
				options: {},
				src: ['<%= config.webroot %>/css/*.css']
			}
		},


		/**
		 * Validate files with JSHint.
		 */
		jshint: {
			// Configure JSHint.
			options: {
				jshintrc: true
			},
			// Define the files to lint.
			files: [
				'Gruntfile.js',
				'<%= config.webroot %>/js/**/*.js',
				'!<%= config.webroot %>/js/vendor/**/*.js'
			]
		},


		/**
		 * Compress JavaScript files with Uglify.
		 */
		uglify: {
			dev: {
				options: {
					mangle: false,
					compress: false,
					beautify: true
				},
				files: {
					'<%= config.webroot %>/js/main.min.js': 'scripts/**/*.js'
				}
			},
			dist: {
				options: {
					compress: true
				},
				files: {
					'<%= config.webroot %>/js/main.min.js': 'scripts/**/*.js'
				}
			}
		}
	});


	// Dynamically load plugin(s) needed for task(s).
	require('matchdep').filterDev('grunt-*', './package.json').forEach(grunt.loadNpmTasks);


	// The default task (DEV). Can be run by typing "grunt" on the command line.
	grunt.registerTask('default', [
		'sass:dev',
		'csslint',
		'uglify:dev',
		'jshint',
		'watch'
	]);


	// The optimized task for production (DIST). Can be run by typing "grunt dist" on the command line.
	grunt.registerTask('dist', [
		'sass:dist',
		'csslint',
		'uglify:dist',
		'jshint'
	]);

};