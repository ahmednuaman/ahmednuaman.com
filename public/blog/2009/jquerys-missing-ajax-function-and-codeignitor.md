title: jQuery's Missing AJAX Function (and CodeIgnitor)
link: http://www.ahmednuaman.com/blog/jquerys-missing-ajax-function-and-codeignitor/
creator: ahmed
description: 
post_id: 182
post_date: 2009-06-16 14:09:34
post_date_gmt: 2009-06-16 14:09:34
comment_status: open
post_name: jquerys-missing-ajax-function-and-codeignitor
status: publish
post_type: post

# jQuery's Missing AJAX Function (and CodeIgnitor)

This is a really handy tip if you use [jQuery](http://jquery.com/) frequently and are receiving [JSON](http://www.json.org/) data back. [jQuery's "$.post"](http://docs.jquery.com/Ajax/jQuery.post#urldatacallbacktype) allows you to do a POST call to your application and get the data back, but you have to flag the type of data being received by jQuery so that it can parse it. This seems silly as jQuery's strap line is "write less, do more". So instead of having to do this all the time you want to receive and parse JSON: ` $.post( url, [ data ], [ callback ], 'json' ); ` It's much better to define a new function called "$.postJSON" like so: ` $.postJSON = function(url, data, callback) { $.post( url, data, callback, 'json' ); }; ` Now this is listed on the jQuery web site, but it just makes me wonder why it's not put into the code base permanently. It's a bit of a shame, but the code can be optimised. For example, when I was working on a project that was built on [CodeIgnitor](http://codeigniter.com/), I modified the function so that I didn't need to specify the URL as I always used the same controller for my AJAX calls and sent a POST variable called "method" to handle the routing of the call. I had this basically: ` var ajaxURL = '/path/to/ajax_controller'; $.postJSON = function(data, callback) { $.post( ajaxURL, data, callback, 'json' ); }; ` And then within CodeIgnitor I had my controller launch a library that had a simple switch that routed the calls, like so: ` class Backend_lib { function route($method,&$output) { $CI =& get_instance(); switch ($method) { // Login case 'login_user': $CI->load->library('auth_lib'); $output = $CI->auth_lib->login_user(); break; } } } ` This keeps the JavaScript and PHP code nice and simple and easy to maintain.