<? get_header(); ?>
	<? if ( have_posts() ): ?> 
		<? while ( have_posts() ): the_post(); ?>
			<div class="post" id="post-<? the_ID(); ?>">
				<h2><? the_title(); ?></h2>
				<div class="entry">
					<? the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					<? wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
			</div>
		<? endwhile; ?>
	<? endif; ?>
	<? edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
<? get_sidebar(); ?>
<? get_footer(); ?>