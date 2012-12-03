title: Another Release Of The Shiny YouTube Actionscript3 Wrapper
link: http://www.ahmednuaman.com/blog/another-release-of-the-shiny-youtube-actionscript3-wrapper/
creator: ahmed
description: 
post_id: 433
post_date: 2009-09-29 09:42:06
post_date_gmt: 2009-09-29 09:42:06
comment_status: open
post_name: another-release-of-the-shiny-youtube-actionscript3-wrapper
status: publish
post_type: post

# Another Release Of The Shiny YouTube Actionscript3 Wrapper

Ok so after [some feedback on the last release of the wrapper](/blog/2009/09/01/new-shiny-and-improved-youtube-wrapper/), I've updated it and pushed it to [Github](http://github.com/ahmednuaman/YouTube-Player-Wrapper). There's no need to compile the SWF yourself, I've done the hard work for you. Aren't I nice? So, here's a quick run through on how you can use it. In this example, I'm using the chromeless player as there was an issue with it in the last release: ` package { import com.firestartermedia.lib.as3.display.component.interaction.ButtonSimple; import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer; import flash.display.LoaderInfo; import flash.display.Sprite; import flash.display.StageAlign; import flash.display.StageScaleMode; import flash.events.MouseEvent; import flash.system.Security; [SWF( backgroundColor="#FFFFFF" )] public class PlayerTest extends Sprite { private var player:YouTubePlayer; public function PlayerTest() { stage.align = StageAlign.TOP_LEFT; stage.scaleMode = StageScaleMode.NO_SCALE; Security.allowDomain( '*' ); Security.allowDomain( 'www.youtube.com' ); Security.allowDomain( 'youtube.com' ); Security.allowDomain( 's.ytimg.com' ); Security.allowDomain( 'i.ytimg.com' ); init(); } private function init():void { player = new YouTubePlayer(); player.chromeless = true; player.wrapperURL = ( LoaderInfo( loaderInfo ).parameters.url ||= 'assets/swf/YouTubePlayerWrapper.swf' );; player.play( 'ghqjailPGOQ' ); addChild( player ); var button:ButtonSimple = new ButtonSimple(); button.buttonText = 'Pause the video'; button.textEmbedFonts = false; button.draw(); button.addEventListener( MouseEvent.CLICK, handleClick ); addChild( button ); } private function handleClick(e:MouseEvent):void { player.pause(); } } } ` So, all I'm doing here is creating a button and creating the player and when you click that button, the player pauses: [kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/ytplayer/PlayerTest.swf?url=/_/dev/ytplayer/assets/swf/YouTubePlayerWrapper.swf" width="580" height="400" targetclass="border"/] So, hope that helps. If there's any more issues or requests, just comment back.

## Comments

**[Ikzy](#237 "2009-09-29 11:58:36"):** yoo nice, fast improvement.. however i'm getting: Error #2044: Unhandled IOErrorEvent:. text=Error #2035: URL Not Found. while i just copied the new files (com folder, and as.swf) over the old.. any clues on it?? thanks for the fast feedback so far!

**[Ahmed](#238 "2009-09-29 12:59:37"):** Make sure the app can access the wrapper!

