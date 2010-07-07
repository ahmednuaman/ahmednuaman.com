set :user,					"ahmed"
set :runner,				"ahmed"

set :deploy_to, 			"~/www/ahmednuaman.com"
set :use_sudo,				false
set :keep_releases,			5

set :application, 			"ahmednuaman.com"
set :repository,  			"git@fsmg.co.uk:ahmednuaman.git"

set :scm, 					:git

task :prod do
	server "fsmg.co.uk", :app, :web, :db, :primary => true
end

task :compress do
	exec 	"lessc public/assets/css/styles.less && " +
				"java -jar ~/SRC/yui/yuicompressor.jar public/assets/css/styles.css -o public/assets/css/styles.css && " +
				"lessc public/assets/css/mobile.less && " +
				"java -jar ~/SRC/yui/yuicompressor.jar public/assets/css/mobile.css -o public/assets/css/mobile.css"
end

task :setperms do	
	run "ln -s #{deploy_to}/static/blog #{current_path}/public/blog"
	run "rm -rf #{deploy_to}/static/blog/wp-content/themes/ahmednuaman"
	run "cp -r #{current_path}/private/blog/wp-content/themes/ahmednuaman #{deploy_to}/static/blog/wp-content/themes/"
	run "mkdir #{current_path}/public/cache && chmod -R a+rw #{current_path}/public/cache"
end

after "deploy:symlink", :setperms