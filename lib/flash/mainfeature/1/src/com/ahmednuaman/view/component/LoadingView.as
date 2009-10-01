package com.ahmednuaman.view.component
{
	import com.firestartermedia.lib.puremvc.display.Sprite;

	public class LoadingView extends Sprite
	{
		public static const NAME:String							= 'LoadingView';
		
		public static const READY:String						= NAME + 'Ready';
		public static const UPDATE:String						= NAME + 'Update';
		public static const COMPLETE:String						= NAME + 'Complete';
		
		private var barWidth:Number								= 233;
		private var barHeight:Number							= 10;
		
		private var bar:Sprite;
		
		public function LoadingView()
		{
			alpha = 0;
			
			registered = true;
			
			init();
		}
		
		private function init():void
		{
			var matrix:Matrix = new Matrix();
			var barBg:Sprite = new Sprite();
			var glow:GlowFilter = new GlowFilter( 0x000000, .2, 15, 15, 1 );
			
			bar = new Sprite();
			
			barBg.graphics.beginFill( 0xFFFFFF, 0 );
			barBg.graphics.drawRect( 0, 0, barWidth, barHeight );
			barBg.graphics.endFill();
			
			addChild( barBg );
			
			matrix.createGradientBox( barWidth, barHeight, Math.PI * .5 ); 
			
			bar.graphics.beginGradientFill( GradientType.LINEAR, [ 0xF2D950, 0xDA731B ], [ 1, 1 ], [ 0, 255 ], matrix );
			bar.graphics.lineStyle( 1, 0xFFFFFF, 1, true, LineScaleMode.NONE, CapsStyle.ROUND );
			bar.graphics.drawRect( 0, 0, barWidth, barHeight );
			bar.graphics.endFill();
			
			bar.filters = [ glow ];
			
			addChild( bar );
		}
		
		public function fadeIn():void
		{		
			bar.width = 0;
						
			TweenLite.to( this, .5, { autoAlpha: 1, ease: Strong.easeOut, onComplete: sendReady, onCompleteParams: [ READY ] } );
		}
		
		public function fadeOut():void
		{							
			TweenLite.to( this, .5, { autoAlpha: 0, ease: Strong.easeOut } );
		}
		
		public function update(percentage:Number):void
		{
			TweenLite.to( bar, .5, { width: barWidth, ease: Strong.easeOut, overwrite: true, onComplete: sendUpdateComplete } );
		}
		
		private function sendUpdateComplete():void
		{
			sendEvent( COMPLETE );
		}
		
		override public function handleResize(e:Object):void
		{
			this.x = ( e.width / 2 ) - ( this.width / 2 );
			this.y = ( e.height / 2 ) - ( this.height / 2 ) + 40;
		}
	}
}