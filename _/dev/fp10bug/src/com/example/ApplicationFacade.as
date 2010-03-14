package com.example
{
	import com.example.controller.NotificationCommand;
	import com.example.controller.StartupCommand;
	
	import org.puremvc.as3.interfaces.IFacade;
	import org.puremvc.as3.patterns.facade.Facade;
	import org.puremvc.as3.patterns.observer.Notification;

	public class ApplicationFacade extends Facade implements IFacade
	{
		public static const NAME:String							= 'ApplicationFacade';
		
		public static const FAULT:String						= NAME + 'Fault';
		public static const RESIZE:String						= NAME + 'Resize';
		public static const TRACK:String						= NAME + 'Track';
		
		public static const STARTUP:String						= NAME + 'Startup';
		
		override protected function initializeController():void
		{
			super.initializeController();
			
			registerCommand( FAULT,		NotificationCommand );
			registerCommand( TRACK, 	NotificationCommand );
			
			registerCommand( STARTUP,	StartupCommand );
		}
		
		public static function getInstance():ApplicationFacade
		{
			return ( !instance ? new ApplicationFacade() : instance ) as ApplicationFacade;
		}
		
		public function handleResize(width:Number, height:Number):void
		{
			sendNotification( RESIZE, { height: height, width: width } );
		}
		
		public function handleStartup(app:App):void
		{
			sendNotification( STARTUP, app );
		}
		
		override public function sendNotification(notificationName:String, body:Object=null, type:String=null):void
		{
			if ( notificationName !== FAULT && notificationName !== RESIZE && notificationName !== TRACK )
			{
				sendNotification( TRACK, { name: notificationName, body: body } );
			}
			
			notifyObservers( new Notification( notificationName, body, type ) );
		}
	}
}