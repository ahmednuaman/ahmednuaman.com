title: 3D Actionscript And Me
link: http://www.ahmednuaman.com/blog/3d-actionscript-and-me/
creator: ahmed
description: 
post_id: 397
post_date: 2009-09-12 11:50:20
post_date_gmt: 2009-09-12 11:50:20
comment_status: open
post_name: 3d-actionscript-and-me
status: publish
post_type: post

# 3D Actionscript And Me

Some of you may know that I've been trying to crack the maths of 3D in native Actionscript 3 (through Flash Player 10). It's been hard. You've really got to hand it to the people behind 3D engines such as [Papervision3D](http://papervision3d.org) and [Away3D](http://away3d.com), that took some serious time to sort all the stuff out. But, I'm not saying I've failed because I haven't. Just need to do a bit more maths. 

So, I've had a few problems so far and managed to fix them. The biggest one was calculating the depth of a 3D object and I got through it! Good old [trig](http://en.wikipedia.org/wiki/Trigonometry) eh? The biggest thing now is just sorting out the rotation. You see, an object's "x, y and z" are positioned on its top left front corner. Now in 3D engines, they centre this, which is nice. That's what I'm trying to do. It's a bit hard. Here's an example: 

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
	
	[SWF( width='580', height='500', frameRate='30', backgroundColor='#FFFFFF' )] 
	
	public class App3D1 extends Sprite 
	{ 
		[Embed( systemFont='Arial Black', fontName='ArialBlack', mimeType='application/x-font', unicodeRange='U+0041-U+005A' )] 
		private var arialBlack:Class; 
		private var cube:Rectangle3D; 
		
		public function App3D1() 
		{ 
			stage.align = StageAlign.TOP_LEFT; 
			stage.scaleMode = StageScaleMode.NO_SCALE; 
			
			Font.registerFont( arialBlack ); init(); 
		} 
		
		private function init():void { 
			transform.perspectiveProjection.projectionCenter = new Point( stage.stageWidth / 2, stage.stageHeight / 2 ); 
			transform.perspectiveProjection.fieldOfView = 45; 
			
			cube = new Rectangle3D(); 
			cube.faceFront = createFace( 0x333333, 'front' ); 
			cube.faceBack = createFace( 0x333333, 'back' ); 
			cube.faceLeft = createFace( 0x3333FF, 'left', 500 ); 
			cube.faceRight = createFace( 0x333333, 'right', 500 ); 
			cube.faceTop = createFace( 0x333333, 'top', 300, 500 ); 
			cube.faceBottom = createFace( 0x333333, 'bottom', 300, 500 ); 
			
			cube.build(); 
			
			addChild( cube ); 
			
			cube.x = ( stage.stageWidth / 2 ); 
			cube.y = ( stage.stageHeight / 2 ); 
			cube.z = 1000; 
			cube.rotationX = 89; 
			
			addEventListener( Event.ENTER_FRAME, handleEnterFrame ); 
		} 
		
		private function createFace(colour:uint, name:String, width:Number=300, height:Number=300):Sprite 
		{ 
			var face:Sprite = new Sprite(); 
			var text:TextField = new TextField(); 
			
			face.graphics.beginFill( colour, .3 ); 
			face.graphics.lineStyle( 1, colour ); 
			face.graphics.drawRect( 0, 0, width, height ); 
			face.graphics.endFill(); 
			face.name = name; 
			
			text.autoSize = TextFieldAutoSize.LEFT; 
			text.defaultTextFormat = new TextFormat( 'ArialBlack', 40, 0xFFFFFF ); 
			text.embedFonts = true; 
			text.text = name.toUpperCase(); 
			
			face.addChild( text ); 
			
			return face; 
		} 
		
		private function handleEnterFrame(e:Event):void 
		{ 
			cube.rotationX += 1; // up 
			//cube.rotationY += 1; // across 
			//cube.rotationZ += 1; // pitch 
		} 
	} 
}

And here's what we get: 

[kml_flashembed publishmethod="static" fversion="10.0.0" movie="http://dev.ahmednuaman.com/native3dtests/App3D2.swf" width="580" height="500" targetclass="flashmovie"/]

You see where it pivots, and all I've done is just incremented the "rotationX" of the object by 1 on every frame. Tell me what you think I'm doing wrong, all the classes are up on [Github](http://github.com/ahmednuaman/as3) and feel free to fork me! I'll hopefully sort this out ASAP!