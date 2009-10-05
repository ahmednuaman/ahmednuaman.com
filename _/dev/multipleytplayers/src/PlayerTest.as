package 
{
	import com.firestartermedia.lib.as3.display.component.interaction.ButtonSimple;
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer;
	
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.MouseEvent;
	import flash.system.Security;

	[SWF( backgroundColor="#FFFFFF" )]

	public class PlayerTest extends Sprite
	{	
		private var player:YouTubePlayer;
		
		public function PlayerTest()
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
			player = new YouTubePlayer();
			
			player.chromeless		= true;
			player.wrapperURL		= ( LoaderInfo( loaderInfo ).parameters.url ||= 'assets/swf/YouTubePlayerWrapper.swf' );
			
			//player.play( 'ghqjailPGOQ' );
			
			addChild( player );
			
			var button:ButtonSimple = new ButtonSimple();
			
			button.buttonText		= 'Pause the video';
			button.textEmbedFonts	= false;
			
			button.draw();
			
			button.addEventListener( MouseEvent.CLICK, handleClick );
			
			addChild( button );
		}
		
		private function handleClick(e:MouseEvent):void
		{
			player.pause();
		}
	}
}
