/**
 * @author			Ahmed Nuaman (http://www.ahmednuaman.com)
 * @langversion		2
 * 
 * This work is licenced under the Creative Commons Attribution-Share Alike 2.0 UK: England & Wales License. 
 * To view a copy of this licence, visit http://creativecommons.org/licenses/by-sa/2.0/uk/ or send a letter 
 * to Creative Commons, 171 Second Street, Suite 300, San Francisco, California 94105, USA.
*/
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
		
		mc1.x	= 0;
		mc2.x	= player1.playerWidth + 10;
		mc3.x	= ( player1.playerWidth + 10 ) * 2;
	}
}