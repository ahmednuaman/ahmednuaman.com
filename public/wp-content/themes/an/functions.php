<?php
function an_setup()
{
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	
	add_image_size( 'an_hero', 900, 450 );
	add_image_size( 'an_hero_mobile', 300, 150 );
	add_image_size( 'an_thumbnail', 225, 150 );
	
	register_post_type( 'an_project', array(
			'labels'		=> array(
				'name'			=> __( 'Projects' ),
				'singular_name'	=> __( 'Project' )
			),
			'supports'		=> array(
				'title',
				'thumbnail',
				'custom-fields'
			),
			'show_ui'		=> true,
			'show_in_menu'	=> true
		)
	);
	
	register_post_type( 'an_client', array(
			'labels'		=> array(
				'name'			=> __( 'Clients' ),
				'singular_name'	=> __( 'Client' )
			),
			'supports'		=> array(
				'title',
				'thumbnail',
				'custom-fields'
			),
			'show_ui'		=> true,
			'show_in_menu'	=> true
		)
	);
}

add_action( 'after_setup_theme', 'an_setup' );