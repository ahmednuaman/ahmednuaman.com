<?php get_header(); ?>
<?php while ( have_posts() ): the_post(); ?>
	<article class="post">
		<h1 class="post-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
		<h4 class="post-date">
			<?php the_date(); ?>
		</h4>
		<section class="post-content">
			<?php the_content(); ?>
		</section>
		<section class="post-meta">
			<p>
				Posted in <?php echo get_the_category_list( ', ' ); ?>.
			</p>
		</section>
	</article>
	<hr />
<?php endwhile; ?>
<?php if ( $wp_query->max_num_pages > 1 ): ?>
	<section class="pagination">
		<p>
			<?php previous_posts_link( '&laquo; Previous' ); ?>
			<em>
				&lt;!-- Pagination, baby --&gt;
			</em>
			<?php next_posts_link( 'Next &raquo;' ); ?>
		</p>
	</section>
<?php endif; ?>
<?php get_footer(); ?>