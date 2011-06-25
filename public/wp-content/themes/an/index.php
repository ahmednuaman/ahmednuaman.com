<?php
$_front		= is_front_page();
$_home		= is_home();
$_single	= is_single();
$live		= $_SERVER[ 'HTTP_HOST' ] != 'ahmednuaman.local';
$dir		= get_bloginfo( 'template_directory' ) . '/';
$assets		= $dir . 'assets/';
$css		= $assets . 'css/';
$img		= $assets . 'image/';
$js			= $assets . 'js/';
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
		<header>
			<div>
				<h1><?php bloginfo( 'name' ); ?></h1>
				<section>
					<nav>
						<?php foreach ( wp_get_nav_menu_items( 'nav' ) as $i => $item ): ?>
							<a href="<?php echo $item->url; ?>"<?php 
								if ( ( $_front && $i === 0 ) || ( ( $_single || $_home ) && $i === 1 ) ): 
							?> class="selected"<?php endif; ?>>
								<?php echo $item->title; ?>
								<span></span>
							</a>
						<?php endforeach; ?>
					</nav>
					<?php dynamic_sidebar( 'header' ); ?>
				</section>
			</div>
		</header>
		<div id="container">
			<div id="top">
				<?php /*if ( $_single ): ?>
					<?php $tid	= get_post_thumbnail_id(); ?>
					<?php $u	= wp_get_attachment_image_src( $tid, 'an_hero' ); ?>
					<div id="post_thumb" class="large" style="background-image: url(<?php echo $u[ 0 ]; ?>)"></div>
					<?php $u	= wp_get_attachment_image_src( $tid, 'an_hero_mobile' ); ?>
					<div id="post_thumb_mobile" class="mobile" style="background-image: url(<?php echo $u[ 0 ]; ?>)"></div>
				<?php else*/if ( $_front ): ?>
					<div id="carousel">
						<ul>
							<?php $cl	= array(); ?>
							<?php query_posts( array( 'post_type' => $_front ? 'an_project' : 'post' ) ); ?>
							<?php while ( have_posts() ): the_post(); ?>
								<?php $id	= get_the_ID(); ?>
								<?php $tid	= get_post_thumbnail_id(); ?>
								<?php $l	= $_front ? str_replace( site_url( '/blog/an_' ), '/#!/popup/', get_permalink() ) : get_permalink(); ?>
								<?php $t	= get_the_title(); ?>
								<?php $u	= wp_get_attachment_image_src( $tid, 'an_hero' ); ?>
								<li id="tile_<?php echo $id; ?>" class="large">
									<a href="<?php echo $l; ?>" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
										<h3><?php echo $t; ?></h3>
									</a>
								</li>
								<?php $u	= wp_get_attachment_image_src( $tid, 'an_hero_mobile' ); ?>
								<li id="tile_mobile_<?php echo $id; ?>" class="mobile">
									<a href="<?php echo $l; ?>" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
										<h3><?php echo $t; ?></h3>
									</a>
								</li>
								<?php array_push( $cl, str_replace( '!/popup', '!/carousel', $l ) ); ?>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
						</ul>
					</div>
					<div id="carousel_controls">
						<menu style="width: <?php echo count( $cl ) * 14; ?>px;">
							<?php foreach ( $cl as $l ): ?>
								<a href="<?php echo $l; ?>"></a>
							<?php endforeach; ?>
						</menu>
					</div>
				<?php endif; ?>
			</div>
			<div id="main" role="main">
				<?php if ( /*$_front ||*/ $_single ): ?>
					<section class="col colright">
						<?php dynamic_sidebar( 'blog_right' ); ?>
					</section>
					<section<?php if ( $_single ): ?> class="col colleft"<?php endif;?>>
						<article id="content">
							<?php if ( $_single ): ?>
								<h1 id="post-<?php the_ID(); ?>"><?php echo the_title(); ?></h1>
							<?php endif; ?>
							<?php the_content(); ?>
							<?php if ( $_single ): ?>
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
							<?php endif; ?>
						</article>
					</section>
				<?php endif; ?>
				<?php if ( $_front ): ?>
					<div>
						<?php $ns	= array( 'project'/*, 'client'*/ ); ?>
						<?php foreach ( $ns as $n ): ?>
							<section class="col">
								<div>
									<h2>Latest <?php echo $n . 's'; ?></h2>
									<h2><a href="/#!/popup/<?php echo $n; ?>">See all projects &raquo;</a></h2>
									<menu>
										<?php query_posts( array( 'post_type' => 'an_' . $n, 'posts_per_page' => 6 ) ); ?>
										<?php while ( have_posts() ): the_post(); ?>
											<li>
												<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_thumbnail' ); ?>
												<a href="<?php echo str_replace( site_url( '/blog/an_' ), '/#!/popup/', get_permalink() ); ?>" 
													style="background-image: url(<?php echo $u[ 0 ]; ?>)">
													<h3><?php the_title(); ?> &raquo;</h3>
												</a>
												<div class="info hide">
													<h3><?php the_title(); ?></h3>
													<?php the_content(); ?>
													<?php $l	= get_post_custom_values( 'link', get_the_ID() ); ?>
													<?php if ( $l[ 0 ] ): ?>
														<p>
															<a href="<?php echo $l[ 0 ]; ?>">Visit the project &raquo;</a>
														</p>
													<?php endif; ?>
												</div>
											</li>
										<?php endwhile; ?>
										<?php wp_reset_query(); ?>
									</menu>
								</div>
							</section>
						<?php endforeach; ?>
						<section class="col">
							<div>
								<h2>Tweets</h2>
								<h2><a href="http://twitter.com/ahmednuaman">Read more tweets &raquo;</a></h2>
								<ul id="tweets">
									<li>Loading tweets....</li>
								</ul>
							</div>
							<div>
								<h2>Posts</h2>
								<h2><a href="/blog">Read more posts &raquo;</a></h2>
								<ul>
									<?php query_posts( array( 'post_type' => 'post', 'posts_per_page' => 7 ) ); ?>
									<?php while ( have_posts() ): the_post(); ?>
										<li>
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
												<?php the_title(); ?>
											</a>
										</li>
									<?php endwhile; ?>
									<?php wp_reset_query(); ?>
								</ul>
							</div>
						</section>
					</div>
					<div class="clearfix">
						<section class="col">
							<h2>Get in touch</h2>
							<p>If you're in a rush, drop me a call on +44 (0) 7811 184 436, add me to Skype as <strong>ahmednuaman</strong>, or add me to iChat/Google Talk as ahmednuaman@gmail.com. Otherwise...</p>
							<ul>
								<?php foreach ( wp_get_nav_menu_items( 'contact' ) as $i => $item ): ?>
									<li>
										<a href="<?php echo $item->url; ?>">
											<?php echo $item->title; ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</section>
						<section class="col">
							<h2>A little bit about me</h2>
							<?php the_content(); ?>
						</section>
					</div>
				<?php elseif ( $_home ): ?>
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
				<?php endif; ?>
			</div>
			<footer>
				<span></span>
				<p>&copy; Ahmed Nuaman (that's me) unless it's client work then the copyright sits with its respective owners. As for the blog, that's licensed under a <a href="http://creativecommons.org/licenses/by-sa/2.0/uk/">Creative Commons Attribution-Share Alike 2.0 UK: England &amp; Wales License</a>, unless I (Ahmed Nuaman) state otherwise on the post.</p>
				<p>Built using <a href="http://wordpress.org">WordPress</a> because it's awesome. <a href="http://firestartermedia.com/?utm_referrer=ahmednuaman">Looking for web design and development? Try FireStarter Media Limited</a>.</p>
			</footer>
		</div>
		<?php
		$scripts		= array(
			'jquery-core',
			'jquery-ui',
			'jquery.ba-hashchange',
			'modernizr',
			'selectivizr',
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
		<?php wp_footer(); ?>
	</body>
</html>