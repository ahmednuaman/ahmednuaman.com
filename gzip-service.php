<?php
/**
 * @author			Ahmed Nuaman (http://www.ahmednuaman.com)
 * @langversion		5
 * 
 * This work is licenced under the Creative Commons Attribution-Share Alike 2.0 UK: England & Wales License. 
 * To view a copy of this licence, visit http://creativecommons.org/licenses/by-sa/2.0/uk/ or send a letter 
 * to Creative Commons, 171 Second Street, Suite 300, San Francisco, California 94105, USA.
*/

if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) )
{
	ob_start( 'ob_gzhandler' );
}
else
{
	ob_start();
}

$dir 			= dirname( __FILE__ ) . '/';
$test_file		= $dir . 'cache/' . md5( $_GET['f'] );
$files 			= explode( ',', $_GET['f'] );

if ( strstr( $files[ 0 ], '.js' ) )
{
	$content_type = 'javascript';
}
elseif ( strstr( $files[ 0 ], '.css' ) )
{
	$content_type = 'css';
}
elseif ( strstr( $files[ 0 ], '.xml' ) )
{
	$content_type = 'xml';
}

header( 'Content-type: text/' . $content_type );

if ( !file_exists( $test_file ) )
{
	foreach ( $files as $file )
	{
		if ( strpos( $file, '.' ) === 0 || strstr( $file, '..' ) )
		{
			continue;
		}
		else
		{
			$feeds .= file_get_contents( $dir . $file );
		}
	}
	
	file_put_contents( $test_file, $feeds );
}

echo file_get_contents( $test_file );

?>