package 
{
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer;
	
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.geom.Rectangle;
	
	import org.papervision3d.cameras.CameraType;
	import org.papervision3d.materials.MovieMaterial;
	import org.papervision3d.objects.primitives.Plane;
	import org.papervision3d.view.BasicView;
	
	[SWF( width='580', height='400', frameRate='30', backgroundColor='#000000' )]
	
	public class App extends BasicView
	{
		private var player:YouTubePlayer;
		private var plane:Plane;
		
		public function App()
		{
			super( 580, 400, true, true, CameraType.TARGET );
			
			init();
		}
		
		private function init():void
		{
			var mat:MovieMaterial;
			var fakePlayer:Sprite;
			
			player = new YouTubePlayer();
			
			player.autoPlay			= false;
			player.playerHeight		= 240;
			player.playerWidth		= 320;
			player.wrapperURL		= ( LoaderInfo( root ).parameters.url ||= 'asset/swf/YouTubePlayerWrapper.swf' );

			player.play( 'i1Crvwldkcs' );
			
			mat = new MovieMaterial( fakePlayer, true, true, true, new Rectangle( 0, 0, 400, 300 ) );
			
			mat.interactive		= true;
			mat.smooth 			= true;
			
			plane = new Plane( mat, 400, 300, 3, 3 );
			
			plane.x		= 0;
			plane.y		= 0;
			plane.z 	= -700;
			
			scene.addChild( plane );
			
			startRendering();
		}
	}
}