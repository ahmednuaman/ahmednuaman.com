title: The YouTube Player API
link: http://www.ahmednuaman.com/blog/the-youtube-player-api/
creator: ahmed
description: 
post_id: 234
post_date: 2009-06-29 14:17:48
post_date_gmt: 2009-06-29 14:17:48
comment_status: open
post_name: the-youtube-player-api
status: publish
post_type: post

# The YouTube Player API

**Update: keep up to date with my latest code on my [Github](http://github.com/ahmednuaman).** I've recently had an article on the [YouTube Player API for Actionscript 3 published on the Flashtuts+ network](http://active.tutsplus.com/tutorials/video/using-the-youtube-player-api-with-actionscript-30/). However, some people are having issues getting to grips with loading another video in-situ, so here's a slight change to the code: Once you [read the tutorial](http://active.tutsplus.com/tutorials/video/using-the-youtube-player-api-with-actionscript-30/), you will finish with two important files: 

  * YouTubePlayerWrapper.swf - The AS2 wrapper
  * App.as - The AS3 class files
Now the first thing to do in this customisation is to change the name of "App.as" to "YouTubePlayer.as", therefore our class is now called "YouTubePlayer". I've also added two new public variables called "playerWidth" and "playerHeight", so the class's code is now like this: ` package { import com.gskinner.utils.SWFBridgeAS3; import flash.display.Loader; import flash.display.Sprite; import flash.events.Event; import flash.net.URLRequest; public class YouTubePlayer extends Sprite { public static const BRIDGE_NAME:String = 'YouTubePlayerWrapperBridge'; public var playerWidth:Number = 600; public var playerHeight:Number = 400; private var player:Loader; private var bridge:SWFBridgeAS3; private var videoId:String; private var loaded:Boolean; public function init(videoId:String):void { this.videoId = videoId; if ( !loaded ) { var request:URLRequest = new URLRequest( 'assets/swf/YouTubePlayerWrapper.swf' ); player = new Loader(); addChild( player ); player.contentLoaderInfo.addEventListener( Event.INIT, handlePlayerLoadedComplete ); player.load( request ); } else { handlePlayerLoadedComplete(); } } public function play(videoId:String):void { bridge.send( 'playVideo', videoId, playerWidth, playerHeight, false, null, false ); } public function stop():void { bridge.send( 'stopVideo' ); } public function handlePlayerLoadedComplete(e:Event=null):void { if ( bridge ) { handleBridgeConnect(); } else { bridge = new SWFBridgeAS3( BRIDGE_NAME, this ); bridge.addEventListener( Event.CONNECT, handleBridgeConnect ); } } public function sendEvent(e:String):void { trace( e ); } private function handleBridgeConnect(e:Event=null):void { loaded = true; play( videoId ); } } } ` Now we can control this class through another base class, so create a file called "App.as" and put this code in there: ` package { import flash.display.Sprite; import flash.events.Event; import flash.events.MouseEvent; public class App extends Sprite { private var player:YouTubePlayer = new YouTubePlayer(); public function App() { var button:Sprite = new Sprite(); addChild( player ); button.graphics.beginFill( 0xFF0000 ); button.graphics.drawCircle( 0, 0, 20 ); button.graphics.endFill(); button.addEventListener( MouseEvent.CLICK, handleClick ); addChild( button ); player.init( '76aG8wcb8V8' ); } private function handleClick(e:MouseEvent):void { player.init( 'U5A7AjsZHmQ' ); } } } ` All this class does is create a new "YouTubePlayer()", it the draws a button, adds a listener that loads another video, thus allowing you to see how you can easily and simply load in a simple YouTube Player, like so: 

[kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/flashtuts/youtube_player_api/App.swf" width="580" height="400" targetclass="flashmovie"/]

**PS: I am going to publish my full YouTube Player API Library for AS3 on [github](http://github.com/ahmednuaman/Actionscript-3-Classes/tree/master) very soon!**

## Comments

**[Alexandre Bini](#113 "2009-07-02 14:53:03"):** Hi Ahmed! IÂ´m trying to use your source, but when i execute the swf (in flash), itÂ´s give me de following error: *** Security Sandbox Violation *** SecurityDomain 'http://www.youtube.com/v/f8nNOQOh7dc&autoplay=0&loop=0&rel=0&showsearch=0&hd=1' tried to access incompatible context 'file:///data/voraz/sua%5Fempreza/v2/public/flash/site/index.swf' Can you help me? Thanks

**[Ahmed](#114 "2009-07-02 15:11:47"):** Don't worry, that's not an error, [read my post about security violations](/blog/2009/06/23/security-sandbox-violation-getting-you-down/), that'll tell you all you need to know.

**[FLV Player](#125 "2009-07-17 12:44:34"):** Thanks for this good post....

**[Ahmed](#140 "2009-08-05 20:31:21"):** Glad I could help

**[Cirro](#139 "2009-08-05 13:58:03"):** "This video is not available in your country (Italy) due to copyright restrictions." , damn YouTube :P You're great Ahmed, thanks for your tutorials !

**[Cirro](#149 "2009-08-18 12:28:18"):** Hi, thanks again for you tutorial, here's what I've made using it http://www.kongregate.com/games/locos/youkongregate

**[Ahmed](#150 "2009-08-18 13:16:25"):** Good work, glad you like it!

**[Monkey](#163 "2009-08-22 11:30:23"):** HI Ahmed, How can i dispatch events to controll the player or listen to events that the player dispatches like READY ect from the main app that holds the player?

**[Ahmed](#164 "2009-08-22 12:59:24"):** You can do player.addEventListener and listen for the events in YouTubePlayerEvents. At the moment, you can only tell it to play, stop and resize! Is there anything else you're after?

**[moge](#165 "2009-08-24 00:56:37"):** Hey - thanks for the tutorial. It's very helpful but I'm having a weird problem. I can load a player and play a YouTube video, but when I call player.init('youtubeid') (same way you do with the button above) the new video loads and plays, but all the YouTube controls disappear. Any ideas?

**[Ahmed](#166 "2009-08-25 06:32:58"):** Can I see your code and an example?

**[moge](#179 "2009-09-02 03:57:35"):** Howdy - I got sidetracked and couldn't come back to this project for a while. But sample files can be found here... http://mogeworks.com/youtubesample/sampleYouTube.zip The first video that loads is an FLV. If you click the more tab, you'll see three vids. The second two are YouTube. It loads fine the first time, but if you reload or load another YouTube vid, the controls disappear. I haven't a clue where to even start looking for them. TabFeatured.as is where the code for the videos is, round about line 133. Thanks for any help - Moge

**[Ahmed](#180 "2009-09-02 19:37:14"):** Ok try using the new code up on [github](http://github.com/ahmednuaman/AS3/blob/347dd23913ed3eb6dbfb7139d8dfa606843f307b/com/firestartermedia/lib/as3/display/component/video/YouTubePlayer.as) and while you're there checkout the latest [wrapper](github.com/ahmednuaman/youTube-Player-Wrapper/tree)

**[moge](#182 "2009-09-03 21:52:04"):** Thanks! I'll check that out.

**[Brad](#183 "2009-09-05 15:47:20"):** Any idea why my attempts at this are only playing the sound and not the video?

**[Ahmed](#184 "2009-09-05 22:34:20"):** Got any examples I can see?

**[Fylyps](#185 "2009-09-07 09:22:27"):** Hello Ahmed, Thanks for your code. It's working right, but is it possible to play two or more videos at the same time (and the same flash app of course) ? Fylyps

**[Ahmed](#186 "2009-09-07 09:25:33"):** Not at the moment, it's because it uses local connection, and you'd need a second one for a second player and so on to Nth. It's also bad for memory, but have no fear cos YouTube have something up their sleeves...

**[Fylyps](#187 "2009-09-07 10:00:19"):** What do you mean? Are they going to release AS3 player eventually? I'm asking you about that, because i'm currently working on the project which should has the ability to load several vids at the same time and it's hard to find a way to do that. greetings ;)

**[Ahmed](#188 "2009-09-07 11:42:49"):** I can't comment on what YouTube are going to do I'm afraid! If you need to load serveral ones, it may be easier to use JavaScript for the time being! Otherwise you'll need several wrappers, each with their own unique local connection id.

**[rodrigo](#190 "2009-09-07 17:37:42"):** Hello .. My name is Rodrigo. I have a very big doubt on that player on youtube in flash ... I tried to adapt it to AS3 but I could not ... Could you get me up and running in AS3?

**[Ahmed](#191 "2009-09-07 18:30:46"):** Hi Rodrigo, what issues are you having?

**[rodrigo](#195 "2009-09-08 13:26:34"):** my problem is to put the youtube api to work with AS3, to be honest I did not understand how the interaction of API with AS3, this tutorial you wrote. I would like to make the API work also putting a thumbs picture of other videos and you can click on them to make their video display. I hope you can help me.

**[Ahmed](#196 "2009-09-08 13:29:39"):** Ok, I'd suggest you read this: http://flash.tutsplus.com/tutorials/video/creating-a-youtube-search-and-play-gadget-with-puremvc/

**[rodrigo](#197 "2009-09-08 15:03:11"):** I liked this tutorial, but first I would like to make the API work with AS3, then I would study how to put the thumbs ... as I said before, I found a little confusing the way you put the API to work with AS3 in the tutorial. If you can help me thank you.

**[Ahmed](#198 "2009-09-08 15:05:12"):** All you need to do to get the player to work is include the class at: com.firestartermedia.lib.as3.display.component.video.YouTubePlayer And then load the player like so: ` var player = new YouTubePlayer(); player.autoPlay = true; player.wrapperURL = 'assets/swf/YouTubePlayerWrapper.swf'; player.play( 'AF4a-N4fAuI' ); addChild( player ); `

**[rodrigo](#199 "2009-09-08 15:33:19"):** I did a test here and gave error ... ReferenceError: Error # 1056: Can not create the property wrapperURL of YoutubePlay.

**[Ahmed](#200 "2009-09-08 15:44:16"):** Please post your code, cos it looks like you're not referencing it correctly.

**[rodrigo](#201 "2009-09-08 16:08:04"):** which code? class YoutubePlay?

**[Ahmed](#203 "2009-09-08 16:58:06"):** Yep. It looks as though the "YoutubePlay" class you're using isn't correct. Zip up your project, upload it and post a link. I'll have a look for you.

**[rodrigo](#205 "2009-09-08 17:36:36"):** follow the link http://www.sendspace.com/file/25onrr

**[Ahmed](#207 "2009-09-08 18:55:26"):** Ok, you're doing in wrong. Firstly, you haven't got the [wrapper](http://github.com/ahmednuaman/YouTube-Player-Wrapper/blob/4324a0b29a10e30ae1399384d67014e399193ecd/YouTubePlayerWrapper.swf) there and this is the code you need to use in your FLA: ` var player = new YouTubePlayer(); player.init( 'AF4a-N4fAuI' ); addChild( player ); `

**[Ahmed](#210 "2009-09-09 06:19:16"):** You can download the wrapper from Github (http://github.com/ahmednuaman/YouTube-Player-Wrapper/blob/4324a0b29a10e30ae1399384d67014e399193ecd/YouTubePlayerWrapper.swf). I suggest you read the following posts and you can see lots of code examples: http://ahmednuaman.com/blog/tag/youtube/

**[rodrigo](#209 "2009-09-09 03:36:49"):** ok, and where I find the wrapper and how to use it? other questions, the class YoutubePlay I sent to you right?

**[rodrigo](#211 "2009-09-09 13:49:49"):** The files in the Zip, are far managed to get ... if you can fix them to work thanks. http://www.sendspace.com/file/pkl75c

**[Ahmed](#214 "2009-09-10 10:00:06"):** Sorry Rodrigo, I'm not going to do your work for you! I've supplied you with the code you need to fix your FLA, so I'm sure that you can put it together...

**[Web FLV Player](#228 "2009-09-23 12:03:57"):** Thanks for given this useful code. I will use it in my flv player.

**[moge](#232 "2009-09-27 20:08:04"):** HI - I've been off my YouTube project for a while and finally came back to it. I downloaded your latest .as code from github for YouTubePlayer and managed to track down the latst wrapper. However, I'm still having the same issue - when I load a second YouTube video, the YouTube controls disappear. Was there anything else I missed? Thanks for you help - Moge

**[pabloboloman](#233 "2009-09-27 20:48:30"):** thank's, that was nice!!!

**[jorge](#234 "2009-09-28 04:09:31"):** I have a problem, when you "compile" the youtubewrapper.as, what you put in the FLA file? to convert in SWF? because in the milestones examples you pass the ID of a specific video...so? sorry my english

**[Ahmed](#235 "2009-09-28 13:47:27"):** Ok, try getting the latest wrapper: http://ahmednuaman.com/blog/2009/09/01/new-shiny-and-improved-youtube-wrapper/

**[Ahmed](#236 "2009-09-28 13:48:04"):** There's no need to use the FLA, but don't bother compiling it yourself, just use my wrapper: http://ahmednuaman.com/blog/2009/09/01/new-shiny-and-improved-youtube-wrapper/

**[Lisa](#272 "2009-12-01 07:44:42"):** Hi , thats a wonderful stuff you wrote to play the you tube videos, its just amazing i have been playing with it for quite sometime now, but i just see only one issue with it, i see the CPU usage begin to increase as soon as video starts playing and if i keep playing videos continuously the CPU usage just goes on increasing, i know this could be a show stopper for this wonderful player, do you have any idea why this happens or any suggestions to get the usage down, i tried changing the frame rate of the flex app but it hardly works, i appreciate your response. Thanks again Lisa

**[Ahmed](#275 "2009-12-02 15:41:25"):** What you could do now is migrate to the new AS3 API: http://ahmednuaman.com/blog/2009/10/24/introducing-the-native-actionscript3-youtube-player/

