package
{
	import com.firestartermedia.lib.as3.display.tools.ScaleObject;
	
	import flash.display.Bitmap;
	import flash.display.Sprite;
	import flash.geom.Rectangle;

	public class TestTrackBackground extends Sprite
	{
		[Embed( source='assets/image/bg.png' )]
		private var BgImage:Class;
		
		private var scaledImage:Sprite;
		
		public function TestTrackBackground()
		{
			var image:Bitmap = new BgImage();
			
			scaledImage = new ScaleObject( image, new Rectangle( 10, 10, 280, 10 ) );
			
			addChild( scaledImage );
		}
		
		override public function set height(value:Number):void
		{
			scaledImage.height = value;
		}
		
		override public function set width(value:Number):void
		{
			scaledImage.width = value;
		}
	}
}