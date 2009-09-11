package {
	import com.firestartermedia.lib.as3.display.threedee.shape.Rectangle3D;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.geom.Point;
	import flash.text.Font;
	import flash.text.TextField;
	import flash.text.TextFieldAutoSize;
	import flash.text.TextFormat;
	
	[SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )]

	public class App3D1 extends Sprite
	{
		[Embed( systemFont='Arial Black', fontName='ArialBlack', mimeType='application/x-font', unicodeRange='U+0041-U+005A' )] 
		private var arialBlack:Class;
		
		private var cube:Rectangle3D;
		
		public function App3D1()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			Font.registerFont( arialBlack );
			
			init();
		}
		
		private function init():void
		{
			transform.perspectiveProjection.projectionCenter = new Point( stage.stageWidth / 2, stage.stageHeight / 2 );
			transform.perspectiveProjection.fieldOfView	= 45;
			
			cube = new Rectangle3D();
			
			cube.faceFront 		= createFace( 0x333333, 'front' );
			cube.faceBack 		= createFace( 0x333333, 'back' );
			cube.faceLeft 		= createFace( 0x3333FF, 'left', 	500 );
			cube.faceRight 		= createFace( 0x333333, 'right', 	500 );
			cube.faceTop 		= createFace( 0x333333, 'top', 		300, 500 );
			cube.faceBottom 	= createFace( 0x333333, 'bottom', 	300, 500 );
			
			cube.build();
			
			addChild( cube );
			
			cube.x 		= ( stage.stageWidth / 2 );
			cube.y 		= ( stage.stageHeight / 2 );
			cube.z		= 1000;
			
			cube.rotationX = 89
			
			addEventListener( Event.ENTER_FRAME, handleEnterFrame );
		}
		
		private function createFace(colour:uint, name:String, width:Number=300, height:Number=300):Sprite
		{
			var face:Sprite 		= new Sprite();
			var text:TextField 		= new TextField();
			
			face.graphics.beginFill( colour, .3 );
			face.graphics.lineStyle( 1, colour );
			face.graphics.drawRect( 0, 0, width, height );
			face.graphics.endFill();
			
			face.name = name;
			
			text.autoSize			= TextFieldAutoSize.LEFT;
			text.defaultTextFormat	= new TextFormat( 'ArialBlack', 40, 0xFFFFFF );
			text.embedFonts			= true;
			text.text				= name.toUpperCase();
			
			face.addChild( text );
			
			return face;
		}
		
		private function handleEnterFrame(e:Event):void
		{			
			cube.rotationX 	+= 1; // up
			//cube.rotationY 	+= 1; // across
			//cube.rotationZ 	+= 1; // pitch
		}
	}
}