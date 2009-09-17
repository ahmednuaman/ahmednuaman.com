import com.tangozebra.youtube.TZYouTubePlayer;

class MultipleYouTubePlayers 
{
	private var parent:MovieClip;
	
	public function MultipleYouTubePlayers(parent:MovieClip)
	{
		System.security.allowDomain( '*' );
		System.security.allowDomain( 'www.youtube.com' );
		System.security.allowDomain( 'youtube.com' );
		System.security.allowDomain( 's.ytimg.com' );
		System.security.allowDomain( 'i.ytimg.com' );
		
		Stage.align			= 'tl';
		Stage.scaleMode 	= 'noScale';
		
		this.parent 		= parent;
		
		init();
	}
	
	private function init():Void
	{
		var mc1:MovieClip = parent.createEmptyMovieClip( 'mc1', parent.getNextHighestDepth() );
		var mc2:MovieClip = parent.createEmptyMovieClip( 'mc2', parent.getNextHighestDepth() );
		var mc3:MovieClip = parent.createEmptyMovieClip( 'mc3', parent.getNextHighestDepth() );
		
		var player1:TZYouTubePlayer = new TZYouTubePlayer( mc1 );
		var player2:TZYouTubePlayer = new TZYouTubePlayer( mc2 );
		var player3:TZYouTubePlayer = new TZYouTubePlayer( mc3 );
		
		player1.init( 'ghqjailPGOQ' );
		player2.init( 'C54wqJBxrWg' );
		player3.init( 'yU5W4CkZHHQ' );
		
		mc1._y	= 0;
		mc2._y	= player1.playerHeight + 10;
		mc3._y	= ( player1.playerHeight + 10 ) * 2;
	}
}