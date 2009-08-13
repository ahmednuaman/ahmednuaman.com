<? get_header(); ?>
<? if (have_posts()) : ?>
	<h2>Search Results</h2>

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

	<h2 class="center">No posts found. Try a different search?</h2>
	<? get_search_form(); ?>

<? endif; ?>
<? get_footer(); ?>