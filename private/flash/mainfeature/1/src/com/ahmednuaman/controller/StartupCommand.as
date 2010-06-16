package com.ahmednuaman.controller
{
	import com.ahmednuaman.model.DataProxy;
	import com.ahmednuaman.model.ViewProxy;
	import com.ahmednuaman.view.ApplicationMediator;
	
	import org.puremvc.as3.interfaces.ICommand;
	import org.puremvc.as3.interfaces.INotification;
	import org.puremvc.as3.patterns.command.SimpleCommand;

	public class StartupCommand extends SimpleCommand implements ICommand
	{
		override public function execute(notification:INotification):void
		{
			facade.registerProxy( new DataProxy() );
			facade.registerProxy( new ViewProxy() );
				
			facade.registerMediator( new ApplicationMediator( notification.getBody() as Mainfeature ) );
		}
	}
}