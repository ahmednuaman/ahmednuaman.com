package
{
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.geom.Point;
	import flash.system.Security;
	
	[SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )]

	public class App3D2 extends Sprite
	{
		private var player:YouTubePlayerAS3;
		
		public function App3D2()
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
			transform.perspectiveProjection.projectionCenter 	= new Point( 290, 250 );
			transform.perspectiveProjection.fieldOfView			= 45;
			
			player = new YouTubePlayerAS3();
			
			player.play( 'AF4a-N4fAuI' );
			
			addChild( player );
			
			stage.addEventListener( Event.ENTER_FRAME, handleEnterFrame );
		}
		
		private function handleEnterFrame(e:Event):void
		{
			player.rotationX	= stage.mouseX;
			player.rotationY	= stage.mouseX;
			player.rotationZ	= stage.mouseX;
			
			player.x			= ( stage.stageWidth / 2 ) - ( player.playerWidth / 2 );
			player.y			= ( stage.stageHeight / 2 ) - ( player.playerHeight / 2 );
		}
	}
}