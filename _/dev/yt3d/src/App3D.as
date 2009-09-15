package
{
	import com.firestartermedia.lib.as3.display.component.video.YouTubePlayer;
	
	import flash.events.Event;
	import flash.geom.Rectangle;
	import flash.system.Security;
	
	import org.papervision3d.cameras.CameraType;
	import org.papervision3d.materials.MovieMaterial;
	import org.papervision3d.materials.utils.MaterialsList;
	import org.papervision3d.objects.primitives.Cube;
	import org.papervision3d.view.BasicView;
	
	[SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )]
	
	public class App3D extends BasicView
	{
		public static const MAX_VELOCITY:Number 				= 4;
		public static const CUBE_SIZE:Number 					= 600;
		public static const SOFT_ZONE:Number 					= 150;
		
		private var velV:Number 								= 0;
		private var velH:Number 								= 0;
		
		private var cube:Cube;
		private var materials:MaterialsList;
		private var players:Array;
		
		public function App3D()
		{
			super( 640, 480, true, true, CameraType.TARGET );
			
			Security.allowDomain( '*' );
			Security.allowDomain( 'www.youtube.com' );  
			Security.allowDomain( 'youtube.com' );  
			Security.allowDomain( 's.ytimg.com' );  
			Security.allowDomain( 'i.ytimg.com' );
			
			init();
		}
		
		private function init():void
		{
			var rect:Rectangle = new Rectangle( 0, 0, CUBE_SIZE, CUBE_SIZE );
			var player:YouTubePlayer;
			
			players = [ ];
			
			for ( var i:Number = 0; i < 2; i++ )
			{
				players.push( new YouTubePlayer() );
				
				player = players[ i ];
				
				player.bridgeName		= 'playerBridge' + i;
				player.playerHeight		= CUBE_SIZE;
				player.playerWidth		= CUBE_SIZE;
				player.wrapperURL		= 'assets/swf/YouTubePlayerWrapper.swf';
				
				player.play( '8e-SUFpKBVA' );
			}
			
			materials = new MaterialsList({
				front: 		new MovieMaterial( players[ 0 ], false, true, false, rect ),
				back: 		new MovieMaterial( players[ 1 ], false, true, false, rect ),
				right: 		new MovieMaterial( players[ 1 ], false, true, false, rect ),
				left: 		new MovieMaterial( players[ 1 ], false, true, false, rect ),
				top: 		new MovieMaterial( players[ 1 ], false, true, false, rect ),
				bottom: 	new MovieMaterial( players[ 1 ], false, true, false, rect )
			});
			
			cube = new Cube( materials, CUBE_SIZE, CUBE_SIZE, CUBE_SIZE );
			
			scene.addChild( cube );
			
			startRendering();
			
			stage.addEventListener( Event.ENTER_FRAME, handleEnterFrame );
		}
		
		private function handleEnterFrame( event :Event ):void
		{
			if ( stage.mouseX > SOFT_ZONE && stage.mouseX < stage.stageWidth - SOFT_ZONE ) 
			{
				velH += stage.mouseX / 1600;
			} 
			else 
			{
				velH -= velH / 30;
			}
			
			velH = Math.min( Math.max( -MAX_VELOCITY, velH ), MAX_VELOCITY );
			
			if ( stage.mouseY > SOFT_ZONE && stage.mouseY < stage.stageHeight - SOFT_ZONE ) 
			{
				velV += stage.mouseY / 1600;
			} 
			else 
			{
				velV -= velV / 30;
			}
			
			velV = Math.min( Math.max( -MAX_VELOCITY, velV ), MAX_VELOCITY );
			
			cube.rotationX 	-= velH + velV;
			cube.rotationY 	-= velH;
			cube.rotationZ 	-= velV;
		}
	}
}