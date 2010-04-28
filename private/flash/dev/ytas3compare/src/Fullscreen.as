package 
{
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayerAS3;
	import com.firestartermedia.lib.as3.events.YouTubePlayerEvent;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	
	import net.hires.debug.Stats;

	[SWF( backgroundColor="#ffffff", frameRate="60", width="1000", height="400" )]
	
	public class Fullscreen extends Sprite
	{
		private var player1:YouTubePlayerAS3					= new YouTubePlayerAS3();
		private var player2:YouTubePlayerAS3					= new YouTubePlayerAS3();
		private var stats:Stats									= new Stats();
		
		public function Fullscreen()
		{
			init();
			
			stage.align		= StageAlign.TOP_LEFT;
			stage.scaleMode	= StageScaleMode.NO_SCALE;
		}
		
		private function init():void
		{
			addChild( stats )
			
			player1.chromeless	= false;
			player1.playerHeight= 400;
			player1.playerWidth	= 600;
			player1.x			= stats.width;
			
			player1.play( '67iU21mdhCI' );
			
			addChild( player1 );
			
			player1.addEventListener( YouTubePlayerEvent.BUFFERING, handleBuffering );
		}
		
		private function handleBuffering(e:YouTubePlayerEvent):void
		{
			player2.chromeless	= false;
			player2.playerHeight= 400;
			player2.playerWidth	= 600;
			player2.pars		= '&fs=0';
			player2.x			= 600;
			
			player2.play( 'qAI6zlFN87Q' );
			
			addChild( player2 );
		}
	}
}
