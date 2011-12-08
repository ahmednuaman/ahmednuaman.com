<?php get_header(); ?>
<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ): the_post(); ?>
		<div <?php post_class() ?>>
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry">
				<?php the_content( 'Read more &raquo;' ); ?>
			</div>
			<p class="postmetadata">
				Posted in: <?php the_category(', ') ?> on <?php the_time( 'l, F jS, Y' ); ?> &mdash;
				<?php the_tags( 'Tags: ', ', ', ' &mdash; ' ); ?>
				<?php comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?>
			</p>
		</div><br />
	<?php endwhile; ?>

	<div class="navigation">
		<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
		<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
	</div>

<?php else : ?>
	<h2>Whoa! Where are you off to?</h2>
	<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
	<?php get_search_form(); ?>

<?php endif; ?>
<?php get_footer(); ?>
