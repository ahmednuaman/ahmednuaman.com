package com.ahmednuaman.view
{
	import com.ahmednuaman.ApplicationFacade;
	import com.firestartermedia.lib.puremvc.patterns.Mediator;
	
	import org.puremvc.as3.interfaces.IMediator;
	import org.puremvc.as3.interfaces.INotification;

	public class ApplicationMediator extends Mediator implements IMediator
	{
		public static const NAME:String							= 'ApplicationMediator';
		
		public function ApplicationMediator(viewComponent:Object=null)
		{
			super( NAME, viewComponent );
		}
		
		override public function onRegister():void
		{
			sendNotification( ApplicationFacade.TRACK, { i: 'Registered ' + NAME } );
		}
		
		override public function listNotificationInterests():Array
		{
			return [
			];
		}
		
		override public function handleNotification(notification:INotification):void
		{
			var name:String = notification.getName();
			var body:Object = notification.getBody();
			
			switch ( name )
			{
				
			}
		}
		
		public function sendResize(width:Number, height:Number):void
		{
			sendNotification( ApplicationFacade.RESIZE, { width: width, height: height } );
		}
		
		public function sendMouseMove(e:Object):void
		{
			sendNotification( ApplicationFacade.MOUSE_MOVE, e );
		}
	}
}