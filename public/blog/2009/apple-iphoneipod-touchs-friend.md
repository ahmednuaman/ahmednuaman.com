title: Apple iPhone/iPod Touch's <meta> friend
link: http://www.ahmednuaman.com/blog/apple-iphoneipod-touchs-friend/
creator: ahmed
description: 
post_id: 77
post_date: 2009-05-28 10:49:03
post_date_gmt: 2009-05-28 10:49:03
comment_status: open
post_name: apple-iphoneipod-touchs-friend
status: publish
post_type: post

# Apple iPhone/iPod Touch's <meta> friend

I've been trying to figure out why my web site isn't automatically scaled on Apple's iPhone or iPod Touch. I've used the program [iPhoney](http://sourceforge.net/projects/iphonesimulator/) to help me develop it for Apple's hardware and as for Android (which worked perfectly by the way) I just used my phone (it's a G1 you see) and the [Androind Emulator](http://developer.android.com/guide/developing/tools/emulator.html) when I felt lazy. It was a bit of a weird problem to crack, how to get Apple's Safari to automatically scale the site perfectly? After going round and round in circles, a friend of mine pointed me to [iPhoneSites.de](http://iPhoneSites.de). Now this site looks like it's been built in [Dashcode](http://developer.apple.com/tools/dashcode/) which is a great tool but you can see that the UI is very generic - not that that's a _bad_ thing. So I fired it up in FireFox hoping that they didn't have a computer version and viewed the source where I found this little meta-tag: ` ` So, after a bit of Googling and getting some info about the "[viewport](http://www.google.com/search?client=safari&rls=en-us&q=meta+viewport&ie=UTF-8&oe=UTF-8)" meta-tag name I've been able to identify its properties and what they do: 

  * **Width** The default is 980px and this is a setting to view ordinary web pages in the portrait aspect ratio. I've set mine to 320px.
  * **Height** The default is calculated depending on the aspect of the device and the width property.
  * **Initial-scale** The initial scale of the viewport as a multiplier. The default is calculated to fit the webpage in the visible area. The range is determined by the minimum-scale and maximum-scale properties. 
  * ******Minimum-scale** Specifies the minimum scale value of the viewport. The default is 0.25.
  * ******Maximum-scale** Specifies the maximum scale value of the viewport. The default is 1.6. 
  * ******User-scalable** Determines whether or not the user can zoom in and out. The default is yes. 
So charged with this knowledge I was then able to fix the annoying zoom issue with Apple's Safari. I think next time I need to have a full read of [Apple's iPhone Dev Docs](http://developer.apple.com/iphone/library/documentation/iPhone/Conceptual/iPhoneOSProgrammingGuide/Introduction/Introduction.html), but it's much easier to muck through everything.