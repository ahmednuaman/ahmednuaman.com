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
						    'before' => '<li>&rarr; ',
						    'after' => '</li>',
						    'type' => 'post',
						    'message' => 'no matches'
						  ) ) ?>
					</ul>
					<p>
						<?php the_tags( 'Tags: ', ', ', ' <br /> ' ); ?>
						Posted in: <?php the_category(', ') ?> on <?php the_time( 'l, F jS, Y' ); ?>.
					</p>
				</div>
			</div>
		</div>
		
		<div class="navigation">
			<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
			<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
		</div>
	
	<?php endwhile; ?>  
<?php else: ahmed_404(); endif; ?>
<?php get_footer(); ?>
