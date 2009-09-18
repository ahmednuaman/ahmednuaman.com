package 
{
	import com.firestartermedia.lib.as3.display.component.interaction.ButtonSimple;
	import com.firestartermedia.lib.as3.display.component.video.WebCam;
	import com.firestartermedia.lib.as3.utils.DisplayObjectUtil;
	
	import flash.display.Bitmap;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.MouseEvent;
	import flash.text.Font;
	
	[SWF( width="580", height="500", frameRate="30", backgroundColor="#FFFFFF" )]
	
	public class App extends Sprite
	{
		[Embed( systemFont='Arial', fontName='Arial', mimeType='application/x-font', unicodeRange='U+0020,U+0041-U+005A,U+0020,U+0061-U+007A,U+0020-U+002F,U+003A-U+0040,U+005B-U+0060,U+007B-U+007E' )] 
		private var arial:Class;
		
		private var webcam:WebCam;
		
		public function App()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			Font.registerFont( arial );
			
			init();
		}
		
		private function init():void
		{
			var button:ButtonSimple		= new ButtonSimple();
			
			button.addEventListener( MouseEvent.CLICK, handleButtonClick );
			
			button.border				= false;
			button.buttonText 			= 'Capture an image!';
			button.textFormat.size		= 14;
			
			button.draw();
			
			addChild( button );
			
			webcam = new WebCam();
			
			addChild( webcam );
			
			button.x	= ( webcam.width / 2 ) - ( button.width / 2 );
			button.y	= webcam.height + 20;
		}
		
		private function handleButtonClick(e:MouseEvent):void
		{
			var capture:Bitmap = webcam.captureImage();
			
			DisplayObjectUtil.scale( capture, 150, 150 );
			
			capture.x = webcam.width + 20;
			
			addChild( capture );
		}
	}
}
