package com.example.model
{
	import com.example.ApplicationFacade;
	
	import org.puremvc.as3.interfaces.IProxy;
	import org.puremvc.as3.patterns.proxy.Proxy;

	public class Proxy extends org.puremvc.as3.patterns.proxy.Proxy implements IProxy
	{
		public static const NAME:String							= 'Proxy';
		
		public function Proxy()
		{
			super( NAME, { } );
		}
		
		override public function onRegister():void
		{
			sendNotification( ApplicationFacade.TRACK, 'Registered ' + NAME );
		}
	}
}