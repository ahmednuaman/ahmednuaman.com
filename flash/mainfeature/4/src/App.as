package 
{
	import com.firestartermedia.lib.as3.display.carousel.CarouselMainfeature;
	import com.firestartermedia.lib.as3.events.CarouselEvent;
	import com.firestartermedia.lib.as3.utils.GoogleUtil;
	
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.external.ExternalInterface;
	import flash.filters.GlowFilter;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.text.TextFormat;

	[SWF( width='1000', height='450', frameRate='30', backgroundColor='#FFFFFF' )]
	
	public class App extends Sprite
	{
		public function App()
		{
			stage.align = StageAlign.TOP_LEFT;
			stage.scaleMode = StageScaleMode.NO_SCALE;
			
			init(); 
		}
		
		private function init():void
		{
			var xmlURL:String = ( LoaderInfo( this.root.loaderInfo ).parameters.xmlURL ? LoaderInfo( this.root.loaderInfo ).parameters.xmlURL : 'assets/xml/work.xml' );
			var request:URLRequest = new URLRequest( xmlURL );
			var loader:URLLoader = new URLLoader();
			
			loader.addEventListener( Event.COMPLETE, build );
			
			loader.load( request );
		}
		
		private function build(e:Event):void
		{
			var mainfeature:CarouselMainfeature = new CarouselMainfeature();
			
			mainfeature.arrowsOutside = true;
			mainfeature.arrowLeft = new SideArrowLeft();
			mainfeature.arrowRight = new SideArrowRight();
			mainfeature.cornerRadius = 10;
			mainfeature.fontFormat = new TextFormat( new TitleFont().fontName, 20, 0xFFFFFF );
			mainfeature.fontFilters = [ new GlowFilter( 0x000000, .5, 5, 5 ) ];			
			mainfeature.baseWidth = 900;
			mainfeature.baseHeight = 450;
			
			mainfeature.addEventListener( CarouselEvent.CLICKED_ARROW_LEFT, handleClickArrowLeft );
			mainfeature.addEventListener( CarouselEvent.CLICKED_ARROW_RIGHT, handleClickArrowRight );
			mainfeature.addEventListener( CarouselEvent.CLICKED_FEATURE, handleClickFeature );
			
			mainfeature.init( new XML( e.target.data ) );
			
			addChild( mainfeature );
		}
		
		private function handleClickArrowLeft(e:CarouselEvent):void
		{
			GoogleUtil.trackClick( 'mainfeaturePreviousArrow' );
		}
		
		private function handleClickArrowRight(e:CarouselEvent):void
		{
			GoogleUtil.trackClick( 'mainfeatureNextArrow' );
		}
		
		private function handleClickFeature(e:CarouselEvent):void
		{
			ExternalInterface.call( 'scrollTo', e.data.target );
		}
	}
}