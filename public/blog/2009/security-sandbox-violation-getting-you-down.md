title: Security Sandbox Violation Getting You Down?
link: http://www.ahmednuaman.com/blog/security-sandbox-violation-getting-you-down/
creator: ahmed
description: 
post_id: 202
post_date: 2009-06-23 14:26:51
post_date_gmt: 2009-06-23 14:26:51
comment_status: open
post_name: security-sandbox-violation-getting-you-down
status: publish
post_type: post

# Security Sandbox Violation Getting You Down?

When working with Flash Player you _will_ come across this error one time or another: 

> *** Security Sandbox Violation *** SecurityDomain 'http://s.ytimg.com/yt/swf/cps-vfl104716.swf' tried to access incompatible context 'http://www.youtube.com/v/fXldKmGuPqM &autoplay;=0&loop;=0&rel;=0&showsearch;=0&hd;=1' 

And it may not necessarily be for YouTube (as the above error is). Now don't fret because there are ways around this. Flash Player allows you to specifiy "safe" domains from which it _shouldn't_ complain about security violations. By the way, you can read up about [Flash Player security settings here](http://livedocs.adobe.com/flash/9.0/main/wwhelp/wwhimpl/common/html/wwhelp.htm?context=LiveDocs_Parts&file=00000347.html). So how do we fix it? Well we use the "[Security()](http://livedocs.adobe.com/flash/9.0/ActionScriptLangRefV3/flash/system/Security.html)" class. The following code basically tells Flash Player that we're allowing SWFs from these locations to access stuff in our SWF: ` Security.allowDomain( 'www.mydomain.com' ); ` And this will (hopefully) stop your warnings appearing. However, most of the time, the warnings stem from Actionscript 2, and then you'll need to put the allow domain code in your Actionscript 2 SWF, using code similar to: ` System.security.allowDomain( 'www.mydomain.com' ); `

## Comments

**[Jerome](#119 "2009-07-13 20:34:32"):** Hi Ahmed, Thanks for this. I'm using System.security.allowDomain('www.youtube.com'); The youtube videos are playing when I test my website online. However when I test the movie in Flash itself, I keep getting the Security Sandbox violations, while the videos do play. Should I solve that some other way or is that not much to worry about?

**[Ahmed](#122 "2009-07-14 09:04:05"):** Hi Jerome, It's a bit of a hack, are you using AS2 or AS3?

**[PHP Website Development at India](#126 "2009-07-20 09:47:21"):** Great resource and list, will certainly be bookmarking this page.Iâ€™m glad everyone is finding this useful,Thank For Post....

**[Juneink](#440 "2011-10-20 19:21:00"):** I used a combination of your code and a crossdomain.xml file. Using these two together solved my sandbox security issues. Thank you for your tip - saved me from several hours of stress :) AS2 code:System.security.allowDomain("mydomain.com");External crossdomain.xml code:

