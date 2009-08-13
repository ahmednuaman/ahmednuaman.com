package com.ahmednuaman.controller
{
	import org.osflash.thunderbolt.Logger;
	import org.puremvc.as3.interfaces.ICommand;
	import org.puremvc.as3.interfaces.INotification;
	import org.puremvc.as3.patterns.command.SimpleCommand;

	public class TrackCommand extends SimpleCommand implements ICommand
	{
		override public function execute(notification:INotification):void
		{
			//Logger.hide = true;
			
			if ( notification.getBody().hasOwnProperty('i') )
			{
				Logger.info( notification.getBody().i );
			}
			else if ( notification.getBody().hasOwnProperty('o') )
			{
				Logger.debug( notification.getBody().o );
			}
			else
			{
				Logger.log( '1' , notification.getName() );
			}
		}
	}
}