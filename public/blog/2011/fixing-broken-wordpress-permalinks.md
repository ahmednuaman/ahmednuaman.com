title: Fixing broken WordPress permalinks
link: http://www.ahmednuaman.com/blog/fixing-broken-wordpress-permalinks/
creator: ahmed
description: 
post_id: 732
post_date: 2011-12-22 22:21:04
post_date_gmt: 2011-12-22 22:21:04
comment_status: open
post_name: fixing-broken-wordpress-permalinks
status: publish
post_type: post

# Fixing broken WordPress permalinks

If you've changed your permalink structure recently and had poop loads of 404s, you can do a few things to fix it: 

  * Change the permalink structure back (well, why not?)
  * Install a [permalink fixing plugin](http://www.google.co.uk/search?sourceid=chrome&ie=UTF-8&q=wordpress+permalink+301)
  * Have a read of [WordPress query rewrite stuff](http://codex.wordpress.org/Class_Reference/WP_Rewrite) (it's pretty long ass)
Or you can save yourself a poop load of hassle and by applying a bit of cunning you can simply get around the problem with a tiny bit of code: ` function _add_rewrite_rules($r) { $n = array( '[0-9]{4}/[0-9]{2}/[0-9]{2}/([^/]+)/?$' => 'index.php?name=$matches[1]' ); return $n + $r; } add_filter( 'rewrite_rules_array', '_add_rewrite_rules' ); ` Simply all we do here is set an array key that's the regex of the structure we want to redirect to the value, so in this case we're after something like '2009/06/29/heres-a-post-name' and this'll be redirect to 'index.php?name=heres-a-post-name'. Perfect! You can read up more on WordPress's query stuff here: [http://codex.wordpress.org/Class_Reference/WP_Rewrite](http://codex.wordpress.org/Class_Reference/WP_Rewrite).