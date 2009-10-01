package com.ahmednuaman.controller
{
	import org.osflash.thunderbolt.Logger;
	import org.puremvc.as3.interfaces.ICommand;
	import org.puremvc.as3.interfaces.INotification;
	import org.puremvc.as3.patterns.command.SimpleCommand;

	public class FaultCommand extends SimpleCommand implements ICommand
	{
		override public function execute(notification:INotification):void
		{
			Logger.error( notification.getBody().toString() );
		}
	}
}