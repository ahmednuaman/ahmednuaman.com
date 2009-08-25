package 
{
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer;
	
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import flash.system.Security;
	import flash.text.Font;
	
	import gs.TweenLite;
	import gs.easing.Strong;
	
	import org.papervision3d.cameras.CameraType;
	import org.papervision3d.materials.MovieMaterial;
	import org.papervision3d.objects.primitives.Plane;
	import org.papervision3d.view.BasicView;
	
	[SWF( width='580', height='400', frameRate='30', backgroundColor='#000000' )]
	
	public class App extends BasicView
	{
		[Embed( systemFont='Arial', fontName='Arial', unicodeRange='U+0020-U+002F,U+0030-U+0039,U+003A-U+0040,U+0041-U+005A,U+005B-U+0060,U+0061-U+007A,U+007B-U+007E', mimeType='application/x-font' )] 
		private var _Arial:Class;
		
		private var plane:Plane;
		private var player:YouTubePlayer;
		
		public function App()
		{
			super( 580, 400, true, true, CameraType.TARGET );
			
			Security.allowDomain( '*' );
			Security.allowDomain( 'www.youtube.com' );  
			Security.allowDomain( 'youtube.com' );  
			Security.allowDomain( 's.ytimg.com' );  
			Security.allowDomain( 'i.ytimg.com' );
			
			Font.registerFont( _Arial );
			
			init();
		}
		
		private function init():void
		{
			var mat:MovieMaterial;
			var test:Sprite = new Sprite();
			/* var button:ButtonSimple = new ButtonSimple();
			
			button.addEventListener( MouseEvent.CLICK, handleClick );
			
			button.buttonText	= 'asddaskadskadskasdkasdkasdkasdkaskaskadskasd';
			button.x			= 100;
			button.y			= 100;
			
			button.draw();
			
			test.addChild( button ); */
			
			player = new YouTubePlayer();
			
			player.autoPlay			= true;
			//player.chromeless		= true;
			player.playerHeight		= 300;
			player.playerWidth		= 400; 
			player.wrapperURL		= ( LoaderInfo( root.loaderInfo ).parameters.wrapper ||= 'assets/swf/YouTubePlayerWrapper.swf' );
			
			player.play( 'Sqz5dbs5zmo' ); 
			
			test.addChild( player );
			
			//mat = new MovieMaterial( player, false, true, true, new Rectangle( 0, 0, 400, 300 ) );
			mat = new MovieMaterial( test, true, true, true, new Rectangle( 0, 0, 400, 300 ) );
			
			mat.interactive		= true;
			mat.smooth 			= true;
			
			plane = new Plane( mat, 400, 300, 3, 3 );
			
			plane.x		= 0;
			plane.y		= 0;
			plane.z 	= -700;
			
			scene.addChild( plane );
			
			startRendering();
			
			//addEventListener( Event.ENTER_FRAME, handleEnterFrame );
		}
		
		private function handleClick(e:MouseEvent):void
		{
			trace('clicked');
		}
		
		private function handleEnterFrame(e:Event):void
		{	
			TweenLite.killTweensOf( plane );
			
			TweenLite.to( plane, 1, { rotationX: stage.mouseX * .01, rotationY: stage.mouseY * .01, ease: Strong.easeOut } );
		}
	}
}