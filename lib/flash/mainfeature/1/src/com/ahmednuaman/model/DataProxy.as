package com.ahmednuaman.model
{
	import com.ahmednuaman.ApplicationFacade;
	import com.ahmednuaman.model.vo.DataVO;
	
	import flash.events.Event;
	import flash.events.ProgressEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	
	import org.puremvc.as3.interfaces.IProxy;
	import org.puremvc.as3.patterns.proxy.Proxy;

	public class DataProxy extends Proxy implements IProxy
	{
		public static const NAME:String							= 'DataProxy';
		
		public static const LOAD_RESOURCE_ACTIVATE:String		= NAME + 'LoadResourceActivate';
		public static const LOAD_RESOURCE_PROGRESS:String		= NAME + 'LoadResourceProgress';
		public static const LOAD_RESOURCE_COMPLETE:String		= NAME + 'LoadResourceComplete';
		
		private var currentResourceIndex:Number					= 0;
		
		public function DataProxy()
		{
			super( NAME, new DataVO() );
		}
		
		override public function onRegister():void
		{
			sendNotification( ApplicationFacade.TRACK, { i: 'Registered ' + NAME } );
		}
		
		public function loadResources():void
		{			
			loadResource( vo.resourcesToLoad[ currentResourceIndex ] );
		}
		
		public function loadResource(url:String):void
		{
			var loader:URLLoader = new URLLoader();
			var request:URLRequest = new URLRequest();
			
			request.url = url;
			
			loader.addEventListener( Event.ACTIVATE, handleLoadResourceActivate );
			loader.addEventListener( ProgressEvent.PROGRESS, handleLoadResourceProgress );
			loader.addEventListener( Event.COMPLETE, handleLoadResourceComplete );
			
			loader.load( request );
		}
		
		private function handleLoadResourceActivate(e:Event):void
		{
			sendNotification( LOAD_RESOURCE_ACTIVATE );
		}
		
		private function handleLoadResourceProgress(e:ProgressEvent):void
		{
			var percent:Number = e.bytesLoaded / e.bytesTotal;
			var multiple:Number = 100 * ( 1 / vo.resourcesToLoad.length );
			
			percent = percent * multiple;
			percent = percent + ( multiple * ( currentResourceIndex ) );	
			percent = Math.round( percent );
			
			sendNotification( LOAD_RESOURCE_PROGRESS, { percent: percent } );
		}
		
		private function handleLoadResourceComplete(e:Event):void
		{			
			addResource( new XML( e.target.data ), currentResourceIndex++ );
					
			if ( currentResourceIndex > vo.resourcesToLoad.length - 1  )
			{
				sendNotification( LOAD_RESOURCE_COMPLETE, vo.resourcesData );
			}
			else
			{				
				loadResources();
			}
		}
		
		private function addResource(data:XML, index:Number):void
		{
			if ( !vo.resourcesData )
			{
				vo.resourcesData = { };
			}
			
			switch ( vo.resourcesToLoad[ index ] )
			{
				case vo.xmlMainfeature:
				vo.resourcesData.mainfeature = data;
				
				break;
			}
		}
		
		public function get vo():DataVO
		{
			return data as DataVO;
		}
	}
}