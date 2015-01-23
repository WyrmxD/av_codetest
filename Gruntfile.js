module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			options: {
				beautify: true
			},
			my_target: {
				files: {
					'public/js/main.js': ['public/js/**/*.js','!public/js/main.js', '!public/js/lib/*.js', '!public/js/tests/*.js']
				},
			},
		},
		concat:{
			options: {
				separator: ';',
			},
			dist: {
				src: ['public/js/**/*.js','!public/js/main.js', '!public/js/lib/*.js', '!public/js/tests/*.js'],
				dest: 'public/js/main.js',
			},
		},
		watch: {
			files: ['public/js/**/*.js','!public/js/main.js'],
			tasks: ['concat'],
		},
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');

	// Default task(s).
	grunt.registerTask('default', ['concat']);

};