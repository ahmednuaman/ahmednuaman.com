package
{
	import de.polygonal.ds.DLinkedList;
	import de.polygonal.ds.DListNode;
	
	import flash.display.Graphics;
	import flash.display.Sprite;
	import flash.utils.setTimeout;
	
	import gs.TweenLite;
	import gs.easing.Strong;

	[SWF( width="580", height="400", frameRate="30", backgroundColor="#FFFFFF" )]
	
	public class App2 extends Sprite
	{
		private var boxes:DLinkedList							= new DLinkedList();
		private var stageHeight:Number							= 400;
		private var stageWidth:Number							= 580;
		
		private var current:DListNode;
		
		public function App2()
		{
			for ( var i:Number = 0; i < 20; i++ )
			{
				drawBox();
			}
			
			current = boxes.head;
			
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
			
			boxes.append( box );
			
			addChild( box );
		}
		
		private function start():void
		{
			var nodePrev:DListNode = current.prev;
			var nodeNext:DListNode = current.next;
			var target:Sprite = current.data as Sprite;
			
			setChildIndex( target, numChildren - 1 );
			
			TweenLite.to( target, 1, { x: 0, ease: Strong.easeOut } );		
 
			while ( nodePrev )
			{
				TweenLite.to( nodePrev.data as Sprite, 1, { x: -stageWidth, ease: Strong.easeOut } );
				
				nodePrev = nodePrev.prev;
			}
 
			while ( nodeNext )
			{
				( nodeNext.data as Sprite ).x = stageWidth;
				
				nodeNext = nodeNext.next;
			}
			
			current = ( current.next ? current.next : boxes.head );
			
			setTimeout( start, 2000 );
		}
	}
}