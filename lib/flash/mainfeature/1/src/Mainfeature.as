package 
{
	import com.ahmednuaman.ApplicationFacade;
	import com.ahmednuaman.view.ApplicationMediator;
	
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.events.MouseEvent;
	
	[SWF( width='1000', height='450', frameRate='30', backgroundColor='#FFFFFF' )]
	
	public class Mainfeature extends Sprite
	{
		public function Mainfeature()
		{		
			stage.align = StageAlign.TOP_LEFT;
			stage.scaleMode = StageScaleMode.NO_SCALE;
			
			stage.addEventListener( Event.RESIZE, sendResize );
			stage.addEventListener( MouseEvent.MOUSE_MOVE, sendMouseMove );
			
			ApplicationFacade.getInstance().startup( this );
			
			forceResize();
		}
		
		public function forceResize():void
		{
			stage.dispatchEvent( new Event( Event.RESIZE ) );
		}
		
		private function sendResize(e:Event):void
		{
			var mediator:ApplicationMediator = ApplicationFacade.getInstance().retrieveMediator( ApplicationMediator.NAME ) as ApplicationMediator;
			
			mediator.sendResize( stage.stageWidth, stage.stageHeight );
		}
		
		private function sendMouseMove(e:MouseEvent):void
		{
			var mediator:ApplicationMediator = ApplicationFacade.getInstance().retrieveMediator( ApplicationMediator.NAME ) as ApplicationMediator;
			
			mediator.sendMouseMove( e );
		}
	}
}
