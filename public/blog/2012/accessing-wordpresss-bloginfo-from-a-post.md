title: Accessing WordPress's 'bloginfo' from a post
link: http://www.ahmednuaman.com/blog/accessing-wordpresss-bloginfo-from-a-post/
creator: ahmed
description: 
post_id: 762
post_date: 2012-01-06 16:05:44
post_date_gmt: 2012-01-06 16:05:44
comment_status: open
post_name: accessing-wordpresss-bloginfo-from-a-post
status: publish
post_type: post

# Accessing WordPress's 'bloginfo' from a post

If you're like me then you like full control over your posts. In a recent post I wanted to include a picture that was within the theme directory rather than having uploaded it. Now I can't be bothered to write out the full URL to the theme so instead I created a quick shortcode that allows you to access [WordPress's](http://wordpress.org/) '[bloginfo](http://codex.wordpress.org/Function_Reference/bloginfo)' from within your posts: ` function handle_shortcode_bloginfo($a) { return get_bloginfo( $a[ 'get' ] ); } add_shortcode( 'bloginfo', 'handle_shortcode_bloginfo' ); ` To use it you simply add [bloginfo get="bloginfo_to_get"] and that's it.