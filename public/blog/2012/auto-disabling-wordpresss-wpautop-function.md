title: Auto-disabling WordPress's 'wpautop' function
link: http://www.ahmednuaman.com/blog/auto-disabling-wordpresss-wpautop-function/
creator: ahmed
description: 
post_id: 766
post_date: 2012-01-06 16:11:40
post_date_gmt: 2012-01-06 16:11:40
comment_status: open
post_name: auto-disabling-wordpresss-wpautop-function
status: publish
post_type: post

# Auto-disabling WordPress's 'wpautop' function

[WordPress](http://wordpress.org/) has a lovely little function called '[wpautop](http://codex.wordpress.org/Function_Reference/wpautop)'. It simply converts line spaces in the posts we write to nice paragraphs. That's cool and all, but what if you're writing your own paragraphs in the HTML tab when writing a post? Well there are a number of plugins out there that allow you to disable this function on a post-by-post basis, but I'm lazy, I want WordPress to disable it when there's HTML in a post, so I wrote a little filter to handle it for me: ` function handle_content($c) { global $post; if ( strpos( $c, '<' ) === 0 ) { remove_filter( 'the_content', 'wpautop' ); } return $c; } add_filter( 'the_content', 'handle_content', 9 ); ` Call me silly or stupid, but this works perfectly for me. Simply it checks the very first character of a post, if it's '<' then it assumes the post is HTML based and disables the 'wpautop' filter.