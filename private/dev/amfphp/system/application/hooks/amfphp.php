<?php if ( !defined('BASEPATH') ) exit( 'No direct script access allowed' ); 
/*
@author:		Ahmed Nuaman (ahmed@firestartermedia.com)
@date:			2009-05-29

Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
*/

class AMFPHP
{
	function output()
	{
		if ( !defined( 'AMFPHP' ) )
		{
			$CI =& get_instance();
			
			$CI->output->_display( $CI->output->get_output() );
		}
	}
}

/* End of file amfphp.php */
/* Location: ./system/application/hooks/amfphp.php */