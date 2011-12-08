<?php get_header(); ?>
<?php if ( have_posts() ): ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	
	<?php /* If this is a category archive */ if ( is_category() ): ?>
		<h2>Archive for the &#x201C;<?php single_cat_title(); ?>&#x201D; Category</h2>
	<?php /* If this is a tag archive */ elseif ( is_tag() ): ?>
		<h2>Posts Tagged &#x201C;<?php single_tag_title(); ?>&#x201D;</h2>
	<?php /* If this is a daily archive */ elseif ( is_day() ): ?>
		<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ elseif ( is_month() ): ?>
		<h2>Archive for <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ elseif ( is_year() ): ?>
		<h2>Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ elseif ( is_author() ): ?>
		<h2>Author Archive</h2>
	<?php /* If this is a paged archive */ elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ): ?>
		<h2>Blog Archives</h2>
	<?php endif; ?>
	
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
	<?php if ( is_category() ): // If this is a category archive ?>
		<h2>Sorry, but there aren't any posts in the <?php echo single_cat_title( '', false );?> category yet.</h2>
	<?php elseif ( is_date() ): // If this is a date archive ?>
		<h2>Sorry, but there aren't any posts with this date.</h2>
	<?php elseif ( is_author() ): // If this is a category archive
		$userdata = get_userdatabylogin( get_query_var( 'author_name' ) ); ?>
		<h2>Sorry, but there aren't any posts by <?php echo $userdata->display_name;?> yet.</h2>
	<?php else: ?>
		<h2>Whoa! Where are you off to?</h2>
		<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>
