<?php get_header(); ?>
<div id="main" role="main">
	<section class="col colright">
		<?php dynamic_sidebar( 'blog_right' ); ?>
	</section>
	<section class="col colleft">
		<?php while ( have_posts() ): the_post(); ?>
			<article>
				<h3 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<div class="entry">
					<?php the_content( 'Read more &raquo;' ); ?>
				</div>
				<div class="postmetadata">
					<span></span>
					<p>
						<?php the_tags( 'Tags: ', ', ', ' &mdash; ' ); ?> Posted in: <?php the_category(', ') ?> on <?php the_time( 'F jS, Y' ); ?>.
					</p>
				</div>
			</article>
		<?php endwhile; ?>
		<nav class="navigation">
			<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
			<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
		</nav>
	</section>
</div>
<?php get_footer(); ?>