/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
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
        exclusions: ['**/.gitignore','**/.git/**','**/.grunt/**','**/node_modules/**',
        '**/.DS_Store', '**/Thumbs.db','**/.ftppass'],
        simple: true
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-ftpush');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-zip');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // Default task.
  grunt.registerTask('default', ['ftpush']);
  grunt.registerTask('push', ['ftpush']);

};
