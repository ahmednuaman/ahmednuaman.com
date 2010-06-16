package 
{
	import com.firestartermedia.lib.as3.display.component.ButtonSimple;
	import com.firestartermedia.lib.as3.utils.URLUtil;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.KeyboardEvent;
	import flash.events.MouseEvent;
	import flash.text.Font;
	import flash.text.TextFormat;
	import flash.ui.Keyboard;

	public class App extends Sprite
	{
		[Embed( systemFont='Arial', fontName='Arial', mimeType='application/x-font' )]  
        private var arialFont:Class;
		
		private var isOver:Boolean								= false;
		
		private var button:ButtonSimple;
		
		public function App()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			stage.addEventListener( KeyboardEvent.KEY_DOWN, handleKeyboardDown );
			
			Font.registerFont( arialFont );
			
			init();
		}
		
		private function handleKeyboardDown(e:KeyboardEvent):void
		{
			isOver = ( e.keyCode === Keyboard.CONTROL );
		}
		
		private function init():void
		{
			button = new ButtonSimple();
			
			button.addEventListener( MouseEvent.CLICK, handleClick );
			
			button.textFormat = new TextFormat( 'Arial', 24 );
			
			button.draw();
			
			addChild( button );
			
			button.x		= ( stage.stageWidth / 2 ) - ( button.width / 2 );
			button.y		= ( stage.stageHeight / 2 ) - ( button.height / 2 );
		}
		
		private function handleClick(e:MouseEvent):void
		{
			URLUtil.goToURL( 'http://www.ahmednuaman.com', ( isOver ? '_blank' : '_top' ) );
		}
	}
}
