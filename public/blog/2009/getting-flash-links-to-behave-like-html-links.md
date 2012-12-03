title: Getting Flash Links To Behave Like HTML Links
link: http://www.ahmednuaman.com/blog/getting-flash-links-to-behave-like-html-links/
creator: ahmed
description: 
post_id: 289
post_date: 2009-07-23 16:16:43
post_date_gmt: 2009-07-23 16:16:43
comment_status: open
post_name: getting-flash-links-to-behave-like-html-links
status: publish
post_type: post

# Getting Flash Links To Behave Like HTML Links

I recently had a question forwarded to me by [@gerhardlazu](http://twitter.com/gerhardlazu/) from [@rbates](http://twitter.com/rbates/) asking how Flash links could behave like HTML links. What he meant was that when you're on a HTML page and you hold down CTRL/CMD and click that link, it normally opens in a new tab. Obviously, this is different in Flash as we have to tell flash to listen to that keyboard event and then set a variable that notifies the link to open it in a new window/tab. I've come up with the solution, but it's not the best, because, for example: you can't _force_ a browser to open a link in a new tab, the closet you can get to that is to get the link to open in "_blank" and hope the browser is clever enough. So here's the code, it uses my "ButtonSimple()" and "URLUtil()" classes that are both available on [Github](http://github.com/ahmednuaman/AS3): ` package { import com.firestartermedia.lib.as3.display.component.ButtonSimple; import com.firestartermedia.lib.as3.utils.URLUtil; import flash.display.Sprite; import flash.display.StageAlign; import flash.display.StageScaleMode; import flash.events.KeyboardEvent; import flash.events.MouseEvent; import flash.text.Font; import flash.text.TextFormat; import flash.ui.Keyboard; public class App extends Sprite { [Embed( systemFont='Arial', fontName='Arial', mimeType='application/x-font' )] private var arialFont:Class; private var isOver:Boolean = false; private var button:ButtonSimple; public function App() { stage.align = StageAlign.TOP_LEFT; stage.scaleMode = StageScaleMode.NO_SCALE; stage.addEventListener( KeyboardEvent.KEY_DOWN, handleKeyboardDown ); Font.registerFont( arialFont ); init(); } private function handleKeyboardDown(e:KeyboardEvent):void { isOver = ( e.keyCode === Keyboard.CONTROL ); } private function init():void { button = new ButtonSimple(); button.addEventListener( MouseEvent.CLICK, handleClick ); button.textFormat = new TextFormat( 'Arial', 24 ); button.draw(); addChild( button ); button.x = ( stage.stageWidth / 2 ) - ( button.width / 2 ); button.y = ( stage.stageHeight / 2 ) - ( button.height / 2 ); } private function handleClick(e:MouseEvent):void { URLUtil.goToURL( 'http://www.ahmednuaman.com', ( isOver ? '_blank' : '_top' ) ); } } } ` And this is what we get: 

[kml_flashembed publishmethod="static" fversion="9.0.0" movie="/_/dev/keyboardtest/App.swf" width="580" height="400" targetclass="flashmovie"]

Cool eh? Tell me what you think!

## Comments

**[Ryan Bates](#129 "2009-07-23 16:27:42"):** Very useful, thank you for doing this!

**[Ahmed](#130 "2009-07-24 09:43:26"):** Not a problem, I hope it helped. I have found an issue with AdBlock Plus though...

