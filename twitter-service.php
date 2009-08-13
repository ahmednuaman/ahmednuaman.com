<?php
$feed = @file_get_contents( 'http://twitter.com/statuses/user_timeline/ahmednuaman.rss' );

if ( $feed )
{
	file_put_contents( 'twitter.xml', $feed );
}

exit();

?>