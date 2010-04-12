<?php
$feed = @file_get_contents( 'http://ahmednuaman.com/blog/feed/' );

if ( $feed )
{
	file_put_contents( 'assets/xml/blog.xml', $feed );
}

exit();

?>