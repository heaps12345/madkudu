/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Task configuration.
    ftpush: {
      build: {
        auth: {
          host: 'server40.web-hosting.com',
          port: 21,
          authKey: 'ftpkey'
        },
        src: '/Users/pcothenet/Git/madkudu-webflow',
        dest: '/public_html/',
        exclusions: ['**/.gitignore','**/.git/**','**/.grunt/**','**/node_modules/**',
        '/Users/pcothenet/Git/madkudu-webflow/**/.DS_Store', '**/Thumbs.db','**/.ftppass'],
        keep: ['/public_html/blog/**',],
        simple: true
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-ftpush');

  // Default task.
  grunt.registerTask('default', ['ftpush']);

};
