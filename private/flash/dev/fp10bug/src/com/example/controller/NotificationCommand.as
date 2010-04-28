package com.example.controller
{
	import com.example.ApplicationFacade;
	
	import org.osflash.thunderbolt.Logger;
	import org.puremvc.as3.interfaces.ICommand;
	import org.puremvc.as3.interfaces.INotification;
	import org.puremvc.as3.patterns.command.SimpleCommand;

	public class NotificationCommand extends SimpleCommand implements ICommand
	{
		public function NotificationCommand()
		{
			//Logger.console	= true;
			//Logger.hide		= true;
		}
		
		override public function execute(notification:INotification):void
		{
			var name:String	= notification.getName();
			var body:Object = notification.getBody();

			switch ( name )
			{
				case ApplicationFacade.FAULT:
				handleFault( body );
				
				break;
				
				case ApplicationFacade.TRACK:
				handleTrack( body );
				
				break;
			}			
		}
		
		private function handleFault(fault:Object):void
		{
			Logger.error.apply( null, [ ApplicationFacade.FAULT ].concat( fault ) );
		}
		
		private function handleTrack(track:Object):void
		{
			Logger.debug.apply( null, [ ApplicationFacade.TRACK ].concat( track ) );
		}
	}
}