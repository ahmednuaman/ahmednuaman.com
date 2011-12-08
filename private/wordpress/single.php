<?php get_header(); ?>
<?php if ( have_posts() ): ?> 
	<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h3><?php the_title(); ?></h3>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<div class="postmetadata alt">
					<p>Share the love:</p>
					<div class="noborder">
						<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?url=<?php the_permalink(); ?>&amp;via=ahmednuaman&amp;text=<?php the_title(); ?>" style="width:130px; height:40px;"></iframe>
						<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:40px;" allowTransparency="true"></iframe>
					</div>
					
					<p>Related posts:</p>
					<ul>
						<?php related_posts_by_category( array(
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
					<?php the_tags( 'Tags: ', ', ', ' <br /> ' ); ?>
					Posted in: <?php the_category(', ') ?> on <?php the_time( 'l, F jS, Y' ); ?>.<br />
					<?php if ( ( $post->comment_status == 'open' ) && ( $post->ping_status == 'open' ) ): // Both Comments and Pings are open ?>
						You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
					<?php elseif ( ! ( $post->comment_status == 'open' ) && ( $post->ping_status == 'open' ) ): // Only Pings are Open ?>
						Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
					<?php elseif ( ( $post->comment_status == 'open' ) && !( $post->ping_status == 'open' ) ): // Comments are open, Pings are not ?>
						You can skip to the end and leave a response. Pinging is currently not allowed.
					<?php elseif ( ! ($post->comment_status == 'open' ) && !( 'open' == $post->ping_status ) ): // Neither Comments, nor Pings are open ?>
						Both comments and pings are currently closed.
					<?php endif; ?>
				</div>
			</div>
		</div>
		
		<div class="navigation">
			<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
			<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
		</div>
		
		<?php comments_template(); ?>
	
	<?php endwhile; ?>  
<?php else: ?>
	<h3>Whoa! Where are you off to?</h3>
	<p>There's nothing here! So enter whatever you're looking for below and see what happens...</p>
	<?php get_search_form(); ?>
		
<?php endif; ?>
<?php get_footer(); ?>
