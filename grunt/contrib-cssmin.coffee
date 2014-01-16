module.exports = (grunt) ->
  grunt.config 'cssmin',
    prod:
      files:
        'assets/css/styles-<%= grunt.config("git-commit") %>.css': ['assets/css/styles.css']

  grunt.loadNpmTasks 'grunt-contrib-cssmin'