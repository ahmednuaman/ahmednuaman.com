title: A Simple Deploy Script
link: http://www.ahmednuaman.com/blog/a-simple-deploy-script/
creator: ahmed
description: 
post_id: 582
post_date: 2010-07-29 18:16:17
post_date_gmt: 2010-07-29 17:16:17
comment_status: open
post_name: a-simple-deploy-script
status: publish
post_type: post

# A Simple Deploy Script

Don't get me wrong, I love working with [Capistrano](http://www.capify.org/index.php/Capistrano), but sometimes it's a bit over-kill. All I want to do is compress my stuff and just deploy up to a server for the client to see. Also, at times, some clients don't give me SSH access and I have to use FTP, so it doesn't quite work. So, I've written my own little deploy script. It may be a bit crap, I don't really care as it just works. It's small, uses things like the [YUI compressor](http://developer.yahoo.com/yui/compressor/) for concat-ing and compressing CSS and JS; also [optipng](http://optipng.sourceforge.net/) for downsizing the images; and finally [ncftp](http://www.ncftp.com/ncftp/) when SSH isn't there. And here it is: ` #!/usr/bin/bash # ftp info host='' user='' pass='' # change dir cd public/assets/ # compress css echo 'Compressing CSS' lessc css/styles.less cat css/*.css > css/styles.tmp mv css/styles.tmp css/styles.css java -jar ~/SRC/yui/yuicompressor.jar css/styles.css -o css/styles.css # compress js echo 'Compressing JS' rm -f js/packaged.js cat js/*.js > js/packaged.tmp mv js/packaged.tmp js/packaged.js java -jar ~/SRC/yui/yuicompressor.jar js/packaged.js -o js/packaged.js # compress png echo 'Compressing PNGs' optipng -o7 image/*.png # remove logs and caches echo 'Removing logs and caches' cd ../ rm system/logs/* rm system/cache/* # upload echo 'Uploading...' ncftpput -u $user -p $pass -R $host '/www' ./[a-zA-Z0-9]* #scp -r ./ user@host:~/www echo 'Done!' ` Now of course you can change stuff here and there. Actually, what I've done is made a little extension for the SSH uploading bit. Instead of uploading each file by itself, I compress it into a bz2 compressed tarball, upload that, and then decompress it on the server: ` # upload echo 'Uploading' cd ../ tar -cjvvf site.bz2 ./ ssh user@host 'cd ~/www/ && rm -rf ./' scp site.bz2 user@host:~/www/ ssh user@host 'cd ~/www/ && tar -xvvf site.bz2 && rm site.bz2 && find . -name "._*" -print | xargs rm -Rf' rm site.bz2 && find . -name ._* | xargs rm -Rf ` Now I'm 100% sure this can be tidied up somehow, so feel free to do that and let me know! :)