package
{
	import com.firestartermedia.lib.as3.display.tools.ScaleObject;
	
	import flash.display.Bitmap;
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;

	[SWF( width='580', height='400', frameRate='30', backgroundColor='#FFFFFF' )]

	public class App extends Sprite
	{
		[Embed( source='assets/image/bitmap.png' )]
		private var ImageAsset:Class;
		
		private var scaled:Sprite;
		
		public function App()
		{
			var bitmap:Bitmap = new ImageAsset();
			
			scaled = new ScaleObject( bitmap, new Rectangle( 10, 9, 80, 2 ) );
			
			addChild( bitmap );
			
			scaled.y = 30;
			
			addChild( scaled );
			
			stage.addEventListener( MouseEvent.MOUSE_MOVE, handleMouseMove );
		}
		
		private function handleMouseMove(e:MouseEvent):void
		{
			scaled.width = ( e.stageX > 100 ? e.stageX : 100 );
			scaled.height = ( e.stageY > scaled.y + 20 ? e.stageY - scaled.y : 20 );
		}
	}
}