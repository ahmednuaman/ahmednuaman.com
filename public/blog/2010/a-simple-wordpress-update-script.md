title: A Simple Wordpress Update Script
link: http://www.ahmednuaman.com/blog/a-simple-wordpress-update-script/
creator: ahmed
description: 
post_id: 616
post_date: 2010-12-01 11:17:22
post_date_gmt: 2010-12-01 11:17:22
comment_status: open
post_name: a-simple-wordpress-update-script
status: publish
post_type: post

# A Simple Wordpress Update Script

Now I know what you're thinking: 

> "But my magical Wordpress installation updates its bad-self; why oh why do I need a script an arab wrote?"

Well, you don't. But I don't like using the Wordpress updater. I've been using Wordpress since version 1 something and in my experience, although it's very good and handy, the updater isn't the best way to do it. So I've got a little bash script ([that's also up on github as a gist](https://gist.github.com/723342)) that'll do all the hard work for you, ta da: ` #!/bin/bash # This work is licenced under the Creative Commons Attribution-Share Alike 2.0 UK: England & Wales License. # To view a copy of this licence, visit http://creativecommons.org/licenses/by-sa/2.0/uk/ or send a letter # to Creative Commons, 171 Second Street, Suite 300, San Francisco, California 94105, USA. # So before you start, the script assumes the following: # 1. you have some sort of SSH access # 2. you are owner of your blog (in terms of computa permissions) # 3. the blog folder is called 'blog' (if not, change all instances of the word 'blog' with whatever it's called) # 4. the server has curl installed # 5. the server has un/zip installed (if not, change the zip to use gnutar) # 6. and that the only changes you've ever made to your wordpress blog are /wp-config.php and in /wp-content folder # Also, if it goes tits up, I don't accept any responsibility, so use are your own risk! cd ~/www/ahmednuaman.com/static/ rm -rf blog-orig cp -R blog blog-orig curl -O http://wordpress.org/latest.zip unzip latest.zip rm -rf wordpress/wp-content cp -R blog/wp-con* wordpress rm -rf blog mv wordpress blog rm -rf latest.zip echo 'Done! If everything has gone to plan, please delete the blog-orig folder in your blog directory.' ` Again, use at your own risk! I don't accept any responsibility whatever happens. Also, [check out the gist](https://gist.github.com/723342) and let me know if it works.