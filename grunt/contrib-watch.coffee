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
        '<%= coffee.dev.cwd + coffee.dev.src[0] %>'
      ]
      tasks: [
        'coffee:dev'
        'uglify:dev'
      ]
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
