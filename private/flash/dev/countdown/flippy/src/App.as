package {
	import com.firestartermedia.lib.as3.display.component.Countdown;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;

	public class App extends Sprite
	{
		public function App()
		{
			stage.align			= StageAlign.TOP_LEFT;
			stage.scaleMode		= StageScaleMode.NO_SCALE;
			
			stage.addEventListener( Event.RESIZE, handleResize );
			
			init();
		}
		
		private function init():void
		{
			var countdown:Countdown = new Countdown( new Date() );
		}
		
		private function handleResize(e:Event):void
		{
			
		}
	}
}
