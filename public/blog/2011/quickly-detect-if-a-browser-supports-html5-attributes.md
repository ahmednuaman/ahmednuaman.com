title: Quickly Detect If A Browser Supports HTML5 Attributes
link: http://www.ahmednuaman.com/blog/quickly-detect-if-a-browser-supports-html5-attributes/
creator: ahmed
description: 
post_id: 682
post_date: 2011-02-07 21:43:10
post_date_gmt: 2011-02-07 21:43:10
comment_status: open
post_name: quickly-detect-if-a-browser-supports-html5-attributes
status: publish
post_type: post

# Quickly Detect If A Browser Supports HTML5 Attributes

Wow, I'm on fire today! So, here's a quick code snippet to check to see if a browser supports HTML5 attributes, in this case the <input> tag's 'number' type: ` var input = document.createElement( 'input' ); input.setAttribute( 'type', 'number' ); if ( input.type == 'text' ) { $( 'html' ).addClass( 'no_inputs' ); } `