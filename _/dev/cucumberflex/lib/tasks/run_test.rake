desc "Run tests on application"
task :run_test do
  sh "cp -R debug test"
  #sh "ruby test/test_server.rb"
  
  require "test/test_server.rb"
  
  sh "cucumber features"
  
  @server.stop
end