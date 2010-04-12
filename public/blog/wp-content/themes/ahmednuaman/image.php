<? get_header(); ?>
<? if ( have_posts() ): ?>
	<? while ( have_posts() ): the_post(); ?>
		<div class="post" id="post-<? the_ID(); ?>">
			<h2><a href="<?=get_permalink( $post->post_parent );?>" rev="attachment"><?=get_the_title( $post->post_parent );?></a> &raquo; <? the_title(); ?></h2>
			
			<div class="entry">
				<p class="attachment">
					<a href="<?=wp_get_attachment_url( $post->ID ); ?>"><?=wp_get_attachment_image( $post->ID, 'medium' ); ?></a>
				</p>
				<div class="caption"><? if ( !empty( $post->post_excerpt ) ) the_excerpt(); // this is the "caption" ?></div>
				
				<? the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
				<p class="postmetadata alt">
					<small>
						This entry was posted on <? the_time('l, F jS, Y'); ?> at <? the_time(); ?>
						and is filed under <? the_category(', '); ?>.
						<? the_taxonomies(); ?>
						You can follow any responses to this entry through the <? post_comments_feed_link('RSS 2.0'); ?> feed.
						
						<? if ( ( $post->comment_status == 'open' ) && ( $post->ping_status == 'open' ) ): // Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<? trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
						<? elseif ( ! ( $post->comment_status == 'open' ) && ( $post->ping_status == 'open' ) ): // Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<? trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
						<? elseif ( ( $post->comment_status == 'open' ) && !( $post->ping_status == 'open' ) ): // Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.
						<? elseif ( ! ($post->comment_status == 'open' ) && !( 'open' == $post->ping_status ) ): // Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.
						<? endif; ?>
						<? edit_post_link('Edit this entry.','',''); ?>
					</small>
				</p>

				<div class="navigation">	
					<div class="right"><? next_image_link(); ?></div>
					<div class="left"><? previous_image_link(); ?></div>
				</div>
			</div>
		</div>
	
		<? comments_template(); ?>
	
	<? endwhile; ?>
	
<? else: ?>
	<h2>Whoa! Where are you off to?</h2>
	<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
	<? get_search_form(); ?>
<? endif; ?>
<? get_footer(); ?>
