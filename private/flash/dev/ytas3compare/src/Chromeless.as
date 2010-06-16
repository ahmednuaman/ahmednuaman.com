package 
{
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayerAS3;
	import com.firestartermedia.lib.as3.events.YouTubePlayerEvent;
	
	import flash.display.Sprite;
	
	import net.hires.debug.Stats;

	[SWF( backgroundColor="#ffffff", frameRate="60", width="800", height="400" )]
	
	public class Chromeless extends Sprite
	{
		private var ball:Ball									= new Ball();
		private var player:YouTubePlayerAS3						= new YouTubePlayerAS3();
		private var stats:Stats									= new Stats();
		
		public function Chromeless()
		{
			init();
		}
		
		private function init():void
		{
			player.chromeless	= true;
			player.playerHeight	= 400;
			player.playerWidth	= 600;
			
			player.addEventListener( YouTubePlayerEvent.BUFFERING, handleBuffering );
			
			player.play( 'SC-2VGBHFQI' );
			
			addChild( player );
			
			stats.x				= player.playerWidth;
			
			addChild( stats );
			
			ball.x				= stats.x + ball.width;
			ball.y				= stats.height + ball.height;
			
			addChild( ball );
		}
		
		private function handleBuffering(e:YouTubePlayerEvent):void
		{
			player.setPlaybackQuality( YouTubePlayerAS3.QUALITY_HD );
		}
	}
}
