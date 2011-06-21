<?php
$live	= $_SERVER[ 'HTTP_HOST' ] != 'ahmednuaman.local';
$dir	= get_bloginfo( 'template_directory' ) . '/';
$assets	= $dir . 'assets/';
$css	= $assets . 'css/';
$img	= $assets . 'image/';
$js		= $assets . 'js/';
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<meta name="author" content="<?php bloginfo( 'name' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
		<link type="text/css" rel="stylesheet" href="<?php echo $css; ?>styles.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
		<title><? wp_title( ' ~ ', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	</head>
	<body <?php body_class(); ?>>
		<div id="container">
			<header>
				<h1><?php bloginfo( 'name' ); ?></h1>
				<?php if ( is_single() ): ?>
					<?php while ( have_posts() ): the_post(); ?>
						<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_hero' ); ?>
						<div id="post_thumb" style="background-image: url(<?php echo $u[ 0 ]; ?>)"></div>
						<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_hero_mobile' ); ?>
						<div id="post_thumb_mobile" class="mobile" style="background-image: url(<?php echo $u[ 0 ]; ?>)"></div>
					<?php endwhile; ?>
					<?php rewind_posts(); ?>
				<?php else: ?>
					<div id="carousel">
						<ul>
							<?php query_posts( array( 'post_type' => is_front_page() ? 'an_project' : 'post' ) ); ?>
							<?php while ( have_posts() ): the_post(); ?>
								<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_hero' ); ?>
								<li id="tile_<?php the_ID(); ?>" class="large" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
									<h3><?php the_title(); ?></h3>
								</li>
								<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_hero_mobile' ); ?>
								<li id="tile_mobile_<?php the_ID(); ?>" class="mobile" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
									<h3><?php the_title(); ?></h3>
								</li>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
						</ul>
					</div>
				<?php endif; ?>
				<nav>
					<?php foreach ( wp_get_nav_menu_items( 'nav' ) as $item ): ?>
						<a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
					<?php endforeach; ?>
				</nav>
			</header>
			<div id="main" role="main">
				<?php if ( is_front_page() || is_single() ): ?>
					<?php if ( is_single() ): ?>
						<section class="col rightcol">
							<?php dynamic_sidebar( 'blog_right' ); ?>
						</section>
					<?php endif;?>
					<section<?php if ( is_single() ): ?> class="col leftcol"<?php endif;?>>
						<article id="content">
							<?php if ( is_single() ): ?>
								<h1 id="post-<?php the_ID(); ?>"><?php echo the_title(); ?></h1>
							<?php endif; ?>
							<?php the_content(); ?>
							<?php if ( is_single() ): ?>
								<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
								<div class="postmetadata alt">
									<h3>Share the love:</h3>
									<div class="noborder">
										<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?url=<?php the_permalink(); ?>&amp;via=ahmednuaman&amp;text=<? the_title(); ?>" style="width:130px; height:40px;"></iframe>
										<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:40px;" allowTransparency="true"></iframe>
									</div>
									<h3>Related posts:</h3>
									<menu>
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
									</menu>
									<?php the_tags( 'Tags: ', ', ', ' &mdash; ' ); ?> Posted in: <?php the_category(', ') ?> on <?php the_time( 'l, F jS, Y' ); ?>.
								</div>
								<nav class="navigation">
									<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
									<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
								</nav>
								<?php comments_template(); ?>
							<?php endif; ?>
						</article>
					</section>
				<?php endif; ?>
				
				<?php if ( is_front_page() ): ?>
					<section class="col">
						<h2>Latest work</h2>
						<menu>
							<?php query_posts( array( 'post_type' => 'an_project', 'posts_per_page' => 5 ) ); ?>
							<?php while ( have_posts() ): the_post(); ?>
								<li>
									<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_thumbnail' ); ?>
									<div class="col" style="background-image: url(<?php echo $u[ 0 ]; ?>)"></div>
									<div class="col">
										<h3><?php the_title(); ?></h3>
										<p>
											<?php the_content(); ?>
										</p>
										<?php $l	= get_post_custom_values( 'link', get_the_ID() ); ?>
										<?php if ( $l[ 0 ] ): ?>
											<p>
												<a href="<?php echo $l[ 0 ]; ?>" class="external">Visit the project &raquo;</a>
											</p>
										<?php endif; ?>
									</div>
								</li>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
						</menu>
					</section>
					<section class="col">
						<h2>Latest clients</h2>
						<menu>
							<?php query_posts( array( 'post_type' => 'an_client', 'posts_per_page' => 5 ) ); ?>
							<?php while ( have_posts() ): the_post(); ?>
								<li>
									<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_thumbnail' ); ?>
									<div class="col" style="background-image: url(<?php echo $u[ 0 ]; ?>)"></div>
									<div class="col">
										<h3><?php the_title(); ?></h3>
										<p>
											<?php the_content(); ?>
										</p>
										<?php $l	= get_post_custom_values( 'link', get_the_ID() ); ?>
										<?php if ( $l[ 0 ] ): ?>
											<p>
												<a href="<?php echo $l[ 0 ]; ?>" class="external">Visit the project &raquo;</a>
											</p>
										<?php endif; ?>
									</div>
								</li>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
						</menu>
					</section>
					<section class="col">
						<h2>Tweets</h2>
						<menu id="tweets">
							<li>Loading tweets....</li>
						</menu>
						<p>
							<a href="http://twitter.com/ahmednuaman" class="external">Read more tweets &raquo;</a>
						</p>
						<h2>Posts</h2>
						<menu>
							<?php query_posts( array( 'post_type' => 'post', 'posts_per_page' => 5 ) ); ?>
							<?php while ( have_posts() ): the_post(); ?>
								<li>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
						</menu>
						<p>
							<a href="/blog">Read more posts &raquo;</a>
						</p>
					</section>
				<?php elseif ( is_home() ): ?>
					<section class="col rightcol">
						<?php dynamic_sidebar( 'blog_right' ); ?>
					</section>
					<section class="col leftcol">
						<div class="list">
							<?php while ( have_posts() ): the_post(); ?>
								<article>
									<h2 id="post-<?php the_ID(); ?>">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
									<div class="entry">
										<?php the_content( 'Read more &raquo;' ); ?>
									</div>
									<p class="postmetadata">
										<?php the_tags( 'Tags: ', ', ', ' &mdash; ' ); ?> Posted in: <?php the_category(', ') ?> on <?php the_time( 'l, F jS, Y' ); ?>.
									</p>
								</article>
							<?php endwhile; ?>
						</div>
						<nav class="navigation">
							<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
							<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
						</nav>
					</section>
				<?php endif; ?>
			</div>
			<footer>
				<p>&copy; Ahmed Nuaman (that's me) unless it's client work then the copyright sits with its respective owners. As for the blog, that's licensed under a <a href="http://creativecommons.org/licenses/by-sa/2.0/uk/" class="external">Creative Commons Attribution-Share Alike 2.0 UK: England &amp; Wales License</a>, unless I (Ahmed Nuaman) state otherwise on the post.</p>
				<p>Built using <a href="http://wordpress.org" class="external">WordPress</a> because it's awesome. <a href="http://firestartermedia.com/?utm_referrer=ahmednuaman" class="external">Looking for web design and development? Try FireStarter Media Limited</a>.</p>
			</footer>
		</div>
		<?php
		$scripts		= array(
			'jquery-core',
			'jquery-ui',
			'modernizr',
			'suitcase'
		);
		
		if ( $live )
		{
			$scripts	= array( 'packaged' );
		}
		
		foreach ( $scripts as $script )
		{
			?>
				<script src="<? echo $js . $script; ?>.js"></script>
			<?php
		}
		?>
		<script>
			var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>