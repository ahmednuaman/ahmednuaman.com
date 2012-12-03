title: Did Someone Order Multiple YouTube Players?
link: http://www.ahmednuaman.com/blog/did-someone-order-multiple-youtube-players/
creator: ahmed
description: 
post_id: 410
post_date: 2009-09-17 13:35:45
post_date_gmt: 2009-09-17 13:35:45
comment_status: open
post_name: did-someone-order-multiple-youtube-players
status: publish
post_type: post

# Did Someone Order Multiple YouTube Players?

So, here I am, playing with YouTube players, trying to get more than one to load in Actionscript 3. But it's a pain, so I did a few tests and got it running fine in Actionscript 2. My aim is to port this to Actionscript 3, but the biggest problem is the handling of the AVMs. I've got some tests to do to figure out the best way to separate the content, but hopefully I should have it done soon, so do watch this space. But, for all you lot out there, here's some old school Actionscript 2 code: ` import com.tangozebra.youtube.TZYouTubePlayer; class MultipleYouTubePlayers { private var parent:MovieClip; public function MultipleYouTubePlayers(parent:MovieClip) { System.security.allowDomain( '*' ); System.security.allowDomain( 'www.youtube.com' ); System.security.allowDomain( 'youtube.com' ); System.security.allowDomain( 's.ytimg.com' ); System.security.allowDomain( 'i.ytimg.com' ); Stage.align = 'tl'; Stage.scaleMode = 'noScale'; this.parent = parent; init(); } private function init():Void { var mc1:MovieClip = parent.createEmptyMovieClip( 'mc1', parent.getNextHighestDepth() ); var mc2:MovieClip = parent.createEmptyMovieClip( 'mc2', parent.getNextHighestDepth() ); var mc3:MovieClip = parent.createEmptyMovieClip( 'mc3', parent.getNextHighestDepth() ); var player1:TZYouTubePlayer = new TZYouTubePlayer( mc1 ); var player2:TZYouTubePlayer = new TZYouTubePlayer( mc2 ); var player3:TZYouTubePlayer = new TZYouTubePlayer( mc3 ); player1.init( 'ghqjailPGOQ' ); player2.init( 'C54wqJBxrWg' ); player3.init( 'yU5W4CkZHHQ' ); mc1._y = 0; mc2._y = player1.playerHeight + 10; mc3._y = ( player1.playerHeight + 10 ) * 2; } } ` And this is what it gives you: 

[kml_flashembed publishmethod="static" fversion="10.0.0" movie="http://dev.ahmednuaman.com/multipleytplayersas2/App.swf" width="580" height="1100" targetclass="flashmovie"/]

But I need to port it to Actionscript 3, so not quite done there!!

## Comments

**[Monkey](#221 "2009-09-17 21:28:59"):** As allways - Bloody good show Mr Ahmed, Now i see why you were happy with as2 on twitter yesterday; ) what sort of time frame are we talking before the as3 version appears as i have a project on at the moment i can hold untill ready if its comming soon ( its the bigest letdown of the project so it could make for a much better portfolio if this can be done!) Legend!

**[Ahmed](#222 "2009-09-18 07:23:39"):** Cheers Monkey. AS2 is a dirty language, one that makes me want to go to Adobe's Regent Park offices and kick someone. The biggest problem with getting it to work in AS3 is the distribution of the vars amongst the AVM, for some reason, it just combines the players as one and although it tries to load all of them, say 5, only the 5th shows.

**[FLVplayer](#225 "2009-09-22 11:19:32"):** Thanks for your code. Shall i include it in my player?

**[Terence](#227 "2009-09-23 11:09:27"):** Thanks to author.

