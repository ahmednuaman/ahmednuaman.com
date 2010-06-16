package 
{
	import com.firestartermedia.lib.as3.display.component.interaction.ButtonSimple;
	import com.firestartermedia.lib.as3.display.component.video.VideoPlayerChromless;
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
		public static const URL:String						  	= 'rtmp://localhost/';
		public static const URL_RECORD:String					= URL + 'record/test1/';
		public static const URL_PLAY:String						= URL + 'play/test1/';
		
		[Embed( systemFont='Arial', fontName='Arial', mimeType='application/x-font', unicodeRange='U+0020,U+0041-U+005A,U+0020,U+0061-U+007A,U+0020-U+002F,U+003A-U+0040,U+005B-U+0060,U+007B-U+007E' )] 
		private var arial:Class;
		
		private var videoPlayer:VideoPlayerChromless;
		private var webCam:WebCam;
		
		public function App()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			Font.registerFont( arial );
			
			init();
		}
		
		private function init():void
		{
			var buttonImage:ButtonSimple	= new ButtonSimple();
			var buttonVideo:ButtonSimple	= new ButtonSimple();
			
			buttonImage.addEventListener( MouseEvent.CLICK, handleButtonImageClick );
			
			buttonImage.border				= false;
			buttonImage.buttonText 			= 'Capture an image!';
			buttonImage.textFormat.size		= 14;
			
			buttonImage.draw();
			
			addChild( buttonImage );
			
			buttonVideo.addEventListener( MouseEvent.CLICK, handleButtonVideoClick );
			
			buttonVideo.border				= false;
			buttonVideo.buttonText 			= 'Toggle capture a video!';
			buttonVideo.textFormat.size		= 14;
			
			buttonVideo.draw();
			
			addChild( buttonVideo );
			
			videoPlayer						= new VideoPlayerChromless();
			
			addChild( videoPlayer );
			
			webCam 							= new WebCam();
			
			webCam.captureURL 				= URL_RECORD;
			
			addChild( webCam );
			
			buttonImage.x					= ( webCam.width / 2 ) - ( buttonImage.width / 2 );
			buttonImage.y					= webCam.height + 20;
			
			buttonVideo.x					= ( webCam.width / 2 ) - ( buttonVideo.width / 2 );
			buttonVideo.y					= buttonImage.y + buttonImage.height + 20;
		}
		
		private function handleButtonImageClick(e:MouseEvent):void
		{
			var capture:Bitmap = webCam.captureImage();
			
			DisplayObjectUtil.scale( capture, 150, 150 );
			
			capture.x = webCam.width + 20;
			
			addChild( capture );
		}
		
		private function handleButtonVideoClick(e:MouseEvent):void
		{
			if ( webCam.recording )
			{
				webCam.captureVideoStop();
				
				playRecordedVideo( URL_PLAY + webCam.filename );
			}
			else
			{
				webCam.captureVideo();
			}
		}
		
		private function playRecordedVideo(videoURL:String):void
		{
			videoPlayer.x = webCam.width + 20;
			
			videoPlayer.play( videoURL ); trace(videoURL);
		}
	}
}
