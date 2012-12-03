title: YouTube 3D Carousel
link: http://www.ahmednuaman.com/blog/youtube-3d-carousel/
creator: ahmed
description: 
post_id: 5
post_date: 2009-05-11 10:05:26
post_date_gmt: 2009-05-11 10:05:26
comment_status: open
post_name: youtube-3d-carousel
status: publish
post_type: post

# YouTube 3D Carousel

Recently while working at Google I've been asked to built some YouTube products, essentially brand channel gadgets built on the [Google Gadgets API](http://code.google.com/apis/gadgets/). YouTube has two main gadgets that they sell: 

  * **YouTube Full-width Carousel** This is a simple carousel that allows the user to shuffle through some YouTube videos. It can work with both the [GData API](http://code.google.com/apis/youtube/overview.html) (so playlists, search and so on) and the YouTube Contest API (it's a "closed" format at the moment, so information is only available on a "need to know" basis). It's not the prettiest thing and there are a few things I don't really like about it. But it works and that's the main thing. You can see an example on the [YouTube Live Channel](http://youtube.com/live).
  * **YouTube Full-width and Normal-width Contest** YouTube contests are a great way to engage the YouTube and web community. They provide a simple interface and API that allows you to register votes and views for certain videos. Good examples of this are the [Davos Debates](http://youtube.com/davos), [Sprite's Green Eyed World](http://www.youtube.com/user/greeneyedworld) (although the developers missed a tricked and used Facebook comments rather than YouTube's). You'll notice that both the contest examples have custom gadgets rather than YouTube's product. A good use of YouTube's contest gadget would be the recent [Barclaycard Create compeition](http://youtube.com/barclaycardcreate). It's a nice format, but again, the aesthetics of the template let it down and a lot can be done to improve and make it look and work much better.
Since YouTube has these products, it's very important not to step on anyone's toes, so I just went about re-creating the carousel in a way that I think it should look and function. You can check it out here: [http://youtube.com/3dcarouseldemo](http://youtube.com/3dcarouseldemo). It's all customisable, from the background graidents to the size of the carousel and the video player. It's all built with Actionscript 3 and using Papervision3D for the carousel display. Here's a little peek: [![YouTube 3D Carousel Demo](http://ahmednuaman.com/blog/wp-content/uploads/2009/05/3dcarousel_screenshot.jpg) ](http://youtube.com/3dcarouseldemo) Another key point about this carousel is that it auto plays HQ/HD. One thing I don't like about YouTube pages and gadgets is that it seems acceptable to play the low quality footage. And while I understand that people may not have fast connections, HQ/HD is worth it. Saying that though, YouTube did bring out a player that detected the speed of your connection and if it was fast enough, it would bump up the quality. However as soon as it went up, it came back down, shame. So just to conclude, my new [YouTube Carousel](http://youtube.com/3dcarouseldemo) is available for all to see and any comments or ideas would be appreciated.