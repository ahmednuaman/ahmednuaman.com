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
	<?php ahmed_loop(); ?>
<?php else: ?>
	<?php if ( is_category() ): // If this is a category archive ?>
		<h3>Sorry, but there aren't any posts in the <?php echo single_cat_title( '', false );?> category yet.</h3>
	<?php elseif ( is_date() ): // If this is a date archive ?>
		<h3>Sorry, but there aren't any posts with this date.</h3>
	<?php elseif ( is_author() ): // If this is a category archive
		$userdata = get_userdatabylogin( get_query_var( 'author_name' ) ); ?>
		<h3>Sorry, but there aren't any posts by <?php echo $userdata->display_name;?> yet.</h3>
	<?php else: ahmed_404(); endif; ?>
<?php endif; ?>
<?php get_footer(); ?>
