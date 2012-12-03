title: FireFox has problems telling the time
link: http://www.ahmednuaman.com/blog/firefox-has-problems-telling-the-time/
creator: ahmed
description: 
post_id: 776
post_date: 2012-01-20 12:48:41
post_date_gmt: 2012-01-20 12:48:41
comment_status: open
post_name: firefox-has-problems-telling-the-time
status: publish
post_type: post

# FireFox has problems telling the time

Who'd have thought that [FireFox has a problem telling the time](https://bugzilla.mozilla.org/show_bug.cgi?id=487897)? If you try and create a new 'Date()' object and set the time to zero, most browsers return 1st Jan 1970 at 00:00, however FireFox seems to think that I'm currently in BST and return 1:00am. Magic: Here's what Chrome says: ![Chrome's representation of the time](http://f.cl.ly/items/2X1N3L1N3d2h0t3s1l2t/Screen%20Shot%202012-01-20%20at%2012.17.42.png) And here's what FireFox says: ![FireFox's representation of the time](http://f.cl.ly/items/1T3P061S3E3K112d3m2O/Screen%20Shot%202012-01-20%20at%2012.17.48.png) So, how does one get around this? Well with a bit of cunning it seems. FireFox returns 'Date.getTimezoneOffset()' as -60 and this is what we need to put the clocks back: ` function formatTime(t) { // a fix for FireFox's time issue var o = t.getTimezoneOffset(); var n = o ? o / -60 : 0; return appendZero( t.getHours() - n ) + ':' + appendZero( t.getMinutes() ) + ':' + appendZero( t.getSeconds() ) } var d = new Date(); d.setTime( 0 ); console.log( formateTime( d ) ); `