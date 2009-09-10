package {
	import com.firestartermedia.lib.as3.display.threedee.shape.Rectangle3D;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.geom.Point;
	
	[SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )]

	public class App3D1 extends Sprite
	{
		private var cube:Rectangle3D;
		
		public function App3D1()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			init();
		}
		
		private function init():void
		{
			transform.perspectiveProjection.fieldOfView	= 45;
			
			cube = new Rectangle3D();
			
			cube.faceFront 		= createFace( 0x333333, 'front' );
			cube.faceBack 		= createFace( 0x333333, 'front' );
			cube.faceLeft 		= createFace( 0x3333FF, 'front' );
			cube.faceRight 		= createFace( 0x333333, 'front' );
			cube.faceTop 		= createFace( 0x333333, 'front' );
			cube.faceBottom 	= createFace( 0x333333, 'front' );
			
			cube.build();
			
			addChild( cube );
			
			addEventListener( Event.ENTER_FRAME, handleEnterFrame );
		}
		
		private function createFace(colour:uint, name:String=null):Sprite
		{
			var face:Sprite = new Sprite();
			
			face.graphics.beginFill( colour );
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