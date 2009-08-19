package 
{
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer;
	
	import flash.events.Event;
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
		private var plane:Plane;
		private var player:YouTubePlayer;
		
		public function App()
		{
			super( 580, 400, true, true, CameraType.TARGET );
			
			Security.allowDomain( '*' );
			
			init();
		}
		
		private function init():void
		{
			var mat:MovieMaterial;
			
			player = new YouTubePlayer();
			
			player.autoPlay			= true;
			player.mouseChildren	= true;
			player.mouseEnabled		= true;
			player.playerHeight		= 300;
			player.playerWidth		= 400;
			player.wrapperURL		= 'assets/swf/PlayerWrapper.swf';
			
			player.play( 'Sqz5dbs5zmo' );
			
			mat = new MovieMaterial( player, false, true, true, new Rectangle( 0, 0, 400, 300 ) );
			
			mat.interactive		= true;
			mat.smooth 			= true;
			
			plane = new Plane( mat, 400, 300, 3, 3 );
			
			plane.x		= 0;
			plane.y		= 0;
			plane.z 	= -700;
			
			scene.addChild( plane );
			
			startRendering();
			
			addEventListener( Event.ENTER_FRAME, handleEnterFrame );
		}
		
		private function handleEnterFrame(e:Event):void
		{	
			TweenLite.killTweensOf( plane );
			
			TweenLite.to( plane, 1, { rotationX: stage.mouseX * .01, rotationY: stage.mouseY * .01, ease: Strong.easeOut } );
		}
	}
}