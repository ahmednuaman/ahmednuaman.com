<?php get_header(); ?>
<?php while ( have_posts() ): the_post(); ?>
	<article class="post">
		<h1 class="post-title">
			<?php the_title(); ?>
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
	<section class="post-comments">
		<?php comments_template(); ?>
	</section>
<?php endwhile; ?>
<?php get_footer(); ?>