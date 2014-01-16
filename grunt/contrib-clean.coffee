module.exports = (grunt) ->
  grunt.config 'clean',
    all: [
      'assets/css'
      '*.html'
    ]

  grunt.loadNpmTasks 'grunt-contrib-clean'