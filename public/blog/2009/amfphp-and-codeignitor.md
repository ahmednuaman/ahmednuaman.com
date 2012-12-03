title: AMFPHP and CodeIgnitor
link: http://www.ahmednuaman.com/blog/amfphp-and-codeignitor/
creator: ahmed
description: 
post_id: 103
post_date: 2009-05-29 15:31:46
post_date_gmt: 2009-05-29 15:31:46
comment_status: open
post_name: amfphp-and-codeignitor
status: publish
post_type: post

# AMFPHP and CodeIgnitor

As soon as I had written the [entry about my success with AMFPHP and AS3](http://ahmednuaman.com/blog/2009/05/29/amfphp-and-as3/), I had a crack about sorting it out with [CodeIgnitor](http://codeigniter.com/). It's been a painful few hours, but I soon realised that my failing was this line in "index.php": ` error_reporting(E_ALL); ` It needs to be this, to suppress any blank spaces so that the content type is "application/x-amf": ` error_reporting(E_ALL ^ E_NOTICE); ` Awesome! Here's the [CI Wiki page about integrating AMFPHP and CI](http://codeigniter.com/wiki/Amfphp_and_CI/).