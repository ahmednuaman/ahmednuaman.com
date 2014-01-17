module.exports = (grunt) ->
  grunt.config 'imagemin',
    prod:
      files: [
        expand: true
        cwd: 'assets/img/'
        dest: '<%= imagemin.prod.files[0].cwd %>'
        src: [
          '*.jpg'
        ]
      ]

  grunt.loadNpmTasks 'grunt-contrib-imagemin'