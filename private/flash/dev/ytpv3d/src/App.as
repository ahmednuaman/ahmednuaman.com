package 
{
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer;
	import com.firestartermedia.lib.as3.display.tools.ScaleObject;
	import com.firestartermedia.lib.as3.utils.DisplayObjectUtil;
	
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import flash.system.Security;
	
	import gs.TweenLite;
	import gs.easing.Strong;
	
	import org.papervision3d.cameras.CameraType;
	import org.papervision3d.materials.MovieMaterial;
	import org.papervision3d.objects.primitives.Plane;
	import org.papervision3d.view.BasicView;
	
	[SWF( width='580', height='400', frameRate='30', backgroundColor='#000000' )]
	
	public class App extends BasicView
	{
		[Embed( source='assets/img/yt_controls.jpg' )]
		private var ytControls:Class;
		
		private var videoId:String								= 'i1Crvwldkcs';
		
		private var player:YouTubePlayer;
		private var plane:Plane;
		
		public function App()
		{
			super( 580, 400, true, true, CameraType.TARGET );
			
			Security.allowDomain( '*' );
			Security.allowDomain( 'www.youtube.com' );		
			Security.allowDomain( 'youtube.com' );		
			Security.allowDomain( 's.ytimg.com' );
			Security.allowDomain( 'i.ytimg.com' );
			
			Security.loadPolicyFile( 'http://img.youtube.com/crossdomain.xml' );
			Security.loadPolicyFile( 'http://gdata.youtube.com/crossdomain.xml' );
			
			init();
		}
		
		private function init():void
		{
			var mat:MovieMaterial;
			var controls:Sprite;
			var fakePlayer:Sprite;
			
			controls = new ScaleObject( new ytControls(), new Rectangle( 50, 10, 1, 1 ) );
			
			controls.width		= 400;
			controls.x			= 0;
			controls.y			= 300 - controls.height;
			
			fakePlayer = new Sprite();
			
			fakePlayer.addEventListener( MouseEvent.CLICK, handleFakePlayerClick ); 
			
			DisplayObjectUtil.loadMovie( 'http://i.ytimg.com/vi/' + videoId + '/hqdefault.jpg', fakePlayer, null, null, true );
			
			fakePlayer.addChild( controls );
			
			mat = new MovieMaterial( fakePlayer, true, true, true, new Rectangle( 0, 0, 400, 300 ) );
			
			mat.interactive		= true;
			mat.smooth 			= true;
			
			plane = new Plane( mat, 400, 300, 3, 3 );
			
			plane.x		= 0;
			plane.y		= 0;
			plane.z 	= -700;
			
			scene.addChild( plane );
			
			player = new YouTubePlayer();
			
			player.autoPlay			= true;
			player.playerHeight		= 345;
			player.playerWidth		= 460;
			player.wrapperURL		= ( LoaderInfo( loaderInfo ).parameters.url ||= 'assets/swf/YouTubePlayerWrapper.swf' );
			player.visible			= false;
			player.x				= ( stage.stageWidth / 2 ) - ( player.playerWidth / 2 );
			player.y				= ( stage.stageHeight / 2 ) - ( player.playerHeight / 2 );
			
			addChild( player );
			
			startRendering();
			
			addEventListener( Event.ENTER_FRAME, handleEnterFrame );  
		}
		
		private function handleFakePlayerClick(e:MouseEvent):void
		{
			removeEventListener( Event.ENTER_FRAME, handleEnterFrame );
			
			TweenLite.to( plane, 1, { rotationX: 0, rotationY: 0, ease: Strong.easeOut, onComplete: playVideo } );
		}
				
		private function handleEnterFrame(e:Event):void
		{
			TweenLite.to( plane, 1, { rotationX: stage.mouseX * .1, rotationY: stage.mouseY * .1, ease: Strong.easeOut } );
		}
		
		private function playVideo():void
		{
			stopRendering();
			
			TweenLite.to( player, 1, { autoAlpha: 1, ease: Strong.easeOut, onComplete: startVideo } );
		}
		
		private function startVideo():void
		{
			player.play( videoId );
		}
	}
}