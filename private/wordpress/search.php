<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<h3>Search Results</h3>

	<ul>
		<?php while ( have_posts() ): the_post(); ?>
			<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time( 'l, F jS, Y' ); ?></small>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				<p class="postmetadata">
					<?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category(', ') ?> | 
					<?php edit_post_link( 'Edit', '', ' | ' ); ?>  
					<?php comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?>
				</p>
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

<?php endif; ?>
<?php get_footer(); ?>