<?php

$ahmed_cache_prefix	= 'ahmed_';

function ahmed_init()
{
	register_post_type( 'portfolio', array(
		'label'			=> __( 'Portfolio' ),
		'show_ui'		=> true,
		'show_in_menu'	=> true,
		'supports'		=> array(
			'title',
			'editor'
		)
	));
	
	register_post_type( 'labs', array(
		'label'			=> __( 'Labs' ),
		'show_ui'		=> true,
		'show_in_menu'	=> true,
		'supports'		=> array(
			'title',
			'editor'
		)
	));
}

function ahmed_add_meta_boxes()
{
	add_meta_box( 'ahmed_portfolio_hero', 'Hero', 'ahmed_meta_box_text', 'portfolio', 'normal' );
}

function ahmed_meta_box_text($p, $m)
{
	?>
		<input type="text" name="<?php echo $m[ 'id' ]; ?>" value="<?php echo get_post_meta( $p->ID, $m[ 'id' ], true ); ?>" placeholder="<?php echo $m[ 'title' ]; ?>" />
	<?php
}

function ahmed_save_post($id)
{
	foreach ( $_POST as $k => $v ) 
	{
		if ( strstr( $k, 'ahmed_' ) )
		{
			update_post_meta( $id, $k, $v );
		}
	}
}

function ahmed_check_cache()
{
	global $ahmed_cache_prefix;
	
	$f	= $ahmed_cache_prefix . ahmed_hash_url( $_SERVER[ 'REQUEST_URI' ] );
	
	if ( apc_exists( $f ) && !is_admin() && !current_user_can( 'administrator' ) )
	{
		ob_end_flush();
		
		echo apc_fetch( $f );
		
		die();
	}
	else if ( current_user_can( 'administrator' ) )
	{
		apc_delete( $f );
	}
}

function ahmed_clear_cache()
{
	apc_clear_cache();
}

function ahmed_hash_url($s)
{
	return str_replace( '/', '_', $s );
}

function ahmed_save_cache()
{
	global $ahmed_cache_prefix;
	global $post;
	
	if ( !is_admin() && $post )
	{
		if ( $post->post_type != 'post' && $post->post_type != 'page' )
		{
			return;
		}
		
		$f	= $ahmed_cache_prefix . ahmed_hash_url( $_SERVER[ 'REQUEST_URI' ] );
		$h 	= ob_get_contents();
		
		if ( /*!file_exists( $f ) &&*/ ob_get_length() > 1024 )
		{
			apc_add( $f, $h );
		}
		
		ob_end_flush();
	}
}

function ahmed_show_flash($a)
{
	global $post;
	
	wp_enqueue_script( 'swfobject' );
	
	extract( $a );
	
	$id	= preg_replace( '/\W+/', '', $movie );
	
	return <<<EOF
		<div class="flash border">
			<div id="$id"></div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script>
		<!--
			swfobject.embedSWF( '$movie', '$id', '$width', '$height', '10.0.0' );
		-->
		</script>
EOF;
}

function ahmed_add_rewrite_rules($r)
{
	$n	= array(
		'[0-9]{4}/[0-9]{2}/[0-9]{2}/([^/]+)/?$' => 'index.php?name=$matches[1]'
	);
	
	return $n + $r;
}

function ahmed_enqueue_scripts()
{
	wp_register_script( 'swfobject', get_template_directory_uri() . '/assets/js/swfobject.js' );
	
	wp_enqueue_script( 'jquery' );
}

function ahmed_menu($m)
{
	global $wp_query;
	
	$its	= wp_get_nav_menu_items( $m );
	$h		= '';
	$u		= $_SERVER[ 'REQUEST_URI' ];
	
	foreach ( $its as $i ) 
	{
		$h	.= '<a href="' . $i->url . '"' . ( ahmed_compare_urls( $u, $i->url ) ? ' class="selected"' : '' ) . '>' . $i->title . '</a>';
	}
	
	return $h;
}

function ahmed_compare_urls($u1, $u2)
{
	if ( $u1 === $u2 )
	{
		return true;
	}
	
	$u1	= parse_url( $u1 );
	$u2	= parse_url( $u2 );
	
	$u1	= str_replace( '/', '', $u1[ 'path' ] );
	$u2	= str_replace( '/', '', $u2[ 'path' ] );
	
	if ( $u1 === $u2 )
	{
		return true;
	}
	
	if ( @strpos( $u1, $u2 ) === 0 )
	{
		return true;
	}
}

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

add_action( 'init', 'ahmed_init' );
add_action( 'add_meta_boxes', 'ahmed_add_meta_boxes' );
add_action( 'clean_post_cache', 'ahmed_clear_cache' );
add_action( 'delete_post', 'ahmed_clear_cache' );
add_action( 'posts_selection', 'ahmed_check_cache' );
add_filter( 'rewrite_rules_array', 'ahmed_add_rewrite_rules' );
add_action( 'save_post', 'ahmed_clear_cache' );
add_action( 'save_post', 'ahmed_save_post' );
add_action( 'shutdown', 'ahmed_save_cache', 0 );
add_action( 'update_option', 'ahmed_clear_cache' );
add_action( 'wp_enqueue_scripts', 'ahmed_enqueue_scripts' );

add_shortcode( 'kml_flashembed', 'ahmed_show_flash' );
add_shortcode( 'flashembed', 'ahmed_show_flash' );

add_image_size( 'work', 620, 383 );