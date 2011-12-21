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
					<ul class="social">
						<li>
							<a href="http://twitter.com/share" class="socialite twitter" data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" data-count="horizontal" data-via="ahmednuaman" rel="nofollow">
								<span>Share on Twitter</span>
							</a>
						</li>
						<li>
							<a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php the_permalink(); ?>" class="socialite googleplus" data-size="medium" data-href="<?php the_permalink(); ?>" rel="nofollow">
								<span>Share on Google+</span>
							</a>
						</li>
						<li>
							<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" class="socialite facebook" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="60" data-show-faces="false" rel="nofollow">
								<span>Share on Facebook</span>
							</a>
						</li>
						<li>
							<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="socialite linkedin" data-url="<?php the_permalink(); ?>" data-counter="right" rel="nofollow">
								<span>Share on LinkedIn</span>
							</a>
						</li>
					</ul>
					<p>Related posts:</p>
					<ul class="related">
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
