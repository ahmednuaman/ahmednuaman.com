<?

header( 'Content-type: text/xml' );

$url			= 'http://feeds2.feedburner.com/AhmedNuamansBlogEntries';

$cache			= './cache/';
$file 			= md5( $url );
$test 			= $cache . $file;

if ( !file_exists( $test ) || filemtime( $test ) <= ( time() - 3600 ) )
{
	$content	= file_get_contents( $url );

	file_put_contents( $test, $content );
}
else
{
	$content	= file_get_contents( $test );
}

echo $content;

exit();