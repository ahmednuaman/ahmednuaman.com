package com.ahmednuaman.model
{
	import com.ahmednuaman.ApplicationFacade;
	import com.ahmednuaman.model.vo.ViewVO;
	
	import org.puremvc.as3.interfaces.IProxy;
	import org.puremvc.as3.patterns.proxy.Proxy;

	public class ViewProxy extends Proxy implements IProxy
	{
		public static const NAME:String							= 'ViewProxy';
		
		public function ViewProxy()
		{
			super( NAME, new ViewVO() );
		}
		
		override public function onRegister():void
		{
			sendNotification( ApplicationFacade.TRACK, { i: 'Registered ' + NAME } );
		}
		
		public function get vo():ViewVO
		{
			return data as ViewVO;
		}
	}
}