/*global module:false*/
module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		// Task configuration.
		autoprefixer: {
			dest: {
				src: ['css/*.css']
			}
		},
		clean: {
			build: {
				src: ['new_version/','madkudu.webflow.zip']
			}
		},
		copy: {
			main: {
				files: [{
					expand: true,
					cwd: './new_version/',
					src: '**',
					dest: '.'
				}]
			},
			css: {
				files: [{
					expand: true,
					cwd: './css/',
					src: '**',
					dest: './blog/wp-content/themes/webflow/css/'
				}]
			},
			vendor: {
				files: [
				{
					expand: true, cwd: 'bower_components/bootstrap/dist/js',
					src: ['bootstrap.min.js'], dest: 'js'
				},
				{
					expand: true, cwd: 'bower_components/jquery/dist/',
					src: ['jquery.min.js','jquery.min.map'], dest: 'js'
				}
				]
			},

		},
		ftpush: {
			site: {
				auth: {
					host: 'server40.web-hosting.com',
					port: 21,
					authKey: 'ftpkey'
				},
				src: '/Users/pcothenet/Git/madkudu-webflow',
				dest: '/public_html/',
				exclusions: ['**/blog/**','**/.gitignore','**/.git/**','**/.grunt/**','**/node_modules/**','**/bower_components/**',
				'**/.DS_Store', '**/Thumbs.db','**/.ftppass',
				'**/dev-*'],
				keep: ['/public_html/blog/**','/public_html/blog/*'],
				simple: true
			},
			blog: {
				auth: {
					host: 'server40.web-hosting.com',
					port: 21,
					authKey: 'ftpkey'
				},
				src: './blog/wp-content/themes/webflow',
				dest: '/public_html/blog/wp-content/themes/webflow',
				exclusions: ['**/.gitignore','**/.git/**','**/.DS_Store', '**/Thumbs.db','**/.ftppass','**/dev-*'],
				simple: true
			}
		},
		gitcommit: {
			site: {
				options: {
					ignoreEmpty: 'true'
				},
				files: {
					src: ['*.html','css/**','images/**']
				}
			}
		},
		gitfetch: {
			site: {
				options: {
					all: true
				}
			}
		},
		gitpush: {
			site: {
				options: {
					remote: 'origin',
					branch: 'master'
				}
			}
		},
		jade: [{
			expand: true,
			cwd: 'jade/pages/',
			src: ['*.jade'],
			dest: '.',
			ext: '.html'
		}],
		less: {
			options: {
				compress: true
			},
			layouts: {
				files: [
				{
					'css/index.min.css': 'less/index.less'
				}
				]
			}
		},
		unzip: {
			catalog: {
				src: 'madkudu.webflow.zip',
				dest: './new_version/'
			}
		},
		watch: {
			client: {
				files: ['less/**/*.less','jade/**/*.jade'],
				tasks: ['build']
			}
		},
	});

	// These plugins provide necessary tasks.
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-jade');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-ftpush');
	grunt.loadNpmTasks('grunt-git');
	grunt.loadNpmTasks('grunt-newer');
	grunt.loadNpmTasks('grunt-zip');

	// Default task.
	grunt.registerTask('default', ['watch']);
	grunt.registerTask('build', ['copy:vendor','less','jade','autoprefixer']);
	grunt.registerTask('unpack', ['unzip','copy:main','clean']);
	grunt.registerTask('commit', ['gitcommit:site','gitpush:site']);
	grunt.registerTask('push-site', ['ftpush:site']);
	grunt.registerTask('push-blog', ['copy:css','ftpush:blog']);
};
