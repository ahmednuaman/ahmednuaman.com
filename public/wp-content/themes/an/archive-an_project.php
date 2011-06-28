<?php get_header(); ?>
<div id="main" role="main">
	<section>
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
			<?php $u    = wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_thumbnail' ); ?>
			+                                    <div class="col" style="background-image: url(<?php echo $u[ 0 ]; ?>)"></div>
			+                                    <div class="col">
			+                                        <h3><?php the_title(); ?></h3>
			+                                        <p>
			+                                            <?php the_content(); ?>
			+                                        </p>
			+                                        <?php $l    = get_post_custom_values( 'link', get_the_ID() ); ?>
			+                                        <?php if ( $l[ 0 ] ): ?>
			+                                            <p>
			+                                                <a href="<?php echo $l[ 0 ]; ?>">Visit the project &raquo;</a>
			+                                            </p>
			+                                        <?php endif; ?>
			+                                    </div>
		<?php endwhile; ?>
		<nav class="navigation">
			<div class="right"><?php previous_posts_link( 'Newer Projects &raquo;' ); ?></div>
			<div class="left"><?php next_posts_link( '&laquo; Older Projects' ); ?></div>
		</nav>
	</section>
</div>
<?php get_footer(); ?>