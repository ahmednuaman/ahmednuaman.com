package com.ahmednuaman.view.component
{
	import com.firestartermedia.lib.puremvc.patterns.Mediator;
	import org.puremvc.as3.interfaces.IMediator;

	public class LoadingViewMediator extends Mediator implements IMediator
	{
		public static const NAME:String							= 'LoadingViewMediator';
		
		private var loadingView:LoadingView;
		
		public function LoadingViewMediator(viewComponent:Object=null)
		{
			super( NAME, viewComponent );
		}
		
		override public function onRegister():void
		{
			sendNotification( ApplicationFacade.TRACK, { i: 'Registered ' + NAME } );
			
			loadingView = new LoadingView();
			
			loadingView.addEventListener( LoadingView.READY, sendEvent );
			
			viewComponent.addChild( loadingView );
		}
		
		override public function listNotificationInterests():Array
		{
			return [
				ApplicationFacade.RESIZE,
				BackgroundView.READY,
				DataProxy.LOAD_RESOURCE_PROGRESS,
				DataProxy.LOAD_RESOURCE_COMPLETE
			];
		}
		
		override public function handleNotification(notification:INotification):void
		{
			var name:String = notification.getName();
			var body:Object = notification.getBody();
			
			switch ( name )
			{
				case ApplicationFacade.RESIZE:
				loadingView.handleResize( body );
				
				break;
				
				case BackgroundView.READY:
				loadingView.fadeIn();
				
				sendNotification( LogoView.LOADING_POSITION );
				
				break;
				
				case DataProxy.LOAD_RESOURCE_PROGRESS:
				loadingView.update( body.percent );
				
				break;
				
				case DataProxy.LOAD_RESOURCE_COMPLETE:
				loadingView.addEventListener( LoadingView.COMPLETE, handleLoadResourceComplete );
				
				break;
			}
		}
		
		private function handleLoadResourceComplete(e:Event):void
		{
			loadingView.removeEventListener( LoadingView.COMPLETE, handleLoadResourceComplete );
			
			sendNotification( LoadingView.COMPLETE );
			
			loadingView.fadeOut();
		}
	}
}