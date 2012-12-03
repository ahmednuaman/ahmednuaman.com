title: Getting WordPress Multi-site To Behave on Lighttpd
link: http://www.ahmednuaman.com/blog/getting-wordpress-multi-site-to-behave-on-lighttpd/
creator: ahmed
description: 
post_id: 623
post_date: 2010-12-12 21:54:17
post_date_gmt: 2010-12-12 21:54:17
comment_status: open
post_name: getting-wordpress-multi-site-to-behave-on-lighttpd
status: publish
post_type: post

# Getting WordPress Multi-site To Behave on Lighttpd

It's all about [WordPress](http://wordpress.org) tonight! I've been looking at getting WordPress multi-site (with sub-directories) to work on [Lighttpd](http://www.lighttpd.net/), here's a little rewrite directive for you: ` url.rewrite-once = ( "^/(.*/)?files/$" => "/index.php", "^/(.*/)?files/(.*)" => "/wp-content/blogs.php?file=$2", "^(/wp-admin/.*)" => "$1", "^/([_0-9a-zA-Z-]+/)?(wp-.*)" => "/$2", "^/([_0-9a-zA-Z-]+/)?(.*\.php)" => "/$2", "^/(.*)/?$" => "/index.php" ) ` Also, it's up on a Github gist: [https://gist.github.com/738370](https://gist.github.com/738370)