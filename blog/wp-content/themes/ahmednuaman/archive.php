<? get_header(); ?>
<? if ( have_posts() ): ?>
	<? $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	
	<? /* If this is a category archive */ if ( is_category() ): ?>
		<h2>Archive for the &#x201C;<? single_cat_title(); ?>&#x201D; Category</h2>
	<? /* If this is a tag archive */ elseif ( is_tag() ): ?>
		<h2>Posts Tagged &#x201C;<? single_tag_title(); ?>&#x201D;</h2>
	<? /* If this is a daily archive */ elseif ( is_day() ): ?>
		<h2>Archive for <? the_time('F jS, Y'); ?></h2>
	<? /* If this is a monthly archive */ elseif ( is_month() ): ?>
		<h2>Archive for <? the_time('F, Y'); ?></h2>
	<? /* If this is a yearly archive */ elseif ( is_year() ): ?>
		<h2>Archive for <? the_time('Y'); ?></h2>
	<? /* If this is an author archive */ elseif ( is_author() ): ?>
		<h2>Author Archive</h2>
	<? /* If this is a paged archive */ elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ): ?>
		<h2>Blog Archives</h2>
	<? endif; ?>
	
	<? while ( have_posts() ): the_post(); ?>
		<div <? post_class() ?>>
			<h3 id="post-<? the_ID(); ?>"><a href="<? the_permalink() ?>" rel="bookmark" title="Permanent Link to <? the_title_attribute(); ?>"><? the_title(); ?></a></h3>
			<small><? the_time( 'l, F jS, Y' ); ?></small>
			<div class="entry">
				<? the_content(); ?>
			</div>
			<p class="postmetadata">
				<? the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <? the_category(', ') ?> | 
				<? edit_post_link( 'Edit', '', ' | ' ); ?>  
				<? comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?>
			</p>
		</div>
	<? endwhile; ?>

	<div class="navigation">
		<div class="right"><? previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
		<div class="left"><? next_posts_link( '&laquo; Older Entries' ); ?></div>
	</div>
	
<? else: ?>
	<? if ( is_category() ): // If this is a category archive ?>
		<h2 class='center'>Sorry, but there aren't any posts in the <?=single_cat_title( '', false );?> category yet.</h2>
	<? elseif ( is_date() ): // If this is a date archive ?>
		<h2 class='center'>Sorry, but there aren't any posts with this date.</h2>
	<? elseif ( is_author() ): // If this is a category archive
		$userdata = get_userdatabylogin( get_query_var( 'author_name' ) ); ?>
		<h2 class='center'>Sorry, but there aren't any posts by <?=$userdata->display_name;?> yet.</h2>
	<? else: ?>
		<h2 class='center'>No posts found.</h2>
		<? get_search_form(); ?>
	<? endif; ?>
<? endif; ?>
<? get_footer(); ?>
