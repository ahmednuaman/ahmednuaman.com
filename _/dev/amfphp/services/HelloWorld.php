<?php
/*
@author:		Ahmed Nuaman (ahmed@firestartermedia.com)
@date:			2009-05-28

Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
*/

include_once( AMFPHP_BASE . 'shared/util/MethodTable.php' );

class HelloWorld
{
	var $db;
	
	function __construct()
	{
		$this->db = mysql_connect( DB_HOST, DB_USER, DB_PASS );
		mysql_select_db( DB_NAME );
	}
	
	function say($msg)
	{
		return 'You said: ' . $msg;
	}
	
	function put($data)
	{
		$query = mysql_query( 'INSERT INTO hello_world ( id, data ) VALUES ( \'\', \'' . $data . '\' )', $this->db );
		
		if ( $query )
		{
			return mysql_insert_id();
		}
		else
		{
			return mysql_error();
		}
	}
	
	function get($id='')
	{
		$query = mysql_query( 'SELECT * FROM hello_world' . ( $id ? ' WHERE id = \'' . $id . '\'' : '' ), $this->db );
		
		if ( $query )
		{
			return mysql_fetch_object( $query );
		}
		else
		{
			return mysql_error();
		}
	}
}

/* End of file HelloWorld.php */
/* Location: ./services/HelloWorld.php */