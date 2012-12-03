title: Quick jQuery Browser Detection Snippet
link: http://www.ahmednuaman.com/blog/quick-jquery-browser-detection-snippet/
creator: ahmed
description: 
post_id: 282
post_date: 2009-07-16 07:34:33
post_date_gmt: 2009-07-16 07:34:33
comment_status: open
post_name: quick-jquery-browser-detection-snippet
status: publish
post_type: post

# Quick jQuery Browser Detection Snippet

**Update: I've added a little example below...** As most of you know there lurks browsers that we don't really like building web sites for (*cough* Internet Explorer) and there comes a time in any developers work when they need to detect browsers. jQuery has a really nice API for detecting browsers, but sometimes you want to go a bit further. The snippet I'm putting on this page will detect the browser and OS for you and add a nice little CSS class to the body tag, thus allowing you to write up all your CSS ready for users of different browser and OS creed. Here it is: ` function detectBrowsers() { if ( $.browser.msie ) { if ( $.browser.version == '8.0' ) { $('body').addClass( 'ie8' ); } else if ( $.browser.version == '7.0' ) { $('body').addClass( 'ie7' ); } else { $('body').addClass( 'ie6' ); } } if ( $.browser.safari ) { if ( navigator.userAgent.indexOf( 'Safari' ) != -1 ) { $('body').addClass( 'safari' ); } else { $('body').addClass( 'chrome' ); } } if ( $.browser.mozilla ) { if ( $.browser.version.substr( 0, 3 ) == '1.9' ) { $('body').addClass( 'ff3' ); } else { $('body').addClass( 'ff2' ); } } if ( navigator.userAgent.indexOf( 'Windows' ) != -1 ) { $('body').addClass( 'windows' ); } else if ( navigator.userAgent.indexOf( 'Mac' ) != -1 ) { $('body').addClass( 'mac' ); } } ` And how would you use it? Well I'd suggest something like this: ` function ready() { detectBrowsers(); } function detectBrowsers() { ... } $(document).ready( ready ); ` Now you may be thinking "what about Linux?". Well our good friends who use Linux tend to use FireFox 2/3, and that's good, so they're good, therefore I don't really need to check for them. Here's a little example for you to mull over:

Tell me what you think.

## Comments

**[petra](#168 "2009-08-25 14:31:31"):** I am just wondering whether you have any working examples to support this post. Not sure if I'm doing something wrong, but can't seem to get it to work... no class is being applied to tag... thanks

**[Ahmed](#169 "2009-08-25 14:49:54"):** I've added an example for you, try it out.

**[petra](#170 "2009-08-25 15:33:01"):** thank you for the sample in such a prompt manner. I guess what isn't clear to me how do you apply the jQuery portion. I have added the above posted code snippet into an external JS file, along with jQuery latest version, linked to both of them... but nothing seems to be happening. In your example, I can't see where do you apply it. I can see the body class being properly applied to ... Anyway, maybe having the entire HTML structure of the page as an example could be more helpful. To see what you are linking to, etc. THANK YOU again for your help. This is very helpful post, just wish I was better at JS. ;)

**[petra](#171 "2009-08-25 15:37:26"):** just got it to work :) THANK YOU AGAIN!!!!!!

**[Ahmed](#172 "2009-08-25 15:40:06"):** Cool. It looks like you were missing the: `$(document).ready( detectBrowsers )`

**[petra](#173 "2009-08-25 15:45:04"):** one more question though... I noticed that by using the JS that you have included in your "live" example doesn't have the example above included... and it is much more extensive JS file than I anticipated. I have originally started with including this, but that didn't seem to work: `function ready() { detectBrowsers(); } function detectBrowsers() { if ( $.browser.msie ) { if ( $.browser.version == '8.0' ) { $('body').addClass( 'ie8' ); } else if ( $.browser.version == '7.0' ) { $('body').addClass( 'ie7' ); } else { $('body').addClass( 'ie6' ); } } if ( $.browser.safari ) { if ( navigator.userAgent.indexOf( 'Safari' ) != -1 ) { $('body').addClass( 'safari' ); initSafariSearch(); } else { $('body').addClass( 'chrome' ); } } if ( $.browser.mozilla ) { if ( $.browser.version.substr( 0, 3 ) == '1.9' ) { $('body').addClass( 'ff3' ); } else { $('body').addClass( 'ff2' ); } } if ( navigator.userAgent.indexOf( 'Windows' ) != -1 ) { $('body').addClass( 'windows' ); } else if ( navigator.userAgent.indexOf( 'Mac' ) != -1 ) { $('body').addClass( 'mac' ); } } $(document).ready( ready ); `

**[Ahmed](#174 "2009-08-25 15:51:35"):** The example's been updated, it works in the same way, check it out...

**[petra](#175 "2009-08-25 18:29:56"):** thank you, it's working like a charm :)

