<? get_header(); ?>
<? if ( have_posts() ): ?>
	<? while ( have_posts() ): the_post(); ?>
		<div <? post_class() ?>>
			<h2 id="post-<? the_ID(); ?>"><a href="<? the_permalink() ?>" rel="bookmark" title="Permanent Link to <? the_title_attribute(); ?>"><? the_title(); ?></a></h2>
			<div class="entry">
				<? the_content( 'Read more &raquo;' ); ?>
			</div>
			<p class="postmetadata">
				Posted in: <? the_category(', ') ?> on <? the_time( 'l, F jS, Y' ); ?> &mdash;
				<? the_tags( 'Tags: ', ', ', ' &mdash; ' ); ?>
				<? comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?>
			</p>
		</div><br />
	<? endwhile; ?>

	<div class="navigation">
		<div class="right"><? previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
		<div class="left"><? next_posts_link( '&laquo; Older Entries' ); ?></div>
	</div>

<? else : ?>
	<h2>Whoa! Where are you off to?</h2>
	<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
	<? get_search_form(); ?>

<? endif; ?>
<? get_footer(); ?>
