<?php get_header(); ?>
<div id="main" role="main">
	<section class="col colright">
		<?php dynamic_sidebar( 'blog_right' ); ?>
	</section>
	<section class="col colleft">
		<article id="content">
			<h1 id="post-<?php the_ID(); ?>"><?php echo the_title(); ?></h1>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 
				'before' => '<p><strong>Pages:</strong> ', 
				'after' => '</p>', 
				'next_or_number' => 'number' 
			)); ?>
			<div class="alt">
				<h3>Share the love:</h3>
				<div class="noborder">
					<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?url=<?php the_permalink(); ?>&amp;via=ahmednuaman&amp;text=<? the_title(); ?>" style="width:130px; height:40px;"></iframe>
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:40px;" allowTransparency="true"></iframe>
				</div>
				<h3>Related posts:</h3>
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
					)); ?>
				</ul>
				<div class="postmetadata">
					<span></span>
					<p>
						<?php the_tags( 'Tags: ', ', ', ' &mdash; ' ); ?> Posted in: <?php the_category(', ') ?> on <?php the_time( 'F jS, Y' ); ?>.
					</p>
				</div>
			</div>
			<nav class="navigation">
				<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
				<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
			</nav>
			<?php comments_template(); ?>
		</article>
	</section>
</div>
<?php get_footer(); ?>