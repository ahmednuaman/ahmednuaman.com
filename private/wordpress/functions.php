<?php

$ahmed_cache_folder	= dirname( dirname( dirname( __FILE__ ) ) ) . '/cache/';
$ahmed_cache_prefix	= 'ahmed_';

function ahmed_check_cache()
{
	global $ahmed_cache_folder;
	global $ahmed_cache_prefix;
	
	$f	= $ahmed_cache_folder . $ahmed_cache_prefix . md5( $_SERVER[ 'REQUEST_URI' ] );
	
	if ( file_exists( $f ) && !is_admin() )
	{
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

function ahmed_save_cache()
{
	global $ahmed_cache_folder;
	global $ahmed_cache_prefix;
	
	$f	= $ahmed_cache_folder . $ahmed_cache_prefix . md5( $_SERVER[ 'REQUEST_URI' ] );
	$h 	= ob_get_contents();
	
	if ( !file_exists( $f ) )
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
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
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
	<?php else: ?>
		<h3>Whoa! Where are you off to?</h3>
		<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
		<?php get_search_form(); ?>
	<?php endif;
}

add_action( 'clean_post_cache', 'ahmed_clear_cache' );
add_action( 'delete_post', 'ahmed_clear_cache' );
add_action( 'posts_selection', 'ahmed_check_cache' );
add_action( 'save_post', 'ahmed_clear_cache' );
add_action( 'shutdown', 'ahmed_save_cache', 0 );
add_action( 'update_option', 'ahmed_clear_cache' );
