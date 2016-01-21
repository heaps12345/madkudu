/*global module:false*/
module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		ftpush: {
			site: {
				auth: {
					host: 'server40.web-hosting.com',
					port: 21,
					authKey: 'ftpkey'
				},
				src: './dist',
				dest: '/public_html/',
				exclusions: ['**/blog/**','**/.gitignore','**/.git/**','**/.grunt/**','**/node_modules/**','**/bower_components/**',
				'**/.DS_Store', '**/Thumbs.db','**/.ftppass',
				'**/dev-*'],
				keep: ['/public_html/blog/**','/public_html/blog/*'],
				simple: true
			},
		},

	});

	// Default task.
	grunt.registerTask('push-site', ['ftpush:site']);
};
