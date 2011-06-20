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
		<title><? wp_title( ' ~ ' ); ?></title>
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
							<?php get_posts( array( 'post_type' => is_front_page() ? 'an_project' : 'post' ) ); ?>
							<?php while ( have_posts() ): the_post(); ?>
								<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_hero' ); ?>
								<li id="tile_<?php echo $post->ID; ?>" class="large" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
									<h3><?php the_title(); ?></h3>
								</li>
								<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_hero_mobile' ); ?>
								<li id="tile_mobile_<?php echo $post->ID; ?>" class="mobile" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
									<h3><?php the_title(); ?></h3>
								</li>
							<?php endwhile; ?>
							<?php rewind_posts(); ?>
						</ul>
					</div>
				<?php endif; ?>
			</header>
			<div id="main" role="main">
				<?php
				if ( is_front_page() )
				{
					?>
					front page
					<?php
				}
				else if ( is_home() )
				{
					?>
					blog page
					<?php
				}
				else if ( is_single() )
				{
					?>
					blog post
					<?php
				}
				?>
			</div>
			<footer>
				<p>&copy; Ahmed Nuaman (that's me) unless it's client work then the copyright sits with its respective owners. As for the blog, that's licensed under a <a href="http://creativecommons.org/licenses/by-sa/2.0/uk/">Creative Commons Attribution-Share Alike 2.0 UK: England &amp; Wales License</a>, unless I (Ahmed Nuaman) state otherwise on the post.</p>
				<p>Built using <a href="http://wordpress.org">WordPress</a> because it's awesome. <a href="http://firestartermedia.com/?utm_referrer=ahmednuaman">Looking for web design and development? Try FireStarter Media Limited</a>.</p>
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