<?php

$ahmed_cache_folder	= dirname( dirname( dirname( __FILE__ ) ) ) . '/cache/';
$ahmed_cache_prefix	= 'ahmed_';

function ahmed_check_cache()
{
	global $ahmed_cache_folder;
	global $ahmed_cache_prefix;
	
	$f	= $ahmed_cache_folder . $ahmed_cache_prefix . ahmed_hash_url( $_SERVER[ 'REQUEST_URI' ] );
	
	if ( file_exists( $f ) && !is_admin() )
	{
		if ( filesize( $f ) < 1024 )
		{
			return;
		}
		
		ob_end_flush();
		
		echo file_get_contents( $f );
		
		die();
	}
}

function ahmed_clear_cache()
{
	global $ahmed_cache_folder;
	global $ahmed_cache_prefix;
	
	$h	= opendir( $ahmed_cache_folder );
	
	if ( $h )
	{
		while ( ( $f = readdir( $h ) ) !== false )
		{
			if ( strstr( $f, $ahmed_cache_prefix ) )
			{
				unlink( $ahmed_cache_folder . $f );
			}
		}
		
		closedir( $h );
	}
}

function ahmed_hash_url($s)
{
	return str_replace( '/', '_', $s );
}

function ahmed_save_cache()
{
	global $ahmed_cache_folder;
	global $ahmed_cache_prefix;
	global $post;
	
	if ( $post->post_type != 'post' && $post->post_type != 'page' )
	{
		return;
	}
	
	$f	= $ahmed_cache_folder . $ahmed_cache_prefix . ahmed_hash_url( $_SERVER[ 'REQUEST_URI' ] );
	$h 	= ob_get_contents();
	
	if ( /*!file_exists( $f ) &&*/ !is_admin() && ob_get_length() > 0 )
	{
		file_put_contents( $f, $h );
	}
	
	ob_end_flush();
}

function ahmed_loop($t='')
{
	if ( have_posts() ): ?>
		<?php if ( $t ): ?>
			<h3><?php echo $t; ?></h3>
		<?php endif; ?>
		<ul>
			<?php while ( have_posts() ): the_post(); ?>
				<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h<?php echo $t ? '4' : '3' ?>><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h<?php echo $t ? '4' : '3' ?>>
					<div class="entry">
						<p>
							<small>
								<?php the_time( 'l, F jS, Y' ); ?>
							</small>
						</p>
						<?php the_content(); ?>
					</div>
					<p class="postmetadata">
						<?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category(', ') ?>
					</p>
					<hr />
				</li>
			<?php endwhile; ?>
		</ul>
		<div class="navigation">
			<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
			<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
		</div>
	<?php else: ahmed_404(); endif;
}

function ahmed_404()
{
	?>
		<style>
		<!--
			#baxter
			{
				display: block;
				margin: 20px 0 0 0;
				-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;text-shadow:0px 1px 0px #000000;-webkit-box-shadow:0 0 5px rgba(0, 0, 0, 0.5);-moz-box-shadow:0 0 5px rgba(0, 0, 0, 0.5);box-shadow:0 0 5px rgba(0, 0, 0, 0.5);
				width: 900px;
				height: 602px;
				background: url(/assets/image/baxter.jpg) center no-repeat;
			}
		-->
		</style>
		<h2>Oh noes, you're lost! Well to cheer you up, here's a picture of Baxter:</h2>
		<div id="baxter"></div>
	<?php
}

add_action( 'clean_post_cache', 'ahmed_clear_cache' );
add_action( 'delete_post', 'ahmed_clear_cache' );
add_action( 'posts_selection', 'ahmed_check_cache' );
add_action( 'save_post', 'ahmed_clear_cache' );
add_action( 'shutdown', 'ahmed_save_cache', 0 );
add_action( 'update_option', 'ahmed_clear_cache' );
