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
	<? else: ?>
		<h2>Whoa! Where are you off to?</h2>
		<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
		<? get_search_form(); ?>
	<? endif; ?>
<? get_footer(); ?>