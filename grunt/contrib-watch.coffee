module.exports = (grunt) ->
  grunt.config 'watch',
    compass:
      files: [
        '<%= compass.dev.options.sassDir %>/**/*.sass'
      ]
      tasks: [
        'compass:dev'
      ]
    coffee:
      files: [
        '<%= coffee.dev.cwd %>/**/*.coffee'
      ]
      tasks: [
        'coffee:dev'
        'uglify:dev'
      ]
      options:
        livereload: true
    css:
      files: [
        'assets/css/*.css'
        'assets/img/*.{gif,png,svg}'
      ]
      options:
        livereload: true
    jade:
      files: [
        '*.jade'
      ]
      tasks: [
        'jade:dev'
      ]
      options:
        livereload: true

  grunt.loadNpmTasks 'grunt-contrib-watch'
