module.exports = (grunt) ->
  grunt.config 'replace',
    html:
      src: ['*.html']
      overwrite: true
      replacements: [
          from: 'styles.css'
          to: 'styles-<%= grunt.config("git-commit") %>.css'
        ,
          from: '/assets/vendor/normalize-css/normalize.css'
          to: '//cdnjs.cloudflare.com/ajax/libs/normalize/2.1.3/normalize.min.css'
      ]

  grunt.loadNpmTasks 'grunt-text-replace'