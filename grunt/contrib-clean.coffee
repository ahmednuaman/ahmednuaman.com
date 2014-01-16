module.exports = (grunt) ->
  grunt.config 'clean',
    all: [
      'assets/css'
      'assets/js'
      '*.html'
    ]

  grunt.loadNpmTasks 'grunt-contrib-clean'