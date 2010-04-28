package
{
	import com.greensock.TweenLite;
	
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.events.Event;

	public class Ball extends Sprite
	{
		private var ball:Shape									= new Shape();
		
		private var startY:Number;
		
		public function Ball()
		{
			init();
			
			addEventListener( Event.ADDED_TO_STAGE, handleAdded );
		}
		
		private function init():void
		{
			ball.graphics.beginFill( 0xFF0000 );
			ball.graphics.drawCircle( 0, 0, 20 );
			ball.graphics.endFill();
			
			addChild( ball );
		}
		
		private function handleAdded(e:Event):void
		{
			removeEventListener( Event.ADDED_TO_STAGE, handleAdded );
			
			startY	= y;
			
			bounceDown();
		}
		
		private function bounceDown():void
		{
			tween( stage.stageHeight - height, bounceUp );
		}
		
		private function bounceUp():void
		{
			tween( startY, bounceDown );
		}
		
		private function tween(y:Number, next:Function):void
		{
			TweenLite.to( this, .5, { y: y, onComplete: next } );
		}
	}
}