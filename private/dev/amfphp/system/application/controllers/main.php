<?php if ( !defined('BASEPATH') && !defined('AMFPHP') ) exit( 'No direct script access allowed' ); 
/*
@author:		Ahmed Nuaman (ahmed@firestartermedia.com)
@date:			2009-05-29

Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
*/

class Main extends Controller
{
	function __construct()
	{
		parent::Controller();
	}
	
	function index()
	{
		global $value;
		
		$value = $_POST;
	}
}

/* End of file main.php */
/* Location: ./system/application/controllers/main.php */