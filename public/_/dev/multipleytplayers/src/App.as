package {
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.system.Security;
	import flash.utils.setTimeout;

	public class App extends Sprite
	{
		private var i:Number									= 0;
		private var vids:Array									= [ 'ghqjailPGOQ', 'C54wqJBxrWg', 'yU5W4CkZHHQ', 'aSx2vOVW5vE' ];
		
		public function App()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			Security.allowDomain( '*' );
			Security.allowDomain( 'www.youtube.com' );  
			Security.allowDomain( 'youtube.com' );  
			Security.allowDomain( 's.ytimg.com' );  
			Security.allowDomain( 'i.ytimg.com' );
			
			init();
		}
		
		private function init():void
		{
			for each ( var video:String in vids )
			{
				addPlayer( video );
			}
		}
		
		private function addPlayer(videoId:String):void
		{
			var player:YouTubePlayer = new YouTubePlayer();
			
			player.bridgeName		= 'ytPlayer' + i;
			player.wrapperURL		= 'assets/swf/YouTubePlayerWrapper.swf';
			player.x				= ( player.playerWidth + 10 ) * i;
			
			player.play( videoId );
			
			addChild( player );
			
			i++;
		}
	}
}
