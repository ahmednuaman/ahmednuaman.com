package 
{
	import com.example.ApplicationFacade;
	
	import flash.display.DisplayObject;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	
	[SWF( backgroundColor="#FFFFFF", frameRate="60", width="960", height="750" )]
	
	public class App extends Sprite
	{
		private var facade:ApplicationFacade;
		
		public function App()
		{
			loaderInfo.addEventListener( Event.INIT, init );
		}
		
		private function init(e:Event):void
		{
			facade 				= ApplicationFacade.getInstance();
			
			stage.addEventListener( Event.RESIZE, handleResize );
			
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			facade.handleStartup( this );
			
			forceResize();
		}
		
		private function handleResize(e:Event):void
		{
			facade.handleResize( getWidth, getHeight );
		}
		
		public function forceResize():void
		{
			stage.dispatchEvent( new Event( Event.RESIZE ) );
		}
		
		public function get getHeight():Number
		{
			return ( stage.stageHeight > 0 ? stage.stageHeight : loaderInfo.height );
		}
		
		public function get getWidth():Number
		{
			return ( stage.stageWidth > 0 ? stage.stageWidth : loaderInfo.width );
		}
		
		override public function addChild(child:DisplayObject):DisplayObject
		{
			var c:DisplayObject	= super.addChild( child );
			
			forceResize();
			
			return c;
		}
	}
}
