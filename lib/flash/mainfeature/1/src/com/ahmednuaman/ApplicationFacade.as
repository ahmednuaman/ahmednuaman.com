package com.ahmednuaman
{
	import com.ahmednuaman.controller.*;
	
	import org.puremvc.as3.patterns.facade.Facade;
	import org.puremvc.as3.interfaces.IFacade;
	import org.puremvc.as3.patterns.observer.Notification;

	public class ApplicationFacade extends Facade implements IFacade
	{
		public static const NAME:String							= 'ApplicationFacade';
		
		public static const STARTUP:String						= 'ApplicationStartUp';
		public static const RESIZE:String						= 'ApplicationResize';
		public static const MOUSE_MOVE:String					= 'ApplicationMouseMove';
		public static const FAULT:String						= 'ApplicationFault';
		public static const TRACK:String						= 'ApplicationTrack';
		
		public static function getInstance():ApplicationFacade
		{
			return (instance ? instance : new ApplicationFacade()) as ApplicationFacade;
		}
		
		override protected function initializeController():void
		{
			super.initializeController();
			
			registerCommand( STARTUP, StartupCommand );
			registerCommand( FAULT, FaultCommand );
			registerCommand( TRACK, TrackCommand );	
			registerCommand( RESIZE, ViewCommand );	
		}
		
		public function startup(stage:Object):void
		{
			sendNotification( STARTUP, 	stage );
		}
		
		override public function sendNotification(notificationName:String, body:Object=null, type:String=null):void
		{
			if (notificationName !== TRACK)
			{
				notifyObservers( new Notification( TRACK, { i: 'Sent ' + notificationName } , type ) );
			}
			
			notifyObservers( new Notification( notificationName, body, type ) );
		}
	}
}