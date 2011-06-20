<?php
function an_setup()
{
	add_theme_support( 'post-formats' );
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'an_hero', 900, 450 );
	add_image_size( 'an_hero_mobile', 300, 150 );
	add_image_size( 'an_thumbnail', 225, 150 );
}

function an_init()
{
	$a	= array( 'client', 'project' );
	foreach ( $a as $n )
	{
		register_post_type( 'an_' . $n, array(
				'labels'		=> array(
					'name'			=> __( ucwords( $n ) . 's' ),
					'singular_name'	=> __( ucwords( $n ) )
				),
				'supports'		=> array(
					'title',
					'thumbnail',
					'custom-fields',
					'editor',
					'revisions'
				),
				'show_ui'		=> true,
				'show_in_menu'	=> true
			)
		);
	}
}

add_action( 'after_setup_theme', 'an_setup' );
add_action( 'init', 'an_init' );