title: Quite Possibly the Easiest (and Smallest?) jQuery Carousel
link: http://www.ahmednuaman.com/blog/quite-possibly-the-easiest-and-smallest-jquery-carousel/
creator: ahmed
description: 
post_id: 671
post_date: 2011-02-07 14:10:07
post_date_gmt: 2011-02-07 14:10:07
comment_status: open
post_name: quite-possibly-the-easiest-and-smallest-jquery-carousel
status: publish
post_type: post

# Quite Possibly the Easiest (and Smallest?) jQuery Carousel

Here's a quickie: a nice and small jQuery carousel... Take some list items: `

  * Hello!
  * Why hello again?
  * We need to stop meeting like this...

` And apply some CSS: ` ul, li { margin: 0; padding: 0; } #carousel { display: block; position: relative; width: 400px; height: 250px; overflow: hidden; } #carousel ul { display: block; width: 5000px; height: 250px; } #carousel li { display: block; float: left; width: 400px; height: 250px; background: #0080FF; color: #FFFFFF; font-size: 12pt; } ` And finally sprinkle with some JS: ` $( document ).ready( function() { var t = $( '#carousel' ); var m = $( 'li', t ).length; var w = $( 'li:first', t ).outerWidth(); var i = 0; setInterval( function() { if ( i >= m ) { i = 0; } $( 'ul', t ).animate({ 'margin-left' : i * w * -1 + 'px' }, 1000, 'easeInOutQuint' ); i++; }, 3000 ); }); ` And voila:

## Comments

**[Mr Shafique Ahmad](#431 "2011-02-18 08:33:00"):** Good One :)

**[John](#442 "2011-11-26 09:55:00"):** Thanks for great piece of code..

