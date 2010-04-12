package
{
	import com.firestartermedia.lib.as3.display.shape.Hexagon;
	
	import flash.display.Sprite;
	
	[SWF( backgroundColor='#FFFFFF', frameRate='30', width='580', height='450' )]
	
	public class Polygon1 extends Sprite
	{
		public function Polygon1()
		{
			var hex:Hexagon	= new Hexagon();
			
			hex.x			= stage.stageWidth / 2;
			hex.y			= stage.stageHeight / 2;
			
			addChild( hex );
		}
	}
}