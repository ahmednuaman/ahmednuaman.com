package
{
	import flash.display.Sprite;
	import flash.system.Security;

	public class YouTubePlayerAS3 extends Sprite
	{
		public var playerHeight:Number							= 300;
		public var playerWidth:Number							= 400;
		
		private var requestURL:String							= 'http://www.youtube.com/apiplayer?version=3';
		
		private var player:Object;
		private var videoId:String;
		
		public function YouTubePlayerAS3()
		{
			Security.allowDomain( '*' );
			Security.allowDomain( 'www.youtube.com' );  
			Security.allowDomain( 'youtube.com' );  
			Security.allowDomain( 's.ytimg.com' );  
			Security.allowDomain( 'i.ytimg.com' );
		}
		
		private function play(videoId:String):void
		{
			this.videoId = videoId;
			
			if ( !player )
			{
				loadPlayer();
			}
			else
			{
				playVideo();
			}	
		}
		
		private function loadPlayer():void
		{
			var request:URLRequest = new URLRequest( requestURL );
			var loader:Loader = new Loader();
			
			loader.contentLoaderInfo.addEventListener( Event.INIT, handleLoaderInit );
			
			loader.load( request );	
		}
		
		private function handleLoaderInit(e:Event):void
		{
			var player:Object = e.target.content;
			
			player.addEventListener( 'onReady', handlePlayerReady );
			
			addChild( player as DisplayObject );
		}
		
		private function handlePlayerReady(e:Event):void
		{
			player:Object = e.target;
			
			player.loadVideoById( videoId );
			
			player.setSize( playerWidth, playerHeight );
		}
		
		override public function set height(value:Number):void
		{
			playerHeight = value;
			
			player.setSize( playerWidth, playerHeight );
		}
		
		override public function set width(value:Number):void
		{
			playerHeight = value;
			
			player.setSize( playerWidth, playerHeight );
		}
	}
}