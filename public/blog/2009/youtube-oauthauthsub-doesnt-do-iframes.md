title: YouTube OAuth/AuthSub *Doesn't* Do iFrames
link: http://www.ahmednuaman.com/blog/youtube-oauthauthsub-doesnt-do-iframes/
creator: ahmed
description: 
post_id: 403
post_date: 2009-09-15 09:16:03
post_date_gmt: 2009-09-15 09:16:03
comment_status: open
post_name: youtube-oauthauthsub-doesnt-do-iframes
status: publish
post_type: post

# YouTube OAuth/AuthSub *Doesn't* Do iFrames

What a shame. YouTube officially doesn't support "[iframes](http://www.w3schools.com/TAGS/tag_iframe.asp)" when it comes to [OAuth](http://code.google.com/apis/youtube/2.0/developers_guide_protocol_oauth.html) and [AuthSub](http://code.google.com/apis/accounts/docs/AuthForWebApps.html). That's a bit of a pain, but have no fear, I've found a way around it. You see the issue is that YouTube's, well Google's, authentication system can't modify cookies as it's being loaded in an "iframe", making the site a third-party site from the parent and most browsers disallow third-party cookies. That's why if you have MPUs or other advertising on your site that uses "iframes", you normally see this in firebug: 

> Permission denied for <http://adsite.com> to call method Location.toString on <http://www.yoursite.com>.

So what's the way around it I hear you ask? Well, it's to get rid of the "iframe" and do a browser redirection. Simple. But, I know what you're thinking, what about getting the user back to where they were in the first place, well... 

  * If your gadget/microsite is mainly server-side, so lots of page refreshes and so on, you just give them a cookie and pass them back to the URL from which they came from; you can then work out the logic yourself.
  * If your gadget/microsite is mainly client-side, such as Flash or JavaScript (which in my opinion it should be), then you can make uses of the wonderful world of hashes! This means that you append an informative hash to the end of the "[next](http://code.google.com/apis/youtube/2.0/developers_guide_protocol_authsub.html)" URL when you submit to the authentication system, such as "#user/was/here".
Now I talk a lot about Flash, so obviously if you're reading this, then you might have built your gadget in Flash or JavaScript, so this is what would happen: 
  * You submit the parameters to YouTube and this refreshes the browser window
  * The user does their business, log in, and allow access, then everyone's happy
  * Now they're back on your site and they'll be on the gadget's/microsite's URL which may look like: http://microsite.com/gadget.html?#user/was/here?token=sowasi
  * You can then use some cunning JavaScript to get the hash and the token variable from the URL and off then go back to your gadget
Job done! I've uploaded examples to my [Github](http://github.com/ahmednuaman/YouTube-Auth-And-Upload), check them out and tell me what you think.

## Comments

**[Angela](#273 "2009-12-02 10:19:18"):** Hi i stumbled upon your tutorial for authentication and upload to youtube, And it seemed like the solution for me. Except the iframes aren't working as you've already figured out ofcourse. I know here you explain the way around it, but could you please put an example working code for it, please! By the way the gadget i'm working on is going to be client-side. I hope you can help me with this

**[Ahmed](#274 "2009-12-02 15:39:58"):** Of course. I'll put one up ASAP, but all you have to do is to post to YouTube in your current page. With my example, I have a call back page that runs some JS, instead of that, just do your stuff. You've mentioned it's for a gadget, is that a YT gadget or a gadget ad?

**[venkata](#299 "2010-02-04 13:49:30"):** Hi I am using OAuth to connect to youtube api. I got accessToken and TokenSecret for a particular user. Now I would like to use the token and token secret to get the uploaded videos of a particular user . Please can you tell me how to achieve this. which classes to use from the dll's using Google.GData.Client; using Google.YouTube; using Google.GData.Extensions; using Google.GData.YouTube; thank you, kind regards.

**[Ahmed](#304 "2010-02-18 22:36:32"):** Hmmm sorry this is a tough one but I don't work with ASP.NET! Sorry!

