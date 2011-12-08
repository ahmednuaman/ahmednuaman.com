<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<h2>Search Results</h2>

	<?php while ( have_posts() ): the_post(); ?>
		<div <?php post_class() ?>>
			<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<small><?php the_time( 'l, F jS, Y' ); ?></small>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			<p class="postmetadata">
				<?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category(', ') ?> | 
				<?php edit_post_link( 'Edit', '', ' | ' ); ?>  
				<?php comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?>
			</p>
		</div>
	<?php endwhile; ?>

	<div class="navigation">
		<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
		<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
	</div>

<?php else: ?>
	<h2>Whoa! Where are you off to?</h2>
	<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
	<?php get_search_form(); ?>

<?php endif; ?>
<?php get_footer(); ?>