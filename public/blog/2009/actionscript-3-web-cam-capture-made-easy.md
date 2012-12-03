title: Actionscript 3 Web Cam Capture Made Easy
link: http://www.ahmednuaman.com/blog/actionscript-3-web-cam-capture-made-easy/
creator: ahmed
description: 
post_id: 417
post_date: 2009-09-18 08:59:34
post_date_gmt: 2009-09-18 08:59:34
comment_status: open
post_name: actionscript-3-web-cam-capture-made-easy
status: publish
post_type: post

# Actionscript 3 Web Cam Capture Made Easy

I've got a new pitch in the pipe work and for it I need to be able to capture the web cam. It'll have to be video, but I've started writing a class that simplifies it for you. Displaying and capturing the web cam in Actionscript 3 isn't hard, here's a nice tutorial from Riacodes.com: [Capture images from the webcam](http://www.riacodes.com/flash/capture-images-from-the-webcam/). But I thought I'd make it into a class so it would be reusable for your everyday applications. Interested? Cool, well get the latest code from my Github and use this as your default application's code: ` package { import com.firestartermedia.lib.as3.display.component.interaction.ButtonSimple; import com.firestartermedia.lib.as3.display.component.video.WebCam; import com.firestartermedia.lib.as3.utils.DisplayObjectUtil; import flash.display.Bitmap; import flash.display.Sprite; import flash.display.StageAlign; import flash.display.StageScaleMode; import flash.events.MouseEvent; import flash.text.Font; [SWF( width="580", height="500", frameRate="30", backgroundColor="#FFFFFF" )] public class App extends Sprite { [Embed( systemFont='Arial', fontName='Arial', mimeType='application/x-font', unicodeRange='U+0020,U+0041-U+005A,U+0020,U+0061-U+007A,U+0020-U+002F,U+003A-U+0040,U+005B-U+0060,U+007B-U+007E' )] private var arial:Class; private var webcam:WebCam; public function App() { stage.align = StageAlign.TOP_LEFT; stage.scaleMode = StageScaleMode.NO_SCALE; Font.registerFont( arial ); init(); } private function init():void { var button:ButtonSimple = new ButtonSimple(); button.addEventListener( MouseEvent.CLICK, handleButtonClick ); button.border = false; button.buttonText = 'Capture an image!'; button.textFormat.size = 14; button.draw(); addChild( button ); webcam = new WebCam(); addChild( webcam ); button.x = ( webcam.width / 2 ) - ( button.width / 2 ); button.y = webcam.height + 20; } private function handleButtonClick(e:MouseEvent):void { var capture:Bitmap = webcam.captureImage(); DisplayObjectUtil.scale( capture, 150, 150 ); capture.x = webcam.width + 20; addChild( capture ); } } } ` And you'll get this, don't you look pretty: 

[kml_flashembed publishmethod="static" fversion="10.0.0" movie="http://dev.ahmednuaman.com/capturewebcam/App.swf" width="580" height="350" targetclass="flashmovie"/]

So the next thing I'm going to do is capture video, that shouldn't be too hard!