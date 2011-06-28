<?php
function an_setup()
{
	add_theme_support( 'post-formats' );
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'an_hero', 900, 450 );
	add_image_size( 'an_hero_mobile', 300, 150 );
	add_image_size( 'an_thumbnail', 290, 145 );
	
	register_nav_menus( array(
		'nav'		=> 'Main nav',
		'contact'	=> 'Contact nav'
	));
}

function an_init()
{
	$a	= array( 'client', 'project' );
	$t	= array();
	
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
				'show_in_menu'	=> true,
				'public'		=> true,
				'has_archive'	=> true,
				'rewrite' 		=> array( 
					'slug' 			=> $n . 's', 
					'with_front' 	=> true 
				)
			)
		);
		
		array_push( $t, 'an_' . $n );
	}
	
	register_taxonomy( 'Skills', $t, array( 
			'hierarchical' 		=> true, 
			'label' 			=> 'Skills', 
			'singular_label' 	=> 'Skill', 
			'rewrite' 			=> true
		)
	);
	
	// flush_rewrite_rules();
}

// function an_admin_init()
// {
// 	add_meta_box("credits_meta", "Design & Build Credits", "credits_meta", "portfolio", "normal", "low");
// }

function an_widgets_init()
{
	register_sidebar( array(
		'name' 				=> __( 'Blog right' ),
		'id' 				=> 'blog_right',
		'before_widget' 	=> '<li>',
		'after_widget' 		=> '</li>',
		'before_title' 		=> '<h3>',
		'after_title' 		=> '</h3>',
	));
	
	register_sidebar( array(
		'name' 				=> __( 'Header bar' ),
		'id' 				=> 'header',
		'before_widget' 	=> '',
		'after_widget' 		=> '',
		'before_title' 		=> '',
		'after_title' 		=> '',
	));
}

add_action( 'after_setup_theme', 'an_setup' );
add_action( 'init', 'an_init' );
// add_action( 'admin_init', 'an_admin_init' );
add_action( 'widgets_init', 'an_widgets_init' );