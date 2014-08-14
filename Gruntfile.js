/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // Task configuration.
    unzip: {
      catalog: {
        src: 'madkudu.webflow.zip',
        dest: './new_version/'
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
      }
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
        exclusions: ['**/blog/**','**/.gitignore','**/.git/**','**/.grunt/**','**/node_modules/**',
        '**/.DS_Store', '**/Thumbs.db','**/.ftppass',
        '**/dev-*'],
        keep: ['/public_html/blog/**','/public_html/blog/*'],
        simple: true
      }
    },
    clean: {
      build: {
        src: ['new_version/','madkudu.webflow.zip']
      }
    }
  });


    /*
    // Task configuration.
    ftpush: {
      build: {
        auth: {
          host: 'server40.web-hosting.com',
          port: 21,
          authKey: 'ftpkey'
        },
        src: '/Users/pcothenet/Git/madkudu-wordpress/wp-content',
        dest: '/public_html/blog/wp-content',
        simple: true
      }
    }
  });
*/

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-ftpush');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-zip');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // Default task.
  grunt.registerTask('default', ['ftpush']);
  grunt.registerTask('push', ['unzip','copy:main','clean','ftpush:site']);

};
