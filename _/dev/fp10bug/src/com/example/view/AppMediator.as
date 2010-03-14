package com.example.view
{
	import com.example.ApplicationFacade;
	import com.example.model.Proxy;
	
	import org.puremvc.as3.interfaces.IMediator;
	import org.puremvc.as3.patterns.mediator.Mediator;

	public class AppMediator extends Mediator implements IMediator
	{
		public static const NAME:String							= 'ApplicationMediator';
		
		public function AppMediator(viewComponent:App)
		{
			super( NAME, viewComponent );
		}
		
		override public function onRegister():void
		{
			sendNotification( ApplicationFacade.TRACK, 'Registered ' + NAME );
		}
		
		private function get proxy():Proxy
		{
			return facade.retrieveProxy( Proxy.NAME ) as Proxy;
		}
	}
}