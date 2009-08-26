package 
{
	import com.firestartermedia.lib.as3.display.component.interaction.ButtonSimple;
	
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import flash.text.Font;
	
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
		
		public function App()
		{
			super( 580, 400, true, true, CameraType.TARGET );
			
			Font.registerFont( _Arial );
			
			init();
		}
		
		private function init():void
		{
			var mat:MovieMaterial;
			var test:Sprite = new Sprite();
			var button:ButtonSimple = new ButtonSimple();
			
			button.addEventListener( MouseEvent.CLICK, handleClick );
			
			button.buttonText	= 'asddaskadskadskasdkasdkasdkasdkaskaskadskasd';
			button.x			= 100;
			button.y			= 100;
			
			button.draw();
			
			test.addChild( button ); 
			
			mat = new MovieMaterial( test, true, true, true, new Rectangle( 0, 0, 400, 300 ) );
			
			mat.interactive		= true;
			mat.smooth 			= true;
			
			plane = new Plane( mat, 400, 300, 3, 3 );
			
			plane.x		= 0;
			plane.y		= 0;
			plane.z 	= -700;
			
			scene.addChild( plane );
			
			startRendering();
		}
		
		private function handleClick(e:MouseEvent):void
		{
			var button:ButtonSimple = e.target as ButtonSimple;
			
			button.buttonText = 'You clicked on me';
			
			button.draw();						
		}
	}
}