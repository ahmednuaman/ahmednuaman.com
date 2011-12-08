<?php get_header(); ?>
<?php if ( have_posts() ): ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	
	<?php /* If this is a category archive */ if ( is_category() ): ?>
		<h3>Archive for the &#x201C;<?php single_cat_title(); ?>&#x201D; Category</h3>
	<?php /* If this is a tag archive */ elseif ( is_tag() ): ?>
		<h3>Posts Tagged &#x201C;<?php single_tag_title(); ?>&#x201D;</h3>
	<?php /* If this is a daily archive */ elseif ( is_day() ): ?>
		<h3>Archive for <?php the_time('F jS, Y'); ?></h3>
	<?php /* If this is a monthly archive */ elseif ( is_month() ): ?>
		<h3>Archive for <?php the_time('F, Y'); ?></h3>
	<?php /* If this is a yearly archive */ elseif ( is_year() ): ?>
		<h3>Archive for <?php the_time('Y'); ?></h3>
	<?php /* If this is an author archive */ elseif ( is_author() ): ?>
		<h3>Author Archive</h3>
	<?php /* If this is a paged archive */ elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ): ?>
		<h3>Blog Archives</h3>
	<?php endif; ?>
	
	<?php if ( have_posts() ): ?>
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
	<?php endif; ?>

	<div class="navigation">
		<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
		<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
	</div>
	
<?php else: ?>
	<?php if ( is_category() ): // If this is a category archive ?>
		<h3>Sorry, but there aren't any posts in the <?php echo single_cat_title( '', false );?> category yet.</h3>
	<?php elseif ( is_date() ): // If this is a date archive ?>
		<h3>Sorry, but there aren't any posts with this date.</h3>
	<?php elseif ( is_author() ): // If this is a category archive
		$userdata = get_userdatabylogin( get_query_var( 'author_name' ) ); ?>
		<h3>Sorry, but there aren't any posts by <?php echo $userdata->display_name;?> yet.</h3>
	<?php else: ?>
		<h3>Whoa! Where are you off to?</h3>
		<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>
