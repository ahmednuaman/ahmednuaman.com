module.exports = (grunt) ->
  grunt.config 'coffee',
    dev:
      expand: true
      cwd: 'assets/coffee/'
      dest: 'assets/js/src/'
      ext: '.js'
      src: [
        '**/*.coffee'
      ]
      options:
        sourceMap: true
    prod:
      expand: '<%= coffee.dev.expand %>'
      cwd: '<%= coffee.dev.cwd %>'
      dest: '<%= coffee.dev.dest %>'
      ext: '<%= coffee.dev.ext %>'
      src: ['<%= coffee.dev.src %>']

  grunt.loadNpmTasks 'grunt-contrib-coffee'