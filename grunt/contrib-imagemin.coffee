module.exports = (grunt) ->
  grunt.config 'imagemin',
    prod:
      files: [
        expand: true
        cwd: 'assets/img/'
        dest: '<%= imagemin.prod.files[0].cwd %>'
        src: [
          '*.{gif,png,svg}'
        ]
      ]

  grunt.loadNpmTasks 'grunt-contrib-imagemin'