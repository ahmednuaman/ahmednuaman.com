package
{
	import flash.display.Graphics;
	import flash.display.Sprite;
	import flash.utils.setTimeout;
	
	import gs.TweenLite;
	import gs.easing.Strong;

	[SWF( width="580", height="400", frameRate="30", backgroundColor="#FFFFFF" )]
	
	public class App extends Sprite
	{
		private var boxes:Array									= [ ];
		private var current:Number								= 0;
		private var stageHeight:Number							= 400;
		private var stageWidth:Number							= 580;
		
		public function App()
		{
			for ( var i:Number = 0; i < 20; i++ )
			{
				drawBox();
			}
			
			start();
		}
		
		private function drawBox():void
		{
			var box:Sprite = new Sprite();
			var graphics:Graphics = box.graphics;
			var colour:uint = Math.random() * 0xFFFFFF;
			
			graphics.beginFill( colour );
			graphics.drawRoundRect( 0, 0, stageWidth, stageHeight, 3, 3 );
			graphics.endFill();
			
			boxes.push( box );
			
			addChild( box );
		}
		
		private function start():void
		{
			var target:Sprite;
			
			for ( var i:Number = 0; i < boxes.length; i++ )
			{
				target = boxes[ i ];
				
				if ( i < current )
				{
					TweenLite.to( target, 1, { x: -stageWidth, ease: Strong.easeOut } );
				}
				else if ( i == current )
				{
					setChildIndex( target, numChildren - 1 );
					
					TweenLite.to( target, 1, { x: 0, ease: Strong.easeOut } );
				}
				else
				{
					target.x = stageWidth;
				}
			}
			
			if ( current >= boxes.length - 1 )
			{
				current = 0;
			}
			else
			{
				current++;
			}
			
			setTimeout( start, 2000 );
		}
	}
}