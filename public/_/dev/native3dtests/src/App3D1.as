package 
{
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
	import flash.utils.setInterval;
	
	[SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )]

	public class App3D1 extends Sprite
	{
		[Embed( systemFont='Arial Black', fontName='ArialBlack', mimeType='application/x-font', unicodeRange='U+0041-U+005A' )] 
		private var arialBlack:Class;
		
		private var cube1:Rectangle3D;
		private var cube2:Rectangle3D;
		private var cube3:Rectangle3D;
		
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
			
			/* cube1 = new Rectangle3D();
			
			cube1.faceFront 	= createFace( 0x333333, 'front' );
			cube1.faceBack 		= createFace( 0x333333, 'back' );
			cube1.faceLeft 		= createFace( 0x3333FF, 'left', 	500 );
			cube1.faceRight 	= createFace( 0x333333, 'right', 	500 );
			cube1.faceTop 		= createFace( 0x333333, 'top', 		300, 500 );
			cube1.faceBottom 	= createFace( 0x333333, 'bottom', 	300, 500 );
			
			cube1.build();
			
			addChild( cube1 );
			
			cube1.x 			= -400;
			cube1.y 			= ( stage.stageHeight / 2 ) - ( cube1.height / 2 );
			cube1.z				= 1000; */
			
			cube2 = new Rectangle3D();
			
			cube2.faceFront 	= createFace( 0x333333, 'front' );
			cube2.faceBack 		= createFace( 0x333333, 'back' );
			cube2.faceLeft 		= createFace( 0x3333FF, 'left', 	500 );
			cube2.faceRight 	= createFace( 0x333333, 'right', 	500 );
			cube2.faceTop 		= createFace( 0x333333, 'top', 		300, 500 );
			cube2.faceBottom 	= createFace( 0x333333, 'bottom', 	300, 500 );
			
			cube2.build();
			
			addChild( cube2 );
			
			cube2.rotationX		= 45;
			cube2.x 			= ( stage.stageWidth / 2 ) - ( cube2.width / 2 );
			cube2.y 			= ( stage.stageHeight / 2 ) - ( cube2.height / 2 );
			cube2.z				= 1000;
			
			/* cube3 = new Rectangle3D();
			
			cube3.faceFront 	= createFace( 0x333333, 'front' );
			cube3.faceBack 		= createFace( 0x333333, 'back' );
			cube3.faceLeft 		= createFace( 0x3333FF, 'left', 	500 );
			cube3.faceRight 	= createFace( 0x333333, 'right', 	500 );
			cube3.faceTop 		= createFace( 0x333333, 'top', 		300, 500 );
			cube3.faceBottom 	= createFace( 0x333333, 'bottom', 	300, 500 );
			
			cube3.build();
			
			addChild( cube3 );
			
			cube3.rotationX		= 90;
			cube3.x 			= 400 + cube3.width;
			cube3.y 			= ( stage.stageHeight / 2 ) - ( cube3.height / 2 );
			cube3.z				= 1000; */
			
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
		
		private function handleEnterFrame(e:Event=null):void
		{			
			//cube1.rotationX 	+= 1; // pitch
			//cube1.rotationY 	+= 1; // scope
			//cube1.rotationZ 	+= 1; // roll
			
			cube2.rotationX 	+= 1; // pitch
			//cube2.rotationY 	+= 1; // scope
			//cube2.rotationZ 	+= 1; // roll
			
			//cube3.rotationX 	+= 1; // pitch
			//cube3.rotationY 	+= 1; // scope
			//cube3.rotationZ 	+= 1; // roll
		}
	}
}