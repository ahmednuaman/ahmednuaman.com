module.exports = (grunt) ->
  grunt.loadTasks 'grunt'

  grunt.registerTask 'install', 'install bower dependancies', () ->
    done = @async()
    config =
      cmd: 'bower'
      args: [
        'install'
      ]

    child = grunt.util.spawn config, (err, result) ->
      grunt.log.ok 'Installed bower dependancies'
      done()

    child.stdout.on 'data', (data) ->
      grunt.log.write data

  grunt.registerTask 'githash', 'grabs the latest git commit hash', () ->
    done = @async()

    config =
      cmd: 'git'
      args: [
        'rev-parse'
        '--verify'
        'HEAD'
      ]

    grunt.util.spawn config, (err, result) ->
      grunt.config 'git-commit', result.stdout
      grunt.log.ok "Setting `git-commit` to #{result.stdout}"

      done()

  grunt.registerTask 'default', 'run the server and watch for changes', [
    'clean'
    'githash'
    'install'
    'compass:dev'
    'jade:dev'
    'express'
    'watch'
  ]