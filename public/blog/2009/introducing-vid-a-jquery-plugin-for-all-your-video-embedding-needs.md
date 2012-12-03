title: Introducing Vid - A jQuery Plugin For All Your Video Embedding Needs
link: http://www.ahmednuaman.com/blog/introducing-vid-a-jquery-plugin-for-all-your-video-embedding-needs/
creator: ahmed
description: 
post_id: 476
post_date: 2009-11-01 16:45:24
post_date_gmt: 2009-11-01 16:45:24
comment_status: open
post_name: introducing-vid-a-jquery-plugin-for-all-your-video-embedding-needs
status: publish
post_type: post

# Introducing Vid - A jQuery Plugin For All Your Video Embedding Needs

It all started with a tweet: 

> [@tensafefrogs](http://twitter.com/tensafefrogs): Cleaning up the YouTube embed code a bit: [http://bit.ly/3oA4yM](http://bit.ly/3oA4yM)

I replied to Geoff saying 'why not use javascript?' to which he said: 'because we want to be compatible with many (every) publishing platforms, and many of them don't allow javascript'. So that got me thinking, why not create a simple and small [jQuery](http://jquery.com) [plugin](http://www.google.com/search?hl=en&client=safari&rls=en&q=jquery+plugin&aq=f&oq=&aqi=g10) for embedding videos... So I did... I've stuck it up on [github](http://github.com/ahmednuaman), it's called '[vid](http://github.com/ahmednuaman/vid)' and it's very simple to use: ` < !DOCTYPE html> 

` And this gives you (yep, it really is my favourite video): 

Cool eh? Not only does it work for [YouTube](http://youtube.com), but also [Vimeo](http://vimeo.com), [DailyMotion](http://dailymotion.com) and of course, [1Click2Fame.com](http://1click2fame.com) (come on, I'm not going to leave my _own_ player out am I?). **Vimeo** ` < !DOCTYPE html> 

`

**DailyMotion** ` < !DOCTYPE html> 

`

**1Click2Fame.com** ` < !DOCTYPE html> 

`

I must say, much love to [Jonathan Neal for his jQuery SWFObject plugin](http://jquery.thewikies.com/swfobject/), I'm using that here. So [check it out](http://github.com/ahmednuaman/vid), tell me if you want anything added to it, and fork me! I'm going to be enabling JavaScript API interactions very soon too!

## Comments

**[Phil](#279 "2009-12-09 10:30:15"):** Currently not in use on the live site (given) but will be soon as it all works in development while renovating the site (please don't judge me on the quality of the current site :P its not mine). Good little app, nice and tidy. Phil

**[Ahmed](#280 "2009-12-09 20:39:59"):** Anything I can do to help, I need to update this plugin, need to implement oembed too

**[Ahmed](#367 "2010-11-07 16:01:27"):** It could be, but this JS is purely for those video sites

**[Ahmed](#368 "2010-11-07 16:02:36"):** Hmm that is interesting, it looks like it's to do with script permissions on your site! Will update the plugin when I've got some time.

**[yun](#363 "2010-09-27 12:49:29"):** can your player be used to play local-hosted vids instead of youtube,vimeo,dm etc?

**[Phil](#360 "2010-09-17 21:52:56"):** Pretty nifty little plugin there, if I may say so! Exactly what I was looking for with an extremely "particular" customer of mine that exclusively uses Vimeo. One little niggle is that get Actionscript errors display on IE8(and below) sometimes on vids sourced from vimeo. I'm no expert, so I can't tell from the errors who or what is causing the errors. It could be me/my client with our Explorer settings or it could be Vimeo (YouTube videos come through without a hitch) , but thought I'd better let you know. I could copy and paste the error I get for you by the way, and here it is SecurityError: Error #2060: Security sandbox violation: ExternalInterface caller http://assets.vimeo.com/flash/moogaloop/5.0.5/moogaloop.swf?clip%5Fid=14815536&js%5Fapi=1&embed%5Flocation=http%253A%252F%252Fborkowski%2Efinervision%2Ecom%252Findex%2Ehtm&moogaloop%5Ftype=moogaloop cannot access http://borkowski.finervision.com/index.htm. at flash.external::ExternalInterface$/_initJS() at flash.external::ExternalInterface$/call() at com.vimeo.loopy::LoopyAPI/api_onLoad() at com.vimeo.loopy::LoopyAPI/configManagerCompleteHandler() at flash.events::EventDispatcher/dispatchEventFunction() at flash.events::EventDispatcher/dispatchEvent() at com.vimeo.loopy.libraries::ConfigurationManager/loaderCompleteHandler() at flash.events::EventDispatcher/dispatchEventFunction() at flash.events::EventDispatcher/dispatchEvent() at flash.net::URLLoader/onComplete() Probably something you may understand better than I. Well done either way!

**[james](#377 "2010-12-08 04:20:15"):** When combined with 'videolightbox.com' code on the same page it had some bizarre effects...  #videogallery a#videolb{display:none}

**[Kundun](#432 "2011-03-07 10:11:00"):** I cannot use the fullscreen function when I embed the video with this script. Is there a way in which this would become possible?

**[Kundun](#433 "2011-03-07 12:06:00"):** Found it after searching a little bit. Added allowFullScreen: true to the params in the jquery.vid.js-file.

**[webgirl](#434 "2011-03-27 17:48:00"):** Can you let me know if this video player can play a slide show of images after the video? Looking for a slide show player that can play video and still photos. Ideas?

**[Sujac](#435 "2011-03-28 19:07:00"):** I am looking for a jquery plugin to play my company add videos on the site.Do you have any idea about it ?

**[Ahmed](#436 "2011-03-29 10:19:21"):** Have you tried Googling? There are a number of things you can do. If you want, drop me an email.

**[Ahmed](#437 "2011-03-29 10:19:56"):** Nope, all this does is bring in other video players. If you want something like that I suggest you do a Google search or contact a developer.

**[Ahmed](#438 "2011-03-29 10:20:13"):** Sorry about that, I need to update it.

**[Paddygriffin](#441 "2011-11-04 17:04:00"):** are you able to set the height and width of the video file in the script?

