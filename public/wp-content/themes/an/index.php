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