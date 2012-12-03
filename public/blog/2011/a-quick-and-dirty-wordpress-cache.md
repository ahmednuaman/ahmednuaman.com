title: A quick and dirty WordPress cache
link: http://www.ahmednuaman.com/blog/a-quick-and-dirty-wordpress-cache/
creator: ahmed
description: 
post_id: 718
post_date: 2011-12-12 21:25:14
post_date_gmt: 2011-12-12 21:25:14
comment_status: open
post_name: a-quick-and-dirty-wordpress-cache
status: publish
post_type: post

# A quick and dirty WordPress cache

Now I love [WordPress](http://wordpress.org/) like the next person, but sometimes it can be a bit slow, especially if you're doing a bit theme that requires a lot of queries. So how does one get around this? Well there are a number of [caching plugins](http://www.google.co.uk/search?sourceid=chrome&ie=UTF-8&q=wordpress+caching) already for WordPress. They're cool and all, but sometimes I feel you need a little bit more control. To be honest it doesn't take much to write a caching plugin for your WordPress web site, once you understand the basics it's all good. Take this idea for example: 

  * We want to cache the entire output of a WordPress page/post
  * We want to use either file based caching or (even better) memory based ones (such as [APC](http://php.net/manual/en/book.apc.php), [XCache](http://xcache.lighttpd.net/) and [eAccelerator](http://sourceforge.net/projects/eaccelerator/))
  * We want to make sure that when posts/pages/anything's updated, the cache is flushed
  * We want to understand exactly what's going on
So, let's start with the first one, how do we cache the full output? Well it's very simple: PHP allows you to make use of output buffering, this simply means that we can get the stuff echo'd from our scripts into a nice tidy variable, have a read up on '[ob_start()](http://php.net/manual/en/function.ob-start.php)', it works like this: `

Here's some text 

$o will simply return the paragraph and the HTML, so let's apply this to WordPress. So let's assume you're using the [standard template structure](http://codex.wordpress.org/Template_Hierarchy) so we'd start with the header.php and right on the first line we'd add: ` ` Now that's all cool, we're ready to grab the buffer and cache its ass. The next thing to do is to grab hold of your functions.php file and we begin playing with some hooks. The main hook we're concerned with regarding caching our buffer is the 'shutdown' one, so we hook into this with a function that captures our buffer and writes it to the cache: ` $_cache_folder = dirname( dirname( dirname( __FILE__ ) ) ) . '/cache/'; $_cache_prefix = 'cache_'; add_action( 'shutdown', '_save_cache', 0 ); function ahmed_save_cache() { global $_cache_folder; global $_cache_prefix; global $post; if ( $post->post_type != 'post' && $post->post_type != 'page' ) { return; } $f = $_cache_folder . $_cache_prefix . md5( $_SERVER[ 'REQUEST_URI' ] ); $h = ob_get_contents(); if ( !file_exists( $f ) && !is_admin() ) { file_put_contents( $f, $h ); } ob_end_flush(); } ` Now I've written this with the assumption that we're going to use a file cache. $_cache_folder uses a folder in ./wp-content/ called 'cache' to store the cache files (so many caches!). If you're gonna use a memory based cache, replace the 'file_put_contents' with the respective cache writing function. Now that we've written to the cache we need to serve it when people request the cached pages. We do this with another hook: 'posts_selection'. This hook is fired right when WordPress has decided what post(s) it's going to show, so this is perfect for us, here's our code: ` add_action( 'posts_selection', '_check_cache' ); function _check_cache() { global $_cache_folder; global $_cache_prefix; $f = $_cache_folder . $_cache_prefix . md5( $_SERVER[ 'REQUEST_URI' ] ); if ( file_exists( $f ) && !is_admin() ) { if ( filesize( $f ) < 1024 ) { return; } ob_end_flush(); echo file_get_contents( $f ); die(); } } ` Here we simply check to see if a cache of the current request exists; if it does, we serve it and use 'die()' to kill the rest of the requests, thus saving ourselves some time and processing power! You'll notice that we're checking whether the file's size is great than 1024 bytes, this is because WordPress does a number of redirects, for example: if a request is missing a trailing slash, WordPress redirects and appends it. Now we've got the caching sorted and got the reading of the cache sorted, what about deleting the cache? Well we've got a number of hooks to work with: 

  * clean_post_cache
  * delete_post
  * save_post
  * update_option (actually, you may not need this one, but it's handy if you've got any custom plugins where you're writing options)
So we simply clear the cache once any of these hooks have been hit, like so: ` add_action( 'clean_post_cache', '_clear_cache' ); add_action( 'delete_post', '_clear_cache' ); add_action( 'save_post', '_clear_cache' ); add_action( 'update_option', '_clear_cache' ); function _clear_cache() { global $_cache_folder; global $_cache_prefix; $h = opendir( $_cache_folder ); if ( $h ) { while ( ( $f = readdir( $h ) ) !== false ) { if ( strstr( $f, $_cache_prefix ) ) { unlink( $_cache_folder . $f ); } } closedir( $h ); } } ` As you can see we simply find all files that contain our prefix and zap them. The reason I don't clear the whole cache is because other plugins may use the same folder too and maybe WordPress may do too. So now you can see a very simple method of caching your WordPress requests and hopefully you understand it, so we've hit all the targets! If you're a bit confused or have any questions, feel free to comment on the [Google+ thread](https://plus.google.com/109868412062207779835/posts/RaEiGH1f8RY).