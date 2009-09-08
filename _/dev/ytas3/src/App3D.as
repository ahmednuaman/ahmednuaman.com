package
{
	import flash.events.Event;
	import flash.geom.Rectangle;
	
	import org.papervision3d.cameras.CameraType;
	import org.papervision3d.materials.MovieMaterial;
	import org.papervision3d.materials.utils.MaterialsList;
	import org.papervision3d.objects.primitives.Cube;
	import org.papervision3d.view.BasicView;

	public class App3D extends BasicView
	{
		private var cube:Cube;
		private var materials:MaterialsList;
		private var players:Array;
		
		public function App3D()
		{
			super( 640, 480, true, true, CameraType.TARGET );
			
			init();
		}
		
		private function init():void
		{
			var rect:Rectangle = new Rectangle( 0, 0, 400, 400 );
			var player:YouTubePlayerAS3;
			
			players = [ ];
			
			for ( var i:Number = 0; i < 6; i++ )
			{
				players.push( new YouTubePlayerAS3() );
				
				player = players[ i ];
				
				player.playerHeight		= rect.height;
				player.playerWidth		= rect.width;
				
				player.play( '8e-SUFpKBVA' );
			}
			
			materials = new MaterialsList({
				front: 		new MovieMaterial( players[ i ], false, true, false, rect ),
				back: 		new MovieMaterial( players[ i ], false, true, false, rect ),
				right: 		new MovieMaterial( players[ i ], false, true, false, rect ),
				left: 		new MovieMaterial( players[ i ], false, true, false, rect ),
				top: 		new MovieMaterial( players[ i ], false, true, false, rect ),
				bottom: 	new MovieMaterial( players[ i ], false, true, false, rect )
			});
			
			cube = new Cube( materials, rect.width, rect.width, rect.height );
			
			scene.addChild( cube );
			
			startRendering();
		}
	}
}