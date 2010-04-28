package
{
	import com.firestartermedia.lib.as3.display.component.interaction.ButtonSimple;
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayerAS3;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.MouseEvent;

	[SWF( width="580", height="800", frameRate="24", backgroundColor="#FFFFFF" )]

	public class App extends Sprite
	{
		private var players:Array								= [ ];
				
		public function App()
		{
			var button:ButtonSimple 		= new ButtonSimple();
			
			stage.align = StageAlign.TOP_LEFT;
			stage.scaleMode = StageScaleMode.NO_SCALE;
			
			loadAPlayer( 'R7yfISlGLNU', 580, 400 );
			loadAPlayer( 'NisCkxU544c', 580, 400, 0, 400 );
			
			button.buttonText				= 'Pause the videos';
			button.textEmbedFonts			= false;
			
			button.draw();
			
			button.addEventListener( MouseEvent.CLICK, handleClick );
			
			addChild( button );
		}
		
		private function loadAPlayer(videoId:String, width:Number, height:Number, x:Number=0, y:Number=0):void
		{
			var player:YouTubePlayerAS3 	= new YouTubePlayerAS3();
			
			player.height 					= height;
			player.width 					= width
			player.x 						= x;
			player.y 						= y;
			
			player.play( videoId );
			
			players.push( player );
			
			addChild( player );	
		}
		
		private function handleClick(e:MouseEvent):void
		{
			for each ( var player:YouTubePlayerAS3 in players )
			{
				player.pause();
			}
		}
	}
}