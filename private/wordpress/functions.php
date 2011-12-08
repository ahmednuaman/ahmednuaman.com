<?php

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