package {
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.geom.Point;
	import flash.system.Security;
	
	[SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )]

	public class App3D1 extends Sprite
	{
		private var cube:Sprite;
		
		public function App3D1()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			init();
		}
		
		private function init():void
		{
			transform.perspectiveProjection.fieldOfView	= 45;
			
			cube = new Sprite();
			
			addChild( cube );
			
			var front:Sprite 	= createFace( 0x333333, 'front' );
			var back:Sprite 	= createFace( 0x333333, 'back' );
			var right:Sprite 	= createFace( 0x333333, 'right' );
			var left:Sprite 	= createFace( 0x333333, 'left' );
			var top:Sprite 		= createFace( 0x333333, 'top' );
			var bottom:Sprite 	= createFace( 0x333333, 'bottom' );
			
			cube.addChild( back );
			cube.addChild( right );
			cube.addChild( left );
			cube.addChild( top );
			cube.addChild( bottom );
			cube.addChild( front );
			
			back.rotationY 		= 180;
			back.x				= 300;
			back.z				= 300;
			
			right.rotationY 	= 90;
			right.x				= 300;
			right.z				= 300;
			
			left.rotationY 		= 270;
			left.x				= 0;
			
			top.rotationX 		= 270;
			top.y				= 300;
			top.z				= 300;
			
			bottom.rotationX 	= 90;
			
			addEventListener( Event.ENTER_FRAME, handleEnterFrame );
		}
		
		private function createFace(colour:uint, name:String=null):Sprite
		{
			var face:Sprite = new Sprite();
			
			face.graphics.beginFill( colour, .3 );
			face.graphics.lineStyle( 1, colour );
			face.graphics.drawRect( 0, 0, 300, 300 );
			face.graphics.endFill();
			
			face.name = name;
			
			return face;
		}
		
		private function handleEnterFrame(e:Event):void
		{
			cube.x 		= ( stage.stageWidth / 2 ) - ( cube.width / 2 );
			cube.y 		= ( stage.stageHeight / 2 ) - ( cube.height / 2 );
			
			cube.rotationX 	+= 1;
			cube.rotationY 	+= 1;
			cube.rotationZ 	+= 1;
			
			cube.x			+= 1;
			cube.y			+= 1;
			cube.z			+= 1;
			
			transform.perspectiveProjection.projectionCenter = new Point( stage.stageWidth / 2, stage.stageHeight / 2 );
		}
	}
}