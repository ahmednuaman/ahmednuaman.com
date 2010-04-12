package
{
	import com.firestartermedia.lib.as3.display.shape.Hexagon;
	import com.firestartermedia.lib.as3.display.shape.Polygon;
	
	import flash.display.Sprite;
	
	[SWF( backgroundColor='#FFFFFF', frameRate='30', width='580', height='450' )]
	
	public class Polygon2 extends Sprite
	{
		public function Polygon2()
		{
			var hex:Hexagon	= new Hexagon();
			
			hex.x			= stage.stageWidth / 2 - hex.width;
			hex.y			= stage.stageHeight / 2;
			
			addChild( hex );
			
			var oct:Polygon	= new Polygon( 100, 8 );
			
			oct.x			= stage.stageWidth / 2;
			oct.y			= stage.stageHeight / 2;
			
			addChild( oct );
			
			var pen:Polygon	= new Polygon();
			
			pen.x			= stage.stageWidth / 2 + pen.width;
			pen.y			= stage.stageHeight / 2;
			
			addChild( pen );
		}
	}
}