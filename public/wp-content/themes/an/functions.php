<?php
function an_setup()
{
	add_theme_support( 'post-thumbnails', array( 'post' ) );
}

add_action( 'after_setup_theme', 'an_setup' );