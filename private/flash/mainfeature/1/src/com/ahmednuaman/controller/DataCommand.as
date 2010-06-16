package com.ahmednuaman.controller
{			
	import com.ahmednuaman.model.DataProxy;
	import com.ahmednuaman.view.component.*;
	
	import org.puremvc.as3.interfaces.ICommand;
	import org.puremvc.as3.interfaces.INotification;
	import org.puremvc.as3.patterns.command.SimpleCommand;

	public class DataCommand extends SimpleCommand implements ICommand
	{
		override public function execute(notification:INotification):void
		{
			var name:String = notification.getName();
			var body:Object = notification.getBody();
			
			switch (name)
			{
				
			}
		}
		
		private function get dataProxy():DataProxy
		{
			return facade.retrieveProxy( DataProxy.NAME ) as DataProxy;
		}
	}
}