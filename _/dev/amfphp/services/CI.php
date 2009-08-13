<?php
/*
@author:		Ahmed Nuaman (ahmed@firestartermedia.com)
@date:			2009-05-29

Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
*/

include_once( AMFPHP_BASE . 'shared/util/MethodTable.php' );

class CI
{
	function __construct()
	{
		$this->methodTable = array(
								'execute' => array( 'access' => 'remote', 'description' => 'Runs CI method' )
							);
	}
	
	function execute($path='', $vars=false)
	{
		global $value;
		
		define( 'AMFPHP', true );
		
		if ( $vars && is_array( $vars ) )
		{
			$_POST = $vars;
		}
		
		$_SERVER['PATH_INFO'] = $_SERVER['QUERY_STRING'] = $_SERVER['REQUEST_URI'] = '/' . $path;
		
		require_once( '../index.php' );
		
		return $value;
	}
}

/* End of file CI.php */
/* Location: ./services/CI.php */