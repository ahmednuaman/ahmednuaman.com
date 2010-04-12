set :user,							"ahmed"
set :runner,						"ahmed"

set :deploy_to, 				"/var/www/ahmednuaman.com/"
set :use_sudo,					false
set :keep_releases,			5

set :application, 			"ahmednuaman.com"
set :repository,  			"git@github.com:ahmednuaman/Portfolio.git"

set :scm, 							:git

task :update_code do
	server "95.172.20.234", :app, :web, :db, :primary => true
end

namespace :deploy do
	[ :setup, :update, :update_code, :finalize_update, :symlink, :restart ].each do |default_task|
		task default_task do 
			
		end
	end
end

task :compress do
	exec 	"lessc public/assets/css/styles.less && " +
				"java -jar ~/SRC/yui/yuicompressor.jar public/assets/css/styles.css -o public/assets/css/styles.css && " +
				"lessc public/assets/css/mobile.less && " +
				"java -jar ~/SRC/yui/yuicompressor.jar public/assets/css/mobile.css -o public/assets/css/mobile.css"
end