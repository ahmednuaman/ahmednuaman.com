package 
{
	import com.firestartermedia.lib.as3.display.component.LoaderProgressText;
	
	import flash.display.Loader;
	import flash.display.LoaderInfo;
	import flash.display.Sprite;
	import flash.display.StageAlign;
	import flash.display.StageScaleMode;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.ProgressEvent;
	import flash.external.ExternalInterface;
	import flash.filters.GlowFilter;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.text.TextField;
	import flash.text.TextFieldAutoSize;
	import flash.text.TextFormat;
	
	import gs.TweenLite;
	import gs.easing.Strong;
	
	[SWF( width='900', height='200', frameRate='30', backgroundColor='#FFFFFF' )]
		
	public class App extends Sprite
	{
		private var textFormat:TextFormat 						= new TextFormat( new TitleFont().fontName, 20, 0xFFFFFF );
		private var textFilters:Array 							= [ new GlowFilter( 0x000000, .5, 5, 5 ) ];
		private var progress:LoaderProgressText 				= new LoaderProgressText( textFormat, textFilters );
		private var padding:Number								= 7.5;
		private var tweenTime:Number							= .5;
		
		private var textField:TextField;
		private var target:String;
		
		public function App()
		{
			stage.align = StageAlign.TOP_LEFT;
			stage.scaleMode = StageScaleMode.NO_SCALE;
			
			init();
		}
		
		private function init():void
		{
			var xmlURL:String = ( LoaderInfo( this.root.loaderInfo ).parameters.xmlURL ? LoaderInfo( this.root.loaderInfo ).parameters.xmlURL : '/assets/xml/work.xml' );	
			var request:URLRequest = new URLRequest( xmlURL );
			var loader:URLLoader = new URLLoader();
			
			loader.addEventListener( Event.COMPLETE, build );
			
			loader.load( request );
		}
		
		private function build(e:Event):void
		{
			var data:XML = new XML( e.target.data );
			var limit:Number = data..feature.length() - 1;
			var random:Number = Math.round( Math.random() * limit );
			
			random = ( random > limit ? limit : random );
			
			var request:URLRequest = new URLRequest( data..feature[ random ].image.toString() );
			var loader:Loader = new Loader();		
			var bg:Sprite = new Sprite();
			
			target = data.feature[ random ].id.toString();
			
			bg.graphics.beginFill( 0x0000FF );
			bg.graphics.drawRoundRect( 0, 0, stage.stageWidth, stage.stageHeight, 10, 10 );
			bg.graphics.endFill();
			
			progress.x = ( stage.stageWidth / 2 ) - ( progress.width / 2 );
			progress.y = ( stage.stageHeight / 2 ) - ( progress.height / 2 );
			
			addChild( progress );
			
			progress.show();
			
			loader.contentLoaderInfo.addEventListener( ProgressEvent.PROGRESS, handleProgress );
			loader.contentLoaderInfo.addEventListener( Event.COMPLETE, handleComplete );
			
			loader.load( request );
			
			addChild( loader );
			
			addChild( bg );
			
			loader.mask = bg;
			
			textField = new TextField();
			
			textField.autoSize = TextFieldAutoSize.LEFT;
			textField.defaultTextFormat = textFormat;
			textField.embedFonts = true;
			textField.filters = textFilters;
			textField.text = data..feature[ random ].title.toString();
			textField.x = padding;
			textField.y = stage.stageHeight;
			
			addChild( textField );
			
			loader.addEventListener( MouseEvent.CLICK, goToFeature );
			
			buttonMode = true;
		}
		
		private function handleProgress(e:ProgressEvent):void
		{
			progress.update( Math.round( ( e.bytesLoaded / e.bytesTotal ) * 100 ) );
		}
		
		private function handleComplete(e:Event):void
		{
			progress.hide();
			
			TweenLite.to( textField, tweenTime, { y: stage.stageHeight - textField.height - padding, ease: Strong.easeOut } );
			
			TweenLite.from( e.target.content, tweenTime, { x: stage.stageWidth, ease: Strong.easeOut } );
		}
		
		private function goToFeature(e:MouseEvent):void
		{
			ExternalInterface.call( 'visitThisLink', 'http://ahmednuaman.com/#' + target );
		}
	}
}
