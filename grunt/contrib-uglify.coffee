module.exports = (grunt) ->
  grunt.config 'uglify',
    prod:
      files:
        'assets/js/scripts-<%= grunt.config("git-commit") %>.js': [
          'assets/vendor/fittext/fittext.js'
        ]

  grunt.loadNpmTasks 'grunt-contrib-uglify'