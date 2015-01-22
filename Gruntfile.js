module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			build: {
				src: ['public/js/**/*.js','!public/js/main.js', '!public/js/lib/*.js', '!public/js/tests/*.js'],
				dest: 'public/js/main.js'
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Default task(s).
	grunt.registerTask('default', ['uglify', 'cssmin']);

};