module.exports = (grunt) ->
  files = [
    'assets/vendor/fittext/fittext.js'
    'assets/js/src/*.js'
  ]

  grunt.config 'uglify',
    dev:
      files:
        'assets/js/scripts.js': files
    prod:
      files:
        'assets/js/scripts-<%= grunt.config("git-commit") %>.js': files

  grunt.loadNpmTasks 'grunt-contrib-uglify'