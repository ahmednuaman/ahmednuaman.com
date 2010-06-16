desc "Run tests on application"
task :run_test do
  sh "cp -R debug test"
  
  sh 'ruby test/test_server.rb -d'
  
  sh "cucumber features"
  
end