<? get_header(); ?>
<? if ( have_posts() ): ?> 
	<? while (have_posts()) : the_post(); ?>
		<div <? post_class() ?> id="post-<? the_ID(); ?>">
			<h2><? the_title(); ?></h2>
			<div class="entry">
				<? the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<? wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<div class="postmetadata alt">
					<p>Share the love:</p>
					<div class="noborder">
						<? echo '<ul class="addtoany_list">'; if( function_exists('ADDTOANY_SHARE_SAVE_ICONS') ) ADDTOANY_SHARE_SAVE_ICONS( array("html_wrap_open" => "<li>", "html_wrap_close" => "</li>") ); if( function_exists('ADDTOANY_SHARE_SAVE_BUTTON') ) ADDTOANY_SHARE_SAVE_BUTTON( array("html_wrap_open" => "<li>", "html_wrap_close" => "</li>") ); echo '</ul>'; ?>
						
						<? if( function_exists('addHexoSearch') ) { addHexoSearch(); } ?>
					</div>
					
					<p>Related posts:</p>
					<ul>
						<? related_posts_by_category( array(
						    'orderby' => 'post_date',
						    'order' => 'DESC',
						    'limit' => 5,
						    'echo' => true,
						    'before' => '<li>',
						    'after' => '</li>',
						    'type' => 'post',
						    'message' => 'no matches'
						  ) ) ?>
					</ul>
					<? the_tags( 'Tags: ', ', ', ' <br /> ' ); ?>
					Posted in: <? the_category(', ') ?> on <? the_time( 'l, F jS, Y' ); ?>.<br />
					<? if ( ( $post->comment_status == 'open' ) && ( $post->ping_status == 'open' ) ): // Both Comments and Pings are open ?>
						You can <a href="#respond">leave a response</a>, or <a href="<? trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
					<? elseif ( ! ( $post->comment_status == 'open' ) && ( $post->ping_status == 'open' ) ): // Only Pings are Open ?>
						Responses are currently closed, but you can <a href="<? trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
					<? elseif ( ( $post->comment_status == 'open' ) && !( $post->ping_status == 'open' ) ): // Comments are open, Pings are not ?>
						You can skip to the end and leave a response. Pinging is currently not allowed.
					<? elseif ( ! ($post->comment_status == 'open' ) && !( 'open' == $post->ping_status ) ): // Neither Comments, nor Pings are open ?>
						Both comments and pings are currently closed.
					<? endif; ?>
				</div>
			</div>
		</div>
		
		<div class="navigation">
			<div class="right"><? previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
			<div class="left"><? next_posts_link( '&laquo; Older Entries' ); ?></div>
		</div>
		
		<? comments_template(); ?>
	
	<? endwhile; ?>  
<? else: ?>
	<h2>Whoa! Where are you off to?</h2>
	<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
	<? get_search_form(); ?>
		
<? endif; ?>
<? get_footer(); ?>
