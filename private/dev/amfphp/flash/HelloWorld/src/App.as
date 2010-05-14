package 
{
	import com.firestartermedia.lib.as3.data.amfphp.AMFPHPService;
	import com.firestartermedia.lib.as3.events.RemoteConnectionServiceEvent;
	
	import flash.display.Sprite;
	import flash.net.URLVariables;

	public class App extends Sprite
	{
		private var gatewayURL:String 							= 'http://dev.ahmednuaman.com/amfphp/gateway.php';
		
		public function App()
		{
			var service:AMFPHPService = new AMFPHPService( gatewayURL );
			
			service.addEventListener( RemoteConnectionServiceEvent.FAULT, handleFault );
			service.addEventListener( RemoteConnectionServiceEvent.READY, handleReady );
			
			service.send( 'com.flashtuts.HelloWorld.say', '1', '2', '3', '4' );
		}
		
		private function handleFault(e:RemoteConnectionServiceEvent):void
		{
			trace('fault ' + e.data);
		}
		
		private function handleReady(e:RemoteConnectionServiceEvent):void
		{
			trace('ready ' + e.data);
		}
	}
}
