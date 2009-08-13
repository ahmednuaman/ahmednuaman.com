package
{
	import flash.display.DisplayObject;
	import flash.display.Loader;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.net.URLRequest;
	import flash.utils.Dictionary;

	[SWF( width="900", height="400", frameRate="24", backgroundColor="#FFFFFF" )]

	public class App extends Sprite
	{
		private var loaderToPlayerInfo:Dictionary				= new Dictionary();
		private var playerToPlayerInfo:Dictionary				= new Dictionary();
		private var requestURL:String							= 'http://www.youtube.com/apiplayer?version=3';
		
		public function App()
		{
			stage.align = StageAlign.TOP_LEFT;
			stage.scaleMode = StageScaleMode.NO_SCALE;
			
			loadAPlayer( 'R7yfISlGLNU', 450, 400 );
			loadAPlayer( 'NisCkxU544c', 450, 400, 450 );
		}
		
		private function loadAPlayer(videoId:String, width:Number, height:Number, x:Number=0, y:Number=0):void
		{
			var request:URLRequest = new URLRequest( requestURL );
			var loader:Loader = new Loader();
			
			loaderToPlayerInfo[ loader ] = { videoId: videoId, width: width, height: height, x: x, y: y };
			
			loader.contentLoaderInfo.addEventListener( Event.INIT, handleLoaderInit );
			
			loader.load( request );			
		}
		
		private function handleLoaderInit(e:Event):void
		{
			var player:Object = e.target.content;
			
			player.addEventListener( 'onReady', handlePlayerReady );
			
			playerToPlayerInfo[ player ] = loaderToPlayerInfo[ e.target.loader ];
			
			addChild( player as DisplayObject );
		}
		
		private function handlePlayerReady(e:Event):void
		{
			var player:Object = e.target;
			var properties:Object = playerToPlayerInfo[ player ];
			
			player.loadVideoById( properties.videoId );
			
			player.setSize( properties.width, properties.height );
			
			player.x = properties.x;
			player.y = properties.y;
		}
	}
}