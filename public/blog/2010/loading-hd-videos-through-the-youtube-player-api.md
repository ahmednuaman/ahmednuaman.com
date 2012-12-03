title: Loading HD Videos Through The YouTube Player API
link: http://www.ahmednuaman.com/blog/loading-hd-videos-through-the-youtube-player-api/
creator: ahmed
description: 
post_id: 540
post_date: 2010-07-06 22:28:11
post_date_gmt: 2010-07-06 21:28:11
comment_status: open
post_name: loading-hd-videos-through-the-youtube-player-api
status: publish
post_type: post

# Loading HD Videos Through The YouTube Player API

Before I start, let me plug some of my code: a lot of developers out there go ahead and create their own little helper classes for the YouTube player. However, do feel free to use my "YouTube Approved" (oh yeah) Player API class up on [github](http://github.com/ahmednuaman/AS3/blob/master/com/firestartermedia/lib/as3/display/component/video/YouTubePlayerAS3.as). So, you've got your project and you're told to "load that video in HD". Now one must remember that unless your player is larger than, say 600px wide, there's no point having it in HD. If you're loading a HD video into a player that's smaller than 600px, Flash Player is going to have to scale every frame down and this uses resources, and this isn't good. It's worth having a good read of the [playback quality types available from YouTube](http://code.google.com/apis/youtube/js_api_reference.html#Playback_quality) and decide which one works for your project. So, back to the original dilemma, how does one make the player HD? Well, it's pretty simple, just use the "setPlaybackQuality()" function, but this has to be fired, preferably, when the player has loaded and is buffering the video, like so: ` private function foo():void { player.addEventListener( 'onStateChange', handleStateChanged ); } private function handleStateChanged(e:Object):void { var state:Number = player.getPlayerState(); if ( state === 3 ) { player.setPlaybackQuality( 'large' ); } } ` Simples eh? Like I said, all this is in my [YouTube Player class up on github](http://code.google.com/apis/youtube/js_api_reference.html#Playback_quality). Tell me what you think