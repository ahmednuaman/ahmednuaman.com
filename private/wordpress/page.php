<?php get_header(); ?>
	<?php if ( have_posts() ): ?> 
		<?php while ( have_posts() ): the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<div class="entry">
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php else: ?>
		<h2>Whoa! Where are you off to?</h2>
		<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
<?php get_footer(); ?>