module.exports = (grunt) ->
  grunt.config 'compass',
      dev:
        options:
          sassDir: 'assets/sass'
          cssDir: 'assets/css'
          fontsDir: 'assets/font'
          outputStyle: 'expanded'
          noLineComments: false
          imagesDir: 'assets/img'
          debugInfo: true
          relativeAssets: true
      prod:
        options:
          sassDir: '<%= compass.dev.options.sassDir %>'
          cssDir: '<%= compass.dev.options.cssDir %>'
          fontsDir: '<%= compass.dev.options.fontsDir %>'
          environment: 'production'
          imagesDir: '<%= compass.dev.options.imagesDir %>'
          relativeAssets: '<%= compass.dev.options.relativeAssets %>'
          force: true

  grunt.loadNpmTasks 'grunt-contrib-compass'