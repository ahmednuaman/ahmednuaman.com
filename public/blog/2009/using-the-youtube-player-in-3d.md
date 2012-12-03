title: Using The YouTube Player In 3D
link: http://www.ahmednuaman.com/blog/using-the-youtube-player-in-3d/
creator: ahmed
description: 
post_id: 385
post_date: 2009-09-08 15:00:36
post_date_gmt: 2009-09-08 15:00:36
comment_status: open
post_name: using-the-youtube-player-in-3d
status: publish
post_type: post

# Using The YouTube Player In 3D

Yep, I've cracked it. Well, sort of. You see, I've written [a](/blog/2009/08/21/papervision3d-moviematerial-to-hack-or-not-to-hack/) [few](/blog/2009/08/28/papervision3d-and-the-youtube-player-just-hack-it/) [posts](/blog/2009/08/26/messing-with-papervision3d-and-materialplane-interactivity/) about trying to get the [YouTube player](/blog/2009/09/01/new-shiny-and-improved-youtube-wrapper/) and interactivity to behave with [Papervision3D](http://papervision3d.org). The issue was that Papervision3D (and other 3D engines) render the planes/materials/objects as bitmaps and you can't render the YouTube player as a bitmap. So, after a bit of playing, I've added the player into a "3D" native environment using the Flash Player 10 API. Here's the code: ` package { import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer; import flash.display.LoaderInfo; import flash.display.Sprite; import flash.display.StageAlign; import flash.display.StageScaleMode; import flash.events.Event; import flash.geom.Point; import flash.system.Security; [SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )] public class App extends Sprite { private var player:YouTubePlayer; public function App() { stage.align = StageAlign.TOP_LEFT; stage.scaleMode = StageScaleMode.NO_SCALE; Security.allowDomain( '*' ); Security.allowDomain( 'www.youtube.com' ); Security.allowDomain( 'youtube.com' ); Security.allowDomain( 's.ytimg.com' ); Security.allowDomain( 'i.ytimg.com' ); init(); } private function init():void { transform.perspectiveProjection.projectionCenter = new Point( 290, 250 ); transform.perspectiveProjection.fieldOfView = 45; player = new YouTubePlayer(); player.autoPlay = true; player.wrapperURL = ( LoaderInfo( loaderInfo ).parameters.url ||= 'assets/swf/YouTubePlayerWrapper.swf' ); player.play( 'AF4a-N4fAuI' ); addChild( player ); stage.addEventListener( Event.ENTER_FRAME, handleEnterFrame ); } private function handleEnterFrame(e:Event):void { player.rotationX = stage.mouseX; player.rotationY = stage.mouseX; player.rotationZ = stage.mouseX; player.x = ( stage.stageWidth / 2 ) - ( player.playerWidth / 2 ); player.y = ( stage.stageHeight / 2 ) - ( player.playerHeight / 2 ); } } } ` And here's the result: 

[kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/yt3d/App.swf?url=/_/dev/yt3d/assets/swf/YouTubePlayerWrapper.swf" width="580" height="400" targetclass="flashmovie"/]

You need to remember to [target Flash Player 10](http://opensource.adobe.com/wiki/display/flexsdk/Targeting+Flash+Player+10) or it won't work! And you can see that it's a pretty (dirty) implementation of Flash Player 10's native 3D. Now to create a native cube class...

## Comments

**[samBrown](#202 "2009-09-08 16:12:41"):** Nice! I was messing around with this same effect last week or so and ran into a roadblock. Looking forward to digging into this more after work. Thanks for the post!

**[Ahmed](#204 "2009-09-08 16:59:04"):** Cool, glad you like it. I'm going to put together a native cube class! That should be fun!

**[Monkey](#212 "2009-09-09 22:21:44"):** I HATE YOU! #@!*! I thought for once id beet you to it as i havce been building somthing with the youtube vid on sides of a cube and your youtube player info helped me out loads- but i have top just suck it up and admit i was beeten to the result by the better man again! Good Work Ahmed - will see how your implimentation compaires to ours and merge the two. Thanks Monkey

**[Ahmed](#213 "2009-09-10 06:19:04"):** Ah man, my bad! Well I'll be creating a load of native 3D libraries that "do the maths" for you, and I'll stick them up on github, so why don't you fork my work?

