package 
{
	import flash.display.Sprite;
	
	[SWF( backgroundColor="#FFFFFF" )]
	
	public class App extends Sprite
	{
		public function App()
		{
			addChild( new RedCirclesExtended() );
		}
	}
}
