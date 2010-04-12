package 
{
	import com.firestartermedia.lib.as3.display.Mainfeature;
	import com.firestartermedia.lib.as3.events.MainfeatureEvent;
	import com.firestartermedia.lib.as3.utils.GoogleUtil;
	
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.external.ExternalInterface;
	import flash.filters.GlowFilter;
	import flash.text.TextFormat;

	[SWF( width='900', height='450', frameRate='30', backgroundColor='#FFFFFF' )]
	
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
			var mainfeature:Mainfeature = new Mainfeature();
			
			mainfeature.arrowLeft = new SideArrowLeft();
			mainfeature.arrowRight = new SideArrowRight();
			mainfeature.cornerRadius = 10;
			mainfeature.fontFormat = new TextFormat( new TitleFont().fontName, 20, 0xFFFFFF );
			mainfeature.fontFilters = [ new GlowFilter( 0x000000, .5, 5, 5 ) ];
			mainfeature.xmlURL = xmlURL;
			
			mainfeature.baseWidth = 900;
			mainfeature.baseHeight = 450;
			
			mainfeature.addEventListener( MainfeatureEvent.CLICKED_ARROW_LEFT, handleClickArrowLeft );
			mainfeature.addEventListener( MainfeatureEvent.CLICKED_ARROW_RIGHT, handleClickArrowRight );
			mainfeature.addEventListener( MainfeatureEvent.CLICKED_FEATURE, handleClickFeature );
			
			mainfeature.init();
			
			addChild( mainfeature );
		}
		
		private function handleClickArrowLeft(e:MainfeatureEvent):void
		{
			GoogleUtil.trackClick( 'mainfeaturePreviousArrow' );
		}
		
		private function handleClickArrowRight(e:MainfeatureEvent):void
		{
			GoogleUtil.trackClick( 'mainfeatureNextArrow' );
		}
		
		private function handleClickFeature(e:MainfeatureEvent):void
		{
			ExternalInterface.call( 'scrollTo', e.data.target );
		}
	}
}