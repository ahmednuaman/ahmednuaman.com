package com.ahmednuaman.controller
{
	import com.ahmednuaman.ApplicationFacade;
	import com.ahmednuaman.model.ViewProxy;
	
	import org.puremvc.as3.interfaces.ICommand;
	import org.puremvc.as3.interfaces.INotification;
	import org.puremvc.as3.patterns.command.SimpleCommand;

	public class ViewCommand extends SimpleCommand implements ICommand
	{
		public static const NAME:String							= 'ViewCommand';
		
		override public function execute(notification:INotification):void
		{
			var name:String = notification.getName();
			var body:Object = notification.getBody();
			
			switch ( name )
			{
				case ApplicationFacade.RESIZE:
				viewProxy.vo.width = body.width;
				viewProxy.vo.height = body.height;
				
				break;
			}
		}
		
		private function get viewProxy():ViewProxy
		{
			return facade.retrieveProxy( ViewProxy.NAME ) as ViewProxy;
		}		
	}
}