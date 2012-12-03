title: Check The Validity Of A YouTube Video With PHP
link: http://www.ahmednuaman.com/blog/check-the-validity-of-a-youtube-video-with-php/
creator: ahmed
description: 
post_id: 576
post_date: 2010-07-16 13:53:41
post_date_gmt: 2010-07-16 12:53:41
comment_status: open
post_name: check-the-validity-of-a-youtube-video-with-php
status: publish
post_type: post

# Check The Validity Of A YouTube Video With PHP

I recently finished a project where we had to get some information about a YouTube video from a user submitted URL. Now there are different ways to do this, but the best way is to get the video's id and pass this through GData to get all its information. We must remember, though, that YouTube has a number of different URLs: 

  * Standard watch page: http://youtube.com/watch?
  * The embedded player: http://youtube.com/v/
  * The short version: http://youtu.be/
So the issue here was to extract the video id from any of these URLs and pass it through GData. Using some simple cunning I've come up with a little function that doesn't even need to use processor intensive regex methods, [here's the code](http://gist.github.com/478321.js?file=Checking%20YouTube%20URL): ` public function check_youtube_url($s, $c=FALSE) { $page = 'youtube.com/watch?'; $player = 'youtube.com/v/'; $short = 'youtu.be/'; $clean = str_replace( array( 'http://', 'www.' ), '', $s ); if ( strpos( $clean, $page ) === 0 ) { $vars_string = explode( '?', $s ); $vars_string = explode( '&', $vars_string[ 1 ] ); foreach ( $vars_string as $var ) { $var = explode( '=', $var ); $vars[ $var[ 0 ] ] = $var[ 1 ]; } $id = $vars[ 'v' ]; } elseif ( strpos( $clean, $player ) === 0 ) { $id = explode( '?', str_replace( $player, '', $clean ) ); $id = $id[ 0 ]; } elseif ( strpos( $clean, $short ) === 0 ) { $id = explode( '?', str_replace( $short, '', $clean ) ); $id = $id[ 0 ]; } if ( $id ) { $url = 'http://gdata.youtube.com/feeds/api/videos/' . $id . '?alt=json'; $data = @file_get_contents( $url ); if ( $data ) { if ( $c ) { return TRUE; } else { $json = json_decode( str_replace( '$t', 'text', $data ) ); return array( $id, (string)$json->entry->author[ 0 ]->name->text ); } } } return FALSE; } ` It's worth noting that you don't have to use PHP for this. This could easily by done on the client side with JavaScript or Actionscript, or any server side language; they're all pretty much the same! Give it a try and tell me what you think.